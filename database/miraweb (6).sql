-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 10:41 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miraweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` double(10,4) NOT NULL DEFAULT 0.0000,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activation_codes`
--

CREATE TABLE `activation_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activation_codes`
--

INSERT INTO `activation_codes` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(4, 80, 'L4qkjDI9Yd3X13RzJ76jlqMpHFqHGSukWjzEoSJvSgS4DjRGCWssyNqb0BkW9gWsMVXWRirXqIjtRkDIpmQALUonbSFUQVpN5ZhioWz4Ts9XhEr94sRmfAe53GhOpGjY', '2021-09-15 19:59:18', '2021-09-15 19:59:18'),
(5, 81, '73SClLwiWAWUphKxBP9WJnDfobc4G5H6moASyAginnFJD39AYCSfObIiJz6FQykkAeDuF4ExZIYRWWcjG7w7ofY3cVqM3vv1Cj5IA3CgnFGxdzjz1IXD6p0XwkGxQF1P', '2021-09-15 20:07:45', '2021-09-15 20:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_transactions`
--

CREATE TABLE `admin_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_transaction_id` int(11) DEFAULT NULL,
  `giftcard_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airtime_confirmations`
--

CREATE TABLE `airtime_confirmations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `network` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenshot` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Submitted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airtime_confirmations`
--

INSERT INTO `airtime_confirmations` (`id`, `user_id`, `from`, `network`, `amount`, `receive`, `screenshot`, `status`, `created_at`, `updated_at`) VALUES
(1, 63, '08035568902', 'MTN', '800', '560.00', '1610596996sap.JPG', 'Approved', '2021-01-14 03:03:16', '2021-01-14 15:22:06'),
(2, 64, '08035460244', 'MTN', '1000', '700.00', '1613207268#EndSars.jpg', 'Submitted', '2021-02-13 08:07:48', '2021-02-13 08:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_account_id` int(11) NOT NULL,
  `card_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double NOT NULL,
  `expiration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `card_account_id`, `card_id`, `billing_name`, `balance`, `expiration`, `created_at`, `updated_at`) VALUES
