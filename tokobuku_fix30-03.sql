-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 12:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `fullname`, `email`) VALUES
(2, 'Yonatan Abisai Yabin', 'yoyoganz@gmail.com'),
(3, 'Hugo Stefent Tauran', 'hugoganteng@gmail.com'),
(4, 'Cornelius Excel', 'excelcornelius@gmail.com'),
(5, 'Vincentius Claudio', 'vinclaudio@gmail.com'),
(7, 'Sujiwo Tedjo', 'sujiwotedjo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `release_year` varchar(5) NOT NULL,
  `pages` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` decimal(3,0) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `description`, `release_year`, `pages`, `price`, `discount`, `stock`) VALUES
(1, 'Manajemen Perubahan dan Inovasi', 'Mata Kuliah SI', '2002', 80, 70000, '5', 4),
(2, 'PHP: Languange', 'Belajar PHP dari awal', '2019', 70, 120000, '10', 3),
(3, 'Cara menjadi Bijak seperti Yoyo', 'Buku best seller tahun 2021', '2020', 312, 400000, '12', 64),
(4, 'Filosofi Teras', 'Buku yang mengajarkan filosofi kehidupan', '2018', 450, 90000, '15', 20),
(5, 'Harry Potter', 'Buku novel fantasy', '2014', 400, 800000, '3', 132);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_author_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`book_author_id`, `author_id`, `book_id`) VALUES
(1, 5, 1),
(2, 4, 2),
(3, 2, 2),
(4, 2, 3),
(5, 5, 4),
(6, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `book_bookcat`
--

CREATE TABLE `book_bookcat` (
  `book_bookcat_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_bookcat`
--

INSERT INTO `book_bookcat` (`book_bookcat_id`, `book_id`, `book_category_id`) VALUES
(1, 1, 4),
(2, 2, 4),
(4, 3, 6),
(5, 4, 7),
(6, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `book_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`book_category_id`, `name`) VALUES
(1, 'Science Fiction'),
(4, 'Document'),
(5, 'Horror'),
(6, 'Comics'),
(7, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_member` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `no_member`, `gender`, `phone`, `address`) VALUES
(1, 'Cornelius Excel Simamora', 'excelcornelius@gmail.com', '98740', 'Laki-laki', '0821212121413', 'Jl. Merdeka no 5 Klaten, Jawa Tengah'),
(3, 'Willyanto Kwok', 'willyanto@willyanto.com', '989750', 'Laki-laki', '08313141', 'Pekanbaru'),
(5, 'Gunawan', 'gunawan@gmail.com', '9832321', 'Laki-laki', '842323232', 'Palembang');

-- --------------------------------------------------------

--
-- Table structure for table `d_pembelian`
--

CREATE TABLE `d_pembelian` (
  `d_pembelian_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `buy_price_pcs` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_pembelian`
--

INSERT INTO `d_pembelian` (`d_pembelian_id`, `book_id`, `amount`, `buy_price_pcs`, `total_price`, `pembelian_id`) VALUES
(1, 1, 1, 0, 70000, 1),
(2, 4, 1, 0, 90000, 1),
(3, 1, 1, 0, 70000, 2),
(4, 4, 1, 0, 90000, 2),
(5, 1, 3, 0, 24000, 3),
(6, 2, 3, 100000, 300000, 4),
(7, 1, 4, 50000, 200000, 5),
(8, 2, 3, 100000, 300000, 6),
(9, 1, 6, 70000, 420000, 7),
(10, 4, 4, 90000, 360000, 8),
(11, 4, 1, 90000, 90000, 9),
(12, 5, 1, 800000, 800000, 9),
(13, 4, 5, 90000, 450000, 10),
(14, 1, 1, 70000, 70000, 10),
(15, 2, 2, 120000, 240000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `d_penjualan`
--

CREATE TABLE `d_penjualan` (
  `d_penjualan_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `amount` int(5) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_penjualan`
--

INSERT INTO `d_penjualan` (`d_penjualan_id`, `book_id`, `penjualan_id`, `amount`, `total_price`) VALUES
(1, 1, 0, 1, 66500),
(2, 3, 0, 1, 352000),
(3, 1, 2, 1, 66500),
(4, 3, 2, 1, 352000),
(5, 1, 3, 1, 66500),
(6, 2, 3, 1, 108000),
(7, 4, 4, 1, 76500),
(8, 1, 4, 1, 66500),
(9, 1, 5, 1, 66500),
(10, 2, 5, 1, 108000),
(11, 4, 6, 1, 76500),
(12, 3, 7, 1, 352000),
(13, 2, 8, 1, 108000),
(14, 4, 9, 1, 76500),
(15, 1, 9, 1, 66500),
(16, 5, 10, 13, 10088000),
(17, 2, 11, 3, 324000),
(18, 1, 12, 5, 332500);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `nip`, `password`, `name`, `gender`, `phone`, `email`, `address`, `level_id`) VALUES
(12, '181709808', '$2y$10$RBUZIGDdSz61x2xC..LOWe31mltM9JbCIZ4Xt1Zojed8tW6TocivG', 'Yonatan Abisai Yabin', 'Pria', '087889895119', 'yonatan.abisai@yahoo.com', 'Yogyakarta', 2),
(13, '181709954', '$2y$10$awjlKq//snxG0V0xJVuM6.Zmi23RJDgPcT/CIu69/MEFkpDYYDGJq', 'Putri Wardani', 'Wanita', '087797082472', 'pwardani@gmail.com', 'Bekasi', 2),
(14, '1293104812047', '$2y$10$msgctjjVB6uZmcC9V2DUg.pbtKv.QfgL99.Qj8s1zVpAjuZ6yeC62', 'Wilson Gunawan', 'Pria', '08731293714', 'wilson.gun@gmail.com', 'Jogja', 1),
(17, '64345353', '$2y$10$UiI4sCoJbTmBxB.6GnTV8udlu3EgVKQsBRlKO3mDnGJ8L0juiVWya', 'Quincy Padawangi', 'Laki-laki', '432424324', 'quincy@gmail.com', 'rumah', 1),
(18, '3231231', '$2y$10$TlOd4Yf2.EDUZM77/3WLJueIh9hYIwyqnALB8rrFotb9xQ5tR4ooK', 'Limia Kristiani', 'Perempuan', '08323231', 'limia@mail.com', 'Yogyakarta', 2),
(19, '9019021', '$2y$10$eW9Pd8KZ11/wjJA1UnaGeeDsnRCIK2agC5mxvMSmDevUTPCjmX1pG', 'Brayen Billion', 'Laki-laki', '08412313123', 'bebe@gmail.com', 'Bangka Belitung', 2);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `name`) VALUES
(1, 'Admin'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `pembelian_id` int(11) NOT NULL,
  `kode_beli` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `buy_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`pembelian_id`, `kode_beli`, `employee_id`, `supplier_id`, `buy_date`) VALUES
