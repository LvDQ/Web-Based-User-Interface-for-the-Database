-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-04-25 17:51:42
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
-- 表的结构 `Post`
--

CREATE TABLE `Post` (
  `PostID` int(11) NOT NULL,
  `PosterID` int(11) NOT NULL,
  `PrivacyType` varchar(45) DEFAULT NULL,
  `PostTime` datetime NOT NULL,
  `Title` text,
  `Body` longblob,
  `Location` varchar(45) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Post`
--

INSERT INTO `Post` (`PostID`, `PosterID`, `PrivacyType`, `PostTime`, `Title`, `Body`, `Location`, `Rating`) VALUES
(1, 3, 'Publuc', '2017-03-11 20:11:53', 'Hiking Activity', NULL, 'Santa Clara', NULL),
(11, 2, 'Public', '2017-03-29 15:31:16', 'Hiking Group', NULL, 'NY', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`PostID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `Post`
--
ALTER TABLE `Post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
