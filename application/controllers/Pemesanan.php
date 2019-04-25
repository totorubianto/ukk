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
        $data['jumlah_pemesanan'] = $_POST['jumlah_pemesanan'];
        $data['tempat_pemesanan'] = $_POST['tempat_pemesanan'];
        $data['rute_awal'] = $_POST['rute_awal'];
        $data['rute_akhir'] = $_POST['rute_akhir'];
        $data['tanggal_berangkat'] = $_POST['tanggal_berangkat'];
        $this->load->view('template/header');
        $this->load->view('pilih_transportasi',$data);
    }
    public function addDataPesan(){
        $id_users=$this->session->userdata['id'];
        $customer_seat = $this->input->post('seat');
        $harga=$_POST['harga'];
        $jam=$_POST['jam'];
        $tanggal_berangkat=$_POST['tanggal'];
        $id_rute=$this->uri->segment(3);
        $tempat_pemesanan = $this->uri->segment(4);


        
        $customer_data = $this->session->userdata();
        $customer_form = $customer_data['form_customer'];
        
        $this->M_pemesanan->postPemesanan($id_users,$id_rute,$tempat_pemesanan,$harga,$tanggal_berangkat,$jam,$customer_form,$customer_seat);

        redirect('pemesanan/daftarPemesanan','refresh');

        
    }
    public function upload($kode_pemesanan){

        $data['data']=$this->M_pemesanan->getPemesananReview($kode_pemesanan);
        $data['data2']=$this->M_pemesanan->getPemesananReview2($kode_pemesanan);
        $data['data3']=$this->M_pemesanan->getPemesananReview3($kode_pemesanan);
        $this->load->view('template/header');
        $this->load->view('upload',$data);

    }
    public function uploadBukti($kode_pemesanan){
        $kode_pemesananw = $this->uri->segment(3);
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
            redirect('pemesanan/upload/'.$kode_pemesanan,'refresh');
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
            $this->form_validation->set_rules('jumlah_pemesanan','jumlah_pemesanan','required');
            $this->form_validation->set_rules('tempat_pemesanan','tempat','required');
            $this->form_validation->set_rules('rute_awal','rute_awal','required');
            $this->form_validation->set_rules('rute_akhir','rute_akhir Email','required');
            $this->form_validation->set_rules('tanggal_berangkat','tanggal_berangkat','required');

            if($this->form_validation->run() != false){

             $rute_awal=$_POST['rute_awal'];
             $rute_akhir=$_POST['rute_akhir'];
             $date=$_POST['tanggal_berangkat'];
             $data['rute'] =$this->M_pemesanan->getRuteKota($rute_awal,$rute_akhir);
             $data['transportasi']=$this->M_pemesanan->getTransportasi($rute_awal,$rute_akhir,$date);
             $data['jumlah_pemesanan']=$_POST['jumlah_pemesanan'];

             $data['tempat_pemesanan'] = $_POST['tempat_pemesanan'];
             $data['rute_awal'] = $_POST['rute_awal'];
             $data['rute_akhir'] = $_POST['rute_akhir'];
             $data['tanggal_berangkat'] = $_POST['tanggal_berangkat'];
             $this->load->view('template/header');
             $this->load->view('pilih_transportasi',$data);
         }else{
            $data['rutes']=$this->M_pemesanan->getRute();
            $data['rute_awal']=$this->M_pemesanan->rute_awal();
            $data['rute_akhir']=$this->M_pemesanan->rute_akhir();
            $this->load->view('template/header');
            $this->load->view('index',$data);
        }
    }

}
public function getConsumer($id_transportasi){

    $data['pemesanan']=$this->M_pemesanan->konsumerRute($id_transportasi);
    
    $this->load->view('template/header');
    $this->load->view('konsumer',$data);
}
public function getKursi($id_transportasi){

  $this->form_validation->set_rules('nama_pelanggan[]', 'nama_pelanggan', 'required');
  $this->form_validation->set_rules('alamat[]', 'alamat', 'required');
  $this->form_validation->set_rules('phone[]', 'phone', 'required');
  $this->form_validation->set_rules('email[]', 'email', 'required');
  $this->form_validation->set_rules('gender[]', 'gender', 'required');
  if ($this->form_validation->run() == FALSE)
  {
    $data['pemesanan']=$this->M_pemesanan->konsumerRute($id_transportasi);

    $this->load->view('template/header');
    $this->load->view('konsumer',$data);
    
}
else
{
    $name = $this->input->post('nama_pelanggan');
    $address = $this->input->post('alamat');
    $phone = $this->input->post('phone');
    $email = $this->input->post('email');
    $gender = $this->input->post('gender');
    $kode_pemesanan = $this->input->post('kode_pemesanan');

    $form_customer = [
        'name' => $name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'gender' => $gender,
        'kode_pemesanan' => $kode_pemesanan
    ];

        $value['form_customer'] = $form_customer; // add form_customer to session
        $this->session->set_userdata($value);
        $customer_data = $this->session->userdata();
        $data['data_form'] = $customer_data['form_customer']['name'];
        $data['pemesanan']=$this->M_pemesanan->getPemesanan($id_transportasi);
        $data['transportasi']=$this->M_pemesanan->getTransportasiId($id_transportasi);
        $this->load->view('template/header');
        $this->load->view('pilih_kursi',$data);
        
    }

}
public function daftarPemesanan(){
    $data['daftarPemesanan']=$this->M_pemesanan->daftarPemesanan();


    $this->load->view('template/header');
    $this->load->view('daftar_pesanan',$data);
}
public function ticket($kode_pemesanan){
   $data['data']=$this->M_pemesanan->getPemesananReview($kode_pemesanan);
   $data['data2']=$this->M_pemesanan->getPemesananReview2($kode_pemesanan);
   $data['data3']=$this->M_pemesanan->getPemesananReview3($kode_pemesanan);
   $this->load->view('template/header');
   $this->load->view('ticket',$data);
}
}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */