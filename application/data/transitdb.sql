-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 05:36 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerfavorites`
--

CREATE TABLE `customerfavorites` (
  `userID` int(11) NOT NULL,
  `routeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerfavorites`
--

INSERT INTO `customerfavorites` (`userID`, `routeID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(3, 1),
(5, 2),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `userID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`userID`, `username`, `password`, `email`, `firstname`, `lastname`) VALUES
(1, 'customer', 'customer', 'hilpert.thad@example.net', 'customer', 'customer'),
(2, 'frieda00', 'o3w4g6g3', 'etromp@example.com', 'frieda00', 'o3w4g6g3'),
(3, 'jan81', 'x5z0j5s6', 'slehner@example.net', 'jan81', 'x5z0j5s6'),
(4, 'wiza.cicero', 't3d9z1w5', 'dorian16@example.net', 'wiza.cicero', 't3d9z1w5'),
(5, 'max47', 'b7h4u0p4', 'hskiles@example.net', 'max47', 'b7h4u0p4');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `role` enum('admin','driver','mechanic') NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `username`, `password`, `firstname`, `lastname`, `role`, `email`) VALUES
(1, 'mechanic', 'mechanic', 'Tyler', 'Ray', 'mechanic', 'karine89@example.com'),
(2, 'bennett.mcdermott', 'j4q4u3z0', 'Kamryn', 'Deckow', 'mechanic', 'parker.reilly@example.net'),
(3, 'franecki.carole', 'y1i3z9i6', 'Burdette', 'Pagac', 'driver', 'devonte.stoltenberg@example.net'),
(4, 'dorn', 'g0q0n7z8', 'Jacynthe', 'Swift', 'admin', 'dstreich@example.com'),
(5, 'hblick', 'o8s9w2v8', 'Hunter', 'Denesik', 'admin', 'xzavier.prohaska@example.net'),
(6, 'driver', 'driver', 'Alaya', 'Ahmed', 'driver', 'conroy.eugene@example.com'),
(7, 'della.nienow', 'x1e0m0k7', 'Kiel', 'Gottlieb', 'mechanic', 'laurianne.ankunding@example.org'),
(8, 'nash.mraz', 'u0n6k9d3', 'Arne', 'Streich', 'mechanic', 'mcglynn.dortha@example.com'),
(9, 'gregoria.herman', 'j1o5r9m2', 'Demond', 'Rutherford', 'mechanic', 'vpollich@example.net'),
(10, 'laverna.adams', 'a9f4i5b4', 'Eda', 'Mills', 'driver', 'valentina.konopelski@example.org'),
(11, 'anna.bins', 'f8e5j4q5', 'Javon', 'Nienow', 'mechanic', 'clubowitz@example.net'),
(12, 'willms.xander', 't2s7j7c3', 'Skyla', 'Bednar', 'driver', 'lavinia.dietrich@example.com'),
(13, 'iemard', 'y8u0j7h2', 'Mayra', 'Barton', 'admin', 'queen21@example.net'),
(14, 'albert.herzog', 'm0l3z9i4', 'Kylie', 'Kris', 'mechanic', 'jaycee56@example.com'),
(15, 'emile51', 'n8z5h7d7', 'Waldo', 'Olson', 'admin', 'bernhard.remington@example.net'),
(16, 'jkonopelski', 'd6x8l5f9', 'Jessika', 'Smitham', 'mechanic', 'kuphal.jarvis@example.org'),
(17, 'janick.hoppe', 'd0y5r4u6', 'Kathryne', 'Herman', 'admin', 'bednar.kenny@example.org'),
(18, 'kiley.sanford', 'h9l8j5e8', 'Citlalli', 'Gottlieb', 'driver', 'bertha89@example.com'),
(19, 'palma35', 'v3s1d8d2', 'Destiny', 'Gislason', 'admin', 'mquitzon@example.com'),
(20, 'wheathcote', 'x1y9b6d8', 'Melba', 'Walter', 'admin', 'flossie.dickinson@example.net'),
(21, 'nicolette32', 'n0m7s1k7', 'Kaylin', 'Friesen', 'mechanic', 'alexanne.schowalter@example.com'),
(22, 'ylang', 'f9a5b6g0', 'Antonette', 'Jerde', 'mechanic', 'kevon.strosin@example.com'),
(23, 'chelsie49', 's5d1y0k8', 'Nestor', 'Gutkowski', 'mechanic', 'lframi@example.net'),
(24, 'velda25', 'n5e8p1z0', 'Zelma', 'Yundt', 'mechanic', 'jolie79@example.org'),
(25, 'utrantow', 'v7s4h8d2', 'Ali', 'Armstrong', 'admin', 'zstracke@example.net'),
(26, 'marques11', 'n5n5k0i9', 'Lilian', 'Buckridge', 'mechanic', 'wziemann@example.net'),
(27, 'kemmerich', 'k7g3r8p3', 'Aisha', 'Raynor', 'mechanic', 'cgaylord@example.org'),
(28, 'diego.cummings', 'o9y5l8f3', 'Clay', 'Connelly', 'driver', 'joaquin88@example.com'),
(29, 'liza56', 't3i8o3o0', 'Liza', 'Bechtelar', 'driver', 'aurore47@example.org'),
(30, 'nspencer', 'e4u4x9k5', 'Xzavier', 'Heaney', 'driver', 'anika40@example.net'),
(31, 'jkris', 'd7f4c6n3', 'Chester', 'Robel', 'mechanic', 'obradtke@example.org'),
(32, 'vosinski', 'x0g0g2d3', 'Madge', 'Hand', 'mechanic', 'hilll.lorenzo@example.org'),
(33, 'madge10', 'n4w9m9j7', 'Casimir', 'Hyatt', 'mechanic', 'bart71@example.net'),
(34, 'woodrow79', 'u5d3j1b1', 'Breanne', 'Baumbach', 'mechanic', 'mohr.molly@example.net'),
(35, 'predovic.magdalen', 'x2u0i8e0', 'Noemie', 'Haag', 'driver', 'cynthia79@example.net'),
(36, 'iconsidine', 't8o4g0e6', 'Carmelo', 'Aufderhar', 'mechanic', 'tmckenzie@example.org'),
(37, 'catharine.white', 'm3u2s9t5', 'Shyanne', 'Herman', 'driver', 'baron.botsford@example.org'),
(38, 'ashlynn14', 'k2s8w4j8', 'Hallie', 'Kohler', 'mechanic', 'jmoore@example.net'),
(39, 'marquardt.sallie', 'c3i9d3r7', 'Kameron', 'Leannon', 'admin', 'raven.paucek@example.com'),
(40, 'vinnie58', 'o4l1t9i6', 'Geraldine', 'Schuster', 'driver', 'rath.kayley@example.net'),
(41, 'admin', 'admin', 'Chirag', 'Patel', 'admin', 'xdamore@example.net'),
(42, 'assunta50', 'x5d2d9e5', 'Mariela', 'Davis', 'driver', 'fern59@example.net'),
(43, 'bdavis', 'i0c3a5g3', 'Jarrett', 'Rice', 'driver', 'dpadberg@example.net'),
(44, 'paxton74', 'p8f4o7t4', 'Aniyah', 'Lang', 'mechanic', 'qmclaughlin@example.net'),
(45, 'aklocko', 'b1l4s1e4', 'Candido', 'Luettgen', 'driver', 'kattie.rice@example.org');

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

CREATE TABLE `fleet` (
  `busID` int(11) NOT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `mileage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleet`
--

INSERT INTO `fleet` (`busID`, `active`, `mileage`) VALUES
(1, 1, 102861),
(2, 1, 46642),
(3, 1, 34774),
(4, 1, 299991),
(5, 1, 190048),
(6, 1, 116677),
(7, 1, 254408),
(8, 1, 27578.5),
(9, 1, 94639.2),
(10, 0, 163022),
(11, 1, 253515),
(12, 1, 88443.4),
(13, 0, 161468),
(14, 1, 22939.3),
(15, 1, 66008.5),
(16, 1, 244088),
(17, 1, 140465),
(18, 0, 156232),
(19, 1, 208578),
(20, 0, 153800),
(21, 0, 83457.9);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenanceID` int(11) NOT NULL,
  `busID` int(11) NOT NULL,
  `maintItem` varchar(255) NOT NULL,
  `complete` tinyint(4) DEFAULT NULL,
  `employeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenanceID`, `busID`, `maintItem`, `complete`, `employeeID`) VALUES
