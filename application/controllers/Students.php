<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_status_login();
        $this->load->model('User_model');
        $this->load->model('Students_model');
    }

    public function index()
    {

        $data['title'] = 'Manage Students';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['students'] = $this->Students_model->get_total_students();
        $this->template->load('default', 'contents', 'students/index', $data);
    }


    public function add()
    {
        $data['title'] = 'Add Students';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $this->template->load('default', 'contents', 'students/add', $data);
    }


    public function add_process()
    {
        // validation form
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('place_birth', 'Place_birth', 'required|trim');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('religion', 'Religion', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('students/add');
        } else {
            //NIK check
            $nis = $this->Students_model->check_nis($this->input->post('nis'));
            if ($nis) {
                $this->session->set_flashdata('error', 'nis sudah digunakan !!');
                redirect('students/add');
            }
            $insert = array(
                'nis'      => $this->input->post('nis'),
                'name'      => $this->input->post('name'),
                'place_birth'     => $this->input->post('place_birth'),
                'birthday'        => $this->input->post('birthday'),
                'gender'        => $this->input->post('gender'),
                'religion'        => $this->input->post('religion'),
                'address'        => $this->input->post('address'),
                'created_at'             => date('Y-m-d H:i:s'),
                // 'update_at'             => date('Y-m-d H:i:s'),
            );

            // insert process
            $return = $this->Students_model->insert_students($insert);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('students/add/');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('students/add/');
            }
        }
    }

    public function edit($id = '')
    {

        if (empty($id)) {
             $this->session->set_flashdata('error', 'Access Forbiden !!');
            redirect('students');
        }

        $data['title'] = 'Edit Students';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['detail'] = $this->Students_model->get_detail_students($id);
        $this->template->load('default', 'contents', 'students/edit', $data);

    }

    public function edit_process()
    {
        // validation form
        $this->form_validation->set_rules('nis', 'Nis', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('place_birth', 'Place_birth', 'required|trim');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('religion', 'Religion', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('students/edit/' . $this->input->post('id_students'));
        } else {
            $update = array(
                'name'      => $this->input->post('name'),
                'place_birth'     => $this->input->post('place_birth'),
                'birthday'        => $this->input->post('birthday'),
                'gender'        => $this->input->post('gender'),
                'religion'        => $this->input->post('religion'),
                'address'        => $this->input->post('address'),
                'update_at'             => date('Y-m-d H:i:s'),
            );

            $where = array('id_students' => $this->input->post('id_students'));

            // update process
            $return = $this->Students_model->update_students($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data saved successfully!!');
                redirect('students/edit/' . $this->input->post('id_students'));
            } else {
                $this->session->set_flashdata('error', 'Data failed to save  !!');
                redirect('students/edit/' . $this->input->post('id_students'));
            }
        }
    }

    public function delete($id = '')
    {
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('students');
        }
        // get detail
        $data = $this->Students_model->get_detail_students($id);
        if (!empty($data)) {
            // delete process
            if ($this->Students_model->delete_students(array('id_students' => $id))) {
                // notification
                $this->session->set_flashdata('success', 'Data successfully deleted!!');
                redirect('students');
            } else {
                // notification
                $this->session->set_flashdata('error', 'Data failed to delete !!');
                redirect('students');
            }
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data failed to delete !!');
            redirect('students');
        }
    }
}
