-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 05:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `costing`
--

CREATE TABLE `costing` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_qty` varchar(255) NOT NULL,
  `required_qty` int(11) NOT NULL,
  `total_per_kg` float NOT NULL,
  `total` float NOT NULL,
  `total_product_qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `shortage` int(11) NOT NULL,
  `total_amount_paid` int(11) NOT NULL,
  `amount_per_kg` float NOT NULL,
  `quality` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cargo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_name`, `product_qty`, `total_qty`, `shortage`, `total_amount_paid`, `amount_per_kg`, `quality`, `category`, `cargo`) VALUES
(1, 'Apple', 500, 53, 2, 32100, 66.16, 1, 'punjab', 320),
(2, 'cherry', 2000, 1548, 2, 50000, 28.83, 1, 'gujrat', 6500),
(3, 'mango', 650, 322, 12, 32000, 59.44, 1, 'multan', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile_number`, `address`, `role`) VALUES
(1, 'user', 'user@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0123456789', 'abcd', 'admin'),
(2, 'Ali', 'ali@gmail.com', 'ali', '1231231', 'fdsa ffd,sdfgdf', 'employee'),
(3, 'Aqib', 'ahmed@gmail.com', 'aqib', '34423223', 'jokin3n3io3io', 'employee'),
(4, 'ali', 'ali@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', '', 'employee'),
(5, 'Asim', 'asim@gmail.com', '097d2f1bc2a7b00f7135e712e710e8e3', '', '', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costing`
--
ALTER TABLE `costing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
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
-- AUTO_INCREMENT for table `costing`
--
ALTER TABLE `costing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
