-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 01:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps-persediaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alpha`
--

CREATE TABLE `tbl_alpha` (
  `id_alpha` int(10) DEFAULT NULL,
  `alpha` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alpha`
--

INSERT INTO `tbl_alpha` (`id_alpha`, `alpha`) VALUES
(1, '0.50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangkeluar`
--

CREATE TABLE `tbl_barangkeluar` (
  `id_barangkeluar` int(11) NOT NULL,
  `id_databarang` int(11) NOT NULL,
  `jumlah_keluar` decimal(10,0) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barangkeluar`
--

INSERT INTO `tbl_barangkeluar` (`id_barangkeluar`, `id_databarang`, `jumlah_keluar`, `tanggal_keluar`) VALUES
(1, 18, '10', '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangmasuk`
--

CREATE TABLE `tbl_barangmasuk` (
  `id_barangmasuk` int(11) NOT NULL,
  `id_databarang` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah_masuk` decimal(10,0) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barangmasuk`
--

INSERT INTO `tbl_barangmasuk` (`id_barangmasuk`, `id_databarang`, `id_supplier`, `jumlah_masuk`, `tanggal_masuk`) VALUES
(14, 40, 1, '30000', '2019-06-30'),
(15, 10, 1, '20', '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_databarang`
--

CREATE TABLE `tbl_databarang` (
  `id_databarang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_barang` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_databarang`
--

INSERT INTO `tbl_databarang` (`id_databarang`, `nama_barang`, `jenis`, `satuan`, `harga_beli`, `harga_jual`, `jumlah_barang`) VALUES
(10, 'Begendit Gajah', 'Bibit Padi', 'kg', 9600, 11000, '0'),
(11, 'Inpari 42', 'Bibit Padi', 'kg', 10300, 11500, '0'),
(12, 'Inpari 32', 'Bibit Padi', 'kg', 10500, 12000, '0'),
(13, 'IR 64 BS', 'Bibit Padi', 'kg', 11000, 12000, '0'),
(14, 'Logawa BS', 'Bibit Padi', 'kg', 10000, 11500, '0'),
(15, 'Mekongga BS', 'Bibit Padi', 'kg', 10500, 12000, '0'),
(16, 'Mekongga Ellytani', 'Bibit Padi', 'kg', 11500, 12000, '0'),
(17, 'Mekongga Gajah', 'Bibit Padi', 'kg', 9600, 11000, '0'),
(18, 'Situ Begendit BS', 'Bibit Padi', 'kg', 10500, 12000, '0'),
(19, 'Situ Begendit Ellytani', 'Bibit Padi', 'kg', 11500, 12000, '0'),
(20, 'Bisi 18', 'Bibit Jagung', 'kg', 7200, 7500, '0'),
(21, 'Bisi 226', 'Bibit Jagung', 'kg', 5400, 6000, '0'),
(22, 'Bisi 77', 'Bibit Jagung', 'kg', 7300, 8750, '0'),
(23, 'Bisi 99', 'Bibit Jagung', 'kg', 8500, 9000, '0'),
(24, 'Cherang BS', 'Bibit Jagung', 'kg', 10500, 12000, '0'),
(25, 'Cherang Ellytani', 'Bibit Jagung', 'kg', 11500, 12000, '0'),
(26, 'Cherang Gajah', 'Bibit Jagung', 'kg', 9600, 11000, '0'),
(27, 'NK 007', 'Bibit Jagung', 'kg', 7200, 7500, '0'),
(28, 'NK 212', 'Bibit Jagung', 'kg', 6900, 7500, '0'),
(29, 'NK Sumo', 'Bibit Jagung', 'kg', 9500, 10000, '0'),
(30, 'Abacel 100ml', 'Obat', 'ml', 29500, 32000, '0'),
(31, 'Abacel 250ml', 'Obat', 'ml', 87000, 89000, '0'),
(32, 'Beet-Up 100ml', 'Obat', 'ml', 52500, 55000, '0'),
(33, 'Bentan 60 Wp 100g', 'Obat', 'gr', 46000, 47500, '0'),
(34, 'Mexdon 50ml', 'Obat', 'ml', 65000, 66500, '0'),
(35, 'Nativo 12.5g', 'Obat', 'gr', 15500, 18000, '0'),
(36, 'Roundup 1L', 'Obat', 'lt', 72000, 74000, '0'),
(37, 'Roundup 200ml', 'Obat', 'ml', 17000, 19000, '0'),
(38, 'Score 80ml', 'Obat', 'ml', 52000, 54000, '0'),
(39, 'Sidametrin 400ml', 'Obat', 'ml', 29000, 33000, '0'),
(40, 'Phonska', 'Pupuk', 'kg', 5000, 6000, '0'),
(41, 'NPK Kebo Mas', 'Pupuk', 'kg', 6000, 8000, '0'),
(42, 'NPK LS', 'Pupuk', 'kg', 10000, 15000, '0'),
(43, 'NPK Pelangi 20,10,10', 'Pupuk', 'kg', 6900, 8000, '0'),
(44, 'NPK Pelangi 16,16,16', 'Pupuk', 'kg', 7850, 9000, '0'),
(45, 'ccc', 'Bibit Padi', 'kg', 10000, 12000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hitung`
--

CREATE TABLE `tbl_hitung` (
  `id_hitung` int(11) NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `s_aksen` double(50,7) DEFAULT NULL,
  `s_2aksen` double(50,7) DEFAULT NULL,
  `at` double(50,7) DEFAULT NULL,
  `bt` double(50,7) DEFAULT NULL,
  `ft` double(50,7) DEFAULT NULL,
  `xt_min_ft` double(50,7) DEFAULT NULL,
  `abs_xt_min_ft_bagi_xt` double(50,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hitung`
--

INSERT INTO `tbl_hitung` (`id_hitung`, `id_penjualan`, `s_aksen`, `s_2aksen`, `at`, `bt`, `ft`, `xt_min_ft`, `abs_xt_min_ft_bagi_xt`) VALUES
(415, 1, 3432.0000000, 3432.0000000, 3432.0000000, 0.0000000, 0.0000000, 0.0000000, 0.0000000),
(416, 2, 3598.5000000, 3515.2500000, 3681.7500000, 83.2500000, 3765.0000000, 0.0000000, 0.0000000),
(417, 3, 3739.2500000, 3627.2500000, 3851.2500000, 112.0000000, 3963.2500000, -83.2500000, 0.0214562),
(418, 4, 3698.1250000, 3662.6875000, 3733.5625000, 35.4375000, 3769.0000000, -112.0000000, 0.0306262),
(419, 5, 3605.5625000, 3634.1250000, 3577.0000000, -28.5625000, 3548.4375000, -35.4375000, 0.0100875),
(420, 6, 3886.7812500, 3760.4531250, 4013.1093750, 126.3281250, 4139.4375000, 28.5625000, 0.0068528),
(421, 7, 4143.8906250, 3952.1718750, 4335.6093750, 191.7187500, 4527.3281250, -126.3281250, 0.0287044),
(422, 8, 4226.9453125, 4089.5585938, 4364.3320312, 137.3867188, 4501.7187500, -191.7187500, 0.0444823),
(423, 9, 4180.9726562, 4135.2656250, 4226.6796875, 45.7070312, 4272.3867188, -137.3867188, 0.0332253),
(424, 10, 4528.9863281, 4332.1259766, 4725.8466797, 196.8603516, 4922.7070312, -45.7070312, 0.0093720),
(425, 11, 4717.4931641, 4524.8095703, 4910.1767578, 192.6835938, 5102.8603516, -196.8603516, 0.0401264),
(426, 12, 4724.2465820, 4624.5280762, 4823.9650879, 99.7185059, 4923.6835938, -192.6835938, 0.0407279),
(427, 13, 4552.1232910, 4588.3256836, 4515.9208984, -36.2023926, 4479.7185059, -99.7185059, 0.0227668),
(428, 14, 4544.5616455, 4566.4436646, 4522.6796265, -21.8820190, 4500.7976074, 36.2023926, 0.0079794),
(429, 15, 4666.2808228, 4616.3622437, 4716.1994019, 49.9185791, 4766.1179810, 21.8820190, 0.0045702),
(430, 16, 4634.1404114, 4625.2513275, 4643.0294952, 8.8890839, 4651.9185791, -49.9185791, 0.0108471),
(431, 17, 4810.0702057, 4717.6607666, 4902.4796448, 92.4094391, 4994.8890839, -8.8890839, 0.0017828),
(432, 18, 5038.5351028, 4878.0979347, 5198.9722710, 160.4371681, 5359.4094391, -92.4094391, 0.0175450),
(433, 19, 5209.2675514, 5043.6827431, 5374.8523598, 165.5848083, 5540.4371681, -160.4371681, 0.0298210),
(434, 20, 5110.6337757, 5077.1582594, 5144.1092920, 33.4755163, 5177.5848083, -165.5848083, 0.0330377),
(435, 21, 4961.8168879, 5019.4875736, 4904.1462021, -57.6706858, 4846.4755163, -33.4755163, 0.0069552),
(436, 22, 5217.9084439, 5118.6980088, 5317.1188791, 99.2104352, 5416.3293142, 57.6706858, 0.0105354),
(437, 23, 5421.4542220, 5270.0761154, 5572.8323286, 151.3781066, 5724.2104352, -99.2104352, 0.0176374),
(438, 24, 5332.7271110, 5301.4016132, 5364.0526088, 31.3254978, 5395.3781066, -151.3781066, 0.0288669),
(439, 25, 5212.3635555, 5256.8825843, 5167.8445266, -44.5190288, 5123.3254978, -31.3254978, 0.0061519),
(440, 26, 5462.6817777, 5359.7821810, 5565.5813745, 102.8995967, 5668.4809712, 44.5190288, 0.0077926),
(441, 27, 5680.8408889, 5520.3115350, 5841.3702428, 160.5293539, 6001.8995967, -102.8995967, 0.0174436),
(442, 28, 5966.9204444, 5743.6159897, 6190.2248992, 223.3044547, 6413.5293539, -160.5293539, 0.0256724),
(443, 29, 5555.4602222, 5649.5381060, 5461.3823385, -94.0778837, 5367.3044547, -223.3044547, 0.0434107),
(444, 30, 5432.2301111, 5540.8841085, 5323.5761137, -108.6539974, 5214.9221163, 94.0778837, 0.0177205);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_databarang` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah_penjualan` double(20,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `id_databarang`, `bulan`, `tahun`, `jumlah_penjualan`) VALUES
(1, 40, 1, 2019, 3432.00000),
(2, 40, 2, 2019, 3765.00000),
(3, 40, 3, 2019, 3880.00000),
(4, 40, 4, 2019, 3657.00000),
(5, 40, 5, 2019, 3513.00000),
(6, 40, 6, 2019, 4168.00000),
(7, 40, 7, 2020, 4401.00000),
(8, 40, 8, 2020, 4310.00000),
(9, 40, 9, 2020, 4135.00000),
(10, 40, 10, 2020, 4877.00000),
(11, 40, 11, 2020, 4906.00000),
(12, 40, 12, 2020, 4731.00000),
(13, 40, 13, 2020, 4380.00000),
(14, 40, 14, 2020, 4537.00000),
(15, 40, 15, 2020, 4788.00000),
(16, 40, 16, 2020, 4602.00000),
(17, 40, 17, 2020, 4986.00000),
(18, 40, 18, 2020, 5267.00000),
(19, 40, 19, 2021, 5380.00000),
(20, 40, 20, 2021, 5012.00000),
(21, 40, 21, 2021, 4813.00000),
(22, 40, 22, 2021, 5474.00000),
(23, 40, 23, 2021, 5625.00000),
(24, 40, 24, 2021, 5244.00000),
(25, 40, 25, 2021, 5092.00000),
(26, 40, 26, 2021, 5713.00000),
(27, 40, 27, 2021, 5899.00000),
(28, 40, 28, 2021, 6253.00000),
(29, 40, 29, 2021, 5144.00000),
(30, 40, 30, 2021, 5309.00000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ramal_masadepan`
--

CREATE TABLE `tbl_ramal_masadepan` (
  `id_ramal_masadepan` int(11) NOT NULL,
  `id_databarang` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `jumlah_penjualan` double(20,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ramal_masadepan`
--

INSERT INTO `tbl_ramal_masadepan` (`id_ramal_masadepan`, `id_databarang`, `tahun`, `bulan`, `jumlah_penjualan`) VALUES
(80, 40, 2022, 1, 5215.000),
(81, 40, 2022, 2, 5107.000),
(82, 40, 2022, 3, 4999.000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `nomor_hp`) VALUES
(1, 'supplier 1', 'alamat supplier 1', '000000000001'),
(2, 'supplier 2', 'alamat supplier 2', '000000000002'),
(4, 'supplier 3', 'alamat supplier 3', '000000000003'),
(5, 'supplier 4', 'alamat supplier 4', '000000000004'),
(6, 'supplier 5', 'alamat supplier 5', '000000000005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(5, 'manajer', '69b731ea8f289cf16a192ce78a37b4f0'),
(6, 'operator', '4b583376b2767b923c3e1da60d10de59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barangkeluar`
--
ALTER TABLE `tbl_barangkeluar`
  ADD PRIMARY KEY (`id_barangkeluar`),
  ADD KEY `id_databarang` (`id_databarang`);

--
-- Indexes for table `tbl_barangmasuk`
--
ALTER TABLE `tbl_barangmasuk`
  ADD PRIMARY KEY (`id_barangmasuk`),
  ADD KEY `id_databarang` (`id_databarang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tbl_databarang`
--
ALTER TABLE `tbl_databarang`
  ADD PRIMARY KEY (`id_databarang`);

--
-- Indexes for table `tbl_hitung`
--
ALTER TABLE `tbl_hitung`
  ADD PRIMARY KEY (`id_hitung`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_databarang` (`id_databarang`);

--
-- Indexes for table `tbl_ramal_masadepan`
--
ALTER TABLE `tbl_ramal_masadepan`
  ADD PRIMARY KEY (`id_ramal_masadepan`),
  ADD KEY `id_databarang` (`id_databarang`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barangkeluar`
--
ALTER TABLE `tbl_barangkeluar`
  MODIFY `id_barangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_barangmasuk`
--
ALTER TABLE `tbl_barangmasuk`
  MODIFY `id_barangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_databarang`
--
ALTER TABLE `tbl_databarang`
  MODIFY `id_databarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tbl_hitung`
--
ALTER TABLE `tbl_hitung`
  MODIFY `id_hitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;
--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_ramal_masadepan`
--
ALTER TABLE `tbl_ramal_masadepan`
  MODIFY `id_ramal_masadepan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barangkeluar`
--
ALTER TABLE `tbl_barangkeluar`
  ADD CONSTRAINT `tbl_barangkeluar_ibfk_1` FOREIGN KEY (`id_databarang`) REFERENCES `tbl_databarang` (`id_databarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_barangmasuk`
--
ALTER TABLE `tbl_barangmasuk`
  ADD CONSTRAINT `tbl_barangmasuk_ibfk_1` FOREIGN KEY (`id_databarang`) REFERENCES `tbl_databarang` (`id_databarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barangmasuk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_hitung`
--
ALTER TABLE `tbl_hitung`
  ADD CONSTRAINT `tbl_hitung_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `tbl_penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD CONSTRAINT `tbl_penjualan_ibfk_1` FOREIGN KEY (`id_databarang`) REFERENCES `tbl_databarang` (`id_databarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ramal_masadepan`
--
ALTER TABLE `tbl_ramal_masadepan`
  ADD CONSTRAINT `tbl_ramal_masadepan_ibfk_1` FOREIGN KEY (`id_databarang`) REFERENCES `tbl_databarang` (`id_databarang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
