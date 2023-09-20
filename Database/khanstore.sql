-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 02:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khanstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE `admin_detail` (
  `Admin_ID` int(30) NOT NULL,
  `Admin_Name` varchar(30) NOT NULL,
  `Admin_Password` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Admin_Email` varchar(30) NOT NULL,
  `Admin_Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`Admin_ID`, `Admin_Name`, `Admin_Password`, `Admin_Email`, `Admin_Type`) VALUES
(11, 'ADMIN', '$2y$10$bIkdXRgniQcSVWUU52bvh.5fmt9CayI69LYrjGmiftRZBxR7oV3Bm', 'ADMIN@GMAIL.COM', 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Brand_ID` int(30) NOT NULL,
  `Brand_Name` varchar(30) NOT NULL,
  `Category_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Brand_ID`, `Brand_Name`, `Category_ID`) VALUES
(11, 'HP', 17),
(12, 'LG', 17),
(13, 'BATA', 18),
(14, 'BUNENZA', 17),
(15, 'HONDA', 19),
(16, 'FAST FOOD', 20),
(17, 'COMSOM', 21);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_ID` int(30) NOT NULL,
  `Product_ID` int(30) NOT NULL,
  `IP_Address` varchar(255) NOT NULL,
  `User_ID` int(30) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Product_Image` text NOT NULL,
  `Product_Quantity` int(30) NOT NULL,
  `Product_Price` int(30) NOT NULL,
  `Total_Amount` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `Product_ID`, `IP_Address`, `User_ID`, `Product_Name`, `Product_Image`, `Product_Quantity`, `Product_Price`, `Total_Amount`) VALUES
(96, 17, '0', 33, 'LAPTOP CORE I-3', 'Images/daniel-korpai-1183301-unsplash.gif', 2, 25000, 50000),
(98, 19, '0', 33, 'BOOT', 'Images/donald-giannatti-766529-unsplash.gif', 2, 2000, 4000),
(99, 18, '0', 33, 'LAPTOP CORE I-5', 'Images/gabriel-beaudry-253365-unsplash.gif', 1, 30000, 30000),
(103, 17, '0', 34, 'LAPTOP CORE I-3', 'Images/daniel-korpai-1183301-unsplash.gif', 2, 2500, 5000),
(104, 18, '0', 34, 'LAPTOP CORE I-5', 'Images/gabriel-beaudry-253365-unsplash.gif', 4, 3000, 12000),
(105, 19, '0', 34, 'BOOT', 'Images/donald-giannatti-766529-unsplash.gif', 1, 2000, 2000),
(106, 17, '0', 36, 'LAPTOP CORE I-3', 'Images/daniel-korpai-1183301-unsplash.gif', 1, 2500, 2500),
(107, 18, '0', 36, 'LAPTOP CORE I-5', 'Images/gabriel-beaudry-253365-unsplash.gif', 1, 3000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(30) NOT NULL,
  `Category_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`) VALUES
(17, 'Electronics'),
(18, 'Fashion'),
(19, 'Transport'),
(20, 'Food'),
(21, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `Order_ID` int(30) NOT NULL,
  `User_ID` int(100) NOT NULL,
  `Product_ID` int(255) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Quantity` int(255) NOT NULL,
  `Payment_Status` varchar(30) NOT NULL,
  `Transaction_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_received`
--

CREATE TABLE `payment_received` (
  `Payment_ID` int(30) NOT NULL,
  `User_ID` int(30) NOT NULL,
  `Product_ID` int(30) NOT NULL,
  `Amount` int(30) NOT NULL,
  `Transaction_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(30) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Product_Price` int(30) NOT NULL,
  `Product_Quantity` int(40) NOT NULL,
  `Category_ID` int(30) NOT NULL,
  `Brand_ID` int(30) NOT NULL,
  `Product_Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Product_Price`, `Product_Quantity`, `Category_ID`, `Brand_ID`, `Product_Image`) VALUES
(17, 'LAPTOP CORE I-3', 2500, 20, 17, 11, 'Images/daniel-korpai-1183301-unsplash.gif'),
(18, 'LAPTOP CORE I-5', 3000, 20, 17, 12, 'Images/gabriel-beaudry-253365-unsplash.gif'),
(19, 'BOOT', 2000, 20, 18, 13, 'Images/Image (19).gif'),
(20, 'HONDA 125', 80000, 10, 19, 15, 'Images/austin-neill-174685-unsplash.gif'),
(21, 'Scooter', 20000, 15, 19, 15, 'Images/anastasiia-tarasova-576846-unsplash.gif'),
(22, 'Cack', 1000, 50, 20, 16, 'Images/alexandra-golovac-781115-unsplash.gif'),
(23, 'TABLE T-5', 1000, 10, 21, 17, 'Images/alexandra-gorn-479346-unsplash.gif'),
(24, 'J-5', 1000, 12, 17, 11, 'Images/ben-kolde-430909-unsplash.gif'),
(26, 'Wallnut', 120, 1500, 20, 16, 'Images/ashkan-forouzani-1135080-unsplash.gif'),
(27, 'Door', 1500, 20, 21, 17, 'Images/christian-stahl-313383-unsplash.gif'),
(28, 'Bra', 200, 10, 18, 13, 'Images/christopher-campbell-107917-unsplash.gif');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `User_ID` int(30) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `User_Email` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_Mobile` bigint(200) NOT NULL,
  `User_Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`User_ID`, `User_Name`, `User_Email`, `User_Password`, `User_Mobile`, `User_Address`) VALUES
(36, 'User', 'User@gmail.com', '$2y$10$YX5QN8FwpOAzs6y8JhPGe.WvVYeMzljVnafSNZaJTOhf182tcfSqW', 3129090112, 'Karak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Brand_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `payment_received`
--
ALTER TABLE `payment_received`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Category_ID` (`Category_ID`,`Brand_ID`),
  ADD KEY `product_ibfk_2` (`Brand_ID`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_detail`
--
ALTER TABLE `admin_detail`
  MODIFY `Admin_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Brand_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `Order_ID` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_received`
--
ALTER TABLE `payment_received`
  MODIFY `Payment_ID` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `User_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Brand_ID`) REFERENCES `brand` (`Brand_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
