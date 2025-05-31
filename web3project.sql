-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 06:39 AM
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
-- Database: `web3project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(5) NOT NULL,
  `size` varchar(5) NOT NULL,
  `quantity` varchar(2) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ID` int(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(50) NOT NULL,
  `street-name` varchar(255) NOT NULL,
  `building-nbr` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `order-status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ID`, `username`, `name`, `number`, `email`, `method`, `street-name`, `building-nbr`, `city`, `total_products`, `total_price`, `order-status`) VALUES
(49, 'youssef', 'Youssef Gerges', '71789047', 'youusefgerges@gmail.com', 'Cash on delivery', 'amchit,.....', 'building nbr 32', 'jbeil', 'Pyjamas (Quantity: 1, Size: M)\nWomen Leggings (Quantity: 1, Size: M)\nGirls Autumn Combo (Skirt & T-Shirt) (Quantity: 1, Size: M)\nBoys Blue T-Shirt (Quantity: 1, Size: M)', 125, 'Ready'),
(54, 'youssef', 'youssef', '12323123', 'fashion.boutique.00000@gmail.com', 'Cash on delivery', 'amchit,.....', 'building building 2222', 'jbeil', 'Baggy Cargo Pants (Quantity: 1, Size: M)\nWomen Black CropTop (Quantity: 1, Size: M)', 64, 'Done'),
(56, 'user1', 'youssef', '71789047', 'fashion.boutique.00000@gmail.com', 'Cash on delivery', 'amchit,.....', 'building nbr 32', 'jbeil', 'Men Red Printed T-Shirt (Quantity: 2, Size: M)\nConverse Shoes (Quantity: 1, Size: 30)\nBaggy Cargo Pants (Quantity: 1, Size: M)', 119, 'Done'),
(57, 'user1', 'youssef', '123123', 'fashion.boutique.00000@gmail.com', 'Credit-card', 'amchit,.....', 'building nbr 32', 'jbeil', 'Converse Shoes (Quantity: 1, Size: 30)', 30, 'Pending...'),
(58, 'youssef', 'youssef', '71273471', 'fashion.boutique.00000@gmail.com', 'Cash on delivery', 'amchit,.....', 'building nbr 32', 'jbeil', 'Converse Shoes (Quantity: 1, Size: 36)', 30, 'Pending...'),
(59, 'youssef', 'youssef', '123', 'gergesyoussef273@gmail.com', 'Cash on delivery', 'amchit,.....', 'building nbr 32', 'jbeil', 'Women White shirt (Quantity: 1, Size: M)', 30, 'Pending...'),
(60, 'youssef', 'youssef', '123', 'gergesyoussef273@gmail.com', 'Cash on delivery', 'amchit,.....', 'building nbr 32', 'jbeil', 'Converse Shoes (Quantity: 1, Size: 30)', 30, 'Pending...'),
(61, 'Youssef', 'youssef', '71789047', 'youusefgerges@gmail.com', 'Cash on delivery', 'amchit,.....', 'building nbr 32', 'jbeil', 'Men Red Printed T-Shirt (Quantity: 1, Size: M)', 25, 'Pending...'),
(62, 'youssef', '123', '123', 'gergesyoussef273@gmail.com', 'Cash on delivery', '123', '123', '123', 'Converse Shoes (Quantity: 1, Size: 30)', 30, 'Pending...'),
(63, 'youssef', '123', '123333', 'yussefgerges@gmail.com', 'Cash on delivery', '213', '123', '123', 'Converse Shoes (Quantity: 1, Size: 30)', 30, 'Pending...'),
(64, 'youssef', 'youssef', '71789047', 'youusefgerges@gmail.com', 'Cash on delivery', 'jbeil', 'jbeil', 'jbeil', 'Men Red Printed T-Shirt (Quantity: 1, Size: M)\nConverse Shoes (Quantity: 2, Size: 30)', 85, 'Pending...'),
(65, 'youssef', 'youssef', '71789407', 'youusefgerges@gmail.com', 'Cash on delivery', '213', '123', 'jbeil', 'Men Red Printed T-Shirt (Quantity: 1, Size: M)\nFloral shirt (Quantity: 1, Size: M)', 60, 'Pending...'),
(66, 'youssef', 'youssef', '1231', 'youusefgerges@gmail.com', 'Cash on delivery', '213', '123', 'jbeil', 'Converse Shoes (Quantity: 1, Size: 30)', 30, 'Pending...'),
(67, 'youssef', 'youssef', '4333', 'gergesyoussef02@gmail.com', 'Cash on delivery', '213', 'jbeil', 'jbeil3213', 'Women Blue Jeans (Quantity: 1, Size: M)\nWomen Blue Dress (Quantity: 1, Size: M)', 115, 'Pending...'),
(68, 'youssef', 'youssef', '1233213', 'gergesyoussef02@gmail.com', 'Cash on delivery', '213', '123', 'jbeil', 'Men Red Printed T-Shirt (Quantity: 1, Size: M)', 25, 'Pending...');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(4) NOT NULL,
  `name` varchar(300) NOT NULL,
  `price` varchar(5) NOT NULL,
  `quantity` int(2) NOT NULL,
  `rating` varchar(500) NOT NULL,
  `image` text NOT NULL,
  `men` text NOT NULL,
  `women` text NOT NULL,
  `kids` text NOT NULL,
  `shoes` varchar(4) NOT NULL,
  `sale` text NOT NULL,
  `sale-percentage` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `name`, `price`, `quantity`, `rating`, `image`, `men`, `women`, `kids`, `shoes`, `sale`, `sale-percentage`) VALUES
(1, 'Men Red Printed T-Shirt', '25.00', 13, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im9.jpg', 'yes', 'no', 'no', '', 'no', 15),
(2, 'Converse Shoes', '30.00', 5, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'im10.jpg', 'yes', 'yes', 'no', 'yes', 'no', 0),
(4, 'Baggy Cargo Pants', '39.00', 75, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'im11.webp', 'yes', 'yes', 'no', '', 'no', 0),
(5, 'Women White shirt', '30.00', 75, '              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im12.avif', 'no', 'yes', 'yes', '', 'no', 0),
(6, 'Men Winter Coat', '45.00', 54, '              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im13.jpg', 'yes', 'no', 'no', '', 'no', 0),
(7, 'Women Blue Dress', '70.00', 84, '              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'im14.jpg', 'no', 'yes', 'no', '', 'no', 0),
(8, 'Women Blue Jeans', '45.00', 52, '              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im16.jpg', 'no', 'yes', 'no', '', 'no', 0),
(9, 'Men Joggers', '46.00', 0, '              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im17.jpg', 'yes', 'no', 'no', '', 'no', 0),
(10, 'White Nike AirForce', '40.00', 41, '              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im27.jpeg', 'yes', 'yes', 'no', 'yes', 'no', 0),
(11, 'Women Black CropTop', '25.00', 42, '              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im28.jpg', 'no', 'yes', 'no', '', 'no', 0),
(12, 'Men Bayo Gray Pants', '35.00', 42, '              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im29.jpeg', 'yes', 'no', 'no', '', 'no', 0),
(13, 'Women Long Skirt', '30.00', 91, '              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n              <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im30.avif', 'no', 'yes', 'no', '', 'no', 0),
(14, 'Nike Socks', '15.00', 53, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im31.jpeg', 'yes', 'yes', 'no', 'yes', 'no', 0),
(15, 'Polo Checkered Shirt', '72.00', 52, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im100.jpg', 'yes', 'no', 'no', '', 'yes', 50),
(16, 'Women Leggings', '45.00', 31, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im33.jpeg', 'no', 'yes', 'no', '', 'no', 0),
(17, 'Men Compressed T-Shirt', '45.00', 32, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>        \r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im34.jpeg', 'yes', 'no', 'no', '', 'no', 0),
(18, 'Men Grey Suit', '90.00', 23, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'im35.jpg', 'yes', 'no', 'no', '', 'no', 0),
(19, 'Gucci T-Shirt', '40.00', 21, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im37.jpg', 'yes', 'yes', 'no', '', 'no', 0),
(20, 'Women Prada Cotton Black Dress', '55.00', 23, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im42.jpg', 'no', 'yes', 'no', '', 'no', 0),
(21, 'Gucci Track Suit', '80.00', 21, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im38.jpg', 'yes', 'yes', 'no', '', 'no', 0),
(22, 'Men Classic Long Shirt', '30.00', 12, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im36.jpg', 'yes', 'no', 'no', '', 'no', 0),
(23, 'Women Gold Sequined Gucci Dress', '60.00', 0, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im39.jpg', 'no', 'yes', 'no', '', 'no', 0),
(24, 'Men Prada Milano Long Sleeve Shirt', '50.00', 22, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'im41.jpg', 'yes', 'no', 'no', '', 'no', 0),
(25, 'Gucci Red Green Creamy Hawaii Shirt', '45.00', 21, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im40.jpg', 'yes', 'no', 'no', '', 'no', 0),
(26, 'Men Olive Green Shirt', '45.00', 21, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im45.jpg', 'yes', 'no', 'no', '', 'no', 0),
(27, 'Men Nike Fleece Hoodie', '25.00', 12, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im43.jpg', 'yes', 'no', 'no', '', 'no', 0),
(28, 'Men Nike Soccer Pants', '35.00', 21, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im44.jpg', 'yes', 'no', 'no', '', 'no', 0),
(29, 'Women Grey Jogger Pants', '45.00', 11, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>', 'im46.jpg', 'no', 'yes', 'no', '', 'no', 0),
(30, 'Women Black Long Dress', '110.0', 43, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'im50.jpg', 'no', 'yes', 'no', '', 'no', 0),
(31, 'Women Purple Dress', '70.00', 43, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'im001.jpeg', 'no', 'yes', 'no', '', 'no', 0),
(32, 'Women High Waisted Jeans', '40.00', 24, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im47.jpg', 'no', 'yes', 'no', '', 'no', 0),
(33, 'Men Long Adidas Shorts', '30.00', 55, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im52.jpg', 'yes', 'no', 'no', '', 'no', 0),
(34, 'Women Baggy Jeans', '45.00', 32, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im48.jpg', 'no', 'yes', 'no', '', 'no', 0),
(35, 'Women Red Long Dress', '70.00', 23, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'im49.jpg', 'no', 'yes', 'no', '', 'no', 0),
(36, 'Women Green Floral Dress', '100.0', 32, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>', 'im002.png', 'no', 'yes', 'no', '', 'no', 0),
(37, 'Women Pink Shorts', '35.00', 0, '                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                  <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im51.jpg', 'no', 'yes', 'no', '', 'no', 0),
(40, 'Women Bonny Skirt', '55.00', 32, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'im53.jpg', 'no', 'yes', 'no', '', 'no', 0),
(41, 'Men White Shirt with Black Buttons', '35.00', 32, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im55.jpg', 'yes', 'no', 'no', '', 'no', 0),
(42, 'Floral shirt', '35.00', 30, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im99.jpg', 'yes', 'no', 'no', '', 'yes', 30),
(43, 'Blue Comfort Grip Socks', '15.00', 32, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im56.jpeg', 'yes', 'yes', 'no', 'yes', 'no', 0),
(44, 'Pyjamas', '35.00', 54, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im57.jpeg', 'yes', 'yes', 'no', '', 'no', 0),
(45, 'Men Tactical Pants', '55.00', 64, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im58.jpeg', 'yes', 'no', 'no', '', 'no', 0),
(46, 'Lorenzo Boots', '40.00', 79, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im59.jpeg', 'yes', 'no', 'no', 'yes', 'no', 0),
(47, 'Men White T-Shirt', '30.00', 95, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im60.jpeg', 'yes', 'no', 'no', '', 'no', 0),
(48, 'Women Red High Heals', '55.00', 42, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>', 'im61.jpeg', 'no', 'yes', 'no', 'yes', 'no', 0),
(49, 'Men Black Hoodie', '40.00', 54, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>', 'im62.jpeg', 'yes', 'no', 'no', '', 'no', 0),
(50, 'Girls Pink Dress', '30.00', 32, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im64.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(51, 'Boys 3rd B-Day T-Shirt', '20.00', 43, '                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\r\n                <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im65.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(52, 'Boys Grean Cotton Shorts', '30.00', 33, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-half\" aria-hidden=\"true\"></i>', 'im66.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(53, 'Girls Blue Dress', '40.00', 20, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>', 'im67.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(54, 'Boys Fashion Boots', '35.00', 21, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im69.jpeg', 'no', 'no', 'yes', 'yes', 'no', 0),
(55, 'Girls Black Joggers', '30.00', 12, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im68.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(56, 'Boys Football Shoes', '15.00', 30, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im70.jpeg', 'no', 'no', 'yes', 'yes', 'no', 0),
(57, 'Girls Autumn Combo (Skirt & T-Shirt)', '25.00', 31, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>', 'im71.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(58, 'Girls Jacket', '30.00', 22, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im72.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(59, 'Girls Winter Boots', '40.00', 22, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>', 'im73.jpeg', 'no', 'no', 'yes', 'yes', 'no', 0),
(60, 'Boys Blue T-Shirt', '20.00', 11, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im74.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(61, 'Girls Purple Pretty T-Shirt', '20.00', 12, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im75.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(62, 'Boys Kai NinjaGo Printed T-Shirt', '25.00', 32, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im76.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(63, 'Boys Jacket', '40.00', 23, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>', 'im81.jpeg', 'no', 'no', 'yes', '', 'no', 0),
(64, 'Men Gray Goose Formal Shirt', '50.00', 31, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-half-o\" aria-hidden=\"true\"></i>', 'im32.jpeg', 'yes', 'no', 'no', '', 'no', 0),
(65, 'Women White Long Skirt', '41.00', 32, '          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star\" aria-hidden=\"true\"></i>\r\n          <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>', 'im54.jpg', 'no', 'yes', 'no', '', 'no', 0),
(85, 'test', '48', 33, '<i class=\"fa fa-star\" aria-hidden=\"true\"></i><i class=\"fa fa-star\" aria-hidden=\"true\"></i><i class=\"fa fa-star\" aria-hidden=\"true\"></i><i class=\"fa fa-star\" aria-hidden=\"true\"></i><i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'pp4.jpg', 'yes', 'yes', 'yes', 'yes', 'yes', 43);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(4) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phonenumber` int(8) DEFAULT NULL,
  `adminnb` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`, `phonenumber`, `adminnb`) VALUES
(15, 'Youssef', 'youssef.admin', 'gergesyoussef273@gmail.com', 71789047, 1),
(16, 'Youssef', 'youssef.user', 'gergesyoussef273@gmail.com', 71789047, 0),
(21, 'test', 'test', 'test@gmail.com', 70112233, 1),
(22, 'testingg', 'test123', 'test123@gmail.com', 70112233, 0),
(27, 'user1', 'userA123', 'user1@gmail.com', 79463379, 0),
(30, 'fashion1212', 'Fashion.1212', 'fashion.bou@gmail.com', 79246833, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
