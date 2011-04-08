-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2011 at 04:15 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.7

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=190 ;

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
('long3841', '2011-02-21', 'something', 12),
('cblair', '2011-03-12', 'test', 13),
('', '2011-03-12', 'test2', 14),
('', '2011-03-12', 'something', 28),
('', '2011-03-31', 'something', 189),
('', '2011-03-31', 'something', 188),
('', '2011-03-31', 'something', 187),
('', '2011-03-31', 'something', 186),
('', '2011-03-29', 'something', 181),
('long3841', '2011-03-15', 'something', 109),
('', '2011-03-29', 'something', 180),
('', '2011-03-29', 'something', 179),
('', '2011-03-29', 'something', 178),
('', '2011-03-30', 'something', 184),
('', '2011-03-21', 'something', 114),
('', '2011-03-30', 'something', 185),
('', '2011-03-27', 'something', 173),
('', '2011-03-20', 'something', 110),
('', '2011-03-30', 'something', 182),
('', '2011-03-30', 'something', 183),
('', '2011-03-18', 'something', 107);

-- --------------------------------------------------------

--
-- Table structure for table `ggroup`
--

CREATE TABLE IF NOT EXISTS `ggroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ggroup`
--

INSERT INTO `ggroup` (`id`, `name`, `description`) VALUES
(5, 'test_group', 'test_desc'),
(10, 'main', 'Gus main group. Users set to admin (7) on this group get system wide admin privileges.'),
(11, 'testing', ''),
(12, 'testgroup', 'asdfsdfsfd');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`userid`, `title`, `message`, `from`, `to`, `from_viewed`, `to_viewed`, `from_deleted`, `to_deleted`, `from_vdate`, `to_vdate`, `from_ddate`, `to_ddate`, `created`) VALUES
(1, 'test', 'test', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-02-10 20:13:09'),
(2, 'test2', 'test', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-02-10 20:13:30'),
(3, 'test3', 'Hi', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-02-10 20:22:03'),
(4, 'test', 'test', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-02-19 15:11:04'),
(5, 'test_email', 'just a test', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-03-21 11:45:17'),
(6, 'test', 'test', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2011-03-28 18:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `content`) VALUES
(15, 'test', 'Test content'),
(16, 'home', 'Gus Home Page.\n<br />\n\nCS336Test<br>\n<a href="javascript:function a(){alert(document.cookie);}a();">Session Hijack Script</a>\n<br>\nYeah, don''t actually click that.\n<br>\n<br />\n<br />\n\nThis is the latest (stablest) version of the project.\n<br />\n<br />\n\nLast git pull on 03/25/11 .'),
(18, 'auth', 'Gus Authentication');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `thread_id` int(4) NOT NULL DEFAULT '0',
  `reply_id` int(4) NOT NULL DEFAULT '0',
  `author` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `body` longtext NOT NULL,
  `datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`thread_id`, `reply_id`, `author`, `a_email`, `body`, `datetime`) VALUES
(5, 0, 'Chaylo', '', 'Just testing the reply counter', '15/Feb/2011 07:59:36'),
(5, 0, 'testing', '', 'testing some more', '15/Feb/2011 08:50:23'),
(5, 0, 'testing', '', 'testing', '15/Feb/2011 08:53:16'),
(6, 0, 'tesing', '', 'testing', '15/Feb/2011 08:53:27'),
(5, 0, '', '', 'Gadzooks.', '17/Feb/2011 07:35:18');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_topic`, `thread_body`, `thread_author`, `email`, `datetime`, `view`, `num_replies`, `group_id`, `group_name`) VALUES
(5, 'First Forum Entry', 'Just a quick test to make sure everything is working', 'Chaylo', '', '15/Feb/2011 07:59:21', 0, 6, 1, ''),
(6, 'Gotta check it all again!', 'Ugh', 'Chaylo', '', '15/Feb/2011 08:50:01', 0, 1, 1, ''),
(7, 'testing 1 2 3', 'Hello?', 'Chaylo', '', '25/Mar/2011 10:35:22', 0, 2, 1, 'test'),
(9, 'testing', 'smurF!', 'claurino', '', '28/Mar/2011 03:18:44', 0, 3, 1, 'test'),
(10, 'sfdsdf', 'ddd', 'brett', '', '07/Apr/2011 03:39:46', 0, 0, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `un`, `pw`, `fullname`, `description`, `profile`, `email`, `contact`, `major`) VALUES
(0, 'cblair', 'SHI/hel7', 'Colby Blair', 'In a bottle.', 'colby.png', 'esadfasfd@sdfsd', 's654654', '65456'),
(11, 'anilson', 'supersecurepassword1234!@#$', '', '', 'sfdsfd', 'fdfd', 'saas', 'dsd'),
(12, 'long3841', 'long3841', '', '', '', '', '', ''),
(13, 'sbeddall', '0017761826', '', '', 'soon.png', '', '', ''),
(15, 'brett', 'brett256', 'Brett Hitchcock', 'On fire.', 'khaaan.png', 'here@there.comdfdf', '123', 'CS'),
(17, 'timb', 'frost741', '', '', '', '', '', ''),
(18, 'claurino', '22877822', '', '', '', '', '', ''),
(19, 'lwegner', '7ndustr8', '', '', '', '', '', ''),
(20, 'crempel', 'SHI/hel7', '', '', '', '', '', ''),
(21, 'abhay', 'gusabhay', '', '', '', '', '', ''),
(22, 'drj', 'SHI/hel7', '', '', '', '', '', ''),
(23, 'test', 'test123', '', '', 'test', 'test@gus.org', '800 555-TEST', 'computer science'),
(24, 'admin', 'SHI/hel7', '', '', '', '', '', '');

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
(23, 5, 1),
(24, 10, 7),
(19, 10, 7),
(21, 10, 0),
(21, 5, 0),
(15, 10, 7),
(13, 5, 7),
(13, 10, 7),
(0, 10, 7),
(15, 5, 7),
(15, 11, 7),
(15, 12, 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD CONSTRAINT `usergroup_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usergroup_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `ggroup` (`id`) ON DELETE CASCADE;
