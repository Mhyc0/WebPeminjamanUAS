-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2026 at 06:24 PM
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
-- Database: `db_tabungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_transaksi` enum('setor','tarik') NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `jenis_transaksi`, `jumlah`, `keterangan`, `tanggal`) VALUES
(1, 6, 'setor', 1500000.00, 'lemburan', '2026-01-08 18:10:47'),
(2, 6, 'tarik', 500000.00, 'bayaran anak', '2026-01-08 18:12:25'),
(3, 8, 'setor', 165000000.00, '', '2026-01-09 12:11:02'),
(4, 8, 'setor', 34000000.00, 'Adsense', '2026-01-09 12:11:55'),
(5, 8, 'tarik', 100000.00, 'beli makan', '2026-01-09 12:12:24'),
(6, 11, 'setor', 20000000.00, 'Tabungan 2025', '2026-01-09 17:04:28'),
(7, 10, 'setor', 43000000.00, 'Gaji 6 bulan', '2026-01-09 17:05:08'),
(8, 9, 'setor', 4000000.00, 'gaji magang', '2026-01-09 17:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `saldo` decimal(15,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `password`, `role`, `saldo`, `created_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$XzurKS4lXfCVkQqAe1V3Xe6gujIOf0MgN/eMGdJo7gAX9NIl8d1Kq', 'admin', 0.00, '2026-01-08 17:31:16'),
(6, 'Budi Santoso', 'budi', '$2y$10$DpzOai/MYGJ48j7zVNmFL.csWf2nuzsBC1XfIlx19AeF4Qg5wtbg.', 'user', 1000000.00, '2026-01-08 17:59:59'),
(8, 'Brando Franco', 'windah', '$2y$10$Lk0WaOhFkX513I0U4FZJFe9bS9bmJ6/d/v.mMwWaC0YBHFZ./otsi', 'user', 198900000.00, '2026-01-09 12:10:21'),
(9, 'Purnomo', 'Purnomo', '$2y$10$9bXrvlNWoWrSk2Cb0LZXC.DOJlNxF/Yeu40P7J1v8hLodJ3jG2SOO', 'user', 4000000.00, '2026-01-09 17:02:10'),
(10, 'Ujang Arjun', 'Jang', '$2y$10$SIzSp9KaNfA0K8qPXaLHR.mD9n0fc1t..8kZAGfm6zZNdfFNCBT4i', 'user', 43000000.00, '2026-01-09 17:02:44'),
(11, 'Udin Pertama', 'Udin', '$2y$10$jD2W.1TShZD8.0v.kaD7qOdjLZDMRMdyRkHaT8Z81vbnxro5VS7b2', 'user', 20000000.00, '2026-01-09 17:03:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
