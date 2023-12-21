<?php


class Alumni_controller extends CI_Controller {
    public function index() {
        $this->load->model('Alumni_model');
        $this->load->view('backend/admin/alumni/view_alumni');
    }

    public function get_alumni_details() {
        $this->load->model('Alumni_model');
        $alumni_details = $this->Alumni_model->get_alumni_details();
        echo json_encode(array('data' => $alumni_details));
    }

    public function create_alumni() {
        $this->load->view('backend/admin/alumni/create_alumni');
    }

    public function add_alumni() {
        $this->load->model('Alumni_model');
        
        $data = array(
            'name' => $this->input->post('name'),
            'sex' => $this->input->post('sex'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'profession' => $this->input->post('profession'),
            'marital_status' => $this->input->post('marital_status'),
            'g_year' => $this->input->post('g_year'),
            'club_id' => $this->input->post('club_id'),
            'interest' => $this->input->post('interest'),
        );
    
        $insert = $this->Alumni_model->add_alumni($data);
    
        if ($insert) {
            redirect('admin/alumni');
        } else {
              // false / error message
        }
    }
    

    public function edit_alumni($alumni_id) {
        $this->load->model('Alumni_model');
        $alumni_data['alumni'] = $this->Alumni_model->get_alumni_by_id($alumni_id);
        $this->load->view('backend/admin/alumni/edit_alumni', $alumni_data);
    }

    public function update_alumni() {
        $this->load->model('Alumni_model');

        $alumni_id = $this->input->post('alumni_id');

        $data = array(
            'name' => $this->input->post('name'),
            'sex' => $this->input->post('sex'),
        );

        $update = $this->Alumni_model->update_alumni($alumni_id, $data);

        if ($update) {
            redirect('admin/alumni');
        } else {
            // false / error message
        }
    }

    public function delete_alumni($alumni_id) {
        $this->load->model('Alumni_model');
        $delete = $this->Alumni_model->delete_alumni($alumni_id);

        if ($delete) {
            redirect('admin/alumni');
        } else {
            // false / error message
        }
    }
}
