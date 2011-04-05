-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2011 at 04:16 PM
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
