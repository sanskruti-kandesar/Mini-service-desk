<?php
class Showtickets_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    public function get_tickets($userID) {
        $this->db->order_by("dateCreated", "desc");
        $query = $this->db->get_where('tickets', array('userID' => $userID));
        return $query->result_array();
    }
}
?>