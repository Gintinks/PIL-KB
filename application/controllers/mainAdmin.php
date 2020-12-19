<?php 

class MainAdmin extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "loginAdmin"){
			redirect(base_url("login"));
		}
	}
	//coba
	function index(){
		$this->load->helper('url');
		$this->load->model('m_admin');
		$this->load->model('m_calon');
	//	$posts2 = $this->m_calon->get_data_calon();
		$posts = $this->m_admin->get_data_admin($this->session->userdata('username'));
		$posts2 = $this->m_calon->get_data();
		$data['posts'] = $posts;
		$data['posts2']	= $posts2;
		$this->load->view('home_admin', $data);
	}
	

	function tambah_calon(){
		$this->load->view('tambah_calon');
	}
	function simpan_calon(){
		$this->load->helper('url');
		$this->load->model('m_calon');
		$nama = $this->input->post('nama');
		$tempat = $this->input->post('tempat');
		$tanggal = $this->input->post('tanggal');
		$deskripsi = $this->input->post('deskripsi');
		$gender = $this->input->post('gender');
		$daftar_prestasi = $this->input->post('daftar_prestasi');
		$foto = $this->input->post('customFileInput');
		$this->m_calon->tambah_calon($nama, $tempat, $tanggal, $deskripsi, $gender, $daftar_prestasi, $foto);
		redirect(base_url("mainAdmin"));
	}
	function delete(){
		$this->load->model('m_calon');
		$ID_ketua = $this->request->getPost('ID_ketua');
        $this->m_calon->delete($ID_ketua);
        redirect(base_url('mainAdmin'));
	}
}