<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//apabila tidak ada session login akan di arahkan ke controller login
        if(empty($this->session->userdata('login'))){
        	redirect('login');
        }
		$this->load->model('databarang_model');
		$this->load->model('User_model');
	
	}

	// Fungsi menampilkan Index databarang //
	public function index()
	{
		$data['title'] = 'Data barang';

		// Mengambil data dari Model databarang dan ditampilkan dalam bentuk tabel //  
		$data['databarang'] = $this->databarang_model->get_data('tbl_databarang')->result();

		// Membuka View databarang //
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('databarang',$data);
		$this->load->view('templates/footer');
	}

	// Fungsi menampilkan View tambah databarang //
	public function tambah()
	{
		$data['title'] = 'Tambah Data barang';

		// Membuka View tambah databarang //
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_databarang');
		$this->load->view('templates/footer');
	}

	// Fungsi menambahkan databarang ke dalam database //
	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'jenis' => $this->input->post('jenis'),
				'satuan' => $this->input->post('satuan'),
				'harga_beli' => $this->input->post('harga_beli'),
				'harga_jual' => $this->input->post('harga_jual'),
			);

			$this->databarang_model->insert_data($data,'tbl_databarang');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 			Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('databarang');
		}
	}


	// Fungsi mengubah databarang yang ada di database berdasarkan id databarang //
	public function ubah_aksi($id_databarang)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_databarang' => $id_databarang,
				'nama_barang' => $this->input->post('nama_barang'),
				'jenis' => $this->input->post('jenis'),
				'satuan' => $this->input->post('satuan'),
				'harga_beli' => $this->input->post('harga_beli'),
				'harga_jual' => $this->input->post('harga_jual'),
			);

			$this->databarang_model->update_data($data, 'tbl_databarang');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 			Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('databarang');
		}

	}

	// Fungsi ketika field inputan kosong akan muncul " harus diisi !!" //
	public function _rules()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('jenis', 'Jenis', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('satuan', 'Satuan', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required', array(
			'required' => '%s harus diisi !!'
		));
	}

	// Fungsi untuk menghapus data yang ada di database berdasarkan id yang dipilih //
	public function delete($id)
	{
		$where = array('id_databarang' => $id);

			$this->databarang_model->delete($where, 'tbl_databarang');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 			Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('databarang');
	}

}
?>