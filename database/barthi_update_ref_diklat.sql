/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.7.18-log : Database - dbsprindik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbsprindik` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbsprindik`;

/*Table structure for table `ref_diklat` */

DROP TABLE IF EXISTS `ref_diklat`;

CREATE TABLE `ref_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_diklat` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `catatan` text,
  `flag_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Unique_id_diklat` (`id_diklat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ref_diklat` */

insert  into `ref_diklat`(`id`,`id_diklat`,`keterangan`,`tgl_mulai`,`tgl_selesai`,`status`,`catatan`,`flag_status`) values (5,'001','Diklat ilmu bumi','2017-11-01','2017-11-30','Sedang Berjalan','Persyaratan:',NULL),(6,'002','Diklat ilmu Tanah','2017-11-23','2017-11-29','Pendaftaran Dibuka','Persyaratan:\r\n- Minimal Ijazah SMA/D1\r\n- Umur 35 tahun\r\n- Belum Pernah mengikuti diklat yang sama sebelumnya\r\n- Surat Keterangan sehat dari dokter pemerintah','1'),(7,'003','Diklat Geodesi','2017-11-21','2017-11-24','Pendaftaran Dibuka',NULL,NULL),(8,'A002','diklat z','2017-10-30','2017-11-22','Pendaftaran Ditutup','zz','2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
