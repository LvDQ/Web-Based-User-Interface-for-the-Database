-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-04-25 17:50:54
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- 表的结构 `User`
--

CREATE TABLE `User` (
  `UID` int(10) UNSIGNED NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `Photo` blob,
  `Phone` bigint(11) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Intro` longtext,
  `ProfileURL` text,
  `PostURL` text,
  `Sign_up_Time` datetime NOT NULL,
  `LastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `User`
--

INSERT INTO `User` (`UID`, `Email`, `Password`, `Username`, `Age`, `Gender`, `Photo`, `Phone`, `Address`, `Intro`, `ProfileURL`, `PostURL`, `Sign_up_Time`, `LastLogin`) VALUES
(1, 'cl123@nyu.edu', 'asw1234', 'Chao Lee', 24, 'male', NULL, 7852874555, '343 Gold Street', 'I am a graduate student in NYU Tandon School of Engineering. I like surfing and hiking.', NULL, NULL, '2017-03-01 00:00:00', '2017-03-29 15:12:25'),
(2, 'hz563@nyu.edu', 'ym12900', 'Amy', 21, 'female', NULL, 2123332566, '235w Apt 4B, NY 10025', 'I am a student in NYU Tandon School. I like go hiking and biking.', NULL, NULL, '2014-03-22 00:00:00', '2017-03-30 14:51:46'),
(3, 'kl816@nyu.edu', 'wwwq098', 'Li Yang', 26, 'male', NULL, 1351106756, '343 Gold Street, Brooklyn', 'NYU School faculty', NULL, NULL, '2017-02-08 09:13:22', '2017-03-30 14:44:18'),
(4, 'hc1121@gmail.com', 'hc11211', 'Chris Harrison', 31, 'male', NULL, 13511617990, 'Harford Ave, Santa Clara, CA', NULL, NULL, NULL, '2016-09-16 18:32:44', '2017-03-30 14:48:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `User`
--
ALTER TABLE `User`
  MODIFY `UID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
