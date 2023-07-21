-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 09:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `properties`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('admin', 'samireshal'),
('admin', 'samireshal'),
('Sammitha', 'Sammitha@123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'resort'),
(2, 'land'),
(3, 'Flat');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_amount`) VALUES
(100029700),
(100029700),
(100029700),
(100029700),
(101330010),
(101330010),
(101330010),
(101330010),
(129910),
(100129910),
(100129910),
(29700),
(29700),
(101229800),
(54657699),
(54657699),
(54657699),
(10),
(10),
(10),
(10),
(10),
(0),
(7000000),
(22000000),
(22000000),
(22000000),
(7000000),
(7000000),
(0),
(0);

-- --------------------------------------------------------

--
-- Table structure for table `popular`
--

CREATE TABLE `popular` (
  `popular_id` int(11) NOT NULL,
  `popular_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `popular`
--

INSERT INTO `popular` (`popular_id`, `popular_title`) VALUES
(1, 'Delhi'),
(2, 'mumbai'),
(3, 'Karnataka'),
(4, 'bangalor');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(11) NOT NULL,
  `property_title` varchar(100) NOT NULL,
  `property_description` varchar(300) NOT NULL,
  `property_keywords` varchar(300) NOT NULL,
  `category_id` int(11) NOT NULL,
  `popular_id` int(11) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `property_image1` varchar(300) NOT NULL,
  `property_image2` varchar(300) NOT NULL,
  `property_image3` varchar(300) NOT NULL,
  `property_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `property_title`, `property_description`, `property_keywords`, `category_id`, `popular_id`, `phone_number`, `property_image1`, `property_image2`, `property_image3`, `property_price`, `date`, `status`) VALUES
(8, 'Lotus Resort', 'Whether you seek romance, adventure, or simply a blissful retreat, our resort beckons you to create treasured memories that will linger for a lifetime. Welcome to a world where fantasy meets reality, and luxury embraces you in its warm embrace. Experience pure enchantment at our resort and leave wit', 'resort,dining,luxury', 1, 2, 938427848, '380569812.jpg', '380569830.jpg', 'images (1).jpg', '15000000', '2023-07-21 18:51:49', 'true'),
(9, 'SeaBird Resort', 'Awaken your senses in our elegantly designed accommodations, each thoughtfully curated to offer comfort and luxury beyond imagination. Gaze upon breathtaking sunsets from your private balcony, or surrender to the gentle lull of waves in our beachfront villas.', 'beach,sunset', 1, 4, 2901934839, 'bdf77b3e.webp', 'images (2).jpg', 'images (3).jpg', '7000000', '2023-07-21 18:57:32', 'true'),
(10, 'land', 'Spanning acres of unspoiled beauty, this serene sanctuary offers endless possibilities. Imagine waking up to the gentle rustling of leaves and the melodious songs of birds. ', 'nice good', 2, 1, 8249728677, '5320011_1656917129_3303.jpeg', '5320011_1656917129_3303.jpeg', 'images (5).jpg', '1000000', '2023-07-21 19:46:26', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `property_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`property_id`, `ip_address`) VALUES
(2, '::1'),
(4, '::1'),
(8, '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `popular`
--
ALTER TABLE `popular`
  ADD PRIMARY KEY (`popular_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `popular`
--
ALTER TABLE `popular`
  MODIFY `popular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
