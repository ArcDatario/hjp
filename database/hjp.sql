-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 09:12 PM
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
-- Database: `hjp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins_acc`
--

CREATE TABLE `admins_acc` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `role` text NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins_acc`
--

INSERT INTO `admins_acc` (`id`, `user_name`, `role`, `password`, `image`) VALUES
(6, 'admin', 'Staff', '21232f297a57a5a743894a0e4a801fc3', 'admin_11680.png'),
(7, 'haciel', 'Owner', '310ce61c90f3a46e340ee8257bc70e93', 'admin_13444.png'),
(10, 'Harvey Pinohermoso', 'Owner', '827ccb0eea8a706c4c34a16891f84e7b', 'admin_40878.png'),
(11, 'jerico', 'Owner', '1bef96a69a1a51d9a37654a7ca513767', 'admin_26479.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_tbl`
--

CREATE TABLE `equipment_tbl` (
  `id` int(11) NOT NULL,
  `equipment` text NOT NULL,
  `year_model` text NOT NULL,
  `capacity` text NOT NULL,
  `fuel` text NOT NULL,
  `kmperliter` text NOT NULL,
  `type` text NOT NULL,
  `category` text NOT NULL,
  `rate_per_day` int(11) NOT NULL,
  `image` text NOT NULL,
  `equipment_qty` int(11) DEFAULT NULL,
  `rate_category` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_tbl`
--

INSERT INTO `equipment_tbl` (`id`, `equipment`, `year_model`, `capacity`, `fuel`, `kmperliter`, `type`, `category`, `rate_per_day`, `image`, `equipment_qty`, `rate_category`) VALUES
(34, 'Isuzu Self Loading', '2023', '2', 'Unleaded', '23', 'Manual', 'Dump Trucks', 3500, 'equipment_1292.jpg', 99, 'perDay'),
(35, 'Isuzu Dumptruck', '2022', '2', 'Diesel', '123', 'Manual', 'Dump Trucks', 5000, 'equipment_32151.jpg', 84, 'perDay'),
(36, 'Howo Sino Dump Truck', '2021', '2', 'Diesel', '12', 'Manual', 'Dump Trucks', 5000, 'equipment_19336.jpg', 97, 'perDay'),
(38, 'Transit Mixer', '2021', '2', 'Diesel', '5', 'Manual', 'Mixers', 5000, 'equipment_14539.jpg', 93, 'perLoad');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `likert` text NOT NULL,
  `comments` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`id`, `user_id`, `equipment_id`, `ratings`, `likert`, `comments`, `date`) VALUES
(55, 79, 41, 4, 'Satisfied', 'goods and great very useful', '2024-11-01 04:04:04'),
(56, 66, 41, 3, 'Neutral', 'I\'am very disappointed that the payloader we rented isn\'t working properly', '2024-11-01 04:44:40'),
(57, 75, 41, 4, 'Satisfied', 'salamat HJP sa mbilis na srbisyo hightech na ahhh', '2024-11-01 12:23:57'),
(58, 84, 41, 4, 'Satisfied', 'Good service', '2024-11-05 05:13:17'),
(59, 80, 35, 4, 'Satisfied', 'Mabilis lang ang pagrent sa equipment at maayos naman ang pagprocess nito, salamat!.', '2024-11-05 12:25:58'),
(60, 91, 36, 5, 'Very Satisfied', 'good and very function fast and reliable', '2024-11-17 03:55:58'),
(61, 91, 35, 4, 'Satisfied', 'good very kind operator and very cheap and super usable strictly time working', '2024-11-17 03:56:51'),
(62, 91, 35, 4, 'Satisfied', 'perfect i love this equipment super fast no delay', '2024-11-17 03:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `sand_id` int(11) NOT NULL,
  `sand_name` text DEFAULT NULL,
  `bucket` int(11) NOT NULL,
  `summary` text NOT NULL,
  `total` int(11) NOT NULL,
  `downpayment` int(11) NOT NULL,
  `first_total` int(11) NOT NULL,
  `municipality` text NOT NULL,
  `barangay` text NOT NULL,
  `details` text NOT NULL,
  `status` text NOT NULL DEFAULT 'Pending',
  `gcash_receipt` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `prepair_date` datetime DEFAULT NULL,
  `on_delivery_date` datetime DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `cancelled_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `sand_id`, `sand_name`, `bucket`, `summary`, `total`, `downpayment`, `first_total`, `municipality`, `barangay`, `details`, `status`, `gcash_receipt`, `date`, `prepair_date`, `on_delivery_date`, `completed_date`, `cancelled_date`) VALUES
