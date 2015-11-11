-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 05:05 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Pin` varchar(45) NOT NULL,
  `PhoneNo` varchar(45) NOT NULL,
  `Total` double NOT NULL,
  `Pizza_Size` varchar(255) NOT NULL,
  `Crust_Type` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `FirstName`, `LastName`, `Address`, `City`, `Email`, `Pin`, `PhoneNo`, `Total`, `Pizza_Size`, `Crust_Type`, `user_id`) VALUES
(8, 'ds', 'sd', 'sdf', 'sdf', 'ded@df', '222', '222', 0.5, 'small', 'handtossed', 1),
(10, 'sd', 'as', 'a', 'd', 'SD@DF.DF', '222', '333', 6, 'small', 'handtossed', 1),
(11, 'sd', 'as', 'a', 'd', 'SD@DF.DF', '222', '2269223232', 5, 'small', 'handtossed', 1),
(12, 'sd', 'as', 'a', 'd', 'SD@DF.DF', '222', '2269223232', 6, 'small', 'handtossed', 1),
(13, 'sd', 'as', 'a', 'd', 'SD@DF.DF', '222', '2269223232', 7.5, 'small', 'handtossed', 1),
(14, 'vdfv', 'sdfs', 'dsf', 'sdfsd', '33', '22', '333', 6, 'small', 'handtossed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'simran', '$2y$10$eBAe1gzKfhPM.1t6e9Q3fukjriK4Yw.JOjuYqM4tI7NFV09DOMyUK', 'admin', NULL, NULL),
(2, 'simi', '$2y$10$O5cFJI5EQJAgrwhaz8jaJeiBVaVcR2B.o8lkToqowlNZU.QTmp8Fe', 'author', NULL, NULL),
(3, 'simi2', '$2y$10$Za3ppQ/V5OJbC.572.ShDeC9pnkyzdkWIPFq8TX5cgYAzmEQVoLyW', 'author', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
