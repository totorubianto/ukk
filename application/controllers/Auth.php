<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_login");
		$this->load->library('session');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function index(){
		echo "index";
	}
	public function login_aksi(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->M_login->cek_petugas("petugas",$where);
		
	}
	public function logout(){
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('status');
		$this->session->sess_destroy('userdata');
		
		redirect('auth/login','refresh'); 	
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */