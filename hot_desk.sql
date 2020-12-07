-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 11:35 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hot_desk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `lessor`
--

CREATE TABLE `lessor` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `companyRegNo` int(6) NOT NULL,
  `contactNo` int(10) NOT NULL,
  `address` longtext NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(30) NOT NULL,
  `bankDetails` longtext NOT NULL,
  `idCopy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessor`
--

INSERT INTO `lessor` (`id`, `firstName`, `lastName`, `companyName`, `companyRegNo`, `contactNo`, `address`, `email`, `password`, `bankDetails`, `idCopy`) VALUES
(1, 'goldwin', 'fana', 'Azuka', 1235, 610218977, '477 sisulu street', 'gd@gmail.com', '1234@Abc', '4455 ddhjajds ', NULL),
(2, 'goldwin', 'fana', 'Azuka', 1235, 610218977, '477 sisulu street', 'goldwinfana5@gmail.com', '1234@Abc', '4455 ddhjajds ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `space`
--

CREATE TABLE `space` (
  `id` int(11) NOT NULL,
  `address` longtext NOT NULL,
  `image` varchar(900) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(5) NOT NULL,
  `salary` float NOT NULL,
  `lessor_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `space`
--

INSERT INTO `space` (`id`, `address`, `image`, `type`, `size`, `salary`, `lessor_id`, `status_id`, `from`, `to`) VALUES
(1, '477 sisulu street', 'WhatsApp Image 2020-12-02 at 14.26.53.jpeg', 'meeting', 5, 1500, 1, 2, '0000-00-00', '0000-00-00'),
(2, '477 sisulu street', 'new pic.png', 'hot desk', 5, 1500, 1, 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `name`) VALUES
(0, 'Pending'),
(1, 'Accepted'),
(2, 'Declined');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessor`
--
ALTER TABLE `lessor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `space`
--
ALTER TABLE `space`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lessor`
--
ALTER TABLE `lessor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `space`
--
ALTER TABLE `space`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
