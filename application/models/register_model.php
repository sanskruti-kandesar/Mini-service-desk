<?php

class   Register_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function set_data($name, $email, $password) {

        $data = array(
            'userName' => $name,
            'userEmail' => $email,
            'userPassword' => $password
        );
        return $this->db->insert('users', $data);
    }
}

?>