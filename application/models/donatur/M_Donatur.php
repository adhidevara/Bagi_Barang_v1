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

		function viewCampaign()
		{
			// $this->db->select('*,TIMESTAMPDIFF(day, now(), batas_campaign) as hsl');
			// $this->db->from('campaign');
			// $this->db->where('TIMESTAMPDIFF(day, now(), batas_campaign) > 0');

			$this->db->select("*, 
				timestampdiff(day, tanggal_campaign, batas_campaign) as 'awal', 
				timestampdiff(day, tanggal_campaign,batas_campaign) - timestampdiff(day,tanggal_campaign, now()) as 'sisa', 
				round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) as 'hsl'");
			$this->db->from('campaign');
			$this->db->where('round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) >= 0');

			return $this->db->get()->result();
		}

		function viewCampaignCari($where)
		{
			$this->db->select("*, 
				timestampdiff(day, tanggal_campaign, batas_campaign) as 'awal', 
				timestampdiff(day, tanggal_campaign,batas_campaign) - timestampdiff(day,tanggal_campaign, now()) as 'sisa', 
				round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) as 'hsl'");
			$this->db->from('campaign');
			$this->db->where('round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) >= 0');
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
			$this->db->from('campaign');
			$this->db->where('kategori_campaign', $kategori);
			$this->db->limit(1);

			return $this->db->get()->result();
		}

		function viewCampaignByKategori2($kategori)
		{
			$this->db->select("*, 
				timestampdiff(day, tanggal_campaign, batas_campaign) as 'awal', 
				timestampdiff(day, tanggal_campaign,batas_campaign) - timestampdiff(day,tanggal_campaign, now()) as 'sisa', 
				round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) as 'hsl'");
			$this->db->from('campaign');
			$this->db->where('round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) >= 0');
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

		function progressCampaign($where)
		{
			$this->db->select('round(timestampdiff(day,tanggal_campaign, now()) / timestampdiff(day, tanggal_campaign,batas_campaign) * 100, 2) as jml');
			$this->db->from('campaign');
			$this->db->where('id_campaign', $where);
			return $this->db->get()->result();
		}

		function tampilDonasi($id)
		{
			$this->db->select('*');
			$this->db->from('barang');
			$this->db->where('id_donatur', $id);
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
			$this->db->from('barang');
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

	}
	
	/* End of file modelName.php */
	/* Location: ./application/models/modelName.php */
?>