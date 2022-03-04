<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('BarangMasuk_model');
		$this->load->model('BarangKeluar_model');
	}
	public function index()
	{
		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');

		if ($tglawal != '' && $tglakhir != '') {
			$data['data'] = $this->BarangMasuk_model->lapdata($tglawal, $tglakhir)->result();
		} else {
			$data['data'] = $this->BarangMasuk_model->dataJoin()->result();
		}

		$data['tglawal'] = $tglawal;
		$data['tglakhir'] = $tglakhir;

		$data['judul'] = 'Laporan Barang Masuk';
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('laporan/barang_masuk_pdf', $data, true);
		$mpdf->WriteHTML($html);
		$tgl = date('Ymd_his');
		$namaFile = 'Barang_masuk_' . $tgl . '.pdf';
		$mpdf->Output($namaFile, 'D');
	}

	public function barang_keluar_pdf()
	{
		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');

		if ($tglawal != '' && $tglakhir != '') {
			$data['data'] = $this->BarangKeluar_model->lapdata($tglawal, $tglakhir)->result();
		} else {
			$data['data'] = $this->BarangKeluar_model->dataJoin()->result();
		}

		$data['tglawal'] = $tglawal;
		$data['tglakhir'] = $tglakhir;

		$data['judul'] = 'Laporan Barang Keluar';
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('laporan/barang_keluar_pdf', $data, true);
		$mpdf->WriteHTML($html);
		$tgl = date('Ymd_his');
		$namaFile = 'Barang_keluar_' . $tgl . '.pdf';
		$mpdf->Output($namaFile, 'D');
	}
}
