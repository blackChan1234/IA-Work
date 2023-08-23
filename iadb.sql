-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-08-23 14:43:14
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `iadb`
--
DROP DATABASE iadb;
CREATE DATABASE IF NOT EXISTS `iadb`;
USE `iadb`;
-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `No` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `ContactInformation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`No`, `FullName`, `Description`, `ContactInformation`) VALUES
(1, 'Mark Chan', 'The survey results show that students most often watch videos, play games', '55441124'),
(2, 'Jack Chau', 'Students will go online immediately after .', '95641127');

-- --------------------------------------------------------

--
-- 資料表結構 `pdf`
--

CREATE TABLE `pdf` (
  `pdfID` int(11) NOT NULL,
  `fileName` varchar(200) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `pdfDescription` varchar(200) NOT NULL,
  `uploadDate` date NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `pdf`
--

INSERT INTO `pdf` (`pdfID`, `fileName`, `userName`, `pdfDescription`, `uploadDate`, `type`) VALUES
(1, 'IA04-proposal.pdf', 'sea', 'IA04 proposal', '2023-08-23', 'proposal'),
(2, 'IA04-program.pdf', 'nam', 'IA04-program', '2023-08-24', 'program'),
(3, 'IA04-report.pdf', 'mars', 'IA04-report', '2023-08-25', 'report'),
(4, 'IA04-minutes.pdf', 'owl', 'IA04-minutes', '2020-12-01', 'minutes'),
(5, 'IA04-data.pdf', 'sea', 'IA04-data', '2023-08-15', 'data');

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `p_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `p_time` varchar(100) NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_description` mediumtext NOT NULL,
  `p_category` varchar(110) NOT NULL,
  `p_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `post`
--

INSERT INTO `post` (`p_id`, `heading`, `details`, `p_time`, `p_img`, `p_description`, `p_category`, `p_user`) VALUES
(1, 'abc', '<p>sadbasjd</p>', '1625989309', '1.jpeg', 'asdasdasdasdasd', 'asdsd', 'chan');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` varchar(200) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
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
-- 已傾印資料表的索引
--

--
-- 資料表索引 `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`pdfID`);

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pdf`
--
ALTER TABLE `pdf`
  MODIFY `pdfID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

CREATE TABLE `password_reset_requests` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL,
  `expiry_date` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
