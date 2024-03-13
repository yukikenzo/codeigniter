<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dt_stunting_all extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('login');
        }

        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $status = $this->input->post('status');
        $kecamatan = $this->input->post('kecamatan');
        
        if($awal == NULL){
            $awal = 'ALL';
            $akhir = 'ALL';
            $status = 'Status';
            $kecamatan = 'Kecamatan';
        }else{
            $awal = $this->input->post('awal');
            $akhir = $this->input->post('akhir');
            $status = $this->input->post('status');
            $kecamatan = $this->input->post('kecamatan');
        }

        $data['awal']= $awal;
        $data['akhir']= $akhir;
        $data['status']= $status;
        $data['kecamatan']= $kecamatan;
		
        $data['website']     = $this->M_user->website();
        $data['id_kec']     = $this->M_admin->id_kec();
        $data['dt_stunting']      = $this->M_admin->list_data_stunting_all($awal, $akhir, $status, $kecamatan);

        $this->load->view('admin/Header', $data);
        $this->load->view('admin/Dt_stunting_all', $data);
        $this->load->view('admin/Footer', $data);
    }
    
    public function cetak_all()
    {
        $data['user'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
        $tgl_cetak = date('Y-m-d H:i:s');
        $data['tgl_cetak'] = $tgl_cetak;

        $awal = $_GET['awal'];
        $akhir = $_GET['akhir'];
        $status = $_GET['status'];
        $kecamatan = $_GET['kecamatan'];
        
        if($awal == NULL){
            $awal = 'ALL';
            $akhir = 'ALL';
            $status = 'Status';
            $kecamatan = 'Kecamatan';
        }else{
            $awal = $_GET['awal'];
            $akhir = $_GET['akhir'];
            $status = $_GET['status'];
            $kecamatan = $_GET['kecamatan'];
        }

        $data['awal']= $awal;
        $data['akhir']= $akhir;
        $data['status']= $status;
        $data['kecamatan']= $kecamatan;
		
        $data['website']     = $this->M_user->website();
        $data['id_kec']     = $this->M_admin->id_kec();
        $data['dt_stunting']      = $this->M_admin->list_data_stunting_all($awal, $akhir, $status, $kecamatan);

        $this->load->view('admin/cetak_all', $data);
    }
}