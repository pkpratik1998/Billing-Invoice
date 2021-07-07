-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 01:47 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_order`
--

CREATE TABLE `invoice_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_address` text NOT NULL,
  `order_total_before_tax` decimal(10,2) NOT NULL,
  `order_total_tax` decimal(10,2) NOT NULL,
  `order_tax_per` varchar(250) NOT NULL,
  `order_total_after_tax` double(10,2) NOT NULL,
  `order_amount_paid` decimal(10,2) NOT NULL,
  `order_total_amount_due` decimal(10,2) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_order`
--

INSERT INTO `invoice_order` (`order_id`, `user_id`, `order_date`, `order_receiver_name`, `order_receiver_address`, `order_total_before_tax`, `order_total_tax`, `order_tax_per`, `order_total_after_tax`, `order_amount_paid`, `order_total_amount_due`, `note`) VALUES
(1, 1, '2021-03-17 18:37:55', 'asf', 'dbz fa', '60.00', '3.00', '5', 63.00, '63.00', '-3.00', 'sdgv'),
(2, 1, '2021-03-18 05:55:23', 'sdfgh', '', '46.00', '2.30', '5', 48.30, '4.00', '44.30', ''),
(3, 1, '2021-03-18 06:43:53', 'asdf', '', '75.00', '0.00', '', 0.00, '25.00', '50.00', ''),
(4, 1, '2021-03-18 07:35:07', 'asfdgh', '', '60.00', '0.00', '', 0.00, '30.00', '0.00', ''),
(5, 1, '2021-03-18 08:39:39', ' Pratik', '', '135.00', '0.00', '', 135.00, '30.00', '105.00', ''),
(6, 1, '2021-03-18 09:00:26', 'pat', '', '50.00', '0.00', '', 0.00, '25.00', '25.00', ''),
(7, 1, '2021-03-18 09:17:57', 'dasf', '', '60.00', '0.00', '', 0.00, '10.00', '50.00', ''),
(8, 1, '2021-03-19 08:13:10', 'Pratik', '', '382.00', '0.00', '', 0.00, '25.00', '357.00', ''),
(9, 1, '2021-03-19 08:13:58', 'pratik', '', '96.00', '0.00', '', 0.00, '0.00', '96.00', ''),
(10, 1, '2021-03-21 15:05:08', 'asdfghj', '', '100.00', '0.00', '', 0.00, '10.00', '90.00', ''),
(11, 1, '2021-03-21 15:05:42', 'wsef', '', '48.00', '0.00', '', 0.00, '24.00', '24.00', ''),
(12, 1, '2021-03-21 15:06:41', 'yash', '', '130.00', '0.00', '', 0.00, '25.00', '105.00', ''),
(14, 1, '2021-03-21 15:08:35', 'aaa', '', '50.00', '0.00', '', 0.00, '20.00', '30.00', ''),
(15, 1, '2021-03-21 15:09:36', 'qqq', '', '100.00', '0.00', '', 0.00, '0.00', '100.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_order_item`
--

CREATE TABLE `invoice_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_code` varchar(250) NOT NULL,
  `item_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_order_item`
--

INSERT INTO `invoice_order_item` (`order_item_id`, `order_id`, `item_code`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_final_amount`) VALUES
(2, 2, '2', 'sdfgh', '2.00', '23.00', '46.00'),
(3, 3, '2', 'शर्ट', '3.00', '25.00', '75.00'),
(4, 4, '1', 'शर्ट', '3.00', '20.00', '60.00'),
(5, 5, '1', 'शर्ट', '2.00', '30.00', '60.00'),
(6, 5, '2', 'dfg', '3.00', '25.00', '75.00'),
(7, 6, '1', 'à¤¶à¤°à¥à¤Ÿ', '2.00', '25.00', '50.00'),
(9, 7, '1', 'शर्ट', '2.00', '30.00', '60.00'),
(14, 11, '1', 'ब्लाऊज', '2.00', '24.00', '48.00'),
(22, 15, '1', 'पॅन्ट', '2.00', '50.00', '100.00'),
(23, 1, '1', 'sdf', '2.00', '30.00', '60.00'),
(26, 14, '1', 'शर्ट', '2.00', '25.00', '50.00'),
(29, 10, '1', 'जॅकेट', '2.00', '50.00', '100.00'),
(30, 9, '2', 'शर्ट', '4.00', '24.00', '96.00'),
(31, 12, '1', 'कोट', '2.00', '25.00', '50.00'),
(32, 12, '2', 'पॅन्ट', '4.00', '20.00', '80.00'),
(33, 8, '1', 'शर्ट', '2.00', '36.00', '72.00'),
(34, 8, '2', 'पॅन्ट', '3.00', '20.00', '60.00'),
(35, 8, '3', 'साडी', '5.00', '50.00', '250.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_user`
--

CREATE TABLE `invoice_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_user`
--

INSERT INTO `invoice_user` (`id`, `email`, `password`, `first_name`, `last_name`, `mobile`, `address`) VALUES
(1, 'admin@abc.com', '12345', 'Pratik', 'Korde', 9503575705, 'Pune');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_order`
--
ALTER TABLE `invoice_order`
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `invoice_order_item`
--
ALTER TABLE `invoice_order_item`
  ADD KEY `order_item_id` (`order_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_order`
--
ALTER TABLE `invoice_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoice_order_item`
--
ALTER TABLE `invoice_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
