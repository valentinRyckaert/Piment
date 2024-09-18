-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pompiers
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB

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
-- Table structure for table `casernes`
--


create database if not exists `pompiers`;
use `pompiers`;

create user if not exists `pompier_user` IDENTIFIED BY '123+aze';
grant create, select, update, delete, drop on `pompiers`.* to `pompier_user`;
FLUSH PRIVILEGES;

DROP TABLE IF EXISTS `casernes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casernes` (
  `NumCaserne` int(11) NOT NULL,
  `Adresse` varchar(15) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `Ville` varchar(20) DEFAULT NULL,
  `CodeTypeC` int(11) DEFAULT NULL,
  PRIMARY KEY (`NumCaserne`),
  KEY `FK_typeC` (`CodeTypeC`),
  CONSTRAINT `FK_typeC` FOREIGN KEY (`CodeTypeC`) REFERENCES `typecasernes` (`CodeTypeC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casernes`
--

LOCK TABLES `casernes` WRITE;
/*!40000 ALTER TABLE `casernes` DISABLE KEYS */;
INSERT INTO `casernes` VALUES (5,'SP','69800','Saint Priest',1),(6,'Zola','69100','Villeurbanne',1),(7,'Croix Rousse','69004','Lyon',1),(8,'Doua','69100','Doua',2),(19,'Ch','69008','Ch',3);
/*!40000 ALTER TABLE `casernes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `CodeGrade` varchar(2) NOT NULL,
  `NomGrade` varchar(15) DEFAULT NULL,
  `CoefIndem` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodeGrade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES ('1C','1ere classe',6),('AC','Adjudent chef',8),('Ad','Adjudent',8),('Ca','Caporal',7),('CC','Capo. Chef',7),('Ct','Capitaine',10),('In','Infirmier',10),('Lt','Lieutenant',10),('Ma','Major',9),('SC','Sgt Chef',8),('Sg','Sergent',8),('SP','Sapeur',6);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interventions`
--

DROP TABLE IF EXISTS `interventions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interventions` (
  `DateInter` date NOT NULL,
  `NumInter` int(11) NOT NULL,
  `TypeInter` varchar(10) DEFAULT NULL,
  `DureeInter` int(11) DEFAULT NULL,
  `EtatInter` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`DateInter`,`NumInter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interventions`
--

LOCK TABLES `interventions` WRITE;
/*!40000 ALTER TABLE `interventions` DISABLE KEYS */;
INSERT INTO `interventions` VALUES ('2009-01-01',1,'Secours',1,'OK'),('2009-01-01',2,'Secours',1,'OK'),('2009-01-01',3,'Feu',3,'OK'),('2009-01-02',1,'Feu',6,'En cours'),('2009-01-02',2,'Secours',2,'OK'),('2009-11-27',1,'Feu',6,'En cours');
/*!40000 ALTER TABLE `interventions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pompier_intervention`
--

DROP TABLE IF EXISTS `pompier_intervention`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pompier_intervention` (
  `DateInter` date NOT NULL,
  `NumInter` int(11) NOT NULL,
  `Matricule` varchar(7) NOT NULL,
  PRIMARY KEY (`DateInter`,`NumInter`,`Matricule`),
  KEY `FK_Pompier3` (`Matricule`),
  CONSTRAINT `FK_Inter` FOREIGN KEY (`DateInter`, `NumInter`) REFERENCES `interventions` (`DateInter`, `NumInter`),
  CONSTRAINT `FK_Pompier3` FOREIGN KEY (`Matricule`) REFERENCES `pompiers` (`Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pompier_intervention`
--

LOCK TABLES `pompier_intervention` WRITE;
/*!40000 ALTER TABLE `pompier_intervention` DISABLE KEYS */;
INSERT INTO `pompier_intervention` VALUES ('2009-01-01',1,'Ma0001'),('2009-01-01',1,'Ma0004'),('2009-01-01',1,'Ma0005'),('2009-01-01',1,'Ma0008'),('2009-01-01',2,'Ma0004'),('2009-01-01',3,'Ma0004'),('2009-01-02',1,'Ma0004'),('2009-01-02',2,'Ma0004'),('2009-11-27',1,'Ma0004');
/*!40000 ALTER TABLE `pompier_intervention` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pompier_qualification`
--

DROP TABLE IF EXISTS `pompier_qualification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pompier_qualification` (
  `Matricule` varchar(7) NOT NULL,
  `CodeQualif` varchar(5) NOT NULL,
  `DateObtention` date DEFAULT NULL,
  `DateRecyclage` date DEFAULT NULL,
  PRIMARY KEY (`Matricule`,`CodeQualif`),
  KEY `FK_Qualif1` (`CodeQualif`),
  CONSTRAINT `FK_Pompier1` FOREIGN KEY (`Matricule`) REFERENCES `pompiers` (`Matricule`),
  CONSTRAINT `FK_Qualif1` FOREIGN KEY (`CodeQualif`) REFERENCES `qualifications` (`CodeQualif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pompier_qualification`
--

LOCK TABLES `pompier_qualification` WRITE;
/*!40000 ALTER TABLE `pompier_qualification` DISABLE KEYS */;
INSERT INTO `pompier_qualification` VALUES ('Ma0001','FO','2005-01-01','2005-01-01'),('Ma0001','GC','2005-01-01','2005-01-01'),('Ma0001','PC','2005-01-01','2005-01-01'),('Ma0001','S1','2000-01-01','2005-01-01'),('Ma0001','S2','2005-01-01','2005-01-01'),('Ma0002','S2','2000-01-01','2005-01-01'),('Ma0003','F1','2000-01-01','2005-01-01'),('Ma0004','F1','2000-01-01','2005-01-01'),('Ma0004','GC','2000-01-01','2005-01-01'),('Ma0004','S1','2000-01-01','2005-01-01'),('Ma0004','S2','2000-01-01','2005-01-01'),('Ma0004','SM','2000-01-01','2005-01-01');
/*!40000 ALTER TABLE `pompier_qualification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pompiers`
--

DROP TABLE IF EXISTS `pompiers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pompiers` (
  `Matricule` varchar(7) NOT NULL,
  `Prenom` varchar(10) DEFAULT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `ChefAgret` varchar(1) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `NumCaserne` int(11) DEFAULT NULL,
  `CodeGrade` varchar(2) DEFAULT NULL,
  `MatriculeRespo` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`Matricule`),
  KEY `FK_Caserne1` (`NumCaserne`),
  KEY `FK_Grade1` (`CodeGrade`),
  CONSTRAINT `FK_Caserne1` FOREIGN KEY (`NumCaserne`) REFERENCES `casernes` (`NumCaserne`),
  CONSTRAINT `FK_Grade1` FOREIGN KEY (`CodeGrade`) REFERENCES `grades` (`CodeGrade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pompiers`
--

LOCK TABLES `pompiers` WRITE;
/*!40000 ALTER TABLE `pompiers` DISABLE KEYS */;
INSERT INTO `pompiers` VALUES ('Ma0001','Ludovic','OK','N','1984-11-01',19,'SP','Ma0004'),('Ma0002','Jérémy','AR','N','1973-01-01',5,'1C','Ma0004'),('Ma0003','Arnaut','ER','N','1985-10-01',19,'SP','Ma0004'),('Ma0004','Thomas','VI','O','1973-01-10',6,'In','Ma0004'),('Ma0005','Patrice','EG','O','1973-02-04',6,'CC','Ma0004'),('Ma0006','Stéphane','BV','O','1974-05-01',19,'Sg','Ma0004'),('Ma0007','Marie','MA','N','1979-01-01',19,'Ca','Ma0004'),('Ma0008','Maxence','MI','N','1985-01-01',19,'SP','Ma0004'),('Ma0009','Max','MI','N','1985-01-01',19,'SP','Ma0004'),('Ma0010','coucou','DUPOND','N','1985-01-01',19,'SP','Ma0004'),('Ma0011','coucou2','DUPONT','N','1985-01-01',19,'SP','Ma0004');
/*!40000 ALTER TABLE `pompiers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pompiers_dispos`
--

DROP TABLE IF EXISTS `pompiers_dispos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pompiers_dispos` (
  `Matricule` varchar(7) NOT NULL,
  `jjmmaaaa` date NOT NULL,
  `hhmm` int(11) NOT NULL,
  PRIMARY KEY (`Matricule`,`jjmmaaaa`,`hhmm`),
  CONSTRAINT `FK_Pompier2` FOREIGN KEY (`Matricule`) REFERENCES `pompiers` (`Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pompiers_dispos`
--

LOCK TABLES `pompiers_dispos` WRITE;
/*!40000 ALTER TABLE `pompiers_dispos` DISABLE KEYS */;
INSERT INTO `pompiers_dispos` VALUES ('Ma0004','2009-03-01',12),('Ma0004','2009-03-02',12),('Ma0004','2009-03-03',12);
/*!40000 ALTER TABLE `pompiers_dispos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prerequis`
--

DROP TABLE IF EXISTS `prerequis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prerequis` (
  `CodeQualifConcerne` varchar(5) NOT NULL,
  `CodeQualifAAvoir` varchar(5) NOT NULL,
  PRIMARY KEY (`CodeQualifConcerne`,`CodeQualifAAvoir`),
  KEY `FK_Qualif4` (`CodeQualifAAvoir`),
  CONSTRAINT `FK_Qualif3` FOREIGN KEY (`CodeQualifConcerne`) REFERENCES `qualifications` (`CodeQualif`),
  CONSTRAINT `FK_Qualif4` FOREIGN KEY (`CodeQualifAAvoir`) REFERENCES `qualifications` (`CodeQualif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prerequis`
--

LOCK TABLES `prerequis` WRITE;
/*!40000 ALTER TABLE `prerequis` DISABLE KEYS */;
INSERT INTO `prerequis` VALUES ('F1','S2'),('S2','S1');
/*!40000 ALTER TABLE `prerequis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualification_typevehicule`
--

DROP TABLE IF EXISTS `qualification_typevehicule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualification_typevehicule` (
  `CodeTypeV` varchar(5) NOT NULL,
  `CodeQualif` varchar(5) NOT NULL,
  `Obligatoire` varchar(1) DEFAULT NULL,
  `Nb` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodeTypeV`,`CodeQualif`),
  KEY `FK_Qualif2` (`CodeQualif`),
  CONSTRAINT `FK_Qualif2` FOREIGN KEY (`CodeQualif`) REFERENCES `qualifications` (`CodeQualif`),
  CONSTRAINT `FK_TypeV2` FOREIGN KEY (`CodeTypeV`) REFERENCES `typevehicules` (`CodeTypeV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualification_typevehicule`
--

LOCK TABLES `qualification_typevehicule` WRITE;
/*!40000 ALTER TABLE `qualification_typevehicule` DISABLE KEYS */;
INSERT INTO `qualification_typevehicule` VALUES ('FPT','F1','O',3),('FPT','S1','O',3),('FPT','S2','O',3),('VID','S1','N',0),('VSAB','F1','N',0),('VSAB','S2','O',2);
/*!40000 ALTER TABLE `qualification_typevehicule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualifications`
--

DROP TABLE IF EXISTS `qualifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualifications` (
  `CodeQualif` varchar(5) NOT NULL,
  `NomQualif` varchar(15) DEFAULT NULL,
  `validite` int(11) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `NbParticipants` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodeQualif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualifications`
--

LOCK TABLES `qualifications` WRITE;
/*!40000 ALTER TABLE `qualifications` DISABLE KEYS */;
INSERT INTO `qualifications` VALUES ('F1','FIA',5,7,150,45),('FO','Formateur',0,7,1500,10),('GC','Gd Cond',0,7,1500,10),('PC','Pt Cond',0,7,1500,10),('S1','AFPS',1,3,80,25),('S2','SE',2,15,150,30),('SM','Montagne',72,15,500,25);
/*!40000 ALTER TABLE `qualifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typecasernes`
--

DROP TABLE IF EXISTS `typecasernes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typecasernes` (
  `CodeTypeC` int(11) NOT NULL,
  `NomType` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`CodeTypeC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typecasernes`
--

LOCK TABLES `typecasernes` WRITE;
/*!40000 ALTER TABLE `typecasernes` DISABLE KEYS */;
INSERT INTO `typecasernes` VALUES (1,'Pro'),(2,'Mixte'),(3,'Volontaires');
/*!40000 ALTER TABLE `typecasernes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typevehicules`
--

DROP TABLE IF EXISTS `typevehicules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typevehicules` (
  `CodeTypeV` varchar(5) NOT NULL,
  `NomV` varchar(20) DEFAULT NULL,
  `NbMinPompiers` int(11) DEFAULT NULL,
  `KmRevision` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodeTypeV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typevehicules`
--

LOCK TABLES `typevehicules` WRITE;
/*!40000 ALTER TABLE `typevehicules` DISABLE KEYS */;
INSERT INTO `typevehicules` VALUES ('EPA','Grande echelle',4,30000),('FPT','Vehicule incendie',4,30000),('VID','Vehicule Inter',4,30000),('VSAB','Vehicule de secours',4,30000);
/*!40000 ALTER TABLE `typevehicules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicule_intervention`
--

DROP TABLE IF EXISTS `vehicule_intervention`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicule_intervention` (
  `NumCaserne` int(11) NOT NULL,
  `NumVehicule` int(11) NOT NULL,
  `DateInter` date NOT NULL,
  `NumInter` int(11) NOT NULL,
  `DureeService` int(11) DEFAULT NULL,
  PRIMARY KEY (`NumCaserne`,`NumVehicule`,`DateInter`,`NumInter`),
  KEY `FK_Inter2` (`DateInter`,`NumInter`),
  CONSTRAINT `FK_Inter2` FOREIGN KEY (`DateInter`, `NumInter`) REFERENCES `interventions` (`DateInter`, `NumInter`),
  CONSTRAINT `FK_Vehicules` FOREIGN KEY (`NumCaserne`, `NumVehicule`) REFERENCES `vehicules` (`NumCaserne`, `NumVehicule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicule_intervention`
--

LOCK TABLES `vehicule_intervention` WRITE;
/*!40000 ALTER TABLE `vehicule_intervention` DISABLE KEYS */;
INSERT INTO `vehicule_intervention` VALUES (6,1,'2009-01-01',1,5),(6,2,'2009-01-01',1,5),(19,2,'2009-01-01',1,1);
/*!40000 ALTER TABLE `vehicule_intervention` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicules` (
  `NumCaserne` int(11) NOT NULL,
  `NumVehicule` int(11) NOT NULL,
  `DateAchat` date DEFAULT NULL,
  `NbKm` int(11) DEFAULT NULL,
  `KmDerniereRev` int(11) DEFAULT NULL,
  `CodeTypeV` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`NumCaserne`,`NumVehicule`),
  KEY `FK_TypeV1` (`CodeTypeV`),
  CONSTRAINT `FK_TypeV1` FOREIGN KEY (`CodeTypeV`) REFERENCES `typevehicules` (`CodeTypeV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicules`
--

LOCK TABLES `vehicules` WRITE;
/*!40000 ALTER TABLE `vehicules` DISABLE KEYS */;
INSERT INTO `vehicules` VALUES (6,1,'1998-01-01',80000,75000,'FPT'),(6,2,'1995-01-01',50000,45000,'VSAB'),(19,1,'1990-01-01',150000,125000,'VID'),(19,2,'2002-01-01',50000,45000,'VSAB'),(19,3,'2005-01-01',80000,75000,'FPT');
/*!40000 ALTER TABLE `vehicules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pompier'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-15 15:36:19
