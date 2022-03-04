<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktural extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Struktural_model');
	}

	public function index()
	{
		$data['title'] = 'struktural';
		$data['struktural'] = $this->Struktural_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('struktural/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kode = 	$this->Struktural_model->buat_kode();
		$struktural = $this->input->post('struktural');
		$notelp = 	$this->input->post('notelp');
		$alamat = 	$this->input->post('alamat');
		$jabatan = $this->input->post('jabatan');

		$data = array(
			'id_struktural' => $kode,
			'nama_struktural' => $struktural,
			'notelp' => $notelp,
			'alamat' => $alamat,
			'jabatan' => $jabatan
		);

		$this->Struktural_model->tambah_data($data, 'struktural');
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
		redirect('struktural');
	}

	public function proses_ubah()
	{
		$kode = 	$this->input->post('idstruktural');
		$struktural = $this->input->post('struktural');
		$notelp = 	$this->input->post('notelp');
		$alamat = 	$this->input->post('alamat');

		$data = array(
			'nama_struktural' => $struktural,
			'notelp' => $notelp,
			'alamat' => $alamat
		);

		$where = array(
			'id_struktural' => $kode
		);

		$this->Struktural_model->ubah_data($where, $data, 'struktural');
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
		redirect('struktural');
	}

	public function proses_hapus($id)
	{
		$where = array('id_struktural' => $id);
		$this->Struktural_model->hapus_data($where, 'struktural');
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
		redirect('struktural');
	}

	public function getData()
	{
		$id = $this->input->post('id');
		$where = array('id_struktural' => $id);
		$data = $this->Struktural_model->detail_data($where, 'struktural')->result();
		echo json_encode($data);
	}
}
