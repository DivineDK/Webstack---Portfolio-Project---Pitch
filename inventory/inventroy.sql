-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 08:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `inventory`;
USE `inventory`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `d_id` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`d_id`, `description`, `quantity`, `status`, `posting_date`, `user_id`) VALUES
(2, 'qwert', 23, 1, '2024-04-03 15:28:31', 0),
(5, 'qwert', 11, 0, '2024-04-03 15:28:31', 0),
(6, '6mm k', 2, 1, '2024-04-03 15:28:31', 0),
(7, 'qwert', 23, 0, '2024-04-03 15:28:31', 0),
(11, 'Sma', 12, 1, '2024-04-05 19:53:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'Test@1234', '2016-04-04 20:31:45', '2016-04-17'),
(2, 'admin', 'admin@test.com', '*134*124#', '2022-10-03 05:49:21', '2022-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `damages`
--

CREATE TABLE `damages` (
  `id` int(11) NOT NULL,
  `device_name` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `d_id` int(255) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `model_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mac_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `serial_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `uhas_label` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remark` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `location` varchar(255) CHARACTER SET swe7 COLLATE swe7_swedish_ci NOT NULL,
  `status` varchar(255) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `sid`, `contact`, `location`, `status`, `device_name`, `date`, `remark`) VALUES
(1, 'Emmanuel Adabla', 'uhas 22244', '0200000000', '', 'Student', ' UHAS/ICT/PROJ/24/001 EPSON PROJECTER ,', '2024-02-28 15:45:28', 'Yes'),
(2, 'Test Morgan', 'uhas/323e/45', '1234567890', 'PHNH', 'Lecturer', ' UHAS/ICT/PROJ/24/001 EPSON PROJECTER ,', '2024-03-04 14:23:03', 'False'),
(3, 'Test Morgan', '6455', '0200035658', 'PHNH', 'Student', ' UHAS/ICT/PROJ/24/001 EPSON PROJECTER ,', '2024-03-04 14:30:23', 'False'),
(4, 'Emmaunuel Adabla', '6455', '0452773753', 'PHNH45', 'Staff', ' UHAS/ICT/PROJ/24/001 EPSON PROJECTER ,', '2024-03-04 14:32:06', 'Yes'),
(5, 'Emmaunuel Adabla', '6455', '0452773753', 'PHNH45788', 'Lecturer', ' UHAS/ICT/PROJ/24/001 EPSON PROJECTER ,', '2024-03-04 14:40:06', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `userIp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `loginTime`, `userIp`) VALUES
(1, 34, 'test@gmail.com', '2024-02-23 17:19:19', '::1'),
(2, 37, 'eadabla3@gmail.com', '2024-02-28 15:31:23', '10.1.132.93'),
(3, 37, 'eadabla3@gmail.com', '2024-02-28 15:32:42', '10.1.128.205'),
(4, 37, 'eadabla3@gmail.com', '2024-02-28 15:34:38', '10.1.132.93'),
(5, 34, 'test@gmail.com', '2024-03-04 12:37:14', '10.1.129.255'),
(6, 34, 'test@gmail.com', '2024-03-04 13:00:02', '::1'),
(7, 34, 'test@gmail.com', '2024-03-12 09:26:17', '10.0.4.55');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) NOT NULL DEFAULT current_timestamp(),
  `passUdateDate` varchar(45) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(34, 'Test', '', 'Test', 'others', 123456789, 'test@gmail.com', 'Test@123', '2022-10-03 04:59:15', '2022-10-03 04:59:15', '2022-10-03 04:59:15'),
(36, 'Kevin', 'Edem', 'Tsigbe', 'male', 503009048, 'kevinedem06@gmail.com', '123456yy', '2024-02-23 16:57:21', '2024-02-23 16:57:21', '2024-02-23 16:57:21'),
(37, 'Emmanuel ', '', 'Adabla', 'male', 200035658, 'eadabla3@gmail.com', 'ASDqwe', '2024-02-23 16:59:01', '2024-02-23 16:59:01', '28-02-2024 09:05:54'),
(38, 'Johnny', '', 'Hanson', 'male', 452773753, 'hansonjohnny648@gmail.com', '123456yy', '2024-02-23 17:22:24', '2024-02-23 17:22:24', '2024-02-23 17:22:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damages`
--
ALTER TABLE `damages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `damages`
--
ALTER TABLE `damages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `d_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
