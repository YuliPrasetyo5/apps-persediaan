<?php

class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('login');
	}

	public function login_aksi()
	{
		$user = $this->input->post('username',true);
		$pass = md5($this->input->post('password',true));

		//rule validasi
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() != FALSE) {
			$where = array(
				'username' => $user,
				'password' => $pass
			);

			$cekLogin = $this->User_model->cek_login($where)->num_rows();

			if ($cekLogin > 0){
				$sess_data = array(
					'username' => $user,
					'login' => 'OK'
				);

				$this->session->set_userdata($sess_data);
				redirect(base_url('dashboard'));

			}else{
				redirect(base_url('login'));

			}

		}else{
			$this->load->view('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
?>