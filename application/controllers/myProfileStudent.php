<?php

	class MyProfileStudent extends CI_Controller {

		public function index() {

			$user = $this->session->userdata('user');

			$this->load->view('myProfileStudent');

			if($user) {

			}
		}
	}

?>