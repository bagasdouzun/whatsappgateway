-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2024 pada 02.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_reg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_tabel`
--

CREATE TABLE `siswa_tabel` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `absen` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa_tabel`
--

INSERT INTO `siswa_tabel` (`id`, `nama`, `nisn`, `absen`, `kelas`, `email`, `telepon`, `alamat`, `tanggal_daftar`) VALUES
(62, 'ADI BAGAS SETIYAWAN', '0063145085', 1, 'XII RPL 1', 'adibagassetiyawan16@gmail.com', '083833098296', 'Semanding, Jenangan, Ponorogo, Jawa Timur, Indonesia', '2024-09-07 00:21:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa_tabel`
--
ALTER TABLE `siswa_tabel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `siswa_tabel`
--
ALTER TABLE `siswa_tabel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
