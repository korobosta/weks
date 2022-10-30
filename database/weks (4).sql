-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 04:15 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weks`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisers`
--

CREATE TABLE `advisers` (
  `adviser_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `grade_id` varchar(5) NOT NULL,
  `section` varchar(20) NOT NULL,
  `program` varchar(5) NOT NULL,
  `school_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ATT_ID` int(30) NOT NULL,
  `STUDENT_ID` int(30) NOT NULL,
  `SYI_ID` int(30) NOT NULL,
  `MONTH` varchar(15) NOT NULL,
  `DAYS_OF_CLASSES` int(5) NOT NULL,
  `DAYS_PRESENT` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ATT_ID`, `STUDENT_ID`, `SYI_ID`, `MONTH`, `DAYS_OF_CLASSES`, `DAYS_PRESENT`) VALUES
(1, 1, 1, 'June', 10, 10),
(2, 1, 1, 'July', 10, 10),
(3, 1, 1, 'August', 10, 10),
(4, 1, 1, 'September', 10, 10),
(5, 1, 1, 'October', 10, 10),
(6, 1, 1, 'November', 10, 10),
(7, 1, 1, 'December', 10, 10),
(8, 1, 1, 'January', 10, 10),
(9, 1, 1, 'February', 10, 10),
(10, 1, 1, 'March', 10, 10),
(11, 1, 1, 'April', 10, 10),
(12, 1, 1, 'May', 10, 10),
(13, 1, 2, 'June', 0, 0),
(14, 1, 2, 'July', 0, 0),
(15, 1, 2, 'August', 0, 0),
(16, 1, 2, 'September', 0, 0),
(17, 1, 2, 'October', 0, 0),
(18, 1, 2, 'November', 0, 0),
(19, 1, 2, 'December', 0, 0),
(20, 1, 2, 'January', 0, 0),
(21, 1, 2, 'February', 0, 0),
(22, 1, 2, 'March', 0, 0),
(23, 1, 2, 'April', 0, 0),
(24, 1, 2, 'May', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `awss`
--

CREATE TABLE `awss` (
  `id` int(200) NOT NULL,
  `ff` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_b`
--

CREATE TABLE `data_b` (
  `db_id` int(10) NOT NULL,
  `db_name` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_base`
--

CREATE TABLE `data_base` (
  `db_id` int(10) NOT NULL,
  `dn_name` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(10) NOT NULL,
  `course` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `school_year` int(10) NOT NULL,
  `study_year` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `course`, `semester`, `amount`, `school_year`, `study_year`) VALUES
(9, 2, 1, 23400, 5, 1),
(10, 2, 1, 67900, 4, 1),
(11, 2, 1, 23000, 1, 1),
(12, 6, 1, 30000, 5, 1),
(13, 2, 2, 46000, 5, 2),
(14, 4, 1, 30000, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(10) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade`, `status`) VALUES
(1, '1', 'Yes'),
(2, '2', 'No'),
(3, '3', 'No'),
(4, '4', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `grades_per_subject`
--

CREATE TABLE `grades_per_subject` (
  `ID` int(11) NOT NULL,
  `STUDENT_ID` int(30) NOT NULL,
  `YEAR` int(5) NOT NULL,
  `SUBJECT` varchar(20) NOT NULL,
  `PERIODIC_GRADING` int(5) NOT NULL,
  `GRADES` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(10) NOT NULL,
  `transaction` varchar(200) NOT NULL,
  `user_id` int(5) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `transaction`, `user_id`, `date_added`) VALUES
(1, 'logged out', 4, '2020-10-14 23:58:21'),
(2, 'logged in', 1, '2020-10-14 23:58:27'),
(3, 'added 2016-2017 in the school year list', 1, '2020-10-14 23:58:42'),
(4, 'added 2017-2018 in the school year list', 1, '2020-10-14 23:58:53'),
(5, 'added 2018-2019 in the school year list', 1, '2020-10-14 23:59:07'),
(6, 'added 2019-2020 in the school year list', 1, '2020-10-14 23:59:19'),
(7, 'updated 2016-2017 as the current school year ', 1, '2020-10-14 23:59:29'),
(8, 'added 7 in the grades list', 1, '2020-10-14 23:59:44'),
(9, 'added 8 in the grades list', 1, '2020-10-14 23:59:49'),
(10, 'added 9 in the grades list', 1, '2020-10-14 23:59:53'),
(11, 'added 10 in the grades list', 1, '2020-10-15 00:00:01'),
(12, 'added Englis in the subject list', 1, '2020-10-15 00:00:39'),
(13, 'added Math in the subject list', 1, '2020-10-15 00:00:50'),
(14, 'added John Smith as new student', 1, '2020-10-15 00:02:28'),
(15, 'added record of m m', 0, '2020-10-15 00:10:07'),
(16, 'updated 2017-2018 as the current school year ', 1, '2020-10-15 00:11:02'),
(17, 'added record of m m', 0, '2020-10-15 00:16:00'),
(18, 'printed John Smith permanent record', 1, '2020-10-15 00:16:49'),
(19, 'printed Promoted Student List of 2017-2018', 1, '2020-10-15 00:17:22'),
(20, 'logged out', 1, '2020-10-15 00:17:55'),
(21, 'logged in', 2, '2020-10-15 00:18:03'),
(22, 'updated 1 in the curriculum list', 0, '2022-02-08 15:50:19'),
(23, 'updated 1 in the curriculum list', 0, '2022-02-08 15:50:22'),
(24, 'updated 1 in the curriculum list', 0, '2022-02-08 15:50:24'),
(25, 'updated 1 in the curriculum list', 0, '2022-02-08 15:50:26'),
(26, 'logged in', 1, '2022-02-10 15:49:56'),
(27, 'added   as new student', 1, '2022-02-10 17:19:04'),
(28, 'added   as new student', 1, '2022-02-10 17:19:39'),
(29, 'added   as new student', 1, '2022-02-10 17:20:05'),
(30, 'added   as new student', 1, '2022-02-10 17:21:08'),
(31, 'added   as new student', 1, '2022-02-10 17:21:28'),
(32, 'added   as new student', 1, '2022-02-10 17:22:17'),
(33, 'added   as new student', 1, '2022-02-10 17:23:00'),
(34, 'added   as new student', 1, '2022-02-10 17:23:43'),
(35, 'added gssg gfgfs as new student', 1, '2022-02-10 17:24:11'),
(36, 'added   as new student', 1, '2022-02-10 17:24:11'),
(37, 'added gssg gfgfs as new student', 1, '2022-02-10 17:27:23'),
(38, 'added   as new student', 1, '2022-02-10 17:27:23'),
(39, 'added gssg gfgfs as new student', 1, '2022-02-10 17:35:26'),
(40, 'added   as new student', 1, '2022-02-10 17:35:26'),
(41, 'added kevin ongulu as new student', 1, '2022-02-10 17:42:15'),
(42, 'added   as new student', 1, '2022-02-10 17:42:15'),
(43, 'logged in', 1, '2022-02-11 09:46:29'),
(44, 'added kevin korobosta as new student', 1, '2022-02-11 10:14:13'),
(45, 'added   as new student', 1, '2022-02-11 10:14:13'),
(46, 'logged out', 1, '2022-02-11 10:16:23'),
(47, 'logged in', 1, '2022-02-11 12:40:13'),
(48, 'added kevin korobosta as new student', 1, '2022-02-11 12:45:05'),
(49, 'added   as new student', 1, '2022-02-11 12:45:05'),
(50, 'added kevin korobosta as new student', 1, '2022-02-11 12:46:46'),
(51, 'added   as new student', 1, '2022-02-11 12:46:46'),
(52, 'added kevin korobosta as new student', 1, '2022-02-11 12:50:01'),
(53, 'added   as new student', 1, '2022-02-11 12:50:01'),
(54, 'added kevin korobosta as new student', 1, '2022-02-11 12:53:38'),
(55, 'added   as new student', 1, '2022-02-11 12:53:38'),
(56, 'added kevin korobosta as new student', 1, '2022-02-11 12:55:58'),
(57, 'added   as new student', 1, '2022-02-11 12:55:59'),
(58, 'added kevin korobosta as new student', 1, '2022-02-11 12:57:10'),
(59, 'added   as new student', 1, '2022-02-11 12:57:10'),
(60, 'added   as new student', 1, '2022-02-11 12:57:45'),
(61, 'added   as new student', 1, '2022-02-11 12:59:40'),
(62, 'added kevin korobosta as new student', 1, '2022-02-11 13:00:46'),
(63, 'added   as new student', 1, '2022-02-11 13:00:46'),
(64, 'added kevin korobosta as new student', 1, '2022-02-11 13:02:58'),
(65, 'added   as new student', 1, '2022-02-11 13:02:58'),
(66, 'added kevin korobosta as new student', 1, '2022-02-11 13:04:01'),
(67, 'added   as new student', 1, '2022-02-11 13:04:01'),
(68, 'logged out', 1, '2022-02-11 13:04:12'),
(69, 'logged in', 16, '2022-02-11 13:04:35'),
(70, 'logged out', 16, '2022-02-11 14:28:47'),
(71, 'logged in', 1, '2022-02-11 14:29:00'),
(72, 'updated 14 in the student list', 1, '2022-02-11 15:13:10'),
(73, 'updated 14 in the student list', 1, '2022-02-11 15:13:22'),
(74, 'updated 14 in the student list', 1, '2022-02-11 15:13:31'),
(75, 'updated 14 in the student list', 1, '2022-02-11 15:13:43'),
(76, 'updated 14 in the student list', 1, '2022-02-11 15:13:54'),
(77, 'updated 14 in the student list', 1, '2022-02-11 15:14:42'),
(78, 'updated 14 in the student list', 1, '2022-02-11 15:14:47'),
(79, 'updated 14 in the student list', 1, '2022-02-11 15:18:21'),
(80, 'updated 14 in the student list', 1, '2022-02-11 15:18:27'),
(81, 'updated 14 in the student list', 1, '2022-02-11 15:18:33'),
(82, 'updated 14 in the student list', 1, '2022-02-11 15:18:41'),
(83, 'updated 14 in the student list', 1, '2022-02-11 15:18:51'),
(84, 'updated 14 in the student list', 1, '2022-02-11 15:18:59'),
(85, 'updated 14 in the student list', 1, '2022-02-11 15:19:18'),
(86, 'updated 2 in the curriculum list', 0, '2022-02-11 15:20:10'),
(87, 'updated 2 in the curriculum list', 0, '2022-02-11 15:20:17'),
(88, 'updated 1 in the subject list', 1, '2022-02-11 15:28:58'),
(89, 'updated 1 in the subject list', 1, '2022-02-11 15:34:27'),
(90, 'updated 2 in the subject list', 1, '2022-02-11 15:37:42'),
(91, 'updated 2 in the curriculum list', 0, '2022-02-11 15:38:30'),
(92, 'added Information Systems in the subject list', 1, '2022-02-11 16:48:36'),
(93, 'updated 3 in the subject list', 1, '2022-02-11 16:49:24'),
(94, 'updated 3 in the subject list', 1, '2022-02-11 17:01:05'),
(95, 'updated 3 in the subject list', 1, '2022-02-11 17:09:07'),
(96, 'updated 3 in the subject list', 1, '2022-02-11 17:09:27'),
(97, 'updated 3 in the subject list', 1, '2022-02-11 17:11:36'),
(98, 'updated 3 in the subject list', 1, '2022-02-11 17:12:44'),
(99, 'updated 3 in the subject list', 1, '2022-02-11 17:14:13'),
(100, 'updated 2 in the subject list', 1, '2022-02-11 17:14:28'),
(101, 'updated 2 in the subject list', 1, '2022-02-11 17:14:42'),
(102, 'updated 2 in the subject list', 1, '2022-02-11 17:16:07'),
(103, 'updated 2 in the subject list', 1, '2022-02-11 17:16:14'),
(104, 'updated 2 in the subject list', 1, '2022-02-11 17:17:17'),
(105, 'updated 2 in the subject list', 1, '2022-02-11 17:17:30'),
(106, 'updated 3 in the subject list', 1, '2022-02-11 17:17:47'),
(107, 'updated 3 in the subject list', 1, '2022-02-11 17:18:01'),
(108, 'updated 2 in the subject list', 1, '2022-02-11 17:40:12'),
(109, 'updated 2 in the subject list', 1, '2022-02-11 17:43:47'),
(110, 'updated 3 in the subject list', 1, '2022-02-11 17:44:02'),
(111, 'updated 3 in the subject list', 1, '2022-02-11 17:44:38'),
(112, 'updated 2 in the subject list', 1, '2022-02-11 17:44:46'),
(113, 'logged in', 1, '2022-02-18 14:30:19'),
(114, 'updated 14 in the student list', 1, '2022-02-18 14:35:40'),
(115, 'updated 2 in the curriculum list', 0, '2022-02-18 14:36:41'),
(116, 'updated 3 in the curriculum list', 0, '2022-02-18 14:36:58'),
(117, 'updated 3 in the curriculum list', 0, '2022-02-18 14:37:10'),
(118, 'updated 3 in the subject list', 1, '2022-02-18 14:37:41'),
(119, 'updated 2 in the subject list', 1, '2022-02-18 14:38:06'),
(120, 'added 2021-2022 in the school year list', 1, '2022-02-18 15:09:50'),
(121, 'updated 2021-2022 as the current school year ', 1, '2022-02-18 15:10:01'),
(122, 'updated 1 in the grades list', 1, '2022-02-18 15:12:00'),
(123, 'updated 2 in the grades list', 1, '2022-02-18 15:12:06'),
(124, 'updated 3 in the grades list', 1, '2022-02-18 15:12:14'),
(125, 'updated 4 in the grades list', 1, '2022-02-18 15:12:20'),
(126, 'updated 3 in the subject list', 1, '2022-02-18 15:38:05'),
(127, 'updated 3 in the subject list', 1, '2022-02-18 15:38:19'),
(128, 'updated 3 in the subject list', 1, '2022-02-18 15:57:17'),
(129, 'updated 2 in the subject list', 1, '2022-02-18 15:58:24'),
(130, 'updated 3 in the subject list', 1, '2022-02-18 15:58:36'),
(131, 'updated 3 in the subject list', 1, '2022-02-18 15:58:43'),
(132, 'updated 1 in the subject list', 1, '2022-02-18 15:58:51'),
(133, 'updated 2 in the subject list', 1, '2022-02-18 15:59:01'),
(134, 'updated 1 in the subject list', 1, '2022-02-18 16:01:59'),
(135, 'updated 3 in the subject list', 1, '2022-02-18 16:30:20'),
(136, 'updated 3 in the subject list', 1, '2022-02-18 16:35:20'),
(137, 'updated 3 in the subject list', 1, '2022-02-18 16:36:41'),
(138, 'logged in', 1, '2022-02-19 10:26:08'),
(139, 'logged in', 1, '2022-02-19 11:20:35'),
(140, 'logged in', 1, '2022-02-19 11:21:59'),
(141, 'logged in', 1, '2022-02-19 11:25:31'),
(142, 'updated 2 in the grades list', 1, '2022-02-19 11:58:15'),
(143, 'updated 1 in the grades list', 1, '2022-02-19 11:58:27'),
(144, 'updated 1 in the grades list', 1, '2022-02-19 12:00:14'),
(145, 'updated 2 in the grades list', 1, '2022-02-19 12:00:22'),
(146, 'updated 3 in the grades list', 1, '2022-02-19 12:00:28'),
(147, 'updated 4 in the grades list', 1, '2022-02-19 12:00:36'),
(148, 'added fee configuraion', 1, '2022-02-19 13:34:29'),
(149, 'updated 1 in the fee list', 1, '2022-02-19 13:40:07'),
(150, 'updated 1 in the fee list', 1, '2022-02-19 13:40:32'),
(151, 'updated 1 in the fee list', 1, '2022-02-19 13:40:41'),
(152, 'added fee configuraion', 1, '2022-02-19 13:41:27'),
(153, 'updated 2 in the fee list', 1, '2022-02-19 13:46:20'),
(154, 'updated 1 in the fee list', 1, '2022-02-19 14:10:52'),
(155, 'updated 2 in the fee list', 1, '2022-02-19 14:12:51'),
(156, 'updated 1 in the fee list', 1, '2022-02-19 14:28:26'),
(157, 'updated 2 in the fee list', 1, '2022-02-19 14:28:38'),
(158, 'added fee configuraion', 1, '2022-02-19 14:34:53'),
(159, 'added fee configuraion', 1, '2022-02-19 14:35:35'),
(160, 'added fee configuraion', 1, '2022-02-19 14:38:31'),
(161, 'added fee configuraion', 1, '2022-02-19 14:39:24'),
(162, 'added fee configuraion', 1, '2022-02-19 14:41:50'),
(163, 'added fee configuraion', 1, '2022-02-19 14:43:19'),
(164, 'added fee configuraion', 1, '2022-02-19 14:46:14'),
(165, 'added fee configuraion', 1, '2022-02-19 15:28:04'),
(166, 'updated 2 in the subject list', 1, '2022-02-19 15:33:01'),
(167, 'logged in', 1, '2022-02-21 11:14:57'),
(168, 'added semister unit configuraion', 1, '2022-02-21 11:48:40'),
(169, 'added semister unit configuraion', 1, '2022-02-21 11:49:16'),
(170, 'added semister unit configuraion', 1, '2022-02-21 11:52:38'),
(171, 'added semister unit configuraion', 1, '2022-02-21 11:53:15'),
(172, 'added semister unit configuraion', 1, '2022-02-21 11:53:53'),
(173, 'added semister unit configuraion', 1, '2022-02-21 11:54:12'),
(174, 'added semister unit configuraion', 1, '2022-02-21 11:54:19'),
(175, 'added semister unit configuraion', 1, '2022-02-21 11:54:41'),
(176, 'updated 5 in the semester unit list', 1, '2022-02-21 11:55:25'),
(177, 'updated 5 in the semester unit list', 1, '2022-02-21 11:58:53'),
(178, 'updated 5 in the semester unit list', 1, '2022-02-21 12:00:39'),
(179, 'logged out', 1, '2022-02-21 12:02:58'),
(180, 'logged in', 16, '2022-02-21 12:03:21'),
(181, 'logged out', 16, '2022-02-21 16:04:18'),
(182, 'logged in', 16, '2022-02-21 16:04:30'),
(183, 'registered unit for student 16', 16, '2022-02-21 16:04:42'),
(184, 'registered unit for student ', 16, '2022-02-21 16:44:36'),
(185, 'updated 2 in the semester unit list', 16, '2022-02-21 16:45:09'),
(186, 'updated 2 in the semester unit list', 16, '2022-02-21 16:45:51'),
(187, 'updated 2 in the semester unit list', 16, '2022-02-21 16:46:03'),
(188, 'registered unit for student ', 16, '2022-02-21 16:48:33'),
(189, 'registered unit for student ', 16, '2022-02-21 16:48:40'),
(190, 'updated 3 in the semester unit list', 16, '2022-02-21 16:49:17'),
(191, 'updated 3 in the semester unit list', 16, '2022-02-21 16:49:28'),
(192, 'updated 3 in the semester unit list', 16, '2022-02-21 16:50:23'),
(193, 'updated 4 in the semester unit list', 16, '2022-02-21 16:51:09'),
(194, 'logged out', 16, '2022-02-21 16:55:10'),
(195, 'logged in', 1, '2022-02-21 16:55:25'),
(196, 'logged out', 1, '2022-02-21 16:56:57'),
(197, 'logged in', 16, '2022-02-21 16:57:05'),
(198, 'logged out', 16, '2022-02-21 16:57:31'),
(199, 'logged in', 19, '2022-02-21 16:57:52'),
(200, 'updated 2 in the semester unit list', 19, '2022-02-21 16:58:13'),
(201, 'updated 3 in the semester unit list', 19, '2022-02-21 16:58:31'),
(202, 'logged out', 19, '2022-02-21 16:59:02'),
(203, 'logged in', 16, '2022-02-21 16:59:18'),
(204, 'logged in', 16, '2022-02-22 08:29:00'),
(205, 'logged in', 1, '2022-02-22 08:50:12'),
(206, 'added student one as new student', 1, '2022-02-22 08:53:21'),
(207, 'added   as new student', 1, '2022-02-22 08:53:21'),
(208, 'logged out', 1, '2022-02-22 08:53:54'),
(209, 'logged in', 22, '2022-02-22 08:54:08'),
(210, 'logged out', 22, '2022-02-22 09:17:42'),
(211, 'logged in', 1, '2022-02-22 09:17:49'),
(212, 'added Introduction to databases in the subject list', 1, '2022-02-22 09:46:24'),
(213, 'updated 4 in the subject list', 1, '2022-02-22 09:47:02'),
(214, 'updated 4 in the subject list', 1, '2022-02-22 09:47:17'),
(215, 'updated 4 in the subject list', 1, '2022-02-22 09:47:32'),
(216, 'added Introduction to Kiswahili in the subject list', 1, '2022-02-22 09:50:03'),
(217, 'added Digital circuits in the subject list', 1, '2022-02-22 09:50:45'),
(218, 'logged out', 1, '2022-02-22 09:50:49'),
(219, 'registered unit for student ', 16, '2022-02-22 09:51:35'),
(220, 'logged in', 1, '2022-02-22 09:52:22'),
(221, 'printed Promoted Student List of 2017-2018', 1, '2022-02-22 09:52:40'),
(222, 'printed Promoted Student List of 2017-2018', 1, '2022-02-22 09:52:54'),
(223, 'printed Promoted Student List of 2017-2018', 1, '2022-02-22 09:53:36'),
(224, 'logged out', 1, '2022-02-22 10:01:59'),
(225, 'logged in', 22, '2022-02-22 10:02:23'),
(226, 'registered unit for student ', 22, '2022-02-22 10:02:32'),
(227, 'logged out', 22, '2022-02-22 10:03:57'),
(228, 'logged in', 1, '2022-02-22 10:04:06'),
(229, 'updated 6 in the subject list', 1, '2022-02-22 11:14:48'),
(230, 'added Introduction to pedicure in the subject list', 1, '2022-02-22 11:15:39'),
(231, 'updated 2 in the curriculum list', 0, '2022-02-22 11:17:24'),
(232, 'updated 2 in the curriculum list', 0, '2022-02-22 11:17:26'),
(233, 'updated 2 in the curriculum list', 0, '2022-02-22 11:17:28'),
(234, 'added fee configuraion', 1, '2022-02-22 11:26:36'),
(235, 'updated 9 in the fee list', 1, '2022-02-22 11:27:06'),
(236, 'printed Promoted Student List of 2017-2018', 1, '2022-02-22 11:27:43'),
(237, 'printed  Student List of ', 16, '2022-02-22 11:30:26'),
(238, 'printed  Student List of ', 16, '2022-02-22 11:32:11'),
(239, 'printed  Student List of ', 16, '2022-02-22 11:32:15'),
(240, 'printed  Student List of ', 16, '2022-02-22 11:32:41'),
(241, 'printed  Student List of ', 16, '2022-02-22 12:03:51'),
(242, 'logged out', 1, '2022-02-22 12:04:13'),
(243, 'logged in', 22, '2022-02-22 12:04:27'),
(244, 'logged out', 22, '2022-02-22 12:04:42'),
(245, 'logged in', 1, '2022-02-22 12:04:51'),
(246, 'added Software engineering in the subject list', 1, '2022-02-22 12:06:00'),
(247, 'registered unit for student ', 16, '2022-02-22 12:06:10'),
(248, 'printed  Student List of ', 16, '2022-02-22 12:06:29'),
(249, 'logged out', 16, '2022-02-22 12:33:14'),
(250, 'logged in', 16, '2022-02-22 12:33:31'),
(251, 'added Networks in the subject list', 1, '2022-02-22 12:46:15'),
(252, 'registered unit for student ', 16, '2022-02-22 12:47:29'),
(253, 'logged out', 16, '2022-02-22 15:28:22'),
(254, 'logged in', 23, '2022-02-22 15:30:07'),
(255, 'recorded fee for student 14', 23, '2022-02-22 17:39:43'),
(256, 'logged in', 23, '2022-02-23 10:08:44'),
(257, 'recorded fee for student 14', 23, '2022-02-23 10:26:00'),
(258, 'logged out', 23, '2022-02-23 10:29:46'),
(259, 'logged in', 16, '2022-02-23 10:30:05'),
(260, 'logged out', 1, '2022-02-23 10:43:09'),
(261, 'logged in', 1, '2022-02-23 10:43:18'),
(262, 'logged out', 1, '2022-02-23 10:43:22'),
(263, 'logged in', 23, '2022-02-23 10:43:33'),
(264, 'recorded fee for student 14', 23, '2022-02-23 10:43:58'),
(265, 'recorded fee for student 14', 23, '2022-02-23 10:45:01'),
(266, 'registered unit for student ', 16, '2022-02-23 10:51:36'),
(267, 'registered unit for student ', 16, '2022-02-23 10:51:56'),
(268, 'registered unit for student ', 16, '2022-02-23 10:52:02'),
(269, 'logged out', 16, '2022-02-23 10:53:24'),
(270, 'logged in', 23, '2022-02-23 10:53:37'),
(271, 'logged out', 23, '2022-02-23 10:55:00'),
(272, 'logged in', 2, '2022-02-23 10:55:32'),
(273, 'logged out', 2, '2022-02-23 10:55:57'),
(274, 'logged in', 19, '2022-02-23 10:56:31'),
(275, 'logged out', 23, '2022-02-23 11:15:18'),
(276, 'logged in', 1, '2022-02-23 11:15:27'),
(277, 'logged out', 1, '2022-02-23 11:17:43'),
(278, 'logged in', 16, '2022-02-23 11:17:52'),
(279, 'logged out', 16, '2022-02-23 11:18:02'),
(280, 'logged in', 1, '2022-02-23 11:18:13'),
(281, 'logged out', 19, '2022-02-23 11:56:11'),
(282, 'logged in', 1, '2022-02-23 11:56:25'),
(283, 'logged in', 1, '2022-02-24 18:10:41'),
(284, 'logged out', 1, '2022-02-24 18:10:58'),
(285, 'logged in', 1, '2022-02-24 18:11:09'),
(286, 'added   as new student', 1, '2022-02-24 18:13:52'),
(287, 'logged out', 1, '2022-02-24 18:17:39'),
(288, 'logged in', 16, '2022-02-24 18:17:55'),
(289, 'logged out', 16, '2022-02-24 18:20:17'),
(290, 'logged in', 16, '2022-02-24 18:21:41'),
(291, 'logged out', 16, '2022-02-24 18:22:30'),
(292, 'logged in', 23, '2022-02-24 18:22:41'),
(293, 'recorded fee for student 14', 23, '2022-02-24 18:23:01'),
(294, 'logged out', 23, '2022-02-24 18:23:10'),
(295, 'logged in', 16, '2022-02-24 18:23:20'),
(296, 'logged out', 16, '2022-02-24 18:23:58'),
(297, 'logged in', 1, '2022-02-24 18:24:10'),
(298, 'updated 4 in the subject list', 1, '2022-02-24 18:24:32'),
(299, 'logged out', 1, '2022-02-24 18:24:51'),
(300, 'logged in', 16, '2022-02-24 18:25:01'),
(301, 'registered unit for student ', 16, '2022-02-24 18:26:22'),
(302, 'logged out', 16, '2022-02-24 18:27:21'),
(303, 'logged in', 19, '2022-02-24 18:27:31'),
(304, 'logged out', 19, '2022-02-24 18:27:57'),
(305, 'logged in', 1, '2022-02-24 18:28:15'),
(306, 'updated 4 in the subject list', 1, '2022-02-24 18:28:33'),
(307, 'logged out', 1, '2022-02-24 18:28:38'),
(308, 'logged in', 19, '2022-02-24 18:28:47'),
(309, 'updated 12 in the semester unit list', 19, '2022-02-24 18:29:06'),
(310, 'logged out', 19, '2022-02-24 18:29:10'),
(311, 'logged in', 16, '2022-02-24 18:29:23'),
(312, 'registered unit for student ', 16, '2022-02-24 18:29:33'),
(313, 'registered unit for student ', 16, '2022-02-24 18:29:38'),
(314, 'logged out', 16, '2022-02-24 18:30:01'),
(315, 'logged in', 23, '2022-02-24 18:30:11'),
(316, 'logged out', 23, '2022-02-24 18:30:42'),
(317, 'logged in', 19, '2022-02-24 18:30:59'),
(318, 'updated 13 in the semester unit list', 19, '2022-02-24 18:31:12'),
(319, 'logged out', 19, '2022-02-24 18:31:30'),
(320, 'logged in', 1, '2022-02-24 18:31:41'),
(321, 'added semister unit configuraion', 1, '2022-02-24 18:35:19'),
(322, 'logged in', 1, '2022-02-24 19:42:04'),
(323, 'added kevin ongulu as new student', 1, '2022-02-24 19:47:08'),
(324, 'added   as new student', 1, '2022-02-24 19:47:08'),
(325, 'added   as new student', 1, '2022-02-24 19:57:45'),
(326, 'added kevin ongulu as new student', 1, '2022-02-24 19:58:01'),
(327, 'added   as new student', 1, '2022-02-24 19:58:02'),
(328, 'added Student Four as new student', 1, '2022-02-24 20:34:26'),
(329, 'added   as new student', 1, '2022-02-24 20:34:26'),
(330, 'logged out', 1, '2022-02-24 22:18:03'),
(331, 'logged in', 16, '2022-02-24 22:18:13'),
(332, 'logged in', 23, '2022-02-24 22:22:07'),
(333, 'logged out', 23, '2022-02-24 22:29:07'),
(334, 'logged in', 1, '2022-02-24 22:29:16'),
(335, 'updated 1 in the grades list', 1, '2022-02-24 22:29:51'),
(336, 'logged out', 1, '2022-02-24 22:29:55'),
(337, 'logged in', 23, '2022-02-24 22:30:05'),
(338, 'recorded fee for student 14', 23, '2022-02-24 22:31:32'),
(339, 'registered unit for student ', 16, '2022-02-24 22:31:38'),
(340, 'logged out', 23, '2022-02-24 23:16:07'),
(341, 'logged in', 1, '2022-02-24 23:16:16'),
(342, 'logged in', 1, '2022-02-28 08:35:56'),
(343, 'added fee configuraion', 1, '2022-02-28 08:48:33'),
(344, 'logged out', 1, '2022-02-28 08:48:42'),
(345, 'logged in', 23, '2022-02-28 08:48:52'),
(346, 'logged out', 23, '2022-02-28 08:49:49'),
(347, 'logged in', 1, '2022-02-28 08:49:58'),
(348, 'added Stephen Omolo as new student', 1, '2022-02-28 08:53:01'),
(349, 'added   as new student', 1, '2022-02-28 08:53:01'),
(350, 'logged out', 1, '2022-02-28 08:53:21'),
(351, 'logged in', 23, '2022-02-28 08:53:30'),
(352, 'recorded fee for student 19', 23, '2022-02-28 08:54:32'),
(353, 'logged out', 23, '2022-02-28 08:54:51'),
(354, 'logged in', 1, '2022-02-28 08:56:55'),
(355, 'added Object oriented programming in the subject list', 1, '2022-02-28 09:05:27'),
(356, 'logged out', 1, '2022-02-28 09:05:38'),
(357, 'logged in', 29, '2022-02-28 09:05:47'),
(358, 'logged out', 29, '2022-02-28 09:06:00'),
(359, 'logged in', 30, '2022-02-28 09:06:26'),
(360, 'registered unit for student ', 30, '2022-02-28 09:06:34'),
(361, 'logged out', 30, '2022-02-28 09:06:38'),
(362, 'logged in', 29, '2022-02-28 09:06:47'),
(363, 'updated 16 in the semester unit list', 29, '2022-02-28 09:06:57'),
(364, 'logged out', 29, '2022-02-28 09:07:03'),
(365, 'logged in', 30, '2022-02-28 09:07:07'),
(366, 'logged out', 30, '2022-02-28 09:07:18'),
(367, 'logged in', 1, '2022-02-28 09:07:29'),
(368, 'logged in', 1, '2022-03-11 15:23:45'),
(369, 'logged out', 1, '2022-03-11 15:26:52'),
(370, 'logged in', 23, '2022-03-11 15:27:03'),
(371, 'added fee configuraion', 23, '2022-03-11 16:19:56'),
(372, 'recorded fee for student 15', 23, '2022-03-11 16:21:56'),
(373, 'recorded fee for student 18', 23, '2022-03-11 16:22:22'),
(374, 'recorded fee for student 19', 23, '2022-03-13 12:15:33'),
(375, 'recorded fee for student 19', 23, '2022-03-13 12:18:53'),
(376, 'recorded fee for student 19', 23, '2022-03-13 12:20:38'),
(377, 'logged out', 23, '2022-03-13 12:21:42'),
(378, 'logged in', 19, '2022-03-13 12:21:53'),
(379, 'registered unit for student ', 19, '2022-03-13 12:47:25'),
(380, 'updated 15 in the semester unit list', 19, '2022-03-13 12:50:01'),
(381, 'updated 15 in the semester unit list', 19, '2022-03-13 12:50:58'),
(382, 'updated 15 in the semester unit list', 19, '2022-03-13 13:00:33'),
(383, 'registered unit for student ', 19, '2022-03-13 13:06:21'),
(384, 'updated 17 in the semester unit list', 19, '2022-03-13 13:24:12'),
(385, 'updated 15 in the semester unit list', 19, '2022-03-13 13:25:05'),
(386, 'updated 15 in the semester unit list', 19, '2022-03-13 13:25:20'),
(387, 'updated 15 in the semester unit list', 19, '2022-03-13 13:30:38'),
(388, 'updated 17 in the semester unit list', 19, '2022-03-13 13:31:49'),
(389, 'logged out', 19, '2022-03-13 14:18:25'),
(390, 'logged in', 22, '2022-03-13 14:19:37'),
(391, 'logged out', 22, '2022-03-13 14:25:04'),
(392, 'logged in', 23, '2022-03-13 14:25:14'),
(393, 'logged out', 23, '2022-03-13 14:25:56'),
(394, 'logged in', 1, '2022-03-13 14:26:03'),
(395, 'added fee configuraion', 1, '2022-03-13 14:26:51'),
(396, 'logged out', 1, '2022-03-13 14:26:55'),
(397, 'logged in', 22, '2022-03-13 14:27:12'),
(398, 'logged out', 22, '2022-03-13 14:29:32'),
(399, 'logged in', 1, '2022-03-13 14:29:39'),
(400, 'logged out', 1, '2022-03-13 14:38:07'),
(401, 'logged in', 22, '2022-03-13 14:38:20'),
(402, 'registered unit for student ', 22, '2022-03-13 15:02:41'),
(403, 'logged out', 22, '2022-03-13 15:03:46'),
(404, 'logged in', 16, '2022-03-13 15:03:53'),
(405, 'logged out', 1, '2022-03-13 16:31:20'),
(406, 'logged in', 16, '2022-03-13 16:31:31'),
(407, 'registered unit for student ', 16, '2022-03-13 22:18:50'),
(408, 'logged in', 19, '2022-03-25 10:42:09'),
(409, 'updated 17 in the semester unit list', 19, '2022-03-25 14:44:21'),
(410, 'registered unit for student ', 19, '2022-03-25 14:45:37'),
(411, 'updated 18 in the semester unit list', 19, '2022-03-25 14:57:19'),
(412, 'updated 17 in the semester unit list', 19, '2022-03-25 14:59:43'),
(413, 'updated 19 in the semester unit list', 19, '2022-03-25 15:00:14'),
(414, 'updated 15 in the semester unit list', 19, '2022-03-25 15:47:19'),
(415, 'updated 15 in the semester unit list', 19, '2022-03-25 15:50:33'),
(416, 'updated 15 in the semester unit list', 19, '2022-03-25 17:00:19'),
(417, 'updated 15 in the semester unit list', 19, '2022-03-25 17:07:22'),
(418, 'updated 15 in the semester unit list', 19, '2022-03-25 17:08:09'),
(419, 'updated 18 in the semester unit list', 19, '2022-03-25 17:09:04'),
(420, 'updated 18 in the semester unit list', 19, '2022-03-25 17:09:18'),
(421, 'updated 18 in the semester unit list', 19, '2022-03-25 17:09:28'),
(422, 'updated 18 in the semester unit list', 19, '2022-03-25 17:09:36'),
(423, 'updated 18 in the semester unit list', 19, '2022-03-25 17:10:14'),
(424, 'updated 18 in the semester unit list', 19, '2022-03-25 17:26:52'),
(425, 'updated 18 in the semester unit list', 19, '2022-03-25 17:29:33'),
(426, 'updated 15 in the semester unit list', 19, '2022-03-25 17:46:55'),
(427, 'logged out', 19, '2022-03-25 17:48:51'),
(428, 'logged in', 16, '2022-03-25 17:49:03'),
(429, 'logged out', 16, '2022-03-25 17:50:55'),
(430, 'logged in', 1, '2022-03-25 17:51:02'),
(431, 'logged in', 1, '2022-05-04 07:56:41'),
(432, 'logged in', 1, '2022-06-11 09:58:31'),
(433, 'logged out', 1, '2022-06-11 10:03:07'),
(434, 'logged in', 16, '2022-06-11 10:03:20'),
(435, 'logged out', 16, '2022-06-11 10:18:54'),
(436, 'logged in', 16, '2022-06-11 10:19:01'),
(437, 'logged out', 16, '2022-06-11 11:29:43'),
(438, 'logged in', 19, '2022-06-11 11:30:05'),
(439, 'logged out', 19, '2022-06-11 11:31:16'),
(440, 'logged in', 1, '2022-06-11 11:31:25'),
(441, 'logged in', 1, '2022-06-16 11:39:36'),
(442, 'logged out', 1, '2022-06-16 11:42:21'),
(443, 'logged in', 19, '2022-06-16 11:42:33'),
(444, 'updated 17 in the semester unit list', 19, '2022-06-16 14:50:43'),
(445, 'updated 19 in the semester unit list', 19, '2022-06-16 14:51:02'),
(446, 'logged out', 19, '2022-06-16 15:56:20'),
(447, 'logged in', 19, '2022-06-16 15:56:32'),
(448, 'logged out', 19, '2022-06-16 15:59:23'),
(449, 'logged in', 16, '2022-06-16 15:59:37'),
(450, 'logged in', 1, '2022-06-22 16:12:22'),
(451, 'logged in', 1, '2022-06-22 17:08:50'),
(452, 'logged in', 16, '2022-06-27 09:36:31'),
(453, 'logged in', 19, '2022-06-27 16:20:35'),
(454, 'logged in', 1, '2022-06-30 09:16:24'),
(455, 'logged out', 1, '2022-06-30 09:57:49'),
(456, 'logged in', 19, '2022-06-30 09:57:59'),
(457, 'logged out', 19, '2022-06-30 10:13:11'),
(458, 'logged in', 16, '2022-06-30 10:13:18'),
(459, 'logged in', 1, '2022-07-04 20:11:42'),
(460, 'logged out', 1, '2022-07-04 20:13:26'),
(461, 'logged in', 1, '2022-07-04 20:13:56'),
(462, 'logged out', 1, '2022-07-04 20:14:45'),
(463, 'logged in', 19, '2022-07-04 20:15:20'),
(464, 'logged out', 19, '2022-07-04 20:18:21'),
(465, 'logged in', 1, '2022-07-14 20:01:39'),
(466, 'logged out', 1, '2022-07-14 20:02:06'),
(467, 'logged in', 19, '2022-07-14 20:02:17'),
(468, 'logged out', 19, '2022-07-14 20:20:52'),
(469, 'logged in', 16, '2022-07-14 20:21:00'),
(470, 'logged out', 16, '2022-07-14 20:21:12'),
(471, 'logged in', 1, '2022-07-14 20:21:27'),
(472, 'logged out', 1, '2022-07-14 20:21:54'),
(473, 'logged in', 23, '2022-07-14 20:22:05'),
(474, 'logged out', 23, '2022-07-14 20:22:15'),
(475, 'logged in', 19, '2022-07-14 20:22:26'),
(476, 'logged in', 16, '2022-07-22 11:38:35'),
(477, 'logged out', 16, '2022-07-22 15:01:39'),
(478, 'logged in', 23, '2022-07-22 15:01:49'),
(479, 'logged out', 23, '2022-07-22 15:04:39'),
(480, 'logged in', 16, '2022-07-22 15:04:46'),
(481, 'logged out', 16, '2022-07-22 15:06:20'),
(482, 'logged in', 23, '2022-07-22 15:06:32'),
(483, 'recorded fee for student 14', 23, '2022-07-22 15:45:49'),
(484, 'recorded fee for student 14', 23, '2022-07-22 16:15:56'),
(485, 'logged out', 23, '2022-07-22 16:18:47'),
(486, 'logged in', 16, '2022-07-22 16:18:57'),
(487, 'logged out', 16, '2022-07-22 17:11:42'),
(488, 'logged in', 1, '2022-07-22 17:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `student` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `study_year` int(10) NOT NULL,
  `payment_date` datetime NOT NULL,
  `school_year` int(10) NOT NULL,
  `payment_method` varchar(100) NOT NULL DEFAULT 'Bank',
  `paid_by` varchar(100) DEFAULT NULL,
  `date_of_payment` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student`, `semester`, `amount`, `study_year`, `payment_date`, `school_year`, `payment_method`, `paid_by`, `date_of_payment`) VALUES
(10, 14, 1, 12345, 1, '2022-02-24 20:31:32', 5, 'Bank', 'kevin', NULL),
(11, 19, 1, 30000, 1, '2022-02-28 06:54:31', 5, 'Bank', 'kevin', NULL),
(12, 15, 1, 30000, 1, '2022-03-11 14:21:56', 5, 'Bank', 'kevin', NULL),
(13, 18, 1, 23400, 1, '2022-03-11 14:22:22', 5, 'Mpesa', 'kevin', NULL),
(16, 19, 1, 30000, 2, '2022-03-13 10:20:38', 5, 'Bank', 'kevin', NULL),
(17, 14, 1, 30000, 2, '2022-07-22 14:45:49', 5, 'Bank', 'koros', NULL),
(18, 14, 1, 30000, 3, '2022-07-22 15:15:56', 5, 'Bank', 'koros', '2022-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `PROGRAM_ID` int(20) NOT NULL,
  `PROGRAM` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  `no_of_years` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`PROGRAM_ID`, `PROGRAM`, `DESCRIPTION`, `no_of_years`) VALUES
(2, 'Bachelor of Information Technology', 'This course will teach you details about software ', 1),
(3, 'Diploma in electrical engineering', 'You will learn about electronics, electricity', 1),
(4, 'Diploma in Education', 'Learn to be teacher', 1),
(5, 'Diploma in Beauty', 'Plaiting, hair dressing, manicure, pedicure', 2),
(6, 'Bachelor of Computer Science', 'Bachelor of Computer Science', 4);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_candidates`
--

CREATE TABLE `promotion_candidates` (
  `id` int(10) NOT NULL,
  `STUDENT_ID` int(10) NOT NULL,
  `SY` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion_candidates`
--

INSERT INTO `promotion_candidates` (`id`, `STUDENT_ID`, `SY`) VALUES
(1, 1, '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `registered_units`
--

CREATE TABLE `registered_units` (
  `id` int(10) NOT NULL,
  `student` int(10) NOT NULL,
  `unit` int(10) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp(),
  `marks` int(3) DEFAULT NULL,
  `date_updated` datetime NOT NULL,
  `school_year` int(10) NOT NULL DEFAULT 1,
  `semester` int(10) NOT NULL DEFAULT 1,
  `study_year` int(10) NOT NULL DEFAULT 1,
  `cat_marks` int(3) DEFAULT NULL,
  `main_exam_marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_units`
--

INSERT INTO `registered_units` (`id`, `student`, `unit`, `date_registered`, `marks`, `date_updated`, `school_year`, `semester`, `study_year`, `cat_marks`, `main_exam_marks`) VALUES
(15, 14, 4, '2022-02-24 22:31:38', 40, '2022-03-25 15:46:55', 4, 1, 1, 13, 27),
(16, 19, 10, '2022-02-28 09:06:34', NULL, '2022-02-28 07:06:57', 5, 1, 1, NULL, NULL),
(17, 14, 5, '2022-03-13 12:47:25', 58, '2022-06-16 13:50:43', 5, 1, 1, NULL, NULL),
(18, 14, 8, '2022-03-13 13:06:21', NULL, '2022-03-25 15:29:33', 5, 1, 1, NULL, NULL),
(19, 15, 5, '2022-03-13 15:02:41', 68, '2022-06-16 13:51:02', 5, 1, 1, NULL, NULL),
(20, 14, 9, '2022-03-13 22:18:50', NULL, '0000-00-00 00:00:00', 5, 2, 1, NULL, NULL),
(21, 18, 5, '2022-03-25 14:45:36', NULL, '0000-00-00 00:00:00', 5, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `SY_ID` int(10) NOT NULL,
  `school_year` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`SY_ID`, `school_year`, `status`) VALUES
(1, '2016-2017', 'No'),
(2, '2017-2018', 'No'),
(3, '2018-2019', 'No'),
(4, '2019-2020', 'No'),
(5, '2021-2022', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `semester_units`
--

CREATE TABLE `semester_units` (
  `id` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `unit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester_units`
--

INSERT INTO `semester_units` (`id`, `semester`, `unit`) VALUES
(9, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `STUDENT_ID` int(50) NOT NULL,
  `REGISTRATION_NUMBER` varchar(12) NOT NULL,
  `PROGRAM` int(20) NOT NULL,
  `PG_NAME` varchar(100) NOT NULL,
  `PG_ADDRESS` varchar(255) NOT NULL,
  `PG_PHONE` varchar(15) NOT NULL,
  `HS_NAME` varchar(100) NOT NULL,
  `HS_GRADE` varchar(2) NOT NULL,
  `HS_YEAR_COMPLETED` year(4) NOT NULL,
  `USER` int(10) NOT NULL,
  `study_year` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`STUDENT_ID`, `REGISTRATION_NUMBER`, `PROGRAM`, `PG_NAME`, `PG_ADDRESS`, `PG_PHONE`, `HS_NAME`, `HS_GRADE`, `HS_YEAR_COMPLETED`, `USER`, `study_year`) VALUES
(14, '1234569', 2, 'Elec SHi', 'P.O Box 12678 – 00100 Nairobi', '', 'REC', 'B-', 2013, 16, 1),
(15, '12345', 4, 'parent for student one', 'po box 23', '0712345', 'Shamakhokho', 'A', 0000, 22, 1),
(18, 'CS/00/345', 2, 'Elec SHi', 'Nairobi', '0741311071', 'REC', 'A', 0000, 28, 1),
(19, 'CS/903/2022', 6, 'Jackton Ojwang', 'jacktonojwang@gmail.com', '25471389070', 'Maranda High', 'A-', 0000, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `STUDENT_ID` int(50) NOT NULL,
  `LRN_NO` varchar(15) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `MIDDLENAME` varchar(30) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `DATE_OF_BIRTH` date NOT NULL,
  `ADDRESS` varchar(20) NOT NULL,
  `BIRTH_PLACE` varchar(50) NOT NULL,
  `PARENT_GUARDIAN` varchar(50) NOT NULL,
  `P_ADDRESS` varchar(60) NOT NULL,
  `INT_COURSE_COMP` varchar(50) NOT NULL,
  `SCHOOL_YEAR` varchar(10) NOT NULL,
  `GEN_AVE` varchar(6) NOT NULL,
  `TOTAL_NO_OF_YEARS` varchar(5) NOT NULL,
  `PROGRAM` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`STUDENT_ID`, `LRN_NO`, `LASTNAME`, `FIRSTNAME`, `MIDDLENAME`, `GENDER`, `DATE_OF_BIRTH`, `ADDRESS`, `BIRTH_PLACE`, `PARENT_GUARDIAN`, `P_ADDRESS`, `INT_COURSE_COMP`, `SCHOOL_YEAR`, `GEN_AVE`, `TOTAL_NO_OF_YEARS`, `PROGRAM`) VALUES
(1, '12345648', 'Smith', 'John', 'C', 'MALE', '1999-06-23', 'Sample', 'My Town', 'My guardian', 'Sample', 'Sample', '2015-2016', '95', '6', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student_int_info`
--

CREATE TABLE `student_int_info` (
  `ID` int(30) NOT NULL,
  `STUDENT_ID` varchar(30) NOT NULL,
  `INT_COURSE_COMP` varchar(50) NOT NULL,
  `SCHOOL_YEAR_START` year(4) NOT NULL,
  `SCHOOL_YEAR_ENDS` year(4) NOT NULL,
  `GEN_AVE` int(5) NOT NULL,
  `TOTAL_NO_YEARS` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_study_year`
--

CREATE TABLE `student_study_year` (
  `id` int(10) NOT NULL,
  `study_year` int(1) NOT NULL,
  `is_active` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_study_year`
--

INSERT INTO `student_study_year` (`id`, `study_year`, `is_active`) VALUES
(1, 1, 'Yes'),
(2, 2, 'No'),
(3, 3, 'No'),
(4, 4, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `student_year_info`
--

CREATE TABLE `student_year_info` (
  `SYI_ID` int(11) NOT NULL,
  `STUDENT_ID` int(30) NOT NULL,
  `SCHOOL` varchar(100) NOT NULL,
  `YEAR` varchar(15) NOT NULL,
  `SECTION` varchar(10) NOT NULL,
  `TOTAL_NO_OF_YEAR` int(5) NOT NULL,
  `SCHOOL_YEAR` varchar(10) NOT NULL,
  `ADVANCE_UNIT` varchar(10) NOT NULL,
  `LACK_UNIT` varchar(10) NOT NULL,
  `ADVISER` varchar(40) NOT NULL,
  `GEN_AVE` varchar(10) NOT NULL,
  `RANK` varchar(10) NOT NULL,
  `TO_BE_CLASSIFIED` varchar(10) NOT NULL,
  `TDAYS_OF_CLASSES` int(5) NOT NULL,
  `TDAYS_PRESENT` int(5) NOT NULL,
  `ACTION` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_year_info`
--

INSERT INTO `student_year_info` (`SYI_ID`, `STUDENT_ID`, `SCHOOL`, `YEAR`, `SECTION`, `TOTAL_NO_OF_YEAR`, `SCHOOL_YEAR`, `ADVANCE_UNIT`, `LACK_UNIT`, `ADVISER`, `GEN_AVE`, `RANK`, `TO_BE_CLASSIFIED`, `TDAYS_OF_CLASSES`, `TDAYS_PRESENT`, `ACTION`) VALUES
(1, 1, 'School', '1', 'A', 7, '2016-2017', '', '', '', '90', '', 'Grade 8', 120, 120, 'Promoted'),
(2, 1, 'School', '2', 'a', 8, '2017-2018', '', '', '', '88.125', '', '', 0, 0, 'Promoted');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SUBJECT_ID` int(11) NOT NULL,
  `SUBJECT` varchar(100) NOT NULL,
  `FOR` int(10) DEFAULT NULL,
  `DESCRIPTION` text NOT NULL,
  `LECTURER` int(10) NOT NULL,
  `study_year` int(10) NOT NULL DEFAULT 1,
  `grade` int(10) NOT NULL DEFAULT 1,
  `semester` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SUBJECT_ID`, `SUBJECT`, `FOR`, `DESCRIPTION`, `LECTURER`, `study_year`, `grade`, `semester`) VALUES
(4, 'Introduction to databases', 2, 'Introduction to databases        ', 19, 0, 1, NULL),
(5, 'Introduction to Kiswahili', 4, 'Kiswahili fundamentals      ', 19, 1, 1, NULL),
(6, 'Digital circuits', 3, 'Fundamentals of Digital circuits        ', 21, 2, 1, NULL),
(7, 'Introduction to pedicure', 5, 'Introduction to pedicure  ', 21, 3, 1, NULL),
(8, 'Software engineering', 2, 'System coding             ', 19, 1, 1, NULL),
(9, 'Networks', 2, 'Fundamentals of networking    ', 21, 1, 1, NULL),
(10, 'Object oriented programming', 6, '', 29, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `total_grades_subjects`
--

CREATE TABLE `total_grades_subjects` (
  `TGS_ID` int(30) NOT NULL,
  `STUDENT_ID` int(30) NOT NULL,
  `SYI_ID` int(30) NOT NULL,
  `SUBJECT` int(20) NOT NULL,
  `1ST_GRADING` varchar(10) NOT NULL,
  `2ND_GRADING` varchar(10) NOT NULL,
  `3RD_GRADING` varchar(10) NOT NULL,
  `4TH_GRADING` varchar(10) NOT NULL,
  `UNITS` varchar(10) NOT NULL,
  `FINAL_GRADES` varchar(10) NOT NULL,
  `PASSED_FAILED` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_grades_subjects`
--

INSERT INTO `total_grades_subjects` (`TGS_ID`, `STUDENT_ID`, `SYI_ID`, `SUBJECT`, `1ST_GRADING`, `2ND_GRADING`, `3RD_GRADING`, `4TH_GRADING`, `UNITS`, `FINAL_GRADES`, `PASSED_FAILED`) VALUES
(1, 1, 1, 1, '90', '90', '90', '90', '1', '90.00', 'PASSED'),
(2, 1, 1, 2, '90', '90', '90', '90', '1', '90.00', 'PASSED'),
(3, 1, 2, 1, '90', '90', '90', '90', '1', '90.00', 'PASSED'),
(4, 1, 2, 2, '85', '88', '87', '85', '1', '86.25', 'PASSED');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `MIDDLE_NAME` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(15) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `DOB` date NOT NULL DEFAULT current_timestamp(),
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL DEFAULT '0192023a7bbd73250516f069df18b500'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `LASTNAME`, `FIRSTNAME`, `MIDDLE_NAME`, `USERNAME`, `USER_TYPE`, `ADDRESS`, `GENDER`, `DOB`, `EMAIL`, `PASSWORD`) VALUES
(1, 'admin', 'admin', '', 'admin', 'ADMINISTRATOR', '', '', '2022-02-10', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500'),
(2, 'staff', 'staff', '', 'staff', 'STAFF', '', '', '2022-02-10', 'staff@gmail.com', '0192023a7bbd73250516f069df18b500'),
(16, 'ongulu', 'kevin', 'indeche', 'kevin', 'STUDENT', 'P.O BOX 43844', 'MALE', '2022-02-10', 'kevinkorobosta@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(19, 'lecturer', 'one ', 'mname', 'lecturerone', 'LECTURER', '', '', '2022-02-18', 'lecturerone@weks.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(21, 'Lecturer', 'lec', 'mname', 'lecturertwo', 'LECTURER', '', '', '2022-02-18', 'lecturertwo@weks.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(22, 'one', 'student', 'stud', 'studentone@gmail.com', 'STUDENT', 'p.O BOX 1', 'MALE', '2022-02-21', 'studentone@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(23, 'one', 'Finace', 'mname', 'financeone', 'FINANCE', '', '', '2022-02-22', 'financeone@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(28, 'Four', 'Student', '', 'studentfour@gmail.com', 'STUDENT', 'PO BOX 43', 'MALE', '2007-01-01', 'studentfour@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(29, 'Antonny', 'Wekesa', 'mname', 'anto', 'LECTURER', '', '', '2022-02-28', 'antonywekesa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(30, 'Omolo', 'Stephen', 'Otieno', 'stephenotieno@gmail.com', 'STUDENT', 'P.o box 43844-00100', 'MALE', '2007-01-01', 'stephenotieno@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisers`
--
ALTER TABLE `advisers`
  ADD PRIMARY KEY (`adviser_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ATT_ID`);

--
-- Indexes for table `data_b`
--
ALTER TABLE `data_b`
  ADD PRIMARY KEY (`db_id`);

--
-- Indexes for table `data_base`
--
ALTER TABLE `data_base`
  ADD PRIMARY KEY (`db_id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course`),
  ADD KEY `semester` (`semester`),
  ADD KEY `amount` (`amount`),
  ADD KEY `school_year` (`school_year`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `grades_per_subject`
--
ALTER TABLE `grades_per_subject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student` (`student`),
  ADD KEY `semester` (`semester`),
  ADD KEY `study_year` (`study_year`),
  ADD KEY `school_year` (`school_year`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`PROGRAM_ID`);

--
-- Indexes for table `promotion_candidates`
--
ALTER TABLE `promotion_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_units`
--
ALTER TABLE `registered_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student` (`student`),
  ADD KEY `unit` (`unit`),
  ADD KEY `school_year` (`school_year`),
  ADD KEY `semester` (`semester`),
  ADD KEY `study_year` (`study_year`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`SY_ID`);

--
-- Indexes for table `semester_units`
--
ALTER TABLE `semester_units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_2` (`unit`),
  ADD KEY `semester` (`semester`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`STUDENT_ID`),
  ADD UNIQUE KEY `REGISTRATION_NUMBER` (`REGISTRATION_NUMBER`),
  ADD KEY `PROGRAM` (`PROGRAM`),
  ADD KEY `USER` (`USER`),
  ADD KEY `study_year` (`study_year`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `student_int_info`
--
ALTER TABLE `student_int_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_study_year`
--
ALTER TABLE `student_study_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_year_info`
--
ALTER TABLE `student_year_info`
  ADD PRIMARY KEY (`SYI_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SUBJECT_ID`),
  ADD KEY `lecturer` (`LECTURER`),
  ADD KEY `subjects_ibfk_2` (`FOR`),
  ADD KEY `grade` (`grade`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `total_grades_subjects`
--
ALTER TABLE `total_grades_subjects`
  ADD PRIMARY KEY (`TGS_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisers`
--
ALTER TABLE `advisers`
  MODIFY `adviser_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ATT_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `data_b`
--
ALTER TABLE `data_b`
  MODIFY `db_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_base`
--
ALTER TABLE `data_base`
  MODIFY `db_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grades_per_subject`
--
ALTER TABLE `grades_per_subject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=489;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `PROGRAM_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotion_candidates`
--
ALTER TABLE `promotion_candidates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registered_units`
--
ALTER TABLE `registered_units`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `SY_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semester_units`
--
ALTER TABLE `semester_units`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `STUDENT_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `STUDENT_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_int_info`
--
ALTER TABLE `student_int_info`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_study_year`
--
ALTER TABLE `student_study_year`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_year_info`
--
ALTER TABLE `student_year_info`
  MODIFY `SYI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SUBJECT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `total_grades_subjects`
--
ALTER TABLE `total_grades_subjects`
  MODIFY `TGS_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_ibfk_1` FOREIGN KEY (`course`) REFERENCES `program` (`PROGRAM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fee_ibfk_2` FOREIGN KEY (`semester`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fee_ibfk_3` FOREIGN KEY (`school_year`) REFERENCES `school_year` (`SY_ID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`school_year`) REFERENCES `school_year` (`SY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`semester`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`student`) REFERENCES `students` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registered_units`
--
ALTER TABLE `registered_units`
  ADD CONSTRAINT `registered_units_ibfk_1` FOREIGN KEY (`unit`) REFERENCES `subjects` (`SUBJECT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registered_units_ibfk_2` FOREIGN KEY (`student`) REFERENCES `students` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registered_units_ibfk_3` FOREIGN KEY (`school_year`) REFERENCES `school_year` (`SY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registered_units_ibfk_4` FOREIGN KEY (`semester`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semester_units`
--
ALTER TABLE `semester_units`
  ADD CONSTRAINT `semester_units_ibfk_1` FOREIGN KEY (`semester`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semester_units_ibfk_2` FOREIGN KEY (`unit`) REFERENCES `subjects` (`SUBJECT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`PROGRAM`) REFERENCES `program` (`PROGRAM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`USER`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`study_year`) REFERENCES `student_study_year` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`LECTURER`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`FOR`) REFERENCES `program` (`PROGRAM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_ibfk_3` FOREIGN KEY (`grade`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
