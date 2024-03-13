<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kec_desa extends CI_Controller
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
        $data['website']     = $this->M_user->website();
		$data['dt_kec']      = $this->M_admin->dt_kec();

        $this->load->view('admin/Header', $data);
        $this->load->view('admin/Kec_desa', $data);
        $this->load->view('admin/Footer', $data);
    }

    public function desa()
    {
        $data['user'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
        $id_kec = $_GET['id_kec'];
        $data['website']     = $this->M_user->website();
		$data['dt_desa']      = $this->M_admin->dt_desa($id_kec);
        $data['nama_kec']      = $this->M_admin->nama_kec($id_kec);


        $this->load->view('admin/Header', $data);
        $this->load->view('admin/Desa', $data);
        $this->load->view('admin/Footer', $data);
    }

    public function list_kasus_desa()
    {
        $data['user'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
        $id_desa = $_GET['id_desa'];
        $data['website']     = $this->M_user->website();

        $data['dt_stunting']      = $this->M_admin->list_data_stunting($id_desa);

        $this->load->view('admin/Header', $data);
        $this->load->view('admin/List_kasus_desa', $data);
        $this->load->view('admin/Footer', $data);
        $this->load->view('admin/Alert', $data);
    }

    public function cetak_desa()
    {
        $data['user'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
        $tgl_cetak = date('Y-m-d H:i:s');
        $data['tgl_cetak'] = $tgl_cetak;
        $id_desa = $_GET['id_desa'];
        $data['website']     = $this->M_user->website();

        $data['dt_stunting']      = $this->M_admin->list_data_stunting($id_desa);

        $this->load->view('admin/Cetak_desa', $data);
    }

    public function tambah_stunting()
    {
        $nik        = $this->input->post('nik');
        $id_desa    = $this->input->post('id_desa');
        $nama       = $this->input->post('nama');
        $umur       = $this->input->post('umur');
        $l_p        = $this->input->post('l/p');
        $status     = $this->input->post('status');
        $tgl        = $this->input->post('tgl');
        $thn        = $this->input->post('thn');

        // Mengecek apakah data nik sudah ada
        $existing_data = $this->db->get_where('dt_stunting', array('nik' => $nik));
        if ($existing_data->num_rows() > 0) {
            // Jika data nik sudah ada, tampilkan notifikasi atau ambil tindakan lain
            $this->session->set_flashdata('nik_suda_ada', 'nik_suda_ada');
            redirect('admin/Kec_desa/list_kasus_desa?id_desa=' . $id_desa);
            return;
        }else{

            // Jika data nik belum ada, lakukan insert
        $data = array(
            'nik'       => $nik,
            'id_desa'   => $id_desa,
            'nama'      => $nama,
            'umur'      => $umur,
            'l/p'       => $l_p,
            'status'    => $status,
            'tgl'       => $tgl,
            'thn'       => $thn
        );

        }

        $this->db->insert('dt_stunting', $data);
        $this->session->set_flashdata('sukses', 'Sukses');
        redirect('admin/Kec_desa/list_kasus_desa?id_desa=' . $id_desa);
    }

    public function edit_stunting()
    {

        $nama       = $this->input->post('nama');
        $umur       = $this->input->post('umur');
        $l_p        = $this->input->post('l/p');
        $status     = $this->input->post('status');
        $tgl        = $this->input->post('tgl');
        $thn        = $this->input->post('thn');
        $id_desa    = $this->input->post('id_desa');
        
        $nik        = $this->input->post('nik');
        
        $this->db->set('id_desa', $id_desa);
        $this->db->set('nama', $nama);
        $this->db->set('umur', $umur);
        $this->db->set('l/p', $l_p);
        $this->db->set('status', $status);
        $this->db->set('tgl', $tgl);
        $this->db->set('thn', $thn);
       
        $this->db->where('nik', $nik);
        $this->db->update('dt_stunting');

        $this->session->set_flashdata('sukses', 'sukses');
        redirect('admin/Kec_desa/list_kasus_desa?id_desa=' . $id_desa);
    }

    function hapus_stunting()
    {
        $nik = $_GET['nik'];
        
        $id_desa = $_GET['id_desa'];

        $where = array('nik' => $nik);
        $this->M_admin->hapus_data($where, 'dt_stunting');
        $this->session->set_flashdata('hapus', 'hapus');
        redirect('admin/Kec_desa/list_kasus_desa?id_desa=' . $id_desa);
    }

}