-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2015 at 09:55 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itinerate`
--
CREATE DATABASE IF NOT EXISTS `itinerate` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `itinerate`;

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE IF NOT EXISTS `attractions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `x-co` double NOT NULL,
  `y-co` double NOT NULL,
  `popularity` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifier` (`identifier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`id`, `city_id`, `identifier`, `name`, `x-co`, `y-co`, `popularity`, `time`) VALUES
(1, 1, 'baga-beach', 'Baga Beach', 15.555694, 73.751647, 10, 90),
(2, 1, 'sinquerium-beach', 'Sinquerium Beach', 15.499198, 73.76715, 9, 30),
(3, 1, 'arambol-beach', 'Arambol Beach', 15.684689, 73.703284, 8, 30),
(4, 1, 'palolem-beach', 'Palolem Beach', 15.009965, 74.023219, 7, 45),
(5, 1, 'calangute-beach', 'Calangute Beach', 15.549441, 73.753486, 6, 60),
(6, 1, 'butterfly-beach', 'Butterfly Beach', 15.019324, 74.001826, 5, 90),
(7, 1, 'divar-island', 'Divar Island', 15.527693, 73.906588, 4, 60),
(8, 1, 'basilica-of-bom-jesus', 'Basilica of Bom Jesus', 15.500894, 73.911627, 3, 60),
(9, 1, 'aguada-fort', 'Aguada Fort', 15.492383, 73.77371, 2, 90),
(10, 1, 'goa-state-museum', 'Goa State Museum', 15.493107, 73.833148, 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `x-co` double NOT NULL,
  `y-co` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `x-co`, `y-co`) VALUES
(1, 'Goa', 15.4989, 73.8278),
(2, 'Surat', 21.17, 72.83);

-- --------------------------------------------------------

--
-- Table structure for table `distance_attractions`
--

CREATE TABLE IF NOT EXISTS `distance_attractions` (
  `source_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `distance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distance_hotels`
--

CREATE TABLE IF NOT EXISTS `distance_hotels` (
  `hotel_id` int(11) NOT NULL,
  `attraction_id` int(11) NOT NULL,
  `distance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `x-co` double NOT NULL,
  `y-co` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `city_id`, `identifier`, `name`, `x-co`, `y-co`) VALUES
(1, 1, 'park-hyatt', 'Park Hyatt Goa Resort', 15.328212, 73.899067),
(2, 1, 'ramada-caravela', 'Ramada Caravela Beach Resort', 15.210599, 73.935231),
(3, 1, 'lalit-golf', 'The Lalit Golf and Spa', 14.991094, 74.040067),
(4, 1, 'park-hyatt', 'Park Hyatt Goa Resort', 15.328212, 73.899067),
(5, 1, 'ramada-caravela', 'Ramada Caravela Beach Resort', 15.210599, 73.935231),
(6, 1, 'lalit-golf', 'The Lalit Golf and Spa', 14.991094, 74.040067);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
