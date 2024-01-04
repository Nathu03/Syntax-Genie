<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parent_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insertParentFunction()
    {
        $parent_array = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'profession' => $this->input->post('profession'),
            'login_status' => $this->input->post('login_status')
            // Add other fields as needed for the parent table
        );

        $check_email = $this->db->get_where('parent', array('email' => $parent_array['email']))->row()->email;
        if ($check_email != null) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
            redirect(base_url() . 'admin/parent/', 'refresh');
        } else {
            $this->db->insert('parent', $parent_array);
            $parent_id = $this->db->insert_id();
            // Handle file uploads if necessary for parents
        }
    }

    function updateParentFunction($parent_id)
    {
        if (!$parent_id) {
            return false;
        }

        $parent_data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'profession' => $this->input->post('profession'),
            'login_status' => $this->input->post('login_status')
            // Add other fields as needed for the parent table
        );

        $this->db->where('parent_id', $parent_id);
        $this->db->update('parent', $parent_data);

        $updated_rows = $this->db->affected_rows();
        if ($updated_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function deleteParentFunction($parent_id)
    {
        if (!$parent_id) {
            return false;
        }

        $this->db->where('parent_id', $parent_id);
        $this->db->delete('parent');

        $deleted_rows = $this->db->affected_rows();
        if ($deleted_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
