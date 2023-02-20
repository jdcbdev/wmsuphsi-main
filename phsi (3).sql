-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 02:21 AM
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
--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `history_title` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `history_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--
INSERT INTO `history` (`id`, `history_title`, `filename`, `history_description`) VALUES
(1, 'The History of Peace and Human Security Institute', 'phsi.png', 'Western Mindanao State University (WMSU) created the Center for Peace and Development (CPD) in January 2000, to generate well- rounded and productive people for the region, ensuring the good welfare of the society grounded on democratic and peaceful initiative. In 2010, it was renamed as Peace and Human Security Institute (PHSI), becoming the peace-building arm of the Office of the University President. Today, under Dr. Ma. Carla A. Ochotorena, the office takes the lead in engaging WMSU in the government-led peace efforts to be the main protagonist in peace education and research on the resolution of local conflicts.');



--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;




--
--
-- Table structure for table `misvis`
--

CREATE TABLE `misvis` (
  `id` int(11) NOT NULL,
  `misvis_title` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `misvis_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `misvis`
--
INSERT INTO `misvis` (`id`, `misvis_title`, `filename`, `misvis_description`) VALUES
(1, 'Vision', 'phsi-p5.png', 'A group of men and women in WMSU working in the field of instruction, research, and extension, towards the promotion of a Culture of Peace and the provision of the opportunities and caring spaces that facilitate the development and expression of the potentials, capabilities, and talents of the people of Mindanao and the country.'),
(2, 'Mission', 'phsi-p7.png', 'The WMSU-PHSI seeks to expand and deepen the commitment, engagement, and involvement of individuals and groups inside and outside the university not only within the region but even in the national and international community, thru the offering of peace studies, integration of peace education, and other peace and development initiatives.');

--
-- Indexes for table `misvis`
--
ALTER TABLE `misvis`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `misvis`
--
ALTER TABLE `misvis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;








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
-- Table structure for table `sex`
--

CREATE TABLE `sex` (
  `sex_id` int(11) NOT NULL,
  `sex_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`sex_id`, `sex_type`) VALUES
(1, 'boy'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `user_acc_data`
--

CREATE TABLE `user_acc_data` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(35) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `suffix` varchar(5) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `type` varchar(35) NOT NULL,
  `sex` int(11) NOT NULL,
  `contactno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_acc_data`
--

INSERT INTO `user_acc_data` (`id`, `user_name`, `user_pass`, `firstname`, `middlename`, `lastname`, `suffix`, `email`, `address`, `role`, `type`, `sex`, `contactno`) VALUES
(1, 'echoloko', 'loko', 'jec', 'olleb', 'koko', '', 'jerichosagdi@gmail.com', 'macrohon Drive', 'admin', '', 1, 0);

--
-- Indexes for dumped tables
--

--


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
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`sex_id`);

--
-- Indexes for table `user_acc_data`
--
ALTER TABLE `user_acc_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--


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
-- AUTO_INCREMENT for table `sex`
--
ALTER TABLE `sex`
  MODIFY `sex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_acc_data`
--
ALTER TABLE `user_acc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
