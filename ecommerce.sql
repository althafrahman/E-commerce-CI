-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2020 at 01:50 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_checkout` int(11) NOT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `cus_id`, `quantity`, `is_checkout`, `updateddate`) VALUES
(4, 2, 1, 7, 1, '2020-08-21 12:41:45'),
(5, 3, 1, 1, 1, '2020-08-21 12:41:47'),
(6, 4, 1, 5, 1, '2020-08-21 12:41:48'),
(11, 3, 1, 1, 1, '2020-08-21 14:44:45'),
(12, 1, 1, 1, 1, '2020-08-21 14:47:03'),
(13, 1, 1, 3, 1, '2020-08-21 14:59:41'),
(14, 2, 1, 1, 1, '2020-08-21 15:07:33'),
(15, 3, 1, 1, 1, '2020-08-21 15:07:34'),
(16, 4, 1, 1, 1, '2020-08-21 15:07:36'),
(17, 6, 1, 1, 1, '2020-08-21 15:07:39'),
(19, 1, 1, 1, 0, '2020-08-21 19:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `updateddate`) VALUES
(1, 'Clothing', 'https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60', '2020-08-21 09:36:28'),
(2, 'Footwears', 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60', '2020-08-21 09:43:28'),
(3, 'Bags', 'https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60', '2020-08-21 09:43:28'),
(4, 'Watches', 'https://images.unsplash.com/photo-1533139502658-0198f920d8e8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60', '2020-08-21 09:43:28'),
(5, 'Towels', 'https://images.unsplash.com/photo-1596748176765-08b3a6c9969a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60', '2020-08-21 09:43:28'),
(6, 'Laptops', 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60', '2020-08-21 09:43:28'),
(7, 'Phones', 'https://images.unsplash.com/photo-1578345218746-50a229b3d0f8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60', '2020-08-21 09:43:28'),
(8, 'Beauty', 'https://images.unsplash.com/photo-1512207724313-a4e675ec79ab?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60', '2020-08-21 09:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `descriptions` text NOT NULL,
  `item_cat` int(11) NOT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `descriptions`, `item_cat`, `updateddate`, `image`) VALUES
(1, 'Shirts', '255', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', 1, '2020-08-21 09:29:46', 'https://guesseu.scene7.com/is/image/GuessEU/M63H24W7JF0-L302-ALTGHOST?wid=1500&fmt=jpeg&qlt=80&op_sharpen=0&op_usm=1.0,1.0,5,0&iccEmbed=0'),
(2, 'Sneakerx1', '655', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', 2, '2020-08-21 09:34:31', 'https://guesseu.scene7.com/is/image/GuessEU/FLGLO4FAL12-BEIBR?wid=700&amp;fmt=jpeg&amp;qlt=80&amp;op_sharpen=0&amp;op_usm=1.0,1.0,5,0&amp;iccEmbed=0'),
(3, 'Hand Bag', '235', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', 3, '2020-08-21 09:34:31', 'https://guesseu.scene7.com/is/image/GuessEU/HWVG6216060-TAN?wid=700&amp;fmt=jpeg&amp;qlt=80&amp;op_sharpen=0&amp;op_usm=1.0,1.0,5,0&amp;iccEmbed=0'),
(4, 'Watches', '544', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', 4, '2020-08-21 09:34:31', 'http://guesseu.scene7.com/is/image/GuessEU/WC0001FMSWC-G5?wid=520&fmt=jpeg&qlt=80&op_sharpen=0&op_usm=1.0,1.0,5,0&iccEmbed=0'),
(5, 'Mens Towel', '110', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', 5, '2020-08-21 09:34:31', 'https://guesseu.scene7.com/is/image/GuessEU/AW6308VIS03-SAP?wid=700&amp;fmt=jpeg&amp;qlt=80&amp;op_sharpen=0&amp;op_usm=1.0,1.0,5,0&amp;iccEmbed=0'),
(6, 'Laptop', '12255', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', 6, '2020-08-21 09:34:31', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-sRLk1GO8X78of5wGc2uEI8yOBpZEiA4WN4JfPgr1a9B0hecp61JkVKamSPAIvg9iArgjLd8&usqp=CAc'),
(7, 'Mobiles', '7877', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', 7, '2020-08-21 09:34:31', 'https://rukminim1.flixcart.com/image/416/416/k1fbmvk0/mobile/4/f/f/mi-redmi-8-mzb8251in-original-imafhyacmxaefxgw.jpeg?q=70'),
(8, 'Fair & Handsm', '55', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', 8, '2020-08-21 09:34:32', 'https://rukminim1.flixcart.com/image/612/612/jlmmdu80/face-wash/v/q/z/100-him-pimple-clear-neem-face-wash-100-ml-himalaya-original-imaf8pz6hgxgthwf.jpeg?q=70');

-- --------------------------------------------------------

--
-- Table structure for table `order_main`
--

CREATE TABLE `order_main` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_main`
--

