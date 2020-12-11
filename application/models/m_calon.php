<?php
//tes
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
    public function tambah_calon($nama, $tempat, $tanggal, $deskripsi, $jenis_kelamin, $daftar_prestasi, $foto){
        $this->load->database();
        $data = array(
			'nama' => $nama,
            'tempat' => $tempat,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'jenis_kelamin' => $jenis_kelamin,
            'daftar_prestasi' => $daftar_prestasi,
            'foto' => $foto,
            'jumlah_pemilih' => 0
            
		);
		$this->db->insert('calon_ketua', $data);
    }
   
}
