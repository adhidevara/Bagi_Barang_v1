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

	// GENERATED ID_AUTO
	public function gen_id($table, $primaryKey, $kodeDepan)   {
		  $this->db->select('RIGHT('.$table.'.'.$primaryKey.',4) as kode', FALSE);
		  $this->db->order_by($primaryKey,'DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get($table);      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = $kodeDepan.$kodemax;    // hasilnya ODJ-9921-0001 dst."EMPL-1018-"
		  return $kodejadi;  
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
?>