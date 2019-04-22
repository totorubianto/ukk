<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function index()
	{
		
	}
	public function upload($kode_pemesanan){
		$this->load->view('upload');
	}
	public function uploadBukti($kode_pemesanan){

		$config['upload_path'] ='./assets/img/bukti/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('bukti')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else{
			$files=$this->upload->data();
			$bukti=$files['file_name'];
			$this->M_pemesanan->uploadBukti($kode_pemesanan,$bukti);
		}


        // $config['upload_path'] = base_url().'assets/img/bukti/';
        // $config['allowed_types'] = 'gif|jpg|png';

		
        // $this->load->library('upload', $config);
		
        // if ( ! $this->upload->do_upload('bukti')){
        //     $error = array('error' => $this->upload->display_errors());
        //     print_r($error);
        // }
        // else{
        //     $data = array('upload_data' => $this->upload->data());
        //     echo "success";
        //      echo "<pre>";
        //     print_r($data);
        //     echo "</pre>";

        // }
	}
}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */