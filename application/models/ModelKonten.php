<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelKonten extends CI_Model
{
    public function getPeraturan()
    {
        return $this->db->get_where('konten', ['id_konten' => 1])->result();
    }
    public function getVisi()
    {
        return $this->db->get_where('konten', ['id_konten' => 2])->result();
    }
    public function getMisi()
    {
        return $this->db->get_where('konten', ['id_konten' => 3])->result();
    }
    public function getSejarah()
    {
        return $this->db->get_where('konten', ['id_konten' => 4])->result();
    }
}

/* End of file ModelKonten.php */