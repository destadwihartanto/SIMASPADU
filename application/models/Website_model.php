<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website_model extends CI_Model
{
	public function getProgramById($id)
	{
		return $this->db->get_where('program', ['id' => $id])->row_array();
	}

	public function editProgram()
	{
		$data = [
			'title' => $this->input->post('title', true),
			'desc' => $this->input->post('desc', true),
			'image' => $this->input->post('image', true)
		];

		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('program', $data);
	}

	public function hapusProgram($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('program');
	}

	public function getKajianById($id)
	{
		return $this->db->get_where('kajian', ['id' => $id])->row_array();
	}

	public function editKajian()
	{
		$data = [
			'title' => $this->input->post('tema', true),
			'desc' => $this->input->post('desc', true),
			'image' => $this->input->post('image', true),
			'waktu' => $this->input->post('waktu', true),
			'tempat' => $this->input->post('tempat', true),
			'pemateri' => $this->input->post('pemateri', true)
		];

		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('kajian', $data);
	}

	public function hapusKajian($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kajian');
	}

	public function getPartnerById($id)
	{

		return $this->db->get_where('partner', ['id' => $id])->row_array();
	}
	public function tampil_data($id)
	{

		return $this->db->get_where('partner', ['id' => $id])->row_array();
	}

	public function editPartner()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'gambar' => $this->input->post('gambar', true)
		];

		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('partner', $data);
	}

	public function hapusPartner($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('partner');
	}

	public function ubahWebsiteInfo()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'website' => $this->input->post('website', true),
			'whatsapp' => $this->input->post('whatsapp', true),
			'email' => $this->input->post('email', true),
			'telepon' => $this->input->post('telepon', true),
			'about' => $this->input->post('about', true)
		];

		$this->db->where('id', 1);
		$this->db->update('masjid', $data);
	}

	public function updateDonate()
	{
		$data = [
			'no_rek' => $this->input->post('no_rek', true),
			'bank' => $this->input->post('bank', true),
			'pemilik_rek' => $this->input->post('pemilik_rek', true)
		];

		$this->db->where('id', 1);
		$this->db->update('donate', $data);
	}

	public function ubahDataMasjid()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'website' => $this->input->post('website', true),
			'email' => $this->input->post('email', true),
			'telepon' => $this->input->post('telepon', true)
		];

		$this->db->where('id', 1);
		$this->db->update('masjid', $data);
	}
}
