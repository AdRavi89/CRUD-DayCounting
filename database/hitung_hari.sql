-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 10:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ex_crud_brg2`
--

-- --------------------------------------------------------

--
-- Table structure for table `hitung_hari`
--

CREATE TABLE `hitung_hari` (
  `id` int(11) NOT NULL,
  `jenis_input` varchar(20) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_target` date DEFAULT NULL,
  `jumlah_hari` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hitung_hari`
--

INSERT INTO `hitung_hari` (`id`, `jenis_input`, `tanggal_input`, `tanggal_target`, `jumlah_hari`, `note`) VALUES
(9, 'estimasi', '2024-01-17 16:08:13', '2025-02-20', 400, 'Besok Pulang dulu ya'),
(10, 'datePicker', '2024-01-17 16:13:55', '2027-11-10', 0, 'Coba yah'),
(11, 'datePicker', '2024-01-17 16:15:56', '2024-03-31', 0, 'Semester 4'),
(12, 'estimasi', '2024-01-18 08:54:15', '2024-06-16', 150, 'Belajar PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hitung_hari`
--
ALTER TABLE `hitung_hari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hitung_hari`
--
ALTER TABLE `hitung_hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
