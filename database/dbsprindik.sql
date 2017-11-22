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
  `id_user` int(11) NOT NULL,
  `id_diklat` int(11) NOT NULL,
  `status` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `calon_peserta` */

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

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `id_kelamin` int(1) DEFAULT NULL,
  `id_posisi` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id`,`nama`,`telp`,`id_kota`,`id_kelamin`,`id_posisi`,`status`) values ('10','Antony Febriansyah Hartono','082199568540',1,1,1,1),('11','Hafizh Asrofil Al Banna','087859615271',1,1,1,1),('12','Faiq Fajrullah','085736333728',1,1,2,1),('3','Mustofa Halim','081330493322',1,1,3,1),('4','Dody Ahmad Kusuma Jaya','083854520015',1,1,2,1),('5','Mokhammad Choirul Ikhsan','085749535400',3,1,2,1),('7','Achmad Chadil Auwfar','08984119934',2,1,1,1),('8','Rizal Ferdian','087777284179',1,1,3,1),('9','Redika Angga Pratama','083834657395',1,1,3,1),('1','Tolkha Hasan','081233072122',1,1,4,1),('2','Wawan Dwi Prasetyo','085745966707',4,1,4,1);

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

/*Table structure for table `profil` */

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url_dok_ktp` varchar(255) DEFAULT NULL,
  `url_dok_ijazah` varchar(255) DEFAULT NULL,
  `time_creation` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `profil` */

insert  into `profil`(`id`,`id_user`,`nama`,`umur`,`alamat`,`email`,`url_dok_ktp`,`url_dok_ijazah`,`time_creation`) values (2,1010,'Barthi Dasan',30,'Perumahan Grand Wisata Cluster Festive Garden Blok AG 11 no 15','barthi77@gmail.com','/aaa/aa.jpg','/aaa/aa.jpg','2017-11-01');

/*Table structure for table `ref_diklat` */

DROP TABLE IF EXISTS `ref_diklat`;

CREATE TABLE `ref_diklat` (
  `id_diklat` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`id_diklat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ref_diklat` */

insert  into `ref_diklat`(`id_diklat`,`keterangan`,`tgl_mulai`,`tgl_selesai`,`status`,`catatan`) values (3,'Diklat ilmu bumi','2017-11-01','2017-11-30','Sedang Berjalan',NULL),(4,'Diklat ilmu Tanah','2017-11-23','2017-11-29','Pendaftaran Dibuka','Persyaratan:\r\n- Minimal Ijazah SMA/D1\r\n- Umur 35 tahun\r\n- Belum Pernah mengikuti diklat yang sama sebelumnya\r\n- Surat Keterangan sehat dari dokter pemerintah'),(5,'Diklat YYY','2017-11-22','2017-11-24','Pendaftaran Dibuka',NULL),(6,'Diklat ilmu Tanah 1','2017-11-22','2017-11-23','Pendaftaran Ditutup',NULL),(7,'Diklat ABC','2017-11-22','2017-11-23','Sedang Berjalan','nice');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_mobile` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`username`,`email`,`password`,`no_mobile`,`status`,`dob`,`gender`) values (15,'tes1','tes1@gmail.com','c4ca4238a0b923820dcc509a6f75849b','12233',NULL,'2017-11-01',''),(17,'tedi1','tedi1@gmail.com','1','wuwuwuwuw',NULL,'2017-11-01','male'),(18,'tesq','a','0cc175b9c0f1b6a831c399e269772661','22',NULL,NULL,NULL),(19,'barthi','b@b.com','c4ca4238a0b923820dcc509a6f75849b','1',NULL,NULL,NULL),(20,'barthi1','aa','c4ca4238a0b923820dcc509a6f75849b','3434',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
