-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 03:28 PM
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
-- Database: `stockedumkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`id`, `date`, `amount`, `created_at`, `user_id`) VALUES
(1, '2024-06-05', 4.50, '2024-06-04 20:15:43', 3),
(2, '2024-06-05', 4.50, '2024-06-04 20:24:31', 1),
(3, '2024-06-05', 4.50, '2024-06-04 20:26:41', 1),
(4, '2024-06-05', 45.00, '2024-06-04 20:27:03', 1),
(5, '2024-06-05', 45.00, '2024-06-04 20:30:13', 1),
(6, '2024-06-05', 45.00, '2024-06-04 20:30:21', 1),
(7, '2024-06-05', 5000.00, '2024-06-05 01:02:19', 3),
(8, '2024-06-05', 15.00, '2024-06-05 04:10:30', 1),
(9, '2024-06-05', 15.00, '2024-06-05 04:11:37', 1),
(10, '2024-06-05', 15.00, '2024-06-05 04:13:19', 1),
(11, '2024-06-05', 15.00, '2024-06-05 04:13:25', 1),
(12, '2024-06-05', 15.00, '2024-06-05 04:13:31', 1),
(13, '2024-06-05', 15.00, '2024-06-05 04:13:40', 1),
(14, '2024-06-05', 25.00, '2024-06-05 04:13:53', 1),
(15, '2024-06-05', 25.00, '2024-06-05 04:15:37', 1),
(16, '2024-06-05', 25.00, '2024-06-05 04:16:54', 1),
(17, '2024-06-05', 25.00, '2024-06-05 04:17:17', 1),
(18, '2024-06-05', 25.00, '2024-06-05 04:19:07', 1),
(19, '2024-06-05', 25.00, '2024-06-05 04:19:14', 1),
(20, '2024-06-05', 25.00, '2024-06-05 04:21:05', 1),
(21, '2024-06-05', 25.00, '2024-06-05 04:21:30', 1),
(22, '2024-06-05', 25.00, '2024-06-05 04:21:50', 1),
(23, '2024-06-05', 25.00, '2024-06-05 04:21:57', 1),
(24, '2024-06-05', 25.00, '2024-06-05 04:22:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `weight` float DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `item_name`, `quantity`, `created_at`, `user_id`, `weight`, `date_added`) VALUES
(1, 'Gandum', 3, '2024-06-04 19:58:05', 0, NULL, '2024-06-05 08:06:35'),
(3, 'Rokok Sampoerna', 3, '2024-06-04 20:15:09', 3, 2, '2024-06-25 08:15:20'),
(6, 'Roti Tawar', 18, '2024-06-05 01:01:39', 3, 0.2, '2024-06-05 08:06:35'),
(7, 'Alpukat', 12, '2024-06-05 01:04:50', 4, NULL, '2024-06-05 08:06:35'),
(11, 'Rokok Sampoerna', 125, '2024-06-05 05:05:21', 5, NULL, '2024-06-05 08:06:35'),
(12, 'Telur', 2, '2024-06-05 05:35:47', 5, NULL, '2024-06-05 08:06:35'),
(17, 'Mentega', 50, '2024-06-05 08:02:32', 1, 300, '2024-06-07 12:01:21'),
(20, 'Es Teh Jumbo', 10, '2024-06-05 08:13:39', 3, 3, '2024-06-05 08:13:39'),
(22, 'Kinder Joy', 4, '2024-06-05 08:14:20', 3, 1, '2024-06-05 08:14:20'),
(23, 'Telur', 15, '2024-06-05 08:20:52', 3, 3, '2024-06-05 08:20:52'),
(24, 'Roti Tawar', 26, '2024-06-05 09:30:25', 1, 847, '2024-06-05 13:09:04'),
(26, 'Selai Nanas', 18, '2024-06-07 09:13:22', 1, 500, '2024-06-07 09:17:25'),
(27, 'Selai Kacang', 12, '2024-06-07 09:20:17', 1, 350, '2024-06-07 09:24:17'),
(29, 'Gandum', 15, '2024-06-07 12:27:50', 1, 100, '2024-06-07 07:27:50'),
(48, 'Mentega', 12, '2024-06-18 11:26:43', 10, 5, '2024-06-18 06:26:43'),
(49, 'Mentega', 10, '2024-06-26 11:42:14', 12, 4, '2024-06-26 06:42:14'),
(50, 'Telur', 15, '2024-06-26 11:44:14', 12, 500, '2024-06-26 06:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `date_out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_out`
--

INSERT INTO `stock_out` (`id`, `user_id`, `item_name`, `quantity`, `weight`, `date_out`) VALUES
(1, 1, 'Mentega', 10, 40.00, '2024-06-07 19:11:23'),
(2, 3, 'Rokok Sampoerna', 2, 1.00, '2024-06-25 15:18:24'),
(3, 12, 'Mentega', 2, 1.00, '2024-06-26 13:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `alamat` varchar(255) DEFAULT NULL,
  `nama_umkm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `alamat`, `nama_umkm`) VALUES
