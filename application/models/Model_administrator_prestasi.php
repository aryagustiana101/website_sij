<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_prestasi extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function getAllPrestasi()
    {
        return $this->db->get('prestasi')->result_array();
    }

    public function tambahDataPrestasi($dataTambah)
    {
        $this->db->insert('prestasi', $dataTambah);
    }

    public function getPrestasiData($id)
    {
        return $this->db->get_where('prestasi', $id)->row_array();
    }

    public function hapusDataPrestasi($id)
    {
        $this->db->where($id);
        $this->db->delete('prestasi');
    }

    public function editDataPrestasi($id, $dataEdit)
    {
        $this->db->where($id);
        $this->db->update('prestasi', $dataEdit);
    }
}
