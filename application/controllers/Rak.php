<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rak_model');
	}
	public function index()
	{
		$data['title'] = 'Rak';
		$data['rak'] = $this->Rak_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('rak/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kode_rak = $this->input->post('kode_rak');
		$nama_rak = $this->input->post('nama_rak');
		$keterangan = 	$this->input->post('keterangan');

		$data = array(
			'kode_rak' => $kode_rak,
			'nama_rak' => $nama_rak,
			'keterangan' => $keterangan,
		);

		$this->Rak_model->tambah_data($data, 'rak');
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
		redirect('rak');
	}

	public function proses_ubah()
	{
		$kode = $this->input->post('idrak');
		$kode_rak = $this->input->post('kode_rak');
		$nama_rak = $this->input->post('nama_rak');
		$keterangan = 	$this->input->post('keterangan');

		$data = array(
			'kode_rak' => $kode_rak,
			'nama_rak' => $nama_rak,
			'keterangan' => $keterangan
		);

		$where = array(
			'id_rak' => $kode
		);

		$this->Rak_model->ubah_data($where, $data, 'rak');
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
		redirect('rak');
	}

	public function proses_hapus($id)
	{
		$where = array('id_rak' => $id);
		$this->Rak_model->hapus_data($where, 'rak');
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
		redirect('rak');
	}

	public function getData()
	{
		$id = $this->input->post('id');
		$where = array('id_rak' => $id);
		$data = $this->Rak_model->detail_data($where, 'rak')->result();
		echo json_encode($data);
	}
}
