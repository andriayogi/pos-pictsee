-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 12:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pictsee`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_package`
--

CREATE TABLE `mst_package` (
  `id_package` int(3) NOT NULL,
  `name_package` varchar(50) NOT NULL,
  `price_package` int(11) NOT NULL,
  `type_package` enum('package','additional') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_package`
--

INSERT INTO `mst_package` (`id_package`, `name_package`, `price_package`, `type_package`, `created_date`, `created_by`, `status`) VALUES
(1, 'Wedding', 1000000, 'package', '2020-10-08 14:58:04', 'admin', '1'),
(2, 'Lighting', 100000, 'additional', '2020-10-08 14:58:04', 'admin', '1'),
(3, 'Pre Wedding', 1000000, 'package', '2020-10-08 15:36:28', 'admin', '1'),
(4, 'DOP', 3000000, 'package', '2020-10-08 15:37:18', 'admin', '0'),
(5, 'Sewa Kamera', 100000, 'additional', '2020-10-08 15:38:03', 'admin', '0'),
(6, 'DOP', 3000000, 'package', '2020-10-08 15:47:48', 'admin', '1'),
(7, 'Sewa Kamera', 100000, 'additional', '2020-10-08 15:48:04', 'admin', '1'),
(8, 'DOP', 1500000, 'package', '2020-10-08 16:17:37', 'admin', '0'),
(9, 'Sewa Tripod', 50000, 'additional', '2020-10-09 13:51:07', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_promo`
--

CREATE TABLE `mst_promo` (
  `id_promo` int(3) NOT NULL,
  `name_promo` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_promo`
--

INSERT INTO `mst_promo` (`id_promo`, `name_promo`, `price`, `start_date`, `end_date`, `created_date`, `created_by`, `status`) VALUES
(1, 'TAHUNBARU', 50000, '2020-10-01', '2020-10-15', '2020-10-08 15:02:00', 'admin', '1'),
(2, 'LEBARAN', 15000, '2020-10-01', '2020-10-15', '2020-10-08 16:03:52', 'admin', '0'),
(3, 'LEBARAN', 15000, '2020-10-01', '2020-10-25', '2020-10-08 16:14:37', 'admin', '1'),
(4, 'LEBARANs', 15000, '2020-10-01', '2020-10-15', '2020-10-08 16:15:43', 'admin', '0'),
(5, 'NATAL', 10000, '2020-12-25', '2020-12-25', '2020-10-09 13:51:51', 'admin', '1'),
(6, 'MAYDAY', 25000, '2020-05-01', '2020-05-31', '2020-10-18 13:46:13', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id_user` int(3) NOT NULL,
  `name_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_role` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `name_user`, `username`, `password`, `id_role`, `created_date`, `status`) VALUES
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2020-10-05 13:44:21', '1'),
(2, 'Fulan', 'fulan', 'ff80c6867dab4c1591b893ab28a2661a44fc38ee', 2, '2020-10-07 15:18:13', '1'),
(3, 'Fulan', 'saya', 'b820db6e2ababf0afd7e36bb065db969162ad06d', 2, '2020-10-07 15:18:45', '0'),
(4, 'Fulan', 'admins', 'ff80c6867dab4c1591b893ab28a2661a44fc38ee', 2, '2020-10-07 15:19:44', '0'),
(5, 'Fulan', 'procurement', 'ff80c6867dab4c1591b893ab28a2661a44fc38ee', 2, '2020-10-07 15:20:12', '0'),
(6, 'Fulan', 'saya', 'ff80c6867dab4c1591b893ab28a2661a44fc38ee', 2, '2020-10-07 15:21:59', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ref_role`
--

CREATE TABLE `ref_role` (
  `id_role` int(3) NOT NULL,
  `name_role` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_role`
--

INSERT INTO `ref_role` (`id_role`, `name_role`, `created_date`, `status`) VALUES
(1, 'Admin', '2020-10-05 14:36:36', '1'),
(2, 'Kasir', '2020-10-05 14:36:36', '1'),
(3, 'Fotografers', '2020-10-06 16:00:26', '0');

-- --------------------------------------------------------

--
-- Table structure for table `trn_invoice`
--

CREATE TABLE `trn_invoice` (
  `id_invoice` int(3) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `name_customer` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `id_promo` int(3) DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `information` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trn_invoice`
--

INSERT INTO `trn_invoice` (`id_invoice`, `invoice_number`, `name_customer`, `date`, `phone`, `id_promo`, `sub_total`, `discount`, `total_price`, `information`, `created_date`, `created_by`, `status`) VALUES
(1, 'PCT.20201015.1', 'Esa', '2020-10-15', '085624249435', 1, 2200000, 50000, 2150000, 'Tidak ada catatan', '2020-10-15 14:54:11', 'admin', '1'),
(2, 'PCT.20201015.2', 'Reza', '2020-10-15', '085624249435', 3, 4150000, 15000, 4135000, 'tanpa catatan', '2020-10-15 14:57:47', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trn_invoice_detail`
--

CREATE TABLE `trn_invoice_detail` (
  `id_invoice_detail` int(3) NOT NULL,
  `id_invoice` int(3) NOT NULL,
  `id_package` int(3) NOT NULL,
  `qty` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trn_invoice_detail`
--

INSERT INTO `trn_invoice_detail` (`id_invoice_detail`, `id_invoice`, `id_package`, `qty`, `created_date`, `created_by`, `status`) VALUES
(1, 1, 1, 1, '2020-10-15 14:54:11', 'admin', '1'),
(2, 1, 3, 1, '2020-10-15 14:54:11', 'admin', '1'),
(3, 1, 2, 1, '2020-10-15 14:54:11', 'admin', '1'),
(4, 1, 7, 1, '2020-10-15 14:54:12', 'admin', '1'),
(5, 2, 3, 1, '2020-10-15 14:57:47', 'admin', '1'),
(6, 2, 6, 1, '2020-10-15 14:57:47', 'admin', '1'),
(7, 2, 7, 1, '2020-10-15 14:57:47', 'admin', '1'),
(8, 2, 9, 1, '2020-10-15 14:57:47', 'admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_package`
--
ALTER TABLE `mst_package`
  ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `mst_promo`
--
ALTER TABLE `mst_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ref_role`
--
ALTER TABLE `ref_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `trn_invoice`
--
ALTER TABLE `trn_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `trn_invoice_detail`
--
ALTER TABLE `trn_invoice_detail`
  ADD PRIMARY KEY (`id_invoice_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_package`
--
ALTER TABLE `mst_package`
  MODIFY `id_package` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mst_promo`
--
ALTER TABLE `mst_promo`
  MODIFY `id_promo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ref_role`
--
ALTER TABLE `ref_role`
  MODIFY `id_role` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trn_invoice`
--
ALTER TABLE `trn_invoice`
  MODIFY `id_invoice` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trn_invoice_detail`
--
ALTER TABLE `trn_invoice_detail`
  MODIFY `id_invoice_detail` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
