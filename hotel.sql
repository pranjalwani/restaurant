-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 12:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `payment` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(4) NOT NULL DEFAULT 0,
  `choice` text COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_number`, `is_correct`, `choice`) VALUES
(1, 1, 1, ' Coconut oil'),
(2, 1, 0, 'Sunflower Oil\r\n'),
(3, 1, 0, ' Olive Oi'),
(4, 1, 0, ' None of these'),
(5, 2, 0, 'lady’s-finger\r\n'),
(6, 2, 1, ' Brinjal\r\n'),
(7, 2, 0, ' Meetha Kaddu\r\n'),
(8, 2, 0, ' None of these'),
(9, 3, 1, 'Khichdi\r\n'),
(10, 3, 0, 'roti\r\n'),
(11, 3, 0, 'Dal\r\n'),
(12, 3, 0, ' None of these'),
(13, 4, 0, 'Vitamin A\r\n'),
(14, 4, 0, 'Vitamin K1\r\n'),
(15, 4, 0, ' Vitamin B6'),
(16, 4, 1, 'all of above'),
(17, 5, 1, 'Vitamin C\r\n'),
(18, 5, 0, 'Vitamin A\r\n'),
(19, 5, 0, 'Vitamin K\r\n'),
(20, 5, 0, ' None of these'),
(21, 6, 1, 'Wheat\r\n'),
(22, 6, 0, ' Rice\r\n'),
(23, 6, 0, 'None of these');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(600) NOT NULL,
  `subject` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `subject`) VALUES
(1, 'test', 'resr@c.com', 'test', 'test'),
(2, 'test', 'test@gmail.com', 'test', 'test'),
(3, 'Bradula ', 'waniyogini@ymail.com', 'vegan food is very tasty', 'taste'),
(4, 'Pranjal Dipak Wani', 'saurabhwani7676@gmail.com', 'vegan food is tasty', 'taste');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `a`, `b`, `c`, `d`, `e`) VALUES
(1, 6, 2, 3, 5, 1),
(2, 5, 1, 3, 2, 6),
(3, 4, 6, 3, 2, 5),
(4, 4, 2, 1, 3, 5),
(5, 2, 4, 3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cart` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `cart` int(11) NOT NULL,
  `isDiscount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `imgpath` varchar(100) NOT NULL,
  `weight` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `rate`, `category`, `imgpath`, `weight`) VALUES
(1, 'Idli', 30, 1, '1', 0),
(2, 'RAITA IDLI', 30, 1, '2', 0),
(3, 'DAHI IDLI', 40, 1, '3', 0),
(4, 'FRIED IDLI', 40, 1, '4', 0),
(5, 'SADA DOSA', 50, 1, '5', 0),
(6, 'BENNE DOSA', 110, 1, '6', 0),
(7, 'CHEESE DOSA', 110, 1, '7', 0),
(8, 'MAKHANA DOSA', 110, 1, '8', 0),
(9, 'MASALA UTTAPA', 100, 1, '17', 0),
(10, 'COCONUT UTTAPPA', 150, 1, '18', 0),
(11, 'UTTAPA PIZZA', 190, 1, '19', 0),
(12, 'SOUTH INDIAN THALI', 250, 1, '20', 0),
(13, 'PANEER TIKKA', 80, 2, '21', 0),
(14, 'VEG KABAB', 80, 2, '22', 0),
(15, 'PANNER TIKKA MASALA', 100, 2, '23', 0),
(16, 'MAKKAN PARATHA', 40, 2, '24', 0),
(17, 'PARATHA', 30, 2, '25', 0),
(18, 'ALU PARATHA', 50, 2, '26', 0),
(19, 'METHI PARATHA', 50, 2, '27', 0),
(20, 'PANEER KADHAI', 70, 2, '28', 0),
(21, 'CHOLE BHATURE', 160, 2, '37', 0),
(22, 'VEG KOFTA', 160, 2, '38', 0),
(23, 'NAVABI VEG CURRY', 100, 2, '39', 0),
(24, 'PANJABI THALI', 160, 2, '40', 0),
(25, 'JAIN VEG SUBJI', 50, 3, '41', 0),
(26, 'RICE', 40, 3, '42', 0),
(27, 'JIRA RICE', 50, 3, '43', 0),
(28, 'JAIN KHICHDI', 80, 3, '44', 0),
(29, 'PALAK KHICHDI', 80, 3, '45', 0),
(30, 'KHAMAN DHOKLA', 100, 3, '46', 0),
(31, 'DHOKLA', 50, 3, '47', 0),
(32, 'JAIN POHA', 50, 3, '48', 0),
(33, 'JAIN CHEESE SANDWICH', 70, 3, '57', 0),
(34, 'JAIN GRILL SANDWITCH', 80, 3, '58', 0),
(35, 'JAIN MINI THALI', 60, 3, '59', 0),
(36, 'JAIN THALI', 120, 3, '60', 0),
(37, 'VEG SOUP', 60, 4, '61', 0),
(38, 'MUSHROONM SOUP', 70, 4, '62', 0),
(39, 'VEG NOODLE SOUP', 100, 4, '63', 0),
(40, 'TOMATO SOUP', 80, 4, '64', 0),
(41, 'VEG ROLE', 80, 4, '65', 0),
(42, 'PANNER VEG ROLE', 100, 4, '66', 0),
(43, 'VEG MANCHURIAN', 100, 4, '67', 0),
(44, 'CHEESE BALL', 150, 4, '68', 0),
(45, 'VEG SCHEZWAN NOODLES', 140, 4, '77', 0),
(46, 'VEG CHILLI GARLIC NOODLES', 140, 4, '78', 0),
(47, 'GOBI MANCHURIAN', 140, 4, '79', 0),
(48, 'MIX VEG SOUP', 120, 4, '80', 0),
(49, 'VEGAN VEG BALL', 110, 5, '81', 0),
(50, 'VEGAN FOOD SALAD', 100, 5, '82', 0),
(51, 'VEGAN SALAD', 90, 5, '83', 0),
(52, 'TOFU VEG SANDWICH ', 80, 5, '84', 0),
(53, 'VEGAN CHEESE SANDWICH', 120, 5, '85', 0),
(54, 'VEGAN BURGER', 130, 5, '86', 0),
(55, 'VEGAN SANDWICH', 80, 5, '87', 0),
(56, 'VEGAN MASHROOM NOODLES', 110, 5, '88', 0),
(57, 'VEGAN MASHROOM PIZZA', 140, 5, '89', 0),
(58, 'VEGAN TOFU PIZZA ', 180, 5, '90', 0),
(59, 'VEGAN KOFTA', 140, 5, '99', 0),
(60, 'VEGAN THALI', 180, 5, '100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `question` text COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `question`) VALUES
(1, '1.What oil is used for cooking in South India?'),
(2, '2.Which is the national vegetable of India?'),
(3, '3. Which is the national food of India?'),
(4, '4. Which Vitamins are rich in Carrots?'),
(5, '5. Strawberry is good source of which vitamin?'),
(6, '6. Lectin protein is found in __________.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Addr` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `Addr`, `password`) VALUES
(1, 'test', 'test@gmail.com', '221, Chandan Nagar, Powai Road, Vikharoli WEST', '$2y$10$RWyAuHyzm2P3DhYUccaxMuGU8aJeLyBaDsd46n2FeHPRJj/TD6xYq'),
(2, 'Pranjal Dipak Wani', 'pranjalwani1121@gmail.com', 'Yashwant Nagar,Jalgaon', '$2y$10$hmZ8BFWYhzkSMaCxrWRMe.rx9RYgIEMzO1RruOSEjGoMrq3b2wtu2'),
(3, 'bradula shetty', 'saurabhwani7676@gmail.com', 'Yashwant Nagar,Jalgaon', '$2y$10$6aThG2K.zpF37a2an1m3e.BNhYXl.uT9xIXCIOksPf573A0dDQQna'),
(4, 'Divya Patil', 'div@gmail.com', 'Yashwant Nagar,Jalgaon', '$2y$10$Qs1olJt2RN2o73XC680DhuKWDZ.lf7u.2qZpD/w2DtjLht20gOJUu'),
(5, 'pranjal wani', 'dimple@gmail.com', 'ghjgjg', '$2y$10$RTWaYVOkTk3cVDybL1Fxgem97WBhgw9OQim4dBH4liYRFsplDX.Im'),
(6, 'saurabh wani', 'sau123@gmail.com', 'ahskjhsakj', '$2y$10$Y9Q9HNnVQK7fdu7OjDa0hu7kQH/vd.Kc9wE/Q0eFxb9s3Kx4dMN0i'),
(7, 'Test', 'aaa@gmail.co', 'aaadas', '$2y$10$4HaveY7zSp4ukKfbpACbZu7auvZ0vI.Msmj6zgJGEETGgC6sEv5Xi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
