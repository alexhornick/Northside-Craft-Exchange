-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2016 at 02:30 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `northside_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `street_number` int(11) NOT NULL,
  `street_suffix` varchar(10) DEFAULT NULL,
  `street_name` varchar(35) NOT NULL,
  `street_type` varchar(15) NOT NULL,
  `street_direction` varchar(2) DEFAULT NULL,
  `address_type` varchar(20) NOT NULL,
  `address_type_identifier` varchar(10) DEFAULT NULL,
  `minor_municipality` varchar(35) DEFAULT NULL,
  `major_municipality` varchar(35) NOT NULL,
  `governing_district` varchar(35) NOT NULL,
  `zip` varchar(16) NOT NULL,
  `iso_country_code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `street_number`, `street_suffix`, `street_name`, `street_type`, `street_direction`, `address_type`, `address_type_identifier`, `minor_municipality`, `major_municipality`, `governing_district`, `zip`, `iso_country_code`) VALUES
(0, 601, NULL, 'College', 'St', NULL, 'House', 'H', NULL, 'Clarksville', 'TN', '37040', 'US'),
(1, 89, NULL, 'Constance', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'Kolhapur', '37040', 'US'),
(2, 1, NULL, 'Jasmine', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'My', '37040', 'US'),
(3, 47, NULL, 'Mara', 'Dr', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Tourinne', '37040', 'US'),
(4, 89, NULL, 'Tanek', 'St', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Castri di Lecce', '37040', 'US'),
(5, 17, NULL, 'Iris', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'King Township', '37040', 'US'),
(6, 47, NULL, 'Eleanor', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'Livingston', '37040', 'US'),
(7, 43, NULL, 'Amy', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Buzenol', '37040', 'US'),
(8, 61, NULL, 'Brittany', 'Dr', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Mundare', '37040', 'US'),
(9, 3, NULL, 'Angelica', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Le Cannet', '37040', 'US'),
(10, 11, NULL, 'Taylor', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Monstreux', '37040', 'US'),
(11, 1, NULL, 'Susan', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Lauregno/Laurein', '37040', 'US'),
(12, 7, NULL, 'Orli', 'Rd', NULL, 'Apartment', 'A', NULL, 'Nashville', 'L?vis', '37040', 'US'),
(13, 3, NULL, 'Cadman', 'Ave', NULL, 'House', 'H', NULL, 'Clarksville', 'Hulshout', '37040', 'US'),
(14, 19, NULL, 'Nerea', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Coupar Angus', '37040', 'US'),
(15, 1, NULL, 'Prescott', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Geel', '37040', 'US'),
(16, 83, NULL, 'Charity', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Frascati', '37040', 'US'),
(17, 59, NULL, 'Sean', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Erchie', '37040', 'US'),
(18, 83, NULL, 'Stuart', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'Telde', '37040', 'US'),
(19, 43, NULL, 'Tatiana', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Istanbul', '37040', 'US'),
(20, 3, NULL, 'Phelan', 'Dr', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Moradabad', '37040', 'US'),
(21, 19, NULL, 'Preston', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'Comblain-au-Pont', '37040', 'US'),
(22, 11, NULL, 'Leo', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'Henderson', '37040', 'US'),
(23, 73, NULL, 'Iliana', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Dalkeith', '37040', 'US'),
(24, 31, NULL, 'Marsden', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Bia?a Podlaska', '37040', 'US'),
(25, 3, NULL, 'Amena', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'Los Andes', '37040', 'US'),
(26, 79, NULL, 'Hu', 'St', NULL, 'House', 'H', NULL, 'Clarksville', 'Cascavel', '37040', 'US'),
(27, 97, NULL, 'Chelsea', 'St', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Heidelberg', '37040', 'US'),
(28, 97, NULL, 'Devin', 'St', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Warren', '37040', 'US'),
(29, 67, NULL, 'Rashad', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Bois-de-Villers', '37040', 'US'),
(30, 43, NULL, 'Yoshi', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Springfield', '37040', 'US'),
(31, 29, NULL, 'Carly', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Augusta', '37040', 'US'),
(32, 19, NULL, 'Melodie', 'St', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Bida', '37040', 'US'),
(33, 3, NULL, 'Rebekah', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Calice al Cornoviglio', '37040', 'US'),
(34, 59, NULL, 'Daria', 'Ave', NULL, 'House', 'H', NULL, 'Clarksville', 'Alençon', '37040', 'US'),
(35, 5, NULL, 'Timothy', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Couillet', '37040', 'US'),
(36, 41, NULL, 'Gail', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Pietraroja', '37040', 'US'),
(37, 1, NULL, 'Levi', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Dolceacqua', '37040', 'US'),
(38, 67, NULL, 'Chelsea', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'Torino', '37040', 'US'),
(39, 73, NULL, 'Adena', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Ludwigsburg', '37040', 'US'),
(40, 79, NULL, 'Buckminster', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Melton Mowbray', '37040', 'US'),
(41, 3, NULL, 'Hilel', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Lampernisse', '37040', 'US'),
(42, 61, NULL, 'Brady', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Dreux', '37040', 'US'),
(43, 61, NULL, 'Leslie', 'St', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Rexton', '37040', 'US'),
(44, 37, NULL, 'Keith', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Colorno', '37040', 'US'),
(45, 67, NULL, 'Bryar', 'St', NULL, 'House', 'H', NULL, 'Clarksville', 'Geest-GŽrompont-Petit-RosiŽre', '37040', 'US'),
(46, 17, NULL, 'Hammett', 'St', NULL, 'House', 'H', NULL, 'Clarksville', 'Temploux', '37040', 'US'),
(47, 41, NULL, 'Myles', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Walhain-Saint-Paul', '37040', 'US'),
(48, 41, NULL, 'Macon', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Pemuco', '37040', 'US'),
(49, 5, NULL, 'Sydnee', 'St', NULL, 'House', 'H', NULL, 'Clarksville', 'Allein', '37040', 'US'),
(50, 11, NULL, 'Linda', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Salvador', '37040', 'US'),
(51, 53, NULL, 'Hedley', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Abergele', '37040', 'US'),
(52, 89, NULL, 'Len', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', '?mamo?lu', '37040', 'US'),
(53, 17, NULL, 'Alea', 'Ave', NULL, 'House', 'H', NULL, 'Clarksville', 'Cairns', '37040', 'US'),
(54, 47, NULL, 'Shelby', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Lochristi', '37040', 'US'),
(55, 37, NULL, 'Dai', 'Rd', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Squillace', '37040', 'US'),
(56, 13, NULL, 'Todd', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Ranchi', '37040', 'US'),
(57, 43, NULL, 'Denton', 'St', NULL, 'House', 'H', NULL, 'Clarksville', 'Kuringen', '37040', 'US'),
(58, 23, NULL, 'Wynter', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Macul', '37040', 'US'),
(59, 97, NULL, 'Maggy', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Raigarh', '37040', 'US'),
(60, 19, NULL, 'Cally', 'Dr', NULL, 'Apartment', 'A', NULL, 'Nashville', 'IJlst', '37040', 'US'),
(61, 3, NULL, 'Alyssa', 'St', NULL, 'House', 'H', NULL, 'Clarksville', 'Assiniboia', '37040', 'US'),
(62, 67, NULL, 'Plato', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Murdochville', '37040', 'US'),
(63, 83, NULL, 'Walter', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Wibrin', '37040', 'US'),
(64, 29, NULL, 'Hamish', 'Dr', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Saint-LŽger', '37040', 'US'),
(65, 37, NULL, 'Lewis', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'Montluçon', '37040', 'US'),
(66, 23, NULL, 'Xyla', 'St', NULL, 'House', 'H', NULL, 'Clarksville', 'Neustadt', '37040', 'US'),
(67, 37, NULL, 'Candace', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Suarlee', '37040', 'US'),
(68, 43, NULL, 'Karleigh', 'Rd', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Antártica', '37040', 'US'),
(69, 83, NULL, 'Damian', 'Ave', NULL, 'House', 'H', NULL, 'Clarksville', 'Mandi Bahauddin', '37040', 'US'),
(70, 53, NULL, 'Ashton', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Meerhout', '37040', 'US'),
(71, 13, NULL, 'Jolene', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Yerbas Buenas', '37040', 'US'),
(72, 61, NULL, 'Karyn', 'Rd', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Lokeren', '37040', 'US'),
(73, 73, NULL, 'Lareina', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Lauro de Freitas', '37040', 'US'),
(74, 43, NULL, 'Micah', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Sissa', '37040', 'US'),
(75, 19, NULL, 'Nash', 'Rd', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Palayankottai', '37040', 'US'),
(76, 31, NULL, 'Daryl', 'Dr', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Capena', '37040', 'US'),
(77, 71, NULL, 'Liberty', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Rezé', '37040', 'US'),
(78, 67, NULL, 'Ginger', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Surrey', '37040', 'US'),
(79, 67, NULL, 'Azalia', 'St', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Saint Paul', '37040', 'US'),
(80, 41, NULL, 'Madison', 'Hwy', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Brecon', '37040', 'US'),
(81, 83, NULL, 'Ora', 'Ave', NULL, 'House', 'H', NULL, 'Clarksville', 'Nieuwkerken-Waas', '37040', 'US'),
(82, 71, NULL, 'Hoyt', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Montebello', '37040', 'US'),
(83, 3, NULL, 'Perry', 'Dr', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Goulburn', '37040', 'US'),
(84, 31, NULL, 'Burke', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Ribeirão das Neves', '37040', 'US'),
(85, 11, NULL, 'Venus', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'New Bombay', '37040', 'US'),
(86, 37, NULL, 'Francesca', 'Dr', NULL, 'House', 'H', NULL, 'Clarksville', 'Zevekote', '37040', 'US'),
(87, 53, NULL, 'Ralph', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Aurillac', '37040', 'US'),
(88, 79, NULL, 'Kerry', 'Rd', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Cambridge', '37040', 'US'),
(89, 1, NULL, 'Oren', 'Rd', NULL, 'House', 'H', NULL, 'Clarksville', 'Gwalior', '37040', 'US'),
(90, 43, NULL, 'Shelly', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Appelterre-Eichem', '37040', 'US'),
(91, 19, NULL, 'Trevor', 'St', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Missoula', '37040', 'US'),
(92, 43, NULL, 'Kendall', 'St', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Cagnes-sur-Mer', '37040', 'US'),
(93, 19, NULL, 'Chase', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Roccabruna', '37040', 'US'),
(94, 37, NULL, 'Petra', 'Ave', NULL, 'House', 'H', NULL, 'Clarksville', 'Maria', '37040', 'US'),
(95, 79, NULL, 'Kimberley', 'Dr', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Saskatoon', '37040', 'US'),
(96, 53, NULL, 'Georgia', 'Ave', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Lévis', '37040', 'US'),
(97, 71, NULL, 'Kelly', 'St', NULL, 'House', 'H', NULL, 'Clarksville', 'Chillán Viejo', '37040', 'US'),
(98, 97, NULL, 'Dale', 'Hwy', NULL, 'House', 'H', NULL, 'Clarksville', 'Crystal Springs', '37040', 'US'),
(99, 47, NULL, 'Emery', 'Rd', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Montresta', '37040', 'US'),
(100, 73, NULL, 'Basia', 'Dr', NULL, 'Apartment', 'A', NULL, 'Nashville', 'Gouda', '37040', 'US'),
(101, 555, NULL, 'AVE', 'TEST', NULL, 'TEST', NULL, NULL, 'TEST', 'TEST', '37040', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `craft`
--

CREATE TABLE `craft` (
  `craft_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `craft`
--

INSERT INTO `craft` (`craft_id`, `item_id`) VALUES
(70, 0),
(71, 1),
(72, 2),
(73, 3),
(74, 4),
(75, 5),
(76, 6),
(77, 7),
(78, 8),
(79, 9),
(80, 10),
(81, 11),
(82, 12),
(83, 13),
(84, 14),
(85, 15),
(86, 16),
(87, 17),
(88, 18),
(89, 19);

-- --------------------------------------------------------

--
-- Table structure for table `craft_materials`
--

CREATE TABLE `craft_materials` (
  `material_id` int(11) NOT NULL,
  `craft_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `craft_materials`
--

INSERT INTO `craft_materials` (`material_id`, `craft_id`) VALUES
(2, 79),
(2, 85),
(2, 87),
(4, 70),
(4, 72),
(5, 78),
(5, 86),
(6, 73),
(6, 82),
(10, 74),
(10, 77),
(10, 83),
(11, 75),
(11, 76),
(11, 84),
(12, 71),
(13, 81),
(16, 88),
(17, 80);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `last_name`, `first_name`, `phone_number`, `email`, `address_id`) VALUES
(1, 'Ingram', 'Harriet', '(800) 711-5395', 'dolor.dolor.tempus@ipsumacmi.co.uk', 26),
(2, 'Mann', 'Shea', '(243) 489-9669', 'fringilla.porttitor@Mauris.com', 27),
(3, 'Bauer', 'Patrick', '(436) 596-7193', 'aliquet.vel.vulputate@arcuSedeu.net', 28),
(4, 'Sears', 'Rowan', '(395) 178-9962', 'ante.ipsum.primis@viverraDonectempus.ca', 29),
(5, 'Morton', 'Kenneth', '(990) 450-8766', 'Vivamus@euultricessit.ca', 30),
(6, 'Mueller', 'Brandon', '(148) 656-7892', 'auctor.ullamcorper@ligula.net', 31),
(7, 'Mckay', 'Geoffrey', '(501) 395-6866', 'vel@duiFuscediam.co.uk', 32),
(8, 'Malone', 'Miranda', '(405) 306-7052', 'non@magnaSuspendisse.ca', 33),
(9, 'Washington', 'Hanae', '(348) 389-3063', 'Ut.sagittis@nonenimcommodo.org', 34),
(10, 'Martin', 'Astra', '(445) 154-3298', 'magna.Sed@augueSedmolestie.ca', 35),
(11, 'Gillespie', 'Madison', '(161) 336-5457', 'a@Duisatlacus.org', 36),
(12, 'Castro', 'Montana', '(306) 552-4949', 'sagittis.felis@mieleifend.org', 37),
(13, 'Shelton', 'Thane', '(950) 677-6084', 'orci@dolor.co.uk', 38),
(14, 'Decker', 'Quinn', '(294) 680-9302', 'vestibulum.Mauris@luctus.net', 39),
(15, 'Drake', 'Amal', '(500) 319-9179', 'sapien.imperdiet@tinciduntpede.com', 40),
(16, 'Whitney', 'Chiquita', '(296) 577-7453', 'eu.turpis@Morbivehicula.net', 41),
(17, 'Hahn', 'Cadman', '(425) 688-7749', 'Aenean@ridiculus.net', 42),
(18, 'Richards', 'Shea', '(356) 544-1558', 'ullamcorper@vitaealiquam.ca', 43),
(19, 'Buchanan', 'Chloe', '(798) 836-9373', 'mauris.a.nunc@a.net', 44),
(20, 'Cote', 'Adria', '(453) 104-3660', 'pede@egestasDuisac.edu', 45),
(21, 'Morse', 'Lucius', '(352) 360-3023', 'ac.arcu.Nunc@ligula.com', 46),
(22, 'Wood', 'Kendall', '(974) 232-7107', 'elit.pretium.et@ornarelectus.net', 47),
(23, 'Goodman', 'Melissa', '(633) 679-8245', 'turpis.Aliquam@anteipsumprimis.edu', 48),
(24, 'Stewart', 'Keefe', '(981) 494-2740', 'ac@dolorsit.ca', 49),
(25, 'Gilliam', 'Iris', '(350) 241-7058', 'ultrices@enimCurabitur.com', 50),
(26, 'Stafford', 'Brandon', '(448) 936-1611', 'habitant.morbi.tristique@suscipitnonummy.edu', 51),
(27, 'Preston', 'Kirk', '(625) 819-3584', 'ac.sem@atlacusQuisque.net', 52),
(28, 'Valencia', 'Liberty', '(813) 880-3533', 'ut.nisi.a@Vestibulumante.co.uk', 53),
(29, 'Jensen', 'Alec', '(899) 604-5108', 'luctus@etnetus.org', 54),
(30, 'Walter', 'Anne', '(701) 487-7953', 'elit@Aenean.co.uk', 55),
(31, 'Tyler', 'Darryl', '(130) 597-0985', 'varius.ultrices@sedestNunc.com', 56),
(32, 'Hunt', 'Kane', '(335) 431-1311', 'Cras.interdum@etmagnaPraesent.com', 57),
(33, 'Prince', 'Iona', '(417) 869-2156', 'eu.odio.tristique@hendrerit.co.uk', 58),
(34, 'Byrd', 'Ann', '(458) 962-4060', 'massa.lobortis@disparturient.com', 59),
(35, 'Horne', 'Sydney', '(995) 804-8153', 'Fusce@facilisis.co.uk', 60),
(36, 'Gutierrez', 'Raya', '(373) 660-4159', 'dui.Suspendisse.ac@aliquam.com', 61),
(37, 'Hopkins', 'Jorden', '(931) 813-7353', 'lorem@anteNuncmauris.org', 62),
(38, 'Mayo', 'Hector', '(520) 571-0136', 'fringilla@arcuMorbi.net', 63),
(39, 'Reeves', 'India', '(571) 759-9012', 'nulla.Integer@mollisPhaselluslibero.co.uk', 64),
(40, 'Fry', 'Jack', '(967) 180-4248', 'Donec.dignissim.magna@imperdietdictummagna.net', 65),
(41, 'Kaufman', 'India', '(840) 978-9459', 'Nam.porttitor.scelerisque@lobortismauris.org', 66),
(42, 'Meyer', 'Hope', '(145) 735-6017', 'ullamcorper.eu.euismod@Aliquam.co.uk', 67),
(43, 'Scott', 'Fatima', '(963) 201-5915', 'varius@Nulla.com', 68),
(44, 'Weiss', 'Gavin', '(438) 992-2654', 'facilisi@tristiqueneque.ca', 69),
(45, 'Hendricks', 'Murphy', '(245) 777-2485', 'mauris.ut@Quisque.ca', 70),
(46, 'Sanford', 'Kevyn', '(145) 449-6368', 'malesuada.fames@enimmi.org', 71),
(47, 'Melton', 'Fulton', '(298) 748-3171', 'montes.nascetur@Duisat.co.uk', 72),
(48, 'Velez', 'Darius', '(635) 962-3418', 'Suspendisse@consequat.edu', 73),
(49, 'Kennedy', 'Alexa', '(308) 752-8256', 'et@egetodioAliquam.org', 74),
(50, 'George', 'Allen', '(480) 335-7677', 'eu.nibh.vulputate@iaculisaliquet.co.uk', 75),
(51, 'Gilliam', 'Cole', '(170) 965-5787', 'sodales.purus.in@auctorquistristique.org', 76),
(52, 'Randall', 'Julian', '(651) 267-3800', 'gravida.Praesent.eu@sitametdiam.ca', 77),
(53, 'Conrad', 'Amaya', '(731) 941-4207', 'eu@Maurisvestibulumneque.edu', 78),
(54, 'Glenn', 'Ciara', '(934) 100-4258', 'Ut.nec@egestasligula.net', 79),
(55, 'May', 'Walker', '(707) 782-4693', 'Mauris.vel.turpis@euultrices.org', 80),
(56, 'Chandler', 'Grant', '(701) 409-4600', 'risus@eratvelpede.org', 81),
(57, 'Bruce', 'Yardley', '(732) 160-3880', 'aliquet.magna.a@veliteusem.com', 82),
(58, 'Miranda', 'Silas', '(269) 931-2602', 'commodo@ornare.co.uk', 83),
(59, 'Porter', 'Jackson', '(161) 708-9321', 'Mauris.magna@mattis.org', 84),
(60, 'Pacheco', 'Rowan', '(106) 401-6655', 'arcu.Sed.eu@etmagnisdis.edu', 85),
(61, 'Dean', 'McKenzie', '(777) 183-2747', 'elit@ipsum.co.uk', 86),
(62, 'Townsend', 'Cheyenne', '(159) 275-9164', 'Cras@eulacusQuisque.org', 87),
(63, 'May', 'Alden', '(439) 599-8313', 'in@semPellentesque.org', 88),
(64, 'Barrera', 'Linus', '(216) 454-9605', 'lectus.sit@augueac.co.uk', 89),
(65, 'Reeves', 'Adam', '(430) 531-7314', 'Phasellus.vitae.mauris@nonegestasa.ca', 90),
(66, 'Contreras', 'Charles', '(984) 491-0063', 'Ut.nec@sedlibero.net', 91),
(67, 'Nolan', 'Candace', '(937) 872-5803', 'neque.In@euismod.org', 92),
(68, 'Roman', 'Acton', '(137) 763-9513', 'sapien.imperdiet.ornare@urnaUt.co.uk', 93),
(69, 'Cline', 'Isadora', '(413) 139-0191', 'a.scelerisque@erat.org', 94),
(70, 'Carrillo', 'Reese', '(697) 934-6309', 'neque.In.ornare@Donec.ca', 95),
(91, 'Eagle', 'Bald', '9312222222', NULL, 25),
(92, 'Eagle', 'Bald', '5524449087', NULL, 100),
(93, NULL, NULL, NULL, NULL, 99),
(94, NULL, NULL, NULL, NULL, 99),
(95, NULL, NULL, NULL, NULL, 0),
(96, NULL, NULL, NULL, NULL, 100),
(98, NULL, NULL, NULL, NULL, 101),
(99, NULL, NULL, NULL, NULL, 101);

-- --------------------------------------------------------

--
-- Table structure for table `custom_order`
--

CREATE TABLE `custom_order` (
  `custom_order_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `comment` text,
  `price_estimation` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_order`
--

INSERT INTO `custom_order` (`custom_order_id`, `order_id`, `comment`, `price_estimation`) VALUES
(0, 51, 'natoque penatibus et', '28.3300'),
(1, 52, 'non dui nec', '98.1000'),
(2, 53, 'ligula.', '81.6300'),
(3, 54, 'sociis', '49.8200'),
(4, 55, 'tellus', '32.7400'),
(5, 56, 'urna suscipit nonummy. Fusce fermentum', '31.0300'),
(6, 57, 'libero. Integer in magna.', '38.1100'),
(7, 58, 'aliquet odio. Etiam ligula tortor,', '67.0500'),
(8, 59, 'luctus felis purus', '4.7300'),
(9, 60, 'vitae', '51.6500'),
(10, 61, 'mus. Donec', '7.4400'),
(11, 62, 'nibh sit amet orci. Ut', '66.0800'),
(12, 63, 'Cras dictum ultricies ligula.', '64.9200'),
(13, 64, 'Vivamus rhoncus. Donec est. Nunc', '36.2600'),
(14, 65, 'ligula. Nullam enim. Sed nulla', '31.4700'),
(15, 66, 'auctor quis,', '60.7000'),
(16, 67, 'arcu. Nunc mauris. Morbi', '45.4400'),
(17, 68, 'Duis volutpat nunc', '53.8700'),
(18, 69, 'nulla.', '54.1400'),
(19, 70, 'eleifend non, dapibus', '68.9400'),
(20, 71, 'nibh. Aliquam ornare, libero', '18.8400'),
(21, 72, 'a, arcu. Sed et libero.', '59.9000'),
(22, 73, 'Vestibulum ut eros non enim', '61.4300'),
(23, 74, 'eget, dictum', '21.6100'),
(24, 75, 'semper', '4.0700'),
(25, 76, 'quis, pede. Suspendisse', '68.0300'),
(26, 77, 'interdum feugiat.', '59.9400'),
(27, 78, 'mauris elit, dictum eu,', '6.9600'),
(28, 79, 'Fusce fermentum fermentum arcu.', '99.9800'),
(29, 80, 'dictum ultricies ligula.', '74.6700'),
(30, 81, 'risus odio, auctor vitae,', '33.6800'),
(31, 82, 'at auctor ullamcorper,', '72.0700'),
(32, 83, 'sem molestie sodales.', '75.4000'),
(33, 84, 'sem. Nulla interdum. Curabitur dictum.', '48.7400'),
(34, 85, 'sem elit, pharetra ut, pharetra', '24.7800'),
(35, 86, 'amet, dapibus id, blandit at,', '50.4200'),
(36, 87, 'leo. Cras', '98.0400'),
(37, 88, 'aliquam', '18.3700'),
(38, 89, 'Lorem ipsum dolor sit amet,', '27.4100'),
(39, 90, 'ante', '31.6600'),
(40, 91, 'vehicula et, rutrum eu,', '96.8600'),
(41, 92, 'Donec tempor, est ac', '64.8200'),
(42, 93, 'non enim commodo hendrerit.', '31.7100'),
(43, 94, 'Fusce mollis. Duis', '12.5400'),
(44, 95, 'ante dictum cursus. Nunc mauris', '22.3100'),
(45, 96, 'nibh. Phasellus nulla.', '1.1600'),
(46, 97, 'dolor. Fusce feugiat.', '1.9200'),
(47, 98, 'Proin vel nisl. Quisque', '62.7100'),
(48, 99, 'justo. Praesent luctus. Curabitur egestas', '52.5400'),
(49, 100, 'quis', '17.8800');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `hire_date` date NOT NULL,
  `address_id` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `last_name`, `first_name`, `hire_date`, `address_id`, `phone_number`) VALUES
(0, 'Heath', 'Blaze', '0000-00-00', 0, '9311111111'),
(1, 'Dyer', 'Kitra', '2003-02-17', 1, '9311111111'),
(2, 'Wallace', 'Montana', '0000-00-00', 2, '9311111111'),
(3, 'Stein', 'Dane', '2008-02-16', 3, '9311111111'),
(4, 'Cline', 'Adara', '2008-10-16', 4, '9311111111'),
(5, 'Nieves', 'Thomas', '0000-00-00', 5, '9311111111'),
(6, 'Bennett', 'Ursula', '2007-10-15', 6, '9311111111'),
(7, 'Hahn', 'Britanni', '0000-00-00', 7, '9311111111'),
(8, 'Frank', 'Ishmael', '2002-11-17', 8, '9311111111'),
(9, 'Franklin', 'Jasmine', '0000-00-00', 9, '9311111111'),
(10, 'Welch', 'Alice', '2012-07-16', 10, '9311111111'),
(11, 'Gilmore', 'Josephine', '2009-06-15', 11, '9311111111'),
(12, 'Daniels', 'Kuame', '2010-09-16', 12, '9311111111'),
(13, 'Olsen', 'Bernard', '2005-06-15', 13, '9311111111'),
(14, 'Roberson', 'Buffy', '0000-00-00', 14, '9311111111'),
(15, 'Hays', 'Ignatius', '0000-00-00', 15, '9311111111'),
(16, 'Barnett', 'Blair', '0000-00-00', 16, '9311111111'),
(17, 'Moses', 'Hedda', '2006-08-16', 17, '9311111111'),
(18, 'Mcneil', 'Risa', '2003-11-17', 18, '9311111111'),
(19, 'Knox', 'Sydnee', '0000-00-00', 19, '9311111111'),
(20, 'Luna', 'Maggy', '2006-04-15', 20, '9311111111'),
(21, 'Macdonald', 'Joan', '0000-00-00', 21, '9311111111'),
(22, 'Knapp', 'Hedy', '0000-00-00', 22, '9311111111'),
(23, 'Roberson', 'Jordan', '2008-04-16', 23, '9311111111'),
(24, 'Barry', 'Lunea', '0000-00-00', 24, '9311111111'),
(25, 'Hampton', 'Dominic', '2012-05-16', 25, '9311111111');

-- --------------------------------------------------------

--
-- Table structure for table `gift_order`
--

CREATE TABLE `gift_order` (
  `gift_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `rec_last_name` varchar(255) DEFAULT NULL,
  `rec_first_name` varchar(255) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_order`
--

INSERT INTO `gift_order` (`gift_id`, `order_id`, `rec_last_name`, `rec_first_name`, `address_id`) VALUES
(0, 19, 'Russo', 'Charity', 78),
(1, 18, 'Vaughn', 'Madaline', 77),
(2, 20, 'Cameron', 'Shay', 76),
(3, 21, 'Guerra', 'Ivana', 75),
(4, 11, 'Boyle', 'Zeus', 72),
(5, 12, 'Bender', 'Kimberley', 74),
(6, 15, 'Jacobson', 'Leroy', 73),
(7, 17, 'Powers', 'John', 71),
(8, 16, 'Lindsey', 'Virginia', 70),
(9, 14, 'Roman', 'Oprah', 68),
(10, 3, 'Noble', 'Steel', 69),
(11, 4, 'Sexton', 'Mira', 67),
(12, 22, 'Gray', 'Hakeem', 66),
(13, 23, 'Mccarty', 'Mara', 65),
(14, 13, 'Shields', 'Ursula', 63),
(15, 10, 'Richard', 'Kevin', 64),
(16, 24, 'Cardenas', 'Kibo', 62),
(17, 25, 'Odonnell', 'Caesar', 61),
(18, 1, 'Camacho', 'Kamal', 59),
(19, 2, 'Horton', 'Cathleen', 60),
(20, 6, 'Hess', 'Imelda', 58),
(21, 5, 'Warren', 'Mia', 57),
(22, 7, 'Farley', 'Quinn', 55),
(23, 8, 'Kirk', 'Iona', 56),
(24, 9, 'Hudson', 'Cassidy', 54),
(25, 0, 'Williams', 'Desirae', 53);

-- --------------------------------------------------------

--
-- Table structure for table `gift_shipping`
--

CREATE TABLE `gift_shipping` (
  `ship_id` int(11) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `gift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_shipping`
--

INSERT INTO `gift_shipping` (`ship_id`, `address_id`, `gift_id`) VALUES
(0, 0, 9),
(1, 15, 8),
(2, 14, 7),
(3, 13, 6),
(4, 12, 5),
(5, 11, 4),
(6, 10, 3),
(7, 9, 2),
(8, 8, 1),
(9, 7, 0),
(10, 6, 15),
(11, 5, 14),
(12, 4, 12),
(13, 3, 13),
(14, 2, 11),
(15, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `qoh` decimal(10,4) NOT NULL,
  `calculated_qoh` decimal(10,4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `original_price` decimal(19,4) NOT NULL,
  `current_price` decimal(19,4) NOT NULL,
  `min_price` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `qoh`, `calculated_qoh`, `name`, `original_price`, `current_price`, `min_price`) VALUES
(1, '36.0000', '12.0000', 'salads', '27.9800', '64.8300', '29.1600'),
(2, '5.0000', '13.0000', 'sandwiches', '24.6100', '21.6000', '14.2200'),
(3, '39.0000', '1.0000', 'stews', '0.1000', '53.5400', '17.1300'),
(4, '1.0000', '42.0000', 'pies', '29.6200', '17.6900', '1.5700'),
(5, '31.0000', '12.0000', 'sandwiches', '31.7500', '5.8900', '12.0100'),
(6, '25.0000', '41.0000', 'noodles', '56.3200', '12.2400', '12.9100'),
(7, '47.0000', '8.0000', 'seafood', '90.5900', '45.3400', '47.1100'),
(8, '33.0000', '35.0000', 'seafood', '68.4900', '21.1300', '15.3900'),
(9, '49.0000', '11.0000', 'pies', '62.3600', '48.6600', '16.5400'),
(10, '25.0000', '31.0000', 'salads', '39.0400', '30.1300', '26.4800'),
(11, '23.0000', '25.0000', 'salads', '2.7600', '72.7300', '47.6400'),
(12, '45.0000', '2.0000', 'noodles', '81.6100', '3.5200', '16.5500'),
(13, '50.0000', '9.0000', 'seafood', '45.0900', '26.0600', '36.1100'),
(14, '44.0000', '44.0000', 'pies', '9.7000', '72.2100', '20.7200'),
(15, '28.0000', '26.0000', 'noodles', '38.0400', '81.0400', '27.6900'),
(16, '47.0000', '9.0000', 'cereals', '51.2000', '86.8200', '0.1300'),
(17, '31.0000', '8.0000', 'seafood', '59.3700', '70.2400', '48.4500'),
(18, '12.0000', '13.0000', 'stews', '26.2900', '72.0500', '23.5800'),
(19, '41.0000', '4.0000', 'noodles', '13.9600', '44.7900', '17.4100'),
(20, '28.0000', '33.0000', 'stews', '68.5000', '64.4900', '44.8500'),
(21, '20.0000', '7.0000', 'pies', '63.2200', '15.1000', '36.2600'),
(22, '37.0000', '27.0000', 'pasta', '16.1600', '12.2100', '42.0300'),
(23, '29.0000', '15.0000', 'noodles', '63.4700', '28.4400', '10.8100'),
(24, '40.0000', '43.0000', 'soups', '83.0700', '62.5500', '30.6400'),
(25, '13.0000', '33.0000', 'cereals', '65.0500', '55.5800', '31.6800'),
(26, '34.0000', '23.0000', 'pasta', '37.6500', '98.8800', '18.5400'),
(27, '35.0000', '10.0000', 'desserts', '76.5300', '64.4400', '39.2600'),
(28, '29.0000', '34.0000', 'soups', '87.0600', '26.1500', '19.9100'),
(29, '2.0000', '23.0000', 'desserts', '38.0400', '68.6700', '32.0300'),
(30, '16.0000', '13.0000', 'stews', '75.2800', '2.4800', '29.9500'),
(31, '17.0000', '4.0000', 'seafood', '77.9100', '44.8600', '21.4600'),
(32, '40.0000', '29.0000', 'stews', '24.0700', '54.5600', '22.6700'),
(33, '1.0000', '7.0000', 'soups', '61.4800', '48.0200', '9.5300'),
(34, '45.0000', '8.0000', 'desserts', '70.5500', '29.0300', '44.8900'),
(35, '12.0000', '11.0000', 'soups', '34.3500', '57.8300', '1.5000'),
(36, '23.0000', '9.0000', 'desserts', '86.0500', '73.6900', '5.3600'),
(37, '1.0000', '12.0000', 'salads', '19.6700', '49.5000', '35.5600'),
(38, '8.0000', '36.0000', 'desserts', '47.6000', '80.3300', '35.1800'),
(39, '49.0000', '2.0000', 'noodles', '73.3800', '22.2400', '13.5400'),
(40, '47.0000', '37.0000', 'soups', '36.7800', '77.8800', '2.5600'),
(41, '24.0000', '3.0000', 'seafood', '75.2700', '86.7800', '19.7000'),
(42, '43.0000', '11.0000', 'stews', '45.7900', '54.5800', '41.2700'),
(43, '36.0000', '40.0000', 'pies', '76.7200', '37.0300', '46.3400'),
(44, '21.0000', '31.0000', 'pies', '45.1800', '36.6900', '19.5400'),
(45, '26.0000', '2.0000', 'desserts', '27.4300', '24.1600', '35.0500'),
(46, '18.0000', '18.0000', 'desserts', '17.6400', '91.2800', '23.1000'),
(47, '1.0000', '20.0000', 'desserts', '46.0300', '81.2200', '24.9900'),
(48, '27.0000', '42.0000', 'seafood', '12.3700', '56.7900', '14.3800'),
(49, '32.0000', '37.0000', 'noodles', '48.8400', '4.1500', '6.6100'),
(50, '11.0000', '15.0000', 'soups', '72.7700', '94.6000', '35.6700'),
(51, '7.0000', '24.0000', 'noodles', '23.8600', '31.0400', '43.2400'),
(52, '30.0000', '1.0000', 'pies', '33.1600', '68.1200', '16.8500'),
(53, '41.0000', '17.0000', 'sandwiches', '61.5900', '25.8600', '28.7900'),
(54, '6.0000', '38.0000', 'desserts', '51.5100', '41.6400', '27.5800'),
(55, '43.0000', '8.0000', 'soups', '14.9200', '70.5200', '47.6500'),
(56, '8.0000', '22.0000', 'salads', '32.9500', '70.4000', '40.1700'),
(57, '8.0000', '41.0000', 'salads', '56.9300', '51.3400', '49.5500'),
(58, '43.0000', '28.0000', 'stews', '16.5300', '50.8200', '36.9100'),
(59, '9.0000', '16.0000', 'cereals', '82.4300', '31.9200', '20.5100'),
(60, '5.0000', '8.0000', 'salads', '11.9100', '99.3800', '12.6100'),
(61, '10.0000', '17.0000', 'cereals', '80.8300', '26.3400', '35.9800'),
(62, '23.0000', '16.0000', 'pasta', '21.4800', '14.1900', '25.2100'),
(63, '41.0000', '23.0000', 'seafood', '55.3200', '56.4300', '4.9400'),
(64, '24.0000', '11.0000', 'soups', '44.3300', '53.3900', '18.8200'),
(65, '34.0000', '10.0000', 'stews', '23.4700', '12.5800', '19.3000'),
(66, '41.0000', '14.0000', 'desserts', '96.8500', '7.6200', '9.3200'),
(67, '16.0000', '14.0000', 'pasta', '70.6900', '51.4900', '26.9400'),
(68, '41.0000', '10.0000', 'cereals', '62.8900', '76.0000', '37.0900'),
(69, '39.0000', '19.0000', 'soups', '39.0600', '14.9600', '27.2300'),
(70, '47.0000', '35.0000', 'noodles', '7.5800', '48.5700', '23.5500'),
(71, '15.0000', '31.0000', 'noodles', '79.7500', '83.2100', '11.8800'),
(72, '23.0000', '28.0000', 'sandwiches', '42.2200', '89.9700', '35.2000'),
(73, '2.0000', '13.0000', 'stews', '5.7500', '16.6100', '29.9100'),
(74, '26.0000', '4.0000', 'pasta', '78.8800', '94.6400', '13.2200'),
(75, '5.0000', '34.0000', 'seafood', '46.7700', '1.9000', '1.7900'),
(76, '6.0000', '6.0000', 'salads', '15.6800', '56.2300', '25.2800'),
(77, '34.0000', '27.0000', 'soups', '76.3600', '45.2400', '28.5900'),
(78, '15.0000', '10.0000', 'pies', '64.5200', '35.0300', '33.5800'),
(79, '30.0000', '7.0000', 'noodles', '45.2900', '5.6300', '11.2000'),
(80, '34.0000', '18.0000', 'stews', '4.5800', '49.7800', '30.9100'),
(81, '49.0000', '37.0000', 'seafood', '12.0300', '55.7600', '46.1400'),
(82, '26.0000', '34.0000', 'stews', '69.4900', '53.7200', '5.0200'),
(83, '29.0000', '1.0000', 'noodles', '22.3900', '77.9300', '32.1300'),
(84, '36.0000', '31.0000', 'soups', '74.2000', '53.7700', '22.5200'),
(85, '13.0000', '28.0000', 'stews', '63.2300', '51.5600', '32.4100'),
(86, '24.0000', '32.0000', 'noodles', '94.3700', '15.8700', '2.4200'),
(87, '35.0000', '4.0000', 'pies', '56.7700', '82.8300', '40.7100'),
(88, '22.0000', '19.0000', 'pies', '74.5400', '12.2200', '9.2500'),
(89, '9.0000', '2.0000', 'cereals', '67.2500', '87.7000', '30.7300'),
(90, '36.0000', '17.0000', 'noodles', '12.2600', '62.7700', '37.2500'),
(91, '43.0000', '20.0000', 'salads', '22.5000', '16.2100', '4.6000'),
(92, '47.0000', '33.0000', 'noodles', '35.5500', '89.6000', '31.8600'),
(93, '48.0000', '33.0000', 'salads', '11.3100', '16.4100', '28.6200'),
(94, '15.0000', '16.0000', 'salads', '87.4800', '36.1900', '1.8100'),
(95, '30.0000', '31.0000', 'stews', '92.1300', '81.3100', '12.2000'),
(96, '47.0000', '10.0000', 'pies', '68.6000', '91.7500', '16.7900'),
(97, '50.0000', '32.0000', 'cereals', '32.9400', '92.9000', '46.6300'),
(98, '25.0000', '13.0000', 'stews', '62.6700', '23.3800', '11.1700'),
(99, '17.0000', '22.0000', 'cereals', '97.1400', '94.9700', '19.9500'),
(100, '29.0000', '10.0000', 'salads', '81.2300', '86.9200', '4.2300');

-- --------------------------------------------------------

--
-- Table structure for table `local_vendors`
--

CREATE TABLE `local_vendors` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `vendor_id` mediumint(9) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `address_id` mediumint(9) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_vendors`
--

INSERT INTO `local_vendors` (`id`, `vendor_id`, `last_name`, `first_name`, `vendor_name`, `phone_number`, `address_id`, `email`) VALUES
(1, 0, 'Walker', 'Chester', 'In Consulting', '(682) 769-8434', 100, 'sem@lectusjusto.net'),
(2, 1, 'Richard', 'Julian', 'Proin Consulting', '(909) 637-1464', 100, 'nec.mollis@vel.ca'),
(3, 2, 'Gillespie', 'Levi', 'Netus Et Limited', '(665) 697-9215', 100, 'natoque.penatibus.et@sitamet.co.uk'),
(4, 3, 'Meadows', 'Raymond', 'Lectus Pede Ultrices LLP', '(159) 599-0915', 100, 'varius.orci.in@Utnecurna.co.uk'),
(5, 4, 'Reid', 'Whilemina', 'Lorem Ltd', '(612) 605-4323', 99, 'sapien@Mauris.ca'),
(6, 5, 'Kemp', 'Carson', 'Accumsan Sed PC', '(381) 724-4223', 99, 'enim@augueidante.edu'),
(7, 6, 'Howell', 'Elliott', 'Pellentesque Habitant LLC', '(246) 387-6134', 99, 'tristique.senectus.et@nisl.com'),
(8, 7, 'Cash', 'Morgan', 'Nec Inc.', '(671) 613-1582', 100, 'metus@Crasdolor.net'),
(9, 8, 'Kline', 'Lacy', 'Ridiculus Mus Limited', '(703) 873-3604', 100, 'eu.accumsan@Donecfeugiatmetus.com'),
(10, 9, 'Newman', 'Bertha', 'Et Euismod PC', '(357) 177-5876', 99, 'tellus.justo.sit@Donecluctusaliquet.edu'),
(11, 10, 'Petty', 'Aquila', 'Elit Pede Malesuada Institute', '(360) 847-7080', 99, 'vitae.diam@acmattissemper.org'),
(12, 11, 'Hamilton', 'Chloe', 'Convallis Ante Lectus Corp.', '(933) 573-6497', 99, 'facilisis.vitae@mattis.org'),
(13, 12, 'Edwards', 'Vance', 'Et Foundation', '(614) 961-3794', 99, 'risus.Morbi.metus@neque.org'),
(14, 13, 'Hicks', 'Hayley', 'Sit Foundation', '(600) 585-2826', 99, 'et@odio.co.uk'),
(15, 14, 'Bernard', 'Keelie', 'Vitae Foundation', '(629) 536-5580', 99, 'Nulla.eget@adipiscingMaurismolestie.net'),
(16, 15, 'Freeman', 'Galvin', 'Lacus Company', '(339) 415-0801', 100, 'lobortis.quis.pede@rutrumFusce.co.uk'),
(17, 16, 'Mckee', 'Samuel', 'Ultrices Posuere LLP', '(409) 933-3318', 99, 'torquent@lectus.co.uk'),
(18, 17, 'William', 'Hakeem', 'Fringilla Mi Lacinia Foundation', '(868) 938-6641', 99, 'Integer.vitae@Duisrisus.ca'),
(19, 18, 'Rocha', 'Owen', 'Nec Tellus Nunc Industries', '(635) 434-4866', 100, 'aliquet@sollicitudincommodoipsum.com'),
(20, 19, 'Aguilar', 'Clio', 'Orci Ut LLP', '(338) 739-3849', 99, 'Aliquam.auctor.velit@parturient.com'),
(21, 20, 'Cooley', 'Robin', 'Ullamcorper LLC', '(491) 607-7820', 99, 'sed@quis.ca'),
(22, 21, 'Murphy', 'Sophia', 'Mauris Industries', '(982) 159-3547', 100, 'cursus.Nunc.mauris@dolor.ca'),
(23, 22, 'Myers', 'Yoshi', 'Quam Elementum Corp.', '(522) 616-0940', 100, 'parturient.montes.nascetur@mauris.com'),
(24, 23, 'Fowler', 'Theodore', 'Et Libero Inc.', '(979) 608-2887', 99, 'eros@dolordolortempus.ca'),
(25, 24, 'Horne', 'Joy', 'Per Conubia Foundation', '(201) 622-4899', 100, 'eget.magna@duilectusrutrum.com'),
(26, 25, 'Herman', 'Kathleen', 'Nulla Aliquet Proin Corp.', '(902) 731-3044', 99, 'lacus@Pellentesque.net'),
(27, 26, 'Medina', 'Francesca', 'Metus Facilisis Company', '(917) 338-6889', 100, 'id@nec.ca'),
(28, 27, 'Pope', 'Clayton', 'Eget Nisi Inc.', '(900) 453-8468', 100, 'eget.metus@metusvitae.org'),
(29, 28, 'Mclaughlin', 'Salvador', 'Eu Institute', '(745) 937-1390', 100, 'facilisi.Sed.neque@fames.edu'),
(30, 29, 'Richmond', 'Paki', 'A Purus Duis Industries', '(611) 443-5076', 100, 'velit.eget@non.ca'),
(31, 30, 'Woodard', 'Dennis', 'Maecenas Incorporated', '(650) 442-1511', 100, 'malesuada@atfringilla.co.uk'),
(32, 31, 'Johnston', 'Mollie', 'Ut Nulla Industries', '(614) 169-6003', 99, 'iaculis.enim@posuere.edu'),
(33, 32, 'Ferrell', 'Jared', 'Odio LLP', '(219) 804-5672', 100, 'dis@vellectus.org'),
(34, 33, 'Odonnell', 'Anika', 'Accumsan Sed Facilisis Corp.', '(248) 301-3577', 100, 'Curabitur.massa@scelerisqueloremipsum.co.uk'),
(35, 34, 'Baird', 'Hamish', 'Enim Mauris Incorporated', '(387) 178-4637', 100, 'dolor.Fusce@euismod.edu'),
(36, 35, 'Ward', 'Lyle', 'Lobortis Mauris Suspendisse Industries', '(173) 263-6013', 100, 'torquent.per.conubia@ipsumSuspendisse.com'),
(37, 36, 'Terry', 'Fleur', 'Egestas Urna Justo Associates', '(859) 346-8409', 100, 'ultricies@nisi.org'),
(38, 37, 'Nieves', 'Savannah', 'Nulla Dignissim Maecenas Associates', '(736) 802-6570', 99, 'commodo.tincidunt@Nulla.org'),
(39, 38, 'Dawson', 'Fatima', 'Eu Placerat Eget LLC', '(757) 119-7328', 100, 'vel.convallis.in@auctorquistristique.org'),
(40, 39, 'Coffey', 'Ali', 'Felis Purus Institute', '(792) 797-8532', 100, 'nunc.id@Sedid.co.uk'),
(41, 40, 'Barry', 'Joelle', 'Sed Et Associates', '(383) 611-4694', 100, 'auctor.ullamcorper@nondapibus.ca'),
(42, 41, 'Robbins', 'Charlotte', 'Ullamcorper Duis At Ltd', '(703) 702-0143', 100, 'quam.quis.diam@laoreetposuereenim.co.uk'),
(43, 42, 'Nolan', 'Alan', 'A Aliquet LLC', '(901) 326-1170', 100, 'eget@mollisInteger.net'),
(44, 43, 'Watts', 'Daquan', 'Cursus LLC', '(623) 229-4117', 99, 'mollis@eratVivamusnisi.org'),
(45, 44, 'Dominguez', 'Jasmine', 'Vitae Limited', '(851) 332-7813', 99, 'cursus.et.magna@Nam.org'),
(46, 45, 'Odonnell', 'Leo', 'Sapien Molestie Company', '(539) 766-8064', 99, 'consequat.purus@dolorNulla.com'),
(47, 46, 'Carey', 'Shay', 'Nec Associates', '(876) 160-4809', 99, 'vitae.semper@imperdiet.ca'),
(48, 47, 'Klein', 'Lawrence', 'Vel Limited', '(744) 395-7994', 100, 'tellus@DonecegestasDuis.net'),
(49, 48, 'Marshall', 'Rogan', 'Rutrum Eu Industries', '(826) 331-6461', 99, 'cursus.diam@vellectusCum.edu'),
(50, 49, 'Leonard', 'Berk', 'Suspendisse Commodo Consulting', '(615) 769-2297', 100, 'aliquam@penatibus.net'),
(51, 50, 'Curtis', 'Quentin', 'Egestas A PC', '(689) 535-5215', 99, 'Integer.aliquam.adipiscing@massarutrummagna.com'),
(52, 51, 'Parks', 'MacKensie', 'Feugiat Consulting', '(844) 385-6551', 100, 'erat.neque@enim.ca'),
(53, 52, 'Cortez', 'Chiquita', 'Sed Malesuada Inc.', '(824) 383-4636', 100, 'enim.Sed.nulla@dignissimpharetra.org'),
(54, 53, 'Sanders', 'Emma', 'Convallis Company', '(914) 294-4615', 100, 'sollicitudin@scelerisque.net'),
(55, 54, 'Velasquez', 'Sara', 'Ultricies Company', '(214) 417-8670', 100, 'Cum@placeratorci.org'),
(56, 55, 'Osborn', 'Jack', 'A Purus Duis Incorporated', '(376) 316-2162', 100, 'amet@Suspendisse.edu'),
(57, 56, 'Sandoval', 'Alvin', 'Quis Pede Company', '(662) 655-7149', 100, 'fringilla@egetnisidictum.com'),
(58, 57, 'Henry', 'Laura', 'Mauris Morbi Institute', '(202) 864-2903', 99, 'neque.vitae@malesuadavelconvallis.co.uk'),
(59, 58, 'Ewing', 'Mason', 'Nibh Phasellus Associates', '(928) 740-5584', 100, 'In@pedenonummy.ca'),
(60, 59, 'Bass', 'Amity', 'Nunc Id Enim Foundation', '(499) 326-0814', 99, 'sit.amet@litoratorquentper.com'),
(61, 60, 'Bowen', 'Karly', 'Orci Ltd', '(239) 313-5471', 99, 'libero.lacus.varius@pede.com'),
(62, 61, 'Hartman', 'Oscar', 'Sagittis Placerat Cras Institute', '(588) 191-4780', 99, 'vitae.diam.Proin@Aliquamadipiscinglobortis.edu'),
(63, 62, 'Burch', 'Lacey', 'Tempor Associates', '(912) 251-6062', 100, 'malesuada.id.erat@sitametorci.co.uk'),
(64, 63, 'Yang', 'Denton', 'Elit PC', '(791) 490-4711', 99, 'amet@gravida.org'),
(65, 64, 'Hudson', 'Carissa', 'Turpis Corp.', '(492) 803-0666', 99, 'Morbi@utnisia.edu'),
(66, 65, 'Lambert', 'Galvin', 'Sed Nec PC', '(862) 133-0298', 99, 'pellentesque.tellus@ligula.com'),
(67, 66, 'Hodge', 'Flynn', 'Vulputate Corp.', '(807) 310-6613', 99, 'in@milacinia.ca'),
(68, 67, 'Mccall', 'Vivien', 'Blandit LLC', '(459) 699-6585', 99, 'natoque.penatibus.et@semegestas.org'),
(69, 68, 'Mcdaniel', 'Alika', 'Fermentum Associates', '(597) 172-1072', 100, 'augue.eu.tempor@netusetmalesuada.edu'),
(70, 69, 'Kane', 'Erich', 'Diam Duis Mi Limited', '(641) 448-9965', 100, 'lorem.vitae.odio@volutpat.co.uk'),
(71, 70, 'Hancock', 'Blaze', 'Orci Industries', '(402) 804-1585', 100, 'risus.varius.orci@Donectempus.com'),
(72, 71, 'Atkins', 'Ciaran', 'Augue Porttitor Interdum Associates', '(535) 233-9666', 100, 'neque@duilectus.ca'),
(73, 72, 'Rosario', 'Sean', 'Velit Aliquam Nisl LLP', '(292) 258-8949', 100, 'nulla.Donec@Etiamimperdiet.ca'),
(74, 73, 'Boone', 'Reagan', 'Sit Corporation', '(835) 981-0327', 99, 'Duis.a@facilisismagna.com'),
(75, 74, 'Macdonald', 'Upton', 'Cras Eget LLC', '(993) 538-3587', 99, 'Curabitur.massa@tellusSuspendissesed.net'),
(76, 75, 'Ellison', 'Carl', 'Malesuada Vel Convallis Industries', '(829) 906-4684', 99, 'mattis.velit.justo@miAliquamgravida.org'),
(77, 76, 'Baldwin', 'Drew', 'Mollis Vitae Posuere Corporation', '(689) 157-5966', 100, 'magna.Duis.dignissim@Intinciduntcongue.org'),
(78, 77, 'Green', 'Louis', 'Consequat Company', '(939) 235-0113', 100, 'iaculis.nec.eleifend@Proin.org'),
(79, 78, 'Dunlap', 'Alexandra', 'Quisque Libero Lacus PC', '(187) 213-1946', 99, 'semper.egestas.urna@Maecenas.edu'),
(80, 79, 'Duke', 'Constance', 'Suscipit Est Associates', '(629) 840-7635', 99, 'aliquet.sem@enimnisl.net'),
(81, 80, 'Harmon', 'Lacey', 'Neque Vitae Limited', '(253) 877-4816', 99, 'tincidunt@leoelementumsem.co.uk'),
(82, 81, 'House', 'Nolan', 'Metus In Lorem Foundation', '(107) 868-3332', 99, 'lectus@ProinvelitSed.co.uk'),
(83, 82, 'Parrish', 'Velma', 'Nulla Company', '(864) 536-4371', 99, 'Mauris.molestie@ornare.edu'),
(84, 83, 'Lloyd', 'Keiko', 'Accumsan Convallis LLC', '(803) 710-2462', 99, 'parturient.montes@Nuncquisarcu.com'),
(85, 84, 'Kennedy', 'Eaton', 'Eget Odio Consulting', '(168) 958-5833', 100, 'sagittis@auctorvelit.org'),
(86, 85, 'Mclean', 'Halee', 'Ac Eleifend Inc.', '(112) 251-3716', 99, 'pharetra.nibh.Aliquam@faucibusidlibero.com'),
(87, 86, 'Hahn', 'Tatiana', 'Ipsum Corp.', '(845) 569-1707', 99, 'porttitor@scelerisqueneque.org'),
(88, 87, 'Mcdonald', 'Anne', 'Et Industries', '(846) 343-7291', 100, 'amet@nonante.org'),
(89, 88, 'Joyce', 'Ira', 'Lorem LLC', '(130) 234-7376', 99, 'fermentum.arcu@tortornibhsit.com'),
(90, 89, 'Hayden', 'Jeanette', 'Malesuada Augue Ut LLC', '(774) 624-9218', 100, 'libero.Morbi.accumsan@cursus.com'),
(91, 90, 'Chambers', 'Ulysses', 'Pede Nunc Ltd', '(440) 191-6075', 100, 'neque.Morbi.quis@at.co.uk'),
(92, 91, 'Vasquez', 'Britanney', 'Auctor Associates', '(220) 284-0839', 100, 'Donec@felisNulla.net'),
(93, 92, 'Fuentes', 'Trevor', 'Ultrices Vivamus Foundation', '(982) 750-4391', 99, 'sed.orci.lobortis@tortor.com'),
(94, 93, 'Herman', 'Chanda', 'Aliquam LLP', '(698) 954-5727', 99, 'eget.laoreet.posuere@ipsum.ca'),
(95, 94, 'Church', 'Penelope', 'Suspendisse Incorporated', '(862) 443-8687', 99, 'pede@consectetueradipiscing.net'),
(96, 95, 'Fisher', 'Damon', 'Aliquam Fringilla Cursus LLP', '(395) 254-6281', 100, 'Nunc.lectus.pede@laoreet.co.uk'),
(97, 96, 'Hart', 'Ray', 'Ornare Egestas Industries', '(227) 940-6040', 100, 'augue.id.ante@arcuimperdietullamcorper.org'),
(98, 97, 'Jacobson', 'Eric', 'Cum LLP', '(493) 771-4843', 100, 'Proin.ultrices@magnamalesuadavel.co.uk'),
(99, 98, 'Bray', 'Hu', 'Taciti Associates', '(286) 489-1234', 100, 'vestibulum@nequevenenatis.net'),
(100, 99, 'Gordon', 'Kenneth', 'Magna Sed Associates', '(897) 685-4055', 100, 'diam.Sed.diam@rutrum.org');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `supplier_id`, `item_id`, `unit_price`) VALUES
(0, 0, 50, '$3.13'),
(1, 1, 51, '$80.26'),
(2, 2, 52, '$15.11'),
(3, 3, 53, '$78.57'),
(4, 4, 54, '$43.34'),
(5, 5, 55, '$2.58'),
(6, 6, 56, '$61.78'),
(7, 7, 57, '$75.07'),
(8, 8, 58, '$97.08'),
(9, 9, 59, '$23.50'),
(10, 10, 60, '$59.88'),
(11, 11, 61, '$65.11'),
(12, 12, 62, '$87.23'),
(13, 13, 63, '$49.69'),
(14, 14, 64, '$75.49'),
(15, 15, 65, '$66.73'),
(16, 16, 66, '$34.21'),
(17, 17, 67, '$0.55'),
(18, 18, 68, '$12.53'),
(19, 19, 69, '$54.16');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `subtotal` decimal(19,4) NOT NULL,
  `tax_amount` decimal(19,4) NOT NULL,
  `total_price` decimal(19,4) NOT NULL,
  `order_type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `employee_id`, `order_date`, `subtotal`, `tax_amount`, `total_price`, `order_type`) VALUES
(1, 1, 22, '0000-00-00', '46.9400', '4.8300', '105.8100', 'sale'),
(2, 1, 5, '2001-01-15', '18.6800', '9.1500', '9.4700', 'sale'),
(3, 1, 5, '0000-00-00', '16.9400', '9.2100', '88.3800', 'sale'),
(4, 1, 3, '0000-00-00', '26.2100', '2.0500', '95.1900', 'sale'),
(5, 1, 17, '2002-04-02', '80.8500', '6.8800', '31.6300', 'sale'),
(6, 1, 18, '2003-08-06', '39.5000', '3.4500', '47.7900', 'sale'),
(7, 1, 17, '0000-00-00', '73.3200', '7.1000', '30.4500', 'sale'),
(8, 1, 10, '2002-10-13', '34.1800', '9.6800', '8.8800', 'sale'),
(9, 1, 4, '0000-00-00', '10.8400', '2.1400', '109.4500', 'sale'),
(10, 1, 14, '0000-00-00', '84.4900', '4.5700', '30.7700', 'sale'),
(11, 1, 22, '2012-01-08', '51.2400', '7.7600', '97.3400', 'sale'),
(12, 1, 1, '0000-00-00', '15.3800', '2.2700', '35.6000', 'sale'),
(13, 1, 6, '0000-00-00', '86.2600', '4.1200', '145.0100', 'sale'),
(14, 1, 1, '0000-00-00', '51.3900', '8.8900', '102.0200', 'sale'),
(15, 1, 10, '2010-04-12', '52.7600', '5.1000', '101.4100', 'sale'),
(16, 1, 24, '0000-00-00', '66.2800', '2.6400', '51.1500', 'sale'),
(17, 1, 12, '2006-01-00', '76.4500', '1.8500', '78.8100', 'sale'),
(18, 1, 12, '2008-03-03', '43.2500', '6.6000', '84.5800', 'sale'),
(19, 1, 7, '2011-11-00', '9.4100', '8.5900', '126.2600', 'sale'),
(20, 1, 3, '0000-00-00', '18.9900', '0.8000', '12.1600', 'sale'),
(21, 1, 23, '2012-09-14', '9.0100', '4.5600', '31.8300', 'sale'),
(22, 1, 2, '0000-00-00', '10.1100', '4.1500', '86.3600', 'sale'),
(23, 1, 8, '0000-00-00', '54.7700', '2.9100', '72.0600', 'sale'),
(24, 1, 18, '0000-00-00', '19.9300', '9.8600', '130.1100', 'sale'),
(25, 1, 10, '0000-00-00', '85.1600', '3.6900', '141.6300', 'sale'),
(26, 1, 8, '0000-00-00', '44.6600', '7.4300', '43.9500', 'sale'),
(27, 1, 18, '0000-00-00', '7.2200', '1.1500', '38.6400', 'sale'),
(28, 1, 4, '2001-11-08', '88.4800', '4.6100', '13.3900', 'sale'),
(29, 1, 20, '2005-03-10', '85.2400', '9.1000', '132.7000', 'sale'),
(30, 1, 18, '2010-09-05', '5.4300', '3.2200', '116.6000', 'sale'),
(31, 1, 6, '0000-00-00', '34.2900', '6.7100', '69.0100', 'sale'),
(32, 1, 24, '0000-00-00', '12.9400', '1.3100', '113.8000', 'order'),
(33, 1, 7, '0000-00-00', '30.7800', '4.4300', '129.0100', 'order'),
(34, 1, 6, '0000-00-00', '49.4600', '2.4900', '135.8900', 'order'),
(35, 1, 15, '0000-00-00', '97.3600', '4.5400', '135.2400', 'order'),
(36, 1, 21, '2012-07-09', '40.7100', '3.6600', '7.3900', 'order'),
(37, 1, 18, '0000-00-00', '9.5400', '3.0500', '37.2200', 'order'),
(38, 1, 18, '0000-00-00', '29.5800', '9.1200', '26.2200', 'order'),
(39, 1, 1, '0000-00-00', '8.9800', '3.8000', '140.3800', 'order'),
(40, 1, 17, '0000-00-00', '81.3700', '8.6600', '128.9200', 'order'),
(41, 1, 8, '0000-00-00', '21.9400', '7.7000', '110.7500', 'order'),
(42, 1, 21, '0000-00-00', '99.9400', '0.8700', '33.6700', 'order'),
(43, 1, 19, '0000-00-00', '23.3600', '2.6100', '11.3900', 'order'),
(44, 1, 3, '0000-00-00', '31.3500', '4.0700', '109.7200', 'order'),
(45, 1, 4, '2012-08-02', '16.4300', '0.9200', '138.2400', 'order'),
(46, 1, 13, '2008-09-00', '48.3500', '0.0600', '32.4900', 'order'),
(47, 1, 5, '0000-00-00', '84.2000', '2.1600', '42.9300', 'order'),
(48, 1, 10, '0000-00-00', '34.2900', '0.1400', '46.9100', 'order'),
(49, 1, 14, '2002-02-14', '12.1000', '7.5500', '124.3300', 'order'),
(50, 1, 0, '2003-03-11', '68.2700', '5.7600', '79.5300', 'order'),
(51, 1, 4, '0000-00-00', '84.3300', '1.3700', '22.0800', 'order'),
(52, 1, 22, '0000-00-00', '13.0600', '1.4200', '44.4900', 'order'),
(53, 1, 18, '0000-00-00', '75.3000', '3.2000', '137.3000', 'order'),
(54, 1, 2, '0000-00-00', '63.8600', '7.6400', '145.4600', 'order'),
(55, 1, 11, '0000-00-00', '23.5500', '1.8800', '0.0400', 'order'),
(56, 1, 8, '2008-06-13', '18.4800', '2.5300', '55.2700', 'order'),
(57, 1, 17, '0000-00-00', '83.3200', '7.3300', '119.0000', 'order'),
(58, 1, 13, '2008-06-11', '52.8500', '1.4800', '68.3100', 'order'),
(59, 1, 19, '0000-00-00', '14.5900', '2.6300', '148.2200', 'order'),
(60, 1, 16, '0000-00-00', '7.1500', '8.6800', '7.0300', 'order'),
(61, 1, 1, '2010-11-14', '23.7200', '1.9700', '137.3400', 'order'),
(62, 1, 7, '0000-00-00', '97.2100', '6.4300', '19.3800', 'order'),
(63, 1, 11, '2011-01-14', '19.9300', '8.8600', '29.0300', 'order'),
(64, 1, 18, '0000-00-00', '24.8500', '0.0500', '111.8200', 'gift'),
(65, 1, 18, '2009-11-03', '91.7400', '2.7300', '4.4500', 'gift'),
(66, 1, 17, '2001-01-06', '50.9300', '8.7200', '43.0800', 'gift'),
(67, 1, 8, '2012-11-06', '10.2600', '6.0100', '19.7000', 'gift'),
(68, 1, 14, '0000-00-00', '81.6400', '3.5800', '123.3600', 'gift'),
(69, 1, 12, '2011-04-11', '91.5100', '2.3000', '29.1500', 'gift'),
(70, 1, 4, '2005-03-09', '5.6700', '8.2400', '90.9400', 'gift'),
(71, 1, 12, '2002-12-08', '30.3800', '7.4700', '1.7700', 'gift'),
(72, 1, 6, '0000-00-00', '16.3300', '0.5000', '74.9000', 'gift'),
(73, 1, 9, '2002-07-01', '3.0600', '2.2000', '142.7500', 'gift'),
(74, 1, 6, '0000-00-00', '50.9000', '4.2700', '0.8600', 'gift'),
(75, 1, 7, '0000-00-00', '95.7400', '1.4000', '142.5600', 'gift'),
(76, 1, 18, '0000-00-00', '50.2400', '6.7200', '33.0800', 'gift'),
(77, 1, 15, '2006-03-07', '37.4300', '6.4500', '14.2100', 'gift'),
(78, 1, 17, '0000-00-00', '89.7300', '9.9500', '53.9700', 'gift'),
(79, 1, 9, '2003-01-13', '52.4600', '9.2100', '90.9900', 'gift'),
(80, 1, 6, '2001-10-02', '17.3200', '9.2400', '14.5700', 'gift'),
(81, 1, 2, '0000-00-00', '50.8400', '1.7300', '40.2500', 'gift'),
(82, 1, 5, '0000-00-00', '28.2000', '5.6600', '92.6000', 'gift'),
(83, 1, 13, '0000-00-00', '24.8600', '1.1400', '34.4100', 'gift'),
(84, 1, 5, '0000-00-00', '89.4800', '8.4800', '21.3500', 'gift'),
(85, 1, 20, '2009-10-12', '52.2500', '8.8500', '52.1600', 'gift'),
(86, 1, 7, '2006-10-03', '5.4300', '9.6200', '12.0400', 'gift'),
(87, 1, 16, '2011-11-03', '68.3500', '4.3300', '146.5600', 'gift'),
(88, 1, 6, '0000-00-00', '29.6700', '2.5400', '16.4400', 'gift'),
(89, 1, 0, '0000-00-00', '21.4900', '9.5900', '49.7600', 'gift'),
(90, 1, 14, '0000-00-00', '67.7000', '4.7700', '93.1500', 'gift'),
(91, 1, 23, '0000-00-00', '47.7100', '7.8400', '123.1800', 'gift'),
(92, 1, 1, '0000-00-00', '40.3800', '1.6600', '116.7100', 'gift'),
(93, 1, 8, '2008-05-12', '74.7200', '6.0500', '144.7600', 'gift'),
(94, 1, 13, '0000-00-00', '78.2600', '9.9000', '131.0500', 'gift'),
(95, 1, 20, '0000-00-00', '24.5600', '6.9600', '52.7200', 'gift'),
(96, 1, 23, '0000-00-00', '22.9300', '1.5000', '76.1500', 'sale'),
(97, 1, 0, '2004-02-09', '75.5200', '6.1400', '62.0800', 'sale'),
(98, 1, 6, '0000-00-00', '9.6700', '2.2900', '2.8600', 'sale'),
(99, 1, 1, '0000-00-00', '97.0900', '1.1900', '126.2200', 'sale');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` mediumint(9) NOT NULL,
  `item_id` mediumint(9) DEFAULT NULL,
  `item_price` varchar(100) DEFAULT NULL,
  `qty` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `item_id`, `item_price`, `qty`) VALUES
(0, 0, '$34.77', 65),
(1, 1, '$49.75', 67),
(2, 2, '$97.82', 61),
(3, 3, '$3.44', 50),
(4, 4, '$60.98', 83),
(5, 5, '$4.88', 63),
(6, 6, '$69.95', 35),
(7, 7, '$55.29', 40),
(8, 8, '$61.87', 26),
(9, 9, '$9.20', 94),
(10, 10, '$59.31', 26),
(11, 11, '$25.60', 37),
(12, 12, '$6.74', 15),
(13, 13, '$83.68', 56),
(14, 14, '$51.25', 66),
(15, 15, '$27.93', 87),
(16, 16, '$74.82', 67),
(17, 17, '$46.73', 75),
(18, 18, '$71.56', 75),
(19, 19, '$51.43', 21),
(20, 20, '$20.01', 92),
(21, 21, '$23.69', 83),
(22, 22, '$85.55', 77),
(23, 23, '$21.98', 67),
(24, 24, '$41.15', 67),
(25, 25, '$47.18', 37),
(26, 26, '$18.34', 20),
(27, 27, '$35.09', 71),
(28, 28, '$36.62', 72),
(29, 29, '$21.15', 17),
(30, 30, '$35.37', 35),
(31, 31, '$32.54', 80),
(32, 32, '$19.62', 43),
(33, 33, '$29.22', 16),
(34, 34, '$51.56', 88),
(35, 35, '$16.80', 33),
(36, 36, '$50.66', 9),
(37, 37, '$41.15', 96),
(38, 38, '$62.27', 21),
(39, 39, '$40.65', 35),
(40, 40, '$35.61', 87),
(41, 41, '$72.49', 25),
(42, 42, '$66.69', 21),
(43, 43, '$15.38', 41),
(44, 44, '$93.28', 99),
(45, 45, '$15.11', 1),
(46, 46, '$58.41', 24),
(47, 47, '$41.92', 2),
(48, 48, '$85.01', 6),
(49, 49, '$79.25', 41),
(50, 50, '$35.74', 91),
(51, 51, '$33.58', 56),
(52, 52, '$29.09', 66),
(53, 53, '$4.67', 1),
(54, 54, '$28.14', 31),
(55, 55, '$79.35', 90),
(56, 56, '$19.44', 25),
(57, 57, '$58.91', 47),
(58, 58, '$19.23', 51),
(59, 59, '$51.77', 24),
(60, 60, '$72.13', 7),
(61, 61, '$5.94', 14),
(62, 62, '$27.80', 51),
(63, 63, '$76.90', 63),
(64, 64, '$72.43', 11),
(65, 65, '$61.67', 42),
(66, 66, '$0.43', 13),
(67, 67, '$64.31', 55),
(68, 68, '$22.99', 39),
(69, 69, '$68.86', 74),
(70, 70, '$54.48', 63),
(71, 71, '$76.31', 81),
(72, 72, '$51.38', 37),
(73, 73, '$59.10', 5),
(74, 74, '$63.87', 57),
(75, 75, '$83.96', 99),
(76, 76, '$42.00', 45),
(77, 77, '$84.87', 55),
(78, 78, '$5.25', 47),
(79, 79, '$17.15', 64),
(80, 80, '$98.16', 83),
(81, 81, '$64.11', 28),
(82, 82, '$98.06', 23),
(83, 83, '$25.60', 42),
(84, 84, '$40.10', 97),
(85, 85, '$75.29', 61),
(86, 86, '$77.07', 68),
(87, 87, '$38.34', 41),
(88, 88, '$20.20', 95),
(89, 89, '$1.85', 53),
(90, 90, '$72.95', 65),
(91, 91, '$23.07', 1),
(92, 92, '$43.20', 27),
(93, 93, '$40.14', 13),
(94, 94, '$86.49', 22),
(95, 95, '$47.98', 56),
(96, 96, '$20.84', 83),
(97, 97, '$49.21', 76),
(98, 98, '$74.84', 53),
(99, 99, '$98.54', 88);

-- --------------------------------------------------------

--
-- Table structure for table `order_materials`
--

CREATE TABLE `order_materials` (
  `material_id` int(11) NOT NULL,
  `supplier_order_id` int(11) DEFAULT NULL,
  `min_qty` int(11) DEFAULT NULL,
  `discount_percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_materials`
--

INSERT INTO `order_materials` (`material_id`, `supplier_order_id`, `min_qty`, `discount_percent`) VALUES
(0, 95, 64, 50),
(1, 85, 35, 47),
(2, 100, 77, 74),
(3, 73, 93, 50),
(4, 40, 3, 0),
(5, 17, 25, 71),
(6, 100, 50, 14),
(7, 46, 55, 25),
(8, 82, 19, 85),
(9, 17, 58, 90),
(10, 68, 54, 35),
(11, 94, 46, 69),
(12, 45, 26, 14),
(13, 31, 12, 3),
(14, 28, 57, 98),
(15, 74, 48, 24),
(16, 1, 23, 74),
(17, 22, 41, 27),
(18, 60, 19, 57),
(19, 21, 78, 87);

-- --------------------------------------------------------

--
-- Table structure for table `returns_inventory`
--

CREATE TABLE `returns_inventory` (
  `return_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns_inventory`
--

INSERT INTO `returns_inventory` (`return_id`, `order_id`, `return_date`) VALUES
(0, 72, '2011-11-15'),
(1, 26, '2031-03-16'),
(2, 10, '2016-01-16'),
(3, 41, '2019-09-16'),
(4, 58, '2001-09-15'),
(5, 55, '2022-03-16'),
(6, 76, '2005-08-16'),
(7, 1, '2016-06-15'),
(8, 7, '2030-04-16'),
(9, 100, '2030-05-16'),
(10, 10, '2009-01-16'),
(11, 95, '2024-10-16'),
(12, 86, '2022-12-15'),
(13, 95, '2019-03-16'),
(14, 20, '2020-07-16'),
(15, 65, '2009-02-17'),
(16, 56, '2008-01-16'),
(17, 78, '2019-10-15'),
(18, 11, '2030-03-16'),
(19, 23, '2013-03-17'),
(20, 33, '2027-10-15'),
(21, 99, '2018-03-17'),
(22, 38, '2027-01-17'),
(23, 70, '2029-04-15'),
(24, 94, '2019-07-15'),
(25, 30, '2016-07-16'),
(26, 98, '2023-02-17'),
(27, 6, '2002-02-16'),
(28, 59, '2029-12-15'),
(29, 59, '2012-06-15'),
(30, 16, '2015-04-15'),
(31, 63, '2020-04-16'),
(32, 64, '2028-02-16'),
(33, 72, '2007-08-16'),
(34, 57, '2022-04-15'),
(35, 66, '2018-12-16'),
(36, 76, '2005-09-15'),
(37, 37, '2024-01-16'),
(38, 62, '2014-04-15'),
(39, 38, '2007-09-15'),
(40, 19, '2013-03-16'),
(41, 27, '2003-08-15'),
(42, 74, '2020-01-16'),
(43, 48, '2018-06-16'),
(44, 72, '2006-11-16'),
(45, 10, '2026-07-15'),
(46, 22, '2015-02-17'),
(47, 81, '2003-01-16'),
(48, 24, '2016-03-16'),
(49, 17, '2017-10-15'),
(50, 87, '2017-09-15'),
(51, 8, '2021-06-16'),
(52, 73, '2027-10-15'),
(53, 83, '2003-07-15'),
(54, 58, '2010-03-16'),
(55, 21, '2009-08-15'),
(56, 89, '2011-10-16'),
(57, 55, '2001-05-15'),
(58, 24, '2007-09-16'),
(59, 10, '2015-03-16'),
(60, 34, '2023-06-15'),
(61, 18, '2027-10-15'),
(62, 79, '2003-09-15'),
(63, 11, '2022-06-15'),
(64, 44, '2014-12-16'),
(65, 35, '2031-08-16'),
(66, 46, '2015-01-16'),
(67, 73, '2022-11-16'),
(68, 90, '2006-01-16'),
(69, 48, '2001-07-16'),
(70, 32, '2015-03-16'),
(71, 80, '2009-10-15'),
(72, 60, '2003-05-16'),
(73, 18, '2017-07-15'),
(74, 58, '2007-08-16'),
(75, 57, '2018-06-16'),
(76, 40, '2021-09-15'),
(77, 83, '2014-01-17'),
(78, 48, '2019-04-16'),
(79, 60, '2006-08-16'),
(80, 14, '2007-06-15'),
(81, 78, '2003-11-16'),
(82, 9, '2006-05-16'),
(83, 9, '2024-03-16'),
(84, 52, '2006-10-15'),
(85, 29, '2015-07-16'),
(86, 90, '2022-06-15'),
(87, 58, '2009-03-16'),
(88, 25, '2007-08-16'),
(89, 22, '2004-05-15'),
(90, 85, '2011-11-15'),
(91, 37, '2002-02-17'),
(92, 42, '2030-01-16'),
(93, 86, '2014-10-16'),
(94, 55, '2005-12-15'),
(95, 36, '2005-05-16'),
(96, 10, '2020-03-17'),
(97, 58, '2011-01-16'),
(98, 54, '2021-11-15'),
(99, 36, '2007-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `return_details`
--

CREATE TABLE `return_details` (
  `return_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_details`
--

INSERT INTO `return_details` (`return_id`, `item_id`, `qty`) VALUES
(0, 50, 69),
(1, 51, 59),
(2, 52, 36),
(3, 53, 75),
(4, 54, 42),
(5, 55, 4),
(6, 56, 87),
(7, 57, 5),
(8, 58, 62),
(9, 59, 91),
(10, 60, 5),
(11, 61, 85),
(12, 62, 46),
(13, 63, 17),
(14, 64, 83),
(15, 65, 69),
(16, 66, 74),
(17, 67, 53),
(18, 68, 74),
(19, 69, 6),
(20, 70, 63),
(21, 71, 60),
(22, 72, 63),
(23, 73, 74),
(24, 74, 58),
(25, 75, 17),
(26, 76, 29),
(27, 77, 14),
(28, 78, 93),
(29, 79, 60),
(30, 80, 2),
(31, 81, 55),
(32, 82, 82),
(33, 83, 86),
(34, 84, 63),
(35, 85, 89),
(36, 86, 41),
(37, 87, 32),
(38, 88, 35),
(39, 89, 69),
(40, 90, 47),
(41, 91, 57),
(42, 92, 56),
(43, 93, 54),
(44, 94, 67),
(45, 95, 28),
(46, 96, 12),
(47, 97, 8),
(48, 98, 64),
(49, 99, 45),
(50, 100, 13);

-- --------------------------------------------------------

--
-- Table structure for table `ship_cost`
--

CREATE TABLE `ship_cost` (
  `ship_cost_id` int(11) NOT NULL,
  `ship_distance` int(11) DEFAULT NULL,
  `ship_id` int(11) DEFAULT NULL,
  `shipping_cost` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ship_cost`
--

INSERT INTO `ship_cost` (`ship_cost_id`, `ship_distance`, `ship_id`, `shipping_cost`) VALUES
(0, 834, 0, '15.1000'),
(1, 182, 1, '16.3600'),
(2, 920, 2, '88.2800'),
(3, 107, 3, '32.6900'),
(4, 438, 4, '65.1700'),
(5, 408, 5, '91.3800'),
(6, 502, 6, '61.8000'),
(7, 843, 7, '12.7700'),
(8, 109, 8, '38.8400'),
(9, 235, 9, '96.8300'),
(10, 192, 10, '39.6600'),
(11, 468, 11, '39.4100'),
(12, 644, 12, '58.4900'),
(13, 42, 13, '11.9300'),
(14, 852, 14, '70.7600'),
(15, 138, 15, '99.0100'),
(16, 513, 16, '69.7200'),
(17, 932, 17, '47.0300'),
(18, 414, 18, '43.9200'),
(19, 166, 19, '20.8800'),
(20, 942, 20, '96.6700'),
(21, 922, 21, '94.7200'),
(22, 387, 22, '99.1200'),
(23, 688, 23, '56.5900'),
(24, 302, 24, '98.5300'),
(25, 599, 25, '6.1400'),
(26, 184, 26, '72.9100'),
(27, 677, 27, '23.7200'),
(28, 58, 28, '90.3900'),
(29, 585, 29, '81.4700'),
(30, 952, 30, '61.2300'),
(31, 351, 31, '6.9100'),
(32, 971, 32, '0.1000'),
(33, 633, 33, '45.7300'),
(34, 859, 34, '65.6500'),
(35, 527, 35, '74.6700'),
(36, 184, 36, '15.8600'),
(37, 745, 37, '71.2100'),
(38, 491, 38, '60.9500'),
(39, 385, 39, '28.9600'),
(40, 950, 40, '49.7400'),
(41, 267, 41, '77.0500'),
(42, 728, 42, '70.0100'),
(43, 836, 43, '26.0200'),
(44, 813, 44, '46.0000'),
(45, 798, 45, '47.3600'),
(46, 57, 46, '76.4100'),
(47, 487, 47, '51.0200'),
(48, 34, 48, '4.3800'),
(49, 451, 49, '32.8800'),
(50, 632, 50, '48.3300'),
(51, 808, 51, '80.8200'),
(52, 491, 52, '3.3600'),
(53, 823, 53, '78.7200'),
(54, 969, 54, '26.3800'),
(55, 64, 55, '93.9200'),
(56, 282, 56, '92.9200'),
(57, 693, 57, '95.7600'),
(58, 915, 58, '23.2200'),
(59, 308, 59, '14.9800'),
(60, 141, 60, '6.8800'),
(61, 683, 61, '65.9100'),
(62, 767, 62, '81.6800'),
(63, 270, 63, '64.8100'),
(64, 268, 64, '95.5600'),
(65, 814, 65, '53.0300'),
(66, 467, 66, '20.2300'),
(67, 689, 67, '77.2400'),
(68, 275, 68, '54.4800'),
(69, 557, 69, '7.2400'),
(70, 609, 70, '36.7100'),
(71, 351, 71, '4.1300'),
(72, 958, 72, '75.7200'),
(73, 419, 73, '91.1100'),
(74, 310, 74, '76.1200'),
(75, 506, 75, '94.2900'),
(76, 795, 76, '59.1100'),
(77, 832, 77, '21.9400'),
(78, 790, 78, '91.3000'),
(79, 694, 79, '60.4500'),
(80, 866, 80, '20.4600'),
(81, 973, 81, '88.2700'),
(82, 303, 82, '47.9400'),
(83, 430, 83, '87.1200'),
(84, 458, 84, '1.6900'),
(85, 833, 85, '16.8800'),
(86, 685, 86, '44.2200'),
(87, 204, 87, '7.9900'),
(88, 693, 88, '40.5800'),
(89, 326, 89, '32.7100'),
(90, 951, 90, '27.1100'),
(91, 467, 91, '31.5500'),
(92, 399, 92, '72.0900'),
(93, 575, 93, '35.3800'),
(94, 227, 94, '58.7900'),
(95, 519, 95, '42.9000'),
(96, 577, 96, '72.0400'),
(97, 357, 97, '84.7800'),
(98, 195, 98, '19.6300'),
(99, 885, 99, '13.3900');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_job_title` varchar(50) DEFAULT NULL,
  `company_phone` varchar(20) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `address_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `contact_name`, `contact_job_title`, `company_phone`, `contact_phone`, `address_id`, `email`) VALUES
(0, 'Eros Turpis Non Foundation', 'Chase Espinoza', ' supervisor ', '(138) 247-8068', '', 79, 'luctus.ut.pellentesque@necmauris.edu'),
(1, 'In Faucibus Morbi LLC', 'Linda Boyle', ' sales rep', '(615) 528-0638', '', 80, 'gravida.Praesent.eu@ipsumdolor.edu'),
(2, 'Donec Felis LLP', 'Colleen Houston', ' supervisor ', '(796) 215-6500', '', 81, 'dictum.eleifend.nunc@dui.ca'),
(3, 'Eu Neque Ltd', 'Blair Lucas', 'manager ', '(854) 352-5294', '', 82, 'velit.Quisque@velarcueu.edu'),
(4, 'Arcu Vestibulum Consulting', 'Idona Franklin', ' supervisor ', '(915) 139-4325', '', 83, 'Phasellus@ridiculus.com'),
(5, 'Magnis Dis Parturient Corp.', 'Erich Zamora', ' supervisor ', '(282) 662-7153', '', 84, 'ante.ipsum.primis@nonummyipsumnon.org'),
(6, 'Eu Elit Nulla Company', 'Sydney Spears', 'manager ', '(271) 652-7522', '', 85, 'Proin.eget@pulvinararcuet.org'),
(7, 'Erat Vivamus Inc.', 'Amy Greene', 'manager ', '(292) 872-4288', '', 86, 'mauris@neque.edu'),
(8, 'Curabitur Vel Lectus Associates', 'Jermaine Shaw', ' supervisor ', '(541) 291-8757', '', 87, 'Etiam@idante.net'),
(9, 'Phasellus Industries', 'Imani Macdonald', 'manager ', '(411) 946-8146', '', 88, 'id@egetdictum.org'),
(10, 'Lacus Ut Nec Associates', 'Hayley Dominguez', 'manager ', '(896) 130-0008', '', 89, 'mollis@Donec.net'),
(11, 'Tempus Risus Foundation', 'Blair Frazier', ' sales rep', '(950) 696-5986', '', 90, 'at.sem.molestie@vel.net'),
(12, 'Ac Fermentum Vel Incorporated', 'Signe Kirby', ' sales rep', '(505) 175-7464', '', 91, 'scelerisque.dui@placeratvelit.org'),
(13, 'Velit Cras Lorem Institute', 'Tanya Crawford', 'manager ', '(315) 648-0449', '', 92, 'In@auctorullamcorper.edu'),
(14, 'Velit Eget Laoreet Ltd', 'Troy Flores', ' supervisor ', '(207) 752-5153', '', 93, 'sed@Duis.edu'),
(15, 'Eu Placerat Eget Incorporated', 'Aurora Ryan', ' supervisor ', '(153) 147-8764', '', 94, 'luctus@maurisipsum.co.uk'),
(16, 'Pellentesque Habitant Morbi Incorporated', 'Mason Wilkins', ' supervisor ', '(944) 848-6007', '', 95, 'iaculis@risusQuisquelibero.co.uk'),
(17, 'Duis PC', 'Garth Atkins', 'manager ', '(971) 978-1971', '', 96, 'Cras@gravida.net'),
(18, 'Nulla In Consulting', 'Xander Berger', 'manager ', '(158) 899-7924', '', 97, 'primis.in.faucibus@condimentum.com'),
(19, 'Quam Corporation', 'Barbara Salas', ' supervisor ', '(742) 411-6314', '', 98, 'fermentum.convallis.ligula@loremutaliquam.net');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_discount`
--

CREATE TABLE `supplier_discount` (
  `material_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `min_qty` int(11) DEFAULT NULL,
  `discount_percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_discount`
--

INSERT INTO `supplier_discount` (`material_id`, `supplier_id`, `min_qty`, `discount_percent`) VALUES
(0, 2, 94, 78),
(1, 4, 73, 66),
(2, 2, 7, 95),
(3, 2, 1, 4),
(4, 5, 31, 4),
(5, 8, 23, 19),
(6, 6, 64, 77),
(7, 8, 66, 12),
(8, 5, 36, 40),
(9, 8, 2, 5),
(10, 7, 3, 88),
(11, 8, 1, 73),
(12, 6, 71, 64),
(13, 6, 94, 24),
(14, 7, 54, 7),
(15, 3, 37, 23),
(16, 10, 37, 95),
(17, 9, 39, 12),
(18, 10, 94, 88),
(19, 7, 45, 69);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_order`
--

CREATE TABLE `supplier_order` (
  `supplier_order_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `tax_amount` varchar(100) DEFAULT NULL,
  `total_discount` varchar(100) DEFAULT NULL,
  `total_price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_order`
--

INSERT INTO `supplier_order` (`supplier_order_id`, `employee_id`, `supplier_id`, `order_date`, `subtotal`, `tax_amount`, `total_discount`, `total_price`) VALUES
(1, 17, 1, '10/19/05', '17.86', '0.00', '2.69', '95.46'),
(2, 6, 8, '01/28/10', '84.77', '0.00', '5.31', '76.06'),
(3, 6, 18, '10/26/02', '90.37', '0.00', '5.90', '2.47'),
(4, 24, 2, '10/04/12', '60.66', '0.00', '2.28', '53.12'),
(5, 15, 6, '07/04/08', '43.53', '0.00', '1.06', '24.49'),
(6, 15, 5, '03/28/08', '86.70', '0.00', '3.57', '1.93'),
(7, 21, 12, '05/30/02', '14.80', '0.00', '6.80', '6.67'),
(8, 15, 3, '05/22/12', '15.09', '0.00', '9.03', '31.10'),
(9, 4, 19, '02/21/11', '21.35', '0.00', '9.76', '44.08'),
(10, 23, 1, '09/19/09', '91.85', '0.00', '0.23', '27.51'),
(11, 5, 8, '02/24/01', '11.55', '0.00', '6.62', '26.77'),
(12, 15, 9, '03/21/12', '31.08', '0.00', '3.70', '69.00'),
(13, 2, 0, '10/10/04', '98.63', '0.00', '11.36', '66.85'),
(14, 14, 13, '02/06/12', '1.65', '0.00', '7.63', '62.69'),
(15, 8, 16, '11/15/01', '45.98', '0.00', '2.97', '12.40'),
(16, 8, 10, '02/21/03', '8.63', '0.00', '5.00', '54.25'),
(17, 24, 9, '04/03/06', '12.29', '0.00', '12.07', '86.79'),
(18, 20, 5, '04/03/01', '17.09', '0.00', '3.40', '65.00'),
(19, 11, 7, '07/13/02', '94.30', '0.00', '9.02', '30.82'),
(20, 8, 18, '03/12/06', '2.33', '0.00', '8.07', '8.87'),
(21, 1, 8, '10/11/10', '82.72', '0.00', '4.17', '83.76'),
(22, 15, 10, '05/08/11', '22.21', '0.00', '8.87', '79.69'),
(23, 8, 14, '05/14/08', '55.48', '0.00', '13.41', '95.82'),
(24, 17, 19, '01/25/01', '61.65', '0.00', '12.56', '16.29'),
(25, 21, 9, '09/09/08', '48.73', '0.00', '13.63', '19.05'),
(26, 24, 11, '11/01/08', '37.40', '0.00', '10.29', '70.43'),
(27, 5, 11, '11/05/08', '47.35', '0.00', '13.70', '14.61'),
(28, 22, 10, '01/21/06', '97.96', '0.00', '8.65', '46.89'),
(29, 19, 11, '11/20/08', '83.68', '0.00', '6.93', '79.94'),
(30, 4, 18, '10/28/13', '61.01', '0.00', '13.79', '75.05'),
(31, 2, 7, '01/21/01', '91.18', '0.00', '14.79', '44.44'),
(32, 1, 8, '01/11/03', '34.56', '0.00', '12.17', '76.57'),
(33, 8, 4, '02/27/10', '82.35', '0.00', '5.18', '97.66'),
(34, 10, 4, '06/02/02', '26.59', '0.00', '12.82', '31.60'),
(35, 24, 19, '02/05/07', '53.46', '0.00', '14.76', '36.79'),
(36, 10, 9, '04/15/06', '4.04', '0.00', '12.01', '37.57'),
(37, 8, 11, '12/04/03', '59.93', '0.00', '8.78', '41.48'),
(38, 14, 15, '09/23/11', '34.10', '0.00', '3.64', '62.39'),
(39, 12, 9, '04/16/00', '64.23', '0.00', '1.08', '32.28'),
(40, 16, 4, '10/31/00', '89.62', '0.00', '5.71', '99.15'),
(41, 13, 4, '03/02/08', '32.36', '0.00', '5.36', '88.97'),
(42, 6, 5, '06/26/09', '49.33', '0.00', '1.28', '73.34'),
(43, 7, 9, '03/26/05', '22.64', '0.00', '7.61', '13.76'),
(44, 20, 10, '05/04/02', '49.23', '0.00', '2.11', '67.37'),
(45, 18, 4, '10/30/10', '61.25', '0.00', '2.62', '62.10'),
(46, 14, 4, '12/31/04', '86.48', '0.00', '9.79', '27.11'),
(47, 17, 17, '12/30/05', '48.72', '0.00', '0.34', '32.29'),
(48, 3, 9, '04/11/03', '24.19', '0.00', '10.64', '61.38'),
(49, 22, 3, '06/21/03', '32.19', '0.00', '0.18', '60.22'),
(50, 22, 15, '05/13/11', '5.38', '0.00', '12.39', '88.59'),
(51, 4, 14, '12/10/04', '25.88', '0.00', '6.56', '60.61'),
(52, 2, 1, '05/16/02', '0.32', '0.00', '2.57', '44.09'),
(53, 4, 15, '08/09/06', '64.07', '0.00', '0.91', '6.13'),
(54, 3, 0, '11/09/00', '35.84', '0.00', '14.26', '30.81'),
(55, 14, 17, '07/26/01', '49.72', '0.00', '1.50', '54.37'),
(56, 8, 10, '10/16/03', '53.54', '0.00', '3.00', '63.77'),
(57, 15, 18, '08/29/13', '32.44', '0.00', '8.08', '88.16'),
(58, 14, 17, '04/18/00', '25.11', '0.00', '11.11', '16.93'),
(59, 10, 14, '11/20/13', '22.22', '0.00', '9.00', '41.52'),
(60, 24, 9, '10/27/03', '50.27', '0.00', '14.14', '45.85'),
(61, 20, 10, '01/25/05', '33.30', '0.00', '13.24', '32.96'),
(62, 5, 11, '01/19/01', '25.72', '0.00', '3.57', '76.56'),
(63, 11, 19, '06/23/02', '51.29', '0.00', '2.18', '60.14'),
(64, 6, 6, '11/24/02', '86.43', '0.00', '9.34', '1.97'),
(65, 22, 11, '11/07/10', '16.35', '0.00', '5.71', '0.37'),
(66, 17, 1, '07/03/00', '92.79', '0.00', '14.47', '69.76'),
(67, 24, 2, '06/08/13', '59.64', '0.00', '4.42', '33.74'),
(68, 6, 9, '03/17/13', '48.36', '0.00', '11.00', '49.78'),
(69, 15, 10, '02/17/05', '81.43', '0.00', '11.87', '40.55'),
(70, 18, 13, '05/23/12', '88.95', '0.00', '14.31', '50.16'),
(71, 8, 16, '11/08/10', '84.29', '0.00', '3.58', '7.24'),
(72, 23, 18, '04/15/07', '77.56', '0.00', '6.66', '51.92'),
(73, 23, 11, '04/02/11', '20.23', '0.00', '7.46', '28.17'),
(74, 14, 0, '05/28/09', '47.11', '0.00', '10.06', '97.58'),
(75, 23, 4, '08/27/05', '55.24', '0.00', '2.65', '35.61'),
(76, 4, 0, '08/10/10', '16.39', '0.00', '5.17', '87.74'),
(77, 20, 12, '11/24/07', '28.69', '0.00', '0.31', '31.06'),
(78, 1, 11, '09/09/00', '97.40', '0.00', '0.34', '42.35'),
(79, 7, 11, '07/09/08', '75.04', '0.00', '8.27', '84.64'),
(80, 22, 2, '02/17/06', '74.22', '0.00', '11.34', '13.45'),
(81, 7, 11, '06/28/11', '65.83', '0.00', '12.69', '24.34'),
(82, 10, 3, '04/03/02', '91.53', '0.00', '2.36', '99.92'),
(83, 17, 15, '04/04/11', '52.02', '0.00', '14.88', '61.73'),
(84, 17, 10, '09/27/03', '20.31', '0.00', '10.25', '72.47'),
(85, 15, 19, '10/16/06', '44.77', '0.00', '1.11', '83.08'),
(86, 2, 2, '09/02/12', '38.59', '0.00', '10.45', '49.74'),
(87, 5, 9, '08/12/12', '29.83', '0.00', '12.55', '44.15'),
(88, 24, 10, '06/12/10', '14.48', '0.00', '8.78', '43.90'),
(89, 1, 13, '04/26/08', '68.43', '0.00', '2.41', '14.35'),
(90, 16, 1, '07/26/10', '1.50', '0.00', '5.05', '57.72'),
(91, 15, 17, '02/03/03', '44.22', '0.00', '9.97', '20.62'),
(92, 22, 1, '04/03/10', '92.99', '0.00', '7.00', '56.98'),
(93, 20, 2, '01/23/13', '75.80', '0.00', '2.76', '2.52'),
(94, 10, 6, '06/15/01', '38.83', '0.00', '9.40', '12.61'),
(95, 5, 16, '09/24/12', '82.98', '0.00', '8.85', '47.94'),
(96, 9, 13, '10/14/11', '47.78', '0.00', '8.03', '86.87'),
(97, 21, 17, '06/02/00', '75.89', '0.00', '7.45', '79.66'),
(98, 16, 1, '07/18/08', '38.47', '0.00', '14.33', '2.61'),
(99, 2, 12, '05/23/10', '96.02', '0.00', '8.03', '68.71'),
(100, 5, 13, '01/30/14', '50.07', '0.00', '9.32', '21.66');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `employee_id` int(11) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `accessLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`employee_id`, `password_hash`, `accessLevel`) VALUES
(0, '$2a$08$tC.0Cn73knBuou2Ugrs3gucRH9ZUYf6CUJxMtaRKMJZJitRcfFfzK', 1),
(1, '$2a$08$fViZC5fwnxFMXSLKWtVj9.UJtPe5g9hxtojgX71Ukh8Q3XEh2kIs2', 3),
(2, '$2a$08$/e2Hu23N2XcBvPs05jq9Pe56NsQeA27vMgrE7s0nEeBLpMH9mJxlW', 2),
(3, '$2a$08$v1xBYJmW01.Yd/rsrbklfuy7dBlCRLLv6p26Vc8aLFGraZnz29Z/6', 1),
(4, '$2a$08$i8/Up8R2AwDwko6fobiyvuX/5wj1xChdGY1g/YcNGFDtDV/Fm/FG6', 2),
(5, '$2a$08$afTpR89YTf0vcJGwBg2rzuOoPqZnHU0AQvlz7TmF4ezvOVHhqrONe', 2),
(6, '$2a$08$dUDuvRkdAdfoWaK2y.ijte1bQo6JifQTk7GtrfLV0UVpkIVdY9W3q', 3),
(7, '$2a$08$4hsFmrOfO4N8etSLDe5Jsub.KL3/s.D8YzSehQmXXttkUmGT8Brou', 1),
(8, '$2a$08$msSzZsFBbnT6rU6VJVyHzeEpxGa3FjmYdBRsnj6WRsHV2T46HQjn2', 1),
(9, '$2a$08$wPkCRYrb6uIxfaoZ02Zf5e3iif51F0vw..dNVE7iInpdzDMQiyPCW', 3),
(10, '$2a$08$cnuzqMxxsL6b0zRUuOxTJ.E3P5gDyZmMlD9Ay5m9VasRN9ej7MxUe', 1),
(11, '$2a$08$82AOrK7RiBeNR7MGFzDnqekpFUeb3jmO2CsXs5Jsgn/nYpuM5XJBm', 3),
(12, '$2a$08$ldLRgAqBIKfTREhpsAfoLe9nYzv1L/BZGmftkmKlDyKHZU7JFBkdK', 1),
(13, '$2a$08$vfzFE8NZpGMCwLaGWE.kHu7SrtvT0auWaupgHGOSOHFf2TxF8oqqW', 3),
(14, '$2a$08$jdWx5cdCw5lBEeb6jAkB1e1rSDOz0W7fMDSB4NmZ3OcL6U28.fseu', 1),
(15, '$2a$08$kZm7b0HI.mSypebqZBks3.Ti2JWOrhR3lX6ddK/i4OEqANHOdsW62', 2),
(16, '$2a$08$MG6mRqQMRR81ixQ5u2u0pOiYmaXS9/XQteCCgAeNdfVayoVgMvxru', 3),
(17, '$2a$08$0uKKC9D43Uy7bm30KKAYA.FD.OwmV5cUOY68DkwG2iktfwLOCvGKG', 2),
(18, '$2a$08$FxmuoWKTPR6S6Wp0k8LRIOQCn6gct0D.g379mjQGdnV7UDaXQRRWu', 3),
(19, '$2a$08$hJrEUEv.FEScsG4vkQE8nelCXq/o3FNLQVTurRIcMFRxlS9lGVniW', 2),
(20, '$2a$08$vfjsjSOiVXl4VyrEzZkC1.UMyqtOFXpgA/oWTF2KFNVZmt9NlT586', 2),
(21, '$2a$08$jBR.0Q5qRK.SPo7pp3xmCuc7DnEaIs8Izk87TfxG.1uVbtOZzmDy.', 2),
(22, '$2a$08$iSI8EXJEKKhCCwuwbLzT/OTzD5LlGWC7ODb/HRsK6T/L7eASwDbXm', 1),
(23, '$2a$08$b3ALI1D5dTJdG7d9fZVzC.ZP/9UjPYd9aI3B74v0vu/p2G1nNFopK', 2),
(24, '$2a$08$fV4tmUQb4bg93dIsTPFLqu8gFoEBlon4yGpKyf3BseWXzZS/rFoKy', 3),
(25, 'GJQ57TLA7OI', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `craft`
--
ALTER TABLE `craft`
  ADD PRIMARY KEY (`craft_id`);

--
-- Indexes for table `craft_materials`
--
ALTER TABLE `craft_materials`
  ADD PRIMARY KEY (`material_id`,`craft_id`),
  ADD KEY `Craft_materials_Craft` (`craft_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `Customer_Address` (`address_id`);

--
-- Indexes for table `custom_order`
--
ALTER TABLE `custom_order`
  ADD PRIMARY KEY (`custom_order_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `Employee_Address` (`address_id`);

--
-- Indexes for table `gift_order`
--
ALTER TABLE `gift_order`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `gift_shipping`
--
ALTER TABLE `gift_shipping`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `local_vendors`
--
ALTER TABLE `local_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `Order_Employee` (`employee_id`),
  ADD KEY `client_order` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_materials`
--
ALTER TABLE `order_materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `returns_inventory`
--
ALTER TABLE `returns_inventory`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `return_details`
--
ALTER TABLE `return_details`
  ADD PRIMARY KEY (`return_id`,`item_id`),
  ADD KEY `return_details_Item` (`item_id`);

--
-- Indexes for table `ship_cost`
--
ALTER TABLE `ship_cost`
  ADD PRIMARY KEY (`ship_cost_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `Supplier_Address` (`address_id`);

--
-- Indexes for table `supplier_discount`
--
ALTER TABLE `supplier_discount`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `supplier_order`
--
ALTER TABLE `supplier_order`
  ADD PRIMARY KEY (`supplier_order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `craft`
--
ALTER TABLE `craft`
  MODIFY `craft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `custom_order`
--
ALTER TABLE `custom_order`
  MODIFY `custom_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `gift_order`
--
ALTER TABLE `gift_order`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `gift_shipping`
--
ALTER TABLE `gift_shipping`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `local_vendors`
--
ALTER TABLE `local_vendors`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `order_materials`
--
ALTER TABLE `order_materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `returns_inventory`
--
ALTER TABLE `returns_inventory`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `ship_cost`
--
ALTER TABLE `ship_cost`
  MODIFY `ship_cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `supplier_discount`
--
ALTER TABLE `supplier_discount`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `supplier_order`
--
ALTER TABLE `supplier_order`
  MODIFY `supplier_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `craft_materials`
--
ALTER TABLE `craft_materials`
  ADD CONSTRAINT `Craft_materials_Craft` FOREIGN KEY (`craft_id`) REFERENCES `craft` (`craft_id`),
  ADD CONSTRAINT `Craft_materials_Material` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `Customer_Address` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `Employee_Address` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `Order_Employee` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `client_order` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `return_details`
--
ALTER TABLE `return_details`
  ADD CONSTRAINT `return_details_Item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `return_details_Returns_Inventory` FOREIGN KEY (`return_id`) REFERENCES `returns_inventory` (`return_id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `Supplier_Address` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Users_Employee` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
