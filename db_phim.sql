-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2024 lúc 05:47 AM
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
-- Cơ sở dữ liệu: `db_phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_douong_detail`
--

CREATE TABLE `bill_douong_detail` (
  `IDBILL_DOUONG` int(10) UNSIGNED NOT NULL,
  `IDDOUONG` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `DONGIA` decimal(10,2) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `NGAYTAO` timestamp NOT NULL DEFAULT current_timestamp(),
  `PAYMENTSTATUS` varchar(20) NOT NULL,
  `IDBILL_VE` bigint(20) UNSIGNED NOT NULL,
  `ID_USER` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_douong_detail`
--

INSERT INTO `bill_douong_detail` (`IDBILL_DOUONG`, `IDDOUONG`, `name`, `DONGIA`, `SOLUONG`, `NGAYTAO`, `PAYMENTSTATUS`, `IDBILL_VE`, `ID_USER`) VALUES
(17, 1, 'Long', 213000.00, 1, '2024-12-18 06:57:20', 'Đã thanh toán', 55, 12),
(18, 2, 'Long', 68000.00, 1, '2024-12-18 06:57:20', 'Đã thanh toán', 55, 12),
(19, 3, 'Long', 88000.00, 1, '2024-12-18 06:57:20', 'Đã thanh toán', 55, 12),
(20, 1, 'Long', 213000.00, 1, '2024-12-18 15:03:53', 'Đã thanh toán', 56, 12),
(21, 2, 'Long', 68000.00, 1, '2024-12-18 15:03:53', 'Đã thanh toán', 56, 12),
(22, 3, 'Long', 88000.00, 1, '2024-12-18 15:03:53', 'Đã thanh toán', 56, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_ve`
--

CREATE TABLE `bill_ve` (
  `IDBILL_VE` int(11) NOT NULL,
  `ID_USER` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `DONGIA` decimal(10,2) DEFAULT NULL,
  `NGAYTAO` datetime NOT NULL,
  `PAYMENTID` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_ve`
--

INSERT INTO `bill_ve` (`IDBILL_VE`, `ID_USER`, `name`, `DONGIA`, `NGAYTAO`, `PAYMENTID`, `created_at`, `updated_at`) VALUES
(55, 12, 'Long', 444000.00, '2024-12-18 13:57:20', 1, NULL, NULL),
(56, 12, 'Long', 444000.00, '2024-12-18 22:03:53', 1, NULL, NULL),
(70, 1, 'Nguyễn Đức Toàn', 75000.00, '2024-12-19 11:44:30', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `douong`
--

CREATE TABLE `douong` (
  `IDDOUONG` int(11) UNSIGNED NOT NULL,
  `TENDOUONG` varchar(100) NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  `MOTA` varchar(255) NOT NULL,
  `DONGIA` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `SOLUONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `douong`
--

INSERT INTO `douong` (`IDDOUONG`, `TENDOUONG`, `IMAGE`, `MOTA`, `DONGIA`, `created_at`, `updated_at`, `status`, `SOLUONG`) VALUES
(1, 'Family Combo 69oz', 'familycombo.png', 'TIẾT KIỆM 95K!!! Gồm: 2 Bắp (69oz) + 4 Nước có gaz (22oz) + 2 Snack Oishi (80g)', 213000.00, NULL, '2024-12-17 02:24:10', 0, 14),
(2, 'Beta Combo 69oz', 'betacombo.png', 'TIẾT KIỆM 28K!!! Gồm: 1 Bắp (69oz) + 1 Nước có gaz (22oz)', 68000.00, NULL, NULL, 0, 9),
(3, 'Sweet Combo 69oz', 'sweetcombo.png', 'TIẾT KIỆM 46K!!! Gồm: 1 Bắp (69oz) + 2 Nước có gaz (22oz)', 88000.00, NULL, NULL, 0, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichchieu`
--

CREATE TABLE `lichchieu` (
  `IDLICHCHIEU` char(10) NOT NULL,
  `IDPHIM` int(11) NOT NULL,
  `XUATCHIEU` datetime NOT NULL,
  `IDPHONGCHIEU` char(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichchieu`
--

INSERT INTO `lichchieu` (`IDLICHCHIEU`, `IDPHIM`, `XUATCHIEU`, `IDPHONGCHIEU`, `created_at`, `updated_at`, `status`) VALUES
('LC001', 1, '2024-12-20 14:00:00', 'PC01', NULL, NULL, 0),
('LC002', 2, '2024-12-21 16:30:00', 'PC02', NULL, NULL, 0),
('LC003', 3, '2024-12-22 19:00:00', 'PC03', NULL, NULL, 0),
('LC004', 4, '2024-12-23 10:00:00', 'PC01', NULL, NULL, 0),
('LC005', 5, '2024-12-23 13:00:00', 'PC02', NULL, NULL, 0),
('LC006', 2, '2024-12-23 15:30:00', 'PC03', NULL, NULL, 0),
('LC007', 1, '2024-12-24 18:00:00', 'PC01', NULL, NULL, 0),
('LC008', 2, '2024-12-24 20:30:00', 'PC02', NULL, NULL, 0),
('LC009', 3, '2024-12-25 14:00:00', 'PC03', NULL, NULL, 0),
('LC010', 1, '2024-12-12 10:37:00', 'PC01', '2024-12-18 02:37:24', '2024-12-18 02:37:24', 0);

--
-- Bẫy `lichchieu`
--
DELIMITER $$
CREATE TRIGGER `trg_AfterInsert_LichChieu` AFTER INSERT ON `lichchieu` FOR EACH ROW BEGIN
    -- Insert seat statuses into `trangthaighe` for all seats in the room of the new schedule
    INSERT INTO `trangthaighe` (`IDLICHCHIEU`, `IDGHE`, `IDPHONGCHIEU`, `STATUS`)
    SELECT 
        NEW.IDLICHCHIEU,    -- Schedule ID
        mg.IDGHE,           -- Seat ID
        mg.IDPHONGCHIEU,    -- Room ID
        0                   -- Default status: 0 (Available)
    FROM 
        `masoghe` mg
    WHERE 
        mg.IDPHONGCHIEU = NEW.IDPHONGCHIEU; -- Only seats from the same room as the schedule
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_AfterUpdate_IDPhongChieu` AFTER UPDATE ON `lichchieu` FOR EACH ROW BEGIN
    -- Kiểm tra nếu IDPHONGCHIEU thay đổi
    IF NEW.IDPHONGCHIEU != OLD.IDPHONGCHIEU THEN
        -- Xóa trạng thái ghế cũ
        DELETE FROM `trangthaighe`
        WHERE `IDLICHCHIEU` = OLD.IDLICHCHIEU;

        -- Thêm trạng thái ghế mới
        INSERT INTO `trangthaighe` (IDLICHCHIEU, IDGHE, IDPHONGCHIEU, STATUS)
        SELECT 
            NEW.IDLICHCHIEU,
            mg.IDGHE,
            NEW.IDPHONGCHIEU,
            0 -- Trạng thái mặc định là 0 (trống)
        FROM 
            `masoghe` mg
        WHERE 
            mg.IDPHONGCHIEU = NEW.IDPHONGCHIEU;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_AfterUpdate_LichChieu_Status` AFTER UPDATE ON `lichchieu` FOR EACH ROW BEGIN
    -- Case 1: Status is set to 1 -> Delete related records in trangthaighe
    IF NEW.status = 1 THEN
        DELETE FROM `trangthaighe`
        WHERE `IDLICHCHIEU` = NEW.IDLICHCHIEU;
    END IF;

    -- Case 2: Status is set to 0 -> Insert new records into trangthaighe
    IF NEW.status = 0 THEN
        INSERT INTO `trangthaighe` (IDLICHCHIEU, IDGHE, IDPHONGCHIEU, STATUS)
        SELECT 
            NEW.IDLICHCHIEU,
            mg.IDGHE,
            mg.IDPHONGCHIEU,
            0 -- Default status for newly added rows
        FROM 
            `masoghe` mg
        WHERE 
            mg.IDPHONGCHIEU = NEW.IDPHONGCHIEU;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaighe`
--

CREATE TABLE `loaighe` (
  `IDLOAIGHE` char(10) NOT NULL,
  `TENLOAIGHE` varchar(100) NOT NULL,
  `DONGIA` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaighe`
--

INSERT INTO `loaighe` (`IDLOAIGHE`, `TENLOAIGHE`, `DONGIA`, `created_at`, `updated_at`) VALUES
('LG01', 'Ghế thường', 50000.00, NULL, NULL),
('LG02', 'Ghế Vip', 75000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `masoghe`
--

CREATE TABLE `masoghe` (
  `IDGHE` char(10) NOT NULL,
  `IDLOAIGHE` char(10) NOT NULL,
  `IDPHONGCHIEU` char(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `masoghe`
--

INSERT INTO `masoghe` (`IDGHE`, `IDLOAIGHE`, `IDPHONGCHIEU`, `created_at`, `updated_at`) VALUES
('A01', 'LG01', 'PC01', NULL, NULL),
('A01', 'LG01', 'PC02', NULL, NULL),
('A01', 'LG01', 'PC03', NULL, NULL),
('A02', 'LG01', 'PC01', NULL, NULL),
('A02', 'LG01', 'PC02', NULL, NULL),
('A02', 'LG01', 'PC03', NULL, NULL),
('A03', 'LG01', 'PC01', NULL, NULL),
('A03', 'LG01', 'PC02', NULL, NULL),
('A03', 'LG01', 'PC03', NULL, NULL),
('A04', 'LG01', 'PC01', NULL, NULL),
('A04', 'LG01', 'PC02', NULL, NULL),
('A04', 'LG01', 'PC03', NULL, NULL),
('A05', 'LG01', 'PC01', NULL, NULL),
('A05', 'LG01', 'PC02', NULL, NULL),
('A05', 'LG01', 'PC03', NULL, NULL),
('A06', 'LG01', 'PC01', NULL, NULL),
('A06', 'LG01', 'PC02', NULL, NULL),
('A06', 'LG01', 'PC03', NULL, NULL),
('A07', 'LG01', 'PC01', NULL, NULL),
('A07', 'LG01', 'PC02', NULL, NULL),
('A07', 'LG01', 'PC03', NULL, NULL),
('A08', 'LG01', 'PC01', NULL, NULL),
('A08', 'LG01', 'PC02', NULL, NULL),
('A08', 'LG01', 'PC03', NULL, NULL),
('A09', 'LG01', 'PC01', NULL, NULL),
('A09', 'LG01', 'PC02', NULL, NULL),
('A09', 'LG01', 'PC03', NULL, NULL),
('A10', 'LG01', 'PC01', NULL, NULL),
('A10', 'LG01', 'PC02', NULL, NULL),
('A10', 'LG01', 'PC03', NULL, NULL),
('B01', 'LG01', 'PC01', NULL, NULL),
('B01', 'LG01', 'PC02', NULL, NULL),
('B01', 'LG01', 'PC03', NULL, NULL),
('B02', 'LG01', 'PC01', NULL, NULL),
('B02', 'LG01', 'PC02', NULL, NULL),
('B02', 'LG01', 'PC03', NULL, NULL),
('B03', 'LG01', 'PC01', NULL, NULL),
('B03', 'LG01', 'PC02', NULL, NULL),
('B03', 'LG01', 'PC03', NULL, NULL),
('B04', 'LG01', 'PC01', NULL, NULL),
('B04', 'LG01', 'PC02', NULL, NULL),
('B04', 'LG01', 'PC03', NULL, NULL),
('B05', 'LG01', 'PC01', NULL, NULL),
('B05', 'LG01', 'PC02', NULL, NULL),
('B05', 'LG01', 'PC03', NULL, NULL),
('B06', 'LG01', 'PC01', NULL, NULL),
('B06', 'LG01', 'PC02', NULL, NULL),
('B06', 'LG01', 'PC03', NULL, NULL),
('B07', 'LG01', 'PC01', NULL, NULL),
('B07', 'LG01', 'PC02', NULL, NULL),
('B07', 'LG01', 'PC03', NULL, NULL),
('B08', 'LG01', 'PC01', NULL, NULL),
('B08', 'LG01', 'PC02', NULL, NULL),
('B08', 'LG01', 'PC03', NULL, NULL),
('B09', 'LG01', 'PC01', NULL, NULL),
('B09', 'LG01', 'PC02', NULL, NULL),
('B09', 'LG01', 'PC03', NULL, NULL),
('B10', 'LG01', 'PC01', NULL, NULL),
('B10', 'LG01', 'PC02', NULL, NULL),
('B10', 'LG01', 'PC03', NULL, NULL),
('C01', 'LG01', 'PC01', NULL, NULL),
('C01', 'LG02', 'PC02', NULL, NULL),
('C01', 'LG02', 'PC03', NULL, NULL),
('C02', 'LG02', 'PC01', NULL, NULL),
('C02', 'LG02', 'PC02', NULL, NULL),
('C02', 'LG02', 'PC03', NULL, NULL),
('C03', 'LG02', 'PC01', NULL, NULL),
('C03', 'LG02', 'PC02', NULL, NULL),
('C03', 'LG02', 'PC03', NULL, NULL),
('C04', 'LG02', 'PC01', NULL, NULL),
('C04', 'LG02', 'PC02', NULL, NULL),
('C04', 'LG02', 'PC03', NULL, NULL),
('C05', 'LG02', 'PC01', NULL, NULL),
('C05', 'LG02', 'PC02', NULL, NULL),
('C05', 'LG02', 'PC03', NULL, NULL),
('C06', 'LG02', 'PC01', NULL, NULL),
('C06', 'LG02', 'PC02', NULL, NULL),
('C06', 'LG02', 'PC03', NULL, NULL),
('C07', 'LG02', 'PC01', NULL, NULL),
('C07', 'LG02', 'PC02', NULL, NULL),
('C07', 'LG02', 'PC03', NULL, NULL),
('C08', 'LG02', 'PC01', NULL, NULL),
('C08', 'LG02', 'PC02', NULL, NULL),
('C08', 'LG02', 'PC03', NULL, NULL),
('C09', 'LG02', 'PC01', NULL, NULL),
('C09', 'LG02', 'PC02', NULL, NULL),
('C09', 'LG02', 'PC03', NULL, NULL),
('C10', 'LG02', 'PC01', NULL, NULL),
('C10', 'LG02', 'PC02', NULL, NULL),
('C10', 'LG02', 'PC03', NULL, NULL),
('D01', 'LG02', 'PC01', NULL, NULL),
('D01', 'LG02', 'PC02', NULL, NULL),
('D01', 'LG02', 'PC03', NULL, NULL),
('D02', 'LG02', 'PC01', NULL, NULL),
('D02', 'LG02', 'PC02', NULL, NULL),
('D02', 'LG02', 'PC03', NULL, NULL),
('D03', 'LG02', 'PC01', NULL, NULL),
('D03', 'LG02', 'PC02', NULL, NULL),
('D03', 'LG02', 'PC03', NULL, NULL),
('D04', 'LG02', 'PC01', NULL, NULL),
('D04', 'LG02', 'PC02', NULL, NULL),
('D04', 'LG02', 'PC03', NULL, NULL),
('D05', 'LG02', 'PC01', NULL, NULL),
('D05', 'LG02', 'PC02', NULL, NULL),
('D05', 'LG02', 'PC03', NULL, NULL),
('D06', 'LG02', 'PC01', NULL, NULL),
('D06', 'LG02', 'PC02', NULL, NULL),
('D06', 'LG02', 'PC03', NULL, NULL),
('D07', 'LG02', 'PC01', NULL, NULL),
('D07', 'LG02', 'PC02', NULL, NULL),
('D07', 'LG02', 'PC03', NULL, NULL),
('D08', 'LG02', 'PC01', NULL, NULL),
('D08', 'LG02', 'PC02', NULL, NULL),
('D08', 'LG02', 'PC03', NULL, NULL),
('D09', 'LG02', 'PC01', NULL, NULL),
('D09', 'LG02', 'PC02', NULL, NULL),
('D09', 'LG02', 'PC03', NULL, NULL),
('D10', 'LG02', 'PC01', NULL, NULL),
('D10', 'LG02', 'PC02', NULL, NULL),
('D10', 'LG02', 'PC03', NULL, NULL),
('E01', 'LG02', 'PC01', NULL, NULL),
('E01', 'LG02', 'PC02', NULL, NULL),
('E01', 'LG02', 'PC03', NULL, NULL),
('E02', 'LG02', 'PC01', NULL, NULL),
('E02', 'LG02', 'PC02', NULL, NULL),
('E02', 'LG02', 'PC03', NULL, NULL),
('E03', 'LG02', 'PC01', NULL, NULL),
('E03', 'LG02', 'PC02', NULL, NULL),
('E03', 'LG02', 'PC03', NULL, NULL),
('E04', 'LG02', 'PC01', NULL, NULL),
('E04', 'LG02', 'PC02', NULL, NULL),
('E04', 'LG02', 'PC03', NULL, NULL),
('E05', 'LG02', 'PC01', NULL, NULL),
('E05', 'LG02', 'PC02', NULL, NULL),
('E05', 'LG02', 'PC03', NULL, NULL),
('E06', 'LG02', 'PC01', NULL, NULL),
('E06', 'LG02', 'PC02', NULL, NULL),
('E06', 'LG02', 'PC03', NULL, NULL),
('E07', 'LG02', 'PC01', NULL, NULL),
('E07', 'LG02', 'PC02', NULL, NULL),
('E07', 'LG02', 'PC03', NULL, NULL),
('E08', 'LG02', 'PC01', NULL, NULL),
('E08', 'LG02', 'PC02', NULL, NULL),
('E08', 'LG02', 'PC03', NULL, NULL),
('E09', 'LG02', 'PC01', NULL, NULL),
('E09', 'LG02', 'PC02', NULL, NULL),
('E09', 'LG02', 'PC03', NULL, NULL),
('E10', 'LG02', 'PC01', NULL, NULL),
('E10', 'LG02', 'PC02', NULL, NULL),
('E10', 'LG02', 'PC03', NULL, NULL);

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
(1, '2024_10_20_230641_create_ve_table', 1),
(2, '2024_10_20_230802_create_bill_douong_table', 1),
(3, '2024_10_20_230829_create_bill_douong_detail_table', 1),
(4, '2024_10_20_230848_create_bill_ve_table', 1),
(5, '2024_10_20_230903_create_douong_table', 1),
(6, '2024_10_20_230930_create_lichchieu_table', 1),
(7, '2024_10_20_230937_create_loaighe_table', 1),
(8, '2024_10_20_230948_create_masoghe_table', 1),
(9, '2024_10_20_234235_create_phim_table', 1),
(10, '2024_10_20_234253_create_phongchieu_table', 1),
(11, '2024_10_20_234304_create_theloai_table', 1),
(12, '2024_10_20_234317_create_trangthaighe_table', 1),
(13, '2024_10_25_232225_create_sessions_table', 1),
(14, '2024_10_26_185139_create_users_table', 1),
(15, '2024_11_28_204431_create_payment_table', 2),
(16, '2024_12_14_163548_add_status_to_phim', 3),
(17, '2024_12_14_163800_add_status_to_lichchieu', 3),
(18, '2024_12_14_163836_add_status_to_douong', 3),
(19, '2024_12_15_204134_add_status_to_users_table', 4),
(20, '2024_12_15_155951_update_bill_douong_tables', 5),
(21, '2024_12_16_221359_add_idbill_ve_to_bill_douong_detail', 6),
(22, '2024_12_17_011704_add_soluong_to_douong_table', 7),
(23, '2024_12_17_091254_add__so_luong_to_douong', 8),
(24, '2024_12_17_092124_add_status_to_phongchieu', 9),
(25, '2024_12_17_214958_add_dongia_to_ve_table', 10),
(26, '2024_12_17_221130_add_id_user_to_bill_douong_detail_table', 11),
(27, '2024_12_17_221332_add_id_user_to_bill_ve_table', 12),
(28, '2024_12_18_131630_update_namph_column_in_phim_table', 13),
(29, '2024_12_18_190654_add_role_to_users_table', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PAYMENTMETHOD` varchar(50) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `PAYMENTMETHOD`, `STATUS`, `created_at`, `updated_at`) VALUES
(1, 'Thẻ nội địa', 0, NULL, NULL),
(2, 'VNPAY', 0, NULL, NULL),
(3, 'Thẻ VISA', 0, NULL, NULL),
(4, 'MOMO', 0, NULL, NULL),
(5, 'BIDV', 0, '2024-12-16 18:15:48', '2024-12-17 02:23:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `IDPHIM` int(11) NOT NULL,
  `TENPHIM` varchar(50) NOT NULL,
  `IDTHELOAI` char(10) NOT NULL,
  `THOILUONG` int(11) NOT NULL,
  `DAODIEN` varchar(50) DEFAULT NULL,
  `NAMPH` date NOT NULL,
  `POSTER` varchar(100) DEFAULT NULL,
  `DESCRIP` text DEFAULT NULL,
  `DIENVIEN` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`IDPHIM`, `TENPHIM`, `IDTHELOAI`, `THOILUONG`, `DAODIEN`, `NAMPH`, `POSTER`, `DESCRIP`, `DIENVIEN`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Venom', 'TL001', 120, 'Kelly Marcel', '2024-10-25', 'venom.jpg', 'Sau chuyến du lịch ngắn sang quê nhà của Spider-Man: No Way Home (2021), Eddie Brock (Tom Hardy) giờ đây cùng Venom “hành hiệp trượng nghĩa” và “nhai đầu” hết đám tội phạm trong thành phố. Tuy nhiên, đi đêm lắm cũng có ngày gặp ma, chính phủ Mỹ đã phát hiện ra sự tồn tại của con quái vật ngoài hành tinh này. Anh chàng buộc phải trở thành kẻ đào tẩu, liên tục trốn chạy khỏi những cuộc truy quét liên tục. Thế nhưng, đây chưa phải là rắc rối lớn nhất… Những con quái vật gớm ghiếc bất ngờ xuất hiện tại nhiều nơi. Hành tinh của chủng tộc Symbiote đã phát hiện ra Trái Đất và chuẩn bị cho cuộc xâm lăng tổng lực. ', 'Tom Hardy, Juno Temple, Chiwetel Ejiofor', NULL, NULL, 0),
(2, 'Ngày Xưa Có Một Chuyện Tình', 'TL002', 90, 'Trịnh Đình Lê Min', '2024-10-26', 'ngayxuacomotcuoctinh.jpg', 'Ngày Xưa Có Một Chuyện Tình xoay quanh câu chuyện tình bạn, tình yêu giữa hai chàng trai và một cô gái từ thuở ấu thơ cho đến khi trưởng thành, phải đối mặt với những thử thách của số phận. Trải dài trong 4 giai đoạn từ năm 1987 - 2000, ba người bạn cùng tuổi - Vinh, Miền, Phúc đã cùng yêu, cùng bỡ ngỡ bước vào đời, va vấp và vượt qua.', 'Avin Lu, Ngọc Xuân, Đỗ Nhật Hoàng, Thanh Tú, Bảo Tiên, Hạo Khang', NULL, NULL, 0),
(3, 'Joker: Folie À Deux Điên Có Đôi', 'TL001', 138, 'Todd Phillips', '2024-10-03', 'joker.jpg', 'Joker xoay quanh Arthur Fleck (Joaquin Phoenix đóng) - một người sống dưới đáy xã hội tại thành phố giả tưởng Gotham. Arthur kiếm sống bằng cách hóa trang thành một gã hề, làm hoạt náo viên cho những sự kiện cộng đồng. Anh mắc chứng cười không kiểm soát và bất ổn trong tâm lý. Sau khi bị đuổi việc và đánh đập, Arthur đối mặt bước ngoặt cuộc đời. Từ một kẻ bị ức hiếp, anh trở thành \"ngòi nổ\" cho phong trào phản kháng của tầng lớp yếu thế tại Gotham. Sau sự sụp đổ của những chỗ dựa tinh thần cuối cùng, Arthur trở thành Joker - tên tội phạm nguy hiểm và điên dại.', 'Robert De Niro, Joaquin Phoenix, Zazie Beetz', NULL, NULL, 0),
(4, 'Mộ Đom Đóm', 'TL005', 90, 'Isao Takahata', '2024-10-04', 'modomdom.jpg', 'Hai anh em Seita và Setsuko mất mẹ sau cuộc thả bom dữ dội của không quân Mỹ. Cả hai phải vật lộn để tồn tại ở Nhật Bản hậu Thế chiến II.\r\n Nhưng xã hội khắc nghiệt và chúng vật lộn tìm kiếm thức ăn cũng như thoát khỏi những khó khăn giữa chiến tranh.', 'Tatsumi Tsutomu, Shiraishi Ayano, Shinohara Yoshiko', NULL, NULL, 0),
(5, 'Tee Yod: Quỷ Ăn Tạng Phần 2', 'TL003', 111, 'Taweewat Wantha', '2024-10-10', 'quyantang.jpg', 'Ba năm sau cái chết của Yam, Yak vẫn tiếp tục săn lùng linh hồn bí ẩn mặc áo choàng đen. Gặp một người đàn ông có triệu chứng giống Yam, Yak phát hiện ra người bảo vệ linh hồn, pháp sư ẩn dật Puang, sống trong một khu rừng đầy nguy hiểm. Giữa những phép thuật ma quỷ và những sinh vật nguy hiểm. Khi họ đuổi theo con quỷ mặc áo choàng đen, tiếng kêu đầy ám ảnh của Tee Yod sẽ quay trở lại một lần nữa...', 'Nadech Kugimiya, Denise Jelilcha Kapaun, Mim Rattawadee Wongthong, Junior Kajbhunditt Jaidee, Friend', NULL, NULL, 0),
(7, 'Ác quỷ truy hồn', 'TL003', 107, 'Sidharta Tata', '2024-10-04', 'acquytruyhon.jpg', 'Vào thời điểm Pak Wiryo khó có thể chết vì ông có \"quyền nắm giữ\", các con của người vợ đầu và người vợ thứ hai của ông lại đang tranh giành quyền thừa kế.', 'Indah Permatasari, Claresta Taufan Kusumarina, José Rizal Manua', NULL, '2024-12-18 15:18:45', 0),
(9, 'Cười Xuyên Biên Giới', 'TL004', 113, 'KIM Chang-ju', '2024-12-05', 'cuoixuyenbiengioi.jpg', 'Cười Xuyên Biên Giới kể về hành trình của Jin-bong (Ryu Seung-ryong) - cựu vô địch bắn cung quốc gia, sau khi nghỉ hưu, anh đã trở thành một nhân viên văn phòng bình thường. Đứng trước nguy cơ bị sa thải, Jin-bong phải nhận một nhiệm vụ bất khả thi là bay đến nửa kia của trái đất trong nỗ lực tuyệt vọng để sinh tồn. Sống sót sau một sự cố đe doạ tính mạng, Jin-bong đã “hạ cánh” xuống khu rừng Amazon, nơi anh gặp bộ ba thổ dân bản địa có kỹ năng bắn cung thượng thừa: Sika, Eeba và Walbu. Tin rằng đã tìm ra cách để tự cứu mình, Jin-bong hợp tác với phiên dịch ngáo ngơ Bbang-sik (Jin Sun-kyu) và đưa ba chiến thần cung thủ đến Hàn Quốc cho một nhiệm vụ táo bạo.', 'Ryu Seung-ryong , Jin Sun-kyu, Igor Rafael P EDROSO, Luan B RUM DE ABREU E LIMA, JB João Batista GOM', NULL, '2024-12-18 15:16:01', 0),
(12, 'Nhím Sonic 3', 'TL005', 100, 'Jeff Fowler', '2024-12-27', 'sonic3.jpg', 'Sonic, Knuckles và Tails phải đối mặt với một kẻ thù mới cực kỳ mạnh mẽ là Shadow - một nhân vật phản diện bí ẩn với sức mạnh không giống bất kỳ đối thủ nào họ từng đối mặt trước đây. Bị áp đảo về năng lực, Sonic phải lên đường thành lập một liên minh to lớn hơn.', 'Ben Schwartz, Colleen O\'Shaughnessey, Idris Elba', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongchieu`
--

CREATE TABLE `phongchieu` (
  `IDPHONGCHIEU` char(10) NOT NULL,
  `TENPHONGCHIEU` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongchieu`
--

INSERT INTO `phongchieu` (`IDPHONGCHIEU`, `TENPHONGCHIEU`, `created_at`, `updated_at`, `status`) VALUES
('PC004', 'Phòng chiếu Mars', '2024-12-17 02:22:46', '2024-12-17 02:22:46', 0),
('PC01', 'Phòng 1', NULL, NULL, 0),
('PC02', 'Phòng 2', NULL, NULL, 0),
('PC03', 'Phòng 3', NULL, NULL, 0);

--
-- Bẫy `phongchieu`
--
DELIMITER $$
CREATE TRIGGER `trg_AfterInsert_PhongChieu` AFTER INSERT ON `phongchieu` FOR EACH ROW BEGIN
    -- Insert predefined seat codes for the new room
    INSERT INTO `masoghe` (`IDGHE`, `IDLOAIGHE`, `IDPHONGCHIEU`, `created_at`, `updated_at`)
    VALUES
        ('A01', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('A02', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('A03', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('A04', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('A05', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('A06', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('A07', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('A08', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('A09', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('A10', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B01', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B02', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B03', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B04', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B05', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B06', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B07', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B08', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B09', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('B10', 'LG01', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C01', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C02', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C03', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C04', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C05', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C06', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C07', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C08', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C09', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('C10', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D01', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D02', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D03', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D04', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D05', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D06', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D07', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D08', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D09', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('D10', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E01', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E02', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E03', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E04', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E05', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E06', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E07', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E08', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E09', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL),
        ('E10', 'LG02', NEW.IDPHONGCHIEU, NOW(), NULL);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
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
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0K5FE2qX6vhEj7N0BWASbc84DF4P6BmtyAXVcc0r', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToxMzp7czo2OiJfdG9rZW4iO3M6NDA6ImpxMHdVcW9uZ2JQUE83VUc0RldtMWloQXlabGU1ZG1maUFHNlJUUEkiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbW92aWUvMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6ODoibW92aWVfSUQiO2k6MjtzOjc6InJvb21fSUQiO3M6NDoiUEMwMyI7czoxMToic2NoZWR1bGVfSUQiO3M6NToiTEMwMDYiO3M6MTQ6InNlbGVjdGVkX3NlYXRzIjthOjE6e2k6MDtzOjM6IkQwNyI7fXM6MTE6InNlYXRfcHJpY2VzIjthOjE6e2k6MDtpOjc1MDAwO31zOjExOiJ0b3RhbF9zZWF0cyI7aToxO3M6MTI6InRvdGFsX2Ftb3VudCI7aTo3NTAwMDtzOjE1OiJzZWxlY3RlZF9jb21ib3MiO2E6Mjp7aToxO2E6Mjp7czo4OiJxdWFudGl0eSI7aToxO3M6NToicHJpY2UiO2k6MjEzMDAwO31pOjI7YToyOntzOjg6InF1YW50aXR5IjtpOjI7czo1OiJwcmljZSI7aTo2ODAwMDt9fXM6MTA6InRvdGFsUHJpY2UiO2k6Mjg4MDAwO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1734583577);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `IDTHELOAI` char(10) NOT NULL,
  `TENTHELOAI` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`IDTHELOAI`, `TENTHELOAI`, `created_at`, `updated_at`) VALUES
('TL001', 'Hành động', NULL, NULL),
('TL002', 'Lãng Mạn', NULL, NULL),
('TL003', 'Kinh dị', NULL, NULL),
('TL004', 'Hài hước', NULL, NULL),
('TL005', 'Hoạt hình', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaighe`
--

CREATE TABLE `trangthaighe` (
  `IDLICHCHIEU` char(10) NOT NULL,
  `IDGHE` char(10) NOT NULL,
  `IDPHONGCHIEU` char(10) NOT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaighe`
--

INSERT INTO `trangthaighe` (`IDLICHCHIEU`, `IDGHE`, `IDPHONGCHIEU`, `STATUS`) VALUES
('LC001', 'A01', 'PC01', 0),
('LC001', 'A02', 'PC01', 0),
('LC001', 'A03', 'PC01', 0),
('LC001', 'A04', 'PC01', 0),
('LC001', 'A05', 'PC01', 0),
('LC001', 'A06', 'PC01', 0),
('LC001', 'A07', 'PC01', 0),
('LC001', 'A08', 'PC01', 0),
('LC001', 'A09', 'PC01', 0),
('LC001', 'A10', 'PC01', 0),
('LC001', 'B01', 'PC01', 0),
('LC001', 'B02', 'PC01', 0),
('LC001', 'B03', 'PC01', 0),
('LC001', 'B04', 'PC01', 0),
('LC001', 'B05', 'PC01', 0),
('LC001', 'B06', 'PC01', 0),
('LC001', 'B07', 'PC01', 0),
('LC001', 'B08', 'PC01', 0),
('LC001', 'B09', 'PC01', 0),
('LC001', 'B10', 'PC01', 0),
('LC001', 'C01', 'PC01', 0),
('LC001', 'C02', 'PC01', 0),
('LC001', 'C03', 'PC01', 0),
('LC001', 'C04', 'PC01', 0),
('LC001', 'C05', 'PC01', 0),
('LC001', 'C06', 'PC01', 0),
('LC001', 'C07', 'PC01', 0),
('LC001', 'C08', 'PC01', 0),
('LC001', 'C09', 'PC01', 0),
('LC001', 'C10', 'PC01', 0),
('LC001', 'D01', 'PC01', 0),
('LC001', 'D02', 'PC01', 0),
('LC001', 'D03', 'PC01', 0),
('LC001', 'D04', 'PC01', 0),
('LC001', 'D05', 'PC01', 0),
('LC001', 'D06', 'PC01', 0),
('LC001', 'D07', 'PC01', 0),
('LC001', 'D08', 'PC01', 0),
('LC001', 'D09', 'PC01', 0),
('LC001', 'D10', 'PC01', 0),
('LC001', 'E01', 'PC01', 0),
('LC001', 'E02', 'PC01', 0),
('LC001', 'E03', 'PC01', 0),
('LC001', 'E04', 'PC01', 0),
('LC001', 'E05', 'PC01', 0),
('LC001', 'E06', 'PC01', 0),
('LC001', 'E07', 'PC01', 0),
('LC001', 'E08', 'PC01', 0),
('LC001', 'E09', 'PC01', 0),
('LC001', 'E10', 'PC01', 0),
('LC002', 'A01', 'PC02', 0),
('LC002', 'A02', 'PC02', 0),
('LC002', 'A03', 'PC02', 0),
('LC002', 'A04', 'PC02', 0),
('LC002', 'A05', 'PC02', 0),
('LC002', 'A06', 'PC02', 0),
('LC002', 'A07', 'PC02', 0),
('LC002', 'A08', 'PC02', 0),
('LC002', 'A09', 'PC02', 0),
('LC002', 'A10', 'PC02', 0),
('LC002', 'B01', 'PC02', 0),
('LC002', 'B02', 'PC02', 0),
('LC002', 'B03', 'PC02', 0),
('LC002', 'B04', 'PC02', 0),
('LC002', 'B05', 'PC02', 0),
('LC002', 'B06', 'PC02', 0),
('LC002', 'B07', 'PC02', 0),
('LC002', 'B08', 'PC02', 0),
('LC002', 'B09', 'PC02', 0),
('LC002', 'B10', 'PC02', 0),
('LC002', 'C01', 'PC02', 0),
('LC002', 'C02', 'PC02', 0),
('LC002', 'C03', 'PC02', 0),
('LC002', 'C04', 'PC02', 0),
('LC002', 'C05', 'PC02', 0),
('LC002', 'C06', 'PC02', 0),
('LC002', 'C07', 'PC02', 0),
('LC002', 'C08', 'PC02', 0),
('LC002', 'C09', 'PC02', 0),
('LC002', 'C10', 'PC02', 0),
('LC002', 'D01', 'PC02', 0),
('LC002', 'D02', 'PC02', 0),
('LC002', 'D03', 'PC02', 0),
('LC002', 'D04', 'PC02', 0),
('LC002', 'D05', 'PC02', 0),
('LC002', 'D06', 'PC02', 1),
('LC002', 'D07', 'PC02', 1),
('LC002', 'D08', 'PC02', 0),
('LC002', 'D09', 'PC02', 0),
('LC002', 'D10', 'PC02', 0),
('LC002', 'E01', 'PC02', 0),
('LC002', 'E02', 'PC02', 0),
('LC002', 'E03', 'PC02', 0),
('LC002', 'E04', 'PC02', 0),
('LC002', 'E05', 'PC02', 0),
('LC002', 'E06', 'PC02', 0),
('LC002', 'E07', 'PC02', 0),
('LC002', 'E08', 'PC02', 0),
('LC002', 'E09', 'PC02', 0),
('LC002', 'E10', 'PC02', 0),
('LC003', 'A01', 'PC03', 0),
('LC003', 'A02', 'PC03', 0),
('LC003', 'A03', 'PC03', 0),
('LC003', 'A04', 'PC03', 0),
('LC003', 'A05', 'PC03', 0),
('LC003', 'A06', 'PC03', 0),
('LC003', 'A07', 'PC03', 0),
('LC003', 'A08', 'PC03', 0),
('LC003', 'A09', 'PC03', 0),
('LC003', 'A10', 'PC03', 0),
('LC003', 'B01', 'PC03', 0),
('LC003', 'B02', 'PC03', 0),
('LC003', 'B03', 'PC03', 0),
('LC003', 'B04', 'PC03', 0),
('LC003', 'B05', 'PC03', 0),
('LC003', 'B06', 'PC03', 0),
('LC003', 'B07', 'PC03', 0),
('LC003', 'B08', 'PC03', 0),
('LC003', 'B09', 'PC03', 0),
('LC003', 'B10', 'PC03', 0),
('LC003', 'C01', 'PC03', 0),
('LC003', 'C02', 'PC03', 0),
('LC003', 'C03', 'PC03', 0),
('LC003', 'C04', 'PC03', 0),
('LC003', 'C05', 'PC03', 0),
('LC003', 'C06', 'PC03', 0),
('LC003', 'C07', 'PC03', 0),
('LC003', 'C08', 'PC03', 0),
('LC003', 'C09', 'PC03', 0),
('LC003', 'C10', 'PC03', 0),
('LC003', 'D01', 'PC03', 0),
('LC003', 'D02', 'PC03', 0),
('LC003', 'D03', 'PC03', 0),
('LC003', 'D04', 'PC03', 0),
('LC003', 'D05', 'PC03', 0),
('LC003', 'D06', 'PC03', 0),
('LC003', 'D07', 'PC03', 0),
('LC003', 'D08', 'PC03', 0),
('LC003', 'D09', 'PC03', 0),
('LC003', 'D10', 'PC03', 0),
('LC003', 'E01', 'PC03', 0),
('LC003', 'E02', 'PC03', 0),
('LC003', 'E03', 'PC03', 0),
('LC003', 'E04', 'PC03', 0),
('LC003', 'E05', 'PC03', 0),
('LC003', 'E06', 'PC03', 0),
('LC003', 'E07', 'PC03', 0),
('LC003', 'E08', 'PC03', 0),
('LC003', 'E09', 'PC03', 0),
('LC003', 'E10', 'PC03', 0),
('LC006', 'A01', 'PC03', 0),
('LC006', 'A02', 'PC03', 0),
('LC006', 'A03', 'PC03', 0),
('LC006', 'A04', 'PC03', 0),
('LC006', 'A05', 'PC03', 0),
('LC006', 'A06', 'PC03', 0),
('LC006', 'A07', 'PC03', 0),
('LC006', 'A08', 'PC03', 0),
('LC006', 'A09', 'PC03', 0),
('LC006', 'A10', 'PC03', 0),
('LC006', 'B01', 'PC03', 0),
('LC006', 'B02', 'PC03', 0),
('LC006', 'B03', 'PC03', 0),
('LC006', 'B04', 'PC03', 0),
('LC006', 'B05', 'PC03', 0),
('LC006', 'B06', 'PC03', 0),
('LC006', 'B07', 'PC03', 0),
('LC006', 'B08', 'PC03', 0),
('LC006', 'B09', 'PC03', 0),
('LC006', 'B10', 'PC03', 0),
('LC006', 'C01', 'PC03', 0),
('LC006', 'C02', 'PC03', 0),
('LC006', 'C03', 'PC03', 0),
('LC006', 'C04', 'PC03', 0),
('LC006', 'C05', 'PC03', 0),
('LC006', 'C06', 'PC03', 0),
('LC006', 'C07', 'PC03', 0),
('LC006', 'C08', 'PC03', 0),
('LC006', 'C09', 'PC03', 0),
('LC006', 'C10', 'PC03', 0),
('LC006', 'D01', 'PC03', 0),
('LC006', 'D02', 'PC03', 0),
('LC006', 'D03', 'PC03', 0),
('LC006', 'D04', 'PC03', 0),
('LC006', 'D05', 'PC03', 0),
('LC006', 'D06', 'PC03', 0),
('LC006', 'D07', 'PC03', 1),
('LC006', 'D08', 'PC03', 0),
('LC006', 'D09', 'PC03', 0),
('LC006', 'D10', 'PC03', 0),
('LC006', 'E01', 'PC03', 0),
('LC006', 'E02', 'PC03', 0),
('LC006', 'E03', 'PC03', 0),
('LC006', 'E04', 'PC03', 0),
('LC006', 'E05', 'PC03', 0),
('LC006', 'E06', 'PC03', 0),
('LC006', 'E07', 'PC03', 0),
('LC006', 'E08', 'PC03', 0),
('LC006', 'E09', 'PC03', 0),
('LC006', 'E10', 'PC03', 0),
('LC010', 'A01', 'PC01', 0),
('LC010', 'A02', 'PC01', 0),
('LC010', 'A03', 'PC01', 0),
('LC010', 'A04', 'PC01', 0),
('LC010', 'A05', 'PC01', 0),
('LC010', 'A06', 'PC01', 0),
('LC010', 'A07', 'PC01', 0),
('LC010', 'A08', 'PC01', 0),
('LC010', 'A09', 'PC01', 0),
('LC010', 'A10', 'PC01', 0),
('LC010', 'B01', 'PC01', 0),
('LC010', 'B02', 'PC01', 0),
('LC010', 'B03', 'PC01', 0),
('LC010', 'B04', 'PC01', 0),
('LC010', 'B05', 'PC01', 0),
('LC010', 'B06', 'PC01', 0),
('LC010', 'B07', 'PC01', 0),
('LC010', 'B08', 'PC01', 0),
('LC010', 'B09', 'PC01', 0),
('LC010', 'B10', 'PC01', 0),
('LC010', 'C01', 'PC01', 0),
('LC010', 'C02', 'PC01', 0),
('LC010', 'C03', 'PC01', 0),
('LC010', 'C04', 'PC01', 0),
('LC010', 'C05', 'PC01', 0),
('LC010', 'C06', 'PC01', 0),
('LC010', 'C07', 'PC01', 0),
('LC010', 'C08', 'PC01', 0),
('LC010', 'C09', 'PC01', 0),
('LC010', 'C10', 'PC01', 0),
('LC010', 'D01', 'PC01', 0),
('LC010', 'D02', 'PC01', 0),
('LC010', 'D03', 'PC01', 0),
('LC010', 'D04', 'PC01', 0),
('LC010', 'D05', 'PC01', 0),
('LC010', 'D06', 'PC01', 0),
('LC010', 'D07', 'PC01', 0),
('LC010', 'D08', 'PC01', 0),
('LC010', 'D09', 'PC01', 0),
('LC010', 'D10', 'PC01', 0),
('LC010', 'E01', 'PC01', 0),
('LC010', 'E02', 'PC01', 0),
('LC010', 'E03', 'PC01', 0),
('LC010', 'E04', 'PC01', 0),
('LC010', 'E05', 'PC01', 0),
('LC010', 'E06', 'PC01', 0),
('LC010', 'E07', 'PC01', 0),
('LC010', 'E08', 'PC01', 0),
('LC010', 'E09', 'PC01', 0),
('LC010', 'E10', 'PC01', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Đức Toàn', 'toandeptrai3108@gmail.com', NULL, '$2y$12$UhJ4iwkI/EwCVz9Byjg0ZuJ/n7xSYvn8hOYm.3FFReExR5Ua7w8xO', 0, 0, NULL, '2024-10-28 08:03:01', '2024-10-28 08:03:01'),
(2, 'Nguyễn Văn Trường', 'truong@gmail.com', NULL, '$2y$12$QAVlhzlz1W55RlPy1HQqKuAI/dIhCf8kb5L0YyW45rDf0kDvlIsjG', 0, 0, NULL, '2024-10-28 08:41:58', '2024-10-28 08:41:58'),
(4, 'Hoàng Hữu Thắng', 'thangcho@gmail.com', NULL, '$2y$12$XpkBuhiaHJbA.EOsrbPg.OgoPVtKCq8E0wHi/8Dext0H.ZZXHbkxm', 0, 1, NULL, '2024-10-28 08:45:51', '2024-12-16 18:14:35'),
(12, 'Long', 'll@gmail.com', NULL, '$2y$12$24NqaAwuAPRSILIPGjb2.eqEOoNyfqdlO.TbVb9lOePRQGMMuGKYK', 0, 0, NULL, '2024-12-17 03:11:48', '2024-12-17 03:11:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve`
--

CREATE TABLE `ve` (
  `IDVE` int(11) NOT NULL,
  `IDGHE` char(10) NOT NULL,
  `IDPHONGCHIEU` char(10) NOT NULL,
  `IDLICHCHIEU` char(10) NOT NULL,
  `DONGIA` decimal(10,2) NOT NULL,
  `IDBILL_VE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ve`
--

INSERT INTO `ve` (`IDVE`, `IDGHE`, `IDPHONGCHIEU`, `IDLICHCHIEU`, `DONGIA`, `IDBILL_VE`) VALUES
(69, 'D07', 'PC02', 'LC002', 75000.00, 55),
(70, 'D06', 'PC02', 'LC002', 75000.00, 56),
(86, 'D07', 'PC03', 'LC006', 75000.00, 70);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill_douong_detail`
--
ALTER TABLE `bill_douong_detail`
  ADD PRIMARY KEY (`IDBILL_DOUONG`),
  ADD KEY `bill_douong_detail_iddouong_foreign` (`IDDOUONG`),
  ADD KEY `bill_douong_detail_name_foreign` (`name`),
  ADD KEY `bill_douong_detail_id_user_foreign` (`ID_USER`);

--
-- Chỉ mục cho bảng `bill_ve`
--
ALTER TABLE `bill_ve`
  ADD PRIMARY KEY (`IDBILL_VE`),
  ADD KEY `PAYMENTID` (`PAYMENTID`),
  ADD KEY `bill_ve_id_user_foreign` (`ID_USER`);

--
-- Chỉ mục cho bảng `douong`
--
ALTER TABLE `douong`
  ADD PRIMARY KEY (`IDDOUONG`);

--
-- Chỉ mục cho bảng `lichchieu`
--
ALTER TABLE `lichchieu`
  ADD PRIMARY KEY (`IDLICHCHIEU`),
  ADD UNIQUE KEY `UQ_LICHCHIEU` (`XUATCHIEU`,`IDPHONGCHIEU`),
  ADD KEY `IDPHIM` (`IDPHIM`),
  ADD KEY `IDPHONGCHIEU` (`IDPHONGCHIEU`);

--
-- Chỉ mục cho bảng `loaighe`
--
ALTER TABLE `loaighe`
  ADD PRIMARY KEY (`IDLOAIGHE`);

--
-- Chỉ mục cho bảng `masoghe`
--
ALTER TABLE `masoghe`
  ADD PRIMARY KEY (`IDGHE`,`IDPHONGCHIEU`),
  ADD UNIQUE KEY `UQ_IDGHE_IDPHONGCHIEU` (`IDGHE`,`IDPHONGCHIEU`),
  ADD KEY `IDLOAIGHE` (`IDLOAIGHE`),
  ADD KEY `IDPHONGCHIEU` (`IDPHONGCHIEU`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`IDPHIM`),
  ADD KEY `IDTHELOAI` (`IDTHELOAI`);

--
-- Chỉ mục cho bảng `phongchieu`
--
ALTER TABLE `phongchieu`
  ADD PRIMARY KEY (`IDPHONGCHIEU`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`IDTHELOAI`);

--
-- Chỉ mục cho bảng `trangthaighe`
--
ALTER TABLE `trangthaighe`
  ADD PRIMARY KEY (`IDLICHCHIEU`,`IDGHE`,`IDPHONGCHIEU`),
  ADD UNIQUE KEY `UQ_TRANGTHAIGHE` (`IDLICHCHIEU`,`IDGHE`,`IDPHONGCHIEU`),
  ADD KEY `IDGHE` (`IDGHE`,`IDPHONGCHIEU`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `name` (`name`);

--
-- Chỉ mục cho bảng `ve`
--
ALTER TABLE `ve`
  ADD PRIMARY KEY (`IDVE`),
  ADD UNIQUE KEY `UQ_IDGHE_IDLICHCHIEU` (`IDGHE`,`IDPHONGCHIEU`,`IDLICHCHIEU`),
  ADD KEY `IDLICHCHIEU` (`IDLICHCHIEU`),
  ADD KEY `IDBILL_VE` (`IDBILL_VE`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill_douong_detail`
--
ALTER TABLE `bill_douong_detail`
  MODIFY `IDBILL_DOUONG` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `bill_ve`
--
ALTER TABLE `bill_ve`
  MODIFY `IDBILL_VE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `douong`
--
ALTER TABLE `douong`
  MODIFY `IDDOUONG` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `IDPHIM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `ve`
--
ALTER TABLE `ve`
  MODIFY `IDVE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill_douong_detail`
--
ALTER TABLE `bill_douong_detail`
  ADD CONSTRAINT `bill_douong_detail_id_user_foreign` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bill_douong_detail_iddouong_foreign` FOREIGN KEY (`IDDOUONG`) REFERENCES `douong` (`IDDOUONG`) ON DELETE CASCADE,
  ADD CONSTRAINT `bill_douong_detail_name_foreign` FOREIGN KEY (`name`) REFERENCES `users` (`name`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `bill_ve`
--
ALTER TABLE `bill_ve`
  ADD CONSTRAINT `bill_ve_id_user_foreign` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_payment_id` FOREIGN KEY (`PAYMENTID`) REFERENCES `payment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichchieu`
--
ALTER TABLE `lichchieu`
  ADD CONSTRAINT `lichchieu_ibfk_1` FOREIGN KEY (`IDPHIM`) REFERENCES `phim` (`IDPHIM`),
  ADD CONSTRAINT `lichchieu_ibfk_2` FOREIGN KEY (`IDPHONGCHIEU`) REFERENCES `phongchieu` (`IDPHONGCHIEU`);

--
-- Các ràng buộc cho bảng `masoghe`
--
ALTER TABLE `masoghe`
  ADD CONSTRAINT `masoghe_ibfk_1` FOREIGN KEY (`IDLOAIGHE`) REFERENCES `loaighe` (`IDLOAIGHE`),
  ADD CONSTRAINT `masoghe_ibfk_2` FOREIGN KEY (`IDPHONGCHIEU`) REFERENCES `phongchieu` (`IDPHONGCHIEU`);

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_ibfk_1` FOREIGN KEY (`IDTHELOAI`) REFERENCES `theloai` (`IDTHELOAI`);

--
-- Các ràng buộc cho bảng `trangthaighe`
--
ALTER TABLE `trangthaighe`
  ADD CONSTRAINT `trangthaighe_ibfk_1` FOREIGN KEY (`IDLICHCHIEU`) REFERENCES `lichchieu` (`IDLICHCHIEU`),
  ADD CONSTRAINT `trangthaighe_ibfk_2` FOREIGN KEY (`IDGHE`,`IDPHONGCHIEU`) REFERENCES `masoghe` (`IDGHE`, `IDPHONGCHIEU`);

--
-- Các ràng buộc cho bảng `ve`
--
ALTER TABLE `ve`
  ADD CONSTRAINT `ve_ibfk_1` FOREIGN KEY (`IDGHE`,`IDPHONGCHIEU`) REFERENCES `masoghe` (`IDGHE`, `IDPHONGCHIEU`),
  ADD CONSTRAINT `ve_ibfk_2` FOREIGN KEY (`IDLICHCHIEU`) REFERENCES `lichchieu` (`IDLICHCHIEU`),
  ADD CONSTRAINT `ve_ibfk_3` FOREIGN KEY (`IDBILL_VE`) REFERENCES `bill_ve` (`IDBILL_VE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
