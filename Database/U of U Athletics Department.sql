-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2021 at 11:08 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `is4460_groupproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `athletes`
--

DROP TABLE IF EXISTS `athletes`;
CREATE TABLE IF NOT EXISTS `athletes` (
  `AthleteID` int NOT NULL AUTO_INCREMENT,
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Position` varchar(30) NOT NULL,
  `AcademicLevel` varchar(30) NOT NULL,
  `GraduationDate` date NOT NULL,
  `GPA` decimal(3,2) NOT NULL,
  `Captain` tinyint(1) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `NCAAEligible` tinyint(1) NOT NULL,
  PRIMARY KEY (`AthleteID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `athletes`
--

INSERT INTO `athletes` (`AthleteID`, `LastName`, `FirstName`, `Position`, `AcademicLevel`, `GraduationDate`, `GPA`, `Captain`, `Phone`, `Email`, `NCAAEligible`) VALUES
(1, 'Brown', 'Tyson', 'Point Guard', 'Senior', '2021-12-18', '3.65', 1, '8017654321', 'tbrown@utah.edu', 1),
(2, 'Clark', 'Samantha', 'Goalkeeper', 'Junior', '2022-12-18', '3.84', 1, '8019876543', 'sclark@utah.edu', 1),
(3, 'Harmer', 'Jarod', 'Quarterback', 'Senior', '2021-12-18', '3.75', 1, '8019998888', 'jharmer@utah.edu', 1),
(4, 'Fisher', 'Sam', 'Pitcher', 'Junior', '2022-12-18', '3.77', 1, '8018889999', 'sfisher@utah.edu', 1),
(5, 'Tyler', 'Gardner', 'Catcher', 'Freshman', '2024-12-18', '3.85', 0, '8018889998', 'tgardner@utah.edu', 1),
(6, 'Cody', 'Bellinger', 'Right Fielder', 'Sophomore', '2023-12-18', '3.20', 0, '8018689898', 'cbellinger@utah.edu', 1),
(7, 'Dustin', 'Pedroia', 'Second Base', 'Junior', '2021-12-18', '3.90', 0, '8017776666', 'dpedroia@utah.edu', 1),
(8, 'Derek', 'Jeter', 'Shortstop', 'Senior', '2021-12-18', '3.75', 0, '8012223232', 'djeter@utah.edu', 1),
(9, 'Justin', 'Turner', 'Third Base', 'Freshman', '2024-12-18', '3.80', 0, '8675309090', 'jturner@utah.edu', 1),
(10, 'John', 'Buck', 'Catcher', 'Sophomore', '2023-12-18', '3.65', 0, '8016565566', 'jbuck@utah.edu', 1),
(11, 'Albert', 'Pujols', 'First Base', 'Junior', '2022-12-18', '3.15', 0, '8012581234', 'apujols@utah.edu', 1),
(12, 'Zack', 'Mathis', 'Left Fielder', 'Senior', '2021-12-18', '2.20', 0, '8015557777', 'zmathis@utah.edu', 1),
(13, 'JD', 'Martinez', 'Center Fielder', 'Freshman', '2024-12-18', '3.00', 0, '8012332233', 'jmartinez@utah.edu', 1),
(14, 'Michael', 'Jordan', 'Shooting Guard', 'Sophomore', '2023-12-18', '4.00', 1, '8012322323', 'mjordan@utah.edu', 1),
(15, 'John', 'Stockton', 'Point Guard', 'Junior', '2022-12-18', '3.20', 0, '8011211212', 'jstockton@utah.edu', 1),
(16, 'Karl', 'Malone', 'Forward', 'Senior', '2021-12-18', '3.30', 1, '8013233232', 'kmalone@utah.edu', 1),
(17, 'Greg', 'Ostertag', 'Center', 'Freshman', '2024-12-18', '2.50', 0, '8014744747', 'gostertag@utah.edu', 1),
(18, 'Tom', 'Brady', 'Quaterback', 'Sophomore', '2023-12-18', '3.80', 0, '8011222211', 'tbrady@utah.edu', 1),
(19, 'Jerry', 'Rice', 'Wide Receiver', 'Junior', '2022-12-18', '3.10', 0, '8018988989', 'jrice@utah.edu', 1),
(20, 'James', 'Empey', 'Offensive Lineman', 'Senior', '2021-12-18', '3.99', 0, '8016566565', 'jempey@utah.edu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
CREATE TABLE IF NOT EXISTS `donors` (
  `DonorID` int NOT NULL AUTO_INCREMENT,
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `RegisterDate` date NOT NULL,
  PRIMARY KEY (`DonorID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`DonorID`, `LastName`, `FirstName`, `Status`, `RegisterDate`) VALUES
