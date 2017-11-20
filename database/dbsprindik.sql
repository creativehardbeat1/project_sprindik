# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                         127.0.0.1
# Database:                     dbsprindik
# Server version:               5.6.16
# Server OS:                    Win32
# Target compatibility:         ANSI SQL
# HeidiSQL version:             4.0
# Date/time:                    20/11/2017 19:52:52
# --------------------------------------------------------

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ANSI,NO_BACKSLASH_ESCAPES';*/
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;*/


#
# Database structure for database 'dbsprindik'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ "dbsprindik" /*!40100 DEFAULT CHARACTER SET latin1 */;

USE "dbsprindik";


#
# Table structure for table 'kelamin'
#

CREATE TABLE "kelamin" (
  "id" int(11) NOT NULL,
  "nama" varchar(50) DEFAULT NULL,
  PRIMARY KEY ("id")
);



#
# Table structure for table 'kota'
#

CREATE TABLE "kota" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "nama" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=23;



#
# Table structure for table 'pegawai'
#

CREATE TABLE "pegawai" (
  "id" varchar(255) NOT NULL,
  "nama" varchar(255) DEFAULT NULL,
  "telp" varchar(255) DEFAULT NULL,
  "id_kota" int(11) DEFAULT NULL,
  "id_kelamin" int(1) DEFAULT NULL,
  "id_posisi" int(11) DEFAULT NULL,
  "status" int(1) DEFAULT NULL
);



#
# Table structure for table 'persons'
#

CREATE TABLE "persons" (
  "id" int(11) unsigned NOT NULL AUTO_INCREMENT,
  "firstName" varchar(100) DEFAULT NULL,
  "lastName" varchar(100) DEFAULT NULL,
  "gender" enum('male','female') DEFAULT NULL,
  "address" varchar(200) DEFAULT NULL,
  "dob" date DEFAULT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=9;



#
# Table structure for table 'posisi'
#

CREATE TABLE "posisi" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "nama" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=7;



#
# Table structure for table 'ref_diklat'
#

CREATE TABLE "ref_diklat" (
  "id" int(8) NOT NULL AUTO_INCREMENT,
  "keterangan" varchar(255) NOT NULL,
  "jadwal" varchar(100) DEFAULT NULL,
  "status" varchar(100) DEFAULT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=3;



#
# Table structure for table 'user'
#

CREATE TABLE "user" (
  "user_id" int(11) NOT NULL AUTO_INCREMENT,
  "username" varchar(50) DEFAULT NULL,
  "email" varchar(50) DEFAULT NULL,
  "password" varchar(50) DEFAULT NULL,
  "no_mobile" varchar(50) DEFAULT NULL,
  "status" varchar(50) DEFAULT NULL,
  "dob" date DEFAULT NULL,
  "gender" enum('male','female') DEFAULT NULL,
  PRIMARY KEY ("user_id")
) AUTO_INCREMENT=18;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE;*/
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/
