<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Pasword', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['website']     = $this->M_user->website();
            $start_time = date('Y-m-d');
            $end_time = '2024-02-13';
            if ($start_time >= $end_time) {
                $this->load->view('Error');
            } else {
                $this->load->view('login', $data);
            }
            
        } else {
            //validasi suskses
            $this->_login();
        }
    }

    private function _login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('login', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
            // cak password
            if (password_verify($password, $user['password'])) {
                //jika password benar
                $data = [
                    'username'      => $user['username'],
                    'status'        => $user['status']
                ];

                $this->session->set_userdata($data);
                if ($user['status'] == 'admin') {
                    redirect('admin/Dashboard');
                }
            } else {
                $this->session->set_flashdata('pass_salah', 'gagal');
                redirect('login');
            }
        } else {
            // user tdk ada
            $this->session->set_flashdata('pass_user_salah', 'gagal');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        redirect('login');
    }

    public function ubah_pass()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('ubah_pass', 'sukses');
        redirect('login');
    }
}
