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
-- ------------------------------------------------------

CREATE TABLE `unesco_action` (
  `id` int(11) NOT NULL,
  `unesco_type`varchar(255) NOT NULL,
  `filename`varchar(255) NOT NULL,
  `unesco_title` text DEFAULT NULL,
  `unesco_details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unesco_action`
--

--
-- Indexes for table `unesco_action`
--
ALTER TABLE `unesco_action`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `unesco_action`
--
ALTER TABLE `unesco_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

-- --------------------------------------------------------
-- ------------------------------------------------------

CREATE TABLE `phsi_action` (
  `id` int(11) NOT NULL,
  `action_type`varchar(255) NOT NULL,
  `filename`varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `details` text DEFAULT NULL,  
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phsi_action`
--

--
-- Indexes for table `phsi_action`
--
ALTER TABLE `phsi_action`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `phsi_action`
--
ALTER TABLE `phsi_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

-- --------------------------------------------------------






-- --------------------------------------------------------
--
--
CREATE TABLE `event` (
	`id` int(11) NOT NULL,
	`event_title`varchar(50) NOT NULL,
	`event_banner`varchar(50) NOT NULL,
	`event_about` text DEFAULT NULL,
	`event_mode`varchar(35) NOT NULL,
  `event_location`varchar(50) DEFAULT NULL,
  `event_platform`varchar(50) DEFAULT NULL,
	`event_type`varchar(50) NOT NULL,
	`event_slots` int(11) DEFAULT NULL,
	`event_status`varchar(50) NOT NULL,
	`event_date` DATE NOT NULL,
  `event_scope` varchar(50) NOT NULL,
  `event_start_time` TIME NOT NULL,
  `event_end_time` TIME NOT NULL,
  `event_reg_duedate` timestamp NOT NULL,
  `rsvp_id` INT(11) NOT NULL,
	`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
	)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

-- --------------------------------------------------------
--
--
-- Table structure for table `unesco_administration`
--

