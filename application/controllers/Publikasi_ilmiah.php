<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publikasi_ilmiah extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Publikasi Ilmiah Website SIJ - SMK Negeri 1 Garut',
            'uriSegment' => $this->uri->segment(1),
            'publikasiIlmiahAll' => $this->Model_publikasi_ilmiah->getAllPublikasiIlmiah()
        ];
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/navbar', $data);
        $this->load->view('frontend/publikasi_ilmiah_index', $data);
        $this->load->view('frontend/templates/footer', $data);
    }

    public function detail_publikasi_ilmiah($id = false)
    {
        if ($id == false) {
            redirect(base_url('publikasi_ilmiah'));
        }
        $data = [
            'title' => 'Detail Publikasi Ilmiah Website SIJ - SMK Negeri 1 Garut',
            'uriSegment' => $this->uri->segment(1),
            'publikasiIlmiah' => $this->Model_publikasi_ilmiah->getpublikasiIlmiahData(['id' => $id])
        ];
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/navbar', $data);
        $this->load->view('frontend/publikasi_ilmiah_detail', $data);
        $this->load->view('frontend/templates/footer', $data);
    }
}
