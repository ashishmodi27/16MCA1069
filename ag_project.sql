-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2018 at 10:16 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ag_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `ag_ma_admin`
--

CREATE TABLE IF NOT EXISTS `ag_ma_admin` (
  `id` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `mob` int(10) NOT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ag_ma_chapter`
--

CREATE TABLE IF NOT EXISTS `ag_ma_chapter` (
  `cid` varchar(10) NOT NULL,
  `cname` text NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sid` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ag_ma_chapter`
--

INSERT INTO `ag_ma_chapter` (`cid`, `cname`, `doc`, `sid`, `status`) VALUES
('ch0', 'Mogals', '2018-01-16 07:21:35', 's3', 0),
('ch1', 'prefix', '2018-01-17 10:24:26', 's2', 0),
('ch10', 'Formula', '2018-02-07 11:42:44', 's4', 1),
('ch11', 'Energy and momentum', '2018-02-07 11:42:11', 's1', 1),
('ch12', 'Suffix', '2018-02-06 11:07:56', 's2', 0),
('ch14', 'words', '2018-02-06 11:09:09', 's2', 0),
('ch15', 'bonds', '2018-02-10 09:45:53', 's1', 0),
('ch17', 'formula', '2018-02-10 10:36:20', 's4', 0),
('ch2', 'Rajputs', '2018-01-17 10:24:57', 's3', 0),
('ch3', 'motion and force', '2018-02-07 11:42:22', 's1', 1),
('ch4', 'work and energy', '2018-01-18 08:39:37', 's1', 0),
('ch5', 'Electro chemistry', '2018-01-18 09:16:18', 's0', 0),
('ch6', 'sentence', '2018-02-07 11:42:54', 's2', 1),
('ch7', 'Noun', '2018-01-18 09:23:04', 's2', 0),
('ch8', 'force', '2018-01-18 10:02:26', 's1', 0),
('ch9', 'work', '2018-01-19 05:49:35', 's1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ag_ma_question`
--

CREATE TABLE IF NOT EXISTS `ag_ma_question` (
`id` int(11) NOT NULL,
  `queandans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ag_ma_subject`
--

CREATE TABLE IF NOT EXISTS `ag_ma_subject` (
  `sid` varchar(10) NOT NULL,
  `subject_name` text NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ag_ma_subject`
--

INSERT INTO `ag_ma_subject` (`sid`, `subject_name`, `doc`, `status`) VALUES
('s0', 'chemistry', '2018-02-09 11:58:34', 0),
('s1', 'physics', '2018-02-07 08:42:06', 1),
('s2', 'English', '2018-02-07 08:42:11', 1),
('s3', 'History', '2018-01-14 19:07:39', 0),
('s4', 'Maths', '2018-02-07 08:42:21', 1),
('s5', 'Biology', '2018-02-07 08:42:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ag_ma_test`
--

CREATE TABLE IF NOT EXISTS `ag_ma_test` (
  `tid` varchar(10) NOT NULL,
  `right_answer` text NOT NULL,
  `wrong_answer` text NOT NULL,
  `not_attempt` text NOT NULL,
  `id` text NOT NULL,
  `score` int(10) NOT NULL,
  `qid` text NOT NULL,
  `choice_selected` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ag_ma_test`
--

INSERT INTO `ag_ma_test` (`tid`, `right_answer`, `wrong_answer`, `not_attempt`, `id`, `score`, `qid`, `choice_selected`) VALUES
('t1', '21, 18', '19, 20, 17', '', '16', 2, '21, 19, 18, 20, 17', '5,2,2,3,3'),
('t10', '0', '24, 21, 17, 18, 25', '', '16', 0, '24, 21, 17, 18, 25', '2,,,,'),
('t100', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,'),
('t101', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,'),
('t102', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,'),
('t103', '0', '0', '36, 42, 20, 41, 25', '16', 0, '36, 42, 20, 41, 25', ',,,,'),
('t104', '0', '0', '36, 42, 20, 17, 19, 41, 25, 23, 18, 26, 24', '16', 0, '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', ',,,,,,,,,,,'),
('t105', '0', '0', '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', '16', 0, '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', ',,,,,,,,,,,'),
('t106', '0', '0', '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', '16', 0, '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', ',,,,,,,,,,,'),
('t107', '0', '0', '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', '16', 0, '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', ',,,,,,,,,,,'),
('t108', '0', '0', '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', '16', 0, '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', ',,,,,,,,,,,'),
('t109', '0', '0', '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', '16', 0, '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', ',,,,,,,,,,,'),
('t11', '0', '17, 25, 21, 20, 23', '', '16', 0, '17, 25, 21, 20, 23', ',,,,'),
('t110', '0', '0', '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', '16', 0, '36, 42, 20, 17, 19, 41, 25, 23, 18, 21, 26, 24', ',,,,,,,,,,,'),
('t111', '0', '0', '36, 42, 21, 25, 19, 24, 23, 17, 18, 20', '16', 0, '36, 42, 21, 25, 19, 24, 23, 17, 18, 20', ',,,,,,,,,'),
('t112', '18', '36, 42, 24', '21', '16', 1, '36, 42, 24, 21, 18', '4,4,3,,2'),
('t113', '0', '0', '36, 42, 43, 44, 25', '16', 0, '36, 42, 43, 44, 25', ',,,,'),
('t114', '0', '0', '42, 43, 19, 21, 17', '16', 0, '42, 43, 19, 21, 17', ',,,,'),
('t115', '0', '0', '0', '16', 0, '', '0'),
('t116', '0', '0', '44, 43, 42, 36, 19', '16', 0, '44, 43, 42, 36, 19', ',,,,'),
('t117', '0', '0', '43, 42, 36, 44, 19, 18, 21, 23, 20, 26, 17, 41, 24, 25', '16', 0, '43, 42, 36, 44, 19, 18, 21, 23, 20, 26, 17, 41, 24, 25', ',,,,,,,,,,,,,'),
('t118', '0', '43, 36, 44, 42, 18', '0', '16', 0, '43, 36, 44, 42, 18', '4,3,3,4,3'),
('t119', '36, 44, 43', '42, 24', '0', '16', 3, '42, 36, 44, 43, 24', '4,1,1,1,1'),
('t12', '0', '20, 24, 21, 18, 19', '', '16', 0, '20, 24, 21, 18, 19', '2,,,,'),
('t120', '0', '42', '44, 41, 21, 20', '16', 0, '42, 44, 41, 21, 20', '3,,,,'),
('t121', '0', '17', '42, 19, 26, 24', '16', 0, '42, 17, 19, 26, 24', ',4,,,'),
('t122', '0', '0', '42, 17, 25, 18, 26', '16', 0, '42, 17, 25, 18, 26', ',,,,'),
('t123', '44, 36', '0', '41, 42, 25, 18, 21, 24, 20, 19, 23, 43, 26, 17', '16', 2, '41, 44, 42, 25, 18, 21, 24, 36, 20, 19, 23, 43, 26, 17', ',,,,,,,1,,,,,,'),
('t124', '41', '0', '42, 23, 26, 17', '16', 1, '42, 23, 26, 41, 17', ',,,1,'),
('t13', '0', '18, 24, 25, 20, 19', '', '16', 0, '18, 24, 25, 20, 19', ',,,,'),
('t14', '20, 23, 24, 18, 25', '0', '', '16', 5, '20, 23, 24, 18, 25', '1,4,4,2,4'),
('t15', '25, 23, 24', '19, 17', '', '16', 3, '19, 25, 23, 24, 17', '4,4,4,4,4'),
('t16', '25, 23, 24', '19, 17', '', '16', 3, '19, 25, 23, 24, 17', '4,4,4,4,4'),
('t17', '23, 25', '19, 21, 20', '', '16', 2, '23, 25, 19, 21, 20', '4,4,4,,4'),
('t18', '25', '24, 21, 23, 17', '', '16', 1, '25, 24, 21, 23, 17', '4,,,,'),
('t19', '0', '0', '', '16', 0, '', '0'),
('t2', '20, 17', '24, 19, 25', '', '16', 2, '20, 24, 17, 19, 25', '1,2,2,3,3'),
('t20', '0', '20, 21, 24, 18, 25', '', '16', 0, '20, 21, 24, 18, 25', ',,,,'),
('t21', '0', '20, 18, 19, 17, 25', '', '17', 0, '20, 18, 19, 17, 25', ',,,,'),
('t22', '0', '0', '', '17', 0, '', '0'),
('t23', '0', '17, 18', '', '17', 0, '17, 18', ','),
('t24', '0', '18', '', '17', 0, '18', ''),
('t25', '0', '20, 23, 19, 18, 25', '', '17', 0, '20, 23, 19, 18, 25', ',,,,'),
('t26', '0', '23', '', '17', 0, '23', '1'),
('t27', '0', '23', '', '17', 0, '23', '2'),
('t28', '0', '19, 24, 17, 18, 23', '', '18', 0, '19, 24, 17, 18, 23', ',,,,'),
('t29', '0', '19, 24, 17, 18, 23', '', '18', 0, '19, 24, 17, 18, 23', ',,,,'),
('t3', '20, 19', '25, 24, 23', '', '16', 2, '20, 19, 25, 24, 23', '1,1,3,3,3'),
('t30', '21', '25, 17, 23, 19', '', '18', 1, '21, 25, 17, 23, 19', '5,,,,'),
('t31', '19', '24, 17, 23, 18', '', '18', 1, '24, 17, 23, 19, 18', ',,,1,'),
('t32', '0', '17, 18', '', '18', 0, '17, 18', '1,1'),
('t33', '21, 19', '23, 25, 18', '', '18', 2, '23, 25, 21, 18, 19', '2,1,5,1,1'),
('t34', '25', '23, 24, 17, 18', '', '18', 1, '23, 24, 17, 25, 18', '3,3,4,4,3'),
('t35', '20', '24, 25, 23, 19', '', '17', 1, '24, 20, 25, 23, 19', '2,1,2,2,2'),
('t36', '0', '17, 18', '', '17', 0, '17, 18', '1,1'),
('t37', '0', '17, 18', '', '17', 0, '17, 18', '1,1'),
('t38', '0', '21', '', '17', 0, '21', ',,,,,'),
('t39', '0', '0', '', '16', 0, '', '0'),
('t4', '21, 24', '17, 23, 25', '', '16', 2, '17, 21, 23, 24, 25', '3,25317,3,4,2'),
('t40', '0', '18, 25, 19, 20, 23', '', '16', 0, '18, 25, 19, 20, 23', ',,,,'),
('t41', '0', '21, 17, 20, 18, 23', '', '16', 0, '21, 17, 20, 18, 23', ',,,,'),
('t42', '0', '25, 21, 20, 24, 19', '', '16', 0, '25, 21, 20, 24, 19', ',,,,'),
('t43', '0', '25, 21, 20, 24, 19', '', '16', 0, '25, 21, 20, 24, 19', ',,,,'),
('t44', '0', '21, 18, 17, 19, 23', '', '16', 0, '21, 18, 17, 19, 23', ',,,,'),
('t45', '0', '18, 21, 24, 23, 25', '', '16', 0, '18, 21, 24, 23, 25', ',,,,'),
('t46', '0', '24, 21, 25, 17, 19', '', '16', 0, '24, 21, 25, 17, 19', ',,,,'),
('t47', '0', '27, 23, 20', '', '16', 0, '27, 23, 20', ',,'),
('t48', '0', '27, 23, 20', '', '16', 0, '27, 23, 20', ',,'),
('t49', '0', '27, 23, 20', '', '16', 0, '27, 23, 20', ',,'),
('t5', '21, 19', '17, 23, 25', '', '16', 2, '21, 19, 17, 23, 25', '5,1,1,1,1'),
('t50', '0', '17, 18', '', '16', 0, '17, 18', '4,3'),
('t51', '18', '17', '', '16', 1, '18, 17', '2,3'),
('t52', '0', '0', '0', '16', 0, '', '0'),
('t53', '0', '0', '41, 26, 20, 23', '16', 0, '41, 26, 20, 23', ',,,'),
('t54', '0', '0', '41, 26, 20, 23', '16', 0, '41, 26, 20, 23', ',,,'),
('t55', '0', '0', '41, 26, 20, 23', '16', 0, '41, 26, 20, 23', ',,,'),
('t56', '0', '0', '41, 26, 20, 23', '16', 0, '41, 26, 20, 23', ',,,'),
('t57', '26', '42, 41, 36, 19', '0', '16', 1, '42, 41, 26, 36, 19', '4,3,3,4,4'),
('t58', '0', '0', '42, 36, 41, 25, 26, 18, 20, 19, 17', '16', 0, '42, 36, 41, 25, 26, 18, 20, 19, 17, 21', ',,,,,,,,,'),
('t59', '0', '0', '0', '16', 0, '', '0'),
('t6', '24, 21, 23', '17, 25', '', '16', 3, '17, 24, 21, 25, 23', '1,4,12,2,4'),
('t60', '0', '21', '42, 36, 41, 25', '16', 0, '42, 36, 41, 21, 25', ',,,2,'),
('t61', '0', '0', '24, 17, 36, 19, 42', '16', 0, '24, 17, 36, 19, 42', ',,,,'),
('t62', '0', '0', '41, 24, 26, 25, 42, 17, 20, 18, 23, 19, 36', '16', 0, '41, 24, 26, 21, 25, 42, 17, 20, 18, 23, 19, 36', ',,,,,,,,,,,'),
('t63', '0', '0', '41, 24, 26, 25, 42, 17, 20, 18, 23, 19, 36', '16', 0, '41, 24, 26, 21, 25, 42, 17, 20, 18, 23, 19, 36', ',,,,,,,,,,,'),
('t64', '0', '0', '18, 41, 26, 20, 42, 36, 25, 23, 19, 24, 17', '16', 0, '18, 21, 41, 26, 20, 42, 36, 25, 23, 19, 24, 17', ',,,,,,,,,,,'),
('t65', '0', '0', '18, 41, 26, 20, 42, 36, 25, 23, 19, 24, 17', '16', 0, '18, 21, 41, 26, 20, 42, 36, 25, 23, 19, 24, 17', ',,,,,,,,,,,'),
('t66', '0', '0', '18, 41, 26, 20, 42, 36, 25, 23, 19, 24, 17', '16', 0, '18, 21, 41, 26, 20, 42, 36, 25, 23, 19, 24, 17', ',,,,,,,,,,,'),
('t67', '0', '0', '18, 41, 26, 20, 42, 36, 25, 23, 19, 24, 17', '16', 0, '18, 21, 41, 26, 20, 42, 36, 25, 23, 19, 24, 17', ',,,,,,,,,,,'),
('t68', '0', '0', '36, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', '16', 0, '36, 21, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', ',,,,,,,,,,,'),
('t69', '0', '0', '36, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', '16', 0, '36, 21, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', ',,,,,,,,,,,'),
('t7', '21, 17, 20', '18, 25', '', '16', 3, '18, 21, 17, 20, 25', '1,2123,2,1,1'),
('t70', '0', '0', '36, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', '16', 0, '36, 21, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', ',,,,,,,,,,,'),
('t71', '0', '0', '36, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', '16', 0, '36, 21, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', ',,,,,,,,,,,'),
('t72', '41', '36', '42, 24, 18', '16', 1, '41, 36, 42, 24, 18', '1,2,,,'),
('t73', '0', '0', '36, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', '16', 0, '36, 21, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', ',,,,,,,,,,,'),
('t74', '0', '0', '36, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', '16', 0, '36, 21, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', ',,,,,,,,,,,'),
('t75', '0', '0', '36, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', '16', 0, '36, 21, 19, 25, 42, 23, 17, 24, 41, 26, 18, 20', ',,,,,,,,,,,'),
('t76', '0', '0', '20, 25, 42, 36, 19, 41, 26, 24, 23, 18, 17', '16', 0, '20, 25, 42, 36, 19, 41, 26, 24, 23, 21, 18, 17', ',,,,,,,,,,,'),
('t77', '0', '0', '20, 25, 42, 36, 19, 41, 26, 24, 23, 18, 17', '16', 0, '20, 25, 42, 36, 19, 41, 26, 24, 23, 21, 18, 17', ',,,,,,,,,,,'),
('t78', '0', '0', '42, 23, 36, 19, 41, 25, 18, 20, 24, 17, 26', '16', 0, '42, 23, 36, 19, 41, 21, 25, 18, 20, 24, 17, 26', ',,,,,,,,,,,'),
('t79', '0', '0', '17, 42, 23, 19, 18, 36, 20, 25, 41, 26, 24', '16', 0, '17, 42, 23, 19, 18, 36, 20, 21, 25, 41, 26, 24', ',,,,,,,,,,,'),
('t8', '18, 19, 17', '21, 25', '', '16', 3, '21, 18, 19, 17, 25', '213,2,1,2,1'),
('t80', '0', '0', '17, 42, 23, 19, 18, 36, 20, 25, 41, 26, 24', '16', 0, '17, 42, 23, 19, 18, 36, 20, 21, 25, 41, 26, 24', ',,,,,,,,,,,'),
('t81', '0', '0', '19, 23, 26, 18, 36, 41, 24, 25, 20, 17, 42', '16', 0, '19, 23, 26, 18, 36, 41, 24, 25, 20, 17, 21, 42', ',,,,,,,,,,,'),
('t82', '0', '0', '17, 18, 36, 19, 23, 20, 41, 26, 24, 25, 42', '16', 0, '17, 21, 18, 36, 19, 23, 20, 41, 26, 24, 25, 42', ',,,,,,,,,,,'),
('t83', '0', '0', '41, 17, 18, 36, 19, 23, 42, 25, 20, 24, 26', '16', 0, '41, 17, 18, 21, 36, 19, 23, 42, 25, 20, 24, 26', ',,,,,,,,,,,'),
('t84', '0', '0', '24, 42, 17, 36, 18, 41, 19, 25, 23, 20, 26', '16', 0, '24, 42, 17, 36, 18, 41, 19, 21, 25, 23, 20, 26', ',,,,,,,,,,,'),
('t85', '0', '0', '24, 42, 17, 36, 18, 41, 19, 25, 23, 20, 26', '16', 0, '24, 42, 17, 36, 18, 41, 19, 21, 25, 23, 20, 26', ',,,,,,,,,,,'),
('t86', '0', '0', '24, 42, 17, 36, 18, 41, 19, 25, 23, 20, 26', '16', 0, '24, 42, 17, 36, 18, 41, 19, 21, 25, 23, 20, 26', ',,,,,,,,,,,'),
('t87', '0', '0', '24, 42, 17, 36, 18, 41, 19, 25, 23, 20, 26', '16', 0, '24, 42, 17, 36, 18, 41, 19, 21, 25, 23, 20, 26', ',,,,,,,,,,,'),
('t88', '0', '0', '24, 42, 17, 36, 18, 41, 19, 25, 23, 20, 26', '16', 0, '24, 42, 17, 36, 18, 41, 19, 21, 25, 23, 20, 26', ',,,,,,,,,,,'),
('t89', '0', '0', '19, 20, 41, 26, 25, 17, 23, 24, 36, 42, 18', '16', 0, '21, 19, 20, 41, 26, 25, 17, 23, 24, 36, 42, 18', ',,,,,,,,,,,'),
('t9', '18, 21', '17, 23, 25', '', '16', 2, '17, 23, 18, 21, 25', '3,3,2,5,3'),
('t90', '0', '0', '19, 20, 41, 26, 25, 17, 23, 24, 36, 42, 18', '16', 0, '21, 19, 20, 41, 26, 25, 17, 23, 24, 36, 42, 18', ',,,,,,,,,,,'),
('t91', '0', '0', '19, 20, 41, 26, 25, 17, 23, 24, 36, 42, 18', '16', 0, '21, 19, 20, 41, 26, 25, 17, 23, 24, 36, 42, 18', ',,,,,,,,,,,'),
('t92', '0', '0', '21, 19, 20, 41, 26, 25, 17, 23, 24, 36, 42, 18', '16', 0, '21, 19, 20, 41, 26, 25, 17, 23, 24, 36, 42, 18', ',,,,,,,,,,,'),
('t93', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,'),
('t94', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,'),
('t95', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,'),
('t96', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,'),
('t97', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,'),
('t98', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,'),
('t99', '0', '0', '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', '16', 0, '21, 36, 42, 23, 17, 25, 41, 19, 26, 18, 20, 24', ',,,,,,,,,,,');

-- --------------------------------------------------------

--
-- Table structure for table `ag_ma_user`
--

CREATE TABLE IF NOT EXISTS `ag_ma_user` (
  `id` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `mob` int(10) NOT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ag_ma_user`
--

INSERT INTO `ag_ma_user` (`id`, `name`, `password`, `email`, `mob`, `lastlogin`, `status`) VALUES
('16', 'krishna', '12345', 'krishna@vit.com', 2147483647, '2018-02-02 05:15:22', 0),
('17', 'preethi', '123456', 'preethi@gmail.com', 0, '2018-02-05 11:29:25', 1),
('18', 'ashish', '123456', 'ash@gmail.com', 0, '2018-02-05 18:59:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ag_tr_result`
--

CREATE TABLE IF NOT EXISTS `ag_tr_result` (
  `pid` varchar(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `qid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physics`
--

CREATE TABLE IF NOT EXISTS `physics` (
`id` mediumint(8) unsigned NOT NULL,
  `queandans` text NOT NULL,
  `sorm` text NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physics`
--

INSERT INTO `physics` (`id`, `queandans`, `sorm`, `rid`) VALUES
(17, '{"questiontext":{"text":"A man of mass 30 kilograms climbs stairs of height 5 meters in 4 seconds. power output produced will be","answerno":"2","browser":"physics","browser2":"work and energy"},"option":{"1":{"text":"367.5 W"},"2":{"text":"36 W"},"3":{"text":"370 W"},"4":{"text":"397.5 W"}},"solution":{"text":"","link":"https://www.youtube.com/watch?v=v6I2yF6MBSs"},"answer":{"usekatex":"0"}}', 'm', 1),
(18, '{"questiontext":{"text":"One that is not a non-conservative force is","answerno":"2","browser":"physics","browser2":"work and energy"},"option":{"1":{"text":"frictional force"},"2":{"text":"gravitational force"},"3":{"text":"air resistance"},"4":{"text":"normal force"}},"solution":{"text":"","link":"https://www.youtube.com/watch?v=j1sDU1fUpHA"},"answer":{"usekatex":"0"}}', 'm', 2),
(19, '{"questiontext":{"text":"Considering formula c = b^2-a - b, then if value of a = -20 and b = -10, value of c is","answerno":"1","browser":"Maths","browser2":"Formula"},"option":{"1":{"text":"-10"},"2":{"text":"10"},"3":{"text":"20"},"4":{"text":"-20"}},"solution":{"text":"","link":"Nope"},"answer":{"usekatex":"1"}}', 'm', 3),
(20, '{  "questiontext":{"text":"Does the picture best show an example of kinetic energy or potential energy?<br />The man is pushing the lawn mower.<br /><img src=''Images/mom.jpg'' alt=''momentum'' />","answerno":"1","browser":"physics","browser2":"Energy and momentum"},"option":{"1":{"text":"kinetic energy"},"2":{"text":"potential energy"},"3":{"text":"Not A and B"},"4":{"text":"None Of these"}},"solution":{"text":"","link":"youtube.com"},"answer":{"usekatex":"0"}}', 'm', 4),
(21, '{"questiontext":{"text":"hello","correctanswer":"5","browser":"English","browser2":"sentence"},"answer":{"range_1":"4","range_2":"6","suffix":"kg","prefix":"","usekatex":"0"},"solution":{"text":"Just Like That","link":""}}', 's', 5),
(23, '{"questiontext":{"text":"Force that is not one of conservative forces is","answerno":"4","videomode":"0","browser":"physics","browser2":"Energy and momentum"},"option":{"1":{"text":"frictional force"},"2":{"text":"gravitational force"},"3":{"text":"electric force"},"4":{"text":"elastic spring force"}},"solution":{"text":"","link":""},"answer":{"usekatex":"0"}}', 'm', 6),
(24, '{"questiontext":{"text":"Which of the following terms is not used in the field of physics?","answerno":"4","videomode":"0","browser":"physics","browser2":"motion and force"},"option":{"1":{"text":"Latent heat"},"2":{"text":"Nuclear fusion"},"3":{"text":"Refractive index"},"4":{"text":"Stock value"}},"solution":{"text":"","link":""},"answer":{"usekatex":"0"}}', 'm', 7),
(25, '{"questiontext":{"text":"Radiocarbon is produced in the atmosphere as a result of","answerno":"4","videomode":"0","browser":"physics","browser2":"motion and force"},"option":{"1":{"text":"Collision between fast neutrons and nitrogen nuclei present in the atmosphere."},"2":{"text":"Action of ultraviolet light from the sun on atmospheric oxygen."},"3":{"text":"Action of solar radiations particularly cosmic rays on carbon dioxide present in the atmosphere."},"4":{"text":"Lightning discharge in atmosphere."}},"solution":{"text":"","link":""},"answer":{"usekatex":"0"}}', 'm', 8),
(26, '{"questiontext":{"text":"Which instrument is used to measure altitudes in aircraft''s ?","answerno":"3","videomode":"0","browser":"physics","browser2":"Energy and momentum"},"option":{"1":{"text":"Audiometer"},"2":{"text":"Ammeter"},"3":{"text":"Altimeter"},"4":{"text":"Anemometer"}},"solution":{"text":"Ammeter - Measures strength of electric current.<br \\/><br \\/>Audiometer - Measures intensity of sound.<br \\/><br \\/>Anemometer - Measures force and velocity of wind and directions.","link":""},"answer":{"usekatex":"0"}}', 'm', 9),
(36, '{"questiontext":{"text":"Which instrument is used to measure altitudes in aircraft''s","answerno":"1","videomode":"0","browser":"physics","browser2":"motion and force"},"option":{"1":{"text":"hello"},"2":{"text":"hi"},"3":{"text":"how are u"},"4":{"text":"identify"}},"solution":{"text":"","link":""},"answer":{"usekatex":"0"}}', 'm', 10),
(41, '{"questiontext":{"text":"Which&nbsp;","answerno":"1","videomode":"0","browser":"physics","browser2":"Energy and momentum"},"option":{"1":{"text":"hello"},"2":{"text":"hi"},"3":{"text":"how are u"},"4":{"text":"identify"}},"solution":{"text":"","link":""},"answer":{"usekatex":"0"}}', 'm', 11),
(42, '{"questiontext":{"text":"hello","answerno":"1","videomode":"0","browser":"physics","browser2":"motion and force"},"option":{"1":{"text":"g"},"2":{"text":"h"},"3":{"text":"q"},"4":{"text":"l"}},"solution":{"text":"","link":""},"answer":{"usekatex":"0"}}', 'm', 12),
(43, '{"questiontext":{"text":"Scalars are quantities that are described by _____________","answerno":"1","browser":"physics","browser2":"Energy and momentum"},"option":{"1":{"text":"Magnitude"},"2":{"text":"&nbsp;Direction"},"3":{"text":"&nbsp;Magnitude &amp; Direction"},"4":{"text":"&nbsp;Motion"}},"solution":{"text":"Learn it more","link":""},"answer":{"usekatex":"0"}}', 'm', 13),
(44, '{"questiontext":{"text":"The working principle of a washing machine is","answerno":"1","browser":"physics","browser2":"Energy and momentum"},"option":{"1":{"text":"dialysis"},"2":{"text":"reverse"},"3":{"text":"centrifugation"},"4":{"text":"diffusion"}},"solution":{"text":"Spinning","link":""},"answer":{"usekatex":"0"}}', 'm', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ag_ma_admin`
--
ALTER TABLE `ag_ma_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ag_ma_chapter`
--
ALTER TABLE `ag_ma_chapter`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ag_ma_question`
--
ALTER TABLE `ag_ma_question`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ag_ma_subject`
--
ALTER TABLE `ag_ma_subject`
 ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `ag_ma_test`
--
ALTER TABLE `ag_ma_test`
 ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `ag_ma_user`
--
ALTER TABLE `ag_ma_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ag_tr_result`
--
ALTER TABLE `ag_tr_result`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `physics`
--
ALTER TABLE `physics`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ag_ma_question`
--
ALTER TABLE `ag_ma_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `physics`
--
ALTER TABLE `physics`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
