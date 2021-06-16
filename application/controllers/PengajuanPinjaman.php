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
        $cekPinjaman = $this->db->get_where('tbl_data_pinjaman', ['id_anggota' => $anggota['anggota_id'], 'status' => 0])->row_array();

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
        } else if ($cekPinjaman) {
            redirect('PengajuanPinjaman/detailPinjaman');
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
                'nama'              => $anggota['anggota_nama'],
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
        $cekPinjaman = $this->db->get_where('tbl_data_pinjaman', ['id_anggota' => $anggota['anggota_id'], 'status' => 0])->row_array();
        $persyaratan = $this->db->get_where('tbl_persyaratan', ['id_anggota' => $anggota['anggota_id']])->row_array();

        $jenis_angsuran = $cekPinjaman["jenis_pinjaman"];
        $cekAngsuran = $cekPinjaman['jumlah_angsuran'];
        if ($jenis_angsuran == "Kredit Usaha Mikro") {
            if ($cekAngsuran == 1) {
                $jumlah_angsuran = 12;
                $bayar = " Tahun";
            } elseif ($cekAngsuran == 2) {
                $jumlah_angsuran = 24;
                $bayar = " Tahun";
            } elseif ($cekAngsuran == 3) {
                $jumlah_angsuran = 36;
                $bayar = " Tahun";
            } elseif ($cekAngsuran == 4) {
                $jumlah_angsuran = 48;
                $bayar = " Tahun";
            } else {
                $jumlah_angsuran = 50;
                $bayar = " Tahun";
            }
        } else {
            $jumlah_angsuran = $cekPinjaman['jumlah_angsuran'];
            $bayar = " Bulan";
        }

        if (!$cekPinjaman) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Silahkan ajukan pinjaman terlebih dahulu
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('Home/pinjaman');
        }


        $data = [
            "judul" => "BANKKU | Detail Pinjaman",
            "anggota"           => $anggota,
            "user"              => $getUser,
            "pinjaman"          => $cekPinjaman,
            "persyaratan"       => $persyaratan,
            "jumlah_angsuran"   => $jumlah_angsuran,
            "bayar"             => $bayar
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('pinjaman/detail_pinjaman');
        $this->load->view('template/footer');
    }

    public function uploadData()
    {
        $email = $this->session->userdata('email');
        $getUser = $this->db->get_where('user', ['email' => "$email"])->row_array();
        $anggota = $this->db->get_where('simkopsis_anggota', ['anggota_email' => "$email"])->row_array();

        $this->form_validation->set_rules('id_anggota', 'Id Anggota', 'required');

        $data = [
            "judul" => "BANKKU | Detail Pinjaman",
            "anggota"       => $anggota,
            "user"          => $getUser
        ];

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('pinjaman/upload_data');
            $this->load->view('template/footer');
        } else {
            $id_anggota = $this->input->post('id_anggota');
            $config['upload_path'] = './assets/gambar/persyaratan/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('foto_ktp');
            $foto_ktp = $this->upload->data('file_name');

            $this->upload->do_upload('foto_kk');
            $foto_kk = $this->upload->data('file_name');

            $this->upload->do_upload('foto_npwp');
            $foto_npwp = $this->upload->data('file_name');

            $this->upload->do_upload('foto_siup');
            $foto_siup = $this->upload->data('file_name');

            $this->upload->do_upload('buku_tabungan');
            $buku_tabungan = $this->upload->data('file_name');

            $data = [
                "id_anggota"    => $id_anggota,
                "foto_ktp"      => $foto_ktp,
                "foto_kk"       => $foto_kk,
                "foto_npwp"     => $foto_npwp,
                "foto_siup"     => $foto_siup,
                "foto_tabungan" => $buku_tabungan
            ];

            $this->db->insert('tbl_persyaratan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data anda berhasil di upload
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('PengajuanPinjaman/detailPinjaman');
        }
    }

    public function UsahaMikro()
    {
        $email = $this->session->userdata('email');
        $getUser = $this->db->get_where('user', ['email' => "$email"])->row_array();
        $anggota = $this->db->get_where('simkopsis_anggota', ['anggota_email' => "$email"])->row_array();
        $cekPinjaman = $this->db->get_where('tbl_data_pinjaman', ['id_anggota' => $anggota['anggota_id'], 'status' => 0])->row_array();

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
        } else if ($cekPinjaman) {
            redirect('PengajuanPinjaman/detailPinjaman');
        }

        $data = [
            "judul" => "BANKKU | pengajuan Pinjaman Usaha Rakyat",
            "anggota"   => $anggota,
            "user"      => $getUser
        ];

        $this->form_validation->set_rules('jumlah_pinjaman', 'Jumlah Pinjaman', 'required|max_length[9]');
        $this->form_validation->set_rules('jumlah_angsuran', 'Jumlah Angsuran', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('pinjaman/usaha_mikro');
            $this->load->view('template/footer');
        } else {
            $jumlah_pinjaman = $this->input->post('jumlah_pinjaman');
            $jumlah_angsuran = $this->input->post('jumlah_angsuran');

            $data = [
                'id_anggota'        => $anggota['anggota_id'],
                'nama'              => $anggota['anggota_nama'],
                'email'             => $anggota['anggota_email'],
                'jenis_pinjaman'    => "Kredit Usaha Mikro",
                'jumlah_pinjaman'   => $jumlah_pinjaman,
                'jumlah_angsuran'   => $jumlah_angsuran,
                'tanggal'           => date('Y-m-d')
            ];

            $this->db->insert('tbl_data_pinjaman', $data);
            redirect('PengajuanPinjaman/detailPinjaman');
        }
    }
}
