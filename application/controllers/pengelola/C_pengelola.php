<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengelola extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 1) {
			$this->load->model('M_akun');
			$this->load->model('pengelola/M_pengelola');
		}
		else{
			redirect('MY_Controller/pages_404','refresh');
		}
	}

	public function index() //Dashboard Awal
	{
		$this->load->view('dash_pengelola/hal_awal');
	}

	public function myProfil()
	{
		$this->load->view('dash_pengelola/hal_profil');
	}

	public function campaignList() //Tampilan List Campaign
	{
		$dataT['total'] = $this->M_akun->selectAll("*", "campaign");
		
		$config['base_url'] = base_url().'pengelola/C_pengelola/campaignList';
		$config['total_rows'] = count($dataT['total']);
		$config['per_page'] = 3;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;

		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']   = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close']  = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']   = '</span></li>';
		
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
		$data['campaign'] = $this->M_pengelola->selectLimit('campaign',$config['per_page'],$this->uri->segment($config['uri_segment']));
		$this->load->view('dash_pengelola/hal_campaignList', $data);
	}

	public function detailCampaign()
	{
		$val = $this->input->get('id_campaign');
		$data['data'] = $this->M_akun->selectWhere("*", "campaign", "id_campaign", $val);
		$this->load->view('dash_pengelola/hal_detailCampaign', $data);
	}

	public function listBarang()
	{
		$val = $this->input->get('id_campaign');
		$data['data'] = $this->M_akun->selectWhere("*", "barang", "id_campaign", $val);
		
		if (count($data['data']) > 0) {
			$this->load->view('dash_pengelola/hal_listBarang', $data);
		}
		else{
			$this->load->view('dash_pengelola/hal_listBarang');
		}		
	}

	public function listBarangAll()
	{
		$data['barang'] = $this->M_akun->selectAll('*', 'barang');
		$this->load->view('dash_pengelola/hal_listBarangAll', $data);
	}

	public function addVendor()
	{
		$this->load->view('dash_pengelola/head_foot/header');
		$this->load->view('dash_pengelola/hal_addVendor');
		$this->load->view('dash_pengelola/head_foot/footer');
	}

	public function addBarang()
	{
		$this->load->view('dash_pengelola/head_foot/header');
		$this->load->view('dash_pengelola/hal_addBarang');
	}

	public function sortBarang()
	{
		$data['paket0'] = $this->M_pengelola->selectWherePaket0();
		$data['paket1'] = $this->M_pengelola->selectWherePaket1();
		$this->load->view('dash_pengelola/hal_sortBarang', $data);
	}

	public function formPaket()
	{
		$data['data'] = $this->M_pengelola->selectCampPkt();
		
		$this->load->view('dash_pengelola/head_foot/header');
		$this->load->view('dash_pengelola/hal_formPaket', $data);
	}

	public function barangPaket()
	{
		$get = $this->input->get();

		$data['id_paket'] = $get['id_paket'];
		$data['id_campaign'] = $get['id_campaign'];
		$data['jenis_barang'] = $get['jenis_barang'];
		$data['data'] = $this->M_pengelola->selectBarangPaket($get['id_campaign'], $get['jenis_barang']);
		$data['isi'] = $this->M_pengelola->isiPaket($get['id_campaign'], $get['jenis_barang']);
		
		$this->load->view('dash_pengelola/hal_barangPaket', $data);
	}

	public function verifLapBelanja()
	{
		$data['lap_unacc'] = $this->M_pengelola->lap_unacc();
		$data['lap_acc'] = $this->M_pengelola->lap_acc();
		$this->load->view('dash_pengelola/hal_laporan', $data);
	}

	public function addPengelola() //Tampilan Add Pengelola
	{
		$this->load->view('dash_pengelola/hal_addPengelola');
	}

	public function VerifVolun() //Tampilan Verif Volunteer
	{
		$getData['volunteer1'] = $this->M_akun->selectWhere("*", 'volunteer', 'status', 1);
		$getData['volunteer11'] = $this->M_akun->selectWhere("*", 'volunteer', 'status', 11);
		$this->load->view('dash_pengelola/hal_verifVolunteer', $getData);
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ ?>