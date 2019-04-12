<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {
	
	function getRute(){

		$this->db->select('*');
		$this->db->from('rute');

		
		return $this->db->get();

		// echo $row['nama_level'];
		// print_r($query);
	}	
	function rute_awal(){
		$this->db->select('*');
		$this->db->from('daftar_kota');

		
		return $this->db->get();
	}

	function rute_akhir(){
		$this->db->select('*');
		$this->db->from('daftar_kota');
		$this->db->order_by('nama_kota ASC');
		
		return $this->db->get();
	}

	function getTransportasi($rute_awal,$rute_akhir,$date){
		$this->db->select('*');
		$this->db->from('transportasi');
		$this->db->join('type_transportasi', 'transportasi.id_type_transportasi = type_transportasi.id_type_transportasi'
	);
		$this->db->join('rute', 'transportasi.id_transportasi = rute.id_transportasi');

		$this->db->where('rute.rute_awal', $rute_awal);
		$this->db->where('rute.rute_akhir', $rute_akhir);
		$this->db->where('type_transportasi.hari', $date);
		return $this->db->get();

		// echo $row['nama_level'];
		// print_r($query);
	}	
	function getTransportasiId($id_transportasi){
		$this->db->select('*');
		$this->db->from('transportasi');
		$this->db->join('type_transportasi', 'transportasi.id_type_transportasi = type_transportasi.id_type_transportasi');
		$this->db->join('rute', 'transportasi.id_transportasi = rute.id_transportasi');
		$this->db->where('transportasi.id_transportasi', $id_transportasi);
		return $this->db->get();
		// echo $row['nama_level'];
		// print_r($query);
	}	
	function getPemesanan($id_transportasi){
		$this->db->select('kode_kursi');
		$this->db->from('transportasi');
		$this->db->where('transportasi.id_transportasi', $id_transportasi);
		$this->db->join('rute', 'transportasi.id_transportasi = rute.id_transportasi');
		$this->db->join('pemesanan', 'pemesanan.id_rute = rute.id_rute');
		
		return $this->db->get();
		// echo $row['nama_level'];
		// print_r($query);
	}	
	function addRute($id_transportasi,$tujuan,$rute_awal,$rute_akhir){
		$data = array( 
			'tujuan'	=>  $tujuan , 
			'rute_awal'=>  $rute_awal, 
			'rute_akhir'	=>  $rute_akhir,
			'id_transportasi'	=>  $id_transportasi,
		);
		$this->db->insert('rute', $data);
		$id_rute = $this->db->insert_id();
		return  $id_rute;
		// if ($this->db->simple_query('INSERT INTO rute ('tujuan', 'rute_awal', 'rute_akhir', 'id_transportasi') VALUES ( '$tujuan', '$rute_awal', '$rute_akhir', '$id_transportasi')'))
		// {
		// 	echo "Success!";
		// }
		// else
		// {
		// 	echo "Query failed!";
		// }
	}	
	function postPemesanan($id_users,$kode_kursi,$id_rute,$kode_pemesanan,$tempat_pemesanan){
		
		$pemesanan = array( 
			'kode_pemesanan'				=>  $kode_pemesanan,
			'tempat_pemesanan'			=>  $tempat_pemesanan,
			'id_users'	=>  $id_users,
			'kode_kursi'	=>  $kode_kursi,
			'id_rute'	=>  $id_rute,
		);
		$this->db->insert('pemesanan', $pemesanan);
	}

}

/* End of file login.php */
/* Location: ./application/models/login.php */