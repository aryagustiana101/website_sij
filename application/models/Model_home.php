<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_home extends CI_Model
{
    public function getAllGambarSlider()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('gambar_slider')->result_array();
    }

    public function findFirstGambarSilder()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('gambar_slider')->row_array();
    }

    public function getLimitBerita()
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5);
        return $this->db->get('berita')->result_array();
    }

    public function getLimitAgenda()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        return $this->db->get('agenda')->result_array();
    }

    public function getLimitPengumuman()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        return $this->db->get('pengumuman')->result_array();
    }

    public function getSambutan()
    {
        return $this->db->get('sambutan')->row_array();
    }

    public function getLimitGaleriFoto()
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5);
        return $this->db->get('galeri_foto')->result_array();
    }
}
