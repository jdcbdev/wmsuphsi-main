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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100),
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `email`, `address`, `role`, `gender`, `username`, `password`, `created_at`, `updated_at`) 














--
--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `carousel` varchar(100) NOT NULL,
  `carousel_title` varchar(100),
  `carousel_desc` varchar(100),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `announcement_title`, `description`, `created_at`, `updated_at`) VALUES
(1,  'Peace Human and Security Institute', 'Lorem ipsum odor amet, consectetuer adipiscing elit. 
Fusce risus fermentum vestibulum tellus integer tortor; libero cras. In sit finibus mollis feugiat primis; 
mi malesuada. Porttitor iaculis tellus sed proin aptent sem', '2022-11-03 15:10:55', '2022-11-13 14:19:15'),
(2, ' Western Mindanao State University', 'Lorem ipsum odor amet, consectetuer adipiscing elit.
Fusce risus fermentum vestibulum tellus integer tortor; libero cras. In sit finibus mollis feugiat primis; 
mi malesuada. Porttitor iaculis tellus sed proin aptent sem', '2022-11-03 15:17:36', '2022-11-13 23:07:49');

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
ALTER TABLE `carousel
`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;





-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
