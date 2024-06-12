-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 02:09 AM
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
(1, 'theoretical', 'IT_5', 50),
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
(34, 'theoretical', 'hall1', 50);

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
(3, 'Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `optnal`
--

CREATE TABLE `optnal` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `pre` varchar(20) NOT NULL,
  `DS` int(11) NOT NULL,
  `SE` int(11) NOT NULL,
  `CS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `optnal`
--

INSERT INTO `optnal` (`id`, `name`, `subject_id`, `pre`, `DS`, `SE`, `CS`) VALUES
(1, 'Data Structures Lab', '2211212', '2211121', 1, 1, 0),
(2, 'Object-oriented programming', '2211321', '2211123', 1, 0, 0),
(3, 'Cyber Security Fundamentals', '2212251', '2212351', 1, 0, 0),
(4, 'Digital Image Processing', '2211362', '2211431', 1, 0, 0),
(5, 'Cloud computing and its applications', '2231371', '2222365', 1, 0, 0),
(7, ' Programming in Java ', '2221221', '2211123', 0, 1, 1),
(8, 'Java Programming Lab ', '2221222', '2221222', 0, 1, 0),
(10, ' Data science  ', '2221341', '2212271', 0, 0, 1),
(11, 'Human-Computer Interaction ', '2221371', '2221461', 0, 0, 1),
(12, 'Internet Application Programming', '2221223', '2211263', 0, 0, 1);

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
  `techer` varchar(100) DEFAULT NULL,
  `time` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `hall` varchar(100) NOT NULL,
  `student_num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `subject_id`, `subject_name`, `section`, `techer`, `time`, `day`, `hall`, `student_num`) VALUES
