# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25)
# Database: my_codeigniter
# Generation Time: 2019-09-05 01:02:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `created_by`, `updated_at`, `updated_by`)
VALUES
	(7,'Haezal Bin Musa','haezal.musa@gmail.com','123456',NULL,NULL,NULL,NULL),
	(14,'adsfsfsf','asflsj@lakjsdfdo.com','asdf',NULL,NULL,NULL,NULL),
	(15,'adsfsfsf','asflsj@lakjsdfdo.com','asdf',NULL,NULL,NULL,NULL),
	(16,'adsfsfsf','asflsj@lakjsdfdo.com','asdf',NULL,NULL,NULL,NULL),
	(19,'adsfsfsf','asflsj@lakjsdfdo.com','asdf',NULL,NULL,NULL,NULL),
	(21,'adsfsfsf','asflsj@lakjsdfdo.com','asdf',NULL,NULL,NULL,NULL),
	(23,'adsfsfsf','asflsj@lakjsdfdo.com','asdf',NULL,NULL,NULL,NULL),
	(24,'adsfsfsf','asflsj@lakjsdfdo.com','asdf',NULL,NULL,NULL,NULL),
	(25,'adsfsfsf','asflsj@lakjsdfdo.com','asdf',NULL,NULL,NULL,NULL),
	(26,'adsfsfsf','asflsj@lakjsdfdo.com','asdf',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
