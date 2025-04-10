-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 10:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gas_station`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cần Thơ', '2025-03-11 17:13:55', '2025-03-11 17:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `UserId` int(10) UNSIGNED DEFAULT NULL,
  `ManagerId` int(10) UNSIGNED DEFAULT NULL,
  `WardId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone`, `longitude`, `latitude`, `UserId`, `ManagerId`, `WardId`, `created_at`, `updated_at`) VALUES
(1, 'Công ty TNHH MTV Xăng dầu Tây Nam Bộ (Petrolimex Cần Thơ)', 'Số 21, đường Cách mạng tháng 8, phường Thới Bình, quận Ninh Kiều, TP. Cần Thơ.', '(0292) 3820-554', 0.0000000, 0.0000000, 9, NULL, 1, '2025-03-20 15:23:14', '2025-03-20 15:23:14'),
(2, 'Công ty Dầu khí Nam Sông Hậu', 'Số 2A, đường 30/4, P. Hưng Lợi, Q. Ninh Kiều, TP.Cần Thơ.', '', 0.0000000, 0.0000000, 10, NULL, 1, '2025-03-20 15:23:14', '2025-03-20 15:23:14'),
(3, 'Chi nhánh Công ty TNHH một thành viên Dầu khí Thành phố Hồ Chí Minh tại thành phố Cần Thơ', 'Lô số 15-16 khu công nghiệp Trà Nóc II, phường Phước Thới, quận Ô Môn, TP.Cần Thơ.', '07103.844459', 0.0000000, 0.0000000, 11, NULL, 1, '2025-03-20 15:23:14', '2025-03-20 15:23:14'),
(4, 'CÔNG TY CỔ PHẦN XĂNG DẦU VÀ DỊCH VỤ HÀNG HẢI S.T.S', '102 Nguyễn Du, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh - Việt Nam', '(028) 3911 8760', 0.0000000, 0.0000000, 12, NULL, 1, '2025-03-20 15:23:14', '2025-03-20 15:23:14'),
(7, 'CÔNG TY TNHH MTV XĂNG DẦU LÊ UYÊN I', '313, Ql 1A, KV Yên Trung, Phường Lê Bình, Quận Cái Răng, Thành phố Cần Thơ, Việt Nam', '02923912818', 9.9931164, 105.7541776, 15, NULL, 12, '2025-04-07 03:48:41', '2025-04-07 03:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `CityId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `CityId`, `created_at`, `updated_at`) VALUES
(1, 'Bình Thủy', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(2, 'Cái Răng', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(3, 'Ninh Kiều', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(4, 'Ô Môn', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(5, 'Thốt Nốt', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(6, 'Cờ Đỏ', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(7, 'Phong Điền', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(8, 'Thới Lai', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(9, 'Vĩnh Thạnh', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `fuel_types`
--

CREATE TABLE `fuel_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fuel_types`
--

INSERT INTO `fuel_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Xăng 95', '2025-03-11 10:14:13', '2025-03-11 10:14:13'),
(2, 'Xăng A92', '2025-04-01 18:12:59', '2025-04-01 18:12:59'),
(3, 'Xăng E5 RON 92', '2025-03-31 18:13:17', '2025-03-31 18:13:17'),
(4, 'Xăng E10 RON 95', '2025-04-01 18:13:29', '2025-04-01 18:13:29'),
(5, 'Xăng A98', '2025-04-01 18:13:29', '2025-04-01 18:13:29'),
(6, 'Xăng Super 100', '2025-04-02 18:13:57', '2025-04-02 18:13:57'),
(7, 'Xăng Biofuel E85', '2025-04-03 18:13:57', '2025-04-03 18:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `gastation_fuel_type`
--

CREATE TABLE `gastation_fuel_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `GasStationId` int(10) UNSIGNED NOT NULL,
  `FuelTypeId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gastation_fuel_type`
--

INSERT INTO `gastation_fuel_type` (`id`, `GasStationId`, `FuelTypeId`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '2025-03-12 03:25:13', '2025-03-12 03:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `gas_stations`
--

CREATE TABLE `gas_stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `image` text DEFAULT NULL,
  `operation_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CompanyId` int(10) UNSIGNED NOT NULL,
  `WardId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gas_stations`
--

INSERT INTO `gas_stations` (`id`, `name`, `address`, `phone`, `longitude`, `latitude`, `image`, `operation_time`, `CompanyId`, `WardId`, `created_at`, `updated_at`) VALUES
(2, 'Cây xăng dầu nhà khách Cần Thơ', '2PCR+3MC, An Bình, Ninh Kiều, Cần Thơ, Việt Nam', '12345678', 105.7417900, 10.0205800, 'gas_station/nha_khach_can_tho.jpg', 'Mở cửa cả ngày', 1, 16, '2025-03-11 10:22:59', '2025-03-11 10:22:59'),
(3, 'cây xăng abc', '3/2, Hung Loi, Ninh Kieu, Can Tho', '12345678', 123.0000000, 124.0000000, 'gas_station/20250312_cay-xang-abc_2_38.png', '18h30 - 21h30', 2, 38, '2025-03-12 10:33:21', '2025-03-12 10:38:56'),
(4, 'Cửa hàng xăng dầu số 1', '66 Đ. Cách Mạng Tháng 8, Thới Bình, Ninh Kiều, Cần Thơ, Việt Nam', '(0292) 3830-123', 105.7784672, 10.0517913, 'gas_station/20250312_cay-xang-abc_2_38.png', '06:00 - 22:00', 1, 1, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(5, 'Cửa hàng xăng dầu số 2', '135 Đ. Cách Mạng Tháng 8, An Thới, Bình Thủy, Cần Thơ, Việt Nam', '(0292) 3822-456', 105.7556365, 10.0715870, 'gas_station/20250312_cay-xang-abc_2_38.png', '06:00 - 22:00', 1, 2, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(6, 'Cửa hàng xăng dầu số 3', '248 Đ. Cách Mạng Tháng 8, Bùi Hữu Nghĩa, Bình Thủy, Cần Thơ, Việt Nam', '(0292) 3845-678', 0.0000000, 0.0000000, NULL, '06:00 - 22:00', 1, 3, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(7, 'Cửa hàng xăng dầu số 17', '146 Đ. 3 Tháng 2, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '(0292) 3876-543', 105.7612273, 10.0291886, 'gas_station/xang_dau_17.jpg', '06:00 - 22:00', 1, 4, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(8, 'Cửa hàng xăng dầu số 10', '79 Đ. 3 Tháng 2, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '(0292) 3890-987', 105.7557341, 10.0203985, 'gas_station/cua_hang_xang_dau_petrolimex_so_10.jpg', '06:00 - 22:00', 1, 5, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(9, 'Cửa hàng xăng dầu Nam Sông Hậu 1', '143 ĐT932, Nhơn Nghĩa, Phong Điền, Cần Thơ, Việt Nam', '0766766621', 0.0000000, 0.0000000, NULL, '06:00 - 22:00', 2, 6, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(10, 'SAIGON PETRO- Cửa Hàng Xăng Dầu Số 36', '91b Đ. Nguyễn Văn Linh, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '02923749431', 105.7626866, 10.0248101, 'gas_station/xang_dau_36.jpg', 'Cả ngày', 3, 7, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(11, 'Saigon Petro - Cửa hàng Xăng dầu Hoàng Yến', '108, KV2 Quốc Lộ 1A, Quận Cái Răng, Ba Láng, Cái Răng, Cần Thơ, Việt Nam', '02923842389', 105.7442655, 9.9817812, NULL, 'Cả ngày', 3, 8, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(12, 'Cửa Hàng Xăng Dầu 207', '58, 3/2 Street, Hung Loi Ward, Ninh Kieu District, Cantho City, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '', 105.7584113, 10.0167898, 'gas_station/xang_dau_207.jpg', '04:00 - 22:00', 4, 9, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(13, 'Cây Xăng 199', '190 Đ. 30 Tháng 4, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '0123456789', 105.7655900, 10.0176000, 'gas_station/cay_xang_199.jpg', '06:00 - 23:00', 4, 10, '2025-03-20 15:34:10', '2025-03-20 15:34:10'),
(14, 'Trạm xăng 99', '447 Đ. 30 Tháng 4, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '0123576572', 105.7633300, 10.0148400, NULL, '', 1, 1, '2025-04-07 10:02:03', '2025-04-07 10:02:03'),
(15, 'Cửa hàng Xăng dầu Petrolimex Số 13', '2Q62+2HW, Khu vực Lợi Nguyên, An Bình, Ninh Kiều, Cần Thơ, Việt Nam', '02923739082', 105.7528430, 10.0105880, 'gas_station/xang_dau_13.jpg', '04:00–22:00', 1, 2, '2025-04-07 10:02:03', '2025-04-07 10:02:03'),
(16, 'Đại Lý Xăng Dầu Lê Uyên', '313 QL1A, Lê Bình, Cái Răng, Cần Thơ, Việt Nam', '02923912818', 9.9986467, 105.7506359, 'gas_station/20250407_dai-ly-xang-dau-le-uyen_1_12.jpg', '05:00–22:00', 1, 12, '2025-04-07 03:51:07', '2025-04-07 03:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2025_03_03_145318_create_cities_table', 1),
(20, '2025_03_03_145319_create_districts_table', 1),
(21, '2025_03_03_145320_create_wards_table', 1),
(22, '2025_03_04_145315_create_managers_table', 1),
(23, '2025_03_04_145316_create_companies_table', 1),
(24, '2025_03_04_145316_create_fuel_types_table', 1),
(25, '2025_03_04_145316_create_gas_stations_table', 1),
(26, '2025_03_04_145316_create_prices_table', 1),
(27, '2025_03_04_145317_create_reviews_table', 1),
(28, '2025_03_05_061404_create_gastation_fuel_type_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `FuelTypeId` int(10) UNSIGNED NOT NULL,
  `CompanyId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `start_date`, `FuelTypeId`, `CompanyId`, `created_at`, `updated_at`) VALUES
(1, 1650070.00, '2025-03-15', 1, 2, '2025-03-12 10:02:29', '2025-03-12 10:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `content` text NOT NULL,
  `GasStationId` bigint(20) UNSIGNED NOT NULL,
  `UserId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `content`, `GasStationId`, `UserId`, `created_at`, `updated_at`) VALUES
(1, 4, 'tri dat xau quac', 5, 13, '2025-04-03 11:47:04', '2025-04-03 11:47:04'),
(2, 5, 'Ố là la', 5, 12, '2025-04-01 16:26:46', '2025-04-01 16:26:49'),
(3, 5, 'a', 13, 13, '2025-04-03 13:03:19', '2025-04-03 13:03:19'),
(4, 4, 'a', 10, 13, '2025-04-03 13:03:47', '2025-04-03 13:03:47'),
(5, 1, 'aaa', 5, 14, '2025-04-07 02:50:01', '2025-04-07 02:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `CCCD` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `CCCD`, `email`, `password`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '1234567890', 'dat@gmail.com', '$2y$10$Sr/Bnxtf5KTvwdJY2MvAJOKB66Fxgd4apRVaMKWTmyz.Q1g1Y9Kzm', '1', 1, NULL, '2025-03-11 10:12:39', '2025-03-11 10:12:39'),
(9, 'Petrolimex Cần Thơ', '012345678901', 'admin_petrolimex@example.com', '$2y$10$abcdefghijklmnopqrstuv', '2', 1, NULL, '2025-03-20 15:42:52', '2025-03-20 15:42:52'),
(10, 'Dầu khí Nam Sông Hậu', '123456789012', 'admin_namsonghau@example.com', '$2y$10$abcdefghijklmnopqrstuv', '2', 1, NULL, '2025-03-20 15:42:52', '2025-03-20 15:42:52'),
(11, 'Dầu khí TP.HCM', '234567890123', 'admin_hcm@example.com', '$2y$10$abcdefghijklmnopqrstuv', '2', 1, NULL, '2025-03-20 15:42:52', '2025-03-20 15:42:52'),
(12, 'STS Petro', '345678901234', 'admin_stspetro@example.com', '$2y$10$abcdefghijklmnopqrstuv', '2', 1, NULL, '2025-03-20 15:42:52', '2025-03-20 15:42:52'),
(13, 'Trí Đạt', '123123124', 'd@gmail.com', '$2y$10$z9T//iCRyF2Nb65GBHBlwuHvuFrSQ/9L8kral7h9r8eN3bB28KgR.', '0', 1, NULL, '2025-04-03 02:18:01', '2025-04-03 02:18:01'),
(14, 'Nguyen Thao', '123555', 'thuthao@gmail.com', '$2y$10$pB.dipLickxx17H8cejbR.fQIZGEsIhjdSdZpGT7DLtrqFVDTkmau', '0', 1, NULL, '2025-04-03 13:09:49', '2025-04-03 13:09:49'),
(15, 'CÔNG TY TNHH MTV XĂNG DẦU LÊ UYÊN I', '886252', 'xdleuyen@gmail.com', '$2y$10$lEwezPv559NWQqxgsovqauwHZOeahXwPtiT4AAPIX9feTRAwfURAq', '2', 1, NULL, '2025-04-07 03:45:11', '2025-04-07 03:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `DistrictId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `name`, `DistrictId`, `created_at`, `updated_at`) VALUES
(1, 'An Thới', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(2, 'Bình Thủy', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(3, 'Bùi Hữu Nghĩa', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(4, 'Long Hòa', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(5, 'Long Tuyền', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(6, 'Thới An Đông', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(7, 'Trà An', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(8, 'Trà Nóc', 1, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(9, 'Ba Láng', 2, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(10, 'Hưng Phú', 2, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(11, 'Hưng Thạnh', 2, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(12, 'Lê Bình', 2, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(13, 'Phú Thứ', 2, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(14, 'Tân Phú', 2, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(15, 'Thường Thạnh', 2, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(16, 'An Bình', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(17, 'An Cư', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(18, 'An Hòa', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(19, 'An Khánh', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(20, 'An Nghiệp', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(21, 'An Phú', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(22, 'Cái Khế', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(23, 'Hưng Lợi', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(24, 'Tân An', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(25, 'Thới Bình', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(26, 'Xuân Khánh', 3, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(27, 'Châu Văn Liêm', 4, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(28, 'Long Hưng', 4, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(29, 'Phước Thới', 4, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(30, 'Thới An', 4, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(31, 'Thới Hòa', 4, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(32, 'Thới Long', 4, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(33, 'Trường Lạc', 4, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(34, 'Tân Hưng', 5, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(35, 'Tân Lộc', 5, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(36, 'Thạnh Hòa', 5, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(37, 'Thốt Nốt', 5, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(38, 'Thới Thuận', 5, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(39, 'Trung Kiên', 5, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(40, 'Trung Nhứt', 5, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(41, 'Đông Hiệp', 6, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(42, 'Đông Thắng', 6, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(43, 'Thạnh Phú', 6, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(44, 'Thới Đông', 6, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(45, 'Thới Hưng', 6, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(46, 'Thới Xuân', 6, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(47, 'Trung An', 6, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(48, 'Trung Hưng', 6, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(49, 'Trung Thạnh', 6, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(50, 'Giai Xuân', 7, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(51, 'Mỹ Khánh', 7, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(52, 'Nhơn Ái', 7, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(53, 'Nhơn Nghĩa', 7, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(54, 'Phong Điền', 7, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(55, 'Tân Thới', 7, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(56, 'Trường Long', 7, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(57, 'Định Môn', 8, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(58, 'Đông Bình', 8, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(59, 'Đông Thuận', 8, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(60, 'Tân Thạnh', 8, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(61, 'Thới Lai', 8, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(62, 'Thới Tân', 8, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(63, 'Trường Thành', 8, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(64, 'Trường Thắng', 8, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(65, 'Xuân Thắng', 8, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(66, 'Thạnh An', 9, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(67, 'Thạnh Lộc', 9, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(68, 'Thạnh Lợi', 9, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(69, 'Thạnh Mỹ', 9, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(70, 'Thạnh Quới', 9, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(71, 'Thạnh Thắng', 9, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(72, 'Thạnh Tiến', 9, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(73, 'Vĩnh Bình', 9, '2025-03-11 17:13:55', '2025-03-11 17:13:55'),
(74, 'Vĩnh Trinh', 9, '2025-03-11 17:13:55', '2025-03-11 17:13:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fuel_types`
--
ALTER TABLE `fuel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gastation_fuel_type`
--
ALTER TABLE `gastation_fuel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gas_stations`
--
ALTER TABLE `gas_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `managers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cccd_unique` (`CCCD`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_types`
--
ALTER TABLE `fuel_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gastation_fuel_type`
--
ALTER TABLE `gastation_fuel_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gas_stations`
--
ALTER TABLE `gas_stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
