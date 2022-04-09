<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_sambutan extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function getSambutan()
    {
        return $this->db->get('sambutan')->row_array();
    }

    public function editDataSambutan($id, $dataEdit)
    {
        $this->db->where($id);
        $this->db->update('sambutan', $dataEdit);
    }
}
