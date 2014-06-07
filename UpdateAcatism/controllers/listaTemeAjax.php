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

			$tipStud = $this->get->get_tipStudent($user['id']);

			if ($tipStud == 'Licenta')
				$tipStud = 0;
			else
				$tipStud = 1;

			$query = $this->get->getSearch($search, $tipStud);

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