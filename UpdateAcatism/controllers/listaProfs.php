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

				if ($profesori != false)
				{

					foreach ($profesori as $prof) 
					{
						$lucrari = array();
						$contorLucrari = 0;

						$teme = $this->get->get_temeProf($prof['id']);

						//print_r($teme);

						if ($teme != false)
						{
						
							foreach ($teme as $tema) 
							{
								$disponibilitate = $this->get->disponibilitate_tema($tema['id']);
								if ($disponibilitate == true)
									$disp = 1;
								else
									$disp = 0;

								$lucrare = array(
									'titlu' => $tema['titlu'],
									'tipTema' => $tema['tipTema'],
									'disp' => $disp
									);

								$lucrari[$contorLucrari] = $lucrare;
								$contorLucrari += 1;	
							}
						}
						else
							$lucrari  = "Acest profesor nu are nicio tema asociata!";

						$rezultatTeme[$contorTeme] = array(
							'numeProf' => $prof['nume'],
							'teme' => $lucrari 
							);
						$contorTeme += 1;
					}
				}
				else
					$rezultatTeme = "Nu exista niciun profesor momentan!";

				$data['temeProfesori'] = $rezultatTeme;
				$this->load->view('listaProfs', $data);
			}
			else
				redirect(base_url('login'));
		}
	}
?>