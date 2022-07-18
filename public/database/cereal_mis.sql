-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 05:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cereal_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(12) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `province` varchar(30) NOT NULL,
  `district` varchar(90) NOT NULL,
  `sector` varchar(90) NOT NULL,
  `cell` varchar(90) NOT NULL,
  `village` varchar(90) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `password` varchar(90) NOT NULL,
  `admin_role` varchar(90) NOT NULL DEFAULT 'Agronomist' COMMENT 'Agro,LAB',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `province`, `district`, `sector`, `cell`, `village`, `gender`, `telephone`, `password`, `admin_role`, `status`, `created_at`) VALUES
(1, 'Mujawamariya', 'Jeanne', 'North', 'Musanze', 'Musanze', 'Kinigi', 'Kinigi', 'Female', '0788888888', '$2y$10$FqXeZH2MTwcqiuUJGbpPw.PhpfjzEGzzTZH0N/tP6qjBIUBhm23sy', 'Admin', 1, '2022-07-15 10:31:04'),
(2, 'Gad', 'Iradufasha', 'East', 'Gatsibo', 'Ngarama', 'Ngarama', 'Kiyovu', 'Male', '0784557411', '$2y$10$pzH.Pdi1TXvAsDO/iRIz/ObO3w3bgX0wOMcBP5NniHOjLSxV6cmgm', 'Agronomist', 1, '2022-07-15 21:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(12) NOT NULL,
  `farmer_id` int(12) NOT NULL,
  `cereal_id` int(12) NOT NULL,
  `quantity` int(10) NOT NULL,
  `season` char(2) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `app_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_id`, `farmer_id`, `cereal_id`, `quantity`, `season`, `status`, `app_date`) VALUES
