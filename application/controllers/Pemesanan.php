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
        $data['jam_cekin'] = $_POST['jam_cekin'];
        $data['jam_berangkat'] = $_POST['jam_berangkat'];
        $this->load->view('pilih_transportasi',$data);
    }
    public function addDataPesan(){

        echo $_POST['kode_kursi'] .'<br>';
        echo $this->uri->segment(3). '<br>';
        echo $this->uri->segment(4). '<br>';
        echo $this->uri->segment(5).'<br>';
        echo $this->uri->segment(6) .'<br>';
        echo $this->uri->segment(7) .'<br>';

        $id_transportasi= $this->uri->segment(3);
        $kode_pemesanan=  $this->uri->segment(4);
        $tempat_pemesanan=  $this->uri->segment(5);
        $rute_awal=  $this->uri->segment(6) ;
        $rute_akhir=  $this->uri->segment(7) ;
        $tujuan=  $this->uri->segment(7) ;
        echo $this->uri->segment(8);
        $this->M_pemesanan->addRute($id_transportasi,$tujuan,$rute_awal,$rute_akhir);
        $id_rute=$this->M_pemesanan->addRute($id_transportasi,$tujuan,$rute_awal,$rute_akhir);
        echo $id_rute;
    }
    public function getPesawat(){
        $rute_awal=$_POST['rute_awal'];
        $rute_akhir=$_POST['rute_akhir'];
        // $this->M_pemesanan->getTransportasi($rute_awal,$rute_akhir);
        $data['transportasi']=$this->M_pemesanan->getTransportasi($rute_awal,$rute_akhir);
        $data['kode_pemesanan'] = $_POST['kode_pemesanan'];
        $data['tempat_pemesanan'] = $_POST['tempat_pemesanan'];
        $data['rute_awal'] = $_POST['rute_awal'];
        $data['rute_akhir'] = $_POST['rute_akhir'];
        $data['tanggal_berangkat'] = $_POST['tanggal_berangkat'];
        $data['jam_cekin'] = $_POST['jam_cekin'];
        $data['jam_berangkat'] = $_POST['jam_berangkat'];

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