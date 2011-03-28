-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2011 at 03:39 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gusphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `user` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `data` varchar(150) NOT NULL,
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  KEY `eventID` (`eventID`),
  KEY `eventID_2` (`eventID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`user`, `date`, `data`, `eventID`) VALUES
('admin', '2011-02-26', 'another event', 3),
('admin', '2011-02-24', 'updated', 2),
('admin', '2011-02-21', 'event', 4),
('user1', '2011-03-15', 'an event in march', 6),
('admin', '2011-02-23', 'updated', 7),
('admin', '0000-00-00', 'different event', 8),
('long3841', '2011-02-19', 'event', 9),
('cblair', '2011-02-21', 'asdfasdf', 10),
('cblair', '2011-02-27', 'asdfasfdasfd', 11),
('long3841', '2011-02-21', 'something', 12);

-- --------------------------------------------------------

--
-- Table structure for table `ggroup`
--

CREATE TABLE IF NOT EXISTS `ggroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ggroup`
--

INSERT INTO `ggroup` (`id`, `name`, `description`) VALUES
(1, 'test', 'test2'),
(5, 'test_group', 'test_desc'),
(6, 'Testgroup', 'A test group.\n'),
(7, 'test1', 'A group.\n'),
(8, 'test2', 'Another group.'),
(10, 'main', 'Gus main group. Users set to admin (7) on this group get system wide admin privileges.');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`userid`, `title`, `message`, `from`, `to`, `from_viewed`, `to_viewed`, `from_deleted`, `to_deleted`, `from_vdate`, `to_vdate`, `from_ddate`, `to_ddate`, `created`) VALUES
(1, 'test', 'test', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-02-10 20:13:09'),
(2, 'test2', 'test', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-02-10 20:13:30'),
(3, 'test3', 'Hi', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-02-10 20:22:03'),
(4, 'test', 'test', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-02-19 15:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `content`) VALUES
(15, 'test', 'Test content'),
(16, 'home', 'Gus Home Page.\n<br />\n\nThis is the latest (stablest) version of the project.\n<br />\n\ngit pull on 02/23/11 . Some stuff broke.'),
(18, 'auth', 'Gus Authentication');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `thread_id` int(4) NOT NULL DEFAULT '0',
  `reply_id` int(4) NOT NULL AUTO_INCREMENT,
  `author` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `body` longtext NOT NULL,
  `datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`thread_id`, `reply_id`, `author`, `a_email`, `body`, `datetime`) VALUES
(5, 1, 'Chaylo', '', 'Just testing the reply counter', '15/Feb/2011 07:59:36'),
(5, 2, 'testing', '', 'testing some more', '15/Feb/2011 08:50:23'),
(5, 3, 'testing', '', 'testing', '15/Feb/2011 08:53:16'),
(6, 4, 'tesing', '', 'testing', '15/Feb/2011 08:53:27'),
(5, 5, '', '', 'Gadzooks.', '17/Feb/2011 07:35:18'),
(7, 6, 'Chaylo', '', 'test', '25/Mar/2011 10:35:29'),
(7, 7, 'Chaylo', '', 'woot', '25/Mar/2011 10:44:55'),
(5, 8, 'claurino', '', 'test\n', '28/Mar/2011 03:12:05'),
(5, 9, 'claurino', '', 'testing again', '28/Mar/2011 03:15:06'),
(9, 12, 'claurino', '', 'woot?', '28/Mar/2011 03:37:23');

-- --------------------------------------------------------

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

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_topic`, `thread_body`, `thread_author`, `email`, `datetime`, `view`, `num_replies`, `group_id`, `group_name`) VALUES
(5, 'First Forum Entry', 'Just a quick test to make sure everything is working', 'Chaylo', '', '15/Feb/2011 07:59:21', 0, 6, 1, ''),
(6, 'Gotta check it all again!', 'Ugh', 'Chaylo', '', '15/Feb/2011 08:50:01', 0, 1, 1, ''),
(7, 'testing 1 2 3', 'Hello?', 'Chaylo', '', '25/Mar/2011 10:35:22', 0, 2, 1, 'test'),
(9, 'testing', 'smurF!', 'claurino', '', '28/Mar/2011 03:18:44', 0, 3, 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `un` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `un`, `pw`) VALUES
(0, 'cblair', 'SHI/hel7'),
(11, 'anilson', 'supersecurepassword1234!@#$'),
(12, 'long3841', 'long3841'),
(13, 'sbeddall', '0017761826'),
(15, 'brett', 'brett256'),
(17, 'timb', 'frost741'),
(18, 'claurino', '22877822'),
(19, 'lwegner', '7ndustr8'),
(20, 'crempel', 'SHI/hel7'),
(21, 'abhay', 'gusabhay'),
(22, 'drj', 'SHI/hel7'),
(23, 'test', 'test123'),
(24, 'admin', 'SHI/hel7');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `perm` tinyint(4) NOT NULL,
  KEY `uid` (`uid`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`uid`, `gid`, `perm`) VALUES
(23, 1, 6),
(23, 5, 1),
(23, 7, 3),
(0, 10, 7),
(24, 10, 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD CONSTRAINT `usergroup_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usergroup_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `ggroup` (`id`) ON DELETE CASCADE;
