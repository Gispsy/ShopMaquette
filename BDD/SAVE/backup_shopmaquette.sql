-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: shopmaquette
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.10.1

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
-- Table structure for table `BonLivraison`
--

DROP TABLE IF EXISTS `BonLivraison`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BonLivraison` (
  `BonLivId` int(11) NOT NULL AUTO_INCREMENT,
  `BonLivClientNum` varchar(20) DEFAULT NULL,
  `BonLivClientAdresseMail` varchar(50) DEFAULT NULL,
  `BonLivClientRef` varchar(50) DEFAULT NULL,
  `BonLivClientNom` varchar(50) DEFAULT NULL,
  `BonLivClientAdresse` varchar(255) DEFAULT NULL,
  `BonLivComAdresse` varchar(50) DEFAULT NULL,
  `BonLivComDate` date DEFAULT NULL,
  `BonLivComRef` varchar(50) DEFAULT NULL,
  `BonLivProduitRef` varchar(50) DEFAULT NULL,
  `BonLivProduitNom` varchar(50) DEFAULT NULL,
  `BonLivQuantiter` int(11) DEFAULT NULL,
  `ComId` int(11) NOT NULL,
  `ProId` int(11) NOT NULL,
  `CliID` int(11) DEFAULT NULL,
  PRIMARY KEY (`BonLivId`,`ProId`),
  KEY `ComId` (`ComId`),
  KEY `ProId` (`ProId`),
  KEY `CliID` (`CliID`),
  CONSTRAINT `BonLivraison_ibfk_1` FOREIGN KEY (`ComId`) REFERENCES `Commande` (`ComId`),
  CONSTRAINT `BonLivraison_ibfk_2` FOREIGN KEY (`ProId`) REFERENCES `Produit` (`ProId`),
  CONSTRAINT `BonLivraison_ibfk_3` FOREIGN KEY (`CliID`) REFERENCES `Client` (`CliId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BonLivraison`
--

LOCK TABLES `BonLivraison` WRITE;
/*!40000 ALTER TABLE `BonLivraison` DISABLE KEYS */;
INSERT INTO `BonLivraison` VALUES (1,'556-529-3962','bharriday0@multiply.com','1','Barbabra','Suite 53','Suite 42','2022-11-15','1','1',NULL,1,1,1,1),(2,'366-573-0721','cbarrack1@seesaa.net','2','Clotilda','10th Floor','Room 1141','2022-12-31','2','2',NULL,2,2,2,2),(3,'491-790-7621','asawley2@tripod.com','3','Abbott','Suite 56','Apt 763','2022-11-10','3','3',NULL,3,3,3,3),(4,'614-342-7365','opunton3@cam.ac.uk','4','Olwen','PO Box 23906','17th Floor','2022-07-06','4','4',NULL,4,4,4,4),(5,'619-249-3654','florenz4@jalbum.net','5','Fielding','PO Box 33274','Apt 637','2022-08-27','5','5',NULL,5,5,5,5);
/*!40000 ALTER TABLE `BonLivraison` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Categorie`
--

