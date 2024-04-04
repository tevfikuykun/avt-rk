-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3310
-- Generation Time: Apr 04, 2024 at 08:07 AM
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
-- Database: `avturk`
--

-- --------------------------------------------------------

--
-- Table structure for table `dersler`
--

CREATE TABLE `dersler` (
  `id` int(11) NOT NULL,
  `ders` varchar(20) NOT NULL,
  `dönem` int(1) NOT NULL,
  `kredi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dersler`
--

INSERT INTO `dersler` (`id`, `ders`, `dönem`, `kredi`) VALUES
(1, 'Matematik 101', 1, 6),
(2, 'Fizik 101', 1, 5),
(3, 'Müzik 101', 1, 2),
(4, 'Coğrafya 101', 1, 3),
(5, 'Tarih 101', 1, 3),
(6, 'Matematik 102', 2, 6),
(7, 'Fizik 102', 2, 5),
(8, 'Müzik 102', 2, 2),
(9, 'Coğrafya 102', 2, 3),
(10, 'Tarih 102', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `student_no` int(4) NOT NULL,
  `ders` varchar(20) NOT NULL,
  `dönem` int(1) NOT NULL,
  `note` int(3) NOT NULL,
  `kredi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `student_no`, `ders`, `dönem`, `note`, `kredi`) VALUES
(1, 1024, 'Müzik 101', 1, 96, 3),
(2, 1024, 'Matematik 101', 1, 82, 6),
(3, 1024, 'Fizik 101', 1, 67, 5),
(29, 1024, 'Coğrafya 101', 1, 68, 3),
(30, 1024, 'Tarih 101', 1, 79, 3),
(46, 4567, 'Coğrafya 102', 2, 98, 3),
(47, 5663, 'Fizik 102', 2, 62, 5),
(48, 3524, 'Tarih 102', 2, 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_no` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_no`, `name`, `surname`) VALUES
(1, 1024, 'Selin', 'Hünkar'),
(11, 3524, 'Mahmut', 'Beyaz'),
(12, 4567, 'Hüseyin', 'Şeker'),
(13, 5663, 'Kenan', 'Belit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `kullanıcı_adi` varchar(20) NOT NULL,
  `kullanıcı_soyadı` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `parola` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kullanıcı_adi`, `kullanıcı_soyadı`, `email`, `parola`) VALUES
(1, 'admin', 'admin', 'admin@av.com', '12345'),
(2, 'Tevfik', 'Uykun', 'tevfik@av.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dersler`
--
ALTER TABLE `dersler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ders` (`ders`,`dönem`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ders_2` (`ders`,`dönem`),
  ADD KEY `ders` (`ders`,`dönem`),
  ADD KEY `student_no` (`student_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_no`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dersler`
--
ALTER TABLE `dersler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`student_no`) REFERENCES `students` (`student_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`ders`) REFERENCES `dersler` (`ders`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
