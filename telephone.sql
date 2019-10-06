-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 01:59 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telephone`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `landlinenumber` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `createddate` datetime NOT NULL,
  `user_email_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `middlename`, `lastname`, `email`, `mobilenumber`, `landlinenumber`, `notes`, `photo`, `ipaddress`, `createddate`, `user_email_address`) VALUES
(1, 'Asmita', 'Anand', 'Kolambkar', 'kolambkarashutosh@gmail.com', '9594222959', '02224312422', 'sister', '2C05D379.tmp', '127.0.0.1', '2019-10-06 15:05:34', 'kolambkarashutosh@gmail.com'),
(2, 'Ashana', 'Anand', 'Kolambkar', 'kolambkarashutosh@gmail.com', '8108298568', '24312422', 'Aai', '2C05D379.tmp', '127.0.0.1', '2019-10-06 15:11:01', 'kolambkarashutosh@gmail.com'),
(3, 'Anand', 'M.', 'Kolambkar', 'kolambkarashutosh@gmail.com', '9594222707', '02224312422', 'papa', '49.jpg', '127.0.0.1', '2019-10-06 16:00:11', 'kolambkarashutosh@gmail.com'),
(4, 'Ashutosh', 'Anand', 'Salim', 'kolambkarashutosh@gmail.com', '751987456321', '+918692805802', 'papa', '14.jpg', '127.0.0.1', '2019-10-06 16:01:53', 'kolambkarashutosh@gmail.com'),
(5, 'Ashutosh', 'Anand', 'Salim', 'kolambkarashutosh@gmail.com', '751987456321', '+918692805802', 'papa', '14.jpg', '127.0.0.1', '2019-10-06 16:02:42', 'kolambkarashutosh@gmail.com'),
(6, 'Ashutosh', 'Anand', 'Salim', 'kolambkarashutosh@gmail.com', '751987456321', '+918692805802', 'papa', '14.jpg', '127.0.0.1', '2019-10-06 16:03:17', 'kolambkarashutosh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `createddate` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `password`, `hash`, `ipaddress`, `createddate`, `status`) VALUES
(1, 'Ashutosh Kolambkar', 'kolambkarashutosh@gmail.com', '8692805802', '$2y$10$ZAzrjvjJc6tp45Tj00BcsOYUioDNQ.G7XNAGGr.RhqCd6vkYxcoU2', '3a066bda8c96b9478bb0512f0a43028c', '127.0.0.1', '2019-10-06 12:52:57', 0),
(2, 'Asmita Kolambkar', 'asmitakolambkar15@gmail.com', '9594222959', '$2y$10$guQ10Tv5Y5YRnu/8217eTORlqzuBkXVG96GVNW7pRQoTBPyuaXtKy', '182be0c5cdcd5072bb1864cdee4d3d6e', '127.0.0.1', '2019-10-06 16:31:41', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
