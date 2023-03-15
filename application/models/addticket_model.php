<?php

class Addticket_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function set_data($userId, $subject, $message, $category, $imagePath) {

        $data = array(
            'ticketSubject' => $subject,
            'ticketMessage' => $message,
            'userID' => $userId,
            'category' => $category,
            'imagePath' => $imagePath
        );
        return $this->db->insert('tickets', $data);
    }
}
?>