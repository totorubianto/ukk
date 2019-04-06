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
		$data['kota']=$this->M_admin->getKota();
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
		$this->M_admin->addRute($rute_awal,$rute_akhir,$kode,$jumlah_kursi,$nama_type,$keterangan,$harga);
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */