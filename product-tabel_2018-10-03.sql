-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2018 at 05:04 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expired_date`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_barcode` varchar(50) NOT NULL,
  `ID` int(50) NOT NULL,
  `items` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(50) CHARACTER SET latin1 NOT NULL,
  `category` varchar(100) CHARACTER SET latin1 NOT NULL,
  `lane` varchar(2) CHARACTER SET latin1 NOT NULL,
  `mode` int(2) NOT NULL,
  `shelf` int(2) NOT NULL,
  `stock_In` date NOT NULL,
  `expiredDate` date NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 NOT NULL,
  `stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_barcode`, `ID`, `items`, `price`, `brand`, `category`, `lane`, `mode`, `shelf`, `stock_In`, `expiredDate`, `status`, `stock`) VALUES
('2222', 1, 'soya', 2, 'F&N', 'Food', 'D', 10, 2, '2018-07-04', '2018-10-04', 'Active', 20),
('6930266331452', 10, 'Oreo Fuze', 3, 'Oreo', 'Food', 'G', 3, 2, '2018-07-12', '2018-09-06', 'Active', 40),
('6930266333332', 10, 'Oreo thin', 3, 'Oreo', 'Food', 'G', 2, 3, '2018-09-06', '2018-11-14', 'Active', 10),
('6934545318592	', 10, 'Oreo butter', 3, 'Oreo', 'Food', 'D', 1, 2, '2018-07-02', '2018-09-05', 'Inactive', 5),
('6937777718592', 13, 'Chewing Gum', 1, 'Sugus', 'Food', 'E', 3, 2, '2018-09-06', '2018-10-31', 'Active', 10),
('7777266318592', 6, 'Black forest', 5, 'Cadbury', 'Food', 'D', 3, 3, '2018-09-06', '2018-10-17', 'Active', 20),
('8993175538145', 8, 'Nabati Cheese Wafer', 1, 'Richeese', 'Food', 'G', 3, 3, '2018-07-04', '2018-08-22', 'Inactive', 50),
('9111584755455', 7, 'Cloud bar', 1, 'cloud 9', 'Food', 'A', 3, 4, '2018-06-06', '2018-08-21', 'Inactive', 23),
('9555589209326', 2, 'Air Anggur', 2, 'Fanta', 'Drinks', 'B', 2, 3, '2018-07-11', '2018-09-05', 'Active', 15),
('9556404117512', 2, 'mountain dew', 2, 'Fanta', 'Drinks', 'D', 1, 1, '2018-07-12', '2018-09-06', 'Active', 21),
('9556570312858', 1, 'ice mountain', 2, 'F&N', 'Drinks', 'B', 2, 2, '2018-06-01', '2018-08-30', 'Inactive', 10),
('9556647320010', 12, 'Roti Vanilla', 1, 'Gardenia', 'Food', 'H', 3, 2, '2018-09-06', '2018-11-08', 'Active', 12),
('9888584755455', 3, 'Mirinda Orange', 2, 'Mirinda', 'Drinks', 'A', 2, 3, '2018-05-02', '2018-08-21', 'Inactive', 13),
('98890283011', 4, 'mee hoon', 4, 'Jasmine', 'Food', 'A', 3, 3, '2018-05-03', '2018-08-17', 'Inactive', 25),
('998856455755', 5, 'lifebuoy red', 5, 'lifebuoy', 'Toiletries', 'H', 2, 3, '2018-04-12', '2018-08-23', 'Inactive', 21),
('9999266318592', 10, 'Oreo Double', 3, 'Oreo', 'Food', 'E', 2, 3, '2018-09-06', '2018-12-06', 'Active', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_barcode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
