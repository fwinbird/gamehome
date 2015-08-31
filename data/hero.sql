-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2015 at 02:12 AM
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
CREATE DATABASE `hero` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hero`;

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `race` (
  `raceid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `racename` varchar(100) DEFAULT NULL,
  `raceavtar` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`raceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `hero` (
  `heroid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `heroname` varchar(100) DEFAULT NULL,
  `vocationid` int(10) unsigned NOT NULL,
  `raceid`int(10) unsigned NOT NULL,
  `gender` varchar(1) DEFAULT NULL,  
  PRIMARY KEY (`heroid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
