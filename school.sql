-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 10:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_tbl`
--

CREATE TABLE `class_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classs` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_tbl`
--

INSERT INTO `class_tbl` (`id`, `classs`, `created_at`, `updated_at`) VALUES
(1, 'Class 1', NULL, NULL),
(2, 'Class 2', NULL, NULL),
(3, 'Class 3', NULL, NULL),
(4, 'Class 4', NULL, NULL),
(5, 'Class 5', NULL, NULL),
(6, 'Class 6', NULL, NULL),
(7, 'Class 7', NULL, NULL),
(8, 'Class 8', NULL, NULL),
(9, 'Class 9', NULL, NULL),
(10, 'Class 10', NULL, NULL),
(11, 'Class 11', NULL, NULL),
(12, 'Class 12', NULL, NULL);

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2022_12_01_091626_add_details_to_users_table', 1),
(14, '2022_12_01_115546_create_teacher_table', 1),
(15, '2022_12_02_054739_add_details_to_teacher_table', 1),
(16, '2022_12_03_071610_add_details_to_users_table', 1),
(17, '2022_12_03_085953_create_student_table', 1),
(18, '2022_12_03_094335_update_teacher_id_column_in_teacher_table', 1),
(19, '2022_12_05_055230_delete_column_to_teacher_table', 1),
(20, '2022_12_05_061730_add_foreign_key_to_teacher_table', 2),
(21, '2022_12_05_094756_create_table_student', 3),
(22, '2022_12_05_095205_create_class_table', 3),
(23, '2022_12_06_085818_create_class_table', 4),
(24, '2022_12_07_055925_create_class_tbl_table', 4),
(25, '2022_12_07_062549_create_section_tbl_table', 5),
(26, '2022_12_09_050229_create_student_table', 6),
(27, '2022_12_09_051720_add_foreign_key_to_student_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `max` bigint(20) NOT NULL DEFAULT 0,
  `current` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cid` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`id`, `name`, `max`, `current`, `created_at`, `updated_at`, `cid`) VALUES
(1, 'A', 15, 15, '2022-12-07 03:18:44', '2022-12-08 05:03:36', 1),
(3, 'B', 20, 0, '2022-12-07 03:21:38', '2022-12-07 03:21:38', 1),
(7, 'A', 25, 1, '2022-12-07 04:23:05', '2022-12-10 21:47:51', 2),
(8, 'C', 25, 0, '2022-12-07 05:10:40', '2022-12-07 05:10:40', 1),
(9, 'A', 20, 0, '2022-12-10 22:07:06', '2022-12-10 22:07:06', 3),
(10, 'A', 50, 1, '2022-12-10 22:07:32', '2022-12-12 00:19:37', 4),
(11, 'A', 20, 1, '2022-12-10 22:07:38', '2022-12-12 00:21:47', 5),
(12, 'A', 20, 0, '2022-12-10 22:07:45', '2022-12-10 22:07:45', 6),
(13, 'A', 30, 0, '2022-12-10 22:07:51', '2022-12-10 22:07:51', 7),
(14, 'A', 35, 0, '2022-12-10 22:07:59', '2022-12-10 22:07:59', 8),
(15, 'A', 25, 0, '2022-12-10 22:08:05', '2022-12-10 22:08:05', 9),
(16, 'A', 45, 1, '2022-12-10 22:08:11', '2022-12-10 22:09:08', 10),
(17, 'A', 50, 1, '2022-12-10 22:08:21', '2022-12-12 00:26:44', 11),
(18, 'A', 5, 0, '2022-12-10 22:08:28', '2022-12-10 22:08:28', 12);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lname` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `secemail` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` bigint(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=delete,0=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sid` bigint(20) UNSIGNED NOT NULL,
  `stid` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `lname`, `student_id`, `secemail`, `gender`, `phone`, `dob`, `img`, `address`, `state`, `zip`, `city`, `is_delete`, `created_at`, `updated_at`, `sid`, `stid`) VALUES
