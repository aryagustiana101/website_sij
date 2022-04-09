<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_berita extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function getAllBerita()
    {
        return $this->db->get('berita')->result_array();
    }

    public function tambahDataBerita($dataTambah)
    {
        $this->db->insert('berita', $dataTambah);
    }

    public function getBeritaData($id)
    {
        return $this->db->get_where('berita', $id)->row_array();
    }

    public function hapusDataBerita($id)
    {
        $this->db->where($id);
        $this->db->delete('berita');
    }

    public function editDataBerita($id, $dataEdit)
    {
        $this->db->where($id);
        $this->db->update('berita', $dataEdit);
    }
}
