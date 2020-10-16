<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_status_login();
        $this->load->model('User_model');
        $this->load->model('Master_model');
    }

    public function index()
    {
// get search data
        $search = $this->session->userdata('member_search');
        if (!empty($search)) {
            $data['no_rm'] = $search['no_rm'];
            $data['nama'] = $search['nama'];
            $nama = '%'.$search['nama'].'%';
            $no_rm = '%'.$search['no_rm'].'%';
        }else{
            $data['no_rm'] = '';
            $data['nama'] = '';
            $nama = '%';
            $no_rm = '%';
        }

        $this->load->library('pagination');

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $config['base_url'] = base_url().'/master/index';
        $config['total_rows'] = $this->Master_model->countAllBayi();
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        $config['from'] = $this->uri->segment(3);

        //initialize
        $this->pagination->initialize($config); 

        $data['start']= $this->uri->segment(3);
        $data['bayi'] = $this->Master_model->getPagingBayi($nama, $no_rm, empty($config['from']) ? 0 : intval($config['from']), $config['per_page']);

        $data['title'] = 'Manage Bayi';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $this->template->load('default', 'contents', 'bayi/index', $data);
    }

     // search process
    public function search_process()
    {
        // validation form
        $this->form_validation->set_rules('no_rm', 'No RM', 'trim');
        $this->form_validation->set_rules('nama', 'Nama Bayi', 'trim');
        // validation checking
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            if ($this->input->post('submit', true) == 'show') {
                $data = [
                'no_rm' => $this->input->post('nama', true),
                'nama'   => $this->input->post('nama', true)
            ];

                $this->session->set_userdata('member_search', $data);
            }else{
                $this->session->unset_userdata('member_search');
            }
        }
        redirect('master');
    }


    public function add()
    {
        $data['title'] = 'Add Bayi';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $this->template->load('default', 'contents', 'bayi/add', $data);
    }

   public function add_process()
    {
        // validation form
        $this->form_validation->set_rules('no_rm', 'No RM', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama Bayi', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('telp', 'No Telepon', 'required');
       
        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('master/add');
        } else {
            //NIK check
            $rm = $this->Master_model->check_rm($this->input->post('no_rm'));
            if ($rm) {
                $this->session->set_flashdata('error', 'No RM sudah digunakan !!');
                redirect('master/add');
            }
            $insert = array(
                'no_rm'      => $this->input->post('no_rm'),
                'nama'      => $this->input->post('nama'),
                'tempat_lahir'      => $this->input->post('tempat_lahir'),
                'tanggal_lahir'      => $this->input->post('tanggal_lahir'),
                'gender'      => $this->input->post('gender'),
                'umur'      => $this->input->post('umur'),
                'nama_ibu'      => $this->input->post('nama_ibu'),
                'alamat'      => $this->input->post('alamat'),
                'pekerjaan'      => $this->input->post('pekerjaan'),
                'telp'      => $this->input->post('telp'),
                // 'update_at'             => date('Y-m-d H:i:s'),
            );

            // insert process
            $return = $this->Master_model->insert_bayi($insert);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('master/add/');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('master/add/');
            }
        }
    }

    public function edit($id = '')
    {

        if (empty($id)) {
             $this->session->set_flashdata('error', 'Access Forbiden !!');
            redirect('master');
        }

        $data['title'] = 'Edit Bayi';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['detail'] = $this->Master_model->get_detail_bayi($id);
        $this->template->load('default', 'contents', 'bayi/edit', $data);

    }

    public function edit_process()
    {
        // validation form
        $this->form_validation->set_rules('no_rm', 'No RM', 'trim');
        $this->form_validation->set_rules('nama', 'Nama Bayi', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('telp', 'No Telepon', 'required');

        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('master/edit/' . $this->input->post('id_bayi'));
        } else {
            $update = array(
                'no_rm'      => $this->input->post('no_rm'),
                'nama'      => $this->input->post('nama'),
                'tempat_lahir'      => $this->input->post('tempat_lahir'),
                'tanggal_lahir'      => $this->input->post('tanggal_lahir'),
                'gender'      => $this->input->post('gender'),
                'umur'      => $this->input->post('umur'),
                'nama_ibu'      => $this->input->post('nama_ibu'),
                'alamat'      => $this->input->post('alamat'),
                'pekerjaan'      => $this->input->post('pekerjaan'),
                'telp'      => $this->input->post('telp'),
            );

            $where = array('id_bayi' => $this->input->post('id_bayi'));

            // update process
            $return = $this->Master_model->update_bayi($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data saved successfully!!');
                redirect('master/edit/' . $this->input->post('id_bayi'));
            } else {
                $this->session->set_flashdata('error', 'Data failed to save  !!');
                redirect('master/edit/' . $this->input->post('id_bayi'));
            }
        }
    }

     public function delete($id = '')
    {
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('master');
        }
        // get detail
        $data = $this->Master_model->get_detail_bayi($id);
        if (!empty($data)) {
            // delete process
            if ($this->Master_model->delete_bayi(array('id_bayi' => $id))) {
                // notification
                $this->session->set_flashdata('success', 'Data successfully deleted!!');
                redirect('master');
            } else {
                // notification
                $this->session->set_flashdata('error', 'Data failed to delete !!');
                redirect('master');
            }
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data failed to delete !!');
            redirect('master');
        }
    }

    public function imunisasi()
    {
    // get search data
        $search = $this->session->userdata('member_search');
        if (!empty($search)) {
            $data['no_rm'] = $search['no_rm'];
            $data['nama'] = $search['nama'];
            $nama = '%'.$search['nama'].'%';
            $no_rm = '%'.$search['no_rm'].'%';
        }else{
            $data['no_rm'] = '';
            $data['nama'] = '';
            $nama = '%';
            $no_rm = '%';
        }

        $this->load->library('pagination');

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $config['base_url'] = base_url().'/master/imunisasi';
        $config['total_rows'] = $this->Master_model->countAllImunisasi();
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        $config['from'] = $this->uri->segment(3);

        //initialize
        $this->pagination->initialize($config); 

        $data['start']= $this->uri->segment(3);
        $data['imunisasi'] = $this->Master_model->getPagingImunisasi($nama, $no_rm, empty($config['from']) ? 0 : intval($config['from']), $config['per_page']);

        $data['title'] = 'Manage Imunisasi';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $this->template->load('default', 'contents', 'imunisasi/index', $data);
    }

     public function search_process_imunisasi()
        {
            // validation form
            $this->form_validation->set_rules('no_rm', 'No RM', 'trim');
            $this->form_validation->set_rules('nama', 'Nama Bayi', 'trim');
            // validation checking
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('error', validation_errors());
            } else {
                if ($this->input->post('submit', true) == 'show') {
                    $data = [
                    'no_rm' => $this->input->post('nama', true),
                    'nama'   => $this->input->post('nama', true)
                ];

                    $this->session->set_userdata('member_search', $data);
                }else{
                    $this->session->unset_userdata('member_search');
                }
            }
            redirect('master/imunisasi');
        }
    
    // ADD Imunisasi
    public function add_imunisasi()
    {
        $data['title'] = 'Add Imunisasi';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['bayi'] = $this->Master_model->getBayi();
        $this->template->load('default', 'contents', 'imunisasi/add', $data);
    }

    public function add_process_imunisasi()
    {
        // validation form
        $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required');
        $this->form_validation->set_rules('tinggi_badan', 'Tinggi badan', 'required');
        $this->form_validation->set_rules('suhu_badan', 'Suhu badan', 'required');
        $this->form_validation->set_rules('jenis_imunisasi', 'jenis imunisasi', 'required');
        $this->form_validation->set_rules('tanggal_imunisasi', 'tanggal imunisasi', 'required');
       
       $userdata = $this->session->all_userdata();

        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('master/add_imunisasi');
        } else {
            $insert = array(
                'id_bayi'      => $this->input->post('id_bayi'),
                'berat_badan'      => $this->input->post('berat_badan'),
                'tinggi_badan'      => $this->input->post('tinggi_badan'),
                'suhu_badan'      => $this->input->post('suhu_badan'),
                'jenis_imunisasi'      => $this->input->post('jenis_imunisasi'),
                'tanggal_imunisasi'      => $this->input->post('tanggal_imunisasi'),
                'id_user'     => $userdata['user_id']
            );

            // insert process
            $return = $this->Master_model->insert_imunisasi($insert);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('master/add_imunisasi/');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('master/add_imunisasi/');
            }
        }
    }

     public function edit_imunisasi($id = '')
    {

        if (empty($id)) {
             $this->session->set_flashdata('error', 'Access Forbiden !!');
            redirect('master');
        }

        $data['title'] = 'Edit Bayi';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['detail'] = $this->Master_model->get_detail_imunisasi($id);
         $data['bayi'] = $this->Master_model->getBayi();
        $this->template->load('default', 'contents', 'imunisasi/edit', $data);

    }

    public function edit_process_imunisasi()
    {
        // validation form
        $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required');
        $this->form_validation->set_rules('tinggi_badan', 'Tinggi badan', 'required');
        $this->form_validation->set_rules('suhu_badan', 'Suhu badan', 'required');
        $this->form_validation->set_rules('jenis_imunisasi', 'jenis imunisasi', 'required');
        $this->form_validation->set_rules('tanggal_imunisasi', 'tanggal imunisasi', 'required');
        
        $userdata = $this->session->all_userdata();
        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('master/edit_imunisasi/' . $this->input->post('id_imunisasi'));
        } else {
            $update = array(
                'id_bayi'      => $this->input->post('id_bayi'),
                'berat_badan'      => $this->input->post('berat_badan'),
                'tinggi_badan'      => $this->input->post('tinggi_badan'),
                'suhu_badan'      => $this->input->post('suhu_badan'),
                'jenis_imunisasi'      => $this->input->post('jenis_imunisasi'),
                'tanggal_imunisasi'      => $this->input->post('tanggal_imunisasi'),
                'id_user'     => $userdata['user_id']
            );

            $where = array('id_imunisasi' => $this->input->post('id_imunisasi'));

            // update process
            $return = $this->Master_model->update_imunisasi($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data saved successfully!!');
                redirect('master/edit_imunisasi/' . $this->input->post('id_imunisasi'));
            } else {
                $this->session->set_flashdata('error', 'Data failed to save  !!');
                redirect('master/edit_imunisasi/' . $this->input->post('id_imunisasi'));
            }
        }
    }

     public function delete_imunisasi($id = '')
    {
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('master/imunisasi');
        }
        // get detail
        $data = $this->Master_model->get_detail_imunisasi($id);
        if (!empty($data)) {
            // delete process
            if ($this->Master_model->delete_imunisasi(array('id_imunisasi' => $id))) {
                // notification
                $this->session->set_flashdata('success', 'Data successfully deleted!!');
                redirect('master/imunisasi');
            } else {
                // notification
                $this->session->set_flashdata('error', 'Data failed to delete !!');
                redirect('master/imunisasi');
            }
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data failed to delete !!');
            redirect('master/imunisasi');
        }
    }

      public function vitamin()
    {
    // get search data
        $search = $this->session->userdata('member_search');
        if (!empty($search)) {
            $data['no_rm'] = $search['no_rm'];
            $data['nama'] = $search['nama'];
            $nama = '%'.$search['nama'].'%';
            $no_rm = '%'.$search['no_rm'].'%';
        }else{
            $data['no_rm'] = '';
            $data['nama'] = '';
            $nama = '%';
            $no_rm = '%';
        }

        $this->load->library('pagination');

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $config['base_url'] = base_url().'/master/vitamin';
        $config['total_rows'] = $this->Master_model->countAllVitamin();
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        $config['from'] = $this->uri->segment(3);

        //initialize
        $this->pagination->initialize($config); 

        $data['start']= $this->uri->segment(3);
        $data['vitamin'] = $this->Master_model->getPagingVitamin($nama, $no_rm, empty($config['from']) ? 0 : intval($config['from']), $config['per_page']);

        $data['title'] = 'Manage Vitamin';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $this->template->load('default', 'contents', 'vitamin/index', $data);
    }

   public function search_process_vitamin()
    {
        // validation form
        $this->form_validation->set_rules('no_rm', 'No RM', 'trim');
        $this->form_validation->set_rules('nama', 'Nama Bayi', 'trim');
        // validation checking
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            if ($this->input->post('submit', true) == 'show') {
                $data = [
                'no_rm' => $this->input->post('nama', true),
                'nama'   => $this->input->post('nama', true)
            ];

                $this->session->set_userdata('member_search', $data);
            }else{
                $this->session->unset_userdata('member_search');
            }
        }
        redirect('master/vitamin');
    }
    

    public function add_vitamin()
    {
        $data['title'] = 'Add Vitamin';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['bayi'] = $this->Master_model->getBayi();
        $this->template->load('default', 'contents', 'vitamin/add', $data);
    }

    public function add_process_vitamin()
    {
        // validation form
        $this->form_validation->set_rules('jenis_vitamin', 'jenis vitamin', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal vitamin', 'required');
       
       $userdata = $this->session->all_userdata();

        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('master/add_vitamin');
        } else {
            $insert = array(
                'id_bayi'      => $this->input->post('id_bayi'),
                'jenis_vitamin'      => $this->input->post('jenis_vitamin'),
                'tanggal'      => $this->input->post('tanggal'),
                'id_user'     => $userdata['user_id']
            );

            // insert process
            $return = $this->Master_model->insert_vitamin($insert);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('master/add_vitamin/');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('master/add_vitamin/');
            }
        }
    }


    public function edit_vitamin($id = '')
    {

        if (empty($id)) {
             $this->session->set_flashdata('error', 'Access Forbiden !!');
            redirect('master');
        }

        $data['title'] = 'Edit Vitamin';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $data['detail'] = $this->Master_model->get_detail_vitamin($id);
         $data['bayi'] = $this->Master_model->getBayi();
        $this->template->load('default', 'contents', 'vitamin/edit', $data);

    }

    public function edit_process_vitamin()
    {
        // validation form
     $this->form_validation->set_rules('jenis_vitamin', 'jenis vitamin', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal vitamin', 'required');
        
        $userdata = $this->session->all_userdata();
        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('master/edit_vitamin/' . $this->input->post('id_vitamin'));
        } else {
            $update = array(
                'id_bayi'      => $this->input->post('id_bayi'),
                'jenis_vitamin'      => $this->input->post('jenis_vitamin'),
                'tanggal'      => $this->input->post('tanggal'),
                'id_user'     => $userdata['user_id']
            );

            $where = array('id_vitamin' => $this->input->post('id_vitamin'));

            // update process
            $return = $this->Master_model->update_vitamin($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data saved successfully!!');
                redirect('master/edit_vitamin/' . $this->input->post('id_vitamin'));
            } else {
                $this->session->set_flashdata('error', 'Data failed to save  !!');
                redirect('master/edit_vitamin/' . $this->input->post('id_vitamin'));
            }
        }
    }

     public function laporan()
    {
        $data['title'] = 'Laporan Imunisasi';
        $data['user'] = $this->User_model->get_detail_users($this->session->userdata('user_id'));
        $this->template->load('default', 'contents', 'laporan/index', $data);
    }
}
