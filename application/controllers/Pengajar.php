<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengajar Website SIJ - SMK Negeri 1 Garut',
            'uriSegment' => $this->uri->segment(1),
            'pengajarAll' => $this->Model_pengajar->getAllPengajar(),
        ];
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/navbar', $data);
        $this->load->view('frontend/pengajar_index', $data);
        $this->load->view('frontend/templates/footer', $data);
    }
}