(3, 'Boris Pruitt', 'SCH22CL10STU001', 'xizorewik@mailinator.com', 'Male', '+1 (313) 481-8227', '2019-02-24', NULL, 'Necessitatibus magni', 'Assam', 61248, 'Animi ratione repre', 0, '2022-12-10 22:09:08', '2022-12-10 22:09:08', 16, 26),
(4, 'Scarlet Goodwin', 'SCH22CL4STU001', 'varemovoxa@mailinator.com', 'Male', '+1 (251) 224-5344', '1972-12-19', '1670824177.jpg', 'Rerum dolor aut mole', 'Delhi', 56728, 'Ipsum voluptate per', 0, '2022-12-12 00:19:37', '2022-12-12 00:19:37', 10, 27),
(5, 'Britanney Briggs', 'SCH22CL5STU001', 'sehexysec@mailinator.com', 'Male', '+1 (158) 159-8938', '1976-03-18', NULL, 'Quia nihil voluptas', 'Rajasthan', 13306, 'Illum asperiores ci', 0, '2022-12-12 00:21:47', '2022-12-12 00:21:47', 11, 28);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `teacher_id` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=users,1=admin',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=delete,0=active',
  `tid` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `phone`, `qualification`, `img`, `gender`, `teacher_id`, `created_at`, `updated_at`, `role_as`, `status`, `is_delete`, `tid`) VALUES
