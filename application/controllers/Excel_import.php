<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// $this->load->library('form_validation');
		// $this->load->helper('url');
		$this->load->model('Excel_model');
	}
	public function index()
	{
        $data['title'] = 'Excel';
		$data['excel'] = $this->Excel_model->data()->result();
		$data['num_rows'] = $this->db->get('kas')->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('excel_import/index', $data);
		$this->load->view('templates/footer');
	}
	public function hapus_excel($id)
	{
		// $this->Excel->hapusExcel($id);
		// redirect('index.php/excel-import');
		$data['title'] = 'Excel';
		$data['excel'] = $this->Excel_model->data()->result();
		// $this->Excel->hapusExcel($id);

		$data['num_rows'] = $this->db->get('kas')->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('excel_import', $data);
		$this->load->view('templates/footer');
	}
	public function import_data() {
		$config = array(
			'upload_path'   => FCPATH.'upload/',
			'allowed_types' => 'xls|csv'
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			$this->load->library('Spreadsheet_Excel_Reader');
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_reader->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(0);

			$data_excel = array();
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;

				$data_excel[$i - 1]['kd_rek']    = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['keterangan']   = $sheets['cells'][$i][2];
				$data_excel[$i - 1]['tgl'] = $sheets['cells'][$i][3];

				$data_excel[$i - 1]['debet'] = $sheets['cells'][$i][4];
				$data_excel[$i - 1]['kredit'] = $sheets['cells'][$i][5];
				$data_excel[$i - 1]['created'] = $sheets['cells'][$i][6];
				$data_excel[$i - 1]['id_user'] = $sheets['cells'][$i][7];

			}

			$this->db->insert_batch('kas', $data_excel);
			// @unlink($data['full_path']);
			redirect('excel_import');
		}
	}

}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */

