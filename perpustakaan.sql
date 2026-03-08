-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2026 at 03:41 AM
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `kelas`, `no_hp`, `created_at`) VALUES
(2, 'Ahmad', 'X RPL 1', '081234567890', '2026-03-07 04:20:38'),
(3, 'Budi Santoso', 'X RPL 2', '081298765432', '2026-03-07 04:20:38'),
(4, 'Rizky Maulana', 'XI TKJ 1', '082112223334', '2026-03-07 04:20:38'),
(5, 'Dimas Saputra', 'XI RPL 1', '085712345678', '2026-03-07 04:20:38'),
(6, 'Fajar Hidayat', 'XII TKJ 2', '083812341234', '2026-03-07 04:20:38'),
(7, 'Andi Pratama', 'X TKJ 1', '082233445566', '2026-03-07 04:20:38'),
(8, 'Rafi Ramadhan', 'XI RPL 2', '081355667788', '2026-03-07 04:20:38'),
(9, 'Ilham Maulana', 'XII RPL 1', '085211223344', '2026-03-07 04:20:38'),
(10, 'Yoga Saputra', 'X RPL 3', '081377889900', '2026-03-07 04:20:38'),
(11, 'Farhan Akbar', 'XI TKJ 2', '082144556677', '2026-03-07 04:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'tersedia',
  `stok` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `tahun`, `status`, `stok`) VALUES
(14, 'Laskar Pelangi', 'Andrea Hirata', 2005, 'tersedia', 9),
(15, 'Aroma Karsa', 'Dee Lestari', 2018, 'tersedia', 11),
(16, 'Pulang', 'Leila S. Chudori', 2012, 'tersedia', 8),
(17, 'Bumi', 'Tere Liye', 2014, 'tersedia', 16),
(18, 'Negeri 5 Menara', 'Ahmad Fuadi', 2009, 'tersedia', 19),
(19, 'Dilan 1990', 'Pidi Baiq', 2014, 'tersedia', 6),
(20, 'Ayat Ayat Cinta', 'Habiburrahman El Shirazy', 2004, 'tersedia', 2),
(21, 'Perahu Kertas', 'Dee Lestari', 2009, 'tersedia', 4),
(22, 'Sang Pemimpi', 'Andrea Hirata', 2006, 'tersedia', 4),
(23, 'Koala Kumal', 'Raditya Dika', 2015, 'tersedia', 3);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `buku_id`, `tanggal_pinjam`, `tanggal_kembali`, `id_anggota`, `status`) VALUES
(1, 2, '2026-02-01', '2026-02-01', NULL, 'dipinjam'),
(2, 1, '2026-02-01', '2026-02-01', NULL, 'dipinjam'),
(3, 3, '2026-02-01', '2026-02-01', NULL, 'dipinjam'),
(4, 2, '2026-02-01', '2026-02-01', NULL, 'dipinjam'),
(5, 2, '2026-02-01', '2026-02-01', NULL, 'dipinjam'),
(6, 3, '2026-02-01', '2026-02-01', NULL, 'dipinjam'),
(13, 14, '2026-03-07', '2026-03-07', 6, 'dipinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
