<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$thn_now = date('Y');
		$thn_now1 = date('Y') - 1;
		$data['thn_now'] = $thn_now;
		$data['thn_now1'] = $thn_now1;

		$data['website']     = $this->M_user->website();
		$data['dt_kec'] = $this->M_user->dt_kec();

		$data['aktif'] 		= $this->M_user->aktif_d();
		$data['gejala'] 	= $this->M_user->gejala_d();
		$data['sembuh'] 	= $this->M_user->sembuh_d();

		$data['dt_kasus_aktif22'] 	= $this->M_user->dt_kasus_aktif22_d($thn_now1);
		$data['dt_kasus_aktif23'] 	= $this->M_user->dt_kasus_aktif23_d($thn_now);

		$data['dt_kasus_now'] 	= $this->M_user->dt_kasus_now_d();

		$data['dt_kasus'] 	= $this->M_user->dt_kasus_d();
		$data['dt_kasus2'] 	= $this->M_user->dt_kasus2_d();
		$data['dt_kasus3'] 	= $this->M_user->dt_kasus3_d();

		$this->load->view('user/Header', $data);
		$this->load->view('user/Index', $data);
		$this->load->view('user/Footer');
	}

	public function data_stuning_desa()
	{

		$data['website']     = $this->M_user->website();
		$id_kec = $_GET['id_kec'];

		$data['dt_kec'] = $this->M_user->dt_kec();

		$thn_now = date('Y');
		$thn_now1 = date('Y') - 1;
		$data['thn_now'] = $thn_now;
		$data['thn_now1'] = $thn_now1;

		$data['dt_desa'] 	= $this->M_user->dt_desa($id_kec);
		$data['aktif'] 		= $this->M_user->aktif($id_kec);
		$data['gejala'] 	= $this->M_user->gejala($id_kec);
		$data['sembuh'] 	= $this->M_user->sembuh($id_kec);
		$data['thn_kec'] 	= $this->M_user->thn_kec($id_kec);
		$data['dt_kasus'] 	= $this->M_user->dt_kasus($id_kec);
		$data['dt_kasus2'] 	= $this->M_user->dt_kasus2($id_kec);
		$data['dt_kasus3'] 	= $this->M_user->dt_kasus3($id_kec);

		$data['dt_kasus_aktif22'] 	= $this->M_user->dt_kasus_aktif22($id_kec,$thn_now1);
		$data['dt_kasus_aktif23'] 	= $this->M_user->dt_kasus_aktif23($id_kec,$thn_now);

		$data['dt_kasus_now'] 	= $this->M_user->dt_kasus_now($id_kec);

		$this->load->view('user/Header', $data);
		$this->load->view('user/Dt_stuning_desa', $data);
		$this->load->view('user/Footer', $data);
	}

}
