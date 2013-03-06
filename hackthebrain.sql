-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: 127.3.71.1:3306
-- Generation Time: Mar 06, 2013 at 03:56 PM
-- Server version: 5.1.67
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackthebrain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'sujon335@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'shanto86@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'pagla@pagla.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `puzzle_serial` int(11) NOT NULL,
  `given_answer` text NOT NULL,
  `answer_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lid`),
  KEY `log_ibfk_1` (`uid`),
  KEY `log_ibfk_2` (`puzzle_serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`lid`, `uid`, `puzzle_serial`, `given_answer`, `answer_time`) VALUES
(1, 1, 1, 'ans1', '2013-03-04 16:44:48'),
(2, 1, 1, 'ans1', '2013-03-04 16:44:49'),
(3, 1, 1, 'flower', '2013-03-04 16:44:55'),
(4, 1, 2, 'asndas', '2013-03-04 16:57:53'),
(5, 1, 2, 'penguins', '2013-03-04 16:59:08'),
(6, 2, 1, 'Sun', '2013-03-04 17:05:09'),
(7, 3, 1, 'dahlia', '2013-03-04 17:05:40'),
(8, 4, 1, 'azad', '2013-03-04 17:06:34'),
(9, 4, 1, 'sun', '2013-03-04 17:06:45'),
(10, 3, 1, 'Chrysanthemum', '2013-03-04 17:07:41'),
(11, 4, 1, 'lower', '2013-03-04 17:08:33'),
(12, 4, 1, 'rewolf', '2013-03-04 17:08:42'),
(13, 3, 1, 'sun', '2013-03-04 17:09:35'),
(14, 3, 1, 'sunflower', '2013-03-04 17:09:39'),
(15, 3, 1, 'sunflower', '2013-03-04 17:09:42'),
(16, 4, 1, 'sunny', '2013-03-04 17:09:56'),
(17, 4, 1, 'java', '2013-03-04 17:10:00'),
(18, 4, 1, 'javasun', '2013-03-04 17:10:04'),
(19, 3, 1, 'colyflower', '2013-03-04 17:10:11'),
(20, 3, 1, 'sunflower', '2013-03-04 17:10:41'),
(21, 3, 1, 'flower', '2013-03-04 17:11:00'),
(22, 2, 1, 'flower', '2013-03-04 17:11:46'),
(23, 4, 1, 'blue', '2013-03-04 17:11:47'),
(24, 2, 2, 'penguins', '2013-03-04 17:12:02'),
(25, 3, 2, 'penguins', '2013-03-04 17:12:02'),
(26, 4, 1, 'flower', '2013-03-04 17:12:51'),
(27, 4, 2, 'penguins', '2013-03-04 17:13:56'),
(28, 5, 1, 'java', '2013-03-04 18:03:51'),
(29, 5, 1, 'sun', '2013-03-04 18:03:59'),
(30, 5, 1, 'oracle', '2013-03-04 18:04:16'),
(31, 5, 1, 'load', '2013-03-04 18:06:31'),
(32, 5, 1, 'loading', '2013-03-04 18:06:34'),
(33, 5, 1, 'recursion', '2013-03-04 18:10:23'),
(34, 5, 1, 'buffer', '2013-03-04 18:11:37'),
(35, 5, 1, 'full', '2013-03-04 18:12:51'),
(36, 6, 1, 'full', '2013-03-04 18:13:01'),
(37, 6, 1, 'half', '2013-03-04 18:13:29'),
(38, 5, 1, 'half', '2013-03-04 18:13:31'),
(39, 5, 1, 'baaaaaaaaaal', '2013-03-04 18:14:22'),
(40, 5, 1, 'hi azad', '2013-03-04 18:14:35'),
(41, 6, 1, 'Nahiyan', '2013-03-04 18:14:42'),
(42, 6, 1, 'jdk', '2013-03-04 18:15:41'),
(43, 6, 1, 'nahiyan', '2013-03-04 18:16:25'),
(44, 6, 1, 'full', '2013-03-04 18:16:31'),
(45, 6, 1, 'java', '2013-03-04 18:16:38'),
(46, 6, 1, 'jdk', '2013-03-04 18:16:45'),
(47, 5, 1, 'java', '2013-03-04 18:16:49'),
(48, 6, 1, 'net', '2013-03-04 18:16:50'),
(49, 6, 1, 'flow', '2013-03-04 18:16:57'),
(50, 6, 1, 'fall', '2013-03-04 18:17:01'),
(51, 6, 1, 'flower', '2013-03-04 18:17:05'),
(52, 5, 1, 'flower', '2013-03-04 18:17:14'),
(53, 6, 2, 'penguins', '2013-03-04 18:17:22'),
(54, 5, 2, 'penguins', '2013-03-04 18:17:34'),
(55, 8, 1, 'sun', '2013-03-04 22:12:55'),
(56, 8, 1, 'tree', '2013-03-04 22:13:42'),
(57, 8, 1, 'beemp3', '2013-03-04 22:18:24'),
(58, 8, 1, 'ফুল্ল', '2013-03-04 22:30:55'),
(59, 8, 1, 'flower', '2013-03-04 22:31:06'),
(60, 8, 2, 'penguins', '2013-03-04 22:31:28'),
(61, 9, 1, 'Chrysanthemum', '2013-03-05 09:10:16'),
(62, 9, 1, 'C', '2013-03-05 09:11:29'),
(63, 9, 1, 'chrysanthemum', '2013-03-05 09:12:12'),
(64, 9, 1, 'flow', '2013-03-05 09:12:28'),
(65, 9, 1, 'dor', '2013-03-05 09:12:47'),
(66, 9, 1, 'dt', '2013-03-05 09:12:48'),
(67, 9, 1, 'dot', '2013-03-05 09:12:54'),
(68, 9, 1, 'lower', '2013-03-05 09:13:45'),
(69, 9, 1, 'fool', '2013-03-05 09:13:54'),
(70, 9, 1, 'flower', '2013-03-05 09:14:12'),
(71, 9, 2, 'penguins', '2013-03-05 09:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE IF NOT EXISTS `progress` (
  `uid` int(11) NOT NULL,
  `current_puzzle_serial` int(11) NOT NULL DEFAULT '1',
  `last_correct_answer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `finished` tinyint(1) DEFAULT '0',
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`uid`, `current_puzzle_serial`, `last_correct_answer`, `finished`) VALUES
(1, 3, '2013-03-04 16:59:08', 1),
(2, 3, '2013-03-04 17:12:02', 1),
(3, 3, '2013-03-04 17:12:02', 1),
(4, 3, '2013-03-04 17:13:56', 1),
(5, 3, '2013-03-04 18:17:34', 1),
(6, 3, '2013-03-04 18:17:22', 1),
(7, 1, '2013-03-04 19:12:26', 0),
(8, 3, '2013-03-04 22:31:28', 1),
(9, 3, '2013-03-05 09:14:34', 1),
(10, 1, '2013-03-05 13:19:49', 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `puzzle`
--

INSERT INTO `puzzle` (`serial`, `photo`, `hint`, `ans`, `logic`) VALUES
(1, '18061-Chrysanthemum.jpg', 'flower', 'flower', 'flower'),
(2, '81d4e-Penguins.jpg', 'penguins', 'penguins', 'in the picture you are seeing a penguin, thats why the answer is penguin, lame enough ??');

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
  `institution` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `student_id` (`student_id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `mail`, `student_id`, `uname`, `ulevel`, `uterm`, `password`, `institution`) VALUES
(1, 'azadsalam2611@gmail.com', '0805030', 'Azad Salam', 0, 0, '114b146a8d709650705a321a54c983d1e5b5f095', 'BUET'),
(2, 'tazbinur@gmail.com', '0805040', 'Tazbinur', 0, 0, 'd7c3e2a7ef65f25f8ee61a72b91b809dd3e16afd', 'BUET'),
(3, 'saikat_107@ymail.com', '0805038', 'Saikat Chakraborty', 0, 0, '165734d6f0ec6e31f4ab6091c3a3aac4c6faf987', 'BUET'),
(4, 'funny.rupam@gmail.com', '0805016', 'RUPAM16', 0, 0, '52a0f8184c5c3c45313fd358b419c28052953953', 'BUET'),
(5, 'kzr.buet08@gmail.com', '0805059', 'kaysar abdullah', 0, 0, '915fb74cbc6c40adad4c77eefbb488db5bc6b6aa', 'BUET'),
(6, 'kayankamal@yahoo.com', '0805006', 'Nahiyan Kamal', 0, 0, '44c7fc1a5e692fccd9c3fbe433439dde3b6fd445', 'BUET'),
(7, 'monira_cse109@yahoo.com', '0805109', 'monira', 0, 0, '66265e3eb383ec6e8034d30afbd24d2b7ad3edc3', 'buet'),
(8, 'tanjimhossainsifat@gmail.com', '0805055', 'Tanjim Hossain Sifat', 0, 0, '51021970e863671a8f0ba881fd72a95ab93df818', 'BUET'),
(9, 'salvisolaiman@yahoo.com', '0805116', 'Salvi', 0, 0, 'cec9820c3df5967ff25f390d588116894b36dc1a', 'BUET'),
(10, 'sultan_ahmed_buet@yahoo.com', '0805099', 'Sultan Ahmed', 0, 0, '4d5abcfb3589f1d35411a55e481805292bec96f0', 'Buet');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
