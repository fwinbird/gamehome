-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2015 at 03:30 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hero`
--

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE IF NOT EXISTS `camp` (
  `CampID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CampName` varchar(100) DEFAULT NULL,
  `TextCN` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CampID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `GenderID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `GenderName` varchar(20) DEFAULT NULL,
  `TextCN` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`GenderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE IF NOT EXISTS `hero` (
  `heroid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `heroname` varchar(100) DEFAULT NULL,
  `vocationid` int(10) unsigned NOT NULL,
  `raceid` int(10) unsigned NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`heroid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`heroid`, `heroname`, `vocationid`, `raceid`, `gender`, `createdAt`, `updatedAt`) VALUES
(1, 'heroname1', 0, 0, '0', NULL, NULL),
(2, 'heroname2', 0, 0, '1', NULL, NULL),
(3, 'heroname3', 33, 33, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `raceid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `racename` varchar(100) DEFAULT NULL,
  `raceavtar` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`raceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `SkillID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SkillName` varchar(100) DEFAULT NULL,
  `TextCN` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SkillID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `step`
--

CREATE TABLE IF NOT EXISTS `step` (
  `StepID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `StepName` varchar(100) DEFAULT NULL,
  `TextCN` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`StepID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vocation`
--

CREATE TABLE IF NOT EXISTS `vocation` (
  `VocationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VocationName` varchar(100) DEFAULT NULL,
  `TextCN` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`VocationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
