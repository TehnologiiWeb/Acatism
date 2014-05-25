<?php

	class MyProfileProfesor extends CI_Controller {

		public function index() {

			$user = $this->session->userdata('user');

			$this->load->view('myProfileProfesor');

			if($user) {
				$this->load->model('get');

				/* am nevoie de informatii din bd despre:
					-progres
					-ultimele commituri
					-detaliile proiectului (descriere cel putin)
					-feedback de la profesor (trebuie facut cumva)
				*/
			}
		}
	}

?>