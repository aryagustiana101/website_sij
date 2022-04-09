<?php

function is_logged_in_administrator()
{
    date_default_timezone_set("Asia/Jakarta");

    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect(base_url('auth'));
    }

    $user = $ci->db->get_where('user', ['email' => $ci->session->userdata('email')])->row_array();

    if (!$user) {
        $ci->session->unset_userdata('email');
        $ci->session->unset_userdata('role');
        redirect(base_url('auth'));
    }
    if ($user['role'] == 'Guru') {
        redirect(base_url('auth'));
    }
}

function is_logged_in_guru()
{
    date_default_timezone_set("Asia/Jakarta");
    
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect(base_url('auth'));
    }

    $user = $ci->db->get_where('user', ['email' => $ci->session->userdata('email')])->row_array();

    if (!$user) {
        $ci->session->unset_userdata('email');
        $ci->session->unset_userdata('role');
        redirect(base_url('auth'));
    }
    if ($user['role'] == 'Administrator') {
        redirect(base_url('auth'));
    }
}
