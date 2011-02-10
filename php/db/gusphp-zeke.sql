-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2011 at 03:45 AM
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
  `data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`user`, `date`, `data`) VALUES
('admin', '2011-02-15', 'this is an event'),
('long3841', '2011-02-27', 'wake up early'),
('name', '2011-02-26', 'an event on the 26th'),
('name', '2011-07-07', 'an event in july'),
('name', '2011-02-18', 'another event'),
('admin', '2011-02-17', 'an event');

