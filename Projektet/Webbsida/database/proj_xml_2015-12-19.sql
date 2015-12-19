# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Värd: localhost (MySQL 5.6.24)
# Databas: proj_xml
# Genereringstid: 2015-12-19 18:13:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Tabelldump AttendingStudents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `AttendingStudents`;

CREATE TABLE `AttendingStudents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Tabelldump Blog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Blog`;

CREATE TABLE `Blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Tabelldump Courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Courses`;

CREATE TABLE `Courses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Tabelldump SubmittedTasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SubmittedTasks`;

CREATE TABLE `SubmittedTasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Tabelldump Teachers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Teachers`;

CREATE TABLE `Teachers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Tabelldump Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL DEFAULT '',
  `firstname` varchar(25) NOT NULL DEFAULT '',
  `lastname` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `pic_name` varchar(50) DEFAULT NULL,
  `about` varchar(300) DEFAULT NULL,
  `student` tinyint(1) DEFAULT NULL,
  `teacher` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`user_id`, `username`, `firstname`, `lastname`, `password`, `pic_name`, `about`, `student`, `teacher`)
VALUES
	(34561,'chrabd','Christian','Abdel','123456',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
