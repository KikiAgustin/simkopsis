<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukaRekening extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Silahkan login dulu untuk mulai pembukaan rekening</strong>
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
            "judul" => "BANKKU | Pembukaan Rekening",
            "anggota"   => $anggota,
            "user"      => $getUser
        ];

        $this->form_validation->set_rules('jenis_rekening', 'Jenis Rekening', 'required');
        $this->form_validation->set_rules('jenis_kartu', 'Jenis Kartu', 'required');
        $this->form_validation->set_rules('tujuan_buka_rekening', 'Tujuan Buka Rekening', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('simpanan/buka_rekening');
            $this->load->view('template/footer');
        } else {
            $jenis_rekening = $this->input->post('jenis_rekening');
            $jenis_kartu = $this->input->post('jenis_kartu');
            $tujuan_buka_rekening = $this->input->post('tujuan_buka_rekening');

            $config['upload_path'] = './assets/gambar/ktp/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('foto_ktp');
            $ktp = $this->upload->data('file_name');

            $data = [
                "id_anggota"        => $anggota["anggota_id"],
                "jenis_rekening"    => $jenis_rekening,
                "jenis_kartu"       => $jenis_kartu,
                "tujuan"            => $tujuan_buka_rekening,
                "foto_ktp"          => $ktp
            ];

            $this->db->insert('tbl_pembukaan_rekening', $data);
            redirect('BukaRekening/Status');
        }
    }

    public function Status()
    {
        $email = $this->session->userdata('email');
        $getUser = $this->db->get_where('user', ['email' => "$email"])->row_array();
        $anggota = $this->db->get_where('simkopsis_anggota', ['anggota_email' => "$email"])->row_array();
        $rekening = $this->db->get_where('tbl_pembukaan_rekening', ['id_anggota' => $anggota["anggota_id"]])->row_array();
        $data = [
            "judul" => "BANKKU | Profile Nasabah",
            "anggota"   => $anggota,
            'user'      => $getUser,
            'rekening'  => $rekening
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('profile/status_rekening');
        $this->load->view('template/footer');
    }
}
