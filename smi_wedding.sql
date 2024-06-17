-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 22, 2023 at 09:00 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smi_wedding`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`demowio1_yuki`@`localhost` PROCEDURE `get_nama_item` (IN `mygid` INT)   BEGIN
         SELECT nama from gambar where gid=mygid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `gid` int NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lokasi` text COLLATE utf8mb4_general_ci,
  `lokasi2` text COLLATE utf8mb4_general_ci,
  `lokasi3` text COLLATE utf8mb4_general_ci,
  `lokasi4` text COLLATE utf8mb4_general_ci,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `kategori` tinyint DEFAULT NULL,
  `sub_kategori` tinyint DEFAULT NULL,
  `is_aktif` tinyint(1) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`gid`, `nama`, `lokasi`, `lokasi2`, `lokasi3`, `lokasi4`, `deskripsi`, `kategori`, `sub_kategori`, `is_aktif`, `tgl_awal`, `tgl_akhir`, `created_at`, `updated_at`) VALUES
(12, 'Dekorasi', '17014225930666f49420b84e0845670c1a0fc750a0.jpg', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, '2023-06-27 05:54:26', '2023-06-27 05:54:34'),
(13, 'Attire', '170142263338b93c23a2488f9188810cefbee4ccc2.jpg', NULL, NULL, NULL, NULL, 2, NULL, 1, NULL, NULL, '2023-06-27 05:54:53', '2023-06-27 05:54:53'),
(14, 'MUA', '1701422735d6e2f4a749920c9c1bf2c968e1313481.jpg', NULL, NULL, NULL, NULL, 3, NULL, 1, '2023-08-29', '2023-08-29', '2023-06-27 05:55:17', '2023-08-29 06:19:08'),
(15, 'Photo & Video', '17014227688372cb220d378b6efa95de0376f043c0.jpg', NULL, NULL, NULL, NULL, 4, NULL, 1, '2023-08-25', '2023-08-31', '2023-06-27 05:55:49', '2023-08-07 06:09:45'),
(16, 'Musik', '1702117611ad5fc66e7120f7173366e0ec048d4327.jpg', NULL, NULL, NULL, 'Sit amet consectetur adipiscing elit.', 5, NULL, 1, '2023-08-14', '2023-08-14', '2023-08-05 04:51:05', '2023-12-09 03:30:32'),
(17, 'Catering', '1701422757ba89f97a2d6306fc8c011dff90f07dc1.jpg', NULL, NULL, NULL, NULL, 6, NULL, 1, '2023-07-31', '2023-10-11', '2023-08-05 04:55:14', '2023-09-06 22:37:31'),
(18, 'Askan Decoration', '17014225930666f49420b84e0845670c1a0fc750a0.jpg', '17014229807bfbe5542da88be26b0548bbadba76cf.jpg', '17014229804b6c07f2b6852a6749da189b787a6211.jpg', '17014229800f15fd209109ad6514db4444405dd4b6.jpg', '- Backdrop Pelaminan \nLebar Maksimal Ukuran 12 M, Tinggi 3 – 3,5 Meter \nTaman Depan Pelaminan\nAngpau\nKarpet\nPermadani', NULL, 95, 1, '2023-08-10', '2023-11-23', '2023-06-27 05:15:24', '2023-12-06 06:00:16'),
(19, 'Chandra Decor', '170142263338b93c23a2488f9188810cefbee4ccc2.jpg', '1687868672.png', '1691236265.jpg', '1687870549.jpg', '- Backdrop Pelaminan \nLebar Maksimal Ukuran 12 M, Tinggi 3 – 3,5 Meter \nTaman Depan Pelaminan\nAngpau\nKarpet\nPermadani', NULL, 2, 1, NULL, NULL, '2023-06-27 05:15:46', '2023-12-01 02:23:53'),
(20, 'Attire by Sasikim', '1701422735d6e2f4a749920c9c1bf2c968e1313481.jpg', NULL, NULL, NULL, 'Detail isian Gunung Walat Forest', NULL, 3, 1, NULL, NULL, '2023-06-27 05:25:06', '2023-12-01 02:25:35'),
(21, 'Carla Art Wedding Gallery', '17014227688372cb220d378b6efa95de0376f043c0.jpg', NULL, NULL, NULL, 'asdadwdadd', NULL, 4, 1, '2023-08-14', '2023-08-18', '2023-08-05 04:57:02', '2023-12-01 02:26:08'),
(23, 'Juvita Makeup', '1701422757ba89f97a2d6306fc8c011dff90f07dc1.jpg', NULL, NULL, NULL, 'xczwc', NULL, 5, 1, NULL, NULL, '2023-08-29 06:50:50', '2023-12-01 02:25:57'),
(91, 'TEST MUA', '1701364548.jpg', NULL, NULL, NULL, 'sdawda\r\nad\r\nad\r\naddawda', NULL, 1, NULL, NULL, NULL, '2023-11-30 10:15:48', '2023-12-06 09:57:48'),
(92, 'test attire', '1701364776.jpg', '1701364776.jpg', '1701364776.jpg', '1701364776.jpg', 'asdad\r\nawdd\r\na\r\nd\r\ndaw', NULL, 2, 1, NULL, NULL, '2023-11-30 10:19:36', '2023-11-30 10:19:36'),
(94, 'test kategori', '1701865344e0d3c0e48d98f2340372b71756624b1c.jpg', NULL, NULL, NULL, 'test aja', NULL, NULL, 1, NULL, NULL, '2023-12-06 05:22:24', '2023-12-06 05:22:24'),
(95, 'test kat 2', '1701868645a8df3c27708b1787370885d2cce26410.jpg', NULL, NULL, NULL, 'asdawd', 95, NULL, 1, NULL, NULL, '2023-12-06 05:56:44', '2023-12-06 06:20:21'),
(96, 'test attire last', NULL, '1701881950515fe775de384f0efbcbe5836b024ddd.jpg', NULL, NULL, 'asdawd\r\nawd\r\na\r\ndw\r\ndd', NULL, 96, NULL, NULL, NULL, '2023-12-06 09:59:10', '2023-12-06 09:59:10'),
(97, 'cek last', NULL, NULL, NULL, NULL, 'adawd', NULL, 5, 1, NULL, NULL, '2023-12-06 10:00:35', '2023-12-06 10:00:35'),
(98, 'cek last kat', NULL, NULL, NULL, NULL, 'asdawdawd', 98, NULL, 1, NULL, NULL, '2023-12-06 10:00:52', '2023-12-06 10:00:52'),
(99, 'esttsetetse', NULL, NULL, NULL, NULL, 'asdawda', NULL, 99, 1, NULL, NULL, '2023-12-06 10:03:28', '2023-12-06 10:03:48'),
(100, 'Item dekorasi', '17021175043494755cdc4682767e39798597343e1f.jpg', NULL, NULL, NULL, 'tset item dekorasi', NULL, 1, 1, NULL, NULL, '2023-12-09 03:25:04', '2023-12-09 03:25:04'),
(101, 'test katering', '1702117958b95d8f7d356c4a4bab4b85bd381dbf79.jpg', NULL, NULL, NULL, 'adawdaw kateing', NULL, 6, 1, NULL, NULL, '2023-12-09 03:32:38', '2023-12-09 03:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_detail`
--

CREATE TABLE `gambar_detail` (
  `gdid` bigint UNSIGNED NOT NULL,
  `gid` int NOT NULL,
  `lokasi` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar_detail`
--

INSERT INTO `gambar_detail` (`gdid`, `gid`, `lokasi`) VALUES
(1, 19, '1687868672.png'),
(2, 19, '1691236265.jpg'),
(3, 19, '1687870549.jpg'),
(4, 19, '1687868146.png');

-- --------------------------------------------------------

--
-- Table structure for table `list_proposal`
--

CREATE TABLE `list_proposal` (
  `lpid` bigint UNSIGNED NOT NULL,
  `session_id` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ltid` bigint NOT NULL,
  `nama` text COLLATE utf8mb4_general_ci,
  `phone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_proposal`
--

INSERT INTO `list_proposal` (`lpid`, `session_id`, `ltid`, `nama`, `phone`, `email`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(13, 'adsadw', 12, 'adawd', '123123', 'asdawda', NULL, NULL, NULL, NULL),
(14, NULL, 40, 'tset', '1283', 'lnjjnkj', 'kjakjdnaw', NULL, '2023-12-06 10:10:30', '2023-12-06 10:10:30'),
(15, NULL, 41, 'Asep Strowbery', '0819231321', 'asep@gmail.com', 'jalan turangga no 80', NULL, '2023-12-09 03:33:45', '2023-12-09 03:33:45'),
(16, NULL, 46, 'asda', 'dawd', 'asdad', 'wadawdad', NULL, '2023-12-21 11:37:48', '2023-12-21 11:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `list_transaksi`
--

CREATE TABLE `list_transaksi` (
  `ltid` bigint UNSIGNED NOT NULL,
  `session_id` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_general_ci,
  `jml_org` int DEFAULT NULL,
  `tgl_booking` datetime DEFAULT NULL,
  `tipe_order` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_transaksi`
--

INSERT INTO `list_transaksi` (`ltid`, `session_id`, `nama`, `notes`, `jml_org`, `tgl_booking`, `tipe_order`, `created_at`, `updated_at`) VALUES
(31, 'VSZGqiMdHyOZCzNqmpHYl8MHsJh79dgAWT39Utha', NULL, NULL, NULL, NULL, NULL, '2023-12-01 02:48:18', '2023-12-01 02:48:18'),
(32, 'Ns1mZsgBmgWkYg14wfVL6h4uY0rEBV99m2pJEDxb', NULL, NULL, NULL, NULL, NULL, '2023-12-02 03:03:54', '2023-12-02 03:03:54'),
(33, '7tF7iNKPPEIoKPtz7p13ouRPuEyLiTlkOJrON6of', NULL, NULL, NULL, NULL, NULL, '2023-12-02 08:30:30', '2023-12-02 08:30:30'),
(34, '1XYrEZec4dJE58KHL7N6G4wtx65BfLp0oTgbcbsT', NULL, NULL, NULL, NULL, NULL, '2023-12-03 07:50:51', '2023-12-03 07:50:51'),
(35, '5Hyg0AxFjd8CeZhZT5IqWnoRu3jNX3C8WjLTrSTu', NULL, NULL, NULL, NULL, NULL, '2023-12-03 09:32:33', '2023-12-03 09:32:33'),
(36, 'JQRNvFedmVB6rVxfQb49Pdxg0zYxaEgMJOepziKz', NULL, NULL, NULL, NULL, NULL, '2023-12-03 23:14:09', '2023-12-03 23:14:09'),
(37, 'yqafzdwNKxEVBjEqiKUSFhHuHszoEQLB61ExK7qJ', NULL, NULL, NULL, NULL, NULL, '2023-12-04 18:18:50', '2023-12-04 18:18:50'),
(38, 'Ni2OlzhjzHQb430tlfWrbKzN5yrmiK2ks9BHN1WD', NULL, NULL, NULL, NULL, NULL, '2023-12-05 18:52:44', '2023-12-05 18:52:44'),
(39, 'FRrFSWlXGfLqhyCdxs9Q8ATtdpxwXP64R8iIekbY', NULL, NULL, NULL, NULL, NULL, '2023-12-05 21:19:21', '2023-12-05 21:19:21'),
(40, 'RfMQjbwayrbjYkbR4n4HszNwgLVauQIHJ1yiSul3', NULL, NULL, NULL, NULL, NULL, '2023-12-06 10:06:23', '2023-12-06 10:06:23'),
(41, 'LWmn7ig2RdCdyjRz15CZ2P98dTAQbVWYHqvc4XrM', NULL, NULL, NULL, NULL, NULL, '2023-12-09 03:23:48', '2023-12-09 03:23:48'),
(42, 'hf998mSb0EvcUQY9hefyKUL9mqLHxPEksOuSvzlw', NULL, NULL, NULL, NULL, NULL, '2023-12-09 05:37:00', '2023-12-09 05:37:00'),
(43, 'D5nAmG7cst1El2qAUOuaUYqnkBrBMFERzG4zNIFg', NULL, NULL, NULL, NULL, NULL, '2023-12-18 07:26:51', '2023-12-18 07:26:51'),
(44, 'BhwDYySg4Kx0cUEDVWB3WT0YKAZkO6cZRpcOyMUS', NULL, NULL, NULL, NULL, NULL, '2023-12-19 08:17:06', '2023-12-19 08:17:06'),
(45, 'YvEin9YSIXRaKlMUsKzqpm2KqP348hDak88nGPwH', NULL, NULL, NULL, NULL, NULL, '2023-12-19 21:51:32', '2023-12-19 21:51:32'),
(46, 'TR2FJvxAkW1QpLdbCb6L65FIQxNAn1erdv7LlDIw ', NULL, NULL, NULL, NULL, NULL, '2023-12-21 11:22:27', '2023-12-21 11:22:27'),
(47, 'tixl2h0Rw4fQrLPi9zYeRiSCD126COLpscRb6VWN', NULL, NULL, NULL, NULL, NULL, '2023-12-21 19:02:29', '2023-12-21 19:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `list_transaksi_d`
--

CREATE TABLE `list_transaksi_d` (
  `ltdid` bigint UNSIGNED NOT NULL,
  `ltid` int NOT NULL,
  `id` int NOT NULL,
  `jml` int DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_transaksi_d`
--

INSERT INTO `list_transaksi_d` (`ltdid`, `ltid`, `id`, `jml`, `is_edit`, `created_at`, `updated_at`) VALUES
(73, 31, 18, NULL, NULL, '2023-12-01 02:48:18', '2023-12-01 02:48:18'),
(74, 31, 18, NULL, NULL, '2023-12-01 03:36:53', '2023-12-01 03:36:53'),
(75, 31, 18, NULL, NULL, '2023-12-01 03:37:18', '2023-12-01 03:37:18'),
(76, 31, 18, NULL, NULL, '2023-12-01 03:44:03', '2023-12-01 03:44:03'),
(77, 32, 18, NULL, NULL, '2023-12-02 03:03:54', '2023-12-02 03:03:54'),
(78, 32, 18, NULL, NULL, '2023-12-02 03:05:35', '2023-12-02 03:05:35'),
(79, 33, 18, NULL, NULL, '2023-12-02 08:30:30', '2023-12-02 08:30:30'),
(80, 33, 19, NULL, NULL, '2023-12-02 08:50:14', '2023-12-02 08:50:14'),
(81, 33, 20, NULL, NULL, '2023-12-02 08:50:30', '2023-12-02 08:50:30'),
(82, 33, 21, NULL, NULL, '2023-12-02 08:53:21', '2023-12-02 08:53:21'),
(83, 33, 21, NULL, NULL, '2023-12-02 08:53:51', '2023-12-02 08:53:51'),
(84, 33, 23, NULL, NULL, '2023-12-02 09:04:53', '2023-12-02 09:04:53'),
(85, 33, 91, NULL, NULL, '2023-12-02 09:05:14', '2023-12-02 09:05:14'),
(86, 34, 18, NULL, NULL, '2023-12-03 07:50:51', '2023-12-03 07:50:51'),
(87, 34, 20, NULL, NULL, '2023-12-03 07:53:27', '2023-12-03 07:53:27'),
(88, 35, 19, NULL, NULL, '2023-12-03 09:32:33', '2023-12-03 09:32:33'),
(89, 35, 18, NULL, NULL, '2023-12-03 09:32:54', '2023-12-03 09:32:54'),
(90, 36, 18, NULL, NULL, '2023-12-03 23:14:09', '2023-12-03 23:14:09'),
(91, 36, 19, NULL, NULL, '2023-12-03 23:14:37', '2023-12-03 23:14:37'),
(92, 37, 18, NULL, NULL, '2023-12-04 18:18:50', '2023-12-04 18:18:50'),
(93, 38, 18, NULL, NULL, '2023-12-05 18:52:44', '2023-12-05 18:52:44'),
(94, 39, 18, NULL, NULL, '2023-12-05 21:19:21', '2023-12-05 21:19:21'),
(95, 39, 19, NULL, NULL, '2023-12-05 21:19:43', '2023-12-05 21:19:43'),
(96, 40, 19, NULL, NULL, '2023-12-06 10:06:23', '2023-12-06 10:06:23'),
(97, 41, 19, NULL, NULL, '2023-12-09 03:23:48', '2023-12-09 03:23:48'),
(98, 41, 20, NULL, NULL, '2023-12-09 03:24:04', '2023-12-09 03:24:04'),
(99, 41, 100, NULL, NULL, '2023-12-09 03:25:24', '2023-12-09 03:25:24'),
(100, 41, 21, NULL, NULL, '2023-12-09 03:26:00', '2023-12-09 03:26:00'),
(101, 41, 23, NULL, NULL, '2023-12-09 03:26:23', '2023-12-09 03:26:23'),
(102, 41, 101, NULL, NULL, '2023-12-09 03:33:02', '2023-12-09 03:33:02'),
(103, 42, 100, NULL, NULL, '2023-12-09 05:37:00', '2023-12-09 05:37:00'),
(104, 43, 19, NULL, NULL, '2023-12-18 07:26:51', '2023-12-18 07:26:51'),
(107, 45, 20, NULL, 1, '2023-12-19 22:00:10', '2023-12-19 22:00:10'),
(108, 45, 20, NULL, NULL, '2023-12-19 22:05:18', '2023-12-19 22:05:18'),
(109, 46, 19, NULL, NULL, '2023-12-21 11:22:27', '2023-12-21 11:22:27'),
(110, 46, 100, NULL, NULL, '2023-12-21 11:22:48', '2023-12-21 11:22:48'),
(111, 47, 100, NULL, NULL, '2023-12-21 19:02:29', '2023-12-21 19:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_26_103652_create_admins_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Raisa Suci Hartati', 'Kpg. Dago No. 489, Sorong 62954, KalTeng', NULL, '2019-01-07 20:43:20'),
(2, 'Siti Palastri', 'Dk. Daan No. 591, Payakumbuh 30914, SulTra', NULL, NULL),
(3, 'Aurora Ilsa Nasyiah', 'Ki. Cikapayang No. 993, Malang 73331, NTT', NULL, NULL),
(4, 'Jamal Uwais', 'Ki. Basket No. 63, Ambon 39363, KalUt', NULL, NULL),
(5, 'Nabila Uyainah', 'Ki. Badak No. 351, Padangsidempuan 25170, Aceh', NULL, NULL),
(6, 'Satya Manullang', 'Dk. Sugiyopranoto No. 954, Langsa 77615, BaBel', NULL, NULL),
(7, 'Kasim Budiman', 'Jln. Banal No. 219, Tangerang 22457, Papua', NULL, NULL),
(8, 'Agnes Hana Winarsih M.Kom.', 'Ki. Padang No. 190, Pontianak 81244, DIY', NULL, NULL),
(9, 'Among Joko Marpaung M.Kom.', 'Ds. Supomo No. 588, Bau-Bau 70894, SumBar', NULL, NULL),
(10, 'Baktianto Kusumo S.E.', 'Kpg. Casablanca No. 773, Balikpapan 84946, Jambi', NULL, NULL),
(11, 'Diki Alfarabi', 'Jl. Ampera raya. nomor 15', '2019-01-07 18:50:18', '2019-01-07 21:11:07'),
(13, 'yuki wicaksono', 'test alamat\r\ntest alamt baris 2', '2023-06-24 21:32:27', '2023-06-24 21:32:27'),
(14, 'test', 'asdwda', '2023-06-25 09:31:08', '2023-06-25 09:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(20,2) NOT NULL,
  `kategori` tinyint NOT NULL,
  `part` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `photo`, `price`, `kategori`, `part`, `created_at`, `updated_at`) VALUES
(1, 'Nasi Putih', NULL, NULL, 5000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(2, 'Nasi Goreng Selimut', NULL, NULL, 30000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(3, 'Nasi Goreng Tomyam', NULL, NULL, 25000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(4, 'Nasi Goreng Kencur', NULL, NULL, 25000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(5, 'Nasi Goreng Sapi', NULL, NULL, 35000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(6, 'Mie Godog', NULL, NULL, 25000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(7, 'Mie Becek', NULL, NULL, 25000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(8, 'Mie Gunung Walat', NULL, NULL, 35000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(9, 'Ayam Goreng (Dada / Paha)', NULL, NULL, 18000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(10, 'Ayam Goreng Asam Manis', NULL, NULL, 35000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(11, 'Ayam Goreng Lombok Ijo + Nasi', NULL, NULL, 40000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(12, 'Ayam Goreng Rica + Nasi', NULL, NULL, 35000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(13, 'Ayam Goreng Saus G Walat + Nasi', NULL, NULL, 35000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(14, 'Ayam Dower + Nasi', NULL, NULL, 35000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(15, 'Ayam Mozarella + Kentang', NULL, NULL, 35000.00, 1, 1, '2023-06-17 23:13:38', '2023-06-17 23:13:38'),
(16, 'Ayam Grill + Kentang', NULL, NULL, 35000.00, 1, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(17, 'Ayam Cordon Blue + Kentang', NULL, NULL, 38000.00, 1, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(18, 'Beef Grill + Kentang', NULL, NULL, 50000.00, 1, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(19, 'Beef Steak Blackpapper + Kentang', NULL, NULL, 60000.00, 1, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(20, 'Beef Mozarella + Kentang', NULL, NULL, 60000.00, 1, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(21, 'Chicken Steak', NULL, NULL, 35000.00, 1, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(22, 'Tenderloin Steak', NULL, NULL, 60000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(23, 'Sirloin Steak', NULL, NULL, 60000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(24, 'Cumi Saus Padang', NULL, NULL, 40000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(25, 'Cumi Saus Tiram', NULL, NULL, 40000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(26, 'Cumi Asam Manis', NULL, NULL, 40000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(27, 'Udang Saus Padang', NULL, NULL, 40000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(28, 'Udang Saus Tiram', NULL, NULL, 40000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(29, 'Udang Asam Manis', NULL, NULL, 40000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(30, 'Sop Gurame (Per Ons)', NULL, NULL, 20000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(31, 'Gurame Cobek Ijo (Per Ons)', NULL, NULL, 20000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(32, 'Gurame Asam Manis (Per Ons)', NULL, NULL, 20000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(33, 'Gurame Saus Padang (Per Ons)', NULL, NULL, 20000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(34, 'Gurame Saus G Walat (Per Ons)', NULL, NULL, 20000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(35, 'Sop Buntut', NULL, NULL, 45000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(36, 'Buntut Goreng', NULL, NULL, 50000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(37, 'Buntut Bakar', NULL, NULL, 50000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(38, 'Sop Iga', NULL, NULL, 45000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(39, 'Iga Goreng', NULL, NULL, 50000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(40, 'Iga Bakar', NULL, NULL, 50000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(41, 'Capcay (Goreng / Kuah)', NULL, NULL, 20000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(42, 'Karedok', NULL, NULL, 20000.00, 1, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(43, 'Kentang Goreng', NULL, NULL, 20000.00, 2, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(44, 'Pancake', NULL, NULL, 23000.00, 2, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(45, 'Banana Split', NULL, NULL, 22000.00, 2, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(46, 'Banana Nugget', NULL, NULL, 25000.00, 2, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(47, 'Ice Cream', NULL, NULL, 20000.00, 2, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(48, 'Pisang Goreng', NULL, NULL, 25000.00, 2, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(49, 'Pisang Bakar', NULL, NULL, 25000.00, 2, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(50, 'Roti Bakar (Susu/Coklat/Keju)', NULL, NULL, 23000.00, 2, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(51, 'Panacota', NULL, NULL, 20000.00, 2, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(52, 'Air Mineral', NULL, NULL, 6000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(53, 'Plain Tea', NULL, NULL, 6000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(54, 'Teh Manis', NULL, NULL, 10000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(55, 'Jeruk Peras', NULL, NULL, 10000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(56, 'Lemon Tea', NULL, NULL, 20000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(57, 'Lychee Tea', NULL, NULL, 20000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(58, 'Thai Tea', NULL, NULL, 20000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(59, 'Jus Mangga', NULL, NULL, 20000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(60, 'Jus Alpukat', NULL, NULL, 20000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(61, 'Tubruk Black Coffee', NULL, NULL, 20000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(62, 'Americano', NULL, NULL, 20000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(63, 'Coffee Crème Walat ', NULL, NULL, 25000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(64, 'Es Kopi Gula Aren', NULL, NULL, 25000.00, 3, 1, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(65, 'Es Kopi Pandan', NULL, NULL, 25000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(66, 'Chocolate', NULL, NULL, 23000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(67, 'Freshmilk Brown Sugar', NULL, NULL, 20000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(68, 'Strawberry Milk', NULL, NULL, 20000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(69, 'Manggo Float', NULL, NULL, 25000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(70, 'Avocado Float', NULL, NULL, 25000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(71, 'Sparkle Manggo', NULL, NULL, 20000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(72, 'Sparkle Vanilla', NULL, NULL, 20000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(73, 'Susu Jahe', NULL, NULL, 20000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(74, 'Wedang Jahe', NULL, NULL, 20000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(75, 'Bandrek', NULL, NULL, 20000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39'),
(76, 'Bajigur', NULL, NULL, 20000.00, 3, 2, '2023-06-17 23:13:39', '2023-06-17 23:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_cafes`
--

CREATE TABLE `product_cafes` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(20,2) NOT NULL,
  `kategori` tinyint NOT NULL,
  `part` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_cafes`
--

INSERT INTO `product_cafes` (`id`, `name`, `description`, `photo`, `price`, `kategori`, `part`, `created_at`, `updated_at`) VALUES
(1, 'Air Mineral', NULL, NULL, 6000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(2, 'Plain Tea', NULL, NULL, 6000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(3, 'Sweet Tea', NULL, NULL, 10000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(4, 'Lychee Tea', NULL, NULL, 20000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(5, 'Lemon Tea', NULL, NULL, 20000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(6, 'Thai Tea  ', NULL, NULL, 20000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(7, 'Thai Green Tea', NULL, NULL, 23000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(8, 'Thai Tea Boba', NULL, NULL, 25000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(9, 'Brown Sugar Milk Boba', NULL, NULL, 25000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(10, 'Espresso Single', NULL, NULL, 15000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(11, 'Espresso Double', NULL, NULL, 20000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(12, 'Americano ', NULL, NULL, 20000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(13, 'Long Black', NULL, NULL, 20000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(14, 'Café Latte', NULL, NULL, 25000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(15, 'Café Latte Tiramisu', NULL, NULL, 30000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(16, 'Café Latte Hazelnut', NULL, NULL, 30000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(17, 'Café Latte Vanilla', NULL, NULL, 28000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(18, 'Charcoal Latte', NULL, NULL, 23000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(19, 'Red Velvet Latte', NULL, NULL, 23000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(20, 'Macha Latte', NULL, NULL, 23000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(21, 'Cappucino', NULL, NULL, 25000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(22, 'Rum Coffee Walat', NULL, NULL, 30000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(23, 'Es Kopi Susu Walat', NULL, NULL, 30000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(24, 'Siganture Coffee G Walat', NULL, NULL, 30000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(25, 'Avocado Coffee', NULL, NULL, 25000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(26, 'Caramel Machiatto', NULL, NULL, 30000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(27, 'Afogatto', NULL, NULL, 25000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(28, 'Cream Brulee', NULL, NULL, 25000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(29, 'Macha Latte Espresso', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(30, 'On The Rock', NULL, NULL, 20000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(31, 'Chocolate', NULL, NULL, 23000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(32, 'Mocca', NULL, NULL, 25000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(33, 'Cookies & Creaam', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(34, 'Frappucino', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(35, 'Vanilla Frappe', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(36, 'Taro Frappe', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(37, 'Chocolate Frappe', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(38, 'Charcoal Frappe Walat', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(39, 'Red Velvet Frappe', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(40, 'Green Tea Frappe', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(41, 'Milkshake (Chocolate / Vanilla / Strawberry', NULL, NULL, 25000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(42, 'Kopi Tubruk', NULL, NULL, 20000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(43, 'V60 / Japanese', NULL, NULL, 25000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(44, 'Vietnam Drip', NULL, NULL, 25000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(45, 'Virgin Mojito', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(46, 'Lychee Mojito', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(47, 'Kiwi Mojito', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(48, 'Purple Walat Mojito', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(49, 'Blue Ocean', NULL, NULL, 25000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(50, 'Lemon Squash', NULL, NULL, 23000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(51, 'Orange Squash', NULL, NULL, 23000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(52, 'Melon Blast', NULL, NULL, 23000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(53, 'Plumberry Peach', NULL, NULL, 28000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(54, 'Nasi Goreng Ayam', NULL, NULL, 25000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(55, 'Nasi Goreng Sapi Lada Hitam', NULL, NULL, 35000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(56, 'Nasi Goreng Seafood', NULL, NULL, 30000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(57, 'Nasi Goreng Spesial', NULL, NULL, 35000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(58, 'Mie Goreng', NULL, NULL, 25000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(59, 'Mie Goreng Seafood', NULL, NULL, 30000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(60, 'Mie Goreng Special', NULL, NULL, 35000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(61, 'Chicken Katsu', NULL, NULL, 30000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(62, 'Chicken Roll Sausage', NULL, NULL, 35000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(63, 'Chicken Cheese', NULL, NULL, 35000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(64, 'Chicken Steak', NULL, NULL, 35000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(65, 'Sirloin Steak', NULL, NULL, 60000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(66, 'Tenderloin Steak', NULL, NULL, 60000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(67, 'Spagetti Carbonara', NULL, NULL, 30000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(68, 'Spagetti Bolognaise', NULL, NULL, 30000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(69, 'French Fries', NULL, NULL, 20000.00, 3, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(70, 'French Fries & Sosis', NULL, NULL, 25000.00, 3, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(71, 'Cireng Goreng', NULL, NULL, 25000.00, 3, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(72, 'Pisang Goreng', NULL, NULL, 25000.00, 3, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(73, 'Pisang Bakar', NULL, NULL, 25000.00, 3, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(74, 'Roti Bakar (Susu / Coklat / Keju)', NULL, NULL, 23000.00, 3, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(1, 'Ricebowl Beef Teriyaki', NULL, NULL, 30000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(2, 'Ricebowl Beef Blackpapper', NULL, NULL, 35000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(3, 'Ricebowl Kastu', NULL, NULL, 30000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(4, 'Ricebowl Chicken Mozarella', NULL, NULL, 35000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(5, 'Mie Goreng', NULL, NULL, 25000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(6, 'Kwetiaw Goreng', NULL, NULL, 25000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(7, 'Bihun Goreng', NULL, NULL, 25000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(8, 'Chicken Burger', NULL, NULL, 30000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(9, 'Beef Burger', NULL, NULL, 35000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(10, 'Kentang Goreng', NULL, NULL, 20000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(11, 'Kentang Goreng Sosis', NULL, NULL, 25000.00, 1, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(12, 'Pisang Goreng', NULL, NULL, 25000.00, 1, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(13, 'PAKET LIWET 1 (2P)', NULL, NULL, 70000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(14, 'PAKET LIWET 2 (4P)', NULL, NULL, 140000.00, 2, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(15, 'PAKET LIWET 3 (6P)', NULL, NULL, 210000.00, 2, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(16, 'Sambal Bakar Telur ', NULL, NULL, 23000.00, 3, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(17, 'Sambal Bakar Ayam', NULL, NULL, 35000.00, 3, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(18, 'Sambal Bakar Inak Nila', NULL, NULL, 35000.00, 3, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(19, 'Sambal Bakar Lele', NULL, NULL, 30000.00, 3, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(20, 'Sambal Bakar Cumi Asin', NULL, NULL, 35000.00, 3, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(21, 'Sambal Bakar Udang', NULL, NULL, 40000.00, 3, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(22, 'Tahu Goreng', NULL, NULL, 10000.00, 3, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(23, 'Tempe Goreng', NULL, NULL, 10000.00, 3, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(24, 'Terong Goreng', NULL, NULL, 10000.00, 3, 1, '2023-06-18 05:21:19', '2023-06-18 05:21:19'),
(25, 'Kol Goreng', NULL, NULL, 10000.00, 3, 2, '2023-06-18 05:21:19', '2023-06-18 05:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_forests`
--

CREATE TABLE `product_forests` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(20,2) NOT NULL,
  `kategori` tinyint NOT NULL,
  `part` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_forests`
--

INSERT INTO `product_forests` (`id`, `name`, `description`, `photo`, `price`, `kategori`, `part`, `created_at`, `updated_at`) VALUES
(1, 'Ricebowl Beef Teriyaki', NULL, NULL, 30000.00, 1, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(2, 'Ricebowl Beef Blackpapper', NULL, NULL, 35000.00, 1, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(3, 'Ricebowl Kastu', NULL, NULL, 30000.00, 1, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(4, 'Ricebowl Chicken Mozarella', NULL, NULL, 35000.00, 1, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(5, 'Mie Goreng', NULL, NULL, 25000.00, 1, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(6, 'Kwetiaw Goreng', NULL, NULL, 25000.00, 1, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(7, 'Bihun Goreng', NULL, NULL, 25000.00, 1, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(8, 'Chicken Burger', NULL, NULL, 30000.00, 1, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(9, 'Beef Burger', NULL, NULL, 35000.00, 1, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(10, 'Kentang Goreng', NULL, NULL, 20000.00, 1, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(11, 'Kentang Goreng Sosis', NULL, NULL, 25000.00, 1, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(12, 'Pisang Goreng', NULL, NULL, 25000.00, 1, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(13, 'PAKET LIWET 1 (2P)', NULL, NULL, 70000.00, 2, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(14, 'PAKET LIWET 2 (4P)', NULL, NULL, 140000.00, 2, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(15, 'PAKET LIWET 3 (6P)', NULL, NULL, 210000.00, 2, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(16, 'Sambal Bakar Telur ', NULL, NULL, 23000.00, 3, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(17, 'Sambal Bakar Ayam', NULL, NULL, 35000.00, 3, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(18, 'Sambal Bakar Inak Nila', NULL, NULL, 35000.00, 3, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(19, 'Sambal Bakar Lele', NULL, NULL, 30000.00, 3, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(20, 'Sambal Bakar Cumi Asin', NULL, NULL, 35000.00, 3, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(21, 'Sambal Bakar Udang', NULL, NULL, 40000.00, 3, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(22, 'Tahu Goreng', NULL, NULL, 10000.00, 3, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(23, 'Tempe Goreng', NULL, NULL, 10000.00, 3, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(24, 'Terong Goreng', NULL, NULL, 10000.00, 3, 1, '2023-06-17 22:21:19', '2023-06-17 22:21:19'),
(25, 'Kol Goreng', NULL, NULL, 10000.00, 3, 2, '2023-06-17 22:21:19', '2023-06-17 22:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@wedding.com', NULL, '$2y$10$IVtkNZ4T/ePmSaf1bdmb2OqCOiKNIIPIVahjGfeloFSwSgc5Uu9Fa', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `gambar_detail`
--
ALTER TABLE `gambar_detail`
  ADD UNIQUE KEY `gdid` (`gdid`);

--
-- Indexes for table `list_proposal`
--
ALTER TABLE `list_proposal`
  ADD PRIMARY KEY (`lpid`);

--
-- Indexes for table `list_transaksi`
--
ALTER TABLE `list_transaksi`
  ADD PRIMARY KEY (`ltid`),
  ADD UNIQUE KEY `ltid` (`ltid`);

--
-- Indexes for table `list_transaksi_d`
--
ALTER TABLE `list_transaksi_d`
  ADD UNIQUE KEY `ltdid` (`ltdid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `gid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `gambar_detail`
--
ALTER TABLE `gambar_detail`
  MODIFY `gdid` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `list_proposal`
--
ALTER TABLE `list_proposal`
  MODIFY `lpid` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `list_transaksi`
--
ALTER TABLE `list_transaksi`
  MODIFY `ltid` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `list_transaksi_d`
--
ALTER TABLE `list_transaksi_d`
  MODIFY `ltdid` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
