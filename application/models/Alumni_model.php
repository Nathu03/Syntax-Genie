<?php
class Alumni_model extends CI_Model {
    public function get_alumni_details() {
        // Fetch alumni details from the database
        return $this->db->get('alumni')->result_array();
    }
}
