-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 12:40 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, '59mm'),
(2, '61mm'),
(3, '65mm');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `description`, `img_path`, `category_id`) VALUES
(13, '59 mm MTRT chrome bore', '3000.00', 'sadkjflkasjdlkfjlsdkajf', '../assets/images/uploads/5c310925016593.04215936.jpg', 1),
(14, '61 mm MTRT chrome bore', '4000.00', 'sadfsadfsadfsdf', '../assets/images/uploads/5c310b84e80733.41843953.jpg', 2),
(15, '65 mm MTRT chrome bore', '5000.00', 'asdaSDASD', '../assets/images/uploads/5c310bc8ba1529.80918244.jpg', 3),
(16, 'product123', '3000.00', 'sdfsdfsdf', '../assets/images/uploads/5c332984220095.75590402.jpg', 1),
(17, 'product1234', '4000.00', 'asdfsdfsdfsdf', '../assets/images/uploads/5c3329a3e920d6.01597645.jpg', 2),
(18, 'product878', '5000.00', 'sadfasdfdsf', '../assets/images/uploads/5c3329c7cce3a8.99712562.jpg', 3),
(19, 'product000', '3000.00', 'aasdasd', '../assets/images/uploads/5c332c0c558757.29543035.jpg', 3),
(20, 'product000', '3000.00', 'wdflsk;lskdf;lk', '../assets/images/uploads/5c332c706316e8.04607806.jpg', 2),
(21, 'product999', '4000.00', 'aslkdjaklsjdlk', '../assets/images/uploads/5c332cb7c55998.55486420.jpg', 2),
(22, 'product777', '5000.00', 'asdlnaslknd', '../assets/images/uploads/5c332cd0e1d195.89519531.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_users`
--

CREATE TABLE `tbl_admin_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_users`
--

INSERT INTO `tbl_admin_users` (`id`, `firstname`, `lastname`, `admin_email`, `password`) VALUES
(1, 'pol', 'villa', 'pol@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(2, 'cath', 'umali', 'cathumali@gmail.com', '0dbf8b2008ef92e2f612dcda15702382baff4485');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `paypal_trac_code` varchar(255) NOT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `shippingAddress` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `payment_mode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `users_id`, `transaction_code`, `paypal_trac_code`, `purchase_date`, `shippingAddress`, `status_id`, `payment_mode_id`) VALUES
(46, 68, '5v2S0I9ckyHVbtULEY', '', '0000-00-00 00:00:00', 'lalalalal', 1, 1),
(47, 68, 'S8pPt7lW69Esu1GayJ', '', '0000-00-00 00:00:00', 'lalalalal', 1, 2),
(48, 68, 'O9wnd3q7mGNY1Cjio5', '', '0000-00-00 00:00:00', 'lalalalal', 1, 2),
(49, NULL, '', 'PAY-7S2639511B050703WLQYDFDY', '2019-01-05 12:52:39', '', NULL, NULL),
(50, 68, 'CnesI7uMmgP9RHViTc', '', '0000-00-00 00:00:00', 'lalalalal', 1, 2),
(51, NULL, '', 'PAY-4GR41322ET8707348LQYDSEI', '2019-01-05 13:29:05', '', NULL, NULL),
(52, 68, 'p8XHLSuet30oa2iRDd', '', '0000-00-00 00:00:00', 'lalalalal', 1, 1),
(53, NULL, '', '', '2019-01-05 13:29:24', '', NULL, NULL),
(54, 68, 'awNctZOYSlLMvnXE4g', '', '0000-00-00 00:00:00', 'lalalalal', 1, 1),
(55, 68, 'jkAXqCMVLuBogD3dbY', '', '0000-00-00 00:00:00', 'lalalalal', 1, 1),
(56, 68, '4QeY7rRATONagULZD3', '', '0000-00-00 00:00:00', 'lalalalal', 1, 2),
(57, NULL, '', 'PAY-0HK82980087150317LQYGKAI', '2019-01-05 16:04:45', '', NULL, NULL),
(58, 68, 'TZI2uWp3y0GLto7M4x', '', '0000-00-00 00:00:00', 'lalalalal', 1, 2),
(59, NULL, '', '', '2019-01-05 16:13:23', '', NULL, NULL),
(60, 68, 'ui0YjLorcwbNfEOpGn', '', '0000-00-00 00:00:00', 'lalalalal', 1, 1),
(61, 63, 'SxjryYhKvasHzbQ3kC', '', '0000-00-00 00:00:00', 'asdasd', 1, 1),
(62, 63, 'L3NhYKF1kdCHxnrUSM', '', '0000-00-00 00:00:00', 'asdasd', 1, 2),
(63, NULL, '', '', '2019-01-07 06:01:41', '', NULL, NULL),
(64, 63, 'F1o0v3fEdplGSCxcOH', '', '0000-00-00 00:00:00', 'asdasd', 1, 2),
(65, NULL, '', '', '2019-01-07 06:06:02', '', NULL, NULL),
(66, NULL, '', 'PAY-79E71254SX369891YLQZHXTA', '2019-01-07 06:07:04', '', NULL, NULL),
(67, 63, 'MgYLA9wdkhKGcyQfBl', '', '0000-00-00 00:00:00', 'asdasd', 1, 2),
(68, NULL, '', '', '2019-01-07 06:28:20', '', NULL, NULL),
(69, 63, 'z6Wy14RMesaic89ZUx', '', '0000-00-00 00:00:00', 'asdasd', 1, 2),
(70, NULL, '', '', '2019-01-07 06:32:33', '', NULL, NULL),
(71, 63, 'ldxfSvNOKLZkrPDz7T', '', '0000-00-00 00:00:00', 'asdasd', 1, 2),
(72, 63, 'I61OlyFitvo4jPfAuR', '', '0000-00-00 00:00:00', 'asdasd', 1, 2),
(73, 63, 'PDG2eOJUSMvtqWCkai', '', '0000-00-00 00:00:00', 'asdasd', 1, 2),
(74, 63, 'BbjsH1EL0xr9gNl5A3', '', '0000-00-00 00:00:00', 'asdasd', 1, 2),
(75, 63, 'AfaKukvCUGNO4on5hx', '', '0000-00-00 00:00:00', 'asdasd', 1, 1),
(76, 63, 'yBFhgPcEntMze67093', '', '0000-00-00 00:00:00', 'asdasd', 1, 1),
(78, 63, '0KlOe3krBXu7xYUFof', '', '0000-00-00 00:00:00', 'asdasd', 1, 1),
(79, 63, 'hyqAnaB6CEb9m0GFkV', '', '0000-00-00 00:00:00', 'asdasd', 1, 2),
(82, 63, 'uQW1RpOyVM9sckiPxn', '', 'January7, 2019, 18:31', 'asdasd', 1, 1),
(83, 63, 'ANZ3tpM49v2ebExGWr', '', 'January7, 2019, 18:33', 'asdasd', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) DEFAULT NULL,
  `items_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `orders_id`, `items_id`, `quantity`, `price`) VALUES
(5, NULL, NULL, 1, '850.00'),
(6, NULL, NULL, 1, '600.00'),
(7, NULL, NULL, 22, '13200.00'),
(8, NULL, NULL, 1, '600.00'),
(9, NULL, NULL, 1, '600.00'),
(10, NULL, NULL, 1, '542.80'),
(11, NULL, NULL, 6, '3600.00'),
(12, NULL, NULL, 5, '4250.00'),
(13, NULL, NULL, 4, '1825.20'),
(14, NULL, NULL, 4, '2400.00'),
(15, NULL, NULL, 4, '2400.00'),
(16, NULL, NULL, 2, '912.60'),
(17, NULL, NULL, 5, '4250.00'),
(18, NULL, NULL, 4, '1825.20'),
(19, NULL, NULL, 12, '5475.60'),
(20, NULL, NULL, 5, '61725.00'),
(21, NULL, NULL, 5, '61725.00'),
(22, NULL, NULL, 5, '61725.00'),
(23, NULL, NULL, 5, '61725.00'),
(24, NULL, NULL, 5, '61725.00'),
(25, NULL, NULL, 5, '61725.00'),
(26, NULL, NULL, 5, '61725.00'),
(27, NULL, NULL, 5, '4250.00'),
(28, NULL, NULL, 4, '3400.00'),
(29, NULL, NULL, 1, '456.30'),
(30, NULL, NULL, 1, '600.00'),
(31, NULL, NULL, 4, '2400.00'),
(32, NULL, NULL, 1, '850.00'),
(33, NULL, NULL, 1, '456.30'),
(34, NULL, NULL, 1, '600.00'),
(35, NULL, NULL, 1, '600.00'),
(36, NULL, NULL, 1, '456.30'),
(37, NULL, NULL, 1, '600.00'),
(38, 47, NULL, 1, '600.00'),
(39, 48, NULL, 1, '850.00'),
(40, 50, NULL, 1, '600.00'),
(41, 56, NULL, 1, '600.00'),
(42, 56, NULL, 1, '456.30'),
(43, 56, NULL, 1, '850.00'),
(44, 58, NULL, 1, '600.00'),
(45, 62, 14, 1, '4000.00'),
(46, 62, 13, 3, '9000.00'),
(47, 62, NULL, 3, '1800.00'),
(48, 64, 14, 1, '4000.00'),
(49, 64, 13, 1, '3000.00'),
(50, 67, 14, 1, '4000.00'),
(51, 69, 14, 1, '4000.00'),
(52, 71, 13, 1, '3000.00'),
(53, 72, 14, 1, '4000.00'),
(54, 73, 13, 1, '3000.00'),
(55, 74, 13, 1, '3000.00'),
(56, 79, 14, 1, '4000.00'),
(60, 83, 15, 1, '5000.00'),
(61, 83, 14, 1, '4000.00'),
(62, 83, 13, 1, '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_mode`
--

CREATE TABLE `tbl_payment_mode` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_mode`
--

INSERT INTO `tbl_payment_mode` (`id`, `name`) VALUES
(1, 'COD'),
(2, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `lastname`, `firstname`, `email`, `password`, `address`) VALUES
(25, '0', '', '', 'da39a3ee', ''),
(27, 'pol', '302f2bbd2b20b3ee9a803617721078582d39f1cb', 'jiankharl@gmail.com', 'lalalal', 'askdaksjdlkj'),
(28, 'villa', '9959c10cadf3b51950519e7ceb2e302a2b76b4be', 'flippinskip@gmail.com', 'lololo', 'sdkfsdkfjkj'),
(36, 'pol', 'adasd', 'jianasda@gmail', '1150c7d5', 'asdlkasjdklj'),
(37, 'pol', 'kharlo', 'polpol@gmail.com', 'fe3e185e', 'sdfhkajh'),
(44, 'pol', 'pol', 'loplopl@gmail.com', '85136c79', 'asdasd'),
(59, 'asdkajsd', 'askdnaksjdnjkn', 'asdk@dfsf', 'a8fb294e', 'sadasjdlas'),
(62, 'pol', 'aasdasd', 'asdasd@sdfsdf', '1112450f', 'asdasd'),
(63, 'villa', 'jiankharl', 'dog@gmail.com', '123456', 'asdasd'),
(64, 'villa', 'jiankharl', 'polkharlo@gmail.com', '84552', 'anywhere'),
(65, 'kharlo', 'pol', 'kharlo@gmail.com', '5d112aba', 'jan lang'),
(66, 'Umali', 'Catherine', 'cathzilla@cath.com', '7c4a8d09', 'jan lang'),
(67, 'umali', 'cath', 'cath@gmail.com', '0dbf8b20', 'jan lang'),
(68, 'pol', 'villa', 'pol.kharlo.villa@gmail.com', '0dbf8b20', 'lalalalal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_fk0` (`category_id`);

--
-- Indexes for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `payment_mode_id` (`payment_mode_id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `items_id` (`items_id`);

--
-- Indexes for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`payment_mode_id`) REFERENCES `tbl_payment_mode` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD CONSTRAINT `tbl_order_items_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `tbl_orders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_items_ibfk_2` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
