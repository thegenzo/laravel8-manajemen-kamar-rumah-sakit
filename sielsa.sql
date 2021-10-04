-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 01:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sielsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_user`, `nip`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, '2313154', '082349179616', 'Batulo', NULL, NULL),
(2, 3, '65654651215', '08562323214', 'gunung nona', '2021-09-01 05:01:19', '2021-09-01 05:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `antrians`
--

CREATE TABLE `antrians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pasien` enum('JKN','Umum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antrians`
--

INSERT INTO `antrians` (`id`, `nama_pasien`, `umur`, `ttl`, `alamat`, `no_hp`, `jenis_kelamin`, `jenis_pasien`, `nama_kepala_keluarga`, `diagnosa_masuk`, `created_at`, `updated_at`) VALUES
(7, 'nure', 20, 'Batauga, 12 Maret 2009', 'asdasasd', '082293413968', 'Wanita', 'Umum', 'Husnan', 'nyeri pinggang', '2021-09-07 02:44:11', '2021-09-07 02:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `antrian_anaks`
--

CREATE TABLE `antrian_anaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pasien` enum('JKN','Umum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosas`
--

CREATE TABLE `diagnosas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `diagnosa_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pasien` enum('Sembuh','Rujukan','Meninggal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rs_rujukan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosas`
--

INSERT INTO `diagnosas` (`id`, `id_pasien`, `diagnosa_akhir`, `obat`, `status_pasien`, `rs_rujukan`, `created_at`, `updated_at`) VALUES
(3, 1, 'magg akut', NULL, 'Sembuh', NULL, '2021-09-07 02:46:35', '2021-09-07 02:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa_anaks`
--

CREATE TABLE `diagnosa_anaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien_anak` bigint(20) UNSIGNED NOT NULL,
  `diagnosa_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pasien` enum('Sembuh','Rujukan','Meninggal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rs_rujukan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `nama_dokter`, `spesialis`, `jadwal`, `created_at`, `updated_at`) VALUES
(6, 'dr. Foreman', 'Diagnosa', 'Setiap Hari', '2021-09-06 02:27:14', '2021-09-06 02:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kamars`
--

CREATE TABLE `kamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('kosong','terisi') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamars`
--

INSERT INTO `kamars` (`id`, `nama_kamar`, `kelas`, `gedung`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BG001', '1', 'Bougenville', 'kosong', '2021-09-06 02:53:41', '2021-09-07 02:46:35'),
(3, 'BG002', '1', 'Bougenville', 'terisi', '2021-09-06 03:29:35', '2021-09-06 03:47:37'),
(7, 'FM002', '1', 'Flamboyan', 'terisi', '2021-09-06 04:14:03', '2021-09-06 04:14:27'),
(8, 'FM002', '1', 'Flamboyan', 'terisi', '2021-09-07 02:41:49', '2021-09-07 02:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2014_10_12_000000_create_users_table', 1),
(44, '2014_10_12_100000_create_password_resets_table', 1),
(45, '2019_08_19_000000_create_failed_jobs_table', 1),
(46, '2021_08_16_043159_create_perawats_table', 1),
(47, '2021_08_16_043303_create_admins_table', 1),
(48, '2021_08_16_043327_create_dokters_table', 1),
(49, '2021_08_16_043405_create_kamars_table', 1),
(50, '2021_08_16_043446_create_pasiens_table', 1),
(51, '2021_08_25_023111_create_diagnosas_table', 1),
(52, '2021_08_25_034219_create_rekam_medis_table', 1),
(53, '2021_09_03_072906_create_antrians_table', 2),
(55, '2021_09_04_091529_create_pasien_anaks_table', 3),
(56, '2021_09_04_091716_create_diagnosa_anaks_table', 3),
(57, '2021_09_04_091823_create_rekam_medis_anaks_table', 3),
(58, '2021_09_04_102907_create_antrian_anaks_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pasien` enum('JKN','Umum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_inap` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kamar` bigint(20) UNSIGNED NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nomor_pasien`, `nama_pasien`, `umur`, `ttl`, `alamat`, `jenis_kelamin`, `jenis_pasien`, `status_inap`, `nama_kepala_keluarga`, `diagnosa_masuk`, `id_kamar`, `id_dokter`, `gedung`, `created_at`, `updated_at`) VALUES
(1, '59408078', 'Jeklin', 28, 'Pasarwajo, 26 April 1997', 'Jeklin', 'Pria', 'Umum', '0', 'Hasmuddin', 'nyeri pinggang', 1, 6, 'Bougenville', '2021-09-06 03:36:02', '2021-09-07 02:46:35'),
(4, '56942810', 'Ansaruddin', 25, 'Pasarwajo, 26 April 1997', 'Ansaruddin', 'Pria', 'Umum', '1', 'Hasmuddin', 'nyeri pinggang', 3, 6, 'Bougenville', '2021-09-06 03:47:37', '2021-09-06 03:47:37'),
(5, '61898172', 'kasma', 20, 'Pasarwajo, 26 April 1997', 'asdasd', 'Wanita', 'Umum', '1', 'Hasmuddin', 'maag', 8, 6, 'Flamboyan', '2021-09-07 02:43:02', '2021-09-07 02:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `pasien_anaks`
--

CREATE TABLE `pasien_anaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pasien` enum('JKN','Umum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_inap` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kamar` bigint(20) UNSIGNED NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien_anaks`
--

INSERT INTO `pasien_anaks` (`id`, `nomor_pasien`, `nama_pasien`, `umur`, `ttl`, `alamat`, `jenis_kelamin`, `jenis_pasien`, `status_inap`, `nama_kepala_keluarga`, `diagnosa_masuk`, `id_kamar`, `id_dokter`, `gedung`, `created_at`, `updated_at`) VALUES
(6, '74605984', 'Bonita', 12, 'Batauga, 12 Maret 2009', 'sadasdas', 'Wanita', 'Umum', '1', 'Hasmuddin', 'nyeri pinggang', 7, 6, 'Flamboyan', '2021-09-06 04:14:27', '2021-09-06 04:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perawats`
--

CREATE TABLE `perawats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perawats`
--

INSERT INTO `perawats` (`id`, `id_user`, `nip`, `staf_gedung`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 5, '65654651215', 'Bougenville', '08562323214', 'sadasdas', '2021-09-07 02:48:33', '2021-09-07 02:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `tensi_darah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anamnesis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terapi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id`, `id_pasien`, `tensi_darah`, `anamnesis`, `terapi`, `created_at`, `updated_at`) VALUES
(1, 1, '200/90', 'sakit kepala', 'bodrex 300cc', '2021-09-07 02:45:37', '2021-09-07 02:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis_anaks`
--

CREATE TABLE `rekam_medis_anaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien_anak` bigint(20) UNSIGNED NOT NULL,
  `tensi_darah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anamnesis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terapi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','perawat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', NULL, 'admin123', NULL, NULL, NULL),
(3, 'Firman Kahar', 'firman@gmail.com', 'admin', NULL, 'firman123', NULL, '2021-09-01 05:01:19', '2021-09-01 05:01:19'),
(5, 'ade', 'ade@gmail.com', 'perawat', NULL, 'ade12345', NULL, '2021-09-07 02:48:33', '2021-09-07 02:48:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_nip_unique` (`nip`),
  ADD KEY `admins_id_user_foreign` (`id_user`);

--
-- Indexes for table `antrians`
--
ALTER TABLE `antrians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antrian_anaks`
--
ALTER TABLE `antrian_anaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosas`
--
ALTER TABLE `diagnosas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosas_id_pasien_foreign` (`id_pasien`);

--
-- Indexes for table `diagnosa_anaks`
--
ALTER TABLE `diagnosa_anaks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosa_anaks_id_pasien_anak_foreign` (`id_pasien_anak`);

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kamars`
--
ALTER TABLE `kamars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasiens_nomor_pasien_unique` (`nomor_pasien`),
  ADD KEY `pasiens_id_kamar_foreign` (`id_kamar`),
  ADD KEY `pasiens_id_dokter_foreign` (`id_dokter`);

--
-- Indexes for table `pasien_anaks`
--
ALTER TABLE `pasien_anaks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasien_anaks_nomor_pasien_unique` (`nomor_pasien`),
  ADD KEY `pasien_anaks_id_kamar_foreign` (`id_kamar`),
  ADD KEY `pasien_anaks_id_dokter_foreign` (`id_dokter`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perawats`
--
ALTER TABLE `perawats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perawats_nip_unique` (`nip`),
  ADD KEY `perawats_id_user_foreign` (`id_user`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekam_medis_id_pasien_foreign` (`id_pasien`);

--
-- Indexes for table `rekam_medis_anaks`
--
ALTER TABLE `rekam_medis_anaks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekam_medis_anaks_id_pasien_anak_foreign` (`id_pasien_anak`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `antrians`
--
ALTER TABLE `antrians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `antrian_anaks`
--
ALTER TABLE `antrian_anaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diagnosas`
--
ALTER TABLE `diagnosas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diagnosa_anaks`
--
ALTER TABLE `diagnosa_anaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien_anaks`
--
ALTER TABLE `pasien_anaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perawats`
--
ALTER TABLE `perawats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekam_medis_anaks`
--
ALTER TABLE `rekam_medis_anaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diagnosas`
--
ALTER TABLE `diagnosas`
  ADD CONSTRAINT `diagnosas_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diagnosa_anaks`
--
ALTER TABLE `diagnosa_anaks`
  ADD CONSTRAINT `diagnosa_anaks_id_pasien_anak_foreign` FOREIGN KEY (`id_pasien_anak`) REFERENCES `pasien_anaks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD CONSTRAINT `pasiens_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasiens_id_kamar_foreign` FOREIGN KEY (`id_kamar`) REFERENCES `kamars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasien_anaks`
--
ALTER TABLE `pasien_anaks`
  ADD CONSTRAINT `pasien_anaks_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasien_anaks_id_kamar_foreign` FOREIGN KEY (`id_kamar`) REFERENCES `kamars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perawats`
--
ALTER TABLE `perawats`
  ADD CONSTRAINT `perawats_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id`);

--
-- Constraints for table `rekam_medis_anaks`
--
ALTER TABLE `rekam_medis_anaks`
  ADD CONSTRAINT `rekam_medis_anaks_id_pasien_anak_foreign` FOREIGN KEY (`id_pasien_anak`) REFERENCES `pasien_anaks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
