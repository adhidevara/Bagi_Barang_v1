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

	public function selectWherePaket0()
	{
		$this->db->select("*");
		$this->db->from("paket");
		$this->db->where("status",0);
		$result = $this->db->get();

		return $result->result();
	}

	public function selectWherePaket1()
	{
		$this->db->select("*");
		$this->db->from("paket");
		$this->db->where("status",1);
		$result = $this->db->get();

		return $result->result();
	}

	public function selectCampPkt()
	{
		$this->db->select('*');
		$this->db->from('campaign');

		return $this->db->get()->result();
	}

	public function selectBarangPaket($id_campaign, $jenis_barang)
	{
		$this->db->select('*');
		$this->db->from('barang b');
		$this->db->where('b.id_campaign', $id_campaign);
		$this->db->where('b.kategori_barang', $jenis_barang);
		$this->db->where('id_paket IS NULL');
		$this->db->where('status', 'Di Terima (Warehouse)');

		return $this->db->get()->result();
	}

	public function isiPaket($id_campaign, $jenis_barang)
	{
		$this->db->select('*');
		$this->db->from('barang b');
		$this->db->join('paket p', 'b.id_paket = p.id_paket');
		$this->db->where('b.id_campaign', $id_campaign);
		$this->db->where('b.kategori_barang', $jenis_barang);

		return $this->db->get()->result();
	}

	public function lap_unacc()
	{
		$this->db->select('*');
		$this->db->from('laporan_donasi');
		$this->db->where('tanggal_diacc IS NULL');

		return $this->db->get()->result();
	}

	public function lap_acc()
	{
		$this->db->select('*');
		$this->db->from('laporan_donasi');
		$this->db->where('tanggal_diacc IS NOT NULL');

		return $this->db->get()->result();
	}
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */ ?>