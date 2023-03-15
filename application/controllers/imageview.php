<?php

class Imageview extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('imageview_model');
    }
	public function index($ticketID)
	{
        $data['tickets'] = $this->imageview_model->get_path($ticketID);
	    $this->load->view('ticket/imageview', $data);
	}
}
?>