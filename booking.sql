-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 06:00 PM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Aadhar` varchar(12) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Contact` varchar(15) DEFAULT NULL,
  `Check_in_date` date DEFAULT NULL,
  `Check_out_date` date DEFAULT NULL,
  `Room_Type` varchar(50) DEFAULT NULL,
  `Room_Number` int(11) DEFAULT NULL,
  `Number_of_guest` int(11) DEFAULT NULL,
  `Payment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_ID`, `Name`, `Aadhar`, `Email`, `Contact`, `Check_in_date`, `Check_out_date`, `Room_Type`, `Room_Number`, `Number_of_guest`, `Payment`) VALUES
(21, 'govind bhochiya', '123456789012', 'govind2@gmail.com', '6353792355', '2024-05-24', '2024-05-28', 'AC ROOMS', 103, 2, '8160'),
(23, 'govind bhochiya', '123456789012', 'govind2@gmail.com', '6353792355', '2024-05-23', '2024-05-31', 'AC ROOMS', 104, 2, '16320');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
