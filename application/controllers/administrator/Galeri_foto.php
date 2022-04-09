<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_foto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Galeri Foto Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_galeri_foto->findUser(['email' => $this->session->userdata('email')]),
            'galeriFotoAll' => $this->Model_administrator_galeri_foto->getAllGaleriFoto()
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/galeri_foto_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function tambah_galeri_foto()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'tambah-gagal');
            redirect(base_url('administrator/galeri_foto'));
        } else {
            $judul = $this->input->post('judul');

            $config['upload_path'] = './uploads/galeri_foto/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
                $dataTambah = [
                    'judul' => $judul,
                    'gambar' => $gambar,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ];
                $this->Model_administrator_galeri_foto->tambahDataGaleriFoto($dataTambah);
                $this->session->set_flashdata('flash', 'tambah-berhasil');
                redirect(base_url('administrator/galeri_foto'));
            } else {
                $this->session->set_flashdata('flash', 'tambah-gagal');
                redirect(base_url('administrator/galeri_foto'));
            }
            $this->session->set_flashdata('flash', 'tambah-gagal');
            redirect(base_url('administrator/galeri_foto'));
        }
    }

    public function edit_galeri_foto()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('gambar', 'Gambar', 'trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('administrator/galeri_foto'));
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');

            $config['upload_path'] = './uploads/galeri_foto/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $gambar_lama = $this->input->post('gambar_lama');
                unlink(FCPATH . 'uploads/galeri_foto/' . $gambar_lama);

                $gambar_baru = $this->upload->data('file_name');
                $dataEdit = [
                    'judul' => $judul,
                    'gambar' => $gambar_baru,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $this->Model_administrator_galeri_foto->editDataGaleriFoto(['id' => $id], $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('administrator/galeri_foto'));
            } else {
                $this->session->set_flashdata('flash', 'ubah-gagal');
                redirect(base_url('administrator/galeri_foto'));
            }
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('administrator/galeri_foto'));
        }
    }

    public function hapus_galeri_foto()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'hapus-gagal');
            redirect(base_url('administrator/galeri_foto'));
        } else {
            $id = $this->input->post('id');
            $gambar = $this->input->post('gambar');

            unlink(FCPATH . 'uploads/galeri_foto/' . $gambar);

            $this->Model_administrator_galeri_foto->hapusDataGaleriFoto(['id' => $id]);
            $this->session->set_flashdata('flash', 'hapus-berhasil');
            redirect(base_url('administrator/galeri_foto'));
        }
    }
}
