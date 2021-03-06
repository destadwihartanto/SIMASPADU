<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();

		$this->load->model('Jenis_model');
		// $this->load->library('pagination');
	}

	public function index()
	{
		$data['title'] = 'Jenis Barang';
		$data['jenis'] = $this->Jenis_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('jenis/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$jenis = $this->input->post('jenis');
		$ket = 	$this->input->post('ket');

		$data = array(
			'nama_jenis' => $jenis,
			'ket' => $ket,
		);

		$this->Jenis_model->tambah_data($data, 'jenis');
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
		redirect('jenis');
	}

	public function proses_ubah()
	{
		$kode = $this->input->post('idjenis');
		$jenis = $this->input->post('jenis');
		$ket = 	$this->input->post('ket');

		$data = array(
			'nama_jenis' => $jenis,
			'ket' => $ket
		);

		$where = array(
			'id_jenis' => $kode
		);

		$this->Jenis_model->ubah_data($where, $data, 'jenis');
		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('jenis');
	}

	public function proses_hapus($id)
	{
		$where = array('id_jenis' => $id);
		$this->Jenis_model->hapus_data($where, 'jenis');
		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('jenis');
	}

	public function getData()
	{
		$id = $this->input->post('id');
		$where = array('id_jenis' => $id);
		$data = $this->Jenis_model->detail_data($where, 'jenis')->result();
		echo json_encode($data);
	}
}

