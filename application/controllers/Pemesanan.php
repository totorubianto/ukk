<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function index()
    {
        $data["products"] = $this->product_model->getAll();
        $this->load->view("admin/product/list", $data);
    }

}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */