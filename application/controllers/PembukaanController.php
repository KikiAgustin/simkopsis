<?php

class AnggotaController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = array('AnggotaModel');
        $this->load->model($model);
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        // $anggota = $this->db->get('tbl_pembukaan_rekening')->result_array();

        // $data = [
        //     'title'     => "Daftar Pembukaan Rekening",
        //     'anggota'   => $anggota
        // ];

        echo "berhasil";
    }
}
