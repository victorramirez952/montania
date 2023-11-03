-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: montania
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories_providers`
--

DROP TABLE IF EXISTS `categories_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_providers` (
  `id_category_provider` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `cover_icon` blob DEFAULT NULL,
  `id_contact` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_category_provider`),
  KEY `id_contact` (`id_contact`),
  CONSTRAINT `categories_providers_ibfk_1` FOREIGN KEY (`id_contact`) REFERENCES `contacts` (`id_contact`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_providers`
--

LOCK TABLES `categories_providers` WRITE;
/*!40000 ALTER TABLE `categories_providers` DISABLE KEYS */;
INSERT INTO `categories_providers` VALUES (1,'Category Provider A',NULL,1),(2,'Category Provider B',NULL,2),(3,'Category Provider C',NULL,3),(4,'Category Provider D',NULL,4),(5,'Category Provider E',NULL,5),(6,'Category Provider F',NULL,1),(7,'Category Provider G',NULL,2);
/*!40000 ALTER TABLE `categories_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collaborators`
--

DROP TABLE IF EXISTS `collaborators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collaborators` (
  `id_collaborator` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_names` varchar(50) NOT NULL,
  `last_names` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `avatar_image` blob DEFAULT NULL,
  PRIMARY KEY (`id_collaborator`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collaborators`
--

LOCK TABLES `collaborators` WRITE;
/*!40000 ALTER TABLE `collaborators` DISABLE KEYS */;
INSERT INTO `collaborators` VALUES (1,'Robert','Taylor','Engineer',NULL),(2,'Sophia','Wilson','Designer',NULL),(3,'Ethan','Anderson','Architect',NULL),(4,'Mia','Thomas','Developer',NULL),(5,'Aiden','Clark','Scientist',NULL),(6,'Isabella','White','Researcher',NULL),(7,'James','Martin','Manager',NULL),(8,'Charlotte','Hill','Consultant',NULL),(9,'Benjamin','Adams','Analyst',NULL),(10,'Amelia','Scott','Artist',NULL);
/*!40000 ALTER TABLE `collaborators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_services`
--

DROP TABLE IF EXISTS `contact_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_services` (
  `id_contact_service` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_contact` int(10) unsigned DEFAULT NULL,
  `id_service` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_contact_service`),
  UNIQUE KEY `id_service` (`id_service`),
  KEY `fk_contact` (`id_contact`),
  CONSTRAINT `fk_contact` FOREIGN KEY (`id_contact`) REFERENCES `contacts` (`id_contact`) ON DELETE CASCADE,
  CONSTRAINT `fk_service` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_services`
--

LOCK TABLES `contact_services` WRITE;
/*!40000 ALTER TABLE `contact_services` DISABLE KEYS */;
INSERT INTO `contact_services` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,4),(5,2,5),(6,2,6),(7,3,7),(8,3,8),(9,4,9);
/*!40000 ALTER TABLE `contact_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id_contact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_names` varchar(50) DEFAULT NULL,
  `last_names` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Samuel','Johnson','1234567890'),(2,'Lily','Roberts','9876543210'),(3,'Daniel','Davis','1112223333'),(4,'Sophie','Walker','4445556666'),(5,'Nathan','Perez','7778889999');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_project`
--

DROP TABLE IF EXISTS `customer_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_project` (
  `id_customer` int(10) unsigned NOT NULL,
  `id_project` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_customer`,`id_project`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `customer_project_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE,
  CONSTRAINT `customer_project_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_project`
--

LOCK TABLES `customer_project` WRITE;
/*!40000 ALTER TABLE `customer_project` DISABLE KEYS */;
INSERT INTO `customer_project` VALUES (1,7),(2,6),(3,8),(4,5),(5,4),(7,1),(7,2),(10,3);
/*!40000 ALTER TABLE `customer_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_service`
--

DROP TABLE IF EXISTS `customer_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_service` (
  `id_service` int(10) unsigned NOT NULL,
  `id_customer` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_service`,`id_customer`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `customer_service_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`) ON DELETE CASCADE,
  CONSTRAINT `customer_service_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_service`
--

LOCK TABLES `customer_service` WRITE;
/*!40000 ALTER TABLE `customer_service` DISABLE KEYS */;
INSERT INTO `customer_service` VALUES (1,7),(2,10),(3,5),(4,4),(5,2),(6,1),(7,3);
/*!40000 ALTER TABLE `customer_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id_customer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `second_email` varchar(50) DEFAULT NULL,
  `id_user` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_customer`),
  UNIQUE KEY `id_user` (`id_user`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'1234567890','123 Main St, City','jane.smith@example.com',1),(2,'9876543210','456 Elm St, Town',NULL,2),(3,'1112223333','789 Oak St, Village','secondemail3@example.com',3),(4,'4445556666','321 Pine St, Hamlet',NULL,4),(5,'7778889999','555 Cedar St, County','secondemail5@example.com',5),(6,'3334445555','999 Birch St, District',NULL,6),(7,'6667778888','222 Spruce St, Borough','secondemail7@example.com',7),(8,'9990001111','777 Walnut St, Township','secondemail8@example.com',8),(9,'2223334444','888 Maple St, Parish',NULL,9),(10,'5556667777','444 Ash St, Municipality','john.doe@example.com',10);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliverables`
--

DROP TABLE IF EXISTS `deliverables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deliverables` (
  `id_deliverable` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_service` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_deliverable`),
  KEY `id_service` (`id_service`),
  CONSTRAINT `deliverables_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliverables`
--

LOCK TABLES `deliverables` WRITE;
/*!40000 ALTER TABLE `deliverables` DISABLE KEYS */;
INSERT INTO `deliverables` VALUES (1,1,'Title 1','Description for deliverable 1'),(2,2,'Title 2','Description for deliverable 2'),(3,3,'Title 3','Description for deliverable 3'),(4,4,'Title 4','Description for deliverable 4'),(5,5,'Title 5','Description for deliverable 5'),(6,6,'Title 6','Description for deliverable 6'),(7,7,'Title 7','Description for deliverable 7'),(8,8,'Title 8','Description for deliverable 8'),(9,9,'Title 9','Description for deliverable 9'),(10,10,'Title 10','Description for deliverable 10'),(11,1,'Title 11','Description for deliverable 11'),(12,2,'Title 12','Description for deliverable 12');
/*!40000 ALTER TABLE `deliverables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entities`
--

DROP TABLE IF EXISTS `entities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entities` (
  `id_entity` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entity_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_entity`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entities`
--

LOCK TABLES `entities` WRITE;
/*!40000 ALTER TABLE `entities` DISABLE KEYS */;
INSERT INTO `entities` VALUES (1,'projects'),(2,'montania'),(3,'collaborators'),(4,'services');
/*!40000 ALTER TABLE `entities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_entity`
--

DROP TABLE IF EXISTS `image_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_entity` (
  `id_image` int(10) unsigned NOT NULL,
  `id_entity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_image`,`id_entity`),
  KEY `id_entity` (`id_entity`),
  CONSTRAINT `image_entity_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `images` (`id_image`) ON DELETE CASCADE,
  CONSTRAINT `image_entity_ibfk_2` FOREIGN KEY (`id_entity`) REFERENCES `entities` (`id_entity`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_entity`
--

LOCK TABLES `image_entity` WRITE;
/*!40000 ALTER TABLE `image_entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id_image` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` blob NOT NULL,
  `alt` varchar(100) DEFAULT NULL,
  `position` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `montania`
--

DROP TABLE IF EXISTS `montania`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `montania` (
  `id_montania` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slogan` varchar(255) DEFAULT NULL,
  `history` text DEFAULT NULL,
  `history_image` blob DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `mission_image` blob DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `vision_image` blob DEFAULT NULL,
  PRIMARY KEY (`id_montania`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `montania`
--

LOCK TABLES `montania` WRITE;
/*!40000 ALTER TABLE `montania` DISABLE KEYS */;
INSERT INTO `montania` VALUES (1,'Empowering Peaks','History text goes here.',NULL,'Mission text goes here.',NULL,'Vision text goes here',NULL);
/*!40000 ALTER TABLE `montania` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prices`
--

DROP TABLE IF EXISTS `prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prices` (
  `id_price` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_service` int(10) unsigned NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `m2` tinyint(1) NOT NULL,
  `price_cover` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_price`),
  KEY `id_service` (`id_service`),
  CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prices`
--

LOCK TABLES `prices` WRITE;
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
INSERT INTO `prices` VALUES (1,1,'Description 1',50,0,1),(2,2,'Description 2',75,1,0),(3,3,'Description 3',100,1,1),(4,4,'Description 4',45,0,0),(5,5,'Description 5',120,1,1),(6,6,'Description 6',60,0,1),(7,7,'Description 7',85,1,0),(8,8,'Description 8',70,0,0),(9,9,'Description 9',110,1,1),(10,10,'Description 10',55,0,1),(11,1,'Description 11',65,1,0),(12,2,'Description 12',95,1,1),(13,3,'Description 13',80,0,0);
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id_project` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `place` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_review` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_project`),
  KEY `fk_id_review` (`id_review`),
  CONSTRAINT `fk_id_review` FOREIGN KEY (`id_review`) REFERENCES `reviews` (`id_review`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Project A','City A','2023-01-10','2023-03-15','Research','Description for Project A',1),(2,'Project B','City B','2023-02-20','2023-05-25','Development','Description for Project B',2),(3,'Project C','City C','2023-03-12','2023-06-18','Design','Description for Project C',3),(4,'Project D','City D','2023-04-05','2023-07-10','Testing','Description for Project D',4),(5,'Project E','City E','2023-05-30','2023-09-05','Analysis','Description for Project E',5),(6,'Project F','City F','2023-06-22','2023-10-25','Implementation','Description for Project F',6),(7,'Project G','City G','2023-07-18','2023-11-20','Maintenance','Description for Project G',7),(8,'Project H','City H','2023-08-14','2023-12-15','Support','Description for Project H',8),(9,'Project I','City I','2023-09-10','2023-12-30','Consulting','Description for Project I',9),(10,'Project J','City J','2023-10-05','2024-01-20','Training','Description for Project J',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resources` (
  `id_resource` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `id_project` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_resource`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resources`
--

LOCK TABLES `resources` WRITE;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` VALUES (1,'Resource 1','https://link1.com',1),(2,'Resource 2','https://link2.com',2),(3,'Resource 3','https://link3.com',3),(4,'Resource 4','https://link4.com',4),(5,'Resource 5','https://link5.com',5),(6,'Resource 6','https://link6.com',6),(7,'Resource 7','https://link7.com',7),(8,'Resource 8','https://link8.com',8),(9,'Resource 9','https://link9.com',1),(10,'Resource 10','https://link10.com',2);
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id_review` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id_review`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'Great product, highly recommended!'),(2,'This is exactly what I needed.'),(3,'Excellent service, very satisfied.'),(4,'The quality is outstanding.'),(5,'Not happy with the product, needs improvement.'),(6,'Could be better for the price.'),(7,'Average product, nothing special.'),(8,'Really disappointed, not as described.'),(9,'Amazing quality, exceeded my expectations.'),(10,'Fair product for the price, could improve.');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_collaborator`
--

DROP TABLE IF EXISTS `service_collaborator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_collaborator` (
  `id_service` int(10) unsigned NOT NULL,
  `id_collaborator` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_service`,`id_collaborator`),
  KEY `id_collaborator` (`id_collaborator`),
  CONSTRAINT `service_collaborator_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`) ON DELETE CASCADE,
  CONSTRAINT `service_collaborator_ibfk_2` FOREIGN KEY (`id_collaborator`) REFERENCES `collaborators` (`id_collaborator`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_collaborator`
--

LOCK TABLES `service_collaborator` WRITE;
/*!40000 ALTER TABLE `service_collaborator` DISABLE KEYS */;
INSERT INTO `service_collaborator` VALUES (1,1),(1,2),(2,2),(2,3),(3,3),(3,4),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10);
/*!40000 ALTER TABLE `service_collaborator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id_service` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `cover_icon` blob DEFAULT NULL,
  `duration` int(10) unsigned DEFAULT NULL,
  `time_units` varchar(50) DEFAULT NULL,
  `sessions_number` int(10) unsigned DEFAULT NULL,
  `link_booking` text DEFAULT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Service A',NULL,60,'Minutes',4,'http://bookinglinkA.com'),(2,'Service B',NULL,90,'Minutes',3,'http://bookinglinkB.com'),(3,'Service C',NULL,45,'Minutes',5,'http://bookinglinkC.com'),(4,'Service D',NULL,120,'Minutes',2,'http://bookinglinkD.com'),(5,'Service E',NULL,30,'Minutes',6,'http://bookinglinkE.com'),(6,'Service F',NULL,75,'Minutes',4,'http://bookinglinkF.com'),(7,'Service G',NULL,90,'Minutes',3,'http://bookinglinkG.com'),(8,'Service H',NULL,2,'Hours',5,'http://bookinglinkH.com'),(9,'Service I',NULL,1,'Hours',2,'http://bookinglinkI.com'),(10,'Service J',NULL,45,'Minutes',4,'http://bookinglinkJ.com');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stages`
--

DROP TABLE IF EXISTS `stages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stages` (
  `id_stage` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_project` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `completed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_stage`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `stages_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stages`
--

LOCK TABLES `stages` WRITE;
/*!40000 ALTER TABLE `stages` DISABLE KEYS */;
INSERT INTO `stages` VALUES (1,1,'2023-01-15','Description for Stage 1',1),(2,2,'2023-02-20','Description for Stage 2',0),(3,3,'2023-03-10','Description for Stage 3',1),(4,4,'2023-04-05','Description for Stage 4',0),(5,5,'2023-05-15','Description for Stage 5',1),(6,6,'2023-06-20','Description for Stage 6',0),(7,7,'2023-07-10','Description for Stage 7',1),(8,8,'2023-08-05','Description for Stage 8',0),(9,9,'2023-09-15','Description for Stage 9',1),(10,10,'2023-10-20','Description for Stage 10',0),(11,1,'2023-11-10','Description for Stage 11',1),(12,2,'2023-12-05','Description for Stage 12',0),(13,3,'2024-01-15','Description for Stage 13',1);
/*!40000 ALTER TABLE `stages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `first_names` varchar(50) NOT NULL,
  `last_names` varchar(50) NOT NULL,
  `avatar_image` blob DEFAULT NULL,
  `type` int(10) unsigned DEFAULT 0,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'john.doe@example.com','John','Doe',NULL,0,'$2y$10$g5xMw6oO4eRxcnqTZDur6Opz1BRSK8aghgrNwbqtLuU9UZa5Z116O'),(2,'jane.smith@example.com','Jane','Smith',NULL,0,'$2y$10$.xlwzPpSvIECUxpL27TYteFac9aqbGhBMgPORAgJasTdhUPtrcvS.'),(3,'mike.johnson@example.com','Mike','Johnson',NULL,0,'$2y$10$Dw/J5ZXHJYN5P4MQDPeDRuJPinikK63RSH.vQbzT27BCRBPBj0kQS'),(4,'emily.williams@example.com','Emily','Williams',NULL,0,'$2y$10$X5daQEolb95WnX9ZANOovuCG6WG0YjD275bZzeQOQcxYsGsjlsZze'),(5,'chris.brown@example.com','Chris','Brown',NULL,0,'$2y$10$snRJ1d/CDKL6ZlO.k/CeqOxC8lTanVK0p0uxcuM8BtVZFAZ70GHKW'),(6,'sarah.garcia@example.com','Sarah','Garcia',NULL,0,'$2y$10$NyeRYf8ecmy7JB5w/i.BCucpM6s4pq8smCKcyHF3NW6EsmOTD3P/e'),(7,'alex.martinez@example.com','Alex','Martinez',NULL,0,'$2y$10$4rjOf4Al1K4SFPXB5srblu/dZunDQZmkhZZ0PjFGJrwvb5G11g2fm'),(8,'olivia.lee@example.com','Olivia','Lee',NULL,0,'$2y$10$8AGBZ1jA.TUSqwwycARKbO/OqFjCv5DkXGr0jIq4yGrVwqW1IKbsm'),(9,'william.lopez@example.com','William','Lopez',NULL,0,'$2y$10$40krEzP3FHHlEyzTsUfU9ePK85zI5cQFt7ZyqzTM8oOKs/HBqlxTq'),(10,'ava.nguyen@example.com','Ava','Nguyen',NULL,0,'$2y$10$G4JJDw9QuWEnLMGLbD/vaO/BTrFJM6Bk2AipM/PcgcyfwEeDbZsja'),(11,'admin1@example.com','Michael','Anderson',NULL,1,'$2y$10$ouUdrcwtevHyLSzCAskNUelVp3qSsjgev4oJn/iAsFyAZbUuunyJ2'),(12,'admin2@example.com','David','Wilson',NULL,1,'$2y$10$j8WXrZ5bHmcR/beRROBJKuwDne3ebSAUh1QAQu0IM2RGy8h4nj0zS'),(13,'admin3@example.com','Jennifer','Gonzalez',NULL,1,'$2y$10$tkNoR7CX.fJz72oLpI.b6.4r/1br6BR/C6tBkM1WfSOvjA65NEBQu'),(14,'admin4@example.com','Christopher','Taylor',NULL,1,'$2y$10$oqNauurphEv9bYXmg6eKN.OkXvz7S1vmJWQg8MbLYEizgLG8VDRYa');
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

-- Dump completed on 2023-11-02 23:20:07