(1, 2, 14, 15, 'A', 0, '2022-07-16 14:50:16'),
(2, 2, 4, 20, 'A', 1, '2022-07-16 15:57:31'),
(3, 2, 4, 15, 'A', 1, '2022-07-16 16:06:22'),
(4, 2, 8, 10, 'B', 0, '2022-07-16 16:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `cb_id` int(12) NOT NULL,
  `cb_description` text NOT NULL,
  `cereal_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cereal`
--

CREATE TABLE `cereal` (
  `cereal_id` int(12) NOT NULL,
  `cereal_name` varchar(150) NOT NULL,
  `cereal_type` varchar(100) NOT NULL,
  `cereal_price` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `land_type` varchar(100) NOT NULL,
  `season` char(4) NOT NULL,
  `rainy` tinyint(2) NOT NULL,
  `sunny` tinyint(2) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cereal`
--

INSERT INTO `cereal` (`cereal_id`, `cereal_name`, `cereal_type`, `cereal_price`, `quantity`, `land_type`, `season`, `rainy`, `sunny`, `status`, `created_at`) VALUES
(1, 'Rice', 'Brown Rice', '900', 75000000, 'Wet Land', 'A', 1, 0, 1, '2022-07-16 00:24:24'),
(2, 'Rice', 'Basmati Rice', '1000', 644000000, 'Water Area', 'B', 1, 0, 1, '2022-07-16 00:25:38'),
(3, 'Rice', 'Jasmine Rice', '780', 8900000, 'Wet Land', 'B', 1, 1, 1, '2022-07-16 00:26:22'),
(4, 'Rice', 'Black Rice', '1300', 4558965, 'Farm Land', 'B', 1, 1, 1, '2022-07-16 00:27:40'),
(5, 'Rice', 'Glutinous Rice', '860', 4700000, 'Water Area', 'A', 1, 1, 1, '2022-07-16 00:28:28'),
(6, 'Rice', 'Sushi Rice', '2000', 4700000, 'Coastal Land', 'A', 1, 0, 1, '2022-07-16 00:29:19'),
(7, 'Rice', 'Rosematta Rice', '1420', 4700000, 'Grass Land', 'A', 1, 1, 1, '2022-07-16 00:30:18'),
(8, 'Rice', 'Calrose', '780', 899990, 'Wet Land', 'B', 1, 0, 1, '2022-07-16 00:31:01'),
(9, 'Oats', 'Steel-cut Oats', '2000', 200000, 'Grass Land', 'B', 1, 1, 1, '2022-07-16 00:33:11'),
(10, 'Oats', 'Oatmeal', '1500', 1900000, 'Coastal Land', 'B', 1, 1, 1, '2022-07-16 00:34:59'),
(11, 'Oats', 'Rolled Oats', '3000', 220000, 'Farm Land', 'B', 0, 0, 1, '2022-07-16 00:35:50'),
(12, 'Sorghum', 'Great Millet', '400', 5900000, 'Farm Land', 'B', 1, 1, 1, '2022-07-16 00:47:43'),
(13, 'Sorghum', 'Drummondii', '500', 8900000, 'Grass Land', 'B', 1, 1, 1, '2022-07-16 00:48:40'),
(14, 'Sorghum', 'Johnson Grass', '600', 800000, 'Wet Land', 'B', 1, 1, 1, '2022-07-16 00:49:44'),
(15, 'Sorghum', 'Sorgum Dochna', '805', 7950000, 'Farm Land', 'B', 1, 1, 1, '2022-07-16 00:50:43'),
(16, 'Sorghum', 'Broom Sorghum', '1100', 900000, 'Wet Land', 'A', 1, 0, 1, '2022-07-16 00:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `farmer_id` int(12) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `province` varchar(30) NOT NULL,
  `district` varchar(90) NOT NULL,
  `sector` varchar(90) NOT NULL,
  `cell` varchar(90) NOT NULL,
  `village` varchar(90) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `password` varchar(90) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmer_id`, `firstname`, `lastname`, `province`, `district`, `sector`, `cell`, `village`, `gender`, `telephone`, `password`, `status`, `created_at`) VALUES
(1, 'Aimee', 'Ihimbazwe', 'East', 'Nyagatare', 'Tumba', 'Ngarama', 'Kigarama', 'Female', '0725200635', '$2y$10$mKrXjBb46c8HonZOR6rU6ubZjThfTMKdCFOCTniDhQdgS97w7QkP6', 1, '2022-07-10 15:14:37'),
(2, 'Mugisha', 'Dave', 'East', 'Huye', 'Tumba', 'Tumba', 'Kigarama', 'Male', '0786509770', '$2y$10$ysqj90sbqLL9qyqzLv.XNerATyUn.NkxdUEJN0gBg79HMx2AXzYk6', 1, '2022-07-10 18:44:33'),
(3, 'Peter', 'Pan', 'East', 'Kayonza', 'Rukara', 'Video', 'Video', 'Male', '0780808090', '$2y$10$CIMnXD0ZVSgwkSvb9OdOU.cumdFIZfc6jaUxdF2fA5FcdbyCpGvsG', 0, '2022-07-11 01:07:55'),
(4, 'Mutoni', 'Peace', 'Kigali City', 'Gasabo', 'Jali', 'Ngiryi', 'Agasharu', 'Female', '0788008800', '$2y$10$FPDwwsPYUXJnW7TUtFIwPOmebSiQ6D62cvShDdke/v.53mzNUCGCG', 1, '2022-07-11 08:34:36'),
(6, 'Gabriel', 'Dave', 'West', 'Nyabihu', 'Tumba', 'Tumba', 'Kiyovu', 'Other', '0788008855', '$2y$10$tuR6.ngjQCrQ3geUm4J.IOUqIZv6OVql8AvygtHgQmmn8A/CryKzS', 0, '2022-07-11 08:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `harvest`
--

CREATE TABLE `harvest` (
  `harvest_id` int(12) NOT NULL,
  `farmer_id` int(12) NOT NULL,
  `cereal_id` int(12) NOT NULL,
  `season` char(2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `current_price` double NOT NULL,
  `outcome` varchar(20) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `harvest_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harvest`
--

INSERT INTO `harvest` (`harvest_id`, `farmer_id`, `cereal_id`, `season`, `quantity`, `current_price`, `outcome`, `status`, `harvest_date`) VALUES
(1, 2, 11, 'A', 3000, 600, 'High', 0, '2022-07-16 19:11:32'),
(2, 2, 8, 'B', 500, 540, 'Medium', 1, '2022-07-16 19:17:17'),
(3, 2, 14, 'C', 120, 300, 'High', 0, '2022-07-17 09:31:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `Farmer ID` (`farmer_id`),
  ADD KEY `Cereal ID` (`cereal_id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`cb_id`),
  ADD KEY `Cereal FK` (`cereal_id`);

--
-- Indexes for table `cereal`
--
ALTER TABLE `cereal`
  ADD PRIMARY KEY (`cereal_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `harvest`
--
ALTER TABLE `harvest`
  ADD PRIMARY KEY (`harvest_id`),
  ADD KEY `harvest_ibfk_1` (`farmer_id`),
  ADD KEY `cereal_ibfk_1` (`cereal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `app_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `cb_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cereal`
--
ALTER TABLE `cereal`
  MODIFY `cereal_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `farmer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `harvest`
--
ALTER TABLE `harvest`
  MODIFY `harvest_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `Cereal ID` FOREIGN KEY (`cereal_id`) REFERENCES `cereal` (`cereal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Farmer ID` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `benefits`
--
ALTER TABLE `benefits`
  ADD CONSTRAINT `Cereal FK` FOREIGN KEY (`cereal_id`) REFERENCES `cereal` (`cereal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `harvest`
--
ALTER TABLE `harvest`
  ADD CONSTRAINT `cereal_ibfk_1` FOREIGN KEY (`cereal_id`) REFERENCES `cereal` (`cereal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harvest_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
