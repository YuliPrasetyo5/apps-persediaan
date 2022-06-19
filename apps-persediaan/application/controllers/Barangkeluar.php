<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//apabila tidak ada session login akan di arahkan ke controller login
        if(empty($this->session->userdata('login'))){
        	redirect('login');
        }
		$this->load->model('barangkeluar_model');
		$this->load->model('databarang_model');
		$this->load->model('User_model');
        // is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Barang keluar';
		$data['barangkeluar'] = $this->barangkeluar_model->get_data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('barangkeluar',$data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Barang keluar';
		$data['databarang'] = $this->databarang_model->get_data('tbl_databarang')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_barangkeluar');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'id_databarang' => $this->input->post('id_databarang'),
				'jumlah_keluar' => $this->input->post('jumlah_keluar'),
				'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			);

			$this->barangkeluar_model->insert_data($data,'tbl_barangkeluar');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 			Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('barangkeluar');
		}
	}

	public function edit($id_barangkeluar)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_barangkeluar' => $id_barangkeluar,
				'id_databarang' => $this->input->post('id_databarang'),
				'jumlah_keluar' => $this->input->post('jumlah_keluar'),
				'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			);

			$this->barangkeluar_model->update_data($data, 'tbl_barangkeluar');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 			Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('barangkeluar');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_databarang', 'Nama Barang', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('jumlah_keluar', 'jumlah_keluar', 'required', array(
			'required' => '%s harus diisi !!'
		));
	}

	public function delete($id)
	{
		$where = array('id_barangkeluar' => $id);

			$this->barangkeluar_model->delete($where, 'tbl_barangkeluar');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 			Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 			redirect('barangkeluar');
	}

}
?>