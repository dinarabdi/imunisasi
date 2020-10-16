<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{

    public function addRoleData()
    {

        $data = [
            "role" => $this->input->post('role', true)
        ];

        $this->db->insert('user_role', $data);
    }

    public function deleteRoleData($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('user_role', ['id' => $id]);
    }

    public function updateRoleData()
    {

        $data = [
            "role" => $this->input->post('role', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role', $data);
    }
}
