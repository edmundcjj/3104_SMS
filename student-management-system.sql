-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 02:02 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `adminName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adminNric` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminNric`, `email`) VALUES
('AD16234B', 'Wong Ad Min', 'S8473627G', 'ICT3104demo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumniID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `alumniName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nric` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `addmissionYear` year(4) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumni_tests`
--

CREATE TABLE `alumni_tests` (
  `testName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `grade` int(11) NOT NULL,
  `moduleName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `moduleID` int(11) NOT NULL,
  `alumniID` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(10) UNSIGNED NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `lecturerID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `lecturerID`) VALUES
(1415, 'Aerospace', 'LT16505L'),
(2234, 'Computer Engineering', 'LT16063Q'),
(3104, 'Security Management', 'LT16090S'),
(3313, 'Computer Science', 'LT16023Q'),
(3512, 'Accounting', 'LT14579L');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturerID` varchar(10) NOT NULL,
  `lecturerName` varchar(255) NOT NULL,
  `lecturer_Nric` varchar(255) NOT NULL,
  `lecturerPassword` varchar(255) NOT NULL,
  `password_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birth_Date` date NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturerID`, `lecturerName`, `lecturer_Nric`, `lecturerPassword`, `password_date`, `email`, `address`, `birth_Date`, `position`) VALUES
('LT11111P', 'Chia Ah Niang', 'S9876543A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '19 Dover Dr', '1987-07-03', 'Staff'),
('LT14579L', 'Lim Ah Hiang', 'S1987654A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '22 Dover Dr', '1989-08-02', 'Hod'),
('LT16005H', 'Wen Ah Gor', 'S7654321A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '17 Dover Dr', '1985-05-05', 'Staff'),
('LT16023Q', 'Eng Ah Ron', 'S2198765A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '12 Dover Dr', '1983-02-26', 'Hod'),
('LT16063Q', 'Har Chong Kai', 'ST7236737', 'Tests7@', '2016-11-17', 'ICT3104demo@gmail.com', 'CCK', '2016-11-07', 'Hod'),
('LT16090S', 'Lin Ah Gong', 'S6543219A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '16 Dover Dr', '1984-04-02', 'Hod'),
('LT16449D', 'Ong Ah Peh', 'S8765432A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '18 Dover Dr', '1986-06-04', 'Staff'),
('LT16505L', 'Jalan Ah Noh', 'S3219876A', 'Tests7@', '2016-11-17', 'ICT3104demo@gmail.com', '13 Dover Dr', '1987-01-09', 'Hod'),
('LT16604O', 'Wong Ah Ma', 'S5432198A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '15 Dover Dr', '1988-03-07', 'Staff'),
('LT16609B', 'Tan Ah Kow', 'S1234567A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '20 Dover Dr', '1990-09-01', 'Staff'),
('LT16866H', 'Justin Tan', 'S6541321C', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', 'Singapore 123432', '1982-10-05', 'Staff'),
('LT49681E', 'Cindy Lo', 'S7688888Z', 'Tests7@', '2016-12-09', 'ICT3104demo@gmail.com', 'Block 654 Woodlands Town Hall', '1997-10-24', 'Staff'),
('LT65780T', 'Janey Tan', 'S8475392T', 'Tests7@', '2016-11-08', 'ICT3104demo@gmail.com', 'Blcok 333 Cristan Road', '1990-06-24', 'Staff'),
('LT93847H', 'Bee Ah Pek', 'S4321987A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '14 Dover Dr', '1991-01-01', 'Staff'),
('LT98656K', 'Brian Wong', 'S3726173Z', 'Tests7@', '2016-05-04', 'ICT3104demo@gmail.com', '999 Lim Chu Kang Road', '1980-09-24', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `moduleID` int(10) UNSIGNED NOT NULL,
  `moduleName` varchar(255) NOT NULL,
  `courseID` int(10) UNSIGNED NOT NULL,
  `lecturerID` varchar(10) NOT NULL,
  `credit_Unit` int(11) NOT NULL,
  `trimester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`moduleID`, `moduleName`, `courseID`, `lecturerID`, `credit_Unit`, `trimester`) VALUES
