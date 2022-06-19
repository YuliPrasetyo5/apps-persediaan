<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//apabila tidak ada session login akan di arahkan ke controller login
        if(empty($this->session->userdata('login'))){
        	redirect('login');
        }
		$this->load->model('barangmasuk_model');
		$this->load->model('databarang_model');
		$this->load->model('supplier_model');
		$this->load->model('User_model');
        // is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Barang masuk';
		$data['barangmasuk'] = $this->barangmasuk_model->get_data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('barangmasuk',$data);
		$this->load->view('templates/footer');
	}

	// Load Halaman Tambah Barang Masuk
	public function tambah()
	{
		$data['title'] = 'Tambah Barang masuk';
		$data['databarang'] = $this->databarang_model->get_data('tbl_databarang')->result();
		$data['supplier'] = $this->supplier_model->get_data('tbl_supplier')->result();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_barangmasuk');
		$this->load->view('templates/footer');
	}

	// Menambah Barang Masuk
	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'id_databarang' => $this->input->post('id_databarang'),
				'id_supplier' => $this->input->post('id_supplier'),
				'jumlah_masuk' => $this->input->post('jumlah_masuk'),
				'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			);

			$this->barangmasuk_model->insert_data($data,'tbl_barangmasuk');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 			Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('barangmasuk');
		}
	}

	public function edit($id_barangmasuk)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_barangmasuk' => $id_barangmasuk,
				'id_databarang' => $this->input->post('id_databarang'),
				'id_supplier' => $this->input->post('id_supplier'),
				'jumlah_masuk' => $this->input->post('jumlah_masuk'),
				'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			);

			$this->barangmasuk_model->update_data($data, 'tbl_barangmasuk');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 			Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('barangmasuk');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_databarang', 'Nama Barang', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('id_supplier', 'Nama Supplier', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required', array(
			'required' => '%s harus diisi !!'
		));
	}

	public function delete($id)
	{
		$where = array('id_barangmasuk' => $id);

			$this->barangmasuk_model->delete($where, 'tbl_barangmasuk');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 			Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('barangmasuk');
	}

}
?>