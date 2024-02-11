-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 05:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darek`
--

-- --------------------------------------------------------

--
-- Table structure for table `favoriteproperty`
--

CREATE TABLE `favoriteproperty` (
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favoriteproperty`
--

INSERT INTO `favoriteproperty` (`user_id`, `property_id`) VALUES
(1, 1),
(1, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` enum('Available','Not Available') NOT NULL,
  `price` int(11) NOT NULL,
  `property_type` enum('House','Apartment','Villa','Other') NOT NULL,
  `payment_type` enum('Rent per day','Rent per month','Rent per week','Sale') NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `city`, `location`, `status`, `price`, `property_type`, `payment_type`, `user_id`) VALUES
(1, 'Al Hoceima', '14 bario haddou', 'Available', 2000, 'House', 'Rent per month', 1),
(2, 'Tetouan', '10 lamhancech', 'Not Available', 1500, 'Apartment', 'Rent per week', 2),
(3, 'Tangier', '120 bni makada', 'Available', 2000000, 'Villa', 'Sale', 3),
(4, 'Tetouan', '12 Sania El Raml', 'Available', 150, 'Apartment', 'Rent per day', 4),
(5, 'Al Hoceima', '14 bario sidiabid', 'Available', 2500, 'House', 'Rent per month', 1);

-- --------------------------------------------------------

--
-- Table structure for table `propertyimages`
--

CREATE TABLE `propertyimages` (
  `image_id` int(11) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propertyimages`
--

INSERT INTO `propertyimages` (`image_id`, `property_id`, `image_link`) VALUES
(1, 1, 'https://www.thehousedesigners.com/images/plans/01/HWD/bulk/7526/optimized-001-11_m.webp'),
(2, 1, 'https://www.dfdhouseplans.com/blog/wp-content/uploads/2020/03/007-1.jpg'),
(3, 2, 'https://i.pinimg.com/736x/33/94/7b/33947b3c9269cb8da553535f032dcda5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `propertystar`
--

CREATE TABLE `propertystar` (
  `p_star_id` int(11) NOT NULL,
  `pub_id` int(11) NOT NULL,
  `num_stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `publisher` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `publisher`) VALUES
(1, 'Mohamed', 'Akkouh', 'mohamed@gmail.com', 'mohamed_akkouh', 'mohamed1999', 1),
(2, 'Diyae Eddin', 'Ghazi', 'diyae@gmail.com', 'diyae_ghazi', 'diyae2004', 0),
(3, 'Ayoube', 'Razaq', 'ayoube@gmail.com', 'ayoube_razaq', 'ayoube1999', 0),
(4, 'Zaid', 'Elhadifi', 'zaid@gmail.com', 'zaid_elhadifi', 'zaid2004', 0),
(12, 'bahae', 'ghazi', 'GHAZI@GHAZI.com', 'bahae_2', '@Bahae2004@', 0),
(13, 'diaye', 'ghazi', 'ghazi@gmail.com', 'didi', '@Diyae200412', 0),
(14, 'diyae2', 'ghazi2', 'didi@ghazi.com', 'didi2', '@Diyae200412', 0),
(17, 'Diyae eddine', 'GHAZI', 'diyae@hotmail.ma', 'didi99', '@Diyae200412', 0),
(18, 'ilyass', 'ait baali', 'ilyass@gmail', 'ilyass', '@Diyae200412', 0),
(19, 'ayoub', 'razaq', 'ayoub@razaq', 'ayoub_razaq12', '@apubAAA112345678bkc jhwfv 9TeATsydui!)+7asDFBGJ<XB', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favoriteproperty`
--
ALTER TABLE `favoriteproperty`
  ADD PRIMARY KEY (`user_id`,`property_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `propertyimages`
--
ALTER TABLE `propertyimages`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `propertyimages`
--
ALTER TABLE `propertyimages`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favoriteproperty`
--
ALTER TABLE `favoriteproperty`
  ADD CONSTRAINT `favoriteproperty_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favoriteproperty_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `propertyimages`
--
ALTER TABLE `propertyimages`
  ADD CONSTRAINT `propertyimages_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