DROP TABLE IF EXISTS `Categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categorie` (
  `CtgId` int(11) NOT NULL AUTO_INCREMENT,
  `CtgNom` varchar(50) NOT NULL,
  PRIMARY KEY (`CtgId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categorie`
--

LOCK TABLES `Categorie` WRITE;
/*!40000 ALTER TABLE `Categorie` DISABLE KEYS */;
INSERT INTO `Categorie` VALUES (1,'Maquette'),(2,'Kit'),(3,'Peinture'),(4,'Outils');
/*!40000 ALTER TABLE `Categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Client`
--

DROP TABLE IF EXISTS `Client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client` (
  `CliId` int(11) NOT NULL AUTO_INCREMENT,
  `CliNom` varchar(50) NOT NULL,
  `CliPrenom` varchar(50) NOT NULL,
  `CliAdresse` varchar(255) NOT NULL,
  `CliVille` varchar(255) NOT NULL,
  `CliPays` varchar(255) NOT NULL,
  `CliCp` varchar(8) NOT NULL,
  `CliNumero` varchar(20) DEFAULT NULL,
  `CliAdresseMail` varchar(50) NOT NULL,
  `CliReference` varchar(25) NOT NULL,
  `CliType` tinyint(1) NOT NULL,
  `CliCalucCoef` int(11) NOT NULL,
  PRIMARY KEY (`CliId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Client`
--

LOCK TABLES `Client` WRITE;
/*!40000 ALTER TABLE `Client` DISABLE KEYS */;
INSERT INTO `Client` VALUES (1,'Rowena','Gretal','16th Floor','Santiago del Torno','Bolivia','13300','619-612-3328','gshurlock0@imgur.com','1',1,91841633),(2,'Heath','Maury','Suite 16','Hongqi','China','14000','635-297-8987','mpatton1@examiner.com','2',1,28983047),(3,'Willi','Agna','Room 901','Xucheng','France','80000','817-108-3810','abusfield2@prweb.com','3',1,46242993),(4,'Fianna','Cordi','3rd Floor','Jiaoba','China','54200','630-239-1089','chuerta3@indiatimes.com','4',1,2277904),(5,'Suzette','Marthe','Apt 718','Partesh','Kosovo','60000','643-778-5085','mosharkey4@unc.edu','5',1,80827745),(6,'Mariam','Sydel','Room 357','Amiens','France','80000','178-740-2444','scleugh5@wikia.com','6',1,45921230),(7,'Jodi','Velma','PO Box 26092','Badarganj','Bangladesh','5430','630-748-6135','vgiriardelli6@slate.com','7',1,7543882),(8,'Merwin','Kip','Suite 72','Seoul','South Korea','16600','822-302-0659','kvanthoog7@microsoft.com','8',1,21695230),(9,'Bay','Ilario','1st Floor','Achanizo','Peru','25000','190-723-7625','islessar8@lycos.com','9',0,79252135),(10,'Calvin','Della','17th Floor','Konde','Tanzania','85000','405-315-2905','dhaeslier9@prnewswire.com','10',1,61593641);
/*!40000 ALTER TABLE `Client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Commande`
--

DROP TABLE IF EXISTS `Commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Commande` (
  `ComId` int(11) NOT NULL AUTO_INCREMENT,
  `ComRef` varchar(50) NOT NULL,
  `ComTVA` decimal(5,2) NOT NULL,
  `ComDateLivraison` date NOT NULL,
  `ComDateCommande` date NOT NULL,
  `ComAdresse` varchar(255) NOT NULL,
  `ComCp` varchar(255) NOT NULL,
  `ComVille` varchar(255) NOT NULL,
  `ComAdressFactu` varchar(255) NOT NULL,
  `BonDate` date NOT NULL,
  `BonTVA` decimal(5,2) NOT NULL,
  `BonPrixHT` decimal(15,2) NOT NULL,
  `BonTotalPrixHT` decimal(15,2) NOT NULL,
  `BonTVATotal` varchar(50) NOT NULL,
  `CliType` tinyint(1) DEFAULT NULL,
  `CliID` int(11) DEFAULT NULL,
  `ComQuantiter` int(11) DEFAULT NULL,
  `ProId` int(11) NOT NULL,
  PRIMARY KEY (`ComId`,`ProId`),
  KEY `ProId` (`ProId`),
  KEY `CliID` (`CliID`),
  CONSTRAINT `Commande_ibfk_1` FOREIGN KEY (`ProId`) REFERENCES `Produit` (`ProId`),
  CONSTRAINT `Commande_ibfk_2` FOREIGN KEY (`CliID`) REFERENCES `Client` (`CliId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Commande`
--

LOCK TABLES `Commande` WRITE;
/*!40000 ALTER TABLE `Commande` DISABLE KEYS */;
INSERT INTO `Commande` VALUES (1,'1',35.00,'2022-10-09','2023-02-18','Apt 814','70690','Seremban','Room 881','2022-07-25',34.00,4.40,6.95,'36',NULL,1,1,1),(2,'2',24.00,'2022-08-22','2022-11-24','PO Box 23241','09450-000','Rio Grande da Serra','Suite 13','2022-12-26',66.00,2.04,1.45,'89',NULL,2,2,2),(3,'3',26.00,'2022-08-18','2022-12-25','PO Box 80331','8000','Gobojango','4th Floor','2022-08-18',85.00,7.40,0.21,'96',NULL,3,3,3),(4,'4',99.00,'2022-12-02','2022-12-19','5th Floor','7940-374','Vila Alva','PO Box 98231','2022-07-31',73.00,2.45,6.43,'86',NULL,4,4,4),(5,'5',51.00,'2022-05-04','2023-02-26','16th Floor','9360-413','Madalena do Mar','PO Box 36213','2022-09-01',85.00,8.41,1.03,'73',NULL,5,5,5);
/*!40000 ALTER TABLE `Commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Employer`
--

DROP TABLE IF EXISTS `Employer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employer` (
  `EmpId` int(11) NOT NULL AUTO_INCREMENT,
  `EmpNom` varchar(50) NOT NULL,
  `EmpPrenom` varchar(50) NOT NULL,
  `EmpDateNaissance` date NOT NULL,
  `EmpAdresse` varchar(255) NOT NULL,
  `EmpVille` varchar(255) NOT NULL,
  `EmpPays` varchar(255) NOT NULL,
  `EmpCp` varchar(10) NOT NULL,
  `EmpEquipe` tinyint(1) NOT NULL,
  `CliId` int(11) DEFAULT NULL,
  `CliReference` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`EmpId`),
  KEY `CliId` (`CliId`),
  CONSTRAINT `Employer_ibfk_1` FOREIGN KEY (`CliId`) REFERENCES `Client` (`CliId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employer`
--

LOCK TABLES `Employer` WRITE;
/*!40000 ALTER TABLE `Employer` DISABLE KEYS */;
INSERT INTO `Employer` VALUES (1,'Montague','Maisie','1996-09-22','16th Floor','Bahe','China','80000',0,NULL,NULL),(2,'Lynda','Erskine','2014-12-12','Suite 42','Padre Paraíso','Brazil','39818-000',0,NULL,NULL),(3,'Kit','Martguerita','2021-04-30','Apt 1458','Compostela','Philippines','8109',1,NULL,NULL),(4,'Laurene','Maude','2001-10-16','Apt 131','Lazaro Cardenas','Mexico','92933',0,NULL,NULL),(5,'Ellery','Tore','2013-05-14','Room 675','Shuishi','China','50000',1,NULL,NULL);
/*!40000 ALTER TABLE `Employer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Facture`
--

DROP TABLE IF EXISTS `Facture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Facture` (
  `BonFactuId` int(11) NOT NULL AUTO_INCREMENT,
  `BonDateFactu` date NOT NULL,
  `ComId` int(11) DEFAULT NULL,
  PRIMARY KEY (`BonFactuId`),
  KEY `ComId` (`ComId`),
  CONSTRAINT `Facture_ibfk_1` FOREIGN KEY (`ComId`) REFERENCES `Commande` (`ComId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Facture`
--

LOCK TABLES `Facture` WRITE;
/*!40000 ALTER TABLE `Facture` DISABLE KEYS */;
INSERT INTO `Facture` VALUES (1,'2022-01-21',1),(2,'2022-06-03',2),(3,'2022-05-02',3),(4,'2022-08-27',4),(5,'2022-04-29',5);
/*!40000 ALTER TABLE `Facture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Fournisseurs`
--

DROP TABLE IF EXISTS `Fournisseurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Fournisseurs` (
  `FouId` int(11) NOT NULL AUTO_INCREMENT,
  `FouNom` varchar(50) NOT NULL,
  `FouAdresse` varchar(255) NOT NULL,
  `FouVille` varchar(50) NOT NULL,
  `FouCp` varchar(8) NOT NULL,
  `FouPays` varchar(100) NOT NULL,
  `FouRef` varchar(50) NOT NULL,
  PRIMARY KEY (`FouId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Fournisseurs`
--

LOCK TABLES `Fournisseurs` WRITE;
/*!40000 ALTER TABLE `Fournisseurs` DISABLE KEYS */;
INSERT INTO `Fournisseurs` VALUES (1,'Skyble','Room 732','Essen','45356','Germany','1'),(2,'Browsedrive','PO Box 62119','Bremen','28239','Germany','2'),(3,'Dablist','Suite 30','Bremen','28355','Germany','3'),(4,'Oyoyo','Room 484','München','81679','Germany','4'),(5,'Feedspan','PO Box 49176','Nürnberg','90451','Germany','5');
/*!40000 ALTER TABLE `Fournisseurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Image`
--

DROP TABLE IF EXISTS `Image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Image` (
  `ImgId` int(11) NOT NULL AUTO_INCREMENT,
  `ImgNom` varchar(255) NOT NULL,
  `ProId` int(11) DEFAULT NULL,
  PRIMARY KEY (`ImgId`),
  KEY `ProId` (`ProId`),
  CONSTRAINT `Image_ibfk_1` FOREIGN KEY (`ProId`) REFERENCES `Produit` (`ProId`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Image`
--

LOCK TABLES `Image` WRITE;
/*!40000 ALTER TABLE `Image` DISABLE KEYS */;
INSERT INTO `Image` VALUES (1,'Burn of unspecified eyelid and periocular area, sequela',1),(2,'Other dental procedure status',2),(3,'Nondisp transverse fx left acetab, subs for fx w delay heal',3),(4,'Lymphocytic colitis',4),(5,'Oth osteopor w crnt path fx, unsp ank/ft, 7thK',5),(6,'Laceration of fallopian tube, unilateral, initial encounter',6),(7,'Insect bite of other specified part of neck, init encntr',7),(8,'Temporary auditory threshold shift, bilateral',8),(9,'Other specified dyspareunia',9),(10,'Oth vascular syndromes of brain in cerebrovascular diseases',10),(11,'I/I react d/t implanted testicular prosthesis, init',11),(12,'Ataxia following nontraumatic subarachnoid hemorrhage',12),(13,'Macular corneal dystrophy',13),(14,'Wear of articular bearing surface of internal prosth joint',14),(15,'Contus/lac cereb, w LOC >24 hr w ret consc lev',15),(16,'Subluxation of midcarpal joint of unspecified wrist',16),(17,'Anterior disloc of proximal end of tibia, left knee, subs',17),(18,'Burn of first degree of single l finger (nail) except thumb',18),(19,'Congenital deformity of sternocleidomastoid muscle',19),(20,'Disp fx of shaft of 5th MC bone, r hand, 7thD',20),(21,'Malignant neoplasm of overlapping sites of stomach',21),(22,'Corrosion of unsp degree of right scapular region, init',22),(23,'Hyperostosis of skull',23),(24,'Oth enthesopathies of unspecified lower limb, excluding foot',24),(25,'Nondisp fx of proximal phalanx of right index finger',25),(26,'Other and unspecified malignant neoplasm of skin',26),(27,'Ultralt/microlt/pwr-glider explosn inj occupant, sequela',27),(28,'Nondisp fx of lateral epicondyl of unsp humer, 7thG',28),(29,'Contus/lac l cereb w LOC w death due to oth cause bf consc',29),(30,'Caught, crushed, jammed or pinched in or between objects',30),(31,'Sltr-haris Type IV physeal fx lower end of right femur, init',31),(32,'Displaced Rolando\'s fracture, left hand',32),(33,'Occupant of hv veh injured in collision w 2/3-whl mv',33),(34,'Prsn brd/alit pk-up/van inj in clsn w nonmtr vehicle, sqla',34),(35,'Corrosion of third degree of right wrist, sequela',35),(36,'Adult osteomalacia due to malnutrition',36),(37,'Unsp inj unsp blood vess at forarm lv, right arm, sequela',37),(38,'Laceration with foreign body of unsp upper arm, subs encntr',38),(39,'Exposure to rapid changes in air pressure during descent',39),(40,'Spinal enthesopathy, thoracic region',40),(41,'Athscl native arteries of extremities w gangrene, right leg',41),(42,'Glaucoma sec to eye inflam, unsp eye, indeterminate stage',42),(43,'Disp fx of less tuberosity of r humer, 7thK',43),(44,'Athscl CABG, unsp, w angina pectoris w documented spasm',44),(45,'Poisoning by unsp topical agent, undetermined, sequela',45),(46,'Maternal care for other isoimmunization, second trimester',46),(47,'Nondisp fx of less trochanter of r femr, 7thJ',47),(48,'Open wound of forearm',48),(49,'Iridodialysis, bilateral',49),(50,'Hyphema, right eye',50);
/*!40000 ALTER TABLE `Image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Produit`
--

DROP TABLE IF EXISTS `Produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Produit` (
  `ProId` int(11) NOT NULL AUTO_INCREMENT,
  `FouId` int(11) DEFAULT NULL,
  `ProNom` varchar(255) NOT NULL,
  `ProQuantiter` int(11) NOT NULL,
  `ProDesc` varchar(255) NOT NULL,
  `ProPrixPHUT` decimal(4,2) NOT NULL,
  `SctgId` int(11) DEFAULT NULL,
  PRIMARY KEY (`ProId`),
  KEY `FouId` (`FouId`),
  KEY `SctgId` (`SctgId`),
  CONSTRAINT `Produit_ibfk_1` FOREIGN KEY (`FouId`) REFERENCES `Fournisseurs` (`FouId`),
  CONSTRAINT `Produit_ibfk_2` FOREIGN KEY (`SctgId`) REFERENCES `SousCategorie` (`SctgId`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produit`
--

LOCK TABLES `Produit` WRITE;
/*!40000 ALTER TABLE `Produit` DISABLE KEYS */;
INSERT INTO `Produit` VALUES (1,1,'Balsam Poplar',1,'Typhoid fever unspecified',1.00,2),(2,2,'acetaminophen and codeine phosphate',2,'Adult T-cell lymphoma/leukemia (HTLV-1-assoc) in remission',2.00,1),(3,3,'Cefazolin',3,'Disp fx of med malleolus of r tibia, 7thB',3.00,3),(4,4,'Propofol',4,'Unsp fx low end l femr, subs for opn fx type I/2 w malunion',4.00,5),(5,5,'fentanyl',5,'Oth disp fx of lower end of l humer, subs for fx w malunion',5.00,4),(6,2,'acetaminophen dextromethorphan HBr doxylamine succinate',6,'Perforated corneal ulcer bilateral',6.00,4),(7,4,'Phenylephrine hydrochloride',7,'Chronic venous htn w oth comp of bilateral low extrm',7.00,3),(8,5,'neomycin sulfate polymyxin b sulfate and gramicidin',8,'Achondrogenesis',8.00,2),(9,3,'Ibuprofen',9,'Burn of third degree of left forearm sequela',9.00,1),(10,2,'Ranitidine',10,'Burn of unsp degree of left scapular region subs encntr',10.00,2),(11,2,'Guaifenesin',11,'Disp fx of right tibial spine subs for clos fx w malunion',11.00,3),(12,2,'Carbo Veg 30c, Cuprum Metalicum 30c, Mercurius Sol um 30c',12,'Fracture of glenoid cavity of scapula',12.00,3),(13,2,'Baptisia tinctoria, Echinacea (angustifolia), Phytolaccrrum phosphoricum',13,'Non-pressure chronic ulcer of unspecified calf',13.00,3),(14,2,'Doxycycline',14,'Endomyocardial (eosinophilic) disease',14.00,4),(15,3,'metronidazole',15,'Assault by oth gas, air or spring-operated gun, init encntr',15.00,4),(16,4,'acetaminophen, dextromethorphan hydrobromide and doxylamine succinate liquid',16,'Open wound of right buttock',16.00,5),(17,5,'Bacitracin Zinc',17,'Unspecified alveolar anomaly',17.00,2),(18,1,'Promethazine Hydrochloride',18,'Corrosion of unsp deg mult sites of right ank/ft, init',18.00,5),(19,5,'Bisacodyl',19,'Poisoning by other general anesthetics, assault, init encntr',19.00,2),(20,2,'Simethicone',20,'Other drug-induced agranulocytosis',20.00,3),(21,3,'Cisplatin',21,'Path fx in oth disease, r fibula, subs for fx w delay heal',21.00,4),(22,5,'Oxygen',22,'Unsp inj flexor musc/fasc/tend r mid fngr at forarm lv, sqla',22.00,2),(23,4,'Geotrichum candidum',23,'Sltr-haris Type II physeal fx phalanx of right toe, init',23.00,1),(24,3,'Ceftriaxone Sodium',24,'Assault by knife',24.00,1),(25,1,'Groundsel',25,'Selective deficiency of immunoglobulin A [IgA]',25.00,4),(26,1,'Aspirin',26,'Burn of third degree of right axilla, sequela',26.00,2),(27,1,'Ranitidine',27,'Injury of unsp nerve at hip and thi lev, unsp leg, sequela',27.00,5),(28,1,'BENZALKONIUM CHLORIDE, BACITRACIN ZINC,',28,'3-methylglutaconic aciduria',28.00,2),(29,1,'isotretinoin',29,'Burn third deg of unsp site unsp lower limb, ex ank/ft, sqla',29.00,3),(30,5,'IBUPROFEN AND DIPHENHYDRAMINE HCL',30,'Disp fx of posterior wall of right acetab, init for opn fx',30.00,5),(31,5,'Octreotide acetate',31,'Drown due to passenger ship overturning, sequela',31.00,1),(32,4,'tramadol hydrochloride',32,'Osteonecrosis in diseases classified elsewhere, upper arm',32.00,2),(33,2,'Avobenzone, Homosalate, Octisalate, Octocrylene, and Oxybenzone',33,'Inconclusive mammogram',33.00,3),(34,2,'EPICOCCUM NIGRUM',34,'Nondisplaced fracture of neck of unspecified radius, sequela',34.00,2),(35,3,'SULFUR',35,'Maternal care for oth rhesus isoimmun, second tri, unsp',35.00,5),(36,4,'California Mugwort',36,'External constriction of unspecified shoulder, sequela',36.00,5),(37,4,'methimazole',37,'Loose body in knee, right knee',37.00,5),(38,5,'Adrenalinuhosphoricum, Kali phosphoricum, Paullinia sorbilis, Thea sinensis',38,'Displ commnt fx l patella, 7thF',38.00,1),(39,2,'Hydrocortisone',39,'Disp fx of cuboid bone of left foot, init for opn fx',39.00,3),(40,5,'AVOBENZONE, OCTOCRYLENE, OXYBENZONE',40,'Pressure ulcer of unspecified hip, stage 3',40.00,2),(41,1,'Meperidine Hydrochloride',41,'Unspecified sprain of left wrist, initial encounter',41.00,5),(42,4,'BARIUM CATION',42,'Path fx in oth disease, r radius, subs for fx w malunion',42.00,2),(43,4,'OCTINOXATE, TITANIUM DIOXIDE, and ZINC OXIDE',43,'Displaced unsp condyle fx lower end of unsp femur, init',43.00,1),(44,3,'Bupropion Hydrochloride',44,'Nondisp spiral fx shaft of ulna, unsp arm, 7thB',44.00,1),(45,5,'Glimepiride',45,'Displ transverse fx shaft of l ulna, 7thN',45.00,3),(46,3,'Doxylamine succinate',46,'Nondisp commnt fx shaft of unsp tibia, 7thC',46.00,5),(47,3,'CIPROFLOXACIN',47,'Major osseous defect, shoulder region',47.00,2),(48,1,'TITANIUM DIOXIDE, OCTINOXATE',48,'Malignant neoplasm of duodenum',48.00,4),(49,1,'OCTINOXATE, AVOBENZONE',49,'Osteitis condensans, thigh',49.00,1),(50,1,'BISMUTH SUBSALICYLATE',50,'Unsp cervical disc disorder, mid-cervical region, unsp level',50.00,1);
/*!40000 ALTER TABLE `Produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SousCategorie`
--

DROP TABLE IF EXISTS `SousCategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SousCategorie` (
  `SctgId` int(11) NOT NULL AUTO_INCREMENT,
  `SctgNom` varchar(50) NOT NULL,
  `CtgId` int(11) DEFAULT NULL,
  PRIMARY KEY (`SctgId`),
  KEY `CtgId` (`CtgId`),
  CONSTRAINT `SousCategorie_ibfk_1` FOREIGN KEY (`CtgId`) REFERENCES `Categorie` (`CtgId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SousCategorie`
--

LOCK TABLES `SousCategorie` WRITE;
/*!40000 ALTER TABLE `SousCategorie` DISABLE KEYS */;
INSERT INTO `SousCategorie` VALUES (1,'Mort',1),(2,'Javier',2),(3,'Mohammed',3),(4,'Ealasaid',4),(5,'Arlee',4),(6,'Elbert',2),(7,'Rowe',1),(8,'Pryce',1);
/*!40000 ALTER TABLE `SousCategorie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-01 16:16:25
