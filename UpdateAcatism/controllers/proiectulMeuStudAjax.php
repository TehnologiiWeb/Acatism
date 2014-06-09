<?php

	class ProiectulMeuStudAjax extends CI_Controller
	{
		public function index()
		{
			$user = $this->session->userdata('user');

			if ($user)
			{
				$path = $this->input->post('path');
				$isAjax = $this->input->post('isAjax');

				$data = $this->getFolderContent($path, $user);

				echo json_encode($data['arbore']);
				die();
			}
			else
				redirect(base_url('login'));
		}

		public function getFolderContent($path, $user)
		{
			$this->load->model('get');
			$temaStud = $this->get->get_profesor_tema($user);

			if ($temaStud != false)
			{
				$idTema = $temaStud['tema']['idTema'];
				$numeTema = $this->get->get_infoTema($idTema);
				$repo = $numeTema['titlu'];

				$url = 'https://api.github.com/repos/Acatism/' . $repo . '/contents/' . $path;

				$curl = curl_init();

				curl_setopt_array($curl, array(
			    	CURLOPT_RETURNTRANSFER => 1,
			    	CURLOPT_URL => $url,
			    	CURLOPT_USERAGENT => 'Acatism App',
			    	CURLOPT_SSL_VERIFYPEER => false,
			    	CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
			    	CURLOPT_USERPWD => "Acatism:acatismweb1"
				));

				$resp = curl_exec($curl);
				curl_close($curl);

				if ($resp == null) 
				{
					return false;
				}
				else
				{
					$content = json_decode($resp);

					$rezultat = array();
					$contor = 0;

					foreach ($content as $file) 
					{
						if ($file->type == 'file')
						{
							$rezultat[$contor] = $file->name;
							$contor += 1;
						}
						elseif ($file->type == 'dir') 
						{
							if ($path == '')
								$path = $file->name;
							else
								$path = $path . '/' . $file->name;

							$rezultat[$contor] = array(
								'name' => $file->name,
								'content' => $this->getFolderContent($path, $user)
								);
							$contor += 1;
						}
					}
					$data = array(
						'titlu' => $repo,
						'descriere' => $numeTema['description'],
						'arbore' => $rezultat
						);

					return $data;
				}
			}
			else
				return "Nu sunteti inscris la nicio tema momentan!";
		}
	}
?>