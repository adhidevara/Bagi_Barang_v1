<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class C_donatur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 2) {
			$this->load->model('M_akun');
		}else{
			redirect('MY_Controller/pages_404','refresh');
		}
	}
	
	public function index()
	{
		echo "INI DONATUR";
	}
	
}
	
/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>