(1, 30, 846963, '37150ea5-7e4c-45d6-95fe-419744db7838', 'Ifeanyi Kelvin', 3200, '2023-12', '2020-12-15 09:12:39', '2020-12-15 17:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Amazon', '2020-10-28 12:39:13', '2020-10-28 12:39:13'),
(2, 'Apple Store', '2020-10-28 12:39:13', '2020-10-28 12:39:13'),
(3, 'Ali Express', '2020-11-29 05:30:20', '2020-11-29 05:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ifeanyi Kelvin', 'nwidehifeanyi@gmail.com', 'Please Update your Application', 'Lee Munroe is an Email Designer and Developer based in San Francisco, California.\r\n\r\nLee was Design Lead at Mailgun, an email service for developers, where he open-sourced email tools for developers including an automated workflow. His GitHub stars for email tools amount to over 20,000.\r\n\r\nAs well as open-sourcing software, Lee speaks at leading industry conferences about email development including Litmus Email Design Conference, WebU Frontend Conference, Future of Web Design, O\'Reilly Fluent Conference.\r\n\r\nLee Munroe is an Email Designer and Developer based in San Francisco, California.\r\n\r\nLee was Design Lead at Mailgun, an email service for developers, where he open-sourced email tools for developers including an automated workflow. His GitHub stars for email tools amount to over 20,000.\r\n\r\nAs well as open-sourcing software, Lee speaks at leading industry conferences about email development including Litmus Email Design Conference, WebU Frontend Conference, Future of Web Design, O\'Reilly Fluent Conference.\r\n\r\nThanks', '2020-12-22 15:08:54', '2020-12-22 15:08:54'),
(2, 'Ifeanyi Kelvin', 'nwidehifeanyi@gmail.com', 'My Btc don Hang', 'Hello boss,\r\n Trust you are doing good.\r\n\r\nMessage: Lee Munroe is an Email Designer and Developer based in San Francisco, California. Lee was Design Lead at Mailgun, an email service for developers, where he open-sourced email tools for developers including an automated workflow. His GitHub stars for email tools amount to over 20,000. As well as open-sourcing software, Lee speaks at leading industry conferences about email development including Litmus Email Design Conference, WebU Frontend Conference, Future of Web Design, O\'Reilly Fluent Conference. Lee Munroe is an Email Designer and Developer based in San Francisco, California. Lee was Design Lead at Mailgun, an email service for developers, where he open-sourced email tools for developers including an automated workflow. His GitHub stars for email tools amount to over 20,000. As well as open-sourcing software, Lee speaks at leading industry conferences about email development including Litmus Email Design Conference, WebU Frontend Conference, Future of Web Design, O\'Reilly Fluent Conference. \r\nThanks', '2020-12-22 15:11:16', '2020-12-22 15:11:16'),
(3, 'Ifeanyi Kelvin', 'nwidehifeanyi@gmail.com', 'Enquiry', 'compliments', '2020-12-24 23:56:48', '2020-12-24 23:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `digital_assets`
--

CREATE TABLE `digital_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `digital_assets`
--

INSERT INTO `digital_assets` (`id`, `type`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', 500.00, '2020-11-28 22:00:00', '2020-11-29 05:28:50'),
(2, 'Perfect Money', 80.00, '2020-11-28 22:00:00', '2020-11-28 22:00:00'),
(3, 'Cash App', 70.00, NULL, NULL),
(4, 'Payoneer', 40.00, '2020-11-28 22:00:00', '2020-11-28 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_uploads`
--

CREATE TABLE `file_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giftcards`
--

CREATE TABLE `giftcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giftcard_amt` double NOT NULL,
  `calculated_amount` double NOT NULL,
  `file` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Waiting Approval',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_securities`
--

CREATE TABLE `login_securities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `google2fa_enable` tinyint(1) NOT NULL DEFAULT 0,
  `google2fa_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_securities`
--

INSERT INTO `login_securities` (`id`, `user_id`, `google2fa_enable`, `google2fa_secret`, `created_at`, `updated_at`) VALUES
(13, 62, 1, '4AHTXWHYC35NRA5U', '2021-01-09 09:09:11', '2021-02-10 09:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
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
(16, '2020_08_12_202838_create_activation_codes_table', 1),
(17, '2020_08_13_113349_create_jobs_table', 1),
(18, '2020_08_19_072335_create_sub_categories_table', 1),
(19, '2020_08_25_134413_create_gift_card_table', 1),
(20, '2020_08_30_163434_create_user_transactions_table', 1),
(21, '2020_08_30_163826_create_admin_transactions_table', 1),
(22, '2020_08_30_171256_create_file_uploads_table', 1),
(23, '2020_09_08_023009_create_accounts_table', 1),
(24, '2020_09_09_162619_create_withdrawal_table', 1),
(25, '2020_09_15_234036_create_roles_table', 1),
(26, '2020_09_15_234111_create_notifications_table', 1),
(27, '2020_09_16_065608_create_categories_table', 1),
(28, '2020_09_17_132749_create_digital_assets_table', 1),
(29, '2020_11_05_234743_create_refills_table', 1),
(30, '2020_11_26_092908_create_systems_table', 1),
(31, '2020_12_11_151705_create_stages_table', 2),
(32, '2020_12_11_151758_add_stages_to_users_table', 2),
(33, '2020_12_14_171649_create_cards_table', 3),
(34, '2020_12_22_141111_create_contacts_table', 4),
(35, '2021_01_07_160310_create_login_securities_table', 5),
(36, '2021_01_13_164038_create_airtime_confirmations_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nwidehifeanyi@gmail.com', '$2y$10$SYqjjMhxNywc3f1QfnKcxOuPDFAO18GfwI/B1aN75S4QnhKygXRfS', '2021-10-14 18:53:02'),
('scotty@gmail.com', '$2y$10$512RmthT7BWF9PJQqDBMkeAbjA6Ik669CUh303TxoR0S805dBYoua', '2021-10-14 18:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `refills`
--

CREATE TABLE `refills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refills`
--

INSERT INTO `refills` (`id`, `data`, `expiry`, `created_at`, `updated_at`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiI1ZjliZTU4ZGMxMTZhZTAyNzE4NmYzOTkiLCJleHAiOjE2MzE4OTk1NTA4Mjd9.rlU-qaIgeU4Hrdln6dbN7V375jSZHiZ6wGpDPqkKfAA', '2021-09-17 04:25:50', '2020-11-04 22:00:00', '2021-09-15 16:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', NULL, NULL),
(2, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `level`, `limit`, `created_at`, `updated_at`) VALUES
(1, 'Default Level', 50000, NULL, NULL),
(2, 'Level 1', 50000000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Germany Amazon (Cash Receipt)', 1, 23000, '2020-10-28 12:39:13', '2020-10-28 12:39:13'),
(2, 'Germany Amazon (No Receipt)', 1, 22000, '2020-10-28 12:39:13', '2020-10-28 12:39:13'),
(3, 'UK Amazon (Cash Receipt)', 1, 28000, '2020-10-28 12:39:13', '2020-10-28 12:39:13'),
(4, 'Germany Amazon (No Receipt)', 1, 19000, '2020-10-28 12:39:13', '2020-10-28 12:39:13'),
(5, 'Germany Apple Store (Cash Receipt)', 2, 40000, '2020-10-28 12:39:13', '2020-10-28 12:39:13'),
(6, 'Germany Apple Store (No Receipt)', 2, 600, '2020-10-28 12:39:13', '2020-10-28 12:39:13'),
(7, 'Nigeria Apple Store (Cash Receipt)', 2, 1000, '2020-10-28 12:39:13', '2020-10-28 12:39:13'),
(8, 'Lagos Apple Store (Cash Receipt)', 2, 40000, '2020-10-28 12:39:13', '2020-10-28 12:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`id`, `company_name`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Miraweb Ltd', 'miraweb000', '2020-11-25 22:00:00', '2020-11-25 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('deposit','withdraw') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payable_type`, `payable_id`, `wallet_id`, `type`, `amount`, `confirmed`, `meta`, `uuid`, `created_at`, `updated_at`) VALUES
(2, 'App\\User', 30, 7, 'deposit', '600', 1, NULL, '969ec91b-0ed8-42ed-9528-d4347d6c6d78', '2020-12-14 15:00:15', '2020-12-14 15:00:15'),
(3, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '152c5538-9b71-46f3-85ce-19c73688059a', '2020-12-14 15:00:15', '2020-12-14 15:00:15'),
(4, 'App\\User', 30, 7, 'deposit', '1000', 1, NULL, '89621309-22aa-4039-a356-8679c6114e1a', '2020-12-14 15:07:48', '2020-12-14 15:07:48'),
(5, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '0f8f1091-c451-469b-b15d-f4e2faf3448d', '2020-12-14 15:07:48', '2020-12-14 15:07:48'),
(6, 'App\\User', 30, 7, 'deposit', '200', 1, NULL, '1e186626-caf8-4399-98b8-4925ae6e7686', '2020-12-14 15:11:00', '2020-12-14 15:11:00'),
(7, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '094f5ccd-19d2-4f14-b055-403a977a5e65', '2020-12-14 15:11:00', '2020-12-14 15:11:00'),
(8, 'App\\User', 30, 7, 'deposit', '400', 1, NULL, '22800818-45ab-4671-ad7f-41cf7c3cf708', '2020-12-14 15:17:14', '2020-12-14 15:17:14'),
(9, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '45e7f9b2-a881-4de4-bb5b-1f1d27af62a1', '2020-12-14 15:17:14', '2020-12-14 15:17:14'),
(10, 'App\\User', 30, 7, 'deposit', '200', 1, NULL, 'b7be34c8-0003-44bb-80c7-cf81f822640d', '2020-12-14 15:19:57', '2020-12-14 15:19:57'),
(11, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '2edd3e2f-9423-406e-b4ea-9e641d36ffd4', '2020-12-14 15:19:57', '2020-12-14 15:19:57'),
(12, 'App\\User', 30, 7, 'deposit', '900', 1, NULL, '1de9cd76-66a0-4330-ac88-0ad8bade8177', '2020-12-14 15:37:14', '2020-12-14 15:37:14'),
(13, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '3bd40bf0-bdf8-4ca8-beac-d28467bcd380', '2020-12-14 15:37:14', '2020-12-14 15:37:14'),
(14, 'App\\System', 1, 8, 'deposit', '1900', 1, NULL, 'b25ff5d4-bf27-453e-8517-b4773543eb4b', '2020-12-15 00:00:36', '2020-12-15 00:00:36'),
(15, 'App\\System', 1, 8, 'deposit', '1900', 1, NULL, '13098e1e-89e9-43b6-9ee4-d1f65e818d91', '2020-12-15 00:02:01', '2020-12-15 00:02:01'),
(16, 'App\\User', 30, 7, 'withdraw', '-200', 1, NULL, '10097a84-0647-4f73-ab3b-d6730b9aacaa', '2020-12-15 17:27:50', '2020-12-15 17:27:50'),
(17, 'App\\User', 30, 7, 'withdraw', '-109', 1, NULL, '98b4ae64-3242-42d1-8361-d02ea0253c9d', '2020-12-16 05:43:48', '2020-12-16 05:43:48'),
(18, 'App\\System', 1, 8, 'deposit', '109', 1, NULL, '4495c26b-a3da-4451-8716-54d36fc57998', '2020-12-16 05:43:48', '2020-12-16 05:43:48'),
(19, 'App\\User', 30, 7, 'withdraw', '-75', 1, NULL, 'ef64b807-c245-46e6-a439-fa2f31f10a0b', '2020-12-16 06:58:09', '2020-12-16 06:58:09'),
(20, 'App\\System', 1, 8, 'deposit', '75', 1, NULL, 'bb3926ed-6d96-4341-b698-59ab012c60a6', '2020-12-16 06:58:09', '2020-12-16 06:58:09'),
(21, 'App\\User', 30, 7, 'withdraw', '-110', 1, NULL, '023a9814-8e0d-42a2-9d04-0f66aeb7a5a9', '2020-12-16 08:05:45', '2020-12-16 08:05:45'),
(22, 'App\\System', 1, 8, 'deposit', '110', 1, NULL, '165dcb0e-05d5-4645-b9ec-ea43d50a7d25', '2020-12-16 08:05:45', '2020-12-16 08:05:45'),
(23, 'App\\User', 30, 7, 'withdraw', '-200', 1, NULL, '41114323-7dc0-4d38-ada3-935f883f80dc', '2020-12-16 10:02:18', '2020-12-16 10:02:18'),
(24, 'App\\System', 1, 8, 'deposit', '200', 1, NULL, '633626be-520c-4962-b8ee-96a03a8f5d67', '2020-12-16 10:02:18', '2020-12-16 10:02:18'),
(25, 'App\\User', 30, 7, 'withdraw', '-20', 1, NULL, 'd79ecf97-46e2-45bd-8b8a-3592da94ae7c', '2020-12-16 10:27:16', '2020-12-16 10:27:16'),
(26, 'App\\System', 1, 8, 'deposit', '20', 1, NULL, 'f6fcd671-0a64-4513-9bc5-99e38bdc819e', '2020-12-16 10:27:16', '2020-12-16 10:27:16'),
(27, 'App\\User', 62, 45, 'withdraw', '-50', 1, NULL, '9bcb7732-3233-4a8e-b4aa-879a84cf3a96', '2020-12-23 06:46:35', '2020-12-23 06:46:35'),
(28, 'App\\System', 1, 8, 'deposit', '50', 1, NULL, 'ec64fc1d-8dc9-410c-b6ec-bbd42535b993', '2020-12-23 06:46:35', '2020-12-23 06:46:35'),
(29, 'App\\User', 62, 44, 'deposit', '0', 1, NULL, '2df6eda5-fde5-424e-8cc6-6084b5036200', '2020-12-23 06:46:36', '2020-12-23 06:46:36'),
(30, 'App\\User', 62, 45, 'withdraw', '-100', 1, NULL, '1aeaf0d5-00a9-475e-96bf-50758c4d4ada', '2020-12-23 09:55:09', '2020-12-23 09:55:09'),
(31, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '0fd15a27-b3af-4dbf-b210-16b52e0742e9', '2020-12-23 09:55:09', '2020-12-23 09:55:09'),
(32, 'App\\User', 62, 44, 'deposit', '0', 1, NULL, 'd4f3c760-a4f1-4053-b0a7-6ba1d70787e9', '2020-12-23 09:55:11', '2020-12-23 09:55:11'),
(33, 'App\\User', 62, 45, 'withdraw', '-100', 1, NULL, 'f2678362-17e4-4cdd-90b5-0b2c7e5b36dd', '2020-12-23 10:06:17', '2020-12-23 10:06:17'),
(34, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '38a5e09a-e33a-487e-b8dd-866991397e79', '2020-12-23 10:06:17', '2020-12-23 10:06:17'),
(35, 'App\\User', 62, 44, 'deposit', '0', 1, NULL, '0f0cf88d-b215-484d-af7a-4544c7f4b7dc', '2020-12-23 10:06:18', '2020-12-23 10:06:18'),
(36, 'App\\User', 62, 45, 'withdraw', '-20', 1, NULL, '271c1571-af88-4a1f-9674-f5adae8511b4', '2020-12-24 08:16:39', '2020-12-24 08:16:39'),
(37, 'App\\System', 1, 8, 'deposit', '20', 1, NULL, '1111c0a8-ba01-400e-9669-273e435a6b7c', '2020-12-24 08:16:39', '2020-12-24 08:16:39'),
(38, 'App\\User', 62, 44, 'deposit', '0', 1, NULL, '4666e394-2dcf-4f7e-ad13-628b3c55fab1', '2020-12-24 08:16:41', '2020-12-24 08:16:41'),
(39, 'App\\User', 62, 45, 'withdraw', '-30', 1, NULL, '49191beb-3cc2-429b-84d6-149a462ca006', '2020-12-24 08:47:30', '2020-12-24 08:47:30'),
(40, 'App\\System', 1, 8, 'deposit', '30', 1, NULL, 'd3e07128-be3b-4cef-b8e1-bc6c86c66275', '2020-12-24 08:47:30', '2020-12-24 08:47:30'),
(41, 'App\\User', 62, 44, 'deposit', '0', 1, NULL, '968a7179-7466-4437-bf5a-0edacef85d08', '2020-12-24 08:47:31', '2020-12-24 08:47:31'),
(42, 'App\\User', 62, 45, 'withdraw', '-30', 1, NULL, '727bd627-e533-4711-b626-0f96d16f2435', '2020-12-24 08:50:21', '2020-12-24 08:50:21'),
(43, 'App\\System', 1, 8, 'deposit', '30', 1, NULL, '8d4d69f8-c1b9-4227-8b17-d878319193ad', '2020-12-24 08:50:21', '2020-12-24 08:50:21'),
(44, 'App\\User', 62, 45, 'withdraw', '-30', 1, NULL, 'a18cfcb7-317e-4d15-a618-e5acb61f5cab', '2020-12-24 08:52:25', '2020-12-24 08:52:25'),
(45, 'App\\System', 1, 8, 'deposit', '30', 1, NULL, '26de442d-ffc8-4611-bf58-e3865bbe0eae', '2020-12-24 08:52:25', '2020-12-24 08:52:25'),
(46, 'App\\User', 62, 44, 'deposit', '0', 1, NULL, '7dc4f485-1047-4730-bacc-a535eed9dc82', '2020-12-24 08:52:26', '2020-12-24 08:52:26'),
(47, 'App\\User', 62, 45, 'withdraw', '-20', 1, NULL, '4633fa73-431f-4150-8cab-a62ebcf25a13', '2020-12-24 08:59:24', '2020-12-24 08:59:24'),
(48, 'App\\System', 1, 8, 'deposit', '20', 1, NULL, '9ad9afc4-e046-4bea-b4e1-bb297bf9ffa0', '2020-12-24 08:59:24', '2020-12-24 08:59:24'),
(49, 'App\\User', 62, 44, 'deposit', '0', 1, NULL, '18595e0a-d16d-4ed0-a973-8be60b9858f9', '2020-12-24 08:59:25', '2020-12-24 08:59:25'),
(50, 'App\\System', 1, 8, 'withdraw', '-30', 1, NULL, '89442dc0-9a46-4851-a2bc-8d788b7c0707', '2020-12-24 09:01:29', '2020-12-24 09:01:29'),
(51, 'App\\User', 62, 45, 'deposit', '30', 1, NULL, '8d3824c7-f6e7-4da6-9571-91edffd1f7dc', '2020-12-24 09:01:29', '2020-12-24 09:01:29'),
(52, 'App\\System', 1, 8, 'withdraw', '-10', 1, NULL, '0ab3acb2-584f-4d75-9512-d52a291014d2', '2020-12-24 09:12:04', '2020-12-24 09:12:04'),
(53, 'App\\User', 62, 45, 'deposit', '10', 1, NULL, 'a1b1d76f-7b69-4372-9c59-71509eccca35', '2020-12-24 09:12:04', '2020-12-24 09:12:04'),
(54, 'App\\System', 1, 8, 'withdraw', '-560', 1, NULL, 'ed14cdb6-e38f-4e47-ae94-4ee51dcfd216', '2021-01-14 15:13:17', '2021-01-14 15:13:17'),
(55, 'App\\User', 63, 47, 'deposit', '560', 1, NULL, '86aedee8-09eb-4485-b7e1-4e2d1517fb96', '2021-01-14 15:13:17', '2021-01-14 15:13:17'),
(56, 'App\\System', 1, 8, 'withdraw', '-560', 1, NULL, 'cd877a08-4568-4f5a-9da3-f2601dcad9cf', '2021-01-14 15:22:06', '2021-01-14 15:22:06'),
(57, 'App\\User', 63, 47, 'deposit', '560', 1, NULL, '3fc76482-93e0-4a67-b20b-ca3ba7953adf', '2021-01-14 15:22:06', '2021-01-14 15:22:06'),
(58, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '03c901d9-71b6-434b-96b5-5b340ee88e04', '2021-01-29 10:57:05', '2021-01-29 10:57:05'),
(59, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '186231a2-e59a-45c3-8bcf-d84cb15e93f4', '2021-01-29 11:04:20', '2021-01-29 11:04:20'),
(60, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '1642afce-97d9-4fbc-a5f5-783ee0267f9b', '2021-01-29 11:12:38', '2021-01-29 11:12:38'),
(61, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '25f869dc-db54-4bc1-b036-767b5e550cf4', '2021-01-29 11:14:04', '2021-01-29 11:14:04'),
(62, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '2b379433-f0a4-40dd-9f50-21bf8378ebd2', '2021-01-29 14:26:23', '2021-01-29 14:26:23'),
(63, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '3df69f63-b3c6-4c3f-b167-f1650bf1013d', '2021-01-29 15:15:22', '2021-01-29 15:15:22'),
(64, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '6936e55e-98be-4775-9841-e4170cd489c8', '2021-01-29 15:17:25', '2021-01-29 15:17:25'),
(65, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, '0095feee-2233-420d-882b-c571d234300e', '2021-01-29 15:20:57', '2021-01-29 15:20:57'),
(66, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, 'c23459d7-72d7-4c20-9a41-5e1d47e3b8bf', '2021-01-29 15:27:43', '2021-01-29 15:27:43'),
(67, 'App\\System', 1, 8, 'deposit', '100', 1, NULL, 'd4ad0b48-7de2-41c3-86cf-6ad03c88ff2f', '2021-01-29 15:33:42', '2021-01-29 15:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT 0,
  `fee` decimal(64,0) NOT NULL DEFAULT 0,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `from_type`, `from_id`, `to_type`, `to_id`, `status`, `status_last`, `deposit_id`, `withdraw_id`, `discount`, `fee`, `uuid`, `created_at`, `updated_at`) VALUES
