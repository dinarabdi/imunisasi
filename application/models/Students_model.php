<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students_model extends CI_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    public function get_total_students()
    {

        $query = $this->db->get('students');
        return $query->result_array();
    }

    function get_detail_students($id)
    {

        $sql = "SELECT * FROM students
                WHERE id_students = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_asses_students($id)
    {
        $this->db->select('*');
        $this->db->from('students');
        //implode to array
        $this->db->where('id_students IN (' . implode(",", $id) . ')');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_students($data = array())
    {
        $this->db->insert('students', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_students($data = array(), $where)
    {
        return $this->db->update('students', $data, $where);
    }

    public function delete_students($where)
    {
        $this->db->delete('students', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function check_nis($nis)
    {

        $sql = "SELECT * FROM students
                WHERE nis = ?";
        $query = $this->db->query($sql, $nis);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
