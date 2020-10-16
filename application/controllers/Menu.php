<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
        check_status_login();
    }
    public function index()
    {

        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->template->set('title', 'Menu Management');
        $this->template->load('default', 'contents', 'menu/index.php', $data);
    }

    public function tambah()
    {

        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('default', 'contents', 'menu/index.php', $data);
        } else {

            $this->Menu_model->tambahDataMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added</div>');
            redirect('menu');
        }
    }


    public function hapus($id)
    {
        $this->Menu_model->hapusDataMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu Delete</div>');
        redirect('menu');
    }

    public function ubah()
    {

        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('default', 'contents', 'menu/index.php', $data);
        } else {
            $this->Menu_model->ubahDataMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Updated</div>');
            redirect('menu');
        }
    }

    public function subMenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['subMenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->template->set('title', 'Submenu Management');
        $this->template->load('default', 'contents', 'menu/submenu.php', $data);
    }

    public function tambahSubMenu()
    {

        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['subMenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('default', 'contents', 'menu/submenu.php', $data);
        } else {
            $this->Menu_model->tambahDataSubMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu Added</div>');
            redirect('menu/subMenu');
        }
    }

    public function ubahSubMenu()
    {

        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['subMenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('default', 'contents', 'menu/submenu.php', $data);
        } else {
            $this->Menu_model->ubahDataSubMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu Update</div>');
            redirect('menu/subMenu');
        }
    }

    public function hapusSubMenu($id)
    {
        $this->Menu_model->hapusDataSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sub Menu Delete</div>');
        redirect('menu/subMenu');
    }
}
