/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


/*Table structure for table `calon_peserta` */

DROP TABLE IF EXISTS `calon_peserta`;



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
