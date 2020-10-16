<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff_model extends CI_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    public function get_total_users()
    {

        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function getRole()
    {

        $query = $this->db->get('user_role');
        return $query->result_array();
    }

    // public function getId_user($id)
    // {

    //     $query =  $this->db->get_where('user', ['id' => $id]);
    //     return $query->result_array();
    // }



    function check_username($username)
    {

        $sql = "SELECT * FROM user
                WHERE username = ?";
        $query = $this->db->query($sql, $username);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_users($data = array())
    {
        $this->db->insert('user', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    public function update_users($data = array(), $where)
    {
        return $this->db->update('user', $data, $where);
    }

    public function delete_users($where)
    {
        $this->db->delete('user', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function get_detail_staff($id)
    {

        $sql = "SELECT * FROM user
                WHERE id = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function check_username_edit($username, $uid)
    {
        $data = array($username, $uid);
        $sql = "SELECT * FROM user
                WHERE username = ? AND id <> ?";
        $query = $this->db->query($sql, $data);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