(1, 'Sibaikun', '$2y$10$sDszkU3XgGJSMCvmT7M1buJAEnGzLLMhN5ZYlhLUjcfzMT5L04YTW', '2024-06-04 19:57:33', 'Subah, Batang, Jawa Tengah', 'Roti Rebus'),
(2, 'Bagas', '$2y$10$TiaTBI3uuBjOZce9XPUji.TE5Xu4F04KAUpC9TxDEwmk8QTmeEJcG', '2024-06-04 20:06:04', NULL, NULL),
(3, 'Aldino Putra E', '$2y$10$8.8hiORySCKHzDId./gRa..EYPh.YeAfNnFptbP1PYdGpVdkNgbFO', '2024-06-04 20:14:26', 'Bangetayu, Kota Semarang, Jawa Tengah', 'Kebab Dinosaurus'),
(4, 'Fasha', '$2y$10$wkyqLZlul7oJduHVL24XFuyD2uA9vd23q6/XKP930.OUzy0iWWJf2', '2024-06-05 01:03:00', NULL, NULL),
(5, 'Anafi', '$2y$10$.rdpS2IJ7rMWWd/S4onRsu1CI9xNUeq7Kw8ZNAx.eVZs.uWIR4o3O', '2024-06-05 04:59:00', NULL, NULL),
(6, 'Farhan', '$2y$10$jiBL9X2l1tz8Iu8nNy3q8ODC/p8CqretH5eesPDz7ezQIeE7Gl3Pq', '2024-06-05 05:52:26', NULL, NULL),
(7, 'Fadhoil', '$2y$10$uvlYvSLgzVsSEnQ1CVsrY.CT51CEoY2paLWWWDZUZHebhX.GzPOi.', '2024-06-05 14:27:28', 'Limpung, Batang, Jawa Tengah', 'Ikan Terbang'),
(9, 'Sandi', '$2y$10$XwQmxDWgvASX3rQLEMLzzOucfNEm.PPllp3uam1tcpOLNhlnBKWmi', '2024-06-05 14:38:28', 'Demak, Jawa Tengah, Indonesia', 'Lamongan Goreng'),
(10, 'Riyan', '$2y$10$yPYdhdN8qApjgMgIfG8Jv.gK0GPAgNfqBqLgAcc7J1BwKEtK/ahle', '2024-06-18 11:26:08', 'Pati, Jawa Tengah', 'Roti Bakar Ndut Sedap'),
(11, 'Riyan Gendut', '$2y$10$xAtQhucTdsRtOrU.JForP.Ga/niM87gJ83gT4a8pogSjnkG.C35Tq', '2024-06-19 12:52:04', 'Pati, Jawa Tengah', 'Roti Rebus Goreng'),
(12, 'Dana Aksa', '$2y$10$AG6pZZi3FgtanYddR1MF/uzg1D4niREyV0lltY7ZRfBZDNRo75F8y', '2024-06-25 13:22:24', 'Jepara, Jawa Tengah', 'Roti Aksa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD CONSTRAINT `stock_out_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
