CREATE DATABASE  IF NOT EXISTS `binaries` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `binaries`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: binaries
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.10.1

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
-- Table structure for table `protection-domains`
--

DROP TABLE IF EXISTS `protection-domains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `protection-domains` (
  `domains-id` int(22) NOT NULL AUTO_INCREMENT,
  `domain` varchar(200) DEFAULT '',
  `bin-id` int(29) DEFAULT '0',
  `site-id` mediumint(29) DEFAULT '0',
  `hits` int(6) DEFAULT '0',
  `maximum` int(6) DEFAULT '8',
  `expires` int(12) DEFAULT '0',
  `client-name` varchar(200) DEFAULT '',
  `notify` enum('no','all','client','referee') DEFAULT 'no',
  `notified` int(12) DEFAULT '0',
  `callback-referee` enum('yes','no') DEFAULT 'no',
  `callback-notify-id` mediumint(22) DEFAULT '0',
  `callback-polled-id` mediumint(22) DEFAULT '0',
  `callback-maximum-id` mediumint(22) DEFAULT '0',
  `callback-expired-id` mediumint(22) DEFAULT '0',
  `callback-notify-when` int(12) DEFAULT '0',
  `callback-polled-when` int(12) DEFAULT '0',
  `callback-maximum-when` int(12) DEFAULT '0',
  `callback-expired-when` int(12) DEFAULT '0',
  PRIMARY KEY (`domains-id`),
  KEY `INDEXING` (`domain`(22),`bin-id`,`hits`,`maximum`,`expires`),
  KEY `BACKEND` (`domain`(22),`bin-id`,`notify`,`callback-referee`,`callback-notify-when`,`callback-polled-when`,`callback-maximum-when`,`callback-expired-when`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protection-domains`
--

LOCK TABLES `protection-domains` WRITE;
/*!40000 ALTER TABLE `protection-domains` DISABLE KEYS */;
/*!40000 ALTER TABLE `protection-domains` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-28  5:52:20
