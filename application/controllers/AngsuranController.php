<?php

class AngsuranController extends GLOBAL_Controller
{

	public function __construct()
	{
		parent::__construct();
		$model = array('AngsuranModel', 'PinjamanModel');
		$this->load->model($model);
		if (!parent::hasLogin()) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}

	public function angsuranMudharabah()
	{
		if (isset($_POST['simpan'])) {
			$pinjamanId = parent::post('pinjaman-id');
			$query = array(
				'pinjaman_id' => $pinjamanId
			);
			$angsuran = parent::post('angsuran');
			$totalPinjam = parent::model('PinjamanModel')->lihat($query)['pinjaman_total'];

			$data = array(
				'angsuran_pinjaman_id' => $pinjamanId,
				'angsuran_jumlah' => $angsuran
			);

			$simpan = parent::model('AngsuranModel')->tambah($data);

			if ($simpan > 0) {
				$pinjamanSekarang = $totalPinjam - $angsuran;
				$dataUpdate = array(
					'pinjaman_total' => $pinjamanSekarang
				);
				$update = parent::model('PinjamanModel')->ubah($pinjamanId, $dataUpdate);
				if ($update > 0) {
					parent::alert('alert', 'sukses_tambah');
					redirect('angsuran-kredit-modal-kerja-umkm');
				} else {
					parent::alert('alert', 'gagal_tambah');
					redirect('angsuran-kredit-modal-kerja-umkm');
				}
			} else {
				parent::alert('alert', 'gagal_tambah');
				redirect('angsuran-kredit-modal-kerja-umkm');
			}
		} else {
			$data['title'] = 'Data Kredit Modal Kerja UMKM';
			$data['angsuran'] = parent::model('AngsuranModel')->lihat_semua();


			parent::template('angsuran/mudharabah', $data);
		}
	}

	public function angsuranMurabahah()
	{
		$data['title'] = 'Angsuran Kredit Usaha Mikro';
		$data['murabahah'] = parent::model('AngsuranModel')->lihat_semua();

		parent::template('angsuran/murabahah', $data);
	}

	public function angsuranMusyarakah()
	{
		$data['title'] = 'Angsuran Kredit Modal Kerja Corporate';
		$data['musyarakah'] = parent::model('AngsuranModel')->lihat_semua();

		parent::template('angsuran/musyarakah', $data);
	}

	public function angsuranIjarah()
	{
		$data['title'] = 'Angsuran Kredit Investasi';
		$data['ijarah'] = parent::model('AngsuranModel')->lihat_semua();

		parent::template('angsuran/ijarah', $data);
	}
}
