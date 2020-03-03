-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Agu 2017 pada 06.55
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbklinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarberobat`
--

CREATE TABLE `daftarberobat` (
  `id` int(11) NOT NULL,
  `nomor` int(3) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `idpasien` int(11) NOT NULL,
  `tgl_berobat` date NOT NULL,
  `jamdaftar` time NOT NULL,
  `jam_layanan` varchar(255) NOT NULL,
  `lama` int(11) NOT NULL,
  `jam_kedatangan` time NOT NULL,
  `jenispenyakit` varchar(255) NOT NULL,
  `analisis` varchar(255) NOT NULL,
  `masuk` varchar(1) NOT NULL DEFAULT 'N',
  `diagnosa` varchar(255) NOT NULL,
  `terapi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftarberobat`
--

INSERT INTO `daftarberobat` (`id`, `nomor`, `nama`, `idpasien`, `tgl_berobat`, `jamdaftar`, `jam_layanan`, `lama`, `jam_kedatangan`, `jenispenyakit`, `analisis`, `masuk`, `diagnosa`, `terapi`) VALUES
(142, 1, 'Cendikia Azwar Abdullah', 4, '2017-07-08', '00:00:00', '07.00 - 11.00', 9, '07:00:00', 'Berat', 'Pusing, mual, dada sesak', 'Y', 'maag', 'magdasida, ranitidin.'),
(143, 2, 'Afrijal', 8, '2017-07-08', '00:00:00', '07.00 - 11.00', 7, '07:09:00', 'Ringan', 'affafaf', 'Y', '', ''),
(144, 3, 'Angga', 6, '2017-07-08', '00:00:00', '07.00 - 11.00', 9, '07:16:00', 'Berat', 'affafaf', 'N', '', ''),
(146, 1, 'Angga', 6, '2017-07-09', '00:00:00', '07.00 - 11.00', 9, '07:00:00', 'Berat', 'affafaf', 'Y', '', ''),
(148, 1, 'Angga', 6, '2017-07-10', '00:00:00', '07.00 - 11.00', 7, '07:00:00', 'Ringan', '35647', 'N', '', ''),
(149, 1, 'Cendikia Azwar Abdullah', 4, '2017-07-11', '00:00:00', '07.00 - 11.00', 9, '07:00:00', 'Berat', 'asd', 'Y', 'demam', 'paracetamol'),
(150, 2, 'Rio Fernando', 16, '2017-07-11', '00:00:00', '07.00 - 11.00', 9, '07:09:00', 'Berat', 'jkl', 'Y', '', ''),
(151, 1, 'Rio Fernando', 16, '2017-07-11', '00:00:00', '16.00 - 20.00', 7, '16:00:00', 'Ringan', 'vb', 'N', '', ''),
(155, 3, 'qwe', 19, '2017-07-11', '00:00:00', '07.00 - 11.00', 7, '07:18:00', 'Ringan', 'Sakit', 'N', '', ''),
(156, 1, 'Cendikia Azwar Abdullah', 4, '2017-07-12', '00:00:00', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'Maag', 'N', 'demam', 'bodrex'),
(157, 1, 'Angga', 6, '2017-07-12', '00:00:00', '16.00 - 20.00', 9, '16:00:00', 'Berat', 'sakit gigi', 'N', '', ''),
(158, 2, 'Cendikia Azwar Abdullah', 4, '2017-07-12', '00:00:00', '16.00 - 20.00', 7, '16:09:00', 'Ringan', 'afa', 'N', '', ''),
(162, 1, 'Cendikia Azwar Abdullah', 4, '2017-07-13', '15:13:32', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'ss', 'N', '', ''),
(163, 1, 'Angga', 6, '2017-07-14', '10:51:32', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'asdf', 'Y', 'Maag', 'Ranitidin'),
(164, 2, 'Afrijal', 8, '2017-07-14', '10:52:21', '07.00 - 11.00', 7, '07:07:00', 'Ringan', 'qwer', 'N', '', ''),
(165, 3, 'Afrijal', 8, '2017-07-12', '09:12:49', '16.00 - 20.00', 7, '16:16:00', 'Ringan', 'aaa', 'N', '', ''),
(166, 3, 'Cendikia Azwar Abdullah', 4, '2017-07-14', '11:26:31', '07.00 - 11.00', 7, '07:14:00', 'Ringan', 'Sakit', 'N', '', ''),
(167, 1, 'Cendikia Azwar Abdullah', 4, '2017-07-14', '11:34:26', '16.00 - 20.00', 7, '16:00:00', 'Ringan', 'Pusing', 'N', '', ''),
(168, 1, 'Fariz', 7, '2017-07-19', '08:15:32', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'Maag', 'Y', '', ''),
(169, 2, 'Cendikia Azwar Abdullah', 4, '2017-07-19', '08:15:59', '07.00 - 11.00', 7, '07:07:00', 'Ringan', 'Maag', 'Y', '', ''),
(170, 3, 'Angga', 6, '2017-07-19', '08:16:42', '07.00 - 11.00', 9, '07:14:00', 'Berat', 'DBD', 'N', '', ''),
(171, 4, 'Rosit Ilham', 17, '2017-07-19', '08:17:13', '07.00 - 11.00', 7, '07:23:00', 'Ringan', 'Flue', 'N', '', ''),
(172, 1, 'Cendikia Azwar Abdullah', 4, '2017-07-20', '07:46:40', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'Maag', 'Y', '', ''),
(173, 2, 'Angga', 6, '2017-07-20', '07:48:05', '07.00 - 11.00', 9, '07:07:00', 'Berat', 'DBD', 'Y', '', ''),
(174, 1, 'Cendikia Azwar Abdullah', 4, '2017-07-24', '09:57:28', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'Pusing', 'N', '', ''),
(175, 1, 'Cendikia Azwar Abdullah', 4, '2017-08-03', '06:04:16', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'Pilek', 'Y', '', ''),
(176, 1, 'Cendikia Azwar Abdullah', 4, '2017-08-04', '06:06:15', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'Pilek', 'N', '', ''),
(177, 1, 'Cendikia Azwar Abdullah', 4, '2017-08-05', '06:08:40', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'Pilek', 'N', '', ''),
(178, 1, 'Fariz', 7, '2017-08-02', '10:46:03', '07.00 - 11.00', 7, '07:00:00', 'Ringan', 'Demam', 'Y', '', ''),
(179, 2, 'Shifa Alfiandra', 12, '2017-08-03', '08:05:03', '07.00 - 11.00', 7, '07:07:00', 'Ringan', 'Maag', 'Y', '', ''),
(180, 1, 'Cendikia Azwar Abdullah', 4, '2017-08-04', '08:34:15', '16.00 - 20.00', 9, '16:00:00', 'Berat', 'Maag', 'N', '', ''),
(181, 3, 'Angga', 6, '2017-08-03', '11:42:49', '07.00 - 11.00', 7, '07:14:00', 'Ringan', 'Pilek', 'Y', '', ''),
(182, 4, 'Rio Fernando', 16, '2017-08-03', '11:43:08', '07.00 - 11.00', 7, '07:21:00', 'Ringan', 'Demam', 'Y', '', ''),
(183, 5, 'Hizkia F', 20, '2017-08-03', '11:50:19', '07.00 - 11.00', 7, '07:28:00', 'Ringan', 'Demam', 'N', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT '3',
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`iduser`, `username`, `password`, `role_id`, `active`) VALUES
(1, 'Dokter', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'Y'),
(2, 'Admin', '202cb962ac59075b964b07152d234b70', 2, 'Y'),
(27, 'rio', '202cb962ac59075b964b07152d234b70', 3, 'Y'),
(32, 'byu56', '202cb962ac59075b964b07152d234b70', 3, 'Y'),
(19, 'afrijal', '202cb962ac59075b964b07152d234b70', 3, 'Y'),
(30, 'feri', '202cb962ac59075b964b07152d234b70', 3, 'Y'),
(17, 'angga', '202cb962ac59075b964b07152d234b70', 3, 'Y'),
(18, 'faris', '202cb962ac59075b964b07152d234b70', 3, 'Y'),
(29, 'rosit', '202cb962ac59075b964b07152d234b70', 3, 'Y'),
(23, 'shf', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'Y'),
(15, 'cendikia', 'b59c67bf196a4758191e42f76670ceba', 3, 'Y'),
(33, 'hizkia', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `umur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`idpasien`, `iduser`, `nama`, `no_ktp`, `tgl_lahir`, `jk`, `alamat`, `telepon`, `umur`) VALUES
(4, 15, 'Cendikia Azwar Abdullah', '3300199608190011', '1996-08-19', 'L', 'Saputra', '082128783490', '21'),
(6, 17, 'Angga', '3322199608193212', '1996-04-29', 'L', 'Perum', '081230456418', '21'),
(7, 18, 'Fariz', '0', '1996-04-29', 'L', 'Saputra', '081230456418', '21'),
(8, 19, 'Afrijal', '3322199608193219', '1998-06-30', 'L', 'Kepo', '082128783490', '20'),
(12, 23, 'Shifa Alfiandra', '0', '1997-07-21', 'P', 'Sumber', '082128783490', '20'),
(16, 27, 'Rio Fernando', '0', '1996-02-23', 'L', 'Kesambi', '081230456418', '21'),
(17, 29, 'Rosit Ilham', '0', '1996-07-08', 'L', 'gsxhdh', '0231887788', '21'),
(18, 30, 'Feri Ardiansyah', '3322199608193214', '1997-07-09', 'L', 'Kepo', '081230456418', '21'),
(19, 32, 'qwe', '86987', '1997-03-02', 'P', 'drajat', '0874252757', '15'),
(20, 33, 'Hizkia F', '33111908081996', '1997-03-02', 'L', 'Wahidin', '0874252757', '22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `application_title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role_name`, `alias`, `application_title`) VALUES
(1, 'dokter', 'Bagian Dokter', 'Panel Dokter'),
(2, 'admin', 'Bagian Admin', 'Panel Admin'),
(3, 'pasien', 'Bagian Pasien', 'Panel Pasien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarberobat`
--
ALTER TABLE `daftarberobat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`,`alias`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarberobat`
--
ALTER TABLE `daftarberobat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idpasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
