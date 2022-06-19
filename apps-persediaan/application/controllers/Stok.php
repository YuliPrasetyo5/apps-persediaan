<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//apabila tidak ada session login akan di arahkan ke controller login
        if(empty($this->session->userdata('login'))){
        	redirect('login');
        }
		$this->load->model('databarang_model');
		$this->load->model('barangmasuk_model');
		$this->load->model('barangkeluar_model');
		$this->load->model('User_model');
        // is_logged_in();
	}

	// Fungsi menampilkan Index databarang //
	public function index()
	{
		$data['title'] = 'Stok';

		// Mengambil data dari Model databarang dan ditampilkan dalam bentuk tabel //  
		$data['databarang'] = $this->databarang_model->get_data('tbl_databarang')->result();

		// Membuka View databarang //
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('stok',$data);
		$this->load->view('templates/footer');
	}
}
?>