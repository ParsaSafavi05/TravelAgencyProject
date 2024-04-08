-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 03:52 PM
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
-- Database: `parstravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `num_of_passangers` int(2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(256) NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `package_id`, `date`, `num_of_passangers`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(55, 14, 1, '01/01/2024', 1, 249.99, 'unpaid', '2024-04-06 14:00:46', '2024-04-06 14:00:46'),
(56, 14, 6, '01/01/2024', 14, 2099.86, 'unpaid', '2024-04-06 14:34:05', '2024-04-06 14:34:05'),
(57, 14, 6, '01/01/2024', 4, 599.96, 'unpaid', '2024-04-06 15:25:34', '2024-04-06 15:25:34'),
(58, 20, 6, '01/01/2024', 1, 149.99, 'unpaid', '2024-04-06 15:34:22', '2024-04-06 15:34:22'),
(59, 20, 7, '09/17/2024', 4, 1999.96, 'unpaid', '2024-04-08 11:19:07', '2024-04-08 11:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(256) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `country_id`) VALUES
(1, 'Mallaca', 1),
(2, 'Kuching', 1),
(3, 'Rome', 2),
(4, 'Berlin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `active`) VALUES
(1, 'Malaysia', 1),
(2, 'Italy', 1),
(3, 'Thailand', 0),
(4, 'Australia', 0),
(5, 'Germany', 0),
(6, 'Spain', 0),
(9, 'Canada', 0),
(10, 'United States', 0),
(11, 'Russia', 0),
(12, 'Turkey', 0),
(13, 'China', 0);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL,
  `destination_name` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `destination_description` text DEFAULT NULL,
  `image_url` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination_name`, `country_id`, `city_id`, `destination_description`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Malaysia, Mallaca', 1, 1, 'Malaysia is one of the most beautiful countries. Old and spectacular buildings 5star hotels', '../../public/img/package-1.jpg', '2024-03-24 16:23:19', '2024-04-08 11:22:47'),
(2, 'Malaysia, Kuching', 1, 2, 'Kuching is one of the most beautiful cities in Malaysia. Old and spectacular buildings 5star hotels', '../../public/img/package-2.jpg', '2024-03-24 16:23:19', '2024-04-07 15:25:22'),
(3, 'Italy, Rome', 2, 3, 'Rome is a great city in italy. Also the example hotel is greate', '../../public/img/rome.jpg', '2024-04-06 14:28:19', '2024-04-07 15:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_rating` decimal(3,1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `country_id`, `city_id`, `hotel_name`, `hotel_rating`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Ibis', 4.0, '2024-03-24 16:34:19', '2024-04-07 10:50:13'),
(2, 1, 2, 'Sheraton', 4.2, '2024-03-31 17:53:13', '2024-04-07 10:52:51'),
(3, 1, 2, 'Waterfront', 4.7, '2024-03-31 17:53:13', '2024-04-07 10:52:54'),
(4, 1, 2, 'Imperial', 4.3, '2024-03-31 17:53:13', '2024-04-07 10:52:56'),
(5, 2, 3, 'Palladium Palace', 4.0, '2024-04-06 14:31:15', '2024-04-07 10:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(512) NOT NULL,
  `image_url` varchar(1026) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `image_url`) VALUES
(1, 'package-1.jpg', '../../public/img/package-1.jpg'),
(2, 'package-2.jpg', '../../public/img/package-2.jpg'),
(3, 'rome.jpg', '../../public/img/rome.jpg'),
(5, 'agency.png', '../../public/img/agency.png');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `package_name` varchar(256) NOT NULL,
  `package_description` text DEFAULT NULL,
  `package_price` decimal(20,2) NOT NULL,
  `package_length` int(10) NOT NULL,
  `spots_remaining` int(11) NOT NULL,
  `image_url` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `destination_id`, `hotel_id`, `package_name`, `package_description`, `package_price`, `package_length`, `spots_remaining`, `image_url`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 'Malaysia, Mallaca', 'Mallaca is a fascinating city of malayssia great for tourists.', 249.99, 3, 28, '', '2024-03-24 16:26:15', '2024-04-07 16:21:50', NULL),
