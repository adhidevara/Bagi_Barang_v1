<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penerima extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 3) {
			$this->load->model('M_akun');
			$this->load->model('volunteer/M_volunteer');
			$this->getData['notifData'] = $this->M_volunteer->notifCampaign($this->session->userdata('id_volunteer'))->result();
			$this->getData['notifDataBarang'] = $this->M_volunteer->notifBarangDonasi($this->session->userdata('id_volunteer'))->result();
			$hitHari = $this->getData['countNotif'] = $this->M_volunteer->notifCampaign($this->session->userdata('id_volunteer'))->num_rows();
			$hitBarang = $this->getData['countNotifBarang'] = $this->M_volunteer->notifBarangDonasi($this->session->userdata('id_volunteer'))->num_rows();
			$this->getData['totalNotif'] = $hitBarang + $hitHari;
		}else{
			redirect('MY_Controller/pages_404','refresh');
		}
	}

	public function index()
	{
		$getData = $this->getData; 
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
		$getData = $this->getData; 
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		$this->load->view('dash_volunteer/profile', $getData);
	}

	public function ubahBiodata(){
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
				'nama' => $form['nama'],
				'email' => $form['email'],
				'no_ktp' => $form['noKtp'],
				'jenis_kelamin' => $form['gender'],
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
				'jenis_kelamin' => $form['gender'],
				'alamat' => $form['alamat'],
				'foto' => 'uploads/fotoProfil/ft_v/'.$dataFoto['file_name'],
				'no_tlp' => $form['noTlp']
			);
			$this->session->set_userdata($session_data);

			redirect('penerima/C_penerima/index','refresh');
		}
	}


	public function ubahPassword(){
		$form = $this->input->post();
		
		$oldPasswordDB = $this->encryption->decrypt($this->session->userdata('password'));

		if($oldPasswordDB == $form['OldPassword']){
			if($form['NewPassword'] == $form['NewPasswordConfirm']){
				$data = array(
					'password' => $this->encryption->encrypt($form['NewPassword'])
				);
	
				$this->M_akun->update('id_volunteer', $this->session->userdata('id_volunteer'), 'volunteer', $data);
	
				$session_data = array(
					'password' => $this->session->userdata('password')
				);
				$this->session->set_userdata($session_data);
	
				redirect('penerima/C_penerima/index','refresh');
			}else{
				echo "
				<script>
					alert('Password Tidak Sama! ')
				</script>";
			}
		}else{
			echo "
				<script>
					alert('Password Tidak Sama dengan Data Base! ')
				</script>";
		}
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
				'jenis_kelamin' => $form['gender'],
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
				'jenis_kelamin' => $form['gender'],
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
		$getData = $this->getData; 
		$id_volunteer = $this->session->userdata('id_volunteer');
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		
		$id = substr($id_volunteer, 10, 4);
		$id_campaign = $this->M_akun->gen_id('campaign', 'id_campaign', 'CMPG-'.$id.'-');
		$getData['data2'] = $this->M_volunteer->selBarangDibutuhkan($id_campaign);
		$getData['katCamp'] = $this->M_akun->selectAll("*", "kategori_campaign");
		$getData['katBrg'] = $this->M_akun->selectAll("*", "kategori_barang");

		$this->load->view('dash_volunteer/buatCampaign', $getData);
	}

	public function proBuatCampaign()
	{
		
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id = substr($id_volunteer, 10, 4);

		$form = $this->input->post();
		$id_campaign = $this->M_akun->gen_id('campaign', 'id_campaign', 'CMPG-'.$id.'-');
		$id_wallet = $this->M_akun->gen_id('wallet', 'id_wallet', 'WALL-'.$id.'-');
		
		$data = array('id_campaign' => $id_campaign,
					  'id_volunteer' => $this->session->userdata('id_volunteer'),
					  'judul_campaign' => $form['judulCampaign'],
					  'alamat_campaign' => $form['alamatCampaign'],
					  'kategori_campaign' => $form['kategoriCampaign'],
					  'batas_campaign' => $form['batasCampaign'],
					  'deskripsi_campaign' => $form['deskripsiCampaign'],
					  'ajakan_campaign' => $form['ajakanCampaign'],
					  'keterangan' => $form['keteranganCampaign'],
		 );

		$dataWallet = array('id_wallet' => $id_wallet,
							 'id_campaign' => $id_campaign,
							 'private_key' => $form['privateKey'],
							 'public_key' => $form['publicKey'],
							 'address' => $form['address']
		);

		$this->M_volunteer->insert('campaign', $data);
		$this->M_volunteer->insert('wallet', $dataWallet);
		echo json_encode($data);
	}

	public function VuploadGambarCampaign()
	{
		$getData = $this->getData; 
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		$this->load->view('dash_volunteer/uploadGambarCampaign', $getData);
	}

	public function VdetailCampaign()
	{
		$getData = $this->getData; 
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
		$getData = $this->getData; 
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id_campaign = $this->input->get('id_campaign');

		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
        $getData['data2'] = $this->M_volunteer->selCampaignSelesaiAll($id_volunteer);
		
		$this->load->view('dash_volunteer/campaignSelesai', $getData);
	}

	public function VaccPaket()
	{
		$getData = $this->getData; 
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id_campaign = $this->input->get('id_campaign');

		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		$getData['data2'] = $this->M_volunteer->selCampaignSelesai($id_volunteer);


		$this->load->view('dash_volunteer/accPaket', $getData);
	}

	public function VdetailAccPaket()
	{
		$getData = $this->getData; 
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

	public function VdetailPaket()
	{
		$getData = $this->getData; 
		
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id_campaign = $this->input->get('id_campaign');
		$id_paket = $this->input->get('id_paket');
		
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer',$id_volunteer);
		$getData['data2'] = $this->M_volunteer->selDetailPaket($id_paket);
		$getData['id_campaign'] = $id_campaign;

		$this->load->view('dash_volunteer/detailPaket', $getData);
	}

	public function VbuatLaporan()
	{
		$getData = $this->getData; 
		$id_volunteer = $this->session->userdata('id_volunteer');
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
		$getData['data2'] = $this->M_volunteer->selCampaignSelesaiByPaket($id_volunteer);

		$this->load->view('dash_volunteer/buatLaporan', $getData);
	}

	public function VtambahBukti()
	{
		$getData = $this->getData; 
		$id_volunteer = $this->session->userdata('id_volunteer');
		$getData['id_campaign'] = $this->input->post('id_campaign');
		
		$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $id_volunteer);
		$getData['data2'] = $this->M_volunteer->selCampaignByLap($getData['id_campaign']);


		 $this->load->view('dash_volunteer/tambahBuktiLaporan', $getData);
	}

	public function proBuatLaporan()
	{
		$form = $this->input->post();
		$id_laporan = $this->M_akun->gen_id('penerimaan_barang', 'id_laporan', 'RPRT-0001-');
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

					$this->M_volunteer->insert('penerimaan_barang', $data);
					$this->M_volunteer->insert('penerima_donasi', $data2);
					$this->M_volunteer->update('id_campaign', $id_campaign, 'campaign', $data3);

					redirect('penerima/C_penerima/VbuatLaporan');
				}
			}
	} else {
		echo "
			<script>
				alert('Data Tidak Lengkap! ')
			</script>";
		redirect('penerima/C_penerima/VbuatLaporan', 'refresh');
	}
		
	}

	public function proTambahBarang()
	{
		$form = $this->input->post();

		echo json_encode($form);
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id = substr($id_volunteer, 10, 4);
		$id_campaign = $this->M_akun->gen_id('campaign', 'id_campaign', 'CMPG-'.$id.'-');
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
		$id_volunteer = $this->session->userdata('id_volunteer');
		$id = substr($id_volunteer, 10, 4);
		$id_campaign = $this->M_akun->gen_id('campaign', 'id_campaign', 'CMPG-'.$id.'-');
		
		$dataBarang = $this->M_volunteer->selBarangDibutuhkan($id_campaign);

		echo json_encode($dataBarang);
	}	

	public function Vprofile()
	{
		$getData = $this->getData; 
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
		$output = '';
  		$query = '';
  		
  		if($this->input->post('query')){
   			$query = $this->input->post('query');
  		}
		  $data = $this->M_volunteer->searchCampaign($id_volunteer, $query);

		  $data2 = $this->M_volunteer->allCampaign($this->session->userdata('id_volunteer'));
		  $hasil = $data2->result() ;

  		if ($data->num_rows() > 0) { //if data numrows > 0
			foreach($hasil as $dt){
				if ($dt->flag == 2) { // if data flag 2
					$output .= '
					<div class="row clearfix">
						<div class="col-lg-9">
							<div class="card">
								<div class="header bg-red">
									<h3><a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt->id_campaign.'" style="color: black;">'.$dt->judul_campaign.'</a></h3>
								</div>
								<div class="body">
									<a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt->id_campaign.'"><img class="img-responsive" src="'.base_url().$dt->gambar.'" style="width: 100%; height: 250px"></a>
										<p>'.$dt->ajakan_campaign.'</p>
										<span class="comment"><small>Sisa Hari</small></span><br>
										<font style="color: orange; size: 5px">'.$dt->SisaHari.' Hari</font>
										<div class="progress">
											<div class="progress-bar progress-bar-warning progress-bar-striped active bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  style="width: '.$dt->Presentase.'%; background-color: orange">
												<small style="color: white;margin-bottom: 5px;">'.$dt->Presentase.'%&nbsp; Sisa &nbsp; '. $dt->SisaHari.'&nbsp;Hari</small>
											</div>
										</div>
										<p style="text-align: center;">
											<a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt->id_campaign.'" class="btn btn-primary btn-sm">Detail Campaign</a>
										</p>
								</div>
							</div>
							<div class="row"></div>
						</div>
					</div>
				' ;
				} else { //else data flag 0
					$output .= '
					<div class="row clearfix">
						<div class="col-lg-9">
							<div class="card">
								<div class="header bg-red">
									<h3><a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt->id_campaign.'" style="color: black;">'.$dt->judul_campaign.'</a></h3>
								</div>
								<div class="body">
									<a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt->id_campaign.'"><img class="img-responsive" src="'.base_url().$dt->gambar.'" style="width: 100%; height: 250px"></a>
										<p>'.$dt->ajakan_campaign.'</p>
										<span class="comment"><small>Sisa Hari</small></span><br>
										<font style="color: orange; size: 5px">'.$dt->SisaHari.' Hari</font>
										<div class="progress">
											<div class="progress-bar progress-bar-warning progress-bar-striped active bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  style="width: '.$dt->Presentase.'%; background-color: orange">
												<small style="color: white;margin-bottom: 5px;">'.$dt->Presentase.'%&nbsp; Sisa &nbsp; '. $dt->SisaHari.'&nbsp;Hari</small>
											</div>
										</div>
										<p style="text-align: center;">
											<a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt->id_campaign.'" class="btn btn-primary btn-sm">Detail Campaign</a>
										</p>
								</div>
							</div>
							<div class="row"></div>
						</div>
					</div>
				' ;
				}
				
			}
			  
		  } else { //else data numrows <= 0
			  foreach ($hasil as $dt2) {
				  if ($dt2->flag == 2) {// if data flag 2
					$output .= '
					<div class="row clearfix">
						<div class="col-lg-9">
							<div class="card">
								<div class="header bg-red">
									<h3><a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt2->id_campaign.'" style="color: black;">'.$dt2->judul_campaign.'</a></h3>
								</div>
								<div class="body">
									<a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt2->id_campaign.'"><img class="img-responsive" src="'.base_url().$dt2->gambar.'" style="widt2h: 100%; height: 250px"></a>
										<p>'.$dt2->ajakan_campaign.'</p>
										<span class="comment"><small>Sisa Hari</small></span><br>
										<font style="color: orange; size: 5px">'.$dt2->SisaHari.' Hari</font>
										<div class="progress">
											<div class="progress-bar progress-bar-warning progress-bar-striped active bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  style="widt2h: '.$dt2->Presentase.'%; background-color: orange">
												<small style="color: white;margin-bottom: 5px;">'.$dt2->Presentase.'%&nbsp; Sisa &nbsp; '. $dt2->SisaHari.'&nbsp;Hari</small>
											</div>
										</div>
										<p style="text-align: center;">
											<a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt2->id_campaign.'" class="btn btn-primary btn-sm">Detail Campaign</a>
										</p>
								</div>
							</div>
							<div class="row"></div>
						</div>
					</div>
				' ;
				  } else { //else data flag 0
					$output .= '
					<div class="row clearfix">
						<div class="col-lg-9">
							<div class="card">
								<div class="header bg-red">
									<h3><a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt2->id_campaign.'" style="color: black;">'.$dt2->judul_campaign.'</a></h3>
								</div>
								<div class="body">
									<a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt2->id_campaign.'"><img class="img-responsive" src="'.base_url().$dt2->gambar.'" style="widt2h: 100%; height: 250px"></a>
										<p>'.$dt2->ajakan_campaign.'</p>
										<span class="comment"><small>Sisa Hari</small></span><br>
										<font style="color: orange; size: 5px">'.$dt2->SisaHari.' Hari</font>
										<div class="progress">
											<div class="progress-bar progress-bar-warning progress-bar-striped active bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  style="widt2h: '.$dt2->Presentase.'%; background-color: orange">
												<small style="color: white;margin-bottom: 5px;">'.$dt2->Presentase.'%&nbsp; Sisa &nbsp; '. $dt2->SisaHari.'&nbsp;Hari</small>
											</div>
										</div>
										<p style="text-align: center;">
											<a href="'.base_url().'penerima/C_penerima/VdetailCampaign?id_campaign='.$dt2->id_campaign.'" class="btn btn-primary btn-sm">Detail Campaign</a>
										</p>
								</div>
							</div>
							<div class="row"></div>
						</div>
					</div>
				' ;
				  }
				  
			  }
		  }
		  
  		echo $output;
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ ?>
