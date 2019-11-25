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
			$this->db->select('*,TIMESTAMPDIFF(day, now(), batas_campaign) as hsl');
			$this->db->from('campaign');
			$this->db->where('TIMESTAMPDIFF(day, now(), batas_campaign) > 0');

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
			$this->db->select('sum(nominal_donasi) as jml, ');
			$this->db->from('donasi');
			$this->db->where('id_campaign', $where);
			return $this->db->get()->result();
		}

	}
	
	/* End of file modelName.php */
	/* Location: ./application/models/modelName.php */
?>