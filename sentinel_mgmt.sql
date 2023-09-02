-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 09:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sentinel_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`) VALUES
(1, 'admin', '$2y$10$pcNbjKNkQ3E.gdj/UHc/8.TIs91SMQYzT9cdi5qmLUx42CngO6x9C');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `alternate_phone` bigint(20) DEFAULT NULL,
  `village` varchar(50) NOT NULL,
  `police_station` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `adhaar_no` bigint(20) DEFAULT NULL,
  `adhaar_card` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `phone`, `alternate_phone`, `village`, `police_station`, `district`, `adhaar_no`, `adhaar_card`, `is_deleted`, `updated_by`, `updated_at`, `created_at`) VALUES
(1, 'John Smith', 7978456352, NULL, 'Keranga', 'Khordha', 'Khordha', NULL, '', 0, 'admin', '2022-10-10 09:17:24', '2022-10-09 07:19:08'),
(2, 'John Smith', 7978456352, NULL, 'Keranga', 'Khordha', 'Khordha', NULL, '', 0, 'admin', '2022-10-10 09:17:27', '2022-10-09 07:19:08'),
(3, 'Test', 7978456352, 7978456353, 'Keranga', 'Khordha', 'Khordha', 9876543217895632, 'uploads/default_aadhaar.jpg', 0, 'admin', '2022-10-10 09:17:29', '2022-10-10 08:19:53'),
(4, 'Test 3', 9873214456, 9873214467, 'Keranga', 'Khordha', 'Khordha', 7894561233216549, 'uploads/default_aadhaar.jpg', 0, 'admin', '2022-10-10 09:17:31', '2022-10-10 09:10:40'),
(5, 'Test 3', 8763438208, 8763438208, 'Keranga', 'Khordha', 'Khordha', 7894561233216549, 'uploads/adhaar_card_10102022111327.png', 0, 'admin', '2022-10-10 09:17:35', '2022-10-10 09:13:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
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
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
