<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumni_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insertAlumniFunction()
    {
        $alumni_array = array(
            'name' => $this->input->post('name'),
            'sex' => $this->input->post('sex'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'profession' => $this->input->post('profession'),
            'marital_status' => $this->input->post('marital_status'),
            'g_year' => $this->input->post('g_year'),
            'club_id' => $this->input->post('club_id'),
            'interest' => $this->input->post('interest')
            // Add other fields as needed in the alumni table
        );

        $check_email = $this->db->get_where('alumni', array('email' => $alumni_array['email']))->row()->email;
        if ($check_email != null) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
            redirect(base_url() . 'admin/alumni/', 'refresh');
        } else {
            $this->db->insert('alumni', $alumni_array);
            $alumni_id = $this->db->insert_id();
            // Handle file uploads if necessary for alumni
        }
    }

    function updateAlumniFunction($alumni_id)
    {
        if (!$alumni_id) {
            return false;
        }

        $alumni_data = array(
            'name' => $this->input->post('name'),
            'sex' => $this->input->post('sex'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'profession' => $this->input->post('profession'),
            'marital_status' => $this->input->post('marital_status'),
            'g_year' => $this->input->post('g_year'),
            'club_id' => $this->input->post('club_id'),
            'interest' => $this->input->post('interest')
            // Add other fields as needed
        );

        $this->db->where('alumni_id', $alumni_id);
        $this->db->update('alumni', $alumni_data);

        $updated_rows = $this->db->affected_rows();
        if ($updated_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function deleteAlumniFunction($alumni_id)
    {
        if (!$alumni_id) {
            return false;
        }

        $this->db->where('alumni_id', $alumni_id);
        $this->db->delete('alumni');

        $deleted_rows = $this->db->affected_rows();
        if ($deleted_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
