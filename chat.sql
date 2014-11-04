-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2013 at 02:11 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `mes_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mes_body` varchar(255) NOT NULL,
  `chattime` bigint(20) NOT NULL,
  PRIMARY KEY (`mes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mes_id`, `user_id`, `mes_body`, `chattime`) VALUES
(2, 8, 'go', 1370846012),
(3, 8, 'not go', 1370846029),
(4, 8, 'go', 1339742113),
(5, 8, 'hi dream', 1370241527),
(6, 3, 'ji', 1370846786),
(7, 3, 'nice job', 1370846856),
(8, 8, 'hi threr', 1370847094),
(9, 3, 'hi', 1370851056),
(10, 3, 'hi', 1370851838),
(11, 1, 'I have to go there ', 1370852157),
(12, 3, 'I have to make my ajax style more attractive and beautiful so be carefull about your style', 1370852536);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `online_status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `online_status`) VALUES
(1, 'jim', '123', 0),
(2, 'jack', '456', 0),
(3, 'dreams', '218837', 1),
(4, 'Tuhin', '789', 0),
(5, 'sadi', '456', 0),
(6, 'sadi', '456', 0),
(7, 'sadi', '456', 0),
(8, 'admin', '2013', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
