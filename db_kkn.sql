-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Des 2022 pada 04.59
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kkn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` int NOT NULL,
  `lecturer_id` int NOT NULL,
  `village_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`id`, `student_id`, `lecturer_id`, `village_name`, `village_address`, `latitude`, `longitude`, `activity_name`, `activity_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Desa Penglipuran', 'Desa Penglipuran, Jalan Penglipuran, Kubu, Kabupaten Bangli, Bali, Indonesia', '-8.422239103682859', '115.35927772521973', 'Dampak positif Teknologi', 'Pelajaran Teknologi', 'active', '2022-12-10 04:03:56', '2022-12-10 04:14:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2020_04_03_000000_create_users_table', 1),
(14, '2020_04_23_102829_create_permission_tables', 1),
(15, '2022_12_09_213405_create_study_programs', 1),
(16, '2022_12_09_213525_create_activities', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permissions-create', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(2, 'permissions-read', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(3, 'permissions-update', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(4, 'permissions-delete', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(5, 'roles-create', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(6, 'roles-read', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(7, 'roles-update', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(8, 'roles-delete', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(9, 'users-create', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(10, 'users-read', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(11, 'users-update', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(12, 'users-delete', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(13, 'studyprograms-create', 'web', '2022-12-10 02:14:54', '2022-12-10 02:14:54'),
(14, 'studyprograms-read', 'web', '2022-12-10 02:15:00', '2022-12-10 02:15:00'),
(15, 'studyprograms-update', 'web', '2022-12-10 02:15:06', '2022-12-10 02:15:06'),
(16, 'studyprograms-delete', 'web', '2022-12-10 02:15:12', '2022-12-10 02:15:12'),
(17, 'students-create', 'web', '2022-12-10 02:49:55', '2022-12-10 02:49:55'),
(18, 'students-read', 'web', '2022-12-10 02:50:02', '2022-12-10 02:50:02'),
(19, 'students-update', 'web', '2022-12-10 02:50:07', '2022-12-10 02:50:07'),
(20, 'students-delete', 'web', '2022-12-10 02:50:12', '2022-12-10 02:50:12'),
(21, 'lecturers-create', 'web', '2022-12-10 02:50:23', '2022-12-10 02:50:23'),
(22, 'lecturers-read', 'web', '2022-12-10 02:50:27', '2022-12-10 02:50:27'),
(23, 'lecturers-update', 'web', '2022-12-10 02:50:34', '2022-12-10 02:50:34'),
(24, 'lecturers-delete', 'web', '2022-12-10 02:50:40', '2022-12-10 02:50:40'),
(25, 'activities-create', 'web', '2022-12-10 03:29:12', '2022-12-10 03:29:12'),
(26, 'activities-read', 'web', '2022-12-10 03:29:17', '2022-12-10 03:29:17'),
(27, 'activities-update', 'web', '2022-12-10 03:29:22', '2022-12-10 03:29:22'),
(28, 'activities-delete', 'web', '2022-12-10 03:29:26', '2022-12-10 03:29:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2022-12-09 14:40:26', '2022-12-09 14:40:26'),
(2, 'mahasiswa', 'web', '2022-12-10 02:33:06', '2022-12-10 02:33:06'),
(3, 'dosen', 'web', '2022-12-10 02:33:17', '2022-12-10 02:33:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(14, 2),
(18, 2),
(22, 2),
(26, 2),
(13, 3),
(14, 3),
(15, 3),
(17, 3),
(18, 3),
(19, 3),
(22, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `study_programs`
--

CREATE TABLE `study_programs` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `study_programs`
--

INSERT INTO `study_programs` (`id`, `code`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SP-001', 'teknik-informatika', 'Teknik Informatika', '2022-12-10 02:27:03', '2022-12-10 02:32:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_program_id` int DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `code`, `name`, `email`, `username`, `email_verified_at`, `password`, `study_program_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADM0001', 'Admin', 'admin@kkn-management.id', 'admin', '2022-12-09 14:40:26', '$2y$10$Oj6NFD92.FlVtvTaNe55nOL9G276PBa6em68jpI/0AY7exV.3Wxwm', NULL, NULL, '2022-12-09 14:40:26', '2022-12-10 03:25:33'),
(2, '1742003', 'Mahasiswa 1', 'mhs1@mail.com', 'mahasiswa1', NULL, '$2y$10$sAN.UfmYfEr14vmNY0HA4.cflJZyH72z96MLzldjv/6AVArKugyeS', 1, NULL, '2022-12-10 02:44:34', '2022-12-10 03:20:15'),
(3, '320000123', 'Dosen 1', 'dosen1@mail.com', 'dosen1', NULL, '$2y$10$KhNZ26VgJOdrm3J7SlSML.smqClM.zsmV262KOLsSYRpMtgOfLsJq', NULL, NULL, '2022-12-10 02:44:58', '2022-12-10 03:11:58'),
(5, '320000124', 'Dosen 2', 'dosen2@mail.com', 'dosen2', NULL, '$2y$10$TjqsbiZpmuP/NacF/AG07uL1IlmjDUuj9g3jmgZBq8CWtPlFfEbLO', NULL, NULL, '2022-12-10 03:04:14', '2022-12-10 03:04:14'),
(6, '1742005', 'Mahasiswa 2', 'mhs2@mail.com', 'mahasiswa2', NULL, '$2y$10$AUZhRLCf8Ct94lqgt4Dww.vmmc.8f36YYUhp2c7NHM3TgbkThgGMC', 1, NULL, '2022-12-10 03:17:24', '2022-12-10 03:17:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `study_programs`
--
ALTER TABLE `study_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_code_unique` (`code`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `study_programs`
--
ALTER TABLE `study_programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
