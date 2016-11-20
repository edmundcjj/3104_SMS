-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2016 at 06:28 AM
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
  `adminID` int(11) NOT NULL,
  `adminName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adminNric` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumniID` int(11) NOT NULL,
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
  `alumniID` int(11) NOT NULL
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
(2234, 'Computer ENgineering', 'LT16505L'),
(3104, 'Software Management', 'LT16090S'),
(3313, 'Hardware', 'LT16505L'),
(3512, 'TCP/IP', 'LT16521Y'),
(4654, 'Business Analytics', 'LT16700P');

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
('LT12125K', 'Har Chong Kai', 'ST7236737', '$2y$10$4n7SUSJ/JP6Xikm15cYL5.bdInG/6/N2qz3QV86QuLSNZ4qEKbv.m', '2016-11-17', 'hckai@edu.com', 'CCK', '2016-11-07', 'HOD'),
('LT16005H', 'Wen Ah Gor', 'S7654321A', 'test', '0000-00-00', '', '17 Dover Dr', '1985-05-05', 'Staff'),
('LT16090S', 'Lin Ah Gong', 'S6543219A', 'test', '0000-00-00', '', '16 Dover Dr', '1984-04-02', 'HOD'),
('LT16348Q', 'Chia Ah Niang', 'S9876543A', 'test', '0000-00-00', '', '19 Dover Dr', '1987-07-03', 'Staff'),
('LT16404H', 'Bee Ah Pek', 'S4321987A', 'test', '0000-00-00', '', '14 Dover Dr', '1991-01-01', 'Staff'),
('LT16449D', 'Ong Ah Peh', 'S8765432A', 'test', '0000-00-00', '', '18 Dover Dr', '1986-06-04', 'Staff'),
('LT16505L', 'Jalan Ah Noh', 'S3219876A', '$2y$10$qHLg67SoFIK3uMGPzUfbgekRWClDI9EV7jRQeLrvF1Hg5p3/F.GqC', '2016-11-17', '', '13 Dover Dr', '1987-01-09', 'HOD'),
('LT16521Y', 'Lim Ah Hiang', 'S1987654A', 'test', '0000-00-00', '', '22 Dover Dr', '1989-08-02', 'HOD'),
('LT16604O', 'Wong Ah Ma', 'S5432198A', 'test', '0000-00-00', '', '15 Dover Dr', '1988-03-07', 'Staff'),
('LT16609B', 'Tan Ah Kow', 'S1234567A', 'test', '0000-00-00', '', '20 Dover Dr', '1990-09-01', 'Staff'),
('LT16700P', 'Eng Ah Ron', 'S2198765A', 'test', '0000-00-00', '', '12 Dover Dr', '1983-02-26', 'HOD'),
('LT16866H', 'Justin Tan', 'S6541321C', 'test', '0000-00-00', '', 'Singapore 123432', '1982-10-05', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `moduleID` int(10) UNSIGNED NOT NULL,
  `moduleName` varchar(255) NOT NULL,
  `courseID` int(10) UNSIGNED NOT NULL,
  `lecturerID` varchar(10) NOT NULL,
  `credit_Unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`moduleID`, `moduleName`, `courseID`, `lecturerID`, `credit_Unit`) VALUES
