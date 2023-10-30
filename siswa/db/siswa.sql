-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 08:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `bobot` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode`, `nama`, `bobot`) VALUES
(1, 'C1', 'Pekerjaan Orang Tua', '0.25'),
(2, 'C2', 'Penghasilan Orang Tua', '0.25'),
(3, 'C3', 'Jumlah Tanggungan Ortu', '0.20'),
(4, 'C4', 'Jumlah Saudara Kandung', '0.15'),
(5, 'C5', 'Kelas', '0.15');

-- --------------------------------------------------------

--
-- Table structure for table `log_siswa`
--

CREATE TABLE `log_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `pekerjaan` varchar(10) NOT NULL,
  `penghasilan` varchar(10) NOT NULL,
  `tanggungan` varchar(10) NOT NULL,
  `saudara` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `total_normalisasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `id_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `nisn`, `status`, `tgl`, `id_log`) VALUES
(1, 'Erica Putri', '10091', 'DI TERIMA', '2021-04-22', 10),
(2, 'Riri Anita', '10003', 'DI TERIMA', '2021-04-22', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `log_siswa`
--
ALTER TABLE `log_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_siswa`
--
ALTER TABLE `log_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
