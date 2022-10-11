-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 11:23 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apnakata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(45) NOT NULL,
  `adminEmail` varchar(45) NOT NULL,
  `adminPassword` varchar(45) NOT NULL,
  `adminStatus` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminId`, `adminName`, `adminEmail`, `adminPassword`, `adminStatus`) VALUES
(3, 'shayan ahmad', 'shayan@gmail.com', 'shayan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentcit`
--

CREATE TABLE `tblpaymentcit` (
  `paymentIdCit` int(11) NOT NULL,
  `paymentBRTCit` varchar(45) NOT NULL,
  `paymentLocalCit` varchar(45) NOT NULL,
  `paymentDateCit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentdotcom`
--

CREATE TABLE `tblpaymentdotcom` (
  `paymentIdDotCom` int(11) NOT NULL,
  `paymentBRTDotCom` varchar(45) NOT NULL,
  `paymentLocalDotCom` varchar(45) NOT NULL,
  `paymentDateDotCom` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpaymentdotcom`
--

INSERT INTO `tblpaymentdotcom` (`paymentIdDotCom`, `paymentBRTDotCom`, `paymentLocalDotCom`, `paymentDateDotCom`) VALUES
(1, '30', '70', '2022-06-13'),
(2, '30', '70', '2022-06-14'),
(3, '30', '70', '2022-06-15'),
(4, '30', '70', '2022-06-16'),
(5, '50', '70', '2022-06-17'),
(6, '50', '70', '2022-06-20'),
(7, '50', '70', '2022-06-21'),
(9, '50', '70', '2022-06-23'),
(10, '60', '70', '2022-06-24'),
(11, '60', '70', '2022-06-27'),
(12, '60', '70', '2022-06-28'),
(13, '60', '70', '2022-06-29'),
(14, '60', '60', '2022-06-30'),
(15, '60', '70', '2022-07-01'),
(16, '60', '70', '2022-07-04'),
(17, '60', '70', '2022-07-05'),
(18, '60', '70', '2022-07-06'),
(19, '60', '70', '2022-07-14'),
(20, '60', '50', '2022-07-15'),
(21, '300', '70', '2022-07-18'),
(22, '0', '70', '2022-07-19'),
(23, '0', '60', '2022-07-20'),
(24, '0', '70', '2022-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentuni`
--

CREATE TABLE `tblpaymentuni` (
  `paymentId` int(11) NOT NULL,
  `paymentBRT` varchar(45) NOT NULL,
  `paymentLocal` varchar(45) NOT NULL,
  `paymentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tblpaymentcit`
--
ALTER TABLE `tblpaymentcit`
  ADD PRIMARY KEY (`paymentIdCit`);

--
-- Indexes for table `tblpaymentdotcom`
--
ALTER TABLE `tblpaymentdotcom`
  ADD PRIMARY KEY (`paymentIdDotCom`);

--
-- Indexes for table `tblpaymentuni`
--
ALTER TABLE `tblpaymentuni`
  ADD PRIMARY KEY (`paymentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpaymentcit`
--
ALTER TABLE `tblpaymentcit`
  MODIFY `paymentIdCit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpaymentdotcom`
--
ALTER TABLE `tblpaymentdotcom`
  MODIFY `paymentIdDotCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblpaymentuni`
--
ALTER TABLE `tblpaymentuni`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
