-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: tourbooking
-- ------------------------------------------------------
-- Server version	8.0.15

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
-- Table structure for table `tblboat`
--

DROP TABLE IF EXISTS `tblboat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblboat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `capcity` int(11) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblboat`
--

LOCK TABLES `tblboat` WRITE;
/*!40000 ALTER TABLE `tblboat` DISABLE KEYS */;
INSERT INTO `tblboat` VALUES (1,'Boat1',_binary '',1,NULL,1,'2020-12-28 02:50:23',1,100.00),(2,'Boat 2',_binary '',1,NULL,NULL,NULL,2,10.00),(3,'Boat 3',_binary '',1,NULL,NULL,NULL,3,12.00),(4,'Boat 4',_binary '',1,NULL,NULL,NULL,4,1400.00),(5,'Boat',_binary '',1,NULL,NULL,NULL,5,1500.00);
/*!40000 ALTER TABLE `tblboat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblboatcaptainmapping`
--

DROP TABLE IF EXISTS `tblboatcaptainmapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblboatcaptainmapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `rfid` varchar(45) DEFAULT NULL,
  `portofassign` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `deviceid` varchar(50) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblboatcaptainmapping`
--

LOCK TABLES `tblboatcaptainmapping` WRITE;
/*!40000 ALTER TABLE `tblboatcaptainmapping` DISABLE KEYS */;
INSERT INTO `tblboatcaptainmapping` VALUES (6,'turshar','awsadas',2,2,'2020-12-25 02:40:30','12',NULL),(7,'Anant S','asda',2,5,'2020-12-27 17:33:32','13',NULL),(8,'Vijay','0011',2,6,'2020-12-28 09:51:55','13',NULL);
/*!40000 ALTER TABLE `tblboatcaptainmapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldiscount`
--

DROP TABLE IF EXISTS `tbldiscount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldiscount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `value` decimal(18,2) DEFAULT NULL,
  `discounttypeid` int(11) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  `vaildtill` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldiscount`
--

LOCK TABLES `tbldiscount` WRITE;
/*!40000 ALTER TABLE `tbldiscount` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbldiscount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldiscounttype`
--

DROP TABLE IF EXISTS `tbldiscounttype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldiscounttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `isactive` bit(1) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldiscounttype`
--

LOCK TABLES `tbldiscounttype` WRITE;
/*!40000 ALTER TABLE `tbldiscounttype` DISABLE KEYS */;
INSERT INTO `tbldiscounttype` VALUES (1,'infant',_binary '',1,'2020-12-17 18:56:41',NULL,NULL),(2,'senior',_binary '',1,'2020-12-17 18:56:59',NULL,NULL);
/*!40000 ALTER TABLE `tbldiscounttype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfees`
--

DROP TABLE IF EXISTS `tblfees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT '0.00',
  `isactive` bit(1) DEFAULT b'1',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `orderby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfees`
--

LOCK TABLES `tblfees` WRITE;
/*!40000 ALTER TABLE `tblfees` DISABLE KEYS */;
INSERT INTO `tblfees` VALUES (1,'Environment',100.00,_binary '',1,'2020-12-09 10:54:06',NULL,NULL,1),(2,'Boat',10.00,_binary '',1,'2020-12-09 10:54:18',NULL,NULL,4),(3,'User',110.00,_binary '',1,'2020-12-09 10:54:33',NULL,NULL,3),(4,'Bracelet',250.00,_binary '',1,'2020-12-26 14:07:30',NULL,NULL,2);
/*!40000 ALTER TABLE `tblfees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblport`
--

DROP TABLE IF EXISTS `tblport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedon` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblport`
--

LOCK TABLES `tblport` WRITE;
/*!40000 ALTER TABLE `tblport` DISABLE KEYS */;
INSERT INTO `tblport` VALUES (1,'Port 1',_binary '',1,'2020-12-20 16:30:34',NULL,NULL),(2,'Port 2',_binary '',1,'2020-12-20 16:31:53',NULL,NULL);
/*!40000 ALTER TABLE `tblport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblportdevicemapping`
--

DROP TABLE IF EXISTS `tblportdevicemapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblportdevicemapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deviceid` varchar(45) DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `modifiedfrom` char(1) DEFAULT 'd',
  `portid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblportdevicemapping`
--

LOCK TABLES `tblportdevicemapping` WRITE;
/*!40000 ALTER TABLE `tblportdevicemapping` DISABLE KEYS */;
INSERT INTO `tblportdevicemapping` VALUES (11,'471f8baa8d8a61b3',_binary '',NULL,NULL,'D',2),(12,'4c2686b2ff3b9a99',_binary '',NULL,NULL,'D',2),(13,'0150c86b9f231886',_binary '',NULL,'2020-12-28 09:46:23','D',2);
/*!40000 ALTER TABLE `tblportdevicemapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblregistration`
--

DROP TABLE IF EXISTS `tblregistration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblregistration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pax` int(11) DEFAULT '1',
  `fromdate` datetime DEFAULT NULL,
  `todate` datetime DEFAULT NULL,
  `numberofdays` int(11) DEFAULT NULL,
  `numberofvehicle` int(11) DEFAULT NULL,
  `totalcharge` decimal(18,2) DEFAULT NULL,
  `paymentid` varchar(100) DEFAULT NULL,
  `isactive` bit(1) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblregistration`
--

LOCK TABLES `tblregistration` WRITE;
/*!40000 ALTER TABLE `tblregistration` DISABLE KEYS */;
INSERT INTO `tblregistration` VALUES (2,2,'2020-12-24 00:00:00','2020-12-26 00:00:00',2,1,100.00,'001',_binary '','2020-12-24 00:42:39',NULL),(3,2,'2020-12-24 00:00:00','2020-12-26 00:00:00',2,1,100.00,'001',_binary '','2020-12-24 00:42:39',NULL);
/*!40000 ALTER TABLE `tblregistration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrole`
--

DROP TABLE IF EXISTS `tblrole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrole` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(100) NOT NULL,
  `createdby` int(100) DEFAULT NULL,
  `createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(100) DEFAULT NULL,
  `modifiedon` timestamp NULL DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrole`
--

LOCK TABLES `tblrole` WRITE;
/*!40000 ALTER TABLE `tblrole` DISABLE KEYS */;
INSERT INTO `tblrole` VALUES (1,'Admin',1,'2020-12-05 18:20:38',NULL,NULL,_binary ''),(2,'Boat Captain',1,'2020-12-06 01:40:12',NULL,NULL,_binary ''),(3,'Receptionist',1,'2020-12-06 01:43:00',NULL,NULL,_binary ''),(4,'Administrative',1,'2020-12-06 01:45:47',NULL,NULL,_binary '');
/*!40000 ALTER TABLE `tblrole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblslots`
--

DROP TABLE IF EXISTS `tblslots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblslots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `createby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblslots`
--

LOCK TABLES `tblslots` WRITE;
/*!40000 ALTER TABLE `tblslots` DISABLE KEYS */;
INSERT INTO `tblslots` VALUES (1,'Slot 1','00:00:00','01:00:00',1,'2020-12-11 05:10:05',NULL,NULL,_binary ''),(2,'Slot 2','01:00:00','02:00:00',1,'2020-12-11 05:13:28',NULL,NULL,_binary ''),(3,'Slot 3','13:00:00','14:00:00',1,'2020-12-11 05:13:50',1,'2020-12-11 05:44:06',_binary '\0');
/*!40000 ALTER TABLE `tblslots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltourist`
--

DROP TABLE IF EXISTS `tbltourist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltourist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registrationid` int(11) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL,
  `nationalityid` int(11) DEFAULT NULL,
  `mobilenumber` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `qrcode` varchar(50) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `rfid` varchar(100) DEFAULT NULL,
  `isassigned` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltourist`
--

LOCK TABLES `tbltourist` WRITE;
/*!40000 ALTER TABLE `tbltourist` DISABLE KEYS */;
INSERT INTO `tbltourist` VALUES (1,2,'Anant','shankar','shetty','tivoli','makati',1,1,'0996766231','anant@gamil.com','1990-10-25 00:00:00','sad','2020-12-24 00:46:17','a002',_binary ''),(2,2,'Akshay','shankar','shetty','a','b',2,2,'9999999','a@gmail.com','1988-10-25 00:00:00','asd','2020-12-24 00:47:03','212',_binary ''),(3,3,'vijay','shankar','shetty','tivoli','makati',1,1,'0996766231','anant@gamil.com','1990-10-25 00:00:00','sad','2020-12-24 00:46:17','v00w',_binary ''),(4,3,'VD','shankar','shetty','a','b',2,2,'9999999','a@gmail.com','1988-10-25 00:00:00','asd','2020-12-24 00:47:03','js2',_binary '');
/*!40000 ALTER TABLE `tbltourist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltouristmapping`
--

DROP TABLE IF EXISTS `tbltouristmapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltouristmapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `rfid` varchar(50) DEFAULT NULL,
  `portofassign` int(11) DEFAULT NULL,
  `touristid` int(11) DEFAULT NULL,
  `deviceid` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltouristmapping`
--

LOCK TABLES `tbltouristmapping` WRITE;
/*!40000 ALTER TABLE `tbltouristmapping` DISABLE KEYS */;
INSERT INTO `tbltouristmapping` VALUES (2,'akshay','00921',2,2,NULL,'2020-12-24 20:26:40',NULL),(3,'akshay','andd',2,2,13,'2020-12-27 17:39:43',NULL),(4,'anant','A001',2,1,13,'2020-12-27 17:44:44',NULL),(5,'anant','A001',2,1,13,'2020-12-27 17:47:21',NULL),(6,'akshay','a002',2,2,13,'2020-12-27 17:48:15',NULL),(7,'Anant','a002',2,1,13,'2020-12-27 17:55:31',NULL),(8,'Akshay','212',2,2,13,'2020-12-27 17:55:38',NULL),(9,'vijay','v00w',2,3,NULL,'2020-12-27 17:57:07',NULL),(10,'VD','js2',2,4,NULL,'2020-12-27 17:57:17',NULL);
/*!40000 ALTER TABLE `tbltouristmapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltouristvehicle`
--

DROP TABLE IF EXISTS `tbltouristvehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltouristvehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registrationid` int(11) DEFAULT NULL,
  `transactionid` varchar(50) DEFAULT NULL,
  `redeemed` bit(1) DEFAULT b'0',
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `redeemon` datetime DEFAULT NULL,
  `outtime` datetime DEFAULT NULL,
  `platenumber` varchar(50) DEFAULT NULL,
  `vehicleid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltouristvehicle`
--

LOCK TABLES `tbltouristvehicle` WRITE;
/*!40000 ALTER TABLE `tbltouristvehicle` DISABLE KEYS */;
INSERT INTO `tbltouristvehicle` VALUES (1,1,'001',_binary '','2020-12-25 04:09:37','2020-12-25 13:44:46',NULL,NULL,1),(3,1,'001',_binary '','2020-12-25 04:09:56','2020-12-25 13:47:48',NULL,NULL,2);
/*!40000 ALTER TABLE `tbltouristvehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbluser` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdby` int(100) DEFAULT NULL,
  `roleid` int(100) DEFAULT NULL,
  `createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(100) DEFAULT NULL,
  `modifiedon` timestamp NULL DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  `ismapped` bit(1) DEFAULT b'0',
  `rfid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluser`
--

LOCK TABLES `tbluser` WRITE;
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` VALUES (1,'admin','ohAO1FvqMx3RCak3d0nrBg==','admin@tourbooking.com',1,1,'2020-12-05 18:23:23',NULL,NULL,_binary '',_binary '\0',NULL),(2,'turshar','ohAO1FvqMx3RCak3d0nrBg==','turshar@gmail.com',1,2,'2020-12-06 11:08:36',NULL,NULL,_binary '',_binary '','awsadas'),(3,'anant','XvXdY4MYgMmwMM3fC+fqpg==','anant@gmail.com',1,3,'2020-12-06 13:21:51',NULL,NULL,_binary '',_binary '\0',NULL),(4,'testanant','XvXdY4MYgMmwMM3fC+fqpg==','test@gmail.com',1,4,'2020-12-06 13:25:10',1,'2020-12-10 19:48:21',_binary '',_binary '\0',NULL),(5,'Anant S','ohAO1FvqMx3RCak3d0nrBg==','anant@gmail.com',1,2,'2020-12-20 17:17:48',NULL,NULL,_binary '',_binary '','asda'),(6,'Vijay','ohAO1FvqMx3RCak3d0nrBg==','vijay@gmail.com',1,2,'2020-12-28 01:47:57',NULL,NULL,_binary '',_binary '','0011');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblvehicle`
--

DROP TABLE IF EXISTS `tblvehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblvehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeofvehicle` varchar(100) DEFAULT NULL,
  `amount` decimal(18,2) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblvehicle`
--

LOCK TABLES `tblvehicle` WRITE;
/*!40000 ALTER TABLE `tblvehicle` DISABLE KEYS */;
INSERT INTO `tblvehicle` VALUES (1,'Jeep',350.00,1,'2020-12-12 03:22:19',1,'2020-12-12 03:24:50',_binary ''),(2,'Van',300.00,1,'2020-12-12 03:25:08',NULL,NULL,_binary ''),(3,'Suv',250.00,1,'2020-12-12 03:25:23',NULL,NULL,_binary ''),(4,'Car',200.00,1,'2020-12-12 03:25:51',NULL,NULL,_binary ''),(5,'Tricycle',150.00,1,'2020-12-12 03:26:11',NULL,NULL,_binary ''),(6,'Motor',100.00,1,'2020-12-12 03:26:24',NULL,NULL,_binary ''),(7,'tourist bus',200.00,1,'2020-12-27 17:12:47',NULL,NULL,_binary '');
/*!40000 ALTER TABLE `tblvehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'tourbooking'
--

--
-- Dumping routines for database 'tourbooking'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_boat` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boat`(params JSON)
BEGIN
    DECLARE isactivestatus INT DEFAULT 0;
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    if (flag='i') then
		INSERT INTO tblboat
        (`description`,`createdby`,`capcity`,`price`)
		VALUES
        (params->>'$.description',params->>'$.loggedinid',params->>'$.capcity',params->>'$.price');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif(flag='u') then
		set isactivestatus=params->>'$.isactive';
		
		UPDATE tblboat
		SET
		`description` = (params->>'$.description'),
		`isactive` = isactivestatus,
		`modifiedby` =(params->>'$.loggedinid'),
		`modifiedon` = now(),
        `capcity` = (params->>'$.capcity'),
		`price` = (params->>'$.price')
		WHERE `id` =(params->>'$.id');
		SELECT  0 as errflag,params->>'$.id' as rowid;

    end if;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_boatcaptainmapping` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boatcaptainmapping`(params JSON)
BEGIN
	DECLARE errflag INT DEFAULT 0;
    DECLARE isactivestatus INT DEFAULT 0;
    declare flag varchar(20);
	SET flag=params->>'$.flag';
	if (flag='i') then
		update tbluser
        set
        ismapped=1,
        rfid=params->>'$.rfid'
        where id=params->>'$.userid';
    
		INSERT INTO tblboatcaptainmapping
		(`name`,`rfid`,`portofassign`,`userid`,`createdon`,`deviceid`)
		VALUES
		(params->>'$.name',params->>'$.rfid',params->>'$.portofassign',
        params->>'$.userid',now(),params->>'$.deviceid');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_fee` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fee`(params JSON)
BEGIN
DECLARE errflag INT DEFAULT 0;
    DECLARE isactivestatus INT DEFAULT 0;
    declare flag varchar(20);
     SET flag=params->>'$.flag';
	if (flag='i') then
		INSERT INTO tblfees(`description`,`price`,`createdby`,`createdon`)
		VALUES
        (params->>'$.description',params->>'$.price',params->>'$.loggedinid',now());
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif(flag='u') then
		set isactivestatus=params->>'$.isactive';
		update tblfees
        set 
        description=params->>'$.description',
        price=params->>'$.price',
        isactive=isactivestatus
        where id =params->>'$.id';
        SELECT  0 as errflag,params->>'$.id' as rowid;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getalltouristbyticket` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getalltouristbyticket`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="byticketnumber" Then
		SELECT t.id,t.registrationid,t.firstname,t.middlename,t.lastname,t.address1,t.address2,
		   t.hotelid,t.nationalityid,t.mobilenumber,t.emailid,t.dob,t.qrcode,t.createdon,
		   r.pax, r.fromdate, r.todate, r.numberofdays, r.numberofvehicle, r.totalcharge,t.isassigned
		FROM tbltourist t
		join tblregistration r on r.id=t.registrationid
        where t.registrationid=(params->>'$.id') ;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getalltouristvehicle` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getalltouristvehicle`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="bycurrentdate" Then
		SELECT id,registrationid,transactionid,redeemed,createdon,redeemon,outtime,platenumber,vehicleid
		FROM tbltouristvehicle where cast(redeemon as date)=(params->>'$.redeemon') ;
       /* '2020-12-25' */
	elseif flag="byid" then
    	SELECT id,registrationid,transactionid,redeemed,createdon,redeemon,outtime,platenumber,vehicleid
		FROM tbltouristvehicle where id=(params->>'$.id') ;
    
    END IF;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getboat` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getboat`(params JSON)
