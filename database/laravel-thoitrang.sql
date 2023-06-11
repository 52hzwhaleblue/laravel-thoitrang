-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel-thoitrang
CREATE DATABASE IF NOT EXISTS `laravel-thoitrang` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel-thoitrang`;

-- Dumping structure for table laravel-thoitrang.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_09_04_010015_create_table_photos_table', 1),
	(2, '2014_10_12_000000_create_table_users_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_02_03_135253_create_table_room_chats_table', 1),
	(6, '2023_02_03_135422_create_table_chats_table', 1),
	(7, '2023_02_04_010011_create_table_posts_table', 1),
	(8, '2023_02_04_010012_create_table_orders_table', 1),
	(9, '2023_02_04_010013_create_table_order_details_table', 1),
	(10, '2023_02_04_010016_create_table_products_table', 1),
	(11, '2023_02_04_010017_create_table_notifications_table', 1),
	(12, '2023_02_04_010018_create_table_categories_table', 1),
	(13, '2023_02_04_010019_create_table_settings_table', 1),
	(14, '2023_02_04_010021_create_table_statics_table', 1),
	(15, '2023_02_04_010022_create_table_reviews_table', 1),
	(16, '2023_03_06_082243_create_table_product_detail_table', 1),
	(17, '2023_04_12_135056_create_table_promotions_table', 1),
	(18, '2023_05_01_095640_create_table_order_status_table', 1),
	(19, '2023_05_15_221517_create_table_statistics_table', 1),
	(20, '2023_05_24_215212_createt_table_admins_table', 1);

-- Dumping structure for table laravel-thoitrang.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.password_resets: ~0 rows (approximately)

-- Dumping structure for table laravel-thoitrang.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel-thoitrang.table_admins
CREATE TABLE IF NOT EXISTS `table_admins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '1',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_admins_phone_unique` (`phone`),
  UNIQUE KEY `table_admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_admins: ~0 rows (approximately)
INSERT INTO `table_admins` (`id`, `username`, `fullName`, `phone`, `email`, `email_verified_at`, `password`, `role`, `photo`, `login_provider`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin', '0879999999', 'admin@gmail.com', NULL, '$2y$10$xufTySBsZvjih.vnPoyB.eky.KgWvZwTWv1JTkD6QkNWTNrUMTSRK', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52');

-- Dumping structure for table laravel-thoitrang.table_categories
CREATE TABLE IF NOT EXISTS `table_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `numb` int DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_categories: ~7 rows (approximately)
INSERT INTO `table_categories` (`id`, `name`, `name_vi`, `slug`, `content`, `desc`, `photo`, `background_color`, `options`, `numb`, `type`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Clothing', 'Quần-Áo', 'ao_cotton_kid.jpg', NULL, NULL, 'thumbnails/categories/t-shirt.png', 'CDA263', NULL, NULL, NULL, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(2, 'Handbag', 'Túi xách', 'ao_phong_unisex_black_white_2.jpg', NULL, NULL, 'thumbnails/categories/handbag.png', '8282D3', NULL, NULL, NULL, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(3, 'Shoes', 'Giày-dép', 'ao-polo-nam-Aristino-xanh.jpg', NULL, NULL, 'thumbnails/categories/shoes.png', 'F78FB3', NULL, NULL, NULL, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(4, 'Watch', 'Đồng hồ', 'dam_han_quoc_den_nau-nhat.jpg', NULL, NULL, 'thumbnails/categories/watch.png', 'D96161', NULL, NULL, NULL, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(5, 'Sunglasses', 'Mắt kính', 'guoc_cao_no_white.jpg', NULL, NULL, 'thumbnails/categories/sunglasses.png', 'F3AE4E', NULL, NULL, NULL, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(6, 'Hat', 'Nón', 'guoc_cao_no_white.jpg', NULL, NULL, 'thumbnails/categories/hat.png', '27839B', NULL, NULL, NULL, 1, '2023-04-30 17:00:00', '2023-04-30 17:00:00'),
	(7, 'Jewelry', 'Trang sức', 'guoc_cao_no_white.jpg', NULL, NULL, 'thumbnails/categories/Jewelry.png', 'C1A6C5', NULL, NULL, NULL, 1, '2023-04-30 17:00:00', '2023-04-30 17:00:00');

-- Dumping structure for table laravel-thoitrang.table_chats
CREATE TABLE IF NOT EXISTS `table_chats` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `room_chat_id` int unsigned NOT NULL,
  `sender_id` int unsigned NOT NULL,
  `receiver_id` int unsigned NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_chats_room_chat_id_foreign` (`room_chat_id`),
  CONSTRAINT `table_chats_room_chat_id_foreign` FOREIGN KEY (`room_chat_id`) REFERENCES `table_room_chats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_chats: ~0 rows (approximately)

-- Dumping structure for table laravel-thoitrang.table_notifications
CREATE TABLE IF NOT EXISTS `table_notifications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `order_id` int unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` int DEFAULT '1',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_notifications_user_id_foreign` (`user_id`),
  KEY `table_notifications_order_id_foreign` (`order_id`),
  CONSTRAINT `table_notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `table_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `table_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `table_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_notifications: ~6 rows (approximately)
