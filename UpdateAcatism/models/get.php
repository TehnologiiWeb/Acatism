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

		public function getSearch($search, $tipUser)
		{
			$teme = array();
			$contorTeme = 0;

			$sql = "SELECT id, titlu, description, idProf FROM temepropuse WHERE ((UPPER(titlu) LIKE '%" . $search 
				. "%') OR (UPPER(description) LIKE '%" . $search . "%')) AND tipTema = " . $tipUser 
				. " AND id NOT IN (SELECT idTema FROM temealese)";
			
			$result = $this->db->query($sql);

			$rez = $result->result_array();

			foreach ($rez as $inreg) 
			{
				$sql1 = "SELECT nume FROM profs WHERE id = ". $inreg['idProf'];

				$profs = $this->db->query($sql1);
				$profs = $profs->result_array();
				$prof = $profs[0];
				$teme[$contorTeme] = array(
					'id' => $inreg['id'], 
					'titlu' => $inreg['titlu'], 
					'description' => $inreg['description'], 
					'nume' => $prof['nume']);
				$contorTeme += 1;
			}

			return $teme;
		}

		public function get_tip_teme($tipUser)
		{
			$teme = array();
			$contorTeme = 0;

			$sql = "SELECT id, titlu, description, idProf FROM temepropuse WHERE tipTema = " . $tipUser 
			. " AND id NOT IN (SELECT idTema FROM temealese)";
			$result = $this->db->query($sql);

			$result = $result->result_array();

			foreach ($result as $inreg) 
			{
				$sql1 = "SELECT nume FROM profs WHERE id = ". $inreg['idProf'];

				$profs = $this->db->query($sql1);
				$profs = $profs->result_array();
				$prof = $profs[0];

				$teme[$contorTeme] = array(
					'id' => $inreg['id'], 
					'titlu' => $inreg['titlu'], 
					'description' => $inreg['description'], 
					'numeProf' => $prof['nume']);
				$contorTeme += 1;
			}
			return $teme;
		}

		public function get_infoStud($idUser)
		{
			$sql = "SELECT * FROM students WHERE id = " . $idUser;
			$result = $this->db->query($sql);

			$users = $result->result_array();
			$user = $users[0];

			return $user; 
		}

		public function get_allProfs()
		{
			$sql = "SELECT id, nume FROM profs";
			$result = $this->db->query($sql);

			if ($result->num_rows() > 0)
			{
				$profs = $result->result_array();

				return $profs;
			}
			else
			{
				return false;
			}
		}

		public function get_temeProf($idProf)
		{
			$sql = "SELECT id, titlu, tipTema FROM temepropuse WHERE idProf = " . $idProf;
			$result = $this->db->query($sql);

			if ($result->num_rows() > 0)
			{
				$teme = $result->result_array();
				
				return $teme;
			}
			else
				return false;
		}

		public function application_exist($idUser)
		{
			$sql = "SELECT * FROM aplicari WHERE idStud = " . $idUser;
			$result = $this->db->query($sql);

			if ($result->num_rows() > 0)
				return true;
			else
				return false;
		}

		public function get_emailProf($idProf)
		{
			$sql = "SELECT email FROM users WHERE id = ". $idProf;
			$result = $this->db->query($sql);

			if ($result->num_rows() > 0)
			{
				$profs = $result->result_array();
				return $profs[0]['email'];
			}
			else
				return false;
		}

		public function disponibilitate_tema($idTema)
		{
			$sql = "SELECT id FROM temealese WHERE idTema = " . $idTema;
			$result = $this->db->query($sql);

			if ($result->num_rows() > 0)
				return false;
			else
				return true;
		}

		public function get_tipStudent($userId)
		{
			$sql = "SELECT tipStudii FROM students WHERE id = " . $userId;
			$result = $this->db->query($sql);

			if ($result->num_rows > 0)
			{
				$rez = $result->result_array();
				return $rez[0]['tipStudii'];
			}
			else
				return false;
		}

		public function getSearchProfs($search)
		{
			$sql = "SELECT id, nume FROM profs WHERE nume LIKE '%" . $search . "%'";
			$result = $this->db->query($sql);

			if ($result->num_rows() > 0)
			{
				$profs = $result->result_array();

				return $profs;
			}
			else
			{
				return false;
			}
		}
	}
?>
