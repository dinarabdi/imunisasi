<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beasiswa_model extends CI_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    public function get_total_beasiswa()
    {

        $query = $this->db->get('beasiswa');
        $data = $query->result_array();


        $beasiswa_id = [];
        foreach ($data as $value) {
            $beasiswa_id[] = $value['id_beasiswa'];
        }

        $kriteria = $this->get_data_kriteria($beasiswa_id);
        $grouped_kriteria = [];
        $kriteria_id = [];
        foreach ($kriteria as $value) {
            $grouped_kriteria[$value['beasiswa_id']][] = $value;
            $kriteria_id[] = $value['id_kriteria'];
        }

        // get sub kriteria
        $sub_kriteria = $this->get_sub_kriteria($kriteria_id);
        $grouped_sub_kriteria = [];
        foreach ($sub_kriteria as $value) {
            $grouped_sub_kriteria[$value['id_kriteria']][] = $value;
        }


        foreach ($grouped_kriteria as $key => $value) {
            foreach ($value as $key2 =>$val) {
                if (!empty($grouped_sub_kriteria[$val['id_kriteria']])) {
                    $grouped_kriteria[$key][$key2]['sub_kriteria'] = $grouped_sub_kriteria[$val['id_kriteria']];
                }else{
                    $grouped_kriteria[$key][$key2]['sub_kriteria'] = [];
                }
                
            }
            
        }

        foreach ($data as $key => $value) {
            if (!empty($grouped_kriteria[$value['id_beasiswa']])) {
                $data[$key]['kriteria'] = $grouped_kriteria[$value['id_beasiswa']];
            } else {
                $data[$key]['kriteria'] = array();
            }
        }
        return $data;



    }



    function get_detail_beasiswa($id)
    {

        $sql = "SELECT * FROM beasiswa
                WHERE id_beasiswa = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_detail_kriteria($id)
    {

        $sql = "SELECT * FROM kriteria
                WHERE id_kriteria = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function last_id()
    {
        return $this->db->insert_id();
    }

    public function insert_beasiswa($data = array())
    {
        $this->db->insert('beasiswa', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    public function insert($table, $data = array())
    {
        $this->db->insert($table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function insert_batch($table, $data = array())
    {
        $this->db->insert_batch($table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_beasiswa($data = array(), $where)
    {
        return $this->db->update('beasiswa', $data, $where);
    }

    public function delete_beasiswa($where)
    {
        $this->db->delete('beasiswa', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    public function get_data_kriteria($beasiswa_id)
    {

        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('beasiswa_id IN (' . implode(",", $beasiswa_id) . ')');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_sub_kriteria($kriteria_id)
    {

        $this->db->select('*');
        $this->db->from('sub_kriteria');
        $this->db->where('id_kriteria IN (' . implode(",", $kriteria_id) . ')');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_kriteria($data = array())
    {
        $this->db->insert('kriteria', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_kriteria($data = array(), $where)
    {
        return $this->db->update('kriteria', $data, $where);
    }

    public function delete_kriteria($where)
    {
        $this->db->delete('kriteria', $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function delete($table, $where)
    {
        $this->db->delete($table, $where);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
