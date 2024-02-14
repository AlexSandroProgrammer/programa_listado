-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sifer-app
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `carroceria`
--

DROP TABLE IF EXISTS `carroceria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carroceria` (
  `id_carroceria` int(3) NOT NULL AUTO_INCREMENT,
  `carroceria` varchar(20) NOT NULL,
  PRIMARY KEY (`id_carroceria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carroceria`
--

LOCK TABLES `carroceria` WRITE;
/*!40000 ALTER TABLE `carroceria` DISABLE KEYS */;
INSERT INTO `carroceria` VALUES (3,'No Aplica');
/*!40000 ALTER TABLE `carroceria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id_category` int(5) NOT NULL AUTO_INCREMENT,
  `category` text DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cilindraje`
--

DROP TABLE IF EXISTS `cilindraje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cilindraje` (
  `id_cilindraje` int(3) NOT NULL AUTO_INCREMENT,
  `cilindraje` int(4) NOT NULL,
  PRIMARY KEY (`id_cilindraje`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cilindraje`
--

LOCK TABLES `cilindraje` WRITE;
/*!40000 ALTER TABLE `cilindraje` DISABLE KEYS */;
INSERT INTO `cilindraje` VALUES (4,250);
/*!40000 ALTER TABLE `cilindraje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colores_moto`
--

DROP TABLE IF EXISTS `colores_moto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colores_moto` (
  `id_color` int(3) NOT NULL,
  `nombre_color` varchar(50) NOT NULL,
  PRIMARY KEY (`id_color`),
  UNIQUE KEY `id_color` (`id_color`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colores_moto`
--

LOCK TABLES `colores_moto` WRITE;
/*!40000 ALTER TABLE `colores_moto` DISABLE KEYS */;
INSERT INTO `colores_moto` VALUES (3020,'Azul Cielo'),(10201,'Verde marela');
/*!40000 ALTER TABLE `colores_moto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combustible`
--

DROP TABLE IF EXISTS `combustible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combustible` (
  `id_combustible` int(3) NOT NULL AUTO_INCREMENT,
  `combustible` varchar(20) NOT NULL,
  PRIMARY KEY (`id_combustible`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combustible`
--

LOCK TABLES `combustible` WRITE;
/*!40000 ALTER TABLE `combustible` DISABLE KEYS */;
INSERT INTO `combustible` VALUES (5,'Gasolina');
/*!40000 ALTER TABLE `combustible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datetime_entry`
--

DROP TABLE IF EXISTS `datetime_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datetime_entry` (
  `id_entry` int(10) NOT NULL AUTO_INCREMENT,
  `date_entry` datetime NOT NULL,
  `document` int(10) NOT NULL,
  PRIMARY KEY (`id_entry`),
  KEY `datetime_entry_ibfk_1` (`document`),
  CONSTRAINT `datetime_entry_ibfk_1` FOREIGN KEY (`document`) REFERENCES `user` (`document`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datetime_entry`
--

LOCK TABLES `datetime_entry` WRITE;
/*!40000 ALTER TABLE `datetime_entry` DISABLE KEYS */;
INSERT INTO `datetime_entry` VALUES (150,'2023-05-11 10:58:13',1110460410),(151,'2023-05-11 11:06:52',1110460410),(152,'2023-05-11 11:07:49',1110460410),(153,'2023-05-11 11:23:32',1110460410),(154,'2023-06-09 06:56:02',1110460410),(155,'2023-07-08 03:06:05',1110460410),(156,'2023-07-09 12:48:16',1110460410),(157,'2023-07-09 21:22:43',1110460410),(158,'2023-07-10 06:54:45',1110460410),(159,'2023-07-10 07:12:29',1110460410),(160,'2023-07-10 08:50:14',1110460410),(161,'2023-07-24 10:59:45',1110460410),(162,'2023-07-24 23:46:10',1110460410),(163,'2023-07-26 02:31:30',1110460410),(164,'2023-07-26 06:58:03',1110460410),(165,'2023-07-26 06:58:39',1110460410),(166,'2023-07-26 23:42:51',1110460410),(167,'2023-07-26 23:59:18',1110460410),(168,'2023-07-27 00:01:46',1110460410),(169,'2023-07-27 00:03:15',1110460410),(170,'2023-07-27 00:06:45',1110460410),(171,'2023-07-27 00:13:37',1110460410),(172,'2023-07-27 00:26:32',1110460410),(173,'2023-07-27 13:08:50',1110460410),(174,'2023-07-28 11:13:52',1110460410),(175,'2023-07-28 19:24:14',1110460410),(176,'2023-07-29 13:37:07',1110460410),(177,'2023-07-31 00:51:17',1110460410),(178,'2023-07-31 12:17:57',1110460410),(179,'2023-07-31 13:27:39',1110460410),(180,'2023-07-31 15:03:01',1110460410),(181,'2023-08-02 13:31:34',1110460410),(182,'2023-08-02 14:07:37',1110460410),(183,'2023-08-02 14:18:42',1110460410),(184,'2023-08-02 22:44:50',1110460410);
/*!40000 ALTER TABLE `datetime_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datetime_out`
--

DROP TABLE IF EXISTS `datetime_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datetime_out` (
  `id_out` int(10) NOT NULL AUTO_INCREMENT,
  `date_out` datetime NOT NULL,
  `document_user` int(10) NOT NULL,
  PRIMARY KEY (`id_out`),
  KEY `document_user` (`document_user`),
  CONSTRAINT `datetime_out_ibfk_1` FOREIGN KEY (`document_user`) REFERENCES `user` (`document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datetime_out`
--

LOCK TABLES `datetime_out` WRITE;
/*!40000 ALTER TABLE `datetime_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `datetime_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos` (
  `id_documento` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) NOT NULL,
  `nombre` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`id_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (234,'12102020','SOAT',230000.00,'2023-07-09 00:56:33',1),(235,'12020022','Tecnico mecanica',26000.00,'2023-07-27 14:48:47',1),(236,'23455643','Tarjeta',1230020.00,'2023-07-27 14:49:36',1);
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos_vendidos`
--

DROP TABLE IF EXISTS `documentos_vendidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos_vendidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_documento` int(10) NOT NULL,
  `id_venta` int(10) NOT NULL,
  `existencia` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos_vendidos`
--

LOCK TABLES `documentos_vendidos` WRITE;
/*!40000 ALTER TABLE `documentos_vendidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos_vendidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `id_gender` int(2) NOT NULL AUTO_INCREMENT,
  `gender` text NOT NULL,
  PRIMARY KEY (`id_gender`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'masculino'),(2,'femenino'),(3,'otro');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intentos`
--

DROP TABLE IF EXISTS `intentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document` int(10) unsigned NOT NULL,
  `fecha_actual` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intentos`
--

LOCK TABLES `intentos` WRITE;
/*!40000 ALTER TABLE `intentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `intentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `id_marca` int(5) NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (3,'yamaha'),(4,'chevrolet');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas_motos`
--

DROP TABLE IF EXISTS `marcas_motos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas_motos` (
  `id` int(5) unsigned NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas_motos`
--

LOCK TABLES `marcas_motos` WRITE;
/*!40000 ALTER TABLE `marcas_motos` DISABLE KEYS */;
INSERT INTO `marcas_motos` VALUES (12232,'kia');
/*!40000 ALTER TABLE `marcas_motos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelos`
--

DROP TABLE IF EXISTS `modelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelos` (
  `id_modelo` int(3) NOT NULL,
  `modelo_año` int(4) NOT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelos`
--

LOCK TABLES `modelos` WRITE;
/*!40000 ALTER TABLE `modelos` DISABLE KEYS */;
INSERT INTO `modelos` VALUES (12919,1997);
/*!40000 ALTER TABLE `modelos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motorcycles`
--

DROP TABLE IF EXISTS `motorcycles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motorcycles` (
  `placa` varchar(6) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `km` int(10) NOT NULL,
  `id_modelo` int(3) NOT NULL,
  `id_marca` int(5) unsigned NOT NULL,
  `id_color` int(3) NOT NULL,
  `id_carroceria` int(3) NOT NULL,
  `document` int(10) NOT NULL,
  `id_cilindraje` int(3) NOT NULL,
  `id_combustible` int(3) NOT NULL,
  `id_servicio_moto` int(3) NOT NULL,
  PRIMARY KEY (`placa`),
  KEY `motorcycles_ibfk_1` (`document`),
  KEY `motorcycles_ibfk_2` (`id_carroceria`),
  KEY `id_color` (`id_color`),
  KEY `id_combustible` (`id_combustible`),
  KEY `motorcycles_ibfk_6` (`id_marca`),
  KEY `motorcycles_ibfk_7` (`id_modelo`),
  KEY `id_servicio_moto` (`id_servicio_moto`),
  KEY `id_cilindraje` (`id_cilindraje`),
  CONSTRAINT `motorcycles_ibfk_1` FOREIGN KEY (`document`) REFERENCES `user` (`document`) ON UPDATE CASCADE,
  CONSTRAINT `motorcycles_ibfk_2` FOREIGN KEY (`id_carroceria`) REFERENCES `carroceria` (`id_carroceria`) ON UPDATE CASCADE,
  CONSTRAINT `motorcycles_ibfk_4` FOREIGN KEY (`id_color`) REFERENCES `colores_moto` (`id_color`) ON UPDATE CASCADE,
  CONSTRAINT `motorcycles_ibfk_5` FOREIGN KEY (`id_combustible`) REFERENCES `combustible` (`id_combustible`) ON UPDATE CASCADE,
  CONSTRAINT `motorcycles_ibfk_6` FOREIGN KEY (`id_marca`) REFERENCES `marcas_motos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `motorcycles_ibfk_7` FOREIGN KEY (`id_modelo`) REFERENCES `modelos` (`id_modelo`) ON UPDATE CASCADE,
  CONSTRAINT `motorcycles_ibfk_8` FOREIGN KEY (`id_servicio_moto`) REFERENCES `servicio_moto` (`id_servicio_moto`) ON UPDATE CASCADE,
  CONSTRAINT `motorcycles_ibfk_9` FOREIGN KEY (`id_cilindraje`) REFERENCES `cilindraje` (`id_cilindraje`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motorcycles`
--

LOCK TABLES `motorcycles` WRITE;
/*!40000 ALTER TABLE `motorcycles` DISABLE KEYS */;
INSERT INTO `motorcycles` VALUES ('FRE23G','1201010101',2100,12919,12232,10201,3,1201020100,4,5,4);
/*!40000 ALTER TABLE `motorcycles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_estado` int(2) NOT NULL,
  `id_marca` int(2) NOT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_marca` (`id_marca`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (15,'120303','llantas',23000.00,1,4,19);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_vendidos`
--

DROP TABLE IF EXISTS `productos_vendidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_vendidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` bigint(20) unsigned NOT NULL,
  `existencia` bigint(20) unsigned NOT NULL,
  `id_venta` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_producto` (`id_producto`),
  KEY `id_venta` (`id_venta`),
  CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_vendidos`
--

LOCK TABLES `productos_vendidos` WRITE;
/*!40000 ALTER TABLE `productos_vendidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos_vendidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id_services` int(5) NOT NULL AUTO_INCREMENT,
  `code_service` varchar(20) NOT NULL,
  `service` text NOT NULL,
  `costo_service` decimal(10,2) NOT NULL,
  `state` int(1) NOT NULL,
  `cantidad` int(1) NOT NULL,
  PRIMARY KEY (`id_services`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (32,'12230','cambio de aceite',12000.00,1,1);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio_moto`
--

DROP TABLE IF EXISTS `servicio_moto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio_moto` (
  `id_servicio_moto` int(3) NOT NULL AUTO_INCREMENT,
  `servicio_moto` varchar(20) NOT NULL,
  PRIMARY KEY (`id_servicio_moto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio_moto`
--

LOCK TABLES `servicio_moto` WRITE;
/*!40000 ALTER TABLE `servicio_moto` DISABLE KEYS */;
INSERT INTO `servicio_moto` VALUES (2,'turismo'),(3,'Domiciliario'),(4,'Particular');
/*!40000 ALTER TABLE `servicio_moto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios_vendidos`
--

DROP TABLE IF EXISTS `servicios_vendidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios_vendidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_servicio` int(10) NOT NULL,
  `id_venta` int(10) NOT NULL,
  `existencia` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios_vendidos`
--

LOCK TABLES `servicios_vendidos` WRITE;
/*!40000 ALTER TABLE `servicios_vendidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios_vendidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_detail`
--

DROP TABLE IF EXISTS `shop_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_detail` (
  `id_shop_detail` int(6) NOT NULL,
  `cant_product` int(5) NOT NULL,
  `id_shopping` int(8) NOT NULL,
  `id_product` int(10) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id_shop_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_detail`
--

LOCK TABLES `shop_detail` WRITE;
/*!40000 ALTER TABLE `shop_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping`
--

DROP TABLE IF EXISTS `shopping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping` (
  `id_shopping` int(8) NOT NULL,
  `document` int(10) NOT NULL,
  `document_trabajador` int(11) NOT NULL,
  `shop_datetime` datetime NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_shopping`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping`
--

LOCK TABLES `shopping` WRITE;
/*!40000 ALTER TABLE `shopping` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `id_state` int(2) NOT NULL AUTO_INCREMENT,
  `state` text NOT NULL,
  PRIMARY KEY (`id_state`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'activo'),(2,'inactivo');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terminos`
--

DROP TABLE IF EXISTS `terminos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terminos` (
  `id_terminos` int(2) NOT NULL AUTO_INCREMENT,
  `terminos` varchar(20) NOT NULL,
  PRIMARY KEY (`id_terminos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terminos`
--

LOCK TABLES `terminos` WRITE;
/*!40000 ALTER TABLE `terminos` DISABLE KEYS */;
INSERT INTO `terminos` VALUES (1,'acepto');
/*!40000 ALTER TABLE `terminos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trigger_documents`
--

DROP TABLE IF EXISTS `trigger_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trigger_documents` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `placa` varchar(6) NOT NULL,
  `codigo_documento` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trigger_documents`
--

LOCK TABLES `trigger_documents` WRITE;
/*!40000 ALTER TABLE `trigger_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `trigger_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trigger_service`
--

DROP TABLE IF EXISTS `trigger_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trigger_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_service` int(10) NOT NULL,
  `placa` varchar(6) NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trigger_service`
--

LOCK TABLES `trigger_service` WRITE;
/*!40000 ALTER TABLE `trigger_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `trigger_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trigger_user`
--

DROP TABLE IF EXISTS `trigger_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trigger_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `document` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trigger_user`
--

LOCK TABLES `trigger_user` WRITE;
/*!40000 ALTER TABLE `trigger_user` DISABLE KEYS */;
INSERT INTO `trigger_user` VALUES (12,1201020100,'$2y$15$FvGV8omlVfgr4SX/v3SupOAY86pjpt49SYqQhgEPMMigERrRJM3I6','2023-08-03 00:15:35'),(13,1202030202,'$2y$15$buVqU7RJdrmdAI/9EWauSeuSXn60Zvf9qL4XceUNJJ6SbTZ9d8aY2','2023-08-03 00:16:12'),(14,1202030202,'$2y$15$buVqU7RJdrmdAI/9EWauSeuSXn60Zvf9qL4XceUNJJ6SbTZ9d8aY2','2023-08-03 00:16:39'),(15,1220202020,'$2y$15$tAGJonNEUsP5kH.cdOJDQe9x2j0rRDaMkYfsh0LlLR7I.TUYXJ1Ae','2023-08-03 00:18:52');
/*!40000 ALTER TABLE `trigger_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_user`
--

DROP TABLE IF EXISTS `type_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_user` (
  `id_type_user` int(2) NOT NULL AUTO_INCREMENT,
  `type_user` text NOT NULL,
  PRIMARY KEY (`id_type_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_user`
--

LOCK TABLES `type_user` WRITE;
/*!40000 ALTER TABLE `type_user` DISABLE KEYS */;
INSERT INTO `type_user` VALUES (1,'admin'),(2,'trabajador'),(3,'cliente');
/*!40000 ALTER TABLE `type_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `document` int(10) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_user` date NOT NULL,
  `id_type_user` int(2) NOT NULL,
  `id_gender` int(2) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `id_state` int(2) NOT NULL,
  `datetime_reg` datetime NOT NULL,
  `confirmacion` int(2) NOT NULL,
  PRIMARY KEY (`document`),
  KEY `id_gender` (`id_gender`),
  KEY `user_ibfk_3` (`id_state`),
  KEY `user_ibfk_4` (`id_type_user`),
  KEY `user_ibfk_6` (`confirmacion`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_gender`) REFERENCES `gender` (`id_gender`) ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_4` FOREIGN KEY (`id_type_user`) REFERENCES `type_user` (`id_type_user`) ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_5` FOREIGN KEY (`id_state`) REFERENCES `state` (`id_state`) ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_6` FOREIGN KEY (`confirmacion`) REFERENCES `terminos` (`id_terminos`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1202021,'carlos','benitez','3105678901','benitez12@misena.edu.co','2005-05-07',2,1,'$2y$15$hqp8akQotlbHPvrwzlhcCekW.ohZXBEGxzcpRS77poKyThWQSzTvS','benitez212',1,'2023-05-11 08:34:23',1),(1110460410,'luis','garcia','3213301955','lamunoz0140@misena.edu.co','2005-12-17',1,1,'$2y$15$hrY7R.B/eaCrO91jIBsiEOUKad6X/yF1CrrKRupTjs0uagsq/PymK','siferapp20',1,'2023-05-11 15:35:23',1),(1201020100,'Juan','Garcia','3201020102','ldlslsl@xn--gmai-jqa.com','2023-07-20',3,1,'$2y$15$FvGV8omlVfgr4SX/v3SupOAY86pjpt49SYqQhgEPMMigERrRJM3I6','Juan23',1,'0000-00-00 00:00:00',1),(1202030202,'Daniel','Aristizabal','3203020201','daniel@gmail.com','2005-08-02',3,1,'$2y$15$buVqU7RJdrmdAI/9EWauSeuSXn60Zvf9qL4XceUNJJ6SbTZ9d8aY2','aristizaba',1,'0000-00-00 00:00:00',1),(1220202020,'Esteban ','Alvarez','3222203020','esteban@gmail.com','2005-07-31',3,1,'$2y$15$tAGJonNEUsP5kH.cdOJDQe9x2j0rRDaMkYfsh0LlLR7I.TUYXJ1Ae','alvarez230',1,'2023-08-02 13:06:07',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `user_password` BEFORE UPDATE ON `user` FOR EACH ROW INSERT INTO trigger_user(document,password,fecha_registro)VALUES(OLD.document,OLD.password,NOW()) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `document` int(10) NOT NULL,
  `placa` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `total` decimal(7,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_ibfk_1` (`document`),
  KEY `ventas_ibfk_2` (`placa`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`document`) REFERENCES `user` (`document`) ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`placa`) REFERENCES `motorcycles` (`placa`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-03  0:22:17
