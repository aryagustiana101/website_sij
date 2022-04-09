<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_publikasi_ilmiah extends CI_Model
{
    public function getAllPublikasiIlmiah()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('publikasi_ilmiah')->result_array();
    }

    public function getPublikasiIlmiahData($id)
    {
        return $this->db->get_where('publikasi_ilmiah', $id)->row_array();
    }
}
