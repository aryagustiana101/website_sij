<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile Pengguna Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_profile->findUser(['email' => $this->session->userdata('email')])
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/profile_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function edit_profile()
    {
        $data = [
            'title' => 'Edit Profile Pengguna Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_profile->findUser(['email' => $this->session->userdata('email')])
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'numeric|trim');
        $this->form_validation->set_rules('mata_pelajaran', 'Mata Pelajaran', 'trim');
        $this->form_validation->set_rules('nik', 'NIK', 'numeric|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim');
        $this->form_validation->set_rules('no_hp', 'No. Handphone', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/profile_edit', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {

            $email = ['email' => $data['user']['email']];

            $nama = $this->input->post('nama');
            $nip = $this->input->post('nip');
            if ($nip == '') {
                $nip = NULL;
            }
            $mata_pelajaran = $this->input->post('mata_pelajaran');
            if ($mata_pelajaran == '') {
                $mata_pelajaran = NULL;
            }
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $nik = $this->input->post('nik');
            if ($nik == '') {
                $nik = NULL;
            }
            $alamat = $this->input->post('alamat');
            if ($alamat == '') {
                $alamat = NULL;
            }
            $no_hp = $this->input->post('no_hp');
            if ($no_hp == '') {
                $no_hp = NULL;
            }

            if ($this->input->post('check_default_image') == 'true') {
                $dataEdit = [
                    'nama' => $nama,
                    'nip' => $nip,
                    'mata_pelajaran' => $mata_pelajaran,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'nik' => $nik,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'foto' => NULL,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $foto_lama = $data['user']['foto'];
                if (!is_null($foto_lama)) {
                    unlink(FCPATH . 'uploads/profile/' . $foto_lama);
                }

                $this->Model_administrator_profile->editDataProfile($email, $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('administrator/profile'));
            } else {
                $config['upload_path'] = './uploads/profile/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $foto_lama = $data['user']['foto'];
                    if (!is_null($foto_lama)) {
                        unlink(FCPATH . 'uploads/profile/' . $foto_lama);
                    }

                    $foto_baru = $this->upload->data('file_name');
                    $dataEdit = [
                        'nama' => $nama,
                        'nip' => $nip,
                        'mata_pelajaran' => $mata_pelajaran,
                        'jenis_kelamin' => $jenis_kelamin,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'nik' => $nik,
                        'alamat' => $alamat,
                        'no_hp' => $no_hp,
                        'foto' => $foto_baru,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];

                    $this->Model_administrator_profile->editDataProfile($email, $dataEdit);
                    $this->session->set_flashdata('flash', 'ubah-berhasil');
                    redirect(base_url('administrator/profile'));
                } elseif ($this->upload->data('file_type') == '') {
                    $dataEdit = [
                        'nama' => $nama,
                        'nip' => $nip,
                        'mata_pelajaran' => $mata_pelajaran,
                        'jenis_kelamin' => $jenis_kelamin,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'nik' => $nik,
                        'alamat' => $alamat,
                        'no_hp' => $no_hp,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    $this->Model_administrator_profile->editDataProfile($email, $dataEdit);
                    $this->session->set_flashdata('flash', 'ubah-berhasil');
                    redirect(base_url('administrator/profile'));
                } else {
                    $this->session->set_flashdata('flash', 'ubah-gagal');
                    redirect(base_url('administrator/profile'));
                }
                $this->session->set_flashdata('flash', 'ubah-gagal');
                redirect(base_url('administrator/profile'));
            }
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('administrator/profile'));
        }
    }

    public function ubah_email()
    {
        $this->form_validation->set_rules('email_baru', 'Email Baru', 'required|trim|valid_email|is_unique[user.email]');

        if ($this->form_validation->run() == false) {
            if (form_error('email_baru') == '<p>The Email Baru field is required.</p>') {
                $this->session->set_flashdata('flash', 'ubah-email-invalid-gagal');
                redirect(base_url('administrator/profile'));
            } elseif (form_error('email_baru') == '<p>The Email Baru field must contain a valid email address.</p>') {
                $this->session->set_flashdata('flash', 'ubah-email-invalid-gagal');
                redirect(base_url('administrator/profile'));
            } elseif (form_error('email_baru') == '<p>The Email Baru field must contain a unique value.</p>') {
                $this->session->set_flashdata('flash', 'ubah-email-dimiliki-gagal');
                redirect(base_url('administrator/profile'));
            }
            $this->session->set_flashdata('flash', 'ubah-email-invalid-gagal');
            redirect(base_url('administrator/profile'));
        } else {
            $emailBaru = $this->input->post('email_baru');
            $user = $this->Model_administrator_profile->findUser(['email' => $this->session->userdata('email')]);
            $this->Model_administrator_profile->ubahEmail($user['email'], ['email' => $emailBaru, 'updated_at' => date('Y-m-d H:i:s')]);
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Email Akun Anda <strong>Berhasil Diubah</strong> Silahkan Login Ulang.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role');
            redirect(base_url('auth'));
        }
    }

    public function ubah_password()
    {
        $data = [
            'title' => 'Ubah Password Pengguna Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_profile->findUser(['email' => $this->session->userdata('email')])
        ];

        $this->form_validation->set_rules('password_saat_ini', 'Password Saat Ini', 'trim|required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|min_length[8]|matches[password_baru_ulangi]');
        $this->form_validation->set_rules('password_baru_ulangi', 'Ulangi Password Baru', 'trim|required|min_length[8]|matches[password_baru]');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/profile_ubah_password', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {
            $email = ['email' => $data['user']['email']];
            $password_saat_ini = $this->input->post('password_saat_ini');
            $password_baru = $this->input->post('password_baru');
            $password_baru_hash = password_hash($password_baru, PASSWORD_DEFAULT);

            if (password_verify($password_saat_ini, $data['user']['password'])) {
                $passwordBaru = [
                    'password' => $password_baru_hash,
                    'password_unhash' => $password_baru,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $this->Model_administrator_profile->ubahPassword($email, $passwordBaru);
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Akun Anda <strong>Berhasil Diubah</strong> Silahkan Login Ulang.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $this->session->unset_userdata('email');
                $this->session->unset_userdata('role');
                redirect(base_url('auth'));
            }
            $this->session->set_flashdata('flash', 'ubah-password-gagal');
            redirect(base_url('administrator/profile/ubah_password'));
        }
    }
}
