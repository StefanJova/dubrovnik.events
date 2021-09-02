-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2021 at 01:25 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int NOT NULL,
  `owner_id` int DEFAULT NULL,
  `wifi` int DEFAULT NULL,
  `pet` int DEFAULT NULL,
  `disabled` int DEFAULT NULL,
  `music` int DEFAULT NULL,
  `parking` int DEFAULT NULL,
  `airc` int DEFAULT NULL,
  `sauna` int DEFAULT NULL,
  `spa` int DEFAULT NULL,
  `gym` int DEFAULT NULL,
  `pool` int DEFAULT NULL,
  `smoke` int DEFAULT NULL,
  `no_smoke` int DEFAULT NULL,
  `credit` int DEFAULT NULL,
  `conference` int DEFAULT NULL,
  `child` int DEFAULT NULL,
  `seafood` int DEFAULT NULL,
  `steakhouse` int DEFAULT NULL,
  `vegan_food` int DEFAULT NULL,
  `vegan_wines` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `owner_id`, `wifi`, `pet`, `disabled`, `music`, `parking`, `airc`, `sauna`, `spa`, `gym`, `pool`, `smoke`, `no_smoke`, `credit`, `conference`, `child`, `seafood`, `steakhouse`, `vegan_food`, `vegan_wines`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, '2021-09-02 12:00:39', '2021-09-02 12:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int UNSIGNED NOT NULL,
  `owner_id` int NOT NULL,
  `event_category_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `time_from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int NOT NULL DEFAULT '0',
  `lng` decimal(9,6) DEFAULT NULL,
  `lat` decimal(9,6) DEFAULT NULL,
  `accept_reservations` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `name`) VALUES
(1, 'Art /Exhibition'),
(2, 'Beach & Sea'),
(3, 'Catering'),
(4, 'Club'),
(5, 'Comedy'),
(6, 'Conference & Seminar'),
(7, 'Festival'),
(8, 'Film'),
(9, 'Food & Drink'),
(10, 'Music'),
(11, 'Night out'),
(12, 'Shopping'),
(13, 'Sightseeing tour'),
(14, 'Sport'),
(15, 'Theatre'),
(16, 'Workshop');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `host_categories`
--

CREATE TABLE `host_categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `host_categories`
--

INSERT INTO `host_categories` (`id`, `name`) VALUES
(1, 'Bar'),
(2, 'Café'),
(3, 'Club'),
(4, 'Gallery'),
(5, 'Hotel'),
(6, 'Museum'),
(7, 'Pub'),
(8, 'Restaurant'),
(9, 'School'),
(10, 'Sport club'),
(11, 'University'),
(12, 'Wine bar');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `col_name` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `title`, `icon`, `col_name`) VALUES
(1, 'free Wi Fi', 'fas fa-wifi', 'wifi'),
(2, 'pet friendly', 'fas fa-paw', 'pet'),
(3, 'facilities for disabled', 'fab fa-accessible-icon', 'disabled'),
(4, 'live music', 'fas fa-music', 'music'),
(5, 'secure parking', 'fas fa-parking', 'parking'),
(6, 'air condition', 'fas fa-fan', 'airc'),
(7, 'sauna', 'fas fa-hot-tub', 'sauna'),
(8, 'wellness & spa', 'fas fa-spa', 'spa'),
(9, 'gym', 'fas fa-dumbbell', 'gym'),
(10, 'swimming pool', 'fas fa-swimming-pool', 'pool'),
(11, 'smoking zone', 'fas fa-smoking', 'smoke'),
(12, 'no smoking zone', 'fas fa-smoking-ban', 'no_smoke'),
(13, 'credit cards', 'fas fa-credit-card', 'credit'),
(14, 'conference facilities', 'fas fa-users', 'conference'),
(15, 'child friendly', 'fas fa-child', 'child'),
(16, 'sea food', 'fas fa-fish', 'seafood'),
(17, 'steakhouse', 'fas fa-drumstick-bite', 'steakhouse'),
(18, 'vegan food', 'fas fa-leaf', 'vegan_food'),
(19, 'vegan wines', 'fas fa-wine-glass-alt', 'vegan_wines');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_01_140328_create_owners_table', 2),
(5, '2020_04_01_150354_create_owner_infos_table', 3),
(6, '2020_04_02_115438_create_coords_table', 4),
(7, '2020_04_02_133651_create_photos_table', 5),
(8, '2020_04_02_140032_create_socials_table', 5),
(9, '2020_04_07_112340_create_events_table', 6),
(10, '2020_04_24_100210_create_reservations_table', 7),
(11, '2020_05_07_124759_create_places_to_sees_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int UNSIGNED NOT NULL,
  `host_category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `accept_reservations` int NOT NULL DEFAULT '0',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `host_category_id`, `name`, `email`, `phone`, `location`, `desc`, `accept_reservations`, `slug`, `featured`, `created_at`, `updated_at`) VALUES
