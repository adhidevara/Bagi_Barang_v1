<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_akun');
		$this->load->model('donatur/M_Donatur');
	}

	public function index($str = "index")
	{

		$data['selectAllCampaign'] = $this->M_Donatur->viewCampaign();
		// $data['jml'] = $this->M_Donatur->progressCampaign($data['selectAllCampaign'][0]->id_campaign);
		$data['campaignByPantiAsuhan'] = $this->M_Donatur->viewCampaignByKategori('Panti Asuhan');
		$data['campaignByKemanusiaan'] = $this->M_Donatur->viewCampaignByKategori('Kemanusiaan');
		$data['campaignByPendidikan'] = $this->M_Donatur->viewCampaignByKategori('Pendidikan');
		$data['campaignByBencanaAlam'] = $this->M_Donatur->viewCampaignByKategori('Bencana Alam');
		$this->load->view('homepage/'.$str, $data);
	}

	public function check_email($inp = "")
	{
		$getDataP = $this->M_akun->selectWhere("*", 'pengelola', 'email', $inp);
		$getDataD = $this->M_akun->selectWhere("*", 'donatur', 'email', $inp);
		$getDataV = $this->M_akun->selectWhere("*", 'volunteer', 'email', $inp);

		if (count($getDataP) > 0) {
			if ($getDataP[0]->email == $inp) {
				return "EMAIL ADA - P";
			}		
		}
		else if (count($getDataD) > 0) {
			if ($getDataD[0]->email == $inp) {
				return "EMAIL ADA - D";
			}		
		}
		else if (count($getDataV) > 0) {
			if ($getDataV[0]->email == $inp) {
				return "EMAIL ADA - V";
			}			
		}
		else{
			return "EMAIL TIDAK ADA";
		}
		redirect('MY_Controller/pages_404','refresh');
	}

	public function login()
	{
		$form = $this->input->post();

		$check_email = $this->check_email($form['email']);

		if ($check_email == "EMAIL ADA - P") {
			$getDataP = $this->M_akun->selectWhere("*", 'pengelola', 'email', $form['email']);
			if ($form['password'] == $this->encryption->decrypt($getDataP[0]->password)) {
				if ($getDataP[0]->status == 1) {
					$session_data = array(
						'role_id' => 1,
						'id_pengelola' => $getDataP[0]->id_pengelola,
						'email' => $getDataP[0]->email,
						'nama' => $getDataP[0]->nama,
						'no_ktp' => $getDataP[0]->no_ktp,
						'password' => $getDataP[0]->password,
						'jenis_kelamin' => $getDataP[0]->jenis_kelamin,
						'alamat' => $getDataP[0]->alamat,
						'foto' => $getDataP[0]->foto,
						'no_tlp' => $getDataP[0]->no_tlp,
						'status' => $getDataP[0]->status
					);
					$this->session->set_userdata($session_data);
					echo "pengelola";
				}
				else {
					echo "CEK EMAIL";
				}
			}
			else{
				echo "PASSWORD SALAH";
			}
		}
		else if ($check_email == "EMAIL ADA - D") {
			$getDataD = $this->M_akun->selectWhere("*", 'donatur', 'email', $form['email']);
			if ($form['password'] == $this->encryption->decrypt($getDataD[0]->password)) {
				if ($getDataD[0]->status == 1) {
					$session_data = array(
						'role_id' => 2,
						'id_donatur' => $getDataD[0]->id_donatur,
						'email' => $getDataD[0]->email,
						'nama' => $getDataD[0]->nama,
						'no_ktp' => $getDataD[0]->no_ktp,
						'password' => $getDataD[0]->password,
						'jenis_kelamin' => $getDataD[0]->jenis_kelamin,
						'alamat' => $getDataD[0]->alamat,
						'foto' => $getDataD[0]->foto,
						'no_tlp' => $getDataD[0]->no_tlp,
						'status' => $getDataD[0]->status
					);
					$this->session->set_userdata($session_data);
					echo "donatur";				
				}
				else {
					echo "CEK EMAIL";
				}
			}
			else{
				echo "PASSWORD SALAH";
			}
		}
		else if ($check_email == "EMAIL ADA - V") {
			$getDataV = $this->M_akun->selectWhere("*", 'volunteer', 'email', $form['email']);
			if ($form['password'] == $this->encryption->decrypt($getDataV[0]->password)) {
				if ($getDataV[0]->status == 1 || $getDataV[0]->status == 11) {
					$session_data = array(
						'role_id' => 3,
						'id_volunteer' => $getDataV[0]->id_volunteer,
						'email' => $getDataV[0]->email,
						'nama' => $getDataV[0]->nama,
						'no_ktp' => $getDataV[0]->no_ktp,
						'password' => $getDataV[0]->password,
						'jenis_kelamin' => $getDataV[0]->jenis_kelamin,
						'alamat' => $getDataV[0]->alamat,
						'foto' => $getDataV[0]->foto,
						'no_tlp' => $getDataV[0]->no_tlp,
						'status' => $getDataV[0]->status
					);
					$this->session->set_userdata($session_data);
					echo "volunteer";
				}
				else {
					echo "CEK EMAIL";
				}
			}
			else{
				echo "PASSWORD SALAH";
			}
		}
		else{
			echo "AKUN BELUM TERDAFTAR";
		}		
	}

	public function regis()
	{
		$form = $this->input->post();
		$password = $this->encryption->encrypt($form['password']);

		if (array_key_exists("accTypeDonatur", $form)) {
			$check_email = $this->check_email($form['email']);
			if ($check_email == "EMAIL ADA - P") {
				echo "EMAIL TELAH TERDAFTAR error_code : p-reg01";
			}
			else if ($check_email == "EMAIL ADA - D") {
				echo "EMAIL TELAH TERDAFTAR error_code :d-reg01";
			}
			else if ($check_email == "EMAIL ADA - V") {
				echo "EMAIL TELAH TERDAFTAR error_code : v-reg01";
			}
			else{
				$id_donatur = $this->M_akun->gen_id('donatur', 'id_donatur', 'DNTR-1502-');
				$data = array(
					'id_donatur' => $id_donatur,
					'nama' => $form['nama'],
					'email' => $form['email'],
					'password' => $password,
					'status' => 0
				);
				$insert = $this->M_akun->insert('donatur', $data);
				$getDataD = $this->M_akun->selectWhere("*", 'donatur', 'email', $form['email']);
				$kirim_email = $this->send($getDataD[0]->email, "BAGI BARANG - VERIFIKASI AKUN", $getDataD[0]->nama, "Donatur");

				echo "donatur";
			}
		}
		else {
			$check_email = $this->check_email($form['email']);
			if ($check_email == "EMAIL ADA - P") {
				echo "EMAIL TELAH TERDAFTAR error_code : p-reg02";
			}
			else if ($check_email == "EMAIL ADA - D") {
				echo "EMAIL TELAH TERDAFTAR error_code : d-reg02";
			}
			else if ($check_email == "EMAIL ADA - V") {
				echo "EMAIL TELAH TERDAFTAR error_code : v-reg02";
			}
			else {
				$id_volunteer = $this->M_akun->gen_id('volunteer', 'id_volunteer', 'VLNT-1503-');
				$data = array(
					'id_volunteer' => $id_volunteer,
					'nama' => $form['nama'],
					'email' => $form['email'],
					'password' => $password,
					'status' => 0
				);
				$insert = $this->M_akun->insert('volunteer', $data);
				$getDataV = $this->M_akun->selectWhere("*", 'volunteer', 'email', $form['email']);
				$kirim_email = $this->send($getDataV[0]->email, "BAGI BARANG - VERIFIKASI AKUN", $getDataV[0]->nama, "Volunteer");

				echo "volunteer";
			}
		}
	}

	public function logout()
	{
    	$this->session->sess_destroy();
    	redirect('MY_Controller/index','refresh');
    }

    public function verifAcc()
    {
    	$email = $this->input->get('email');
    	$check_email = $this->check_email($email);

    	$data = array('status' => 1);

    	if ($check_email == "EMAIL ADA - P") {
    		$this->M_akun->update('email', $email, "pengelola", $data);
    		redirect('MY_Controller/vSuccessVerif','refresh');
    	}
    	else if ($check_email == "EMAIL ADA - D") {
    		$this->M_akun->update('email', $email, "donatur", $data);
    		redirect('MY_Controller/vSuccessVerif','refresh');
    	}
    	else if ($check_email == "EMAIL ADA - V") {
    		$this->M_akun->update('email', $email, "volunteer", $data);
    		redirect('MY_Controller/vSuccessVerif','refresh');
    	}
    }

    public function vSuccessVerif()
    {
    	$this->load->view('content_success');
    }

    public function send($email_penerima, $subjek, $nama, $jenis_akun){

	    $content = $this->load->view('content_email', array('nama'=>$nama, 'jenis_akun'=>$jenis_akun, 'email'=>$email_penerima), true); // Ambil isi file content.php dan masukan ke variabel $content
	    
	    $sendmail = array(
	      'email_penerima'=>$email_penerima,
	      'subjek'=>$subjek,
	      'content'=>$content,
	    );
	    
	    $send = $this->mailer->send($sendmail);
  	}

  	public function reSendEmailVerif()
  	{
  		$email = $this->input->get('email');
  		$check_email = $this->check_email($email);

  		if ($check_email == "EMAIL ADA - D") {
  			$getDataD = $this->M_akun->selectWhere("*", 'donatur', 'email', $email);
  			$content = $this->load->view('content_email', array('nama'=>$getDataD[0]->nama, 'jenis_akun'=>"Donatur"), true);
	    
		    $sendmail = array(
		      'email_penerima'=>$getDataD[0]->email,
		      'subjek'=>'BAGI BARANG - VERIFIKASI EMAIL',
		      'content'=>$content,
		    );
		    
		    $send = $this->mailer->send($sendmail);
		    redirect('MY_Controller/index','refresh');
  		}
  		else if ($check_email == "EMAIL ADA - V") {
  			$getDataV = $this->M_akun->selectWhere("*", 'volunteer', 'email', $email);
  			$content = $this->load->view('content_email', array('nama'=>$getDataV[0]->nama, 'jenis_akun'=>"Volunteer"), true);
	    
		    $sendmail = array(
		      'email_penerima'=>$getDataV[0]->email,
		      'subjek'=>'BAGI BARANG - VERIFIKASI EMAIL',
		      'content'=>$content,
		    );
		    
		    $send = $this->mailer->send($sendmail);
		    redirect('MY_Controller/index','refresh');
  		}
  	}

  	public function lupaPass()
  	{
  		$form = $this->input->post();

  		$dataP = $this->M_akun->selectWhere("*", "pengelola", "email", $form['email']);
  		$dataV = $this->M_akun->selectWhere("*", "volunteer", "email", $form['email']);
  		$dataD = $this->M_akun->selectWhere("*", "donatur", "email", $form['email']);

  		if (count($dataP) > 0) {
  			$id = $dataP[0]->id_pengelola;
  			$nama = $dataP[0]->nama;
  			$email = $dataP[0]->email;
  		}
  		else if (count($dataV) > 0) {
  			$id = $dataV[0]->id_volunteer;
  			$nama = $dataV[0]->nama;
  			$email = $dataV[0]->email;
  		}
  		else if (count($dataD) > 0) {
  			$id = $dataD[0]->id_donatur;
  			$nama = $dataD[0]->nama;
  			$email = $dataD[0]->email;
  		}
  		else {
  			$id = "undefined";
  			$nama = "undefined";
  			$email = "undefined";
  		}

  		$data = array(
		    		'id' => $id,
		    		'nama' => $nama,
		    		'email' => $email
				);

  		$content = $this->load->view('content_lupaPass', $data, true);
  		$sendmail = array(
		      'email_penerima'=>$email,
		      'subjek'=>"LUPA PASSWORD - BAGI BARANG",
		      'content'=>$content,
		    );
		    
		$send = $this->mailer->send($sendmail);


  		echo json_encode($data);
  	}

  	public function ubahPass()
  	{
  		$data['id'] = $this->input->get('id');
  		$this->load->view('ubahPass', $data);
  	}

  	public function proUbahPass()
  	{
  		$form = $this->input->post();

  		$dataP = $this->M_akun->selectWhere("*", "pengelola", "id_pengelola", $form['id']);
  		$dataV = $this->M_akun->selectWhere("*", "volunteer", "id_volunteer", $form['id']);
  		$dataD = $this->M_akun->selectWhere("*", "donatur", "id_donatur", $form['id']);

  		if (count($dataP) > 0) {
  			$data = array('password' => $this->encryption->encrypt($form['newPass']));
  			$this->M_akun->update('id_pengelola', $form['id'], 'pengelola', $data);
  		}
  		else if (count($dataV) > 0) {
  			$data = array('password' => $this->encryption->encrypt($form['newPass']));
  			$this->M_akun->update('id_volunteer', $form['id'], 'volunteer', $data);	
  		}
  		else if (count($dataD) > 0) {
  			$data = array('password' => $this->encryption->encrypt($form['newPass']));
  			$this->M_akun->update('id_donatur', $form['id'], 'donatur', $data);
  		}

  		echo json_encode($form);
  	}

  	public function pages_404()
  	{
  		$this->load->view('Pages_404');
  	}








  	//FUNCTION TESTING
  	// public function test()
  	// {
  	// 	// $this->load->view('content_email');
  	// 	$hasil = $this->M_akun->gen_id('donatur', 'id_donatur', 'DNTR-1059-');
  	// 	echo "<pre>";
  	// 	print_r ($hasil);
  	// 	echo "</pre>";
  	// }
  
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>