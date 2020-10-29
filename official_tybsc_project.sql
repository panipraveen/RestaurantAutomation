-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 09:02 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `official_tybsc_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_cart`
--

CREATE TABLE `add_cart` (
  `id` int(20) NOT NULL,
  `register_id` int(20) NOT NULL,
  `menu_items_id` int(20) NOT NULL,
  `added_cost` int(20) NOT NULL,
  `quans` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_cart`
--

INSERT INTO `add_cart` (`id`, `register_id`, `menu_items_id`, `added_cost`, `quans`) VALUES
(5, 18, 4, 900, 3),
(6, 18, 18, 400, 4),
(22, 14, 1, 300, 1),
(23, 14, 2, 50, 1),
(24, 18, 4, 300, 1),
(25, 18, 4, 300, 1),
(26, 18, 1, 300, 1),
(27, 18, 18, 100, 1),
(28, 18, 19, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int(30) NOT NULL,
  `added_id` int(30) NOT NULL,
  `own_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `added_id`, `own_id`) VALUES
(6, 19, 14),
(7, 20, 14);

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact_1` bigint(20) NOT NULL,
  `contact_2` bigint(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `menu_list` varchar(500) NOT NULL,
  `event` varchar(300) NOT NULL,
  `quantity` int(20) NOT NULL,
  `register_id` int(20) NOT NULL,
  `paid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`id`, `name`, `contact_1`, `contact_2`, `address`, `city`, `state`, `email`, `date`, `time`, `menu_list`, `event`, `quantity`, `register_id`, `paid`) VALUES
(1, 'mrignayna', 7977322674, 8450902601, 'kisan nagar,thane(w)', 'thane', 'maharashtra', 'mrignaynapatil.1997@gmail.com', '2020-03-15', '04:02:00.000000', 'WHITE CHOCOLATE CAKE,\r\nGENIOSE CAKE,\r\n', 'we', 2, 18, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `order_id` int(20) NOT NULL,
  `table_no` int(20) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `cost` int(20) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`order_id`, `table_no`, `food_name`, `quantity`, `cost`, `payment`, `payment_type`, `date`, `time`) VALUES
(1, 2, 'asdasd', 2, 1235, 'paid', 'card', '2019-12-04', '11:00:00.000000'),
(2, 5, 'asdas', 4, 2568, 'not paid', 'cash', '2019-12-11', '20:00:00.000000'),
(3, 4, 'Ice Cream', 5, 500, 'not paid', 'card', '2019-12-21', '11:13:19.000000');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) NOT NULL,
  `register_id` int(20) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `rating` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `register_id`, `feedback`, `rating`) VALUES
(2, 14, 'asdas', 'best'),
(3, 14, 'sdadad', 'good'),
(4, 14, 'ajdhjknjkgndkjngjkdfngjkdnfjkgndjkngjkdnjkgndjkgnjkdngdngjkdfg', 'worst'),
(6, 14, 'Food Was Good', 'good'),
(7, 14, 'asdasdadada', 'worst'),
(8, 18, 'Food was poor', 'worst'),
(9, 18, 'abhi tk deliver hua nhi', 'good'),
(10, 14, 'Food was Good', 'good'),
(11, 14, 'Food was Good', 'best'),
(12, 14, 'Food was Good', 'best'),
(13, 14, 'Food was Good', 'best'),
(14, 14, 'Food was Good', 'best'),
(15, 14, 'Food was Good', 'best');

-- --------------------------------------------------------

--
-- Table structure for table `finished_cater`
--