(1001, 'Requirement Analysis', 3313, 'LT16866H', 5),
(1002, 'Basic Computing Fundamentals', 1415, 'LT16866H', 6),
(1003, 'Wireless Computer Networks', 3512, 'LT16348Q', 0),
(1004, 'Network Technology', 3104, 'LT16404H', 3),
(1005, 'Advanced Operating System', 3313, 'LT16348Q', 0),
(1102, 'Basic Computing Fundamentals', 3313, 'LT16604O', 0),
(3001, 'Accounting', 2234, 'LT16866H', 3),
(3002, 'Information Technology and the Future', 4654, 'LT16604O', 0),
(3003, 'Business Intelligence Analysis', 4654, 'LT16449D', 0),
(3004, 'Market Study', 3104, 'LT16404H', 5);

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
(7, 17, 1002, 'ST16234B', 44, 'Recommendation text', 'Pending'),
(8, 18, 1004, 'ST16234B', 99, NULL, '0'),
(9, 18, 1004, 'ST16001A', 98, NULL, '0'),
(10, 18, 1004, 'ST16543P', 97, NULL, '0'),
(11, 19, 3004, 'ST16234B', 53, 'Recommendation text', 'Updated'),
(12, 19, 3004, 'ST16001A', 98, NULL, '0'),
(13, 19, 3004, 'ST16543P', 97, NULL, '0'),
(14, 20, 3004, 'ST16234B', 99, NULL, '0'),
(15, 20, 3004, 'ST16001A', 46, 'Recommendation Text', 'Pending'),
(16, 20, 3004, 'ST16543P', 97, NULL, '0'),
(17, 21, 1001, 'ST16001A', 44, 'Recommendation Text', 'Pending'),
(18, 22, 3004, 'ST16234B', 100, NULL, '0'),
(19, 22, 3004, 'ST16001A', 56, 'dfsdfsdf', 'Updated'),
(20, 22, 3004, 'ST16543P', 48, 'cbsdb', 'Rejected'),
(21, 7, 1004, 'ST16001A', 30, '', ''),
(23, 8, 3001, 'ST16234B', 60, NULL, '');

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
  `cumulative_GPA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentName`, `student_Nric`, `studentPassword`, `password_date`, `email`, `birth_Date`, `address`, `status`, `courseID`, `admission_Year`, `cumulative_GPA`) VALUES
