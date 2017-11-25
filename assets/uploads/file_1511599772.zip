DROP TABLE IF EXISTS `oltp_calon_peserta`;

CREATE TABLE `oltp_calon_peserta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(50) NOT NULL,
  `id_diklat` varchar(50) DEFAULT NULL,
  `kode_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Unique_calon` (`id_user`,`id_diklat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
