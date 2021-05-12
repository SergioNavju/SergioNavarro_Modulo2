-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: navarrosergioind
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

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
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `id_libro` tinyint(4) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `creador` varchar(50) DEFAULT NULL,
  `año` year(4) DEFAULT NULL,
  `editorial` varchar(50) DEFAULT NULL,
  `lugar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (0,'La fundación','Isaac Asimov',1951,'Debolsillo','CDMX'),(1,'El hombre en el castillo','Philip K. Dick',1962,'Minotauro','CDMX'),(3,'El viajero, la torre y la larva','Alberto Manguel',2015,'Fondo de Cultura Economica','CDMX'),(4,'El principio del placer','Jose Emilio Pacheco',1972,'ERA','CDMX'),(5,'Canticos de la lejana tierra','Arthur C. Clarke',1987,'PLAZA & JANES','CDMX');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `música`
--

DROP TABLE IF EXISTS `música`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `música` (
  `id_música` tinyint(4) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `creador` varchar(50) DEFAULT NULL,
  `año` year(4) DEFAULT NULL,
  `album` varchar(50) DEFAULT 'The Wall',
  PRIMARY KEY (`id_música`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `música`
--

LOCK TABLES `música` WRITE;
/*!40000 ALTER TABLE `música` DISABLE KEYS */;
INSERT INTO `música` VALUES (1,'Crying Lightning','Arctic Monkeys',2009,'Humbug'),(2,'Wish you were here','Pink Floyd',1975,'Wish you were here'),(3,'Fear of the Dark','Iron Maiden',1992,'Fear of the Dark'),(4,'Like a rolling stone','Bob Dylan',1965,'Highway 61 Revisited'),(5,'Miedo','Caifanes',1994,'El nervio del volcán');
/*!40000 ALTER TABLE `música` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelicula` (
  `id_pelicula` tinyint(4) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `creador` varchar(50) DEFAULT NULL,
  `año` year(4) DEFAULT NULL,
  `clasificación` varchar(5) DEFAULT 'AA',
  `actor_principal` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pelicula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelicula`
--

LOCK TABLES `pelicula` WRITE;
/*!40000 ALTER TABLE `pelicula` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelicula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videojuego`
--

DROP TABLE IF EXISTS `videojuego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videojuego` (
  `id_videojuego` tinyint(4) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `creador` varchar(50) DEFAULT NULL,
  `año` year(4) DEFAULT NULL,
  `protagonista` varchar(50) DEFAULT 'Sans',
  PRIMARY KEY (`id_videojuego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego`
--

LOCK TABLES `videojuego` WRITE;
/*!40000 ALTER TABLE `videojuego` DISABLE KEYS */;
INSERT INTO `videojuego` VALUES (1,'The Legend of Zelda','Shigeru Miyamoto',1986,'Link'),(2,'Mario Bros','Shigeru Miyamoto',1985,'Mario'),(3,'Metroid','Yoshio Sakamoto',1986,'Samus Aran'),(4,'Super Smash Bros','Masahito Sakurai',1999,'Mario'),(5,'Dark Souls','Hidetaka Miyazaki',2009,'Ashen One');
/*!40000 ALTER TABLE `videojuego` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-11 22:21:14
