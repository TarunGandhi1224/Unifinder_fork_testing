-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-12-15 22:59:26
-- 服务器版本： 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unifinder`
--

-- --------------------------------------------------------

--
-- 表的结构 `cities`
--

CREATE TABLE `cities` (
  `city_id` int(3) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_state_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_state_id`) VALUES
(1, 'Jersey City', 2),
(2, 'New York City', 1),
(6, 'Hoboken', 2),
(9, 'Boston', 6);

-- --------------------------------------------------------

--
-- 表的结构 `states`
--

CREATE TABLE `states` (
  `state_id` int(3) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `state_short_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `state_short_name`) VALUES
(1, 'New York', 'NY'),
(2, 'New Jersey', 'NJ'),
(6, 'Massachusetts', 'MA');

-- --------------------------------------------------------

--
-- 表的结构 `universities`
--

CREATE TABLE `universities` (
  `uni_id` int(5) NOT NULL,
  `uni_name` varchar(255) NOT NULL,
  `uni_intro` text NOT NULL,
  `uni_state_id` int(5) NOT NULL,
  `uni_city_id` int(5) NOT NULL,
  `uni_homepage` varchar(255) NOT NULL,
  `uni_image` text NOT NULL,
  `uni_gpa` float NOT NULL,
  `uni_toefl` int(10) NOT NULL,
  `uni_tags` varchar(255) NOT NULL,
  `uni_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `universities`
--

INSERT INTO `universities` (`uni_id`, `uni_name`, `uni_intro`, `uni_state_id`, `uni_city_id`, `uni_homepage`, `uni_image`, `uni_gpa`, `uni_toefl`, `uni_tags`, `uni_date`) VALUES
(1, 'Pace University', 'Welcome to Pace University!', 1, 2, 'www.pace.edu.com', 'Pace.jpeg', 3, 85, 'Pace, New York City, NY', '2017-11-15'),
(2, 'New York University', 'This is New York University', 1, 2, 'www.nyu.edu', 'NYC.png', 3.8, 110, 'New York University, New York City, NY', '2017-11-15'),
(3, 'Fordham University', 'This is Fordham University!!!!', 1, 2, 'https://www.fordham.edu/', 'Fordham.png', 4, 100, 'Fordham University, New York City, NY', '2017-11-15'),
(4, 'Boston University', 'This is Boston University', 6, 9, 'http://www.bu.edu/', '', 3, 70, 'Boston University, Boston, MA', '2017-11-15'),
(5, 'Massachusetts Institute of Technology', 'This is Massachusetts Institute of Technology!!!!!', 6, 9, 'http://web.mit.edu/', '', 4, 100, 'Massachusetts Institute of Technology, MIT, Boston,MA', '2017-11-15'),
(6, 'Harvard University', 'This is Harvard University!!!!!', 6, 9, 'https://www.harvard.edu/', '', 4, 100, 'Harvard University, Boston, MA', '2017-11-15'),
(7, 'Stevens Institute of Technology', 'This is Stevens Institute of Technology!!!', 2, 6, 'https://www.stevens.edu/', 'stevens-institute-of-technology.gif', 3.5, 100, 'Hoboken, Steven, NJ ', '2017-11-15');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_state` int(5) NOT NULL DEFAULT '0',
  `user_city` int(5) DEFAULT '0',
  `user_gpa` float NOT NULL,
  `user_toefl` int(5) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_state`, `user_city`, `user_gpa`, `user_toefl`, `user_image`, `user_role`, `randSalt`) VALUES
(13, 'zyhdmt', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'Yuhao', 'Zhuang', 'zyhdmt@gmail.com', 0, 0, 0, 0, '', 'admin', '$2y$10$iusesomecrazystrings22'),
(19, 'demo', '$2y$10$iusesomecrazystrings2uWxe2GuNFtAsV7xlqtowXPEb425oSTZ2', 'demo', 'zhuang', 'demo@gmail', 1, 2, 4, 120, '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(28, 'demo2', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'demo', 'demodemo', 'demo2@gmail.com', 6, 9, 3.7, 110, '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(30, 'demo4', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'dem', 'O', 'demo4@gmail.com', 1, 2, 4, 105, '', 'subscriber', '$2y$10$iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`uni_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `universities`
--
ALTER TABLE `universities`
  MODIFY `uni_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
