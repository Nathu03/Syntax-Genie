<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parent_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Initialize the database
    }

    public function get_parents() {
        // Retrieve all parents
        return $this->db->get('parent')->result_array();
    }

    public function add_parent($data) {
        // Insert a new parent into the db
        $this->db->insert('parent', $data);
    }

    public function get_parent($parent_id) {
        // Retrieve a specific parent data by ID
        return $this->db->get_where('parent', array('parent_id' => $parent_id))->row_array();
    }

    public function update_parent($parent_id, $data) {
        // Update an existing parent data
        $this->db->where('parent_id', $parent_id);
        $this->db->update('parent', $data);
    }

    public function delete_parent($parent_id) {
        // Delete a parent data using by ID
        $this->db->where('parent_id', $parent_id);
        $this->db->delete('parent');
    }
}
?>
