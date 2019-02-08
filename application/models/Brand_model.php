<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model {

	public function getAllBrand()
	{
		return $this->db->get('brand')->result_array();
	}

	public function add_brand_bayar($id)
	{
		$this->db->where('id_nota', $id);
		$this->db->update('pesanan', ['status' => 1]);
	}

	public function hapus_brand_bayar($id)
	{
		$this->db->where('id_nota', $id);
		$this->db->update('pesanan', ['status' => 0]);
	}

	public function addBrandNew($data)
	{
		$this->db->insert('brand', $data);
	}

}

/* End of file Brand_model.php */
