<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_status_login();
        $this->load->model('User_model');
    }

    public function index()
    {

        $data['title'] = 'My Profile';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $this->template->load('default', 'contents', 'user/index', $data);
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $this->template->load('default', 'contents', 'user/edit', $data);
    }

    public function edit_process()
    {
        // validation form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi', 'trim|matches[password]');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('user/edit/' . $this->input->post('id'));
        } else {

            // check file 
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 10240;

            // load library
            $this->load->library('upload', $config);

            if (!empty($_FILES['image']['name'])) {
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('user/edit');
                } else {
                    $data = $this->upload->data();
                    $update = array(
                        'username'      => $this->input->post('username'),
                        'name'      => $this->input->post('name'),
                        'image'          => $data['file_name'],
                    );
                }
            } else {
                $update = array(
                    'username'      => $this->input->post('username'),
                    'name'      => $this->input->post('name')
                );
            }

            if (!empty($this->input->post('password'))) {
                $update['password'] = md5($this->input->post('password'));
            }

            $where = array('id' => $this->input->post('id'));

            // insert process
            $return = $this->User_model->update_users($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('user/edit/' . $this->input->post('id'));
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('user/edit/' . $this->input->post('id'));
            }
        }
    }

    public function staff()
    {

        $data['title'] = 'Manage Staff';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data = $this->User_model->get_total_users();

        // assign data
        $this->template->set('title', 'users usershop Ku');
        $this->template->load('default', 'contents', 'user/manage-staff.php', $data);
    }
}
