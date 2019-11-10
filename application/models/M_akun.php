<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akun extends CI_Model {

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function update($field, $val, $table, $data)
	{	
		$this->db->where($field, $val);
		$this->db->update($table, $data);
	}

	public function selectAll($field, $table)
	{
		$this->db->select($field);
		$this->db->from($table);
		$result = $this->db->get();

		return $result->result();
	}

	public function selectWhere($field, $table, $field_comp, $val)
	{
		$this->db->select($field);
		$this->db->from($table);
		$this->db->where($field_comp, $val);
		$result = $this->db->get();

		return $result->result();
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
?>