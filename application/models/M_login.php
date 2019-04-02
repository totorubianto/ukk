<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	
	function cek_petugas($table,$where){
		$username=$where['username'];
		$password=$where['password'];
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->join('level', 'petugas.id_level = level.id_level');
		$this->db->where('petugas.username', $username);
		$this->db->where('petugas.password', $password);
		
		$query=$this->db->get();
		$row = $query->row_array();
		// echo $row['nama_level'];
		if($row > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'level' => $row['nama_level'],
				'id' => $row['id_petugas'],

			);
			
			$this->session->set_userdata($data_session);

			redirect(base_url("home/"));
		}else{
			echo "Username dan password salah !";
			redirect(base_url("auth/login"));
		}
		// print_r($query);
	}	
	
}

/* End of file login.php */
/* Location: ./application/models/login.php */