CREATE TABLE `finished_cater` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact_1` bigint(20) NOT NULL,
  `contact_2` bigint(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `menu_list` varchar(500) NOT NULL,
  `event` varchar(300) NOT NULL,
  `quantity` int(20) NOT NULL,
  `register_id` int(20) NOT NULL,
  `paid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finished_cater`
--

INSERT INTO `finished_cater` (`id`, `name`, `contact_1`, `contact_2`, `address`, `city`, `state`, `email`, `date`, `time`, `menu_list`, `event`, `quantity`, `register_id`, `paid`) VALUES
(2, 'jkfsbndkjfqk', 1321321321, 8479848949, 'alksjdasdlkaslk', 'llaksdlkalk', 'lklaksdlasld', 'lalksndlk@gmail.com', '2020-03-20', '12:23:00.000000', 'WHITE CHOCOLATE CAKE,\r\nFlourless chocolate cake,\r\n', 'awdasd', 36547, 14, 'Confirm'),
(3, 'Prince', 5455446465, 6546546546, 'mashjkdbjk', 'dhajsdjakj', 'kjansjkdnakjdnjk', 'kjdnakjsdnkjNK@gmail.com', '2020-02-29', '21:23:00.000000', 'GENIOSE CAKE,\r\nWHITE CHOCOLATE CAKE,\r\n', 'ajksdhiasd', 20000, 14, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(20) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `category`) VALUES
(1, 'cake'),
(11, 'dosa');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `food_image` varchar(40) NOT NULL,
  `food_name` varchar(40) NOT NULL,
  `food_description` varchar(100) NOT NULL,
  `cost` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `category`, `food_image`, `food_name`, `food_description`, `cost`) VALUES
(1, 'cake', 'cake.jpg', 'WHITE CHOCOLATE CAKE', 'A Chocolate cake which is white in color', '300'),
(2, 'cake', 'geniose.jpg', 'GENIOSE CAKE', 'Cake which is different', '50'),
(3, 'cake', 'Flourless_chocolate_cake.jpg', 'Flourless chocolate cake', 'as the name suggest it is flourless', '100'),
(4, 'cake', 'Chocolate_cake.jpg', 'CHOCOLATE', 'It is a Normal Cake with Chocolate', '300'),
(18, 'dosa', 'dosa2.jpg', 'Masala dosa', 'A Dosa which contains Masala inside it', '100'),
(19, 'dosa', 'dosa1.jpeg', 'masala1', 'asdaskdklmald', '50');

-- --------------------------------------------------------

--
-- Table structure for table `online_counter`
--

CREATE TABLE `online_counter` (
  `order_id` int(30) NOT NULL,
  `table_no` int(30) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` int(30) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_counter`
--

INSERT INTO `online_counter` (`order_id`, `table_no`, `food_name`, `quantity`, `cost`, `payment`, `payment_type`, `date`, `time`) VALUES
(1, 4, 'Chocolate', 2, 100, 'not paid', 'card', '2019-12-19', '12:09:14.094172'),
(2, 1, 'Ice Cream', 6, 600, 'not paid', 'cash', '2020-01-01', '05:33:59.000000'),
(3, 5, 'Dosa', 3, 300, 'paid', 'card', '2020-01-05', '22:53:22.585257');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(20) NOT NULL,
  `order_id` bigint(40) NOT NULL,
  `register_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `register_id`) VALUES
(3, 15838579193485, 18),
(4, 15842638033663, 14),
(5, 15842641502722, 14),
(6, 15842641598528, 14),
(8, 15842642455057, 14);

-- --------------------------------------------------------

--
-- Table structure for table `otp_expiry`
--

