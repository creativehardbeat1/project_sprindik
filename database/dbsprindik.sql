/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.7.18-log : Database - dbsprindik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbsprindik` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbsprindik`;

/*Table structure for table `calon_peserta` */

DROP TABLE IF EXISTS `calon_peserta`;

CREATE TABLE `calon_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_diklat` int(11) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_user_diklat` (`id_user`,`id_diklat`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `calon_peserta` */

insert  into `calon_peserta`(`id`,`id_user`,`id_diklat`,`status`) values (20,24,7,0),(21,25,7,1);

/*Table structure for table `kelamin` */

DROP TABLE IF EXISTS `kelamin`;

CREATE TABLE `kelamin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelamin` */

insert  into `kelamin`(`id`,`nama`) values (1,'Laki laki'),(2,'Perempuan');

/*Table structure for table `kota` */

DROP TABLE IF EXISTS `kota`;

CREATE TABLE `kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `kota` */

insert  into `kota`(`id`,`nama`) values (1,'Malang'),(3,'Blitar'),(4,'Tulungagung'),(17,'Jakarta'),(21,'Surabaya'),(22,'Paris');

/*Table structure for table `oltp_peserta` */

DROP TABLE IF EXISTS `oltp_peserta`;

CREATE TABLE `oltp_peserta` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `oltp_peserta` */

insert  into `oltp_peserta`(`id`,`id_user`,`id_diklat`,`nama`,`umur`,`alamat`,`email`,`url_dok_ktp`,`url_dok_ijazah`,`time_creation`) values (3,'25','001','Pak Purwontoro',32,'Jalan Kebumen',NULL,NULL,NULL,'2017-11-22 22:57:03');

/*Table structure for table `oltp_peserta_diklat` */

DROP TABLE IF EXISTS `oltp_peserta_diklat`;

CREATE TABLE `oltp_peserta_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flag_approval` varchar(50) DEFAULT NULL,
  `time_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_daftar_diklat` varchar(50) DEFAULT NULL,
  `id_peserta` varchar(50) DEFAULT NULL,
  `id_diklat` varchar(50) DEFAULT NULL,
  `status_peserta` varchar(50) DEFAULT NULL,
  `status_kegiatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `oltp_peserta_diklat` */

insert  into `oltp_peserta_diklat`(`id`,`flag_approval`,`time_creation`,`id_daftar_diklat`,`id_peserta`,`id_diklat`,`status_peserta`,`status_kegiatan`) values (19,NULL,'2017-11-22 13:31:29',NULL,'3','001',NULL,NULL);

/*Table structure for table `oltp_profil` */

DROP TABLE IF EXISTS `oltp_profil`;

CREATE TABLE `oltp_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url_dok_ktp` varchar(255) DEFAULT NULL,
  `url_dok_ijazah` varchar(255) DEFAULT NULL,
  `time_creation` date DEFAULT NULL,
  `no_mobile` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `oltp_profil` */

insert  into `oltp_profil`(`id`,`id_user`,`nama`,`umur`,`alamat`,`email`,`url_dok_ktp`,`url_dok_ijazah`,`time_creation`,`no_mobile`) values (2,1010,'Barthi Dasan',30,'Perumahan Grand Wisata Cluster Festive Garden Blok AG 11 no 15','barthi78@gmail.com','/aaa/aa.jpg','/aaa/aa.jpg','2017-11-01',NULL),(3,23,'Barthi Dasan',30,'Perumahan Grand Wisata Cluster Festive Garden Blok AG 11 no 15','barthi77@gmail.com','/img/xxx.jpg','/aaa/aa.jpg','2017-11-08',NULL),(4,24,'barthi Dasan',30,'jl. darat no.19','barthi@gmail.com','/img/xxx.jpg','/img/yyy.jpg','2017-11-01',NULL),(5,25,'barth',20,'jakarta','barthi99@gmail.com','yyy.jpg','aaa.jpg','2017-11-09',NULL);

/*Table structure for table `oltp_user` */

DROP TABLE IF EXISTS `oltp_user`;

CREATE TABLE `oltp_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_mobile` varchar(50) DEFAULT NULL,
  `time_creation` timestamp NULL DEFAULT NULL,
  `flag_status` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `oltp_user` */

insert  into `oltp_user`(`id_user`,`username`,`password`,`status`,`email`,`no_mobile`,`time_creation`,`flag_status`) values (21,'barth3','c4ca4238a0b923820dcc509a6f75849b',NULL,'123','123',NULL,NULL),(22,'barthi','c4ca4238a0b923820dcc509a6f75849b',NULL,'bb','123',NULL,NULL),(23,'barthi7','c4ca4238a0b923820dcc509a6f75849b',NULL,'barthi77@gmail.com','0812',NULL,NULL),(24,'barthi1','c4ca4238a0b923820dcc509a6f75849b',NULL,'barthi@gmail.com','123',NULL,NULL),(25,'barth','c4ca4238a0b923820dcc509a6f75849b',NULL,'barthi99@gmail.com','777',NULL,NULL);

/*Table structure for table `persons` */

DROP TABLE IF EXISTS `persons`;

CREATE TABLE `persons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `persons` */

insert  into `persons`(`id`,`firstName`,`lastName`,`gender`,`address`,`dob`) values (2,'Garrett','Winters','male','Tokyo','1988-09-02'),(3,'John','Doe','male','Kansas','1972-11-02'),(4,'Tatyana','Fitzpatrick','male','London','1989-01-01'),(6,'1226','2222','male','www','2017-11-01'),(7,'335','2333','female','333','2017-11-09');

