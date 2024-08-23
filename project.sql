-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 06:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `from_date` int(11) NOT NULL,
  `To_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `declaration_date` date NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement_type`
--

CREATE TABLE `tbl_announcement_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `name`) VALUES
(1, 'Ahmedabad'),
(2, 'Surat'),
(3, 'Vadodara'),
(4, 'Rajkot'),
(5, 'Bhavnagar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_community_major_request`
--

CREATE TABLE `tbl_community_major_request` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_community_member_request`
--

CREATE TABLE `tbl_community_member_request` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation`
--

CREATE TABLE `tbl_donation` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `uid` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hall_booking`
--

CREATE TABLE `tbl_hall_booking` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `request_date` date NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hall_master`
--

CREATE TABLE `tbl_hall_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `rent` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participation`
--

CREATE TABLE `tbl_participation` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `participation_form` varchar(255) NOT NULL,
  `submit_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scholarship`
--

CREATE TABLE `tbl_scholarship` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `adhar_card_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `school_unviersity_name` varchar(30) NOT NULL,
  `previous_year_marksheet` float NOT NULL,
  `current_year_std` varchar(30) NOT NULL,
  `pan_card_no_father` varchar(11) NOT NULL,
  `pan_card_no_mother` varchar(11) NOT NULL,
  `occupation_father` varchar(20) NOT NULL,
  `occupation_mother` varchar(20) NOT NULL,
  `father_income` float NOT NULL,
  `mother_income` float NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `bank_ifsc_code` varchar(20) NOT NULL,
  `account_no` bigint(20) NOT NULL,
  `income_certificate` varchar(255) NOT NULL,
  `fees_receipt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(255) NOT NULL,
  `caste_certificate` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` varchar(20) NOT NULL,
  `cityid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `gender`, `dob`, `contactno`, `address`, `email`, `password`, `caste_certificate`, `status`, `role`, `cityid`) VALUES
(2, 'Naishal Manish Doshi', 'Naishal', 0, '2023-06-23', '9326163059', 'Pratistha Apartments, Pragati Nagar, Piplod Jakatnaka, Pratistha Apartments, Piplod Main Road, Maheshwari Society, Krishnadham Society, Piplod, Surat, Gujarat, 395007, India', 'naishal036@gmail.com', 'ef2bc263dfe4143ca13bee83cddbad25', 'certificate/srs final group.pdf', 0, 'Member', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `tbl_announcement_type`
--
ALTER TABLE `tbl_announcement_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_community_major_request`
--
ALTER TABLE `tbl_community_major_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_community_member_request`
--
ALTER TABLE `tbl_community_member_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_hall_booking`
--
ALTER TABLE `tbl_hall_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `tbl_hall_master`
--
ALTER TABLE `tbl_hall_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_participation`
--
ALTER TABLE `tbl_participation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_scholarship`
--
ALTER TABLE `tbl_scholarship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityid` (`cityid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_announcement_type`
--
ALTER TABLE `tbl_announcement_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_community_major_request`
--
ALTER TABLE `tbl_community_major_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_community_member_request`
--
ALTER TABLE `tbl_community_member_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hall_booking`
--
ALTER TABLE `tbl_hall_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hall_master`
--
ALTER TABLE `tbl_hall_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_participation`
--
ALTER TABLE `tbl_participation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_scholarship`
--
ALTER TABLE `tbl_scholarship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD CONSTRAINT `tbl_announcement_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `tbl_announcement_type` (`id`);

--
-- Constraints for table `tbl_community_major_request`
--
ALTER TABLE `tbl_community_major_request`
  ADD CONSTRAINT `tbl_community_major_request_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_community_member_request`
--
ALTER TABLE `tbl_community_member_request`
  ADD CONSTRAINT `tbl_community_member_request_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  ADD CONSTRAINT `tbl_donation_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_hall_booking`
--
ALTER TABLE `tbl_hall_booking`
  ADD CONSTRAINT `tbl_hall_booking_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_hall_booking_ibfk_2` FOREIGN KEY (`hall_id`) REFERENCES `tbl_hall_master` (`id`);

--
-- Constraints for table `tbl_participation`
--
ALTER TABLE `tbl_participation`
  ADD CONSTRAINT `tbl_participation_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `tbl_announcement_type` (`id`),
  ADD CONSTRAINT `tbl_participation_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_scholarship`
--
ALTER TABLE `tbl_scholarship`
  ADD CONSTRAINT `tbl_scholarship_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_scholarship_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `tbl_announcement` (`id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `tbl_city` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
