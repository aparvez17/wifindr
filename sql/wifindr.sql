-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 03:49 PM
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
-- Table structure for table `hotspots`
--

CREATE TABLE IF NOT EXISTS `hotspots` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `address` varchar(107) DEFAULT NULL,
  `suburb` varchar(25) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `hotspot_rating` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `hotspots`
--

INSERT INTO `hotspots` (`id`, `name`, `address`, `suburb`, `latitude`, `longitude`, `hotspot_rating`) VALUES
(1, 'Annerley Library Wifi', '450 Ipswich Road', 'Annerley, 4103', '-27.5094229', '153.0333218', '0.00'),
(2, 'Ashgrove Library Wifi', '87 Amarina Avenue', 'Ashgrove, 4060', '-27.4439463', '152.9870981', '4.00'),
(3, 'Banyo Library Wifi', '284 St. Vincents Road', 'Banyo, 4014', '-27.3739664', '153.0783234', '3.00'),
(4, 'Booker Place Park', 'Birkin Rd & Sugarwood St', 'Bellbowrie', '-27.5635300', '152.8937200', '0.00'),
(5, 'Bracken Ridge Library Wifi', 'Corner Bracken and Barrett Street', 'Bracken Ridge, 4017', '-27.3179726', '153.0378735', '0.00'),
(6, 'Brisbane Botanic Gardens', 'Mt Coot-tha Rd', 'Toowong', '-27.4772400', '152.9759900', '0.00'),
(7, 'Brisbane Square Library Wifi', 'Brisbane Square, 266 George Street', 'Brisbane, 4000', '-27.4709117', '153.0224598', '5.00'),
(8, 'Bulimba Library Wifi', 'Corner Riding Road & Oxford Street', 'Bulimba, 4171', '-27.4520309', '153.0628242', '0.00'),
(9, 'Calamvale District Park', 'Formby & Ormskirk Sts', 'Calamvale', '-27.6215200', '153.0366500', '0.00'),
(10, 'Carina Library Wifi', 'Corner Mayfield Road & Nyrang Street', 'Carina, 4152', '-27.4916931', '153.0912127', '0.00'),
(11, 'Carindale Library Wifi', 'The Home and Leisure Centre, Corner Carindale Street  & Banchory Court, Westfield Carindale Shopping Centre', 'Carindale, 4152', '-27.5047593', '153.1003965', '0.00'),
(12, 'Carindale Recreation Reserve', 'Cadogan and Bedivere Sts', 'Carindale', '-27.4970000', '153.1110500', '0.00'),
(13, 'Chermside Library Wifi', '375 Hamilton  Road', 'Chermside, 4032', '-27.3856032', '153.0349028', '0.00'),
(14, 'City Botanic Gardens Wifi', 'Alice Street', 'Brisbane City', '-27.4756100', '153.0300500', '2.00'),
(15, 'Coopers Plains Library Wifi', '107 Orange Grove Road', 'Coopers Plains, 4108', '-27.5651051', '153.0403183', '0.00'),
(16, 'Corinda Library Wifi', '641 Oxley Road', 'Corinda, 4075', '-27.5388024', '152.9809091', '0.00'),
(17, 'D.M. Henderson Park', 'Granadilla St', 'MacGregor', '-27.5774500', '153.0760300', '0.00'),
(18, 'Einbunpin Lagoon', 'Brighton Rd', 'Sandgate', '-27.3194700', '153.0682200', '0.00'),
(19, 'Everton Park Library Wifi', '561 South Pine Road', 'Everton park, 4053', '-27.4053336', '152.9904205', '0.00'),
(20, 'Fairfield Library Wifi', 'Fairfield Gardens Shopping Centre, 180 Fairfield Road', 'Fairfield, 4103', '-27.5090904', '153.0259709', '0.00'),
(21, 'Forest Lake Parklands', 'Forest Lake Bld', 'Forest Lake', '-27.6202000', '152.9662500', '0.00'),
(22, 'Garden City Library Wifi', 'Garden City Shopping Centre, Corner Logan and Kessels Road', 'Upper Mount Gravatt, 4122', '-27.5624422', '153.0809183', '0.00'),
(23, 'Glindemann Park', 'Logan Rd', 'Holland Park West', '-27.5255200', '153.0692300', '0.00'),
(24, 'Grange Library Wifi', '79 Evelyn Street', 'Grange, 4051', '-27.4253119', '153.0174728', '0.00'),
(25, 'Gregory Park', 'Baroona Rd', 'Paddington', '-27.4670000', '152.9998100', '0.00'),
(26, 'Guyatt Park', 'Sir Fred Schonell Dve', 'St Lucia', '-27.4929700', '153.0018700', '0.00'),
(27, 'Hamilton Library Wifi', 'Corner Racecourt Road and Rossiter Parade', 'Hamilton, 4007', '-27.4379014', '153.0642227', '0.00'),
(28, 'Hidden World Park', 'Roghan Rd', 'Fitzgibbon', '-27.3397170', '153.0349810', '0.00'),
(29, 'Holland Park Library Wifi', '81 Seville Road', 'Holland Park, 4121', '-27.5229229', '153.0722921', '0.00'),
(30, 'Inala Library Wifi', 'Inala Shopping centre, Corsair Ave', 'Inala, 4077', '-27.5982857', '152.9735217', '0.00'),
(31, 'Indooroopilly Library Wifi', 'Indrooroopilly Shopping centre, Level 4, 322 Moggill Road', 'Indooroopilly, 4068', '-27.4976429', '152.9736471', '0.00'),
(32, 'Kalinga Park', 'Kalinga St', 'Clayfield', '-27.4066600', '153.0521700', '0.00'),
(33, 'Kenmore Library Wifi', 'Kenmore Village Shopping Centre, Brookfield Road', 'Kenmore, 4069', '-27.5059285', '152.9386437', '0.00'),
(34, 'King Edward Park (Jacob''s Ladder)', 'Turbot St and Wickham Tce', 'Brisbane', '-27.4658900', '153.0240600', '0.00'),
(35, 'King George Square', 'Ann & Adelaide Sts', 'Brisbane', '-27.4684300', '153.0242200', '0.00'),
(36, 'Mitchelton Library Wifi', '37 Helipolis Parada', 'Mitchelton, 4053', '-27.4170417', '152.9783402', '0.00'),
(37, 'Mt Coot-tha Botanic Gardens Library Wifi', 'Administration Building, Brisbane Botanic Gardens (Mt Coot-tha), Mt Coot-tha Road', 'Toowong, 4066', '-27.4752991', '152.9760412', '0.00'),
(38, 'Mt Gravatt Library Wifi', '8 Creek Road', 'Mt Gravatt, 4122', '-27.5385548', '153.0802628', '0.00'),
(39, 'Mt Ommaney Library Wifi', 'Mt Ommaney Shopping Centre, 171 Dandenong Road', 'Mt Ommaney, 4074', '-27.5482420', '152.9378099', '0.00'),
(40, 'New Farm Library Wifi', '135 Sydney Street', 'New Farm, 4005', '-27.4673657', '153.0495841', '0.00'),
(41, 'New Farm Park Wifi', 'Brunswick Street', 'New Farm', '-27.4704600', '153.0522300', '0.00'),
(42, 'Nundah Library Wifi', '1 Bage Street', 'Nundah, 4012', '-27.4012591', '153.0583751', '0.00'),
(43, 'Oriel Park', 'Cnr of Alexandra & Lancaster Rds', 'Ascot', '-27.4292800', '153.0576800', '0.00'),
(44, 'Orleigh Park', 'Hill End Tce', 'West End', '-27.4899500', '153.0032600', '0.00'),
(45, 'Post Office Square', 'Queen & Adelaide Sts', 'Brisbane', '-27.4673500', '153.0273500', '0.00'),
(46, 'Rocks Riverside Park', 'Counihan Rd', 'Seventeen Mile Rocks', '-27.5415300', '152.9591300', '0.00'),
(47, 'Sandgate Library Wifi', 'Seymour Street', 'Sandgate, 4017', '-27.3206052', '153.0704927', '0.00'),
(48, 'Stones Corner Library Wifi', '280 Logan Road', 'Stones Corner, 4120', '-27.4980358', '153.0436550', '0.00'),
(49, 'Sunnybank Hills Library Wifi', 'Sunnybank Hills Shopping Centre, Corner Compton and Calam Roads', 'Sunnybank Hills, 4109', '-27.6109253', '153.0550706', '0.00'),
(50, 'Teralba Park', 'Pullen & Osborne Rds', 'Everton Park', '-27.4028600', '152.9805900', '0.00'),
(51, 'Toowong Library Wifi', 'Toowon Village Shopping Centre, Sherwood Road', 'Toowong, 4066', '-27.4850512', '152.9925091', '0.00'),
(52, 'West End Library Wifi', '178 - 180 Boundary Street', 'West End, 4101', '-27.4824508', '153.0120763', '0.00'),
(53, 'Wynnum Library Wifi', 'Wynnum Civic Centre, 66 Bay Terrace', 'Wynnum, 4178', '-27.4424489', '153.1731968', '0.00'),
(54, 'Zillmere Library Wifi', 'Corner Jennings Street and Zillmere Road', 'Zillmere, 4034', '-27.3601423', '153.0407898', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `rev_id` int(10) NOT NULL AUTO_INCREMENT,
  `hotspot_id` int(9) NOT NULL,
  `person_id` int(9) NOT NULL,
  `person_name` varchar(30) NOT NULL,
  `review_text` varchar(300) NOT NULL,
  `rating` decimal(10,1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`rev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rev_id`, `hotspot_id`, `person_id`, `person_name`, `review_text`, `rating`, `date`) VALUES
(24, 7, 0, 'asad@example.com', 'Wow this, place has really great wi-Fi. I could go on and on about how great it is but how about I just leave it with a rating?', '5.0', '2015-05-26 11:44:22'),
(25, 14, 0, 'asad@example.com', 'This one''s a bit out of the way for me, the signal strength is often quite low. Not a big fan :S', '2.0', '2015-05-26 11:45:35'),
(26, 2, 0, 'asad@example.com', 'Love coming here on the weekends great wi-fi, great environment to study!', '4.0', '2015-05-26 11:46:31'),
(27, 3, 0, 'asad@example.com', 'Not a big fan, the place smells and there''s always toddlers running around making noise. The wi-fi is average.', '3.0', '2015-05-26 11:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Sex` varchar(6) NOT NULL,
  `Birth` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Sex`, `Birth`, `username`, `email`, `password`, `admin`) VALUES
(33, 'male', '2015-05-21', '', 'dannyiss@gmail.com', 'b85ac2a87690baac2c4bdeb2ce14d419', 0),
(34, 'male', '2015-05-21', 'andy', 'andy@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0),
(35, 'male', '2015-05-13', 'alex', 'alex@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0),
(36, 'male', '2015-05-06', 'Asad', 'asad@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
