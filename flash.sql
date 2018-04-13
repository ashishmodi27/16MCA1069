-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 08:41 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flash`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `opt1` text NOT NULL,
  `opt2` text NOT NULL,
  `opt3` text NOT NULL,
  `opt4` text NOT NULL,
  `opt5` text NOT NULL,
  `opt6` text NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `opt5`, `opt6`, `ans`) VALUES
(1, '2+3 = ?', '10', '52', '3', '4', '5', '6', '5'),
(2, '5+5 = ?', '5', '6', '7', '8', '10', '3', '10'),
(3, '100*4', '200', '400', '100', '104', '102', '500', '400'),
(4, '7*8', '56', '7', '8', '9', '1', '20', '56'),
(5, '3^4', '12', '21', '9', '81', '27', '243', '81'),
(6, '(11*12)+(100*0) =?', '0', '132', '123', '11', '100', '12', '132'),
(7, '-5+9-3+2 = ?', '3', '9', '5', '-2', '0', '6', '3'),
(8, '(9*0)^7 = ?', '9', '7', '0', '1', '63', '16', '0'),
(9, '(\\frac{((\\frac{12}{3})*4)}{4})^{2} = ?', '16', '12', '8', '1/8', '1/16', '32', '16'),
(10, '25-\\frac{48}{6}+12*2 = ?', '14', '51', '41', '21', '36', '25', '41'),
(11, '52-4 of (17-12)+4*7 = ?', '60', '52', '17', '64', '48', '56', '60'),
(12, '3*(10+5)+\\frac{(\\frac{48}{6})}{4}-7 = ?', '15', '48', '40', '14', '54', '32', '40'),
(13, '\\frac{9+43-4}{24}-4', '1', '6', '8', '4', '7', '9', '4'),
(14, '9*( 4 * 10 - 4 ) + 5', '329', '95', '140', '361', '369', '5', '329'),
(15, '36÷______+4=10', '5', '4', '9', '6', '3', '10', '6'),
(16, '23+28÷____=30', '4', '5', '7', '6', '9', '8', '4'),
(17, '___-2*14=4', '30', '35', '38', '32', '36', '34', '32'),
(18, '240 ÷ 8 × 512 ÷ 4 + ½ of {1800 ÷ (264 ÷ 8 × 3 – 69)2} = ?', '3840', '3841', '3842', '3844', '3845', '3800', '3841'),
(19, '24 + 13 – 5 × ½ of 10 - {45 ÷ (17 – 2)} =?', '11', '-7', '9', '18', '11', '13', '9'),
(20, '9-3\\div\\frac{1}{3}+1 = ?', '1', '9', '10', '0', '11', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `game` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `game`) VALUES
(1, '-5604');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
