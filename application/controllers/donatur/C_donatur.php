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
	
}
	
/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>