<?php

class M_mahasiswa extends CI_Model{
    public function get_data(){
        return $this->db->get('mahasiswa')-> result_array();
    }
    public function get_data_unverified(){
        return $this->db->get('mahasiswa', array('verified' == 0));
    }
    public function set_data_verified($nim){
        $this->load->database();
        $this->db->query("UPDATE mahasiswa SET verified = 1 WHERE NIM = '$nim'");
    }
    public function get_data_mahasiswa($nim){
        $this->load->database();
        $query = $this->db->get_where('mahasiswa', array('NIM' => $nim));
        return $query->result();
    }

    // public function update_data_user($username, $perubahan){
    //     $this->load->database();
    //   //  $data =  $this->db->get_where('user', array('username' => $username));
    //     $posts = $this->m_user->get_data_user($username);
    //     foreach ($posts as $post): 
    //         $saldo = $post->saldo + $perubahan;
    //     endforeach;
    //     if($perubahan > 0){
    //         $this->db->query("UPDATE user SET saldo = '$saldo', pemasukan_terakhir = '$perubahan' WHERE username = '$username'");
    //     }else{
    //         $this->db->query("UPDATE user SET saldo = '$saldo', pengeluaran_terakhir = '$perubahan' WHERE username = '$username'");
    //     }
    // }
    public function set_telah_memilih($nim, $pilihan){
        $this->load->database();
        $posts = $this->m_mahasiswa->get_data_mahasiswa($nim);
        foreach ($posts as $post):
            $ID_ketua = $post->$pilihan;
        endforeach;
        $this->db->query("UPDATE mahasiswa SET ID_ketua = '$ID_ketua' WHERE NIM = '$nim'");
    }

   
}
