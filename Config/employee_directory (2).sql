-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2016 at 05:30 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created`, `modified`) VALUES
(1, 'engineering', '2016-07-14 09:10:36', '2016-07-14 09:10:36'),
(5, 'accountant', '2016-07-14 09:12:09', '2016-07-14 09:12:09'),
(12, 'Human Resources', '2016-07-15 03:33:01', '2016-07-15 03:33:01'),
(13, 'ttttttttttttt', '2016-07-25 04:49:03', '2016-07-25 05:00:03'),
(14, 'sxedrftvgyhu', '2016-07-25 04:53:35', '2016-07-25 04:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `position` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int(11) UNSIGNED NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `birth`, `gender`, `position`, `department_id`, `created`, `modified`) VALUES
(1, 'vinh', 'nguyenquangvinh.bkhn@gmail.com', '2016-07-14', 1, 'developer', 1, '2016-07-14 10:32:14', '2016-07-14 10:32:14'),
(2, 'Hân ', 'adaddadad@gmail.com', '2016-07-14', 0, 'manager', 5, '2016-07-14 10:43:04', '2016-07-14 10:43:04'),
(3, 'Linh', 'cdbcdbc@gmail.com', '2016-07-15', 0, 'assistant', 12, '2016-07-15 08:37:54', '2016-07-15 08:37:54'),
(6, 'ppppppppppppppppp', 'tntntnnt@gmail.com', '2016-07-15', 0, 'zdfgh', 5, '2016-07-15 05:56:29', '2016-07-25 04:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(2) UNSIGNED DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `display_name`, `avatar`, `role`, `created`, `modified`) VALUES
(1, 'aaa', '$2a$10$OWoRNX79CT/AkulIaa8T5Os7622dtxYwJaDhIY/HMU.4QFCMHVkoO', '', NULL, NULL, 0, '2016-07-08 04:09:15', '2016-07-12 10:02:47'),
(38, 'vinhking', '$2a$10$nSB.5rXHx4eHlYhYJj0HIem9Vb3qX.NrGXdh9TVbm9wz7zSKd3d1q', 'nguyenquangvinh.bkhn@gmail.com', 'vinhking', NULL, 1, '2016-07-13 05:50:27', '2016-07-13 05:50:27'),
(42, 'acacacaca', '$2a$10$gbtqMSbESA.2PHIQh.X33e0qiffuj33YMR2I8LnksrRwa9/iDUoXG', 'acacacacac@gmail.com', 'accacacaca', 'img/webimages/users/chankailoon.jpg', 0, '2016-07-24 12:24:52', '2016-07-24 12:24:52'),
(43, 'avavavav', '$2a$10$2FCDclClKqvYTCT605Jj8uR84gfjMxINMphK7zgu6uC9OsE4Zc3le', 'khongtenkhongtuoi.102102@gmail.com', 'avavavavv', 'img/webimages/users/phongtran.gif', 0, '2016-07-24 12:32:36', '2016-07-24 12:32:36'),
(44, 'tytytytyty', '$2a$10$0Z4sdHQV.RLQdYZ.3oHhVuFjdSeERTtT2Bf.PztuHz9Zka.cjy1ea', 'tytytytyy@gmail.com', 'ththhhtth', NULL, 1, '2016-07-24 17:01:40', '2016-07-24 17:01:40'),
(45, 'uujujjuujuj', '$2a$10$SPwhTqtQuDBBiGnt38mhvOs/.D.We2uV3zNgBCNAVvSt8WjGlJRvC', 'ukkukuku@gmail.com', 'kyykykkyk', NULL, 1, '2016-07-24 17:09:32', '2016-07-24 17:09:32'),
(46, 'xrdcfvgh', '$2a$10$8AUNQPQnwJ.qs7GtZiLBxupZiGBOkmhDCJpyVcm5QevSlYCIbgMSu', 'dxgfvh@gmail.com', 'dcfvghjnk', 'img/webimages/users/chankailoon.jpg', 1, '2016-07-24 18:06:48', '2016-07-24 18:06:48'),
(47, 'tfvghbjknm', '$2a$10$EIfdcf6V2h4SpAP3EWscBu4Lg7XahkeDrDvgfcr/ka1NaAVlBuMmK', 'tcfgvhbj@gmail.com', 'dcfgvhbj', 'img/webimages/users/phongtran.gif', 1, '2016-07-24 18:07:52', '2016-07-24 18:07:52'),
(48, 'drxcfvgbhj', '$2a$10$5iPfa4.cShjzqzeFeK.V2e686GnFbXuXH93nW88fR7uYu9H1lfB2C', 'esxdrcfvghb@gmail.com', 'sexdcfgvhb', 'img/webimages/users/chankailoon.jpg', 1, '2016-07-25 03:35:33', '2016-07-25 03:35:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
