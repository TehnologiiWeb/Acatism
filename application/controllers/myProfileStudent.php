<?php

	class MyProfileStudent extends CI_Controller {

		public function index() {

			$user = $this->session->userdata('user');

			

			// if($user) {
				$this->load->model('get');
				$ceva = "--1212";

				$data = array("ceva" => $ceva);


			$this->load->view('myProfileStudent', $data);

				/* am nevoie de informatii din bd despre:
					-progres
					-ultimele commituri
					-detaliile proiectului (descriere cel putin)
					-feedback de la profesor (trebuie facut cumva)
				*/
			// }
		}
	}

?>