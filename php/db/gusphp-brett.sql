-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2011 at 07:57 PM
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
  `fullname` varchar(25) NOT NULL,
  `description` varchar(256) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `major` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `un`, `pw`, `fullname`, `description`, `profile`, `email`, `contact`, `major`) VALUES
(0, 'cblair', 'SHI/hel7', '', '', 't', 'e', 's', 't'),
(11, 'anilson', 'supersecurepassword1234!@#$', '', '', 'sfdsfd', 'fdfd', 'saas', 'dsd'),
(12, 'long3841', 'long3841', '', '', '', '', '', ''),
(13, 'sbeddall', '0017761826', '', '', '', '', '', ''),
(15, 'brett', 'brett256', 'Brett Hitchcock', 'On fire.', 'khaaan.png', 'here@there.comdfdf', '123', 'CS'),
(17, 'timb', 'frost741', '', '', '', '', '', ''),
(18, 'claurino', '22877822', '', '', '', '', '', ''),
(19, 'lwegner', '7ndustr8', '', '', '', '', '', ''),
(20, 'crempel', 'SHI/hel7', '', '', '', '', '', ''),
(21, 'abhay', 'gusabhay', '', '', '', '', '', ''),
(22, 'drj', 'SHI/hel7', '', '', '', '', '', ''),
(23, 'test', 'test123', '', '', 'test', 'test@gus.org', '800 555-TEST', 'computer science'),
(24, 'admin', 'SHI/hel7', '', '', '', '', '', '');
