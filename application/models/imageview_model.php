<?php
class Imageview_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    public function get_path($ticketID) {
        $this->db->select('imagePath');
        $query = $this->db->get_where('tickets', array('ticketID' => $ticketID));
        return $query->result_array();
    }
}
?>