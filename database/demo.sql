-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 06:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` text NOT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `name`, `email`, `password`, `location`, `address`) VALUES
(9, 'Admin2', 'admin@gmail.com', '$2y$10$NYCyDL5GTWPr0P75CkgTn.6WZLMmkeFPRBpy0mf8hHl0iCkzJ7kSe', 'madurai', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_persons`
--

CREATE TABLE `delivery_persons` (
  `Did` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_persons`
--

INSERT INTO `delivery_persons` (`Did`, `name`, `email`, `password`, `city`) VALUES
(6, 'test', 'test@gmail.com', '$2y$10$6goFiGRpIb3VMZ0H77WHEuDDlwZA0XVXPDSkzUyop5GRY7FIEwv0a', 'madurai');

-- --------------------------------------------------------

--
-- Table structure for table `food_donations`
--

CREATE TABLE `food_donations` (
  `Fid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `food` varchar(50) NOT NULL,
  `type` text NOT NULL,
  `category` text NOT NULL,
  `classification` varchar(20) DEFAULT NULL,
  `quantity` text NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `phoneno` varchar(25) NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `delivery_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_donations`
--

INSERT INTO `food_donations` (`Fid`, `name`, `email`, `food`, `type`, `category`, `classification`, `quantity`, `date`, `address`, `location`, `phoneno`, `assigned_to`, `delivery_by`) VALUES
(27, 'tests', 'jherietandugon@gmail.com', 'Kalabasa', '', 'bio', NULL, '50kg', '2024-08-10 21:49:36', 'Brgy. 3 Guian, E. S.', '', '0912123324', 5, NULL),
(28, 'Trexie Danco', 'test@gmail.com', 'Vegetables', '', 'bio', NULL, '100 kg', '2024-08-20 17:19:52', 'Brgy.  09 Guian, E.S.', '', '0965765646', NULL, NULL),
(29, 'asdf', 'asdf@gmail.com', 'Pechay', '', 'nonbio', NULL, '200', '2024-11-24 20:48:24', 'Bargy.8 ', '', '0909304938', NULL, NULL),
(30, 'test', 'test@gmail.com', 'test food', '', 'bio', NULL, '12', '2024-11-24 21:28:16', 'test brgy', '', '09098787878', NULL, NULL),
(31, 'test', 'test@gmail.com', 'Mcdo', '', 'bio', 'fertilizer', '100', '2025-03-20 19:17:21', 'Public Market  qwerty street', '', '09324798798', NULL, NULL),
(32, 'test', 'test@gmail.com', 'test fertilizer', '', 'bio', 'fertilizer', '12', '2025-03-20 20:06:37', 'dfdsf', '', '09788672352', NULL, NULL),
(33, 'test', 'test@gmail.com', 'test fertilizer 2', '', 'bio', 'fertilizer', '120', '2025-03-20 20:06:59', 'dfdsf', '', '09788672352', NULL, NULL),
(34, 'test', 'test@gmail.com', 'test fertilizer 2', '', 'bio', 'pet_food', '120', '2025-03-20 20:07:11', 'dfdsf', '', '09788672352', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `gender`) VALUES
(25, 'asdf', 'asdf@gmail.com', '$2y$10$jM.D49sqJW2CHqK1eZm24.DcD3AH.OOzfrGU2gzKUE0128KtgPdf.', 'female'),
(21, 'rjhel', 'jherietandugon@gmail.com', '$2y$10$P5wALb6wAiC604oI6yJ5eeptvhbGFi3tx4OqO9TSjySL.bg0Q2SbO', 'male'),
(23, 'R-jhel', 'qwerty@gmail.com', '$2y$10$HzMGdz/fz3IACRs/nXSbGOpNAmA9eBACNwbE3tsyX/ap3REvQAtiK', 'male'),
(24, 'test', 'test@gmail.com', '$2y$10$JqyaC96Wsjiix1ongH9VvO3KcK0WmOQVbbZfar4wHvDjbRtSzcrE.', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`feedback_id`, `name`, `email`, `message`) VALUES
(1, 'John Smith', 'john@example.com', 'I really enjoyed using your product!'),
(2, 'prasanna', 'bprasanna0502@gmail.com', 'good'),
(3, 'prasanna', 'bprasanna0502@gmail.com', 'liked it'),
(4, 'prasanna', 'bprasanna0502@gmail.com', 'great'),
(5, 'abi', 'bsabineshakash@gmail.com', 'great'),
(6, 'arun', 'arun26ifs@gmail.com', 'not good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `delivery_persons`
--
ALTER TABLE `delivery_persons`
  ADD PRIMARY KEY (`Did`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `food_donations`
--
ALTER TABLE `food_donations`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `delivery_persons`
--
ALTER TABLE `delivery_persons`
  MODIFY `Did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food_donations`
--
ALTER TABLE `food_donations`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
