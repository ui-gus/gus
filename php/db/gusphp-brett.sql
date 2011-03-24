-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2011 at 12:16 AM
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
-- Table structure for table `ggroupusers`
--

CREATE TABLE IF NOT EXISTS `ggroupusers` (
  `groupid` int(11) NOT NULL COMMENT 'Group IDs.',
  `userid` int(11) NOT NULL COMMENT 'User IDs in that group.',
  `grouppermissions` int(11) NOT NULL COMMENT 'Permissions of the user in that group.'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ggroupusers`
--

INSERT INTO `ggroupusers` (`groupid`, `userid`, `grouppermissions`) VALUES
(1, 1, 1),
(1, 0, 1);
