<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_admin");
		$this->load->library('session');
	}
	public function index(){
		$search_rute_awal = $this->input->post('cari_rute_awal');
		$search_rute_akhir = $this->input->post('cari_rute_akhir');
		$data['rute_awal']=$this->M_admin->getRute_awal();
		$data['rute_akhir']=$this->M_admin->getRute_akhir();
		$data['rute']=$this->M_admin->getAllRute($search_rute_awal,$search_rute_akhir);
		$this->load->view('admin/index',$data);
	}
	public function addRute(){
		$rute_awal = $this->input->post('rute_awal');
		$rute_akhir = $this->input->post('rute_akhir');
		$kode = $this->input->post('kode');
		$jumlah_kursi = $this->input->post('jumlah_kursi');
		//type Transport
		$nama_type = $this->input->post('nama_type');
		$keterangan = $this->input->post('keterangan');
		$harga = $this->input->post('harga');
		$date = $this->input->post('date');
		$jam = $this->input->post('jam');
		$this->M_admin->addRute($rute_awal,$rute_akhir,$kode,$jumlah_kursi,$nama_type,$keterangan,$harga,$date,$jam);
	}

}