CREATE TABLE `otp_expiry` (
  `id` int(20) NOT NULL,
  `otp` int(30) NOT NULL,
  `is_expired` int(30) NOT NULL,
  `created_at` varchar(40) NOT NULL,
  `e_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_expiry`
--

INSERT INTO `otp_expiry` (`id`, `otp`, `is_expired`, `created_at`, `e_mail`) VALUES
(1, 769863, 0, '2020-01-26 19:35:49', 'panipraveen37@gmail.com'),
(2, 457649, 0, '2020-01-26 19:37:11', 'panipraveen37@gmail.com'),
(3, 176605, 0, '2020-02-04 18:58:35', 'jnadar63@gmail.com'),
(4, 638923, 0, '2020-02-04 18:59:46', 'jnadar63@gmail.com'),
(5, 824501, 0, '2020-02-04 19:38:54', 'panipraveen37@gmail.com'),
(6, 967666, 0, '2020-02-04 19:39:00', 'panipraveen37@gmail.com'),
(7, 139380, 0, '2020-02-04 19:48:03', 'panipraveen37@gmail.com'),
(8, 389943, 0, '2020-02-04 19:54:22', 'panipraveen37@gmail.com'),
(9, 979402, 0, '2020-02-04 19:56:13', 'panipraveen37@gmail.com'),
(10, 393705, 0, '2020-02-04 19:59:33', 'panipraveen37@gmail.com'),
(11, 276685, 0, '2020-02-04 20:07:36', 'panipraveen37@gmail.com'),
(12, 969928, 0, '2020-02-16 14:16:25', 'panipraveen37@gmail.com'),
(13, 543041, 0, '2020-02-16 14:19:55', 'panipraveen37@gmail.com'),
(14, 546189, 0, '2020-02-16 14:22:05', 'panipraveen37@gmail.com'),
(15, 632228, 0, '2020-02-16 14:25:18', 'panipraveen37@gmail.com'),
(16, 408384, 0, '2020-02-16 14:26:36', 'panipraveen37@gmail.com'),
(17, 428281, 0, '2020-02-16 14:34:52', 'panipraveen37@gmail.com'),
(18, 205677, 0, '2020-02-16 14:35:45', 'panipraveen37@gmail.com'),
(19, 369909, 0, '2020-02-16 14:52:47', 'panipraveen37@gmail.com'),
(20, 449021, 0, '2020-02-16 14:58:03', 'panipraveen37@gmail.com'),
(21, 254188, 0, '2020-02-16 14:58:41', 'panipraveen37@gmail.com'),
(22, 268211, 0, '2020-02-18 01:13:31', 'panipraveen37@gmail.com'),
(23, 222965, 0, '2020-02-18 01:25:32', 'panipraveen37@gmail.com'),
(24, 125104, 0, '2020-02-20 19:57:11', 'panipraveen37@gmail.com'),
(25, 537561, 0, '2020-02-20 19:57:59', 'panipraveen37@gmail.com'),
(26, 640998, 0, '2020-02-20 19:59:44', 'panipraveen37@gmail.com'),
(27, 886060, 0, '2020-02-22 20:24:09', 'jnadar63@gmail.com'),
(28, 920479, 0, '2020-02-24 20:19:03', 'panipraveen37@gmail.com'),
(29, 320954, 0, '2020-03-04 12:26:20', 'panipraveen37@gmail.com'),
(30, 721556, 0, '2020-03-06 20:31:15', 'panipraveen37@gmail.com'),
(31, 116954, 0, '2020-03-15 14:56:47', 'panipraveen37@gmail.com'),
(32, 140150, 0, '2020-03-15 15:00:15', 'panipraveen37@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `paid_order`
--

CREATE TABLE `paid_order` (
  `id` int(20) NOT NULL,
  `order_id` bigint(50) NOT NULL,
  `register_id` int(20) NOT NULL,
  `menu_items_id` int(20) NOT NULL,
  `cost` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `payment` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paid_order`
--

INSERT INTO `paid_order` (`id`, `order_id`, `register_id`, `menu_items_id`, `cost`, `quantity`, `payment`, `date`, `time`) VALUES
(13, 15833480997407, 14, 1, 300, 1, 'notpaid', '2020-03-05', '12:24:59.000000'),
(14, 15833480997407, 14, 2, 50, 1, 'notpaid', '2020-03-05', '12:24:59.000000'),
(15, 15833480997407, 14, 3, 100, 1, 'notpaid', '2020-03-05', '12:24:59.000000'),
(16, 15833481361606, 14, 18, 100, 1, 'notpaid', '2020-03-05', '12:25:36.000000'),
(17, 15833481361606, 14, 19, 50, 1, 'notpaid', '2020-03-05', '12:25:36.000000'),
(18, 15833523781972, 1, 18, 100, 1, 'notpaid', '2020-03-05', '01:36:18.000000'),
(19, 15833523781972, 1, 19, 50, 1, 'notpaid', '2020-03-05', '01:36:18.000000'),
(20, 15833523703276, 1, 1, 300, 1, 'notpaid', '2020-03-05', '01:36:10.000000'),
(21, 15833523703276, 1, 2, 50, 1, 'notpaid', '2020-03-05', '01:36:10.000000'),
(22, 15833523703276, 1, 3, 100, 1, 'notpaid', '2020-03-05', '01:36:10.000000'),
(23, 15834754797290, 1, 18, 400, 4, 'notpaid', '2020-03-06', '11:47:59.000000'),
(24, 15834754797290, 1, 19, 50, 1, 'notpaid', '2020-03-06', '11:47:59.000000'),
(25, 15835015159981, 1, 18, 500, 5, 'notpaid', '2020-03-06', '07:01:55.000000'),
(26, 15835015159981, 1, 19, 200, 4, 'notpaid', '2020-03-06', '07:01:56.000000'),
(27, 15837517931118, 18, 3, 500, 5, 'notpaid', '2020-03-09', '04:33:13.000000'),
(28, 15838579291952, 18, 4, 1500, 5, 'notpaid', '2020-03-10', '10:02:09.000000'),
(29, 15838577457966, 14, 1, 1500, 5, 'notpaid', '2020-03-10', '09:59:05.000000'),
(30, 15838577457966, 14, 18, 500, 5, 'notpaid', '2020-03-10', '09:59:05.000000');

-- --------------------------------------------------------

--
-- Table structure for table `place_order`
--

CREATE TABLE `place_order` (
  `id` int(20) NOT NULL,
  `order_ref_id` int(20) NOT NULL,
  `menu_items_id` int(20) NOT NULL,
  `added_cost` int(20) NOT NULL,
  `quans` int(11) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_order`
--

INSERT INTO `place_order` (`id`, `order_ref_id`, `menu_items_id`, `added_cost`, `quans`, `payment`, `date`, `time`) VALUES
(5, 3, 19, 200, 4, 'notpaid', '2020-03-10', '10:01:59'),
(6, 3, 4, 1200, 4, 'notpaid', '2020-03-10', '10:01:59'),
(7, 3, 1, 300, 1, 'notpaid', '2020-03-10', '10:01:59'),
(8, 3, 2, 50, 1, 'notpaid', '2020-03-10', '10:01:59'),
(9, 4, 1, 300, 1, 'notpaid', '2020-03-15', '02:46:43'),
(10, 4, 2, 50, 1, 'notpaid', '2020-03-15', '02:46:43'),
(11, 4, 4, 300, 1, 'notpaid', '2020-03-15', '02:46:43'),
(12, 4, 4, 300, 1, 'notpaid', '2020-03-15', '02:46:43'),
(13, 5, 3, 100, 1, 'notpaid', '2020-03-15', '02:52:30'),
(14, 5, 2, 50, 1, 'notpaid', '2020-03-15', '02:52:30'),
(15, 6, 18, 100, 1, 'notpaid', '2020-03-15', '02:52:39'),
(16, 6, 19, 50, 1, 'notpaid', '2020-03-15', '02:52:39'),
(17, 8, 1, 300, 1, 'notpaid', '2020-03-15', '02:54:05'),
(18, 8, 1, 300, 1, 'notpaid', '2020-03-15', '02:54:05'),
(19, 8, 1, 300, 1, 'notpaid', '2020-03-15', '02:54:05'),
(20, 8, 1, 300, 1, 'notpaid', '2020-03-15', '02:54:05'),
(21, 8, 3, 100, 1, 'notpaid', '2020-03-15', '02:54:05'),
(22, 8, 4, 300, 1, 'notpaid', '2020-03-15', '02:54:05'),
(23, 8, 4, 300, 1, 'notpaid', '2020-03-15', '02:54:05'),
(24, 8, 18, 100, 1, 'notpaid', '2020-03-15', '02:54:05'),
(25, 8, 19, 50, 1, 'notpaid', '2020-03-15', '02:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile_number` bigint(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `address`, `password`, `mobile_number`, `email`, `role`) VALUES
(14, 'praveen_admin', 'hjkhjkhjkhjkhjkhjkhjkjhjkhjkjhjkhjkhkhkhtgytut', '7cd12f52a7f25e50316a1ff9272d21b4f526f714', 1231231233, 'panipraveen37@gmail.com', 'admin'),
(18, 'praveen', 'some Place inside the Earth', '6b791cb5f93a2420d6745cd0b48c9795d9ab580b', 1234567899, 'panipraveen37@gmail.com', 'customer'),
(19, 'testing', 'aknjfkjsnfkjsndkfjnakjndfkjnaskfnksjdfnkja', '4c0d2b951ffabd6f9a10489dc40fc356ec1d26d5', 9876543211, 'testing@gmail.com', 'admin'),
(20, 'testing_02', 'Sion, Mumbai, Maharashtra, India, Earth', 'e748797518c5ccb9cff30c860a6dc47f10e2589a', 1122334455, 'testing_02@yahoo.com', 'manager'),
(21, 'testing', 'asldkjaslkdjalksdlkajlkdaljdlkajldlnalksndlasndlaaldnlansl', '4c0d2b951ffabd6f9a10489dc40fc356ec1d26d5', 3214569978, 'testing@yahoo.com', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(20) NOT NULL,
  `register_id` int(20) NOT NULL,
  `supply_list` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `register_id`, `supply_list`, `date`, `time`) VALUES
(2, 14, 'new1-200\r\nnew2-500', '2020-03-10', '10:17:17.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_cart`
--
ALTER TABLE `add_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id_relation` (`menu_items_id`),
  ADD KEY `register_id_relation` (`register_id`);

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catering_id` (`register_id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register_id` (`register_id`);

--
-- Indexes for table `finished_cater`
--
ALTER TABLE `finished_cater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_counter`
--
ALTER TABLE `online_counter`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_order`
--
ALTER TABLE `paid_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_order`
--
ALTER TABLE `place_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ref_id` (`order_ref_id`),
  ADD KEY `menu_ref_id` (`menu_items_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_cart`
--
ALTER TABLE `add_cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `finished_cater`
--
ALTER TABLE `finished_cater`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `paid_order`
--
ALTER TABLE `paid_order`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `place_order`
--
ALTER TABLE `place_order`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_cart`
--
ALTER TABLE `add_cart`
  ADD CONSTRAINT `menu_id_relation` FOREIGN KEY (`menu_items_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `register_id_relation` FOREIGN KEY (`register_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catering`
--
ALTER TABLE `catering`
  ADD CONSTRAINT `catering_id` FOREIGN KEY (`register_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `register_id` FOREIGN KEY (`register_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place_order`
--
ALTER TABLE `place_order`
  ADD CONSTRAINT `menu_ref_id` FOREIGN KEY (`menu_items_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ref_id` FOREIGN KEY (`order_ref_id`) REFERENCES `order_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
