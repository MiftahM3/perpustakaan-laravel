-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2024 pada 10.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sampul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `rak_id` bigint(20) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `slug`, `sampul`, `penulis`, `penerbit_id`, `kategori_id`, `rak_id`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'One Piece', 'one-piece', '1707969553.jpg', 'Eiichiro Oda', 2, 2, 1, 10, '2024-02-14 20:55:00', '2024-02-27 21:49:51'),
(2, '172 Days', '172-days', '1707969560.jpg', 'Nadzira Shafa', 2, 2, 2, 10, '2024-02-14 20:55:00', '2024-02-27 21:50:37'),
(3, 'Biografi Gusdur', 'biografi-gusdur', 'sampul-buku/bm81eGYfQZQ2ce2KSL89bWuraSPyPBKnbaJuD0ry.jpg', 'Abdurahman Wahid', 1, 4, 2, 7, '2024-02-19 21:17:51', '2024-02-26 18:35:38'),
(4, 'Moderasi Beragama', 'moderasi-beragama', 'sampul-buku/o5RPlmZMYJv1hDkXXM8IIlzaDZ9qr0ezhyx1QXES.jpg', 'Dr. Rena Latifa, M.Psi.', 2, 4, 6, 4, '2024-02-19 21:19:09', '2024-02-24 01:58:18'),
(6, 'Sejarah Penaklukan Jawa', 'sejarah-penaklukan-jawa', 'sampul-buku/UyHW5Y1ItLa6QpbUPcvpEpVmEIT4Q94XQKv023cQ.jpg', 'Major William Thorn', 2, 3, 5, 6, '2024-02-19 21:32:42', '2024-02-26 02:55:39'),
(7, 'laskar pelangi', 'laskar-pelangi', 'sampul-buku/uSNClfYMXo35XA9Iq1v8nz8mj46NtzoDIukxPbvh.webp', 'andre hinata', 1, 1, 2, 4, '2024-02-21 20:43:04', '2024-02-27 21:49:55'),
(8, 'Boruto The Next Naruto Generation', 'boruto-the-next-naruto-generation', 'sampul-buku/wDCMqZbfDb74f14njLxzw6fTahGIzC3jkMwT0CuG.jpg', 'Masashi Kishimoto', 2, 8, 6, 7, '2024-02-26 02:52:23', '2024-02-26 02:55:45'),
(10, 'bahasa inggris', 'bahasa-inggris', 'sampul-buku/rfE9zP3kN4t3V4ehczOH7ZbNz8K2ZEYPD94D3Ngx.jpg', 'rifqi', 2, 1, 1, 0, '2024-02-26 19:34:40', '2024-02-26 19:35:20'),
(11, 'IT', 'it', 'sampul-buku/mlIaoKKaDunLlbit1LmrtFL3hkSQ8onNxABF827v.jpg', 'ReGa', 2, 7, 4, 2, '2024-02-26 20:04:23', '2024-02-26 20:04:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `favorit`
--

INSERT INTO `favorit` (`id`, `users_id`, `buku_id`, `created_at`, `updated_at`) VALUES
(5, 3, 4, '2024-02-27 21:47:18', '2024-02-27 21:47:18'),
(7, 3, 3, '2024-02-27 21:47:48', '2024-02-27 21:47:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tidak Berkategori', 'tidak-berkategori', '2024-02-14 20:55:00', '2024-02-14 20:55:00'),
(2, 'Novel', 'novel', '2024-02-14 20:55:00', '2024-02-14 20:55:00'),
(3, 'Sejarah', 'sejarah', '2024-02-14 20:55:00', '2024-02-14 20:55:00'),
(4, 'Religi', 'religi', '2024-02-14 20:55:00', '2024-02-14 20:55:00'),
(5, 'Biologi', 'biologi', '2024-02-19 21:33:20', '2024-02-19 21:33:20'),
(7, 'Horor', 'horor', '2024-02-26 02:46:43', '2024-02-26 02:46:43'),
(8, 'Manga', 'manga', '2024-02-26 02:47:12', '2024-02-26 02:47:12'),
(9, 'Kitab suci', 'kitab-suci', '2024-02-26 02:47:24', '2024-02-26 02:47:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_02_081308_create_kategori_table', 1),
(6, '2024_02_02_081652_create_rak_table', 1),
(7, '2024_02_02_081703_create_penerbit_table', 1),
(8, '2024_02_02_081715_create_buku_table', 1),
(9, '2024_02_15_020917_create_roles_table', 1),
(10, '2024_02_15_021735_add_role_id_to_users_table', 1),
(11, '2024_02_21_070357_create_peminjaman_table', 2),
(12, '2024_02_21_070837_create_detail_peminjaman_table', 2),
(13, '2024_02_26_005715_create_favorit_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pinjam` varchar(255) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kode_pinjam`, `users_id`, `buku_id`, `status`, `tanggal_pinjam`, `tanggal_kembali`, `created_at`, `updated_at`) VALUES
(30, '201426702', 10, 2, 2, '2024-02-25', '2024-02-25', '2024-02-24 23:10:27', '2024-02-25 05:49:55'),
(31, '280356165', 10, 1, 2, '2024-02-25', '2024-02-26', '2024-02-24 23:12:10', '2024-02-25 20:54:15'),
(33, '512437765', 10, 2, 2, '2024-01-26', '2024-02-26', '2024-02-25 18:38:06', '2024-02-25 20:54:18'),
(35, '188956187', 10, 3, 2, '2024-02-26', '2024-02-26', '2024-02-25 20:15:45', '2024-02-25 20:54:20'),
(36, '416381589', 10, 6, 2, '2024-02-26', '2024-02-26', '2024-02-25 20:16:00', '2024-02-26 02:55:36'),
(37, '727522744', 10, 6, 2, '2024-02-26', '2024-02-26', '2024-02-26 02:54:15', '2024-02-26 02:55:39'),
(38, '317203956', 10, 3, 2, '2024-02-26', '2024-02-26', '2024-02-26 02:54:24', '2024-02-26 02:55:42'),
(39, '458392740', 10, 8, 2, '2024-02-26', '2024-02-26', '2024-02-26 02:54:47', '2024-02-26 02:55:45'),
(40, '330790099', 10, 7, 2, '2024-02-26', '2024-02-26', '2024-02-26 02:54:57', '2024-02-26 02:55:47'),
(41, '761132825', 10, 3, 2, '2024-02-27', '2024-02-27', '2024-02-26 18:34:32', '2024-02-26 18:35:38'),
(42, '581267494', 15, 1, 2, '2024-02-27', '2024-02-27', '2024-02-26 19:26:42', '2024-02-26 19:59:14'),
(44, '182745459', 15, 1, 1, '2024-02-27', NULL, '2024-02-26 19:46:52', '2024-02-27 21:49:51'),
(45, '310074189', 3, 7, 1, '2024-02-28', NULL, '2024-02-27 21:48:12', '2024-02-27 21:49:55'),
(46, '648673296', 3, 2, 1, '2024-02-28', NULL, '2024-02-27 21:48:23', '2024-02-27 21:50:37'),
(47, '877975039', 3, 6, 0, '2024-02-28', NULL, '2024-02-27 21:49:09', '2024-02-27 21:49:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Airlangga', 'airlangga', '2024-02-26 19:37:52', '2024-02-26 19:37:52'),
(2, 'Gramedia', 'gramedia', '2024-02-14 20:56:41', '2024-02-14 20:56:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rak` varchar(255) NOT NULL,
  `baris` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id`, `rak`, `baris`, `slug`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1-1', 2, '2024-02-14 20:55:00', '2024-02-14 20:55:00'),
(2, '1', '2', '1-2', 2, '2024-02-14 20:55:00', '2024-02-14 20:55:00'),
(3, '1', '3', '1-3', 2, '2024-02-14 20:55:00', '2024-02-14 20:55:00'),
(4, '1', '4', '1-4', 2, '2024-02-14 20:55:00', '2024-02-14 20:55:00'),
(5, '1', '5', '1-5', 2, '2024-02-14 20:55:00', '2024-02-14 20:55:00'),
(6, '2', '1', '2-1', 3, '2024-02-19 21:13:06', '2024-02-19 21:13:06'),
(7, '2', '2', '2-2', 3, '2024-02-26 02:27:48', '2024-02-26 02:27:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'petugas', NULL, NULL),
(3, 'pengguna', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$EThvkUjfdjr9BdQZ25ugau.yHJIAG1gkharvgJmQitYaVbTCyXRxW', NULL, '2024-02-18 20:02:03', 1),
(2, 'petugas', 'petugas@gmail.com', '$2y$12$8zOBMzt29Ia4fB8nc5kCD.Mh85qgbTNUJW5V6VhFAJy3f1s6Jpi0u', NULL, '2024-02-26 19:51:53', 2),
(3, 'pengguna', 'pengguna@gmail.com', '$2y$12$ZJW1i4mSA6xCW6TtRP.tKuxJiCHLOsBSTQR2l8.EHR8bKAAT3wCri', NULL, '2024-02-27 21:41:30', 3),
(10, 'nopal', 'nopal@gmail.com', '$2y$12$hV/LWMRE8STH.Kkbo9BqmOWmy/4Bh0ae5sAiLOfTZbZMqvda7AEWK', '2024-02-15 21:09:33', '2024-02-15 21:09:33', 3),
(12, 'jarot', 'jarot@gmail.com', '$2y$12$D25JWd4HnQDR0s5by/oDVeWiaIBniDLpbogOzBcLx79Br2OdPI9Wu', '2024-02-21 20:17:29', '2024-02-21 20:17:29', 3),
(14, 'rifqi', 'rifqi@gmail.com', '$2y$12$Tav05.1qhPJi/UnXSryGx.6XnB2vsNYkb1tZQmMr2qoiIBnrWQNE.', '2024-02-26 19:18:10', '2024-02-26 19:18:10', 3),
(15, 'eva eva', 'eva@gmail.com', '$2y$12$Z0T0rLx75FT5hTCbF2nogeqBEfxBhnjz/2kqdPeUwW1ZVgUM.d.wW', '2024-02-26 19:25:20', '2024-02-26 19:25:20', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
