-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2016 at 02:14 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_blo`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `user_id`, `created_at`, `image_path`) VALUES
(27, 'Top 5 Best Security Plugin', 'Hi Guys,\r\nPlease take a look at Best Security Plugin for WordPress.\r\n1. Wordfence\r\nWordFence is one of the most popular WordPress security plugins. It keeps on checking your website for malware infection. If scans all the files of your WordPress core, theme and plugins. If it finds any kind of infection, it will notify you. It claims to make your WordPress website 50 times faster and secure. For making your website faster, it uses Falcom caching engine. This plugin is free, but a few advanced features are available for premium users. If you can afford it, do it.', 1, '2016-08-24 12:29:11', 'http://localhost:81/ci_blog/uploads/1470219462_desktop.png'),
(28, 'Web Development', 'Web development is a broad term for the work involved in developing a web site for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing the simplest static single page of plain text to the most complex web-based internet applications, electronic businesses, and social network services. ', 1, '2016-08-26 07:45:14', 'http://localhost:81/ci_blog/uploads/1470219462_desktop1.png'),
(29, 'Codeigniter Introduction', 'This tutorial is intended to introduce you to the CodeIgniter framework and the basic principles of MVC architecture. It will show you how a basic CodeIgniter application is constructed in step-by-step fashion.', 5, '2016-08-27 13:47:09', 'http://localhost:81/ci_blog/uploads/1470219730_81.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `pword` varchar(255) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `uname`, `pword`, `fname`, `lname`, `profile_pic`) VALUES
(1, 'umakantsonwani@gmail.com', 'admin', 'developer@123web', 'Umakant', 'Sonwani', ''),
(5, 'monika@gmail.com', 'monika', '123456789', 'Monika', 'Takhur', 'http://localhost:81/ci_blog/uploads/1470219542_news1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
