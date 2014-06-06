<?php

	class ListaTemeStud extends CI_Controller {

		public function index() 
		{
			$user = $this->session->userdata('user');

			if ($user)
			{
				$this->load->model('get');
				$teme = $this->get->get_tip_teme($user['type']);
				$data = array('teme' => $teme);

				$this->load->view('ListaTemeStud', $data);
			}
			else
				redirect(base_url('login'));
		}

		public function aplica()
		{
			//$idTema = urldecode($_GET['tema']);
			$idTema = $this->input->post('idTema');
			$user = $this->session->userdata('user');

			if ($user)
			{
				$this->load->model('get');
				$infoTema = $this->get->get_profesor_tema($user);

				if ($infoTema == FALSE)
				{
					$tema = $this->get->get_infoTema($idTema);
					$numeTema = $tema['titlu'];

					$student = $this->get->get_infoStud($user['id']);
					$numeStud = $student['nume'];

					$this->load->model('set');
					$this->set->aplica($user['id'], $idTema);

					$this->load->model('sendEmail');
					$this->sendEmail->sendMail($user['email'], 'Notificare Acatism', 'Studentul ' . $numeStud . ' a aplicat la tema ' . $numeTema . '!');
				}
				else
				{
					return "Sunteti deja inregistrat la o tema!";
				}

			}
			else
				redirect(base_url('login'));
		}
	}
?>