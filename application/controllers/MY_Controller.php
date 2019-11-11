<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_akun');
	}

	public function index($str = "index")
	{
		$this->load->view('homepage/'.$str);
	}

	public function check_email($inp)
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
						'nama' => $getDataP[0]->nama,
						'email' => $getDataP[0]->email,
						'password' => $getDataP[0]->password
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
						'nama' => $getDataD[0]->nama,
						'email' => $getDataD[0]->email,
						'password' => $getDataD[0]->password
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
				if ($getDataV[0]->status == 1) {	
					$session_data = array(
						'role_id' => 3,
						'id_volunteer' => $getDataV[0]->id_volunteer,
						'nama' => $getDataV[0]->nama,
						'email' => $getDataV[0]->email,
						'password' => $getDataV[0]->password
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

		$data = array(
					'nama' => $form['nama'],
					'email' => $form['email'],
					'password' => $password,
					'status' => 0
					);

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
			else{
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








  	//FUNCTION TESTING
  	// public function test()
  	// {
  	// 	$this->load->view('content_email');
  	// }
  
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>