(2, 2, 'test 2', 'test2@gmail.com', '+111111111111', 'Dubrovnik', 'lorem ipsum', 1, 'test-2', 1, '2021-09-02 11:56:46', '2021-09-02 11:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `owner_infos`
--

CREATE TABLE `owner_infos` (
  `id` int UNSIGNED NOT NULL,
  `owner_id` int DEFAULT NULL,
  `opening` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `lng` decimal(9,6) DEFAULT NULL,
  `lat` decimal(9,6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_infos`
--

INSERT INTO `owner_infos` (`id`, `owner_id`, `opening`, `closing`, `capacity`, `lng`, `lat`, `created_at`, `updated_at`) VALUES
(2, 2, '08:00', '23:00', 300, '43.555512', '18.089458', '2021-09-02 11:57:12', '2021-09-02 11:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int UNSIGNED NOT NULL,
  `owner_id` int UNSIGNED DEFAULT NULL,
  `event_id` int UNSIGNED DEFAULT NULL,
  `places_to_see_id` int DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `owner_id`, `event_id`, `places_to_see_id`, `file`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, '1630584218166655784.jpg', '2021-09-02 12:03:38', '2021-09-02 12:03:38'),
(2, 2, NULL, NULL, '1630584218166655090.jpg', '2021-09-02 12:03:38', '2021-09-02 12:03:38'),
(3, 2, NULL, NULL, '1630584218166656147.jpg', '2021-09-02 12:03:38', '2021-09-02 12:03:38'),
(4, 2, NULL, NULL, '1630584218166656352.jpg', '2021-09-02 12:03:38', '2021-09-02 12:03:38'),
(5, 2, NULL, NULL, '1630584218166656937.jpg', '2021-09-02 12:03:38', '2021-09-02 12:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `places_to_sees`
--

CREATE TABLE `places_to_sees` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lng` decimal(9,6) DEFAULT NULL,
  `lat` decimal(9,6) DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int UNSIGNED NOT NULL,
  `owner_id` int DEFAULT NULL,
  `event_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_people` int NOT NULL DEFAULT '1',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `done` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int UNSIGNED NOT NULL,
  `owner_id` int UNSIGNED DEFAULT NULL,
  `event_id` int UNSIGNED DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tadvisor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `owner_id`, `event_id`, `instagram`, `facebook`, `twitter`, `tadvisor`, `website`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'instagram.com', 'facebook.com', 'twitter.com', 'tripadvisor.com', 'site.com', '2021-09-02 11:55:17', '2021-09-02 11:55:17'),
(2, 2, NULL, 'instagram.com', 'facebook.com', 'twitter.com', 'tripadvisor.com', 'site.com', '2021-09-02 11:57:48', '2021-09-02 11:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'test@gmail.com', NULL, '$2y$10$9PpI.eIPYGK5tZQkRDGw7.aK6GMcgcWRhNSPo93IUTOVxkHk2Si1O', NULL, '2021-09-02 11:52:36', '2021-09-02 11:52:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `host_categories`
--
ALTER TABLE `host_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_infos`
--
ALTER TABLE `owner_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
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
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `host_categories`
--
ALTER TABLE `host_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `owner_infos`
--
ALTER TABLE `owner_infos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
