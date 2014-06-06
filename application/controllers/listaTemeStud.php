<?php
	class ListaTemeStud extends CI_Controller {

		public function index() {

			$user = $this->session->userdata('user');
			$this->load->view('listaTemeStud');


			$this->load->model('get');

			$search=  $this->input->post('search');

			$isAjax = $this->input->post('isAjax');

			$query = $this->get->getSearch($search);

			if ($isAjax == 1)
			{
				echo json_encode ($query);
				die();
			}
		}

	}

?>