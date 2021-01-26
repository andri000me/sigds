<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Dashboard Siswa';
        $data['judul'] = 'Welcome to SIGDS Dashboard';
        $this->load->view('siswa/index', $data);
    }

    public function login()
    {
        
    }

    public function myProfile()
    {
        $data['title'] = 'My Profile';
        $data['judul'] = 'My Profile';
        $this->load->view('siswa/myProfile', $data);
    }

    public function history()
    {
        $data['title'] = 'Riwayat Pelanggaran';
        $data['judul'] = 'Riwayat Pelanggaran';
        $this->load->view('siswa/history', $data);
    }
    
    public function changePassword()
    {
        # code...
        $data['title'] = 'Riwayat Pelanggaran';
        $data['judul'] = 'Riwayat Pelanggaran';
        $this->load->view('siswa/history', $data);
    }

}

/* End of file Siswa.php */
