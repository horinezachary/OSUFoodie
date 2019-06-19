-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Jun 18, 2019 at 11:08 PM
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
CREATE DATABASE IF NOT EXISTS `cs340_horinez` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cs340_horinez`;

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
(123000, 'dreampizza', 'pizzabubble'),
(123040, 'hawiianboyz', 'password'),
(123050, 'dominosonmoroe', 'pizzapizzapizza'),
(123060, 'ddog', 'pubandgrub'),
(123070, 'jerseyMikesSubs', 'cheesesteak'),
(123080, 'mcmenamins', 'beer!'),
(123090, 'beaverHut', 'beaverhutbutt'),
(123110, 'clods', 'clodsbar'),
(123202, 'bombs', 'bacafe'),
(321432, 'horinez2', 'dasdaf'),
(555222, 'jackdav', 'password'),
(932000, 'horinez', 'buttsbuttsbutts'),
(932001, 'mrcheese', 'cheese!'),
(932011, 'huangm', 'password'),
(932012, 'oconnol', 'password'),
(932013, 'donnahuc', 'password'),
(932014, 'hinemaf', 'password'),
(932015, 'harmanv', 'password'),
(932016, 'sprayb', 'password'),
(932017, 'fitzgle', 'password'),
(932018, 'howarb', 'password'),
(932019, 'gatsja', 'password'),
(932020, 'marscs', 'password'),
(932021, 'smithjo', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `item_ID` int(8) NOT NULL,
  `item_name` char(30) NOT NULL,
  `restaurant_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`item_ID`, `item_name`, `restaurant_ID`) VALUES
