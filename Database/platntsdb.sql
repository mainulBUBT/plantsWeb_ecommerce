-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 08:17 PM
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
-- Database: `platntsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin_pass` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `email`, `admin_pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'plants'),
(3, 'flowers'),
(4, 'fertilizers');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(40) NOT NULL,
  `order_status` varchar(10) NOT NULL DEFAULT '0',
  `amount` varchar(120) NOT NULL DEFAULT '0',
  `user_amount` varchar(200) NOT NULL,
  `pay_status` varchar(10) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `cat_id`, `product_id`, `quantity`, `order_status`, `amount`, `user_amount`, `pay_status`, `date`) VALUES
(9, 1, 1, 1, '2', '1', '500', '440', '1', '2022-03-18 00:39:10'),
(10, 1, 1, 1, '1', '1', '280', '220', '1', '2022-03-18 00:59:44'),
(11, 1, 1, 2, '1', '1', '621', '561', '1', '2022-03-18 00:59:50'),
(12, 1, 1, 1, '1', '0', '621', '561', '0', '2022-03-18 00:59:50'),
(13, 1, 1, 2, '1', '0', '401', '341', '0', '2022-03-18 00:59:55'),
(14, 1, 1, 2, '1', '0', '401', '341', '0', '2022-03-18 01:00:02'),
(15, 1, 1, 1, '1', '0', '280', '220', '0', '2022-03-18 01:00:07'),
(16, 1, 1, 2, '1', '0', '621', '561', '0', '2022-03-18 01:00:25'),
(17, 1, 1, 1, '1', '0', '621', '561', '0', '2022-03-18 01:00:25'),
(18, 1, 1, 1, '3', '0', '720', '660', '0', '2022-03-18 01:00:34'),
(19, 1, 1, 1, '6', '0', '1380', '1320', '0', '2022-03-18 01:00:44'),
(20, 2, 1, 1, '1', '0', '340', '280', '0', '2022-02-18 01:04:01'),
(22, 1, 1, 1, '1', '0', '280', '220', '0', '2022-03-23 01:13:06'),
(24, 5, 1, 2, '2', '0', '742', '682', '0', '2022-03-23 23:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `plant_id` int(11) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` varchar(240) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `pic_1` varchar(500) NOT NULL,
  `pic_2` varchar(500) NOT NULL,
  `pic_3` varchar(500) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`plant_id`, `product_name`, `details`, `price`, `quantity`, `availability`, `pic_1`, `pic_2`, `pic_3`, `cat_id`, `date`) VALUES
(1, 'Adenium Plant Doble', '', '220', '7', '1', 'plant-1.jpg', '', '', 1, '2022-03-16 12:47:14'),
(2, 'Areca Palm', '', '341', '9', '1', 'plants-2.JPG', 'plants-2-2.JPG', 'plants-2-3.JPG', 1, '2022-03-16 14:16:23'),
(35, 'Bumper Surokkha Organic Manure', 'this is test', '220', '15', '1', 'f-1.jpg', 'f-2.jpg', 'f-3.jpg', 4, '2022-03-24 12:43:17'),
(36, 'Paddle Plant', '', '85', '12', '1', 'p-2.jpg', 'p-1.jpg', 'p-3.jpg', 1, '2022-03-24 21:09:52'),
(37, 'GreenCreator Mixed Moss Rose Plant Seed Mix - 1000 Seeds', 'Moss rose plants are a popular choice for growing in container gardens, along the front edge of garden bed borders, as edging along paved walkways, in and on top of stone walls, and in rock gardens. In addition, the trailing habit of moss rose works well in hanging baskets. Moreover, moss rose doesn\'t typically spread outside of its bounds as a ground cover, so it\'s ideal for a small garden', '100', '15', '1', 'm-2.jpg', 'm-1.jpg', 'm-3.jpg', 3, '2022-03-24 21:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `mobile`, `password`, `address`, `date`) VALUES
(1, 'mihan', 'one@gmail.com', '12234', 'e10adc3949ba59abbe56e057f20f883e', 'mirpur 11', '2022-03-17 12:21:10'),
(2, 'mihan', 'test@gmail.com', '12345', 'e10adc3949ba59abbe56e057f20f883e', 'mirpur 11', '2022-03-18 01:03:43'),
(5, 'test_1', 'test1@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'mirpur 12', '2022-03-23 15:52:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`plant_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
