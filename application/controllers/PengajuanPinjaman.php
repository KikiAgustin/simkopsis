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

    public function ModalKerja()
    {
        $email = $this->session->userdata('email');
        $getUser = $this->db->get_where('user', ['email' => "$email"])->row_array();
        $anggota = $this->db->get_where('simkopsis_anggota', ['anggota_email' => "$email"])->row_array();

        $tanggal_lahir = $anggota['anggota_tanggal_lahir'];

        $tanggal = new DateTime($tanggal_lahir);
        $today = new DateTime('today');
        $tahun = $today->diff($tanggal)->y;

        if (!$anggota) {
            redirect('Profile');
        } else if ($tahun < 21) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Usia anda masih kurang untuk pengajuan pinjaman
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('Profile');
        }

        $data = [
            "judul" => "BANKKU | pengajuan Pinjaman Modal Kerja",
            "anggota"   => $anggota,
            "user"      => $getUser
        ];

        $this->form_validation->set_rules('jumlah_pinjaman', 'Jumlah Pinjaman', 'required|min_length[9]');
        $this->form_validation->set_rules('jumlah_angsuran', 'Jumlah Angsuran', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('pinjaman/modal_kerja');
            $this->load->view('template/footer');
        } else {
            $jumlah_pinjaman = $this->input->post('jumlah_pinjaman');
            $jumlah_angsuran = $this->input->post('jumlah_angsuran');

            $data = [
                'id_anggota'        => $anggota['anggota_id'],
                'email'             => $anggota['anggota_email'],
                'jenis_pinjaman'    => "Kredit Modal Kerja",
                'jumlah_pinjaman'   => $jumlah_pinjaman,
                'jumlah_angsuran'   => $jumlah_angsuran,
                'tanggal'           => date('Y-m-d')
            ];

            $this->db->insert('tbl_data_pinjaman', $data);
            redirect('PengajuanPinjaman/detailPinjaman');
        }
    }

    public function detailPinjaman()
    {
        $email = $this->session->userdata('email');
        $getUser = $this->db->get_where('user', ['email' => "$email"])->row_array();
        $anggota = $this->db->get_where('simkopsis_anggota', ['anggota_email' => "$email"])->row_array();

        $data = [
            "judul" => "BANKKU | Detail Pinjaman",
            "anggota"   => $anggota,
            "user"      => $getUser
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('pinjaman/detail_pinjaman');
        $this->load->view('template/footer');
    }
}