INSERT INTO `table_notifications` (`id`, `user_id`, `order_id`, `title`, `subtitle`, `is_read`, `type`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, 'title test1', 'subtitle test1', 1, 'user', '2022-01-01 03:50:00', '2022-01-01 03:50:00'),
	(2, 1, NULL, 'title test2', 'subtitle test2', 1, 'user', '2022-01-01 03:50:00', '2022-01-01 03:50:00'),
	(3, 2, NULL, 'title test1', 'subtitle test1', 1, 'user', '2022-01-01 03:50:00', '2022-01-01 03:50:00'),
	(4, 2, NULL, 'title test2', 'subtitle test2', 1, 'user', '2022-01-01 03:50:00', '2022-01-01 03:50:00'),
	(5, 1, NULL, 'title test5', 'subtitle test5', 1, 'user', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(6, 1, NULL, 'title test6', 'subtitle test6', 1, 'user', '2023-05-30 13:08:54', '2023-05-30 13:08:54');

-- Dumping structure for table laravel-thoitrang.table_orders
CREATE TABLE IF NOT EXISTS `table_orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `shipping_fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_price` double DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `ship_price` double DEFAULT '0',
  `requirements` mediumtext COLLATE utf8mb4_unicode_ci,
  `notes` mediumtext COLLATE utf8mb4_unicode_ci,
  `status_id` int unsigned DEFAULT NULL,
  `promotion_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_orders_user_id_foreign` (`user_id`),
  KEY `table_orders_status_id_foreign` (`status_id`),
  KEY `table_orders_promotion_id_foreign` (`promotion_id`),
  CONSTRAINT `table_orders_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `table_promotions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `table_orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `table_order_status` (`id`) ON DELETE CASCADE,
  CONSTRAINT `table_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `table_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_orders: ~30 rows (approximately)
INSERT INTO `table_orders` (`id`, `code`, `user_id`, `shipping_fullname`, `shipping_phone`, `shipping_address`, `payment_method`, `temp_price`, `total_price`, `ship_price`, `requirements`, `notes`, `status_id`, `promotion_id`, `created_at`, `updated_at`) VALUES
	(1, 'HDFiJ0c1FUWJn', 1, 'Em. Trác Chấn', '+84-66-961-6483', '5, Ấp 57, Phường Lam Nhữ, Huyện Hậu\nĐắk Nông', 'COD', 500000, 1348565, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(2, 'HDFiJ0c1FUWJn', 2, 'Bác. Dương Khánh Độ', '84-37-721-3095', '104 Phố Chử Phượng Cúc, Xã 7, Huyện Vy Di\nHà Nội', 'COD', 500000, 1507206, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(3, 'HDFiJ0c1FUWJn', 3, 'Bác. Bình Hiếu Mẫn', '84-57-901-4873', '9987, Ấp Triệu, Phường Đan Mã, Quận 00\nKon Tum', 'COD', 500000, 444723, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(4, 'HDFiJ0c1FUWJn', 4, 'Cụ. Sơn Thanh', '(0510) 329 4740', '54 Phố Dã Tuyền Quảng, Xã Trúc Bùi, Quận Hảo Đoàn\nĐà Nẵng', 'COD', 500000, 1304484, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(5, 'HDFiJ0c1FUWJn', 5, 'Lỳ Chiêu Huỳnh', '(027)948-5855', '56 Phố Nghiêm Chung Sang, Phường Bình, Quận Nguyên Diễm\nHồ Chí Minh', 'COD', 500000, 1241408, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(6, 'HDFiJ0c1FUWJn', 6, 'Em. Phạm Đoan Thy', '031 617 9712', '9, Ấp 7, Thôn Tân Vỹ, Huyện Việt Viên\nVĩnh Phúc', 'COD', 500000, 1440569, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(7, 'HDFiJ0c1FUWJn', 7, 'Em. Lưu Chung Siêu', '+84-70-817-5645', '1667 Phố Tòng, Xã Phước Thục, Quận Trưởng Đoàn\nBình Dương', 'COD', 500000, 251305, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(8, 'HDFiJ0c1FUWJn', 8, 'Phan Hà Dụng', '(84)(127)926-2327', '1104, Ấp Dư Hương Phong, Phường 59, Quận Vương Băng Hợp\nBắc Kạn', 'COD', 500000, 799769, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(9, 'HDFiJ0c1FUWJn', 9, 'Em. Khương Công', '(064)937-3308', '1 Phố Mâu, Phường Hoa, Huyện Tòng\nAn Giang', 'COD', 500000, 1555287, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(10, 'HDFiJ0c1FUWJn', 10, 'Cô. Đào Hoa Cát', '+84-26-493-9478', '5723, Thôn 79, Phường Vi Phương, Quận 85\nĐiện Biên', 'COD', 500000, 1810977, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(11, 'HDFiJ0c1FUWJn', 11, 'Cô. Cự Đan Yến', '(84)(27)418-4174', '94 Phố Lư, Xã Mẫn Ngân Ngôn, Huyện Thịnh\nHậu Giang', 'COD', 500000, 1389766, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(12, 'HDFiJ0c1FUWJn', 12, 'Cụ. Bạch Việt Thoại', '(84)(37)872-4133', '1277 Phố Triệu Sương Hoan, Xã Hiếu, Quận Cự\nThái Nguyên', 'COD', 500000, 377941, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(13, 'HDFiJ0c1FUWJn', 13, 'Chế Long Điệp', '(0211) 680 8620', '6872, Thôn Nhiệm, Phường Hưng Cam, Quận Liên\nNam Định', 'COD', 500000, 178779, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(14, 'HDFiJ0c1FUWJn', 14, 'Cô. Văn Diễm', '053 547 8279', '47 Phố Đạo, Phường 6, Huyện Hùng\nHà Nội', 'COD', 500000, 660780, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(15, 'HDFiJ0c1FUWJn', 15, 'Danh Diễm Phúc', '061 719 4707', '15, Ấp Vượng Thảo, Phường Thái Sinh, Quận Thoa Thi\nQuảng Nam', 'COD', 500000, 1865503, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(16, 'HDFiJ0c1FUWJn', 16, 'Cô. An Hồng Châu', '0218 529 5494', '88 Phố Đậu, Ấp Bành Cương, Quận Hán Phong\nHồ Chí Minh', 'COD', 500000, 329951, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(17, 'HDFiJ0c1FUWJn', 17, 'La Mậu Nhã', '+84-186-787-7381', '1897 Phố Huy, Phường Nhâm, Quận 5\nĐà Nẵng', 'COD', 500000, 308784, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(18, 'HDFiJ0c1FUWJn', 18, 'Bác. Lý Mậu Tú', '84-710-212-7965', '3599 Phố Phan Giao Du, Thôn Đào Tráng, Huyện Phí Đan Chi\nBình Dương', 'COD', 500000, 1384830, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(19, 'HDFiJ0c1FUWJn', 19, 'Em. Điền Bảo', '0320 782 6830', '341 Phố Ngô Khanh Vỹ, Thôn Mạc Thêu, Huyện Đôn Khanh\nBình Định', 'COD', 500000, 1029977, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(20, 'HDFiJ0c1FUWJn', 20, 'Ngụy Đại Giáp', '84-127-217-4782', '98 Phố Dương Mai Lương, Ấp Chu Vy, Quận Từ Cảnh\nHồ Chí Minh', 'COD', 500000, 438901, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(21, 'HDFiJ0c1FUWJn', 21, 'Em. Giáp Cảnh Thái', '(026) 110 8880', '560, Thôn Tú Tiêu, Phường Từ Vân Huỳnh, Huyện Huệ Tuyền\nQuảng Bình', 'COD', 500000, 1320587, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(22, 'HDFiJ0c1FUWJn', 22, 'Thân Du', '(0510)608-4017', '6025 Phố Hàng Canh Lam, Ấp Thi Hạnh, Huyện Hiển Liễu\nQuảng Nam', 'COD', 500000, 1837157, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(23, 'HDFiJ0c1FUWJn', 23, 'Ty Chuẩn Đồng', '099-844-6041', '395 Phố Ong Toản Chi, Xã 33, Quận 29\nĐà Nẵng', 'COD', 500000, 1594685, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(24, 'HDFiJ0c1FUWJn', 24, 'Cụ. Tiêu Mậu Tuệ', '(020)047-5692', '5, Ấp Tông Quảng Viên, Phường Lễ Trâm, Huyện Lã Ân Hương\nLạng Sơn', 'COD', 500000, 824079, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(25, 'HDFiJ0c1FUWJn', 25, 'Chú. Hán Chưởng', '0511-226-6878', '8848 Phố Vỹ, Ấp Mộc Quyết, Huyện Linh\nVĩnh Phúc', 'COD', 500000, 1621160, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(26, 'HDFiJ0c1FUWJn', 26, 'Viên Trang', '053-521-1822', '4260, Thôn Hoa Cúc, Phường 68, Huyện Tống\nĐồng Tháp', 'COD', 500000, 1662616, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(27, 'HDFiJ0c1FUWJn', 27, 'Cấn Ngà', '(097) 673 0867', '11 Phố Uông Lý Đan, Phường Đồng, Huyện Thiện Ánh\nHồ Chí Minh', 'COD', 500000, 1920500, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(28, 'HDFiJ0c1FUWJn', 28, 'Bà. Âu Triều Ân', '(029) 305 4701', '5, Ấp Nhân, Ấp Bình Phú, Huyện Trang Thạch\nNinh Thuận', 'COD', 500000, 474875, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(29, 'HDFiJ0c1FUWJn', 29, 'Đinh Hà Tuệ', '+84-62-876-4077', '9973 Phố Mã Hải Kỷ, Xã Trang Tuyền, Quận 1\nThái Nguyên', 'COD', 500000, 896668, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(30, 'HDFiJ0c1FUWJn', 30, 'Ong Lĩnh', '(84)(169)156-3335', '607, Ấp 23, Phường Ngọc, Huyện 9\nNinh Bình', 'COD', 500000, 181330, 0, NULL, '.....Note', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54');

-- Dumping structure for table laravel-thoitrang.table_order_details
CREATE TABLE IF NOT EXISTS `table_order_details` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_order_details_order_id_foreign` (`order_id`),
  KEY `table_order_details_product_id_foreign` (`product_id`),
  CONSTRAINT `table_order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `table_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `table_order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `table_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_order_details: ~20 rows (approximately)
INSERT INTO `table_order_details` (`id`, `order_id`, `product_id`, `color`, `size`, `quantity`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '00a8ff', 'M', 7, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(2, 1, 2, 'f7f1e3', '35', 6, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(3, 2, 3, '00a8ff', 'M', 10, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(4, 2, 4, 'f7f1e3', '35', 7, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(5, 3, 5, '00a8ff', 'M', 10, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(6, 3, 6, 'f7f1e3', '35', 3, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(7, 4, 7, '00a8ff', 'M', 4, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(8, 4, 8, 'f7f1e3', '35', 9, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(9, 5, 9, '00a8ff', 'M', 7, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(10, 5, 10, 'f7f1e3', '35', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(11, 6, 11, '00a8ff', 'M', 1, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(12, 6, 12, 'f7f1e3', '35', 4, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(13, 7, 13, '00a8ff', 'M', 10, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(14, 7, 14, 'f7f1e3', '35', 4, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(15, 8, 15, '00a8ff', 'M', 9, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(16, 8, 16, 'f7f1e3', '35', 9, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(17, 9, 17, '00a8ff', 'M', 2, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(18, 9, 18, 'f7f1e3', '35', 7, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(19, 10, 19, '00a8ff', 'M', 8, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54'),
	(20, 10, 20, 'f7f1e3', '35', 4, NULL, '2023-05-30 01:08:54', '2023-05-30 13:08:54');

-- Dumping structure for table laravel-thoitrang.table_order_status
CREATE TABLE IF NOT EXISTS `table_order_status` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_order_status: ~5 rows (approximately)
INSERT INTO `table_order_status` (`id`, `name`, `class_order`, `created_at`, `updated_at`) VALUES
	(1, 'Đơn mới', 'text-primary', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(2, 'Đã xác nhận', 'text-info', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(3, 'Đang giao hàng', 'text-warning', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(4, 'Đã giao', 'text-success', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(5, 'Đã hủy', 'text-danger', '2023-05-30 13:08:54', '2023-05-30 13:08:54');

-- Dumping structure for table laravel-thoitrang.table_photos
CREATE TABLE IF NOT EXISTS `table_photos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` mediumtext COLLATE utf8mb4_unicode_ci,
  `link_video` mediumtext COLLATE utf8mb4_unicode_ci,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `act` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_photos: ~4 rows (approximately)
INSERT INTO `table_photos` (`id`, `photo`, `content`, `desc`, `name`, `link`, `link_video`, `options`, `type`, `act`, `numb`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'thumbnails/slider/slider_3_63fd7e70ae1d6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(2, 'thumbnails/slider/slider_63fd7d37aa353.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(3, 'thumbnails/slider/slider_63fd805a35abc.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(4, 'thumbnails/photo/logo-8163_6455057ae4506.png', NULL, NULL, 'logo', NULL, NULL, NULL, 'logo', NULL, NULL, 1, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(5, 'thumbnails/photo/slide-9533_6475f709cad12.png', NULL, NULL, 'slideshow', NULL, NULL, NULL, 'slideshow', NULL, NULL, 1, '2023-05-30 13:15:54', '2023-05-30 13:15:54'),
	(6, 'thumbnails/photo/gioithieu1_6475f83e868e6.png', NULL, NULL, 'gioithieu-slide 1', NULL, NULL, NULL, 'gioithieu-slide', NULL, NULL, 1, '2023-05-30 13:21:02', '2023-05-30 13:21:02'),
	(7, 'thumbnails/photo/gioithieu2_6475f84767115.png', NULL, NULL, 'gioithieu-slide 2', NULL, NULL, NULL, 'gioithieu-slide', NULL, NULL, 1, '2023-05-30 13:21:11', '2023-05-30 13:21:11'),
	(8, 'thumbnails/photo/album0_647606b32a813.jpg', NULL, NULL, 'album 1', NULL, NULL, NULL, 'thu-vien-anh', NULL, NULL, 1, '2023-05-30 14:22:43', '2023-05-30 14:22:43'),
	(9, 'thumbnails/photo/album0_647606bf5392e.jpg', NULL, NULL, 'album 2', NULL, NULL, NULL, 'thu-vien-anh', NULL, NULL, 1, '2023-05-30 14:22:55', '2023-05-30 14:22:55'),
	(10, 'thumbnails/photo/album_647606cc362dd.png', NULL, NULL, 'album 3', NULL, NULL, NULL, 'thu-vien-anh', NULL, NULL, 1, '2023-05-30 14:23:08', '2023-05-30 14:23:08'),
	(11, 'thumbnails/photo/album0_647606d8144cb.jpg', NULL, NULL, 'album 4', NULL, NULL, NULL, 'thu-vien-anh', NULL, NULL, 1, '2023-05-30 14:23:20', '2023-05-30 14:23:20'),
	(12, 'thumbnails/photo/album0_647606e02bf29.jpg', NULL, NULL, 'album 5', NULL, NULL, NULL, 'thu-vien-anh', NULL, NULL, 1, '2023-05-30 14:23:28', '2023-05-30 14:23:28'),
	(13, 'thumbnails/photo/bannerQC3_647608decfe17.jpg', NULL, NULL, 'banner QC', NULL, NULL, NULL, 'banner-quangcao', NULL, NULL, 0, '2023-05-30 14:31:59', '2023-05-30 14:31:59');

-- Dumping structure for table laravel-thoitrang.table_posts
CREATE TABLE IF NOT EXISTS `table_posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `numb` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_posts: ~9 rows (approximately)
INSERT INTO `table_posts` (`id`, `photo`, `slug`, `name`, `desc`, `content`, `options`, `numb`, `status`, `type`, `view`, `created_at`, `updated_at`) VALUES
	(1, 'thumbnails/post/tintuc1_6475fa078e570.webp', 'top-18-nuoc-hoa-thom-lau-cho-nam-cao-cap-luu-huong-suot-ca-ngay-dai', 'Top 18+ nước hoa thơm lâu cho nam cao cấp lưu hương suốt cả ngày dài', 'Nước hoa - “vũ khí tối thượng” để chàng trở nên hấp dẫn hơn trong mắt phái đẹp. Tuy nhiên, phần lớn các dòng nước hoa đều chỉ lưu hương trong một khoảng thời gian ngắn. Vậy thì hãy tham khảo ngay top 15 chai nước hoa thơm lâu cho nam và Coolmate bật mí dưới đây nhé.', NULL, NULL, NULL, 1, 'tin-tuc', NULL, '2023-05-30 13:28:39', '2023-05-30 13:28:39'),
	(2, 'thumbnails/post/tao-dang-chup-anh-nam-4_11_6475fa20115a7.webp', 'bi-kip-tao-dang-chup-anh-nam-dep-ngau-nhu-mau-nam-han-quoc', 'Bí kíp tạo dáng chụp ảnh nam đẹp ngầu như mẫu nam Hàn Quốc', 'Chắc rằng không ít chàng trai cảm thấy việc chụp hình là vô cùng khó khăn. Đừng lo, Coolmate sẽ hướng dẫn một số cách tạo dáng chụp ảnh nam đẹp và cool ngầu.', NULL, NULL, NULL, 1, 'tin-tuc', NULL, '2023-05-30 13:29:04', '2023-05-30 13:29:04'),
	(3, 'thumbnails/post/tintuc2_6475fa5213418.webp', 'dat-biet-danh-cho-nguoi-yeu-cuc-de-thuong-tinh-cam-va-doc-dao-nhat-2023', 'Đặt biệt danh cho người yêu cực dễ thương, tình cảm và độc đáo nhất 2023', 'Biệt danh là gì? Biệt danh được hiểu đơn giản là một hoặc một vài tên gọi khác với tên gọi thật, có thể mang ý nghĩa đáng yêu, giúp mối quan hệ trở nên thân thiết hơn. Hầu như từ nhỏ ai cũng có những biệt danh riêng mình, thường tới từ ngoại hình hay tính cách. Ví dụ đơn cử, bạn tóc xoăn tí, người ta hay gọi bạn là Xoăn, bé Xoăn….', NULL, NULL, NULL, 1, 'tin-tuc', NULL, '2023-05-30 13:29:54', '2023-05-30 13:29:54'),
	(4, 'thumbnails/post/dichvu_6475fab1816a3.webp', 'dich-vu-hai-long-100', 'Dịch vụ hài lòng 100%', NULL, NULL, NULL, NULL, 1, 'dich-vu', NULL, '2023-05-30 13:31:29', '2023-05-30 13:31:29'),
	(5, 'thumbnails/post/dichvu1_6475fae25c534.webp', 'dich-vu-mua-hang-si', 'Dịch vụ mua hàng sỉ', NULL, NULL, NULL, NULL, 1, 'dich-vu', NULL, '2023-05-30 13:32:18', '2023-05-30 13:32:33'),
	(6, 'thumbnails/post/tc1_6475fe66bc82d.png', 'mien-phi-van-chuyen-cho-don-hang-tren-200k', 'MIỄN PHÍ VẬN CHUYỂN CHO ĐƠN HÀNG TRÊN 200K', NULL, NULL, NULL, NULL, 1, 'tieu-chi', NULL, '2023-05-30 13:47:18', '2023-05-30 13:47:18'),
	(7, 'thumbnails/post/tc2_6475fe6ff1198.png', '60-ngay-doi-tra-vi-bat-ki-ly-do-gi', '60 NGÀY ĐỔI TRẢ VÌ BẤT KÌ LÝ DO GÌ', NULL, NULL, NULL, NULL, 1, 'tieu-chi', NULL, '2023-05-30 13:47:28', '2023-05-30 13:47:28'),
	(8, 'thumbnails/post/tc3_6475fe94ad4ed.png', 'den-tan-noi-nhan-hang-tra-hoan-tien-trong-24h', 'ĐẾN TẬN NƠI NHẬN HÀNG TRẢ, HOÀN TIỀN TRONG 24H', NULL, NULL, NULL, NULL, 1, 'tieu-chi', NULL, '2023-05-30 13:48:04', '2023-05-30 13:48:04'),
	(9, 'thumbnails/post/tc4_6475fe9b9f3f7.png', 'tu-hao-san-xuat-tai-viet-nam', 'TỰ HÀO SẢN XUẤT TẠI VIỆT NAM', NULL, NULL, NULL, NULL, 1, 'tieu-chi', NULL, '2023-05-30 13:48:11', '2023-05-30 13:48:11');

-- Dumping structure for table laravel-thoitrang.table_products
CREATE TABLE IF NOT EXISTS `table_products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `sale_price` double DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `numb` int DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_products_category_id_foreign` (`category_id`),
  CONSTRAINT `table_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `table_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_products: ~34 rows (approximately)
INSERT INTO `table_products` (`id`, `code`, `name`, `slug`, `regular_price`, `discount`, `sale_price`, `properties`, `desc`, `content`, `numb`, `type`, `photo`, `photo1`, `view`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'PROFfq4chDntYK20230530200854', 'Áo thun nam ba lỗ sành điệu đẹp', 'ao-thun-nam-ba-lo-sanh-dieu-dep', 99000, NULL, NULL, '{"sizes": ["M", "L", "XL"], "origin": "Việt Nam"}', 'Ipsa laudantium ut explicabo dolorem voluptatum et. Commodi voluptatibus voluptate odio eos quia. A nemo illo in dicta. In eveniet ut eveniet vitae. Aliquid accusantium et quia totam. Tempora soluta fugit et ipsa id modi.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 452, 1, 1, '2023-01-04 17:00:00', '2023-05-30 13:09:43'),
	(2, 'PROFpwvZZry0q920230530200854', 'Áo khoác da lót dù cao cấp ADN10', 'ao-khoac-da-lot-du-cao-cap-adn10', 300000, 67, 200000, '{"sizes": ["L", "XL"], "origin": "Việt Nam"}', 'Corporis blanditiis sequi repudiandae unde ea enim in. Inventore fugiat et doloribus officiis tempore laborum. Quia consequuntur et ipsa sunt dignissimos. Vel vel corporis qui quia id sed eius. Soluta consequatur quae suscipit quo reiciendis cum ducimus.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 421, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(3, 'PROFnynWE9HtF520230530200854', 'Áo polo nam thời trang phù hợp phong cách trẻ trung Kira', 'ao-polo-nam-thoi-trang-phu-hop-phong-cach-tre-trung-kira', 200000, NULL, NULL, '{"sizes": ["M", "L", "XL"], "origin": "Việt Nam"}', 'Non sit id eum soluta voluptatibus est repudiandae. Qui accusamus at eum dolor ipsum sint iste. Voluptatem maxime autem voluptatum delectus iure rerum beatae et. Soluta quae qui veritatis aliquam ut magni. Dolorem dolorem delectus debitis qui ut ducimus. Dolor error totam voluptatem.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 423, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(4, 'PROFVYLHvZG8zr20230530200854', 'Áo thun nam đẹp chất vải nhẹ mát mẻ vào hè', 'ao-thun-nam-dep-chat-vai-nhe-mat-me-vao-he', 99000, NULL, NULL, '{"sizes": ["M", "L", "XL"], "origin": "Việt Nam"}', 'Et reiciendis molestiae dolores cumque at odio. Tenetur eligendi distinctio quibusdam qui qui. Dolor ea facilis id cumque.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 23, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(5, 'PROFgnJt4h6ILZ20230530200854', 'Áo thun nam tay dài đẹp chất vải nhẹ lịch lãm', 'ao-thun-nam-tay-dai-dep-chat-vai-nhe-lich-lam', 150000, 10, 135000, '{"sizes": ["M", "L", "XL"], "origin": "Việt Nam"}', 'Voluptatem esse doloremque consequatur corrupti unde. Debitis qui tempora et odit consequatur minima. Repudiandae doloribus excepturi est veniam error totam. Ducimus illum corrupti sequi sunt modi rem. Dolor ad nisi doloribus consequuntur distinctio.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 169, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(6, 'PROFyVmHn184MD20230530200854', 'Đồng hồ đeo tay nam EFR-526L-1AV', 'dong-ho-deo-tay-nam-efr-526l-1av', 300000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Ipsum ea suscipit quod dignissimos et quis. Optio sapiente soluta quod provident fugiat qui. Eum ab aliquam qui voluptas occaecati sint explicabo. Sunt tenetur at mollitia alias doloribus omnis vel magni. Fugit nisi velit pariatur voluptatibus nostrum non. Aspernatur ipsa labore aliquid ratione quia repudiandae. Eligendi alias asperiores odit. Velit aut at earum assumenda explicabo. Illum excepturi maiores harum molestiae aut.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 494, 4, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(7, 'PROFZlIicXr9vw20230530200854', 'Đồng hồ đeo tay nữ SHE-4538GL-6A', 'dong-ho-nu-SHE-4538GL-6A', 300000, 50, 150000, '{"sizes": [], "origin": "Việt Nam"}', 'Consequatur impedit architecto eligendi praesentium velit quis in. Est explicabo et eos ratione maxime dolorem. Sint ex debitis et pariatur. Dolorem eveniet ad magni natus et voluptas dicta laboriosam. Temporibus velit autem distinctio velit nisi nulla dolores. Architecto et voluptates repudiandae quasi et fugiat animi ut.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 428, 4, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(8, 'PROF4ZsyZUMeKu20230530200854', 'Mắt kính Buffterfly classic gọng kim loại', 'mat-kinh-buffterfly-classic-gong-kim-loai', 150000, 3, 145000, '{"sizes": [], "origin": "Việt Nam"}', 'Vero repudiandae consectetur officiis nihil nihil. Et ex aut assumenda omnis veritatis. Laudantium ipsum sit iusto commodi vel optio. Vel hic vero quibusdam aperiam nemo voluptates in dolore. Fuga ipsam rerum voluptatem ut.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 451, 5, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(9, 'PROFz4kw4m4hMe20230530200854', 'Mắt kính nữ chống đèn loá sành điệu thời trang JOMO EYEWEAR', 'mat-kinh-nu-chong-den-loa-sanh-dieu-thoi-trang-jomo-eyewear', 120000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Atque quia illum perspiciatis rerum sint consectetur enim. Sit vel quia sunt laboriosam maxime temporibus soluta. Perspiciatis provident ipsum sint consequuntur adipisci porro itaque suscipit. Excepturi aspernatur eveniet placeat amet. Unde sed impedit dolores suscipit rem nihil. Suscipit ullam aspernatur voluptas temporibus. Nostrum consequuntur ab quia ad quasi. Vel expedita ea qui provident.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 162, 5, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(10, 'PROFXtLDzyjFTY20230530200854', 'Mắt kính round classic đẹp sành điệu', 'mat-kinh-round-classic-dep-sanh-dieu', 21000, NULL, NULL, '{"sizes": [], "colors": ["d9b4ac", "8b81a2"], "origin": "Việt Nam"}', 'Dolores aut fuga autem minus eum esse. Itaque voluptatem architecto rerum laudantium facere. Id harum labore laborum et et. Sunt et fuga dignissimos. Voluptatum esse ut nihil vel voluptas velit. Aut accusamus quo non neque consequatur ducimus.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 457, 5, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(11, 'PROFdhFEOjINCr20230530200854', 'Túi xách lớn satchel 2 ngăn cho nam nữ văn phòng', 'tui-xach-lon-satchel-2-ngan-cho-nam-nu-van-phong', 350000, 23, 270000, '{"sizes": [], "origin": "Việt Nam"}', 'Voluptas ipsa ab aut odit neque dolores. Voluptates laboriosam accusamus assumenda quaerat temporibus. Iste nobis quo voluptas quia. Sunt quia dicta omnis expedita sed. Eaque deleniti quia error quo ut sed dolor recusandae. Sed dicta quia adipisci.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 496, 2, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(12, 'PROFuXN6Q1efCX20230530200854', 'Túi xách da đeo chéo nam thời trang phong cách', 'tui-xach-da-deo-cheo-nam-thoi-trang-phong-cach', 176000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Architecto possimus veritatis aut illum minima. Et pariatur ut ipsam ea quidem nihil. Eveniet veritatis quis deserunt suscipit sit voluptas vel. Iusto voluptas earum ullam. Rerum porro eos dolorem aperiam eveniet.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 326, 2, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(13, 'PROFwRwxI0C5Bs20230530200854', 'Túi xách văn phòng đựng laptop cho cả nam lẫn nữ', 'tui-xach-van-phong-dung-laptop-cho-ca-nam-lan-nu', 290000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Quam maiores vero sit. Facilis veritatis ratione quo et. Id aliquid quia sunt eligendi. Magnam et voluptates odit id est. Sit libero nostrum sint earum aliquid voluptatem consequatur. Quasi ut ex facere magnam est reprehenderit deserunt.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 150, 2, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(14, 'PROFQ948G9FfEI20230530200854', 'Túi xách NAHA nữ đẹp', 'tui-xach-naha-nu-dep', 145000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Aut porro omnis consequatur atque ea vero praesentium. Eos provident fugit itaque harum necessitatibus aut. Itaque ab sit incidunt ipsam ab ut voluptatem. Velit architecto debitis veniam laborum. Voluptate accusamus sed nostrum praesentium rem.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 152, 2, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(15, 'PROFCxEOjBWvqE20230530200854', 'Guốc cao nữ', 'guoc-cao-nu', 410000, 10, 380000, '{"sizes": [35, 36], "origin": "Việt Nam"}', 'Quo quam illo est error vitae sequi. Mollitia repudiandae non omnis eius. Aspernatur quam alias eos asperiores. Quia nisi hic cum ullam beatae sint fugit.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 75, 3, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(16, 'PROFNFB8r8gXr320230530200854', 'Áo Hoodie drew cực đẹp dành cho giới trẻ nam nữ', 'ao-hooide-drew-cuc-dep-danh-cho-gioi-tre-nam-nu', 270000, NULL, NULL, '{"sizes": ["X", "L", "XL"], "origin": "Việt Nam"}', 'Nulla cumque quaerat natus veniam quia nihil. Ducimus adipisci aspernatur ipsum reprehenderit vero voluptas. Qui consequuntur quo cupiditate soluta sit quasi animi.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 23, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(17, 'PROFapj2m1MzqW20230530200854', 'Giày IceBreaker nữ', 'giay-icebeaker-nu', 500000, NULL, NULL, '{"sizes": [35, 36, 38, 39, 40], "origin": "Việt Nam"}', 'Consequuntur at itaque atque sit ipsum aspernatur. Dolor iste asperiores cum fugit veritatis. Suscipit quam optio aut sapiente. Id et non omnis aut consectetur quibusdam. Deserunt excepturi et quam tenetur perferendis rem. Maiores aut eum ut est. Asperiores excepturi nisi rerum cumque. Numquam similique ut pariatur enim repudiandae accusantium.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 77, 3, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(18, 'PROFyceKaZOfce20230530200854', 'Kính Mát Thời Trang Chống Loá JOMO EYEWEAR - Bailey nam nữ', 'kinh-mat-thoi-trang-chong-loa-jomo-eyewear-bailey-nam-nu', 125000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Pariatur nostrum facilis et quasi. Porro est consectetur qui facilis eum magnam enim placeat. Quia blanditiis est doloribus beatae. Officia qui nihil quasi nisi. Aut labore id autem facere qui. Impedit qui reiciendis sequi aut. Doloribus optio ad consequatur qui doloremque sed fuga.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 107, 4, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(19, 'PROFo3Rbr83ERT20230530200854', 'Nike_Air_Jordan_1_High_OG_Metallic nam nữ', 'nike-air-jordan-1-high-og-metallic-nam-nu', 750000, 10, 725000, '{"sizes": [35, 36, 38, 39, 40], "origin": "Việt Nam"}', 'Cum unde quae magni non consectetur ex consequatur. Autem laboriosam rerum tempore. Debitis consequatur exercitationem qui illum labore alias. Mollitia ab voluptas nulla. Unde blanditiis nulla dicta voluptas similique voluptatum.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 106, 3, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(20, 'PROFkqOzOwvJrP20230530200854', 'Quần baggy nam nữ trẻ trung thời trang', 'quan', 150000, NULL, NULL, '{"sizes": ["X", "L", "XL", "XXL"], "origin": "Việt Nam"}', 'Expedita ex nemo corporis ex amet. Enim earum at in commodi aut. Molestiae id qui dolores magni id. Nostrum id mollitia consequuntur id asperiores assumenda.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 33, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(21, 'PROFdbJ5cb63OZ20230530200854', 'Quần jogger nam thể thao trơn basic', 'quan-jogger-nam-the-thao-tron-basic', 105000, NULL, NULL, '{"sizes": ["X", "L", "XL", "XXL"], "origin": "Việt Nam"}', 'Ipsum quia sint laborum exercitationem eum porro. Qui rerum eius voluptatibus et nobis. Consequatur neque quia sed occaecati totam impedit. Culpa deserunt tempore et id.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 147, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(22, 'PROFZvuOg1F3AG20230530200854', 'Quần kaki nam PIGOFASHION', 'quan-kaki-nam-pigofashion', 80000, NULL, NULL, '{"sizes": ["X", "L", "XL", "XXL"], "origin": "Việt Nam"}', 'Officiis tenetur dolor quis. Enim inventore facilis reiciendis voluptatibus. Non et vero suscipit in ut aut temporibus.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 468, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(23, 'PROFlpAO5arMPO20230530200854', 'Quần short thể thao nam co giãn thấm hút PIGOFASHION', 'quan-short-the-thao-nam-co-gian-tham-hut-PIGOFASHION', 164000, NULL, NULL, '{"sizes": ["X", "L", "XL", "XXL"], "origin": "Việt Nam"}', 'Delectus totam enim architecto id repudiandae voluptates. Voluptatibus repudiandae quis omnis velit tempore. Eum nihil eius voluptatem aut quidem autem.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 59, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(24, 'PROFp6GtzUtDXt20230530200854', 'Áo sơ mi văn phòng cho nữ', 'ao-so-mi-van-phong-cho-nu', 177000, 8, 143000, '{"sizes": ["M", "X", "L"], "origin": "Việt Nam"}', 'Autem dolor ex sunt voluptatem aut. Nobis voluptas ut et possimus aperiam magni. Ut quis quo veniam sunt qui quia. Ea consequuntur culpa at optio et.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 31, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(25, 'PROFcb8iPG47nY20230530200854', 'Áo sơ mi văn phòng cho nam', 'ao-so-mi-van-[hong-cho-nam', 180000, NULL, NULL, '{"sizes": ["X", "L", "XL", "XXL"], "origin": "Việt Nam"}', 'Sed quibusdam eius vitae nostrum id qui. Quae autem laboriosam minima et ut. Minus quo qui exercitationem aut ratione. Sit nostrum atque doloribus odio ullam non.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 139, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(26, 'PROFcJT5mpXCaA20230530200854', 'Áo sơ mi tay dài văn phòng cho nam', 'ao-so-mi-tay-dai-van-phong-cho-nam', 300000, NULL, NULL, '{"sizes": ["X", "L", "XL", "XXL"], "colors": ["000000", "74b9ff"], "origin": "Việt Nam"}', 'Aliquid ratione quis est dolores modi laborum. Quis sit odit aut. Unde ut sit dolor ad ullam fugit aspernatur.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 62, 1, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(27, 'PROFbWJyQrVk3O20230530200854', 'Đồng hồ casio bền chống nước nam nữ', 'dong-ho-casio-ben-chong-nuoc-nam-nu', 350000, 29, 250000, '{"sizes": [], "origin": "Việt Nam"}', 'Cum labore vitae qui occaecati. Aut perferendis enim minima ut distinctio sit. Quas nihil occaecati qui et.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 79, 4, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(28, 'PROFP6mttsHNzi20230530200854', 'Đồng hồ nữ Marble Florals', 'dong-ho-nu-marble-florals', 170000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Dolor aut ut aut nihil ut. Doloribus fuga dolor commodi aut aut praesentium. Fugiat facere est nihil quasi quisquam ut tenetur dolor. Sed minima autem saepe.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 422, 4, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(29, 'PROFUntuXAL3aM20230530200854', 'Túi Halio Canvas nữ', 'tui-halio-canvas-nu', 99000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Molestiae eum at aut totam. Quaerat enim ducimus dolore quia aliquam beatae rerum. Deserunt cumque corporis cum quaerat assumenda hic beatae. Error voluptatum est atque est. Et inventore accusantium aut optio omnis. Voluptatibus fugiat et fuga natus molestias.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 346, 2, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(30, 'PROFEZgbq8mCsa20230530200854', 'Túi Tote - Okame Hoa thời trang nữ', 'tui-tote-okame-hoa-thoi-trang-nu', 99000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Eos aspernatur repellendus dolores repellat. Aut necessitatibus deserunt cupiditate omnis. Excepturi dolores ad enim similique vel sit sed officia.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 347, 2, 1, '2023-01-04 17:00:00', '2023-01-04 17:00:00'),
	(31, 'PROFBPB90wrBvd20230530200854', 'Giày Sandal Nam MWC - 7066 Giày Sandal Nam Quai Chéo Kiểu Dáng Basic', 'giay-sandal-nam-mwc-7066-giay-sandal-nam-quai-cheo-kieu-dang-basic', 300000, NULL, NULL, '{"sizes": [39, 40, 41, 42, 43, 44], "origin": "Việt Nam"}', 'Reprehenderit atque reiciendis repellat voluptatum. Omnis quia quos id autem dignissimos magnam. Non sed officia beatae nostrum voluptatem excepturi.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 333, 3, 1, '2023-04-30 17:00:00', '2023-04-30 17:00:00'),
	(32, 'PROFmvLKjmKs0e20230530200854', 'Giày Sandal Nam Hiệu Vento', 'giay-sandal-nam-hieu-vento', 330000, NULL, NULL, '{"sizes": [38, 39, 40, 41, 42], "origin": "Việt Nam"}', 'Expedita numquam iste quis illo. Maiores non et quia. Magni voluptatem quia sint eius similique. Alias ut vitae sit nulla quisquam eum fugit. A qui sit nihil est.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 461, 3, 1, '2023-04-30 17:00:00', '2023-04-30 17:00:00'),
	(33, 'PROFGemFPMokRx20230530200854', 'Mũ Lưỡi Trai Đen Trơn Classic Khóa Đồng Cao Cấp Cho Nam và Nữ', 'mu-luoi-trai-den-tron-classic-khoa-dong-cao-cap-cho-nam-va-nu', 135000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Ut quisquam sint voluptatem veniam delectus iste. Vel sit commodi dolorem quia sit assumenda nesciunt est. Quisquam totam dolore natus dolores illum rerum. Rerum ex nihil ducimus expedita et.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 208, 6, 1, '2023-04-30 17:00:00', '2023-04-30 17:00:00'),
	(34, 'PROFgw5IyWDTBi20230530200854', 'Nón Bucket, Mũ Vành Tròn Nam Nữ 2 Mặt Trơn Classic Cao Cấp', 'non-bucket-mu-vanh-tron-nam-nu-2-mat-tron-classic-cao-cap', 150000, NULL, NULL, '{"sizes": [], "origin": "Việt Nam"}', 'Id et totam aut et aperiam mollitia ut. Omnis tempore sit iure incidunt deleniti expedita officiis. Nam ut ut sint maxime consequatur amet. Officiis et qui voluptas similique cumque illo.', NULL, NULL, NULL, 'thumbnails/products/aothun_644d318fad195.jpg', 'thumbnails/products/aothun1_644d318fc86f9.jpg', 399, 6, 1, '2023-04-30 17:00:00', '2023-04-30 17:00:00');

-- Dumping structure for table laravel-thoitrang.table_product_details
CREATE TABLE IF NOT EXISTS `table_product_details` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_product_details_product_id_foreign` (`product_id`),
  CONSTRAINT `table_product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `table_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_product_details: ~60 rows (approximately)
INSERT INTO `table_product_details` (`id`, `photo`, `name`, `color`, `stock`, `product_id`, `created_at`, `updated_at`) VALUES
	(1, 'thumbnails/products/ao_ba_lo_blue_bold.png', NULL, '#232645', 50, 1, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(2, 'thumbnails/products/ao_ba_lo_grey_bold.png', NULL, '#95a5a5', 25, 1, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(3, 'thumbnails/products/ao_khoac_da_lot_du_cao_ cap_ADN10_den.png', NULL, '#000000', 10, 2, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(4, 'thumbnails/products/ao_polo_green.png', NULL, '#26ae50', 46, 3, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(5, 'thumbnails/products/ao_polo_red.png', NULL, '#e64c3c', 31, 3, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(6, 'thumbnails/products/ao_polo_trang.png', NULL, '#ffffff', 41, 3, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(7, 'thumbnails/products/ao_thun_green.png', NULL, '#495934', 13, 4, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(8, 'thumbnails/products/ao_thun_den.png', NULL, '#000000', 48, 4, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(9, 'thumbnails/products/ao_thun_tay_dai_657689.png', NULL, '#556578', 29, 5, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(10, 'thumbnails/products/aothun_tay_dai_white.png', NULL, '#ffffff', 12, 5, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(11, 'thumbnails/products/dong_ho_EFR-526L-1AV.png', NULL, '#000000', 33, 6, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(12, 'thumbnails/products/dong_ho_nu_SHE-4538GL-7A.png', NULL, '#4834d4', 26, 7, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(13, 'thumbnails/products/glasses_butterfly _classic_Gọng_Kim_Loại_pink_b88491.png', NULL, '#b88491', 34, 8, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(14, 'thumbnails/products/glasses_butterfly _classic_Gọng_Kim_Loại_purple_b7a1c6.png', NULL, '#b7a1c6', 45, 8, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(15, 'thumbnails/products/glasses_fashion_chong_den_cho_nu_JOMO EYEWEAR.png', NULL, '#000000', 16, 9, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(16, 'thumbnails/products/glasses_round_classic_pink_light_d9b4ac.png', NULL, '#d9b4ac', 14, 10, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(17, 'thumbnails/products/glasses_round_classic_purple8b81a2.png', NULL, '#8b81a2', 42, 10, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(18, 'thumbnails/products/handbag_big_satchel_2_ngăn_000000.png', NULL, '#000000', 22, 11, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(19, 'thumbnails/products/handbag_big_satchel_2_ngăn_e4cfc4.png', NULL, '#e4cfc4', 16, 11, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(20, 'thumbnails/products/handbag_big_satchel_2_ngăn_e5e1dc.png', NULL, '#e5e1dc', 27, 11, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(21, 'thumbnails/products/handbag_di_choi_tiec_b48d82.png', NULL, '#b48d82', 14, 12, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(22, 'thumbnails/products/handbag_men_office_latop.png', NULL, '#000000', 42, 13, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(23, 'thumbnails/products/handbag_NAHA_b6ccb6.png', NULL, '#b6ccb6', 40, 14, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(24, 'thumbnails/products/handbag_NAHA_dcccbf.png', NULL, '#dcccbf', 16, 14, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(25, 'thumbnails/products/hight_feel_black_000000.png', NULL, '#000000', 46, 15, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(26, 'thumbnails/products/hight_feel_white.png', NULL, '#ffffff', 50, 15, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(27, 'thumbnails/products/hoodie_drew_black.png', NULL, '#000000', 15, 16, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(28, 'thumbnails/products/hoodie_drew_brown.png', NULL, '#914900', 45, 16, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(29, 'thumbnails/products/icebreaker_d4e0e8.png', NULL, '#d4e0e8', 33, 17, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(30, 'thumbnails/products/icebreaker_edd3e1.png', NULL, '#edd3e1', 40, 17, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(31, 'thumbnails/products/icebreaker_black.png', NULL, '#000000', 14, 17, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(32, 'thumbnails/products/Kính Mát Thời Trang Chống Loá JOMO EYEWEAR - Bailey Grey Smoke.png', NULL, '#ffffff', 33, 18, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(33, 'thumbnails/products/Nike_Air_Jordan_1_High_OG_Metallic_Blue_5a6c89.png', NULL, '#5a6c89', 34, 19, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(34, 'thumbnails/products/Nike_Air_Jordan_1_High_OG_Metallic_grey_88898b.png', NULL, '#88898b', 19, 19, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(35, 'thumbnails/products/quan_baggy_nam_nu_b7a078.png', NULL, '#b7a078', 18, 20, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(36, 'thumbnails/products/quan_jogger_the_thao_tron_bacsic_9b9fa3.png', NULL, '#9b9fa3', 10, 21, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(37, 'thumbnails/products/quan_jogger_the_thao_tron_bacsic_232c47.png', NULL, '#232c47', 40, 21, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(38, 'thumbnails/products/quan_kaki_xam_dam_PIGOFASHION_4e585b.png', NULL, '#4e585b', 21, 22, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(39, 'thumbnails/products/quan_kaki_xanh_reu_rengular_PIGOFASHION_60654d.png', NULL, '#60654d', 38, 22, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(40, 'thumbnails/products/quan_short_the_thao_nam_co_gian_tham_hut_pigofashion_black.png', NULL, '#000000', 32, 23, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(41, 'thumbnails/products/quan_short_the_thao_nam_co_gian_tham_hut_pigofashion.png', NULL, '#ffffff', 50, 23, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(42, 'thumbnails/products/shirt_blue_cad4f1.png', NULL, '#cad4f1', 12, 24, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(43, 'thumbnails/products/shirt_purple_c4bfd5.png', NULL, '#c4bfd5', 47, 24, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(44, 'thumbnails/products/shirt_white_ffffff.png', NULL, '#ffffff', 49, 24, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(45, 'thumbnails/products/shirt_office_000000.png', NULL, '#000000', 41, 25, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(46, 'thumbnails/products/shirt_office_b7c0bd.png', NULL, '#b7c0bd', 50, 25, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(47, 'thumbnails/products/shirt_office_brown_ab8c80.png', NULL, '#ab8c80', 43, 25, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(48, 'thumbnails/products/shirt_tay_dai_blue_light.png', NULL, '#74b9ff', 20, 26, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(49, 'thumbnails/products/shirt_tay_dai_den.png', NULL, '#000000', 32, 26, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(50, 'thumbnails/products/stopwatch_casio_black_000000.png', NULL, '#000000', 28, 27, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(51, 'thumbnails/products/stopwatch_girl_Marble_Florals_d2b39c.png', NULL, '#d2b39c', 50, 28, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(52, 'thumbnails/products/Túi Halio Canvas.png', NULL, '#d2b39c', 47, 29, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(53, 'thumbnails/products/Túi Tote - Okame Hoa.png', NULL, '#d2b39c', 49, 30, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(54, 'thumbnails/products/Giày Sandal Nam MWC -7066 Giày Sandal Nam Quai Chéo Kiểu Dáng Basic.png', NULL, '#000000', 39, 31, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(55, 'thumbnails/products/Giày Sandal Big Size Nam Hiệu Vento_000000.png', NULL, '#000000', 36, 32, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(56, 'thumbnails/products/Giày Sandal Nam Vento Capella Nâu Be B7A078.png', NULL, '#B7A078', 12, 32, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(57, 'thumbnails/products/mu-luoi-trai-trang-tron-1.png', NULL, '#ffffff', 22, 33, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(58, 'thumbnails/products/mu-luoi-trai-den-tron-9.png', NULL, '#000000', 25, 33, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(59, 'thumbnails/products/mu-bucket-tron-mau-den-trang-3-510x510.png', NULL, '#ffffff', 47, 34, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(60, 'thumbnails/products/mu-bucket-tron-mau-den-trang-5-510x510.png', NULL, '#000000', 40, 34, '2023-05-30 13:08:54', '2023-05-30 13:08:54');

-- Dumping structure for table laravel-thoitrang.table_promotions
CREATE TABLE IF NOT EXISTS `table_promotions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `order_price_conditions` double DEFAULT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `discount_price` double DEFAULT NULL,
  `limit` int DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_promotions_product_id_foreign` (`product_id`),
  CONSTRAINT `table_promotions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `table_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_promotions: ~2 rows (approximately)
INSERT INTO `table_promotions` (`id`, `code`, `product_id`, `order_price_conditions`, `desc`, `discount_price`, `limit`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'a9CpT', NULL, 250000, 'Laborum sit vitae blanditiis voluptate. Assumenda facere necessitatibus architecto unde excepturi molestiae. Cum modi ut possimus molestiae voluptas debitis.', 5, 15, '2023-06-30', 1, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(2, 'uf95P', NULL, 500000, 'Ipsum praesentium reprehenderit et dolores minima. Saepe non eos sapiente vel omnis et velit. Aut consectetur rerum sed praesentium non in.', 15, 12, '2023-06-30', 1, '2023-05-30 13:08:54', '2023-05-30 13:08:54');

-- Dumping structure for table laravel-thoitrang.table_reviews
CREATE TABLE IF NOT EXISTS `table_reviews` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `order_id` int unsigned DEFAULT NULL,
  `star` int DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_reviews_product_id_foreign` (`product_id`),
  KEY `table_reviews_order_id_foreign` (`order_id`),
  KEY `table_reviews_user_id_foreign` (`user_id`),
  CONSTRAINT `table_reviews_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `table_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `table_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `table_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `table_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `table_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_reviews: ~120 rows (approximately)
INSERT INTO `table_reviews` (`id`, `user_id`, `product_id`, `order_id`, `star`, `content`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(2, 1, 2, 1, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(3, 2, 3, 2, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(4, 2, 4, 2, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(5, 3, 5, 3, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(6, 3, 6, 3, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(7, 4, 7, 4, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(8, 4, 8, 4, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(9, 5, 9, 5, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(10, 5, 10, 5, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(11, 6, 11, 6, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(12, 6, 12, 6, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(13, 7, 13, 7, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(14, 7, 14, 7, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(15, 8, 15, 8, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(16, 8, 16, 8, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(17, 9, 17, 9, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(18, 9, 18, 9, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(19, 10, 19, 10, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(20, 10, 20, 10, 3, 'Voluptatem nihil et quis quis. Nihil qui magni qui praesentium blanditiis tenetur rem ex. Aliquam eos ratione et non eius nam recusandae. Ad vel eos quam voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(21, 2, 14, NULL, 5, 'Nesciunt sint et provident incidunt. Hic amet tenetur aut ut. Voluptatum ipsum placeat ad incidunt.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(22, 4, 23, NULL, 5, 'Est qui provident aut. Id quo vel et ut voluptas.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(23, 9, 28, NULL, 5, 'Cupiditate similique voluptatem et omnis quos amet. Voluptas neque officiis reiciendis ut.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(24, 1, 14, NULL, 5, 'Inventore officiis mollitia excepturi officiis voluptas molestiae. A ipsum eos fugit cum.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(25, 6, 5, NULL, 4, 'Sequi eum id distinctio libero quidem. Qui reprehenderit omnis expedita vitae voluptate.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(26, 9, 18, NULL, 3, 'Facilis ex rerum est omnis. Sequi sed sunt illo quia inventore aut alias aut.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(27, 3, 10, NULL, 4, 'Omnis eos id soluta non. Voluptas incidunt sequi ut eum cum. Ex quis est animi perferendis.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(28, 5, 28, NULL, 3, 'Et sequi unde soluta. Cumque eius et aliquid eveniet animi alias ad. In sit animi totam.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(29, 2, 5, NULL, 5, 'Vitae assumenda ab autem qui et sint. Rerum magni est sequi ut illo aut.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(30, 6, 9, NULL, 3, 'Aspernatur est et non nostrum. Quia soluta ratione quia rerum tempore. Eos veniam voluptatem sint.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(31, 9, 12, NULL, 5, 'Qui omnis aperiam similique est. Praesentium nesciunt eos non quia.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(32, 3, 30, NULL, 5, 'Vel pariatur iusto quaerat et delectus laboriosam. Quos molestiae et quo.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(33, 6, 28, NULL, 5, 'Natus tempora et aut. Ut assumenda qui ratione eum tenetur et.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(34, 5, 12, NULL, 4, 'Laborum saepe accusamus sed. Sed aut optio rerum. Neque nihil neque veritatis optio.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(35, 7, 26, NULL, 3, 'Vitae qui et et doloribus. Quibusdam omnis dignissimos excepturi eos qui consequatur a.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(36, 1, 14, NULL, 3, 'Repellat minus qui aut. Eaque asperiores facere blanditiis pariatur et. Dolorem qui minus et ex.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(37, 5, 3, NULL, 5, 'Porro esse earum excepturi explicabo enim asperiores dolorem. Qui omnis consequatur quo eum.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(38, 6, 1, NULL, 3, 'Officiis amet aspernatur rem tenetur. Similique quam assumenda necessitatibus sit.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(39, 3, 11, NULL, 3, 'Qui aut adipisci aut. Omnis illo enim nam. Autem aut quo voluptatibus nobis ut qui qui ut.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(40, 3, 8, NULL, 3, 'Eum aliquid dicta ipsam aut. Laborum ut quidem harum minus. Voluptas eius consectetur voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(41, 8, 1, NULL, 3, 'Qui ut adipisci architecto ut ut. Quo aut nam voluptatum aut alias dolor.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(42, 4, 15, NULL, 4, 'Dolores dolorem officiis ut vero voluptatem perspiciatis. Minus molestias ipsum accusantium.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(43, 8, 28, NULL, 5, 'Laborum qui dolores ea odio. Alias ea alias sapiente quis architecto dolorem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(44, 3, 15, NULL, 3, 'Vitae in fuga repellat praesentium totam omnis. Consequuntur quia et sit recusandae.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(45, 2, 16, NULL, 3, 'Ab magni illo qui et. Illo illum quia dolor dolorum at ut.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(46, 9, 8, NULL, 5, 'Assumenda quidem ea fuga ut. Unde fugiat excepturi ea voluptatem. Velit enim debitis quos nihil.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(47, 7, 21, NULL, 3, 'Sit autem eius tempora ab ut non. Praesentium et occaecati ut quod voluptatem ipsam.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(48, 3, 15, NULL, 5, 'Reiciendis velit id ratione error. Maxime ut ex itaque.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(49, 3, 9, NULL, 5, 'Accusamus autem atque nulla rerum porro fugit. Fugit velit est et non quis repellat molestiae.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(50, 10, 26, NULL, 3, 'Quas dolorem aspernatur veniam ipsum et facere molestias. Sit et repudiandae tempore.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(51, 10, 17, NULL, 4, 'Voluptatibus tempora et molestiae. Ut voluptate perferendis quae sit maxime recusandae quaerat.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(52, 7, 27, NULL, 4, 'Voluptas molestias dolorem veniam voluptas optio. Quam beatae dignissimos ea velit et et.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(53, 6, 28, NULL, 5, 'Nihil dolores eius non quisquam laudantium et. Perferendis id quis tempora sapiente eum.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(54, 5, 14, NULL, 3, 'Ut quis debitis fuga. Ducimus hic quo quis dignissimos. Nihil doloremque et vitae enim nemo ullam.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(55, 4, 15, NULL, 3, 'Commodi porro quisquam sit qui. Qui non occaecati ut eum quia.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(56, 3, 19, NULL, 5, 'Repellat cum fugit est dolores. Soluta quasi atque rem sed labore ut neque in.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(57, 7, 10, NULL, 4, 'Rerum atque nihil illum quos. Quam sapiente voluptatem voluptate.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(58, 6, 1, NULL, 3, 'Fugit est sed qui cum odit. Distinctio qui ipsa id dolore qui enim doloribus.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(59, 3, 27, NULL, 4, 'Cumque in est rerum animi animi. Et hic sit excepturi ea maiores.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(60, 8, 21, NULL, 4, 'Pariatur dolores nostrum et aut. Et et illum qui qui. Debitis sapiente atque non quasi.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(61, 4, 26, NULL, 4, 'Assumenda quod quo dolorem. Aut ipsa autem consequatur rerum quis autem. Ea et sed labore quia.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(62, 1, 9, NULL, 4, 'Labore sit doloremque facere eos. Nemo sequi qui omnis qui consectetur nam.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(63, 8, 22, NULL, 4, 'Quae aut non id consequuntur blanditiis est id. Dolorem quia deserunt officiis explicabo omnis non.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(64, 4, 21, NULL, 3, 'Natus quos iure itaque et sint tenetur. Nostrum molestiae iste exercitationem ipsam impedit soluta.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(65, 4, 14, NULL, 3, 'Sapiente harum incidunt quo ut corporis totam ipsam. Temporibus officia nisi non suscipit nostrum.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(66, 2, 25, NULL, 4, 'Ipsam impedit nihil ipsum commodi nisi et voluptates. Error ad deleniti commodi.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(67, 5, 29, NULL, 3, 'Et inventore similique molestiae omnis enim et omnis. Sed doloribus occaecati laborum quas sint.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(68, 5, 10, NULL, 3, 'Dolorem sequi soluta quo sit qui eum. Delectus itaque ratione sint est.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(69, 3, 29, NULL, 3, 'Beatae aut nihil cupiditate et facilis. Voluptatem quae officia rerum magni. Ea ea ab qui.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(70, 2, 12, NULL, 4, 'Magni earum maiores in et illum aut. Cupiditate autem veniam voluptas ipsa numquam alias delectus.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(71, 8, 24, NULL, 5, 'Tempora unde dolore accusamus quia fugiat illum. Magnam minus eum excepturi et est molestiae.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(72, 8, 12, NULL, 4, 'Et nisi optio quia non minima. Animi odio et ullam qui omnis. Quisquam dolore aspernatur quidem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(73, 2, 20, NULL, 4, 'Labore impedit nesciunt excepturi voluptatum. Molestias dolores aperiam voluptatum in totam.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(74, 5, 1, NULL, 5, 'Molestiae ducimus ratione voluptatem dolor et voluptas maxime. Aut aut illum similique nesciunt.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(75, 1, 1, NULL, 3, 'Ipsum provident id suscipit. Similique tenetur commodi quod quia.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(76, 10, 25, NULL, 4, 'Aut in amet reiciendis. Est voluptas aut occaecati saepe. Voluptas dicta quia sit velit.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(77, 7, 28, NULL, 3, 'Consequatur omnis vel et occaecati a quibusdam fugiat sit. Autem velit fuga earum voluptatem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(78, 8, 26, NULL, 3, 'Sed vel consequatur sed fugiat aut repudiandae et ut. Modi pariatur dolor modi id et a.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(79, 4, 3, NULL, 3, 'Autem voluptatem sed ducimus tenetur quis quaerat eum voluptates. Magni pariatur atque a.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(80, 7, 28, NULL, 4, 'Minus qui enim delectus quia aut. Ut et ipsa eos ut. Nobis maiores tempora fuga consequatur.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(81, 1, 2, NULL, 3, 'Expedita voluptate id non et laboriosam omnis illum. Laboriosam ducimus nisi fugit et.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(82, 6, 24, NULL, 4, 'Atque unde quia autem. Iste neque eum quibusdam. Sint saepe architecto voluptatibus alias quae.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(83, 6, 24, NULL, 4, 'Vitae odit facere praesentium voluptate. Perspiciatis quia autem et.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(84, 6, 29, NULL, 4, 'Eligendi iure quia suscipit et. Est ut quibusdam nihil sit.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(85, 3, 21, NULL, 4, 'Suscipit et doloremque quos incidunt. Provident debitis quisquam modi nihil.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(86, 5, 14, NULL, 4, 'Culpa id velit magnam quibusdam optio ea est laboriosam. Ut esse ullam non natus sed deserunt qui.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(87, 7, 5, NULL, 5, 'Quo soluta magni quia veniam perferendis ex provident harum. Quo quis sit excepturi ex.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(88, 9, 3, NULL, 4, 'Nulla aut ut voluptates. Sed labore dolores et debitis illum voluptas dolor.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(89, 5, 16, NULL, 3, 'Vero sapiente et sit consequatur maxime voluptate. Consequatur iusto et ut molestias consequatur.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(90, 9, 8, NULL, 3, 'Beatae praesentium ut aliquid fugiat recusandae nemo officia. Non non rem non consequuntur.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(91, 2, 28, NULL, 5, 'Sint qui quasi eos iusto reiciendis reiciendis nam. Maiores non atque dolores voluptatem numquam.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(92, 8, 9, NULL, 5, 'At est quaerat illum nam similique quia. Dolores voluptatem vel error nisi.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(93, 6, 17, NULL, 4, 'Unde laborum in dolor rerum sed. Eos sapiente vero similique recusandae eum ut libero.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(94, 2, 10, NULL, 4, 'Quod aperiam totam qui. Unde nihil aut eaque voluptate. Nostrum et nisi a magni.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(95, 3, 6, NULL, 5, 'Modi qui optio adipisci inventore. Id suscipit qui aut. Ipsam perspiciatis quos aut quod quos qui.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(96, 3, 14, NULL, 5, 'Ullam deleniti eum et nisi. Beatae rerum ut qui ex. Velit maiores autem fugit.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(97, 8, 17, NULL, 4, 'A est ea et aut at. Labore rem dolorem sed et. Quisquam est sit praesentium.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(98, 6, 10, NULL, 5, 'Eum autem sunt omnis earum error non. Magnam repellendus repudiandae enim dolores facilis.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(99, 1, 27, NULL, 3, 'Animi aliquam officiis pariatur. Quaerat aut aspernatur labore sit quibusdam.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(100, 6, 15, NULL, 4, 'Sequi vitae modi nemo sint. Aspernatur cupiditate facere dignissimos ad voluptas perspiciatis aut.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(101, 10, 15, NULL, 5, 'Asperiores ab cumque quidem qui. Aut a nulla suscipit ab sit. Quis facilis reiciendis et.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(102, 8, 25, NULL, 5, 'Sunt maxime quia quia quis numquam. Amet neque iure qui dolorem sunt. Nobis omnis aut nulla.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(103, 6, 24, NULL, 3, 'Est odit id saepe dolor velit eos. Quis sit debitis ipsam enim eum.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(104, 3, 19, NULL, 5, 'Animi quia perspiciatis excepturi rem perferendis. Occaecati ut ab tempora et et.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(105, 2, 2, NULL, 5, 'Repellat est nihil officiis id. Quas facere explicabo iste ea adipisci quidem.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(106, 4, 18, NULL, 5, 'Nisi qui in aut aut sed et. Vitae et eum voluptas iure ut sunt. Aliquam sit quis ut eum dolores.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(107, 4, 13, NULL, 3, 'Qui reprehenderit suscipit aut magni rerum. Delectus fuga sunt voluptas.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(108, 6, 20, NULL, 3, 'Blanditiis voluptas delectus totam quam dolorum quia. Omnis rerum minus consectetur cum.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(109, 5, 29, NULL, 5, 'Neque omnis at dolorem in et. Id exercitationem at ut. Et veniam nobis reiciendis ut illo.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(110, 2, 16, NULL, 3, 'Alias quae ut esse voluptatem quos. Molestias est et et sed est aliquam.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(111, 3, 25, NULL, 5, 'Assumenda non in tempora rem odio veniam placeat. Minus commodi quos accusantium corporis placeat.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(112, 6, 12, NULL, 4, 'Eligendi corporis quas molestias pariatur aliquam voluptas a. Asperiores laborum quia omnis non.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(113, 5, 18, NULL, 4, 'Deleniti eum quasi soluta cupiditate voluptatum. Ipsa sed dolor aut facilis quia.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(114, 7, 12, NULL, 5, 'Sed ipsum minus tenetur. Dolores doloremque asperiores libero excepturi quidem voluptas nostrum.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(115, 7, 8, NULL, 4, 'Iusto laudantium quos dolorum eius aut. Accusantium quis autem dolores voluptatibus illum.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(116, 4, 23, NULL, 3, 'Placeat quia molestiae labore nihil mollitia doloribus. Officia est dolores aut vitae nihil.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(117, 8, 17, NULL, 3, 'Qui ullam ut minus unde. Itaque numquam dolores soluta voluptas voluptate et in sit.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(118, 2, 12, NULL, 5, 'Et quasi iure corrupti doloremque vitae voluptatem. Asperiores ab necessitatibus pariatur numquam.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(119, 9, 14, NULL, 4, 'Ut quae culpa a. Minus consequatur sit enim quam rerum. Magni deleniti consequatur et voluptas et.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(120, 7, 5, NULL, 4, 'Tempora quae eaque quia sunt nostrum nihil. Fuga quas aliquid debitis et ut mollitia consectetur.', '1', '2023-05-30 13:08:54', '2023-05-30 13:08:54');

-- Dumping structure for table laravel-thoitrang.table_review_detail
CREATE TABLE IF NOT EXISTS `table_review_detail` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int unsigned NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_review_detail_review_id_foreign` (`review_id`),
  CONSTRAINT `table_review_detail_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `table_reviews` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_review_detail: ~20 rows (approximately)
INSERT INTO `table_review_detail` (`id`, `review_id`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 1, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(2, 2, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(3, 3, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(4, 4, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(5, 5, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(6, 6, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(7, 7, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(8, 8, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(9, 9, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(10, 10, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(11, 11, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(12, 12, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(13, 13, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(14, 14, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(15, 15, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(16, 16, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(17, 17, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(18, 18, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(19, 19, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(20, 20, 'thumbnails/reviews/test_review.jpg', '2023-05-30 13:08:54', '2023-05-30 13:08:54');

-- Dumping structure for table laravel-thoitrang.table_room_chats
CREATE TABLE IF NOT EXISTS `table_room_chats` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_room_chats_user_id_foreign` (`user_id`),
  CONSTRAINT `table_room_chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `table_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_room_chats: ~0 rows (approximately)

-- Dumping structure for table laravel-thoitrang.table_settings
CREATE TABLE IF NOT EXISTS `table_settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `mastertool` mediumtext COLLATE utf8mb4_unicode_ci,
  `headjs` mediumtext COLLATE utf8mb4_unicode_ci,
  `bodyjs` mediumtext COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `analytics` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_settings: ~0 rows (approximately)

-- Dumping structure for table laravel-thoitrang.table_statics
CREATE TABLE IF NOT EXISTS `table_statics` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_attach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_statics: ~2 rows (approximately)
INSERT INTO `table_statics` (`id`, `photo`, `photo1`, `options`, `content`, `desc`, `name`, `file_attach`, `type`, `status`, `created_at`, `updated_at`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, 'Xưởng Jean Nam 9668', NULL, 'footer', 1, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(2, NULL, NULL, NULL, '<p><strong>C&aacute;c chế độ ưu đ&atilde;i tuyệt vời nhất m&agrave; Xưởng chuy&ecirc;n sỉ jean nam c665&nbsp;d&agrave;nh cho c&aacute;c đại l&yacute; v&agrave; kh&aacute;ch sỉ :</strong></p>\r\n\r\n<p>1. H&agrave;ng do xưởng sản xuất =&gt; kh&ocirc;ng qua bất k&igrave; trung gian n&agrave;o =&gt; bảo đảm gi&aacute; sỉ rẻ nhất.<br />\r\n2. C&aacute;c mặt h&agrave;ng được sản xuất với số lượng lớn n&ecirc;n qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể y&ecirc;u t&acirc;m về chất lượng.&nbsp;<br />\r\n3. Chế độ bao đổi h&agrave;ng bị lỗi</p>\r\n\r\n<p>4. Xưởng may lu&ocirc;n bảo đảm nguồn h&agrave;ng ổn định cho kh&aacute;ch sỉ v&agrave; đại l&yacute;.<br />\r\n5. Nh&acirc;n vi&ecirc;n tư vấn nhiệt t&igrave;nh,năng động v&agrave; chuy&ecirc;n nghiệp.Sẵn s&agrave;ng giải đ&aacute;p thắc mắc của kh&aacute;ch h&agrave;ng</p>\r\n\r\n<p>6. C&ocirc;ng ty ch&uacute;ng t&ocirc;i giao h&agrave;ng to&agrave;n quốc.</p>\r\n\r\n<p>7. Chế độ gửi h&agrave;ng linh hoạt: nh&agrave; xe, bưu điện, t&agrave;u, m&aacute;y bay tuỳ theo nhu cầu của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Th&ocirc;ng tin li&ecirc;n hệ:</p>\r\n\r\n<p><strong>Xưởng chuy&ecirc;n sỉ jean nam c665</strong></p>\r\n\r\n<p><strong>ĐỊA CHỈ :</strong>&nbsp;870/24/7 Lạc Long Qu&acirc;n, Phường 8, T&acirc;n B&igrave;nh.</p>\r\n\r\n<p><strong>HOTLINE&nbsp;</strong>:&nbsp;<a href="tel:0965 699 665">0965 699 665</a></p>\r\n\r\n<p><strong>WEBSITE:</strong>&nbsp;http://xuongjeannamc665.com</p>', '<p><strong>XƯỞNG CHUY&Ecirc;N SẢN XUẤT V&Agrave; PH&Acirc;N PHỐI THỜI TRANG JEAN NAM : JEAN D&Agrave;I , JEAN NGẮN , JEAN ỐNG SU&Ocirc;NG</strong></p>\r\n\r\n<p>Xưởng chuy&ecirc;n sỉ jean nam C665 l&agrave; một trong những xưởng may v&agrave; sản xuất uy t&iacute;n tại TPHCM, với quy m&ocirc; sản xuất rộng r&atilde;i, chuy&ecirc;n cung cấp thời trang gi&aacute; sỉ kh&ocirc;ng hề qua bất kỳ trung gian</p>', 'XƯỞNG JEAN NAM C665', NULL, 'gioi-thieu', 1, '2023-05-30 13:08:54', '2023-05-30 13:22:29');

-- Dumping structure for table laravel-thoitrang.table_statistics
CREATE TABLE IF NOT EXISTS `table_statistics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_statistics: ~0 rows (approximately)

-- Dumping structure for table laravel-thoitrang.table_users
CREATE TABLE IF NOT EXISTS `table_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_users_phone_unique` (`phone`),
  UNIQUE KEY `table_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-thoitrang.table_users: ~31 rows (approximately)
INSERT INTO `table_users` (`id`, `username`, `fullName`, `phone`, `email`, `email_verified_at`, `password`, `role`, `photo`, `login_provider`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'nga.luc', 'Bà. Giả Thúy', '84-60-281-8026', 'wthieu@anh.pro.vn', NULL, '$2y$10$Q6P8lIxhrAriOCvXCiVK1.FX/ZsU88P4KGZqztTFyrepbGm.xObzS', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(2, 'buu.hua', 'Giao Kiết Hoài', '(84)(27)679-1021', 'suong82@hy.gov.vn', NULL, '$2y$10$6BQRPoaXhRwLiiZLmyizXuKJR.ygGMGn053c1oNS4bGQiuLVnA6Ua', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(3, 'thoi.phuoc', 'Cụ. Phan Quang', '(067) 907 5321', 'huynh42@gmail.com', NULL, '$2y$10$ajQf.yT3GU71PeCucP/XFe9cM4k7OOIFpoAJURslFB1BdKCBQcpeO', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(4, 'can.anh', 'Vừ Cương', '0710 675 9031', 'mluong@yahoo.com', NULL, '$2y$10$PNCC66f3leC4vVmpNxsG/OGaiqicF1NDpUMyYPivTh6KCAYr9G8L6', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(5, 'hoc.dong', 'Bác. Mai Hán Lạc', '(036) 347 2886', 'nhung.ma@gmail.com', NULL, '$2y$10$wNWY2E7QhS/cuaJUlVPuy.FUlZvkMBrpLPoYyiccaEcM5lvdIYQEy', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(6, 'giao.tien', 'Cung Đinh Nương', '+84-186-845-0837', 'hien.binh@son.name.vn', NULL, '$2y$10$7OzLjtY8h.mQcBw314w/5uMex4Tw5.zH.Q7AIJcBEtzChhQpIujbm', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(7, 'ochu', 'Quách Thi', '(84)(711)236-0490', 'tra12@hotmail.com', NULL, '$2y$10$X8GmgQFmHqUnidzBzye.NefVOIT2/puxDNKlkMJdoJ/QgFdkh2hxK', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(8, 'bui.khieu', 'Cô. Phó Quân', '(064)813-4510', 'dan.ha@uong.net', NULL, '$2y$10$ubB6MRnKuA4kxxGm5ipP2.XXb6JS.HfZGXHY7wd5tShf3RZhB7TBq', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(9, 'son.hong', 'Uông Hoa', '(068)308-3239', 'hoai.kieu@vuong.com', NULL, '$2y$10$apAYai0cTQ.xCGknidCtr.zK.Gu7WCFu3dwuL6xCtGdID4bGPGt7y', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(10, 'truc79', 'Trình Bào', '84-199-265-2868', 'phap.phi@hang.com', NULL, '$2y$10$324bG8vp9w3jIBFX9Vwwtec2.xPr3PMRxLaewP7tgDjgyP0jJsYO2', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(11, 'khanh.tiep', 'Hứa Lạc Bửu', '(84)(219)652-4738', 'phuc51@hinh.gov.vn', NULL, '$2y$10$1dKY3DJ9vf1/X.724kzwxu/JiThnyyEE.ezvjKYaScg2gmmahZ7zm', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52'),
	(12, 'trang.the', 'Cô. Bạc Thy', '(0121)507-6492', 'cat.lan@hotmail.com', NULL, '$2y$10$lZZly.N5K/m7NYKek1C5k.gX4W5zSfhesmSl4hv3DMzMMWz4tXTui', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(13, 'duong.nuong', 'Chị. Chiêm Hoàn Hiếu', '(0128) 860 4079', 'bich.tra@yahoo.com', NULL, '$2y$10$.m6CjZCILZBtrMf3pRJLUeusg9sJfO8T84rTf9bRLRSiO3nkpm4n2', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(14, 'dam.khanh', 'Chú. Lều Đạo', '84-64-029-5287', 'hinh.truc@pham.mil.vn', NULL, '$2y$10$OVGTRxvyi4e38vJ8EsLIxu4zCEuzyeThpOddMHikqhnN1swnkbD5O', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(15, 'au.quyen', 'Giáp Lưu Mỹ', '0164-697-7334', 'ltao@yahoo.com', NULL, '$2y$10$Cs7fKN.0n1b2pXnOsbYGSOpTyW1LdeM0gU9pJza9Oqxh0kU7rU31.', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(16, 'mung', 'Em. Giang Giang', '84-510-544-3598', 'que99@dam.biz', NULL, '$2y$10$FAGHRQasVSyI5Xd2qPvNbOhhm.Fsolm/B4A6NG5KvPiaY26/hzAMa', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(17, 'kau', 'Chị. Đường Nhung', '(053) 742 1919', 'bao95@hotmail.com', NULL, '$2y$10$2zaxBtJzXYrfZ48nAM/FzO/Ln3swZiswgtPVBSmUcuowwh0ZuTZqm', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(18, 'ly.le', 'Em. Trịnh Sinh', '84-231-980-6846', 'mach.viet@gmail.com', NULL, '$2y$10$QxCEI9HjQyYo6tSEcbqaLuNIxP5wtlG.z7.BLdDQS/q7RhlXYbu/.', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(19, 'nhien.hy', 'Cung Diệp Liên', '(84)(38)660-8677', 'doan.nghi@yahoo.com', NULL, '$2y$10$KLMOjovyv73PW8mOzHZLTex2KEr91vU2EvTpY0X6wcySgaGWwumNu', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(20, 'can.trang', 'Bác. Bạch Trung', '0121-541-6153', 'tan.trang@hua.mil.vn', NULL, '$2y$10$XKsVHtyd2m/QqMeJS2hA7Oi7MBAdNUmPe6rVWyeEmiQSXqr/mMr5K', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(21, 'edoan', 'Ngụy Linh', '076-730-1214', 'duong.phi@hotmail.com', NULL, '$2y$10$V5IUWe431Ra7boCLn0GbeusvnpI24Po41106Leh6UjeiNiA/eXmpe', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(22, 'thien62', 'Thập Băng', '(84)(54)273-8504', 'cuong94@hotmail.com', NULL, '$2y$10$LiP4RHInWMYynEmwY5La.O9jGYb5QgD0LwRdmh7GY/zuIIFgVC4ma', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(23, 'ekhuat', 'Chu Thùy', '(84)(320)352-3526', 'vong68@gmail.com', NULL, '$2y$10$tNhmimwTHYRe75iBMDWB/OkztwPcZtz.pd.AqFBXdjXyqLPfO1p/O', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(24, 'qau', 'Cụ. Danh Đình Giang', '(0164) 242 3712', 'pho.tham@lu.info.vn', NULL, '$2y$10$JCLfR3OfaZbe2Vi/vHsBPOqymWyyRSST1wkRFXdaa6/rdflAz74lm', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(25, 'khau.sang', 'Chú. Bùi Diệp', '+84-218-841-0218', 'khuyen.khuc@uong.edu.vn', NULL, '$2y$10$fL1/pELcN4P8jjjXg2GzwOgYxmzNnyU/fcR/inPSaeMu6wkajXuwK', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(26, 'tien40', 'Cụ. Giả Phúc', '0167-310-7956', 'sthieu@bien.com', NULL, '$2y$10$p.gDpluzpAIxGfQMAEhpNeadpm04vlpzsvlKwELyKAN9waMSK9AZC', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(27, 'mai.nguyen', 'Khâu Bích Khuyên', '+84-97-214-9479', 'khanh.bi@trieu.info', NULL, '$2y$10$bF.bh0iCupy5P6DkgqFYGOFkiRxAhMctIIyS5bvbe8KvyiITCxjam', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(28, 'cat.triet', 'Đan Chiến Thọ', '+84-62-332-4155', 'jkim@cung.biz.vn', NULL, '$2y$10$FldJzvfRuwmdi2FlOJ6fGODJp4cfOyiI4op4QelCQcFvhowxoVu1W', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(29, 'giang.thac', 'Bà. Ninh Tâm Lam', '090-233-0025', 'phung.giap@dao.com', NULL, '$2y$10$2XOTMELCvr36SOxKbPteaOCTBa011kUqf1SxobXlnJf4O5XfnHU2y', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:53', '2023-05-30 13:08:53'),
	(30, 'tu.ninh', 'Chiêm Triều', '093 303 6093', 'trong24@yahoo.com', NULL, '$2y$10$Y.ezyLfIoIFVA30eXIb2cugn0Kj9OdSlUqwpe0TJLkxfhSEglxSsK', 1, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:54', '2023-05-30 13:08:54'),
	(31, 'minhlong', 'Nguyen Vu Minh Long', '0705564567', 'josephminhlong@gmail.com', NULL, '$2y$10$Bug2kGq3/jSteAVPgphla.6AQWZrBYkGQczhD2Yoziei4lHoGDpo.', 0, 'thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png', '', NULL, '2023-05-30 13:08:52', '2023-05-30 13:08:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
