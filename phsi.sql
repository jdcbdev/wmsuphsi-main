-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 12:19 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phsi`
--
CREATE DATABASE IF NOT EXISTS `phsi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phsi`;

-- --------------------------------------------------------


--
--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `carousel_image` varchar(255) NOT NULL,
  `carousel_title` varchar(255) NOT NULL,
  `carousel_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `carousel_image`, `carousel_title`, `carousel_description`) VALUES
(1, 'ccslogo1.jpg', 'Peace and Human Security Institute', 'Peace is more than the absence of war, it is living together with our differences – of sex, race, language, religion or culture – while furthering universal respect for justice and human rights on which such coexistence depends.'),
(2, 'sad.jpg', 'Peace and Human Security Institute', 'Peace is more than the absence of war, it is living together with our differences – of sex, race, language, religion or culture – while furthering universal respect for justice and human rights on which such coexistence depends.');

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;




-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
