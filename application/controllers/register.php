<?php

class Register extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('register_model');
    }

	public function index()
	{
		// $this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->load->library('session','database');

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirmPassword', 'confirmPassword', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('userID') == null){
				$this->load->view('authentication/register');
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
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$confirmPassword = md5($this->input->post('confirmPassword'));

		$query = $this->db->query("SELECT * FROM `users` WHERE `userEmail` = '$email'");
		if($query->num_rows() == 0) { 
			$this->register_model->set_data($name, $email, $password);
			// echo "<span style='color: #FF0000'>" . "USER REGISTERED" . "</span>";
			$this->load->view('authentication/register');
		}
		else if($query->num_rows() > 0) {
			echo "<span style='color: #FF0000'>" . "USER ALREADY EXISTS" . "</span>";
		}
	}
}
?>