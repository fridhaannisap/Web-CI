<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function getAllProduk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('brand', 'produk.brand = brand.id_brand');
		return $this->db->get()->result_array();
	}
	
	public function getAllBrand()
	{
		return $this->db->get('brand')->result_array();
	}

	public function tambahProduk($dataProduk)
	{
		$this->db->insert('produk', $dataProduk);
	}

	public function getAllPesanan()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
		$this->db->join('brand', 'produk.brand = brand.id_brand');
		return $this->db->get()->result_array();
	}

}

/* End of file Produk_model.php */
