-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2022 pada 17.13
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post_json`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id_company` int(10) UNSIGNED NOT NULL,
  `name_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id_company`, `name_company`, `created_at`, `updated_at`) VALUES
(7, 'mycompany', '2022-02-01 09:06:07', '2022-02-01 09:06:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company_contacts`
--

CREATE TABLE `company_contacts` (
  `id_company_contact` int(10) UNSIGNED NOT NULL,
  `id_company` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `company_contacts`
--

INSERT INTO `company_contacts` (`id_company_contact`, `id_company`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 7, '123-123-1234', 'myemail@domain.com', '2022-02-01 09:06:07', '2022-02-01 09:06:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_employees`
--

CREATE TABLE `contact_employees` (
  `id_contact_employees` int(10) UNSIGNED NOT NULL,
  `id_employees` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contact_employees`
--

INSERT INTO `contact_employees` (`id_contact_employees`, `id_employees`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(3, 6, '123-123-1234', 'myemail@domain.com', '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(4, 7, '123-123-1234', 'myemail@domain.com', '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(5, 9, '083848065143', 'wnever053@gmail.com', '2022-03-05 22:40:30', '2022-03-05 22:40:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id_employees` int(10) UNSIGNED NOT NULL,
  `id_company` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date_of_employment` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id_employees`, `id_company`, `first_name`, `last_name`, `age`, `gender`, `department`, `start_date_of_employment`, `created_at`, `updated_at`) VALUES
(6, 7, 'Tony', 'Dep', 24, 'Male', 'HSE', '2021-12-12', '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(7, 7, 'Henry', 'Joe', 24, 'Male', 'HSE', '2021-12-12', '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(9, 7, 'Dion', 'Maulana', 23, 'Male', 'IT', '2022-03-06', '2022-03-05 22:40:30', '2022-03-05 22:40:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_02_01_133003_create_companies_table', 1),
(4, '2022_02_01_133022_create_company_contacts_table', 1),
(5, '2022_02_01_133041_create_training_modules_table', 1),
(6, '2022_02_01_133102_create_employees_table', 1),
(7, '2022_02_01_133122_create_contact_employees_table', 1),
(8, '2022_02_01_133139_create_training_employees_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `training_employees`
--

CREATE TABLE `training_employees` (
  `id_trainig_employees` int(10) UNSIGNED NOT NULL,
  `id_employees` int(10) UNSIGNED NOT NULL,
  `module_attended` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_date` date NOT NULL,
  `training_hour` double NOT NULL,
  `error` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renewal_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `training_employees`
--

INSERT INTO `training_employees` (`id_trainig_employees`, `id_employees`, `module_attended`, `test_date`, `training_hour`, `error`, `status`, `renewal_date`, `created_at`, `updated_at`) VALUES
(5, 6, 'FireFighting', '2021-12-12', 0.6, 0, 'Passed/complete', '2022-12-12', '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(6, 6, 'Evacuation', '2021-12-12', 1.5, 2, 'Passed/complete', '2022-12-12', '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(7, 7, 'FireFighting', '2021-12-12', 0.58, 0, 'Passed/complete', '2022-12-12', '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(8, 7, 'Evacuation', '2021-12-12', 1, 10, 'Passed/incomplete', '2022-12-12', '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(9, 6, 'Leadership', '2022-03-07', 0.3, 2, 'Passed/complete', '2022-03-08', '2022-03-07 06:39:33', '2022-03-07 06:39:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `training_modules`
--

CREATE TABLE `training_modules` (
  `id_training_module` int(10) UNSIGNED NOT NULL,
  `id_company` int(10) UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_training_hour` double DEFAULT NULL,
  `max_training_hour` double DEFAULT NULL,
  `min_training_hour` double DEFAULT NULL,
  `average_error` double DEFAULT NULL,
  `max_error` double DEFAULT NULL,
  `min_error` double DEFAULT NULL,
  `percent_pass` double DEFAULT NULL,
  `percent_fail` double DEFAULT NULL,
  `number_of_participants` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `training_modules`
--

INSERT INTO `training_modules` (`id_training_module`, `id_company`, `module_name`, `average_training_hour`, `max_training_hour`, `min_training_hour`, `average_error`, `max_error`, `min_error`, `percent_pass`, `percent_fail`, `number_of_participants`, `created_at`, `updated_at`) VALUES
(1, 7, 'FireFighting', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(2, 7, 'Evacuation', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-02-01 09:06:07', '2022-02-01 09:06:07'),
(3, 7, 'Leadership', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-05 22:01:07', '2022-03-05 22:01:07'),
(4, 7, 'FirstAid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-05 22:01:28', '2022-03-05 22:01:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user_level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `id_user_level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-03-05 20:28:02', '$2y$10$3I5CcwNhcQC7WYgxbeJTa.8DbD0ilQCzEu28lYxy04eXxHiE7vipu', 'xsJn4wG5eF2xmmnM08CzAPr84F6rON1L4RQebxnJ8dbpFpponbMJFjxVWqfa', 1, '2022-03-05 20:28:02', '2022-03-05 20:28:02'),
(3, 'Spv', 'spv@gmail.com', NULL, '$2y$10$vc3k9UiryoB7tNxuNNCkaee.As4IZAP6FeZNj/YmommWREy2LKoqa', NULL, 2, '2022-03-09 09:12:34', '2022-03-09 09:12:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-03-05 05:28:23', '2022-03-05 05:28:23'),
(2, 'Supervisor', '2022-03-09 15:07:08', '2022-03-09 15:07:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indeks untuk tabel `company_contacts`
--
ALTER TABLE `company_contacts`
  ADD PRIMARY KEY (`id_company_contact`),
  ADD UNIQUE KEY `company_contacts_email_unique` (`email`),
  ADD KEY `company_contacts_id_company_foreign` (`id_company`);

--
-- Indeks untuk tabel `contact_employees`
--
ALTER TABLE `contact_employees`
  ADD PRIMARY KEY (`id_contact_employees`),
  ADD KEY `contact_employees_id_employees_foreign` (`id_employees`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employees`),
  ADD KEY `employees_id_company_foreign` (`id_company`);

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
-- Indeks untuk tabel `training_employees`
--
ALTER TABLE `training_employees`
  ADD PRIMARY KEY (`id_trainig_employees`),
  ADD KEY `training_employees_id_employees_foreign` (`id_employees`);

--
-- Indeks untuk tabel `training_modules`
--
ALTER TABLE `training_modules`
  ADD PRIMARY KEY (`id_training_module`),
  ADD KEY `training_modules_id_company_foreign` (`id_company`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_level` (`id_user_level`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `company_contacts`
--
ALTER TABLE `company_contacts`
  MODIFY `id_company_contact` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact_employees`
--
ALTER TABLE `contact_employees`
  MODIFY `id_contact_employees` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employees` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `training_employees`
--
ALTER TABLE `training_employees`
  MODIFY `id_trainig_employees` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `training_modules`
--
ALTER TABLE `training_modules`
  MODIFY `id_training_module` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `company_contacts`
--
ALTER TABLE `company_contacts`
  ADD CONSTRAINT `company_contacts_id_company_foreign` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `contact_employees`
--
ALTER TABLE `contact_employees`
  ADD CONSTRAINT `contact_employees_id_employees_foreign` FOREIGN KEY (`id_employees`) REFERENCES `employees` (`id_employees`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_id_company_foreign` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `training_employees`
--
ALTER TABLE `training_employees`
  ADD CONSTRAINT `training_employees_id_employees_foreign` FOREIGN KEY (`id_employees`) REFERENCES `employees` (`id_employees`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `training_modules`
--
ALTER TABLE `training_modules`
  ADD CONSTRAINT `training_modules_id_company_foreign` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_level` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
