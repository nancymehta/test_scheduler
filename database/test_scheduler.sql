-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2013 at 10:23 AM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`,`updated_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_taker_id` int(11) NOT NULL,
  `issued` tinyint(4) NOT NULL COMMENT '0 is issued before 1 is not issued before',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_taker_id` (`test_taker_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_type` varchar(30) NOT NULL COMMENT 'equivalent to column name',
  `code_value` varchar(30) NOT NULL COMMENT 'equivalent to column value',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `code_type`, `code_value`) VALUES
(1, 'gender', 'male'),
(2, 'gender', 'female'),
(3, 'type_of_org', 'institution'),
(4, 'type_of_org', 'company'),
(5, 'ques_type', 'mcq'),
(6, 'ques_type', 'tf'),
(7, 'ques_type', 'checkbox'),
(8, 'per_page_ques', '1'),
(9, 'per_page_ques', '2'),
(10, 'per_page_ques', '3'),
(11, 'per_page_ques', '4'),
(12, 'per_page_ques', '5'),
(13, 'per_page_ques', '6'),
(14, 'per_page_ques', '7'),
(15, 'per_page_ques', '8'),
(16, 'per_page_ques', '9'),
(17, 'per_page_ques', '10');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL COMMENT 'question asked by the person',
  `ques_type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'validate_users id ',
  `feedback` varchar(100) NOT NULL COMMENT 'feedback provided by the user',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ques_type_id` (`ques_type_id`),
  KEY `category_id` (`category_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE IF NOT EXISTS `question_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques_id` int(11) NOT NULL,
  `option` text NOT NULL,
  `correct` tinyint(4) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ques_id` (`ques_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `total_ques` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE IF NOT EXISTS `test_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `no_of_ques` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`,`cat_id`),
  KEY `cat_id` (`cat_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_link`
--

CREATE TABLE IF NOT EXISTS `test_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'test link id',
  `test_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `link` varchar(150) NOT NULL,
  `random` tinyint(1) NOT NULL,
  `per_page_ques` int(11) NOT NULL,
  `feedback` tinyint(1) NOT NULL,
  `score` tinyint(1) NOT NULL,
  `email_results` tinyint(1) NOT NULL,
  `collect_firstname` tinyint(1) NOT NULL,
  `collect_lastname` tinyint(1) NOT NULL,
  `collect_email_enroll` tinyint(1) NOT NULL,
  `test_avail_opt1` tinyint(1) NOT NULL,
  `test_avail_opt2` tinyint(1) NOT NULL,
  `display_result_id` tinyint(1) NOT NULL,
  `certificate` tinyint(1) NOT NULL,
  `no_of_attempts` tinyint(3) NOT NULL,
  `certificate_id` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL COMMENT 'time limit  in minutes',
  `select_answer` tinyint(1) NOT NULL,
  `pass_marks` int(3) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `per_page_ques` (`per_page_ques`),
  KEY `certificate_id` (`certificate_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_taker`
--

CREATE TABLE IF NOT EXISTS `test_taker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_link_id` int(11) NOT NULL,
  `email_enroll_no` varchar(50) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `test_id` int(11) NOT NULL,
  `ques_attempted` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_link_id` (`test_link_id`,`test_id`),
  KEY `test_id` (`test_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_taker_ques`
--

CREATE TABLE IF NOT EXISTS `test_taker_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_taker_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `answer_given` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_taker_id` (`test_taker_id`,`ques_id`),
  KEY `ques_id` (`ques_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL COMMENT 'first name of user',
  `last_name` varchar(20) NOT NULL COMMENT 'last name of user',
  `date_of_birth` date NOT NULL COMMENT 'birth date of user',
  `email` varchar(30) NOT NULL COMMENT 'email address of user',
  `type_of_org_id` int(1) NOT NULL,
  `gender_id` int(1) NOT NULL,
  `address` varchar(50) DEFAULT NULL COMMENT 'user address ',
  `phone` varchar(20) DEFAULT NULL COMMENT 'user phone number',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'time on which user created',
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_of_org` (`type_of_org_id`,`gender_id`),
  KEY `gender` (`gender_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `validate_users`
--

CREATE TABLE IF NOT EXISTS `validate_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` enum('0','1') NOT NULL COMMENT '0 is for admin & 1 is for user',
  `terms_conditions` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 is for unchecked & 1 is for checked',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 is for inactive & 1 is for active',
  `session_id` varchar(30) NOT NULL COMMENT 'this fiel will be used to store session id',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'time of creation of the user',
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'user validation details updated',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_43` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`test_taker_id`) REFERENCES `test_taker` (`id`),
  
  ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_44` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`ques_type_id`) REFERENCES `master` (`id`),
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `question_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_ibfk_43` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_options_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `question` (`id`),
  
  ADD CONSTRAINT `question_options_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  
--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_42` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `test_category`
--
ALTER TABLE `test_category`
  ADD CONSTRAINT `test_category_ibfk_44` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_category_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`),
  ADD CONSTRAINT `test_category_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
 
  ADD CONSTRAINT `test_category_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `test_category` (`id`);
 
--
-- Constraints for table `test_link`
--
ALTER TABLE `test_link`
  ADD CONSTRAINT `test_link_ibfk_45` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_link_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_link_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_link_ibfk_2` FOREIGN KEY (`per_page_ques`) REFERENCES `master` (`id`),
  ADD CONSTRAINT `test_link_ibfk_3` FOREIGN KEY (`certificate_id`) REFERENCES `certificate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `test_taker`
--
ALTER TABLE `test_taker`
  ADD CONSTRAINT `test_taker_ibfk_44` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ibfk_1` FOREIGN KEY (`test_link_id`) REFERENCES `test_link` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `test_taker_ques`
--
ALTER TABLE `test_taker_ques`
  ADD CONSTRAINT `test_taker_ques_ibfk_44` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ques_ibfk_1` FOREIGN KEY (`test_taker_id`) REFERENCES `test_taker` (`id`),
  ADD CONSTRAINT `test_taker_ques_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ques_ibfk_2` FOREIGN KEY (`ques_id`) REFERENCES `question` (`id`);
--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_45` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_profile_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`type_of_org_id`) REFERENCES `master` (`id`),
  ADD CONSTRAINT `user_profile_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `master` (`id`);
--
-- Constraints for table `validate_users`
--
ALTER TABLE `validate_users`
  ADD CONSTRAINT `validate_users_ibfk_42` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `validate_users_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