(3589, 2211121, 'Introduction to Programming', '1', 'non', '10_11', 'Sunday-Tuesday-Thursday', 'IT_5', 50),
(3590, 2211121, 'Introduction to Programming', '2', 'non', '11_12', 'Sunday-Tuesday-Thursday', 'IT_5', 50),
(3591, 2211121, 'Introduction to Programming', '3', 'non', '12_13', 'Sunday-Tuesday-Thursday', 'IT_5', 50),
(3592, 2211122, 'Introduction to Programming lab', '1', 'non', '8_10', 'Sunday', 'lab', 50),
(3593, 2211122, 'Introduction to Programming lab', '2', 'non', '12_14', 'Tuesday', 'lab', 50),
(3594, 2211122, 'Introduction to Programming lab', '3', 'non', '8_10', 'Thursday', 'lab', 50),
(3595, 2211211, 'Data structures\r\n', '1', 'non', '10_11', 'Sunday-Tuesday-Thursday', '202', 50),
(3596, 2211211, 'Data structures\r\n', '2', 'non', '11_12', 'Sunday-Tuesday-Thursday', '202', 50),
(3597, 2211211, 'Data structures\r\n', '3', 'non', '12_13', 'Sunday-Tuesday-Thursday', '202', 20),
(3598, 2211212, 'Algorithms', '1', 'non', '11_12', 'Sunday-Tuesday-Thursday', '203', 0),
(3599, 2211214, 'Algorithms Lab', '1', 'non', '8_10', 'Sunday', 'lab2', 50),
(3600, 2211214, 'Algorithms Lab', '2', 'non', '12_14', 'Tuesday', 'lab2', 50),
(3601, 2211214, 'Algorithms Lab', '3', 'non', '8_10', 'Thursday', 'lab2', 50),
(3602, 2211261, 'Introduction to Databases', '1', 'non', '12_13', 'Sunday-Tuesday-Thursday', '203', 50),
(3603, 2211261, 'Introduction to Databases', '2', 'non', '12_13', 'Sunday-Tuesday-Thursday', '204', 50),
(3604, 2211261, 'Introduction to Databases', '3', 'non', '13_14', 'Sunday-Tuesday-Thursday', 'IT_5', 20),
(3605, 2211262, 'Introduction to Databases Lab', '1', 'non', '12_14', 'Sunday', 'lab', 50),
(3606, 2211262, 'Introduction to Databases Lab', '2', 'non', '14_16', 'Tuesday', 'lab', 50),
(3607, 2211262, 'Introduction to Databases Lab', '3', 'Mrs. Asmaa Nawaiseh', '14_16', 'Thursday', 'lab', 20),
(3608, 2211263, 'Database Programming', '1', 'non', '13_14', 'Sunday-Tuesday-Thursday', '202', 50),
(3609, 2211263, 'Database Programming', '2', 'non', '13_14', 'Sunday-Tuesday-Thursday', '203', 50),
(3610, 2211263, 'Database Programming', '3', 'non', '10_11', 'Sunday-Tuesday-Thursday', '203', 50),
(3611, 2211263, 'Database Programming', '4', 'non', '10_11', 'Sunday-Tuesday-Thursday', '204', 50),
(3612, 2211263, 'Database Programming', '5', 'prof. Bassam Mahadin', '10_11', 'Sunday-Tuesday-Thursday', '205', 50),
(3613, 2211263, 'Database Programming', '6', 'non', '10_11', 'Sunday-Tuesday-Thursday', '101', 10),
(3614, 2211351, 'Computer Networks', '1', 'Dr. hayat dmour', '8_9:30', 'Monday-Wednesday', 'IT_5', 50),
(3615, 2211351, 'Computer Networks', '2', 'Dr. Rania Al-Halaseh', '9:30_11', 'Monday-Wednesday', 'IT_5', 20),
(3616, 2211361, 'Computer Graphics', '1', 'non', '9:30_11', 'Monday-Wednesday', '202', 0),
(3617, 2211431, 'Operating Systems', '1', 'non', '11_12:30', 'Monday-Wednesday', 'IT_5', 0),
(3618, 2211362, 'Digital Image Processing', '1', 'non', '8_9:30', 'Monday-Wednesday', '202', 0),
(3619, 2231101, 'Computer Ethics and Communication Skills', '1', NULL, '11_12', 'Sunday-Tuesday-Thursday', '204', 50),
(3620, 2231101, 'Computer Ethics and Communication Skills', '2', NULL, '12_13', 'Sunday-Tuesday-Thursday', '205', 50),
(3621, 2231101, 'Computer Ethics and Communication Skills', '3', NULL, '13_14', 'Sunday-Tuesday-Thursday', '204', 50),
(3622, 2231261, 'Fundamentals of Software Engineering', '1', NULL, '10_11', 'Sunday-Tuesday-Thursday', '102', 50),
(3623, 2231261, 'Fundamentals of Software Engineering', '2', NULL, '11_12', 'Sunday-Tuesday-Thursday', '205', 50),
(3624, 2231221, 'Requirements Engineering', '1', NULL, '8_9:30', 'Monday-Wednesday', '203', 0),
(3625, 2231341, 'Software Modeling ', '1', NULL, '8_9:30', 'Monday-Wednesday', '204', 0),
(3626, 2231442, 'Software Development Lab', '1', NULL, '8_10', 'Monday', 'lab', 0),
(3627, 2231443, 'Software Quality Assurance and Inspection', '1', NULL, '9:30_11', 'Monday-Wednesday', '203', 0),
(3628, 2222111, 'Discontinuous computing structures', '1', NULL, '12_13', 'Sunday-Tuesday-Thursday', '101', 50),
(3629, 2222111, 'Discontinuous computing structures', '2', NULL, '13_14', 'Sunday-Tuesday-Thursday', '205', 50),
(3630, 2222111, 'Discontinuous computing structures', '3', NULL, '10_11', 'Sunday-Tuesday-Thursday', '103', 40),
(3631, 2221321, 'Visual Programming', '1', NULL, '8_9:30', 'Monday-Wednesday', '205', 50),
(3632, 2221321, 'Visual Programming', '2', NULL, '9:30_11', 'Monday-Wednesday', '204', 50),
(3633, 2221321, 'Visual Programming', '3', NULL, '11_12:30', 'Monday-Wednesday', '202', 20),
(3634, 2221362, 'Software Project Management', '1', NULL, '9:30_11', 'Monday-Wednesday', '205', 0),
(3635, 2222261, 'Introduction to Artificial Intelligence', '1', NULL, '8_9:30', 'Monday-Wednesday', '101', 0),
(3636, 2222362, ' Introduction to Artificial Intelligence lab', '1', NULL, '8_10', 'Monday', 'lab2', 0),
(3637, 2211121, 'Introduction to Programming', '1', NULL, '10_11', 'Sunday-Tuesday-Thursday', 'IT_5', 50),
(3638, 2211121, 'Introduction to Programming', '2', NULL, '11_12', 'Sunday-Tuesday-Thursday', 'IT_5', 50),
(3639, 2211121, 'Introduction to Programming', '3', NULL, '12_13', 'Sunday-Tuesday-Thursday', 'IT_5', 50),
(3640, 2211122, 'Introduction to Programming lab', '1', NULL, '8_10', 'Sunday', 'lab', 50),
(3641, 2211122, 'Introduction to Programming lab', '2', NULL, '12_14', 'Tuesday', 'lab', 50),
(3642, 2211122, 'Introduction to Programming lab', '3', NULL, '8_10', 'Thursday', 'lab', 50),
(3643, 2211211, 'Data structures\r\n', '1', NULL, '10_11', 'Sunday-Tuesday-Thursday', '202', 50),
(3644, 2211211, 'Data structures\r\n', '2', NULL, '11_12', 'Sunday-Tuesday-Thursday', '202', 50),
(3645, 2211211, 'Data structures\r\n', '3', NULL, '12_13', 'Sunday-Tuesday-Thursday', '202', 20),
(3646, 2211212, 'Algorithms', '1', NULL, '11_12', 'Sunday-Tuesday-Thursday', '203', 0),
(3647, 2211214, 'Algorithms Lab', '1', NULL, '8_10', 'Sunday', 'lab2', 50),
(3648, 2211214, 'Algorithms Lab', '2', NULL, '12_14', 'Tuesday', 'lab2', 50),
(3649, 2211214, 'Algorithms Lab', '3', NULL, '8_10', 'Thursday', 'lab2', 50),
(3650, 2211261, 'Introduction to Databases', '1', NULL, '12_13', 'Sunday-Tuesday-Thursday', '203', 50),
(3651, 2211261, 'Introduction to Databases', '2', NULL, '12_13', 'Sunday-Tuesday-Thursday', '204', 50),
(3652, 2211261, 'Introduction to Databases', '3', NULL, '13_14', 'Sunday-Tuesday-Thursday', 'IT_5', 20),
(3653, 2211262, 'Introduction to Databases Lab', '1', NULL, '12_14', 'Sunday', 'lab', 50),
(3654, 2211262, 'Introduction to Databases Lab', '2', NULL, '14_16', 'Tuesday', 'lab', 50),
(3655, 2211262, 'Introduction to Databases Lab', '3', NULL, '14_16', 'Thursday', 'lab', 20),
(3656, 2211263, 'Database Programming', '1', NULL, '13_14', 'Sunday-Tuesday-Thursday', '202', 50),
(3657, 2211263, 'Database Programming', '2', NULL, '13_14', 'Sunday-Tuesday-Thursday', '203', 50),
(3658, 2211263, 'Database Programming', '3', NULL, '10_11', 'Sunday-Tuesday-Thursday', '203', 50),
(3659, 2211263, 'Database Programming', '4', NULL, '10_11', 'Sunday-Tuesday-Thursday', '204', 50),
(3660, 2211263, 'Database Programming', '5', NULL, '10_11', 'Sunday-Tuesday-Thursday', '205', 50),
(3661, 2211263, 'Database Programming', '6', NULL, '10_11', 'Sunday-Tuesday-Thursday', '101', 10),
(3662, 2211351, 'Computer Networks', '1', NULL, '8_9:30', 'Monday-Wednesday', 'IT_5', 50),
(3663, 2211351, 'Computer Networks', '2', NULL, '9:30_11', 'Monday-Wednesday', 'IT_5', 20),
(3664, 2211361, 'Computer Graphics', '1', NULL, '9:30_11', 'Monday-Wednesday', '202', 0),
(3665, 2211431, 'Operating Systems', '1', NULL, '11_12:30', 'Monday-Wednesday', 'IT_5', 0),
(3666, 2211362, 'Digital Image Processing', '1', NULL, '8_9:30', 'Monday-Wednesday', '202', 0),
(3667, 2231101, 'Computer Ethics and Communication Skills', '1', NULL, '11_12', 'Sunday-Tuesday-Thursday', '204', 50),
(3668, 2231101, 'Computer Ethics and Communication Skills', '2', NULL, '12_13', 'Sunday-Tuesday-Thursday', '205', 50),
(3669, 2231101, 'Computer Ethics and Communication Skills', '3', NULL, '13_14', 'Sunday-Tuesday-Thursday', '204', 50),
(3670, 2231261, 'Fundamentals of Software Engineering', '1', NULL, '10_11', 'Sunday-Tuesday-Thursday', '102', 50),
(3671, 2231261, 'Fundamentals of Software Engineering', '2', NULL, '11_12', 'Sunday-Tuesday-Thursday', '205', 50),
(3672, 2231221, 'Requirements Engineering', '1', NULL, '8_9:30', 'Monday-Wednesday', '203', 0),
(3673, 2231341, 'Software Modeling ', '1', NULL, '8_9:30', 'Monday-Wednesday', '204', 0),
(3674, 2231442, 'Software Development Lab', '1', NULL, '8_10', 'Monday', 'lab', 0),
(3675, 2231443, 'Software Quality Assurance and Inspection', '1', NULL, '9:30_11', 'Monday-Wednesday', '203', 0),
(3676, 2222111, 'Discontinuous computing structures', '1', NULL, '12_13', 'Sunday-Tuesday-Thursday', '101', 50),
(3677, 2222111, 'Discontinuous computing structures', '2', NULL, '13_14', 'Sunday-Tuesday-Thursday', '205', 50),
(3678, 2222111, 'Discontinuous computing structures', '3', NULL, '10_11', 'Sunday-Tuesday-Thursday', '103', 40),
(3679, 2221321, 'Visual Programming', '1', NULL, '8_9:30', 'Monday-Wednesday', '205', 50),
(3680, 2221321, 'Visual Programming', '2', NULL, '9:30_11', 'Monday-Wednesday', '204', 50),
(3681, 2221321, 'Visual Programming', '3', NULL, '11_12:30', 'Monday-Wednesday', '202', 20),
(3682, 2221362, 'Software Project Management', '1', NULL, '9:30_11', 'Monday-Wednesday', '205', 0),
(3683, 2222261, 'Introduction to Artificial Intelligence', '1', NULL, '8_9:30', 'Monday-Wednesday', '101', 0),
(3684, 2222362, ' Introduction to Artificial Intelligence lab', '1', NULL, '8_10', 'Monday', 'lab2', 0);

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
(222, 'ethics', 2231101, 'theoretical', 350, NULL),
(223, 'c++', 2211121, 'theoretical', 150, NULL),
(224, 'lab c++', 2211122, 'laboratory', 150, NULL),
(225, 'descret', 2222111, 'theoretical', 140, NULL),
(226, 'IT', 2221111, 'theoretical', 300, NULL),
(227, 'OOP', 2211123, 'theoretical', 150, NULL),
(228, 'Lab OOP', 2211124, 'laboratory', 150, NULL),
(229, 'logic', 405131, 'theoretical', 190, NULL),
(230, 'DB', 2211261, 'theoretical', 120, NULL),
(231, 'lab DB', 2211262, 'laboratory', 120, NULL),
(233, 'DS', 2211211, 'theoretical', 120, NULL),
(234, 'introduction to SE', 2231261, 'theoretical', 100, NULL),
(237, 'lab algorithm', 2211214, 'laboratory', 150, NULL),
(238, 'oracl', 2211263, 'theoretical', 260, NULL),
(239, 'vb', 2211351, 'theoretical', 70, NULL),
(241, 'networks', 2221321, 'theoretical', 120, NULL);

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
(9, 1, 1, 1, 2211121, 0, 'Introduction to Programming', 'theoretical', 50),
(10, 1, 1, 1, 2211122, 2211121, 'Introduction to Programming lab', 'laboratory', 50),
(11, 1, 2, 1, 2211123, 2211121, 'Object-oriented programming', 'theoretical', 50),
(12, 1, 2, 1, 2211124, 2211124, 'Object-oriented programming lab', 'laboratory', 50),
(19, 1, 1, 1, 2231101, 0, 'Computer Ethics and Communication Skills', 'theoretical', 50),
(20, 1, 1, 1, 2222111, 0, 'Discontinuous computing structures\r\n', 'theoretical', 50),
(21, 1, 1, 1, 2221111, 2211121, 'Introduction to Information Technology', 'theoretical', 50),
(22, 2, 1, 1, 2211261, 2211123, 'Introduction to Databases', 'theoretical', 50),
(23, 2, 1, 1, 2211262, 2211261, 'Introduction to Databases Lab', 'laboratory', 50),
(24, 2, 1, 1, 2211211, 2211123, 'Data structures\r\n', 'theoretical', 50),
(25, 2, 1, 1, 2211263, 2211261, 'Database Programming', 'theoretical', 50),
(26, 2, 1, 1, 2221223, 2211261, 'Internet Application Programming', 'theoretical', 50),
(27, 2, 1, 1, 2211212, 2211211, 'Algorithms', 'theoretical', 50),
(28, 2, 1, 2, 2231261, 2211261, 'Fundamentals of Software Engineering', 'theoretical', 50),
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
(46, 1, 1, 3, 2231101, 0, 'Computer Ethics and Communication Skills', 'theoretical', 50),
(47, 1, 1, 3, 2211121, 0, 'Introduction to Programming', 'theoretical', 50),
(48, 1, 1, 3, 2211122, 2211121, ' Introduction to Programming lab', 'laboratory', 50),
(49, 1, 1, 3, 2222111, 0, 'Discontinuous computing structures', 'theoretical', 50),
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
(82, 1, 1, 2, 2231101, 0, 'Computer Ethics and Communication Skills', 'theoretical', 50),
(83, 1, 1, 2, 2211121, 0, 'Introduction to Programming', 'theoretical', 50),
(84, 1, 1, 2, 2211122, 2211121, 'Introduction to Programming lab', 'laboratory', 50),
(85, 1, 1, 2, 2222111, 0, 'Discontinuous computing structures', 'theoretical', 50),
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
(116, 1, 1, 3, 2211121, 0, 'Introduction to Programming', 'theoretical', 50),
(117, 3, 1, 2, 2221362, 2231261, 'Software Project Management', 'theoretical', 50);

