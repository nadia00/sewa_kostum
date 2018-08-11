-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 08:44 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa-kostum`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `city`, `country`, `district`, `street`, `zip_code`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 3, 'Surabaya', 'Indonesia', 'Sukolilo', 'Jl Raya ITS', '60111', '082199482000', '2018-06-25 23:39:39', '2018-06-25 23:39:39'),
(2, 3, 'Surabaya', 'Indonesia', 'Sukolilo', 'Keputih 3c', '60111', '082199484000', '2018-06-26 00:13:59', '2018-06-26 00:13:59'),
(3, 2, 'Surabaya', 'Indonesia', 'Sukolilo', 'PENS', '60111', '08219948220', '2018-06-29 00:59:26', '2018-06-29 00:59:26'),
(4, 2, 'surabaya', 'Indonesia', 'Keputih', 'Jl Raya ITS', '60111', '082199482929', '2018-07-25 13:31:56', '2018-07-25 13:31:56'),
(5, 6, 'surabaya', 'Indonesia', 'keputih', 'Gang 3', '60111', '082199482921', '2018-07-26 18:58:18', '2018-07-26 18:58:18'),
(6, 5, 'Sidoarjo', 'Indonesia', 'keputih', 'Hallo', '60111', '082199482929', '2018-08-04 08:43:03', '2018-08-04 08:43:03'),
(7, 8, 'Banyuwangi', 'Indonesia', 'Giri', 'MH Thamrin', '68423', '082139128767', '2018-08-05 23:48:33', '2018-08-05 23:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `shop_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` smallint(6) NOT NULL,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Adat', '2018-06-24 03:15:42', '2018-06-24 03:15:42'),
(2, 'Tari', '2018-06-24 03:15:43', '2018-06-24 03:15:43'),
(3, 'Juang', '2018-06-24 03:15:43', '2018-06-24 03:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(11) UNSIGNED NOT NULL,
  `sum_product` smallint(6) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fine_shop`
--

CREATE TABLE `fine_shop` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fine_shop`
--

INSERT INTO `fine_shop` (`id`, `shop_id`, `type_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20000, '2018-07-13 15:01:12', '2018-07-23 07:45:30'),
(2, 1, 2, 30000, '2018-07-13 15:01:12', '2018-07-23 07:45:30'),
(3, 1, 3, 90000, '2018-07-13 15:01:12', '2018-07-23 07:45:30'),
(4, 2, 1, 15000, '2018-07-13 20:13:43', '2018-07-26 19:19:27'),
(5, 2, 2, 25000, '2018-07-13 20:13:43', '2018-07-26 19:19:27'),
(6, 2, 3, 80000, '2018-07-13 20:13:43', '2018-07-26 19:19:27'),
(7, 3, 1, 15000, '2018-07-26 19:06:12', '2018-07-26 19:06:12'),
(8, 3, 2, 50000, '2018-07-26 19:06:13', '2018-07-26 19:06:13'),
(9, 3, 3, 100000, '2018-07-26 19:06:13', '2018-07-26 19:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `fine_type`
--

CREATE TABLE `fine_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fine_type`
--

INSERT INTO `fine_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Overdue', NULL, NULL),
(2, 'Broken', NULL, NULL),
(3, 'Missing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_19_125920_create_entrust_user_table', 1),
(4, '2018_06_10_030604_create_size_table', 1),
(5, '2018_06_10_032102_create_type_table', 1),
(6, '2018_06_10_033158_create_categories_table', 1),
(7, '2018_06_10_040424_create_products_table', 1),
(8, '2018_06_10_040603_create_product_sizes_table', 1),
(9, '2018_06_10_040721_create_product_images_table', 1),
(10, '2018_06_10_040751_create_product_categories_table', 1),
(11, '2018_06_10_040819_create_addresses_table', 1),
(12, '2018_06_10_105345_create_shops_table', 1),
(13, '2018_06_10_164904_create_shop_image_table', 1),
(14, '2018_06_11_072914_create_orders_table', 1),
(15, '2018_06_11_081851_create_order_products_table', 1),
(16, '2018_06_11_091500_create_products_references_table', 1),
(17, '2018_06_11_103721_create_productimages_references_table', 1),
(18, '2018_06_11_103722_create_productsizes_references_table', 1),
(19, '2018_06_11_103723_create_productcategories_references_table', 1),
(20, '2018_06_11_124013_create_orders_references_table', 1),
(21, '2018_06_11_125923_create_orderproduct_references_table', 1),
(22, '2018_06_11_209450_create_addresses_references_table', 1),
(23, '2018_06_11_353408_create_shops_references_table', 1),
(24, '2018_06_11_494533_create_shopimages_references_table', 1),
(27, '2018_06_12_074556_create_shoppingcart_table', 2),
(28, '2018_06_12_074557_create_shoppingcart_references_table', 2),
(29, '2018_07_11_101117_create_fine_type_table', 3),
(30, '2018_07_11_101118_create_fine_shop_table', 3),
(31, '2018_06_11_081861_create_fine_type_table', 4),
(32, '2018_06_11_081862_create_fine_shop_table', 4),
(33, '2018_06_11_081863_create_fine_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `shop_id` int(10) UNSIGNED DEFAULT NULL,
  `addresses_id` int(10) UNSIGNED DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `first_date` date NOT NULL,
  `date_return` date DEFAULT NULL,
  `deposit` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shop_id`, `addresses_id`, `status`, `first_date`, `date_return`, `deposit`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 5, 5, '2018-07-28', '2018-07-27', 50, '2018-07-26 19:37:41', '2018-07-26 19:40:19'),
