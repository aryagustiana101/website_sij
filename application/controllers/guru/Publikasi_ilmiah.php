<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publikasi_ilmiah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_guru();
    }

    public function index()
    {
        $data = [
            'title' => 'Publikasi Ilmiah Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_guru_publikasi_ilmiah->findUser(['email' => $this->session->userdata('email')]),
            'publikasiIlmiahAll' => $this->Model_guru_publikasi_ilmiah->getAllPublikasiIlmiahUser(['email_user' => $this->session->userdata('email')])
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_guru', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/guru/publikasi_ilmiah_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function tambah_publikasi_ilmiah()
    {
        $data = [
            'title' => 'Tambah Data Publikasi Ilmiah Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_guru_publikasi_ilmiah->findUser(['email' => $this->session->userdata('email')])
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('nama_penulis', 'Nama Penulis', 'trim');
        $this->form_validation->set_rules('level_penulis', 'Level Penulis', 'trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'tambah-gagal');
            redirect(base_url('guru/publikasi_ilmiah'));
        } else {
            $judul = $this->input->post('judul');
            $nama_penulis = $data['user']['nama'];
            $level_penulis = $data['user']['role'];

            $config['upload_path'] = './uploads/publikasi_ilmiah/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '100000';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_publikasi_ilmiah')) {
                $file_publikasi_ilmiah = $this->upload->data('file_name');

                $dataTambah = [
                    'judul' => $judul,
                    'file_publikasi_ilmiah' => $file_publikasi_ilmiah,
                    'nama_penulis' => $nama_penulis,
                    'level_penulis' => $level_penulis,
                    'email_user' => $this->session->userdata('email'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ];

                $this->Model_guru_publikasi_ilmiah->tambahDataPublikasiIlmiah($dataTambah);
                $this->session->set_flashdata('flash', 'tambah-berhasil');
                redirect(base_url('guru/publikasi_ilmiah'));
            } else {
                $this->session->set_flashdata('flash', 'tambah-gagal');
                redirect(base_url('guru/publikasi_ilmiah'));
            }
            $this->session->set_flashdata('flash', 'tambah-gagal');
            redirect(base_url('guru/publikasi_ilmiah'));
        }
    }

    public function detail_publikasi_ilmiah($id = false)
    {
        if ($id == false) {
            redirect(base_url('guru/publikasi_ilmiah'));
        }

        $data = [
            'title' => 'Detail Publikasi Ilmiah Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_guru_publikasi_ilmiah->findUser(['email' => $this->session->userdata('email')]),
            'publikasiIlmiah' => $this->Model_guru_publikasi_ilmiah->getPublikasiIlmiahData(['id' => $id])
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_guru', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/guru/publikasi_ilmiah_detail', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function edit_publikasi_ilmiah()
    {
        $data = [
            'user' => $this->Model_guru_publikasi_ilmiah->findUser(['email' => $this->session->userdata('email')])
        ];

        $this->form_validation->set_rules('id', 'Id', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('nama_penulis', 'Nama Penulis', 'trim');
        $this->form_validation->set_rules('level_penulis', 'Level Penulis', 'trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('guru/publikasi_ilmiah'));
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $nama_penulis = $data['user']['nama'];
            $level_penulis = $data['user']['role'];

            $config['upload_path'] = './uploads/publikasi_ilmiah/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '100000';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_publikasi_ilmiah')) {

                $file_publikasi_ilmiah_lama  = $this->input->post('file_publikasi_ilmiah_lama');
                if (!is_null($file_publikasi_ilmiah_lama)) {
                    unlink(FCPATH . 'uploads/publikasi_ilmiah/' . $file_publikasi_ilmiah_lama);
                }

                $file_publikasi_ilmiah_baru = $this->upload->data('file_name');
                $dataEdit = [
                    'judul' => $judul,
                    'file_publikasi_ilmiah' => $file_publikasi_ilmiah_baru,
                    'nama_penulis' => $nama_penulis,
                    'level_penulis' => $level_penulis,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $this->Model_guru_publikasi_ilmiah->editDataPublikasiIlmiah(['id' => $id], $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('guru/publikasi_ilmiah'));
            } elseif ($this->upload->data('file_type') == '') {
                $dataEdit = [
                    'judul' => $judul,
                    'nama_penulis' => $nama_penulis,
                    'level_penulis' => $level_penulis,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $this->Model_guru_publikasi_ilmiah->editDataPublikasiIlmiah(['id' => $id], $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('guru/publikasi_ilmiah'));
            } else {
                $this->session->set_flashdata('flash', 'ubah-gagal');
                redirect(base_url('guru/publikasi_ilmiah'));
            }
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('guru/publikasi_ilmiah'));
        }
    }

    public function hapus_publikasi_ilmiah()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'hapus-gagal');
            redirect(base_url('guru/publikasi_ilmiah'));
        } else {
            $id = $this->input->post('id');
            $file_publikasi_ilmiah = $this->input->post('file_publikasi_ilmiah');
            if (!is_null($file_publikasi_ilmiah)) {
                unlink(FCPATH . 'uploads/publikasi_ilmiah/' . $file_publikasi_ilmiah);
            }
            $this->Model_guru_publikasi_ilmiah->hapusDataPublikasiIlmiah(['id' => $id]);
            $this->session->set_flashdata('flash', 'hapus-berhasil');
            redirect(base_url('guru/publikasi_ilmiah'));
        }
    }
}
