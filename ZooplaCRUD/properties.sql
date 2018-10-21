-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 04:50 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `properties`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `Property_id` int(11) NOT NULL,
  `County` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Town` varchar(255) NOT NULL,
  `Descrip` varchar(255) NOT NULL,
  `Full_Details_URL` varchar(255) NOT NULL,
  `Displayable_Address` varchar(255) NOT NULL,
  `Image_URL` varchar(255) NOT NULL,
  `Thumbnail_URL` varchar(255) NOT NULL,
  `Latitude` decimal(9,6) NOT NULL,
  `Longitude` decimal(9,6) NOT NULL,
  `Number_of_bedrooms` int(11) NOT NULL,
  `Number_of_bathrooms` int(11) NOT NULL,
  `Price` decimal(19,2) NOT NULL,
  `Property_Type` varchar(255) NOT NULL,
  `Stat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`Property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `Property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
