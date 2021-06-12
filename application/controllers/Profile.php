<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {
        $email = $this->session->userdata('email');
        $getUser = $this->db->get_where('user', ['email' => "$email"])->row_array();
        $anggota = $this->db->get_where('simkopsis_anggota', ['anggota_email' => "$email"])->row_array();
        $data = [
            "judul" => "BANKKU | Profile Nasabah",
            "anggota"   => $anggota,
            'user'      => $getUser
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('profile/index');
        $this->load->view('template/footer');
    }

    public function editProfile($id)
    {
        $getUser = $this->db->get_where('user', ['id' => "$id"])->row_array();
        $data = [
            "judul" => "BANKKU | Edit Profile Nasabah",
            "user"   => $getUser
        ];

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]|is_unique[simkopsis_anggota.anggota_nik]');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('status_kawin', 'Status Perkawinan', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('profile/edit_profile');
            $this->load->view('template/footer');
        } else {
            $nama_lengkap = $this->input->post('nama_lengkap');
            $nik = $this->input->post('nik');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $agama = $this->input->post('agama');
            $nama_ibu = $this->input->post('nama_ibu');
            $alamat = $this->input->post('alamat');
            $pekerjaan = $this->input->post('pekerjaan');
            $pendidikan = $this->input->post('pendidikan');
            $status_kawin = $this->input->post('status_kawin');
            $telepon = $this->input->post('telepon');

            $data = [
                "anggota_nama"          => $nama_lengkap,
                "anggota_jk"            => $jenis_kelamin,
                "anggota_tempat_lahir"  => $tempat_lahir,
                "anggota_tanggal_lahir" => $tanggal_lahir,
                "anggota_nik"           => $nik,
                "anggota_agama"         => $agama,
                "anggota_nama_ibu"      => $nama_ibu,
                "anggota_alamat"        => $alamat,
                "anggota_pekerjaan"     => $pekerjaan,
                "anggota_pendidikan"    => $pendidikan,
                "anggota_status_kawin"  => $status_kawin,
                "anggota_nomor_hp"      => $telepon,
                "anggota_email"         => $getUser['email'],
                "anggota_date_created"  => date('Y-m-d')
            ];

            $this->db->insert('simkopsis_anggota', $data);
            $this->session->set_flashdata('message', '<h3 style="text-align: center; margin-top: 20px;">Profile anda berhasil di edit</h3>');
            redirect('Profile');
        }
    }
}
