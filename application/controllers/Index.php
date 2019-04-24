<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_pemesanan");
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		header('Cache-Control: no-cache,must-revalidate,max-age=0');
	}
	public function index()
	{
		$data['rutes']=$this->M_pemesanan->getRute();
		$data['rute_awal']=$this->M_pemesanan->rute_awal();
		$data['rute_akhir']=$this->M_pemesanan->rute_akhir();
		$this->load->view('template/header');
		$this->load->view('index',$data);
	}

}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */