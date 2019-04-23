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
		$this->db->join('type_transportasi', 'transportasi.id_type_transportasi = type_transportasi.id_type_transportasi');
		$this->db->join('rute', 'transportasi.id_transportasi = rute.id_transportasi');
		$this->db->join('vendor', 'type_transportasi.id_vendor = vendor.id_vendor');
		$this->db->where('rute.rute_awal', $rute_awal);
		$this->db->where('rute.rute_akhir', $rute_akhir);
		$this->db->where('type_transportasi.hari', $date);
		return $this->db->get();

		// echo $row['nama_level'];
		// print_r($query);
	}	
	function getRuteKota($rute_awal,$rute_akhir){
		$this->db->select('*');
		$this->db->from('rute');
		$this->db->where('rute.rute_awal', $rute_awal);
		$this->db->where('rute.rute_akhir', $rute_akhir);
		$this->db->select('k1.nama_kota rute_awal,k2.nama_kota rute_akhir,k1.kode_kota rute_awal_kode,k2.kode_kota rute_akhir_kode,k1.bandara bandara_rute_awal,k2.bandara bandara_rute_akhir');
		$this->db->join('daftar_kota k1','rute.rute_awal = k1.id_kota','left');
		$this->db->join('daftar_kota k2','rute.rute_akhir = k2.id_kota','left');

		return $this->db->get();
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
		$this->db->join('penumpang', 'penumpang.id_pemesanan = pemesanan.id_pemesanan');
		return $this->db->get();
		// echo $row['nama_level'];
		// print_r($query);
	}	
	function addRute($id_transportasi,$tujuan,$rute_awal,$rute_akhir){
		$data = array( 
			'tujuan'				=>  $tujuan , 
			'rute_awal'				=>  $rute_awal, 
			'rute_akhir'			=>  $rute_akhir,
			'id_transportasi'		=>  $id_transportasi,
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
	function postPemesanan($id_users,$id_rute,$tempat_pemesanan,$harga,$tanggal_berangkat,$jam,$customer_form,$customer_seat ){
		
		$pemesanan = array( 
			'kode_pemesanan'			=>  $customer_form['kode_pemesanan'],
			'tempat_pemesanan'			=>  $tempat_pemesanan,
			'id_users'					=>  $id_users,
			'id_rute'					=>  $id_rute,
			'total_bayar'				=>  $harga,
			'tanggal_berangkat'			=>  $tanggal_berangkat,
			'jam_berangkat'				=>  $jam

		);
		$this->db->insert('pemesanan', $pemesanan);
		$id_data_pesan = $this->db->insert_id();
		// $sql = "DELETE FROM pemesanan WHERE tanggal_pemesanan < NOW() - INTERVAL 1 MINUTE";
		// $this->db->query($sql);
		for ($i = 0; $i < count($customer_form['name']); $i++) {
			$data_customer_form = [

				'nama_penumpang' => $customer_form['name'][$i],
				'alamat' => $customer_form['address'][$i],
				'phone' => $customer_form['phone'][$i],
				'email' => $customer_form['email'][$i],
				'gender' => $customer_form['gender'][$i],
				'id_pemesanan' => $id_data_pesan
			];
			$this->db->insert('penumpang',$data_customer_form);
			$customer_id[] = $this->db->insert_id();

		}
		if (count($customer_id) == count($customer_seat)) {
			for ($i = 0; $i < count($customer_id); $i++) {
				$data_passengers = [
					
					'kode_kursi' => $customer_seat[$i]
				];
				$where = array(
					'id_penumpang' => $customer_id[$i]
				);
				$this->db->update('penumpang',$data_passengers,$where);
			}
		}
  //       return $this->db->insert_id();
		$this->session->unset_userdata('form_customer');
	}
	

	function daftarPemesanan(){
		$id_users = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('users', 'pemesanan.id_users = users.id_users');
		$this->db->where('pemesanan.id_users', $id_users);
		$this->db->where('concat(pemesanan.tanggal_berangkat," ",pemesanan.jam_berangkat) > NOW()');
		return $this->db->get();
	}
	function getPemesananReview($kode){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('users', 'pemesanan.id_users = users.id_users');
		$this->db->where('pemesanan.kode_pemesanan', $kode);
		
		return $this->db->get();
	}
	function getPemesananReview2($kode){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('penumpang', 'penumpang.id_pemesanan = pemesanan.id_pemesanan', 'right join');
		$this->db->where('pemesanan.kode_pemesanan', $kode);
		
		return $this->db->get();
	}
	function getPemesananReview3($kode){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('rute', 'rute.id_rute = pemesanan.id_rute');
		$this->db->join('transportasi', 'transportasi.id_transportasi = rute.id_transportasi');
		$this->db->join('type_transportasi', 'type_transportasi.id_type_transportasi = transportasi.id_type_transportasi');
		$this->db->join('vendor', 'vendor.id_vendor = type_transportasi.id_vendor');
		$this->db->where('pemesanan.kode_pemesanan', $kode);
		$this->db->select('k1.nama_kota rute_awal,k2.nama_kota rute_akhir,k1.kode_kota rute_awal_kode,k2.kode_kota rute_akhir_kode,k1.bandara bandara_rute_awal,k2.bandara bandara_rute_akhir');
		$this->db->join('daftar_kota k1','rute.rute_awal = k1.id_kota','left');
		$this->db->join('daftar_kota k2','rute.rute_akhir = k2.id_kota','left');

		

		
		return $this->db->get();
	}
	function uploadBukti($kode_pemesanan,$bukti){
		$data = array( 
			'bukti'	=> $bukti
		);
		$where = array(
			'kode_pemesanan' => $kode_pemesanan
		);
		$this->db->update('pemesanan', $data, $where);
	}
	
}

/* End of file login.php */
/* Location: ./application/models/login.php */