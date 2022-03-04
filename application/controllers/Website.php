<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Website_model', 'Website');
	}

	public function index()
	{
		$data['title'] = 'Program';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['program'] = $this->db->get('program')->result_array();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('desc', 'Desc', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('website/index', $data);
			$this->load->view('templates/footer');

		} else {
			$file_upload = $_FILES['image']['name'];
			if ($file_upload) {
				$config['upload_path'] = './assets/image/program/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '10024';

				$this->load->library('upload', $config);
				$upload = $this->upload->do_upload('image');
				if ($upload) {
					$file_name = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'desc' => $this->input->post('desc'),
						'image' => $file_name,
					];
					$this->db->insert('program', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
				}
			// 	else {
			// 		echo $this->upload->display_errors();
			// 	}
			// } else {
			// 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed add program!</div>');
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

		}
			redirect('website/index');
		}
	}

	public function editProgram($id)
	{
		$data['title'] = 'Edit Program';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['program'] = $this->Website->getProgramById($id);

		$this->form_validation->set_rules('title', 'Judul', 'required|trim');
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('website/editprogram', $data);
			$this->load->view('templates/footer');
		} else {
			$file_upload = $_FILES['image']['name'];
			$id = $this->input->post('id');
			if ($file_upload) {
				$config['upload_path'] = './assets/image/program/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '50024';

				$this->load->library('upload', $config);
				$upload = $this->upload->do_upload('image');
				if ($upload) {

					$file_name = $this->upload->data('file_name');
					$this->db->set('image', $file_name);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$title = $this->input->post('title');
			$desc = $this->input->post('desc');
			$data = [
				'title' => $title,
				'desc' => $desc
			];
			$this->db->update('program', $data, ['id' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Program telah diubah</div>');
			redirect('website/index');
		}
	}

	public function deleteprogram($id)
	{
		$this->Website->hapusProgram($id);
		// $this->session->set_flashdata('messasge', '<div class="alert alert-success" role="alert">Program telah dihapus</div>');
		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil Dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');

		redirect('website/index');
	}

	public function kajian()
	{
		$data['title'] = 'Kajian';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kajian'] = $this->db->get('kajian')->result_array();

		$this->form_validation->set_rules('tema', 'Tema', 'required');
		$this->form_validation->set_rules('desc', 'Desc', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('pemateri', 'Pemateri', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('website/kajian', $data);
			$this->load->view('templates/footer');
		} else {
			$file_upload = $_FILES['image']['name'];
			if ($file_upload) {
				$config['upload_path'] = './assets/image/kajian/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1024';

				$this->load->library('upload', $config);
				$upload = $this->upload->do_upload('image');
				if ($upload) {
					$file_name = $this->upload->data('file_name');
					$data = [
						'tema' => $this->input->post('tema'),
						'desc' => $this->input->post('desc'),
						'waktu' => $this->input->post('waktu'),
						'tempat' => $this->input->post('tempat'),
						'pemateri' => $this->input->post('pemateri'),
						'image' => $file_name,
					];
					$this->db->insert('kajian', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Kajian added!</div>');
				}
			// 	else {
			// 		echo $this->upload->display_errors();
			// 	}
			// } else {
			// 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed add kajian!</div>');
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
		}
			redirect('website/kajian');
		}
	}
		public function editkajian($id)
	{
		$data['title'] = 'Edit Kajian';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kajian'] = $this->Website->getKajianById($id);

		$this->form_validation->set_rules('tema', 'Tema', 'required|trim');
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required|trim');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required|trim');
		$this->form_validation->set_rules('pemateri', 'Pemateri', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('website/editkajian', $data);
			$this->load->view('templates/footer');
		} else {
			$file_upload = $_FILES['image']['name'];
			$id = $this->input->post('id');
			if ($file_upload) {
				$config['upload_path'] = './assets/image/kajian/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1024';

				$this->load->library('upload', $config);
				$upload = $this->upload->do_upload('image');
				if ($upload) {

					$file_name = $this->upload->data('file_name');
					$this->db->set('image', $file_name);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$tema = $this->input->post('tema');
			$desc = $this->input->post('desc');
			$waktu = $this->input->post('waktu');
			$tempat = $this->input->post('tempat');
			$pemateri = $this->input->post('pemateri');
			$data = [
				'tema' => $tema,
				'desc' => $desc,
				'waktu' => $waktu,
				'tempat' => $tempat,
				'pemateri' => $pemateri
			];
			$this->db->update('kajian', $data, ['id' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">kajian telah diubah</div>');
			redirect('website/kajian');
		}
	}

	public function deletekajian($id)
	{
		$this->Website->hapusKajian($id);
		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil Dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
	redirect('website/kajian');
	}

	public function editwebsiteinfo()
	{
		$data['title'] = 'Website Info';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['masjid'] = $this->db->get('masjid')->row_array();

		$this->form_validation->set_rules('nama', 'Nama Masjid', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('website', 'Website', 'required|trim');
		$this->form_validation->set_rules('whatsapp', 'WhatsApp', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('about', 'About', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('website/editwebsiteinfo', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['upload_path'] = './assets/img/data/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {

					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->Website->ubahWebsiteInfo();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Website has been Changed</div>');
			redirect('website/websiteinfo');
		}
	}
	public function websiteinfo()
	{
		$debet = $this->db->select_sum('debet')->get('kas')->row()->debet;
		$kredit = $this->db->select_sum('kredit')->get('kas')->row()->kredit;
		$total_saldo = $debet - $kredit;
		$title = 'Informasi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$karyawan = $this->db->get('user')->num_rows();
		$masjid = $this->db->get('masjid')->row_array();
		$data = [
			'title' => $title,
			'user' => $user,
			'karyawan' => $karyawan,
			'masjid' => $masjid,
			'debet' => $debet,
			'kredit' => $kredit,
			'total_saldo' => $total_saldo
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('website/websiteinfo', $data);
		$this->load->view('templates/footer', $data);
	}


	public function partner()
	{
		$data['title']='partner';
		$data['partner'] = $this->db->get('partner')->result_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('website/partner', $data);
			$this->load->view('templates/footer');

		} else {
			$file_upload = $_FILES['gambar']['name'];
			if ($file_upload) {
				$config['upload_path'] = './assets/image/partner/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1024';

				$this->load->library('upload', $config);
				$upload = $this->upload->do_upload('gambar');
				if ($upload) {
					$file_name = $this->upload->data('file_name');
					$data = [
						'nama' => $this->input->post('nama'),
						'gambar' => $file_name,
					];
					$this->db->insert('partner', $data);
					// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Partner added!</div>');
				}
				// else {
				// 	echo $this->upload->display_errors();
				// }
			// }
			// else {
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
			}
			redirect('website/partner');
		}
	}

	public function editPartner($id)
	{
		$data['title'] = 'Edit Partner';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['partner'] = $this->Website->getPartnerById($id);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('website/editpartner', $data);
			$this->load->view('templates/footer');
		} else {
			$file_upload = $_FILES['gambar']['name'];
			$id = $this->input->post('id');
			if ($file_upload) {
				$config['upload_path'] = './assets/image/partner/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1024';

				$this->load->library('upload', $config);
				$upload = $this->upload->do_upload('gambar');
				if ($upload) {
					$file_name = $this->upload->data('file_name');
					$this->db->set('gambar', $file_name);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$nama = $this->input->post('nama');
			$data = [
				'nama' => $nama
			];
			$this->db->update('partner', $data, ['id' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Program telah diubah</div>');
			redirect('website/partner');
		}
	}

	public function deletepartner($id)
	{
		$this->Website->hapusPartner($id);
		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil Dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');		redirect('website/partner');
	}

	public function donate()
	{
		$data['title'] = 'Donasi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['donate'] = $this->db->get('donate')->row_array();

		$this->form_validation->set_rules('no_rek', 'No Rekening', 'required|trim');
		$this->form_validation->set_rules('bank', 'Bank', 'required|trim');
		$this->form_validation->set_rules('pemilik_rek', 'Pemilik Rekening', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('website/donate', $data);
			$this->load->view('templates/footer');
		} else {
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['upload_path'] = './assets/img/donasi/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';

				if ($this->upload->do_upload('image')) {

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->Website->updateDonate();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Donate has been Changed</div>');
			redirect('website/donate');
		}
	}
}
