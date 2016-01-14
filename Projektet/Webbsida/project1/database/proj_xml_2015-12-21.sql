# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Värd: localhost (MySQL 5.6.24)
# Databas: proj_xml
# Genereringstid: 2015-12-21 19:47:27 +0000
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
  `blogpost_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(70) NOT NULL DEFAULT 'public/blog/o-WORK-FRIENDS-facebook.jpg',
  `title` varchar(50) NOT NULL DEFAULT '',
  `intro` varchar(200) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `datetime` datetime NOT NULL,
  `overlay_color` varchar(40) DEFAULT '',
  PRIMARY KEY (`blogpost_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Blog` WRITE;
/*!40000 ALTER TABLE `Blog` DISABLE KEYS */;

INSERT INTO `Blog` (`blogpost_id`, `image_path`, `title`, `intro`, `body`, `datetime`, `overlay_color`)
VALUES
	(3456,'public/blog/o-WORK-FRIENDS-facebook.jpg','Hello Word!','Ärtan pärtan piff paff puff nu kommer en superknuff!','Lorem ipsum dolor sit amet, no quo pericula argumentum, suscipit prodesset vix ex, quodsi scripta maiorum pro eu. Has disputando interpretaris an, vitae similique his ea. Molestie maiestatis qui ne. Sed at antiopam vituperata, id sed nullam latine, pri ridens mollis sadipscing ex.\n<br><br>\nLabore admodum quo ea. Prima rationibus sit at, eam iudico veniam eloquentiam cu. Putent cetero electram et eam, mea cu integre aliquando vulputate. Te ius alia soluta patrioque, ad debet paulo vituperata per, nostrud utroque voluptua mei ne.\n<br><br>\nMel nullam bonorum ad, quo utamur patrioque scribentur an. Vel et facer apeirian interesset, id vis porro vulputate, est nemore persius inciderint ei. Eu graeci dictas vis. In nostro praesent sea, ei quas disputando suscipiantur sea, mei choro dolor dissentiet ad.\n<br><br>\nAd dicta iracundia eloquentiam eam, qui case urbanitas deterruisset ut. Quis everti quo te, te has dicta dissentiunt. Ex numquam tractatos sed. Ut ridens epicurei mea, vis elitr possit causae eu, ut eum timeam fuisset corpora. Alia noster eruditi vis et. Nec suscipit accusamus an. Amet eruditi partiendo ne usu, tamquam diceret ne has.\n<br><br>\nMentitum oportere interesset no sed. Vel ea vide commodo ponderum, vix falli ridens oporteat ut, eu mea dicit saepe utroque. Ei vim civibus salutatus percipitur. Commune percipitur has id, nostrum detraxit percipitur has an. Pri primis scaevola intellegam id, nihil imperdiet in est.','2015-12-22 20:33:22','255, 0, 0, 0.3'),
	(12356,'public/blog/o-WORK-FRIENDS-facebook.jpg','Hello Word!','Ärtan pärtan piff paff puff nu kommer en superknuff!','Lorem ipsum dolor sit amet, no quo pericula argumentum, suscipit prodesset vix ex, quodsi scripta maiorum pro eu. Has disputando interpretaris an, vitae similique his ea. Molestie maiestatis qui ne. Sed at antiopam vituperata, id sed nullam latine, pri ridens mollis sadipscing ex.\n<br><br>\nLabore admodum quo ea. Prima rationibus sit at, eam iudico veniam eloquentiam cu. Putent cetero electram et eam, mea cu integre aliquando vulputate. Te ius alia soluta patrioque, ad debet paulo vituperata per, nostrud utroque voluptua mei ne.\n<br><br>\nMel nullam bonorum ad, quo utamur patrioque scribentur an. Vel et facer apeirian interesset, id vis porro vulputate, est nemore persius inciderint ei. Eu graeci dictas vis. In nostro praesent sea, ei quas disputando suscipiantur sea, mei choro dolor dissentiet ad.\n<br><br>\nAd dicta iracundia eloquentiam eam, qui case urbanitas deterruisset ut. Quis everti quo te, te has dicta dissentiunt. Ex numquam tractatos sed. Ut ridens epicurei mea, vis elitr possit causae eu, ut eum timeam fuisset corpora. Alia noster eruditi vis et. Nec suscipit accusamus an. Amet eruditi partiendo ne usu, tamquam diceret ne has.\n<br><br>\nMentitum oportere interesset no sed. Vel ea vide commodo ponderum, vix falli ridens oporteat ut, eu mea dicit saepe utroque. Ei vim civibus salutatus percipitur. Commune percipitur has id, nostrum detraxit percipitur has an. Pri primis scaevola intellegam id, nihil imperdiet in est.','2015-12-22 20:33:22','0, 255, 0, 0.3'),
	(1233456,'public/blog/o-WORK-FRIENDS-facebook.jpg','Hello Word!','Ärtan pärtan piff paff puff nu kommer en superknuff!','Lorem ipsum dolor sit amet, no quo pericula argumentum, suscipit prodesset vix ex, quodsi scripta maiorum pro eu. Has disputando interpretaris an, vitae similique his ea. Molestie maiestatis qui ne. Sed at antiopam vituperata, id sed nullam latine, pri ridens mollis sadipscing ex.\n<br><br>\nLabore admodum quo ea. Prima rationibus sit at, eam iudico veniam eloquentiam cu. Putent cetero electram et eam, mea cu integre aliquando vulputate. Te ius alia soluta patrioque, ad debet paulo vituperata per, nostrud utroque voluptua mei ne.\n<br><br>\nMel nullam bonorum ad, quo utamur patrioque scribentur an. Vel et facer apeirian interesset, id vis porro vulputate, est nemore persius inciderint ei. Eu graeci dictas vis. In nostro praesent sea, ei quas disputando suscipiantur sea, mei choro dolor dissentiet ad.\n<br><br>\nAd dicta iracundia eloquentiam eam, qui case urbanitas deterruisset ut. Quis everti quo te, te has dicta dissentiunt. Ex numquam tractatos sed. Ut ridens epicurei mea, vis elitr possit causae eu, ut eum timeam fuisset corpora. Alia noster eruditi vis et. Nec suscipit accusamus an. Amet eruditi partiendo ne usu, tamquam diceret ne has.\n<br><br>\nMentitum oportere interesset no sed. Vel ea vide commodo ponderum, vix falli ridens oporteat ut, eu mea dicit saepe utroque. Ei vim civibus salutatus percipitur. Commune percipitur has id, nostrum detraxit percipitur has an. Pri primis scaevola intellegam id, nihil imperdiet in est.','2015-12-22 20:33:22','0, 0, 255, 0.3'),
	(4101849,'public/blog/banner-företagssida.png','sdfsdfsdfsd','sdfsdfsd','sdfsdfsdf','2015-12-21 08:17:09',''),
	(5105586,'public/blog/banner-företagssida.png','sdfsdfsdfsd','sdfsdfsd','sdfsdfsdf','2015-12-21 08:22:24',''),
	(7443855,'public/blog/Skärmavbild 2015-11-10 kl. 22.11.26.png','sdsdfsf','sdfsdfsdf','sdfdsfsdf','2015-12-21 08:44:00',''),
	(7532405,'public/blog/banner-företagssida.png','dfsdfsdfsdf','sdfsdfsdfsdf','sfsdfsdfsdf','2015-12-21 08:15:21',''),
	(18113600,'public/blog/Skärmavbildhjhdfbjsdhf.png','aosijflalkdnöaf','kajsfbsdjkfnsjsdjkf','sdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHG','2015-12-21 08:33:18',''),
	(54655148,'public/blog/Skärmavbilddf.png','aosijflalkdnöaf','kajsfbsdjkfnsjsdjkf','sdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHGsdkjfbjbFJHL<FBHJDJLHSFBDJHLBDHJLGADJLGBDFHJBGJHDFBGJHDBFJHGBDFJHBGHJDFBGDJFBGJHBDFHJBGDFJGJHBDFJHGBDFJHG','2015-12-21 08:33:49',''),
	(60803898,'public/blog/banner-företagssida.png','sdfsdfsdfsd','sdfsdfsd','sdfsdfsdf','2015-12-21 08:16:44',''),
	(96035028,'public/blog/o-WORK-FRIENDS-facebook.jpg','My name is Chris','Oppenheimer was a bad man!','Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.\r\n\r\nEfficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.\r\n\r\nCompletely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.\r\n\r\nObjectively innovate empowered manufactured products whereas parallel platforms. Holisticly predominate extensible testing procedures for reliable supply chains. Dramatically engage top-line web services vis-a-vis cutting-edge deliverables.\r\n\r\nProactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing. Holistically pontificate installed base portals after maintainable products.\r\n\r\nPhosfluorescently engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric ”outside the box” thinking. Completely pursue scalable customer service through sustainable potentialities.\r\n\r\nCollaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable internal or ”organic” sources.\r\n\r\nCredibly innovate granular internal or ”organic” sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences. Dramatically synthesize integrated schemas with optimal networks.','2015-12-21 07:47:08','');

/*!40000 ALTER TABLE `Blog` ENABLE KEYS */;
UNLOCK TABLES;


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
  `pic_name` varchar(50) NOT NULL DEFAULT 'public/profile_pic/example.jpg',
  `about` varchar(300) DEFAULT '',
  `user_type` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`user_id`, `username`, `firstname`, `lastname`, `password`, `pic_name`, `about`, `user_type`)
VALUES
	(2345,'admin','admin','admin','admin','public/profile_pic/example.jpg','',0),
	(34561,'chrabd','Christian','Abdel','123456','public/profile_pic/example.jpg',NULL,1);

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
