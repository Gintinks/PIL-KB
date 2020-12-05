<?php

class M_Calon extends CI_Model{
    public function get_data(){
        return $this->db->get('calon_ketua')-> result_array();
    }

    public function get_data_calon($ID_ketua){
        $this->load->database();
        $query = $this->db->get_where('calon_ketua', array('ID_ketua' => $ID_ketua));
        return $query->result();
    }

    public function addVote($ID_ketua){
        $this->load->database();
        $posts = $this->m_calon->get_data_calon($ID_ketua);
        foreach ($posts as $post):
            $jumlah_pemilih = $post->jumlah_pemilih + 1;
        endforeach;
        $this->db->query("UPDATE calon_ketua SET jumlah_pemilih = '$jumlah_pemilih' WHERE ID_ketua = '$ID_ketua'");
    }
   
}
