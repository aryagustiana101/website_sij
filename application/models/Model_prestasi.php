<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_prestasi extends CI_Model
{
    public function getAllPrestasi()
    {
        return $this->db->get('prestasi')->result_array();
    }

    public function getPrestasiData($id)
    {
        return $this->db->get_where('prestasi', $id)->row_array();
    }
}