CREATE TABLE `unesco_administration` (
  `id` int(11) NOT NULL,
  `admin_name`varchar(50) NOT NULL,
  `filename`varchar(255) NOT NULL,
  `admin_position`varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unesco_administration`
--
INSERT INTO `unesco_administration` (`id`, `admin_name`, `filename`, `admin_position`) VALUES

(1, 'Asst. Prof. Ludivina Borja-Dekit', 'phsi-ludi.png', 'Director'),
(2, 'Engr. Marlon Grande', 'phsi-marlon.png', 'Asst. Director'),
(3, 'Clarise Jane Tayao', 'unesco-clarise.png', 'President'),
(4, 'Araffi Suhaide', 'unesco-arafi.png', 'Vice-President'),
(5, 'Krisha Joy Elumir', 'unesco-krisha.png', 'General Secretary'),
(6, 'Ahmad Alawi', 'unesco-ahmad.png', 'PIO'),
(7, 'Juniel Anoso', 'unesco-juniel.png', 'External Finance'),
(8, 'Amir Nashireen', 'unesco-amir.png', 'Internal Finance'),
(9, 'Lowel Jay Recto', 'unesco-lowel.png', "Auditor"),
(10, 'Kin Gerald Lugas', 'unesco-kin.png', 'Project Manager'),
(11, 'Almuhaim Jahama', 'unesco-almuha.png', 'Ambassador'),
(12, 'Elvina Vanessa Kairan', 'unesco-elvina.png', 'Ambassadress'),
(13, 'Vanessa Pascua', 'dp3.jpg', 'Content Comittee'),
(14, 'Kristine Joy Esteban', 'unesco-kristine.png', 'Creative Comittee Head'),
(15, 'Myrtle Pama', 'dp1.jpg', 'Creative Comittee Asst. Head'),
(16, 'Clark Satander', 'unesco-clark.png', 'Creative Comittee'),
(17, 'Jenevie Baendres', 'unesco-jenevie.png', 'Creative Comittee'),
(18, 'Gloria Escote', 'unesco-gloria.png', 'Membership Comittee'),
(19, 'Monique Dancel', 'dp2.jpg', 'Membership Comittee');



--
-- Indexes for table `unesco_administration`
--
ALTER TABLE `unesco_administration`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `unesco_administration`
--
ALTER TABLE `unesco_administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

-- --------------------------------------------------------

-- --------------------------------------------------------
--
--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `admin_name`varchar(50) NOT NULL,
  `filename`varchar(255) NOT NULL,
  `admin_organization`varchar(50) NOT NULL,
  `admin_position`varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--
INSERT INTO `administration` (`id`, `admin_name`, `filename`, `admin_organization`, `admin_position`) VALUES
(1, 'Dr. Ma. Carla A. Ochotorena', 'phsi-carla.png', 'WMSU - Peace and Human Security', 'University President'),
(2, 'Asst. Prof. Ludivina Borja-Dekit', 'phsi-ludi.png', 'WMSU - Peace and Human Security Institute', 'Director'),
(3, 'Engr. Marlon Grande', 'phsi-marlon.png', 'WMSU - Peace and Human Securit', 'Asst. Director');



--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

-- --------------------------------------------------------

-- --------------------------------------------------------
--
--
-- Table structure for table `unesco_carousel`
--

CREATE TABLE `unesco_carousel` (
  `id` int(11) NOT NULL,
  `carousel_title` text NOT NULL,
  `filename`varchar(255) NOT NULL,
  `carousel_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unesco_carousel`
--
INSERT INTO `unesco_carousel` (`id`, `carousel_title`, `filename`, `carousel_content`) VALUES
(1, 'Peace and Human Security Institute', 'phsi-carousel.jpg', 'Peace is more than the absence of war, it is living together with our differences – of sex, race, language, religion or culture – while furthering universal respect for justice and human rights on which such coexistence depends – Tap Tant, UNESCO');



--
-- Indexes for table `unesco_carousel`
--
ALTER TABLE `unesco_carousel`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `unesco_carousel`
--
ALTER TABLE `unesco_carousel`
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
  `filename`varchar(255) NOT NULL,
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

-- --------------------------------------------------------
--
--
-- Table structure for table `unesco_news`
--

CREATE TABLE `unesco_news` (
  `id` int(11) NOT NULL,
  `news_title`varchar(255) NOT NULL,
  `filename`varchar(255) NOT NULL,
  `image_description` text DEFAULT NULL,
  `news_content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unesco_news`
--
INSERT INTO `unesco_news` (`id`, `news_title`, `filename`, `image_description`, `news_content`) VALUES
(1, 'Harnessing our Peace Efforts: Towards Solidarity in Service', 'phsi-dialogue.jpg', '"Mr. Hirotaka Sekiguchi recieving a certificate. He is the Senior Official of the National Federation of UNESCO Associations in JAPAN."', 'In line with the opening of the Mindanao Week of Peace 2022, on the 24th of November, the WMSU PHSI conducted a Peace Dialogue with the theme, "Harnessing our Peace Efforts: Towards Solidarity in Service". with the participation of Mr. Hirotaka Sekiguchi, the senior Official of the National Federation of UNESCO. The Peace Dialogue took place at the College of Teacher Education Social Hall, with the attendance of the WMSU-UNESCO Club members and Officers and different representatives from the College of Liberal Arts (CLA) , College of Education (CTE) , College of Islamic Studies ( CAIS) and College of Social Work and Community Development.
Let us commemorate this week of Peace as a remembrance and celebration of unity and solidarity through peace.'),
(2, 'In the Light of the Recent Flood in Zamboanga City', 'unesco-chr.jpg', '"Peace Mediators on their new WMSU UNESCO Club shirt."', 'On 17th of February, the Commission on human rights have successfully conducted an orientation that revved up the members of WMSU Youth Peace Mediators UNESCO Club. 
The event was spearheaded by Hon. Daniel S. Paculanang, Information Officer III and Hon. Ronaele L. Ventus, Training Specialist I, and was  under the supervision of PHSI Office, headed by Ms. Ludy Borja and Engr. Marlon Grande.  On top of that, the CHR committee donated one BROTHER Printer and  sponsored  sublimated t-shirts to the club. 
The orientation was fruitful as the speakers and spectators shared their knowledge and insights  towards human rights — civil, political, economic, social, and cultural rightsand also tackled Gender and Development, which is  prevalent among the WMSU Youth Peace Mediator  members. This is congruent to the goal of the CHR which is to ensure the peace and security of each and every human being- moreso in a campus level.
Gracias CHR ! and together, we preserve and fight the rights of mankind!'),
(3, 'Peace Edukasyon', 'peace-edukasyon.jpg', '"If we want to reach real peace in this world, we should start educating children."', 'The WMSU Peace and Human Security Institute in collaboration with the WMSU Youth Peace Mediators -UNESCO Club together with our partners: EDUCO, Ateneo Center for Leadership and Governance,  Supreme Student Council Society of the Philippines, and Tactical Operations Wing Western Mindanao Philippine - Air Force,  held the PeacEdukasyon: Fun-aral for Children this 18th of February 2023 at Padayon Center Martha Drive, Sta. Catalina Zamboanga City. 
In connection with our goal to establish strong communities of practice in child-friendly local governance and social accountability, the WMSU Youth Peace Mediators -UNESCO Club decided to implement this community project with the objectives centered to provide access to alternative learning environments, engaging the children in recreational activities, and promote cultural diversity awareness through Peacebuilding. 
The beneficiary of the project was the 150 children who are bonafide residents of the Padayon center ranging from 7-13 years of age (Grades 1-6). The activities consist of 3 sessions: 1st session was centered on a seminar on Children rights, followed by a coloring session, and a thumb painting session. Additionally, we turned over grade school books and storybooks from our partners in Manila. The activities helped the children bond together through various educational games, helping them to foster awareness and solidarity among one another.
This event will not be possible without the help of our various partners and our esteemed and ever-supportive WMSU President, Ma. Carla A. Ochotorena for her unwavering support. We would also like to acknowledge the WMSU-PHSI Director, Asst. Prof. Ludivina Borja-Dekit, and our WMSU-UNESCO Club Adviser, Engr. Marlon Grande for their unending dedication and commitment to making this event a success.
Indeed, learning comes best when experienced. With this regard, experiencing PeacEdukasyon equips these children with the best learning towards peace!');

--
-- Indexes for table `unesco_news`
--
ALTER TABLE `unesco_news`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `unesco_news`
--
ALTER TABLE `unesco_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

-- --------------------------------------------------------
-- --------------------------------------------------------
--
--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_title`varchar(255) NOT NULL,
  `filename`varchar(255) NOT NULL,
  `image_description` text DEFAULT NULL,
  `news_content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--
INSERT INTO `news` (`id`, `news_title`, `filename`, `image_description`, `news_content`) VALUES
(1, 'Harnessing our Peace Efforts: Towards Solidarity in Service', 'phsi-dialogue.jpg', '"Mr. Hirotaka Sekiguchi recieving a certificate. He is the Senior Official of the National Federation of UNESCO Associations in JAPAN."', 'In line with the opening of the Mindanao Week of Peace 2022, on the 24th of November, the WMSU PHSI conducted a Peace Dialogue with the theme, "Harnessing our Peace Efforts: Towards Solidarity in Service". with the participation of Mr. Hirotaka Sekiguchi, the senior Official of the National Federation of UNESCO. The Peace Dialogue took place at the College of Teacher Education Social Hall, with the attendance of the WMSU-UNESCO Club members and Officers and different representatives from the College of Liberal Arts (CLA) , College of Education (CTE) , College of Islamic Studies ( CAIS) and College of Social Work and Community Development.
Let us commemorate this week of Peace as a remembrance and celebration of unity and solidarity through peace.'),
(2, 'In the Light of the Recent Flood in Zamboanga City', 'unesco-chr.jpg', '"Peace Mediators on their new WMSU UNESCO Club shirt."', 'On 17th of February, the Commission on human rights have successfully conducted an orientation that revved up the members of WMSU Youth Peace Mediators UNESCO Club. 
The event was spearheaded by Hon. Daniel S. Paculanang, Information Officer III and Hon. Ronaele L. Ventus, Training Specialist I, and was  under the supervision of PHSI Office, headed by Ms. Ludy Borja and Engr. Marlon Grande.  On top of that, the CHR committee donated one BROTHER Printer and  sponsored  sublimated t-shirts to the club. 
The orientation was fruitful as the speakers and spectators shared their knowledge and insights  towards human rights — civil, political, economic, social, and cultural rightsand also tackled Gender and Development, which is  prevalent among the WMSU Youth Peace Mediator  members. This is congruent to the goal of the CHR which is to ensure the peace and security of each and every human being- moreso in a campus level.
Gracias CHR ! and together, we preserve and fight the rights of mankind!'),
(3, 'Peace Edukasyon', 'peace-edukasyon.jpg', '"If we want to reach real peace in this world, we should start educating children."', 'The WMSU Peace and Human Security Institute in collaboration with the WMSU Youth Peace Mediators -UNESCO Club together with our partners: EDUCO, Ateneo Center for Leadership and Governance,  Supreme Student Council Society of the Philippines, and Tactical Operations Wing Western Mindanao Philippine - Air Force,  held the PeacEdukasyon: Fun-aral for Children this 18th of February 2023 at Padayon Center Martha Drive, Sta. Catalina Zamboanga City. 
In connection with our goal to establish strong communities of practice in child-friendly local governance and social accountability, the WMSU Youth Peace Mediators -UNESCO Club decided to implement this community project with the objectives centered to provide access to alternative learning environments, engaging the children in recreational activities, and promote cultural diversity awareness through Peacebuilding. 
The beneficiary of the project was the 150 children who are bonafide residents of the Padayon center ranging from 7-13 years of age (Grades 1-6). The activities consist of 3 sessions: 1st session was centered on a seminar on Children rights, followed by a coloring session, and a thumb painting session. Additionally, we turned over grade school books and storybooks from our partners in Manila. The activities helped the children bond together through various educational games, helping them to foster awareness and solidarity among one another.
This event will not be possible without the help of our various partners and our esteemed and ever-supportive WMSU President, Ma. Carla A. Ochotorena for her unwavering support. We would also like to acknowledge the WMSU-PHSI Director, Asst. Prof. Ludivina Borja-Dekit, and our WMSU-UNESCO Club Adviser, Engr. Marlon Grande for their unending dedication and commitment to making this event a success.
Indeed, learning comes best when experienced. With this regard, experiencing PeacEdukasyon equips these children with the best learning towards peace!');

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

-- --------------------------------------------------------

--
-- Table structure for table `rsvp` 
--

CREATE TABLE `rsvp` (
  `id` int(11) NOT NULL, 
  `event_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `bldg_house_no` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `organization`varchar(50) NOT NULL,
  `member_type` varchar(50) NOT NULL,
  `attendance` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rsvp`
--

--
-- Indexes for table `rsvp`
--
ALTER TABLE `rsvp`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for table `rsvp`
--
ALTER TABLE `rsvp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- --------------------------------------------------------

-- --------------------------------------------------------
--
--
-- Table structure for table `unesco_history`
--

CREATE TABLE `unesco_history` (
  `id` int(11) NOT NULL,
  `history_title`varchar(255) NOT NULL,
  `filename`varchar(255) NOT NULL,
  `history_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unesco_history`
--
INSERT INTO `unesco_history` (`id`, `history_title`, `filename`, `history_description`) VALUES
(1, 'The History of Peace and Human Security Institute', 'phsi.png', 'Western Mindanao State University (WMSU) created the Center for Peace and Development (CPD) in January 2000, to generate well- rounded and productive people for the region, ensuring the good welfare of the society grounded on democratic and peaceful initiative. In 2010, it was renamed as Peace and Human Security Institute (PHSI), becoming the peace-building arm of the Office of the University President. Today, under Dr. Ma. Carla A. Ochotorena, the office takes the lead in engaging WMSU in the government-led peace efforts to be the main protagonist in peace education and research on the resolution of local conflicts.');



--
-- Indexes for table `unesco_history`
--
ALTER TABLE `unesco_history`
  ADD PRIMARY KEY (`id`);   
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `unesco_history`
--
ALTER TABLE `unesco_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

-- --------------------------------------------------------

-- --------------------------------------------------------
--
--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `history_title`varchar(255) NOT NULL,
  `filename`varchar(255) NOT NULL,
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

-- --------------------------------------------------------

--
--
-- Table structure for table `unesco_misvis`
--

CREATE TABLE `unesco_misvis` (
  `id` int(11) NOT NULL,
  `misvis_title`varchar(255) NOT NULL,
  `filename`varchar(255) NOT NULL,
  `misvis_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unesco_misvis`
--
INSERT INTO `unesco_misvis` (`id`, `misvis_title`, `filename`, `misvis_description`) VALUES
(1, 'Vision', 'phsi-p5.png', 'A group of men and women in WMSU working in the field of instruction, research, and extension, towards the promotion of a Culture of Peace and the provision of the opportunities and caring spaces that facilitate the development and expression of the potentials, capabilities, and talents of the people of Mindanao and the country.'),
(2, 'Mission', 'phsi-p7.png', 'The WMSU-PHSI seeks to expand and deepen the commitment, engagement, and involvement of individuals and groups inside and outside the university not only within the region but even in the national and international community, thru the offering of peace studies, integration of peace education, and other peace and development initiatives.');

--
-- Indexes for table `unesco_misvis`
--
ALTER TABLE `unesco_misvis`
  ADD PRIMARY KEY (`id`); 
  
--
-- AUTO_INCREMENT for dumped tables
--
--
--
-- AUTO_INCREMENT for table `unesco_misvis`
--
ALTER TABLE `unesco_misvis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
-- --------------------------------------------------------


-- --------------------------------------------------------

--
--
-- Table structure for table `misvis`
--

CREATE TABLE `misvis` (
  `id` int(11) NOT NULL,
  `misvis_title`varchar(255) NOT NULL,
  `filename`varchar(255) NOT NULL,
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
  `profile_picture`varchar(255) NOT NULL,
  `background_image`varchar(255) NOT NULL,
  `verify_one`varchar(255) NOT NULL,
  `verify_two`varchar(255) NOT NULL,
  `firstname`varchar(50) NOT NULL,
  `middlename`varchar(50) DEFAULT NULL,
  `lastname`varchar(50) NOT NULL,
  `suffix`varchar(50) DEFAULT NULL,
  `sex` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number`varchar(11) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `bldg_house_no` varchar(50) DEFAULT NULL,
  `username`varchar(50) NOT NULL,
  `password`varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `is_agree`varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `organization`varchar(50) NOT NULL,
  `member_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_acc_data`
--
INSERT INTO `user_acc_data` (`id`, `profile_picture`, `background_image`, `verify_one`, `verify_two`, `firstname`, `middlename`, `lastname`, `suffix`, `sex`, `email`, `contact_number`, `province`, `city`, `barangay`, `street_name`, `bldg_house_no`, `username`, `password`, `role`, `is_agree`, `status`, `organization`, `member_type`) VALUES
(1, 'dp8.jpg', 'phsi-carousel.jpg', 'rj1.jpg', 'rj2.jpg', 'Arjay', 'Lumibot', 'Malaga', '', 'Male', 'arjay.malagagmail.com', '09770063601', 'Zamboanga del Sur', 'Zamboanga City', 'Guiwan', 'Callejon Drive', '', 'arjay', 'arjay', 'super_admin', 'Yes', 'Pending', 'None', 'Student'),
(2, 'dp2.jpg', 'phsi-carousel.jpg', 'jer1.jpg', 'jer2.jpg', 'Jericho', 'Bello', 'Sagdi', '', 'Male', 'jericho.sagdi@gmail.com', '09770063602', 'Zamboanga del Sur', 'Zamboanga City', 'San Roque', 'Macrohon Drive', '', 'jericho', 'jericho', 'phsi_admin', 'Yes', 'Pending', 'Student', 'Not'),
(3, 'dp1.jpg', 'phsi-carousel.jpg', 'ben1.jpg', 'ben2.jpg', 'Bennett', 'Gelacio', 'Chan', '', 'Male', 'gelacio.chan@gmail.com', '09770063602', 'Zamboanga del Sur', 'Zamboanga City', 'San Roque', 'Macrohon Drive', '', 'ben', 'ben', 'unesco_admin', 'Yes', 'Pending', 'Student', 'Not'),
(4, 'dp3.jpg', 'phsi-carousel.jpg', 'hadz1.jpg', 'hadz2.jpg', 'Hadzramar', 'Iblang', 'Jaafar', '', 'Male', 'hadzramar.iblang@gmail.com', '09770063602', 'Zamboanga del Sur', 'Zamboanga City', 'San Roque', 'Macrohon Drive', '', 'hadz', 'hadz', 'phsi_content_admin', 'Yes', 'Pending', 'Student', 'Not'),
(5, 'dp4.jpg', 'phsi-carousel.jpg', 'kat1.jpg', 'kat2.jpg', 'Kaitlyn', 'Quimbo', 'Mira', '', 'Female', 'mira.kaitlyn@gmail.com', '09770063602', 'Zamboanga del Sur', 'Zamboanga City', 'San Roque', 'Macrohon Drive', '', 'mira', 'mira', 'unesco_content_admin', 'Yes', 'Pending', 'Student', 'Not'),
(6, 'dp5.jpg', 'phsi-carousel.jpg', 'ange1.jpg', 'ange2.jpg', 'Angelica', '', 'Deoric', '', 'Female', 'deoric.angelica@gmail.com', '09770063602', 'Zamboanga del Sur', 'Zamboanga City', 'San Roque', 'Macrohon Drive', '', 'angelica', 'angelica', 'user', 'Yes', 'Pending', 'Student', 'Not');



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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
