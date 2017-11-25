/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.7.18-log : Database - dbsprindik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;


insert  into `ref_status`(`id`,`kode_status`,`status`,`keterangan`) values (7,'98','Dokumen ditolak','Dokumen tidak disetujui'),(8,'99','Usulan diklat ditolak','Usulan diklat ditolak');

DELIMITER $$

DROP VIEW IF EXISTS `dbsprindik`.`v_user_diklat`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user_diklat` AS (SELECT CONCAT(`a`.`id_user`,`a`.`id_diklat`) AS `id`,`a`.`id_user` AS `id_user`,`b`.`nama` AS `nama`,`b`.`umur` AS `umur`,`b`.`alamat` AS `alamat`,`b`.`email` AS `email`,`b`.`url_dok_ktp` AS `url_dok_ktp`,`b`.`no_mobile` AS `no_mobile`,`a`.`id_diklat` AS `id_diklat`,`c`.`keterangan` AS `keterangan`,`c`.`tgl_mulai` AS `tgl_mulai`,`c`.`tgl_selesai` AS `tgl_selesai`,`c`.`status` AS `status_diklat`,`c`.`catatan` AS `catatan`,`d`.`status` AS `status_permohonan` FROM (((`oltp_calon_peserta` `a` LEFT JOIN `oltp_profil` `b` ON((`a`.`id_user` = `b`.`id_user`))) LEFT JOIN `ref_diklat` `c` ON((`a`.`id_diklat` = CONVERT(`c`.`id_diklat` USING utf8)))) LEFT JOIN `ref_status` `d` ON((`a`.`kode_status` = CONVERT(`d`.`kode_status` USING utf8)))))$$

DELIMITER ;