(1, 'Vaughn', 'Timothy', 'Active Donor', '2005-06-07'),
(2, 'Pardoe', 'Ben', 'Active Donor', '2007-09-06'),
(3, 'Huntsman', 'John', 'Active Donor', '2009-08-07'),
(4, 'Lacky', 'Matthew', 'Active Donor', '2010-03-06'),
(5, 'Jeff', 'Bezos', 'Active Donor', '2010-04-07'),
(6, 'Bill', 'Gates', 'Active Donor', '2010-05-08'),
(7, 'Joe', 'Mama', 'Active Donor', '2010-06-09'),
(8, 'Steve', 'Jobs', 'Active Donor', '2010-07-10'),
(9, 'Casey', 'Adams', 'Active Donor', '2010-08-11'),
(10, 'Jared', 'Starling', 'Active Donor', '2010-09-12'),
(11, 'Marc', 'Lewis', 'Active Donor', '2010-10-01'),
(12, 'Michael', 'Tuero', 'Active Donor', '2010-11-02'),
(13, 'Norm', 'Gardner', 'Active Donor', '2010-12-06'),
(14, 'Rod', 'White', 'Active Donor', '2011-01-03'),
(15, 'Donna', 'Barnes', 'Active Donor', '2011-02-04'),
(16, 'Karen', 'Chugg', 'Active Donor', '2011-03-05'),
(17, 'Huck', 'Finn', 'Active Donor', '2011-04-06'),
(18, 'AJ', 'Lester', 'Active Donor', '2012-03-06'),
(19, 'Jarod', 'Ingersoll', 'Active Donor', '2012-04-07'),
(20, 'Jennifer', 'Anniston', 'Active Donor', '2012-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `EmployeeID` int NOT NULL AUTO_INCREMENT,
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `StreetAddress` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` char(2) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `Type` char(1) NOT NULL,
  `AnnualCost` decimal(9,2) NOT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `LastName`, `FirstName`, `Title`, `StreetAddress`, `City`, `State`, `ZipCode`, `Phone`, `Email`, `StartDate`, `EndDate`, `Type`, `AnnualCost`) VALUES
(1, 'Smith', 'Bill', 'System Administrator', '1234 Avenue', 'Salt Lake City', 'UT', '84112', '8011234567', 'bsmith@utah.edu', '2001-01-01', NULL, 'H', '60000.00'),
(2, 'Jones', 'Pauline', 'General Employee', '5678 Boulevard', 'Salt Lake City', 'UT', '84112', '3857654321', 'pjones@utah.edu', '2000-01-01', NULL, 'S', '50000.00'),
(3, 'Worthen', 'Brady', 'Basketball Coach', '8765 Boulevard', 'Salt Lake City', 'UT', '84112', '3852340987', 'bworthen@utah.edu', '2000-01-01', NULL, 'S', '70000.00'),
(4, 'Elert', 'Sally', 'Soccer Coach', '4321 Street', 'Salt Lake City', 'UT', '84112', '3859081234', 'selert@utah.edu', '2000-01-01', NULL, 'S', '70000.00'),
(5, 'Larriet', 'Jim', 'Football Coach', '5678 Street', 'Salt Lake City', 'UT', '84112', '3859998888', 'jlarriet@utah.edu', '2000-01-01', NULL, 'S', '90000.00'),
(6, 'Boston', 'Dave', 'Baseball Coach', '9999 Street', 'Salt Lake City', 'UT', '84112', '3859888889', 'dboston@utah.edu', '2000-01-01', NULL, 'S', '75000.00'),
(7, 'Tim', 'Duncan', 'Assistant Basketball Coach', '1357 Road', 'Salt Lake City', 'UT', '84112', '3859898989', 'tduncan@utah.edu', '2000-01-01', NULL, 'S', '55000.00'),
(8, 'Katy', 'Perry', 'Assistant Soccer Coach', '246 Road', 'Lehi', 'UT', '84043', '1234567890', 'kperry@utah.edu', '2000-02-02', NULL, 'S', '53000.00'),
(9, 'Bo', 'Jackson', 'Assistant Football Coach', '369 Street', 'Salt Lake City', 'UT', '84112', '2468246824', 'bjackson@utah.edu', '2000-02-02', NULL, 'S', '57000.00'),
(10, 'Mike', 'Trout', 'Assistant Baseball Coach', '450 Street', 'Pleasant Grove', 'UT', '84062', '0987654321', 'mtrout@utah.edu', '2000-03-03', NULL, 'S', '45000.00'),
(11, 'Lisa', 'Fernandez', 'Softball Coach', '257 Street', 'Salt Lake City', 'UT', '84112', '8769876987', 'lfernandez@utah.edu', '2000-03-04', NULL, 'S', '72000.00'),
(12, 'Rachel', 'Garcia', 'Assistant Softball Coach', '3123 Street', 'Lindon', 'UT', '84042', '2568246824', 'rgarcia@utah.edu', '2000-03-07', NULL, 'S', '35000.00'),
(13, 'Pepper', 'Potts', 'Traveling Coordinator', '456 Street', 'Salt Lake City', 'UT', '84112', '9119112113', 'ppotts@utah.edu', '2000-05-08', NULL, 'S', '40000.00'),
(14, 'Tony', 'Stark', 'Junior System Administrator', '789 Street', 'Salt Lake City', 'UT', '84112', '2568247824', 'tstark@utah.edu', '2000-05-09', NULL, 'S', '55000.00'),
(15, 'Michael', 'Scott', 'Athletic Director', '699 Street', 'Salt Lake City', 'UT', '84112', '6997998009', 'mscott@utah.edu', '2000-07-06', NULL, 'S', '80000.00'),
(16, 'Sydney', 'White', 'Receptionist', '3454 Street', 'Lehi', 'UT', '84043', '8017852143', 'swhite@utah.edu', '2000-06-08', NULL, 'S', '25000.00'),
(17, 'Mickey', 'Mantle', 'Janitor', '987 Street', 'Salt Lake City', 'UT', '84112', '2468556824', 'mmantle@utah.edu', '2000-06-07', NULL, 'S', '33000.00'),
(18, 'Benny', 'Rodriguez', 'Equipment Manager', '2435 Street', 'Pleasant Grove', 'UT', '84062', '8013764885', 'brodriguez@utah.edu', '2000-02-02', NULL, 'S', '38000.00'),
(19, 'Joe', 'Johnson', 'Security Guard', '676 Street', 'Salt Lake City', 'UT', '84112', '6766766543', 'jjohnson@utah.edu', '2000-09-09', NULL, 'S', '23000.00'),
(20, 'Bill', 'Murray', 'Security Guard', '39 Street', 'Salt Lake City', 'UT', '84112', '6789246824', 'bmurray@utah.edu', '2000-08-08', NULL, 'S', '24000.00');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `EquipmentID` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(30) NOT NULL,
  `AnnualCost` decimal(9,2) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`EquipmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`EquipmentID`, `Type`, `AnnualCost`, `Date`) VALUES
