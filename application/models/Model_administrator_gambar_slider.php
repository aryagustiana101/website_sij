<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_gambar_slider extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function getAllGambarSlider()
    {
        return $this->db->get('gambar_slider')->result_array();
    }

    public function tambahDataGambarSlider($dataTambah)
    {
        $this->db->insert('gambar_slider', $dataTambah);
    }

    public function editDataGambarSlider($id, $dataEdit)
    {
        $this->db->where($id);
        $this->db->update('gambar_slider', $dataEdit);
    }

    public function hapusDataGambarSlider($id)
    {
        $this->db->where($id);
        $this->db->delete('gambar_slider');
    }
}
