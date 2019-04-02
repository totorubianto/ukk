<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_pemesanan");
        $this->load->library('session');
    }
    public function index($id_petugas)
    {
        if (empty($this->session->userdata['nama'])) {
            echo "anda perlu login";
        } else {
            echo $id_petugas;
            $data['rutes']=$this->M_pemesanan->getRute();
            $data['rutes']=$this->M_pemesanan->getRute();
             $this->load->view('pemesanan',$data);
           
        }
        
    }
    public function addPemesanan($id_petugas){
        echo $id_petugas;
    }
    
}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */