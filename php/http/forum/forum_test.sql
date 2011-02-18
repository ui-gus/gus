-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2011 at 02:02 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer`
--

CREATE TABLE IF NOT EXISTS `forum_answer` (
  `question_id` int(4) NOT NULL,
  `a_id` int(4) NOT NULL,
  `a_name` varchar(65) NOT NULL,
  `a_email` varchar(65) NOT NULL,
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_answer`
--


-- --------------------------------------------------------

--
-- Table structure for table `forum_question`
--

CREATE TABLE IF NOT EXISTS `forum_question` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `datetime` varchar(25) NOT NULL,
  `view` int(4) NOT NULL,
  `reply` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forum_question`
--

