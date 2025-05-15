-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 12:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `products`;
USE `products`;

--
-- Database: `products`
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `password_hash` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `user_name`, `password_hash`, `role`) VALUES
(1, 'name', 'abc', 'role');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(5) NOT NULL,
  `product_name` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_tag_pivot`
--

CREATE TABLE `products_tag_pivot` (
  `product_id` int(5) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('MhXHu9oq0B85ts3acf5vln6oDsQdnmfbMGYD4RPC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXMzWVlXejBGNUtVa2xQaGI2T1BqWkNQOG9JazR0U2hFamVuMU0xYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbi9tYW5hZ2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744926030),
('ZfqSqFrGyR10WoHMozqRqDiUKfRbIcZmwWStqBtO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHZrcXE0cXdRa1cwUWd1OXU1R0p4OEpzMU0yMUw1bUhwa2cySDhFcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbi9lbXBsb3llZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1744925291),
('ZwMDwkcu9EVe1uCVUjQU7A1D1EXlVw77QLfQz1HG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN005VkVsVUM4RGJSUXRVYXpZdEpVZUNCZ3JzNTBaSXhHb2lSa2F0NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbi9lbXBsb3llZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1744925290);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FKcategory_id` (`category_id`);

--
-- Indexes for table `products_tag_pivot`
--
ALTER TABLE `products_tag_pivot`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FKcategory_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_tag_pivot`
--
ALTER TABLE `products_tag_pivot`
  ADD CONSTRAINT `products_tag_pivot_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_tag_pivot_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Inserting values for category
insert ignore into category(category_name) 
values ("snacks"),
("nuts"),
("beans"),
("soup"),
("totes"),
("baking"),
("wet pails"),
("flour"),
("mixes"),
("sugar"),
("cookies"),
("candy"),
("drinks"),
("cereals"),
("spices"),
("pasta"),
("rice"),
("pet food");


-- inserting values for tag
insert ignore into tag(tag_name) 
values ("dry beans"),
("soup mixes"),
("chocolate products"),
("glazed fruit"),
("dried fruit"),
("baking seeds"),
("baking nuts"),
("supplements"),
("flour"),
("mixes"),
("sugar"),
("salt"),
("cake decorations"),
("chocolate covered"),
("yogurt covered"),
("chocolate"),
("gum"),
("gummies"),
("sour coated"),
("wrapped candy"),
("drinks"),
("cereals"),
("pasta"),
("organic"),
("sauces"),
("rice"),
("popcorn seasoning"),
("bird seed"),
("dog biscuit"),
("sold by each"),
("miscellaneous"),
("seasonal");

