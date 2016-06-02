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
-- Table structure for table `binaries`
--

DROP TABLE IF EXISTS `binaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `binaries` (
  `bin-id` int(29) NOT NULL AUTO_INCREMENT,
  `parent-id` int(29) DEFAULT '0',
  `site-id` mediumint(29) DEFAULT '0',
  `user-id` int(18) DEFAULT '0',
  `mime-type-id` int(32) DEFAULT '0',
  `type` enum('RESOURCE','REDIRECT','RETRIEVE-RESOURCE','RETRIEVE-REDIRECT','EMAIL-RESOURCE','EMAIL-REDIRECT','EMAIL-RETRIEVE-REDIRECT') DEFAULT 'RESOURCE',
  `key` varchar(32) DEFAULT '',
  `uri` varchar(300) DEFAULT '',
  `path` varchar(300) DEFAULT '',
  `filename` varchar(198) DEFAULT '',
  `extension` varchar(25) DEFAULT '',
  `size` int(19) DEFAULT '0',
  `hits` int(16) DEFAULT '0',
  `when-created` int(12) DEFAULT '0',
  `when-replaced` int(12) DEFAULT '0',
  `when-last-hit` int(12) DEFAULT '0',
  `when-previous-hit` int(12) DEFAULT '0',
  `versioning-major` tinyint(3) DEFAULT '1',
  `versioning-minor` tinyint(3) DEFAULT '0',
  `versioning-revision` tinyint(3) DEFAULT '0',
  `versioning-sub-revision` tinyint(3) DEFAULT '0',
  `versioning-suffix` enum('pre-alpha','alpha','alpha 2','alpha 3','beta','beta 2','beta 3','testing','release candidate','final','final revision','final minor','final major','unknown') DEFAULT 'unknown',
  `file-author` varchar(128) DEFAULT '',
  `file-organisation` varchar(128) DEFAULT '',
  `file-support-email` varchar(198) DEFAULT '',
  `file-support-phone` varchar(30) DEFAULT '',
  `state` enum('active','replaced','closed') DEFAULT 'active',
  `protected` enum('yes','no') DEFAULT 'no',
  `protection` enum('sessioned','passworded','domained','referee','unknown') DEFAULT 'unknown',
  `callback` enum('yes','no') DEFAULT 'no',
  `callback-hit-id` mediumint(29) DEFAULT '0',
  `callback-replaced-id` mediumint(29) DEFAULT '0',
  `callback-moved-id` mediumint(29) DEFAULT '0',
  `callback-closed-id` mediumint(29) DEFAULT '0',
  `callback-protection-id` mediumint(29) DEFAULT '0',
  `callback-email-id` mediumint(29) DEFAULT '0',
  `callback-statistics-weekly-id` mediumint(29) DEFAULT '0',
  `callback-statistics-monthly-id` mediumint(29) DEFAULT '0',
  `callback-statistics-quarterly-id` mediumint(29) DEFAULT '0',
  `callback-statistics-yearly-id` mediumint(29) DEFAULT '0',
  `schedule-statistic-weekly` int(12) DEFAULT '0',
  `schedule-statistic-monthly` int(12) DEFAULT '0',
  `salt-md5` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`bin-id`),
  KEY `VERSIONING` (`type`,`versioning-major`,`versioning-minor`,`versioning-revision`,`versioning-sub-revision`,`versioning-suffix`,`filename`,`key`),
  KEY `STATISTICS` (`when-previous-hit`,`hits`,`when-last-hit`,`when-replaced`,`when-created`,`size`,`extension`,`key`,`type`,`user-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `binaries`
--

LOCK TABLES `binaries` WRITE;
/*!40000 ALTER TABLE `binaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `binaries` ENABLE KEYS */;
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
