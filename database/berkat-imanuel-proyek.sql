-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jun 2025 pada 02.32
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
  `satuan` varchar(30) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `bahan_material`
--

INSERT INTO `bahan_material` (`id_bahan`, `nama_bahan`, `merk`, `ukuran`, `satuan`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Batako', '-', '10', NULL, 10000, 'Bahan', '2025-06-14 20:45:18', '2025-06-14 20:45:18'),
(2, 'Pasir Urug', '', NULL, 'm3', 70000, 'Pasir', '2025-06-27 16:20:16', '2025-06-27 16:20:16'),
(3, 'Pasir Pasang', '', '', 'm3', 94000, 'Pasir', '2025-06-27 16:20:35', '2025-06-27 16:20:35'),
(4, 'Pasir Beton', '', '', 'm3', 94000, 'Pasir', '2025-06-27 16:20:53', '2025-06-27 16:20:53'),
(5, 'Batu Split', '', '', 'm3', 400000, 'Batu', '2025-06-27 16:21:15', '2025-06-27 16:21:15'),
(6, 'Batu Pecah 1-2 Cm', '', '1-2 Cm', 'm3', 341000, 'Batu', '2025-06-27 16:21:41', '2025-06-27 16:21:41'),
(7, 'Batu Pecah 2-3 cm', '', '2-3cm', 'm3', 283000, 'Batu', '2025-06-27 16:22:06', '2025-06-27 16:22:06'),
(8, 'Batu Pecah 5-7 cm', '', '5-7cm', 'm3', 219000, 'Batu', '2025-06-27 16:22:33', '2025-06-27 16:22:33'),
(9, 'Batu Pecah 10-15 cm', '', '10-15cm', 'm3', 165000, 'Batu', '2025-06-27 16:23:00', '2025-06-27 16:23:00'),
(10, 'Bata Merah', '', '', 'bh', 650, 'Bata', '2025-06-27 16:23:20', '2025-06-27 16:23:58'),
(11, 'Semen PC', '', '', 'zak', 70000, 'Semen', '2025-06-27 16:23:46', '2025-06-27 16:23:46'),
(12, 'Semen Putih', '', '', 'kg', 2700, 'Semen', '2025-06-27 16:24:21', '2025-06-27 16:24:21'),
(13, 'Cat Dasar', '', '', 'kg', 17000, 'cat', '2025-06-27 16:24:36', '2025-06-27 16:24:36');

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
(1, 'PT. zzzz', 'Af', 'Jl .....', '0282828', NULL, NULL, NULL, '2025-05-31 22:46:26', '2025-05-31 22:46:26'),
(2, 'pt. ron', 'ronni', 'palangka', '082', NULL, NULL, NULL, '2025-06-14 23:28:53', '2025-06-14 23:28:53'),
(3, 'PT Maulana', 'Edi Bahuwirya Mangunsong M.TI.', 'Jl. A.Yani Km 33 No 6, Banjarbaru', '081005643168', '3579031306083059', NULL, '06.782.991.3-144.740', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(4, 'Fa Prasasta Tbk', 'Pia Lala Pertiwi M.Ak', 'Jl. A.Yani Km 33 No 99, Palangkaraya', '085438105470', '7106416903040935', NULL, '02.296.456.0-615.850', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(5, 'PJ Simanjuntak Utama Tbk', 'Tari Zahra Permata', 'Jl. A.Yani Km 16 No 81, Banjarmasin', '086782542882', '7603184109010098', NULL, '13.971.309.1-125.605', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(6, 'Yayasan Lestari', 'Setya Hidayat S.Sos', 'Jl. A.Yani Km 5 No 78, Palangkaraya', '082588189204', '5308404401199707', NULL, '30.484.005.0-070.141', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(7, 'PJ Hassanah', 'Tina Puspasari', 'Jl. A.Yani Km 7 No 51, Banjarmasin', '080243944641', '7171375604033722', NULL, '05.394.074.4-135.987', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(8, 'Fa Winarno (Persero) Tbk', 'Jatmiko Maulana S.E.I', 'Jl. A.Yani Km 8 No 53, Pulang Pisau', '081172826854', '3373534209134424', NULL, '16.213.466.5-031.124', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(9, 'CV Laksita Nugroho Tbk', 'Prasetya Hakim', 'Jl. A.Yani Km 3 No 36, Banjarbaru', '082384415622', '9271941510118582', NULL, '01.120.597.7-451.837', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(10, 'PJ Sihombing', 'Paris Rahayu S.Ked', 'Jl. A.Yani Km 16 No 64, Palangkaraya', '082299086024', '3573654707174057', NULL, '26.766.981.4-512.672', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(11, 'CV Uyainah Tbk', 'Gaiman Sirait S.Pd', 'Jl. A.Yani Km 17 No 93, Palangkaraya', '081592351997', '9118343105164864', NULL, '08.286.947.5-684.309', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(12, 'PT Thamrin Lazuardi Tbk', 'Dartono Sitompul', 'Jl. A.Yani Km 31 No 9, Pulang Pisau', '080276713690', '1275685705259539', NULL, '20.097.442.4-296.530', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(13, 'PJ Uyainah Puspasari', 'Farah Maida Hastuti M.TI.', 'Jl. A.Yani Km 28 No 78, Banjarmasin', '087401732525', '1902552110126715', NULL, '32.580.061.6-798.083', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(14, 'PD Adriansyah Wacana (Persero) Tbk', 'Kalim Prasetyo', 'Jl. A.Yani Km 27 No 22, Banjarbaru', '083200587492', '1108642305254910', NULL, '06.990.746.1-457.352', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(15, 'Yayasan Mayasari (Persero) Tbk', 'Nardi Wibisono', 'Jl. A.Yani Km 16 No 31, Banjarmasin', '085754660319', '6571531701015309', NULL, '05.888.455.5-334.952', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(16, 'UD Anggriawan Saputra', 'Mila Ulva Hartati', 'Jl. A.Yani Km 31 No 63, Palangkaraya', '081654478285', '7208571907089732', NULL, '26.485.075.0-938.309', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(17, 'UD Yuliarti Tbk', 'Warsita Narpati', 'Jl. A.Yani Km 16 No 29, Palangkaraya', '080293696280', '1409320312221928', NULL, '08.558.248.6-941.003', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(18, 'PD Tamba', 'Garan Januar', 'Jl. A.Yani Km 20 No 20, Banjarmasin', '086293104207', '1471000106031326', NULL, '21.849.052.4-299.312', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(19, 'CV Zulkarnain Habibi', 'Irfan Widodo', 'Jl. A.Yani Km 18 No 94, Pulang Pisau', '083708168614', '6501584101166360', NULL, '28.812.189.8-992.059', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(20, 'PD Suartini', 'Damar Kusumo', 'Jl. A.Yani Km 23 No 24, Banjarbaru', '086685254641', '5310792101239529', NULL, '29.917.138.5-565.738', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(21, 'Perum Dabukke (Persero) Tbk', 'Febi Pratiwi', 'Jl. A.Yani Km 6 No 96, Pulang Pisau', '087086486347', '6204111512108413', NULL, '32.185.381.4-791.421', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(22, 'PD Mangunsong Mandasari', 'Karen Mandasari', 'Jl. A.Yani Km 17 No 15, Palangkaraya', '083219822699', '1374156805029333', NULL, '23.736.769.4-262.633', '2025-06-27 16:15:03', '2025-06-27 16:15:03');

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
(1, 1, 7, 0, 7, 0, 7, 0, 0, NULL, '2025-06-14 20:26:02', '2025-06-15 00:04:45'),
(2, 2, 21, 7, 28, 7, 28, 0, 0, NULL, '2025-06-14 20:26:02', '2025-06-15 00:04:44'),
(3, 3, 28, 28, 56, 28, 56, 0, 0, NULL, '2025-06-14 20:26:02', '2025-06-15 00:04:41'),
(4, 4, 12, 56, 68, 56, 68, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-15 00:04:40'),
(5, 5, 7, 56, 63, 61, 68, 5, 5, NULL, '2025-06-14 20:26:03', '2025-06-15 00:04:40'),
(6, 6, 14, 68, 82, 68, 82, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-15 00:04:39'),
(7, 8, 12, 82, 94, 82, 94, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-15 00:04:37'),
(8, 9, 12, 94, 106, 94, 106, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-15 00:04:32'),
(9, 10, 7, 106, 113, 106, 113, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-15 00:04:31'),
(10, 11, 14, 113, 127, 113, 127, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-15 00:04:28'),
(11, 12, 7, 127, 134, 127, 134, 0, 0, NULL, '2025-06-14 20:26:03', '2025-06-15 00:04:25'),
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
(1, 1, 'Persiapan', 'A', '', 7, 'Start', 100, 0, 7, 0, 7, 0, 0, '2025-06-14 16:25:52', '2025-06-15 00:04:45'),
(2, 1, 'Pondasi', 'B', 'A', 21, 'Start', 0, 7, 28, 7, 28, 0, 0, '2025-06-14 16:40:12', '2025-06-15 00:04:44'),
(3, 1, 'Dinding dan Rangka ', 'C', 'B', 28, 'Start', 0, 28, 56, 28, 56, 0, 0, '2025-06-14 16:40:37', '2025-06-15 00:04:41'),
(4, 1, 'Plumbing', 'D', 'C', 12, 'Start', 0, 56, 68, 56, 68, 0, 0, '2025-06-14 16:41:07', '2025-06-15 00:04:40'),
(5, 1, 'Instalasi Listrik', 'E', 'C', 7, 'Start', 0, 56, 63, 61, 68, 5, 5, '2025-06-14 16:41:30', '2025-06-15 00:04:40'),
(6, 1, 'Atap dan Plafond ', 'F', 'D,E', 14, 'Start', 0, 68, 82, 68, 82, 0, 0, '2025-06-14 16:42:09', '2025-06-15 00:04:39'),
(8, 1, 'Pintu dan Jendela', 'G', 'F', 12, 'Start', 0, 82, 94, 82, 94, 0, 0, '2025-06-14 16:47:05', '2025-06-15 00:04:37'),
(9, 1, 'Finishing Dinding', 'H', 'G', 12, 'Start', 0, 94, 106, 94, 106, 0, 0, '2025-06-14 16:47:27', '2025-06-15 00:04:32'),
(10, 1, 'Pengecatan', 'I', 'H', 7, 'Start', 0, 106, 113, 106, 113, 0, 0, '2025-06-14 16:47:46', '2025-06-15 00:04:31'),
(11, 1, 'Lantai', 'J', 'I', 14, 'Start', 0, 113, 127, 113, 127, 0, 0, '2025-06-14 16:48:11', '2025-06-15 00:04:28'),
(12, 1, 'Pagar', 'K', 'J', 7, 'Start', 0, 127, 134, 127, 134, 0, 0, '2025-06-14 16:48:28', '2025-06-15 00:04:25'),
(13, 1, 'Pembatas', 'L', 'K', 7, 'Start', 0, 134, 141, 134, 141, 0, 0, '2025-06-14 16:48:47', '2025-06-15 00:04:20');

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
(1, 'Bangun Rumah', 1, 'Jl', 'C:\\Users\\USER\\AppData\\Local\\Temp\\php381B.tmp', '-', '2025-04-01', '2025-07-31', NULL, 'aktif', 8.3333333333333, '', 1, '2025-05-31 22:47:55', '2025-06-14 17:26:20'),
(2, 'Bangun Jembatan', 4, 'Palangkaraya', NULL, 'Pembangunnan jembatan', '2025-07-01', '2025-12-31', NULL, 'Persiapan', 0, NULL, 1, '2025-06-27 16:28:04', '2025-06-27 16:28:04');

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

--
-- Dumping data untuk tabel `suplai_bahan`
--

INSERT INTO `suplai_bahan` (`id`, `id_tukang`, `tanggal`, `id_kegiatan`, `id_bahan`, `jumlah`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, NULL, '2025-06-28', 3, 1, 1, 1, NULL, '2025-06-27 15:19:15', '2025-06-27 15:19:15');

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
(1, NULL, 'Indra', '087840301772', 0, NULL, '2025-05-23 23:04:28', '2025-05-23 23:04:28'),
(2, NULL, 'Jessica Tantri Laksita S.I.Kom', '085544837279', 0, 'Jl. A.Yani Km 28 No 75, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(3, NULL, 'Olivia Kiandra Winarsih', '082443890564', 0, 'Jl. A.Yani Km 3 No 1, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(4, NULL, 'Ghani Damu Haryanto S.Ked', '082855946105', 0, 'Jl. A.Yani Km 15 No 50, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(5, NULL, 'Gasti Astuti', '084860346420', 0, 'Jl. A.Yani Km 14 No 18, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(6, NULL, 'Putu Damar Kurniawan M.M.', '081097700252', 0, 'Jl. A.Yani Km 29 No 20, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(7, NULL, 'Kajen Ardianto', '084420613263', 0, 'Jl. A.Yani Km 26 No 67, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(8, NULL, 'Omar Latupono S.Ked', '085689024075', 0, 'Jl. A.Yani Km 32 No 16, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(9, NULL, 'Gamblang Waskita', '082777177219', 0, 'Jl. A.Yani Km 11 No 30, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(10, NULL, 'Cinthia Hastuti', '089253736240', 0, 'Jl. A.Yani Km 6 No 26, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(11, NULL, 'Rahmi Hartati', '088806049646', 0, 'Jl. A.Yani Km 25 No 31, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(12, NULL, 'Umar Sinaga', '086689786891', 0, 'Jl. A.Yani Km 10 No 86, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(13, NULL, 'Carub Aditya Nainggolan M.TI.', '084615854331', 0, 'Jl. A.Yani Km 29 No 57, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(14, NULL, 'Warta Siregar', '083677204791', 0, 'Jl. A.Yani Km 12 No 1, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(15, NULL, 'Jarwadi Putra', '083347574694', 0, 'Jl. A.Yani Km 5 No 65, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(16, NULL, 'Malika Zulaika M.Farm', '084346820709', 0, 'Jl. A.Yani Km 8 No 68, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(17, NULL, 'Artawan Nugroho', '082482861457', 0, 'Jl. A.Yani Km 27 No 61, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(18, NULL, 'Dagel Luwar Maheswara S.Gz', '080591906942', 0, 'Jl. A.Yani Km 25 No 67, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(19, NULL, 'Lega Uwais', '082953662690', 0, 'Jl. A.Yani Km 9 No 13, Banjarbaru', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(20, NULL, 'Vanya Rahayu', '082976751679', 0, 'Jl. A.Yani Km 18 No 71, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03'),
(21, NULL, 'Martaka Sitompul', '084222299482', 0, 'Jl. A.Yani Km 17 No 42, Banjarmasin', '2025-06-27 16:15:03', '2025-06-27 16:15:03');

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
  MODIFY `id_bahan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id_proyek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `suplai_bahan`
--
ALTER TABLE `suplai_bahan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tukang`
--
ALTER TABLE `tukang`
  MODIFY `id_tukang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
