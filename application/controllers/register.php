<?php

class Register extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('register_model');
    }

	// public function index()
	// {
	// 	// $this->load->helper(array('form', 'url'));

	// 	$this->load->library('form_validation');
	// 	$this->load->library('session','database');

	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	// 	$this->form_validation->set_rules('confirmPassword', 'confirmPassword', 'trim|required');

	// 	if ($this->form_validation->run() == FALSE)
	// 	{
	// 		if($this->session->userdata('userID') == null){
	// 			$this->load->view('main');
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
		$name = $userdata->name;
		$email = $userdata->email;
		$password = md5($userdata->password);
		$confirmPassword = md5($userdata->conpassword);
		
		if($password == $confirmPassword){

		$query = $this->db->query("SELECT * FROM `users` WHERE `userEmail` = '$email'");
		if($query->num_rows() == 0) { 
			$this->register_model->set_data($name, $email, $password);
			$response = array(
				'status' => 'success',
				'message' => 'USER REGISTERED'
			);
			
			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
		else if($query->num_rows() > 0) {
			$response = array(
				'status' => 'failed',
				'message' => 'USER ALREADY EXISTS'
			);
			
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
	}
	else if($password != $confirmPassword){
		$response = array(
			'status' => 'failed',
			'message' => 'PASSWORD DOES NOT MATCH'
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}}
}
?>