(1002, 'Basic Computing Fundamentals', 1415, 'LT11111P', 3, 1),
(1004, 'Network Technology', 3104, 'LT16005H', 3, 1),
(1007, 'Accounting', 3104, 'LT16449D', 3, 2),
(1009, 'Business Intelligence Analysis', 1415, 'LT16604O', 2, 1),
(2001, 'Market Study', 3104, 'LT16609B', 2, 4),
(2005, 'Food and Nutrition', 2234, 'LT49681E', 3, 4),
(2006, 'Business Study', 2234, 'LT49681E', 2, 3),
(2007, 'Software Management', 3512, 'LT16005H', 6, 2),
(2008, 'Art Of War', 3512, 'LT65780T', 4, 1),
(3001, 'Electrical Science', 2234, 'LT93847H', 3, 1),
(3002, 'Home Economics', 3313, 'LT93847H', 5, 2),
(3003, 'Psychology', 3512, 'LT11111P', 2, 3),
(3005, 'Additional Mathematics', 3313, 'LT98656K', 6, 1),
(3006, 'Forensic Science', 1415, 'LT16866H', 6, 2),
(3007, 'Sociology', 3313, 'LT65780T', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `otp` varchar(10) NOT NULL,
  `userID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`otp`, `userID`) VALUES
('192024', 'LT16090S'),
('462680', 'LT16005H');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `resultID` int(10) UNSIGNED NOT NULL,
  `testID` int(10) NOT NULL,
  `moduleID` int(10) UNSIGNED NOT NULL,
  `studentID` varchar(10) NOT NULL,
  `grade` int(10) UNSIGNED NOT NULL,
  `recommendation` text,
  `recommendResult` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`resultID`, `testID`, `moduleID`, `studentID`, `grade`, `recommendation`, `recommendResult`) VALUES
(27, 37, 1002, 'ST01234S', 20, NULL, ''),
(28, 37, 1002, 'ST01923H', 45, 'add 5 marks', ''),
(29, 37, 1002, 'ST03947A', 60, NULL, ''),
(30, 37, 1002, 'ST04837Y', 70, NULL, ''),
(31, 37, 1002, 'ST05648N', 80, NULL, ''),
(32, 37, 1002, 'ST05710I', 10, NULL, ''),
(33, 37, 1002, 'ST05719J', 50, NULL, ''),
(34, 37, 1002, 'ST09153G', 49, 'add 1 mark', ''),
(35, 37, 1002, 'ST09432W', 85, NULL, ''),
(36, 37, 1002, 'ST09655O', 90, NULL, ''),
(37, 34, 1002, 'ST01234S', 15, NULL, ''),
(38, 34, 1002, 'ST01923H', 2, NULL, ''),
(39, 34, 1002, 'ST03947A', 25, NULL, ''),
(40, 34, 1002, 'ST04837Y', 45, 'add 5 marks', ''),
(41, 34, 1002, 'ST05648N', 50, NULL, ''),
(42, 34, 1002, 'ST05710I', 55, NULL, ''),
(43, 34, 1002, 'ST05719J', 65, NULL, ''),
(44, 34, 1002, 'ST09153G', 70, NULL, ''),
(45, 34, 1002, 'ST09432W', 75, NULL, ''),
(46, 34, 1002, 'ST09655O', 71, NULL, ''),
(47, 58, 3006, 'ST01234S', 33, NULL, ''),
(48, 58, 3006, 'ST01923H', 32, NULL, ''),
(49, 58, 3006, 'ST03947A', 57, NULL, ''),
(50, 58, 3006, 'ST04837Y', 96, NULL, ''),
(51, 58, 3006, 'ST05648N', 43, NULL, ''),
(52, 58, 3006, 'ST05710I', 58, NULL, ''),
(53, 58, 3006, 'ST05719J', 35, NULL, ''),
(54, 58, 3006, 'ST09153G', 57, NULL, ''),
(55, 58, 3006, 'ST09432W', 5, NULL, ''),
(56, 58, 3006, 'ST09655O', 75, NULL, ''),
(57, 59, 3006, 'ST01234S', 75, NULL, ''),
(58, 59, 3006, 'ST01923H', 34, NULL, ''),
(59, 59, 3006, 'ST03947A', 6, NULL, ''),
(60, 59, 3006, 'ST04837Y', 57, NULL, ''),
(61, 59, 3006, 'ST05648N', 86, NULL, ''),
(62, 59, 3006, 'ST05710I', 12, NULL, ''),
(63, 59, 3006, 'ST05719J', 23, NULL, ''),
(64, 59, 3006, 'ST09153G', 23, NULL, ''),
(65, 59, 3006, 'ST09432W', 46, NULL, ''),
(66, 59, 3006, 'ST09655O', 8, NULL, ''),
(67, 21, 1009, 'ST01234S', 88, NULL, ''),
(68, 21, 1009, 'ST01923H', 21, NULL, ''),
(69, 21, 1009, 'ST03947A', 2, NULL, ''),
(70, 21, 1009, 'ST04837Y', 5, NULL, ''),
(71, 21, 1009, 'ST05648N', 58, NULL, ''),
(72, 21, 1009, 'ST05710I', 78, NULL, ''),
(73, 21, 1009, 'ST05719J', 88, NULL, ''),
(74, 21, 1009, 'ST09153G', 76, NULL, ''),
(75, 21, 1009, 'ST09432W', 87, NULL, ''),
(76, 21, 1009, 'ST09655O', 46, 'Add 4 marks', ''),
(77, 92, 1009, 'ST01234S', 44, 'Add 6 marks', ''),
(78, 92, 1009, 'ST01923H', 68, NULL, ''),
(79, 92, 1009, 'ST03947A', 77, NULL, ''),
(80, 92, 1009, 'ST04837Y', 88, NULL, ''),
(81, 92, 1009, 'ST05648N', 15, NULL, ''),
(82, 92, 1009, 'ST05710I', 25, NULL, ''),
(83, 92, 1009, 'ST05719J', 33, NULL, ''),
(84, 92, 1009, 'ST09153G', 64, NULL, ''),
(85, 92, 1009, 'ST09432W', 66, NULL, ''),
(86, 92, 1009, 'ST09655O', 88, NULL, ''),
(87, 69, 3001, 'ST23456K', 33, NULL, ''),
(88, 69, 3001, 'ST29385R', 85, NULL, ''),
(89, 69, 3001, 'ST32109Q', 85, NULL, ''),
(90, 69, 3001, 'ST34567W', 33, NULL, ''),
(91, 69, 3001, 'ST43210S', 58, NULL, ''),
(92, 69, 3001, 'ST45934S', 44, NULL, ''),
(93, 69, 3001, 'ST54321T', 66, NULL, ''),
(94, 69, 3001, 'ST56794V', 88, NULL, ''),
(95, 69, 3001, 'ST65421X', 57, NULL, ''),
(96, 69, 3001, 'ST65431X', 34, NULL, ''),
(97, 68, 3001, 'ST23456K', 64, NULL, ''),
(98, 68, 3001, 'ST29385R', 4, NULL, ''),
(99, 68, 3001, 'ST32109Q', 36, NULL, ''),
(100, 68, 3001, 'ST34567W', 99, NULL, ''),
(101, 68, 3001, 'ST43210S', 88, NULL, ''),
(102, 68, 3001, 'ST45934S', 77, NULL, ''),
(103, 68, 3001, 'ST54321T', 66, NULL, ''),
(104, 68, 3001, 'ST56794V', 55, NULL, ''),
(105, 68, 3001, 'ST65421X', 44, NULL, ''),
(106, 68, 3001, 'ST65431X', 33, NULL, ''),
(107, 109, 2005, 'ST23456K', 21, NULL, ''),
(108, 109, 2005, 'ST29385R', 44, 'Add 6 marks', ''),
(109, 109, 2005, 'ST32109Q', 47, NULL, ''),
(110, 109, 2005, 'ST34567W', 88, NULL, ''),
(111, 109, 2005, 'ST43210S', 66, NULL, ''),
(112, 109, 2005, 'ST45934S', 46, NULL, ''),
(113, 109, 2005, 'ST54321T', 85, NULL, ''),
(114, 109, 2005, 'ST56794V', 5, NULL, ''),
(115, 109, 2005, 'ST65421X', 47, 'Add 3 marks', ''),
(116, 109, 2005, 'ST65431X', 54, NULL, ''),
(117, 108, 2005, 'ST23456K', 23, NULL, ''),
(118, 108, 2005, 'ST29385R', 54, NULL, ''),
(119, 108, 2005, 'ST32109Q', 2, NULL, ''),
(120, 108, 2005, 'ST34567W', 55, NULL, ''),
(121, 108, 2005, 'ST43210S', 14, NULL, ''),
(122, 108, 2005, 'ST45934S', 63, NULL, ''),
(123, 108, 2005, 'ST54321T', 15, NULL, ''),
(124, 108, 2005, 'ST56794V', 66, NULL, ''),
(125, 108, 2005, 'ST65421X', 23, NULL, ''),
(126, 108, 2005, 'ST65431X', 68, NULL, ''),
(127, 112, 2006, 'ST23456K', 64, NULL, ''),
(128, 112, 2006, 'ST29385R', 53, NULL, ''),
(129, 112, 2006, 'ST32109Q', 64, NULL, ''),
(130, 112, 2006, 'ST34567W', 23, NULL, ''),
(131, 112, 2006, 'ST43210S', 85, NULL, ''),
(132, 112, 2006, 'ST45934S', 66, NULL, ''),
(133, 112, 2006, 'ST54321T', 55, NULL, ''),
(134, 112, 2006, 'ST56794V', 4, NULL, ''),
(135, 112, 2006, 'ST65421X', 75, NULL, ''),
(136, 112, 2006, 'ST65431X', 67, NULL, ''),
(137, 86, 2006, 'ST23456K', 45, NULL, ''),
(138, 86, 2006, 'ST29385R', 22, NULL, ''),
(139, 86, 2006, 'ST32109Q', 44, NULL, ''),
(140, 86, 2006, 'ST34567W', 3, NULL, ''),
(141, 86, 2006, 'ST43210S', 44, NULL, ''),
(142, 86, 2006, 'ST45934S', 44, NULL, ''),
(143, 86, 2006, 'ST54321T', 57, NULL, ''),
(144, 86, 2006, 'ST56794V', 32, NULL, ''),
(145, 86, 2006, 'ST65421X', 57, NULL, ''),
(146, 86, 2006, 'ST65431X', 35, NULL, ''),
(147, 43, 1004, 'ST09876T', 4, NULL, ''),
(148, 43, 1004, 'ST11292Z', 5, NULL, ''),
(149, 43, 1004, 'ST12345H', 6, NULL, ''),
(150, 43, 1004, 'ST15396A', 15, NULL, ''),
(151, 43, 1004, 'ST16001A', 46, 'add 4 marks', ''),
(152, 43, 1004, 'ST16234B', 99, NULL, ''),
(153, 43, 1004, 'ST16543P', 67, NULL, ''),
(154, 43, 1004, 'ST16549H', 76, NULL, ''),
(155, 43, 1004, 'ST16693T', 88, NULL, ''),
(156, 43, 1004, 'ST23065E', 57, NULL, ''),
(157, 42, 1004, 'ST09876T', 59, NULL, ''),
(158, 42, 1004, 'ST11292Z', 62, NULL, ''),
(159, 42, 1004, 'ST12345H', 65, NULL, ''),
(160, 42, 1004, 'ST15396A', 69, NULL, ''),
(161, 42, 1004, 'ST16001A', 76, NULL, ''),
(162, 42, 1004, 'ST16234B', 77, NULL, ''),
(163, 42, 1004, 'ST16543P', 79, NULL, ''),
(164, 42, 1004, 'ST16549H', 65, NULL, ''),
(165, 42, 1004, 'ST16693T', 58, NULL, ''),
(166, 42, 1004, 'ST23065E', 59, NULL, ''),
(167, 27, 1007, 'ST09876T', 55, NULL, ''),
(168, 27, 1007, 'ST11292Z', 57, NULL, ''),
(169, 27, 1007, 'ST12345H', 54, NULL, ''),
(170, 27, 1007, 'ST15396A', 76, NULL, ''),
(171, 27, 1007, 'ST16001A', 54, NULL, ''),
(172, 27, 1007, 'ST16234B', 1, NULL, ''),
(173, 27, 1007, 'ST16543P', 25, NULL, ''),
(174, 27, 1007, 'ST16549H', 49, NULL, ''),
(175, 27, 1007, 'ST16693T', 59, NULL, ''),
(176, 27, 1007, 'ST23065E', 67, NULL, ''),
(177, 52, 1007, 'ST09876T', 2, NULL, ''),
(178, 52, 1007, 'ST11292Z', 4, NULL, ''),
(179, 52, 1007, 'ST12345H', 5, NULL, ''),
(180, 52, 1007, 'ST15396A', 7, NULL, ''),
(181, 52, 1007, 'ST16001A', 33, NULL, ''),
(182, 52, 1007, 'ST16234B', 4, NULL, ''),
(183, 52, 1007, 'ST16543P', 4, NULL, ''),
(184, 52, 1007, 'ST16549H', 57, NULL, ''),
(185, 52, 1007, 'ST16693T', 67, NULL, ''),
(186, 52, 1007, 'ST23065E', 8, NULL, ''),
(187, 93, 2001, 'ST09876T', 22, NULL, ''),
(188, 93, 2001, 'ST11292Z', 11, NULL, ''),
(189, 93, 2001, 'ST12345H', 33, NULL, ''),
(190, 93, 2001, 'ST15396A', 55, NULL, ''),
(191, 93, 2001, 'ST16001A', 55, NULL, ''),
(192, 93, 2001, 'ST16234B', 66, NULL, ''),
(193, 93, 2001, 'ST16543P', 77, NULL, ''),
(194, 93, 2001, 'ST16549H', 88, NULL, ''),
(195, 93, 2001, 'ST16693T', 99, NULL, ''),
(196, 93, 2001, 'ST23065E', 57, NULL, ''),
(197, 96, 2001, 'ST09876T', 64, NULL, ''),
(198, 96, 2001, 'ST11292Z', 55, NULL, ''),
(199, 96, 2001, 'ST12345H', 64, NULL, ''),
(200, 96, 2001, 'ST15396A', 62, NULL, ''),
(201, 96, 2001, 'ST16001A', 64, NULL, ''),
(202, 96, 2001, 'ST16234B', 46, NULL, ''),
(203, 96, 2001, 'ST16543P', 77, NULL, ''),
(204, 96, 2001, 'ST16549H', 25, NULL, ''),
(205, 96, 2001, 'ST16693T', 67, NULL, ''),
(206, 96, 2001, 'ST23065E', 77, NULL, ''),
(207, 22, 3007, 'ST65978E', 1, NULL, ''),
(208, 22, 3007, 'ST69785Q', 15, NULL, ''),
(209, 22, 3007, 'ST76543X', 22, NULL, ''),
(210, 22, 3007, 'ST84958T', 44, NULL, ''),
(211, 22, 3007, 'ST85645S', 46, NULL, ''),
(212, 22, 3007, 'ST86756V', 75, NULL, ''),
(213, 22, 3007, 'ST87654X', 46, NULL, ''),
(214, 22, 3007, 'ST87874X', 44, NULL, ''),
(215, 22, 3007, 'ST90000F', 63, NULL, ''),
(216, 22, 3007, 'ST93847B', 23, NULL, ''),
(217, 0, 3007, 'ST65978E', 23, NULL, ''),
(218, 0, 3007, 'ST69785Q', 35, NULL, ''),
(219, 0, 3007, 'ST76543X', 36, NULL, ''),
(220, 0, 3007, 'ST84958T', 64, NULL, ''),
(221, 0, 3007, 'ST85645S', 44, NULL, ''),
(222, 0, 3007, 'ST86756V', 43, NULL, ''),
(223, 0, 3007, 'ST87654X', 46, NULL, ''),
(224, 0, 3007, 'ST87874X', 55, NULL, ''),
(225, 0, 3007, 'ST90000F', 46, NULL, ''),
(226, 0, 3007, 'ST93847B', 43, NULL, ''),
(227, 74, 3002, 'ST65978E', 22, NULL, ''),
(228, 74, 3002, 'ST69785Q', 11, NULL, ''),
(229, 74, 3002, 'ST76543X', 86, NULL, ''),
(230, 74, 3002, 'ST84958T', 64, NULL, ''),
(231, 74, 3002, 'ST85645S', 34, NULL, ''),
(232, 74, 3002, 'ST86756V', 12, NULL, ''),
(233, 74, 3002, 'ST87654X', 46, NULL, ''),
(234, 74, 3002, 'ST87874X', 46, NULL, ''),
(235, 74, 3002, 'ST90000F', 34, NULL, ''),
(236, 74, 3002, 'ST93847B', 4, NULL, ''),
(237, 71, 3002, 'ST65978E', 35, NULL, ''),
(238, 71, 3002, 'ST69785Q', 75, NULL, ''),
(239, 71, 3002, 'ST76543X', 53, NULL, ''),
(240, 71, 3002, 'ST84958T', 85, NULL, ''),
(241, 71, 3002, 'ST85645S', 47, NULL, ''),
(242, 71, 3002, 'ST86756V', 44, NULL, ''),
(243, 71, 3002, 'ST87654X', 23, NULL, ''),
(244, 71, 3002, 'ST87874X', 47, NULL, ''),
(245, 71, 3002, 'ST90000F', 4, NULL, ''),
(246, 71, 3002, 'ST93847B', 43, NULL, ''),
(247, 55, 3005, 'ST65978E', 68, NULL, ''),
(248, 55, 3005, 'ST69785Q', 46, NULL, ''),
(249, 55, 3005, 'ST76543X', 54, NULL, ''),
(250, 55, 3005, 'ST84958T', 4, NULL, ''),
(251, 55, 3005, 'ST85645S', 46, NULL, ''),
(252, 55, 3005, 'ST86756V', 64, NULL, ''),
(253, 55, 3005, 'ST87654X', 25, NULL, ''),
(254, 55, 3005, 'ST87874X', 25, NULL, ''),
(255, 55, 3005, 'ST90000F', 11, NULL, ''),
(256, 55, 3005, 'ST93847B', 75, NULL, ''),
(257, 56, 3005, 'ST65978E', 34, NULL, ''),
(258, 56, 3005, 'ST69785Q', 34, NULL, ''),
(259, 56, 3005, 'ST76543X', 54, NULL, ''),
(260, 56, 3005, 'ST84958T', 66, NULL, ''),
(261, 56, 3005, 'ST85645S', 55, NULL, ''),
(262, 56, 3005, 'ST86756V', 78, NULL, ''),
(263, 56, 3005, 'ST87654X', 33, NULL, ''),
(264, 56, 3005, 'ST87874X', 57, NULL, ''),
(265, 56, 3005, 'ST90000F', 97, NULL, ''),
(266, 56, 3005, 'ST93847B', 46, NULL, ''),
(267, 20, 2008, 'ST94484Q', 64, NULL, ''),
(268, 20, 2008, 'ST94839C', 36, NULL, ''),
(269, 20, 2008, 'ST94857K', 46, NULL, ''),
(270, 20, 2008, 'ST95558M', 43, NULL, ''),
(271, 20, 2008, 'ST95632H', 46, NULL, ''),
(272, 20, 2008, 'ST95741D', 86, NULL, ''),
(273, 20, 2008, 'ST95843S', 66, NULL, ''),
(274, 20, 2008, 'ST95845U', 7, NULL, ''),
(275, 20, 2008, 'ST95863P', 97, NULL, ''),
(276, 20, 2008, 'ST947344L', 46, NULL, ''),
(277, 62, 2008, 'ST94484Q', 4, NULL, ''),
(278, 62, 2008, 'ST94839C', 55, NULL, ''),
(279, 62, 2008, 'ST94857K', 4, NULL, ''),
(280, 62, 2008, 'ST95558M', 44, NULL, ''),
(281, 62, 2008, 'ST95632H', 53, NULL, ''),
(282, 62, 2008, 'ST95741D', 46, NULL, ''),
(283, 62, 2008, 'ST95843S', 35, NULL, ''),
(284, 62, 2008, 'ST95845U', 12, NULL, ''),
(285, 62, 2008, 'ST95863P', 45, NULL, ''),
(286, 62, 2008, 'ST947344L', 56, NULL, ''),
(287, 77, 3003, 'ST94484Q', 88, NULL, ''),
(288, 77, 3003, 'ST94839C', 77, NULL, ''),
(289, 77, 3003, 'ST94857K', 57, NULL, ''),
(290, 77, 3003, 'ST95558M', 77, NULL, ''),
(291, 77, 3003, 'ST95632H', 66, NULL, ''),
(292, 77, 3003, 'ST95741D', 58, NULL, ''),
(293, 77, 3003, 'ST95843S', 34, NULL, ''),
(294, 77, 3003, 'ST95845U', 56, NULL, ''),
(295, 77, 3003, 'ST95863P', 57, NULL, ''),
(296, 77, 3003, 'ST947344L', 45, NULL, ''),
(297, 78, 3003, 'ST94484Q', 67, NULL, ''),
(298, 78, 3003, 'ST94839C', 65, NULL, ''),
(299, 78, 3003, 'ST94857K', 78, NULL, ''),
(300, 78, 3003, 'ST95558M', 34, NULL, ''),
(301, 78, 3003, 'ST95632H', 34, NULL, ''),
(302, 78, 3003, 'ST95741D', 75, NULL, ''),
(303, 78, 3003, 'ST95843S', 45, NULL, ''),
(304, 78, 3003, 'ST95845U', 86, NULL, ''),
(305, 78, 3003, 'ST95863P', 45, NULL, ''),
(306, 78, 3003, 'ST947344L', 45, NULL, ''),
(307, 90, 2007, 'ST94484Q', 35, NULL, ''),
(308, 90, 2007, 'ST94839C', 57, NULL, ''),
(309, 90, 2007, 'ST94857K', 23, NULL, ''),
(310, 90, 2007, 'ST95558M', 22, NULL, ''),
(311, 90, 2007, 'ST95632H', 86, NULL, ''),
(312, 90, 2007, 'ST95741D', 43, NULL, ''),
(313, 90, 2007, 'ST95843S', 57, NULL, ''),
(314, 90, 2007, 'ST95845U', 33, NULL, ''),
(315, 90, 2007, 'ST95863P', 58, NULL, ''),
(316, 90, 2007, 'ST947344L', 46, NULL, ''),
(317, 88, 2007, 'ST94484Q', 54, NULL, ''),
(318, 88, 2007, 'ST94839C', 23, NULL, ''),
(319, 88, 2007, 'ST94857K', 8, NULL, ''),
(320, 88, 2007, 'ST95558M', 54, NULL, ''),
(321, 88, 2007, 'ST95632H', 34, NULL, ''),
(322, 88, 2007, 'ST95741D', 36, NULL, ''),
(323, 88, 2007, 'ST95843S', 55, NULL, ''),
(324, 88, 2007, 'ST95845U', 57, NULL, ''),
(325, 88, 2007, 'ST95863P', 35, NULL, ''),
(326, 88, 2007, 'ST947344L', 23, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` varchar(10) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `student_Nric` varchar(255) NOT NULL,
  `studentPassword` varchar(255) DEFAULT NULL,
  `password_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `birth_Date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `courseID` int(10) UNSIGNED NOT NULL,
  `admission_Year` year(4) NOT NULL,
  `cumulative_GPA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentName`, `student_Nric`, `studentPassword`, `password_date`, `email`, `birth_Date`, `address`, `status`, `courseID`, `admission_Year`, `cumulative_GPA`) VALUES