(3, 2, 2, 'Malaysia, Kuching , Silver Package', 'Sheraton Is a great hotel. Pools, best staffs and every kind of food you can imagine\r\n', 149.99, 4, 45, '', '2024-03-31 17:55:36', '2024-04-07 13:05:12', NULL),
(4, 2, 3, 'Malaysia, Kuching, Waterfront hotel', 'Waterfront hotel is one of the most popular hotels. Close to all malls in Kuching and great food.', 225.99, 4, 55, '', '2024-03-31 17:55:36', '2024-04-02 12:09:48', NULL),
(5, 2, 4, 'Malaysia, Kuching, Imperial hotel', 'Imperial hotel, one of the best hotels in kuching with great views and all kinds of services\r\n', 279.99, 5, 12, '', '2024-03-31 17:55:36', '2024-04-02 12:09:52', NULL),
(6, 3, 5, 'Rome, Italy, Palladuim Palace', 'Paladiom palace is a great hotel. also has lots of thing like rooms and pools and some things to fill this up.', 149.99, 4, 22, '', '2024-04-06 14:32:46', '2024-04-06 14:32:46', NULL),
(7, 3, 5, 'Rome, Italy, Diamond Package', 'This package is the best package for Italy, Rome, Have the best experience with us.', 499.99, 7, 26, '', '2024-04-07 11:36:28', '2024-04-07 11:36:28', NULL),
(8, 3, 5, 'Rome, Italy, Diamond Package', 'This package is the best package for Italy, Rome, Have the best experience with us.', 499.99, 7, 26, '', '2024-04-07 11:37:42', '2024-04-07 11:37:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `description`) VALUES
(1, 'admin', 'Administrator with full access privileges'),
(2, 'manager', 'Manager with limited access privileges'),
(3, 'user', 'Regular user with basic access privileges');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phonenumber` varchar(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `firstname`, `lastname`, `phonenumber`, `address`, `password`, `created_at`, `updated_at`, `role_id`) VALUES
(11, 'parsasafavi1384@gmail.com', 'Parsa', 'Safavi', '09140348864', '400 W Broadway street xyz\r\n', 'fd57c62717f152f68f1b026d6a6ca78c', '2024-03-22 13:11:52', '2024-04-06 14:52:18', 1),
(12, 'parsa@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, '202cb962ac59075b964b07152d234b70', '2024-03-22 13:16:22', '2024-03-22 15:29:35', 3),
(13, 'akbar@gmail.com', 'akbar', 'akbari', '8588591782', NULL, '202cb962ac59075b964b07152d234b70', '2024-03-22 13:29:03', '2024-03-22 15:29:37', 3),
(14, 'mmaravandi@gmail.com', 'Maryam', 'Maravandi', '09133019529', 'Here In Iran isfahan ', '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 13:30:42', '2024-04-04 18:33:50', 3),
(15, 'alitahhhhhhh@gmail.com', 'Parsa', 'Safavi', '00913311', 'atiha land westworld', '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 14:01:47', '2024-04-08 11:04:48', 3),
(16, 'parsa.playstation.acc@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 14:03:10', '2024-03-22 15:29:44', 3),
(17, 'ahmad@yahoo.com', 'ahmad', 'ahmadi', '09138885241', NULL, 'f190ce9ac8445d249747cab7be43f7d5', '2024-03-22 14:04:07', '2024-03-22 15:29:46', 3),
(18, 'heshmat@yahoo.com', 'heshmat', 'gholami', '8588591782', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 14:05:09', '2024-04-08 11:11:21', 3),
(19, 'mehdi@yahoo.com', 'mehdi', 'akbari', '09148333567', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 15:28:41', '2024-03-22 15:28:41', 3),
(20, 'parsasafavi@gmail.com', 'Parsa', 'Safavi', '8588591782', '400 W Broadway ', '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-23 12:11:20', '2024-04-05 14:22:51', 3),
(21, 'ascasocijaspicjjpi@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-31 14:32:39', '2024-03-31 14:32:39', 3),
(22, 'c@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, 'e034fb6b66aacc1d48f445ddfb08da98', '2024-04-05 11:43:17', '2024-04-05 11:43:17', 3),
(23, 'danielsjd@gmail.com', 'Daniel', 'Willson', '002348492', 'Somewhere in the worlds', '1234', '2024-04-08 09:04:38', '2024-04-08 09:04:38', 3),
(24, 'test@gmail.com', 'tezt', 'asda', '29888842222', NULL, '1234', '2024-04-08 09:05:26', '2024-04-08 09:05:26', 3),
(25, 'acsacasascasca@gmail.com', 'Parsa', 'Safavi', '8588591782', '400 W Broadway', '1111', '2024-04-08 09:15:10', '2024-04-08 09:15:10', 3),
(26, 'rascascasc@gmail.com', 'Parsa', 'Safavi', '8588591782', '400 W Broadway', 'b59c67bf196a4758191e42f76670ceba', '2024-04-08 09:19:50', '2024-04-08 09:20:04', 3),
(27, 'Admin@gmail.com', 'Admin', 'Admin', '11111111111', NULL, 'e3afed0047b08059d0fada10f400c1e5', '2024-04-08 11:12:06', '2024-04-08 11:12:06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `destination_id` (`package_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `hotels_ibfk_1` (`country_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_5` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`),
  ADD CONSTRAINT `destinations_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`),
  ADD CONSTRAINT `hotels_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
