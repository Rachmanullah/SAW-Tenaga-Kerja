-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 08:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tenagakerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_lowkers`
--

CREATE TABLE `bobot_lowkers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lowongan_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_lowkers`
--

INSERT INTO `bobot_lowkers` (`id`, `lowongan_id`, `kriteria_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-04-12 04:42:27', '2023-04-12 04:42:27'),
(2, 1, 2, '2023-04-12 04:42:27', '2023-04-12 04:42:27'),
(3, 1, 3, '2023-04-12 04:42:27', '2023-04-12 04:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisis`
--

INSERT INTO `divisis` (`id`, `divisi`, `created_at`, `updated_at`) VALUES
(1, 'Backend Dev', '2023-04-12 04:38:53', '2023-04-12 04:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_saws`
--

CREATE TABLE `hasil_saws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelamar_id` bigint(20) UNSIGNED NOT NULL,
  `hasil` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `kriteria`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'Administrasi', 50, '2023-04-12 04:39:57', '2023-04-12 04:39:57'),
(2, 'Psikotes', 20, '2023-04-12 04:41:28', '2023-04-12 04:41:28'),
(3, 'Wawancara', 30, '2023-04-12 04:41:48', '2023-04-12 04:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `lowongans`
--

CREATE TABLE `lowongans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_dimulai` date NOT NULL,
  `tgl_ditutup` date NOT NULL,
  `kuota` int(11) NOT NULL,
  `status` enum('Buka','Tutup','Penuh') NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lowongans`
--

INSERT INTO `lowongans` (`id`, `tgl_dimulai`, `tgl_ditutup`, `kuota`, `status`, `divisi_id`, `created_at`, `updated_at`) VALUES
(1, '2023-04-14', '2023-04-22', 5, 'Buka', 1, '2023-04-12 04:42:27', '2023-04-12 04:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_04_012705_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_25_081825_create_pelamars_table', 1),
(7, '2023_03_25_082924_create_divisis_table', 1),
(8, '2023_03_25_083256_create_lowongans_table', 1),
(9, '2023_03_25_090754_create_pendaftarans_table', 1),
(10, '2023_03_25_091051_create_kriterias_table', 1),
(11, '2023_03_25_091204_create_sub_kriterias_table', 1),
(12, '2023_03_25_091347_create_penilaian_alternatifs_table', 1),
(13, '2023_03_25_091513_create_hasil_saws_table', 1),
(14, '2023_04_01_142856_create_bobot_lowkers_table', 1),
(15, '2023_04_09_050038_create_opsis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opsis`
--

CREATE TABLE `opsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `opsi` varchar(255) NOT NULL,
  `nilai_opsi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opsis`
--

INSERT INTO `opsis` (`id`, `sub_kriteria_id`, `opsi`, `nilai_opsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'S1', 75, '2023-04-12 05:56:08', '2023-04-12 05:56:08'),
(2, 1, 'SMK', 60, '2023-04-12 05:56:08', '2023-04-12 05:56:08'),
(3, 1, 'SMA', 55, '2023-04-12 05:56:08', '2023-04-12 05:56:08'),
(4, 2, 'Ada', 75, '2023-04-12 06:02:27', '2023-04-12 06:02:27'),
(5, 2, 'Tidak Ada', 55, '2023-04-12 06:02:27', '2023-04-12 06:02:27'),
(6, 3, '>2', 75, '2023-04-12 06:03:19', '2023-04-12 06:03:19'),
(7, 3, '<1', 55, '2023-04-12 06:03:19', '2023-04-12 06:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `pelamars`
--

CREATE TABLE `pelamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha') NOT NULL,
  `pendidikan_akhir` enum('SMA','SMK','S1','S2','Lain') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelamar_id` bigint(20) UNSIGNED NOT NULL,
  `lowongan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_alternatifs`
--

CREATE TABLE `penilaian_alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelamar_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriterias`
--

CREATE TABLE `sub_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria` varchar(255) NOT NULL,
  `nilai_sub_kriteria` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kriterias`
--

INSERT INTO `sub_kriterias` (`id`, `kriteria_id`, `sub_kriteria`, `nilai_sub_kriteria`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pendidikan Terakhir', 70, '2023-04-12 04:39:57', '2023-04-12 04:39:57'),
(2, 1, 'Pengalaman Kerja', 20, '2023-04-12 04:39:57', '2023-04-12 04:39:57'),
(3, 1, 'Lama Kerja', 10, '2023-04-12 04:39:57', '2023-04-12 04:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rachmanullah', 'rachmanullah1@gmail.com', '085967162714', '$2y$10$/nIsFvDNLBrhqlKhDYJR7OpIh8Bpq3Z.S.HRfseQTH1R2raMblWAa', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_lowkers`
--
ALTER TABLE `bobot_lowkers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_lowkers_lowongan_id_foreign` (`lowongan_id`),
  ADD KEY `bobot_lowkers_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_saws`
--
ALTER TABLE `hasil_saws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_saws_pelamar_id_foreign` (`pelamar_id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowongans`
--
ALTER TABLE `lowongans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lowongans_divisi_id_foreign` (`divisi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opsis`
--
ALTER TABLE `opsis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opsis_sub_kriteria_id_foreign` (`sub_kriteria_id`);

--
-- Indexes for table `pelamars`
--
ALTER TABLE `pelamars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftarans_pelamar_id_foreign` (`pelamar_id`),
  ADD KEY `pendaftarans_lowongan_id_foreign` (`lowongan_id`);

--
-- Indexes for table `penilaian_alternatifs`
--
ALTER TABLE `penilaian_alternatifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_alternatifs_pelamar_id_foreign` (`pelamar_id`),
  ADD KEY `penilaian_alternatifs_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kriterias_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_lowkers`
--
ALTER TABLE `bobot_lowkers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hasil_saws`
--
ALTER TABLE `hasil_saws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lowongans`
--
ALTER TABLE `lowongans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `opsis`
--
ALTER TABLE `opsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelamars`
--
ALTER TABLE `pelamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_alternatifs`
--
ALTER TABLE `penilaian_alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot_lowkers`
--
ALTER TABLE `bobot_lowkers`
  ADD CONSTRAINT `bobot_lowkers_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `bobot_lowkers_lowongan_id_foreign` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongans` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `hasil_saws`
--
ALTER TABLE `hasil_saws`
  ADD CONSTRAINT `hasil_saws_pelamar_id_foreign` FOREIGN KEY (`pelamar_id`) REFERENCES `pelamars` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `lowongans`
--
ALTER TABLE `lowongans`
  ADD CONSTRAINT `lowongans_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisis` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `opsis`
--
ALTER TABLE `opsis`
  ADD CONSTRAINT `opsis_sub_kriteria_id_foreign` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriterias` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD CONSTRAINT `pendaftarans_lowongan_id_foreign` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongans` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pendaftarans_pelamar_id_foreign` FOREIGN KEY (`pelamar_id`) REFERENCES `pelamars` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `penilaian_alternatifs`
--
ALTER TABLE `penilaian_alternatifs`
  ADD CONSTRAINT `penilaian_alternatifs_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `penilaian_alternatifs_pelamar_id_foreign` FOREIGN KEY (`pelamar_id`) REFERENCES `pelamars` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD CONSTRAINT `sub_kriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
