-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2011 at 06:49 PM
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
(0, 'cblair', 'SHI/hel7', '', '', '', ''),
(11, 'anilson', 'supersecurepassword1234!@#$', '', '', '', ''),
(12, 'long3841', 'long3841', '', '', '', ''),
(13, 'sbeddall', '0017761826', '', '', '', ''),
(15, 'brett', 'brett256', '', '', '', ''),
(17, 'timb', 'frost741', '', '', '', ''),
(18, 'claurino', '22877822', '', '', '', ''),
(19, 'lwegner', '7ndustr8', '', '', '', ''),
(20, 'crempel', 'SHI/hel7', '', '', '', ''),
(21, 'abhay', 'gusabhay', '', '', '', ''),
(22, 'drj', 'SHI/hel7', '', '', '', ''),
(23, 'test', 'test123', '', '', '', ''),
(24, 'admin', 'SHI/hel7', '', '', '', ''),
(25, 'sdfasdffe', '324vf3v3f3f', '', '', '', '');
