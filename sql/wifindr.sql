-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2015 at 04:01 AM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `hotspots`
--

INSERT INTO `hotspots` (`id`, `name`, `address`, `suburb`, `latitude`, `longitude`) VALUES
(1, 'Annerley Library Wifi', '450 Ipswich Road', 'Annerley, 4103', '-27.5094229', '153.0333218'),
(2, 'Ashgrove Library Wifi', '87 Amarina Avenue', 'Ashgrove, 4060', '-27.4439463', '152.9870981'),
(3, 'Banyo Library Wifi', '284 St. Vincents Road', 'Banyo, 4014', '-27.3739664', '153.0783234'),
(4, 'Booker Place Park', 'Birkin Rd & Sugarwood St', 'Bellbowrie', '-27.5635300', '152.8937200'),
(5, 'Bracken Ridge Library Wifi', 'Corner Bracken and Barrett Street', 'Bracken Ridge, 4017', '-27.3179726', '153.0378735'),
(6, 'Brisbane Botanic Gardens', 'Mt Coot-tha Rd', 'Toowong', '-27.4772400', '152.9759900'),
(7, 'Brisbane Square Library Wifi', 'Brisbane Square, 266 George Street', 'Brisbane, 4000', '-27.4709117', '153.0224598'),
(8, 'Bulimba Library Wifi', 'Corner Riding Road & Oxford Street', 'Bulimba, 4171', '-27.4520309', '153.0628242'),
(9, 'Calamvale District Park', 'Formby & Ormskirk Sts', 'Calamvale', '-27.6215200', '153.0366500'),
(10, 'Carina Library Wifi', 'Corner Mayfield Road & Nyrang Street', 'Carina, 4152', '-27.4916931', '153.0912127'),
(11, 'Carindale Library Wifi', 'The Home and Leisure Centre, Corner Carindale Street  & Banchory Court, Westfield Carindale Shopping Centre', 'Carindale, 4152', '-27.5047593', '153.1003965'),
(12, 'Carindale Recreation Reserve', 'Cadogan and Bedivere Sts', 'Carindale', '-27.4970000', '153.1110500'),
(13, 'Chermside Library Wifi', '375 Hamilton  Road', 'Chermside, 4032', '-27.3856032', '153.0349028'),
(14, 'City Botanic Gardens Wifi', 'Alice Street', 'Brisbane City', '-27.4756100', '153.0300500'),
(15, 'Coopers Plains Library Wifi', '107 Orange Grove Road', 'Coopers Plains, 4108', '-27.5651051', '153.0403183'),
(16, 'Corinda Library Wifi', '641 Oxley Road', 'Corinda, 4075', '-27.5388024', '152.9809091'),
(17, 'D.M. Henderson Park', 'Granadilla St', 'MacGregor', '-27.5774500', '153.0760300'),
(18, 'Einbunpin Lagoon', 'Brighton Rd', 'Sandgate', '-27.3194700', '153.0682200'),
(19, 'Everton Park Library Wifi', '561 South Pine Road', 'Everton park, 4053', '-27.4053336', '152.9904205'),
(20, 'Fairfield Library Wifi', 'Fairfield Gardens Shopping Centre, 180 Fairfield Road', 'Fairfield, 4103', '-27.5090904', '153.0259709'),
(21, 'Forest Lake Parklands', 'Forest Lake Bld', 'Forest Lake', '-27.6202000', '152.9662500'),
(22, 'Garden City Library Wifi', 'Garden City Shopping Centre, Corner Logan and Kessels Road', 'Upper Mount Gravatt, 4122', '-27.5624422', '153.0809183'),
(23, 'Glindemann Park', 'Logan Rd', 'Holland Park West', '-27.5255200', '153.0692300'),
(24, 'Grange Library Wifi', '79 Evelyn Street', 'Grange, 4051', '-27.4253119', '153.0174728'),
(25, 'Gregory Park', 'Baroona Rd', 'Paddington', '-27.4670000', '152.9998100'),
(26, 'Guyatt Park', 'Sir Fred Schonell Dve', 'St Lucia', '-27.4929700', '153.0018700'),
(27, 'Hamilton Library Wifi', 'Corner Racecourt Road and Rossiter Parade', 'Hamilton, 4007', '-27.4379014', '153.0642227'),
(28, 'Hidden World Park', 'Roghan Rd', 'Fitzgibbon', '-27.3397170', '153.0349810'),
(29, 'Holland Park Library Wifi', '81 Seville Road', 'Holland Park, 4121', '-27.5229229', '153.0722921'),
(30, 'Inala Library Wifi', 'Inala Shopping centre, Corsair Ave', 'Inala, 4077', '-27.5982857', '152.9735217'),
(31, 'Indooroopilly Library Wifi', 'Indrooroopilly Shopping centre, Level 4, 322 Moggill Road', 'Indooroopilly, 4068', '-27.4976429', '152.9736471'),
(32, 'Kalinga Park', 'Kalinga St', 'Clayfield', '-27.4066600', '153.0521700'),
(33, 'Kenmore Library Wifi', 'Kenmore Village Shopping Centre, Brookfield Road', 'Kenmore, 4069', '-27.5059285', '152.9386437'),
(34, 'King Edward Park (Jacob''s Ladder)', 'Turbot St and Wickham Tce', 'Brisbane', '-27.4658900', '153.0240600'),
(35, 'King George Square', 'Ann & Adelaide Sts', 'Brisbane', '-27.4684300', '153.0242200'),
(36, 'Mitchelton Library Wifi', '37 Helipolis Parada', 'Mitchelton, 4053', '-27.4170417', '152.9783402'),
(37, 'Mt Coot-tha Botanic Gardens Library Wifi', 'Administration Building, Brisbane Botanic Gardens (Mt Coot-tha), Mt Coot-tha Road', 'Toowong, 4066', '-27.4752991', '152.9760412'),
(38, 'Mt Gravatt Library Wifi', '8 Creek Road', 'Mt Gravatt, 4122', '-27.5385548', '153.0802628'),
(39, 'Mt Ommaney Library Wifi', 'Mt Ommaney Shopping Centre, 171 Dandenong Road', 'Mt Ommaney, 4074', '-27.5482420', '152.9378099'),
(40, 'New Farm Library Wifi', '135 Sydney Street', 'New Farm, 4005', '-27.4673657', '153.0495841'),
(41, 'New Farm Park Wifi', 'Brunswick Street', 'New Farm', '-27.4704600', '153.0522300'),
(42, 'Nundah Library Wifi', '1 Bage Street', 'Nundah, 4012', '-27.4012591', '153.0583751'),
(43, 'Oriel Park', 'Cnr of Alexandra & Lancaster Rds', 'Ascot', '-27.4292800', '153.0576800'),
(44, 'Orleigh Park', 'Hill End Tce', 'West End', '-27.4899500', '153.0032600'),
(45, 'Post Office Square', 'Queen & Adelaide Sts', 'Brisbane', '-27.4673500', '153.0273500'),
(46, 'Rocks Riverside Park', 'Counihan Rd', 'Seventeen Mile Rocks', '-27.5415300', '152.9591300'),
(47, 'Sandgate Library Wifi', 'Seymour Street', 'Sandgate, 4017', '-27.3206052', '153.0704927'),
(48, 'Stones Corner Library Wifi', '280 Logan Road', 'Stones Corner, 4120', '-27.4980358', '153.0436550'),
(49, 'Sunnybank Hills Library Wifi', 'Sunnybank Hills Shopping Centre, Corner Compton and Calam Roads', 'Sunnybank Hills, 4109', '-27.6109253', '153.0550706'),
(50, 'Teralba Park', 'Pullen & Osborne Rds', 'Everton Park', '-27.4028600', '152.9805900'),
(51, 'Toowong Library Wifi', 'Toowon Village Shopping Centre, Sherwood Road', 'Toowong, 4066', '-27.4850512', '152.9925091'),
(52, 'West End Library Wifi', '178 - 180 Boundary Street', 'West End, 4101', '-27.4824508', '153.0120763'),
(53, 'Wynnum Library Wifi', 'Wynnum Civic Centre, 66 Bay Terrace', 'Wynnum, 4178', '-27.4424489', '153.1731968'),
(54, 'Zillmere Library Wifi', 'Corner Jennings Street and Zillmere Road', 'Zillmere, 4034', '-27.3601423', '153.0407898');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
