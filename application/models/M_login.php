<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function cek_petugas($table,$where){		
		return $this->db->get_where($table,$where);
	}	

}

/* End of file login.php */
/* Location: ./application/models/login.php */