INSERT INTO `order_main` (`id`, `status`, `order_id`, `cus_id`, `total`, `updateddate`) VALUES
(1, 0, 'T3OB8d', 1, '765', '2020-08-21 15:00:03'),
(2, 0, '3ZQcpI', 1, '13689', '2020-08-21 15:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_sub`
--

CREATE TABLE `order_sub` (
  `id` int(11) NOT NULL,
  `main_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `uprice` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_sub`
--

INSERT INTO `order_sub` (`id`, `main_id`, `item_id`, `quantity`, `uprice`, `total`, `updateddate`) VALUES
(1, 1, 1, 3, '255', '765', '2020-08-21 15:00:03'),
(2, 2, 2, 1, '655', '655', '2020-08-21 15:07:46'),
(3, 2, 3, 1, '235', '235', '2020-08-21 15:07:46'),
(4, 2, 4, 1, '544', '544', '2020-08-21 15:07:46'),
(5, 2, 6, 1, '12255', '12255', '2020-08-21 15:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` enum('admin','customer') NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `updateddated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `phone`, `password`, `address`, `updateddated`) VALUES
(1, 'customer', 'Cus1', 'cus@gmail.com', 777777777, '123456', 'sdds sd ds fsd', '2020-08-21 16:08:23'),
(2, 'admin', 'Admin', 'admin@gmail.com', 111111, '123456', 'sdfsdfsdf df s', '2020-08-21 16:09:20'),
(3, 'customer', 'cus2', 'saemeerasalim@gmail.com', 7012492250, '123456', 'dfsdfsd', '2020-08-21 17:04:59'),
(4, 'customer', 'cus3', 'saemrasalim@gmail.com', 7012492250, '123456', 'dfdfgdfsd', '2020-08-21 17:05:12'),
(5, 'customer', 'cus4', 'smrasddalim@gmail.com', 7012492250, '123456', 'dfdfgdfsd', '2020-08-21 17:06:42'),
(6, 'customer', 'cus5', 'saemrassalim@gmail.com', 7012492250, '123456', 'dfdfgdfsd', '2020-08-21 17:06:42'),
(7, 'customer', 'cus6', 'saemrasasdalim@gmail.com', 7012492250, '123456', 'dfdfgdfsd', '2020-08-21 17:06:42'),
(8, 'customer', 'cus7', 'saemrasalim@gmail.com', 7012492250, '123456', 'dfdfgdfsd', '2020-08-21 17:06:42'),
(9, 'customer', 'cus8', 'saemrasalim@gmail.com', 7012492250, '123456', 'dfdfgdfsd', '2020-08-21 17:06:42'),
(10, 'customer', 'cus9', 'saemrasaasdlewim@gmail.com', 7012492250, '123456', 'dfdfgdfsd', '2020-08-21 17:06:42'),
(11, 'customer', 'cus10', 'saemrassdalim@gmail.com', 7012492250, '123456', 'dfdfgdfsd', '2020-08-21 17:06:42'),
(12, 'customer', 'cus11', 'saemrasalim@gmail.com', 7012492250, '123456', 'dfdfgdfsd', '2020-08-21 17:07:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_main`
--
ALTER TABLE `order_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_sub`
--
ALTER TABLE `order_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order_main`
--
ALTER TABLE `order_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_sub`
--
ALTER TABLE `order_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
