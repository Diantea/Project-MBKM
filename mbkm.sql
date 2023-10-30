-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2023 pada 08.02
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Magang', 'building-castle', '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(2, 'Kewirausahaan', 'building-store', '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(3, 'Studi Independen', 'building-cottage', '2023-05-22 13:51:32', '2023-05-22 13:51:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max` tinyint(4) NOT NULL DEFAULT 1,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `file_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `max`, `status`, `file_1`, `file_2`, `created_at`, `updated_at`) VALUES
(1, 'Yayasan Rajata', 'Ki. Ters. Buah Batu No. 255', 13, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(2, 'Perum Gunawan Agustina', 'Dk. Yos No. 89', 11, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(3, 'CV Nuraini Wibisono', 'Jr. Bayam No. 535', 10, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(4, 'Yayasan Lailasari Setiawan (Persero) Tbk', 'Jln. Flores No. 543', 19, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(5, 'PT Permadi', 'Dk. Bata Putih No. 36', 12, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(6, 'Yayasan Laksmiwati', 'Dk. Pahlawan No. 383', 19, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(7, 'Yayasan Simanjuntak Utami Tbk', 'Ds. Babakan No. 835', 14, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(8, 'PJ Damanik', 'Kpg. Abdul. Muis No. 874', 5, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(9, 'PJ Andriani Handayani Tbk', 'Jr. Banda No. 245', 7, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(10, 'Yayasan Permata (Persero) Tbk', 'Jr. Cikutra Barat No. 287', 17, 'active', NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company_documents`
--

CREATE TABLE `company_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `name`, `semester`, `created_at`, `updated_at`) VALUES
(1, 1, 'Praktek Etika Profesi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(2, 1, 'Praktek Interpersonal Skills', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(3, 1, 'Praktek Interpersonal Skills', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(4, 1, 'Praktek Analisis Sistem Informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(5, 1, 'Praktek Implementasi Teknologi Informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(6, 1, 'Praktek Etika Profesi Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(7, 1, 'Praktek Interpersonal Skills Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(8, 1, 'Praktek Interpersonal Skills Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(9, 1, 'Praktek Analisis Sistem Informasi Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(10, 1, 'Praktek Implementasi Teknologi Informasi Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(11, 1, 'Riset Sistem Informasi (Seminar)', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(12, 2, 'Praktek Manajemen Proyek', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(13, 2, 'Praktek Analisis Sistem Informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(14, 2, 'Praktek Perancangan Sistem Informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(15, 2, 'Praktek Implementasi Sistem Informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(16, 2, 'Praktek Pengujian Sistem Informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(17, 2, 'Praktek Manajemen Proyek Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(18, 2, 'Praktek Analisis Sistem Informasi Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(19, 2, 'Praktek Perancangan Sistem Informasi Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(20, 2, 'Praktek Implementasi Sistem Informasi Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(21, 2, 'Praktek Pengujian Sistem Informasi Lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(22, 2, 'Riset Sistem Informasi (Seminar)', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(23, 3, 'Perancangan monitoring kegiatan project independent', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(24, 3, 'Analisis sistem informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(25, 3, 'Perancangan sistem informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(26, 3, 'Implementasi sistem informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(27, 3, 'Pengujian sistem informasi', 6, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(28, 3, 'Perancangan monitoring kegiatan project independent lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(29, 3, 'Analisis sistem informasi lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(30, 3, 'Perancangan sistem informasi lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(31, 3, 'Implementasi sistem informasi lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(32, 3, 'Pengujian sistem informasi lanjut', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(33, 3, 'Riset Sistem Informasi (Seminar)', 7, '2023-05-22 13:51:34', '2023-05-22 13:51:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daily_reports`
--

CREATE TABLE `daily_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daily_reports`
--

INSERT INTO `daily_reports` (`id`, `student_id`, `date`, `start`, `end`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 23, '2023-06-24', '12:00:00', '13:00:00', 'membuat surat', 'reports/photo_646cfc48eda81.jpg', '2023-05-23 17:47:52', '2023-05-23 17:47:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `information`
--

INSERT INTO `information` (`id`, `title`, `description`, `photo`, `date`, `created_at`, `updated_at`) VALUES
(1, 'A rerum perspiciatis.', 'Sit totam quibusdam laborum quia. Labore molestiae sit aut delectus quisquam porro consequatur. Sit impedit fuga iste error.', NULL, '2009-09-01', '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(2, 'Unde dolores qui sint.', 'Fugiat velit deserunt error sed quo dolore nobis. Ut adipisci et beatae sit. Dolores quis atque excepturi labore possimus quod veniam error.', NULL, '2013-05-20', '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(3, 'Cumque consectetur earum ea perferendis.', 'Vel corrupti in necessitatibus maxime. Asperiores illum atque vero maxime earum voluptatum cumque maxime. Dolorem sequi consequuntur asperiores explicabo ullam. Nemo porro reprehenderit hic amet.', NULL, '1988-07-27', '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(4, 'Aliquam illum.', 'Minus voluptatum magnam velit facere deserunt ad omnis. Eos et et vero veniam omnis et. Sequi dolore ea corporis dolores voluptatem exercitationem nemo. Nostrum est harum eum mollitia impedit.', NULL, '1978-09-01', '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(5, 'Dolore quas perferendis illum.', 'Quam voluptas aut cum cupiditate harum. Fugit aut amet eum error expedita consectetur error laudantium. Sed dolore sed non rerum nulla dolores exercitationem.', NULL, '1990-12-06', '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(6, 'Et sed doloremque.', 'Cupiditate reiciendis recusandae facilis quidem praesentium magni aliquid. Quas praesentium veritatis aperiam quos eos ut. Sunt perspiciatis ab dolor nostrum necessitatibus est.', NULL, '2016-06-16', '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(7, 'Distinctio provident.', 'Vitae saepe neque consequuntur. Qui voluptate distinctio laboriosam animi voluptates id. Cumque saepe qui omnis maxime numquam at asperiores facilis. Fuga modi accusamus quo libero et minus.', NULL, '2003-12-16', '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(8, 'Expedita nisi voluptate.', 'Nihil sunt eum itaque aut. Accusamus doloribus ullam tenetur et rerum distinctio. Distinctio accusamus veritatis expedita qui laboriosam ut est.', NULL, '2002-08-25', '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(9, 'Et facilis id itaque.', 'Quisquam ex suscipit ut similique blanditiis hic quo. Maiores mollitia laboriosam quas. Vel error et incidunt numquam esse.', NULL, '1982-10-20', '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(10, 'Reiciendis voluptas voluptates pariatur.', 'Quia dicta qui accusamus voluptatem ut architecto. Nesciunt placeat sit ea rerum natus delectus. Nulla dolorum et itaque culpa occaecati.', NULL, '1990-06-11', '2023-05-22 13:51:34', '2023-05-22 13:51:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `internships`
--

CREATE TABLE `internships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('register','apply') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'apply',
  `status` enum('pending','processed','signed','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `mou` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signed_mou` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `internships`
--

INSERT INTO `internships` (`id`, `student_id`, `company_id`, `type`, `status`, `mou`, `signed_mou`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 'apply', 'accepted', NULL, NULL, '2023-05-23 17:18:13', '2023-05-23 17:18:25'),
(2, 7, 3, 'apply', 'accepted', NULL, NULL, '2023-05-23 17:28:03', '2023-05-23 17:28:13'),
(3, 40, 3, 'apply', 'accepted', NULL, NULL, '2023-05-23 17:57:08', '2023-05-23 17:57:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `last_reports`
--

CREATE TABLE `last_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `last_report_files`
--

CREATE TABLE `last_report_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_report_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lecturer_students`
--

CREATE TABLE `lecturer_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lecturer_students`
--

INSERT INTO `lecturer_students` (`id`, `lecturer_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 3, 15, NULL, NULL),
(2, 3, 35, NULL, NULL),
(3, 2, 5, NULL, NULL),
(4, 39, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_categories_table', 1),
(2, '2014_10_11_000000_create_companies_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_02_03_143237_create_company_documents_table', 1),
(8, '2023_02_03_143244_create_schedules_table', 1),
(9, '2023_02_03_143252_create_daily_reports_table', 1),
(10, '2023_02_03_143259_create_last_reports_table', 1),
(11, '2023_02_03_143313_create_last_report_files_table', 1),
(12, '2023_02_03_144319_create_lecturer_students_table', 1),
(13, '2023_02_03_145509_create_internships_table', 1),
(14, '2023_02_22_214933_create_information_table', 1),
(15, '2023_05_22_202236_create_courses_table', 1),
(16, '2023_05_22_202257_create_scores_table', 1);

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
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schedules`
--

INSERT INTO `schedules` (`id`, `lecturer_id`, `date`, `start`, `end`, `room`, `created_at`, `updated_at`) VALUES
(1, 39, '2023-05-24', '12:00:00', '13:00:00', '8', '2023-05-23 17:44:57', '2023-05-23 17:44:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `scores`
--

INSERT INTO `scores` (`id`, `course_id`, `student_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 23, 34, 90, '2023-05-22 13:51:37', '2023-05-22 13:52:03'),
(2, 24, 34, 85, '2023-05-22 13:51:37', '2023-05-22 13:51:37'),
(3, 25, 34, 90, '2023-05-22 13:51:37', '2023-05-22 13:51:37'),
(4, 26, 34, 95, '2023-05-22 13:51:37', '2023-05-22 13:51:37'),
(5, 27, 34, 90, '2023-05-22 13:51:37', '2023-05-22 13:51:37'),
(6, 12, 15, 93, '2023-05-23 05:44:43', '2023-05-23 05:56:47'),
(7, 13, 15, 93, '2023-05-23 05:44:43', '2023-05-23 05:56:47'),
(8, 14, 15, 90, '2023-05-23 05:44:43', '2023-05-23 05:44:43'),
(9, 15, 15, 95, '2023-05-23 05:44:43', '2023-05-23 05:56:33'),
(10, 16, 15, 90, '2023-05-23 05:44:43', '2023-05-23 05:56:29'),
(11, 17, 35, 98, '2023-05-23 06:05:22', '2023-05-23 06:05:22'),
(12, 18, 35, 98, '2023-05-23 06:05:22', '2023-05-23 06:05:22'),
(13, 19, 35, 100, '2023-05-23 06:05:22', '2023-05-23 06:05:22'),
(14, 20, 35, 98, '2023-05-23 06:05:22', '2023-05-23 06:05:22'),
(15, 21, 35, 100, '2023-05-23 06:05:22', '2023-05-23 06:05:22'),
(16, 22, 35, 100, '2023-05-23 06:05:22', '2023-05-23 06:05:22'),
(17, 1, 5, 85, '2023-05-23 17:20:07', '2023-05-23 17:20:07'),
(18, 2, 5, 80, '2023-05-23 17:20:07', '2023-05-23 17:20:07'),
(19, 3, 5, 90, '2023-05-23 17:20:07', '2023-05-23 17:20:07'),
(20, 4, 5, 95, '2023-05-23 17:20:07', '2023-05-23 17:20:07'),
(21, 5, 5, 87, '2023-05-23 17:20:07', '2023-05-23 17:20:07'),
(22, 1, 7, 85, '2023-05-23 17:28:34', '2023-05-23 17:28:34'),
(23, 2, 7, 86, '2023-05-23 17:28:34', '2023-05-23 17:28:34'),
(24, 3, 7, 87, '2023-05-23 17:28:34', '2023-05-23 17:28:34'),
(25, 4, 7, 90, '2023-05-23 17:28:34', '2023-05-23 17:28:34'),
(26, 5, 7, 95, '2023-05-23 17:28:34', '2023-05-23 17:28:34'),
(27, 12, 23, 89, '2023-05-23 17:46:29', '2023-05-23 17:46:29'),
(28, 13, 23, 80, '2023-05-23 17:46:29', '2023-05-23 17:46:29'),
(29, 14, 23, 78, '2023-05-23 17:46:29', '2023-05-23 17:46:29'),
(30, 15, 23, 87, '2023-05-23 17:46:29', '2023-05-23 17:46:29'),
(31, 16, 23, 88, '2023-05-23 17:46:29', '2023-05-23 17:46:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','student','head','lecturer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `semester` tinyint(4) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `npm`, `email`, `gender`, `phone`, `address`, `role`, `category_id`, `email_verified_at`, `password`, `status`, `semester`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, 'admin@gmail.com', 'Male', '0981 5253 130', 'Psr. Abdullah No. 386, Binjai 41365, DIY', 'admin', NULL, NULL, '$2y$10$zZXoDZiX7v9kr/.xFeaFYOpn8voKJWu4da30M.hhP6RwPpE80Ozx6', 'active', NULL, NULL, NULL, '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(2, 'Dosen 1', NULL, 'dosen1@gmail.com', 'Male', '(+62) 248 1569 081', 'Jln. Otista No. 695, Tual 54526, Sulut', 'lecturer', 1, NULL, '$2y$10$YUrnVSEFAncFTWOrwS8la.f1U6njB7gcJ218TSZr/0KlQLZNpA30S', 'active', NULL, NULL, NULL, '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(3, 'Dosen 2', NULL, 'dosen2@gmail.com', 'Female', '(+62) 545 2144 1067', 'Ds. Jagakarsa No. 870, Surabaya 34476, Bengkulu', 'lecturer', 2, NULL, '$2y$10$FADhJJtAT..7VPrcyZKRy.RfqFHwgYn6rgiIt8imUsrNONq3rmFhG', 'active', NULL, NULL, NULL, '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(4, 'Dosen 3', NULL, 'dosen3@gmail.com', 'Male', '0216 2519 633', 'Kpg. Yos No. 97, Cimahi 36616, Pabar', 'lecturer', 3, NULL, '$2y$10$J/CPZf2iprdNASwHTognMepsl57Xr06wnfTBNuJzrIXMEarZTGDOO', 'active', NULL, NULL, NULL, '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(5, 'Kamaria Permata', '2416892296', 'mahasiswa1@gmail.com', 'Male', '0503 6024 372', 'Ds. Gremet No. 891, Bontang 64763, Kalsel', 'student', 1, NULL, '$2y$10$QDlVc/sT8aKdOiqIOMNWYOAQuCwq4gTLLL/dVL8EQV3O6t6cLrhQe', 'active', 6, NULL, NULL, '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(6, 'Sadina Intan Wulandari S.Pt', '2482452262', 'mahasiswa2@gmail.com', 'Male', '0311 8493 9255', 'Ds. Dahlia No. 614, Dumai 97762, Riau', 'student', 1, NULL, '$2y$10$zX/PF7ebl0tqQ2H21QXUcekCeXPD3/Sz1vfdxHQcjocsinwYPezWi', 'active', 6, NULL, NULL, '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(7, 'Hamima Fitriani Lestari', '2433644408', 'mahasiswa3@gmail.com', 'Female', '(+62) 998 5019 1838', 'Ki. Sunaryo No. 334, Padangpanjang 31364, Kaltara', 'student', 1, NULL, '$2y$10$3fL7jfDkiaclTiV4rk7AWOrXq0qSfSW00RuEEZJJejtilXNO1DewK', 'active', 6, NULL, NULL, '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(8, 'Gantar Hari Prasetyo M.Farm', '2414179874', 'mahasiswa4@gmail.com', 'Male', '(+62) 681 2509 791', 'Ki. Salatiga No. 524, Ambon 11019, Bengkulu', 'student', 1, NULL, '$2y$10$TRggOT73shTntNbtaEEM7uUXAcWu2GShrgA/hWZyzoT/tZwd7KrtW', 'active', 6, NULL, NULL, '2023-05-22 13:51:32', '2023-05-22 13:51:32'),
(9, 'Uli Yulianti M.M.', '2498579406', 'mahasiswa5@gmail.com', 'Female', '(+62) 27 9076 103', 'Jln. Yohanes No. 924, Gunungsitoli 59230, Kaltara', 'student', 1, NULL, '$2y$10$F0EcUreaK0s51axfXjB01.ICiAF22lI4Yr2oHHbP3oh14thFSg96a', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(10, 'Suci Anggraini S.Pd', '2486823913', 'mahasiswa6@gmail.com', 'Female', '0827 149 263', 'Jln. Dipenogoro No. 106, Medan 78214, Lampung', 'student', 1, NULL, '$2y$10$J5x1QjhKTwjPfGVNropfCe4sXxBuHqHoSdS4iKIuwjl6fumjPKKi2', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(11, 'Jarwadi Dasa Kuswoyo S.Farm', '2446742097', 'mahasiswa7@gmail.com', 'Female', '0802 679 607', 'Jln. Bata Putih No. 581, Pariaman 54522, Gorontalo', 'student', 1, NULL, '$2y$10$ISfbt/JsAHJEXgrD4VcTv.7rbH23GByjGwEMzVGDPP0QUdVJcASAa', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(12, 'Endah Prastuti', '2415115244', 'mahasiswa8@gmail.com', 'Male', '(+62) 674 9899 0621', 'Ds. Pasteur No. 851, Administrasi Jakarta Selatan 54739, Lampung', 'student', 1, NULL, '$2y$10$0n9uAetW68g9ncwWW71Id.9GAOVFhuE4nEjU0VxJJ.2gFi6VM2oPa', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(13, 'Prayogo Hakim M.Kom.', '2410281828', 'mahasiswa9@gmail.com', 'Female', '(+62) 661 8721 9937', 'Jr. Hasanuddin No. 178, Mojokerto 76673, Banten', 'student', 1, NULL, '$2y$10$/zCma9BPN1Jn6zwby1d0yelgOaY8HlNNykj/Oj/XA9/jaYSaTAqVC', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(14, 'Dimaz Hutagalung M.Ak', '2429779633', 'mahasiswa10@gmail.com', 'Male', '023 9036 7970', 'Ki. Lembong No. 603, Tangerang 78596, Kalsel', 'student', 1, NULL, '$2y$10$qD424YWspKsLrFz0xVxmieRIZXMfP6tldPlIZpzwC4bdVuu.Jkzcy', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(15, 'Puput Fujiati', '2443902103', 'mahasiswa11@gmail.com', 'Male', '(+62) 843 337 183', 'Ki. Jend. A. Yani No. 881, Malang 60518, Kaltim', 'student', 2, NULL, '$2y$10$p8cSTF0VhobwBL.NqSTteuNhtCSUU7tuomWT9NdrztR.1e/mUrk9O', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(16, 'Samsul Hutapea', '2485888505', 'mahasiswa12@gmail.com', 'Male', '0774 4508 673', 'Jr. Thamrin No. 51, Bengkulu 24454, Aceh', 'student', 2, NULL, '$2y$10$5yrYvJ4E5DOj.GO4ZiBa5eoU36.qchnXgUWk9D9ptcOER60zNkYVq', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(17, 'Waluyo Waskita', '2476024818', 'mahasiswa13@gmail.com', 'Female', '(+62) 237 4900 556', 'Ki. Bawal No. 523, Banjar 46800, Bengkulu', 'student', 2, NULL, '$2y$10$C4Y5KhG17UyC3jiNAhOSKu2n4aQTm6xSX/KTfpFGGYo.qxbMA3nbe', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(18, 'Kani Rahmi Prastuti S.E.', '2494853350', 'mahasiswa14@gmail.com', 'Female', '(+62) 472 0362 622', 'Ki. Abang No. 305, Sukabumi 89862, NTB', 'student', 2, NULL, '$2y$10$yurH9QsCIDfRYjIVOdumfuU48uq3ima6dseGukijouStvD.7qqgli', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(19, 'Malika Anggraini S.I.Kom', '2478497483', 'mahasiswa15@gmail.com', 'Female', '0563 7144 333', 'Jr. Labu No. 2, Ternate 12644, Papua', 'student', 2, NULL, '$2y$10$e/qwSaa6pofj7JyXHCNfwuXTT5Ut5/m46XdL1QIlMOhNc7b3oDXVq', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(20, 'Edi Utama S.Farm', '2484846197', 'mahasiswa16@gmail.com', 'Male', '(+62) 904 0441 864', 'Ki. Abdul No. 664, Kediri 50349, Bengkulu', 'student', 2, NULL, '$2y$10$6zPqC41OgQmj8svClpv4eeXJeQgGZaxcS/QXQkj2epxsUjlN4fTJC', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(21, 'Hilda Widiastuti S.I.Kom', '2495701373', 'mahasiswa17@gmail.com', 'Male', '0888 5905 1300', 'Gg. Bank Dagang Negara No. 84, Surakarta 34289, Jatim', 'student', 2, NULL, '$2y$10$xWHaNx9n5kEW5HIPoHQ4YOvHMwvUSv7vZGabolJXHSdoT9OudmWwS', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(22, 'Laswi Drajat Dabukke S.Kom', '2461427329', 'mahasiswa18@gmail.com', 'Female', '(+62) 922 9685 1953', 'Dk. Sumpah Pemuda No. 751, Pasuruan 71062, Sulbar', 'student', 2, NULL, '$2y$10$.0LKqtYfH4oB2/JUdZiwmO2e0FI.g5C.16Sz3FxLucufsgS.x1YMi', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-22 13:51:33'),
(23, 'Dian Perdiansyah', 'D1A190080', 'dian@gmail.com', 'Male', '0744 9334 545', 'Jln. Ahmad Dahlan No. 493, Jayapura 12650, NTB', 'student', 2, NULL, '$2y$10$YzU1NJoquSs5Y.su9VRUdusQKTCd/i5cOCa7/5902tTZ/eHyhrg.6', 'active', 6, NULL, NULL, '2023-05-22 13:51:33', '2023-05-23 17:54:40'),
(24, 'Jumadi Hardana Saputra S.Pd', '2486465555', 'mahasiswa20@gmail.com', 'Male', '(+62) 966 8503 5114', 'Gg. Eka No. 670, Kotamobagu 48868, NTT', 'student', 2, NULL, '$2y$10$nykqEvUHUE3J6M/3TKGUm.ESHpJVqQIXayBSL0wLqgSNlRRwtILQK', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(25, 'Gamanto Thamrin', '2446694413', 'mahasiswa21@gmail.com', 'Female', '(+62) 853 2691 098', 'Psr. Camar No. 641, Bandung 59971, Aceh', 'student', 3, NULL, '$2y$10$V0MLfRDBAmLlVQRghLOH3.bYXqmV620UjAWeuap2VQ.UIBvQU3KPK', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(26, 'Zaenab Kuswandari S.Gz', '2441351243', 'mahasiswa22@gmail.com', 'Male', '(+62) 548 2188 7317', 'Psr. Kyai Mojo No. 720, Administrasi Jakarta Barat 96434, Bali', 'student', 3, NULL, '$2y$10$ikQ/mc/S2ur4ZgxmgUQFneGGi1y.R2tydcGmKw3H/wln5r2kmky8q', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(27, 'Eli Kusmawati', '2458429357', 'mahasiswa23@gmail.com', 'Male', '(+62) 942 9047 176', 'Ds. Dipatiukur No. 982, Tangerang Selatan 23047, Kalsel', 'student', 3, NULL, '$2y$10$lhAEY7cM9eg8u28E7Cz5HO/v/byyXxTGg5/TPI9AoWwMpY.SCKQeS', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(28, 'Artawan Waluyo', '2482981386', 'mahasiswa24@gmail.com', 'Male', '(+62) 276 5557 106', 'Ki. Honggowongso No. 107, Padang 27210, Sulsel', 'student', 3, NULL, '$2y$10$IYXxNIJ0wQ3bL0YlcMFaQel4S5zEUIZAGjxp2Vvy27.fbYQbuu9dG', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(29, 'Queen Oktaviani', '2480982452', 'mahasiswa25@gmail.com', 'Female', '0791 7736 6478', 'Ki. Sampangan No. 687, Palu 40794, Bengkulu', 'student', 3, NULL, '$2y$10$L6SGjYj8RD5n.GISqMPgVeDA9xO6A/jS8G.oy4t9seFl8EUqhg8di', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(30, 'Galang Hidayanto', '2424786817', 'mahasiswa26@gmail.com', 'Male', '0700 0491 8816', 'Dk. Lumban Tobing No. 212, Pekalongan 31583, NTT', 'student', 3, NULL, '$2y$10$HIo6BNOypWseGydW34Nr5.YSwhnFrfRzuLrASL8wAvUY0Tmir1c76', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(31, 'Bakiadi Lazuardi S.H.', '2489542185', 'mahasiswa27@gmail.com', 'Female', '(+62) 802 256 652', 'Jln. K.H. Maskur No. 352, Tangerang Selatan 43992, Jambi', 'student', 3, NULL, '$2y$10$fYONFkYdAwF1Dri5LGoKuunKZJ4mnDbD3wMcVcg9f4jkmJoyf2Y4C', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(32, 'Kala Emin Najmudin S.Farm', '2470691825', 'mahasiswa28@gmail.com', 'Male', '(+62) 912 5284 094', 'Psr. Suryo No. 459, Mataram 67176, Bengkulu', 'student', 3, NULL, '$2y$10$GS8tg4/sxRgy0vtR2VPfJ.H4X2eP8oOSixvTq7B1MHTAnGug8MChi', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(33, 'Unggul Laswi Wacana', '2497964492', 'mahasiswa29@gmail.com', 'Female', '(+62) 468 3736 7109', 'Ds. Karel S. Tubun No. 253, Sungai Penuh 25742, Riau', 'student', 3, NULL, '$2y$10$jRATKqT126BX4XgXnyyMteRmnFRps.s7GAoAXZSPDXiIwC9iSWUtq', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(34, 'Usyi Kayla Nasyiah', '2441924742', 'mahasiswa30@gmail.com', 'Female', '(+62) 26 8387 914', 'Ki. Asia Afrika No. 168, Bukittinggi 56002, Sulteng', 'student', 3, NULL, '$2y$10$OrbVnZ7pIeQc6rHR9Ge1SuBY9cKnC1XHaqhlnhccXwU0W7Y8Wmk2u', 'active', 6, NULL, NULL, '2023-05-22 13:51:34', '2023-05-22 13:51:34'),
(35, 'Puput Fujiati', '2443902103', 'mahasiswa11@gmail.com', 'Male', '(+62) 843 337 183', 'Ki. Jend. A. Yani No. 881, Malang 60518, Kaltim', 'student', 2, NULL, '$2y$10$p8cSTF0VhobwBL.NqSTteuNhtCSUU7tuomWT9NdrztR.1e/mUrk9O', 'active', 7, NULL, NULL, '2023-05-23 06:02:18', '2023-05-23 06:02:55'),
(36, 'Kamaria Permata', '2416892296', 'mahasiswa1@gmail.com', 'Male', '0503 6024 372', 'Ds. Gremet No. 891, Bontang 64763, Kalsel', 'student', 1, NULL, '$2y$10$QDlVc/sT8aKdOiqIOMNWYOAQuCwq4gTLLL/dVL8EQV3O6t6cLrhQe', 'active', 7, NULL, NULL, '2023-05-23 17:17:14', '2023-05-23 17:17:38'),
(37, 'Sadina Intan Wulandari S.Pt', '2482452262', 'mahasiswa2@gmail.com', 'Male', '0311 8493 9255', 'Ds. Dahlia No. 614, Dumai 97762, Riau', 'student', 3, NULL, '$2y$10$zX/PF7ebl0tqQ2H21QXUcekCeXPD3/Sz1vfdxHQcjocsinwYPezWi', 'active', 7, NULL, NULL, '2023-05-23 17:26:33', '2023-05-23 17:26:49'),
(38, 'Hamima Fitriani Lestari', '2433644408', 'mahasiswa3@gmail.com', 'Female', '(+62) 998 5019 1838', 'Ki. Sunaryo No. 334, Padangpanjang 31364, Kaltara', 'student', 2, NULL, '$2y$10$3fL7jfDkiaclTiV4rk7AWOrXq0qSfSW00RuEEZJJejtilXNO1DewK', 'active', 7, NULL, NULL, '2023-05-23 17:29:38', '2023-05-23 17:29:45'),
(39, 'Maya Destriani', NULL, 'maya@gmail.com', 'Male', '123456', 'Subang', 'lecturer', 2, NULL, '$2y$10$QxPFuFqZ7Vdt6P.FkRH0OeagJzpNyeeUA7ChY..2itMqeUnTpKJqS', 'active', NULL, NULL, NULL, '2023-05-23 17:40:54', '2023-05-23 17:40:54'),
(40, 'Dian Perdiansyah', 'D1A190080', 'dian@gmail.com', 'Male', '0744 9334 545', 'Jln. Ahmad Dahlan No. 493, Jayapura 12650, NTB', 'student', 1, NULL, '$2y$10$YzU1NJoquSs5Y.su9VRUdusQKTCd/i5cOCa7/5902tTZ/eHyhrg.6', 'active', 7, NULL, NULL, '2023-05-23 17:56:01', '2023-05-23 17:56:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `company_documents`
--
ALTER TABLE `company_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_documents_company_id_foreign` (`company_id`);

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `daily_reports`
--
ALTER TABLE `daily_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_reports_student_id_foreign` (`student_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internships_student_id_foreign` (`student_id`),
  ADD KEY `internships_company_id_foreign` (`company_id`);

--
-- Indeks untuk tabel `last_reports`
--
ALTER TABLE `last_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_reports_student_id_foreign` (`student_id`);

--
-- Indeks untuk tabel `last_report_files`
--
ALTER TABLE `last_report_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_report_files_last_report_id_foreign` (`last_report_id`);

--
-- Indeks untuk tabel `lecturer_students`
--
ALTER TABLE `lecturer_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecturer_students_lecturer_id_foreign` (`lecturer_id`),
  ADD KEY `lecturer_students_student_id_foreign` (`student_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_lecturer_id_foreign` (`lecturer_id`);

--
-- Indeks untuk tabel `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_course_id_foreign` (`course_id`),
  ADD KEY `scores_student_id_foreign` (`student_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `company_documents`
--
ALTER TABLE `company_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `daily_reports`
--
ALTER TABLE `daily_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `internships`
--
ALTER TABLE `internships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `last_reports`
--
ALTER TABLE `last_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `last_report_files`
--
ALTER TABLE `last_report_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lecturer_students`
--
ALTER TABLE `lecturer_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `company_documents`
--
ALTER TABLE `company_documents`
  ADD CONSTRAINT `company_documents_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daily_reports`
--
ALTER TABLE `daily_reports`
  ADD CONSTRAINT `daily_reports_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internships_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `last_reports`
--
ALTER TABLE `last_reports`
  ADD CONSTRAINT `last_reports_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `last_report_files`
--
ALTER TABLE `last_report_files`
  ADD CONSTRAINT `last_report_files_last_report_id_foreign` FOREIGN KEY (`last_report_id`) REFERENCES `last_reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lecturer_students`
--
ALTER TABLE `lecturer_students`
  ADD CONSTRAINT `lecturer_students_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lecturer_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
