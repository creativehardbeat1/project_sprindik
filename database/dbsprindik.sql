-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 02:59 PM
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
-- Table structure for table `kelamin`
--

CREATE TABLE IF NOT EXISTS `kelamin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelamin`
--

INSERT INTO `kelamin` (`id`, `nama`) VALUES
(1, 'Laki laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(1, 'Malang'),
(3, 'Blitar'),
(4, 'Tulungagung'),
(17, 'Jakarta'),
(21, 'Surabaya'),
(22, 'Paris');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `id_kelamin` int(1) DEFAULT NULL,
  `id_posisi` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `telp`, `id_kota`, `id_kelamin`, `id_posisi`, `status`) VALUES
('10', 'Antony Febriansyah Hartono', '082199568540', 1, 1, 1, 1),
('11', 'Hafizh Asrofil Al Banna', '087859615271', 1, 1, 1, 1),
('12', 'Faiq Fajrullah', '085736333728', 1, 1, 2, 1),
('3', 'Mustofa Halim', '081330493322', 1, 1, 3, 1),
('4', 'Dody Ahmad Kusuma Jaya', '083854520015', 1, 1, 2, 1),
('5', 'Mokhammad Choirul Ikhsan', '085749535400', 3, 1, 2, 1),
('7', 'Achmad Chadil Auwfar', '08984119934', 2, 1, 1, 1),
('8', 'Rizal Ferdian', '087777284179', 1, 1, 3, 1),
('9', 'Redika Angga Pratama', '083834657395', 1, 1, 3, 1),
('1', 'Tolkha Hasan', '081233072122', 1, 1, 4, 1),
('2', 'Wawan Dwi Prasetyo', '085745966707', 4, 1, 4, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
-- Table structure for table `posisi`
--

CREATE TABLE IF NOT EXISTS `posisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `nama`) VALUES
(1, 'IT'),
(2, 'HRD'),
(3, 'Keuangan'),
(4, 'Produk'),
(5, 'Web Developer'),
(6, 'Tes');

-- --------------------------------------------------------

--
-- Table structure for table `ref_diklat`
--

CREATE TABLE IF NOT EXISTS `ref_diklat` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) NOT NULL,
  `jadwal` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ref_diklat`
--

INSERT INTO `ref_diklat` (`id`, `keterangan`, `jadwal`, `status`) VALUES
(1, 'Diklat ABC', '7 Hari', 'Belum Dimulai'),
(2, 'Diklat BCD', '5 Hari', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_mobile` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `no_mobile`, `status`, `dob`, `gender`) VALUES
(15, 'tes1', 'tes1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '12233', NULL, '2017-11-01', ''),
(17, 'tedi1', 'tedi1@gmail.com', '1', 'wuwuwuwuw', NULL, '2017-11-01', 'male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
