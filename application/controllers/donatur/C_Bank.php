<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class C_Bank extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
			$this->load->model('donatur/M_Bank');
		}
	
		public function index()
		{
			$this->load->view('dash_donatur/Bank/Bank');
		}

		public function virtualAccount()
		{
			$this->load->view('dash_donatur/Bank/virtualAccount');
		}
		
		public function transfer()
		{
			$this->load->view('dash_donatur/Bank/transfer');
		}

		public function accTransfer()
		{
			$data['data'] = $this->M_Bank->viewTransfer();
			$this->load->view('dash_donatur/Bank/accTransfer',$data);
		}

		function prosesAcc()
		{
			$id = $this->input->get('id');
			$data = array('status' => 'diterima');
			$this->M_Bank->update($id,'id_donasi',$data,'donasi');
			redirect('donatur/C_Bank/accTransfer');
		}
	}
	
	/* End of file controllername.php */
	/* Location: ./application/controllers/controllername.php */
?>