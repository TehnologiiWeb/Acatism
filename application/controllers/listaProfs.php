<?php
	
	class ListaProfs extends CI_Controller
	{
		public function index()
		{
			$user = $this->session->userdata('user');
			$rezultatTeme = array();
			$contorTeme = 0;

			if ($user)
			{
				$this->load->model('get');
				$profesori = $this->get->get_allProfs();

				foreach ($profesori as $prof) 
				{
					$lucrari = array();
					$contorLucrari = 0;

					$teme = $this->get->get_temeProf($prof['id']);
					foreach ($teme as $tema) 
					{
						$disponibilitate = $this->get->disponibilitate_tema($tema['id']);
						$lucrare = array(
							'titlu' => $tema['titlu'],
							'tipTema' => $tema['tipTema'],
							'disp' => $disponibilitate);

						$lucrari[$contorLucrari] = $lucrare;
						$contorLucrari += 1;	
					}
					$rezultatTeme[$contorTeme] = array(
						'numeProf' => $prof['nume'],
						'teme' => $lucrari 
						);
					$contorTeme += 1;
				}
				$data['temeProfesori'] = $rezultatTeme;
				$this->load->view('listaProfs', $data);
			}
			else
				redirect(base_url('login'));
		}
	}
?>