<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    function __construct() {
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
	    $query = $this->db->query($sql,$params);
	    if ($query->num_rows() > 0) {
	        $result = $query->result_array();
	        $query->free_result();
	        return $result;
	    } else {
	        return array();
	    }
        
    }

  	function get_detail_article($id){
	    
	    $sql = "SELECT * FROM article where id_article = ?";
	    $query = $this->db->query($sql,$id);
	    if ($query->num_rows() > 0) {
	        $result = $query->row_array();
	        $query->free_result();
	        return $result;
	    } else {
	        return array();
	    }
	}

    public function countAllArticle(){
    	return $this->db->get('article')->num_rows();
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


    public function get_total_layanan()
    {

        $query = $this->db->get('layanan');
        return $query->result_array();
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

     public function get_total_pengelola()
    {

        $query = $this->db->get('pengelola');
        return $query->result_array();
    }

          public function get_total_galeri()
    {

        $query = $this->db->get('galeri');
        return $query->result_array();
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

    public function insert_komentar($data = array())
    {
        $this->db->insert('komentar', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

}