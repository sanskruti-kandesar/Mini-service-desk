<?php

class Addticket extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('addticket_model');
    }
	public function index()
	{
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('session','database');

        $this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('message', 'message', 'required');

        if ($this->form_validation->run() == FALSE)
		{
            if($this->session->userdata('userID') == null){
                redirect(base_url('signin'));
            }
            else {
                $this->load->view('ticket/addticket', array('error' => ' ' ));
            }
		}
		else
		{
			$this->create();
		}
	}

    public function create() {
        $userID = $this->session->userdata('userID');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $category = $this->input->post('category');
        $config['upload_path'] = "";

        if((isset($_FILES['attachment'])) && ($_FILES['attachment']['size'] > 0)) {
            $file = $_FILES['attachment'];
            
            $file_name = pathinfo($file['name'], PATHINFO_FILENAME);
            $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = $file_name . "_" .  round(microtime(true) * 1000) . "." .  $file_extension;
            $upload = './uploads/' . $userID . '/';
            $filepath = $upload . $filename;
            
            if(!is_dir($upload)){
                mkdir($upload);
            }
            $config['upload_path'] = $filepath;
            $this->load->library('upload', $config);
            move_uploaded_file($file['tmp_name'], $filepath);
            // echo "<span style='color: #FF0000'>" . "FILE UPLOADED" . "</span>";
        }  
		$this->addticket_model->set_data($userID, $subject, $message, $category, $config['upload_path']);
		// echo "<span style='color: #FF0000'>" . "TICKET SUBMITTED" . "</span>";
        redirect(base_url('showtickets'));
    }
}
?>