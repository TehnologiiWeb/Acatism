<?php
	class Set extends CI_Model {


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

		public function aplica($idStud, $idTema)
		{
			$aplicare = array(
				'idStud' => $idStud, 
				'idTema' => $idTema
			);

			return $this->db->insert("aplicari", $aplicare);
		}

		public function editStud($data) 
		{ 
			print_r($data);
			$data1 = array( 
				'email' => $data['email'], 
				'password' => $data['pass'], 
				'github' => $data['git'] 
				); 

			$this->db->where('id', $data['id']); 
			$this->db->update('users', $data1);

			if ($data['tipStudii'] == 'Student')
				$data['tipStudii'] = 'Licenta';
			else
				$data['tipStudii'] = 'Master';

			$data2 = array(
				'nume' => $data['nume'],
				'anStudiu' => $data['anStudiu'],
				'grupa' => $data['grupa'],
				'tipStudii' => $data['tipStudii']
				); 

			$this->db->where('id', $data['id']); 
			$this->db->update('students', $data2); 
		}
	}
?>