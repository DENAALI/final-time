-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 09:13 PM
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

CREATE TABLE IF NOT EXISTS `hall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  `hall_name` varchar(100) NOT NULL,
  `hall_capacity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE IF NOT EXISTS `major` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `major_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `major_name`) VALUES
(1, 'Computer Science'),
(2, 'Software Engineering'),
(3, 'Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `report_teacher`
--

CREATE TABLE IF NOT EXISTS `report_teacher` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `teacher_name` int(255) NOT NULL,
  `subject_num` int(20) NOT NULL,
  `num_of_study` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `section` varchar(100) NOT NULL,
  `techer` varchar(100) DEFAULT NULL,
  `time` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `hall` varchar(100) NOT NULL,
  `student_num` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1291 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `subject_id`, `subject_name`, `section`, `techer`, `time`, `day`, `hall`, `student_num`) VALUES
(1217, 2211212, 'Algorithms', '1', 'prof. Bassam Mahadin', '10_11', 'Sunday-Tuesday-Thursday', 'IT_5', 50),
(1218, 2211212, 'Algorithms', '2', 'prof. Ahmed Hassanat', '11_12', 'Sunday-Tuesday-Thursday', 'IT_5', 50),
(1219, 2211212, 'Algorithms', '3', 'prof. Bassam Mahadin', '12_13', 'Sunday-Tuesday-thursday', 'IT_5', 50),
(1220, 2211214, 'Algorithms Lab', '1', 'Mrs.roba al-soub', '14_16', 'Sunday', 'lab', 50),
(1221, 2211214, 'Algorithms Lab', '2', 'Mrs.roba al-soub', '8_10', 'Tuesday', 'lab', 50),
(1222, 2211214, 'Algorithms Lab', '3', 'Mrs.roba al-soub', '10_12', 'Sunday', 'lab', 50),
(1223, 2212351, 'Computer and Network Security', '1', 'prof. Ahmed Hassanat', '13_14', 'Sunday-Tuesday-thursday', 'IT_5', 0),
(1224, 2212353, 'Computer and Network Security LAB', '1', 'prof. Bassam Mahadin', '8_10', 'Sunday', 'lab', 0),
(1225, 2231101, 'Computer Ethics and Communication Skills', '1', NULL, '11_12', 'Sunday-Tuesday-thursday', '202', 50),
(1226, 2231101, 'Computer Ethics and Communication Skills', '2', NULL, '12_13', 'Sunday-Tuesday-thursday', '202', 50),
(1227, 2231101, 'Computer Ethics and Communication Skills', '3', NULL, '13_14', 'Sunday-Tuesday-thursday', '202', 50),
(1228, 2231101, 'Computer Ethics and Communication Skills', '4', NULL, '14_15', 'Sunday-Tuesday-thursday', 'IT_5', 50),
(1229, 2231101, 'Computer Ethics and Communication Skills', '5', NULL, '8_9', 'Sunday-Tuesday-thursday', 'IT_5', 50),
(1230, 2231101, 'Computer Ethics and Communication Skills', '6', NULL, '9_10', 'Sunday-Tuesday-thursday', 'IT_5', 50),
(1232, 2211351, 'Computer Networks', '1', 'Dr. hayat dmour', '12_13', 'Sunday-Tuesday-thursday', '203', 50),
(1233, 2211351, 'Computer Networks', '2', 'Dr.Afaf Al-Tarief', '13_14', 'Sunday-Tuesday-thursday', '203', 20),
(1234, 2211211, 'Data structures', '1', 'Dr.Afaf Al-Tarief', '11_12', 'Sunday-Tuesday-thursday', '203', 50),
(1235, 2211211, 'Data structures', '2', 'Dr.anas alkasasba', '12_13', 'Sunday-Tuesday-thursday', '204', 50),
(1236, 2211211, 'Data structures', '3', 'Mrs.roba al-soub', '13_14', 'Sunday-Tuesday-thursday', '204', 20),
(1237, 2211263, 'Database Programming', '1', 'Mrs.roba al-soub', '11_12', 'Sunday-Tuesday-thursday', '204', 50),
(1238, 2211263, 'Database Programming', '2', 'Mr.Moataz Al-Mubaideen', '12_13', 'Sunday-Tuesday-thursday', '205', 50),
(1239, 2211263, 'Database Programming', '3', 'non', '13_14', 'Sunday-Tuesday-thursday', '205', 50),
(1240, 2211263, 'Database Programming', '4', 'Dr. hayat dmour', '14_15', 'Sunday-Tuesday-thursday', '202', 50),
(1241, 2211263, 'Database Programming', '5', 'Dr. hayat dmour', '8_9', 'Sunday-Tuesday-thursday', '202', 50),
(1242, 2211263, 'Database Programming', '6', 'Dr.Afaf Al-Tarief', '9_10', 'Sunday-Tuesday-thursday', '202', 10),
(1244, 2222111, 'Discontinuous computing structures', '1', NULL, '12_13', 'Sunday-Tuesday-thursday', '101', 50),
(1245, 2222111, 'Discontinuous computing structures', '2', NULL, '13_14', 'Sunday-Tuesday-thursday', '101', 50),
(1246, 2222111, 'Discontinuous computing structures', '3', NULL, '14_15', 'Sunday-Tuesday-thursday', '203', 50),
(1247, 2222111, 'Discontinuous computing structures', '4', NULL, '8_9', 'Sunday-Tuesday-thursday', '203', 50),
(1248, 2222111, 'Discontinuous computing structures', '5', NULL, '9_10', 'Sunday-Tuesday-thursday', '203', 50),
(1249, 2222111, 'Discontinuous computing structures', '6', NULL, '10_11', 'Sunday-Tuesday-thursday', '202', 50),
(1250, 2231261, 'Fundamentals of Software Engineering', '1', NULL, '13_14', 'Sunday-Tuesday-thursday', '102', 50),
(1251, 2231261, 'Fundamentals of Software Engineering', '2', NULL, '14_15', 'Sunday-Tuesday-thursday', '204', 50),
(1252, 2231491, 'Graduation Project (1)', '1', NULL, '_', '_', 'IT_5', 0),
(1253, 2221223, 'Internet Application Programming', '1', NULL, '12_13', 'Sunday-Tuesday-thursday', '102', 50),
(1254, 2221223, 'Internet Application Programming', '2', NULL, '13_14', 'Sunday-Tuesday-thursday', '103', 50),
(1255, 2221223, 'Internet Application Programming', '3', NULL, '14_15', 'Sunday-Tuesday-thursday', '205', 50),
(1256, 2222261, 'Introduction to Artificial Intelligence', '1', NULL, '12_13', 'Sunday-Tuesday-thursday', '103', 0),
(1257, 2222362, 'Introduction to Artificial Intelligence lab', '1', NULL, '13_15', 'Sunday', 'lab', 0),
(1258, 2211261, 'Introduction to Databases', '1', 'Dr.anas alkasasba', '10_11', 'Sunday-Tuesday-thursday', '203', 50),
(1259, 2211261, 'Introduction to Databases', '2', 'non', '11_12', 'Sunday-Tuesday-thursday', '205', 50),
(1260, 2211261, 'Introduction to Databases', '3', 'non', '12_13', 'Sunday-Tuesday-thursday', '104', 20),
(1261, 2211262, 'Introduction to Databases lab', '1', 'Mr.Moataz Al-Mubaideen', '14_16', 'Sunday', 'lab2', 50),
(1262, 2211262, 'Introduction to Databases lab', '2', 'Mr.Moataz Al-Mubaideen', '9_11', 'Tuesday', 'lab', 50),
(1263, 2211262, 'Introduction to Databases lab', '3', 'Mr.Moataz Al-Mubaideen', '10_12', 'Sunday', 'lab2', 20),
(1264, 2221111, 'Introduction to Information Technology', '1', NULL, '13_14', 'Sunday-Tuesday-Thursday', '104', 50),
(1265, 2221111, 'Introduction to Information Technology', '2', NULL, '14_15', 'Sunday-Tuesday-thursday', '101', 50),
(1266, 2221111, 'Introduction to Information Technology', '3', NULL, '8_9', 'Sunday-Tuesday-thursday', '204', 50),
(1267, 2221111, 'Introduction to Information Technology', '4', NULL, '9_10', 'Sunday-Tuesday-thursday', '204', 50),
(1268, 2221111, 'Introduction to Information Technology', '5', NULL, '10_11', 'Sunday-Tuesday-thursday', '204', 50),
(1269, 2221111, 'Introduction to Information Technology', '6', NULL, '11_12', 'Sunday-Tuesday-thursday', '101', 50),
(1270, 2211121, 'Introduction to Programming', '1', 'Mr.Moataz Al-Mubaideen', '10_11', 'Sunday-Tuesday-thursday', '205', 50),
(1271, 2211121, 'Introduction to Programming', '2', 'non', '11_12', 'Sunday-Tuesday-thursday', '102', 50),
(1272, 2211121, 'Introduction to Programming', '3', 'non', '12_13', 'Sunday-Tuesday-thursday', 'hall1', 50),
(1273, 2211121, 'Introduction to Programming', '4', 'non', '13_14', 'Sunday-Tuesday-thursday', 'hall1', 50),
(1274, 2211121, 'Introduction to Programming', '5', 'Dr.anas alkasasba', '14_15', 'Sunday-Tuesday-thursday', '102', 50),
(1275, 2211121, 'Introduction to Programming', '6', 'Dr.anas alkasasba', '8_9', 'Sunday-Tuesday-thursday', '205', 50),
(1276, 2211122, 'Introduction to Programming lab', '1', 'non', '14_16', 'Sunday', 'lab3', 50),
(1277, 2211122, 'Introduction to Programming lab', '2', 'non', '14-16', 'Tuesday', 'lab', 50),
(1278, 2211122, 'Introduction to Programming lab', '3', 'non', '10_12', 'Sunday', 'lab3', 50),
(1279, 2211122, 'Introduction to Programming lab', '4', 'non', '10_12', 'Tuesday', 'lab', 50),
(1280, 2211122, 'Introduction to Programming lab', '5', 'non', '11_13', 'Sunday', 'lab', 50),
(1281, 2211122, 'Introduction to Programming lab', '6', 'non', '12_14', 'Tuesday', 'lab', 50),
(1282, 2211431, 'Operating Systems', '1', 'Dr.Afaf Al-Tarief', '8_9:30', 'Monday-Wednesday', 'IT_5', 50),
(1283, 2211431, 'Operating Systems', '2', 'non', '9:30_11', 'Monday-Wednesday', 'IT_5', 50),
(1284, 2231221, 'Requirements Engineering', '1', NULL, '14_15:30', 'Monday-Wednesday', '202', 0),
(1285, 2231341, 'Software Modeling', '1', NULL, '11_12:30', 'Monday-Wednesday', '202', 0),
(1286, 2221362, 'Software Project Management', '1', NULL, '11_12:30', 'Monday-Wednesday', '203', 0),
(1287, 2231443, 'Software Quality Assurance and Inspection', '1', NULL, '9:30_11', 'Monday-Wednesday', '202', 0),
(1288, 2221321, 'Visual Programming', '1', NULL, '9:30-11', 'Monday-Wednesday', 'IT_5', 50),
(1289, 2221321, 'Visual Programming', '2', NULL, '11_12:30', 'Monday-Wednesday', '204', 50),
(1290, 2221321, 'Visual Programming', '3', NULL, '12:30_14', 'Monday-Wednesday', 'IT_5', 20);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `hall_id` int(20) NOT NULL,
  `students_id` int(20) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `year` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hall_id` (`hall_id`,`students_id`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) NOT NULL,
  `subject_num` int(11) NOT NULL,
  `subject_type` varchar(100) DEFAULT NULL,
  `num_of_study` int(11) NOT NULL,
  `pre_subsnum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `subject_name`, `subject_num`, `subject_type`, `num_of_study`, `pre_subsnum`) VALUES
(222, 'ethics', 2231101, 'theoretical', 300, NULL),
(223, 'c++', 2211121, 'theoretical', 300, NULL),
(224, 'lab c++', 2211122, 'laboratory', 300, NULL),
(225, 'descret', 2222111, 'theoretical', 300, NULL),
(226, 'IT', 2221111, 'theoretical', 300, NULL),
(227, 'OOP', 2211123, 'theoretical', 150, NULL),
(228, 'Lab OOP', 2211124, 'laboratory', 150, NULL),
(229, 'logic', 405131, 'theoretical', 190, NULL),
(230, 'DB', 2211261, 'theoretical', 120, NULL),
(231, 'lab DB', 2211262, 'laboratory', 120, NULL),
(232, 'Computer architecture', 405231, 'theoretical', 250, NULL),
(233, 'DS', 2211211, 'theoretical', 120, NULL),
(234, 'introduction to SE', 2231261, 'theoretical', 100, NULL),
(235, 'php', 2221223, 'theoretical', 150, NULL),
(236, 'algorithm', 2211212, 'theoretical', 150, NULL),
(237, 'lab algorithm', 2211214, 'laboratory', 150, NULL),
(238, 'oracl', 2211263, 'theoretical', 260, NULL),
(239, 'vb', 2211351, 'theoretical', 70, NULL),
(240, 'os', 2211431, 'theoretical', 100, NULL),
(241, 'networks', 2221321, 'theoretical', 120, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(20) NOT NULL,
  `major_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `major_id` (`major_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `year` int(20) NOT NULL,
  `semester` int(20) NOT NULL,
  `major_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `pre_sub_num` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `Capacity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `major_id` (`major_id`,`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `year`, `semester`, `major_id`, `subject_id`, `pre_sub_num`, `name`, `type_name`, `Capacity`) VALUES
