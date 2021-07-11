-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 04:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsiwikode`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','client') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(15, 'lolo', '$2y$10$OMVxjP4whDfn1ug2JbQ68ObHwTUG4YskQpI4gVIEh1VMZtRnlxmUC', 'client'),
(16, 'admin', '$2y$10$hndk//Ak77jxFkVjPPKud.z.XsgV9Ag9gsizQ4IVLvL3BqbGLaRZ6', 'admin'),
(17, 'siang', '$2y$10$lCDDIt2tlRQbr4gExAYeKuPR1F2KmL9fNX.fJUXn7EB0xkSWTUP7i', 'client'),
(18, 'pagi', '$2y$10$pOATN3K5Gb7T2Ay2J.Ul4up0O/89eEj/G4n1EgzaekfNZZ8cvKd6e', 'client'),
(19, 'hah', '$2y$10$9rZFeCyxGpLGl0ClKS9xP.YmWweFyxCTEZudxi4/LRiCS7Gg/sTQC', 'client'),
(20, 'test', '$2y$10$F.JLpm7XruoUrVU4hLEaeOPZgIFGiYXJ8e3esS8D.dwGqh2vuMGBu', 'client'),
(21, 'kedua', '$2y$10$A9jKyfLlJHc4L5AkXPlO2eh7rWKFgiTz6xJAFzKWaU5ISPcPL/9RS', 'client'),
(22, 'okeh', '$2y$10$p4gUf9jZ32gqOY97LoKBkevJ2uykRqtatNXDFUkeOpgndxKExBCiG', 'client'),
(23, '', '$2y$10$V7btkuDR2A0daGyq/b7vGO7tPiem6KdlsxPG9bxEoGStqhChDDSxy', 'client'),
(24, 'hadoh', '$2y$10$sf.BHw6yBxfuIdk5/KTjQ.Si8It3Xihce6HX8kMcFsAzppQiW6Ef6', 'client'),
(25, 'hiya', '$2y$10$1DHDytLY2fjRiKsBRgRAjepE0XR0.ZpAwp7Oz11M/PxN8Yp66d1Bm', 'client'),
(26, 'sore', '$2y$10$69zfLlbaGFYFAbPv01z5Ee6DEPd/c/5c7gRPjLOtyfVUXiB4rKpgC', 'client'),
(27, 'why', '$2y$10$aDZA8gEZDTML16/FtlGfp.KcMfIVlprnP9aHkdmMx7h4Iqm9kdOh6', 'client'),
(28, 'ulul', '$2y$10$vXmOdeLzfWAjuRraVJhWNOO91bB44pMa8ieTXSYMhtDZf5Uyzzg9K', 'client'),
(29, 'permisi', '$2y$10$3EwvhjGyVkuYKl4YFJVRtuj8dfm0oOnUxzqRloFEp2V/S8nRtANt6', 'client'),
(30, 'ok', '$2y$10$PSnVOCBWOPjMC6XibgQhke7/v1pJ0Fl/Vc4Sqp3tdL1I8mveUoAU6', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `wisatakuliner`
--

CREATE TABLE `wisatakuliner` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `notelp` varchar(22) NOT NULL,
  `gmaps` varchar(32) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `wisata` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisatakuliner`
--

INSERT INTO `wisatakuliner` (`id`, `nama`, `email`, `notelp`, `gmaps`, `gambar`, `wisata`) VALUES
(61, 'asdasd', 'asdjju@i2jij', '908765', 'kjiuhfn', '5ff08c6e5b464.png', 'rekreasi'),
(62, 'okeehhhh', 'okrijr@okeh', '0987654567890', 'lkjuhgvytf6r578y9i0ijuih', '5ff08c8ac9a51.png', 'kuliner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisatakuliner`
--
ALTER TABLE `wisatakuliner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wisatakuliner`
--
ALTER TABLE `wisatakuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
