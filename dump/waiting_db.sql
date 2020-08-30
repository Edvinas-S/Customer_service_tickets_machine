CREATE DATABASE  IF NOT EXISTS `waiting_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `waiting_db`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: waiting_db
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(45) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `password` varchar(45) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `spec1_UNIQUE` (`account`),
  UNIQUE KEY `spec2_UNIQUE` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'spec1','22e284546bebd3965dc0922869f2572c'),(2,'spec2','5330066b5607c9953a04d5dcf8149def'),(3,'spec3','16243dd7f177a5f4c030867b77a23d79');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `serial_number` int(11) NOT NULL AUTO_INCREMENT,
  `spec_ID` int(11) NOT NULL,
  PRIMARY KEY (`serial_number`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (15,1),(21,2),(26,3),(27,2),(28,1),(30,3),(32,1),(33,2),(34,3),(35,1),(37,3),(38,2),(39,1),(41,3),(42,1),(43,2),(44,3),(45,1),(46,1),(47,2),(48,3),(49,3),(51,2),(52,1),(53,3),(54,3);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialists`
--

DROP TABLE IF EXISTS `specialists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `specialists` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `spec_1` int(11) DEFAULT NULL,
  `spec_2` int(11) DEFAULT NULL,
  `spec_3` int(11) DEFAULT NULL,
  `serial_number` int(11) DEFAULT NULL,
  `spec_1_active` int(11) DEFAULT NULL,
  `spec_2_active` int(11) DEFAULT NULL,
  `spec_3_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`number`),
  KEY `serial_number_idx` (`serial_number`),
  CONSTRAINT `serial_number` FOREIGN KEY (`serial_number`) REFERENCES `customers` (`serial_number`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialists`
--

LOCK TABLES `specialists` WRITE;
/*!40000 ALTER TABLE `specialists` DISABLE KEYS */;
INSERT INTO `specialists` VALUES (15,15,NULL,NULL,15,NULL,NULL,NULL),(21,NULL,21,NULL,21,NULL,NULL,NULL),(26,NULL,NULL,26,26,NULL,NULL,NULL),(27,NULL,27,NULL,27,NULL,NULL,NULL),(28,28,NULL,NULL,28,NULL,NULL,NULL),(30,NULL,NULL,30,30,NULL,NULL,1),(32,32,NULL,NULL,32,NULL,NULL,NULL),(33,NULL,33,NULL,33,NULL,NULL,NULL),(34,NULL,NULL,34,34,NULL,NULL,NULL),(35,35,NULL,NULL,35,NULL,NULL,NULL),(37,NULL,NULL,37,37,NULL,NULL,NULL),(38,NULL,38,NULL,38,NULL,NULL,NULL),(39,39,NULL,NULL,39,NULL,NULL,NULL),(41,NULL,NULL,41,41,NULL,NULL,NULL),(42,42,NULL,NULL,42,NULL,NULL,NULL),(43,NULL,43,NULL,43,NULL,NULL,NULL),(44,NULL,NULL,44,44,NULL,NULL,NULL),(45,45,NULL,NULL,45,NULL,NULL,NULL),(46,46,NULL,NULL,46,NULL,NULL,NULL),(47,NULL,47,NULL,47,NULL,NULL,NULL),(48,NULL,NULL,48,48,NULL,NULL,NULL),(49,NULL,NULL,49,49,NULL,NULL,NULL),(51,NULL,51,NULL,51,NULL,NULL,NULL),(52,52,NULL,NULL,52,NULL,NULL,NULL),(53,NULL,NULL,53,53,NULL,NULL,NULL),(54,NULL,NULL,54,54,NULL,NULL,NULL);
/*!40000 ALTER TABLE `specialists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'waiting_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-31  1:00:48
