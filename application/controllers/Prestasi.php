<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Prestasi Website SIJ - SMK Negeri 1 Garut',
            'uriSegment' => $this->uri->segment(1),
            'prestasiAll' => $this->Model_prestasi->getAllPrestasi(),
        ];
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/navbar', $data);
        $this->load->view('frontend/prestasi_index', $data);
        $this->load->view('frontend/templates/footer', $data);
    }

    public function detail_prestasi($id = false)
    {
        if ($id == false) {
            redirect(base_url('prestasi'));
        }
        $data = [
            'title' => 'Detail Prestasi Website SIJ - SMK Negeri 1 Garut',
            'uriSegment' => $this->uri->segment(1),
            'prestasi' => $this->Model_prestasi->getPrestasiData(['id' => $id])
        ];
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/navbar', $data);
        $this->load->view('frontend/prestasi_detail', $data);
        $this->load->view('frontend/templates/footer', $data);
    }
}
