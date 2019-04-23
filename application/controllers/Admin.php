<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_admin");
		$this->load->library('pagination');
		$this->load->library('session');
	}
	public function index(){
		     $config['base_url'] = site_url('admin/index'); //site url
        $config['total_rows'] = $this->db->count_all('rute'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
		 // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['pagination'] = $this->pagination->create_links();

        $search_rute_awal = $this->input->post('cari_rute_awal');
        $search_rute_akhir = $this->input->post('cari_rute_akhir');
        $data['vendor']=$this->M_admin->getVendor();
        $data['rute_awal']=$this->M_admin->getRute_awal();
        $data['rute_akhir']=$this->M_admin->getRute_akhir();
        $data['rute']=$this->M_admin->getAllRute($search_rute_awal,$search_rute_akhir,$config["per_page"], $data['page']);
        $script="";
        $data['script'] = $script;
        $this->load->view('admin/template/header');
        $this->load->view('admin/index',$data);
        $this->load->view('admin/template/footer',$data);

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
		//vendor
    	$vendor = $this->input->post('vendor');
    	$this->M_admin->addRute($rute_awal,$rute_akhir,$kode,$jumlah_kursi,$nama_type,$keterangan,$harga,$date,$jam,$vendor);
    }
    public function deleterute($id_rute,$id_transportasi,$id_type_trasportasi){
       $this->db->from("rute");
       $this->db->where("rute.id_rute", $id_rute);
       $this->db->delete('rute');


       $this->db->from("transportasi");
       $this->db->where("transportasi.id_transportasi", $id_transportasi);
       $this->db->delete('transportasi');

       $this->db->from("type_transportasi");
       $this->db->where("type_transportasi.id_type_transportasi", $id_type_trasportasi);
       $this->db->delete('type_transportasi');


       redirect('admin/','refresh');

   }
   public function deletePemesanan($id){

     $this->db->from("penumpang");
     $this->db->where("penumpang.id_pemesanan", $id);
     $this->db->delete();

     $this->db->from("pemesanan");
     $this->db->where("pemesanan.id_pemesanan", $id);
     $this->db->delete("pemesanan");
     redirect('admin/pemesanan','refresh');
 }
 public function pemesanan(){
    $pesan = $this->input->post('search');
    if (!empty($pesan)) {
        $data['pemesanan']=$this->M_admin->getPemesanan2($pesan);
    } else {
        $data['pemesanan']=$this->M_admin->getPemesanan1();
    }
    $script = '<script>
    function viewedit(id){
      $.ajax({url: "'.base_url().'admin/reservationedit/"+id, success: function(result){
        $("#viewedit").html(result);
        }});
    }
    </script>';
    $data['script'] = $script;
    $this->load->view('admin/template/header');
    $this->load->view('admin/pemesanan',$data);
    $this->load->view('admin/template/footer',$data);
}
public function reservationedit($id = null){


    if($id == null){
        redirect(base_url().'admin/pemesanan');
    }

    $data['reservation'] = $this->M_admin->get_reservation_id($id);

    $this->load->view('admin/modelPemesanan',$data);

}
public function editStatusPemesanan($id){
    $status=$this->input->post('status');
 $data = array( 
    'status' => $status);
 $where = array(
    'id_pemesanan' => $id);
 $this->db->update('pemesanan', $data, $where);
 redirect('admin/pemesanan','refresh');
}

}
