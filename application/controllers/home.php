<?php

class Home extends CI_Controller {

	public function view($page = 'home')
	{
		if($this->session->userdata('userID') == null){
			redirect(base_url('signin'));
		}
		else {
			$this->load->view('templates/header');
			$this->load->view('pages/home');
			$this->load->view('templates/footer');
		}
	
	}
}
?>