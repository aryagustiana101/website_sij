<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_pengguna extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }
    public function getPenggunaAll()
    {
        return $this->db->get('user')->result_array();
    }

    public function getPenggunaData($id)
    {
        return $this->db->get_where('user', $id)->row_array();
    }

    public function tambahDataPengguna($dataTambah)
    {
        $this->db->insert('user', $dataTambah);
    }

    public function hapusDataPengguna($penggunaId)
    {
        $this->db->where($penggunaId);
        $this->db->delete('user');
    }

    public function editDataPengguna($email, $dataEdit)
    {
        $this->db->where($email);
        $this->db->update('user', $dataEdit);
    }

    public function ubahEmail($id, $emailBaru)
    {
        $this->db->where($id);
        $this->db->update('user', $emailBaru);
    }
}
