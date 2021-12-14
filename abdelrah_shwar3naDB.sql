-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2021 at 03:30 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdelrah_shwar3naDB`
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
(1, 'شوارعنا', 'support@shwar3na.com', '0102256358', 'برج بالوالدين احسانا ش مصطفي كامل ش عبدالسلام عارف الدور الرابع بني سويف', 'https://www.facebook.com/shwar3naCo/', 'https://www.facebook.com/shwar3naCo/', '01022010690', 'شوارعنا ليست شركة عادية بل هي مساعدك المتواضع ورؤيتنا هي أن نجعل حياتك سهلة وسلسة وممتعة ، لذلك نقوم بتطوير العلاقات مع العملاء التي تحدث فرقًا إيجابيًا في حياة عملائنا. نحب أن نسمع منك ، نحن نقدر رأيك ونحترمه ، ملاحظاتك تشجعنا على المضي قدمًا وتحسين خدماتنا. إذا كان لديك أي شكوى ، فلا تتردد في الاتصال بنا.', '2021-06-19 02:44:12');

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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '0124587452', '$2y$10$byN9AnFPFMkYxRILIR/NqO4rYhDAbWcl7MmG6if2crsNnXnb6I7ya', 'img.png', '2021-05-11 01:51:06', '2021-05-16 22:43:17');

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
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
  `description` varchar(255) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `end_date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `requirment_job` text NOT NULL,
  `jobCat_id` int(11) DEFAULT NULL,
  `sallary` float NOT NULL,
  `is_active` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `email`, `count`, `end_date`, `type`, `image`, `requirment_job`, `jobCat_id`, `sallary`, `is_active`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'تعرف تعمل اي', 'تعرف تلحم تحت الماية', '3omar5600@gmail.com', 5, '2021-08-20', 'دوام كامل', '690363541629392312.jpg', 'باور', NULL, 1000, 'accept', 13, '2021-08-19 23:58:32', '2021-08-19 21:58:32'),
