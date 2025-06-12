-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2025 pada 09.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teratai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_albert@tzuchi.or.id|127.0.0.1', 'i:2;', 1748413668),
('laravel_albert@tzuchi.or.id|127.0.0.1:timer', 'i:1748413668;', 1748413668);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '0001_01_01_000000_create_users_table', 1),
(6, '0001_01_01_000001_create_cache_table', 1),
(7, '0001_01_01_000002_create_jobs_table', 1),
(8, '2025_03_12_070147_create_siswas_table', 1),
(9, '2025_03_12_093636_add_he_qi_to_users_table', 1),
(16, '2025_03_18_160200_create_siswas_table', 2),
(17, '2025_03_18_160200_create_users_table', 2),
(18, '2025_05_05_104543_create_catatan_anak_table', 3),
(20, '2025_05_06_111640_create_penyaluran_bantuans_table', 5),
(21, '2025_05_06_134844_add_kwitansi_image_to_penyaluran_bantuan_table', 6),
(28, '2025_05_05_135524_create_catatan_anaks_table', 7),
(29, '2025_05_06_140251_create_penyaluran_bantuan_table', 7),
(30, '2025_05_27_105607_create_penilaians_table', 8),
(31, '2025_05_28_150454_add_sekolah_to_penyaluran_bantuan_table', 9),
(32, '2025_05_28_160542_add_bulan_realisasi_to_penyaluran_bantuan', 10),
(33, '2025_05_30_093205_add_bukti_pembayaran_to_penyaluran_bantuan', 11),
(34, '2025_06_02_143255_create_penilaians_table', 12),
(35, '2025_06_02_143647_create_penilaian_catatans_table', 13),
(36, '2025_06_02_163127_create_nilai_table', 14),
(38, '2025_06_02_165402_add_kelas_to_nilai_table', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_rata_rata` decimal(5,2) NOT NULL,
  `semester` enum('Semester 1','Semester 2') NOT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `siswa_id`, `nilai_rata_rata`, `semester`, `catatan`, `created_at`, `updated_at`, `kelas`) VALUES
(3, 721, 70.50, 'Semester 1', 'nilainya kurang bagus ada alfa 1', '2025-06-02 09:51:37', '2025-06-02 09:51:37', 0),
(4, 361, 82.50, 'Semester 2', 'bagus', '2025-06-02 09:58:19', '2025-06-02 09:58:19', 6),
(6, 721, 90.00, 'Semester 2', 'bagus ada kenaikan', '2025-06-02 09:59:07', '2025-06-02 09:59:07', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_catatans`
--

CREATE TABLE `penilaian_catatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_rata_rata` int(11) NOT NULL,
  `semester` enum('Semester 1','Semester 2') NOT NULL,
  `keterangan` text DEFAULT NULL,
  `isi_catatan` text NOT NULL,
  `tanggal_catatan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaian_catatans`
--

INSERT INTO `penilaian_catatans` (`id`, `siswa_id`, `nilai_rata_rata`, `semester`, `keterangan`, `isi_catatan`, `tanggal_catatan`, `created_at`, `updated_at`) VALUES
(1, 361, 83, 'Semester 1', NULL, 'oke', '2025-06-02', '2025-06-02 09:10:51', '2025-06-02 09:10:51'),
(2, 721, 83, 'Semester 1', NULL, 'boleh', '2025-06-02', '2025-06-02 09:14:04', '2025-06-02 09:14:04'),
(3, 721, 70, 'Semester 2', NULL, 'jelek', '2025-06-02', '2025-06-02 09:16:00', '2025-06-02 09:16:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyaluran_bantuan`
--

CREATE TABLE `penyaluran_bantuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_bantuan` longtext DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `kwitansi_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sekolah` varchar(255) DEFAULT NULL,
  `bulan_realisasi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`bulan_realisasi`)),
  `bukti_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyaluran_bantuan`
--

INSERT INTO `penyaluran_bantuan` (`id`, `siswa_id`, `jenis_bantuan`, `jumlah`, `keterangan`, `tanggal`, `kwitansi_image`, `created_at`, `updated_at`, `sekolah`, `bulan_realisasi`, `bukti_pembayaran`) VALUES
(10, 721, '[\"Uang Kegiatan\",\"Uang Seragam\"]', 5000000, NULL, '2025-05-01', '1748943145.jpeg', '2025-06-03 09:14:35', '2025-06-03 09:32:25', 'SD BCA 1', '[\"2025-01\"]', '1748942075.gif'),
(11, 721, '[\"SPP\",\"Uang Kegiatan\"]', 200000, 'sama uang kegiatan', '2025-06-03', '1748943154.jpeg', '2025-06-03 09:31:15', '2025-06-03 09:49:46', 'SD BCA 1', '[\"2025-01\",\"2025-02\",\"2025-03\"]', '1748943075.jpeg'),
(12, 721, '[\"Uang Seragam\"]', 300000, NULL, '2025-06-02', '1748944359.jpg', '2025-06-03 09:52:21', '2025-06-03 09:52:39', 'SD BCA 1', '[\"2025-01\"]', '1748944341.jpg'),
(13, 406, '[\"SPP\",\"Uang Kegiatan\"]', 3000000, NULL, '2025-06-09', '1749439381.jpg', '2025-06-09 03:19:19', '2025-06-09 03:23:01', 'SD BCA 1', '[\"2025-01\",\"2025-02\",\"2025-03\"]', '1749439159.jpg'),
(14, 591, '[\"SPP\"]', 300000, 'Kontribusi Keluarga Rp. 200.000', '2025-05-06', NULL, '2025-06-09 08:00:10', '2025-06-09 08:00:10', 'SMP Tunas Berkat', '[\"2025-01\"]', '1749456010.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jiNz9aiHoUQ6XZSnS57mjvjurVRiY2ElzrZZBfbT', 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbGMxVWl0cU0yWXlaazB4VmpCMmJVbHVjR1EwVjBFOVBTSXNJblpoYkhWbElqb2lWMVJSVDJNeVJXNXNSblJJY2xOVWJDOW1iamhGVm14U1JETTRWakZUVUZsSU5WRkJOMGwxUlZkcFRIVk1XVzkxUm1aclpUaFVkWE5tTWpGbFJHOWtOMGczUzJrck5sbEdSSEZoS3k5bWJrRnljV042YWt4eVJraGthREZYSzBJeVdtMUVlRkpaWTJaUFRYVkROMjRySzNSTmRraDRkWFJxUkZCM1NHSmpVVVpDYkVac1pXbGxkbFpOZEhkdVpGVkxSV2s1TURSdmRtZHVZMDVxTW1SWE4xUnFhRWRzTjJwd1ltRldUWEpDVERKeWJHMU5SRTh5VDBwQmEwRlpjR2RqYWt4eFFuTkphelpGYVZKalVpOTFNa2hpUkZwWGRuZFFVbmQwUjBwdGFIZG1WekpYVTJGck1tbFhaR1k1Y0ZwUGFYRjNVbGxsTWpGVVNHWXZkVFp0VDBwMWJIUnBPVmt5TXl0RmVuTmhSM2hxVTJsWGMzY3lVMHBDY2pBd1pETmljV2xUVWl0T2VEVTBPRkE0Y2pnclNEZFpNSFpNTlV4bGMyNTVWVWwxY1dKQmVtZERhMFUxT1V4V01qbDFabEYwVjFJdlJEUlVWbmswZDNkNVlVUm5Sa0ZoVlhGM1VXNUhSMDVyUFNJc0ltMWhZeUk2SWpVMFpUbGtZVEF3TVdZME1UZGlaV0ppTVdJd05UYzBNR0ZtTVRObU16VXpaamMxWkdKalpXVTFZamN4WVRkbE5qVmtOakl4TURaaVpXUmtaams0TTJJaUxDSjBZV2NpT2lJaWZRPT0=', 1749456146);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `sekolah` varchar(255) DEFAULT NULL,
  `he_qi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL,
  `tanggal_dibantu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `nama`, `tanggal_lahir`, `kelas`, `sekolah`, `he_qi`, `created_at`, `updated_at`, `foto_siswa`, `tanggal_dibantu`) VALUES
(361, 'Tate Nitzsche', '2011-02-25', '1', 'SD Grant and Sons', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a0d85ac4-723e-3d0c-971a-effdf1da37ac.jpg', '2023-02-02'),
(362, 'Sheldon Zemlak IV', '2012-08-05', '1', 'SMP Stracke PLC', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f18a7622-62ac-364e-bf5a-5eca82db519b.jpg', '1993-05-23'),
(363, 'Prof. Velma Bernier', '1987-10-12', '2', 'SMP Daniel PLC', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/110e325d-f657-3f8e-9c96-0b007def2068.jpg', '1979-05-15'),
(364, 'Norberto Beahan', '1998-03-22', '3', 'SMP Botsford, Bednar and Sawayn', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e2e631ec-a988-3086-8b66-67353ebf58fd.jpg', '1980-03-27'),
(365, 'Sebastian Towne', '2000-04-23', '3', 'SD Durgan-Schuppe', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/fe63f91b-04fe-3c78-9e6c-936294604ab2.jpg', '1975-08-27'),
(366, 'Shanel Connelly', '1991-06-04', '3', 'SMK Grant Inc', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f3ccdb05-9e1a-3d03-a134-a277c600838e.jpg', '2015-06-29'),
(367, 'Sheila Lindgren', '2022-03-31', '3', 'SMK Koss Ltd', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1db414bc-9084-3cf1-b5b3-1fc65436064f.jpg', '2024-06-03'),
(368, 'Julia Jerde', '1979-08-25', '3', 'SMK Bayer, Fisher and Collier', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/29f40512-31a6-372f-9dde-5e739c818948.jpg', '2014-04-04'),
(369, 'Katherine Gutkowski', '1978-02-09', '4', 'SMK Roberts, Corwin and Roob', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/210e44e5-76b5-37b3-b22e-ddf94333c0e6.jpg', '1984-03-21'),
(370, 'Mr. Lonzo Baumbach', '2016-10-07', '4', 'SD O\'Kon PLC', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ed8fbd03-b671-3b4e-b0fa-ca41a5c34bef.jpg', '1978-11-08'),
(371, 'Arely Dare', '2015-11-15', '4', 'SD McGlynn, Ryan and Jakubowski', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/7f28530c-94ca-332d-8e5d-b3e8df9cc270.jpg', '1986-11-01'),
(372, 'Summer Dare', '1987-01-23', '5', 'SMA Schmeler-Mayer', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0988d573-a910-3981-9e92-eb3ea86c37f2.jpg', '1975-11-21'),
(373, 'Bertha Pfeffer Jr.', '2017-07-22', '5', 'SMP Gleason Ltd', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e6469c55-dc0d-3eb3-9ff0-3903da450ece.jpg', '1998-11-18'),
(374, 'Emie Wilderman', '2022-04-11', '5', 'SMA Keeling, DuBuque and Von', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a07b7809-8613-34d9-9903-98b13ef9b9fb.jpg', '2000-06-08'),
(375, 'Prof. Maymie Miller', '1984-03-27', '5', 'SMA Kling, Rippin and Zulauf', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/aa112f63-bb01-3e00-a790-3471fe3cf1e7.jpg', '2023-01-13'),
(376, 'Charity Walker', '1974-07-02', '6', 'SMA Abernathy, Hoeger and Feil', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/77ea91b5-b054-36b9-a690-8137cf82c8cb.jpg', '1993-05-12'),
(377, 'Dr. Alta Schaden II', '2006-11-19', '6', 'SMA Crooks, Goyette and Kunde', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/643fa46b-c65d-38b6-b6c4-75fbbb8ffded.jpg', '1980-04-26'),
(378, 'Mr. Ian Kerluke', '1987-05-31', '6', 'SD Murphy PLC', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/924a551d-282d-3973-9c5c-13948ac98ba9.jpg', '1970-01-01'),
(379, 'Estelle Ritchie', '2005-05-27', '6', 'SMA Sawayn, Nitzsche and Hudson', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9cc96591-5dba-374e-8224-f37808dbc8cd.jpg', '1973-12-03'),
(380, 'Johanna Schultz DVM', '1976-12-13', '6', 'SD Hirthe Group', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ce6a74d0-19c3-3960-890f-e79c0e6df41d.jpg', '2019-01-25'),
(381, 'Devonte Hayes', '2024-10-16', '6', 'SD Bogan Ltd', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/614019ba-8cfc-3f74-8bad-4750bf188a79.jpg', '1984-05-22'),
(382, 'Kasey Nienow', '1993-01-11', '7', 'SMK Ratke-Reynolds', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6f9a5525-a021-3c27-86a6-093b85e9b787.jpg', '2004-02-09'),
(383, 'Wiley Murphy', '1991-01-27', '7', 'SMP Rice LLC', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/cd40c6c6-5c4c-33c3-a34c-9dd4dad63e80.jpg', '1977-05-01'),
(384, 'Emil Hand', '2016-10-04', '7', 'SMP Marquardt-Carroll', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/66d34c98-4c0f-35b2-aba2-1e2d395e706f.jpg', '2022-02-20'),
(385, 'Miss Daisy McCullough', '2022-12-24', '7', 'SMA Orn, Schaefer and Schuster', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ad5dab0e-9c4e-3601-835c-8af1fdb72d4b.jpg', '1994-11-17'),
(386, 'Melisa Schiller', '2017-02-25', '8', 'SD Emard Group', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/73015ec5-5565-3478-98d1-e30f0454a3ed.jpg', '1984-04-02'),
(387, 'Karlee Parisian II', '2011-01-21', '8', 'SMA Balistreri, Runte and Considine', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/736b0512-4127-35f5-8763-127e1b42ecf3.jpg', '1996-03-21'),
(388, 'Rolando Halvorson DDS', '2015-05-02', '8', 'SMP Marks and Sons', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/146fb95b-a74d-30a9-8188-9ab584d724ac.jpg', '2000-04-23'),
(389, 'Easton Gottlieb DDS', '1998-11-01', '9', 'SMK Tremblay-Wolff', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/8c0980b3-4947-34c5-bf8d-3f42cdd7c23f.jpg', '1999-01-30'),
(390, 'Madaline Lindgren', '1976-01-06', '9', 'SMP Erdman, Wuckert and Quigley', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4f2f2112-0c74-3852-8b50-4b4f87389ca5.jpg', '2010-12-21'),
(391, 'Lamar Smith', '1986-09-25', '9', 'SMK Kilback-Torphy', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/02a8dbad-8804-3e72-8e26-61b6cbe1fb9c.jpg', '2020-08-21'),
(392, 'Mauricio Huel', '1973-07-08', '9', 'SMK Nolan-Skiles', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/52fa699d-96db-31a5-b6ae-3bd5900b4a09.jpg', '2004-07-02'),
(393, 'Mr. Vicente Wyman', '1989-01-18', '9', 'SMK Graham, Emmerich and Langosh', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f6845612-a50c-3a5f-be32-1d3ac0350069.jpg', '1989-01-29'),
(394, 'Jaqueline Ward PhD', '2016-03-29', '10', 'SD Flatley, Farrell and Koch', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9e616704-77a2-3b40-8520-b15f7b694c51.jpg', '2000-11-05'),
(395, 'Rhoda Upton', '2018-12-13', '10', 'SMA Conn-Ortiz', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/481f6422-d1c9-3bd3-9592-8e85b6de40c8.jpg', '1988-10-02'),
(396, 'Alba Smith', '2013-02-23', '11', 'SD Kassulke, Emard and Senger', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/22e790b7-9aa1-3881-86a6-6dd2380154ab.jpg', '1973-06-30'),
(397, 'Mr. Deron Rosenbaum DVM', '2016-08-29', '11', 'SMP Farrell-Osinski', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/685f6735-ffc8-3996-846b-da5d55ce6227.jpg', '1998-07-04'),
(398, 'Dean Huels V', '1987-05-14', '11', 'SD Gerhold Ltd', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a197ccdc-7927-33ee-8932-7b33ebc50268.jpg', '2025-01-18'),
(399, 'Donavon Cremin', '2021-02-28', '11', 'SD Luettgen, Rowe and Kuhlman', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b438505a-1e08-3483-80b2-2f64dc8d076d.jpg', '1977-03-29'),
(400, 'Prof. Preston Rath DDS', '2022-11-06', '11', 'SMK Strosin, Hegmann and Emmerich', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/fa5d34a5-8cab-34ec-b0d0-07cea9b77c55.jpg', '2008-04-12'),
(401, 'Maye Mohr', '1996-07-03', '11', 'SD Ernser, Jerde and Corwin', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/539225b5-7a45-3fdc-bdf0-f0bb98e869ca.jpg', '1974-04-24'),
(402, 'Dawson Ullrich', '1970-04-21', '11', 'SMA Ortiz-Koch', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d545f71a-7a34-36b5-8dab-8169755ce1d4.jpg', '1976-07-16'),
(403, 'Laurine Barton II', '2017-08-26', '12', 'SMP Bosco, Hoppe and Kling', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/80a6997a-af82-3db6-9a21-a075d37a39d1.jpg', '1982-10-07'),
(404, 'Gilda Shanahan', '1970-05-29', '12', 'SD Lubowitz-Satterfield', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a75483b4-964a-382a-9743-08f931e33c3c.jpg', '2020-01-27'),
(405, 'Joel Tromp', '1996-11-06', '12', 'SMK Schmeler, Prosacco and Sauer', 'Barat 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/383ba844-075c-37ab-99a9-7f3aae11c585.jpg', '1984-08-03'),
(406, 'Adrienne Hagenes', '1988-04-16', '1', 'SMA Brakus-Corkery', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f9b224c6-955e-3760-a8b3-9c2d9849f904.jpg', '2004-09-17'),
(407, 'Miss Julia Ziemann', '1996-04-30', '1', 'SMP Reynolds, Schultz and Kutch', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6b449b7a-cde4-32b0-9d60-4e1686d4d2f7.jpg', '2002-08-14'),
(408, 'Prof. Joey Yost PhD', '2005-01-07', '2', 'SD Bartoletti, Kautzer and Weber', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/dadd462c-d0be-3a5b-b66c-7aee7167ad8e.jpg', '2024-12-05'),
(409, 'Mrs. Eleanora Rodriguez', '2008-04-17', '3', 'SD DuBuque LLC', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1ce9344b-9a06-3578-a537-9e603e68c6ce.jpg', '1998-09-09'),
(410, 'Patience Towne II', '2023-05-28', '3', 'SMP Braun-Orn', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/38d29b79-675d-347a-ba57-1f49b3c1f791.jpg', '1990-12-13'),
(411, 'Sharon Blanda', '1993-02-25', '3', 'SD Romaguera-Corkery', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/829524a9-d20b-3ce0-ae8b-4e4f831519db.jpg', '1999-04-21'),
(412, 'Dessie Rippin Sr.', '1996-04-30', '3', 'SD Feest Inc', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3dc39246-98ff-3df7-9e70-32b69fa42add.jpg', '1970-10-07'),
(413, 'Dr. Sidney Thompson', '1998-03-23', '3', 'SD Shanahan LLC', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0c10cc60-9fee-3ff3-96dd-91e07b4b42a0.jpg', '2015-12-04'),
(414, 'Katrine Nitzsche', '2013-06-28', '4', 'SD Kerluke, Swift and Botsford', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0bce3d73-5982-35a9-9121-b5e574e7ecd8.jpg', '1976-09-13'),
(415, 'Alejandra Dicki', '2001-07-07', '4', 'SD Miller LLC', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f5f60579-2e83-304d-8233-9ac910c1e152.jpg', '1988-10-19'),
(416, 'Mr. Eliseo Goodwin Sr.', '1970-10-23', '4', 'SMK Goyette-Beatty', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/621ee420-9757-315b-937f-e914e2893c87.jpg', '2022-01-16'),
(417, 'Prof. Ray Hoppe', '1999-04-08', '5', 'SMA Miller, Hermann and Hudson', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1f9b799e-aa26-3a9c-a74a-b3d398139182.jpg', '2001-12-11'),
(418, 'Bernard Schaden V', '1996-08-14', '5', 'SMA Davis-Frami', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0d3cc2cc-872e-3d58-8e4a-474983acc06e.jpg', '2025-05-10'),
(419, 'Prof. Thomas Cartwright Jr.', '1975-12-20', '5', 'SD Grimes and Sons', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/71d03e4b-7820-3d08-9d91-5814c3429c1f.jpg', '1994-11-16'),
(420, 'Katelin Hackett II', '1994-08-02', '5', 'SD Spinka-Hegmann', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0cc42b8b-084a-3807-90d4-a62e2b739b5a.jpg', '2020-04-26'),
(421, 'Camilla Schuppe I', '1998-09-30', '6', 'SD DuBuque-Emard', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/8f0d4fce-6269-30da-be0d-1499ec29f394.jpg', '2009-07-15'),
(422, 'Fredrick Koss', '2001-07-01', '6', 'SMK Fahey and Sons', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/96a36a15-830f-3661-87f9-cd89b91fd4a3.jpg', '1995-08-01'),
(423, 'Arnoldo Kohler', '2012-06-30', '6', 'SMA Gaylord Group', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/78abcf30-19fa-396a-8673-87e1d1238e99.jpg', '1990-02-06'),
(424, 'Dr. Savion Murazik Sr.', '2005-03-31', '6', 'SMA McGlynn Inc', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/fabc8181-54d0-304e-bf99-9e58411bc830.jpg', '1975-05-13'),
(425, 'Tyrell Hagenes DDS', '1974-07-18', '6', 'SD Waters, Lowe and Bogan', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3e36f257-19ae-3693-ba0f-5255c58098f8.jpg', '2000-12-02'),
(426, 'Chadrick Schmeler', '2024-10-06', '6', 'SMP Parisian-Jast', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/94e9394e-afed-342f-9bcc-2712643f83a7.jpg', '1998-10-06'),
(427, 'Calista Hammes', '1985-06-09', '7', 'SMP Sauer, Stoltenberg and Cassin', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c7086d3e-707a-3b26-ac12-76b30212f19e.jpg', '2015-07-05'),
(428, 'Gino Deckow PhD', '1989-05-05', '7', 'SD Emmerich PLC', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/8c0cbdde-e215-3338-8a1a-04bc8c1a8424.jpg', '1999-01-12'),
(429, 'Eula Reilly', '1971-08-27', '7', 'SMA Stark LLC', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/dde08609-d249-3f11-9655-9d94cabb55e6.jpg', '2013-10-04'),
(430, 'Mariela Stokes', '1991-03-27', '7', 'SMK Mitchell, Nienow and Simonis', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ea610c2e-8c55-31e5-ad03-98fc99ef406b.jpg', '2005-04-29'),
(431, 'Hulda Orn', '1996-01-12', '8', 'SMP Strosin-Emard', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3e94db82-8c7c-31e5-86dd-e3ac5ee65333.jpg', '2013-06-14'),
(432, 'Prof. Luis Kling DDS', '1982-12-11', '8', 'SMP Abshire LLC', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c4697ae0-9c51-3aba-98ed-b1bffc0061f5.jpg', '1990-02-04'),
(433, 'Ms. Rowena Wisoky IV', '1976-07-07', '8', 'SMK Jaskolski Inc', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/5bad1671-507a-3eb6-82af-42db7990cfd9.jpg', '1992-08-26'),
(434, 'Aurelia Bechtelar DDS', '1995-05-17', '9', 'SMP Funk, Paucek and Bartoletti', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/261d0b1e-83ec-30b4-906f-80598d859dfc.jpg', '2018-03-19'),
(435, 'Grant Corwin DVM', '2018-10-30', '9', 'SMA Orn PLC', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4ec8cb62-1bfb-377d-849f-2b3ba2914e36.jpg', '2020-02-04'),
(436, 'Alyson Yost MD', '2001-09-24', '9', 'SMA Larson Ltd', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1afc2975-0f9e-34aa-9d92-5eb092ac4e64.jpg', '2015-08-15'),
(437, 'Tyler Crist MD', '2008-12-02', '9', 'SMP Mueller-Kuhic', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4999e83c-ef02-3acc-a6f6-76145b51d0de.jpg', '2002-06-14'),
(438, 'Cole Nader', '1970-11-07', '9', 'SMK Batz-Wehner', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/bcc54d8e-a6f5-3377-8d12-9288b684a8bc.jpg', '2006-05-13'),
(439, 'Lysanne Orn', '1989-10-09', '10', 'SMP Cartwright-Jacobson', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/2ba950f0-d266-3fce-b8af-e757c1451f23.jpg', '1986-12-21'),
(440, 'Marietta Walter', '1990-09-24', '10', 'SD Brekke, Volkman and Kirlin', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1362d577-9556-3392-91ad-0ef402f5570f.jpg', '1976-01-06'),
(441, 'Dr. Michelle Feeney DVM', '2022-03-18', '11', 'SMK Rosenbaum-Haag', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/5830d8e8-f119-34d3-866e-e9141dbe684f.jpg', '1997-03-28'),
(442, 'Archibald Towne', '2009-08-22', '11', 'SMP Vandervort Ltd', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b80524e0-2096-3fbc-9dea-cd0fa914dbb5.jpg', '2018-11-04'),
(443, 'Sasha Streich', '1991-05-08', '11', 'SMP Deckow, Kuvalis and Carroll', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/20151f8e-f87c-3b1e-ab39-dc5556113e20.jpg', '2001-12-25'),
(444, 'Dr. Enola Klocko', '2016-08-11', '11', 'SMP Kertzmann, Rodriguez and Osinski', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c2e99baa-a15e-3312-907c-77c00b82b084.jpg', '2018-04-23'),
(445, 'Anastacio Zemlak', '2018-10-16', '11', 'SMP Corkery, Botsford and Little', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/237f447e-8b0a-3db7-8b0d-4a88342042f1.jpg', '1986-09-22'),
(446, 'Evelyn Hill', '2005-08-06', '11', 'SMK Mills, Bernier and Bauch', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/2b9a9cca-4c3f-3e2b-8a22-2dadff30a10c.jpg', '1998-03-13'),
(447, 'Cynthia Moen', '1978-01-02', '11', 'SMK Crist, Stokes and Ebert', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1c9d87ff-be68-3988-bfd7-bd80f176d3fa.jpg', '1976-03-25'),
(448, 'Mrs. Gwen Abshire', '2016-03-15', '12', 'SMA Kirlin-Bogisich', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/78b8bca7-3822-30c3-9323-ac4765de13e1.jpg', '1979-08-27'),
(449, 'Miss Rowena Thompson', '2019-01-06', '12', 'SMP McKenzie, Johns and Schoen', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/90785993-24d5-31ce-a341-34ab9b5237a9.jpg', '2003-08-09'),
(450, 'Wilfred Turner', '2006-06-16', '12', 'SMP Brekke Ltd', 'Barat 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c754e16e-3ec0-34a4-ae99-0bb508a16590.jpg', '2011-08-25'),
(451, 'Dalton Thompson', '2023-10-05', '1', 'SD Franecki-Wuckert', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9cdc5c3c-b6cc-33b9-92cb-ba5b1827422d.jpg', '2019-09-11'),
(452, 'Gardner Satterfield', '1991-10-20', '1', 'SMP Hartmann, Bashirian and Parisian', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/134557dc-4ac0-3418-a1bd-e8fc2f8c8b76.jpg', '1972-03-30'),
(453, 'Emmy Gulgowski', '1982-05-26', '2', 'SMP Cremin and Sons', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e0635f01-d697-30a5-ba74-48e49e7d24f2.jpg', '1997-07-05'),
(454, 'Amara Kilback', '1996-01-19', '3', 'SMK Macejkovic LLC', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/00126934-f657-3b2a-9775-127b6d283e16.jpg', '1995-09-12'),
(455, 'Verdie Lakin', '2008-09-14', '3', 'SMA Botsford-Schowalter', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/2e2de9f1-47f7-3022-8fe9-fe88642cb9ee.jpg', '1993-12-02'),
(456, 'Newton Hill I', '2010-08-12', '3', 'SMP Vandervort, Koss and Breitenberg', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a5f8c40f-e71f-35ea-ad50-728a8a42d02c.jpg', '2024-05-04'),
(457, 'Rod Conroy', '2009-04-21', '3', 'SMA Bruen PLC', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/117c04cc-8f2a-3557-8073-1527a798b5d4.jpg', '1988-03-12'),
(458, 'Prof. Stephen Bruen', '2016-06-25', '3', 'SMA Erdman Inc', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d3119329-ca3c-3f69-950b-79b2cc9d5a64.jpg', '1988-12-24'),
(459, 'Dr. Belle Skiles', '1984-03-21', '4', 'SMK Kassulke-Bins', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/5c2d78c8-e506-308d-93b1-2902af35d29c.jpg', '1978-05-09'),
(460, 'Ms. Violette Deckow', '1999-04-24', '4', 'SMA Roob, Rowe and McCullough', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3aec2683-a9a0-3376-b8d2-7d30882ff8cd.jpg', '1979-04-17'),
(461, 'Dr. Colt King MD', '2006-11-17', '4', 'SD Schamberger Group', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/21f54e7b-710a-3ab3-a61e-b0b90140b7da.jpg', '1979-06-17'),
(462, 'Cheyanne Skiles', '2008-11-11', '5', 'SMA Greenholt-Kohler', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/8587d45a-4c70-3f88-9e56-f01a6953d7a3.jpg', '2015-06-23'),
(463, 'Miss Nannie Rice', '1979-09-07', '5', 'SD Hoeger, Fahey and Shields', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0a976aa9-b9aa-38f1-9319-5f7708bf384b.jpg', '1992-01-15'),
(464, 'Prof. Joana Swift DDS', '1985-10-19', '5', 'SMK Runolfsdottir, Stehr and Crona', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ddc7f400-34f0-3002-9a6a-42d8cca5f727.jpg', '1984-03-08'),
(465, 'Jammie DuBuque MD', '2020-12-13', '5', 'SMA Flatley-Gislason', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/fcd90364-7b2c-36c4-ab5d-b023875e74f9.jpg', '1988-05-23'),
(466, 'Dr. Walker Ankunding', '2015-04-18', '6', 'SMP Gleichner-Sawayn', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/083d305a-395d-3f0a-b6c5-4f956cb9048b.jpg', '2018-08-18'),
(467, 'Andrew Altenwerth', '1993-12-30', '6', 'SD Herman-Gorczany', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a4f28dfd-779b-36bd-9f01-5b3f4340a4b6.jpg', '1995-05-31'),
(468, 'Prof. Blaze Medhurst III', '2004-12-06', '6', 'SMP Batz-Steuber', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/78a20847-35ce-3a05-8132-5df032ebca98.jpg', '2000-09-08'),
(469, 'Daisy Schoen', '1973-01-02', '6', 'SMA Smitham, Treutel and Reynolds', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9638715d-7715-3d51-94c6-443703b2ba5f.jpg', '2006-06-09'),
(470, 'Dr. Carolyne Jaskolski', '1991-05-31', '6', 'SD Doyle, Veum and Wolf', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/bebff9b8-c55b-3ef0-91a0-a095e74edfb9.jpg', '2009-10-13'),
(471, 'Kamren Bruen', '1989-10-19', '6', 'SMK Zemlak-Welch', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4bde9a1e-daea-30db-ad0e-7a3bee1a7665.jpg', '1986-10-31'),
(472, 'Halle Mertz', '2020-06-14', '7', 'SMK Rice-Prohaska', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0292b531-5625-319d-b80a-6ae7eb030206.jpg', '1978-07-28'),
(473, 'Dana Howe', '1992-09-17', '7', 'SMK Bogan-Reichel', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6d8c3d44-e642-3d30-aee7-1fb30642a8c3.jpg', '1988-12-15'),
(474, 'Mr. Rickey Cormier', '2006-02-16', '7', 'SD Hill, Cummings and Lind', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/cc43e2b8-8207-3e13-90fa-44efc5e515a4.jpg', '1986-05-30'),
(475, 'Prof. Velma Rohan I', '1977-02-14', '7', 'SD Marquardt, Schultz and Nienow', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d47cf2c8-907c-3fa6-8811-320103ba1902.jpg', '2010-09-03'),
(476, 'Nia Buckridge', '2004-02-25', '8', 'SMK Trantow, Kiehn and Kshlerin', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/54bd5efe-6c4a-3eb5-99ce-30cc5d3bb2d7.jpg', '1997-11-12'),
(477, 'Ayana Mitchell', '1988-02-07', '8', 'SD Hand-O\'Hara', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6a0591e7-fc6d-3352-8873-d07dc0f5e741.jpg', '2024-12-10'),
(478, 'Mr. Anthony Kunze DVM', '2010-06-29', '8', 'SD Keeling-Gorczany', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/054391a3-99e2-30b1-b7e9-a8319cb886de.jpg', '2001-01-30'),
(479, 'Dee Bergstrom', '2014-06-22', '9', 'SMK Kilback, Greenfelder and Murphy', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/53f490a1-37aa-3763-addb-4b3b7d71dc75.jpg', '1974-02-04'),
(480, 'Mr. Manuela O\'Hara', '2020-03-30', '9', 'SMA Parker, Dicki and Rutherford', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/96b555ae-3585-3169-8e02-9d3ce1cbd5f9.jpg', '2000-04-06'),
(481, 'Ms. Freeda Jerde DDS', '1990-04-22', '9', 'SMK Beatty LLC', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1047f5ed-5a1c-3bab-ad96-d778a7bce0d1.jpg', '2019-09-11'),
(482, 'Cameron Wolf', '1984-12-03', '9', 'SMP Heathcote Group', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b7232304-71ea-3b5d-9740-af0168a21350.jpg', '1974-12-25'),
(483, 'Marty Nader', '2003-12-22', '9', 'SMP Hansen-Oberbrunner', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e11b561b-d381-3b25-944f-35ee1ef93efa.jpg', '2005-07-24'),
(484, 'Mr. Kiel Parisian III', '2007-10-08', '10', 'SMA Bernhard-Cassin', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4fcb4f15-bef2-3935-9685-81acf1879c4b.jpg', '2002-11-27'),
(485, 'Amira Bergstrom', '1997-08-22', '10', 'SMA Gulgowski, Nicolas and Gleason', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/afe9512f-c570-3077-ab7a-173587856e33.jpg', '2005-04-12'),
(486, 'Carley Ondricka', '1991-11-24', '11', 'SMP Friesen-Altenwerth', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6a514737-35c5-395a-bc67-de5fd591dbba.jpg', '2004-04-02'),
(487, 'Jarrett Jenkins', '1976-03-05', '11', 'SMA Goodwin-McClure', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3ccc5728-5e0b-3a3d-b7c4-219c21924ab3.jpg', '2022-09-14'),
(488, 'Tatum Konopelski', '1977-06-23', '11', 'SMK Schaefer, Lehner and Franecki', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e4b6d5e0-0909-3fcf-947b-43ff97e638ba.jpg', '2021-10-09'),
(489, 'Gus Bode', '2019-09-22', '11', 'SMP Boyle Ltd', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/907aa0cb-b583-3428-b610-6cc90d9a3c6a.jpg', '1972-09-26'),
(490, 'Julian Lindgren', '1987-07-13', '11', 'SMK Lubowitz-Ferry', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1d27f5b4-ecd9-3905-98a7-9b6ac9ecafd9.jpg', '1979-02-11'),
(491, 'Prof. Velva Olson', '1979-07-05', '11', 'SMP Rau-Shanahan', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/974e2bc2-b32b-38a8-9c87-2f8cf2983b21.jpg', '2004-02-10'),
(492, 'Ora Gulgowski', '2003-05-10', '11', 'SMA Cummings-Wunsch', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/5ee25a9f-775d-35e7-961d-94034d1baa28.jpg', '1982-01-20'),
(493, 'Randall Lesch', '2004-01-12', '12', 'SMP Swaniawski, Feil and Parisian', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/51a49818-951f-3de9-812a-e0e07f4d2ad8.jpg', '2024-06-11'),
(494, 'Nathanael Wyman', '2004-03-05', '12', 'SMA Lakin, Lehner and Runte', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f7fb8faf-1941-3f0c-9127-744c9393eccf.jpg', '1975-03-21'),
(495, 'Mr. Alden Lubowitz II', '2020-10-26', '12', 'SMP Towne Group', 'Utara 1', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/75b6d564-4eb3-323b-a40d-8df797b73217.jpg', '2018-03-16'),
(496, 'Abdullah Jakubowski', '1970-12-11', '1', 'SMK Kunde, Carroll and Conroy', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/34fa553d-bb2d-3e70-b826-517c0ffca6bc.jpg', '1970-05-12'),
(497, 'Darrel Ullrich MD', '1993-02-06', '1', 'SD Zulauf, Huels and Smith', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/5275622e-0bf9-3c84-94c8-43b421d6c1f0.jpg', '1998-02-21'),
(498, 'Mr. Stephan Bosco', '2022-02-08', '2', 'SMP Conroy and Sons', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/49752753-76ee-34d9-94b5-fb5efb763e22.jpg', '1970-08-03'),
(499, 'Pascale Kris', '1977-06-04', '3', 'SMK Strosin, Rice and Mertz', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/650de353-f74e-3a77-8b4d-cf01e05e2a38.jpg', '1991-10-04'),
(500, 'Watson Kunde Sr.', '1985-06-14', '3', 'SD Towne-Zieme', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0be341b8-7585-3b77-ac6e-d4c535f65606.jpg', '1986-09-25'),
(501, 'Thaddeus Gutkowski', '2020-02-17', '3', 'SD Kulas-Wisoky', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/2d88ba39-cc42-30d3-9446-55062e03c1d6.jpg', '2021-05-30'),
(502, 'Robbie Buckridge', '1972-06-24', '3', 'SD Kohler LLC', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/62a741d2-3b55-39ff-b211-6584cb3bfeef.jpg', '2019-03-26'),
(503, 'Julius Moore', '2010-06-28', '3', 'SD Roberts PLC', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4866a1e7-7a5a-388a-8650-629f2392695e.jpg', '2022-03-01'),
(504, 'Prof. Myrl Monahan', '2022-02-08', '4', 'SMP McCullough, Torphy and Thompson', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b66f1112-c32d-3aa6-8540-e61aefafc69e.jpg', '1988-07-07'),
(505, 'Enoch Feeney', '2005-03-28', '4', 'SMK Ritchie, Lowe and Rutherford', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c24d092e-2e00-3e4b-a3d3-8b0273f93a85.jpg', '2011-11-26'),
(506, 'Delaney Cartwright', '2013-08-28', '4', 'SMP Waelchi, Kautzer and Klein', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/746b2aac-a361-367c-a1ce-bafd5e6485be.jpg', '1994-02-09'),
(507, 'Dr. Darwin Corkery', '1998-05-26', '5', 'SMP Barrows, O\'Hara and Rice', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e7c9b32a-753a-37d0-8ce0-ee0e3da2ab7a.jpg', '1974-11-08'),
(508, 'Mr. Emery Homenick PhD', '1974-08-15', '5', 'SMK Nitzsche, Kilback and Witting', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f0ee0c0c-f05f-36f0-bb2a-beb07016d0ec.jpg', '1992-06-07'),
(509, 'Florencio Bauch', '1999-01-29', '5', 'SD McGlynn, Konopelski and Blick', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/34bb25ae-a633-300b-836d-1d80d8035a2a.jpg', '1974-03-04'),
(510, 'Prof. Clara Yundt DDS', '2015-08-27', '5', 'SMK Davis-Brakus', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6f2c3a0f-bad0-3d0a-ae56-b98f467e2c4d.jpg', '2002-01-30'),
(511, 'Kellie Mosciski', '1983-08-22', '6', 'SMA White-McLaughlin', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/fcdae6b8-d778-3d9d-92bb-702b5157e11e.jpg', '2023-06-26'),
(512, 'Stephania Osinski', '1972-09-25', '6', 'SMA Doyle Ltd', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d6d49865-1de9-3f81-afef-e6aee2bc0318.jpg', '2001-01-12'),
(513, 'Deron King', '2007-03-15', '6', 'SMK Huels Ltd', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/988808f5-ae66-3c25-854e-f261000c6556.jpg', '2020-03-29'),
(514, 'Kyleigh Hoeger Jr.', '1995-08-17', '6', 'SD Sanford-Gibson', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b8e70ac2-fe8f-3316-bc03-d0aeed1e257f.jpg', '2003-05-14'),
(515, 'Leatha Von', '2000-02-24', '6', 'SMK Bartell, Romaguera and Mayer', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3c5baaba-bfbb-3f4d-a948-c772dfa69904.jpg', '1990-12-28'),
(516, 'Shad Spencer DVM', '1973-06-12', '6', 'SMK Bednar-Morar', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d57b6f78-3a0c-37a4-9ecc-808616e252ed.jpg', '2013-07-02'),
(517, 'Federico Bechtelar PhD', '1980-12-01', '7', 'SMP Hane-Rolfson', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4fcf4de4-634a-399f-bed2-139059ef62ed.jpg', '2021-04-09'),
(518, 'Donnell Moen', '1978-11-25', '7', 'SD Christiansen, Lueilwitz and Boyle', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/380c5dda-41d3-375a-a8f3-2b13c236e974.jpg', '1990-10-16'),
(519, 'Damion Cruickshank', '1970-04-07', '7', 'SMP Kessler, Kshlerin and Walsh', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a0d7df00-b421-3003-96bb-8bfbb51f799a.jpg', '1992-12-28'),
(520, 'Dr. Genesis Streich MD', '1984-01-20', '7', 'SMA Schmeler, Lesch and Schmeler', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/eaad7d6f-6bf1-39f5-9c37-6fe740a90d18.jpg', '2001-10-07'),
(521, 'Emilie Labadie IV', '1984-01-04', '8', 'SMP Ullrich, Mueller and Hettinger', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/2c2c45c9-0925-3a7c-933b-8c9f83c1aabc.jpg', '1981-09-01'),
(522, 'Mr. Hillard Schuster Sr.', '2012-08-20', '8', 'SMK Schoen, Medhurst and Ratke', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/cffc62bb-5777-3702-a850-133ee6a73b5f.jpg', '2023-05-18'),
(523, 'Cullen Klocko', '1979-06-26', '8', 'SD Mayer, Krajcik and Kuhlman', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/57d0cd00-cb4a-3f59-9250-b066dd489e8f.jpg', '2017-05-13'),
(524, 'Aracely Shields', '2011-09-27', '9', 'SMP Goldner, Donnelly and Murray', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e2900ccd-1768-39e4-be9e-efa9e8e171ad.jpg', '1982-02-06'),
(525, 'Dr. Lexi Carroll', '2018-02-22', '9', 'SMK Gutmann-Hackett', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f8063de9-d9eb-3f73-86a4-7144e37e0063.jpg', '2023-09-28'),
(526, 'Miss Joanny Heidenreich', '1978-02-21', '9', 'SMP Reichel-Collins', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f22d04f5-d16f-39b6-981d-fc14da91c671.jpg', '2024-01-15'),
(527, 'Mrs. Eugenia Spencer', '1980-07-29', '9', 'SMP Grady, Willms and Welch', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/60a35a90-7368-3a3d-a56b-aa9f7b12e58a.jpg', '2001-07-15'),
(528, 'Bettye Boehm', '2005-08-06', '9', 'SMA Marks PLC', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e2ba42bb-efc9-3b64-8f24-4b102a51b779.jpg', '2010-11-29'),
(529, 'Erik Okuneva', '2005-01-23', '10', 'SMA Sporer-Goldner', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/48f2b522-c625-3f71-ac34-8ac1f4c92183.jpg', '1979-06-20'),
(530, 'Kacey McKenzie', '1999-08-16', '10', 'SMP Bauch, Davis and Lesch', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0c503779-e0eb-3e62-bb13-7f5268e38e1b.jpg', '1994-03-08'),
(531, 'Graham Kub', '1970-09-10', '11', 'SMP Orn-Abshire', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/13e003f6-0870-33de-a806-f17c57222baf.jpg', '2024-03-29'),
(532, 'Janick VonRueden', '2020-09-29', '11', 'SMP Welch-Olson', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6f3fc204-3ff2-305c-b1f6-372834b5efc5.jpg', '1987-11-13'),
(533, 'Antonia Harvey IV', '1979-05-10', '11', 'SD Turner Group', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9d1da39f-a5f3-3504-abd6-e5ad7d29aa6e.jpg', '2011-04-04'),
(534, 'Abbey Bruen', '1978-06-19', '11', 'SD Koch-Tromp', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/de73aa65-03e2-3d33-8045-504bdc80e32a.jpg', '2001-03-29'),
(535, 'Meaghan Wuckert', '2022-07-24', '11', 'SMP Padberg LLC', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/45b75d40-27ab-3bdd-b945-0399b9f09f08.jpg', '1975-03-29'),
(536, 'Dr. Montana Heaney V', '1976-10-04', '11', 'SMA Grimes, Ward and Schimmel', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e5e17b36-7533-3576-bfba-d844a2de5dc6.jpg', '1981-06-24'),
(537, 'Miss Clare Heathcote Jr.', '2004-01-17', '11', 'SD Metz-Grady', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3812cbb1-bc11-3773-8e0d-e7a0775a51d3.jpg', '1999-12-17'),
(538, 'Dr. Chester Cartwright DDS', '1983-04-27', '12', 'SMP Hackett PLC', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/01466a22-964b-3ec7-8292-3bbf6a641725.jpg', '1993-10-25'),
(539, 'Elisha Hansen', '1995-01-24', '12', 'SMA Green LLC', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/cd69443c-af8f-3777-bda2-89ba82f37324.jpg', '1983-01-16'),
(540, 'Prof. Claude Moore', '2019-11-17', '12', 'SMK McGlynn, Bogisich and Boyer', 'Utara 2', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/124d7c07-bbf2-384f-ac6c-2ae4d62bf15f.jpg', '1985-12-20'),
(541, 'Turner DuBuque', '1983-01-05', '1', 'SMK Kilback, Reichel and Mann', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0a513d23-1ab5-3ef3-ac65-2c2a49dd8742.jpg', '1989-08-22'),
(542, 'Mrs. Alysa Hills', '2021-05-16', '1', 'SMA Walker, Turner and Nicolas', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0380e6e5-20f5-312f-b78d-bd0fa9e41964.jpg', '2007-01-09'),
(543, 'Jannie Dooley', '2003-02-01', '2', 'SD Osinski and Sons', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/de009388-0fae-389b-a27e-b883d2e69aad.jpg', '1975-08-23'),
(544, 'Ole Bashirian', '1996-05-06', '3', 'SMP Reichert-Cummings', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/69d2b66b-73ff-306b-a16d-2dca1bb12f29.jpg', '2021-02-14'),
(545, 'Nayeli Casper', '1984-01-05', '3', 'SMA Wilderman, Labadie and Mueller', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/7a251c43-aef9-3f1d-96e0-d189dd5aa299.jpg', '1987-02-13'),
(546, 'Xander Brakus DVM', '2024-01-13', '3', 'SD Windler-Kunde', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/40eeabb4-976c-3d68-875a-8e4d8f4e903b.jpg', '1973-03-22'),
(547, 'Lola Kris II', '2011-06-27', '3', 'SMP Greenfelder, Block and Witting', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/fca46e12-74fd-3366-bfc2-9eed91faa024.jpg', '1995-05-17'),
(548, 'Genesis Bins', '2024-06-19', '3', 'SMP Auer and Sons', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/24f42ecc-0009-3e88-beb6-ab8773b3e700.jpg', '1989-08-29'),
(549, 'Bernhard Schamberger', '1992-12-27', '4', 'SMK Denesik, Roberts and Nicolas', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/8e062be0-b36f-3167-9591-bc437b71f91c.jpg', '1998-04-25'),
(550, 'Haven Parker', '2001-11-16', '4', 'SD Schuster Group', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/60384311-fb12-3cc7-ae4a-921b3f70f3e1.jpg', '1975-11-23'),
(551, 'Kaelyn Pagac', '2006-05-07', '4', 'SMP Schowalter and Sons', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c67ea5a3-a9f6-3827-9899-5d29e7e8d3e0.jpg', '1993-06-20'),
(552, 'Prof. Randall Lueilwitz MD', '1998-02-19', '5', 'SMA Auer Ltd', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/aadcfbcc-95bd-38db-97da-afb3542a9fc1.jpg', '2013-10-31'),
(553, 'Jada Boehm', '1979-10-28', '5', 'SD Kirlin, Ferry and Rohan', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9126b6d8-29d2-39da-9e4f-f09977e94cad.jpg', '2006-07-28'),
(554, 'Benjamin Friesen DDS', '1971-08-06', '5', 'SD Bosco, Bailey and Zboncak', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6e690727-2b32-301b-8e4e-24e0a0b0bfe1.jpg', '1984-08-30'),
(555, 'Emerald Effertz', '2013-04-02', '5', 'SD Kessler Inc', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/2fd01375-e905-36d9-aa1b-b62ea3a73966.jpg', '2011-06-29'),
(556, 'Kayleigh Gibson', '2010-07-28', '6', 'SMA Block LLC', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3d2884d7-846a-37a5-8737-1d4f0639f466.jpg', '2022-06-29'),
(557, 'Laurie Ebert', '2007-11-13', '6', 'SD Daniel, Paucek and Price', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/14e3fad1-593d-3aa5-bc11-06d15dc94b73.jpg', '1976-11-06'),
(558, 'Mr. Roman Gleichner', '2002-08-05', '6', 'SMP Torphy, Schroeder and Treutel', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/cbd25417-1b27-3df1-8401-b3ec862e2aff.jpg', '2005-01-30'),
(559, 'Trenton Reichert', '1978-11-15', '6', 'SMA Batz-Waters', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ba5bef60-8aad-3e23-a7af-9885d505e975.jpg', '2025-02-05'),
(560, 'Cleta Heller', '1989-10-10', '6', 'SMA Senger, Bosco and Volkman', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/356fd3f8-8ebc-3680-ab0e-7c01d410c873.jpg', '2004-02-05'),
(561, 'Terrance Greenholt', '1984-06-12', '6', 'SMK Christiansen Ltd', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/5ca0420d-36c1-3ccb-9dd4-73add7a5c597.jpg', '1985-08-01'),
(562, 'Dr. Lia Feeney', '1987-01-17', '7', 'SMK Feest, Ruecker and Schoen', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/722513f1-6d03-34bd-887d-b08419230185.jpg', '1975-10-06'),
(563, 'Edgardo O\'Kon', '2018-09-08', '7', 'SD Gislason-Windler', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/cef9f4e4-7148-3a11-9632-91f947f2fddf.jpg', '1985-09-23'),
(564, 'Mr. Frederic Gottlieb', '2019-02-03', '7', 'SMP Stamm-Lakin', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/fe899363-e4a6-3fe1-a528-4523160635d3.jpg', '2006-04-30'),
(565, 'Miss Candice Mayer', '2004-12-18', '7', 'SMA Balistreri PLC', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/597c6692-be87-30f1-a3e5-be60fe74bec5.jpg', '2003-04-13'),
(566, 'Giovani Mante', '2021-07-15', '8', 'SMK Heller PLC', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6375fa5b-9bda-3820-8769-57773bcac6bf.jpg', '2009-10-21'),
(567, 'Prof. Cielo Boyle', '2003-07-30', '8', 'SMP Ferry and Sons', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/36a33bd2-5e07-3985-abb7-94e6477697b6.jpg', '1997-04-23'),
(568, 'Prof. Clemens Pfeffer', '1992-09-15', '8', 'SD Runolfsson Inc', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1c32c061-022b-3381-a042-5e68c3ccb751.jpg', '1985-03-02'),
(569, 'Brain Murazik', '2023-04-05', '9', 'SMA Kihn-Ratke', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a09c78ce-6f33-3098-a9da-566c9a9933ee.jpg', '2007-08-10'),
(570, 'Yesenia Cassin DDS', '2011-02-12', '9', 'SMK Fay, Streich and Beier', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/220d5d4a-5a7b-38fd-ae96-45924e1e32d6.jpg', '2012-05-28'),
(571, 'Monique Harvey', '1973-12-28', '9', 'SMP Hoppe, Rippin and Schuster', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c21fa7db-159c-34eb-9181-fccc0027d896.jpg', '2010-11-07'),
(572, 'Sarai Gorczany', '1971-03-30', '9', 'SMK Kuvalis, Jerde and Cummings', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ad26852f-1bf0-3110-bc89-f21c1660f00c.jpg', '2002-07-07'),
(573, 'Nadia Dach V', '1991-11-17', '9', 'SMA Donnelly, Lehner and Corwin', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/cc1c6df7-e622-36d1-b4e7-2b582f69b3c5.jpg', '2007-09-22'),
(574, 'Aron Hermiston', '1978-10-27', '10', 'SMK Bradtke-Koelpin', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/17c224fe-8e36-38e3-b172-d14cafbaf021.jpg', '2021-02-13'),
(575, 'Mrs. Gudrun Wiza Jr.', '2002-08-05', '10', 'SMK Hegmann-Shanahan', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/bde03568-d199-3275-bd56-bef1d72d8a19.jpg', '2006-08-01'),
(576, 'Rosalinda Marvin', '1999-08-05', '11', 'SD Davis, Hermann and McLaughlin', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/5b8f6ed4-4a87-38fe-a185-2a1fedf2e928.jpg', '1987-07-04'),
(577, 'Carrie Schimmel', '1990-04-04', '11', 'SMA Daniel Group', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/895c8698-fb6c-34a7-9313-241ab9427875.jpg', '1988-09-01'),
(578, 'Mr. Fidel Beier DVM', '1986-11-28', '11', 'SMK Lehner, Daugherty and Greenholt', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/7974e2a2-376f-3d5f-a761-de1dc3d2edb4.jpg', '1970-10-15'),
(579, 'Randal Becker', '1991-08-28', '11', 'SMK Towne Group', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c3bde0c0-859d-3016-8848-2caaa7d02b46.jpg', '1977-02-02'),
(580, 'Estelle Eichmann', '2002-11-07', '11', 'SMA Runolfsson LLC', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/091e8772-434c-3783-96e6-462913e675ff.jpg', '2009-08-22'),
(581, 'Krystal Roberts', '2014-08-26', '11', 'SMK Lockman-Haag', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/077fe81e-02b5-3f0a-866d-388f79a207d4.jpg', '2024-09-14'),
(582, 'Norberto Champlin', '1985-02-10', '11', 'SMP Bernhard Group', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/08c548f6-06ad-3ab6-9a60-af5604c12351.jpg', '2004-08-01'),
(583, 'Queenie Hegmann', '1973-11-02', '12', 'SD Flatley LLC', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/8ec851ea-5b49-378d-a82a-3d4a1caad0ef.jpg', '2002-07-01'),
(584, 'Arnoldo McClure', '1991-09-20', '12', 'SMP Heathcote Group', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/5b9fdd22-672b-30dd-8374-a2df929da79e.jpg', '1997-08-12'),
(585, 'Donnell Hickle', '1979-03-23', '12', 'SD O\'Connell, Metz and Wisoky', 'Tangerang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/21ec5e87-146f-333b-b8ed-703a507942b4.jpg', '1998-12-05'),
(586, 'Aniyah Hoeger', '1972-10-12', '1', 'SD Kris-Bayer', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ffd211b4-518f-3f29-aac7-c634d836544a.jpg', '2005-02-01'),
(587, 'Omari Schmeler IV', '2003-11-22', '1', 'SMP Jones, Fay and Dicki', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/45f71a86-9d38-3599-b5d1-c34be270998a.jpg', '2010-03-18'),
(588, 'Clementine Beahan I', '2021-08-21', '2', 'SMA Runolfsdottir-Grimes', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/8df68286-0f80-398a-a85f-16b204dd0547.jpg', '1974-02-21'),
(589, 'Eino Murphy', '2000-03-14', '3', 'SMP Dickens, Bradtke and Spinka', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/bc294fbc-a824-3381-b99c-14703e8d2597.jpg', '1987-11-19'),
(590, 'Dr. Kurt Reichel', '1997-12-31', '3', 'SMP Mosciski-Kohler', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/65b4dba6-2650-3e41-af73-864e055bbd3c.jpg', '2019-07-03'),
(591, 'Alfonzo Green MD', '1997-05-23', '3', 'SMA Steuber and Sons', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d74f05b3-9279-3fa0-ab18-9f94b4930237.jpg', '1978-07-22'),
(592, 'Rudy Weber', '2017-05-11', '3', 'SMK Fay-Bergstrom', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/13871245-91a8-3cb4-8c5c-61cab7858375.jpg', '1986-08-30'),
(593, 'Maryam Gerlach', '1988-04-29', '3', 'SD Weimann LLC', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/288378c1-503d-3f59-9bb9-a39d5a075157.jpg', '1998-01-26'),
(594, 'Zola Sawayn', '2023-09-21', '4', 'SMA Hodkiewicz Ltd', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/8445b5bf-75ef-38f8-9d76-f890731b5748.jpg', '1994-03-28'),
(595, 'Prof. Janae Legros DVM', '1986-07-23', '4', 'SD D\'Amore Group', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a501b3b0-d991-353e-822e-a363b5ffe5c1.jpg', '2011-08-12'),
(596, 'Randal O\'Kon', '2008-09-23', '4', 'SD Bergstrom-Kautzer', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6075026e-7921-379c-a18e-476dfd13745f.jpg', '2008-08-04'),
(597, 'Ms. Bridget Keeling Sr.', '1995-01-07', '5', 'SMA Nitzsche-Heaney', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ba8ffb7b-46a1-3afd-846a-471d6f028eb0.jpg', '1980-02-22'),
(598, 'Bethany Jacobs', '2018-12-18', '5', 'SMK Legros, Kuhn and Heathcote', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/42084645-14c8-36ac-a17f-65f940026a91.jpg', '1990-10-19'),
(599, 'Dr. Oswaldo Waelchi', '2019-05-29', '5', 'SMA Morar, Ebert and Johnson', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/cfd0ffbe-e781-3bf0-9bb1-313a83006cf7.jpg', '1994-07-30'),
(600, 'Ivory Vandervort DVM', '2001-05-09', '5', 'SMP Bradtke, Jaskolski and Wilderman', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/aa58e415-f1ee-388d-ad8b-434d87c0cf93.jpg', '2010-02-15'),
(601, 'Dorcas Lang Sr.', '2002-09-25', '6', 'SMA Kemmer Group', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/087420f2-f6ec-362c-8486-d2f672fca354.jpg', '2023-07-29'),
(602, 'Mellie Kunde PhD', '1984-01-07', '6', 'SMA Mueller-Kihn', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1aa4580f-e6df-3f9d-9ebb-539bc9450135.jpg', '1973-07-17'),
(603, 'Helena Keebler IV', '2001-08-12', '6', 'SD Brekke-Johnson', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f868e927-5429-366c-8985-81be273c9b91.jpg', '1974-03-27'),
(604, 'John Hoppe', '2018-09-08', '6', 'SMA Emmerich, Konopelski and Friesen', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d97aea2b-0eaf-30f6-8929-ea3f0323f9ee.jpg', '1999-12-26'),
(605, 'Laney Rice I', '1986-02-11', '6', 'SD Ritchie-Hickle', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9cc11a47-cc6d-3d18-9b63-9425992416c7.jpg', '1994-08-09'),
(606, 'Lincoln Hudson', '1996-04-17', '6', 'SMK Weimann, Dare and Walker', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4de4997b-763c-3e83-8f61-81b20b24d944.jpg', '1995-09-07'),
(607, 'Raphael Barrows', '2019-06-23', '7', 'SD Labadie Inc', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0bd84e2a-3a9f-3c9d-acdf-ea262fa7e0b6.jpg', '1985-03-17'),
(608, 'Pearl Russel V', '1985-04-10', '7', 'SMP Effertz PLC', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c3b9dad2-25e2-355a-92d5-d7ba70cc6c85.jpg', '2002-07-14'),
(609, 'Candido Hintz', '2017-12-15', '7', 'SMA Botsford, Feest and Johnson', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1546f042-530a-3f99-8f82-bc59d1495b3c.jpg', '2005-03-15'),
(610, 'Gennaro Kunze', '2009-08-31', '7', 'SMK Schaefer, Hessel and Koss', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/13b8ff28-1b55-351d-baa0-2bbbf28f083c.jpg', '2007-08-01'),
(611, 'Mattie Gleason', '2002-09-03', '8', 'SMP Beier, Gottlieb and Beier', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4d3c284c-8d41-3f71-9958-8bdce0c25e78.jpg', '2008-02-23'),
(612, 'Dr. Mina Crist', '2023-05-03', '8', 'SMA Abernathy LLC', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/01aeecdc-387b-34a1-9a84-86cbc300232c.jpg', '2009-10-27'),
(613, 'Ron Kautzer', '2010-07-18', '8', 'SMP Johnson PLC', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b7618b9b-e047-3c96-b113-66e37cfc733b.jpg', '1996-03-09'),
(614, 'Maybell Adams', '2008-08-07', '9', 'SMP Rice-Walsh', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0846b032-a5d9-3e6b-8ae1-50e4de17382b.jpg', '1991-12-09'),
(615, 'Sadye Marvin', '2019-09-08', '9', 'SMA Keebler Inc', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9257ca61-3e2d-3473-bc7c-9a3f68052921.jpg', '2003-01-31'),
(616, 'Mr. Ian Huel II', '1989-03-31', '9', 'SMK Marks PLC', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/616dcb9b-8280-305e-928d-2a98703c19a0.jpg', '1974-07-10'),
(617, 'Allison Ankunding', '2024-04-30', '9', 'SD Klocko-Collier', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e882a7d3-c20d-3e9f-9a2a-e57f90076356.jpg', '1991-09-07'),
(618, 'Elda Cole DDS', '1975-05-22', '9', 'SMA Leuschke-Corkery', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/dda5bfc0-9beb-30f0-bd4d-cfb9f2bdfb46.jpg', '1990-11-24'),
(619, 'Stuart Jerde', '1985-08-22', '10', 'SMP Brekke, Beier and Kuhlman', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/2d228bc9-508e-3340-be43-5ba754ad5249.jpg', '2003-02-17');
INSERT INTO `siswas` (`id`, `nama`, `tanggal_lahir`, `kelas`, `sekolah`, `he_qi`, `created_at`, `updated_at`, `foto_siswa`, `tanggal_dibantu`) VALUES
(620, 'Raymundo Raynor', '1988-10-07', '10', 'SMK Thiel, Hessel and Buckridge', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0ce609ca-fde6-39fc-9b6e-25e2871386e7.jpg', '2019-08-16'),
(621, 'Hudson Bode', '1982-11-28', '11', 'SMA Sipes, Dickens and Skiles', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/62051e81-c0e6-35fe-a300-3c6febe00895.jpg', '1973-03-20'),
(622, 'Marlen Haley', '2016-02-08', '11', 'SMP Upton Inc', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/fa78c45a-db5c-3989-92c7-4dc44fd7e692.jpg', '2012-01-25'),
(623, 'Prof. Grover Corwin', '1993-07-28', '11', 'SMK Schulist-Gottlieb', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/807bdc66-205b-37d2-b01a-cb59b77701f2.jpg', '2005-07-15'),
(624, 'Lyda Erdman Jr.', '1990-04-05', '11', 'SD Kuhlman LLC', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c2b825f1-3c0b-3e68-ba0a-25a1b1b43bd8.jpg', '2004-03-02'),
(625, 'Prof. Virginie Parisian MD', '1973-05-17', '11', 'SMP Blick and Sons', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/22b99233-7e51-3bd2-9a0c-86fd8793bae9.jpg', '1979-06-17'),
(626, 'Miss Francisca Ortiz', '2025-04-12', '11', 'SMA Pollich-Corkery', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9d7d9213-72ff-3857-b5fd-424e2afe7c03.jpg', '2022-01-19'),
(627, 'Amari Pfannerstill', '2021-08-08', '11', 'SMA Shields and Sons', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d5920db1-9637-3ea0-a7f0-84f92e36d5c8.jpg', '1982-06-17'),
(628, 'Darren Dicki', '1975-10-06', '12', 'SMP Flatley, Kshlerin and Von', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4e8dd321-f944-3c3d-b15d-2c24c2c37bb4.jpg', '1998-09-19'),
(629, 'Mr. Darien Trantow II', '2025-04-21', '12', 'SMK Mitchell and Sons', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/33b40f62-a4eb-3d6e-801f-efaffb0ff15a.jpg', '1974-06-18'),
(630, 'Prof. Jacynthe Wolf', '2012-07-17', '12', 'SD Muller-Bernhard', 'Timur', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1dc9676f-416a-3227-ab36-f14cc3cd3caf.jpg', '1981-02-04'),
(631, 'Dasia Baumbach', '1998-07-15', '1', 'SMK Hansen, Mraz and Koch', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/7d0a6b79-7e1f-3cfa-be73-1947fa3db6c5.jpg', '2001-04-05'),
(632, 'Mrs. Mertie Buckridge', '1982-12-27', '1', 'SMK Pacocha-Cassin', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/12a949e9-dfa6-3368-9b67-324681493eab.jpg', '2007-10-18'),
(633, 'Raymundo Hermiston', '1990-03-16', '2', 'SMK Turcotte, Corwin and Murray', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/de04a64b-9840-3394-a784-dd05e60a9a69.jpg', '2024-12-27'),
(634, 'Kayli Keeling', '2019-06-03', '3', 'SD Hand Inc', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/771c1101-2585-3948-8de2-74eb7d486393.jpg', '1974-05-14'),
(635, 'Zachary Hirthe', '1983-11-21', '3', 'SMA Wunsch, Weissnat and Keebler', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/bcf5a4c0-11ec-39b0-89ef-34a922d06b57.jpg', '1993-08-10'),
(636, 'Pietro Beier', '1971-05-06', '3', 'SMK Botsford-Ankunding', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/2ab320d3-864c-388a-8755-4153ca24e315.jpg', '2001-12-16'),
(637, 'Lonzo Schinner', '1995-08-24', '3', 'SMP Little-Tromp', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b1fc12ed-5c01-3266-9b55-8e26f808bba0.jpg', '2014-01-05'),
(638, 'Prof. Adolphus Davis PhD', '1993-03-20', '3', 'SD Kuhic-Koepp', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/24b7a678-9cfb-3b8d-b245-513adc266001.jpg', '1979-04-22'),
(639, 'Prof. Sonya Predovic II', '2016-02-08', '4', 'SMK Mayert Ltd', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/57f4b186-d398-35ae-9503-7c3e9f19e6c7.jpg', '2002-11-29'),
(640, 'Rosetta Green', '2020-10-07', '4', 'SMK Hamill-Runolfsson', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6baa7ed9-e20b-38eb-a0c6-628358a93de5.jpg', '2016-06-25'),
(641, 'Jamar Cassin', '2010-08-15', '4', 'SMA Watsica, Dickinson and Haley', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/546424eb-4971-3736-86ca-4d6b6133f450.jpg', '2016-11-28'),
(642, 'Kris Langosh', '2005-03-23', '5', 'SD Grady-Ryan', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3f9adca2-17f1-3833-a962-41a6f9eb482e.jpg', '2015-04-02'),
(643, 'Ernest Krajcik III', '1996-07-28', '5', 'SMA Bruen-Kunze', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/112c85c9-99c1-361e-9043-039592d40998.jpg', '1988-06-11'),
(644, 'Mathilde Borer', '1992-09-04', '5', 'SD McCullough PLC', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1f944b8c-284b-3260-b2d8-6b154e90d5b5.jpg', '2015-10-29'),
(645, 'Hector Stoltenberg', '2014-11-22', '5', 'SMP Hintz Group', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/33260389-64c0-3a0e-94c7-bb883c18afcc.jpg', '1973-08-20'),
(646, 'Clyde Mosciski', '2017-02-17', '6', 'SMP Wyman-Powlowski', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0b5a5353-4319-34a2-98c6-705b259b792a.jpg', '1972-02-14'),
(647, 'Brad Deckow IV', '1984-06-12', '6', 'SMP Koss Ltd', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/71bd0adf-f9d7-3282-98cf-bfe7ad51646c.jpg', '1974-07-08'),
(648, 'Betty Fritsch Jr.', '1986-01-13', '6', 'SMA Gulgowski LLC', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ca1e2896-082d-3691-a9b1-77760c0bad34.jpg', '1999-06-30'),
(649, 'Karlie Shields', '1999-07-06', '6', 'SMK Sawayn, Koepp and Goodwin', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/425c50df-c386-33ee-8886-0545da8d7516.jpg', '1998-05-05'),
(650, 'Lavina Hyatt', '1994-02-17', '6', 'SD Bruen, Barrows and Legros', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1831ff96-9d51-38af-a971-d9c307c0e62e.jpg', '2005-09-17'),
(651, 'Waldo Becker', '2012-10-10', '6', 'SMA Koepp Ltd', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f9eb41f9-ce20-3cdb-9162-e510af83f753.jpg', '1985-06-09'),
(652, 'Ms. Julia Gusikowski', '2020-04-25', '7', 'SD Auer-Kub', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d952d309-3f6f-37ef-8ec4-0c84ddcd212c.jpg', '1971-01-09'),
(653, 'Ubaldo Hermiston', '2007-05-21', '7', 'SD Botsford-Lindgren', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/f59926f3-59f2-39a0-a4b7-276312353ad9.jpg', '1996-07-26'),
(654, 'Aurelie Gerhold MD', '1974-11-10', '7', 'SMA Schumm-Miller', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/02dd1cd8-1be0-3078-a98a-a72c9a14c113.jpg', '1975-08-30'),
(655, 'Mr. Esteban Daniel', '1984-08-17', '7', 'SD Bailey, Larson and Schiller', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/07da1c67-baf1-3610-afe3-d323e97be33f.jpg', '2008-08-06'),
(656, 'David Schulist Sr.', '2023-02-13', '8', 'SMP Conroy, Ledner and Thompson', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9a592bc1-062b-3f5e-ba1a-01547fe01b55.jpg', '2006-06-08'),
(657, 'Tianna Crona', '2023-03-31', '8', 'SMA Harris Ltd', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/37a6d340-135e-3426-a497-8dae7e3e999f.jpg', '1978-07-01'),
(658, 'Ashlynn Green DVM', '1981-02-13', '8', 'SD Gibson-Dickens', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4ce661e0-a9bd-3857-9bab-c16e319bcaca.jpg', '1977-05-10'),
(659, 'Lew Gorczany', '1987-08-16', '9', 'SD Purdy Ltd', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9d87174e-e8dc-3f6c-9db4-f294b44ce245.jpg', '1973-02-02'),
(660, 'Dr. Narciso Gottlieb III', '1980-04-15', '9', 'SD Walker-Weber', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/466e0348-b1e4-373e-b4a6-0431e232a791.jpg', '1989-05-15'),
(661, 'Dr. Norval Wolf', '1991-06-22', '9', 'SD Aufderhar-Stanton', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ebd9b251-0fe0-3d88-8f39-1e9df5b2fc7c.jpg', '2012-04-28'),
(662, 'Arnaldo Kuhlman', '1998-12-04', '9', 'SMK Abshire, DuBuque and Olson', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/10e4f5c0-77f0-3816-9352-ca6bfab35d59.jpg', '2021-11-18'),
(663, 'Lew Friesen', '2023-12-26', '9', 'SD Hansen Ltd', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/471bb2da-2bec-3dd7-8be9-621ab7355b97.jpg', '2003-01-14'),
(664, 'Lessie Bauch', '1983-09-29', '10', 'SD Dietrich, Langworth and Gerlach', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/2e49b99c-c276-3042-8d1f-6e4e84487f3d.jpg', '2009-02-22'),
(665, 'Dr. Luigi Volkman', '1989-12-29', '10', 'SMP Considine-Upton', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/bede13fe-faa7-3c1f-9bc1-c723141662b0.jpg', '1982-06-18'),
(666, 'Claire Gulgowski', '2010-10-24', '11', 'SMK Treutel, Kemmer and Feeney', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6f81e874-f29a-3eaf-b11c-cfd2c708ac64.jpg', '2000-06-05'),
(667, 'Leta Rohan', '2010-08-06', '11', 'SD Stiedemann PLC', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0ac6486e-54db-3113-8a8a-4fadb2e7c01e.jpg', '2018-11-04'),
(668, 'Nils Durgan', '2013-04-23', '11', 'SMA Moen, Heller and Ferry', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/05e93fa0-42d2-3a76-84fa-26bedc41d6a7.jpg', '2016-12-07'),
(669, 'Demetrius Hegmann', '2011-10-26', '11', 'SMK Stehr PLC', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/15079c8a-a353-3c0e-8037-6e8828917ee2.jpg', '2001-09-01'),
(670, 'Cristina Oberbrunner IV', '1987-12-12', '11', 'SD Jones-Kessler', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0bfb626e-1ba8-3f96-8027-73efaeead00e.jpg', '1998-04-06'),
(671, 'Mrs. Myrtice Donnelly MD', '1976-02-28', '11', 'SD Walker PLC', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/7081dc8f-7cbe-3c9c-9183-adcb566f2588.jpg', '2012-03-03'),
(672, 'Prof. Lisandro Swaniawski IV', '2000-09-17', '11', 'SMA DuBuque, Bogisich and Ebert', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b9d654ef-7410-3d0d-afd5-85782859f226.jpg', '1984-08-06'),
(673, 'Toney Roob', '2022-07-17', '12', 'SMA Bruen PLC', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/13825bd7-2374-3ffa-a9ed-07ad109dca90.jpg', '1971-07-05'),
(674, 'Camren Cummings', '1978-04-01', '12', 'SMK Koch, Smitham and Huel', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a4772c3b-4e01-3cb5-93be-ee00d667e422.jpg', '2007-08-31'),
(675, 'Zola Vandervort', '1990-07-29', '12', 'SMK Toy-Vandervort', 'Pusat', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a5d3f083-d9ef-3131-a9be-535588b99ae2.jpg', '1973-12-29'),
(676, 'Bradford O\'Conner', '2000-09-10', '1', 'SMA Hegmann, Halvorson and Senger', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/7a2114df-8662-3b76-b5ba-83ddf380ed75.jpg', '1972-12-07'),
(677, 'Dr. Lupe Labadie', '1974-06-27', '1', 'SMA Emmerich-Hayes', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b27a3e2f-7ee5-3350-aa7f-5acd07363a41.jpg', '2023-05-17'),
(678, 'Kara Effertz', '1980-03-10', '2', 'SMA Streich LLC', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/cbd7b221-ad50-34d5-a48f-e851db650a50.jpg', '1975-01-09'),
(679, 'Mrs. Wendy Lueilwitz', '1975-05-01', '3', 'SMA Lindgren-Spencer', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d8b9558b-1d5a-3f95-bd7e-ee2589b6c233.jpg', '1985-01-18'),
(680, 'Dr. Beth Ledner DDS', '2022-06-01', '3', 'SD Lebsack, Collier and Roob', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/448b41c2-8eac-3c4d-9e73-c7ea73f0d4de.jpg', '2023-09-06'),
(681, 'Ahmad Bogisich', '1981-04-18', '3', 'SMK Beatty, Pollich and Mueller', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/12b49b66-2ad2-315c-a67a-017bd1e36900.jpg', '1975-10-30'),
(682, 'Eino Ortiz', '1988-01-12', '3', 'SMP Nolan and Sons', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/233b6d97-b2e1-31f1-b718-1dacb139d547.jpg', '1987-10-08'),
(683, 'Wilmer Kling', '2006-01-15', '3', 'SMP Walker, Smitham and Runolfsdottir', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/dafa3f9d-0625-3e2d-809a-2b5000d20874.jpg', '2000-10-08'),
(684, 'Darian Swaniawski', '1984-10-01', '4', 'SMK Wilkinson, Schamberger and Bartell', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/773407be-08cc-38d8-a4ef-d60692c5c76f.jpg', '1992-03-02'),
(685, 'Frank Cummerata', '1979-11-25', '4', 'SMK Wunsch-Kuphal', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c3341c1f-26fd-3731-a076-15be4c01a939.jpg', '2001-08-13'),
(686, 'Hilton Ratke', '2015-06-01', '4', 'SD Marquardt, Douglas and Bechtelar', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e8f1855c-376c-3ddc-a751-7963db3acb53.jpg', '2001-03-04'),
(687, 'Gino Farrell', '2018-07-14', '5', 'SMP Gusikowski, Emmerich and Lehner', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6d703cf3-9b08-3cf0-ab1c-ae9ec998e757.jpg', '2014-01-01'),
(688, 'Dr. Sylvester Bauch', '2005-12-24', '5', 'SMA Medhurst, Carter and McCullough', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/4653134c-423a-3c78-8eda-602e5b08d962.jpg', '1975-08-11'),
(689, 'Jalon Beier', '1996-03-11', '5', 'SMP Kunze-Funk', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/7347b2a5-cfdc-3768-a02b-51cbee90a517.jpg', '1974-03-09'),
(690, 'Brandy Deckow', '2023-02-05', '5', 'SMP D\'Amore-Parisian', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3e064921-aca6-39f0-8266-8f15781bfd6f.jpg', '1973-05-24'),
(691, 'Thad Kiehn', '1993-12-02', '6', 'SMP Kutch, Klein and Barton', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/238c8fcf-63b7-336c-8934-ae994e6ab9a4.jpg', '2003-05-18'),
(692, 'Dr. Hudson Herzog II', '2019-10-20', '6', 'SD Mante, Ullrich and McKenzie', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/66d6f55c-c5f5-3b16-bf1c-2daf7ce2d08e.jpg', '1971-09-18'),
(693, 'Zion Heaney', '1989-07-31', '6', 'SMA Rohan Ltd', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/42f987ca-eadc-3d43-81e5-a7b7974f46b7.jpg', '2018-10-25'),
(694, 'Fabian Murazik', '1988-01-21', '6', 'SMK Langosh, Pouros and Ankunding', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/9bc94c78-ef76-3fc5-bc07-ff5c5ce61992.jpg', '1975-08-29'),
(695, 'Dr. Herman Nolan', '1994-08-15', '6', 'SMK Gorczany Ltd', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6aeb53d1-07bd-37ba-8980-3cddd7b2c592.jpg', '2001-12-17'),
(696, 'Prof. Julius Hyatt IV', '2000-11-09', '6', 'SMK Keeling-Turner', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1cc8ba32-cd75-3dc2-861f-d830e5e37f3f.jpg', '1998-12-07'),
(697, 'Josiane Becker', '1995-10-07', '7', 'SMK Gutmann PLC', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/183490a9-718d-3c47-801f-272d6198c860.jpg', '1976-08-19'),
(698, 'Verner Dicki', '1974-06-03', '7', 'SMP Collins, Kertzmann and Luettgen', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/814efab4-dbae-3459-a87b-e8fd8fac2faa.jpg', '2006-02-10'),
(699, 'Isabel Hayes DDS', '1984-04-16', '7', 'SMP Johnson-Stokes', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1ba96d21-9185-3e55-af38-b3c06fe72c02.jpg', '1971-12-20'),
(700, 'Reymundo Pollich', '2014-06-01', '7', 'SMA Weimann, Cummerata and Hansen', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/eac8d691-6c4c-357d-9d25-936caa373f1e.jpg', '1982-10-16'),
(701, 'Elsa Howe', '2008-07-05', '8', 'SD Wolff PLC', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/d2db42ae-bc4c-34cb-a464-dd2ce9fca973.jpg', '1998-07-01'),
(702, 'Ms. Hettie Stanton MD', '1982-07-23', '8', 'SMK Schumm Ltd', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/96c1cb09-8ea6-38ae-a6a4-de0f4c2b592c.jpg', '2019-07-26'),
(703, 'Salvatore Toy', '1991-08-12', '8', 'SD West Inc', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/c387531d-09ba-3e33-aa34-392f26f944fe.jpg', '2014-11-25'),
(704, 'Dr. Salma Rippin DDS', '2004-12-10', '9', 'SMP O\'Reilly-Olson', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/aabd6e92-ab1c-3121-bb60-1f73140430b7.jpg', '1993-02-17'),
(705, 'Hertha Kilback', '2016-01-16', '9', 'SMA Hackett, Reynolds and Kuhic', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/31002987-7eee-378c-bec8-9d0132c8915c.jpg', '1985-03-25'),
(706, 'Rocio Hermann III', '1994-09-14', '9', 'SD Hammes-Mayert', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1a7e0683-4f06-3caa-be66-9be70b4c80f9.jpg', '1974-04-20'),
(707, 'Ms. Blanche Koepp', '2005-03-12', '9', 'SMA Upton Ltd', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/996b36a3-e733-3c9d-a500-76ae524379ee.jpg', '1994-06-20'),
(708, 'Dustin Jakubowski', '1988-05-06', '9', 'SMA Gibson-Moen', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/53fcf522-e320-38bd-9522-d23ea80d12a3.jpg', '1989-04-04'),
(709, 'Garth Murray II', '2019-12-24', '10', 'SD O\'Hara, Crist and Strosin', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/0b4775b9-73ab-34c5-92df-7f73929c8efe.jpg', '2003-06-16'),
(710, 'Miracle Mitchell', '2015-04-17', '10', 'SMA Prosacco-Hegmann', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/7aee8dc5-c4f4-30cb-aab5-b63a7dfca1a2.jpg', '1990-05-06'),
(711, 'Glenna Moore', '1981-08-17', '11', 'SMK Block PLC', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/a5b9621f-5532-360d-bdae-40c6ee1b829d.jpg', '1990-06-14'),
(712, 'Mr. Anderson Kilback', '1998-04-03', '11', 'SMP Pfannerstill-Ferry', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1ab51177-afd5-38c8-a7b5-d73c9a15674e.jpg', '1979-08-09'),
(713, 'Barton Schultz', '2017-11-02', '11', 'SMK Leuschke Inc', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/ab3a95cc-8515-3c3a-a2fd-6657ca843c8e.jpg', '2001-04-11'),
(714, 'Mrs. Imelda Green', '2007-03-06', '11', 'SMK Wyman, Treutel and Pfeffer', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/6e10c690-379f-3af2-ad04-bc2ba7383e1c.jpg', '2019-10-30'),
(715, 'Brock Breitenberg', '2020-10-28', '11', 'SMA Schaefer, Parker and Armstrong', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b5d00e60-02a1-3c10-8023-1001be29d535.jpg', '1988-02-09'),
(716, 'Geovanny O\'Keefe', '1986-02-01', '11', 'SD Ferry Ltd', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/b078c996-6241-31ae-9c92-e479b4ae2657.jpg', '2006-11-01'),
(717, 'Jason King', '2016-06-16', '11', 'SD Weber, Hane and Lueilwitz', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/1f93e501-a5e5-37f0-8ffd-9aba23e18f2c.jpg', '1975-10-08'),
(718, 'Morgan Purdy', '1971-05-13', '12', 'SMA Shields-Gislason', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/e7476852-0e1c-366c-85d7-3059bae650f6.jpg', '2015-02-13'),
(719, 'Elwyn Kuvalis', '2001-08-18', '12', 'SMA Parisian-Treutel', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/5d0b414a-8cf9-397a-a0af-52ffed793b7e.jpg', '2012-03-16'),
(720, 'Bessie Mante DDS', '2021-07-21', '12', 'SMP Rice-Senger', 'Cikarang', '2025-05-28 04:04:26', '2025-05-28 04:04:26', 'photos/3192aaf2-30bd-3961-88e0-b39e68775ffb.jpg', '1980-02-21'),
(721, 'Basir', '2025-05-25', '1', 'SD Cinta Kasih Tzu Chi', 'Barat 1', '2025-05-28 04:05:29', '2025-05-28 08:13:40', 'photos/aiIpIvQWOqqyPdcHWEMwysA6ap0EbjbF36tn6wrq.jpg', '2025-05-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `he_qi` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `he_qi`, `remember_token`, `created_at`, `updated_at`) VALUES
(21, 'Superadmin', 'superadmin@tzuchi.or.id', NULL, '$2y$12$rtuBnCzlY8biHp1Co5VwCOPCdskDY3Tqvl2WSHuDZVa1.mAuIsHyy', 'superadmin', '[\"Barat 1\",\"Barat 2\",\"Utara 1\",\"Utara 2\",\"Tangerang\",\"Timur\",\"Pusat\",\"Cikarang\"]', NULL, '2025-05-28 03:38:55', '2025-05-28 03:38:55'),
(22, 'Rina', 'rina@tzuchi.or.id', NULL, '$2y$12$9oK4EaOGe/pOEsbCR3FtPugBqLsA0jrugfpxe2DJyKn6FEOjdAo/e', 'staff', '[\"Utara 1\",\"Utara 2\",\"Tangerang\"]', NULL, '2025-05-28 03:38:55', '2025-05-28 03:38:55'),
(23, 'Adit', 'aditia.pramono@tzuchi.or.id', NULL, '$2y$12$BG2ZB20JKef0vD18YGl2sOiB.MyWRdcsYl1dJGG/d25w2NGMeeim.', 'staff', '[\"Timur\",\"Cikarang\"]', NULL, '2025-05-28 03:38:55', '2025-05-28 03:38:55'),
(24, 'Albert', 'albert.chandra@tzuchi.or.id', NULL, '$2y$12$lKCkPb5KTSQAA1OFSY54U.senkH09WAl00EsWl8ibgQw7sImUjCFK', 'staff', '[\"Barat 1\",\"Barat 2\"]', NULL, '2025-05-28 03:38:56', '2025-05-28 03:38:56'),
(25, 'Kristin', 'kristin.bahyu@tzuchi.or.id', NULL, '$2y$12$lIhNuEU/mu/44DJf8UDZTO25SlVeDPMBnppTJc5a3wO4xSkxLcRoq', 'staff', '[\"Pusat\",\"Barat 1\"]', NULL, '2025-05-28 03:38:56', '2025-05-28 03:38:56'),
(26, 'Relawan Utara 1', 'utara1@tzuchi.or.id', NULL, '$2y$12$KmokMoSRYs74Ru86/x/n8.RMDXEBNWFchdAPy4BRmKXKfE06P7gP6', 'relawan', '[\"Utara 1\"]', NULL, '2025-05-28 03:38:56', '2025-05-28 03:38:56'),
(27, 'Relawan Utara 2', 'utara2@tzuchi.or.id', NULL, '$2y$12$8afghE5Fd1GNnIB4XghYrum8Rdi7k5wHx6JJuaJ8zdNfB5RoyyHD6', 'relawan', '[\"Utara 2\"]', NULL, '2025-05-28 03:38:56', '2025-05-28 03:38:56'),
(28, 'Relawan Pusat', 'pusat@tzuchi.or.id', NULL, '$2y$12$uo8FIcZJcm5HOWiGrZ46M.1uwTZkvc.RktNlgW.icrU.S9xOJ.3km', 'relawan', '[\"Pusat\"]', NULL, '2025-05-28 03:38:56', '2025-05-28 03:38:56'),
(29, 'Relawan Barat 1', 'barat1@tzuchi.or.id', NULL, '$2y$12$2lNxxt4i3M0PniCpOqTge.nOVo6z/3fmyocNgBGqs0U2VR0.muKsS', 'relawan', '[\"Barat 1\"]', NULL, '2025-05-28 03:38:57', '2025-05-28 03:38:57'),
(30, 'Relawan Barat 2', 'barat2@tzuchi.or.id', NULL, '$2y$12$DaIoph8ulNigwA2nQPkx1OBT7G6/q4rT84Qiw0eNDbAmdTD9yZAFO', 'relawan', '[\"Barat 2\"]', NULL, '2025-05-28 03:38:57', '2025-05-28 03:38:57'),
(31, 'Relawan Timur', 'timur@tzuchi.or.id', NULL, '$2y$12$0B1TT7ONL2vx3P22iVVD/eaDwkmy8eceAQ.9LsA0SrK88XpxE.yeO', 'relawan', '[\"Timur\"]', NULL, '2025-05-28 03:38:57', '2025-05-28 03:38:57'),
(32, 'Relawan Cikarang', 'cikarang@tzuchi.or.id', NULL, '$2y$12$mMWbNTCWbAzXC.z2tiWx/.o1UfBKMPM.MO9S7gzfNYzm5ZImuLSjW', 'relawan', '[\"Cikarang\"]', NULL, '2025-05-28 03:38:57', '2025-05-28 03:38:57'),
(33, 'Relawan Tangerang', 'tangerang@tzuchi.or.id', NULL, '$2y$12$deOMgueXbuhRQ3Cwg/KbVe8xLhB.4xVbkcUAqN242N.ATb/WjLFua', 'relawan', '[\"Tangerang\"]', NULL, '2025-05-28 03:38:58', '2025-05-28 03:38:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penilaian_catatans`
--
ALTER TABLE `penilaian_catatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_catatans_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `penyaluran_bantuan`
--
ALTER TABLE `penyaluran_bantuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyaluran_bantuan_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penilaian_catatans`
--
ALTER TABLE `penilaian_catatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penyaluran_bantuan`
--
ALTER TABLE `penyaluran_bantuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=722;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penilaian_catatans`
--
ALTER TABLE `penilaian_catatans`
  ADD CONSTRAINT `penilaian_catatans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penyaluran_bantuan`
--
ALTER TABLE `penyaluran_bantuan`
  ADD CONSTRAINT `penyaluran_bantuan_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
