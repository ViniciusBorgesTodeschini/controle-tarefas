-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: controle_tarefas
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.17-MariaDB

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
-- Table structure for table `atendimento`
--

DROP TABLE IF EXISTS `atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalhes` varchar(500) NOT NULL,
  `inicio_atend` datetime NOT NULL,
  `fim_atend` datetime NOT NULL,
  `id_assunto` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_meio_atend` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento`
--

LOCK TABLES `atendimento` WRITE;
/*!40000 ALTER TABLE `atendimento` DISABLE KEYS */;
INSERT INTO `atendimento` VALUES (6,'Funcionário do cliente veio trazer o seu atestado.','2022-04-21 19:52:00','2022-04-21 19:54:00',9,38,5),(7,'A funcionária do cliente pediu ajuda para emitir notas fiscais.','2022-04-21 15:48:00','2022-04-21 16:10:00',8,39,6),(8,'A funcionária do cliente pediu o balanço do último exercício.','2022-04-22 19:57:00','2022-04-22 20:12:00',6,39,7);
/*!40000 ALTER TABLE `atendimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendimento_assunto`
--

DROP TABLE IF EXISTS `atendimento_assunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendimento_assunto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento_assunto`
--

LOCK TABLES `atendimento_assunto` WRITE;
/*!40000 ALTER TABLE `atendimento_assunto` DISABLE KEYS */;
INSERT INTO `atendimento_assunto` VALUES (6,'Balanços'),(7,'Parcelamentos'),(8,'Notas Fiscais'),(9,'Atestados');
/*!40000 ALTER TABLE `atendimento_assunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendimento_funcionario`
--

DROP TABLE IF EXISTS `atendimento_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendimento_funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_atend` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento_funcionario`
--

LOCK TABLES `atendimento_funcionario` WRITE;
/*!40000 ALTER TABLE `atendimento_funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `atendimento_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendimento_meio`
--

DROP TABLE IF EXISTS `atendimento_meio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendimento_meio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimento_meio`
--

LOCK TABLES `atendimento_meio` WRITE;
/*!40000 ALTER TABLE `atendimento_meio` DISABLE KEYS */;
INSERT INTO `atendimento_meio` VALUES (5,'Presencial'),(6,'Telefone'),(7,'e-mail'),(8,'WhatsApp');
/*!40000 ALTER TABLE `atendimento_meio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (5,'Contábil'),(6,'Fiscal'),(7,'Recepção'),(8,'Produção');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `tipo` char(2) NOT NULL,
  `documento` varchar(14) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `telefone` char(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT 'I',
  `cliente` char(1) DEFAULT 'N',
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (34,'PJ Escritório','pj','00000000000001','Rua teste, 420.','+554834301245','escritorio@escritorio','A','S'),(35,'Usuario Funcionario do Escritório','pf','00000000000','Rua teste, 420.','+554834301245','fun1@fun1','A','N'),(36,'Cliente 1 do Escritório - PJ','pj','00000000000002','Rua teste, 420.','+554834301245','clipj1@clipj1','A','S'),(37,'Cliente 2 do Escritório - PF','pf','00000000003','Rua teste, 420.','+554834301245','clipf2@clipf2','I','S'),(38,'Funcionario 1 cliente 1','pf','00000000004','Rua teste, 420.','+554834301245','fun1cli1@fun1cli1','A','N'),(39,'Funcionario 1 cliente 2','pf','00000000005','Rua teste, 420.','+554834301245','fun1cli2@fun1cli2','I','N'),(43,'Cliente JSON','pf','12456767811','rua json, 123','554812345678','clientejson@clientejson','A','S'),(54,'Cliente JSON 2','pf','12456767812','rua json, 123','554812345678','clientejson2@clientejson2','A','S'),(55,'Cliente JSON 3','pf','12456767813','rua json, 123','554812345678','clientejso3n@clientejson3','A','S'),(58,'Cliente JSON 4','pf','12456767814','rua json, 123','554812345678','clientejson4@clientejson4','A','S'),(60,'Cliente JSON 5','pf','12456767815','rua json, 123','554812345678','clientejson5@clientejson5','A','S');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_departamento`
--

DROP TABLE IF EXISTS `pessoa_departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `id_dpto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_departamento`
--

LOCK TABLES `pessoa_departamento` WRITE;
/*!40000 ALTER TABLE `pessoa_departamento` DISABLE KEYS */;
INSERT INTO `pessoa_departamento` VALUES (5,35,5),(6,38,8),(7,39,7);
/*!40000 ALTER TABLE `pessoa_departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pj_pf`
--

DROP TABLE IF EXISTS `pj_pf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pj_pf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pf` int(11) NOT NULL,
  `id_pj` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pj_pf`
--

LOCK TABLES `pj_pf` WRITE;
/*!40000 ALTER TABLE `pj_pf` DISABLE KEYS */;
INSERT INTO `pj_pf` VALUES (10,35,34),(11,38,36),(12,39,37);
/*!40000 ALTER TABLE `pj_pf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `data_acesso` datetime DEFAULT NULL,
  `tipo` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_usuario` (`nome_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (9,34,'normal','normal@normal','202cb962ac59075b964b07152d234b70','2022-04-21 12:15:52','2022-05-07 13:59:02',NULL,'N','A'),(10,34,'administrador','adm@adm','202cb962ac59075b964b07152d234b70','2022-04-21 12:34:41','2022-05-07 14:00:23',NULL,'A','A'),(11,34,'user com senha 123','user','202cb962ac59075b964b07152d234b70','2022-05-07 14:04:40',NULL,NULL,'A','A'),(12,35,'inativo','inativo@inativo','b58c50e209762c24adb9f29daffe249c','2022-05-07 14:06:41','2022-05-14 11:06:28',NULL,'N','I');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'controle_tarefas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-14 13:37:34
