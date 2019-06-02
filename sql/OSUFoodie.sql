-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Jun 02, 2019 at 01:19 PM
-- Server version: 10.3.13-MariaDB-log
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_horinez`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `Account_ID` char(6) NOT NULL,
  `Username` char(20) NOT NULL,
  `Password` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`Account_ID`, `Username`, `Password`) VALUES
('111111', 'John147', 'pass123'),
('222314', 'blakehead', 'thelongnight'),
('345313', 'popper', '123456789'),
('454354', 'admin', 'qwerty'),
('540000', 'onidman', 'oregon'),
('555555', 'jacobholt_32', '10301980'),
('666542', 'buddy123', 'jan101980'),
('721377', 'nomore', 'please'),
('888992', 'yeahbuddy', 'longpassword'),
('999999', 'ALLCAPS', 'PASSWORDLONG');

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `item_ID` char(6) NOT NULL,
  `item_name` char(20) NOT NULL,
  `restaurant_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`item_ID`, `item_name`, `restaurant_ID`) VALUES
('100000', 'Fried Rice', '310000'),
('123000', 'Curry with Rice', '120000'),
('123122', 'Alfredo Pasta', '123234'),
('123123', 'Hamburger', '123234'),
('123456', 'Spaghetti', '123234'),
('150000', 'Crown Royal', '320000'),
('234567', 'Cheeseburger', '250000'),
('344123', 'Fried Noodles', '250050'),
('345000', 'Mashed Potatoes', '312500'),
('345678', 'Chicken Wings', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `Owner`
--

CREATE TABLE `Owner` (
  `Owner_ID` char(6) NOT NULL,
  `Owner_name` char(20) NOT NULL,
  `Account_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Owner`
--

INSERT INTO `Owner` (`Owner_ID`, `Owner_name`, `Account_ID`) VALUES
('234567', 'Johnny', '111111'),
('345678', 'Johnny', '222314'),
('352356', 'Alicia Durant', '999999'),
('456789', 'Super Johnny', '345313'),
('500000', 'Kuai Liang', '540000'),
('534242', 'Emma Morris', '888992'),
('654321', 'Mike', '454354'),
('765432', 'John Thomas', '555555'),
('876543', 'Zach', '666542'),
('987654', 'Julie Tracy', '721377');

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `restaurant_ID` char(6) NOT NULL,
  `restaurant_name` char(20) NOT NULL,
  `address` char(20) NOT NULL,
  `owner_id` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Restaurant`
--

INSERT INTO `Restaurant` (`restaurant_ID`, `restaurant_name`, `address`, `owner_id`) VALUES
('120000', 'Mcdonalds King', '4321 Aquafina Drive', '876543'),
('123234', 'La Grande', '2235 Moon Way', '234567'),
('250000', 'Fire Wing Place', '3523 South Street', '345678'),
('250050', 'The Last Laugh', '5432 Easterhead Aven', '987654'),
('300000', 'New Hotness', '5432 Apartment Compl', '654321'),
('310000', 'Place', '2345 Not-Monroe Stre', '456789'),
('312500', 'Switch', '3214 5th Street Apt', '534242'),
('320000', 'Olive Garden 2', '1234 Dasani Way', '765432'),
('400000', 'Generic Name', '123 Fake Street', '352356'),
('450000', 'Better Burger', '4th Floor Kerr', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `Review_ID` char(6) NOT NULL,
  `rating` decimal(3,2) NOT NULL,
  `description` char(100) NOT NULL,
  `sID` char(6) NOT NULL,
  `item_ID` char(6) DEFAULT NULL,
  `restaurant_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`Review_ID`, `rating`, `description`, `sID`, `item_ID`, `restaurant_ID`) VALUES
('123145', '4.70', 'It was Okay as Okay could be', '321333', NULL, '123234'),
('123234', '0.00', 'Awful', '321333', '123456', '123234'),
('123236', '3.00', 'Okay', '321314', '234567', '250000'),
('123456', '5.00', 'Perfect', '321333', '123123', '123234'),
('154356', '3.20', 'Okay', '456777', '234567', '250050'),
('234523', '4.10', 'Terrible', '454354', '100000', '310000'),
('324521', '2.00', 'no.', '321333', '345678', '300000'),
('324531', '2.10', 'no.', '233465', '345678', '312500'),
('432562', '0.50', 'A really long message to see the length that we can support', '654363', '150000', '320000'),
('432565', '4.00', 'Not bad', '876686', '123123', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `sID` char(6) NOT NULL,
  `sname` char(20) NOT NULL,
  `Account_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`sID`, `sname`, `Account_ID`) VALUES
('233465', 'Gordon Pal', '721377'),
('321314', 'Michael', '454354'),
('321333', 'Joseph', '111111'),
('343442', 'John', '222314'),
('454354', 'Super Kon', '345313'),
('456777', 'Kayla Song', '999999'),
('500500', 'Hanzo Hasashi', '540000'),
('543534', 'Tommy Gunn', '555555'),
('654363', 'Zaine', '666542'),
('876686', 'Tzu Sun', '888992');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `Owner`
--
ALTER TABLE `Owner`
  ADD PRIMARY KEY (`Owner_ID`),
  ADD UNIQUE KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`restaurant_ID`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`Review_ID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`sID`),
  ADD UNIQUE KEY `Account_ID` (`Account_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
