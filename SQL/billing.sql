-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 05:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `mode` varchar(10) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_addr` varchar(255) NOT NULL,
  `cust_mob` varchar(10) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `prod_code` varchar(255) NOT NULL,
  `prod_quantity` int(11) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `bill_id`, `mode`, `cust_name`, `cust_addr`, `cust_mob`, `cust_email`, `prod_code`, `prod_quantity`, `prod_price`, `date`) VALUES
(98, 2, 5, 'Cash', 'ddd', 'dsdsdsds', 'sddsdsds', 'dsdsdsds@gmail', '', 10, 0, '2021-11-15 10:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gst` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `email`, `mobile`, `password`, `gst`) VALUES
(1, 'KC Store', 'kalyanivisw@gmail.com', '8374896219', '123456', '22AAAAA0000A1Z5'),
(2, 'Charan Store', 'saicharanvenna@gmail.com', '9963392871', 'Saikarthik123', '22AAAAA0000A1Z4');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `code`, `prod_name`, `price`) VALUES
(1, 1, 'PEP', 'PEPSI', 20),
(2, 1, 'SPRT', 'SPRITE', 20),
(3, 1, 'LYS', 'LAYS', 10),
(4, 1, 'LNB', 'LONG NOTEBOOK', 60),
(5, 2, 'SILK', 'Dairy Milk Silk', 100),
(6, 2, 'DTLS', 'Dettol Sanitizer', 35),
(7, 2, 'BTRS', 'Cello Batteries', 15),
(8, 2, 'NCS', 'Nachos', 30),
(9, 1, 'NIVFW', 'Nivea Facewash', 80),
(10, 1, 'BSL', 'Bisleri Water Bottle', 25),
(11, 1, 'CLG', 'Colgate Toothpaste', 45),
(12, 2, 'PKRFT', 'Paperkraft A4 Bundle', 300),
(13, 2, 'SFT', 'Soft Touch Napkins', 170),
(14, 1, 'HRL', 'Horlicks Powder', 220),
(15, 1, 'PRST', 'Parachute Hair Oil', 40),
(16, 2, 'WSTN', 'Wild Stone Body Spray', 210),
(17, 2, 'AMZ', 'Amazon Spice Jars', 215),
(18, 2, 'CBG', 'IKEA Carry Bags', 70),
(19, 1, 'SKB', 'Skybags Laptop Bag', 2500),
(20, 1, 'HLDR', 'Haldirams Dryfruit Mix', 1700),
(21, 2, 'PEN', 'Cello Pen', 5),
(22, 3, 'PPI', 'Pepsi', 20),
(23, 2, 'TB', 'TextBook', 200),
(24, 2, 'LAP', 'LAPTOP', 250000),
(25, 2, 'KRK', 'Kurkure', 20),
(26, 2, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
