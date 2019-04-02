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
	
}

/* End of file login.php */
/* Location: ./application/models/login.php */