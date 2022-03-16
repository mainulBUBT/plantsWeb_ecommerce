-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 08:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f_courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `aid` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `dhk_1kg` varchar(20) DEFAULT NULL,
  `dhk_3kg` varchar(20) DEFAULT NULL,
  `out_dhk_3kg` varchar(20) NOT NULL,
  `out_dhk_5kg` varchar(20) NOT NULL,
  `next_dhk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`aid`, `admin_name`, `admin_pass`, `photo`, `dhk_1kg`, `dhk_3kg`, `out_dhk_3kg`, `out_dhk_5kg`, `next_dhk`) VALUES
(1, 'Mihan', 'a01610228fe998f515a72dd730294d87', '10641034_765774853488260_4430310261071271602_n.jpg', '70  ', '90  ', '130 ', '150 ', '100 ');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_info`
--

CREATE TABLE `delivery_info` (
  `del_id` int(11) NOT NULL,
  `del_area` varchar(100) DEFAULT NULL,
  `col_amount` int(11) DEFAULT NULL,
  `recv_name` varchar(50) DEFAULT NULL,
  `recv_number` varchar(50) DEFAULT NULL,
  `recv_address` varchar(100) DEFAULT NULL,
  `bok_date` datetime NOT NULL DEFAULT current_timestamp(),
  `m_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_info`
--

INSERT INTO `delivery_info` (`del_id`, `del_area`, `col_amount`, `recv_name`, `recv_number`, `recv_address`, `bok_date`, `m_id`) VALUES
(33, 'Outside Dhaka', 120, 'abc', '12345678', 'fsaf faafs', '2020-03-31 00:00:00', 1),
(42, 'Outside Dhaka', 160, 'nafiz', '123456789', 'Rupnagar R/A Dhak-1216', '2020-03-31 00:00:00', 1),
(43, 'Dhaka Metro', 120, 'Abc mahmud', '12345678', 'Mirpur-11/C, Av-5, Road-23, Dhaka-1216', '2020-03-31 00:00:00', 2),
(44, 'Dhaka Metro', 60, 'bbc', '1233', 'oldkd dsnblj', '2020-04-01 00:00:00', 2),
(45, 'Dhaka Metro', 120, 'mihan', '01673303919', 'Mirpur-11, Block-C, Av-5, Lane-23, Dhaka-1216', '2020-04-01 00:00:00', 3),
(46, 'Dhaka Metro', 110, 'acd', '13143', 'yhgiug jkgbkjvk', '2020-04-01 00:00:00', 1),
(47, 'Dhaka Metro', 110, 'heyq', '1214', 'fafEFEFE', '2020-04-03 00:00:00', 2),
(54, 'Dhaka Metro', 120, 'abcd', '12345678', 'fsafasf', '2020-04-03 00:00:00', 1),
(55, 'Dhaka Metro', 120, 'adada', '12345678', 'efaw', '2020-04-03 00:00:00', 1),
(56, 'Dhaka Metro', 120, 'adada', '12345678', 'dafa', '2020-04-03 00:00:00', 1),
(57, 'Dhaka Metro', 120, 'adada', '12345678', 'dafa', '2020-04-03 00:00:00', 1),
(58, 'Dhaka Metro', 0, 'acccc', '12345678', 'dadfaafd', '2020-04-03 00:00:00', 1),
(59, 'Outside Dhaka', 0, 'abcd', '1214', 'sknakds', '2020-04-03 00:00:00', 1),
(60, 'Dhaka Metro', 0, 'mihan', '12345678', 'dafad sffda', '2020-04-03 00:00:00', 1),
(61, 'Outside Dhaka', 0, 'aaaaaaaaa', '1214', 'wfafwfqwe', '2020-04-03 00:00:00', 1),
(64, 'Outside Dhaka', 0, 'vox', '1214', 'shdlhdlISD VFS', '2020-04-04 00:00:00', 3),
(65, 'Outside Dhaka', 150, 'nafu', '1234', 'lasjasid', '2020-04-04 00:00:00', 1),
(67, 'Dhaka Metro', 170, 'Hridoy', '123456789', 'Savar Dhaka', '2020-04-04 00:00:00', 1),
(68, 'Dhaka Metro', 200, 'Sima', '12345678', 'khasdgasdha', '2020-04-04 00:00:00', 1),
(69, 'Dhaka Metro', 0, 'Arafat', '1214', 'ashdajldla', '2020-04-04 00:00:00', 1),
(70, 'Dhaka Metro', 160, 'abcd', '12345678', 'afsfarw', '2020-04-04 00:00:00', 8),
(71, 'Dhaka Metro', 0, 'mihan', '12345678', 'lsjlkjfas', '2020-04-04 00:00:00', 8),
(72, 'Outside Dhaka', 160, 'ami', '12345678', 'lhdflkhsaldf', '2020-04-05 00:00:00', 8),
(73, 'Outside Dhaka', 0, 'hello', '12345678', 'dnknADF', '2020-04-05 00:00:00', 8),
(74, 'Outside Dhaka', 160, 'hello2', '231346', 'asfgsg', '2020-04-05 00:00:00', 8),
(75, 'Dhaka Metro', 0, 'ami2', '12345678', 'wfaf', '2020-04-05 00:00:00', 8),
(76, 'Dhaka Metro', 160, 'ami3', '122321', 'fvcfsaaaa', '2020-04-05 00:00:00', 8),
(77, 'Dhaka Metro', 0, 'saiam', '1234', 'afsj iadpjsf', '2020-04-05 00:00:00', 1),
(78, 'Outside Dhaka', 200, 'Sima', '12345678', 'abc abc abc abc abc', '2020-04-16 00:00:00', 1),
(79, 'Dhaka Metro', 300, 'Shamsul Islam', '123456789', 'Plot # 77-78, Road # 9, Rupnagar R/A Mirpur-2 Dhaka, 1216', '2020-04-21 02:30:48', 1),
(80, 'Dhaka Metro', 170, 'Jambu', '12345678', 'afafaf gsfgsg tadgfga dgsgag taggaer ethtahgatg thathateh ergaregaer', '2020-04-25 00:00:00', 2),
(81, 'Outside Dhaka', 100, 'hridoy', '1214', 'dgakjd akjgdakjhald', '2020-04-26 12:49:32', 1),
(82, 'Dhaka Metro', 200, 'mihu', '1234', 'dqdad fawfwar', '2020-05-28 21:22:00', 1),
(84, 'Dhaka Metro', 60, 'Mihannnn', '1234567', 'abc abc abc abc', '2020-07-31 22:13:49', 2),
(85, 'Dhaka Metro', 0, 'max', '123456789', 'akhgdakjdga akjgdkajghd kjagdkajdh', '2020-08-07 22:33:23', 1),
(86, 'Dhaka Metro', 100, 'simmma penguin', '12345', 'kudgakjsdh kjagdkajgsdk kjgasdkjagsd', '2020-08-07 22:40:12', 1),
(89, 'Outside Dhaka', 120, 'max max', '1234567', 'adfa asfaf', '2020-08-11 22:10:14', 2),
(99, 'Dhaka Metro', 60, 'adadf', '1234567', 'dfasf', '2020-08-14 10:19:20', 1),
(100, 'Dhaka Metro', 60, 'max', '1234567', 'fsdfsdf', '2020-08-22 15:31:18', 1),
(103, 'Dhaka Metro', 60, 'Saiful', '1213', 'rtaswrtgft dtegsd', '2020-11-06 15:21:39', 1),
(105, 'Outside Dhaka', 120, 'Abc', '123456789', 'afaf af af demo', '2021-03-01 00:58:54', 1),
(106, 'Dhaka Metro', 120, 'Show Just', '123456789', 'sgasfdgvs dgsdgfasdgf', '2021-03-01 01:07:29', 1),
(107, 'Dhaka Metro', 0, 'new', '123456789', 'wwwwwww', '2021-07-08 14:43:23', 1),
(108, 'Dhaka Metro', 0, 'new2', '123456789', 'wwwwwww', '2021-07-08 14:51:16', 1),
(110, NULL, NULL, 'new bind', '123456789', 'fafaf', '2021-07-13 19:33:03', 1),
(111, NULL, 0, 'new bind 2', '123456789', 'afafaf', '2021-07-13 19:37:06', 1),
(112, NULL, 0, 'new bind 3', '123456789', 'Dhaka Metro', '2021-07-13 19:38:33', 1),
(113, 'Dhaka Metro', 0, 'new bind 4', '123456789', 'afafagf', '2021-07-13 19:41:07', 1),
(120, 'Dhaka Metro', 120, 'ajke', '123456789', 'dfsfsfsf', '2021-07-15 00:05:03', 1),
(121, 'Dhaka Metro', 120, 'new bind h', '123456789', 'faefafa', '2021-07-15 00:09:14', 1),
(122, 'Dhaka Metro', 130, 'ajke 2', '123456789', 'fa', '2021-07-15 00:10:54', 1),
(123, 'Dhaka Metro', 130, 'ajke', 'dafa', 'faafaf', '2021-07-15 00:13:27', 1),
(125, 'Dhaka Metro', 0, 'out', '123456789', 'fasfasfd', '2021-07-15 00:27:08', 1),
(126, 'Outside Dhaka', 0, 'out 2', '123456789', 'fdafaf', '2021-07-15 00:28:52', 1),
(127, 'Outside Dhaka', 0, 'out 3', '123456789', 'dad', '2021-07-15 00:30:35', 1),
(130, 'Next Day', 90, 'next', '123456789', 'afafa', '2021-07-15 01:09:27', 1),
(131, 'Next Day', 130, 'FINAL', '123456789', 'FAFA', '2021-07-15 01:42:11', 1),
(135, 'Outside Dhaka', 135, 'Arafat', '123456789', 'dsfadfad', '2021-07-28 21:43:48', 1),
(136, 'Next Day', 99, 'Arafat', '123456789', 'afdadf', '2021-07-28 21:50:31', 1),
(141, 'Dhaka Metro', 50, 'acccc', '123456789', 'afaf', '2021-07-28 22:39:02', 1),
(142, 'Dhaka Metro', 70, 'acccc', '123456789', 'adad', '2021-07-28 22:41:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(6) UNSIGNED NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_email` varchar(50) DEFAULT NULL,
  `emp_mob` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `emp_pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `emp_email`, `emp_mob`, `reg_date`, `emp_pass`) VALUES
(1, 'monju', 'abc@gmail.com', '123456789', '2020-04-24 17:26:21', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Rahman', 'acd@gmail.com', '12345678', '2020-04-24 17:03:39', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Sojol', 'aaaa@gmail.com', '123456789', '2020-04-24 17:03:43', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'abcd', 'new@gmail.com', '121212', '2021-07-27 11:47:40', NULL),
(5, 'check', 'aaaaa@gmail.com', '121212', '2021-07-27 11:48:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `m_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `pickup_add` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `balance` varchar(100) NOT NULL,
  `due_charge` varchar(100) NOT NULL,
  `bkash` varchar(11) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`m_id`, `name`, `email`, `mobile`, `pass`, `pickup_add`, `photo`, `balance`, `due_charge`, `bkash`, `bank`, `reg_time`) VALUES
(1, 'Mihan', 'mihan@gmail.com', '01673303919', '81dc9bdb52d04dc20036dbd8313ed055', 'Mirpur-11, Av-5', '119887190_2745497292373192_7662651510918107982_n.jpg', '850', '1120', '', '', '2021-07-08 06:45:02'),
(2, 'Sima', 'abc@gmail.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055', 'Rupnagar R/A', 'Sima.jpg', '0', '0', '', '', '2021-07-08 06:45:02'),
(3, 'faisal', 'db@gmail.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055', 'Dhaka Mirpur-2', 'foysal.jpg', '60', '100', '', '', '2021-07-08 06:45:02'),
(5, 'Nafiz', 'acd@gmail.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055', 'Rupnaga R/A', NULL, '', '', '', '', '2021-07-08 06:45:02'),
(8, 'yesmine', 'ffdfd@gmail.com', '676789980', '698d51a19d8a121ce581499d7b701668', 'BUBT Rupnagar', NULL, '', '', '', '', '2021-07-08 06:45:02'),
(10, 'Arafat', 'gutibaz@gmail.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055', 'Mirpur-2, 60ft Road', 'arafat.jpg', '', '', '', '', '2021-07-08 06:45:02'),
(18, 'ami', '', '', '1235', NULL, NULL, '', '', '', '', '2021-07-08 06:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `p_id` int(11) NOT NULL,
  `m_id` int(11) DEFAULT NULL,
  `del_id` int(11) DEFAULT NULL,
  `del_man` varchar(50) NOT NULL DEFAULT 'Waiting',
  `par_status` varchar(50) DEFAULT NULL,
  `chrg` varchar(50) NOT NULL DEFAULT '0',
  `due_chrg` varchar(50) NOT NULL DEFAULT '0',
  `user_bal` varchar(50) NOT NULL DEFAULT '0',
  `payment` varchar(50) NOT NULL DEFAULT '0',
  `stamp_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pay_method` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`p_id`, `m_id`, `del_id`, `del_man`, `par_status`, `chrg`, `due_chrg`, `user_bal`, `payment`, `stamp_created`, `modified_at`, `pay_method`) VALUES
(99, 1, 33, 'monju', 'Delivered', '100', '0', '20', '1', '2020-03-31 18:00:00', '2020-08-22 09:34:34', '0'),
(125, 1, 42, 'Rahman', 'Delivered', '100', '0', '60', '1', '2020-04-05 15:55:16', '2020-08-07 15:48:44', '0'),
(126, 2, 43, 'Rahman', 'Delivered', '60', '0', '60', '1', '2020-04-05 15:55:16', '2020-08-07 19:41:44', '1'),
(127, 2, 44, 'monju', 'picked up', '60', '0', '0', '0', '2020-04-05 15:55:16', '2020-08-14 04:26:04', NULL),
(128, 3, 45, 'monju', 'picked up', '60', '0', '60', '0', '2020-04-05 15:55:16', '2020-08-10 11:52:24', NULL),
(129, 1, 46, 'monju', 'picked up', '60', '0', '50', '0', '2020-04-05 15:55:16', '2020-08-14 04:27:03', NULL),
(137, 1, 54, 'monju', 'picked up', '60', '0', '60', '0', '2020-04-05 15:55:16', '2020-08-22 09:36:50', NULL),
(138, 1, 55, 'monju', 'Delivered', '60', '0', '60', '1', '2020-04-05 15:55:16', '2020-08-11 17:53:00', '1'),
(139, 1, 56, 'Sojol', 'Delivered', '60', '0', '60', '1', '2020-04-05 15:55:16', '2020-08-07 19:48:03', '0'),
(140, 1, 57, 'Waiting', 'Not pickup yet', '60', '0', '60', '0', '2020-04-05 15:55:16', '2020-04-22 07:19:59', NULL),
(141, 1, 58, 'sample', 'Not pickup yet', '0', '60', '0', '0', '2020-04-05 15:55:16', '2021-07-27 07:58:29', NULL),
(142, 1, 59, 'Waiting', 'Not pickup yet', '0', '100', '0', '0', '2020-04-05 15:55:16', '2020-04-22 07:22:42', NULL),
(143, 1, 60, 'Waiting', 'Not pickup yet', '0', '60', '0', '0', '2020-04-05 15:55:16', '2020-04-22 07:22:42', NULL),
(144, 1, 61, 'Waiting', 'Not pickup yet', '0', '100', '0', '0', '2020-04-05 15:55:16', '2020-04-22 07:22:42', NULL),
(147, 3, 64, 'Waiting', 'Not pickup yet', '0', '100', '0', '0', '2020-04-05 15:55:16', '2020-04-22 07:22:42', NULL),
(148, 1, 65, 'Waiting', 'Not pickup yet', '100', '0', '50', '0', '2020-04-05 15:55:16', '2020-04-22 07:19:59', NULL),
(149, 1, 67, 'Rahman', 'Delivered', '60', '0', '110', '1', '2020-04-05 15:55:16', '2020-08-07 19:49:20', '1'),
(150, 1, 68, 'Waiting', 'Not pickup yet', '60', '0', '140', '0', '2020-04-05 15:55:16', '2020-04-22 07:19:59', NULL),
(151, 1, 69, 'Sojol', 'Delivered', '0', '60', '0', '1', '2020-04-05 15:55:16', '2020-08-07 16:07:05', '0'),
(152, 8, 70, 'monju', 'picked up', '60', '0', '100', '0', '2020-04-05 15:55:16', '2020-08-07 16:04:20', NULL),
(153, 8, 71, 'Waiting', 'in transit', '0', '60', '0', '0', '2020-04-05 15:55:16', '2020-04-22 07:22:42', NULL),
(154, 8, 72, 'monju', 'picked up', '100', '0', '60', '0', '2020-04-05 15:55:16', '2020-04-26 07:01:18', NULL),
(155, 8, 73, 'monju', 'picked up', '0', '100', '0', '0', '2020-04-05 15:55:16', '2020-04-24 20:02:12', NULL),
(156, 8, 74, 'Rahman', 'Delivered', '100', '0', '60', '1', '2020-04-05 15:55:16', '2020-08-07 19:50:11', '0'),
(157, 8, 75, 'Rahman', 'Not pickup yet', '0', '60', '', '0', '2020-04-05 15:55:16', '2020-04-22 07:22:42', NULL),
(158, 8, 76, 'monju', 'Delivered', '60', '0', '100', '1', '2020-04-05 15:55:16', '2020-08-07 19:50:28', '0'),
(159, 1, 77, 'monju', 'Delivered', '0', '60', '0', '0', '2020-04-05 16:14:29', '2020-04-22 07:22:42', NULL),
(160, 1, 78, 'monju', 'picked up', '100', '0', '100', '0', '2020-04-15 18:07:29', '2020-04-22 07:18:37', NULL),
(161, 1, 79, 'Waiting', 'Not pickup yet', '60', '0', '240', '0', '2020-04-20 20:30:48', '2020-04-22 07:19:59', NULL),
(162, 2, 80, 'monju', 'Return to Hub', '60', '0', '110', '', '2020-04-25 16:21:53', '2020-08-10 12:55:24', NULL),
(163, 1, 81, 'monju', 'in transit', '100', '0', '0', '0', '2020-04-26 06:49:32', '2020-04-26 06:54:39', NULL),
(164, 1, 82, 'monju', 'Delivered', '60', '0', '140', '1', '2020-05-28 15:22:00', '2020-08-07 19:54:29', '1'),
(166, 1, 85, 'Sojol', 'Delivered', '0', '60', '0', '1', '2020-08-07 16:33:23', '2020-08-07 19:55:07', '1'),
(167, 1, 86, 'monju', 'Delivered', '60', '0', '40', '1', '2020-08-07 16:40:12', '2020-08-07 17:24:59', '1'),
(180, 1, 99, 'monju', 'picked up', ' 60', '0', '0', '0', '2020-08-14 04:19:20', '2020-08-14 04:19:54', NULL),
(181, 1, 100, 'monju', 'picked up', ' 60', '0', '0', '0', '2020-08-22 09:31:18', '2021-02-28 19:01:04', NULL),
(184, 1, 103, 'Waiting', 'Not pickup yet', ' 60', '0', '0', '0', '2020-11-06 09:21:39', '2020-11-06 09:21:39', NULL),
(186, 1, 105, 'monju', 'picked up', '100', '0', '20', '0', '2021-02-28 18:58:54', '2021-02-28 18:59:35', NULL),
(187, 1, 106, 'Waiting', 'Not pickup yet', ' 60', '0', '60', '0', '2021-02-28 19:07:29', '2021-02-28 19:07:29', NULL),
(188, 1, 107, 'Waiting', 'Not pickup yet', '0', ' 70', '0', '0', '2021-07-08 08:43:23', '2021-07-08 08:43:23', NULL),
(189, 1, 108, 'Waiting', 'Not pickup yet', '0', ' 90', '0', '0', '2021-07-08 08:51:16', '2021-07-08 08:51:16', NULL),
(191, 1, 110, 'Waiting', 'Not pickup yet', '0', '70', '0', '0', '2021-07-13 13:33:03', '2021-07-13 13:33:03', NULL),
(192, 1, 111, 'Waiting', 'Not pickup yet', '0', '70', '0', '0', '2021-07-13 13:37:06', '2021-07-13 13:37:06', NULL),
(193, 1, 112, 'Waiting', 'Not pickup yet', '0', '70', '0', '0', '2021-07-13 13:38:33', '2021-07-13 13:38:33', NULL),
(194, 1, 113, 'Waiting', 'Not pickup yet', '0', '70', '0', '0', '2021-07-13 13:41:07', '2021-07-13 13:41:07', NULL),
(201, 1, 123, 'Waiting', 'Not pickup yet', '90', '0', '40', '0', '2021-07-14 18:13:27', '2021-07-14 18:13:27', NULL),
(202, 1, 125, 'Waiting', 'Not pickup yet', '0', '70', '0', '0', '2021-07-14 18:27:08', '2021-07-14 18:27:08', NULL),
(203, 1, 126, 'Waiting', 'Not pickup yet', '0', '100', '0', '0', '2021-07-14 18:28:52', '2021-07-14 18:28:52', NULL),
(204, 1, 127, 'Waiting', NULL, '0', '130', '0', '0', '2021-07-14 18:30:35', '2021-07-14 18:30:35', NULL),
(207, 1, 131, 'monju', 'Not pickup yet', '100', '0', '30', '0', '2021-07-14 19:42:11', '2021-07-28 15:37:19', NULL),
(211, 1, 135, 'Waiting', 'Not pickup yet', '130 ', '0', '5', '0', '2021-07-28 15:43:48', '2021-07-28 15:43:48', NULL),
(212, 1, 136, 'Waiting', 'Not pickup yet', '100 ', '0', '-1', '0', '2021-07-28 15:50:31', '2021-07-28 15:50:31', NULL),
(217, 1, 141, 'Waiting', 'Not pickup yet', '90  ', '0', '-40', '0', '2021-07-28 16:39:02', '2021-07-28 16:39:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `return_parcel`
--

CREATE TABLE `return_parcel` (
  `retid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `del_area` varchar(20) DEFAULT NULL,
  `recv_name` varchar(20) DEFAULT NULL,
  `recv_address` varchar(100) DEFAULT NULL,
  `del_man` varchar(20) DEFAULT NULL,
  `par_status` varchar(20) DEFAULT NULL,
  `return_coz` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_parcel`
--

INSERT INTO `return_parcel` (`retid`, `pid`, `del_area`, `recv_name`, `recv_address`, `del_man`, `par_status`, `return_coz`) VALUES
(8, 162, 'Dhaka Metro', 'Jambu', 'afafaf gsfgsg tadgfga dgsgag taggaer ethtahgatg thathateh ergaregaer', 'monju', 'Return to Hub', 'they didn\'t pick my delivery man phn call');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `delivery_info`
--
ALTER TABLE `delivery_info`
  ADD PRIMARY KEY (`del_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `del_id` (`del_id`);

--
-- Indexes for table `return_parcel`
--
ALTER TABLE `return_parcel`
  ADD PRIMARY KEY (`retid`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;

--
-- AUTO_INCREMENT for table `delivery_info`
--
ALTER TABLE `delivery_info`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `return_parcel`
--
ALTER TABLE `return_parcel`
  MODIFY `retid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `return_parcel`
--
ALTER TABLE `return_parcel`
  ADD CONSTRAINT `return_parcel_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `parcel` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
