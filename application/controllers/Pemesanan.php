<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_pemesanan");
        $this->load->library('session');
        header('Cache-Control: no-cache,must-revalidate,max-age=0');
    }
    public function index($id_petugas)
    {
        if (empty($this->session->userdata['nama'])) {
            echo "anda perlu login";
        } else {
            $data['rutes']=$this->M_pemesanan->getRute();
            $data['rute_awal']=$this->M_pemesanan->rute_awal();
            $data['rute_akhir']=$this->M_pemesanan->rute_akhir();
            $this->load->view('pemesanan',$data);
        }  
    }
    public function addPemesanan(){
        $data['kode_pemesanan'] = $_POST['kode_pemesanan'];
        $data['tempat_pemesanan'] = $_POST['tempat_pemesanan'];
        $data['rute_awal'] = $_POST['rute_awal'];
        $data['rute_akhir'] = $_POST['rute_akhir'];
        $data['tanggal_berangkat'] = $_POST['tanggal_berangkat'];
        $this->load->view('pilih_transportasi',$data);
    }
    public function addDataPesan(){
        echo 'id_user'. ':'.$this->session->userdata['id'];
        echo 'nomor kursi'.':'.$_POST['kode_kursi'] .'<br>';
        echo 'id_rute'. ':'. $this->uri->segment(3). '<br>';
        echo 'kode_pemesanan' .':'. $this->uri->segment(4). '<br>';
        echo $this->uri->segment(5).'<br>';
        
        $id_users=$this->session->userdata['id'];
        $kode_kursi=$_POST['kode_kursi'];
        $id_rute=$this->uri->segment(3);
        $kode_pemesanan=$this->uri->segment(4);
        $tempat_pemesanan = $this->uri->segment(5);
        $this->M_pemesanan->postPemesanan($id_users,$kode_kursi,$id_rute,$kode_pemesanan,$tempat_pemesanan);
    }
    public function getPesawat(){
        $rute_awal=$_POST['rute_awal'];
        $rute_akhir=$_POST['rute_akhir'];
        $date=$_POST['tanggal_berangkat'];
        $data['transportasi']=$this->M_pemesanan->getTransportasi($rute_awal,$rute_akhir,$date);
        $data['kode_pemesanan'] = $_POST['kode_pemesanan'];
        $data['tempat_pemesanan'] = $_POST['tempat_pemesanan'];
        $data['rute_awal'] = $_POST['rute_awal'];
        $data['rute_akhir'] = $_POST['rute_akhir'];
        $data['tanggal_berangkat'] = $_POST['tanggal_berangkat'];
        $this->load->view('pilih_transportasi',$data);

    }
    public function getKursi($id_transportasi){
        $data['pemesanan']=$this->M_pemesanan->getPemesanan($id_transportasi);
        $data['transportasi']=$this->M_pemesanan->getTransportasiId($id_transportasi);
        $this->load->view('pilih_kursi',$data);
    }


}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */