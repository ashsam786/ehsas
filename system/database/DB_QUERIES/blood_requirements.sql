-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 06:29 PM
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
-- Table structure for table `blood_requirements`
--

CREATE TABLE IF NOT EXISTS `blood_requirements` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(80) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `alternateMobile` varchar(15) NOT NULL,
  `email` varchar(120) NOT NULL,
  `patient_name` varchar(80) NOT NULL,
  `patient_age` int(5) NOT NULL,
  `patient_gender` enum('male','female') NOT NULL,
  `blood_group` varchar(15) NOT NULL,
  `number_of_units` int(5) NOT NULL,
  `required_before` datetime NOT NULL,
  `reason` varchar(255) NOT NULL,
  `hospital_name` varchar(120) NOT NULL,
  `city` int(11) unsigned NOT NULL,
  `state` int(11) unsigned NOT NULL,
  `country` int(11) unsigned NOT NULL,
  `address` text NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_requirements`
--
ALTER TABLE `blood_requirements`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_requirements`
--
ALTER TABLE `blood_requirements`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
