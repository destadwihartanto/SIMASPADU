<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangKeluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Barang_model');
		$this->load->model('BarangKeluar_model');
	}
	public function index()
	{
		$data['title'] = 'Barang Keluar';
		$data['bk'] = $this->BarangKeluar_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barangKeluar/index');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Barang Keluar';

		$this->load->view('templates/header', $data);
		$this->load->view('barangKeluar/laporan');
		$this->load->view('templates/footer');
	}

	public function getBarangKeluar()
	{
		$data = $this->BarangKeluar_model->dataJoin()->result();
		echo json_encode($data);
	}

	public function filterBarangKeluar($tglawal, $tglakhir)
	{
		$data = $this->BarangKeluar_model->lapdata($tglawal, $tglakhir)->result();
		echo json_encode($data);
	}



	public function getBarang()
	{
		$id = $this->input->post('id');
		$where = array('id_barang' => $id);
		$data = $this->Barang_model->detail_data($where, 'barang')->result();
		echo json_encode($data);
	}

	public function getTotalStok()
	{
		$id = $this->input->post('id');
		$where = array('id_barang' => $id);
		$data = $this->db->select_sum('jumlah_masuk')->from('barang_masuk')->where($where)->get();
		$data2 = $this->db->select_sum('jumlah_keluar')->from('barang_keluar')->where($where)->get();
		$bm = $data->row();
		$bk = $data2->row();
		$hasil = intval($bm->jumlah_masuk) - intval($bk->jumlah_keluar);
		$total = array('total' => $hasil);
		echo json_encode($total);
	}

	public function proses_hapus($id, $jml, $idb)
	{
		$where = array('id_barang_keluar' => $id);
		$this->Barang_model->hapus_data($where, 'barang_keluar');

		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('barang_keluar');
	}

	public function tambah()
	{
		$data['title'] = 'Barang Keluar';

		$data['kode'] = $this->BarangKeluar_model->buat_kode();

		$data['barang'] = $this->Barang_model->data()->result();
		$data['jmlbarang'] = $this->Barang_model->data()->num_rows();

		$data['tglnow'] = date('m/d/Y');

		$this->load->view('templates/header', $data);
		$this->load->view('barangKeluar/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Barang Keluar';

		//menampilkan data berdasarkan id
		$data['data'] = $this->BarangKeluar_model->detailJoin($id)->result();


		$this->load->view('templates/header', $data);
		$this->load->view('barangKeluar/form_ubah');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kode = $this->input->post('idbk');
		$tgl = $this->input->post('tgl');
		$barang = $this->input->post('barang');
		$status = $this->input->post('status');
		$catatan = $this->input->post('catatan');
		$jmlkeluar = $this->input->post('jmlbarang');
		$usrinput = $this->session->userdata('login_session')['id_user'];

		$explode = explode("/", $tgl);
		$tglkeluar = $explode[2] . '-' . $explode[0] . '-' . $explode[1];

		$data = array(
			'id_barang_keluar' => $kode,
			'id_barang' => $barang,
			'jumlah_keluar' => $jmlkeluar,
			'tgl_keluar' => $tglkeluar,
			'status' => $status,
			'catatan' => $catatan,
			'id_user' => $usrinput
		);

		$where = array('id_barang' => $barang);

		$this->BarangKeluar_model->tambah_data($data, 'barang_keluar');
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
		redirect('barang_keluar');
	}


	public function proses_ubah()
	{
		$kode = $this->input->post('idbk');
		$barang = $this->input->post('barang');
		$tgl = $this->input->post('tgl');
		$jmlkeluar = $this->input->post('jmlkeluar');
		$jmlkeluarlama = $this->input->post('jmlkeluarlama');
		$status = $this->input->post('status');
		$catatan = $this->input->post('catatan');

		$explode = explode("/", $tgl);
		$tglkeluar = $explode[2] . '-' . $explode[0] . '-' . $explode[1];

		$data = array(
			'id_barang' => $barang,
			'jumlah_keluar' => $jmlkeluar,
			'tgl_keluar' => $tglkeluar,
			'status' => $status,
			'catatan' => $catatan,

		);
		$where = array('id_barang_keluar' => $kode);

		$this->BarangKeluar_model->ubah_data($where, $data, 'barang_keluar');
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
		redirect('barang_keluar');
	}
}
