<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_galeri_foto extends CI_Model
{
    public function getAllGaleriFoto()
    {
        return $this->db->get('galeri_foto')->result_array();
    }
}
