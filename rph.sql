/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 5.7.24 : Database - rph
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `test`;

/*Table structure for table `jadual` */

DROP TABLE IF EXISTS `jadual`;

CREATE TABLE `jadual` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `year_id` int(11) DEFAULT NULL,
  `hari` varchar(222) DEFAULT NULL,
  `subjekcode` varchar(222) DEFAULT NULL,
  `kelas` varchar(222) DEFAULT NULL,
  `masa_dari` time DEFAULT NULL,
  `masa_hingga` time DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `jadual` */

insert  into `jadual`(`idno`,`year_id`,`hari`,`subjekcode`,`kelas`,`masa_dari`,`masa_hingga`) values 
(1,6,'ISNIN','1','4A','11:00:00','12:00:00'),
(2,6,'ISNIN','1','4B','13:10:00','14:10:00'),
(6,6,'ISNIN','1','9D','13:00:00','15:00:00');

/*Table structure for table `rph_main` */

DROP TABLE IF EXISTS `rph_main`;

CREATE TABLE `rph_main` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `year_id` int(11) DEFAULT NULL,
  `subjekcode` varchar(222) DEFAULT NULL,
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
  `bilmg_1` varchar(222) DEFAULT '-',
  `bilmg_2` varchar(222) DEFAULT '-',
  `bilxmg_1` varchar(222) DEFAULT '-',
  `bilxmg_2` varchar(222) DEFAULT '-',
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `rph_main` */

