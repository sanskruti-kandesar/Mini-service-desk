<?php

class Signin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('signin_model');
    }

	// public function index()
	// {
	// 	$this->load->helper(array('form', 'url'));

	// 	$this->load->library('form_validation');
	// 	$this->load->library('session','database');

	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
	// 	if ($this->form_validation->run() == FALSE)
	// 	{
	// 		if($this->session->userdata('userID') == null){
	// 			// $this->load->view('main');
	// 		}
	// 		else {
	// 			redirect(base_url());
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$this->process();
	// 	}
	// }

	public function process() {
		$userdata = json_decode(file_get_contents('php://input'));
		$email = $userdata->email;
		$password = md5($userdata->password);
		// var_dump($userdata->email);

		$query = $this->db->query("SELECT * FROM `users` WHERE `userEmail` = '$email' AND `userPassword` = '$password'");
			if($query->num_rows() == 1) {
				// var_dump($userdata->email);
				$data['users'] = $this->signin_model->get_data($email);
				$userID = $data['users']['userID'];
				$this->session->set_userdata('userID', $userID);
				$response = array('status' => 'success');
				
				$this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode($response));
			}
			else if($query->num_rows() == 0){
				$response = array(
					'status' => 'failed',
					'message' => 'USER DOES NOT EXISTS'
				);
				$this->output->set_output(json_encode($response));
			}
	}
	}
?>