<?php

class Addticket extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('addticket_model');
    }
	// public function index()
	// {
    //     var_dump('xyz');
    //     $this->load->helper(array('form', 'url'));
    //     $this->load->library('form_validation');
	// 	$this->load->library('session','database');

    //     $this->form_validation->set_rules('subject', 'subject', 'required');
	// 	$this->form_validation->set_rules('message', 'message', 'required');

    //     if ($this->form_validation->run() == FALSE)
	// 	{
    //         // if($this->session->userdata('userID') == null){
    //         //     redirect(base_url('signin'));
    //         // }
    //         // else {
    //             $this->load->view('main');
    //         // }
	// 	}
	// 	else
	// 	{
	// 		$this->create();
	// 	}
	// }
   
    public function create() {
        $data = json_decode(file_get_contents('php://input'));
        $userID = $this->session->userdata('userID');
        $subject = $data->subject;
        $message = $data->message;
        $category = $data->category;
        $config['upload_path'] = "";
       

    //   var_dump($this->session->userdata('userID'));
        // insert ticket into database
        $this->addticket_model->set_data($userID, $subject, $message, $category, $config['upload_path']);
        $response = array(
            'status' => 'success',
            'message' => 'TICKET ADDED'
        );
        
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    // $response = array('success');

        // $config['upload_path'] = "";
        // if((isset($_FILES['attachment'])) && ($_FILES['attachment']['size'] > 0)) {
        //     $file = $_FILES['attachment'];
            
        //     $file_name = pathinfo($file['name'], PATHINFO_FILENAME);
        //     $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        //     $filename = $file_name . "_" .  round(microtime(true) * 1000) . "." .  $file_extension;
        //     $upload = './uploads/' . $userID . '/';
        //     $filepath = $upload . $filename;
            
        //     if(!is_dir($upload)){
        //         mkdir($upload);
        //     }
        //     $config['upload_path'] = $filepath;
        //     $this->load->library('upload', $config);
        //     move_uploaded_file($file['tmp_name'], $filepath);
        //     echo "<span style='color: #FF0000'>" . "FILE UPLOADED" . "</span>";
        // }  

    
    
   
    
    }
}
?>