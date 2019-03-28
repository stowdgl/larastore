-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 02:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Smartphones', 1, '2019-03-26 16:44:00', '2019-03-26 16:44:00'),
(3, 'Notebooks', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_products`
--

CREATE TABLE `categories_products` (
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_products`
--

INSERT INTO `categories_products` (`products_id`, `categories_id`) VALUES
(1, 1),
(2, 3),
(3, 1),
(4, 1),
(105, 1);

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
(3, '2019_03_26_160414_products', 2),
(4, '2019_03_26_160450_categories', 2),
(5, '2019_03_26_162407_prices', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mshop_attribute_type`
--

CREATE TABLE `mshop_attribute_type` (
  `id` int(11) NOT NULL,
  `siteid` int(11) NOT NULL,
  `domain` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mshop_locale`
--

CREATE TABLE `mshop_locale` (
  `id` int(11) NOT NULL,
  `siteid` int(11) NOT NULL,
  `langid` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencyid` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mshop_locale_currency`
--

CREATE TABLE `mshop_locale_currency` (
  `id` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siteid` int(11) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mshop_locale_language`
--

CREATE TABLE `mshop_locale_language` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siteid` int(11) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mshop_locale_site`
--

CREATE TABLE `mshop_locale_site` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` smallint(6) NOT NULL,
  `nleft` int(11) NOT NULL,
  `nright` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `price_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '$1000', 1, '2019-03-26 16:44:00', '2019-03-26 16:44:00'),
(2, '$1200', 3, NULL, NULL),
(3, '$800', 4, NULL, NULL),
(4, '$200', 105, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prices_products`
--

CREATE TABLE `prices_products` (
  `products_id` int(11) NOT NULL,
  `prices_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prices_products`
--

INSERT INTO `prices_products` (`products_id`, `prices_id`) VALUES
(1, 1),
(3, 2),
(4, 3),
(105, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specifications` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_img` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'default.jpg',
  `product_img` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'img/a.jpg',
  `items_available` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `code`, `specifications`, `manufacturer`, `manufacturer_img`, `product_img`, `items_available`, `created_at`, `updated_at`) VALUES
(1, 'Samsung S10+', 'SM-G975F', '{\"screen\":\"6.5\"}', 'Samsung', 'default.jpg', 'img/ss10+.jpg', 10, '2019-03-26 16:40:00', '2019-03-26 16:40:00'),
(2, 'ASUS ZenBook Pro', 'UX550GD-BO009R', '\"screen\":\"15.6\"', 'Asus', 'default.jpg', 'img/a.jpg', 0, NULL, NULL),
(3, 'Apple IPhone XS Max', 'MT522', '\"screen\":\"7.1\"', 'Apple', 'default.jpg', 'img/a.jpg', 0, NULL, NULL),
(4, 'Samsung Note 9', 'N960F', '\"screen\":\"7.0\"', 'Samsung', 'default.jpg', 'img/note9.jpg', 100, NULL, NULL),
(105, 'Samsung Galaxy A30', 'SM-A305FZBUSEK', '{\"screen\":\"6.4\"}', 'Samsung', 'default.jpg', 'img/sa30.jpg', 30, '2019-03-28 07:32:28', '2019-03-28 07:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `gender`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `user_type`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'male', 'Gleb', 'Khivrenko', 'gleb.khivrenko@gmail.com', NULL, '$2y$10$W4oOeXZkMd/bYAmqDgjI6..EI8VlMNmwqeL9yWZIurTW50eaVk1Pu', 'user', '2000-03-14', NULL, '2019-03-26 13:30:19', '2019-03-26 13:30:19'),
(2, 'male', 'Andrey', 'Artemenko', 'artemenkoandrey2000@gmail.com', NULL, '$2y$10$h4cWipp2IgagGeqfT3e5K.4dlRKvJ7U2FyatzHfc0JxRKwFeU50v6', 'user', '2000-04-21', NULL, '2019-03-27 08:18:47', '2019-03-27 08:18:47'),
(3, 'female', 'Anastasia', 'Lukyanenko', 'aluk@gmail.com', NULL, '$2y$10$tggh1hGIPOhP.L4Ju0yPwOQuFS.yoRJ7DU3yQNguofxQtoQaJUxbG', 'user', '1948-05-02', NULL, '2019-03-27 08:19:38', '2019-03-27 08:19:38'),
(4, 'female', 'Anastasia', 'Lukyanenko', 'aluk@gmail.com', NULL, '$2y$10$SKRDvZyaZJ.UHIAy8.ZGSOS7rQEsBGHB/UvGlfgviAU8fLKwYzGpK', 'user', '2000-03-14', NULL, '2019-03-27 08:20:42', '2019-03-27 08:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mshop_attribute_type`
--
ALTER TABLE `mshop_attribute_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_msattty_sid_dom_code` (`siteid`,`domain`,`code`),
  ADD KEY `idx_msattty_sid_status_pos` (`siteid`,`status`,`pos`),
  ADD KEY `idx_msattty_sid_label` (`siteid`,`label`(191)),
  ADD KEY `idx_msattty_sid_code` (`siteid`,`code`);

--
-- Indexes for table `mshop_locale`
--
ALTER TABLE `mshop_locale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_msloc_sid_lang_curr` (`siteid`,`langid`,`currencyid`),
  ADD KEY `idx_msloc_sid_curid` (`siteid`,`currencyid`),
  ADD KEY `idx_msloc_sid_status` (`siteid`,`status`),
  ADD KEY `idx_msloc_sid_pos` (`siteid`,`pos`),
  ADD KEY `fk_mslocsi_id` (`siteid`),
  ADD KEY `fk_mslocla_id` (`siteid`),
  ADD KEY `fk_msloccu_id` (`siteid`),
  ADD KEY `IDX_628DFA7F2271845` (`langid`),
  ADD KEY `IDX_628DFA7F4842F28` (`currencyid`);

--
-- Indexes for table `mshop_locale_currency`
--
ALTER TABLE `mshop_locale_currency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_msloccu_sid_status` (`siteid`,`status`),
  ADD KEY `idx_mslocla_label` (`siteid`,`label`(191)),
  ADD KEY `fk_msloccu_siteid` (`siteid`);

--
-- Indexes for table `mshop_locale_language`
--
ALTER TABLE `mshop_locale_language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_mslocla_sid_status` (`siteid`,`status`),
  ADD KEY `idx_mslocla_sid_label` (`siteid`,`label`(191)),
  ADD KEY `fk_mslocla_siteid` (`siteid`);

--
-- Indexes for table `mshop_locale_site`
--
ALTER TABLE `mshop_locale_site`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_mslocsi_code` (`code`),
  ADD KEY `idx_mslocsi_nlt_nrt_lvl_pid` (`nleft`,`nright`,`level`,`parentid`),
  ADD KEY `idx_mslocsi_level_status` (`level`,`status`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mshop_attribute_type`
--
ALTER TABLE `mshop_attribute_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mshop_locale`
--
ALTER TABLE `mshop_locale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mshop_locale_site`
--
ALTER TABLE `mshop_locale_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mshop_locale`
--
ALTER TABLE `mshop_locale`
  ADD CONSTRAINT `fk_msloc_currid` FOREIGN KEY (`currencyid`) REFERENCES `mshop_locale_currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_msloc_langid` FOREIGN KEY (`langid`) REFERENCES `mshop_locale_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_msloc_siteid` FOREIGN KEY (`siteid`) REFERENCES `mshop_locale_site` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mshop_locale_currency`
--
ALTER TABLE `mshop_locale_currency`
  ADD CONSTRAINT `fk_msloccu_siteid` FOREIGN KEY (`siteid`) REFERENCES `mshop_locale_site` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `mshop_locale_language`
--
ALTER TABLE `mshop_locale_language`
  ADD CONSTRAINT `fk_mslocla_siteid` FOREIGN KEY (`siteid`) REFERENCES `mshop_locale_site` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
