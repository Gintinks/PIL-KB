<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function signup($username, $namaLengkap, $password, $saldo, $email){
		$this->load->database();
		$joinDate =  date("Y/m/d"); 
		
		$data = array(
			'username' => $username,
			'namaLengkap' => $namaLengkap,
			'password' => $password,
			'saldo' => $saldo,
			'email' => $email,
			'jointDate' => $joinDate, 
			'pemasukan_terakhir' => 0, 
			'pengeluaran_terakhir' => 0
		);
		$this->db->insert('user', $data);
	}	
}