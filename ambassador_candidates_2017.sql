# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 161.246.38.103 (MySQL 5.7.19)
# Database: ambassador-staging
# Generation Time: 2017-08-27 11:53:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table candidates
# ------------------------------------------------------------

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;

INSERT INTO `candidates` (`id`, `title`, `name`, `surname`, `nickname`, `score`, `created_at`, `updated_at`)
VALUES
	(1,'นาย','ศตวรรษ','ธิติศุภกุล','แน็ก',0,'2017-08-27 04:54:44','2017-08-27 04:54:44'),
	(2,'นาย','เสฎฐวุฒิ','ไม้สนธิ์','เบนนิ่ง',0,'2017-08-27 06:12:13','2017-08-27 06:12:16'),
	(3,'นาย','นิติ','จิรการวุฒิไกร','โม',0,'2017-08-27 06:12:53','2017-08-27 06:12:53'),
	(4,'นาย','ฐิติพัฒน์','อริยรัตนา','เปรม',0,'2017-08-27 06:14:00','2017-08-27 06:14:00'),
	(5,'นาย','รวิชญ์','โลหะขจรพันธ์','กันต์',0,'2017-08-27 06:15:04','2017-08-27 06:15:04'),
	(6,'นางสาว','ยลฎา','ประเสริฐ','ใยไหม',0,'2017-08-27 06:16:00','2017-08-27 06:16:00'),
	(7,'นางสาว','ประวิตรานันท์','บุตรโพธิ์','น้ำ',0,'2017-08-27 06:16:38','2017-08-27 06:16:38'),
	(8,'นาวสาว','พิมพ์ลภัส','อยู่ทอง','พิม',0,'2017-08-27 06:17:14','2017-08-27 06:17:14'),
	(9,'นางสาว','ศรัณญา','พรหมวิรัช','นุ่น',0,'2017-08-27 06:17:54','2017-08-27 06:17:54'),
	(10,'นางสาว','ธิรดา','ธีร์ธรรม','ปริ๊น',0,'2017-08-27 06:18:41','2017-08-27 06:18:41');

/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
