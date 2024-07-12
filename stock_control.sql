-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 06:50 AM
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
-- Database: `stock_control`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `code_cus` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`code_cus`, `customer`, `alamat`, `email`, `created_at`, `updated_at`) VALUES
('AMC', 'AutoMotive Corp', 'Jalan Industri No. 1', 'info@automotivecorp.com', NULL, NULL),
('EDR', 'EcoDrive', 'Jalan Lingkungan No. 4', 'service@ecodrive.com', NULL, NULL),
('EVX', 'EvoX Motors', 'Jalan Evolusi No. 10', 'info@evoxmotors.com', NULL, NULL),
('GUP', 'GearUp', 'Jalan Persaingan No. 7', 'contact@gearup.com', NULL, NULL),
('LCL', 'LuxCar Ltd.', 'Jalan Kemewahan No. 3', 'support@luxcar.com', NULL, NULL),
('MPR', 'MotorPro', 'Jalan Profesional No. 5', 'sales@motorpro.com', NULL, NULL),
('RAC', 'Racing Edge', 'Jalan Balapan No. 8', 'info@racingedge.com', NULL, NULL),
('RPM', 'RPM Works', 'Jalan Mesin No. 9', 'support@rpmworks.com', NULL, NULL),
('SMT', 'Speedy Motors', 'Jalan Kecepatan No. 2', 'contact@speedymotors.com', NULL, NULL),
('TTC', 'TurboTech', 'Jalan Teknologi No. 6', 'info@turbotech.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_reverses`
--

CREATE TABLE `detail_reverses` (
  `id_detail_reverse` bigint(20) UNSIGNED NOT NULL,
  `id_reverse` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_stockproblem`
--

CREATE TABLE `detail_stockproblem` (
  `id_levelStock` varchar(255) DEFAULT NULL,
  `code_parts` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `Actual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_stockproblem`
--

INSERT INTO `detail_stockproblem` (`id_levelStock`, `code_parts`, `remark`, `Actual`) VALUES
('1000018', 'TY1924', 'r', 1),
('1000018', 'TY1924', 'rusak', 3),
('1000018', 'TY1924', 'rusak', 1),
('1000000', 'TY8894', 'R', 1),
('1000000', 'TY5969', 'Rusak', 1),
('1000001', 'TY1929', 'Rusak', 4),
('1000002', 'TY9904', 'Rusak', 1),
('1000003', 'TY9904', 'Rusak', 2),
('1000004', 'TY4960', 'Not Supply', 7);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `id_detail_transaction` bigint(20) UNSIGNED NOT NULL,
  `id_transaction` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_items` varchar(255) NOT NULL,
  `name_items` varchar(255) NOT NULL,
  `rack_items` varchar(255) NOT NULL,
  `SKU` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `part_number` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_items`, `name_items`, `rack_items`, `SKU`, `created_at`, `updated_at`, `part_number`) VALUES
('TY0912', 'Engine Oil', 'D1', 'TY912LB', NULL, NULL, NULL),
('TY0913', 'Brake Pads', 'D2', 'TY913LB', NULL, NULL, NULL),
('TY0914', 'Air Filter', 'D3', 'TY914LB', NULL, NULL, NULL),
('TY0915', 'Spark Plug', 'D4', 'TY915LB', NULL, NULL, NULL),
('TY0916', 'Battery', 'D5', 'TY916LB', NULL, NULL, NULL),
('TY0917', 'Radiator', 'D6', 'TY917LB', NULL, NULL, NULL),
('TY0918', 'Fuel Pump', 'D7', 'TY918LB', NULL, NULL, NULL),
('TY0919', 'Alternator', 'D8', 'TY919LB', NULL, NULL, NULL),
('TY0920', 'Shock Absorber', 'D9', 'TY920LB', NULL, NULL, NULL),
('TY0921', 'Timing Belt', 'D10', 'TY921LB', NULL, NULL, NULL),
('TY1922', 'Engine Oil', 'E1', 'TY922LB', NULL, NULL, NULL),
('TY1923', 'Brake Pads', 'E2', 'TY923LB', NULL, NULL, NULL),
('TY1924', 'Air Filter', 'E3', 'TY924LB', NULL, NULL, NULL),
('TY1925', 'Spark Plug', 'E4', 'TY925LB', NULL, NULL, NULL),
('TY1926', 'Battery', 'E5', 'TY926LB', NULL, NULL, NULL),
('TY1927', 'Radiator', 'E6', 'TY927LB', NULL, NULL, NULL),
('TY1928', 'Fuel Pump', 'E7', 'TY928LB', NULL, NULL, NULL),
('TY1929', 'Alternator', 'E8', 'TY929LB', NULL, NULL, NULL),
('TY1930', 'Shock Absorber', 'E9', 'TY930LB', NULL, NULL, NULL),
('TY1931', 'Timing Belt', 'E10', 'TY931LB', NULL, NULL, NULL),
('TY2932', 'Engine Oil', 'F1', 'TY932LB', NULL, NULL, NULL),
('TY2933', 'Brake Pads', 'F2', 'TY933LB', NULL, NULL, NULL),
('TY2934', 'Air Filter', 'F3', 'TY934LB', NULL, NULL, NULL),
('TY2935', 'Spark Plug', 'F4', 'TY935LB', NULL, NULL, NULL),
('TY2936', 'Battery', 'F5', 'TY936LB', NULL, NULL, NULL),
('TY2937', 'Radiator', 'F6', 'TY937LB', NULL, NULL, NULL),
('TY2938', 'Fuel Pump', 'F7', 'TY938LB', NULL, NULL, NULL),
('TY2939', 'Alternator', 'F8', 'TY939LB', NULL, NULL, NULL),
('TY2940', 'Shock Absorber', 'F9', 'TY940LB', NULL, NULL, NULL),
('TY2941', 'Timing Belt', 'F10', 'TY941LB', NULL, NULL, NULL),
('TY3942', 'Engine Oil', 'G1', 'TY942LB', NULL, NULL, NULL),
('TY3943', 'Brake Pads', 'G2', 'TY943LB', NULL, NULL, NULL),
('TY3944', 'Air Filter', 'G3', 'TY944LB', NULL, NULL, NULL),
('TY3945', 'Spark Plug', 'G4', 'TY945LB', NULL, NULL, NULL),
('TY3946', 'Battery', 'G5', 'TY946LB', NULL, NULL, NULL),
('TY3947', 'Radiator', 'G6', 'TY947LB', NULL, NULL, NULL),
('TY3948', 'Fuel Pump', 'G7', 'TY948LB', NULL, NULL, NULL),
('TY3949', 'Alternator', 'G8', 'TY949LB', NULL, NULL, NULL),
('TY3950', 'Shock Absorber', 'G9', 'TY950LB', NULL, NULL, NULL),
('TY3951', 'Timing Belt', 'G10', 'TY951LB', NULL, NULL, NULL),
('TY4952', 'Engine Oil', 'H1', 'TY952LB', NULL, NULL, NULL),
('TY4953', 'Brake Pads', 'H2', 'TY953LB', NULL, NULL, NULL),
('TY4954', 'Air Filter', 'H3', 'TY954LB', NULL, NULL, NULL),
('TY4955', 'Spark Plug', 'H4', 'TY955LB', NULL, NULL, NULL),
('TY4956', 'Battery', 'H5', 'TY956LB', NULL, NULL, NULL),
('TY4957', 'Radiator', 'H6', 'TY957LB', NULL, NULL, NULL),
('TY4958', 'Fuel Pump', 'H7', 'TY958LB', NULL, NULL, NULL),
('TY4959', 'Alternator', 'H8', 'TY959LB', NULL, NULL, NULL),
('TY4960', 'Shock Absorber', 'H9', 'TY960LB', NULL, NULL, NULL),
('TY4961', 'Timing Belt', 'H10', 'TY961LB', NULL, NULL, NULL),
('TY5962', 'Engine Oil', 'I1', 'TY962LB', NULL, NULL, NULL),
('TY5963', 'Brake Pads', 'I2', 'TY963LB', NULL, NULL, NULL),
('TY5964', 'Air Filter', 'I3', 'TY964LB', NULL, NULL, NULL),
('TY5965', 'Spark Plug', 'I4', 'TY965LB', NULL, NULL, NULL),
('TY5966', 'Battery', 'I5', 'TY966LB', NULL, NULL, NULL),
('TY5967', 'Radiator', 'I6', 'TY967LB', NULL, NULL, NULL),
('TY5968', 'Fuel Pump', 'I7', 'TY968LB', NULL, NULL, NULL),
('TY5969', 'Alternator', 'I8', 'TY969LB', NULL, NULL, NULL),
('TY5970', 'Shock Absorber', 'I9', 'TY970LB', NULL, NULL, NULL),
('TY5971', 'Timing Belt', 'I10', 'TY971LB', NULL, NULL, NULL),
('TY6972', 'Engine Oil', 'J1', 'TY972LB', NULL, NULL, NULL),
('TY6973', 'Brake Pads', 'J2', 'TY973LB', NULL, NULL, NULL),
('TY6974', 'Air Filter', 'J3', 'TY974LB', NULL, NULL, NULL),
('TY6975', 'Spark Plug', 'J4', 'TY975LB', NULL, NULL, NULL),
('TY6976', 'Battery', 'J5', 'TY976LB', NULL, NULL, NULL),
('TY6977', 'Radiator', 'J6', 'TY977LB', NULL, NULL, NULL),
('TY6978', 'Fuel Pump', 'J7', 'TY978LB', NULL, NULL, NULL),
('TY6979', 'Alternator', 'J8', 'TY979LB', NULL, NULL, NULL),
('TY6980', 'Shock Absorber', 'J9', 'TY980LB', NULL, NULL, NULL),
('TY6981', 'Timing Belt', 'J10', 'TY981LB', NULL, NULL, NULL),
('TY7711', 'tes1', 'B2', 'TY7711LB', '2024-07-05 23:07:15', '2024-07-06 07:19:41', 3000000),
('TY7734', 'tes2', 'A1', 'TY7734LB', '2024-07-06 03:57:32', '2024-07-06 08:01:36', 3000001),
('TY7882', 'Engine Oil', 'A1', 'TY882LB', NULL, NULL, NULL),
('TY7883', 'Brake Pads', 'A2', 'TY883LB', NULL, NULL, NULL),
('TY7884', 'Air Filter', 'A3', 'TY884LB', NULL, NULL, NULL),
('TY7885', 'Spark Plug', 'A4', 'TY885LB', NULL, NULL, NULL),
('TY7886', 'Battery', 'A5', 'TY886LB', NULL, NULL, NULL),
('TY7887', 'Radiator', 'A6', 'TY887LB', NULL, NULL, NULL),
('TY7888', 'Fuel Pump', 'A7', 'TY888LB', NULL, NULL, NULL),
('TY7889', 'Alternator', 'A8', 'TY889LB', NULL, NULL, NULL),
('TY7890', 'Shock Absorber', 'A9', 'TY890LB', NULL, NULL, NULL),
('TY7891', 'Timing Belt', 'A10', 'TY891LB', NULL, NULL, NULL),
('TY8892', 'Engine Oil', 'B1', 'TY892LB', NULL, NULL, NULL),
('TY8893', 'Brake Pads', 'B2', 'TY893LB', NULL, NULL, NULL),
('TY8894', 'Air Filter', 'B3', 'TY894LB', NULL, NULL, NULL),
('TY8895', 'Spark Plug', 'B4', 'TY895LB', NULL, NULL, NULL),
('TY8896', 'Battery', 'B5', 'TY896LB', NULL, NULL, NULL),
('TY8897', 'Radiator', 'B6', 'TY897LB', NULL, NULL, NULL),
('TY8898', 'Fuel Pump', 'B7', 'TY898LB', NULL, NULL, NULL),
('TY8899', 'Alternator', 'B8', 'TY899LB', NULL, NULL, NULL),
('TY8900', 'Shock Absorber', 'B9', 'TY900LB', NULL, NULL, NULL),
('TY8901', 'Timing Belt', 'B10', 'TY901LB', NULL, NULL, NULL),
('TY9902', 'Engine Oil', 'C1', 'TY902LB', NULL, NULL, NULL),
('TY9903', 'Brake Pads', 'C2', 'TY903LB', NULL, NULL, NULL),
('TY9904', 'Air Filter', 'C3', 'TY904LB', NULL, NULL, NULL),
('TY9905', 'Spark Plug', 'C4', 'TY905LB', NULL, NULL, NULL),
('TY9906', 'Battery', 'C5', 'TY906LB', NULL, NULL, NULL),
('TY9907', 'Radiator', 'C6', 'TY907LB', NULL, NULL, NULL),
('TY9908', 'Fuel Pump', 'C7', 'TY908LB', NULL, NULL, NULL),
('TY9909', 'Alternator', 'C8', 'TY909LB', NULL, NULL, NULL),
('TY9910', 'Shock Absorber', 'C9', 'TY910LB', NULL, NULL, NULL),
('TY9911', 'Timing Belt', 'C10', 'TY911LB', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levelstock`
--

CREATE TABLE `levelstock` (
  `id_levelStock` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levelstock`
--

INSERT INTO `levelstock` (`id_levelStock`, `date`) VALUES
(1000000, '2024-06-01'),
(1000001, '2024-06-02'),
(1000002, '2024-05-03'),
(1000003, '2024-06-06'),
(1000004, '2024-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id_material` varchar(255) NOT NULL,
  `id_supplier` varchar(255) NOT NULL,
  `part_material` varchar(255) NOT NULL,
  `name_material` varchar(255) NOT NULL,
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
(17, '2024_06_17_144324_create_detail_products_table', 1),
(18, '0001_01_01_000000_create_users_table', 2),
(19, '0001_01_01_000001_create_cache_table', 2),
(20, '0001_01_01_000002_create_jobs_table', 2),
(21, '2024_05_16_064301_create_items_table', 2),
(22, '2024_05_16_071549_create_customers_table', 2),
(23, '2024_05_16_071851_create_orders_table', 2),
(24, '2024_06_03_132405_create_records_table', 2),
(25, '2024_06_12_162734_create_transactions_table', 2),
(26, '2024_06_12_162802_create_detail_transactions_table', 2),
(27, '2024_06_12_162818_create_reverse_logistics_table', 2),
(28, '2024_06_12_162855_create_detail_reverses_table', 2),
(29, '2024_06_12_163023_create_trucks_table', 2),
(30, '2024_06_12_163031_create_rotations_table', 2),
(31, '2024_06_12_163048_create_suppliers_table', 2),
(32, '2024_06_12_163100_create_materials_table', 2),
(33, '2024_06_12_163121_create_products_table', 2);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_customer` varchar(255) NOT NULL,
  `part_number` bigint(20) NOT NULL,
  `id_item` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `id_customer`, `part_number`, `id_item`, `created_at`, `updated_at`) VALUES
(136, 'EDR', 3000000, 'TY7711', '2024-07-05 23:07:15', '2024-07-06 07:19:41'),
(137, 'AMC', 3000001, 'TY7734', '2024-07-06 03:57:32', '2024-07-06 08:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) NOT NULL,
  `status` enum('IN','OUT') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `item`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TY0912', 'IN', NULL, NULL),
(2, 'TY0912', 'IN', NULL, NULL),
(3, 'TY0912', 'OUT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reverse_logistics`
--

CREATE TABLE `reverse_logistics` (
  `id_reverse` bigint(20) UNSIGNED NOT NULL,
  `id_transaction` varchar(255) NOT NULL,
  `date_delivery` date NOT NULL,
  `remark_reverse` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rotations`
--

CREATE TABLE `rotations` (
  `id_rotation` bigint(20) UNSIGNED NOT NULL,
  `code_truck` varchar(255) NOT NULL,
  `code_customer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('processing','shipped','delivered','returned') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rotations`
--

INSERT INTO `rotations` (`id_rotation`, `code_truck`, `code_customer`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 'DCWA', 'AMC', NULL, NULL, '2024-07-10', 'processing'),
(2, 'DCWA', 'AMC', NULL, NULL, '2024-07-12', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8paODFVykP8hzPmAg2Y9Q0HpbTRBWcEfROd64HFw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjlMbHFaNG5MakFXeEtwb1dMdnBVc2p1MFg5bWF5ZEp6ZUp5Mmo2dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1720759387);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` varchar(255) NOT NULL,
  `name_supplier` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `phone_supplier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` bigint(20) UNSIGNED NOT NULL,
  `id_customer` varchar(255) NOT NULL,
  `date_transaction` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id_truck` bigint(20) UNSIGNED NOT NULL,
  `code_truck` varchar(255) NOT NULL,
  `name_truck` varchar(255) NOT NULL,
  `type_truck` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id_truck`, `code_truck`, `name_truck`, `type_truck`, `created_at`, `updated_at`) VALUES
(1, 'DCWA', 'Toyota', 'pickup', NULL, NULL),
(2, 'ADDC', 'Toyota', 'pickup', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD UNIQUE KEY `customers_code_cus_unique` (`code_cus`);

--
-- Indexes for table `detail_reverses`
--
ALTER TABLE `detail_reverses`
  ADD PRIMARY KEY (`id_detail_reverse`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD PRIMARY KEY (`id_detail_transaction`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_items`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_material`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reverse_logistics`
--
ALTER TABLE `reverse_logistics`
  ADD PRIMARY KEY (`id_reverse`);

--
-- Indexes for table `rotations`
--
ALTER TABLE `rotations`
  ADD PRIMARY KEY (`id_rotation`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id_truck`);

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
-- AUTO_INCREMENT for table `detail_reverses`
--
ALTER TABLE `detail_reverses`
  MODIFY `id_detail_reverse` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  MODIFY `id_detail_transaction` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reverse_logistics`
--
ALTER TABLE `reverse_logistics`
  MODIFY `id_reverse` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rotations`
--
ALTER TABLE `rotations`
  MODIFY `id_rotation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id_truck` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
