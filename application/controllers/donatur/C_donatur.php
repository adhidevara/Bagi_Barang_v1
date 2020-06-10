<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/nem-lib/nem-php.php';

class C_donatur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 2) {
			$this->load->model('donatur/M_Donatur');
			$this->load->model('M_akun');
			$this->load->model('M_nem');
		}else{
			redirect('MY_Controller/pages_404','refresh');
		}
	}

	public function detailCampaign()
	{
		$data['id'] = $this->input->get('id_campaign');
		$data['data'] = $this->M_Donatur->viewDetailCampaign($data['id']);
		$data['data2'] = $this->M_Donatur->barangDibutuhkan($data['id']);
		$data['data3'] = $this->M_Donatur->barangTerkumpul($data['id']);
		$data['dataBC'] = $this->M_akun->selectWhere('*', 'donasi', 'id_campaign', $data['id']);
		$this->load->view('dash_donatur/detailCampaign2',$data);
	}

	public function formDonasi($id_campaign)
	{
		$id['id_campaign'] = $id_campaign;
		$id['data'] = $this->M_Donatur->viewFormDonasi($id_campaign);
		$id['kategori'] = $this->M_Donatur->formkategoriBarang($id_campaign);
		$id['nama'] = $this->M_Donatur->formNamaBarang($id_campaign);
		$id['data2'] = $this->M_Donatur->barangDibutuhkan($id_campaign);
		// $id_campaign['id_campaign'] = $this->input->post('id_campaign');
		$this->load->view('dash_donatur/formDonasi',$id);
	}

	public function prosesFormDonasi($id_campaign)
	{
		$id_barang = $this->M_akun->gen_id('barang','id_barang','BRNG-1701-');
		$form = $this->input->post();

		$data = array(
			'id_barang' => $id_barang,
			'id_donatur' => $this->session->userdata('id_donatur'),
			'id_campaign' => $id_campaign,
			'kategori_barang' => $form['kategori_barang'],
			'nama_barang' => $form['nama_barang'],
			'jumlah_barang' => $form['jumlah_barang'],
			'satuan_barang' => $form['satuan_barang'],
			'catatan_barang' => $form['catatan_barang'],
			'status' => 'Menunggu Pengiriman'
		);
		$this->M_Donatur->insertData('barang', $data);

		//NEM TRANSACTION BEGIN [DONATUR]
		$jumlah_barang = (int) $form['jumlah_barang'];
		//Source to Donatur
		$sendNemSD = $this->sendNem($this->session->userdata('address'));
		$sendMosaicSD = $this->sendMosaic(
			"b0d702aa81007286bf72e3d2416e248e4034a1f3d7681c8cc035cf8b467c8c0c",
			"1fb28e2f003bb1eee8c60eef5f0f766b6f488c3467e4140e4e904201b1a3b9f4",
			$this->session->userdata('address'),
			$id_barang.' '.$form['nama_barang'],
			$jumlah_barang
		);

		//Donatur to Campaign
		$address = $this->M_akun->selectWhere('*', "wallet", 'id_campaign', $id_campaign);
		$sendNem = $this->sendNem($address[0]->address);
		$sendMosaic = $this->sendMosaic(
			$this->session->userdata('privateKey'),
			$this->session->userdata('publicKey'),
			$address[0]->address,
			$id_barang.' '.$form['nama_barang'],
			$jumlah_barang
		);
		$id_donasi = $this->M_akun->gen_id('donasi', 'id_donasi', 'DONATE-0001-');
		$data = array(
			'id_donasi' => $id_donasi,
			'id_campaign' => $id_campaign,
			'id_donatur' => $this->session->userdata('id_donatur'),
			'id_barang' => $id_barang,
			'tanggal_donasi' => date("Y-m-d H:i:s"),
			'message' => $form['nama_barang'],
			'timeStamp' => $sendMosaic['resultPrepare']['timeStamp'],
			'sender' => $this->session->userdata('address'),
			'recipient' => $sendMosaic['resultPrepare']['recipient'],
			'namespaceId' => $sendMosaic['resultPrepare']['mosaics'][0]['mosaicId']['namespaceId'],
			'mosaicName' => $sendMosaic['resultPrepare']['mosaics'][0]['mosaicId']['name'],
			'quantity'=> $sendMosaic['resultPrepare']['mosaics'][0]['quantity'],
			'txHash' => $sendMosaic['resultCommit']['result']['transactionHash']['data']
		);
		$this->M_akun->insert('donasi', $data);
		// END OF NEM TRANSACTION

		//redirect('donatur/C_donatur/prosesFormDonasi2?id_barang='.$id_barang.'&id_campaign='.$id_campaign.'&nama_barang='.$form['nama_barang'].'&jumlah_barang='.$jumlah_barang);
		redirect('donatur/C_donatur/donasiSaya');
	}

	public function prosesFormDonasi2()
	{
		//Donatur to Campaign
		$address = $this->M_akun->selectWhere('*', "wallet", 'id_campaign', $_GET['id_campaign']);
		$sendNem = $this->sendNem($address[0]->address);
		$sendMosaic = $this->sendMosaic(
			$this->session->userdata('privateKey'),
			$this->session->userdata('publicKey'),
			$address[0]->address,
			$_GET['id_barang'].' '.$_GET['nama_barang'],
			$_GET['jumlah_barang']
		);
		$id_donasi = $this->M_akun->gen_id('donasi', 'id_donasi', 'DONATE-0001-');
		$data = array(
			'id_donasi' => $id_donasi,
			'id_campaign' => $_GET['id_campaign'],
			'id_donatur' => $this->session->userdata('id_donatur'),
			'id_barang' => $_GET['id_barang'],
			'tanggal_donasi' => date("Y-m-d H:i:s"),
			'message' => $_GET['nama_barang'],
			'timeStamp' => $sendMosaic['resultPrepare']['timeStamp'],
			'sender' => $this->session->userdata('address'),
			'recipient' => $sendMosaic['resultPrepare']['recipient'],
			'namespaceId' => $sendMosaic['resultPrepare']['mosaics'][0]['mosaicId']['namespaceId'],
			'mosaicName' => $sendMosaic['resultPrepare']['mosaics'][0]['mosaicId']['name'],
			'quantity'=> $sendMosaic['resultPrepare']['mosaics'][0]['quantity'],
			'txHash' => $sendMosaic['resultCommit']['result']['transactionHash']['data']
		);
		$this->M_akun->insert('donasi', $data);
		// END OF NEM TRANSACTION

		redirect('donatur/C_donatur/donasiSaya');
	}


	public function profile()
	{
		$this->load->view('dash_donatur/profile');
	}

	public function editProfile()
	{
		$form = $this->input->post();
		$where = $this->session->userdata('id_donatur');
		$config['upload_path'] = './uploads/fotoProfil/ft_d/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '1000';
		$config['max_width']  = '10000';
		$config['max_height']  = '10000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('foto')){
			$data = array(
				'id_donatur' 	=> $this->session->userdata('id_donatur'),
				'nama' 		 	=> $form['nama'],
				'email' 	 	=> $form['email'],
				'no_tlp' 	 	=> $form['no_tlp'],
				'password' 	 	=> $this->session->userdata('password'),
				'jenis_kelamin' => $form['jekel'],
				'no_ktp' 		=> $form['no_ktp'],
				'alamat' 		=> $form['alamat'],
				'status' 		=> $this->session->userdata('status')
			);

			$this->session->set_userdata($data);
			$this->M_Donatur->updateData('donatur','id_donatur',$data,$where);
			//$error['error'] = $this->upload->display_errors();
			redirect('donatur/C_donatur/profile');
		}
		else{
			$dataFoto = $this->upload->data();
			$data = array(
				'id_donatur' 	=> $this->session->userdata('id_donatur'),
				'nama' 		 	=> $form['nama'],
				'email' 	 	=> $form['email'],
				'no_tlp' 	 	=> $form['no_tlp'],
				'password' 	 	=> $this->session->userdata('password'),
				'jenis_kelamin' => $form['jekel'],
				'no_ktp' 		=> $form['no_ktp'],
				'alamat' 		=> $form['alamat'],
				'status' 		=> $this->session->userdata('status'),
				'foto' 			=> 'uploads/fotoProfil/ft_d/'.$dataFoto['file_name']);

			$this->session->set_userdata($data);
			$this->M_Donatur->updateData('donatur','id_donatur',$data,$where);
			$error['error'] = "Profile Berhasil di Perbarui";
			redirect('donatur/C_donatur/profile',$error);
		}
	}

	public function ubahPassword()
	{
		$id = $this->session->userdata('id_donatur');
		$form = $this->input->post();
		$akun = $this->M_Donatur->editPass($id);

		if ($form['passLama'] == $this->encryption->decrypt($akun[0]->password)) {
			if ($form['passBaru'] == $form['passConfirm']) {
				$data = array(
					'password' => $this->encryption->encrypt($form['passConfirm'])
				);
				$this->M_Donatur->updateData('donatur','id_donatur',$data,$id);
				$data['notif'] = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
								  <script type='text/javascript'>
								  	Swal.fire({
										icon: 'success',
										title: 'Password Berhasil Di Ubah',
									  	text: ' '
									});
								  </script>";
				$this->load->view('dash_donatur/profile',$data);
			}else{
				$data['notif'] = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
								  <script type='text/javascript'>
								  	Swal.fire({
										icon: 'error',
										title: 'Password Tidak Sama!',
									  	text: ' '
									});
								  </script>";
				$this->load->view('dash_donatur/profile',$data);
			}
		}else{
			$data['notif'] = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
								  <script type='text/javascript'>
								  	Swal.fire({
										icon: 'error',
										title: 'Password Lama Salah!',
									  	text: ' '
									});
								  </script>";
			$this->load->view('dash_donatur/profile',$data);
		}

	}

	 /*public function prosesDonasi()
	 {
	 	$form = $this->input->post();
	 	$id_donasi = $this->M_akun->gen_id('donasi','id_donasi','DNSI-1101-');

	 	if ($form['metode_bayar'] == "Virtual Account") {
	 		$data = array(
	 				'id_donasi' => $id_donasi,
	 				'id_campaign' => $form['id_campaign'],
	 				'id_donatur' => $this->session->userdata('id_donatur'),
	 				'nominal_donasi' => $form['nominal'],
	 				'nominal_transfer' => $form['nominal'],
	 				'metode_pembayaran' => $form['metode_bayar'],
	 				'status' => "pending"
	 			);
	 		$insert = $this->M_Donatur->insertData('donasi', $data);
	 	}
	 	else{
	 		$data = array(
	 				'id_donasi' => $id_donasi,
	 				'id_campaign' => $form['id_campaign'],
	 				'id_donatur' => $this->session->userdata('id_donatur'),
	 				'nominal_donasi' => $form['nominal'],
	 				'nominal_transfer' => 0,
	 				'metode_pembayaran' => $form['metode_bayar'],
	 				'status' => 'pending'
	 			);
	 		$insert = $this->M_Donatur->insertData('donasi', $data);
	 	}

	 	echo json_encode($insert);
	 }*/

	public function donasiSaya()
	{
		$id = $this->session->userdata('id_donatur');
		$data['data'] = $this->M_Donatur->tampilDonasi($id);
		$this->load->view('dash_donatur/donasiSaya',$data);
	}

	public function tampilanEditDonasi()
	{
		$id_c = $this->input->post('id');
		$id_d = $this->session->userdata('id_donatur');
		$data['data'] = $this->M_Donatur->tampilDonasiById($id_c,$id_d);
		$this->load->view('dash_donatur/editDonasi',$data);
	}

	public function prosesEditDonasi()
	{
		$id_barang = $this->input->post('id');
		$form = $this->input->post();

		$data = array(
			'kategori_barang' => $form['kategori_barang'],
			'nama_barang' => $form['nama_barang'],
			'jumlah_barang' => $form['jumlah_barang'],
			'satuan_barang' => $form['satuan_barang'],
			'catatan_barang' => $form['catatan_barang'],
			'resi' => $form['resi'],
			'status' => 'Sedang Dikirim'
		);
		$this->M_Donatur->updateData('barang', 'id_barang',$data,$id_barang);
		redirect('donatur/C_donatur/donasiSaya');
	}

	public function tampilanDetailDonasi()
	{
		$id_c = $this->input->post('id');
		$id_d = $this->session->userdata('id_donatur');
		$data['data'] = $this->M_Donatur->tampilDonasiById($id_c,$id_d);
		$this->load->view('dash_donatur/detailDonasi',$data);
	}

	public function viewCampaignByKategori()
	{
		$kategori = $this->input->get('id');
		$data['selectAllCampaign'] = $this->M_Donatur->viewCampaignByKategori2($kategori);
		$this->load->view('dash_donatur/viewCampaignByKategori',$data);
	}

	public function hapusDonasi()
	{
		$id = $this->input->post('id');
		$this->M_Donatur->deleteDonasi($id);
		redirect('donatur/C_donatur/donasiSaya');
	}

	public function trackingBarang()
	{
		$id = $this->input->post('id_campaign');
		$data['data'] = $this->M_Donatur->trackingBarang($id);
		$data['data2'] = $this->M_Donatur->laporanDonasi($id);
		$this->load->view('dash_donatur/trackingBarang',$data);
	}

	public function config()
	{
		$config = [
			'net' => 'testnet',
			'nis_address' => $this->config->item('node_nis'),
			'private' => 'b0d702aa81007286bf72e3d2416e248e4034a1f3d7681c8cc035cf8b467c8c0c',
			'public' => '1fb28e2f003bb1eee8c60eef5f0f766b6f488c3467e4140e4e904201b1a3b9f4',
			'security_check' => false //leave it true if you are not sure;
		];

		return new NemPhp($config);
	}

	public function sendNem($recipient)
	{
		$nemPhp = $this->config();

		//Prepare transaction
		$nemPhp->prepareTransaction(
			1, //How much XEM to send
			0, //Put higher fee if you want, otherwise leave it zero so minimum fee will be taken off
			$recipient, //adress where to send
			null,
			'1 Bagi Barang'
		);

		$result = $nemPhp->commitTransaction();
	}

	public function sendMosaic($privateKey, $publicKey, $recipient, $message, $amount)
	{
		$config = [
			'net' => 'testnet',
			'nis_address' => $this->config->item('node_nis'),
			'private' => $privateKey,
			'public' => $publicKey,
			'security_check' => false //leave it true if you are not sure;
		];

		$nemPhp = new NemPhp($config);

		//Prepare transaction
		$nemPhp->prepareTransaction(
			1, //How much mosaics to send
			0, //Put higher fee if you want, otherwise leave it zero so minimum fee will be taken off
			$recipient, //adress where to send
			"barang",
			$message
		);

		//Add mosaics to your transaction
		$nemPhp->addMosaicToTransaction(
			'bagibarang', //namespace
			'barang', //name
			$amount //quantity
		);

		//You can check your future transaction before sending
		$resultPrepare = $nemPhp->transaction;

		//And commit transaction to the network (you shoud almost immidiately hear 'dink' sound from you wallet
		$resultCommit = $nemPhp->commitTransaction();

		$result = array(
			'resultPrepare' => $resultPrepare,
			'resultCommit' => $resultCommit
		);

		return $result;
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>
