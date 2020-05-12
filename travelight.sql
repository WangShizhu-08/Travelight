-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-04-16 08:52:53
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `travelight`
--

-- --------------------------------------------------------

--
-- 表的结构 `failed_jobs`
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
-- 表的结构 `ideas`
--

CREATE TABLE `ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enddate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `ideas`
--

INSERT INTO `ideas` (`id`, `user_id`, `title`, `destination`, `startdate`, `enddate`, `description`, `comments_content`, `comments_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'ToWuhan', 'Wuhan', '03/06/2020', '03/22/2021', 'description', '<p>WangShizhu:<br/>hello, I have used a quite dumb way to implement the API</p><p>WangShizhu:<br/>you can go to https://www.weather- forecast.com/locations/Tokyo-1/forecasts/latest to check the weather!</p><p>WangShizhu:<br/>what is this? helodfasdfasfadfasdfasdfasdfasfsdfasdfasdfadsfadsfasfs</p><p>WangShizhu:<br/>hello, this is a test</p>', 4, '2020-04-12 17:32:01', '2020-04-15 08:35:49'),
(2, 1, 'trip to Hong kong', 'HongKong', '04/17/2020', '05/13/2020', 'want to go to hong kong disneyland', '<p>FanTianyu:<br/>can this still work?</p><p>WangShizhu:<br/>yes, of course!</p><p>Xu Nuo:<br/>i want to go with you, cani ？my phone# is 123456789</p>', 3, '2020-04-12 23:47:23', '2020-04-13 07:45:24'),
(3, 1, 'River flows in Yichang', 'Yichang', '01/01/2021', '05/13/2022', 'want to go to Yichang PIaoliu', NULL, NULL, '2020-04-13 04:05:04', '2020-04-13 04:05:04'),
(4, 2, 'Looking for a companion for trip to JAPAN', 'Japan', '03/06/2020', '03/22/2021', 'asdf', NULL, NULL, '2020-04-13 04:06:35', '2020-04-13 04:06:35'),
(5, 2, 'Looking for a companion for trip to Tailand', 'bangkok', '03/06/2020', '03/16/2021', 'this is a test', '<p>Xu Nuo:<br/>thanks! i have correct it.</p><p>WangShizhu:<br/>The desitination should be \"Thailand\"</p>', 2, '2020-04-13 04:07:39', '2020-04-13 17:13:15'),
(6, 2, 'go to wuhan to help with the cov19 fighting!', 'wuhan', '03/06/2020', '03/22/2021', 'to fight virus', '<p>WangShizhu:<br/>take care of yourself, man.</p>', 1, '2020-04-13 04:10:34', '2020-04-13 04:53:04'),
(7, 1, 'Anyone Back to Wuhan?', 'Wuhan', '04/16/2020', '05/15/2020', 'Fantastic designing! But I choose to go back to mainland.', '<p>FanTianyu:<br/>Sure it can ! Wow, Wang Shizhu, you are my father!</p><p>WangShizhu:<br/>Hello! Can this work?</p>', 2, '2020-04-13 08:11:13', '2020-04-13 08:13:07'),
(8, 4, 'HKU', 'HongKong', '04/08/2020', '05/16/2020', 'this is a demo for idea creation', NULL, NULL, '2020-04-14 01:47:56', '2020-04-14 01:47:56'),
(9, 4, 'demo2', 'Canifornia', '04/25/2020', '05/21/2020', 'this is a demo 2-edit', NULL, NULL, '2020-04-14 01:55:31', '2020-04-14 02:04:42'),
(10, 1, 'demo3', 'HongKong', '04/02/2020', '05/14/2020', 'this is a test', NULL, NULL, '2020-04-14 23:55:55', '2020-04-14 23:55:55'),
(11, 6, 'finalCheck', 'Shanghai', '04/02/2020', '05/13/2020', 'this is a final check', '<p>WangShizhu:<br/>hello, I can see this final check</p><p>finalCheck:<br/>hello, this is a final check</p>', 2, '2020-04-15 22:50:06', '2020-04-15 22:51:25');

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2020_03_21_153853_create_exps_table', 2),
(10, '2020_03_21_155202_create_plans_table', 2),
(30, '2014_10_12_000000_create_users_table', 3),
(31, '2014_10_12_100000_create_password_resets_table', 3),
(32, '2019_08_19_000000_create_failed_jobs_table', 3),
(33, '2020_03_20_155904_create_profiles_table', 3),
(34, '2020_03_22_074043_create_ideas_table', 3),
(35, '2020_03_23_075031_create_taggable_table', 3);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `gender`, `age`, `occupation`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 27, 'student', 'this is a test-edit', '2020-04-12 17:31:38', '2020-04-13 06:28:34'),
(2, 2, 0, 27, 'student', 'i am a whuer!-edit', '2020-04-13 04:05:55', '2020-04-13 06:23:51'),
(3, 3, 1, 28, 'manager', 'a single wealthy man, come and date me! i am a good man.', '2020-04-13 07:40:13', '2020-04-13 07:40:13'),
(4, 4, 1, 29, 'student', 'this is a demo-edit', '2020-04-14 01:37:56', '2020-04-14 01:44:02'),
(5, 5, 1, 29, 'student', 'this is a demo', '2020-04-14 23:24:44', '2020-04-14 23:24:44'),
(6, 6, 1, 29, 'student', 'this is a final check-edit', '2020-04-15 22:49:17', '2020-04-15 22:49:33');

