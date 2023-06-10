-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2023 at 06:19 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20882236_dietwhisperer`
--

-- --------------------------------------------------------

--
-- Table structure for table `dieticians`
--

CREATE TABLE `dieticians` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `gender` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dieticians`
--

INSERT INTO `dieticians` (`id`, `name`, `surname`, `password`, `gender`, `email`) VALUES
(3, 'Ayşe', 'YENER', '12345', 'female', 'ayseyener@gmail.com'),
(4, 'Mehmet', 'ATA', '12345', 'male', 'mehmetata@gmail.com'),
(5, 'Zeynep ', 'BARAN', '12345', 'female', 'zeynepbaran@gmail.com'),
(6, 'Deniz ', 'ÇOBAN', '12345', 'male', 'denizcoban@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dietplanslist`
--

CREATE TABLE `dietplanslist` (
  `id` int(11) NOT NULL,
  `meals` longtext NOT NULL,
  `notes` longtext DEFAULT NULL,
  `start_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `foods` longtext NOT NULL,
  `foods_quantities` longtext NOT NULL,
  `end_date` date DEFAULT NULL,
  `dietician_id` int(11) DEFAULT NULL,
  `calori_values` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dietplanslist`
--

INSERT INTO `dietplanslist` (`id`, `meals`, `notes`, `start_date`, `user_id`, `foods`, `foods_quantities`, `end_date`, `dietician_id`, `calori_values`) VALUES
(13, 'Kahvaltı: Yulaf ezmesi, meyve, süt\nÖğle Yemeği: Izgara tavuk, sebzeler, pirinç\nAkşam Yemeği: Balık, salata, tam buğday ekmeği\n', NULL, '2023-06-09', 1000, 'Kahvaltı: Yulaf ezmesi, meyve, süt\nÖğle Yemeği: Izgara tavuk, sebzeler, pirinç\nAkşam Yemeği: Balık, salata, tam buğday ekmeği\n', 'Kahvaltı: Yulaf ezmesi, meyve, süt\nÖğle Yemeği: Izgara tavuk, sebzeler, pirinç\nAkşam Yemeği: Balık, salata, tam buğday ekmeği\n', NULL, 4, 'Kahvaltı: Yulaf ezmesi, meyve, süt\nÖğle Yemeği: Izgara tavuk, sebzeler, pirinç\nAkşam Yemeği: Balık, salata, tam buğday ekmeği\n'),
(15, 'Kahvaltı: Yulaf ezmesi, meyve, süt\nÖğle Yemeği: Izgara tavuk, sebzeler, pirinç\nAkşam Yemeği: Balık, salata, tam buğday ekmeği\n', 'diyetinize sadık kalınız', '2023-06-09', 1001, 'Kahvaltı: Yulaf ezmesi, meyve, süt\nÖğle Yemeği: Izgara tavuk, sebzeler, pirinç\nAkşam Yemeği: Balık, salata, tam buğday ekmeği\n', 'Kahvaltı: Yulaf ezmesi, meyve, süt\nÖğle Yemeği: Izgara tavuk, sebzeler, pirinç\nAkşam Yemeği: Balık, salata, tam buğday ekmeği\n', NULL, 3, 'Kahvaltı: Yulaf ezmesi, meyve, süt\nÖğle Yemeği: Izgara tavuk, sebzeler, pirinç\nAkşam Yemeği: Balık, salata, tam buğday ekmeği\n');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `preparation_time` int(11) NOT NULL,
  `recipe_own_id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `how_its_made` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `contents` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `password` int(11) NOT NULL,
  `weight` float DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `height` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `weight`, `age`, `gender`, `height`) VALUES
(1000, 'Zuhal', 'Özdemir', 'zuhal@gmail.com', 12345, NULL, NULL, 'female', NULL),
(1001, 'Derya', 'Öztürk', 'deryaozturk@gmail.com', 12345, NULL, NULL, 'female', NULL),
(1004, 'Derya ', 'Öztürk', 'deryaozturk@gmail.com', 12345, NULL, NULL, 'female', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dieticians`
--
ALTER TABLE `dieticians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietplanslist`
--
ALTER TABLE `dietplanslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
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
-- AUTO_INCREMENT for table `dieticians`
--
ALTER TABLE `dieticians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dietplanslist`
--
ALTER TABLE `dietplanslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
