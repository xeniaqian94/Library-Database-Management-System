CREATE DATABASE  IF NOT EXISTS `library2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `library2`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: library2
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `bid` char(10) NOT NULL,
  `category` char(15) DEFAULT NULL,
  `bname` char(45) DEFAULT NULL,
  `publisher` char(45) DEFAULT NULL,
  `year` char(4) DEFAULT NULL,
  `author` char(45) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `lastreturn` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES ('00001','Computer','Database System Concepts 5th','Higher Education Press','2006','Abraham Siberschatz',72.00,11,6,'2014-06-12 01:12:34'),('00002','Computer','Software Engineering 6th','McGraw Hill','2010','Roger S. Pressman',79.00,10,11,'2014-06-12 01:12:34'),('00003','English','The Roald Dahl Omnibus','Barnes & Noblle Books','2003','Roald Dahl',20.32,2,4,'2014-06-12 01:12:34'),('00004','English','The White Road','Pigeon','2003','Kathleen Burke',91.51,3,2,'2014-06-12 01:12:34'),('00005','History','Humans of New York','St Martins Press','2014','Brandon Stanton',186.00,1,1,'2014-06-12 01:12:34'),('00006','Music','The Art of Frozen','Chronicle Books','2013','Charles Solomon, John Lasseter',159.06,7,4,'2014-06-12 01:12:34'),('00007','Education','Word Power Made Easy','Pocket Books;Rev Exp','1991','Norman Lewis',32.03,10,7,'2014-06-12 01:12:34'),('00008','Art','How to Read a Book','Touchstone','1972','Mortimer J. Adler',89.50,4,2,'2014-06-12 01:12:34'),('00009','Science','General Physics','Prentice Hall','1999','Halliday Wesly',112.99,13,2,'2014-06-12 01:12:34'),('00010','Biology','Introduction to Molecular Biology','MIT Press','2009','Thomas H.Cormen',312.55,7,3,'2014-06-12 01:12:34'),('00011','Mathematics','Linear Algebra Fundamentals','Princeton Review','1997','B.W.Whiteman',425.11,3,2,'2014-06-12 01:12:34'),('00012','Music','The History of Western Barroco','Boston College Press','2001','Julia Peterson',81.77,2,2,'2014-06-12 01:12:34'),('00013','Medicine','How to Keep Fit','John Hopkins University Press','2014','Howard Watreve',131.45,2,2,'2014-06-12 01:12:34'),('00014','Music','The History of Western Barroco','Boston College Press','2001','Julia Peterson',81.77,2,2,'2014-06-12 01:12:34'),('00015','Medicine','How to Keep Fit','John Hopkins University Press','2014','Howard Watreve',131.45,2,2,'2014-06-12 01:12:34'),('00035','Finance','Investment Strategy You Need to Know','McGraw Hill','1999','Mancala.H',194.23,3,5,'2014-06-12 01:12:34'),('00037','Computer','Algorithm Analysis in C','Tsinghua University','1999','Tan Haoqiang',28.35,5,7,'2014-06-12 01:12:34'),('00091','Finance','Principles of Economics','Prentice Hall','1997','Cascara.D',213.40,2,2,'2014-06-12 01:12:34');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-12  9:57:04
