<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'Pengguna Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_pengguna->findUser(['email' => $this->session->userdata('email')]),
            'penggunaAll' => $this->Model_administrator_pengguna->getPenggunaAll()
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/pengguna_index', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function detail_pengguna($id)
    {
        $data = [
            'title' => 'Detail Pengguna Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_pengguna->findUser(['email' => $this->session->userdata('email')]),
            'penggunaData' => $this->Model_administrator_pengguna->getPenggunaData(['id' => $id])
        ];

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar_administrator', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/administrator/pengguna_detail', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function tambah_pengguna()
    {
        $data = [
            'title' => 'Tambah Data Pengguna Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_pengguna->findUser(['email' => $this->session->userdata('email')]),
            'penggunaAll' => $this->Model_administrator_pengguna->getPenggunaAll()
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
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
        $this->form_validation->set_rules('role', 'Role', 'trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/pengguna_tambah', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {
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
            $email = $this->input->post('email');
            if ($email == '') {
                $email = strtolower(random_string('alpha', 8)) . '@smknegeri1garut.sch.id';
            }
            $password = $this->input->post('password');
            if ($password == '') {
                $password = strtolower(random_string('alnum', 8));
            }

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $role = $this->input->post('role');
            if (is_null($role)) {
                $role = 'Guru';
            }

            if ($this->input->post('check_default_image') == 'true') {
                $dataTambah = [
                    'nama' => $nama,
                    'nip' => $nip,
                    'mata_pelajaran' => $mata_pelajaran,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'nik' => $nik,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'role' => $role,
                    'password' => $password_hash,
                    'password_unhash' => $password,
                    'password_default' => $password,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                    'foto' => NULL
                ];

                $this->Model_administrator_pengguna->tambahDataPengguna($dataTambah);
                $this->session->set_flashdata('flash', 'tambah-berhasil');
                redirect(base_url('administrator/pengguna'));
            } else {
                $config['upload_path'] = './uploads/profile/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $dataTambah = [
                        'nama' => $nama,
                        'nip' => $nip,
                        'mata_pelajaran' => $mata_pelajaran,
                        'jenis_kelamin' => $jenis_kelamin,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'nik' => $nik,
                        'alamat' => $alamat,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'role' => $role,
                        'password' => $password_hash,
                        'password_unhash' => $password,
                        'password_default' => $password,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => NULL,
                        'deleted_at' => NULL,
                        'foto' => $foto
                    ];

                    $this->Model_administrator_pengguna->tambahDataPengguna($dataTambah);
                    $this->session->set_flashdata('flash', 'tambah-berhasil');
                    redirect(base_url('administrator/pengguna'));
                } elseif ($this->upload->data('file_type') == '') {
                    $dataTambah = [
                        'nama' => $nama,
                        'nip' => $nip,
                        'mata_pelajaran' => $mata_pelajaran,
                        'jenis_kelamin' => $jenis_kelamin,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'nik' => $nik,
                        'alamat' => $alamat,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'role' => $role,
                        'password' => $password_hash,
                        'password_unhash' => $password,
                        'password_default' => $password,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => NULL,
                        'deleted_at' => NULL,
                        'foto' => NULL
                    ];
                    $this->Model_administrator_pengguna->tambahDataPengguna($dataTambah);
                    $this->session->set_flashdata('flash', 'tambah-berhasil');
                    redirect(base_url('administrator/pengguna'));
                } else {
                    $this->session->set_flashdata('flash', 'tambah-gagal');
                    redirect(base_url('administrator/pengguna'));
                }
                $this->session->set_flashdata('flash', 'tambah-gagal');
                redirect(base_url('administrator/pengguna'));
            }
        }
    }

    public function hapus_pengguna()
    {
        $user = $this->Model_administrator_pengguna->findUser(['email' => $this->session->userdata('email')]);

        $penggunaId = $this->input->post('id');
        if (is_null($penggunaId)) {
            $this->session->set_flashdata('flash', 'hapus-gagal');
            redirect(base_url('administrator/pengguna'));
        }
        if ($penggunaId == $user['id']) {
            $this->session->set_flashdata('flash', 'hapus-sendiri-gagal');
            redirect(base_url('administrator/pengguna'));
        }
        if ($penggunaId == 1) {
            $this->session->set_flashdata('flash', 'hapus-root-gagal');
            redirect(base_url('administrator/pengguna'));
        }

        $foto = $this->input->post('foto');
        if (!is_null($foto)) {
            unlink(FCPATH . 'uploads/profile/' . $foto);
        }

        $this->Model_administrator_pengguna->hapusDataPengguna(['id' => $penggunaId]);
        $this->session->set_flashdata('flash', 'hapus-berhasil');
        redirect(base_url('administrator/pengguna'));
    }

    public function edit_pengguna($penggunaId = FALSE)
    {
        if ($penggunaId == FALSE) {
            redirect(base_url('administrator/pengguna'));
        }

        $data = [
            'title' => 'Edit Data Pengguna Website SIJ',
            'uriSegment' => $this->uri->segment(2),
            'user' => $this->Model_administrator_pengguna->findUser(['email' => $this->session->userdata('email')]),
            'dataPengguna' => $this->Model_administrator_pengguna->findUser(['id' => $penggunaId])
        ];

        if ($penggunaId == 1 && $data['user']['id'] != 1) {
            redirect(base_url('administrator/pengguna'));
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'numeric|trim');
        $this->form_validation->set_rules('mata_pelajaran', 'Mata Pelajaran', 'trim');
        $this->form_validation->set_rules('nik', 'NIK', 'numeric|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim');
        $this->form_validation->set_rules('no_hp', 'No. Handphone', 'trim');
        $this->form_validation->set_rules('role', 'Role', 'trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar_administrator', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/administrator/pengguna_edit', $data);
            $this->load->view('backend/templates/footer', $data);
        } else {

            $email = ['email' => $data['dataPengguna']['email']];

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
            $role = $this->input->post('role');
            if (is_null($role)) {
                $role = $data['dataPengguna']['role'];
            }

            $active = $this->input->post('active');
            if (is_null($active)) {
                $active = 0;
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
                    'updated_at' => date('Y-m-d H:i:s'),
                    'role' => $role,
                    'active' => $active
                ];

                $foto_lama = $data['dataPengguna']['foto'];
                if (!is_null($foto_lama)) {
                    unlink(FCPATH . 'uploads/profile/' . $foto_lama);
                }

                $this->Model_administrator_pengguna->editDataPengguna($email, $dataEdit);
                $this->session->set_flashdata('flash', 'ubah-berhasil');
                redirect(base_url('administrator/pengguna'));
            } else {
                $config['upload_path'] = './uploads/profile/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $foto_lama = $data['dataPengguna']['foto'];
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
                        'updated_at' => date('Y-m-d H:i:s'),
                        'role' => $role,
                        'active' => $active
                    ];

                    $this->Model_administrator_pengguna->editDataPengguna($email, $dataEdit);
                    $this->session->set_flashdata('flash', 'ubah-berhasil');
                    redirect(base_url('administrator/pengguna'));
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
                        'updated_at' => date('Y-m-d H:i:s'),
                        'role' => $role,
                        'active' => $active
                    ];
                    $this->Model_administrator_pengguna->editDataPengguna($email, $dataEdit);
                    $this->session->set_flashdata('flash', 'ubah-berhasil');
                    redirect(base_url('administrator/pengguna'));
                } else {
                    $this->session->set_flashdata('flash', 'ubah-gagal');
                    redirect(base_url('administrator/pengguna'));
                }
                $this->session->set_flashdata('flash', 'ubah-gagal');
                redirect(base_url('administrator/pengguna'));
            }
            $this->session->set_flashdata('flash', 'ubah-gagal');
            redirect(base_url('administrator/pengguna'));
        }
    }

    public function reset_password()
    {
        $penggunaId = $this->input->post('id');
        $password_default = $this->input->post('password_default');
        if (is_null($penggunaId)) {
            $this->session->set_flashdata('flash', 'reset-password-gagal');
            redirect(base_url('administrator/pengguna'));
        }

        $password_hash = password_hash($password_default, PASSWORD_DEFAULT);

        $dataReset = [
            'password' => $password_hash,
            'password_unhash' => $password_default,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->Model_administrator_pengguna->editDataPengguna(['id' => $penggunaId], $dataReset);
        $this->session->set_flashdata('flash', 'reset-password-berhasil');
        redirect(base_url('administrator/pengguna'));
    }

    public function ubah_email($penggunaId = FALSE)
    {
        if ($penggunaId == FALSE) {
            redirect(base_url('administrator/pengguna'));
        }

        $email_baru = $this->input->post('email_baru');
        if (is_null($email_baru)) {
            redirect(base_url('administrator/pengguna'));
        }

        $this->form_validation->set_rules('email_baru', 'Email Baru', 'required|trim|valid_email|is_unique[user.email]');

        if ($this->form_validation->run() == false) {
            if (form_error('email_baru') == '<p>The Email Baru field is required.</p>') {
                $this->session->set_flashdata('flash', 'ubah-email-invalid-gagal');
                redirect(base_url('administrator/pengguna/edit_pengguna/' . $penggunaId));
            } elseif (form_error('email_baru') == '<p>The Email Baru field must contain a valid email address.</p>') {
                $this->session->set_flashdata('flash', 'ubah-email-invalid-gagal');
                redirect(base_url('administrator/pengguna/edit_pengguna/' . $penggunaId));
            } elseif (form_error('email_baru') == '<p>The Email Baru field must contain a unique value.</p>') {
                $this->session->set_flashdata('flash', 'ubah-email-dimiliki-gagal');
                redirect(base_url('administrator/pengguna/edit_pengguna/' . $penggunaId));
            }
            $this->session->set_flashdata('flash', 'ubah-email-invalid-gagal');
            redirect(base_url('administrator/pengguna/edit_pengguna/' . $penggunaId));
        } else {
            $user = $this->Model_administrator_pengguna->findUser(['email' => $this->session->userdata('email')]);
            $this->Model_administrator_pengguna->ubahEmail(['id' => $penggunaId], ['email' => $email_baru, 'updated_at' => date('Y-m-d H:i:s')]);
            if ($penggunaId == $user['id']) {
                $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Email Akun Anda <strong>Berhasil Diubah</strong> Silahkan Login Ulang.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $this->session->unset_userdata('email');
                $this->session->unset_userdata('role');
                redirect(base_url('auth'));
            }
            redirect(base_url('administrator/pengguna'));
        }
    }
}
