-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 06:43 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehsas`
--

-- --------------------------------------------------------

--
-- Table structure for table `other_initiatives`
--

CREATE TABLE `other_initiatives` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `priority` tinyint(5) NOT NULL COMMENT '0 means inactive and value denotes priority'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_initiatives`
--

INSERT INTO `other_initiatives` (`id`, `name`, `description`, `email`, `address`, `image`, `url`, `priority`) VALUES
(1, 'J&K Yateem Trust', 'Welfare and Rehabilitation of Orphan & Widows.', '', 'Baran Pather Haftchinar,\r\nNear Iqbal Park Srinagar J&K, India\r\nPin Code : 190001.', '', '', 1),
(2, 'Help Poor Voluntary Trust', 'Help Poor Voluntary Trust a leading organization which has placed its services to better the condition of the hopeless and disappointed people', '', 'Help Poor Voluntary Trust\r\nHaft Chinar Near Iqbal Park\r\nSrinagar, Jammu and Kashmir', '', '', 2),
(3, 'Lalla Ded Charity', 'Lalla Ded Charity is a world-wide charity organised primarily for supporting people with life-threatening ailments who can''t afford the cost of treatment. Cancer treatment is the main focus area. It is based in Kashmir.', 'twentyrupeesmiracle@gmail.com', '', '', '', 3),
(4, 'Athwaas', 'To serve the humanity in every possible way.our mission is to promote the welfare and education. Athwaas is a non profit organisation- and is committed to enhance the quality of life. We are a friendly group of hobbyist and enthusiasts.', 'info@athwaas.com', '', '', 'http://athwaas.com', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `other_initiatives`
--
ALTER TABLE `other_initiatives`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `other_initiatives`
--
ALTER TABLE `other_initiatives`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
