<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($str = "index")
	{
		$this->load->view('homepage/'.$str);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>