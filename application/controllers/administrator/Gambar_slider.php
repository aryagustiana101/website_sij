<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambar_slider extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Gambar Slider Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_gambar_slider->findUser(['email' => $this->session->userdata('email')]),
            'gambarSliderAll' => $this->Model_administrator_gambar_slider->getAllGambarSlider()
        ];
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/gambar_slider_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function tambah_gambar_slider()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'tambah-gagal');
            redirect(base_url('administrator/gambar_slider'));
        } else {
            $judul = $this->input->post('judul');

            $config['upload_path'] = './uploads/gambar_slider/';
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
                $this->Model_administrator_gambar_slider->tambahDataGambarSlider($dataTambah);
                $this->session->set_flashdata('flash', 'tambah-berhasil');
                redirect(base_url('administrator/gambar_slider'));
            } else {
                $this->session->set_flashdata('flash', 'tambah-gagal');
                redirect(base_url('administrator/gambar_slider'));
            }
            $this->session->set_flashdata('flash', 'tambah-gagal');
            redirect(base_url('administrator/gambar_slider'));
        }
    }

    public function edit_gambar_slider()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('gambar', 'Gambar', 'trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('administrator/gambar_slider'));
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');

            $config['upload_path'] = './uploads/gambar_slider/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $gambar_lama = $this->input->post('gambar_lama');
                unlink(FCPATH . 'uploads/gambar_slider/' . $gambar_lama);

                $gambar_baru = $this->upload->data('file_name');
                $dataEdit = [
                    'judul' => $judul,
                    'gambar' => $gambar_baru,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $this->Model_administrator_gambar_slider->editDataGambarSlider(['id' => $id], $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('administrator/gambar_slider'));
            } else {
                $this->session->set_flashdata('flash', 'ubah-gagal');
                redirect(base_url('administrator/gambar_slider'));
            }
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('administrator/gambar_slider'));
        }
    }

    public function hapus_gambar_slider()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'hapus-gagal');
            redirect(base_url('administrator/gambar_slider'));
        } else {
            $id = $this->input->post('id');
            $gambar = $this->input->post('gambar');

            unlink(FCPATH . 'uploads/gambar_slider/' . $gambar);

            $this->Model_administrator_gambar_slider->hapusDataGambarSlider(['id' => $id]);
            $this->session->set_flashdata('flash', 'hapus-berhasil');
            redirect(base_url('administrator/gambar_slider'));
        }
    }
}
