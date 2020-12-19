<?php

class M_admin extends CI_Model{
    public function get_data(){
        return $this->db->get('pemilihan')-> result_array();
    }

    public function get_data_pemilihan($tahun){
        $this->load->database();
        $query = $this->db->get_where('pemilihan', array('tahun' => $tahun));
        return $query->result();
    }
    function set_waktu_pemilihan(){
        
    }
   
}