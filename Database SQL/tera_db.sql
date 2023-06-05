-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 09:49 PM
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
-- Database: `tera_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `full_name`, `email`, `address`, `city`, `state`, `zip_code`) VALUES
(91, 17, 'Randy Ngubo', 'RandyNgubo@gmail.com', '1 Bunting Road', 'Auckland Park', 'Gauteng', '2092');

-- --------------------------------------------------------

--
-- Table structure for table `card_sessions`
--

CREATE TABLE `card_sessions` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `card_holder_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `expiration_month` varchar(50) DEFAULT NULL,
  `expiration_year` int(11) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_sessions`
--

INSERT INTO `card_sessions` (`session_id`, `user_id`, `card_holder_name`, `card_number`, `expiration_month`, `expiration_year`, `cvv`) VALUES
(91, 17, 'R NGUBO', '2345678901234321', 'May', 2031, '154');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `delivery_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_products` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`delivery_id`, `user_id`, `total_products`, `price`, `address`, `city`, `state`, `zip_code`, `order_id`) VALUES
(41, 17, 'Vacate illusion(1),The Walk and Kick(1),Cream Paper Dress(1),Summer Feels Jacket(1),Tear Drops Earings(2)', 3350.00, '1 Bunting Road', 'Auckland Park', 'Gauteng', '2092', 45);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `surname`, `email`, `total_products`, `total_price`) VALUES
(45, 17, 'Randy', 'Ngubo', 'RandyNgubo@gmail.com', 'Vacate illusion(1),The Walk and Kick(1),Cream Paper Dress(1),Summer Feels Jacket(1),Tear Drops Earings(2)', '3350');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(29, 'SunRise', '500', 'SteveJohnson-art.jpg'),
(30, 'Jewel', '400', 'jewellery5.jpg'),
(31, 'The Walk and Kick', '2000', 'LiamThomas-art.jpg'),
(32, 'Cream Wool Jersey', '700', 'MensCreamJacket-fashion.jpg'),
(33, 'Brett Seyles', '2500', 'BrettSeyles-art.jpg'),
(34, 'Millitary Jacket', '1500', 'MensJacket-fashion.jpg'),
(35, 'Expressions', '250', 'DSCF2458-art.jpeg'),
(36, 'Homage', '150', 'ClaireEssaram-art.jpg'),
(37, 'Abadala', '600', 'DSCF9693-art.jpeg'),
(38, 'Umazali', '600', 'DSCF9705-art.jpeg'),
(39, 'Vacate illusion', '400', 'artBackground1.jpg'),
(40, 'Color Happy Shirt', '150', 'colorBlockShirt-fashion.jpg'),
(41, 'Puffed Vest', '100', 'FADA_2022_Top-fashion.jpg'),
(42, 'Cream Paper Dress', '400', 'FADA_2022_CreamPaperDress-fashion.jpg'),
(43, 'Mens Green Suit', '400', 'MensSuitGreen-fashion.jpg'),
(44, 'Black Unisex Dangaree', '200', 'FADA_2022_dangaree-fashion.jpg'),
(45, 'Vibrant Pant', '300', 'colorJumpPants-fashion.jpg'),
(46, 'Summer Feels Jacket', '350', 'summerFeelsJacket-fashion.jpg'),
(47, 'Pieces Earings', '100', 'jewellery1.jpg'),
(48, 'Tear Drops Earings', '100', 'jewellery3.jpg'),
(50, 'Pearl drops earings', '250', 'jewellery12.jpg'),
(51, 'Antique ring', '650', 'jewellery-design-and-manufacture-student-highlights-2017-5-1024x683.jpg'),
(52, 'Necklace Changeables', '327', 'jewellery-design-and-manufacture-student-highlights-2022-3-1024x697.jpg'),
(53, 'Geometric neck piece', '1255', 'jewellery16.jpg'),
(54, 'Masani a Tsweni', '675', 'jewellery-design-and-manufacture-student-highlights-2022-6-200x200.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `registered_at` date NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `Id_number` varchar(20) NOT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `Bio` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `contact_no`, `registered_at`, `username`, `age`, `Id_number`, `gender`, `Bio`, `profile_picture`) VALUES
(6, 'Edson', 'Madzinga', 'edson@scammer.co.za', '$2y$10$09hjkv7onDrgA7LKj47XL.Emk97FtuWoOudfUgsy7LLaikPitjb9W', '1234567890', '2023-05-21', 'Edson1234', 11, '02147483647', 'Female', '11111111', NULL),
(7, 'Thato Andrew', 'LETSEPE', 'letsepethatoandrew@gmail.com', '$2y$10$BM4w4HU88CNaM9jAUGo.XuxKPgh.MFEJR9xxORc0v27UZGi8GZ1Eu', '2760856773', '2023-06-01', 'Andy', 25, '0212045065082', 'Other', 'I love you', '647cc08415ada_IMG-20191124-WA0004.jpg'),
(12, 'Karabo', 'Moloka', 'karaboM@gmail.com', '$2y$10$e8JCFksdspSMX4djJrkuyOyyWwT7pw9T3.dfgp1T8O7vNx1REnYCC', '608567730', '2023-06-01', 'KaraboM', 27, '1234567890123', 'Female', 'Lady with vibe', '64788c9cd0831_me.png'),
(15, 'Kuthemba', 'Saya', 'kutembaM@gmail.com', '$2y$10$DxLJD8cT3aZG6AESxuvdmuSFLGQDA.M8Pl08h/1yt9h3fpBuVS/wG', '745321234', '2023-06-03', 'QT', 21, '122223345678', 'Female', 'Curious ', '647b4af85f5fe_IMG-20200502-WA0059.jpg'),
(16, 'Sandra', 'Letlaka', 'Sanra@Focus1.co.za', '$2y$10$RrRB9ukcmeCjgcB16vv0xOMhsexIe/05Yr7OzXVWKg6EFg9Wg77xy', '608567730', '2023-06-04', 'MaSandros', 19, '2147483647222', 'Female', 'Groovist', '647cc25430212_userpic.jpg'),
(17, 'Randy', 'Ngubo', 'RandyNgubo@gmail.com', '$2y$10$Tj7/cJMVtxLgTAWkjwlLIuexfDf7xjmkgNWtiH6HLQbxpK4uay2m.', '717853754', '2023-06-05', 'Nowinile', 23, '0012045065083', 'Female', 'Extraordinary', '647e3523abb22_profileimage0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `card_sessions`
--
ALTER TABLE `card_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `card_sessions`
--
ALTER TABLE `card_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `card_sessions`
--
ALTER TABLE `card_sessions`
  ADD CONSTRAINT `card_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
