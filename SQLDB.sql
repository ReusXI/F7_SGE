CREATE DATABASE  IF NOT EXISTS `sg_e_2023` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sg_e_2023`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: sg_e_2023
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `codigo_incidente` varchar(50) NOT NULL,
  `t_institucion` varchar(2) DEFAULT NULL,
  `c_institucion` varchar(2) DEFAULT NULL,
  `asunto` varchar(100) DEFAULT NULL,
  `f_incidente` date DEFAULT NULL,
  `f_deteccion_incidente` date DEFAULT NULL,
  `descripcion_incidente` varchar(1000) DEFAULT NULL,
  `r_t_afectados` varchar(1000) DEFAULT NULL,
  `codigo_clasificacion_1` varchar(2) DEFAULT NULL,
  `codigo_clasificacion_2` varchar(2) DEFAULT NULL,
  `impacto_economico_estimado` float DEFAULT NULL,
  `daño_reputacional` varchar(1) DEFAULT NULL,
  `afecto_procesos_criticos` varchar(1) DEFAULT NULL,
  `tiempo_interrupcion` int DEFAULT NULL,
  `tiempo_resolucion_incidente` int DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`codigo_incidente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES ('INF-2023-001','IT','IT','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','2023-02-02','2023-02-10','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso recibimos el id de la localidad y consultamos en la base','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso recibimos el id de la localidad y consultamos en la base','02','04',1,'1','0',1,1,'Epinto','2023-02-02'),('INF-2023-002','IT','03','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','2023-02-07','2023-02-09','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso recibimos el id de la localidad y consultamos en la base','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso recibimos el id de la localidad y consultamos en la base','02','05',0,'0','1',1,2,'Osman','2023-02-07'),('INF-2023-003','IT','03','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','2021-01-07','2023-02-16','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','01','05',0,'0','0',4,3,'Osman','2023-02-07'),('INF-2023-004','IT','03','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','2022-09-08','2023-02-07','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','01','07',0,'1','1',5,4,'Osman','2023-02-07'),('INF-2023-005','IT','03','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','2022-08-06','2023-02-07','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','Después de tener el registro guardado en la base de datos posiblemente queremos modificarlo para eso','02','05',0,'1','1',2,3,'Osman','2023-02-07');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opciones`
--

DROP TABLE IF EXISTS `opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opciones` (
  `id` varchar(1) NOT NULL,
  `opcion` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opciones`
--

