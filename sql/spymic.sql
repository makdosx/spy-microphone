-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2020 at 08:00 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spymic`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(32) NOT NULL,
  `verify` varchar(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`user_id`, `instant`, `password`, `verify`) VALUES
(1, '2020-03-24 16:47:31', '63609ca0ac2080b4e27fabff2ca6c416', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `computer_name` varchar(32) NOT NULL,
  `ipv4` varchar(16) NOT NULL,
  `public_ip` varchar(32) NOT NULL,
  `operating_system` varchar(256) NOT NULL,
  `computer_info` longtext NOT NULL,
  `hard_disk_id_serial_number` varchar(64) NOT NULL,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seconds` varchar(16) NOT NULL,
  `record` longblob NOT NULL,
  `fingerprint` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fingerprint` (`fingerprint`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=631 ;

-- --------------------------------------------------------

--
-- Table structure for table `str_lines`
--

CREATE TABLE IF NOT EXISTS `str_lines` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `str_line` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=770 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
