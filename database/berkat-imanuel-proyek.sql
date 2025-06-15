-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Jun 2025 pada 07.05
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
-- Database: `berkat-imanuel-proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas_proyek`
--

CREATE TABLE `aktivitas_proyek` (
  `id_aktivitas` int NOT NULL,
  `id_kegiatan` int DEFAULT NULL,
  `nama_aktivitas` varchar(255) DEFAULT NULL,
  `tgl_aktivitas` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `progress_kegiatan` int DEFAULT NULL,
  `id_tukang` int DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `aktivitas_proyek`
--

INSERT INTO `aktivitas_proyek` (`id_aktivitas`, `id_kegiatan`, `nama_aktivitas`, `tgl_aktivitas`, `status`, `progress_kegiatan`, `id_tukang`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Meeting', '2025-06-15', 'aktif', 100, NULL, NULL, '2025-06-14 18:25:26', '2025-06-14 18:25:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_material`
--

CREATE TABLE `bahan_material` (
  `id_bahan` int NOT NULL,
  `nama_bahan` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `bahan_material`
--

INSERT INTO `bahan_material` (`id_bahan`, `nama_bahan`, `merk`, `ukuran`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Batako', '-', '10', 10000, 'Bahan', '2025-06-14 20:45:18', '2025-06-14 20:45:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `id_client` int NOT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `nama_client` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `no_npwp` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id_client`, `nama_perusahaan`, `nama_client`, `alamat`, `no_hp`, `nik`, `deskripsi`, `no_npwp`, `created_at`, `updated_at`) VALUES
(1, 'PT. zzzz', 'Af', 'Jl .....', '0282828', NULL, NULL, NULL, '2025-05-31 22:46:26', '2025-05-31 22:46:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int NOT NULL,
  `id_kegiatan` int DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  `cepat_mulai` int DEFAULT NULL,
  `cepat_selesai` int DEFAULT NULL,
  `lambat_mulai` int DEFAULT NULL,
  `lambat_selesai` int DEFAULT NULL,
  `total_float` int DEFAULT NULL,
  `free_float` int DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kegiatan`, `durasi`, `cepat_mulai`, `cepat_selesai`, `lambat_mulai`, `lambat_selesai`, `total_float`, `free_float`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 0, 7, 0, 7, 0, 0, NULL, '2025-06-14 20:26:02', '2025-06-14 20:26:29'),
(2, 2, 21, 7, 28, 7, 28, 0, 0, NULL, '2025-06-14 20:26:02', '2025-06-14 20:26:29'),
(3, 3, 28, 28, 56, 28, 56, 0, 0, NULL, '2025-06-14 20:26:02', '2025-06-14 20:26:29'),
(4, 4, 12, 56, 68, 56, 68, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-14 20:26:29'),
(5, 5, 7, 56, 63, 61, 63, 5, 5, NULL, '2025-06-14 20:26:03', '2025-06-14 20:26:29'),
(6, 6, 14, 68, 82, 68, 82, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-14 20:26:29'),
(7, 8, 12, 82, 94, 82, 94, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-14 20:26:29'),
(8, 9, 12, 94, 106, 94, 106, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-14 20:26:29'),
(9, 10, 7, 106, 113, 106, 113, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-14 20:26:29'),
(10, 11, 14, 113, 127, 113, 127, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-14 20:26:29'),
(11, 12, 7, 127, 134, 127, 134, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-14 20:26:29'),
(12, 13, 7, 134, 141, 134, 141, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-14 20:26:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_proyek`
--

CREATE TABLE `kegiatan_proyek` (
  `id_kegiatan` int NOT NULL,
  `id_proyek` int DEFAULT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `kode_kegiatan` char(4) DEFAULT NULL,
  `kegiatan_sebelum` char(4) DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  `status_kegiatan` varchar(255) DEFAULT NULL,
  `progress_kegiatan` int DEFAULT NULL,
  `es` int NOT NULL DEFAULT '0',
  `ef` int NOT NULL DEFAULT '0',
  `ls` int NOT NULL DEFAULT '0',
  `lf` int NOT NULL DEFAULT '0',
  `total_float` int NOT NULL DEFAULT '0',
  `free_float` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kegiatan_proyek`
--

INSERT INTO `kegiatan_proyek` (`id_kegiatan`, `id_proyek`, `nama_kegiatan`, `kode_kegiatan`, `kegiatan_sebelum`, `durasi`, `status_kegiatan`, `progress_kegiatan`, `es`, `ef`, `ls`, `lf`, `total_float`, `free_float`, `created_at`, `updated_at`) VALUES
(1, 1, 'Persiapan', 'A', '', 7, 'Start', 100, 0, 7, 0, 7, 0, 0, '2025-06-14 16:25:52', '2025-06-14 20:01:28'),
(2, 1, 'Pondasi', 'B', 'A', 21, 'Start', 0, 7, 28, 7, 28, 0, 0, '2025-06-14 16:40:12', '2025-06-14 20:01:28'),
(3, 1, 'Dinding dan Rangka ', 'C', 'B', 28, 'Start', 0, 28, 56, 28, 56, 0, 0, '2025-06-14 16:40:37', '2025-06-14 20:01:28'),
(4, 1, 'Plumbing', 'D', 'C', 12, 'Start', 0, 56, 68, 56, 68, 0, 0, '2025-06-14 16:41:07', '2025-06-14 20:01:28'),
(5, 1, 'Instalasi Listrik', 'E', 'C', 7, 'Start', 0, 56, 63, 61, 68, 5, 5, '2025-06-14 16:41:30', '2025-06-14 20:10:38'),
(6, 1, 'Atap dan Plafond ', 'F', 'D,E', 14, 'Start', 0, 68, 82, 68, 82, 0, 0, '2025-06-14 16:42:09', '2025-06-14 20:01:28'),
(8, 1, 'Pintu dan Jendela', 'G', 'F', 12, 'Start', 0, 82, 94, 82, 94, 0, 0, '2025-06-14 16:47:05', '2025-06-14 20:01:28'),
(9, 1, 'Finishing Dinding', 'H', 'G', 12, 'Start', 0, 94, 106, 94, 106, 0, 0, '2025-06-14 16:47:27', '2025-06-14 20:01:28'),
(10, 1, 'Pengecatan', 'I', 'H', 7, 'Start', 0, 106, 113, 106, 113, 0, 0, '2025-06-14 16:47:46', '2025-06-14 20:01:28'),
(11, 1, 'Lantai', 'J', 'I', 14, 'Start', 0, 113, 127, 113, 127, 0, 0, '2025-06-14 16:48:11', '2025-06-14 20:01:28'),
(12, 1, 'Pagar', 'K', 'J', 7, 'Start', 0, 127, 134, 127, 134, 0, 0, '2025-06-14 16:48:28', '2025-06-14 20:01:28'),
(13, 1, 'Pembatas', 'L', 'K', 7, 'Start', 0, 134, 141, 134, 141, 0, 0, '2025-06-14 16:48:47', '2025-06-14 20:01:28');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int NOT NULL,
  `nama_proyek` varchar(255) DEFAULT NULL,
  `id_client` int DEFAULT NULL,
  `alamat_proyek` varchar(255) DEFAULT NULL,
  `foto_rancangan` varchar(255) DEFAULT NULL,
  `deskripsi_proyek` text,
  `tgl_mulai` date DEFAULT NULL,
  `batas_waktu` date DEFAULT NULL,
  `batas_waktu_terbaru` date DEFAULT NULL,
  `status_proyek` varchar(255) DEFAULT NULL,
  `progress_proyek` double DEFAULT NULL,
  `arsip_proyek` text,
  `id_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `id_client`, `alamat_proyek`, `foto_rancangan`, `deskripsi_proyek`, `tgl_mulai`, `batas_waktu`, `batas_waktu_terbaru`, `status_proyek`, `progress_proyek`, `arsip_proyek`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Bangun Rumah', 1, 'Jl', 'C:\\Users\\USER\\AppData\\Local\\Temp\\php381B.tmp', '-', '2025-04-01', '2025-07-31', NULL, 'aktif', 8.3333333333333, '', 1, '2025-05-31 22:47:55', '2025-06-14 17:26:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplai_bahan`
--

CREATE TABLE `suplai_bahan` (
  `id` int NOT NULL,
  `id_tukang` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_kegiatan` int DEFAULT NULL,
  `id_bahan` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukang`
--

CREATE TABLE `tukang` (
  `id_tukang` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `is_kepala` tinyint(1) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tukang`
--

INSERT INTO `tukang` (`id_tukang`, `id_user`, `nama`, `no_telp`, `is_kepala`, `alamat`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Indra', '087840301772', 0, NULL, '2025-05-23 23:04:28', '2025-05-23 23:04:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `no_telp`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Afen', 'admin@gmail.com', '2025-05-23 21:21:15', '$2y$12$ODqIDyL4WVJDEWfkPwZsC.lQFcEZ23KTfnzXEqMKKs/sF83M0eotu', 'jRGEpxPbsdIQlQsikJ717Qb4vordHbFw2rCqHVmt0GQWm1sSpFLJ9dQwEhjO', NULL, 1, '2025-05-23 21:21:16', '2025-05-23 21:21:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas_proyek`
--
ALTER TABLE `aktivitas_proyek`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indeks untuk tabel `bahan_material`
--
ALTER TABLE `bahan_material`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kegiatan_proyek`
--
ALTER TABLE `kegiatan_proyek`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indeks untuk tabel `suplai_bahan`
--
ALTER TABLE `suplai_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tukang`
--
ALTER TABLE `tukang`
  ADD PRIMARY KEY (`id_tukang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas_proyek`
--
ALTER TABLE `aktivitas_proyek`
  MODIFY `id_aktivitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bahan_material`
--
ALTER TABLE `bahan_material`
  MODIFY `id_bahan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_proyek`
--
ALTER TABLE `kegiatan_proyek`
  MODIFY `id_kegiatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `suplai_bahan`
--
ALTER TABLE `suplai_bahan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tukang`
--
ALTER TABLE `tukang`
  MODIFY `id_tukang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
