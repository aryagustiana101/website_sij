<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {

        $data = [
            'title' => 'Login Website SIJ SMK Negeri 1 Garut'
        ];

        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role') == 'Guru') {
                redirect(base_url('guru/dashboard'));
            } elseif ($this->session->userdata('role') == 'Administrator') {
                redirect(base_url('administrator/dashboard'));
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Model_auth->findUser(['email' => $email]);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user['active'] == 1) {
                    if ($user['role'] == 'Guru') {
                        $data = [
                            'email' => $user['email'],
                            'role' => $user['role']
                        ];
                        $this->session->set_userdata($data);
                        redirect(base_url('guru/dashboard'));
                    } elseif ($user['role'] == 'Administrator') {
                        $data = [
                            'email' => $user['email'],
                            'role' => $user['role']
                        ];
                        $this->session->set_userdata($data);
                        redirect(base_url('administrator/dashboard'));
                    }
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Akun <strong>Tidak Memiliki Role!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect(base_url('auth'));
                }
                $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Akun <strong>Tidak Aktif!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect(base_url('auth'));
            }
            $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Password Salah!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(base_url('auth'));
        }
        $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email <strong>Tidak Terdaftar!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect(base_url('auth'));
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        redirect(base_url('auth'));
    }
}