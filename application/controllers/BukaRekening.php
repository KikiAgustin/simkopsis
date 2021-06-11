<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukaRekening extends CI_Controller
{
    public function index()
    {
        $data = [
            "judul" => "BANKKU | Pembukaan Rekening"
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('simpanan/buka_rekening');
        $this->load->view('template/footer');
    }
}
