<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_guru();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_guru_dashboard->findUser(['email' => $this->session->userdata('email')]),
            'jumlahPublikasiIlmiahUser' => $this->Model_guru_dashboard->jumlahDataPublikasiIlmiahUser(['email_user' => $this->session->userdata('email')])
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_guru', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/guru/dashboard_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }
}
