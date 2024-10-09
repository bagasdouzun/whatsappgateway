-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 08:48 AM
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
-- Database: `form_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu_masuk` time DEFAULT NULL,
  `waktu_pulang` time DEFAULT NULL,
  `status_masuk` enum('Hadir','Terlambat','Alpa') DEFAULT 'Alpa',
  `status_pulang` enum('Pulang','Tidak Pulang') DEFAULT 'Tidak Pulang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_siswa`, `tanggal`, `waktu_masuk`, `waktu_pulang`, `status_masuk`, `status_pulang`) VALUES
(7, 66, '2024-10-09', '13:39:00', NULL, 'Hadir', 'Tidak Pulang'),
(8, 65, '2024-10-09', '13:46:44', '13:46:47', 'Hadir', 'Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_tabel`
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
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rfid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_tabel`
--

INSERT INTO `siswa_tabel` (`id`, `nama`, `nisn`, `absen`, `kelas`, `email`, `telepon`, `alamat`, `tanggal_daftar`, `rfid`) VALUES
(63, 'ADI BAGAS SETIYAWAN', '0063145085', 1, 'XII RPL 1', 'adibagassetiyawan16@gmail.com', '083833098296', 'Semanding, Jenangan, Ponorogo', '2024-10-09 06:30:39', '123'),
(64, 'ADI BAGAS SETIYAWAN', '0063145085', 1, 'XII RPL 1', 'adibagassetiyawan16@gmail.com', '083833098296', 'Semanding, Jenangan, Ponorogo', '2024-10-09 03:59:35', '123'),
(65, 'ADI BAGAS SETIYAWAN', '0063145085', 1, 'XII RPL 1', 'adibagassetiyawan16@gmail.com', '083833098296', 'Semanding, Jenangan, Ponorogo', '2024-10-09 05:59:31', '160806'),
(66, 'ADI BAGAS SETIYAWAN', '0063145085', 1, 'XII RPL 1', 'adibagassetiyawan16@gmail.com', '083833098296', 'Semanding, Jenangan, Ponorogo', '2024-10-09 06:27:19', '1234567890'),
(67, 'ADI BAGAS SETIYAWAN', '0063145085', 1, 'XII RPL 1', 'adibagassetiyawan16@gmail.com', '083833098296', 'Semanding, Jenangan, Ponorogo', '2024-10-09 06:29:43', '1234567890'),
(68, 'BAGAS', '0063145085', 1, 'XII RPL 1', 'adibagassetiyawan16@gmail.com', '083833098296', 'Semanding, Jenangan, Ponorogo', '2024-10-09 06:39:44', '0987654321'),
(69, 'BAGAS', '0063145085', 1, 'XII RPL 1', 'adibagassetiyawan16@gmail.com', '083833098296', 'Semanding, Jenangan, Ponorogo', '2024-10-09 06:41:27', '0987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa_tabel`
--
ALTER TABLE `siswa_tabel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswa_tabel`
--
ALTER TABLE `siswa_tabel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa_tabel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
