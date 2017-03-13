-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 06:51 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ehsas`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_requirement`
--

CREATE TABLE IF NOT EXISTS `blood_requirement` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(90) NOT NULL,
  `phone` int(15) NOT NULL,
  `alternate_phone` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `city` int(11) unsigned NOT NULL,
  `state` int(11) unsigned NOT NULL,
  `address` text NOT NULL,
  `blood_group` varchar(15) NOT NULL,
  `when_required` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1 means active , 0 means expired',
  `hospital` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_requirement`
--
ALTER TABLE `blood_requirement`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_requirement`
--
ALTER TABLE `blood_requirement`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
