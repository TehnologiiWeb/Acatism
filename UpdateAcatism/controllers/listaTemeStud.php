<?php

	class ListaTemeStud extends CI_Controller {

		public function index() 
		{
			$user = $this->session->userdata('user');

			if ($user)
			{
				$this->load->model('get');

				$tipStud = $this->get->get_tipStudent($user['id']);

				if ($tipStud == 'Licenta')
					$tipStud = 0;
				else
					$tipStud = 1;

				$teme = $this->get->get_tip_teme($tipStud);
				$data = array('teme' => $teme);
				//print_r($teme);

				$this->load->view('ListaTemeStud', $data);
			}
			else
				redirect(base_url('login'));
		}

		public function aplica()
		{
			//de facut AJAX
			//$idTema = urldecode($_GET['tema']);
			$idTema = $this->input->post('idTema');
			$user = $this->session->userdata('user');

			if ($user)
			{
				$this->load->model('get');
				$infoTema = $this->get->get_profesor_tema($user);

				// daca nu are nicio tema atribuita
				if ($infoTema == FALSE)
				{
					$existaApp = $this->get->application_exist($user['id']);

					//daca nu a mai aplicat la alta tema
					if ($existaApp == false)
					{						

						$tema = $this->get->get_infoTema($idTema);
						$numeTema = $tema['titlu'];
						$idProf = $tema['idProf'];
						$emailProf = $this->get->get_emailProf($idProf);

						$student = $this->get->get_infoStud($user['id']);
						$numeStud = $student['nume'];

						$this->load->model('set');
						$this->set->aplica($user['id'], $idTema);

						$this->load->model('sendEmail');
						$this->sendEmail->sendMail($emailProf, 'Notificare Acatism', 'Studentul ' . $numeStud . ' a aplicat la tema ' . $numeTema . '!');


						echo "Ati aplicat cu succes!";
					}
					else
						echo "Ati aplicat deja la o alta tema!";
				}
				else
				{
					echo "Sunteti deja inregistrat la o tema!";
				}

			}
			else
				redirect(base_url('login'));
		}
	}
?>