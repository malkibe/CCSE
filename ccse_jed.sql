-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 02:58 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccse_jed`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_members`
--

CREATE TABLE `faculty_members` (
  `id` int(11) NOT NULL,
  `JobId` varchar(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_members`
--

INSERT INTO `faculty_members` (`id`, `JobId`, `name`, `mobile`, `email`, `username`, `password`) VALUES
(1, '0777784', 'Abeer Alghamdi', '0564854714', 'Aalghamdi@kau.edu.sa', 'AbeerAlghamdi', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `facultymemberid` int(11) NOT NULL,
  `CategoryType` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `facultymembeEmail` varchar(50) DEFAULT NULL,
  `datetime` date DEFAULT NULL,
  `categoryname` varchar(50) DEFAULT NULL,
  `officeno` varchar(10) DEFAULT NULL,
  `computertype` varchar(20) DEFAULT NULL,
  `operatingsystem` varchar(20) DEFAULT NULL,
  `problem` longtext,
  `note` longtext NOT NULL,
  `tech_note` longtext NOT NULL,
  `status` varchar(20) NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `facultymembeEmail`, `datetime`, `categoryname`, `officeno`, `computertype`, `operatingsystem`, `problem`, `note`, `tech_note`, `status`, `flag`) VALUES
(23, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(24, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(27, 'mdfcit.16@gmail.com', '2020-03-23', 'Hardware', '125', 'Work Computer', 'Windows', 'Software', 'test again', 'null', 'Under the procedure', 1),
(28, 'mdfcit.16@gmail.com', '2020-03-23', 'Hardware', '125', 'Work Computer', 'Windows', 'Software', 'test again', 'null', 'Under the procedure', 1),
(29, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(30, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(31, 'mdfcit.16@gmail.com', '2020-03-23', 'Hardware', '125', 'Work Computer', 'Windows', 'Software', 'test again', 'null', 'Under the procedure', 1),
(32, 'mdfcit.16@gmail.com', '2020-03-23', 'Hardware', '125', 'Work Computer', 'Windows', 'Software', 'test again', 'null', 'Under the procedure', 1),
(33, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(34, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(35, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(36, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(37, 'mdfcit.16@gmail.com', '2020-03-23', 'Hardware', '125', 'Work Computer', 'Windows', 'Software', 'test again', 'null', 'Under the procedure', 1),
(38, 'mdfcit.16@gmail.com', '2020-03-23', 'Hardware', '125', 'Work Computer', 'Windows', 'Software', 'test again', 'null', 'Under the procedure', 1),
(39, 'mdfcit.16@gmail.com', '2020-03-23', 'Hardware', '125', 'Work Computer', 'Windows', 'Software', 'test again', 'null', 'Under the procedure', 1),
(40, 'mdfcit.16@gmail.com', '2020-03-23', 'Hardware', '125', 'Work Computer', 'Windows', 'Software', 'test again', 'null', 'Under the procedure', 1),
(41, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(42, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(43, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(44, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(45, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(46, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(47, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(48, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(49, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(50, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(51, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(52, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(53, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(54, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(55, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'In Progress', 1),
(56, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(57, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(58, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(59, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(60, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(61, 'Aalghamdi@kau.edu.sa', '2020-03-22', 'Network', '255', 'Work Computer', 'Windows', 'Software', 'Test email and form ', '', 'Fixed', 1),
(62, 'Aalghamdi@kau.edu.sa', '2020-03-26', 'Network', '548', 'Work Computer', 'Windows', 'Network', 'لا تضحكِ يا ليان', '', 'In Progress', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `labno` varchar(10) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `courseno` varchar(10) NOT NULL,
  `section` varchar(5) NOT NULL,
  `studentno` int(11) NOT NULL,
  `software` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `email`, `labno`, `semester`, `date`, `time`, `courseno`, `section`, `studentno`, `software`) VALUES
(1, 'mdfcit.16@gmail.com', '15', 'First semester', '2020-03-24', '02:00 AM', '3', '22', 22, 'null'),
(3, 'mdfcit.16@gmail.com', '100', 'First semester', '2020-03-24', '12:00 AM', '3', '22', 22, 'null'),
(4, 'mdfcit.16@gmail.com', '110', 'First semester', '2020-03-25', '12:00 AM', '3', '22', 22, 'null'),
(5, 'mdfcit.16@gmail.com', '113', 'Secound semester', '2020-03-26', '02:00 AM', '3', '22', 22, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `id` int(11) NOT NULL,
  `JobId` varchar(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`id`, `JobId`, `category_name`, `name`, `mobile`, `email`, `username`, `password`) VALUES
(1, '1606632', 'Network', 'Layan', '0555887957', 'Layan-mgh@hotmail.com', 'Layanmgh', '321321'),
(2, '162541', 'Software', 'Moayad', '056154636', 'mdfcit.16@gmail.com', 'Moayad', '12312311');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_members`
--
ALTER TABLE `faculty_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_members`
--
ALTER TABLE `faculty_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
