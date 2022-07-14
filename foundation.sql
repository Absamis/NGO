-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 08:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `cmtpost` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `cmtpost`, `date`) VALUES
(1, 'adebiyi abdulsamod', 'i love this foundation', 'FXrzmoQ73teTk', '27-06-2021'),
(2, 'samuel ajiki', 'this is a good thing in the community', 'FXrzmoQ73teTk', '27-06-2021'),
(3, 'aderibigbe samson', 'this is realy nice', 'dfU45uv8KZgWc', '27-06-2021'),
(4, 'oreoluwa', 'i lova this post', 'zP3GuDyXOoM2a', '28-06-2021');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `caption` text NOT NULL,
  `image_link` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `caption`, `image_link`, `author`, `date`) VALUES
(1, 'members in a nice party', 'WIN_20210525_11_55_40_Pro.jpg', 'admin', '25-06-2021'),
(2, 'people in the class', 'WIN_20210525_11_55_29_Pro.jpg', 'admin', '28-06-2021'),
(3, 'people in the class', 'WIN_20210525_11_55_29_Pro.jpg', 'admin', '28-06-2021');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `username`, `password`) VALUES
(1, 'admin', '365e94a66520204eb76f40e154ac05ee60c45057');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` tinytext NOT NULL,
  `messsage` text NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `messsage`, `date`) VALUES
(1, 'adebiyi abdulsamod', 'smallkid1@yahoo.com', '09089878765', 'i need to let you know about my health', '28-06-2021'),
(2, 'adebiyi abdulsamod', 'smallkid1@yahoo.com', '09089878765', 'i need to let you know about my health', '28-06-2021'),
(3, 'adebiyi abdulsamod', 'smallkid1@yahoo.com', '09089878765', 'this is', '05-07-2021');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `postid` varchar(15) NOT NULL,
  `image_link` text NOT NULL,
  `video_link` text NOT NULL,
  `time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `date`, `postid`, `image_link`, `video_link`, `time`) VALUES
(1, 'adeyemi adebayo foundation helps a child in akure', 'this is to tell the world how happy the less priviledge is when you help them out. \r\nit isa sign of joy to make it appropriate for the people in the comunity', 'admin', '25-06-2021', 'FXrzmoQ73teTk', 'img_2.jpg', 'none', '09:00AM'),
(2, 'the peaceful party held in california with aaf members', 'this party is a successive party in the world of parties. it was held in the most decent hall of california, along with aaf members', 'admin', '27-06-2021', 'dfU45uv8KZgWc', '25-givers-and-takers.jpg', '2021-06-24-04-06-19.mp4', '10:07PM'),
(3, 'people around village talk about me', 'the people in the village are too local', 'admin', '28-06-2021', 'zP3GuDyXOoM2a', 'WIN_20210616_02_08_31_Pro.jpg', 'none', '14:20 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `postid` (`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
