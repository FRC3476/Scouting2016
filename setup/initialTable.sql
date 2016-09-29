-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2016 at 04:00 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `scouting`
--
CREATE DATABASE IF NOT EXISTS `scouting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `scouting`;

-- --------------------------------------------------------

--
-- Table structure for table `16template_headscoutinput`
--

CREATE TABLE IF NOT EXISTS `16template_headscoutinput` (
  `matchNum` int(5) NOT NULL,
  `redGroupA` text NOT NULL,
  `redGroupB` text NOT NULL,
  `redGroupC` text NOT NULL,
  `redGroupD` text NOT NULL,
  `blueGroupA` text NOT NULL,
  `blueGroupB` text NOT NULL,
  `blueGroupC` text NOT NULL,
  `blueGroupD` text NOT NULL,
  `redTeam1` int(5) NOT NULL,
  `redTeam2` int(5) NOT NULL,
  `redTeam3` int(5) NOT NULL,
  `blueTeam1` int(5) NOT NULL,
  `blueTeam2` int(5) NOT NULL,
  `blueTeam3` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `16template_headscoutmatchin`
--

CREATE TABLE IF NOT EXISTS `16template_headscoutmatchin` (
  `matchNum` int(5) NOT NULL,
  `redFinal` int(10) NOT NULL,
  `blueFinal` int(10) NOT NULL,
  `Strategy` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `16template_matchinput`
--

CREATE TABLE IF NOT EXISTS `16template_matchinput` (
  `user` text NOT NULL,
  `ID` varchar(8) NOT NULL,
  `matchNum` int(3) NOT NULL,
  `teamNum` int(5) NOT NULL,
  `allianceColor` text NOT NULL,
  `defenseReach` tinyint(1) NOT NULL,
  `crossDefense` text NOT NULL,
  `highShotsMadeA` int(10) NOT NULL,
  `highShotsAttemptA` int(10) NOT NULL,
  `lowShotsMadeA` int(10) NOT NULL,
  `lowShotsAttemptA` int(10) NOT NULL,
  `highShotsMadeT` int(10) NOT NULL,
  `lowShotsMadeT` int(10) NOT NULL,
  `highShotsMissedT` int(5) NOT NULL,
  `groupA` text NOT NULL,
  `groupB` text NOT NULL,
  `groupC` text NOT NULL,
  `groupD` text NOT NULL,
  `issues` text NOT NULL,
  `lowBar` tinyint(1) NOT NULL,
  `scales` tinyint(1) NOT NULL,
  `scalesExtent` text NOT NULL,
  `challenge` tinyint(1) NOT NULL,
  `comments` blob NOT NULL,
  `DefenseA` int(3) NOT NULL,
  `DefenseB` int(3) NOT NULL,
  `DefenseC` int(3) NOT NULL,
  `DefenseD` int(3) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `16template_pitscout`
--

CREATE TABLE IF NOT EXISTS `16template_pitscout` (
  `TeamNumber` varchar(5) NOT NULL,
  `RobotWeight` varchar(5) NOT NULL,
  `NumBatteries` varchar(5) NOT NULL,
  `BatteriesCharged` varchar(5) NOT NULL,
  `Comments` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `16template_userdatabase`
--

CREATE TABLE IF NOT EXISTS `16template_userdatabase` (
  `Name` tinytext NOT NULL,
  `ID` varchar(20) NOT NULL,
  `isLoggedIn` int(2) NOT NULL DEFAULT '0',
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