('ST01234S', 'Ang Tek Hua', 'S4837248Q', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1999-11-22', 'Joo Koon', 'Enroll', 1415, 2016, '0'),
('ST01923H', 'Steve Ong', 'S8473417F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1990-08-10', 'Pioneer', 'Enroll', 1415, 2016, '0'),
('ST03947A', 'Huat Ann', 'S4837218X', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '2002-03-20', 'Lim Chu Kang', 'Enroll', 1415, 2016, '0'),
('ST04837Y', 'Ben Tan', 'S8473342F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1991-01-11', 'Newton', 'Enroll', 1415, 2016, '0'),
('ST05648N', 'Bobby Tan', 'S4834248Q', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1999-01-23', 'City Hall', 'Enroll', 1415, 2016, '0'),
('ST05710I', 'Pency Tan', 'S8473578F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '2008-12-16', 'Orchard', 'Enroll', 1415, 2016, '0'),
('ST05719J', 'Ang Huat Wat', 'S1232368J', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1993-11-13', 'Tai Seng', 'Enroll', 1415, 2016, '0'),
('ST09153G', 'Pancy Ong', 'S1254323V', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1999-06-14', 'Yishun', 'Enroll', 1415, 2016, '0'),
('ST09432W', 'Tiffany Ong', 'S1533417R', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1990-08-19', 'Marina Bay', 'Enroll', 1415, 2016, '0'),
('ST09655O', 'Joshua Ong', 'S483231Q', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '2004-01-12', 'Toa Payoh', 'Enroll', 1415, 2016, '0'),
('ST09876T', 'Steve Chan', 'S8422381Z', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1990-07-10', 'Boon Lay', 'Enroll', 3104, 2016, '0'),
('ST11292Z', 'Sua Chan', 'S4834248O', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1997-09-11', 'Little India', 'Enroll', 3104, 2016, '0'),
('ST12345H', 'Mary Tan', 'S8475994Z', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '0000-00-00', 'Woodland', 'Enroll', 3104, 2017, '0'),
('ST15396A', 'Sun Tan', 'S8471247C', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1967-08-08', 'Outram Park', 'Enroll', 3104, 2016, '0'),
('ST16001A', 'Tom', 'S1600112A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1994-04-10', 'Potong Pasir', 'Expel', 3104, 2016, '0'),
('ST16234B', 'John', 'S93123345G', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1993-05-17', 'Jurong', 'Graduate', 3104, 2016, 'eyJpdiI6IktKelVHNEFMR1JvaHh4MXdLUkNjd0E9PSIsInZhbHVlIjoidzlqVEFqb1FPZGRRaHZSVUo3SFZSU0hpSk04TTZHam1GbURSa2VkN214WT0iLCJtYWMiOiJhY2ZmMjYxMzAzZDQyZWJiMjIzYjdlNGQwZjBmMDgyMDUzMjlhMDNmNDY3YjBjNTU1MDlkN2U3ZDhiNjc5NDZhIn0='),
('ST16543P', 'Tim', 'S9178934D', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1991-02-20', 'Woodlands', 'Pre Enroll', 3104, 2017, '0'),
('ST16549H', 'Jane Hi', 'S9623456F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1996-11-23', 'CCK', 'Un-Enroll', 3104, 2016, '0'),
('ST16693T', 'Jerry', 'S8934567K', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1989-10-10', 'Tuas', 'Enroll', 3104, 2016, '0'),
('ST23065E', 'Emily Koh', 'S8432117F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '2000-08-10', 'Sentosa', 'Enroll', 3104, 2016, '0'),
('ST23456K', 'Anji Fong', 'S8424117E', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1993-04-21', 'Lakeside', 'Enroll', 2234, 2016, '0'),
('ST29385R', 'Peter Ang', 'S8473657V', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1930-12-10', 'Chinatown', 'Enroll', 2234, 2016, '0'),
('ST32109Q', 'Marie Oh', 'S8411452B', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1922-02-20', 'Kanjong Pagar', 'Enroll', 2234, 2016, '0'),
('ST34567W', 'Anna Wanda', 'S8422345Z', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1998-07-23', 'Chinese Garden', 'Enroll', 2234, 2016, '0'),
('ST43210S', 'Yuly Teh', 'S6473947G', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1978-02-26', 'Tiong Bahru', 'Enroll', 2234, 2016, '0'),
('ST45934S', 'Jessy Wan', 'S4273127X', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '2005-01-11', 'East Coast', 'Enroll', 2234, 2016, '0'),
('ST54321T', 'Margret Ong', 'S8473817Z', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1990-05-10', 'East Coast', 'Enroll', 2234, 2016, 'eyJpdiI6ImVqZE03ek03TUswSmxyZFc3aStEeXc9PSIsInZhbHVlIjoiQWoxcFRBVHpQUHVwZEVWZTdNektrUT09IiwibWFjIjoiYzk1NmVhYjNiNjUyZTk2YTdmMmE3ODBlMzZkYWZhMTE3MTFlNDNmMzU2N2MwZjRiNjI1Njc3YzMyMzU2ZTI1YiJ9'),
('ST56794V', 'Jessica Teh', 'S8472147P', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1996-02-19', 'Clementi', 'Enroll', 2234, 2016, '0'),
('ST65421X', 'Yoora', 'S8456417N', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1944-02-10', 'Red Hill', 'Enroll', 2234, 2016, '0'),
('ST65431X', 'Amy White', 'S8213417F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1988-08-10', 'Queenstown', 'Enroll', 2234, 2016, '0'),
('ST65978E', 'Steve Ong', 'S8473417F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1990-08-10', 'East Coast', 'Enroll', 3313, 2016, '0'),
('ST69785Q', 'Maoly Wan', 'S8326412C', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1995-08-22', 'Jurong East', 'Enroll', 3313, 2016, '0'),
('ST76543X', 'Wanda Tan', 'S8412317F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1978-05-19', 'Commonwealth', 'Enroll', 3313, 2016, '0'),
('ST84958T', 'Royce Chan', 'S8431717W', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1990-08-22', 'Somerset', 'Enroll', 3313, 2016, '0'),
('ST85645S', 'Terry', 'S8475849Z', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1844-03-10', 'Marina Bay', 'Enroll', 3313, 2016, '0'),
('ST86756V', 'Jasmine Tan', 'S4832348E', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1899-11-25', 'Punggol', 'Enroll', 3313, 2016, '0'),
('ST87654X', 'Maria Ong', 'S2313415E', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1994-09-29', 'Dover', 'Enroll', 3313, 2016, '0'),
('ST87874X', 'Wati Hoh', 'S4573123S', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1997-05-15', 'Buona Vista', 'Enroll', 3313, 2016, '0'),
('ST90000F', 'Lee Ong Huat', 'S8324417L', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1994-05-02', 'Ang Mo Kio', 'Enroll', 3313, 2016, '0'),
('ST93847B', 'Bob Ong', 'S8423417F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1993-09-24', 'Seng Kang', 'Enroll', 3313, 2016, '0'),
('ST94484Q', 'Jessica Chan', 'S8471237U', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1987-08-10', 'Tanjong Pagar', 'Enroll', 3512, 2016, '0'),
('ST947344L', 'Suzy Ong', 'S8171237P', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1994-08-12', 'Dakota', 'Enroll', 3512, 2016, '0'),
('ST94839C', 'Shanice Chua', 'S8475437T', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1994-08-10', 'Farrer Park', 'Enroll', 3512, 2016, '0'),
('ST94857K', 'Steve Chan', 'S8422381Z', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1990-07-10', 'West Coast', 'Enroll', 3512, 2016, '0'),
('ST95558M', 'Han Wan Wa', 'S8439917R', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1991-02-22', 'Stadium', 'Enroll', 3512, 2016, '0'),
('ST95632H', 'Enn Tan', 'S3123234A', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1987-07-13', 'Bukit Panjang', 'Enroll', 3512, 2016, '0'),
('ST95741D', 'Crystal Tan', 'S4837248R', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '2000-11-22', 'Kovan', 'Enroll', 3512, 2016, '0'),
('ST95843S', 'Anna Wen', 'S8472317W', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '2001-04-03', 'Boon Keng', 'Enroll', 3512, 2016, '0'),
('ST95845U', 'Ang Nak Kong', 'S6821241W', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '1999-11-18', 'Bugis', 'Enroll', 3512, 2016, '0'),
('ST95863P', 'Maty Ang', 'S8473417F', 'Tests7@', '0000-00-00', 'ICT3104demo@gmail.com', '2003-02-25', 'Yio Chu Kang', 'Enroll', 3512, 2016, '0');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `testID` int(11) NOT NULL,
  `testName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `moduleID` int(11) NOT NULL,
  `lecturerID` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `grade_Deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testID`, `testName`, `status`, `moduleID`, `lecturerID`, `grade_Deadline`) VALUES
(0, 'Test 3', 'Saved', 3007, 'LT65780T', '2016-11-29'),
(20, 'Quiz 1', 'Saved', 2008, 'LT65780T', '0000-00-00'),
(21, 'Example Test', 'Saved', 1009, 'LT16604O', '0000-00-00'),
(22, 'Quiz 2', 'Saved', 3007, 'LT65780T', '0000-00-00'),
(27, 'Class Test 5', 'Saved', 1007, 'LT16449D', '0000-00-00'),
(34, 'Class Test 12', 'Saved', 1002, 'LT11111P', '0000-00-00'),
(37, 'Class Test 15', 'Saved', 1002, 'LT11111P', '0000-00-00'),
(42, 'Class Test 20', 'Saved', 1004, 'LT16005H', '0000-00-00'),
(43, 'Class Test 21', 'Saved', 1004, 'LT16005H', '0000-00-00'),
(52, 'Class Test 30', 'Saved', 1007, 'LT16449D', '0000-00-00'),
(55, 'Quiz 4', 'Saved', 3005, 'LT98656K', '0000-00-00'),
(56, 'Quiz 5', 'Saved', 3005, 'LT98656K', '0000-00-00'),
(58, 'Quiz 7', 'Saved', 3006, 'LT16866H', '0000-00-00'),
(59, 'Quiz 8', 'Saved', 3006, 'LT16866H', '0000-00-00'),
(62, 'Quiz 11', 'Saved', 2008, 'LT65780T', '0000-00-00'),
(68, 'Quiz 17', 'Saved', 3001, 'LT93847H', '0000-00-00'),
(69, 'Quiz 18', 'Saved', 3001, 'LT93847H', '0000-00-00'),
(71, 'Quiz 20', 'Saved', 3002, 'LT93847H', '0000-00-00'),
(74, 'Quiz 23', 'Saved', 3002, 'LT93847H', '0000-00-00'),
(77, 'Quiz 26', 'Saved', 3003, 'LT11111P', '0000-00-00'),
(78, 'Quiz 27', 'Saved', 3003, 'LT11111P', '0000-00-00'),
(86, 'Mid Term 4', 'Saved', 2006, 'LT49681E', '0000-00-00'),
(88, 'Mid Term 6', 'Saved', 2007, 'LT16005H', '0000-00-00'),
(90, 'Mid Term 8', 'Saved', 2007, 'LT16005H', '0000-00-00'),
(92, 'Mid Term 10', 'Saved', 1009, 'LT16604O', '0000-00-00'),
(93, 'Mid Term 11', 'Saved', 2001, 'LT16609B', '2016-12-22'),
(96, 'Mid Term 14', 'Saved', 2001, 'LT16609B', '2016-11-25'),
(108, 'Mid Term 26', 'Saved', 2005, 'LT49681E', '0000-00-00'),
(109, 'Mid Term 27', 'Saved', 2005, 'LT49681E', '0000-00-00'),
(112, 'Mid Term 30', 'Saved', 2006, 'LT49681E', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'AD16234B', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Admin', 'wWzFbfJuG9YHhDuQItDbuktQvrkxtIQA5Cog3L0P6w6Z3NXkX6ZklqaeBOp1', '2016-10-27 01:11:34', '2016-11-24 09:02:22', '0'),
(32, 'LT16090S', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Hod', 'bQM9gTBaFcb3MHP9nFAbDCh0r6m6vyOvQm12zaocKUZ3rOBcUE4q3C9mLQxH', '2016-11-02 07:40:43', '2016-11-27 04:05:27', '0'),
(33, 'LT16505L', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Hod', '8IuarePD0iZbCMfwz0DMRcf6zaUYsbyAdRpYkkTcVM4U8xsrO92X0wpK1wFL', '2016-11-02 07:40:43', '2016-11-17 07:09:26', '0'),
(36, 'LT16005H', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', 'osS0k0kNPIXi2RXTuEBQ0TWqEXZrlvDNXNSj9PYmHo2aAmvvd9disKE2hBNU', '2016-11-02 07:41:03', '2016-11-27 04:05:40', '0'),
(39, 'LT16449D', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', NULL, '2016-11-02 07:41:04', '2016-11-02 07:41:04', '0'),
(40, 'LT16604O', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', NULL, '2016-11-02 07:41:04', '2016-11-02 07:41:04', '0'),
(41, 'LT16609B', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', NULL, '2016-11-02 07:41:04', '2016-11-02 07:41:04', '0'),
(42, 'LT16866H', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', 'Kqa68dlRPyek6GFNIdF3oNDYTG3bHIuG2w5LgUb8sPdfhpDNq4ywjPoRaeQh', '2016-11-02 07:41:04', '2016-11-24 01:13:59', '0'),
(43, 'ST16001A', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-02 07:41:51', '2016-11-02 07:41:51', '0'),
(44, 'ST16234B', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', 'JekTy10gjzfpAvA4iM6c2F7MX8m3kd6xAe36Wu8aligrdjOOFmQJtsKbbOsS', '2016-11-02 07:41:52', '2016-11-24 01:11:43', '0'),
(45, 'ST16543P', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-02 07:41:52', '2016-11-02 07:41:52', '0'),
(46, 'ST16549H', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', 'vg3rmIOEuyGFyqpYmOslduFDWQWeiX7QRLFa7yV3VEnHJ3V05ExorRcOR5ji', '2016-11-02 07:41:52', '2016-11-02 07:47:39', '0'),
(47, 'ST16693T', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', 'cWNaaP1Sv9TzYiHp8hSkxR8o3cjAzX1OnYWxuHQtTG0IEAfoVf5gjKWXhzF1', '2016-11-02 07:41:52', '2016-11-13 23:46:48', '0'),
(48, 'LT16063Q', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Hod', 'f0nUGsGtu0KOXnUxhYzLdpScHStAdnISM6SnV54aAMTqdP6B2adQaFYG38Bn', '2016-11-07 16:00:00', '2016-11-27 04:05:09', '0'),
(49, 'LT14579L', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Hod', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(50, 'LT16023Q', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Hod', NULL, '2016-11-07 16:00:00', '2016-11-27 16:00:00', '0'),
(53, 'LT11111P', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', 'dFXCEniYAALIM6HWip5huQCtX8moq1GYEANm52WR3i5bJHsACYscidznVIGO', '2016-11-07 16:00:00', '2016-11-24 09:05:26', '0'),
(54, 'LT93847H', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(55, 'LT65780T', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(56, 'LT98656K', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(57, 'LT49681E', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Lecturer', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(58, 'ST85645S', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-07 16:00:00', '2016-11-27 16:00:00', '0'),
(59, 'ST12345H', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(60, 'ST54321T', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(61, 'ST94857K', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(62, 'ST65978E', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(63, 'ST01234S', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-07 16:00:00', '2016-11-27 16:00:00', '0'),
(64, 'ST01923H', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(65, 'ST09876T', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(66, 'ST23456K', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(67, 'ST34567W', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(68, 'ST69785Q', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-14 16:00:00', '2016-11-27 16:00:00', '0'),
(69, 'ST56794V', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-01 16:00:00', '2016-11-08 16:00:00', '0'),
(70, 'ST87654X', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-10 16:00:00', '2016-11-15 16:00:00', '0'),
(71, 'ST87874X', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-10 16:00:00', '2016-11-15 16:00:00', '0'),
(72, 'ST76543X', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-10 16:00:00', '2016-11-15 16:00:00', '0'),
(73, 'ST65431X', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-10 16:00:00', '2016-11-15 16:00:00', '0'),
(74, 'ST65421X', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-10 16:00:00', '2016-11-15 16:00:00', '0'),
(75, 'ST43210S', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-10 16:00:00', '2016-11-15 16:00:00', '0'),
(76, 'ST15396A', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-10 16:00:00', '2016-11-15 16:00:00', '0'),
(78, 'ST32109Q', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(79, 'ST94484Q', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(80, 'ST45934S', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(81, 'ST09432W', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(82, 'ST23065E', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(83, 'ST29385R', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(84, 'ST84958T', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(85, 'ST04837Y', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(86, 'ST95845U', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(87, 'ST05710I', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(88, 'ST09655O', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(89, 'ST95863P', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(90, 'ST03947A', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(91, 'ST95843S', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(92, 'ST95741D', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(93, 'ST90000F', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(94, 'ST09153G', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(95, 'ST95632H', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(96, 'ST05719J', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(97, 'ST947344L', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(98, 'ST11292Z', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(99, 'ST94839C', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(100, 'ST86756V', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(101, 'ST93847B', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(102, 'ST05648N', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(103, 'ST95558M', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-08 16:00:00', '2016-11-02 16:00:00', '0'),
(104, 'ST33333', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-24 16:17:52', '2016-11-24 16:17:52', '0'),
(105, 'ST33333', '$2y$10$GTV39vzkRqrwkR1UsgxWwufQ9Ak7VXbm0MoMyNQXVQ2adRSxPCTKC', 'Student', NULL, '2016-11-24 16:18:06', '2016-11-24 16:18:06', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumniID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturerID`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`resultID`),
  ADD UNIQUE KEY `resultID` (`resultID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`),
  ADD UNIQUE KEY `testID` (`testID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `resultID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
