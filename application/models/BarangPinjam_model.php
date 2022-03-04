<?php defined('BASEPATH') or exit('No direct script access allowed');
class BarangPinjam_model extends CI_Model
{


	function data()
	{
		$this->db->order_by('id_barang_pinjam', 'DESC');
		return $query = $this->db->get('barang_pinjam');
	}

	public function dataJoin()
	{
		$this->db->select('*');
		$this->db->from('barang_pinjam as bp');
		$this->db->join('barang as b', 'b.id_barang = bp.id_barang');
		$this->db->join('vendor as v', 'v.id_vendor = bp.id_vendor');

		$this->db->order_by('bp.id_barang_pinjam', 'DESC');
		return $query = $this->db->get();
	}

	public function dataJoinLike($tahun)
	{
		$this->db->select('*');
		$this->db->from('barang_pinjam as bp');
		$this->db->join('barang as b', 'b.id_barang = bp.id_barang');
		$this->db->join('vendor as v', 'v.id_vendor = bp.id_vendor');

		$this->db->like('bp.tanggal_pinjam', $tahun);
		$this->db->order_by('bp.id_barang_pinjam', 'DESC');
		return $query = $this->db->get();
	}

	public function transaksiTerakhir()
	{
		$this->db->select('*');
		$this->db->from('barang_pinjam as bp');
		$this->db->join('barang as b', 'b.id_barang = bp.id_barang');
		$this->db->join('vendor as v', 'v.id_vendor = bp.id_vendor');

		$this->db->order_by('bp.id_barang_pinjam', 'DESC');
		$this->db->limit(5);
		return $query = $this->db->get();
	}

	function lapdata($tglAwal, $tglAkhir)
	{
		$this->db->select('*');
		$this->db->from('barang_pinjam as bp');
		$this->db->join('barang as b', 'b.id_barang = bp.id_barang');
		$this->db->join('vendor as v', 'v.id_vendor = bp.id_vendor');

		$this->db->where('bp.tanggal_pinjam >=', $tglAwal);
		$this->db->where('bp.tanggal_pinjam <=', $tglAkhir);
		return $query = $this->db->get();
	}

	function jmlperbulan($tglAwal, $tglAkhir)
	{
		$this->db->select('*');
		$this->db->from('barang_pinjam as bp');
		$this->db->join('barang as b', 'b.id_barang = bp.id_barang');
		$this->db->join('vendor as v', 'v.id_vendor = bp.id_vendor');

		$this->db->where('bp.tanggal_pinjam >=', $tglAwal);
		$this->db->where('bp.tanggal_pinjam <=', $tglAkhir);
		return $query = $this->db->get();
	}


	public function detailJoin($where)
	{
		$this->db->select('*');
		$this->db->from('barang_pinjam as bp');
		$this->db->join('barang as b', 'b.id_barang = bp.id_barang');
		$this->db->join('vendor as v', 'v.id_vendor = bp.id_vendor');
		$this->db->where('bp.id_barang_pinjam', $where);
		$this->db->order_by('bp.id_barang_pinjam', 'DESC');
		return $query = $this->db->get();
	}


	public function ambilId($table, $where)
	{
		return $this->db->get_where($table, $where);
	}



	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		}
		return false;
	}


	public function detail_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function tambah_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function ubah_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}


	public function buat_kode()
	{
		$this->db->select('RIGHT(barang_pinjam.id_barang_pinjam,4) as kode', FALSE);
		$this->db->order_by('id_barang_pinjam', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('barang_pinjam');      //cek dulu apakah ada sudah ada kode di tabel.
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "BRG-P-" . $kodemax;    // hasilnya 
		return $kodejadi;
	}
}
