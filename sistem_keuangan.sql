-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2017 at 04:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistem_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `authKey` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `authKey`) VALUES
(1, 'admin1', '1', 0),
(2, 'admin2', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_tgr`
--

CREATE TABLE IF NOT EXISTS `pembayaran_tgr` (
  `no` int(10) NOT NULL,
  `nomor_sktjm` varchar(50) NOT NULL,
  `jenis_peristiwa` varchar(30) NOT NULL,
  `nama_pegawai` text NOT NULL,
  `NIP` int(20) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tata_cara` text NOT NULL,
  `target_memenuhi` date NOT NULL,
  `periode` int(2) NOT NULL,
  `total` int(10) NOT NULL,
  `status cicilan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_tp`
--

CREATE TABLE IF NOT EXISTS `pembayaran_tp` (
  `no` int(5) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `nama_pegawai` text NOT NULL,
  `NIP` int(20) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekonsiliasi`
--

CREATE TABLE IF NOT EXISTS `rekonsiliasi` (
  `tanggal` date NOT NULL,
  `pembayaran` int(9) NOT NULL,
  `NTPN` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_tgr`
--
ALTER TABLE `pembayaran_tgr`
 ADD PRIMARY KEY (`nomor_sktjm`), ADD UNIQUE KEY `NIP` (`NIP`), ADD UNIQUE KEY `NIP_2` (`NIP`);

--
-- Indexes for table `pembayaran_tp`
--
ALTER TABLE `pembayaran_tp`
 ADD PRIMARY KEY (`nomor_surat`), ADD UNIQUE KEY `NIP` (`NIP`);

--
-- Indexes for table `rekonsiliasi`
--
ALTER TABLE `rekonsiliasi`
 ADD UNIQUE KEY `NTPN` (`NTPN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
