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
}