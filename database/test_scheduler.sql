-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2013 at 05:52 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

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
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '''0 for active,1 for deleted,2 for inactive''',
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`,`updated_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='for storing category of the questions' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(1, 'PHP', '2013-05-10 05:55:17', '0000-00-00 00:00:00', 1, 1, '0'),
(2, 'MySql', '2013-05-10 05:55:17', '0000-00-00 00:00:00', 2, NULL, '0'),
(3, 'hfdghd', '0000-00-00 00:00:00', '2013-05-11 16:51:31', 1, 1, '0'),
(4, 'dsdsd', '0000-00-00 00:00:00', '2013-05-13 04:19:37', 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_id` int(11) NOT NULL,
  `test_taker_id` int(11) NOT NULL,
  `issued` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '0 is issued before ,1 is not issued before',
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_taker_id` (`test_taker_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `certificate_id` (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='for issuing certificates' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_master`
--

CREATE TABLE IF NOT EXISTS `certificate_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `upload_path` varchar(200) NOT NULL,
  `certificate_title` varchar(100) NOT NULL,
  `certificate_body` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='for the name of the certificates and its path' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `certificate_master`
--

INSERT INTO `certificate_master` (`id`, `name`, `upload_path`, `certificate_title`, `certificate_body`, `status`, `updated_on`, `created_on`, `created_by`, `updated_by`) VALUES
(1, 'MySql Certificate', '/var/www/upload/c1', '', '', '0', '2013-05-10 05:55:19', '0000-00-00 00:00:00', 2, NULL),
(2, 'Certificate for 1st ranker', '/var/www/upload/c1', '', '', '0', '2013-05-10 05:55:19', '0000-00-00 00:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='contact us table' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `description`) VALUES
(1, 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_type` varchar(30) NOT NULL COMMENT 'equivalent to column name',
  `code_value` varchar(30) NOT NULL COMMENT 'equivalent to column value',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='for constant column types and column values' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `code_type`, `code_value`, `status`, `created_on`, `updated_on`, `created_by`, `updated_by`) VALUES
(1, 'gender', 'male', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(2, 'gender', 'female', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(3, 'type_of_org', 'institution', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(4, 'type_of_org', 'company', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(5, 'ques_type', 'mcq', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(6, 'ques_type', 'tf', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(7, 'ques_type', 'checkbox', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(8, 'per_page_ques', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(9, 'per_page_ques', '2', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(10, 'per_page_ques', '3', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(11, 'per_page_ques', '4', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(12, 'per_page_ques', '5', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(13, 'per_page_ques', '6', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(14, 'per_page_ques', '7', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(15, 'per_page_ques', '8', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(16, 'per_page_ques', '9', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(17, 'per_page_ques', '10', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(18, 'certificate', 'MySql certificate', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(19, 'certificate', 'certificate for 1st ranker', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET utf8 NOT NULL COMMENT 'question asked by the person',
  `ques_type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'validate_users id ',
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 DEFAULT '0' COMMENT '0 for active, 1 for deleted, 2 for inactive',
  PRIMARY KEY (`id`),
  KEY `ques_type_id` (`ques_type_id`),
  KEY `category_id` (`category_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='for storing questions' AUTO_INCREMENT=30 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `ques_type_id`, `category_id`, `created_by`, `created_on`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'what is the full form of PHP?', 5, 1, 1, '2013-05-10 05:55:17', '0000-00-00 00:00:00', 1, '0'),
(2, 'hellosd', 5, 1, 1, '0000-00-00 00:00:00', '2013-05-10 06:58:33', NULL, '0'),
(3, 'hklsadlhkslhkdlak', 5, 1, 1, '0000-00-00 00:00:00', '2013-05-10 06:58:33', NULL, '0'),
(4, 'who  is me', 6, 1, 1, '0000-00-00 00:00:00', '2013-05-10 06:59:15', NULL, '0'),
(5, 'i m ???????', 7, 1, 1, '0000-00-00 00:00:00', '2013-05-10 06:59:15', NULL, '0'),
(6, 'hhjkljh''', 5, 1, 1, '2013-05-12 03:09:22', '2013-05-12 08:39:22', NULL, '0'),
(7, 'hhjkljh''', 5, 1, 1, '2013-05-12 03:09:43', '2013-05-12 08:39:43', NULL, '0'),
(8, '', 5, 1, 1, '2013-05-11 19:48:14', '2013-05-12 13:18:14', NULL, '0'),
(9, 'fdsfsd', 5, 1, 1, '2013-05-11 19:48:26', '2013-05-12 13:18:26', NULL, '0'),
(10, 'sdsad', 5, 1, 1, '2013-05-12 03:02:17', '2013-05-12 20:32:17', NULL, '0'),
(11, 'qqqqq', 5, 1, 1, '2013-05-12 23:01:12', '2013-05-13 04:31:12', NULL, '0'),
(12, 'qqqqq', 5, 1, 1, '2013-05-12 23:07:09', '2013-05-13 04:37:09', NULL, '0'),
(13, 'qqqqq', 5, 1, 1, '2013-05-12 23:07:21', '2013-05-13 04:37:21', NULL, '0'),
(14, 'qqqqq', 5, 1, 1, '2013-05-12 23:07:32', '2013-05-13 04:37:32', NULL, '0'),
(15, 'qqqqq', 5, 1, 1, '2013-05-12 23:07:43', '2013-05-13 04:37:43', NULL, '0'),
(16, 'qqqqq', 5, 1, 1, '2013-05-12 23:09:26', '2013-05-13 04:39:26', NULL, '0'),
(17, 'qqqqq', 5, 1, 1, '2013-05-12 23:09:34', '2013-05-13 04:39:34', NULL, '0'),
(18, 'qqqqq', 5, 1, 1, '2013-05-12 23:15:47', '2013-05-13 04:45:47', NULL, '0'),
(19, 'qqqqq', 5, 1, 1, '2013-05-12 23:18:09', '2013-05-13 04:48:09', NULL, '0'),
(20, 'qqqqq', 5, 1, 1, '2013-05-12 23:19:03', '2013-05-13 04:49:03', NULL, '0'),
(21, 'qqqqq', 5, 1, 1, '2013-05-12 23:21:58', '2013-05-13 04:51:58', NULL, '0'),
(22, 'qqqqq', 5, 1, 1, '2013-05-12 23:33:52', '2013-05-13 05:03:52', NULL, '0'),
(23, 'qqqqq', 5, 1, 1, '2013-05-12 23:36:56', '2013-05-13 05:06:56', NULL, '0'),
(24, 'qqqqq', 5, 1, 1, '2013-05-12 23:38:06', '2013-05-13 05:08:06', NULL, '0'),
(25, 'qqqqq', 5, 1, 1, '2013-05-12 23:38:51', '2013-05-13 05:08:51', NULL, '0'),
(26, 'qqqqq', 5, 1, 1, '2013-05-12 23:39:49', '2013-05-13 05:09:49', NULL, '0'),
(27, 'qqqqq', 5, 1, 1, '2013-05-12 23:39:59', '2013-05-13 05:09:59', NULL, '0'),
(28, 'qqqqq', 5, 1, 1, '2013-05-12 23:40:14', '2013-05-13 05:10:14', NULL, '0'),
(29, 'qqqqq', 5, 1, 1, '2013-05-12 23:40:17', '2013-05-13 05:10:17', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE IF NOT EXISTS `question_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques_id` int(11) NOT NULL,
  `option` text CHARACTER SET utf8 NOT NULL,
  `correct` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '''0'' for incorrect and ''1'' for correct',
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8 DEFAULT '0' COMMENT '0 for active, 1 for deleted',
  PRIMARY KEY (`id`),
  KEY `ques_id` (`ques_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='for storing options and answers of the questions' AUTO_INCREMENT=17 ;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `ques_id`, `option`, `correct`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(1, 1, 'Personal Home Page', '1', '2013-05-10 05:55:17', '0000-00-00 00:00:00', 1, 1, '0'),
(2, 1, 'PHP page', '0', '2013-05-10 05:55:17', '0000-00-00 00:00:00', 1, 1, '0'),
(3, 2, 'qq', '0', '0000-00-00 00:00:00', '2013-05-10 07:00:19', 1, NULL, '0'),
(4, 2, 'qqq', '1', '0000-00-00 00:00:00', '2013-05-10 07:00:19', 1, NULL, '0'),
(9, 3, 'aa', '0', '0000-00-00 00:00:00', '2013-05-10 07:01:23', 1, NULL, '0'),
(10, 3, 'aaa', '1', '0000-00-00 00:00:00', '2013-05-10 07:01:23', 1, NULL, '0'),
(11, 4, 'www', '0', '0000-00-00 00:00:00', '2013-05-10 07:01:42', 1, NULL, '0'),
(12, 4, 'rerre', '1', '0000-00-00 00:00:00', '2013-05-10 07:02:32', 1, NULL, '0'),
(13, 5, 'bbbb', '0', '0000-00-00 00:00:00', '2013-05-10 07:02:07', 1, NULL, '0'),
(14, 5, 'vbvbvbv', '1', '0000-00-00 00:00:00', '2013-05-10 07:02:07', 1, NULL, '0'),
(15, 6, 'ffffffffff', '0', '0000-00-00 00:00:00', '2013-05-12 11:30:37', 1, NULL, '0'),
(16, 6, 'fwwwwwww', '1', '0000-00-00 00:00:00', '2013-05-12 11:30:37', 1, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `total_ques` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 DEFAULT '0' COMMENT '0 for active, 1 for deleted, 2 for inactive',
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='for storing test details' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `total_ques`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Test1', 6, '2013-05-10 05:55:17', '2013-05-12 20:22:02', 2, NULL, '0'),
(2, 'test222', 12, '0000-00-00 00:00:00', '2013-05-10 10:50:20', 1, NULL, '0'),
(3, '', 0, '0000-00-00 00:00:00', '2013-05-10 10:50:20', 1, NULL, '0'),
(4, 'ghgh', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(5, 'hjhj', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(6, 'hjhj55', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(7, 'hgh', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(8, 'hhh', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(9, 'eee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(10, 'dsds', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(11, 'sdsds', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(12, 'eee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(13, 'gfg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(14, 'aaaa', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(15, 'test', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(16, 'dfdfd', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(17, '4ggggggg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(18, 'dfdf', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0'),
(19, 'fdfdf', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE IF NOT EXISTS `test_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `no_of_ques` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`,`cat_id`),
  KEY `cat_id` (`cat_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='for storing link between test and category of questions' AUTO_INCREMENT=19 ;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`id`, `test_id`, `cat_id`, `no_of_ques`, `created_on`, `updated_on`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 6, '2013-05-10 05:55:17', '0000-00-00 00:00:00', 2, NULL),
(2, 1, 2, 4, '2013-05-10 05:55:17', '0000-00-00 00:00:00', 2, NULL),
(3, 4, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(4, 5, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(5, 6, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(6, 7, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(7, 8, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(8, 9, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(9, 10, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(10, 11, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(11, 12, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(12, 13, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(13, 14, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(14, 15, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(15, 16, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(16, 17, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(17, 18, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(18, 19, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_link`
--

CREATE TABLE IF NOT EXISTS `test_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'test link id',
  `test_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `link` varchar(150) CHARACTER SET utf8 NOT NULL,
  `random` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `per_page_ques` int(11) NOT NULL,
  `feedback` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `score` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `email_results` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `collect_firstname` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `collect_lastname` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `collect_email_enroll` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `test_avail_opt1` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `test_avail_opt2` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `display_result_id` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `certificate` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `no_of_attempts` tinyint(3) DEFAULT NULL,
  `certificate_id` int(11) DEFAULT NULL,
  `time_limit` int(11) NOT NULL COMMENT 'time limit  in minutes',
  `select_answer` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `pass_marks` int(3) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8 DEFAULT '0' COMMENT '0 for active, 1 for deleted',
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `per_page_ques` (`per_page_ques`),
  KEY `certificate_id` (`certificate_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='for storing link and other details of the test' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `test_link`
--

INSERT INTO `test_link` (`id`, `test_id`, `start_time`, `end_time`, `link`, `random`, `per_page_ques`, `feedback`, `score`, `email_results`, `collect_firstname`, `collect_lastname`, `collect_email_enroll`, `test_avail_opt1`, `test_avail_opt2`, `display_result_id`, `certificate`, `no_of_attempts`, `certificate_id`, `time_limit`, `select_answer`, `pass_marks`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(1, 1, '2013-05-08 20:20:02', '2013-05-08 22:08:10', 'a', '1', 8, '0', '1', '0', '1', '1', '1', '0', '0', '1', '1', 2, 1, 20, '0', 50, '2013-05-10 05:55:18', '2013-05-12 20:59:35', 2, NULL, '0'),
(3, 2, '2013-05-01 00:00:00', '2013-05-08 00:00:00', 's', '0', 1, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 1, 0, '0', 0, '0000-00-00 00:00:00', '2013-05-12 11:23:38', 1, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `test_question`
--

CREATE TABLE IF NOT EXISTS `test_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 for active,1 for deleted,2 for inactive',
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='stores the reletionship between test and questions' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `test_question`
--

INSERT INTO `test_question` (`id`, `test_id`, `question_id`, `status`) VALUES
(1, 1, 1, '0'),
(2, 1, 2, '0'),
(3, 1, 3, '0'),
(4, 1, 4, '0'),
(6, 1, 6, '0');

-- --------------------------------------------------------

--
-- Table structure for table `test_taker`
--

CREATE TABLE IF NOT EXISTS `test_taker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_link_id` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email_enroll_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `test_id` int(11) NOT NULL,
  `ques_attempted` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `ip_address` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_link_id` (`test_link_id`,`test_id`),
  KEY `test_id` (`test_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='for storing details of test_taker' AUTO_INCREMENT=86 ;

--
-- Dumping data for table `test_taker`
--

INSERT INTO `test_taker` (`id`, `test_link_id`, `first_name`, `last_name`, `email_enroll_no`, `start_time`, `end_time`, `test_id`, `ques_attempted`, `score`, `created_on`, `updated_on`, `created_by`, `updated_by`, `ip_address`) VALUES
(44, 1, 'sdsds', 'dsdsdsd', 'dsdsds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 18:58:14', 1, NULL, '127.0.0.1'),
(45, 1, 'ssw22', 'df', 'sfsafa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 18:58:53', 1, NULL, '127.0.0.1'),
(46, 1, 'rrrrr', 'sdsds', 'sdsada', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 18:59:29', 1, NULL, '127.0.0.1'),
(47, 1, 'asa', 'asa', 'asasa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 20:21:17', 1, NULL, '127.0.0.1'),
(48, 1, 'g', 'ggsd', 'sdsds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 20:35:06', 1, NULL, '127.0.0.1'),
(49, 1, 'sd', 'sdsdsd', 'sds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 20:39:48', 1, NULL, '127.0.0.1'),
(50, 1, 'h', 'h', 'h', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 20:42:09', 1, NULL, '127.0.0.1'),
(51, 1, 'fasdsad', 'sdsdsdsd', 'sds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 20:42:36', 1, NULL, '127.0.0.1'),
(52, 1, 'sdsdsd', 'sdsdsds', 'dsds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 20:47:59', 1, NULL, '127.0.0.1'),
(53, 1, 'h', 'h', 'hfhf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 20:59:45', 1, NULL, '127.0.0.1'),
(54, 1, 'dsdsdsd', 'sdsdsds', 'dds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:13:02', 1, NULL, '127.0.0.1'),
(55, 1, 'dsdsdsd', 'sdsdsds', 'dds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:13:28', 1, NULL, '127.0.0.1'),
(56, 1, 'sds', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:13:35', 1, NULL, '127.0.0.1'),
(57, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:14:36', 1, NULL, '127.0.0.1'),
(58, 1, 'dfads', 'dsadsads', 'adsad', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:14:59', 1, NULL, '127.0.0.1'),
(59, 1, 'sdsdasdsad', 'sdsd', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:19:28', 1, NULL, '127.0.0.1'),
(60, 1, 'dsdsds', 'sd', 'sds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:20:23', 1, NULL, '127.0.0.1'),
(61, 1, 'sdsds', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:22:08', 1, NULL, '127.0.0.1'),
(62, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:22:45', 1, NULL, '127.0.0.1'),
(63, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:25:03', 1, NULL, '127.0.0.1'),
(64, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:26:31', 1, NULL, '127.0.0.1'),
(65, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:26:59', 1, NULL, '127.0.0.1'),
(66, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:28:14', 1, NULL, '127.0.0.1'),
(67, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:29:19', 1, NULL, '127.0.0.1'),
(68, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:30:27', 1, NULL, '127.0.0.1'),
(69, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:31:08', 1, NULL, '127.0.0.1'),
(70, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:32:11', 1, NULL, '127.0.0.1'),
(71, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:32:34', 1, NULL, '127.0.0.1'),
(72, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:33:01', 1, NULL, '127.0.0.1'),
(73, 1, 'fsdasd', 'sad', 'sads', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:36:43', 1, NULL, '127.0.0.1'),
(74, 1, 'dsadsad', 'sdsdsd', 'dsds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:45:59', 1, NULL, '127.0.0.1'),
(75, 1, 'dsdsads', 'dsds', 'sdsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:47:07', 1, NULL, '127.0.0.1'),
(76, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:48:38', 1, NULL, '127.0.0.1'),
(77, 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:50:51', 1, NULL, '127.0.0.1'),
(78, 1, 'dsd', 'dsad', 'dsads@dsd.co.s.c.s', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:56:15', 1, NULL, '127.0.0.1'),
(79, 1, 'dsds', 'Khanna', 'mailgouravkhanna@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 21:59:22', 1, NULL, '127.0.0.1'),
(80, 1, 'dsd', 'sds', 'mailgouravkhanna@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 22:03:44', 1, NULL, '127.0.0.1'),
(81, 1, 'dsdsds', 'sdsd', 'mailgouravkhanna@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 22:06:01', 1, NULL, '127.0.0.1'),
(82, 1, 'fasadsd', 'sdsadsad', 'sad@a.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 22:09:50', 1, NULL, '127.0.0.1'),
(83, 1, 'sdadsad', 'sadsadsa', 'mailgouravkhanna@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 22:10:56', 1, NULL, '127.0.0.1'),
(84, 1, 'Gourav', 'Khanna', 'abha719@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 22:13:07', 1, NULL, '127.0.0.1'),
(85, 1, 'rere', 'wrer', 'erew@ww.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', '2013-05-12 22:16:11', 1, NULL, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `test_taker_ques`
--

CREATE TABLE IF NOT EXISTS `test_taker_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_taker_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `answer_given` int(11) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `feedback` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_taker_id` (`test_taker_id`,`ques_id`),
  KEY `ques_id` (`ques_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `answer_given` (`answer_given`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='for storing questions attempted and answers given by test taker' AUTO_INCREMENT=91 ;

--
-- Dumping data for table `test_taker_ques`
--

INSERT INTO `test_taker_ques` (`id`, `test_taker_id`, `ques_id`, `answer_given`, `created_on`, `updated_on`, `created_by`, `updated_by`, `feedback`) VALUES
(1, 44, 1, 1, '0000-00-00 00:00:00', '2013-05-12 18:58:32', 1, NULL, NULL),
(2, 44, 2, 4, '0000-00-00 00:00:00', '2013-05-12 18:58:18', 1, NULL, NULL),
(3, 44, 3, 9, '0000-00-00 00:00:00', '2013-05-12 18:58:20', 1, NULL, NULL),
(4, 44, 4, 12, '0000-00-00 00:00:00', '2013-05-12 18:58:22', 1, NULL, NULL),
(5, 44, 5, 13, '0000-00-00 00:00:00', '2013-05-12 18:58:24', 1, NULL, NULL),
(6, 44, 6, 16, '0000-00-00 00:00:00', '2013-05-12 18:58:26', 1, NULL, NULL),
(7, 45, 1, 1, '0000-00-00 00:00:00', '2013-05-12 18:58:57', 1, NULL, NULL),
(8, 45, 2, 3, '0000-00-00 00:00:00', '2013-05-12 18:59:00', 1, NULL, NULL),
(9, 45, 3, 9, '0000-00-00 00:00:00', '2013-05-12 18:59:02', 1, NULL, NULL),
(10, 45, 4, 11, '0000-00-00 00:00:00', '2013-05-12 18:59:03', 1, NULL, NULL),
(11, 45, 5, 13, '0000-00-00 00:00:00', '2013-05-12 18:59:06', 1, NULL, NULL),
(12, 45, 6, 15, '0000-00-00 00:00:00', '2013-05-12 18:59:09', 1, NULL, NULL),
(13, 46, 1, 2, '0000-00-00 00:00:00', '2013-05-12 18:59:32', 1, NULL, NULL),
(14, 46, 2, 3, '0000-00-00 00:00:00', '2013-05-12 18:59:34', 1, NULL, NULL),
(15, 46, 3, 9, '0000-00-00 00:00:00', '2013-05-12 18:59:35', 1, NULL, NULL),
(16, 46, 4, 11, '0000-00-00 00:00:00', '2013-05-12 18:59:36', 1, NULL, NULL),
(17, 46, 5, 13, '0000-00-00 00:00:00', '2013-05-12 18:59:38', 1, NULL, NULL),
(18, 46, 6, 16, '0000-00-00 00:00:00', '2013-05-12 18:59:40', 1, NULL, NULL),
(19, 47, 1, 1, '0000-00-00 00:00:00', '2013-05-12 20:21:21', 1, NULL, NULL),
(20, 47, 2, 4, '0000-00-00 00:00:00', '2013-05-12 20:21:22', 1, NULL, NULL),
(21, 47, 3, 10, '0000-00-00 00:00:00', '2013-05-12 20:21:24', 1, NULL, NULL),
(22, 47, 4, 12, '0000-00-00 00:00:00', '2013-05-12 20:21:26', 1, NULL, NULL),
(23, 47, 5, 14, '0000-00-00 00:00:00', '2013-05-12 20:21:28', 1, NULL, NULL),
(24, 47, 6, 16, '0000-00-00 00:00:00', '2013-05-12 20:21:30', 1, NULL, NULL),
(25, 49, 1, 1, '0000-00-00 00:00:00', '2013-05-12 20:39:55', 1, NULL, NULL),
(26, 50, 1, 2, '0000-00-00 00:00:00', '2013-05-12 20:42:12', 1, NULL, NULL),
(27, 51, 1, 2, '0000-00-00 00:00:00', '2013-05-12 20:42:47', 1, NULL, NULL),
(28, 51, 4, 11, '0000-00-00 00:00:00', '2013-05-12 20:43:41', 1, NULL, NULL),
(29, 51, 5, 14, '0000-00-00 00:00:00', '2013-05-12 20:43:43', 1, NULL, NULL),
(30, 51, 6, 16, '0000-00-00 00:00:00', '2013-05-12 20:43:44', 1, NULL, NULL),
(31, 52, 1, 2, '0000-00-00 00:00:00', '2013-05-12 20:48:02', 1, NULL, NULL),
(32, 52, 2, 4, '0000-00-00 00:00:00', '2013-05-12 20:48:04', 1, NULL, NULL),
(33, 52, 3, 10, '0000-00-00 00:00:00', '2013-05-12 20:48:05', 1, NULL, NULL),
(34, 52, 4, 12, '0000-00-00 00:00:00', '2013-05-12 20:48:07', 1, NULL, NULL),
(35, 57, 1, 2, '0000-00-00 00:00:00', '2013-05-12 21:14:49', 1, NULL, NULL),
(36, 58, 1, 2, '0000-00-00 00:00:00', '2013-05-12 21:15:06', 1, NULL, NULL),
(37, 59, 1, 2, '0000-00-00 00:00:00', '2013-05-12 21:19:33', 1, NULL, NULL),
(38, 59, 2, 4, '0000-00-00 00:00:00', '2013-05-12 21:19:38', 1, NULL, NULL),
(39, 59, 3, 10, '0000-00-00 00:00:00', '2013-05-12 21:19:41', 1, NULL, NULL),
(40, 73, 2, 4, '0000-00-00 00:00:00', '2013-05-12 21:37:39', 1, NULL, NULL),
(41, 73, 3, 10, '0000-00-00 00:00:00', '2013-05-12 21:37:43', 1, NULL, NULL),
(42, 73, 4, 12, '0000-00-00 00:00:00', '2013-05-12 21:37:45', 1, NULL, NULL),
(43, 73, 6, 16, '0000-00-00 00:00:00', '2013-05-12 21:37:47', 1, NULL, NULL),
(44, 73, 1, 2, '0000-00-00 00:00:00', '2013-05-12 21:41:49', 1, NULL, NULL),
(45, 74, 1, 2, '0000-00-00 00:00:00', '2013-05-12 21:46:04', 1, NULL, NULL),
(46, 74, 4, 12, '0000-00-00 00:00:00', '2013-05-12 21:46:09', 1, NULL, NULL),
(47, 74, 2, 4, '0000-00-00 00:00:00', '2013-05-12 21:46:12', 1, NULL, NULL),
(48, 75, 4, 12, '0000-00-00 00:00:00', '2013-05-12 21:47:17', 1, NULL, NULL),
(49, 75, 1, 2, '0000-00-00 00:00:00', '2013-05-12 21:47:20', 1, NULL, NULL),
(50, 75, 3, 10, '0000-00-00 00:00:00', '2013-05-12 21:47:23', 1, NULL, NULL),
(51, 75, 6, 16, '0000-00-00 00:00:00', '2013-05-12 21:47:26', 1, NULL, NULL),
(52, 75, 2, 3, '0000-00-00 00:00:00', '2013-05-12 21:48:25', 1, NULL, NULL),
(53, 76, 3, 10, '0000-00-00 00:00:00', '2013-05-12 21:48:42', 1, NULL, NULL),
(54, 76, 4, 11, '0000-00-00 00:00:00', '2013-05-12 21:48:45', 1, NULL, NULL),
(55, 76, 1, 1, '0000-00-00 00:00:00', '2013-05-12 21:48:51', 1, NULL, NULL),
(56, 76, 2, 4, '0000-00-00 00:00:00', '2013-05-12 21:48:53', 1, NULL, NULL),
(57, 76, 6, 16, '0000-00-00 00:00:00', '2013-05-12 21:48:54', 1, NULL, NULL),
(58, 77, 3, 10, '0000-00-00 00:00:00', '2013-05-12 21:50:55', 1, NULL, NULL),
(59, 77, 1, 2, '0000-00-00 00:00:00', '2013-05-12 21:52:44', 1, NULL, NULL),
(60, 77, 4, 11, '0000-00-00 00:00:00', '2013-05-12 21:53:44', 1, NULL, NULL),
(61, 77, 2, 3, '0000-00-00 00:00:00', '2013-05-12 21:53:47', 1, NULL, NULL),
(62, 77, 6, 16, '0000-00-00 00:00:00', '2013-05-12 21:53:50', 1, NULL, NULL),
(63, 78, 6, 16, '0000-00-00 00:00:00', '2013-05-12 21:56:18', 1, NULL, NULL),
(64, 78, 4, 12, '0000-00-00 00:00:00', '2013-05-12 21:56:20', 1, NULL, NULL),
(65, 78, 2, 4, '0000-00-00 00:00:00', '2013-05-12 21:56:22', 1, NULL, NULL),
(66, 78, 3, 10, '0000-00-00 00:00:00', '2013-05-12 21:56:23', 1, NULL, NULL),
(67, 78, 1, 1, '0000-00-00 00:00:00', '2013-05-12 21:56:26', 1, NULL, NULL),
(68, 79, 6, 16, '0000-00-00 00:00:00', '2013-05-12 21:59:26', 1, NULL, NULL),
(69, 79, 4, 11, '0000-00-00 00:00:00', '2013-05-12 21:59:28', 1, NULL, NULL),
(70, 79, 1, 1, '0000-00-00 00:00:00', '2013-05-12 21:59:30', 1, NULL, NULL),
(71, 79, 2, 4, '0000-00-00 00:00:00', '2013-05-12 21:59:31', 1, NULL, NULL),
(72, 79, 3, 9, '0000-00-00 00:00:00', '2013-05-12 21:59:33', 1, NULL, NULL),
(73, 80, 1, 1, '0000-00-00 00:00:00', '2013-05-12 22:03:48', 1, NULL, NULL),
(74, 80, 3, 10, '0000-00-00 00:00:00', '2013-05-12 22:03:50', 1, NULL, NULL),
(75, 80, 4, 12, '0000-00-00 00:00:00', '2013-05-12 22:03:52', 1, NULL, NULL),
(76, 80, 6, 16, '0000-00-00 00:00:00', '2013-05-12 22:03:55', 1, NULL, NULL),
(77, 81, 4, 11, '0000-00-00 00:00:00', '2013-05-12 22:06:04', 1, NULL, NULL),
(78, 81, 6, 16, '0000-00-00 00:00:00', '2013-05-12 22:06:07', 1, NULL, NULL),
(79, 81, 1, 1, '0000-00-00 00:00:00', '2013-05-12 22:06:08', 1, NULL, NULL),
(80, 82, 1, 1, '0000-00-00 00:00:00', '2013-05-12 22:09:55', 1, NULL, NULL),
(81, 84, 2, 4, '0000-00-00 00:00:00', '2013-05-12 22:13:10', 1, NULL, NULL),
(82, 84, 3, 10, '0000-00-00 00:00:00', '2013-05-12 22:13:14', 1, NULL, NULL),
(83, 84, 4, 12, '0000-00-00 00:00:00', '2013-05-12 22:13:17', 1, NULL, NULL),
(84, 84, 1, 2, '0000-00-00 00:00:00', '2013-05-12 22:13:25', 1, NULL, NULL),
(85, 84, 6, 16, '0000-00-00 00:00:00', '2013-05-12 22:13:28', 1, NULL, NULL),
(86, 85, 1, 1, '0000-00-00 00:00:00', '2013-05-12 22:16:26', 1, NULL, NULL),
(87, 85, 4, 11, '0000-00-00 00:00:00', '2013-05-12 22:16:29', 1, NULL, NULL),
(88, 85, 6, 16, '0000-00-00 00:00:00', '2013-05-12 22:16:32', 1, NULL, NULL),
(89, 85, 3, 10, '0000-00-00 00:00:00', '2013-05-12 22:16:34', 1, NULL, NULL),
(90, 85, 2, 4, '0000-00-00 00:00:00', '2013-05-12 22:16:38', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL COMMENT 'first name of user',
  `last_name` varchar(20) NOT NULL COMMENT 'last name of user',
  `email` varchar(100) DEFAULT NULL,
  `type_of_org_id` int(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `ip_address` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_id` (`user_id`),
  KEY `type_of_org` (`type_of_org_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='for storing details of the registered user' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `email`, `type_of_org_id`, `created_on`, `updated_on`, `created_by`, `updated_by`, `ip_address`) VALUES
(1, 1, 'Parveen', 'Badoni', 'parveen.badoni@osscube.com', 4, '2013-05-10 05:55:17', '0000-00-00 00:00:00', 1, NULL, NULL),
(2, 2, 'Jasleen', 'Kaur', 'jasleen.kaur@osscube.com', 4, '2013-05-10 05:55:17', '0000-00-00 00:00:00', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `validate_users`
--

CREATE TABLE IF NOT EXISTS `validate_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 is for admin & 1 is for user',
  `terms_conditions` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 is for unchecked & 1 is for checked',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 is for inactive & 1 is for active',
  `session_id` varchar(30) DEFAULT '0' COMMENT 'this field will be used to store session id',
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='for validating username and password' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `validate_users`
--

INSERT INTO `validate_users` (`id`, `username`, `password`, `user_type`, `terms_conditions`, `status`, `session_id`, `created_on`, `updated_on`, `created_by`, `updated_by`) VALUES
(1, 'parveen', 'parveen', '1', '1', '0', '6eq8pq9njtt0upd224kgtc6s91', '2013-05-10 05:55:12', '2013-05-12 20:32:00', 0, NULL),
(2, 'jasleen', 'jasleen', '1', '1', '0', '6eq8pq9njtt0upd224kgtc6s91', '2013-05-10 05:55:12', '2013-05-12 20:32:00', 0, NULL),
(3, 'nancy', 'nancy', '0', '0', '0', '6eq8pq9njtt0upd224kgtc6s91', '2013-05-10 05:55:12', '2013-05-12 20:32:00', 0, NULL),
(4, 'saurabh', 'saurabh', '1', '0', '0', '6eq8pq9njtt0upd224kgtc6s91', '2013-05-10 05:55:12', '2013-05-12 20:32:00', 0, NULL),
(5, 'gourav', 'gourav', '0', '1', '0', '6eq8pq9njtt0upd224kgtc6s91', '2013-05-10 05:55:12', '2013-05-12 20:32:00', 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`test_taker_id`) REFERENCES `test_taker` (`id`),
  ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificate_ibfk_43` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificate_ibfk_44` FOREIGN KEY (`certificate_id`) REFERENCES `certificate_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certificate_master`
--
ALTER TABLE `certificate_master`
  ADD CONSTRAINT `certificate_master_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificate_master_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master`
--
ALTER TABLE `master`
  ADD CONSTRAINT `master_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`ques_type_id`) REFERENCES `master` (`id`),
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `question_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_44` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `question_options_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_options_ibfk_43` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_ibfk_42` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_category`
--
ALTER TABLE `test_category`
  ADD CONSTRAINT `test_category_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`),
  ADD CONSTRAINT `test_category_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_category_ibfk_44` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_category_ibfk_45` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_link`
--
ALTER TABLE `test_link`
  ADD CONSTRAINT `test_link_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_link_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_link_ibfk_2` FOREIGN KEY (`per_page_ques`) REFERENCES `master` (`id`),
  ADD CONSTRAINT `test_link_ibfk_45` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_link_ibfk_46` FOREIGN KEY (`certificate_id`) REFERENCES `certificate_master` (`id`);

--
-- Constraints for table `test_question`
--
ALTER TABLE `test_question`
  ADD CONSTRAINT `test_question1_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_taker`
--
ALTER TABLE `test_taker`
  ADD CONSTRAINT `test_taker_ibfk_1` FOREIGN KEY (`test_link_id`) REFERENCES `test_link` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ibfk_44` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_taker_ques`
--
ALTER TABLE `test_taker_ques`
  ADD CONSTRAINT `test_taker_ques_ibfk_1` FOREIGN KEY (`test_taker_id`) REFERENCES `test_taker` (`id`),
  ADD CONSTRAINT `test_taker_ques_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ques_ibfk_2` FOREIGN KEY (`ques_id`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `test_taker_ques_ibfk_44` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_taker_ques_ibfk_45` FOREIGN KEY (`answer_given`) REFERENCES `question_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_profile_ibfk_10` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`type_of_org_id`) REFERENCES `master` (`id`),
  ADD CONSTRAINT `user_profile_ibfk_45` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `validate_users`
--
ALTER TABLE `validate_users`
  ADD CONSTRAINT `validate_users_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `validate_users_ibfk_42` FOREIGN KEY (`created_by`) REFERENCES `validate_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
