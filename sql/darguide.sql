-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2013 at 08:16 PM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `darguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(20, 'Hospital'),
(22, 'Hotel'),
(23, 'Recreational Place'),
(25, 'Police Station'),
(26, 'Education Institution');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `placeid` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userEmail` varchar(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `placeid`, `userName`, `userEmail`, `comment`) VALUES
(1, 0, 'mama', 'watoto', 'comment'),
(2, 0, 'is ', 'my', 'comment'),
(3, 20, 'kimoo', 'iutyoiuy', 'comment');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `placeid` int(11) NOT NULL,
  `hrating` varchar(20) NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this table holds information about hotels' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(34, 'Bunju'),
(35, 'Kigamboni'),
(37, 'Masaki');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `heading`, `description`, `link`) VALUES
(3, 'Innovation Space Opening Next Week', 'BUNI the innovation space at the COSTECH Building will be opening, early next week, we are welcoming all our beloved users, to come and enjoy the new look of the space', 'tanzict.or.tz'),
(4, 'Millenium Towers grand finale', 'Millenium Towers will be hosting the grand finale, of the premier league championship games, to be hosted by NSSF', 'http://ippmedia.co.tz');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `place_id`, `location`, `name`) VALUES
(1, 1, '/var/www/darguide/images/1/', '15.jpg'),
(3, 4, '/var/www/darguide/images/4/', '53F_SeaCliffZnzPoolPier.jpg'),
(4, 5, '/var/www/darguide/images/5/', '12.jpg'),
(6, 7, '/var/www/darguide/images/7/', '0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `service1` varchar(100) NOT NULL,
  `service2` varchar(100) NOT NULL,
  `service3` varchar(100) NOT NULL,
  `service4` varchar(100) NOT NULL,
  `service5` varchar(100) NOT NULL,
  `nearestPoint` varchar(50) NOT NULL,
  `direction` varchar(200) NOT NULL,
  `workingHours` varchar(50) NOT NULL,
  `longitude` decimal(20,15) NOT NULL,
  `latitude` decimal(20,15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone1` int(12) NOT NULL,
  `phone2` int(12) NOT NULL,
  `status` varchar(50) NOT NULL,
  `membership` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `category_id`, `person_id`, `name`, `location_id`, `description`, `service1`, `service2`, `service3`, `service4`, `service5`, `nearestPoint`, `direction`, `workingHours`, `longitude`, `latitude`, `email`, `phone1`, `phone2`, `status`, `membership`) VALUES
(1, 23, 0, 'Coral Beach', 37, 'Coral Beach is one of the best beaches in Dar es salaam, situated at the coast of the indian ocean, close to the city centre, the beach poses as one of the to go places for tourists and locals', 'Snookling', 'Bar and Restaurant', 'Diving', 'Chillaxing places', 'Badminton', 'Mwenge', 'From Mwenge, grab a bajaji , that should cost not more than 2,000', '9am - Mid night', 39.286986169433590, -6.757263127490528, 'info@coralbeach.info', 2147483647, 2147483647, 'checked', 1),
(4, 23, 0, 'Sea Cliff', 37, 'Sea Cliff Hotel is a nice hotel, at the Coast of Dar.This is a place to chiff for Locals and tourists alike, you will love the place and the beach around, also the good restaurants and shopping place', 'Cafeteria', 'Meetings places', 'Beach', 'Bar and Restaurant', 'Pool', 'Coco Beach', '', '24hrs', 0.000000000000000, 0.000000000000000, 'info@seacliff.co.tz', 2147483647, 293453453, 'checked', 1),
(5, 20, 9, 'Mwananyamala Hospital', 35, 'Mwananyamala Hospital is one of the biggest hospital in tanzania, it hosts thousands of people everyday, and its one of the busiest hospitals in tanzania\r\n', 'X-Ray', 'Laboratory', 'MRI', 'Operations', 'Medical Suplies', 'Victoria', 'From Victoria, Its 1Km south, using Mwinjuma Road', '24hrs', 39.253640946960445, -6.787349957934495, 'info@mwananyamalhospital.or.tz', 2147483647, 2147483647, 'checked', 1),
(7, 20, 1, 'Amana', 34, 'Amana Hospital is one of the best hospitals around. It is specialized in heart problems and skin disease', 'sa', 'ssd', 'dd', 'we', 'bg', 'Mwenge', 'Get a bajaj and you will reach here', '4hours', 39.220381555175780, -6.778059890453948, 'info@amanalhospital.or.tz', 6789900, 456789990, 'checked', 1);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(30) NOT NULL,
  `r_pointA` varchar(30) NOT NULL,
  `r_pointB` varchar(30) NOT NULL,
  `r_price` int(10) NOT NULL,
  `transType` varchar(15) NOT NULL,
  `r_distance` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `r_name`, `r_pointA`, `r_pointB`, `r_price`, `transType`, `r_distance`) VALUES
(3, 'Mwananyamala - Mbagala', 'Mbagala', 'Makumbusho', 400, 'Daladala', '10km'),
(4, 'Kariakoo - Mwenge', 'Kariakoo', 'Mwenge', 500, 'Daladala', '14km'),
(5, 'Mwenge - Posta', 'Mwenge', 'Posta', 400, 'Daladala', '12km'),
(6, 'Mwenge - Mabibo', 'Mwenge', 'Mabibo', 400, 'Big Red Buses', '12km'),
(7, 'Sayansi - Posta', 'Sayansi', 'Posta', 400, 'Daladala', '13km'),
(8, 'Sayansi - Kariakoo', 'Sayansi', 'Kariakoo', 400, 'Daladala', '13km'),
(9, 'Mbagala - Kariakoo', 'Mbagala', 'Kariakoo', 400, 'Green and Blue', '15km'),
(10, 'Mwenge - Mbagala', 'Mwenge', 'Mbagala', 700, 'Green and Blue', '20km'),
(11, 'Sayansi - Mwenge', 'Sayansi', 'Mwenge', 200, 'Blue and White', '3km');

-- --------------------------------------------------------

--
-- Table structure for table `route_bus`
--

CREATE TABLE IF NOT EXISTS `route_bus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_name` varchar(100) NOT NULL,
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `route_bus`
--

INSERT INTO `route_bus` (`id`, `route_name`, `from`, `to`) VALUES
(1, 'Mwenge - K/koo via Ali Hassan Mwinyi Road', 'Mwenge', 'Kariakoo'),
(2, 'Mwenge - K/koo via Ali Hassan Mwinyi Road 	', 'Kariakoo', 'Mwenge'),
(3, 'Posta - Mwenge via Ali Hassan Mwinyi Road', 'Mwenge', 'Posta'),
(4, 'Posta - Mwenge via Ali Hassan Mwinyi Road', 'Posta', 'Mwenge');

-- --------------------------------------------------------

--
-- Table structure for table `route_place`
--

CREATE TABLE IF NOT EXISTS `route_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `route_place`
--

INSERT INTO `route_place` (`id`, `name`, `area`, `location`, `description`) VALUES
(1, 'Mwenge', '', '', ''),
(2, 'Kariakoo', '', '', ''),
(3, 'ITV', '', '', ''),
(4, 'Bamaga', '', '', ''),
(5, 'Sayansi', '', '', ''),
(6, 'Makumbusho', '', '', ''),
(7, 'Victoria', '', '', ''),
(8, 'Morocco', '', '', ''),
(9, 'Biafra', '', '', ''),
(10, 'Manyanya', '', '', ''),
(11, 'Studio', '', '', ''),
(12, 'Morocco Hotel', '', '', ''),
(13, 'Magomeni Hospitali', '', '', ''),
(14, 'Magomeni Mapipa', '', '', ''),
(15, 'Jangwani', '', '', ''),
(16, 'Bakhresa', '', '', ''),
(17, 'Mbuyuni', '', '', ''),
(18, 'Salandar', '', '', ''),
(19, 'Palm Beach', '', '', ''),
(20, 'Red Cross', '', '', ''),
(21, 'Posta', '', '', ''),
(22, 'Ubalozi', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `route_stop`
--

CREATE TABLE IF NOT EXISTS `route_stop` (
  `bus_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `stop_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_stop`
--

INSERT INTO `route_stop` (`bus_id`, `place_id`, `stop_no`) VALUES
(1, 3, 1),
(1, 4, 2),
(1, 5, 3),
(1, 6, 4),
(1, 7, 5),
(1, 8, 6),
(1, 9, 7),
(1, 10, 8),
(1, 11, 9),
(1, 12, 10),
(1, 13, 11),
(1, 14, 12),
(1, 15, 13),
(1, 16, 14),
(1, 2, 15),
(1, 1, 0),
(2, 2, 0),
(2, 1, 15),
(2, 3, 14),
(2, 4, 13),
(2, 5, 12),
(2, 6, 11),
(2, 7, 10),
(2, 8, 9),
(2, 9, 8),
(2, 10, 7),
(2, 11, 6),
(2, 12, 5),
(2, 13, 4),
(2, 14, 3),
(2, 15, 2),
(2, 16, 1),
(3, 1, 0),
(3, 3, 1),
(3, 4, 2),
(3, 5, 3),
(3, 6, 4),
(3, 7, 5),
(3, 8, 6),
(3, 17, 7),
(3, 18, 8),
(3, 19, 9),
(3, 20, 10),
(3, 21, 11),
(4, 21, 0),
(4, 20, 1),
(4, 19, 2),
(4, 22, 3),
(4, 17, 4),
(4, 8, 5),
(4, 7, 6),
(4, 6, 7),
(4, 5, 8),
(4, 4, 9),
(4, 3, 10),
(4, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userole` varchar(25) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `userole`, `firstname`, `middlename`, `lastname`, `gender`, `status`) VALUES
(1, 'brompo', 'brompo', 'admin', 'Brian', 'Michael', 'Paul', 'Male', 'checked'),
(3, 'dabrilo', 'dabrilo', 'admin', 'Daniel', 'Paul', 'Chacha', 'Male', 'checked'),
(4, 'lottus', 'lottus', 'guest', 'Lottus', 'William', 'Mgalula', 'Female', 'checked'),
(9, 'lily', 'lily', 'normal', 'Lily', 'Madame', 'Mangeka', 'Female', 'checked'),
(10, 'riaz', 'riaz', 'normal', 'riaz', 'farid', 'jahanpour', 'male', 'checked');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
