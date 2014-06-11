<?php

	class UploadFile extends CI_Controller
	{
		public function index()
		{
			require_once 'vendor/autoload.php';
			require_once (APPPATH . "third_party/Github/Api/ApiInterface.php");
			require_once (APPPATH . "third_party/Github/Api/AbstractApi.php");
			require_once (APPPATH . "third_party/Github/Api/Repository/Contents.php");
			require_once (APPPATH . "third_party/Github/Client.php");
			require_once (APPPATH . "third_party/Github/HttpClient/HttpClientInterface.php");
			require_once (APPPATH . "third_party/Github/HttpClient/Listener/AuthListener.php");
			require_once (APPPATH . "third_party/Github/Exception/ExceptionInterface.php");
			require_once (APPPATH . "third_party/Github/Exception/ErrorException.php");
			require_once (APPPATH . "third_party/Github/Exception/ValidationFailedException.php");
			require_once (APPPATH . "third_party/Github/HttpClient/Listener/ErrorListener.php");
			require_once (APPPATH . "third_party/Github/HttpClient/HttpClient.php");
			require_once (APPPATH . "third_party/Github/HttpClient/Message/ResponseMediator.php");
			require_once (APPPATH . "third_party/Github/Api/Repository/Collaborators.php");
			require_once (APPPATH . "third_party/Github/Api/Repo.php");

			$user = $this->session->userdata('user');

			if ($user)
			{
				if (isset($_POST['numeFis']) && isset($_POST['comMessage']) && isset($_POST['content']) && isset($_POST['path']))
				{
					$numeFis = $this->input->post('numeFis');
					$comMessage = $this->input->post('comMessage');
					$content = $this->input->post('content');
					$path = $this->input->post('path');

					$this->load->model('get');
					$infoTema = $this->get->get_profesor_tema($user);

					if ($infoTema != false)
					{
						$idTema = $infoTema['tema']['idTema'];
						$tema = $this->get->get_infoTema($idTema);
						$numeTema = $tema['titlu'];

						// numele user-ului
						$committer = array(
							'name' => $user['githubName'],
							'email' => $user['email']
							);

						$finalPath = $path . '/' . $numeFis;

						$client = new \Github\Client();
						$client->authenticate('Acatism', 'acatismweb1', Github\Client::AUTH_HTTP_PASSWORD);
						$client->api('upfis')->create('Acatism', $numeTema, $finalPath, $content, $comMessage, 'master', $committer);
					}
				}
			}
			else
				redirect(base_url('login'));
		}
	}	
?>