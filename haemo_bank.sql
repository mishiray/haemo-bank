-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2021 at 12:50 AM
-- Server version: 5.7.28
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haemo_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_data`
--

DROP TABLE IF EXISTS `blood_data`;
CREATE TABLE IF NOT EXISTS `blood_data` (
  `blood_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `blood_group` varchar(30) NOT NULL,
  `blood_type` varchar(30) NOT NULL,
  `blood_test` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`blood_id`),
  UNIQUE KEY `email` (`email`)
); 
--
-- Dumping data for table `blood_data`
--

INSERT INTO `blood_data` (`blood_id`, `email`, `blood_group`, `blood_type`, `blood_test`, `status`, `date_added`) VALUES
(1, 'admin@mail.com', 'a', 'a-plus', 1, 1, '2021-04-12 01:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `compatibility`
--

DROP TABLE IF EXISTS `compatibility`;
CREATE TABLE IF NOT EXISTS `compatibility` (
  `blood_type` varchar(30) NOT NULL,
  `give` longtext,
  `receive` longtext
); 
--
-- Dumping data for table `compatibility`
--

INSERT INTO `compatibility` (`blood_type`, `give`, `receive`) VALUES
('o-plus', '[\"a-plus\",\"o-plus\",\"b-plus\",\"ab-plus\"]', '[\"o-plus\",\"o-minus\"]'),
('o-minus', '[\"a-plus\",\"a-minus\",\"o-plus\",\"o-minus\",\"b-plus\",\"b-minus\",\"ab-minus\",\"ab-plus\"]', '[\"o-minus\"]'),
('a-plus', '[\"a-plus\",\"ab-plus\"]', '[\"a-plus\",\"a-minus\",\"o-plus\",\"o-minus\"]'),
('a-minus', '[\"ab-minus\",\"a-minus\",\"ab-plus\",\"a-plus\"]', '[\"a-minus\",\"o-minus\"]'),
('b-plus', '[\"b-plus\",\"ab-plus\"]', '[\"b-plus\",\"b-minus\",\"o-plus\",\"o-minus\"]'),
('b-minus', '[\"b-plus\",\"b-minus\",\"ab-minus\",\"ab-plus\"]', '[\"b-minus\",\"o-minus\"]'),
('ab-plus', '[\"ab-plus\"]', '[\"a-plus\",\"a-minus\",\"o-plus\",\"o-minus\",\"b-plus\",\"b-minus\",\"ab-minus\",\"ab-plus\"]'),
('ab-minus', '[\"ab-minus\",\"ab-plus\"]', '[\"ab-minus\",\"a-minus\",\"b-minus\",\"o-minus\"]');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
CREATE TABLE IF NOT EXISTS `donor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `blood_amount` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);
--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `activity` longtext NOT NULL,
  `table` varchar(50) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
); 
--
-- Dumping data for table `log`
--

--
-- Table structure for table `recipients`
--

DROP TABLE IF EXISTS `recipients`;
CREATE TABLE IF NOT EXISTS `recipients` (
  `token` varchar(10) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `blood_amount` int(11) NOT NULL,
  `date_needed` datetime NOT NULL,
  `purpose` varchar(250) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
); 
--
-- Table structure for table `transact`
--

DROP TABLE IF EXISTS `transact`;
CREATE TABLE IF NOT EXISTS `transact` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(10) DEFAULT NULL,
  `recipient_id` varchar(100) NOT NULL,
  `donor_id` varchar(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`),
  KEY `recipient_id` (`recipient_id`),
  KEY `donor_id` (`donor_id`)
); 
--
-- Table structure for table `userprofile`
--

DROP TABLE IF EXISTS `userprofile`;
CREATE TABLE IF NOT EXISTS `userprofile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `userrole` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
);
--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `name`, `phone`, `gender`, `address`, `dob`, `email`, `userrole`, `password`, `status`, `date_added`) VALUES
(1, 'John Doe', '08011223344', 'male', '15 address', '2000-10-10', 'admin@mail.com', 'sudo', 'cGFzc3dvcmQ=', 1, '2021-04-11 22:46:33');