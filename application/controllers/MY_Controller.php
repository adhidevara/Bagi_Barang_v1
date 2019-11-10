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
			else{
				echo "PASSWORD SALAH";
			}
		}
		else if ($check_email == "EMAIL ADA - D") {
			$getDataD = $this->M_akun->selectWhere("*", 'donatur', 'email', $form['email']);
			if ($form['password'] == $this->encryption->decrypt($getDataD[0]->password)) {
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
			else{
				echo "PASSWORD SALAH";
			}
		}
		else if ($check_email == "EMAIL ADA - V") {
			$getDataV = $this->M_akun->selectWhere("*", 'volunteer', 'email', $form['email']);
			if ($form['password'] == $this->encryption->decrypt($getDataV[0]->password)) {
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
					);

		if (array_key_exists("accTypeDonatur", $form)) {
			$check_email = $this->check_email($form['email']);
			if ($check_email == "EMAIL ADA - P") {
				echo "EMAIL TELAH TERDAFTAR p";
			}
			else if ($check_email == "EMAIL ADA - D") {
				echo "EMAIL TELAH TERDAFTAR d";
			}
			else if ($check_email == "EMAIL ADA - V") {
				echo "EMAIL TELAH TERDAFTAR v";
			}
			else{
				$insert = $this->M_akun->insert('donatur', $data);
				echo "donatur";
			}
		}
		else {
			$check_email = $this->check_email($form['email']);
			if ($check_email == "EMAIL ADA - P") {
				echo "EMAIL TELAH TERDAFTAR p";
			}
			else if ($check_email == "EMAIL ADA - D") {
				echo "EMAIL TELAH TERDAFTAR d";
			}
			else if ($check_email == "EMAIL ADA - V") {
				echo "EMAIL TELAH TERDAFTAR v";
			}
			else{
				$insert = $this->M_akun->insert('volunteer', $data);
				echo "volunteer";
			}
		}
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>