(1, 'Basketball Equipment', '39000.00', '2020-06-07'),
(2, 'Soccer Equipment', '41000.00', '2020-09-06'),
(3, 'Football Equipment', '55000.00', '2020-09-06'),
(4, 'Baseball Equipment', '40000.00', '2020-09-06'),
(5, 'Rugby Equipment', '15000.00', '2020-09-08'),
(6, 'Swimming Equipment', '10000.00', '2020-10-06'),
(7, 'Softball Equipment', '60000.00', '2020-11-06'),
(8, 'Cricket Equipment', '45000.00', '2020-09-09'),
(9, 'Lacrosse Equipment', '70000.00', '2020-09-06'),
(10, 'Tennis Equipment', '5000.00', '2020-09-06'),
(11, 'Ping-Pong Equipment', '4000.00', '2020-09-06'),
(12, 'Bowling Equipment', '40000.00', '2020-09-06'),
(13, 'Volleyball Equipment', '40000.00', '2020-09-06'),
(14, 'Track Equipment', '40000.00', '2020-09-06'),
(15, 'Pickle Ball Equipment', '40000.00', '2020-09-06'),
(16, 'Water Polo Equipment', '40000.00', '2020-09-06'),
(17, 'Mountain Bike Equipment', '40000.00', '2020-09-06'),
(18, 'Wrestling Equipment', '35000.00', '2020-09-06'),
(19, 'Dance Equipment', '25000.00', '2020-09-06'),
(20, 'Hockey Equipment', '90000.00', '2020-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `EventID` int NOT NULL AUTO_INCREMENT,
  `TeamID` int NOT NULL,
  `Venue` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Expenses` decimal(9,2) NOT NULL,
  `Opponent` varchar(30) NOT NULL,
  PRIMARY KEY (`EventID`),
  KEY `FK_Events_TeamID` (`TeamID`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `TeamID`, `Venue`, `Date`, `Expenses`, `Opponent`) VALUES
(1, 1, 'U of U', '2019-09-07', '30000.00', 'BYU'),
(2, 2, 'U of U', '2019-09-07', '20000.00', 'BYU'),
(3, 3, 'U of U', '2019-09-07', '40000.00', 'BYU'),
(4, 4, 'BYU', '2019-09-06', '35000.00', 'BYU'),
(5, 1, 'U of U', '2020-09-07', '25000.00', 'BYU'),
(6, 2, 'U of U', '2020-09-07', '40000.00', 'BYU'),
(7, 3, 'U of U', '2020-09-07', '50000.00', 'BYU'),
(8, 4, 'BYU', '2020-09-06', '60000.00', 'BYU'),
(9, 1, 'U of U', '2021-09-07', '70000.00', 'BYU'),
(10, 2, 'U of U', '2021-09-07', '80000.00', 'BYU'),
(11, 3, 'U of U', '2021-09-07', '85000.00', 'BYU'),
(12, 4, 'BYU', '2021-09-06', '95000.00', 'BYU'),
(13, 5, 'UVU', '2021-09-06', '95000.00', 'UVU'),
(14, 6, 'USC', '2021-09-06', '95000.00', 'USC'),
(15, 7, 'BYU', '2021-09-06', '95000.00', 'BYU'),
(16, 8, 'Boise', '2021-09-06', '95000.00', 'Boise State'),
(17, 9, 'U of U', '2021-09-06', '95000.00', 'SD State'),
(18, 10, 'U of U', '2021-09-06', '95000.00', 'Gonzaga'),
(19, 11, 'UVU', '2021-09-06', '95000.00', 'UVU'),
(20, 12, 'BYU', '2021-09-06', '95000.00', 'BYU'),
(21, 13, 'U of U', '2019-09-07', '30000.00', 'BYU'),
(22, 14, 'U of U', '2019-09-07', '20000.00', 'BYU'),
(23, 15, 'U of U', '2019-09-07', '40000.00', 'BYU'),
(24, 16, 'BYU', '2019-09-06', '35000.00', 'BYU'),
(25, 17, 'U of U', '2020-09-07', '25000.00', 'BYU'),
(26, 18, 'U of U', '2020-09-07', '40000.00', 'BYU'),
(27, 19, 'U of U', '2020-09-07', '50000.00', 'BYU'),
(28, 20, 'BYU', '2020-09-06', '60000.00', 'BYU');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
CREATE TABLE IF NOT EXISTS `income` (
  `IncomeID` int NOT NULL AUTO_INCREMENT,
  `TeamID` int DEFAULT NULL,
  `DonorID` int DEFAULT NULL,
  `EventID` int DEFAULT NULL,
  `Type` varchar(30) NOT NULL,
  `Amount` decimal(9,2) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`IncomeID`),
  KEY `FK_Income_TeamID` (`TeamID`),
  KEY `FK_Income_DonorID` (`DonorID`),
  KEY `FK_Income_EventID` (`EventID`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`IncomeID`, `TeamID`, `DonorID`, `EventID`, `Type`, `Amount`, `Date`) VALUES
(1, 3, 3, NULL, 'Event', '340000.00', '2019-01-01'),
(2, 4, 4, NULL, 'Event', '320000.00', '2019-01-01'),
(3, 1, 3, NULL, 'Endorsement', '320000.00', '2019-01-01'),
(4, 2, 4, NULL, 'Endorsement', '350000.00', '2019-01-01'),
(5, 3, 3, NULL, 'Endorsement', '340000.00', '2019-01-01'),
(6, 4, 4, NULL, 'Endorsement', '420000.00', '2019-01-01'),
(7, 1, 3, NULL, 'Endorsement', '320000.00', '2019-01-01'),
(8, 2, 4, NULL, 'Endorsement', '400000.00', '2019-01-01'),
(9, 5, NULL, 1, 'Event', '380000.00', '2019-01-01'),
(10, 6, NULL, 2, 'Event', '360000.00', '2019-01-01'),
(11, 5, 3, NULL, 'Endorsement', '550000.00', '2019-01-01'),
(12, 6, 4, NULL, 'Endorsement', '680000.00', '2019-01-01'),
(13, 8, NULL, 1, 'Event', '390000.00', '2019-01-01'),
(14, 7, NULL, 2, 'Event', '350000.00', '2019-01-01'),
(15, 9, 3, NULL, 'Endorsement', '440000.00', '2019-01-01'),
(16, 8, 4, NULL, 'Endorsement', '520000.00', '2019-01-01'),
(17, 10, NULL, 3, 'Event', '360000.00', '2019-01-01'),
(18, 9, NULL, 4, 'Event', '370000.00', '2019-01-01'),
(19, 11, 3, NULL, 'Endorsement', '340000.00', '2019-01-01'),
(20, 12, 4, NULL, 'Endorsement', '320000.00', '2019-01-01'),
(21, 13, 3, NULL, 'Endorsement', '320000.00', '2019-01-01'),
(22, 11, 4, NULL, 'Event', '350000.00', '2019-01-01'),
(23, 14, 3, NULL, 'Endorsement', '340000.00', '2019-01-01'),
(24, 15, 4, NULL, 'Event', '420000.00', '2019-01-01'),
(25, 16, 3, NULL, 'Endorsement', '320000.00', '2019-01-01'),
(26, 17, 4, NULL, 'Endorsement', '400000.00', '2019-01-01'),
(27, 18, NULL, 1, 'Event', '380000.00', '2019-01-01'),
(28, 19, NULL, 2, 'Event', '360000.00', '2019-01-01'),
(29, 20, 3, NULL, 'Endorsement', '550000.00', '2019-01-01'),
(30, 6, 4, NULL, 'Endorsement', '680000.00', '2021-01-01'),
(31, 8, NULL, 1, 'Event', '390000.00', '2021-01-01'),
(32, 7, NULL, 2, 'Event', '350000.00', '2021-01-01'),
(33, 9, 3, NULL, 'Endorsement', '440000.00', '2021-01-01'),
(34, 8, 4, NULL, 'Endorsement', '520000.00', '2021-01-01'),
(35, 10, NULL, 3, 'Event', '360000.00', '2021-01-01'),
(36, 9, NULL, 4, 'Event', '370000.00', '2021-01-01'),
(37, 11, 13, NULL, 'Endorsement', '320000.00', '2020-01-01'),
(38, 10, 14, NULL, 'Endorsement', '400000.00', '2020-01-01'),
(39, 11, 13, NULL, 'Endorsement', '320000.00', '2020-01-01'),
(40, 10, 14, NULL, 'Endorsement', '400000.00', '2020-01-01'),
(41, 3, 3, NULL, 'Endorsement', '340000.00', '2019-01-01'),
(42, 4, 4, NULL, 'Endorsement', '320000.00', '2019-01-01'),
(43, 1, 3, NULL, 'Endorsement', '320000.00', '2019-01-01'),
(44, 2, 4, NULL, 'Endorsement', '350000.00', '2019-01-01'),
(45, 3, 3, NULL, 'Endorsement', '340000.00', '2020-01-01'),
(46, 4, 4, NULL, 'Endorsement', '420000.00', '2020-01-01'),
(47, 1, 3, NULL, 'Endorsement', '320000.00', '2020-01-01'),
(48, 2, 4, NULL, 'Endorsement', '400000.00', '2020-01-01'),
(49, 5, NULL, 1, 'Event', '380000.00', '2020-01-01'),
(50, 6, NULL, 2, 'Event', '360000.00', '2020-01-01'),
(51, 5, 3, NULL, 'Endorsement', '550000.00', '2021-01-01'),
(52, 6, 4, NULL, 'Endorsement', '680000.00', '2021-01-01'),
(53, 8, NULL, 1, 'Event', '390000.00', '2021-01-01'),
(54, 7, NULL, 2, 'Event', '350000.00', '2021-01-01'),
(55, 9, 3, NULL, 'Endorsement', '440000.00', '2021-01-01'),
(56, 8, 4, NULL, 'Endorsement', '520000.00', '2021-01-01'),
(57, 10, NULL, 3, 'Event', '360000.00', '2021-01-01'),
(58, 9, NULL, 4, 'Event', '370000.00', '2021-01-01'),
(59, 11, 13, NULL, 'Endorsement', '320000.00', '2020-01-01'),
(60, 10, 14, NULL, 'Endorsement', '400000.00', '2020-01-01'),
(61, 3, 3, NULL, 'Event', '340000.00', '2021-01-01'),
(62, 4, 4, NULL, 'Event', '320000.00', '2021-01-01'),
(63, 1, 3, NULL, 'Endorsement', '320000.00', '2021-01-01'),
(64, 2, 4, NULL, 'Endorsement', '350000.00', '2021-01-01'),
(65, 3, 3, NULL, 'Endorsement', '340000.00', '2021-01-01'),
(66, 4, 4, NULL, 'Endorsement', '420000.00', '2021-01-01'),
(67, 1, 3, NULL, 'Endorsement', '320000.00', '2021-01-01'),
(68, 2, 4, NULL, 'Endorsement', '400000.00', '2021-01-01'),
(69, 5, NULL, 1, 'Event', '380000.00', '2021-01-01'),
(70, 6, NULL, 2, 'Event', '360000.00', '2021-01-01'),
(71, 5, 3, NULL, 'Endorsement', '550000.00', '2021-01-01'),
(72, 6, 4, NULL, 'Endorsement', '680000.00', '2021-01-01'),
(73, 8, NULL, 1, 'Event', '390000.00', '2021-01-01'),
(74, 7, NULL, 2, 'Event', '350000.00', '2021-01-01'),
(75, 9, 3, NULL, 'Endorsement', '440000.00', '2021-01-01'),
(76, 8, 4, NULL, 'Endorsement', '520000.00', '2021-01-01'),
(77, 10, NULL, 3, 'Event', '360000.00', '2021-01-01'),
(78, 9, NULL, 4, 'Event', '370000.00', '2021-01-01'),
(79, 11, 3, NULL, 'Endorsement', '340000.00', '2021-01-01'),
(80, 12, 4, NULL, 'Endorsement', '320000.00', '2021-01-01'),
(81, 13, 3, NULL, 'Endorsement', '320000.00', '2021-01-01'),
(82, 11, 4, NULL, 'Event', '350000.00', '2021-01-01'),
(83, 14, 3, NULL, 'Endorsement', '340000.00', '2021-01-01'),
(84, 15, 4, NULL, 'Event', '420000.00', '2021-01-01'),
(85, 16, 3, NULL, 'Endorsement', '320000.00', '2021-01-01'),
(86, 17, 4, NULL, 'Endorsement', '400000.00', '2021-01-01'),
(87, 18, NULL, 1, 'Event', '380000.00', '2021-01-01'),
(88, 19, NULL, 2, 'Event', '360000.00', '2021-01-01'),
(89, 20, 3, NULL, 'Endorsement', '550000.00', '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
CREATE TABLE IF NOT EXISTS `ranks` (
  `RankID` tinyint NOT NULL AUTO_INCREMENT,
  `Ranks` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`RankID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`RankID`, `Ranks`, `Date`) VALUES
