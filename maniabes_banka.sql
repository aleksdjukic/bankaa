-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2021 at 09:16 AM
-- Server version: 5.7.33-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maniabes_banka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', '2020-12-04 11:25:55', '2020-12-04 11:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_items`
--

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu_items`
--

INSERT INTO `admin_menu_items` (`id`, `label`, `label_en`, `link`, `link_en`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`) VALUES
(6, 'KARTICE', 'CARDS', 'kartica_sr', 'kartica_en', 5, 2, NULL, 1, 2, '2021-01-28 10:56:46', '2021-01-29 11:30:11'),
(5, 'RACUNI', 'BILL', 'racuni_sr', 'racuni_en', 4, 1, NULL, 1, 1, '2021-01-28 10:53:51', '2021-01-28 11:11:41'),
(4, 'TEST SR', 'TEST EN', 'test_sr', 'test_en', 0, 0, NULL, 1, 0, '2021-01-28 10:53:38', '2021-01-28 10:56:27'),
(7, 'ŠTEDNJA', NULL, '#', NULL, 4, 3, NULL, 1, 3, '2021-01-28 11:02:07', '2021-03-09 18:29:18'),
(8, 'ACO', NULL, 'ACO', NULL, 7, 4, NULL, 1, 4, '2021-01-28 11:02:33', '2021-03-09 18:29:18'),
(9, 'TEST', NULL, 'TEST', NULL, 0, 5, NULL, 1, 0, '2021-01-28 11:04:22', '2021-01-28 11:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_news`
--

INSERT INTO `category_news` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NOVOST', '2021-02-04 14:44:03', '2021-02-04 14:44:03'),
(2, 'NOVOSTI ZA KREDITE', '2021-02-05 09:47:53', '2021-02-05 09:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `category_properties`
--

CREATE TABLE `category_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_properties`
--

INSERT INTO `category_properties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IMOVINA', '2021-02-04 14:43:54', '2021-02-05 10:46:40'),
(2, 'ODUZETA IMOVINA', '2021-02-05 10:46:29', '2021-02-05 10:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `id_page` int(11) DEFAULT NULL,
  `document` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `id_page`, `document`, `created_at`, `updated_at`) VALUES
(1, 14, 'news-gallery-1610550374-0ywNS-image_template.jpg', '2021-01-13 15:06:14', NULL),
(2, 15, 'image_template.jpg', '2021-01-13 15:09:05', NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_news` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `id_news`, `image`, `created_at`, `updated_at`) VALUES
(1, 11, 'news-gallery-1610550169-zOW5K-image_template.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_istorijas`
--

CREATE TABLE `log_istorijas` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `user_agent` varchar(191) DEFAULT NULL,
  `login_at` varchar(191) DEFAULT NULL,
  `logout_at` varchar(191) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_istorijas`
--

INSERT INTO `log_istorijas` (`id`, `user_id`, `ip_address`, `user_agent`, `login_at`, `logout_at`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', '2021-02-04 15:20:51', '-', 'User', '2021-02-04 14:20:51', '2021-02-04 14:20:51'),
(2, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', '2021-02-05 10:25:52', '-', 'User', '2021-02-05 09:25:52', '2021-02-05 09:25:52'),
(3, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', '2021-02-05 12:03:33', '-', 'User', '2021-02-05 11:03:33', '2021-02-05 11:03:33'),
(4, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', '2021-02-08 08:26:39', '-', 'User', '2021-02-08 07:26:39', '2021-02-08 07:26:39'),
(5, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', '2021-02-15 13:40:40', '-', 'User', '2021-02-15 12:40:40', '2021-02-15 12:40:40'),
(6, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', '2021-02-16 11:50:29', '-', 'User', '2021-02-16 10:50:29', '2021-02-16 10:50:29'),
(7, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', '2021-02-18 11:05:10', '-', 'User', '2021-02-18 10:05:10', '2021-02-18 10:05:10'),
(8, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', '2021-02-19 09:11:35', '-', 'User', '2021-02-19 08:11:35', '2021-02-19 08:11:35'),
(9, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', '2021-02-19 12:36:08', '-', 'User', '2021-02-19 11:36:08', '2021-02-19 11:36:08'),
(10, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', '2021-02-19 15:04:13', '-', 'User', '2021-02-19 14:04:13', '2021-02-19 14:04:13'),
(11, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', '2021-02-26 09:52:16', '2021-02-26 10:08:54', 'User', '2021-02-26 08:52:16', '2021-02-26 09:08:54'),
(12, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', '2021-02-26 10:10:12', '-', 'User', '2021-02-26 09:10:12', '2021-02-26 09:10:12'),
(13, 1, '5.133.1.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', '2021-02-26 12:24:30', '-', 'User', '2021-02-26 11:24:30', '2021-02-26 11:24:30'),
(14, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', '2021-03-01 09:52:57', '2021-03-01 10:33:03', 'User', '2021-03-01 08:52:57', '2021-03-01 09:33:03'),
(15, 9, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', '2021-03-01 10:33:33', '-', 'Super-admin', '2021-03-01 09:33:33', '2021-03-01 09:33:33'),
(16, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', '2021-03-04 08:40:44', '-', 'User', '2021-03-04 07:40:44', '2021-03-04 07:40:44'),
(17, 1, '188.124.203.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Safari/537.36', '2021-03-08 07:28:19', '-', 'User', '2021-03-08 06:28:19', '2021-03-08 06:28:19'),
(18, 1, '185.187.6.203', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', '2021-03-09 18:28:37', '-', 'User', '2021-03-09 17:28:37', '2021-03-09 17:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_11_073824_create_menus_wp_table', 1),
(4, '2017_08_11_074006_create_menu_items_wp_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_11_27_081338_create_news_table', 1),
(7, '2020_11_27_102914_create_galleries_table', 1),
(8, '2020_11_30_124740_create_pages_table', 1),
(9, '2020_11_30_132208_create_properties_table', 1),
(10, '2020_11_30_143753_create_roles_table', 1),
(11, '2020_11_30_145504_create_category_news_table', 2),
(12, '2020_11_30_145608_create_category_properties_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_sr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `content_sr` text COLLATE utf8mb4_unicode_ci,
  `slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_sr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `image`, `title_en`, `title_sr`, `content_en`, `content_sr`, `slug_en`, `slug_sr`, `link`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 1, '1612453255.jpg', 'Novi sajt u upotrebi', 'Novi sajt u upotrebi', '<p>Novi sajt u upotrebi</p>', '<p>Novi sajt u upotrebi</p>', 'novi-sajt-u-upotrebi', 'novi-sajt-u-upotrebi', '', 1, '2021-02-04 14:40:55', '2021-02-04 14:40:55'),
(2, 2, '1612529488.jpg', 'test', 'test', '<p>test</p>', '<p>test</p>', 'test1', 'test1', '', 1, '2021-02-05 09:45:30', '2021-02-05 11:51:28'),
(3, 1, 'default-pictures.jpg', 'NOVOST ADIKO BANKA', 'NOVOST ADIKO BANKA', '<p>NOVOST ADIKO BANKA</p>', '<p>NOVOST ADIKO BANKA</p>', 'novost-adiko-banka', 'novost-adiko-banka', '', 1, '2021-02-05 12:14:05', '2021-02-05 12:14:05'),
(4, 1, 'default-pictures.jpg', 'OLA', 'OLA', '<p>OLA</p>', '<p>OLA</p>', 'ola', 'ola', '', 1, '2021-02-05 12:21:26', '2021-02-05 12:21:26'),
(5, 1, 'default-pictures.jpg', 'OLAA', 'OLAA', '<p>OLAA</p>', '<p>OLAA</p>', 'olaa', 'olaa', '', 1, '2021-02-05 12:26:28', '2021-02-05 12:26:28'),
(6, 1, 'default-pictures.jpg', 'OLAA', 'OLAA', '<p>OLAA</p>', '<p>OLAA</p>', 'olaa1', 'olaa1', '', 1, '2021-02-05 12:27:17', '2021-02-05 12:27:17'),
(7, 1, 'default-pictures.jpg', 'OLA', 'OLA', '<p>OLA</p>', '<p>OLA</p>', 'ola1', 'ola1', '', 1, '2021-02-05 12:29:08', '2021-02-05 12:29:08'),
(8, 2, '1613476247.jpg', 'TEST TEST', 'TEST TEST', '<p>TEST TEST</p>', '<p>TEST TEST</p>', 'test-test1', 'test-test1', 'TEST TEST', 1, '2021-02-16 10:50:47', '2021-02-19 11:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'aco-djukic@hornail.com', '2021-02-03 10:18:16', '2021-02-03 10:18:16'),
(2, 'marko@gmail.com', '2021-02-03 10:18:27', '2021-02-03 10:18:27'),
(3, 'aleksandar.djukic@mania.marketing', '2021-02-04 11:04:24', '2021-02-04 11:04:24'),
(4, 'pero@gmail.com', '2021-02-04 11:06:46', '2021-02-04 11:06:46'),
(5, 'pero@gmail.comm', '2021-02-04 11:07:42', '2021-02-04 11:07:42'),
(6, 'aleksandar.djukic@mania.marketing', '2021-02-04 11:08:27', '2021-02-04 11:08:27'),
(7, 'sandra@gmail.com', '2021-02-04 11:09:22', '2021-02-04 11:09:22'),
(8, 'sandra@gmail.com', '2021-02-04 11:09:44', '2021-02-04 11:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `layout_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_sr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `content_sr` text COLLATE utf8mb4_unicode_ci,
  `slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_sr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title-left_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title-left_sr` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content-left_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content-left_sr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image-left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `layout_id`, `image`, `title_en`, `title_sr`, `content_en`, `content_sr`, `slug_en`, `slug_sr`, `title-left_en`, `title-left_sr`, `content-left_en`, `content-left_sr`, `image-left`, `link`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 1, '1612528334.jpg', 'PAGE 1', 'PAGE 1', '<p>Akcijska ponuda</p>\n\n<p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>', '<p>Akcijska ponuda</p>\n\n<p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>', 'page-1', 'page-1', NULL, NULL, NULL, NULL, NULL, '', 1, '2021-02-05 11:32:14', '2021-02-05 11:32:14'),
(2, 2, '1612528351.jpg', 'PAGE 2', 'PAGE 2', '<p>Akcijska ponuda</p>\n\n<p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>', '<p>Akcijska ponuda</p>\n\n<p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>', 'page-2', 'page-2', NULL, NULL, NULL, NULL, NULL, '', 1, '2021-02-05 11:32:31', '2021-02-05 11:32:31'),
(3, 1, '1612528366.jpg', 'PAGE 3', 'PAGE 3', '<p>Akcijska ponuda</p>\n\n<p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>', '<p>Akcijska ponuda</p>\n\n<p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>', 'page-3', 'page-3', NULL, NULL, NULL, NULL, NULL, '', 1, '2021-02-05 11:32:46', '2021-02-05 11:32:46'),
(4, 1, '1612528382.jpg', 'PAGE 4', 'PAGE 4', '<p>Akcijska ponuda</p>\n\n<p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>', '<p>Akcijska ponuda</p>\n\n<p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>', 'page-4', 'page-4', NULL, NULL, NULL, NULL, NULL, '', 1, '2021-02-05 11:33:02', '2021-02-05 11:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_sr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `content_sr` text COLLATE utf8mb4_unicode_ci,
  `slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_sr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `category_id`, `image`, `title_en`, `title_sr`, `content_en`, `content_sr`, `slug_en`, `slug_sr`, `link`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 2, 'default-pictures.jpg', 'KUCA U CENTRU BANJA LUKE', 'KUCA U CENTRU BANJA LUKE', '<p>KUCA U CENTRU BANJA LUKE</p>', '<p>KUCA U CENTRU BANJA LUKE</p>', 'kuca-u-centru-banja-luke', 'kuca-u-centru-banja-luke', '', 1, '2021-02-05 11:21:49', '2021-02-26 09:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Super-admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `lista_sr` varchar(1000) CHARACTER SET utf8mb4 DEFAULT NULL,
  `lista_en` varchar(1000) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tabela_sr` text CHARACTER SET utf8mb4,
  `tabela_en` text CHARACTER SET utf8mb4,
  `content_sr` text CHARACTER SET utf8mb4,
  `content_en` text CHARACTER SET utf8mb4,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `lista_sr`, `lista_en`, `tabela_sr`, `tabela_en`, `content_sr`, `content_en`, `created_at`, `updated_at`) VALUES
(1, ' <h2>Uslovi akcijeske ponude su</h2>\r\n            <div class=\"list-box\">\r\n                <ul>\r\n                    <li>Iznos kredita do 50.000,00 KM</li>\r\n                    <li>Fiksna kamatna stopa</li>\r\n                    <li>Do 10 godina otplate bez jemaca i hipoteke uz polisu osiguranja korisnika</li>\r\n                    <li>Za nove klijente bez naknade za obradu kredita</li>\r\n                    <li>Troškovi obrade kredita već od 0,2% kreditnog iznosa (za zamjenski dio kredita bez naknade)</li>\r\n                    <li>Mogućnost objedinjavanja više mjesečnih rata u jednu, uz dobijanje dodatnih sredstava</li>\r\n                </ul>\r\n            </div>', ' <h2>Uslovi akcijeske ponude su</h2>\r\n            <div class=\"list-box\">\r\n                <ul>\r\n                    <li>Iznos kredita do 50.000,00 KM</li>\r\n                    <li>Fiksna kamatna stopa</li>\r\n                    <li>Do 10 godina otplate bez jemaca i hipoteke uz polisu osiguranja korisnika</li>\r\n                    <li>Za nove klijente bez naknade za obradu kredita</li>\r\n                    <li>Troškovi obrade kredita već od 0,2% kreditnog iznosa (za zamjenski dio kredita bez naknade)</li>\r\n                    <li>Mogućnost objedinjavanja više mjesečnih rata u jednu, uz dobijanje dodatnih sredstava</li>\r\n                </ul>\r\n            </div>', '<h2>Tabelarni prikaz mjesečnih anuiteta za nenamjenske i zamjenske kredite</h2>\r\n<p>Pored kredita iz Investiciono razvojne banke RS, sa nominalnim kamatnim stopama od 3,39% do 3,99% (EKS od\r\n    3,53% do 4,15%) korisnicima nudimo Kredite iz vlastitih sredstava Banke sa nominalnim kamatnim stopama\r\n    već od 3,5% (EKS 5,96%).</p>\r\n<div class=\"described-list\">\r\n    <h3><span style=\"background-color:#e1e4e8\">Iznos</span></h3>\r\n    <p>U zavisnosti od kreditne sposobnosti klijenta, uz posebnu mogućnost odobravanja dodatnih sredstava,\r\n        maksimalno do 10% od iznosa kredita.</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3><span style=\"background-color:#e1e4e8;width: 100%;\">Rok otplate</span></h3>\r\n    <p>do 25 godina</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3><span style=\"background-color:#e1e4e8\">Kamatna stopa</span></h3>\r\n    <p>Za kredite do 10 godina: 3,99% p.a. fiksna <br>\r\n        Za kredite preko 10 godina: fiksna 3,5% p.a. na period do 5 godina otplate a nakon 5 godina otplate\r\n        kredita kamatna stopa postaje promjenljiva i iznosi 3,5%+ šestomjesečni euribor (minimalno 4,2%,\r\n        maksimalno 5,5%).<br><br>\r\n        EKS je efektivna kamatna stopa u iznosu 5,96% (RS/FBIH) a računala se 05. u mjesecu na bazi iznosa\r\n        100.000,00 KM, dozvoljenog prekoračenja 1.000,00 KM i roka kredita 25 godina, nominalne kamatne\r\n        stope 5,5% i svih drugih poznatih naknada i troškova koji su direktno povezani sa odobravanjem i\r\n        korišćenjem kredita u momentu sačinjavanja letka.</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3><span style=\"background-color:#e1e4e8;width: 100%;\">Naknada za obradu kredita</span></h3>\r\n    <p>0,5% od iznosa kredita</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3><span style=\"background-color:#e1e4e8\">Naknada za vođenje kreditne partije</span></h3>\r\n    <p>1,70 KM mjesečno, unaprijed za cijeli period otplate kredita</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3><span style=\"background-color:#e1e4e8\">Obezbjeđenje</span></h3>\r\n    <p>Mjenice, administrativna zabrana i izjava o zapljeni sredstava<br>\r\n        Hipoteka na nekretninu koja je predmet kupovine/izgradnje<br>\r\n        Za kuće: Polisa osiguranja nekretnine vinkulirana u korist NB u trajanju cjelokupnog roka otplate\r\n        kredita plus<br>\r\n        1 mjesec plaćanje na godišnjem nivou;<br>\r\n        Za stanove: Bez polise osiguranja nekretnine.\r\n    </p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3><span style=\"background-color:#e1e4e8\">Dodatno</span></h3>\r\n    <p>Paket Super Nova plus, dozvoljeno prekoračenje i kreditna kartica Nove banke</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3><span style=\"background-color:#e1e4e8\">Napomena</span></h3>\r\n    <p>Za dodatne informacije posjetite najbližu poslovnu jedinicu Banke i/ ili pogledajte informacioni list\r\n        za stambene kredite Nove banke</p>\r\n</div>\r\n\r\n<p><b>*EKS</b> je efektivna kamatna stopa i izračunata je 5. dana u mjesecu, na bazi iznosa 100.000,00 KM,\r\n    dozvoljenog prekoračenja 1.000,00 KM, navedenog roka otplate kredita, nominalne kamatne stope i svih\r\n    drugih poznatih naknada i troškova koji su direktno povezani sa odobravanjem i korišćenjem kredita u\r\n    momentu sačinjavanja ponude.\r\n</p>\r\n<p>\r\n    Ukoliko se klijent odluči za promjenljivu kamatnu stopu, ista iznosi: šestomjesečni euribor + 3,75%\r\n    (minimalno 3,75%, a maksimalno 5,75%). U tom slučaju, efektivna kamatna stopa iznosi 6,27% (RS/FBIH) i\r\n    računa se 5. dana u mjesecu, na bazi iznosa 100.000,00 KM, dozvoljenog prekoračenja 1.000,00 KM,\r\n    maksimalnog roka otplate kredita, maksimalne nominalne kamatne stope 5,75% i svih drugih poznatih\r\n    naknada i troškova koji su direktno povezani sa odobravanjem i korišćenjem kredita u momentu\r\n    sačinjavanja Kataloga proizvoda.\r\n</p>', '<h2>Tabelarni prikaz mjesečnih anuiteta za nenamjenske i zamjenske kredite</h2>\r\n<p>Pored kredita iz Investiciono razvojne banke RS, sa nominalnim kamatnim stopama od 3,39% do 3,99% (EKS od\r\n    3,53% do 4,15%) korisnicima nudimo Kredite iz vlastitih sredstava Banke sa nominalnim kamatnim stopama\r\n    već od 3,5% (EKS 5,96%).</p>\r\n<div class=\"described-list\">\r\n    <h3 style=\"background-color: #F5F7FA;\">Iznos</h3>\r\n    <p>U zavisnosti od kreditne sposobnosti klijenta, uz posebnu mogućnost odobravanja dodatnih sredstava,\r\n        maksimalno do 10% od iznosa kredita.</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3>Rok otplate</h3>\r\n    <p>do 25 godina</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3>Kamatna stopa</h3>\r\n    <p>Za kredite do 10 godina: 3,99% p.a. fiksna <br>\r\n        Za kredite preko 10 godina: fiksna 3,5% p.a. na period do 5 godina otplate a nakon 5 godina otplate\r\n        kredita kamatna stopa postaje promjenljiva i iznosi 3,5%+ šestomjesečni euribor (minimalno 4,2%,\r\n        maksimalno 5,5%).<br><br>\r\n        EKS je efektivna kamatna stopa u iznosu 5,96% (RS/FBIH) a računala se 05. u mjesecu na bazi iznosa\r\n        100.000,00 KM, dozvoljenog prekoračenja 1.000,00 KM i roka kredita 25 godina, nominalne kamatne\r\n        stope 5,5% i svih drugih poznatih naknada i troškova koji su direktno povezani sa odobravanjem i\r\n        korišćenjem kredita u momentu sačinjavanja letka.</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3>Naknada za obradu kredita</h3>\r\n    <p>0,5% od iznosa kredita</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3>Naknada za vođenje kreditne partije</h3>\r\n    <p>1,70 KM mjesečno, unaprijed za cijeli period otplate kredita</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3>Obezbjeđenje</h3>\r\n    <p>Mjenice, administrativna zabrana i izjava o zapljeni sredstava<br>\r\n        Hipoteka na nekretninu koja je predmet kupovine/izgradnje<br>\r\n        Za kuće: Polisa osiguranja nekretnine vinkulirana u korist NB u trajanju cjelokupnog roka otplate\r\n        kredita plus<br>\r\n        1 mjesec plaćanje na godišnjem nivou;<br>\r\n        Za stanove: Bez polise osiguranja nekretnine.\r\n    </p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3>Dodatno</h3>\r\n    <p>Paket Super Nova plus, dozvoljeno prekoračenje i kreditna kartica Nove banke</p>\r\n</div>\r\n\r\n<div class=\"described-list\">\r\n    <h3>Napomena</h3>\r\n    <p>Za dodatne informacije posjetite najbližu poslovnu jedinicu Banke i/ ili pogledajte informacioni list\r\n        za stambene kredite Nove banke</p>\r\n</div>\r\n\r\n<p><b>*EKS</b> je efektivna kamatna stopa i izračunata je 5. dana u mjesecu, na bazi iznosa 100.000,00 KM,\r\n    dozvoljenog prekoračenja 1.000,00 KM, navedenog roka otplate kredita, nominalne kamatne stope i svih\r\n    drugih poznatih naknada i troškova koji su direktno povezani sa odobravanjem i korišćenjem kredita u\r\n    momentu sačinjavanja ponude.\r\n</p>\r\n<p>\r\n    Ukoliko se klijent odluči za promjenljivu kamatnu stopu, ista iznosi: šestomjesečni euribor + 3,75%\r\n    (minimalno 3,75%, a maksimalno 5,75%). U tom slučaju, efektivna kamatna stopa iznosi 6,27% (RS/FBIH) i\r\n    računa se 5. dana u mjesecu, na bazi iznosa 100.000,00 KM, dozvoljenog prekoračenja 1.000,00 KM,\r\n    maksimalnog roka otplate kredita, maksimalne nominalne kamatne stope 5,75% i svih drugih poznatih\r\n    naknada i troškova koji su direktno povezani sa odobravanjem i korišćenjem kredita u momentu\r\n    sačinjavanja Kataloga proizvoda.\r\n</p>', '<div class=\"leftImage-text\">\r\n                <h2>Akcijska ponuda</h2>\r\n                <p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim\r\n                    privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa\r\n                    kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>\r\n            </div>', '<div class=\"leftImage-text\">\r\n                <h2>Akcijska ponuda</h2>\r\n                <p>Nenamjenski i zamjenski krediti po akciskoj ponudi odobavaju se zaposlenima u budžetskim ili javnim\r\n                    privrednim društvima ili firmama sa većinskim državnim kapitalom, kao i pojedinim preduzećima sa\r\n                    kojima Nova banka ima posebne ugovore o saradnji, uz odgovarajuću visinu primanja</p>\r\n            </div>', '2021-01-13 08:11:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aleksandar Djukic', 'default-user.png', 1, 'djukicaleks91@gmail.com', NULL, '$2y$10$tDRpofv7T6WcNDHRPd1WEeEA79z6/dNZSzKYzJcCh51WiEAUOVF9S', NULL, '2021-02-04 13:34:48', '2021-02-04 13:34:48'),
(2, 'Marko Markovic', 'default-user.png', 1, 'marko@gmail.com', NULL, '$2y$10$snXFsyNWRoOx5RMhzN5z9eEaLeajShvNDVoo395T.6CmEt1kdVJJS', NULL, '2021-02-04 13:35:22', '2021-02-04 13:35:22'),
(3, 'Petar Petrovic', 'default-user.png', 3, 'pero3@gmail.com', NULL, '123mania123', NULL, '2021-02-04 13:37:54', '2021-02-04 13:41:03'),
(4, 'Aleksandar Djukic', 'default-user.png', 1, 'aleksandar.djukic@mania.marketing', NULL, '$2y$10$pSxU/3QzzhLIJH08KO6kROpzGK3LZnY9xGmG811w5xoRIVbpoFhs.', NULL, '2021-02-04 13:44:34', '2021-02-04 13:44:34'),
(5, 'Marko Markovic', 'default-user.png', 1, 'podrska@mania.marketinga', NULL, '$2y$10$a4H7qKGD.EaGGhGKs3TYHuOY4nc9sfZgZobKljoT2OVY/WyBQqPdO', NULL, '2021-02-04 13:47:08', '2021-02-04 13:47:08'),
(6, 'Zeljko Petroviccc', 'default-user.png', 1, 'zeljko1@gmail.com', NULL, '123mania123a', NULL, '2021-02-04 13:58:55', '2021-02-04 14:03:10'),
(7, 'Milos Milosevic', 'default-user.png', 1, 'milos@gmail.com', NULL, '$2y$10$4vYD.CDDzPY51QyDT.S7Sus5PR0h2mWDTB3ABL0rFjPk6DfqD5OmK', NULL, '2021-02-04 14:19:16', '2021-02-04 14:19:16'),
(8, 'Zeljko Mitrovic', '1612527852.jpg', 1, 'zeljkec@gmail.com', NULL, '$2y$10$4/JEKnsGp.TcT6CIDYGifOvaagAIJWKHioZIcGBnPhrP1nlFx2iNa', NULL, '2021-02-04 14:21:13', '2021-02-05 11:24:13'),
(9, 'Nova Banka', 'default-user.png', 3, 'banka@gmail.com', NULL, '$2y$12$79fx6/ZQS6T4NLeWdaCsp.iGgyiQJzcJzi8J8yKIIHHSRLuUFTNtu', NULL, '2021-03-01 08:53:32', '2021-03-01 08:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `users_activities`
--

CREATE TABLE `users_activities` (
  `id` int(11) NOT NULL,
  `log_id` int(10) DEFAULT NULL,
  `users_activity` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_activities`
--

INSERT INTO `users_activities` (`id`, `log_id`, `users_activity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dodavanje korisnika: \"Zeljko Mitrovic\"', '2021-02-04 14:21:13', '2021-02-04 14:21:13'),
(2, 1, 'Izmjena korisnika: \"Zeljko Mitrovic\"', '2021-02-04 14:32:20', '2021-02-04 14:32:20'),
(3, 1, 'Izmjena korisnika: \"Zeljko Mitrovic\"', '2021-02-04 14:35:12', '2021-02-04 14:35:12'),
(4, 1, 'Dodavanje novosti: \"Novi sajt u upotrebi\"', '2021-02-04 14:40:55', '2021-02-04 14:40:55'),
(5, 1, 'Dodavanje kategorije imovine: \"IMOVINA\"', '2021-02-04 14:43:54', '2021-02-04 14:43:54'),
(6, 1, 'Dodavanje kategorije novosti: \"NOVOST\"', '2021-02-04 14:44:03', '2021-02-04 14:44:03'),
(7, 2, 'Dodavanje novosti: \"test\"', '2021-02-05 09:45:30', '2021-02-05 09:45:30'),
(8, 2, 'Dodavanje kategorije novosti: \"NOVOSTI ZA KREDITE\"', '2021-02-05 09:47:53', '2021-02-05 09:47:53'),
(9, 2, 'Dodavanje kategorije imovine: \"ODUZETA IMOVINA\"', '2021-02-05 10:46:29', '2021-02-05 10:46:29'),
(10, 2, 'Izmjena kategorije imovine: \"IMOVINAA\"', '2021-02-05 10:46:35', '2021-02-05 10:46:35'),
(11, 2, 'Izmjena kategorije imovine: \"IMOVINA\"', '2021-02-05 10:46:40', '2021-02-05 10:46:40'),
(12, 3, 'Dodavanje imovine: \"KUCA U CENTRU BANJA LUKE\"', '2021-02-05 11:21:49', '2021-02-05 11:21:49'),
(13, 3, 'Izmjena korisnika: \"Zeljko Mitrovic\"', '2021-02-05 11:24:13', '2021-02-05 11:24:13'),
(14, 3, 'Dodavanje stranice: \"PAGE 1\"', '2021-02-05 11:32:14', '2021-02-05 11:32:14'),
(15, 3, 'Dodavanje stranice: \"PAGE 2\"', '2021-02-05 11:32:31', '2021-02-05 11:32:31'),
(16, 3, 'Dodavanje stranice: \"PAGE 3\"', '2021-02-05 11:32:46', '2021-02-05 11:32:46'),
(17, 3, 'Dodavanje stranice: \"PAGE 4\"', '2021-02-05 11:33:02', '2021-02-05 11:33:02'),
(18, 3, 'Izmjena novosti: \"test\"', '2021-02-05 11:51:28', '2021-02-05 11:51:28'),
(19, 3, 'Dodavanje novosti: \"NOVOST ADIKO BANKA\"', '2021-02-05 12:14:05', '2021-02-05 12:14:05'),
(20, 3, 'Dodavanje novosti: \"OLA\"', '2021-02-05 12:21:26', '2021-02-05 12:21:26'),
(21, 3, 'Dodavanje novosti: \"OLAA\"', '2021-02-05 12:26:28', '2021-02-05 12:26:28'),
(22, 3, 'Dodavanje novosti: \"OLAA\"', '2021-02-05 12:27:17', '2021-02-05 12:27:17'),
(23, 3, 'Dodavanje novosti: \"OLA\"', '2021-02-05 12:29:08', '2021-02-05 12:29:08'),
(24, 6, 'Dodavanje novosti: \"TEST TEST\"', '2021-02-16 10:50:47', '2021-02-16 10:50:47'),
(25, 7, 'Izmjena novosti: \"TEST TEST\"', '2021-02-18 10:05:36', '2021-02-18 10:05:36'),
(26, 14, 'Dodavanje korisnika: \"Nova Banka\"', '2021-03-01 08:53:32', '2021-03-01 08:53:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_menu_items_menu_foreign` (`menu`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_properties`
--
ALTER TABLE `category_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_id_news_foreign` (`id_news`);

--
-- Indexes for table `log_istorijas`
--
ALTER TABLE `log_istorijas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_properties`
--
ALTER TABLE `category_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_istorijas`
--
ALTER TABLE `log_istorijas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
