-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 10:05 PM
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
-- Table structure for table `cmajor_request`
--

CREATE TABLE `cmajor_request` (
  `mid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm_request`
--

CREATE TABLE `cm_request` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cm_request`
--

INSERT INTO `cm_request` (`rid`, `uid`, `status`) VALUES
(6, 38, 'Pending'),
(7, 36, 'Accepted'),
(8, 36, 'Rejected'),
(9, 35, 'Accepted'),
(10, 39, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `contactno` bigint(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `castecertificate` varchar(255) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `username` varchar(60) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`uid`, `name`, `gender`, `dob`, `contactno`, `address`, `email`, `password`, `castecertificate`, `status`, `username`, `role`) VALUES
(35, 'Princy P Gandhi', 'F', '2005-01-04', 9876584213, 'Surat', '22bmiit019@gmail.com', '$2y$10$qyUmolnYMm3EZ4M6ksQqtOuUTbSmm0RKZ', 'certificate/community management System.docx', b'1', 'princy', 'Member'),
(36, 'Ishita M Patel', 'F', '2004-02-24', 7451854845, 'surat', '22bmiit022@gmail.com', '56f6cd0339afc925736fde4ec6a19dbe', 'certificate/community management System11.docx', b'1', 'CMember', 'cMember'),
(37, 'Prachi A Patel', 'F', '2004-10-13', 9876543210, 'surat', '22bmiit136@gmail.com', 'd728dda98bf143ad20867fc35c3cca4c', 'certificate/community management System11.docx', b'1', 'prachi', 'Member'),
(38, 'Riddhi S Patel', 'F', '2004-09-09', 9099441752, 'Dindoli', '22bmiit085@gmail.com', '6d27ac79895f44a9f1b5e0743eb308b8', 'certificate/community management System11.docx', b'1', 'riddhi', 'Member'),
(39, 'Sandip Delwadkar', 'M', '1979-06-16', 9328719610, 'zhbvzhjbvdhjvbjv znjb njv xjv ', 'sandip.delwadkar@utu', 'b00cb291175b7d6403933130e95402f7', 'certificate/community management System11.docx', b'1', 'SDD', 'Member'),
(41, 'Prachi A Patel', 'F', '2004-10-13', 7777777777, 'Surat', 'xyz@gmail.com', '14de6b261ca2a3e8a5d2994088301032', 'certificate/srs final group.pdf', b'1', 'Memebr', 'not registered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmajor_request`
--
ALTER TABLE `cmajor_request`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `cm_request`
--
ALTER TABLE `cm_request`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmajor_request`
--
ALTER TABLE `cmajor_request`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cm_request`
--
ALTER TABLE `cm_request`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cmajor_request`
--
ALTER TABLE `cmajor_request`
  ADD CONSTRAINT `cmajor_request_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `cm_request` (`rid`);

--
-- Constraints for table `cm_request`
--
ALTER TABLE `cm_request`
  ADD CONSTRAINT `cm_request_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
