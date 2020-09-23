-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 11:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456', 'user.png'),
(2, 'Admin_2', 'admin_2@gmail.com', '123456', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(100) NOT NULL,
  `off_day` date NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `off_day`, `description`) VALUES
(2, '2018-07-26', 'Study tour'),
(3, '2018-07-31', 'Industrial Visit'),
(4, '2018-12-25', 'Crismas Day'),
(5, '2018-07-03', 'Dhormoghot'),
(6, '2018-05-01', 'May day');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Production'),
(2, 'Research and Development'),
(3, 'Purchasing'),
(4, 'Marketing'),
(5, 'Human Resource Management'),
(6, 'Accounting and Finance'),
(7, 'Quality Assurance'),
(8, 'Quality Control');

-- --------------------------------------------------------

--
-- Table structure for table `due`
--

CREATE TABLE `due` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_due` int(100) NOT NULL,
  `month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `due`
--

INSERT INTO `due` (`id`, `name`, `email`, `total_due`, `month`) VALUES
(27, 'Puja Roy', 'puja@gmail.com', 156500, '2018-08'),
(28, 'Maliha Mahjabeen', 'maliha@gmail.com', 75000, '2018-08');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nick_name` varchar(25) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` int(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `joindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `nick_name`, `email`, `password`, `department`, `designation`, `gender`, `phone`, `address`, `image`, `joindate`) VALUES
(1, 'Dr. Risala Tasin Khan', 'Risala', 'risala@gmail.com', 'risala', 'Institute of Information Technology', 'Professor', 'Female', 1715108479, 'Uttara', 'risala.jpg', '2019-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(100) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `invited_dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `topic`, `date`, `time`, `location`, `invited_dept`) VALUES
(1, 'Traning on Leadership management', '2018-08-18', '17:00', 'HR Building, room#305', 'Quality Assurance'),
(2, 'Traning on ECTD', '2018-08-10', '14:00', 'HR Building, room#109', 'Research and Development'),
(3, 'Traning on Self development', '2018-08-14', '17:00', 'HR Building, room#201', 'All');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(100) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `doc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `uploader`, `department`, `date`, `doc`) VALUES
(40, 'admin', 'Human Resource Management', '2018-07-28', 'CV_Fatema_final.pdf'),
(41, 'Puja Roy', 'Quality Assurance', '2018-08-10', 'ch3.pdf'),
(42, 'Puja Roy', 'All', '2018-08-10', 'Possible-Questions-for-1st-Tutorial.docx');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `subject`, `msg`, `date`, `time`) VALUES
(2, 'admin@gmail.com', 'puja@gmail.com', 'meeting', 'join the meeting at 2 pm Today.', '2018-07-23', '09:18:15.000000'),
(3, 'puja@gmail.com', 'admin@gmail.com', 'meeting', 'meeting at 2 pm Today.', '2018-06-23', '08:18:15.025000'),
(4, 'puja@gmail.com', 'admin@gmail.com', 'meeting', 'classat 2 pm Today.', '2018-07-10', '10:18:10.087000'),
(5, 'fatema@gmail.com', 'admin@gmail.com', 'meeting', 'join the meeting at 2 pm Today.', '2018-07-20', '11:30:15.000000'),
(8, 'admin@gmail.com', 'fatema@gmail.com', 'off day', 'take a off day if you wish', '2018-07-20', '09:01:56.000000'),
(11, 'admin@gmail.com', 'puja@gmail.com', 'off day', 'take a off day if you wish', '2018-07-20', '09:11:46.000000'),
(12, 'puja@gmail.com', 'admin@gmail.com', 'Meeting', 'Yes sir.', '2018-07-20', '14:16:44.000000'),
(13, 'puja@gmail.com', 'maliha@gmail.com', 'Report', 'Did You submitted the report?', '2018-08-10', '14:31:23.000000'),
(14, 'puja@gmail.com', 'maliha@gmail.com', 'Exam', 'When The employee exam will be taken?', '2018-08-10', '14:32:38.000000'),
(15, 'puja@gmail.com', 'admin@gmail.com', 'meeting', 'meeting at 2 pm Today.', '2018-08-10', '08:18:15.025000'),
(16, 'fatema@gmail.com', 'admin@gmail.com', 'meeting', 'join the meeting at 2 pm Today Sir.', '2018-08-10', '11:30:15.000000');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ac_no` varchar(255) NOT NULL,
  `basic` int(100) NOT NULL,
  `absent` varchar(255) NOT NULL,
  `delay` varchar(255) NOT NULL,
  `deducted_amount` int(100) NOT NULL,
  `netsal` int(100) NOT NULL,
  `amount_paid` int(100) NOT NULL,
  `amount_due` int(100) NOT NULL,
  `date_of_payment` date NOT NULL,
  `salary_of_month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `email`, `ac_no`, `basic`, `absent`, `delay`, `deducted_amount`, `netsal`, `amount_paid`, `amount_due`, `date_of_payment`, `salary_of_month`) VALUES
(57, 'Puja ', 'puja@gmail.com', '113339676676', 500000, '20', '0', 180000, 38400, 300000, 41000, '2018-08-08', 'june-2018'),
(58, 'Puja ', 'puja@gmail.com', '113339676676', 500000, '20', '0', 180000, 320000, 500, 40500, '2018-08-08', 'june-2018'),
(59, 'Puja ', 'puja@gmail.com', '113339676676', 500000, '20', '0', 180000, 320000, 30000, 10500, '2018-08-08', 'june-2018'),
(61, 'Maliha Mahjabeen', 'maliha@gmail.com', '673339676676', 60000, '18', '1', 19200, 96300, 6300, 90000, '2018-08-10', 'july-2018'),
(62, 'Maliha Mahjabeen', 'maliha@gmail.com', '673339676676', 60000, '18', '1', 19200, 96300, 10000, 80000, '2018-08-11', 'july-2018'),
(63, 'Maliha Mahjabeen', 'maliha@gmail.com', '673339676676', 60000, '18', '1', 19200, 96300, 5000, 75000, '2018-08-11', 'july-2018');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` int(100) NOT NULL,
  `last_date` date NOT NULL,
  `Submit_date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `last_date`, `Submit_date`, `email`, `department`, `task`, `action`) VALUES
(4, '2018-07-31', '2018-06-26', 'puja@gmail.com', 'Quality Assurance', 'go home', 'true'),
(5, '2018-05-30', '2018-05-26', 'fatema@gmail.com', 'Marketing', 'hyjfgh ff', 'true'),
(6, '2018-06-30', '2018-06-26', 'fatema@gmail.com', 'Marketing', 'hyjfgh ff', 'true'),
(7, '2018-07-30', '2018-07-26', 'fatema@gmail.com', 'Marketing', 'hyjfgh ff', 'true'),
(9, '2018-05-29', '2018-06-26', 'puja@gmail.com', 'Quality Assurance', 'go home', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `provident`
--

CREATE TABLE `provident` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  `pay` int(10) NOT NULL,
  `date_of_pay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provident`
--

INSERT INTO `provident` (`id`, `email`, `amount`, `pay`, `date_of_pay`) VALUES
(11, 'puja@gmail.com', 5000, 0, '0000-00-00'),
(12, 'maliha@gmail.com', 3000, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `id_teacher` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `name`, `attendance_status`, `date`, `time`, `id_teacher`) VALUES
(1, 'Dr. Risala Tasin khan ', 'Present', '2019-07-10', '07:38:56.000000', 1),
(2, 'Dr. Risala Tasin khan ', 'Late', '2019-07-23', '08:38:56.000000', 1),
(4, 'Dr. Risala Tasin khan ', 'Present', '2019-07-16', '07:38:56.000000', 1),
(6, 'Dr. Risala Tasin khan ', 'Late', '2019-07-21', '08:38:56.000000', 1),
(7, 'Dr. Risala Tasin khan ', 'Present', '2019-07-02', '07:38:56.000000', 1),
(8, 'Dr. Risala Tasin khan ', 'Late', '2019-07-03', '08:38:56.000000', 1),
(9, 'Dr. Risala Tasin khan ', 'Present', '2019-07-13', '07:38:56.000000', 1),
(24, 'Dr. Risala Tasin khan ', 'Absent', '2019-07-03', '00:00:00.000000', 1),
(26, 'Dr. Risala Tasin khan', 'absent', '2019-07-02', '00:00:00.000000', 1),
(253, 'Dr. Risala Tasin khan ', 'Present', '2019-07-02', '07:38:56.000000', 1),
(254, 'Dr. Risala Tasin khan ', 'Late', '2019-07-03', '08:38:56.000000', 1),
(256, 'Dr. Risala Tasin khan ', 'Present', '2019-07-08', '07:38:56.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(100) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `basic` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `desig`, `basic`, `others`) VALUES
(1, 'Officer', '30000', '30000'),
(2, 'Executive', '40000', '40000'),
(3, 'Assistant Manager', '50000', '50000'),
(4, 'Manager', '60000', '60000'),
(5, 'Vice President', '80000', '80000'),
(6, 'CEO', '100000', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `task` varchar(255) CHARACTER SET utf8 NOT NULL,
  `assign_date` date NOT NULL,
  `last_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `email`, `department`, `designation`, `task`, `assign_date`, `last_date`) VALUES