(2, 6, 3, 5, 0, '2018-07-28', NULL, 0, '2018-07-26 19:37:41', '2018-07-26 19:37:41'),
(3, 6, 1, 5, 4, '2018-07-30', '2018-07-27', 50, '2018-07-26 20:00:55', '2018-07-26 20:03:37'),
(4, 6, 1, 5, 4, '2018-07-28', '2018-07-27', 50, '2018-07-26 20:20:33', '2018-07-26 20:23:35'),
(5, 6, 2, 5, 4, '2018-07-27', '2018-07-29', 50, '2018-07-29 12:30:02', '2018-07-29 12:32:40'),
(6, 6, 1, 5, 3, '2018-07-31', NULL, 50, '2018-07-30 20:17:44', '2018-07-30 20:23:29'),
(7, 5, 1, 6, 0, '2018-08-05', NULL, 50, '2018-08-04 08:44:44', '2018-08-04 08:44:44'),
(8, 5, 1, 6, 0, '2018-08-04', NULL, 50, '2018-08-04 08:51:50', '2018-08-04 08:51:50'),
(9, 6, 1, 5, 0, '2018-08-10', NULL, 50, '2018-08-07 17:51:47', '2018-08-07 17:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_size_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_size_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '100000.00', 1, '2018-07-26 19:37:41', '2018-07-26 19:37:41'),
(2, 2, 13, '50000.00', 2, '2018-07-26 19:37:41', '2018-07-26 19:37:41'),
(3, 3, 1, '100000.00', 1, '2018-07-26 20:00:55', '2018-07-26 20:00:55'),
(4, 4, 2, '100000.00', 1, '2018-07-26 20:20:33', '2018-07-26 20:20:33'),
(5, 5, 33, '200000.00', 2, '2018-07-29 12:30:02', '2018-07-29 12:30:02'),
(6, 6, 5, '70000.00', 2, '2018-07-30 20:17:44', '2018-07-30 20:17:44'),
(7, 7, 34, '50000.00', 2, '2018-08-04 08:44:44', '2018-08-04 08:44:44'),
(8, 7, 35, '75000.00', 2, '2018-08-04 08:44:44', '2018-08-04 08:44:44'),
(9, 8, 34, '50000.00', 2, '2018-08-04 08:51:50', '2018-08-04 08:51:50'),
(10, 8, 35, '75000.00', 2, '2018-08-04 08:51:51', '2018-08-04 08:51:51'),
(11, 9, 37, '80000.00', 2, '2018-08-07 17:51:47', '2018-08-07 17:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'edit-user', 'Edit Users', 'edit existing users', '2018-06-24 03:15:43', '2018-06-24 03:15:43'),
(2, 'edit-data', 'Edit data', 'edit existing Data', '2018-06-24 03:15:44', '2018-06-24 03:15:44'),
(3, 'user-default', 'User Permission', 'default user permission as buyer', '2018-06-24 03:15:44', '2018-06-24 03:15:44'),
(4, 'user-seller', 'User Permission For Seller', 'seller permisssion for user', '2018-06-24 03:15:44', '2018-06-24 03:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(3, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `shop_id`, `created_at`, `updated_at`) VALUES
(1, 'Abdi Dalam', 'product/nOBie4cRg10VZEgpePWSHgzQavCrQEqzerFFgw34.jpeg', 'Warna Cokelat', 1, '2018-07-26 18:05:05', '2018-07-26 18:05:05'),
(2, 'Astronot', 'product/wVgau4EcHrk6aRx07rQ4HddNZu3NNozFqPreFQEV.jpeg', 'Astronot anak dewasa', 1, '2018-07-26 18:06:24', '2018-07-26 18:06:24'),
(3, 'Aceh', 'product/YOp4ounnOcosXdLiwQqk6solWi28ooU2YTP2Bx1U.jpeg', 'Perempuan', 1, '2018-07-26 18:07:09', '2018-07-26 18:07:09'),
(4, 'Adat Dayak', 'product/GLWCObTHlFVmjSBTXzDx7a1bQDoBQrAUSNsmBSip.jpeg', 'Baju Adat asli Dayak', 1, '2018-07-26 18:08:22', '2018-07-26 18:08:22'),
(5, 'Adat Jawa', 'product/7I15h0FFR1vUcEjPIs9kGzhrTT4C7lGBMvR5YwMq.jpeg', 'Baju adat Jawa', 1, '2018-07-26 18:09:15', '2018-07-26 18:09:15'),
(6, 'Alice', 'product/eoByypzdG2n2eaXlfnEVScb3koL9T7vEgwczuLha.jpeg', 'Kostum Alice Biru', 2, '2018-07-26 18:11:10', '2018-07-26 18:11:10'),
(8, 'Baju Adat India', 'product/gl4I1xY2VuCN6ArIH0GuTkBsTDnC9IwysqpX4OHp.jpeg', 'Baju milik daerah India', 2, '2018-07-26 18:12:00', '2018-07-26 18:12:00'),
(9, 'Kostum Anak Hewan Ayam', 'product/3fRV7joTB84J58F9OuSp82XKwLEvRiQJ5xcR4IlQ.jpeg', 'Kostum Lucu', 2, '2018-07-26 18:13:05', '2018-07-26 18:13:05'),
(10, 'Baju Adat ANak anak', 'product/SUvWDBws3shHqAUOuzHXJ8OmCraU2wKiUY5uuubV.jpeg', 'Baju Adat', 2, '2018-07-26 18:13:45', '2018-07-26 18:13:45'),
(11, 'Indiana Merah', 'product/QyBs2ozUQI9WGYR6ZgZqTWpPhjRxlU9rJgQ8Bow3.jpeg', 'Kostum Adat milik India', 3, '2018-07-26 18:14:46', '2018-07-26 18:14:46'),
(12, 'Aceh Baru', 'product/jBWFWYESJv7Mbszhm5nwyv8SNMMiThicNpLV3gBm.jpeg', 'kostum perempuan Aceh', 3, '2018-07-26 18:15:31', '2018-07-26 18:15:31'),
(13, 'Batman', 'product/fxt6n6H8hH3J26z7G4BEeIlIeR9TeR3EinaesbVC.jpeg', 'Baju perjuangan hero', 3, '2018-07-26 18:16:18', '2018-07-26 18:16:18'),
(14, 'Khas Madura', 'product/ChfOxE8uHf9gJOuQzxreumo4rmI2I9Y8h5vbisFf.jpeg', 'Tradisi Adat Madura', 3, '2018-07-26 18:17:35', '2018-07-26 18:17:35'),
(15, 'Adat Jawa Kuning', 'product/9Yqwtgn0eFoeRKrvNO67bnKueUyq8DURHaS3VZCh.jpeg', 'Adat untuk laki laki dewasa', 3, '2018-07-26 18:18:29', '2018-07-26 18:18:29'),
(16, 'Angkatan Laut', 'product/SRRrrQwHvt56UFmwYNU7yP1zqsupoY5UU3I2BnOS.jpeg', 'Baju AU', 1, '2018-07-26 18:22:26', '2018-07-26 18:22:26'),
(17, 'Adat Meksiko', 'product/ma6TI4yWlGfqdRnj38p5wZhWF9n3u1o4uyego5Dr.jpeg', 'Daerah Meksiko', 1, '2018-07-26 18:24:29', '2018-07-26 18:24:29'),
(18, 'Badut Lucu', 'product/ykoxr2DGDruawGIddGnTkSpTSyf6nbMQ8WVNQQH9.jpeg', 'Kostum anak lucu', 1, '2018-07-26 18:25:23', '2018-07-26 18:25:23'),
(19, 'Tari', 'product/70sGkYkXWNHOL8fqkzkJr0tEUUEeEiyZ5PaXIbNr.jpeg', 'untuk tradisi', 1, '2018-07-26 18:26:07', '2018-07-26 18:26:07'),
(20, 'Bali', 'product/SUBd2TnXOgseWsLMItauPzpVqnuASaajbfWKOhyp.jpeg', 'KOstum anak Bali perempuan', 1, '2018-07-26 18:27:26', '2018-07-26 18:27:26'),
(21, 'Batak perempuan', 'product/v8bGe2Sqc9N75BB3gOeicWdICifboLUSMq3JbaaJ.jpeg', 'kostum adat batak perempuan', 1, '2018-07-26 18:28:56', '2018-07-26 18:28:56'),
(22, 'Bali', 'product/oIVvE2c9YbGtvWIZ71FbgrfAWBuf1uQfgWhLobGt.jpeg', 'aku kehabisan kata kata', 3, '2018-07-26 18:30:09', '2018-07-26 18:30:09'),
(23, 'Bali tarian', 'product/sKxDlEDkvV72uv6sHMl3xomXwdHCBz57Jpx61ixw.jpeg', 'DApat digunakan sebagai baju adat dan juga menari', 3, '2018-07-26 18:31:17', '2018-07-26 18:31:17'),
(24, 'Pemadam kebakaran', 'product/dYI94mHeZZ5pyXhCMIxllR5U6wafJZqYAkFqFppS.jpeg', 'dapat dipakai oleh anak anak perempuan dan laki laki', 3, '2018-07-26 18:32:08', '2018-07-26 18:32:08'),
(25, 'Kostum tari festival', 'product/6sL36HWxLvd0NplqDRxhdIUOvqsk19xS83Ehuffj.jpeg', 'cocok untuk festival', 3, '2018-07-26 18:33:46', '2018-07-26 18:33:46'),
(26, 'Polisi', 'product/0V76WdDbmotvzsovFY6uMWUQOziB9Iam4k9u59aq.jpeg', 'Polisi laki laki dan anak', 2, '2018-07-26 18:36:02', '2018-07-26 18:36:02'),
(27, 'Festival', 'product/WnrU5SUKbDTgVjSlPe7OnrE9kIwBuUuuhmmxA54N.jpeg', 'Kostum festival', 2, '2018-07-26 18:36:46', '2018-07-26 18:36:46'),
(28, 'Superman', 'product/6TY9X8LWwTZV8La6hYlGNHRBIZwWGndJ1vJrkzt1.jpeg', 'kostum perempuan semua ukuran', 1, '2018-07-30 21:37:44', '2018-07-30 21:37:44'),
(29, 'Merak Hijau', 'product/uDGtp4wT1i7fxKrnOboO1YGBAyLLgtHaYDHc0TWa.jpeg', 'Untuk Dewasa standar jumbo', 1, '2018-08-05 16:06:37', '2018-08-05 16:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-07-26 18:05:05', '2018-07-26 18:05:05'),
(2, 2, 3, '2018-07-26 18:06:24', '2018-07-26 18:06:24'),
(3, 3, 1, '2018-07-26 18:07:10', '2018-07-26 18:07:10'),
(4, 4, 1, '2018-07-26 18:08:23', '2018-07-26 18:08:23'),
(5, 5, 1, '2018-07-26 18:09:15', '2018-07-26 18:09:15'),
(6, 6, 3, '2018-07-26 18:11:10', '2018-07-26 18:11:10'),
(8, 8, 1, '2018-07-26 18:12:01', '2018-07-26 18:12:01'),
(9, 9, 3, '2018-07-26 18:13:05', '2018-07-26 18:13:05'),
(10, 10, 1, '2018-07-26 18:13:45', '2018-07-26 18:13:45'),
(11, 11, 1, '2018-07-26 18:14:46', '2018-07-26 18:14:46'),
(12, 12, 1, '2018-07-26 18:15:31', '2018-07-26 18:15:31'),
(13, 13, 3, '2018-07-26 18:16:18', '2018-07-26 18:16:18'),
(14, 14, 1, '2018-07-26 18:17:36', '2018-07-26 18:17:36'),
(15, 15, 1, '2018-07-26 18:18:29', '2018-07-26 18:18:29'),
(16, 17, 1, '2018-07-26 18:24:29', '2018-07-26 18:24:29'),
(17, 18, 1, '2018-07-26 18:25:23', '2018-07-26 18:25:23'),
(18, 18, 2, '2018-07-26 18:25:23', '2018-07-26 18:25:23'),
(19, 18, 3, '2018-07-26 18:25:23', '2018-07-26 18:25:23'),
(20, 19, 2, '2018-07-26 18:26:07', '2018-07-26 18:26:07'),
(21, 20, 1, '2018-07-26 18:27:27', '2018-07-26 18:27:27'),
(22, 20, 2, '2018-07-26 18:27:27', '2018-07-26 18:27:27'),
(23, 21, 1, '2018-07-26 18:28:56', '2018-07-26 18:28:56'),
(24, 22, 1, '2018-07-26 18:30:09', '2018-07-26 18:30:09'),
(25, 23, 1, '2018-07-26 18:31:18', '2018-07-26 18:31:18'),
(26, 23, 2, '2018-07-26 18:31:18', '2018-07-26 18:31:18'),
(27, 24, 3, '2018-07-26 18:32:08', '2018-07-26 18:32:08'),
(28, 25, 2, '2018-07-26 18:33:46', '2018-07-26 18:33:46'),
(29, 26, 3, '2018-07-26 18:36:02', '2018-07-26 18:36:02'),
(30, 27, 2, '2018-07-26 18:36:46', '2018-07-26 18:36:46'),
(31, 28, 3, '2018-07-30 21:37:44', '2018-07-30 21:37:44'),
(32, 29, 2, '2018-08-05 16:06:37', '2018-08-05 16:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'product/nOBie4cRg10VZEgpePWSHgzQavCrQEqzerFFgw34.jpeg', '2018-07-26 18:05:05', '2018-07-26 18:05:05'),
(2, 2, 'product/wVgau4EcHrk6aRx07rQ4HddNZu3NNozFqPreFQEV.jpeg', '2018-07-26 18:06:24', '2018-07-26 18:06:24'),
(3, 2, 'product/lumfw0llq67nxxiTwx62iOsHebSxeZrTffzJIm7C.jpeg', '2018-07-26 18:06:24', '2018-07-26 18:06:24'),
(4, 3, 'product/YOp4ounnOcosXdLiwQqk6solWi28ooU2YTP2Bx1U.jpeg', '2018-07-26 18:07:10', '2018-07-26 18:07:10'),
(5, 4, 'product/GLWCObTHlFVmjSBTXzDx7a1bQDoBQrAUSNsmBSip.jpeg', '2018-07-26 18:08:22', '2018-07-26 18:08:22'),
(6, 5, 'product/7I15h0FFR1vUcEjPIs9kGzhrTT4C7lGBMvR5YwMq.jpeg', '2018-07-26 18:09:15', '2018-07-26 18:09:15'),
(7, 6, 'product/eoByypzdG2n2eaXlfnEVScb3koL9T7vEgwczuLha.jpeg', '2018-07-26 18:11:10', '2018-07-26 18:11:10'),
(9, 8, 'product/gl4I1xY2VuCN6ArIH0GuTkBsTDnC9IwysqpX4OHp.jpeg', '2018-07-26 18:12:00', '2018-07-26 18:12:00'),
(10, 9, 'product/3fRV7joTB84J58F9OuSp82XKwLEvRiQJ5xcR4IlQ.jpeg', '2018-07-26 18:13:05', '2018-07-26 18:13:05'),
(11, 10, 'product/SUvWDBws3shHqAUOuzHXJ8OmCraU2wKiUY5uuubV.jpeg', '2018-07-26 18:13:45', '2018-07-26 18:13:45'),
(12, 11, 'product/QyBs2ozUQI9WGYR6ZgZqTWpPhjRxlU9rJgQ8Bow3.jpeg', '2018-07-26 18:14:46', '2018-07-26 18:14:46'),
(13, 12, 'product/jBWFWYESJv7Mbszhm5nwyv8SNMMiThicNpLV3gBm.jpeg', '2018-07-26 18:15:31', '2018-07-26 18:15:31'),
(14, 13, 'product/fxt6n6H8hH3J26z7G4BEeIlIeR9TeR3EinaesbVC.jpeg', '2018-07-26 18:16:18', '2018-07-26 18:16:18'),
(15, 14, 'product/ChfOxE8uHf9gJOuQzxreumo4rmI2I9Y8h5vbisFf.jpeg', '2018-07-26 18:17:35', '2018-07-26 18:17:35'),
(16, 14, 'product/vLoeYyp8uKrUzUB6LUGWYLGpoBNOggJVLTZmfi8i.jpeg', '2018-07-26 18:17:36', '2018-07-26 18:17:36'),
(17, 15, 'product/9Yqwtgn0eFoeRKrvNO67bnKueUyq8DURHaS3VZCh.jpeg', '2018-07-26 18:18:29', '2018-07-26 18:18:29'),
(18, 16, 'product/SRRrrQwHvt56UFmwYNU7yP1zqsupoY5UU3I2BnOS.jpeg', '2018-07-26 18:22:26', '2018-07-26 18:22:26'),
(19, 17, 'product/ma6TI4yWlGfqdRnj38p5wZhWF9n3u1o4uyego5Dr.jpeg', '2018-07-26 18:24:29', '2018-07-26 18:24:29'),
(20, 18, 'product/ykoxr2DGDruawGIddGnTkSpTSyf6nbMQ8WVNQQH9.jpeg', '2018-07-26 18:25:23', '2018-07-26 18:25:23'),
(21, 19, 'product/70sGkYkXWNHOL8fqkzkJr0tEUUEeEiyZ5PaXIbNr.jpeg', '2018-07-26 18:26:07', '2018-07-26 18:26:07'),
(22, 20, 'product/SUBd2TnXOgseWsLMItauPzpVqnuASaajbfWKOhyp.jpeg', '2018-07-26 18:27:26', '2018-07-26 18:27:26'),
(23, 21, 'product/v8bGe2Sqc9N75BB3gOeicWdICifboLUSMq3JbaaJ.jpeg', '2018-07-26 18:28:56', '2018-07-26 18:28:56'),
(24, 22, 'product/oIVvE2c9YbGtvWIZ71FbgrfAWBuf1uQfgWhLobGt.jpeg', '2018-07-26 18:30:09', '2018-07-26 18:30:09'),
(25, 23, 'product/sKxDlEDkvV72uv6sHMl3xomXwdHCBz57Jpx61ixw.jpeg', '2018-07-26 18:31:18', '2018-07-26 18:31:18'),
(26, 24, 'product/dYI94mHeZZ5pyXhCMIxllR5U6wafJZqYAkFqFppS.jpeg', '2018-07-26 18:32:08', '2018-07-26 18:32:08'),
(27, 25, 'product/6sL36HWxLvd0NplqDRxhdIUOvqsk19xS83Ehuffj.jpeg', '2018-07-26 18:33:46', '2018-07-26 18:33:46'),
(28, 26, 'product/0V76WdDbmotvzsovFY6uMWUQOziB9Iam4k9u59aq.jpeg', '2018-07-26 18:36:02', '2018-07-26 18:36:02'),
(29, 27, 'product/WnrU5SUKbDTgVjSlPe7OnrE9kIwBuUuuhmmxA54N.jpeg', '2018-07-26 18:36:46', '2018-07-26 18:36:46'),
(30, 28, 'product/6TY9X8LWwTZV8La6hYlGNHRBIZwWGndJ1vJrkzt1.jpeg', '2018-07-30 21:37:44', '2018-07-30 21:37:44'),
(31, 29, 'product/uDGtp4wT1i7fxKrnOboO1YGBAyLLgtHaYDHc0TWa.jpeg', '2018-08-05 16:06:37', '2018-08-05 16:06:37'),
(32, 29, 'product/QYubuSDUOemU5m6EY2541FEwpSmHxRcbVENXiPFw.jpeg', '2018-08-05 16:06:37', '2018-08-05 16:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(10) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `review_value` float NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `user_id`, `shop_id`, `review_value`, `updated_at`, `created_at`) VALUES
(1, 27, 6, 2, 3, '2018-08-02 19:05:19', '2018-08-02 19:05:19'),
(3, 4, 6, 1, 4, '2018-08-02 19:10:05', '2018-08-02 19:10:05'),
(4, 1, 6, 1, 2, '2018-08-02 19:52:10', '2018-08-02 19:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 100000, 8, '2018-07-26 18:05:05', '2018-07-26 18:05:05'),
(2, 2, 1, 100000, 8, '2018-07-26 18:06:24', '2018-07-26 18:06:24'),
(3, 2, 2, 130000, 5, '2018-07-26 18:06:24', '2018-07-26 18:06:24'),
(4, 3, 1, 200000, 9, '2018-07-26 18:07:10', '2018-07-26 18:07:10'),
(5, 4, 2, 70000, 10, '2018-07-26 18:08:23', '2018-07-26 18:08:23'),
(6, 5, 1, 50000, 6, '2018-07-26 18:09:15', '2018-07-26 18:09:15'),
(7, 6, 2, 130000, 3, '2018-07-26 18:11:10', '2018-07-26 18:11:10'),
(9, 8, 1, 45000, 4, '2018-07-26 18:12:01', '2018-07-26 18:12:01'),
(10, 9, 1, 35000, 2, '2018-07-26 18:13:05', '2018-07-26 18:13:05'),
(11, 10, 1, 60000, 4, '2018-07-26 18:13:45', '2018-07-26 18:13:45'),
(12, 11, 2, 150000, 6, '2018-07-26 18:14:46', '2018-07-26 18:14:46'),
(13, 12, 1, 50000, 7, '2018-07-26 18:15:31', '2018-07-26 18:15:31'),
(14, 13, 1, 100000, 8, '2018-07-26 18:16:18', '2018-07-26 18:16:18'),
(15, 14, 1, 70000, 8, '2018-07-26 18:17:36', '2018-07-26 18:17:36'),
(16, 14, 2, 120000, 10, '2018-07-26 18:17:36', '2018-07-26 18:17:36'),
(17, 15, 2, 110000, 6, '2018-07-26 18:18:29', '2018-07-26 18:18:29'),
(18, 16, 1, 100000, 5, '2018-07-26 18:22:26', '2018-07-26 18:22:26'),
(19, 17, 1, 140000, 2, '2018-07-26 18:24:29', '2018-07-26 18:24:29'),
(20, 18, 1, 100000, 5, '2018-07-26 18:25:23', '2018-07-26 18:25:23'),
(21, 19, 2, 120000, 5, '2018-07-26 18:26:07', '2018-07-26 18:26:07'),
(22, 20, 1, 200000, 13, '2018-07-26 18:27:27', '2018-07-26 18:27:27'),
(23, 21, 1, 130000, 8, '2018-07-26 18:28:56', '2018-07-26 18:28:56'),
(24, 21, 2, 150000, 10, '2018-07-26 18:28:56', '2018-07-26 18:28:56'),
(25, 22, 1, 90000, 8, '2018-07-26 18:30:09', '2018-07-26 18:30:09'),
(26, 22, 2, 100000, 6, '2018-07-26 18:30:09', '2018-07-26 18:30:09'),
(27, 23, 1, 100000, 10, '2018-07-26 18:31:18', '2018-07-26 18:31:18'),
(28, 23, 2, 120000, 12, '2018-07-26 18:31:18', '2018-07-26 18:31:18'),
(29, 24, 1, 50000, 10, '2018-07-26 18:32:08', '2018-07-26 18:32:08'),
(30, 25, 2, 150000, 3, '2018-07-26 18:33:46', '2018-07-26 18:33:46'),
(31, 26, 1, 50000, 8, '2018-07-26 18:36:02', '2018-07-26 18:36:02'),
(32, 26, 2, 80000, 5, '2018-07-26 18:36:02', '2018-07-26 18:36:02'),
(33, 27, 2, 200000, 5, '2018-07-26 18:36:46', '2018-07-26 18:36:46'),
(34, 28, 1, 50000, 6, '2018-07-30 21:37:44', '2018-07-30 21:37:44'),
(35, 28, 2, 75000, 8, '2018-07-30 21:37:44', '2018-07-30 21:37:44'),
(36, 28, 3, 100000, 10, '2018-07-30 21:37:44', '2018-07-30 21:37:44'),
(37, 29, 6, 80000, 7, '2018-08-05 16:06:37', '2018-08-05 16:06:37'),
(38, 29, 7, 100000, 3, '2018-08-05 16:06:37', '2018-08-05 16:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin Login', 'Admin', '2018-06-24 03:15:43', '2018-06-24 03:15:43'),
(2, 'user', 'User Page', 'User', '2018-06-24 03:15:43', '2018-06-24 03:15:43'),
(3, 'user-seller', 'User Page', 'User', '2018-06-24 03:15:43', '2018-06-24 03:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_address` text COLLATE utf8mb4_unicode_ci,
  `location_lat` double DEFAULT NULL,
  `location_lng` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `user_id`, `country`, `province`, `city`, `street`, `description`, `image`, `phone`, `deposit`, `status`, `created_at`, `updated_at`, `location_address`, `location_lat`, `location_lng`) VALUES
(1, 'Nadia Kostum', 2, 'Indonesia', NULL, 'Surabaya', 'Keputih 3c', 'Menyewakan kostum - kostum untuk karnaval', 'shop/plRoLzijqdngHfx4z3vpcUw60GG3qocTglmPU5Nh.jpeg', '082129298942', 50, 0, '2018-06-24 18:04:41', '2018-07-23 07:45:30', 'Gresik', 0, 0),
(2, 'Gading', 3, 'Indonesia', NULL, 'Surabaya', 'Plampitan', 'Sewa kostum adat anak dan dewasa', 'shop/A7rs7edrgST4x93gbcaUgKkJFCsuy5tEhYdByxSZ.jpeg', '0821992820', 50, 0, '2018-06-24 22:30:22', '2018-07-26 19:19:27', 'SBY', 0, 0),
(3, 'Iren Shop', 4, 'Indonesia', NULL, 'Surabaya', 'bulak banteng', 'laksjdksahkdjkjasd', 'shop/vuVjAoMl77yAGURD7rcQDIbaJZASJ5DBbBYzZg2s.jpeg', '082199484949', NULL, 0, '2018-07-16 07:41:59', '2018-07-16 07:41:59', '', 0, 0),
(4, 'Ndower Art', 5, 'Indonesia', NULL, 'Sidoarjo', 'Krian', 'Sewain kostum nih.', 'shop/boqyXY1nGUPfwLIUxaG1FiUgr9iMRS1nQSiYtvkk.jpeg', '082199484950', NULL, 0, '2018-07-26 18:38:50', '2018-07-26 18:38:50', 'Gresik', 0, 0),
(5, 'OKe Shop', 6, NULL, NULL, NULL, NULL, 'Kostumku untukmu.', 'shop/S2Ocy1pAcxVp4qxDYlCMnD4THhkjSv1rYizzjHgr.png', '082199484912', NULL, 0, '2018-08-02 01:53:29', '2018-08-02 01:53:29', 'Pakis III No.33, RT.001/RW.03, Pakis, Kec. Sawahan, Kota SBY, Jawa Timur 60256, Indonesia', -7.285962899999999, NULL),
(6, 'resti Shop', 7, NULL, NULL, NULL, NULL, 'cjbdsucdcfds', 'shop/4RuwDjiOC4InPYhGteWc5DAukeww68sMAj5KP5t6.png', '082199484980', NULL, 0, '2018-08-02 02:05:22', '2018-08-02 02:05:22', 'Jl. Ngagel Jaya Tengah V No.6, RT.006/RW.03, Pucang Sewu, Gubeng, Kota SBY, Jawa Timur 60283, Indonesia', -7.290369999999999, 112.75306699999999),
(7, 'Socka', 8, NULL, 'Jawa Timur', 'Banyuwangi', 'Jl. MH Thamrin', 'Penyewaan berbagai jenis kostum untuk karnaval dan parade', 'shop/Dvz6v2skQviMCnNfdXVbOpRilTbsu4V1LxrB1qFh.jpeg', '082199482921', NULL, 0, '2018-08-05 23:24:45', '2018-08-05 23:24:45', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_images`
--

CREATE TABLE `shop_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_location`
--

CREATE TABLE `shop_location` (
  `id` int(11) NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `city` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `location_lat` double NOT NULL,
  `location_lang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Anak S', '2018-06-24 03:15:43', '2018-06-24 03:15:43'),
(2, 'Anak M', '2018-06-24 03:15:43', '2018-06-24 03:15:43'),
(3, 'Anak L', NULL, NULL),
(4, 'Anak XL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Dewasa S', NULL, NULL),
(6, 'Dewasa M', NULL, NULL),
(7, 'Dewasa L', NULL, NULL),
(8, 'Dewasa XL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `first_name`, `last_name`, `phone_number`, `date_of_birth`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$7LrEjv2Vd8imBae9gHG9kOJCSsGJRTWnU3OKbMt1rae4HU6PYCC8i', 'nadia@gmail.com', 'Nadia', 'Resti Permatasari', '082199482921', NULL, NULL, '4XX53JYbQFwCEIPSexcvQ2TQTkgCkVudUTOFeHSbRLjq12bAbS928SROhEW4', '2018-06-24 03:15:45', '2018-06-24 03:15:45'),
(2, '$2y$10$qSX404.XY7QbzJdzNWdMF.4BOeAvracbbGuW.mGGad/vewtSYqzhy', 'nadiaa0409@gmail.com', 'Nadia', 'R', '082299482920', NULL, NULL, 'il867UAESY9Y5IiFl1j1lD74QVa4YpEup4J7KdJDZGZH93PghFCxXWOaqux9', '2018-06-24 17:34:12', '2018-06-29 00:18:54'),
(3, '$2y$10$3hgF64YZay.pHrWd2F55.udT.Jbt00LiGsh8q5.VPjjnUn5nhL.Wu', 'nanda@gmail.com', 'Rahman', 'Nanda', '091028399123', NULL, 'user/9bv8VVAlRFU5MzdFoij4dlO1DqX0ZcYJ1wwq3rkw.jpeg', 'QpxZoPHkYoJaSslPhFxuKV6yFOHhbx0Xy8x8Jtebqe2tEKtQMmlbcF4Vf6Nf', '2018-06-24 22:29:27', '2018-07-26 15:12:01'),
(4, '$2y$10$sFga/mwKi2XmfSTf7giE9utArVthMeF0301BZYHisXySZAAhgcwNm', 'irena@gmail.com', 'irena', 'r', '082199482929', '1996-07-13', NULL, 'BZzdOmZpIgf0bCDPaIGwrLTR8oV7EOHnOvNrShC9oEtVafHwwh722cTAz8Dn', '2018-07-13 01:02:19', '2018-07-13 01:02:19'),
(5, '$2y$10$5/CA91eZwMOnaESlykrF2.vvXe4S7hznM7mAg.bY6TtZyvTAx2ii6', 'detty@gmail.com', 'Detty', 'Santy', '081357254773', '1991-12-12', NULL, 'ieMYnXbwrhY3rNu8ynkKSyLUwEezxRSECMtWXjJWi8gN2osg4jFiusIp8M4K', '2018-07-18 20:59:58', '2018-07-18 20:59:58'),
(6, '$2y$10$Y4bX6A8Zn7cS4D1WVWsZd.IaOfRIM0YXmdvIyBzoJf5l/VE7t1TUm', 'okta@gmail.com', 'Okta', 'P', '082199482990', '1993-10-02', NULL, 'XJYc9YLPSfPAdsTGsvxJdS8EW3kVmMo173Gx2QxHWBbicpblemdkEDC3ClGx', '2018-07-26 18:40:10', '2018-07-26 18:40:10'),
(7, '$2y$10$Kniv7zV.bOZ.DJyWj/pun.TITekBxyx1suHCcAb6iSvxBdleq8pPm', 'resti@gmail.com', 'Resti', 'R', '082199482930', '1996-08-02', NULL, 'Lq7wrG5vQzfs2f02tJBg1LLazxbcZSh0sNPKUUpKc2LhmMr5ImfyHs94Mydj', '2018-08-02 02:01:58', '2018-08-02 02:01:58'),
(8, '$2y$10$EWzYBx0bPkHvyELtE8nD4O6.AXTblNqWblSzg4N9M/75/vABvnLS6', 'akbar@gmail.com', 'M. Arsyil', 'Akbar', '082139128767', NULL, 'user/fhytFuiaB8GkYXDYikSNBc9yeyACPDRLVGhYDEIi.jpeg', 'I9FBYHR7Xp73Dbogfwd47PvSrnbIwVYyWbDNZKtCa9yFwKCaJwEmzVRIGnZN', '2018-08-04 18:14:21', '2018-08-05 04:48:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_product_size_id_foreign` (`product_id`),
  ADD KEY `cart_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fine_order_id_foreign` (`order_id`),
  ADD KEY `fine_shop_id_foreign` (`shop_id`),
  ADD KEY `fine_type_id_foreign` (`type_id`);

--
-- Indexes for table `fine_shop`
--
ALTER TABLE `fine_shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fine_shop_shop_id_foreign` (`shop_id`),
  ADD KEY `fine_shop_type_id_foreign` (`type_id`);

--
-- Indexes for table `fine_type`
--
ALTER TABLE `fine_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_shop_id_foreign` (`shop_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_addresses_id_foreign` (`addresses_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_size_id_foreign` (`product_size_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_review_product_id_foreign` (`product_id`),
  ADD KEY `product_review_user_id_foreign` (`user_id`),
  ADD KEY `product_review_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`),
  ADD KEY `product_sizes_size_id_foreign` (`size_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shoppingcart_user_id_foreign` (`user_id`),
  ADD KEY `shoppingcart_shop_id_foreign` (`shop_id`),
  ADD KEY `shoppingcart_product_id_foreign` (`product_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_user_id_foreign` (`user_id`);

--
-- Indexes for table `shop_images`
--
ALTER TABLE `shop_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_images_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `shop_location`
--
ALTER TABLE `shop_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_location_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fine_shop`
--
ALTER TABLE `fine_shop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `fine_type`
--
ALTER TABLE `fine_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `shop_images`
--
ALTER TABLE `shop_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_location`
--
ALTER TABLE `shop_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product_size_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product_sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `fine_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fine_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  ADD CONSTRAINT `fine_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `fine_type` (`id`);

--
-- Constraints for table `fine_shop`
--
ALTER TABLE `fine_shop`
  ADD CONSTRAINT `fine_shop_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  ADD CONSTRAINT `fine_shop_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `fine_type` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_addresses_id_foreign` FOREIGN KEY (`addresses_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_size_id_foreign` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_review_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_review_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_review_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product_sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shoppingcart_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shoppingcart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_images`
--
ALTER TABLE `shop_images`
  ADD CONSTRAINT `shop_images_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_location`
--
ALTER TABLE `shop_location`
  ADD CONSTRAINT `shop_location_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
