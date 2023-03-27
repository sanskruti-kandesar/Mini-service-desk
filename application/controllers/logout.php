<?php

class Logout extends CI_Controller {
	public function index()
	{
        $this->session->sess_destroy();
		$response = array(
            'status' => 'success',
            'message' => 'LOG OUT'
        );
        
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        // redirect(base_url('signin'));
	}
}
?>