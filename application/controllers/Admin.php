<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['judul'] = 'Welcome to SIGDS Dashboard';
        return $this->load->view('admin/index', $data);
    }
}