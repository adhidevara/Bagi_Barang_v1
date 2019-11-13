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
		$this->load->view('dash_pengelola/hal_awal');
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ ?>