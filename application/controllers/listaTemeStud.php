<?php

	class ListaTemeStud extends CI_Controller {

		public function index() {

			$user = $this->session->userdata('user');

			                parse_str($_SERVER['QUERY_STRING'],$_GET);

                if($this->isAjax()) {

                        $query = trim($_GET['query']);
                        $clean_query= mysql_real_escape_string($query);

                        $post_per_page=5;
                        $current_page=1;

                        if(!empty($_GET['page'])) {
                                $current_page=intval(trim($_GET['page']));
                        }

                        $clean_query= mysql_real_escape_string($query);                 

                        $posts = $this->search_model->get_posts($clean_query, $post_per_page, $current_page);

                        $totalrows=$this->search_model->get_numrows($clean_query);

                        $totalpages=ceil($totalrows/$post_per_page);

                        if($current_page==1) {
                                $start_idx=1;
                        } else {
                                $start_idx=($current_page*$post_per_page)-4;
                        }     

                        $end_idx=$start_idx+4;
                        if($current_page==$totalpages) {
                                $end_idx=$totalrows;
                        }

                        echo '{"results":[';

                        foreach($posts as $post) {

                            echo '{"postid":'.$post['ID'].', "summary":"'.$this->search_model->highlightWords($this->search_model->cleanHTML($post['post_content']), $clean_query, true).'",  "title":"'.$this->search_model->highlightWords($post['post_title'], $clean_query, true).'",                                             "url":"'.$post['guid'].'",                                         },';
                        }

                        echo '],';

                        $has_next='false';
                        $has_prev='false';
                        if($current_page<$totalpages) {
                                $has_next='true';
                        }

                        if($current_page>1)
                        {
                                $has_prev='true';
                        }

                        echo '"paging":{ "start_idx":'.$start_idx.',"end_idx":'.$end_idx.', "total":'.$totalrows.', "current":"'.$current_page.'", "pages":'.$totalpages.', "has_next":'.$has_next.', "has_prev":'.$has_prev.',}                                 }                         ';   

                } else {

                        // blah blah blah blah blah blah 
                }
        }

			$this->load->view('listaTemeStud', $data);

		}

		public function isAjax() {
			return(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest");
		}
	}

?>