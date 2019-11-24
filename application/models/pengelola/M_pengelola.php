<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengelola extends CI_Model {

	public function selectLimit($table, $number, $offset)
	{
		return $query = $this->db->get($table,$number,$offset)->result();
	}

	public function search($field, $field2, $Value, $table)
	{
		$this->db->like($field, $Value, 'BOTH');
		$this->db->or_like($field2, $Value, 'BOTH');
		return $this->db->get($table)->result();
	}	
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */ ?>