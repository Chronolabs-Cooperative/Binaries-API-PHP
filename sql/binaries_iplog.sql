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
-- Table structure for table `iplog`
--

DROP TABLE IF EXISTS `iplog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iplog` (
  `ip-id` mediumint(33) NOT NULL AUTO_INCREMENT,
  `state` enum('log','sessioned','passworded','referee') DEFAULT 'log',
  `site-id` mediumint(29) DEFAULT '0',
  `ipaddy` varchar(250) DEFAULT '',
  `netbios` varchar(300) DEFAULT '',
  `bin-id` int(29) DEFAULT '0',
  `user-id` int(19) DEFAULT '0',
  `referee-id` mediumint(42) DEFAULT '0',
  `hits` int(8) DEFAULT '0',
  `maximum` tinyint(4) DEFAULT '0',
  `places-key` varchar(32) DEFAULT '',
  `country-id` mediumint(11) DEFAULT '0',
  `region-id` mediumint(11) DEFAULT '0',
  `city-id` mediumint(11) DEFAULT '0',
  `longitude` float(12,7) DEFAULT '0.0000000',
  `latitude` float(12,7) DEFAULT '0.0000000',
  `zone-polarity` enum('+','-') DEFAULT '+',
  `zone-hours` tinyint(2) DEFAULT '0',
  `zone-minutes` tinyint(2) DEFAULT '0',
  `passhash-md5` varchar(32) DEFAULT '',
  PRIMARY KEY (`ip-id`),
  KEY `SEARCHING` (`state`,`site-id`,`ipaddy`(18),`netbios`(24),`bin-id`),
  KEY `PASSWORDING` (`state`,`bin-id`,`passhash-md5`),
  KEY `LOCATIONS` (`places-key`(10),`country-id`,`region-id`,`city-id`,`bin-id`,`state`,`site-id`,`ipaddy`(19))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iplog`
--

LOCK TABLES `iplog` WRITE;
/*!40000 ALTER TABLE `iplog` DISABLE KEYS */;
/*!40000 ALTER TABLE `iplog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-28  5:52:21
