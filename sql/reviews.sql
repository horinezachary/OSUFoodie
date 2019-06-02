CREATE TABLE `Review` (
 `Review_ID` char(6) NOT NULL,
 `rating` decimal(3,2) NOT NULL,
 `description` char(100) NOT NULL,
 `sID` char(6) NOT NULL,
 `item_ID` char(6) DEFAULT NULL,
 `restaurant_ID` char(6) NOT NULL
 ) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO `Review`(`Review_ID`, `rating`, `description`, `sID`,`item_ID`, `restaurant_ID`) VALUES
(123145, 4.7, "It was Okay as Okay could be", 321333, NULL, 123234),
(123234, 0.0,"Awful", 321333, 123456, 123234),
(123456, 5.0, "Perfect", 321333, 123123, 123234),
(123236, 3.0, "Okay", 321314, 234567, 250000),
(324521, 2.0, "no.", 321333, 345678, 300000),
(234523, 4.1, "Terrible", 454354, 100000, 310000),
(432562, 0.5, "A really long message to see the length that we can support", 654363, 150000, 320000),
(432565, 4.0, "Not bad", 876686, 123123, 120000),
(154356, 3.2, "Okay", 456777, 234567, 250050),
(324531, 2.1, "no.", 233465, 345678, 312500)
