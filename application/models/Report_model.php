<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }


    function get_all_assessment()
    {

        $sql = "SELECT p.*, u.name as user_name, b.name as beasiswa_name FROM penilaian p
                LEFT JOIN user u on p.created_by = u.id
                LEFT JOIN beasiswa b on p.id_beasiswa = b.id_beasiswa
                ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    

    function get_detail_assessment($id)
    {

        $sql = "SELECT * FROM peserta_penilaian pp
                LEFT JOIN students s on pp.id_students = s.id_students
                WHERE id_penilaian = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();

            $id_peserta_penilaian = [];
            foreach ($result as $value) {
                $id_peserta_penilaian[] = $value['id_peserta_penilaian'];
            }
            //get data normalisasi dan akhir
            $normalisasi = $this->get_normalisasi($id_peserta_penilaian);
            $hasil_akhir = $this->get_hasil_akhir($id_peserta_penilaian);
            $res = [];
            foreach ($result as $key => $value) {
                $res[$key] = $value;
                $res[$key]['normalisasi'] = $normalisasi;
                $res[$key]['hasil_akhir'] = $hasil_akhir;
            }
            $query->free_result();
            return $res;
        } else {
            return array();
        }
    }


    function get_detail_beasiswa_rep($id)
    {

        $sql = "SELECT b.* FROM penilaian p
                INNER JOIN beasiswa b on p.id_beasiswa = b.id_beasiswa
                WHERE id_penilaian = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $result['kriteria'] = $this->get_kriteria($result['id_beasiswa']);
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_kriteria($id){
        $sql = "SELECT * FROM kriteria
                WHERE beasiswa_id = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    private function get_normalisasi($id){
        $id = implode(",",$id);
        $sql = "SELECT n.*, k.name_kriteria , k.type_kriteria FROM normalisasi n
                LEFT JOIN kriteria k on n.id_kriteria = k.id_kriteria
                WHERE id_peserta_penilaian IN (".$id.")";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array(); 
            $res = [];
            foreach ($result as $value) {
                $res[$value['id_peserta_penilaian']][] =  $value;
            }     
            $query->free_result();
            return $res;
        } else {
            return array();
        }
    }


    private function get_hasil_akhir($id){
        $id = implode(",",$id);
        $sql = "SELECT hk.*, k.name_kriteria , k.type_kriteria FROM hasil_akhir hk
                LEFT JOIN kriteria k on hk.id_kriteria = k.id_kriteria
                WHERE id_peserta_penilaian IN (".$id.")";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $res = [];
            foreach ($result as $value) {
                $res[$value['id_peserta_penilaian']][] =  $value;
            }          
            $query->free_result();
            return $res;
        } else {
            return array();
        }
    }
}
