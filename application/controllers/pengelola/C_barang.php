<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/pengelola/C_pengelola.php';
	
class C_barang extends C_pengelola {
	
	public function terimaBarang()
	{
		$val = $this->input->get('id_barang');
		
		$data = array('status' => 'Di Terima (Warehouse)');
		$this->M_akun->update('id_barang', $val, 'barang', $data);
		redirect('pengelola/C_pengelola/listBarangAll','refresh');
	}

}
	
/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>