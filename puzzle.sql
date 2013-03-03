-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2013 at 01:14 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `puzzle`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `uid` int(11) NOT NULL,
  `puzzle_serial` int(11) NOT NULL,
  `given_answer` text NOT NULL,
  `answer_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `uid` (`uid`),
  KEY `puzzle_serial` (`puzzle_serial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE IF NOT EXISTS `progress` (
  `uid` int(11) NOT NULL,
  `current_puzzle_serial` int(11) NOT NULL DEFAULT '1',
  `last_correct_answer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `finished` tinyint(1) DEFAULT '0',
  KEY `uid` (`uid`),
  KEY `current_puzzle_serial` (`current_puzzle_serial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`uid`, `current_puzzle_serial`, `last_correct_answer`, `finished`) VALUES
(26, 1, '2013-03-03 12:11:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `puzzle`
--

CREATE TABLE IF NOT EXISTS `puzzle` (
  `serial` int(11) NOT NULL,
  `photo` text NOT NULL,
  `hint` text NOT NULL,
  `ans` text NOT NULL,
  `logic` text NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `puzzle`
--

INSERT INTO `puzzle` (`serial`, `photo`, `hint`, `ans`, `logic`) VALUES
(1, '8666f-Penguins.jpg', 'HINT HINT NEWLY NO HTML HINT', '	ANS1\r\n', '	LOGIC1\r\n'),
(2, 'b095e-ic_launcher.png', 'HINT IS ALL ITS ABOUT', 'ANS2', 'LOGIC2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `uname` varchar(40) DEFAULT NULL,
  `ulevel` int(11) DEFAULT NULL,
  `uterm` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `mail`, `student_id`, `uname`, `ulevel`, `uterm`, `password`) VALUES
(26, 'azadsalam2611@gmail.com', '0805030', 'Azad Salam', 4, 1, '114b146a8d709650705a321a54c983d1e5b5f095');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`puzzle_serial`) REFERENCES `puzzle` (`serial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`current_puzzle_serial`) REFERENCES `puzzle` (`serial`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
