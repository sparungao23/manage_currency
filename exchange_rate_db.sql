-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2020 at 11:11 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exchange_rate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

CREATE TABLE `currency_rates` (
  `id` int(11) NOT NULL,
  `currency` char(10) NOT NULL,
  `rate` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `currency`, `rate`, `created_at`, `updated_at`, `is_active`, `created_by_user_id`) VALUES
(1, 'USD', 1, '2020-05-01 18:00:10', '2020-05-03 10:36:13', 1, 1),
(2, 'EUR', 0.901348, '2020-05-01 18:00:10', '2020-05-03 10:36:13', 1, 1),
(3, 'JPY', 106.93, '2020-05-01 18:04:21', '2020-05-03 10:36:13', 1, 1),
(4, 'GBP', 0.799872, '2020-05-01 18:04:21', '2020-05-03 10:36:13', 1, 1),
(5, 'AUD', 1.5576, '2020-05-01 18:04:21', '2020-05-03 10:36:13', 1, 1),
(6, 'CAD', 1.42635, '2020-05-01 18:04:21', '2020-05-03 10:36:13', 1, 1),
(7, 'CHF', 0.961526, '2020-05-01 18:04:21', '2020-05-03 10:36:13', 1, 1),
(8, 'CNH', 7.1366, '2020-05-01 18:07:09', '2020-05-03 10:36:13', 1, 1),
(9, 'NZD', 1.64853, '2020-05-01 18:07:09', '2020-05-03 10:36:13', 1, 1),
(10, 'SEK', 9.8415, '2020-05-01 18:07:09', '2020-05-03 10:36:13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` int(2) NOT NULL COMMENT '1 - admin, 2 - default user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_role`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'admin@admin.com', '$2y$10$cMaacrSsrgBAP/ZODLfAeurkYVkMrYubfnFrxXwJufNzBN.UHQk7G', 1, '2020-05-01 14:01:45', '2020-05-01 14:01:45', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency_rates`
--
ALTER TABLE `currency_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
