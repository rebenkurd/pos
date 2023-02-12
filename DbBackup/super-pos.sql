-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 12:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super-pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `updated_by` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `status`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(24, 'brand1', 'brand desc', 0, 'rebin', '', '2023-01-20 21:23:07', '0000-00-00 00:00:00'),
(25, 'brand2', 'brand desc', 1, 'rebin', 'rebin', '2023-01-20 21:23:10', '2023-01-20 21:23:39'),
(36, 'formula', '', 0, 'rebin', '', '2023-01-25 17:53:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 actived\r\n1 deactived',
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(134, 'پاکەرەوەی دەم و ددان', '', 0, 'rebin', '', '2023-02-02 19:00:04', '0000-00-00 00:00:00'),
(135, 'گازاو', '', 0, 'rebin', '', '2023-02-02 19:00:14', '0000-00-00 00:00:00'),
(136, 'affffdfgfd', '', 0, 'rebin', '', '2023-02-04 21:29:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gst` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `website` varchar(255) NOT NULL,
  `upi_id` varchar(100) NOT NULL,
  `upi_code` varchar(255) NOT NULL,
  `bank` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `name`, `mobile`, `email`, `phone`, `gst`, `vat`, `pan`, `website`, `upi_id`, `upi_code`, `bank`, `country`, `state`, `city`, `postcode`, `address`, `logo`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'company name', '13234655477', 'm@m', 'phone', 'gst', 'vat', 'pan', 'https://pos.creatantech.com', 'upi', '3.PNG', 'bank', 'coiuntry', 'state', 'city', 'postcode', 'address', 'Capture.PNG', '', 'rebin', '2023-01-30 20:45:58', '2023-01-31 18:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `customs`
--

CREATE TABLE `customs` (
  `id` int(11) NOT NULL,
  `barcode` bigint(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `tax_type` varchar(100) DEFAULT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `profit_margin` decimal(10,2) DEFAULT NULL,
  `sales_price` decimal(10,2) DEFAULT NULL,
  `final_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `brand` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `mf_date` date NOT NULL,
  `ex_date` date NOT NULL,
  `debt` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = no\r\n1= yes',
  `discount` int(11) DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` varchar(255) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customs`
--

INSERT INTO `customs` (`id`, `barcode`, `name`, `category`, `price`, `tax`, `tax_type`, `purchase_price`, `profit_margin`, `sales_price`, `final_price`, `quantity`, `unit`, `brand`, `image`, `description`, `mf_date`, `ex_date`, `debt`, `discount`, `discount_type`, `status`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'فڵچەی ددان', 135, '5000.00', '5', 'exclusive', '5250.00', '5.00', '5512.50', '5788.13', 188, 'دانە', 36, NULL, '', '0000-00-00', '0000-00-00', 1, 0, '', 0, 'rebin', '', '2023-02-02 19:10:35', '0000-00-00 00:00:00'),
(6, 2, 'کەلوپەل g', 135, '5000.00', '5', 'exclusive', '5250.00', '5.00', '5512.50', '5788.13', 198, 'دانە', 36, NULL, '', '0000-00-00', '0000-00-00', 1, 0, '', 0, 'rebin', '', '2023-02-02 19:10:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `custom_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_amount` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `tax_amount` decimal(10,0) NOT NULL,
  `unit_cost` decimal(10,0) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `purchase_code` varchar(255) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `custom_id`, `name`, `price`, `discount`, `discount_amount`, `quantity`, `tax`, `tax_amount`, `unit_cost`, `total_price`, `purchase_code`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(214, 6, 'کەلوپەل g', '5000', 0, '0', 6, 5, '1500', '5250', '31500', 'PR00001', 'rebin', 'rebin', '2023-02-07 12:24:28', '2023-02-07 12:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `pay_amount` decimal(10,2) DEFAULT NULL,
  `pay_type` varchar(100) DEFAULT NULL,
  `pay_note` text DEFAULT NULL,
  `purchase_code` varchar(255) NOT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `purchase_code` varchar(255) NOT NULL,
  `other_charges` decimal(10,2) DEFAULT NULL,
  `total_quantity` int(100) DEFAULT NULL,
  `discount_all` decimal(10,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `tax_amount` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `ref_num` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `return_status` varchar(100) NOT NULL,
  `return_date` date NOT NULL,
  `due` double(10,2) NOT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_code`, `other_charges`, `total_quantity`, `discount_all`, `discount`, `tax`, `tax_amount`, `grand_total`, `ref_num`, `note`, `status`, `purchase_date`, `supplier`, `return_status`, `return_date`, `due`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(31, 'PR00001', '0.00', 6, '0.00', 10, 5, '90.00', '31500.00', 0, '', 'received', '2023-02-24', 4, 'return', '2023-02-07', 0.00, 'rebin', 'rebin', '2023-02-07 12:24:28', '2023-02-07 12:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, 'admin', '2023-01-13 22:46:56', '2023-01-13 22:46:59'),
(1, 'super admin', '2023-01-13 22:47:21', '2023-01-13 22:47:24'),
(2, 'cashier', '2023-01-13 22:47:40', '2023-01-13 22:47:43'),
(3, 'data entry', '2023-01-13 22:48:55', '2023-01-13 22:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gst` int(11) DEFAULT NULL,
  `tax` int(11) NOT NULL,
  `open_balance` decimal(10,2) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile`, `email`, `gst`, `tax`, `open_balance`, `country`, `state`, `city`, `postcode`, `address`, `status`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Ali Muhamad', '9492135765', '', 12354, 0, '0.00', 'usa', 'usa', 'Newport Beach', 92659, '', 0, 'rebin', '', '2023-02-02 15:17:35', '0000-00-00 00:00:00'),
(7, 'Aland Kawa', '4576443', '', 554, 0, '345.00', 'usa', 'iraq', 'Suli', 92659, '', 0, 'rebin', '', '2023-02-02 15:21:14', '0000-00-00 00:00:00'),
(8, 'Kobin Rafiq', '9492135765', '', 12354, 0, '1243.00', 'usa', 'usa', 'Newport Beach', 92659, '', 0, 'rebin', 'rebin', '2023-02-02 15:21:41', '2023-02-02 15:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(60) NOT NULL,
  `l_name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `bio` text NOT NULL,
  `phone1` varchar(60) NOT NULL,
  `phone2` varchar(60) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `password`, `address`, `bio`, `phone1`, `phone2`, `image`, `added_by`, `updated_by`, `role`, `created_at`, `updated_at`) VALUES
(78, 'gashbin', '', 're@ed', '698d51a19d8a121ce581499d7b701668', '', '', '9492135765', '', 'undraw_Winners_re_wr1l.png', 'rebin', '', 2, '2023-01-24 17:23:12', '0000-00-00 00:00:00'),
(79, 'dfert', '', 're@ed', 'c6f057b86584942e415435ffb1fa93d4', '', '', '9492135765', '', 'Untitled (940 × 788 px)g.jpg', 'rebin', '', 1, '2023-01-24 17:44:06', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customs`
--
ALTER TABLE `customs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `brand` (`brand`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom` (`custom_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase` (`purchase_code`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_code` (`purchase_code`),
  ADD KEY `supplier` (`supplier`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customs`
--
ALTER TABLE `customs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customs`
--
ALTER TABLE `customs`
  ADD CONSTRAINT `brand` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `custom` FOREIGN KEY (`custom_id`) REFERENCES `customs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `purchase` FOREIGN KEY (`purchase_code`) REFERENCES `purchases` (`purchase_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `supplier` FOREIGN KEY (`supplier`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
