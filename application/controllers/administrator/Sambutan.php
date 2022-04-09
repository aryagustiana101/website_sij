<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sambutan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Sambutan Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_sambutan->findUser(['email' => $this->session->userdata('email')]),
            'sambutan' => $this->Model_administrator_sambutan->getSambutan()
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/sambutan_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function edit_sambutan()
    {
        $data = [
            'title' => 'Edit Data Sambutan Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_sambutan->findUser(['email' => $this->session->userdata('email')]),
            'sambutan' => $this->Model_administrator_sambutan->getSambutan()
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/sambutan_edit', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {

            $id = $this->input->post('id');

            $nama = $this->input->post('nama');
            $isi_sambutan = $this->input->post('isi_sambutan');

            $config['upload_path'] = './uploads/profile/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $foto_lama = $this->input->post('foto_lama');
                if (!is_null($foto_lama)) {
                    unlink(FCPATH . 'uploads/profile/' . $foto_lama);
                }

                $foto_baru = $this->upload->data('file_name');

                $dataEdit = [
                    'nama' => $nama,
                    'isi_sambutan' => $isi_sambutan,
                    'foto' => $foto_baru,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $this->Model_administrator_sambutan->editDataSambutan(['id' => $id], $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('administrator/sambutan'));
            } elseif ($this->upload->data('file_type') == '') {
                $dataEdit = [
                    'nama' => $nama,
                    'isi_sambutan' => $isi_sambutan,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $this->Model_administrator_sambutan->editDataSambutan(['id' => $id], $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('administrator/sambutan'));
            } else {
                $this->session->set_flashdata('flash', 'ubah-gagal');
                redirect(base_url('administrator/sambutan'));
            }
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('administrator/sambutan'));
        }
    }
}
