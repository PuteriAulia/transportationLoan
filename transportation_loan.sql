-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2023 pada 09.08
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transportation_loan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `borrowers`
--

CREATE TABLE `borrowers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `borrowers`
--

INSERT INTO `borrowers` (`id`, `employee_id`, `loan_id`, `created_at`, `updated_at`) VALUES
(4, 3, 4, '2023-08-10 02:41:44', '2023-08-10 02:41:44'),
(5, 3, 5, '2023-08-10 02:43:17', '2023-08-10 02:43:17'),
(6, 3, 6, '2023-08-10 06:49:52', '2023-08-10 06:49:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company_locs`
--

CREATE TABLE `company_locs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `company_locs`
--

INSERT INTO `company_locs` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'KP001', 'Kantor pusat', '2023-08-10 02:33:46', '2023-08-10 02:33:46'),
(2, 'KC001', 'Kantor cabang', '2023-08-10 02:33:46', '2023-08-10 02:33:46'),
(3, 'KL001', 'Lapangan 1', '2023-08-10 02:33:46', '2023-08-10 02:33:46'),
(4, 'KL002', 'Lapangan 2', '2023-08-10 02:33:46', '2023-08-10 02:33:46'),
(5, 'KL003', 'Lapangan 3', '2023-08-10 02:33:46', '2023-08-10 02:33:46'),
(6, 'KL004', 'Lapangan 4', '2023-08-10 02:33:46', '2023-08-10 02:33:46'),
(7, 'KL005', 'Lapangan 5', '2023-08-10 02:33:46', '2023-08-10 02:33:46'),
(8, 'KL006', 'Lapangan 6', '2023-08-10 02:33:46', '2023-08-10 02:33:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departements`
--

