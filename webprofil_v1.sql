-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 12, 2022 at 03:26 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprofil_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `IdAnggota` varchar(15) NOT NULL,
  `KodeJabatan` int(11) NOT NULL,
  `NamaLengkap` varchar(150) NOT NULL,
  `Telp` varchar(15) DEFAULT NULL,
  `Kelamin` varchar(15) NOT NULL DEFAULT 'L',
  `IsAktif` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`IdAnggota`, `KodeJabatan`, `NamaLengkap`, `Telp`, `Kelamin`, `IsAktif`) VALUES
('000000000000001', 1, 'kak seto', '081554466423', 'L', 1),
('000000000000002', 2, 'bu tiyo', '081082083084', 'W', 1),
('000000000000003', 3, 'shiva', '089089089089', 'L', 1),
('000000000000004', 4, 'choota beem', '089089089089', 'L', 1),
('000000000000005', 5, 'naruto shippuden', '089089089089', 'L', 1),
('000000000000006', 6, 'doraemon', '089089089089', 'L', 1),
('000000000000007', 6, 'nobita', '089089089089', 'L', 1),
('000000000000008', 6, 'uciha madara', '089089089089', 'L', 1),
('000000000000009', 6, 'nescafe coffe mix', '089089089089', 'L', 1),
('000000000000010', 7, 'puan maharani', '089089089089', 'W', 1),
('000000000000011', 7, 'pak jarwo kuwat', '089089089089', 'L', 1),
('000000000000012', 8, 'tante ernie', '089089089089', 'W', 1),
('000000000000013', 9, 'mawar', '089089089089', 'W', 1),
('000000000000015', 10, 'leonel messi', '089089089089', 'L', 1),
('000000000000016', 11, 'Irsad', '089089089089', 'L', 1);

-- --------------------------------------------------------

--
-- Table structure for table `filependukung`
--

