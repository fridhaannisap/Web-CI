<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Admin_model');
		$this->load->model('Produk_model');
		$this->load->model('Brand_model');
		$this->load->helper(array('form', 'url'));
		
		if ($_SESSION['status'] != 'logged in') {
			redirect('login');
			if ($_SESSION['role'] != 2) {
				redirect('home');
			}
		}
	}

	public function index()
	{
		redirect('home');
	}

	public function pesanan()
	{
		$data['pesanan'] = $this->Produk_model->getAllPesanan();
		$this->load->view('template/admin/header');
		$this->load->view('admin/pesanan', $data);
		$this->load->view('template/admin/footer');
	}

	public function brand()
	{
		$data['brand'] = $this->Brand_model->getAllBrand();
		$this->load->view('template/admin/header');
		$this->load->view('admin/brand', $data);
		$this->load->view('template/admin/footer');
	}

	public function add_brand_bayar($id)
	{
		$this->Brand_model->add_brand_bayar($id);
		redirect('admin/pesanan','refresh');
	}

	public function hapus_brand_bayar($id)
	{
		$this->Brand_model->hapus_brand_bayar($id);
		redirect('admin/pesanan','refresh');
	}

	public function tambahBrand()
	{
		$nama_brand = $this->input->post('nama_brand');
		$gambar = $this->input->post('nama_brand');

		$data = array(
			'nama_brand' => $nama_brand, 
			'gambar' => $gambar,
		);
		
		$this->Brand_model->addBrandNew($data);
		// $gambar = $this->aksi_upload();
		
		redirect('admin/brand','refresh');
	}

	public function aksi_upload()
	{
		$config['upload_path']          = './assets/images/brand/';
		$config['allowed_types']        = 'gif|jpg|png';
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('pesan' => $this->upload->display_errors());
			
			redirect('home','refresh');
			
		}else{
			$data = array('pesan' => $this->upload->data());

			redirect('home','refresh');

		}
	}

}
