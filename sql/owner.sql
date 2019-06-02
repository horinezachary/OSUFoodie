CREATE TABLE Owner (
 `Owner_ID` char(6) NOT NULL,
 `Owner_name` char(20) NOT NULL,
 `Account_ID` char(6) NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO `Owner`(`Owner_ID`, `Owner_name`, `Account_ID`) VALUES
(234567, "Johnny", 111111),
(345678, "Johnny", 222314),
(456789, "Super Johnny", 345313),
(654321, "Mike", 454354),
(765432, "John Thomas", 555555),
(876543, "Zach", 666542),
(987654, "Julie Tracy", 721377),
(534242, "Emma Morris", 888992),
(352356, "Alicia Durant", 999999),
(500000, "Kuai Liang", 540000)
