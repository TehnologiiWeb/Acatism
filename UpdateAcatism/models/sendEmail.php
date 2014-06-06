<?php

	class SendEmail extends CI_Model
	{

		public function sendMail($destination, $subject, $message)
		{
			$this->load->library("email");
			$this->email->set_newline("\r\n");
				
			$this->email->from('acatism@gmail.com', 'Acatism');
			$this->email->to($destination);

			$this->email->subject($subject);
			$this->email->message($message);

			$path = $this->config->item('server_root');

			/*if ($this->email->send())
			{
				echo $this->email->print_debugger();
				echo 'Your email was sent.';
			}
			else
			{
				show_error($this->email->print_debugger());
			}*/
		}
	}
?>