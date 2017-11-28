-- MySQL dump 10.13  Distrib 5.7.20, for Win64 (x86_64)
--
-- Host: localhost    Database: quanly
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `_account`
--

-- DROP TABLE IF EXISTS `_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_account` (
  `_ID` int(11) NOT NULL AUTO_INCREMENT,
  `_USERNAME` varchar(25) NOT NULL,
  `_PASSWORD` varchar(100) NOT NULL,
  `_QUYEN` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`_ID`),
  UNIQUE KEY `_USERNAME` (`_USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_account`
--

LOCK TABLES `_account` WRITE;
/*!40000 ALTER TABLE `_account` DISABLE KEYS */;
INSERT INTO `_account` VALUES (1,'ADMIN','ADMIN',''),(2,'USER','USER','\0'),(3,'USER1','USER1','\0');
/*!40000 ALTER TABLE `_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_groups`
--

-- DROP TABLE IF EXISTS `_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_groups` (
  `_MANHOM` varchar(10) NOT NULL,
  `_TENNHOM` varchar(40) NOT NULL,
  `_SOLUONG` int(11) NOT NULL,
  PRIMARY KEY (`_MANHOM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_groups`
--

LOCK TABLES `_groups` WRITE;
/*!40000 ALTER TABLE `_groups` DISABLE KEYS */;
INSERT INTO `_groups` VALUES ('NHOM1','NHÓM 1',7),('NHOM7',N'NHÓM 7',7);
/*!40000 ALTER TABLE `_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_users`
--

-- DROP TABLE IF EXISTS `_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_users` (
  `_ID` int(11) NOT NULL,
  `_MANHOM` varchar(10) NOT NULL,
  `_HO` varchar(10) NOT NULL,
  `_TEN` varchar(30) NOT NULL,
  `_GIOITINH` bit(1) NOT NULL,
  `_NGAYSINH` date NOT NULL,
  `_EMAIL` varchar(40) NOT NULL,
  PRIMARY KEY (`_ID`),
  UNIQUE KEY `_EMAIL` (`_EMAIL`),
  KEY `FK_GROUPS_USERS_IDX` (`_MANHOM`),
  KEY `FK_ACCOUNT_USERS_IDX` (`_ID`),
  CONSTRAINT `FK_ACCOUNT_USERS` FOREIGN KEY (`_ID`) REFERENCES `_account` (`_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_GROUPS_USERS` FOREIGN KEY (`_MANHOM`) REFERENCES `_groups` (`_MANHOM`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_users`
--

LOCK TABLES `_users` WRITE;
/*!40000 ALTER TABLE `_users` DISABLE KEYS */;
INSERT INTO `_users` VALUES (1,'NHOM7',N'NGUYỄN',N'QUỐC ĐẠT','','1996-11-30','BOELOVENHAN@GMAIL.COM'),(2,'NHOM7',N'DƯƠNG',N'TRUNG KIÊN','','1996-12-12','ASUS12121996@GMAIL.COM'),(3,'NHOM7',N'LÊ',N'THỊ KHANG','\0','1996-02-20','LETHIKHANG20021996@GMAIL.COM');
/*!40000 ALTER TABLE `_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-03 23:00:38
