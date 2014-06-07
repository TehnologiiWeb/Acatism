<?php 

Class Delogare extends CI_Controller {

	public function index() {

		$this->session->unset_userdata('user');
		redirect(base_url('login'));

	}
}
?>