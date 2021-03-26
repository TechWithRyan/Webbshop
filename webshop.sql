-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2021 at 09:08 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `name`) VALUES
(1, 'herr'),
(2, 'dam'),
(4, 'discount');

-- --------------------------------------------------------

--
-- Table structure for table `categorydetails`
--

CREATE TABLE `categorydetails` (
  `productID` int(10) NOT NULL,
  `categoryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorydetails`
--

INSERT INTO `categorydetails` (`productID`, `categoryID`) VALUES
(2, 1),
(8, 1),
(10, 1),
(11, 1),
(13, 1),
(1, 2),
(4, 2),
(6, 2),
(12, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(3, 4),
(5, 4),
(7, 4),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(20) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `postalcode` varchar(5) NOT NULL,
  `country` varchar(20) NOT NULL,
  `street` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `isAdmin`, `fName`, `lName`, `email`, `phone`, `password`, `city`, `postalcode`, `country`, `street`) VALUES
(5, 1, '', '', 'test2', '', '098f6bcd4621d373cade4e832627b4f6', '', '', '', ''),
(7, 0, '', '', 'test', '', '098f6bcd4621d373cade4e832627b4f6', '', '', '', ''),
(15, 1, '', '', 'admin', '', '098f6bcd4621d373cade4e832627b4f6', '', '', '', ''),
(23, 0, 'John', 'Silver', 'user212', '0707070707', 'ef41320b54508d05b71046dc508a328b', 'NewYork', '41000', 'USA', 'NewYork'),
(28, 0, 'Kanan', 'Garaisayev', 'u2', '07000000', '270c1b084f3f146eb5787075158d9c53', 'Göteborg', '41720', 'SWEDEN', 'gatan 32'),
(31, 0, 'Abraam', 'Lincoln', 'u3', '070707070', '532a7b8e0328a8d05a8e6258b28b9a36', 'Earth', '41000', 'World', 'gatan 1');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(10) NOT NULL,
  `shipperID` int(10) NOT NULL,
  `customerID` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `sum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `shipperID`, `customerID`, `date`, `sum`) VALUES
(1, 2, 5, '2021-02-25', 100),
(23, 3, 23, '2021-03-11', 899),
(24, 3, 23, '2021-03-11', 899),
(25, 3, 23, '2021-03-11', 899),
(26, 1, 31, '2021-03-25', 1197);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `quantity` int(4) NOT NULL,
  `sum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `productID`, `quantity`, `sum`) VALUES
(1, 1, 1, 100),
(23, 1, 1, 500),
(23, 2, 1, 399),
(24, 1, 1, 500),
(24, 2, 1, 399),
(25, 1, 1, 500),
(25, 2, 1, 399),
(26, 1, 1, 500),
(26, 2, 1, 399),
(26, 7, 1, 149),
(26, 9, 1, 149);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `inStock` int(3) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `discount` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `inStock`, `price`, `discount`, `title`, `image`) VALUES
(1, 'T-Shirt Seaweed', 49, '500', 0, '', 'id_1.jpg'),
(2, 'Tiger Crew Neck Tee', 52, '399', 0, '', 'id_2.jpg'),
(3, 'Ralph Lauren', 51, '149', 10, '', 'id_3.jpg'),
(4, 'Helmut Lang Mega Standard Tee White', 33, '749', 0, '', 'id_4.jpg'),
(5, 'T-Shirt ', 43, '500', 50, 'Seawee', 'id_6.jpg'),
(6, 'Helmut Lang Mega Standard Tee White', 17, '749', 0, 'Seaweed', 'id_5.jpg'),
(7, 'Lauren Ralph', 65, '149', 15, 'Lauren', 'id_7.jpg'),
(8, 'Tiger Crew Neck Tee', 20, '399', 0, 'Neck Tee', 'id_8.jpg'),
(9, 'Lauren Ralph', 24, '149', 15, 'Lauren', 'id_9.jpg'),
(10, 'Emporio Armani', 45, '569', 0, 'Logo Crew Neck Sweatshirt Navy', 'id_10.jpg'),
(11, 'Aspesi', 50, '749', 0, 'Heritage Twill Utility', 'id_11.jpg'),
(12, 'Dandup', 50, '489', 0, 'George Jeans Blue', 'id_12.jpg'),
(13, 'Indiana', 50, '489', 0, '3-Pack T-shirts Navy/Grey/Black', 'id_13.jpg'),
(14, 'Band', 50, '99', 0, '', 'id_14.jpg'),
(15, 'Kimono Black', 50, '299', 0, '', 'id_15.jpg'),
(16, 'Kimono Black 2', 50, '349', 0, 'komplekt', 'id_16.jpg'),
(17, 'C.P. company', 50, '849', 0, 'C.P Shell Long Hooded', 'id_17.jpg'),
(18, 'Mussa', 51, '149', 0, 'yellow', 'id_18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `shipperID` int(10) NOT NULL,
  `info` text NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`shipperID`, `info`, `name`) VALUES
(1, 'Leverans inom 3 dagar', 'Post Nord'),
(2, 'Leverans i samma dag', 'Instabox'),
(3, 'International delevry ', 'DHL');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscriptionID` int(20) NOT NULL,
  `customerID` int(20) DEFAULT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscriptionID`, `customerID`, `fName`, `lName`, `email`) VALUES
(19, NULL, 'Kanan', 'Garaisayev', 'kenan@luxur.se'),
(26, NULL, 'Anna', 'Marie', 'Anna@mail.com'),
(27, NULL, 'Abraam', 'Lincoln', 'abraam@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categorydetails`
--
ALTER TABLE `categorydetails`
  ADD PRIMARY KEY (`productID`,`categoryID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `shipperID` (`shipperID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`shipperID`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscriptionID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shipperID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscriptionID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorydetails`
--
ALTER TABLE `categorydetails`
  ADD CONSTRAINT `categorydetails_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`ID`),
  ADD CONSTRAINT `categorydetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `customerID` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `shipperID` FOREIGN KEY (`shipperID`) REFERENCES `shipper` (`shipperID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
