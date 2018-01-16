-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-04-25 17:52:09
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
-- 表的结构 `Friends`
--

CREATE TABLE `Friends` (
  `FUID1` int(11) NOT NULL,
  `FUID2` int(11) NOT NULL,
  `FTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Friends`
--

INSERT INTO `Friends` (`FUID1`, `FUID2`, `FTime`) VALUES
(1, 2, '2017-03-29 15:45:59'),
(2, 1, '2017-03-29 16:07:28'),
(2, 3, '2017-03-29 16:29:48'),
(3, 2, '2017-03-30 15:08:00'),
(3, 4, '2017-03-30 15:10:22'),
(4, 3, '2017-03-30 15:10:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Friends`
--
ALTER TABLE `Friends`
  ADD PRIMARY KEY (`FUID1`,`FUID2`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
