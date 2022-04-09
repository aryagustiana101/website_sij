<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Berita Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_berita->findUser(['email' => $this->session->userdata('email')]),
            'beritaAll' => $this->Model_administrator_berita->getAllBerita()
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/berita_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function tambah_berita()
    {
        $data = [
            'title' => 'Tambah Data Berita Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_berita->findUser(['email' => $this->session->userdata('email')])
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis Berita', 'trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/berita_tambah', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {
            $judul = $this->input->post('judul');
            $penulis = $this->input->post('penulis');
            if ($penulis == '') {
                $penulis = $data['user']['nama'];
            }
            $isi_berita = $this->input->post('isi_berita');

            if ($this->input->post('check_default_image') == 'true') {
                $dataTambah = [
                    'judul' => $judul,
                    'isi_berita' => $isi_berita,
                    'gambar' => NULL,
                    'penulis' => $penulis,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ];

                $this->Model_administrator_berita->tambahDataBerita($dataTambah);
                $this->session->set_flashdata('flash', 'tambah-berhasil');
                redirect(base_url('administrator/berita'));
            } else {
                $config['upload_path'] = './uploads/berita/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    $dataTambah = [
                        'judul' => $judul,
                        'isi_berita' => $isi_berita,
                        'gambar' => $gambar,
                        'penulis' => $penulis,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => NULL
                    ];

                    $this->Model_administrator_berita->tambahDataBerita($dataTambah);
                    $this->session->set_flashdata('flash', 'tambah-berhasil');
                    redirect(base_url('administrator/berita'));
                } elseif ($this->upload->data('file_type') == '') {
                    $dataTambah = [
                        'judul' => $judul,
                        'isi_berita' => $isi_berita,
                        'gambar' => NULL,
                        'penulis' => $penulis,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => NULL
                    ];
                    $this->Model_administrator_berita->tambahDataBerita($dataTambah);
                    $this->session->set_flashdata('flash', 'tambah-berhasil');
                    redirect(base_url('administrator/berita'));
                } else {
                    $this->session->set_flashdata('flash', 'tambah-gagal');
                    redirect(base_url('administrator/berita'));
                }
                $this->session->set_flashdata('flash', 'tambah-gagal');
                redirect(base_url('administrator/berita'));
            }
        }
    }

    public function detail_berita($idBerita = false)
    {
        if ($idBerita == false) {
            redirect(base_url('administrator/berita'));
        }

        $data = [
            'title' => 'Detail Berita Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_berita->findUser(['email' => $this->session->userdata('email')]),
            'berita' => $this->Model_administrator_berita->getBeritaData(['id' => $idBerita])
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/berita_detail', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function edit_berita($idBerita = false)
    {
        if ($idBerita == false) {
            redirect(base_url('administrator/berita'));
        }
        $data = [
            'title' => 'Edit Data Berita Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_berita->findUser(['email' => $this->session->userdata('email')]),
            'berita' => $this->Model_administrator_berita->getBeritaData(['id' => $idBerita])
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis Berita', 'trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/berita_edit', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {
            $judul = $this->input->post('judul');
            $penulis = $this->input->post('penulis');
            if ($penulis == '') {
                $penulis = $data['user']['nama'];
            }
            $isi_berita = $this->input->post('isi_berita');

            if ($this->input->post('check_default_image') == 'true') {
                $dataEdit = [
                    'judul' => $judul,
                    'isi_berita' => $isi_berita,
                    'gambar' => NULL,
                    'penulis' => $penulis,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $gambar_lama = $data['berita']['gambar'];
                if (!is_null($gambar_lama)) {
                    unlink(FCPATH . 'uploads/berita/' . $gambar_lama);
                }

                $this->Model_administrator_berita->editDataBerita(['id' => $idBerita], $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('administrator/berita'));
            } else {
                $config['upload_path'] = './uploads/berita/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['berita']['gambar'];
                    if (!is_null($gambar_lama)) {
                        unlink(FCPATH . 'uploads/berita/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $dataEdit = [
                        'judul' => $judul,
                        'isi_berita' => $isi_berita,
                        'gambar' => $gambar_baru,
                        'penulis' => $penulis,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];

                    $this->Model_administrator_berita->editDataBerita(['id' => $idBerita], $dataEdit);
                    $this->session->set_flashdata('flash', 'ubah-berhasil');
                    redirect(base_url('administrator/berita'));
                } elseif ($this->upload->data('file_type') == '') {
                    $dataEdit = [
                        'judul' => $judul,
                        'isi_berita' => $isi_berita,
                        'penulis' => $penulis,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    $this->Model_administrator_berita->editDataBerita(['id' => $idBerita], $dataEdit);
                    $this->session->set_flashdata('flash', 'ubah-berhasil');
                    redirect(base_url('administrator/berita'));
                } else {
                    $this->session->set_flashdata('flash', 'ubah-gagal');
                    redirect(base_url('administrator/berita'));
                }
                $this->session->set_flashdata('flash', 'ubah-gagal');
                redirect(base_url('administrator/berita'));
            }
        }
    }

    public function hapus_berita()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'hapus-gagal');
            redirect(base_url('administrator/berita'));
        } else {
            $id = $this->input->post('id');
            $gambar = $this->input->post('gambar');
            if (!is_null($gambar)) {
                unlink(FCPATH . 'uploads/berita/' . $gambar);
            }
            $this->Model_administrator_berita->hapusDataBerita(['id' => $id]);
            $this->session->set_flashdata('flash', 'hapus-berhasil');
            redirect(base_url('administrator/berita'));
        }
    }
}