CREATE TABLE `filependukung` (
  `KodePerson` varchar(14) NOT NULL,
  `IdPos` varchar(14) NOT NULL,
  `NoUrut` int(11) NOT NULL,
  `NamaFile` varchar(100) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Path` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filependukung`
--

INSERT INTO `filependukung` (`KodePerson`, `IdPos`, `NoUrut`, `NamaFile`, `Keterangan`, `Path`) VALUES
('PRS-0000001', 'POS-0009', 1, 'File Pendukung Artikel 1', NULL, 'sup/2c8ec4fccf316f382e0bcd726305c3d5.jpg'),
('PRS-0000001', 'POS-0010', 1, 'File Pendukung Artikel 1', NULL, 'sup/5674c3b7d6ecce5e5fed0fe6666f7bf0.jpeg'),
('PRS-0000001', 'POS-0010', 2, 'File Pendukung Artikel 2', NULL, 'sup/82bbb6d7f51a50b877445fa160d576ea.png'),
('PRS-0000001', 'POS-0011', 1, 'File Pendukung Artikel 1', NULL, 'sup/01e627dedbe4307184bea97117c8721b.jpg'),
('PRS-0000001', 'POS-0011', 2, 'File Pendukung Artikel 2', NULL, 'sup/5ee46b09b722a02b65032de0d684201d.jpg'),
('PRS-0000001', 'POS-0011', 3, 'File Pendukung Artikel 3', NULL, 'sup/4832fa78b727986de6d6ed6d51bb978b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `KodeJabatan` int(11) NOT NULL,
  `KodeJabatanAtas` int(11) NOT NULL DEFAULT '0',
  `NamaJabatan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`KodeJabatan`, `KodeJabatanAtas`, `NamaJabatan`) VALUES
(1, 0, 'Kepala Sekolah'),
(2, 1, 'Waka Kesiswaan'),
(3, 1, 'Waka Kurikulum'),
(4, 1, 'Sekertaris'),
(5, 1, 'Bendahara'),
(6, 3, 'Guru/Pengajar'),
(7, 2, 'Wali Kelas'),
(8, 2, 'Guru BK'),
(9, 4, 'Tata Usaha'),
(10, 5, 'Bag Administrasi'),
(11, 4, 'Tukang Kebun');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `KodePesan` varchar(20) NOT NULL,
  `KodePerson` varchar(14) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `NamaPengirim` varchar(130) DEFAULT NULL,
  `IsiPesan` text,
  `IsDibaca` smallint(6) DEFAULT '0',
  `TglDiterima` datetime DEFAULT CURRENT_TIMESTAMP,
  `Enc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`KodePesan`, `KodePerson`, `Email`, `NamaPengirim`, `IsiPesan`, `IsDibaca`, `TglDiterima`, `Enc`) VALUES
('MSG-2020-11-00000001', 'PRS-0000001', 'ahmadsyahrullft9@gmail.com', 'uciha madara', 'lorem ipsum dolor sit amet asolorem ipsum dolor sit amet asolorem ipsum dolor sit amet asolorem ipsum dolor sit amet asolorem ', 1, '2020-11-05 07:52:10', 'd024ee656a122ef3a0691babd6607a9d'),
('MSG-2020-11-00000002', 'PRS-0000001', 'ahmadsyahrullft9@gmail.com', 'choota beem', 'ipsum dolor sit amet asolorem ipsum dolor sit amet asolorem', 1, '2020-11-05 07:55:11', 'ce3239071f4327c3c35a43fb791fff76'),
('MSG-2020-11-00000003', 'PRS-0000001', 'ahmadsyahrullft9@gmail.com', 'leonel messi', ' ipsum dolor sit amet asolorem ipsum dolor sit amet asolorem ', 1, '2020-11-05 07:55:23', '8c9829086b42805724d76d0244f638bf'),
('MSG-2020-11-00000004', 'PRS-0000001', 'ahmadsyahrullft9@gmail.com', 'puan maharani', 'ipsum dolor sit amet asolorem ipsum dolor sit amet asolorem', 1, '2020-11-05 07:55:33', '399c22333c51aaee6aaa602ad9302b39'),
('MSG-2020-11-00000005', 'PRS-0000001', 'ahmadsyahrullft9@gmail.com', 'santoso sulistio', ' ipsum dolor sit amet asolorem ipsum dolor sit amet aso', 1, '2020-11-05 07:55:41', '2917823ee9b3a39d3fc2fc6a1e1c320a'),
('MSG-2020-11-00000006', 'PRS-0000001', 'ahmadsyahrullft9@gmail.com', 'uciha madara', 'Ini terjadi karena ada proses autentikasi. Agar sistem bisa mengenali bahwa perintah tersebut berasal dari aplikasi sistem itu sendiri, tambahkan code berikut ke dalam form.', 1, '2020-11-05 08:27:29', '43a97c93652943c16f525cb821a643ff'),
('MSG-2020-11-00000007', 'PRS-0000001', 'ahmadsyahrullft9@gmail.com', 'tante ernie', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 1, '2020-11-06 09:10:50', '914940e8e1ac5faa8fe1302e3acf4f90'),
('MSG-2020-11-00000008', 'PRS-0000001', 'budi@gmail.com', 'budi', 'okeoke', 1, '2020-11-06 15:50:34', 'b18b4ae3e4299f59d2f411231ca3f8e8');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `KodePerson` varchar(14) NOT NULL,
  `IdPos` varchar(14) NOT NULL,
  `TglDibuat` datetime DEFAULT CURRENT_TIMESTAMP,
  `Judul` varchar(255) DEFAULT NULL,
  `IsiPos` text,
  `TglPublikasi` datetime DEFAULT NULL,
  `JenisPos` varchar(14) DEFAULT NULL,
  `IsPublikasi` smallint(6) DEFAULT NULL,
  `slug` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`KodePerson`, `IdPos`, `TglDibuat`, `Judul`, `IsiPos`, `TglPublikasi`, `JenisPos`, `IsPublikasi`, `slug`) VALUES
