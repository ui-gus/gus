-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2011 at 10:25 PM
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
(2, 'Admin_Test_Group', 'Group to test Admin permissions'),
(3, 'User_Test_Group', 'Test Group to test User permissions'),
(4, 'Guest_Test_Group', 'Test Group to test Guest permissions'),
(5, 'test_group', 'test_desc'),
(6, 'Testgroup', 'A test group.\n'),
(7, 'test1', 'A group.\n'),
(8, 'test2', 'Another group.'),
(10, 'main', 'Gus main group. Users set to admin (7) on this group get system wide admin privileges.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`thread_id`, `reply_id`, `author`, `a_email`, `body`, `datetime`) VALUES
(5, 1, 'Chaylo', '', 'Just testing the reply counter', '15/Feb/2011 07:59:36'),
(5, 2, 'testing', '', 'testing some more', '15/Feb/2011 08:50:23'),
(5, 3, 'testing', '', 'testing', '15/Feb/2011 08:53:16'),
(6, 4, 'tesing', '', 'testing', '15/Feb/2011 08:53:27'),
(7, 6, 'Chaylo', '', 'test', '25/Mar/2011 10:35:29'),
(7, 7, 'Chaylo', '', 'woot', '25/Mar/2011 10:44:55'),
(5, 8, 'claurino', '', 'testabible\n', '28/Mar/2011 03:12:05'),
(7, 16, 'claurino', '', 'testing', '28/Mar/2011 05:08:38'),
(23, 22, 'claurino', '', 'teeest', '29/Mar/2011 11:28:42'),
(28, 24, 'admin', '', 'Admin reply', '30/Mar/2011 05:19:08'),
(29, 25, 'admin', '', ' reply', '30/Mar/2011 05:19:28'),
(28, 35, 'claurino', '', 'testable', '30/Mar/2011 06:34:09'),
(31, 36, 'claurino', '', 'test', '04/Apr/2011 08:06:20'),
(44, 42, 'claurino', '', 'testing', '04/Apr/2011 10:10:10'),
(31, 43, 'claurino', '', 'test', '06/Apr/2011 06:53:26'),
(45, 44, 'claurino', '', 'First reply', '07/Apr/2011 09:57:59'),
(46, 45, 'claurino', '', 'First reply in this thread', '07/Apr/2011 09:58:53'),
(46, 46, 'admin', '', 'Admin Reply', '07/Apr/2011 10:01:57'),
(45, 47, 'admin', '', 'Admin Reply', '07/Apr/2011 10:02:11'),
(47, 48, 'admin', '', 'Admin reply', '07/Apr/2011 10:02:44'),
(46, 49, 'forum_tester', '', 'User reply', '07/Apr/2011 10:18:26'),
(47, 50, 'forum_tester', '', 'User reply', '07/Apr/2011 10:18:43'),
(45, 51, 'forum_tester', '', 'User reply', '07/Apr/2011 10:20:42');

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
  `lock_flag` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_topic`, `thread_body`, `thread_author`, `email`, `datetime`, `view`, `num_replies`, `group_id`, `group_name`, `lock_flag`) VALUES
(5, 'First Forum Entry', 'Just a quick test to make sure everything is working', 'Chaylo', '', '15/Feb/2011 07:59:21', 0, 7, 1, '', 0),
(6, 'Gotta check it all again!', 'Ugh', 'Chaylo', '', '15/Feb/2011 08:50:01', 0, 1, 1, '', 0),
(7, 'testing 1 2 3', 'Hello?', 'Chaylo', '', '25/Mar/2011 10:35:22', 0, 4, 1, 'test', 0),
(8, 'new thread', 'test', 'claurino', '', '29/Mar/2011 06:38:00', 0, 0, 1, 'test', 0),
(15, 'test thread', 'test', 'claurino', '', '29/Mar/2011 07:04:09', 0, 0, 1, 'test', 0),
(18, 'test thread', 'test', 'claurino', '', '29/Mar/2011 07:17:21', 0, 0, 1, 'test', 0),
(23, 'Once again...first thread', 'Juuuuuust testing', 'claurino', '', '29/Mar/2011 09:32:30', 0, 1, 5, 'test_group', 0),
(28, 'New Admin Thread', 'Test', 'admin', '', '30/Mar/2011 05:19:01', 0, 1, 7, '', 0),
(29, 'New Admin Thread', 'Test', 'admin', '', '30/Mar/2011 05:19:21', 0, 1, 6, '', 0),
(30, 'New Admin Thread', 'Testing', 'admin', '', '30/Mar/2011 05:19:41', 0, 0, 5, '', 0),
(31, 'New Test Thread', 'Testing 123', 'claurino', '', '30/Mar/2011 06:31:40', 0, 2, 7, '', 0),
(44, 'testing', 'testable', 'claurino', '', '04/Apr/2011 10:10:06', 0, 1, 6, '', 0),
(45, 'First thread in this Forum', 'First Admin Test Group Thread', 'claurino', '', '07/Apr/2011 09:57:44', 0, 3, 2, '', 0),
(46, 'First thread in this Forum', 'First post in this thread', 'claurino', '', '07/Apr/2011 09:58:34', 0, 3, 3, '', 0),
(47, 'First thread in this Forum', 'First post in this thread', 'admin', '', '07/Apr/2011 10:02:33', 0, 2, 4, '', 0),
(48, 'User test thread', 'User post test', 'forum_tester', '', '07/Apr/2011 10:21:19', 0, 0, 2, '', 0),
(49, 'Second thread created for search test', 'Need another thread for searching', 'claurino', '', '07/Apr/2011 10:22:09', 0, 0, 2, '', 0);

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
(10, 'forum_tester', 'test'),
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
(24, 10, 7),
(24, 7, 7),
(24, 6, 7),
(24, 5, 7),
(18, 2, 7),
(18, 3, 6),
(18, 4, 1),
(24, 2, 7),
(24, 3, 7),
(24, 4, 7),
(10, 2, 6),
(10, 3, 6),
(10, 4, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD CONSTRAINT `usergroup_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usergroup_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `ggroup` (`id`) ON DELETE CASCADE;
