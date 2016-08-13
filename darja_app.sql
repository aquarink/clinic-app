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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `antrian_tb` */

insert  into `antrian_tb`(`id_antri`,`no_antri`,`tanggal`) values (20,1,'2016-08-14'),(21,2,'2016-08-14'),(22,3,'2016-08-14'),(23,4,'2016-08-14'),(24,5,'2016-08-14'),(25,6,'2016-08-14'),(26,7,'2016-08-14');

/*Table structure for table `pasien_tb` */

DROP TABLE IF EXISTS `pasien_tb`;

CREATE TABLE `pasien_tb` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL,
  `sekarang` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `pasien_tb` */

insert  into `pasien_tb`(`id_pasien`,`nama`,`email`,`telepon`,`status`,`sekarang`) values (33,'kucrut','kucrut@budi.com','13526278','1','2016-08-14 02:10:01');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `rekmedik_tb` */

insert  into `rekmedik_tb`(`id_rekmedik`,`id_pasien`,`tensi`,`diagnosa`,`sekarang`,`status`) values (1,33,'120/80','Skripsi geblek','2016-08-14','1'),(2,33,'120/80','wewe','2016-08-14','1'),(3,33,'120/80','qwq','2016-08-14','1'),(4,33,'120/80','asas','2016-08-14','1'),(5,33,'120/80','aASS','2016-08-14','1'),(6,33,'120/80','asas','2016-08-14','1'),(7,33,'150/212','asas','2016-08-14','1'),(8,33,'120/80','pacul gila','2016-08-14','1'),(9,33,'120/80','dddd','2016-08-14','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