('ST16001A', 'New Student', 'NRIC', 'test', '0000-00-00', '', '2016-10-02', 'Singapore', 'Enroll', 3104, 2016, 0),
('ST16234B', 'John', 'S93123345G', 'test', '0000-00-00', '', '1993-05-17', 'Jurong', 'Graduate', 3104, 2016, 0),
('ST16543P', 'Tim', 'S9178934D', 'test', '0000-00-00', '', '1991-02-20', 'Woodlands', 'Pre Enroll', 3104, 2017, 0),
('ST16549H', 'Jane Hi', 'S9623456F', 'test', '0000-00-00', '', '1996-11-23', 'CCK', 'Un-Enroll', 3313, 2016, 0),
('ST16693T', 'Jerry', 'S8934567K', 'test', '0000-00-00', '', '1989-10-10', 'Tuas', 'Enroll', 3512, 2016, 0),
('ST16789K', 'Tom', 'S9434567K', 'test', '0000-00-00', '', '1994-04-10', 'Potong Pasir', 'Expel', 3512, 2016, 0),
('ST34543', 'Tamago', 'S8721415C', '$2y$10$gtK75Qbse3EPoc.AvVqvquSlAeojYv/yHw4sqDcPdwu7TyocjFJFG', '2016-11-16', 'tamago@gmail.com', '1987-05-10', 'Hougang', 'Enroll', 3313, 2018, 0),
('ST44567', 'Bobbin', 'S9045653H', '$2y$10$faJ5RabDZkEd5y6gvSe71OGw9nOYf8W76qvggOu.yw7icnvqlWBAK', '2016-11-17', 'bobbin@gmail.com', '1990-11-04', 'Kallang', 'Default', 3104, 2015, 0),
('ST67876', 'Pekoms', 'S8963342H', '$2y$10$QUrTWFK6hwHbMNhAw/0igOPPSgBiJsBJJGwHyVG73dOtjKpVAI4F2', '2016-11-16', 'pekoms@gmail.com', '1989-11-07', 'Sengkang', 'Enroll', 3104, 2016, 0);

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
(4, 'Class Test 1', 'Pending', 1003, 'LT16348Q', '0000-00-00'),
(7, 'Test 1', 'Updated', 1004, 'LT16404H', '0000-00-00'),
(8, 'Class Test 2', 'Pending', 3001, 'LT16866H', '0000-00-00'),
(17, 'Mid Term 1', 'Pending', 1002, 'LT16866H', '0000-00-00'),
(18, 'Test 2', 'Pending', 1004, 'LT16404H', '0000-00-00'),
(19, 'Class Test 1', 'Pending', 3004, 'LT16404H', '0000-00-00'),
(20, 'Quiz 1', 'Updated', 3004, 'LT16404H', '0000-00-00'),
(21, 'Example Test', 'Pending', 1001, 'LT16866H', '0000-00-00'),
(22, 'Quiz 2', 'Published', 3004, 'LT16404H', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', '$2y$10$HMghITu3pOrPw5OJWfI/H.2dQwdrlO.VtzMdX4yE4hyq8MtQZbtZu', 'Admin', 'hqeVAwg7uqyO6z7kgtSFvxaPEdYq9WKqRS9leD2VFgG5O3pe3MY0ww9fHXKr', '2016-10-27 01:11:34', '2016-11-19 21:25:46'),
(3, 'Lecturer', '$2y$10$m63hJ9/IObr2iJohMCckDOXI9SDkyCrIzy2jisCDbnD1vLg10/utu', 'Lecturer', 'ZJ7eJLmAbmhcMkTd0FqAF9xrUYRfA63DDs6BIiUJDyHEmFEwn9HX0ptrbyW7', '2016-10-27 01:09:42', '2016-11-02 07:33:55'),
(4, 'S7Z', '$2y$10$yp/2Zevltrh1wv4U08zMdOvCV2nhk1cpEXQP3bNHGlBT30dh1S9JC', 'Hod', 'R3LZKzzkwlDrfYqJvC3CzKr8cNHMHDSDcYRIh5j3766ps4V7zd0avrOtSL6Z', '2016-10-27 01:07:07', '2016-10-27 01:07:07'),
(5, 'New Student', '$2y$10$S2oHSjtXbw5JpbJKlBDJ3.7UOloqr05JOYRnT0xAZvnfaQxjl.epm', 'Student', NULL, '2016-11-02 00:58:52', '2016-11-02 00:58:52'),
(32, 'LT16090S', '$2y$10$UJVGUooDamOCnEqrzIB4oOsJgYjm0beYdCt4Wrf35pZ6d.QvwCMGS', 'Hod', '9Tg6QGVtpxMmWnIQM8mZ7SGREKzo9PPAcfJHg7N4RC1xjZ1xrxXOxFX8ls4g', '2016-11-02 07:40:43', '2016-11-19 21:26:22'),
(33, 'LT16505L', '$2y$10$qHLg67SoFIK3uMGPzUfbgekRWClDI9EV7jRQeLrvF1Hg5p3/F.GqC', 'Hod', '8IuarePD0iZbCMfwz0DMRcf6zaUYsbyAdRpYkkTcVM4U8xsrO92X0wpK1wFL', '2016-11-02 07:40:43', '2016-11-17 07:09:26'),
(34, 'LT16521Y', '$2y$10$qd4Hc0H4BroVXteV3fLd.u5CwV41yJUY6YuaKfXPbSRZ.zLCbI68.', 'Hod', 'D7HyNU9XYscxXOuSL7vD0K6dXxT7BeXQPraxASGSxJgSSYvJg7WiKqKVDorF', '2016-11-02 07:40:44', '2016-11-10 09:20:24'),
(35, 'LT16700P', '$2y$10$KHVCCnsm6tu8jQCi2M4DReVdNWzY75ECw80kTziY4JzyVdvgtyVOm', 'Hod', NULL, '2016-11-02 07:40:44', '2016-11-02 07:40:44'),
(36, 'LT16005H', '$2y$10$8vV6l/aRHvb/qCzo9m5i3OWrcI3.4FZaHN2MVNLB7sYymIVH3k0Sa', 'Lecturer', 'KPfZDRsltVKmBzDQRPfzxmizRzx7tuNmIj49wJNVcZ0C8vtYtGdjWcygDc4L', '2016-11-02 07:41:03', '2016-11-17 19:11:20'),
(37, 'LT16348Q', '$2y$10$HPMJjE0v9dTDj/2ISjGynOWgjURTfhfuqQtVjGfIn3lj0t1i5UbM2', 'Lecturer', NULL, '2016-11-02 07:41:03', '2016-11-02 07:41:03'),
(38, 'LT16404H', '$2y$10$Ahu9Fuab.a5EoYNC4Cn.2uDIIngFmr7kZB/Fxe2oes.rQCDHkDyE.', 'Lecturer', 'vWesxe3AgnJy4gKtaWKt3HXkUPMMJLMoPdfQMWX0HeqeD4qwLCyWyjd88swK', '2016-11-02 07:41:04', '2016-11-19 21:25:00'),
(39, 'LT16449D', '$2y$10$i1N0om0u52bKbIUqZiiP/.GmNDS3WyMH/gkmdHPkqV3u6Qms.GxXa', 'Lecturer', NULL, '2016-11-02 07:41:04', '2016-11-02 07:41:04'),
(40, 'LT16604O', '$2y$10$uXhOP3eHB/pWf98cEpjji.reZiw6JK8ehV.D4Nc8CeTMjJG.uZrqa', 'Lecturer', NULL, '2016-11-02 07:41:04', '2016-11-02 07:41:04'),
(41, 'LT16609B', '$2y$10$gtMw5RJory2A2tyeXxpuMOspatwOLw9bvZIR5xgOX8Dlpd45s18W.', 'Lecturer', NULL, '2016-11-02 07:41:04', '2016-11-02 07:41:04'),
(42, 'LT16866H', '$2y$10$8Wb9F2a76cbd2GF0de/YqeHhNGdBq5QTO7SPTJ7.qcRqCYdlKnW6m', 'Lecturer', 'v0t9HRl5RgmpjCxBGORm4FFynS3U8ydafrQWnqZ4CmWCkLMB2okA6d72uZEt', '2016-11-02 07:41:04', '2016-11-02 07:42:14'),
(43, 'ST16001A', '$2y$10$sY0ijvBNntL2HS0BAA62N.zbj6WlUJj1gsv2q5vWar6LbNEAR9R5W', 'Student', NULL, '2016-11-02 07:41:51', '2016-11-02 07:41:51'),
(44, 'ST16234B', '$2y$10$RZBvaEqB0Uibvep9C79QguGxk4R0VeqRV5vyYKTeweCj7EISGD7km', 'Student', 'nmiq2anYrBE8c29xtJZGNR0ZJvGeAnO6e02BAorN6C42ISWl4EWXJmPbhd4s', '2016-11-02 07:41:52', '2016-11-19 21:26:34'),
(45, 'ST16543P', '$2y$10$cdY6Gi2gd4xusGL7WkAtqOZ/iK1F2oAgRjMsBkhHs3u06K7WreDlS', 'Student', NULL, '2016-11-02 07:41:52', '2016-11-02 07:41:52'),
(46, 'ST16549H', '$2y$10$A3JhLDHGhzyBeUlNrA1XOOE9lqfGnyVHyrzTdgltNFlgK4Xd/0Gp.', 'Student', 'vg3rmIOEuyGFyqpYmOslduFDWQWeiX7QRLFa7yV3VEnHJ3V05ExorRcOR5ji', '2016-11-02 07:41:52', '2016-11-02 07:47:39'),
(47, 'ST16693T', '$2y$10$PfEJXC9cKSyxyaXrwu3YOewGLONhJ9pEExbe9vYr5a6ZDAuIUFQ1a', 'Student', 'cWNaaP1Sv9TzYiHp8hSkxR8o3cjAzX1OnYWxuHQtTG0IEAfoVf5gjKWXhzF1', '2016-11-02 07:41:52', '2016-11-13 23:46:48'),
(48, 'ST16789K', '$2y$10$G.1U/F7hAooO2/kh38kwA.5F/xTvz6Snw3n0irCzPj3bo/sWMUpKW', 'Student', NULL, '2016-11-02 07:41:52', '2016-11-02 07:41:52'),
(50, 'ST67876', '$2y$10$QUrTWFK6hwHbMNhAw/0igOPPSgBiJsBJJGwHyVG73dOtjKpVAI4F2', 'Student', NULL, '2016-11-16 03:42:29', '2016-11-16 03:42:29'),
(51, 'LT12125K', '$2y$10$4n7SUSJ/JP6Xikm15cYL5.bdInG/6/N2qz3QV86QuLSNZ4qEKbv.m', 'Lecturer', 'rSTJVSOCGLZ2tn1v37LLizKOJBtTuaCuOKdLkWLnGVFgbC7VCt0CHP6CP6nw', '2016-11-16 03:46:55', '2016-11-17 07:10:18'),
(52, 'ST44567', '$2y$10$faJ5RabDZkEd5y6gvSe71OGw9nOYf8W76qvggOu.yw7icnvqlWBAK', 'Student', 'MkNVWuAxinBOx0bAhii9WNYQIUzIjmztLnGNX0VfHJRRDaauOOKYalt4kwgU', '2016-11-16 03:57:55', '2016-11-17 07:28:42'),
(53, 'ST34543', '$2y$10$gtK75Qbse3EPoc.AvVqvquSlAeojYv/yHw4sqDcPdwu7TyocjFJFG', 'Student', 'YprqwfrnlfVJ5AmiA0C1FNRSViiv5HozjKSq2zLEuX8q2D5J6s1qydV1HCIF', '2016-11-16 06:56:26', '2016-11-15 22:56:45');

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumniID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `resultID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
