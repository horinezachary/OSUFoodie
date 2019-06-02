CREATE TABLE `Item` (
 `item_ID` char(6) NOT NULL,
 `item_name` char(20) NOT NULL,
 `restaurant_ID` char(6) NOT NULL
 )ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO `Item`(`item_ID`, `item_name`, `restaurant_ID`) VALUES
(123456, "Spaghetti", 123234),
(123122, "Alfredo Pasta", 123234),
(123123, "Hamburger", 123234),
(234567, "Cheeseburger", 250000),
(345678, "Chicken Wings", 300000),
(100000, "Fried Rice", 310000),
(150000, "Crown Royal", 320000),
(123000, "Curry with Rice", 120000),
(344123, "Fried Noodles", 250050),
(345000, "Mashed Potatoes", 312500)
