-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 04:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proonebadmintoncentre`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_content`
--

CREATE TABLE `about_us_content` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us_content`
--

INSERT INTO `about_us_content` (`id`, `content`) VALUES
(1, 'Pro One Badminton Centre is your ultimate destination for all things badminton. From beginners to seasoned players, we offer a welcoming environment, top-notch facilities, and expert coaching. Join our vibrant badminton community and pursue your dreams with us. We\'re dedicated to promoting the sport we love. Welcome to excellence at Pro One Badminton Centre!');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
('prooneadmin', 'proonebcadm1n@gmail.com', '$2y$10$Z4I4/moJ79lFyMMuDWg3peCTASOnZidKDf0r.8w7KzNq2mECbTaX2');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_reference` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `hours` int(100) NOT NULL,
  `courtID` varchar(10) NOT NULL,
  `courtName` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `status` enum('booked','using','passed') NOT NULL,
  `receipt` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_reference`, `name`, `email`, `phonenumber`, `day`, `date`, `start_time`, `end_time`, `hours`, `courtID`, `courtName`, `price`, `status`, `receipt`) VALUES
('17000142543318', 'DavidG', 'davidgohtw@gmail.com', '0176503922', 'Thursday', '2023-11-16', '12:10:00', '13:10:00', 1, 'C1', 'Court 1', 20, 'booked', 'https://pay.stripe.com/invoice/acct_1OB5ihItcjCbilux/test_YWNjdF8xT0I1aWhJdGNqQ2JpbHV4LF9QMFppcHRZM1lHSGtKczBsNTA0OHlkUFdwZHVUS2JKLDkwNTU1MDc00200Iu369lxf/pdf?s=ap'),
('17000151611842', 'Syria', 'davidgohtw98@gmail.com', '0176503922', 'Thursday', '2023-11-16', '13:10:00', '14:10:00', 1, 'C1', 'Court 1', 20, 'booked', 'https://pay.stripe.com/invoice/acct_1OB5ihItcjCbilux/test_YWNjdF8xT0I1aWhJdGNqQ2JpbHV4LF9QMFp5dGJ4bmx5VTdPaTloTEJGZ0tJU2VaSG9qVTFNLDkwNTU1OTg50200fFENQQ7t/pdf?s=ap'),
('17000153058355', 'Syria', 'davidgohtw98@gmail.com', '0176503922', 'Wednesday', '2023-11-15', '10:30:00', '11:30:00', 1, 'C1', 'Court 1', 20, 'using', 'https://pay.stripe.com/invoice/acct_1OB5ihItcjCbilux/test_YWNjdF8xT0I1aWhJdGNqQ2JpbHV4LF9QMGEwVDVKMkZoTWZsQ21zQ2pVVUl1SmI1QXA1T2EyLDkwNTU2MTI00200X5ehSZvo/pdf?s=ap');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_content`
--

