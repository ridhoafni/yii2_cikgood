-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 06:19 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fs_contoh`
--

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id_kwitansi` int(12) NOT NULL,
  `tgl_kwitansi` date DEFAULT NULL,
  `kegiatan` int(12) NOT NULL,
  `mak` int(12) NOT NULL,
  `keterangan` text NOT NULL,
  `ppn` enum('0','10') NOT NULL,
  `total` varchar(100) DEFAULT NULL,
  `kepada` int(12) DEFAULT NULL,
  `pegawai` varchar(100) NOT NULL,
  `no_spd` varchar(100) NOT NULL,
  `tgl_spd` date NOT NULL,
  `no_bukti` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(12) NOT NULL,
  `jabatan3` int(12) NOT NULL,
  `pegawai3` int(12) NOT NULL,
  `jabatan2` int(12) NOT NULL,
  `pegawai2` int(12) NOT NULL,
  `pegawai1` int(12) NOT NULL,
  `jabatan1` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id_kwitansi`, `tgl_kwitansi`, `kegiatan`, `mak`, `keterangan`, `ppn`, `total`, `kepada`, `pegawai`, `no_spd`, `tgl_spd`, `no_bukti`, `created_date`, `created_by`, `jabatan3`, `pegawai3`, `jabatan2`, `pegawai2`, `pegawai1`, `jabatan1`) VALUES
(15, '2018-01-15', 1, 8, 'Biaya Settingan dan Cetak Leaflet Penerimaan Mahasiswa Baru dalam rangka sosialisasi Penerimaan Mahasiswa Baru UIN Suska Riau TA. 2018/2019 di Provinsi Riau dan Kepulauan Riau', '10', '14960000', 4, '', '', '0000-00-00', '-', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0),
(16, NULL, 1, 10, 'Biaya Perjalanan Dinas an. Hadi Saputra dalam rangka Sosialisasi Penerimaan Mahasiswa Baru UIN Sultan Syarif Kasim Riau Tahun Akademik 2018/2019 di Kabupaten Pelalawan, Inhu, dan Inhil selama 4 Hari pada tanggal 5 s.d 8 Februari 2018 berdasarkan Surat Tugas Rektor Nomor :             Tanggal 3 Februari 2018', '0', '2205000', NULL, '14', 'Un.04/PPK/           /2018', '2018-02-13', '', '2018-02-10 00:00:00', 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi_detail`
--

CREATE TABLE `kwitansi_detail` (
  `id_kd` int(12) NOT NULL,
  `id_kwitansi` int(12) NOT NULL,
  `kegiatan` varchar(250) NOT NULL,
  `volume` int(12) NOT NULL,
  `satuan` int(12) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwitansi_detail`
--

INSERT INTO `kwitansi_detail` (`id_kd`, `id_kwitansi`, `kegiatan`, `volume`, `satuan`, `harga`, `created_date`, `created_by`) VALUES
(10, 15, 'Settingan dan Pencetakan Leaflet UIN Suska Riau', 3000, 13, '3200', '2018-02-12 00:00:00', 1),
(11, 15, 'Cetak Leaflet SNMPTN dan SBMPTN 2018', 2000, 13, '2000', '2018-02-12 00:00:00', 1),
(14, 16, 'Uang Harian di Riau', 4, 14, '370000', '2018-02-10 00:00:00', 1),
(15, 16, 'Hotel di Inhu ', 1, 3, '475000', '2018-02-10 00:00:00', 1),
(16, 16, 'Hotel di Inhil (450.000 x 30% = 125.000)', 2, 3, '125000', '2018-02-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1493937473),
('m130524_201442_init', 1493937485);

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` int(12) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(12) NOT NULL,
  `nama_satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Paket'),
(2, 'Hari'),
(3, 'Malam'),
(4, 'Shift'),
(12, 'Eksemplar'),
(13, 'Lembar'),
(14, 'Hari'),
(15, 'Bulan'),
(16, 'Paket'),
(17, 'Kotak'),
(18, 'Box'),
(19, 'Unit'),
(20, 'Buah'),
(21, 'Kali'),
(22, 'Pack'),
(23, 'Meter'),
(24, 'Rim'),
(25, 'Orang'),
(26, 'Bungkus'),
(27, 'Karton');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_user` enum('writer','admin','super admin') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `level_user`, `email`, `status`, `created_at`, `updated_at`, `unit`) VALUES
(2, 'yura', 'TUqxZ7GQxCn8tvuH9NUh6daBdcp0WLbQ', '$2y$13$o/ryLlCbmYRpXOiKxd8OJurktk1rejJW25Pb.dyH2l/6TgwqvzrvK', NULL, 'writer', 'yura@gmail.com', 10, 1504312367, 1504312367, ''),
(12, 'admin', 'KduyQAIS05SIGiAS4enpE6ho64QrtFR_', '$2y$13$VM1DMJ9mmKICezokNSyvCu7fmFx9P93RzIFzbCuvUYEVPkUinc8xy', NULL, 'writer', 'admin@gmail.com', 10, 1504533573, 1504533573, ''),
(24, '198407272006041002', 'l4DGM62uUUosykpni98SzCDeq1vOpvNV', '$2y$13$IZEhg9NludlUempw20qtMOzpLjGu3oYai69CHFZ.x6fNJJxDWMLQ6', NULL, 'admin', '198407272006041002@gmail.com', 10, 1525689501, 1525946418, 'Bagian Akademik Biro AUPK UIN SUSKA RIAU'),
(25, 'youkai', 'pN_uqKebzvJLQpTfM4yH9jehQjcJ60L4', '$2y$13$YIAVvf90nS.6VE..3IJU8uZD5DdmjO79nuLVr/sBUJ3mjsgnWBoWm', NULL, 'super admin', 'youkai@gmail.com', 10, 1525946149, 1525946149, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indexes for table `kwitansi_detail`
--
ALTER TABLE `kwitansi_detail`
  ADD PRIMARY KEY (`id_kd`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id_kwitansi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `kwitansi_detail`
--
ALTER TABLE `kwitansi_detail`
  MODIFY `id_kd` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id_penerima` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
