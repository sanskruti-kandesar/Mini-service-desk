<?php

class Signin_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    public function get_data($userEmail){
        $query = $this->db->get_where('users',array('userEmail' => $userEmail));
        return $query->row_array();
    }
}

?>