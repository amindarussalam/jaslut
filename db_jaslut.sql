-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 09:56 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jaslut`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `namalengkap` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'BOCAH PANTURA');

-- --------------------------------------------------------

--
-- Table structure for table `data_lansia`
--

CREATE TABLE `data_lansia` (
  `id` int(3) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_lansia` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(50) DEFAULT NULL,
  `ibu_kandung` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_rek` int(15) DEFAULT NULL,
  `status_lansia` varchar(30) DEFAULT NULL,
  `kabupaten` varchar(8) DEFAULT NULL,
  `kecamatan` varchar(7) DEFAULT NULL,
  `kelurahan` varchar(12) DEFAULT NULL,
  `pendamping` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_lansia`
--

INSERT INTO `data_lansia` (`id`, `nik`, `nama_lansia`, `tempat_lahir`, `tanggal_lahir`, `ibu_kandung`, `alamat`, `no_rek`, `status_lansia`, `kabupaten`, `kecamatan`, `kelurahan`, `pendamping`) VALUES
(8, '1208211303440001', 'ABD ROCHMAN', 'LAMONGAN', '13-Mar-1944', 'RIFAI', 'DRAJAT RT.03 RW.01', 283856747, 'Eligible', 'LAMONGAN', 'PACIRAN', 'DRAJAT', 'AH. SHOLAHUDIN ARRONIRI, S.PSI'),
(9, '3524140706450001', 'MULYONO', 'LAMONGAN', '7-Jun-1945', 'WURIYANI', 'DRAJAT RT.03 RW.03', 283856771, 'Eligible', 'LAMONGAN', 'PACIRAN', 'DRAJAT', 'AH. SHOLAHUDIN ARRONIRI, S.PSI');

-- --------------------------------------------------------

--
-- Table structure for table `lansia`
--

CREATE TABLE `lansia` (
  `id` int(10) NOT NULL,
  `nama_lansia` varchar(150) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `tahap` varchar(30) NOT NULL,
  `pendamping` varchar(150) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `kk` varchar(100) NOT NULL,
  `rek_depan` varchar(100) NOT NULL,
  `rek_belakang` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lansia`
--

INSERT INTO `lansia` (`id`, `nama_lansia`, `nik`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `tahap`, `pendamping`, `ktp`, `kk`, `rek_depan`, `rek_belakang`) VALUES
(46, 'ABD ROCHMAN', '1208211303440001', 'DRAJAT RT.03 RW.01', 'DRAJAT', 'PACIRAN', 'LAMONGAN', '1', 'AH. SHOLAHUDIN ARRONIRI, S.PSI', '5f0970165fac0.jpeg', '5f0970166015f.jpeg', '5f097016606a9.jpg', '5f09701660af7.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `data_lansia`
--
ALTER TABLE `data_lansia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lansia`
--
ALTER TABLE `lansia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_lansia`
--
ALTER TABLE `data_lansia`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lansia`
--
ALTER TABLE `lansia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
