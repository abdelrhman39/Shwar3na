-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 06:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdelrah_shwar3nadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `facbook` varchar(150) NOT NULL,
  `instgram` varchar(150) NOT NULL,
  `whatsApp` varchar(20) NOT NULL,
  `about_data` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `name`, `email`, `phone`, `address`, `facbook`, `instgram`, `whatsApp`, `about_data`, `updated_at`) VALUES
(1, 'shwar3na', 'shwar3na@gmail.com', '98786', 'شارع مصطفي كامل', '#', '#', '#', 'شوراعنا الاصل والباقي تفصيل', '2021-12-29 15:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE `apply_job` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'عربيات', '17781617521622295057.png', '2021-05-29 18:30:57', '2021-06-17 02:23:23'),
(2, 'ملابس', '2517407031624071653.jpg', '2021-06-17 02:21:47', '2021-06-19 08:00:53'),
(4, 'تعليمي', '11627193231624990347.jpg', '2021-06-29 23:12:27', '2021-06-29 23:12:27'),
(5, 'مصالح حكومية', '7690961801629369305.png', '2021-08-19 15:35:05', '2021-08-19 15:35:05'),
(6, 'ألعاب', '17937696441629373299.png', '2021-08-19 16:41:39', '2021-08-19 16:41:39'),
(7, 'فل الفل', '14915517981632169081.jpg', '2021-09-21 01:18:01', '2021-09-21 01:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bani-suef', '2021-05-07 23:46:09', '2021-05-07 23:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `place_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(2550) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `requirment_job` varchar(2500) NOT NULL,
  `jobCat_id` int(11) DEFAULT NULL,
  `sallary` varchar(250) NOT NULL,
  `is_active` int(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `place_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `email`, `count`, `end_date`, `type`, `image`, `requirment_job`, `jobCat_id`, `sallary`, `is_active`, `user_id`, `place_id`, `created_at`, `updated_at`) VALUES
(5, 'Shyann', 'Illo sit mollitia. Omnis et recusandae asperiores dolore ducimus sit. Cumque porro asperiorescorrupti dolorem nulla laborum.', 'your.email+fakedata50961@gmail.com', 513, '2022-11-25', 'دوام كامل', '61c8704ce41372.65639630.png', 'Global Security Technician', 1, '890', 0, 24, 1, '2021-12-26 13:37:21', '2021-12-26 13:38:20'),
(6, 'Eli', 'Non error sed cupiditate est dolor qui odit similique. Hic voluptatem veniamblanditiis quia.', 'your.email+fakedata95311@gmail.com', 601, '2021-05-17', 'دوام كامل', '61c878a35ae3a2.85349139.png', 'Dynamic Assurance Liaison', 1, '893', 0, 24, 1, '2021-12-26 13:43:27', '2021-12-26 14:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'هندسه', '2021-12-26 13:36:20', '2021-12-26 13:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `subCity_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2018_11_06_222923_create_transactions_table', 1),
(4, '2018_11_07_192923_create_transfers_table', 1),
(5, '2018_11_07_202152_update_transfers_table', 1),
(6, '2018_11_15_124230_create_wallets_table', 1),
(7, '2018_11_19_164609_update_transactions_table', 1),
(8, '2018_11_20_133759_add_fee_transfers_table', 1),
(9, '2018_11_22_131953_add_status_transfers_table', 1),
(10, '2018_11_22_133438_drop_refund_transfers_table', 1),
(11, '2019_05_13_111553_update_status_transfers_table', 1),
(12, '2019_06_25_103755_add_exchange_status_transfers_table', 1),
(13, '2019_07_29_184926_decimal_places_wallets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_10_02_193759_add_discount_transfers_table', 1),
(16, '2020_10_30_193412_add_meta_wallets_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_coupons`
--

CREATE TABLE `orders_coupons` (
  `id` int(11) NOT NULL,
  `discounts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_don` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_don`
--

CREATE TABLE `orders_don` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_number` varchar(2500) NOT NULL,
  `type` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_don`
--

INSERT INTO `orders_don` (`id`, `order_id`, `user_id`, `order_number`, `type`, `address`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 26, '61c9f705d50291433301055', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', 'cancel', '2021-12-27 15:25:56', '2021-12-28 08:37:10'),
(2, 2, 26, '61c9f7afc58f91123118459', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-27 15:28:26', '2021-12-27 15:28:26'),
(3, 3, 26, '61c9f7afc58f91123118459', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-27 15:28:27', '2021-12-27 15:28:27'),
(4, 4, 26, '61c9f885d67751639929789', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-27 15:31:55', '2021-12-27 15:31:55'),
(5, 5, 26, '61c9f8e3ea1721042566182', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-27 15:33:28', '2021-12-27 15:33:28'),
(6, 6, 26, '61c9f9dfdc07c418381087', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-27 15:37:41', '2021-12-27 15:37:41'),
(7, 7, 26, '61cae5f4339241861632083', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-28 08:24:58', '2021-12-28 08:24:58'),
(8, 8, 26, '61caebca4542c1013558492', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', 'cancel', '2021-12-28 08:50:20', '2021-12-28 08:52:13'),
(9, 9, 26, '61cafda63a270191590593', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-28 10:06:05', '2021-12-28 10:06:05'),
(10, 10, 26, '61cb4033cd0081844100256', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-28 14:50:02', '2021-12-28 14:50:02'),
(11, 11, 26, '61cc62c5d40e31095857224', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-29 11:29:48', '2021-12-29 11:29:48'),
(12, 12, 26, 'b7fc9c0f-5fe7-4101-b556-8b36d4ade7ad', 'product', 'ش مصطفي كامل ,ش عبدالسلام عارف, برج وبالوالدين احسانا الدور الثالث ,بني سويف', '', '2021-12-29 12:59:27', '2021-12-29 12:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_don` int(11) NOT NULL DEFAULT '0',
  `place_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `product_id`, `user_id`, `quantity`, `order_don`, `place_id`, `created_at`, `updated_at`) VALUES
(1, 9, 26, 1, 1, 1, '2021-12-27 12:37:46', '2021-12-27 15:25:57'),
(2, 9, 26, 1, 1, 1, '2021-12-27 15:27:40', '2021-12-27 15:28:27'),
(3, 9, 26, 1, 1, 1, '2021-12-27 15:28:07', '2021-12-27 15:28:27'),
(4, 9, 26, 1, 1, 1, '2021-12-27 15:31:39', '2021-12-27 15:31:56'),
(5, 9, 26, 1, 1, 1, '2021-12-27 15:33:14', '2021-12-27 15:33:29'),
(6, 9, 26, 3, 1, 1, '2021-12-27 15:37:28', '2021-12-27 15:37:41'),
(7, 9, 26, 3, 1, 1, '2021-12-28 08:24:37', '2021-12-28 08:24:58'),
(8, 9, 26, 1, 1, 1, '2021-12-28 08:32:15', '2021-12-28 08:50:21'),
(9, 9, 26, 1, 1, 1, '2021-12-28 10:05:54', '2021-12-28 10:06:05'),
(10, 9, 26, 1, 1, 1, '2021-12-28 14:13:36', '2021-12-28 14:50:02'),
(11, 9, 26, 1, 1, 1, '2021-12-29 11:29:38', '2021-12-29 11:29:48'),
(12, 9, 26, 1, 1, 1, '2021-12-29 12:48:03', '2021-12-29 12:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `title`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'البلاتيني', 'الاشتراك شهري', 3500, 1500, '2021-06-19 03:04:27', '2021-08-19 15:37:42'),
(2, 'الذهبي', 'الاشتراك شهري', 1499, 750, '2021-06-19 03:04:27', '2021-06-19 03:04:27'),
(3, 'البلاتيني', 'الاشتراك شهري', 3500, 1500, '2021-06-19 03:04:27', '2021-06-19 03:04:27'),
(4, 'الذهبي', 'الاشتراك شهري', 1499, 750, '2021-06-19 03:04:27', '2021-06-19 03:04:27'),
(5, 'الفضى', 'الاشتراك شهري', 499, 350, '2021-06-19 03:04:27', '2021-06-19 03:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE `package_details` (
  `id` int(11) NOT NULL,
  `text` varchar(150) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abdelrhmanatwa39@gmail.com', 'Vvt6mJT8atwwOSG8QPwJK3t86gMMUhs1ngJ2C9OuDR3hyesi4O1zqYomAZVWgLBK', '2021-12-26 07:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(150) DEFAULT NULL,
  `name_en` varchar(150) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `price_range` varchar(150) NOT NULL,
  `website` varchar(150) DEFAULT NULL,
  `Facebook` varchar(150) DEFAULT NULL,
  `Twitter` varchar(150) DEFAULT NULL,
  `Instagram` varchar(150) DEFAULT NULL,
  `WhatsApp` varchar(20) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `360Image` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `Category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `features` int(11) NOT NULL DEFAULT '0',
  `state` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name_ar`, `name_en`, `logo`, `cover`, `description`, `phone`, `email`, `address`, `latitude`, `longitude`, `price_range`, `website`, `Facebook`, `Twitter`, `Instagram`, `WhatsApp`, `video`, `360Image`, `views`, `location_id`, `Category_id`, `user_id`, `features`, `state`, `created_at`, `updated_at`) VALUES
(1, 'abdelrhman Hassan', 'abdelrhman Hassan', '16714285421640524047.PNG', '19511311811640524047.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '+20122078648', 'abdelrhmanatwa39@gmail.com', 'Explicabo Corrupti', 30.258, 30.258, '200', 'http://shwar3na.com/', 'https://www.facebook.com/abd.elrhman.39/', NULL, NULL, '0122078648', NULL, NULL, 20, NULL, 5, 24, 0, 'accept', '2021-12-26 13:07:27', '2021-12-28 11:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `place_category`
--

CREATE TABLE `place_category` (
  `id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `place_discounts`
--

CREATE TABLE `place_discounts` (
  `id` int(11) NOT NULL,
  `text` varchar(250) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `old_price` int(11) DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL,
  `expired_date` varchar(250) NOT NULL,
  `used` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `place_gallary`
--

CREATE TABLE `place_gallary` (
  `id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `uploads` varchar(255) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `place_gallary`
--

INSERT INTO `place_gallary` (`id`, `place_id`, `uploads`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, '20902847281640524047.PNG', 'image', '2021-12-26 11:07:27', '2021-12-26 11:07:27'),
(2, 1, '21407987451640524048.PNG', 'image', '2021-12-26 11:07:28', '2021-12-26 11:07:28'),
(3, 1, '12502253801640524048.png', 'image', '2021-12-26 11:07:28', '2021-12-26 11:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `place_tags`
--

CREATE TABLE `place_tags` (
  `id` int(11) NOT NULL,
  `text` varchar(150) NOT NULL,
  `place_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `place_time`
--

CREATE TABLE `place_time` (
  `id` int(11) NOT NULL,
  `date_en` varchar(80) NOT NULL,
  `date_ar` varchar(50) NOT NULL,
  `date_id` int(11) NOT NULL,
  `timeFrom` varchar(50) NOT NULL,
  `timeTo` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `old_price` float NOT NULL,
  `new_price` float DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `Equip` varchar(250) NOT NULL,
  `is_active` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `main_image`, `old_price`, `new_price`, `rate`, `place_id`, `Equip`, `is_active`, `created_at`, `updated_at`) VALUES
(9, 'Valentine Rutherford', 'Qui ipsum autem nam dolores fuga iste. Mollitia harum qui animi quia molestiae quae. Natus est dicta amet dicta nostrum dolores soluta earum quis.', '16432520761640603324.PNG', 178, 54, 2, 1, '5', 1, '2021-12-27 11:08:43', '2021-12-27 09:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(13, '1158502331640603324.PNG', 9, '2021-12-27 09:08:44', '2021-12-27 09:08:44'),
(14, '16616877301640603324.PNG', 9, '2021-12-27 09:08:44', '2021-12-27 09:08:44'),
(15, '20978949681640603324.PNG', 9, '2021-12-27 09:08:44', '2021-12-27 09:08:44'),
(16, '339222341640603324.PNG', 9, '2021-12-27 09:08:44', '2021-12-27 09:08:44'),
(17, '20463235991640603325.PNG', 9, '2021-12-27 09:08:45', '2021-12-27 09:08:45'),
(18, '15812714891640603325.PNG', 9, '2021-12-27 09:08:45', '2021-12-27 09:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rate` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `indexOf` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category_id`, `indexOf`, `created_at`, `updated_at`) VALUES
(1, 'اطفالي', 2, 0, '2021-12-26 11:29:40', '2021-12-26 11:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `subcity`
--

CREATE TABLE `subcity` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcity`
--

INSERT INTO `subcity` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'مدينة بني سويف', 1, '2021-05-07 23:46:28', '2021-06-29 23:28:47'),
(2, 'ببا', 1, '2021-06-28 06:56:00', '2021-06-28 06:56:00'),
(3, 'الفشن', 1, '2021-06-29 23:27:18', '2021-06-29 23:27:18'),
(4, 'سمسطا', 1, '2021-06-29 23:27:35', '2021-06-29 23:27:35'),
(5, 'ناصر', 1, '2021-06-29 23:28:06', '2021-06-29 23:28:06'),
(6, 'الواسطي', 1, '2021-06-29 23:28:22', '2021-06-29 23:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `twitter` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `comment`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 24, 'شركه جميله جدااا اووي والسايت ممتاز جامد جدا فحت', 0, '2021-12-27 11:39:19', '2021-12-27 11:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('deposit','withdraw') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT '0',
  `fee` decimal(64,0) NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `password_code` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `subCity_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `state` varchar(150) NOT NULL DEFAULT 'state',
  `firebase_token` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `password_code`, `image`, `subCity_id`, `address`, `latitude`, `longitude`, `state`, `firebase_token`, `created_at`, `updated_at`) VALUES
(11, 'tasneem', 'tasneemelgarhy4@gmail.com', '01555347774', '$2y$10$D6/7FYjrt37BgrpRsNtF0eDeYx2yeLTa1WaIO2soojM2XCxIL5.fO', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-08-14 01:11:41', '2021-09-20 20:27:09'),
(12, 'Tasnim Mohammed', 'tasnim.mohammed99@gmail.com', '01144373501', '$2y$10$AzLBo5Q.bXprTEY1RNnFmeKGt0vlcZuOHFJXtxTVwSuTZFr.hLGe.', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-08-14 06:28:06', '2021-08-14 04:28:06'),
(13, 'عمر كمال', '3omar5600@gmail.com', '01065890653', '$2y$10$aaBh6T/ePpqM369/x86KyenoZxRC.Pu4N5Q3R.HdmKmkuMvmsitl2', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-08-14 21:11:05', '2021-08-14 19:11:05'),
(14, 'Ahmed Gamal', 'jmmy4451@gmail.com', '010995763516', '$2y$10$3f5HKEt5bD3pc58el37oh.52utrRa5VIAs8Xp.uMe8ToHWHxckAgK', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-08-14 23:47:20', '2021-08-14 21:47:20'),
(15, 'Raghda Hassan', 'raghdahassan79@gmail.com', '01121586238', '$2y$10$ZMHhIncPRHIeEJRSZLKAQew532LEYWrEDulOUHi/8dk7FIiRpy8Z.', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-09-21 03:35:20', '2021-09-23 08:47:30'),
(16, 'Fatma Mayani', 'fatmamayani36@gmail.com', '01030697068', '$2y$10$plI9NJcWu3iN/sMz7OrNMOPYImDGdX7DmLLOYrMLXNK.SfHorec2O', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-09-21 18:59:03', '2021-09-21 16:59:04'),
(17, 'عبد الرحمن محمد', 'omar29018898@gmail.com', '01112101740', '$2y$10$eMd47xsP.utT7KCmpBSD0ecW0iAMaPEIar2dJ3s5V3bABJbtNczla', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-09-23 21:46:20', '2021-09-23 19:46:20'),
(18, 'dina Mahfouz', 'dinamahfouzz1@gmail.com', '01068833962', '$2y$10$nE9eBXflNSC5die7e2aLVuKvPnk3drbfanuYPOD59DLSIbzxbZmXS', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-09-23 21:53:37', '2021-09-23 19:53:37'),
(19, 'احمد جمال', 'essrraossaamma@gmail.com', '015555555555', '$2y$10$p3Uyvu/ckvLt3z54ICZUPOQXI.W2NnxNgSyn.LApEJ9h.FEVUrmRK', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-09-23 22:19:16', '2021-09-23 20:19:16'),
(20, 'محمد مريد', 'momored047@gmail.com', '01065890659', '$2y$10$LE50SFC57fP2QB4UrJa6OuS.PL8koE3XmtiWxAkagNZY.lYragqFO', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-09-23 22:44:01', '2021-09-23 20:44:01'),
(21, 'Omar kamal', 'omar@gmail.com', '01003362358', '$2y$10$z0z8P3hHZtck7tJ2VRjUpOdiBKXaV0saVw4WraB0NMMxoZH92bpVi', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-10-06 06:25:08', '2021-10-06 04:25:09'),
(22, 'abdelrahman.mohammed', 'abdelrahman.mohammed@shwar3na.com', '1319393', '$2y$10$NDz5qbwj6AdgbEUDiWd2qOddz5kuPGdym./bgS0CGCYUGZWU4QlEy', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-11-25 06:59:07', '2021-11-25 04:59:07'),
(23, 'Abdelrahman Mohammed', 'eng.a.moham6med89@gmail.com', '01007325826', '$2y$10$yvjvaS2wOPp8eWqDuzBV0OLGgwgZwWhpt91JQ./EYFj5vapcmn2gO', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-11-30 01:26:37', '2021-11-29 23:26:37'),
(24, 'abdelrhman Hassan', 'abdelrhmanatwa39@gmail.com', '01224078648', '$2y$10$8ZS/yfH4Hw/RJT9lfwbpQu56xI/4OMC2Fv3Iy/GCJT1dUxPuccaDO', NULL, '61c99f74a04b89.08065256.png', 1, 'Possimus beatae omn', NULL, NULL, 'accept', NULL, '2021-12-03 00:27:51', '2021-12-27 09:11:48'),
(25, 'abdo', 'abdo@gmail.com', '0122078642', '$2y$10$XcScYQ7aLL7zgaJu7XDHjugX1ivaK6czOCfgTF7SfOTT9pfYxLW3O', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-12-07 13:43:34', '2021-12-07 11:43:34'),
(26, 'abdelrhman Hassan', 'abdelrhman.hassan510@gmail.com', '01222078648', '$2y$10$tPaVj99avInRQcyYbeZPN.R4ojJ5WILn86CJoYj4LGsIsgon9HprW', NULL, 'img.png', 1, NULL, NULL, NULL, 'accept', NULL, '2021-12-14 15:07:29', '2021-12-23 11:07:27'),
(38, 'alish', 'alish@hassan.com', NULL, '$2y$10$WvWM1DxZSJcrvKuK.xYFBOvEiYxsu2G9nLglGP2aHILnFF/Fe3bbq', NULL, NULL, NULL, NULL, NULL, NULL, 'state', NULL, '2021-12-25 21:29:22', '2021-12-25 21:29:22'),
(39, 'alish', 'alish@hassan.com', NULL, '$2y$10$9wjkNgTVzshZXyY0oAM/s.V1GlfdSrp79o0snppWK7eOAysalMsSC', NULL, NULL, NULL, NULL, NULL, NULL, 'state', NULL, '2021-12-25 21:29:22', '2021-12-25 21:29:22'),
(40, 'alish', 'alish@hassan.com', NULL, '$2y$10$kKLC0m7wEICdgZP.cOcyKuDqxkd6sQqFqWMpb1n0uLlbQGLMCIrJC', NULL, NULL, NULL, NULL, NULL, NULL, 'state', NULL, '2021-12-25 21:29:23', '2021-12-25 21:29:23'),
(41, 'alish', 'alish@hassan.com', NULL, '$2y$10$4/fBvDu4e.uJ.BomD349J.mzU16WYx8QglBR3BYSc0X47Xck3pyNa', NULL, NULL, NULL, NULL, NULL, NULL, 'state', NULL, '2021-12-25 21:29:23', '2021-12-25 21:29:23'),
(42, 'alish', 'alish@hassan.com', NULL, '$2y$10$sRPhWzAAtVw/iLkfejujauA9wMCdrR3mqSGwZso6Y4ftbqb1Bvq7W', NULL, NULL, NULL, NULL, NULL, NULL, 'state', NULL, '2021-12-25 21:29:23', '2021-12-25 21:29:23'),
(43, 'alish', 'alish@hassan.com', NULL, '$2y$10$fE1d1dzD1xO3rGAoJzaiAeVzpSmL3z9FOUKOtCDgKm/59wBGk4XZ.', NULL, NULL, NULL, NULL, NULL, NULL, 'state', NULL, '2021-12-25 21:29:23', '2021-12-25 21:29:23'),
(44, 'alish', 'alish@hassan.com', NULL, '$2y$10$cGcGixUESKfL4yXu9/p.FeUV.LK3HSTdchIbtNV05RJCxlLtnpcg2', NULL, NULL, NULL, NULL, NULL, NULL, 'state', NULL, '2021-12-25 21:29:23', '2021-12-25 21:29:23'),
(45, 'alish', 'alish@hassan.com', NULL, '$2y$10$kUfQoHVJY9H5j0rrNLV0KuefZE0DB4T0rwa50dFG8BNEejgeyz3EG', NULL, NULL, NULL, NULL, NULL, NULL, 'state', NULL, '2021-12-25 21:29:24', '2021-12-25 21:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `address` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `Latitude` float DEFAULT NULL,
  `Longitude` float DEFAULT NULL,
  `floar_num` int(11) DEFAULT NULL,
  `Apartment_num` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(26, '3', 11, '2021-09-23 22:14:17', '2021-09-23 20:14:17'),
(27, '2', 19, '2021-09-23 22:19:16', '2021-09-23 20:19:16'),
(28, '3', 19, '2021-09-23 22:22:47', '2021-09-23 20:22:47'),
(29, '3', 16, '2021-09-23 22:37:43', '2021-09-23 20:37:43'),
(30, '2', 20, '2021-09-23 22:44:01', '2021-09-23 20:44:01'),
(31, '3', 20, '2021-09-23 22:46:07', '2021-09-23 20:46:07'),
(32, '2', 21, '2021-10-06 06:25:08', '2021-10-06 04:25:09'),
(33, '2', 23, '2021-11-30 01:26:37', '2021-11-29 23:26:37'),
(34, '3', 12, '2021-12-03 00:04:42', '2021-12-02 22:04:42'),
(35, '2', 25, '2021-12-07 13:43:34', '2021-12-07 11:43:34'),
(36, '2', 26, '2021-12-14 15:07:29', '2021-12-14 13:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `balance` decimal(64,0) NOT NULL DEFAULT '0',
  `decimal_places` smallint(6) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobCat_id` (`jobCat_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subCity_id` (`subCity_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_coupons`
--
ALTER TABLE `orders_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discounts_id` (`discounts_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders_don`
--
ALTER TABLE `orders_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_id_2` (`order_id`),
  ADD KEY `user_id_order` (`user_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `pro_relation` (`place_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subCategory_id` (`Category_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `place_category`
--
ALTER TABLE `place_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `subcat_id` (`subcat_id`);

--
-- Indexes for table `place_discounts`
--
ALTER TABLE `place_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `place_gallary`
--
ALTER TABLE `place_gallary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `place_tags`
--
ALTER TABLE `place_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `place_time`
--
ALTER TABLE `place_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `subcity`
--
ALTER TABLE `subcity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_uuid_unique` (`uuid`),
  ADD KEY `transactions_payable_type_payable_id_index` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_ind` (`payable_type`,`payable_id`,`type`),
  ADD KEY `payable_confirmed_ind` (`payable_type`,`payable_id`,`confirmed`),
  ADD KEY `payable_type_confirmed_ind` (`payable_type`,`payable_id`,`type`,`confirmed`),
  ADD KEY `transactions_type_index` (`type`),
  ADD KEY `transactions_wallet_id_foreign` (`wallet_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transfers_uuid_unique` (`uuid`),
  ADD KEY `transfers_from_type_from_id_index` (`from_type`,`from_id`),
  ADD KEY `transfers_to_type_to_id_index` (`to_type`,`to_id`),
  ADD KEY `transfers_deposit_id_foreign` (`deposit_id`),
  ADD KEY `transfers_withdraw_id_foreign` (`withdraw_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subCity_id` (`subCity_id`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_holder_type_holder_id_slug_unique` (`holder_type`,`holder_id`,`slug`),
  ADD KEY `wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  ADD KEY `wallets_slug_index` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_coupons`
--
ALTER TABLE `orders_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_don`
--
ALTER TABLE `orders_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `place_category`
--
ALTER TABLE `place_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place_discounts`
--
ALTER TABLE `place_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place_gallary`
--
ALTER TABLE `place_gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `place_tags`
--
ALTER TABLE `place_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place_time`
--
ALTER TABLE `place_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcity`
--
ALTER TABLE `subcity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD CONSTRAINT `job_id` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`jobCat_id`) REFERENCES `job_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_place` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`subCity_id`) REFERENCES `subcity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_coupons`
--
ALTER TABLE `orders_coupons`
  ADD CONSTRAINT `relation_disc_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_discounts` FOREIGN KEY (`discounts_id`) REFERENCES `place_discounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_don`
--
ALTER TABLE `orders_don`
  ADD CONSTRAINT `relation_orders` FOREIGN KEY (`order_id`) REFERENCES `orders_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_order` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `pro_relation` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_order` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_details`
--
ALTER TABLE `package_details`
  ADD CONSTRAINT `package_details_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `places_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `places_ibfk_4` FOREIGN KEY (`Category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place_category`
--
ALTER TABLE `place_category`
  ADD CONSTRAINT `place_category_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `place_category_ibfk_2` FOREIGN KEY (`subcat_id`) REFERENCES `subcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place_discounts`
--
ALTER TABLE `place_discounts`
  ADD CONSTRAINT `place_discounts_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place_gallary`
--
ALTER TABLE `place_gallary`
  ADD CONSTRAINT `place_gallary_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place_tags`
--
ALTER TABLE `place_tags`
  ADD CONSTRAINT `place_tags_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place_time`
--
ALTER TABLE `place_time`
  ADD CONSTRAINT `place_time_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcity`
--
ALTER TABLE `subcity`
  ADD CONSTRAINT `subcity_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `re_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_deposit_id_foreign` FOREIGN KEY (`deposit_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_withdraw_id_foreign` FOREIGN KEY (`withdraw_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`subCity_id`) REFERENCES `subcity` (`id`);

--
-- Constraints for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD CONSTRAINT `user_locations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
