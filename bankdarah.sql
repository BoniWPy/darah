-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: bankdarah
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.16.04.1

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
-- Table structure for table `darah`
--

DROP TABLE IF EXISTS `darah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `darah` (
  `id_darah` int(15) NOT NULL AUTO_INCREMENT,
  `golongan` varchar(10) NOT NULL,
  `ukuran` varchar(25) NOT NULL,
  `stok` int(10) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  PRIMARY KEY (`id_darah`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `darah`
--

LOCK TABLES `darah` WRITE;
/*!40000 ALTER TABLE `darah` DISABLE KEYS */;
INSERT INTO `darah` VALUES (1,'A (PRC)','2.5',10,'PRC'),(2,'A (WB)','3.5',11,'WB'),(3,'AB (PRC)','2.5',6,'PRC'),(4,'AB (WB)','3.5',10,'WB'),(5,'O (PRC)','2.5',8,'PRC'),(6,'O (WB)','3.5',8,'WB'),(7,'B (PRC)','2.5',11,'PRC'),(8,'B (WB)','3.5',6,'WB');
/*!40000 ALTER TABLE `darah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penerimaan`
--

DROP TABLE IF EXISTS `penerimaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penerimaan` (
  `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT,
  `no_penerimaan` int(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_penerimaan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penerimaan`
--

LOCK TABLES `penerimaan` WRITE;
/*!40000 ALTER TABLE `penerimaan` DISABLE KEYS */;
INSERT INTO `penerimaan` VALUES (1,76663772,5,'2019-07-29 16:28:57'),(2,76663773,10,'2019-07-29 16:31:03'),(3,76663774,10,'2019-07-29 16:31:12'),(4,70132,10,'2019-07-30 07:13:12'),(5,9876756,21,'2019-08-16 13:00:44');
/*!40000 ALTER TABLE `penerimaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `pasien` varchar(150) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `bagian` enum('Y5','C5','Uph','odc','M2') NOT NULL,
  `id_darah` int(11) NOT NULL,
  `golongan` varchar(150) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('waiting','confirm','cancel','cancel_perawat') NOT NULL DEFAULT 'waiting',
  `status_alert` tinyint(1) NOT NULL DEFAULT '0',
  `note` text,
  `data` text,
  `reaksi` tinyint(1) NOT NULL DEFAULT '1',
  `reaksi_darah` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesanan`
--

LOCK TABLES `pesanan` WRITE;
/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(150) NOT NULL AUTO_INCREMENT,
  `nik` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'00001','21232f297a57a5a743894a0e4a801fc3','Delvi','admin',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'00002','ee11cbb19052e40b07aac0ca060c23ee','Yohanes','user','085550553104','2019-06-23 08:00:44','2019-06-23 08:00:44'),(9,'00003','24c9e15e52afc47c225b757e7bee1f9d','Asep','user','08812045545','2019-08-19 18:10:57','2019-08-19 18:10:57');
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

-- Dump completed on 2019-08-19 19:37:42
