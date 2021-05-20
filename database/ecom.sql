-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 04:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'small chair', 1),
(2, 'SOFA', 1),
(3, 'comfortable chairs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(4, 'Md Ashequr Rahman', 'tysonfarib@gmail.com', '01375745', 'BRO I HAVE  A ORDER FOR YOU.plz contact', '2021-04-17 01:11:23'),
(5, 'Md Ashequr Rahman', 'arfcamp.net', '01375745', 'nyc items', '2021-04-17 01:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(40) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(1, 4, 'khilgaon', 'dhaka', 1213, 'cod', 250, 'cash on delivery', 2, '2021-05-19 04:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`, `added_on`) VALUES
(1, 1, 1, 1, 250, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'shipped'),
(4, 'canceled'),
(5, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(1, 3, 'boss chair', 300, 250, 5, '587_883_119845920_2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida, nunc vitae consequat eleifend, augue urna bibendum felis, at volutpat elit magna eu sem. Duis in aliquam arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare dolor id orci mattis, vitae laoreet enim euismod. Mauris fringilla vitae augue sed interdum. Morbi posuere et lacus at imperdiet. Nulla pharetra est eget elit ultricies consequat.', 'Sed in egestas nunc. Morbi condimentum iaculis odio et ullamcorper. Proin est turpis, sagittis id imperdiet a, tempus ut orci. Duis sem enim, tempus eu aliquet ut, suscipit ut mi. Cras eget quam in odio imperdiet pretium. Donec dictum neque eu lectus venenatis tempor. Aliquam sed ex sed justo suscipit porttitor in eleifend ipsum.\r\n\r\nVivamus tincidunt, nibh at sodales tincidunt, risus nunc auctor ligula, aliquet ultrices lectus felis ac magna. Etiam id consequat quam. Praesent molestie tincidunt urna ac suscipit. Suspendisse magna diam, laoreet sit amet ornare bibendum, facilisis non metus. Ut luctus non felis at efficitur. Nullam placerat enim nec volutpat vulputate. Nunc vel dui imperdiet, suscipit dolor non, efficitur enim. Phasellus pretium, sapien vel fermentum mollis, justo ante sollicitudin est, pretium aliquet dui ipsum nec massa.', 'fssfssf', 'sfsfs', 'sfsfs', 1),
(2, 1, 'excersice tool', 343, 250, 5, '684_513_578369140_1 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida, nunc vitae consequat eleifend, augue urna bibendum felis, at volutpat elit magna eu sem. Duis in aliquam arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare dolor id orci mattis, vitae laoreet enim euismod. Mauris fringilla vitae augue sed interdum. Morbi posuere et lacus at imperdiet. Nulla pharetra est eget elit ultricies consequat.', 'Sed in egestas nunc. Morbi condimentum iaculis odio et ullamcorper. Proin est turpis, sagittis id imperdiet a, tempus ut orci. Duis sem enim, tempus eu aliquet ut, suscipit ut mi. Cras eget quam in odio imperdiet pretium. Donec dictum neque eu lectus venenatis tempor. Aliquam sed ex sed justo suscipit porttitor in eleifend ipsum.\r\n\r\nVivamus tincidunt, nibh at sodales tincidunt, risus nunc auctor ligula, aliquet ultrices lectus felis ac magna. Etiam id consequat quam. Praesent molestie tincidunt urna ac suscipit. Suspendisse magna diam, laoreet sit amet ornare bibendum, facilisis non metus. Ut luctus non felis at efficitur. Nullam placerat enim nec volutpat vulputate. Nunc vel dui imperdiet, suscipit dolor non, efficitur enim. Phasellus pretium, sapien vel fermentum mollis, justo ante sollicitudin est, pretium aliquet dui ipsum nec massa.', 'dfdsfd', 'fdfdfd', 'dfdf', 1),
(3, 2, 'sofa21212', 1212, 1000, 23, '975_218_287733289_3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida, nunc vitae consequat eleifend, augue urna bibendum felis, at volutpat elit magna eu sem. Duis in aliquam arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare dolor id orci mattis, vitae laoreet enim euismod. Mauris fringilla vitae augue sed interdum. Morbi posuere et lacus at imperdiet. Nulla pharetra est eget elit ultricies consequat.\r\n\r\nSed in egestas nunc. Morbi condimentum iaculis odio et ullamcorper. Proin est turpis, sagittis id imperdiet a, tempus ut orci. Duis sem enim, tempus eu aliquet ut, suscipit ut mi. Cras eget quam in odio imperdiet pretium. Donec dictum neque eu lectus venenatis tempor. Aliquam sed ex sed justo suscipit porttitor in eleifend ipsum.', 'Vivamus tincidunt, nibh at sodales tincidunt, risus nunc auctor ligula, aliquet ultrices lectus felis ac magna. Etiam id consequat quam. Praesent molestie tincidunt urna ac suscipit. Suspendisse magna diam, laoreet sit amet ornare bibendum, facilisis non metus. Ut luctus non felis at efficitur. Nullam placerat enim nec volutpat vulputate. Nunc vel dui imperdiet, suscipit dolor non, efficitur enim. Phasellus pretium, sapien vel fermentum mollis, justo ante sollicitudin est, pretium aliquet dui ipsum nec massa.\r\n\r\nAenean non tellus ut diam pulvinar volutpat. Nullam viverra, urna sit amet pharetra commodo, nulla dui viverra erat, vitae efficitur libero nisl vel lectus. Sed congue sit amet magna in pharetra. Donec tempus lacus non rhoncus fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sodales vitae augue vitae venenatis. In hac habitasse platea dictumst. Praesent dapibus sollicitudin nibh. Integer aliquet rutrum lectus, nec ultricies metus convallis sit amet. Proin volutpat ornare consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi eros libero, venenatis vitae pellentesque eget, auctor a diam. Proin pharetra non nisi ut faucibus. Fusce ut ligula pellentesque, eleifend nisi eu, mattis massa.', 'asdasa', 'asasa', 'asa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(4, 'Md Ashequr Rahman', '123', 'tysonfarib@gmail.com', '01198636586', '2021-04-18 01:46:13'),
(5, 'Md Ashequr Rahman', '123', 'arfcamp.net', '0137574556575', '2021-04-21 05:13:43'),
(6, 'excersice tool', '123', 'fgtfgfg', '0101010', '2021-04-21 05:17:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
