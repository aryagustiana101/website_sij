<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Agenda Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_agenda->findUser(['email' => $this->session->userdata('email')]),
            'agendaAll' => $this->Model_administrator_agenda->getAllAgenda()
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/agenda_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function tambah_agenda()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        $this->form_validation->set_rules('waktu_mulai', 'waktu_mulai', 'required|trim');
        $this->form_validation->set_rules('waktu_selesai', 'waktu_selesai', 'trim');
        $this->form_validation->set_rules('detail', 'Detail', 'trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'tambah-gagal');
            redirect(base_url('administrator/agenda'));
        } else {
            $judul = $this->input->post('judul');
            $lokasi = $this->input->post('lokasi');
            $tanggal = $this->input->post('tanggal');
            $waktu_mulai = $this->input->post('waktu_mulai');
            $waktu_selesai = $this->input->post('waktu_selesai');
            if ($waktu_selesai == '') {
                $waktu_selesai = NULL;
            }
            $detail = $this->input->post('detail');
            if ($detail == '') {
                $detail = NULL;
            }
            $dataTambah = [
                'judul' => $judul,
                'tanggal' => $tanggal,
                'waktu_mulai' => $waktu_mulai,
                'waktu_selesai' => $waktu_selesai,
                'lokasi' => $lokasi,
                'detail' => $detail
            ];
            $this->Model_administrator_agenda->tambahDataAgenda($dataTambah);
            $this->session->set_flashdata('flash', 'tambah-berhasil');
            redirect(base_url('administrator/agenda'));
        }
    }

    public function edit_agenda()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        $this->form_validation->set_rules('waktu_mulai', 'waktu_mulai', 'required|trim');
        $this->form_validation->set_rules('waktu_selesai', 'waktu_selesai', 'trim');
        $this->form_validation->set_rules('detail', 'Detail', 'trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('administrator/agenda'));
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $lokasi = $this->input->post('lokasi');
            $tanggal = $this->input->post('tanggal');
            $waktu_mulai = $this->input->post('waktu_mulai');
            $waktu_selesai = $this->input->post('waktu_selesai');
            if ($waktu_selesai == '') {
                $waktu_selesai = NULL;
            }
            $detail = $this->input->post('detail');
            if ($detail == '') {
                $detail = NULL;
            }
            $dataEdit = [
                'judul' => $judul,
                'tanggal' => $tanggal,
                'waktu_mulai' => $waktu_mulai,
                'waktu_selesai' => $waktu_selesai,
                'lokasi' => $lokasi,
                'detail' => $detail
            ];
            $this->Model_administrator_agenda->editDataAgenda(['id' => $id], $dataEdit);
            $this->session->set_flashdata('flash', 'ubah-berhasil');
            redirect(base_url('administrator/agenda'));
        }
    }

    public function hapus_agenda()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'hapus-gagal');
            redirect(base_url('administrator/agenda'));
        } else {
            $id = $this->input->post('id');
            $this->Model_administrator_agenda->hapusDataAgenda(['id' => $id]);
            $this->session->set_flashdata('flash', 'hapus-berhasil');
            redirect(base_url('administrator/agenda'));
        }
    }
}
