-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 01:57 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kos_t_on_line`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ad_min_kos`
--

CREATE TABLE `tb_ad_min_kos` (
  `id_ad_min` varchar(50) NOT NULL,
  `nm_ad_min` varchar(30) NOT NULL,
  `ua_ks_user` varchar(50) NOT NULL,
  `ua_ks_pas` varchar(50) NOT NULL,
  `ft_adm` varchar(100) NOT NULL,
  `lev_ua` int(1) NOT NULL COMMENT '1=admin,2=user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ad_min_kos`
--

INSERT INTO `tb_ad_min_kos` (`id_ad_min`, `nm_ad_min`, `ua_ks_user`, `ua_ks_pas`, `ft_adm`, `lev_ua`) VALUES
('IDA232323322222', 'Nopen rianto', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'default.png', 1),
('IDA232323323222', 'Luri Setiawan', 'Luri', 'c176da12157cbb937cd3a505a1628aab', 'default.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kmen_usr`
--

CREATE TABLE `tb_kmen_usr` (
  `id` int(11) NOT NULL,
  `nm` varchar(50) NOT NULL,
  `em` varchar(50) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `kom` text NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kmen_usr`
--

INSERT INTO `tb_kmen_usr` (`id`, `nm`, `em`, `sub`, `kom`, `tgl`) VALUES
(1, 'coba', 'cob@gmail.com', 'coba', 'dsada dd asda sdasdsa dsadasd asdsadas dasdas d sad as dasdas d asdasdasd', '2020-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kmps`
--

CREATE TABLE `tb_kmps` (
  `id_kmp` int(11) NOT NULL,
  `nm_kmps` varchar(50) NOT NULL,
  `alm_kmps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kmps`
--

INSERT INTO `tb_kmps` (`id_kmp`, `nm_kmps`, `alm_kmps`) VALUES
(1, 'UBSI Pemuda', 'Jln. Pemuda No.26'),
(2, 'UNIVERSITAS NEGERI JAKARTA', 'Jln. Haji Ismail No.33'),
(3, 'UNIVERSITAS SINGA PERBANGSA', 'Jln. Karawang Barat No.15'),
(4, 'UNIVERSITAS UDAYANA', 'Jln. Agung Partayana No.50'),
(5, 'UNIVERSITAS INDONESIA', 'Jln. Perintis Kemerdekaan No.22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kon_ta_k`
--

CREATE TABLE `tb_kon_ta_k` (
  `id_k` int(10) NOT NULL,
  `alm_k` varchar(100) NOT NULL,
  `e_mail_k` varchar(100) NOT NULL,
  `no_hp_k` varchar(15) NOT NULL,
  `fb_k` varchar(100) NOT NULL,
  `twit_k` varchar(100) NOT NULL,
  `g_plus_k` varchar(100) NOT NULL,
  `instag_k` varchar(100) NOT NULL,
  `yt_k` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kon_ta_k`
--

INSERT INTO `tb_kon_ta_k` (`id_k`, `alm_k`, `e_mail_k`, `no_hp_k`, `fb_k`, `twit_k`, `g_plus_k`, `instag_k`, `yt_k`) VALUES
(1, 'Jln. Gajahmada Komplek A ', 'kosgreen@gmail.com', '021-97843912', 'www.facebook.com', 'www.twitter.com', 'www.gogle-plus.com', 'www.instagram.com', 'www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kos_t_onl`
--

CREATE TABLE `tb_kos_t_onl` (
  `kd_kos_t` varchar(50) NOT NULL,
  `no_ktp_us` varchar(50) NOT NULL,
  `nm_kos_t` varchar(40) NOT NULL,
  `ktg_r` varchar(35) NOT NULL,
  `fas_lts` varchar(100) NOT NULL,
  `hrg_ks` varchar(20) NOT NULL,
  `ket_ks` text NOT NULL,
  `alm_ks` varchar(70) NOT NULL,
  `jml_kmr_ks` int(10) NOT NULL,
  `id_kmp` int(11) NOT NULL,
  `v_kos_t` int(10) NOT NULL,
  `ft_utm` varchar(100) NOT NULL,
  `ft_p1` varchar(1000) NOT NULL,
  `ft_p2` varchar(100) NOT NULL,
  `stt_ks` int(1) NOT NULL COMMENT '1=belum,2=izinkan',
  `tgl_pst` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kos_t_onl`
--

INSERT INTO `tb_kos_t_onl` (`kd_kos_t`, `no_ktp_us`, `nm_kos_t`, `ktg_r`, `fas_lts`, `hrg_ks`, `ket_ks`, `alm_ks`, `jml_kmr_ks`, `id_kmp`, `v_kos_t`, `ft_utm`, `ft_p1`, `ft_p2`, `stt_ks`, `tgl_pst`) VALUES
('KK000001', '2147483647', 'Kos Mabar', 'Pria', 'Kamar mandi sendiri,wifi ,AC , Lemari', '3000000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'Jln. Pemuda No.26', 1, 1, 41, 'slider1.jpg', 'slider1.jpg', 'slider1.jpg', 2, '2020-11-22 20:24:53'),
('KK000002', '2147483647', 'Kos Bu Tini', 'Wanita', 'kamar mandi sendiri,kipas angin, kompor.', '1000000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa Pria ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln, jendral sudirman,gang merapi.', 1, 5, 36, 'slider5.jpg', 'slider5.jpg', 'slider5.jpg', 2, '2020-11-22 20:24:53'),
('KK000003', '2147483647', 'Kos Ibu Nur', 'Pria', 'kamar mandi sendiri,dan kipas angin.', '500000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln, Gang biologi.', 1, 1, 22, 'slider6.jpg', 'slider6.jpg', 'slider6.jpg', 2, '2020-12-19 13:13:20'),
('KK000004', '2147483647', 'Kos Rame', 'Pria', 'Kamar mandi sendiri,wifi , Lemari', '1500000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'Jln.kandis 3 no 2', 1, 2, 10, 'slider1.jpg', 'slider1.jpg', 'slider1.jpg', 2, '2020-12-19 13:13:20'),
('KK000005', '2147483647', 'Kos kantika', 'Wanita', 'Kasur,kipas angin,almari,dan kompor masak.', '500000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'Jln.gang simeru no 03', 1, 3, 7, 'slider2.jpg', 'slider2.jpg', 'slider2.jpg', 2, '2020-12-19 13:14:59'),
('KK000007', '2147483647', 'Kos Bu Tini', 'Wanita', 'kamar mandi sendiri,kipas angin,kompor.', '500000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln,jendral sudirman,gang merapi.', 1, 2, 21, 'slider5.jpg', 'slider5.jpg', 'slider5.jpg', 2, '2020-12-19 13:15:22'),
('KK000010', '2147483647', 'Kos buk tini', 'Wanita', 'kamar mandi sendiri,kipas angin,kompor', '750000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln,jendral sudirman,gang merapi.', 1, 3, 8, 'slider5.jpg', 'slider5.jpg', 'slider5.jpg', 2, '2020-12-19 13:17:42'),
('KK000011', '2147483647', 'Kos Ibu Nur', 'Pria', 'kamar mandi sendiri,dan kipas angin.', '600000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln,gang biologi.', 1, 4, 3, 'slider6.jpg', 'slider6.jpg', 'slider6.jpg', 2, '2020-12-19 13:18:42'),
('KK000012', '2147483647', 'Kos ibuk nur ', 'Pria', 'kamar mandi sendiri,dan kipas angin.', '650000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa priamasuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln,gang biologi.', 1, 5, 23, 'slider1.jpg', 'slider1.jpg', 'slider1.jpg', 2, '2020-12-19 13:25:19'),
('KK000013', '2147483647', 'Kos Ibu Nur', 'Pria', 'kamar mandi sendiri,AC, WiFi, Lemari', '2500000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln,gang biologi.', 1, 1, 9, 'slider2.jpg', 'slider2.jpg', 'slider2.jpg', 2, '2020-12-19 13:25:42'),
('KK000014', '2147483647', 'Kos kantika', 'Wanita', 'Kasur,kipas angin,almari,dan kompor masak.', '500000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa Pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'Jln.gang simeru no 03', 1, 2, 16, 'slider2.jpg', 'slider2.jpg', 'slider2.jpg', 2, '2020-12-19 13:28:44'),
('KK000015', '2147483647', 'Kos endista', 'Pria', 'standart', '500000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,gang.merapi.', 1, 3, 9, 'slider3.jpg', '', 'slider3.jpg', 2, '2020-12-19 13:30:12'),
('KK000016', '2147483647', 'Kos anjani', 'Wanita', 'standart', '450000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,Gang matematika.', 1, 4, 8, 'slider4.jpg', 'slider4.jpg', 'slider4.jpg', 2, '2020-12-19 13:32:15'),
('KK000018', '2147483647', 'Kos Bruh', 'Pria', 'standart', '850000', '', 'Jln. anjaymbar No.12', 1, 3, 0, 'file_1483860472.jpg', 'file_14838604721.jpg', 'file_14838604722.jpg', 1, '2020-12-19 13:34:25'),
('KK000019', '2147483647', 'Kos Tampan', 'Pria', 'Kamar mandi sendiri,wifi, ac , lemari.', '2300000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'Jln. Hj Sueb 32', 1, 1, 35, 'slider2.jpg', 'slider2.jpg', 'slider2.jpg', 2, '2020-12-19 13:35:33'),
('KK000020', '2147483647', 'Kos Tampan', 'Pria', 'Kamar mandi sendiri,wifi ,almari.', '1200000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'Jln. Maheda Suzti 11', 1, 1, 35, 'slider3.jpg', 'slider3.jpg', 'slider3.jpg', 2, '2020-12-19 13:36:05'),
('KK000021', '2147483647', 'Kos Tampan', 'Pria', 'Kamar mandi sendiri,wifi ,almari.', '1200000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'Jln. Usui Takumi 92', 1, 1, 33, 'slider4.jpg', 'slider4.jpg', 'slider4.jpg', 2, '2020-12-19 13:39:41'),
('KK000022', '2147483647', 'Kos Tampan', 'Pria', 'Kamar mandi sendiri,wifi ,almari.', '1100000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'Jln. Dante Asta 10', 1, 1, 33, 'slider5.jpg', 'slider5.jpg', 'slider5.jpg', 2, '2020-12-19 13:41:02'),
('KK000023', '2147483647', 'Kos anjani', 'Wanita', 'standart', '600000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,Gang matematika.', 1, 4, 8, 'slider4.jpg', 'slider4.jpg', 'slider4.jpg', 2, '2020-12-19 13:42:20'),
('KK000024', '2147483647', 'Kos anjani', 'Wanita', 'standart', '600000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,Gang matematika.', 1, 4, 8, 'slider5.jpg', 'slider5.jpg', 'slider5.jpg', 2, '2020-12-19 13:47:07'),
('KK000025', '2147483647', 'Kos anjani', 'Wanita', 'standart', '700000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,Gang matematika.', 1, 4, 8, 'slider6.jpg', 'slider6.jpg', 'slider6.jpg', 2, '2020-12-19 13:47:55'),
('KK000026', '2147483647', 'Kos anjani', 'Wanita', 'standart', '650000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,Gang matematika.', 1, 4, 8, 'slider1.jpg', 'slider1.jpg', 'slider1.jpg', 2, '2020-12-19 13:49:07'),
('KK000027', '2147483647', 'Kos anjani', 'Wanita', 'standart', '750000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,Gang matematika.', 1, 4, 8, 'slider2.jpg', 'slider2.jpg', 'slider2.jpg', 2, '2020-12-19 13:50:25'),
('KK000028', '2147483647', 'Kos anjani', 'Wanita', 'standart', '650000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,Gang matematika.', 1, 4, 8, 'slider3.jpg', 'slider3.jpg', 'slider3.jpg', 2, '2020-12-19 13:52:55'),
('KK000029', '2147483647', 'Kos anjani', 'Wanita', 'standart', '700000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa pria masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,Gang matematika.', 1, 4, 10, 'slider4.jpg', 'slider4.jpg', 'slider4.jpg', 2, '2020-12-19 13:53:23'),
('KK000030', '2147483647', 'Kos anjani', 'Wanita', 'standart', '300000', '<p>Peraturan dikos :</p>\r\n\r\n<ol>\r\n	<li>Tidak boleh membawa wanita masuk ke dalam kos.</li>\r\n	<li>Jika ada tamu yang lama menginap harus lapor terlebih dahulu.</li>\r\n	<li>Tidak boleh menggunakan obat-obatan terlarang selama dikos.</li>\r\n</ol>\r\n', 'jln.gajah mada,Gang matematika.', 1, 4, 8, 'slider5.jpg', 'slider5.jpg', 'slider5.jpg', 2, '2016-12-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_psn_usr_kost`
--

CREATE TABLE `tb_psn_usr_kost` (
  `id_psn_ks_us` varchar(50) NOT NULL,
  `no_ktp_us` varchar(50) NOT NULL,
  `kd_kos_t` varchar(50) NOT NULL,
  `metod_pemb` int(1) NOT NULL,
  `tgl_psn` datetime NOT NULL,
  `tgl_akhr` datetime NOT NULL,
  `stt` enum('Konfirmasi','Belum Konfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_psn_usr_kost`
--

INSERT INTO `tb_psn_usr_kost` (`id_psn_ks_us`, `no_ktp_us`, `kd_kos_t`, `metod_pemb`, `tgl_psn`, `tgl_akhr`, `stt`) VALUES
('PS000001', '23123123', 'KK000001', 2, '2017-01-08 14:22:28', '2017-01-15 14:22:28', 'Konfirmasi'),
('PS000002', '12121', 'KK000010', 1, '2017-01-08 14:23:39', '2017-01-15 14:23:39', 'Konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rek_ks_awk`
--

CREATE TABLE `tb_rek_ks_awk` (
  `id_rek` int(11) NOT NULL,
  `nm_rek` varchar(30) NOT NULL,
  `bank_rek` varchar(40) NOT NULL,
  `no_rek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rek_ks_awk`
--

INSERT INTO `tb_rek_ks_awk` (`id_rek`, `nm_rek`, `bank_rek`, `no_rek`) VALUES
(1, 'User', 'Bank BNI', '43454354545');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(1) NOT NULL,
  `bg` varchar(100) NOT NULL,
  `bg2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `bg`, `bg2`) VALUES
(1, 'base_1.jpg', 'base_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_usr_kost`
--

CREATE TABLE `tb_trans_usr_kost` (
  `no_fak_trans_us` varchar(15) NOT NULL,
  `id_psn_ks_us` varchar(50) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `bkti` varchar(100) NOT NULL,
  `tot_bay` varchar(100) NOT NULL,
  `stt_t` enum('Lunas','Belum Lunas') NOT NULL,
  `tgl_trans_us` datetime NOT NULL,
  `cek` enum('Ok','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_trans_usr_kost`
--

INSERT INTO `tb_trans_usr_kost` (`no_fak_trans_us`, `id_psn_ks_us`, `no_rek`, `bkti`, `tot_bay`, `stt_t`, `tgl_trans_us`, `cek`) VALUES
('KA_NF000001', 'PS000001', '', '', '0', 'Belum Lunas', '2017-01-08 14:22:43', 'Ok'),
('KA_NF000002', 'PS000002', '3434343434', 'file_1483860374.jpg', '4353453', 'Lunas', '2017-01-08 14:26:14', 'Ok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_u_ser_kos_t`
--

CREATE TABLE `tb_u_ser_kos_t` (
  `no_ktp_us` varchar(50) NOT NULL,
  `nml_us` varchar(50) NOT NULL,
  `je_kel_us` varchar(20) NOT NULL,
  `alm_us` varchar(60) NOT NULL,
  `no_hp_us` varchar(15) NOT NULL,
  `no_rek_us` varchar(30) NOT NULL,
  `ua_ks_user` varchar(50) NOT NULL,
  `ua_ks_pas` varchar(50) NOT NULL,
  `lev_ua` varchar(30) NOT NULL COMMENT '1=admin,2=pemilik,3=user',
  `ft_us` varchar(100) NOT NULL,
  `tgl_daf` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_u_ser_kos_t`
--

INSERT INTO `tb_u_ser_kos_t` (`no_ktp_us`, `nml_us`, `je_kel_us`, `alm_us`, `no_hp_us`, `no_rek_us`, `ua_ks_user`, `ua_ks_pas`, `lev_ua`, `ft_us`, `tgl_daf`) VALUES
('12121', 'ari', 'Wanita', 'daskdsad', '43434', '', 'ari', 'fc292bd7df071858c2d0f955545673c1', '3', '', '2017-01-04 19:09:03'),
('1231231', 'asdasdas', 'Pria', 'sdsdasdasd', '342423432', '', 'sdasdasd', 'f9ea827850ae6457edfade5b696c206c', '3', '', '2017-04-01 17:21:54'),
('123123123123', 'Johnny Sins', 'Pria', 'Jln. Anjay mabar 31', '08121294232', '', 'johnny123', '827ccb0eea8a706c4c34a16891f84e7b', '3', '', '2020-12-19 15:02:25'),
('2147483645', 'April desiro', 'Pria', 'padang', '08128878787878', '', 'April', 'April', '2', '', '0000-00-00 00:00:00'),
('2147483647', 'Joko siswanto', 'Pria', 'padangs', '08128878787878', '', 'joko', '9ba0009aa81e794e628a04b51eaf7d7f', '2', '', '0000-00-00 00:00:00'),
('23123121', 'udin', 'Pria', 'dsadsad', '423423423423', '', 'udin', '6bec9c852847242e384a4d5ac0962ba0', '3', '', '2017-01-04 18:49:46'),
('23123123', 'user', 'Pria', 'sdsdsd', '034274823432', '', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '3', '', '2017-01-04 19:13:08'),
('3423423423', 'sdasdasdasd', 'Pria', 'dasdasdsda', '3432432423', '', 'sadasdasd', '4473e588b35568687564de38ed134d0b', '3', '', '2017-04-01 17:20:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ad_min_kos`
--
ALTER TABLE `tb_ad_min_kos`
  ADD PRIMARY KEY (`id_ad_min`);

--
-- Indexes for table `tb_kmen_usr`
--
ALTER TABLE `tb_kmen_usr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kmps`
--
ALTER TABLE `tb_kmps`
  ADD PRIMARY KEY (`id_kmp`);

--
-- Indexes for table `tb_kon_ta_k`
--
ALTER TABLE `tb_kon_ta_k`
  ADD PRIMARY KEY (`id_k`);

--
-- Indexes for table `tb_kos_t_onl`
--
ALTER TABLE `tb_kos_t_onl`
  ADD PRIMARY KEY (`kd_kos_t`);

--
-- Indexes for table `tb_psn_usr_kost`
--
ALTER TABLE `tb_psn_usr_kost`
  ADD PRIMARY KEY (`id_psn_ks_us`);

--
-- Indexes for table `tb_rek_ks_awk`
--
ALTER TABLE `tb_rek_ks_awk`
  ADD PRIMARY KEY (`id_rek`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_trans_usr_kost`
--
ALTER TABLE `tb_trans_usr_kost`
  ADD PRIMARY KEY (`no_fak_trans_us`);

--
-- Indexes for table `tb_u_ser_kos_t`
--
ALTER TABLE `tb_u_ser_kos_t`
  ADD PRIMARY KEY (`no_ktp_us`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kmen_usr`
--
ALTER TABLE `tb_kmen_usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kmps`
--
ALTER TABLE `tb_kmps`
  MODIFY `id_kmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kon_ta_k`
--
ALTER TABLE `tb_kon_ta_k`
  MODIFY `id_k` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rek_ks_awk`
--
ALTER TABLE `tb_rek_ks_awk`
  MODIFY `id_rek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