-- --------------------------------------------------------

--
-- 表的结构 `taggable_taggables`
--

CREATE TABLE `taggable_taggables` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `taggable_taggables`
--

INSERT INTO `taggable_taggables` (`tag_id`, `taggable_id`, `taggable_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Idea', '2020-04-12 17:32:01', '2020-04-12 17:32:01'),
(1, 6, 'App\\Idea', '2020-04-13 04:10:34', '2020-04-13 04:10:34'),
(1, 7, 'App\\Idea', '2020-04-13 08:11:13', '2020-04-13 08:11:13'),
(2, 1, 'App\\Idea', '2020-04-12 17:32:01', '2020-04-12 17:32:01'),
(3, 2, 'App\\Idea', '2020-04-12 23:47:23', '2020-04-12 23:47:23'),
(3, 8, 'App\\Idea', '2020-04-14 01:47:56', '2020-04-14 01:47:56'),
(3, 10, 'App\\Idea', '2020-04-14 23:55:55', '2020-04-14 23:55:55'),
(4, 2, 'App\\Idea', '2020-04-12 23:47:23', '2020-04-12 23:47:23'),
(5, 3, 'App\\Idea', '2020-04-13 04:05:04', '2020-04-13 04:05:04'),
(6, 3, 'App\\Idea', '2020-04-13 04:05:04', '2020-04-13 04:05:04'),
(7, 4, 'App\\Idea', '2020-04-13 04:06:35', '2020-04-13 04:06:35'),
(8, 4, 'App\\Idea', '2020-04-13 04:06:35', '2020-04-13 04:06:35'),
(9, 4, 'App\\Idea', '2020-04-13 04:06:35', '2020-04-13 04:06:35'),
(10, 5, 'App\\Idea', '2020-04-13 17:13:15', '2020-04-13 17:13:15'),
(11, 5, 'App\\Idea', '2020-04-13 17:13:15', '2020-04-13 17:13:15'),
(12, 6, 'App\\Idea', '2020-04-13 04:10:34', '2020-04-13 04:10:34'),
(13, 6, 'App\\Idea', '2020-04-13 04:10:34', '2020-04-13 04:10:34'),
(14, 7, 'App\\Idea', '2020-04-13 08:11:13', '2020-04-13 08:11:13'),
(15, 7, 'App\\Idea', '2020-04-13 08:11:13', '2020-04-13 08:11:13'),
(16, 8, 'App\\Idea', '2020-04-14 01:47:56', '2020-04-14 01:47:56'),
(16, 9, 'App\\Idea', '2020-04-14 02:04:42', '2020-04-14 02:04:42'),
(16, 10, 'App\\Idea', '2020-04-14 23:55:55', '2020-04-14 23:55:55'),
(17, 9, 'App\\Idea', '2020-04-14 02:04:42', '2020-04-14 02:04:42'),
(18, 10, 'App\\Idea', '2020-04-14 23:55:55', '2020-04-14 23:55:55'),
(19, 11, 'App\\Idea', '2020-04-15 22:50:06', '2020-04-15 22:50:06'),
(20, 11, 'App\\Idea', '2020-04-15 22:50:06', '2020-04-15 22:50:06'),
(21, 11, 'App\\Idea', '2020-04-15 22:50:06', '2020-04-15 22:50:06');

-- --------------------------------------------------------

--
-- 表的结构 `taggable_tags`
--

CREATE TABLE `taggable_tags` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `normalized` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `taggable_tags`
--

INSERT INTO `taggable_tags` (`tag_id`, `name`, `normalized`, `created_at`, `updated_at`) VALUES
(1, 'wuhan', 'wuhan', '2020-04-12 17:32:01', '2020-04-12 17:32:01'),
(2, 'china', 'china', '2020-04-12 17:32:01', '2020-04-12 17:32:01'),
(3, 'hongkong', 'hongkong', '2020-04-12 23:47:23', '2020-04-12 23:47:23'),
(4, 'dineyland', 'dineyland', '2020-04-12 23:47:23', '2020-04-12 23:47:23'),
(5, 'Yichang', 'yichang', '2020-04-13 04:05:04', '2020-04-13 04:05:04'),
(6, 'piaoliu', 'piaoliu', '2020-04-13 04:05:04', '2020-04-13 04:05:04'),
(7, 'japan', 'japan', '2020-04-13 04:06:35', '2020-04-13 04:06:35'),
(8, 'friends', 'friends', '2020-04-13 04:06:35', '2020-04-13 04:06:35'),
(9, 'companion', 'companion', '2020-04-13 04:06:35', '2020-04-13 04:06:35'),
(10, 'tailand', 'tailand', '2020-04-13 04:07:39', '2020-04-13 04:07:39'),
(11, 'friend', 'friend', '2020-04-13 04:07:39', '2020-04-13 04:07:39'),
(12, 'cov19', 'cov19', '2020-04-13 04:10:34', '2020-04-13 04:10:34'),
(13, 'fight', 'fight', '2020-04-13 04:10:34', '2020-04-13 04:10:34'),
(14, 'mainland', 'mainland', '2020-04-13 08:11:13', '2020-04-13 08:11:13'),
(15, 'nice', 'nice', '2020-04-13 08:11:13', '2020-04-13 08:11:13'),
(16, 'demo', 'demo', '2020-04-14 01:47:56', '2020-04-14 01:47:56'),
(17, 'canifornia', 'canifornia', '2020-04-14 01:55:31', '2020-04-14 01:55:31'),
(18, 'test', 'test', '2020-04-14 23:55:55', '2020-04-14 23:55:55'),
(19, 'final', 'final', '2020-04-15 22:50:06', '2020-04-15 22:50:06'),
(20, 'check', 'check', '2020-04-15 22:50:06', '2020-04-15 22:50:06'),
(21, 'shanghai', 'shanghai', '2020-04-15 22:50:06', '2020-04-15 22:50:06');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'WangShizhu', '272743253@qq.com', 'WangShizhu', NULL, '$2y$10$GGYmd321bEc6u32M4ljasO0A1rTfM85NQ/Tx4hXgIXiXBfRD7m3QG', NULL, '2020-04-12 17:31:28', '2020-04-12 17:31:28'),
(2, 'Xu Nuo', 'xn@whu.com', 'XuNuo', NULL, '$2y$10$P2rir7.Vhv464XQ6AK06R.KuaBtBkp.kacsQ.ZhlE/mGXPr5JS1pm', NULL, '2020-04-13 04:05:34', '2020-04-13 04:05:34'),
(3, 'FanTianyu', 'fantianyu@winit.com', 'Fantianyu', NULL, '$2y$10$4r8XlM5PZ1nTtJUjcCJMw.g0pMSL3VA.CcLukVLPzujHFxUZmsj3m', NULL, '2020-04-13 07:37:44', '2020-04-13 07:37:44'),
(4, 'demo', 'demo@123.com', 'demo', NULL, '$2y$10$Q0aRkl3R9lhBcSz9/KC7A.ctoFSi51VaVScfMT.h1Ow50fDeTFH/K', NULL, '2020-04-14 01:35:10', '2020-04-14 01:35:10'),
(5, 'demo2', 'demo@1234.com', 'demo2', NULL, '$2y$10$vTmrVryNhYjb2j78ZRZZL.7SV3x6/2AqdiVuydRTdXgrJol9DGe.K', NULL, '2020-04-14 23:05:48', '2020-04-14 23:05:48'),
(6, 'finalCheck', 'finalCheck@hku.edu.hk', 'finalCheck', NULL, '$2y$10$0b9uGsaoCZXwJ/.arrlvsuE2LBwV4.bWEM/WnQE3pSQkcqqiAw3I2', NULL, '2020-04-15 22:49:00', '2020-04-15 22:49:00');

--
-- 转储表的索引
--

--
-- 表的索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ideas_user_id_index` (`user_id`);

--
-- 表的索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 表的索引 `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`);

--
-- 表的索引 `taggable_taggables`
--
ALTER TABLE `taggable_taggables`
  ADD UNIQUE KEY `taggable_taggables_tag_id_taggable_id_taggable_type_unique` (`tag_id`,`taggable_id`,`taggable_type`),
  ADD KEY `i_taggable_fwd` (`tag_id`,`taggable_id`),
  ADD KEY `i_taggable_rev` (`taggable_id`,`tag_id`),
  ADD KEY `i_taggable_type` (`taggable_type`);

--
-- 表的索引 `taggable_tags`
--
ALTER TABLE `taggable_tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `taggable_tags_normalized_unique` (`normalized`),
  ADD KEY `taggable_tags_normalized_index` (`normalized`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用表AUTO_INCREMENT `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `taggable_tags`
--
ALTER TABLE `taggable_tags`
  MODIFY `tag_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
