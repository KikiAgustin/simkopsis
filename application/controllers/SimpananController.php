<?php

class SimpananController extends GLOBAL_Controller
{

    public function __construct()
    {
        parent::__construct();
        $model = array('SimpananModel');
        $this->load->model($model);
        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function simpananAmanah()
    {
        if (isset($_POST['simpan'])) {
            $data = array(
                'simpanan_anggota_id' => parent::post('anggota'),
                'simpanan_jenis' => 'tabungan-bisnis',
                'simpanan_total' => parent::post('setoran'),
                'simpanan_keterangan' => 'TABUNGAN BISNIS : Tabungan Bisnis :  Mempersembahkan Tabungan Bisnis yang memberikan segala kemudahan dan kenyamanan.'
            );

            $simpan = parent::model('SimpananModel')->tambah($data);

            if ($simpan > 0) {
                parent::alert('alert', 'sukses_tambah');
                redirect('simpanan-amanah');
            } else {
                parent::alert('alert', 'gagal_tambah');
                redirect('simpanan-amanah');
            }
        } else {
            $data['title'] = 'Tabungan Bisnis';
            $data['amanah'] = parent::model('SimpananModel')->lihat_semua()->result_array();

            parent::template('simpanan/amanah', $data);
        }
    }

    public function simpananQurbanAqikah()
    {
        $data['title'] = 'Deposito Rupiah';
        $data['aqikahQurban'] = parent::model('SimpananModel')->lihat_semua()->result_array();

        parent::template('simpanan/aqikahQurban', $data);
    }

    public function simpananUmrah()
    {
        $data['title'] = 'Simpanan Aqikah/Qurban';
        $data['umrah'] = parent::model('SimpananModel')->lihat_semua()->result_array();

        parent::template('simpanan/umrah', $data);
    }

    public function simpananIdulFitri()
    {
        $data['title'] = 'Simpanan Aqikah/Qurban';
        $data['idulFitri'] = parent::model('SimpananModel')->lihat_semua()->result_array();

        parent::template('simpanan/idulFitri', $data);
    }

    public function simpananWadiah()
    {
        $data['title'] = 'Simpanan Aqikah/Qurban';
        $data['wadiah'] = parent::model('SimpananModel')->lihat_semua()->result_array();

        parent::template('simpanan/wadiah', $data);
    }
}
