CREATE TABLE `Account` (
`Account_ID` char(6) NOT NULL,
`Username` char(20) NOT NULL,
`Password` char(20) NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO `Account`(`Account_ID`, `Username`, `Password`) VALUES
(111111, "John147", "pass123"),
(222314, "blakehead", "thelongnight"),
(345313, "popper", "123456789"),
(454354, "admin", "qwerty"),
(540000, "onidman", "oregon"),
(555555, "jacobholt_32", "10301980"),
(666542, "buddy123", "jan101980"),
(721377, "nomore", "please"),
(888992, "yeahbuddy", "longpassword"),
(999999, "ALLCAPS", "PASSWORDLONG")
