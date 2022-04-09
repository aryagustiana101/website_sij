<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Pengumuman Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_pengumuman->findUser(['email' => $this->session->userdata('email')]),
            'pengumumanAll' => $this->Model_administrator_pengumuman->getAllPengumuman()
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/pengumuman_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function tambah_pengumuman()
    {
        $data = [
            'title' => 'Tambah Data Pengumuman Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_pengumuman->findUser(['email' => $this->session->userdata('email')])
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/pengumuman_tambah', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {
            $judul = $this->input->post('judul');
            $isi_pengumuman = $this->input->post('isi_pengumuman');

            $dataTambah = [
                'judul' => $judul,
                'isi_pengumuman' => $isi_pengumuman,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => NULL
            ];

            $this->Model_administrator_pengumuman->tambahDataPengumuman($dataTambah);
            $this->session->set_flashdata('flash', 'tambah-berhasil');
            redirect(base_url('administrator/pengumuman'));
        }
    }

    public function detail_pengumuman($id = false)
    {
        if ($id == false) {
            redirect(base_url('administrator/pengumuman'));
        }

        $data = [
            'title' => 'Detail Pengumuman Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_pengumuman->findUser(['email' => $this->session->userdata('email')]),
            'pengumuman' => $this->Model_administrator_pengumuman->getPengumumanData(['id' => $id])
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/pengumuman_detail', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function edit_pengumuman($id = false)
    {
        if ($id == false) {
            redirect(base_url('administrator/berita'));
        }
        $data = [
            'title' => 'Edit Data Pengumuman Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_pengumuman->findUser(['email' => $this->session->userdata('email')]),
            'pengumuman' => $this->Model_administrator_pengumuman->getPengumumanData(['id' => $id])
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/pengumuman_edit', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {
            $judul = $this->input->post('judul');
            $isi_pengumuman = $this->input->post('isi_pengumuman');

            $dataEdit = [
                'judul' => $judul,
                'isi_pengumuman' => $isi_pengumuman,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->Model_administrator_pengumuman->editDataPengumuman(['id' => $id], $dataEdit);
            $this->session->set_flashdata('flash', 'ubah-berhasil');
            redirect(base_url('administrator/pengumuman'));
        }
    }

    public function hapus_pengumuman()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'hapus-gagal');
            redirect(base_url('administrator/pengumuman'));
        } else {
            $id = $this->input->post('id');
            $this->Model_administrator_pengumuman->hapusDataPengumuman(['id' => $id]);
            $this->session->set_flashdata('flash', 'hapus-berhasil');
            redirect(base_url('administrator/pengumuman'));
        }
    }
}
