<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['user']   = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard Admin';
        $data['judul'] = 'Welcome to SIGDS Dashboard';
        return $this->load->view('admin/index', $data);
    }

    public function json()
    {
        $this->load->library('datatables');
        $this->datatables->select('id_admin, image, name, username');
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
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|alpha|min_length[3]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]|alpha_numeric|min_length[3]');

        $this->form_validation->set_message('required', '%s tidak boleh kosong !');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar !');
        $this->form_validation->set_message('alpha', '%s harus huruf !');
        $this->form_validation->set_message('alpha_numeric', '%s hanya dapat menggunakan angka & huruf!');
        $this->form_validation->set_message('min_length', '%s terlalu pendek (minimal 3 karakter)');

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
        $id = $this->input->post('id');
        // get previous username
        $original_username = $this->db->get_where('admin', ['id_admin' => $id])->row_array()['username'];

        if ($this->input->post('edit_username') != $original_username) {
            $is_unique =  '|is_unique[admin.username]';
        } else {
            $is_unique =  '';
        }

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('id', 'ID_ADMIN', 'required|trim');
        $this->form_validation->set_rules('edit_nama', 'Nama', 'required|trim|alpha|min_length[3]');
        $this->form_validation->set_rules('edit_username', 'Username', 'required|trim|alpha_numeric|min_length[3]' . $is_unique);

        $this->form_validation->set_message('required', '%s tidak boleh kosong !');
        $this->form_validation->set_message('alpha', '%s harus huruf !');
        $this->form_validation->set_message('is_unique', '%s sudah ada !');
        $this->form_validation->set_message('alpha_numeric', '%s hanya dapat menggunakan angka & huruf!');
        $this->form_validation->set_message('min_length', '%s terlalu pendek (minimal 3 karakter)');

        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error'   => true,
                'id' => form_error('id'),
                'nama' => form_error('edit_nama'),
                'username' => form_error('edit_username')
            );
            echo json_encode($array);
        } else {
            $gambar = $_FILES['edit_image']['tmp_name'];

            $handler = [];
            // jika ada gambar yang mau di upload
            if (file_exists($gambar)) {
                if ($this->ubah_image() != 1) {
                    $handler['error_image'] = $this->ubah_image();
                } else {
                    $handler['error_image'] = 0;
                }
            }

            $id = $this->input->post('id');
            $nama = $this->input->post('edit_nama');
            $username = $this->input->post('edit_username');

            $data = [
                "name" => $nama,
                "username" => $username
            ];

            // update data
            $update = $this->db->update('admin', $data, array('id_admin' => $id));
            $handler['edit'] = $update;
            echo json_encode($handler);
        }
    }


    public function deleteAdmin()
    {
        $id = $this->input->post('id');

        $q = $this->db->delete('admin', array('id_admin' => $id));
        echo json_encode($this->db->affected_rows());
    }


    public function ubah_image()
    {
        //name dari form edit
        $inputfile = 'edit_image';
        $id_admin = $this->input->post('id');
        $prevImage = $this->db->get_where('admin', ['id_admin' => $id_admin])->result_array()[0]['image'];


        // delete previous image
        if ($prevImage != 'default.jpg') {
            // $this->ftp->delete_file(base_url('assets/img/admin/') . $prevImage);
            unlink(FCPATH . 'assets/img/admin/' . $prevImage);
        }
        // }
        // PATH IMAGE DISIMPAN
        $config['upload_path'] = './assets/img/admin/';
        // $config['file_name'] = 'admin-' . $username;
        $config['file_ext_tolower'] = TRUE;

        //menggantikan image lama dengan image baru agar tdk ada penumpukan 
        $config['overwrite'] = TRUE;

        $config['encrypt_name']     = TRUE;
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = '1024';
        $config['max_width']        = '1024';
        $config['max_height']       = '1024';

        $this->load->library('upload', $config);

        // jika upload gagal
        if (!$this->upload->do_upload($inputfile)) {
            return $this->upload->display_errors('', '');
        } else {
            // lakukan update nama file ke table admin
            $namaBaru = $this->upload->data('file_name');
            $this->db->update('admin', ["image" => $namaBaru], array('id_admin' => $id_admin));
            return $this->db->affected_rows();
        }
    }
}