BEGIN
declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,description,isactive,capcity,price FROM tblboat
        where isactive=1;
	elseif flag="a" then
		SELECT id,description,isactive,capcity,price FROM tblboat;
	elseif flag="byid" then
		SELECT id,description,isactive,capcity,price FROM tblboat
        where id=(params->>'$.id') ;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getdeviceinfo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getdeviceinfo`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id, deviceid, isactive,portid FROM tblportdevicemapping
        where isactive=1;
	elseif flag="a" then
		SELECT id, deviceid, isactive,portid FROM tblportdevicemapping;
	elseif flag="byid" then
		SELECT id, deviceid, isactive,portid FROM tblportdevicemapping
        where id=(params->>'$.id') ;
	elseif flag="bydeviceid" then
		SELECT id, deviceid, isactive,portid FROM tblportdevicemapping
        where deviceid=(params->>'$.deviceid') ;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getdiscounts` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getdiscounts`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT d.id,d.description,d.value,d.discounttypeid,d.createdby,d.createdon,d.modifiedby,
		d.modifiedon,d.isactive,d.vaildtill,dt.description as discounttypedesc
		FROM tbldiscount d
		left join tbldiscounttype dt  on dt.id=d.discounttypeid and dt.isactive=1
        where d.isactive=1;
	elseif flag="a" then
		SELECT d.id,d.description,d.value,d.discounttypeid,d.createdby,d.createdon,d.modifiedby,
		d.modifiedon,d.isactive,d.vaildtill,dt.description as discounttypedesc
		FROM tbldiscount d
		left join tbldiscounttype dt  on dt.id=d.discounttypeid and dt.isactive=1;
	elseif flag="byid" then
		SELECT d.id,d.description,d.value,d.discounttypeid,d.createdby,d.createdon,d.modifiedby,
		d.modifiedon,d.isactive,d.vaildtill,dt.description as discounttypedesc
		FROM tbldiscount d
		left join tbldiscounttype dt  on dt.id=d.discounttypeid and dt.isactive=1
        where d.id=(params->>'$.id');
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getdiscounttype` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getdiscounttype`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,description,isactive,createdby,createdon,modifiedby,modifiedon
		FROM tbldiscounttype
        where isactive=1;
	elseif flag="a" then
		SELECT id,description,isactive,createdby,createdon,modifiedby,modifiedon
		FROM tbldiscounttype;
	elseif flag="byid" then
		SELECT id,description,isactive,createdby,createdon,modifiedby,modifiedon
		FROM tbldiscounttype
        where id=(params->>'$.id') ;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getfees` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getfees`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT orderby,id,description,price,isactive,createdby,createdon,modifiedby,modifiedon
		FROM tblfees
        where isactive=1 order by orderby;
	elseif flag="a" then
		SELECT orderby,id,description,price,isactive,createdby,createdon,modifiedby,modifiedon
		FROM tblfees order by orderby;
	elseif flag="byid" then
		SELECT orderby,id,description,price,isactive,createdby,createdon,modifiedby,modifiedon
		FROM tblfees
        where id=(params->>'$.id') order by orderby;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getport` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getport`(params JSON)
BEGIN
declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,description,isactive FROM tblport
        where isactive=1;
	elseif flag="a" then
		SELECT id,description,isactive FROM tblport;
	elseif flag="byid" then
		SELECT id,description,isactive FROM tblport
        where id=(params->>'$.id') ;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getrole` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getrole`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,rolename,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblrole where isactive=1 and id<>1;
	elseif flag="a" Then
		SELECT id,rolename,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblrole where  id<>1;
	elseif flag="byid" Then
		SELECT id,rolename,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblrole where id=(params->>'$.id');
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getslots` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getslots`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,description,starttime,endtime,createby,createdon,modifiedby,modifiedon,isactive
		FROM tblslots
        where isactive=1;
	elseif flag="a" then
		SELECT id,description,starttime,endtime,createby,createdon,modifiedby,modifiedon,isactive
		FROM tblslots;
	elseif flag="byid" then
		SELECT id,description,starttime,endtime,createby,createdon,modifiedby,modifiedon,isactive
		FROM tblslots
        where id=(params->>'$.id') ;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getuser`(params JSON)
