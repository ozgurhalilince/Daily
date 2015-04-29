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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_turkish_ci,
  `title` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `visibility` int(11) DEFAULT NULL,
  `date` double DEFAULT NULL,
  `created_at` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `updated_at` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`postID`),
  UNIQUE KEY `postID_UNIQUE` (`postID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (32,8,'Hi guys','Barney 1',0,27.04,'2015-04-27 15:43:15','2015-04-27 15:43:15'),(33,8,'Legen','Barney 2',1,27.04,'2015-04-27 15:48:22','2015-04-27 15:53:32'),(34,8,'Wait for it','Barney 3',2,27.04,'2015-04-27 15:53:48','2015-04-27 15:53:48'),(35,8,'dary','Barney 4',1,27.04,'2015-04-27 15:54:01','2015-04-27 15:54:24'),(36,9,'yyyyy','Yılmaz 1',2,27.04,'2015-04-27 19:08:00','2015-04-27 19:08:00'),(37,9,'yyyyyy','Yılmaz 2.post',2,27.04,'2015-04-27 19:08:12','2015-04-27 19:08:12'),(38,25,'selam ben beyaz','b1',1,27.04,'2015-04-27 19:31:15','2015-04-27 19:31:15'),(39,25,'selam ben öztürk','b2',2,27.04,'2015-04-27 19:31:31','2015-04-27 19:31:31'),(40,26,'cem yılmaz günlük 1','Cem1',1,27.04,'2015-04-27 19:32:32','2015-04-27 19:32:32'),(41,26,'Cem yılmaz günlük 2','Cem2',1,27.04,'2015-04-27 19:32:46','2015-04-27 19:32:46');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
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
