<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelKonten', 'konten');
        $this->load->library('form_validation');
    }


    public function peraturan()
    {
        $this->form_validation->set_rules('peraturan', 'Peraturan', 'required|trim', [
            'required' => 'harus di isi!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard Admin';
            $data['judul'] = 'Konten / Peraturan';
            $data['peraturan'] = $this->konten->getPeraturan();
            $this->load->view('admin/peraturan', $data);
        } else {
            $id = $this->input->post('id_konten');
            $data = [
                'isi' => $this->input->post('peraturan')
            ];
            $this->db->where('id_konten', $id);
            $this->db->update('konten', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Peraturan berhasil disimpan</div>');
            redirect('konten/peraturan');
        }
    }
    public function sejarah()
    {
        $this->form_validation->set_rules('sejarah', 'Sejarah', 'required|trim', [
            'required' => 'harus di isi!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard Admin';
            $data['judul'] = 'Konten / Sejarah';
            $data['sejarah'] = $this->konten->getSejarah();
            $this->load->view('admin/sejarah', $data);
        } else {
            $id = $this->input->post('id_konten');
            $data = [
                'isi' => $this->input->post('sejarah')
            ];
            $this->db->where('id_konten', $id);
            $this->db->update('konten', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sejarah berhasil disimpan</div>');
            redirect('konten/sejarah');
        }
    }
    public function visimisi()
    {
        $this->form_validation->set_rules('visi', 'Visi', 'required|trim', [
            'required' => 'harus di isi!',
        ]);
        $this->form_validation->set_rules('misi', 'Misi', 'required|trim', [
            'required' => 'harus di isi!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard Admin';
            $data['judul'] = 'Konten / Visi & Misi';
            $data['visi'] = $this->konten->getVisi();
            $data['misi'] = $this->konten->getMisi();
            $this->load->view('admin/visimisi', $data);
        } else {
            $id_visi = $this->input->post('id_konten_visi');
            $id_misi = $this->input->post('id_konten_misi');
            $data_visi = [
                'isi' => $this->input->post('visi')
            ];
            $data_misi = [
                'isi' => $this->input->post('misi')
            ];
            $this->db->where('id_konten', $id_visi);
            $this->db->update('konten', $data_visi);

            $this->db->where('id_konten', $id_misi);
            $this->db->update('konten', $data_misi);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Visi & Misi berhasil disimpan</div>');
            redirect('konten/visimisi');
        }
    }
}