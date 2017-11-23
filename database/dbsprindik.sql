-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 01:55 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsprindik`
--

-- --------------------------------------------------------

--
-- Table structure for table `oltp_calon_peserta`
--

CREATE TABLE IF NOT EXISTS `oltp_calon_peserta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(11) NOT NULL,
  `id_diklat` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url_dok_ktp` varchar(255) DEFAULT NULL,
  `url_dok_ijazah` varchar(255) DEFAULT NULL,
  `time_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_daftar_diklat` (`id_diklat`,`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `oltp_calon_peserta`
--

INSERT INTO `oltp_calon_peserta` (`id`, `id_user`, `id_diklat`, `nama`, `umur`, `alamat`, `email`, `url_dok_ktp`, `url_dok_ijazah`, `time_creation`) VALUES
(1, '18', NULL, NULL, NULL, NULL, 'tes1@gmail.com', NULL, NULL, NULL),
(2, '19', NULL, NULL, NULL, NULL, 'tes2@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oltp_permohonan`
--

CREATE TABLE IF NOT EXISTS `oltp_permohonan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_daftar_diklat` varchar(50) DEFAULT NULL,
  `flag_vera_dok_kasi` varchar(50) DEFAULT NULL,
  `flag_vera_dok_bag` varchar(50) DEFAULT NULL,
  `time_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `oltp_permohonan`
--

INSERT INTO `oltp_permohonan` (`id`, `id_daftar_diklat`, `flag_vera_dok_kasi`, `flag_vera_dok_bag`, `time_creation`) VALUES
(1, NULL, NULL, NULL, '2017-11-22 13:18:06'),
(2, NULL, NULL, NULL, '2017-11-22 13:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `oltp_peserta`
--

CREATE TABLE IF NOT EXISTS `oltp_peserta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(11) NOT NULL,
  `id_diklat` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url_dok_ktp` varchar(255) DEFAULT NULL,
  `url_dok_ijazah` varchar(255) DEFAULT NULL,
  `time_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_daftar_diklat` (`id_diklat`,`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `oltp_peserta`
--

INSERT INTO `oltp_peserta` (`id`, `id_user`, `id_diklat`, `nama`, `umur`, `alamat`, `email`, `url_dok_ktp`, `url_dok_ijazah`, `time_creation`) VALUES
(3, '25', '001', 'Pak Purwontoro', 32, 'Jalan Kebumen', NULL, NULL, NULL, '2017-11-22 22:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `oltp_peserta_diklat`
--

CREATE TABLE IF NOT EXISTS `oltp_peserta_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flag_approval` varchar(50) DEFAULT NULL,
  `time_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_daftar_diklat` varchar(50) DEFAULT NULL,
  `id_peserta` varchar(50) DEFAULT NULL,
  `id_diklat` varchar(50) DEFAULT NULL,
  `status_peserta` varchar(50) DEFAULT NULL,
  `status_kegiatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `oltp_peserta_diklat`
--

INSERT INTO `oltp_peserta_diklat` (`id`, `flag_approval`, `time_creation`, `id_daftar_diklat`, `id_peserta`, `id_diklat`, `status_peserta`, `status_kegiatan`) VALUES
(19, NULL, '2017-11-22 13:31:29', NULL, '3', '001', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oltp_profil`
--

CREATE TABLE IF NOT EXISTS `oltp_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url_dok_ktp` varchar(255) DEFAULT NULL,
  `url_dok_ijazah` varchar(255) DEFAULT NULL,
  `time_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `oltp_profil`
--

INSERT INTO `oltp_profil` (`id`, `id_user`, `nama`, `umur`, `alamat`, `email`, `url_dok_ktp`, `url_dok_ijazah`, `time_creation`) VALUES
(10, '25', NULL, NULL, NULL, 'tes1@gmail.com', NULL, NULL, '2017-11-22 14:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `oltp_user`
--

CREATE TABLE IF NOT EXISTS `oltp_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_mobile` varchar(100) DEFAULT NULL,
  `time_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `flag_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `oltp_user`
--

INSERT INTO `oltp_user` (`id_user`, `username`, `password`, `status`, `email`, `no_mobile`, `time_creation`, `flag_status`) VALUES
(25, 'tes1', 'c4ca4238a0b923820dcc509a6f75849b', '3', 'tes1@gmail.com', '1', '2017-11-22 21:35:47', '1');

--
-- Triggers `oltp_user`
--
DROP TRIGGER IF EXISTS `oltp_user_after_ins_trig`;
DELIMITER //
CREATE TRIGGER `oltp_user_after_ins_trig` AFTER INSERT ON `oltp_user`
 FOR EACH ROW begin
  insert into oltp_profil (id_user, email) values (new.id_user, new.email);
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(2, 'Garrett', 'Winters', 'male', 'Tokyo', '1988-09-02'),
(3, 'John', 'Doe', 'male', 'Kansas', '1972-11-02'),
(4, 'Tatyana', 'Fitzpatrick', 'male', 'London', '1989-01-01'),
(6, '1226', '2222', 'male', 'www', '2017-11-01'),
(7, '335', '2333', 'male', '333', '2017-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `ref_akses`
--

CREATE TABLE IF NOT EXISTS `ref_akses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `flag_akses` varchar(100) DEFAULT NULL,
  `flag_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ref_akses`
--

INSERT INTO `ref_akses` (`id`, `id_user`, `username`, `nip`, `flag_akses`, `flag_status`) VALUES
(1, '18', 'tes1', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL),
(2, '19', 'tes2', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_diklat`
--

CREATE TABLE IF NOT EXISTS `ref_diklat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_diklat` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ref_diklat`
--

INSERT INTO `ref_diklat` (`id`, `id_diklat`, `keterangan`, `tgl_mulai`, `tgl_selesai`, `status`, `catatan`) VALUES
(1, '001', 'Diklat ilmu bumi', '2017-11-01', '2017-11-30', 'Sedang Berjalan', 'Persyaratan:'),
(2, '002', 'Diklat ilmu Tanah', '2017-11-23', '2017-11-29', 'Pendaftaran Dibuka', 'Persyaratan:\r\n- Minimal Ijazah SMA/D1\r\n- Umur 35 tahun\r\n- Belum Pernah mengikuti diklat yang sama sebelumnya\r\n- Surat Keterangan sehat dari dokter pemerintah'),
(6, NULL, 'Diklat Geodesi', '2017-11-21', '2017-11-24', 'Pendaftaran Dibuka', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_flag`
--

CREATE TABLE IF NOT EXISTS `ref_flag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_diklat` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ref_flag`
--

INSERT INTO `ref_flag` (`id`, `id_diklat`, `keterangan`, `status`, `catatan`) VALUES
(1, NULL, 'Diklat ilmu bumi', 'Sedang Berjalan', NULL),
(2, NULL, 'Diklat ilmu Tanah', 'Pendaftaran Dibuka', 'Persyaratan:\r\n- Minimal Ijazah SMA/D1\r\n- Umur 35 tahun\r\n- Belum Pernah mengikuti diklat yang sama sebelumnya\r\n- Surat Keterangan sehat dari dokter pemerintah'),
(3, NULL, 'Diklat YYY', 'Pendaftaran Dibuka', NULL),
(4, NULL, 'Diklat ilmu Tanah 1', 'Pendaftaran Ditutup', NULL),
(5, NULL, 'Diklat ABC', 'Sedang Berjalan', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pegawai`
--

CREATE TABLE IF NOT EXISTS `ref_pegawai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL DEFAULT '',
  `nama_pegawai` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ref_pegawai`
--

INSERT INTO `ref_pegawai` (`id`, `id_user`, `nip`, `nama_pegawai`) VALUES
(5, 0, '73737373873', 'tes1223');

-- --------------------------------------------------------

--
-- Table structure for table `ref_status`
--

CREATE TABLE IF NOT EXISTS `ref_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ref_status`
--

INSERT INTO `ref_status` (`id`, `id_status`, `keterangan`, `status`, `catatan`) VALUES
(1, NULL, 'Diklat ilmu bumi', 'Sedang Berjalan', NULL),
(2, NULL, 'Diklat ilmu Tanah', 'Pendaftaran Dibuka', 'Persyaratan:\r\n- Minimal Ijazah SMA/D1\r\n- Umur 35 tahun\r\n- Belum Pernah mengikuti diklat yang sama sebelumnya\r\n- Surat Keterangan sehat dari dokter pemerintah'),
(3, NULL, 'Diklat YYY', 'Pendaftaran Dibuka', NULL),
(4, NULL, 'Diklat ilmu Tanah 1', 'Pendaftaran Ditutup', NULL),
(5, NULL, 'Diklat ABC', 'Sedang Berjalan', 'nice');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_diklat`
--
CREATE TABLE IF NOT EXISTS `view_laporan_diklat` (
`id` varchar(50)
,`nama` varchar(100)
,`keterangan` varchar(255)
,`tgl_mulai` date
,`tgl_selesai` date
);
-- --------------------------------------------------------

--
-- Structure for view `view_laporan_diklat`
--
DROP TABLE IF EXISTS `view_laporan_diklat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_diklat` AS select `a`.`id_peserta` AS `id`,`b`.`nama` AS `nama`,`c`.`keterangan` AS `keterangan`,`c`.`tgl_mulai` AS `tgl_mulai`,`c`.`tgl_selesai` AS `tgl_selesai` from ((`oltp_peserta_diklat` `a` left join `oltp_peserta` `b` on((`a`.`id_peserta` = `b`.`id`))) left join `ref_diklat` `c` on((`a`.`id_diklat` = `c`.`id_diklat`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
