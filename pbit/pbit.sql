-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2018 at 11:52 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `trailer_videos_id` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `user_id`, `course_id`, `slug`, `title`, `description`, `video_id`, `document_id`, `trailer_videos_id`, `image`, `publish`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'what-is-lorem-ipsum-beginner', 'What is Lorem Ipsum? Beginner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, NULL, 'GKBzZfMg67X408n5FFjz.jpg', 1, '2018-11-24 13:06:37', '2018-11-29 18:00:05'),
(2, 1, 2, 'why-do-we-use-it-advance', 'Why do we use it? Advance', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, NULL, 'b0G4ZznD57yG3GPDkwFM.jpg', 1, '2018-11-24 13:08:31', '2018-11-29 17:56:13'),
(3, 1, 3, 'where-does-it-come-from-intermediate', 'Where does it come from? intermediate', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', NULL, NULL, NULL, '3Px26tzb4WCWTaurGnlb.jpg', 1, '2018-11-24 13:09:19', '2018-11-29 17:56:24'),
(9, 1, 3, 'learn-the-basics', 'Learn the Basics', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, NULL, 'BsBqkQPEnxs9WrTxh8Fq.jpg', 1, '2018-12-05 08:36:43', '2018-12-05 08:44:58'),
(10, 1, 1, 'the-ultimate-mysql-bootcamp-go-from-sql-beginner-to-expert-beginner', 'The Ultimate MySQL Bootcamp: Go from SQL Beginner to Expert (Beginner)', 'If you want to learn how to gain insights from data but are too intimidated by databases to know where to start, then this course is for you. This course is a gentle but comprehensive introduction to MySQL, one of the most highly in-demand skills in the business sector today.  \r\n\r\nWhether you work in sales or marketing, you run your own company, or you want to build your own apps, mastering MySQL is crucial to answering complex business problems and questions using insights from data. The Ultimate MySQL Bootcamp introduces you to a solid foundation in databases in a way that’s both informative and engaging. Yes, that’s right, it’s possible to make an engaging course on databases.', NULL, NULL, NULL, 'oyYYAdPlo454jqL8y44L.jpg', 1, '2018-12-05 11:50:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `topic_id` bigint(20) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(10) unsigned NOT NULL,
  `promotion_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('percentage','fixed_amount') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed_amount',
  `value` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `apply_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `number_of_user` int(11) DEFAULT NULL,
  `max_usage` int(11) NOT NULL DEFAULT '1',
  `apply_once` tinyint(1) NOT NULL DEFAULT '1',
  `new_signups_only` tinyint(1) NOT NULL DEFAULT '0',
  `existing_clients_only` tinyint(1) NOT NULL DEFAULT '0',
  `applied_coupons` int(11) DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `promotion_code`, `type`, `value`, `apply_on`, `start_date`, `expiry_date`, `number_of_user`, `max_usage`, `apply_once`, `new_signups_only`, `existing_clients_only`, `applied_coupons`, `note`, `created_at`, `updated_at`) VALUES
(1, 'TK_IUYYU#44^%8#9', 'fixed_amount', '123', '1,2,3', NULL, NULL, 35, 1, 1, 0, 0, NULL, '121212hg h jhgj hg', '2018-11-16 18:44:38', '2018-11-26 09:13:23'),
(2, 'TEST@!@#', 'percentage', '10', '1,2,4', NULL, NULL, 20, 1, 1, 0, 0, NULL, 'testing coupon', '2018-11-19 05:25:11', '2018-11-19 05:25:11'),
(3, 'GETTDI', 'percentage', '10', '1,2,3', NULL, NULL, 1, 1, 1, 0, 0, NULL, NULL, '2018-11-29 13:03:35', '2018-11-29 13:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` float NOT NULL,
  `actual_price` float NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `course_name`, `course_title`, `slug`, `course_description`, `course_price`, `actual_price`, `image`, `publish`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beginner', 'Beginner Title', 'beginner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 240.55, 200.99, 'ovgHlDLMy2FghJtFCi0n.jpg', 1, '2018-11-24 12:57:49', '2018-12-05 08:48:03'),
(2, 1, 'Intermediate', 'intermediate title', 'intermediate', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 600, 550, 'H9rnD4MWM13ZnL03XM4T.jpg', 1, '2018-11-24 13:02:09', '2018-11-29 17:44:28'),
(3, 1, 'Advanced', 'Advanced  Title', 'advanced', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 300, 250, 'YltOuCcGslLc0DU6CYIP.jpg', 1, '2018-11-24 13:00:33', '2018-12-05 08:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `parent_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `parent_id`, `parent_type`, `document_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'course', '1_7DzJIsivS3YCzOBQNkid.pdf', '2018-11-24 12:57:50', '2018-11-24 12:57:50'),
(2, 2, 'course', '2_684fUxKmmnvWZJnI3ok9.pdf', '2018-11-24 13:00:34', '2018-11-24 13:00:34'),
(3, 3, 'course', '3_tKJeGv8nWwn3JYw2UkdL.pdf', '2018-11-24 13:02:09', '2018-11-24 13:02:09'),
(4, 1, 'chapter', '1_UhkrHsb9GHoyFUvrf0La.pdf', '2018-11-24 13:06:38', '2018-11-24 13:06:38'),
(5, 2, 'chapter', '2_HavYzVaRvVibWr9SdrDT.pdf', '2018-11-24 13:08:31', '2018-11-24 13:08:31'),
(6, 3, 'chapter', '3_3sctM7qZCpnSLvrcyQcy.pdf', '2018-11-24 13:09:19', '2018-11-24 13:09:19'),
(7, 1, 'topic', '1_0vVfN68m0D3czbiRZDFf.pdf', '2018-11-24 13:14:58', '2018-11-24 13:14:58'),
(8, 2, 'topic', '2_npJNQnNkOF1kSxQsW4Dk.pdf', '2018-11-24 13:16:26', '2018-11-24 13:16:26'),
(9, 3, 'topic', '3_0PYuGIvJEstBpGie4cQi.pdf', '2018-11-24 13:18:06', '2018-11-24 13:18:06'),
(10, 4, 'topic', '4_23A5f76dMfBDV1izf4UK.pdf', '2018-11-26 04:38:16', '2018-11-26 04:38:16'),
(11, 4, 'course', '4_q36cm2HmcsHlxhpuwShN.pdf', '2018-11-26 11:26:49', '2018-11-26 11:26:49'),
(12, 5, 'course', '5_tZDMjjFj289bbUxeBq6E.pdf', '2018-11-26 11:34:36', '2018-11-26 11:34:36'),
(13, 4, 'chapter', '4_4ORtZ1oWa9K4fo9J3RIq.pdf', '2018-11-26 11:42:01', '2018-11-26 11:42:01'),
(14, 5, 'topic', '5_DIvf8AEZQ7hLHx1QCUgc.pdf', '2018-11-26 11:44:05', '2018-11-26 11:44:05'),
(15, 6, 'course', '6_xupVP1rBlnMNEingVKqt.pdf', '2018-11-26 12:07:57', '2018-11-26 12:07:57'),
(16, 5, 'chapter', '5_hjyINhhUzROUuoViefVb.pdf', '2018-11-26 12:09:29', '2018-11-26 12:09:29'),
(17, 6, 'topic', '6_Dqf4guKMywmWnXJ27YAf.pdf', '2018-11-26 12:11:40', '2018-11-26 12:11:40'),
(18, 7, 'course', '7_aS0dOKC2oBlgcfV2HwiD.pdf', '2018-11-26 12:53:23', '2018-11-26 12:53:23'),
(19, 7, 'topic', '7_xwKgEtfp8OuNKmBAFyoF.pdf', '2018-11-26 13:30:10', '2018-11-26 13:30:10'),
(20, 8, 'topic', '8_yGE5t6ObAXiUe7fHotFZ.pdf', '2018-11-26 13:38:44', '2018-11-26 13:38:44'),
(21, 8, 'course', '8_AlNP7YaL443Fo3PFJcvY.pdf', '2018-11-26 16:52:34', '2018-11-26 16:52:34'),
(22, 6, 'chapter', '6_xeWwoAzQn57P7R2GCdBd.pdf', '2018-11-26 16:57:56', '2018-11-26 16:57:56'),
(23, 9, 'topic', '9_lUTDg3abWsZ9wDPlqMyA.pdf', '2018-11-26 17:07:32', '2018-11-26 17:07:32'),
(24, 9, 'course', '9_pTngZHkpccjVR3b725HG.pdf', '2018-11-29 07:35:09', '2018-11-29 07:35:09'),
(25, 7, 'chapter', '7_IRxAYTWTbqnI2Nn2BYaA.pdf', '2018-11-29 09:23:22', '2018-11-29 09:23:22'),
(26, 10, 'course', '10_LF9SCejMc4eatOk1pyTJ.pdf', '2018-11-29 10:11:28', '2018-11-29 10:11:28'),
(27, 11, 'course', '11_HBYqXw761VthVpuDKV2p.pdf', '2018-11-29 10:19:54', '2018-11-29 10:19:54'),
(28, 12, 'course', '12_xurbAmosXZvceh6Yutq7.pdf', '2018-11-29 10:34:17', '2018-11-29 10:34:17'),
(29, 13, 'course', '13_77pxWM18MYNFTDPHSSJt.pdf', '2018-11-29 11:48:49', '2018-11-29 11:48:49'),
(30, 8, 'chapter', '8_WzQl194PeEVl914ErdpX.docx', '2018-11-29 12:41:48', '2018-11-29 12:41:48'),
(31, 10, 'topic', '10_1kfqFqTpqAjV1jUPxrjC.docx', '2018-11-29 12:53:53', '2018-11-29 12:53:53'),
(32, 15, 'course', '15_DiaLwEQtah8AV3rLkmpM.pdf', '2018-11-29 20:59:33', '2018-11-29 20:59:33'),
(34, 9, 'chapter', '9_5QrqCKIFjQSYU5VUYkAl.pdf', '2018-12-05 08:41:26', '2018-12-05 08:41:26'),
(35, 9, 'chapter', '9_yfcATVBTjooh7FxFvYgr.pdf', '2018-12-05 08:44:58', '2018-12-05 08:44:58'),
(36, 9, 'chapter', '9_aHlX72RELK2kiYhidOWU.pdf', '2018-12-05 08:44:58', '2018-12-05 08:44:58'),
(37, 9, 'chapter', '9_6mqyAp8GmVl2rniwvPb5.pdf', '2018-12-05 08:44:58', '2018-12-05 08:44:58'),
(38, 9, 'chapter', '9_UHzzCAazimaKLcbFC0WM.pdf', '2018-12-05 08:44:58', '2018-12-05 08:44:58'),
(39, 9, 'chapter', '9_ENvPCbSo7DpvbvkPx3JQ.pdf', '2018-12-05 08:44:58', '2018-12-05 08:44:58'),
(40, 9, 'chapter', '9_8y8tztQZtbkxApW3ObvG.pdf', '2018-12-05 08:44:58', '2018-12-05 08:44:58'),
(41, 9, 'chapter', '9_kpEadAQRmIelSb4zJZkj.pdf', '2018-12-05 08:44:58', '2018-12-05 08:44:58'),
(42, 3, 'course', '3_q0xl20DwZe6IB2UC93XV.pdf', '2018-12-05 08:47:45', '2018-12-05 08:47:45'),
(43, 3, 'course', '3_VvClVQZNCb8dFeYVdrZT.pdf', '2018-12-05 08:47:45', '2018-12-05 08:47:45'),
(44, 3, 'course', '3_CEXEWYvBARAW07Hj6bXG.pdf', '2018-12-05 08:47:45', '2018-12-05 08:47:45'),
(45, 3, 'course', '3_1FKwImD2hP5w13MZxz6w.pdf', '2018-12-05 08:47:45', '2018-12-05 08:47:45'),
(46, 3, 'course', '3_PMbZSJjzHIdvmME0OrI8.pdf', '2018-12-05 08:47:45', '2018-12-05 08:47:45'),
(47, 3, 'course', '3_XxCSGfJhCRyIQHWdNShd.pdf', '2018-12-05 08:47:45', '2018-12-05 08:47:45'),
(48, 3, 'course', '3_7NCe09DhMQCShvauRXWB.pdf', '2018-12-05 08:47:45', '2018-12-05 08:47:45'),
(49, 3, 'course', '3_dyd1SikeOO0RNA7wJZD9.pdf', '2018-12-05 08:47:45', '2018-12-05 08:47:45'),
(50, 1, 'course', '1_avR3nvbhA5uTbYdEW00c.pdf', '2018-12-05 08:48:03', '2018-12-05 08:48:03'),
(51, 1, 'course', '1_bu0oXNDpiDPvEQpl3bF3.pdf', '2018-12-05 08:48:03', '2018-12-05 08:48:03'),
(52, 1, 'course', '1_hHu0EQze3IMlOTduZQXC.pdf', '2018-12-05 08:48:03', '2018-12-05 08:48:03'),
(53, 1, 'course', '1_cyV5ECSN6ahkVExkXMe6.pdf', '2018-12-05 08:48:03', '2018-12-05 08:48:03'),
(54, 10, 'topic', '10_3czucASGEaHsRKGw8OVi.pdf', '2018-12-05 08:50:19', '2018-12-05 08:50:19'),
(55, 10, 'topic', '10_WVjTCfp8dbvpVsfkjrn6.pdf', '2018-12-05 08:50:19', '2018-12-05 08:50:19'),
(56, 10, 'topic', '10_bkkL8c5j99oA1t0VaCa2.pdf', '2018-12-05 08:50:19', '2018-12-05 08:50:19'),
(57, 10, 'topic', '10_xewgnwA5xZON2QxBz8QU.pdf', '2018-12-05 08:50:19', '2018-12-05 08:50:19'),
(58, 10, 'chapter', '10_jjzqsAxVXhc83c6EXvlb.pdf', '2018-12-05 11:50:17', '2018-12-05 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `template_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` longtext COLLATE utf8mb4_unicode_ci,
  `template_for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `user_id`, `template_name`, `template`, `template_for`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'New Registration Email', '**hello** {$name} ,\r\n\r\n**Welcome to powerbitraning.com**', 'on_registeration', 'inactive', '2018-11-21 09:04:10', '2018-11-29 13:57:21'),
(2, 1, 'Forget password', 'Forget password', 'on_forgetpasword', 'inactive', '2018-12-05 05:43:48', '2018-12-05 05:43:48'),
(3, 1, 'change password', 'change password {$name}', 'on_change_password', 'inactive', '2018-12-05 05:44:37', '2018-12-05 05:44:37'),
(4, 1, 'on order', 'order created', 'on_order', 'inactive', '2018-12-05 05:45:20', '2018-12-05 05:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_listing`
--

CREATE TABLE IF NOT EXISTS `gateway_listing` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gateway_listing`
--

INSERT INTO `gateway_listing` (`id`, `name`, `key`, `value`, `type`) VALUES
(27, 'Paypal', 'Pass', 'eyJpdiI6IlgrTUFMZFVma05SR2NuckpuYndCNGc9PSIsInZhbHVlIjoiY1lpVmFcL0RUMklHXC9xbkx4VDN0ZTJnPT0iLCJtYWMiOiIyZDA5ZTg5MTc3NzE2YTk4MWU1YjNlYjhiNDQ3YTEwZGFiMzAwOWFhZjFhNjEwY2NkMjQ0ZGNmZTk4Y2Q3MDcyIn0=', 'password'),
(26, 'Paypal', 'Email', 'eyJpdiI6IkUwaXJzVzhVWWtaTkRpNXNjTVVUdWc9PSIsInZhbHVlIjoiaXRMV2t5Y2hSOTduXC9VQ3NHOUFHXC9CeDVrYkdaUUlibGcrTVY2aVZ5eW5NPSIsIm1hYyI6Ijk4MzcxOWE1MTYyOWFkODdkNGVmZmI4ODQyNDUyNWU1OTRhOGMyYjhhOTRjMjk4Nzc4ODM0Njg4OTg5YTliNWQifQ==', 'email'),
(25, 'Paypal', 'name', 'Paypal', ''),
(34, 'Stripe', 'email', 'eyJpdiI6Ik1OSG40MzhTYlEybk5OVGJvUU15cWc9PSIsInZhbHVlIjoiRFBuNldaclpPc0FOXC93cFpDSks4eTVDUVBBMWY3enh0ZDNVeUhXMEg4NWh1Q1lQQnJaMlRJYys4V0hUQW5NWXQiLCJtYWMiOiJkOTE2ZDgzMGMwYjk2NGZkZDYzMWI3MWMzODM2ZWUzMDUyN2M0MDQ4NmU2MGQ3YzkwOWI3ZjEzNDEwYTMyM2Y1In0=', 'email'),
(33, 'Stripe', 'name', 'Stripe', ''),
(35, 'Stripe', 'pass', 'eyJpdiI6Ilhicm9FV0xKSkRaWllJTElSMlQ0Wnc9PSIsInZhbHVlIjoiUHlySTUwZFdiY0ZcL1RycGRIOU4ySmlWc3lrZVBEaGZ0SUtwTFwvOWVBTWlJPSIsIm1hYyI6IjVjNmU4ZjNiMDFkZjJlNDQ0OTI2ZWUyODkzMDJiOTU2ZWM0YjdiZjNhMDg3ZDU1YWUwMzFmMzQ2NGQ4NzdhNTUifQ==', 'password'),
(36, 'Stripe', 'Apikey', 'eyJpdiI6InlYa3dEY3BjM3hLUEVhNmVPUlwvWDJ3PT0iLCJ2YWx1ZSI6IkVxclpGdWVMUzEwVlc3azhBNklpbFE9PSIsIm1hYyI6ImMyY2FhYTJhZmI1Y2RhYWFhZTlmYjdkYTlkZWIxYmIxNmRkY2EyODQ1ZjgxZGU3M2NhZTU3ZWZlNDYyNThiNjYifQ==', 'password'),
(37, 'Stripe', 'Order', 'dfsd', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT '1',
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `order_id`, `item_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, '200', '2018-11-24 13:05:36', '2018-11-24 13:05:36'),
(2, 7, 1, 1, '200', '2018-11-26 09:01:59', '2018-11-26 09:01:59'),
(3, 8, 2, 1, '250', '2018-11-26 09:03:35', '2018-11-26 09:03:35'),
(4, 9, 1, 1, '200', '2018-11-26 09:15:03', '2018-11-26 09:15:03'),
(5, 10, 2, 1, '250', '2018-11-26 09:33:59', '2018-11-26 09:33:59'),
(6, 11, 3, 1, '550', '2018-11-26 11:36:13', '2018-11-26 11:36:13'),
(7, 13, 3, 1, '550', '2018-11-26 12:38:24', '2018-11-26 12:38:24'),
(8, 14, 2, 1, '250', '2018-11-26 13:49:19', '2018-11-26 13:49:19'),
(9, 15, 1, 1, '200', '2018-11-26 15:30:30', '2018-11-26 15:30:30'),
(10, 16, 1, 1, '200', '2018-11-28 13:15:32', '2018-11-28 13:15:32'),
(11, 16, 3, 1, '250', '2018-11-28 13:15:32', '2018-11-28 13:15:32'),
(12, 17, 2, 1, '550', '2018-11-28 19:31:08', '2018-11-28 19:31:08'),
(13, 18, 1, 1, '200', '2018-11-29 06:13:13', '2018-11-29 06:13:13'),
(15, 20, 1, 1, '200', '2018-11-29 11:45:42', '2018-11-29 11:45:42'),
(16, 21, 1, 1, '200', '2018-11-29 13:06:10', '2018-11-29 13:06:10'),
(17, 22, 2, 1, '550', '2018-11-29 13:18:23', '2018-11-29 13:18:23'),
(18, 23, 1, 1, '200', '2018-11-29 13:51:44', '2018-11-29 13:51:44'),
(20, 24, 2, 1, '550', '2018-11-29 14:25:31', '2018-11-29 14:25:31'),
(21, 25, 1, 1, '200', '2018-11-29 16:03:11', '2018-11-29 16:03:11'),
(22, 26, 1, 1, '200', '2018-11-29 17:09:01', '2018-11-29 17:09:01'),
(23, 26, 2, 1, '550', '2018-11-29 17:09:01', '2018-11-29 17:09:01'),
(24, 27, 1, 1, '200', '2018-11-29 18:16:03', '2018-11-29 18:16:03'),
(25, 28, 2, 1, '550', '2018-11-30 10:46:51', '2018-11-30 10:46:51'),
(26, 28, 1, 1, '200.99', '2018-11-30 10:46:51', '2018-11-30 10:46:51'),
(27, 29, 1, 1, '200.99', '2018-11-30 11:01:36', '2018-11-30 11:01:36'),
(28, 30, 1, 1, '200.99', '2018-11-30 11:03:30', '2018-11-30 11:03:30'),
(29, 31, 1, 1, '200.99', '2018-12-03 13:31:44', '2018-12-03 13:31:44'),
(30, 32, 1, 1, '200.99', '2018-12-03 13:55:03', '2018-12-03 13:55:03'),
(31, 32, 2, 1, '550', '2018-12-03 13:55:03', '2018-12-03 13:55:03'),
(32, 33, 1, 1, '200.99', '2018-12-04 11:58:14', '2018-12-04 11:58:14'),
(33, 34, 1, 1, '200.99', '2018-12-04 11:59:39', '2018-12-04 11:59:39'),
(34, 35, 1, 1, '200.99', '2018-12-04 12:01:46', '2018-12-04 12:01:46'),
(35, 36, 1, 1, '200.99', '2018-12-04 12:57:36', '2018-12-04 12:57:36'),
(36, 37, 1, 1, '200.99', '2018-12-04 13:01:06', '2018-12-04 13:01:06'),
(37, 38, 1, 1, '200.99', '2018-12-04 13:46:15', '2018-12-04 13:46:15'),
(38, 39, 1, 1, '200.99', '2018-12-04 13:56:29', '2018-12-04 13:56:29'),
(39, 40, 1, 1, '200.99', '2018-12-04 14:07:18', '2018-12-04 14:07:18'),
(40, 41, 1, 1, '200.99', '2018-12-04 14:08:23', '2018-12-04 14:08:23'),
(41, 42, 1, 1, '200.99', '2018-12-04 14:10:35', '2018-12-04 14:10:35'),
(42, 43, 2, 1, '550', '2018-12-04 14:14:22', '2018-12-04 14:14:22'),
(43, 44, 1, 1, '200.99', '2018-12-04 14:16:31', '2018-12-04 14:16:31'),
(44, 45, 1, 1, '200.99', '2018-12-04 14:18:47', '2018-12-04 14:18:47'),
(45, 46, 1, 1, '200.99', '2018-12-04 14:22:55', '2018-12-04 14:22:55'),
(46, 47, 1, 1, '200.99', '2018-12-04 14:32:28', '2018-12-04 14:32:28'),
(47, 48, 1, 1, '200.99', '2018-12-05 07:02:38', '2018-12-05 07:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `log` longtext COLLATE utf8mb4_unicode_ci,
  `action_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `log`, `action_type`, `ip`, `client`, `created_at`, `updated_at`) VALUES
(28, 1, 'User (o217219@nwytg.net) deleted by Sandeep Rathour', 'deleted', '103.36.77.53', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', '2018-11-29 09:15:27', '2018-11-29 09:15:27'),
(29, 1, 'Order number #23 update by Sandeep Rathour', 'update', '182.75.35.26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '2018-11-29 13:55:01', '2018-11-29 13:55:01'),
(30, 1, 'Order number #23 update by Sandeep Rathour', 'update', '182.75.35.26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '2018-11-29 13:56:40', '2018-11-29 13:56:40'),
(31, 1, 'Order number #25 update by Sandeep Rathour', 'update', '103.36.77.53', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', '2018-12-03 12:19:55', '2018-12-03 12:19:55'),
(32, 1, 'Order number #25 update by Sandeep Rathour', 'update', '103.36.77.53', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', '2018-12-03 12:20:26', '2018-12-03 12:20:26'),
(33, 1, 'User (errino@epcgroup.net) status changed from inactiveto active by Sandeep Rathour', 'update', '103.36.77.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '2018-12-03 17:11:57', '2018-12-03 17:11:57'),
(34, 1, 'User  (sushant.shinedezign@gmail.com) updated by Sandeep Rathour', 'update', '103.36.77.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '2018-12-03 17:14:48', '2018-12-03 17:14:48'),
(35, 1, 'User (sushant.shinedezign@gmail.com) status changed from inactiveto active by Sandeep Rathour', 'update', '103.36.77.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '2018-12-03 17:14:58', '2018-12-03 17:14:58'),
(36, 1, 'User  (akash@gmail.com) updated by Sandeep Rathour', 'update', '103.36.77.53', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', '2018-12-05 05:07:19', '2018-12-05 05:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_11_153425_create_notifications_table', 1),
(4, '2018_10_11_153811_create_comments_table', 1),
(5, '2018_10_11_214455_create_thumnails_table', 1),
(6, '2018_10_11_214507_create_videos_table', 1),
(7, '2018_10_11_214517_create_documents_table', 1),
(8, '2018_10_15_174521_create_trailer_videos_table', 1),
(9, '2018_10_16_175320_create_payment_meta_table', 1),
(10, '2018_10_16_190947_create_payment_getways_table', 1),
(11, '2018_10_19_042743_create_courses_table', 1),
(12, '2018_10_19_061657_create_topics_table', 1),
(13, '2018_10_26_105235_create_chapters_table', 1),
(14, '2018_10_27_073121_create_orders_table', 1),
(15, '2018_10_27_091400_create_email_templates_table', 1),
(16, '2018_10_27_122626_create_items_table', 1),
(17, '2018_11_01_200535_create_logs_table', 1),
(18, '2018_11_04_070737_create_user_testimonial_table', 1),
(19, '2018_11_04_073657_create_gateway_listing_table', 1),
(20, '2018_11_04_074841_create_coupons_table', 1),
(21, '2018_11_23_091810_create_temp_video_links_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL,
  `user_id` longtext COLLATE utf8mb4_unicode_ci,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `read_status`, `created_at`, `updated_at`) VALUES
(1, '8,9,10', 'notification sent by admin', 1, '2018-11-26 04:30:36', NULL),
(2, '0', 'notification send to all users by admin', 1, '2018-11-26 04:32:00', NULL),
(3, '8,9,10', 'testing', 1, '2018-11-26 04:32:31', NULL),
(5, '0', 'this is test', 1, '2018-11-29 13:40:38', NULL),
(6, '0', 'Christmas Sale, Use Christ2018 Coupon Code', 1, '2018-12-03 17:13:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `plan_id` bigint(20) DEFAULT NULL,
  `payment_getway` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','canceled','complete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `plan_id`, `payment_getway`, `token`, `amount`, `transaction_id`, `status`, `read_status`, `coupon`, `note`, `created_at`, `updated_at`) VALUES
(6, 1, NULL, 'stripe', 'tok_1Da0pELVQrxKFpUaW1OVf87m', '200', 'txn_1Da0pILVQrxKFpUaoODcGcL6', 'complete', 0, NULL, NULL, '2018-11-24 13:05:36', '2018-11-26 08:58:20'),
(8, 1, NULL, 'stripe', 'tok_1Dag07LVQrxKFpUa8aLDdjui', '250', 'txn_1Dag0BLVQrxKFpUauSqSsXg8', 'complete', 0, 'GETTDI', NULL, '2018-11-26 09:03:35', '2018-11-26 13:38:59'),
(9, 1, NULL, 'stripe', 'tok_1DagBDLVQrxKFpUapEFFfynQ', '77', 'txn_1DagBHLVQrxKFpUaUQsqkwNA', 'complete', 0, 'GETTDI', NULL, '2018-11-26 09:15:03', '2018-11-26 09:15:30'),
(10, 16, NULL, 'stripe', 'tok_1DagTWLVQrxKFpUajjGow0pb', '250', 'txn_1DagTaLVQrxKFpUaRw8IU6KK', 'complete', 0, 'GETTDI', NULL, '2018-11-26 09:33:59', '2018-11-29 05:02:09'),
(15, 18, NULL, 'stripe', 'tok_1Dam2YLVQrxKFpUaLfVKlzxc', '200', 'txn_1Dam2cLVQrxKFpUaGFvPA3P3', 'complete', 0, NULL, NULL, '2018-11-26 15:30:30', '2018-11-27 11:08:30'),
(17, 21, NULL, 'stripe', 'tok_1DbYkWLVQrxKFpUaAzXBAvX7', '550', 'txn_1DbYkaLVQrxKFpUaycFFcsfh', 'complete', 0, NULL, NULL, '2018-11-28 19:31:08', '2018-11-29 05:01:32'),
(18, 22, NULL, 'paypal', 'Pbit_c4af1fe1c2837d525fc690d1cef8ea7e', '200', 'Pbit_c4af1fe1c2837d525fc690d1cef8ea7e', 'pending', 0, NULL, NULL, '2018-11-29 06:13:13', '2018-11-29 13:51:19'),
(20, 9, NULL, 'stripe', 'tok_1DbnxdLVQrxKFpUajfEoNqUg', '200', 'txn_1DbnxhLVQrxKFpUawPzMO8ce', 'complete', 0, NULL, NULL, '2018-11-29 11:45:42', '2018-11-29 12:57:21'),
(21, 58, NULL, 'stripe', 'tok_1DbpDVLVQrxKFpUay1XgmDcV', '190', 'txn_1DbpDaLVQrxKFpUayagDJuzr', 'complete', 0, NULL, NULL, '2018-11-29 13:06:10', '2018-11-29 13:06:37'),
(22, 58, NULL, 'stripe', 'tok_1DbpPLLVQrxKFpUaAtkVczHG', '495', 'txn_1DbpPPLVQrxKFpUa8NwIx5nP', 'complete', 0, NULL, NULL, '2018-11-29 13:18:23', '2018-11-29 14:43:57'),
(23, 58, NULL, 'paypal', 'Pbit_ef998ec0647248528ea3d36a362d1fd4', '200', 'Pbit_ef998ec0647248528ea3d36a362d1fd4', 'canceled', 0, NULL, NULL, '2018-11-29 13:51:44', '2018-11-29 13:56:40'),
(24, 59, NULL, 'paypal', 'Pbit_b7eedd99a4e9352cd9f1763431651769', '800', 'Pbit_b7eedd99a4e9352cd9f1763431651769', 'pending', 0, NULL, NULL, '2018-11-29 14:25:31', '2018-11-29 14:44:42'),
(25, 10, NULL, 'stripe', 'tok_1DbrypLVQrxKFpUa8fEX6baf', '200', 'txn_1DbrysLVQrxKFpUatNBOvNnn', 'complete', 0, NULL, 'Here is admin note.', '2018-11-29 16:03:11', '2018-12-03 12:20:26'),
(26, 10, NULL, 'stripe', 'tok_1Dbt0ULVQrxKFpUaUjAqJgPd', '750', 'txn_1Dbt0YLVQrxKFpUaOBtKoozO', 'complete', 1, 'GETTDI', NULL, '2018-11-29 17:09:01', '2018-12-05 08:14:54'),
(27, 60, NULL, 'stripe', 'tok_1Dbu3PLVQrxKFpUaKPJqRtJn', '200', 'txn_1Dbu3SLVQrxKFpUaY3NX8GZG', 'complete', 0, NULL, NULL, '2018-11-29 18:16:03', '2018-12-03 12:15:37'),
(28, 10, NULL, 'stripe', 'tok_1Dc9WFLVQrxKFpUazFfsNw1l', '750', 'txn_1Dc9WJLVQrxKFpUaiE8swFsf', 'complete', 0, NULL, NULL, '2018-11-30 10:46:51', '2018-12-03 12:15:37'),
(29, 10, NULL, 'stripe', 'tok_1Dc9kWLVQrxKFpUaWAAfCfoi', '200', 'txn_1Dc9kZLVQrxKFpUaMDq5hyQw', 'complete', 0, NULL, NULL, '2018-11-30 11:01:36', '2018-12-03 12:15:14'),
(30, 10, NULL, 'paypal', 'Pbit_09f35fb8d727e1ba02ff66d5143919c7', '200.99', 'Pbit_09f35fb8d727e1ba02ff66d5143919c7', 'complete', 0, NULL, NULL, '2018-11-30 11:03:30', '2018-12-03 12:17:34'),
(31, 61, NULL, 'stripe', 'tok_1DdHWSLVQrxKFpUa28b9q6L0', '200', 'txn_1DdHWWLVQrxKFpUapBh78uAU', 'complete', 0, NULL, NULL, '2018-12-03 13:31:44', '2018-12-03 17:46:47'),
(32, 61, NULL, 'stripe', 'tok_1DdHt0LVQrxKFpUaxGUQySeK', '750', 'txn_1DdHt4LVQrxKFpUaIk3ixVYy', 'complete', 1, NULL, NULL, '2018-12-03 13:55:03', '2018-12-05 08:11:36'),
(33, 63, NULL, 'stripe', 'tok_1DdcXWLVQrxKFpUap3SojfOZ', '200', 'txn_1DdcXZLVQrxKFpUaLGTwnbTR', 'complete', 0, NULL, NULL, '2018-12-04 11:58:14', '2018-12-05 04:44:37'),
(34, 63, NULL, 'stripe', 'tok_1DdcYtLVQrxKFpUa6iwh6Izq', '200', 'txn_1DdcYxLVQrxKFpUa1ZbRIX5G', 'complete', 1, NULL, NULL, '2018-12-04 11:59:39', '2018-12-05 08:05:05'),
(35, 63, NULL, 'stripe', 'tok_1DdcawLVQrxKFpUaRzyBf8oI', '200', 'txn_1Ddcb0LVQrxKFpUarZHuq6ua', 'complete', 0, NULL, NULL, '2018-12-04 12:01:46', '2018-12-05 05:57:34'),
(36, 63, NULL, 'stripe', 'tok_1DddSyLVQrxKFpUa9BHvleev', '200', 'txn_1DddT2LVQrxKFpUaR1aZmlg5', 'complete', 1, NULL, NULL, '2018-12-04 12:57:36', '2018-12-05 08:05:17'),
(37, 63, NULL, 'paypal', 'Pbit_38be1f47b6a848e509fa4a3c7204ce78', '200.99', 'Pbit_38be1f47b6a848e509fa4a3c7204ce78', 'complete', 0, NULL, NULL, '2018-12-04 13:01:06', '2018-12-05 05:57:34'),
(38, 63, NULL, 'stripe', 'tok_1DdeE3LVQrxKFpUajRZybprT', '200', 'txn_1DdeE7LVQrxKFpUa0cfNTHZU', 'complete', 1, NULL, NULL, '2018-12-04 13:46:15', '2018-12-05 08:06:39'),
(39, 63, NULL, 'stripe', 'tok_1DdeNxLVQrxKFpUarIr8wYbJ', '200', 'txn_1DdeO1LVQrxKFpUaqS10butU', 'complete', 0, NULL, NULL, '2018-12-04 13:56:29', '2018-12-05 05:57:34'),
(40, 63, NULL, 'stripe', 'tok_1DdeYQLVQrxKFpUaffuI8ltQ', '200', 'txn_1DdeYULVQrxKFpUazwrJVVei', 'complete', 1, NULL, NULL, '2018-12-04 14:07:18', '2018-12-05 08:06:00'),
(41, 63, NULL, 'stripe', 'tok_1DdeZTLVQrxKFpUakvbLthJj', '200', 'txn_1DdeZXLVQrxKFpUawKkya1Fq', 'complete', 0, NULL, NULL, '2018-12-04 14:08:23', '2018-12-05 05:57:34'),
(42, 64, NULL, 'stripe', 'tok_1DdebbLVQrxKFpUaVXsCctzD', '200', 'txn_1DdebfLVQrxKFpUa8p4tQ7QF', 'complete', 1, NULL, NULL, '2018-12-04 14:10:35', '2018-12-05 08:34:10'),
(43, 63, NULL, 'stripe', 'tok_1DdefGLVQrxKFpUagtSMhATj', '550', 'txn_1DdefKLVQrxKFpUa6xcCCZ74', 'complete', 1, NULL, NULL, '2018-12-04 14:14:22', '2018-12-05 08:06:17'),
(44, 65, NULL, 'stripe', 'tok_1DdehLLVQrxKFpUa9nPQjJhv', '200', 'txn_1DdehOLVQrxKFpUax1lFNo3t', 'complete', 0, NULL, NULL, '2018-12-04 14:16:31', '2018-12-05 05:57:34'),
(45, 66, NULL, 'stripe', 'tok_1DdejWLVQrxKFpUaHOO7tbz0', '200', 'txn_1DdejaLVQrxKFpUakGIPU6oi', 'complete', 1, NULL, NULL, '2018-12-04 14:18:47', '2018-12-05 08:14:46'),
(46, 66, NULL, 'stripe', 'tok_1DdenXLVQrxKFpUaxxW6qazS', '200', 'txn_1DdenbLVQrxKFpUaDJyiYTFl', 'complete', 1, NULL, NULL, '2018-12-04 14:22:55', '2018-12-05 08:04:46'),
(47, 63, NULL, 'stripe', 'tok_1DdewmLVQrxKFpUa7Y3BQZq8', '200', 'txn_1DdewqLVQrxKFpUaieQkLTBo', 'complete', 1, NULL, NULL, '2018-12-04 14:32:28', '2018-12-05 08:14:33'),
(48, 69, NULL, 'stripe', 'tok_1DduOyLVQrxKFpUa2EjaIxJ4', '200', 'txn_1DduP2LVQrxKFpUaH9ZXOlg9', 'complete', 1, NULL, NULL, '2018-12-05 07:02:38', '2018-12-05 08:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_getways`
--

CREATE TABLE IF NOT EXISTS `payment_getways` (
  `id` int(10) unsigned NOT NULL,
  `getway_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `is_sendbox` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `note` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_meta`
--

CREATE TABLE IF NOT EXISTS `payment_meta` (
  `id` int(10) unsigned NOT NULL,
  `payment_getway_id` bigint(20) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_video_links`
--

CREATE TABLE IF NOT EXISTS `temp_video_links` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_on` datetime DEFAULT NULL,
  `video_type` enum('course','chapter','topic') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_video_links`
--

INSERT INTO `temp_video_links` (`id`, `user_id`, `video_name`, `video_link`, `expired_on`, `video_type`) VALUES
(40, NULL, '1_osPxOeK7vPRmYfFYz49r.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/1_osPxOeK7vPRmYfFYz49r.mp4?Expires=1545904902&Signature=4VQXHj5q7cQb3gmzRRWPALAniQoR29mdohT7hA~zKSvX7NXnnkCfNG9VyXx0qIWFG~ZisbzJj12x7ksUIzkkqIIj561UH5T2c7pj5z6enxL5Z0EaJmQUUULdt1Q1HdWO-PaTcBugDWyIU6CsjMFDdRnLjWOy0cJ90qe5f6LZvXwQPn8DI5J5HdHpk0w9Fj077TjdkZJ61DG8OBK5ZGIi-7fFiHhzIftfQ3HN1IxYWBK9nDKwPlCdZ5rUZveM8J93AcTCX9HDqMWFqz-HFVQe9rhW2nJSTQbFcse1~YrRnp9jqbgtRDgC-DU0QMweab~zOR4s80Nd4Ibjq7oR-mfu5g__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(41, NULL, '2_0B6Qnd1e8gUWqKkQ8ZFq.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/2_0B6Qnd1e8gUWqKkQ8ZFq.mp4?Expires=1545904902&Signature=A7CldM5iUQqd5WFsuUsyqPVbJz2HmvpZW3TycZd3D2N4cz67rpLZFdNA9XZgc3EbXRx7MW2FhrUB15Bp9LoLBYV0X5ryjiu2rvsdoifcGBJDxFmdPL0T1faYMq~tCa4XLngyfxiVpCcL027ykNAnUrMdtOcKyldoA~nJRD1-NRg7H2UHWWsEw0gWnxeSOLNBscJH~VKe0qW8n7qmlHbc3dZcwOmjU4kLVmGBbip8A7EXApKGumQpDfNtL2EhOs-Z9nTL7~p8HHKIhF0Xbi24g0rUrlMxyfYDHDiVfCjhZZkEtaGW-bBeVXTreIwBOnhWuBosWrGrDThe9~~qLfeODA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(42, NULL, '3_Tx2dNiPGH2FPgl4xFk0b.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/3_Tx2dNiPGH2FPgl4xFk0b.mp4?Expires=1545904902&Signature=MPdmKTKsRnQwmPpsQb2i2oei~q-WmwK2nBC0Q8UtlXOXf5muMVBMP1-~pphoIRYT8hW2lDqrD2JNQsZoghphCDPMZBJZ92rdxwnNddzgikuoqLjuJKEjNBqHcO9eyXaMkm1JeNm64kMlLGlI~aN7qHy4az6lZ7~buJermlWuyzsPoiXNeBcmOiYcP4jZc6nCrwPg7xG41aElCrl9qN3ulkMBbgxv8XeT6fN7fbahIMlXVyYofVt7zvjbIRdF5zaGTt7N00Psc9Qn1sPGEzYLYgg3Yx9Dtq1nQ9YioHSBNgc0Q1kLlWIPlHVyNrkkxk57WjWeZKhSQln8~XjEuGt7ZQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(43, NULL, '1_eTVhOOv3UCIFj1x7v0kM.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/1_eTVhOOv3UCIFj1x7v0kM.mp4?Expires=1545906346&Signature=fOu7Ysya~Hyark-6WtIcXz5Av9pAHZClQOwFDjQMmxsvGC1lYXRRYwzeRb3z-7wTJH2NUUw75~WAWN-Vn6s~PfqDv9WNo~Be7CrDdnepJkd3EUZbjOSA3SxwGpE2NYINuDZJovyCbbmBYYS3ZkEzhXGzqQKig5M7UaBQpQ23S1ddOXL-WKbev72QwDQeOhzXM0~sWUaKqBXJIZEkJebs1epHWro2SKGxxXdUVTZjth29VD0MSE8JDMNjzhyuYRHNunaihLLKofPjILIql6ofHB6rjRFBopntimXtp0wlK~pOQZ-pZJuRi8J53bCtE7oLsjD1xiKP6GwPBg2ZE2m0wQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(45, NULL, '1_eIcr58kwmTw5wydLC7cP.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/1_eIcr58kwmTw5wydLC7cP.mp4?Expires=1545906618&Signature=ef0Gsyfks9r6WDSw6GuW-WePHOULGK7cCDGMFmUhZxKcH4ogW9sp1ma5kNsqQfws8XsstSedy-r1vOPJw6U4n0imQG-LWeqfW8UYwWCj86y8H~r8V6tX5Enf-p8b4uK8GyD~37dPaXcSiUI1thxeSn-PD3PRFbLJzC6u87NXcGTL6~TffsZ0YkSQ7ECVVDsgkHb61qbElCZtR~iwFR7ruFV5tD~VakD4qFe2zr9d0IK54HkcL0Zw40tF22AY4sWd-ax6VlzLb~mCwHE3bHkoZ9FXgt55r-gZozFWHaADH2Yd6rCPF7npo8IoZ3tl40BOYqsr6ellAk0D~cIn9XFxDQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(46, NULL, '2_mQv4aCMHfmEoMQGhhFzy.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/2_mQv4aCMHfmEoMQGhhFzy.mp4?Expires=1545907377&Signature=gaxmYX8c1YgFVGigLk6B59f1PEBszXD2NNlPNZDKpVV83gy5MRd8uET-pnqECFXXxXCQU-h8LjrEfMUifLqh~Cb6v7q4jmocQ9Xp2tgGWDIHGclgrvALceMuL5mQ6HocO4ds~WEyvDeHleQS-1KxWHFtC6TWdtCc-0ptEWXEEIQOp7lnlTflRfoExYjEp7rnqlsT7XpLSN4UGkeP7y9aDD4jdc4xaBdPFFQbotjTsTKxTnC-IZ0eUHPwxmezLm-MNSpFvabVYsQEB9WhMtauxz~nn6HHOjytGHI6MWSXheRcTqk911LgYBSPeMbYnWVBEIY7wAo5fUZHeYf7j~Ef5w__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(47, NULL, '3_P9sotHwj8mRn0iz9JwCm.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/3_P9sotHwj8mRn0iz9JwCm.mp4?Expires=1545907377&Signature=kyjZukPZOoWInp5-bawn-s~Q0~Nf5ONjrrUPnYjQ9qzW9L0HeocMBuw0UI9462GzCbyFwZn2wq341uLeo~weEcdehlW8Nk1xfGOh2AP~FzejwjlnR4jdS~EgSiHmVF7M~7qI5rS6aRFnHfCSUWK~ZAwj-fGOIwGeE3N0Zl1AYL2G6qMkgFydK5z2mIC1KpYoAFuwCu00xaRb5zl~k1rV3KsTu64g4yya806ljYVklJnMBDJjH2qvQl4jCWu58gwLAqZL4CKhrlwvKKMAjfWXJCOfzLd62a3MFAcG2RzynfwK4UDeSuBY30uBjfEWhQDY3excOemlN4NRR-VDEHSuDA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(48, NULL, '2_zCMFXcdO16yz1W5jAncz.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/2_zCMFXcdO16yz1W5jAncz.mp4?Expires=1545907443&Signature=H4HAzosV~ZNvh5Oh1mTGBmsa-kZNJ~S1wJSEGnjgtoGc7Pm3L803KNOd0FjuTLGUIRpv5vuukN34m8i8aKF4uOmwTnC~yvwzXM1jpdLwhmJ~0zZd6HaKG2wqlETh4JMdTxIbDcOmIcYHdgkJe3mHGe~Kl6~Fxto3RgoKlffji5MAMMeyPGxmkgYGNmbM724GO~W7zpA6TA1TPSxyLH2wa34PnxVQuVh87cjeLEdpp3jVAG3PJ31CPrJN0bkcVJI6UuafGsWhqEcjfPSAlahaIV-NagIXf~PmnQJmKw~J2107E2FerWORRhFendEhyaYCvL3LjyGAAWBX51GNCG2~pQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(49, NULL, '3_CSMcElpXos5svUDa1AFf.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/3_CSMcElpXos5svUDa1AFf.mp4?Expires=1545907443&Signature=rI2yMm4sNpyxN-vnvI2lY-q3nFt-4KvRL0erop5a36ZhNU-~gT-~cJY7xQBPOERwLGEzZJIAdpngScnQfl32CgjsXj~p5UHDJpa49DhVCb44khhEgVYpttx6qT8~CyWYSnTbceeBjOQ8m5Ue0F1oJNKF9qgh5wyD4NDR6OwXE4hHyBfDq9xKmK6lntxTrr6M2t6FNtj8EJ4pYQQbMq17nFwuxtozlRbb93g7CGS-64IxcXl152HJF1ZeLWRAvl3BiXQ-YBaj1SSegoVEmmMGd8oYEB9AcpJlSrqKTLaVqOCWRiuW3ouXR1ScsKkvW6AJeOwmyVT6ItLbA3p46lup4Q__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(50, NULL, '1_0idd2JQjupa13BaJXrfo.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/1_0idd2JQjupa13BaJXrfo.mp4?Expires=1545907687&Signature=wMmS8CO2ODoY3m3-SidkzVct-l7ky1JSf96-LKTNnyeDQFdu~C3FeGRHrsk-D-SV3AdAzFmE5VF6qhnjUJTOdRha9zxQySJENNWghZCqTEsQYMTAERgJvP3jp6QpU7cgqXJBXny4ptRD58Bq2k1p7IYmLoceECjxnoa2r~DhjQWVL4Jbuk-NCkmatKoZ2bgyZeO15qHxlKOgV-kRFzNTZzZRo~CaewdKLpz5nt7LAOrrgzulFIA725PAiCv7edZ16klfs-1obL-usYOzs3lYABk6pP1tJyyewzMniqAP4ejEIYGzB7NPlWOu2fSuscJvY06IiGZGfANxsiXsv9l94Q__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(51, NULL, '1_osPxOeK7vPRmYfFYz49r.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/1_osPxOeK7vPRmYfFYz49r.mp4?Expires=1545907687&Signature=06IBAoAtEUN-Vh6k2tPk0u34K452-TmvIRWfWB0DavnM27fmUoux9Nhjz8NsvJW6tUTsOFhbqYmilavgkNfsdU5tzoRji5gzxR71ToqkkebBqhfBkhxM-eHHTPA2UTNSZAQi5PvSi1OH7uwnIbIpezaraMICmW0xUpEe95M5E32mHTZ1-rBPz0wjoUdHqqEWgPHEqYZk17FDtSIIY2nGLlvu3~4VLmdYn-O8rqL6k2SfzLQb4W1bsT-XgVLxr4u~hHUZJYzaAJnn-U9ze5ZhTGw8E1O8BdfhpxDugIs0rEjNgWmbPh9A-FyomgJO~zH3sp8xGHFYOKD7JUJwwXcw8w__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(53, NULL, '2_QlfGWOfk5IGyh9nbnuQQ.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/2_QlfGWOfk5IGyh9nbnuQQ.mp4?Expires=1545907913&Signature=ylvaHMdXh2nyMw292XMshbLFP3vUxYfpFqv2Nf6GeAuwgMpLR7buztwbMDrWuEypGbpG29bQqNOQG9ktr45xcSgsZ7wpgP0M3qYalsVpCcXF87Q0cosIvrJ4XFO7eFoEHzJlMu8oMS14pBipErLp5C1rHibkuEuE3TxJNUAIoNvI1sBoSrUGDVcJyxdW3hk-NZDeL4Rp9RiOkDWhhhTSOiIe81h8dsGQs63v6hxEZOznIiUm0zlYfSO8i1fO4LIQVh5Z~OzSXKflEBjvDQh5JKk-2Wx5vrXSUm83qu39FQ~qDqW2L9Q4VTPVU8Fh3~1HifdZEsi5FWB4c-Ww91Iymw__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(54, NULL, '1_I44ak7Fwe0LFEvRismos.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/1_I44ak7Fwe0LFEvRismos.mp4?Expires=1545907973&Signature=u7FTAgT2BuwqRiq09RTIF~7M4J2CRXl1QA-xCJpwcmih1F8KrIDMk~FtpA4ZpD5IxX1J~ED0T2BPYyzrl0aV5O7NaOsjbJwrcpc9ciw~cOvshNafaRovTCYkcXvUdckrd16bB6h9jhBhRs~VYneooFZadBa7b16GlkvMj9g9bVvHpcdWHcyntxSMtrqUehzkV~mV~VVqVsZFQ-4lMP2Am-J5is2A2i5990M3kPThIaMJGLe1DBhrpGgE8U~gdOL5Bt-hVqOIwBv28NPs2aIgcsM67y6O0XloXkbdkYYpr3MjkuII7khlGeC43n33eF~AMoEEhOdfKnxBLDEK5opptA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(55, NULL, '1_Inf2G7655w9HCX11rw7G.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/1_Inf2G7655w9HCX11rw7G.mp4?Expires=1545907973&Signature=u3LNeNrpTxLgL2e078Cn618a3KtYzWDS8rl0D1cJYJmbUGoCtoDzOgHyna1AlcchIAad5gxbkhfDS9LZNyEOQ868D5kvhSDHtCCfhN6MCPJewzWxJ6sUVlBJX8~vueG5C~AhjLt9FGYDqnaEMedpfvB72JxctSNnsrhGJdsAlYMB9uatYJomfOv6~sp6wlJEmZd5lBHH9e45sBE-kEUYKyIV-HO9N9-J9NpP3MihdLG1h-GwlrvFvsVD~0~jARqTrjzYtJZPL7a5PYShj77Rg02LJ-mYrtGHy8XWBI6thId8F3kEznn4YZ6s7EdR9GlZ-z92qcJ5fboqnTkXKmcCsA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(56, NULL, '3_WDjeUOZyemUlcW6WRKQM.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/3_WDjeUOZyemUlcW6WRKQM.mp4?Expires=1545908221&Signature=2FKCWYdceAIrYjzx7E9g3-hyVkzxyYu-zCk7aOkQ4nn3cdvdoHAU0qjb55vRLMjXzwZrMaW8TB~ip63~NA-vn2wy1n6tVl-7uSJcDIEaXWJnnHuiUm6ZSVozB2vVpr5FvvAFU4RtSeAClxmmvA4kdXE6QPMf9IWD5W-CgaB636Mtuv7fuNBxMAlodgd4l3aE6ekgU0yEckY3fX9UeZ8r2aTvyTwT1C0cQXa-iTu54AsQpzbvoHlBrAMcB9MUqZHmC~ZIdI4PBLEK02S4HPG905VfxXifeON~bLT085nOQSJBq~noxBu8ufl5iHTz1wVDOjFBTr4ch7zc1ERhGfL5oQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(57, NULL, '4_qOmGnmGVRMmpSaRsM5my.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/4_qOmGnmGVRMmpSaRsM5my.mp4?Expires=1545908463&Signature=5Og0703nfMBXZlJ02beU8guiQjSOdNUCGoEEQNDTaQ6TF5RaZTrRlhtcz-e-Cv3arEpGsAzHRFyjpLcWzFt2X1QrAsgBI4YvAnFrehkvAgfZK7vom9FI0JWzGVAi3xBlZ9Wsk4l1mOkpmSMaKrAKyrzRPhwJG2Hs6kzGgQe6JzlxntZcW7T-n2viDogNLzwKy3Ch39YVa9HYX1wuUlrUXVo8TDmbLGBChLbDe-Jqm0EZcl6PoTu6vJmCPfztowia-ihRiBUASVus4flOXHvVuB7Kwf-mQDib5BWle435UkltkMgafiUa8YwqZrLcpGcr4-pFAf6jVLeeZRuSwoaHHg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(58, NULL, '4_oLi4PXuQE4hLXa8xtoCE.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/4_oLi4PXuQE4hLXa8xtoCE.mp4?Expires=1545908463&Signature=I~Vo5Of-qs0EP3z8VHQA4CJtpJek9yMGCpPbVMMqkcj8spanYpshhlbVvRajOh4866pmfHLgbrTFYIhYcFzigUAyZ-ZnGmJOoTqADuPsFw0mXAXwE-0s5oCYrUfQ5uLZQVy0Tklf2jnvYmpFFkEBdM9NFxv4PcogA2bZFWSk0~8Ju5Lo-25TvVX5BOQVoymhyHeLB5eFKOCnlD5xuJ3E6vPLvwXkRdep24Ns8VAXDczhhbdvNwSKZ8~vFep7NNgGCvMXN6x2OYuL5uW9rdfBl4qiu-TfWws1dpBUX1krjavZ8ROBCMl8ti4-R09SfEOMXnYtDYfWDIi1x5NCnX8o~Q__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(60, NULL, '1_6tFzGahvCwCK2CMeZ7Nc.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/1_6tFzGahvCwCK2CMeZ7Nc.mp4?Expires=1545909285&Signature=BE4Wa29W6DwTdyx~Kt9QfVPrMP6ddlXro76pfJdxsndiU9~UTA4NeaWROL-ghy-jIVUKvLvdYR5~~VrURBBWMGbVIVWY9tUCLZrIMaFrTKk7jJevbrLSbhHlLpYTEqh8VVo5aStO8YUQ7qjUhfIA53j5xapwDtEMSKRwxzlNOCoAgdHKS4o4CGHWbWlvaJsYn093226wj0Z95MPVezWNqhkN7vIfjdOA~H-r~9lfMsZaAHAUZprBq6mLzzVhgXihwheuEFSIOVcFBO1FB0ywyN3FixX5Ftxje8T1WFx4hnnlVZ1PLhjEv5M1dyBNVD2NQbKTuE4IMjfm6q3V9bZPlg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(61, NULL, '1_XduWFhxoAw7q3tA9ntfq.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/1_XduWFhxoAw7q3tA9ntfq.mp4?Expires=1545909904&Signature=a3wT8J4ARMJOf0LyLF-n~vqn2tTR3L12C91zGsFoty0ot~wFW9lGwI2G0WaSpLTu8IdHtP8iatkQOVXWywtaIXHxvLmVbWfrt7rKgqLNjbIS~Z5H50~~NOy4pc5Ihgznh01OBXZBBp3O-EhkLQqJFpqit0fmvWkjKzT5-JYEuU~kexiYZi4mpqn3VomLdPsCISHcQT28UcpaWwDKDVdeEOKPWZ4PxOMV14Nfi16oABgWPza3kLiqOAU~F7fYTdFI7daIEnWypMZlH~BhZZx9RKBkvTwcSdV3vRXTNn8nnBl6IEcgSw4c2HHuLkYdSFNI45rVlRvcwWC9xXaxpnSmeg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(62, NULL, '1_pS9CucBEMQmrUkSuug2E.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/1_pS9CucBEMQmrUkSuug2E.mp4?Expires=1545909904&Signature=aCUWDO12~zy~Z74adxEcf~okLyLgDdsCAoo0r9Gu~xNMNYGq4tOj2v8sUtQSjyUgdS6AvTwdZlHQUlYaMVAAGKYSdIYSIwqKzE3dHJSJfcXgPj80rXYSUmri-~giir9-IBgFN5uD9BcduFx9qEBn7d08idAjK9Il8Sfbrt881uONJMPX2a-1F~r5g9POss813k9hp6LoivBJt1GvdO3sMFGAeOKCraHqIa9FRSp6heyVqEG2PEYRpoXbXutdkx4CPQRTWmdlR8zBz4T8HI5t2EHqERINxh-cdL1XS5vfXHxogefVVlkVF~o8bQ-VtHCkM7a0GAzpb0FIf1j8MUZZpQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(63, NULL, '2_eYONbH2xJbzyZW8ar6ha.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/2_eYONbH2xJbzyZW8ar6ha.mp4?Expires=1545910037&Signature=fgOPDnGS8vLAX6klKAL2ZwAyObQUSA9gLksJhvytcaPFyGnNBahbH6ab~z9N3ZgIE4hu-KP9KPIxY-l~Z1gIaqjkj7kktKJ7PIAaLRMVdMWzQKhY-3rjYsEAV9Lu8kUfXa-0HJXPbCx8J1zzyYKTmg9CG3WjTC5pYuFBusZ5BVI~ASZfQ2Xgo9aT9dP8Csgav0OlAD5Eb8uqOJA5HtVAZxMnwJvSXTQy9MaC2mbMtM61MQ2japS3sgVGopqVzOGmmPDdfHe0teUroYZYSKb1ZwNT~cwmxHORO7e9PPlSMPUXR5L-8Um8WPA0tjXLvtoo8M5uZa0dHFu8Dvdqt82c4A__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(64, NULL, '5_oVbb2X6YSHvyBNKuc8yR.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/5_oVbb2X6YSHvyBNKuc8yR.mp4?Expires=1545910494&Signature=sc2WPQrey4AZRV39Qbf0PzgFMTYd58xV5IE3f9NQg5UgwRGVQVtZx0~8Bv4KjiSFcqbvI38m~Y4LNVDgwDQe6mzlD~FcPOw2L-BR-Uv~RKSEuS7TjggvBYEk0qeB5shulBPDUGSdTPduVfeDlWRUacWvJwda7p8kF6zhOGaZqIRPStVG1FicUBkbzBz~zfVqrGHoztE8YFBx2wgWnlxi89ypfFblWnHUmo2riZNWQmTABcVwOkUbyHB1TbR5GGqW~BjNFF-driHsRfgJd4BN7PiWwjrlUIYQxBJvUQwzsvuAPPxP6LLfrIv5jTvsZAz0nXxnvMNFL1~1XnvwBfHAFA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(66, NULL, '3_7nYw2H9YkL6JWdEiTgWk.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/3_7nYw2H9YkL6JWdEiTgWk.mp4?Expires=1545910727&Signature=XB5BtI~ZFkJb7JualsyJZjDty6wMKdIAQd7tjzgRL0n9p0GE2Dtui5UUioJHW7o2cigpLQr4cARVgUUJho16Wz9WkoGBxRntq0oWk1--9rt6ckp363eW0VmtEQxU7x3hloXcvJp77ehMdWPNEiKZaKVhUJ~zU0rSiK7pCgFfakCO48h9fzGSMin~qBV5vqsL5Ej4-~eDezQP61u0hR5SVjKYMJIky~ZRbkSWhCFLVlywLBUTjGOp9ygo6QszbAFtzF4jKiK4IQN-F9BI0RUh2FDJy7W75b8fXQHyOfwqvVSMyT17jozC9fhhPMWMaaEblBHtCMdiqbbyQbEVLOSCfg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(67, NULL, '3_P9sotHwj8mRn0iz9JwCm.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/3_P9sotHwj8mRn0iz9JwCm.mp4?Expires=1545910727&Signature=aWu-2ZfWCZuW6ApLIqpHNn7VmHQPh-5Rx~HPJXlBBBoMI4QmpAyqIgf1~zXMbg3tq8otG6NKvBxSAQ~XUNEC~Q6wDnmcIAyXsieQkv8mviUbICforVM02on1J7rIJOmKe3Yp-XUmKHkQsbId6R~dL0hJwX-lk00xjQjfVJvYHFWsMRxvHIuKgRr4M6mReJUMnStN9l4CQipNbBHb0M6AayAkuitJEXOiepLeQbZZFbzFCiooIu738BXvieYo4GeUyAi0MIu8THXbVE3eFT46ysmkI92GxAiOfEo1LD1zLDj0EXdkh48aEJbopt1mlLoFrH4SOk5arTF6ojDxwfRwYA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(69, NULL, '2_favlQEVo6AIjaDnikzoT.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/2_favlQEVo6AIjaDnikzoT.mp4?Expires=1545910829&Signature=Mze0xzUX4txsYcV5be~95PqwjawLOD~1uQ1LprtLwL07A89qnjANlCvBGiXQhfcSuVji1AoBUOSPPTNMk36fjOIOcH~oVx2vroLnI1TWVfChZmy9G2kN-7VOmg13dXVwrXZI4upapFXPTDxlwTHsNKZSz1FTzaqGb6QOwohNP01Gi~F0u6kC~bajWgRgkabHcIG80dVm2Q4oEyLJYNwOedWYyfUh7D6f34kGlmRJsTA6zGArrtbT7aJ8sTkOxTMlO0prepPq5Tuf690NoLaqJy9emHrUr6WqFFvmoagOToyX0bVq6bjGLu5A05nZR6VNSqD3sf9Pl6D8EvcclGq7jQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(70, NULL, '2_mQv4aCMHfmEoMQGhhFzy.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/2_mQv4aCMHfmEoMQGhhFzy.mp4?Expires=1545910829&Signature=qsp8EXLK-k1T8suxSRhUCAiLsfBAdyFNVTmOTs~G-VzuBvvFbY-q-kWppfMujBMe840TBQeM6rbp9v~XU-3v7CmlVB3mbioQM3xBIigExh7Ip8N~cd2z-~A~slF~PthCT6zL~J3qFM2jlEnh1At0pngS~ymRIsj5PJvD1EwZIdHklrmnqAa~Ww3CQCpP-c2-bYjrU1OdZO52NoAnIJpyC30oi~u214PJtCPKdT8TlRi-R2Lh7hmwAJVmd0XAOAyh4D-QO3OH3qKs4gYiqpdP95c-Sk1IZlp94P8s3Ph6MDkh0aNW0YKKpe9dEtphN-mPqmVmhu9Q-u7O1PTy1LIarA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(71, NULL, '5_1ZzTqsP8TUAkRsIMdO2n.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/5_1ZzTqsP8TUAkRsIMdO2n.mp4?Expires=1545911091&Signature=q3EKa0xxWVbYYFjajoG8SaotOK19MInF3yWYEfhoX1fmiqhz-qKWYMHvFQaSoLxp7Zb9Yiu83TyKq7fLxZ6lsLYg1-sKhEAz7vq~Ox~MsKI1rs~bKljB0n4Aj1ovX2Yb9TqvF-0vYpKznuNneKDWX4DwrEm8-3CPCJNGv~HRX61rO-ZmaqXPwIXq3gKlTcXke~3Qm1DHdOrplpvKyVNhJfVvgAAZwI5fjuDw-Rurdac3ZnVPJu96g6r5TC6eYy~KToqq21Wej7jDlBj9H-2XTC19gnMZ88Y92882nlxGmalHXja7EKCPUZQUhX9vkucgoO8iOqg9OD2danHskKDwCg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(72, NULL, '6_cEo5JrZ4LmsFQ8cA7tMj.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/6_cEo5JrZ4LmsFQ8cA7tMj.mp4?Expires=1545912540&Signature=Sb1AyeJYnz00Wbg9BszNDxRF7Hbg7xeTrffrPDfmRPwXccE9Zz8a0dzcCoEWTuRLfVyU1iUKZmelsuBPs5JTRtwaO~p~Mg6Fx3t6TACMFq1KguTm7-mNFpgsxpCwX68Z~meoZOw1LU00-t6h1Te-em9Grcsti5GzI9yeZTZhPzeVlE8ASB6AEXs6pE0VPWPP~wKLYp-XwAXBa-dIlW1oif-DF9Kqvbd3eRIipngsMefXDz2xvEsFfgOm-IB6K-3JK99N5exxLE65b18e~zxjJb8eBLpLayKcDt9~XGvJpnxpBKZ6rzU6PVtKG~FVIce0FESliPI9xSK7HYeHdReUCw__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(74, NULL, '6_QuuNZvT9yooGvGDWdcSt.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/6_QuuNZvT9yooGvGDWdcSt.mp4?Expires=1545912765&Signature=ghC8Ov124JoBJ0Zt4EbqikYMVuJkEx6XquU5~k9YxGj01fpZfb16ZtYNosLyM~R10Uw-t2UthEwXCYFGt0iDpHKG-dV4ehp6LVqILJeXvBtFxNIkQHHe0FI89OYEZGeyE~aA6naEnvKSl-sGNkwWWoZKP9HkboHxexrceenKdfTh~WlEvM4DT~BsKyPxKz8Ay6KEp~WaUUIv4zUMgoh~du75mexgf3wut1IC2JeoJlIcG-Q-wakkW7hFI8QMSFYSBIMUXuC3nhcliYMlJFFMixzPSYrYIyw2rXjNDsGF0tVrjkkJSRXlbcFcSgHHVF8yBeTHJXnG0ejirQil2CLEeQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(75, NULL, '6_ef18rxnddwonUTZazb4n.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/6_ef18rxnddwonUTZazb4n.mp4?Expires=1545912891&Signature=f8Zwcsq6b3DWq5Twc6EQ4aCR33UL4AgU6ZtDYLl-0Zf0BZVrFulqfswEjdIEV2N3jgATGXv8U2zLRnsXXz3if-JVMSd6Mm2BeOOef83yIkH91hpkFgNh~cBpSaJjzz7cR~3nVt5ge4H0P01x1y3-nxr~4uunOGm1InrkZk~ocKoCGn1tSms5HMTDBmbwne2ds0QJdSEJEY1FJcmqgPyOQdiHdHHMZVFLidx-qI1n5B8QyXyc2gtmrzxUoMQLUU1SXun2mAD8fteMJ0ok1txEewq88GLZcwDJfs4-LsCQo~PfEAWKRgu02qOL3NRrl5DGV-t4IqB9eZ-06miFaOSLgw__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(79, NULL, '7_urDw3PO3TXs8MOhlDpfV.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/7_urDw3PO3TXs8MOhlDpfV.mp4?Expires=1545917449&Signature=IwTlkdDWtP9t1WQlh8VYeekJYaSnJTiTHwxt6Y9N36dmXibbDnv1khCl7ZtVIjBTCafi~qyOlnIsZTtX3s5ASDl13Ecg2TenMJof0SoqRPQdglOKhvER8T1pYnx6vAqUJVZehqrRMBBnTGiek90dXW3IKpT8fFkEOYLEulq65CKJEfTUQXM7WjzqsbYmO4IlrM0wkSLkf1sBJNEhzsb72fkaBF2PjLi~mc-hEvXawv-EtYr8iAMNIm0o7IO1uYKbxxyQLuh~60X21grq-Tl0-4N6JYtI5nmZxPHGrwR54GSG0vEcEXOjm5HCxPxGEOA7R~JuCi~D1QDplXVojvW0Qw__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(81, NULL, '8_3kX90XHO8u1FfICakBeZ.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/8_3kX90XHO8u1FfICakBeZ.mp4?Expires=1545918673&Signature=H4LHe5oLyNgdNn51Rt4K8~1jNmJFKjXnBkeieA0Mcl4U-CPz0Fp1H7GrPZHeOm1Dc8erG3aAbD-u3O~BqA4e2sUDlptgUPUjmIVaUxtkjQj6VRyWVPlR3GK8kxcftOxKXjKgm0UUz3lJTZD6VkJS1r4dK88bkuR2DNfRT1ZvRc1-jjnjOxzLSM5-AhYkkJbUzd6lOAtlTlITzX67-ThfwwgR8mScrSOLf4r5GOZxJPuJ3sDWRR9zdrI-9GuvD5asihcCW7062tnx2iP1r3bSStoYEVGrqDK-HtUGH~HK6fQSPOM6ZtUEjuWciB3sX1fpJ9GRS90zayeWCacT1nD2aw__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(82, NULL, '8_zv5LvH9YUGYqxRoQiCxh.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/8_zv5LvH9YUGYqxRoQiCxh.mp4?Expires=1545918673&Signature=OcpzugnXXz8YtT67jCSQUIVB1wGY0yp0fEf1MuldWYZCCW4ES2ZpIMjnaqk5NBIA8waKStAca9ewSsFKnAZ7KlM7gKfqOeQBBBYOjbJbGQJZDSE-o6a3pNjM14Inih0XMnEOiszkKw7ufAy2U8IPT9fZY3ErRcZw84MoDgw4PYR10ug9ToMWGOA5TaKn5Bgk49F3fUJv32ULSnuOKv9~v5w0mfpoW17~Df~LqylNtP2gMhWwD8~g1Nyd5SBDAbBi5BgpXFAeg7TIh9yV6-pv3PaLZQGPcGXNAwBU8caZd8mJ2MrFsSfz37fLSRe5KfOBPK3P4ELKgwb63n5P8x6irg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(84, NULL, '2_favlQEVo6AIjaDnikzoT.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/2_favlQEVo6AIjaDnikzoT.mp4?Expires=1545919304&Signature=5I~Lzmt3cw5xrRLWUdaPYLNcl8ZHBatHYk5v8bO4NQsX~yRLCporbk70v4HuXH78rZYk5PeJf-aZZlgE5yQVtfKrvuFP7kRNE~3VFr6iEitqUNBxuMeodUr7cr6F6QqJFgikKkej9LaGRlA~wHtS5Ot8tt-iAJwiR~1elHvWCChPilhrERRwgTYacbU4TWaWIe8o0sQc0qh4ZnOtKiyrhruOtWNTvurknnVGz9piLhYbj4-mkEMUlkY7Zulp6zrNwS3xplKJ5HmO0ngsehbsbFU0EDH6OiEYj3jD~vZZSCXiTC4V7sU0X69Ym5TbAv9Eh8teugZXCSwj~3g4WuUzcQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(85, NULL, '2_mQv4aCMHfmEoMQGhhFzy.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/2_mQv4aCMHfmEoMQGhhFzy.mp4?Expires=1545919304&Signature=aMIxn8N2eHMYCuMpmlfhkMDylQiNALq2zvZ3ke1UN2BMdiIwWemMsez6iWnTbhnbmiHRgzAbHAgvwFbKJc4tynwborKwMPqMLtXQPcvO1GbLBScHgofM7aFLO1A2MQViMLLj~Ak19KBwlUTA~VzmHWjBrAkJ2WQ6gND~jLAdLv5F6Haaj~XNGKI1rP6XkXmy8MxKvJ5U-vJNzBp~55Bn~mYa1SFWsxa2nEUZzdbocF1KjccLyhuBqAaA-p4CLEN1h49M3kiCilYT0~wUhKhMMb8QvpXicQJ30pBEANdVtkxEvN9pUrhRyHOY4kzjZW0x6nESDGLrodWyh4vFonBTyg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(86, NULL, '2_sF5pDmPHuxGoQH4stRlp.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/2_sF5pDmPHuxGoQH4stRlp.mp4?Expires=1545919886&Signature=F8zuLT2WTEx6gqugFmm930zWuUEdPHUGXaXkGliUVeSZgu8f-HvVzt6tDvFMkkxE4DJD7RuEg8ZHMez0-0c5r4LLL9hiO8w0ngQ74zXFsj9x-zMooYghx6dYUh~TkqA9rLB4aT4f6jmanNk4GHKCDLmhtxHkOLpd41qT9R~zQ9xPtGn0TT0lWDpGynB5LEjG8EfZiG0S18EuOOaKijZf4JVRSmj2ws2l1QwrcvBKG5wmtWDzJtP7LbR-NxolCPxn75mnOJPgNsnby8K2fW9pC1TqxgatQ-CKGPH9VWBIm52pcYhzn1Cj0GX-EmQFdIdcEUim73MqJMEtPzFsBSiK6A__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(87, NULL, '2_YocRVv4TScxLllOqL94f.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/2_YocRVv4TScxLllOqL94f.mp4?Expires=1545919921&Signature=nXOKoVQUeB4ub4ymEtnZob4KiPiXqLwsBAewa54DPABxTHMo3iXtjtHkzXIxsI3I~jXuSPi8PqurRxFnG-RLWk3WSnx55l7Vd51CCSKsoueSjeYKq3r8F~jZMcLemeRUFT9K9RK9P7~JPFS8W7HdE-O1rdkLdP93PBdp7HBCs2ndriSkr8Y4eE4Ia~zYqUuJfkOp-3qTNxKszlFOZ-0G7wJO2QYnU9RT3zPPGQ8U1nxmUgrMcmPmnuStQGZhthnjuMbKM06pBP62eTrZTwuEgEZUTR93eUeYuNdXPsfu9WIEqKhvWyFZoD9kjDmcACGilGMy~AMz7-Lc84A1HofgkA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(88, NULL, '2_sF5pDmPHuxGoQH4stRlp.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/2_sF5pDmPHuxGoQH4stRlp.mp4?Expires=1545919932&Signature=olcpFfhSWGlDJJD504~BgF7XxdSF3wYr4yN~xN2cCkqy9K8K5JqueTOaSJhW~LnLMD2WOWY5Hi0nGAsQkiuNfovKaZ6OObMDuR7EiVFyBC1SE5yAsRcm63dnuKYNlNN7dgZOBxQOol5NQJmD-5v5d8ZwKqxEDGpSEItmwXri30OLN5vrbZ7d-kXAUxmjzB10p9SDqYz2VCIFEEbd4GKXbl3d5U9qTlmMFX2Nf~7oPByLKM95PzUjE3Rlu5lge4weRNBKMNEaE8d4AILwfXPftfoEoDE8fl7g6FQo9qh0q~EfR89VLthPII1sHqz-NJaofTbsR9uc60J6RZgsuYMhTg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(90, NULL, '3_7nYw2H9YkL6JWdEiTgWk.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/3_7nYw2H9YkL6JWdEiTgWk.mp4?Expires=1545919946&Signature=WwebIeJK1qLKJXR7h8e1byg9jFRsPITn-REkwtPl1lxNmNTEpr3f7KlDouGQbz3H1QopQDDGvCbkXCp67GFLTZZmEcRqHhk1PwLnrCCEm6x02erH2LSUCUYyX6Frfwfm3fDublLjcRVUZ97IZOpebqQAiEAbzgdmJn66-98X9iTLC5DkfNgu25eF94ttHSzBYUCd6nh-N44lm3KXvM9Jlh36gxkRf9jjIZqsrOZaKe8gkVRkHpWB1vHzkATgkSQbpetUmQ-As3WGDd0n8Zn6uriOMISGi~PzKgmjqIFJnMMsYi4lQqOfJHme21B99K8ssrmRNiHUCwFRI6ahXkIC-g__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(91, NULL, '3_P9sotHwj8mRn0iz9JwCm.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/3_P9sotHwj8mRn0iz9JwCm.mp4?Expires=1545919946&Signature=KOUz-sZKEGzr-k-0HC~t7~PC~wOnWVYbCfVU8c18zaqdsSjCDq3c8BQ6ITClbS1NSsvcpGDsnE66FAp6zDr5eznnfxageUIXOmRCNHF1BhiG31JadhVC~Cgos6NR7eg6eN9qV7jf4m8Dt6PTOxL~47MFOHj-6-dmTtmKALjVFkcWlz2H0QSEyCt8POyC7mUw91-gmdlUgdCY5RiH~Sq7UYCR96pIDdFgGWh-TagTMqs1xP6371tfUn66rDfv2oXVQ0VyVo6LTPjSpoMlpudWtmGFAQn3zktsPWUsf8TyFaKWyHpLe4cmP9oiIw~YYRg7yu8Hp4iLT9mVbpVGZdU0Zg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(92, NULL, '3_oMpxx3TeEdT76PrWKvYM.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/3_oMpxx3TeEdT76PrWKvYM.mp4?Expires=1545919975&Signature=v3YVOA0Rd1QBXPjoxL8-4ttpLFMNLgtjKM2io-83ShfII-gTpyGG1BzkZHfe90~r3SZUjXAadIcqJbqAe4PXLBwQ3uKXlZhjXm2HLovk8MoPPVjdHnYQVtT8JD~RK2EEBUbgvOjErrMdHAaw-4q~DplgvHxW0kdQ49VAAaT41kpalIOrjRD8TPCPwiivPdOuqre8sX3~Brlu2jec-woU7JBcD8sjyDW9RfxjnDd8vaq80Hsb1Z9mRQsMmDnE2h9A8ogLFHM1rWIVSEjSaLVRHx6coanNKNa5dRWfgy0ImHrOzrqzKtUCQrfzi0WNrToWGY3s5g5C-ZUYwF3tGNlQNA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(93, NULL, '3_pQ0zsW0EcHedxsLLoqQR.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/3_pQ0zsW0EcHedxsLLoqQR.mp4?Expires=1545920030&Signature=UyPCLQoMcNlp3ZiyHQal3EHNMI8gkRmEtMS8TCo2B1UGZKBuoR1F34cpdtxm4ZIEXUmrYHEsirLW-YegwOF9d3m1AGoHaeQwlVkRGZF3J0NtLcH4M2cQcr0qVMPv3wcglRuOwRSXXAvrFAcWPSJXc4247ppfbtb8MuLAUB~PvEgFwlsQHkldBZr3ELIn4cVhTh0dygvyAC87pexpQrKKVNqq3R56ZsH~59f1nZS6yBEqqedufujx0VFS0u5iYX4jKj4gV-5h2IIl6VtCFsG3vxlJ~wlA9yEfaUeZQHrJKFBTsL3e2kSysFyWpSuvXNYVJuxqykcx5O-NJbDfPqobww__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(95, NULL, '2_1cDVM1h8BDB5Vnrr8w83.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/2_1cDVM1h8BDB5Vnrr8w83.mp4?Expires=1545920207&Signature=kdf4q3~imdGWSL8hfOpIyhSUzsjmVSFzzMPD4lI5altI1S7yd-kmVwWjAZ7m8RYmXOBhpGQLe5eya6VwamKLePb6e22CkdD7vq-GH1R3jwLfvTmjcHxxjXtuPvipnYWcnkmXudo5XbgW2gnf1cmxzGSGQrvqymfIXJ3SphgSbNXtGD7SFIsg3sbD~qg7a7RAxhRB46yufB5RzD6BGH39Zp~xpGMlCypH9I6eWRtB9yHyg9pm60XppF28SaEMi5iZ0-O1vylZK0YREakPs5s2UO9svSD4TpTFeu37LStPuWWCXk4FnLkoWxMPfPYgcG7rSjvhpV9LJnnfaO-zd5OOlw__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(96, NULL, '3_pQ0zsW0EcHedxsLLoqQR.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/3_pQ0zsW0EcHedxsLLoqQR.mp4?Expires=1545920231&Signature=CYlAu6Xllkmuax-5BYnI6IrvUGxiwkSUQPtJVo0GBKI3Gr6H6Pv4JNJ~MFVq9q0-L3FHYlZBmPLKRydohRba~4wn-CztkXPy30cZW7gi-6edwX0HeHh9wSWSk-7nhCnxzqt~WnA6clcy-zax1CrNFACq-mk5yY-T5i9ce~lorBWANov9SYGuTBsHAx85BZnismyyDXTKQpXN1f4WSTkwFZ17Q0psIpH-RFbb1FByHh8JlGOoyVua~goQg8rKAq9QA2cU4FZaYggdQnSgpV667pfgeuZl4hPDw4zc7kupbYZTQFViQqLEZTpQH4mnH7OfPX5WGlCx5SSzID4q42HVMg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(97, NULL, '2_yFCOV7isER3U53NOUGdR.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/2_yFCOV7isER3U53NOUGdR.mp4?Expires=1545920342&Signature=kJtDp6qxDkP3Ro4Ya--wWg0L0Ei3qbihwlDVEjly5iuRxxOb1KFS~dB3DKqSfXuMeeEHnt8Xbj7luw28iYQ~qRpgacOarKBJl5GXFkyH8dUEF1QmHPeGOWNfntBwqhq5Ny8ohN7o4EhggnaLCKSj27wWCiLzFbMoRCKZ0sTwlB9xdmLa97h1JKq5Zzgotol1PjEZ6OUYrqklbh63~T7HpFM5ER5OKPUdTtvq9l2d3~3RwSs8G~IiKKtVFCVj329gI6ox3HDvDP-g2pmfIa0E9T1wDiXQb7EMlOiShU4ifNX~GF5ei6dkcUvKqLd7DWMhWekoQodT8q8Ay8jHG7tYpA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(98, NULL, '1_hCAZmJHJVYWwVXsiz2Z9.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/course/1_hCAZmJHJVYWwVXsiz2Z9.mp4?Expires=1545920349&Signature=tsqdTW9UCIMSLd2TIQjAzE1CB3bWmVcV3LquO~HbCwyzevh1cbNNDFUskjTJcuvVgxswVIMPlVdym3KoM6qeizSCLgMdS-9DVibDHRmPjT0tPDjeeZH9hj6i5zcsYZDrIy7KvvpdwlTrFEiISsdFr7QLOi434iJ9gYzuTVl5dWKbS~gXcSACMUL5hI1dmM0HHIU-f4RQc0H6rEIo4rZtaBXSdMJgSthcmhl4JpT5jZrbWmznMIZFTupF1VrmLb-lc45qwVA0vIQqlqJ8rUoObYQ2mhQXZXSdSaXBaSlq45xkbNRCkHt~cZYGXZIhB9~o2Prget~ZiWtub~r1KMvoGA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'course'),
(100, NULL, '3_IZnDnghfy5R9T8hIUKol.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/3_IZnDnghfy5R9T8hIUKol.mp4?Expires=1545920916&Signature=BkbcJyES0Q-LeNYv~7~~ftMRqpSk4g-a4o-YOGbOzihsp0gEnY1xI33eHlLC55XfoPXCrrUjRzDXo8GMgK9O2tPdbkSnTJVF2IE6j1bRgwM5RMFzOSuRjwFGsspamkOGbQ7ciI4Np6oA~ykV1UCepGwBa1opTurmRSyWctdwCErqjsVK8IUZiP584MNYYClcVVTlzhEHRX~KTqBJ4zzzMUTV0YWaol3LeClCCzViiH2Uu0mmKCwT1r0aGUMV4IgMDYz672wPoicJLkGMCDDqni-9MMc1pX2xOl-bjataT9-2Yv5ZA~wF8AnFYp2nQEarBBDBXL88Fz02OExUrMvMKw__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(101, NULL, '3_e92n8y1WozGUbsWRz9Rd.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/3_e92n8y1WozGUbsWRz9Rd.mp4?Expires=1545920916&Signature=uC73KOCt6vJMOB7iov3a6esmO5SM0qAVQG3mEr4~wBKRs10zko0V3hTi~25r9ltzYNavyqKb9XhxHVo8BQe2tEeQ9vWi5f~k5OD3YWGSUtkBg4bcVsj1wSntO20NcCrXfgHn7BzfvOmsZIh1HETThdrBvKZMkY37csErceKhkb9ME-Iz3qSf-mM1peGaxbffOqqpdcJ0QiUVb-84SbGsZRznkVyO5LDYPaiB8HWvyM8xOD1rg-axZzh3XMwIgzbo8bnQKCHF310rRUjQ-hQi41W8gTLrx9f5ed0pfyCA-gZFWGZVeyOuIo56i5YQ3ZTTWPnT~9TNHMB1faQ2kmzGiQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(102, NULL, '2_yGvZLQV9U1W6WxLC4Znq.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/2_yGvZLQV9U1W6WxLC4Znq.mp4?Expires=1545921239&Signature=y6Ji02QOkQDR~GaqLFFFxob9Cgv2H5tCzXywmMVJ~7TelxyxUcPCtP9k9s7eZkj3AnuHp~IUlz9GgqsKjyxnyFumfHOI1f77I9ZdDwazV3XpMRPMeHXLlysPbMV8NH-gM7NQxqLAqk0y7ROO7d7iNN1sG5VZvZrTeAkHe6Uw4RHeygzJ1p8s7t2KkVREfZJL5UcEILxTD4FNPPZ2W4HksugMhHeErI1jjXomr3tUF7WSh78eGv8u5Y1ZaVyZ2YBa53fDc8~WGWaKJkg7PN3TwHa7C3cSobI7d2qgi~ebttNX5GOhcm2X1-fBcFtRoT~6G~aMc89rQcnmt1pZYxlJiQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(103, NULL, '3_IZnDnghfy5R9T8hIUKol.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/3_IZnDnghfy5R9T8hIUKol.mp4?Expires=1545921411&Signature=BTdFoSJRmLkk00slLqJC08KMzNq6h2DJwRBFEs-Wxj1LlBxrq8vUZ7zA~bcZgeSytiQX-pjNwUOJAln1HRg91-K5pcSv~8dL72-AWf68SQimA8kE85XPLwO9aB4K~R~Cfl1zVianFSjKFqmt2RSfCYetEJQ153Zua801zYfspVckjRSX263nD10cpN-zoieUR8S9uzzU5W1EowB6dNO-c0mOKoYpzXsz0tk0t61RhZ78zqZM0wPFqSHghIus9cx0hQ1V5BgG0mgybDG4gfWC5LTXO8LIAhCuJ33Y8kr2ByNl-QvAu2wwvDMOcuTSKV0~LMKY7yZugRGbTmNdqyFTww__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(104, NULL, '2_yGvZLQV9U1W6WxLC4Znq.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/2_yGvZLQV9U1W6WxLC4Znq.mp4?Expires=1545923385&Signature=UM30dE1oqXMz~Uirn3DScu04FYyT3~vxT2ZRsvwnEvhLxIJY9aqmmeen0qiENOxfeaCjTZlrNVqRxaXlakhHOIcl6VflbGiNQZMzdVbtmsRp-Sa~bTO5hZbr~NPoUk81GnHKgaEN2AWO0fbyN6IgYr51yoUbVZW3frWekMJYckEmGYyAGPSK-PNn7vW1Kua7LNfxOgDWOxiMPq5Z4Hg71sx9i9XUoM1U5IDUqOKX2LyQ2oOxF8~3GMVdb8X59NhiMx2-9K~Lby2Zpf1uEwI43FfHpH15SEhzTw0Ly4XRB~34Q0KiG3YFALYnY~aoQMEwDmoOFyDH~KWy~wCqll6swQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'chapter'),
(105, NULL, '9_XAUJeRihFn3UhknJjIyb.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/9_XAUJeRihFn3UhknJjIyb.mp4?Expires=1545930521&Signature=rQKckWhbqseBe53ZbW8~2RZstsNGot-UCohw8tswICi5jfsEWuTgIM4GYu7C5Geb8IOjR5F~zPyi0VXa4rQSpoM8b5LggMBDXtqgQseSOszeKI7iWZ4InkATEIXqI9LGNE~AT-nyUdr5uPxe-siEyaOF3OmV1Xzi8VDWw~~9qe4vBiDSvJIQ3C8DukM66mI04JCrq9O5bCP~n5Ru8rScMnbvp15A7xhYNxb5cZqeBCG3O0vlcr7X7v0Y90TB3yRe2SC0o3milErpo9buu1~gd40wTjNlJJjeLqkMTdWx4m7WXY~agOWyDccxW739o-p-a21Oo3qFhvU~BN-CVLrEDg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(106, NULL, '9_Ek9tBx78CNXv9lx8adjP.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/9_Ek9tBx78CNXv9lx8adjP.mp4?Expires=1545930521&Signature=1Jb3l-YZ-9eOJo9Ogm-t1svthpSqkV4NiAcee4TG0lYXOt296TSfv7YjsQmKOkBHB4mq~51KoaaIMtYV6H~ELQY~wNWQI4z~JQ6BakB5UdrmeRfIitv0UvkpLnxmzkNrDnv4q5IQXQt6QbAIGHZZh5AKg-noQ9lqQJ~q9lIEnvPH~YNqOm~~a8YIfJdEYOpLkbkaxrQfyKVca-qeNrE7XCBi-NGmqMVmYrb2I5FJGNyL-KdbRXAzykRus5QWPbQL40xtXn4-eOESEaV8nUUSNFkV-5cy3hDOh5Ellq-uLJb3Q1RVUEN8x3QdqBcqVcmLv0tbv-KBdQlCqx3bpuAxZA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-26 00:00:00', 'topic'),
(113, NULL, '10_ZCfN4sGh105KgkOeQb8W.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/10_ZCfN4sGh105KgkOeQb8W.mp4?Expires=1546174462&Signature=X~iDZiuvfNS3Qymxhdk-yZuILIBkN6iaarpLKd8FuihZpdzNu0DPGpiOGkO10uOnPjNRSm32z9iKXmkdicbK3A0O3rxdkELDxr0Pla76khuFWB79Pa9vHkbZo8ZXEJucxE4xHTvBphTEyBs7Nv2tRkAF~R3I~nTM~M2iD9aAThEXbEyPhyskZxK5~9uu7BctDW9P14hqBjIJZ~fBtlXuksth5itegMmiPnsAFEFAnkR147fz4cGteJhjxs2x9uzkFqwCq27IuCR4H~oq-tydKSUMXC7XFCYBMPHF3UAfwco36~tT8oVDljRRXyzzA5H3lMzcTX8p2iT0Fu2fxSxGwg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-29 00:00:00', 'topic'),
(114, NULL, '10_YAVDZfpNsESv5GvrdNKz.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/10_YAVDZfpNsESv5GvrdNKz.mp4?Expires=1546175659&Signature=Az7rM~d3XWqXwCktQ-2T4FpmnbHo7bLSOggaboa9YGM2fBpTbNllvf2zgYQkORAj~iARbWQ67TSFJdMVuA4p2HP4kl5tyiA0HVEon2YRJ3qHgt92N4V1ZuRn~AtI4D2kfdUS~fAQey0G4Ok4KB8U-RR4dH15ySj2It5FPwq1PlV0qDrxzOUHXmmTU3KbtDGnQgIp-vx2Baf3tan91YjcMJ07let~Ps8I0mlUgUJvTiffDxkk6WjGFEgCr6DGNopWwUJv6sfno2PplIfq~1~c9sfrIDynaHQMx17rOT6xBc-PWPbX06PupmWQAduBdPe0u2JhHxqaKaIEBKOTE0FyQw__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-29 00:00:00', 'topic'),
(119, NULL, '7_b2122cqQanp093ZDyNz0.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/7_b2122cqQanp093ZDyNz0.mp4?Expires=1546189245&Signature=4LPZDUBmtgMiVQw6DDtmMq2XGDOkB1DqI85Iilsj2M08oo57TqZQfnTl5BR4NYFul~QqJaOV0zs9uRSRuuj84KcpYs~8ksxLsFsca8jg3eU3Q8ABWl77kfV2ACHz-2c7sVHRMLVaQsRdAdEq2k8sMvlWGPmaDCwSQwDyunMDkm3WwTWphx9syKdAlPSRikvTCYhejVyZrjKd0HvRInky~3YioL-fh6jDe7Psa4aA8lEtYgq36ico7GQ8RtFOR04BVK7IvrKT-qcVBKqqj3iwW~y3rnF6DWniGjWtt7hmXgJ8H0t-rLyKI9ZLv2448M8iZ37j6dowRspQDBsLXBPTNQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-29 00:00:00', 'chapter'),
(120, NULL, '4_qOmGnmGVRMmpSaRsM5my.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/4_qOmGnmGVRMmpSaRsM5my.mp4?Expires=1546190763&Signature=MI064Nuc5uxeZYaMSg0ksNWRrZWyqSC2Iw6ABscKYvdI3lch1zmdcMBD0fl799VGpqI4705VnIyUIZ49n3eYvi2LCunIjoZR~gbLeDsN1RyTLcqnM2oocvjK7Xmq3QkAQNXsiSm3Ib1xUZn3J1TkbIusPyHrrlIcDVLBQw8rHqZICk2Kbvasy3iPy7Bm84lusVPZsJxEMr3gRB9UtvkAMqPAU44VqLKFEUQs64sd9Pz~EEmSQiCfmam6xFbZkXb0D7g6Ee9LKHIJ2WH1FxBp2bE1u2Eo~Xj01B7W0Bw7hVmtkFO4BzCiSupY5gzw9FPg8fGkVodkf7-caZ3duY6YIA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-29 00:00:00', 'chapter'),
(121, NULL, '3_AyHvuZO738FpWRJHJKJf.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/3_AyHvuZO738FpWRJHJKJf.mp4?Expires=1546192577&Signature=NbmvtBXqvfy0vOaHBp9JxYQh4ZUH~FtNN0KkSOhotG0460grPngZdx84BABULTeR8XnRh7fvGe-MZT8nzduQzRrkwJandCoRUsjatMTVypkEr3H0TQcfB21PKaCUtpMUZVAbB1BqC6TEafmm21TYNWjhk~sE6SNt6YZc~wm8Kt7F7ugQfDe6Ltfi0xXjyYuJ2~fQNFnwX4hP~cDILXH4YR6C0EjWsnBT57Rb5fM76J7ZKfukPzOMAIA4UO65Rm10Nc7aGztLVL3aH5RPU2oJKAA8t3nV02CkLYd6uqsVlbFFeXvkONGvJxD20bnnj-wuK9-zPvVbbL4oc5iHxzxjww__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-29 00:00:00', 'chapter'),
(122, NULL, '1_0FhrXo4UTXV91L5jMSU8.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/1_0FhrXo4UTXV91L5jMSU8.mp4?Expires=1546192802&Signature=Ni6E6hAdO0UmuXUPX~cXhuE4V2Svh0~jXayHD9a4CcNiC2kWnaMaJge5d3bfH2GdjTfyroOwyuY-AWAnYq6wnKi6gND2oK0PbOJR3nNFP0cv9rBPT2PYLOiSDkvvNGSlYeGK4QZufDpitlY3~x5ixkLnpmLrutJsKNhCAxway0q6O-ylofbYqkJlzWodlk3fiavhrfgWe2h49xsXrIbY8zXgNbldY75IvzYR068OUTKX6~0eCb~ZGLLE-14VKUp7jTWo~kadwhMFUES57q6P13tD3Q1CMwPo4hT63zNo~KRDauI8JkGkHmC-d1~5QovbJitioorcncT~OPTg5evtAA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-29 00:00:00', 'chapter'),
(123, NULL, '1_AkwK9zwMk91ip9FSBPNL.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/1_AkwK9zwMk91ip9FSBPNL.mp4?Expires=1546192802&Signature=EJyA5a-1-VcErx4l3Q5s~864metFJAvs47g9Hx3GmlWhcwHc6QQx0uh8rqS~KaQqyjEbwpTKQS1wedwD-xrnLsgSqaXGYivSAi~kIw9iG65NEEh6Vi0c3gM9IY0DpGdAQGB8Yj4KGcJMA5OytXaYcChSlQmXxg72STvRpFyOaWUxRiZJDHGIjNhkVvLtR1SXCh5neUNaLTygQIfrepEouFK-leFzcku-iSNxdRkzY23fgDiJmwLFP5DpbwMDUMDVcI5DUmDg50XdafIGdDnpf~cYChcLqbD57OiDHpwq-U~yXNzd3wWILig-rW1Y1Pb3wwiZIYlRU5usX0UKpOpw1w__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2018-12-29 00:00:00', 'chapter'),
(124, NULL, '7_b2122cqQanp093ZDyNz0.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/7_b2122cqQanp093ZDyNz0.mp4?Expires=1546511871&Signature=x6Nmc5HOMgVXea5oqQf7FdS3YZDM2OoWlpC-JGnp~afpHEW1TJxctLEXAivdLJJbXCch2SM42F0F8~Xc06R6RBJPXj1Jifa6LgV5Uw38i~TVH6IBnek1ZkPjFNcAG1K60epHWM1C0oq02q23l6g9qtWxfZsNySTFp~w6OCuPhxkz0hDwuTMgPF~k1cslIoky33DoWsmSRBgtAb0kLggajM4cgPqj8tp9RbGjI8IKqqcpyCzEYZGnhl~JCpU1ypAJjq7Mb3Tukiu0D4bYqemEilqVghvGKqRwZ-tBhLASnpnbD6ipxH0opjnBPv6DIq8Il~53EYqlzggb8vpIKVQT8A__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2019-01-03 00:00:00', 'topic'),
(125, NULL, '1_GD4v3SNj9se91ASaVczm.', 'https://d3gpe1urc8fnib.cloudfront.net/course/1_GD4v3SNj9se91ASaVczm.?Expires=1546579756&Signature=Mt28y3V1WRXZZoSLWkC~UU4NZIiwknmeWdzYWZWZCAvqh~PYBSAKjPy4HRKHHa7BLXbAYwBDNor4JGedFDnUWASznWIwCuky4WD2mhAquYbmoFQ6W4RUwfo48F~rS~~zr7ciLJtDBoJ-~muhzpEy~abh9zCpPsCP2ok39tWNMOfegr1MFzQW2-OKe46sTUBnzvUu8pTYH2~ByKImPyjmZfcbjnOX2XDLrB9QfSAd47ibKVuB6AkwXM~OIDfRyYMgP9Q1KQo3YfYmhjYZzxNHHtIv7ukmw651-YDLPYstPzfY4mozA5aeH2JWDYgrGX4nON6DQR3zKZ8SOz2EH0UMBg__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2019-01-04 00:00:00', 'course'),
(126, NULL, '10_YAVDZfpNsESv5GvrdNKz.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/10_YAVDZfpNsESv5GvrdNKz.mp4?Expires=1546595264&Signature=2prEwuAJ5owKPkPPQevYwIiBMmdCjuiOyRxHVvGaIqt5p3dz-aLeB0gtqSk9584Tppg-8lIEgxzWGo8ZYOkPUhC2uyn1TxH~ZcMmP1OJv0vCAhToyuO2gCVkBr1qubIgOf4L9pgfjViYuDGgZoZObNXzkq4Hq1SkhK3bMSsbdNXNwGhRoNQc8tmj-8YieQIrM585HK7agZ~pudspVSfxSgerkt~GXhmV1ojA0qjAW4SMwwAwywQdOWt3pq1YhuGPDfhW4Y5xpmRvx027Z9EwPb4d-1c~6SYLwod6xwr89eU5WHRZSnq7plS6LZ3mvIBjrx773Fqzff8tQtMZMVOhmQ__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2019-01-04 00:00:00', 'chapter'),
(127, NULL, '9_o3tl7WdyJQAk6oUnLm3S.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/9_o3tl7WdyJQAk6oUnLm3S.mp4?Expires=1546677631&Signature=FEpTZNs3CHBl7byc3cDR8EB-vpXgCJf0QqV~cnDDWvGO7dZ8WigjiR2PzYzrFJOWikBD8T9eaIhJMA5Yj2TG-JzwLTawowaAwXQJ5T4eWsUG1xqPjM4rkDclKPrldvEQ8c58IfY-pMB5XhFiWoGrZx~XO1QMEOIlWFMjn-8yCLYg~MAkHHJAUlqAGMrkzYhFtKJj~we6X4HffnjuBxiQGmTjJVDbenDuJxAuSQ5bsaCwJG~qcJY2DR3wEZHikZ9NyVSLcZOJKZKB1CCfWQ0AC7m~WZ7M6Ot45-BCmRR8thqmo0UhSBM8agav4D-lHTo11rB6RuVnI4dUQVjnGLzY~A__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2019-01-05 00:00:00', 'chapter'),
(128, NULL, '10_67VYOJ5kKdGWFO8JZkNb.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/topic/10_67VYOJ5kKdGWFO8JZkNb.mp4?Expires=1546688385&Signature=KkvZ-R2M6q0GfWxbBTLcMl8QWJHd2~HbVlNnRP-8kWsAMJEkDLwqQe~-9BqW6TrYMr7J8ATIxykpewPmGatx4az-INFTNrfWn1m~iFUMlDPdgWLK9PwB~EUSJL4z15z0G4Hrnh0wkoi5Hmpt3tJAYScp9YCdHnAFDoPOfKpyK5mFgrGiwH6N89IHepZccSnvOiBzMomq-hEeW2M4nKJSUiOmQxiq5Bf-196TNHD4utgwVmqqN7mZga6t4A~6otXMaI11IRyNhWkP3u5aF255TIKzHnSnymGXBM3-AH3FnIDTDxa5ekgvGg6S6ZgC052yo-XzIrAtrotMYsMfrF7~EA__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2019-01-05 00:00:00', 'topic'),
(129, NULL, '10_dsLpAi7n3Iksdxq0RYwZ.mp4', 'https://d3gpe1urc8fnib.cloudfront.net/chapter/10_dsLpAi7n3Iksdxq0RYwZ.mp4?Expires=1546689086&Signature=dhmlbwePSSEiou5IKYlwV5PLgMXv3GMtucV4yHh60qwhdLOQcKx8jEZOuRJun3sSajFF9t3jhT4urEoitXeZy9ZZ6gDfDy9t-Xjj3wQiQtzmLDKbsHwZWmS0r1sZOGA3bHksPyJu26qYQTzM5wAPgVB5ydUMYRir6KqifBnOFEPSBb5FfXIpZonk1rbWpl9sLOOt7IwH~j0iLcuaYChmrlLsSjI9QFIwxCQY15wwzwMX3RA2zgOp7XzFv9hosoSrzm8W-l09HTjZ6ROlsEer9xcnzc7OqChWhytNGJPOYzkc5RsG0TK7wJ8WLESuzc4-ZNiYi0b6GsipJRCIlacl0w__&Key-Pair-Id=APKAJKHHL2PYFKHG7JZA', '2019-01-05 00:00:00', 'chapter');

-- --------------------------------------------------------

--
-- Table structure for table `thumnails`
--

CREATE TABLE IF NOT EXISTS `thumnails` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `parent_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `chapter_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `user_id`, `course_id`, `chapter_id`, `title`, `slug`, `description`, `price`, `image`, `type`, `publish`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 2, 'iOS - Get Job Ready with Swift 2 (Intermediate)', 'ios-get-job-ready-with-swift-2-intermediate', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 5.00, 'fpfBYtu09s0b7Z3ClErm.jpg', NULL, 1, '2018-11-26 04:24:27', '2018-12-03 10:37:32'),
(3, 1, 2, 2, 'Photoshop CC 2019 MasterClass(Advance)', 'photoshop-cc-2019-masterclassadvance', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 6.00, '2y04bcfxMFrSGyW0QwGy.png', NULL, 1, '2018-11-26 04:24:27', NULL),
(4, 1, 2, 2, 'React Native Getting', 'react-native-getting', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 656.00, 'FomNzlb5wg2wMGZ7eLqz.png', NULL, 1, '2018-11-26 04:38:15', '2018-12-03 10:38:54'),
(7, 1, 3, 3, 'PHP with Laravel for beginners - Become a Master in Laravel', 'php-with-laravel-for-beginners-become-a-master-in-laravel', 'VERSION 5.2 but we keep upgrading as new version come out. This is an evergreen course because we keep adding new fresh content all the time!\r\n\r\nUPGRADES .......\r\n\r\n5.3 - section 33\r\n\r\n5.4 - section 38\r\n\r\n5.5 - section 40\r\n\r\n5.6 - section 41\r\n\r\n\r\n\r\nWe will keep updating the project as new versions come out!\r\n\r\nOver 8000 students in this course and over 150,000 students here at Udemy.\r\nBest Rated, Best Selling, Biggest and just baddest course on Laravel around :)\r\nOh it''s also the best course for complete beginners and of course regular beginners :)\r\nLaravel has become on of the most popular if not the most popular PHP framework. Employers are asking for this skill for all web programming jobs and in this course we have put together all of them, to give you the best chance of landing that job; or taking it to the next level.\r\n\r\nWhy is Laravel so popular? Because once you learn it, creating complex applications are easy to do, because thousands of other people have created code we can plug (packages) in to our Laravel application to make it even better. \r\n\r\nThere are many reasons why Laravel is on the top when it comes to php frameworks but we are not here to talk about that, right? \r\n\r\nYou are here because you want to learn Laravel, and find out what course to take, right? Alright lets lists what this course has to offer, so that you can make your decision? \r\n\r\nBenefits of taking this course (I promise to be  brief)\r\n\r\n1. Top PHP instructor (with other successful PHP courses with great reviews)\r\n\r\n2. Top support groups\r\n\r\n3. An amazing project that we will be building and taking to Github\r\n\r\n4. Lots of cybernetic coffee to keep you awake.....\r\n\r\n5. Did I mention I was not boring and you will not fall asleep?\r\n\r\n\r\n\r\nOk, Let''s break each of these down, shall we?\r\n\r\nTop Instructor.....\r\n\r\nI don''t like boasting but my other PHP courses can speak for me :)\r\n\r\nTop support groups\r\n\r\nI make sure everybody helps in the class and we also have Facebook support groups if needed.\r\n\r\nThe Amazing project / real life application....\r\n\r\nOn this project you will learn everything you need for creating awesome applications the easy way with Laravel, and new features will be implemented all the time, just the the curriculum and look at the updates section.\r\n\r\nFull Source Code is Available at Github \r\n\r\nOh yeah, we take this to Github (A app repository online) and even show you how, so you will learn that too.\r\n\r\n----------------------------------------\r\n\r\nPracticality.......................\r\n\r\nLots practical skill with some theory so you get more experience that its essential for becoming a Professional Laravel Developer. \r\n\r\nThis course will take your game a new level. Imagine being able to create the next Facebook or twitter, or even getting the developer job you dream of? What about just a programming job? You can achieve all that if you study with us and really focus. We will help you along the way.\r\n\r\nHere are some my lovely students (Not to show off of course) :) \r\n\r\nREVIEWS  ------------------------------->\r\n\r\nRating: 5.0 out of 5\r\n\r\n*****\r\n\r\nUnderstood MVC in one sentence after so many years! Great job Edwin. A great deal of effort has been put by Edwin to create the content in two parts , first for understanding the basic components (eloquent relationships, views, controller etc) and then actually using it in a project. And he loves teaching. We love learning from him!\r\n\r\n---------------------------------------------------------\r\n\r\nRating: 5.0 out of 5\r\n\r\nGreat Course! Everything was explained well and if you will have any questions they will give you good answers, or you will find the answers in Q&A.\r\n\r\n---------------------------------------------------------\r\n\r\nRating: 5.0 out of 5\r\n\r\nI would recommend this course to Laravel beginners like me, it covers a lot and the idea of learning on short-manageable videos + learning from errors that follow is a home run best approach! I am satisfied with course and especially with teacher Edwin who is extreme motivator.......\r\n\r\nRating: 5.0 out of 5\r\n\r\nI loved the course!! Learned a lot and actually applied it, I''m very happy. 10-stars!!!\r\n\r\n---------------------------------------------------------\r\n\r\nGet it? Not every course its perfect we do get the best reviews for a good reason, of course you can''t please everybody but we try.\r\n\r\n\r\n\r\nAre you ready to to create the next Facebook or Twitter? ................\r\n\r\nLets start with the fundamentals \r\nDownloading Laravel\r\nInstalling it with composer\r\nLets also use Laravel Homestead\r\nWe learn about Routes, Controllers, views, models, migrations, template engines, middleware and more\r\nLets learn the CRUD, create, read, update and deleting data :)\r\nWait, lets also learn the CRUD with all the ELOQUENT relationships,\r\nLets learn so database stuff :)\r\n\r\n\r\nOne To One\r\nOne To Many\r\nOne To Many (Inverse)\r\nMany To Many\r\nHas Many Through\r\nPolymorphic Relations\r\nMany To Many Polymorphic Relations\r\nQuerying Relations\r\nRelationship Methods Vs. Dynamic Properties\r\nQuerying Relationship Existence\r\nQuerying Relationship Absence\r\nCounting Related Models\r\nInserting & Updating Related Models\r\nThe save Method\r\nThe create Method\r\nBelongs To Relationships\r\nMany To Many Relationships\r\nLet me break down some things from the projects but not all, cause my hands are a little tired :)\r\n\r\nAuthentication system\r\nMulti users with roles, Admins, subscribers and whatever you want :)\r\nUser profiles\r\nUploading photos, multi pictures\r\nMultiple input selections\r\nUser, CRUD\r\nPos CRUD\r\nCategory CRUD\r\nPhoto CRUD\r\nPretty URL''s\r\nCommenting system, reply system with tree\r\nDisqus commenting system\r\nSessions, and flash messages\r\nEmail Sending\r\nEMAIL testing\r\nRestrictions\r\nDeployment\r\nLots more, too many to list\r\nOh did I mention we keep updating the course with new versions? \r\n\r\n\r\nDid I also mention this LARAVEL course is the best rated course, the best selling and the biggest of its kind here in Udemy?\r\n\r\nLets start this and let''s create big things :)\r\n\r\nWho is the target audience?\r\nPeople looking for web programming jobs should take this course\r\nPeople looking to learn everything about laravel should take this course\r\nStudents who want to take their PHP skills to another level should take this course', 20.00, 'nfSQyG68QMMqX8QfoWBo.jpg', NULL, 1, '2018-11-26 13:30:09', '2018-12-03 10:38:01'),
(8, 1, 2, 2, 'Projects in Laravel: Learn Laravel Building 10 Projects', 'projects-in-laravel-learn-laravel-building-10-projects', 'Don’t get stuck learning the old way! Get your hands on the latest Laravel technology with our\r\n\r\nProject Course!\r\n\r\nTechnology is constantly becoming better, changing each second of every minute, so you need a course that can help you learn a technology fast. A simple method that will help you become not only proficient in the fundamentals, but also help you learn how to practically apply these fundamentals in the real world. Well, that’s exactly what we are offering with our Laravel Project Course.\r\n\r\nLaravel is THE most popular PHP framework that is currently used on the market. Owing to its simplicity, ease of use, simplified syntax and loads of other features, PHP continues to dominate the market for PHP frameworks. So, if you want to build some pretty neat and dynamic apps and websites, well then Laravel is probably the framework you are looking for.\r\n\r\nOur Projects in Laravel course can help you out there. Designed with experts from all around the industry, this course has been created to help bridge the gap between theory and practical application. You will not only learn the fundamentals of Laravel in this course, but you will also learn how to actually put them into application.\r\n\r\nThat’s not all! In addition to Laravel, our course also includes teaming up Laravel with some other state-of-the-art technologies such as PostgreSQL, Laravel Mix, Bootstrap, OctoberCMS and so much more. So, you will not only be learning Laravel, but also other amazing technologies that work flawlessly with Laravel to build some epic websites and apps.\r\n\r\nSo, what do you get when you sign up for this course? Fundamentals, a detailed introduction of Laravel, how to install and configure Laravel, how to integrate Laravel with other technologies, and 10 amazing projects that are royalty-free!\r\n\r\nHere are the 10 different projects that you will learn in this course:\r\n\r\nBasic Website – In this project, you will learn how to install Laravel, set up the controller, views, migrations, compile your assets with Laravel Mix and build a basic website.\r\n\r\nTodo List – A simple Todo list will help you understand how to integrate CRUD (create, read, update, delete) functionality in Laravel.\r\n\r\nBusiness Listing – In this application, you will learn how to create authentication, add business listings and delete them.\r\n\r\nPhoto Gallery – Here you will learn how to create albums and update photos into that album.\r\n\r\nREST API – In this you will learn how accept requests to certain routes, update the database, and using items with a name and a body. We will also build a front-end using JavaScript so that we can make requests to the API.\r\n\r\nOctoberCMS Website – A website built with the October Content Management Systems that is built on Laravel.\r\n\r\nMyTweetz Twitter App – An app integrated with the Twitter API, which will allow you to not only compose tweets, but also publish them.\r\n\r\nMarxManager Bookmark Manager – A bookmark manager using the PostgreSQL as our database.\r\n\r\nVue.js Contact Manager – In this project, you will learn how to build a front-end using Vue.js as a component to work with our contacts in the backend.\r\n\r\nBackpack Website With Admin Area – This project will familiarize you with Backpack, a collection of different packages to create different features in You Admin Panel.\r\n\r\nSo, let’s get this party started! Enroll Now and start building some amazing Laravel projects.\r\n\r\nWho is the target audience?\r\nAnyone who wants to learn professional Laravel development will find this course extremely useful', 98.00, 's88F7Z6azrlLhszNYe6V.jpg', NULL, 1, '2018-11-26 13:38:42', NULL),
(9, 1, 2, 2, 'Advance', 'advance', 'What is Power Bi?', 250.00, '4ZfweoCQt7Vp1MBIMxEE.jfif', NULL, 1, '2018-11-26 17:07:31', '2018-11-26 17:11:42'),
(10, 1, 1, 1, 'test topic 1', 'test-topic-1', 'this is test topic ![enter image description here]"enter image title here")', 20.00, 'aQjKX0dPtDnu490rMJne.jpg', NULL, 1, '2018-11-29 12:53:52', '2018-12-05 10:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `trailer_videos`
--

CREATE TABLE IF NOT EXISTS `trailer_videos` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `parent_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer_thumb_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trailer_videos`
--

INSERT INTO `trailer_videos` (`id`, `parent_id`, `parent_type`, `trailer_url`, `trailer_thumb_url`, `created_at`, `updated_at`) VALUES
(7, 1, 'topic', '1_pS9CucBEMQmrUkSuug2E.mp4', NULL, '2018-11-24 13:14:58', '2018-11-24 13:14:58'),
(10, 4, 'topic', '4_oLi4PXuQE4hLXa8xtoCE.mp4', NULL, '2018-11-26 04:38:16', '2018-11-26 04:38:16'),
(14, 3, 'course', '3_CSMcElpXos5svUDa1AFf.mp4', NULL, '2018-11-26 10:42:47', '2018-11-26 10:42:47'),
(17, 4, 'course', '4_MHRqi2AYMpUFR8bpxGWH.mp4', NULL, '2018-11-26 11:26:49', '2018-11-26 11:26:49'),
(18, 5, 'course', '5_oVbb2X6YSHvyBNKuc8yR.mp4', NULL, '2018-11-26 11:34:36', '2018-11-26 11:34:36'),
(19, 4, 'chapter', '4_lol2SqSCmPtVKbVaBZig.mp4', NULL, '2018-11-26 11:42:01', '2018-11-26 11:42:01'),
(20, 5, 'topic', '5_1ZzTqsP8TUAkRsIMdO2n.mp4', NULL, '2018-11-26 11:44:05', '2018-11-26 11:44:05'),
(21, 6, 'course', '6_cEo5JrZ4LmsFQ8cA7tMj.mp4', NULL, '2018-11-26 12:07:57', '2018-11-26 12:07:57'),
(22, 5, 'chapter', '5_sAN5siiCCz8LUMqihfk6.mp4', NULL, '2018-11-26 12:09:29', '2018-11-26 12:09:29'),
(23, 6, 'topic', '6_QuuNZvT9yooGvGDWdcSt.mp4', NULL, '2018-11-26 12:11:40', '2018-11-26 12:11:40'),
(25, 7, 'topic', '7_urDw3PO3TXs8MOhlDpfV.mp4', NULL, '2018-11-26 13:30:10', '2018-11-26 13:30:10'),
(26, 8, 'topic', '8_zv5LvH9YUGYqxRoQiCxh.mp4', NULL, '2018-11-26 13:38:44', '2018-11-26 13:38:44'),
(27, 2, 'course', '2_yFCOV7isER3U53NOUGdR.mp4', NULL, '2018-11-26 13:56:34', '2018-11-26 13:56:34'),
(28, 1, 'course', '1_hCAZmJHJVYWwVXsiz2Z9.mp4', NULL, '2018-11-26 13:57:49', '2018-11-26 13:57:49'),
(29, 2, 'topic', '2_YocRVv4TScxLllOqL94f.mp4', NULL, '2018-11-26 14:11:26', '2018-11-26 14:11:26'),
(30, 3, 'chapter', '3_AyHvuZO738FpWRJHJKJf.mp4', NULL, '2018-11-26 14:13:46', '2018-11-26 14:13:46'),
(31, 2, 'chapter', '2_1cDVM1h8BDB5Vnrr8w83.mp4', NULL, '2018-11-26 14:16:29', '2018-11-26 14:16:29'),
(32, 3, 'topic', '3_e92n8y1WozGUbsWRz9Rd.mp4', NULL, '2018-11-26 14:28:29', '2018-11-26 14:28:29'),
(35, 9, 'topic', '9_Ek9tBx78CNXv9lx8adjP.mp4', NULL, '2018-11-26 17:07:32', '2018-11-26 17:07:32'),
(43, 10, 'topic', '10_ZCfN4sGh105KgkOeQb8W.mp4', NULL, '2018-11-29 12:53:53', '2018-11-29 12:53:53'),
(44, 1, 'chapter', '1_AkwK9zwMk91ip9FSBPNL.mp4', NULL, '2018-11-29 17:56:47', '2018-11-29 17:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avtar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` longtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `password`, `avtar`, `user_type`, `status`, `email_verified_at`, `ip`, `agent`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sandeep', 'Rathour', 'Sandeep Rathour', 'sandeep@gmail.com', '$2y$10$Cntnzdh8c1lLmtMqPAzDo.AC/6EJdLIFZB.IR1YOQja.XI5olV9lG', '1_GNGp7Xk3398aA3IedYo6.jpg', 'admin', 'inactive', NULL, '103.36.77.53', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', 'VKBWQNpisFwq0IkJfK7ZD6MlTcCo1NLfqizcf2SmqASSJ0BPeJxF8zpiz1WV', '2018-11-13 20:13:01', '2018-12-05 11:41:44'),
(9, 'robin', 'test', 'robin', 'robin@gmail.com', '$2y$10$cjekiOuKgxlGsw5jasD9PetpnHzE.y5CGbn0aWGisRuPUdA.ksd/m', '9_jT6WdJxKVymEXGtIhPLB.jfif', 'user', 'active', NULL, NULL, NULL, 'kXtJlCrYSKEOmA14F3XWI1IVR10Cc7QG5MV7o2wiXLHzpLtgJstJNX5BCDjX', '2018-11-24 09:01:15', '2018-11-29 14:03:31'),
(10, 'Raju', 'kumar', 'Raju kumar', 'raju@gmail.com', '$2y$10$F.kt3mRreJEuTq4me5YwR.Xgnnw9XwttUPRikP0EdjANxMiioQnjO', '10_J6eooAPjq1ai0XOCDk4r.jpg', 'user', 'active', NULL, NULL, NULL, 'z7qTKIygkn5xtTftk0P3MqFOtn7jO0cC6Ndi1xBT', '2018-11-24 09:01:41', '2018-12-05 08:57:13'),
(11, 'Akash', 'Rana', 'Akash Rana', 'akash@gmail.com', '$2y$10$Mpmh5sbEgxgNtXbs8efn4.4cVCPjdiI67lFUARosX5WqNjUhhwPTC', '11_Mp9ze7PyCl3WQXl60Il9.jpg', 'user', 'active', NULL, '103.36.77.53', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0', 'i3gePvhUaMHmfeN4hEignR5KkZtAfZGfiw7MPT4B', '2018-11-26 06:05:25', '2018-12-05 05:07:19'),
(14, 'test123', 'testabcj', 'test123 testabcj', 'test123@gmail.com', '$2y$10$Dau6sxc1A3F7WCi788c3tOCq6C7EGndVvqhLPN4c4q7NNTFB4kZQe', '14_iiJ13zcXOEu0i2wpFcwC.jpg', 'user', 'inactive', NULL, NULL, NULL, '1HWkBMiy3urm0dZNVjeqOYhrmdvdiXrdk7c7oC0cdBuXubvaWxXB5CAyQisg', '2018-11-26 09:05:23', '2018-11-26 09:09:00'),
(15, NULL, NULL, 'Rajni', 'rajni@gmail.com', '$2y$10$W6IBT72GoXw42ez1VTBrk.gComktq0hl9DC9QbP8zNLvq/iD3xGuW', NULL, 'user', 'inactive', NULL, NULL, NULL, 'tADBhyMsBRFpfFXbjtP8fZj0AlTa99gu1mfmQ3HW', '2018-11-26 09:27:10', '2018-11-26 09:27:10'),
(16, NULL, NULL, 'jtest', 'jtest@gmail.com', '$2y$10$Lm0wdZRDxj4V8uCqL30XYed56GjLk3W2ols7qwNqTAldYaz8kjTwa', NULL, 'user', 'inactive', NULL, NULL, NULL, 'f2nf3yNTsHPLj81qBh4ux1Xx7QYDYiGK9e6PXZTerYAQ5JEUeMrUloWy6Utu', '2018-11-26 09:29:01', '2018-11-26 09:29:01'),
(17, NULL, NULL, 'rajni', 'r@gmail.com', '$2y$10$lzfcbAhcMwqEsX2hwwgGOuPOTeGyXPqE3BQs5pdQQEGp0yi/UcuYO', NULL, 'user', 'inactive', NULL, NULL, NULL, 'qclL2sEdt6CFKhHw839JuVRWZsi61lQNgKBccYN3aUKKS16uHnjhdc1yclFl', '2018-11-26 09:56:04', '2018-11-26 09:56:04'),
(18, NULL, NULL, 'testabc', 'testabc@gmail.com', '$2y$10$1qhqjnmk4U3NGLXWT7/33eXXVFGlbWeg3RVyRTNBnA0CrA8dowrze', NULL, 'user', 'inactive', NULL, NULL, NULL, 'ZLGfcIJ9Ehu5NHUJtitedbAYl08uO7how0YujIABOUxlBZawVHYyjvDNWyna', '2018-11-26 15:28:49', '2018-11-26 15:28:49'),
(19, NULL, NULL, 'test1', 'test1@gmail.com', '$2y$10$9LoXk3pv9xo0Uzq98BwyQeVes.H8FptPBPWv6sNtivb/JeZxlXf3K', NULL, 'user', 'inactive', NULL, NULL, NULL, 'iOfP0uwLlrleVcDItveoCYBhurkDKuVb6PzoDGTb1VxUC8Nv7wwWhczeEUdZ', '2018-11-26 16:31:36', '2018-11-26 16:31:36'),
(20, NULL, NULL, 'Errin OConnor', 'errino@epcgroup.net', '$2y$10$nt8Zx3jG7xLH4LUKwPT.s.x/2cM1YjpkJVVFkVRnv8nLczOx7c4LW', NULL, 'user', 'active', NULL, NULL, NULL, 'MOl12bQlhtSolWvqBiEw34VawjJmCJubM6r9k16D', '2018-11-27 17:46:43', '2018-12-03 17:11:57'),
(21, 'Sushant', 'Sharma', 'Sushant Sharma', 'sushant.shinedezign@gmail.com', '$2y$10$juoAfvd1U.0JbEihs15X1eFMIrjbDUMsZGOdIWLJzM5LpPDD8VjYq', NULL, 'user', 'active', NULL, '103.36.77.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', 'C3ussbYxzWOz4E8qAUUEgHADaSxQWXb1BCGPXWuvoLnwxMogjTy26Gjsf4CH', '2018-11-28 19:28:38', '2018-12-03 17:14:58'),
(22, 'test001', 'tse', 'test001 tse', 'test001@gmail.com', '$2y$10$stt9BGtwIMwpUs9uaJKHf.T5T4IOlnY6eUTHZDuTKtaGmjmhFT2KO', '22_2f1uiUiVeSMVx6XIpE32.jpg', 'user', 'inactive', NULL, NULL, NULL, 'Ib8NgYgkBKJdRBc9FmZB6i4gipPl5TM59JQQqivNRKOVNAlkcVTyv097hPd7', '2018-11-29 06:06:42', '2018-11-29 06:13:08'),
(23, NULL, NULL, 'o187799', 'o187799@nwytg.net', '$2y$10$Xc6utKqXts3Val8zm2yjd.AcJjbUo3TA44tEpP4US5FngcJ9B4iFy', NULL, 'user', 'inactive', NULL, NULL, NULL, 'rKziBEi4nqctJUcyOMdL8YRqVlutm5CSXkgwCXl2', '2018-11-29 06:27:16', '2018-11-29 06:27:16'),
(24, NULL, NULL, 'o1877999@nwytg.net', 'o1877999@nwytg.net', '$2y$10$78OpSscotpNJM5.E5vmIdOdedmMlBVn5nsEiDDe0rULXY8tAknluu', NULL, 'user', 'inactive', '2018-11-29 06:35:10', NULL, NULL, NULL, '2018-11-29 06:29:12', '2018-11-29 06:35:10'),
(25, NULL, NULL, 'vwc74526@iencm', 'vwc74526@iencm.com', '$2y$10$kiKEkQrRRbgPWN2yeaRD2exq0fMu7VDEvt.BzeQ1bH./qLdkyoNN6', NULL, 'user', 'inactive', NULL, NULL, NULL, '7o47NlHiFhIrVUTsnlK9Y8Np47beqD7Cwqu0bjFa', '2018-11-29 06:31:28', '2018-11-29 06:31:28'),
(26, NULL, NULL, 'dep92764@ebbob', 'dep92764@ebbob.com', '$2y$10$nGNuUy6.rlpbKFAEw30sF..yg3OgtfX.3Gu8jdsbv1dVgX6xaqDIS', NULL, 'user', 'inactive', NULL, NULL, NULL, '7o47NlHiFhIrVUTsnlK9Y8Np47beqD7Cwqu0bjFa', '2018-11-29 06:34:36', '2018-11-29 06:34:36'),
(27, NULL, NULL, 'o196692@nwytgn', 'o196692@nwytg.net', '$2y$10$v4EmiGGJzYpMCf2HIeTB6.E7n6kNAQs4Ug7iuQHUVX3ampGW3ngta', NULL, 'user', 'inactive', NULL, NULL, NULL, 'eOSB53VSJH3qOXjkJAmCxgtUBOpwIBuZV1UVMJOl', '2018-11-29 07:18:24', '2018-11-29 07:18:24'),
(28, NULL, NULL, 'sandeep', 'sandeep01@gmail.com', '$2y$10$u54OsNzUg8fu1qIb93C.T.lfGPhSzK5ibpddNE/VVBuZh7qYyePWu', NULL, 'user', 'inactive', NULL, NULL, NULL, 'Ba5jf67oGYtmp8oztbYIBy86wyKm5F2ChPi2zC2C', '2018-11-29 07:38:13', '2018-11-29 07:38:13'),
(30, NULL, NULL, 'rajulabc', 'rajulabc@gmail.com', '$2y$10$TJPG2nmp5xwyKs8ApU4LROU9tRgqMBGjhNt6mp4hJFXCOcNcW.18.', NULL, 'user', 'inactive', NULL, NULL, NULL, 'Ba5jf67oGYtmp8oztbYIBy86wyKm5F2ChPi2zC2C', '2018-11-29 07:39:16', '2018-11-29 07:39:16'),
(31, NULL, NULL, 'singh', 'singh@gmail.com', '$2y$10$6B71xDjLKBP6y0qCd8mlUO5QUCCfQRFTMPJLgOxTHJul.Lt9IohF.', NULL, 'user', 'inactive', NULL, NULL, NULL, 'dF3aOUptrhQH5GwOazh93sa1TTNpPUUa0HOjYgdmx5MtkiliV6b5K2aO2UvY', '2018-11-29 07:40:33', '2018-11-29 07:40:33'),
(45, NULL, NULL, 'vhl97235@ebbob', 'vhl97235@ebbob.com', '$2y$10$4rStUNFqEp2I5Zp24ewAnOtbpvpqTtpKJDuFvOHn57FSlYs/pYbLq', NULL, 'user', 'inactive', NULL, NULL, NULL, 'wySC1YFUj0gQBNO6m3sOEyP5M7V9s86Qr4m8INWN', '2018-11-29 09:07:55', '2018-11-29 09:07:55'),
(51, NULL, NULL, 'o217219@nwytg', 'o217219@nwytg.net', '$2y$10$D2giuKIwd1H7ZXHJ606jkeIW4EmOLFf4drAh311ltbWHverccOb6O', NULL, 'user', 'inactive', NULL, NULL, NULL, 'wySC1YFUj0gQBNO6m3sOEyP5M7V9s86Qr4m8INWN', '2018-11-29 09:19:25', '2018-11-29 09:19:25'),
(52, NULL, NULL, 'sandeep rathour', 'sandeep.shinedezign@gmail.com', '$2y$10$DCSg1QUHyl9pKr.7ylish.mO6rSxNVbHjuXh7eSm0im402QywSRKy', NULL, 'user', 'inactive', NULL, NULL, NULL, 'wySC1YFUj0gQBNO6m3sOEyP5M7V9s86Qr4m8INWN', '2018-11-29 09:22:14', '2018-11-29 09:22:14'),
(53, NULL, NULL, 'tede', 'jasvirs210455@gmail.com', '$2y$10$R7u2KidexYu8KiyG9t5kVuC2K5Mz9vofUX6H2AOUDn4PLKMpXoLCO', NULL, 'user', 'inactive', NULL, NULL, NULL, 'li4dKh2xHcRoSQRxFCsgSweIHH3WePqDkc7LB3Qt', '2018-11-29 10:05:55', '2018-11-29 10:05:55'),
(54, NULL, NULL, 'geuyfsdf', 'zmr@gmail.com', '$2y$10$eTMrkygkFNGwaaz/.ZZjVuigavJ0FDNAMOrYWcz/uuXFY122xaJCe', NULL, 'user', 'inactive', NULL, NULL, NULL, 'PDiwtueOZLj56mw8UCUyimQ9jMDXgignpNBdJdte', '2018-11-29 10:21:01', '2018-11-29 10:21:01'),
(55, NULL, NULL, 'trfgskd', 'hjhjhj@gmail.com', '$2y$10$iRujRFzZsnEUl8d1KHS9K.m76EIoG1RKsWZeYmjSS9L5CikD1jx0S', NULL, 'user', 'inactive', NULL, NULL, NULL, 'PDiwtueOZLj56mw8UCUyimQ9jMDXgignpNBdJdte', '2018-11-29 10:34:15', '2018-11-29 10:34:15'),
(56, NULL, NULL, 'hjhjhjhj', 'hjhjo@gmail.com', '$2y$10$Y0ejhJfCMlc1Njk6j6cRUuYtHkjj7ZdZSyowFWe9QwDCOif78OLB6', NULL, 'user', 'inactive', NULL, NULL, NULL, 'PDiwtueOZLj56mw8UCUyimQ9jMDXgignpNBdJdte', '2018-11-29 10:35:22', '2018-11-29 10:35:22'),
(57, NULL, NULL, 'kl', 'kl@gmail.com', '$2y$10$jllVq.PvvIE7ZfNYxzY4U.eakBlVxFv0Cq9yw16JWFFwvtFGOZT5m', NULL, 'user', 'inactive', NULL, NULL, NULL, 'PDiwtueOZLj56mw8UCUyimQ9jMDXgignpNBdJdte', '2018-11-29 10:36:45', '2018-11-29 10:36:45'),
(58, 'vineet123', 'kumar12', 'vineet kumar', 'vineet.shinedezign@gmail.com', '$2y$10$eqkBg7MdpmyS4YKsmvVLCe3ar2Qi65jbH2oEtACbiuivOEmOAXL8O', '58_oNUMPStiIdXqXdpYcYvh.jpg', 'user', 'inactive', NULL, NULL, NULL, 'MHBps4vFNJGeGM6QAZ5y5SLmJxs4WJ4DpbaCaYXEetAWzRGebNUcCANWNkBu', '2018-11-29 12:14:15', '2018-11-29 14:10:14'),
(59, NULL, NULL, 'rajan', 'rajan.shinedezign@gmail.com', '$2y$10$4IfqCEi1CR1.jK8aUsdLm.mykj6AqWLTLS7jf4zufYVTxsaQ6y3Li', NULL, 'user', 'inactive', NULL, NULL, NULL, 'hmDgasFwtiLL6qFINCeYTIPvcoTxwk9xt8lFRkQQspNjejSWW1XRtey58vZW', '2018-11-29 14:12:28', '2018-11-29 14:14:02'),
(60, NULL, NULL, 'Sushant', 'abc@test.com', '$2y$10$L4mulkh7s6ckSaMoMF5F9.ZAOxBKi2bjirYaFrpkqv2k/U.fSc5c6', NULL, 'user', 'inactive', NULL, NULL, NULL, 'AzLwbBiGV9NZSNdYmslMQQzEX5jUdbUT1036nqQWHasQNf6CAqqihxc75SRI', '2018-11-29 18:13:37', '2018-11-29 18:13:37'),
(61, 'raju2', 'raju', 'raju2 raju', 'raju2@gmail.com', '$2y$10$Vw1v/cK7LTYT983sYgZbpODRQNLNrArHHBqccdUYjsxZ6Ccl7p0mO', '61_M97mVniYNXwFNUNB4VQh.jpg', 'user', 'inactive', NULL, NULL, NULL, 'm1BD9rSjRJ1ruMGYRspySzUaUPmgW5IGmqk92uvtHpx2KkhSyPYuXa5mUplM', '2018-12-03 13:27:56', '2018-12-03 13:30:27'),
(62, NULL, NULL, 'Gagan', 'gagan.shinedezign@gmail.com', '$2y$10$7JVnqEalg1k92VRqi9L/8u8V7niE5hUGhaz4CAjp5nQ1dH8r.yokO', NULL, 'user', 'inactive', NULL, NULL, NULL, 'LAC6r7HsCve6ijMOyEFLZsRggEDqJ7pnokFwSQTh', '2018-12-03 17:16:44', '2018-12-03 17:16:44'),
(63, 'trap', 'testabc', 'trap testabc', 'trap@gmail.com', '$2y$10$bISIWE07Plff70bXWwvSUO4jz2UczFVi/DFQkMZqUZB5Ovb.PtoYK', '63_aJSG8vEsfcN6aB1rGsYU.jpg', 'user', 'inactive', NULL, NULL, NULL, '71PtXEAE9i6y4IOuXFOT4f4M57C1AfXe3pPlN9bwy4f7I6ErDNP3coRL7rWe', '2018-12-04 11:57:12', '2018-12-05 04:39:51'),
(64, NULL, NULL, 'testap', 'testap@gmail.com', '$2y$10$xz/MIWEedYmInSzUpa1tV.hZF95qob/WItuUi3PZ4TUH2OBO6M9Z2', NULL, 'user', 'inactive', NULL, NULL, NULL, 'SC10hucwhuwcCaXEmA0lKouzRwbI85dcJMPiWnIAXTN7Ztcjw5uLyjqnKGDf', '2018-12-04 14:09:51', '2018-12-04 14:09:51'),
(65, NULL, NULL, 'rp', 'rp@gmail.com', '$2y$10$paOloblElSTiYjQOxMYtlOgB.oCxNz4zyQt0pST8kj9P1qvY9VZ9S', NULL, 'user', 'inactive', NULL, NULL, NULL, 'HW6036nhsCzdRak1fz7i1ziammbzXHTycgI1oWImNWTW6fuyTEkyhohWxqDp', '2018-12-04 14:15:21', '2018-12-04 14:15:21'),
(66, NULL, NULL, 'ty', 'ty@gmail.com', '$2y$10$i/9vAJQRnKfFLEZW.lTkpOdLyMSPe62BcDbAn56FvRr33nKNOleCi', NULL, 'user', 'inactive', NULL, NULL, NULL, 'AGPMMZBAHlw8tPlgo14UiOLbYa2MRGynkAxjzMInnIST6vQ8ucCwTl2Ibznd', '2018-12-04 14:17:32', '2018-12-04 14:17:32'),
(67, 'Gagandeep', 'Singh', 'Gagandeep Singh', 'gdeep3013@gmail.com', '$2y$10$Q9sRUBt/JAUQ0pC3ZWRvkuu3m5Z29cMuDrL8IM0TMbcfDE5qcgYQC', '67_avHYJAY9GriMFFB3LfMe.png', 'user', 'inactive', NULL, NULL, NULL, 'aUnTy3ZGGAhoQjlQNOmilIPfc4Mp56gLkSxul5ih', '2018-12-05 04:46:13', '2018-12-05 10:49:44'),
(68, 'xrap tesybn', 'tesybn dsfjsdlksddfdssd', 'xrap tesybn tesybn dsfjsdlksddfdssd', 'xrap@gmail.com', '$2y$10$LnxX/0MYk7rq3JEM0r0mZ.ymLzGZytliTHRYuCI.sH518qngSpF1W', NULL, 'user', 'inactive', NULL, NULL, NULL, 'FlNv9NdjkJIwa1vX2jowiXfejALtMhBWXuPaFlL3KARccsi8TpO68UrXFFnn', '2018-12-05 04:52:42', '2018-12-05 05:06:42'),
(69, 'rpsingh', 'tpsty', 'rpsingh tpsty', 'rpsingh@gmail.com', '$2y$10$9aLuubPeZRbYD6tYBvyYVe/0yg325FLu/ALy0EbxcVOsiKBb8BcAy', NULL, 'user', 'inactive', NULL, NULL, NULL, 'ZZ4HbaZu4LFJj0GnzgJLMO0RdVu6j9evw5obmEK8', '2018-12-05 05:07:59', '2018-12-05 11:51:09'),
(70, NULL, NULL, 'Sandeep', 'sandeepr.shinedezign@gmail.com', '$2y$10$V4g8Q2/L/R/Wao492gr9oO6UuwE6CmIIs8Dpy8E2uo.mUKCHZJ0MG', NULL, 'user', 'inactive', NULL, NULL, NULL, 'Es1O6WxSasHV5y2iMQNdKu5OZOdO4cief1TnU06M', '2018-12-05 05:21:56', '2018-12-05 05:21:56'),
(71, 'opsingh', 'sinhldsfjlklkddsfd', 'opsingh sinhldsfjlklkddsfd', 'op@gmail.com', '$2y$10$iVCJ2zCqn/FYI43hmYwOO.bJJzkstGutL6z/6mxiypAotzWsKA/kG', NULL, 'user', 'inactive', NULL, NULL, NULL, 'xrqViZLzSH9G0mqBkZNoIHjYfW1FUwRhKImDQmqTZ9RM7HuOYM7u4CyF8I0y', '2018-12-05 06:25:03', '2018-12-05 06:25:39'),
(72, 'choudhary', 'singh', 'choudhary singh', 'choudhary@gmail.com', '$2y$10$hTljyvptcu0hXyV8GlnuW.TdImt90AYfAJhr4lgzQGcJIE8Wlzqfi', NULL, 'user', 'inactive', NULL, NULL, NULL, 'HHkRrlu6tBamFO9owNmoVEN9mau5ngpSkxZtrreQQf2Eoqip1F3CVLJUbefY', '2018-12-05 06:26:18', '2018-12-05 06:26:53'),
(73, NULL, NULL, 'ty', 'tyd@gmail.com', '$2y$10$HrRGhbtOAFdAr9D5KeeH5ed0pjNorGjmtchkNgIefa7BGARWJbxuu', NULL, 'user', 'inactive', NULL, NULL, NULL, 'MKm3AgsSFEXIVsW2Aqrw3xoqKbjh4Bto2MlO9Go3sABhZFxVO2GeonVTIAsW', '2018-12-05 07:32:04', '2018-12-05 07:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_testimonial`
--

CREATE TABLE IF NOT EXISTS `user_testimonial` (
  `id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_testimonial`
--

INSERT INTO `user_testimonial` (`id`, `text`, `user_id`, `item_id`, `rating`) VALUES
(1, '', 9, 4, '3.5'),
(2, '', 9, 7, '3.5');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `parent_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `parent_id`, `parent_type`, `url`, `thumb_url`, `created_at`, `updated_at`) VALUES
(7, 1, 'topic', '1_XduWFhxoAw7q3tA9ntfq.mp4', NULL, '2018-11-24 13:14:58', '2018-11-24 13:14:58'),
(10, 4, 'topic', '4_qOmGnmGVRMmpSaRsM5my.mp4', NULL, '2018-11-26 04:38:16', '2018-11-26 04:38:16'),
(13, 2, 'course', '2_mQv4aCMHfmEoMQGhhFzy.mp4', NULL, '2018-11-26 10:40:48', '2018-11-26 10:40:48'),
(14, 3, 'course', '3_P9sotHwj8mRn0iz9JwCm.mp4', NULL, '2018-11-26 10:42:47', '2018-11-26 10:42:47'),
(17, 4, 'course', '4_8o82qGrEh24Md08zKSHZ.mp4', NULL, '2018-11-26 11:26:49', '2018-11-26 11:26:49'),
(18, 5, 'course', '5_m0WFlR4XTZmNtrRXSw25.mp4', NULL, '2018-11-26 11:34:35', '2018-11-26 11:34:35'),
(19, 4, 'chapter', '4_5c94YkmuPdYZQJqoQiGG.mp4', NULL, '2018-11-26 11:42:01', '2018-11-26 11:42:01'),
(20, 5, 'topic', '5_Rax1zQsz2ejwsjU9J7rK.mp4', NULL, '2018-11-26 11:44:05', '2018-11-26 11:44:05'),
(21, 6, 'course', '6_ioBA1G9yP2ezAqYovbiU.mp4', NULL, '2018-11-26 12:07:57', '2018-11-26 12:07:57'),
(22, 5, 'chapter', '5_Q0BhlcsGoFlggvVppEZp.mp4', NULL, '2018-11-26 12:09:29', '2018-11-26 12:09:29'),
(23, 6, 'topic', '6_ef18rxnddwonUTZazb4n.mp4', NULL, '2018-11-26 12:11:40', '2018-11-26 12:11:40'),
(25, 7, 'topic', '7_b2122cqQanp093ZDyNz0.mp4', NULL, '2018-11-26 13:30:10', '2018-11-26 13:30:10'),
(26, 8, 'topic', '8_3kX90XHO8u1FfICakBeZ.mp4', NULL, '2018-11-26 13:38:43', '2018-11-26 13:38:43'),
(28, 2, 'topic', '2_sF5pDmPHuxGoQH4stRlp.mp4', NULL, '2018-11-26 14:11:26', '2018-11-26 14:11:26'),
(29, 3, 'chapter', '3_pQ0zsW0EcHedxsLLoqQR.mp4', NULL, '2018-11-26 14:13:46', '2018-11-26 14:13:46'),
(30, 2, 'chapter', '2_yGvZLQV9U1W6WxLC4Znq.mp4', NULL, '2018-11-26 14:16:28', '2018-11-26 14:16:28'),
(31, 3, 'topic', '3_IZnDnghfy5R9T8hIUKol.mp4', NULL, '2018-11-26 14:28:28', '2018-11-26 14:28:28'),
(34, 9, 'topic', '9_XAUJeRihFn3UhknJjIyb.mp4', NULL, '2018-11-26 17:07:31', '2018-11-26 17:07:31'),
(43, 10, 'topic', '10_YAVDZfpNsESv5GvrdNKz.mp4', NULL, '2018-11-29 12:53:53', '2018-11-29 12:53:53'),
(44, 1, 'chapter', '1_0FhrXo4UTXV91L5jMSU8.mp4', NULL, '2018-11-29 17:56:47', '2018-11-29 17:56:47'),
(46, 1, 'course', '1_GD4v3SNj9se91ASaVczm.', NULL, '2018-12-04 05:29:11', '2018-12-04 05:29:11'),
(47, 9, 'chapter', '9_o3tl7WdyJQAk6oUnLm3S.mp4', NULL, '2018-12-05 08:36:43', '2018-12-05 08:36:43'),
(48, 10, 'topic', '10_67VYOJ5kKdGWFO8JZkNb.mp4', NULL, '2018-12-05 11:37:40', '2018-12-05 11:37:40'),
(49, 10, 'chapter', '10_dsLpAi7n3Iksdxq0RYwZ.mp4', NULL, '2018-12-05 11:50:17', '2018-12-05 11:50:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_listing`
--
ALTER TABLE `gateway_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_getways`
--
ALTER TABLE `payment_getways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_meta`
--
ALTER TABLE `payment_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_video_links`
--
ALTER TABLE `temp_video_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thumnails`
--
ALTER TABLE `thumnails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailer_videos`
--
ALTER TABLE `trailer_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_testimonial`
--
ALTER TABLE `user_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gateway_listing`
--
ALTER TABLE `gateway_listing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `payment_getways`
--
ALTER TABLE `payment_getways`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_meta`
--
ALTER TABLE `payment_meta`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_video_links`
--
ALTER TABLE `temp_video_links`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `thumnails`
--
ALTER TABLE `thumnails`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `trailer_videos`
--
ALTER TABLE `trailer_videos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `user_testimonial`
--
ALTER TABLE `user_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
