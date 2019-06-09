-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Jun 09, 2019 at 03:02 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`cs340_horinez`@`%` PROCEDURE `updateAvgReview` (IN `rid` INT(6))  NO SQL
BEGIN 
    UPDATE Restaurant
            SET avg_review = (SELECT avg(rating) FROM Review NATURAL JOIN Restaurant WHERE restaurant_id = rid)
    WHERE restaurant_id = rid;
END$$

--
-- Functions
--
CREATE DEFINER=`cs340_horinez`@`%` FUNCTION `restaurantRank` (`x` VARCHAR(6)) RETURNS VARCHAR(10) CHARSET utf8 NO SQL
BEGIN
declare average decimal(3,2);

 SELECT AVG(rating) INTO average FROM Review R, Restaurant R1 WHERE
 R1.restaurant_ID = R.restaurant_ID AND X = R1.restaurant.ID GROUP
BY R1.restaurant_ID;

 IF average IS NULL THEN
 RETURN 'No Reviews';
 END IF;

 IF average > 4.0 THEN
 RETURN "GREAT";
 END IF;

 IF average > 2.5 THEN
 RETURN "GOOD";
 END IF;
 RETURN 'BAD';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `Account_ID` int(6) NOT NULL,
  `Username` char(20) NOT NULL,
  `Password` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`Account_ID`, `Username`, `Password`) VALUES
(123, 'st', 'password'),
(932, 'davisjack', 'password'),
(1999, 'tpietro', 'pizzapizza'),
(111111, 'John147', 'pass123'),
(222314, 'blakehead', 'thelongnight'),
(345313, 'popper', '123456789'),
(454354, 'admin', 'qwerty'),
(463843, 'jackdavis', 'password'),
(540000, 'onidman', 'oregon'),
(546456, 'bob', 'hope'),
(555222, 'jackdav', 'password'),
(555555, 'jacobholt_32', '10301980'),
(555556, 'TEST', 'thisisatest'),
(666542, 'buddy123', 'jan101980'),
(721377, 'nomore', 'please'),
(888992, 'yeahbuddy', 'longpassword'),
(932000, 'horinez', 'buttsbuttsbutts'),
(999999, 'ALLCAPS', 'PASSWORDLONG');

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `item_ID` int(6) NOT NULL,
  `item_name` char(20) NOT NULL,
  `restaurant_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`item_ID`, `item_name`, `restaurant_ID`) VALUES
(100000, 'Fried Rice', 310000),
(123000, 'Curry with Rice', 120000),
(123122, 'Alfredo Pasta', 123234),
(123123, 'Hamburger', 123234),
(150000, 'Crown Royal', 320000),
(234567, 'Cheeseburger', 250000),
(344123, 'Fried Noodles', 250050),
(345000, 'Mashed Potatoes', 312500),
(345678, 'Chicken Wings', 300000),
(981258, 'quesadilla', 120000),
(981260, 'taco', 123234),
(981278, 'ham soup', 5),
(981279, 'steak', 312500),
(981280, 'generic food', 400000),
(981281, 'good burger', 450000),
(981282, 'better burger', 450000),
(981283, 'best burger', 450000);

-- --------------------------------------------------------

--
-- Table structure for table `Owner`
--

CREATE TABLE `Owner` (
  `Owner_ID` int(6) NOT NULL,
  `Owner_name` char(20) NOT NULL,
  `Account_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Owner`
--

INSERT INTO `Owner` (`Owner_ID`, `Owner_name`, `Account_ID`) VALUES
(234567, 'Johnny', 111111),
(345678, 'Johnny', 222314),
(352356, 'Alicia Durant', 999999),
(456789, 'Super Johnny', 345313),
(500000, 'Kuai Liang', 540000),
(534242, 'Emma Morris', 888992),
(654321, 'Mike', 454354),
(765432, 'John Thomas', 555555),
(876543, 'Zach', 666542),
(987654, 'Julie Tracy', 721377),
(987655, 'st', 123);

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `restaurant_ID` int(6) NOT NULL,
  `restaurant_name` char(20) NOT NULL,
  `address` char(40) NOT NULL,
  `owner_id` int(6) NOT NULL,
  `avg_review` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Restaurant`
--

INSERT INTO `Restaurant` (`restaurant_ID`, `restaurant_name`, `address`, `owner_id`, `avg_review`) VALUES
(5, 'The Market', '123 nw 123', 987655, '4.00'),
(120000, 'Mcdonalds King', '4321 Aquafina Drive', 876543, '2.00'),
(123234, 'La Grande', '2235 Moon Way', 234567, '2.00'),
(250000, 'Fire Wing Place', '3523 South Street', 345678, '2.00'),
(250050, 'The Last Laugh', '5432 Easterhead Avenue', 987654, '3.20'),
(300000, 'New Hotness', '5432 Apartment Complex', 654321, '5.00'),
(310000, 'Place', '2345 Not-Monroe Street', 456789, '4.10'),
(312500, 'Switch', '3214 5th Street Apt', 534242, '3.00'),
(320000, 'Olive Garden 2', '1234 Dasani Way', 765432, '2.00'),
(400000, 'Generic Name', '123 Fake Street', 352356, '3.00'),
(450000, 'Better Burger', '4th Floor Kerr', 500000, '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `Review_ID` int(6) NOT NULL,
  `rating` decimal(3,2) NOT NULL,
  `description` char(100) NOT NULL,
  `sID` int(6) NOT NULL,
  `item_ID` int(6) DEFAULT NULL,
  `restaurant_ID` int(6) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`Review_ID`, `rating`, `description`, `sID`, `item_ID`, `restaurant_ID`, `date_added`) VALUES
