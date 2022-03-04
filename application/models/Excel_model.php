<?php defined('BASEPATH') or exit('No direct script access allowed');
class Excel_model extends CI_Model
{


	function data()
	{
		$this->db->order_by('id', 'DESC');
		return $query = $this->db->get('kas');
	}
    public function hapus_excel($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kas');
	}
}