-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 24, 2017 at 09:15 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hair_salon`
--
CREATE DATABASE IF NOT EXISTS `hair_salon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hair_salon`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `stylist_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `contact_info`, `stylist_id`) VALUES
(8, 'Tammy Smith', '666-1212', 3),
(9, 'John Smith', '666-1234', 3),
(10, 'Mike Williams', '555-2323', 3),
(11, 'Florence Nightingale', '555-4242', 3),
(12, 'Lesley Jakes', '666-3434', 4),
(13, 'Wilma Flintstone', '111-9999', 4),
(14, 'Betty Rubble', '111-8989', 4),
(15, 'Hope Springs', '555-7770', 5),
(16, 'Marsha Little', '666-2121', 5),
(17, 'Marty O\'Henry', '333-5656', 5);

-- --------------------------------------------------------

--
-- Table structure for table `stylists`
--

DROP TABLE IF EXISTS `stylists`;
CREATE TABLE `stylists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stylists`
--

INSERT INTO `stylists` (`id`, `name`, `contact_info`) VALUES
(3, 'Sugar Jones', '222-1234'),
(4, 'Joe Marks', '333-1212'),
(5, 'Jane Star', '555-3232');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stylists`
--
ALTER TABLE `stylists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `stylists`
--
ALTER TABLE `stylists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
