-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2014 at 09:09 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `ak_crops`
--

CREATE TABLE IF NOT EXISTS `ak_crops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT ' ',
  `description` text NOT NULL,
  `altitude` int(11) unsigned NOT NULL DEFAULT '0',
  `farming_method` varchar(255) NOT NULL DEFAULT ' ',
  `harvest_time` varchar(55) NOT NULL DEFAULT '0',
  `diseases` blob NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Contains all crop information' AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ak_crops`
--

INSERT INTO `ak_crops` (`id`, `name`, `description`, `altitude`, `farming_method`, `harvest_time`, `diseases`) VALUES
(14, 'Maize', '', 800, 'Organic Farming', '20/2015', 0x613a313a7b693a303b733a313a2234223b7d),
(16, 'Tomatoes', '', 800, 'Organic Farming', '', ''),
(17, 'Another crop', 'Ssdasd', 2345, 'Organic Farming', '12/2014', 0x613a313a7b693a303b733a313a2235223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `ak_diseases`
--

CREATE TABLE IF NOT EXISTS `ak_diseases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT ' ',
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ak_diseases`
--

INSERT INTO `ak_diseases` (`id`, `name`, `description`) VALUES
(4, 'Neurosis', 'Whatever'),
(5, 'Mosaic', 'affects cassava');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
