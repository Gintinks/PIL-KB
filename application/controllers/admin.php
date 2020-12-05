<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	//coba
	function index(){
		$this->load->helper('url');
		$this->load->model('m_user');
		$posts = $this->m_user->get_data_user($this->session->userdata('nama'));
		$posts2 = $this->m_transaksi->get_pemasukan_terakhir($this->session->userdata('nama'));
		$posts3 = $this->m_transaksi->get_pengeluaran_terakhir($this->session->userdata('nama'));
		$data['posts'] = $posts;
		$data['posts2'] = $posts2;
		$data['posts3'] = $posts3;
		$this->load->view('header', $data);
		$this->load->view('sidebar', $data);
		$this->load->view('home', $data);
	//	$this->load->view('footer', $data);
	}
}