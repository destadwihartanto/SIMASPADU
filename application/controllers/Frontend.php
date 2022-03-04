<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Website_model', 'Website');
		$this->load->model('Struktural_model');

	}
		public function index()
	{
		$data['program'] = $this->db->get('program')->result_array();
        $this->load->view('frontend/index', $data);

	}

	public function tentang()
	{
		$data['struktural'] = $this->Struktural_model->data()->result();

		$data['program'] = $this->db->get('program')->result_array();
		$data['kajian'] = $this->db->get('kajian')->result_array();
		$data['partner'] = $this->db->get('partner')->result_array();
        $this->load->view('frontend/tentang', $data);

	}

	public function laporan()
	{
		$title = 'Laporan KAS';
		$kas = $this->db->get('kas')->result_array();
		$debet = $this->db->select_sum('debet')->get('kas')->row()->debet;
		$kredit = $this->db->select_sum('kredit')->get('kas')->row()->kredit;
									$total_debet = $debet;
									$total_kredit = $kredit;
									// $jumlah_saldo =
									$total_saldo = $debet - $kredit;

		$data = [
			'title' => $title,
			'kas' => $kas,
			'total_debet' => $total_debet,
			'total_kredit' => $total_kredit,
			'total_saldo' => $total_saldo,

		];


		$this->form_validation->set_rules('keterangan', 'Note', 'required|trim');
		$this->form_validation->set_rules('tgl', 'Date', 'required|trim');
		$this->form_validation->set_rules('method', 'Metode', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|numeric');
		if ($this->form_validation->run() == false) {

			$this->load->view('frontend/laporan', $data);

	} else {
		$method = $this->input->post('method');
		if ($method == 'debet') {
			$data = [
				'kd_rek' => 'D' . date("Y-m-d"),
				'keterangan' => $this->input->post('keterangan'),
				'tgl' => $this->input->post('tgl'),
				'debet' => $this->input->post('jumlah'),
				'kredit' => '-',
				'created'     => date("20y-m-d H:i:s"),
				'id_user' => $this->session->userdata('login_session')['id_user']
				// 'usrinput'	=> $this->session->userdata('login_session')['id_user'],

			];
			$this->db->insert('kas', $data);
		} else {
			$data = [
				'kd_rek' => 'K' . date("Y-m-d"),
				'keterangan' => $this->input->post('keterangan'),
				'tgl' => $this->input->post('tgl'),
				'debet' => '-',
				'kredit' => $this->input->post('jumlah'),
				'created'     => date("20y-m-d H:i:s"),
				'id_user' => $this->session->userdata('login_session')['id_user']
				// 'id_user'	=> $id_user

			];
			$this->db->insert('kas', $data);
		}
		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan KAS berhasil ditambahkan!</div>');
		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('cashflow');
	}

	}

	public function contact()
	{
        $this->load->view('frontend/contact');

	}
}
