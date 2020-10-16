<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengelola_model extends CI_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    public function get_total_pengelola()
    {

        $query = $this->db->get('pengelola');
        return $query->result_array();
    }

       public function insert_pengelola($data = array())
    {
        $this->db->insert('pengelola', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

             // get detail pengelola by id
    function get_detail_pengelola($id){
        
        $sql = "SELECT * FROM pengelola
                WHERE id_pengelola = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

        public function update_pengelola($data = array(), $where)
    {
        $this->db->update('pengelola', $data, $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

            public function delete_pengelola($where)
    {
        $this->db->delete('pengelola', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

}