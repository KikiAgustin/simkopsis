-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 10:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simkopsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_anggota`
--

CREATE TABLE `simkopsis_anggota` (
  `anggota_id` int(11) NOT NULL,
  `anggota_nama` varchar(100) NOT NULL,
  `anggota_jk` enum('Laki-laki','Perempuan') NOT NULL,
  `anggota_tempat_lahir` varchar(50) NOT NULL,
  `anggota_tanggal_lahir` date NOT NULL,
  `anggota_nik` varchar(25) NOT NULL,
  `anggota_agama` enum('Islam','Kristen','Katolik','Buddha','Hindu','Konghuchu') NOT NULL,
  `anggota_nama_ibu` varchar(100) NOT NULL,
  `anggota_alamat` text NOT NULL,
  `anggota_pekerjaan` varchar(100) NOT NULL,
  `anggota_pendidikan` varchar(50) NOT NULL,
  `anggota_status_kawin` enum('lajang','menikah','janda','duda') NOT NULL,
  `anggota_nomor_hp` varchar(20) NOT NULL,
  `anggota_email` varchar(50) NOT NULL,
  `anggota_pendapatan` bigint(20) NOT NULL,
  `anggota_dokumen` text DEFAULT NULL,
  `anggota_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkopsis_anggota`
--

INSERT INTO `simkopsis_anggota` (`anggota_id`, `anggota_nama`, `anggota_jk`, `anggota_tempat_lahir`, `anggota_tanggal_lahir`, `anggota_nik`, `anggota_agama`, `anggota_nama_ibu`, `anggota_alamat`, `anggota_pekerjaan`, `anggota_pendidikan`, `anggota_status_kawin`, `anggota_nomor_hp`, `anggota_email`, `anggota_pendapatan`, `anggota_dokumen`, `anggota_date_created`) VALUES
(1, 'Kiki Agustin', 'Laki-laki', 'Bandung', '1999-01-31', '3204357012010001', 'Islam', 'popon', 'Kp. Salamungkal Rt. 002 Rw. 007 Desa. karangtunggal Kecamatan. Paseh Kabupaten. Bandung', 'Mahasiswa', 'D3', 'lajang', '089765432123', 'kikiagustin62@gmail.com', 0, NULL, '2021-06-12 09:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_angsuran`
--

