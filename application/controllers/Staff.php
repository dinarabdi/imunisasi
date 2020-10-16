<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_status_login();
        $this->load->model('User_model');
        $this->load->model('Staff_model');
    }

    public function index()
    {

        $data['title'] = 'Manage Users';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['staff'] = $this->Staff_model->get_total_users();
        $this->template->load('default', 'contents', 'staff/index', $data);
    }

    public function add()
    {
        $data['title'] = 'Add Users';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['role'] = $this->Staff_model->getRole();
        $this->template->load('default', 'contents', 'staff/add', $data);
    }


    public function add_process()
    {
        // validation form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Role Id', 'required');
        $this->form_validation->set_rules('is_active', 'Status', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi', 'required|matches[password]');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('staff/add');
        } else {
            // check  username
            $username = $this->Staff_model->check_username($this->input->post('username'));
            if ($username) {
                $this->session->set_flashdata('error', 'Username sudah digunakan !!');
                redirect('staff/add');
            }

            // check file 
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 10240;

            // load library
            $this->load->library('upload', $config);

            if (!empty($_FILES['image']['name'])) {
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('staff/add');
                } else {
                    $data = $this->upload->data();
                    $insert = array(
                        'name'      => $this->input->post('name'),
                        'username'         => $this->input->post('username'),
                        'role_id'     => $this->input->post('role_id'),
                        'is_active'        => $this->input->post('is_active'),
                        'password'      => md5($this->input->post('password')),
                        'image'          => $data['file_name'],
                    );
                }
            } else {
                $insert = array(
                    'name'      => $this->input->post('name'),
                    'username'         => $this->input->post('username'),
                    'role_id'     => $this->input->post('role_id'),
                    'is_active'        => $this->input->post('is_active'),
                    'password'      => md5($this->input->post('password')),
                );
            }


            // insert process
            $return = $this->Staff_model->insert_users($insert);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('staff/add/');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('staff/add/');
            }
        }
    }


    public function edit($id = '')
    {

        if (empty($id)) {
            $this->session->set_flashdata('error', 'Access Forbiden !!');
            redirect('staff');
        }

        $data['title'] = 'Edit Users';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['detail'] = $this->Staff_model->get_detail_staff($id);
        $data['role'] = $this->Staff_model->getRole();
        $this->template->load('default', 'contents', 'staff/edit', $data);
    }

    public function edit_process()
    {
        // validation form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Role Id', 'required');
        $this->form_validation->set_rules('is_active', 'Status', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi', 'matches[password]');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('staff/edit/' . $this->input->post('id'));
        } else {
            $username = $this->Staff_model->check_username_edit($this->input->post('username'), $this->input->post('id'));
            if ($username) {
                $this->session->set_flashdata('error', 'Username sudah digunakan !!');
                redirect('staff/edit/' . $this->input->post('id'));
            }
            // check file 
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 10240;

            // load library
            $this->load->library('upload', $config);

            if (!empty($_FILES['image']['name'])) {
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('staff/edit');
                } else {
                    $data = $this->upload->data();
                    $update = array(
                        'name'      => $this->input->post('name'),
                        'username'         => $this->input->post('username'),
                        'role_id'     => $this->input->post('role_id'),
                        'is_active'        => $this->input->post('is_active'),
                        'image'          => $data['file_name'],
                    );
                }
            } else {
                $update = array(
                    'name'      => $this->input->post('name'),
                    'username'         => $this->input->post('username'),
                    'role_id'     => $this->input->post('role_id'),
                    'is_active'        => $this->input->post('is_active'),
                );
            }

            if (!empty($this->input->post('password'))) {
                $update['password'] = md5($this->input->post('password'));
            }

            $where = array('id' => $this->input->post('id'));

            // insert process
            $return = $this->Staff_model->update_users($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data saved successfully!!');
                redirect('staff/edit/' . $this->input->post('id'));
            } else {
                $this->session->set_flashdata('error', 'Data failed to save  !!');
                redirect('staff/edit/' . $this->input->post('id'));
            }
        }
    }

    public function delete($id = '')
    {
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('staff');
        }
        // get detail
        $data = $this->Staff_model->get_detail_staff($id);
        if (!empty($data)) {
            // delete process
            if ($this->Staff_model->delete_users(array('id' => $id))) {
                // notification
                $this->session->set_flashdata('success', 'Data successfully deleted!!');
                redirect('staff');
            } else {
                // notification
                $this->session->set_flashdata('error', 'Data failed to delete !!');
                redirect('staff');
            }
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data failed to delete !!');
            redirect('staff');
        }
    }
}