BEGIN
declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="auth" Then
		SELECT u.id, u.username, u.password, u.email, u.createdby, u.roleid,r.rolename,
        u.createdon, u.modifiedby, u.modifiedon FROM tbluser u
        left join tblrole r on u.roleid=r.id
		where (u.email=(params->>'$.username') or u.username=(params->>'$.username'))
        and u.password=(params->>'$.password') 
		and u.isactive=1;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getuserinfo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getuserinfo`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
     IF flag="actv" Then
		SELECT u.id, u.username, u.password, u.email, u.createdby,
        u.roleid,r.rolename,u.isactive,
        u.createdon, u.modifiedby, u.modifiedon FROM tbluser u
        left join tblrole r on u.roleid=r.id
		where u.isactive=1 and u.roleid<>1;
	 elseif flag="a" Then
		SELECT u.id, u.username, u.password, u.email, u.createdby, u.roleid,r.rolename,
        u.createdon, u.modifiedby, u.modifiedon,u.isactive FROM tbluser u
		left join tblrole r on u.roleid=r.id
        where  u.roleid<>1;
	elseif flag="byid" Then
		SELECT u.id, u.username, u.password, u.email, u.createdby, u.roleid,r.rolename,
        u.createdon, u.modifiedby, u.modifiedon,u.isactive FROM tbluser u
        left join tblrole r on u.roleid=r.id
        where u.id=(params->>'$.id') and u.roleid<>1;
	elseif flag="byboatcaptian"  then
		SELECT u.id, u.username, u.password, u.email, u.createdby, u.roleid,r.rolename,
        u.createdon, u.modifiedby, u.modifiedon,u.isactive FROM tbluser u
        left join tblrole r on u.roleid=r.id
        where u.isactive=1 and u.roleid=2 and u.ismapped=0;
	 END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getvehicle` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getvehicle`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,typeofvehicle,amount,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblvehicle where isactive=1;
	elseif flag="a" then
		SELECT id,typeofvehicle,amount,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblvehicle;
	elseif flag="byid" then
		SELECT id,typeofvehicle,amount,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblvehicle
        where id=(params->>'$.id') ;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_port` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_port`(params JSON)
BEGIN
    DECLARE isactivestatus INT DEFAULT 0;
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    if (flag='i') then
		INSERT INTO tblport
        (`description`,`createdby`)
		VALUES
        (params->>'$.description',params->>'$.loggedinid');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif(flag='u') then
		set isactivestatus=params->>'$.isactive';
		
		UPDATE tblport
		SET
		`description` = (params->>'$.description'),
		`isactive` = isactivestatus,
		`modifiedby` =(params->>'$.loggedinid'),
		`modifiedon` = now()
		WHERE `id` =(params->>'$.id');
		SELECT  0 as errflag,params->>'$.id' as rowid;

    end if;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_portdevicemapping` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_portdevicemapping`(params JSON)
BEGIN
	  DECLARE isactivestatus INT DEFAULT 0;
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    if (flag='i') then
		INSERT INTO tblportdevicemapping
        (`deviceid`,`modifiedfrom`,`portid`)
		VALUES
        (params->>'$.deviceid',params->>'$.modifiedfrom',params->>'$.portid');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif(flag='u') then
		set isactivestatus=params->>'$.isactive';
		
		UPDATE tblportdevicemapping
		SET
		`portid` = (params->>'$.portid'),
		`isactive` = isactivestatus,
		`modifiedby` =(params->>'$.modifiedby'),
        `modifiedfrom` =(params->>'$.modifiedfrom'),
		`modifiedon` = now()
		WHERE `id` =(params->>'$.id');
		SELECT  0 as errflag,params->>'$.id' as rowid;

    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_saveregistration` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_saveregistration`(params JSON)
BEGIN
DECLARE registrationid INT DEFAULT 0;
declare flag varchar(20);
DECLARE isactivestatus INT DEFAULT 0;
	
INSERT INTO tblregistration
(`pax`,`fromdate`,`todate`,`numberofdays`,`numberofvehicle`,`totalcharge`,
`paymentid`,`isactive`,`createdon`)
VALUES
(params->>'$.pax',params->>'$.fromdate',params->>'$.todate',params->>'$.numberofdays',
params->>'$.totalcharge',params->>'$.paymentid',1,Now());
set registrationid =rowid;
INSERT INTO tbltourist
(`registrationid`,`firstname`,`middlename`,
`lastname`,`address1`,`address2`,`hotelid`,
`nationalityid`,`mobilenumber`,`emailid`,`dob`,
`qrcode`,`createdon`,`rfid`,`isassigned`)
SELECT registrationid,firstname,middlename,lastname ,
 address1,address2,hotelid,nationalityid,
 mobilenumber,mobilenumber,dob
 FROM
       JSON_TABLE(
      params->>'$.touristinfo',
    '$[*]' COLUMNS( firstname text PATH '$.firstname',
					middlename text PATH '$.middlename' ,
                    lastname text PATH '$.lastname' ,
                    address1 text PATH '$.address1' ,
                    address2 text PATH '$.address2' ,
                    hotelid int PATH '$.hotelid' ,
                    nationalityid int PATH '$.nationalityid' ,
					mobilenumber text PATH '$.mobilenumber' , 
                    dob date PATH '$.dob' 
                    ERROR ON ERROR )
    ) as jt;


SELECT  0 as errflag,registrationid as rowid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_slot` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_slot`(params JSON)
BEGIN
	DECLARE isactivestatus INT DEFAULT 0;
    declare flag varchar(20);
	SET flag=params->>'$.flag';
    if (flag='i') then
		INSERT INTO tblslots
        (`description`,`starttime`,`endtime`,`createby`)
		VALUES
        (params->>'$.description',params->>'$.starttime',params->>'$.endtime',params->>'$.loggedinid');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
     elseif(flag='u') then   
        set isactivestatus=params->>'$.isactive';
        UPDATE tblslots
		SET
		`description` = params->>'$.description',
		`starttime` = params->>'$.starttime',
		`endtime` = params->>'$.endtime',
		`modifiedby` = params->>'$.loggedinid',
		`modifiedon` = now(),
		`isactive` =isactivestatus
		WHERE `id` = params->>'$.id';
        SELECT  0 as errflag,params->>'$.id' as rowid;

        
    end if;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_touristmapping` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_touristmapping`(params JSON)
BEGIN
	DECLARE errflag INT DEFAULT 0;
    DECLARE isactivestatus INT DEFAULT 0;
    declare flag varchar(20);
	SET flag=params->>'$.flag';
	if (flag='i') then
		update tbltourist
        set
        isassigned =1,
        rfid=params->>'$.rfid'
        where id=params->>'$.touristid';
        
		INSERT INTO tbltouristmapping
		(`name`,`rfid`,`portofassign`,`touristid`,`deviceid`)
		VALUES
		(params->>'$.name',params->>'$.rfid',params->>'$.portofassign',params->>'$.touristid',params->>'$.deviceid');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user`(params JSON)
