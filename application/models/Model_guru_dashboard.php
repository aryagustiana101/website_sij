<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_guru_dashboard extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function jumlahDataPublikasiIlmiahUser($email_user)
    {
        $this->db->where($email_user);
        $this->db->from('publikasi_ilmiah');
        return $this->db->count_all_results();
    }
}
