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
						'type' => $user['typeID'] );
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
	}
?>