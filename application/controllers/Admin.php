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


    public function json()
    {
        $this->load->library('datatables');
        $this->datatables->select('id_admin, image, name, username, password');
        $this->datatables->from('admin');
        $this->datatables->add_column(
            'aksi',
            '<a href="javascript:void(0);" class="edit_admin btn btn-sm btn-primary" data-id="$1">Edit
            <i class="fas fa-edit"></i></a> 
             
            <a href="javascript:void(0);" class="hapus_admin btn btn-sm btn-danger" data-id="$1">Hapus 
            <i class="fas fa-trash"></i></a>',
            'id_admin'
        );
        return print_r($this->datatables->generate());
    }

    public function insertAdmin()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]');

        $this->form_validation->set_message('required', '%s tidak boleh kosong !');
        $this->form_validation->set_message('is_unique', '%s sudah ada !');

        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error'   => true,
                'nama' => form_error('nama'),
                'username' => form_error('username')
            );
            echo json_encode($array);
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');

            $data = [
                "name" => $nama,
                "username" => $username,
                // default password 1234
                "password" => password_hash("1234", PASSWORD_DEFAULT),
                "image" => "default.jpg"
            ];

            // insert data admin
            $this->db->insert('admin', $data);
            echo json_encode($this->db->affected_rows()); // 1 if success
        }
    }


    public function getDataById()
    {
        $id = $this->input->post('id');
        $result = $this->db->select('*')->where('id_admin', $id)->get('admin')->row();
        echo json_encode($result);
    }

    public function editAdmin()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        $this->form_validation->set_message('required', '%s tidak boleh kosong !');
        $this->form_validation->set_message('is_unique', '%s sudah ada !');

        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error'   => true,
                'nama' => form_error('nama'),
                'username' => form_error('username')

            );
            echo json_encode($array);
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');

            $data = [
                "name" => $nama,
                "username" => $username
            ];

            // update data
            $this->db->update('admin', $data, array('id_admin' => $id));
            echo json_encode($this->db->affected_rows());
        }
    }


    public function deleteAdmin()
    {
        $id = $this->input->post('id');

        $q = $this->db->delete('admin', array('id_admin' => $id));
        echo json_encode($this->db->affected_rows());
    }
}