-- --------------------------------------------------------

--
-- Table structure for table `summer`
--

CREATE TABLE `summer` (
  `id` int(11) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `section` int(10) NOT NULL,
  `time` varchar(100) NOT NULL,
  `day` varchar(200) NOT NULL,
  `room` varchar(100) NOT NULL,
  `teacher` varchar(100) DEFAULT NULL,
  `students` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `summer`
--

INSERT INTO `summer` (`id`, `course_id`, `course_name`, `section`, `time`, `day`, `room`, `teacher`, `students`) VALUES
(488, '2231101', 'ethics', 1, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 30),
(489, '2231101', 'ethics', 2, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 30),
(490, '2231101', 'ethics', 3, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 30),
(491, '2211121', 'c++', 1, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', '202', NULL, 37),
(492, '2211121', 'c++', 2, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '202', NULL, 37),
(493, '2211121', 'c++', 3, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 37),
(494, '2211122', 'lab c++', 1, '08:00-09:30 ', 'Sunday-Tuesday', 'lab', NULL, 50),
(495, '2211122', 'lab c++', 2, '15:30-17:00 ', 'Sunday-Tuesday', 'lab', NULL, 50),
(496, '2211122', 'lab c++', 3, '08:00-09:30 ', 'Sunday-Tuesday', 'lab2', NULL, 50),
(497, '2222111', 'descret', 1, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(498, '2222111', 'descret', 2, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', '202', NULL, 50),
(499, '2222111', 'descret', 3, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', '202', NULL, 40),
(500, '2221111', 'IT', 1, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(501, '2221111', 'IT', 2, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(502, '2221111', 'IT', 3, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(503, '2221111', 'IT', 4, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '204', NULL, 50),
(504, '2221111', 'IT', 5, '08:00-09:15 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(505, '2221111', 'IT', 6, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', '204', NULL, 50),
(506, '2211123', 'OOP', 1, '09:15-10:30 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(507, '2211123', 'OOP', 2, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', '204', NULL, 50),
(508, '2211123', 'OOP', 3, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '205', NULL, 50),
(509, '2211124', 'Lab OOP', 1, '14:00-15:30 ', 'Sunday-Tuesday', 'lab', NULL, 50),
(510, '2211124', 'Lab OOP', 2, '08:00-09:30 ', 'Sunday-Tuesday', 'lab3', NULL, 50),
(511, '2211124', 'Lab OOP', 3, '09:30-11:00 ', 'Sunday-Tuesday', 'lab', NULL, 50),
(512, '2211121', 'c++', 4, '13:00-14:15', 'Sunday-Monday-Tuesday-Wednesday', 'hall1', NULL, 39),
(513, '2231101', 'ethics', 4, '13:00-14:30', 'Sunday-Monday-Tuesday-Wednesday', 'hall1', NULL, 30),
(514, '2231101', 'ethics', 5, '10:30-11:45', 'Sunday-Monday-Tuesday-Wednesday', 'hall1', NULL, 30);

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
  `permission` varchar(100) NOT NULL,
  `report_id` int(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `email`, `password`, `name`, `depar_num`, `active`, `date_from`, `date_to`, `permission`, `report_id`, `type`, `degree`) VALUES
(8, 'm@g.c', '123', 'mohammed', 1, 'yes', '2024-05-24', '2026-06-17', '', 0, 'admin', ''),
(20, 'prof1@g.c', 'prof1@g.c', 'prof. Mustafa Hammad', 2, 'yes', '0000-00-00', '0000-00-00', '', 0, 'head', ''),
(21, 'prof2@g.c', 'prof2@g.c', 'prof. Bassam Mahadin', 1, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(22, 'prof3@g.c', 'prof3@g.c', 'prof. Ahmed Hassanat', 1, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(23, 'prof4@g.c', 'prof4@g.c', 'prof.Awni Al-Hammouri', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(24, 'Dr1@g.c', 'Dr1@g.c', 'Dr. suleyman al-showarah', 2, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(25, 'Dr2@g.c', 'Dr2@g.c', 'Dr. Hamzeh eyal Salman', 2, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(26, 'Dr3@g.c', 'Dr3@g.c', 'Dr. Raafat Al-Massadin', 2, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(27, 'Dr4@g.c', 'Dr4@g.c', 'Dr. hayat dmour', 1, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(28, 'Dr5@g.c', 'Dr5@g.c', 'Dr.Afaf Al-Tarief', 1, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(29, 'Dr6@g.c', 'Dr6@g.c', 'Dr.anas alkasasba', 1, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(30, 'Dr7@g.c', 'Dr7@g.c', 'Dr.Nadim Al-Adayleh', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(31, 'Dr8@g.c', 'Dr8@g.c', 'Dr.Khaled Tarawneh', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(32, 'Dr9@g.c', 'Dr9@g.c', 'Dr. Rania Al-Halaseh', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(33, 'Dr10@g.c', 'Dr10@g.c', 'Dr. Ahmed Tarawneh', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(34, 'Dr11@g.c', 'Dr11@g.c', 'Dr.obada alhabashneh', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(35, 'Dr12@g.c', 'Dr12@g.c', 'Dr. moaath hajaya', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(36, 'Mrs1@g.c', 'Mrs1@g.c', 'Mrs. Wafaa Tarawneh ', 2, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(37, 'Mrs2@g.c', 'Mrs2@g.c', 'Mrs. Asmaa Nawaiseh', 2, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(38, 'Mrs3@g.c', 'Mrs3@g.c', 'Mrs.roba al-soub', 1, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(39, 'Mr1@g.c', 'Mr1@g.c', 'Mr.Moataz Al-Mubaideen', 1, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(40, 'Mr2@g.c', 'Mr2@g.c', 'Mr . Omar lasasmeh', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(41, 'Mr3@g.c', 'Mr3@g.c', 'Mr . Basem matalgha', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', ''),
(42, 'Mr4@g.c', 'Mr4@g.c', 'Mr.zakaria Tarawneh', 3, 'yes', '0000-00-00', '0000-00-00', '', 0, 'teacher', '');

-- --------------------------------------------------------

--
-- Table structure for table `tetches`
--

CREATE TABLE `tetches` (
  `id` int(11) NOT NULL,
  `techer_id` int(20) NOT NULL,
  `subject_id` int(20) DEFAULT NULL,
  `state` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tetches`
--

INSERT INTO `tetches` (`id`, `techer_id`, `subject_id`, `state`) VALUES
(1, 4, 2211121, 1);

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
(329, '2222111', 'Discrete structures in computing', 2, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:15'),
(330, '2222111', 'Discrete structures in computing', 1, 'Sunday-Monday-Tuesday-Wednesday', '11:45-13:00'),
(331, '2222111', 'Discrete structures in computing', 3, 'Sunday-Monday-Tuesday-Wednesday', '14:15-15:30'),
(332, '2222111', 'Discrete structures in computing', 4, 'Sunday-Monday-Tuesday-Wednesday', '10:30-11:45'),
(333, '2222111', 'Discrete structures in computing', 5, 'Sunday-Monday-Tuesday-Wednesday', '9:15-10:30'),
(334, '2222111', 'Discrete structures in computing', 6, 'Sunday-Monday-Tuesday-Wednesday', '08:00-09:15'),
(335, '2221111', 'Introduction to Information Technology', 1, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:15'),
(336, '2221111', 'Introduction to Information Technology', 2, 'Sunday-Monday-Tuesday-Wednesday', '14:15-15:30'),
(337, '2221111', 'Introduction to Information Technology', 3, 'Sunday-Monday-Tuesday-Wednesday', '10:30-11:45'),
(338, '2221111', 'Introduction to Information Technology', 4, 'Sunday-Monday-Tuesday-Wednesday', '11:45-13:00'),
(339, '2221111', 'Introduction to Information Technology', 5, 'Sunday-Monday-Tuesday-Wednesday', '08:00-09:15'),
(340, '2221111', 'Introduction to Information Technology', 6, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:15'),
(341, '2221241', 'Management Information Systems', 1, 'Sunday-Monday-Tuesday-Wednesday', '10:30-11:45'),
(342, '2221241', 'Management Information Systems', 2, 'Sunday-Monday-Tuesday-Wednesday', '11:45-13:00'),
(343, '2221241', 'Management Information Systems', 3, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:15'),
(344, '2221241', 'Management Information Systems', 4, 'Sunday-Monday-Tuesday-Wednesday', '14:15-15:30'),
(345, '2222161', 'Fundamentals of Data Science', 1, 'Sunday-Monday-Tuesday-Wednesday', '10:30-11:45'),
(346, '2222161', 'Fundamentals of Data Science', 2, 'Sunday-Monday-Tuesday-Wednesday', '11:45-13:00'),
(347, '2222161', 'Fundamentals of Data Science', 3, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:15'),
(348, '2222161', 'Fundamentals of Data Science', 4, 'Sunday-Monday-Tuesday-Wednesday', '14:15-15:30'),
(349, '2222261', 'Introduction to Artificial Intelligence', 1, 'Sunday-Monday-Tuesday-Wednesday', '11:45-13:00'),
(350, '2222261', 'Introduction to Artificial Intelligence', 2, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:15'),
(351, '2222261', 'Introduction to Artificial Intelligence', 3, 'Sunday-Monday-Tuesday-Wednesday', '14:15-15:30'),
(352, '2222261', 'Introduction to Artificial Intelligence', 4, 'Sunday-Monday-Tuesday-Wednesday', '09:15-10:30'),
(353, '2222362', 'Introduction to Artificial Intelligence lab', 1, 'Monday-Wednesday', '14:00-15:30 '),
(354, '2222362', 'Introduction to Artificial Intelligence lab', 2, 'Sunday-Tuesday', '08:00-09:30'),
(355, '2222362', 'Introduction to Artificial Intelligence lab', 3, 'Monday-Wednesday', '09:30-11:00'),
(356, '2222362', 'Introduction to Artificial Intelligence lab', 4, 'Sunday-Tuesday', '11:00-12:30'),
(357, '2231101', 'Computer Ethics and Communication Skills', 1, 'Sunday-Monday-Tuesday-Wednesday', '14:15-15:30'),
(358, '2231101', 'Computer Ethics and Communication Skills', 2, 'Sunday-Monday-Tuesday-Wednesday', '10:30-11:45'),
(359, '2231101', 'Computer Ethics and Communication Skills', 3, 'Sunday-Monday-Tuesday-Wednesday', '11:45-13:00'),
(360, '2231101', 'Computer Ethics and Communication Skills', 4, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:30'),
(361, '2231101', 'Computer Ethics and Communication Skills', 5, 'Sunday-Monday-Tuesday-Wednesday', '10:30-11:45'),
(362, '2231101', 'Computer Ethics and Communication Skills', 6, 'Sunday-Monday-Tuesday-Wednesday', '15:30-16:45'),
(363, '2211121', 'Introduction to Programming', 1, 'Sunday-Monday-Tuesday-Wednesday', '10:30-11:45'),
(364, '2211121', 'Introduction to Programming', 2, 'Sunday-Monday-Tuesday-Wednesday', '11:45-13:00'),
(365, '2211121', 'Introduction to Programming', 3, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:15'),
(366, '2211121', 'Introduction to Programming', 4, 'Sunday-Monday-Tuesday-Wednesday', '14:15-15:30'),
(367, '2211121', 'Introduction to Programming', 5, 'Sunday-Monday-Tuesday-Wednesday', '15:30-16:45'),
(368, '2211121', 'Introduction to Programming', 6, 'Sunday-Monday-Tuesday-Wednesday', '09:15-10:30'),
(369, '2211122', ' Introduction to Programming lab', 1, 'Sunday-Tuesday', '08:00-09:30'),
(370, '2211122', 'Introduction to Programming lab', 2, 'Monday-Wednesday', '15:30-17:00'),
(371, '2211122', 'Introduction to Programming lab', 3, 'Monday-Wednesday', '08:00-09:30'),
(372, '2211122', 'Introduction to Programming lab', 4, 'Sunday-Tuesday', '15:30-17:00'),
(373, '2211122', 'Introduction to Programming lab', 5, 'Sunday-Tuesday', '11:00-12:30'),
(374, '2211122', 'Introduction to Programming lab', 6, 'Monday-Wednesday', '11:00-12:30'),
(375, '2211123', 'Object-oriented programming ', 1, 'Sunday-Monday-Tuesday-Wednesday', '09:15-10:30'),
(376, '2211123', 'Object-oriented programming ', 2, 'Sunday-Monday-Tuesday-Wednesday', '10:30-11:45'),
(377, '2211123', 'Object-oriented programming ', 3, 'Sunday-Monday-Tuesday-Wednesday', '11:45-13:00'),
(378, '2211123', 'Object-oriented programming ', 4, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:15'),
(379, '2211123', 'Object-oriented programming ', 5, 'Sunday-Monday-Tuesday-Wednesday', '14:15-15:30'),
(380, '2212251', 'Cyber Security Fundamentals', 1, 'Sunday-Monday-Tuesday-Wednesday', '10:30-11:45'),
(381, '2212251', 'Cyber Security Fundamentals', 2, 'Sunday-Monday-Tuesday-Wednesday', '11:45-13:00'),
(382, '2212251', 'Cyber Security Fundamentals', 3, 'Sunday-Monday-Tuesday-Wednesday', '13:00-14:15'),
(383, '2212251', 'Cyber Security Fundamentals', 4, 'Sunday-Monday-Tuesday-Wednesday', '14:15-15:30'),
(384, '2211124', 'Object-oriented programming lab', 1, 'Sunday-Tuesday', '14:00-15:30'),
(385, '2211124', 'Object-oriented programming lab', 2, 'Monday-Wednesday', '08:00-09:30'),
(386, '2211124', 'Object-oriented programming lab', 3, 'Sunday-Tuesday', '09:30-11:00'),
(387, '2211124', 'Object-oriented programming lab', 4, 'Monday-Wednesday', '11:00-12:30'),
(388, '2211124', 'Object-oriented programming lab', 5, 'Sunday-Tuesday', '12:30-14:00'),
(389, '2211261', 'Introduction to Databases', 1, 'sun-mon-tues-wed', '10:30-11:45'),
(390, '2211261', 'Introduction to Databases', 2, 'sun-mon-tues-wed', '11:45-13:00'),
(391, '2211261', 'Introduction to Databases', 3, 'sun-mon-tues-wed', '13:00-14:15'),
(392, '2211261', 'Introduction to Databases', 4, 'sun-mon-tues-wed', '14:15-15:30'),
(393, '2211211', 'Data structures', 1, 'sun-mon-tues-wed', '11:45-13:00'),
(394, '2211211', 'Data structures', 2, 'sun-mon-tues-wed', '13:00-14:15'),
(395, '2211211', 'Data structures', 3, 'sun-mon-tues-wed', '14:15-15:30'),
(396, '2211211', 'Data structures', 4, 'sun-mon-tues-wed', '09:15-10:30'),
(397, '2211351', 'Computer Networks', 1, 'sun-mon-tues-wed', '13-14:15'),
(398, '2211351', 'Computer Networks', 2, 'sun-mon-tues-wed', '14:15-15:30'),
(399, '2211351', 'Computer Networks', 3, 'sun-mon-tues-wed', '08:00-09:15'),
(400, '2211351', 'Computer Networks', 4, 'sun-mon-tues-wed', '10:30-11:45'),
(401, '2211262', 'Introduction to Databases lab', 1, 'mon-wed', '08:00-09:30'),
(402, '2211262', 'Introduction to Databases lab', 2, 'sun-tues', '09:30-11:00'),
(403, '2211262', 'Introduction to Databases lab', 3, 'sun-tues', '11:00-12:30'),
(404, '2211262', 'Introduction to Databases lab', 4, 'mon-wed', '12:30-14:00'),
(405, '2211212', 'Algorithms', 1, 'sun-mon-tues-wed', '10:30-11:45'),
(406, '2211212', 'Algorithms', 2, 'sun-mon-tues-wed', '11:45-13:00'),
(407, '2211212', 'Algorithms', 3, 'sun-mon-tues-wed', '13:00-14:15'),
(408, '2211212', 'Algorithms', 4, 'sun-mon-tues-wed', '14:15-15:30'),
(409, '2211263', 'Database Programming', 1, 'sun-mon-tues-wed', '10:30-11:45'),
(410, '2211263', 'Database Programming', 2, 'sun-mon-tues-wed', '11:45-13:00'),
(411, '2211263', 'Database Programming', 3, 'sun-mon-tues-wed', '14:15-15:30'),
(412, '2211263', 'Database Programming', 4, 'sun-mon-tues-wed', '10:30-11:45'),
(413, '2212351', 'Computer and Network Security', 1, 'sun-mon-tues-wed', '11:45-13:00'),
(414, '2212351', 'Computer and Network Security', 2, 'sun-mon-tues-wed', '13:00-14:15'),
(415, '2212351', 'Computer and Network Security', 3, 'sun-mon-tues-wed', '14:15-15:30'),
(416, '2212351', 'Computer and Network Security', 4, 'sun-mon-tues-wed', '10:30-11:45'),
(417, '2212353', 'Computer and Network Security LAB', 1, 'sun-tues', '08:00-09:30'),
(418, '2212353', 'Computer and Network Security LAB', 2, 'mon-wed', '08:00-09:30'),
(419, '2212353', 'Computer and Network Security LAB', 3, 'sun-tues', '11:00-12:30'),
(420, '2212353', 'Computer and Network Security LAB', 4, 'mon-wed', '15:30-17:00'),
(421, '2211431', 'Operating Systems', 1, 'sun-mon-tues-wed', '10:30-11:45'),
(422, '2211431', 'Operating Systems', 2, 'sun-mon-tues-wed', '11:45-13:00'),
(423, '2211431', 'Operating Systems', 3, 'sun-mon-tues-wed', '13:00-14:15'),
(424, '2211361', 'Computer Graphics', 1, 'sun-mon-tues-wed', '14:15-15:30'),
(425, '2211361', 'Computer Graphics', 2, 'sun-mon-tues-wed', '09:15-10:30'),
(426, '2211361', 'Computer Graphics', 3, 'sun-mon-tues-wed', '10:30-11:45'),
(427, '2212171', 'Cybercrime and Human Rights Law', 1, 'sun-mon-tues-wed', '09:15-10:30'),
(428, '2212171', 'Cybercrime and Human Rights Law', 2, 'sun-mon-tues-wed', '10:30-11:45'),
(429, '2212171', 'Cybercrime and Human Rights Law', 3, 'sun-mon-tues-wed', '11:45-13:00'),
(430, '2212352', 'Security Communication Protocols', 1, 'sun-mon-tues-wed', '14:15-15:30'),
(431, '2212352', 'Security Communication Protocols', 2, 'sun-mon-tues-wed', '09:15-10:30'),
(432, '2212352', 'Security Communication Protocols', 3, 'sun-mon-tues-wed', '10:30-11:45'),
(433, '2212271', 'Cryptography', 1, 'sun-mon-tues-wed', '13:00-14:15'),
(434, '2212271', 'Cryptography', 2, 'sun-mon-tues-wed', '14:15-15:30'),
(435, '2212271', 'Cryptography', 3, 'sun-mon-tues-wed', '08:00-09:15'),
(436, '2212271', 'Computer theory', 1, 'sun-mon-tues-wed', '11:45-13:00'),
(437, '2212271', 'Computer theory', 2, 'sun-mon-tues-wed', '10:30-11:45'),
(438, '2212271', 'Computer theory', 3, 'sun-mon-tues-wed', '09:15-10:30'),
(439, '2222362', 'Introduction to Artificial Intelligence lab', 4, 'sun-tues', '11:00-12:30'),
(440, '2222461', 'Data Engineering', 1, 'sun-mon-tues-wed', '13:00-14:15'),
(441, '2222461', 'Data Engineering', 2, 'sun-mon-tues-wed', '14:15-15:30'),
(442, '2222461', 'Data Engineering', 3, 'sun-mon-tues-wed', '09:15-10:30'),
(443, '2222461', 'Data Engineering', 4, 'sun-mon-tues-wed', '08:00-09:15'),
(444, '2221223', 'Internet Application Programming', 1, 'sun-mon-tues-wed', '13:00-14:15'),
(445, '2221223', 'Internet Application Programming', 2, 'sun-mon-tues-wed', '09:15-10:30'),
(446, '2221223', 'Internet Application Programming', 3, 'sun-mon-tues-wed', '11:45-13:00'),
(447, '2221223', 'Internet Application Programming', 4, 'sun-mon-tues-wed', '14:15-15:30'),
(448, '2222242', 'Data Science and Artificial Intelligence Programming', 1, 'sun-mon-tues-wed', '13:00-14:15'),
(449, '2222242', 'Data Science and Artificial Intelligence Programming', 2, 'sun-mon-tues-wed', '14:15-15:30'),
(450, '2222242', 'Data Science and Artificial Intelligence Programming', 3, 'sun-mon-tues-wed', '09:15-10:30'),
(451, '2222242', 'Data Science and Artificial Intelligence Programming', 4, 'sun-mon-tues-wed', '11:45-13:00'),
(452, '2221223', 'Machine and deep field learning', 1, 'sun-mon-tues-wed', '14:15-15:30'),
(453, '2221223', 'Machine and deep field learning', 2, 'sun-mon-tues-wed', '10:30-11:45'),
(454, '2221223', 'Machine and deep field learning', 3, 'sun-mon-tues-wed', '15:30-16:45'),
(455, '2221223', 'Machine and deep field learning', 4, 'sun-mon-tues-wed', '13:00-14:15'),
(456, '2222242', 'Data Science and Artificial Intelligence Programming Lab', 1, 'mon-wed', '08:00-09:30'),
(457, '2222242', 'Data Science and Artificial Intelligence Programming Lab', 2, 'sun-tues', '08:00-09:30'),
(458, '2222242', 'Data Science and Artificial Intelligence Programming Lab', 3, 'mon-wed', '11:00-12:30'),
(459, '2222242', 'Data Science and Artificial Intelligence Programming Lab', 4, 'sun-tues', '15:30-17:00'),
(460, '2221321', 'Visual Programming', 1, 'sun-mon-tues-wed', '11:45-13:00'),
(461, '2221321', 'Visual Programming', 2, 'sun-mon-tues-wed', '13:00-14:15'),
(462, '2221321', 'Visual Programming', 3, 'sun-mon-tues-wed', '14:15-15:30'),
(463, '2221362', 'Software Project Management', 1, 'sun-mon-tues-wed', '09:15-10:30'),
(464, '2221362', 'Software Project Management', 2, 'sun-mon-tues-wed', '10:30-11:45'),
(465, '2221362', 'Software Project Management', 3, 'sun-mon-tues-wed', '11:45-13:00'),
(466, '2222365', 'High-performance computing and big data', 1, 'sun-mon-tues-wed', '11:45-13:00'),
(467, '2222365', 'High-performance computing and big data', 2, 'sun-mon-tues-wed', '13:00-14:15'),
(468, '2222365', 'High-performance computing and big data', 3, 'sun-mon-tues-wed', '14:15-15:30'),
(469, '2222232', 'Data modeling and simulation', 1, 'sun-mon-tues-wed', '09:15-10:30'),
(470, '2222232', 'Data modeling and simulation', 2, 'sun-mon-tues-wed', '10:30-11:45'),
(471, '2222232', 'Data modeling and simulation', 3, 'sun-mon-tues-wed', '11:45-13:00'),
(472, '2222243', 'Natural Language Processing', 1, 'sun-mon-tues-wed', '14:15-15:30'),
(473, '2222243', 'Natural Language Processing', 2, 'sun-mon-tues-wed', '09:15-10:30'),
(474, '2222243', 'Natural Language Processing', 3, 'sun-mon-tues-wed', '10:30-11:45'),
(475, '2231261', 'Fundamentals of Software Engineering', 1, 'sun-mon-tues-wed', '14:15_15:30'),
(476, '2231261', 'Fundamentals of Software Engineering', 2, 'sun-mon-tues-wed', '10:30_11:45'),
(477, '2231261', 'Fundamentals of Software Engineering', 3, 'sun-mon-tues-wed', '15:30_16:45'),
(478, '2231261', 'Fundamentals of Software Engineering', 4, 'sun-mon-tues-wed', '13:00_14:15'),
(479, '2231221', 'Requirements Engineering', 1, 'sun-mon-tues-wed', '14:15_15:30'),
(480, '2231221', 'Requirements Engineering', 2, 'sun-mon-tues-wed', '09:15_10;30'),
(481, '2231221', 'Requirements Engineering', 3, 'sun-mon-tues-wed', '10:30_11:45');

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
-- Indexes for table `optnal`
--
ALTER TABLE `optnal`
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
-- Indexes for table `summer`
--
ALTER TABLE `summer`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `optnal`
--
ALTER TABLE `optnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report_teacher`
--
ALTER TABLE `report_teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3685;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `summer`
--
ALTER TABLE `summer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tetches`
--
ALTER TABLE `tetches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tims`
--
ALTER TABLE `tims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

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
