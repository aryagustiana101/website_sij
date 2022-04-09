<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_pengumuman extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function getAllPengumuman()
    {
        return $this->db->get('pengumuman')->result_array();
    }

    public function tambahDataPengumuman($dataTambah)
    {
        $this->db->insert('pengumuman', $dataTambah);
    }

    public function getPengumumanData($id)
    {
        return $this->db->get_where('pengumuman', $id)->row_array();
    }

    public function hapusDataPengumuman($id)
    {
        $this->db->where($id);
        $this->db->delete('pengumuman');
    }

    public function editDataPengumuman($id, $dataEdit)
    {
        $this->db->where($id);
        $this->db->update('pengumuman', $dataEdit);
    }
}
