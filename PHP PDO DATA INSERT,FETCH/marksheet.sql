-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 06:59 PM
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
-- Database: `ahmedphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE `marksheet` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `english` varchar(255) NOT NULL,
  `science` varchar(255) NOT NULL,
  `math` varchar(255) NOT NULL,
  `urdu` varchar(255) NOT NULL,
  `pakstudies` varchar(255) NOT NULL,
  `obt_marks` int(255) NOT NULL,
  `total_marks` int(255) NOT NULL DEFAULT 500,
  `percentage` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marksheet`
--

INSERT INTO `marksheet` (`id`, `name`, `english`, `science`, `math`, `urdu`, `pakstudies`, `obt_marks`, `total_marks`, `percentage`, `grade`, `remarks`) VALUES
(1, 'Ahmed irfan', '80', '60', '45', '78', '54', 317, 500, '63.4', 'C', 'Not too bad'),
(2, 'Haris Ahmed', '90', '85', '65', '70', '90', 400, 500, '80', 'A', 'Excellent'),
(3, 'Javed Ali', '90', '50', '65', '80', '100', 385, 500, '77', 'B', 'Good'),
(4, 'Peter parkor', '50', '45', '50', '50', '45', 240, 500, '48', 'E', 'Need improvment'),
(5, 'Tim David', '60', '60', '60', '60', '60', 300, 500, '60', 'C', 'Not too bad'),
(6, 'Charlie', '95', '91', '100', '100', '95', 481, 500, '96.2', 'A*', 'Outstanding');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