INSERT INTO `departements` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DP001', 'teknologi', '2023-08-10 02:33:54', '2023-08-10 02:33:54'),
(2, 'DP002', 'keuangan', '2023-08-10 02:33:54', '2023-08-10 02:33:54'),
(3, 'DP003', 'pemasaran', '2023-08-10 02:33:54', '2023-08-10 02:33:54'),
(4, 'DP004', 'umum', '2023-08-10 02:33:54', '2023-08-10 02:33:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `drivers`
--

INSERT INTO `drivers` (`id`, `employee_id`, `loan_id`, `created_at`, `updated_at`) VALUES
(4, 2, 4, '2023-08-10 02:41:44', '2023-08-10 02:41:44'),
(5, 2, 5, '2023-08-10 02:43:17', '2023-08-10 02:43:17'),
(6, 2, 6, '2023-08-10 06:49:52', '2023-08-10 06:49:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `company_loc_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `code`, `name`, `phone`, `gender`, `position_id`, `departement_id`, `company_loc_id`, `created_at`, `updated_at`) VALUES
(1, 'EMP001', 'Ananta Bagus', '081236521458', 'Laki-laki', 1, 1, 1, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(2, 'EMP002', 'Gunawan Indra', '081236529878', 'Laki-laki', 2, 2, 2, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(3, 'EMP003', 'Annisa Gian', '081324587547', 'Perempuan', 3, 3, 2, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(4, 'EMP004', 'Anna Gian', '081324587547', 'Perempuan', 3, 2, 2, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(5, 'EMP005', 'Juan Martin', '081324587547', 'Laki-laki', 3, 1, 2, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(6, 'EMP006', 'Sintia', '081362547896', 'Perempuan', 4, 1, 2, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(7, 'EMP007', 'Indra Warno', '081362544587', 'Laki-laki', 4, 2, 2, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(8, 'EMP008', 'Putri Rafika', '081362896587', 'Perempuan', 4, 3, 2, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(9, 'EMP009', 'Aditya Wisnu', '081362825897', 'Laki-laki', 4, 1, 1, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(10, 'EMP010', 'Faisal Hanif', '081345823897', 'Laki-laki', 4, 2, 1, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(11, 'EMP011', 'Lula Ivonia', '081345829568', 'Perempuan', 4, 3, 1, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(12, 'EMP012', 'Joko Suwarno', '081345889568', 'Laki-laki', 3, 4, 2, '2023-08-10 02:34:25', '2023-08-10 02:34:25'),
(13, 'EMP013', 'Agus Halis', '081345897568', 'Laki-laki', 3, 4, 1, '2023-08-10 02:34:25', '2023-08-10 02:34:25');

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
-- Struktur dari tabel `first_confirmers`
--

CREATE TABLE `first_confirmers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_loan` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `first_confirmers`
--

INSERT INTO `first_confirmers` (`id`, `employee_id`, `loan_id`, `status`, `status_loan`, `created_at`, `updated_at`) VALUES
(2, 2, 4, 'menunggu konfirmasi', 'inactive', '2023-08-10 02:41:44', '2023-08-10 02:46:59'),
(3, 2, 5, 'terkonfirmasi', 'active', '2023-08-10 02:43:17', '2023-08-10 06:47:38'),
(4, 2, 6, 'terkonfirmasi', 'active', '2023-08-10 06:49:52', '2023-08-10 06:50:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuel_refils`
--

CREATE TABLE `fuel_refils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `km_before` int(11) NOT NULL,
  `km_after` int(11) NOT NULL,
  `liter` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `date` date NOT NULL,
  `company_loc_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `transportation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fuel_refils`
--

INSERT INTO `fuel_refils` (`id`, `code`, `km_before`, `km_after`, `liter`, `cost`, `date`, `company_loc_id`, `employee_id`, `transportation_id`, `created_at`, `updated_at`) VALUES
(1, 'BBM0001', 23, 34, 334, 20000, '2023-08-10', 2, 2, 2, '2023-08-10 06:24:45', '2023-08-10 06:24:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(30) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `date_loan` date NOT NULL,
  `date_return` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `active` varchar(20) NOT NULL,
  `transportation_id` bigint(20) UNSIGNED NOT NULL,
  `company_loc_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `loans`
--

INSERT INTO `loans` (`id`, `code`, `detail`, `date_loan`, `date_return`, `status`, `destination`, `active`, `transportation_id`, `company_loc_id`, `created_at`, `updated_at`) VALUES
(4, 'LOA0001', 'dd', '2023-08-10', '2023-08-10', 'menunggu konfirmasi', 'dd', 'inactive', 2, 2, '2023-08-10 02:41:44', '2023-08-10 02:46:59'),
(5, 'LOA0002', 'dd', '2023-08-10', '2023-08-10', 'terkonfirmasi', 'dd', 'active', 13, 2, '2023-08-10 02:43:17', '2023-08-10 06:47:38'),
(6, 'LOA0003', 'dinas luar kota', '2023-08-10', '2023-08-10', 'terkonfirmasi', 'sidoarjo', 'active', 2, 2, '2023-08-10 06:49:52', '2023-08-10 06:59:23');

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
(123, '2014_10_12_000000_create_users_table', 1),
(124, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(125, '2019_08_19_000000_create_failed_jobs_table', 1),
(126, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(127, '2023_08_08_152107_create_company_locs_table', 1),
(128, '2023_08_08_153724_create_transportations_table', 1),
(129, '2023_08_08_154305_add_company_locs_id_column_to_transportations_table', 1),
(130, '2023_08_08_154621_create_employees_table', 1),
(131, '2023_08_08_155011_create_departements_table', 1),
(132, '2023_08_08_155108_create_positions_table', 1),
(133, '2023_08_08_155234_add_position_id_column_to_employees_table', 1),
(134, '2023_08_08_155532_add_departement_id_column_to_employees_table', 1),
(135, '2023_08_08_155821_add_company_locs_id_column_to_employees_table', 1),
(136, '2023_08_08_160049_create_fuel_refils_table', 1),
(137, '2023_08_08_163952_add_transportation_id_column_to_fuel_refils_table', 1),
(138, '2023_08_09_083654_add_employee_id_column_to_users_table', 1),
(139, '2023_08_09_195148_add_date_column_to_fuel_refils_table', 1),
(140, '2023_08_09_212109_add_employee_id_column_to_fuel_refils_table', 1),
(141, '2023_08_09_223712_create_services_table', 1),
(142, '2023_08_09_224015_add_transportation_id_column_to_services_table', 1),
(143, '2023_08_09_224142_add_employee_id_column_to_services_table', 1),
(144, '2023_08_10_012454_add_company_loc_id_column_to_services_table', 1),
(145, '2023_08_10_014136_add_desc_column_to_services_table', 1),
(146, '2023_08_10_035209_create_loans_table', 1),
(147, '2023_08_10_035634_create_borrowers_table', 1),
(148, '2023_08_10_035946_create_drivers_table', 1),
(149, '2023_08_10_040042_create_first_confirmers_table', 1),
(150, '2023_08_10_040146_create_second_confirmers_table', 1),
(151, '2023_08_10_041036_add_company_loc_id_column_to_loans_table', 1),
(152, '2023_08_10_041314_add_transportation_id_column_to_loans_table', 1),
(153, '2023_08_10_042754_add_status_column_to_first_confirmers_table', 1),
(154, '2023_08_10_042912_add_status_column_to_second_confirmers_table', 1),
(155, '2023_08_10_082217_add_active_column_to_loans_table', 1),
(156, '2023_08_10_092227_add_status_loan_column_to_first_confirmers_tabel', 1),
(157, '2023_08_10_092322_add_status_loan_column_to_second_confirmers_table', 1),
(158, '2023_08_10_110931_add_active_column_to_transportations_table', 2),
(159, '2023_08_10_131626_add_company_loc_id_column_to_fuel_refils_table', 3);

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
-- Struktur dari tabel `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `positions`
--

INSERT INTO `positions` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PS001', 'kepala pusat', '2023-08-10 02:34:19', '2023-08-10 02:34:19'),
(2, 'PS002', 'kepala cabang', '2023-08-10 02:34:19', '2023-08-10 02:34:19'),
(3, 'PS003', 'kepala departemen', '2023-08-10 02:34:19', '2023-08-10 02:34:19'),
(4, 'PS004', 'staff', '2023-08-10 02:34:19', '2023-08-10 02:34:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `second_confirmers`
--

CREATE TABLE `second_confirmers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_loan` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `second_confirmers`
--

INSERT INTO `second_confirmers` (`id`, `employee_id`, `loan_id`, `status`, `status_loan`, `created_at`, `updated_at`) VALUES
(2, 3, 4, 'menunggu konfirmasi', 'inactive', '2023-08-10 02:41:44', '2023-08-10 02:46:59'),
(3, 4, 5, 'terkonfirmasi', 'active', '2023-08-10 02:43:17', '2023-08-10 02:43:17'),
(4, 5, 6, 'terkonfirmasi', 'active', '2023-08-10 06:49:52', '2023-08-10 06:59:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL,
  `km_in` int(11) NOT NULL,
  `km_out` int(11) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `desc` varchar(255) NOT NULL,
  `company_loc_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `transportation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `type`, `cost`, `km_in`, `km_out`, `date_in`, `date_out`, `desc`, `company_loc_id`, `employee_id`, `transportation_id`, `created_at`, `updated_at`) VALUES
(1, 'rutin', 200000, 34, 60, '2023-08-10', '2023-08-10', 'service', 2, 2, 2, '2023-08-10 04:42:03', '2023-08-10 04:42:15'),
(2, 'rutin', 500000, 33, 34, '2023-08-10', '2023-08-10', 'fdghf', 2, 5, 2, '2023-08-10 06:20:30', '2023-08-10 06:20:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportations`
--

CREATE TABLE `transportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plate` varchar(20) NOT NULL,
  `ownership` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `colour` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `type_payload` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `active` varchar(20) NOT NULL,
  `company_loc_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transportations`
--

INSERT INTO `transportations` (`id`, `plate`, `ownership`, `merk`, `colour`, `type`, `type_payload`, `status`, `active`, `company_loc_id`, `created_at`, `updated_at`) VALUES
(1, 'W 0234 KL', 'sendiri', 'daihatsu', 'hitam', 'mobil', 'angkutan orang', 'tersedia', 'active', 1, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(2, 'W 2564 KO', 'sewa', 'daihatsu', 'silver', 'mobil', 'angkutan orang', 'dalam pinjaman', 'active', 2, '2023-08-10 02:34:36', '2023-08-10 06:59:23'),
(3, 'L 6544 XY', 'sendiri', 'honda', 'putih biru', 'sepeda motor', 'angkutan orang', 'tersedia', 'active', 6, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(4, 'L 6555 XY', 'sendiri', 'honda', 'hitam', 'moobil', 'angkutan orang', 'tersedia', 'active', 4, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(5, 'L 8844 OA', 'sendiri', 'toyota', 'hitam', 'mobil', 'angkutan orang', 'tersedia', 'active', 3, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(6, 'L 6895 YT', 'sewa', 'yamaha', 'hitam', 'sepeda motor', 'angkutan orang', 'tersedia', 'active', 5, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(7, 'W 9658 PO', 'sendiri', 'daihatsu', 'silver', 'mobil', 'angkutan orang', 'tersedia', 'active', 7, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(8, 'W 9665 PO', 'sendiri', 'honda', 'silver', 'mobil', 'angkutan orang', 'tersedia', 'active', 8, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(9, 'W 9687 UY', 'sewa', 'daihatsu', 'hitam', 'mobil', 'angkutan barang', 'tersedia', 'active', 8, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(10, 'W 9857 UX', 'sewa', 'mitsubishi', 'kuning', 'truk', 'angkutan barang', 'tersedia', 'active', 5, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(11, 'L 9987 TX', 'sewa', 'mitsubishi', 'kuning', 'truk', 'angkutan barang', 'tersedia', 'active', 6, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(12, 'W 6557 FD', 'sendiri', 'mitsubishi', 'hijau', 'truk', 'angkutan barang', 'tersedia', 'active', 6, '2023-08-10 02:34:36', '2023-08-10 02:34:36'),
(13, 'W 2354 SD', 'sendiri', 'Honda', 'hitam', 'mobil', 'angkutan orang', 'dalam pinjaman', 'active', 2, '2023-08-10 02:42:35', '2023-08-10 06:47:38');

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
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `employee_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gunawan Indra', 'gunawan@gmail.com', NULL, '$2y$10$mdeTyljaesOc2vX4rrg6wuwgCH78IE0/fPCajSGC2dgspjY4yZlTG', 2, NULL, '2023-08-10 02:34:44', '2023-08-10 02:34:44'),
(2, 'Ananta Bagus', 'ananta@gmail.com', NULL, '$2y$10$eQ7k8yyt88Rhq06xP/xG4.F7SgcBc/plkowct.phJz5n5BaU7oBTS', 1, NULL, '2023-08-10 02:34:44', '2023-08-10 02:34:44'),
(3, 'Joko Suwarno', 'joko@gmail.com', NULL, '$2y$10$QRrSA674XNBHXgPUoIe3v.cmN8Db1Hw8SV5waYx8P79NgqedX7hIm', 12, NULL, '2023-08-10 02:34:44', '2023-08-10 02:34:44'),
(4, 'Agus Halis', 'agus@gmail.com', NULL, '$2y$10$.1XrW050ASoAtX7hCpNVtuDlOcDeP5yv5JUs3lxJojx3.eJhc4DHm', 13, NULL, '2023-08-10 02:34:44', '2023-08-10 02:34:44'),
(5, 'Annisa Gian', 'annisa@gmail.com', NULL, '$2y$10$kXp5.PgWOrK/jz1VzmqkP.lPzD/T30oHXuX7sBOdlEOBpM7AqvxrK', 3, NULL, '2023-08-10 02:34:44', '2023-08-10 02:34:44'),
(6, 'Anna Gian', 'anna@gmail.com', NULL, '$2y$10$LdXmR/XcnpA9NPdX4yLBqO/rgZGvnNE8cYSEQT6s0XcT/l.1Czmkm', 4, NULL, '2023-08-10 02:34:44', '2023-08-10 02:34:44'),
(7, 'Juan Marrtin', 'juan@gmail.com', NULL, '$2y$10$3nPoH3lN97JjiwsMT99fquT0WADzzvVTN5g0DQdvH/2CLAg6C.JVi', 5, NULL, '2023-08-10 02:34:44', '2023-08-10 02:34:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowers_employee_id_foreign` (`employee_id`),
  ADD KEY `borrowers_loan_id_foreign` (`loan_id`);

--
-- Indeks untuk tabel `company_locs`
--
ALTER TABLE `company_locs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers_employee_id_foreign` (`employee_id`),
  ADD KEY `drivers_loan_id_foreign` (`loan_id`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_position_id_foreign` (`position_id`),
  ADD KEY `employees_departement_id_foreign` (`departement_id`),
  ADD KEY `employees_company_loc_id_foreign` (`company_loc_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `first_confirmers`
--
ALTER TABLE `first_confirmers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first_confirmers_employee_id_foreign` (`employee_id`),
  ADD KEY `first_confirmers_loan_id_foreign` (`loan_id`);

--
-- Indeks untuk tabel `fuel_refils`
--
ALTER TABLE `fuel_refils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuel_refils_transportation_id_foreign` (`transportation_id`),
  ADD KEY `fuel_refils_employee_id_foreign` (`employee_id`),
  ADD KEY `fuel_refils_company_loc_id_foreign` (`company_loc_id`);

--
-- Indeks untuk tabel `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_company_loc_id_foreign` (`company_loc_id`),
  ADD KEY `loans_transportation_id_foreign` (`transportation_id`);

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
-- Indeks untuk tabel `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `second_confirmers`
--
ALTER TABLE `second_confirmers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `second_confirmers_employee_id_foreign` (`employee_id`),
  ADD KEY `second_confirmers_loan_id_foreign` (`loan_id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_transportation_id_foreign` (`transportation_id`),
  ADD KEY `services_employee_id_foreign` (`employee_id`),
  ADD KEY `services_company_loc_id_foreign` (`company_loc_id`);

--
-- Indeks untuk tabel `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transportations_company_loc_id_foreign` (`company_loc_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_employee_id_foreign` (`employee_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `company_locs`
--
ALTER TABLE `company_locs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `first_confirmers`
--
ALTER TABLE `first_confirmers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fuel_refils`
--
ALTER TABLE `fuel_refils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `second_confirmers`
--
ALTER TABLE `second_confirmers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `borrowers`
--
ALTER TABLE `borrowers`
  ADD CONSTRAINT `borrowers_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `borrowers_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`);

--
-- Ketidakleluasaan untuk tabel `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `drivers_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`);

--
-- Ketidakleluasaan untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_company_loc_id_foreign` FOREIGN KEY (`company_loc_id`) REFERENCES `company_locs` (`id`),
  ADD CONSTRAINT `employees_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);

--
-- Ketidakleluasaan untuk tabel `first_confirmers`
--
ALTER TABLE `first_confirmers`
  ADD CONSTRAINT `first_confirmers_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `first_confirmers_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`);

--
-- Ketidakleluasaan untuk tabel `fuel_refils`
--
ALTER TABLE `fuel_refils`
  ADD CONSTRAINT `fuel_refils_company_loc_id_foreign` FOREIGN KEY (`company_loc_id`) REFERENCES `company_locs` (`id`),
  ADD CONSTRAINT `fuel_refils_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `fuel_refils_transportation_id_foreign` FOREIGN KEY (`transportation_id`) REFERENCES `transportations` (`id`);

--
-- Ketidakleluasaan untuk tabel `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_company_loc_id_foreign` FOREIGN KEY (`company_loc_id`) REFERENCES `company_locs` (`id`),
  ADD CONSTRAINT `loans_transportation_id_foreign` FOREIGN KEY (`transportation_id`) REFERENCES `transportations` (`id`);

--
-- Ketidakleluasaan untuk tabel `second_confirmers`
--
ALTER TABLE `second_confirmers`
  ADD CONSTRAINT `second_confirmers_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `second_confirmers_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`);

--
-- Ketidakleluasaan untuk tabel `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_company_loc_id_foreign` FOREIGN KEY (`company_loc_id`) REFERENCES `company_locs` (`id`),
  ADD CONSTRAINT `services_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `services_transportation_id_foreign` FOREIGN KEY (`transportation_id`) REFERENCES `transportations` (`id`);

--
-- Ketidakleluasaan untuk tabel `transportations`
--
ALTER TABLE `transportations`
  ADD CONSTRAINT `transportations_company_loc_id_foreign` FOREIGN KEY (`company_loc_id`) REFERENCES `company_locs` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
