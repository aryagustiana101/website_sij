<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_dashboard->findUser(['email' => $this->session->userdata('email')]),
            'jumlahAgenda' => $this->Model_administrator_dashboard->jumlahDataAgenda(),
            'jumlahBerita' => $this->Model_administrator_dashboard->jumlahDataBerita(),
            'jumlahGaleriFoto' => $this->Model_administrator_dashboard->jumlahDataGaleriFoto(),
            'jumlahGambarSlider' => $this->Model_administrator_dashboard->jumlahDataGambarSlider(),
            'jumlahPenggunaGuru' => $this->Model_administrator_dashboard->jumlahDataPenggunaGuru(),
            'jumlahPenggunaAdministrator' => $this->Model_administrator_dashboard->jumlahDataPenggunaAdministrator(),
            'jumlahPengumuman' => $this->Model_administrator_dashboard->jumlahDataPengumuman(),
            'jumlahPrestasi' => $this->Model_administrator_dashboard->jumlahDataPrestasi(),
            'jumlahPublikasiIlmiahGuru' => $this->Model_administrator_dashboard->jumlahDataPublikasiIlmiahGuru(),
            'jumlahPublikasiIlmiahSiswa' => $this->Model_administrator_dashboard->jumlahDataPublikasiIlmiahSiswa(),
            'jumlahPublikasiIlmiahAdministrator' => $this->Model_administrator_dashboard->jumlahDataPublikasiIlmiahAdministrator()
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/dashboard_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }
}
