<?php

class Showtickets extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('showtickets_model');
    }
	public function index()
	{
        if($this->session->userdata('userID') == null){
			redirect(base_url('signin'));
		}
		else {
            $userID = $this->session->userdata('userID');
            $data['tickets'] = $this->showtickets_model->get_tickets($userID);
            $this->load->view('ticket/showtickets', $data);
        }
	}
}
?>