/*Table structure for table `posisi` */

DROP TABLE IF EXISTS `posisi`;

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `posisi` */

insert  into `posisi`(`id`,`nama`) values (1,'IT'),(2,'HRD'),(3,'Keuangan'),(4,'Produk'),(5,'Web Developer'),(6,'Tes');

/*Table structure for table `ref_akses` */

DROP TABLE IF EXISTS `ref_akses`;

CREATE TABLE `ref_akses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `flag_akses` varchar(100) DEFAULT NULL,
  `flag_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ref_akses` */

insert  into `ref_akses`(`id`,`id_user`,`username`,`nip`,`flag_akses`,`flag_status`) values (1,'18','tes1','c4ca4238a0b923820dcc509a6f75849b',NULL,NULL),(2,'19','tes2','c4ca4238a0b923820dcc509a6f75849b',NULL,NULL);

/*Table structure for table `ref_diklat` */

DROP TABLE IF EXISTS `ref_diklat`;

CREATE TABLE `ref_diklat` (
  `id_diklat` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `catatan` text,
  `flag_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_diklat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ref_diklat` */

insert  into `ref_diklat`(`id_diklat`,`keterangan`,`tgl_mulai`,`tgl_selesai`,`status`,`catatan`,`flag_status`) values (6,'Diklat ilmu Tanah 1','2017-11-22','2017-11-23','Pendaftaran Ditutup','--',2),(7,'Diklat ABC','2017-11-22','2017-11-23','Sedang Berjalan','Persyaratan:\r\n1.\r\n2.\r\n3.\r\n4.\r\n5.',1);

/*Table structure for table `ref_flag` */

DROP TABLE IF EXISTS `ref_flag`;

CREATE TABLE `ref_flag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_diklat` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ref_flag` */

insert  into `ref_flag`(`id`,`id_diklat`,`keterangan`,`status`,`catatan`) values (1,NULL,'Diklat ilmu bumi','Sedang Berjalan',NULL),(2,NULL,'Diklat ilmu Tanah','Pendaftaran Dibuka','Persyaratan:\r\n- Minimal Ijazah SMA/D1\r\n- Umur 35 tahun\r\n- Belum Pernah mengikuti diklat yang sama sebelumnya\r\n- Surat Keterangan sehat dari dokter pemerintah'),(3,NULL,'Diklat YYY','Pendaftaran Dibuka',NULL),(4,NULL,'Diklat ilmu Tanah 1','Pendaftaran Ditutup',NULL),(5,NULL,'Diklat ABC','Sedang Berjalan','nice');

/*Table structure for table `ref_pegawai` */

DROP TABLE IF EXISTS `ref_pegawai`;

CREATE TABLE `ref_pegawai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL DEFAULT '',
  `nama_pegawai` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ref_pegawai` */

insert  into `ref_pegawai`(`id`,`id_user`,`nip`,`nama_pegawai`) values (5,0,'73737373873','tes1223');

/*Table structure for table `view_laporan_diklat` */

DROP TABLE IF EXISTS `view_laporan_diklat`;

CREATE TABLE `view_laporan_diklat` (
  `id` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `view_laporan_diklat` */

/* Trigger structure for table `oltp_user` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `oltp_user_after_ins_trig` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `oltp_user_after_ins_trig` AFTER INSERT ON `oltp_user` FOR EACH ROW BEGIN
INSERT INTO oltp_profil (id_user, email)
VALUES (new.id_user, new.email, new.no_mobile);
END */$$


DELIMITER ;

/*Table structure for table `v_user_diklat` */

DROP TABLE IF EXISTS `v_user_diklat`;

/*!50001 DROP VIEW IF EXISTS `v_user_diklat` */;
/*!50001 DROP TABLE IF EXISTS `v_user_diklat` */;

/*!50001 CREATE TABLE `v_user_diklat` (
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url_dok_ktp` varchar(255) DEFAULT NULL,
  `url_dok_ijazah` varchar(255) DEFAULT NULL,
  `no_mobile` varchar(50) DEFAULT NULL,
  `id_diklat` int(11) DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status_diklat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `catatan` text CHARACTER SET latin1,
  `status_permohonan` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*View structure for view v_user_diklat */

/*!50001 DROP TABLE IF EXISTS `v_user_diklat` */;
/*!50001 DROP VIEW IF EXISTS `v_user_diklat` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user_diklat` AS (select `a`.`id_user` AS `id_user`,`b`.`nama` AS `nama`,`b`.`umur` AS `umur`,`b`.`alamat` AS `alamat`,`b`.`email` AS `email`,`b`.`url_dok_ktp` AS `url_dok_ktp`,`b`.`url_dok_ijazah` AS `url_dok_ijazah`,`b`.`no_mobile` AS `no_mobile`,`a`.`id_diklat` AS `id_diklat`,`c`.`keterangan` AS `keterangan`,`c`.`tgl_mulai` AS `tgl_mulai`,`c`.`tgl_selesai` AS `tgl_selesai`,`c`.`status` AS `status_diklat`,`c`.`catatan` AS `catatan`,`a`.`status` AS `status_permohonan` from ((`calon_peserta` `a` left join `oltp_profil` `b` on((`a`.`id_user` = `b`.`id_user`))) left join `ref_diklat` `c` on((`a`.`id_diklat` = `c`.`id_diklat`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
