<?php
	
	class Login extends CI_Controller {

		public function index() {

			$user = $this->session->userdata('user');

			//daca user-ul nu e deja logat
			if (!$user) 
			{
				if (isset($_POST['signInEmail']))
				{
					//preluam datele din formular
					$email = $this->input->post('signInEmail');
					$pass = $this->input->post('signInPassword');
					$this->load->model('get');

					//verificam daca datele introduse sunt corecte si daca da, setam o noua sesiune cu datele user-ului,
					//dupa care il redirectam catre pagina profilului 
					if ($user = $this->get->login($email, $pass)) 
					{
						$this->session->set_userdata('user', $user);
	
						if ($user['type'] == 0)
							redirect(base_url('myProfileStudent'));
						elseif ($user['type'] == 1) {
							redirect(base_url('myProfileProfesor'));
						}
					}
					else {
						$this->load->view('login');
					}
				}
				else
				{
					$this->load->view('login');
				}
			}
			else
			{
				if ($user['type'] == 0)
					redirect(base_url('myProfileStudent'));
				elseif ($user['type'] == 1)
					redirect(base_url('myProfileProfesor'));
			}
		}
	}
?>