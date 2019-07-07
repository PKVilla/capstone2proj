-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 09:08 AM
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
(1, 'Product 1', '600.00', 'lorem ipsum is simply dummy text of printing a...', 'https://via.placeholder.com/350x250', 1),
(2, 'Product 2', '850.00', 'lorem ipsum is simply dummy text of printing a...', 'https://via.placeholder.com/350x250', 1),
(3, 'Product 3', '456.30', 'lorem ipsum is simply dummy text of printing a...', 'https://via.placeholder.com/350x250', 2),
(4, 'Product 4', '897.90', 'lorem ipsum is simply dummy text of printing a...', 'https://via.placeholder.com/350x250', 2),
(5, 'Product 5', '542.80', 'lorem ipsum is simply dummy text of printing a...', 'https://via.placeholder.com/350x250', 3),
(6, 'Product 6', '227.90', 'lorem ipsum is simply dummy text of printing a...', 'https://via.placeholder.com/350x250', 3),
(9, 'product101', '12345.00', 'kjashdfkjhsdakfh', '../assets/images/uploads/5c24c74441af93.35062206.png', 3),
(10, 'new product', '321654987.00', 'nothing to describe', '../assets/images/uploads/5c29c18f3de1c0.39430290.png', 2),
(11, 'new product', '12345.00', 'wala lang', '../assets/images/uploads/5c2c98e61a9fb9.96674729.png', 3);

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
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shippingAddress` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `payment_mode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `users_id`, `transaction_code`, `purchase_date`, `shippingAddress`, `status_id`, `payment_mode_id`) VALUES
(29, 63, 'O0VrIAgKTtRcpfjxUo', '0000-00-00 00:00:00', 'asdasd', 1, 1),
(30, 63, 'YOzTDunwH4WJLSyIRg', '0000-00-00 00:00:00', 'asdasd', 1, 1),
(31, 63, 'sWI5fzk1JqRHBYUEVA', '0000-00-00 00:00:00', 'asdasd', 1, 1),
(32, 68, 'qls0ThVAbOL7HGf3xU', '0000-00-00 00:00:00', 'lalalalal', 1, 1),
(33, 68, 'gJ4j3TKD8IkU6yaoQF', '0000-00-00 00:00:00', 'test address', 1, 1),
(34, 68, 'DvZyQtKLPH2F9O3TJl', '0000-00-00 00:00:00', 'lalalalal', 1, 1),
(35, 63, '85GZP0gKtTDj4kaEH2', '0000-00-00 00:00:00', 'asdasd', 1, 1),
(36, 63, 'QMaVU7D5yCneW9qIzc', '0000-00-00 00:00:00', 'asdasd', 1, 1),
(37, 68, 'HqUwv7uftD1Op5daMT', '0000-00-00 00:00:00', 'lalalalal', 1, 1);

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
(5, NULL, 2, 1, '850.00'),
(6, NULL, 1, 1, '600.00'),
(7, NULL, 1, 22, '13200.00'),
(8, NULL, 1, 1, '600.00'),
(9, NULL, 1, 1, '600.00'),
(10, NULL, 5, 1, '542.80'),
(11, NULL, 1, 6, '3600.00'),
(12, NULL, 2, 5, '4250.00'),
(13, NULL, 3, 4, '1825.20'),
(14, NULL, 1, 4, '2400.00'),
(15, NULL, 1, 4, '2400.00'),
(16, NULL, 3, 2, '912.60'),
(17, NULL, 2, 5, '4250.00'),
(18, NULL, 3, 4, '1825.20'),
(19, NULL, 3, 12, '5475.60'),
(20, NULL, 9, 5, '61725.00'),
(21, NULL, 9, 5, '61725.00'),
(22, NULL, 9, 5, '61725.00'),
(23, NULL, 9, 5, '61725.00'),
(24, 29, 9, 5, '61725.00'),
(25, 30, 9, 5, '61725.00'),
(26, 31, 9, 5, '61725.00'),
(27, 32, 2, 5, '4250.00'),
(28, 33, 2, 4, '3400.00'),
(29, 34, 3, 1, '456.30'),
(30, 35, 1, 1, '600.00'),
(31, 36, 1, 4, '2400.00'),
(32, 37, 2, 1, '850.00'),
(33, 37, 3, 1, '456.30'),
(34, 37, 1, 1, '600.00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
