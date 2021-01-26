<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('index');
    }

    public function logAdmin()
    {
        $data['title'] = 'Login Admin';
        $this->load->view('auth/logAdmin', $data);
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
}