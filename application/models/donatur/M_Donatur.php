<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class M_Donatur extends CI_Model {

		public function insertData($table,$data)
		{
			$this->db->insert($table, $data);
		}

		public function updateData($table,$kolom,$data,$where)
		{
			$this->db->where($kolom, $where);
			$this->db->update($table, $data);
		}

		function viewFormDonasi($id_campaign)
		{
			$this->db->select('*');
			$this->db->from('campaign');
			$this->db->where('id_campaign', $id_campaign);
			return $this->db->get()->result();
		}

		function formKategoriBarang($id_campaign)
		{
			$this->db->select('DISTINCT(nama_kategori_barang) as nama_kategori_barang, id_kategori_barang');
			$this->db->from('barang_dibutuhkan c');
			$this->db->join('kategori_barang k', 'c.kategori_barang = k.id_kategori_barang');
			$this->db->where('id_campaign', $id_campaign);
			return $this->db->get()->result();
		}

		function formNamaBarang($id_campaign)
		{
			$this->db->select('*');
			$this->db->from('barang_dibutuhkan');
			$this->db->where('id_campaign', $id_campaign);
			return $this->db->get()->result();
		}

		function viewCampaign()
		{
			// $this->db->select('*,TIMESTAMPDIFF(day, now(), batas_campaign) as hsl');
			// $this->db->from('campaign');
			// $this->db->where('TIMESTAMPDIFF(day, now(), batas_campaign) > 0');

			$this->db->select("*, 
				timestampdiff(day, tanggal_campaign, batas_campaign) as 'awal', 
				timestampdiff(day, tanggal_campaign,batas_campaign) - timestampdiff(day,tanggal_campaign, now()) as 'sisa', 
				round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) as 'hsl',
				timestampdiff(day,tanggal_campaign, batas_campaign) as 'selisih'");
			$this->db->from('campaign c');
			$this->db->join('kategori_campaign k', 'c.kategori_campaign = k.id_kategori_campaign');
			$this->db->where('round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) <= 100');

			return $this->db->get()->result();
		}

		function viewCampaignCari($where)
		{
			$this->db->select("*, 
				timestampdiff(day, tanggal_campaign, batas_campaign) as 'awal', 
				timestampdiff(day, tanggal_campaign,batas_campaign) - timestampdiff(day,tanggal_campaign, now()) as 'sisa', 
				round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) as 'hsl',
				timestampdiff(day,tanggal_campaign, batas_campaign) as 'selisih'");
			$this->db->from('campaign c');
			$this->db->join('kategori_campaign k', 'c.kategori_campaign = k.id_kategori_campaign');
			$this->db->where('round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) <= 100');
			$this->db->like('judul_campaign',$where);

			return $this->db->get()->result();
		}

		function viewCampaignNew()
		{
			$this->db->select('*');
			$this->db->from('campaign');
			$this->db->limit(1);

			return $this->db->get()->result();
		}

		function viewCampaignByKategori($kategori)
		{
			$this->db->select('*');
			$this->db->from('campaign c');
			$this->db->join('kategori_campaign k', 'c.kategori_campaign = k.id_kategori_campaign');
			$this->db->where('c.kategori_campaign', $kategori);
			$this->db->limit(1);

			return $this->db->get()->result();
		}

		function viewCampaignByKategori2($kategori)
		{
			$this->db->select("*, 
				timestampdiff(day, tanggal_campaign, batas_campaign) as 'awal', 
				timestampdiff(day, tanggal_campaign,batas_campaign) - timestampdiff(day,tanggal_campaign, now()) as 'sisa', 
				round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) as 'hsl',
				timestampdiff(day,tanggal_campaign, batas_campaign) as 'selisih'");
			$this->db->from('campaign c');
			$this->db->join('kategori_campaign k', 'c.kategori_campaign = k.id_kategori_campaign');
			$this->db->where('round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) <= 100');
			$this->db->where('kategori_campaign', $kategori);

			return $this->db->get()->result();
		}

		function viewDetailCampaign($where)
		{
			$this->db->select('*');
			$this->db->from('campaign c');
			$this->db->join('volunteer v', 'c.id_volunteer = v.id_volunteer');
			$this->db->where('c.id_campaign', $where);
			return $this->db->get()->result();
		}

		function progressCampaign($where) //iki progress e sisa hari campaign 
		{
			$this->db->select('round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) as jml');
			$this->db->from('campaign');
			$this->db->where('id_campaign', $where);
			return $this->db->get()->result();
		}

		function tampilDonasi($id)
		{
			$this->db->select('*');
			$this->db->from('barang b');
			$this->db->join('kategori_barang k', 'b.kategori_barang = k.id_kategori_barang');
			$this->db->where('id_donatur', $id);
			$this->db->order_by('id_barang', 'desc');
			return $this->db->get()->result();
		}

		function editPass($where)
		{
			$this->db->select('*');
			$this->db->from('donatur');
			$this->db->where('id_donatur', $where);
			return $this->db->get()->result();
		}

		function tampilDonasiById($id_b,$id_d)
		{
			$this->db->select('*');
			$this->db->from('barang b');
			$this->db->join('kategori_barang k', 'b.kategori_barang = k.id_kategori_barang');
			$this->db->where('id_donatur', $id_d);
			$this->db->where('id_barang', $id_b);
			return $this->db->get()->result();
		}

		function deleteDonasi($id)
		{
			$this->db->where('id_barang', $id);
			$this->db->delete('barang');
		}

		function trackingBarang($where)
		{
			$this->db->select('*');
			$this->db->from('paket');
			$this->db->where('id_campaign', $where);
			return $this->db->get()->result();
		}

		function barangDibutuhkan($id)
		{
			$this->db->select('*');
			$this->db->from('barang_dibutuhkan b');
			$this->db->join('kategori_barang k', 'b.kategori_barang = k.id_kategori_barang');
			$this->db->where('id_campaign', $id);
			return $this->db->get()->result();
		}

		function barangTerkumpul($id)
		{
			$this->db->select('nama_barang, nama_kategori_barang, kategori_barang , SUM(jumlah_barang) as jml, satuan_barang');
			$this->db->from('barang b');
			$this->db->where('id_campaign', $id);
			$this->db->join('kategori_barang k', 'b.kategori_barang = k.id_kategori_barang');
			$this->db->group_by('nama_barang,kategori_barang, satuan_barang');
			// $this->db->order_by('jumlah_barang', 'desc');
			return $this->db->get()->result();
		}

		function laporanDonasi($id)
		{
			$this->db->select('id_laporan, nama_penerima, tanggal_diacc, link_video, dokumen');
			$this->db->from('penerima_donasi pd');
			$this->db->join('paket pk', 'pd.id_penerima=pk.id_penerima_donasi');
			$this->db->join('penerimaan_barang pb', 'pk.id_campaign=pb.id_campaign');
			$this->db->where('pk.id_campaign', $id);
			return $this->db->get()->result();
		}

		function totalBarang($id_campaign)
		{
			$query = $this->db->query("
				SELECT tot.id_barang_butuh as id_barang_butuh, tot.id_campaign as id_campaign, tot.nama_barang as nama_barang, tot.nama_kategori_barang, tot.jumlah - tot.jumlah_barang as jumlah, tot.satuan_barang as satuan_barang
				FROM (SELECT b.id_campaign, b.nama_barang, bd.jumlah, SUM(b.jumlah_barang) as jumlah_barang, bd.id_barang_butuh as id_barang_butuh, kb.nama_kategori_barang as nama_kategori_barang, bd.satuan_barang as satuan_barang                                                     
					  FROM barang b 
					  JOIN barang_dibutuhkan bd ON bd.nama_barang = b.nama_barang
					  JOIN kategori_barang kb ON kb.id_kategori_barang = bd.kategori_barang 
					  GROUP BY b.nama_barang, bd.jumlah, b.id_campaign, bd.id_barang_butuh, kb.nama_kategori_barang, bd.satuan_barang) tot 
				WHERE tot.id_campaign = '".$id_campaign."'
			");

			return $query->result();
		}

	}
	
	/* End of file modelName.php */
	/* Location: ./application/models/modelName.php */
?>
