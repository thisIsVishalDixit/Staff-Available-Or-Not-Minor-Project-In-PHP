-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 07:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `day` varchar(10) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `staff_id`, `day`, `start_time`, `end_time`) VALUES
(1, 1, 'Monday', '09:00:00', '17:00:00'),
(2, 2, 'Wednesday', '08:00:00', '16:00:00'),
(3, 2, 'Friday', '08:00:00', '16:00:00'),
(4, 3, 'Tuesday', '10:00:00', '18:00:00'),
(5, 3, 'Thursday', '10:00:00', '18:00:00'),
(6, 1, 'friday', '12:00:00', '04:00:00'),
(7, 1, 'friday', '12:00:00', '04:00:00'),
(8, 1, 'friday', '12:00:00', '04:00:00'),
(9, 6, 'sanday', '08:00:00', '10:00:00'),
(10, 8, '', '07:00:00', '12:00:00'),
(11, 8, '', '07:00:00', '12:00:00'),
(12, 8, '', '07:00:00', '12:00:00'),
(13, 8, 'Monday', '09:00:00', '05:00:00'),
(14, 1, 'Monday', '10:00:00', '04:00:00'),
(15, 4, 'Monday', '10:00:00', '04:00:00'),
(16, 9, 'Monday', '06:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `role`) VALUES
(1, 'Vishal', 'manager'),
(2, 'Vishal Dixit', 'analysyt'),
(3, 'John Doe', 'Delivery Driver'),
(4, 'Jane Smith', 'Warehouse Worker'),
(5, 'Bob Johnson', 'Customer Support'),
(6, 'Himanshu Porwal', 'senior manager'),
(7, 'Nitin Patidar', 'junior manager'),
(8, 'Himanshu Mishra', 'delivery boy'),
(9, 'anshu', 'analysyt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
