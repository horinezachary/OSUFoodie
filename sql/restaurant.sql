CREATE TABLE `Restaurant` (
 `restaurant_ID` char(6) NOT NULL,
 `restaurant_name` char(20) NOT NULL,
 `address` char(20) NOT NULL,
 `owner_id` char(6) NOT NULL
 )ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO `Restaurant`(`restaurant_ID`, `restaurant_name`,
`address`, `owner_id`) VALUES
(123234, "La Grande", "2235 Moon Way", 234567),
(250000, "Fire Wing Place", "3523 South Street", 345678),
(310000, "Place", "2345 Not-Monroe Street", 456789),
(300000, "New Hotness", "5432 Apartment Complex", 654321),
(320000, "Olive Garden 2", "1234 Dasani Way", 765432),
(120000, "Mcdonalds King", "4321 Aquafina Drive", 876543),
(250050, "The Last Laugh", "5432 Easterhead Avenue", 987654),
(312500, "Switch", "3214 5th Street Apt 1.", 534242),
(400000, "Generic Name", "123 Fake Street", 352356),
(450000, "Better Burger", "4th Floor Kerr", 500000)
