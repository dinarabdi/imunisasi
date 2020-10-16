<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_model
{

    public function getAllMenu()
    {

        $query = $this->db->get('user_menu');
        return $query->result_array();
    }

    public function tambahDataMenu()
    {

        $data = [
            "menu" => $this->input->post('menu', true)
        ];

        $this->db->insert('user_menu', $data);
    }

    public function hapusDataMenu($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function ubahDataMenu()
    {

        $data = [
            "menu" => $this->input->post('menu', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    public function getSubMenu()
    {
        $query = "SELECT user_sub_menu.*, user_menu.menu
                FROM user_sub_menu JOIN user_menu
                ON user_sub_menu.menu_id = user_menu.id
        ";

        return $this->db->query($query)->result_array();
    }

    public function tambahDataSubMenu()
    {

        $data = [
            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('menu_id', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('is_active', true)
        ];
        $this->db->insert('user_sub_menu', $data);
    }

    public function ubahDataSubMenu()
    {

        $data = [
            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('menu_id', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('is_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }

    public function hapusDataSubMenu($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
}
