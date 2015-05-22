-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2015 at 08:18 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wifindr`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `rev_id` int(10) NOT NULL AUTO_INCREMENT,
  `hotspot_id` int(9) NOT NULL,
  `person_id` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `review_text` varchar(300) NOT NULL,
  `rating` decimal(10,1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`rev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rev_id`, `hotspot_id`, `person_id`, `name`, `review_text`, `rating`, `date`) VALUES
(2, 7, 1, 'Jimmy Pots', 'The Brisbane City library wi-fi is great! No drop outs of course and super fast! reaching about 8Mb/s.', '5.0', '2015-05-21 07:23:23'),
(3, 7, 2, 'Alfred Hitchcock', 'Great wi-fi, no problems at all, super fast and reliable. Some of my best work has been done here and it''s all thanks to their awesome wi-fi.', '4.5', '2015-05-20 04:09:13'),
(4, 7, 3, 'Albert Einstein', 'Great wi-fi, great environment. Using the library''s super fast wi-fi I was able to develop my special theory of relativity, marvellous. ', '4.5', '2015-05-18 00:00:00'),
(5, 14, 4, 'Nikola Tesla', 'Wow, technology has come a long way! The wi-fi at Brisbane''s Botanic Gardens is truly a marvel.', '4.9', '2015-05-19 07:22:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
