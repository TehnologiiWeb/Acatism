<?php
	class Set extends CI_Model {

		public function removeStud($idTema)
		{
			$this->db->where('idTema', $idTema);
			$this->db->delete('temealese');

			$this->db->where('id_tema', $idTema);
			$this->db->delete('progres');
		}

		public function insertEtape($dataCampuri)
		{
			
			$idTema = $dataCampuri[0];
			
			for ($i = 6; $i > 0; $i--)
			{
				$j = $i + 6;
				$data = array(
							'id_tema' => $idTema,
							'id_etapa' => $i,
							'descriere' => $dataCampuri[$i],
							'realizare' => 0,
							'deadline' => $dataCampuri[$j]
							);
				$this->db->insert('progres', $data);
			}
		}

		public function editEtape($data)
		{
			$idTema = $data[0];

			for ($i = 1; $i <= 6; $i++)
			{
				$j = $i + 6;
				$dataCampuri = array(
									'descriere' => $data[$i],
									'deadline' => $data[$j]
									);
				$this->db->where('id_tema', $idTema);
				$this->db->where('id_etapa', $i);
				$this->db->update('progres', $dataCampuri);
			}
		}

		public function deleteAplicari($idTema, $idStud)
		{
			$this->load->model('get');

			$data3 = $this->get->get_infoTema($idTema);
			$numeTema = $data3['titlu'];

			$data = $this->get->altiAplicanti($idTema);

			if ($data != FALSE)
			{
				foreach ($data as $row)
				{
					if ($row != $idStud)
					{
						$data2 = $this->get->getStudInfo($row);
						$this->load->model('sendEmail');
						$this->sendEmail->sendMail($data2['email'], 'Cerere respinsa', 'Buna, ' . 
				$data2['nume'] . '. Ai fost respins pentru tema ' . $numeTema . '.');
					}
					else
					{
						$data2 = $this->get->getStudInfo($row);
						$this->load->model('sendEmail');
						$this->sendEmail->sendMail($data2['email'], 'Cerere acceptata', 'Buna, ' . 
				$data2['nume'] . '. Ai fost acceptat pentru tema ' . $numeTema . '.');
					}
				}
			}

			$this->db->delete('aplicari', array('idTema' => $idTema)); 
		}

		public function addTema($data)
		{
			$this->db->insert('temealese', $data);
		}

		public function removeAplicant($data)
		{
			$this->db->delete('aplicari', array('id' => $data['id'], 'idStud' => $data['idStud']));
		}

		public function editProf($data)
		{
			$data1 = array(
							'email' => $data['email'],
							'password' => $data['pass'],
							'github' => $data['git']
						);
			$this->db->where('id', $data['id']);
			$this->db->update('users', $data1);

			$data2 = array(
							'nume' => $data['nume']
						);
			$this->db->where('id', $data['id']);
			$this->db->update('profs', $data2);
		}
		
		public function adaugaTema($data)
		{
			$this->db->where('titlu', $data['titlu']);
			$result = $this->db->get('temepropuse');

			if ($result->num_rows() == 1)
			{
				return 'nerealizat';
			}
			else
			{
				$this->db->insert('temepropuse', $data);
				return 'realizat';
			}
			
		}

		public function register($data) 
		{
			$this->db->where("email", $data['email']);
			$result = $this->db->get("users");

			if ($result->num_rows() == 1) 
			{
				return false;
			}
			else 
			{
				if ($data['tipUser'] == 0)
				{
					$this->db->where("nrMatricol", $data['nrMat']);
					$result = $this->db->get("studentcodes");

					if ($result->num_rows() == 0) 
					{
						return false;
					}
					else
					{
						$numbers = $result->result_array();
						$number = $numbers[0];

						if ($number['ocupat'] == 1)
						{
							return false;
						}
						else
						{
							$dispNrMat  = array(
								'ocupat' => 1 );

							$this->db->where('nrMatricol', $data['nrMat']);
							$this->db->update('studentcodes', $dispNrMat); 

							$utilizator = array(
								'email' => $data['email'],
								'password' => $data['pass'],
								'typeID' => $data['tipUser'],
								'github' => $data['githubName']);
							//echo $utilizator['email'];
							$valRet = $this->db->insert("users", $utilizator);

							if  ($valRet == true)
							{
								$this->db->where("email", $data['email']);
								$result = $this->db->get("users");

								$utilizatori = $result->result_array();
								$u = $utilizatori[0];

								$student = array(
									'id' => $u['id'],
									'nume' => $data['name'],
									'anStudiu' => $data['an'],
									'grupa' => $data['grupa'],
									'tipStudii' => $data['tipStudii'],
									'nrMatricol' => $data['nrMat'] );

								return $this->db->insert("students", $student);

							}
							else
							{
								return false;
							}
						}
					}
				}
				else
				{
					$this->db->where("nrInregistrare", $data['nrMat']);
					$result = $this->db->get("profcodes");

					if ($result->num_rows() == 0) 
					{
						return false;
					}
					else
					{
						$numbers = $result->result_array();
						$number = $numbers[0];

						if ($number['ocupat'] == 1)
						{
							return false;
						}
						else
						{
							$dispNrMat  = array(
								'ocupat' => 1 );

							$this->db->where('nrInregistrare', $data['nrMat']);
							$this->db->update('profcodes', $dispNrMat); 

							$utilizator = array(
								'email' => $data['email'],
								'password' => $data['pass'],
								'typeID' => $data['tipUser'],
								'github' => $data['githubName'] );
							//echo $utilizator['email'];
							$valRet = $this->db->insert("users", $utilizator);

							if  ($valRet == true)
							{
								$this->db->where("email", $data['email']);
								$result = $this->db->get("users");

								$utilizatori = $result->result_array();
								$u = $utilizatori[0];

								$profesor = array(
									'id' => $u['id'],
									'nume' => $data['name'],
									'numarInreg' => $data['nrMat'] );

								return $this->db->insert("profs", $profesor);

							}
							else
							{
								return false;
							}
						}
					}
				}
			}
		}
	}
?>