(29193, 'Bacon Cheese Stuffed', 100001),
(25840655, 'Cheese stuffed', 100001),
(25840656, 'Colossal Burger', 100001),
(25840657, 'Milkshake', 100001),
(25840658, 'Three cheese burger', 100001),
(25840659, 'Spicy Sriracha meltdown', 100001),
(25840660, 'big kahuna', 100001),
(25840662, 'chicken sandwich', 100001),
(25840674, 'Hot Wings', 450014),
(25840675, 'Nacho Tortillas', 450014),
(25840676, 'Super Nachos', 450014),
(25840677, 'Chicken Strips', 450014),
(25840678, 'French Fries', 450014),
(25840679, 'Onion Rings', 450014),
(25840680, 'Chips & Salsa', 450014),
(25840681, 'Clodfelter\'s Homemade Soup', 450014),
(25840682, 'Ham and Cheese Sandwich', 450014),
(25840683, 'Turkey Sandwich', 450014),
(25840684, 'BLT', 450014),
(25840685, 'Tuna Sandwich', 450014),
(25840686, 'Chips and Salsa', 450008),
(25840687, 'Jalapeno Fries', 450008),
(25840688, 'Bomber Nachos', 450008),
(25840689, 'Homemade Tamale', 450008),
(25840690, 'Cheese Quesadilla', 450008),
(25840691, 'Tortilla soup', 450008),
(25840692, 'terminator green chili stew', 450008),
(25840693, 'salad', 450008),
(25840694, 'pizza', 450012),
(25840695, 'dilly tuna salad sandwich', 450012),
(25840696, 'fireside roasted turkey', 450012),
(25840697, 'local gyro', 450012),
(25840698, 'Portland dip', 450012),
(25840699, 'Captain Neon burger', 450012),
(25840700, 'Dungeon burger', 450012),
(25840701, 'Wilbur\'s Jumbo Deluxe burger', 450012),
(25840702, 'Aztec salad', 450012),
(25840703, 'Brewer\'s salad', 450012),
(25840704, 'Soft Pretzel sticks', 450012),
(25840705, 'Saigon Kick Chicken Tenders', 450012),
(25840706, 'Scooby Snacks', 450012),
(25840707, 'Tater Tots', 450012),
(25840708, 'Cajun Tots', 450012),
(25840709, 'burger', 450013),
(25840710, 'double burger', 450013),
(25840711, 'fries', 450013),
(25840712, 'tots', 450013),
(25840713, 'milkshake', 450013),
(25840714, 'mac and cheese', 450010),
(25840715, 'bacon mac and cheese', 450010),
(25840716, 'hot dog', 450010),
(25840717, 'burger', 450010),
(25840718, 'fries', 450010),
(25840719, 'tots', 450010),
(25840720, 'philly cheese steak', 450011),
(25840721, 'chipotle cheese steak', 450011),
(25840722, 'big kahuna cheese steak', 450011),
(25840723, 'chicken philly', 450011),
(25840724, 'chipoltle chicken cheese steak', 450011),
(25840725, 'BBQ Beef', 450011),
(25840726, 'Grilled Pastrami Reuben', 450011),
(25840727, 'Meatball and cheese', 450011),
(25840728, 'Ham and provolone', 450011),
(25840729, 'Turkey and provolone', 450011),
(25840730, 'super sub', 450011),
(25840731, 'italian sub', 450011),
(25840732, 'BLT', 450011),
(25840733, 'meatzza', 450009),
(25840734, 'philly cheese steak', 450009),
(25840735, 'pacific veggie', 450009),
(25840736, 'honolulu hawaiian', 450009),
(25840737, 'deluxe', 450009),
(25840738, 'cali chicken bacon ranch', 450009),
(25840739, 'buffalo chicken', 450009),
(25840740, 'ultimate pepperoni', 450009),
(25840741, 'memphis BBQ Chicken', 450009),
(25840742, 'Wisconsin 6 cheese', 450009),
(25840743, 'spinach and feta', 450009),
(25840744, 'BBQ wings', 450009),
(25840745, 'plain wings', 450009),
(25840746, 'hot wings', 450009),
(25840747, 'loco moco', 450006),
(25840748, 'hawaiian style steak', 450006),
(25840749, 'sweet sheyu chicken', 450006),
(25840750, 'teriyaki chicken', 450006),
(25840751, 'Kalla\'s Sweet ribs', 450006),
(25840752, 'corvegas', 450005),
(25840753, 'zorba', 450005),
(25840754, 'omaha or bust', 450005),
(25840755, 'Raider v spartan', 450005),
(25840756, 'marilyn Monroe', 450005),
(25840757, 'Hoodoo you love', 450005),
(25840758, 'rat pack special', 450005),
(25840759, 'tejano', 450005),
(25840760, 'dog running', 450005),
(25840761, 'mary\'s peak', 450005),
(25840762, 'bob marley', 450005),
(25840763, 'the bent', 450005),
(25840764, 'vegan love', 450005),
(25840765, 'bill walton', 450005),
(25840766, 'margharita', 450005),
(25840767, 'benny\'s delight', 450005),
(25840768, 'herbivore', 450005),
(25840769, 'corvegas', 450007),
(25840770, 'zorba', 450007),
(25840771, 'omaha or bust', 450007),
(25840772, 'Raider v spartan', 450007),
(25840773, 'marilyn Monroe', 450007),
(25840774, 'Hoodoo you love', 450007),
(25840775, 'rat pack special', 450007),
(25840776, 'tejano', 450007),
(25840777, 'mary\'s peak', 450007),
(25840778, 'dog running', 450007),
(25840779, 'bob marley', 450007),
(25840780, 'the bent', 450007),
(25840781, 'vegan love', 450007),
(25840782, 'bill walton', 450007),
(25840783, 'margharita', 450007),
(25840784, 'benny\'s delight', 450007),
(25840785, 'herbivore', 450007),
(25840786, 'Bacon Cheese Stuffed', 450001),
(25840787, 'Cheese stuffed', 450001),
(25840788, 'Colossal Burger', 450001),
(25840789, 'Milkshake', 450001),
(25840790, 'Three cheese burger', 450001),
(25840791, 'Spicy Sriracha meltdown', 450001),
(25840792, 'big kahuna', 450001),
(25840793, 'chicken sandwich', 450001);

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
(987658, 'Cheese Stuffed', 932001),
(987664, 'American Dream', 123000),
(987665, 'Local Boyz', 123040),
(987666, 'Bombs Away', 123202),
(987667, 'Dominos', 123050),
(987668, 'Downward Dog', 123060),
(987669, 'Jersey Mike', 123070),
(987670, 'McMenamins', 123080),
(987671, 'Beaver Hut', 123090),
(987672, 'Clodfelters', 123110);

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `restaurant_ID` int(6) NOT NULL,
  `restaurant_name` char(40) NOT NULL,
  `address` char(40) NOT NULL,
  `owner_id` int(6) NOT NULL,
  `avg_review` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Restaurant`
--

INSERT INTO `Restaurant` (`restaurant_ID`, `restaurant_name`, `address`, `owner_id`, `avg_review`) VALUES
(100001, 'Cheesy Stuffed Burgers Madison', '453 SW Madison Ave', 987658, '5.00'),
(450001, 'Cheesy Stuffed Burgers Truck', '1545 NW Monroe Ave', 987658, '1.00'),
(450005, 'American Dream Campus', '2525 NW Monroe Ave', 987664, '4.00'),
(450006, 'Local Boyz Hawaiian Cafe', '1425 NW Monroe Ave', 987665, '2.00'),
(450007, 'American Dream Downtown', '214 SW 2nd St', 987664, '2.00'),
(450008, 'Bombs Away Cafe', '2527 NW Monroe Ave', 987666, '3.00'),
(450009, 'Domino\'s Pizza', '2455 NW Monroe Ave', 987667, '1.00'),
(450010, 'The Downward Dog', '2305 NW Monroe Ave', 987668, '4.00'),
(450011, 'Jersey Mike\'s Subs', '2051 NW Monroe Ave', 987669, '5.00'),
(450012, 'McMenamins on Monroe', '2001 NW Monroe Ave', 987670, '3.33'),
(450013, 'The Beaver Hut Dam Growlers', '1603 NW Monroe Ave', 987671, '3.00'),
(450014, 'Clodfelter\'s', '1501 NW Monroe Ave', 987672, '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `Review_ID` int(6) NOT NULL,
  `rating` decimal(3,2) NOT NULL,
  `description` char(240) NOT NULL,
  `sID` int(6) NOT NULL,
  `item_ID` int(6) DEFAULT NULL,
  `restaurant_ID` int(6) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`Review_ID`, `rating`, `description`, `sID`, `item_ID`, `restaurant_ID`, `date_added`) VALUES
(981306, '4.00', 'This swiss cheese and mushroom burger was awesome!', 932011, 25840700, 450012, '2019-06-10'),
(981307, '3.00', 'The burger was cheap, tasty and filling!', 932012, 25840710, 450013, '2019-06-10'),
(981308, '3.00', 'the nachos were pretty good', 932013, 25840688, 450008, '2019-06-10'),
(981309, '4.00', 'the hot dog was good', 932014, 25840716, 450010, '2019-06-10'),
(981310, '2.00', 'there was too much meat on my pizza', 932015, 25840769, 450007, '2019-06-10'),
(981311, '2.00', 'used too much celery', 932016, 25840695, 450012, '2019-06-10'),
(981312, '2.00', 'not enough vegetarian options', 932017, NULL, 450006, '2019-06-10'),
(981313, '1.00', 'no vegetarian options', 932018, NULL, 450001, '2019-06-10'),
(981314, '1.00', 'the staff was rude', 932019, NULL, 450009, '2019-06-10'),
(981315, '5.00', 'the best cheese steak I\'ve ever had!', 932020, 25840721, 450011, '2019-06-10'),
(981316, '4.00', 'They were pretty good, and the service was great', 932021, 25840746, 450014, '2019-06-10'),
(981317, '4.00', 'great vegetarian option', 932021, 25840785, 450005, '2019-06-10'),
(981318, '5.00', 'this giant burger as amazing and fed me and my dad', 932000, 25840656, 100001, '2019-06-10'),
(981321, '4.00', 'love the tater tots and the spinach dip, very good appetizers to share with anyone who you visit this location with', 932012, 25840707, 450012, '2019-06-10'),
(981323, '5.00', 'NULL REVIEW', 321432, NULL, 100001, '2019-06-10');

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
(321432, 'gdfhsgre', 321432),
(555222, 'Jack Davis', 555222),
(932000, 'Zachary Horine', 932000),
(932011, 'Mike Huang', 932011),
(932012, 'Leslie O\'connor', 932012),
(932013, 'Craig Donnahue', 932013),
(932014, 'Francis Hineman', 932014),
(932015, 'Vivian Harmann', 932015),
(932016, 'Bina Spray', 932016),
(932017, 'Leopold Fitzgerald', 932017),
(932018, 'Billy Dean Howard', 932018),
(932019, 'Jay Gatsby', 932019),
(932020, 'Shelby Marsche', 932020),
(932021, 'John Smith', 932021);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`Account_ID`),
  ADD UNIQUE KEY `Username` (`Username`);

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
  MODIFY `Account_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=932061;

--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `item_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25840795;

--
-- AUTO_INCREMENT for table `Owner`
--
ALTER TABLE `Owner`
  MODIFY `Owner_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987673;

--
-- AUTO_INCREMENT for table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `restaurant_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450018;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `Review_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=981324;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `sID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=932061;

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
  ADD CONSTRAINT `Owner_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `Account` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `Review_ibfk_3` FOREIGN KEY (`item_ID`) REFERENCES `Item` (`item_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `Account` (`Account_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