(1, '+1 (825) 254-999', 'Ea autem fuga Illo', '1670230519.jpg', 'Female', 'SCH22TEC00', '2022-12-05 01:30:20', '2022-12-12 01:58:52', 1, 1, 1, 5),
(3, '+1 (642) 271-8953', 'Porro sit rerum sed', '1670224965.jpg', 'Male', 'SCH22TEC03', '2022-12-05 01:52:45', '2022-12-05 03:47:43', 1, 1, 1, 7),
(6, '+1 (105) 168-5668', 'Eos necessitatibus e', '1670231290.jpg', 'Female', 'SCH22TEC03', '2022-12-05 03:38:10', '2022-12-05 03:38:16', 1, 1, 1, 11),
(7, '+1 (656) 743-5141', 'In officia non a ill', NULL, 'Female', 'SCH22TEC03', '2022-12-05 03:50:41', '2022-12-05 03:50:47', 1, 1, 1, 12),
(8, '+1 (454) 285-5884', 'Laboris officia iure', NULL, 'Female', 'SCH22TEC04', '2022-12-05 04:07:18', '2022-12-12 21:42:44', 1, 1, 1, 13),
(9, '+1 (305) 578-6209', 'Porro voluptates dis', NULL, 'Female', 'SCH22TEC05', '2022-12-05 04:50:49', '2022-12-13 00:34:34', 1, 1, 0, 14),
(10, '+1 (358) 161-6923', 'Quis nihil ullam ver', NULL, 'Female', 'SCH22TEC06', '2022-12-06 01:38:53', '2022-12-12 21:52:35', 1, 1, 1, 15),
(11, '+1 (581) 447-8399', 'Voluptate reprehende', '1670901812.jpg', 'Female', 'SCH22TEC07', '2022-12-12 21:53:32', '2022-12-13 03:49:15', 1, 1, 0, 29),
(12, '+1 (324) 401-6806', 'Distinctio Quis vol', '1670913093.jpg', 'Male', 'SCH22TEC08', '2022-12-13 01:01:33', '2022-12-13 01:01:44', 1, 1, 1, 30);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0=admin,1=teacher.2=student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$LW5Mnec.1uhL8T17ymtqe.4ad.yv/f908mNit1NrpCn4tADox4jG2', NULL, '2022-12-05 00:35:36', '2022-12-05 00:35:36', 0),
(5, 'iam', 'iam@mailinator.com', NULL, '$2y$10$y1X5mv7t3YGJlCjE1KZyc.0L.p3Zepe5i36V4Wff1ZRDXTTFoJuye', NULL, '2022-12-05 01:30:20', '2022-12-12 01:58:52', 3),
(6, 'Eliana Britt', 'jycivevidu@mailinator.com', NULL, '$2y$10$R2FoEPA5NW0pB4G7MNxHOuUz43AIzCb/6Xmqpur2u9fSELyYBeUXq', NULL, '2022-12-05 01:30:40', '2022-12-05 03:38:16', 3),
(7, 'Richard Keith', 'nofitiqula@mailinator.com', NULL, '$2y$10$YSEva0XSyNuG9q6MF5vNeOuLZSttm.F6S.d9Cc5HDGlYqYJ9EkUFa', NULL, '2022-12-05 01:52:45', '2022-12-05 01:52:45', 1),
(8, 'Talon Waller', 'helo@gmail.com', NULL, '$2y$10$Px15oeuQhTFM.cz5Bvcf5ey5qODiB8c81l4lMqc3t/DIBWtt7dtHa', NULL, '2022-12-05 03:30:01', '2022-12-05 03:30:01', 1),
(9, 'Sade Strong', 'hy@gmail.com', NULL, '$2y$10$lU/wY023Px889HBkBLtyMuLfZcn3DekFlMWGWKTifvB87Pphm1S3y', NULL, '2022-12-05 03:34:07', '2022-12-05 03:34:07', 1),
(11, 'Cleo Black', 'hy1@gmail.com', NULL, '$2y$10$DWpa3uO/sCqzkC0tsE55QeI6GlJrkqU7Tw40Fqj6C6XUDjbsjzVE.', NULL, '2022-12-05 03:38:10', '2022-12-05 03:38:10', 1),
(12, 'Bert Bennett', 'conykef@mailinator.com', NULL, '$2y$10$8jlIMik79mH/GEiMREqEUuPzzT87emGzstVq/e/d9ajEhHIsrLtim', NULL, '2022-12-05 03:50:41', '2022-12-05 03:50:47', 3),
(13, 'Hasad Pierce', 'nehu@mailinator.com', NULL, '$2y$10$wwyJWq3Cv6UpSN/hQcjUUeeYeovoVzMIpOEqLKXX7AhArxOusjfcW', NULL, '2022-12-05 04:07:18', '2022-12-12 21:42:44', 3),
(14, 'Hiroko Grimes', 'abc@gmail.com', NULL, '$2y$10$QVBg1kE7Imm53V3THKl8o.rLP99W.48WIxhL1Ml.VHtb8JvQgS23a', NULL, '2022-12-05 04:50:49', '2022-12-05 04:50:49', 1),
(15, 'Fatima Dudley', 'pasuc@mailinator.com', NULL, '$2y$10$uAhpkgv78K1GfzvIabH7Dui5kvUXNqwPnTuCY1LiF22MPKb1l4qca', NULL, '2022-12-06 01:38:53', '2022-12-12 21:52:35', 3),
(25, 'Daquan', '2022schcl4Daquan001@school.org', NULL, '$2y$10$clP33fEVoczcolES4EWkfeuGbWvstXYcLbv6Q75oN4Dvmu6S.UtVW', NULL, '2022-12-10 22:05:00', '2022-12-10 22:05:00', 2),
(26, 'TaShya', '2022schcl10aTaShya001@school.org', NULL, '$2y$10$qISovITZdIe2QN.zllq/kutz7zyBP/1Ir/3XJ8QfeQPTN1K9gH0d2', NULL, '2022-12-10 22:09:08', '2022-12-10 22:09:08', 2),
(27, 'Rama', '2022schcl4aRama001@school.org', NULL, '$2y$10$pxeq1LOoPCqx9jFBB6Hue..VdgMK6B38X6JG5mmWIbBjGs98nJs7W', NULL, '2022-12-12 00:19:37', '2022-12-12 00:19:37', 2),
(28, 'Shad Kennedy', '2022schcl5aShad Kennedy001@school.org', NULL, '$2y$10$TYIiTIAmUXuhMjXMkM0Ax.BJdnpRUVtKB/ch6sR6bXxojy8Rn3ISG', NULL, '2022-12-12 00:21:47', '2022-12-12 00:21:47', 2),
(29, 'Kaseem Vinson', 'gitykodi@mailinator.com', NULL, '$2y$10$SiYkohMCuyCkAthPjKKIWuyTDTlZrVp3e2UKjRdwNNqzNseMCxdO.', NULL, '2022-12-12 21:53:32', '2022-12-12 21:53:32', 1),
(30, 'Rae Berger', 'dabiq@mailinator.com', NULL, '$2y$10$Px7I.2QnJF5EGqQedfdYH.aHNr6DKZZYT9creLDkEdDyfEPsoNriS', NULL, '2022-12-13 01:01:33', '2022-12-13 01:01:44', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_tbl`
--
ALTER TABLE `class_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_secemail_unique` (`secemail`),
  ADD KEY `student_sid_foreign` (`sid`),
  ADD KEY `student_stid_foreign` (`stid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_tid_foreign` (`tid`);

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
-- AUTO_INCREMENT for table `class_tbl`
--
ALTER TABLE `class_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD CONSTRAINT `section_tbl_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `class_tbl` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `section_tbl` (`id`),
  ADD CONSTRAINT `student_stid_foreign` FOREIGN KEY (`stid`) REFERENCES `users` (`id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_tid_foreign` FOREIGN KEY (`tid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
