-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 09:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formulir`
--

-- --------------------------------------------------------

--
-- Table structure for table `gelombang_pelatihan`
--

CREATE TABLE `gelombang_pelatihan` (
  `id` int(50) NOT NULL,
  `nama_gelombang` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelombang_pelatihan`
--

INSERT INTO `gelombang_pelatihan` (`id`, `nama_gelombang`, `status`, `create_at`, `update_at`) VALUES
(1, 'Gelombang 1', 0, '2024-11-23 06:01:31', '2024-11-23 06:02:08'),
(2, 'Gelombang 2', 0, '2024-11-23 06:02:16', '2024-11-23 06:02:16'),
(3, 'Gelombang 3', 0, '2024-11-23 06:02:20', '2024-11-23 06:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(50) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `status`, `create_at`, `update_at`) VALUES
(1, 'Teknik Jaringan & Komputer', 0, '2024-11-18 07:23:08', '2024-12-09 16:13:42'),
(2, 'Web programming', 0, '2024-11-18 07:23:30', '2024-12-09 16:13:47'),
(3, 'Teknik  Komputer', 0, '2024-11-18 07:24:04', '2024-12-09 16:13:56'),
(4, 'Desain Grafis', 0, '2024-11-23 06:03:05', '2024-12-09 16:14:04'),
(5, 'Tata Boga', 0, '2024-11-23 06:03:37', '2024-12-09 16:14:08'),
(6, 'Tata Graha', 0, '2024-11-26 15:31:34', '2024-12-09 18:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(12) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`, `create_at`, `updateat`) VALUES
(1, 'admin', '2024-11-23 05:59:55', '2024-11-23 05:59:55'),
(2, 'adminAPK', '2024-11-23 06:00:11', '2024-11-23 06:00:11'),
(3, 'PIC Jurusan', '2024-11-23 06:00:22', '2024-11-23 06:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_pelatihan`
--

CREATE TABLE `peserta_pelatihan` (
  `id` int(12) NOT NULL,
  `id_gelombang` int(12) NOT NULL,
  `id_jurusan` int(12) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kartu_keluarga` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_pelatihan`
--

INSERT INTO `peserta_pelatihan` (`id`, `id_gelombang`, `id_jurusan`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `kartu_keluarga`, `status`, `create_at`, `update_at`) VALUES
(18, 2, 6, 'raiden ei', 'Narukami Island', '2024-12-06', 'Perempuan', 'baal@gmail.com', '1351117.jpeg', 0, '2024-11-23 16:09:15', '2024-12-09 07:34:47'),
(33, 1, 5, 'naganohara yoimia', 'Narukami Island', '2024-11-25', 'Laki-Laki', 'naganohara@gmail.com', '6746b625953ed.jpg', 1, '2024-11-26 15:45:38', '2024-12-09 18:18:24'),
(35, 3, 6, 'yae miko', 'Mountain Yougo', '2024-12-18', 'Perempuan', 'yae@gmail.com', '1356760.jpeg', 1, '2024-11-27 03:21:34', '2024-12-09 06:38:28'),
(38, 3, 6, 'Indra Pamungkas', 'Bekasi', '2024-12-03', 'Laki-Laki', 'indra@123', '7.png', 0, '2024-12-09 09:13:49', '2024-12-09 09:13:49'),
(40, 2, 1, 'ibnu ibrahim123', 'Bekasi', '2024-12-24', 'Laki-Laki', 'ibnu@123', '6757309b6810b.png', 1, '2024-12-09 16:08:24', '2024-12-10 08:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `id_level` int(12) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_level`, `nama_lengkap`, `email`, `password`, `create_at`, `update_at`) VALUES
(4, 1, 'admin', 'admin@gmail.com', '123', '2024-11-23 10:07:03', '2024-11-23 10:07:03'),
(5, 3, 'naganohara yoimia', 'PICJurusan@gmail.com', '123', '2024-11-23 10:16:47', '2024-12-10 06:21:19'),
(6, 2, 'Ahmad Jolani Assad', 'adminAPK@gmail.com', '123', '2024-11-23 10:17:48', '2024-12-10 04:38:42'),
(27, 3, 'budi aryanto123', 'aryanto@gmail.com', '123', '2024-12-10 04:20:33', '2024-12-10 04:25:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gelombang_pelatihan`
--
ALTER TABLE `gelombang_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gelombang` (`id_gelombang`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_1` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gelombang_pelatihan`
--
ALTER TABLE `gelombang_pelatihan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD CONSTRAINT `peserta_pelatihan_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_pelatihan_ibfk_2` FOREIGN KEY (`id_gelombang`) REFERENCES `gelombang_pelatihan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
