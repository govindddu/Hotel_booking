-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 10:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_id` int(11) NOT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Room_type` varchar(50) DEFAULT NULL,
  `Price` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_id`, `Status`, `Room_type`, `Price`) VALUES
(101, 'Available', 'DELUXE', '8000'),
(102, 'Available', 'DELUXE', '8000'),
(103, 'Available', 'DELUXE', '8000'),
(104, 'Available', 'DELUXE', '8000'),
(105, 'Available', 'DELUXE', '8000'),
(106, 'Available', 'DELUXE', '8000'),
(107, 'Available', 'DELUXE', '8000'),
(108, 'Available', 'DELUXE', '8000'),
(109, 'Available', 'DELUXE', '8000'),
(110, 'Available', 'DELUXE', '8000'),
(111, 'Available', 'LUXURY', '5000'),
(112, 'Available', 'LUXURY', '5000'),
(113, 'Available', 'LUXURY', '5000'),
(114, 'Available', 'LUXURY', '5000'),
(115, 'Available', 'LUXURY', '5000'),
(116, 'Available', 'LUXURY', '5000'),
(117, 'Available', 'LUXURY', '5000'),
(118, 'Available', 'LUXURY', '5000'),
(119, 'Available', 'LUXURY', '5000'),
(120, 'Available', 'LUXURY', '5000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
