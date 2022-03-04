<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashflow extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		// $this->load->model('Cashflow_model');
		date_default_timezone_set("Asia/Jakarta");

	}
	public function index()
	{
		$title = 'Laporan KAS';
		$kas = $this->db->get('kas')->result_array();
		$debet = $this->db->select_sum('debet')->get('kas')->row()->debet;
		$kredit = $this->db->select_sum('kredit')->get('kas')->row()->kredit;
									$total_debet = $debet;
									$total_kredit = $kredit;
									$total_saldo = $debet - $kredit;
									$data['useraktif'] = $this->db->count_all('user');


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

        $this->load->view('templates/header', $data);
		$this->load->view('cashflow/index');
		$this->load->view('templates/footer');
	} else {
		$method = $this->input->post('method');
		if ($method == 'debet') {
			$data = [
				'kd_rek' => 'D' . date("d-m-Y"),
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
// untuk halaman laporan kas
public function laporan()
	{
		$title = 'Laporan KAS';

		$kas = $this->db->get('kas')->result_array();
		$debet = $this->db->select_sum('debet')->get('kas')->row()->debet;
		$kredit = $this->db->select_sum('kredit')->get('kas')->row()->kredit;
									$total_debet = $debet;
									$total_kredit = $kredit;
									$total_saldo = $debet - $kredit;
									$data['useraktif'] = $this->db->count_all('user');


		$data = [
			'title' => $title,
			'kas' => $kas,
			'total_debet' => $total_debet,
			'total_kredit' => $total_kredit,
			'total_saldo' => $total_saldo,

		];
		$this->load->view('templates/header', $data);
		$this->load->view('cashflow/laporan');
		$this->load->view('templates/footer');
	}


public function hapus_kas($id)
	{
		if ($id == "") {
			$this->db->insert('kas', $id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="Gagal Dihapus!</div>');
			redirect('pengelolaan');
		} else {
			$this->db->where('id', $id);
			$this->db->delete('kas');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses Dihapus!</div>');
			redirect('cashflow');
		}
	}




	public function filter_laporan()
	{

		if ($this->input->post('submit')) {

			$start = $this->input->post('start');
			$to = $this->input->post('end');

			$data['list_laporan'] = $this->Cashflow_model->list_laporan($start, $to);

			$data['title'] = 'siswa';

			$data['title2'] = 'siswa laporan';

			$data['layout'] = 'admin/siswa/laporan_siswa';
			$this->load->view('admin/layout_admin', $data);
		}
	}

}
