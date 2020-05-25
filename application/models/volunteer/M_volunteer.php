<?php 

 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class M_volunteer extends CI_Model {

 	public function insert($table, $data)
 	{
 		$this->db->insert($table, $data);
 	}

 	public function update($field, $val, $table, $data)
 	{
 		$this->db->where($field, $val);
		$this->db->update($table, $data);

	}
	 
	public function selCampaign()
	{
		$this->db->select('*');
 		$this->db->from('campaign');

 		return $this->db->get()->result();
	}
 
 	public function selCampaignByIdAll($where)
 	{
 		$this->db->select('*');
 		$this->db->from('campaign');
 		$this->db->where('id_campaign', $where);

 		return $this->db->get()->result();
 	}
 	
 	public function selCampaignById($where)
 	{
		 $this->db->select("*, TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'hariBerjalan', 
		 					TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'SisaHari',
		 					(DAY(batas_campaign) - DAY(tanggal_campaign)) AS 'DurasiCampaign', 
							ROUND((TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign)) / TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign)*100, 2) AS 'Presentase'");
 		$this->db->from('campaign');
		$this->db->where('id_campaign', $where);

 		return $this->db->get()->result();	
	 }
	 
	 public function selCampaignByLap($where)
 	{
		 $this->db->select("*");
 		$this->db->from('campaign');
		$this->db->where('id_campaign', $where);

 		return $this->db->get()->result();	
 	}
	 
	public function selCampaignBerjalanById($where)
 	{
		$this->db->select("*, flag, TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'hariBerjalan',
		 					TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'SisaHari', 
		 					(DAY(batas_campaign) - DAY(tanggal_campaign)) AS 'DurasiCampaign', 
		 					ROUND((TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign)) / TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign)*100, 2) AS 'Presentase'");
		$this->db->from('campaign');
		$this->db->where('TIMESTAMPDIFF(DAY, NOW(), batas_campaign) >= 0');
		$this->db->where('ROUND((TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign)) / TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign)*100, 2) < 100');
		$this->db->where('id_volunteer', $where);
		$this->db->order_by('id_campaign', 'desc');

		return $this->db->get()->result();	
 	}
	
	public function selCampaignSelesaiAll($where){ 
		$this->db->select("*, flag, TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'hariBerjalan',
							TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'SisaHari', 
							(DAY(batas_campaign) - DAY(tanggal_campaign)) AS 'DurasiCampaign', 
							ROUND((TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign)) / TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign)*100, 2) AS 'Presentase'");
		$this->db->from('campaign');
		$this->db->where('id_volunteer', $where);
		$this->db->where('TIMESTAMPDIFF(DAY, NOW(), batas_campaign) < 0');
		$this->db->where('flag = 2');
		
		return $this->db->get()->result();
	}

 	public function selCampaignSelesai($where)
 	{
		$this->db->select("*, TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'hariBerjalan', 
							TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'SisaHari', 
							(DAY(batas_campaign) - DAY(tanggal_campaign)) AS 'DurasiCampaign', 
							ROUND((TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign)) / TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign)*100, 2) AS 'Presentase'");
		$this->db->from('campaign');
		$this->db->where('TIMESTAMPDIFF(DAY, NOW(), batas_campaign) < 0');
		$this->db->where('id_volunteer', $where);


 		return $this->db->get()->result();
	 }
	 
	public function selCampaignSelesaiByPaket($where)
 	{
		$this->db->select("id_campaign, judul_campaign, kategori_campaign");
		$this->db->from('campaign');
		$this->db->where('id_volunteer', $where);
		$this->db->where('flag = 1');

 		return $this->db->get()->result();
 	}

 	public function selectLastCamp()
 	{
 		$this->db->select('*');
 		$this->db->from('campaign');
 		$this->db->order_by('id_campaign', 'desc');

 		return $this->db->get()->result();
	}

	public function selWhereJoin($where, $where2)
 	{
 		$this->db->select('*');
 		$this->db->from('campaign');
 		$this->db->join('barang', 'campaign.id_campaign = barang.id_campaign');
 		$this->db->where('id_volunteer', $where);
 		$this->db->where('campaign.id_campaign', $where2);

 		return $this->db->get()->result();
	 }

	public function searchCampaign($where, $val)
	{
		$this->db->select("*, TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'SisaHari',
		 					TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'hariBerjalan', 
		 					(DAY(batas_campaign) - DAY(tanggal_campaign)) AS 'DurasiCampaign', 
		 					ROUND(TIMESTAMPDIFF(DAY, NOW(), batas_campaign) / TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign)*100, 2) AS 'Presentase'");
		$this->db->from('campaign');
		$this->db->where('id_volunteer', $where);
		$this->db->like('judul_campaign', $val);
		$this->db->order_by('id_campaign', 'desc');

		return $this->db->get();	
	}

	public function notifCampaign($where){
		$this->db->select("*, TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'sisaHari'");
		$this->db->from('campaign');
		$this->db->where('TIMESTAMPDIFF(DAY, NOW(), batas_campaign) <= 7');
		$this->db->where('id_volunteer', $where);

		return $this->db->get();
	}

	public function notifBarangDonasi($where){
		$this->db->select("nama_barang, jumlah_barang, satuan_barang");
		$this->db->from('campaign');
		$this->db->join('barang', 'campaign.id_campaign = barang.id_campaign');
		$this->db->where('id_volunteer', $where);

		return $this->db->get();
	}

	public function allCampaign($where){
		$this->db->select("*, TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign) - TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'SisaHari',
		TIMESTAMPDIFF(DAY, NOW(), batas_campaign) AS 'hariBerjalan', 
		(DAY(batas_campaign) - DAY(tanggal_campaign)) AS 'DurasiCampaign', 
		ROUND(TIMESTAMPDIFF(DAY, NOW(), batas_campaign) / TIMESTAMPDIFF(DAY, tanggal_campaign, batas_campaign)*100, 2) AS 'Presentase'");
		$this->db->from('campaign');
		$this->db->where('id_volunteer', $where);

		return $this->db->get();
	}

	// query untuk barang

	public function selBarangDibutuhkan($where)
 	{
 		$this->db->select('*');
 		$this->db->from('barang_dibutuhkan');
 		$this->db->where('id_campaign', $where);

 		return $this->db->get()->result();	
 	}

 	public function selBarangById($where)
 	{
 		$this->db->select('*');
 		$this->db->from('barang');
 		$this->db->where('id_barang', $where);

 		return $this->db->get()->result();
	 }
	 
	public function selBarangDiterima($where)
    {
        $this->db->select('*');
        $this->db->from('barang');
		$this->db->where('id_campaign', $where);
			
        return $this->db->get()->result();
	}
	
	public function totalBarangDiterimaByKategori($where)
	{
		$this->db->select('kategori_barang, SUM(jumlah_barang) AS Total');
        $this->db->from('barang');
		$this->db->where('id_campaign', $where);
		$this->db->group_by('kategori_barang');

        return $this->db->get()->result();
	}

	// query untuk paket
	
	public function selWhereJoinPaket($where)
 	{
 		$this->db->select('*');
 		$this->db->from('campaign');
 		$this->db->join('paket', 'campaign.id_campaign = paket.id_campaign');
 		$this->db->where('paket.id_campaign', $where);

 		return $this->db->get()->result();
 	}

 	public function selDetailPaket($where)
 	{
 		$this->db->select("*, (jumlah_barang - jumlah_barang_rusak) AS 'barangDiterima'");
 		$this->db->from('barang');
 		$this->db->where('id_paket', $where);

 		return $this->db->get()->result();
 	}

 }

 
 /* End of file modelName.php */
 /* Location: ./application/models/modelName.php */ ?>