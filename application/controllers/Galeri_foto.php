<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_foto extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Galeri Foto Website SIJ - SMK Negeri 1 Garut',
            'uriSegment' => $this->uri->segment(1),
            'galeriFotoAll' => $this->Model_galeri_foto->getAllGaleriFoto()
        ];
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/navbar', $data);
        $this->load->view('frontend/galeri_foto_index', $data);
        $this->load->view('frontend/templates/footer', $data);
    }
}
