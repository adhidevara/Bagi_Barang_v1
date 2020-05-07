<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penerima extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 3) {
			$this->load->model('M_akun');
			$this->load->model('volunteer/M_volunteer');
		}else{
			redirect('MY_Controller/pages_404','refresh');
		}
	}

	public function index()
	{
		if ($this->session->userdata('status') == 1) {
			$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
			
			$this->load->view('dash_volunteer/profile', $getData);
		}
		else {
			$id_volunteer = $this->session->userdata('id_volunteer');
			$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $id_volunteer);
			$getData['data2'] = $this->M_volunteer->selCampaignBerjalanById($this->session->userdata('id_volunteer'));

			$this->load->view('dash_volunteer/dashboard', $getData);
		}
	}

	public function v_Profile()
	{
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		$this->load->view('dash_volunteer/profile', $getData);
	}

	public function prosesIsiData()
	{
		$form = $this->input->post();

		$config['upload_path'] = './uploads/fotoProfil/ft_v';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = "ft_v-".$this->session->userdata('id_volunteer')."-".$this->session->userdata('nama');
		$config['max_size']  = '10000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
			
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
			
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			echo "<pre>";
			print_r ($error);
			echo "</pre>";
		}
		else{
			$dataFoto = $this->upload->data();

			$data = array(
				'no_ktp' => $form['noKtp'],
				'jenis_kelamin' => $form['jenis_kelamin'],
				'alamat' => $form['alamat'],
				'foto' => 'uploads/fotoProfil/ft_v/'.$dataFoto['file_name'],
				'no_tlp' => $form['noTlp'],
			);
			$this->M_akun->update('id_volunteer', $this->session->userdata('id_volunteer'), 'volunteer', $data);
			$session_data = array(
				'role_id' => $this->session->userdata('role_id'),
				'id_volunteer' => $this->session->userdata('id_volunteer'),
				'email' => $this->session->userdata('email'),
				'nama' => $this->session->userdata('nama'),
				'no_ktp' => $form['noKtp'],
				'password' => $this->session->userdata('password'),
				'jenis_kelamin' => $form['jenis_kelamin'],
				'alamat' => $form['alamat'],
				'foto' => 'uploads/fotoProfil/ft_v/'.$dataFoto['file_name'],
				'no_tlp' => $form['noTlp'],
				'status' => $this->session->userdata('status')
			);
			$this->session->set_userdata($session_data);

			redirect('penerima/C_penerima/index','refresh');
		}
	}

	public function VbuatCampaign()
	{
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));

		$id_campaign = $this->M_akun->gen_id('campaign', 'id_campaign', 'CMPG-0001-');
		$getData['data2'] = $this->M_volunteer->selBarangDibutuhkan($id_campaign);

		$this->load->view('dash_volunteer/buatCampaign', $getData);
	}

	public function proBuatCampaign()
	{
		$form = $this->input->post();
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id = substr($id_volunteer, 10, 4);
		$id_campaign = $this->M_akun->gen_id('campaign', 'id_campaign', 'CMPG-'.$id.'-');
		$data = array('id_campaign' => $id_campaign,
					  'id_volunteer' => $this->session->userdata('id_volunteer'),
					  'judul_campaign' => $form['judulCampaign'],
					  'kategori_campaign' => $form['kategoriCampaign'],
					  'batas_campaign' => $form['batasCampaign'],
					  'deskripsi_campaign' => $form['deskripsiCampaign'],
					  'ajakan_campaign' => $form['ajakanCampaign'],
					  'keterangan' => $form['keteranganCampaign'],
		 );

		$this->M_volunteer->insert('campaign', $data);
		echo json_encode($data);
	}

	public function VuploadGambarCampaign()
	{
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		$this->load->view('dash_volunteer/uploadGambarCampaign', $getData);
	}

	public function VdetailCampaign()
	{
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id_campaign = $this->input->get('id_campaign');

		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
        $getData['data1'] = $this->M_volunteer->selCampaignByIdAll($id_campaign);
		$getData['data2'] = $this->M_volunteer->selBarangDibutuhkan($id_campaign);
        $getData['data3'] = $this->M_volunteer->selBarangDiterima($id_campaign);
        $getData['data4'] = $this->M_volunteer->totalBarangDiterimaByKategori($id_campaign);
		
		$this->load->view('dash_volunteer/detailCampaign', $getData);
	}

	public function VcampaignSelesai()
	{
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id_campaign = $this->input->get('id_campaign');

		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
        $getData['data1'] = $this->M_volunteer->selCampaignSelesaiAll($id_volunteer);
		$getData['data2'] = $this->M_volunteer->selBarangDibutuhkan($id_campaign);
        $getData['data3'] = $this->M_volunteer->selBarangDiterima($id_campaign);
        $getData['data4'] = $this->M_volunteer->totalBarangDiterimaByKategori($id_campaign);
		
		$this->load->view('dash_volunteer/campaignSelesai', $getData);
	}

	public function VaccPaket()
	{
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id_campaign = $this->input->get('id_campaign');

		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		$getData['data2'] = $this->M_volunteer->selCampaignSelesai($id_volunteer);


		$this->load->view('dash_volunteer/accPaket', $getData);
	}

	public function VdetailAccPaket()
	{
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id_campaign = $this->input->get('id_campaign');
		$id_paket = $this->input->get('id_paket');
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer',$id_volunteer);
		$getData['data2'] = $this->M_volunteer->selWhereJoinPaket($id_campaign);
		$getData['data3'] = $this->M_volunteer->selDetailPaket($id_paket);
		$getData['id_campaign'] = $id_campaign;

		$this->load->view('dash_volunteer/detailAccPaket', $getData);
	}

	public function proAccPaket()
	{
		$id_paket = $this->input->get('id_paket');
		$id_campaign = $this->input->get('id_campaign');
		$data = array('id_paket' => $id_paket,
					  'tanggal_diterima' => DATE('Y-m-d H:i:s'),
					  'status' => 'Telah diterima oleh Penerima Donasi' 
					);
		$data2 = array('flag' => 1);

		$this->M_volunteer->update('id_paket', $id_paket, 'paket', $data);
		$this->M_volunteer->update('id_campaign', $id_campaign, 'campaign', $data2);

		redirect('penerima/C_penerima/VdetailAccPaket?id_campaign='.$id_campaign,'refresh');
	}

	public function VbuatLaporan()
	{
		$id_volunteer = $this->session->userdata('id_volunteer');
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		$getData['data2'] = $this->M_volunteer->selCampaignSelesaiByPaket($id_volunteer);

		$this->load->view('dash_volunteer/buatLaporan', $getData);
	}

	public function VtambahBukti()
	{
		$id_volunteer = $this->session->userdata('id_volunteer');
		$getData['id_campaign'] = $this->input->post('id_campaign');
		
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $id_volunteer);
		$getData['data2'] = $this->M_volunteer->selCampaignById($getData['id_campaign']);

		$this->load->view('dash_volunteer/tambahBuktiLaporan', $getData);
	}

	public function proBuatLaporan()
	{
		$form = $this->input->post();
		$id_laporan = $this->M_akun->gen_id('laporan_donasi', 'id_laporan', 'RPRT-0001-');
		$id_penerima = $this->M_akun->gen_id('penerima_donasi', 'id_penerima', 'PNRM-0001-');
		$id_campaign = $this->input->post('id_campaign');
		
		$getData['data2'] = $this->M_volunteer->selCampaignById($id_campaign);
		
		$config['upload_path'] = './uploads/fotoLaporan/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = "ft_r-".$id_laporan;
		$config['max_size']  = '10000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		$link =  $this->input->post('link');

		$rx = '~
  				^(?:https?://)?                           
   				(?:www[.])?                              
   				(?:youtube[.]com/watch[?]v=|youtu[.]be/) 
   				([^&]{11})                               
    		  ~x';

	if ($has_match = preg_match($rx, $link, $matches)) {
		if ( ! $this->upload->do_upload('foto')){
				$getData['error'] = $this->upload->display_errors();
				$getData['id_campaign'] = $id_campaign;
				$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
				$getData['data2'] = $this->M_volunteer->selCampaignById($getData['id_campaign']);
				$this->load->view('dash_volunteer/tambahBuktiLaporan', $getData);
			}
			else{
				$dataFot = $this->upload->data();
	
				$config1['upload_path'] = './uploads/dokReport/';
				$config1['allowed_types'] = 'xlsx|docx|doc|xls|pdf';
				$config1['file_name'] = "doc_r-".$id_laporan;
				$config1['max_size']  = '10000';
	
				$this->load->library('upload', $config1);
				$this->upload->initialize($config1);
	
				if ( ! $this->upload->do_upload('dokumen')){
					$getData['error'] = $this->upload->display_errors();
					$getData['id_campaign'] = $id_campaign;
					$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
					$getData['data2'] = $this->M_volunteer->selCampaignById($getData['id_campaign']);
					$this->load->view('dash_volunteer/tambahBuktiLaporan', $getData);
				}
				else {
					$dataDok = $this->upload->data();
	
					$data = array(
						'id_laporan' => $id_laporan,
						'id_campaign' => $id_campaign,
						'link_video' => $form['link'],
						'foto' => 'uploads/fotoLaporan/'.$dataFot['file_name'],
						'dokumen' => 'uploads/dokReport/'.$dataDok['file_name'],
						'status' => 'Pending'
					);

					$data2 = array(
						'id_penerima' => $id_penerima,
						'nama_penerima' => $form['namaPenerima'],
						'no_ktp' => $form['noKTP'],
						'alamat' => $form['alamat']
					);

					$data3 = array('flag' => 2);

					$this->M_volunteer->insert('laporan_donasi', $data);
					$this->M_volunteer->insert('penerima_donasi', $data2);
					$this->M_volunteer->update('id_campaign', $id_campaign, 'campaign', $data3);

					redirect('penerima/C_penerima/VbuatLaporan');
				}
			}
	} else {
		// $this->load->view('dash_volunteer/error');
	}
		
	}

	public function proTambahBarang()
	{
		$form = $this->input->post();

		echo json_encode($form);

		$id_campaign = $this->M_akun->gen_id('campaign', 'id_campaign', 'CMPG-0001-');
		$id_barang_butuh = $this->M_akun->gen_id('barang_dibutuhkan', 'id_barang_butuh', 'BRNG-BTH1-');

		echo json_encode($id_campaign);
		$data = array('id_barang_butuh' => $id_barang_butuh,
					  'id_campaign' => $id_campaign,
					  'nama_barang' => $form['namaBarang'], 
					  'kategori_barang' => $form['kategoriBarang'],
					  'jumlah' => $form['quantity'],
					  'satuan_barang' => $form['satuan']
					);
		echo json_encode($data);
		$this->M_volunteer->insert('barang_dibutuhkan', $data);
	}

	public function barangDibutuhkanJson()
	{
		$id_campaign = $this->M_akun->gen_id('campaign', 'id_campaign', 'CMPG-0001-');
		
		$dataBarang = $this->M_volunteer->selBarangDibutuhkan($id_campaign);

		echo json_encode($dataBarang);
	}

	

	public function Vprofile()
	{
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		$this->load->view('dash_volunteer/profile', $getData);
	}

	public function uploadGambarCampaign()
	{
		$camp = $this->M_volunteer->selectLastCamp();
		$config['upload_path'] = './uploads/gambarCampaign/';
		$config['allowed_types'] = 'jpeg|jpg|png|JPG|MP4';
		$config['max_size']  = '10000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$config['file_name'] = $camp[0]->id_campaign;
		
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = $this->upload->data();
			$data = array('gambar' => 'uploads/gambarCampaign/'.$data['file_name']);
			$this->M_akun->update('id_campaign', $camp[0]->id_campaign, 'campaign', $data);
		}
	}

	public function proSearchCampaign()
	{
		
		$id_volunteer = $this->session->userdata('id_volunteer');
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $id_volunteer);
		$getData['data2'] = $this->M_volunteer->selCampaignBerjalanById($id_volunteer);

		echo json_encode($getData['data2']);

	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ ?>
