<?php

	class ContinutFisAjax extends CI_Controller
	{
		public function index()
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
					
					$path = $this->input->post('path');

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
						echo json_encode(base64_decode($content->content));
						die();
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