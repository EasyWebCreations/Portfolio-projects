-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: us-cdbr-east-04.cleardb.com    Database: heroku_16d720eebdfffe6
-- ------------------------------------------------------
-- Server version	5.6.50-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `biodata` varchar(255) DEFAULT NULL,
  `anubandhaId` varchar(100) NOT NULL,
  `firstGotram` varchar(255) NOT NULL,
  `secondGotram` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactnumber` varchar(12) NOT NULL,
  `whatsappnumber` varchar(12) NOT NULL,
  `education` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `permentantAddress` varchar(255) NOT NULL,
  `partnerEdu` varchar(255) NOT NULL,
  `partnerExpect` varchar(255) NOT NULL,
  `NoParent` int(2) NOT NULL,
  `candidateNVD` int(1) DEFAULT NULL,
  `candidateVacCer` varchar(255) DEFAULT NULL,
  `fParentName` varchar(50) DEFAULT NULL,
  `fParentNVD` int(1) DEFAULT NULL,
  `fParentVacCer` varchar(255) DEFAULT NULL,
  `sParentName` varchar(50) DEFAULT NULL,
  `sParentNVD` int(1) DEFAULT NULL,
  `sParentVacCer` varchar(255) DEFAULT NULL,
  `candidateAmount` varchar(5) DEFAULT NULL,
  `parentAmount` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70419 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (20488,'a','a','a','https://testing-aws-php.s3.ap-south-1.amazonaws.com/can_biodata/80d2b2c52a0a4f79403a2d8b9ae9a901.png','a','','','2021-11-17','B+','Male','a','a','a','a','a','a','a','a','a',2,1,'https://testing-aws-php.s3.ap-south-1.amazonaws.com/can_vac/57c23182fcedc00087235f16df749655.png','a',2,'https://testing-aws-php.s3.ap-south-1.amazonaws.com/fp_vac/574db7fb9aafb28fcaced4e75111f211.png','a',1,'https://testing-aws-php.s3.ap-south-1.amazonaws.com/sp_vac/cc770591d4866f6270fffafcd6744b78.png','4400','3600'),(70418,'b','b','b','https://testing-aws-php.s3.ap-south-1.amazonaws.com/can_biodata/86dba166cb519616b0d75caf7cc88b30.svg','b','','','2021-11-15','O+','Female','b','b','b','b','b','b','b','b','b',2,1,'https://testing-aws-php.s3.ap-south-1.amazonaws.com/can_vac/504796e5cf3856e4008602b700713440.png','b',1,'https://testing-aws-php.s3.ap-south-1.amazonaws.com/fp_vac/aab92769cd5e42e63772cf4002a0f3bd.pdf','b',2,'https://testing-aws-php.s3.ap-south-1.amazonaws.com/sp_vac/b6d5ba6cd3a9be009c680476832b6026.css','4400','3600');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-11 19:41:48
