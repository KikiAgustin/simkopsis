<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengajuanPinjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Silahkan login dulu untuk mulai pengajuan Pinjaman</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Auth');
        }
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $getUser = $this->db->get_where('user', ['email' => "$email"])->row_array();
        $anggota = $this->db->get_where('simkopsis_anggota', ['anggota_email' => "$email"])->row_array();

        if (!$anggota) {
            redirect('Profile');
        }

        $data = [
            "judul" => "BANKKU | pengajuan Pinjaman",
            "anggota"   => $anggota,
            "user"      => $getUser
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('pinjaman/pengajuan');
        $this->load->view('template/footer');
    }
}
