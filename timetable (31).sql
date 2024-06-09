-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 03:22 PM
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
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `hall_name` varchar(100) NOT NULL,
  `hall_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `type_name`, `hall_name`, `hall_capacity`) VALUES
(1, 'theoretical', 'as', 50),
(2, 'theoretical', '202', 50),
(3, 'theoretical', '203', 50),
(4, 'theoretical', '204', 50),
(5, 'theoretical', '205', 50),
(6, 'laboratory', 'lab', 50),
(7, 'laboratory', 'lab2', 50),
(8, 'laboratory', 'lab3', 100),
(9, 'laboratory', 'lab5', 50),
(10, 'laboratory', 'qwe', 64),
(22, 'theoretical', '101', 50),
(23, 'theoretical', '102', 50),
(24, 'theoretical', '103', 50),
(25, 'theoretical', '104', 50),
(26, 'laboratory', 'IT7', 50),
(27, 'laboratory', 'IT8', 50),
(28, 'laboratory', 'lab_IT_1', 50),
(29, 'laboratory', 'lab_IT_2', 50),
(30, 'laboratory', 'lab_IT_3', 50),
(31, 'laboratory', 'lab_IT_4', 50),
(32, 'laboratory', 'lab_IT_5', 50),
(33, 'laboratory', 'halllab1', 50),
(34, 'theoretical', 'hall1', 50),
(35, 'theoretical', 'qq', 110),
(36, 'laboratory', 'ww', 123),
(37, 'theoretical', 'سس', 123),
(38, 'theoretical', 'سس', 123),
(39, 'theoretical', 'سس', 123),
(40, 'theoretical', 'سس', 123),
(41, 'theoretical', 'صثب', 123);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(20) NOT NULL,
  `major_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `major_name`) VALUES
(1, 'Computer Science'),
(2, 'Software Engineering'),
(3, 'Computer Information System');

-- --------------------------------------------------------

--
-- Table structure for table `report_teacher`
--

