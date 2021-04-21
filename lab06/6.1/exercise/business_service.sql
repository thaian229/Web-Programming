-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 08:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `biz_categories`
--

CREATE TABLE `biz_categories` (
  `Business_ID` int(11) NOT NULL,
  `Category_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biz_categories`
--

INSERT INTO `biz_categories` (`Business_ID`, `Category_ID`) VALUES
(5, 'AUTO'),
(5, 'FISH'),
(6, 'FISH'),
(6, 'GAME'),
(7, 'AUTO'),
(7, 'GAME');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `Business_ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`Business_ID`, `Name`, `Address`, `City`, `Telephone`, `URL`) VALUES
(5, 'Thai An Corp.', 'Vuong Thua Vu', 'Hanoi', '0966711928', 'facebook.com/thaian229'),
(6, 'An Game Studio', 'Quang Trung', 'Hanoi', '0123456789', 'game.com/thaian'),
(7, 'Racing Co.', 'Dong Da', 'Ha Noi', '9876543210', 'racing.co.com.vn');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_ID` varchar(20) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_ID`, `Title`, `Description`) VALUES
('AUTO', 'Automotive Parts and Supplies', 'Accessorires for your car'),
('FISH', 'Seafood Stores and Restaurants', 'Place to get fishs'),
('GAME', 'Game and Entertainment', 'All entertainment system for ya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biz_categories`
--
ALTER TABLE `biz_categories`
  ADD PRIMARY KEY (`Business_ID`,`Category_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`Business_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `Business_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biz_categories`
--
ALTER TABLE `biz_categories`
  ADD CONSTRAINT `fk_business` FOREIGN KEY (`Business_ID`) REFERENCES `businesses` (`Business_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