-- inserting values for products
insert ignore into product(product_id, product_name, category_id)
values (23, "banana chips", (select category_id from category where category_name = "snacks")),
(24, "caramel corn", (select category_id from category where category_name = "snacks")),
(14, "cassava chips - plain", (select category_id from category where category_name = "snacks")),
(15, "cassava chips - spicy", (select category_id from category where category_name = "snacks")),
(2773, "chick peas - sea salt, dry r", (select category_id from category where category_name = "snacks")),
(120, "almonds - dry roasted & unsalted", (select category_id from category where category_name = "nuts")),
(2678, "brazil nuts whole dry r & s", (select category_id from category where category_name = "nuts")),
(123, "cashews dry r & s whole", (select category_id from category where category_name = "nuts")),
(128, "mixed nuts - deluxe r & s", (select category_id from category where category_name = "nuts")),
(127, "pistachios - californian salted", (select category_id from category where category_name = "nuts")),
(424, "adzuki beans", (select category_id from category where category_name = "beans")),
(400, "barley - pot", (select category_id from category where category_name = "beans")),
(423, "black turtle beans", (select category_id from category where category_name = "beans")),
(406, "lima beans, large", (select category_id from category where category_name = "beans")),
(404, "yellow eye beans", (select category_id from category where category_name = "beans")),
(462, "beef base no msg", (select category_id from category where category_name = "soup")),
(440, "bouillon cubes - beef", (select category_id from category where category_name = "soup")),
(441, "bouillon cubes - chicken", (select category_id from category where category_name = "soup")),
(455, "bouillon cubes - vegetable", (select category_id from category where category_name = "soup")),
(3579, "bouillon powder, vegan", (select category_id from category where category_name = "soup")),
(3361, "cacao beans org. raw", (select category_id from category where category_name = "baking")),
(2696, "cacao nibs raw org.", (select category_id from category where category_name = "baking")),
(1762, "butterscotch chips", (select category_id from category where category_name = "baking")),
(1764, "carob chips", (select category_id from category where category_name = "baking")),
(1770, "chocolate squares - semi sweet", (select category_id from category where category_name = "baking")),
(1785, "chocolate squares - white", (select category_id from category where category_name = "baking")),
(1809, "melting wafers - dark brown", (select category_id from category where category_name = "baking")),
(1820, "merckens - coloured", (select category_id from category where category_name = "baking")),
(1800, "merckens - dark", (select category_id from category where category_name = "baking")),
(1801, "merckens - light", (select category_id from category where category_name = "baking")),
(1803, "merckens - white", (select category_id from category where category_name = "baking")),
(1562, "chia seeds", (select category_id from category where category_name = "baking")),
(275, "golden flax", (select category_id from category where category_name = "baking")),
(277, "brown flax", (select category_id from category where category_name = "baking")),
(280, "ground flax", (select category_id from category where category_name = "baking")),
(3209, "hemp seeds - toasted, unsalted", (select category_id from category where category_name = "baking")),
(1786, "almonds - nat supreme", (select category_id from category where category_name = "baking")),
(2678, "almonds - nat ground", (select category_id from category where category_name = "baking")),
(1792, "almonds - blanched ground", (select category_id from category where category_name = "baking")),
(1758, "coconut - sweet flake", (select category_id from category where category_name = "baking")),
(1759, "coconut - sweet shred", (select category_id from category where category_name = "baking")),
(1775, "hazelnuts/filberts whole nat", (select category_id from category where category_name = "baking")),
(1779, "pecan - halves", (select category_id from category where category_name = "baking")),
(1772, "walnut - halves", (select category_id from category where category_name = "baking")),
(3084, "collagen powder", (select category_id from category where category_name = "baking")),
(2683, "hemp protein powder", (select category_id from category where category_name = "baking")),
(1580, "whey protein isolate", (select category_id from category where category_name = "baking")),
(3465, "spirulina powder, organic", (select category_id from category where category_name = "baking")),
(258, "baking gums", (select category_id from category where category_name = "baking")),
(261, "baking - powder", (select category_id from category where category_name = "baking")),
(259, "baking - soda", (select category_id from category where category_name = "baking")),
(281, "epsom salts", (select category_id from category where category_name = "baking")),
(256, "table salt", (select category_id from category where category_name = "baking")),
(320, "kosher salt", (select category_id from category where category_name = "baking")),
(964, "coloured sugar", (select category_id from category where category_name = "baking")),
(969, "sprinkles - all colours", (select category_id from category where category_name = "baking")),
(951, "meringue powder", (select category_id from category where category_name = "baking")),
(1727, "apple rings white", (select category_id from category where category_name = "totes")),
(1720, "apricots - turkish", (select category_id from category where category_name = "totes")),
(1711, "dates - loose pack, pits removed", (select category_id from category where category_name = "totes")),
(1717, "figs - turkish natural", (select category_id from category where category_name = "totes")), 
(1729, "mango slices - dried", (select category_id from category where category_name = "totes")), 
(1781, "mango slices - natural unsweetened", (select category_id from category where category_name = "totes")), 
(1706, "prunes lrg pits removed", (select category_id from category where category_name = "totes")),
(1701, "raisins - golden", (select category_id from category where category_name = "totes")),
(1702, "raisins - thompson", (select category_id from category where category_name = "totes")),
(1700, "raisons - sultana", (select category_id from category where category_name = "totes")),
(1016, "almond butter", (select category_id from category where category_name = "wet pails")),
(3183, "almond butter - crunchy", (select category_id from category where category_name = "wet pails")),
(1018, "cashew butter", (select category_id from category where category_name = "wet pails")),
(2317, "coconut oil - virgin organic", (select category_id from category where category_name = "wet pails")),
(1017, "corn syrup", (select category_id from category where category_name = "wet pails")),
(2494, "custard", (select category_id from category where category_name = "wet pails")),
(1013, "molasses - black strap", (select category_id from category where category_name = "wet pails")),
(1005, "peanut butter - nat smooth", (select category_id from category where category_name = "wet pails")),
(310, "all purpose", (select category_id from category where category_name = "flour")),
(200, "arrowroot mwwi", (select category_id from category where category_name = "flour")),
(316, "buckwheat - light", (select category_id from category where category_name = "flour")),
(330, "oat flour", (select category_id from category where category_name = "flour")), 
(221, "quinoa flour, organic", (select category_id from category where category_name = "flour")),
(312, "cookie dough", (select category_id from category where category_name = "mixes")),
(292, "text. veg. protein (tvp)", (select category_id from category where category_name = "mixes")),
(3296, "scone - plain", (select category_id from category where category_name = "mixes")),
(326, "fish & chip batter", (select category_id from category where category_name = "mixes")),
(227, "lemon poppy seed crum cake/muffin", (select category_id from category where category_name = "mixes")),
(296, "turbinado brown sugar", (select category_id from category where category_name = "sugar")),
(304, "icing sugar (confectionary", (select category_id from category where category_name = "sugar")),
(303, "golden yellow sugar", (select category_id from category where category_name = "sugar")),
(302, "dark brown sugar", (select category_id from category where category_name = "sugar")),
(300, "demerara style sugar", (select category_id from category where category_name = "sugar")),
(1244, "sweet & low", (select category_id from category where category_name = "sugar")),
(2775, "animal crackers", (select category_id from category where category_name = "cookies")),
(3356, "whole chocolate oreos", (select category_id from category where category_name = "cookies")),
(1811, "ginger snaps - mini", (select category_id from category where category_name = "cookies")),
(610, "almonds - chocolate covered", (select category_id from category where category_name = "candy")),
(674, "blueberries - dark chocolate covered", (select category_id from category where category_name = "candy")),
(509, "caramel balls", (select category_id from category where category_name = "candy")),
(681, "cashews - chocolate covered", (select category_id from category where category_name = "candy")),
(523, "cranberries - yogurt covered", (select category_id from category where category_name = "candy")),
(605, "peanuts - yogurt covered", (select category_id from category where category_name = "candy")),
(533, "raisens - yogurt covered", (select category_id from category where category_name = "candy")),
(3310, "aero minis", (select category_id from category where category_name = "candy")),
(596, "big turk bites", (select category_id from category where category_name = "candy")),
(3311, "kit kat minis", (select category_id from category where category_name = "candy")),
(543, "macaroons", (select category_id from category where category_name = "candy")),
(649, "dubble bubble", (select category_id from category where category_name = "candy")),
(643, "gumballs colossal asst", (select category_id from category where category_name = "candy")),
(549, "gummy bears - small", (select category_id from category where category_name = "candy")),
(2713, "gummy bears - gourment", (select category_id from category where category_name = "candy")),
(708, "gummy worms", (select category_id from category where category_name = "candy")),
(3068, "gourmet worms", (select category_id from category where category_name = "candy")),
(669, "sour belts", (select category_id from category where category_name = "candy")),
(642, "sour peaches", (select category_id from category where category_name = "candy")),
(3263, "tangy caribbean fish", (select category_id from category where category_name = "candy")),
(629, "licorice allsorts", (select category_id from category where category_name = "candy")),
(526, "licorice cigars", (select category_id from category where category_name = "candy")),
(617, "mints - english", (select category_id from category where category_name = "candy")),
(534, "skittles", (select category_id from category where category_name = "candy")),
(2485, "skittles berry", (select category_id from category where category_name = "candy")),
(594, "giant okeydoke", (select category_id from category where category_name = "candy")),
(11266, "pez refills", (select category_id from category where category_name = "candy")),
(531, "jolly ranchers", (select category_id from category where category_name = "candy")),
(1988, "maple syrup candies", (select category_id from category where category_name = "candy")),
(635, "hershey kisses - silver", (select category_id from category where category_name = "candy")),
(2244, "chai tea latte mix", (select category_id from category where category_name = "drinks")),
(1508, "cocoa powder", (select category_id from category where category_name = "drinks")),
(3082, "cocoa powder - black", (select category_id from category where category_name = "drinks")),
(1518, "crystals (all ver)", (select category_id from category where category_name = "drinks")),
(3544, "5 grain breakfast blend", (select category_id from category where category_name = "cereals")),
(1530, "12 grain cereal", (select category_id from category where category_name = "cereals")),
(1543, "bulgur wheat", (select category_id from category where category_name = "cereals")),
(1567, "bran flakes", (select category_id from category where category_name = "cereals")),
(1535, "rolled oats - large flake", (select category_id from category where category_name = "cereals")),
(1526, "steel cut oats", (select category_id from category where category_name = "cereals")),
(867, "garlic - granulated", (select category_id from category where category_name = "spices")),
(904, "curry - powder", (select category_id from category where category_name = "spices")),
(913, "cinammon - ground", (select category_id from category where category_name = "spices")),
(858, "cinammon - sticks 6\"", (select category_id from category where category_name = "spices")),
(901, "peppercorns - black", (select category_id from category where category_name = "spices")),
(912, "nutmeg - ground", (select category_id from category where category_name = "spices")),
(882, "nutmeg - whole", (select category_id from category where category_name = "spices")),
(1642, "orzo", (select category_id from category where category_name = "pasta")),
(1641, "macaroni elbows", (select category_id from category where category_name = "pasta")),
(2854, "mini lasagna", (select category_id from category where category_name = "pasta")),
(3553, "cassava fusilli", (select category_id from category where category_name = "pasta")),
(252, "macaroni & cheese sauce mix", (select category_id from category where category_name = "pasta")),
(1607, "arborio rice", (select category_id from category where category_name = "rice")),
(1614, "organic black rice", (select category_id from category where category_name = "rice")),
(1611, "wild rice", (select category_id from category where category_name = "rice")),
(2982, "all dressed popcorn seasoning", (select category_id from category where category_name = "spices")),
(988, "butter salt popcorn seasoning", (select category_id from category where category_name = "spices")),
(1131, "budgie & parakeet blend", (select category_id from category where category_name = "pet food")),
(1140, "nyjer seed", (select category_id from category where category_name = "pet food")),
(3232, "grain free mini dog biscuits", (select category_id from category where category_name = "pet food")),
(12867, "pig ears", (select category_id from category where category_name = "pet food"));

