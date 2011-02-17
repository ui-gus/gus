-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2011 at 01:01 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`user`, `date`, `data`, `eventID`) VALUES
('admin', '2011-02-26', 'another event', 3),
('admin', '2011-02-24', 'updated', 2),
('admin', '2011-02-21', 'event', 4),
('user1', '2011-03-15', 'an event in march', 6);

-- --------------------------------------------------------


--
-- Dumping data for table `user`
--

INSERT INTO `user` (`un`, `pw`) VALUES
('admin', 'admin'),
('long3841', 'long3841'),
('user', 'user'),
('name', 'name'),
('user1', 'user1'),
('zeke', 'zeke');
