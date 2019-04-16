<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_pemesanan");
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        header('Cache-Control: no-cache,must-revalidate,max-age=0');
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
        $harga=$_POST['harga'];
        $jam=$_POST['jam'];
        $tanggal_berangkat=$_POST['tanggal'];
        $id_rute=$this->uri->segment(3);
        $kode_pemesanan=$this->uri->segment(4);
        $tempat_pemesanan = $this->uri->segment(5);
        $this->M_pemesanan->postPemesanan($id_users,$kode_kursi,$id_rute,$kode_pemesanan,$tempat_pemesanan,$harga,$tanggal_berangkat,$jam);
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
    public function getPesawat(){
        if (empty($this->session->userdata('nama'))) {
            redirect('auth/login','refresh');
        }else{
            $this->form_validation->set_rules('tempat_pemesanan','tempat','required');
            $this->form_validation->set_rules('rute_awal','rute_awal','required');
            $this->form_validation->set_rules('rute_akhir','rute_akhir Email','required');
            $this->form_validation->set_rules('tanggal_berangkat','tanggal_berangkat','required');

            if($this->form_validation->run() != false){
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
           }else{
            $data['rutes']=$this->M_pemesanan->getRute();
            $data['rute_awal']=$this->M_pemesanan->rute_awal();
            $data['rute_akhir']=$this->M_pemesanan->rute_akhir();
            $this->load->view('index',$data);
        }
    }

}
public function getKursi($id_transportasi){
    $data['pemesanan']=$this->M_pemesanan->getPemesanan($id_transportasi);
    $data['transportasi']=$this->M_pemesanan->getTransportasiId($id_transportasi);
    $this->load->view('pilih_kursi',$data);
}
public function daftarPemesanan(){
    $data['daftarPemesanan']=$this->M_pemesanan->daftarPemesanan();
    $this->load->view('daftar_pesanan',$data);
}
}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */