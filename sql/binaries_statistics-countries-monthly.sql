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
-- Table structure for table `statistics-countries-monthly`
--

DROP TABLE IF EXISTS `statistics-countries-monthly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistics-countries-monthly` (
  `countries-monthly-id` mediumint(42) NOT NULL AUTO_INCREMENT,
  `state-id` int(29) DEFAULT '0',
  `country-id` mediumint(11) DEFAULT '0',
  `start` int(12) DEFAULT '0',
  `finish` int(12) DEFAULT '0',
  `quarter` int(2) DEFAULT '0',
  `year` int(4) DEFAULT '2015',
  `month` int(2) DEFAULT '1',
  `last-ip` mediumint(42) DEFAULT '0',
  `hits` int(10) DEFAULT '0',
  `state` enum('binary','user','referee','site','node') DEFAULT 'binary',
  `type` enum('resource','redirect','email-send','email-get','password-check','protected-pass','protected-blocked','unknown') DEFAULT 'unknown',
  PRIMARY KEY (`countries-monthly-id`),
  KEY `STATISTICS` (`state-id`,`country-id`,`year`,`month`,`quarter`,`last-ip`,`hits`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistics-countries-monthly`
--

LOCK TABLES `statistics-countries-monthly` WRITE;
/*!40000 ALTER TABLE `statistics-countries-monthly` DISABLE KEYS */;
/*!40000 ALTER TABLE `statistics-countries-monthly` ENABLE KEYS */;
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
