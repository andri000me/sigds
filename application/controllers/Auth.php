<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelKonten', 'konten');
    }

    public function index()
    {
        $data['peraturan'] = $this->konten->getPeraturan();
        $data['visi'] = $this->konten->getVisi();
        $data['misi'] = $this->konten->getMisi();
        $data['sejarah'] = $this->konten->getSejarah();
        return $this->load->view('index', $data);
    }

    public function logAdmin()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required',[
            'required'      => 'Username tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required',[
            'required'      => 'Password tidak boleh kosong!'
        ]);
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Admin';
            $this->load->view('auth/logAdmin', $data);
        } else {
            $this->_loginAdmin();
        }
    }

    private function _loginAdmin() {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $user       = $this->db->get_where('admin', ['username' => $username])->row_array();
        
        // Jika user ada
        if ($user) {
            // Cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username'  => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-danger" role="alert">
                Oops! Password salah.
                </div>');
                redirect('auth/logAdmin');
            }
        } else {
            //Tidak ada user
            $this->session->set_flashdata('message', 
            '<div class="alert alert-danger" role="alert">
            Oops! Akun tidak terdaftar.
            </div>');
            redirect('auth/logAdmin');
        }
    }

    public function logGuru()
    {
        $data['title'] = 'Login Guru';
        $this->load->view('auth/logGuru', $data);
    }

    public function logSiswa()
    {
        $data['title'] = 'Login Siswa';
        $this->load->view('auth/logSiswa', $data);
    }

    public function logPetugas()
    {
        $data['title'] = 'Login Petugas';
        $this->load->view('auth/logPetugas', $data);
    }

    public function logoutAdmin()
    {
        $this->session->unset_userdata('username');
        redirect('auth');
    }
}