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

	public function selectAllPaket()
	{
		$this->db->select("*");
		$this->db->from("paket");
		$result = $this->db->get();

		return $result->result();
	}

	public function selectStatusPaket($id_paket, $kategori_barang, $id_campaign)
	{
		$this->db->select("
					SUM(IF(id_paket IS NOT NULL, '1', '0')) as jml,
					COUNT(id_barang) as cnt, (SUM(IF(id_paket IS NOT NULL, '1', '0'))-COUNT(id_barang)) as res
					");
		$this->db->from("barang");
		$this->db->where("id_paket = '$id_paket' OR id_paket IS NULL");
		$this->db->where("kategori_barang = '$kategori_barang'");
		$this->db->where("id_campaign = '$id_campaign'");

		$result = $this->db->get();

		return $result->result();
	}

	public function selectCampPkt()
	{
		$this->db->select('*');
		$this->db->from('campaign');

		return $this->db->get()->result();
	}

	public function selectKategoriBrg()
	{
		$this->db->select('*');
		$this->db->from('kategori_barang');

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

	public function selectBarangPaketNonactive($id_campaign, $jenis_barang)
	{
		$this->db->select('*');
		$this->db->from('barang b');
		$this->db->where('b.id_campaign', $id_campaign);
		$this->db->where('b.kategori_barang', $jenis_barang);
		$this->db->where('b.id_paket IS NULL');

		return $this->db->get()->result();
	}

	public function isiPaket($id_campaign, $jenis_barang)
	{
		$this->db->select('*, SUM(b.jumlah_barang - b.jumlah_barang_rusak) as total_brg');
		$this->db->from('barang b');
		$this->db->join('paket p', 'b.id_paket = p.id_paket');
		$this->db->where('b.id_campaign', $id_campaign);
		$this->db->where('b.kategori_barang', $jenis_barang);
		$this->db->group_by('b.id_barang');

		return $this->db->get()->result();
	}

	public function lap_unacc()
	{
		$this->db->select('*');
		$this->db->from('penerimaan_barang');
		$this->db->where('tanggal_diacc IS NULL');

		return $this->db->get()->result();
	}

	public function lap_acc()
	{
		$this->db->select('*');
		$this->db->from('penerimaan_barang');
		$this->db->where('tanggal_diacc IS NOT NULL');

		return $this->db->get()->result();
	}

	public function c_barang()
	{
		$this->db->select('SUM(jumlah_barang-jumlah_barang_rusak) as c_barang');
		$this->db->from('barang');

		return $this->db->get()->result();
	}

	public function checkPaket($id_campaign,$kategori_barang)
	{
		$this->db->select('*');
		$this->db->from('paket');
		$this->db->where('id_campaign', $id_campaign);
		$this->db->where('jenis_barang', $kategori_barang);

		return $this->db->get()->result();
	}
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */ ?>
