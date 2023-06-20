-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 08:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `images_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_images`
--

CREATE TABLE `crud_images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `image_path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud_images`
--

INSERT INTO `crud_images` (`id`, `name`, `gender`, `age`, `class`, `image_path`) VALUES
(6, 'maarij', 'male', 20, 12, 'student_images/3.jpg'),
(7, 'hasheem', 'male', 21, 11, 'student_images/7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_images`
--
ALTER TABLE `crud_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_images`
--
ALTER TABLE `crud_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
