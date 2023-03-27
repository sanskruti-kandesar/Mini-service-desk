<?php
class Main_model extends CI_Model {
    function getStudents() {
        $this->db->select('*');
        $query = $this->db->get('students');
        return $query->result_array();
    }
}
?>