(129, 54, 'datarioarc@gmail.com', 4, 'Typical Sand', 4, '4 Buckets', 10000, 0, 0, 'Bansud', 'Poblacion', 'asdasdasdasdasdasd', 'Completed', '', '2024-05-15 00:20:54', '2024-05-15 00:22:06', '2024-05-15 00:23:05', '2024-05-15 00:23:52', NULL),
(130, 54, 'datarioarc@gmail.com', 3, 'Sand Gravel', 45, '45 Buckets', 67500, 0, 0, 'Bansud', 'Proper Tiguisan', 'asdasdasdasdasdasd', 'Completed', '', '2024-05-15 00:21:09', '2024-05-15 00:22:16', '2024-05-15 00:23:15', '2024-05-15 00:24:01', NULL),
(131, 54, 'datarioarc@gmail.com', 2, 'Crashed Sand', 63, '63 Buckets', 77742, 0, 0, 'Gloria', 'Malubay', 'asdasd asdasdasdasd', 'Completed', '', '2024-05-15 00:21:19', '2024-05-15 00:22:26', '2024-05-15 00:23:24', '2024-05-15 00:24:09', NULL),
(132, 54, 'datarioarc@gmail.com', 3, 'Sand Gravel', 76, '76 Buckets', 114000, 0, 0, 'Pinamalayan', 'Marfrancisco', 'asdasdasdasd asdasdada', 'Completed', '', '2024-05-15 00:21:28', '2024-05-15 00:22:35', '2024-05-15 00:23:32', '2024-05-15 00:24:19', NULL),
(133, 54, 'datarioarc@gmail.com', 4, 'Typical Sand', 4, '4 Buckets', 10000, 0, 0, 'Gloria', 'Macario Adriatico', 'asdasdasdasdasdas asdasdadasd', 'On Delivery', '', '2024-05-15 00:21:37', '2024-05-15 00:22:43', '2024-05-15 00:23:42', NULL, NULL),
(134, 54, 'datarioarc@gmail.com', 2, 'Crashed Sand', 4, '4 Buckets', 4936, 0, 0, 'Gloria', 'Malayong', 'asdasdasd asdasdasd', 'Pending', '', '2024-05-15 00:21:44', NULL, NULL, NULL, NULL),
(135, 54, 'datarioarc@gmail.com', 3, 'Sand Gravel', 4, '4 Buckets', 6000, 0, 0, 'Bansud', 'Pag-asa', 'asdasdasdasdasd', 'Cancelled', '', '2024-05-15 00:21:52', NULL, NULL, NULL, '2024-05-15 00:22:59'),
(136, 54, 'datarioarc@gmail.com', 4, 'Typical Sand', 4, '4 Buckets', 10000, 0, 0, 'Bansud', 'Poblacion', 'asdasdasdasd', 'Pending', '', '2024-05-15 00:21:59', NULL, NULL, NULL, NULL),
(137, 54, 'datarioarc@gmail.com', 4, 'Typical Sand', 5, '5 Buckets', 12500, 0, 0, 'Gloria', 'Guimbonan', 'Kawit,Gloriq,Oriental Mindiri', 'Completed', '', '2024-08-27 16:28:25', '2024-08-27 16:28:42', '2024-08-27 16:28:49', '2024-08-27 16:28:57', NULL),
(138, 72, 'onad11790@gmail.com', 4, 'S1 Selandra', 5, '5 Buckets', 2250, 0, 0, 'Gloria', 'Agsalin', 'Near in Mabunga Residence', 'Completed', '', '2024-10-31 08:12:45', '2024-10-31 08:14:52', '2024-10-31 08:15:33', '2024-10-31 08:36:17', NULL),
(139, 74, 'shellamaybustamante608@gmail.com', 4, 'S1 Selandra', 10, '10 Buckets', 4500, 0, 0, 'Bansud', 'Proper Bansud', 'Lumbayan St.', 'Completed', '', '2024-10-31 08:50:30', '2024-10-31 08:51:19', '2024-10-31 08:51:39', '2024-10-31 08:52:09', NULL),
(140, 81, 'krystelljemjavier@gmail.com', 4, 'S1 Selandra', 20, '20 Buckets', 9000, 0, 0, 'Gloria', 'Santa Maria', 'sitio balimbing 2', 'Completed', '', '2024-11-03 03:43:36', '2024-11-03 10:39:47', '2024-11-05 11:23:07', '2024-11-05 11:23:25', NULL),
(141, 82, 'roceroshirlynjoy9@gmail.com', 2, 'Mixed S1/G1', 30, '30 Buckets', 16500, 0, 0, 'Gloria', 'Tambong', 'Sitio pulo sagingan ', 'Prepairing', '', '2024-11-03 11:09:45', '2024-11-04 01:49:34', NULL, NULL, NULL),
(142, 66, 'algeronmangi24@gmail.com', 7, 'Apple  Size', 1, '1 Bucket', 2500, 0, 0, 'Pinamalayan', 'Lumangbayan', 'Highway', 'Pending', '', '2024-11-04 00:47:08', NULL, NULL, NULL, NULL),
(143, 66, 'algeronmangi24@gmail.com', 7, 'Apple  Size', 1, '1 Bucket', 2500, 0, 0, 'Bansud', 'Poblacion', 'Highway', 'Cancelled', '', '2024-11-04 00:47:43', NULL, NULL, NULL, '2024-11-04 01:46:21'),
(145, 91, 'datarioarc16@gmail.com', 7, 'Apple  Size', 3, '3 Buckets', 5000, 0, 0, 'Gloria', 'Kawit', 'djd water refilling station', 'Preparing', 'receipt_43040.jpg', '2024-11-17 00:43:39', '2024-11-17 01:14:34', NULL, NULL, NULL),
(146, 91, 'datarioarc16@gmail.com', 7, 'Apple  Size', 3, '3 Buckets', 5000, 0, 7500, 'Gloria', 'Kawit', 'djd water refilling station', 'Preparing', 'receipt_39446.jpg', '2024-11-17 00:51:59', '2024-11-17 01:15:05', NULL, NULL, NULL),
(147, 91, 'datarioarc16@gmail.com', 7, 'Apple  Size', 4, '4 Buckets', 7000, 3000, 10000, 'Gloria', 'Kawit', 'djd water refilling station', 'Preparing', 'receipt_19986.jpg', '2024-11-17 00:59:20', '2024-11-17 01:16:12', NULL, NULL, NULL),
(148, 91, 'datarioarc16@gmail.com', 4, 'S1 Selandra', 4, '4 Buckets', 1300, 500, 1800, 'Gloria', 'Kawit', 'djd water refilling station', 'Preparing', 'receipt_12343.jpg', '2024-11-17 00:59:55', '2024-11-17 01:24:04', NULL, NULL, NULL),
(149, 91, 'datarioarc16@gmail.com', 7, 'Apple  Size', 4, '4 Buckets', 9700, 300, 10000, 'Gloria', 'Kawit', 'djd water refilling station', 'Preparing', 'receipt_19014.jpg', '2024-11-17 01:26:11', '2024-11-17 01:27:11', NULL, NULL, NULL),
(150, 91, 'datarioarc16@gmail.com', 3, 'Sand Gravel', 10, '10 Buckets', 2200, 300, 2500, 'Gloria', 'Kawit', 'djd water refilling station', 'Preparing', 'receipt_20295.jpg', '2024-11-17 01:26:55', '2024-11-17 01:27:48', NULL, NULL, NULL),
(151, 91, 'datarioarc16@gmail.com', 7, 'Apple  Size', 4, '4 Buckets', 9700, 300, 10000, 'Gloria', 'Kawit', 'djd water refilling station', 'Preparing', 'receipt_15657.jpg', '2024-11-17 01:32:24', '2024-11-17 01:32:31', NULL, NULL, NULL),
(152, 91, 'datarioarc16@gmail.com', 2, 'Mixed S1/G1', 7, '7 Buckets', 3850, 0, 3850, 'Gloria', 'Kawit', 'djd water refilling station', 'Pending', 'receipt_28289.jpg', '2024-11-17 01:33:57', NULL, NULL, NULL, NULL),
(153, 91, 'datarioarc16@gmail.com', 7, 'Apple  Size', 4, '4 Buckets', 10000, 0, 10000, 'Gloria', 'Kawit', 'djd water refilling station', 'Pending', 'receipt_30830.jpg', '2024-11-17 03:03:52', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `equipment_name` text NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `status` text NOT NULL DEFAULT 'Pending',
  `approved_status` text DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `paid_status` text DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `total` int(11) NOT NULL,
  `summary` text NOT NULL,
  `equipment_load` int(11) DEFAULT NULL,
  `user_email` text NOT NULL,
  `municipality` text NOT NULL,
  `barangay` text NOT NULL,
  `details` text NOT NULL,
  `downpayment` int(11) NOT NULL,
  `first_total` int(11) NOT NULL,
  `gcash_receipt` text NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `return_status` text DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `completed_status` text DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `cancelled_status` text DEFAULT NULL,
  `cancelled_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id`, `user_id`, `equipment_id`, `equipment_name`, `rent_start_date`, `rent_end_date`, `status`, `approved_status`, `approved_date`, `paid_status`, `paid_date`, `total`, `summary`, `equipment_load`, `user_email`, `municipality`, `barangay`, `details`, `downpayment`, `first_total`, `gcash_receipt`, `date`, `return_status`, `return_date`, `completed_status`, `completed_date`, `cancelled_status`, `cancelled_date`) VALUES