('PRS-0000001', 'POS-0001', '2020-10-27 15:01:02', 'Aamet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-10-27 15:05:57', 'artikel', 1, 'Aamet_consectetur_adipisicing_elit.'),
('PRS-0000001', 'POS-0002', '2020-10-27 15:01:19', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-10-28 07:01:38', 'artikel', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.'),
('PRS-0000001', 'POS-0003', '2020-10-28 06:13:50', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-10-28 07:01:46', 'pengumuman', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.1'),
('PRS-0000001', 'POS-0004', '2020-10-28 06:24:28', 'Aamet consectetur adipisicing elit.', 'galeri/8ea16959835a922b3567bf99d779f6f8.jpeg', '2020-10-28 06:24:28', 'foto', 1, 'Aamet_consectetur_adipisicing_elit.1'),
('PRS-0000001', 'POS-0005', '2020-10-28 06:24:57', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'galeri/5b5455d90de512ccfc27717ba4c8f690.jpg', '2020-10-28 06:24:57', 'foto', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.2'),
('PRS-0000001', 'POS-0006', '2020-10-28 06:55:08', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'https://www.youtube.com/watch?v=t8TU1ZB_MfQ', '2020-10-28 06:59:55', 'video', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.3'),
('PRS-0000001', 'POS-0007', '2020-10-28 07:08:07', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'dokumen/d20f60a29c72119b8f260ea8705a2d04.docx', '2020-10-28 07:08:07', 'dokumen', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.4'),
('PRS-0000001', 'POS-0009', '2020-10-28 20:00:50', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-10-29 15:33:32', 'artikel', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.5'),
('PRS-0000001', 'POS-0010', '2020-10-28 20:02:40', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-10-29 15:33:21', 'artikel', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.6'),
('PRS-0000001', 'POS-0011', '2020-10-28 20:38:38', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-10-29 15:33:12', 'artikel', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.7'),
('PRS-0000001', 'POS-0012', '2020-10-30 16:04:21', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'slider/52ddef18993fcc632b7ad4455620036a.jpg', '2020-10-30 16:04:21', 'slider', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.8'),
('PRS-0000001', 'POS-0013', '2020-10-30 16:56:36', 'Aamet consectetur adipisicing elit.', '<p>Aamet consectetur adipisicing elit.Aamet consectetur adipisicing elit.Aamet consectetur adipisicing elit.Aamet consectetur adipisicing elit.Aamet consectetur adipisicing elit.Aamet consectetur adipisicing elit.Aamet consectetur adipisicing elit.Aamet consectetur adipisicing elit.Aamet consectetur adipisicing elit.</p>\r\n', '2020-11-19 00:00:00', 'agenda', 1, 'Aamet_consectetur_adipisicing_elit.2'),
('PRS-0000001', 'POS-0014', '2020-10-30 17:43:23', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-10-28 00:00:00', 'agenda', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.9'),
('PRS-0000001', 'POS-0015', '2020-10-30 17:43:31', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-10-27 00:00:00', 'agenda', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.10'),
('PRS-0000001', 'POS-0016', '2020-10-30 17:44:06', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-10-27 00:00:00', 'agenda', 1, 'Lorem_ipsum_dolor_sit_amet_consectetur_adipisicing_elit.11'),
('PRS-0000001', 'POS-0017', '2020-11-01 12:01:35', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-11-06 15:48:12', 'pengumuman', 1, 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit4'),
('PRS-0000001', 'POS-0018', '2020-11-02 20:34:56', 'Lorem ipsum dolor', 'galeri/0adeb7d44d2007b8a979dd96b68292a6.jpg', '2020-11-02 20:34:56', 'foto', 1, 'lorem-ipsum-dolor'),
('PRS-0000001', 'POS-0019', '2020-11-02 20:35:11', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'galeri/d0f18320ac74c65045485b3fe470903e.jpg', '2020-11-02 20:35:11', 'foto', 1, 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit'),
('PRS-0000001', 'POS-0020', '2020-11-03 18:47:42', 'fa-align-justify', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2020-11-03 18:47:42', 'visi', 1, 'fa-align-justify'),
('PRS-0000001', 'POS-0022', '2020-11-03 19:22:01', 'fa-bed', 'lorem ipsum dolor sit amet aso', '2020-11-03 19:22:01', 'visi', 1, 'fa-bed'),
('PRS-0000001', 'POS-0024', '2020-11-03 19:22:22', 'fa-bookmark', 'lorem ipsum dolor sit amet asolorem ipsum dolor sit amet asolorem ipsum dolor sit amet aso', '2020-11-03 19:22:22', 'misi', 1, 'fa-bookmark'),
('PRS-0000001', 'POS-0026', '2020-11-03 19:22:49', 'fa-gamepad', 'lorem ipsum dolor sit amet aso', '2020-11-03 19:22:49', 'misi', 1, 'fa-gamepad'),
('PRS-0000001', 'POS-0027', '2020-11-03 19:34:24', 'fa-users', 'orem ipsum dolor sit amet asolorem ipsum dolor sit amet aso', '2020-11-03 19:34:24', 'visi', 1, 'fa-users'),
('PRS-0000001', 'POS-0028', '2020-11-03 19:36:36', 'fa-heart', 'sit amet asolorem ipsum dolor sit amet asoorem ipsum dolor', '2020-11-03 19:36:36', 'visi', 1, 'fa-heart'),
('PRS-0000001', 'POS-0029', '2020-11-05 08:31:24', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n', '2020-11-06 00:00:00', 'agenda', 1, 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit2'),
('PRS-0000001', 'POS-0030', '2020-11-05 08:31:55', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'slider/7793ed10ef6a8417f920b20f2db8107c.jpg', '2020-11-05 08:31:55', 'slider', 1, 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit1'),
('PRS-0000001', 'POS-0031', '2020-11-06 15:45:36', 'fa-minus-circle', 'oke oke', '2020-11-06 15:45:36', 'visi', 1, 'fa-minus-circle'),
('PRS-0000001', 'POS-0032', '2022-08-12 22:21:57', 'BNB', 'dokumen/95e833372c6bb5d3e6373a1c9053a281.pdf', '2022-08-12 22:21:57', 'dokumen', 1, 'bnb'),
('PRS-0000001', 'POS-0033', '2022-08-12 22:23:59', 'Logo Aplikasi', 'dokumen/5e8d299506760597075c7aa15d30c4a8.pdf', '2022-08-12 22:23:59', 'dokumen', 1, 'logo-aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `sistemsetting`
--

CREATE TABLE `sistemsetting` (
  `KodeSetting` varchar(14) NOT NULL,
  `KodePerson` varchar(14) DEFAULT NULL,
  `NamaSetting` varchar(30) DEFAULT NULL,
  `Tipe` varchar(10) DEFAULT NULL,
  `Value` text,
  `LastUpdate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sistemsetting`
--

INSERT INTO `sistemsetting` (`KodeSetting`, `KodePerson`, `NamaSetting`, `Tipe`, `Value`, `LastUpdate`) VALUES
('1', 'PRS-0000001', 'PROFIL_KAMI', 'longtext', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus natus cupiditate voluptatibus incidunt exercitationem autem cumque veniam itaque porro quaerat dicta, expedita sapiente modi omnis minus magni possimus aliquid.</p>\r\n', '2020-11-06 09:44:42'),
('12', 'PRS-0000001', 'BANNER_PROFIL', 'img', 'banner/9d6dee7b2c463914e26c029d1fdc1443.jpg', '2020-11-06 09:44:48'),
('122', 'PRS-0000001', 'BANNER_PROFIL_TITLE', 'text', 'SMP NEGERI 53 SURABAYA', '2022-08-12 21:59:00'),
('1222', 'PRS-0000001', 'BANNER_AWAL', 'img', 'banner/cdb4ddfc1a73e57275c599e7ddbb55e5.png', '2020-11-06 09:45:39'),
('1223', 'PRS-0000001', 'BANNER_AWAL_TITLE', 'text', 'SMP NEGERI 53 SURABAYA', '2022-08-12 22:00:33'),
('1224', 'PRS-0000001', 'BANNER_AWAL_SUBTITLE', 'text', 'Selamat Datang di Web Resmi SMP Negeri 53 Surabaya', '2022-08-12 22:03:37'),
('13', 'PRS-0000001', 'BANNER_KONTAK', 'img', 'banner/7c2c213349a2bf3171abaa563dc2849c.png', '2020-11-06 09:44:41'),
('131', 'PRS-0000001', 'TAMPILKAN_VISI_MISI', 'bool', '1', '2020-11-06 15:54:10'),
('14', 'PRS-0000001', 'LOKASI_KAMI', 'longtext', '<p>Kendung 110 , Sememi, Benowo, Surabaya</p>\r\n', '2022-08-12 22:00:07'),
('15', 'PRS-0000001', 'KONTAK_KAMI', 'longtext', '<p><strong>SMP NEGERI 53 SURABAYA</strong><br />\r\nKendung 110 , Sememi, Benowo, Surabaya<br />\r\n(031) 99019232<br />\r\nspenliga@gmail.com</p>\r\n', '2022-08-12 22:02:53'),
('2', 'PRS-0000001', 'LOGO_WEBSITE', 'img', 'logo/efbe7f60e6fbb35088be95e79aeac35f.png', '2022-08-12 21:58:31'),
('21', 'PRS-0000001', 'NAMA_WEBSITE', 'text', 'SMP NEGERI 53 SURABAYA', '2022-08-12 22:03:48'),
('22', 'PRS-0000001', 'TELP_WEBSITE', 'text', '03199019232', '2022-08-12 22:03:17'),
('8', 'PRS-0000001', 'EMAIL_RESMI', 'text', 'spenliga@gmail.com', '2022-08-12 22:05:06'),
('81', 'PRS-0000001', 'WHATSAPP_LINK', 'text', 'wa.me/+6281554477423', '2020-11-01 12:59:22'),
('82', 'PRS-0000001', 'INSTAGRAM_LINK', 'text', '@spenliga', '2022-08-12 22:05:21'),
('83', 'PRS-0000001', 'FACEBOOK_LINK', 'text', 'spenliga@gmail.com', '2022-08-12 22:05:39'),
('84', 'PRS-0000001', 'TELEGRAM_LINK', 'text', 'wa.me/+6281554477423', '2020-11-01 12:59:22'),
('9', 'PRS-0000001', 'NAMA_DEVELOPER', 'text', 'TIAP Software Developer', '2020-11-01 12:59:19'),
('91', 'PRS-0000001', 'URL_DEVELOPER', 'text', 'https://tiap1dev.co.id', '2020-11-01 12:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `KodePerson` varchar(14) NOT NULL,
  `NamaLengkap` varchar(100) DEFAULT NULL,
  `Telp` varchar(14) DEFAULT NULL,
  `Username` varchar(14) DEFAULT NULL,
  `Password` text,
  `IsAktif` smallint(6) DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `JenisUser` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`KodePerson`, `NamaLengkap`, `Telp`, `Username`, `Password`, `IsAktif`, `LastLogin`, `JenisUser`) VALUES
('PRS-0000001', 'Admin Web', '089089089089', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2022-08-12 21:57:55', 'adm');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `ip` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `online` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`ip`, `date`, `hits`, `online`, `time`) VALUES
('::1', '2020-11-05', 33, '1604558112', '2020-11-05 08:56:25'),
('::1', '2020-11-01', 32, '1604552403', '2020-11-01 08:56:25'),
('::1', '2020-11-02', 32, '1604552403', '2020-11-02 08:56:25'),
('::1', '2020-11-03', 32, '1604552403', '2020-11-03 08:56:25'),
('::1', '2020-11-04', 32, '1604552403', '2020-11-04 08:56:25'),
('10.0.2.2', '2020-11-01', 32, '1604552403', '2020-11-01 08:56:25'),
('10.0.2.3', '2020-11-02', 32, '1604552403', '2020-11-02 08:56:25'),
('10.0.2.4', '2020-11-04', 32, '1604552403', '2020-11-04 08:56:25'),
('::1', '2020-11-06', 116, '1604654294', '2020-11-06 09:01:52'),
('::1', '2022-08-06', 11, '1659803106', '2022-08-06 23:24:05'),
('::1', '2022-08-08', 5, '1659966361', '2022-08-08 18:34:33'),
('::1', '2022-08-12', 13, '1660317941', '2022-08-12 21:50:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`IdAnggota`);

--
-- Indexes for table `filependukung`
--
ALTER TABLE `filependukung`
  ADD PRIMARY KEY (`KodePerson`,`IdPos`,`NoUrut`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`KodeJabatan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`KodePesan`),
  ADD KEY `FK_PESAN_RELATIONS_USERLOGI` (`KodePerson`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`KodePerson`,`IdPos`);

--
-- Indexes for table `sistemsetting`
--
ALTER TABLE `sistemsetting`
  ADD PRIMARY KEY (`KodeSetting`),
  ADD KEY `FK_SISTEMSE_RELATIONS_USERLOGI` (`KodePerson`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`KodePerson`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `KodeJabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filependukung`
--
ALTER TABLE `filependukung`
  ADD CONSTRAINT `FK_FILEPEND_RELATIONS_POSTING` FOREIGN KEY (`KodePerson`,`IdPos`) REFERENCES `posting` (`KodePerson`, `IdPos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `FK_PESAN_RELATIONS_USERLOGI` FOREIGN KEY (`KodePerson`) REFERENCES `userlogin` (`KodePerson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posting`
--
ALTER TABLE `posting`
  ADD CONSTRAINT `FK_POSTING_RELATIONS_USERLOGI` FOREIGN KEY (`KodePerson`) REFERENCES `userlogin` (`KodePerson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sistemsetting`
--
ALTER TABLE `sistemsetting`
  ADD CONSTRAINT `FK_SISTEMSE_RELATIONS_USERLOGI` FOREIGN KEY (`KodePerson`) REFERENCES `userlogin` (`KodePerson`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
