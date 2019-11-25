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
		$id = $this->input->get('id_campaign');
		$data['data'] = $this->M_Donatur->viewDetailCampaign($id);
		$this->load->view('dash_donatur/detailCampaign',$data);
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
			$error['error'] = $this->upload->display_errors();
			echo "<pre>";
			print_r ($error);
			echo "</pre>";
			echo "gkupload";
			//redirect('donatur/C_donatur/profile',$error);
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
			echo $error['error'];
			// redirect('donatur/C_donatur/profile',$error);
		}

	}
	
}
	
/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>