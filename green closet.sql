-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 11:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green closet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `reference_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `phone`, `username`, `email`, `password`, `reference_code`) VALUES
(9, 'test2', 5454, 'tes2', 'test2@gmail.com', '$2y$10$.FUyuWFLmzsesG/6Ng9qT.gYc95vcIgkU4UBx5jzHtkXL8T1LUEA2', 'sfs'),
(10, 'Shihab Muhtasim', 1993043534, 'shihab', 'shihab.muhtasim@g.bracu.ac.bd', '$2y$10$0LLfGmZaQnFc3Q1zPNkcrevQ7w21/p.YA/7ga1KskAyIrnK32quU2', 'ABCD'),
(0, 'name3', 43563, 'test3', 'shihab.muhtasim@g.bracu.ac.bd', '$2y$10$hQTsaoQw/qvqDh5ckbtdvuViim2wR1VYlH27Tbz8KPUmIB10r..NW', 'dfbdv'),
(0, 'Rabita', 1876543345, 'rabita', 'rabita@gmail.com', '$2y$10$cg2v7GTOVq2Y/OvuuwVHfOYS1Dw1rOHaWCyyGBnW8AbPk5RPsJ2RO', 'ZXCV'),
(0, 'Tasnia Ayesha', 2147483647, 'tasnia', 'tasnia@gmail.com', '$2y$10$d0GBZr/S7MHa1/uhAilSB.7hHL74ajROZL8bIllktj43etfbM9IPS', '7890');

-- --------------------------------------------------------

--
-- Table structure for table `apparels`
--

CREATE TABLE `apparels` (
  `apparel_id` int(11) NOT NULL,
  `apparel_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apparels`
--

INSERT INTO `apparels` (`apparel_id`, `apparel_title`) VALUES
(21, 'SHIRT'),
(22, 'PANT'),
(23, 'SUIT'),
(24, 'TOP'),
(25, 'SALWAR KAMEEZ'),
(26, 'T-shirt'),
(28, 'Panjabi'),
(29, 'Saree'),
(30, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(11, 'MEN'),
(12, 'WOMEN'),
(13, 'ACCESSORIES');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(500) NOT NULL,
  `ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user id`, `name`, `email`, `address`, `phone`, `password`, `ip`) VALUES
(1, 't1 ', 'test1@gmail.com', 'h', 890, '$2y$10$cOW5JfEr0yNI7Dx483o5..qC6MOsAwP4YElVu08QQ6wdERG7v3Hkm', '::1'),
(2, 't2 ', 'test2@gmail.com', 'h', 8986, '$2y$10$w5HNNcFydTQGzzMZtu/lYuyo5kH700xhStWVcECRz8JaVg2z2Hpfy', '::1'),
(3, 'misja ', 'misha@gmail.com', 'gfshgxs', 87753, '$2y$10$CkAHWkwqDrTl2lLhBI7z2uujTj4LdHnTLMUjSG4tEiH6YwyvdPVZK', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 16, 999, 933457334, 1, '2023-04-08 04:34:18', 'Complete'),
(2, 16, 999, 119449112, 1, '2023-04-08 06:26:04', 'Complete'),
(3, 16, 11999, 1494836093, 3, '2023-04-08 06:42:29', 'Complete'),
(4, 16, 999, 480042561, 1, '2023-04-08 06:42:54', 'Complete'),
(5, 16, 999, 2115873092, 1, '2023-04-08 07:28:43', 'Complete'),
(6, 16, 10000, 1240489626, 1, '2023-04-08 07:30:53', 'Complete'),
(7, 16, 10000, 1010119357, 1, '2023-04-08 07:33:35', 'Complete'),
(8, 16, 10000, 2006983978, 1, '2023-04-08 07:37:54', 'Complete'),
(9, 16, 999, 937321571, 1, '2023-04-10 17:50:28', 'Complete'),
(10, 16, 1999, 100320481, 2, '2023-04-10 18:23:00', 'Complete'),
(11, 16, 10000, 590998470, 1, '2023-04-10 18:23:44', 'Complete'),
(12, 16, 3000, 318197268, 1, '2023-04-10 18:09:21', 'Complete'),
(13, 16, 0, 1784229386, 0, '2023-04-10 19:01:48', 'Complete'),
(14, 16, 1000, 322757281, 1, '2023-04-10 19:02:01', 'Complete'),
(15, 16, 11999, 1638584163, 3, '2023-04-11 20:38:14', 'Complete'),
(16, 16, 800000, 1070591834, 1, '2023-04-11 20:41:06', 'Complete'),
(17, 16, 10999, 383642640, 2, '2023-04-11 20:43:17', 'Complete'),
(18, 16, 2147483647, 697308875, 1, '2023-04-11 20:51:03', 'Complete'),
(19, 16, 999, 65014002, 1, '2023-04-12 14:06:04', 'Complete'),
(20, 16, 1000, 2121625745, 1, '2023-04-12 14:06:56', 'Complete'),
(21, 16, 999, 1119295844, 1, '2023-04-12 13:26:54', 'pending'),
(22, 16, 11000, 347044058, 2, '2023-04-12 13:47:47', 'pending'),
(23, 16, 1000, 2107262693, 1, '2023-04-12 14:01:52', 'pending'),
(24, 16, 999, 1786049889, 1, '2023-04-12 14:14:12', 'pending'),
(25, 16, 10000, 1427758541, 1, '2023-04-12 14:33:51', 'pending'),
(26, 18, 1000, 1645974511, 1, '2023-04-12 14:34:38', 'pending'),
(27, 1, 10000, 669885304, 1, '2023-04-12 14:40:00', 'Complete'),
(28, 2, 1000, 1602457873, 1, '2023-04-12 14:49:58', 'Complete'),
(29, 2, 999, 557409201, 1, '2023-04-12 14:48:00', 'pending'),
(30, 2, 11000, 105797393, 2, '2023-04-12 14:49:36', 'pending'),
(31, 2, 11000, 1573977213, 2, '2023-04-12 15:30:50', 'pending'),
(32, 1, 1500, 1660160121, 1, '2023-04-12 15:54:23', 'pending'),
(33, 3, 2500, 1962700585, 1, '2023-04-12 20:08:59', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 16, 933457334, 3, 1, 'pending'),
(2, 16, 119449112, 3, 1, 'pending'),
(3, 16, 1494836093, 3, 1, 'pending'),
(4, 16, 480042561, 3, 1, 'pending'),
(5, 16, 2115873092, 3, 1, 'pending'),
(6, 16, 1240489626, 1, 1, 'pending'),
(7, 16, 1010119357, 1, 1, 'pending'),
(8, 16, 2006983978, 1, 1, 'pending'),
(9, 16, 937321571, 3, 1, 'pending'),
(10, 16, 100320481, 3, 1, 'pending'),
(11, 16, 590998470, 1, 1, 'pending'),
(12, 16, 318197268, 2, 3, 'pending'),
(13, 16, 1784229386, 0, 1, 'pending'),
(14, 16, 322757281, 2, 1, 'pending'),
(15, 16, 1638584163, 3, 1, 'pending'),
(16, 16, 1070591834, 2, 800, 'pending'),
(17, 16, 383642640, 3, 1, 'pending'),
(18, 16, 697308875, 1, 5020000, 'pending'),
(19, 16, 65014002, 3, 1, 'pending'),
(20, 16, 2121625745, 2, 1, 'pending'),
(21, 16, 1119295844, 3, 1, 'pending'),
(22, 16, 347044058, 2, 1, 'pending'),
(23, 16, 2107262693, 2, 1, 'pending'),
(24, 16, 1786049889, 3, 1, 'pending'),
(25, 16, 1427758541, 1, 1, 'pending'),
(26, 18, 1645974511, 2, 1, 'pending'),
(27, 1, 669885304, 1, 1, 'pending'),
(28, 2, 1602457873, 2, 1, 'pending'),
(29, 2, 557409201, 3, 1, 'pending'),
(30, 2, 105797393, 2, 1, 'pending'),
(31, 2, 1573977213, 2, 1, 'pending'),
(32, 1, 1660160121, 549, 1, 'pending'),
(33, 3, 1962700585, 559, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 933457334, 999, 'Cash On Delivery', '2023-04-08 04:34:18'),
(2, 2, 119449112, 999, 'Paypal', '2023-04-08 06:26:04'),
(3, 3, 1494836093, 11999, 'Paypal', '2023-04-08 06:42:29'),
(4, 4, 480042561, 999, 'Paypal', '2023-04-08 06:42:54'),
(5, 5, 2115873092, 999, 'Paypal', '2023-04-08 07:28:43'),
(6, 6, 1240489626, 10000, 'Paypal', '2023-04-08 07:30:53'),
(7, 7, 1010119357, 10000, 'Cash On Delivery', '2023-04-08 07:33:35'),
(8, 8, 2006983978, 10000, 'Paypal', '2023-04-08 07:37:54'),
(9, 9, 937321571, 999, 'Paypal', '2023-04-10 17:50:28'),
(10, 9, 937321571, 999, 'Paypal', '2023-04-10 18:09:14'),
(11, 12, 318197268, 3000, 'Paypal', '2023-04-10 18:09:21'),
(12, 10, 100320481, 1999, 'Paypal', '2023-04-10 18:23:00'),
(13, 11, 590998470, 10000, 'Paypal', '2023-04-10 18:23:44'),
(14, 11, 590998470, 10000, 'Paypal', '2023-04-10 18:23:54'),
(15, 13, 1784229386, 0, 'Cash On Delivery', '2023-04-10 19:01:48'),
(16, 14, 322757281, 1000, 'Cash On Delivery', '2023-04-10 19:02:01'),
(17, 15, 1638584163, 11999, 'Cash On Delivery', '2023-04-11 20:38:14'),
(18, 16, 1070591834, 800000, 'UPI', '2023-04-11 20:41:06'),
(19, 17, 383642640, 10999, 'NET Banking', '2023-04-11 20:43:17'),
(20, 18, 697308875, 2147483647, 'Cash On Delivery', '2023-04-11 20:51:03'),
(21, 19, 65014002, 999, 'UPI', '2023-04-12 14:06:04'),
(22, 20, 2121625745, 1000, 'Paypal', '2023-04-12 14:06:56'),
(23, 27, 669885304, 10000, 'Cash On Delivery', '2023-04-12 14:40:00'),
(24, 28, 1602457873, 1000, 'NET Banking', '2023-04-12 14:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `apparel_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_quantity` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `apparel_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `product_quantity`, `date`) VALUES
(1, 'Men Black Suit', 'Dark Midnight Blue Cutdana Embroidered Italian Tuxedo Suit-HE5063', 'Black, Men, Suit', 11, 23, 'men black suit.jpg', '', '', 10000, 0, '2023-04-02 15:39:29'),
(2, 'Burberry Premium Polo T-Shirt (Black)', '•Full Fresh Premium Cotton Product\r\n•200+ GSM Used\r\n•Perfect For This Summer Heat\r\nCotton Polo Shirts\r\nElegant look\r\nExport Quaity Fabrics and Swing\r\nMore that 200 GSM\r\nSmart Regular Fit Shirts', 'MEN, Premium T-shirt, Blueberry, Black', 11, 26, 'Blueberry premium polo tshirt.jpg', '', '', 1000, 0, '2023-04-02 15:39:47'),
(3, 'Premium Ribbed T-shirt (Black)', 'Available sizes: S, M, L, XL, XXL\r\n•Full Fresh Premium Cotton Product\r\n•200+ GSM Used\r\n•Perfect For This Summer Heat\r\nCotton Polo Shirts\r\nElegant look\r\nExport Quaity Fabrics and Swing\r\nMore that 200 GSM\r\nSmart Regular Fit Shirts', ' MEN, Clothing, Premium T-shirts, T-Shirt, ', 11, 26, 'black tshirt.jpg', 'black tshirt2.jpg', 'black tshirt3.jpg', 999, 0, '2023-04-02 15:40:03'),
(549, 'Mens Formal Shirt (Maroon)', 'This Well-Fitting Formal Shirt Has The Ability To Transform Your Look, From Office Wear During The Day', 'Mens, Formal, Shirt, Maroon', 11, 21, 'Screenshot 2023-04-12 214909.png', 'Screenshot 2023-04-12 214852.png', 'Screenshot 2023-04-12 214816.png', 1500, 20, '2023-04-12 15:51:13'),
(550, 'Mens Panjabi (Black)', 'This Premium Panjabi Is Designed To Make You Stand Out On Any Occasion', 'Mens, Panjabi , Black', 11, 28, 'Capture.PNG', 'pan1.PNG', 'pan2.PNG', 1700, 25, '2023-04-12 16:32:52'),
(551, 'Shalwar Kameez Scarf (Grey)', 'This Is An Absolutely Gorgeous And Unique Novelty Piece That Will Make Your Ethnic Look More Stylish & Classic.', 'Shalwar Kameez, Scarf, Grey', 12, 25, 'sa1.PNG', 'sa2.PNG', 'sa3.PNG', 1300, 15, '2023-04-12 17:59:40'),
(552, 'Powder Blue Cotton Anarkali', 'Powder Blue Cotton Anarkali Kurta Churidar Suit Set', 'Powder Blue, Cotton, Anarkali, salwar kameez', 12, 25, 'a1.PNG', 'a2.PNG', 'a3.PNG', 2000, 22, '2023-04-12 18:05:04'),
(553, 'Red Cotton Anarkali', 'Red Cotton Anarkali Kurta Churidar Suit Set', 'Red, Cotton, Anarkali, salwar kameez', 12, 25, 'r1.PNG', 'r2.PNG', 'r3.PNG', 1800, 16, '2023-04-12 18:08:35'),
(554, 'Sea Green salwar kameez', ' It is made from Modal and features a straight silhouette and elbow length sleeves.', 'Sea Green, salwar kameez', 12, 25, 's2.PNG', 's1.PNG', 's3.PNG', 1900, 19, '2023-04-12 18:12:38'),
(555, 'Blue Cotton Straight Kurta Palazzo', 'Blue Cotton Straight Suit Set', 'Blue, Cotton, Straight Kurta, Palazzo, salwar kameez', 12, 25, 'b1.PNG', 'b2.PNG', 'b3.PNG', 2100, 17, '2023-04-12 18:16:24'),
(557, 'Light Peach Printed Cotton Saree', 'Light peach cotton saree white, orange and green prints. ', 'Light Peach, Printed, Cotton, Saree', 12, 29, 'q1.PNG', 'q2.PNG', 'q3.PNG', 2400, 19, '2023-04-12 18:27:05'),
(558, 'Fuchsia Appliqued and Embroidered Silk Saree', 'Fuchsia appliqued silk saree with shades of pink and golden embroidery.', 'Fuchsia, Appliqued, Embroidered, Silk , Saree', 12, 29, 'm1.PNG', 'm2.PNG', 'm3.PNG', 2500, 23, '2023-04-12 18:30:23'),
(559, 'Mint Green Half Silk Jamdani Saree', 'Mint green half silk jamdani saree with green, brown and golden buti', 'Mint, Green, Half Silk, Jamdani, Saree', 12, 29, 'w1.PNG', 'w2.PNG', 'w3.PNG', 2500, 20, '2023-04-12 19:05:27'),
(560, 'Stone Blue Printed and Embroidered Muslin Saree', 'Stone blue printed muslin saree with shades of blue embroidery. Features sequin details.', 'Stone Blue, Printed, Embroidered, Muslin, Saree', 12, 29, 'y1.PNG', 'y2.PNG', 'y3.PNG', 2300, 15, '2023-04-12 19:09:42'),
(561, 'Burgundy Half Silk Jamdani Saree', 'Burgundy half silk jamdani saree with orange and golden buti', 'Burgundy, Half Silk, Jamdani, Saree', 12, 29, 'e1.PNG', 'e2.PNG', 'e3.PNG', 2100, 16, '2023-04-12 19:14:36'),
(562, 'Light Grey Embroidered Cotton Panjabi', 'Light grey cotton panjabi with multicolour erri embroidery', 'Light Grey, Embroidered, Cotton, Panjabi', 11, 28, 'c1.PNG', 'c2.PNG', 'c3.PNG', 1800, 14, '2023-04-12 19:17:41'),
(563, 'White Embroidered Viscose-Cotton Panjabi', 'White textured viscose-cotton slim fit panjabi with multicolour embroidery', 'White, Embroidered, Viscose-Cotton, Slim Fit, Panjabi', 11, 28, 'u1.PNG', 'u2.PNG', 'u3.PNG', 1900, 19, '2023-04-12 19:21:40'),
(564, 'Purple Ombre Dyed and Embroidered Silk Panjabi', 'Purple ombre dyed, printed silk panjabi with black embroidery', 'Purple, Ombre, Dyed, Embroidered, Silk, Panjabi', 11, 28, 'i1.PNG', 'i2.PNG', 'i3.PNG', 1700, 16, '2023-04-12 19:30:47'),
(565, 'Multicolour Printed Joysree Silk Panjabi', 'Multicolour printed joysree silk panjabi', 'Multicolour, Printed, Joysree Silk, Panjabi', 11, 28, 't1.PNG', 't2.PNG', 't3.PNG', 2100, 15, '2023-04-12 19:42:35'),
(566, 'Mens T-Shirt (Yellow Ocean)', 'A Perfect T-Shirt Which Is Ready For All Day And All Night', 'Mens, T-Shirt, Yellow', 11, 26, 'g1.PNG', 'g2.PNG', 'g3.PNG', 800, 14, '2023-04-12 19:47:00'),
(567, 'Mens Casual Shirt (Olive Printed)', 'This Style Of Shirt Is Popular For Its Unique And Eye-Catching Designs', 'Mens, Casual, Shirt, Olive, Printed', 11, 21, 'h1.PNG', 'h2.PNG', 'h3.PNG', 1400, 16, '2023-04-12 20:00:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparels`
--
ALTER TABLE `apparels`
  ADD PRIMARY KEY (`apparel_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user id` (`user id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apparels`
--
ALTER TABLE `apparels`
  MODIFY `apparel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
