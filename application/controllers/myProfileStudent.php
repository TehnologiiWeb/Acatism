<?php

	//require_once 'vendor/autoload.php';

	class MyProfileStudent extends CI_Controller {

		
		public function index() {

			$user = $this->session->userdata('user');

			if ($user) 
			{
				$dataView = array();

				// de realizat
				$this->load->model('get');
				$tasks = $this->get->get_tasks($user['id']);
				if ($tasks == FALSE)
					$tasks = "Nu aveti niciun task de realizat momentan!";
				//echo 'Taskuri: ';
				//print_r($tasks);

				//activitate recenta
				$data = $this->get->get_profesor_tema($user);
				if ($data == FALSE)
				{
					$commits = "Nu aveti niciun repository!";

					$dataView['task'] = $tasks;
					$dataView['commit'] = "Nu s-a efectuat niciun commit pentru acest repository!";
					$dataView['detalii'] = "Nu aveti nicio tema momentan!";
					$dataView['feedback'] = "Nu aveti nicio notificare momentan!";
				}
				else
				{
					$commits = $this->get_commits($data);
					if ($commits == FALSE)
					{
						$commits = "Nu s-a efectuat niciun commit pentru acestui repository!";	
					}
					//echo 'Commits: ';
					//print_r($commits);

					//detalii proiect in lucru
					$details = $this->get->get_infoTema($data['tema']['idTema']);
					$numeProf = $this->get->get_numeProf($data['profesor']['id']);
					if ($details == FALSE)
					{
						$detalii = "Nu aveti nicio tema momentan!";
					}
					else
					{
						$detalii = array();
						$detalii['titlu'] = $details['titlu'];
						$detalii['descriere'] = $details['description'];
						$detalii['profesor'] = $numeProf;
					}

					//echo 'Detalii: ';
					//print_r($detalii);

					//Feedback de la profesor
					if (is_array($detalii))
					{
						$issues = $this->get_issues($detalii['titlu'], $data['profesor']['github']);
						if ($issues == FALSE)
							$issues = "Nu aveti nicio notificare momentan!";
						//echo 'Issues';
						//print_r($issues);

						$dataView['task'] = $tasks;
						$dataView['commit'] = $commits;
						$dataView['detalii'] = $detalii;
						$dataView['feedback'] = $issues;
					}
				}
				//echo 'Date pt view: ';
				//print_r($dataView);
				//$this->load->view('myProfileStudent', $dataView);
				$this->load->view('myProfileStudent', $dataView);
			}
			else
			{
				redirect(base_url('login'));
			}

		}

		public function get_commits($data)
		{
			// vectorul cu toate committurile care voi fi transmise view-ului
			$commits = array();
			$contorCommits = 0;

			$this->load->model('get');

			$tema = $this->get->get_infoTema($data['tema']['idTema']);
			$repository = $tema['titlu'];

			$url = 'https://api.github.com/repos/Acatism/' . $repository . '/commits';

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $url,
				CURLOPT_USERAGENT => 'Codular Sample cURL Request',
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
			    CURLOPT_USERPWD => "Acatism:acatismweb1"
			));

			$resp = curl_exec($curl);
			curl_close($curl);

			if ($resp == null) {
				return false;
			}
			else 
			{
				$rsp = json_decode($resp);
				$contor = 1;

				if (count($rsp) > 0)
				{
					foreach ($rsp as $com) 
					{
						if ($contor < 4)
						{
							$comm = array();
							$comm['committer'] = $com->commit->committer->name;
							//echo "Commiter: ";
							//print_r($com->commit->committer->name);
							//echo "<html><br /></html>";
							$comm['message'] = $com->commit->message;
							//echo "Message: ";
							//print_r($com->commit->message);
							//echo "<html><br /></html>";
							$sha = $com->sha;

							//$comm['files'] = array();

							$c = curl_init();
							curl_setopt_array($c, array(
							   CURLOPT_RETURNTRANSFER => 1,
							   CURLOPT_URL => 'https://api.github.com/repos/Acatism/' . $repository. '/commits/' . $sha,
							   CURLOPT_USERAGENT => 'Codular Sample cURL Request',
							   CURLOPT_SSL_VERIFYPEER => false,
							   CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
			    			   CURLOPT_USERPWD => "Acatism:acatismweb1"
							));

							$response = curl_exec($c);
							curl_close($c);

							if ($response == null) 
							{
								return false;
							}
							else 
							{
								$files = array();
								$contorFiles = 0;

								$r = json_decode($response);
								//echo "Files: ";
								foreach ($r->files as $f) 
								{
									$file = array();
									$file['name'] = $f->filename;
									//echo "Name: ";
									//print_r($f->filename);
									//echo "Status: ";
									$file['status'] = $f->status;
									//print_r($f->status);
									//echo "<html><br /></html>";
									$files[$contorFiles] = $file;
									$contorFiles += 1;
								}
								$comm['files'] = $files;
							}
							$commits[$contorCommits] = $comm;
							$contorCommits += 1;
							//echo "<html><br /><br /></html>";
							$contor += 1;
						}
					}
					return $commits;
				}
				else
				{
					return false;
				}
			}
		}

		public function get_issues($repo, $numeProf)
		{
			$issues = array();
			$contorIssues = 0;

			$curl = curl_init();

			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => 'https://api.github.com/repos/Acatism/' . $repo . '/issues',
			    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
			    CURLOPT_SSL_VERIFYPEER => false,
			    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
			    CURLOPT_USERPWD => "Acatism:acatismweb1" 
			));

			$resp = curl_exec($curl);
			curl_close($curl);

			if ($resp == null) {
				return false;
			}
			else 
			{	
				$rsp = json_decode($resp);
				if (count($rsp) > 0)
				{
					foreach ($rsp as $key) 
					{
						if ($key->user->login == $numeProf)
						{
							$issue = array();
							//echo "Titlu: ";
							//print_r($key->title);
							$issue['titlu'] = $key->title;
							//echo "<html><br /></html>";
							//echo "Postat de: ";
							$issue['autor'] = $key->user->login;
							//print_r($key->user->login);
							//echo "<html><br /></html>";
							if (count($key->labels))
							{
								$labels = array();
								$contorLabels = 0;
								foreach ($key->labels as $labl)
								{
									$labels[$contorLabels] = $labl->name;
									$contorLabels += 1;
								}
								$issue['etichete'] = $labels;
							}
							else
								$issue['etichete'] = 0;
							//echo "Tipul notificarii: ";
							//print_r($key->labels[0]->name);
							//echo "<html><br /></html>";
							$issue['data'] = $key->created_at;
							//echo "Data crearii: ";
							//print_r($key->created_at);
							//echo "<html><br /></html>";
							$issue['continut'] = $key->body;
							//echo "Continut: ";
							//print_r($key->body);
							//echo "<html><br /><br /></html>";
							$issues[$contorIssues] = $issue;
							$contorIssues += 1;
						}
					}
					//print_r($issues);
					return $issues;
				}
				else
					return false;
			}
		}
	}
?>