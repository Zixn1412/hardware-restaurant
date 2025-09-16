CREATE DATABASE IF NOT EXISTS `hardwarert`;
USE `hardwarert`;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2025 at 04:13 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hardwarert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin.work`
--

CREATE TABLE `admin.work` (
  `ad_idcard` int(13) NOT NULL,
  `ad_name` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `ad_address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `ad_tel` int(10) NOT NULL,
  `ad_email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `ad_status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin.work`
--

INSERT INTO `admin.work` (`ad_idcard`, `ad_name`, `ad_address`, `ad_tel`, `ad_email`, `ad_status`) VALUES
(2147483647, 'jinjin', 'ขอนแก่น ประเทศไทย', 650000000, 'jin@gmail.com', 'pending'),
(2147483647, 'kok kok ', 'ขอนแก่น ประเทศไทย', 647777777, 'kok@gmail.com', 'pending'),
(2147483647, 'กุ๊กกุ๊ก ไก่', 'ขอนแก่น ประเทศไทย', 288888888, 'kokkk@gmail.com', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer.work`
--

CREATE TABLE `customer.work` (
  `ct_idcard` int(13) NOT NULL,
  `ct_photo` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `ct_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ct_address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `ct_tel` int(10) NOT NULL,
  `ct_email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `ct_pass` int(8) NOT NULL,
  `ct_status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer.work`
--

INSERT INTO `customer.work` (`ct_idcard`, `ct_photo`, `ct_name`, `ct_address`, `ct_tel`, `ct_email`, `ct_pass`, `ct_status`) VALUES
(2147483647, 'กรรมการอาชีวศึกษา.png', 'jjjjj jin', 'ขอนแก่น', 230000333, 'jin023@gmail.com', 55555555, 'pending'),
(2147483647, 'jinnnnnnnnnn', 'Screenshot 2025-02-04 104233.png', '0234444444', 0, 'jin02@gmail.com', 22222222, 'pending'),
(2147483647, 'Logo-KVC.gif', 'lll lll', 'ขอนแก่น', 655555555, 'jin05@gmail.com', 55555555, 'pending'),
(2147483647, 'ผมไก่', '11535790_104676059873806_8614165966398210864_n.jpg', '3232323232', 0, 'kaikai@gamil.com', 2020202, ''),
(2147483647, 'ไก่ไก่ ป๊อก', 'roast-chicken.png', '0230000000', 0, 'kaikai@gmail.com', 22222222, ''),
(2147483647, 'logo ขม.png', 'lol', 'ขอนแก่น', 1000000000, 'lol@gmail.com', 55555555, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `delivery.work`
--

CREATE TABLE `delivery.work` (
  `del_idcard` int(13) NOT NULL,
  `del_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `del_photo` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `del_tel` int(10) NOT NULL,
  `del_address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `del_email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `del_pass` int(8) NOT NULL,
  `del_status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery.work`
--

INSERT INTO `delivery.work` (`del_idcard`, `del_name`, `del_photo`, `del_tel`, `del_address`, `del_email`, `del_pass`, `del_status`) VALUES
(2147483647, 'สมพร', 'กรรมการอาชีวศึกษา.png', 988888888, 'ขอนแก่น', 'pron@gmail.com', 22222222, 'pending'),
(2147483647, 'ทรงยศ', 'กรรมการอาชีวศึกษา.png', 658888888, 'ขอนแก่น', 'yos@gmail.com', 22225555, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `mune.work`
--

CREATE TABLE `mune.work` (
  `mn_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mn_photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mn_price` int(5) NOT NULL,
  `mn_id` varchar(5) NOT NULL,
  `mn_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mune.work`
--

INSERT INTO `mune.work` (`mn_name`, `mn_photo`, `mn_price`, `mn_id`, `mn_quantity`) VALUES
('หมาล่าสูตรต้นตำรับ', '1', 95, 'mn01', 0),
('หมาล่าซุปกระดูกหมู', '2', 85, 'mn02', 0),
('หมาล่าซุปน้ำดำ', '3', 85, 'mn03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order.work`
--

CREATE TABLE `order.work` (
  `ct_name` varchar(10) NOT NULL,
  `ct_tel` int(10) NOT NULL,
  `ct_address` varchar(100) NOT NULL,
  `mn_name` varchar(100) NOT NULL,
  `mn_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant.work`
--

CREATE TABLE `restaurant.work` (
  `res_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `res_photo` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `res_address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `res_tel` int(10) NOT NULL,
  `res_email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `res_pass` int(8) NOT NULL,
  `res_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant.work`
--

INSERT INTO `restaurant.work` (`res_name`, `res_photo`, `res_address`, `res_tel`, `res_email`, `res_pass`, `res_status`) VALUES
('ร้านไก่โอ้กwaa', 'logo ขม.png', 'ขอนแก่น', 430002233, '3333@gmail.com', 88888888, 'pending'),
('ร้านไก่โอ้ก', 'องการนักวิชาชีพ.png', 'ขอนแก่น', 430000000, 'kaijai@gmail.com', 88888888, 'pending'),
('กุ๊กไก่', 'กรรมการอาชีวศึกษา.png', 'ขอนแก่น', 430002233, 'kokkai@gmail.com', 99999999, 'pending'),
('หมาล่าเนื้อ', 'mamala.png', 'ขอนแก่น', 2147483647, 'mamala@gamil.com', 79797979, '');

-- --------------------------------------------------------

--
-- Table structure for table `sales.work`
--

CREATE TABLE `sales.work` (
  `mn_id` int(5) NOT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `sale_date` timestamp NOT NULL,
  `quantity` int(100) DEFAULT NULL,
  `sale_id` int(10) NOT NULL,
  `mn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales.work`
--

INSERT INTO `sales.work` (`mn_id`, `total_price`, `sale_date`, `quantity`, `sale_id`, `mn_name`) VALUES
(123456789, '95', '2025-02-04 17:00:00', 2, 123456789, ''),
(123456789, '95', '2025-02-04 17:00:00', 2, 123456789, 'หมาล่าซุปน้ำดำ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin.work`
--
ALTER TABLE `admin.work`
  ADD PRIMARY KEY (`ad_email`);

--
-- Indexes for table `customer.work`
--
ALTER TABLE `customer.work`
  ADD PRIMARY KEY (`ct_email`);

--
-- Indexes for table `delivery.work`
--
ALTER TABLE `delivery.work`
  ADD PRIMARY KEY (`del_email`);

--
-- Indexes for table `restaurant.work`
--
ALTER TABLE `restaurant.work`
  ADD PRIMARY KEY (`res_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
