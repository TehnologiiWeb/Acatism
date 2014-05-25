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
				// echo "Nu exista niciun rezultat;
			}
			return $data;
		}
	}
?>