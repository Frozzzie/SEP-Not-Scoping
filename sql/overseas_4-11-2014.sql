-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2014 at 07:46 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `overseas`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
`application_id` int(11) unsigned NOT NULL,
  `application_user` int(11) NOT NULL,
  `application_status` enum('Pending','Accepted','Rejected') NOT NULL,
  `application_date` datetime(6) NOT NULL,
  `application_content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='An application is made by a traveller to chair members' AUTO_INCREMENT=22 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `application_user`, `application_status`, `application_date`, `application_content`) VALUES
(14, 1, 'Pending', '2014-11-04 16:46:58.000000', 'login-action.php'),
(15, 1, 'Pending', '2014-11-04 16:47:15.000000', 'login-action.php'),
(16, 1, 'Pending', '2014-11-04 16:48:00.000000', 'login-action.php');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL,
  `post_from` int(11) NOT NULL COMMENT 'Who made this post/comment',
  `post_to` int(11) NOT NULL COMMENT 'The application this post is posted to',
  `post_content` text NOT NULL,
  `post_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Comments made about applications';

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(11) unsigned NOT NULL,
  `user_type` int(11) unsigned NOT NULL COMMENT 'foreign key',
  `username` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_type`, `username`, `password`, `full_name`) VALUES
(1, 1, 'user', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Frank User'),
(2, 1, 'user2', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Not so Frank User'),
(3, 2, 'chairmem', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Dr Franke Roosevelt'),
(4, 3, 'chairman', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Mao');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `type_id` int(11) unsigned NOT NULL,
  `type_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type_page` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`type_id`, `type_name`, `type_page`) VALUES
(1, 'traveller', 'traveller.php'),
(2, 'committee_member', 'comittee_member.php'),
(3, 'Committee Chair', 'committee_chair.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
 ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
 ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
MODIFY `application_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
