<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/pengelola/C_pengelola.php';

class C_paket extends C_pengelola {

	public function buatPaket()
	{
		$form = $this->input->post();
		
		$id_paket = $this->M_akun->gen_id('paket', 'id_paket', 'PCKG-1901-');
		$data = array(
			'id_paket' => $id_paket, 
			'id_campaign' => $form['id_campaign'],
			'jenis_barang' => $form['jenis_barang'],
			'tanggal_sortir' => date('Y-m-d H:i:s'),
			'asal' => 'Warehouse (Jakarta)',
			'tujuan' => $form['tujuan'],
			'keterangan' => $form['keterangan'],
			'status' => 'Proses Penyortiran'
		);
		$this->M_akun->insert('paket', $data);
		redirect('pengelola/C_pengelola/sortBarang','refresh');
	}

	public function barangPaket()
	{
		$form = $this->input->post();

		$data = array('id_paket' => $form['id_paket']);
		$this->M_akun->update('id_barang', $form['id_barang'], 'barang', $data);
		redirect('pengelola/C_pengelola/barangPaket?id_paket='.$form['id_paket'].'&id_campaign='.$form['id_campaign'].'&jenis_barang='.$form['jenis_barang'].'','refresh');
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>