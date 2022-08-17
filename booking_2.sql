-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 11:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bukti_bayar`, `no_invoice`, `tanggal`, `products_id`, `users_id`, `status_id`, `jumlah`, `tagihan`, `created_at`, `updated_at`) VALUES
(31, 'terserah', 'va-1660640381', '2022-08-11', 33, 1, 1, 1, 20000, '2022-08-16 01:59:41', '2022-08-17 00:01:41'),
(32, NULL, 'va-1660640381', '2022-08-11', 33, 1, 2, 1, 20000, '2022-08-16 23:55:12', '2022-08-16 23:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(26, 'name category', '2022-08-16 23:42:24', '2022-08-16 23:42:24');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_15_031641_create_categories_table', 1),
(6, '2022_08_15_031655_create_products_table', 1),
(7, '2022_08_15_031713_create_booking_table', 1),
(8, '2022_08_15_031750_create_transaction_table', 1),
(9, '2022_08_15_150116_create_status_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 13, 'myAppToken', '74d15894596ad7531d682c10b7bbae2c242cc5ccad3410f292fa75b4f7c9f15e', '[\"*\"]', NULL, '2022-08-17 01:38:47', '2022-08-17 01:38:47'),
(2, 'App\\Models\\User', 13, 'myAppToken', 'f13f44f4b326cbd15293f593b4b84a74385acfcd194170f22b41c9fb87d8bac3', '[\"*\"]', NULL, '2022-08-17 01:39:59', '2022-08-17 01:39:59'),
(3, 'App\\Models\\User', 13, 'myAppToken', '5e54cdf7686f4cca8a5b6b31544ab5b10a127634be6750ddddce827f961b78e2', '[\"*\"]', NULL, '2022-08-17 01:40:08', '2022-08-17 01:40:08'),
(4, 'App\\Models\\User', 13, 'myAppToken', '5f7a0553295616cac0de2aa102d278c53949b15e11d0f09f70ff2f1d44e40e49', '[\"*\"]', NULL, '2022-08-17 01:41:23', '2022-08-17 01:41:23'),
(5, 'App\\Models\\User', 13, 'myAppToken', '0f29c9126a1dee36a8560716f795cd490abbaf9e8816b53402e3672e6eef2b84', '[\"*\"]', NULL, '2022-08-17 01:42:31', '2022-08-17 01:42:31'),
(6, 'App\\Models\\User', 13, 'myAppToken', '841ac8d7d122582b3ee32e6f81d626e9097c09d6c4ac85bcee77f323302b9acf', '[\"*\"]', NULL, '2022-08-17 01:42:36', '2022-08-17 01:42:36'),
(7, 'App\\Models\\User', 1, 'myAppToken', '00ebb111cc7b4fa82089d6f23a5d3d89ac76fdec13889d0f14661d54bbce5589', '[\"*\"]', '2022-08-17 02:25:15', '2022-08-17 02:18:05', '2022-08-17 02:25:15'),
(9, 'App\\Models\\User', 1, 'myAppToken', '99a8806065303297d13899947842df23c8e948ec48c98e8ebb3994026bfc0c8e', '[\"*\"]', NULL, '2022-08-17 02:28:48', '2022-08-17 02:28:48'),
(10, 'App\\Models\\User', 1, 'myAppToken', 'bbf90e825762a67e053f19b6dea449133957daf05995efbea03d302f5273953c', '[\"*\"]', '2022-08-17 02:31:27', '2022-08-17 02:29:03', '2022-08-17 02:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `stock`, `harga`, `categories_id`, `created_at`, `updated_at`) VALUES
(33, 'KAMAR MAWAR', 'sdsd-677681427_1660640368.jpeg', 20, 20000, 25, '2022-08-16 01:59:28', '2022-08-16 01:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'sedang di periksa', NULL, NULL),
(2, 'diterima / silahkan melakukan pembayaran', NULL, NULL),
(3, 'DI BATALKAN', NULL, NULL),
(4, 'Booking Kamar terkonfirmasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `tanggal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_invoice` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `booking_id`, `products_id`, `tanggal`, `no_invoice`, `created_at`, `updated_at`) VALUES
(25, 31, 33, '2022-08-11', NULL, '2022-08-16 01:59:41', '2022-08-16 01:59:41'),
(26, 32, 33, '2022-08-11', NULL, '2022-08-16 23:55:13', '2022-08-16 23:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nanda', 'admin', 'nanda@gmail.com', NULL, '$2y$10$/KSCvb4IKQYPJkFOTzFQN.yVltPzzxDb7VxPEIdY97XyxLTfi3f.2', NULL, '2022-08-14 20:44:01', '2022-08-14 20:44:01'),
(2, 'cinta@gmail.com', 'pelanggan', 'cinta@gmail.com', NULL, '$2y$10$AYUE8Rw8yys.CIo6rLAhWOK47dctGrx6OzYkKvtoV3.6ZSpQJ17qq', NULL, '2022-08-14 20:59:35', '2022-08-14 20:59:35'),
(3, 'penyok', 'pelanggan', 'penyok@gmail.com', NULL, '$2y$10$SeSaTnOVXJnpumBD79w/DuRANxkRJz06bzEIZFNUE0Qsdl7f1ZeQu', NULL, '2022-08-14 21:38:47', '2022-08-14 21:38:47'),
(4, 'dsdsds', 'pelanggan', 'anjiiing@gmail.com', NULL, '$2y$10$t7VDjGE5PU8FfACwSxXfk.z5.cg4KAGAhpVK5mDMEtT7amty2ZF4i', NULL, '2022-08-17 01:07:13', '2022-08-17 01:07:13'),
(5, 'dsdsds', 'pelanggan', 'anjiiidng@gmail.com', NULL, '$2y$10$rorX0AaQ7DvhO3/sEaiaYeItRVdjxE55xUGQ5BLtkpMYkVM/1GZj6', NULL, '2022-08-17 01:16:13', '2022-08-17 01:16:13'),
(6, 'dsdsds', 'pelanggan', 'dadadadadadada@gmail.com', NULL, '$2y$10$sZRYXy/Mczov2fuTjsc9s.xC3qhrQP1W5woycdU9sHa5meEeNNY9G', NULL, '2022-08-17 01:19:38', '2022-08-17 01:19:38'),
(7, 'dsdsds', 'pelanggan', 'anjiijjjjjjjjjjjjjjjjjjjjjjjjing@gmail.com', NULL, '$2y$10$AoEtts6GEYPpI1NWRd4juuBvUFJHpiSGfTRtyXgQdlNIDO3/kT3YG', NULL, '2022-08-17 01:22:43', '2022-08-17 01:22:43'),
(8, 'dsdsds', 'pelanggan', 'asuuuuuuuuuuuuu@gmail.com', NULL, '$2y$10$ryZoUYFHRQohol7fGkRnK.zIIGMeJouE4h5PHzimoIgnEBBtkRI2a', NULL, '2022-08-17 01:25:20', '2022-08-17 01:25:20'),
(10, 'dsdsds', 'pelanggan', 'asuuuuurereruuuuuuuu@gmail.com', NULL, '$2y$10$5OodrWC34GSEdVuijzWvOu0rlveLib8QjRZ96vTWayqtQDH6L1KYe', NULL, '2022-08-17 01:30:14', '2022-08-17 01:30:14'),
(11, 'dsdsds', 'pelanggan', 'asfdfddsdsdsdsdsdsduuuuurereruuuuuuuu@gmail.com', NULL, '$2y$10$jgt9of4BziEfPgz8SP2RxOKbBxAz2euLCaADO/S.mrys0STLt2hW2', NULL, '2022-08-17 01:30:56', '2022-08-17 01:30:56'),
(12, 'dsdsds', 'pelanggan', 'asfdfddsdsdsdsdsdsduuudsduurereruuuuuuuu@gmail.com', NULL, '$2y$10$us7bIqMXngHPJB3cj21NMOXNp5Qqeekgu2M.9tpDUPhJbXJyWFNQi', NULL, '2022-08-17 01:35:49', '2022-08-17 01:35:49'),
(13, 'dsdsds', 'pelanggan', 'asfdfddsdsdsdsdsdsduuudsduurerdseruuuuuuuu@gmail.com', NULL, '$2y$10$7FhUeZ/k8T4VFDqOIV4OSuIiJUkAq4sUROCn6ImRVxFds6Gn2y6Ci', NULL, '2022-08-17 01:38:47', '2022-08-17 01:38:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
