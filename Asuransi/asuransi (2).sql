-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 10:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asuransi`
--

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(10) NOT NULL,
  `nama_nasabah` varchar(45) NOT NULL,
  `jenis_kelamin_n` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `nip` int(10) NOT NULL,
  `no_polis` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nama_nasabah`, `jenis_kelamin_n`, `alamat`, `nip`, `no_polis`) VALUES
(1, 'Mahesa', 'Laki - laki', 'South Tangerang', 4, 1),
(2, 'Nabilla', 'Perempuan', 'West Jakarta', 1, 4),
(3, 'Fiona', 'Perempuan', 'Ngawi', 2, 5),
(4, 'Adi', 'Laki-laki', 'Nganjuk', 3, 1),
(5, 'Mario', 'Laki-laki', 'Karawang', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `kode_asuransi` int(10) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  `nip` int(10) NOT NULL,
  `no_polis` int(10) NOT NULL,
  `nominal_bayar` varchar(45) NOT NULL,
  `tanggal_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `kode_asuransi`, `id_nasabah`, `nip`, `no_polis`, `nominal_bayar`, `tanggal_pembayaran`) VALUES
(1, 1, 1, 1, 1, '200000', '2022-12-16'),
(2, 2, 2, 2, 2, '240000', '2022-12-17'),
(3, 3, 3, 3, 3, '350000', '2022-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` int(10) NOT NULL,
  `nama_petugas` varchar(45) NOT NULL,
  `jenis_kelamin_p` varchar(45) NOT NULL,
  `alamat_p` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama_petugas`, `jenis_kelamin_p`, `alamat_p`) VALUES
(1, 'Ganjar', 'Laki - laki', 'Cianjur'),
(2, 'Luhut', 'Laki - laki', 'West Cibaduyut'),
(3, 'Fuan', 'Perempuan', 'Depok'),
(4, 'Johny', 'Laki - laki', 'Tangerang'),
(5, 'Magewati', 'Perempuan', 'Cibaduyut');

-- --------------------------------------------------------

--
-- Table structure for table `polis`
--

CREATE TABLE `polis` (
  `no_polis` int(10) NOT NULL,
  `jenis_polis` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polis`
--

INSERT INTO `polis` (`no_polis`, `jenis_polis`) VALUES
(1, 'Asuransi Mobil'),
(2, 'Asuransi Jiwa'),
(3, 'Asuransi Rumah'),
(4, 'Asuransi Laptop'),
(5, 'Asuransi Jabatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_asuransi`
--

CREATE TABLE `tb_asuransi` (
  `kode_asuransi` int(10) NOT NULL,
  `jenis_asuransi` varchar(45) NOT NULL,
  `jangka_waktu` date NOT NULL,
  `biaya_asuransi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_asuransi`
--

INSERT INTO `tb_asuransi` (`kode_asuransi`, `jenis_asuransi`, `jangka_waktu`, `biaya_asuransi`) VALUES
(1, 'Jiwa', '2022-12-15', 1500000),
(2, 'Perjalanan', '2022-12-16', 300000),
(3, 'Jaminan Hari Tua', '2022-12-22', 250000),
(4, 'Kesehatan', '2022-12-28', 400000),
(5, 'Pendidikan', '2022-12-03', 600000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`),
  ADD KEY `petugas_nip` (`nip`),
  ADD KEY `polis_no_polis` (`no_polis`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `asuransi_kode_asuransi` (`kode_asuransi`,`id_nasabah`,`nip`,`no_polis`),
  ADD KEY `nasabah_id_nasabah` (`id_nasabah`),
  ADD KEY `nip` (`nip`),
  ADD KEY `no_polis` (`no_polis`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `polis`
--
ALTER TABLE `polis`
  ADD PRIMARY KEY (`no_polis`);

--
-- Indexes for table `tb_asuransi`
--
ALTER TABLE `tb_asuransi`
  ADD PRIMARY KEY (`kode_asuransi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `nip` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11117;

--
-- AUTO_INCREMENT for table `polis`
--
ALTER TABLE `polis`
  MODIFY `no_polis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `tb_asuransi`
--
ALTER TABLE `tb_asuransi`
  MODIFY `kode_asuransi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD CONSTRAINT `nasabah_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nasabah_ibfk_2` FOREIGN KEY (`no_polis`) REFERENCES `polis` (`no_polis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`kode_asuransi`) REFERENCES `tb_asuransi` (`kode_asuransi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`no_polis`) REFERENCES `polis` (`no_polis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