LOCK TABLES `opciones` WRITE;
/*!40000 ALTER TABLE `opciones` DISABLE KEYS */;
INSERT INTO `opciones` VALUES ('0','SI'),('1','NO');
/*!40000 ALTER TABLE `opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opciones2`
--

DROP TABLE IF EXISTS `opciones2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opciones2` (
  `id` int NOT NULL,
  `opcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opciones2`
--

LOCK TABLES `opciones2` WRITE;
/*!40000 ALTER TABLE `opciones2` DISABLE KEYS */;
INSERT INTO `opciones2` VALUES (0,'SI'),(1,'NO');
/*!40000 ALTER TABLE `opciones2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secuencia`
--

DROP TABLE IF EXISTS `secuencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secuencia` (
  `id` int NOT NULL,
  `Before_Num` int NOT NULL,
  `After_Num` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secuencia`
--

LOCK TABLES `secuencia` WRITE;
/*!40000 ALTER TABLE `secuencia` DISABLE KEYS */;
INSERT INTO `secuencia` VALUES (1,5,6);
/*!40000 ALTER TABLE `secuencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semestre`
--

DROP TABLE IF EXISTS `semestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `semestre` (
  `id` int NOT NULL,
  `InicioSemestre` varchar(45) DEFAULT NULL,
  `FinSemestre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semestre`
--

LOCK TABLES `semestre` WRITE;
/*!40000 ALTER TABLE `semestre` DISABLE KEYS */;
/*!40000 ALTER TABLE `semestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomia1`
--

DROP TABLE IF EXISTS `taxonomia1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxonomia1` (
  `id` varchar(2) DEFAULT NULL,
  `taxonomia` varchar(45) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `codigo` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomia1`
--

LOCK TABLES `taxonomia1` WRITE;
/*!40000 ALTER TABLE `taxonomia1` DISABLE KEYS */;
INSERT INTO `taxonomia1` VALUES ('01','Codigo Dañino','SEGURIDAD',1),('02','Disponibilidad','TECNOLOGIA',2),('02','Disponibilidad','SEGURIDAD',3);
/*!40000 ALTER TABLE `taxonomia1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomia2`
--

DROP TABLE IF EXISTS `taxonomia2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxonomia2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `taxonomia1` varchar(2) NOT NULL,
  `codigo` varchar(2) NOT NULL,
  `taxonomia2` varchar(45) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `taxo` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomia2`
--

LOCK TABLES `taxonomia2` WRITE;
/*!40000 ALTER TABLE `taxonomia2` DISABLE KEYS */;
INSERT INTO `taxonomia2` VALUES (1,'01','01','VIRUS','SEGURIDAD',1),(2,'01','02','GUSANOS','SEGURIDAD',1),(3,'01','03','TROYANOS','SEGURIDAD',1),(4,'01','04','SPYWARE','SEGURIDAD',1),(5,'01','05','ROOTKIT','SEGURIDAD',1),(6,'01','06','RAMSOMWARE','SEGURIDAD',1),(7,'01','07','BOTNET','SEGURIDAD',1),(8,'01','08','RAT(Herramientas de Acceso Remoto)','SEGURIDAD',1),(9,'02','01','DENEGACION DEL SERVICIO (DoS)/(DDoS)','SEGURIDAD',3),(10,'02','02','FALLO DE HARDWARE','TECNOLOGIA',2),(11,'02','03','FALLO DE SOFTWARE','TECNOLOGIA',2),(12,'02','04','ERROR HUMANO','TECNOLOGIA',2),(13,'02','05','SABOTAJE','SEGURIDAD',3);
/*!40000 ALTER TABLE `taxonomia2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomia3`
--

DROP TABLE IF EXISTS `taxonomia3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxonomia3` (
  `id` int NOT NULL AUTO_INCREMENT,
  `taxonomia1` varchar(45) DEFAULT NULL,
  `taxonomia2` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomia3`
--

LOCK TABLES `taxonomia3` WRITE;
/*!40000 ALTER TABLE `taxonomia3` DISABLE KEYS */;
INSERT INTO `taxonomia3` VALUES (1,'02','DENEGACION DEL SERVICIO (DoS)/(DDoS)','SEGURIDAD','01'),(2,'02','FALLO DE HARDWARE','TECNOLOGIA','02'),(3,'02','FALLO DE SOFTWARE','TECNOLOGIA','03'),(4,'02','ERROR HUMANO','TECNOLOGIA','04'),(5,'02','SABOTAJE','SEGURIDAD','05');
/*!40000 ALTER TABLE `taxonomia3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Uss` varchar(150) DEFAULT NULL,
  `Pass` varchar(150) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Osman','1234','SEGURIDAD','ACTIVO'),(2,'Epinto','4321','TECNOLOGIA','ACTIVO');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sg_e_2023'
--

--
-- Dumping routines for database 'sg_e_2023'
--
/*!50003 DROP PROCEDURE IF EXISTS `EDITAR_EVENTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_EVENTO`(IN NEWc_incidente varchar(50),
IN NEWt_institucion varchar(2),IN NEWc_institucion varchar(2),IN NEWasunto varchar(100),IN NEWf_incidente varchar(10),IN NEWf_deteccion_incidente varchar(10),
IN NEWdescripcion_incidente varchar(1000),IN NEWr_t_afectados varchar(1000),IN NEWcodigo_clasificacion_1 varchar(2),IN NEWcodigo_clasificacion_2 varchar(2),
IN NEWimpacto_economico_estimado INT,IN NEWdaño_reputacional varchar(1),IN NEWafecto_procesos_criticos varchar(1), IN NEWtiempo_interrupcion INT,
IN NEWtiempo_resolucion_incidente INT)
BEGIN
         UPDATE evento set t_institucion = NEWt_institucion, c_institucion = NEWt_institucion, asunto = NEWasunto, f_incidente = NEWf_incidente, f_deteccion_incidente = NEWf_deteccion_incidente, descripcion_incidente = NEWdescripcion_incidente,r_t_afectados = NEWr_t_afectados, codigo_clasificacion_1 = NEWcodigo_clasificacion_1, codigo_clasificacion_2 = NEWcodigo_clasificacion_2, impacto_economico_estimado = NEWimpacto_economico_estimado, daño_reputacional = NEWdaño_reputacional, afecto_procesos_criticos = NEWafecto_procesos_criticos, tiempo_interrupcion = NEWtiempo_interrupcion, tiempo_resolucion_incidente = NEWtiempo_resolucion_incidente WHERE codigo_incidente = NEWc_incidente;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `INSERTAR_EVENTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERTAR_EVENTO`(
IN NEWt_institucion varchar(2),IN NEWc_institucion varchar(2),IN NEWasunto varchar(100),IN NEWf_incidente varchar(10),IN NEWf_deteccion_incidente varchar(10),
IN NEWdescripcion_incidente varchar(1000),IN NEWr_t_afectados varchar(1000),IN NEWcodigo_clasificacion_1 varchar(2),IN NEWcodigo_clasificacion_2 varchar(2),
IN NEWimpacto_economico_estimado INT,IN NEWdaño_reputacional varchar(1),IN NEWafecto_procesos_criticos varchar(1), IN NEWtiempo_interrupcion INT,
IN NEWtiempo_resolucion_incidente INT, IN NEWusuario varchar(50))
BEGIN
    DECLARE CODIGO varchar(13);
    BEGIN
    CALL sp_Generar_Codigo(@p_codigo_secundario);
SET CODIGO = @p_codigo_secundario;
         INSERT INTO evento values(CODIGO,NEWt_institucion,NEWc_institucion,NEWasunto,NEWf_incidente,NEWf_deteccion_incidente,
NEWdescripcion_incidente,NEWr_t_afectados,NEWcodigo_clasificacion_1,NEWcodigo_clasificacion_2,
NEWimpacto_economico_estimado,NEWdaño_reputacional,NEWafecto_procesos_criticos,NEWtiempo_interrupcion,
NEWtiempo_resolucion_incidente,NEWusuario,DATE(NOW())) ;
    END;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Generar_Codigo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Generar_Codigo`(
OUT p_codigo_secundario VARCHAR(13) 
)
BEGIN
    DECLARE contador INT;
    DECLARE año varchar(4);
    DECLARE siguiente INT;
    BEGIN
        SET contador= (SELECT After_Num FROM secuencia where id = 1);
        set año = (select year(now()));
        IF(contador<10)THEN
            SET p_codigo_secundario= CONCAT('INF-',año,'-00',contador);
            ELSE IF(contador<100) THEN
                SET p_codigo_secundario= CONCAT('INF-',año,'-0',contador);
                ELSE IF(contador<1000)THEN
                    SET p_codigo_secundario= CONCAT('INF-',año,'-',contador);
                    ELSE IF(contador<10000)THEN
						SET p_codigo_secundario= CONCAT('INF-',año,'-',contador);
					END IF;
                END IF;
            END IF;
        END IF; 
        update secuencia set After_Num = (contador+1), Before_Num = contador Where id = 1;  
    END;
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

-- Dump completed on 2023-02-08 14:09:37
