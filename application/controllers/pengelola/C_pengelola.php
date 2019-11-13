<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengelola extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_akun');
	}

	public function index()
	{
		if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 1) {
			$this->load->view('dash_pengelola/hal_awal');
		}
		else{
			redirect('MY_Controller/index','refresh');
		}
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ ?>