CREATE TABLE `contact_us_content` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us_content`
--

INSERT INTO `contact_us_content` (`id`, `content`) VALUES
(1, 'Feel free to contact us and drop a visit to our center using the Google Map provided.<br>\r\n            Got any complaints? Feel free to send a message in our message box.');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `courtID` varchar(100) NOT NULL,
  `courtName` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`courtID`, `courtName`) VALUES
('C1', 'Court 1'),
('C2', 'Court 2'),
('C3', 'Court 3'),
('C4', 'Court 4'),
('C5', 'Court 5'),
('C6', 'Court 6'),
('C7', 'Court 7'),
('C8', 'Court 8');

-- --------------------------------------------------------

--
-- Table structure for table `court_availability`
--

CREATE TABLE `court_availability` (
  `id` int(50) NOT NULL,
  `CourtID` varchar(5) NOT NULL,
  `courtName` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('booked','using','passed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `court_availability`
--

INSERT INTO `court_availability` (`id`, `CourtID`, `courtName`, `name`, `email`, `date`, `time`, `end_time`, `status`) VALUES
(0, 'C1', 'Court 1', 'DavidG', 'davidgohtw98@gmail.com', '2023-11-09', '12:59:00', '14:59:00', 'using');

-- --------------------------------------------------------

--
-- Table structure for table `court_rate`
--

CREATE TABLE `court_rate` (
  `id` int(11) NOT NULL,
  `day_of_week` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `price_minutes` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `court_rate`
--

INSERT INTO `court_rate` (`id`, `day_of_week`, `start_time`, `end_time`, `price`, `price_minutes`) VALUES
(1, 1, '10:00:00', '18:00:00', '20.00', '0.33'),
(2, 1, '18:00:00', '20:30:00', '25.00', '0.41'),
(3, 1, '20:30:00', '23:59:00', '30.00', '0.50'),
(4, 2, '10:00:00', '18:00:00', '20.00', '0.33'),
(5, 2, '18:00:00', '20:30:00', '25.00', '0.41'),
(6, 2, '20:30:00', '23:59:00', '30.00', '0.50'),
(7, 3, '10:00:00', '18:00:00', '20.00', '0.33'),
(8, 3, '18:00:00', '20:30:00', '25.00', '0.41'),
(9, 3, '20:30:00', '23:59:00', '30.00', '0.50'),
(10, 4, '10:00:00', '18:00:00', '20.00', '0.33'),
(11, 4, '18:00:00', '20:30:00', '25.00', '0.41'),
(12, 4, '20:30:00', '23:59:00', '30.00', '0.50'),
(13, 5, '10:00:00', '18:00:00', '20.00', '0.33'),
(14, 5, '18:00:00', '20:30:00', '25.00', '0.41'),
(15, 5, '20:30:00', '23:59:00', '30.00', '0.50'),
(16, 6, '09:00:00', '23:59:00', '20.00', '0.33'),
(17, 7, '09:00:00', '23:59:00', '20.00', '0.33');

-- --------------------------------------------------------

--
-- Table structure for table `court_rates`
--

CREATE TABLE `court_rates` (
  `id` int(11) NOT NULL,
  `dayOfWeek` varchar(1000) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `court_rates`
--

INSERT INTO `court_rates` (`id`, `dayOfWeek`, `rate`) VALUES
(21, 'Monday - Friday (10 am - 6 pm)', '20.00'),
(22, 'Monday - Friday (6 pm - 8:30 pm)', '25.00'),
(25, 'Monday - Friday (8:30 pm - 12:30 am)', '30.00'),
(26, 'Saturday (9 am - 1:30 am)', '20.00'),
(28, 'Sunday (9 am - 12 am)', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `email`, `phonenumber`, `password`) VALUES
('DavidG', 'davidgohtw@gmail.com', '0176503922', '$2y$10$ndSHLip5Q.OxEKl3WGTLq.VQFXjv1EPtuJB8whFyxGPJXrFkf58OO'),
('Syria', 'davidgohtw98@gmail.com', '0176503922', '$2y$10$msxzVla.Xa93gI6VICo.J.HzzoYR42F0R.x6fCX2r01plXKsK0fLy');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`username`, `email`, `phonenumber`, `password`) VALUES
('staff', 'staff@gmail.com', '0123456789', '$2y$10$3JZZDAb9NdvoFq/7cR3BZOJONOXsiJzoAZCp/qQAHrJGxVyWwDYuq');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  `userType` varchar(15) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `verified_email` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `phonenumber`, `reset_token_hash`, `reset_token_expires_at`, `userType`, `verification_code`, `verified_email`) VALUES
(1, 'prooneadmin', 'proonebcadm1n@gmail.com', '$2y$10$Rj7oEQYjSEw4fREjJPWjS.RS6jnTg3EbzaaoMrUU7kgXgEUweTapO', '60340238668', NULL, NULL, 'admin', '000000', 'verified'),
(2, 'staff', 'staff@gmail.com', '$2y$10$TqjyoDieh2l60alRDYEk4uHOInhGrSYeycXTzwI2a1/4PMDiIIgjW', '60340238668', NULL, NULL, 'staff', '000000', 'verified'),
(92, 'DavidG', 'davidgohtw@gmail.com', '$2y$10$rSVA0.HAb2DQsKO61SEtyuMoMNR/bgtLR/GQYrby6gBsXI2aCU0tO', '0176503922', 'f64f4550487f50c8274b696f7d830e421ba6eb053872851daeab1f551e7600b6', '2023-11-14 23:29:42', 'customer', '776469', 'verified'),
(102, 'Syria', 'davidgohtw98@gmail.com', '$2y$10$yjXtmmtoNzcwl4jMYNGR.OkipcUXcBdKeOfl4Lrbt/qceepNDqKVq', '0176503922', NULL, NULL, 'customer', '570204', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_content`
--
ALTER TABLE `about_us_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_reference`);

--
-- Indexes for table `contact_us_content`
--
ALTER TABLE `contact_us_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`courtID`);

--
-- Indexes for table `court_availability`
--
ALTER TABLE `court_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_rate`
--
ALTER TABLE `court_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_rates`
--
ALTER TABLE `court_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_content`
--
ALTER TABLE `about_us_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_content`
--
ALTER TABLE `contact_us_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `court_rate`
--
ALTER TABLE `court_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `court_rates`
--
ALTER TABLE `court_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
