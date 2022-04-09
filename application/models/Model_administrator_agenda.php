<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_agenda extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function getAllAgenda()
    {
        return $this->db->get('agenda')->result_array();
    }

    public function tambahDataAgenda($dataTambah)
    {
        $this->db->insert('agenda', $dataTambah);
    }

    public function hapusDataAgenda($id)
    {
        $this->db->where($id);
        $this->db->delete('agenda');
    }

    public function editDataAgenda($id, $dataEdit)
    {
        $this->db->where($id);
        $this->db->update('agenda', $dataEdit);
    }
}
