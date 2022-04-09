<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator_dashboard extends CI_Model
{
    public function findUser($email)
    {
        return $this->db->get_where('user', $email)->row_array();
    }

    public function jumlahDataAgenda()
    {
        return $this->db->count_all('agenda');
    }

    public function jumlahDataBerita()
    {
        return $this->db->count_all('berita');
    }

    public function jumlahDataGaleriFoto()
    {
        return $this->db->count_all('galeri_foto');
    }

    public function jumlahDataGambarSlider()
    {
        return $this->db->count_all('gambar_slider');
    }

    public function jumlahDataPenggunaGuru()
    {
        $this->db->where(['role' => 'Guru']);
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function jumlahDataPenggunaAdministrator()
    {
        $this->db->where(['role' => 'Administrator']);
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function jumlahDataPengumuman()
    {
        return $this->db->count_all('pengumuman');
    }

    public function jumlahDataPrestasi()
    {
        return $this->db->count_all('prestasi');
    }

    public function jumlahDataPublikasiIlmiahGuru()
    {
        $this->db->where(['level_penulis' => 'Guru']);
        $this->db->from('publikasi_ilmiah');
        return $this->db->count_all_results();
    }

    public function jumlahDataPublikasiIlmiahSiswa()
    {
        $this->db->where(['level_penulis' => 'Siswa']);
        $this->db->from('publikasi_ilmiah');
        return $this->db->count_all_results();
    }

    public function jumlahDataPublikasiIlmiahAdministrator()
    {
        $this->db->where(['level_penulis' => 'Administrator']);
        $this->db->from('publikasi_ilmiah');
        return $this->db->count_all_results();
    }
}