(290, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 19:45:00', NULL, NULL, 9500, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_14293.jpg', '2024-11-16 19:43:29', NULL, NULL, NULL, NULL, NULL, NULL),
(291, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 19:48:49', NULL, NULL, 9500, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_28662.jpg', '2024-11-16 19:48:02', NULL, NULL, NULL, NULL, NULL, NULL),
(292, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 20:02:00', NULL, NULL, 9000, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_18001.jpg', '2024-11-16 20:01:37', NULL, NULL, NULL, NULL, NULL, NULL),
(293, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 20:08:35', NULL, NULL, 9500, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_24378.jpg', '2024-11-16 20:03:25', NULL, NULL, NULL, NULL, NULL, NULL),
(294, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 20:09:05', NULL, NULL, 9000, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_32372.jpg', '2024-11-16 20:07:06', NULL, NULL, NULL, NULL, NULL, NULL),
(295, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 20:12:46', NULL, NULL, 9500, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_21184.jpg', '2024-11-16 20:08:03', NULL, NULL, NULL, NULL, NULL, NULL),
(296, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Cancelled', NULL, NULL, NULL, NULL, 10000, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_23586.jpg', '2024-11-16 20:13:30', NULL, NULL, NULL, NULL, 'Cancelled', '2024-11-16 20:14:13'),
(297, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 20:15:36', NULL, NULL, 9500, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_24410.jpg', '2024-11-16 20:14:24', NULL, NULL, NULL, NULL, NULL, NULL),
(298, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-18', 'Approved', 'Approved', '2024-11-16 20:16:32', NULL, NULL, 14500, '3 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_27152.jpg', '2024-11-16 20:16:26', NULL, NULL, NULL, NULL, NULL, NULL),
(299, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 20:23:34', NULL, NULL, 9500, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_35243.jpg', '2024-11-16 20:23:21', NULL, NULL, NULL, NULL, NULL, NULL),
(300, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-18', 'Completed', 'Approved', '2024-11-16 20:26:31', 'Paid', '2024-11-16 22:21:13', 14000, '3 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_27824.jpg', '2024-11-16 20:26:22', 'Returned', '2024-11-16 22:21:22', 'Completed', '2024-11-16 22:21:22', NULL, NULL),
(301, 91, 36, 'Howo Sino Dump Truck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 20:27:49', NULL, NULL, 9000, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_34972.jpg', '2024-11-16 20:27:41', NULL, NULL, NULL, NULL, NULL, NULL),
(302, 91, 34, 'Isuzu Self Loading', '2024-11-16', '2024-11-19', 'Approved', 'Approved', '2024-11-16 20:28:49', NULL, NULL, 13000, '4 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_37773.jpg', '2024-11-16 20:28:44', NULL, NULL, NULL, NULL, NULL, NULL),
(303, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-19', 'Approved', 'Approved', '2024-11-16 20:29:21', NULL, NULL, 19000, '4 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_17014.jpg', '2024-11-16 20:29:15', NULL, NULL, NULL, NULL, NULL, NULL),
(304, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Approved', 'Approved', '2024-11-16 20:31:46', NULL, NULL, 9000, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_19974.jpg', '2024-11-16 20:31:39', NULL, NULL, NULL, NULL, NULL, NULL),
(305, 91, 38, 'Transit Mixer', '0000-00-00', '0000-00-00', 'Approved', 'Approved', '2024-11-16 21:21:34', NULL, NULL, 19000, '4 Loads', 4, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_12702.jpg', '2024-11-16 20:50:22', NULL, NULL, NULL, NULL, NULL, NULL),
(306, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-18', 'Approved', 'Approved', '2024-11-16 22:41:16', NULL, NULL, 12500, '3 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 2500, 0, 'receipt_21209.jpg', '2024-11-16 21:13:31', NULL, NULL, NULL, NULL, NULL, NULL),
(307, 91, 38, 'Transit Mixer', '0000-00-00', '0000-00-00', 'Approved', 'Approved', '2024-11-16 21:27:59', NULL, NULL, 0, '2 Loads', 2, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 0, 'receipt_1147.jpg', '2024-11-16 21:14:34', NULL, NULL, NULL, NULL, NULL, NULL),
(308, 91, 35, 'Isuzu Dumptruck', '2024-11-16', '2024-11-17', 'Completed', 'Approved', '2024-11-16 22:44:26', 'Paid', '2024-11-16 23:56:10', 6500, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 3500, 10000, 'receipt_40588.jpg', '2024-11-16 22:38:50', 'Returned', '2024-11-16 23:56:17', 'Completed', '2024-11-16 23:56:17', NULL, NULL),
(315, 91, 38, 'Transit Mixer', '0000-00-00', '0000-00-00', 'Pending', NULL, NULL, NULL, NULL, 10000, '2 Loads', 2, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 10000, '0', '2024-11-16 23:53:19', NULL, NULL, NULL, NULL, NULL, NULL),
(316, 91, 38, 'Transit Mixer', '0000-00-00', '0000-00-00', 'Pending', NULL, NULL, NULL, NULL, 15000, '3 Loads', 3, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 15000, '0', '2024-11-16 23:59:01', NULL, NULL, NULL, NULL, NULL, NULL),
(317, 91, 36, 'Howo Sino Dump Truck', '2024-11-16', '2024-11-17', 'Completed', 'Approved', '2024-11-16 23:59:56', 'Paid', '2024-11-17 00:01:24', 0, '2 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 1500, 10000, 'receipt_46584.jpg', '2024-11-16 23:59:48', 'Returned', '2024-11-17 03:55:08', 'Completed', '2024-11-17 03:55:08', NULL, NULL),
(318, 91, 36, 'Howo Sino Dump Truck', '2024-11-17', '2024-11-19', 'Completed', 'Approved', '2024-11-17 03:54:33', 'Paid', '2024-11-17 03:54:51', 0, '3 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 500, 15000, 'receipt_24088.jpg', '2024-11-17 00:10:06', 'Returned', '2024-11-17 03:54:59', 'Completed', '2024-11-17 03:54:59', NULL, NULL),
(319, 91, 38, 'Transit Mixer', '0000-00-00', '0000-00-00', 'Pending', NULL, NULL, NULL, NULL, 15000, '3 Loads', 3, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 15000, '0', '2024-11-17 00:47:42', NULL, NULL, NULL, NULL, NULL, NULL),
(320, 91, 36, 'Howo Sino Dump Truck', '2024-11-17', '2024-11-19', 'Pending', NULL, NULL, NULL, NULL, 15000, '3 days', NULL, 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', 0, 15000, 'receipt_8239.jpg', '2024-11-17 03:38:43', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sand_feedbacks`
--

CREATE TABLE `sand_feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sand_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sand_tbl`
--

CREATE TABLE `sand_tbl` (
  `id` int(11) NOT NULL,
  `sand` text NOT NULL,
  `rate_per_bucket` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sand_tbl`
--

INSERT INTO `sand_tbl` (`id`, `sand`, `rate_per_bucket`, `image`) VALUES
(2, 'Mixed S1/G1', 550, 'sand_43774.jpg'),
(3, 'Sand Gravel', 250, 'sand_13151.jpg'),
(4, 'S1 Selandra', 450, 'sand_45290.jpg'),
(7, 'Apple  Size', 2500, 'sand_28136.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `search_tbl`
--

CREATE TABLE `search_tbl` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `rate` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search_tbl`
--

INSERT INTO `search_tbl` (`id`, `category`, `rate`, `date`) VALUES
(3, 'Backhoes', 2000, '2024-05-07 00:42:19'),
(4, 'Bulldozers', 2000, '2024-05-12 20:37:31'),
(5, 'Bulldozers', 1000, '2024-05-12 20:37:54'),
(6, 'Bulldozers', 1000, '2024-05-12 20:39:58'),
(7, 'Bulldozers', 1000, '2024-05-12 20:46:07'),
(8, 'Bulldozers', 1000, '2024-05-12 20:47:32'),
(9, 'Bulldozers', 1000, '2024-05-12 21:26:10'),
(10, 'Trenchers', 1000, '2024-05-12 23:22:30'),
(11, 'Compactors', 1000, '2024-05-12 23:22:37'),
(12, 'Compactors', 1000, '2024-05-12 23:22:42'),
(13, 'Excavators', 1000, '2024-05-12 23:22:45'),
(14, 'Forwarder', 1000, '2024-05-12 23:22:49'),
(15, 'Dump Trucks', 1000, '2024-05-12 23:22:52'),
(16, 'Backhoes', 1000, '2024-05-12 23:22:57'),
(17, 'Backhoes', 1000, '2024-05-12 23:23:00'),
(18, 'Backhoes', 1000, '2024-05-12 23:23:03'),
(19, 'Backhoes', 1000, '2024-05-12 23:55:30'),
(20, 'Backhoes', 2000, '2024-06-28 02:18:26'),
(21, 'Bulldozers', 2000, '2024-06-28 02:21:56'),
(22, 'Bulldozers', 2000, '2024-06-28 02:22:28'),
(23, 'Backhoes', 3000, '2024-06-28 02:22:52'),
(24, 'Backhoes', 2000, '2024-06-28 02:23:24'),
(25, 'Loaders', 1000, '2024-06-28 02:25:41'),
(26, 'Backhoes', 2000, '2024-06-28 02:29:26'),
(27, 'Backhoes', 4000, '2024-06-28 02:37:59'),
(28, 'Compactors', 2000, '2024-08-28 12:57:53'),
(29, 'Compactors', 2000, '2024-09-04 00:54:28'),
(30, 'Backhoes', 1000, '2024-10-27 08:53:30'),
(31, 'Backhoes', 8000, '2024-10-27 08:53:56'),
(32, 'Trenchers', 4000, '2024-10-27 08:54:14'),
(33, 'Compactors', 8000, '2024-10-27 08:54:41'),
(34, 'Dump Trucks', 2000, '2024-10-30 09:12:02'),
(35, 'Backhoes', 1000, '2024-10-30 10:40:30'),
(36, 'Dump Trucks', 3000, '2024-10-30 10:48:03'),
(37, 'Dump Trucks', 4000, '2024-10-31 09:45:10'),
(38, 'Backhoes', 1000, '2024-10-31 11:25:31'),
(39, 'Mixers', 1000, '2024-10-31 11:25:42'),
(40, 'Mixers', 1000, '2024-10-31 12:27:04'),
(41, 'Mixers', 2000, '2024-10-31 12:27:16'),
(42, 'Loaders', 1000, '2024-10-31 12:27:37'),
(43, 'Loaders', 1000, '2024-10-31 12:28:24'),
(44, 'Backhoes', 1000, '2024-10-31 12:28:55'),
(45, 'Backhoes', 2000, '2024-10-31 12:32:27'),
(46, 'Forwarder', 1000, '2024-10-31 12:32:58'),
(47, 'Dump Trucks', 1000, '2024-10-31 12:33:03'),
(48, 'Mixers', 1000, '2024-10-31 12:34:22'),
(49, 'Mixers', 8000, '2024-10-31 12:36:31'),
(50, 'Compactors', 4000, '2024-10-31 12:36:40'),
(51, 'Compactors', 1000, '2024-10-31 12:36:48'),
(52, 'Compactors', 8000, '2024-10-31 12:36:59'),
(53, 'Backhoes', 1000, '2024-10-31 12:37:28'),
(54, 'Loaders', 1000, '2024-11-04 00:23:06'),
(55, 'Loaders', 7000, '2024-11-04 00:23:23'),
(56, 'Loaders', 1000, '2024-11-04 00:23:42'),
(57, 'Loaders', 8000, '2024-11-04 00:24:01'),
(58, 'Loaders', 1000, '2024-11-04 00:24:07'),
(59, 'Backhoes', 1000, '2024-11-04 00:25:01'),
(60, 'Backhoes', 1000, '2024-11-04 00:25:13'),
(61, 'Backhoes', 1000, '2024-11-04 00:25:42'),
(62, 'Backhoes', 1000, '2024-11-04 00:27:15'),
(63, 'Bulldozers', 5000, '2024-11-05 11:19:19'),
(64, 'Mixers', 5000, '2024-11-05 11:21:35'),
(65, 'Mixers', 5000, '2024-11-05 11:25:49'),
(66, 'Backhoes', 4000, '2024-11-05 11:27:06'),
(67, 'Loaders', 1000, '2024-11-05 12:40:31'),
(68, 'Mixers', 1000, '2024-11-05 12:40:57'),
(69, 'Mixers', 1000, '2024-11-09 04:37:57'),
(70, 'Backhoes', 0, '2024-11-16 21:55:05'),
(71, 'Backhoes', 0, '2024-11-16 21:56:10'),
(72, 'Mixers', 0, '2024-11-16 21:56:57'),
(73, 'Excavators', 0, '2024-11-16 22:09:26'),
(74, 'Mixers', 0, '2024-11-16 22:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `users_acc`
--

CREATE TABLE `users_acc` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `municipality` text NOT NULL,
  `barangay` text NOT NULL,
  `details` text NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_acc`
--

INSERT INTO `users_acc` (`id`, `user_name`, `phone`, `email`, `municipality`, `barangay`, `details`, `password`, `image`) VALUES
(91, 'Arcpogi', '09686409348', 'datarioarc16@gmail.com', 'Gloria', 'Kawit', 'djd water refilling station', '273754362edd9522e059e8cfa1d0cf36', 'user_8275.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins_acc`
--
ALTER TABLE `admins_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sand_feedbacks`
--
ALTER TABLE `sand_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sand_tbl`
--
ALTER TABLE `sand_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_tbl`
--
ALTER TABLE `search_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_acc`
--
ALTER TABLE `users_acc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins_acc`
--
ALTER TABLE `admins_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `sand_feedbacks`
--
ALTER TABLE `sand_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sand_tbl`
--
ALTER TABLE `sand_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `search_tbl`
--
ALTER TABLE `search_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users_acc`
--
ALTER TABLE `users_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
