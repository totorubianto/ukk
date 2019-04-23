<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	public function getAllRute($search_rute_awal,$search_rute_akhir,$limit,$start){
		if (empty($search_rute_awal)) {
			$this->db->select('*');
			$this->db->from('rute');
			$this->db->join('transportasi','transportasi.id_transportasi = rute.id_transportasi','left');
			$this->db->join('type_transportasi','transportasi.id_transportasi = type_transportasi.id_type_transportasi','full');
			$this->db->select('k1.nama_kota rute_awal,k2.nama_kota rute_akhir,k1.kode_kota rute_awal_kode,k2.kode_kota rute_akhir_kode,k1.bandara bandara_rute_awal,k2.bandara bandara_rute_akhir');
			$this->db->join('daftar_kota k1','rute.rute_awal = k1.id_kota','left');
			$this->db->join('daftar_kota k2','rute.rute_akhir = k2.id_kota','left');
			$this->db->order_by('id_rute','asc'); 
			$this->db->limit($limit, $start); 
			return $this->db->get();
		}else {
			$this->db->select('*');
			$this->db->select('k1.nama_kota rute_awal,k2.nama_kota rute_akhir,k1.kode_kota rute_awal_kode,k2.kode_kota rute_akhir_kode,k1.bandara bandara_rute_awal,k2.bandara bandara_rute_akhir');
			$this->db->from('rute');
			$this->db->join('transportasi','transportasi.id_transportasi = rute.id_transportasi','left');
			$this->db->join('type_transportasi','transportasi.id_transportasi = type_transportasi.id_type_transportasi','full');
			$this->db->join('daftar_kota k1','rute.rute_awal = k1.id_kota','full');
			$this->db->join('daftar_kota k2','rute.rute_akhir = k2.id_kota','full');
			$this->db->order_by('id_rute','asc'); 
			$this->db->where('rute.rute_akhir', $search_rute_akhir);
			$this->db->where('rute.rute_awal', $search_rute_awal);
			return $this->db->get();
		}
		
	}
	public function getRute_awal(){
		$this->db->select('*');
		$this->db->from('daftar_kota');
		return $this->db->get();
	}
	public function getRute_akhir(){
		$this->db->select('*');
		$this->db->from('daftar_kota');
		$this->db->order_by('nama_kota ASC');
		return $this->db->get();
	}
	public function addRute($rute_awal,$rute_akhir,$kode,$jumlah_kursi,$nama_type,$keterangan,$harga,$date,$jam,$vendor){

		//Transportation_type
		$transportasi_type = array( 
			'nama_type'				=>  $nama_type,
			'keterangan'			=>  $keterangan,
			'harga_transportasi'	=>  $harga,
			'hari'	=>  $date,
			'jam'	=>  $jam,
			'id_vendor'				=>  $vendor,
		);
		$this->db->insert('type_transportasi', $transportasi_type);
		$id_transportasi_type = $this->db->insert_id();

		//Transportation
		$transportasi = array( 
			'kode'					=>  $kode,
			'jumlah_kursi'			=>  $jumlah_kursi,
			'id_type_transportasi'	=>  $id_transportasi_type,

		);
		$this->db->insert('transportasi', $transportasi);
		$id_transportasi = $this->db->insert_id();

		//Rute
		$rute = array( 
			'rute_awal'				=>  $rute_awal , 
			'rute_akhir'			=>  $rute_akhir, 
			'rute_akhir'			=>  $rute_akhir, 
			'tujuan' 				=> $rute_akhir,
			'id_transportasi' 		=> $id_transportasi
		);
		$this->db->insert('rute', $rute);
		redirect(base_url("admin/index/"));
	}
	public function getData($rute_awal,$rute_akhir){
		$this->db->select('*');
		$this->db->from('rute');
		$this->db->join('transportasi', 'transportasi.id_type_transportasi = type_transportasi.id_type_transportasi');
		$this->db->join('rute', 'transportasi.id_transportasi = rute.id_transportasi');
		$this->db->where('rute.rute_awal', $rute_awal);
		$this->db->where('rute.rute_akhir', $rute_akhir);
		$this->db->where('type_transportasi.hari', $date);
		return $this->db->get();
	}
	public function getVendor(){
		$this->db->select('*');
		$this->db->from('vendor');
		return $this->db->get();
	}
	public function getPemesanan1(){
			$this->db->select('*');
			$this->db->from('pemesanan');
			$this->db->join('users', 'pemesanan.id_users = users.id_users');
			$this->db->join('rute', 'rute.id_rute = pemesanan.id_rute');
			$this->db->join('transportasi', 'transportasi.id_transportasi = rute.id_transportasi');
			$this->db->join('type_transportasi', 'type_transportasi.id_type_transportasi = transportasi.id_type_transportasi');
			return $this->db->get();
	}
	public function getPemesanan2($kode){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('users', 'pemesanan.id_users = users.id_users');
		$this->db->join('rute', 'rute.id_rute = pemesanan.id_rute');
		$this->db->join('transportasi', 'transportasi.id_transportasi = rute.id_transportasi');
		$this->db->join('type_transportasi', 'type_transportasi.id_type_transportasi = transportasi.id_type_transportasi');
		$this->db->where('pemesanan.kode_pemesanan', $kode);
		return $this->db->get();
	}
	public function get_reservation_id($id){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->where('pemesanan.id_pemesanan', $id);
		return $this->db->get()->row_array();
	}

}
