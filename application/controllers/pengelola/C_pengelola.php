<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengelola extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 1) {
			$this->load->model('M_akun');
		}
		else{
			redirect('MY_Controller/pages_404','refresh');
		}
	}

	public function index() //Dashboard Awal
	{
		$this->load->view('dash_pengelola/hal_awal');
	}

	public function VerifVolun() //Tampilan Verif
	{
		$getData['volunteer1'] = $this->M_akun->selectWhere("*", 'volunteer', 'status', 1);
		$getData['volunteer11'] = $this->M_akun->selectWhere("*", 'volunteer', 'status', 11);
		$this->load->view('dash_pengelola/hal_verifVolunteer', $getData);
	}

	public function addPengelola()
	{
		$this->load->view('dash_pengelola/hal_addPengelola');
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ ?>