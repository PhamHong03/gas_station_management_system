-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th4 10, 2025 lúc 12:08 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gas_station1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cần Thơ', '2025-03-11 17:13:55', '2025-03-11 17:13:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `companies`
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
-- Đang đổ dữ liệu cho bảng `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone`, `longitude`, `latitude`, `UserId`, `ManagerId`, `WardId`, `created_at`, `updated_at`) VALUES
(1, 'Công ty TNHH MTV Xăng dầu Tây Nam Bộ (Petrolimex Cần Thơ)', 'Số 21, đường Cách mạng tháng 8, phường Thới Bình, quận Ninh Kiều, TP. Cần Thơ.', '(0292) 3820-554', 0.0000000, 0.0000000, 9, NULL, 1, '2025-03-20 15:23:14', '2025-03-20 15:23:14'),
(2, 'Công ty Dầu khí Nam Sông Hậu', 'Số 2A, đường 30/4, P. Hưng Lợi, Q. Ninh Kiều, TP.Cần Thơ.', '', 0.0000000, 0.0000000, 10, NULL, 1, '2025-03-20 15:23:14', '2025-03-20 15:23:14'),
(3, 'Chi nhánh Công ty TNHH một thành viên Dầu khí Thành phố Hồ Chí Minh tại thành phố Cần Thơ', 'Lô số 15-16 khu công nghiệp Trà Nóc II, phường Phước Thới, quận Ô Môn, TP.Cần Thơ.', '07103.844459', 0.0000000, 0.0000000, 11, NULL, 1, '2025-03-20 15:23:14', '2025-03-20 15:23:14'),
(4, 'CÔNG TY CỔ PHẦN XĂNG DẦU VÀ DỊCH VỤ HÀNG HẢI S.T.S', '102 Nguyễn Du, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh - Việt Nam', '(028) 3911 8760', 0.0000000, 0.0000000, 12, NULL, 1, '2025-03-20 15:23:14', '2025-03-20 15:23:14'),
(7, 'CÔNG TY TNHH MTV XĂNG DẦU LÊ UYÊN I', '313, Ql 1A, KV Yên Trung, Phường Lê Bình, Quận Cái Răng, Thành phố Cần Thơ, Việt Nam', '02923912818', 9.9931164, 105.7541776, 15, NULL, 12, '2025-04-07 03:48:41', '2025-04-07 03:48:41'),
(8, 'PVOIL TỔNG CÔNG TY DẦU VIỆT NAM\r\n', '1-5 Lê Duẩn, Bến Nghé, Quận 1, Hồ Chí Minh, Việt Nam', '02839106990', 104.7559561, 9.9736427, NULL, NULL, 0, NULL, NULL),
(9, 'Tống Công ty Quản lý xăng dầu Cần Thơ', '220 Tầm Vu, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '0321654654', 105.7250096, 10.0119864, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `CityId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `districts`
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
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `fuel_types`
--

CREATE TABLE `fuel_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fuel_types`
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
-- Cấu trúc bảng cho bảng `gastation_fuel_type`
--

CREATE TABLE `gastation_fuel_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `GasStationId` int(10) UNSIGNED NOT NULL,
  `FuelTypeId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gastation_fuel_type`
--

INSERT INTO `gastation_fuel_type` (`id`, `GasStationId`, `FuelTypeId`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '2025-03-12 03:25:13', '2025-03-12 03:25:13'),
(5, 57, 1, '2025-04-10 02:46:17', '2025-04-10 02:46:17'),
(6, 57, 2, '2025-04-10 03:02:49', '2025-04-10 03:02:49'),
(7, 3, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(8, 4, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(9, 5, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(10, 6, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(11, 7, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(12, 8, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(13, 9, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(14, 10, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(15, 11, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(16, 12, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(17, 13, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(18, 14, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(19, 15, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(20, 16, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(21, 17, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(22, 18, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(23, 19, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(24, 20, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(25, 21, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(26, 22, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(27, 23, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(28, 24, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(29, 25, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(30, 26, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(31, 27, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(32, 28, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(33, 29, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(34, 30, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(35, 31, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(36, 32, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(37, 33, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(38, 34, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(39, 35, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(40, 36, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(41, 37, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(42, 38, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(43, 39, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(44, 40, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(45, 41, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(46, 42, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(47, 43, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(48, 44, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(49, 45, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(50, 46, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(51, 47, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(52, 48, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(53, 49, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(54, 50, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(55, 51, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(56, 52, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(57, 53, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(58, 54, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(59, 55, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(60, 56, 1, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(70, 2, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(71, 3, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(72, 4, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(73, 5, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(74, 6, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(75, 7, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(76, 8, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(77, 9, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(78, 10, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(79, 11, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(80, 12, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(81, 13, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(82, 14, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(83, 15, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(84, 16, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(85, 17, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(86, 18, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(87, 19, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(88, 20, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(89, 21, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(90, 22, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(91, 23, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(92, 24, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(93, 25, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(94, 26, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(95, 27, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(96, 28, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(97, 29, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(98, 30, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(99, 31, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(100, 32, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(101, 33, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(102, 34, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(103, 35, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(104, 36, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(105, 37, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(106, 38, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(107, 39, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(108, 40, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(109, 41, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(110, 42, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(111, 43, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(112, 44, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(113, 45, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(114, 46, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(115, 47, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(116, 48, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(117, 49, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(118, 50, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(119, 51, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(120, 52, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(121, 53, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(122, 54, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(123, 55, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49'),
(124, 56, 2, '2025-04-10 10:06:49', '2025-04-10 10:06:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gas_stations`
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
-- Đang đổ dữ liệu cho bảng `gas_stations`
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
(16, 'Đại Lý Xăng Dầu Lê Uyên', '313 QL1A, Lê Bình, Cái Răng, Cần Thơ, Việt Nam', '02923912818', 9.9986467, 105.7506359, 'gas_station/20250407_dai-ly-xang-dau-le-uyen_1_12.jpg', '05:00–22:00', 1, 12, '2025-04-07 03:51:07', '2025-04-07 03:51:07'),
(17, 'Cửa hàng Xăng dầu Petrolimex Số 05', '24 Nguyễn Trãi, Thới Bình, Ninh Kiều, Cần Thơ, Việt Nam', '02923821675', 105.7826682, 10.0517181, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-05_1_25.jpg', 'Cả ngày', 1, 25, '2025-04-09 23:30:02', '2025-04-09 23:30:02'),
(18, 'Cửa hàng xăng dầu Petrolimex Số 16', '142 Đ. Nguyễn Văn Cừ, Phường An Khánh, Ninh Kiều, Cần Thơ, Việt Nam', '0908838525', 105.7586356, 10.0439428, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-16_1_19.jpg', '05:00–22:00', 1, 19, '2025-04-09 23:31:53', '2025-04-09 23:31:53'),
(19, 'Cửa hàng xăng dầu Petrolimex Số 9', '222 QL91B, Long Tuyền, Bình Thủy, Cần Thơ, Việt Nam', '19002828', 105.7341113, 10.0558290, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-9_1_5.jpg', '06:00–23:00', 1, 5, '2025-04-09 23:34:24', '2025-04-09 23:34:24'),
(20, 'Cửa hàng Xăng dầu Petrolimex Số 15', '2Q5R+G2M, Khu dân cư Vạn Phong, Cái Răng, Cần Thơ, Việt Nam', '02926295858', 105.7883563, 10.0152606, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-15_1_11.jpg', '04:00–22:00', 1, 11, '2025-04-09 23:36:47', '2025-04-09 23:36:47'),
(21, 'Cửa hàng Xăng dầu Petrolimex Số 21', 'XQW4+CQ4, Thường Thạnh, Cái Răng, Cần Thơ, Việt Nam', '0987654321', 105.7567090, 9.9972359, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-21_1_15.jpg', '05:00–21:00', 1, 15, '2025-04-09 23:38:09', '2025-04-09 23:38:09'),
(22, 'Cửa hàng Xăng dầu Petrolimex Số 18', 'XPWX+CV5, Lê Bình, Cái Răng, Cần Thơ, Việt Nam', '0987654321', 105.7497585, 9.9962932, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-18_1_12.jpg', '05:00–22:00', 1, 12, '2025-04-09 23:39:37', '2025-04-09 23:39:37'),
(23, 'Cửa hàng Xăng dầu Petrolimex Số 19', '167/4a Phạm Hùng, Lê Bình, Cái Răng, Cần Thơ, Việt Nam', '02923846153', 105.7492314, 9.9956950, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-19_1_12.jpg', '05:00–22:00', 1, 12, '2025-04-09 23:43:30', '2025-04-09 23:43:30'),
(24, 'Cửa hàng Xăng dầu Petrolimex Số 23', 'XPMP+WX5, Ba Láng, Cái Răng, Cần Thơ, Việt Nam', '0987654321', 105.7374999, 9.9848480, NULL, '05:00–21:00', 1, 9, '2025-04-09 23:45:17', '2025-04-09 23:45:17'),
(25, 'Cửa hàng Xăng dầu Petrolimex Số 04', '264 Ấp Mỹ Phước, Huyện Phong Điền, Mỹ Khánh, Phong Điền, Cần Thơ, Việt Nam', '02923847582', 105.7177261, 9.9957147, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-04_1_51.jpg', '05:00–20:00', 1, 51, '2025-04-09 23:46:33', '2025-04-09 23:46:33'),
(26, 'Cửa hàng Xăng dầu Petrolimex Số 24', 'XQPR+QF7, Đương Trương Vĩnh Nguyên, Phú Thứ, Cái Răng, Cần Thơ, Việt Nam', '0987654321', 105.7911941, 9.9870036, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-24_1_13.jpg', '05:00–21:00', 1, 13, '2025-04-09 23:47:58', '2025-04-09 23:47:58'),
(27, 'Cửa hàng Xăng dầu Petrolimex Số 13', '3M9C+JQM, QL91B, An Thới, Bình Thủy, Cần Thơ, Việt Nam', '0987654321', 105.6719160, 10.0692191, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-13_1_1.jpg', '05:00–20:00', 1, 1, '2025-04-09 23:49:48', '2025-04-09 23:49:48'),
(28, 'Cửa hàng Xăng dầu Petrolimex Số 11', '113, Phước Thới, Ô Môn, Cần Thơ, Việt Nam', '0987654321', 105.6952772, 10.1005568, NULL, 'Cả ngày', 1, 29, '2025-04-09 23:52:06', '2025-04-09 23:52:06'),
(29, 'Cửa hàng Xăng dầu Petrolimex Số 12', '260 QL91, Châu Văn Liêm, Ô Môn, Cần Thơ, Việt Nam', '02923861231', 105.6242546, 10.1171796, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-12_1_27.jpg', '05:00–21:00', 1, 27, '2025-04-09 23:53:33', '2025-04-09 23:53:33'),
(30, 'Cửa hàng Xăng dầu Petrolimex Số 14', '7G4J+2JC, Trung Nhất, Thốt Nốt, Cần Thơ, Việt Nam', '02922468479', 105.5287299, 10.2764943, 'gas_station/20250410_cua-hang-xang-dau-petrolimex-so-14_1_40.jpg', '05:00–20:00', 1, 40, '2025-04-09 23:54:52', '2025-04-09 23:54:52'),
(31, 'Cửa hàng Xăng dầu Petrolimex Số 20', '65 ĐT926, Nhơn ái, Phong Điền, Cần Thơ, Việt Nam', '0907521405', 105.6660865, 10.0038491, NULL, '05:00–20:00', 1, 52, '2025-04-09 23:56:05', '2025-04-09 23:56:05'),
(32, 'Cửa hàng Xăng dầu Petrolimex Số 22', 'XRR6+H69, Phú Thứ, Cái Răng, Cần Thơ, Việt Nam', '0987654321', 105.8181183, 10.0037894, NULL, '05:00–22:00', 1, 13, '2025-04-10 00:00:47', '2025-04-10 00:00:47'),
(33, 'Trạm Xăng Dầu Sài Gòn Petro (SP Petro) Trần Văn Hoài - 30/4', '2QFF+VF4, Đ. 30 Tháng 4, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam', '02923739994', 105.7741801, 10.0303438, 'gas_station/20250410_tram-xang-dau-sai-gon-petro-sp-petro-tran-van-hoai-304_3_26.jpg', 'Cả ngày', 3, 26, '2025-04-10 00:06:21', '2025-04-10 00:06:21'),
(34, 'SAIGON PETRO- Cây Xăng Số 9', '4P24+F28, Lê Hồng Phong, Trà Nóc, Bình Thủy, Cần Thơ, Việt Nam', '0987654321', 105.7070535, 10.1046107, NULL, 'Cả ngày', 3, 8, '2025-04-10 00:21:38', '2025-04-10 00:21:38'),
(35, 'Saigon Petro - Cửa hàng Xăng dầu Hoàng Yến', '108, KV2 Quốc Lộ 1A, Quận Cái Răng, Ba Láng, Cái Răng, Cần Thơ, Việt Nam', '02923842389', 105.7415965, 9.9872757, NULL, 'Cả ngày', 3, 9, '2025-04-10 00:24:28', '2025-04-10 00:24:28'),
(36, 'PVOIL PETROMEKONG CHXD SỐ 81', 'Lô 3A, đường Quang Trung, KDC Hưng Phú 1, P Hưng Phú, Quận Cái Răng, TP Cần Thơ Can, Cần Thơ 94912, Việt Nam', '0939443361', 105.7838970, 10.0263038, 'gas_station/20250410_pvoil-petromekong-chxd-so-81_8_10.jpg', 'Cả ngày', 8, 10, '2025-04-10 00:28:38', '2025-04-10 00:28:38'),
(37, 'Cây Xăng Pv Oil', '172 Đ. 3 Tháng 2, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '0987654321', 105.7677609, 10.0310369, 'gas_station/20250410_cay-xang-pv-oil_8_23.jpg', '05:00–22:00', 8, 23, '2025-04-10 00:30:04', '2025-04-10 00:30:04'),
(38, 'Pvoil CHXD SỐ 2 CẦN THƠ', '60 62Ba Tháng Hai, An Phú, Ninh Kiều, Cần Thơ, Việt Nam', '02923810817', 105.7735974, 10.0408409, 'gas_station/20250410_pvoil-chxd-so-2-can-tho_8_21.jpg', 'Cả ngày', 8, 21, '2025-04-10 00:30:56', '2025-04-10 00:30:56'),
(39, 'PVOIL SÀI GÒN CHXD SỐ 06', '113 Đường Nguyễn Truyền Thanh, P, Bình Thủy, Cần Thơ 902804, Việt Nam', '0939677666', 105.7516299, 10.0715730, 'gas_station/20250410_pvoil-sai-gon-chxd-so-06_8_2.jpg', 'Cả ngày', 8, 2, '2025-04-10 00:32:51', '2025-04-10 00:32:51'),
(40, 'Cây Xăng Hữu Tỷ', '35 Đ. 3 Tháng 2, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam', '02923810817', 105.7743586, 10.0318752, 'gas_station/20250410_cay-xang-huu-ty_9_26.jpg', '05:00–22:00', 9, 26, '2025-04-10 00:35:36', '2025-04-10 00:35:36'),
(41, 'Trạm xăng dầu An Bình', '3Q2P+6M9, Đ. Trần Phú, Cái Khế, Ninh Kiều, Cần Thơ, Việt Nam', '0987654321', 105.7867100, 10.0508834, 'gas_station/20250410_tram-xang-dau-an-binh_9_22.jpg', 'Cả ngày', 9, 22, '2025-04-10 00:37:04', '2025-04-10 00:37:04'),
(42, 'Cây Xăng Mậu Thân - Công ty xăng dầu Đồng Tháp', '2QJG+66P, Hẻm 95 Đ. Mậu Thân, An Phú, Ninh Kiều, Cần Thơ, Việt Nam', '0987654321', 105.7756150, 10.0307010, 'gas_station/20250410_cay-xang-mau-than-cong-ty-xang-dau-dong-thap_9_21.jpg', '06:00–22:00', 9, 21, '2025-04-10 00:39:33', '2025-04-10 00:39:33'),
(43, 'Trạm Xăng đường Mậu Thân', '84 Đ. Mậu Thân, An Hoà, Ninh Kiều, Cần Thơ, Việt Nam', '0979386303', 105.7675638, 10.0418996, 'gas_station/20250410_tram-xang-duong-mau-than_9_18.jpg', 'Cả ngày', 9, 18, '2025-04-10 00:40:38', '2025-04-10 00:40:38'),
(44, 'Trạm Cấp Phát Xăng Dầu Số 3', '369 Nguyễn Văn Cừ Nối Dài, Phường An Khánh, Ninh Kiều, Cần Thơ, Việt Nam', '0987654321', 105.7532365, 10.0316237, NULL, 'Cả ngày', 9, 19, '2025-04-10 00:46:11', '2025-04-10 00:46:11'),
(45, 'Petro Hoàng Yến', '138 Nguyễn Văn Cừ Nối Dài, Phường An Khánh, Ninh Kiều, Cần Thơ, Việt Nam', '0987654321', 105.7518361, 10.0296829, 'gas_station/20250410_petro-hoang-yen_3_19.jpg', 'Cả ngày', 3, 19, '2025-04-10 00:47:57', '2025-04-10 00:47:57'),
(46, 'Đại Lý Xăng Dầu Hoàng Đua', '146, Đường 3/2, Quận Ninh Kiều, Tp Cần Thơ, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '02923838961', 105.7617940, 10.0181182, NULL, 'Cả ngày', 9, 23, '2025-04-10 00:49:03', '2025-04-10 00:49:03'),
(47, 'Đại Lý Xăng Dầu Toàn Phát 2', '220 Tầm Vu, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '02923839877', 105.7707111, 10.0127608, 'gas_station/20250410_dai-ly-xang-dau-toan-phat-2_9_23.jpg', 'Cả ngày', 9, 23, '2025-04-10 00:50:05', '2025-04-10 00:50:05'),
(48, 'NSH PETRO', '9A Đ. Trần Phú, Cái Khế, Ninh Kiều, Cần Thơ, Việt Nam', '0987654321', 105.7870260, 10.0505739, 'gas_station/20250410_nsh-petro_2_22.jpg', 'Cả ngày', 2, 22, '2025-04-10 00:52:25', '2025-04-10 00:52:25'),
(49, 'CH Xăng Dầu Hoàng Yến 9', '306 Nguyễn Văn Cừ Nối Dài, An Bình, Ninh Kiều, Cần Thơ, Việt Nam', '02923798389', 105.7390728, 10.0180052, NULL, '05:00–00:00', 9, 16, '2025-04-10 00:54:01', '2025-04-10 00:54:01'),
(50, 'Đại Lý Xăng Dầu Dntn Vạn Nguyên 2', '310 Cái Sơn Hàng Bàng, An Bình, Ninh Kiều, Cần Thơ, Việt Nam', '02923527048', 105.7440901, 10.0170726, 'gas_station/20250410_dai-ly-xang-dau-dntn-van-nguyen-2_9_16.jpg', 'Cả ngày', 9, 16, '2025-04-10 00:56:29', '2025-04-10 00:56:29'),
(51, 'Cửa Hàng Xăng Dầu Nam Cần Thơ', '99 đường Nguyễn Văn Cừ Nối Dài, An Bình, Ninh Kiều, Cần Thơ, Việt Nam', '02926252566', 105.7233473, 10.0047831, 'gas_station/20250410_cua-hang-xang-dau-nam-can-tho_9_16.jpg', '05:00–21:00', 9, 16, '2025-04-10 00:57:42', '2025-04-10 00:57:42'),
(52, 'Cây Xăng SaiGonPetro', '84 Đ. Mậu Thân, An Hoà, Ninh Kiều, Cần Thơ 94000, Việt Nam', '0987654321', 105.7670670, 10.0419610, NULL, '04:00–22:00', 9, 18, '2025-04-10 01:00:16', '2025-04-10 01:00:16'),
(53, 'Cây xăng hoàng yến', '158 Võ Văn Kiệt, An Hoà, Ninh Kiều, Cần Thơ 900000, Việt Nam', '0987654321', 105.7620962, 10.0464129, 'gas_station/20250410_cay-xang-hoang-yen_9_18.jpg', '05:00–21:00', 9, 18, '2025-04-10 01:02:00', '2025-04-10 01:02:00'),
(54, 'Cửa hàng xăng dầu Kim Phượng', '6/56 Nguyễn Văn Cừ nối dài, Ninh Kiều, Cần Thơ, Việt Nam', '0987654321', 105.7856822, 10.0606896, 'gas_station/20250410_cua-hang-xang-dau-kim-phuong_9_22.jpg', '05:00–20:00', 9, 22, '2025-04-10 01:04:05', '2025-04-10 01:04:32'),
(55, 'Giang Nam Petrol', '71B Hùng Vương, An Cư, Ninh Kiều, Cần Thơ, Việt Nam', '0987654321', 105.7790367, 10.0431304, NULL, '05:00–20:00', 9, 17, '2025-04-10 01:07:36', '2025-04-10 01:07:36'),
(56, 'Trạm xăng dầu Mipec', '2PMX+GCF, Đ. Nguyễn Văn Linh, Phường An Khánh, Ninh Kiều, Cần Thơ, Việt Nam', '0987654321', 105.7488471, 10.0339412, 'gas_station/20250410_tram-xang-dau-mipec_4_19.jpg', '05:00–22:00', 4, 19, '2025-04-10 01:09:01', '2025-04-10 01:09:01'),
(57, 'Trạm Xăng Dầu NSH Petro Bình Thuỷ', '360 Võ Văn Kiệt, An Thới, Bình Thủy, Cần Thơ, Việt Nam', '0987654321', 105.7485117, 10.0588624, 'gas_station/20250410_tram-xang-dau-nsh-petro-binh-thuy_2_1.jpg', '05:00–21:00', 2, 1, '2025-04-10 01:11:11', '2025-04-10 01:11:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `managers`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
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
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `prices`
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
-- Đang đổ dữ liệu cho bảng `prices`
--

INSERT INTO `prices` (`id`, `price`, `start_date`, `FuelTypeId`, `CompanyId`, `created_at`, `updated_at`) VALUES
(1, 1650070.00, '2025-03-15', 1, 2, '2025-03-12 10:02:29', '2025-03-12 10:16:07'),
(2, 25242.00, '2025-04-10', 1, 1, '2025-04-10 02:57:24', '2025-04-10 02:57:24'),
(3, 25111.00, '2025-04-10', 1, 2, '2025-04-10 02:58:00', '2025-04-10 02:58:00'),
(4, 25111.00, '2025-04-10', 1, 3, '2025-04-10 02:58:16', '2025-04-10 02:58:16'),
(5, 25666.00, '2025-04-10', 1, 4, '2025-04-10 02:58:48', '2025-04-10 02:58:48'),
(6, 24986.00, '2025-04-10', 1, 7, '2025-04-10 02:59:11', '2025-04-10 02:59:11'),
(7, 25555.00, '2025-04-10', 1, 8, '2025-04-10 02:59:55', '2025-04-10 02:59:55'),
(8, 25454.00, '2025-04-10', 1, 9, '2025-04-10 03:00:13', '2025-04-10 03:00:13'),
(9, 22765.00, '2025-04-10', 2, 1, '2025-04-10 03:00:32', '2025-04-10 03:00:32'),
(10, 22343.00, '2025-04-10', 2, 2, '2025-04-10 03:00:46', '2025-04-10 03:00:46'),
(11, 22456.00, '2025-04-10', 2, 3, '2025-04-10 03:01:08', '2025-04-10 03:01:08'),
(12, 22111.00, '2025-04-10', 2, 4, '2025-04-10 03:01:23', '2025-04-10 03:01:23'),
(13, 22333.00, '2025-04-10', 2, 7, '2025-04-10 03:01:39', '2025-04-10 03:01:39'),
(14, 22578.00, '2025-04-10', 2, 8, '2025-04-10 03:01:57', '2025-04-10 03:01:57'),
(15, 22544.00, '2025-04-10', 2, 9, '2025-04-10 03:02:21', '2025-04-10 03:02:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
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
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `content`, `GasStationId`, `UserId`, `created_at`, `updated_at`) VALUES
(1, 4, 'tri dat xau quac', 5, 13, '2025-04-03 11:47:04', '2025-04-03 11:47:04'),
(2, 5, 'Ố là la', 5, 12, '2025-04-01 16:26:46', '2025-04-01 16:26:49'),
(3, 5, 'a', 13, 13, '2025-04-03 13:03:19', '2025-04-03 13:03:19'),
(4, 4, 'a', 10, 13, '2025-04-03 13:03:47', '2025-04-03 13:03:47'),
(5, 1, 'aaa', 5, 14, '2025-04-07 02:50:01', '2025-04-07 02:50:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
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
-- Cấu trúc bảng cho bảng `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `DistrictId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wards`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `fuel_types`
--
ALTER TABLE `fuel_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gastation_fuel_type`
--
ALTER TABLE `gastation_fuel_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gas_stations`
--
ALTER TABLE `gas_stations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `managers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cccd_unique` (`CCCD`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `fuel_types`
--
ALTER TABLE `fuel_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `gastation_fuel_type`
--
ALTER TABLE `gastation_fuel_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT cho bảng `gas_stations`
--
ALTER TABLE `gas_stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
