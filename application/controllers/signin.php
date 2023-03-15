<?php

class Signin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('signin_model');
    }

	public function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->load->library('session','database');

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('userID') == null){
				$this->load->view('authentication/signin');
				$this->load->view('templates/footer');
			}
			else {
				redirect(base_url());
			}
		}
		else
		{
			$this->process();
		}
	}

	public function process() {
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("SELECT * FROM `users` WHERE `userEmail` = '$email'");
		
		if($query->num_rows() == 1) {
			$query = $this->db->query("SELECT * FROM `users` WHERE `userEmail` = '$email' AND `userPassword` = '$password'");
			if($query->num_rows() == 1) {
				// echo "login successful". "<br>";
				$data['users'] = $this->signin_model->get_data($email);
				$userID = $data['users']['userID'];
				$this->session->set_userdata('userID', $userID);
				// echo "YOUR userID is : " . $data['users']['userID'];
				redirect(base_url('addticket'));
			}
			else {
				echo "<span style='color: #FF0000'>" . "WRONG PASSWORD ENTERED" . "</span>";
			}
		}
		else {
			echo "<span style='color: #FF0000'>" . "USER DOES NOT EXISTS" . "</span>";
		}
	} 	
	}
?>