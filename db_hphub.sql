-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 01:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hphub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'muhrohman', '123', 'Muhammad Rohman Irsyadi'),
(2, 'zakymaulana363@gmail.com', 'root', 'M. Zaky Pria Maulana');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Sidoarjo', 7000),
(2, 'Mojokerto', 15000),
(3, 'Surabaya', 4000),
(4, 'Malang', 35000),
(5, 'Kediri', 35000),
(6, 'Jember', 35000),
(7, 'Banyuwangi', 35000),
(8, 'Bondowoso', 35000),
(9, 'Situbondo', 35000),
(10, 'Probolinggo', 35000),
(11, 'Pasuruan', 35000),
(12, 'Sidoarjo', 35000),
(13, 'Mojokerto', 35000),
(14, 'Jombang', 35000),
(15, 'Nganjuk', 35000),
(16, 'Madiun', 35000),
(17, 'Magetan', 35000),
(18, 'Ponorogo', 35000),
(19, 'Tulungagung', 35000),
(20, 'Blitar', 35000),
(21, 'Lumajang', 35000),
(22, 'Pacitan', 35000),
(23, 'Trenggalek', 35000),
(24, 'Bojonegoro', 35000),
(25, 'Tuban', 35000),
(26, 'Lamongan', 35000),
(27, 'Gresik', 35000),
(28, 'Bangkalan', 35000),
(29, 'Sampang', 35000),
(30, 'Pamekasan', 35000),
(31, 'Sumenep', 35000),
(32, 'Aceh Besar', 95000),
(33, 'Aceh Jaya', 95000),
(34, 'Aceh Utara', 95000),
(35, 'Bireuen', 95000),
(36, 'Pidie', 95000),
(37, 'Simeulue', 95000),
(38, 'Singkil', 95000),
(39, 'Banyuasin', 75000),
(40, 'Musi Banyuasin', 75000),
(41, 'Ogan Komering Ilir', 75000),
(42, 'Ogan Komering Ulu', 75000),
(43, 'Lampung Barat', 65000),
(44, 'Lampung Selatan', 65000),
(45, 'Lampung Tengah', 65000),
(46, 'Lampung Timur', 65000),
(47, 'Lampung Utara', 65000),
(48, 'Badung', 35000),
(49, 'Buleleng', 35000),
(50, 'Gianyar', 35000),
(51, 'Tabanan', 35000),
(52, 'Lombok Barat', 30000),
(53, 'Lombok Tengah', 30000),
(54, 'Lombok Timur', 30000),
(55, 'Sumbawa', 30000),
(56, 'Sumbawa Barat', 30000),
(57, 'Sabang', 100000),
(58, 'Banda Aceh', 95000),
(59, 'Medan', 90000),
(60, 'Padang', 85000),
(61, 'Pekanbaru', 80000),
(62, 'Palembang', 75000),
(63, 'Bengkulu', 70000),
(64, 'Bandar Lampung', 65000),
(65, 'Jakarta', 60000),
(66, 'Bandung', 55000),
(67, 'Semarang', 50000),
(68, 'Yogyakarta', 45000),
(70, 'Denpasar', 35000),
(71, 'Mataram', 30000),
(72, 'Kupang', 25000),
(73, 'Makassar', 20000),
(74, 'Palu', 15000),
(75, 'Manado', 10000),
(76, 'Gorontalo', 5000),
(77, 'Ambon', 2500),
(78, 'Ternate', 1250),
(79, 'Jayapura', 625),
(80, 'Merauke', 313);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `telepon_pelanggan` varchar(255) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `admin_id`) VALUES
(5, 'cahyonomanggrai@gmail.com', '123', 'Cahyono Manggarai', '087263527181', NULL),
(6, 'nailaputri@gmail.com', '123', 'Naila Putri', '085347261827', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(8, 43, 'Cahyono Manggrai', 'BCA', 3434000, '2024-06-27', '20240627130154contohgambar.jpg'),
(9, 44, 'Cahyono Manggrai', 'BCA', 14003999, '2024-06-27', '20240627130422contohgambar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(255) NOT NULL DEFAULT 'MENUNGGU PEMBAYARAN',
  `resi_pengiriman` varchar(255) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `admin_id`) VALUES
(44, 5, 3, '2024-06-27', 14003999, 'Surabaya', 4000, 'Jalan Soekarno Hatta No. 85 23254', 'Pembelian Sukses', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah_produk`, `nama`, `harga`, `kelas`, `subharga`) VALUES
(52, 44, 14, 1, 'Apple iPhone XR', 13999999, 'High End', 13999999);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `kelas_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `kelas_produk`, `foto_produk`, `deskripsi_produk`, `admin_id`) VALUES
(14, 'Apple iPhone XR', 13999999, 'High End', 'iphone xr.jpg', 'Gaming, Produktif', NULL),
(16, 'Apple iPhone 15', 14249000, 'High End', 'iPhone15-Pink_01.webp', 'Productive, Gaming', NULL),
(17, 'Apple iPhone 15 Pro', 18999000, 'High End', 'iphone 15 pro.jpg', 'Productive, Gaming', NULL),
(18, 'OPPO Reno11 F 5G', 4599000, 'Mid End', 'OPPO Reno11 F 5G.webp', 'Style, Selfie', NULL),
(19, 'Redmi Note 12', 1899000, 'Low End', 'redmi note 12pro.png', 'Basic Smartphone', NULL),
(20, 'Realme C53', 1999000, 'Low End', 'realme c53.webp', 'Basic Smartphone', NULL),
(21, 'INFINIX GT 10 PRO 5G', 3399000, 'Mid End', 'Infinix GT 10 Pro 5G .png', 'Gaming, Expert Camera', NULL),
(22, 'OPPO A58', 2499000, 'Mid End', 'OPPO A58 2-500x500.png', 'Selfie Expert, Beauty', NULL),
(23, 'VIVO V29', 2500000, 'Mid End', 'vivo-V29-5G-APS.jpg', 'Gaming', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `fk_pelanggan_admin` (`admin_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `fk_pem_pel` (`id_pelanggan`),
  ADD KEY `fk_pem_ong` (`id_ongkir`),
  ADD KEY `fk_pembelian_admin` (`admin_id`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `fk_pp_pemb` (`id_pembelian`),
  ADD KEY `fk_pp_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_admin` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `fk_pelanggan_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pem_ong` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`),
  ADD CONSTRAINT `fk_pem_pel` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `fk_pembelian_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL;

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `fk_pp_pemb` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`),
  ADD CONSTRAINT `fk_pp_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
