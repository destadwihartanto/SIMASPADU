<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cashflow_model extends CI_Model
{

    public function getCashflowById($id)
	{
		return $this->db->get_where('kas', ['id' => $id])->row_array();
	}



}