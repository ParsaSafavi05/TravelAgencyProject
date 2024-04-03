-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 03:35 PM
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
  `date` date DEFAULT NULL,
  `num_of_adults` int(11) DEFAULT NULL,
  `num_of_children` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

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
(2, 'Kuching', 1);

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
(2, 'Italy', 0),
(3, 'Thailand', 0),
(4, 'Australia', 0);

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
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination_name`, `country_id`, `city_id`, `destination_description`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Malaysia, Mallaca', 1, 1, 'Malaysia is one of the most beautiful countries. Old and spectacular buildings 5star hotels', '../../public/img/package-1.jpg', '2024-03-24 16:23:19', '2024-04-02 13:50:06'),
(2, 'Malaysia, Kuching', 1, 2, 'Kuching is one of the most beautiful cities in Malaysia. Old and spectacular buildings 5star hotels', '../../public/img/package-2.jpg', '2024-03-24 16:23:19', '2024-04-02 13:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_location` varchar(255) NOT NULL,
  `hotel_rating` decimal(3,1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `hotel_location`, `hotel_rating`, `created_at`, `updated_at`) VALUES
(1, 'Ibis', 'Mallaca, Malaysia', 4.0, '2024-03-24 16:34:19', '2024-03-31 17:51:35'),
(2, 'Sheraton', 'Kuching, Malaysia', 4.2, '2024-03-31 17:53:13', '2024-03-31 17:53:13'),
(3, 'Waterfront', 'Kuching, Malaysia', 4.7, '2024-03-31 17:53:13', '2024-04-01 09:43:15'),
(4, 'Imperial', 'Kuching, Malaysia', 4.3, '2024-03-31 17:53:13', '2024-03-31 17:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `packages_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `package_name` varchar(256) NOT NULL,
  `package_description` text DEFAULT NULL,
  `package_price` decimal(20,2) NOT NULL,
  `package_length` int(10) NOT NULL,
  `spots_remaining` int(11) NOT NULL,
  `image_url` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`packages_id`, `destination_id`, `hotel_id`, `package_name`, `package_description`, `package_price`, `package_length`, `spots_remaining`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Malaysia, Mallaca, Ibis hotel', 'Mallaca is a fascinating city of malayssia great for tourists.', 249.99, 3, 28, '', '2024-03-24 16:26:15', '2024-04-02 12:09:40'),
(3, 2, 2, 'Malaysia, Kuching, Sheraton hotel', 'Sheraton Is a great hotel. Pools, best staffs and every kind of food you can imagine\r\n', 149.99, 4, 45, '', '2024-03-31 17:55:36', '2024-04-02 12:09:44'),
(4, 2, 3, 'Malaysia, Kuching, Waterfront hotel', 'Waterfront hotel is one of the most popular hotels. Close to all malls in Kuching and great food.', 225.99, 4, 55, '', '2024-03-31 17:55:36', '2024-04-02 12:09:48'),
(5, 2, 4, 'Malaysia, Kuching, Imperial hotel', 'Imperial hotel, one of the best hotels in kuching with great views and all kinds of services\r\n', 279.99, 5, 12, '', '2024-03-31 17:55:36', '2024-04-02 12:09:52');

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
(11, 'parsasafavi1384@gmail.com', 'Parsa', 'Safavi', '09140348864', NULL, 'fd57c62717f152f68f1b026d6a6ca78c', '2024-03-22 13:11:52', '2024-03-22 15:29:30', 3),
(12, 'parsa@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, '202cb962ac59075b964b07152d234b70', '2024-03-22 13:16:22', '2024-03-22 15:29:35', 3),
(13, 'akbar@gmail.com', 'akbar', 'akbari', '8588591782', NULL, '202cb962ac59075b964b07152d234b70', '2024-03-22 13:29:03', '2024-03-22 15:29:37', 3),
(14, 'mmaravandi@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 13:30:42', '2024-03-22 15:29:39', 3),
(15, 'alitahhhhhhh@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 14:01:47', '2024-03-22 15:29:41', 3),
(16, 'parsa.playstation.acc@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 14:03:10', '2024-03-22 15:29:44', 3),
(17, 'ahmad@yahoo.com', 'ahmad', 'ahmadi', '09138885241', NULL, 'f190ce9ac8445d249747cab7be43f7d5', '2024-03-22 14:04:07', '2024-03-22 15:29:46', 3),
(18, 'heshmat@yahoo.com', 'heshmat', 'gholami', '8588591782', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 14:05:09', '2024-03-22 15:29:48', 3),
(19, 'mehdi@yahoo.com', 'mehdi', 'akbari', '09148333567', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-22 15:28:41', '2024-03-22 15:28:41', 3),
(20, 'parsasafavi@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-23 12:11:20', '2024-03-23 12:11:20', 3),
(21, 'ascasocijaspicjjpi@gmail.com', 'Parsa', 'Safavi', '8588591782', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-31 14:32:39', '2024-03-31 14:32:39', 3);

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
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`packages_id`),
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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `packages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `destinations` (`destination_id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`package_id`) REFERENCES `packages` (`packages_id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

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
