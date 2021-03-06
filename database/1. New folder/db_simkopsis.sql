-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 11:27 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `anggota_jk` enum('L','P') NOT NULL,
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
  `anggota_dokumen` text,
  `anggota_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_angsuran`
--

CREATE TABLE `simkopsis_angsuran` (
  `angsuran_id` int(11) NOT NULL,
  `angsuran_pinjaman_id` int(11) NOT NULL,
  `angsuran_jumlah` double NOT NULL,
  `angsuran_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkopsis_pengguna`
--

INSERT INTO `simkopsis_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_hak_akses`, `pengguna_nama`, `pengguna_date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ketua', 'admin', '2021-03-09 17:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_pinjaman`
--

CREATE TABLE `simkopsis_pinjaman` (
  `pinjaman_id` int(11) NOT NULL,
  `pinjaman_anggota_id` int(11) NOT NULL,
  `pinjaman_jenis` enum('mudharobah','murabahah','musyarakah','ijarah') NOT NULL,
  `pinjaman_total` double NOT NULL,
  `pinjaman_tenggat` int(11) NOT NULL,
  `pinjaman_keterangan` text NOT NULL,
  `pinjaman_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_simpanan`
--

CREATE TABLE `simkopsis_simpanan` (
  `simpanan_id` int(11) NOT NULL,
  `simpanan_anggota_id` int(11) NOT NULL,
  `simpanan_jenis` enum('amanah','kurban','pendidikan','umroh','idul_fitri','wadiah') NOT NULL,
  `simpanan_total` double NOT NULL,
  `simpanan_keterangan` text NOT NULL,
  `simpanan_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `angsuran_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simkopsis_pengguna`
--
ALTER TABLE `simkopsis_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `simkopsis_pinjaman`
--
ALTER TABLE `simkopsis_pinjaman`
  MODIFY `pinjaman_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simkopsis_simpanan`
--
ALTER TABLE `simkopsis_simpanan`
  MODIFY `simpanan_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