(100005, '4.00', 'great food', 233465, 123122, 123234, '2019-06-08'),
(100147, '3.00', 'passable.', 123, 234567, 250000, '2019-06-08'),
(124521, '2.00', 'no.', 321333, 150000, 320000, '2019-06-02'),
(134523, '4.10', 'Terrible', 454354, NULL, 310000, '2019-06-02'),
(154356, '3.20', 'Okay', 456777, NULL, 250050, '2019-06-02'),
(173490, '0.00', 'Real bad.', 321333, NULL, 123234, '2019-06-05'),
(181259, '2.00', 'Slightly less hair in my food', 321333, NULL, 250000, '2019-06-08'),
(981261, '1.00', 'Real bad.', 321333, 123000, 120000, '2019-06-08'),
(981269, '3.00', 'Noodles were crunchy', 555222, 123123, 120000, '2019-06-09'),
(981270, '5.00', 'Best chicken wings I\'ve ever had!', 321333, 345678, 300000, '2019-06-09'),
(981276, '4.00', 'This is the best ham soup I\'ve ever had!', 932000, 981278, 5, '2019-06-09'),
(981277, '3.00', 'Not sure exactly what this restaurant is supposed to be, but the steak was good', 932000, 981279, 312500, '2019-06-09'),
(981278, '3.00', 'it was alright', 932000, 981280, 400000, '2019-06-09'),
(981279, '5.00', 'these burgers are to DIE for', 932000, 981283, 450000, '2019-06-09');

--
-- Triggers `Review`
--
DELIMITER $$
CREATE TRIGGER `DeadAvg` AFTER DELETE ON `Review` FOR EACH ROW BEGIN
	CALL updateAvgReview(old.restaurant_id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calcAvg` AFTER INSERT ON `Review` FOR EACH ROW BEGIN
    CALL updateAvgReview(new.restaurant_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `sID` int(6) NOT NULL,
  `sname` char(20) NOT NULL,
  `Account_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`sID`, `sname`, `Account_ID`) VALUES
(123, 'steve', 123),
(932, 'Jack Davis', 932),
(1999, 'Tony Pietro', 1999),
(233465, 'Gordon Pal', 721377),
(321314, 'Michael', 454354),
(321333, 'Joseph', 111111),
(343442, 'John', 222314),
(454354, 'Super Kon', 345313),
(456777, 'Kayla Song', 999999),
(463843, 'Jack Davis', 463843),
(500500, 'Hanzo Hasashi', 540000),
(543534, 'Tommy Gunn', 555555),
(546456, 'This is a Test', 546456),
(555222, 'Jack Davis', 555222),
(555556, 'TESTMAN', 555556),
(654363, 'Zaine', 666542),
(876686, 'Tzu Sun', 888992),
(932000, 'Zachary Horine', 932000);

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
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `restaurant_ID` (`restaurant_ID`);

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
  ADD PRIMARY KEY (`restaurant_ID`),
  ADD UNIQUE KEY `restaurant_name` (`restaurant_name`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `sID` (`sID`),
  ADD KEY `item_ID` (`item_ID`),
  ADD KEY `restaurant_ID` (`restaurant_ID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`sID`),
  ADD UNIQUE KEY `Account_ID` (`Account_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `Account_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000;

--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `item_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=981284;

--
-- AUTO_INCREMENT for table `Owner`
--
ALTER TABLE `Owner`
  MODIFY `Owner_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987656;

--
-- AUTO_INCREMENT for table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `restaurant_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450018;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `Review_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=981280;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `sID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=932001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Item`
--
ALTER TABLE `Item`
  ADD CONSTRAINT `Restaurant_Dead` FOREIGN KEY (`restaurant_ID`) REFERENCES `Restaurant` (`restaurant_ID`) ON DELETE CASCADE;

--
-- Constraints for table `Owner`
--
ALTER TABLE `Owner`
  ADD CONSTRAINT `Owner_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `Account` (`Account_ID`);

--
-- Constraints for table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD CONSTRAINT `Restaurant_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `Owner` (`Owner_ID`) ON DELETE CASCADE;

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`sID`) REFERENCES `Student` (`sID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Review_ibfk_2` FOREIGN KEY (`restaurant_ID`) REFERENCES `Restaurant` (`restaurant_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Review_ibfk_3` FOREIGN KEY (`item_ID`) REFERENCES `Item` (`item_ID`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `Account` (`Account_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
