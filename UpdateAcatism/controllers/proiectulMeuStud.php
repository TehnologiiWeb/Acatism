<?php

	class ProiectulMeuStud extends CI_Controller
	{
		public function index()
		{
			$user = $this->session->userdata('user');

			if ($user)
			{
				$tree = $this->getFolderContent('', $user);

				$data['arbore'] = $tree;
				$this->load->view('proiectulMeuStud', $data);
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
					/*$data = array(
						'titlu' => $repo,
						'descriere' => $numeTema['description'],
						'arbore' => $rezultat
						);*/

					return $rezultat;
				}
			}
			else
				return "Nu sunteti inscris la nicio tema momentan!";
		}

		public function contentOfAFile()
		{
			$user = $this->session->userdata('user');

			if ($user)
			{
				$this->load->model('get');
				$temaStud = $this->get->get_profesor_tema($user);

				if ($temaStud != false)
				{
					$idTema = $temaStud['tema']['idTema'];
					$numeTema = $this->get->get_infoTema($idTema);
					$repo = $numeTema['titlu'];
					// de forma: a/b
					//$path = $_GET['path'];
					$path = 'TestFolder/Text.txt';

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
						return base64_decode($content->content);
					}

				}
				else
					return "Nu sunteti inscris la nicio tema momentan!";
			}
			else
				redirect(base_url('login'));

		}
	}
?>