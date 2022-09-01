-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 07:26 PM
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
  `admin_role` varchar(90) NOT NULL DEFAULT 'Agrodealer' COMMENT 'Agro users',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `province`, `district`, `sector`, `cell`, `village`, `gender`, `telephone`, `password`, `admin_role`, `status`, `created_at`) VALUES
(1, 'Mujawamariya', 'Jeanne', 'North', 'Musanze', 'Musanze', 'Kinigi', 'Kinigi', 'Female', '0788888888', '$2y$10$FqXeZH2MTwcqiuUJGbpPw.PhpfjzEGzzTZH0N/tP6qjBIUBhm23sy', 'Admin', 1, '2022-07-15 10:31:04'),
(2, 'Gad', 'Iradufasha', 'East', 'Gatsibo', 'Ngarama', 'Ngarama', 'Kiyovu', 'Male', '0784557411', '$2y$10$pzH.Pdi1TXvAsDO/iRIz/ObO3w3bgX0wOMcBP5NniHOjLSxV6cmgm', 'Agrodealer', 1, '2022-07-15 21:00:39');

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
(2, 2, 4, 20, 'A', 0, '2022-07-16 15:57:31'),
(3, 7, 4, 15, 'A', 1, '2022-07-16 16:06:22'),
(4, 2, 8, 10, 'B', 0, '2022-07-16 16:14:49'),
(5, 1, 7, 100, 'B', 0, '2022-08-31 10:46:51'),
(6, 1, 10, 56, 'B', 0, '2022-08-31 20:18:18'),
(7, 4, 15, 54, 'B', 1, '2022-08-31 20:31:23'),
(8, 7, 9, 50, 'B', 0, '2022-09-01 17:42:49'),
(9, 8, 2, 85, 'C', 1, '2022-09-01 19:00:17');

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
(2, 'Rice', 'Basmati Rice', '1000', 643999915, 'Water Area', 'B', 1, 0, 1, '2022-07-16 00:25:38'),
(3, 'Rice', 'Jasmine Rice', '780', 8900000, 'Wet Land', 'B', 1, 1, 1, '2022-07-16 00:26:22'),
(4, 'Rice', 'Black Rice', '1300', 4558965, 'Farm Land', 'B', 1, 1, 1, '2022-07-16 00:27:40'),
(5, 'Rice', 'Glutinous Rice', '860', 4700000, 'Water Area', 'A', 1, 1, 1, '2022-07-16 00:28:28'),
(6, 'Rice', 'Sushi Rice', '2000', 4700000, 'Coastal Land', 'A', 1, 0, 1, '2022-07-16 00:29:19'),
(7, 'Rice', 'Rosematta Rice', '1420', 4699900, 'Grass Land', 'A', 1, 1, 1, '2022-07-16 00:30:18'),
(8, 'Rice', 'Calrose', '780', 899990, 'Wet Land', 'B', 1, 0, 1, '2022-07-16 00:31:01'),
(9, 'Oats', 'Steel-cut Oats', '2000', 199950, 'Grass Land', 'B', 1, 1, 1, '2022-07-16 00:33:11'),
(10, 'Oats', 'Oatmeal', '1500', 1899944, 'Coastal Land', 'B', 1, 1, 1, '2022-07-16 00:34:59'),
(11, 'Oats', 'Rolled Oats', '3000', 220000, 'Farm Land', 'B', 0, 0, 1, '2022-07-16 00:35:50'),
(12, 'Sorghum', 'Great Millet', '400', 5900000, 'Farm Land', 'B', 1, 1, 1, '2022-07-16 00:47:43'),
(13, 'Sorghum', 'Drummondii', '500', 8900000, 'Grass Land', 'B', 1, 1, 1, '2022-07-16 00:48:40'),
(14, 'Sorghum', 'Johnson Grass', '600', 800000, 'Wet Land', 'B', 1, 1, 1, '2022-07-16 00:49:44'),
(15, 'Sorghum', 'Sorgum Dochna', '805', 7949946, 'Farm Land', 'B', 1, 1, 1, '2022-07-16 00:50:43'),
(16, 'Sorghum', 'Broom Sorghum', '1100', 900000, 'Wet Land', 'A', 1, 0, 1, '2022-07-16 00:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(12) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `province_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `province_id`) VALUES
(1, 'BUGESERA', 1),
(2, 'GATSIBO', 1),
(3, 'KAYONZA', 1),
(4, 'KIREHE', 1),
(5, 'NGOMA', 1),
(6, 'NYAGATARE', 1),
(7, 'RWAMAGANA', 1),
(8, 'KARONGI', 2),
(9, 'NGORORERO', 2),
(10, 'NYABIHU', 2),
(11, 'NYAMASHEKE', 2),
(12, 'RUBAVU', 2),
(13, 'RUSIZI', 2),
(14, 'RUTSIRO', 2),
(15, 'BURERA', 3),
(16, 'GAKENKE', 3),
(17, 'GICUMBI', 3),
(18, 'MUSANZE', 3),
(19, 'RULINDO', 3),
(20, 'GISAGARA', 4),
(21, 'HUYE', 4),
(22, 'KAMONYI', 4),
(23, 'MUHANGA', 4),
(24, 'NYAMAGABE', 4),
(25, 'NYANZA', 4),
(26, 'NYARUGURU', 4),
(27, 'RUHANGO\r\n', 4),
(28, 'KICUKIRO', 5),
(29, 'GASAB0', 5),
(30, 'NYARUGENGE', 5);

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
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmer_id`, `firstname`, `lastname`, `province`, `district`, `sector`, `cell`, `village`, `gender`, `telephone`, `password`, `status`, `created_at`) VALUES
(1, 'Aimee', 'Ihimbazwe', 'East', 'Nyagatare', 'Tumba', 'Ngarama', 'Kigarama', 'Female', '0725200635', '$2y$10$mKrXjBb46c8HonZOR6rU6ubZjThfTMKdCFOCTniDhQdgS97w7QkP6', 1, '2022-07-10 15:14:37'),
(2, 'Mugisha', 'Dave', 'East', 'Huye', 'Tumba', 'Tumba', 'Kigarama', 'Male', '0786509770', '$2y$10$ysqj90sbqLL9qyqzLv.XNerATyUn.NkxdUEJN0gBg79HMx2AXzYk6', 0, '2022-07-10 18:44:33'),
(3, 'Peter', 'Pan', 'East', 'Kayonza', 'Rukara', 'Video', 'Video', 'Male', '0780808090', '$2y$10$CIMnXD0ZVSgwkSvb9OdOU.cumdFIZfc6jaUxdF2fA5FcdbyCpGvsG', 0, '2022-07-11 01:07:55'),
(4, 'Niyindora', 'Emile', 'South', 'Huye', 'Ngoma', 'Ngoma 2', 'Amahoro', 'Male', '0780453378', '$2y$10$mKrXjBb46c8HonZOR6rU6ubZjThfTMKdCFOCTniDhQdgS97w7QkP6', 0, '2022-07-11 08:34:36'),
(6, 'Hamza', 'Mugabe', 'West', 'Nyabihu', 'Tumba', 'Tumba', 'Kiyovu', 'Other', '0784557644', '$2y$10$tuR6.ngjQCrQ3geUm4J.IOUqIZv6OVql8AvygtHgQmmn8A/CryKzS', 0, '2022-07-11 08:37:53'),
(7, 'Gad', 'Iradufasha', 'East', 'Gatsibo', 'Ngarama', 'Ngarama', 'Kiyovu', 'Male', '0784557411', '$2y$10$G/nIVFBWYWNCK7xuYNztTuuf2q0hExo3538H.jIbuXnC5JhoYFXcO', 0, '2022-09-01 17:39:09'),
(8, 'Mama', 'Emile', 'South', 'Huye', 'Ngoma', 'Ngoma4', 'Ngoma5', 'Female', '0783143178', '$2y$10$5eq.l.xyMkReY44H9yHXPOK4uQrYwjuxHejGxrZ5dv9ejtSGDqWCK', 1, '2022-09-01 18:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer`
--

CREATE TABLE `fertilizer` (
  `item_id` int(10) NOT NULL,
  `category` varchar(150) NOT NULL,
  `item_type` varchar(150) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price_per_kg` double NOT NULL,
  `subsidy_value` double NOT NULL,
  `comp_id` int(12) NOT NULL COMMENT 'Seller',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fertilizer`
--

INSERT INTO `fertilizer` (`item_id`, `category`, `item_type`, `quantity`, `price_per_kg`, `subsidy_value`, `comp_id`, `created_at`) VALUES
(1, 'Macro-Nutrient ', 'UREA', 20000, 1257, 257, 4, '2022-08-31 07:44:30'),
(2, 'Compounds/Blends', 'DAP', 61000, 1428, 600, 2, '2022-08-31 07:57:31'),
(3, 'Macro-Nutrient', 'NPK 17:17:17', 70000, 1530, 648, 1, '2022-08-31 08:35:07'),
(4, 'Compounds/Blends', 'UREA + Sulfur (40N + 5.5S)', 100000, 1257, 490, 5, '2022-08-31 08:45:12'),
(5, 'Macro-Nutrient', 'XXO', 500000, 1352, 513, 5, '2022-08-31 08:56:58'),
(6, 'Compounds/Blends', 'YY', 80000, 7500, 375, 5, '2022-08-31 09:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `fert_company`
--

CREATE TABLE `fert_company` (
  `comp_id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fert_company`
--

INSERT INTO `fert_company` (`comp_id`, `name`, `telephone`, `email`, `status`) VALUES
(1, 'YARA Ltd', '+0733318740', 'peter.ngugi@yara.com', 1),
(2, 'E.T.G INPUTS Ltd', '+250785712598', 'vishal.patel@etgworld.com', 1),
(3, 'RWANDA FERTILIZER COMPANY Ltd', '+250788549618', 'info.rwanda@oneacrefund.org', 1),
(4, 'ONE ACRE FUND/TUBURA', '+250788741343', 'eric.pohman@oneacrefund.org', 1),
(5, 'FOREIGN COUNTRY: Imports', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fert_farmer`
--

CREATE TABLE `fert_farmer` (
  `fert_id` int(12) NOT NULL,
  `farmer_id` int(12) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cereal_id` int(12) NOT NULL,
  `fert1` int(12) NOT NULL,
  `fert2` int(12) NOT NULL,
  `fert3` int(12) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fert_farmer`
--

INSERT INTO `fert_farmer` (`fert_id`, `farmer_id`, `quantity`, `cereal_id`, `fert1`, `fert2`, `fert3`, `status`, `created_at`) VALUES
(1, 7, 15, 4, 2, 1, 0, 1, '2022-09-01 19:23:34'),
(2, 8, 85, 2, 3, 1, 2, 1, '2022-09-01 19:24:47'),
(3, 4, 54, 15, 2, 0, 1, 1, '2022-09-01 19:25:28');

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

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(12) NOT NULL,
  `province_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'East'),
(2, 'West'),
(3, 'North'),
(4, 'South'),
(5, 'Kigali City');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `place_id` int(12) NOT NULL,
  `supplier_name` varchar(150) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `district_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`place_id`, `supplier_name`, `telephone`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'DERN Seed Company', '+250788655500', 18, '2022-08-29 17:44:08', '2022-08-29 17:35:02'),
(2, 'HOLDING COMPANY Ltd', '+250788400048', 2, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(3, 'WESTERN SEED CO. Ltd', '+250781723385', 3, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(4, 'UNICOOPAGI  ', '+250788467349', 24, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(5, 'NZEYALEX Ltd', '+250782172633', 5, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(6, 'RUMBUKA SEEDS Ltd', '+250788641335', 22, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(7, 'Coop IABM', '+250783190228', 23, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(8, 'IABM Cooperative', '+250783190228', 23, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(9, 'NVG Suppy Ltd', '+250788303636', 6, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(10, 'ONE CARE FUND. /Tubura.', '+250785371414', 28, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(11, 'E & B Seed Company', '+25078863695', 3, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(12, 'TRI-SEEDS Ltd', '+250788520914', 4, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(13, 'Export Trading Group (ETG)', '+250733 664655', 13, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(14, 'Top Quality Seed Production', '+25078882337', 3, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(15, 'RISCO Ltd', '+250788463749', 6, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(16, 'NAICO', '+250788363700', 16, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(17, 'IGNITE SEEDS Ltd', '+250788739552', 17, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(18, 'KGB Ltd', '+250788306812', 29, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(19, 'BRAMIN Ltd', '+250789777817', 3, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(20, 'Kenya Seed Co Rwanda', '+250786870213', 29, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(21, 'API Ltd', '+250788753766', 6, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(22, 'SEEDS OF TRUST Ltd', '+250788513527', 6, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(23, 'HAKIZIMANA Leodomir', '+250788476294', 23, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(24, 'RWASMO Ltd', '+250788513527', 6, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(25, 'CODERNYA IBAKWE', '+250783412454', 17, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(26, 'NYARUGURU SEEDS', '+250781234567', 26, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(27, 'SOZO Company', '+250788433242', 29, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(28, 'EASTERN SEED SOLUTION COMPANY Ltd', '+250788486454', 2, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(29, 'Ebenezer Mixed Farming (EMFAGM Ltd)', '+250788307609', 29, '2022-08-29 17:44:08', '2022-08-29 17:35:03'),
(30, 'PRODEV KAYONZA Ltd.', '+250788853454', 3, '2022-08-29 17:44:08', '2022-08-29 17:35:03');

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
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `fertilizer`
--
ALTER TABLE `fertilizer`
  ADD PRIMARY KEY (`item_id`) USING BTREE,
  ADD KEY `Company:Seller FK` (`comp_id`);

--
-- Indexes for table `fert_company`
--
ALTER TABLE `fert_company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `fert_farmer`
--
ALTER TABLE `fert_farmer`
  ADD PRIMARY KEY (`fert_id`);

--
-- Indexes for table `harvest`
--
ALTER TABLE `harvest`
  ADD PRIMARY KEY (`harvest_id`),
  ADD KEY `harvest_ibfk_1` (`farmer_id`),
  ADD KEY `cereal_ibfk_1` (`cereal_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `District_FK` (`district_id`);

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
  MODIFY `app_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `farmer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fertilizer`
--
ALTER TABLE `fertilizer`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fert_company`
--
ALTER TABLE `fert_company`
  MODIFY `comp_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fert_farmer`
--
ALTER TABLE `fert_farmer`
  MODIFY `fert_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `harvest`
--
ALTER TABLE `harvest`
  MODIFY `harvest_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `place_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fertilizer`
--
ALTER TABLE `fertilizer`
  ADD CONSTRAINT `Company:Seller FK` FOREIGN KEY (`comp_id`) REFERENCES `fert_company` (`comp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `harvest`
--
ALTER TABLE `harvest`
  ADD CONSTRAINT `cereal_ibfk_1` FOREIGN KEY (`cereal_id`) REFERENCES `cereal` (`cereal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harvest_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `District_FK` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
