-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2015 at 11:53 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `footsquareapi`
--
CREATE DATABASE IF NOT EXISTS `footsquareapi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `footsquareapi`;

-- --------------------------------------------------------

--
-- Table structure for table `gameplayers`
--

DROP TABLE IF EXISTS `gameplayers`;
CREATE TABLE IF NOT EXISTS `gameplayers` (
  `GamePlayerID` int(11) NOT NULL AUTO_INCREMENT,
  `GameID` int(11) NOT NULL,
  `PlayerID` int(11) NOT NULL,
  PRIMARY KEY (`GamePlayerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gameplayers`
--

INSERT INTO `gameplayers` (`GamePlayerID`, `GameID`, `PlayerID`) VALUES
(1, 1, 2),
(2, 1, 5),
(3, 1, 6),
(4, 1, 7),
(5, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `GameID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `StartTime` timestamp NULL DEFAULT NULL,
  `StopTime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`GameID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`GameID`, `Date`, `StartTime`, `StopTime`) VALUES
(1, '2015-04-09', '2015-04-10 18:53:26', '2015-04-10 18:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

DROP TABLE IF EXISTS `methods`;
CREATE TABLE IF NOT EXISTS `methods` (
  `MethodID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(36) NOT NULL,
  `Description` varchar(256) NOT NULL,
  PRIMARY KEY (`MethodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `methods`
--

INSERT INTO `methods` (`MethodID`, `Name`, `Description`) VALUES
(1, 'Kill', 'A normal attack where the ball lands twice in the player who was killed''s square'),
(2, 'Car Gap', 'When the ball lands between 2 cars are it''s near impossible to return'),
(3, 'Header', 'Hitting the ball with your head into an opponent square'),
(4, 'Catch', 'Securing the ball between knees and/or legs long enough to waddle and thoroughly mock your opponent.');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `PlayerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(36) NOT NULL,
  `LastName` varchar(36) NOT NULL,
  PRIMARY KEY (`PlayerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`PlayerID`, `FirstName`, `LastName`) VALUES
(1, 'Brock', 'Ellis'),
(2, 'Ryan', 'Cameron'),
(3, 'Brad', 'Ellis'),
(4, 'Jamie', 'Henrickson'),
(5, 'Sam', 'Freund'),
(6, 'Jeremiah', 'Bohling'),
(7, 'Jon', 'Ronhovde'),
(8, 'Corbin', 'Smith'),
(9, 'Chris', 'Jones');

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

DROP TABLE IF EXISTS `rounds`;
CREATE TABLE IF NOT EXISTS `rounds` (
  `RoundID` int(11) NOT NULL AUTO_INCREMENT,
  `GameID` int(11) NOT NULL,
  `KillerPlayerID` int(11) NOT NULL,
  `KilledPlayerID` int(11) NOT NULL,
  `Method` varchar(36) NOT NULL,
  PRIMARY KEY (`RoundID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