CREATE TABLE `report_teacher` (
  `id` int(20) NOT NULL,
  `teacher_name` int(255) NOT NULL,
  `subject_num` int(20) NOT NULL,
  `num_of_study` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `section` varchar(100) NOT NULL,
  `techer` varchar(10) DEFAULT NULL,
  `time` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `hall` varchar(100) NOT NULL,
  `student_num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `subject_id`, `subject_name`, `section`, `techer`, `time`, `day`, `hall`, `student_num`) VALUES
(190, 2211212, 'Algorithms', '1', '', '10_11', 'Sunday-Tuesday-Thursday', 'as', 50),
(191, 2211212, 'Algorithms', '2', 'mohmmed', '11_12', 'Sunday-Tuesday-Thursday', 'as', 50),
(192, 2211212, 'Algorithms', '3', '', '12_13', 'Sunday-Tuesday-thursday', 'as', 50),
(193, 2211214, 'Algorithms Lab', '1', '', '14_16', 'Sunday', 'as', 50),
(194, 2211214, 'Algorithms Lab', '2', '', '8_10', 'Tuesday', 'as', 50),
(195, 2211214, 'Algorithms Lab', '3', '', '10_12', 'Sunday', 'as', 50),
(196, 2231101, 'Computer Ethics and Communication Skills', '1', '', '11_12', 'Sunday-Tuesday-thursday', '202', 50),
(197, 2231101, 'Computer Ethics and Communication Skills', '2', '', '12_13', 'Sunday-Tuesday-thursday', '202', 50),
(198, 2231101, 'Computer Ethics and Communication Skills', '3', '', '13_14', 'Sunday-Tuesday-thursday', 'as', 50),
(199, 2231101, 'Computer Ethics and Communication Skills', '4', '', '14_15', 'Sunday-Tuesday-thursday', 'as', 50),
(200, 2231101, 'Computer Ethics and Communication Skills', '5', '', '8_9', 'Sunday-Tuesday-thursday', 'as', 100),
(202, 2211351, 'Computer Networks', '1', '', '12_13', 'Sunday-Tuesday-thursday', '203', 50),
(203, 2211351, 'Computer Networks', '2', '', '13_14', 'Sunday-Tuesday-thursday', '202', 20),
(204, 2211211, 'Data structures', '1', '', '11_12', 'Sunday-Tuesday-thursday', '203', 50),
(205, 2211211, 'Data structures', '2', '', '12_13', 'Sunday-Tuesday-thursday', '204', 70),
(207, 2211263, 'Database Programming', '1', '', '11_12', 'Sunday-Tuesday-thursday', '204', 50),
(208, 2211263, 'Database Programming', '2', '', '12_13', 'Sunday-Tuesday-thursday', '205', 50),
(209, 2211263, 'Database Programming', '3', '', '13_14', 'Sunday-Tuesday-thursday', '204', 50),
(210, 2211263, 'Database Programming', '4', '', '14_15', 'Sunday-Tuesday-thursday', '202', 50),
(211, 2211263, 'Database Programming', '5', '', '8_9', 'Sunday-Tuesday-thursday', '202', 50),
(212, 2211263, 'Database Programming', '6', '', '9_10', 'Sunday-Tuesday-thursday', '202', 10),
(213, 2222111, 'Discontinuous computing structures', '1', '', '12_13', 'Sunday-Tuesday-thursday', '101', 50),
(214, 2222111, 'Discontinuous computing structures', '2', '', '13_14', 'Sunday-Tuesday-thursday', '205', 50),
(215, 2222111, 'Discontinuous computing structures', '3', '', '14_15', 'Sunday-Tuesday-thursday', '203', 50),
(216, 2222111, 'Discontinuous computing structures', '4', '', '8_9', 'Sunday-Tuesday-thursday', '203', 50),
(217, 2222111, 'Discontinuous computing structures', '5', '', '9_10', 'Sunday-Tuesday-thursday', '203', 50),
(218, 2222111, 'Discontinuous computing structures', '6', '', '10_11', 'Sunday-Tuesday-thursday', '202', 50),
(219, 2231261, 'Fundamentals of Software Engineering', '1', '', '13_14', 'Sunday-Tuesday-thursday', '101', 50),
(220, 2231261, 'Fundamentals of Software Engineering', '2', '', '14_15', 'Sunday-Tuesday-thursday', '204', 50),
(221, 2221223, 'Internet Application Programming', '1', '', '12_13', 'Sunday-Tuesday-thursday', '102', 50),
(222, 2221223, 'Internet Application Programming', '2', '', '13_14', 'Sunday-Tuesday-thursday', '102', 50),
(223, 2221223, 'Internet Application Programming', '3', '', '14_15', 'Sunday-Tuesday-thursday', '205', 50),
(224, 2211261, 'Introduction to Databases', '1', '', '10_11', 'Sunday-Tuesday-thursday', '203', 50),
(225, 2211261, 'Introduction to Databases', '2', '', '11_12', 'Sunday-Tuesday-thursday', '205', 50),
(226, 2211261, 'Introduction to Databases', '3', '', '12_13', 'Sunday-Tuesday-thursday', '103', 20),
(227, 2211262, 'Introduction to Databases lab', '1', '', '14_16', 'Sunday', 'lab', 50),
(228, 2211262, 'Introduction to Databases lab', '2', '', '9_11', 'Tuesday', 'lab', 50),
(229, 2211262, 'Introduction to Databases lab', '3', '', '10_12', 'Sunday', 'lab', 20),
(230, 2211121, 'Introduction to Programming', '1', '', '10_11', 'Sunday-Tuesday-thursday', '204', 50),
(231, 2211121, 'Introduction to Programming', '2', 'shama', '11_12', 'Sunday-Tuesday-thursday', '101', 50),
(232, 2211121, 'Introduction to Programming', '3', 'shama', '12_13', 'Sunday-Tuesday-thursday', '104', 50),
(233, 2211121, 'Introduction to Programming', '4', 'shama', '13_14', 'Sunday-Tuesday-thursday', '103', 100),
(235, 2211121, 'Introduction to Programming', '6', '', '8_9', 'Sunday-Tuesday-thursday', '204', 50),
(236, 2211122, 'Introduction to Programming lab', '1', '', '14_16', 'Sunday', 'lab2', 50),
(237, 2211122, 'Introduction to Programming lab', '2', '', '14-16', 'Tuesday', 'lab', 50),
(238, 2211122, 'Introduction to Programming lab', '3', '', '10_12', 'Sunday', 'lab2', 50),
(239, 2211122, 'Introduction to Programming lab', '4', '', '10_12', 'Tuesday', 'lab', 50),
(240, 2211122, 'Introduction to Programming lab', '5', '', '11_13', 'Sunday', 'lab', 50),
(241, 2211122, 'Introduction to Programming lab', '6', '', '12_14', 'Tuesday', 'lab', 50),
(242, 2211123, 'Object-oriented programming ', '1', '', '10_11', 'Sunday-Tuesday-thursday', '205', 50),
(243, 2211123, 'Object-oriented programming ', '2', '', '11_12', 'Sunday-Tuesday-thursday', '102', 50),
(244, 2211123, 'Object-oriented programming ', '3', '', '12_13', 'Sunday-Tuesday-thursday', 'hall1', 50),
(245, 2211124, 'Object-oriented programming lab', '1', '', '8_10', 'Sunday', 'lab', 50),
(246, 2211124, 'Object-oriented programming lab', '2', '', '14_16', 'Sunday', 'lab3', 50),
(247, 2211124, 'Object-oriented programming lab', '3', '', '10_12', 'Tuesday', 'lab2', 50),
(248, 2211431, 'Operating Systems', '1', '', '8_9:30', 'Monday-Wednesday', 'as', 50),
(249, 2211431, 'Operating Systems', '2', '', '9:30_11', 'Monday-Wednesday', 'as', 50),
(250, 2221321, 'Visual Programming', '1', '', '9:30-11', 'Monday-Wednesday', 'as', 50),
(251, 2221321, 'Visual Programming', '2', '', '11_12:30', 'Monday-Wednesday', 'as', 70);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(20) NOT NULL,
  `hall_id` int(20) NOT NULL,
  `students_id` int(20) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `year` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_num` int(11) NOT NULL,
  `subject_type` varchar(100) DEFAULT NULL,
  `num_of_study` int(11) NOT NULL,
  `pre_subsnum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `subject_name`, `subject_num`, `subject_type`, `num_of_study`, `pre_subsnum`) VALUES
(142, 'ethics', 2231101, 'theoretical', 300, NULL),
(143, 'c++', 2211121, 'theoretical', 300, NULL),
(144, 'lab c++', 2211122, 'laboratory', 300, NULL),
(145, 'descret', 2222111, 'theoretical', 300, NULL),
(146, 'IT', 2221111, 'theoretical', 300, NULL),
(147, 'OOP', 2211123, 'theoretical', 150, NULL),
(148, 'Lab OOP', 2211124, 'laboratory', 150, NULL),
(149, 'DB', 2211261, 'theoretical', 120, NULL),
(150, 'lab DB', 2211262, 'laboratory', 120, NULL),
(151, 'DS', 2211211, 'theoretical', 120, NULL),
(152, 'introduction to SE', 2231261, 'theoretical', 100, NULL),
(153, 'algorithm', 2211212, 'theoretical', 150, NULL),
(154, 'lab algorithm', 2211214, 'laboratory', 150, NULL),
(155, 'oracl', 2211263, 'theoretical', 260, NULL),
(156, 'vb', 2211351, 'theoretical', 70, NULL),
(157, 'os', 2211431, 'theoretical', 100, NULL),
(158, 'networks', 2221321, 'theoretical', 120, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(20) NOT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(20) NOT NULL,
  `year` int(20) NOT NULL,
  `semester` int(20) NOT NULL,
  `major_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `pre_sub_num` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `year`, `semester`, `major_id`, `subject_id`, `pre_sub_num`, `name`, `type_name`, `Capacity`) VALUES