BEGIN
	DECLARE errflag INT DEFAULT 0;
    DECLARE isactive INT DEFAULT 0;
    declare flag varchar(20);
    declare isupdatepassword varchar(20);
    SET flag=params->>'$.flag';
	if (flag='i') then
		INSERT INTO tbluser
        (`username`,`password`,`email`,`createdby`,`roleid`,`createdon`)
		VALUES
		(params->>'$.username',params->>'$.password',params->>'$.email',
        params->>'$.loggedinid',params->>'$.roleid',now());
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif (flag='u') then
		SET isupdatepassword=params->>'$.isupdatepassword';
        set isactive=params->>'$.isactive';
        if(isupdatepassword='0') then
			update tbluser
			set 
            username=params->>'$.username',
            isactive=isactive,
            email=params->>'$.email',
            roleid=params->>'$.roleid',
            modifiedon=now(),
            modifiedby=params->>'$.loggedinid'
			where id=params->>'$.id';
			SELECT  0 as errflag,params->>'$.id' as rowid;
		else
			update tbluser
			set 
            username=params->>'$.username',
            isactive=isactive,
            email=params->>'$.email',
            roleid=params->>'$.roleid',
            password=params->>'$.password',
            modifiedon=now(),
            modifiedby=params->>'$.loggedinid'
			where id=params->>'$.id';
			SELECT  0 as errflag,params->>'$.id' as rowid;
        end if;
		
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_vehicle` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vehicle`(params JSON)
BEGIN
	DECLARE isactivestatus INT DEFAULT 0;
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    if (flag='i') then
		INSERT INTO tblvehicle
		(`typeofvehicle`,`amount`,`createdby`)
		VALUES
		(params->>'$.typeofvehicle',params->>'$.amount',params->>'$.loggedinid');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif(flag='u') then
		set isactivestatus=params->>'$.isactive';
		
		UPDATE tblvehicle
		SET
		`typeofvehicle` = (params->>'$.typeofvehicle'),
        `amount` = (params->>'$.amount'),
		`isactive` = isactivestatus,
		`modifiedby` =(params->>'$.loggedinid'),
		`modifiedon` = now()
		WHERE `id` =(params->>'$.id');
		SELECT  0 as errflag,params->>'$.id' as rowid;
	elseif(flag='redeemvehicle') then
		set isactivestatus=params->>'$.redeemed';
		update tbltouristvehicle
        set 
        redeemon=now(),
        redeemed=isactivestatus
        where `id` =(params->>'$.id');
        SELECT  0 as errflag,params->>'$.id' as rowid;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-29 20:32:21
