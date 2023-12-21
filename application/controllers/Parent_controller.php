<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parent_controller extends CI_Controller {
    
    
    
    public function index() {
    $parent_details = $this->Parent_model->get_parent_details();
    
    $data = array();
    foreach ($parent_details as $parent) {
        $data[] = array(
            'name' => $parent['name'],
            'email' => $parent['email'],
            'phone' => $parent['phone'],
            'address' => $parent['address'],
            'profession' => $parent['profession'],
            'login_status' => $parent['login_status']
        );
    }
    
    $data = json_encode(array('data' => $data)); 
    
    $this->load->view('backend/admin/parent/view_parent', array('data' => $data)); // Pass $data as an array to the view
}

    public function add_parent() {
        $this->load->view('backend/admin/parent/add_parent');
    }

    public function create() {
        // Retrieve input data
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $profession = $this->input->post('profession');
        $login_status = $this->input->post('login_status') ?? 0;
    
        $hashed_password = md5($password);
    
        // Prepare data for insertion
        $parent_data = array(
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password,
            'phone' => $phone,
            'address' => $address,
            'profession' => $profession,
            'login_status' => $login_status
        );
    
        $this->load->model('Parent_model'); // Load the Parent_model
        $this->Parent_model->add_parent($parent_data);
        redirect('backend/admin/parent/add_parent');
    }
    
    

    public function edit($parent_id) {
        // Edit a parent data
        $data['parent'] = $this->Parent_model->get_parent($parent_id);
        $this->load->view('edit_parent', $data);
    }

    public function update($parent_id) {
        // Update an existing parent data        
        $parent_data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'profession' => $this->input->post('profession'),
            'login_status' => $this->input->post('login_status')
        );

        $this->Parent_model->update_parent($parent_id, $parent_data);
        redirect('parent_controller');
    }

    public function delete($parent_id) {
        // Delete a parent
        $this->Parent_model->delete_parent($parent_id);
        redirect('parent_controller');
    }
}
