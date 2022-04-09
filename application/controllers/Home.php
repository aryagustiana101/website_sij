<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home Website SIJ - SMK Negeri 1 Garut',
            'uriSegment' => $this->uri->segment(1),
            'gambarSliderAll' => $this->Model_home->getAllGambarSlider(),
            'firstGambarSlider' => $this->Model_home->findFirstGambarSilder(),
            'beritaAll' => $this->Model_home->getLimitBerita(),
            'agendaAll' => $this->Model_home->getLimitAgenda(),
            'pengumumanAll' => $this->Model_home->getLimitPengumuman(),
            'sambutan' => $this->Model_home->getSambutan(),
            'galeriFotoAll' => $this->Model_home->getLimitGaleriFoto()
        ];
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/navbar', $data);
        $this->load->view('frontend/home_index', $data);
        $this->load->view('frontend/templates/footer', $data);
    }
}
