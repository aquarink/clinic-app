/*
SQLyog Professional v10.42 
MySQL - 5.7.10-log : Database - darja_app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`darja_app` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `darja_app`;

/*Table structure for table `antrian_tb` */

DROP TABLE IF EXISTS `antrian_tb`;

CREATE TABLE `antrian_tb` (
  `id_antri` int(11) NOT NULL AUTO_INCREMENT,
  `no_antri` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_antri`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `antrian_tb` */

insert  into `antrian_tb`(`id_antri`,`no_antri`,`tanggal`) values (28,1,'2016-08-28'),(29,2,'2016-08-28'),(30,3,'2016-08-28');

/*Table structure for table `pasien_tb` */

DROP TABLE IF EXISTS `pasien_tb`;

CREATE TABLE `pasien_tb` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL,
  `sekarang` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `pasien_tb` */

insert  into `pasien_tb`(`id_pasien`,`nama`,`alamat`,`email`,`telepon`,`status`,`sekarang`) values (35,'Pasien 1','pasien1@yahoo.com','sds','11111111','1','2016-08-28 02:40:44'),(36,'Pasien 2 edit','Alamat Pasien 2','pasien2@yahoo.com','222222 Edit','1','2016-08-28 05:53:09');

/*Table structure for table `pesan_tb` */

DROP TABLE IF EXISTS `pesan_tb`;

CREATE TABLE `pesan_tb` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `isi_pesan` text,
  `status` enum('1','2') DEFAULT NULL,
  `sekarang` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pesan_tb` */

/*Table structure for table `rekmedik_tb` */

DROP TABLE IF EXISTS `rekmedik_tb`;

CREATE TABLE `rekmedik_tb` (
  `id_rekmedik` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) DEFAULT NULL,
  `tensi` varchar(10) DEFAULT NULL,
  `diagnosa` text,
  `sekarang` date DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`id_rekmedik`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `rekmedik_tb` */

insert  into `rekmedik_tb`(`id_rekmedik`,`id_pasien`,`tensi`,`diagnosa`,`sekarang`,`status`) values (10,36,'test','tes','2016-08-28','1'),(11,35,'tes 35','35','2016-08-28','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
