-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 05:21 PM
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
  `province` int(12) NOT NULL,
  `district` int(12) NOT NULL,
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
(1, 'Jeanne', 'Mujawamariya', 5, 28, 'Gatenga', 'Gatenga', 'Cyishaba', 'Female', '0788888888', '$2y$10$FqXeZH2MTwcqiuUJGbpPw.PhpfjzEGzzTZH0N/tP6qjBIUBhm23sy', 'Admin', 1, '2022-09-07 12:00:24'),
(2, 'Gadson', 'Desiigner', 5, 30, 'Gitega', 'Matimba', 'Umucyo', 'Male', '0784444444', '$2y$10$slYPreqde./S/9YfeQu4mOd9ohqALIy5IHH6b/9w62tuhQ9di4KY2', 'Agrodealer', 1, '2022-09-07 15:21:05'),
(3, 'Emile', 'Niyindora', 4, 21, 'Ngoma', 'Ngoma', 'Ngoma II', 'Male', '0780453378', '$2y$10$DwK6YRkX/gvNfu54ErcFhuHdG9kG0Y8GSqOYNzkQfOwiVIzzbfP8W', 'Agrodealer', 1, '2022-09-19 09:35:14'),
(4, 'Musabwa', 'Peter', 5, 28, 'Gikondo', 'Kagunga', 'Kabuye I', 'Male', '0783333333', '$2y$10$4JDQyZdCnvuWCmbyfoSET.l2QbBOLE3jsL6.4gaA/sQ5VVDrrI3ZW', 'Agrodealer', 1, '2022-09-21 15:38:22'),
(5, 'Uwimana', 'Vestine', 4, 20, 'Kansi', 'Bwiza', 'Mbeho', 'Female', '0785004000', '$2y$10$D.okF2c5dpKblGP1JXwpg.anJ4omj9UFU9XDkKEnhcOrdX7NxVOFC', 'Agrodealer', 1, '2022-09-21 15:39:53'),
(6, 'Higiro', 'Donat', 1, 2, 'Ngarama', 'Ngarama', 'Ibare', 'Male', '0734200666', '$2y$10$GUQt.NSbxM41qbpj1DmIieNAizuQuMif2dwXXw05bdbS3UKHQ38Sm', 'Agrodealer', 1, '2022-09-21 15:41:55'),
(7, 'Dusengimana', 'Fiston', 3, 18, 'Cyuve', 'Rwebeya', 'Nganzo', 'Male', '0722000022', '$2y$10$22mccJnwy.FP2bhUqWdT3eej6AwzzKTqjnFYFCvQxAkrE5cRVSIkG', 'Agrodealer', 1, '2022-09-21 15:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(12) NOT NULL,
  `farmer_id` int(12) NOT NULL,
  `district` int(12) NOT NULL,
  `cereal_id` int(12) NOT NULL,
  `quantity` int(10) NOT NULL,
  `season` char(2) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `app_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_id`, `farmer_id`, `district`, `cereal_id`, `quantity`, `season`, `status`, `app_date`) VALUES
