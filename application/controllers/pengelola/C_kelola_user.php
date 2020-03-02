<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/pengelola/C_pengelola.php';

class C_kelola_user extends C_pengelola {

	public function editPengelola()
	{
		$form = $this->input->post();
		$id_pengelola = $this->session->userdata('id_pengelola');

		$data = array(
				'role_id' => 1,
				'id_pengelola' => $id_pengelola,
				'email' => $form['Email'],
				'nama' => $form['Nama'],
				'no_ktp' => $form['NoKTP'],
				'password' => $this->session->userdata('password'),
				'jenis_kelamin' => $form['jenis_kelamin'],
				'alamat' => $form['Alamat'],
				'foto' => $this->session->userdata('foto'),
				'no_tlp' => $form['NoTlp'],
				'status' => $this->session->userdata('status')
			);
		$this->session->set_userdata($data);
		$data1 = array(
				'email' => $form['Email'],
				'nama' => $form['Nama'],
				'no_ktp' => $form['NoKTP'],
				'jenis_kelamin' => $form['jenis_kelamin'],
				'alamat' => $form['Alamat'],
				'no_tlp' => $form['NoTlp'],
			);
		$update = $this->M_akun->update('id_pengelola', $id_pengelola, 'pengelola', $data1);
		echo "success";
	}

	public function editPassword()
	{
		$form = $this->input->post();

		if ($form['OldPassword'] != "" || $form['NewPassword'] != "" || $form['NewPasswordConfirm'] != "") {
			if ($form['OldPassword'] == $this->encryption->decrypt($this->session->userdata('password'))) {
				if ($form['NewPassword'] == $form['NewPasswordConfirm']) {
					$data = array('password' => $this->encryption->encrypt($form['NewPasswordConfirm']));
					$this->M_akun->update('id_pengelola', $this->session->userdata('id_pengelola'), 'pengelola', $data);
					$this->session->set_userdata('password', $this->encryption->encrypt($form['NewPasswordConfirm']));
					echo 'success';
				}
				else{
					echo 'failed2';
				}
			}
			else{
				echo 'failed1';
			}
		}
		else{
			echo 'failed0';
		}
	}

	public function accVol() //Proses Acc
	{
		$id_volunteer=$this->input->post('kode');
		$data = array('status' => 11);
       	$data=$this->M_akun->update('id_volunteer', $id_volunteer, 'volunteer', $data);
       	echo json_encode($data);
	}

	public function unaccVol() //Proses UnAcc
	{
		$id_volunteer=$this->input->post('kode');
		$data = array('status' => 1);
       	$data=$this->M_akun->update('id_volunteer', $id_volunteer, 'volunteer', $data);
       	echo json_encode($data);
	}

	public function addPengelola() //Proses Add Pengelola
	{
		$form = $this->input->post();
		$id_pengelola = $this->M_akun->gen_id('pengelola', 'id_pengelola', 'EMPL-1501-');

		$config['file_name'] = "ft_p-".$id_pengelola."-".$form['nama'];
		$config['upload_path'] = './uploads/fotoProfil/ft_p';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '1000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    		<script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery/jquery.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: '<?php echo $error['error']?>',
					}).then(function() {
						window.location = '<?= base_url() ?>pengelola/C_pengelola/addPengelola';
					});
				});
			</script>
			<?php
		}
		else{
			$dataFoto = $this->upload->data();
			$data = array(
				'id_pengelola' => $id_pengelola,
				'email' => $form['email'],
				'nama' => $form['nama'],
				'no_ktp' => $form['no_ktp'],
				'no_tlp' => $form['no_tlp'],
				'password' => $this->encryption->encrypt($id_pengelola),
				'jenis_kelamin' => $form['jenis_kelamin'],
				'alamat' => $form['alamat'],
				'foto' => 'uploads/fotoProfil/ft_p/'.$dataFoto['file_name'],
				'status' => 0
			);
			$this->M_akun->insert('pengelola', $data);
			$this->send($form['email'], 'BAGI BARANG - VERIFIKASI AKUN', $form['nama'], 'Pengelola');
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    		<script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery/jquery.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: 'Pengelola Baru Telah Di Daftarkan, Cek Email Untuk Aktivasi Akun',
					}).then(function() {
						window.location = '<?= base_url() ?>pengelola/C_pengelola/addPengelola';
					});
				});
			</script>
			<?php
		}
	}

	public function send($email_penerima, $subjek, $nama, $jenis_akun){ //Kirim Email

	    $content = $this->load->view('dash_pengelola/content_email', array('nama'=>$nama, 'jenis_akun'=>$jenis_akun, 'email'=>$email_penerima), true); // Ambil isi file content.php dan masukan ke variabel $content
	    
	    $sendmail = array(
	      'email_penerima'=>$email_penerima,
	      'subjek'=>$subjek,
	      'content'=>$content,
	    );
	    
	    $send = $this->mailer->send($sendmail);
  	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>