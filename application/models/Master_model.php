<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    public function get_total_bayi()
    {

        $query = $this->db->get('bayi');
        return $query->result_array();
    }

     function check_rm($nis)
    {

        $sql = "SELECT * FROM bayi
                WHERE no_rm = ?";
        $query = $this->db->query($sql, $nis);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

     public function insert_bayi($data = array())
    {
        $this->db->insert('bayi', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function get_detail_bayi($id)
    {

        $sql = "SELECT * FROM bayi
                WHERE id_bayi = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

      function get_detail_imunisasi($id)
    {

        $sql = "SELECT * FROM imunisasi
                WHERE id_imunisasi = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

     function get_detail_vitamin($id)
    {

        $sql = "SELECT * FROM vitamin
                WHERE id_vitamin = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


      public function update_bayi($data = array(), $where)
    {
        return $this->db->update('bayi', $data, $where);
    }


    public function delete_bayi($where)
    {
        $this->db->delete('bayi', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getPagingBayi($nama, $no_rm, $from, $to){
    
        $params = [$nama, $no_rm, $from, $to];
        $sql = "SELECT * FROM bayi 
                WHERE nama LIKE ? or no_rm LIKE ? LIMIT ?, ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function countAllBayi(){
        return $this->db->get('bayi')->num_rows();
    }

    public function countAllVitamin(){
        return $this->db->get('vitamin')->num_rows();
    }

     public function countAllImunisasi(){
        return $this->db->get('imunisasi')->num_rows();
    }

    public function getPagingImunisasi($nama, $no_rm, $from, $to){
    
        $params = [$nama, $no_rm, $from, $to];
        $sql = "SELECT i.*, b.no_rm, b.nama, u.name FROM imunisasi i
                LEFT JOIN bayi b ON b.id_bayi = i.id_bayi
                LEFT JOIN user u ON u.id = i.id_user
                WHERE b.nama LIKE ? or b.no_rm LIKE ? LIMIT ?, ?";
        $query = $this->db->query($sql, $params);
      
   
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function getPagingVitamin($nama, $no_rm, $from, $to){
    
        $params = [$nama, $no_rm, $from, $to];
        $sql = "SELECT v.*, b.no_rm, b.nama, u.name FROM vitamin v
                LEFT JOIN bayi b ON b.id_bayi = v.id_bayi
                LEFT JOIN user u ON u.id = v.id_user
                WHERE b.nama LIKE ? or b.no_rm LIKE ? LIMIT ?, ?";
        $query = $this->db->query($sql, $params);
   
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

     public function getBayi()
    {

        $query = $this->db->get('bayi');
        return $query->result_array();
    }

       public function insert_imunisasi($data = array())
    {
        $this->db->insert('imunisasi', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

        public function update_imunisasi($data = array(), $where)
    {
        return $this->db->update('imunisasi', $data, $where);
    }

    public function delete_imunisasi($where)
    {
        $this->db->delete('imunisasi', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function insert_vitamin($data = array())
    {
        $this->db->insert('vitamin', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

         public function update_vitamin($data = array(), $where)
    {
        return $this->db->update('vitamin', $data, $where);
    }


}