(1, 1, 'Soluta minus delectus voluptatibus temporibus dolorem.', 1, 1),
(4, 13, 'Reiciendis hic et quia reiciendis ad ratione.', 0, NULL),
(5, 20, 'Non quia aliquam omnis illum est assumenda architecto.', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `routeID` int(11) NOT NULL,
  `distance` float NOT NULL,
  `start` time NOT NULL,
  `stop` time NOT NULL,
  `DoW` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`routeID`, `distance`, `start`, `stop`, `DoW`, `name`) VALUES
(1, 129.5, '08:00:00', '16:00:00', 'M,W,F', '3 Day Express'),
(2, 109.5, '08:00:00', '16:00:00', 'M,T,W,R,F,S,U', 'All Week Party Bus'),
(3, 106.5, '08:00:00', '16:00:00', 'T', 'Taco Tuesday Express'),
(4, 101.5, '08:00:00', '16:00:00', 'M,T,W,R,F', 'Weekday Normal'),
(5, 122.5, '08:00:00', '16:00:00', 'S,U', 'Weekend Normal');

-- --------------------------------------------------------

--
-- Table structure for table `routesequence`
--

CREATE TABLE `routesequence` (
  `routeID` int(11) NOT NULL,
  `stopID` int(11) NOT NULL,
  `prevStop` int(11) DEFAULT NULL,
  `nextStop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routesequence`
--

INSERT INTO `routesequence` (`routeID`, `stopID`, `prevStop`, `nextStop`) VALUES
(1, 1, NULL, 5),
(1, 5, 1, 8),
(1, 8, 5, 11),
(1, 11, 8, NULL),
(2, 6, NULL, 14),
(2, 14, 6, NULL),
(3, 1, 3, 4),
(3, 3, 6, 1),
(3, 4, 1, 9),
(3, 6, NULL, 3),
(3, 9, 4, 20),
(3, 15, 20, NULL),
(3, 20, 9, 15),
(4, 8, 10, 11),
(4, 10, NULL, 8),
(4, 11, 8, 14),
(4, 12, 14, 16),
(4, 13, 16, NULL),
(4, 14, 11, 12),
(4, 16, 12, 13),
(5, 2, 5, 19),
(5, 5, 7, 2),
(5, 7, 17, 5),
(5, 17, 18, 7),
(5, 18, NULL, 17),
(5, 19, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `busID` int(11) NOT NULL,
  `routeID` int(11) NOT NULL,
  `shiftstart` datetime NOT NULL,
  `shiftend` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleID`, `employeeID`, `busID`, `routeID`, `shiftstart`, `shiftend`) VALUES
(1, 3, 6, 3, '2017-11-16 08:00:00', '2017-11-16 16:00:00'),
(2, 6, 17, 1, '2017-11-16 08:00:00', '2017-11-16 16:00:00'),
(3, 10, 15, 5, '2017-11-16 08:00:00', '2017-11-16 16:00:00'),
(4, 12, 11, 2, '2017-11-16 08:00:00', '2017-11-16 16:00:00'),
(5, 18, 2, 4, '2017-11-16 08:00:00', '2017-11-16 16:00:00'),
(6, 28, 3, 2, '2017-11-16 08:00:00', '2017-11-16 16:00:00'),
(7, 29, 4, 5, '2017-11-16 08:00:00', '2017-11-16 16:00:00'),
(8, 30, 12, 3, '2017-11-16 08:00:00', '2017-11-16 16:00:00'),
(9, 35, 9, 1, '2017-11-16 08:00:00', '2017-11-16 16:00:00'),
(10, 37, 1, 4, '2017-11-16 08:00:00', '2017-11-16 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `stopID` int(11) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`stopID`, `lat`, `long`, `name`) VALUES
(1, 35.7605, -139.681, 'Broken Way'),
(2, 76.9987, 10.7234, 'Yellow Highway'),
(3, -11.2345, 51.9413, 'Broken Pathway'),
(4, -46.3079, 31.5211, 'Burning Street'),
(5, 72.0339, 147.012, 'White Forest Way'),
(6, 71.6628, 117.488, 'Apple Blossom Pass'),
(7, -59.0525, 166.887, 'Uhr Street'),
(8, -72.762, 25.1028, 'Greq Way'),
(9, 58.455, -40.415, 'Clowid Trail'),
(10, 67.6618, 58.9648, 'Gnoull Walk'),
(11, -74.2058, 83.189, 'Isolated Way'),
(12, 63.2301, -125.331, 'Mapleleaf Path'),
(13, 25.7372, 17.6332, 'Red Comet Trail'),
(14, -61.1514, 39.3609, 'Lost Dragon Passage'),
(15, 46.5705, -11.4784, 'Ethereal Highway'),
(16, 9.78422, 23.3454, 'Quiet Street\r'),
(17, 76.9388, 61.7037, 'Trart Road\r'),
(18, 54.0403, 35.647, 'Stresh Route'),
(19, 50.8834, -49.5884, 'Zovaln Alley'),
(20, 15.2704, -122.562, 'Curamm Trail');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerfavorites`
--
ALTER TABLE `customerfavorites`
  ADD PRIMARY KEY (`userID`,`routeID`),
  ADD KEY `routeID_idx` (`routeID`),
  ADD KEY `userID_idx` (`userID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `fleet`
--
ALTER TABLE `fleet`
  ADD PRIMARY KEY (`busID`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenanceID`),
  ADD KEY `employeeID_idx` (`employeeID`),
  ADD KEY `busID_idx` (`busID`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`routeID`);

--
-- Indexes for table `routesequence`
--
ALTER TABLE `routesequence`
  ADD PRIMARY KEY (`routeID`,`stopID`),
  ADD KEY `stopID_idx` (`stopID`),
  ADD KEY `routeID_idx` (`routeID`),
  ADD KEY `prevStopID_idx` (`prevStop`),
  ADD KEY `nextStopID_idx` (`nextStop`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `routeID_idx` (`routeID`),
  ADD KEY `busID_idx` (`busID`),
  ADD KEY `employeeID_idx` (`employeeID`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`stopID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `fleet`
--
ALTER TABLE `fleet`
  MODIFY `busID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `routeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `stopID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerfavorites`
--
ALTER TABLE `customerfavorites`
  ADD CONSTRAINT `favoriteRouteID` FOREIGN KEY (`routeID`) REFERENCES `routes` (`routeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `customers` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `fleetID` FOREIGN KEY (`busID`) REFERENCES `fleet` (`busID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mechanicID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `routesequence`
--
ALTER TABLE `routesequence`
  ADD CONSTRAINT `currentStopID` FOREIGN KEY (`stopID`) REFERENCES `stops` (`stopID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nextStopID` FOREIGN KEY (`nextStop`) REFERENCES `stops` (`stopID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prevStopID` FOREIGN KEY (`prevStop`) REFERENCES `stops` (`stopID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `routeID` FOREIGN KEY (`routeID`) REFERENCES `routes` (`routeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `scheduledBusID` FOREIGN KEY (`busID`) REFERENCES `fleet` (`busID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduledRouteID` FOREIGN KEY (`routeID`) REFERENCES `routes` (`routeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduledSriverID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
