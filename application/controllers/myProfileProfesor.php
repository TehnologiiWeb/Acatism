<?php

	class MyProfileProfesor extends CI_Controller {

		public function index() {

			$user = $this->session->userdata('user');

		if($user) 
			{
				$this->load->model('get');
				$data['rows'] = $this->get->getAllProjects($user);
				$this->load->view('myProfileProfesor', $data);

				/* am nevoie de informatii din bd despre:
					-progres
					-ultimele commituri
					-detaliile proiectului (descriere cel putin)
					-feedback de la profesor (trebuie facut cumva)
				*/
			}
			else
				echo "Eroare la incarcarea paginii.";
		}
	}

?>