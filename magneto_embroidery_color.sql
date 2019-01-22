-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2019 at 06:12 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.1.25-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reinascrubs_m2`
--

-- --------------------------------------------------------

--
-- Table structure for table `magneto_embroidery_color`
--

CREATE TABLE `magneto_embroidery_color` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `thread_color` text NOT NULL COMMENT 'Thread Colors',
  `color_code` varchar(255) NOT NULL COMMENT 'Color Code',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Created At'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Embroidery Thread Colors';

--
-- Dumping data for table `magneto_embroidery_color`
--

INSERT INTO `magneto_embroidery_color` (`id`, `thread_color`, `color_code`, `created_at`) VALUES
(1, 'red', 'FF0000', '2019-01-15 11:43:30'),
(2, 'orange', 'FFA500', '2019-01-15 11:43:30'),
(3, 'gold', 'CFB53B', '2019-01-15 11:44:21'),
(4, 'yellow', 'FFFF00', '2019-01-15 11:44:21'),
(5, 'white', 'ffffff', '2019-01-15 11:44:50'),
(6, 'green', '008000', '2019-01-15 11:44:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `magneto_embroidery_color`
--
ALTER TABLE `magneto_embroidery_color`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `magneto_embroidery_color`
--
ALTER TABLE `magneto_embroidery_color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
