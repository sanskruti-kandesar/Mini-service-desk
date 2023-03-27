<?php
class Students extends CI_Controller {

    public function __construct(){
  
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('Main_model');
    }
    public function index(){
        $this->load->view('students');
    }
    // Call this method from AngularJS $http request
    public function getStudents(){
        $data = $this->Main_model->getStudents();
        // echo "echo of controller students" . "<br>";
        echo json_encode($data);
    }

}
?>