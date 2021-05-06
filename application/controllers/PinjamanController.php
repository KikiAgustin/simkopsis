<?php

class PinjamanController extends GLOBAL_Controller
{

	public function __construct()
	{
		parent::__construct();
		$model = array('PinjamanModel');
		$this->load->model($model);
		if (!parent::hasLogin()) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}

	/*
     * get modul
     * */
	public function pinjamanMudharabah()
	{
		$data['title'] = 'Kredit Modal Kerja UMKM';
		$data['mudharabah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

		parent::template('pinjaman/mudharabah', $data);
	}

	public function pinjamanMurabahah()
	{
		$data['title'] = 'Kredit usaha Mikro';
		$data['murabahah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

		parent::template('pinjaman/murabahah', $data);
	}

	public function pinjamanMusyarakah()
	{
		$data['title'] = 'Kredit Modal Kerja Corporate';
		$data['musyarakah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

		parent::template('pinjaman/musyarakah', $data);
	}

	public function pinjamanIjarah()
	{
		$data['title'] = 'Kredit Investasi';
		$data['ijarah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

		parent::template('pinjaman/ijarah', $data);
	}

	/*
     * insert modul
     * */
	public function tambahMudharabah()
	{
		if (isset($_POST['tambah'])) {
			$data = array(
				'pinjaman_anggota_id' => parent::post('anggota'),
				'pinjaman_jenis' => 'modal-kerja-umkm',
				'pinjaman_total' => parent::post('total-pinjam'),
				'pinjaman_tenggat' => parent::post('tenggat-pinjam'),
				'pinjaman_status' => 'tunggu',
				'pinjaman_keterangan' => 'KREDIT MODAL KERJA : Kredit Modal Kerja Adalah fasilitas kredit yang diberikan untuk memenuhi kebutuhan modal kerja yang habis dalam satu siklus usaha dan atau kebutuhan modal kerja yang bersifat khusus seperti untuk membiayai inventory / piutang / proyek atau kebutuhan khusus lainnya.'
			);

			$simpan = parent::model('PinjamanModel')->tambah($data);

			if ($simpan > 0) {
				parent::alert('alert', 'sukses_tambah');
				redirect('kredit-modal-kerja-umkm');
			} else {
				parent::alert('alert', 'gagal_tambah');
				redirect('kredit-modal-kerja-umkm');
			}
		} else {
			$data['title'] = 'Tambah data Kredit Modal Kerja UMKM';

			parent::template('pinjaman/tambahMudharabah', $data);
		}
	}

	public function setuju($id)
	{
		$data = array(
			'pinjaman_status' => 'setuju',
		);

		$update = parent::model('PinjamanModel')->ubah($id, $data);

		if ($update > 0) {
			parent::alert('alert', 'sukses_setuju');
			redirect(base_url('kredit-modal-kerja-umkm'));
		} else {
			parent::alert('alert', 'gagal_setuju');
			redirect(base_url('kredit-modal-kerja-umkm'));
		}
	}

	public function tolak($id)
	{
		$data = array(
			'pinjaman_status' => 'tolak',
		);

		$update = parent::model('PinjamanModel')->ubah($id, $data);

		if ($update > 0) {
			parent::alert('alert', 'sukses_tolak');
			redirect(base_url('kredit-modal-kerja-umkm'));
		} else {
			parent::alert('alert', 'gagal_tolak');
			redirect(base_url('kredit-modal-kerja-umkm'));
		}
	}
}
