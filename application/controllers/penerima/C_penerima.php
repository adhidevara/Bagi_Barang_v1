<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penerima extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 3) {
			$this->load->model('M_akun');
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
			$getData['data'] = $this->M_akun->selectWhere("*", 'volunteer', 'id_volunteer', $this->session->userdata('id_volunteer'));
			$this->load->view('dash_volunteer/dashboard', $getData);
		}
	}

	public function v_Profile()
	{
		$this->load->view('dash_volunteer/profile');
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
			
			//Uncomment for DEBUG
			// echo "<pre>";
			// print_r ($dataFoto);
			// echo "</pre>";

			// echo "<pre>";
			// print_r ($form);
			// echo "</pre>";

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

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ ?>