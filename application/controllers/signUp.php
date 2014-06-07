<?php

	class SignUp extends CI_Controller {

		public function index() {

			$name = $this->input->post('signUpName');
			$email = $this->input->post('signUpEmail');
			$pass = $this->input->post('signUpPassword');
			$tipUser = $this->input->post('tipUser');
			$githubName = $this->input->post('signUpGithub');

			if ($tipUser == "Student") 
			{
				$an = $this->input->post('anStudent');
				$grupa = $this->input->post('signUpGrupa');
				$nrMat = $this->input->post('signUpCod');
				$data = array(
					'name' => $name,
					'email' => $email,
					'pass' => md5($pass),
					'tipUser' => 0,
					'githubName' => $githubName,
					'an' => $an,
					'grupa' => $grupa,
					'nrMat' => $nrMat,
					'tipStudii' => "Licenta" );

				//se salveaza in baza de date informatiile
				$this->load->model('set');
				$ret = $this->set->register($data);

				//daca nu exista un user cu acelasi email, se redirecteaza catre pagina de login
				if ( $ret ) 
				{
					$this->load->view('login');
				}
				else {
					$this->load->view('login');	
				 }
			}
			elseif ($tipUser == "Masterand") 
			{
				$an = $this->input->post('anMasterand');
				$grupa = $this->input->post('signUpGrupa');
				$nrMat = $this->input->post('signUpCod');
				$data = array(
					'name' => $name,
					'email' => $email,
					'pass' => md5($pass),
					'tipUser' => 0,
					'githubName' => $githubName,
					'an' => $an,
					'grupa' => $grupa,
					'nrMat' => $nrMat,
					'tipStudii' => "Master" );

				//se salveaza in baza de date informatiile
				$this->load->model('set');
				$ret = $this->set->register($data);	

				//daca nu exista un user cu acelasi email, se redirecteaza catre pagina de login
				if ( $ret ) 
				{
					$this->load->view('login');
				}
				else {
					$this->load->view('login');	
				 }
			}
			elseif ($tipUser == "Profesor") 
			{
				$nrMat = $this->input->post('signUpCod');
				$data = array(
					'name' => $name,
					'email' => $email,
					'pass' => md5($pass),
					'tipUser' => 1,
					'githubName' => $githubName,
					'nrMat' => $nrMat );	
					
				//se salveaza in baza de date informatiile
				$this->load->model('set');
				$ret = $this->set->register($data);

				//daca nu exista un user cu acelasi email, se redirecteaza catre pagina de login
				if ( $ret ) 
				{
					$this->load->view('login');
				}
				else {
					$this->load->view('login');	
				 } 
			}
		}
	}
?>