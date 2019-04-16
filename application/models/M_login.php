<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	
	function cek_petugas($table,$where){
		$username=$where['username'];
		$password=$where['password'];
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.username', $username);
		$this->db->where('users.password', $password);
		$query=$this->db->get();
		$row = $query->row_array();
		// echo $row['nama_level'];
		if($row > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'id' => $row['id_users'],
			);
			$this->session->set_userdata($data_session);
			redirect(base_url("index"));
		}else{
			
			redirect('auth/login','refresh');
		}
		// print_r($query);
	}	
	
}

/* End of file login.php */
/* Location: ./application/models/login.php */