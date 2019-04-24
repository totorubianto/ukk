-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 24, 2019 at 10:49 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kota`
--

CREATE TABLE `daftar_kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kode_kota` varchar(10) NOT NULL,
  `bandara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_kota`
--

INSERT INTO `daftar_kota` (`id_kota`, `nama_kota`, `kode_kota`, `bandara`) VALUES
(1, 'Jakarta', 'JKT', 'Soekarno Hatta'),
(2, 'Bali', 'BALI', 'I gusti Ngurah Rai'),
(3, 'Semarang', 'SMG', 'Achmad Yani'),
(4, 'Bandung', 'BDO', 'Husein Sastranegara'),
(5, 'Surabaya', 'SBY', 'Juanda'),
(6, 'Cirebon', 'CBN', 'Penggung'),
(7, 'Malang', 'MLG', 'Abdul Rachman Saleh'),
(8, 'Surakarta', 'SOC', 'Adisumarmo'),
(9, 'Yogyakarta', 'JOG', 'Adisucipto'),
(10, 'Balikpapan', 'BPN', 'Sultan Aji Muhamad Sulaiman'),
(11, 'Banjarmasin', 'BDJ', 'Syamsudin Noor');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(30) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(30) NOT NULL,
  `kode_pemesanan` varchar(30) NOT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tempat_pemesanan` varchar(50) NOT NULL,
  `id_users` int(30) NOT NULL,
  `id_rute` int(30) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jam_cekin` time NOT NULL,
  `jam_berangkat` time NOT NULL,
  `total_bayar` int(30) NOT NULL,
  `status` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_pemesanan`, `tanggal_pemesanan`, `tempat_pemesanan`, `id_users`, `id_rute`, `tanggal_berangkat`, `jam_cekin`, `jam_berangkat`, `total_bayar`, `status`, `bukti`) VALUES
(1, 'ULUM292', '2019-04-24 07:42:59', 'Ekonomi', 1, 1, '2019-04-25', '00:00:00', '17:00:00', 4000000, 1, 'b000163e3375131aefc735fc1fa99398.png'),
(2, 'ULUM224', '2019-04-24 07:34:44', 'Ekonomi', 1, 1, '2019-04-25', '00:00:00', '17:00:00', 4000000, 0, ''),
(3, 'ULUM153', '2019-04-24 08:39:18', 'Eksekutif', 2, 3, '2019-04-25', '00:00:00', '09:30:00', 3500000, 0, '4dc85a6fb854dd0a4d37071f693a2998.png');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `nama_penumpang` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `kode_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `nama_penumpang`, `alamat`, `phone`, `email`, `gender`, `id_pemesanan`, `kode_kursi`) VALUES
(1, 'Toto Rubianto', 'Wangon', '087889966555', 'toto.rubianto.17@gmail.com', 1, 1, 1),
(2, 'Toifatul Ulum', 'Maos', '087889966555', 'toifatululum222@gmail.com', 0, 1, 2),
(3, 'Toto', 'Wangon', '087889966555', 'toto.rubianto.17@gmail.com', 1, 2, 3),
(4, 'ulum', 'maos', '089601390427', 'toiftululum222@gmail.com', 0, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `id_level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`) VALUES
(1, 'toto', 'toto', 'Toto Rubianto', 2),
(2, 'ulum', 'ulum', 'Toifatul ulum', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(30) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `rute_awal` int(50) NOT NULL,
  `rute_akhir` int(50) NOT NULL,
  `id_transportasi` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `tujuan`, `rute_awal`, `rute_akhir`, `id_transportasi`) VALUES
(1, '2', 1, 2, 1),
(2, '2', 1, 2, 2),
(3, '2', 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(30) NOT NULL,
  `kode` int(30) NOT NULL,
  `jumlah_kursi` int(20) NOT NULL,
  `id_type_transportasi` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `kode`, `jumlah_kursi`, `id_type_transportasi`) VALUES
(1, 5, 250, 1),
(2, 5, 200, 2),
(3, 5, 230, 3);

-- --------------------------------------------------------

--
-- Table structure for table `type_transportasi`
--

CREATE TABLE `type_transportasi` (
  `id_type_transportasi` int(30) NOT NULL,
  `nama_type` varchar(30) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `harga_transportasi` int(11) NOT NULL,
  `hari` date NOT NULL,
  `jam` time NOT NULL,
  `id_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_transportasi`
--

INSERT INTO `type_transportasi` (`id_type_transportasi`, `nama_type`, `keterangan`, `harga_transportasi`, `hari`, `jam`, `id_vendor`) VALUES
(1, 'Garuda Indonesia', 'Boeing', 4000000, '2019-04-25', '17:00:00', 2),
(2, 'Citilink', 'Boeing', 3500000, '2019-04-25', '07:00:00', 1),
(3, 'Lion Air', 'Boeing', 3500000, '2019-04-25', '09:30:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `telephon` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `nama_user`, `tanggal_lahir`, `no_identitas`, `gender`, `telephon`, `alamat`) VALUES
(1, 'toto', 'toto', 'toto', '2001-04-09', 330220, 'L', '087889966555', 'Jl. Jurangbahas Rt2 /1'),
(2, 'ulum', 'ulum', 'ulum', '2019-04-09', 1281, 'p', '087788277123', 'mrenek');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `img` varchar(2000) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `img`, `nama_vendor`) VALUES
(1, 'citilink.png', 'Citilink'),
(2, 'garudaburungq.png', 'Garuda Indonesia'),
(5, 'lionair.jpeg', 'Lion Air');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_kota`
--
ALTER TABLE `daftar_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pelanggan` (`id_users`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `id_transportasi` (`id_transportasi`),
  ADD KEY `rute_awal` (`rute_awal`),
  ADD KEY `rute_akhir` (`rute_akhir`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`),
  ADD KEY `id_type_transportasi` (`id_type_transportasi`);

--
-- Indexes for table `type_transportasi`
--
ALTER TABLE `type_transportasi`
  ADD PRIMARY KEY (`id_type_transportasi`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_kota`
--
ALTER TABLE `daftar_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_transportasi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_transportasi`
--
ALTER TABLE `type_transportasi`
  MODIFY `id_type_transportasi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`),
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD CONSTRAINT `penumpang_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`id_transportasi`) REFERENCES `transportasi` (`id_transportasi`),
  ADD CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`rute_awal`) REFERENCES `daftar_kota` (`id_kota`),
  ADD CONSTRAINT `rute_ibfk_3` FOREIGN KEY (`rute_akhir`) REFERENCES `daftar_kota` (`id_kota`);

--
-- Constraints for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD CONSTRAINT `transportasi_ibfk_1` FOREIGN KEY (`id_type_transportasi`) REFERENCES `type_transportasi` (`id_type_transportasi`);

--
-- Constraints for table `type_transportasi`
--
ALTER TABLE `type_transportasi`
  ADD CONSTRAINT `type_transportasi_ibfk_1` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`);