(1, 'DI', '2000-01-07'),
(2, 'DII', '2000-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `RoleID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Role` varchar(30) NOT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `Username`, `Role`) VALUES
(1, 'bsmith', 'Admin'),
(2, 'pjones', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

DROP TABLE IF EXISTS `scholarships`;
CREATE TABLE IF NOT EXISTS `scholarships` (
  `ScholarshipID` int NOT NULL AUTO_INCREMENT,
  `AthleteID` int NOT NULL,
  `DonorID` int NOT NULL,
  `Amount` decimal(9,2) NOT NULL,
  `Date` date NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Requirements` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL,
  PRIMARY KEY (`ScholarshipID`),
  KEY `FK_Scholarships_AthleteID` (`AthleteID`),
  KEY `FK_Scholarships_DonorID` (`DonorID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`ScholarshipID`, `AthleteID`, `DonorID`, `Amount`, `Date`, `Type`, `Requirements`, `Status`) VALUES
(1, 1, 1, '60000.00', '2020-01-01', 'Academic', 'Maintain 3.6 GPA', 'Active'),
(2, 2, 2, '70000.00', '2021-01-02', 'Academic', 'Maintain 3.7 GPA', 'Active'),
(3, 3, 1, '1000.00', '2021-01-03', 'Academic', 'Maintain 3.8 GPA', 'Active'),
(4, 4, 1, '25000.00', '2021-01-04', 'Academic', 'Maintain 3.8 GPA', 'Active'),
(5, 5, 2, '2000.00', '2021-01-08', 'Academic', 'Maintain 3.9 GPA', 'Active'),
(6, 6, 3, '3000.00', '2021-01-10', 'Academic', 'Maintain 3.2 GPA', 'Active'),
(7, 7, 4, '4000.00', '2021-02-01', 'Academic', 'Maintain 3.3 GPA', 'Active'),
(8, 8, 5, '5000.00', '2021-02-02', 'Academic', 'Maintain 3.4 GPA', 'Active'),
(9, 9, 6, '6000.00', '2021-03-01', 'Academic', 'Maintain 3.5 GPA', 'Active'),
(10, 10, 7, '7000.00', '2021-04-01', 'Academic', 'Maintain 3.6 GPA', 'Active'),
(11, 11, 8, '8000.00', '2021-05-01', 'Academic', 'Maintain 3.7 GPA', 'Active'),
(12, 12, 9, '9000.00', '2021-06-01', 'Academic', 'Maintain 3.8 GPA', 'Active'),
(13, 13, 10, '10000.00', '2021-07-01', 'Academic', 'Maintain 3.9 GPA', 'Active'),
(14, 14, 11, '11000.00', '2021-08-01', 'Academic', 'Maintain 3.0 GPA', 'Active'),
(15, 15, 12, '12000.00', '2021-09-01', 'Academic', 'Maintain 3.1 GPA', 'Active'),
(16, 16, 13, '13000.00', '2022-01-08', 'Academic', 'Maintain 3.2 GPA', 'Active'),
(17, 17, 14, '14000.00', '2022-01-01', 'Academic', 'Maintain 3.3 GPA', 'Active'),
(18, 18, 15, '15000.00', '2023-01-01', 'Academic', 'Maintain 3.4 GPA', 'Active'),
(19, 19, 16, '16000.00', '2023-01-01', 'Academic', 'Maintain 3.5 GPA', 'Active'),
(20, 20, 17, '17000.00', '2024-01-01', 'Academic', 'Maintain 3.7 GPA', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `teamathletes`
--

DROP TABLE IF EXISTS `teamathletes`;
CREATE TABLE IF NOT EXISTS `teamathletes` (
  `AthleteID` int NOT NULL,
  `TeamID` int NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  PRIMARY KEY (`AthleteID`,`TeamID`),
  KEY `FK_TeamAthletes_TeamID` (`TeamID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teamathletes`
--

INSERT INTO `teamathletes` (`AthleteID`, `TeamID`, `StartDate`, `EndDate`) VALUES
(1, 1, '2020-01-01', '2021-12-18'),
(2, 2, '2021-01-01', '2022-12-18'),
(3, 3, '2021-01-01', '2021-12-18'),
(4, 4, '2021-01-01', '2022-12-18'),
(5, 20, '2021-01-01', '2022-12-18'),
(6, 19, '2021-01-01', '2022-12-18'),
(7, 18, '2021-01-01', '2022-12-18'),
(8, 17, '2021-01-01', '2022-12-18'),
(9, 16, '2021-01-01', '2022-12-18'),
(10, 15, '2021-01-01', '2022-12-18'),
(11, 14, '2021-01-01', '2022-12-18'),
(12, 13, '2021-01-01', '2022-12-18'),
(13, 5, '2021-01-01', '2022-12-18'),
(14, 6, '2021-01-01', '2022-12-18'),
(15, 7, '2021-01-01', '2022-12-18'),
(16, 8, '2021-01-01', '2022-12-18'),
(17, 9, '2021-01-01', '2022-12-18'),
(18, 10, '2021-01-01', '2022-12-18'),
(19, 11, '2021-01-01', '2022-12-18'),
(20, 12, '2021-01-01', '2022-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `teamemployees`
--

DROP TABLE IF EXISTS `teamemployees`;
CREATE TABLE IF NOT EXISTS `teamemployees` (
  `TeamID` int NOT NULL,
  `EmployeeID` int NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  PRIMARY KEY (`TeamID`,`EmployeeID`),
  KEY `FK_TeamEmployees_EmployeeID` (`EmployeeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teamemployees`
--

INSERT INTO `teamemployees` (`TeamID`, `EmployeeID`, `StartDate`, `EndDate`) VALUES
(1, 3, '2005-01-01', NULL),
(2, 4, '2006-01-01', NULL),
(3, 5, '2007-01-01', NULL),
(4, 6, '2008-01-01', NULL),
(5, 7, '2009-01-01', NULL),
(6, 8, '2005-01-01', NULL),
(7, 9, '2006-01-01', NULL),
(8, 10, '2007-01-01', NULL),
(9, 11, '2008-01-01', NULL),
(10, 12, '2009-01-01', NULL),
(11, 13, '2005-01-01', NULL),
(12, 14, '2006-01-01', NULL),
(13, 15, '2007-01-01', NULL),
(14, 16, '2008-01-01', NULL),
(15, 17, '2009-01-01', NULL),
(16, 18, '2005-01-01', NULL),
(17, 19, '2006-01-01', NULL),
(18, 20, '2007-01-01', NULL),
(19, 1, '2008-01-01', NULL),
(20, 2, '2009-01-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `TeamID` int NOT NULL AUTO_INCREMENT,
  `RankID` int NOT NULL,
  `EquipmentID` int NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `EstablishedDate` date NOT NULL,
  PRIMARY KEY (`TeamID`),
  KEY `FK_Teams_RankID` (`RankID`),
  KEY `FK_Teams_EquipmentID` (`EquipmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`TeamID`, `RankID`, `EquipmentID`, `Type`, `Email`, `EstablishedDate`) VALUES
(1, 1, 1, 'Basketball Team', 'bball@utah.edu', '2000-01-01'),
(2, 2, 2, 'Soccer Team', 'soccer@utah.edu', '2000-01-01'),
(3, 1, 3, 'Football Team', 'football@utah.edu', '2000-01-01'),
(4, 2, 4, 'Baseball Team', 'baseball@utah.edu', '2000-01-01'),
(5, 1, 5, 'Rugby Team', 'Rugby@utah.edu', '2000-01-01'),
(6, 2, 6, 'Swimming Team', 'Swimming@utah.edu', '2000-01-01'),
(7, 2, 7, 'Softball Team', 'Softball@utah.edu', '2000-01-01'),
(8, 1, 8, 'Cricket Team', 'cricket@utah.edu', '2000-01-01'),
(9, 1, 9, 'Lacrosse Team', 'Lacrosse@utah.edu', '2000-01-01'),
(10, 2, 10, 'Tennis Team', 'Tennis@utah.edu', '2000-01-01'),
(11, 1, 11, 'Ping-Pong Team', 'ping-pong@utah.edu', '2000-01-01'),
(12, 2, 12, 'Bowling Team', 'bowling@utah.edu', '2000-01-01'),
(13, 1, 13, 'Volleyball Team', 'volleyball@utah.edu', '2000-01-01'),
(14, 2, 14, 'Track Team', 'track@utah.edu', '2000-01-01'),
(15, 1, 15, 'Pickle Ball Team', 'pickleball@utah.edu', '2000-01-01'),
(16, 2, 16, 'Water Polo Team', 'waterpolo@utah.edu', '2000-01-01'),
(17, 1, 17, 'Mountain Bike Team', 'mtnbike@utah.edu', '2000-01-01'),
(18, 2, 18, 'Wrestling Team', 'wrestling@utah.edu', '2000-01-01'),
(19, 1, 19, 'Dance Team', 'dance@utah.edu', '2000-01-01'),
(20, 2, 20, 'Hockey Team', 'hockey@utah.edu', '2000-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `EmployeeID` int NOT NULL,
  `RoleID` int NOT NULL,
  `forename` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `FK_Teams_EmployeeID` (`EmployeeID`),
  KEY `FK_Teams_RoleID` (`RoleID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` ( `EmployeeID`, `RoleID`, `forename`, `surname`, `username`, `password`) VALUES
(1, 1, 'Bill', 'Smith', 'bsmith', '$2y$10$L34fJb9O4dfDM3G9YMHF3e5cNXk5XRyguKX7n14NWFvadIH0INmj2'),
(2, 2, 'Pauline', 'Jones', 'pjones', '$2y$10$EGwJM.4rEj7aXePPM1MZEOrxi.lm5wv3ea4DppPYqSBZ9MxYPf9Xm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
