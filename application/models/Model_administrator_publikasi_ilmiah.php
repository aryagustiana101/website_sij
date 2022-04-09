<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_publikasi_ilmiah extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function getAllPublikasiIlmiah()
    {
        return $this->db->get('publikasi_ilmiah')->result_array();
    }

    public function tambahDataPublikasiIlmiah($dataTambah)
    {
        $this->db->insert('publikasi_ilmiah', $dataTambah);
    }

    public function getPublikasiIlmiahData($id)
    {
        return $this->db->get_where('publikasi_ilmiah', $id)->row_array();
    }

    public function hapusDataPublikasiIlmiah($id)
    {
        $this->db->where($id);
        $this->db->delete('publikasi_ilmiah');
    }

    public function editDataPublikasiIlmiah($id, $dataEdit)
    {
        $this->db->where($id);
        $this->db->update('publikasi_ilmiah', $dataEdit);
    }
}
