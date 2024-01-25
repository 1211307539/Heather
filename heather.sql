-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 08:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heather`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `USER_ID`) VALUES
(0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `PROP_ID` int(11) NOT NULL,
  `PROP_NAME` varchar(75) DEFAULT NULL,
  `ADVERTISER_ID` int(11) NOT NULL,
  `PROP_ADDRESS` varchar(100) DEFAULT NULL,
  `POSTCODE` int(11) DEFAULT NULL,
  `FLOOR_AREA` decimal(10,2) DEFAULT NULL,
  `ROOM_NUM` int(11) NOT NULL,
  `PROP_DESCRIPTION` varchar(100) DEFAULT NULL,
  `PROP_PRICE` decimal(10,2) DEFAULT NULL,
  `PROP_RULES` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`PROP_ID`, `PROP_NAME`, `ADVERTISER_ID`, `PROP_ADDRESS`, `POSTCODE`, `FLOOR_AREA`, `ROOM_NUM`, `PROP_DESCRIPTION`, `PROP_PRICE`, `PROP_RULES`, `image`, `status`) VALUES
(1, 'Uzumaki Residence', 4, 'Konoha Village', 1234, 1500.00, 5, 'Flat House', 1500.00, '', 'img\\naruto.jpg', 'available'),
(2, 'Going Merry', 5, 'East Blue', 1234, 14000.00, 6, 'Sharing Room', 0.00, '', 'img\\luffy.jpg', 'available'),
(4, 'Wall Maria House', 6, 'Shiganshina District', 1234, 6000.00, 5, 'tatakae', 0.00, '', 'img\\eren.jpg', 'pending'),
(13, 'Moving Castle', 7, 'Cornwall, United Kingdom', 1000, 9000.00, 15, '', 100.00, '', 'img\\howl.jpg', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USER_EMAIL` varchar(50) NOT NULL,
  `USER_PASS` varchar(50) NOT NULL,
  `USER_FNAME` varchar(50) DEFAULT NULL,
  `USER_LNAME` varchar(50) DEFAULT NULL,
  `USER_CONTACT` bigint(25) NOT NULL,
  `USER_TYPE` enum('Tenant','Advertiser','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USER_EMAIL`, `USER_PASS`, `USER_FNAME`, `USER_LNAME`, `USER_CONTACT`, `USER_TYPE`) VALUES
(1, 'tenant1@gmail.com', '123', 'Tenant', 'One', 112345678, 'Tenant'),
(2, 'advertiser1@gmail.com', '123', 'Advertiser', 'One', 122345678, 'Advertiser'),
(3, 'admin1@gmail.com', '123', 'Admin', 'One', 132345678, 'Admin'),
(4, 'Naruto@gmail.com', '123', 'Naruto', 'Uzumaki', 123, 'Advertiser'),
(5, 'Luffy@gmail.com', '123', 'Luffy', 'Monkey D', 1234, 'Advertiser'),
(6, 'eren@gmail.com', '123', 'Eren', 'Yaegar', 9876, 'Advertiser'),
(7, 'howl@gmail.com', '123', 'Howl', 'Pendragon', 12345, 'Advertiser'),
(31, 'abu@', '123', 'hdskj', 'test', 900990, 'Admin'),
(36, '111', '111', '111', '111', 111, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`PROP_ID`),
  ADD KEY `fk_advertiser` (`ADVERTISER_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USER_CONTACT` (`USER_CONTACT`),
  ADD UNIQUE KEY `USER_EMAIL` (`USER_EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `PROP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `fk_advertiser` FOREIGN KEY (`ADVERTISER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`ADVERTISER_ID`) REFERENCES `users` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
