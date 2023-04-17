-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 03:32 AM
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
(35, 2, 2000, 969547423, 1, '2023-04-12 21:57:43', 'Complete'),
(36, 2, 8200, 899016725, 5, '2023-04-12 22:45:50', 'Complete'),
(37, 1, 8300, 1158436592, 4, '2023-04-12 23:57:06', 'pending'),
(38, 1, 8300, 1637601278, 4, '2023-04-13 00:00:27', 'pending'),
(39, 1, 3900, 1813894615, 2, '2023-04-13 00:03:21', 'Complete'),
(40, 1, 3900, 1576060037, 2, '2023-04-13 00:04:19', 'Complete'),
(41, 1, 2400, 1874047440, 1, '2023-04-13 00:09:32', 'Complete'),
(42, 1, 0, 1120511047, 0, '2023-04-13 00:10:40', 'Complete'),
(43, 1, 10000, 74608422, 1, '2023-04-13 00:11:46', 'Complete'),
(44, 1, 0, 2021138937, 0, '2023-04-13 00:12:36', 'Complete'),
(45, 1, 0, 1055776473, 0, '2023-04-13 00:13:02', 'Complete'),
(46, 1, 5099, 1549931094, 3, '2023-04-13 00:14:09', 'Complete'),
(47, 1, 0, 1388634829, 0, '2023-04-13 00:14:22', 'Complete'),
(48, 1, 1800, 136081023, 1, '2023-04-13 00:14:46', 'Complete'),
(49, 1, 2500, 40516780, 1, '2023-04-13 00:16:17', 'Complete'),
(50, 1, 1800, 294134656, 1, '2023-04-13 00:20:44', 'Complete'),
(51, 1, 0, 1505751874, 0, '2023-04-13 00:22:20', 'Complete'),
(52, 1, 2500, 136515709, 1, '2023-04-13 00:23:16', 'Complete'),
(53, 1, 0, 286351268, 0, '2023-04-13 00:23:18', 'Complete'),
(54, 1, 0, 574754975, 0, '2023-04-13 00:23:19', 'Complete'),
(55, 1, 0, 278552923, 0, '2023-04-13 00:23:20', 'Complete'),
(56, 1, 0, 1760985328, 0, '2023-04-13 00:23:21', 'Complete'),
(57, 1, 0, 1830720113, 0, '2023-04-13 00:23:24', 'Complete'),
(58, 1, 0, 916300512, 0, '2023-04-13 00:23:55', 'Complete'),
(59, 1, 0, 701006878, 0, '2023-04-13 00:23:56', 'Complete'),
(60, 1, 0, 1733799827, 0, '2023-04-13 00:24:03', 'Complete'),
(61, 1, 0, 1506593499, 0, '2023-04-13 00:24:04', 'Complete'),
(62, 1, 10000, 2029370204, 1, '2023-04-13 00:26:34', 'Complete'),
(63, 1, 0, 1229927305, 0, '2023-04-13 00:26:36', 'Complete'),
(64, 1, 0, 716589212, 0, '2023-04-13 00:26:37', 'Complete'),
(65, 1, 0, 294542934, 0, '2023-04-13 00:26:38', 'Complete'),
(66, 1, 0, 641063822, 0, '2023-04-13 00:26:39', 'Complete'),
(67, 1, 0, 690811457, 0, '2023-04-13 00:27:14', 'Complete'),
(68, 1, 0, 614581721, 0, '2023-04-13 00:27:21', 'Complete'),
(69, 1, 2100, 644760546, 1, '2023-04-13 00:31:57', 'Complete'),
(70, 1, 2100, 1465916195, 0, '2023-04-13 00:33:26', 'Complete'),
(71, 1, 10000, 1598529543, 1, '2023-04-13 00:34:59', 'Complete'),
(72, 1, 10000, 976543083, 0, '2023-04-13 00:35:55', 'Complete'),
(73, 1, 1800, 585296700, 1, '2023-04-13 00:37:08', 'Complete'),
(74, 1, 1800, 1224012201, 0, '2023-04-13 00:38:41', 'Complete'),
(75, 1, 2000, 682585930, 1, '2023-04-13 00:39:30', 'Complete'),
(76, 1, 3700, 1328845066, 2, '2023-04-13 00:43:31', 'Complete'),
(77, 1, 2000, 2079634841, 1, '2023-04-13 00:43:47', 'Complete'),
(78, 1, 12100, 407793387, 2, '2023-04-13 00:50:38', 'Complete'),
(79, 1, 0, 941377710, 0, '2023-04-13 00:53:33', 'pending'),
(80, 1, 800, 400655919, 1, '2023-04-13 00:54:14', 'Complete');

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
(1, 2, 969547423, 552, 1, 'pending'),
(2, 2, 899016725, 566, 1, 'pending'),
(3, 1, 1813894615, 555, 1, 'Complete'),
(4, 1, 1576060037, 555, 1, 'Complete'),
(5, 1, 1874047440, 557, 1, 'Complete'),
(6, 1, 1120511047, 0, 1, 'Complete'),
(7, 1, 74608422, 1, 1, 'Complete'),
(8, 1, 2021138937, 0, 1, 'Complete'),
(9, 1, 1055776473, 0, 1, 'Complete'),
(10, 1, 1549931094, 562, 1, 'Complete'),
(11, 1, 1388634829, 0, 1, 'Complete'),
(12, 1, 136081023, 562, 1, 'Complete'),
(13, 1, 40516780, 559, 1, 'Complete'),
(14, 1, 294134656, 562, 1, 'Complete'),
(15, 1, 1505751874, 0, 1, 'Complete'),
(16, 1, 136515709, 559, 1, 'Complete'),
(17, 1, 286351268, 0, 1, 'Complete'),
(18, 1, 574754975, 0, 1, 'Complete'),
(19, 1, 278552923, 0, 1, 'Complete'),
(20, 1, 1760985328, 0, 1, 'Complete'),
(21, 1, 1830720113, 0, 1, 'Complete'),
(22, 1, 916300512, 0, 1, 'Complete'),
(23, 1, 701006878, 0, 1, 'Complete'),
(24, 1, 1733799827, 0, 1, 'Complete'),
(25, 1, 1506593499, 0, 1, 'Complete'),
(26, 1, 2029370204, 1, 1, 'Complete'),
(27, 1, 1229927305, 0, 1, 'Complete'),
(28, 1, 716589212, 0, 1, 'Complete'),
(29, 1, 294542934, 0, 1, 'Complete'),
(30, 1, 641063822, 0, 1, 'Complete'),
(31, 1, 690811457, 0, 1, 'Complete'),
(32, 1, 614581721, 0, 1, 'Complete'),
(33, 1, 644760546, 561, 1, 'Complete'),
(34, 1, 1465916195, 0, 1, 'Complete'),
(35, 1, 1598529543, 1, 1, 'Complete'),
(36, 1, 976543083, 0, 1, 'Complete'),
(37, 1, 585296700, 562, 1, 'Complete'),
(38, 1, 1224012201, 0, 1, 'Complete'),
(39, 1, 682585930, 552, 1, 'Complete'),
(40, 1, 1328845066, 563, 1, 'Complete'),
(41, 1, 2079634841, 552, 1, 'Complete'),
(42, 1, 407793387, 565, 1, 'Complete'),
(43, 1, 941377710, 0, 1, 'pending'),
(44, 1, 400655919, 566, 1, 'Complete');

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
(25, 35, 969547423, 2000, 'Paypal', '2023-04-12 21:57:43'),
(26, 36, 899016725, 8200, 'Paypal', '2023-04-12 22:45:50'),
(27, 50, 294134656, 1800, 'BKASH-BKash', '2023-04-13 00:20:44'),
(28, 51, 1505751874, 0, 'BKASH-BKash', '2023-04-13 00:22:20'),
(29, 52, 136515709, 2500, 'BKASH-BKash', '2023-04-13 00:23:16'),
(30, 53, 286351268, 0, '', '2023-04-13 00:23:18'),
(31, 54, 574754975, 0, '', '2023-04-13 00:23:19'),
(32, 55, 278552923, 0, '', '2023-04-13 00:23:20'),
(33, 56, 1760985328, 0, '', '2023-04-13 00:23:21'),
(34, 57, 1830720113, 0, '', '2023-04-13 00:23:24'),
(35, 58, 916300512, 0, '', '2023-04-13 00:23:55'),
(36, 59, 701006878, 0, '', '2023-04-13 00:23:56'),
(37, 60, 1733799827, 0, 'BKASH-BKash', '2023-04-13 00:24:03'),
(38, 61, 1506593499, 0, '', '2023-04-13 00:24:04'),
(39, 62, 2029370204, 10000, 'BKASH-BKash', '2023-04-13 00:26:34'),
(40, 63, 1229927305, 0, '', '2023-04-13 00:26:36'),
(41, 64, 716589212, 0, '', '2023-04-13 00:26:37'),
(42, 65, 294542934, 0, '', '2023-04-13 00:26:38'),
(43, 66, 641063822, 0, '', '2023-04-13 00:26:39'),
(44, 67, 690811457, 0, '', '2023-04-13 00:27:14'),
(45, 68, 614581721, 0, 'BKASH-BKash', '2023-04-13 00:27:21'),
(46, 69, 644760546, 2100, 'BKASH-BKash', '2023-04-13 00:31:57'),
(47, 70, 1465916195, 2100, 'BKASH-BKash', '2023-04-13 00:33:26'),
(48, 71, 1598529543, 10000, 'BKASH-BKash', '2023-04-13 00:34:59'),
(49, 72, 976543083, 10000, 'BKASH-BKash', '2023-04-13 00:35:55'),
(50, 73, 585296700, 1800, 'BKASH-BKash', '2023-04-13 00:37:08'),
(51, 74, 1224012201, 1800, 'BKASH-BKash', '2023-04-13 00:38:41'),
(52, 75, 682585930, 2000, 'BKASH-BKash', '2023-04-13 00:39:30'),
(53, 76, 1328845066, 3700, 'BKASH-BKash', '2023-04-13 00:43:31'),
(54, 77, 2079634841, 2000, 'DBBLMOBILEB-Dbbl Mobile Banking', '2023-04-13 00:43:47'),
(55, 78, 407793387, 12100, 'BKASH-BKash', '2023-04-13 00:50:38'),
(56, 80, 400655919, 800, 'BKASH-BKash', '2023-04-13 00:54:14');

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
