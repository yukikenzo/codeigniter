<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $thn_now = date('Y');
		$thn_now1 = date('Y') - 1;
		$data['thn_now'] = $thn_now;
		$data['thn_now1'] = $thn_now1;

		
        $data['website']     = $this->M_user->website();
		$data['dt_kec']	     = $this->M_user->dt_kec();

		$data['aktif'] 		= $this->M_user->aktif_d();
		$data['gejala'] 	= $this->M_user->gejala_d();
		$data['sembuh'] 	= $this->M_user->sembuh_d();

		$data['dt_kasus_aktif22'] 	= $this->M_user->dt_kasus_aktif22_d($thn_now1);
		$data['dt_kasus_aktif23'] 	= $this->M_user->dt_kasus_aktif23_d($thn_now);

		$data['dt_kasus_now'] 	= $this->M_user->dt_kasus_now_d();

		$data['dt_kasus'] 	= $this->M_user->dt_kasus_d();
		$data['dt_kasus2'] 	= $this->M_user->dt_kasus2_d();
		$data['dt_kasus3'] 	= $this->M_user->dt_kasus3_d();

        $this->load->view('admin/Header', $data);
        $this->load->view('admin/Dashboard', $data);
        $this->load->view('admin/Footer', $data);
    }

    public function data_stuning_desa()
	{
		$data['user'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
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

		$this->load->view('admin/Header', $data);
		$this->load->view('admin/Dt_stuning_desa', $data);
		$this->load->view('admin/Footer', $data);
	}

    public function website()
	{
		$data['user'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
		$data['website']     = $this->M_user->website();

		$this->load->view('admin/Header', $data);
		$this->load->view('admin/Website', $data);
		$this->load->view('admin/Footer', $data);
		$this->load->view('admin/Alert', $data);
	}

    public function edit_website()
    {

        $data['website'] = $this->db->get_where('website', ['id' => $this->input->post('id')])->row_array();

        $nama  = $this->input->post('nama');
        $id  = $this->input->post('id');

        //cek jika ada gambar yang akan di upload
        $upload_foto    = $_FILES['foto']['name'];

        if ($upload_foto) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '30000';
            $config['upload_path']   = './assets/img/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $foto_lama = $data['website']['logo'];
                if ($foto_lama != 'default.png') {
                    unlink(FCPATH . './assets/img/' . $foto_lama);
                }

                $new_foto = $this->upload->data('file_name');
                $this->db->set('logo', $new_foto);
            } else {
                echo $this->upload->dispay_errors();
            }
        }
        $this->db->set('nama', $nama);
        $this->db->where('id', $id);
        $this->db->update('website');

        $this->session->set_flashdata('sukses', 'sukses');
        redirect('admin/Dashboard/website');
    }

	public function profil()
	{
		$data['user'] = $this->db->get_where('login', ['username' => $this->session->userdata('username')])->row_array();
		$data['website']     = $this->M_user->website();

		$this->load->view('admin/Header', $data);
		$this->load->view('admin/Profil', $data);
		$this->load->view('admin/Footer', $data);
		$this->load->view('admin/Alert', $data);
	}
    

	public function edit_user()
    {

        $data['user'] = $this->db->get_where('login', ['id_login' => $this->input->post('id_login')])->row_array();

        $nama  = $this->input->post('nama');
        $id_login  = $this->input->post('id_login');

        //cek jika ada gambar yang akan di upload
        $upload_foto    = $_FILES['foto']['name'];

        if ($upload_foto) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '30000';
            $config['upload_path']   = './assets/img/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $foto_lama = $data['login']['foto'];
                if ($foto_lama != 'default.png') {
                    unlink(FCPATH . './assets/img/' . $foto_lama);
                }

                $new_foto = $this->upload->data('file_name');
                $this->db->set('foto', $new_foto);
            } else {
                echo $this->upload->dispay_errors();
            }
        }
        $this->db->set('nama', $nama);
        $this->db->where('id_login', $id_login);
        $this->db->update('login');

        $this->session->set_flashdata('sukses', 'sukses');
        redirect('admin/Dashboard/profil');
    }

	public function edit_password() {
        // Set aturan validasi untuk form
        $this->form_validation->set_rules('old_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password Baru', 'required|matches[new_password]');

        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('pas_gagal', 'pas_gagal');
            redirect('admin/Dashboard/profil');
        } else {
            // Ambil data user dari session atau database sesuai kebutuhan Anda
            $username = $this->session->userdata('username'); // Gantilah 'user_id' dengan field yang sesuai di database

            // Ambil password lama dari input form
            $old_password = $this->input->post('old_password');

            // Validasi password lama
            if ($this->M_admin->verify_password($username, $old_password)) {
                // Jika password lama benar, ambil password baru dan hash menggunakan password_hash
                $new_password = $this->input->post('new_password');
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Simpan password baru ke database
                $this->M_admin->update_password($username, $hashed_password);

                // Redirect ke halaman sukses atau halaman lain sesuai kebutuhan
				$this->session->set_flashdata('sukses_pass', 'sukses_pass');
				redirect('login');
            } else {
                // Jika password lama salah, kembali ke halaman change_password_view dengan pesan error
                $this->session->set_flashdata('pas_gagal', 'pas_gagal');
            	redirect('admin/Dashboard/profil');
            }
        }
    }

}