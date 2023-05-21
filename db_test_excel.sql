-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 08:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test_excel`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(9) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nilai_uts` decimal(5,2) NOT NULL,
  `nilai_uas` decimal(5,2) NOT NULL,
  `nilai_final` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `nilai_uts`, `nilai_uas`, `nilai_final`) VALUES
(97, 211511001, 'Achmadya Ridwan Ilyawan', '80.00', '92.00', '86.60'),
(98, 211511002, 'Adilla Pradana', '83.00', '93.00', '88.50'),
(99, 211511003, 'Aldrin Rayhan Putra', '88.00', '90.00', '89.10'),
(100, 211511004, 'Ananta Destawardhana', '80.00', '91.00', '86.05'),
(101, 211511005, 'Andre Lutfiansyah', '83.00', '93.00', '88.50'),
(102, 211511006, 'Aprillia Rahmawati', '85.00', '95.00', '90.50'),
(103, 211511007, 'Ari Maulana Hardan', '84.00', '98.00', '91.70'),
(104, 211511008, 'Ariana Rahmawati', '81.00', '93.00', '87.60'),
(105, 211511009, 'Arief Rahman Ahmadhusein', '89.00', '92.00', '90.65'),
(106, 211511010, 'Aurell Dhiendra Niecel Putri', '83.00', '90.00', '86.85'),
(107, 211511011, 'Devina Lusiana', '80.00', '90.00', '85.50'),
(108, 211511012, 'Evic Nur Avivah', '82.00', '91.00', '86.95'),
(109, 211511013, 'Fahmi Ahmad Fadilah', '84.00', '91.00', '87.85'),
(110, 211511014, 'Fathan Falatansya Firdaus', '86.00', '94.00', '90.40'),
(111, 211511015, 'Hilman Permana', '84.00', '93.00', '88.95'),
(112, 211511016, 'Ibrahim Kevin Arrasyid', '83.00', '95.00', '89.60'),
(113, 211511017, 'Irfan Khoerul Mupid Setiadi', '86.00', '97.00', '92.05'),
(114, 211511018, 'Lolla Mariah', '81.00', '92.00', '87.05'),
(115, 211511019, 'Luthfie Yannuardy', '84.00', '90.00', '87.30'),
(116, 211511020, 'M. Fatur Maulidan Azzahra', '88.00', '91.00', '89.65'),
(117, 211511021, 'Meisya Puteri Ghefira', '80.00', '92.00', '86.60'),
(118, 211511022, 'Muhamad Ardi Nur Insan', '80.00', '93.00', '87.15'),
(119, 211511023, 'Muhammad Andhika Prasetya', '83.00', '94.00', '89.05'),
(120, 211511024, 'Muhammad Fadhil Maulana', '84.00', '90.00', '87.30'),
(121, 211511025, 'Muhammad Wafda Rizkiansyah', '89.00', '92.00', '90.65'),
(122, 211511026, 'Muhammad Zidan Hidayat', '88.00', '95.00', '91.85'),
(123, 211511027, 'Nadya Frisca Regina Fasya', '80.00', '92.00', '86.60'),
(124, 211511028, 'Naufal Salman Mulyadi', '80.00', '91.00', '86.05'),
(125, 211511029, 'Rofi Fauzan Al Habieb', '81.00', '92.00', '87.05'),
(126, 211511030, 'Salma Aushaf Hafianne', '82.00', '94.00', '88.60'),
(127, 211511031, 'Shofiyah', '83.00', '95.00', '89.60'),
(128, 211511032, 'Wildan Setya Nugraha', '83.00', '92.00', '87.95');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