-- adding tags for products
insert ignore into products_tag_pivot(product_id, tag_id)
values 
(424, (select tag_id from tag where tag_name = "dry beans")),
(400, (select tag_id from tag where tag_name = "dry beans")),
(423, (select tag_id from tag where tag_name = "dry beans")),
(406, (select tag_id from tag where tag_name = "dry beans")),
(404, (select tag_id from tag where tag_name = "dry beans")),
(462, (select tag_id from tag where tag_name = "soup mixes")),
(440, (select tag_id from tag where tag_name = "soup mixes")),
(441, (select tag_id from tag where tag_name = "soup mixes")),
(455, (select tag_id from tag where tag_name = "soup mixes")),
(3579, (select tag_id from tag where tag_name = "soup mixes")),
(3361, (select tag_id from tag where tag_name = "chocolate products")),
(2696, (select tag_id from tag where tag_name = "chocolate products")),
(1762, (select tag_id from tag where tag_name = "chocolate products")),
(1764, (select tag_id from tag where tag_name = "chocolate products")),
(1770, (select tag_id from tag where tag_name = "chocolate products")),
(1785, (select tag_id from tag where tag_name = "chocolate products")),
(1809, (select tag_id from tag where tag_name = "chocolate products")),
(1820, (select tag_id from tag where tag_name = "chocolate products")),
(1800, (select tag_id from tag where tag_name = "chocolate products")),
(1801, (select tag_id from tag where tag_name = "chocolate products")),
(1803, (select tag_id from tag where tag_name = "chocolate products")),
(1562, (select tag_id from tag where tag_name = "baking seeds")),
(275, (select tag_id from tag where tag_name = "baking seeds")),
(277, (select tag_id from tag where tag_name = "baking seeds")),
(280, (select tag_id from tag where tag_name = "baking seeds")),
(3209, (select tag_id from tag where tag_name = "baking seeds")),
(1786, (select tag_id from tag where tag_name = "baking nuts")),
(2678, (select tag_id from tag where tag_name = "baking nuts")),
(1792, (select tag_id from tag where tag_name = "baking nuts")),
(1758, (select tag_id from tag where tag_name = "baking nuts")),
(1759, (select tag_id from tag where tag_name = "baking nuts")),
(1775, (select tag_id from tag where tag_name = "baking nuts")),
(1779, (select tag_id from tag where tag_name = "baking nuts")),
(1772, (select tag_id from tag where tag_name = "baking nuts")),
(3084, (select tag_id from tag where tag_name = "supplements")),
(2683, (select tag_id from tag where tag_name = "supplements")),
(1580, (select tag_id from tag where tag_name = "supplements")),
(3465, (select tag_id from tag where tag_name = "supplements")),
(258, (select tag_id from tag where tag_name = "miscellaneous")),
(261, (select tag_id from tag where tag_name = "miscellaneous")),
(259, (select tag_id from tag where tag_name = "miscellaneous")),
(281, (select tag_id from tag where tag_name = "salt")),
(256, (select tag_id from tag where tag_name = "salt")),
(320, (select tag_id from tag where tag_name = "salt")),
(964, (select tag_id from tag where tag_name = "cake decorations")),
(969, (select tag_id from tag where tag_name = "cake decorations")),
(951, (select tag_id from tag where tag_name = "cake decorations")),
(1727, (select tag_id from tag where tag_name = "dried fruit")),
(1720, (select tag_id from tag where tag_name = "dried fruit")),
(1711, (select tag_id from tag where tag_name = "dried fruit")),
(1717, (select tag_id from tag where tag_name = "dried fruit")), 
(1729, (select tag_id from tag where tag_name = "dried fruit")), 
(1781, (select tag_id from tag where tag_name = "dried fruit")), 
(1706, (select tag_id from tag where tag_name = "dried fruit")),
(1701, (select tag_id from tag where tag_name = "dried fruit")),
(1702, (select tag_id from tag where tag_name = "dried fruit")),
(1700, (select tag_id from tag where tag_name = "dried fruit")),
(610, (select tag_id from tag where tag_name = "chocolate covered")),
(674, (select tag_id from tag where tag_name = "chocolate covered")),
(509, (select tag_id from tag where tag_name = "chocolate covered")),
(681, (select tag_id from tag where tag_name = "chocolate covered")),
(523, (select tag_id from tag where tag_name = "yogurt covered")),
(605, (select tag_id from tag where tag_name = "yogurt covered")),
(533, (select tag_id from tag where tag_name = "yogurt covered")),
(3310, (select tag_id from tag where tag_name = "chocolate")),
(596, (select tag_id from tag where tag_name = "chocolate")),
(3311, (select tag_id from tag where tag_name = "chocolate")),
(543, (select tag_id from tag where tag_name = "chocolate")),
(649, (select tag_id from tag where tag_name = "gum")),
(643, (select tag_id from tag where tag_name = "gum")),
(549, (select tag_id from tag where tag_name = "gummies")),
(2713, (select tag_id from tag where tag_name = "gummies")),
(708, (select tag_id from tag where tag_name = "gummies")),
(3068, (select tag_id from tag where tag_name = "gummies")),
(669, (select tag_id from tag where tag_name = "sour coated")),
(669, (select tag_id from tag where tag_name = "gummies")),
(642, (select tag_id from tag where tag_name = "sour coated")),
(642, (select tag_id from tag where tag_name = "gummies")),
(3263, (select tag_id from tag where tag_name = "sour coated")),
(3263, (select tag_id from tag where tag_name = "gummies")),
(594, (select tag_id from tag where tag_name = "sold by each")),
(11266, (select tag_id from tag where tag_name = "sold by each")),
(531, (select tag_id from tag where tag_name = "wrapped candy")),
(1988, (select tag_id from tag where tag_name = "wrapped candy")),
(635, (select tag_id from tag where tag_name = "wrapped candy")),
(3553, (select tag_id from tag where tag_name = "organic")),
(252, (select tag_id from tag where tag_name = "sauces")),
(1614, (select tag_id from tag where tag_name = "organic")),
(2982, (select tag_id from tag where tag_name = "popcorn seasoning")),
(988, (select tag_id from tag where tag_name = "popcorn seasoning")),
(1131, (select tag_id from tag where tag_name = "bird seed")),
(1140, (select tag_id from tag where tag_name = "bird seed")),
(3232, (select tag_id from tag where tag_name = "dog biscuit")),
(12867, (select tag_id from tag where tag_name = "sold by each")),
(12867, (select tag_id from tag where tag_name = "dog biscuit"));


insert into employees(employee_id, user_name, password_hash, role)
values
(10253, "Trevor Dallas", "5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8", "manager"),
(44582, "Adlane", "ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f", "manager"),
(192868, "John Doe", "8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92", "employee"),
(22805, "Mary Jane", "bef57ec7f53a6d40beb640a780a639c83bc29ac8a9816f1fc6c5c6dcd93c4721", "employee");
