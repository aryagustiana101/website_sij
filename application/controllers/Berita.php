<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Berita Website SIJ - SMK Negeri 1 Garut',
            'uriSegment' => $this->uri->segment(1)
        ];

        //Pagination
        $config['base_url'] = 'http://localhost/website_sij/berita/index';
        $config['total_rows'] = $this->Model_berita->jumlahDataBerita();
        $config['per_page'] = 9;
        $config['full_tag_open'] = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center py-3'>";
        $config['full_tag_close'] = "</ul></nav>";

        // Style Pagination
        $config['first_link'] = 'First';
        $config['first_tag_open'] = "<li class='page-item'>";
        $config['first_tag_close'] = "</li>";

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = "<li class='page-item'>";
        $config['last_tag_close'] = "</li>";

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tag_close'] = "</li>";

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";

        $config['cur_tag_open'] = "<li class='page-item active' aria-current='page'><a class='page-link' href='#'>";
        $config['cur_tag_close'] = "</a></li>";

        $config['num_tag_open'] = "<li class='page-item'>";
        $config['num_tag_close'] = "</li>";

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $start = $this->uri->segment(3);
        $data['beritaAll'] = $this->Model_berita->getPaginationBerita($config['per_page'], $start);

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/navbar', $data);
        $this->load->view('frontend/berita_index', $data);
        $this->load->view('frontend/templates/footer', $data);
    }

    public function detail_berita($id = false)
    {
        if ($id == false) {
            redirect(base_url('berita'));
        }
        $data = [
            'title' => 'Detail Berita Website SIJ - SMK Negeri 1 Garut',
            'uriSegment' => $this->uri->segment(1),
            'berita' => $this->Model_berita->getBeritaData(['id' => $id])
        ];
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/navbar', $data);
        $this->load->view('frontend/berita_detail', $data);
        $this->load->view('frontend/templates/footer', $data);
    }
}
