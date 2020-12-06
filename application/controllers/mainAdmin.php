<?php 

class MainAdmin extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	//coba
	function index(){
		$this->load->helper('url');
		$this->load->model('m_admin');
		$posts = $this->m_admin->get_data_admin($this->session->userdata('username'));
		$data['posts'] = $posts;
		$this->load->view('home_admin', $data);

	}
}