insert  into `rph_main`(`idno`,`year_id`,`subjekcode`,`kelas`,`hari`,`minggu`,`date`,`masa_dari`,`masa_hingga`,`topik_utama`,`sub_topik`,`objektif_id`,`objektif`,`aktiviti`,`abm_1`,`abm_2`,`abm_3`,`abm_4`,`abm_5`,`abm_lain2`,`emk_1`,`emk_2`,`emk_3`,`emk_4`,`emk_5`,`emk_6`,`emk_7`,`emk_8`,`emk_9`,`emk_10`,`emk_11`,`emk_12`,`tpn_1`,`tpn_2`,`tpn_3`,`tpn_4`,`tpn_5`,`tpn_6`,`ppi_1`,`ppi_2`,`ppi_3`,`ppi_4`,`ppi_5`,`ppi_6`,`ppi_7`,`ppi_8`,`pdpc_1`,`pdpc_2`,`pdpc_3`,`pdpc_4`,`pdpc_5`,`pdpc_6`,`pdpc_7`,`pdpc_8`,`pdpc_lain2`,`rlsi_1`,`rlsi_2`,`rlsi_3`,`rlsi_4`,`bilmg_1`,`bilmg_2`,`bilxmg_1`,`bilxmg_2`) values 
(1,6,'1','4A','ISNIN','Week-7','2023-04-10','11:00:00','12:00:00','1','10',NULL,'31','1212',NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','11','12','1','12'),
(2,6,'1','4B','ISNIN','Week-7','2023-04-10','13:10:00','14:10:00','8','23',NULL,'86','1212',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,'1','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'12','11','12','12'),
(3,6,'1','9D','ISNIN','Week-7','2023-04-10','13:00:00','15:00:00','4','16',NULL,'58','aosdsadasd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `subjek` */

DROP TABLE IF EXISTS `subjek`;

CREATE TABLE `subjek` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `subjek` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `subjek` */

insert  into `subjek`(`idno`,`subjek`) values 
(1,'MATEMATIK');

/*Table structure for table `subjek_detail` */

DROP TABLE IF EXISTS `subjek_detail`;

CREATE TABLE `subjek_detail` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `subjekcode` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `desc` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

/*Data for the table `subjek_detail` */

insert  into `subjek_detail`(`idno`,`subjekcode`,`type`,`desc`) values 
(1,'1','UTAMA','1.0  FUNGSI DAN PERSAMAAN KUADRATIK DALAM SATU PEMBOLEH'),
(2,'1','UTAMA','2.0   ASAS NOMBOR'),
(3,'1','UTAMA','3.0   PENAAKULAN LOGIK'),
(4,'1','UTAMA','4.0   OPERASI SET'),
(5,'1','UTAMA','5.0   RANGKAIAN DALAM TEORI GRAF'),
(6,'1','UTAMA','6.0   KETAKSAMAAN LINEAR DALAM DUA PEMBOLEH UBAH'),
(7,'1','UTAMA','7.0   GRAF GERAKAN'),
(8,'1','UTAMA','8.0   SUKATAN SERAKAN DATA TAK TERKUMPUL'),
(9,'1','UTAMA','9.0 KEBARANGKALIAN PERISTIWA BERGABUNG'),
(10,'1','SUBTOPIK','1.1   Fungsi dan Persamaan Kuadratik'),
(11,'1','SUBTOPIK','2.1   Asas Nombor'),
(12,'1','SUBTOPIK','3.1   Pernyataan'),
(13,'1','SUBTOPIK','3.2   Hujah'),
(14,'1','SUBTOPIK','4.1   Persilangan set'),
(15,'1','SUBTOPIK','4.2   Kesatuan set'),
(16,'1','SUBTOPIK','4.3   Gabungan operasi set'),
(17,'1','SUBTOPIK','5.1   Rangkaian'),
(18,'1','SUBTOPIK','6.1   Ketaksamaan linear dalam dua pemboleh ubah'),
(19,'1','SUBTOPIK','6.2   Sistem ketaksamaan linear dalam dua pemboleh ubah'),
(20,'1','SUBTOPIK','7.1   Graf jarak- masa'),
(21,'1','SUBTOPIK','7.2   Graf laju - masa'),
(22,'1','SUBTOPIK','8.1   Serakan'),
(23,'1','SUBTOPIK','8.2   Sukatan serakan'),
(24,'1','SUBTOPIK','9.1   Peristiwa bergabung'),
(25,'1','SUBTOPIK','9.2   Peristiwa bergabung dan peristiwa tak bergabung'),
(26,'1','SUBTOPIK','9.3   Peristiwa saling eksklusif dan peristiwa tidak saling eksklusif'),
(27,'1','SUBTOPIK','9.4   Aplikasi kebarangkalian peristiwa bergabung'),
(28,'1','SUBTOPIK','10.1   Perancangan dan pengurusan kewangan'),
(29,'1','OBJEKTIF','1.1.1   Mengenal pasti dan menerangkan ciri-ciri ungkapan kuadratik dalam satu pemboleh ubah'),
(30,'1','OBJEKTIF','1.1.2   Mengenal fungsi kuadratik sebagai hubungan banyak kepada satu, dan seterusnya memerihalkan ciri-ciri fungsi kuadratik'),
(31,'1','OBJEKTIF','1.1.3   Menyiasat dan membuat generalisasi tentang kesan perubahan nilai a, b, dan c ke atas graf fungsi kuadratik  f(x) = ax² + bx + c'),
(32,'1','OBJEKTIF','1.1.4   Membentuk fungsi kuadratik berdasarkan satu situasi dan seterusnya menghubungkaitkan dengan persamaan kuadratik'),
(33,'1','OBJEKTIF','1.1.5   Menerangkan maksud punca suatu persamaan kuadratik'),
(34,'1','OBJEKTIF','1.1.6   Menentukan punca suatu persamaan kuadratik dengan kaedah pemfaktoran'),
(35,'1','OBJEKTIF','1.1.7   Melakar graf fungsi kuadratik'),
(36,'1','OBJEKTIF','1.1.8   Menyelesaikan masalah yang melibatkan persamaan kuadratik'),
(37,'1','OBJEKTIF','2.1.1   Mewakil dan menjelaskan nombor dalam pelbagai asas dari segi angka, nilai tempat, nilai digit dan nilai nombor berdasarkan proses pengumpulan'),
(38,'1','OBJEKTIF','2.1.2   Menukar nombor daripada satu asas kepada asas yang lain menggunakan pelbagai kaedah'),
(39,'1','OBJEKTIF','2.1.3   Membuat pengiraan yang melibatkan operasi tambah dan tolak bagi nombor dalam pelbagai asas'),
(40,'1','OBJEKTIF','2.1.4   Menyelesaikan masalah yang melibatkan asas nombor'),
(41,'1','OBJEKTIF','3.1.1   Menerangkan maksud pernyataan dan seterusnya  menentukan nilai kebenaran bagi suatu pernyataan'),
(42,'1','OBJEKTIF','3.1.2   Menafikan suatu pernyataan'),
(43,'1','OBJEKTIF','3.1.3   Menentukan nilai kebenaran suatu pernyataan majmuk'),
(44,'1','OBJEKTIF','3.1.4   Membina pernyataan dalam bentuk implikasi ( i )Jika P, maka q  ( ii )p jika dan hanya jika q'),
(45,'1','OBJEKTIF','3.1.5   Membina dan membandingkan nilai kebenaran akas, songsangan dan kontrapositif bagi satu implikasi'),
(46,'1','OBJEKTIF','3.1.6   Menentukan contoh penyangkal untuk menafikan kebenaran pernyataan tertentu'),
(47,'1','OBJEKTIF','3.2.1   Menerangkan maksud hujah, dan membezakan hujah deduktif dan hujah induktif'),
(48,'1','OBJEKTIF','3.2.2   Menentukan dan menjustifikasikan keesahan suatu hujah deduktif dan seterusnya menentukan sama ada hujah yang sah itu munasabah'),
(49,'1','OBJEKTIF','3.2.3   Membentuk hujah deduktif yang sah bagi suatu situasi'),
(50,'1','OBJEKTIF','3.2.4   Menentukan dan menjustifikasikan kekuatan suatu hujah induktif dan seterusnya menentukan sama ada hujah yang kuat itu meyakinkan'),
(51,'1','OBJEKTIF','3.2.5   Membentuk hujah induktif yang kuat bagi suatu situasi'),
(52,'1','OBJEKTIF','3.2.6   Menyelesaikan masalah yang melibatkan penaakulan logik'),
(53,'1','OBJEKTIF','4.1.1   Menentukan dan menghuraikan persilangan set menggunakan pelbagai perwakilan'),
(54,'1','OBJEKTIF','4.1.2   Menentukan pelengkap bagi persilangan set'),
(55,'1','OBJEKTIF','4.1.3   Menyelesaikan masalah yang melibatkan persilangan set'),
(56,'1','OBJEKTIF','4.2.1   Menentukan dan menghuraikan kesatuan set menggunakan pelbagai perwakilan'),
(57,'1','OBJEKTIF','4.2.2   Menentukan pelengkap bagi kesatuan set'),
(58,'1','OBJEKTIF','4.2.3   Menyelesaikan masalah yang melibatkan kesatuan set'),
(59,'1','OBJEKTIF','4.3.1   Menentu dan menghuraikan gabungan operasi set menggunakan pelbagai perwakilan'),
(60,'1','OBJEKTIF','4.3.2   Menentukan pelengkap bagi gabungan operasi set'),
(61,'1','OBJEKTIF','4.3.3   Menyelesaikan masalah yang melibatkan gabungan operasi set'),
(62,'1','OBJEKTIF','5.1.1   Mengenal dan menerangkan rangkaian sebagai graf'),
(63,'1','OBJEKTIF','5.1.2   Membanding beza ( i )   Graf teraraf dengan graf tak terarah   ( ii )   Graf berpemberat dengan graf tak pemberat'),
(64,'1','OBJEKTIF','5.1.3   Mengenal dan melukis sub graf dan pokok'),
(65,'1','OBJEKTIF','5.1.4   Mewakilkan maklumat dalam bentuk rangkaian'),
(66,'1','OBJEKTIF','5.1.5   Menyelesaikan masalah yang melibatkan rangkaian'),
(67,'1','OBJEKTIF','6.1.2   Mewakilkan situasi dalam bentuk ketaksamaan linear'),
(68,'1','OBJEKTIF','6.1.2   Membuat dan menentusahkan konjektur tentang titik dalam rantau dan penyelesaian bagi suatu ketaksamaan linear'),
(69,'1','OBJEKTIF','6.1.3   Menentukan dan melorek rantau yang memuaskan satu ketaksamaan linear'),
(70,'1','OBJEKTIF','6.2.1   Mewakilkan situasi dalam bentuk sistem ketaksamaan linear'),
(71,'1','OBJEKTIF','6.2.2   membuat dan menentusahkan konjektor tentang titik dalam rantau dan penyelesaian bagi suatu sistem ketaksamaan linear'),
(72,'1','OBJEKTIF','6.2.3   Menentukn dan melorek rantau yang memuaskan satu sistem ketaksamaan linear'),
(73,'1','OBJEKTIF','6.2.4   Menyelesaaikan masalah yang melibatkan sistem ketaksamaan linear dalam dua pemboleh ubah.'),
(74,'1','OBJEKTIF','7.1.1   Melukis grf jarak masa'),
(75,'1','OBJEKTIF','7.1.2   Mentafsir graf jarak masa dan menghuraikan gerakan berdasarkan graf tersebut.'),
(76,'1','OBJEKTIF','7.1.3   Menyelesaikan masalah yang melibatkan graf jarak - masa'),
(77,'1','OBJEKTIF','7.2.1   Melukis graf laju - masa'),
(78,'1','OBJEKTIF','7.2.2   Membuat perkaitan antara luas di bawah graf laju - masa dengan jarak yang dilalui dan seterusnya menentukan jarak'),
(79,'1','OBJEKTIF','7.2.3   Mentafsir graf laju - masa dan menghuraikan gerakan berdasarkan graf tersebut'),
(80,'1','OBJEKTIF','7.2.4   Menyelesaikan masalah yang melibatkan graf jarak - masa'),
(81,'1','OBJEKTIF','8.1.1   Menerangkan maksud serakan'),
(82,'1','OBJEKTIF','8.1.2   Membanding dan mentafsir serakan dua atau lebih set data berdasarkan plot batang - dan - daun dan plot titik dan seterunya membuat kesimpulan '),
(83,'1','OBJEKTIF','8.2.1   Menentukan julat, julat antara kuartil, varians dan sisihan piawai sebagai sukatan untuk menghuraikan serakan bagi data tak terkumpul'),
(84,'1','OBJEKTIF','8.2.2   Menerangkan kelebihan dan kekurangan pelbagai suakatan serakan untuk menghuraikan data tak terkumpul'),
(85,'1','OBJEKTIF','8.2.3   Membina danmentafsir plot kotak bagi suatu set data tak terkumpul'),
(86,'1','OBJEKTIF','8.2.4   Menentukan kesan perubahan data terhadap serakan berdasarkan : ( i )   Nilai sukatan serakan  ( ii )  Perwakilan grafik'),
(87,'1','OBJEKTIF','8.2.5   Membanding dan mentafsir dua atau lebih set data tak terkumpul , berdasarkan sukatan serakan yang sesuai dan seterusnya membuat kesimpulan.'),
(88,'1','OBJEKTIF','8.2.6   Menyelesaikan masalah yang melibatkan sukatan serakan'),
(89,'1','OBJEKTIF','9.1.1   Memerhati peristiwa bergabung dan menyenaraikan peristiwa bergabung yang mungkin'),
(90,'1','OBJEKTIF','9.2.1   Membezakan peristiwa bersandar dan peristiwa tak bersandar'),
(91,'1','OBJEKTIF','9.2.2   Membuat dan menentusahkan konjektur tentang rumus kebarangkalian peristiwa bergabung'),
(92,'1','OBJEKTIF','9.2.3   Menentukan kebarangkalian peristiwa bergabung bagi peristiwa bersandar dan peristiwa tak bersandar'),
(93,'1','OBJEKTIF','9.3.1   Membezakan peristiwa saling eksklusif dan peristiwa tidak saling eksklusif'),
(94,'1','OBJEKTIF','9.3.2   Mengesahkan rumus kebarangkalian peristiwa bergabung bagi peristiwa saling eksklusif dan peristiwa tidak saling eksklusif'),
(95,'1','OBJEKTIF','9.3.3   Menentukan kebarangkalian peristiwa bergabung bagi peristiwa saling eksklusif dan peristiwa tidak saling eksklusif'),
(96,'1','OBJEKTIF','9.4.1   Menyelesaikan masalah yang melibatkan kebarangkalian peristiwa bergabung'),
(97,'1','OBJEKTIF','10.1.1  Menghuraikan proses pengurusan kewangan yang berkesan'),
(98,'1','OBJEKTIF','10.1.2  Membina dan membentang pelan kewangan peribadi untuk mencapai matlamat kewangan jangka pendek dan jangka panjang dan seterusnya menilai kebolehlaksanaan pelan kewangan tersebut.');

/*Table structure for table `year_id` */

DROP TABLE IF EXISTS `year_id`;

CREATE TABLE `year_id` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `effdate` date DEFAULT NULL,
  `desc` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `effdate` (`effdate`),
  UNIQUE KEY `desc` (`desc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `year_id` */

insert  into `year_id`(`idno`,`effdate`,`desc`) values 
(6,'2023-03-01','mar 2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
