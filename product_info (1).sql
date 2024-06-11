-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 03:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `visiting_ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `retry_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `contact_no`, `visiting_ID`, `username`, `password`, `retry_pass`) VALUES
(6, 'James Platitas', '09983717225', 3, 'jamesplatitas@gmail.com', 'hellojames!', 'hellojames!'),
(7, 'Hanna Zuela', '09248214495', 2, 'hanna_zuela@gmail.com', 'hannApasS', 'hannApasS'),
(8, 'Gigi Del Lana', '09913717288', 1, 'gigi@gmail.com', 'password1223', 'password1223'),
(9, 'JAMIE JASMINE D. SANO', '09258224495', 1, 'jamiejasmine.sano@tup.edu.ph', 'jamie123', 'jamie123'),
(10, 'Val Fabregas', '09015678901', 1, 'val@gmail.com', 'password123*', 'password123*');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Category_Name` varchar(255) NOT NULL,
  `Category_Descrip` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Category_Name`, `Category_Descrip`, `date_created`) VALUES
(1, 'Coffee Beverages', 'All coffee drinks', '2024-05-21 17:17:01'),
(2, 'Tea Selection', 'All tea variants', '2024-05-21 17:17:01'),
(6, 'Pastries', 'All baked goods', '2024-05-21 17:17:01'),
(7, 'Sandwiches', 'All variants of sandwiches', '2024-05-21 17:21:54'),
(8, 'Salads', 'all salad dishes', '2024-05-23 04:51:44'),
(9, 'Smoothies', 'all fruit smoothies', '2024-05-23 04:52:00'),
(10, 'Fresh Juices', 'all fruit juices freshly squeezed', '2024-05-23 04:52:27'),
(11, 'Breakfast', 'All breakfast dishes', '2024-05-23 04:54:22'),
(12, 'Cakes', 'Different Cakes', '2024-05-23 04:54:36'),
(13, 'Cookies', 'All baked cookies', '2024-05-23 04:54:48'),
(14, 'Gourmet Pizza', 'Handmade pizzas', '2024-05-23 04:55:10'),
(15, 'Soup of the Day', 'Different everyday, has a schedule', '2024-05-23 04:55:38'),
(16, 'Paninis', 'Made with Italian bread', '2024-05-23 04:56:20'),
(17, 'Tarts', '3 tarts only', '2024-05-23 04:59:32'),
(18, 'Gelato', '5 variants for each day', '2024-05-23 05:00:46'),
(19, 'Yogurt Parfaits', '--', '2024-05-23 05:01:14'),
(20, 'Cheese Platter', 'Offered for 2-3 group of persons', '2024-05-23 05:01:33'),
(21, 'Wraps', '--', '2024-05-23 05:01:41'),
(22, 'Quiches', '--', '2024-05-23 05:01:53'),
(23, 'Crepes', 'Fruit and spread crepes', '2024-05-23 05:02:06'),
(24, 'Croissant Sandwiches', '--', '2024-05-23 05:02:22'),
(25, 'Scones', '--', '2024-05-23 05:04:21'),
(26, 'Cupcakes', 'Chocolate, Vanilla, & Carrot', '2024-05-23 05:04:56'),
(27, 'Biscotti Flavors', 'Mostly paired with hot coffee', '2024-05-23 05:05:41'),
(28, 'Artisan Brad Loaves', 'Mostly consumed within the day', '2024-05-23 05:09:30'),
(29, 'Protein Bars', 'Good go-to snack', '2024-05-23 05:09:50'),
(30, 'Egg Sandwiches', 'Made to order, don\'t stock too much', '2024-05-23 05:10:19'),
(31, 'Fruit Bowls', 'Acts as a merienda or dessert', '2024-05-23 05:10:48'),
(32, 'Granola Varieties', 'Mostly available every MWF', '2024-05-23 05:11:51'),
(33, 'Oatmeal Bowls', 'A good substitute for a breakfast meal', '2024-05-23 05:12:30'),
(34, 'Pretzel Sticks', 'Paired with hot/cold coffees', '2024-05-23 05:12:55'),
(35, 'Fruit Bread Loaves', 'Christmas offers', '2024-05-23 05:13:25'),
(36, 'Cheesecake Flavors', 'Mostly toppings on cheesecake variety', '2024-05-23 05:13:49'),
(37, 'Fruit Pies', 'Apple Pie and Peach Mango Pies', '2024-05-23 05:15:45'),
(38, 'Donuts', 'Available everyday', '2024-05-23 05:16:09'),
(39, 'Brownies', 'Available everyday', '2024-05-23 05:16:28'),
(40, 'Protein Shakes', 'Available every morning only', '2024-05-23 05:17:38'),
(41, 'Tiramisu', 'Offered every TTHS', '2024-05-23 05:18:04'),
(42, 'Macarons', 'Promo every friday', '2024-05-23 05:18:21'),
(43, 'Hummus Platter', 'Dinner option', '2024-05-23 05:18:32'),
(44, 'Stuffed Croissants', 'Available everyday', '2024-05-23 05:18:48'),
(45, 'Energy Balls', 'Available every morning only', '2024-05-23 05:19:12'),
(46, 'Pasta Salads', 'Available everyday', '2024-05-23 05:19:29'),
(47, 'Stuffed Baguette', 'Lunch option', '2024-05-23 05:19:58'),
(48, 'Baklava Varieties', 'Dessert Option, paired with coffee', '2024-05-23 05:20:16'),
(49, 'Truffle Selections', 'Available every weekends', '2024-05-23 05:20:39'),
(50, 'Chia Pudding', 'Available everyday', '2024-05-23 05:21:00'),
(51, 'Gourmet Hotdogs', 'Lunch/Dinner option', '2024-05-23 05:21:18'),
(52, 'Bagels', 'Variety of Bagels, available everyday', '2024-05-23 05:21:44'),
(53, 'Rice Bowls', '8 choices, available everyday', '2024-05-23 05:23:10'),
(54, 'Sides', 'Dishes mostly paired with beverages', '2024-05-23 05:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `total_price` bigint(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `ID` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Or_Quantity` int(11) NOT NULL,
  `Or_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Product_name` varchar(255) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Product_name`, `Supplier_ID`, `Category_ID`, `Price`, `Quantity`, `Image`) VALUES
(1, 'Spanish Latte', 1, 1, '150', 10, '/assets/uploads/products/1716217000.png'),
(2, 'Jasmine Tea', 2, 2, '100', 10, '/assets/uploads/products/1716216976.png'),
(4, 'Chai Tea', 2, 2, '100', 10, '/assets/uploads/products/1716216949.png'),
(7, 'Banana Muffins', 3, 6, '35', 12, '/assets/uploads/products/1716218856.png'),
(10, 'Croissants', 3, 6, '75', 10, '/assets/uploads/products/1716220595.png'),
(12, 'Matcha Latte', 47, 1, '120', 10, '/assets/uploads/products/1716455421.png'),
(13, 'Vietnamese Brew', 1, 1, '120', 10, '/assets/uploads/products/1716455491.png'),
(14, 'Espresso', 1, 1, '100', 10, '/assets/uploads/products/1716455552.png'),
(15, 'French Vanilla', 1, 1, '115', 10, '/assets/uploads/products/1716455668.png'),
(16, 'Chamomile Tea', 48, 2, '89', 10, '/assets/uploads/products/1716455769.png'),
(17, 'Ginger Tea', 48, 2, '89', 10, '/assets/uploads/products/1716455820.png'),
(19, 'Muffins', 44, 6, '55', 12, '/assets/uploads/products/1716455947.png'),
(20, 'Turkey n\' Cheese', 45, 7, '125', 5, '/assets/uploads/products/1716456058.png'),
(21, 'Caesar Salad', 4, 8, '115', 5, '/assets/uploads/products/1716456340.png'),
(22, 'Strawberry Banana', 5, 9, '120', 10, '/assets/uploads/products/1716456680.png'),
(23, 'Apple Juices', 5, 10, '99', 10, '/assets/uploads/products/1716456776.png'),
(24, 'Orange Juices', 5, 10, '99', 10, '/assets/uploads/products/1716456814.png'),
(25, 'Waffles', 6, 11, '75', 10, '/assets/uploads/products/1716456901.png'),
(26, 'Carrot Cake', 7, 12, '350', 8, '/assets/uploads/products/1716456948.png'),
(27, 'Peanut Butter Cookies', 8, 13, '45', 12, '/assets/uploads/products/1716456985.png'),
(28, 'Pepperoni Pizza', 9, 14, '375', 8, '/assets/uploads/products/1716457049.png'),
(29, 'Hawaiian Pizza', 9, 14, '375', 8, '/assets/uploads/products/1716457095.png'),
(30, 'Chicken Noodle Soup', 10, 15, '115', 10, '/assets/uploads/products/1716457204.png'),
(31, 'Tomato Basil Soup', 10, 15, '99', 10, '/assets/uploads/products/1716457247.png'),
(32, 'Italian Panini', 11, 16, '120', 5, '/assets/uploads/products/1716457463.png'),
(33, 'Chocolate Tart', 12, 17, '250', 8, '/assets/uploads/products/1716457511.png'),
(34, 'Raspberry Tart', 12, 17, '275', 8, '/assets/uploads/products/1716457550.png'),
(35, 'Strawberry Gelato', 13, 18, '125', 10, '/assets/uploads/products/1716457611.png'),
(36, 'Pistacio Gelato', 13, 18, '115', 10, '/assets/uploads/products/1716457647.png'),
(37, 'Mixed Berry Parfaits', 14, 19, '125', 10, '/assets/uploads/products/1716457726.png'),
(38, 'Tropical Fruit Parfait', 14, 19, '125', 10, '/assets/uploads/products/1716457791.png'),
(39, 'Gouda', 15, 20, '125', 8, '/assets/uploads/products/1716457831.png'),
(40, 'Blue Cheese', 15, 20, '200', 8, '/assets/uploads/products/1716457910.png'),
(41, 'Chicken Caesar Wrap', 16, 21, '155', 10, '/assets/uploads/products/1716458090.png'),
(42, 'BLT Wrap', 16, 21, '120', 10, '/assets/uploads/products/1716458183.png'),
(43, 'Broccoli n\' Cheddar Quiche', 17, 22, '200', 8, '/assets/uploads/products/1716458246.png'),
(44, 'Mushroom Quiche', 17, 22, '200', 8, '/assets/uploads/products/1716458508.png'),
(45, 'Nutella Crepes', 18, 23, '95', 10, '/assets/uploads/products/1716458654.png'),
(46, 'Strawberry Banana Crepe', 18, 23, '99', 10, '/assets/uploads/products/1716458689.png'),
(47, 'Turkey n\' Swiss Croissant', 19, 24, '120', 5, '/assets/uploads/products/1716458742.png'),
(48, 'Veggie Croissant', 19, 24, '125', 5, '/assets/uploads/products/1716458774.png'),
(49, 'Almond Scone', 20, 25, '99', 12, '/assets/uploads/products/1716458845.png'),
(50, 'Lemon Poppy Seed Scone', 20, 25, '120', 8, '/assets/uploads/products/1716458902.png'),
(51, 'Vanilla Cupcake', 21, 26, '45', 12, '/assets/uploads/products/1716458952.png'),
(52, 'Choco Cupcake', 21, 26, '45', 12, '/assets/uploads/products/1716459062.png'),
(53, 'Whole Wheat Bread', 22, 28, '150', 8, '/assets/uploads/products/1716459109.png'),
(54, 'Chocolate Chip Protein Bar', 23, 29, '55', 12, '/assets/uploads/products/1716459143.png'),
(55, 'Cookies and Cream Protein Bar', 23, 29, '55', 12, '/assets/uploads/products/1716459227.png'),
(56, 'Avocado Egg Sandwich', 24, 30, '99', 10, '/assets/uploads/products/1716459289.png'),
(57, 'Bacon Egg and Cheese Sandwich', 24, 30, '125', 10, '/assets/uploads/products/1716459328.png'),
(58, 'Watermelon Bowl', 25, 31, '110', 8, '/assets/uploads/products/1716459362.png'),
(59, 'Mixed Fruit Bowl', 25, 31, '115', 10, '/assets/uploads/products/1716459412.png'),
(60, 'Cranberry Cashew Granola', 26, 32, '165', 8, '/assets/uploads/products/1716459647.png'),
(61, 'Maple Pecan Granola', 26, 32, '150', 10, '/assets/uploads/products/1716462643.png'),
(62, 'Banana Slices Oatmeal Bowls', 44, 33, '125', 8, '/assets/uploads/products/1716462781.png'),
(63, 'Chopped Nuts Oatmeal Bowls', 44, 33, '120', 8, '/assets/uploads/products/1716462878.png'),
(64, 'Everything Seasoned Pretzel Sticks', 27, 34, '75', 12, '/assets/uploads/products/1716462925.png'),
(65, 'Chocolate Dipped Pretzel Sticks', 27, 34, '75', 12, '/assets/uploads/products/1716463006.png'),
(66, 'New York Style Cheesecake', 29, 36, '400', 8, '/assets/uploads/products/1716463188.png'),
(67, 'Chocolate Marble Cheesecake', 29, 36, '450', 8, '/assets/uploads/products/1716463234.png'),
(69, 'Pork Cabbage Wrap', 16, 21, '120', 12, '/assets/uploads/products/1716894086.png');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID` int(11) NOT NULL,
  `Supplier_Name` varchar(255) NOT NULL,
  `Supplier_Contact` varchar(255) NOT NULL,
  `Supplier_PhoneNum` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID`, `Supplier_Name`, `Supplier_Contact`, `Supplier_PhoneNum`) VALUES
(1, 'Kape Seryes', 'Ruben Ewan', 9258224498),
(2, 'Tea-Long', 'Britt Maghull', 9883707228),
(3, 'Pastries-ee', 'Meta Shaddick', 9929924596),
(4, 'Salad Fiesta', 'Burl Giraldon', 9528174140),
(5, 'Frutas', 'Harp Verrell', 9107905421),
(6, 'Waffyles', 'Therine Ascough', 9156615444),
(7, 'Tarot Cake', 'Humbert Dagworthy', 9765109125),
(8, 'CookieMO', 'Gunter McMurty', 9351691924),
(9, 'Pizzaria', 'Gauthier Sweeting', 9144176210),
(10, 'SuSOUP', 'Annabel Trowl', 9207701228),
(11, 'ChikiPanini', 'Dacie Bestar', 9850353810),
(12, 'SweetTart', 'Maurizia Myers', 9434907402),
(13, 'Frutsikel', 'Philbert Isakowicz', 9494694718),
(14, 'Par! Fait!', 'Kirstin Hammersley', 9740196855),
(15, 'Cheese Ko', 'Marjy Stranahan', 9592821961),
(16, 'SaWRAP', 'Jarrad Valentine', 9208764746),
(17, 'Quiche Nadal', 'Archer Prantoni', 9726660521),
(18, 'Crepey', 'Madelin Caddan', 9831415402),
(19, 'Croissantee', 'Arabelle Chidzoy', 9251396629),
(20, 'Sconed', 'Town Matura', 9868427903),
(21, 'Cupcakey', 'Rachelle Hansen', 9545951591),
(22, 'Bread Talk', 'Almeda Wheelwright', 9302433261),
(23, 'Protein Mania', 'Binny Cosgrave', 9673175636),
(24, 'Sandwich', 'Hayyim Ramelot', 9867857597),
(25, 'Fruit Bowl', 'Vassili Thorogood', 9167140987),
(26, 'Granolalola', 'Michele Basilio', 9577154924),
(27, 'Auntie Anne', 'Corrie Kenzie', 9330575276),
(28, 'Acai', 'Marsh Cumming', 9289113650),
(29, 'Cheesecake', 'Erasmus Fusedale', 9533792550),
(30, 'KiPie', 'Dane Laurentino', 9328518508),
(31, 'Donut-O', 'Thomasine Kettell', 9585947509),
(32, 'Brownie', 'Mychal Blanque', 9835680181),
(33, 'Shakey', 'Warden Batte', 9113375611),
(34, 'Red Bow', 'Wang Skingley', 9549461402),
(35, 'Maca-Maca', 'Quintus Wainscoat', 9117861515),
(36, 'HUMMUgouS', 'Brietta Ible', 9377607310),
(37, 'PowerBall', 'Roosevelt Scamal', 9855239983),
(38, 'Baguette\'s', 'Chrystal Milsap', 9666526742),
(39, 'LAVArn', 'Norbert Ameer-Beg', 9635162261),
(40, 'Mama\'s', 'Tye MacElholm', 9213158130),
(41, 'Pudds', 'Jessamine Baudains', 9331964996),
(42, 'Doggo', 'Austen McNamara', 9351975333),
(43, 'Bagelito', 'Ethelyn Drakers', 9816310341),
(44, 'Hot Pot', 'Meto Shadricka', 425),
(45, 'Sunday\'s', 'Denny Sumnall', 9229417092),
(46, 'Running Bowl', 'Zandra Baum', 9477480845),
(47, 'Matcha-cha', 'Pauline McGairl', 9465424276),
(48, 'TEA2X', 'Sonia Martindale', 9498643553),
(49, 'SNAX', 'Auguste Finch', 9686275955),
(50, 'grEasy', 'Jaimie Iglesiaz', 9713348837),
(51, 'PowerPUFFS', 'Tally Scyone', 9660300559);

-- --------------------------------------------------------

--
-- Table structure for table `visiting`
--

CREATE TABLE `visiting` (
  `ID` int(11) NOT NULL,
  `positions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visiting`
--

INSERT INTO `visiting` (`ID`, `positions`) VALUES
(1, 'Admin'),
(2, 'Guest'),
(3, 'Supplier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `visiting_ID` (`visiting_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Category_ID` (`Category_ID`),
  ADD KEY `Supplier_ID` (`Supplier_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `visiting`
--
ALTER TABLE `visiting`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `visiting`
--
ALTER TABLE `visiting`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`visiting_ID`) REFERENCES `visiting` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `category` (`ID`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`ID`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
