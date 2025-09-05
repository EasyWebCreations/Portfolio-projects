-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: us-cdbr-east-04.cleardb.com    Database: heroku_47c60d4bda8cc71
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
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `msg_id` int(25) NOT NULL AUTO_INCREMENT,
  `dateandtime` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `isActive` varchar(255) NOT NULL,
  `isSent` varchar(255) NOT NULL,
  `isRead` varchar(255) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (5,'2021-09-19 11:18:56','hello','52412','12862','','',''),(15,'2021-09-19 11:34:23','hii','12862','52412','','',''),(25,'2021-09-19 15:44:12','hello, how are you?','12862','52412','','',''),(35,'2021-09-20 01:50:37','I am fine â˜ºï¸','52412','12862','','','');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dislikes`
--

DROP TABLE IF EXISTS `dislikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dislikes` (
  `disliked_by` varchar(5) DEFAULT NULL,
  `disliked_to` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dislikes`
--

LOCK TABLES `dislikes` WRITE;
/*!40000 ALTER TABLE `dislikes` DISABLE KEYS */;
INSERT INTO `dislikes` VALUES ('52412','12862'),('12560','93704'),('93704','52412'),('52412','45071'),('12862','12560'),('93704','12560');
/*!40000 ALTER TABLE `dislikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_one` (`user_one`),
  UNIQUE KEY `user_two` (`user_two`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (5,12862,52412);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `liked_by` varchar(5) DEFAULT NULL,
  `liked_to` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES ('52412','93704'),('12560','12862'),('12862','12862'),('52412','52412'),('12862','52412');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `per_details`
--

DROP TABLE IF EXISTS `per_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `per_details` (
  `id` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `martial_status` varchar(255) NOT NULL,
  `callno` varchar(255) NOT NULL,
  `isActive` varchar(15) DEFAULT NULL,
  `age` int(10) NOT NULL,
  `height` int(10) NOT NULL,
  `language` varchar(30) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `blood` varchar(5) NOT NULL,
  `gotra1` varchar(30) NOT NULL,
  `gotra2` varchar(30) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `income` int(50) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_city` varchar(30) NOT NULL,
  `c_district` varchar(50) NOT NULL,
  `c_state` varchar(50) NOT NULL,
  `c_pincode` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `per_details`
--

LOCK TABLES `per_details` WRITE;
/*!40000 ALTER TABLE `per_details` DISABLE KEYS */;
INSERT INTO `per_details` VALUES ('12560','password','1234567892','two@gmail.com','Test','Case','Two','female','unmarried','2385000002','online',27,200,'marathi','24/05/1994','A+','airan','dharan','ssc','','buissiness',40,'','0','Latur','Latur','Maharashtra',0),('12862','password','9876543210','test@gmail.com','test','test','test','male','unmarried','2587964123','online',32,152,'marathi','12/12/1989','AB-','bansal','goyal','degree','','job',10,'','0','Mumbai','Mumbai','Maharashtra',0),('45071','45071','8446214899','vedantchintawar9@gmail.com','xyz','wcd','abc','male','unmarried','9420685738',NULL,29,212,'marathi','','O-','bansal','dharan','ug','','job',25,'','','Pune','Pune','Maharashtra',0),('52412','password','1234567891','one@gmail.com','Test','Case','One','female','unmarried','2385000001','online',25,156,'marathi','04/09/1996','O+','dharan','garg','degree','','buissiness',30,'','0','Pune','Pune','Maharashtra',0),('93704','password','9767428006','harsh.p.dod1234@gmail.com','Harsh','Pramod','Dod','male','unmarried','9767428006','online',28,168,'marathi','31/07/1993','B+','goyal','garg','phd','','job',25,'','0','Delhi','Delhi','Maharashtra',0);
/*!40000 ALTER TABLE `per_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report` (
  `reported_by` varchar(5) DEFAULT NULL,
  `reported_to` varchar(5) DEFAULT NULL,
  `report_reason` varchar(255) DEFAULT NULL,
  `report_decision` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender` (`sender`),
  KEY `receiver` (`receiver`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (25,12862,12560);
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-23 13:13:12
