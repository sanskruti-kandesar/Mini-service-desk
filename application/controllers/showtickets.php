<?php

class Showtickets extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('showtickets_model');
    }
	// public function index()
	// {
    //     if($this->session->userdata('userID') == null){
	// 		redirect(base_url('signin'));
	// 	}
	// 	else {
    //         $this->load->view('main');
    //     }
	// }
    // call this function from $Angular $http request
    public function getTickets() {
        $userID = $this->session->userdata('userID');
        $data = $this->showtickets_model->get_tickets($userID);
        echo json_encode($data);
    }
}
?>