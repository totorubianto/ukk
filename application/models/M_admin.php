<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	
	public function getKota(){
		$this->db->select('*');
		$this->db->from('daftar_kota');

		
		return $this->db->get();
	}
	
	public function addRute($rute_awal,$rute_akhir,$kode,$jumlah_kursi,$nama_type,$keterangan,$harga){


//Transportation_type
		$transportasi_type = array( 
			'nama_type'	=>  $nama_type,
			'keterangan'	=>  $keterangan,
			'harga_transportasi'	=>  $harga,
		);
		$this->db->insert('type_transportasi', $transportasi_type);
		$id_transportasi_type = $this->db->insert_id();



//Transportation_type
		$transportasi = array( 
			'kode'	=>  $kode,
			'jumlah_kursi'	=>  $jumlah_kursi,
			'id_type_transportasi'	=>  $id_transportasi_type,
		);
		$this->db->insert('transportasi', $transportasi);
		$id_transportasi = $this->db->insert_id();




//Transportation_type
		$rute = array( 
			'rute_awal'	=>  $rute_awal , 
			'rute_akhir'=>  $rute_akhir, 
			'rute_akhir'=>  $rute_akhir, 
			'tujuan' => $rute_akhir,
			'id_transportasi' => $id_transportasi
		);
		$this->db->insert('rute', $rute);
	}
}

/* End of file login.php */
/* Location: ./application/models/login.php */

