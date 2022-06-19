<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        //apabila tidak ada session login akan di arahkan ke controller login
        if(empty($this->session->userdata('login'))){
        	redirect('login');
        }
        $this->load->model('databarang_model');
        $this->load->model('penjualan_model');
        $this->load->model('Hasil_model');
        // $this->load->model('User_model');
        // is_logged_in();      
    }

	public function index()
	{
		$data['title'] = "dashboard";
		// $data['penjualan']=$this->penjualan_model->get_all_penjualan();
		// $data['bulan']=$this->Hasil_model->get_label_bawah();
		// $data['dt_databarang'] = $this->databarang_model->get_databarang_byid($id); //??
		// $data['at']=$this->Hasil_model->get_at($id);
  	// $data['nama'] = $data['dt_databarang']['nama_barang']; //??
  	// $data['nama'] = $data['dt_databarang']['nama_barang']; //??
    // $id_user=$this->session->userdata('id_user');		
    // $data['user']=$this->User_model->get_user($id_user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

}
?>