(2, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'do work', '2018-07-24', '2018-07-30'),
(3, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'jahir', '2018-07-24', '2018-07-03'),
(7, 'fatema@gmail.com', 'Marketing', 'Officer', 'ghhhjhj', '2018-07-26', '2018-06-20'),
(8, 'fatema@gmail.com', 'Marketing', 'Officer', 'fklklfkl', '2018-07-26', '2018-06-16'),
(9, 'fatema@gmail.com', 'Marketing', 'Officer', 'fklklfkl;kk', '2018-07-26', '2018-05-16'),
(10, 'fatema@gmail.com', 'Marketing', 'Officer', 'fklk\'lfkl;kk', '2018-07-26', '2018-05-16'),
(11, 'fatema@gmail.com', 'Marketing', 'Officer', 'fklk@;kk', '2018-07-26', '2018-07-16'),
(12, 'fatema@gmail.com', 'Marketing', 'Officer', 'good job', '2018-07-26', '2018-07-02'),
(13, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'gjhgjh gjhgh gjhgjh', '2018-08-08', '2018-08-31'),
(14, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'gjhgjh gjhgh gjhgjh', '2018-08-08', '2018-08-31'),
(15, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'Complete Report Of Pakistan', '2018-08-10', '2018-07-11'),
(16, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'Complete Report Of India', '2018-08-10', '2018-08-15'),
(17, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'Complete Report Of Australia', '2018-08-10', '2018-07-17'),
(30, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'complete report of India', '2018-08-10', '2018-08-21'),
(31, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'complete report of Australia', '2018-08-10', '2018-07-23'),
(32, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'complete report of India', '2018-08-10', '2018-08-21'),
(33, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'complete report of Australia', '2018-08-10', '2018-07-23'),
(34, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'complete report of India', '2018-08-10', '2018-08-21'),
(35, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'complete report of Australia', '2018-08-10', '2018-07-23'),
(36, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'complete report of India', '2018-08-10', '2018-08-21'),
(37, 'puja@gmail.com', 'Quality Assurance', 'CEO', 'complete report of Australia', '2018-08-10', '2018-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `phone` int(100) NOT NULL,
  `image` text NOT NULL,
  `joindate` date NOT NULL,
  `dept` varchar(1111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `designation`, `gender`, `phone`, `image`, `joindate`, `dept`) VALUES
(1, 'M Shamim Kaiser', 'mkaiser@gmail.com', 'mkaiser', 'Associate Professor', 'Male', 1711939323, 'user.png', '0000-00-00', ''),
(2, 'KM Akkas Ali', 'akkasali@gmail.com', 'akkasali', 'Associate Professor', 'Male', 1711676756, 'user.png', '0000-00-00', ''),
(4, 'manager', 'maliha@gmail.com', 'maliha', 'Associate Professor', 'female', 2147483647, 'user.png', '2018-05-21', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due`
--
ALTER TABLE `due`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provident`
--
ALTER TABLE `provident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
