<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }
    
    public function get_all_article($limit, $start){
        $params = [(int)$start,(int)$limit];
        $sql = "SELECT a.*, u.name FROM article a 
                LEFT JOIN user u ON a.update_by = u.id
                LIMIT ?, ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
        
    }

    public function countAllArticle(){
        return $this->db->get('article')->num_rows();
    }

    public function countAllArticleGaleri(){
        return $this->db->get('galeri')->num_rows();
    }

      public function insert_news($data = array())
    {
        $this->db->insert('article', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

     public function update_artikel($data = array(), $where)
    {
        $this->db->update('article', $data, $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function delete_news($where)
    {
        $this->db->delete('article', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

        // get detail news by id
    function get_detail_news($id){
        
        $sql = "SELECT * FROM article
                WHERE id_article = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_detail_about(){
        
        $sql = "SELECT * FROM about
                WHERE id_about = 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

     public function update_about($data = array(), $where)
    {
        return $this->db->update('about', $data, $where);
       

    }

    function get_detail_rekanan(){
        
        $sql = "SELECT * FROM rekanan
                WHERE id = 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

     public function update_rekanan($data = array(), $where)
    {
        return $this->db->update('rekanan', $data, $where);
       

    }

       public function get_total_galeri($limit, $start)
    {

        $params = [(int)$start,(int)$limit];
        $sql = "SELECT * FROM galeri
                LIMIT ?, ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

        public function insert_galeri($data = array())
    {
        $this->db->insert('galeri', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

       function get_detail_galeri($id){
        
        $sql = "SELECT * FROM galeri
                WHERE id_galeri = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

        public function update_galeri($data = array(), $where)
    {
        $this->db->update('galeri', $data, $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function delete_galeri($where)
    {
        $this->db->delete('galeri', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    
}