<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Prestasi Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_prestasi->findUser(['email' => $this->session->userdata('email')]),
            'prestasiAll' => $this->Model_administrator_prestasi->getAllPrestasi()
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/prestasi_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function tambah_prestasi()
    {
        $data = [
            'title' => 'Tambah Data Prestasi Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_prestasi->findUser(['email' => $this->session->userdata('email')])
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/prestasi_tambah', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {
            $judul = $this->input->post('judul');
            $detail_prestasi = $this->input->post('detail_prestasi');

            if ($this->input->post('check_default_image') == 'true') {

                $dataTambah = [
                    'judul' => $judul,
                    'detail_prestasi' => $detail_prestasi,
                    'foto' => NULL,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ];
                $this->Model_administrator_prestasi->tambahDataPrestasi($dataTambah);
                $this->session->set_flashdata('flash', 'tambah-berhasil');
                redirect(base_url('administrator/prestasi'));
            } else {

                $config['upload_path'] = './uploads/prestasi/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $dataTambah = [
                        'judul' => $judul,
                        'detail_prestasi' => $detail_prestasi,
                        'foto' => $foto,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => NULL
                    ];

                    $this->Model_administrator_prestasi->tambahDataPrestasi($dataTambah);
                    $this->session->set_flashdata('flash', 'tambah-berhasil');
                    redirect(base_url('administrator/prestasi'));
                } elseif ($this->upload->data('file_type') == '') {
                    $dataTambah = [
                        'judul' => $judul,
                        'detail_prestasi' => $detail_prestasi,
                        'foto' => NULL,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => NULL
                    ];
                    $this->Model_administrator_prestasi->tambahDataPrestasi($dataTambah);
                    $this->session->set_flashdata('flash', 'tambah-berhasil');
                    redirect(base_url('administrator/prestasi'));
                } else {
                    $this->session->set_flashdata('flash', 'tambah-gagal');
                    redirect(base_url('administrator/prestasi'));
                }
                $this->session->set_flashdata('flash', 'tambah-gagal');
                redirect(base_url('administrator/prestasi'));
            }
        }
    }

    public function detail_prestasi($id = false)
    {
        if ($id == false) {
            redirect(base_url('administrator/prestasi'));
        }

        $data = [
            'title' => 'Detail Prestasi Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_prestasi->findUser(['email' => $this->session->userdata('email')]),
            'prestasi' => $this->Model_administrator_prestasi->getPrestasiData(['id' => $id])
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/prestasi_detail', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function edit_prestasi($id = false)
    {
        if ($id == false) {
            redirect(base_url('administrator/prestasi'));
        }
        $data = [
            'title' => 'Edit Data Prestasi Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_prestasi->findUser(['email' => $this->session->userdata('email')]),
            'prestasi' => $this->Model_administrator_prestasi->getPrestasiData(['id' => $id])
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/prestasi_edit', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {
            $judul = $this->input->post('judul');
            $detail_prestasi = $this->input->post('detail_prestasi');

            if ($this->input->post('check_default_image') == 'true') {
                $dataEdit = [
                    'judul' => $judul,
                    'detail_prestasi' => $detail_prestasi,
                    'foto' => NULL,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $foto_lama = $data['prestasi']['foto'];
                if (!is_null($foto_lama)) {
                    unlink(FCPATH . 'uploads/prestasi/' . $foto_lama);
                }

                $this->Model_administrator_prestasi->editDataPrestasi(['id' => $id], $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('administrator/prestasi'));
            } else {
                $config['upload_path'] = './uploads/prestasi/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $foto_lama = $data['prestasi']['foto'];
                    if (!is_null($foto_lama)) {
                        unlink(FCPATH . 'uploads/prestasi/' . $foto_lama);
                    }

                    $foto_baru = $this->upload->data('file_name');
                    $dataEdit = [
                        'judul' => $judul,
                        'detail_prestasi' => $detail_prestasi,
                        'foto' => $foto_baru,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];

                    $this->Model_administrator_prestasi->editDataPrestasi(['id' => $id], $dataEdit);
                    $this->session->set_flashdata('flash', 'ubah-berhasil');
                    redirect(base_url('administrator/prestasi'));
                } elseif ($this->upload->data('file_type') == '') {
                    $dataEdit = [
                        'judul' => $judul,
                        'detail_prestasi' => $detail_prestasi,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    $this->Model_administrator_prestasi->editDataPrestasi(['id' => $id], $dataEdit);
                    $this->session->set_flashdata('flash', 'ubah-berhasil');
                    redirect(base_url('administrator/prestasi'));
                } else {
                    $this->session->set_flashdata('flash', 'ubah-gagal');
                    redirect(base_url('administrator/prestasi'));
                }
                $this->session->set_flashdata('flash', 'ubah-gagal');
                redirect(base_url('administrator/prestasi'));
            }
        }
    }

    public function hapus_prestasi()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'hapus-gagal');
            redirect(base_url('administrator/prestasi'));
        } else {
            $id = $this->input->post('id');
            $foto = $this->input->post('foto');
            if (!is_null($foto)) {
                unlink(FCPATH . 'uploads/prestasi/' . $foto);
            }
            $this->Model_administrator_prestasi->hapusDataPrestasi(['id' => $id]);
            $this->session->set_flashdata('flash', 'hapus-berhasil');
            redirect(base_url('administrator/prestasi'));
        }
    }
}
