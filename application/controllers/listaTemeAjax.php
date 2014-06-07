<?php
class ListaTemeAjax extends CI_Controller {

	public function index() 
	{
		$user = $this->session->userdata('user');

		if ($user)
		{

			$this->load->model('get');

			$search= $this->input->post('search');

			$isAjax = $this->input->post('isAjax');

			$query = $this->get->getSearch($search, $user['type']);

			if ($isAjax == 1)
			{
				echo json_encode ($query);
				die();
			}
		}
		else
			redirect(base_url('login'));
	}
}
?>