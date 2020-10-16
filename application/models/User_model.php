<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }


    public function update_users($data = array(), $where)
    {
        return $this->db->update('user', $data, $where);
    }

    function get_detail_users($id)
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
}
