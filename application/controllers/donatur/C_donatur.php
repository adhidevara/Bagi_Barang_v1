<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class C_donatur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 2) {
			$this->load->model('donatur/M_Donatur');
			$this->load->model('M_akun');
		}else{
			redirect('MY_Controller/pages_404','refresh');
		}
	}
	
	public function detailCampaign()
	{
		$data['id'] = $this->input->get('id_campaign');
		$data['data'] = $this->M_Donatur->viewDetailCampaign($data['id']);
		$this->load->view('dash_donatur/detailCampaign2',$data);
	}

	public function formDonasi($id_campaign)
	{
		$id['id_campaign'] = $id_campaign;
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

	// public function prosesDonasi()
	// {
	// 	$form = $this->input->post();
	// 	$id_donasi = $this->M_akun->gen_id('donasi','id_donasi','DNSI-1101-');

	// 	if ($form['metode_bayar'] == "Virtual Account") {
	// 		$data = array(
	// 				'id_donasi' => $id_donasi,
	// 				'id_campaign' => $form['id_campaign'],
	// 				'id_donatur' => $this->session->userdata('id_donatur'),
	// 				'nominal_donasi' => $form['nominal'],
	// 				'nominal_transfer' => $form['nominal'],
	// 				'metode_pembayaran' => $form['metode_bayar'],
	// 				'status' => "pending"
	// 			);
	// 		$insert = $this->M_Donatur->insertData('donasi', $data);
	// 	}
	// 	else{
	// 		$data = array(
	// 				'id_donasi' => $id_donasi,
	// 				'id_campaign' => $form['id_campaign'],
	// 				'id_donatur' => $this->session->userdata('id_donatur'),
	// 				'nominal_donasi' => $form['nominal'],
	// 				'nominal_transfer' => 0,
	// 				'metode_pembayaran' => $form['metode_bayar'],
	// 				'status' => 'pending'
	// 			);
	// 		$insert = $this->M_Donatur->insertData('donasi', $data);
	// 	}

	// 	echo json_encode($insert);
	// }

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
		$this->load->view('dash_donatur/trackingBarang',$data);
	}

}
	
/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>