<?php

/**
* SENDS EMAIL WITH GMAIL
*/

class Email extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function git()
	{
		//require_once 'vendor/autoload.php';
	//	require_once (APPPATH .'third_party/Github/Client.php');
	//	require_once (APPPATH .'third_party/Github/ResultPagerInterface.php');
	//	require_once (APPPATH .'third_party/Github/ResultPager.php');
	//	require_once (APPPATH .'third_party/Github/Api/ApiInterface.php');
	//	require_once (APPPATH .'third_party/Github/Api/AbstractApi.php');
	//	require_once (APPPATH .'third_party/Github/Api/Authorizations.php');
	//	require_once (APPPATH .'third_party/Github/Api/CurrentUser.php');
	//	require_once (APPPATH .'third_party/Github/Api/Gists.php');
	//	require_once (APPPATH .'third_party/Github/Api/Repo.php');
	//	require_once (APPPATH .'third_party/Github/HttpClient/HttpClientInterface.php');			 
 	//	require_once (APPPATH .'third_party/Github/HttpClient/HttpClient.php');
  	//	require_once (APPPATH .'third_party/Github/HttpClient/Listener/ErrorListener.php');
   	//	require_once (APPPATH .'third_party/Github/Api/User.php');
   	//	require_once (APPPATH .'third_party/Github/HttpClient/Message/ResponseMediator.php');
     //	require_once (APPPATH .'third_party/Github/Exception/ExceptionInterface.php');
   	//	require_once (APPPATH .'third_party/Github/Exception/RuntimeException.php');
   	//	require_once (APPPATH .'third_party/Github/Exception/InvalidArgumentException.php');
   	//	require_once (APPPATH .'third_party/Github/Api/GitData.php');
   	//	require_once (APPPATH .'third_party/Github/Api/GitData/Trees.php');
   	//	require_once (APPPATH .'third_party/Github/HttpClient/Listener/AuthListener.php');
   	//	require_once (APPPATH .'third_party/Github/Api/Repository\Releases.php');
   	//	require_once (APPPATH .'third_party/Github/Api/Repository\Assets.php');
   	//	require_once (APPPATH .'third_party/Github/Api/GitData\Commits.php');
   	//	require_once (APPPATH .'third_party/Github/Exception\RuntimeException.php');
   	//	require_once (APPPATH .'third_party/Github\Api\GitData\Blobs.php');
   		
   		//require_once (APPPATH .'third_party\GitHub\API\User\User.php' );
   		//require_once (APPPATH .'third_party\GitHub\API\Authentification.php' );
   		//require_once (APPPATH .'third_party\Github\API\User\Api.php' );

		$curl = curl_init();

   		echo "A rulat";

		//$client = new \Github\Client();
		//$client->authenticate('Acatism', 'acatismweb1', Github\Client::AUTH_HTTP_PASSWORD);
		//$repositories = $client->api('user')->repositories('Acatism');
		//$data = array
		//		(
    	//		'files' => array
    	//					(
    	//					'filename.txt' => array
    	//										(
    	//										'content' => 'txt file content'
    	//										),
    	//					),
    	//		'public' => true,
    	//		'description' => 'This is an optional description'
		//		);

		//$comit = $client->api('git')->commits()->show('Acatism', 'Demo', 'master');
		//$basetree=$client->api('git')->trees()->show($userName,'appwiz',$comit['commit']    ['tree']['sha']);

		//$newBlob=$client->api('git')->blobs()->create('Acatism','Demo',array('content'=> "gitapi",'encoding'=>'base64'));

		//print_r($newBlob);
		//$gists = $client->api('gists')->all('public');
		//print_r($gists);
		//$assets = $client->api('repo')->releases()->assets()->all('twbs', 'bootstrap', 3);
	}

	public function index()
	{
		$this->load->view('newsletter');
	}

	public function send()
	{
		$this->sendMail('flor1243in_vs@yahoo.com', 'Acatism', 'Bine ai venit !');
	}


	public function sendMail($destination, $subject, $message)
	{
	
	//	$this->load->library('form_validation');

		// field name, error message, validation rules
	//	$this->form_validation->set_rules('name', 'Name', 'trim|required');
	//	$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

	//	if ($this->form_validation->run() == FALSE)
	//	{
	//		$this->load->view('newsletter');
	//	}
	//	else
	//	{
			// validation has passed. Now send the email.
			//$name = $this->input->post('name');
			//$email = $this->input->post('email');

			$this->load->library("email");
			$this->email->set_newline("\r\n");
		
			$this->email->from('acatism@gmail.com', 'Acatism');
			$this->email->to($destination);

			$this->email->subject($subject);
			$this->email->message($message);

			$path = $this->config->item('server_root');
		//	$file = $path . '/ci/attachments/newsletter1.txt';

		//	$this->email->attach($file);

			if ($this->email->send())
			{
				echo $this->email->print_debugger();
				echo 'Your email was sent.';
			}
			else
			{
				show_error($this->email->print_debugger());
			}
	//	}
	}
}
