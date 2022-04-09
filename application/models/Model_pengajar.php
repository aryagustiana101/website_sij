<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengajar extends CI_Model
{
    public function getAllPengajar()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get_where('user', ['role' => 'Guru'])->result_array();
    }
}
