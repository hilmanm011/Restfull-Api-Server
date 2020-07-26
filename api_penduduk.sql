-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 01:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_penduduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` char(9) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `jurusan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`) VALUES
(1, '043040001', 'Doddy Ferdiansyah', 'doy@gmail.com', 'Teknik Planologi'),
(2, '023040123', 'Erik', 'erik@gmail.com', 'Teknik Industri'),
(3, '9722', 'Muhamad Hilman', 'Muhamadhilman885@gmail.com', 'Teknik Lingkungan'),
(35, '112222', 'Heru Her', 'heru@gmail.com', 'Teknik Informatika'),
(40, '878708', 'Blodz bll', 'bld@gmail.com', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `id` int(11) NOT NULL,
  `id_nik` varchar(258) NOT NULL,
  `id_kk` varchar(258) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`id`, `id_nik`, `id_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `status`, `alamat`, `pekerjaan`, `kewarganegaraan`, `agama`) VALUES
(1, '123455', '12345', 'Muhamad Hilman', 'Serang, Banten', '1997-02-13', 'Laki-Laki', 'Belum Menikah', 'Kp. Ciwera RT 04 VRW 02', 'Mahasiswa', 'WNI', 'Islam'),
(4, '23345', '12334', 'Sana Kardiansyah', 'Subang', '1999-07-07', 'Laki-Laki', 'Belum Menikah', 'Kp.ciwera RT 04 RW 02', 'Pelajar', 'WNI', 'Kristen'),
(6, '5556444', '224776', 'Suhandi', 'Subang', '2020-07-21', 'Laki-Laki', 'Belum Menikah', 'Cipunagara, Subang', 'Mahasiswa', 'WNI', 'Islam'),
(11, '223332', '111442', 'Blodz fff', 'Bandung', '2020-06-30', 'Laki-Laki', 'Sudah Menikah', 'subang', 'Mahasiswa', 'WNI', 'Islam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nrp` (`nrp`);

--
-- Indexes for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
