-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2014 at 04:20 PM
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
  `application_content` text NOT NULL,
  `application_supporting_documents` text NOT NULL COMMENT 'filename of a zip',
  `application_conf_url` text NOT NULL,
  `conf_start_date` date NOT NULL,
  `conf_end_date` date NOT NULL,
  `travel_start_date` date NOT NULL,
  `travel_end_date` date NOT NULL,
  `quality_of_paper` text NOT NULL,
  `paper_accepted` tinyint(1) NOT NULL,
  `conf_confirmation_attached` tinyint(1) NOT NULL,
  `peer_review_attached` tinyint(1) NOT NULL,
  `copy_of_paper_attached` tinyint(1) NOT NULL,
  `special_invitation` tinyint(1) NOT NULL,
  `special_duties` text NOT NULL,
  `pep_arrangement_details` text NOT NULL,
  `research_grant` tinyint(1) NOT NULL,
  `research_student` tinyint(1) NOT NULL,
  `research_strength` text NOT NULL,
  `research_strength_travel_support` tinyint(1) NOT NULL,
  `funding_stage` enum('Stage 1','Stage 2','Stage 3') NOT NULL,
  `supervisor_has_grant` tinyint(1) NOT NULL,
  `vc_conference_fund` int(11) NOT NULL,
  `request_air_fare` int(11) NOT NULL,
  `request_accomodation` int(11) NOT NULL,
  `request_conf_fees` int(11) NOT NULL,
  `request_meals` int(11) NOT NULL,
  `request_local_fares` int(11) NOT NULL,
  `request_car_mileage` int(11) NOT NULL,
  `request_other` int(11) NOT NULL,
  `request_total` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='An application is made by a traveller to chair members' AUTO_INCREMENT=32 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `application_user`, `application_status`, `application_date`, `application_content`, `application_supporting_documents`, `application_conf_url`, `conf_start_date`, `conf_end_date`, `travel_start_date`, `travel_end_date`, `quality_of_paper`, `paper_accepted`, `conf_confirmation_attached`, `peer_review_attached`, `copy_of_paper_attached`, `special_invitation`, `special_duties`, `pep_arrangement_details`, `research_grant`, `research_student`, `research_strength`, `research_strength_travel_support`, `funding_stage`, `supervisor_has_grant`, `vc_conference_fund`, `request_air_fare`, `request_accomodation`, `request_conf_fees`, `request_meals`, `request_local_fares`, `request_car_mileage`, `request_other`, `request_total`) VALUES
(31, 1, 'Pending', '2014-11-04 23:45:32.000000', 'see the stuff and do the ethings', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, 0, 0, 0, '', '', 0, 0, '', 0, 'Stage 1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
-- Table structure for table `travel_details`
--

CREATE TABLE IF NOT EXISTS `travel_details` (
  `conference_paper` tinyint(1) NOT NULL,
  `journal_paper` tinyint(1) NOT NULL,
  `name_details` text NOT NULL,
  `url` varchar(50) NOT NULL,
  `conf_start` date NOT NULL,
  `conf_end` date NOT NULL,
  `travel_start` date NOT NULL,
  `travel_end` date NOT NULL,
  `conf_country` text NOT NULL,
  `conf_region` text NOT NULL,
  `conf_city` text NOT NULL,
  `conf_quality_A` tinyint(1) NOT NULL,
  `conf_quality_B` tinyint(1) NOT NULL,
  `conf_quality_Other` tinyint(1) NOT NULL,
  `comment_quality` text NOT NULL,
  `title` text NOT NULL,
  `paper_accepted` tinyint(1) NOT NULL,
  `paper_attached` text NOT NULL,
  `herdc_points` tinyint(1) NOT NULL,
  `travel_justification` text NOT NULL,
  `duties` text NOT NULL,
  `arrangements` text NOT NULL,
  `supporting_docs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(11) unsigned NOT NULL,
  `user_type` int(11) unsigned NOT NULL COMMENT 'foreign key',
  `username` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL,
  `user_recovery_question` text NOT NULL,
  `user_recovery_answer` text NOT NULL,
  `user_school` text NOT NULL,
  `user_supervisor` text NOT NULL,
  `user_email` text NOT NULL,
  `user_phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_type`, `username`, `password`, `full_name`, `user_recovery_question`, `user_recovery_answer`, `user_school`, `user_supervisor`, `user_email`, `user_phone`) VALUES
(1, 1, 'user', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Frank User', '', '', '', '', '', ''),
(2, 1, 'user2', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Not so Frank User', '', '', '', '', '', ''),
(3, 2, 'chairmem', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Dr Franke Roosevelt', '', '', '', '', '', ''),
(4, 3, 'chairman', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Mao', '', '', '', '', '', '');

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
(2, 'committee_member', 'committee_member.php'),
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
MODIFY `application_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
