-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 05:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian_posyandu`
--

CREATE TABLE `antrian_posyandu` (
  `id_antrian` int(11) NOT NULL,
  `jenis_layanan` enum('Bayi dan Balita','Ibu Hamil') NOT NULL,
  `tanggal_pendaftaran` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian_posyandu`
--

INSERT INTO `antrian_posyandu` (`id_antrian`, `jenis_layanan`, `tanggal_pendaftaran`) VALUES
(28, 'Bayi dan Balita', '2023-06-16 07:39:23'),
(29, 'Bayi dan Balita', '2023-06-16 07:40:00'),
(30, 'Bayi dan Balita', '2023-06-16 07:40:12'),
(31, 'Ibu Hamil', '2023-06-16 07:49:32'),
(32, 'Ibu Hamil', '2023-06-16 07:49:59'),
(33, 'Bayi dan Balita', '2023-06-16 07:50:34'),
(34, 'Bayi dan Balita', '2023-06-16 07:52:56'),
(35, 'Bayi dan Balita', '2023-06-16 07:53:12'),
(36, 'Ibu Hamil', '2023-06-16 07:54:22'),
(37, 'Bayi dan Balita', '2023-06-16 07:58:24'),
(38, 'Ibu Hamil', '2023-06-16 07:59:27'),
(39, 'Ibu Hamil', '2023-06-16 08:00:42'),
(40, 'Ibu Hamil', '2023-06-16 08:03:31'),
(41, 'Ibu Hamil', '2023-06-16 08:03:39'),
(42, 'Ibu Hamil', '2023-06-16 08:04:09'),
(43, 'Bayi dan Balita', '2023-06-16 08:06:33'),
(44, 'Bayi dan Balita', '2023-06-16 08:07:35'),
(45, 'Bayi dan Balita', '2023-06-16 08:07:44'),
(46, 'Bayi dan Balita', '2023-06-16 08:08:08'),
(47, 'Bayi dan Balita', '2023-06-16 08:08:22'),
(48, 'Bayi dan Balita', '2023-06-16 08:09:03'),
(49, 'Bayi dan Balita', '2023-06-16 08:11:04'),
(50, 'Bayi dan Balita', '2023-06-16 08:11:30'),
(51, 'Bayi dan Balita', '2023-06-16 08:17:19'),
(52, 'Bayi dan Balita', '2023-06-16 09:05:22'),
(53, 'Bayi dan Balita', '2023-06-16 09:21:03'),
(54, 'Bayi dan Balita', '2023-06-16 09:23:12'),
(55, 'Bayi dan Balita', '2023-06-16 10:42:21'),
(56, 'Bayi dan Balita', '2023-06-16 13:19:10'),
(57, 'Bayi dan Balita', '2023-06-16 13:21:21'),
(58, 'Bayi dan Balita', '2023-06-16 13:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `bulan_pembayaran`
--

CREATE TABLE `bulan_pembayaran` (
  `id_bulan_pembayaran` int(11) NOT NULL,
  `nama_bulan` enum('januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember') NOT NULL,
  `tahun` int(4) NOT NULL,
  `pembayaran_perminggu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan_pembayaran`
--

INSERT INTO `bulan_pembayaran` (`id_bulan_pembayaran`, `nama_bulan`, `tahun`, `pembayaran_perminggu`) VALUES
(1, 'januari', 2021, 5000),
(2, 'februari', 2021, 4000),
(3, 'juli', 2020, 5000),
(4, 'desember', 2020, 15000),
(5, 'januari', 2024, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `jumlah_pengeluaran` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pengeluaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `beratbadan` varchar(100) NOT NULL,
  `umurkehamilan` varchar(100) NOT NULL,
  `tekanandarah` varchar(100) NOT NULL,
  `antrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `jumlah_pengeluaran`, `keterangan`, `tanggal_pengeluaran`, `id_user`, `alamat`, `beratbadan`, `umurkehamilan`, `tekanandarah`, `antrian`) VALUES
(4, '081234567890', 'Aisyah', 1686912953, 1, 'Surabaya', '67 kg', '7 bulan', '140/80 mmHg', 24),
(8, '081234567890', 'Berliana', 1686912964, 1, 'Sby', '80 kg', '7 bulan', '139/72 mmHg', 25),
(11, '081234567890', 'Ocxa', 1686912970, 1, 'Gresik', '66 kg', '6 bulan', '130/82 mmHg', 26),
(23, '081234567890', 'Summer', 1686912975, 1, 'Gajah Magersari, Sidoarjo', '71 kg', '3 bulan', '144/80 mmHg', 27),
(26, '081234567890', 'Bella', 1686912981, 1, 'Surabaya', '47 kg', '9 bulan', '141/70 mmHg', 28),
(33, '081234567890', 'Jasmine', 1686913009, 1, 'Prasung', '40 kg', '2 bulan', '120/30 mmHg', 31),
(35, '081234567890', 'Charlotte', 1686913055, 1, 'Surabaya', '67 kg', '6 bulan', '130/82 mmHg', 39),
(36, '081234567890', 'Sofia', 1686913061, 1, 'Prasung', '67 kg', '3 bulan', '144/80 mmHg', 40),
(37, '081234567890', 'Isabella', 1686913065, 1, 'Gajah Magersari, Sidoarjo', '57 kg', '7 bulan', '141/70 mmHg', 41),
(44, '081234567890', 'Sophia', 1686913071, 1, 'Gresik', '67 kg', '3 bulan', '139/72 mmHg', 42),
(45, '081234567890', 'Amelia', 1686913082, 1, 'Gajah Magersari, Sidoarjo', '57 kg', '9 bulan', '120/30 mmHg', 43),
(46, '081234567890', 'Mia', 1686913087, 1, 'Malang', '57 kg', '7 bulan', '120/30 mmHg', 44),
(47, '081234567890', 'Emma', 1686913092, 1, 'Malang', '57 kg', '7 bulan', '120/30 mmHg', 45),
(48, '081234567890', 'Ava', 1686913101, 1, 'Malang', '66 kg', '6 bulan', '140/80 mmHg', 46),
(49, '081234567890', 'Ella', 1686913107, 1, 'Bali', '47 kg', '9 bulan', '144/80 mmHg', 47),
(50, '081234567890', 'Tinna', 1686913112, 1, 'Bali', '67 kg', '2 bulan', '120/30 mmHg', 48),
(51, '081234567890', 'Rani', 1686913118, 1, 'Malang', '67 kg', '3 bulan', '130/82 mmHg', 49);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tgl_periksa` int(11) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bb_anak` varchar(11) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `antrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `tgl_periksa`, `jenis_kelamin`, `no_telepon`, `email`, `bb_anak`, `catatan`, `antrian`) VALUES
(1, 'Firman ', 1686912927, 'pria', '2 tahun', '68 cm', '8 kg', 'Pertumbuhan fisik, berat badan, tinggi badan, dan lingkar kepala bayi/balita dalam rentang normal', 19),
(2, 'Dhavina', 1686912933, 'wanita', '4 tahun', '94 cm', '13 kg', 'Mencatat jenis makanan yang dikonsumsi bayi/balita, mulai dari ASI (Air Susu Ibu) dan MPASI', 20),
(3, 'Azzahra', 1686912937, 'wanita', '4 tahun', '90 cm', '12 kg', 'Mencatat jenis &amp; tanggal imunisasi sesuai dengan jadwal imunisasi yang direkomendasikan', 21),
(4, 'Annisa', 1686912941, 'wanita', '3 tahun', '88 cmn', '12 kg', 'Mencatat perkembangan kemampuan bicara bayi/balita, seperti perkembangan kemampuan mengucapkan suara', 22),
(5, 'Sandy', 1686912946, 'pria', '1 tahun', '70 cm', '10 kg', ' Memantau perkembangan sosial dan emosional bayi/balita, seperti interaksi dengan orang lain', 23),
(6, 'Sarah', 1686912988, 'wanita', '3 tahun', '90 cm', '13 kg', 'Memantau perkembangan kemampuan motorik, seperti kemampuan  merangkak dan berjalan', 29),
(7, 'Summer', 1686912998, 'wanita', '5 tahun', '105 cm', '20 kg', 'Mencatat jenis &amp; tanggal imunisasi sesuai dengan jadwal imunisasi yang direkomendasikan', 30),
(11, 'Tegar', 1686913015, 'pria', '1 tahun', '7 cm', '71 kg', 'Mencatat jenis makanan yang dikonsumsi bayi/balita, mulai dari ASI (Air Susu Ibu) dan MPASI', 32),
(13, 'Summer', 1686913021, 'wanita', '2 tahun', '13 cm', '82 kg', 'Memantau perkembangan kemampuan motorik, seperti kemampuan  merangkak dan berjalan', 33),
(14, 'Sophia', 1686913026, 'wanita', '2 tahun', '19 cm', '12 kg', 'Mencatat pola tidur bayi/balita, termasuk jumlah tidur siang dan malam serta durasi tidur', 34),
(15, 'Charlotte', 1686913033, 'wanita', '1 tahun', '19 cm', '22 kg', 'Mencatat pola tidur bayi/balita, termasuk jumlah tidur siang dan malam serta durasi tidur', 35),
(16, 'Keith', 1686913038, 'wanita', '1 tahun', '15 cm', '21 kg', 'Mencatat pola tidur bayi/balita, termasuk jumlah tidur siang dan malam serta durasi tidur', 36),
(17, 'Heather', 1686913043, 'wanita', '1 tahun', '28 cm', '20 kg', ' Memantau perkembangan sosial dan emosional bayi/balita, seperti interaksi dengan orang lain', 37),
(18, 'John', 1686913048, 'pria', '4 tahun', '50 cm', '12 kg', 'Mencatat perkembangan kemampuan bicara bayi/balita, seperti perkembangan kemampuan mengucapkan suara', 38),
(19, 'Sean', 1686913134, 'pria', '3 tahun', '57 cm', '11 kg', 'Mencatat jenis makanan yang dikonsumsi bayi/balita, mulai dari ASI (Air Susu Ibu) dan MPASI', 51);

-- --------------------------------------------------------

--
-- Table structure for table `uang_kas`
--

CREATE TABLE `uang_kas` (
  `id_uang_kas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_bulan_pembayaran` int(11) NOT NULL,
  `minggu_ke_1` int(11) DEFAULT NULL,
  `minggu_ke_2` int(11) DEFAULT NULL,
  `minggu_ke_3` int(11) DEFAULT NULL,
  `minggu_ke_4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uang_kas`
--

INSERT INTO `uang_kas` (`id_uang_kas`, `id_siswa`, `id_bulan_pembayaran`, `minggu_ke_1`, `minggu_ke_2`, `minggu_ke_3`, `minggu_ke_4`) VALUES
(1, 1, 1, 5000, 5000, 5000, 5000),
(2, 2, 1, 2000, 0, 0, 0),
(3, 3, 1, 5000, 0, 0, 0),
(4, 4, 1, 1000, 0, 0, 0),
(5, 1, 2, 4000, 4000, 0, 0),
(6, 2, 2, 3000, 0, 0, 0),
(7, 3, 2, 3000, 0, 0, 0),
(8, 4, 2, 1000, 0, 0, 0),
(9, 1, 3, 5000, 0, 0, 0),
(10, 2, 3, 0, 0, 0, 0),
(11, 3, 3, 0, 0, 0, 0),
(12, 4, 3, 0, 0, 0, 0),
(13, 6, 3, 4000, 0, 0, 0),
(14, 5, 3, 5000, 0, 0, 0),
(15, 1, 4, 0, 0, 0, 0),
(16, 2, 4, 0, 0, 0, 0),
(17, 3, 4, 0, 0, 0, 0),
(18, 4, 4, 0, 0, 0, 0),
(19, 5, 4, 0, 0, 0, 0),
(20, 1, 5, 0, 0, 0, 0),
(21, 2, 5, 0, 0, 0, 0),
(22, 3, 5, 0, 0, 0, 0),
(23, 4, 5, 0, 0, 0, 0),
(24, 5, 5, 0, 0, 0, 0),
(25, 6, 5, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `id_jabatan`) VALUES
(1, 'admin', 'admin', '$2y$10$FTpPcxResiVj6Hw/Qt7Gx.YVtNxp.GJdkedIJpiDJHVc93hO/Fph6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian_posyandu`
--
ALTER TABLE `antrian_posyandu`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indexes for table `bulan_pembayaran`
--
ALTER TABLE `bulan_pembayaran`
  ADD PRIMARY KEY (`id_bulan_pembayaran`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD PRIMARY KEY (`id_uang_kas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_bulan_pembayaran` (`id_bulan_pembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian_posyandu`
--
ALTER TABLE `antrian_posyandu`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `bulan_pembayaran`
--
ALTER TABLE `bulan_pembayaran`
  MODIFY `id_bulan_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `uang_kas`
--
ALTER TABLE `uang_kas`
  MODIFY `id_uang_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
