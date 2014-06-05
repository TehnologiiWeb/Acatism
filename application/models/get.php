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

		public function getSearch($query, $post_per_page, $current_page){

			$offset = ($current_page-1) * $post_per_page;

	        if($current_page == 1) {
	            $offset = 0;
	        }

	        $sql = "SELECT * FROM temepropuse WHERE MATCH ( titlu, description ) AGAINST (?)";
			$query = $this->db->query($sql, array($query, $offset, $post_per_page));

			return $query->result_array();

		}

		function get_numrows($query) {

	        $rows=0;

	        $sql = "SELECT * FROM wp_posts WHERE  MATCH ( post_title, post_content ) AGAINST (?)  AND post_status='publish'";
	        $query = $this->db->query($sql, array($query));

	        $rows=$query->num_rows();

	        return $rows;
   		}

   		function cleanHTML($input, $ending='...') {

	        $output = strip_tags($input);

	        $output = substr($output, 0, 100);
	        $output .= $ending;

	        return $output;
    	}
	}
?>