(9, 1, 1, 1, 2211121, 2211121, 'Introduction to Programming', 'theoretical', 50),
(10, 1, 1, 1, 2211122, 2211122, 'Introduction to Programming lab', 'laboratory', 50),
(11, 1, 1, 1, 2211123, 2211123, 'Object-oriented programming', 'theoretical', 50),
(12, 1, 1, 1, 2211124, 2211124, 'Object-oriented programming lab', 'laboratory', 50),
(19, 1, 1, 1, 2231101, 2211121, 'Computer Ethics and Communication Skills', 'theoretical', 50),
(20, 1, 1, 1, 2222111, 2211121, 'Discontinuous computing structures\r\n', 'theoretical', 50),
(21, 1, 1, 1, 2202111, 2211121, 'Introduction to Information Technology', 'theoretical', 60),
(22, 1, 1, 1, 2211261, 2211123, 'Introduction to Databases', 'theoretical', 50),
(23, 2, 1, 1, 2211262, 2211261, 'Introduction to Databases Lab', 'laboratory', 50),
(24, 2, 1, 1, 2211211, 2211123, 'Data structures\r\n', 'theoretical', 50),
(25, 2, 1, 1, 2211263, 2211261, 'Database Programming', 'theoretical', 50),
(26, 2, 1, 1, 2221223, 2211261, 'Internet Application Programming', 'theoretical', 50),
(27, 2, 1, 1, 2211212, 2211211, 'Algorithms', 'theoretical', 50),
(28, 2, 1, 1, 2231261, 2211261, 'Fundamentals of Software Engineering', 'theoretical', 50),
(29, 2, 1, 1, 2211214, 2211212, 'Algorithms Lab', 'laboratory', 50),
(30, 3, 1, 1, 2211351, 2211263, 'Computer Networks', 'theoretical', 50),
(31, 3, 1, 1, 2211431, 2211212, 'Operating Systems', 'theoretical', 50),
(32, 3, 1, 1, 2211361, 2211212, 'Computer Graphics', 'theoretical', 50),
(33, 3, 1, 1, 2221321, 2221223, 'Visual Programming', 'theoretical', 50),
(34, 3, 2, 1, 2211311, 2211212, 'Computer theory', 'theoretical', 50),
(35, 3, 2, 1, 2211351, 2211351, 'Computer and Network Security ', 'theoretical', 50),
(36, 3, 2, 1, 2212353, 2211351, 'Computer and Network Security Lab', 'laboratory', 50),
(37, 3, 2, 1, 2212271, 2211212, 'Cryptography', 'theoretical', 50),
(38, 3, 3, 1, 2211381, 2211381, 'Field Training', 'theoretical', 50),
(39, 4, 1, 1, 2211362, 2211361, 'Digital Image Processing', 'theoretical', 50),
(40, 4, 1, 1, 2222261, 2211431, 'Introduction to Artificial Intelligence', 'theoretical', 50),
(41, 4, 1, 1, 2222362, 2222261, 'Lab Introduction to Artificial Intelligence', 'laboratory', 50),
(42, 4, 1, 1, 2211491, 2211491, 'Graduation Project (1)', 'theoretical', 50),
(43, 4, 2, 1, 2211451, 2211351, 'Wireless Computer Networks', 'theoretical', 50),
(44, 4, 2, 1, 2221462, 2222261, 'Distributed and parallel systems', 'theoretical', 50),
(45, 4, 2, 1, 2211492, 2211491, 'Graduation Project (2)', 'theoretical', 50),
(46, 1, 1, 3, 2231101, 2211121, 'Computer Ethics and Communication Skills', 'theoretical', 50),
(47, 1, 1, 3, 2211121, 2211121, 'Introduction to Programming', 'theoretical', 50),
(48, 1, 1, 3, 2211122, 2211121, ' Introduction to Programming lab', 'laboratory', 50),
(49, 1, 1, 3, 2222111, 2211121, 'Discontinuous computing structures', 'theoretical', 50),
(50, 1, 1, 3, 2202111, 2211121, 'Introduction to Information Technology', 'theoretical', 50),
(51, 1, 2, 3, 2211123, 2211121, 'Object-oriented programming', 'theoretical', 50),
(52, 1, 2, 3, 2211214, 2211123, ' Object-oriented programming lab', 'laboratory', 50),
(53, 1, 2, 3, 2221241, 2202111, 'Management Information Systems', 'theoretical', 50),
(54, 2, 1, 3, 2211261, 2211123, 'Introduction to Databases', 'theoretical', 50),
(55, 2, 1, 3, 2211262, 2211261, ' Introduction to Databases lab', 'laboratory', 50),
(56, 2, 1, 3, 2211211, 2211123, 'Data structures', 'theoretical', 50),
(57, 2, 2, 3, 2211212, 2211211, 'Algorithms', 'theoretical', 50),
(58, 2, 2, 3, 2211214, 2211212, ' Algorithms lab', 'laboratory', 50),
(59, 2, 2, 3, 2211263, 2211261, 'Database Programming', 'theoretical', 50),
(60, 2, 2, 3, 2221223, 2211261, 'Internet Application Programming', 'theoretical', 50),
(61, 2, 2, 3, 2231261, 2211261, 'Fundamentals of Software Engineering', 'theoretical', 50),
(62, 3, 1, 3, 2211361, 2211212, 'Computer Graphics', 'theoretical', 50),
(63, 3, 1, 3, 2211431, 2211212, 'Operating Systems', 'theoretical', 50),
(64, 3, 1, 3, 2211351, 2211263, 'Computer Networks', 'theoretical', 50),
(65, 3, 1, 3, 2221321, 2221223, 'Visual Programming', 'theoretical', 50),
(66, 3, 1, 3, 2221362, 2231261, 'Software Project Management', 'theoretical', 50),
(67, 3, 2, 3, 2221361, 2231261, 'Systems Analysis and Design', 'theoretical', 50),
(68, 3, 2, 3, 2221363, 2211263, 'Distributed Database Systems', 'theoretical', 50),
(69, 3, 2, 3, 2212271, 2211212, 'Cryptography', 'theoretical', 50),
(70, 3, 2, 3, 2221371, 2211361, 'Human-Computer Interaction', 'theoretical', 50),
(71, 3, 2, 3, 2221441, 2211263, 'Database Management Systems', 'theoretical', 50),
(72, 3, 3, 3, 2231381, 2231381, 'Field Training', 'theoretical', 50),
(73, 4, 1, 3, 2212351, 2211351, 'Computer & Network Security', 'theoretical', 50),
(74, 4, 1, 3, 2212353, 2212351, 'Networks and Information Security Lab', 'laboratory', 50),
(75, 4, 1, 3, 2222261, 2211431, 'Introduction to Artificial Intelligence', 'theoretical', 50),
(76, 4, 1, 3, 2222362, 2222261, ' Introduction to Artificial Intelligence lab', 'laboratory', 50),
(77, 4, 1, 3, 2221491, 2221491, 'Graduation Project 1', 'theoretical', 50),
(78, 4, 2, 3, 2221461, 2221441, 'Information Retrieval Systems', 'theoretical', 50),
(79, 4, 2, 3, 2221471, 2221363, 'New innovations for information systems technology', 'theoretical', 50),
(80, 4, 2, 3, 2221442, 2221361, 'data warehouse', 'theoretical', 50),
(81, 4, 2, 3, 2221492, 3331491, 'Graduation Project 2', 'theoretical', 50),
(82, 1, 1, 2, 2231101, 2211121, 'Computer Ethics and Communication Skills', 'theoretical', 50),
(83, 1, 1, 2, 2211121, 2211121, 'Introduction to Programming', 'theoretical', 50),
(84, 1, 1, 2, 2211122, 2211121, 'Introduction to Programming lab', 'laboratory', 50),
(85, 1, 1, 2, 2222111, 2211121, 'Discontinuous computing structures', 'theoretical', 50),
(86, 1, 1, 2, 2221111, 2211121, 'Introduction to Information Technology', 'theoretical', 50),
(87, 1, 2, 2, 2211123, 2211121, 'Object-oriented programming ', 'theoretical', 50),
(88, 1, 2, 2, 2211124, 2211123, 'Object-oriented programming lab', 'laboratory', 50),
(89, 2, 1, 2, 2211261, 2211123, 'Introduction to Databases', 'theoretical', 50),
(90, 2, 1, 2, 2211262, 2211261, 'Introduction to Databases lab', 'laboratory', 50),
(91, 2, 1, 2, 2211211, 2211123, 'Data structures', 'theoretical', 50),
(92, 2, 2, 2, 2231261, 2211261, 'Fundamentals of Software Engineering', 'theoretical', 50),
(93, 2, 2, 2, 2221223, 2211261, 'Internet Application Programming', 'theoretical', 50),
(94, 2, 2, 2, 2211212, 2211211, 'Algorithms', 'theoretical', 50),
(95, 2, 2, 2, 2211263, 2211261, 'Database Programming', 'theoretical', 50),
(96, 2, 2, 2, 2211214, 2211212, 'Algorithms lab', 'laboratory', 50),
(97, 3, 1, 2, 2221362, 2231261, 'Software Project Management', 'theoretical', 50),
(98, 3, 1, 2, 2211431, 2211212, 'Operating Systems', 'theoretical', 50),
(99, 3, 1, 2, 2221321, 2221223, 'Visual Programming', 'theoretical', 50),
(100, 3, 1, 2, 2211351, 2211263, 'Computer Networks', 'theoretical', 50),
(101, 3, 1, 2, 2231221, 2231261, 'Requirements Engineering', 'theoretical', 50),
(102, 3, 2, 2, 2221441, 2211263, 'Database Management Systems', 'theoretical', 50),
(103, 3, 2, 2, 2221371, 2221362, 'Human-Computer Interaction', 'theoretical', 50),
(104, 3, 2, 2, 2231222, 2231221, 'Software documentation', 'theoretical', 50),
(105, 3, 2, 2, 2231331, 2231221, 'Software structure and design', 'theoretical', 50),
(106, 3, 3, 2, 2211381, 2211381, 'Field Training', 'theoretical', 50),
(107, 4, 1, 2, 2231443, 2231331, 'Software Quality Assurance and Inspection', 'theoretical', 50),
(108, 4, 1, 2, 2231442, 2231443, 'Software Development Lab', 'laboratory', 50),
(109, 4, 1, 2, 2212351, 2211351, 'Computer and Network Security', 'theoretical', 50),
(110, 4, 1, 2, 2212353, 2212351, 'Computer and Network Security lab', 'laboratory', 50),
(111, 4, 1, 2, 2231341, 2231222, 'Software Modeling ', 'theoretical', 50),
(112, 4, 1, 2, 2231491, 2231491, 'Graduation Project (1)', 'theoretical', 50),
(113, 4, 2, 2, 2231421, 2231331, 'Software Maintenance & Development', 'theoretical', 50),
(114, 4, 2, 2, 2231361, 2231221, 'Software Engineering for Web Applications', 'theoretical', 50),
(115, 4, 2, 2, 2231492, 2231491, 'Graduation Project (2)', 'theoretical', 50),
(116, 1, 1, 3, 2211121, 2211121, 'Introduction to Programming', 'theoretical', 50);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `depar_num` int(20) NOT NULL,
  `active` varchar(20) NOT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `report_id` int(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `email`, `password`, `name`, `depar_num`, `active`, `date_from`, `date_to`, `report_id`, `type`, `degree`) VALUES
