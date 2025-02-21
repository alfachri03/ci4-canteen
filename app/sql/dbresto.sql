-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 03:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET GLOBAL time_zone = '+07:00';
SET @@global.time_zone = '+07:00';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` char(7) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `pass`, `is_admin`, `created_at`) VALUES
('an5EwKL', '123', 1, '2023-07-25 23:44:44'),
('default', '123', 1, '2023-07-25 23:27:24'),
('QNoIWP6', '123', 1, '2023-07-25 23:40:28'),
('S2YEaHc', '123', 1, '2023-07-26 00:00:20'),
('uRyHfZS', '123', 0, '2023-07-26 00:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `order_id` char(7) NOT NULL,
  `acc_id` char(7) NOT NULL,
  `product_id` char(7) NOT NULL,
  `product_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2023-07-07-134123', 'App\\Database\\Migrations\\Account', 'default', 'App', 1688738726, 1),
(6, '2023-07-07-134526', 'App\\Database\\Migrations\\Keranjang', 'default', 'App', 1688738726, 1),
(7, '2023-07-07-134934', 'App\\Database\\Migrations\\Pengguna', 'default', 'App', 1688738726, 1),
(8, '2023-07-07-135307', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1688738811, 2),
(9, '2023-07-07-135734', 'App\\Database\\Migrations\\Transaksi', 'default', 'App', 1688738811, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `acc_id` char(7) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` text DEFAULT NULL,
  `pict` varchar(250) NOT NULL DEFAULT 'profile-img.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`acc_id`, `name`, `email`, `phone`, `address`, `pict`) VALUES
('default', 'Muhammad Sahid Hikam', 'sahid@gmail.com', '0923123131421', 'Indonesia', 'profile-img.jpg'),
('QNoIWP6', 'Alan Wahyu', 'man@man', '1231231123', 'bogor', '4207.jpg'),
('an5EwKL', 'Ujang Miftahul', 'jang@jang', '1231231123', 'Indonesia', 'car2.png'),
('S2YEaHc', 'Fauzan Musyaffa', 'zan@zan', '08212121212', 'qwdqdads', 'bmw-png.png'),
('uRyHfZS', 'Pembeli1', 'pembeli1@mail', '123', '123', '651_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `type` varchar(10) NOT NULL,
  `product_id` varchar(7) NOT NULL,
  `name` varchar(250) NOT NULL,
  `desc` text NOT NULL,
  `price` int(5) NOT NULL,
  `pict` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`type`, `product_id`, `name`, `desc`, `price`, `pict`) VALUES
('minuman', '008HQJF', 'Teh Tarik Spesial', 'Teh tarik spesial dibuat dari daun pilihan berkualitas', 7000, 'Teh Tarik.jpe'),
('makanan', '3LTWNS7', 'Batagor Bumbu Spesial', 'Batagor dengan saus kacang spesial yang enak', 17000, 'batagor.jpg'),
('makanan', 'BKSMLBS', 'Bakso Malang Biasa', 'Bakso Malang Porsi Sedang dengan tambahan bihun', 13000, 'BaksoMalang.jpg'),
('makanan', 'BKWETAN', 'Bakwan Tahu Goreng', 'Bakwan tahu goreng renyah dan gurih', 15000, 'BakwanTahuGoreng.jpg'),
('minuman', 'ESDALDA', 'Es Dalgona', 'Minuman es krim kopi yang sedang tren', 18000, 'EsDagolna.jpg'),
('minuman', 'ESJERUK', 'Es Jeruk Segar', 'Es jeruk dengan rasa yang segar dan nikmat', 10000, 'EsJerukSegar.jpg'),
('minuman', 'ESLIMOH', 'Es Teh Limau Nipis', 'Es teh dengan perasan limau nipis yang menyegarkan', 10000, 'EsTehLimau.jpg'),
('makanan', 'GADOBET', 'Gado-Gado Betawi', 'Gado-gado khas Betawi dengan bumbu kacang pedas', 22000, 'GadoGado.jpg'),
('makanan', 'GADOK12', 'Gado-Gado Khas', 'Sayur-sayuran segar dengan bumbu kacang yang lezat', 20000, 'GadoGadoKhas.jpg'),
('makanan', 'I6O4RQ9', 'Siomay BandungBekasi', 'Siomay khas bandung dengan saus kacang yang lezat', 15000, 'somay.jpg'),
('minuman', 'JUSALPK', 'Jus Alpukat Kismis', 'Jus alpukat dengan campuran kismis manis', 16000, 'JusAlpukatKismis.jpg'),
('minuman', 'JUSMANG', 'Jus Mangga Segar', 'Jus mangga dengan rasa manis dan segar', 15000, 'JusMangga.jpg'),
('minuman', 'JUSMIX1', 'Jus Campuran', 'Jus segar dengan campuran berbagai buah pilihan', 15000, 'JusCampuran.jpg'),
('minuman', 'KOPIKRE', 'Kopi Kreasi', 'Kopi dengan paduan rasa unik dan aroma yang khas', 18000, 'KopiKreasi.jpg'),
('makanan', 'MARTAB9', 'Martabak Manis', 'Martabak dengan aneka topping dan selai manis', 28000, 'MartabakManisSpesial.jpg'),
('makanan', 'NASGUL4', 'Nasi Goreng Spesial', 'Nasi goreng dengan campuran bumbu dan daging', 18000, 'NasiGorengSpesial.jpg'),
('makanan', 'NASKOML', 'Nasi Kuning Komplit', 'Nasi kuning dengan berbagai lauk-pauk lengkap', 28000, 'NasiKuningKomplit.jpg'),
('makanan', 'NASPAD8', 'Nasi Padang', 'Nasi dengan berbagai macam lauk-pauk khas Padang', 25000, 'NasiPadang.jpg'),
('makanan', 'RAWON25', 'Rawon Surabaya', 'Semangkuk rawon dengan daging sapi yang empuk', 25000, 'RawonSurabaya.jpg'),
('makanan', 'RLZTADH', 'Sosis Bakar', 'Sosis Bakar Pedas 8 Tusuk spesial', 10000, 'sosisBakar.jpg'),
('minuman', 'SODAKUA', 'Soda Spesial', 'Minuman soda dengan perpaduan rasa yang unik', 12000, 'SodaSpesial.jpg'),
('makanan', 'SOTOAYM', 'Soto Ayam', 'Soto dengan daging ayam dan kuah yang gurih', 22000, 'SotoAyam.jpg'),
('makanan', 'SRILEM1', 'Sate Ayam Lengkap', 'Sate ayam dengan bumbu kacang dan nasi', 20000, 'SateAyam.jpg'),
('minuman', 'TEHBSAR', 'Teh Botol Sosro', 'Teh kemasan siap minum yang menyegarkan', 12000, 'TehBotolSosro.jpg'),
('makanan', 'U7W2C7P', 'Bakso Raksasa ', 'Bakso Raksasa dengan tambahan kuah yang lezat', 22000, 'BaksoRaksasa_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaction_id` char(15) NOT NULL,
  `acc_id` char(7) NOT NULL,
  `product_id` char(7) NOT NULL,
  `product_qty` int(5) NOT NULL,
  `total_price` int(15) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaction_id`, `acc_id`, `product_id`, `product_qty`, `total_price`, `created_at`) VALUES
('AH1GDYLCzT5yPjB', '123', 'BAKRJS4', 2, 234780, '2023-07-14 09:42:24'),
('AH1GDYLCzT5yPjB', '123', 'SRILEM1', 2, 234780, '2023-07-14 09:42:24'),
('AH1GDYLCzT5yPjB', '123', 'TEHBSAR', 5, 234780, '2023-07-14 09:42:24'),
('AH1GDYLCzT5yPjB', '123', 'SODAKUA', 5, 234780, '2023-07-14 09:42:24'),
('AH1GDYLCzT5yPjB', '123', 'MARTAB9', 1, 234780, '2023-07-14 09:42:24'),
('gCZpTBtQyQIfXqK', '123', 'BAKRJS4', 2, 234780, '2023-07-14 09:43:34'),
('gCZpTBtQyQIfXqK', '123', 'SRILEM1', 2, 234780, '2023-07-14 09:43:34'),
('gCZpTBtQyQIfXqK', '123', 'TEHBSAR', 5, 234780, '2023-07-14 09:43:34'),
('gCZpTBtQyQIfXqK', '123', 'SODAKUA', 5, 234780, '2023-07-14 09:43:34'),
('gCZpTBtQyQIfXqK', '123', 'MARTAB9', 1, 234780, '2023-07-14 09:43:34'),
('ngGS52UmVH7CGzg', '123', 'BAKRJS4', 2, 240870, '2023-07-14 11:13:59'),
('ngGS52UmVH7CGzg', '123', 'BKSMLBS', 3, 240870, '2023-07-14 11:13:59'),
('ngGS52UmVH7CGzg', '123', 'BKWETAN', 2, 240870, '2023-07-14 11:13:59'),
('ngGS52UmVH7CGzg', '123', 'TEHBSAR', 10, 240870, '2023-07-14 11:13:59'),
('iRcIbjFrOUucMqb', '123', 'BAKRJS4', 2, 158000, '2023-07-16 10:44:15'),
('iRcIbjFrOUucMqb', '123', 'BKSMLBS', 1, 158000, '2023-07-16 10:44:15'),
('iRcIbjFrOUucMqb', '123', 'TEHBSAR', 3, 158000, '2023-07-16 10:44:15'),
('iRcIbjFrOUucMqb', '123', 'BKSMLBS', 3, 158000, '2023-07-16 10:44:15'),
('EyQewwKQSPuMghZ', '123', 'BKSMLBS', 1, 44640, '2023-07-18 08:22:43'),
('EyQewwKQSPuMghZ', '123', 'BAKRJS4', 1, 44640, '2023-07-18 08:22:43'),
('TvxH8rV3fkJFkNT', '123', 'BKSMLBS', 5, 65000, '2023-07-18 12:14:27'),
('ChIFp64jwJLhsKr', '123', 'MARTAB9', 12, 1017450, '2023-07-18 13:25:22'),
('ChIFp64jwJLhsKr', '123', 'GADOK12', 1, 1017450, '2023-07-18 13:25:22'),
('ChIFp64jwJLhsKr', '123', 'NASKOML', 8, 1017450, '2023-07-18 13:25:22'),
('ChIFp64jwJLhsKr', '123', 'ESJERUK', 10, 1017450, '2023-07-18 13:25:22'),
('ChIFp64jwJLhsKr', '123', 'JUSMIX1', 5, 1017450, '2023-07-18 13:25:22'),
('ChIFp64jwJLhsKr', '123', 'KOPIKRE', 3, 1017450, '2023-07-18 13:25:22'),
('ChIFp64jwJLhsKr', '123', 'SRILEM1', 5, 1017450, '2023-07-18 13:25:22'),
('ChIFp64jwJLhsKr', '123', 'ESDALDA', 9, 1017450, '2023-07-18 13:25:22'),
('M8cMQeWMINuiHPw', '123', 'BAKRJS4', 1000, 35000000, '2023-07-18 14:09:43'),
('LxfUvXWw8b7OzA3', '123', 'BKSMLBS', 10000, 130000000, '2023-07-18 14:19:55'),
('nexiyhKR6Zggpzd', '123', 'ESJERUK', 123, 1230000, '2023-07-18 14:21:07'),
('pHgq1ZJ1JsZFm6r', '123', 'BAKRJS4', 90, 3100000, '2023-07-18 14:40:28'),
('pHgq1ZJ1JsZFm6r', '123', 'BKSMLBS', 100, 3100000, '2023-07-18 14:40:28'),
('pHgq1ZJ1JsZFm6r', '123', 'BKWETAN', -90, 3100000, '2023-07-18 14:40:28'),
('N0KKttVPV98soq5', '123', 'BAKRJS4', 9, 769300, '2023-07-18 14:43:44'),
('N0KKttVPV98soq5', '123', 'BKWETAN', 10, 769300, '2023-07-18 14:43:44'),
('N0KKttVPV98soq5', '123', 'MARTAB9', 5, 769300, '2023-07-18 14:43:44'),
('N0KKttVPV98soq5', '123', 'TEHBSAR', 15, 769300, '2023-07-18 14:43:44'),
('RLkh3MNiXIPR7l8', '123', 'MARTAB9', 5, 140000, '2023-07-19 02:37:49'),
('GoW3bf3ESxDaotT', '123', 'BKSMLBS', 5, 221350, '2023-07-19 02:40:11'),
('GoW3bf3ESxDaotT', '123', 'MARTAB9', 3, 221350, '2023-07-19 02:40:11'),
('GoW3bf3ESxDaotT', '123', 'TEHBSAR', 7, 221350, '2023-07-19 02:40:11'),
('aN7pWHw26K0Bt73', '189', 'BAKRJS4', 10, 1050000, '2023-07-22 06:54:02'),
('aN7pWHw26K0Bt73', '189', 'BKWETAN', 5, 1050000, '2023-07-22 06:54:02'),
('aN7pWHw26K0Bt73', '189', 'SRILEM1', 20, 1050000, '2023-07-22 06:54:02'),
('aN7pWHw26K0Bt73', '189', 'JUSMANG', 7, 1050000, '2023-07-22 06:54:02'),
('aN7pWHw26K0Bt73', '189', 'TEHBSAR', 10, 1050000, '2023-07-22 06:54:02'),
('DQ1btaz5xndPvam', '123', 'BAKRJS4', 12, 491400, '2023-07-22 10:15:11'),
('DQ1btaz5xndPvam', '123', 'RLZTADH', 12, 491400, '2023-07-22 10:15:11'),
('voM9mrRUN26dhZB', '123', '008HQJF', 12, 84000, '2023-07-22 12:53:16'),
('vP5bwTZoz5ha19u', '123', 'BKWETAN', 0, 13000, '2023-07-25 05:22:11'),
('vP5bwTZoz5ha19u', '123', 'BKSMLBS', 1, 13000, '2023-07-25 05:22:11'),
('YjDlPjKi5CuxwRk', '123', 'BKSMLBS', 10, 130000, '2023-07-25 13:55:52'),
('ksJHKUmGLGc2vqS', 'an5EwKL', 'BKSMLBS', 100, 6745000, '2023-07-25 23:54:34'),
('ksJHKUmGLGc2vqS', 'an5EwKL', 'BKWETAN', 123, 6745000, '2023-07-25 23:54:34'),
('ksJHKUmGLGc2vqS', 'an5EwKL', 'SODAKUA', 150, 6745000, '2023-07-25 23:54:34'),
('ksJHKUmGLGc2vqS', 'an5EwKL', 'JUSMANG', 120, 6745000, '2023-07-25 23:54:34'),
('xDUzxeFdJ9B7z4Y', 'LuEPECD', 'JUSMIX1', 123, 2892750, '2023-07-25 23:57:57'),
('xDUzxeFdJ9B7z4Y', 'LuEPECD', 'TEHBSAR', 100, 2892750, '2023-07-25 23:57:57'),
('izw7P8ekD90x0RE', 'LuEPECD', 'BKSMLBS', 100, 1300000, '2023-07-25 23:59:42'),
('BbngV61s9wKNbmr', 'S2YEaHc', '008HQJF', 50, 2150000, '2023-07-26 00:00:58'),
('BbngV61s9wKNbmr', 'S2YEaHc', 'BKWETAN', 120, 2150000, '2023-07-26 00:00:58'),
('fJ9wWmWQGPr5KUe', 'uRyHfZS', 'ESDALDA', 122, 2352000, '2023-07-26 00:08:59'),
('fJ9wWmWQGPr5KUe', 'uRyHfZS', 'BKSMLBS', 12, 2352000, '2023-07-26 00:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `vocer`
--

CREATE TABLE `vocer` (
  `voucher_key` char(5) DEFAULT NULL,
  `persentase` int(3) NOT NULL,
  `diskon` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vocer`
--

INSERT INTO `vocer` (`voucher_key`, `persentase`, `diskon`) VALUES
('VCHR1', 2, 0.02),
('VCHR3', 7, 0.07),
('VCHR2', 5, 0.05),
('VCHR4', 9, 0.09);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
