<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
	
	parent::__construct();

		$this->load->model('Login_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->load->view('templates/header_login');
		$this->load->view('login/index');
		$this->load->view('templates/footer_login');
	}

	public function proses_login()
	{
		$username = $this->input->post('user');
		$password = $this->input->post('pwd');

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		$cek = $this->Login_model->cek_login($where, 'user')->num_rows();
		$data = $this->Login_model->cek_login($where, 'user')->row_array();
		if ($cek > 0) {

			$userdata = [
				'id_user' => $data['id_user'],
				'username' => $data['nama'],
				'status' => $data['status'],
				'level' => $data['level'],
				'foto' => $data['foto']
			];

			$this->session->set_userdata('login_session', $userdata);

			$respon = array('respon' => 'success');
			echo json_encode($respon);
		} else {
			$respon = array('respon' => 'failed');
			echo json_encode($respon);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('login_session');
		redirect('login');
	}
}