(2, 'a@g.c', '123', 'ali', 1, 'yes', '2024-05-24', '2024-05-27', 0, 'head', 'Bachelors'),
(8, 'm@g.c', '123', 'mohammed', 1, 'yes', '2024-05-24', '2026-06-17', 0, 'admin', 'Bachelors'),
(17, 's@s.com', '123456', 'shama', 1, 'yes', '2024-05-23', '2024-05-09', 0, 'Teacher', 'Master'),
(26, 'ro@g.com', '12345678', 'maha', 1, 'yes', '2024-05-05', '2024-05-09', 0, 'Teacher', 'Bachelors'),
(111, 'goodnice775@gmail.com', '1122', 'simo', 1, 'no', '2024-06-20', '2024-06-20', 0, 'Teacher', 'Bachelors'),
(112, 'goodnice775@gmail.com', '1122', 'simo', 1, 'yes', NULL, NULL, 0, 'Teacher', 'Bachelors');

-- --------------------------------------------------------

--
-- Table structure for table `tetches`
--

CREATE TABLE `tetches` (
  `id` int(11) NOT NULL,
  `techer_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `state` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tetches`
--

INSERT INTO `tetches` (`id`, `techer_id`, `subject_id`, `state`) VALUES
(11, 26, 2211123, 0),
(12, 17, 2211121, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tims`
--

CREATE TABLE `tims` (
  `id` int(11) NOT NULL,
  `course id` varchar(100) NOT NULL,
  `course name` varchar(200) NOT NULL,
  `section` int(10) NOT NULL,
  `day` varchar(200) NOT NULL,
  `hour` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tims`
--

INSERT INTO `tims` (`id`, `course id`, `course name`, `section`, `day`, `hour`) VALUES
(1, '2211121', 'Introduction to Programming', 1, 'Sunday-Tuesday-thursday', '10_11'),
(2, '2211121', 'Introduction to Programming', 2, 'Sunday-Tuesday-thursday', '11_12'),
(3, '2211121', 'Introduction to Programming', 3, 'Sunday-Tuesday-thursday', '12_13'),
(4, '2211121', 'Introduction to Programming', 4, 'Sunday-Tuesday-thursday', '13_14'),
(5, '2211121', 'Introduction to Programming', 5, 'Sunday-Tuesday-thursday', '14_15'),
(6, '2211121', 'Introduction to Programming', 6, 'Sunday-Tuesday-thursday', '8_9'),
(7, '2211121', 'Introduction to Programming', 7, 'Sunday-Tuesday-thursday', '9_10'),
(8, '2211122', 'Introduction to Programming lab', 1, 'Sunday', '14_16'),
(9, '2211122', 'Introduction to Programming lab', 2, 'Tuesday', '14-16'),
(10, '2211122', 'Introduction to Programming lab', 3, 'Sunday', '10_12'),
(11, '2211122', 'Introduction to Programming lab', 4, 'Tuesday', '10_12'),
(12, '2211122', 'Introduction to Programming lab', 5, 'Sunday', '11_13'),
(13, '2211122', 'Introduction to Programming lab', 6, 'Tuesday', '12_14'),
(14, '2211122', 'Introduction to Programming lab', 7, 'Thursday', '13-15'),
(15, '2211123', 'Object-oriented programming ', 1, 'Sunday-Tuesday-thursday', '10_11'),
(16, '2211123', 'Object-oriented programming ', 2, 'Sunday-Tuesday-thursday', '11_12'),
(17, '2211123', 'Object-oriented programming ', 3, 'Sunday-Tuesday-thursday', '12_13'),
(18, '2211123', 'Object-oriented programming ', 4, 'Sunday-Tuesday-thursday', '13_14'),
(19, '2211123', 'Object-oriented programming ', 5, 'Sunday-Tuesday-thursday', '14_15'),
(20, '2211123', 'Object-oriented programming ', 6, 'Sunday-Tuesday-thursday', '8_9'),
(21, '2211123', 'Object-oriented programming ', 7, 'Sunday-Tuesday-thursday', '9_10'),
(22, '2212251', 'Cyber Security Fundamentals', 1, 'Sunday-Tuesday-thursday', '11_12'),
(23, '2212251', 'Cyber Security Fundamentals', 2, 'Sunday-Tuesday-thursday', '12_13'),
(24, '2212251', 'Cyber Security Fundamentals', 3, 'Sunday-Tuesday-thursday', '13_14'),
(25, '2211124', 'Object-oriented programming lab', 1, 'Sunday', '8_10'),
(26, '2211124', 'Object-oriented programming lab', 2, 'Sunday', '14_16'),
(27, '2211124', 'Object-oriented programming lab', 3, 'Tuesday', '10_12'),
(28, '2211124', 'Object-oriented programming lab', 4, 'Tuesday', '11_13'),
(29, '2211124', 'Object-oriented programming lab', 5, 'Sunday', '12_14'),
(30, '2211124', 'Object-oriented programming lab', 6, 'Tuesday', '10_12'),
(31, '2211124', 'Object-oriented programming lab', 7, 'Thursday', '12_14'),
(32, '2211261', 'Introduction to Databases', 1, 'Sunday-Tuesday-thursday', '10_11'),
(33, '2211261', 'Introduction to Databases', 2, 'Sunday-Tuesday-thursday', '11_12'),
(34, '2211261', 'Introduction to Databases', 3, 'Sunday-Tuesday-thursday', '12_13'),
(35, '2211261', 'Introduction to Databases', 4, 'Sunday-Tuesday-thursday', '13_14'),
(36, '2211261', 'Introduction to Databases', 5, 'Sunday-Tuesday-thursday', '14_15'),
(37, '2211261', 'Introduction to Databases', 6, 'Sunday-Tuesday-thursday', '8_9'),
(38, '2211211', 'Data structures', 1, 'Sunday-Tuesday-thursday', '11_12'),
(39, '2211211', 'Data structures', 2, 'Sunday-Tuesday-thursday', '12_13'),
(40, '2211211', 'Data structures', 3, 'Sunday-Tuesday-thursday', '13_14'),
(41, '2211211', 'Data structures', 4, 'Sunday-Tuesday-thursday', '14_15'),
(42, '2211211', 'Data structures', 5, 'Sunday-Tuesday-thursday', '8_9'),
(43, '2211211', 'Data structures', 6, 'Sunday-Tuesday-thursday', '9_10'),
(44, '2211351', 'Computer Networks', 1, 'Sunday-Tuesday-thursday', '12_13'),
(45, '2211351', 'Computer Networks', 2, 'Sunday-Tuesday-thursday', '13_14'),
(46, '2211351', 'Computer Networks', 3, 'Monday-Wednesday', '12:3_14'),
(47, '2211351', 'Computer Networks', 4, 'Monday-Wednesday', '14_15:30'),
(48, '2211351', 'Computer Networks', 5, 'Sunday-Tuesday-thursday', '14_15'),
(49, '2211262', 'Introduction to Databases lab', 1, 'Sunday', '14_16'),
(50, '2211262', 'Introduction to Databases lab', 2, 'Tuesday', '9_11'),
(51, '2211262', 'Introduction to Databases lab', 3, 'Sunday', '10_12'),
(52, '2211262', 'Introduction to Databases lab', 4, 'Tuesday', '11_13'),
(53, '2211262', 'Introduction to Databases lab', 5, 'Sunday', '12_14'),
(54, '2211262', 'Introduction to Databases lab', 6, 'Thursday', '10_12'),
(55, '2211212', 'Algorithms', 1, 'Sunday-Tuesday-Thursday', '10_11'),
(56, '2211212', 'Algorithms', 2, 'Sunday-Tuesday-Thursday', '11_12'),
(57, '2211212', 'Algorithms', 3, 'Sunday-Tuesday-thursday', '12_13'),
(58, '2211212', 'Algorithms', 4, 'Sunday-Tuesday-thursday', '13_14'),
(59, '2211212', 'Algorithms', 5, 'Sunday-Tuesday-thursday', '14_15'),
(60, '2211212', 'Algorithms', 6, 'Sunday-Tuesday-thursday', '8_9'),
(61, '2211263', 'Database Programming', 1, 'Sunday-Tuesday-thursday', '11_12'),
(62, '2211263', 'Database Programming', 2, 'Sunday-Tuesday-thursday', '12_13'),
(63, '2211263', 'Database Programming', 3, 'Sunday-Tuesday-thursday', '13_14'),
(64, '2211263', 'Database Programming', 4, 'Sunday-Tuesday-thursday', '14_15'),
(65, '2211263', 'Database Programming', 5, 'Sunday-Tuesday-thursday', '8_9'),
(66, '2211263', 'Database Programming', 6, 'Sunday-Tuesday-thursday', '9_10'),
(67, '2212351', 'Computer and Network Security', 1, 'Sunday-Tuesday-thursday', '13_14'),
(68, '2212351', 'Computer and Network Security', 2, 'Sunday-Tuesday-thursday', '10_11'),
(69, '2212351', 'Computer and Network Security', 3, 'Monday-Wednesday', '9:30_11'),
(70, '2212351', 'Computer and Network Security', 4, 'Sunday-Tuesday-thursday', '13_14'),
(71, '2211214', 'Algorithms Lab', 1, 'Sunday', '14_16'),
(72, '2211214', 'Algorithms Lab', 2, 'Tuesday', '8_10'),
(73, '2211214', 'Algorithms Lab', 3, 'Sunday', '10_12'),
(74, '2211214', 'Algorithms Lab', 4, 'Tuesday', '10_12'),
(75, '2211214', 'Algorithms Lab', 5, 'Thursday', '12_14'),
(76, '2211214', 'Algorithms Lab', 6, 'Thursday', '11_13'),
(77, '2212353', 'Computer and Network Security LAB', 1, 'Sunday', '8_10'),
(78, '2212353', 'Computer and Network Security LAB', 3, 'Monday', '14_16'),
(79, '2212353', 'Computer and Network Security LAB', 2, 'Tuesday', '14_16'),
(80, '2212353', 'Computer and Network Security LAB', 4, 'Thursday', '8_10'),
(81, '2211431', 'Operating Systems', 1, 'Monday-Wednesday', '8_9:30'),
(82, '2211431', 'Operating Systems', 2, 'Monday-Wednesday', '9:30_11'),
(83, '2211431', 'Operating Systems', 3, 'Monday-Wednesday', '11_12:30'),
(84, '2211361', 'Computer Graphics', 1, 'Monday-Wednesday', '14_15:30'),
(85, '2211361', 'Computer Graphics', 2, 'Monday-Wednesday', '8_9:30'),
(86, '2211361', 'Computer Graphics', 3, 'Monday-Wednesday', '9:30_11'),
(87, '2212171', 'Cybercrime and Human Rights Law', 1, 'Monday-Wednesday', '9:30_11 '),
(88, '2212171', 'Cybercrime and Human Rights Law', 2, 'Monday-Wednesday', '11_12:30 '),
(89, '2212171', 'Cybercrime and Human Rights Law', 3, 'Monday-Wednesday', '12:30_14'),
(90, '2212352', 'Security Communication Protocols', 1, 'Monday-Wednesday', '11_12:30'),
(91, '2212352', 'Security Communication Protocols', 2, 'Monday-Wednesday', '12:30_14'),
(92, '2212352', 'Security Communication Protocols', 3, 'Monday-Wednesday', '14_15:30'),
(93, '2212271', 'Cryptography', 1, 'Monday-Wednesday', '12:30_14'),
(94, '2212271', 'Cryptography', 2, 'Monday-Wednesday', '14_15:30'),
(95, '2212271', 'Cryptography', 3, 'Monday-Wednesday', '9:30_11'),
(96, '2212381', 'Linux architecture security', 1, 'Monday-Wednesday', '8_9:30'),
(97, '2212381', 'Linux architecture security', 2, 'Monday-Wednesday', '9:30_11'),
(98, '2212381', 'Linux architecture security', 3, 'Monday-Wednesday', '11_12:30'),
(99, '2212451', 'Network Security Monitoring and Risk Assessment', 1, 'Monday-Wednesday', '9:30_11'),
(100, '2212451', 'Network Security Monitoring and Risk Assessment', 2, 'Monday-Wednesday', '11_12:30'),
(101, '2212451', 'Network Security Monitoring and Risk Assessment', 3, 'Monday-Wednesday', '12:30_14'),
(102, '2212471', 'Security and Criminal Information Systems', 1, 'Monday-Wednesday', '11_12:30'),
(103, '2212471', 'Security and Criminal Information Systems', 2, 'Monday-Wednesday', '12:30_14'),
(104, '2212471', 'Security and Criminal Information Systems', 3, 'Monday-Wednesday', '14_15:30'),
(105, '2212241', 'Digital Forensics Techniques', 1, 'Monday-Wednesday', '12:30_14'),
(106, '2212241', 'Digital Forensics Techniques', 2, 'Monday-Wednesday', '14_15:30'),
(107, '2212241', 'Digital Forensics Techniques', 3, 'Monday-Wednesday', '9:30_11'),
(108, '2211311', 'Computer theory', 1, 'Monday-Wednesday', '11_12:30'),
(109, '2211311', 'Computer theory', 2, 'Monday-Wednesday', '12:30_14'),
(110, '2211311', 'Computer theory', 3, 'Monday-Wednesday', '14_15:30'),
(111, '2212312', 'Programming for Security Professionals', 1, 'Monday-Wednesday', '9:30_11'),
(112, '2212312', 'Programming for Security Professionals', 2, 'Monday-Wednesday', '12:30_14'),
(113, '2212312', 'Programming for Security Professionals', 3, 'Monday-Wednesday', '14_15:30'),
(114, '2212242', 'Digital Forensics Techniques lab', 1, 'Monday', '14_16'),
(115, '2212242', 'Digital Forensics Techniques lab', 2, 'Wednesday', '8_10'),
(116, '2212242', 'Digital Forensics Techniques lab', 3, 'Thursday', '10_12'),
(117, '2212476', 'Development, design of secure systems', 1, 'Monday-Wednesday', '14_15:30'),
(118, '2212476', 'Development, design of secure systems', 2, 'Monday-Wednesday', '8_9:30'),
(119, '2212476', 'Development, design of secure systems', 3, 'Monday-Wednesday', '9:30_11'),
(120, '2211381', 'Field Training', 1, '_', '_'),
(121, '2211362', 'Digital Image Processing', 1, 'Monday-Wednesday', '11_12:30'),
(122, '2211362', 'Digital Image Processing', 2, 'Monday-Wednesday', '12:30_14'),
(123, '2211362', 'Digital Image Processing', 3, 'Monday-Wednesday', '14_15:30'),
(124, '2211451', 'Wireless Computer Networks', 1, 'Monday-Wednesday', '9:30_11'),
(125, '2211451', 'Wireless Computer Networks', 2, 'Monday-Wednesday', '11_12:30'),
(126, '2211451', 'Wireless Computer Networks', 3, 'Monday-Wednesday', '8_9:30'),
(127, '2212331', 'Ethical hacking', 1, 'Monday-Wednesday', '11_12:30'),
(128, '2212331', 'Ethical hacking', 2, 'Monday-Wednesday', '9:30_11'),
(129, '2212331', 'Ethical hacking', 3, 'Monday-Wednesday', '11_12:30'),
(130, '2212141', 'Principles of Forensic and Digital Evidence', 1, 'Monday-Wednesday', '12:30_14'),
(131, '2212141', 'Principles of Forensic and Digital Evidence', 2, 'Monday-Wednesday', '14_15:30'),
(132, '2212141', 'Principles of Forensic and Digital Evidence', 3, 'Monday-Wednesday', '8_9:30'),
(133, '2222111', 'Discontinuous computing structures', 1, 'Sunday-Tuesday-thursday', '12_13'),
(134, '2222111', 'Discontinuous computing structures', 2, 'Sunday-Tuesday-thursday', '13_14'),
(135, '2222111', 'Discontinuous computing structures', 3, 'Sunday-Tuesday-thursday', '14_15'),
(136, '2222111', 'Discontinuous computing structures', 4, 'Sunday-Tuesday-thursday', '8_9'),
(137, '2222111', 'Discontinuous computing structures', 5, 'Sunday-Tuesday-thursday', '9_10'),
(138, '2222111', 'Discontinuous computing structures', 6, 'Sunday-Tuesday-thursday', '10_11'),
(139, '2222111', 'Discontinuous computing structures', 7, 'Sunday-Tuesday-thursday', '11_12'),
(140, '2221111', 'Introduction to Information Technology', 1, 'Sunday-Tuesday-Thursday', '13_14'),
(141, '2221111', 'Introduction to Information Technology', 2, 'Sunday-Tuesday-thursday', '14_15'),
(142, '2221111', 'Introduction to Information Technology', 3, 'Sunday-Tuesday-thursday', '8_9'),
(143, '2221111', 'Introduction to Information Technology', 4, 'Sunday-Tuesday-thursday', '9_10'),
(144, '2221111', 'Introduction to Information Technology', 5, 'Sunday-Tuesday-thursday', '10_11'),
(145, '2221111', 'Introduction to Information Technology', 6, 'Sunday-Tuesday-thursday', '11_12'),
(146, '2221111', 'Introduction to Information Technology', 7, 'Sunday-Tuesday-thursday', '12_13'),
(147, '2221241', 'Management Information Systems', 1, 'Sunday-Tuesday-thursday', '11_12'),
(148, '2221241', 'Management Information Systems', 2, 'Sunday-Tuesday-thursday', '12_13'),
(149, '2221241', 'Management Information Systems', 3, 'Sunday-Tuesday-thursday', '13_14'),
(150, '2222161', 'Fundamentals of Data Science', 1, 'Sunday-Tuesday-thursday', '11_12'),
(151, '2222161', 'Fundamentals of Data Science', 2, 'Sunday-Tuesday-thursday', '12_13'),
(152, '2222161', 'Fundamentals of Data Science', 3, 'Sunday-Tuesday-thursday', '13_14'),
(153, '2222261', 'Introduction to Artificial Intelligence', 1, 'Sunday-Tuesday-thursday', '12_13'),
(154, '2222261', 'Introduction to Artificial Intelligence', 2, 'Sunday-Tuesday-thursday', '13_14'),
(155, '2222261', 'Introduction to Artificial Intelligence', 4, 'Monday-Wednesday', '11_12:30'),
(156, '2222261', 'Introduction to Artificial Intelligence', 3, 'Monday-Wednesday', '8_9:30'),
(157, '2222261', 'Introduction to Artificial Intelligence', 5, 'Sunday-Tuesday-thursday', '14_15'),
(158, '2222362', 'Introduction to Artificial Intelligence lab', 1, 'Sunday', '13_15'),
(159, '2222362', 'Introduction to Artificial Intelligence lab', 2, 'Monday ', '14_16'),
(160, '2222362', 'Introduction to Artificial Intelligence lab', 3, 'Thursday', '8_10'),
(161, '2222461', 'Data Engineering', 1, 'Sunday-Tuesday-thursday', '12_13'),
(162, '2222461', 'Data Engineering', 2, 'Sunday-Tuesday-thursday', '13_14'),
(163, '2222461', 'Data Engineering', 3, 'Sunday-Tuesday-thursday', '14_15'),
(164, '2222233', 'Explore and browse data', 1, 'Sunday-Tuesday-thursday', '13-14'),
(165, '2222233', 'Explore and browse data', 2, 'Sunday-Tuesday-thursday', '14_15'),
(166, '2222233', 'Explore and browse data', 3, 'Sunday-Tuesday-thursday', '15_16'),
(167, '2221223', 'Internet Application Programming', 1, 'Sunday-Tuesday-thursday', '12_13'),
(168, '2221223', 'Internet Application Programming', 2, 'Sunday-Tuesday-thursday', '13_14'),
(169, '2221223', 'Internet Application Programming', 3, 'Sunday-Tuesday-thursday', '14_15'),
(170, '2221223', 'Internet Application Programming', 4, 'Sunday-Tuesday-thursday', '8_9'),
(171, '2221223', 'Internet Application Programming', 5, 'Sunday-Tuesday-thursday', '9_10'),
(172, '2221223', 'Internet Application Programming', 6, 'Sunday-Tuesday-thursday', '10_11'),
(173, '2222364', 'Machine and deep field learning', 1, 'Sunday-Tuesday-thursday', '12_13'),
(174, '2222364', 'Machine and deep field learning', 2, 'Sunday-Tuesday-thursday', '14_15'),
(175, '2222364', 'Machine and deep field learning', 3, 'Sunday-Tuesday-thursday', '8_9'),
(176, '2222461', 'Data Science and Artificial Intelligence Programming', 1, 'Sunday-Tuesday-thursday', '9_10'),
(177, '2222461', 'Data Science and Artificial Intelligence Programming', 2, 'Sunday-Tuesday-thursday', '10_11'),
(178, '2222461', 'Data Science and Artificial Intelligence Programming', 3, 'Sunday-Tuesday-thursday', '14_15'),
(179, '2222242', 'Data Science and Artificial Intelligence Programming Lab', 1, 'Tuesday', '14_16'),
(180, '2222242', 'Data Science and Artificial Intelligence Programming Lab', 2, 'Sunday', '8_10'),
(181, '2222242', 'Data Science and Artificial Intelligence Programming Lab', 3, 'Thursday', '10_12'),
(182, '2221362', 'Software Project Management', 1, 'Monday-Wednesday', '11_12:30'),
(183, '2221362', 'Software Project Management', 2, 'Monday-Wednesday', '12:30-14'),
(184, '2221362', 'Software Project Management', 3, 'Monday-Wednesday', '14_15:30'),
(185, '2221321', 'Visual Programming', 1, 'Monday-Wednesday', '9:30-11'),
(186, '2221321', 'Visual Programming', 2, 'Monday-Wednesday', '11_12:30'),
(187, '2221321', 'Visual Programming', 3, 'Monday-Wednesday', '12:30_14'),
(188, '2222365', 'High-performance computing and big data', 1, 'Monday-Wednesday', '8_9:30'),
(189, '2222365', 'High-performance computing and big data', 2, 'Monday-Wednesday', '9:30_11'),
(190, '2222365', 'High-performance computing and big data', 3, 'Monday-Wednesday', '11_12:30'),
(191, '2222243', 'Natural Language Processing', 1, 'Monday-Wednesday', '9:30_11'),
(192, '2222243', 'Natural Language Processing', 2, 'Monday-Wednesday', '11_12:30'),
(193, '2222243', 'Natural Language Processing', 3, 'Monday-Wednesday', '14_15:30'),
(194, '2222232', 'Data modeling and simulation', 1, 'Monday-Wednesday', '1_12:30'),
(195, '2222232', 'Data modeling and simulation', 2, 'Monday-Wednesday', '14_15:30'),
(196, '2222232', 'Data modeling and simulation', 3, 'Monday-Wednesday', '8_9:30'),
(197, '2221441', 'Database Management Systems', 1, 'Monday-Wednesday', '14_15:30'),
(198, '2221441', 'Database Management Systems', 2, 'Monday-Wednesday', '8_9:30'),
(199, '2221441', 'Database Management Systems', 3, 'Monday-Wednesday', '11_12:30'),
(200, '2221371', 'Human-Computer Interaction', 1, 'Monday-Wednesday', '9:30_11'),
(201, '2221371', 'Human-Computer Interaction', 2, 'Monday-Wednesday', '11_12:30'),
(202, '2221371', 'Human-Computer Interaction', 3, 'Monday-Wednesday', '12:30_14'),
(203, '2221363', 'Distributed Database Systems', 1, 'Monday-Wednesday', '11_12:30'),
(204, '2221363', 'Distributed Database Systems', 2, 'Monday-Wednesday', '12:30_14'),
(205, '2221363', 'Distributed Database Systems', 3, 'Monday-Wednesday', '14_15:30'),
(206, '2221361', 'Systems Analysis and Design', 1, 'Monday-Wednesday', '8_9:30'),
(207, '2221361', 'Systems Analysis and Design', 2, 'Monday-Wednesday', '9:30_11'),
(208, '2221361', 'Systems Analysis and Design', 3, 'Monday-Wednesday', '8-9:30'),
(209, '222441', 'Data mining', 1, 'Monday-Wednesday', '12:30_14'),
(210, '222441', 'Data mining', 2, 'Monday-Wednesday', '14_15:30'),
(211, '222441', 'Data mining', 3, 'Monday-Wednesday', '11_12:30'),
(212, '2222462', 'Intelligent Mobile Robots', 1, 'Monday-Wednesday', '14_15:30'),
(213, '2222462', 'Intelligent Mobile Robots', 2, 'Monday-Wednesday', '11_12:30 '),
(214, '2222462', 'Intelligent Mobile Robots', 3, 'Monday-Wednesday', '12:30_14'),
(215, '2221461', 'Information Retrieval Systems', 1, 'Monday-Wednesday', '11_12:30'),
(216, '2221461', 'Information Retrieval Systems', 2, 'Monday-Wednesday', '12:30_14'),
(217, '2221461', 'Information Retrieval Systems', 3, 'Monday-Wednesday', '8_9:30'),
(218, '2222451', 'Neural networks', 1, 'Monday-Wednesday', '9:30_11'),
(219, '2222451', 'Neural networks', 2, 'Monday-Wednesday', '8_9:30'),
(220, '2222451', 'Neural networks', 3, 'Monday-Wednesday', '14_15:30'),
(221, '2222231', 'Highlight patterns', 1, 'Monday-Wednesday', '8_9:30'),
(222, '2222231', 'Highlight patterns', 2, 'Monday-Wednesday', '9:30_11'),
(223, '2222231', 'Highlight patterns', 3, 'Monday-Wednesday', '9:30_11'),
(224, '2231491', 'Graduation Project (1)', 1, '_', '_'),
(225, '2222492', 'Graduation Project (2)', 1, '_', '_'),
(226, '2221442', 'data warehouse', 1, 'Monday-Wednesday', '12:30_14'),
(227, '2221442', 'data warehouse', 2, 'Monday-Wednesday', '14_15:30'),
(228, '2221442', 'data warehouse', 3, 'Monday-Wednesday', '11_12:30'),
(229, '2221471', 'New innovations for information systems technology', 1, 'Monday-Wednesday', '14_15:30'),
(230, '2221471', 'New innovations for information systems technology', 2, 'Monday-Wednesday', '8_9:30'),
(231, '2221471', 'New innovations for information systems technology', 3, 'Monday-Wednesday', '14_15:30'),
(232, '2221462', 'Distributed and parallel systems', 1, 'Monday-Wednesday', '8_9:30'),
(233, '2221462', 'Distributed and parallel systems', 2, 'Monday-Wednesday', '9:30_11'),
(234, '2221462', 'Distributed and parallel systems', 3, 'Monday-Wednesday', '12:30_14'),
(235, '2231101', 'Computer Ethics and Communication Skills', 1, 'Sunday-Tuesday-thursday', '11_12'),
(236, '2231101', 'Computer Ethics and Communication Skills', 2, 'Sunday-Tuesday-thursday', '12_13'),
(237, '2231101', 'Computer Ethics and Communication Skills', 3, 'Sunday-Tuesday-thursday', '13_14'),
(238, '2231101', 'Computer Ethics and Communication Skills', 4, 'Sunday-Tuesday-thursday', '14_15'),
(239, '2231101', 'Computer Ethics and Communication Skills', 5, 'Sunday-Tuesday-thursday', '8_9'),
(240, '2231101', 'Computer Ethics and Communication Skills', 6, 'Sunday-Tuesday-thursday', '9_10'),
(241, '2231101', 'Computer Ethics and Communication Skills', 7, 'Sunday-Tuesday-thursday', '10_11'),
(242, '2231261', 'Fundamentals of Software Engineering', 1, 'Sunday-Tuesday-thursday', '13_14'),
(243, '2231261', 'Fundamentals of Software Engineering', 2, 'Sunday-Tuesday-thursday', '14_15'),
(244, '2231261', 'Fundamentals of Software Engineering', 3, 'Sunday-Tuesday-thursday', '8_9'),
(245, '2231261', 'Fundamentals of Software Engineering', 4, 'Sunday-Tuesday-thursday', '9_10'),
(246, '2231221', 'Requirements Engineering', 1, 'Monday-Wednesday', '14_15:30'),
(247, '2231221', 'Requirements Engineering', 2, 'Monday-Wednesday', '8_9:30'),
(248, '2231221', 'Requirements Engineering', 3, 'Monday-Wednesday', '9:30_11'),
(249, '2231222', 'Software documentation', 1, 'Monday-Wednesday', '11_12:30'),
(250, '2231222', 'Software documentation', 2, 'Monday-Wednesday', '12:30_14'),
(251, '2231222', 'Software documentation', 3, 'Monday-Wednesday', '14_15:30'),
(252, '2231331', 'Software structure and design', 1, 'Monday-Wednesday', '12:30_14'),
(253, '2231331', 'Software structure and design', 2, 'Monday-Wednesday', '14_15:30'),
(254, '2231331', 'Software structure and design', 3, 'Monday-Wednesday', '9:30_11'),
(255, '2231443', 'Software Quality Assurance and Inspection', 1, 'Monday-Wednesday', '9:30_11'),
(256, '2231443', 'Software Quality Assurance and Inspection', 2, 'Monday-Wednesday', '11_12:30'),
(257, '2231443', 'Software Quality Assurance and Inspection', 3, 'Monday-Wednesday', '12:30_14'),
(258, '2231341', 'Software Modeling', 1, 'Monday-Wednesday', '11_12:30'),
(259, '2231341', 'Software Modeling', 2, 'Monday-Wednesday', '12:30_14'),
(260, '2231341', 'Software Modeling', 3, 'Monday-Wednesday', '14_15:30'),
(261, '2231421', 'Software Maintenance & Development', 1, 'Monday-Wednesday', '12:30_14'),
(262, '2231421', 'Software Maintenance & Development', 2, 'Monday-Wednesday', '14_15:30'),
(263, '2231421', 'Software Maintenance & Development', 3, 'Monday-Wednesday', '11_12:30'),
(264, '2231221', 'Software Engineering for Web Applications', 1, 'Monday-Wednesday', '8_9:30'),
(265, '2231221', 'Software Engineering for Web Applications', 2, 'Monday-Wednesday', '9:30_11'),
(266, '2231221', 'Software Engineering for Web Applications', 3, 'Monday-Wednesday', '11_12:30'),
(267, '2231491', 'Graduation Project (1)', 1, '_', '_'),
(268, '2231492', 'Graduation Project (2)', 1, '_', '_');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_teacher`
--
ALTER TABLE `report_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_id` (`hall_id`,`students_id`,`teacher_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`,`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_id` (`report_id`),
  ADD KEY `depar_num` (`depar_num`);

--
-- Indexes for table `tetches`
--
ALTER TABLE `tetches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `techer_id` (`techer_id`);

--
-- Indexes for table `tims`
--
ALTER TABLE `tims`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report_teacher`
--
ALTER TABLE `report_teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tetches`
--
ALTER TABLE `tetches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tims`
--
ALTER TABLE `tims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`depar_num`) REFERENCES `major` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
