-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 03:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `announcement_title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `announcement_title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Peace Human and Security Institute', 'Lorem ipsum odor amet, consectetuer adipiscing elit. \nFusce risus fermentum vestibulum tellus intege', '2022-11-03 15:10:55', '2022-11-13 14:19:15'),
(2, ' Western Mindanao State University', 'Lorem ipsum odor amet, consectetuer adipiscing elit.\nFusce risus fermentum vestibulum tellus integer', '2022-11-03 15:17:36', '2022-11-13 23:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `carousel_image` varchar(255) NOT NULL,
  `carousel_title` varchar(255) NOT NULL,
  `carousel_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `carousel_image`, `carousel_title`, `carousel_description`) VALUES
(1, 'ccslogo1.jpg', 'Peace and Human Security Institute', 'Peace is more than the absence of war, it is living together with our differences – of sex, race, language, religion or culture – while furthering universal respect for justice and human rights on which such coexistence depends.'),
(2, 'sad.jpg', 'Peace and Human Security Institute', 'Peace is more than the absence of war, it is living together with our differences – of sex, race, language, religion or culture – while furthering universal respect for justice and human rights on which such coexistence depends.');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `program_title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Peace Studies', 'Lorem ipsum odor amet, consectetuer adipiscing elit. \nFusce risus fermentum vestibulum tellus intege', '2022-11-03 15:10:55', '2022-11-13 14:19:15'),
(2, 'Bayanihan', 'Lorem ipsum odor amet, consectetuer adipiscing elit. \nFusce risus fermentum vestibulum tellus intege', '2022-11-03 15:17:36', '2022-11-13 23:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_acc_data`
--

CREATE TABLE `user_acc_data` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_acc_data`
--

INSERT INTO `user_acc_data` (`id`, `user_name`, `user_pass`, `firstname`, `lastname`, `role`) VALUES
(1, 'echoloko', 'loko', 'jec', 'koko', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_acc_data`
--
ALTER TABLE `user_acc_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_acc_data`
--
ALTER TABLE `user_acc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
