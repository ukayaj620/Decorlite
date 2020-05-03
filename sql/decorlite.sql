-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 02:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `decorlite`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CartId` varchar(30) NOT NULL,
  `userId` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `catagoryId` varchar(30) NOT NULL,
  `catagoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`catagoryId`, `catagoryName`) VALUES
('CT-ALT', 'Alat'),
('CT-BLN', 'Balon'),
('CT-BNR', 'Banner'),
('CT-KTS', 'kertas'),
('CT-LLN', 'Lilin'),
('CT-SLN', 'Slinger'),
('CT-STK', 'Sticker');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `userId` varchar(30) NOT NULL,
  `userPayment` int(16) NOT NULL,
  `timePayment` varchar(50) NOT NULL,
  `CartID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemId` varchar(30) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemDescription` varchar(255) NOT NULL,
  `itemPrice` int(16) NOT NULL,
  `itemStock` int(11) NOT NULL,
  `catagoryId` varchar(30) NOT NULL,
  `itemImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `itemName`, `itemDescription`, `itemPrice`, `itemStock`, `catagoryId`, `itemImage`) VALUES
('ALT-0333', 'Party Popper', 'Mari meriah kan setiap momen yg berbahagia anda dengan Party Popper ini!!!\r\nParty Popper berisi kertas kecil warna warni!\r\nCara pemakaian sangat mudah!! cukup diputar mengikuti arah anak panah pada popper.\r\n\r\nDimensi Produk:\r\nTinggi : 28cm\r\nDiameter : 5cm', 21000, 88, 'CT-ALT', 'img/Decorlite/party popper.jpg'),
('ALT-0666', 'Crazy String', 'tersedia warna merah, kuning, hijau, biru, putih, ungu', 23000, 45, 'CT-ALT', 'img/Decorlite/grazy string.PNG'),
('BLN-0101', 'balon foil bunga', '- ukuran 40cm\r\n- tersedia 5 warna : Pink, Ungu, Merah, Biru, Emas\r\n- mudah ditiup dan self sealed', 20000, 30, 'CT-BLN', 'img/Decorlite/balon foil bunga.jpg'),
('BLN-0111', 'balon foil bucket bunga', 'Balon foil buket bunga\r\nTinggi balon 60 cm\r\nDiameter 41 cm.', 6000, 50, 'CT-BLN', 'img/Decorlite/balon foil bucket bunga.jpg'),
('BLN-0222', 'balon latex pastel macaron mix isi 100 pcs', 'Warna mix / campuran\r\nUkuran 12 inci (30cm)\r\nHelium quality', 186000, 15, 'CT-BLN', 'img/Decorlite/balon pastel latex.jpg'),
('BLN-0246', 'balon foil angka', 'Balon Huruf/Angka\r\nUkuran : 40cm\r\nHuruf : A-Z\r\nAngka : 0-9\r\nWarna : Gold, Silver, Biru, Pink\r\n( HARGA YANG TERTERA UNTUK 1pcs/1 balon !!! )\r\n( TIDAK ADA MINIMAL PEMBELIAN )', 3000, 3000, 'CT-BLN', 'img/Decorlite/balon foil angka.jpg'),
('BLN-0255', 'Balon LED', 'Barang-barang yang anda dapat dalam kotak produk:\r\n5 x Balon Ulang Tahun Menyala Dengan LED Light.', 25000, 66, 'CT-BLN', 'img/Decorlite/balon led.jpg'),
('BLN-0303', 'Balon foil cake', 'ukuran 40 cm\r\n1. Rainbow\r\n2. Cup Cake\r\n3. Candy\r\n4. Cake Pink\r\n5. Cake Coklat', 10000, 120, 'CT-BLN', 'img/Decorlite/balon foil cake.jpg'),
('BLN-0404', 'balon foil huruf gold', 'Harga tersebut adalah HARGA PER PCS\r\nWarna (Gold, Silver, Pink, Biru).\r\nUk 40cm', 3000, 360, 'CT-BLN', 'img/Decorlite/balon foil huruf gold.jpg'),
('BLN-0500', 'balon latex pentil twist', 'Balon Panjang / Pentil / Twist / Magic / Cacing (warna Campur) \r\n(BALON DIKIRIM DALAM KEADAAN BELUM DIBENTUK)\r\nDapat dibentuk macam\".\r\nbisa ditiup menggunakan pompa balon.\r\nWarna : Campur, tidak bisa pilih.', 2000, 1500, 'CT-BLN', 'img/Decorlite/balon latex pentil twist.jpg'),
('BLN-0555', 'balon latex smile', 'Balon latex smile\r\nUk : 12 inch ( 30 cm )\r\nBahan : natural latex, helium quality\r\nWarna : random ( tdk bisa pilih )', 3000, 600, 'CT-BLN', 'img/Decorlite/balon latex smile.jpg'),
('BLN-0666', 'balon foil love & star', 'Balon Foil Love warna merah, biru, gold, silver, pink muda, ungu\r\nBalon Foil Star warna merah, biru, gold, silver, pink', 4000, 330, 'CT-BLN', 'img/Decorlite/balon foil love & star.jpg'),
('BLN-0690', 'Balon Bobo LED PVC', 'Balon ini dapat dipakai diberbagai acara sesuai dengan keinginan anda, dengan lampu-lampu yang indah dapat mempercantik acara anda. ', 30000, 12, 'CT-BLN', 'img/Decorlite/Balon Bobo LED PVC.jpg'),
('BLN-0888', 'Balon Latex Polkadot 100pcs', '-Hijau titik putih\r\n-Hitam titik putih\r\n-Biru titik putih\r\n-Pink titik putih\r\n-Merah titik putih\r\n-Orange titik putih\r\n-Kuning titik putih\r\n-Putih titik hitam\r\n-Putih titik merah\r\n-Putih titik campur atau random', 213000, 10, 'CT-BLN', 'img/Decorlite/balon polkadot latex.jpg'),
('BLN-9789', 'balon chrome metalik', '5pcs balon chrome gold\r\n5pcs balon chrome silver\r\n5pcs balon doff hitam', 50000, 200, 'CT-BLN', 'img/Decorlite/balon chrome metalik.jpg'),
('BNR-0055', 'Bendera polkadot', 'Tersedia  8 warna : Biru, Hitam, Kuning, Merah, Kuning, Pink, Hijau, Ungu, Coklat', 16000, 65, 'CT-BNR', 'img/Decorlite/bendera polkadot.png'),
('BNR-0878', 'Banner Ulang Tahun Pink Tulisan Gold', 'Harga sudah 1 set sudah isi 13 lembar hruf dan tali pita. Ready banner / bunting flag 1 set sudah termasuk tali Untuk pembelian banner lainnya dapat dilihat di etalase: /reawstore/etalase/banner-flag-bunting-flag', 20000, 77, 'CT-BNR', 'img/Decorlite/banner ulang tahun.jpg'),
('KTS-0201', 'Tissue Paper Tassel Garland', '20 pcs\r\n\r\nhanya  Tissue paper tassel garland nya saja. \r\ntidak  termasuk banner balon dll\r\n\r\nTali Rami : 4,2 meter', 22000, 33, 'CT-KTS', 'img/Decorlite/Tissue Paper Tassel Garland.jpg'),
('KTS-0331', 'kertas pompom', 'diameter : 30 cm\r\nbahan : tissue paper nonwoven\r\nkelebihan : tahan lembab, tidak mudah robek, bisa untuk pemakaian berulang\r\nWarna yang tersedia: Nila, Putih', 15000, 700, 'CT-KTS', 'img/Decorlite/kertas pompom.jpg'),
('KTS-0332', 'Kertas Krep', 'Merek : biola\r\nWarna : Pink Tua, Merah, Putih, Biru Benhur, hijau tua, ungu tua, kuning tua, pink muda, biru tua, orange, hijau muda, biru langit, kuning muda, ungu muda, hitam.\r\nMerk : Biola\r\nLuas : 108 cm x 60 cm', 2200, 1550, 'CT-KTS', 'img/Decorlite/kertas krep.jpg'),
('KTS-0333', 'Kertas krep kerut', 'Kertas krep kerut\r\n1pax isi 1pcs\r\npanjang +- 3m\r\nwarna random, tidak bisa pilih', 3000, 500, 'CT-KTS', 'img/Decorlite/Kertas Krep Kerut.jpg'),
('KTS-0334', 'Tirai Foil', 'Tersedia warna : Gold, Silver, Merah, Pink, Hijau, Putih, Hitam', 24000, 400, 'CT-KTS', 'img/Decorlite/tirai foil.png'),
('KTS-0666', 'Curtain Foil Chrome Doff', 'Ukuran lebar 1 meter\r\nTinggi 2 meter', 12500, 800, 'CT-KTS', 'img/Decorlite/Curtain Foil Chrome Doff.jpg'),
('LLN-0123', 'Lampu Lilin LED', 'Meterial: Plastik \r\nUkuran : Tinggi : 4.5cm dan Diameter 3.7cm,\r\nBerat: 20 gr \r\n\r\nLilin elektrik tanpa api (bukan sensor tiup/tepuk)\r\nDengan tombol ON/OFF\r\nMenggunakan power 2 battery kancing LR1130 (sudah termasuk )', 5500, 125, 'CT-LLN', 'img/Decorlite/lampu lilin led.jpg'),
('LLN-0321', 'Lilin Ulang Tahun Gold', 'Lilin ini sangat cocok digunakan untuk membuat pesta ulang tahun menjadi lebih meriah.', 74000, 32, 'CT-LLN', 'img/Decorlite/Lilin Ulang Tahun Gold.jpg'),
('SLN-0054', 'Slinger Panjang', 'Tersedia Warna :\r\n-gold\r\n-biru gold\r\n-merah gold\r\n-putih gold\r\n-pink gold\r\n-hijau gold\r\n', 9500, 135, 'CT-SLN', 'img/Decorlite/slinger panjang.jpg'),
('STK-0015', 'Wall Sticker 60x90 Transparan Spring Trees', '# Terbuat dari bahan Pearl Film (PVC) yang mengkilat dan tahan air.\r\n# Dapat dilepas dan ditempel lagi tanpa merusak cat atau mengelupas temboknya.\r\n# Ukuran : XL (60 x 90)cm sebelum dipasang.', 36000, 20, 'CT-STK', 'img/Decorlite/WALL STICKER 60X90 TRANSPARAN SPRING TREES.jpg'),
('STK-0255', 'Animal Bridge Sticker Wall', 'Stiker dinding untuk mempercantik sebagian dinding,\r\nbukan untuk menutupi keseluruhan dinding\r\n\r\n# Terbuat dari bahan Pearl Film (PVC) yang mengkilat dan tahan air.\r\n# Perekat tahan lama.\r\n# Ukuran : XL (60 x 90)cm sebelum dipasang.', 25000, 25, 'CT-STK', 'img/decorlite/Animal Bridge Sticker Wall.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `CartID` varchar(30) NOT NULL,
  `ItemID` varchar(30) NOT NULL,
  `JumalahBarang` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` varchar(30) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`CartId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`catagoryId`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD KEY `userId` (`userId`),
  ADD KEY `CartID` (`CartID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `catagoryId` (`catagoryId`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `CartID` (`CartID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`CartID`) REFERENCES `carts` (`CartId`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`catagoryId`) REFERENCES `catagories` (`catagoryId`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`CartID`) REFERENCES `carts` (`CartId`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `items` (`itemId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
