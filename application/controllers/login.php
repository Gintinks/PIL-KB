<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login2');
	}

	function aksi_login(){
		$Nama = $this->input->post('username');
		$Password = $this->input->post('password');
		$where = array(
			'username' => $Nama,
			'password' => $Password
			);
		$cek = $this->m_login->cek_login("user",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $Nama,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
			
			redirect(base_url("admin"));

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	function signup(){
		$this->load->helper('url');
		$this->load->model('m_login');
		$Nama = $this->input->post('Nama');
		$Password = $this->input->post('Password');
		$email = $this->input->post('Email');
		$NIM = $this->input->post('NIM');
		$this->m_login->signup($Nama, $NIM, $email, $Password);
		echo "sukses";
		redirect(base_url('login'));
	}
}