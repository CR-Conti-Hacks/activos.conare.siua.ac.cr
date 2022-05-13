-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bd_sis_inventario_tmp
-- ------------------------------------------------------
-- Server version	5.6.30-0ubuntu0.15.10.1

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
-- Table structure for table `tab_Activos`
--

DROP TABLE IF EXISTS `tab_Activos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_Activos` (
  `Id_Act` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Zonas_tmp_Act` int(11) NOT NULL,
  `Id_INS_Act` varchar(45) DEFAULT NULL,
  `Id_UGIT_Act` varchar(45) DEFAULT NULL,
  `Fecha_Recepcion_Act` date DEFAULT NULL,
  `Nombre_Act` varchar(200) DEFAULT NULL,
  `Foto_Act` varchar(60) DEFAULT NULL,
  `Costo_Act` varchar(100) DEFAULT NULL,
  `Desecho_Act` tinyint(1) DEFAULT NULL,
  `Descripcion_Dese_Act` blob,
  `Donacion_Act` tinyint(1) DEFAULT NULL,
  `Descripcion_Dona_Act` blob,
  `Verificado_Act` tinyint(1) DEFAULT NULL,
  `Numero_Serie_Act` varchar(150) DEFAULT NULL,
  `Marca_Act` varchar(150) DEFAULT NULL,
  `Modelo_Act` varchar(150) DEFAULT NULL,
  `Color_Act` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Id_Act`),
  KEY `fk_tab_Activos_tab_zonas1_idx` (`Id_Zonas_tmp_Act`),
  CONSTRAINT `fk_tab_Activos_tab_zonas1` FOREIGN KEY (`Id_Zonas_tmp_Act`) REFERENCES `tab_zonas_tmp` (`Id_Zonas_tmp`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_Activos`
--

LOCK TABLES `tab_Activos` WRITE;
/*!40000 ALTER TABLE `tab_Activos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_Activos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_activos_x_factura`
--

DROP TABLE IF EXISTS `tab_activos_x_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_activos_x_factura` (
  `Id_Factu_AXF` int(11) NOT NULL,
  `Id_Act_AXF` int(11) NOT NULL,
  PRIMARY KEY (`Id_Factu_AXF`,`Id_Act_AXF`),
  KEY `fk_tab_facturas_has_tab_Activos_tab_Activos1_idx` (`Id_Act_AXF`),
  KEY `fk_tab_facturas_has_tab_Activos_tab_facturas1_idx` (`Id_Factu_AXF`),
  CONSTRAINT `fk_tab_facturas_has_tab_Activos_tab_Activos1` FOREIGN KEY (`Id_Act_AXF`) REFERENCES `tab_Activos` (`Id_Act`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_facturas_has_tab_Activos_tab_facturas1` FOREIGN KEY (`Id_Factu_AXF`) REFERENCES `tab_facturas` (`Id_Factu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_activos_x_factura`
--

LOCK TABLES `tab_activos_x_factura` WRITE;
/*!40000 ALTER TABLE `tab_activos_x_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_activos_x_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_bitacora`
--

DROP TABLE IF EXISTS `tab_bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_bitacora` (
  `Id_Bita` bigint(19) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de la bitacora',
  `Id_Per_Usu_Bita` int(10) unsigned NOT NULL,
  `Fecha_Bita` varchar(30) DEFAULT NULL COMMENT 'Fecha en la que se hizo la transacciÃ³n',
  `SQL_Bita` blob COMMENT 'SQL que se ejecuto',
  PRIMARY KEY (`Id_Bita`),
  KEY `fk_tab_bitacora_tab_usuarios1_idx` (`Id_Per_Usu_Bita`),
  CONSTRAINT `fk_tab_bitacora_tab_usuarios1` FOREIGN KEY (`Id_Per_Usu_Bita`) REFERENCES `tab_usuarios` (`Id_Per_Usu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_bitacora`
--

LOCK TABLES `tab_bitacora` WRITE;
/*!40000 ALTER TABLE `tab_bitacora` DISABLE KEYS */;
INSERT INTO `tab_bitacora` VALUES (83,3,'27/04/2016 09:42:43','UPDATE tab_configuracion SET\n						Logo_Empresa_Conf=\'FigCONARE_transparentei.png\'\n					WHERE Id_Conf=1'),(84,3,'27/04/2016 09:48:28','UPDATE tab_configuracion SET\n						Logo_Empresa_Conf=\'logo.png\'\n					WHERE Id_Conf=1'),(85,3,'27/04/2016 14:57:14','INSERT INTO tab_roles (Nombre_Rol,Activo_Rol) VALUES (\'Alejandra\',\'1\')');
/*!40000 ALTER TABLE `tab_bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_cantones`
--

DROP TABLE IF EXISTS `tab_cantones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_cantones` (
  `Id_Can` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de canton',
  `Id_Pro_Can` mediumint(8) unsigned NOT NULL COMMENT 'Id de la provincia a la que pertene el canton',
  `Nombre_Can` varchar(60) DEFAULT NULL COMMENT 'Nombre del cantÃ³n',
  `Bandera_Peq_Can` varchar(40) DEFAULT NULL,
  `Bandera_Gra_Can` varchar(40) DEFAULT NULL,
  `Latitud_Can` varchar(20) DEFAULT NULL,
  `Longitud_Can` varchar(20) DEFAULT NULL,
  `Activo_Can` char(1) DEFAULT NULL COMMENT '1=activo\n0=inactivo\n',
  PRIMARY KEY (`Id_Can`),
  KEY `fk_tab_canton_tab_provincia1_idx` (`Id_Pro_Can`),
  CONSTRAINT `fk_tab_canton_tab_provincia1` FOREIGN KEY (`Id_Pro_Can`) REFERENCES `tab_provincias` (`Id_Pro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_cantones`
--

LOCK TABLES `tab_cantones` WRITE;
/*!40000 ALTER TABLE `tab_cantones` DISABLE KEYS */;
INSERT INTO `tab_cantones` VALUES (1,1,'San José','canton_san_jose.png','g_canton_san_jose.png','9.940929','-84.106307','1'),(2,1,'Escazú','canton_escazu.png','g_canton_escazu.png','9.920531','-84.145022','1'),(3,1,'Desamparados','canton_desamparados.png','g_canton_desamparados.png','9.896947','-84.062415','1'),(4,1,'Puriscal',NULL,NULL,'9.825355','-84.352684','1'),(5,1,'Tarrazú','canton_tarrazu.png','g_canton_tarrazu.png','9.621045','-84.049723','1'),(6,1,'Aserrí',NULL,NULL,'9.865519','-84.092475','1'),(7,1,'Mora','canton_mora.jpg','g_canton_mora.jpg','9.925575','-84.241126','1'),(8,1,'Goicoechea','canton_goicoechea.png','g_canton_goicoechea.png','9.960798','-83.979908','1'),(9,1,'Santa Ana','','','9.926805','-84.181435','1'),(10,1,'Alajuelita',NULL,NULL,'9.889867','-84.104655','1'),(11,1,'Vásquez de Coronado','canton_vasquez_de_coronado.png','g_canton_vasquez_de_coronado.png','9.987626','-83.986917','1'),(12,1,'Acosta','canton_acosta.png','g_canton_acosta.png','9.801394','-84.159534','1'),(13,1,'Tibás','canton_tibas.png','g_canton_tibas.png','9.958111','-84.079895','1'),(14,1,'Moravia',NULL,NULL,'9.985273','-84.030591','1'),(15,1,'Montes de Oca','canton_montes_de_oca.png','g_canton_montes_de_oca.png','9.942490','-84.016314','1'),(16,1,'Turrubares','canton_turrubares.png','g_canton_turrubares.png','9.762741','-84.504374','1'),(17,1,'Dota','canton_de_dota.png','g_canton_de_dota.png','9.582750','-83.924045','1'),(18,1,'Curridabat','canton_curridabat.png','g_canton_curridabat.png','9.914930','-84.032863','1'),(19,1,'Pérez Zeledón',NULL,NULL,'9.321398','-83.651276','1'),(20,1,'León Cortés Castro','','','9.683242','-84.066671','1'),(21,2,'Alajuela',NULL,NULL,'10.021834','-84.205984','1'),(22,2,'San Ramón','canton_san_ramon.png','g_canton_san_ramon.png','10.091086','-84.469090','1'),(23,2,'Grecia','canton_grecia.jpg','g_canton_grecia.jpg','10.073992','-84.314117','1'),(24,2,'San Mateo',NULL,NULL,'9.940953','-84.527264','1'),(25,2,'Atenas','','','9.978445','-84.373455','1'),(26,2,'Naranjo','','','10.096738','-84.384981','1'),(27,2,'Palmares','canton_palmares.png','g_canton_palmares.png','10.060929','-84.438685','1'),(28,2,'Poás','canton_poas.png','g_canton_poas.png','10.099798','-84.244194','1'),(29,2,'Orotina','','','9.918696','-84.527221','1'),(30,2,'San Carlos','canton_san_carlos.png','g_canton_san_carlos.png','10.582810','-84.439158','1'),(31,2,'Zarcero','canton_zarcero.png','g_canton_zarcero.png','10.186451','-84.391639','1'),(32,2,'Valverde Vega','canton_valverde_vega.png','g_canton_valverde_vega.png','10.181281','-84.309769','1'),(33,2,'Upala','canton_upala.png','g_canton_upala.png','10.897790','-85.015200','1'),(34,2,'Los Chiles','canton_los_chiles.png','g_canton_los_chiles.png','11.033458','-84.703002','1'),(35,2,'Guatuso','','','10.684353','-84.849129','1'),(36,3,'Cartago','canton_cartago.png','g_canton_cartago.png','9.863552','-83.915491','1'),(37,3,'Paraíso','','','9.837995','-83.870794','1'),(38,3,'La Unión','canton_la_union.gif','g_canton_la_union.gif','9.907694','-83.987143','1'),(39,3,'Jiménez','','','10.166695','-83.768367','1'),(40,3,'Turrialba','canton_turrialba.png','g_canton_turrialba.png','9.907662','-83.673334','1'),(41,3,'Alvarado','canton_alvarado.png','g_canton_alvarado.png','9.914734','-83.806868','1'),(42,3,'Oreamuno','','','9.868554','-83.903386','1'),(43,3,'El Guarco','','','9.845073','-83.945219','1'),(44,4,'Heredia','','','9.997921','-84.119910','1'),(45,4,'Barva','','','10.018987','-84.123236','1'),(46,4,'Santo Domingo','canton_santo_domingo.png','g_canton_santo_domingo.png','9.980747','-84.090525','1'),(47,4,'Santa Bárbara','canton_santa_barbara.png','g_canton_santa_barbara.png','10.042612','-84.157742','1'),(48,4,'San Rafael','canton_san_rafael','g_canton_san_rafael.png','10.014769','-84.099656','1'),(49,4,'San Isidro','','','10.017183','-84.056010','1'),(50,4,'Belén','canton_belen.png','g_canton_belen.png','9.982359','-84.176715','1'),(51,4,'Flores','','','10.005600','-84.157290','1'),(52,4,'San Pablo','','','9.999836','-84.084989','1'),(53,4,'Sarapiquí','','','10.456353','-84.022064','1'),(54,5,'Limón',NULL,NULL,'9.992154','-83.040983','1'),(55,5,'Pococí','canton_pococi.png','g_canton_pococi.png','10.474345','-83.694921','1'),(56,5,'Siquirres','canton_siquirres.png','g_canton_siquirres.png','10.098272','-83.509829','1'),(57,5,'Talamanca','','','9.625911','-82.850506','1'),(58,5,'Matina','','','10.076984','-83.290937','1'),(59,5,'Guácimo','','','10.212721','-83.685931','1'),(60,6,'Liberia','canton_liberia.png','g_canton_liberia.png','10.634647','-85.441232','1'),(61,6,'Nicoya','canton_nicoya.png','canton_nicoya.png','10.143953','-85.455833','1'),(62,6,'Santa Cruz','canton_santa_cruz.png','g_canton_santa_cruz.png','10.264782','-85.582919','1'),(63,6,'Bagaces','','','10.525114','-85.253746','1'),(64,6,'Carrillo','','','10.447056','-85.550278','1'),(65,6,'Cañas','canton_canas.png','g_canton_canas.png','10.428075','-85.093006','1'),(66,6,'Abangares','','','10.280617','-84.959616','1'),(67,6,'Tilarán','canton_tilaran.png','g_canton_tilaran.png','10.470435','-84.967940','1'),(68,6,'Nandayure','','','9.994667','-85.252663','1'),(69,6,'La Cruz','','','11.074283','-85.634639','1'),(70,6,'Hojancha','','','10.057602','-85.420594','1'),(71,7,'Puntarenas','','','9.977996','-84.829281','1'),(72,7,'Esparza','canton_esparza.png','g_canton_esparza.png','9.990104','-84.666930','1'),(73,7,'Buenos Aires','canton_buenos_aires.png','g_ canton_buenos_aires.png','9.167284','-83.331642','1'),(74,7,'Montes de Oro','','','10.083387','-84.729706','1'),(75,7,'Osa','canton_osa.jpg','g_canton_osa.jpg','8.563631','-83.471932','1'),(76,7,'Quepos','','','9.429979','-84.125449','1'),(77,7,'Golfito','','','8.612073','-83.136248','1'),(78,7,'Coto Brus','canton_coto_brus.png','g_canton_coto_brus.png','8.953866','-83.073056','1'),(79,7,'Parrita','','','9.518505','-84.330207','1'),(80,7,'Corredores','','','8.568941','-82.934426','1'),(81,7,'Garabito','canton_garabito.png','g_canton_garabito.png','9.625828','-84.620209','1');
/*!40000 ALTER TABLE `tab_cantones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_carreras`
--

DROP TABLE IF EXISTS `tab_carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_carreras` (
  `Id_Car` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la carrera',
  `Id_Esc_Car` int(11) NOT NULL,
  `Nombre_Car` varchar(300) DEFAULT NULL COMMENT 'Nombre de la carrera',
  `Codigo_Car` varchar(45) DEFAULT NULL COMMENT 'Codigo de la carrera',
  `Diminutivo_Car` varchar(45) DEFAULT NULL COMMENT 'Diminutivo de la carrera',
  `Telefono_Car` varchar(9) DEFAULT NULL COMMENT 'Telefono de la carrera',
  `Fax_Car` varchar(9) DEFAULT NULL COMMENT 'Fax de la carrera',
  `Correo_Car` varchar(100) DEFAULT NULL,
  `Activo_Car` char(1) DEFAULT NULL COMMENT '1=activo\n0=inactivo',
  PRIMARY KEY (`Id_Car`),
  KEY `fk_tab_carreras_tab_escuelas1_idx` (`Id_Esc_Car`),
  CONSTRAINT `fk_tab_carreras_tab_escuelas1` FOREIGN KEY (`Id_Esc_Car`) REFERENCES `tab_escuelas` (`Id_Esc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_carreras`
--

LOCK TABLES `tab_carreras` WRITE;
/*!40000 ALTER TABLE `tab_carreras` DISABLE KEYS */;
INSERT INTO `tab_carreras` VALUES (1,1,'Bachillerato en Ingeniería en Sistemas de Información','','BACINF','','','','1'),(2,1,'Licenciatura en Ingeniería en Sistemas de Información',NULL,'LICINF',NULL,NULL,NULL,'1'),(3,6,'Bachillerato en Química Industrial','','BACQUI','',NULL,NULL,'1'),(4,2,'Bachillerato en Administración',NULL,'BACADM','','','','1'),(5,3,'Bachillerato en Ingles con Salida Lateral en Diplomado',NULL,'BACING','',NULL,NULL,'1'),(6,4,'Bachillerato en Ingeniería en Computación',NULL,'BACIC','',NULL,NULL,'1'),(7,5,'Bachillerato en Ingeniería Industrial','','BACIND',NULL,NULL,NULL,'1'),(8,5,'Licenciatura en Ingeniería Industrial',NULL,'LICIND',NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `tab_carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_centros_trabajos`
--

DROP TABLE IF EXISTS `tab_centros_trabajos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_centros_trabajos` (
  `Id_CT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del centro de trabajo',
  `Nombre_CT` varchar(200) DEFAULT NULL COMMENT 'Nombre del centro de trabajo',
  `Diminutivo_CT` varchar(45) DEFAULT NULL COMMENT 'Diminutivo del centro de trabajo',
  `Logo_CT` varchar(45) DEFAULT NULL COMMENT 'Logo del centro de trabajo',
  `Telefono_CT` varchar(9) DEFAULT NULL COMMENT 'Telefono del centro de trabajo',
  `Fax_CT` varchar(9) DEFAULT NULL COMMENT 'Fax del centro de trabajo',
  `Direccion_CT` blob,
  `Correo_CT` varchar(100) DEFAULT NULL COMMENT 'Correo del centro de trabajo',
  `Latitud_CT` varchar(20) DEFAULT NULL COMMENT 'Latitud del centro de trabajo',
  `Longitud_CT` varchar(20) DEFAULT NULL COMMENT 'Longitud centro de trabajo',
  `Activo_CT` char(1) DEFAULT NULL COMMENT '1=activo\n0=Inactivo\n',
  PRIMARY KEY (`Id_CT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_centros_trabajos`
--

LOCK TABLES `tab_centros_trabajos` WRITE;
/*!40000 ALTER TABLE `tab_centros_trabajos` DISABLE KEYS */;
INSERT INTO `tab_centros_trabajos` VALUES (1,'Sede Ineruniversitaria de Alajuela','SIUA','','24417246','',NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `tab_centros_trabajos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_compromisos`
--

DROP TABLE IF EXISTS `tab_compromisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_compromisos` (
  `Id_Compr` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_Compr` varchar(50) DEFAULT NULL,
  `Activo_Compr` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Compr`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_compromisos`
--

LOCK TABLES `tab_compromisos` WRITE;
/*!40000 ALTER TABLE `tab_compromisos` DISABLE KEYS */;
INSERT INTO `tab_compromisos` VALUES (1,'DESCONOCIDA','1'),(2,'CF-00012267','1'),(3,'CF-00012389','1'),(4,'CF-00012402','1'),(5,'CF-00012413','1'),(6,'CF-00012447','1'),(7,'CF-00012576','1'),(8,'CF-00012596','1'),(9,'CF-00012597','1'),(10,'CF-00012637','1'),(11,'CF-00012711','1'),(12,'CF-00012718','1'),(13,'CF-00012747','1'),(14,'CF-00012753','1'),(15,'CF-00012753','1'),(16,'CF-00012793','1'),(17,'CF-00012796','1'),(18,'CF-00012810','1'),(19,'CF-00012883','1'),(20,'CF-00012893','1'),(21,'CF-00012899','1'),(22,'CF-00012921','1'),(23,'CF-00012956','1'),(24,'CF-00012964','1'),(25,'CF-00013144','1'),(26,'CF-00013198','1'),(27,'CF-00013211','1'),(28,'CF-00013213','1'),(29,'CF-00013236','1'),(30,'CF-00013239','1'),(31,'CF-00013239','1'),(32,'CF-00013240','1'),(33,'CF-00013263','1'),(34,'CF-00013317','1'),(35,'CF-00013345','1'),(36,'CF-00013386','1'),(37,'CF-00013399','1'),(38,'CF-00013481','1'),(39,'CF-00013486','1'),(40,'CF-00013499','1'),(41,'CF-00013504','1'),(42,'CF-00013518','1'),(43,'CF-00013545','1'),(44,'CF-00013549','1'),(45,'CF-00013561','1'),(46,'CF-00013607','1'),(47,'CF-00013675','1'),(48,'CF-00013676','1'),(49,'CF-00013685','1'),(50,'CF-00013697','1'),(51,'CF-00013700','1'),(52,'CF-00013729','1'),(53,'CF-00013733','1'),(54,'CF-00013766','1'),(55,'CF-00013781','1'),(56,'CF-00013796','1'),(57,'CF-00013801','1'),(58,'CF-00013820','1'),(59,'CF-00013879','1'),(60,'CF-00013901','1'),(61,'CF-00013954','1'),(62,'CF-00013998','1'),(63,'CF-00013999','1'),(64,'CF-00014002','1'),(65,'CF-00014019','1'),(66,'CF-00014030','1'),(67,'CF-00014032','1');
/*!40000 ALTER TABLE `tab_compromisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_configuracion`
--

DROP TABLE IF EXISTS `tab_configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_configuracion` (
  `Id_Conf` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de la configuraciÃ³n',
  `Id_Pai_Conf` smallint(5) unsigned NOT NULL,
  `Nombre_Conf` varchar(200) DEFAULT NULL COMMENT 'Nombre del Sistema',
  `Titulo_Bienvenida_Conf` varchar(200) DEFAULT NULL COMMENT 'Titulo de Bienvenida del sistema',
  `Nombre_Resumen_Conf` varchar(20) DEFAULT NULL COMMENT 'Nombre resumen para el menu',
  `Quienes_Somos_Conf` blob COMMENT 'DescripciÃ³n de la empresa',
  `Direccion_Conf` varchar(200) DEFAULT NULL COMMENT 'DirecciÃ³n de la empresa			',
  `Telefono_Conf` varchar(16) DEFAULT NULL COMMENT 'Telefono de la empresa',
  `Email_Conf` varchar(60) DEFAULT NULL COMMENT 'Correo de la empresa',
  `Fax_Conf` varchar(16) DEFAULT NULL COMMENT 'Fax de la empresa',
  `Permitir_Inscripcion_Estu_Conf` tinyint(1) DEFAULT NULL COMMENT 'Habilitar la inscripciÃ³n de estudiantes',
  `Titulo_Inscripcion_Estu_Conf` varchar(250) DEFAULT NULL,
  `Id_Rol_Estu_Conf` smallint(5) unsigned DEFAULT NULL,
  `Id_PI_Estu_Conf` int(11) DEFAULT NULL,
  `Permitir_Inscripcion_Empr_Conf` tinyint(1) DEFAULT NULL COMMENT 'Permitir la inscripciÃ³n de Empresa',
  `Titulo_Inscripcion_Emp_Conf` varchar(160) DEFAULT NULL,
  `Id_Rol_Emp_Conf` smallint(5) unsigned DEFAULT NULL,
  `Id_PI_Emp_Conf` int(11) NOT NULL,
  `Permitir_Contacto_Rol_Conf` tinyint(1) DEFAULT NULL COMMENT 'Permitir contactar los usuriarios del sistema que tengan X Perfil',
  `Permitir_Desbloquear_Usuari_Conf` tinyint(1) DEFAULT NULL,
  `Permitir_Recordar_Contrasena_Conf` tinyint(1) DEFAULT NULL COMMENT 'Le permite al usuario recordar contraseÃ±a\n1=si\n0=no',
  `Enviar_Correo_Inscripcion_Conf` tinyint(1) DEFAULT NULL COMMENT '1=Envia Correo\n2=No Envia el Correo',
  `Id_PlanCor_Inscripcion_Conf` int(11) NOT NULL,
  `Nombre_Session_Conf` varchar(60) DEFAULT NULL COMMENT 'Nombre de session personalizado',
  `Tiempo_Session_Conf` varchar(45) DEFAULT NULL COMMENT 'Cuanto tiempo de inactividad tiene el usuario antes de sacarlo',
  `Direccion_Carpeta_Conf` varchar(200) DEFAULT NULL COMMENT 'DirecciÃ³n de la carpeta de los archivos del sistema dentro de WWW',
  `Direccion_Web_Conf` varchar(200) DEFAULT NULL COMMENT 'DirecciÃ³n web del sistema para seguridad',
  `LDAP_Conf` tinyint(1) DEFAULT NULL COMMENT 'Hacer conexion por servidor LDAP',
  `IP_LDAP_Conf` varchar(20) DEFAULT NULL COMMENT 'IP del servidor LDAP',
  `Cadena_LDAP_Conf` varchar(200) DEFAULT NULL COMMENT 'Cadena de conexiÃ³n LDAP',
  `Logo_Empresa_Conf` varchar(200) DEFAULT NULL COMMENT 'DirecciÃ³n del logo de la empresa',
  `Mostrar_Logo_Conf` tinyint(1) DEFAULT NULL COMMENT '1=Lo muestra\n0=No lo muestra',
  `Width_Logo_Conf` smallint(5) unsigned DEFAULT NULL COMMENT 'Ancho del logo',
  `Height_Logo_Conf` smallint(5) unsigned DEFAULT NULL COMMENT 'Alto del logo',
  `Cantidad_Registros_Conf` tinyint(3) unsigned DEFAULT NULL COMMENT 'Cantidad de registros que se presentaran por paginaciÃ³n',
  `Llave_Encriptacion_Conf` varchar(60) DEFAULT NULL COMMENT 'Palabra clave utilziada para encriptar la informacion',
  `Nivel_Ubicacion_Conf` char(1) DEFAULT NULL COMMENT 'Permite establecer la opcion de desbloquear un usuario',
  `Nombre_Empresa_Conf` varchar(150) DEFAULT NULL COMMENT 'Nombre de la Empresa',
  `Pedir_Fecha_Nacimiento` char(1) DEFAULT NULL,
  `Pedir_Grados_Academicos` char(1) DEFAULT NULL,
  `Direccion_Facebook_Conf` varchar(300) DEFAULT NULL COMMENT 'Direccion de Facebook',
  `Usuario_Facebook_Conf` varchar(60) DEFAULT NULL COMMENT 'Usuario de Facebook',
  `Password_Facebook_Conf` varchar(60) DEFAULT NULL COMMENT 'Contraseña de Facebook',
  `Direccion_Twitter_Conf` varchar(300) DEFAULT NULL COMMENT 'Direccion de Twitter',
  `Usuario_Twitter_Conf` varchar(60) DEFAULT NULL COMMENT 'Usuario de Twitter',
  `Password_Twitter_Conf` varchar(60) DEFAULT NULL COMMENT 'Contraseña de Twitter',
  `Direccion_GooglePlus_Conf` varchar(300) DEFAULT NULL COMMENT 'Direccion de Google Plus',
  `Usuario_GooglePlus_Conf` varchar(60) DEFAULT NULL COMMENT 'Usuario google plus',
  `Password_GooglePlus_Conf` varchar(60) DEFAULT NULL COMMENT 'Contraseña Google Plus',
  PRIMARY KEY (`Id_Conf`),
  KEY `fk_tab_configuracion_tab_paises1_idx` (`Id_Pai_Conf`),
  KEY `fk_tab_configuracion_tab_roles1_idx` (`Id_Rol_Estu_Conf`),
  KEY `fk_tab_configuracion_tab_roles2_idx` (`Id_Rol_Emp_Conf`),
  KEY `fk_tab_configuracion_tab_plantillas_inscripcion1_idx` (`Id_PI_Estu_Conf`),
  KEY `fk_tab_configuracion_tab_plantillas_inscripcion2_idx` (`Id_PI_Emp_Conf`),
  KEY `fk_tab_configuracion_tab_plantillas_correos1_idx` (`Id_PlanCor_Inscripcion_Conf`),
  CONSTRAINT `fk_tab_configuracion_tab_paises1` FOREIGN KEY (`Id_Pai_Conf`) REFERENCES `tab_paises` (`Id_Pai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_configuracion_tab_plantillas_correos1` FOREIGN KEY (`Id_PlanCor_Inscripcion_Conf`) REFERENCES `tab_plantillas_correos` (`Id_PlanCor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_configuracion_tab_plantillas_inscripcion1` FOREIGN KEY (`Id_PI_Estu_Conf`) REFERENCES `tab_plantillas_inscripcion` (`Id_PI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_configuracion_tab_plantillas_inscripcion2` FOREIGN KEY (`Id_PI_Emp_Conf`) REFERENCES `tab_plantillas_inscripcion` (`Id_PI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_configuracion_tab_roles1` FOREIGN KEY (`Id_Rol_Estu_Conf`) REFERENCES `tab_roles` (`Id_Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_configuracion_tab_roles2` FOREIGN KEY (`Id_Rol_Emp_Conf`) REFERENCES `tab_roles` (`Id_Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='tabla de configuración del sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_configuracion`
--

LOCK TABLES `tab_configuracion` WRITE;
/*!40000 ALTER TABLE `tab_configuracion` DISABLE KEYS */;
INSERT INTO `tab_configuracion` VALUES (1,51,'Sistema de inventario CONARE','Bienvenido al Sistema de Inventario de Activos  CONARE','SAE','Unidad de Gestión e Innovación Tecnológica,Sede Interuniversitaria de Alajuela estamos en alajuela universidad nacional','700mts Alajuela','2414-7247','interuniversitariadealajuela@gmail.com','2441-7246',1,'Inscripción Estudiante',5,2,1,'Titulo Empresa2',4,2,0,1,1,1,1,'SAE','36000','/Sistemas/SAE_INVENTARIO_TMP/','http://desarrollo.siua.ac.cr',0,NULL,'Configurar','logo.png',1,150,150,50,'SAE2016','4','Sede Interuniversitaria de Alajuela','1','1','https://www.facebook.com/InteruniversitariaAlajuela/','https://www.facebook.com/InteruniversitariaAlajuela/',NULL,'https://twitter.com/intersede','intersede','pass twitter','https://plus.google.com/+SiuaAcCrconare','interuniversitariadealajuela@gmail.com','pass google');
/*!40000 ALTER TABLE `tab_configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_control_modulos`
--

DROP TABLE IF EXISTS `tab_control_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_control_modulos` (
  `Id_Cont_Mod` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del modulo',
  `Descripcion_Cont_Mod` blob,
  `Nombre_Cont_Mod` varchar(200) DEFAULT NULL COMMENT 'Nombre del Modulo	',
  `Permiso_Inicial_Cont_Mod` int(11) DEFAULT NULL COMMENT 'Numero inicial de permisos',
  `Permiso_Final_Cont_Mod` int(11) DEFAULT NULL COMMENT 'Numero de permisos final',
  `Activo_Cont_Mod` char(1) DEFAULT NULL COMMENT '1=Modulo Activo\n0=Modulo Inactivo',
  PRIMARY KEY (`Id_Cont_Mod`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_control_modulos`
--

LOCK TABLES `tab_control_modulos` WRITE;
/*!40000 ALTER TABLE `tab_control_modulos` DISABLE KEYS */;
INSERT INTO `tab_control_modulos` VALUES (1,NULL,'Seguridad',1000,2999,'1'),(2,NULL,'Inventario',3000,5000,'1'),(3,NULL,'SMS',6000,8000,'1'),(4,NULL,'Bodega',9000,11000,'0'),(5,NULL,'SILVIL',12000,14000,'0'),(6,NULL,'SISCO',15000,17000,'0'),(7,NULL,'OCW',18000,20000,'1');
/*!40000 ALTER TABLE `tab_control_modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_correos`
--

DROP TABLE IF EXISTS `tab_correos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_correos` (
  `Id_Cor` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del correo electronico',
  `Id_Per_Cor` int(10) unsigned NOT NULL,
  `Correo_Cor` varchar(100) DEFAULT NULL COMMENT 'Correo electronico',
  `Notificacion_Cor` char(1) DEFAULT NULL COMMENT '1=El sistema lo utiliza para enviarle informacion\n0=No se utiliza solo consulta',
  `Publico_Cor` char(1) DEFAULT NULL COMMENT '1=El correo puede ser de caracter publico\n0=No lo es\n',
  PRIMARY KEY (`Id_Cor`),
  KEY `fk_tab_Correos_tab_personas1_idx` (`Id_Per_Cor`),
  CONSTRAINT `fk_tab_Correos_tab_personas1` FOREIGN KEY (`Id_Per_Cor`) REFERENCES `tab_personas` (`Id_Per`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_correos`
--

LOCK TABLES `tab_correos` WRITE;
/*!40000 ALTER TABLE `tab_correos` DISABLE KEYS */;
INSERT INTO `tab_correos` VALUES (139,55,'siu@conare.ac.cr','1','1');
/*!40000 ALTER TABLE `tab_correos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_derechos`
--

DROP TABLE IF EXISTS `tab_derechos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_derechos` (
  `Id_Der` int(10) unsigned NOT NULL,
  `Id_Cont_Mod_Der` int(10) unsigned NOT NULL,
  `Nombre_Der` varchar(200) DEFAULT NULL COMMENT 'Nombre clave del derecho',
  `Descripcion_Der` varchar(300) DEFAULT NULL COMMENT 'DescripciÃ³n amplia del derecho',
  `Pagina_Der` varchar(100) DEFAULT NULL COMMENT 'Pagina donde se aplica el derecho',
  `Modulo_Der` varchar(50) DEFAULT NULL COMMENT 'Nombre del modulo donde se aplica el derecho',
  `Submodulo_Der` varchar(50) DEFAULT NULL COMMENT 'Nombre del submodulo del derecho\n',
  PRIMARY KEY (`Id_Der`),
  KEY `fk_tab_derechos_tab_control_modulos1_idx` (`Id_Cont_Mod_Der`),
  CONSTRAINT `fk_tab_derechos_tab_control_modulos1` FOREIGN KEY (`Id_Cont_Mod_Der`) REFERENCES `tab_control_modulos` (`Id_Cont_Mod`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_derechos`
--

LOCK TABLES `tab_derechos` WRITE;
/*!40000 ALTER TABLE `tab_derechos` DISABLE KEYS */;
INSERT INTO `tab_derechos` VALUES (1000,1,'Inicio','Permiso de ingresar en menú inicio','Inicio.php','Inicio','Inicio'),(1001,1,'Configuración','Permiso de Ingresar a las configuraciones del sistema','Separador','Configuración','Configuración'),(1002,1,'Global','Permiso de Modificar la configuración global del sistema','Modulos/SAE/Configuracion/configuracion.php','Configuración','Global'),(1020,1,'Modulo seguridad','Permiso de ingresar en el modulo de seguridad','Separador','Seguridad','Seguridad'),(1030,1,'Submodulo perfiles','Permiso de ingresar al submodulo de perfiles','Separador','Seguridad','Perfiles'),(1031,1,'Agregar perfil','Permiso de agregar un nuevo perfil','Modulos/SAE/Perfiles/agr_perfiles.php','Seguridad','Perfiles'),(1032,1,'Consultar perfiles','Permiso de consultar perfiles','Modulos/SAE/Perfiles/con_perfiles.php','Seguridad','Perfiles'),(1033,1,'Modificar perfiles','Permiso de modificar un perfil','Modulos/SAE/Perfiles/mod_perfiles.php','Seguridad','Perfiles'),(1034,1,'Consultar derechos perfiles','Permiso de consultar los derechos asignados a un perfil','Modulos/SAE/Perfiles/con_derechos.php','Seguridad','Perfiles'),(1035,1,'Asignar derechos a un perfil','Permiso de asignar derechos, acciones o permisos a un perfil','Modulos/SAE/Perfiles/asig_derechos.php','Seguridad','Perfiles'),(1036,1,'Eliminar perfil','Permiso de eliminar un perfil del sistema','Modulos/SAE/Perfiles/eli_perfiles.php','Seguridad','Perfiles'),(1050,1,'Submodulo usuarios','Permiso de ingresar al submodulo de usuarios','Separador','Seguridad','Usuarios'),(1051,1,'Agregar usuarios','Permiso de agregar o modificar información de usuarios','****FALTA','Seguridad','Usuarios'),(1052,1,'Consultar usuarios','Permisos de consultar información de los usuarios','Modulos/SAE/Usuarios/con_usuarios.php','Seguridad','Usuarios'),(1053,1,'Consultar detalle de usuarios','Permiso de ampliar la información del usuario','Modulos/SAE/Personas/ajax_Detalle_Persona.php','Seguridad','Usuarios'),(1054,1,'Consultar estado de conexión del usuario','Permiso de consultar estado de conexión del usuario','Modulos/SAE/Usuarios/con_usuarios.php','Seguridad','Usuarios'),(1055,1,'Desconectar Usuario','Permiso de desconectar a un usuario','Modulos/SAE/Usuarios/desconectar_usuarios.php','Seguridad','Usuarios'),(1056,1,'Consultar el uso de cookies de usuario','Permiso de consultar el uso de cookies de usuario','Modulos/SAE/Usuarios/con_usuarios.php','Seguridad','Usuarios'),(1057,1,'Modificar usuario','Permiso de modificar usuarios','Modulos/SAE/Usuarios/mod_usuarios.php','Seguridad','Usuarios'),(1058,1,'Enviar Mensaje','Permiso de enviar un mensaje a un usuario','Modulos/SAE/Usuarios/enviar_mensaje_usuarios','Seguridad','Usuarios'),(1059,1,'Activar/Desactivar Usuarios','Permiso de activar o desactivar un usuario','****FALTA','Seguridad','Usuarios'),(1080,1,'Ingresar Control de Módulos','Permiso de Ingreso al Control de Módulos','Separador','Seguridad','Control de Módulos'),(1081,1,'Agregar módulo','Permiso de Agregar un nuevo Módulo','Modulos/SAE/Control_Modulos/agr_control_modulo.php','Seguridad','Control de Módulos'),(1082,1,'Consultar módulos','Permiso para Consultar un Módulo','Modulos/SAE/Control_Modulos/con_control_modulo.php','Seguridad','Control de Módulos'),(1083,1,'Modificar módulo','Permiso para Modificar un Módulo','Modulos/SAE/Control_Modulos/mod_control_modulo.php','Seguridad','Control de Módulos'),(1084,1,'Desactivar módulo','Permiso para Desactivar un Módulo','Modulos/SAE/Control_Modulos/eli_control_modulo.php','Seguridad','Control de Módulos'),(1100,1,'Actualizar mis datos','Permiso de modificar mis datos personales','****FALTA','Seguridad','Seguridad'),(1101,1,'Cambiar mi contraseña','Permiso de cambiar mi contraseña','****FALTA','Seguridad','Seguridad'),(1130,1,'Ingresar a Catálogos','Permiso de ingresar a catálogos','Separador','Catalogos','Catalogos'),(1131,1,'Ingresar a Grados Académicos','Permiso de ingresar a grados académicos','Separador','Catalogos','Grados Académicos'),(1132,1,'Agregar grado académico','Permiso de agregar grados académicos','Modulos/SAE/Catalogos/Grados_Academicos/agr_grados_academicos.php','Catalogos','Grados Académicos'),(1133,1,'Consultar grado académico','Permiso de consultar grados académicos','Modulos/SAE/Catalogos/Grados_Academicos/con_grados_academicos.php','Catalogos','Grados Académicos'),(1134,1,'Modificar grado académico','Permiso de modificar un grado académico','****FALTA','Catalogos','Grados Académicos'),(1135,1,'Eliminar grado académico','Permiso de eliminar un grado académico|','****FALTA','Catalogos','Grados Académicos'),(1150,1,'Ingresar a Tipos de Teléfonos','Permiso de ingresar a tipos de teléfonos','****FALTA','Catalogos','Tipos de Teléfonos'),(1151,1,'Agregar tipos de teléfonos','Permiso de agregar tipos de teléfonos','****FALTA','Catalogos','Tipos de Teléfonos'),(1152,1,'Consultar tipos de teléfonos','Permisos de consultar tipos de teléfonos','****FALTA','Catalogos','Tipos de Teléfonos'),(1153,1,'Modificar tipos de teléfonos','Permisos de modificar tipos de teléfonos','****FALTA','Catalogos','Tipos de Teléfonos'),(1154,1,'Eliminar tipos de teléfonos','Permisos de eliminar tipos de teléfonos','****FALTA','Catalogos','Tipos de Teléfonos'),(1170,1,'Ingresar a Centros de Trabajo','Permiso de Ingreso a Centros de Trabajo','Separador','Catalogos','Centros de Trabajo'),(1171,1,'Agregar centro de trabajo','Permiso de agregar centro de trabajo','****FALTA','Catalogos','Centros de Trabajo'),(1172,1,'Consultar centro de trabajo','Permiso de consultar centro de trabajo','****FALTA','Catalogos','Centros de Trabajo'),(1173,1,'Detalle centro de trabajo','Permiso de consultar detalle de centro de trabajo','****FALTA','Catalogos','Centros de Trabajo'),(1174,1,'Modificar centro de trabajo','Permiso de modificar centro de trabajos','****FALTA','Catalogos','Centros de Trabajo'),(1175,1,'Consultar mapa de centro de trabajo','Permiso de consultar mapa de centro de trabajo','****FALTA','Catalogos','Centros de Trabajo'),(1176,1,'Modificar mapa de centro de trabajo','Permiso de modificar mapa de centro de trabajo','****FALTA','Catalogos','Centros de Trabajo'),(1177,1,'Eliminar centro de trabajo','Permiso de eliminar centros de trabajo','****FALTA','Catalogos','Centros de Trabajo'),(1200,1,'Ingresar a Universidades','Permiso de Ingresar a Universidades','Separador','Catalogos','Universidades'),(1201,1,'Agregar universidad','Permiso de agregar una universidad','****FALTA','Catalogos','Universidades'),(1202,1,'Consultar universidad','Permiso de consultar universidades','****FALTA','Catalogos','Universidades'),(1203,1,'Detalle universidad','Permiso de ver detalle de universidad','****FALTA','Catalogos','Universidades'),(1204,1,'Modificar universidad','Permiso de modificar universidad','****FALTA','Catalogos','Universidades'),(1205,1,'Consultar mapa universidad','Permiso de consultar mapa a universidades','****FALTA','Catalogos','Universidades'),(1206,1,'Modificar mapa universidad','Permiso de modificar mapa a universidades','****FALTA','Catalogos','Universidades'),(1207,1,'Consultar personas por universidad','Permiso de consultar personas por universidad','****FALTA','Catalogos','Universidades'),(1208,1,'Admnistrar personas por universidad','Permiso de administrar personas por universidad','****FALTA','Catalogos','Universidades'),(1209,1,'Eliminar universidad','Permiso de eliminar universidades','****FALTA','Catalogos','Universidades'),(1240,1,'Ingreso a Zonas','Permiso de Ingresar a Zonas','Separador','Catalogos','Zonas'),(1241,1,'Agregar zona','Permiso de agregar zona','****FALTA','Catalogos','Zonas'),(1242,1,'Consultar zonas','Permiso de consultar zonas','****FALTA','Catalogos','Zonas'),(1243,1,'Detalle de zonas','Permiso de ver detalle de zona','****FALTA','Catalogos','Zonas'),(1244,1,'Modificar zona','Permiso de modificar zona','****FALTA','Catalogos','Zonas'),(1245,1,'Consultar personas por zona','Permiso de consultar personas por zona','****FALTA','Catalogos','Zonas'),(1246,1,'Administrar personas por zonas','Permiso de administrar personas por zona','****FALTA','Catalogos','Zonas'),(1247,1,'Consultar mapa zona','Permiso de consultar mapa de zona','****FALTA','Catalogos','Zonas'),(1248,1,'Modificar mapa zonas','Permiso de modificar mapa de zona','****FALTA','Catalogos','Zonas'),(1249,1,'Eliminar zona','Permiso de eliminar zona','****FALTA','Catalogos','Zonas'),(1270,1,'Ingreso a SubZonas','Permiso de Ingrezar a SubZonas','Separador','Catalogos','Subzonas'),(1271,1,'Agregar subzona','Permiso de agregar subzona','****FALTA','Catalogos','Subzonas'),(1272,1,'Consultar subzonas','Permiso de consultar subzonas','****FALTA','Catalogos','Subzonas'),(1273,1,'Detalle subzonas','Permiso de consultar el detalle de subzona','****FALTA','Catalogos','Subzonas'),(1274,1,'Modificar subzona','Permiso de modificar subzona','****FALTA','Catalogos','Subzonas'),(1275,1,'Consultar personas por subzona','Permiso de personas por subzona','****FALTA','Catalogos','Subzonas'),(1276,1,'Administrar personas por subzonas','Permiso de administrar personas por subzona','****FALTA','Catalogos','Subzonas'),(1277,1,'Consultar mapa de subzonas','Permiso de consultar mapa de una subzona','****FALTA','Catalogos','Subzonas'),(1278,1,'Modificar mapa de subzona','Permiso de modificar mapa de subzona','****FALTA','Catalogos','Subzonas'),(1279,1,'Eliminar subzona','Permiso de eliminar subzonas','****FALTA','Catalogos','Subzonas'),(1300,1,'Ingreso a Periodos','Permiso de ingresar al submodulo de periodos','****FALTA','Catalogos','Periodos'),(1301,1,'Agregar periodo','Permiso de agregar periodo','****FALTA','Catalogos','Periodos'),(1302,1,'Consultar periodos','Permiso de consultar periodos','****FALTA','Catalogos','Periodos'),(1304,1,'Modificar periodo','Permiso de modifricar un periodo','****FALTA','Catalogos','Periodos'),(1305,1,'Eliminar periodo','Permiso de eliminar un periodo','****FALTA','Catalogos','Periodos'),(1306,1,'Administrar cursos por periodos','Permiso de administrar cursos por periodo','****FALTA','Catalogos','Periodos'),(1330,1,'Ingreso a Escuelas','Permiso de ingresar al submodulo de escuelas','****FALTA','Catalogos','Escuelas'),(1331,1,'Agregar escuela','Permiso de agregar una escuela','****FALTA','Catalogos','Escuelas'),(1332,1,'Consultar escuelas','Permiso de consultar escuelas','****FALTA','Catalogos','Escuelas'),(1333,1,'Detalle escuelas','Permiso de consultar el detalle de escuelas','****FALTA','Catalogos','Escuelas'),(1334,1,'Modificar escuela','Permiso de modificar una escuela','****FALTA','Catalogos','Escuelas'),(1335,1,'Consultar personas por escuelas','Permiso de consultar personas por escuelas','****FALTA','Catalogos','Escuelas'),(1336,1,'Administrar personas por escuelas','Permiso de administrar personas por escuelas','****FALTA','Catalogos','Escuelas'),(1337,1,'eliminar escuela','Permiso de eliminar escuela','****FALTA','Catalogos','Escuelas'),(1360,1,'Ingreso a Carreras','Permiso de ingresar al submodulo de carreras','****FALTA','Catalogos','Carreras'),(1361,1,'Agregar carrera','Permiso de agregar una carrera','****FALTA','Catalogos','Carreras'),(1362,1,'Consultar carrera','Permiso de consultar carreras','****FALTA','Catalogos','Carreras'),(1364,1,'Detalle carrera','Permiso de consultar el detalle de carreras','****FALTA','Catalogos','Carreras'),(1365,1,'Modificar carrera','Permiso de modificar una carrera','****FALTA','Catalogos','Carreras'),(1366,1,'Consultar personas por carrera','Permiso de consultar personas por carrera','****FALTA','Catalogos','Carreras'),(1367,1,'Administrar personas por carrera','Permiso de administrar personas por carrera','****FALTA','Catalogos','Carreras'),(1368,1,'eliminar carrera','Permiso de eliminar carrera','****FALTA','Catalogos','Carreras'),(1390,1,'Ingreso a Cursos','Permiso de ingresar al submodulo de cursos','****FALTA','Catalogos','Cursos'),(1391,1,'Agregar curso','Permiso de agregar un curso','****FALTA','Catalogos','Cursos'),(1392,1,'Consultar cursos','Permiso de consultar cursos','****FALTA','Catalogos','Cursos'),(1394,1,'Modificar curso','Permiso de modificar un curso','****FALTA','Catalogos','Cursos'),(1395,1,'Consultar personas por curso','Permiso de consultar personas por curso','****FALTA','Catalogos','Cursos'),(1396,1,'Administrar personas por curso','Permiso de administrar personas por curso','****FALTA','Catalogos','Cursos'),(1397,1,'eliminar curso','Permiso de eliminar curso','****FALTA','Catalogos','Cursos'),(1420,1,'Ingreso a Grupos','Permiso de ingresar al submodulo de grupos','****FALTA','Catalogos','Grupos'),(1421,1,'Agregar grupo','Permiso de agregar un grupo','****FALTA','Catalogos','Grupos'),(1422,1,'Consultar grupos','Permiso de consultar grupos','****FALTA','Catalogos','Grupos'),(1423,1,'Modificar grupo','Permiso de modificar un grupo','****FALTA','Catalogos','Grupos'),(1424,1,'eliminar grupo','Permiso de eliminar grupo','****FALTA','Catalogos','Grupos'),(1445,1,'Ingreso a Paises','Permiso de ingresar al submodulo de paises','****FALTA','Catalogos','Países'),(1446,1,'Agregar pais','Permiso de agregar un pais','****FALTA','Catalogos','Países'),(1447,1,'Consultar pais','Permiso de consultar paises','****FALTA','Catalogos','Países'),(1448,1,'Consultar detalle pais','Permiso de consultar detalle de paises','****FALTA','Catalogos','Países'),(1449,1,'Modificar pais','Permiso de modificar un pais','****FALTA','Catalogos','Países'),(1450,1,'Consultar mapa pais','Permiso de consultar el mapa del pais','****FALTA','Catalogos','Países'),(1451,1,'Modificar mapa pais','Permiso de modificar el mapa del pais','****FALTA','Catalogos','Países'),(1452,1,'eliminar pais','Permiso de eliminar un pais','****FALTA','Catalogos','Países'),(1480,1,'Ingreso a Provincias','Permiso de ingresar al submodulo de provincias','****FALTA','Catalogos','Provincias'),(1481,1,'Agregar provincia','Permiso de agregar una provincia','****FALTA','Catalogos','Provincias'),(1482,1,'Consultar provincias','Permiso de consultar provincias','****FALTA','Catalogos','Provincias'),(1483,1,'Consultar detalle provincias','Permiso de consultar detalle de provincias','****FALTA','Catalogos','Provincias'),(1484,1,'Modificar provincia','Permiso de modificar una provincia','****FALTA','Catalogos','Provincias'),(1485,1,'Consultar mapa provincia','Permiso de consultar el mapa de una provincia','****FALTA','Catalogos','Provincias'),(1486,1,'Modificar mapa provincia','Permiso de modificar el mapa de una provincia','****FALTA','Catalogos','Provincias'),(1487,1,'eliminar provincia','Permiso de eliminar una provincia','****FALTA','Catalogos','Provincias'),(1510,1,'Ingreso a Cantones','Permiso de ingresar al submodulo de cantones','****FALTA','Catalogos','Cantones'),(1511,1,'Agregar cantón','Permiso de agregar un cantón','****FALTA','Catalogos','Cantones'),(1512,1,'Consultar cantones','Permiso de consultar cantones','****FALTA','Catalogos','Cantones'),(1513,1,'Consultar detalle cantones','Permiso de consultar detalle de cantones','****FALTA','Catalogos','Cantones'),(1514,1,'Modificar cantón','Permiso de modificar un cantón','****FALTA','Catalogos','Cantones'),(1515,1,'Consultar mapa cantón','Permiso de consultar el mapa de un cantón','****FALTA','Catalogos','Cantones'),(1516,1,'Modificar mapa cantón','Permiso de modificar el mapa de un cantón','****FALTA','Catalogos','Cantones'),(1517,1,'eliminar cantón','Permiso de eliminar un cantón','****FALTA','Catalogos','Cantones'),(1540,1,'Ingreso a Distritos','Permiso de ingresar al submodulo de distritos','****FALTA','Catalogos','Distritos'),(1541,1,'Agregar distritos','Permiso de agregar un distrito','****FALTA','Catalogos','Distritos'),(1542,1,'Consultar distritos','Permiso de consultar distritos','****FALTA','Catalogos','Distritos'),(1543,1,'Consultar detalle distritos','Permiso de consultar detalle de distrito','****FALTA','Catalogos','Distritos'),(1544,1,'Modificar distrito','Permiso de modificar un distrito','****FALTA','Catalogos','Distritos'),(1545,1,'Consultar mapa distrito','Permiso de consultar el mapa de un distrito','****FALTA','Catalogos','Distritos'),(1546,1,'Modificar mapa distrito','Permiso de modificar el mapa de un distrito','****FALTA','Catalogos','Distritos'),(1547,1,'eliminar distrito','Permiso de eliminar un distrito','****FALTA','Catalogos','Distritos'),(1570,1,'Ingreso a Preguntas Secretas','Permiso de ingresar al submodulo de Pregunta Secreta','****FALTA','Catalogos','Pregunta Secreta'),(1571,1,'Agregar pregunta secreta','Permiso de agregar una pregunta secreta','****FALTA','Catalogos','Pregunta Secreta'),(1572,1,'Consultar pregunta secreta','Permiso de consultar pregunta secreta','****FALTA','Catalogos','Pregunta Secreta'),(1573,1,'Modificar pregunta secreta','Permiso de modificar una pregunta secreta','****FALTA','Catalogos','Pregunta Secreta'),(1574,1,'eliminar pregunta secreta','Permiso de eliminar una pregunta secreta','****FALTA','Catalogos','Pregunta Secreta'),(1575,1,'Ingresar módulo Personas','Permiso de ingrear a administración de personas','Separador','Catalogos','Personas'),(1576,1,'Agregar personas','Permiso de agregar personas','***FALTA','Catalogos','Personas'),(1577,1,'Consultar personas','Permiso de consultar personas','****FALTA','Catalogos','Personas'),(1578,1,'Ver detalle Persona','Permiso de ver el detalle de persona','***FALTA','Catalogos','Personas'),(3000,2,'Ingresar a Inventario','Permiso de ingresar a inventario','Separador','Inventario','Inventario'),(3001,2,'Ingresar a zonas','Permiso de ingresar a zonas','Separador','Inventario','Zonas'),(3002,2,'Agregar Zonas','Permiso de agregar zonas','***FALTA','Inventario','Zonas'),(3003,2,'Consultar Zonas','Permiso de consultar zonas','***FALTA','Inventario','Zonas'),(3010,2,'Ingresar a transferencias','Permiso de ingresar a transferencias','****FALTA','Inventario','Transferencias'),(3011,2,'Agregar transferencia','Permiso de agregar transferencia','***FALTA','Inventario','Transferencias'),(3012,2,'Consultar transferencia','Permiso de consultar transferencia','****FALTA','Inventario','Transferencias'),(3020,2,'Ingresar a compromisos','Permiso de ingresar a compromisos','****FALTA','Inventario','Compromisos'),(3021,2,'Agregar compromisos','Permiso de agregar compromisos','****FALTA','Inventario','Compromisos'),(3022,2,'Consultar compromisos','Permiso de consultar compromisos','****FALTA','Inventario','Compromisos'),(3030,2,'Ingresar a Partidas','Permiso de ingresar a partidas','***FALTA','Inventario','Partidas'),(3031,2,'Agregar partidas','Permiso de ingresar a partidas','****FALTA','Inventario','Partidas'),(3032,2,'Consultar partidas','Permiso de consultar partidas','****FALTA','Inventario','Partidas'),(3040,2,'Ingresar a proveedores','Permiso de ingresar a proveedores','****FALTA','Inventario','Proveedores'),(3041,2,'Agregar proveedores','Permiso de agregar proveedores','****FALTA','Inventario','Proveedores'),(3042,2,'Consultar proveedores','Permiso de consultar proveedores','****FALTA','Inventario','Proveedores'),(3050,2,'Ingresar a ordenes de compras','Permiso de ingresar a ordenes de compras','****FALTA','Inventario','Ordenes de Compras'),(3051,2,'Agregar ordenes de compras','Permiso de agregar ordenes de compras','****FALTA','Inventario','Ordenes de Compras'),(3052,2,'Consultar ordenes de compras','Permiso de consultar ordenes de compras','****FALTA','Inventario','Ordenes de Compras');
/*!40000 ALTER TABLE `tab_derechos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_distritos`
--

DROP TABLE IF EXISTS `tab_distritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_distritos` (
  `Id_Dist` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del distrito\n',
  `Id_Can_Dist` mediumint(8) unsigned NOT NULL COMMENT 'Id del canton al que pertene el distrito',
  `Nombre_Dist` varchar(60) DEFAULT NULL COMMENT 'Nombre del distrito',
  `Bandera_Peq_Dist` varchar(40) DEFAULT NULL,
  `Bandera_Gra_Dist` varchar(40) DEFAULT NULL,
  `Latitud_Dist` varchar(20) DEFAULT NULL,
  `Longitud_Dist` varchar(20) DEFAULT NULL,
  `Activo_Dist` char(1) DEFAULT NULL COMMENT '1=activo\n0=inactivo',
  PRIMARY KEY (`Id_Dist`),
  KEY `fk_tab_distrito_tab_canton1_idx` (`Id_Can_Dist`),
  CONSTRAINT `fk_tab_distrito_tab_canton1` FOREIGN KEY (`Id_Can_Dist`) REFERENCES `tab_cantones` (`Id_Can`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=474 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_distritos`
--

LOCK TABLES `tab_distritos` WRITE;
/*!40000 ALTER TABLE `tab_distritos` DISABLE KEYS */;
INSERT INTO `tab_distritos` VALUES (1,1,'Carmen',NULL,NULL,'9.936492','-84.069754','1'),(2,1,'Merced','',NULL,'9.940549','-84.088925','1'),(3,1,'Hospital',NULL,NULL,'9.928731','-84.088967','1'),(4,1,'Catedral',NULL,NULL,'9.925001','-84.071772','1'),(5,1,'Zapote','','','9.920150','-84.055039','1'),(6,1,'San Francisco de Dos Ríos',NULL,NULL,'9.908010','-84.059730','1'),(7,1,'La Uruca','','','9.959172','-84.119277','1'),(8,1,'Mata Redonda','','','9.936094','-84.105720','1'),(9,1,'Pavas','','','9.948826','-84.134198','1'),(10,1,'Hatillo','','','9.918419','-84.102742','1'),(11,1,'San Sebastián','','','9.910764','-84.083171','1'),(12,2,'Escazú',NULL,NULL,'9.920709','-84.146383','1'),(13,2,'San Antonio','','','9.897968','-84.141880','1'),(14,2,'San Rafael','','','9.934668','-84.149373','1'),(15,3,'Desamparados','','','9.896947','-84.062415','1'),(16,3,'San Miguel','','','9.874209','-84.060607','1'),(17,3,'San Juan de Dios','','','9.877774','-84.085111','1'),(18,3,'San Rafael Arriba',NULL,NULL,'9.875703','-84.073323','1'),(19,3,'San Antonio','','','9.899311','-84.049313','1'),(20,3,'Frailes','','','9.751376','-84.054344','1'),(21,3,'Patarrá','','','9.884274','-84.031975','1'),(22,3,'San Cristóbal','','','9.75222','-84.0306','1'),(23,3,'Rosario','','','9.809656','-84.085572','1'),(24,3,'Damas','','','9.888396','-84.042756','1'),(25,3,'San Rafael Abajo',NULL,NULL,'9.895887','-84.083612','1'),(26,3,'Las Gravilias','','','9.893167','-84.058687','1'),(27,3,'Los Guido','','','9.868032','-84.048972','1'),(28,4,'Santiago','','','9.847135','-84.311834','1'),(29,4,'Mercedes Sur','','','9.825193','-84.355109','1'),(30,4,'Barbacoas','',NULL,'9.858384','-84.349145','1'),(31,4,'Grifo Alto','','','9.899854','-84.383092','1'),(32,4,'San Rafael','','','9.839507','-84.289783','1'),(33,4,'Candelarita','','','9.795663','-84.338046','1'),(34,4,'Desamparaditos','','','9.878323','-84.340041','1'),(35,4,'San Antonio','','','9.857527','-84.300616','1'),(36,4,'Chires','','','9.556102','-84.431767','1'),(37,5,'San Marcos','','','9.665047','-84.020541','1'),(38,5,'San Lorenzo','','','9.603443','-84.039423','1'),(39,5,'San Carlos','','','9.616645','-84.115298','1'),(40,6,'Aserrí','','','9.865350','-84.092239','1'),(41,6,'Tarbaca','','','9.811895','-84.116135','1'),(42,6,'Vuelta de Jorco','','','9.798426','-84.130897','1'),(43,6,'San Gabriel','','','9.787822','-84.107165','1'),(44,6,'La Legua','','','9.741149','-84.104723','1'),(45,6,'Monterrey','','','9.756049','-84.110379','1'),(46,6,'Salitrillos','','','9.852845','-84.094273','1'),(47,7,'Ciudad Colón','','','9.911573','-84.241020','1'),(48,7,'Guayabo','','','9.861409','-84.264243','1'),(49,7,'Tabarcia','','','9.851077','-84.225038','1'),(50,7,'Piedras Negras','','','9.910491','-84.321749','1'),(51,7,'Picagres','','','9.904962','-84.346547','1'),(52,7,'Jaris','','','9.870474','-84.285800','1'),(53,8,'Guadalupe','','','9.948228','-84.048478','1'),(54,8,'San Francisco','','','9.941972','-84.069936','1'),(55,8,'Calle Blancos','','','9.947214','-84.065645','1'),(56,8,'Mata de Plátano','','','9.952071','-84.020650','1'),(57,8,'Ipís','','','9.965408','-84.021866','1'),(58,8,'Rancho Redondo','','','9.961057','-83.951215','1'),(59,8,'Purral','','','9.962431','-84.007537','1'),(60,9,'Santa Ana','','','9.926805','-84.181435','1'),(61,9,'Salitral','','','9.908746','-84.179144','1'),(62,9,'Pozos','','','9.948760','-84.190705','1'),(63,9,'Uruca','','','9.934986','-84.194709','1'),(64,9,'Piedades','','','9.928304','-84.215689','1'),(65,9,'Brasil','','','9.939505','-84.227264','1'),(66,10,'Alajuelita','','','9.889867','-84.104655','1'),(67,10,'San Josecito','','','9.893220','-84.104810','1'),(68,10,'San Antonio','','','9.885795','-84.114182','1'),(69,10,'Concepción','','','9.890192','-84.088256','1'),(70,10,'San Felipe','','','9.901629','-84.105034','1'),(71,11,'San Isidro','','','9.974101','-84.008374','1'),(72,11,'San Rafael','','','9.981263','-83.988235','1'),(73,11,'Dulce Nombre de Jesús','','','9.982634','-84.014200','1'),(74,11,'Patalillo','','','9.975979','-84.024499','1'),(75,11,'Cascajal','','','10.006836','-83.957879','1'),(76,12,'San Ignacio','','','9.798435','-84.162192','1'),(77,12,'Guaitil','','','9.791767','-84.230010','1'),(78,12,'Palmichal','','','9.837763','-84.199792','1'),(79,12,'Cangrejal','','','9.764684','-84.220888','1'),(80,12,'Sabanillas','','','9.744138','-84.258849','1'),(81,13,'San Juan','','','9.963648','-84.077406','1'),(82,13,'Cinco Esquinas','','','9.946487','-84.082127','1'),(83,13,'Anselmo Llorente','','','9.955322','-84.067407','1'),(84,13,'León XIII','','','9.960225','-84.099894','1'),(85,13,'Colima','','','9.955510','-84.088486','1'),(86,14,'San Vicente','','','9.963029','-84.046450','1'),(87,14,'San Jerónimo','','','10.007230','-84.015144','1'),(88,14,'Trinidad','','','9.981309','-84.032461','1'),(89,15,'San Pedro','','','9.930310','-84.050572','1'),(90,15,'Sabanilla',NULL,NULL,'9.944942','-84.032621','1'),(91,15,'Mercedes','','','9.942321','-84.047728','1'),(92,15,'San Rafael','','','9.945618','-83.994427','1'),(93,16,'San Pablo','','','9.910964','-84.442205','1'),(94,16,'San Pedro','','','9.876133','-84.446184','1'),(95,16,'San Juan de Mata','','','9.878621','-84.523436','1'),(96,16,'San Luis','','','9.822610','-84.448997','1'),(97,16,'Carara','','','9.702351','-84.542162','1'),(98,17,'Santa María','','','9.548895','-83.981724','1'),(99,17,'El Jardín','','','9.702569','-83.961124','1'),(100,17,'Copey','','','9.559390','-83.912029','1'),(101,18,'Curridabat','','','9.913577','-84.038442','1'),(102,18,'Granadilla','','','9.929557','-84.018959','1'),(103,18,'Sánchez','','','9.913993','-84.020176','1'),(104,18,'Tirrases','','','9.901994','-84.023079','1'),(105,19,'San Isidro de El General','','','9.374922','-83.691788','1'),(106,19,'El General(Viejo)','','','9.371817','-83.661975','1'),(107,19,'Daniel Flores','','','9.329229','-83.671444','1'),(108,19,'Rivas','','','9.421665','-83.658829','1'),(109,19,'San Pedro','','','9.276148','-83.548705','1'),(110,19,'Platanares','','','9.232057','-83.641519','1'),(111,19,'Pejibaye','','','9.160775','-83.577805','1'),(112,19,'Cajón','','','9.290406','-83.581576','1'),(113,19,'Barú','','','9.275404','-83.812628','1'),(114,19,'Río Nuevo','','','9.419133','-83.794430','1'),(115,19,'Páramo','','','9.53333','-83.7167','1'),(116,20,'San Pablo','','','9.682804','-84.047741','1'),(117,20,'San Andrés','','','9.738871','-84.079884','1'),(118,20,'Llano Bonito','','','9.667282','-84.105492','1'),(119,20,'San Isidro','','','9.677859','-84.075108','1'),(120,20,'Santa Cruz','','','9.732745','-84.024970','1'),(121,20,'San Antonio','','','9.717918','-84.059685','1'),(122,21,'Alajuela','','','10.022484','-84.203972','1'),(123,21,'San José','','','10.497739','-84.524777','1'),(124,21,'Carrizal','','','10.087110','-84.170163','1'),(125,21,'San Antonio','','','10.114005','-84.417838','1'),(126,21,'Guácima','','','9.959590','-84.264101','1'),(127,21,'San Isidro','','','9.995139','-84.432254','1'),(128,21,'Sabanilla','','','10.074196','-84.215763','1'),(129,21,'San Rafael','','','9.969145','-84.214368','1'),(130,21,'Río Segundo','','','9.999526','-84.194469','1'),(131,21,'Desamparados','','','10.024336','-84.187590','1'),(132,21,'Turrúcares','','','9.955060','-84.317545','1'),(133,21,'Tambor','','','10.036141','-84.243781','1'),(134,21,'La Garita','','','9.982352','-84.329422','1'),(135,21,'Sarapiquí (San Miguel)','','','10.073866','-84.397399','1'),(136,22,'San Ramón','','','10.091086','-84.469090','1'),(137,22,'Santiago','','','10.064249','-84.486492','1'),(138,22,'San Juan','','','10.107768','-84.464807','1'),(139,22,'Piedades Norte','','','10.134130','-84.508409','1'),(140,22,'Piedades Sur','','','10.114950','-84.538021','1'),(141,22,'San Rafael','','','10.063657','-84.467725','1'),(142,22,'San Isidro','','','10.083178','-84.448585','1'),(143,22,'Ángeles','','','10.146550','-84.486522','1'),(144,22,'Alfaro','','','10.078868','-84.509525','1'),(145,22,'Volio','','','10.129821','-84.458370','1'),(146,22,'Concepción','','','10.121879','-84.439830','1'),(147,22,'Zapotal','','','10.159414','-84.652247','1'),(148,22,'Peñas Blancas','','','10.118158','-84.666545','1'),(149,23,'Grecia','','','10.073992','-84.314117','1'),(150,23,'San Isidro','','','10.114226','-84.270550','1'),(151,23,'San José','','','10.096176','-84.272831','1'),(152,23,'San Roque','','','10.096575','-84.301777','1'),(153,23,'Tacares','','','10.029081','-84.292088','1'),(154,23,'Río Cuarto','','','10.341562','-84.216454','1'),(155,23,'Puente de Piedra','','','10.047539','-84.316203','1'),(156,23,'Bolívar (San Luis)','','','10.130250','-84.307518','1'),(157,24,'San Mateo','','','9.940868','-84.528079','1'),(158,24,'Desmonte','','','9.959469','-84.472345','1'),(159,24,'Jesús María','','','9.958669','-84.590475','1'),(160,25,'Atenas','','','9.978445','-84.373455','1'),(161,25,'Jesús','','','9.970592','-84.434545','1'),(162,25,'Mercedes','','','9.985536','-84.402082','1'),(163,25,'San Isidro','','','9.995182','-84.433156','1'),(164,25,'Concepción','','','9.954774','-84.366374','1'),(165,25,'San José','','','10.017121','-84.402852','1'),(166,25,'Santa Eulalia','','','10.005455','-84.370174','1'),(167,25,'Escobal','','','9.939304','-84.421434','1'),(168,26,'Naranjo','','','10.096738','-84.384981','1'),(169,26,'San Miguel','','','10.073819','-84.398034','1'),(170,26,'San José','','','10.140407','-84.394833','1'),(171,26,'Cirrí Sur','','','10.117904','-84.367425','1'),(172,26,'San Jerónimo','','','10.108525','-84.364121','1'),(173,26,'San Juan','','','10.117043','-84.399494','1'),(174,26,'Rosario','','','10.048244','-84.379271','1'),(175,26,'Palmitos','','','10.093957','-84.423811','1'),(176,27,'Palmares','','','10.060929','-84.438685','1'),(177,27,'Zaragoza','','','10.039640','-84.422894','1'),(178,27,'Buenos Aires','','','10.070540','-84.435350','1'),(179,27,'Santiago','','','10.025885','-84.440360','1'),(180,27,'Candelaria','','','10.029594','-84.420952','1'),(181,27,'Esquipulas','','','10.061757','-84.419487','1'),(182,27,'La Granja','','','10.051523','-84.448213','1'),(183,28,'San Pedro',NULL,NULL,'10.076662','-84.244016','1'),(184,28,'San Juan','','','10.110385','-84.241036','1'),(185,28,'San Rafael',NULL,NULL,'10.091955','-84.255359','1'),(186,28,'Carrillos','','','10.034111','-84.267280','1'),(187,28,'Sabana Redonda','','','10.113975','-84.214368','1'),(188,29,'Orotina','','','9.918696','-84.527221','1'),(189,29,'Mastate','','','9.911905','-84.544703','1'),(190,29,'Hacienda Vieja','','','9.920144','-84.493339','1'),(191,29,'Coyolar','','','9.894071','-84.556189','1'),(192,29,'Ceiba','','','9.901854','-84.602074','1'),(193,30,'Quesada','','','10.324865','-84.422679','1'),(194,30,'Florencia','','','10.355938','-84.481730','1'),(195,30,'Buena Vista','','','10.277803','-84.449006','1'),(196,30,'Aguas Zarcas','','','10.376127','-84.356953','1'),(197,30,'Venecia','','','10.356511','-84.283110','1'),(198,30,'Pital','','','10.449137','-84.281230','1'),(199,30,'La Fortuna','','','10.469395','-84.656138','1'),(200,30,'La Tigra','','','10.346792','-84.584727','1'),(201,30,'La Palmera','','','10.420757','-84.382102','1'),(202,30,'Venado','','','10.556031','-84.754476','1'),(203,30,'Cutris',NULL,NULL,'10.765072','-84.388492','1'),(204,30,'Monterrey','','','10.537127','-84.658520','1'),(205,30,'Pocosol','','','10.620757','-84.528292','1'),(206,31,'Zarcero','','','10.186451','-84.391639','1'),(207,31,'Laguna','','','10.211795','-84.402348','1'),(208,31,'Tapezco',NULL,NULL,'10.222317','-84.405590','1'),(209,31,'Guadalupe','','','10.182578','-84.410472','1'),(210,31,'Palmira','','','10.211549','-84.380507','1'),(211,31,'Zapote','','','10.229325','-84.425483','1'),(212,31,'Brisas','','','10.229669','-84.395896','1'),(213,32,'Sarchí Norte','','','10.090026','-84.347643','1'),(214,32,'Sarchí Sur','','','10.084194','-84.339107','1'),(215,32,'Toro Amarillo','','','10.214176','-84.299853','1'),(216,32,'San Pedro','','','10.111933','-84.332679','1'),(217,32,'Rodríguez','','','10.103737','-84.354573','1'),(218,33,'Upala','','','10.897790','-85.015200','1'),(219,33,'Aguas Claras','','','10.814961','-85.180695','1'),(220,33,'San José (Pizote)','','','10.953371','-85.137255','1'),(221,33,'Bijagua','','','10.731186','-85.058854','1'),(222,33,'Delicias','','','10.956929','-85.034007','1'),(223,33,'Dos Ríos','','','10.896481','-85.381993','1'),(224,33,'Yolillal (San Isidro)',NULL,NULL,'10.830748','-84.667550','1'),(225,34,'Los Chiles','','','11.033458','-84.703002','1'),(226,34,'Caño Negro','','','10.921188','-84.786917','1'),(227,34,'El Amparo','','','10.850039','-84.700009','1'),(228,34,'San Jorge','','','10.716750','-84.684952','1'),(229,35,'San Rafael','','','10.669845','-84.820633','1'),(230,35,'Buena Vista','',NULL,'10.742356','-84.832493','1'),(231,35,'Cote','','','10.595981','-84.927428','1'),(232,35,'Katira','','','10.741363','-84.916763','1'),(233,36,'Oriental','','','9.861268','-83.919353','1'),(234,36,'Occidental','','','9.862925','-83.926991','1'),(235,36,'El Carmen','','','9.871839','-83.924674','1'),(236,36,'San Nicolás','','','9.890927','-83.938038','1'),(237,36,'Agua Caliente (San Francisco)','','','9.842100','-83.915974','1'),(238,36,'Guadalupe (Arenilla)','','','9.861945','-83.944587','1'),(239,36,'Corralillo','','','9.793658','-84.048770','1'),(240,36,'Tierra Blanca','','','9.915410','-83.893525','1'),(241,36,'Dulce Nombre','','','9.845624','-83.909654','1'),(242,36,'Llano Grande','','','9.941105','-83.909085','1'),(243,36,'Quebradilla','','','9.844270','-83.990366','1'),(244,37,'Paraíso','','','9.837995','-83.870794','1'),(245,37,'Santiago de Paraíso','','','9.869058','-83.799055','1'),(246,37,'Orosí','','','9.785073','-83.842067','1'),(247,37,'Cachí','','','9.825415','-83.802592','1'),(248,37,'Llanos de Santa Lucía','','','9.842888','-83.883831','1'),(249,38,'Tres Ríos','','','9.907694','-83.987143','1'),(250,38,'San Diego','','','9.901605','-84.002911','1'),(251,38,'San Juan','','','9.883075','-83.700457','1'),(252,38,'San Rafael','','','9.908234','-83.978934','1'),(253,38,'Concepción','','','9.923577','-83.993202','1'),(254,38,'Dulce Nombre','','','9.919570','-83.980794','1'),(255,38,'San Ramón','','','9.938334','-84.005859','1'),(256,38,'Río Azul','','','9.889117','-84.034088','1'),(257,39,'Juan Viñas','','','9.891253','-83.743796','1'),(258,39,'Tucurrique','','','9.853303','-83.721060','1'),(259,39,'Pejibaye','','','9.809665','-83.705132','1'),(260,40,'Turrialba','','','9.907662','-83.673334','1'),(261,40,'La Suiza','','','9.855575','-83.614283','1'),(262,40,'Peralta','','','9.967857','-83.609476','1'),(263,40,'Santa Cruz','','','9.966386','-83.732365','1'),(264,40,'Santa Teresita','','','9.976284','-83.647085','1'),(265,40,'Pavones','','','9.902263','-83.624327','1'),(266,40,'Tuis','','','9.839814','-83.581302','1'),(267,40,'Tayutic (Platanillo)','','','9.822390','-83.556388','1'),(268,40,'Santa Rosa','','','9.909196','-83.715881','1'),(269,40,'Tres Equis','','','9.958305','-83.571818','1'),(270,40,'La Isabel','','','9.919729','-83.676717','1'),(271,40,'Chirripó','','','9.794887','-83.401096','1'),(272,41,'Pacayas','','','9.914734','-83.806868','1'),(273,41,'Cervantes','','','9.886778','-83.807740','1'),(274,41,'Capellades','','','9.921533','-83.784835','1'),(275,42,'San Rafael','','','9.869476','-83.903627','1'),(276,42,'Cot','','','9.891799','-83.872392','1'),(277,42,'Potrero Cerrado','','','9.933650','-83.880728','1'),(278,42,'Cipreses','','','9.887623','-83.845468','1'),(279,42,'Santa Rosa','','','9.918210','-83.842164','1'),(280,43,'Tejar','','','9.845073','-83.945219','1'),(281,43,'San Isidro','','','9.828456','-83.961913','1'),(282,43,'Tobosi','','','9.835761','-83.986289','1'),(283,43,'Patio de Agua','','','9.787610','-84.011703','1'),(284,44,'Heredia','','','9.997916','-84.119505','1'),(285,44,'Mercedes','','','10.004197','-84.138694','1'),(286,44,'San Francisco','','','9.992860','-84.130019','1'),(287,44,'Ulloa','','','9.978925','-84.138134','1'),(288,44,'Vara Blanca','','','10.168565','-84.148943','1'),(289,45,'Barva','','','10.018987','-84.123236','1'),(290,45,'San Pedro','','','10.029312','-84.137998','1'),(291,45,'San Pablo','','','10.029239','-84.125737','1'),(292,45,'San Roque','','','10.014149','-84.138498','1'),(293,45,'Santa Lucía','','','10.019892','-84.113512','1'),(294,45,'San José de la Montaña','','','10.056442','-84.116408','1'),(295,46,'Santo Domingo','','','9.980747','-84.090525','1'),(296,46,'San Vicente','','','9.984331','-84.082256','1'),(297,46,'San Miguel','','','9.984713','-84.049900','1'),(298,46,'Paracito','','','10.002209','-84.025660','1'),(299,46,'Santo Tomás','','','9.981372','-84.075054','1'),(300,46,'Santa Rosa','','','9.972294','-84.101254','1'),(301,46,'Tures','','','9.993861','-84.055710','1'),(302,46,'Pará','','','10.007711','-84.029413','1'),(303,47,'Santa Bárbara','','','10.042612','-84.157742','1'),(304,47,'San Pedro','','','10.029303','-84.138094','1'),(305,47,'San Juan','','','10.018905','-84.161845','1'),(306,47,'Jesús','','','10.040771','-84.145324','1'),(307,47,'Santo Domingo','','','10.122173','-84.145609','1'),(308,47,'Purabá','','','10.053325','-84.165564','1'),(309,48,'San Rafael','','','10.014769','-84.099656','1'),(310,48,'San Josecito','','','10.016074','-84.104838','1'),(311,48,'Santiago','','','10.008623','-84.104548','1'),(312,48,'Ángeles','','','10.041038','-84.090278','1'),(313,48,'Concepción','','','10.029143','-84.068911','1'),(314,49,'San Isidro','','','10.017183','-84.056010','1'),(315,49,'San Josecito','','','10.030908','-84.038606','1'),(316,49,'Concepción','','','10.024521','-84.045837','1'),(317,49,'San Francisco','','','10.007282','-84.067483','1'),(318,50,'San Antonio','','','9.979781','-84.185513','1'),(319,50,'La Ribera','','','9.987981','-84.187616','1'),(320,50,'La Asunción','','','9.979485','-84.169677','1'),(321,51,'San Joaquín','','','10.005938','-84.156818','1'),(322,51,'Barrantes','','','10.015235','-84.151196','1'),(323,51,'Llorente','','','9.998753','-84.161625','1'),(324,52,'San Pablo','','','9.999836','-84.084989','1'),(325,52,'Rincón de Sabanilla','','','9.986227','-84.103271','1'),(326,53,'Puerto Viejo','','','10.456353','-84.022064','1'),(327,53,'La Virgen','','','10.399627','-84.127808','1'),(328,53,'Las Horquetas','','','10.335164','-83.950739','1'),(329,53,'Cureña','','','10.722730','-83.951426','1'),(330,54,'Limón','','','9.991868','-83.041414','1'),(331,54,'Valle La Estrella','','','9.742153','-82.938589','1'),(332,54,'Río Blanco','','','10.023947','-83.226575','1'),(333,54,'Matama','','','9.797377','-83.225298','1'),(334,55,'Guápiles','','','10.219014','-83.784184','1'),(335,55,'Jiménez','','','10.173059','-83.777318','1'),(336,55,'Rita','','','10.279826','-83.777318','1'),(337,55,'Roxana','','','10.405466','-83.615270','1'),(338,55,'Cariari','','','10.366765','-83.741030','1'),(339,55,'Colorado','','','10.683359','-83.716360','1'),(340,56,'Siquirres','','','10.098272','-83.509829','1'),(341,56,'Pacuarito','','','10.103125','-83.466498','1'),(342,56,'Florida','','','10.094633','-83.572252','1'),(343,56,'Germania','','','10.131249','-83.584017','1'),(344,56,'Cairo','','','10.122786','-83.534206','1'),(345,56,'Alegría','','','10.087261','-83.605257','1'),(346,57,'Bratsi (Bribri)',NULL,NULL,'9.625609','-82.851312','1'),(347,57,'Sixaola','','','9.507392','-82.614535','1'),(348,57,'Cahuita','','','9.734670','-82.845408','1'),(349,57,'Telire','','','9.561032','-83.310230','1'),(350,58,'Matina','','','10.076984','-83.290937','1'),(351,58,'Batán','','','10.083188','-83.338091','1'),(352,58,'Carrandi','','','10.030803','-83.208137','1'),(353,59,'Guácimo','','','10.213059','-83.689021','1'),(354,59,'Mercedes','','','10.184337','-83.623790','1'),(355,59,'Pocora','','','10.166427','-83.604907','1'),(356,59,'Río Jiménez','','','10.245831','-83.604564','1'),(357,59,'Duacarí','','','10.351490','-83.642016','1'),(358,60,'Liberia','','','10.634056','-85.441575','1'),(359,60,'Cañas Dulces','','','10.737012','-85.484604','1'),(360,60,'Mayorga',NULL,NULL,'10.847385','-85.470473','1'),(361,60,'Nacascolo','','','10.633073','-85.680992','1'),(362,60,'Curubandé',NULL,NULL,'10.719794','-85.410215','1'),(363,61,'Nicoya','','','10.143953','-85.455833','1'),(364,61,'Mansión','','','10.101264','-85.373784','1'),(365,61,'San Antonio','','','10.198791','-85.431217','1'),(366,61,'Quebrada Honda','','','10.185397','-85.296049','1'),(367,61,'Sámara','','','9.881990','-85.529872','1'),(368,61,'Nosara','','','9.980402','-85.651453','1'),(369,61,'Belén de Nosarita','','','10.029119','-85.503714','1'),(370,62,'Santa Cruz','','','10.264782','-85.582919','1'),(371,62,'Bolsón','','','10.355241','-85.459260','1'),(372,62,'27 de Abril','','','10.244344','-85.710589','1'),(373,62,'Tempate','','','10.412574','-85.715714','1'),(374,62,'Cartagena','','','10.385189','-85.671730','1'),(375,62,'Cuajiniquil','','','10.942156','-85.682473','1'),(376,62,'Diriá','','','10.162306','-85.583838','1'),(377,62,'Cabo Velas','','','10.354864','-85.853649','1'),(378,62,'Tamarindo','','','10.299217','-85.837198','1'),(379,63,'Bagaces','','','10.525114','-85.253746','1'),(380,63,'La Fortuna','','','10.675855','-85.201777','1'),(381,63,'Mogote','','','10.695574','-85.275362','1'),(382,63,'Río Naranjo','','','10.682734','-85.089971','1'),(383,64,'Filadelfia','','','10.444238','-85.552537','1'),(384,64,'Palmira',NULL,NULL,'10.515286','-85.573386','1'),(385,64,'Sardinal','','','10.516830','-85.648343','1'),(386,64,'Belén','','','10.406725','-85.589329','1'),(387,65,'Cañas','','','10.428075','-85.093006','1'),(388,65,'Palmira','','','10.545233','-85.088028','1'),(389,65,'San Miguel','','','10.354380','-85.078874','1'),(390,65,'Bebedero','','','10.370397','-85.197095','1'),(391,65,'Porozal','','','10.261781','-85.198208','1'),(392,66,'Las Juntas','','','10.280617','-84.959616','1'),(393,66,'Sierra','','','10.285172','-84.928225','1'),(394,66,'San Juan','','','10.262824','-84.946565','1'),(395,66,'Colorado','','','10.185715','-85.108542','1'),(396,67,'Tilarán','','','10.470435','-84.967940','1'),(397,67,'Quebrada Grande','','','10.431201','-84.946058','1'),(398,67,'Tronadora','','','10.500719','-84.922608','1'),(399,67,'Santa Rosa','','','10.463624','-85.011600','1'),(400,67,'Líbano','','','10.419678','-84.989095','1'),(401,67,'Tierras Morenas','','','10.566470','-85.025682','1'),(402,67,'Arenal','','','10.544455','-84.894486','1'),(403,68,'Carmona','','','9.995223','-85.251604','1'),(404,68,'Santa Rita','','','10.021488','-85.259355','1'),(405,68,'Zapotal','','','9.998945','-85.301607','1'),(406,68,'San Pablo','','','10.044490','-85.194906','1'),(407,68,'Porvenir','','','9.933389','-85.300110','1'),(408,68,'Bejuco','','','9.851426','-85.328836','1'),(409,69,'La Cruz','','','11.074283','-85.634639','1'),(410,69,'Santa Cecilia','','','11.060996','-85.412218','1'),(411,69,'La Garita','','','11.086692','-85.549116','1'),(412,69,'Santa Elena','','','10.884633','-85.787430','1'),(413,70,'Hojancha','','','10.057602','-85.420594','1'),(414,70,'Monte Romo','','','9.998465','-85.380462','1'),(415,70,'Puerto Carrillo','','','9.870483','-85.481747','1'),(416,70,'Huacas','','','10.021865','-85.363882','1'),(417,71,'Puntarenas','',NULL,'9.977779','-84.829581','1'),(418,71,'Pitahaya','','','10.062665','-84.835793','1'),(419,71,'Chomes','','','10.044265','-84.906480','1'),(420,71,'Lepanto','','','9.950643','-85.031648','1'),(421,71,'Paquera','','','9.821839','-84.939362','1'),(422,71,'Manzanillo','','','10.143391','-85.013827','1'),(423,71,'Guacimal','','','10.210076','-84.845902','1'),(424,71,'Barranca','','','10.010740','-84.705245','1'),(425,71,'Monteverde','','','10.306998','-84.810470','1'),(426,71,'Isla del Coco','','','5.532756','-87.066312','1'),(427,71,'Cóbano','','','9.682972','-85.112066','1'),(428,71,'Chacarita','','','9.986778','-84.770289','1'),(429,71,'Chira','','','10.107395','-85.158644','1'),(430,71,'Acapulco','','','10.149956','-84.867313','1'),(431,71,'El Roble','','','9.983624','-84.740996','1'),(432,71,'Arancibia','','','10.233263','-84.699578','1'),(433,72,'Espíritu Santo','','','9.990452','-84.666527','1'),(434,72,'San Juan Grande','','','9.970107','-84.660071','1'),(435,72,'Macacona','','','10.009402','-84.612257','1'),(436,72,'San Rafael','','','9.981956','-84.609027','1'),(437,72,'San Jerónimo','','','10.036622','-84.631544','1'),(438,73,'Buenos Aires','','','9.164205','-83.330317','1'),(439,73,'Volcán','','','9.202532','-83.459101','1'),(440,73,'Potrero Grande','','','9.014281','-83.175122','1'),(441,73,'Boruca','','','9.001532','-83.325870','1'),(442,73,'Pilas','','','9.083102','-83.437046','1'),(443,73,'Colinas','','','9.049331','-83.457050','1'),(444,73,'Chánguena','','','8.937559','-83.200900','1'),(445,73,'Biolley','','','9.034542','-83.041847','1'),(446,73,'Brunka','','','9.174091','-83.321757','1'),(447,74,'Miramar','','','10.083387','-84.729706','1'),(448,74,'La Unión','','','10.157507','-84.722611','1'),(449,74,'San Isidro','','','10.052973','-84.729609','1'),(450,75,'Cortés','','','8.968231','-83.522370','1'),(451,75,'Palmar','','','8.963097','-83.457493','1'),(452,75,'Sierpe','','','8.868935','-83.471010','1'),(453,75,'Bahía Ballena','','','9.156611','-83.755279','1'),(454,75,'Piedras Blancas','','','8.783860','-83.237749','1'),(455,76,'Quepos','','','9.429979','-84.125449','1'),(456,76,'Savegre','','','9.336440','-83.911300','1'),(457,76,'Naranjito','','','9.483881','-84.066632','1'),(458,77,'Golfito',NULL,NULL,'8.612073','-83.136248','1'),(459,77,'Puerto Jiménez','','','8.535768','-83.304841','1'),(460,77,'Guaycará','','','8.722463','-83.079482','1'),(461,77,'Pavón','','','8.388245','-83.137794','1'),(462,78,'San Vito','','','8.823264','-82.969802','1'),(463,78,'Sabalito','','','8.812316','-82.910257','1'),(464,78,'Aguabuena',NULL,NULL,'8.739876','-82.945160','1'),(465,78,'Limoncito','','','8.829385','-83.016858','1'),(466,78,'Pittier','','','9.059843','-82.938957','1'),(467,79,'Parrita','','','9.520815','-84.329094','1'),(468,80,'Corredor','','','8.568941','-82.934426','1'),(469,80,'La Cuesta','','','8.487411','-82.846698','1'),(470,80,'Paso Canoas','','','8.536397','-82.845610','1'),(471,80,'Laurel','','','8.443277','-82.910190','1'),(472,80,'Jacó','','','9.620291','-84.621666','1'),(473,80,'Tárcoles','','','9.773669','-84.629902','1');
/*!40000 ALTER TABLE `tab_distritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_escuelas`
--

DROP TABLE IF EXISTS `tab_escuelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_escuelas` (
  `Id_Esc` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Uni_Esc` int(11) NOT NULL,
  `Nombre_Esc` varchar(200) DEFAULT NULL,
  `Diminutivo_Esc` varchar(45) DEFAULT NULL,
  `Codigo_Esc` varchar(45) DEFAULT NULL,
  `Logo_Esc` varchar(45) DEFAULT NULL,
  `Telefono_Esc` varchar(9) DEFAULT NULL,
  `Fax_Esc` varchar(9) DEFAULT NULL,
  `Activo_Esc` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Esc`),
  KEY `fk_tab_escuelas_tab_universidades1_idx` (`Id_Uni_Esc`),
  CONSTRAINT `fk_tab_escuelas_tab_universidades1` FOREIGN KEY (`Id_Uni_Esc`) REFERENCES `tab_universidades` (`Id_Uni`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_escuelas`
--

LOCK TABLES `tab_escuelas` WRITE;
/*!40000 ALTER TABLE `tab_escuelas` DISABLE KEYS */;
INSERT INTO `tab_escuelas` VALUES (1,2,'Escuela de Informática','ESCINF',NULL,NULL,NULL,NULL,'1'),(2,2,'Escuela de Administración','IESTRA',NULL,NULL,NULL,NULL,'1'),(3,2,'Escuela de Literatura y Ciencias del Lenguaje','ELCL','',NULL,NULL,NULL,'1'),(4,5,'Escuela de Ingeniería en Computación','EIC',NULL,NULL,NULL,NULL,'1'),(5,4,'Escuela de Ciencias Exactas y Naturales','ECEN',NULL,NULL,'',NULL,'1'),(6,2,'Escuela de Química','EQ','','','','','1');
/*!40000 ALTER TABLE `tab_escuelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_facturas`
--

DROP TABLE IF EXISTS `tab_facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_facturas` (
  `Id_Factu` int(11) NOT NULL,
  `Id_Trans_Factu` int(11) DEFAULT NULL,
  `Numero_Factu` varchar(45) DEFAULT NULL,
  `Fecha_Factu` date DEFAULT NULL,
  PRIMARY KEY (`Id_Factu`),
  KEY `fk_tab_facturas_tab_transferencias1_idx` (`Id_Trans_Factu`),
  CONSTRAINT `fk_tab_facturas_tab_transferencias1` FOREIGN KEY (`Id_Trans_Factu`) REFERENCES `tab_transferencias` (`Id_Trans`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_facturas`
--

LOCK TABLES `tab_facturas` WRITE;
/*!40000 ALTER TABLE `tab_facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_grados_academicos`
--

DROP TABLE IF EXISTS `tab_grados_academicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_grados_academicos` (
  `Id_GA` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de grado academico',
  `Nombre_GA` varchar(200) DEFAULT NULL COMMENT 'Nombre del grado academico',
  `Diminutivo_GA` varchar(45) DEFAULT NULL,
  `Activo_GA` char(1) DEFAULT NULL COMMENT '1=activo\n0=inactivo',
  PRIMARY KEY (`Id_GA`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_grados_academicos`
--

LOCK TABLES `tab_grados_academicos` WRITE;
/*!40000 ALTER TABLE `tab_grados_academicos` DISABLE KEYS */;
INSERT INTO `tab_grados_academicos` VALUES (1,'Señor','Sr.','1'),(2,'Señora','Sra.','1'),(3,'Señorita','Srta.','1'),(4,'Escuela Primaria','EP','1'),(5,'Escuela Secundarí­a (Bachillerato)','ES','1'),(6,'Colegio Técnico Prefesional','CTP','1'),(7,'Diplomado Universitario','Diplm.','1'),(8,'Bachillerato Universitario','Bach.','1'),(9,'Licenciatura Universitaría','Lic.','1'),(10,'Maestría en Administración','MBA.','1'),(11,'Maestría en Ingeniería de Negocios','MBE','1'),(12,'Maestría en Ciencias','M.Cs.','1'),(13,'Maestría en Ingeniería','M.I.','1'),(14,'Maestría en Bellas Artes','M.A.','1'),(15,'Maestría en Administración de Proyectos','M.A.P.','1'),(16,'Maestría en Salud Ocupacional','M.S.O.','1'),(17,'Maestría en Salud Pública','M.S.P.','1'),(18,'Maestría en Ciencias del Derecho','LL.M.','1'),(19,'Maestría en Educación','M.Ed.','1'),(20,'Maestría en Direccción de Empresas Constructoras','M.D.I.','1'),(21,'Maestría en en Tecnología de Polímeros','M.T.P.','1'),(22,'Maestría Profesional en Ciencias','M.P.C.','1'),(23,'Doctorado Universitario','Dr','1'),(24,'Especialidad','','1');
/*!40000 ALTER TABLE `tab_grados_academicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_mensajes_usuarios`
--

DROP TABLE IF EXISTS `tab_mensajes_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_mensajes_usuarios` (
  `Id_Men` bigint(19) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del mensaje',
  `Id_Per_Usu_Men` int(10) unsigned NOT NULL,
  `Mensaje_Men` varchar(300) DEFAULT NULL,
  `Diseno_Men` varchar(15) DEFAULT NULL COMMENT 'Tipo de ventana\n/growl|attached|bar|other',
  `Efecto_Men` varchar(15) DEFAULT NULL COMMENT '// effects for the specified layout:\n// for growl layout: scale|slide|genie|jelly\n// for attached layout: flip|bouncyflip\n// for other layout: boxspinner|cornerexpand|loadingcircle|thumbslider\n',
  `Tipo_Men` varchar(15) DEFAULT NULL,
  `Tiempo_Men` varchar(10) DEFAULT NULL COMMENT 'en segundos',
  `onClose_Men` blob COMMENT 'Accion a hacer al cerrar la notificacion\ndefault return false;',
  `onOpen_Men` blob COMMENT 'accion a hacer al abrir la ventana\ndefault return false;',
  `Estado_Men` tinyint(1) DEFAULT NULL COMMENT '0=No leido\n1=Leido',
  PRIMARY KEY (`Id_Men`),
  KEY `fk_tab_mensajes_usuarios_tab_usuarios1_idx` (`Id_Per_Usu_Men`),
  CONSTRAINT `fk_tab_mensajes_usuarios_tab_usuarios1` FOREIGN KEY (`Id_Per_Usu_Men`) REFERENCES `tab_usuarios` (`Id_Per_Usu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_mensajes_usuarios`
--

LOCK TABLES `tab_mensajes_usuarios` WRITE;
/*!40000 ALTER TABLE `tab_mensajes_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_mensajes_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_menu`
--

DROP TABLE IF EXISTS `tab_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_menu` (
  `Id_Menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nivel_Menu` tinyint(4) DEFAULT NULL,
  `Nombre_Menu` varchar(60) DEFAULT NULL,
  `Padre_Menu` varchar(45) DEFAULT NULL,
  `Tipo_Menu` char(1) DEFAULT NULL COMMENT '1=tiene mas hijo\n0=no tiene mas hijos\n',
  `Permiso_Menu` int(11) DEFAULT NULL COMMENT 'ID del permiso que aplica a este acceso',
  `Accion_Menu` varchar(200) DEFAULT NULL COMMENT 'Accion del menu solo con comillas simples',
  PRIMARY KEY (`Id_Menu`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_menu`
--

LOCK TABLES `tab_menu` WRITE;
/*!40000 ALTER TABLE `tab_menu` DISABLE KEYS */;
INSERT INTO `tab_menu` VALUES (1,0,'Inicio','0','0',1000,'CargaPaginaMenu(\'Inicio.php\',\'\',\'\')'),(2,0,'Configuración','0','1',1001,''),(3,1,'Global','2','0',1002,'CargaPaginaMenu(\'Modulos/SAE/Configuracion/con_configuracion.php\',\'mostrar_efecto;\',\'1;\')'),(4,0,'Seguridad','0','1',1020,''),(5,1,'Perfiles','4','1',1030,''),(6,2,'Agregar','5','0',1031,'CargaPaginaMenu(\'Modulos/SAE/Perfiles/agr_perfiles.php\',\'mostrar_efecto;\',\'1;\')'),(7,2,'Consultar','5','0',1032,'CargaPaginaMenu(\'Modulos/SAE/Perfiles/con_perfiles.php\',\'mostrar_efecto;\',\'1;\')'),(8,1,'Usuarios','4','1',1050,''),(9,2,'Agregar','8','0',1051,'****FALTA'),(10,2,'Consultar','8','0',1052,'CargaPaginaMenu(\'Modulos/SAE/Usuarios/con_usuarios.php\',\'mostrar_efecto;\',\'1;\')'),(11,1,'Actualizar Mis Datos','4','0',1100,'****FALTA'),(12,1,'Cambiar Contraseña','4','0',1101,'****FALTA'),(13,0,'Catalogos','0','1',1130,''),(14,1,'Grados Académicos','13','1',1131,''),(15,2,'Agregar','14','0',1132,'CargaPaginaMenu(\'Modulos/SAE/Catalogos/Grados_Academicos/agr_grados_academicos.php\',\'mostrar_efecto;\',\'1;\')'),(16,2,'Consultar','14','0',1133,'CargaPaginaMenu(\'Modulos/SAE/Catalogos/Grados_Academicos/con_grados_academicos.php\',\'mostrar_efecto;\',\'1;\')'),(17,1,'Paí­ses','13','1',1445,'****FALTA'),(18,2,'Agregar','17','0',1446,'****FALTA'),(19,2,'Consultar','17','0',1447,'****FALTA'),(20,1,'Personas','13','1',1575,''),(21,2,'Agregar','20','0',1576,'***FALTA'),(22,2,'Consultar','20','0',1577,'CargaPaginaMenu(\'Modulos/SAE/Personas/con_personas.php\',\'mostrar_efecto;\',\'1;\')'),(23,1,'Tipos de Teléfonos','13','1',1150,''),(24,2,'Agregar','23','0',1151,'CargaPaginaMenu(\'Modulos/SAE/Catalogos/Tipos_Telefonos/agr_tipos_telefonos.php\',\'mostrar_efecto;\',\'1;\')'),(25,2,'Consultar','23','0',1152,'CargaPaginaMenu(\'Modulos/SAE/Catalogos/Tipos_Telefonos/con_tipos_telefonos.php\',\'mostrar_efecto;\',\'1;\')'),(26,1,'Módulos (Sistemas)','4','1',1080,''),(27,2,'Agregar','26','0',1081,'CargaPaginaMenu(\'Modulos/SAE/Control_Modulos/agr_control_modulo.php\',\'mostrar_efecto;\',\'1;\')'),(28,2,'Consultar','26','0',1082,'CargaPaginaMenu(\'Modulos/SAE/Control_Modulos/con_control_modulo.php\',\'mostrar_efecto;\',\'1;\')'),(29,1,'Centros de Trabajo','13','1',1170,''),(30,2,'Agregar','29','0',1171,'CargaPaginaMenu(\'Modulos/SAE/Catalogos/centros_trabajo/agr_centro_trabajo.php\',\'mostrar_efecto;\',\'1;\')'),(31,2,'Consultar','29','0',1172,'CargaPaginaMenu(\'Modulos/SAE/Catalogos/centros_trabajo/con_centro_trabajo.php\',\'mostrar_efecto;\',\'1;\')'),(33,0,'Inventario','0','1',3000,''),(34,1,'Zonas','33','1',3001,''),(35,2,'Agregar','34','0',3002,'CargaPaginaMenu(\'Modulos/Inventario/zonas/agr_zonas.php\',\'mostrar_efecto;\',\'1;\')'),(36,2,'Consultar','34','0',3003,'CargaPaginaMenu(\'Modulos/Inventario/zonas/con_zonas.php\',\'mostrar_efecto;\',\'1;\')'),(37,1,'Transferencias','33','1',3010,NULL),(38,2,'Agregar','37','0',3011,'CargaPaginaMenu(\'Modulos/Inventario/transferencias/agr_transferencias.php\',\'mostrar_efecto;\',\'1;\')'),(39,2,'Consultar','37','0',3012,'CargaPaginaMenu(\'Modulos/Inventario/transferencias/con_transferencias.php\',\'mostrar_efecto;\',\'1;\')'),(40,1,'Compromisos','33','1',3020,NULL),(41,2,'Agregar','40','0',3021,'CargaPaginaMenu(\'Modulos/Inventario/compromisos/agr_compromisos.php\',\'mostrar_efecto;\',\'1;\')'),(42,2,'Consultar','40','0',3022,'CargaPaginaMenu(\'Modulos/Inventario/compromisos/con_compromisos.php\',\'mostrar_efecto;\',\'1;\')'),(43,1,'Partidas','33','1',3030,''),(44,2,'Agregar','43','0',3031,'CargaPaginaMenu(\'Modulos/Inventario/partidas/agr_partidas.php\',\'mostrar_efecto;\',\'1;\')'),(45,2,'Consultar','43','0',3032,'CargaPaginaMenu(\'Modulos/Inventario/partidas/con_partidas.php\',\'mostrar_efecto;\',\'1;\')'),(46,1,'Proveedores','33','1',3040,''),(47,2,'Agregar','46','0',3041,'CargaPaginaMenu(\'Modulos/Inventario/proveedores/agr_proveedores.php\',\'mostrar_efecto;\',\'1;\')'),(48,2,'Consultar','46','0',3042,'CargaPaginaMenu(\'Modulos/Inventario/proveedores/con_proveedores.php\',\'mostrar_efecto;\',\'1;\')'),(49,1,'Ordenes Compra','33','1',3050,''),(50,2,'Agregar','49','0',3051,'CargaPaginaMenu(\'Modulos/Inventario/ordenes/agr_ordenes.php\',\'mostrar_efecto;\',\'1;\')'),(51,2,'Consultar','49','0',3052,'CargaPaginaMenu(\'Modulos/Inventario/ordenes/con_ordenes.php\',\'mostrar_efecto;\',\'1;\')');
/*!40000 ALTER TABLE `tab_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_ordenes_compras`
--

DROP TABLE IF EXISTS `tab_ordenes_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_ordenes_compras` (
  `Id_OC` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Prove_OC` int(11) DEFAULT NULL,
  `Id_Parti_OC` int(11) DEFAULT NULL,
  `Id_Compr_OC` int(11) DEFAULT NULL,
  `Numero_OC` varchar(50) DEFAULT NULL,
  `Fecha_OC` date DEFAULT NULL,
  `Anno_OC` varchar(4) DEFAULT NULL,
  `Activo_OC` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id_OC`),
  KEY `fk_tab_ordenes_compras_tab_proveedores_idx` (`Id_Prove_OC`),
  KEY `fk_tab_ordenes_compras_tab_partidas1_idx` (`Id_Parti_OC`),
  KEY `fk_tab_ordenes_compras_tab_compromisos1_idx` (`Id_Compr_OC`),
  CONSTRAINT `fk_tab_ordenes_compras_tab_compromisos1` FOREIGN KEY (`Id_Compr_OC`) REFERENCES `tab_compromisos` (`Id_Compr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_ordenes_compras_tab_partidas1` FOREIGN KEY (`Id_Parti_OC`) REFERENCES `tab_partidas` (`Id_Parti`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_ordenes_compras_tab_proveedores` FOREIGN KEY (`Id_Prove_OC`) REFERENCES `tab_proveedores` (`Id_Prove`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_ordenes_compras`
--

LOCK TABLES `tab_ordenes_compras` WRITE;
/*!40000 ALTER TABLE `tab_ordenes_compras` DISABLE KEYS */;
INSERT INTO `tab_ordenes_compras` VALUES (7,1,1,1,'1234','2016-04-28','2012','1'),(8,2,2,2,'321','2016-04-28','2013','1'),(9,8,4,6,'4321','2016-04-28','2012','1');
/*!40000 ALTER TABLE `tab_ordenes_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_paises`
--

DROP TABLE IF EXISTS `tab_paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_paises` (
  `Id_Pai` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del Pais',
  `Nombre_Pai` varchar(60) DEFAULT NULL COMMENT 'Nombre del Pais',
  `Codigo_Pai` varchar(5) DEFAULT NULL COMMENT 'Codigo Internacional del Pais',
  `Continente_Pai` varchar(2) DEFAULT NULL COMMENT 'Nombre del continente',
  `Bandera_Peq_Pai` varchar(40) DEFAULT NULL,
  `Bandera_Gra_Pai` varchar(40) DEFAULT NULL,
  `ISO2_Pai` varchar(2) DEFAULT NULL COMMENT 'ISO 3166-1 Codigo Alfa-2',
  `ISO3_Pai` varchar(3) DEFAULT NULL COMMENT 'ISO 3166-1 Codigo Alfa-2',
  `Latitud_Pai` varchar(20) DEFAULT NULL,
  `Longitud_Pai` varchar(20) DEFAULT NULL,
  `Activo_Pai` char(1) DEFAULT NULL COMMENT '1=Activo\n0=Inactivo',
  PRIMARY KEY (`Id_Pai`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8 COMMENT='Tabla de Paises';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_paises`
--

LOCK TABLES `tab_paises` WRITE;
/*!40000 ALTER TABLE `tab_paises` DISABLE KEYS */;
INSERT INTO `tab_paises` VALUES (1,'Afganistán','93','AS','af.jpg','g_af.png','AF','AFG','33.934038','64.451478','1'),(2,'Albania','355','EU','al.jpg','g_al.png','AL','ALB','41.276872','20.171558','0'),(3,'Alemania','49','EU','de.jpg','g_de.png','DE','DEU','51.254552','10.849627','0'),(4,'Andorra','376','EU','ad.jpg','g_ad.png','AD','AND','42.551123','1.559907','0'),(5,'Angola','244','AF','ao.jpg','g_ao.png','AO','AGO','-12.353513','17.702942','0'),(6,'Anguila','1264','NA','ai.jpg','g_ai.png','AI','AIA','18.217727','-63.050797','0'),(7,'Antártida','6721','AN','aq.jpg','g_aq.png','AQ','ATA','-76.295604','21.972657','0'),(8,'Antigua y Barbuda','1268','NA','ag.jpg','g_ag.png','AG','ATG','17.084435','-61.808897','0'),(9,'Arabia Saudita','966','AS','sa.jpg','g_sa.png','SA','SAU','23.099852','45.195740','0'),(10,'Argelia','213','AF','dz.jpg','g_dz.png','DZ','DZA','27.912548','2.632991','0'),(11,'Argentina','54','SA','ar.jpg','g_ar.png','AR','ARG','-35.398002','-65.093061','0'),(12,'Armenia','374','AS','am.jpg','g_am.png','AM','ARM','40.234364','44.760590','0'),(13,'Aruba','297','NA','aw.jpg','g_aw.png','AW','ABW','12.512872',' -69.981082','0'),(14,'Australia','61','OC','au.jpg','g_au.png','AU','AUS','-24.930696','134.742007','0'),(15,'Austria','43','EU','at.jpg','g_at.png','AT','AUT','47.644685','14.334504','0'),(16,'Azerbaiyán','994','AS','az.jpg','g_az.png','AZ','AZE','40.269738','47.978112','0'),(17,'Bahamas','1224','NA','bs.jpg','g_bs.png','BS','BHS','24.578253','-77.955812','0'),(18,'Bangladés','880','AS','bd.jpg','g_bd.png','BD','BGD','24.041969','90.300407','0'),(19,'Barbados','1246','NA','bb.jpg','g_bb.png','BB','BRB','13.172750','-59.548610','0'),(20,'Baréin','973','AS','bh.jpg','g_bh.png','BH','BHR','26.024901','50.545194','0'),(21,'Bélgica','32','EU','be.jpg','g_be.png','BE','BEL','50.530748','4.639776','0'),(22,'Belice','501','NA','bz.jpg','g_bz.png','BZ','BLZ','17.253743','-88.760658','0'),(23,'Bení­n','229','AF','bj.jpg','g_bj.png','BJ','BEN','9.657519','2.309924','0'),(24,'Bermudas','1441','NA','bm.jpg','g_bm.png','BM','BMU','32.298576','-64.762276','0'),(25,'Bielorrusia','375','EU','by.jpg','g_by.png','BY','BLR','53.252803','28.109415','0'),(26,'Bolivia','591','SA','bo.jpg','g_bo.png','BO','BOL','-16.705074','-64.735920','0'),(27,'Bonaire, San Eustaquio y Saba','5997','NA','bq.jpg','g_bq.png','BQ','BES','12.198575','-68.271104','0'),(28,'Bosnia y Herzegovina','387','EU','ba.jpg','g_ba.png','BA','BIH','44.209360','17.925367','0'),(29,'Botsuana','267','AF','bw.jpg','g_bw.png','BW','BWA','-22.220849','23.786225','0'),(30,'Brasil','55','SA','br.jpg','g_br.png','BR','BRA','-8.902918','-54.323080','0'),(31,'Brunéi Darussalam','673','AS','bn.jpg','g_bn.png','BN','BRN','4.502344','114.631736','0'),(32,'Bulgaria','359','EU','bg.jpg','g_bg.png','BG','BGR','42.539436','25.175687','0'),(33,'Burkina Faso','226','AF','bf.jpg','g_bf.png','BF','BFA','12.279456','-1.709488','0'),(34,'Burundi','257','AF','bi.jpg','g_bi.png','BI','BDI','-3.323725','29.908789','0'),(35,'Bután','975','AS','bt.jpg','g_bt.png','BT','BTN','27.404699','90.479798','0'),(36,'Cabo Verde','238','AF','cv.jpg','g_cv.png','CV','CPV','15.067105','-23.616158','0'),(37,'Camboya','855','AS','kh.jpg','g_kh.png','KH','KHM','12.578379','104.925683','0'),(38,'Camerún','237','AF','cm.jpg','g_cm.png','CM','CMR','5.557591','12.564312','0'),(39,'Canadá','1','NA','ca.jpg','g_ca.png','CA','CAN','58.564033','-105.228516','0'),(40,'Chad','235','AF','td.jpg','g_td.png','TD','TCD','15.022092','18.888809','0'),(41,'Chile','56','SA','cl.jpg','g_cl.png','CL','CHL','-33.510666','-70.671893','0'),(42,'China, República Popular','86','AS','cn.jpg','g_cn.png','CN','CHN','34.128706','102.604968','0'),(43,'Chipre','357','AS','cy.jpg','g_cy.png','CY','CYP','35.057413','33.198029','0'),(44,'Colombia','57','SA','co.jpg','g_co.png','CO','COL','4.247145','-73.459256','0'),(45,'Comoras','269','AF','km.jpg','g_km.png','KM','COM','-11.672155','43.342384','0'),(46,'Congo, La República Democrática del Congo','242','AF','cd.jpg','g_cd.png','CD','COD','-2.366257','23.419982','0'),(47,'Congo','243','AF','cg.jpg','g_cg.png','CG','COG','-0.968176','15.557487','0'),(48,'Corea, República de Corea','82','AS','kr.jpg','g_kr.png','KR','KOR','36.731624','127.969587','0'),(49,'Corea, República Democrática Popular de Corea','850','AS','kp.jpg','g_kp.png','KP','PRK','39.928402','126.674605','0'),(50,'Costa de Marfil','225','AF','ci.jpg','g_ci.png','CI','CIV','7.602338','-5.421052','0'),(51,'Costa Rica','506','NA','cr.jpg','g_cr.png','CR','CRI','9.933334','-84.100376','1'),(52,'Croacia','385','EU','hr.jpg','g_hr.png','HR','HRV','45.798993','16.018432','0'),(53,'Cuba','53','NA','cu.jpg','g_cu.png','CU','CUB','23.055600','-82.365542','0'),(54,'Curazao','599','NA','cw.jpg','g_cw.png','CW','CUW','12.172130','-68.975542','0'),(55,'Dinamarca','45','EU','dk.jpg','g_dk.png','DK','DNK','55.681429','12.586410','0'),(56,'Dominica','1767','NA','dm.jpg','g_dm.png','DM','DMA','15.441082','-61.344274','0'),(57,'Ecuador','593','SA','ec.jpg','g_ec.png','EC','ECU','-0.160777','-78.477464','0'),(58,'Egipto','20','AF','eg.jpg','g_eg.png','EG','EGY','30.080437','31.301031','0'),(59,'El Salvador','503','NA','sv.jpg','g_sv.png','SV','SLV','13.689966','-89.211395','0'),(60,'Emiratos Árabes Unidos','971','AS','ae.jpg','g_ae.png','AE','ARE','24.290516','54.718906','0'),(61,'Eritrea','291','AF','er.jpg','g_er.png','ER','ERI','15.251927','38.767251','0'),(62,'Eslovaquia','421','EU','sk.jpg','g_sk.png','SK','SVK','48.143445','17.100580','0'),(63,'Eslovenia','386','EU','si.jpg','g_si.png','SI','SVN','46.069191','14.502612','0'),(64,'España','34','EU','es.jpg','g_es.png','ES','ESP','40.426296','-3.669055','0'),(65,'Estados Unidos','1','NA','us.jpg','g_us.png','US','USA','39.895955','-101.949180','0'),(66,'Estonia','372','EU','ee.jpg','g_ee.png','EE','EST','59.437462','24.742624','0'),(67,'Etiopí­a','251','AF','et.jpg','g_et.png','ET','ETH','8.424199','39.437752','0'),(68,'Federación Rusa','7','EU','ru.jpg','g_ru.png','RU','RUS','61.626860','104.984206','0'),(69,'Filipinas','63','AS','ph.jpg','g_ph.png','PH','PHL','14.543583','120.995778','0'),(70,'Finlandia','358','EU','fi.jpg','g_fi.png','FI','FIN','64.649160','27.210190','0'),(71,'Fiyi','679','OC','fj.jpg','g_fj.png','FJ','FJI','-17.827966','177.982203','0'),(72,'Francia','33','EU','fr.jpg','g_fr.png','FR','FRA','48.826563','2.318689','0'),(73,'Gabón','241','AF','ga.jpg','g_ga.png','GA','GAB','-0.590653','11.766797','0'),(74,'Gambia','220','AF','gm.jpg','g_gm.png','GM','GMB','13.581289','-15.322176','0'),(75,'Georgia','995','AS','ge.jpg','g_ge.png','GE','GEO','32.557828','-83.321853','0'),(76,'Ghana','233','AF','gh.jpg','g_gh.png','GH','GHA','5.615354','-0.163751','0'),(77,'Gibraltar','350','EU','gi.jpg','g_gi.png','GI','GIB','36.133779','-5.348197','0'),(78,'Granada','1473','NA','gd.jpg','g_gd.png','GD','GRD','12.116346','-61.676007','0'),(79,'Grecia','30','EU','gr.jpg','g_gr.png','GR','GRC','37.982980','23.683562','0'),(80,'Groenlandia','299','NA','gl.jpg','g_gl.png','GL','GRL','76.680171','-44.423514','0'),(81,'Guadalupe','590','NA','gp.jpg','g_gp.png','GP','GLP','16.256171','-61.570558','0'),(82,'Guam','1671','OC','gu.jpg','g_gu.png','GU','GUM','13.451983','144.776472','0'),(83,'Guatemala','502','NA','gt.jpg','g_gt.png','GT','GTM','14.643533','-90.518109','0'),(84,'Guayana Francesa','594','SA','gf.jpg','g_gf.png','GF','GUF','4.078703','-53.137013','0'),(85,'Guernsey','44','EU','gg.jpg','g_gg.png','GG','GUF','49.454697','-2.581418','0'),(86,'Guinea-Bisáu','245','AF','gw.jpg','g_gw.png','GW','GNB','12.009970','-14.890677','0'),(87,'Guinea Ecuatorial','240','AF','gq.jpg','g_gq.png','GQ','GNB','1.611277','10.532015','0'),(88,'Guinea','224','AF','gn.jpg','g_gn.png','GN','GIN','9.607954','-13.599241','0'),(89,'Guyana','582','SA','gy.jpg','g_gy.png','GY','GUY','6.801038','-58.129038','0'),(90,'Haití','509','NA','ht.jpg','g_ht.png','HT','HTI','18.577349','-72.326234','0'),(91,'Honduras','504','NA','hn.jpg','g_hn.png','HN','HND','14.071594','-87.194561','0'),(92,'Hong Kong','852','AS','hk.jpg','g_hk.png','HK','HKG','22.368617','114.170613','0'),(93,'Hungría','36','EU','hu.jpg','g_hu.png','HU','HUN','47.511093','19.022356','0'),(94,'India','91','AS','in.jpg','g_in.png','IN','IND','22.923463','79.351489','0'),(95,'Indonesia','62','AS','id.jpg','g_id.png','ID','IDN','-6.316232','106.764863','0'),(96,'Irak','964','AS','iq.jpg','g_iq.png','IQ','IRQ','33.312786','44.365912','0'),(97,'Irán, República Islámica de','98','AS','ir.jpg','g_ir.png','IR','IRQ','32.332864','54.517977','0'),(98,'Irlanda','353','EU','ie.jpg','g_ie.png','IE','IRL','53.284411','-7.999120','0'),(99,'Isla Bouvet','47','AN','bv.jpg','g_bv.png','BV','BVT','-54.420629','3.353289','0'),(100,'Isla de Man','44','EU','im.jpg','g_im.png','IM','IMN','54.226455','-4.520066','0'),(101,'Isla de Navidad','61','AS','cx.jpg','g_cx.png','CX','CXR','-10.484142','105.640148','0'),(102,'Isla Norfolk','6723','OC','nf.jpg','g_nf.png','NF','NFX','-29.033805','167.951922','0'),(103,'Islandia','354','EU','is.jpg','g_is.png','IS','ISL','64.945237','-18.372976','0'),(104,'Islas Áland','35818','EU','ax.jpg','g_ax.png','AX','ALA','60.206373','20.110246','0'),(105,'Islas Caimán','1345','NA','ky.jpg','g_ky.png','KY','CYM','19.319833','-81.228397','0'),(106,'Islas Cocos (Keeling)','61','AS','cc.jpg','g_cc.png','CC','CCK','-12.186647','96.831440','0'),(107,'Islas Cook','682','OC','ck.jpg','g_ck.png','CK','COK','-21.234334','-159.777919','0'),(108,'Islas Falkland (Malvinas)','500','SA','fk.jpg','g_fk.png','FK','FLK','-51.740812','-58.896782','0'),(109,'Islas Feroe','298','EU','fo.jpg','g_fo.png','FO','FRO','62.112854','-6.929025','0'),(110,'Islas Georgias del Sur y Sandwich del Sur','500','AN','gs.jpg','g_gs.png','GS','SGS','-54.360334','-36.704013','0'),(111,'Islas Heard y Mcdonald','1672','AN','hm.jpg','g_hm.png','HM','HMD','-53.095140','73.519155','0'),(112,'Islas Marianas del Norte','1670','OC','mp.jpg','g_mp.png','MP','MNP','15.163780','145.728908','0'),(113,'Islas Marshall','692','OC','mh.jpg','g_mh.png','MH','MHL','6.045178','172.100616','0'),(114,'Islas Salomón','677','OC','sb.jpg','g_sb.png','SB','SLB','-9.562357','159.989393','0'),(115,'Islas Turcas y Caicos','1649','NA','tc.jpg','g_tc.png','TC','TCA','21.794175','-71.763378','0'),(116,'Islas Ultramarinas Menores de Estados Unidos','1808','OC','um.jpg','g_um.png','UM','UMI','19.284761','166.643837','0'),(117,'Islas Virgenes Británicas','1284','NA','vg.jpg','g_vg.png','VG','VGB','18.433073','-64.613584','0'),(118,'Islas Virgenes de Los Estados Unidos','1340','NA','vi.jpg','g_vi.png','VI','VIR','18.342138','-64.914542','0'),(119,'Israel','972','AS','il.jpg','g_il.png','IL','ISR','31.981926','35.916777','0'),(120,'Italia','39','EU','it.jpg','g_it.png','IT','ITA','41.918742','12.491353','0'),(121,'Jamaica','1876','NA','jm.jpg','g_jm.png','JM','JAM','18.144230','-77.339174','0'),(122,'Japón','81','AS','jp.jpg','g_jp.png','JP','JPN','36.605725','138.286823','0'),(123,'Jersey','44','EU','je.jpg','g_je.png','JE','JEY','49.220097','-2.134006','0'),(124,'Jordania','962','AS','jo.jpg','g_jo.png','JO','JOR','31.962785','35.943222','0'),(125,'Kazajistán','7','AS','kz.jpg','g_kz.png','KZ','KAZ','51.138619','71.430911','0'),(126,'Kenia','254','AF','ke.jpg','g_ke.png','KE','KEN','0.484493','37.930331','0'),(127,'Kirguistán','996','AS','kg.jpg','g_kg.png','KG','KGZ','41.437301','74.519052','0'),(128,'Kiribati','686','OC','ki.jpg','g_ki.png','KI','KIR','1.846863','-157.380879','0'),(129,'Kuwait','965','AS','kw.jpg','g_kw.png','KW','KWT','29.328444','29.328444','0'),(130,'Lesoto','266','AF','ls.jpg','g_ls.png','LS','LSO','-29.556315','28.288401','0'),(131,'Letonia','371','EU','lv.jpg','g_lv.png','LV','LVA','56.940153','25.957067','0'),(132,'Líbano','961','AS','lb.jpg','g_lb.png','LB','LBN','33.964725','35.858256','0'),(133,'Liberia','231','AF','lr.jpg','g_lr.png','LR','LBR','6.302678','-9.356509','0'),(134,'Libia','218','AF','ly.jpg','g_ly.png','LY','LBY','26.864458','17.576827','0'),(135,'Liechtenstein','423','EU','li.jpg','g_li.png','LI','LIE','47.137003','9.546082','0'),(136,'Lituania','370','EU','lt.jpg','g_lt.png','LT','LTU','55.342644','24.048610','0'),(137,'Luxemburgo','352','EU','lu.jpg','g_lu.png','LU','LUX','49.682199','6.119587','0'),(138,'Macao','853','AS','mo.jpg','g_mo.png','MO','MAC','22.207292','113.549783','0'),(139,'Macedonia, La Antigua República Yugoslava de','389','EU','mk.jpg','g_mk.png','MK','MKD','41.606830','21.747070','0'),(140,'Madagascar','261','AF','mg.jpg','g_mg.png','MG','MDG','-20.270247','46.526843','0'),(141,'Malasia','60','AS','my.jpg','g_my.png','MY','MYS','2.912519','114.012680','0'),(142,'Malaui','265','AF','mw.jpg','g_mw.png','MW','MWI','-13.985118','33.779189','0'),(143,'Maldivas','960','AS','mv.jpg','g_mv.png','MV','MDV','1.929896','73.542970','0'),(144,'Malí','223','AF','ml.jpg','g_ml.png','ML','MLI','17.846554','-2.513583','0'),(145,'Malta','356','EU','mt.jpg','g_mt.png','MT','MLT','35.914763','14.404745','0'),(146,'Marruecos','212','AF','ma.jpg','g_ma.png','MA','MAR','32.279109','-6.183844','0'),(147,'Martinica','596','NA','mq.jpg','g_mq.png','MQ','MTQ','14.665569','-61.010197','0'),(148,'Mauricio','230','AF','mu.jpg','g_mu.png','MU','MUS','-20.289109','57.543664','0'),(149,'Mauritania','222','AF','mr.jpg','g_mr.png','MR','MRT','20.998070','-10.973137','0'),(150,'Mayotte','262','AF','yt.jpg','g_yt.png','YT','MYT','-12.801615','45.151547','0'),(151,'México','52','NA','mx.jpg','g_mx.png','MX','MEX','20.408734','-100.516266','0'),(152,'Micronesia, Estados Federados de','691','OC','fm.jpg','g_fm.png','FM','FSM','6.884414','158.227775','0'),(153,'Moldavia, República de','373','EU','md.jpg','g_md.png','MD','MDA','47.016889','28.862109','0'),(154,'Mónaco','377','EU','mc.jpg','g_mc.png','MC','MCO','43.738447','7.424029','0'),(155,'Mongolia','976','AS','mn.jpg','g_mn.png','MN','MNG','47.906435','106.823066','0'),(156,'Montenegro','382','EU','me.jpg','g_me.png','ME','MNE','42.708459','19.368174','0'),(157,'Montserrat','1664','NA','ms.jpg','g_ms.png','MS','MSR','16.736614','-62.193779','0'),(158,'Mozambique','258','AF','mz.jpg','g_mz.png','MZ','MOZ','-17.290349','35.791008','0'),(159,'Myanmar (Birmania)','95','AS','mm.jpg','g_mm.png','MM','MMR','19.653894','96.099751','0'),(160,'Nabimia','264','AF','na.jpg','g_na.png','NA','NAM','-22.622702','17.108722','0'),(161,'Nauru','674','OC','nr.jpg','g_nr.png','NR','NRU','-0.527814','166.933723','0'),(162,'Nepal','977','AS','np.jpg','g_np.png','NP','NPL','27.718804','85.349480','0'),(163,'Nicaragua','505','NA','ni.jpg','g_ni.png','NI','NIC','12.729892','-85.075272','0'),(164,'Nigeria','234','AF','ng.jpg','g_ng.png','NG','NGA','9.012653','7.381070','0'),(165,'Níger','227','AF','ne.jpg','g_ne.png','NE','NER','17.093787','9.310845','0'),(166,'Niue','683','OC','nu.jpg','g_nu.png','NU','NIU','-19.050808','-169.863775','0'),(167,'Noruega','47','EU','no.jpg','g_no.png','NO','NOR','62.092098','9.231521','0'),(168,'Nueva Caledonia','687','OC','nc.jpg','g_nc.png','NC','NCL','-21.394970','165.450700','0'),(169,'Nueva Zelanda','64','OC','nz.jpg','g_nz.png','NZ','NZL','-42.829027','171.894981','0'),(170,'Omán','968','AS','om.jpg','g_om.png','OM','OMN','20.605194','56.336151','0'),(171,'Paí­ses Bajos','31','EU','nl.jpg','g_nl.png','NL','NLD','52.360841','4.916821','0'),(172,'Pakistán','92','AS','pk.jpg','g_pk.png','PK','PAK','29.800074','69.330323','0'),(173,'Palaos','680','OC','pw.jpg','g_pw.png','PW','PLW','7.491613','134.567303','0'),(174,'Palestina, Estado de','970','AS','ps.jpg','g_ps.png','PS','PSE','31.489427','34.460867','0'),(175,'Panamá','507','NA','pa.jpg','g_pa.png','PA','PAN','9.098718','-79.402240','0'),(176,'Papúa Nueva Guinea','675','OC','pg.jpg','g_pg.png','PG','PNG','-6.461126','144.349589','0'),(177,'Paraguay','595','SA','py.jpg','g_py.png','PY','PRY','-23.575755','-57.789171','0'),(178,'Perú','51','SA','pe.jpg','g_pe.png','PE','PER','-9.412024','-75.605651','0'),(179,'Pitcairn','64','OC','pn.jpg','g_pn.png','PN','PCN','-24.374400','-128.323892','0'),(180,'Polinesia Francesa','689','OC','pf.jpg','g_pf.png','PF','PYF','-17.634323','-149.464971','0'),(181,'Polonia','48','EU','pl.jpg','g_pl.png','PL','POL','52.256433','19.529886','0'),(182,'Portugal','351','EU','pt.jpg','g_pt.png','PT','PRT','39.768626','-8.095359','0'),(183,'Puerto Rico','1787','NA','pr.jpg','g_pr.png','PR','PRI','18.250895','-66.476271','0'),(184,'Qatar','974','AS','qa.jpg','g_qa.png','QA','QAT','25.319657','51.221378','0'),(185,'Reino Unido','44','EU','gb.jpg','g_gb.png','GB','GBR','54.248930','-2.388636','0'),(186,'República Centroafricana','236','AF','cf.jpg','g_cf.png','CF','CAF','6.772163','20.629084','0'),(187,'República Checa','420','EU','cz.jpg','g_cz.png','CZ','CZE','49.817943','15.167295','0'),(188,'República Democrática Popular Lao','856','AS','la.jpg','g_la.png','LA','LAO','19.661115','102.570663','0'),(189,'República Dominicana','1809','NA','do.jpg','g_do.png','DO','DOM','19.116642','-70.494485','0'),(190,'Reunión','262','AF','re.jpg','g_re.png','RE','REU','-21.114036','55.523733','0'),(191,'Ruanda','250','AF','rw.jpg','g_rw.png','RW','RWA','-1.990321','29.861210','0'),(192,'Rumania','40','EU','ro.jpg','g_ro.png','RO','ROU','45.896089','25.009430','0'),(193,'Sahara Occidental','21228','AF','eh.jpg','g_eh.png','EH','ESH','24.668814','-13.171670','0'),(194,'Samoa Americana','1684','OC','as.jpg','g_as.png','AS','ASM','-14.292380','-170.715751','0'),(195,'Samoa','685','OC','ws.jpg','g_ws.png','WS','WSM','-13.635385','-172.405518','0'),(196,'San Bartolomé','590','NA','bl.jpg','g_bl.png','BL','BLM','17.899711','-62.830591','0'),(197,'San Cristóbal y Nieves','1869','NA','kn.jpg','g_kn.png','KN','KNA','17.331574','-62.762389','0'),(198,'San Marino','378','EU','sm.jpg','g_sm.png','SM','SMR','43.937439','12.462497','0'),(199,'San Martín (Parte Francesa)','590','NA','mf.jpg','g_mf.png','MF','MAF','18.084549','-63.052590','0'),(200,'San Pedro y Miquelón','508','NA','pm.jpg','g_pm.png','PM','SPM','47.030062','-56.319963','0'),(201,'San Vicente y Las Granadinas','1784','NA','vc.jpg','g_vc.png','VC','VCT','13.255491','-61.194416','0'),(202,'Santa Helena, Ascensión y Tristán de Acuña','290','AF','sh.jpg','g_sh.png','SH','SHN','38.503891','-122.469233','0'),(203,'Santa Luc­ía','1758','NA','lc.jpg','g_lc.png','LC','LCA','13.895528','-60.969515','0'),(204,'Santa Sede (Ciudad Estado Vaticano)','379','EU','va.jpg','g_va.png','VA','VAT','41.903513','12.452941','0'),(205,'Santo Tomé y Principe','239','AF','st.jpg','g_st.png','ST','STP','0.248447','6.608504','0'),(206,'Senegal','221','AF','sn.jpg','g_sn.png','SN','SEN','14.542713','-14.636982','0'),(207,'Serbia','381','EU','rs.jpg','g_rs.png','RS','SRB','44.084636','20.658744','0'),(208,'Seychelles','248','AF','sc.jpg','g_sc.png','SC','SYC','-4.673881','55.470078','0'),(209,'Sierra Leona','232','AF','sl.jpg','g_sl.png','SL','SLE','8.520284','-11.814524','0'),(210,'Singapur','65','AS','sg.jpg','g_sg.png','SG','SGP','1.370334','103.801694','0'),(211,'Sint Maarten (Parte Neerlandesa)','1721','NA','sx.jpg','g_sx.png','SX','SXM','18.043704','-63.057812','0'),(212,'Siria, República Arabe de','963','AS','sy.jpg','g_sy.png','SY','SYR','34.968108','38.760808','0'),(213,'Somalia','252','AF','so.jpg','g_so.png','SO','SOM','5.075734','46.577236','0'),(214,'Sri Lanka','94','AS','lk.jpg','g_lk.png','LK','LKA','7.621395','80.683863','0'),(215,'Suazilandia','268','AF','sz.jpg','g_sz.png','SZ','SWZ','-26.537320','31.460027','0'),(216,'Sudáfrica','27','AF','za.jpg','g_za.png','ZA','ZAF','-29.172284','26.232350','0'),(217,'Sudán del Sur','211','AF','ss.jpg','g_ss.png','SS','SSD','7.078389','30.529884','0'),(218,'Sudán','249','AF','sd.jpg','g_sd.png','SD','SDN','15.193184','30.265225','0'),(219,'Suecia','46','EU','se.jpg','g_se.png','SE','SWE','63.677476','17.653147','0'),(220,'Suiza','41','EU','ch.jpg','g_ch.png','CH','CHE','47.012067','8.345060','0'),(221,'Surinam','597','SA','sr.jpg','g_sr.png','SR','SUR','4.191785','-56.104149','0'),(222,'Svalbard y Jan Mayen','47','EU','sj.jpg','g_sj.png','SJ','SJM','78.747193','17.028087','0'),(223,'Tailandia','66','AS','th.jpg','g_th.png','TH','THA','15.910681','101.380241','0'),(224,'Taiwán, Provincia de China','886','AS','tw.jpg','g_tw.png','TW','TWN','23.799627','120.977157','0'),(225,'Tanzania, República Unida de','255','AF','tz.jpg','g_tz.png','TZ','TZA','-5.935906','35.222073','0'),(226,'Tayikistán','992','AS','tj.jpg','g_tj.png','TJ','TJK','38.883839','70.764586','0'),(227,'Territorio Británico del Océano Índico','246','AS','io.jpg','g_io.png','IO','IOT','-7.313170','72.418758','0'),(228,'Territorios Australes Franceses','-','AN','tf.jpg','g_tf.png','TF','ATF','-49.311843',' 69.426255','0'),(229,'Timor-Leste','670','AS','tl.jpg','g_tl.png','TL','TLS','-8.775750','126.035780','0'),(230,'Togo','228','AF','tg.jpg','g_tg.png','TG','TGO','8.398274','1.008171','0'),(231,'Tokelau','690','OC','tk.jpg','g_tk.png','TK','TKL','-9.194626','-171.855633','0'),(232,'Tonga','676','OC','to.jpg','g_to.png','TO','TON','-21.221307','-175.171119','0'),(233,'Trinidad y Tobago','1868','NA','tt.jpg','g_tt.png','TT','TTO','10.415624','-61.248446','0'),(234,'Túnez','216','AF','tn.jpg','g_tn.png','TN','TUN','33.866171','9.363010','0'),(235,'Turkmenistán','993','AS','tm.jpg','g_tm.png','TM','TKM','39.423585','59.511681','0'),(236,'Turquía','90','EU','tr.jpg','g_tr.png','TR','TUR','39.162154','35.439123','0'),(237,'Tuvalu','688','OC','tv.jpg','g_tv.png','TV','TUV','-7.476570','178.675716','0'),(238,'Ucrania','380','EU','ua.jpg','g_ua.png','UA','UKR','49.294095','31.292733','0'),(239,'Uganda','256','AF','ug.jpg','g_ug.png','UG','UGA','1.741552','32.490009','0'),(240,'Uruguay','598','SA','uy.jpg','g_uy.png','UY','URY','-32.826447','-56.009511','0'),(241,'Uzbekistán','998','AS','uz.jpg','g_uz.png','UZ','UZB','41.602942','63.872062','0'),(242,'Vanuatu','679','OC','vu.jpg','g_vu.png','VU','VUT','-17.723344','168.386427','0'),(243,'Venezuela, República Bolivariana de','58','SA','ve.jpg','g_ve.png','VE','VEN','7.493808','-65.382554','0'),(244,'Viet Nam','84','AS','vn.jpg','g_vn.png','VN','VNM','14.503662','108.399453','0'),(245,'Wallis y Futuna','681','OC','wf.jpg','g_wf.png','WF','WLF','-14.294343','-178.120045','0'),(246,'Yemen','967','AS','ye.jpg','g_ye.png','YE','YEM','15.606818','47.537641','0'),(247,'Yibuti','253','AF','dj.jpg','g_dj.png','DJ','DJI','11.709738','42.582854','0'),(248,'Zambia','260','AF','zm.jpg','g_zm.png','ZM','ZMB','-14.122609','27.590519','0'),(249,'Zimbabue','263','AF','zw.jpg','g_zw.png','ZW','ZWE','-18.984673','29.910859','0');
/*!40000 ALTER TABLE `tab_paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_partidas`
--

DROP TABLE IF EXISTS `tab_partidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_partidas` (
  `Id_Parti` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_Parti` varchar(45) DEFAULT NULL,
  `Activo_Parti` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Parti`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_partidas`
--

LOCK TABLES `tab_partidas` WRITE;
/*!40000 ALTER TABLE `tab_partidas` DISABLE KEYS */;
INSERT INTO `tab_partidas` VALUES (1,'DESCONOCIDA','1'),(2,'5.01.01','1'),(3,'5.01.02','1'),(4,'5.01.03','1'),(5,'5.01.04','1'),(6,'5.01.05','1'),(7,'5.01.07','1'),(8,'5.01.99','1'),(9,'5.09.03','1'),(10,'5.99.03','1');
/*!40000 ALTER TABLE `tab_partidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_permisos`
--

DROP TABLE IF EXISTS `tab_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_permisos` (
  `Id_Perm` bigint(19) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del permiso para hacerlo unico',
  `Id_Der_Perm` int(10) unsigned NOT NULL COMMENT 'Id del derecho',
  `Id_Rol_Perm` smallint(5) unsigned NOT NULL COMMENT 'Id del Rol',
  PRIMARY KEY (`Id_Perm`),
  KEY `fk_tab_derechos_has_tab_perfiles_tab_perfiles1_idx` (`Id_Rol_Perm`),
  KEY `fk_tab_derechos_has_tab_perfiles_tab_derechos1_idx` (`Id_Der_Perm`),
  CONSTRAINT `fk_tab_derechos_has_tab_perfiles_tab_derechos1` FOREIGN KEY (`Id_Der_Perm`) REFERENCES `tab_derechos` (`Id_Der`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_derechos_has_tab_perfiles_tab_perfiles1` FOREIGN KEY (`Id_Rol_Perm`) REFERENCES `tab_roles` (`Id_Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=622 DEFAULT CHARSET=utf8 COMMENT='Tabla que relaciona los derechos o acciones sobre le sistema con un perfil o rol';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_permisos`
--

LOCK TABLES `tab_permisos` WRITE;
/*!40000 ALTER TABLE `tab_permisos` DISABLE KEYS */;
INSERT INTO `tab_permisos` VALUES (1,1000,1),(2,1001,1),(3,1002,1),(4,1020,1),(5,1030,1),(6,1031,1),(7,1032,1),(8,1033,1),(9,1034,1),(10,1035,1),(11,1036,1),(12,1050,1),(13,1051,1),(14,1052,1),(15,1053,1),(16,1054,1),(17,1055,1),(18,1056,1),(19,1057,1),(20,1058,1),(21,1059,1),(22,1080,1),(23,1081,1),(24,1082,1),(25,1083,1),(26,1084,1),(27,1100,1),(28,1101,1),(29,1130,1),(30,1131,1),(31,1132,1),(32,1133,1),(33,1134,1),(34,1135,1),(35,1150,1),(36,1151,1),(37,1152,1),(38,1153,1),(39,1154,1),(40,1170,1),(41,1171,1),(42,1172,1),(43,1173,1),(44,1174,1),(45,1175,1),(46,1176,1),(47,1177,1),(48,1200,1),(49,1201,1),(50,1202,1),(51,1203,1),(52,1204,1),(53,1205,1),(54,1206,1),(55,1207,1),(56,1208,1),(57,1209,1),(58,1240,1),(59,1241,1),(60,1242,1),(61,1243,1),(62,1244,1),(63,1245,1),(64,1246,1),(65,1247,1),(66,1248,1),(67,1249,1),(68,1270,1),(69,1271,1),(70,1272,1),(71,1273,1),(72,1274,1),(73,1275,1),(74,1276,1),(75,1277,1),(76,1278,1),(77,1279,1),(78,1300,1),(79,1301,1),(80,1302,1),(81,1304,1),(82,1305,1),(83,1306,1),(84,1330,1),(85,1331,1),(86,1332,1),(87,1333,1),(88,1334,1),(89,1335,1),(90,1336,1),(91,1337,1),(92,1360,1),(93,1361,1),(94,1362,1),(95,1364,1),(96,1365,1),(97,1366,1),(98,1367,1),(99,1368,1),(100,1390,1),(101,1391,1),(102,1392,1),(103,1394,1),(104,1395,1),(105,1396,1),(106,1397,1),(107,1420,1),(108,1421,1),(109,1422,1),(110,1423,1),(111,1424,1),(112,1445,1),(113,1446,1),(114,1447,1),(115,1448,1),(116,1449,1),(117,1450,1),(118,1451,1),(119,1452,1),(120,1480,1),(121,1481,1),(122,1482,1),(123,1483,1),(124,1484,1),(125,1485,1),(126,1486,1),(127,1487,1),(128,1510,1),(129,1511,1),(130,1512,1),(131,1513,1),(132,1514,1),(133,1515,1),(134,1516,1),(135,1517,1),(136,1540,1),(137,1541,1),(138,1542,1),(139,1543,1),(140,1544,1),(141,1545,1),(142,1546,1),(143,1547,1),(144,1570,1),(145,1571,1),(146,1572,1),(147,1573,1),(148,1574,1),(149,1000,2),(150,1001,2),(151,1002,2),(152,1020,2),(153,1030,2),(154,1031,2),(155,1032,2),(156,1033,2),(157,1034,2),(158,1035,2),(159,1036,2),(160,1050,2),(161,1051,2),(162,1052,2),(163,1053,2),(164,1054,2),(165,1055,2),(166,1056,2),(167,1057,2),(168,1058,2),(169,1059,2),(170,1080,2),(171,1081,2),(172,1082,2),(173,1083,2),(174,1084,2),(175,1100,2),(176,1101,2),(177,1130,2),(178,1131,2),(179,1132,2),(180,1133,2),(181,1134,2),(182,1135,2),(183,1150,2),(184,1151,2),(185,1152,2),(186,1153,2),(187,1154,2),(188,1170,2),(189,1171,2),(190,1172,2),(191,1173,2),(192,1174,2),(193,1175,2),(194,1176,2),(195,1177,2),(196,1200,2),(197,1201,2),(198,1202,2),(199,1203,2),(200,1204,2),(201,1205,2),(202,1206,2),(203,1207,2),(204,1208,2),(205,1209,2),(206,1240,2),(207,1241,2),(208,1242,2),(209,1243,2),(210,1244,2),(211,1245,2),(212,1246,2),(213,1247,2),(214,1248,2),(215,1249,2),(216,1270,2),(217,1271,2),(218,1272,2),(219,1273,2),(220,1274,2),(221,1275,2),(222,1276,2),(223,1277,2),(224,1278,2),(225,1279,2),(226,1300,2),(227,1301,2),(228,1302,2),(229,1304,2),(230,1305,2),(231,1306,2),(232,1330,2),(233,1331,2),(234,1332,2),(235,1333,2),(236,1334,2),(237,1335,2),(238,1336,2),(239,1337,2),(240,1360,2),(241,1361,2),(242,1362,2),(243,1364,2),(244,1365,2),(245,1366,2),(246,1367,2),(247,1368,2),(248,1390,2),(249,1391,2),(250,1392,2),(251,1394,2),(252,1395,2),(253,1396,2),(254,1397,2),(255,1420,2),(256,1421,2),(257,1422,2),(258,1423,2),(259,1424,2),(260,1445,2),(261,1446,2),(262,1447,2),(263,1448,2),(264,1449,2),(265,1450,2),(266,1451,2),(267,1452,2),(268,1480,2),(269,1481,2),(270,1482,2),(271,1483,2),(272,1484,2),(273,1485,2),(274,1486,2),(275,1487,2),(276,1510,2),(277,1511,2),(278,1512,2),(279,1513,2),(280,1514,2),(281,1515,2),(282,1516,2),(283,1517,2),(284,1540,2),(285,1541,2),(286,1542,2),(287,1543,2),(288,1544,2),(289,1545,2),(290,1546,2),(291,1547,2),(292,1570,2),(293,1571,2),(294,1572,2),(295,1573,2),(296,1574,2),(531,1000,3),(532,1001,3),(533,1002,3),(534,1020,3),(535,1030,3),(537,1032,3),(538,1035,3),(539,1031,3),(540,1033,3),(541,1034,3),(542,1036,3),(543,1050,3),(545,1052,3),(546,1051,3),(547,1053,3),(548,1054,3),(549,1055,3),(550,1056,3),(551,1057,3),(552,1058,3),(553,1059,3),(554,1080,3),(556,1082,3),(557,1081,3),(558,1083,3),(559,1084,3),(560,1100,3),(561,1101,3),(562,1130,3),(566,1000,8),(570,1150,3),(571,1152,3),(572,1151,3),(573,1575,3),(574,1577,3),(575,1578,3),(585,3000,3),(586,3001,3),(587,3002,3),(588,3003,3),(589,3010,3),(591,3012,3),(592,3011,3),(593,3020,3),(595,3022,3),(596,3021,3),(597,3030,3),(598,3032,3),(599,3031,3),(600,3040,3),(601,3042,3),(602,3000,26),(603,3001,26),(604,3002,26),(605,3003,26),(606,3010,26),(607,3011,26),(608,3012,26),(609,3020,26),(610,3021,26),(611,3022,26),(612,3030,26),(613,3031,26),(614,3032,26),(615,3040,26),(616,3041,26),(617,3042,26),(618,3041,3),(619,3050,3),(620,3051,3),(621,3052,3);
/*!40000 ALTER TABLE `tab_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_personas`
--

DROP TABLE IF EXISTS `tab_personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_personas` (
  `Id_Per` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cedula_Per` varchar(16) NOT NULL,
  `Tipo_Identificacion_Per` char(1) DEFAULT NULL COMMENT '1=cedula\n2=Residencia\n3=Pasaporte',
  `Id_Pai_Per` smallint(5) unsigned DEFAULT NULL,
  `Id_Pro_Per` mediumint(8) unsigned DEFAULT NULL,
  `Id_Can_Per` mediumint(8) unsigned DEFAULT NULL,
  `Id_Dist_Per` mediumint(8) unsigned DEFAULT NULL,
  `Id_GA_Per` tinyint(3) unsigned DEFAULT NULL,
  `Nombre_Per` varchar(60) DEFAULT NULL COMMENT 'Nombre de la persona',
  `Apellido1_Per` varchar(50) DEFAULT NULL COMMENT 'Primer Apellido',
  `Apellido2_Per` varchar(50) DEFAULT NULL COMMENT 'Segundo apellido',
  `Genero_Per` char(1) DEFAULT NULL COMMENT '1=Masculino\n2=Femenino',
  `Direccion_Per` blob COMMENT 'Direccion fisica de la persona',
  `Fecha_Nacimiento_Per` date DEFAULT NULL COMMENT 'Fecha de Nacimiento de la persona\n',
  `Foto_Per` varchar(45) DEFAULT NULL COMMENT 'Foto de la persona',
  `Activo_Per` char(1) DEFAULT NULL COMMENT '1=activo\n0=inactivo',
  PRIMARY KEY (`Id_Per`),
  KEY `fk_tab_personas_tab_paises1_idx` (`Id_Pai_Per`),
  KEY `fk_tab_personas_tab_provincias1_idx` (`Id_Pro_Per`),
  KEY `fk_tab_personas_tab_cantones1_idx` (`Id_Can_Per`),
  KEY `fk_tab_personas_tab_distritos1_idx` (`Id_Dist_Per`),
  KEY `fk_tab_personas_tab_grados_academicos1_idx` (`Id_GA_Per`),
  CONSTRAINT `fk_tab_personas_tab_cantones1` FOREIGN KEY (`Id_Can_Per`) REFERENCES `tab_cantones` (`Id_Can`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_personas_tab_distritos1` FOREIGN KEY (`Id_Dist_Per`) REFERENCES `tab_distritos` (`Id_Dist`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_personas_tab_grados_academicos1` FOREIGN KEY (`Id_GA_Per`) REFERENCES `tab_grados_academicos` (`Id_GA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_personas_tab_paises1` FOREIGN KEY (`Id_Pai_Per`) REFERENCES `tab_paises` (`Id_Pai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_personas_tab_provincias1` FOREIGN KEY (`Id_Pro_Per`) REFERENCES `tab_provincias` (`Id_Pro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_personas`
--

LOCK TABLES `tab_personas` WRITE;
/*!40000 ALTER TABLE `tab_personas` DISABLE KEYS */;
INSERT INTO `tab_personas` VALUES (1,'0-0000-0000','1',51,4,48,313,1,'root','root','root','1','Charquillo',NULL,NULL,'1'),(2,'A-AAAA-AAAA','1',51,4,48,313,1,'sudo','sudo','sudo','1','Charquillo',NULL,NULL,'1'),(3,'1-1162-0857','1',51,4,48,313,1,'Gustavo','Matamoros','González','1','800 mts noreste de la pulpería el corazón de Jesús, Concepción de San Rafel de Heredia',NULL,'1-1162-0857.jpg','1'),(55,'2-0515-0504','1',51,2,21,128,7,'Alejandra','Pérez','González','2','Iglesia Católica de Sabanilla, 150 metros sur y 50 metros este, casa mano derecha color blanco portón rojo.','1973-12-23','2-0515-0504.jpg','1');
/*!40000 ALTER TABLE `tab_personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_personas_x_carreras`
--

DROP TABLE IF EXISTS `tab_personas_x_carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_personas_x_carreras` (
  `Id_Per_PXC` int(10) unsigned NOT NULL,
  `Id_Car_PXC` int(11) NOT NULL,
  PRIMARY KEY (`Id_Per_PXC`,`Id_Car_PXC`),
  KEY `fk_tab_personas_has_tab_carreras_tab_carreras1_idx` (`Id_Car_PXC`),
  KEY `fk_tab_personas_has_tab_carreras_tab_personas1_idx` (`Id_Per_PXC`),
  CONSTRAINT `fk_tab_personas_has_tab_carreras_tab_carreras1` FOREIGN KEY (`Id_Car_PXC`) REFERENCES `tab_carreras` (`Id_Car`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_personas_has_tab_carreras_tab_personas1` FOREIGN KEY (`Id_Per_PXC`) REFERENCES `tab_personas` (`Id_Per`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_personas_x_carreras`
--

LOCK TABLES `tab_personas_x_carreras` WRITE;
/*!40000 ALTER TABLE `tab_personas_x_carreras` DISABLE KEYS */;
INSERT INTO `tab_personas_x_carreras` VALUES (6,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(30,1),(31,1),(32,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(52,1),(53,1),(54,1),(54,2),(52,4),(53,4),(4,6),(5,6),(20,6),(21,6),(22,6),(23,6),(24,6),(25,6),(26,6),(27,6),(28,6),(29,6),(48,6),(49,6),(51,6),(52,6),(53,6),(54,6),(30,7),(31,7),(54,7),(48,8),(49,8);
/*!40000 ALTER TABLE `tab_personas_x_carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_personas_x_ct`
--

DROP TABLE IF EXISTS `tab_personas_x_ct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_personas_x_ct` (
  `Id_Per_PXCT` int(10) unsigned NOT NULL,
  `Id_CT_PXCT` int(11) NOT NULL,
  PRIMARY KEY (`Id_CT_PXCT`,`Id_Per_PXCT`),
  KEY `fk_tab_personas_x_ct_tab_centros_trabajos1_idx` (`Id_CT_PXCT`),
  KEY `fk_tab_personas_x_ct_tab_personas1_idx` (`Id_Per_PXCT`),
  CONSTRAINT `fk_tab_personas_x_ct_tab_centros_trabajos1` FOREIGN KEY (`Id_CT_PXCT`) REFERENCES `tab_centros_trabajos` (`Id_CT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_personas_x_ct_tab_personas1` FOREIGN KEY (`Id_Per_PXCT`) REFERENCES `tab_personas` (`Id_Per`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_personas_x_ct`
--

LOCK TABLES `tab_personas_x_ct` WRITE;
/*!40000 ALTER TABLE `tab_personas_x_ct` DISABLE KEYS */;
INSERT INTO `tab_personas_x_ct` VALUES (4,1),(51,1),(52,1),(53,1),(54,1);
/*!40000 ALTER TABLE `tab_personas_x_ct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_personas_x_escuelas`
--

DROP TABLE IF EXISTS `tab_personas_x_escuelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_personas_x_escuelas` (
  `Id_Per_PXE` int(10) unsigned NOT NULL,
  `Id_Esc_PXE` int(11) NOT NULL,
  PRIMARY KEY (`Id_Per_PXE`,`Id_Esc_PXE`),
  KEY `fk_tab_personas_has_tab_escuelas_tab_personas1_idx` (`Id_Per_PXE`),
  KEY `fk_tab_personas_x_escuelas_tab_escuelas1_idx` (`Id_Esc_PXE`),
  CONSTRAINT `fk_tab_personas_has_tab_escuelas_tab_personas1` FOREIGN KEY (`Id_Per_PXE`) REFERENCES `tab_personas` (`Id_Per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_personas_x_escuelas_tab_escuelas1` FOREIGN KEY (`Id_Esc_PXE`) REFERENCES `tab_escuelas` (`Id_Esc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_personas_x_escuelas`
--

LOCK TABLES `tab_personas_x_escuelas` WRITE;
/*!40000 ALTER TABLE `tab_personas_x_escuelas` DISABLE KEYS */;
INSERT INTO `tab_personas_x_escuelas` VALUES (4,4),(5,4),(6,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,4),(21,4),(22,4),(23,4),(24,4),(25,4),(26,4),(27,4),(28,4),(29,4),(30,1),(30,5),(31,1),(31,5),(32,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(48,4),(48,5),(49,4),(49,5),(51,4),(52,1),(52,2),(52,4),(53,1),(53,2),(53,4),(54,1),(54,4),(54,5);
/*!40000 ALTER TABLE `tab_personas_x_escuelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_personas_x_universidades`
--

DROP TABLE IF EXISTS `tab_personas_x_universidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_personas_x_universidades` (
  `Id_Per_PXU` int(10) unsigned NOT NULL,
  `Id_Uni_PXU` int(11) NOT NULL,
  PRIMARY KEY (`Id_Per_PXU`,`Id_Uni_PXU`),
  KEY `fk_tab_personas_has_tab_universidades_tab_universidades1_idx` (`Id_Uni_PXU`),
  KEY `fk_tab_personas_has_tab_universidades_tab_personas1_idx` (`Id_Per_PXU`),
  CONSTRAINT `fk_tab_personas_has_tab_universidades_tab_personas1` FOREIGN KEY (`Id_Per_PXU`) REFERENCES `tab_personas` (`Id_Per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_personas_has_tab_universidades_tab_universidades1` FOREIGN KEY (`Id_Uni_PXU`) REFERENCES `tab_universidades` (`Id_Uni`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_personas_x_universidades`
--

LOCK TABLES `tab_personas_x_universidades` WRITE;
/*!40000 ALTER TABLE `tab_personas_x_universidades` DISABLE KEYS */;
INSERT INTO `tab_personas_x_universidades` VALUES (6,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(30,2),(31,2),(32,2),(34,2),(35,2),(36,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2),(44,2),(45,2),(52,2),(53,2),(54,2),(30,4),(31,4),(48,4),(49,4),(54,4),(4,5),(5,5),(20,5),(21,5),(22,5),(23,5),(24,5),(25,5),(26,5),(27,5),(28,5),(29,5),(48,5),(49,5),(51,5),(52,5),(53,5),(54,5);
/*!40000 ALTER TABLE `tab_personas_x_universidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_personas_x_zona`
--

DROP TABLE IF EXISTS `tab_personas_x_zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_personas_x_zona` (
  `Id_Per_PXZ` int(10) unsigned NOT NULL,
  `Id_Zon_PXZ` int(11) NOT NULL,
  PRIMARY KEY (`Id_Per_PXZ`,`Id_Zon_PXZ`),
  KEY `fk_tab_zonas_has_tab_personas_tab_personas1_idx` (`Id_Per_PXZ`),
  KEY `fk_tab_zonas_has_tab_personas_tab_zonas1_idx` (`Id_Zon_PXZ`),
  CONSTRAINT `fk_tab_zonas_has_tab_personas_tab_personas1` FOREIGN KEY (`Id_Per_PXZ`) REFERENCES `tab_personas` (`Id_Per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_zonas_has_tab_personas_tab_zonas1` FOREIGN KEY (`Id_Zon_PXZ`) REFERENCES `tab_zonas` (`Id_Zon`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_personas_x_zona`
--

LOCK TABLES `tab_personas_x_zona` WRITE;
/*!40000 ALTER TABLE `tab_personas_x_zona` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_personas_x_zona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_plantillas_correos`
--

DROP TABLE IF EXISTS `tab_plantillas_correos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_plantillas_correos` (
  `Id_PlanCor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la plantilla',
  `Nombre_PlanCor` varchar(80) DEFAULT NULL COMMENT 'Nombre de la plantilla',
  `Direccion_PlanCor` varchar(300) DEFAULT NULL,
  `Tipo_PlanCor` char(1) DEFAULT NULL COMMENT '1=Inscripcion',
  `Imagen_PlanCor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_PlanCor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_plantillas_correos`
--

LOCK TABLES `tab_plantillas_correos` WRITE;
/*!40000 ALTER TABLE `tab_plantillas_correos` DISABLE KEYS */;
INSERT INTO `tab_plantillas_correos` VALUES (1,'PlantillaCorInscripcion001','Include/emails/Inscripcion/plantilla001.php','1','Include/emails/Inscripcion/plantilla001.png'),(2,'PlantillaCorInscripcion002','Include/emails/Inscripcion/plantilla002.php','1','Include/emails/Inscripcion/plantilla002.png');
/*!40000 ALTER TABLE `tab_plantillas_correos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_plantillas_inscripcion`
--

DROP TABLE IF EXISTS `tab_plantillas_inscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_plantillas_inscripcion` (
  `Id_PI` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_PI` varchar(80) DEFAULT NULL,
  `Direccion_PI` varchar(300) DEFAULT NULL,
  `Imagen_PI` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_PI`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_plantillas_inscripcion`
--

LOCK TABLES `tab_plantillas_inscripcion` WRITE;
/*!40000 ALTER TABLE `tab_plantillas_inscripcion` DISABLE KEYS */;
INSERT INTO `tab_plantillas_inscripcion` VALUES (1,'Plantilla001','INSCRIPCION/plantilla001/index.php','INSCRIPCION/plantilla001/plantilla001.png'),(2,'Plantilla002','INSCRIPCION/plantilla002/index.php','INSCRIPCION/plantilla002/plantilla002.png');
/*!40000 ALTER TABLE `tab_plantillas_inscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_preguntas`
--

DROP TABLE IF EXISTS `tab_preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_preguntas` (
  `Id_Preg` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de la pregunta',
  `Pregunta_Preg` varchar(150) DEFAULT NULL COMMENT 'Pregunta para la recuperacion de claves',
  `Activo_Preg` char(1) DEFAULT NULL COMMENT '1=activo\n0=inactivo',
  PRIMARY KEY (`Id_Preg`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_preguntas`
--

LOCK TABLES `tab_preguntas` WRITE;
/*!40000 ALTER TABLE `tab_preguntas` DISABLE KEYS */;
INSERT INTO `tab_preguntas` VALUES (1,'¿Mascota favorita?','1'),(2,'¿Profesor Favorito?','1');
/*!40000 ALTER TABLE `tab_preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_proveedores`
--

DROP TABLE IF EXISTS `tab_proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_proveedores` (
  `Id_Prove` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Prove` varchar(200) DEFAULT NULL,
  `Activo_Prove` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Prove`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_proveedores`
--

LOCK TABLES `tab_proveedores` WRITE;
/*!40000 ALTER TABLE `tab_proveedores` DISABLE KEYS */;
INSERT INTO `tab_proveedores` VALUES (1,'DESCONOCIDA','1'),(2,'Almacen El Electrico S.A.','1'),(3,'Amoblamientos Fantini S.A.','1'),(4,'Central de Servicios PC S.A.','1'),(5,'Central Digital de Servicios S.A.','1'),(6,'CETIC','1'),(7,'CIA Mayorista BPC S.A.','1'),(8,'Comercializadora AT del Sur S.A.','1'),(9,'COMPAÑÍA LEOGAR S.A.','1'),(10,'Compañía Técnica y Comercial SATEC S.A.','1'),(11,'Componentes El ORBE S.A.','1'),(12,'Comtemporary Technology S.A.','1'),(13,'CONSORCIO COSTCOM S. S.A. Y EDDY QUESADA BOLAÑOS','1'),(14,'Consorcio Espinoza Sáenz','1'),(15,'Consorcio Interamericano de Exportación S.A.','1'),(16,'Contemporary Techonology S. A.','1'),(17,'CR Conectividad','1'),(18,'Digital Suministros S.A.','1'),(19,'DIMADIC S.A.','1'),(20,'Distribuidora Aljime de CR','1'),(21,'Distribuidora K & R Karo S.A.','1'),(22,'Distribuidora M S.A.','1'),(23,'Electro Sistemas CA S.A.','1'),(24,'Electrocomponentes de CR S.A.','1'),(25,'GMC Comercial Costa Rica S.A.','1'),(26,'Importadora Tecnologia GlobalYSMR, S.A.','1'),(27,'Indianápolis S.A.','1'),(28,'INVERSIONES LA RUECA S.A.','1'),(29,'IS Productos dr Oficina','1'),(30,'J & E Suministros S.A.','1'),(31,'Jose Luis Sanchez Calderón','1'),(32,'KAROSA','1'),(33,'MC LOGÍSTICA S.A.','1'),(34,'Mejia y Compañía','1'),(35,'MELCO S.A.','1'),(36,'METALICA IMPERIO S.A.','1'),(37,'Muebles Crometal S.A.','1'),(38,'Multiasesoria Alfa 2000 S.A.','1'),(39,'MULTIASESORIA ALFA 2000 S.A.','1'),(40,'Nortec Consultign S.A.','1'),(41,'Nutrifood S.A.','1'),(42,'PANELTECH S.A.','1'),(43,'Producciones KTC Publicitaria S.A.','1'),(44,'Proveedores de Equipos S.A.','1'),(45,'Raditel S. A.','1'),(46,'Ramiz Suplies S.A.','1'),(47,'Refrigeración Industrial Beirute S.A.','1'),(48,'Servicios Analíticos SASA S.A.','1'),(49,'Sistemas Convergentes S.A.','1'),(50,'Sistemas DLT S.A.','1'),(51,'Smart Technologies Development S.T.D. S.A.','1'),(52,'Sumar S.A.','1'),(53,'SUMINISTROS DE OFICINA Y MAS S.A.','1'),(54,'TECHNO LIFT S.A.','1'),(55,'Tecnova Soluciones S.A.','1');
/*!40000 ALTER TABLE `tab_proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_provincias`
--

DROP TABLE IF EXISTS `tab_provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_provincias` (
  `Id_Pro` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de la provincia',
  `Id_Pai_Pro` smallint(5) unsigned NOT NULL COMMENT 'ID del pais al que pertence la provincia',
  `Nombre_Pro` varchar(60) DEFAULT NULL COMMENT 'Nombre de la provincia',
  `Bandera_Peq_Pro` varchar(40) DEFAULT NULL,
  `Bandera_Gra_Pro` varchar(40) DEFAULT NULL,
  `Latitud_Pro` varchar(20) DEFAULT NULL,
  `Longitud_Pro` varchar(20) DEFAULT NULL,
  `ISO2_Pro` varchar(5) DEFAULT NULL,
  `Activo_Pro` char(1) DEFAULT NULL COMMENT '1=Activo\n0=Inactivo',
  PRIMARY KEY (`Id_Pro`),
  KEY `fk_tab_provincia_tab_paises1_idx` (`Id_Pai_Pro`),
  CONSTRAINT `fk_tab_provincia_tab_paises1` FOREIGN KEY (`Id_Pai_Pro`) REFERENCES `tab_paises` (`Id_Pai`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_provincias`
--

LOCK TABLES `tab_provincias` WRITE;
/*!40000 ALTER TABLE `tab_provincias` DISABLE KEYS */;
INSERT INTO `tab_provincias` VALUES (1,51,'San José','provincia_san_jose.png','g_provincia_san_jose.png','9.743229','-84','CR-SJ','1'),(2,51,'Alajuela','provincia_alajuela.png','g_provincia_alajuela.png','10.573958','-85','CR-A','1'),(3,51,'Cartago','provincia_cartago.png','g_provincia_cartago.png','9.862499','-84','CR-C','1'),(4,51,'Heredia','provincia_heredia.png','g_provincia_heredia.png','10.408979','-84','CR-H','1'),(5,51,'Limón','provincia_limon.png','g_provincia_limon.png','10.026858','-83','CR-L','1'),(6,51,'Guanacaste','provincia_guanacaste.png','g_provincia_guanacaste.png','10.582405','-85','CR-G','1'),(7,51,'Puntarenas','provincia_puntarenas.png','g_provincia_puntarenas.png','9.443704','-84','CR-P','1'),(8,1,'Badahšan','','',NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `tab_provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_roles`
--

DROP TABLE IF EXISTS `tab_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_roles` (
  `Id_Rol` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del Perfil',
  `Nombre_Rol` varchar(50) DEFAULT NULL COMMENT 'Nombre del perfil',
  `Activo_Rol` char(1) DEFAULT NULL COMMENT '1=Activo\n0=Inactivo',
  PRIMARY KEY (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_roles`
--

LOCK TABLES `tab_roles` WRITE;
/*!40000 ALTER TABLE `tab_roles` DISABLE KEYS */;
INSERT INTO `tab_roles` VALUES (1,'root','1'),(2,'sudo','1'),(3,'Administradores','1'),(4,'Básico','1'),(5,'Estudiante','1'),(26,'Alejandra','1');
/*!40000 ALTER TABLE `tab_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_telefonos`
--

DROP TABLE IF EXISTS `tab_telefonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_telefonos` (
  `Id_Tel` bigint(19) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del Telefono',
  `Id_Tip_Tel_Tel` tinyint(3) unsigned NOT NULL COMMENT 'Id del tipo de telefono',
  `Id_Per_Tel` int(10) unsigned NOT NULL,
  `Telefono_Tel` varchar(16) DEFAULT NULL COMMENT 'Telefono',
  `Notificacion_Tel` char(1) DEFAULT NULL COMMENT '1=lo utiliza el sistema para notificaciones\n0=no lo utiliza',
  `Publico_Tel` char(1) DEFAULT NULL COMMENT '1=el telefono es publico\n0=no',
  PRIMARY KEY (`Id_Tel`),
  KEY `fk_tab_telefonos_tab_tipos_telefonos1_idx` (`Id_Tip_Tel_Tel`),
  KEY `fk_tab_telefonos_tab_personas1_idx` (`Id_Per_Tel`),
  CONSTRAINT `fk_tab_telefonos_tab_personas1` FOREIGN KEY (`Id_Per_Tel`) REFERENCES `tab_personas` (`Id_Per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_telefonos_tab_tipos_telefonos1` FOREIGN KEY (`Id_Tip_Tel_Tel`) REFERENCES `tab_tipos_telefonos` (`Id_Tip_Tel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_telefonos`
--

LOCK TABLES `tab_telefonos` WRITE;
/*!40000 ALTER TABLE `tab_telefonos` DISABLE KEYS */;
INSERT INTO `tab_telefonos` VALUES (57,1,55,'85656379','1','1'),(58,3,55,'24417246','0','1');
/*!40000 ALTER TABLE `tab_telefonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_tipos_telefonos`
--

DROP TABLE IF EXISTS `tab_tipos_telefonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_tipos_telefonos` (
  `Id_Tip_Tel` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del tipo de telefono',
  `Nombre_Tip_Tel` varchar(50) DEFAULT NULL COMMENT 'Nombre del tipo de telefono',
  `Activo_Tip_Tel` char(1) DEFAULT NULL COMMENT '1=Activo\n0=Inactivo',
  PRIMARY KEY (`Id_Tip_Tel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_tipos_telefonos`
--

LOCK TABLES `tab_tipos_telefonos` WRITE;
/*!40000 ALTER TABLE `tab_tipos_telefonos` DISABLE KEYS */;
INSERT INTO `tab_tipos_telefonos` VALUES (1,'Celular','1'),(2,'Habitación','1'),(3,'Oficina','1'),(4,'prueba','0'),(5,'pruena','0');
/*!40000 ALTER TABLE `tab_tipos_telefonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_transferencias`
--

DROP TABLE IF EXISTS `tab_transferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_transferencias` (
  `Id_Trans` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_Trans` varchar(45) DEFAULT NULL,
  `Activo_Trans` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Trans`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_transferencias`
--

LOCK TABLES `tab_transferencias` WRITE;
/*!40000 ALTER TABLE `tab_transferencias` DISABLE KEYS */;
INSERT INTO `tab_transferencias` VALUES (1,'DESCONOCIDA','1'),(2,'TF-00001307','1'),(3,'TF-00001367','1'),(4,'TF-00001669','1'),(5,'TF-00001838','1'),(6,'TF-00001935','1'),(7,'TF-00001960','1'),(8,'TF-00002004','1'),(9,'TF-00002259','1'),(10,'TF-00002387','1'),(11,'TF-00002389','1'),(12,'TF-00002436','1'),(13,'TF-00006377','1'),(14,'TF-00006492','1'),(15,'TF-00006797','1'),(16,'TF-00006803','1'),(17,'TF-00006849','1'),(18,'TF-00007028','1'),(19,'TF-00007051','1'),(20,'TF-00007053','1'),(21,'TF-00007117','1'),(22,'TF-00007568','1'),(23,'TF-00007660','1'),(24,'TF-00007663','1'),(25,'TF-00007755','1'),(26,'TF-00007757','1'),(27,'TF-00007757','1'),(28,'TF-00007905','1'),(29,'TF-00007908','1'),(30,'TF-00008071','1'),(31,'TF-00008099','1'),(32,'TF-00008175','1'),(33,'TF-00008301','1'),(34,'TF-00008304','1'),(35,'TF-00008305','1'),(36,'TF-00008366','1'),(37,'TF-00008370','1'),(38,'TF-00008371','1'),(39,'TF-00008371','1'),(40,'TF-00008372','1'),(41,'TF-00008398','1'),(42,'TF-00008400','1'),(43,'TF-00008637','1');
/*!40000 ALTER TABLE `tab_transferencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_universidades`
--

DROP TABLE IF EXISTS `tab_universidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_universidades` (
  `Id_Uni` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Universidad',
  `Id_CT_Uni` int(11) NOT NULL COMMENT 'ID del centro de trabajo',
  `Nombre_Uni` varchar(200) DEFAULT NULL COMMENT 'Nombre de la universidad',
  `Diminutivo_Uni` varchar(45) DEFAULT NULL COMMENT 'Diminutivo de la universidad',
  `Logo_Uni` varchar(45) DEFAULT NULL COMMENT 'Logo de la universidad',
  `Telefono_Uni` varchar(9) DEFAULT NULL COMMENT 'Telefono de la universidad',
  `Fax_Uni` varchar(9) DEFAULT NULL COMMENT 'Fax de la universidad',
  `Direccion_Uni` blob COMMENT 'Direccion fisica de la universidad',
  `Correo_Uni` varchar(100) DEFAULT NULL COMMENT 'Correo de la universidad\n',
  `Latitud_Uni` varchar(20) DEFAULT NULL COMMENT 'Latitud de la universidad',
  `Longitud_Uni` varchar(20) DEFAULT NULL COMMENT 'Longitud de la universidad',
  `Activo_Uni` char(1) DEFAULT NULL COMMENT '1=activa\n0=inactiva',
  PRIMARY KEY (`Id_Uni`),
  KEY `fk_tab_universidades_tab_centros_trabajos1_idx` (`Id_CT_Uni`),
  CONSTRAINT `fk_tab_universidades_tab_centros_trabajos1` FOREIGN KEY (`Id_CT_Uni`) REFERENCES `tab_centros_trabajos` (`Id_CT`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_universidades`
--

LOCK TABLES `tab_universidades` WRITE;
/*!40000 ALTER TABLE `tab_universidades` DISABLE KEYS */;
INSERT INTO `tab_universidades` VALUES (1,1,'CONARE','CONARE','',NULL,NULL,NULL,NULL,NULL,NULL,'1'),(2,1,'Universidad Nacional','UNA','','','',NULL,NULL,NULL,NULL,'1'),(3,1,'Universidad de Costa Rica','UCR','',NULL,NULL,NULL,NULL,NULL,NULL,'1'),(4,1,'Universidad Estatal a Distancia','UNED','',NULL,NULL,NULL,NULL,NULL,NULL,'1'),(5,1,'Tecnológico de Costa Rica','TEC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `tab_universidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_usuarios`
--

DROP TABLE IF EXISTS `tab_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_usuarios` (
  `Id_Per_Usu` int(10) unsigned NOT NULL,
  `Id_Rol_Usu` smallint(5) unsigned NOT NULL COMMENT 'Perfil del Usuario',
  `Id_Preg_Usu` tinyint(3) unsigned NOT NULL COMMENT 'Id de pregunta para recuperacion de contraseÃ±a',
  `Password_Usu` varchar(100) DEFAULT NULL COMMENT 'ContraseÃ±a de usuario',
  `Estado_Conexion_Usu` tinyint(1) DEFAULT NULL COMMENT '1=conectado\n0=Inactivo',
  `Fecha_Hora_Conexion_Usu` datetime DEFAULT NULL COMMENT 'Fecha y hora de ultima conexion del usuario',
  `Respuesta_Preg_Usu` varchar(100) DEFAULT NULL COMMENT 'Respuesta de la pregunta para la recuperacion',
  `Cambio_Contrasena_Usu` tinyint(1) DEFAULT NULL COMMENT '1=Solicito cambio de contraseÃ±a\n0=no lo solicito',
  `Key_Usu` varchar(45) DEFAULT NULL COMMENT 'Llave unica de cada conexion seguridad',
  `Nombre_Session_Usu` varchar(100) DEFAULT NULL COMMENT 'Nombre unico de session por usuario',
  `URL_Usu` blob COMMENT 'URL generada dinamicamente por el sistema seguridad',
  `Cookie_Usu` varchar(100) DEFAULT NULL,
  `Activo_Usu` char(1) DEFAULT NULL COMMENT '1=activo\n0=inactivo',
  PRIMARY KEY (`Id_Per_Usu`),
  KEY `fk_tab_usuarios_tab_perfiles1_idx` (`Id_Rol_Usu`),
  KEY `fk_tab_usuarios_tab_preguntas1_idx` (`Id_Preg_Usu`),
  KEY `fk_tab_usuarios_tab_personas1_idx` (`Id_Per_Usu`),
  CONSTRAINT `fk_tab_usuarios_tab_perfiles1` FOREIGN KEY (`Id_Rol_Usu`) REFERENCES `tab_roles` (`Id_Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_usuarios_tab_personas1` FOREIGN KEY (`Id_Per_Usu`) REFERENCES `tab_personas` (`Id_Per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_usuarios_tab_preguntas1` FOREIGN KEY (`Id_Preg_Usu`) REFERENCES `tab_preguntas` (`Id_Preg`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_usuarios`
--

LOCK TABLES `tab_usuarios` WRITE;
/*!40000 ALTER TABLE `tab_usuarios` DISABLE KEYS */;
INSERT INTO `tab_usuarios` VALUES (1,3,1,'1ef4c3dc980359d404bef57d6a99c72e',0,NULL,'sheska',NULL,NULL,NULL,NULL,NULL,'1'),(2,3,1,'1ef4c3dc980359d404bef57d6a99c72e',NULL,NULL,'sheska',NULL,NULL,NULL,NULL,NULL,'1'),(3,3,2,'1ef4c3dc980359d404bef57d6a99c72e',0,NULL,'sheska',NULL,NULL,NULL,NULL,'50753467','1'),(55,26,2,'f0a74000f23e9f6bbaf53bc1ea13f951',1,'2016-04-27 15:00:00','Amador',NULL,'kI750yp','SAE2-0515-0504','http://desarrollo.siua.ac.cr/Sistemas/SAE_INVENTARIO_TMP/Principal.php?cedula=hW51Z2FmY4N2dWY=','780216368','1');
/*!40000 ALTER TABLE `tab_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_zonas_tmp`
--

DROP TABLE IF EXISTS `tab_zonas_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_zonas_tmp` (
  `Id_Zonas_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Zonas_tmp` varchar(100) DEFAULT NULL,
  `Activo_Zonas_tmp` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Zonas_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_zonas_tmp`
--

LOCK TABLES `tab_zonas_tmp` WRITE;
/*!40000 ALTER TABLE `tab_zonas_tmp` DISABLE KEYS */;
INSERT INTO `tab_zonas_tmp` VALUES (1,'Adm. CONARE (Asistente)','1'),(2,'Adm. CONARE (Bodega)','1'),(3,'Adm. CONARE (Jefatura)','1'),(4,'Adm. CONARE (Recepción)','1'),(5,'Adm. TEC (Planta Baja - Adm)','1'),(6,'Adm. TEC (Planta Baja - Bodega)','1'),(7,'Adm. TEC (Planta Baja - Oficina Coordinación Académica)','1'),(8,'Adm. TEC (Planta Baja - Oficina Coordinación Carrera)','1'),(9,'Adm. UCR (Planta Alta)','1'),(10,'Adm. UCR (Planta baja)','1'),(11,'Adm. UNA (Asistente Jefatura)','1'),(12,'Adm. UNA (Bodega)','1'),(13,'Adm. UNA (Comedor)','1'),(14,'Adm. UNA (Coordinación Administración)','1'),(15,'Adm. UNA (Coordinación Ingles)','1'),(16,'Adm. UNA (Coordinación Química)','1'),(17,'Adm. UNA (Jefatura)','1'),(18,'Adm. UNA (Recepción)','1'),(19,'Asociación UCR','1'),(20,'Asociación UNA','1'),(21,'Aula #01','1'),(22,'Aula #02','1'),(23,'Aula #03','1'),(24,'Aula #04','1'),(25,'Aula #05','1'),(26,'Aula #06','1'),(27,'Aula #07','1'),(28,'Aula #08','1'),(29,'Aula #09','1'),(30,'Aula #10','1'),(31,'Aula #11','1'),(32,'Aula #12','1'),(33,'Aula #13','1'),(34,'Aula #14','1'),(35,'Aula #15','1'),(36,'Aula #16','1'),(37,'Aula #17','1'),(38,'Aula #18','1'),(39,'Aula #19','1'),(40,'Aula / Taller #04','1'),(41,'Biblioteca (ColecciónBibliográfica)','1'),(42,'Biblioteca (Cubiculo Usuarios con NEE)','1'),(43,'Biblioteca (Sala de Trabajo)','1'),(44,'Comedor Funcionarios','1'),(45,'Comedor Funcionarios Bodega de Materiales (Planta Baja)','1'),(46,'Comedor Funcionarios Bodega de Suministros (Planta Alta)','1'),(47,'Conserjes (Comedor)','1'),(48,'Conserjes (Pileta)','1'),(49,'Estudio de Iluminación y Fotografía (Planta Alta)','1'),(50,'Lab. de Materiales Ingeniería Mecánica (Planta Alta)','1'),(51,'Lab. de Materiales Ingeniería Mecánica (Planta Baja)','1'),(52,'Lab. De Protección Contra el Fuego','1'),(53,'Lab. Diseño Gráfico #03 (Aula Taller - Planta Alta)','1'),(54,'Lab. Docencia Química Industrial (Orgánica - Planta Baja )','1'),(55,'Lab. Ergonometría','1'),(56,'Lab. Física A (Aula)','1'),(57,'Lab. Física A (Bodega)','1'),(58,'Lab. Física A (Oficina)','1'),(59,'Lab. Idiomas #1','1'),(60,'Lab. Idiomas #2','1'),(61,'Lab. Infor. #1','1'),(62,'Lab. Infor. #2','1'),(63,'Lab. Infor. #3','1'),(64,'Lab. Infor. #4','1'),(65,'Lab. Infor. #5','1'),(66,'Lab. Infor. #6','1'),(67,'Lab. Infor. #7','1'),(68,'Lab. Investigación TEC (Planta Alta)','1'),(69,'Lab. Manofactory Machine','1'),(70,'Lab. Metrología','1'),(71,'Lab. Multiuso (Aula)','1'),(72,'Lab. Multiuso (Bodega TEC)','1'),(73,'Lab. Multiuso (Bodega UCR)','1'),(74,'Lab. Multiuso (Bodega UNA)','1'),(75,'Lab. Preparación (Analítica - Planta Alta) (Area de Trabajo)','1'),(76,'Lab. Preparación (Analítica - Planta Alta) (Bodega)','1'),(77,'Lab. Preparación (Analítica - Planta Alta) (Cuarto de Balanza)','1'),(78,'Lab. Preparación (Analítica - Planta Alta) (Cuarto Limpio)','1'),(79,'Lab. Preparación (Analítica - Planta Alta) (Oficina)','1'),(80,'Lab. Preparación (Analítica - Planta Alta) (Reactivos)','1'),(81,'Lab. Química General (Aula)','1'),(82,'Lab. Química General (Bodega)','1'),(83,'Lab. Química General (Oficina)','1'),(84,'Lab. Robótica','1'),(85,'Lab. Termofluidos y Electrotécnia','1'),(86,'Oficina de Extensión Cultural','1'),(87,'Oficina de Monitoreo','1'),(88,'Oficina de Profesores Diseño Gráfico','1'),(89,'Oficina de Psicología UCR','1'),(90,'Oficina de Psicopedagogía del TEC','1'),(91,'Sala de Reuniones CONARE','1'),(92,'Sala Profesores #1','1'),(93,'Sala Profesores #2','1'),(94,'Taller de Retoque Fotográfico (Planta Alta)','1'),(95,'Taller Diseño Gráfico #01 (Aula Taller #01 - Planta Baja)','1'),(96,'Taller Diseño Gráfico #02 (Aula Taller #02 - Planta Alta)','1'),(97,'Taller Materiales #01','1'),(98,'Taller Materiales #02','1'),(99,'UGIT','1'),(100,'Vida Estudiantil (Bodega)','1'),(101,'Vida Estudiantil (Orientación UCR)','1'),(102,'Vida Estudiantil (Orientación UNA)','1'),(103,'Vida Estudiantil (Recepción)','1'),(104,'Vida Estudiantil (TS - TEC)','1'),(105,'Vida Estudiantil (TS - UCR)','1'),(106,'Vida Estudiantil (TS - UNA)','1'),(107,'TAVO juan','0'),(108,'tavo2','0'),(109,'tavo3','0'),(110,'','0');
/*!40000 ALTER TABLE `tab_zonas_tmp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-28 16:13:46
