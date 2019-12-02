<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_Bank extends CI_Model {

		function viewTransfer()
		{
			$this->db->select('*');
			$this->db->from('donasi');
			$this->db->where('status', 'pending');
			$this->db->where('metode_pembayaran', 'transfer');
			return $this->db->get()->result();
		}

		function update($where,$kolom,$data,$table)
		{
			$this->db->where($kolom, $where);
			$this->db->update($table, $data);
		}

	}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
?>