-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2011 at 12:45 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=218 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`user`, `date`, `data`, `eventID`) VALUES
('main', '2011-04-08', 'event', 209),
('long3841', '2011-04-13', 'event!', 206),
('long3841', '2011-04-06', 'event', 199),
('long3841', '2011-04-05', 'Event!!!!', 194),
('long3841', '2011-04-08', 'something else', 201),
('admin', '2011-04-08', 'event!', 215);


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
(201, 0, 'long3841', 1, 0, 0, 0),
(201, 0, 'admin', 1, 0, 0, 0);