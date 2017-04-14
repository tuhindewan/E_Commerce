-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 02:16 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Saiduzzaman Tuhin', 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'IPHONE'),
(2, 'WALTON'),
(3, 'SAMSUNG'),
(4, 'ACER'),
(5, 'CANON');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(1, 'mkhblpoh53ogplg6fi245moc22', 6, 'Lorem Ipsum is simply', 428.02, 1, 'upload/10b7095808.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`catId`, `catName`) VALUES
(1, 'Mobile Phones'),
(2, 'Desktop'),
(3, 'Laptop'),
(4, 'Accessories'),
(5, 'Clothing'),
(6, 'Sports'),
(7, 'Software'),
(8, 'Footwear');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerId`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `password`) VALUES
(1, 'Customer One', 'mirpur 10', 'Dhaka', 'bangladesh', '1230', '01890000000', 'customerone@gmail.com', 'bf32afde09f246478d97b2e3eaaecd8b'),
(2, 'Customer Two', 'Dhanmondi 32', 'Dhaka', 'bangladesh', '1240', '01890000000', 'customertwo@gmail.com', '8972ba5cbb2b8b323aee890c29d233b7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(55, 1, 3, 'Lorem Ipsum is simply', 1, 505.22, 'upload/6a8c0b4100.png', '2017-04-14 04:10:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(1, 'Samsung Intel Core i3', 4, 3, '<p>Samsung is a very good brand.</p>', 220.20, 'upload/876f4f16c8.jpg', 1),
(2, 'Huawei P9', 0, 2, '<p>product details will go here</p>', 120.10, 'upload/8ccc1dae26.jpg', 1),
(3, 'Lorem Ipsum is simply', 4, 1, '<p>Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.Product details will goes here.Product details will goes here.Product details will goes here.</p>\r\n<p>Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.Product details will goes here.Product details will goes here.Product details will goes here.</p>\r\n<p>Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.Product details will goes here.Product details will goes here.Product details will goes here.</p>\r\n<p>Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.Product details will goes here.Product details will goes here.Product details will goes here.</p>', 505.22, 'upload/6a8c0b4100.png', 1),
(4, 'Lorem Ipsum is simply', 8, 2, '<p>Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.Product details will goes here.Product details will goes here.Product details will goes here.</p>\r\n<p>Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.Product details will goes here.Product details will goes here.Product details will goes here.</p>\r\n<p>Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.Product details will goes here.Product details will goes here.Product details will goes here.</p>\r\n<p>Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.&nbsp;Product details will goes here.Product details will goes here.Product details will goes here.Product details will goes here.</p>', 220.97, 'upload/375b5e6e3b.jpg', 1),
(5, 'Lorem Ipsum is simply', 6, 3, '<p>Product details goes here.&nbsp;Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>\r\n<p>Product details goes here.&nbsp;Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>\r\n<p>Product details goes here.&nbsp;Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>\r\n<p>Product details goes here.&nbsp;Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>', 457.88, 'upload/d5945b0596.png', 1),
(6, 'Lorem Ipsum is simply', 5, 5, '<p>Product details goes here. Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>', 428.02, 'upload/10b7095808.jpg', 1),
(7, 'Lorem Ipsum is simply', 8, 4, '<p>Product details goes here. Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>\r\n<p>Product details goes here. Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.Product details goes here.</p>', 620.87, 'upload/4061a92021.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(8, 1, 3, 'Lorem Ipsum is simply', 505.22, 'upload/6a8c0b4100.png'),
(9, 1, 1, 'Samsung Intel Core i3', 220.20, 'upload/876f4f16c8.jpg'),
(10, 1, 7, 'Lorem Ipsum is simply', 620.87, 'upload/4061a92021.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
