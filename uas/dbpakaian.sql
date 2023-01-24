-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2020 pada 12.37
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpakaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakaian`
--

CREATE TABLE `pakaian` (
  `code` char(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pakaian`
--

INSERT INTO `pakaian` (`code`, `name`, `color`, `size`, `price`, `photo`, `description`) VALUES
('KP01', 'Reabetsoe Hoodie', 'Khaki, Maroon, Army', 'All Size(Fits S to XL)', 135000, 'reabetsoehoodie.jpg', 'Material : Fleece'),
('KP02', 'Tamira Plisket Shirt', 'Creme, Navy, Dusty Pink', 'All Size(Fits S to L)', 95000, 'tamiraplisketshirt.jpg', 'Material : Wollycrepe, Ket : Bagian tangan karet, kancing hidup dibagian depan.'),
('KP03', 'Raseva Longsleeve', 'Green, Blue, Choco', 'All Size(Fits S to L)', 119000, 'rasevalongsleeve.jpg', 'Material : Ladura'),
('KP04', 'Veralda Plaid Shirt', 'Pink, Mustard, Blue', 'All Size(Fits S to XL)', 119000, 'veraldaplaidshirt.jpg', 'Material : Polyester'),
('KP05', 'Renova Shirt', 'Mustard, Nude, Army', 'All Size(Fits S to L)', 99000, 'renovashirt.jpg', 'Material : Kyoto'),
('KP06', 'Aylen Cardi', 'Grey, Misty Grey, Light Grey', 'All Size(Fits S to XL)', 99000, 'aylencardi.jpg', 'Material : Kaos Knit, Ket : Hanya Outer saja.'),
('KP07', 'Biava Longsleeve', 'Black, Brown, Grey', 'All Size(Fits S to L)', 155000, 'biavalongsleeve.jpg', 'Material : Kaos Ponte'),
('KP08', 'Gitami Jacket', 'Mint, Choco, Terracotta', 'All Size(Fits S to XL)', 119000, 'gitamijacket.jpg', 'Material : Canvas Cotton Tebal'),
('KP09', 'Rice Longsleeve', 'Coral, Navy, Brown', 'All Size(Fits S to XL)', 139000, 'ricelongsleeve.jpg', 'Material : Knited 100% Benang Cotton. Tidak tebal juga tidak tipis.'),
('KP10', 'Semira Cardigan', 'Cream, Magenta, Maroon', 'All Size(Fits S to XL)', 145000, 'semiracardigan.jpg', 'Material : Knited 100% Benang Cotton. Bahan lembut, strech dan tidak panas.'),
('KP11', 'Norali Top Shirt', 'Brown, Grey, Khaki', 'All Size(Fits S to L)', 139000, 'noralitopshirt.jpg', 'Material : Tweed'),
('KP12', 'Bitera Shirt', 'Black, Broken White, Blue', 'All Size(Fits S to L)', 109000, 'biterashirt.jpg', 'Material : Cotton');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`) VALUES
(8, 'yenita amelia ika putri', 'yenita', '$2y$10$Ujc5UOHg2kHN0gRESyNlk.iKlBSmah/47MQGHTpfvyTnSUtylfqve'),
(9, 'ananda aliza nurul islami', 'aliza', '$2y$10$jTsdvLQLA50PtUtdgW1nTe7q9dRbj0w4Sv6dOlBDys7JtMuVLklhG'),
(10, 'maudi sofia rahma', 'maudi', '$2y$10$xLn/BEPzEVC3vw.7XHwNrOS2CSkM80Q4BtdbH6H.GnSYVv/x4R0SK'),
(11, 'siti marufah', 'rufah', '$2y$10$Mvawnl5TBiwc7h1jopM2meSCC/mXZH2VzObs5ZsJ/7.3Q1z/33e2a'),
(12, 'hai', 'ha', '$2y$10$mwAIHEzXI1EbYvz6ma7s0eAkBuVDlNp8NrRdzeBamcH85zKNuNKXy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`code`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
