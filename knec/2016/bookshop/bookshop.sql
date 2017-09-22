-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 09:19 AM
-- Server version: 5.5.27
-- PHP Version: 5.5.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemid` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `regdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `name`, `desc`, `regdate`) VALUES
(1, 'Plain papers', 'They are printing papers in reams', '2016-05-18 17:50:39'),
(2, 'Pen', 'Sharp point', '2016-05-22 17:14:22'),
(5, 'Mark pens', 'Mark pens', '2016-05-22 17:15:55'),
(6, 'Pencil', 'Pencil big', '2016-05-22 17:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `myitems`
--

CREATE TABLE IF NOT EXISTS `myitems` (
  `myid` int(15) NOT NULL AUTO_INCREMENT,
  `suppid` varchar(50) DEFAULT NULL,
  `itemid` int(15) DEFAULT NULL,
  `quantity` int(15) DEFAULT NULL,
  `amount` int(15) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `regdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`myid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `myitems`
--

INSERT INTO `myitems` (`myid`, `suppid`, `itemid`, `quantity`, `amount`, `desc`, `regdate`) VALUES
(1, 'Supplier1', 1, 20, 1000000, 'They are printing papers in reams', '2016-05-19 18:48:52'),
(2, 'Supplier1', 2, 1000, 10, 'Sharp point', '2016-05-22 17:43:51'),
(3, 'Supplier1', 4, 1000, 10, 'Pencils', '2016-05-22 17:43:57'),
(4, 'Supplier1', 6, 1000, 2, 'Pencil big', '2016-05-22 17:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbbook`
--

CREATE TABLE IF NOT EXISTS `tbbook` (
  `bookid` int(15) NOT NULL AUTO_INCREMENT,
  `myid` int(15) DEFAULT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `quantity` int(15) DEFAULT NULL,
  `amount` int(15) DEFAULT NULL,
  `status` enum('Pending','Approved','Delivered','Cancelled','Declined') DEFAULT 'Pending',
  `desc` varchar(200) DEFAULT NULL,
  `regdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbbook`
--

INSERT INTO `tbbook` (`bookid`, `myid`, `userid`, `quantity`, `amount`, `status`, `desc`, `regdate`) VALUES
(1, 1, 'Shop1', 20, 1000000, 'Delivered', 'They are printing papers in reams', '2016-05-22 18:15:18'),
(2, 1, 'Shop1', 20, 1000000, 'Delivered', 'They are printing papers in reams', '2016-05-22 18:14:58'),
(3, 4, 'Shop1', 10, 2, 'Cancelled', 'Pencil big', '2016-05-22 18:15:51'),
(4, 2, 'Shop1', 10, 10, 'Cancelled', 'Sharp point', '2016-05-22 18:13:08'),
(5, 4, 'Shop1', 10, 2, 'Approved', 'Pencil big', '2016-05-22 18:18:44'),
(6, 2, 'Shop1', 10, 10, 'Approved', 'Sharp point', '2016-05-22 18:18:36'),
(7, 1, 'Shop1', 2, 1000000, 'Declined', 'They are printing papers in reams', '2016-05-22 18:18:18'),
(8, 2, 'Shop1', 10, 10, 'Declined', 'Sharp point', '2016-05-22 18:18:11'),
(9, 4, 'Shop1', 5, 2, 'Pending', 'Pencil big', '2016-05-22 18:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplier`
--

CREATE TABLE IF NOT EXISTS `tbsupplier` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `regdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsupplier`
--

INSERT INTO `tbsupplier` (`fname`, `lname`, `email`, `address`, `phone`, `username`, `password`, `regdate`) VALUES
('F name', 'L name', 'supplier@sup.com', 'My location', '071234565', 'Supplier1', 'Supplier1', '2016-05-22 10:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `regdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`fname`, `lname`, `email`, `address`, `phone`, `username`, `password`, `regdate`) VALUES
('F name', 'L name', 'shop@shop.com', 'My location', '0723334542', 'Shop1', 'Shop1', '2016-05-22 10:04:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
