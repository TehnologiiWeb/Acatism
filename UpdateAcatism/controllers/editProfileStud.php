<?php

	class EditProfileStud extends CI_Controller
	{
		public function index() 
		{ 
			$user = $this->session->userdata('user'); 

			if ($user) 
			{ 
				if (isset($_POST['signUpName']) && isset($_POST['an']) && isset($_POST['signUpGrupa']) && 
					isset($_POST['tipUser']) && isset($_POST['signUpEmail']) && isset($_POST['signUpPassword']) && 
					isset($_POST['signUpGithub'])) 
				{ 
					$nume = $this->input->post('signUpName');
					$email = $this->input->post('signUpEmail'); 
					$pass = $this->input->post('signUpPassword'); 
					$git = $this->input->post('signUpGithub');
					$tipStudii = $this->input->post('tipUser');
					$anStudiu = $this->input->post('an');
					$grupa = $this->input->post('signUpGrupa');

					$data = array( 
						'id' => $user['id'], 
						'nume' => $nume,
						'anStudiu' => $anStudiu,
						'grupa' => $grupa,
						'tipStudii' => $tipStudii, 
						'email' => $email, 
						'pass' => md5($pass), 
						'git' => $git 
						);

					$this->load->model('set');
					$this->set->editStud($data); 
					
					$user['email'] = $data['email']; 
					$user['githubName'] = $data['git'];

					redirect(base_url('myProfileStudent'));
				} 
				else
				{
					$this->load->model('get');
					$infoUser = $this->get->get_infoStud($user['id']);

					$info['id'] = $user['id'];
					$info['nume'] = $infoUser['nume'];
					$info['anStudiu'] = $infoUser['anStudiu'];
					$info['grupa'] = $infoUser['grupa'];
					$info['tipStudii'] = $infoUser['tipStudii'];
					$info['email'] = $user['email'];
					$info['git'] = $user['githubName'];

					$this->load->view('editProfileStud', $info); 
				} 
			}
			else
				redirect(base_url('login')); 
		}
	}
?>