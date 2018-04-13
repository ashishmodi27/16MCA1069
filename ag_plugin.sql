-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 08:42 PM
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
-- Database: `ag_plugin`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`) VALUES
(1, 'ash@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `id` varchar(20) NOT NULL,
  `link` text NOT NULL,
  `tag` text NOT NULL,
  `topic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`id`, `link`, `tag`, `topic`) VALUES
('\r\n1', 'https://www.daniweb.com/programming/web-development/threads/448310/mysqli-num-rows-expects-parameter-1-to-be-mysqli-result-boolean-given-in', 'HTML', 'ComputerScience'),
('\r\n1', 'https://www.ea.com/careers/news', 'HTML', 'ComputerScience'),
('\r\n1', 'chrome://extensions/', 'HTML', 'ComputerScience'),
('\r\n1', 'https://telugu4u.net/Downloads/file/215282/aasai-patta-[www.raagamp3.com].html', 'video', 'Maths'),
('\r\n1', 'chrome://newtab/', 'HTML', 'ComputerScience'),
('\r\n1', 'http://localhost:1443/intership/admin_change/adminpage.php', 'HTML', 'Chemistry'),
('\r\n1', 'http://www.sheir.org/mathematics-mcqs-11.html', 'Math', 'Physics'),
('\r\n1', 'http://localhost/new_proj/game1/', 'ahaguru', 'Physics'),
('\r\n1', 'https://www.crcpress.com/Transformation-Wave-Physics-Electromagnetics-Elastodynamics-and-Thermodynamics/Farhat-Chen-Guenneau-Enoch/p/book/9789814669955', 'electro', 'Physics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