(4, 'تشتغل هادر ديسك', 'تسجل بيانات', '3omar5600@gmail.com', 5, '2021-09-18', 'عمل من المنزل', '19875833801632168629.jpg', 'معندكش زهايمر', NULL, 5000, 'accept', 13, '2021-09-21 03:10:29', '2021-09-21 01:10:29'),
(5, 'سيلز', 'يكتب اماكن', 'shwar3na.com@gmail.com', 0, '2021-09-25', 'تطوعى', '20300704361632409979.jpg', 'يكون فاضي', NULL, 15000, 'accept', 17, '2021-09-23 22:12:59', '2021-09-23 20:12:59');

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

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `subCity_id`, `created_at`, `updated_at`) VALUES
(1, 'الاباصيرى', 1, '2021-06-28 06:55:50', '2021-06-28 06:55:50'),
(2, 'ببا', 2, '2021-06-28 06:56:00', '2021-06-28 06:56:00'),
(3, 'الفشن', 3, '2021-06-29 23:27:18', '2021-06-29 23:27:18'),
(4, 'سمسطا', 4, '2021-06-29 23:27:35', '2021-06-29 23:27:35'),
(5, 'ناصر', 5, '2021-06-29 23:28:06', '2021-06-29 23:28:06'),
(6, 'الواسطي', 6, '2021-06-29 23:28:22', '2021-06-29 23:28:22'),
(7, 'الكورنيش', 1, '2021-08-19 15:38:25', '2021-08-19 15:38:25'),
(8, 'مقبل', 1, '2021-08-19 15:38:37', '2021-08-19 15:38:37'),
(9, 'صلاح سالم', 1, '2021-08-19 15:38:48', '2021-08-19 15:38:48'),
(10, 'الجزيرة', 1, '2021-08-19 15:38:58', '2021-08-19 15:38:58');

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

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`id`, `text`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 'كل اللي نفسك فيه', 5, '2021-08-19 15:25:45', '2021-08-19 15:25:45');

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
  `description` text NOT NULL,
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
  `location_id` int(11) NOT NULL,
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
(1, 'لاميرا', 'lameraa', '1899374031625423852.jpg', '', 'A very special resturant', '01024875326', 'lamera@gmail.com', 'كورنيش بنى سويف', 29.2587, 30.3698, '20-100', NULL, 'www.facebook.com', 'twitter.com', NULL, '01025487532', '9883028501627950589.mp4', NULL, 0, 1, 1, 1, 0, 'accept', '2021-07-05 01:37:32', '2021-08-03 00:36:05'),
(2, 'لاميرا', 'lameraa', '9891327041625455663.jpg', '16041059061625455663.jpg', 'A very special resturant', '01024875326', 'lamera@gmail.com', 'كورنيش بنى سويف', 29.2587, 30.3698, '20-100', NULL, NULL, NULL, NULL, '01025487532', NULL, NULL, 0, 1, 1, 1, 0, 'accept', '2021-07-05 10:27:43', '2021-08-17 02:08:47'),
(3, 'لاميرا', 'lameraa', '10757893401625547023.jpg', '1901010421625547023.jpg', 'A very special resturant', '01024875326', 'lamera@gmail.com', 'كورنيش بنى سويف', 29.2587, 30.3698, '20-100', NULL, NULL, NULL, NULL, '01025487532', NULL, NULL, 0, 1, 1, 1, 0, 'wait', '2021-07-06 11:50:23', '2021-08-19 17:58:13'),
(4, 'تجريبي', NULL, 'img.png', 'img.png', 'تجريبي', '01060945044', 'shop@gmail.com', 'شارع ما', 30.0562, 31.2349, '100', NULL, NULL, NULL, NULL, NULL, '15613519701631282142.mp4', NULL, 0, 1, 1, 5, 0, 'wait', '2021-07-06 13:32:54', '2021-09-10 20:55:42'),
(5, 'تجريب', NULL, 'img.png', 'img.png', 'تجريب', '01550404490', 'shop1@gmail.com', 'اى عنوان', 30.0641, 31.2973, '500', NULL, NULL, NULL, NULL, NULL, '5859387231628647923.mp4', NULL, 0, 1, 2, 5, 0, 'wait', '2021-07-06 15:33:29', '2021-08-11 09:12:03'),
(6, 'تعديل الاسم', NULL, 'img.png', 'img.png', 'تجريب محل بعد ال category', '01002237779', 'amm@gmail.com', 'شارع الاباصيري', 30.0625, 31.2441, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 2, 5, 0, 'wait', '2021-07-14 02:36:56', '2021-07-14 14:09:06'),
(7, 'friends', NULL, 'img.png', 'img.png', '0111111111111', '0111111111111', 'friends@friends.com', 'الابتصيري', 28.8939, 31.4456, '15', 'تلتلب', 'الالير', 'التا', 'تبتا', 'ابتبس', NULL, NULL, 0, 1, 1, 10, 0, 'wait', '2021-07-16 23:02:01', '2021-07-16 21:02:01'),
(8, 'محل', NULL, 'img.png', 'img.png', 'ffg', '010585858588', 'eng.a.mohammed89@gmail.com', 'gfg', 29.0498, 31.1234, '25', 'www', 'fb', 'tw', 'inst', 'dgd', '8864375101628876940.mp4', NULL, 0, 6, 1, 9, 0, 'accept', '2021-07-18 06:11:04', '2021-08-19 16:35:21'),
(9, 'والبي', NULL, 'img.png', 'img.png', 'ةىييييي', '123456787', 'HebaMuhammed22@gmail.com', 'ةليير', 30.0494, 31.2371, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 5, 0, 'wait', '2021-08-11 09:13:26', '2021-08-11 07:13:26'),
(10, 'محل', NULL, 'img.png', 'img.png', 'Abdelrahman Mohamed', '01000000000', 'eng.a.mohammed89@gmail.com', 'Abdelrahman Mohamed', 29.0714, 31.1013, '15', 'shwar', '،face', 'Twitter', 'insta', 'whatsapp', NULL, NULL, 0, 4, 1, 9, 0, 'wait', '2021-08-14 00:43:25', '2021-08-14 06:12:45'),
(11, 'jimmy', NULL, 'img.png', 'img.png', 'احنا بتوع كله', '01095763516', 'jmmy4451@gmail.com', 'الاباصيري حي الفلل', 29.0714, 31.1013, '200', NULL, NULL, NULL, NULL, '01095763516', NULL, NULL, 0, 1, 2, 14, 0, 'accept', '2021-08-14 23:50:59', '2021-08-19 16:16:19'),
(12, 'انا جامد جدا', NULL, 'img.png', 'img.png', 'مستشفى', '01065890653', 'jmmy4451@gmail.com', 'الاباصيري', 29.0714, 31.1013, '150', 'ىوىى', 'الا', 'زىوز', 'ولةو', 'ىتلبى', NULL, NULL, 0, 2, 5, 14, 0, 'accept', '2021-08-19 18:08:27', '2021-08-19 16:13:54'),
(13, 'اي حاجة', NULL, 'img.png', 'img.png', 'محل اي حاجة', '01095763516', 'jmmy4451@gmail.com', 'محل اي حاجة', 29.0711, 31.1015, '250', NULL, NULL, NULL, NULL, '01095763516', NULL, NULL, 0, 8, 5, 14, 0, 'wait', '2021-08-19 18:31:04', '2021-08-19 16:31:04'),
(14, 'كشك', 'booth', '6267099681629373471.jpg', '13438847101629373471.jpg', 'سشلفيشبشسب يثسش', '01288671381', 'mahmoudkotb44@gmail.com', 'سشبشسيشب', 30.258, 30.258, 'شسبشسيبشيبس', NULL, 'شيسلسشي', 'شيبلشسبي', 'شيبشس', '0101065890653', NULL, NULL, 0, 1, 2, 14, 0, 'accept', '2021-08-19 18:44:31', '2021-08-19 16:44:31'),
(15, 'g', NULL, 'img.png', 'img.png', 'g', '555555555555', 'g@g.com', 'g', 29.0711, 31.1015, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 6, 6, 14, 0, 'wait', '2021-08-19 18:44:51', '2021-08-19 16:44:51'),
(16, 'fjdndb', NULL, 'img.png', 'img.png', 'so hkshsnfn', '01016184', 'ghggj@gmail.com', 'hfalfj', 29.0714, 31.1013, '9446', 'nznavdk', 'bsnfnssk', 'bsks fcmsl', 'ksjxbf', 'nzbsvfkcj', NULL, NULL, 0, 4, 4, 13, 0, 'wait', '2021-08-19 23:52:49', '2021-08-19 21:52:49'),
(17, 'تجريب صورة', NULL, '12279038121631340497.jpg', '14083668931631340497.jpg', 'تلبييؤ', '01060945044', 'hebamuhammed22@gmail.com', 'ناريي', 30.0494, 31.2371, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 5, 0, 'wait', '2021-09-11 13:08:17', '2021-09-11 11:08:17'),
(18, 'تحريبي', NULL, '5415964021631400226.jpg', '17824986531631400226.jpg', 'وؤووؤوؤووؤو', '01060945044', 'hebamuhammed22@gmail.com', 'ؤووؤوءووءووءوذووء', 30.0494, 31.2371, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 2, 5, 0, 'wait', '2021-09-12 05:43:46', '2021-09-12 03:43:46'),
(19, 'ناةىر', NULL, '12517794331631402667.jpg', '18941707691631402667.jpg', 'و ورترنبهيتيتر', '01060945044', 'hebamuhammed22@gmail.com', 'كاملنؤتيببب', 30.0494, 31.2371, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, 2, 5, 0, 'wait', '2021-09-12 06:24:27', '2021-09-12 04:24:27'),
(20, 'تلبسىزنةررر', NULL, '10115396391631402925.jpg', '7732887521631402925.jpg', 'زةترنىاؤتىنىىةةنن', '01060945044', 'hebamuhammed22@gmail.com', 'كامانرربلات', 30.0494, 31.2371, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, 5, 5, 0, 'wait', '2021-09-12 06:28:45', '2021-09-12 04:28:45'),
(21, 'تحريبي', NULL, '5434471441631449038.jpg', '10043561971631449038.jpg', 'تيست', '01060945044', 'HebaMuhammed22@gmail.com', 'تيست لوكيشن', 29.0733, 31.0841, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 2, 5, 0, 'wait', '2021-09-12 19:17:18', '2021-09-12 17:17:18'),
(22, 'Coffee INN', NULL, '803906861632168196.jpg', '6265238401632168196.jpg', 'اجمد حاجه ممكن تشربها عندنا', '01065890653', 'coffeeinn2021@gmail.com', 'شرق النيل و اوعا تغرق', 29.0577, 31.1222, '150', NULL, NULL, NULL, NULL, NULL, '14552419641632168703.mp4', NULL, 0, 7, 5, 13, 0, 'accept', '2021-09-21 03:03:16', '2021-09-21 01:21:47'),
(23, 'محل من الجهاز', 'Store from the device', '17651561461632169615.jpg', '6826401941632169615.jpg', 'اللي نفسك فيه هتلاقيه', '01112101740', 'omar.kamal@shwar3na.com', 'بني سويف', 30.258, 30.258, 'رمن اتبشايسيهر', NULL, NULL, NULL, NULL, '01112101740', NULL, NULL, 0, 7, 7, 13, 0, 'accept', '2021-09-21 03:26:55', '2021-09-21 01:26:55'),
(24, 'ده و ده', NULL, '20849597141632409354.jpg', '5902146671632409354.jpg', 'ووووووووو', '0000000000000', 'Eng.A.Mohammed89@gmail.com', 'نانانان', 29.0647, 31.109, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, 2, 17, 0, 'wait', '2021-09-23 22:02:34', '2021-09-23 20:02:34'),
(25, 'يونس', NULL, '18420132681632410057.jpg', '38575681632410057.jpg', 'اكسيسوريز المرءه العصريه', '01111111111', 'shwar3na@gmail.com', 'شارع الحاجرى', 29.0799, 31.1059, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 7, 11, 0, 'wait', '2021-09-23 22:14:17', '2021-09-23 20:14:17'),
(26, 'ji mmy', NULL, '11895095021632410567.jpg', '3985238531632410567.jpg', 'بتبيع اي حاجه ف اي وقت', '01098653245', 'jmmy4451@gmail.com', 'الاباصيري', 29.0683, 31.0954, '1800', 'وووةةةةةة', 'ااااا', 'اوووووو', 'وووةةة', 'ةةةةةةةةةةةةة', NULL, NULL, 0, 10, 5, 19, 0, 'wait', '2021-09-23 22:22:47', '2021-09-23 20:22:47'),
(27, 'عمر وجيمي', NULL, '1614679741632410970.jpg', '21361174261632410970.jpg', 'abcdefghijklmn', '01576768598', 'yafajajbddkdm@gmail.com', 'نينيميةيميمؤوؤ', 29.0652, 31.102, '222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 8, 7, 11, 0, 'wait', '2021-09-23 22:29:30', '2021-09-23 20:29:30'),
(28, 'Jimmy brand', NULL, '3397961231632411128.jpg', '6474270561632411128.jpg', 'محل يتمتع بالجودة والتميز', '01095763516', 'jmmy4451@gmail.com', 'الاباصيري بجوار صيدليه العزيزية', 29.0714, 31.1013, '100', NULL, NULL, NULL, NULL, '01095763516', NULL, NULL, 0, 1, 2, 19, 0, 'wait', '2021-09-23 22:32:08', '2021-09-23 20:32:08'),
(29, 'ملام شوب', NULL, '2592104981632411432.jpg', '8833619931632411432.jpg', 'اجمد محل غرور', '045899556988', 'malaaaaam@gmail.com', 'ف اى مكان', 29.0846, 31.1081, '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, 6, 11, 0, 'wait', '2021-09-23 22:37:12', '2021-09-23 20:37:12'),
(30, 'Fatma Brand', NULL, '14235691851632411463.jpg', '4424845211632411463.jpg', 'لبس كاجوال ولبس مناسبات وكل القطع النادره', '01030697068', 'fatmamayani36@gmail.com', 'مسجد الاباصيري/بني سويف', 29.0687, 31.1034, '500', NULL, NULL, NULL, NULL, '٠١٠٣٠٦٩٧٠٦٨', NULL, NULL, 0, 1, 2, 16, 0, 'wait', '2021-09-23 22:37:43', '2021-09-23 20:37:43'),
(31, 'Mohamed Mored', NULL, '13850778801632411967.jpg', '3475403351632411967.jpg', 'Mohamed Mored', '0000000000000', 'momored047@gmail.com', 'Mohamed Mored', 29.0812, 31.0994, '180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, 6, 20, 0, 'wait', '2021-09-23 22:46:07', '2021-09-23 20:46:07'),
(32, 'تيمون وبومبا', NULL, '13174040791632412287.jpg', '13605410081632412287.jpg', 'انبسطي ابنك معانا ف امان ومبسوط', '01030697068', 'fatmamayani36@gmail.com', 'مسجد الاباصيري /الاباصيري', 29.0714, 31.1014, '400', NULL, NULL, NULL, NULL, '٠١٠٣٠٦٩٧٠٦٨', '12723260781633525218.mp4', NULL, 0, 1, 6, 16, 0, 'wait', '2021-09-23 22:51:27', '2021-10-06 20:00:18'),
(33, 'Nada\'s Cupid', NULL, '570142831632412789.jpg', '8665884631632412789.jpg', 'مركز كيوبيد ندى الروحاني لجلب الحبيب وتوفيق الروس في الحلال واسأل مجرب', '01288671301', 'nadacoms@gmail.com', 'ش الروضة بني سويف', 29.0658, 31.0955, '500', NULL, 'https://www.facebook.com/nadashaker11', NULL, NULL, '٠١٢٨٨٦٧١٣٨١', NULL, NULL, 0, 7, 7, 10, 0, 'wait', '2021-09-23 22:59:49', '2021-09-23 23:00:15'),
(34, 'محل واحد', NULL, '14988132941632679133.jpg', '16329963481632679133.jpg', 'bsvzvvsbznnsjsj', '01060945044', 'shoptest1@gmail.com', 'shhshhsh', 30.0434, 31.2394, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 6, 5, 5, 0, 'wait', '2021-09-27 00:58:53', '2021-09-26 22:58:53');

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

--
-- Dumping data for table `place_category`
--

INSERT INTO `place_category` (`id`, `subcat_id`, `place_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-07-05 01:37:32', '2021-07-04 23:37:32'),
(2, 4, 1, '2021-07-05 01:37:32', '2021-07-04 23:37:32'),
(3, 1, 2, '2021-07-05 10:27:43', '2021-07-05 08:27:43'),
(4, 4, 2, '2021-07-05 10:27:43', '2021-07-05 08:27:43'),
(5, 2, 2, '2021-07-05 10:27:43', '2021-07-05 08:27:43'),
(6, 1, 3, '2021-07-06 11:50:23', '2021-07-06 09:50:23'),
(7, 4, 3, '2021-07-06 11:50:23', '2021-07-06 09:50:23'),
(8, 2, 3, '2021-07-06 11:50:23', '2021-07-06 09:50:23'),
(9, 1, 4, '2021-07-06 13:32:54', '2021-07-06 11:32:54'),
(10, 2, 5, '2021-07-06 15:33:29', '2021-07-06 13:33:29'),
(11, 2, 6, '2021-07-14 02:36:56', '2021-07-14 00:36:56'),
(12, 1, 7, '2021-07-16 23:02:01', '2021-07-16 21:02:01'),
(13, 1, 8, '2021-07-18 06:11:04', '2021-07-18 04:11:04'),
(14, 1, 9, '2021-08-11 09:13:26', '2021-08-11 07:13:26'),
(15, 1, 10, '2021-08-14 00:43:25', '2021-08-13 22:43:25'),
(16, 2, 11, '2021-08-14 23:50:59', '2021-08-14 21:50:59'),
(17, 8, 12, '2021-08-19 18:08:27', '2021-08-19 16:08:27'),
(18, 11, 13, '2021-08-19 18:31:04', '2021-08-19 16:31:04'),
(19, 2, 14, '2021-08-19 18:44:31', '2021-08-19 16:44:31'),
(20, 3, 14, '2021-08-19 18:44:31', '2021-08-19 16:44:31'),
(21, 12, 15, '2021-08-19 18:44:51', '2021-08-19 16:44:51'),
(22, 5, 16, '2021-08-19 23:52:49', '2021-08-19 21:52:49'),
(23, 1, 17, '2021-09-11 13:08:17', '2021-09-11 11:08:17'),
(24, 3, 18, '2021-09-12 05:43:46', '2021-09-12 03:43:46'),
(25, 3, 19, '2021-09-12 06:24:27', '2021-09-12 04:24:27'),
(26, 8, 20, '2021-09-12 06:28:45', '2021-09-12 04:28:45'),
(27, 9, 20, '2021-09-12 06:28:45', '2021-09-12 04:28:45'),
(28, 10, 20, '2021-09-12 06:28:45', '2021-09-12 04:28:45'),
(29, 2, 21, '2021-09-12 19:17:18', '2021-09-12 17:17:18'),
(30, 3, 21, '2021-09-12 19:17:18', '2021-09-12 17:17:18'),
(31, 8, 22, '2021-09-21 03:03:16', '2021-09-21 01:03:16'),
(32, 9, 22, '2021-09-21 03:03:16', '2021-09-21 01:03:16'),
(33, 10, 22, '2021-09-21 03:03:16', '2021-09-21 01:03:16'),
(34, 11, 22, '2021-09-21 03:03:16', '2021-09-21 01:03:16'),
(35, 13, 23, '2021-09-21 03:26:55', '2021-09-21 01:26:55'),
(36, 14, 23, '2021-09-21 03:26:55', '2021-09-21 01:26:55'),
(37, 2, 24, '2021-09-23 22:02:34', '2021-09-23 20:02:34'),
(38, 3, 24, '2021-09-23 22:02:34', '2021-09-23 20:02:34'),
(39, 13, 25, '2021-09-23 22:14:17', '2021-09-23 20:14:17'),
(40, 9, 26, '2021-09-23 22:22:47', '2021-09-23 20:22:47'),
(41, 10, 26, '2021-09-23 22:22:47', '2021-09-23 20:22:47'),
(42, 14, 27, '2021-09-23 22:29:30', '2021-09-23 20:29:30'),
(43, 2, 28, '2021-09-23 22:32:08', '2021-09-23 20:32:08'),
(44, 12, 29, '2021-09-23 22:37:12', '2021-09-23 20:37:12'),
(45, 3, 30, '2021-09-23 22:37:43', '2021-09-23 20:37:43'),
(46, 12, 31, '2021-09-23 22:46:07', '2021-09-23 20:46:07'),
(47, 12, 32, '2021-09-23 22:51:27', '2021-09-23 20:51:27'),
(48, 13, 33, '2021-09-23 22:59:49', '2021-09-23 20:59:49'),
(49, 14, 33, '2021-09-23 22:59:49', '2021-09-23 20:59:49'),
(50, 8, 34, '2021-09-27 00:58:53', '2021-09-26 22:58:53'),
(51, 9, 34, '2021-09-27 00:58:53', '2021-09-26 22:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `place_discounts`
--

CREATE TABLE `place_discounts` (
  `id` int(11) NOT NULL,
  `text` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `old_price` float DEFAULT NULL,
  `new_price` float DEFAULT NULL,
  `expired_date` date NOT NULL,
  `used` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `place_discounts`
--

INSERT INTO `place_discounts` (`id`, `text`, `title`, `image`, `code`, `old_price`, `new_price`, `expired_date`, `used`, `place_id`, `created_at`, `updated_at`) VALUES
(1, 'تكا + وافل مجانى', 'خصم 10%', NULL, 'TkaW10', 1000, 800, '2020-09-30', 0, 1, '2021-08-03 07:24:17', '2021-08-03 07:26:15'),
(3, 'تكا + وافل مجانى', 'خصم 10%', NULL, 'TkaW10', 1000, 800, '2020-09-30', 0, 1, '2021-08-10 18:41:21', '2021-08-10 16:41:21'),
(4, 'خصم جامد اوى امال انت فاكر ايه', 'تجريبي 2', NULL, '#f1234', 300, 150, '2021-08-10', 0, 5, '2021-08-10 23:24:30', '2021-08-10 23:44:58'),
(5, 'اا', 'اا', NULL, 'اااا', 15, 17, '2021-08-13', 0, 8, '2021-08-14 00:56:34', '2021-08-13 22:56:34'),
(6, 'الكورنيش', 'عرض ال150', NULL, '15lamera', 300, 150, '2021-08-20', 0, 3, '2021-08-19 17:43:38', '2021-08-19 15:43:38'),
(7, 'خصم على اي حاجه و اي حاجه', 'خصم الفل', NULL, '15be', 9000, 150, '2021-08-20', 0, 12, '2021-08-19 18:11:04', '2021-08-19 16:11:04'),
(8, 'ٍِبيش', 'احسن ناس', NULL, '15669R', 1000, 2000, '2021-08-18', 0, 12, '2021-08-19 18:55:01', '2021-08-19 16:55:01'),
(9, 'تؤتصووسوسووصو', 'ويوسووس', '7997578751632114216.jpg', '50*', 200, 100, '2021-09-20', 0, 21, '2021-09-20 12:03:36', '2021-09-20 10:03:36'),
(10, 'خصم الابطال', 'رامات', '7926011191632168439.jpg', '0089', 90, 100, '2021-09-19', 0, 22, '2021-09-21 03:07:19', '2021-09-21 01:07:19'),
(11, 'خصم اي حلجه', 'خصم 10 %', NULL, '456', 1000, 90000, '2021-09-13', 0, 23, '2021-09-21 03:34:34', '2021-09-21 03:35:26'),
(12, 'nnn', 'hoo', '14326222161632170206.jpg', 'he', 976, 99, '2021-09-21', 0, 23, '2021-09-21 03:36:46', '2021-09-21 01:36:46'),
(13, 'محتاج تقتل حد هوا جاهز', 'خصم على مريد', '2391793121632409816.jpg', '123OM', 150, 200, '2021-09-25', 0, 24, '2021-09-23 22:10:16', '2021-09-23 20:10:16'),
(14, 'خصم ٥٠٪ على طلاب كلية الهندسة الذكور، وفي حالة طلبك ل ٢ هتاخدهم بريع التمن', '٥٠٪ على طلاب كلية الهندسة', '8104446711632413023.jpg', NULL, 100, 50, '2022-12-31', 0, 33, '2021-09-23 23:03:43', '2021-09-23 21:03:43'),
(15, 'تتتت', 'خصم على فاطمة', '20968241091633525046.jpg', '١٢٣', 123, 456, '2021-10-07', 0, 32, '2021-10-06 19:57:26', '2021-10-06 19:58:37');

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
(1, 1, '18808283391627950589.jpg', 'jpg', '2021-08-03 07:29:49', '2021-08-03 00:35:42'),
(2, 1, '10646363761627950589.png', 'png', '2021-08-03 07:29:49', '2021-08-03 00:35:38'),
(3, 5, '21435998471628647923.jpg', 'jpg', '2021-08-11 09:12:03', '2021-08-11 07:12:03'),
(4, 8, '17712712121628876940.jpg', 'jpg', '2021-08-14 00:49:00', '2021-08-13 22:49:00'),
(5, 8, '17994846911628876940.jpg', 'jpg', '2021-08-14 00:49:00', '2021-08-13 22:49:00'),
(6, 8, '9802744861628876940.jpg', 'jpg', '2021-08-14 00:49:00', '2021-08-13 22:49:00'),
(7, 3, '4507312541629369737.png', 'png', '2021-08-19 17:42:17', '2021-08-19 15:42:17'),
(8, 3, '18620903741629369737.jpg', 'jpg', '2021-08-19 17:42:17', '2021-08-19 15:42:17'),
(9, 3, '2174506011629369737.png', 'png', '2021-08-19 17:42:17', '2021-08-19 15:42:17'),
(10, 3, '20332554971629369737.jpg', 'jpg', '2021-08-19 17:42:17', '2021-08-19 15:42:17'),
(11, 14, '6637286221629373550.png', 'png', '2021-08-19 18:45:50', '2021-08-19 16:45:50'),
(12, 14, '15866771921629373550.jpg', 'jpg', '2021-08-19 18:45:50', '2021-08-19 16:45:50'),
(13, 14, '5878883591629373550.png', 'png', '2021-08-19 18:45:50', '2021-08-19 16:45:50'),
(14, 14, '20195254701629373550.jpg', 'jpg', '2021-08-19 18:45:50', '2021-08-19 16:45:50'),
(15, 14, '16759442551629373550.png', 'png', '2021-08-19 18:45:50', '2021-08-19 16:45:50'),
(16, 14, '10492833881629373550.jpg', 'jpg', '2021-08-19 18:45:50', '2021-08-19 16:45:50'),
(17, 14, '13916833091629373550.jpg', 'jpg', '2021-08-19 18:45:50', '2021-08-19 16:45:50'),
(18, 14, '5060678121629373550.jpg', 'jpg', '2021-08-19 18:45:50', '2021-08-19 16:45:50'),
(19, 4, '13987430321631282142.jpg', 'jpg', '2021-09-10 20:55:42', '2021-09-10 18:55:42'),
(20, 22, '2563815821632168703.jpg', 'jpg', '2021-09-21 03:11:43', '2021-09-21 01:11:43'),
(21, 32, '1642916871633525218.jpg', 'jpg', '2021-10-06 20:00:18', '2021-10-06 18:00:18'),
(22, 32, '6696762631633525218.jpg', 'jpg', '2021-10-06 20:00:18', '2021-10-06 18:00:18');

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

--
-- Dumping data for table `place_time`
--

INSERT INTO `place_time` (`id`, `date_en`, `date_ar`, `date_id`, `timeFrom`, `timeTo`, `place_id`, `created_at`, `updated_at`) VALUES
(41, 'Saturday', 'السبت', 1, '12:00', '17:00', 2, '2021-07-07 07:44:13', '2021-07-07 21:36:25'),
(42, 'Sunday', 'الحد', 2, '12:00', '17:00', 2, '2021-07-07 07:44:13', '2021-07-07 21:36:28'),
(43, 'Monday', 'الأثنين', 3, '12:00', '17:00', 2, '2021-07-07 07:44:13', '2021-07-07 21:36:31'),
(44, 'Tuesday', 'الثلاثاء', 4, '12:00', '17:00', 2, '2021-07-07 07:44:13', '2021-07-07 21:36:37'),
(45, 'Wednesday', 'الأربعاء', 5, '12:00', '17:00', 2, '2021-07-07 07:44:13', '2021-07-07 21:36:48'),
(46, 'Thursday', 'الخميس', 6, '12:00', '17:00', 2, '2021-07-07 07:44:13', '2021-07-07 21:36:55'),
(47, 'Friday', 'الجمعة', 7, '12:00', '17:00', 2, '2021-07-07 07:44:13', '2021-07-07 21:36:57'),
(48, 'Saturday', 'السبت', 1, '12:00', '17:00', 1, '2021-07-07 23:53:37', '2021-07-07 21:37:00'),
(49, 'Sunday', 'الحد', 2, '12:00', '17:00', 1, '2021-07-07 23:53:37', '2021-07-07 21:37:03'),
(50, 'Monday', 'الأثنين', 3, '12:00', '17:00', 1, '2021-07-07 23:53:37', '2021-07-07 21:37:09'),
(51, 'Tuesday', 'الثلاثاء', 4, '12:00', '17:00', 1, '2021-07-07 23:53:37', '2021-07-07 21:37:32'),
(52, 'Wednesday', 'الأربعاء', 5, '12:00', '17:00', 1, '2021-07-07 23:53:37', '2021-07-07 21:37:38'),
(53, 'Thursday', 'الخميس', 6, '12:00', '17:00', 1, '2021-07-07 23:53:37', '2021-07-07 21:37:41'),
(54, 'Friday', 'الجمعة', 7, '12:00', '17:00', 1, '2021-07-07 23:53:37', '2021-07-07 21:37:43'),
(63, 'Saturday', 'السبت', 1, '18:2', '18:2', 7, '2021-07-16 23:03:54', '2021-07-16 21:03:54'),
(64, 'Sunday', 'الحد', 2, '18:3', '18:3', 7, '2021-07-16 23:03:54', '2021-07-16 21:03:54'),
(65, 'Monday', 'الأثنين', 3, '18:3', '18:3', 7, '2021-07-16 23:03:54', '2021-07-16 21:03:54'),
(66, 'Tuesday', 'الثلاثاء', 4, '18:3', '18:3', 7, '2021-07-16 23:03:54', '2021-07-16 21:03:54'),
(67, 'Wednesday', 'الأربعاء', 5, '18:3', '18:3', 7, '2021-07-16 23:03:54', '2021-07-16 21:03:54'),
(68, 'Thursday', 'الخميس', 6, '18:3', '18:3', 7, '2021-07-16 23:03:54', '2021-07-16 21:03:54'),
(69, 'Friday', 'الجمعة', 7, '18:3', '18:3', 7, '2021-07-16 23:03:54', '2021-07-16 21:03:54'),
(70, 'Saturday', 'السبت', 1, '18:3', '18:3', 7, '2021-07-16 23:03:54', '2021-07-16 21:03:54'),
(71, 'Saturday', 'السبت', 1, '18:51', '18:51', 11, '2021-08-14 23:51:40', '2021-08-14 21:51:40'),
(72, 'Saturday', 'السبت', 1, '11:11', '23:11', 3, '2021-08-19 17:42:46', '2021-08-19 15:42:46'),
(73, 'Saturday', 'السبت', 1, '13:8', '13:8', 12, '2021-08-19 18:09:16', '2021-08-19 16:09:16'),
(74, 'Wednesday', 'الأربعاء', 5, '18:30', '18:30', 12, '2021-08-19 18:09:16', '2021-08-19 16:09:16'),
(75, 'Monday', 'الأثنين', 3, '04:44', '04:44', 22, '2021-09-21 03:29:02', '2021-09-21 01:29:02'),
(76, 'Monday', 'الأثنين', 3, '22:6', '23:6', 4, '2021-09-27 00:51:43', '2021-09-26 22:51:43'),
(77, 'Thursday', 'الخميس', 6, '17:12', '22:12', 4, '2021-09-27 00:51:43', '2021-09-26 22:51:43'),
(78, 'Sunday', 'الحد', 2, '3:42', '22:42', 4, '2021-09-27 00:51:43', '2021-09-26 22:51:43'),
(79, 'Thursday', 'الخميس', 6, '19:51', '22:51', 4, '2021-09-27 00:51:43', '2021-09-26 22:51:43');

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
  `is_active` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `main_image`, `old_price`, `new_price`, `rate`, `place_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Compoo Meals', 'Very Delisious meal', '896489451628473908.png', 100, NULL, 0, 1, 1, '2021-08-09 08:51:48', '2021-08-11 09:56:57'),
(2, 'compo sandwishes', 'very good meal', '17143989251628533032.png', 100, NULL, 0, 1, 1, '2021-08-10 01:17:12', '2021-08-09 23:17:12'),
(3, 'نبويةة', 'تبتؤةةؤةؤة', '16320404341628564784.jpg', 100, NULL, 0, 5, 1, '2021-08-10 01:44:16', '2021-08-10 23:47:40'),
(4, 'ااااا', 'اااا', '19724882411629393740.jpg', 15, NULL, 0, 8, 1, '2021-08-14 00:50:15', '2021-08-20 00:22:20'),
(5, 'gg', 'gg', '17248388131628950222.gif', 222, NULL, 0, 10, 1, '2021-08-14 21:10:22', '2021-08-14 21:10:51'),
(6, 'hkahrksh', 'hakdnsjs', '16979362481629392000.jpeg', 9497, NULL, 0, 16, 1, '2021-08-19 23:53:20', '2021-08-19 21:53:20'),
(7, 'اسم جديد', 'نابييا', '15515271021633032080.jpg', 200, NULL, 0, 4, 1, '2021-09-10 20:48:32', '2021-10-01 03:01:20'),
(8, 'compo sandwishes', 'very good meal', '13194407011631555642.png', 100, NULL, 0, 1, 1, '2021-09-14 00:54:02', '2021-09-13 22:54:02'),
(9, 'اممنينيو', 'وؤوؤووءوءووس', '6288793011632113121.jpg', 200, NULL, 0, 18, 1, '2021-09-20 11:45:21', '2021-09-20 09:45:21'),
(10, 'اجدع شباب ف الدنيا', 'مافيش ف جدعنتهم', '5515605221632168344.jpg', 0, NULL, 0, 22, 1, '2021-09-21 03:05:01', '2021-09-21 03:05:44'),
(11, 'مناديل', 'بتمسح الزعل', '14924952581632409514.jpg', 150, NULL, 0, 24, 1, '2021-09-23 22:05:14', '2021-09-23 20:05:14'),
(12, 'كيبورد', 'كيبردز', '1170277231632409593.jpg', 140, NULL, 0, 24, 1, '2021-09-23 22:06:33', '2021-09-23 20:06:33'),
(13, 'طبق اندونى', 'اكتر من رائع', '4693786361632410228.jpg', 10, NULL, 0, 25, 1, '2021-09-23 22:17:08', '2021-09-23 20:17:08'),
(14, 'طبق', 'يتعمل فيه اندومى وحاجات تانيه كتير', '16577170261632410373.jpg', 10, NULL, 0, 25, 1, '2021-09-23 22:19:33', '2021-09-23 20:19:34'),
(15, 'شعور كيرلى', 'لعمر وجيمي', '17152713081632411543.jpg', 100000000, NULL, 0, 27, 1, '2021-09-23 22:39:03', '2021-10-06 19:42:47'),
(16, 'blouse', 'Swirl blouse', '15191986601632411746.jpg', 300, NULL, 0, 30, 1, '2021-09-23 22:42:26', '2021-09-23 22:43:00'),
(17, 'فيديو', 'اطططشغل', '14379292021632412146.jpg', 10000, NULL, 0, 31, 1, '2021-09-23 22:49:06', '2021-09-23 20:49:06'),
(18, 'بحر الكور', 'معركه بحر الكور', '10470045491632412432.jpg', 200, NULL, 0, 32, 1, '2021-09-23 22:53:52', '2021-10-06 19:50:49'),
(19, 'عريسك من صيدلة', 'عريسك من كلية الصيدلة يعني دكتور و اصحابه دكاترة ل اصحابك الباقيين', '15342191851632413291.jpg', 150, NULL, 0, 33, 1, '2021-09-23 23:08:11', '2021-09-23 21:08:11'),
(20, 'عريسك من هندسة', 'النهاردة عريسك من هندسة بنص التمن لأنهم ناقصين وميستاهلوش يتدفع فيهم التمن كله', '14023600521632413403.jpg', 50, NULL, 0, 33, 1, '2021-09-23 23:10:03', '2021-09-23 21:10:03'),
(21, 'هتتختلبى', 'وابيةت', '4720046471632677966.jpg', 200, NULL, 0, 6, 1, '2021-09-27 00:39:26', '2021-09-26 22:39:26'),
(22, 'compo sandwishes', 'very good meal', '10381907021632945677.png', 100, NULL, 0, 1, 1, '2021-09-30 03:01:17', '2021-09-30 01:01:17'),
(23, 'compo sandwishes', 'very good meal', '8196587931632945745.png', 100, NULL, 0, 1, 1, '2021-09-30 03:02:25', '2021-09-30 01:02:25'),
(24, 'compo sandwishes', 'very good meal', '1866923961633027270.png', 100, NULL, 0, 1, 1, '2021-10-01 01:41:10', '2021-09-30 23:41:10'),
(25, 'منتج واحد', 'وصف', '5704655171633027713.jpg', 200, NULL, 0, 34, 1, '2021-10-01 01:48:33', '2021-09-30 23:48:33'),
(26, 'تجريبي', 'وصف وصف وصف', '15466454351633033708.jpg', 200, NULL, 0, 34, 1, '2021-10-01 03:28:28', '2021-10-01 01:28:28'),
(27, 'nada', 'nada', '6096186831633524077.jpg', 0, NULL, 0, 27, 1, '2021-10-06 19:41:17', '2021-10-06 17:41:17');

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
(1, '4007074591631555642.jpg', 8, '2021-09-14 00:54:02', '2021-09-13 22:54:02'),
(2, '8814112081631555642.png', 8, '2021-09-14 00:54:02', '2021-09-13 22:54:02'),
(3, '18741819711632113121.jpg', 9, '2021-09-20 11:45:21', '2021-09-20 09:45:21'),
(4, '14071771431632113121.jpg', 9, '2021-09-20 11:45:21', '2021-09-20 09:45:21'),
(5, '12558436011632168301.png', 10, '2021-09-21 03:05:01', '2021-09-21 01:05:01'),
(6, '20802592101632409514.jpg', 11, '2021-09-23 22:05:14', '2021-09-23 20:05:14'),
(7, '12094286741632409593.jpg', 12, '2021-09-23 22:06:33', '2021-09-23 20:06:33'),
(8, '17814059311632410228.jpg', 13, '2021-09-23 22:17:08', '2021-09-23 20:17:08'),
(9, '15282086811632410374.jpg', 14, '2021-09-23 22:19:33', '2021-09-23 20:19:34'),
(11, '3529265281632411746.jpg', 16, '2021-09-23 22:42:26', '2021-09-23 20:42:26'),
(12, '11735288071632412146.jpg', 17, '2021-09-23 22:49:06', '2021-09-23 20:49:06'),
(13, '741565351632412432.jpg', 18, '2021-09-23 22:53:52', '2021-09-23 20:53:52'),
(14, '5142203271632413291.jpg', 19, '2021-09-23 23:08:11', '2021-09-23 21:08:11'),
(15, '19095160051632413403.jpg', 20, '2021-09-23 23:10:03', '2021-09-23 21:10:03'),
(16, '11646805071632677966.jpg', 21, '2021-09-27 00:39:26', '2021-09-26 22:39:26'),
(17, '4656055551632945677.png', 22, '2021-09-30 03:01:17', '2021-09-30 01:01:17'),
(19, '7400519581632945745.png', 23, '2021-09-30 03:02:25', '2021-09-30 01:02:25'),
(20, '17266644811632945745.jpg', 23, '2021-09-30 03:02:25', '2021-09-30 01:02:25'),
(21, '11627777221633027270.jpg', 24, '2021-10-01 01:41:10', '2021-09-30 23:41:10'),
(26, '5296746461633294284.jpg', 8, '2021-10-04 03:51:24', '2021-10-04 01:51:24'),
(27, '14582354731633384132.jpg', 26, '2021-10-05 04:48:52', '2021-10-05 02:48:52'),
(29, '4972907701633524077.jpg', 27, '2021-10-06 19:41:17', '2021-10-06 17:41:17'),
(30, '9535557471633524077.jpg', 27, '2021-10-06 19:41:17', '2021-10-06 17:41:17'),
(31, '9135329841633524234.jpg', 15, '2021-10-06 19:43:54', '2021-10-06 17:43:54'),
(32, '16154104851633524422.jpg', 15, '2021-10-06 19:47:02', '2021-10-06 17:47:02');

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
(1, 'مغسله سيارات', 1, 0, '2021-05-29 18:32:49', '2021-06-17 02:23:52'),
(2, 'بدل', 2, 0, '2021-06-17 02:22:52', '2021-06-17 02:22:52'),
(3, 'فساتين', 2, 0, '2021-06-17 02:22:52', '2021-06-17 02:22:52'),
(4, 'قطع غيار', 1, 0, '2021-06-17 02:22:52', '2021-06-17 02:23:45'),
(5, 'Book store', 4, 0, '2021-06-29 23:14:05', '2021-06-29 23:15:06'),
(6, 'Co-work space', 4, 0, '2021-06-29 23:15:21', '2021-06-29 23:15:21'),
(7, 'مكتبة ادوات كتابية', 4, 0, '2021-06-29 23:15:47', '2021-06-29 23:15:47'),
(8, 'مستشفيات', 5, 0, '2021-08-19 15:35:31', '2021-08-19 15:35:31'),
(9, 'بنوك', 5, 0, '2021-08-19 15:35:40', '2021-08-19 15:35:40'),
(10, 'ابنية حكومية', 5, 0, '2021-08-19 15:35:56', '2021-08-19 15:35:56'),
(11, 'مراكز الشرطة', 5, 0, '2021-08-19 15:36:09', '2021-08-19 15:36:09'),
(12, 'بلاستيشن', 6, 0, '2021-08-19 16:42:01', '2021-08-19 16:42:01'),
(13, 'ابن الفل', 7, 0, '2021-09-21 01:18:26', '2021-09-21 01:18:26'),
(14, 'اخو الفل', 7, 0, '2021-09-21 01:26:12', '2021-09-21 01:26:12');

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
  `state` varchar(150) NOT NULL,
  `firebase_token` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `password_code`, `image`, `subCity_id`, `address`, `latitude`, `longitude`, `state`, `firebase_token`, `created_at`, `updated_at`) VALUES
(1, 'Engy Ashraf', 'engyashraf68@gmail.com', '01015874523', '$2y$10$1ZqYVYWaZCx61gWc.Wvpxuh.nYtquOrHaBZ3qQtYZVrKT/9tLyJu2', '204367', 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-05-08 10:37:48', '2021-05-11 05:28:28'),
(2, 'manar', 'mnar@gmail.com', '01024785127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'accept', NULL, '2021-05-08 17:04:42', '2021-05-08 15:04:42'),
(3, 'Engy Ashraf', 'engyashraf64@gmail.com', '01550404490', '$2y$10$5Wwqd5WRd6xlyJBMeo4p0O/CDJhlz88Pr36AXcIahtPrkl/bte92G', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-05-08 20:18:52', '2021-05-08 18:18:52'),
(4, 'manar', 'mnar77@gmail.com', '01024085127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'accept', NULL, '2021-05-08 20:23:21', '2021-05-08 18:24:20'),
(5, 'Heba Muhammad', 'hebamuhammed22@gmail.com', '01060945044', '$2y$10$uCydKRyaYzOMei8f9vAgJuxIkgeKxtNh.tAZZEOzRcjVYcAyugzjO', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-05-08 20:27:15', '2021-10-06 04:21:18'),
(6, 'heba Muhammad', 'HebaMuhammed20@gmail.com', '01060945040', '$2y$10$QPKN011/vLAS/94P.7EhdeTxUXoUK3JoxngJC87S3/Jndw8wkeAeC', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-05-08 21:41:36', '2021-05-08 19:41:36'),
(7, 'heba muhammad', 'heba@gmail.com', '01060945043', '$2y$10$eIiTOZ4fVrjH6O/cfPBd..7uRPu1ja8PLfS3.MO9yPv/jfZQkUZDW', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-05-09 01:47:16', '2021-05-08 23:47:16'),
(8, 'engy ashraf', 'engy@gmail.com', '01022010690', '$2y$10$cF6sSbrMeG6LXspkKqt1LuZtk1ijcH8N.NYZhxygaQXyDq7APskBG', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-06-19 09:57:29', '2021-06-19 07:57:29'),
(9, 'Abdelrahman Mohamed', 'Eng.A.Mohammed89@gmail.com', '1111111', '$2y$10$4UTjmPGwILPHRqM7Gsf0wOBEo7dg7ZGJ6OEkEOZvoVC1ujCTC1cD2', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-07-08 15:36:39', '2021-09-21 01:32:21'),
(10, 'Nada Shaker Eltayeb', 'nadacoms@gmail.com', '+441288671381', '$2y$10$j7jfc02eEsbGpCKInGsWBOUxUYabJngZVmdDEIB3.c2UH6juoGEim', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-07-16 22:54:17', '2021-07-16 20:54:17'),
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
(21, 'Omar kamal', 'omar@gmail.com', '01003362358', '$2y$10$z0z8P3hHZtck7tJ2VRjUpOdiBKXaV0saVw4WraB0NMMxoZH92bpVi', NULL, 'img.png', NULL, NULL, NULL, NULL, 'accept', NULL, '2021-10-06 06:25:08', '2021-10-06 04:25:09');

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
(1, '2', 1, '2021-05-08 10:37:48', '2021-05-08 08:37:49'),
(2, '2', 2, '2021-05-08 17:04:42', '2021-05-08 15:04:42'),
(3, '2', 3, '2021-05-08 20:18:52', '2021-05-08 18:18:52'),
(4, '2', 4, '2021-05-08 20:23:21', '2021-05-08 18:23:21'),
(5, '2', 5, '2021-05-08 20:27:15', '2021-05-08 18:27:15'),
(6, '2', 6, '2021-05-08 21:41:36', '2021-05-08 19:41:36'),
(7, '2', 7, '2021-05-09 01:47:16', '2021-05-08 23:47:16'),
(8, '2', 8, '2021-06-19 09:57:29', '2021-06-19 07:57:29'),
(9, '3', 1, '2021-07-05 10:27:43', '2021-07-05 08:27:43'),
(10, '3', 5, '2021-07-06 13:32:54', '2021-07-06 11:32:54'),
(11, '2', 9, '2021-07-08 15:36:39', '2021-07-08 13:36:39'),
(12, '2', 10, '2021-07-16 22:54:17', '2021-07-16 20:54:17'),
(13, '3', 10, '2021-07-16 23:02:01', '2021-07-16 21:02:01'),
(14, '3', 9, '2021-07-18 06:11:04', '2021-07-18 04:11:04'),
(15, '2', 11, '2021-08-14 01:11:41', '2021-08-13 23:11:42'),
(16, '2', 12, '2021-08-14 06:28:06', '2021-08-14 04:28:06'),
(17, '2', 13, '2021-08-14 21:11:05', '2021-08-14 19:11:05'),
(18, '2', 14, '2021-08-14 23:47:20', '2021-08-14 21:47:20'),
(19, '3', 14, '2021-08-14 23:50:59', '2021-08-14 21:50:59'),
(20, '3', 13, '2021-08-19 17:46:47', '2021-08-19 15:46:47'),
(21, '2', 15, '2021-09-21 03:35:20', '2021-09-21 01:35:20'),
(22, '2', 16, '2021-09-21 18:59:03', '2021-09-21 16:59:04'),
(23, '2', 17, '2021-09-23 21:46:20', '2021-09-23 19:46:20'),
(24, '2', 18, '2021-09-23 21:53:37', '2021-09-23 19:53:37'),
(25, '3', 17, '2021-09-23 22:02:34', '2021-09-23 20:02:34'),
(26, '3', 11, '2021-09-23 22:14:17', '2021-09-23 20:14:17'),
(27, '2', 19, '2021-09-23 22:19:16', '2021-09-23 20:19:16'),
(28, '3', 19, '2021-09-23 22:22:47', '2021-09-23 20:22:47'),
(29, '3', 16, '2021-09-23 22:37:43', '2021-09-23 20:37:43'),
(30, '2', 20, '2021-09-23 22:44:01', '2021-09-23 20:44:01'),
(31, '3', 20, '2021-09-23 22:46:07', '2021-09-23 20:46:07'),
(32, '2', 21, '2021-10-06 06:25:08', '2021-10-06 04:25:09');

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
  ADD KEY `jobCat_id` (`jobCat_id`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `place_category`
--
ALTER TABLE `place_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `place_discounts`
--
ALTER TABLE `place_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `place_gallary`
--
ALTER TABLE `place_gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `place_tags`
--
ALTER TABLE `place_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place_time`
--
ALTER TABLE `place_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`jobCat_id`) REFERENCES `job_category` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`subCity_id`) REFERENCES `subcity` (`id`);

--
-- Constraints for table `package_details`
--
ALTER TABLE `package_details`
  ADD CONSTRAINT `package_details_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `places_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `places_ibfk_4` FOREIGN KEY (`Category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `place_category`
--
ALTER TABLE `place_category`
  ADD CONSTRAINT `place_category_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`),
  ADD CONSTRAINT `place_category_ibfk_2` FOREIGN KEY (`subcat_id`) REFERENCES `subcategory` (`id`);

--
-- Constraints for table `place_discounts`
--
ALTER TABLE `place_discounts`
  ADD CONSTRAINT `place_discounts_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `place_gallary`
--
ALTER TABLE `place_gallary`
  ADD CONSTRAINT `place_gallary_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `place_tags`
--
ALTER TABLE `place_tags`
  ADD CONSTRAINT `place_tags_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `place_time`
--
ALTER TABLE `place_time`
  ADD CONSTRAINT `place_time_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`),
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `subcity`
--
ALTER TABLE `subcity`
  ADD CONSTRAINT `subcity_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

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
