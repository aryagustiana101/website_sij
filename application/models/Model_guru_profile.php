<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_guru_profile extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function editDataProfile($email, $dataEdit)
    {
        $this->db->where($email);
        $this->db->update('user', $dataEdit);
    }

    public function ubahEmail($emailLama, $emailBaru)
    {
        $this->db->where(['email' => $emailLama]);
        $this->db->update('user', $emailBaru);
    }

    public function ubahPassword($email, $passwordBaru)
    {
        $this->db->where($email);
        $this->db->update('user', $passwordBaru);
    }
}
