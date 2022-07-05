-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 03:51 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `done` int(11) NOT NULL DEFAULT 0,
  `scores` int(11) DEFAULT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  `ans_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `course_id`, `question_id`, `answer`, `done`, `scores`, `lecturer_id`, `level`, `dept`, `ans_date`) VALUES
(8, 2, 2, 17, '&lt;p&gt;Civil Engineering is all about Building of Houses&lt;/p&gt;', 1, 18, 1, 1, 2, '2022-07-05 08:58:31'),
(9, 4, 2, 16, 'This is what is doing.', 0, 19, 1, 3, 2, '2022-07-06 00:21:55'),
(10, 2, 3, 5, 'Fuad is here', 0, 14, 2, 4, 1, '2022-07-06 00:21:55'),
(11, 4, 2, 16, 'This is what is doing.', 0, 19, 1, 3, 2, '2022-07-06 00:22:04'),
(12, 5, 3, 5, 'Fuad is here', 0, 14, 2, 4, 1, '2022-07-06 00:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course` varchar(50) DEFAULT NULL,
  `course_title` varchar(10) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course`, `course_title`, `dept_id`) VALUES
(1, 'Introduction to Computer', 'CSC 111', 1),
(2, 'Portography', 'SUG 111', 4);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(40) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `faculty_id`) VALUES
(1, 'Computer Science', 1),
(2, 'Civil Engineering', 2),
(3, 'Aeronautical Engineering', 2),
(4, 'Survey and Geo-Informatics', 3),
(5, 'Accountancy', 4);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty`) VALUES
(1, 'Faculty of Science'),
(2, 'Faculty of Engineering'),
(3, 'Faculty of Environmental Studies'),
(4, 'Facaulty of Financial Management Studies');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `question` longtext DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  `date_set` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `course_id`, `question`, `answer`, `code`, `level`, `dept`, `date_set`) VALUES
(16, 1, 2, '&lt;p&gt;Whats is Aeronautical Engineering all about&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Aeronautical Engineering is all about repairing Air Crafts&lt;br&gt;&lt;/p&gt;', 'caedbf', 1, 3, '2022-07-05 08:53:34'),
(17, 1, 2, '&lt;p&gt;What is Civil Engineering all about?&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Civil Engineering is all about Construction of Building.&lt;br&gt;&lt;/p&gt;', 'bdacef', 1, 2, '2022-07-05 08:57:23'),
(18, 1, 2, '&lt;p&gt;What is Building&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Building is&amp;nbsp; a Form of Life&lt;br&gt;&lt;/p&gt;', 'fedacb', 1, 2, '2022-07-06 01:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(40) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `slug`) VALUES
(1, 'First Year', 'first-year'),
(2, 'Second Year', 'second-year'),
(3, 'Third Year', 'third-year'),
(4, 'Fourth Year', 'fourth-year'),
(5, 'Fifth Year', 'fifth-year');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(14) DEFAULT NULL,
  `profile_pic` varchar(50) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `semester` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `approve` int(11) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `test` varchar(10) NOT NULL DEFAULT 'inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_no`, `profile_pic`, `department`, `course`, `semester`, `password`, `status`, `approve`, `gender`, `dob`, `test`, `date_created`) VALUES
(1, 'Abdulhammed Fuad', 'zfuad6454@gmail.com', '07067752068', '54722440.png', 1, 2, '1', '15317ede3526ea08664db7c5737ba843', 'lecturer', 1, 'male', '2022-04-27', 'inactive', '2022-05-12 09:40:55'),
(2, 'Abdul-Rasheed Modeenah', 'modeenah@gmail.com', '07057262233', '36105712.png', 2, NULL, '1', '15317ede3526ea08664db7c5737ba843', 'student', 1, 'female', '2022-06-22', 'inactive', '2022-06-08 10:59:18'),
(3, 'Subair Sofiyah', 'sofee@gmail.com', '09089876546', NULL, 4, 2, '1', '15317ede3526ea08664db7c5737ba843', 'admin', 1, 'female', '2022-05-30', 'inactive', '2022-06-13 08:23:25'),
(4, 'Ajide Al-Ameen', 'alameen@gmail.com', '0890986564', NULL, NULL, NULL, NULL, '15317ede3526ea08664db7c5737ba843', 'admin', 1, 'male', NULL, 'inactive', '2022-06-13 08:32:36'),
(5, 'Afolabi Temidayo Timothy', 'afolabi8120@gmail.com', '08090949669', NULL, NULL, NULL, '1', '15317ede3526ea08664db7c5737ba843', 'admin', 0, 'male', '1997-07-09', 'inactive', '2022-06-24 23:55:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
