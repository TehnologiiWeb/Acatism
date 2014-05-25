<?php

	class ProiecteleMeleProf extends CI_Controller {

		public function index() {

			$user = $this->session->userdata('user');

				$this->load->model('get');
				$ceva = "--1212";

				$data = array("ceva" => $ceva);


			$this->load->view('proiecteleMeleProf', $data);

		}
	}

?>