<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//apabila tidak ada session login akan di arahkan ke controller login
        if(empty($this->session->userdata('login'))){
        	redirect('login');
        }
		$this->load->model('supplier_model');
		$this->load->model('User_model');
        // is_logged_in();
	}

	// Fungsi menampilkan index supplier //
	public function index()
	{
		$data['title'] = 'Supplier';

		// Mengambil data dari Model supplier dan ditampilkan dalam bentuk tabel //
		$data['supplier'] = $this->supplier_model->get_data('tbl_supplier')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('supplier',$data);
		$this->load->view('templates/footer');
	}

	// Fungsi menampilkan View tambah databarang //
	public function tambah()
	{
		$data['title'] = 'Tambah Supplier';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_supplier');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nama_supplier' => $this->input->post('nama_supplier'),
				'alamat' => $this->input->post('alamat'),
				'nomor_hp' => $this->input->post('nomor_hp'),
			);

			$this->supplier_model->insert_data($data,'tbl_supplier');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 			Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('supplier');
		}
	}

	public function ubah_aksi($id_supplier)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_supplier' => $id_supplier,
				'nama_supplier' => $this->input->post('nama_supplier'),
				'alamat' => $this->input->post('alamat'),
				'nomor_hp' => $this->input->post('nomor_hp'),
			);

			$this->supplier_model->update_data($data, 'tbl_supplier');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 			Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('supplier');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required', array(
			'required' => '%s harus diisi !!'
		));
	}

	public function delete($id)
	{
		$where = array('id_supplier' => $id);

			$this->supplier_model->delete($where, 'tbl_supplier');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 			Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('supplier');
	}

}
?>