<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_galeri_foto extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function getAllGaleriFoto()
    {
        return $this->db->get('galeri_foto')->result_array();
    }

    public function tambahDataGaleriFoto($dataTambah)
    {
        $this->db->insert('galeri_foto', $dataTambah);
    }

    public function editDataGaleriFoto($id, $dataEdit)
    {
        $this->db->where($id);
        $this->db->update('galeri_foto', $dataEdit);
    }

    public function hapusDataGaleriFoto($id)
    {
        $this->db->where($id);
        $this->db->delete('galeri_foto');
    }
}
