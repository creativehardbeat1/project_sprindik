DELIMITER $$

DROP VIEW IF EXISTS `dbsprindik`.`v_user_diklat`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user_diklat` AS (SELECT CONCAT(`a`.`id_user`,`a`.`id_diklat`) AS `id`,`a`.`id_user` AS `id_user`,`b`.`nama` AS `nama`,`b`.`umur` AS `umur`,`b`.`alamat` AS `alamat`,`b`.`email` AS `email`,`b`.`url_dok_ktp` AS `url_dok_ktp`,`b`.`no_mobile` AS `no_mobile`,`a`.`id_diklat` AS `id_diklat`,`c`.`keterangan` AS `keterangan`,`c`.`tgl_mulai` AS `tgl_mulai`,`c`.`tgl_selesai` AS `tgl_selesai`,`c`.`status` AS `status_diklat`,`c`.`catatan` AS `catatan`,`d`.`status` AS `status_permohonan`,`e`.`status_peserta` AS `status_peserta`,`e`.`status_kegiatan` AS `status_kegiatan` FROM ((((`oltp_calon_peserta` `a` LEFT JOIN `oltp_profil` `b` ON((`a`.`id_user` = `b`.`id_user`))) LEFT JOIN `ref_diklat` `c` ON((`a`.`id_diklat` = CONVERT(`c`.`id_diklat` USING utf8)))) LEFT JOIN `ref_status` `d` ON((`a`.`kode_status` = CONVERT(`d`.`kode_status` USING utf8)))) LEFT JOIN `oltp_peserta_diklat` `e` ON((CONCAT(`a`.`id_user`,`a`.`id_diklat`) = CONVERT(`e`.`id_daftar_diklat` USING utf8)))))$$

DELIMITER ;

DELIMITER $$

DROP TRIGGER /*!50032 IF EXISTS */ `dbsprindik`.`oltp_peserta_diklat_ins_trig`$$

CREATE
    /*!50017 DEFINER = 'root'@'localhost' */
    TRIGGER `oltp_peserta_diklat_ins_trig` AFTER UPDATE ON `oltp_calon_peserta` 
    FOR EACH ROW BEGIN
 IF NEW.kode_status = 4 THEN
INSERT INTO oltp_peserta_diklat (id_daftar_diklat,id_user, id_diklat) VALUES (CONCAT(new.id_user,new.id_diklat),new.id_user, new.id_diklat);
END IF;
END;
$$

DELIMITER ;