CREATE TABLE `simkopsis_angsuran` (
  `angsuran_id` int(11) NOT NULL,
  `angsuran_pinjaman_id` int(11) NOT NULL,
  `angsuran_jumlah` double NOT NULL,
  `angsuran_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkopsis_angsuran`
--

INSERT INTO `simkopsis_angsuran` (`angsuran_id`, `angsuran_pinjaman_id`, `angsuran_jumlah`, `angsuran_date_created`) VALUES
(1, 1, 20000, '2021-05-08 11:26:46'),
(2, 1, 800000, '2021-05-10 09:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_pengguna`
--

CREATE TABLE `simkopsis_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(100) NOT NULL,
  `pengguna_password` varchar(100) NOT NULL,
  `pengguna_hak_akses` enum('pengurus','ketua') NOT NULL,
  `pengguna_nama` varchar(100) NOT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkopsis_pengguna`
--

INSERT INTO `simkopsis_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_hak_akses`, `pengguna_nama`, `pengguna_date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ketua', 'admin', '2021-03-09 17:23:57'),
(2, 'admin1', '21232f297a57a5a743894a0e4a801fc3', 'pengurus', 'admin', '2021-03-09 17:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_pinjaman`
--

CREATE TABLE `simkopsis_pinjaman` (
  `pinjaman_id` int(11) NOT NULL,
  `pinjaman_anggota_id` int(11) NOT NULL,
  `pinjaman_jenis` enum('modal-kerja-umkm','murabahah','musyarakah','ijarah') NOT NULL,
  `pinjaman_status` enum('tunggu','tolak','setuju','') NOT NULL,
  `pinjaman_total` double NOT NULL,
  `pinjaman_tenggat` int(11) NOT NULL,
  `pinjaman_keterangan` text NOT NULL,
  `pinjaman_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkopsis_pinjaman`
--

INSERT INTO `simkopsis_pinjaman` (`pinjaman_id`, `pinjaman_anggota_id`, `pinjaman_jenis`, `pinjaman_status`, `pinjaman_total`, `pinjaman_tenggat`, `pinjaman_keterangan`, `pinjaman_date_created`) VALUES
(1, 2, 'modal-kerja-umkm', 'setuju', 180000, 30, 'KREDIT MODAL KERJA : Kredit Modal Kerja Adalah fasilitas kredit yang diberikan untuk memenuhi kebutuhan modal kerja yang habis dalam satu siklus usaha dan atau kebutuhan modal kerja yang bersifat khusus seperti untuk membiayai inventory / piutang / proyek atau kebutuhan khusus lainnya.', '2021-05-06 06:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_simpanan`
--

CREATE TABLE `simkopsis_simpanan` (
  `simpanan_id` int(11) NOT NULL,
  `simpanan_anggota_id` int(11) NOT NULL,
  `simpanan_jenis` enum('tabungan-bisnis','deposito-rupiah','pendidikan','umroh','idul_fitri','wadiah') NOT NULL,
  `simpanan_total` double NOT NULL,
  `simpanan_keterangan` text NOT NULL,
  `simpanan_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkopsis_simpanan`
--

INSERT INTO `simkopsis_simpanan` (`simpanan_id`, `simpanan_anggota_id`, `simpanan_jenis`, `simpanan_total`, `simpanan_keterangan`, `simpanan_date_created`) VALUES
(1, 3, 'tabungan-bisnis', 10000000, 'TABUNGAN BISNIS : Tabungan Bisnis :  Mempersembahkan Tabungan Bisnis yang memberikan segala kemudahan dan kenyamanan.', '2021-05-06 06:37:27'),
(2, 2, 'tabungan-bisnis', 2000000, 'TABUNGAN BISNIS : Tabungan Bisnis :  Mempersembahkan Tabungan Bisnis yang memberikan segala kemudahan dan kenyamanan.', '2021-05-08 10:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_pinjaman`
--

CREATE TABLE `tbl_data_pinjaman` (
  `id_data_pinjaman` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_pinjaman` varchar(50) NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `jumlah_angsuran` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_pinjaman`
--

INSERT INTO `tbl_data_pinjaman` (`id_data_pinjaman`, `id_anggota`, `email`, `jenis_pinjaman`, `jumlah_pinjaman`, `jumlah_angsuran`, `tanggal`, `status`) VALUES
(1, 1, 'kikiagustin62@gmail.com', 'Kredit Modal Kerja', 100000000, 12, '2021-06-15 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fitur_kredit_pinjaman`
--

CREATE TABLE `tbl_fitur_kredit_pinjaman` (
  `id_fitur_kredit` int(11) NOT NULL,
  `nama_fitur` text NOT NULL,
  `id_produk_pinjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fitur_kredit_pinjaman`
--

INSERT INTO `tbl_fitur_kredit_pinjaman` (`id_fitur_kredit`, `nama_fitur`, `id_produk_pinjaman`) VALUES
(1, 'Limit kredit di atas Rp. 100 juta s.d Rp. 10 Milyar', 1),
(2, 'Kredit dapat diberikan dalam valuta Rupiah', 1),
(3, 'Jangka waktu sampai dengan 1 (satu) tahun dan dapat diperpanjang', 1),
(4, 'Sifat kredit revolving atau non revolving', 1),
(5, 'Limit kredit di atas Rp. 100 juta s.d Rp. 10 Milyar', 2),
(6, 'Kredit diberikan dalam valuta Rupiah', 2),
(7, 'Jangka waktu lebih dari 1 (satu) tahun', 2),
(8, 'Proses mudah dan cepat', 3),
(9, 'Persyaratan kredit yang ringan', 3),
(10, 'Agunan adalah berupa objek yang dibiayai.', 3),
(11, 'Suku bunga 6% efektif per tahun', 3),
(12, 'Agunan tambahan untuk KUR Mikro dan KUR Penempatan TKI tidak dipersyaratkan, sedangkan untuk KUR Ritel berupa tanah dan/ atau bangunan atau kendaraan bermotor, dengan bukti kepemilikan berupa SHM/ SHGB/ SHGU/ Hak Milik atas Satuan Rumah Susun atau BPKB.Nilai agunan minimal 70% dan maksimal < 100% dari nilai limit kredit.', 3),
(13, 'Proses kredit cepat dan mudah.', 4),
(14, 'Persyaratan kredit ringan.', 4),
(15, 'Limit hingga Rp.200 Juta.', 4),
(16, 'Jangka waktu sampai dengan 5 tahun.', 4),
(17, 'Agunan berupa objek yang dibiayai & fixed assets.', 4),
(18, 'Suku bunga bersaing dengan system perhitungan flat & fixed selama jangka waktu kredit.', 4),
(19, 'Angsuran tetap setiap bulannya.', 4),
(20, 'Jangka Waktu: Maksimal 1 (satu) tahun', 5),
(21, 'Pembiayaan: Bank Mandiri Maksimal 70% dari kebutuhan modal kerja dan pembiayaan sendiri minimal 30%.', 5),
(22, 'Jaminan Utama: Usaha yang dibiayai', 5),
(23, 'Jaminan Tambahan: Dipersyaratkan apabila menurut penilaian Bank diperlukan.', 5),
(24, 'Pembiayaan: maksimal 65% dari cost of project/objek yang dibiayai dan pembiayaan sendiri minimal 35%.', 6),
(25, 'Jaminan Utama: Objek/Proyek yang dibiayai', 6),
(26, 'Jaminan Tambahan: Dipersyaratkan apabila menurut penilaian Bank diperlukan', 6),
(27, 'Penarikan dapat dilakukan setiap saat sesuai kebutuhan usaha.', 5),
(28, 'Bagian yang belum ditarik tidak dikenakan bunga.', 5),
(29, 'Aktivasi keuangan disalurkan melalui rekening pinjaman dan atau rekening giro.', 5),
(30, 'Pencairan atas dasar prestasi', 6),
(31, 'Pencairan langsung dipindahkan ke rekening giro', 6),
(32, 'Besarnya Agunan disesuaikan dengan persentase pembiayaan', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manfaat_pinjaman`
--

CREATE TABLE `tbl_manfaat_pinjaman` (
  `id_manfaat_pinjaman` int(11) NOT NULL,
  `manfaat` text NOT NULL,
  `id_produk_pinjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembukaan_rekening`
--

CREATE TABLE `tbl_pembukaan_rekening` (
  `id_rekening` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jenis_rekening` varchar(40) NOT NULL,
  `jenis_kartu` varchar(40) NOT NULL,
  `tujuan` text NOT NULL,
  `foto_ktp` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembukaan_rekening`
--

INSERT INTO `tbl_pembukaan_rekening` (`id_rekening`, `id_anggota`, `jenis_rekening`, `jenis_kartu`, `tujuan`, `foto_ktp`, `status`) VALUES
(1, 1, 'Tabungan Bisnis', 'Silver GPN', 'Menabung', 'baru.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjaman`
--

CREATE TABLE `tbl_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `judul` varchar(90) NOT NULL,
  `ringkas` text NOT NULL,
  `lengkap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjaman`
--

INSERT INTO `tbl_pinjaman` (`id_pinjaman`, `judul`, `ringkas`, `lengkap`) VALUES
(1, 'UMKM', 'Hadirkan kemudahan dengan berbagai layanan pembiayaan yang sesuai dengan kebutuhan usaha mikro dan kecil (UMKM) Anda', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk_pinjaman`
--

CREATE TABLE `tbl_produk_pinjaman` (
  `id_produk_pinjaman` int(11) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `nama_pinjaman` varchar(80) NOT NULL,
  `ringkas_pinjaman` text NOT NULL,
  `detail_pinjaman` text NOT NULL,
  `url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk_pinjaman`
--

INSERT INTO `tbl_produk_pinjaman` (`id_produk_pinjaman`, `id_pinjaman`, `nama_pinjaman`, `ringkas_pinjaman`, `detail_pinjaman`, `url`) VALUES
(1, 1, 'Kredit Modal kerja', 'Hadirkan kemudahan untuk pembiayaan inventory/piutang/proyek dan kebutuhan modal kerja anda lainnya', 'Mandiri Kredit Modal Kerja Adalah fasilitas kredit yang diberikan untuk memenuhi kebutuhan modal kerja yang habis dalam satu siklus usaha dan atau kebutuhan modal kerja yang bersifat khusus seperti untuk membiayai inventory / piutang / proyek atau kebutuhan khusus lainnya.', 'modalKerja'),
(4, 1, 'Kredit Usaha Mikro (KUM)', 'Dukungan kredit untuk kebutuhan investasi serta kebutuhan modal kerja anda untuk usaha produktif maupun konsumtif skala mikro', 'Kredit Usaha Mikro (KUM) adalah kredit yang diberikan kepada pengusaha mikro untuk membiayai kebutuhan usaha produktif baik untuk kebutuhan investasi maupun kebutuhan modal kerja', 'usahaRakyat'),
(5, 2, 'Kredit Modal Kerja', 'Hadirkan kemudahan untuk pembiayaan inventori/ piutang/ proyek dan kebutuhan modal kerja anda', 'Fasilitas kredit jangka pendek yang diberikan dalam mata uang rupiah maupun valuta asing untuk membiayai kebutuhan modal kerja yang habis dalam satu siklus usaha dengan jangka waktu maksimal 1 (satu) tahun.', 'modalKerjaCorporate'),
(6, 2, 'Kredit Investasi', 'Nikamati fasiltas kredit untuk rehabilitasi, modernisasi, perluasan dan pendirian proyek baru sesuai kebutuhan investasi pengambangan usaha ada', 'Fasilitas kredit jangka menengah dan jangka panjang, yang diberikan dalam mata uang rupiah maupun valuta asing untuk pembiayaan pengadaan barang - barang modal untuk rehabilitasi, modernisasi, perluasan ataupun pendirian proyek baru maupun refinancing , yang pelunasannya bersumber dari hasil usaha dengan barang-barang modal yang dibiayai.', 'kreditInvestasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simpanan`
--

CREATE TABLE `tbl_simpanan` (
  `id_simpanan` int(11) NOT NULL,
  `nama_simpanan` varchar(70) NOT NULL,
  `pendek` text NOT NULL,
  `url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_simpanan`
--

INSERT INTO `tbl_simpanan` (`id_simpanan`, `nama_simpanan`, `pendek`, `url`) VALUES
(1, 'Tabungan Bisnis', 'Hadirkan layanan yang cepat, mudah dan jaringan yang luas tersebar di indonesia guna kelancaran transaksi bisnis anda', 'tabunganBisnis'),
(2, 'Deposito Rupiah', 'Pastikan memilih investasi yang memberi keuntungan rasa aman, terpercaya dan dapat di andalkan', 'depositoRupiah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `date_created`, `is_active`, `role_id`) VALUES
(1, 'Dinda Asanti Hardiningrat', 'mega@gmail.com', 'default.png', '$2y$10$6ZuXGMXTwG/0Q4y0/pDnSumjrLy1L.SfhTPciUG1BWKrY9xJRxtx.', 1619648448, 0, 2),
(2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 'default.png', '$2y$10$FjaWywSMCbPD0H3YwF951uA1DW49KuVtQKSe92Fn5LwPP8Ol7mFlO', 1623426200, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `simkopsis_anggota`
--
ALTER TABLE `simkopsis_anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indexes for table `simkopsis_angsuran`
--
ALTER TABLE `simkopsis_angsuran`
  ADD PRIMARY KEY (`angsuran_id`);

--
-- Indexes for table `simkopsis_pengguna`
--
ALTER TABLE `simkopsis_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `simkopsis_pinjaman`
--
ALTER TABLE `simkopsis_pinjaman`
  ADD PRIMARY KEY (`pinjaman_id`);

--
-- Indexes for table `simkopsis_simpanan`
--
ALTER TABLE `simkopsis_simpanan`
  ADD PRIMARY KEY (`simpanan_id`);

--
-- Indexes for table `tbl_data_pinjaman`
--
ALTER TABLE `tbl_data_pinjaman`
  ADD PRIMARY KEY (`id_data_pinjaman`);

--
-- Indexes for table `tbl_fitur_kredit_pinjaman`
--
ALTER TABLE `tbl_fitur_kredit_pinjaman`
  ADD PRIMARY KEY (`id_fitur_kredit`);

--
-- Indexes for table `tbl_manfaat_pinjaman`
--
ALTER TABLE `tbl_manfaat_pinjaman`
  ADD PRIMARY KEY (`id_manfaat_pinjaman`);

--
-- Indexes for table `tbl_pembukaan_rekening`
--
ALTER TABLE `tbl_pembukaan_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_pinjaman`
--
ALTER TABLE `tbl_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `tbl_produk_pinjaman`
--
ALTER TABLE `tbl_produk_pinjaman`
  ADD PRIMARY KEY (`id_produk_pinjaman`);

--
-- Indexes for table `tbl_simpanan`
--
ALTER TABLE `tbl_simpanan`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `simkopsis_anggota`
--
ALTER TABLE `simkopsis_anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `simkopsis_angsuran`
--
ALTER TABLE `simkopsis_angsuran`
  MODIFY `angsuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `simkopsis_pengguna`
--
ALTER TABLE `simkopsis_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `simkopsis_pinjaman`
--
ALTER TABLE `simkopsis_pinjaman`
  MODIFY `pinjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `simkopsis_simpanan`
--
ALTER TABLE `simkopsis_simpanan`
  MODIFY `simpanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_data_pinjaman`
--
ALTER TABLE `tbl_data_pinjaman`
  MODIFY `id_data_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fitur_kredit_pinjaman`
--
ALTER TABLE `tbl_fitur_kredit_pinjaman`
  MODIFY `id_fitur_kredit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_manfaat_pinjaman`
--
ALTER TABLE `tbl_manfaat_pinjaman`
  MODIFY `id_manfaat_pinjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pembukaan_rekening`
--
ALTER TABLE `tbl_pembukaan_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pinjaman`
--
ALTER TABLE `tbl_pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_produk_pinjaman`
--
ALTER TABLE `tbl_produk_pinjaman`
  MODIFY `id_produk_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_simpanan`
--
ALTER TABLE `tbl_simpanan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
