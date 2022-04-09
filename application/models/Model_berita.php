<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_berita extends CI_Model
{
    public function getAllBerita()
    {
        return $this->db->get('berita')->result_array();
    }

    public function getBeritaData($id)
    {
        return $this->db->get_where('berita', $id)->row_array();
    }

    public function getLimitBerita()
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5);
        return $this->db->get('berita')->result_array();
    }

    public function getPaginationBerita($limit, $start)
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('berita', $limit, $start)->result_array();
    }

    public function jumlahDataBerita()
    {
        return $this->db->count_all('berita');
    }
}
