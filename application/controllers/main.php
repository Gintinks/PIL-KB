<?php 

class Main extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	//coba
	function index(){
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$posts = $this->m_mahasiswa->get_data_mahasiswa($this->session->userdata('NIM'));
		$posts2 = $this->m_calon->get_data();
		$posts3 = $this->m_pemilihan->get_data_pemilihan(2020);
		$data['posts'] = $posts;
		$data['posts2'] = $posts2;
		$data['posts3'] = $posts3;
		if (date_diff($posts3['end_time'], getDate()) > 0 ){
			$this->load->view('');
		} else {
			$this->load->view('home_pemilihan');
		}
	}
}