-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2013 at 11:11 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `frsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(20) NOT NULL auto_increment,
  `firstname` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `whomtosee` varchar(200) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `signin` int(10) NOT NULL,
  `area` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `firstname`, `surname`, `date`, `whomtosee`, `purpose`, `timein`, `timeout`, `signin`, `area`) VALUES
(1, 'mustapha ', 'Suleiman', '2000-02-13', 'bisalah', 'official', '11:42:26', '11:45:58', 0, 'level 2'),
(2, 'musa', 'ali', '2000-02-13', 'musty', 'tosee mustapha offically', '11:44:06', '11:45:55', 0, 'level 2 (Office area)'),
(3, 'Bello', 'Mohammed', '2000-02-13', 'Co-ordinator', 'Official', '12:53:30', '12:54:41', 0, 'level 2 (Office area)'),
(4, 'musty', 'skajlhis', '2013-02-15', 'HGL,', 'ihlA', '00:00:33', '00:00:00', 1, 'level 2 (Office area)'),
(5, 'a', 'a', '2013-02-19', 'a', 'aaaa', '11:02:27', '00:00:00', 1, 'level 2 (Office area)');
