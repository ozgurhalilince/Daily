CREATE DATABASE  IF NOT EXISTS `daily` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `daily`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: daily
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `updated_at` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `photo` blob,
  PRIMARY KEY (`memberID`),
  UNIQUE KEY `memberID_UNIQUE` (`memberID`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (8,'p@p','$2y$10$T9U.lcKHbXBF8pfZljziCeaBgW0CE/4NozbAFbdBSvebUzSEoEfIu','Barney','Stinson','2015-02-11 13:16:14','2015-04-28 12:25:31','/daily/public/uploads/barney-stinson.jpg'),(9,'y@y','$2y$10$LU4aAXyTwhdl412eUidwYOVHDKS7fsp7/IJsXaAFkJL/wxpQjvBhO','Yılmaz','Erdoğan','2015-02-11 13:18:59','2015-04-27 19:09:11','/daily/public/uploads/yılmaz.jpg'),(12,'m@m','$2y$10$g9MmIdYHh4/UHj3bxGI43OEdRDt/.sh7f3LIHamWtm5mTqQJ06v7S','Mahmut','Tuncer','2015-02-15 13:49:05','2015-04-27 18:57:49','/daily/public/uploads/tumblr_mwoh6o91A61ra0onfo1_500.jpg'),(24,'h@h','$2y$10$wi2.hZ.0MSfFPHX4iHV4hO5N1nBQBkITousRFLAhcwfUHq5bwoWzG','Hadise','Helvacı','2015-04-27 18:37:44','2015-04-28 12:06:59','/daily/public/uploads/hadise_08.jpg'),(25,'b@b','$2y$10$dnQUKJ9VZ3AS944GsUwlduhfum/vSg89UCwkaW919haaPX0520dUG','Beyazıt','Öztürk','2015-04-27 19:27:39','2015-04-27 19:30:59','/daily/public/uploads/Beyazıt-Öztürk.jpg'),(26,'c@c','$2y$10$S9ETkBE/15RubKRPOKf3i.0L1E1o4A16h3riDx6gfBOphwZoHGKR.','Cem','Yılmaz','2015-04-27 19:31:54','2015-04-27 19:32:58','/daily/public/uploads/cem.jpg');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-29 12:39:45
