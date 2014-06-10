<?php

	class TasksProf extends CI_Controller
	{
		
		public function index()
		{
			$user = $this->session->userdata('user');

			if ($user)
			{

				$id = $this->input->post('id');
				$idTema = $this->input->post('idTema');
				$et1 = $this->input->post('et1');
				$data1 = $this->input->post('data1');
				$et2 = $this->input->post('et2');
				$data2 = $this->input->post('data2');
				$et3 = $this->input->post('et3');
				$data3 = $this->input->post('data3');
				$et4 = $this->input->post('et4');
				$data4 = $this->input->post('data4');
				$et5 = $this->input->post('et5');
				$data5 = $this->input->post('data5');
				$et6 = $this->input->post('et6');
				$data6 = $this->input->post('data6');

				if ($this->validateDate($data1) && $this->validateDate($data2) && $this->validateDate($data3)
					&& $this->validateDate($data4) && $this->validateDate($data5) && $this->validateDate($data6))
				{
					
					$ok = $this->validateDate2($data1, $data2, $data3, $data4, $data5, $data6);

					if ($ok == 1)
					{
						$ok2 = $this->validateDate3($data1, $data2, $data3, $data4, $data5, $data6);

						if ($ok2 == 1)
						{

							$this->load->model('get');
					
							$idStud = $this->get->getIdStud($id);
							$studInfo = $this->get->getStudInfo($idStud);
							$data = $this->get->getNumeTema($id);

							$dataTemeAlese = array(
											'idStud' => $idStud,
											'idProf' => $user['id'],
											'idTema' => $data['id'],
											);

							$dataCampuri = array(
										0 => $idTema, 1 => $et1, 2 => $et2,
										3 => $et3, 4 => $et4,
										5 => $et5, 6 => $et6,
										7 => $data1, 8 => $data2,
										9 => $data3, 10 => $data4,
										11 => $data5, 12 => $data6
											);
						
							$this->load->model('set');
							$this->set->addTema($dataTemeAlese);
							$this->set->deleteAplicari($data['id'], $idStud);

							$this->set->insertEtape($dataCampuri);

							$this->createRepo($data['titlu'], $data['description'], $studInfo['github'], $user['githubName']);
							echo "Acest student a fost acceptat.";
						}

						else
						{
							echo "Data incorecta !";
						}
					}
					else
					{
						echo "Datele nu sunt in ordine cronologica !";
					}

				}
				else
				{
					echo "Nu s-au completat corect campurile de deadline !";
				}
			}
		}

		public function createRepo($numeTema, $descriereTema, $studGit, $profGit)
		{
			require_once 'vendor/autoload.php';
			require_once (APPPATH . "third_party/Github/Client.php");
			require_once (APPPATH . "third_party/Github/HttpClient/HttpClientInterface.php");
			require_once (APPPATH . "third_party/Github/HttpClient/Listener/AuthListener.php");
			require_once (APPPATH . "third_party/Github/Exception/ExceptionInterface.php");
			require_once (APPPATH . "third_party/Github/Exception/ErrorException.php");
			require_once (APPPATH . "third_party/Github/Exception/ValidationFailedException.php");
			require_once (APPPATH . "third_party/Github/HttpClient/Listener/ErrorListener.php");
			require_once (APPPATH . "third_party/Github/HttpClient/HttpClient.php");
			require_once (APPPATH . "third_party/Github/Api/ApiInterface.php");
			require_once (APPPATH . "third_party/Github/HttpClient/Message/ResponseMediator.php");
			require_once (APPPATH . "third_party/Github/Api/AbstractApi.php");
			require_once (APPPATH . "third_party/Github/Api/Repository/Collaborators.php");
			require_once (APPPATH . "third_party/Github/Api/Repo.php");
			
			$client = new \Github\Client();
			$client->authenticate('Acatism', 'acatismweb1', Github\Client::AUTH_HTTP_PASSWORD);
			$repo = $client->api('repo')->create($numeTema, $descriereTema, '', true, null, true, true, true, null, true);

			$client->api('repo')->collaborators()->add('Acatism', $numeTema, $studGit);	
			$client->api('repo')->collaborators()->add('Acatism', $numeTema, $profGit);
		}


		public function respingeAplicant()
		{
			$user = $this->session->userdata('user');

			if ($user)
			{
				$id = $this->input->post('id');
				
				$this->load->model('get');
				$idStud = $this->get->getIdStud($id);

				$data = array(
						'id' => $id,
						'idStud' => $idStud
						);

				$this->load->model('get');
				$data2 = $this->get->getStudInfo($idStud);
				$data3 = $this->get->getNumeTema($id);
				$numeTema = $data3['titlu'];
			

				$this->load->model('sendEmail');
				$this->sendEmail->sendMail($data2['email'], 'Cerere respinsa', 'Buna, ' . 
				$data2['nume'] . '. Ai fost respins pentru tema ' . $numeTema . '.');

				$this->load->model('set');
				$this->set->removeAplicant($data);

				echo "Acest student a fost respins.";
			}
		}

		public function realizareEtapa()
		{
			$user = $this->session->userdata('user');

			if ($user)
			{
				$idTema = $this->input->post('idTema');
				$nrEtapa = $this->input->post('nrEtapa');

				$data = array('realizare' => 1);

				$this->db->where('id_tema', $idTema);
				$this->db->where('id_etapa', $nrEtapa);
				$this->db->update('progres', $data);
			}
		}

		public function editareEtape()
		{
			$user = $this->session->userdata('user');

			if ($user)
			{

				$id = $this->input->post('id');
				$et1 = $this->input->post('et1');
				$data1 = $this->input->post('data1');
				$et2 = $this->input->post('et2');
				$data2 = $this->input->post('data2');
				$et3 = $this->input->post('et3');
				$data3 = $this->input->post('data3');
				$et4 = $this->input->post('et4');
				$data4 = $this->input->post('data4');
				$et5 = $this->input->post('et5');
				$data5 = $this->input->post('data5');
				$et6 = $this->input->post('et6');
				$data6 = $this->input->post('data6');

				if ($this->validateDate($data1) && $this->validateDate($data2) && $this->validateDate($data3)
					&& $this->validateDate($data4) && $this->validateDate($data5) && $this->validateDate($data6))
				{
					$ok = $this->validateDate2($data1, $data2, $data3, $data4, $data5, $data6);
					
					if ($ok == 1)
					{
						$ok2 = $this->validateDate3($data1, $data2, $data3, $data4, $data5, $data6);

						if ($ok2 == 1)
						{
							$this->load->model('set');

							$data = array(
									0 => $id, 1 => $et1, 2 => $et2,
									3 => $et3, 4 => $et4,
									5 => $et5, 6 => $et6,
									7 => $data1, 8 => $data2,
									9 => $data3, 10 => $data4,
									11 => $data5, 12 => $data6
									);
						
							$this->set->editEtape($data);
							echo "Datele au fost modificate.";
						}
						else
						{
							echo "Data incorecta !";
						}
					}
					else
					{
						echo "Datele nu sunt in ordine cronologica !";
					}
			
				}
				else
				{
					echo "Nu s-au completat corect campurile de deadline !";
				}
				
			}
		}

		public function stergeStudent()
		{
			require_once 'vendor/autoload.php';
			require_once (APPPATH . "third_party/Github/Client.php");
			require_once (APPPATH . "third_party/Github/HttpClient/HttpClientInterface.php");
			require_once (APPPATH . "third_party/Github/HttpClient/Listener/AuthListener.php");
			require_once (APPPATH . "third_party/Github/Exception/ExceptionInterface.php");
			require_once (APPPATH . "third_party/Github/Exception/ErrorException.php");
			require_once (APPPATH . "third_party/Github/Exception/ValidationFailedException.php");
			require_once (APPPATH . "third_party/Github/HttpClient/Listener/ErrorListener.php");
			require_once (APPPATH . "third_party/Github/HttpClient/HttpClient.php");
			require_once (APPPATH . "third_party/Github/Api/ApiInterface.php");
			require_once (APPPATH . "third_party/Github/HttpClient/Message/ResponseMediator.php");
			require_once (APPPATH . "third_party/Github/Api/AbstractApi.php");
			require_once (APPPATH . "third_party/Github/Api/Repository/Collaborators.php");
			require_once (APPPATH . "third_party/Github/Api/Repo.php");

			$idTema = $this->input->post('idTema');
			
			$this->load->model('set');
			$this->set->removeStud($idTema);

			$this->load->model('get');
			$data = $this->get->get_infoTema($idTema);

			$client = new \Github\Client();
			$client->authenticate('Acatism', 'acatismweb1', Github\Client::AUTH_HTTP_PASSWORD);
			$client->api('repo')->remove('Acatism', $data['titlu']);

			echo "Studentul a fost sters.";
		}

		private function validateDate($date)
		{
    		$d = DateTime::createFromFormat('Y-m-d', $date);
    		return $d && $d->format('Y-m-d') == $date;
		}

		private function validateDate2($data1, $data2, $data3, $data4, $data5, $data6)
		{
			if ($data1 <= $data2 && $data2 <= $data3 && $data3 <= $data4 
				&& $data4 <= $data5 && $data5 <= $data6)
				return 1;
			else
				return 0;
		}

		private function validateDate3($data1, $data2, $data3, $data4, $data5, $data6)
		{
			$date = date('Y-m-d');
			if ($date <= $data1 && $date <= $data2 && $date <= $data3 && $date <= $data4 
				&& $date <= $data5 && $date <= $data6)
				return 1;
			else
				return 0;
		}

	}

?>