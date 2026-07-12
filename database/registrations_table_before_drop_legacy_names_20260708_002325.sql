-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: ims566_group
-- ------------------------------------------------------
-- Server version	8.0.46-0ubuntu0.24.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int unsigned NOT NULL,
  `full_name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_staff_id` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fullname` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `student_id` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `faculty` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `programme` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `register_date` datetime NOT NULL,
  `attendance_status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending',
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'registered',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registrations_event_id_foreign` (`event_id`),
  CONSTRAINT `registrations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrations`
--

LOCK TABLES `registrations` WRITE;
/*!40000 ALTER TABLE `registrations` DISABLE KEYS */;
INSERT INTO `registrations` VALUES (1,1,'Test Public User','TEST1782659379','Test Public User','TEST1782659379','testpublic1@example.com','0123456789','Test Faculty','Test Programme','2026-06-28 23:09:39','Pending','registered','2026-06-28 23:09:39','2026-07-07 10:12:03'),(6,2,'MOHD FAIZAL BIN SAWARDI LUKMAN','2023183251','MOHD FAIZAL BIN SAWARDI LUKMAN','2023183251','2023183251@student.uitm.edu.my','01234561723','Faculty of Information Science','','2026-07-07 17:50:16','Present','attended','2026-07-07 17:50:16','2026-07-07 21:33:04'),(7,2,'NOOR ADILLA ARFINA BINTI HADY','2023165301','NOOR ADILLA ARFINA BINTI HADY','2023165301','2023165301@student.uitm.edu.my','0109631565','Faculty of Information Science','BACHELOR OF INFORMATION SCIENCE (HONOURS) INFORMATION SYSTEMS MANAGEMENT','2026-07-07 17:58:58','Present','attended','2026-07-07 17:58:58','2026-07-07 18:12:19'),(8,2,'SITI HAJAR BINTI ESA','2023168649','SITI HAJAR BINTI ESA','2023168649','2023168649@student.uitm.edu.my','0176305447','Faculty of Information Science','','2026-07-07 18:00:13','Absent','absent','2026-07-07 18:00:13','2026-07-07 18:12:03'),(9,2,'SITI NAZIHAH BINTI MD SALLEH','2023379387','SITI NAZIHAH BINTI MD SALLEH','2023379387','2023379387@student.uitm.edu.my','0183611807','Faculty of Information Science','BACHELOR OF INFORMATION SCIENCE (HONOURS) INFORMATION SYSTEMS MANAGEMENT','2026-07-07 18:00:42','Present','attended','2026-07-07 18:00:42','2026-07-07 18:12:01'),(10,2,'MUHAMMAD AMIR IZZAT BIN SUDIN','2023717417','MUHAMMAD AMIR IZZAT BIN SUDIN','2023717417','2023717417@student.uitm.edu.my','0122481896','Faculty of Information Science','BACHELOR OF INFORMATION SCIENCE (HONOURS) INFORMATION SYSTEMS MANAGEMENT','2026-07-07 18:08:15','Present','attended','2026-07-07 18:08:15','2026-07-07 18:12:01'),(11,2,'NURHANNANI IZZATI BT HAZLAN','2022604158','NURHANNANI IZZATI BT HAZLAN','2022604158','2022604158@student.uitm.edu.my','0195286971','Faculty of Information Science','','2026-07-07 18:08:43','Present','attended','2026-07-07 18:08:43','2026-07-07 21:33:05'),(12,2,'IZWAN BIN SALIM','121121','IZWAN BIN SALIM','121121','izwan@uitm.edu.my','01212312123','Faculty of Accountancy','','2026-07-07 21:33:49','Pending','registered','2026-07-07 21:33:49','2026-07-07 21:33:49');
/*!40000 ALTER TABLE `registrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-08  0:23:26
