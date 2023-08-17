-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-08-17 12:42:50
-- 服务器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `iadb`
--
CREATE DATABASE IF NOT EXISTS `iadb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iadb`;
-- --------------------------------------------------------

--
-- 表的结构 `pdf`
--

CREATE TABLE `pdf` (
  `pdfID` int(11) NOT NULL,
  `fileName` varchar(200) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `pdfDescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `pdf`
--

INSERT INTO `pdf` (`pdfID`, `fileName`, `userName`, `pdfDescription`) VALUES
(12, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(13, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(14, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(15, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(16, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(17, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(18, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(19, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(20, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(21, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(22, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(23, 'IA04.pdf', 'Ca', 'sadaksdkjsa'),
(24, '220042782_transcript.pdf', 'sdsa', 'sad');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` varchar(200) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userID`, `Name`, `email`, `password`, `group`) VALUES
(1, 'Steve Chan', 'ABC@gmail.com', '123', 'member'),
(2, 'ABC', '', '123', 'member'),
(3, 'GDJ', '', '255', ''),
(14, '', 'abcd20031007@gmail.com', '0', 'member'),
(15, 'sd4f5', '12315@gmail.com', '0', 'member'),
(16, 'ABC', '132@gmail.com', '$2y$10$YF70koykZeWYkN3hc8F39.6gPXw2w1qT08NDiyKo2xrzqA.pmds92', 'member'),
(17, 'asdasd', 'asdasd@gmail.com', '$2y$10$W7cdojfSascr2CdLZz1u8uujufEor9V4te3X.yGYH79emP12UZSKu', 'member'),
(18, 'asd', 'sad@gmail.com', '$2y$10$Hs8q6y7oO4tm8iOy7TtY5OhdBbu7jEcp1GSvtxfJ168Bd/k29n6h.', 'member');

--
-- 转储表的索引
--

--
-- 表的索引 `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`pdfID`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `pdf`
--
ALTER TABLE `pdf`
  MODIFY `pdfID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
