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
-- --------------------------------------------------------
--
--
-- Table structure for table `event`
--

CREATE TABLE 'event'(
	'event_id' int(11) NOT NULL PRIMARY KEY,
	'event_title' VARCHAR(50) DEFAULT NULL,
	'filename' VARCHAR(255) NOT NULL,
	'event_about' text DEFAULT NUll,
	'event_mode' VARCHAR(35) NOT NULL,
  'event_location' VARCHAR(50) NOT NULL,
  'event_platform' VARCHAR(50) NOT NULL,
	'event_type' VARCHAR(50) NOT NULL,
	'event_slots' int(11) DEFAULT NULL,
	'event_status' VARCHAR(50) NOT NULL,
	'event_date' DATE NOT NULL,
  'event_start_time' TIME NOT NULL,
  'event_end_time' TIME NOT NULL,
  'event_reg_duedate' timestamp NOT NULL,
	'event_invitation_id' int FOREIGN KEY REFERENCES 'event_invitation'(event_invitation_id),
	'event_agenda_id' int FOREIGN KEY REFERENCES 'event_agenda'(event_agenda_id),
	'event_speaker_id' int FOREIGN KEY REFERENCES 'event_speaker'(event_speaker_id),
	'created_at' timestamp NOT NULL DEFAULT current_timestamp(),
  'updated_at' timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
	)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--




--
-- Indexes for table `events`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;


-- --------------------------------------------------------
--
--
-- Table structure for table `event_scope`
--

CREATE TABLE 'event_scope'(
  'event_id' int(11),
	'event_scope' VARCHAR(50) NOT NULL,
	FOREIGN KEY (event_id) REFERENCES event (event_id)
	);

--
-- Dumping data for table `event_scope`
--




--
-- Indexes for table `event_scope`
--
ALTER TABLE `event_scope`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `event_scope`
--
ALTER TABLE `event_scope `
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

-- --------------------------------------------------------


-- --------------------------------------------------------
--
--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `carousel_title` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `carousel_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--
INSERT INTO `carousel` (`id`, `carousel_title`, `filename`, `carousel_content`) VALUES
(1, 'Peace and Human Security Institute', 'phsi-carousel.jpg', 'Peace is more than the absence of war, it is living together with our differences – of sex, race, language, religion or culture – while furthering universal respect for justice and human rights on which such coexistence depends – Tap Tant, UNESCO');



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
--
--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `image_description` text DEFAULT NULL,
  `news_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--


--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

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

-- --------------------------------------------------------

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


--
-- Indexes for table `user_acc_data`
--
ALTER TABLE `user_acc_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--


--
-- AUTO_INCREMENT for table `user_acc_data`
--
ALTER TABLE `user_acc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