(1, 'PMB000000001', 17, 2, '2021-01-13 15:11:31'),
(2, 'PMB000000002', 17, 2, '2021-01-21 15:02:17'),
(3, 'PMB000000003', 18, 1, '2021-02-16 16:57:05'),
(4, 'PMB000000004', 18, 1, '2021-02-19 17:00:55'),
(5, 'PMB000000005', 18, 2, '2021-02-22 15:02:31'),
(6, 'PMB000000006', 18, 1, '2021-03-24 17:05:04'),
(7, 'PMB000000007', 18, 2, '2021-03-26 00:34:09'),
(8, 'PMB000000008', 18, 1, '2021-03-28 00:35:38'),
(9, 'PMB000000009', 18, 1, '2021-03-28 15:12:44'),
(10, 'PMB000000010', 18, 5, '2021-03-30 16:30:38'),
(11, 'PMB000000011', 18, 4, '2021-03-30 16:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `kode_jual` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `sale_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `kode_jual`, `customer_id`, `employee_id`, `sale_date`) VALUES
(1, 'PNJ000000001', 0, 17, '2021-01-20 19:17:21'),
(2, 'PNJ000000002', 1, 17, '2021-01-22 19:38:57'),
(3, 'PNJ000000003', 3, 17, '2021-02-10 00:09:37'),
(4, 'PNJ000000004', 3, 17, '2021-02-13 13:17:55'),
(5, 'PNJ000000005', 5, 18, '2021-02-17 20:48:05'),
(6, 'PNJ000000006', 3, 17, '2021-02-19 19:42:43'),
(7, 'PNJ000000007', 5, 17, '2021-03-16 19:43:05'),
(8, 'PNJ000000008', 1, 18, '2021-03-27 19:43:38'),
(9, 'PNJ000000009', 3, 18, '2021-03-29 19:44:05'),
(10, 'PNJ000000010', 3, 18, '2021-03-29 16:56:09'),
(11, 'PNJ000000011', 5, 18, '2021-03-30 00:46:46'),
(12, 'PNJ000000012', 5, 18, '2021-03-30 16:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'Kompas Gramedia', 'cs@kpg.id', '02151512353', 'Jl. Palmerah Utara, Jakarta Barat'),
(2, 'Elex Comic Center', 'elex@hugo.id', '4242523424', 'Gondangdia, Jakarta Barat'),
(4, 'Erlangga', 'erlangga@erlangga.com', '08232323131', 'Jl. H. Baping Raya No. 100 Ciracas, Jakarta Timur 13740'),
(5, 'Yudhistira', 'editorial@yudhistira-gi.com', '0821314242421', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET latin1 NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 NOT NULL,
  `level_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level_id`, `date_created`) VALUES
(1, 'wilson gunawan', 'wilson@gmail.com', '$2y$10$KCuUIqq0OMsXtMEbfLnduuLdksSLrgo502dozBtiMJ0OITChM2.i.', 1, 1615641271),
(2, 'Hotman Paris', 'paris@mail.com', '$2y$10$jdI2pDozRBAWyFjVTKX2guDjuDfzKX3txHUemADuD9R9Jc6CtM7rm', 1, 1615875717);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`book_author_id`);

--
-- Indexes for table `book_bookcat`
--
ALTER TABLE `book_bookcat`
  ADD PRIMARY KEY (`book_bookcat_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`book_category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `d_pembelian`
--
ALTER TABLE `d_pembelian`
  ADD PRIMARY KEY (`d_pembelian_id`);

--
-- Indexes for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
  ADD PRIMARY KEY (`d_penjualan_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`pembelian_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_author`
--
ALTER TABLE `book_author`
  MODIFY `book_author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_bookcat`
--
ALTER TABLE `book_bookcat`
  MODIFY `book_bookcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `book_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `d_pembelian`
--
ALTER TABLE `d_pembelian`
  MODIFY `d_pembelian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
  MODIFY `d_penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `pembelian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d_pembelian`
--
ALTER TABLE `d_pembelian`
  ADD CONSTRAINT `d_pembelian_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
