-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 12:57 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ase230`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `image_name` text NOT NULL DEFAULT 'images/no_image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `name`, `image_name`) VALUES
(4, 'Tools and Hardware', 'images/tool.png'),
(6, 'clothing', 'images/clothing.png'),
(7, 'electronics', 'images/electronics.png'),
(8, 'food', 'images/food.png'),
(12, 'Books', 'images/book.png'),
(21, 'Bikes', 'images/bike.png'),
(22, 'Plushies', 'images/plush.png'),
(23, 'Games', 'images/game.png\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` tinyint(10) UNSIGNED NOT NULL,
  `category_ID` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `light_description` text NOT NULL,
  `description` text DEFAULT NULL,
  `image_name` text NOT NULL DEFAULT 'images/no_image.png',
  `price` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `category_ID`, `name`, `light_description`, `description`, `image_name`, `price`, `quantity`, `visibility`) VALUES
(1, 4, 'Real Fake Door', 'Are you tired of having too few doors but don\'t have anywhere to go if you included another door in your home? This is a perfect time for you to buy a real fake door!', 'Hey, are you tired of real doors, cluttering up your house, where you open ’em, and they actually go somewhere? And you go in another room? Get on down to “Real Fake Doors”! That’s us. Fill a whole room up with ’em. See? Watch, check this out! Won’t open. Won’t open. Not this one, not this one. None of ’em open! FakeDoors.com is our website, so check it out for a lot of really great deals on fake doooooooors!', 'images/realfakedoor.png', 70, 28, 1),
(14, 4, 'Hammer', 'Hammer', 'Hit things with it!', 'images/hammer.png', 5, 3, 1),
(15, 7, 'Dell Laptop', 'Computer', 'Screen Size: 11.6 inches | Screen Resolution: 1360 x 768 (HD) | Touch Screen: No | Processor Model: Intel Pentium | Processor Model Number: N4020 | Storage Type: eMMC | Total Storage Capacity: 64 gigabytes | eMMC Capacity: 64 gigabytes | System Memory (RAM): 4 gigabytes | Graphics: Other | Operating System: Windows 11 Home in S Mode | Battery Type: Lithium-ion | Backlit Keyboard: No\r\n', 'images/delllaptop.png', 500, 1, 1),
(16, 4, 'Crowbar', 'Pry things open', 'Amazing crowbar that can be used for anything you need', 'images/crowbar.png', 20, 4, 1),
(17, 7, 'Quest 2', 'Next Generation VR', 'VR', 'images/quest.png', 500, 2, 1),
(18, 7, 'Beats Headphones', 'Quality Sound', 'Beats', 'images/beats.png', 300, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `firstname` varchar(36) DEFAULT NULL,
  `lastname` varchar(36) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `firstname`, `lastname`, `status`, `address`) VALUES
(7, 'meomeep@gmail.com', '$2y$10$1TgV9bV7UKd02DgrX71cZ.1SFBonJaNYspe7kd8Qh8lZ5.6uGUbIy', 'Nick', 'Carter', 2, '123 Loop Drive'),
(13, 'user@gmail.com', '$2y$10$LV8OZdRx1oAH33M9gQZ1Ru2iAxda3AYZ/MVbi6IrhvHqIgSB0Dw3e', NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `transaction_id` smallint(6) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `product_id` tinyint(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `status` text NOT NULL DEFAULT 'ordered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `transaction_id`, `user_id`, `product_id`, `quantity`, `status`) VALUES
(1, 0, 7, 1, 1, 'shipped'),
(2, 0, 7, 1, 1, 'shipped'),
(3, 0, 7, 1, 1, 'shipped'),
(4, 0, 7, 1, 1, 'shipped'),
(5, 0, 7, 15, 1, 'shipped'),
(6, 6, 7, 15, 1, 'in progress'),
(7, 6, 7, 1, 2, 'in progress'),
(8, 8, 7, 1, 1, 'ordered'),
(9, 8, 7, 15, 1, 'ordered'),
(10, 8, 7, 3, 2, 'ordered'),
(11, 11, 7, 1, 2, 'ordered'),
(12, 12, 7, 1, 2, 'ordered'),
(13, 13, 7, 1, 1, 'ordered'),
(14, 13, 7, 15, 2, 'ordered'),
(15, 15, 7, 15, 2, 'ordered'),
(16, 16, 7, 1, 1, 'ordered'),
(17, 17, 7, 1, 2, 'ordered'),
(18, 18, 7, 1, 1, 'ordered'),
(19, 19, 7, 1, 2, 'ordered'),
(20, 20, 7, 1, 1, 'ordered'),
(21, 21, 12, 1, 1, 'ordered'),
(22, 21, 12, 15, 1, 'ordered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
