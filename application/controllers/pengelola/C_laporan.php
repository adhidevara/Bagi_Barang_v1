<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/pengelola/C_pengelola.php';
	
class C_laporan extends C_pengelola {
	
	public function acc_laporan()
	{
		$get = $this->input->get();

		$data = array('tanggal_diacc' => date('Y-m-d H:i:s'), 'status' => 'Approved');
		$this->M_akun->update('id_laporan', $get['id_laporan'], 'laporan_donasi', $data);
		redirect('pengelola/C_pengelola/verifLapBelanja','refresh');
	}

}
	
/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>