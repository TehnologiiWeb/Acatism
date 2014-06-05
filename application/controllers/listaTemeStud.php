<?php

	class ListaTemeStud extends CI_Controller {

		public function index() {

			$user = $this->session->userdata('user');
			$this->load->view('listaTemeStud');

			$this->load->model('get');

			$search=  $this->input->post('search');
			$query = $this->get->getSearch($search);
			echo json_encode ($query);

		}

	}

?>