<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alpha extends CI_Controller {


	public function __construct()
    {
        parent::__construct();

        //apabila tidak ada session login akan di arahkan ke controller login
        if(empty($this->session->userdata('login'))){
        	redirect('login');
        }
		$this->load->model('User_model');
 		$this->load->model('Alpha_model');
		// is_logged_in();
    }
	public function index()
	{
		$data['title'] = "Parameter Alpha";
		// $id_user=$this->session->userdata('id_user');
  		// $data['user']=$this->User_model->get_user($id_user);
		$data['alpha']=$this->Alpha_model->get_alpha(); // Mendapatkan nilai Alpha 
		$this->form_validation->set_rules('alpha', 'Alpha', 'required');
		if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('Alpha/index.php', $data);
		$this->load->view('templates/footer');
	}else{
		$alpha =$this->input->post('alpha', true); // Mengambil Inputan Nilai Alpha yang baru
		 
		$this->Alpha_model->update_alpha($alpha,1); // Mengubah Nilai Alpha baru
		$this->session->set_flashdata('flash', 'Diubah');
		$this->session->set_flashdata('data', 'Alpha');
		redirect('alpha');
	}
	}
}
?>