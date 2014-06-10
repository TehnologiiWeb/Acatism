<?php
	
	class Get extends CI_Model {

		public function login($email, $pass) 
		{

			//se verifica existenta in bd a email-ului introdus de user
			$this->db->where("email", $email);
			$result = $this->db->get("users");

			//daca email-ul este gasit
			if ($result->num_rows() ==1) 
			{
				$users = $result->result_array();
				$user = $users[0];

				//se verifica daca parola introdusa este valida iar daca da se returneaza datele user-ului
				if ($user['password'] == md5($pass)) 
				{
					$u = array(
						'id' => $user['id'],
						'email' => $user['email'],
						'type' => $user['typeID'],
						'githubName' => $user['github']);

					return $u;
				}
				else 
				{
					return false;
				}
			}
			else 
			{
				return false;
			}

		}

		public function get_tasks($id)
		{

			$this->db->where("idStud", $id);
			$result = $this->db->get("temealese");

		//	$tasks = array();
		//	$contor = 0;

			if ($result->num_rows() > 0)
			{
				$teme = $result->result_array();
				$tema = $teme[0];

				$this->db->where("id_tema", $tema['id']);
				$result1 = $this->db->get('progres');

				$progrese = $result1->result_array();
				$contor = 0;
				$currentDate = date('Y-m-d');
				$tasks = array();

				foreach ($progrese as $pr)
				{
					if ($pr['deadline'] >= $currentDate)
					{
						$this->db->where("id", $pr['id_etapa']);
						$etape = $this->db->get("etape");
						$etape = $etape->result_array();
						$etapa = $etape[0];

						$tasks[$contor] = array(
							'nume' => $etapa['nume'], 
							'descriere' => $pr['descriere'],
							'deadline' => $pr['deadline'] );
						$contor += 1;
					}
				}
				return $tasks;
			}
			else
				return false;
		}

		public function get_profesor_tema($user)
		{
			//tema user-ului
			$this->db->where("idStud", $user['id']);
			$result = $this->db->get("temealese");

			if ($result->num_rows() > 0)
			{
				$teme = $result->result_array();
				$tema = $teme[0];

				//profesorul asociat temei user-ului
				$this->db->where("id", $tema["idProf"]);
				$result = $this->db->get("users");

				$profs = $result->result_array();
				$profesor = $profs[0];

				$data = array(
					'tema' => $tema,
					'profesor' => $profesor);

				return $data;
			}
			else
				return false;

		}

		public function get_infoTema($idTema)
		{
			$this->db->where("id", $idTema);
			$result = $this->db->get("temepropuse");

			if ($result->num_rows() > 0)
			{
				$teme = $result->result_array();
				$tema = $teme[0];

				return $tema;
			}
			else
			{
				return false;
			}
		}

		public function get_numeProf($idProf)
		{
			$this->db->where("id", $idProf);
			$result = $this->db->get("profs");

			if ($result->num_rows() > 0)
			{
				$profs = $result->result_array();
				$prof = $profs[0];

				return $prof['nume'];
			}
			else
			{
				return false;
			}
		}

		public function getAllProjects($user)
		{
			$contor = 0;

			$sql = "SELECT id, titlu, description FROM temepropuse WHERE idProf = ?";
			
			$q = $this->db->query($sql, $user['id']);

			if ($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$var = $row->id;

					$this->db->select('count(*) as numberstud');
					$this->db->from('temealese');
					$this->db->where('idTema', $var);
					$query = $this->db->get();

					foreach ($query->result() as $row2) 
					{
        				
        				$data[$contor++] = array(
								'titlu' => $row->titlu,
								'descriere' => $row->description,
								'nrstud' => $row2->numberstud
								);
        			}
				}

			}
			else
			{
				$data = FALSE;
				return $data;
			}
			return $data;
		}

		public function myStudents($user)
		{
			
			$contor = 0;
			
			$sql = "SELECT idStud, idTema FROM temealese WHERE idProf = ?";
			$q = $this->db->query($sql, $user['id']);

			if ($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$idStudent = $row->idStud;
					$idTema = $row->idTema;
										
					$sql2 = "SELECT nume FROM students WHERE id = ?";
					$q2 = $this->db->query($sql2, $idStudent);

					if ($q2->num_rows() > 0)
					{
						foreach ($q2->result() as $row2)
						{
							$numeStudent = $row2->nume;
						}
					}
					
					$sql2 = "SELECT titlu FROM temepropuse WHERE id = ?";
					$q2 = $this->db->query($sql2, $idTema);

					if ($q2->num_rows() > 0)
					{
						foreach ($q2->result() as $row2)
						{
							$numeTema = $row2->titlu;
						}
					}

					$contor2 = 0;

					$sql2 = "SELECT id_etapa, descriere, realizare, deadline FROM progres WHERE id_tema = ?";
					$q2 = $this->db->query($sql2, $idTema);

					if ($q2->num_rows() > 0)
					{
						foreach ($q2->result() as $row2)
						{

							$idEtapa = $row2->id_etapa;
							$descriere = $row2->descriere;
							$realizare = $row2->realizare;
							$deadline = $row2->deadline;

							$sql3 = "SELECT nume FROM etape WHERE id = ?";
							$q3 = $this->db->query($sql3, $idEtapa);

							if ($q3->num_rows() > 0)
							{
								foreach ($q3->result() as $row3)
								{
									$numeEtapa = $row3->nume;
								}
							}

							$data2[$contor2++] = array(
													'numeEtapa' => $numeEtapa,
													'descriere' => $descriere,
													'stare' => $realizare,
													'deadline' => $deadline
													);
						}
					}

					
					$data[$contor++] = array(
								'numeStudent' => $numeStudent,
								'idTema' => $idTema,
								'numeTema' => $numeTema,
								'etape' => $data2,
								);
				}
			}
			else
			{
				$data = FALSE;
				return $data;
			}
			return $data;
		}

		public function editProfileProf($user)
		{
			
			$sql = "SELECT nume, numarInreg FROM profs WHERE id = ?";
			$q = $this->db->query($sql, $user['id']);

			if ($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$numeProf = $row->nume;
				}
			}

			$sql = "SELECT email, password, github FROM users WHERE id = ?";
			$q = $this->db->query($sql, $user['id']);

			if ($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$emailProf = $row->email;
					$passProf = $row->password;
					$gitProf = $row->github;
				}
			}

			$data = array(
						'numeProf' => $numeProf,
						'emailProf' => $emailProf,
						'parolaProf' => $passProf,
						'gitProf' => $gitProf,
						);
			return $data;
		}

		public function getRequests($user)
		{
			$contor = 0;

			$query = $this->db->get('aplicari');

			$data = array();

			foreach ($query->result() as $row)
			{
				
				$id = $row->id;
				$idStud = $row->idStud;
				$idTema = $row->idTema;

				$sql2 = "SELECT idProf, titlu FROM temepropuse WHERE id = ?";
				$q2 = $this->db->query($sql2, $idTema);

				if ($q2->num_rows() > 0)
				{
					foreach ($q2->result() as $row2)
					{
						$idProf = $row2->idProf;
						$titlu = $row2->titlu;
					}
				}

				if ($idProf == $user['id'])
				{
					
					$sql = "SELECT nume, anStudiu, grupa FROM students WHERE id = ?";
					$q = $this->db->query($sql, $idStud);

					if ($q->num_rows() > 0)
					{
						foreach ($q->result() as $row)
						{
							$numeStud = $row->nume;
							$anStud = $row->anStudiu;
							$grupaStud = $row->grupa;
						}
					}

					$data[$contor++] = array(
									'id' => $id,
									'idTema' => $idTema,
									'idStud' => $idStud,
									'numeStud' => $numeStud,
									'grupaStud' => $grupaStud,
									'anStud' => $anStud,
									'titlu' => $titlu
									);

				}
				else
				{
					$data = FALSE;
					return $data;
				}
			}
			return $data;
		}

		public function getStudInfo($idStud)
		{
			$sql = "SELECT nume FROM students WHERE id = ?";
			$q = $this->db->query($sql, $idStud);

			if ($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$numeStud = $row->nume;
				}
			}

			$sql = "SELECT email, github FROM users WHERE id = ?";
			$q = $this->db->query($sql, $idStud);

			if ($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$emailStud = $row->email;
					$gitStud = $row->github;
				}
			}

			$data = array(
						'nume' => $numeStud,
						'email' => $emailStud,
						'github' => $gitStud
						);

			return $data;
		}

		public function getNumeTema($id)
		{
			$this->db->select('idTema');
			$this->db->where("id", $id);
			$result = $this->db->get("aplicari");

			if ($result->num_rows() == 1)
			{
				$r = $result->result_array();
				$r1 = $r[0];

				$data = $this->get_infoTema($r1['idTema']);
				return $data;
			} 
			else
				return FALSE;
		}

		public function altiAplicanti($idTema)
		{
			$contor = 0;
			$sql = "SELECT idStud FROM aplicari WHERE idTema = ?";
			$q = $this->db->query($sql, $idTema);

			if ($q->num_rows() > 0)
			{
				foreach ($q->result() as $row)
				{
					$data[$contor++] = $row->idStud;
				}
				return $data;
			}
			else
			{
				return FALSE;
			}
		}

		public function getIdStud($id)
		{
			$this->db->select('idStud');
			$this->db->where('id', $id);
			$q = $this->db->get('aplicari');

			foreach ($q->result() as $row)
			{
				$idStud = $row->idStud;
			}

			return $idStud;
		}

		public function validNume($nume)
		{
			$this->db->select('titlu');
			$query = $this->db->get('temepropuse');
			foreach ($query->result() as $row)
			{
				if ( $row->titlu == $nume )
					return 0;
			}
			return 1;
		}

	}
?>