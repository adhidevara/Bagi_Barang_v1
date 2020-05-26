<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/pengelola/C_pengelola.php';

class C_paket extends C_pengelola {

	public function buatPaket()
	{
		$form = $this->input->post();
		
		$id_paket = $this->M_akun->gen_id('paket', 'id_paket', 'PCKG-1901-');
		$camp = $this->M_akun->selectWhere("*", "campaign", "id_campaign", $form['id_campaign']);
		$cekPaket = $this->M_pengelola->checkPaket($form['id_campaign'],$form['jenis_barang']);

		if ($cekPaket == null) {
			$data = array(
				'id_paket' => $id_paket,
				'id_campaign' => $form['id_campaign'],
				'jenis_barang' => $form['jenis_barang'],
				'tanggal_sortir' => date('Y-m-d H:i:s'),
				'asal' => 'Warehouse (Jakarta)',
				'tujuan' => $camp[0]->tujuan,
				'keterangan' => $form['keterangan'],
				'status' => 'Proses Penyortiran'
			);
			$this->M_akun->insert('paket', $data);
			redirect('pengelola/C_pengelola/sortBarang','refresh');
		}
		else {
			redirect('pengelola/C_pengelola/sortBarang?error=paketavailable','refresh');
		}
	}

	public function barangPaket()
	{
		$form = $this->input->post();

		$barang = $this->M_akun->selectWhere("*", "barang", "id_barang", $form['id_barang']);
		$jml_brg = $barang[0]->jumlah_barang;
		$brg_rusak = (int) $jml_brg - $form['qty'];

		if ($brg_rusak >= 0) {
			$data = array(
				'id_paket' => $form['id_paket'],
				'jumlah_barang_rusak' => $form['qty']);
			$this->M_akun->update('id_barang', $form['id_barang'], 'barang', $data);
			redirect('pengelola/C_pengelola/barangPaket?id_paket='.$form['id_paket'].'&id_campaign='.$form['id_campaign'].'&jenis_barang='.$form['jenis_barang'].'','refresh');
		}
		else {
			redirect('pengelola/C_pengelola/barangPaket?id_paket='.$form['id_paket'].'&id_campaign='.$form['id_campaign'].'&jenis_barang='.$form['jenis_barang'].'&error=jumlah_over','refresh');
		}
	}

	public function kirimPaket()
	{
		$form = $this->input->post();
		$tgl = substr($form['tgl_kirim'],0,-8);
		$time = substr($form['tgl_kirim'],-5);
		$date = date_create($tgl.' '.$time);
		$tgl_kirim = date_format($date,"Y-m-d H:i:s");

		$data = array(
			'nama_kurir' => $form['nama_kurir'],
			'no_resi' => $form['no_resi'],
			'tanggal_pengiriman' => $tgl_kirim,
			'status' => "Paket Sedang Dikirim"
		);
		$this->M_akun->update("id_paket", $form['id_paket'], "paket", $data);
		redirect('sortBarang','refresh');
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>