(2, 'Bavix\\Wallet\\Models\\Wallet', 7, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 18, 17, '0', '0', '19a0a518-5ff7-4c38-9663-8fe762b85c65', '2020-12-16 05:43:48', '2020-12-16 05:43:48'),
(3, 'Bavix\\Wallet\\Models\\Wallet', 7, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 20, 19, '0', '0', 'd0a28d1e-9384-4d2f-b2eb-0ac791790206', '2020-12-16 06:58:09', '2020-12-16 06:58:09'),
(4, 'Bavix\\Wallet\\Models\\Wallet', 7, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 22, 21, '0', '0', '5564e5dd-6590-4db8-bada-5f5176404851', '2020-12-16 08:05:45', '2020-12-16 08:05:45'),
(5, 'Bavix\\Wallet\\Models\\Wallet', 7, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 24, 23, '0', '0', '02161a2b-6b25-4a38-b629-9a251a0c1b89', '2020-12-16 10:02:18', '2020-12-16 10:02:18'),
(6, 'Bavix\\Wallet\\Models\\Wallet', 7, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 26, 25, '0', '0', '07ed71c2-1206-48ad-b826-aed5bcdfd8b1', '2020-12-16 10:27:16', '2020-12-16 10:27:16'),
(7, 'Bavix\\Wallet\\Models\\Wallet', 45, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 28, 27, '0', '0', 'ceb7249f-4a65-41e9-acbc-ac434bbc7b6a', '2020-12-23 06:46:35', '2020-12-23 06:46:35'),
(8, 'Bavix\\Wallet\\Models\\Wallet', 45, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 31, 30, '0', '0', 'ac8be645-26aa-457e-be23-7edecdcb7a39', '2020-12-23 09:55:09', '2020-12-23 09:55:09'),
(9, 'Bavix\\Wallet\\Models\\Wallet', 45, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 34, 33, '0', '0', 'ba1f22df-74d9-44dd-a61f-f80f9533acc4', '2020-12-23 10:06:17', '2020-12-23 10:06:17'),
(10, 'Bavix\\Wallet\\Models\\Wallet', 45, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 37, 36, '0', '0', '025735b6-f9dd-4a35-8fd8-be09ed52e1bf', '2020-12-24 08:16:39', '2020-12-24 08:16:39'),
(11, 'Bavix\\Wallet\\Models\\Wallet', 45, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 40, 39, '0', '0', '8587077a-093c-4b0b-a3d7-d2113e74c57a', '2020-12-24 08:47:30', '2020-12-24 08:47:30'),
(12, 'Bavix\\Wallet\\Models\\Wallet', 45, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 43, 42, '0', '0', '495315f2-abc1-4bd9-b212-5311ab2ded77', '2020-12-24 08:50:21', '2020-12-24 08:50:21'),
(13, 'Bavix\\Wallet\\Models\\Wallet', 45, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 45, 44, '0', '0', '8baeb1a4-f64c-4ee2-bf62-97c0075d5a64', '2020-12-24 08:52:25', '2020-12-24 08:52:25'),
(14, 'Bavix\\Wallet\\Models\\Wallet', 45, 'Bavix\\Wallet\\Models\\Wallet', 8, 'transfer', NULL, 48, 47, '0', '0', '2ece1c57-2f6e-4b28-a949-2928a4057276', '2020-12-24 08:59:24', '2020-12-24 08:59:24'),
(15, 'Bavix\\Wallet\\Models\\Wallet', 8, 'Bavix\\Wallet\\Models\\Wallet', 45, 'transfer', NULL, 51, 50, '0', '0', '7797ab9d-e992-4c24-957a-98f26ca4d682', '2020-12-24 09:01:29', '2020-12-24 09:01:29'),
(16, 'Bavix\\Wallet\\Models\\Wallet', 8, 'Bavix\\Wallet\\Models\\Wallet', 45, 'transfer', NULL, 53, 52, '0', '0', '756feba2-b4ef-45a1-8f15-cfc990c84976', '2020-12-24 09:12:04', '2020-12-24 09:12:04'),
(17, 'Bavix\\Wallet\\Models\\Wallet', 8, 'Bavix\\Wallet\\Models\\Wallet', 47, 'transfer', NULL, 55, 54, '0', '0', '57867d3f-5156-43d5-8d9c-651dcfd585dd', '2021-01-14 15:13:17', '2021-01-14 15:13:17'),
(18, 'Bavix\\Wallet\\Models\\Wallet', 8, 'Bavix\\Wallet\\Models\\Wallet', 47, 'transfer', NULL, 57, 56, '0', '0', '33469500-48be-437a-8fef-ed14b1702dde', '2021-01-14 15:22:06', '2021-01-14 15:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `referrer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upin` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subaccount_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `two_factor_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bvn_verified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `two_factor_expires_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `referrer_id`, `firstname`, `lastname`, `phone`, `DOB`, `national`, `email`, `upin`, `email_verified_at`, `password`, `subaccount_id`, `active`, `two_factor_code`, `bvn_verified`, `two_factor_expires_at`, `remember_token`, `created_at`, `updated_at`, `stage_id`) VALUES
(3, 2, NULL, 'kenny', 'Sammy', '08035460244', '01/04/1999', 'United State', 'nwidehifeanyi@gmail.com', NULL, NULL, '$2y$10$hLd.4zaXHpjpwADJsLdn2eKhrYyCEKYmdGeu/CQO7lqYSMThWg7RW', NULL, 1, NULL, 'false', NULL, NULL, '2020-10-28 12:50:59', '2020-10-28 14:11:31', NULL),
(30, 1, NULL, 'Ifeanyi', 'sammy', '09056432145', '01/04/1999', 'United State', 'scotty@gmail.com', NULL, NULL, '$2y$10$dWlWxZQULbHmKyRaN0Pir.Napw9F7JYA1GYxYldAi1YeqMuULojfq', 'wpq3kohb', 1, NULL, 'false', NULL, NULL, '2020-11-21 21:47:50', '2020-11-26 21:56:28', 1),
(31, 1, NULL, 'Nne', 'Oma', NULL, NULL, NULL, 'nneoma@gmail.com', NULL, NULL, '$2y$10$keIw3XLsBAdGt9yKit.7WOLJm/izsfBdlPLNPK9Sr2ubMMKIbzdPS', 'efbpyhx7', 1, NULL, 'false', NULL, NULL, '2020-12-01 06:18:21', '2020-12-07 14:28:53', NULL),
(32, 1, NULL, 'Bueze', 'Dubem', '09087654332', '01/28/2020', 'Nigeria', 'dubem@gmail.com', 1234, NULL, '$2y$10$2tbimhVC.7vcet2mpwlom.Z3R/7z3Mj8x13d07KYYC0j.bzKxFS/a', 'byseruqg', 1, '136382', '1', '2020-12-22 16:45:18', 'OZ0WFSAVQy3bucPMJKUYl5d8FCx9n3Tnfe1ARCCaQXqveM8hhIGWdF55WL75', '2020-12-02 14:14:39', '2020-12-11 22:32:18', 2),
(33, 1, 30, 'loiun', 'Geng', NULL, NULL, NULL, 'geng@gmail.com', NULL, NULL, '$2y$10$lAsM98r609.yj6kDAZ1mAuUsc8pVAprie0sRjKYmVGWm8J7B3rlaG', NULL, 0, NULL, 'false', NULL, NULL, '2020-12-02 22:05:29', '2020-12-02 22:05:29', NULL),
(34, 1, NULL, 'jddhdhdhdh', 'ddjdhdjhdddh', NULL, NULL, NULL, 'dgdgdfddgdg@gmail.com', NULL, NULL, '$2y$10$Ji.VBDryt5fHxDi315KygO50KU5wV6lqYbrIlcyzv6b.jIdMNddKK', NULL, 0, NULL, 'false', NULL, NULL, '2020-12-02 22:55:56', '2020-12-02 22:55:56', NULL),
(59, 1, NULL, 'Preshy', 'Dayo', NULL, NULL, NULL, 'preshy@gmail.com', NULL, NULL, '$2y$10$NNp1G004WFpKLlU58X5ZIuF0aq2ed.xHYiwcz4B1VtWboC7R.PIGW', 'szpvr3ag', 1, NULL, 'false', NULL, NULL, '2020-12-22 22:41:03', '2020-12-22 22:41:03', 1),
(61, 1, NULL, 'gddgdhdh', 'yetdhdhdd', NULL, NULL, NULL, 'iydudhdydh766@gmail.com', NULL, NULL, '$2y$10$56ZiqdRLcKkpNFdPPJaBtuiRSX715t/xgapaRpoxGWq7K9VyeyNta', 'y5hjl3j2', 1, NULL, 'false', NULL, NULL, '2020-12-23 05:51:34', '2020-12-23 05:52:00', 1),
(62, 1, NULL, 'Kenneth', 'Athan', NULL, NULL, NULL, 'kenathan@gmail.com', NULL, NULL, '$2y$10$7l9hQszeOwS77NUkQKHoKeIAFY0xoBeuHU43A8JfrrLJNyPYhWvze', 'k37zhfc4', 1, '482771', 'false', '2021-01-07 17:03:54', NULL, '2020-12-23 06:37:00', '2020-12-23 06:37:29', 1),
(63, 1, NULL, 'Preshie', 'Gold', NULL, NULL, NULL, 'goldie@gmail.com', NULL, NULL, '$2y$10$gDpJovMxdXww86tTDKXqxu1tH.jfGRbzd.nHjeipcQq4F4uGPnu3.', 'fxxyqpuz', 1, NULL, 'false', NULL, NULL, '2021-01-10 07:49:12', '2021-01-10 07:52:04', 1),
(64, 1, NULL, 'bob', 'skia', '08035460248', NULL, NULL, 'bob@gmail.com', 5504, NULL, '$2y$10$PvXG5MRHsu6lQzwS3N.UnuokMBQV049SvgwTnlxAcpkI0NFU3GWBu', 'bcdo3sdg', 1, NULL, 'false', NULL, NULL, '2021-01-27 15:21:09', '2021-01-29 10:26:08', 1),
(65, 1, NULL, 'chia', 'chiay', NULL, NULL, NULL, 'chia@gmail.com', NULL, NULL, '$2y$10$fx7ljn0QDr4TdkaJV4aHX.h7errb7fIb3HybQJ75KOpUkFmTAHw8C', NULL, 0, NULL, 'false', NULL, NULL, '2021-01-27 15:44:25', '2021-01-27 15:44:25', NULL),
(66, 1, NULL, 'torch', 'porcha', NULL, NULL, NULL, 'porcha@gmail.com', NULL, NULL, '$2y$10$D2tnG9VPaJiONBFW4sFfveHLUk1tZX.dKWSiEPlMoidP1EjFfBv.a', 'h2vmag3n', 1, NULL, 'false', NULL, NULL, '2021-01-27 17:28:35', '2021-01-27 17:31:14', 1),
(67, 1, NULL, 'wound', 'comb', NULL, NULL, NULL, 'comb@gmail.com', NULL, NULL, '$2y$10$/BRCoVf3lWjxuAphGB08QecZO5LJwVLkG/MnGseDKwZ9odHPiCFz.', 'ommpcdip', 1, NULL, 'false', NULL, NULL, '2021-01-27 17:54:42', '2021-01-27 17:56:25', 1),
(68, 1, NULL, 'tuso', 'tasa', NULL, NULL, NULL, 'tuso@gmail.com', NULL, NULL, '$2y$10$fjif2ymdggJgkE3/K3FUKuBJASioiW/BccCjK14YDioepgYlQlFtq', NULL, 0, NULL, 'false', NULL, NULL, '2021-01-29 16:53:15', '2021-01-29 16:53:15', NULL),
(69, 1, NULL, 'puzzy', 'dick', NULL, NULL, NULL, 'dick@gmail.com', NULL, NULL, '$2y$10$Cfz1Zn/jDM/g/dJ5sIkr.ONNkaPZqgIF1sEkGr9AcrZ5elBIVllVG', NULL, 0, NULL, 'false', NULL, NULL, '2021-01-29 16:58:13', '2021-01-29 16:58:13', NULL),
(70, 1, NULL, 'kenny', 'wixxy', NULL, NULL, NULL, 'kwnwix@gmail.com', NULL, NULL, '$2y$10$zM6eh7j6kaJhGBRXW5VjmuD/pdAVF0n0XmkJVQpvFTzSVsXvbETnG', NULL, 0, NULL, 'false', NULL, NULL, '2021-04-08 15:02:20', '2021-04-08 15:02:20', NULL),
(71, 1, NULL, 'Babe', 'Girl', NULL, NULL, NULL, 'girl@gmail.com', NULL, NULL, '$2y$10$ej.mtd1ehWLQFNoOAKN2aOZQ5V5OSsTQW5oL2rtNYALY4fZexV6G2', NULL, 0, NULL, 'false', NULL, NULL, '2021-04-08 15:21:52', '2021-04-08 15:21:52', NULL),
(72, 1, NULL, 'Babe', 'Girl', NULL, NULL, NULL, 'girlbabe@gmail.com', NULL, NULL, '$2y$10$BT8gY8WBR2chuUZ6Hp6JFue51gXxjEs0zik6sbTp21I.UqvoYr0/i', 'tk23unpx', 1, NULL, 'false', NULL, NULL, '2021-04-08 15:22:57', '2021-04-08 15:24:33', 1),
(73, 1, NULL, 'Kemi', 'sade', NULL, NULL, NULL, 'kemi@gmail.com', NULL, NULL, '$2y$10$OzlEB9GSgaF.RiWyZ43oU.SxwSB/tFGjGOXDLGoUl6SBKscqU0MjO', NULL, 0, NULL, 'false', NULL, NULL, '2021-05-22 20:18:10', '2021-05-22 20:18:10', NULL),
(74, 1, NULL, 'Anne', 'Jommie', NULL, NULL, NULL, 'anneideh2020@gmail.com', NULL, NULL, '$2y$10$uq./F9yBVOYISeLOdhRcReMC1CpHg7LahEqfQrsKDr0/1KFaQBKne', 'tk23unpx', 1, NULL, 'false', NULL, NULL, '2021-09-09 22:52:08', '2021-09-09 22:52:08', NULL),
(75, 1, NULL, 'Uyai', 'Matter', NULL, NULL, NULL, 'uyai@gmail.com', NULL, NULL, '$2y$10$9ex212yfEuUrHmbVymvA8ewUXvgKaIJt1AGA7kwG0b1Mcrv/oe7b.', 'kvmzgzsm', 1, NULL, 'false', NULL, NULL, '2021-09-15 16:23:32', '2021-09-15 16:24:34', 1),
(76, 1, NULL, 'okiujy', 'yvggtrdgyf', NULL, NULL, NULL, 'udo@hotmail.com', NULL, NULL, '$2y$10$0on2TF5HFIjcZg6DvT.he.KGzCBVnhbx7wSAYf0obhxVAAgJXAfry', NULL, 0, NULL, 'false', NULL, NULL, '2021-09-15 19:36:15', '2021-09-15 19:36:15', NULL),
(77, 1, NULL, 'babyo', 'pwaize', NULL, NULL, NULL, 'pwaixe@gmail.com', NULL, NULL, '$2y$10$NVU96dPeZR.nZj.Ao.98ZO20zpc0uWuBBCRyfr4Y3zZSznvbmL2JW', NULL, 0, NULL, 'false', NULL, NULL, '2021-09-15 19:43:07', '2021-09-15 19:43:07', NULL),
(78, 1, NULL, 'ipeme', 'yousin', NULL, NULL, NULL, 'ipeme@babe.com', NULL, NULL, '$2y$10$/VlA5tZfgHYmak/ZY7ZRK.VLs1JRjLlTb93rMLVanpPkJxOnbxN0q', NULL, 0, NULL, 'false', NULL, NULL, '2021-09-15 19:50:45', '2021-09-15 19:50:45', NULL),
(79, 1, NULL, 'uroi', 'uyrryrg', NULL, NULL, NULL, 'uergfyfgfy@gmail.com', NULL, NULL, '$2y$10$Ez09lbESSO3X17G39X5lpuxAVTxtmfwYlvRFA26ipUmqR0twvMANK', NULL, 0, NULL, 'false', NULL, NULL, '2021-09-15 19:56:43', '2021-09-15 19:56:43', NULL),
(80, 1, NULL, 'hgfgffggfg', 'gdggggdgd', NULL, NULL, NULL, 'gdfgdgdgdg@gmail.com', NULL, NULL, '$2y$10$4GdSDmoiNHJVJMFC206OCOyWLegfkGRtr0Db6osNefJ3GpcIGTegG', NULL, 0, NULL, 'false', NULL, NULL, '2021-09-15 19:59:18', '2021-09-15 19:59:18', NULL),
(81, 1, NULL, 'jdhdhfjf', 'uyyfffhfjj', NULL, NULL, NULL, 'yyrhrjrjkma@haom.com', NULL, NULL, '$2y$10$NeZMsYg48uaaJE6NhVhA/u7f31spRMHrsPVCW3CPRrOw8jpZLILyO', NULL, 0, NULL, 'false', NULL, NULL, '2021-09-15 20:07:45', '2021-09-15 20:07:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_transactions`
--

CREATE TABLE `user_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `calculated_amt` double NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_transactions`
--

INSERT INTO `user_transactions` (`id`, `user_id`, `amount`, `calculated_amt`, `currency`, `payment_method`, `status`, `payment_ref`, `admin_status`, `created_at`, `updated_at`) VALUES
(1, 30, 100, 10000, 'USD', 'paypal', 'approved', 'PAYID-L7BV7BA7K775790NV805280A', 'Not Paid', '2020-11-29 06:46:02', '2020-11-29 06:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(64,0) NOT NULL DEFAULT 0,
  `decimal_places` smallint(6) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `holder_type`, `holder_id`, `name`, `slug`, `description`, `address`, `balance`, `decimal_places`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 3, 'Main Wallet', 'main', NULL, NULL, '100', 2, '2020-10-28 12:52:55', '2020-11-12 08:42:26'),
(2, 'App\\User', 3, 'Bitcoin Wallet', 'btc', NULL, 'QZiKPXGu6TjiNuVvvZk2ZsxNosaHbk6wuz', '0', 2, '2020-10-28 12:52:55', '2020-10-28 12:52:55'),
(3, 'App\\User', 27, 'Bitcoin Wallet', 'btc', NULL, '3CRHVtr7JqpQzCebTkmNZFMa1qx6dwmc6k', '0', 2, '2020-11-21 18:21:07', '2020-11-21 18:21:07'),
(4, 'App\\User', 29, 'Bitcoin Wallet', 'btc', NULL, '37qN8BgFwH6d4jUWWZn3VwhURoNW8Q2Xqc', '0', 2, '2020-11-21 18:30:16', '2020-11-21 18:30:16'),
(5, 'App\\User', 29, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-11-21 18:30:16', '2020-11-21 18:30:16'),
(6, 'App\\User', 30, 'Bitcoin Wallet', 'btc', NULL, '3MYBZejYgxrGrHww8xNfBChXmAAsxHZgAV', '0', 2, '2020-11-21 22:33:43', '2020-11-30 22:14:13'),
(7, 'App\\User', 30, 'Main Wallet', 'main', NULL, NULL, '2686', 2, '2020-11-21 22:33:43', '2020-12-16 10:27:16'),
(8, 'App\\System', 1, 'Miraweb System Wallet', 'system wallet', NULL, NULL, '5100', 2, '2020-11-25 22:00:00', '2021-01-29 15:33:42'),
(9, 'App\\User', 31, 'Bitcoin Wallet', 'btc', NULL, '37JNGA872W3uxr3MgCuhPdDTyXg3jh2hcm', '72900', 8, '2020-12-01 06:18:55', '2020-12-01 14:02:54'),
(10, 'App\\User', 31, 'Main Wallet', 'main', NULL, NULL, '40027', 8, '2020-11-30 22:00:00', '2020-12-01 14:12:41'),
(11, 'App\\User', 32, 'Bitcoin Wallet', 'btc', NULL, NULL, '0', 2, '2020-12-02 14:16:22', '2020-12-02 14:16:22'),
(12, 'App\\User', 32, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-02 14:16:22', '2020-12-02 14:16:22'),
(13, 'App\\User', 37, 'Bitcoin Wallet', 'btc', NULL, '38tVXqAX4YjktwuF4wxvEPQWJ2MT1Gir1d', '0', 2, '2020-12-16 08:23:43', '2020-12-16 08:23:43'),
(14, 'App\\User', 37, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-16 08:23:43', '2020-12-16 08:23:43'),
(15, 'App\\User', 41, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 00:20:56', '2020-12-22 00:20:56'),
(16, 'App\\User', 41, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 00:26:12', '2020-12-22 00:26:12'),
(17, 'App\\User', 42, 'Bitcoin Wallet', 'btc', NULL, '3KJqxyJuU29vGXBiDQTr9uAho8h7AKa9Ay', '0', 2, '2020-12-22 00:30:48', '2020-12-22 00:30:48'),
(18, 'App\\User', 42, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 00:30:48', '2020-12-22 00:30:48'),
(19, 'App\\User', 45, 'Bitcoin Wallet', 'btc', NULL, '32Kmhc8jUStbwBbKL5YEnWJeM2KgySiHGa', '0', 2, '2020-12-22 01:41:56', '2020-12-22 01:41:56'),
(20, 'App\\User', 45, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 01:41:56', '2020-12-22 01:41:56'),
(21, 'App\\User', 48, 'Bitcoin Wallet', 'btc', NULL, '3HjT8ZFPQuthG56hW83N7jAg4vBv6rkuqG', '0', 2, '2020-12-22 02:09:59', '2020-12-22 02:09:59'),
(22, 'App\\User', 48, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 02:09:59', '2020-12-22 02:09:59'),
(23, 'App\\User', 47, 'Bitcoin Wallet', 'btc', NULL, '39pF1K6ZVHYsWjdhPwdcFRGSDmsQR7B5EH', '0', 2, '2020-12-22 02:29:14', '2020-12-22 02:29:14'),
(24, 'App\\User', 47, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 02:29:14', '2020-12-22 02:29:14'),
(25, 'App\\User', 50, 'Bitcoin Wallet', 'btc', NULL, '3NBCGrbw7eyo4y2f4ANE888BhUrTjQM8Dd', '0', 2, '2020-12-22 02:30:12', '2020-12-22 02:30:12'),
(26, 'App\\User', 50, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 02:30:12', '2020-12-22 02:30:12'),
(27, 'App\\User', 51, 'Bitcoin Wallet', 'btc', NULL, '32CjsDYDrPWcy9DPTDuWaZsAyFbcq8L7Nf', '0', 2, '2020-12-22 02:40:06', '2020-12-22 02:40:06'),
(28, 'App\\User', 51, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 02:40:06', '2020-12-22 02:40:06'),
(29, 'App\\User', 52, 'Bitcoin Wallet', 'btc', NULL, '32cbTq64XTAGGe6tdtvHu7EMV2LE9ro3Ky', '0', 2, '2020-12-22 02:42:05', '2020-12-22 02:42:05'),
(30, 'App\\User', 52, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 02:42:05', '2020-12-22 02:42:05'),
(31, 'App\\User', 53, 'Bitcoin Wallet', 'btc', NULL, '36PDfgnzKEgRsbpSLX12adac8MQwHYwQfN', '0', 2, '2020-12-22 02:53:23', '2020-12-22 02:53:23'),
(32, 'App\\User', 53, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 02:53:23', '2020-12-22 02:53:23'),
(33, 'App\\User', 54, 'Bitcoin Wallet', 'btc', NULL, '3CSBUw6auFYWvsaozM1RtWqHYaHUNFi5WV', '0', 2, '2020-12-22 03:20:31', '2020-12-22 03:20:31'),
(34, 'App\\User', 54, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 03:20:31', '2020-12-22 03:20:31'),
(35, 'App\\User', 55, 'Bitcoin Wallet', 'btc', NULL, NULL, '0', 2, '2020-12-22 03:24:52', '2020-12-22 03:24:52'),
(36, 'App\\User', 55, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 03:24:52', '2020-12-22 03:24:52'),
(37, 'App\\User', 57, 'Bitcoin Wallet', 'btc', NULL, '3QXKKDCGjPSyQwm3QtBiRXAXBYTmMvad6K', '0', 2, '2020-12-22 08:03:06', '2020-12-22 08:03:06'),
(38, 'App\\User', 57, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 08:03:06', '2020-12-22 08:03:06'),
(39, 'App\\User', 58, 'Bitcoin Wallet', 'btc', NULL, '39hyFCnMirn1CcRxyo4CZk7QZdHRoR6mUD', '0', 2, '2020-12-22 08:07:46', '2020-12-22 08:07:46'),
(40, 'App\\User', 58, 'Main Wallet', 'main', NULL, NULL, '200', 2, '2020-12-22 08:07:46', '2020-12-22 08:07:46'),
(41, 'App\\User', 59, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-22 22:57:34', '2020-12-22 22:57:34'),
(42, 'App\\User', 61, 'Bitcoin Wallet', 'btc', NULL, '3CpC3M5gV9UmptYxwDRH7s9dfDzT5GoLuN', '0', 2, '2020-12-23 05:52:07', '2020-12-23 05:52:07'),
(43, 'App\\User', 61, 'Main Wallet', 'main', NULL, NULL, '0', 2, '2020-12-23 05:52:07', '2020-12-23 05:52:07'),
(44, 'App\\User', 62, 'Bitcoin Wallet', 'btc', NULL, '38cZsxoWBM8zbToQ7vRDpxsUerc9EGNuW5', '0', 2, '2020-12-23 06:37:33', '2020-12-23 06:37:33'),
(45, 'App\\User', 62, 'Main Wallet', 'main', NULL, NULL, '1660', 2, '2020-12-23 06:37:33', '2020-12-24 09:12:04'),
(46, 'App\\User', 63, 'Bitcoin Wallet', 'btc', NULL, '38cZsxoWBM8zbToQ7vRDpxsUerc9EGNuW5r5', '0', 2, '2021-01-10 07:52:07', '2021-01-10 07:52:07'),
(47, 'App\\User', 63, 'Main Wallet', 'main', NULL, NULL, '560', 2, '2021-01-10 07:52:07', '2021-01-14 15:22:06'),
(48, 'App\\User', 64, 'Bitcoin Wallet', 'btc', NULL, '3A8TQhhTYygtwPsmQkGjWw1LUPyZnazMeZ', '0', 2, '2021-01-27 16:54:36', '2021-01-27 16:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `withdraw_id` int(11) NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `fee` double NOT NULL,
  `total` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `withdraw_id`, `reference`, `amount`, `fee`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 145803, 'CRL-dZJC8rXO0cuEQgobOvfw0zL7jbZGrB', 500, 10.75, 510.75, 'Pending', '2020-10-28 14:12:05', '2020-10-28 14:12:05'),
(2, 3, 145804, 'CRL-fN0x0s0A3tJ47lOnFi6l2qveGJjbTd', 500, 10.75, 510.75, 'Pending', '2020-10-28 14:17:43', '2020-10-28 14:17:43'),
(3, 3, 145806, 'CRL-TWYBRqS7BeG7P0PRriMJCaZOFPwq40', 500, 10.75, 510.75, 'Pending', '2020-10-28 15:10:43', '2020-10-28 15:10:43'),
(4, 3, 145807, 'CRL-qN6LVBI57vs7thhfzvtZqVF2GYYUHa', 500, 10.75, 510.75, 'Pending', '2020-10-28 15:10:44', '2020-10-28 15:10:44'),
(5, 3, 145808, 'CRL-eH9FkrqC4OylzjrYID1mcI0qu04hjW', 500, 10.75, 510.75, 'Pending', '2020-10-28 15:14:28', '2020-10-28 15:14:28'),
(6, 3, 145809, 'CRL-KpFHxXYVrlZ0yZNUkWTuFomjX0TRqh', 500, 10.75, 510.75, 'Pending', '2020-10-28 15:27:08', '2020-10-28 15:27:08'),
(7, 3, 145810, 'CRL-OmxXKqO6UPjk3cEE9y31fpLLcS2Twl', 500, 10.75, 510.75, 'Pending', '2020-10-28 15:27:08', '2020-10-28 15:27:08'),
(8, 3, 145811, 'CRL-YeKQCupL6vUWbPtUuuKukkvkxpZazW', 500, 10.75, 510.75, 'Pending', '2020-10-28 15:27:12', '2020-10-28 15:27:12'),
(9, 3, 145812, 'CRL-tmfSTDMbIBs2LEsn4B3Mh3GU9WHRpm', 500, 10.75, 510.75, 'Pending', '2020-10-28 15:27:13', '2020-10-28 15:27:13'),
(10, 3, 145813, 'CRL-dkypj2l6vPfHMs9cJ9YXMQ744OuhEn', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:29:28', '2020-10-28 15:29:28'),
(11, 3, 145814, 'CRL-4Rd65N6PVgSdkgfVPwqhXAyU3tXfgT', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:29:30', '2020-10-28 15:29:30'),
(12, 3, 145815, 'CRL-PMskwpQx3mMw1Z34e4HezmS7Fnq1Zv', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:29:33', '2020-10-28 15:29:33'),
(13, 3, 145816, 'CRL-lxr251AVejzpnaUgJtBFVm91v5tN8G', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:29:33', '2020-10-28 15:29:33'),
(14, 3, 145817, 'CRL-lELGRc2alPTzHnsAIb6jr4CZegXP88', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:31:07', '2020-10-28 15:31:07'),
(15, 3, 145818, 'CRL-6oN7Qx3r5cOER9aIJut83KLKNAzdR8', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:32:03', '2020-10-28 15:32:03'),
(16, 3, 145819, 'CRL-3CpGB1q916if6leWWxkUQjn5lwsXFB', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:34:24', '2020-10-28 15:34:24'),
(17, 3, 145820, 'CRL-zXO1xco5vfwSJ2umcAwx0h1LwpttQi', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:35:56', '2020-10-28 15:35:56'),
(18, 3, 145821, 'CRL-JdyfubFb53YzEiCfI5ARLvDmvsst2m', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:36:48', '2020-10-28 15:36:48'),
(19, 3, 145823, 'CRL-KvzKZf89gKBTUeWzn4W4yvSDOvEzpS', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:52:35', '2020-10-28 15:52:35'),
(20, 3, 145824, 'CRL-pHD9Cui9fGB20bzVjoPKeFqe5woB5U', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:53:37', '2020-10-28 15:53:37'),
(21, 3, 145827, 'CRL-Lb3wIvDKkSvNZJ9d9OuaLZMWBzsev8', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:55:13', '2020-10-28 15:55:13'),
(22, 3, 145828, 'CRL-a5HhPOPYa73i8XtssqoYq5mwAy0O8N', 200, 10.75, 210.75, 'Pending', '2020-10-28 15:57:09', '2020-10-28 15:57:09'),
(23, 3, 145831, 'CRL-OdKdxUQJcJhpAiIRMlIOHcES8co6Gw', 100, 10.75, 110.75, 'Pending', '2020-10-28 15:58:31', '2020-10-28 15:58:31'),
(24, 3, 145832, 'CRL-qWOC9LzhVsaldkQZxCt8YDaDctZBTu', 100, 10.75, 110.75, 'Pending', '2020-10-28 16:04:24', '2020-10-28 16:04:24'),
(25, 3, 145833, 'CRL-W6GsXSHjknBne1iUIiBMaqBHF2IGMv', 100, 10.75, 110.75, 'Pending', '2020-10-28 16:06:10', '2020-10-28 16:06:10'),
(26, 3, 145834, 'CRL-7pIepqqUE5vpyal5hPk9uMMTk29ANK', 100, 10.75, 110.75, 'Pending', '2020-10-28 16:06:47', '2020-10-28 16:06:47'),
(27, 3, 145835, 'CRL-uR3GGfGgqA3g2qEf8gdhmnQiF3y0AG', 100, 10.75, 110.75, 'Pending', '2020-10-28 16:09:01', '2020-10-28 16:09:01'),
(28, 3, 145836, 'CRL-1OxdLf196JTZc3A05okQvynDlt8WlD', 100, 10.75, 110.75, 'Pending', '2020-10-28 16:11:11', '2020-10-28 16:11:11'),
(29, 3, 145837, 'CRL-4Pz67Ic7EXT3EmTcHJ6KuyiCRShC9x', 10, 10.75, 20.75, 'Pending', '2020-10-28 16:24:38', '2020-10-28 16:24:38'),
(30, 3, 145838, 'CRL-m660AoMaBQDiMaUN3eyvVrmpQmTone', 50, 10.75, 60.75, 'Pending', '2020-10-28 16:26:00', '2020-10-28 16:26:00'),
(31, 3, 145839, 'CRL-6RGzb6Mvfg4FbLJWIYtf1m0dFgeifM', 20, 10.75, 30.75, 'Pending', '2020-10-28 16:27:00', '2020-10-28 16:27:00'),
(32, 3, 145840, 'CRL-AAZnEcJu1E6qMmkq52gI5muJhlBD5M', 20, 10.75, 30.75, 'Pending', '2020-10-28 16:27:34', '2020-10-28 16:27:34'),
(33, 3, 145841, 'CRL-vYYkBjmqWwDH7GI1cBDNlstLOYzfZW', 50, 10.75, 60.75, 'Pending', '2020-10-28 16:30:45', '2020-10-28 16:30:45'),
(34, 3, 145842, 'CRL-iY4kfgWTcP9ui380o5FE5ntlTNDVCJ', 50, 10.75, 60.75, 'Pending', '2020-10-28 16:31:14', '2020-10-28 16:31:14'),
(35, 3, 145843, 'CRL-jwve7arsOTfNGLzSQGT0bRE7rime7H', 60, 10.75, 70.75, 'Pending', '2020-10-28 16:32:50', '2020-10-28 16:32:50'),
(36, 3, 146059, 'CRL-D787Ym0Ml8yVxCoFR2Gwc6wij4hrfv', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:11:06', '2020-10-30 11:11:06'),
(37, 3, 146060, 'CRL-Pdov7WNCgt3HpIRTZQFb7tRUaRGP1r', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:12:45', '2020-10-30 11:12:45'),
(38, 3, 146061, 'CRL-PQIhsoSdB4V9z78t77vydY851LYupF', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:13:57', '2020-10-30 11:13:57'),
(39, 3, 146062, 'CRL-UJjfeYUROsewT38E0ZlL00o6qK4DUn', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:14:48', '2020-10-30 11:14:48'),
(40, 3, 146063, 'CRL-p7HYxcTGZwM4Yvy6XFNWzUNbWnvdWk', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:15:14', '2020-10-30 11:15:14'),
(41, 3, 146064, 'CRL-ZxipYoD7gyKhqd7JL0kSBGRvhyMVEo', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:17:03', '2020-10-30 11:17:03'),
(42, 3, 146065, 'CRL-d9Y1JHpj27gVrV1c5YjSOyW2SfsZ9L', 20, 10.75, 30.75, 'Pending', '2020-10-30 11:18:39', '2020-10-30 11:18:39'),
(43, 3, 146067, 'CRL-tHlhJFjnb1tr11Y0gXeGG6x9I8urhJ', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:26:41', '2020-10-30 11:26:41'),
(44, 3, 146068, 'CRL-xL88KyiyuIW1k9tVIhcMzHCuDQVPSE', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:27:50', '2020-10-30 11:27:50'),
(45, 3, 146070, 'CRL-YKqVgEbd3TrEjDO60l1GceQnwugAck', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:28:26', '2020-10-30 11:28:26'),
(46, 3, 146071, 'CRL-kDffQyo3GhNGF8pyGeURoAtZMXZHpM', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:29:04', '2020-10-30 11:29:04'),
(47, 3, 146072, 'CRL-gFYS7PrOPk900xzVAcrtS0LvKuplRM', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:30:18', '2020-10-30 11:30:18'),
(48, 3, 146073, 'CRL-abIR1xu9Fjsyi1xmJUeqBWJkJOTFCJ', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:32:30', '2020-10-30 11:32:30'),
(49, 3, 146074, 'CRL-LHIoswFTPXPCGIxrlYgiBsLAUjn72A', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:33:37', '2020-10-30 11:33:37'),
(50, 3, 146075, 'CRL-iDXJZCDNKF0dB3vhmMTw6utsPcOyJW', 10, 10.75, 20.75, 'Pending', '2020-10-30 11:34:41', '2020-10-30 11:34:41'),
(51, 3, 146084, 'CRL-QYItGAJE8TPiZlChWVDCnzhpioPyp5', 30, 10.75, 40.75, 'Pending', '2020-10-30 12:20:05', '2020-10-30 12:20:05'),
(52, 3, 146371, 'CRL-OIixMezJU8SCCf266Lpr1K2ja4TDSr', 20, 10.75, 30.75, 'Pending', '2020-11-03 06:22:24', '2020-11-03 06:22:24'),
(53, 3, 146372, 'CRL-9QuOkvzPDZGC5kJEkNqW1KlEMv5pkm', 10, 10.75, 20.75, 'Pending', '2020-11-03 06:25:26', '2020-11-03 06:25:26'),
(54, 3, 146373, 'CRL-p5TmqRinK5h7WzH6ElwlPaSED7p88h', 10, 10.75, 20.75, 'Pending', '2020-11-03 06:37:47', '2020-11-03 06:37:47'),
(55, 3, 146374, 'CRL-hIUHq9l3a8moiLZcbTFvh6goW657IC', 10, 10.75, 20.75, 'Pending', '2020-11-03 06:41:17', '2020-11-03 06:41:17'),
(56, 3, 146376, 'CRL-UM0PR6RrbeDE02OgZrNrI90GvB3hqe', 10, 10.75, 20.75, 'Pending', '2020-11-03 06:42:35', '2020-11-03 06:42:35'),
(57, 3, 146380, 'CRL-LDXePs28YA3oxULd1LimZunoeNRfE5', 10, 10.75, 20.75, 'Pending', '2020-11-03 06:48:38', '2020-11-03 06:48:38'),
(58, 3, 146382, 'CRL-mtwo5ytxwQya6kqGvMEfWQutbcktNq', 10, 10.75, 20.75, 'Pending', '2020-11-03 06:50:02', '2020-11-03 06:50:02'),
(59, 3, 146383, 'CRL-3u0I2C2xHMoj6PPFLs2lPFJ7XbuQaI', 10, 10.75, 20.75, 'Pending', '2020-11-03 06:50:24', '2020-11-03 06:50:24'),
(60, 3, 146537, 'CRL-cjCdBNh2RThKfsL78priS0jAVueEff', 50, 10.75, 60.75, 'Pending', '2020-11-05 13:36:45', '2020-11-05 13:36:45'),
(61, 3, 146539, 'CRL-KX9B4YinfeFFzsuK7jBPnTQBr6LgN2', 10, 10.75, 20.75, 'Pending', '2020-11-05 13:40:18', '2020-11-05 13:40:18'),
(62, 3, 146541, 'CRL-2w4OM3vBRgbLOK7pQlGBGLLATuvYGR', 10, 10.75, 20.75, 'Pending', '2020-11-05 13:43:22', '2020-11-05 13:43:22'),
(63, 3, 146544, 'CRL-3tnMUYC56IPpyKNFra4ir6L9QXIwwg', 20, 10.75, 30.75, 'Pending', '2020-11-05 13:47:53', '2020-11-05 13:47:53'),
(64, 3, 146548, 'CRL-AXkMkoLiNy4KZN5FO3c4Ai2YlMdJ4k', 10, 10.75, 20.75, 'Pending', '2020-11-05 13:52:15', '2020-11-05 13:52:15'),
(65, 3, 146549, 'CRL-mDA2yz0DAeDkrQorhnLhXBfFqracFm', 10, 10.75, 20.75, 'Pending', '2020-11-05 13:52:57', '2020-11-05 13:52:57'),
(66, 3, 146553, 'CRL-zUoR2ZXlH4GdLvYvVl7FflQ1G6Ta61', 10, 10.75, 20.75, 'Pending', '2020-11-05 13:55:52', '2020-11-05 13:55:52'),
(67, 3, 146558, 'CRL-dVWp1wnDmdsjtUqGKaTCAgWPScwdQT', 20, 10.75, 30.75, 'Pending', '2020-11-05 14:02:44', '2020-11-05 14:02:44'),
(68, 3, 146559, 'CRL-9L4E5MfSPMToF3Gx2tOPmBzNrqSJPJ', 10, 10.75, 20.75, 'Pending', '2020-11-05 14:03:28', '2020-11-05 14:03:28'),
(69, 3, 146560, 'CRL-LIhbj06YWILEJPkPiw0gmPFO8I0CnF', 10, 10.75, 20.75, 'Pending', '2020-11-05 14:06:46', '2020-11-05 14:06:46'),
(70, 3, 146561, 'CRL-ADTjTdVa6NIHe9kIBZYh3tXAqqodzz', 10, 10.75, 20.75, 'Pending', '2020-11-05 14:07:39', '2020-11-05 14:07:39'),
(71, 3, 146562, 'CRL-XXKZc6LfwHftEzkpm6WezoWidkrOYR', 10, 10.75, 20.75, 'Pending', '2020-11-05 14:11:23', '2020-11-05 14:11:23'),
(72, 3, 146563, 'CRL-9kyYhSR5QR6E9oKXuF6Dk4ZbSDzbtt', 10, 10.75, 20.75, 'Pending', '2020-11-05 14:12:34', '2020-11-05 14:12:34'),
(73, 3, 146564, 'CRL-mlMF0fCrabKm7kdg95q7JAICEEy1jr', 10, 10.75, 20.75, 'Pending', '2020-11-05 14:13:36', '2020-11-05 14:13:36'),
(74, 3, 146574, 'CRL-uIhZR6gRKq2JAXuUBdavxvf6aSeRSn', 500, 10.75, 510.75, 'Pending', '2020-11-05 14:54:05', '2020-11-05 14:54:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_user_id_unique` (`user_id`);

--
-- Indexes for table `activation_codes`
--
ALTER TABLE `activation_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activation_codes_user_id_index` (`user_id`);

--
-- Indexes for table `admin_transactions`
--
ALTER TABLE `admin_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airtime_confirmations`
--
ALTER TABLE `airtime_confirmations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digital_assets`
--
ALTER TABLE `digital_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_uploads`
--
ALTER TABLE `file_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftcards`
--
ALTER TABLE `giftcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `login_securities`
--
ALTER TABLE `login_securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `refills`
--
ALTER TABLE `refills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_referrer_id_foreign` (`referrer_id`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- Indexes for table `user_transactions`
--
ALTER TABLE `user_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_holder_type_slug_address_unique` (`holder_type`,`slug`,`address`),
  ADD KEY `wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  ADD KEY `wallets_slug_index` (`slug`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activation_codes`
--
ALTER TABLE `activation_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_transactions`
--
ALTER TABLE `admin_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `airtime_confirmations`
--
ALTER TABLE `airtime_confirmations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `digital_assets`
--
ALTER TABLE `digital_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_uploads`
--
ALTER TABLE `file_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giftcards`
--
ALTER TABLE `giftcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_securities`
--
ALTER TABLE `login_securities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refills`
--
ALTER TABLE `refills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user_transactions`
--
ALTER TABLE `user_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activation_codes`
--
ALTER TABLE `activation_codes`
  ADD CONSTRAINT `activation_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `users_referrer_id_foreign` FOREIGN KEY (`referrer_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
