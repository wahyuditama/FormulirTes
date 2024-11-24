-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 05:04 PM
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
(4, 'Teknik Jaringan & Komputer', 0, '2024-11-18 07:23:08', '2024-11-18 07:23:08'),
(5, 'Web programming', 0, '2024-11-18 07:23:30', '2024-11-18 07:23:30'),
(6, 'Teknik  Komputer', 0, '2024-11-18 07:24:04', '2024-11-18 07:24:04'),
(8, 'Desain Grafis', 0, '2024-11-23 06:03:05', '2024-11-23 06:03:05'),
(10, 'Tata Boga', 0, '2024-11-23 06:03:37', '2024-11-23 06:03:37');

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
  `gelombang` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kartu_keluarga` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_pelatihan`
--

INSERT INTO `peserta_pelatihan` (`id`, `id_gelombang`, `id_jurusan`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `gelombang`, `jurusan`, `jenis_kelamin`, `email`, `kartu_keluarga`, `create_at`, `update_at`) VALUES
(17, 2, 8, 'raiden makoto', 'fdfg', '2024-11-23', 'Gelombang 2', 'Desain Grafis', 'Laki-Laki', 'firo@gmail.com', '1351572.jpeg', '2024-11-23 13:48:55', '2024-11-23 13:48:55'),
(18, 3, 10, 'raiden ei', 'Narukami Island', '2024-12-06', '', '', 'Laki-Laki', 'baal@gmail.com', '1351117.jpeg', '2024-11-23 16:09:15', '2024-11-23 16:21:18'),
(23, 3, 10, 'naganohara yoimia', 'Narukami Island', '2024-11-23', 'Gelombang 3', 'Tata Boga', 'Laki-Laki', 'naganohara@gmail.com', 'picture4.jpg', '2024-11-23 16:41:31', '2024-11-23 16:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `id_level` int(12) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_level`, `nama_level`, `nama_lengkap`, `email`, `password`, `create_at`, `update_at`) VALUES
(4, 1, 'admin', 'admin', 'admin@gmail.com', '123', '2024-11-23 10:07:03', '2024-11-23 10:07:03'),
(5, 3, 'PIC Jurusan', 'naganohara yoimia', 'naganohara@gmail.com', '123', '2024-11-23 10:16:47', '2024-11-23 10:16:47'),
(6, 2, 'adminAPK', 'adminAPK', 'adminAPK@gmail.com', '123', '2024-11-23 10:17:48', '2024-11-23 12:46:08'),
(8, 2, 'adminAPK', 'ibnu ibrahim', 'firo@wulo.com', '123', '2024-11-23 17:09:46', '2024-11-23 17:16:14');

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
  ADD KEY `id_level` (`id_level`);

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD CONSTRAINT `peserta_pelatihan_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
