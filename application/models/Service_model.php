<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    public function get_total_layanan()
    {

        $query = $this->db->get('layanan');
        return $query->result_array();
    }

      public function insert_layanan($data = array())
    {
        $this->db->insert('layanan', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

            // get detail layanan by id
    function get_detail_layanan($id){
        
        $sql = "SELECT * FROM layanan
                WHERE id_layanan = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

        public function update_layanan($data = array(), $where)
    {
        $this->db->update('layanan', $data, $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

        public function delete_layanan($where)
    {
        $this->db->delete('layanan', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function get_detail_contact(){
        
        $sql = "SELECT * FROM contact
                WHERE id_contact = 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

         public function update_contact($data = array(), $where)
    {
        return $this->db->update('contact', $data, $where);
       

    }
}