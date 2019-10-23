CREATE DATABASE  IF NOT EXISTS `socialtruek` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `socialtruek`;
-- MariaDB dump 10.17  Distrib 10.4.8-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: socialtruek
-- ------------------------------------------------------
-- Server version	10.4.8-MariaDB

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `val_product` decimal(1,1) NOT NULL,
  `fecha_posteo` datetime NOT NULL,
  `foto1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_id` (`categoria_id`),
  KEY `fk_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `fk_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truekes`
--

DROP TABLE IF EXISTS `truekes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truekes` (
  `id` int(11) NOT NULL,
  `id_producto_1` int(11) NOT NULL,
  `id_producto_2` int(11) NOT NULL,
  `fecha_trueke` datetime NOT NULL,
  `trueke` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_producto_1_UNIQUE` (`id_producto_1`),
  UNIQUE KEY `id_producto_2_UNIQUE` (`id_producto_2`),
  CONSTRAINT `fk_producto_1` FOREIGN KEY (`id_producto_1`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_2` FOREIGN KEY (`id_producto_2`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truekes`
--

LOCK TABLES `truekes` WRITE;
/*!40000 ALTER TABLE `truekes` DISABLE KEYS */;
/*!40000 ALTER TABLE `truekes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(512) NOT NULL,
  `fecha` date NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `avatar` varchar(512) DEFAULT NULL,
  `perfil` varchar(512) DEFAULT NULL,
  `val_user` decimal(1,1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Eric','Mena','menaericdaniel@gmail.com','$2y$10$oQlhXMRZD0rQN1aectZGfOc8A2x8I55fZ85TqwCnkQTwbmRaIpfGm','1976-03-03','h',NULL,NULL,NULL),(2,'Alexis','Veiga','veigalexis16@gmail.com','$2y$10$3gtsuupd4fz1DCXayxRPS.mEtGKiwdytD8cUq1TNAkPiUzDjhRUfO','1994-04-28','h',NULL,NULL,NULL),(3,'Marcos','Palladini','marcospalladini3@gmail.com','$2y$10$Kk9ydNTYHoDj4FhclFKSuOEgIyzJl84wy.PML2ELouCaZm5mnmTzi','1988-03-14','h',NULL,NULL,NULL),(4,'Brenda','Ruiz','brendaruiz@gmail.com','$2y$10$.PWAolL1hKNF/jerOkan..m5zqc9UfI1YVuHytZCc2u6.UnzTXD6a','1993-12-21','m',NULL,NULL,NULL),(5,'Micaela','Padilla','micaela@gmail.com','$2y$10$imD8p62zM6FXlmMU7yuEWeYjE9Vfx7/ndpTTDpB92WCAfxy0z8sLW','1989-10-21','m',NULL,NULL,NULL),(6,'Sabrina','Molina','sabrina@gmail.com','$2y$10$5JK7XOIwF0vIyIsvxomM/ef1w6iqFdNuUStYjNGVk9Zax8JV88o.i','1959-04-14','m',NULL,NULL,NULL),(7,'Osvaldo','Medina','osvaldo@gmail.com','$2y$10$l6jvEKjL2OrhAGQ0iGp9yel8UJ9/TF7KN.oA3fz.bYb9TOdom0J1C','1987-05-23','h',NULL,NULL,NULL),(8,'Diego','Fuentes','diego@gmail.com','$2y$10$DqQhygDaDUvZovhzsRWpbuISW9tcV5lZZpP/VwsA4MeP4rejkG.dy','1986-12-12','h',NULL,NULL,NULL),(9,'Mariano','Toledo','mariano@gmail.com','$2y$10$GihWS/gm.Du2/P0TYpLpPu6kOIKcU3MAB.mlRp8SuVTaQ/xwWX8Ly','1990-08-15','h',NULL,NULL,NULL),(10,'Sandra','Perez','sandra@gmail.com','$2y$10$2Gi3ouFohMkMgv339g4BEuEbmLJbH.2VJiUwuQl1D/XLp9KnmlCBK','1967-05-04','m',NULL,NULL,NULL),(11,'Gloria','Sanchez','gloria@gmail.com','$2y$10$i9ZIRMwpiDIJaJV7c49.eO5zFo8RjyDAy7xURYN8CINjWVobL8JvS','1983-07-31','m',NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-22 23:43:00
