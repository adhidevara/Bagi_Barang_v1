<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/pengelola/C_pengelola.php';

class C_campaign extends C_pengelola {

	public function cariCampaign()
	{
		$form = $this->input->post();
		$cari['campaign'] = $this->M_pengelola->search('judul_campaign', 'id_campaign', $form['cariCampaign'], 'campaign');

		$hasil = $this->load->view('dash_pengelola/hal_Vcampaign', $cari, true);
		$callback = array('hasil' => $hasil); // Set array hasil dengan isi dari view.php yang diload tadi
    	
    	echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ ?>