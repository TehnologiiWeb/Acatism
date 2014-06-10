<?php

	class MyProfileProfesor extends CI_Controller {

		public function index() 
		{

			$user = $this->session->userdata('user');
			$realizat = 1;

			if($user) 
			{
				if (isset($_POST['nume']) && isset($_POST['tip']))
				{
					$nume = $this->input->post('nume');
					$tip = $this->input->post('tip');
					$descriere = $this->input->post('descriere');
					
					$this->load->model('get');
					$ok = $this->get->validNume($nume);
					
					if ($ok == 1)
					{
					
						if ($tip == 'licenta')
							$nr = 0;
						else
							if ($tip == 'master')
								$nr = 1;

						$data = array(
								'idProf' => $user['id'],
								'description' => $descriere,
								'titlu' => $nume,
								'tipTema' => $nr
									);
					
						$this->load->model('set');
						$mesaj = $this->set->adaugaTema($data);
						$realizat = 1;
					}
					else
					{
						$realizat = 0;
					}
				}

				$this->load->model('get');
				$data['rows'] = $this->get->getAllProjects($user);
				
				if ($realizat == 1)
					$data['realizat'] = 1;
				else
					$data['realizat'] = 0;

				$this->load->view('myProfileProfesor', $data);
			}
			else
				echo "Eroare la incarcarea paginii.";
		}

		public function myStudents()
		{
			$user = $this->session->userdata('user');
			
			if($user)
			{
				$this->load->model('get');
				$data['rows'] = $this->get->myStudents($user);

				$this->load->view('myStudents', $data);
			}	
		}

		public function editProfile()
		{
			$user = $this->session->userdata('user');

			if ($user)
			{
				if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) 
						&& isset($_POST['github']))
				{
					$nume = $this->input->post('name');
					$email = $this->input->post('email');
					$pass = $this->input->post('password');
					$git = $this->input->post('github');
					$data = array(
								'id' => $user['id'],
								'nume' => $nume,
								'email' => $email,
								'pass' => md5($pass),
								'git' => $git
								);
					$this->load->model('set');
					$this->set->editProf($data);

					$user['email'] = $data['email'];
					$user['githubName'] = $data['git'];
					
					redirect(base_url('/myProfileProfesor'));
				}
				else
				{
					$this->load->model('get');
					$data['rows'] = $this->get->editProfileProf($user);
				
					$this->load->view('editProfileProf', $data);
				}
			}
		}

		public function listRequests()
		{
			
			$user = $this->session->userdata('user');

			if ($user)
			{
				
				$this->load->model('get');
				$data['rows'] = $this->get->getRequests($user);

				$this->load->view('requestsProf', $data);
			}
		}

		public function requestsProfAcc()
		{
			$user = $this->session->userdata('user');

			if ($user)
			{
				$id = $this->input->get('id');
				$idStud = $this->input->get('idStud');

				$this->load->model('get');
				$studInfo = $this->get->getStudInfo($idStud);
				$data = $this->get->getNumeTema($id);

				$dataTemeAlese = array(
									'idStud' => $idStud,
									'idProf' => $user['id'],
									'idTema' => $data['id'],
									);

				$this->load->model('set');
				$this->set->addTema($dataTemeAlese);
				$this->set->deleteAplicari($data['id'], $idStud);
			}
			redirect(base_url('myProfileProfesor/listRequests'));
		}

		public function requestsProfRes()
		{
			$id = $this->input->get('id');
			$idStud = $this->input->get('idStud');
			
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

			redirect(base_url('myProfileProfesor/listRequests'));
		}

	}

?>