(9, 1, 1, 1, 2211121, 2211121, 'Introduction to Programming', 'theoretical', 50),
(10, 1, 1, 1, 2211122, 2211122, 'Introduction to Programming lab', 'laboratory', 50),
(11, 1, 2, 1, 2211123, 2211123, 'Object-oriented programming', 'theoretical', 50),
(12, 1, 2, 1, 2211124, 2211124, 'Object-oriented programming lab', 'laboratory', 50),
(19, 1, 1, 1, 2231101, 2211121, 'Computer Ethics and Communication Skills', 'theoretical', 50),
(20, 1, 1, 1, 2222111, 2211121, 'Discontinuous computing structures\r\n', 'theoretical', 50),
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
(116, 1, 1, 3, 2211121, 2211121, 'Introduction to Programming', 'theoretical', 50),
(117, 3, 1, 2, 2221362, 2231261, 'Software Project Management', 'theoretical', 50);

-- --------------------------------------------------------

--
-- Table structure for table `summer`
--

CREATE TABLE IF NOT EXISTS `summer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(100) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `section` int(10) NOT NULL,
  `time` varchar(100) NOT NULL,
  `day` varchar(200) NOT NULL,
  `room` varchar(100) NOT NULL,
  `teacher` varchar(100) DEFAULT NULL,
  `students` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `summer`
--

INSERT INTO `summer` (`id`, `course_id`, `course_name`, `section`, `time`, `day`, `room`, `teacher`, `students`) VALUES
(72, '2231101', 'ethics', 1, '08:00-09:15 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(73, '2231101', 'ethics', 2, '09:15-10:30 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(74, '2231101', 'ethics', 3, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(75, '2231101', 'ethics', 4, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(76, '2231101', 'ethics', 5, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(77, '2231101', 'ethics', 6, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(78, '2211121', 'c++', 1, '08:00-09:15 ', 'Sunday-Monday-Tuesday-Wednesday', '202', 'prof. Bassam Mahadin', 50),
(79, '2211121', 'c++', 2, '09:15-10:30 ', 'Sunday-Monday-Tuesday-Wednesday', '202', 'prof. Bassam Mahadin', 50),
(80, '2211121', 'c++', 3, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', '202', 'prof. Bassam Mahadin', 50),
(81, '2211121', 'c++', 4, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '202', 'prof. Ahmed Hassanat', 50),
(82, '2211121', 'c++', 5, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', '202', 'Dr. hayat dmour', 50),
(83, '2211121', 'c++', 6, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', '202', 'Dr. hayat dmour', 50),
(84, '2211122', 'lab c++', 1, '08:00-09:30 ', 'Monday-Wednesday', 'lab', 'Mrs.roba al-soub', 50),
(85, '2211122', 'lab c++', 2, '09:30-11:00 ', 'Monday-Wednesday', 'lab', 'Mrs.roba al-soub', 50),
(86, '2211122', 'lab c++', 3, '11:00-12:30 ', 'Monday-Wednesday', 'lab', 'Mr.Moataz Al-Mubaideen', 50),
(87, '2211122', 'lab c++', 4, '12:30-14:00 ', 'Monday-Wednesday', 'lab', 'Mr.Moataz Al-Mubaideen', 50),
(88, '2211122', 'lab c++', 5, '14:00-15:30 ', 'Monday-Wednesday', 'lab', 'Dr. moaath hajaya', 50),
(89, '2211122', 'lab c++', 6, '15:30-17:00 ', 'Monday-Wednesday', 'lab', 'non', 50),
(90, '2222111', 'descret', 1, '08:00-09:15 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(91, '2222111', 'descret', 2, '09:15-10:30 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(92, '2222111', 'descret', 3, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(93, '2222111', 'descret', 4, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(94, '2222111', 'descret', 5, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(95, '2222111', 'descret', 6, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', '203', NULL, 50),
(96, '2221111', 'IT', 1, '08:00-09:15 ', 'Sunday-Monday-Tuesday-Wednesday', '204', NULL, 50),
(97, '2221111', 'IT', 2, '09:15-10:30 ', 'Sunday-Monday-Tuesday-Wednesday', '204', NULL, 50),
(98, '2221111', 'IT', 3, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', '204', NULL, 50),
(99, '2221111', 'IT', 4, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '204', NULL, 50),
(100, '2221111', 'IT', 5, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', '204', NULL, 50),
(101, '2221111', 'IT', 6, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', '204', NULL, 50),
(102, '2211123', 'OOP', 1, '08:00-09:15 ', 'Sunday-Monday-Tuesday-Wednesday', '205', 'prof. Ahmed Hassanat', 50),
(103, '2211123', 'OOP', 2, '09:15-10:30 ', 'Sunday-Monday-Tuesday-Wednesday', '205', 'prof. Ahmed Hassanat', 50),
(104, '2211123', 'OOP', 3, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', '205', 'Mrs.roba al-soub', 50),
(105, '2211124', 'Lab OOP', 1, '08:00-09:30 ', 'Monday-Wednesday', 'lab2', 'Mr.Moataz Al-Mubaideen', 50),
(106, '2211124', 'Lab OOP', 2, '09:30-11:00 ', 'Monday-Wednesday', 'lab2', 'Mr.Moataz Al-Mubaideen', 50),
(107, '2211124', 'Lab OOP', 3, '11:00-12:30 ', 'Monday-Wednesday', 'lab2', 'Mrs.roba al-soub', 50),
(108, '405131', 'logic', 1, '08:00-09:15 ', 'Sunday-Monday-Tuesday-Wednesday', '101', NULL, 48),
(109, '405131', 'logic', 2, '09:15-10:30 ', 'Sunday-Monday-Tuesday-Wednesday', '101', NULL, 48),
(110, '405131', 'logic', 3, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', '101', NULL, 47),
(111, '405131', 'logic', 4, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '205', NULL, 47),
(112, '2211261', 'DB', 1, '08:00-09:15 ', 'Sunday-Monday-Tuesday-Wednesday', '102', 'Dr. hayat dmour', 40),
(113, '2211261', 'DB', 2, '09:15-10:30 ', 'Sunday-Monday-Tuesday-Wednesday', '102', 'Dr. hayat dmour', 40),
(114, '2211261', 'DB', 3, '10:30-11:45 ', 'Sunday-Monday-Tuesday-Wednesday', '102', 'Dr.Afaf Al-Tarief', 40),
(115, '2211262', 'lab DB', 1, '08:00-09:30 ', 'Monday-Wednesday', 'lab3', 'Mrs. Wafaa Tarawneh', 40),
(116, '2211262', 'lab DB', 2, '09:30-11:00 ', 'Monday-Wednesday', 'lab3', 'Dr.anas alkasasba', 40),
(117, '2211262', 'lab DB', 3, '11:00-12:30 ', 'Monday-Wednesday', 'lab3', 'non', 40),
(118, '405231', 'Computer architecture', 1, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '101', NULL, 50),
(119, '405231', 'Computer architecture', 2, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', '205', NULL, 50),
(120, '405231', 'Computer architecture', 3, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', '205', NULL, 50),
(121, '405231', 'Computer architecture', 4, '15:30-16:45 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(122, '405231', 'Computer architecture', 5, '16:45-18:00 ', 'Sunday-Monday-Tuesday-Wednesday', 'IT_5', NULL, 50),
(123, '2211211', 'DS', 1, '11:45-13:00 ', 'Sunday-Monday-Tuesday-Wednesday', '102', 'prof. Bassam Mahadin', 40),
(124, '2211211', 'DS', 2, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', '101', 'Dr.Afaf Al-Tarief', 40),
(125, '2211211', 'DS', 3, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', '101', 'Dr.Afaf Al-Tarief', 40),
(126, '2231261', 'introduction to SE', 1, '13:00-14:15 ', 'Sunday-Monday-Tuesday-Wednesday', '102', NULL, 50),
(127, '2231261', 'introduction to SE', 2, '14:15-15:30 ', 'Sunday-Monday-Tuesday-Wednesday', '102', NULL, 50),
(128, '2221223', 'php', 1, '15:30-16:45 ', 'Sunday-Monday-Tuesday-Wednesday', '202', NULL, 50),
(129, '2221223', 'php', 2, '16:45-18:00 ', 'Sunday-Monday-Tuesday-Wednesday', '202', NULL, 50),
(130, '2211212', 'algorithm', 1, '15:30-16:45 ', 'Sunday-Monday-Tuesday-Wednesday', '203', 'Dr. hayat dmour', 50),
(131, '2211212', 'algorithm', 2, '16:45-18:00 ', 'Sunday-Monday-Tuesday-Wednesday', '203', 'Dr.Afaf Al-Tarief', 50),
(132, '2211214', 'lab algorithm', 1, '12:30-14:00 ', 'Monday-Wednesday', 'lab2', 'Mrs.roba al-soub', 50),
(133, '2211214', 'lab algorithm', 2, '14:00-15:30 ', 'Monday-Wednesday', 'lab2', 'Mrs.roba al-soub', 50),
(134, '2211214', 'lab algorithm', 3, '15:30-17:00 ', 'Monday-Wednesday', 'lab2', 'Mr.Moataz Al-Mubaideen', 50),
(135, '2211263', 'oracl', 1, '15:30-16:45 ', 'Sunday-Monday-Tuesday-Wednesday', '204', 'Dr.Afaf Al-Tarief', 44),
(136, '2211263', 'oracl', 2, '16:45-18:00 ', 'Sunday-Monday-Tuesday-Wednesday', '204', 'Dr.anas alkasasba', 44),
(137, '2211351', 'vb', 1, '15:30-16:45 ', 'Sunday-Monday-Tuesday-Wednesday', '205', 'Dr.anas alkasasba', 35),
(138, '2211351', 'vb', 2, '16:45-18:00 ', 'Sunday-Monday-Tuesday-Wednesday', '205', 'Mrs.roba al-soub', 35),
(139, '2211431', 'os', 1, '15:30-16:45 ', 'Sunday-Monday-Tuesday-Wednesday', '101', 'Mr.Moataz Al-Mubaideen', 50),
(140, '2211431', 'os', 2, '16:45-18:00 ', 'Sunday-Monday-Tuesday-Wednesday', '101', 'Dr.obada alhabashneh', 50),
(141, '2221321', 'networks', 1, '15:30-16:45 ', 'Sunday-Monday-Tuesday-Wednesday', '102', NULL, 40),
(142, '2221321', 'networks', 2, '16:45-18:00 ', 'Sunday-Monday-Tuesday-Wednesday', '102', NULL, 40);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `depar_num` int(20) NOT NULL,
  `active` varchar(20) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `permission` varchar(100) NOT NULL,
  `report_id` int(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `report_id` (`report_id`),
  KEY `depar_num` (`depar_num`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE IF NOT EXISTS `tetches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `techer_id` int(20) NOT NULL,
  `subject_id` int(20) DEFAULT NULL,
  `state` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `techer_id` (`techer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tetches`
--

INSERT INTO `tetches` (`id`, `techer_id`, `subject_id`, `state`) VALUES
(1, 4, 2211121, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tims`
--

CREATE TABLE IF NOT EXISTS `tims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course id` varchar(100) NOT NULL,
  `course name` varchar(200) NOT NULL,
  `section` int(10) NOT NULL,
  `day` varchar(200) NOT NULL,
  `hour` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(264, '2231361', 'Software Engineering for Web Applications', 1, 'Monday-Wednesday', '8_9:30'),
(265, '2231361', 'Software Engineering for Web Applications', 2, 'Monday-Wednesday', '9:30_11'),
(266, '2231361', 'Software Engineering for Web Applications', 3, 'Monday-Wednesday', '11_12:30'),
(267, '2231491', 'Graduation Project (1)', 1, '_', '_'),
(268, '2231492', 'Graduation Project (2)', 1, '_', '_');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`depar_num`) REFERENCES `major` (`id`);

--
-- Constraints for table `tetches`
--
ALTER TABLE `tetches`
  ADD CONSTRAINT `tetches_ibfk_2` FOREIGN KEY (`techer_id`) REFERENCES `teacher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
