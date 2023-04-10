/*
SQLyog Community v12.5.0 (32 bit)
MySQL - 5.7.24 : Database - rph
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rph` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rph`;

/*Table structure for table `jadual` */

DROP TABLE IF EXISTS `jadual`;

CREATE TABLE `jadual` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `year_id` int(11) DEFAULT NULL,
  `hari` varchar(222) DEFAULT NULL,
  `subjek` varchar(222) DEFAULT NULL,
  `kelas` varchar(222) DEFAULT NULL,
  `masa_dari` time DEFAULT NULL,
  `masa_hingga` time DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `rph_main` */

DROP TABLE IF EXISTS `rph_main`;

CREATE TABLE `rph_main` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `year_id` int(11) DEFAULT NULL,
  `subjek` varchar(222) DEFAULT NULL,
  `kelas` varchar(222) DEFAULT NULL,
  `hari` varchar(222) DEFAULT NULL,
  `minggu` varchar(222) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `masa_dari` time DEFAULT NULL,
  `masa_hingga` time DEFAULT NULL,
  `topik_utama` varchar(222) DEFAULT NULL,
  `sub_topik` varchar(222) DEFAULT NULL,
  `objektif_id` varchar(222) DEFAULT NULL,
  `objektif` varchar(222) DEFAULT NULL,
  `aktiviti` text,
  `abm_1` varchar(222) DEFAULT NULL,
  `abm_2` varchar(222) DEFAULT NULL,
  `abm_3` varchar(222) DEFAULT NULL,
  `abm_4` varchar(222) DEFAULT NULL,
  `abm_5` varchar(222) DEFAULT NULL,
  `abm_lain2` varchar(222) DEFAULT NULL,
  `emk_1` varchar(222) DEFAULT NULL,
  `emk_2` varchar(222) DEFAULT NULL,
  `emk_3` varchar(222) DEFAULT NULL,
  `emk_4` varchar(222) DEFAULT NULL,
  `emk_5` varchar(222) DEFAULT NULL,
  `emk_6` varchar(222) DEFAULT NULL,
  `emk_7` varchar(222) DEFAULT NULL,
  `emk_8` varchar(222) DEFAULT NULL,
  `emk_9` varchar(222) DEFAULT NULL,
  `emk_10` varchar(222) DEFAULT NULL,
  `emk_11` varchar(222) DEFAULT NULL,
  `emk_12` varchar(222) DEFAULT NULL,
  `tpn_1` varchar(222) DEFAULT NULL,
  `tpn_2` varchar(222) DEFAULT NULL,
  `tpn_3` varchar(222) DEFAULT NULL,
  `tpn_4` varchar(222) DEFAULT NULL,
  `tpn_5` varchar(222) DEFAULT NULL,
  `tpn_6` varchar(222) DEFAULT NULL,
  `ppi_1` varchar(222) DEFAULT NULL,
  `ppi_2` varchar(222) DEFAULT NULL,
  `ppi_3` varchar(222) DEFAULT NULL,
  `ppi_4` varchar(222) DEFAULT NULL,
  `ppi_5` varchar(222) DEFAULT NULL,
  `ppi_6` varchar(222) DEFAULT NULL,
  `ppi_7` varchar(222) DEFAULT NULL,
  `ppi_8` varchar(222) DEFAULT NULL,
  `pdpc_1` varchar(222) DEFAULT NULL,
  `pdpc_2` varchar(222) DEFAULT NULL,
  `pdpc_3` varchar(222) DEFAULT NULL,
  `pdpc_4` varchar(222) DEFAULT NULL,
  `pdpc_5` varchar(222) DEFAULT NULL,
  `pdpc_6` varchar(222) DEFAULT NULL,
  `pdpc_7` varchar(222) DEFAULT NULL,
  `pdpc_8` varchar(222) DEFAULT NULL,
  `pdpc_lain2` varchar(222) DEFAULT NULL,
  `rlsi_1` varchar(222) DEFAULT NULL,
  `rlsi_2` varchar(222) DEFAULT NULL,
  `rlsi_3` varchar(222) DEFAULT NULL,
  `rlsi_4` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `subjek_detail` */

DROP TABLE IF EXISTS `subjek_detail`;

CREATE TABLE `subjek_detail` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `subjek` varchar(100) DEFAULT 'MATEMATIK',
  `type` varchar(100) DEFAULT NULL,
  `desc` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

/*Table structure for table `year_id` */

DROP TABLE IF EXISTS `year_id`;

CREATE TABLE `year_id` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `effdate` date DEFAULT NULL,
  `desc` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `effdate` (`effdate`),
  UNIQUE KEY `desc` (`desc`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