(1, 1, 30, 5, 260, 'B', 1, '2022-05-01 11:08:56'),
(2, 1, 30, 4, 1065, 'A', 1, '2022-05-16 11:15:46'),
(3, 1, 30, 2, 50, 'A', 1, '2022-05-22 11:15:47'),
(4, 1, 30, 11, 820, 'B', 1, '2022-05-25 11:17:16'),
(5, 2, 21, 9, 40, 'B', 1, '2022-05-27 13:04:38'),
(6, 2, 21, 5, 90, 'A', 1, '2022-05-27 13:05:05'),
(7, 4, 21, 6, 70, 'B', 1, '2022-05-28 13:10:33'),
(8, 5, 2, 7, 140, 'B', 1, '2022-05-29 09:34:12'),
(9, 5, 2, 2, 300, 'C', 1, '2022-05-30 12:04:01'),
(10, 24, 21, 6, 80, 'B', 1, '2022-04-03 11:42:36'),
(11, 24, 21, 16, 75, 'B', 1, '2022-04-08 11:43:17'),
(12, 22, 30, 10, 78, 'C', 1, '2022-04-09 15:04:47'),
(13, 1, 30, 6, 100, 'B', 1, '2022-04-13 15:04:47'),
(14, 31, 21, 16, 300, '1', 1, '2022-04-14 15:04:47'),
(15, 19, 21, 7, 50, 'B', 1, '2022-04-16 15:04:47'),
(16, 20, 21, 3, 110, '', 1, '2022-04-18 15:04:47'),
(17, 3, 29, 3, 90, 'B', 1, '2022-04-21 15:04:47'),
(18, 27, 28, 10, 200, 'A', 1, '2022-04-25 15:04:47'),
(19, 6, 28, 1, 58, 'C', 1, '2022-04-27 15:04:47'),
(20, 7, 28, 11, 100, 'A', 1, '2022-04-27 17:04:47'),
(21, 28, 19, 4, 155, 'B', 1, '2022-06-11 15:04:47'),
(22, 8, 19, 9, 40, 'C', 1, '2022-06-16 15:04:47'),
(23, 32, 17, 3, 85, 'B', 1, '2022-06-18 15:04:47'),
(24, 9, 17, 13, 75, 'A', 1, '2022-06-21 15:04:47'),
(25, 10, 5, 5, 421, 'A', 1, '2022-06-25 15:04:47'),
(26, 23, 20, 6, 66, 'C', 1, '2022-07-11 15:04:47'),
(27, 12, 20, 14, 130, 'C', 1, '2022-07-13 15:04:47'),
(28, 11, 20, 16, 95, 'A', 1, '2022-07-16 15:04:47'),
(29, 13, 3, 8, 145, 'B', 1, '2022-07-22 15:04:47'),
(30, 5, 2, 14, 102, 'C', 1, '2022-07-24 15:04:47'),
(31, 14, 2, 10, 160, 'C', 1, '2022-07-24 15:04:47'),
(32, 15, 2, 7, 35, 'B', 1, '2022-07-27 15:04:47'),
(33, 16, 16, 8, 102, 'B', 1, '2022-07-28 15:04:47'),
(34, 25, 16, 4, 200, 'A', 1, '2022-07-28 18:11:35'),
(35, 17, 23, 3, 153, 'C', 1, '2022-07-29 15:11:35'),
(36, 18, 23, 2, 79, 'C', 1, '2022-07-29 18:30:35'),
(37, 21, 15, 12, 321, 'A', 1, '2022-07-30 15:11:35'),
(38, 30, 18, 1, 75, 'B', 1, '2022-07-31 02:11:35'),
(39, 29, 18, 6, 56, 'A', 1, '2022-08-04 15:11:35'),
(40, 26, 18, 10, 345, 'C', 0, '2022-08-11 15:11:35'),
(41, 7, 28, 15, 200, 'B', 1, '2022-08-21 15:28:20'),
(42, 11, 20, 1, 122, 'C', 1, '2022-08-26 15:28:20'),
(43, 26, 18, 8, 200, 'A', 1, '2022-09-21 15:28:20'),
(44, 6, 28, 9, 76, 'B', 1, '2022-09-21 15:28:20');

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
(2, 'Rice', 'Basmati Rice', '1000', 250, 'Water Area', 'B', 1, 0, 1, '2022-07-16 00:25:38'),
(3, 'Rice', 'Jasmine Rice', '780', 8900000, 'Wet Land', 'B', 1, 1, 1, '2022-07-16 00:26:22'),
(4, 'Rice', 'Black Rice', '1300', 4557935, 'Farm Land', 'B', 1, 1, 1, '2022-07-16 00:27:40'),
(5, 'Rice', 'Glutinous Rice', '860', 410, 'Water Area', 'A', 1, 1, 1, '2022-07-16 00:28:28'),
(6, 'Rice', 'Sushi Rice', '2000', 4699850, 'Coastal Land', 'A', 1, 0, 1, '2022-07-16 00:29:19'),
(7, 'Rice', 'Rosematta Rice', '1420', 4699680, 'Grass Land', 'A', 1, 1, 1, '2022-07-16 00:30:18'),
(8, 'Rice', 'Calrose', '780', 899990, 'Wet Land', 'B', 1, 0, 1, '2022-07-16 00:31:01'),
(9, 'Oats', 'Steel-cut Oats', '2000', 199910, 'Grass Land', 'B', 1, 1, 1, '2022-07-16 00:33:11'),
(10, 'Oats', 'Oatmeal', '1500', 1899804, 'Coastal Land', 'B', 1, 1, 1, '2022-07-16 00:34:59'),
(11, 'Oats', 'Rolled Oats', '1400', 6680, 'Farm Land', 'B', 0, 0, 1, '2022-07-16 00:35:50'),
(12, 'Sorghum', 'Great Millet', '400', 5900000, 'Farm Land', 'B', 1, 1, 1, '2022-07-16 00:47:43'),
(13, 'Sorghum', 'Drummondii', '500', 8900000, 'Grass Land', 'B', 1, 1, 1, '2022-07-16 00:48:40'),
(14, 'Sorghum', 'Johnson Grass', '600', 800000, 'Wet Land', 'B', 1, 1, 1, '2022-07-16 00:49:44'),
(15, 'Sorghum', 'Sorgum Dochna', '805', 7949496, 'Farm Land', 'B', 1, 1, 1, '2022-07-16 00:50:43'),
(16, 'Sorghum', 'Broom Sorghum', '1100', 899925, 'Wet Land', 'A', 1, 0, 1, '2022-07-16 00:51:53');

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
(29, 'GASABO', 5),
(30, 'NYARUGENGE', 5);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `farmer_id` int(12) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `province` int(12) NOT NULL,
  `district` int(12) NOT NULL,
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
(1, 'Gakuba', 'Ernest', 5, 30, 'Muhima', 'Tetero', 'Indamutsa', 'Male', '0784005430', '$2y$10$ddqRxchMabZaCpFgX80hoOaDsMZGO7mO6sx8espL6uHk2A3lHQ8jy', 1, '2022-09-11 18:25:30'),
(2, 'Munezero', 'Davis', 4, 21, 'Tumba', 'Rango', 'Rango B', 'Male', '0722361483', '$2y$10$Z37SlDk2lfafs/Pd4ufm2uNdY5gpaVj85cGjUm2jgHcje8vudkiaG', 0, '2022-09-16 13:21:17'),
(3, 'Mugabire', 'Pazzo', 5, 29, 'Jabana', 'Ngiryi', 'Gasharu', 'Male', '0780703067', '$2y$10$wdOOBLMWigji/rUv6lCJFOuNELx/j4DILIUNQwzc0jIWzztTykvEa', 1, '2022-09-19 11:42:32'),
(4, 'Uwineza', 'Aline', 4, 21, 'Ngoma', 'Ngoma', 'Ngoma V', 'Female', '0785555555', '$2y$10$SchiU6R0finfB6uiqCO5kuEl2HxB2I9zjUoJdvw.ynrYiTaBweJBO', 1, '2022-09-19 11:47:40'),
(5, 'Mugenzi', 'Radjab', 1, 2, 'Muhura', 'Mamfu', 'Akarengo', 'Male', '0783243554', '$2y$10$ZbpMMKXsceZoot1rCEAZ4.fxy3zM/uuFVNya79TSWc686Ee54fAr6', 1, '2022-09-21 07:25:18'),
(6, 'Rukundo', 'Green P', 5, 28, 'Gatenga', 'Karambo', 'Ramiro', 'Male', '0797000000', '$2y$10$h4uaM3dGSCJdBsSyxTxXJu3qtgn7bn6wBgzFH25wNKO8J0k89H2fi', 1, '2022-09-21 07:26:45'),
(7, 'Uwicyeza', 'Danielle', 5, 28, 'Gatenga', 'Karambo', 'Sangwa', 'Female', '0784344322', '$2y$10$dDJXN12xnI5Fymug4vLEJuBw8lk9Iw.6srnKGPs33.JEAYG7.2Z8u', 1, '2022-09-21 07:28:10'),
(8, 'Mujawimana', 'Denyse', 3, 19, 'BUYOGA', 'Gitumba', 'Remera', 'Female', '0739000543', '$2y$10$n4YheCzweRg.gl/RYfF0EeC20XA0yXONy6ODJ.6PoTOM7bVkdS2w6', 1, '2022-09-21 07:30:27'),
(9, 'Mugabo', 'Samuel', 3, 17, 'Cyumba', 'Gasunzu', 'Ryamuromba', 'Male', '0784463244', '$2y$10$XFRJZDedf0yjTvWt.5wkgeuUDb2hrB/MDHstM8Dr3oJRqVUxrexyy', 1, '2022-09-21 07:32:09'),
(10, 'Kamanzi', 'Gaston', 1, 5, 'Rukumberi', 'Ntovi', 'Iyantende', 'Male', '0784646900', '$2y$10$IpQvtCEz/eKKZBNrmHVX9Ok1/SkBLc6yF2/4ITtDXvl4Tg2fT1nzW', 1, '2022-09-21 07:34:29'),
(11, 'Muganza', 'Leoncie', 4, 20, 'Mugombwa', 'Baziro', 'Nyesumo', 'Female', '0730303030', '$2y$10$3d0.JP8LcqVx3lZ8RyUPd.GrR13JFMKPmjxCxegJ/DyrZamxPdzc2', 1, '2022-09-21 08:11:12'),
(12, 'Uwera', 'Agnes', 4, 20, 'Kansi', 'Bwiza', 'Mbeho', 'Female', '0784747474', '$2y$10$1ylC7XUKIFVeo5U.l8hHKe9spzMzdxxYhWuHvS0E9E9hInI7n3ItC', 1, '2022-09-21 08:24:56'),
(13, 'Gakwisi', 'Jean Paul', 1, 3, 'Kabarondo', 'Cyabajwa', 'Rugwagwa', 'Male', '0734554322', '$2y$10$VhjpwlgCMC2sgbXXl/6Ul.cmb9paROZ5p22lkd13ZzmBdf8/MXDCq', 1, '2022-09-21 08:27:08'),
(14, 'Mutwaribi', 'Damien', 1, 2, 'Ngarama', 'Ngarama', 'Gatungo', 'Male', '0790060080', '$2y$10$Eck/AMtJGFV5MezZGgDsfuCgntWs5rR.g2OwHqM2WWln44952Rlgm', 1, '2022-09-21 08:29:24'),
(15, 'Niyomugabo', 'Jean', 1, 2, 'Ngarama', 'Karambi', 'Cyimbugu', 'Male', '0785050500', '$2y$10$YJSNPjwvONO2TnFcgmgb5OVxzbDAelMOak3WCY64bNLxSjj6WhmCu', 1, '2022-09-21 08:31:36'),
(16, 'Maniriho', 'J.Bosco', 3, 16, 'Cyabingo', 'Muhororo', 'Musebeya', 'Male', '0788844040', '$2y$10$R/duvVyGelhq5Kh1a7.IsOWorTW9MmSuEKfIGT5E2HeCCQfeWQ60a', 1, '2022-09-21 08:33:52'),
(17, 'Kamana', 'Emmanuel', 4, 23, 'Mushishiro', 'Munazi', 'Rwinkindi', 'Male', '0726054533', '$2y$10$QVybqrb5G/znmm1ZOr573ePMyFSYKlWvzjNLEQIICC2aCpI7.7wvC', 1, '2022-09-21 08:36:38'),
(18, 'Akayezu', 'Epiphanie', 4, 23, 'Nyarusange', 'Rusovu', 'Rwambariro', 'Male', '0787878787', '$2y$10$QA/vanI/PbvkQX24DGyoJOJbEmYSBcA3.OR950tPEq48Ea02/.8le', 1, '2022-09-21 08:37:54'),
(19, 'Gahima', 'Leandre', 4, 21, 'Gishamvu', 'Nyakibanda', 'Kamabuye', 'Male', '0783453385', '$2y$10$nbODLS2pAcgWKaea6SS1jeSHzFpEGD9MGOdUsKUlcdPKvNulmwrg6', 1, '2022-09-21 08:39:45'),
(20, 'Muhawenimana', 'Jeanine', 4, 21, 'Mbazi', 'Gatobotobo', 'Rwabuye', 'Male', '0785050505', '$2y$10$kuzUl5ZaZi1Fcvr25eNfU.73Ah56Hf41IpOv83jSi7e.IoAMcedG.', 1, '2022-09-21 08:41:41'),
(21, 'Jyambere', 'Stephano', 3, 15, 'Cyanika', 'Kabyiniro', 'Butete', 'Male', '0780060006', '$2y$10$O.wd2M0.f4dQlmOyuflRu.AfmHKMTp9oFcdfp7gv85r0bcLP6qpNG', 1, '2022-09-21 08:43:38'),
(22, 'Majyambere', 'Gilbert', 5, 30, 'Gitega', 'Kigarama', 'Umubano', 'Male', '0788880707', '$2y$10$oyWpLxL11bKTsZww.YZsJOpM2g8Ww/JWNADs/Na85A/VLjAMDjncq', 1, '2022-09-21 08:45:38'),
(23, 'Mugabekazi', 'Donathile', 4, 20, 'Mugombwa', 'Kibayi', 'Akarutsibuka', 'Male', '0735050000', '$2y$10$xDqKsktQ7/EXkbsIZ24jkOiGtxpj/24wpRKYs.13VAyw1tFcEngZy', 1, '2022-09-21 08:50:29'),
(24, 'Niyindora', 'Emile', 4, 21, 'Ngoma', 'Butare', 'Bukinanyana', 'Male', '0780453378', '$2y$10$BPyhgybP7iG3iGImmxW2KuViLEvWkqi6v0FYHcM43Sm7uDePSoSJi', 1, '2022-09-21 08:52:32'),
(25, 'Bucyana', 'Robert', 3, 16, 'Busengo', 'Byibuhiro', 'Ruboza', 'Male', '0784545450', '$2y$10$sXsK/vVsfLSfyVv562eyr.EhUXor6NWATpcpbllTFURKsY1/FIZYK', 1, '2022-09-21 08:53:53'),
(26, 'Dusabimana', 'Vincent', 3, 18, 'Gacaca', 'Gasakuza', 'Nyamugari', 'Male', '0782243334', '$2y$10$/TOYpRKoPt8YCTJfZQZfG.pYap81CxH5EF.mk1G85z0j47blKanJy', 1, '2022-09-21 08:55:21'),
(27, 'Muteteri', 'Solange', 5, 28, 'Gikondo', 'Kagunga', 'Kabuye II', 'Female', '0733553450', '$2y$10$ZO5NgdFn/NpK9z5wKx9xTOfVgHONgZNZzZ/WjTzuDFeEy54IY7rma', 1, '2022-09-21 09:00:57'),
(28, 'Cyurinyana', 'Verena', 3, 19, 'BASE', 'Cyohoha', 'Nyangoyi', 'Female', '0788852244', '$2y$10$TX4KoyhJyJJ.DkwyV9p87O8H26AWPQS9DqEmUka0xU.cGwjrdj1em', 1, '2022-09-21 09:03:29'),
(29, 'Twizerimana', 'Sylvan', 3, 18, 'Cyuve', 'Rwebeya', 'Nganzo', 'Male', '0785005005', '$2y$10$LjUgxZ/AVteJ.ZWHNRUd4OrNx6LaH.r6vQWQHjVv3eU5vUrFVPUBq', 1, '2022-09-21 09:09:52'),
(30, 'Gasana', 'Donat', 3, 18, 'Cyuve', 'Rwebeya', 'Nganzo', 'Male', '0785005005', '$2y$10$x5ZQpPcCxVXV3OI3CNJLuu3qqyKS0PpP7bfSWCyz3qOD9SnZh9ACi', 1, '2022-09-21 09:09:52'),
(31, 'Mugabo', 'Theoneste', 4, 21, 'Ngoma', 'Matyazo', 'Kamucuzi', 'Male', '0795545433', '$2y$10$cC1ic0GLKyxIJ8gUFL/t9ulccosSkQBMWJ7i//H/ku.HlzdJAC5iW', 1, '2022-09-21 09:12:50'),
(32, 'Gahongayire', 'Christine', 3, 17, 'Shangasha', 'Nyabishambi', 'Rukiniro', 'Female', '0722705544', '$2y$10$gMxdp6y4tfN5cLLzKOYr/.g2i43fiZ/TxaNCKn/nXhd7q9R38GJmS', 1, '2022-09-21 09:15:11');

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
(1, 'Macro-Nutrient ', 'UREA', 18450, 1257, 257, 4, '2022-08-31 07:44:30'),
(2, 'Compounds/Blends', 'DAP', 60973, 1428, 600, 2, '2022-08-31 07:57:31'),
(3, 'Macro-Nutrient', 'NPK 17:17:17', 70000, 1530, 648, 1, '2022-08-31 08:35:07'),
(4, 'Compounds/Blends', 'UREA + Sulfur (40N + 5.5S)', 99406, 1257, 490, 5, '2022-08-31 08:45:12'),
(5, 'Macro-Nutrient', 'XXO', 499575, 1352, 513, 5, '2022-08-31 08:56:58'),
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
(3, 4, 54, 15, 2, 0, 1, 1, '2022-09-01 19:25:28'),
(4, 1, 100, 7, 2, 0, 0, 1, '2022-09-02 11:46:20'),
(5, 1, 100, 7, 2, 0, 0, 1, '2022-09-02 11:47:40'),
(6, 2, 15, 14, 5, 0, 0, 1, '2022-09-02 11:49:07'),
(7, 1, 22405, 2, 2, 0, 0, 1, '2022-09-16 10:05:15'),
(8, 1, 22405, 2, 2, 0, 0, 1, '2022-09-16 10:47:09'),
(9, 1, 4500, 2, 4, 0, 0, 1, '2022-09-16 10:56:41'),
(10, 1, 760, 5, 4, 1, 0, 1, '2022-09-16 11:10:33'),
(11, 1, 760, 5, 1, 0, 0, 1, '2022-09-16 11:14:08'),
(12, 1, 20000, 11, 1, 0, 0, 1, '2022-09-16 11:22:21'),
(13, 1, 1000, 11, 1, 0, 0, 1, '2022-09-16 11:46:30'),
(14, 1, 900, 11, 1, 0, 0, 1, '2022-09-16 11:48:57'),
(15, 1, 850, 11, 5, 0, 0, 1, '2022-09-16 11:51:42'),
(16, 1, 400, 2, 4, 0, 0, 1, '2022-09-16 11:53:34'),
(17, 1, 35, 4, 4, 0, 0, 1, '2022-09-16 11:57:19'),
(18, 24, 120, 16, 1, 0, 0, 1, '2022-09-21 14:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `harvest`
--

CREATE TABLE `harvest` (
  `harvest_id` int(12) NOT NULL,
  `farmer_id` int(12) NOT NULL,
  `district` int(12) NOT NULL,
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

INSERT INTO `harvest` (`harvest_id`, `farmer_id`, `district`, `cereal_id`, `season`, `quantity`, `current_price`, `outcome`, `status`, `harvest_date`) VALUES
(1, 2, 21, 13, 'B', 750, 220, 'High', 1, '2022-09-16 13:45:20'),
(2, 1, 30, 14, 'B', 100, 800, 'High', 0, '2022-09-19 12:02:37'),
(3, 1, 30, 7, 'B', 180, 900, 'Medium', 1, '2022-09-19 12:03:16'),
(4, 2, 21, 3, 'C', 200, 1100, 'High', 0, '2022-09-19 12:52:20'),
(5, 4, 21, 4, 'B', 120, 1200, 'Medium', 0, '2022-09-19 13:10:13'),
(6, 5, 2, 2, 'A', 40, 780, 'Low', 0, '2022-09-21 09:34:43'),
(7, 24, 21, 13, 'C', 90, 800, 'High', 1, '2022-09-21 11:44:40');

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
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `district` (`district`),
  ADD KEY `province` (`province`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `Farmer ID` (`farmer_id`),
  ADD KEY `Cereal ID` (`cereal_id`),
  ADD KEY `District FK` (`district`);

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
  ADD PRIMARY KEY (`farmer_id`),
  ADD KEY `district` (`district`),
  ADD KEY `province` (`province`);

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
  ADD PRIMARY KEY (`fert_id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `cereal_id` (`cereal_id`),
  ADD KEY `fert1` (`fert1`);

--
-- Indexes for table `harvest`
--
ALTER TABLE `harvest`
  ADD PRIMARY KEY (`harvest_id`),
  ADD KEY `harvest_ibfk_1` (`farmer_id`),
  ADD KEY `cereal_ibfk_1` (`cereal_id`),
  ADD KEY `district` (`district`);

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
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `app_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `farmer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `fert_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `harvest`
--
ALTER TABLE `harvest`
  MODIFY `harvest_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`district`) REFERENCES `district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`province`) REFERENCES `province` (`province_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `Cereal ID` FOREIGN KEY (`cereal_id`) REFERENCES `cereal` (`cereal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `District FK` FOREIGN KEY (`district`) REFERENCES `district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `farmer`
--
ALTER TABLE `farmer`
  ADD CONSTRAINT `farmer_ibfk_1` FOREIGN KEY (`district`) REFERENCES `district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farmer_ibfk_2` FOREIGN KEY (`province`) REFERENCES `province` (`province_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fertilizer`
--
ALTER TABLE `fertilizer`
  ADD CONSTRAINT `Company:Seller FK` FOREIGN KEY (`comp_id`) REFERENCES `fert_company` (`comp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fert_farmer`
--
ALTER TABLE `fert_farmer`
  ADD CONSTRAINT `fert_farmer_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fert_farmer_ibfk_2` FOREIGN KEY (`cereal_id`) REFERENCES `cereal` (`cereal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fert_farmer_ibfk_3` FOREIGN KEY (`fert1`) REFERENCES `fertilizer` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `harvest`
--
ALTER TABLE `harvest`
  ADD CONSTRAINT `cereal_ibfk_1` FOREIGN KEY (`cereal_id`) REFERENCES `cereal` (`cereal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harvest_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harvest_ibfk_2` FOREIGN KEY (`district`) REFERENCES `district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `District_FK` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
