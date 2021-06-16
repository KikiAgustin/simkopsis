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
		$data['title'] = 'Daftar Anggota ';
		$data['anggota'] = parent::model('AnggotaModel')->lihat_semua();

		parent::template('anggota/index', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'Data anggota ';
		$query = array(
			'anggota_id' => $id
		);
		$data['anggota'] = parent::model('AnggotaModel')->lihat_anggota($query);
		$querySimpanan = array(
			'simpanan_anggota_id' => $id
		);
		$data['simpanan'] = parent::model('AnggotaModel')->lihat_simpanan($querySimpanan)->result_array();
		$queryPinjaman = array(
			'pinjaman_anggota_id' => $id
		);
		$data['pinjaman'] = parent::model('AnggotaModel')->lihat_pinjaman($queryPinjaman)->result_array();

		$data['ktp'] = $this->db->get_where('tbl_pembukaan_rekening', ['id_anggota' => $id])->row_array();

		parent::template('anggota/detail', $data);
	}

	/*
     * insert modul
     * */
	public function tambah()
	{
		if (isset($_POST['tambah'])) {

			$data = array(
				'anggota_nama' => parent::post('nama'),
				'anggota_tempat_lahir' => parent::post('tempat-lahir'),
				'anggota_tanggal_lahir' => parent::post('tanggal-lahir'),
				'anggota_nama_ibu' => parent::post('nama-ibu'),
				'anggota_pendidikan' => parent::post('pendidikan'),
				'anggota_pekerjaan' => parent::post('pekerjaan'),
				'anggota_pendapatan' => parent::post('pendapatan'),
				'anggota_jk' => parent::post('jenis-kelamin'),
				'anggota_status_kawin' => parent::post('status-kawin'),
				'anggota_agama' => parent::post('agama'),
				'anggota_nik' => parent::post('nik'),
				'anggota_nomor_hp' => parent::post('telepon'),
				'anggota_email' => parent::post('email'),
				'anggota_alamat' => parent::post('alamat')
			);

			$simpan = parent::model('AnggotaModel')->tambah($data);

			if ($simpan > 0) {
				parent::alert('alert', 'sukses_tambah');
				redirect('anggota');
			} else {
				parent::alert('alert', 'gagal_tambah');
				redirect('anggota');
			}
		} else {
			$data['title'] = 'tambah anggota baru';

			parent::template('anggota/tambah', $data);
		}
	}

	public function ubah($id)
	{
		if (isset($_POST['ubah'])) {
			$data = array(
				'anggota_nama' => parent::post('nama'),
				'anggota_tempat_lahir' => parent::post('tempat-lahir'),
				'anggota_tanggal_lahir' => parent::post('tanggal-lahir'),
				'anggota_nama_ibu' => parent::post('nama-ibu'),
				'anggota_pendidikan' => parent::post('pendidikan'),
				'anggota_pekerjaan' => parent::post('pekerjaan'),
				'anggota_pendapatan' => parent::post('pendapatan'),
				'anggota_jk' => parent::post('jenis-kelamin'),
				'anggota_status_kawin' => parent::post('status-kawin'),
				'anggota_agama' => parent::post('agama'),
				'anggota_nik' => parent::post('nik'),
				'anggota_nomor_hp' => parent::post('telepon'),
				'anggota_email' => parent::post('email'),
				'anggota_alamat' => parent::post('alamat')
			);

			$config['upload_path'] = './assets/upload/dokumen/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$this->upload->do_upload('ktp');
			$ktp = $this->upload->data('file_name');
			$this->upload->do_upload('kk');
			$kk = $this->upload->data('file_name');
			$this->upload->do_upload('listrik');
			$listrik = $this->upload->data('file_name');
			$this->upload->do_upload('jaminan');
			$jaminan = $this->upload->data('file_name');
			$this->upload->do_upload('kerja');
			$kerja = $this->upload->data('file_name');
			$this->upload->do_upload('gaji');
			$gaji = $this->upload->data('file_name');
			$this->upload->do_upload('rekening');
			$rekening = $this->upload->data('file_name');

			$dataUpload = array(
				'ktp' => $ktp,
				'kk' => $kk,
				'listrik' => $listrik,
				'jaminan' => $jaminan,
				'kerja' => $kerja,
				'gaji' => $gaji,
				'rekening' => $rekening,
			);

			$data['anggota_dokumen'] = json_encode($dataUpload);

			$simpan = parent::model('AnggotaModel')->ubah($id, $data);

			if ($simpan > 0) {
				parent::alert('alert', 'sukses_ubah');
				redirect('anggota');
			} else {
				parent::alert('alert', 'gagal_ubah');
				redirect('anggota');
			}
		} else {
			$data['title'] = 'ubah data anggota ';
			$query = array(
				'anggota_id' => $id
			);
			$data['anggota'] = parent::model('AnggotaModel')->lihat_anggota($query);

			parent::template('anggota/ubah', $data);
		}
	}

	public function hapus($id)
	{
		$query = array(
			'anggota_id' => $id
		);
		$hapus = parent::model('AnggotaModel')->hapus($query);
		if ($hapus > 0) {
			parent::alert('alert', 'sukses_hapus');
			redirect('anggota');
		} else {
			parent::alert('alert', 'gagal_hapus');
			redirect('anggota');
		}
	}


	public function pembukaanRekening()
	{
		$anggota = $this->db->get('tbl_pembukaan_rekening')->result_array();
		$data = [
			'title'			=> 'Data pembukaan rekening baru',
			'anggota'		=> $anggota

		];

		parent::template('anggota/pembukaan_rekening', $data);
	}

	public function expire($id)
	{

		$this->db->set('status', 2);
		$this->db->where('id_anggota', $id);
		$this->db->update('tbl_pembukaan_rekening');
		parent::alert('alert', 'sukses_hapus');
		redirect('AnggotaController/pembukaanRekening');
	}

	public function done($id)
	{
		$this->db->set('status', 1);
		$this->db->where('id_anggota', $id);
		$this->db->update('tbl_pembukaan_rekening');
		parent::alert('alert', 'sukses_hapus');
		redirect('AnggotaController/pembukaanRekening');
	}
	public function terima($id)
	{
		// Update data anggota
		$dokumen = '{"ktp":"IMG_20180912_123840.jpg"}';
		$this->db->set('anggota_dokumen', $dokumen);
		$this->db->where('anggota_id', $id);
		$this->db->update('simkopsis_anggota');

		// Update data peminjaman
		$this->db->set('persetujuan', 1);
		$this->db->where('id_anggota', $id);
		$this->db->update('tbl_data_pinjaman');
		parent::alert('alert', 'sukses_hapus');
		redirect('AnggotaController/pengajuanPinjaman');
	}

	public function tolak($id)
	{
		$this->db->set('persetujuan', 2);
		$this->db->where('id_anggota', $id);
		$this->db->update('tbl_data_pinjaman');
		parent::alert('alert', 'sukses_hapus');
		redirect('AnggotaController/pengajuanPinjaman');
	}

	public function pengajuanPinjaman()
	{
		$anggota = $this->db->get('tbl_data_pinjaman')->result_array();
		$data = [
			'title'			=> 'Data pengajuan pinjaman nasabah',
			'anggota'		=> $anggota

		];

		parent::template('anggota/pengajuan_pinjaman', $data);
	}

	public function dokumen($id)
	{
		$data['title'] = 'Dokumen Pengajuan ';
		$query = array(
			'anggota_id' => $id
		);
		$data['anggota'] = parent::model('AnggotaModel')->lihat_anggota($query);
		$querySimpanan = array(
			'simpanan_anggota_id' => $id
		);
		$data['simpanan'] = parent::model('AnggotaModel')->lihat_simpanan($querySimpanan)->result_array();
		$queryPinjaman = array(
			'pinjaman_anggota_id' => $id
		);
		$data['pinjaman'] = parent::model('AnggotaModel')->lihat_pinjaman($queryPinjaman)->result_array();

		$data['dokumen'] = $this->db->get_where('tbl_persyaratan', ['id_anggota' => $id])->row_array();

		parent::template('anggota/dokumen', $data);
	}
}
