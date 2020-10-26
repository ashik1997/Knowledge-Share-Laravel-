-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 03:26 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledge_share`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ashikur Rahman', 'ashik@gmail.com', 'B.Sc in Software Engineer', '$2y$10$GWrPd.qcOWigOt38DQBneOt1ztnr8f3rnAbhW1RygaV8vGkOajXEq', 'qtEfktdOm8icPi4t.jpg', NULL, '2019-05-19 08:40:24', '2019-05-19 08:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_by_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `title`, `sub_title`, `author`, `file`, `description`, `image`, `posted_by_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Telefilm Song', 'O Bondhu Lal Golapi Telefilm Song Mixed Artist', 'Mixed Artist', 'PYvS6LF04v3zx9YJ.mp3', '<p>O Bondhu Lal Golapi Telefilm Song Mixed Artist<br></p>', 'GPmjr0XTLEw4coUN.jpg', '1', 1, '2019-09-02 05:19:00', '2019-09-13 05:07:14'),
(2, 'জাহান্নামের ভয়ে কাঁদতে কাঁদতে বেহুশ', 'জাহান্নামের ভয়ানক আযাব', 'চরমোনাই_ফয়জুল_করিম', '1fOHxVZyqWVuLATA.mp3', '<p>\r\n\r\n<em>কাঁদতে</em>&nbsp;আপনাকে হবেই ১০০% । <em>জাহান্নামের</em>&nbsp;ভয়ানক আযাব । New <em>Waz</em>&nbsp;2018 । Mufti Foyzul Karim বয়ান করছেন ঃ বাংলার জিন্দা শাহ জালাল, লক্ষ-কোটি মানুষের প্রিয় রাহবার শায়েখ মুফতি ফয়জুল করীম (দা.বা.) <em>ওয়াজটি</em>&nbsp;ভালো লাগলে লাইক দিয়ে ফেসবুকে শেয়ার করার অনুরোধ রইলো।\r\n\r\n<br></p>', 'fF7Hg02n55coihUq.jpg', '1', 1, '2019-09-02 05:19:11', '2019-09-13 05:20:18'),
(3, 'ওয়াজটি কাঁদতে বাধ্য হবেন', NULL, NULL, 'XhOgTRotsKlbsd6D.mp3', NULL, 'zg7nIfY3a0WBMqyn.jpg', '1', 1, '2019-09-02 05:19:18', '2019-09-13 05:10:33'),
(4, 'হেদায়েত পেল লক্ষ লক্ষ যুবক', NULL, NULL, 'SpdmwNbEGym6a5pS.mp3', NULL, 'UDP09IHQuFnuBY2b.jpg', '1', 1, '2019-09-09 00:49:09', '2019-09-13 05:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posted_by_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `posted_by_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Interdum et malesuada', '<p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>', 'iUMz2FDdYHR00Ci6.jpg', '1', 1, '2019-08-23 14:22:37', '2019-08-31 07:57:35'),
(3, 'Nam tincidunt vulputate felis', '<p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>', 'KrgIkBV8hBoc2UMZ.jpg', '1', 1, '2019-08-31 05:36:18', '2019-08-31 05:37:43'),
(4, 'প্রোগ্রামিং ল্যাংগুয়েজ', '<blockquote>\r\n<p>আসসালামু আলাইকুম। আজকেই আমার প্রথম পোস্ট। &nbsp;আজ প্রোগ্রামিং নিয়ে কিছু কথা বলব ...প্রোগ্রামিং কথাটা শুনতে কেমন যেন তাই না?&nbsp;আসলে প্রোগ্রামিংটা কি? কেন প্রোগ্রামিং শিখব ?&nbsp;</p>\r\n</blockquote>\r\n\r\n<pre>\r\nপ্রোগ্রামিং হল প্রোগ্রাম বানানো বা সফটওয়্যার বানানো কিংবা কম্পিউটার এর জন্য বানানো ছোট একটা টুলস যা আমরা অনেক কিছু করতে পারি  এটিই হচ্ছে প্রোগ্রামিং এর বেসিক সংজ্ঞা। প্রোগ্রামিং ল্যাংগুয়েজ হল আমরা যা দিয়ে প্রোগ্রাম বানাব । প্রোগ্রাম বানিয়ে আমরা অনেক কিছু করতে পারি  যেমন, সফটওয়্যার বানাতে পারি, ফ্রিলেন্সিং করতে পারি ,গানিতিক যেকোন সমস্যা সমাধান করতে পারি,নিজের প্রয়োজন মত সব কিছু করতে পারি ।\r\n\r\nপ্রোগ্রামিং কেন শিখব ? সব চেয়ে বড় কথা হল  &lt;&lt; প্রোগ্রামিং দারুণ মজার জিনিস&gt;&gt; প্রোগ্রামিং শিখতে গেলে আমাদের অনেক প্রোগ্রামিং ল্যাংগুয়েজ জানতে হবে । যেমনঃ সি, সি++,জাভা,পাইথন আরও অনেক রয়েছে।  প্রোগ্রামিং এর  আর একটা বড় পয়েন্ট হল কিছুতেই বোরিং লাগে না ,কেননা এটার মাঝে মাঝে অন্য রকম একটা শক্তি পাওয়া যায়। এই জন্য প্রোগ্রামিংগুলো জানা থাকলে আমরা বাস্তব জীবনে অনেক কিছু শিখতে পারব। এবং আমাদের জীবনে অনেক কাজে লাগবে । আর দেরি না করে আজ থেকে প্রোগ্রামিং শুরু করি।</pre>', 'v8WI8ql4S78INKGI.jpg', '1', 1, '2019-08-31 06:57:47', '2019-08-31 06:57:47'),
(5, 'What is Bootstrap?', '<p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>', 'ME2QPKZ9YABuQqGb.jpg', '1', 1, '2019-08-31 07:58:42', '2019-08-31 07:58:42'),
(6, 'Etiam eros massa', '<p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>', '1qp5BrEH4V4loSST.jpg', '1', 1, '2019-08-31 07:59:36', '2019-08-31 07:59:36'),
(7, 'Post with image', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>', 'dcGNwKv3eq2q4h5O.jpg', '1', 1, '2019-09-03 09:40:56', '2019-09-03 09:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posted_by_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `title`, `sub_title`, `author`, `pdf_file`, `description`, `image1`, `image2`, `image3`, `posted_by_id`, `status`, `created_at`, `updated_at`) VALUES
(8, 6, 'Creating Your Own Destiny', 'International Bestseller Creating Your Own Destiny', 'Brian Tracy', 'Pb2ytOO3EuL1sLRj.pdf', '<p>Creating-Your-Own-Destiny-_-E-Book-_-9th-Edition-_-April-2009<br></p>', 'XygQGaFLtUvCZJwM.jpg', 'uzg79dmsP7brAqkY.jpg', NULL, '1', 0, '2019-07-24 00:56:13', '2019-09-16 13:37:22'),
(9, 6, 'A Blogger Prize', 'How we can do better then the competition', NULL, '4OosR6p4maZRAJIp.pdf', NULL, 'Svr7bRltnyICUb9V.jpg', NULL, NULL, '1', 0, '2019-09-09 00:26:52', '2019-09-16 13:37:23'),
(10, 6, 'The Cettysburc Address', 'How we can do better then the competition', NULL, 'wMde7yMKseKo3g8c.pdf', NULL, 'YgWb7MOB5LyjpVY8.jpg', NULL, NULL, '1', 1, '2019-09-09 00:30:22', '2019-09-09 00:30:22'),
(11, 15, 'Harry Potter', 'Harry potter and deathly hallows', NULL, 'GDnFkUmXpJPDv3h9.pdf', '<p>Harry potter and deathly hallows<br></p>', 'lCoFdXYOOBQ7QUNx.jpg', 'r4wqsQ1tWC524Aa6.jpg', 'sxNhgq19NQb9xwrV.jpg', '1', 1, '2019-09-09 00:36:48', '2019-09-09 00:36:48'),
(12, 6, 'SHAPING HUMANITY', 'How science , art and imagination help us understand our origins', NULL, 'dJtOxhwoLu9B76y9.pdf', '<p>How science , art and imagination help us understand our origins<br></p>', 'G8Xf4IXVu3HNbAzn.jpg', NULL, '69gpCPP9qV4S3Zwo.jpg', '1', 1, '2019-09-09 00:40:41', '2019-09-09 00:40:41'),
(16, 2, 'Music Fundamentals 2 Rhythm and Meter', 'Music Fundamentals 2 Rhythm and Meter – middle-grade music theory', 'Terry B. Ewell', '1A6kQYc38Rc7PdY3.pdf', '<p>\r\n\r\n</p><div><div><p>Categories: <a target=\"_blank\" rel=\"nofollow\" href=\"https://freekidsbooks.org/age-group/stories-for-age-10-13/\">Age 10-13 years</a>, <a target=\"_blank\" rel=\"nofollow\" href=\"https://freekidsbooks.org/all-fkb-books/\">All FKB Books</a>, <a target=\"_blank\" rel=\"nofollow\" href=\"https://freekidsbooks.org/license/creative-commons/\">Creative Commons</a>, <a target=\"_blank\" rel=\"nofollow\" href=\"https://freekidsbooks.org/english_level_esl/fluent-english/\">Fluent English</a>, <a target=\"_blank\" rel=\"nofollow\" href=\"https://freekidsbooks.org/grade/grade-4-to-grade-6/\">Grade 4 to Grade 6</a>, <a target=\"_blank\" rel=\"nofollow\" href=\"https://freekidsbooks.org/grade/grade-7/\">Grade 7+</a>, <a target=\"_blank\" rel=\"nofollow\" href=\"https://freekidsbooks.org/subject/music/\">Music</a>, <a target=\"_blank\" rel=\"nofollow\" href=\"https://freekidsbooks.org/reading-level/older-children/\">Older Children</a></p></div></div><div><p></p><p>Music Fundamentals Rhythm and Meter is the second book in the introductory music theory textbooks, perfect for beginners. This book includes practice exercises and so makes a nice workbook for school, homeschool, or music teachers. The level of this book makes it suitable for middle grades but can be used as a reference for any …</p></div>\r\n\r\n<br><p></p>', '7w4xDkc2pR3YEX0F.jpg', NULL, NULL, '1', 1, '2019-09-13 03:41:41', '2019-09-13 03:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Books', 'books', 'book', 1, NULL, '2019-06-24 20:56:27', '2019-06-24 20:56:27'),
(2, 1, 'Art & Music', 'Art & Music Book', 'Art & Music', 1, NULL, '2019-06-24 20:57:46', '2019-08-30 00:32:25'),
(5, 1, 'Biographies', 'Biographies Books', 'Biographies', 1, NULL, '2019-07-30 02:20:04', '2019-08-30 00:36:50'),
(6, 1, 'Business', 'Business Books', 'Business', 1, NULL, '2019-07-30 02:21:34', '2019-08-30 00:38:23'),
(7, 1, 'Kids', 'Kids', 'Kids', 1, NULL, '2019-08-30 00:38:49', '2019-08-30 00:38:49'),
(8, 1, 'Comics', 'Comics', 'Comics', 1, NULL, '2019-08-30 00:39:03', '2019-08-30 00:39:03'),
(9, 1, 'Computers & Tech', 'Computers & Tech', 'Computers & Tech', 1, NULL, '2019-08-30 00:40:37', '2019-08-30 00:40:37'),
(10, 1, 'Cooking', 'Cooking', 'Cooking', 1, NULL, '2019-08-30 00:40:54', '2019-08-30 00:40:54'),
(11, 1, 'Hobbies & Crafts', 'Hobbies & Crafts', 'Hobbies & Crafts', 1, NULL, '2019-08-30 00:41:08', '2019-08-30 00:41:08'),
(12, 1, 'Edu & Reference', 'Edu & Reference', 'Edu & Reference', 1, NULL, '2019-08-30 00:41:22', '2019-08-30 00:41:22'),
(13, 1, 'Gay & Lesbian', 'Gay & Lesbian', 'Gay & Lesbian', 1, NULL, '2019-08-30 00:41:42', '2019-08-30 00:41:42'),
(14, 1, 'Health & Fitness', 'Health & Fitness', 'Health & Fitness', 1, NULL, '2019-08-30 00:45:30', '2019-08-30 00:45:30'),
(15, 1, 'History', 'History', 'History', 1, NULL, '2019-08-30 00:48:12', '2019-08-30 00:48:12'),
(16, 1, 'Home & Garden', 'Home & Garden', 'Home & Garden', 1, NULL, '2019-08-30 00:49:02', '2019-08-30 00:49:02'),
(17, 1, 'Horror', 'Horror', 'Horror', 1, NULL, '2019-08-30 00:49:42', '2019-08-30 00:49:42'),
(18, 1, 'Entertainment', 'Entertainment', 'Entertainment', 1, NULL, '2019-08-30 00:49:59', '2019-08-30 00:49:59'),
(19, 1, 'Literature & Fiction', 'Literature & Fiction', 'Literature & Fiction', 1, NULL, '2019-08-30 00:50:16', '2019-08-30 00:50:16'),
(20, 1, 'Medical', 'Medical', 'Medical', 1, NULL, '2019-08-30 00:50:36', '2019-08-30 00:50:36'),
(21, 1, 'Mysteries', 'Mysteries', 'Mysteries', 1, NULL, '2019-08-30 00:50:49', '2019-08-30 00:50:49'),
(22, 1, 'Parenting', 'Parenting', 'Parenting', 1, NULL, '2019-08-30 00:51:06', '2019-08-30 00:51:06'),
(23, 1, 'Social Sciences', 'Social Sciences', 'Social Sciences', 1, NULL, '2019-08-30 00:51:25', '2019-08-30 00:51:25'),
(24, 1, 'Religion', 'Religion', 'Religion', 1, NULL, '2019-08-30 00:51:40', '2019-08-30 00:51:40'),
(25, 1, 'Romance', 'Romance', 'Romance', 1, NULL, '2019-08-30 00:51:58', '2019-08-30 00:51:58'),
(26, 1, 'Science & Math', 'Science & Math', 'Science & Math', 1, NULL, '2019-08-30 00:52:14', '2019-08-30 00:52:14'),
(27, 1, 'Sci-Fi & Fantasy', 'Sci-Fi & Fantasy', 'Sci-Fi & Fantasy', 1, NULL, '2019-08-30 00:52:41', '2019-08-30 00:52:41'),
(28, 1, 'Self-Help', 'Self-Help', 'Self-Help', 1, NULL, '2019-08-30 00:52:57', '2019-08-30 00:52:57'),
(29, 1, 'Sports', 'Sports', 'Sports', 1, NULL, '2019-08-30 00:53:11', '2019-08-30 00:53:11'),
(30, 1, 'Teen', 'Teen', 'Teen', 1, NULL, '2019-08-30 00:53:25', '2019-08-30 00:53:25'),
(31, 1, 'Travel', 'Travel', 'Travel', 1, NULL, '2019-08-30 00:53:40', '2019-08-30 00:53:40'),
(32, 1, 'True Crime', 'True Crime', 'True Crime', 1, NULL, '2019-08-30 00:53:55', '2019-08-30 00:53:55'),
(33, 1, 'Westerns', 'Westerns', 'Westerns', 1, NULL, '2019-08-30 00:54:09', '2019-08-30 00:54:09'),
(34, 0, 'Products', 'dee', 'gfg', 1, NULL, '2019-10-11 07:42:51', '2019-10-11 07:42:51'),
(35, 34, 'Camera', 'dd', 'dd', 1, NULL, '2019-10-11 07:43:21', '2019-10-11 07:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `book_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2019-09-08 05:08:32', '2019-09-08 05:08:32'),
(8, 9, 1, '2019-09-11 02:55:18', '2019-09-11 02:55:18'),
(9, 12, 1, '2019-09-11 05:32:07', '2019-09-11 05:32:07'),
(10, 11, 1, '2019-09-13 07:38:00', '2019-09-13 07:38:00');

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
(3, '2019_05_12_101821_create_admins_table', 1),
(4, '2019_05_19_184302_create_categories_table', 2),
(5, '2019_05_23_180301_create_books_table', 3),
(6, '2019_08_23_055455_create_audio_table', 4),
(7, '2019_08_23_141443_create_videos_table', 5),
(8, '2019_08_23_153336_create_blogs_table', 6),
(10, '2019_09_03_061100_create_reviews_table', 7),
(11, '2019_09_03_145455_create_downloads_table', 8);

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `post_id`, `table_name`, `user_id`, `summery`, `review`, `created_at`, `updated_at`) VALUES
(1, 8, 'books', '1', 'Book review', 'After the book I can learn something.', '2019-09-03 03:25:07', '2019-09-03 03:25:07'),
(2, 6, 'blogs', '1', 'Book review', 'Thanks Marcus for the suggestions. I hadn\'t given much thought in how to craft my own blog entries in order to encourage responses. Yet, the goal is to generate followers and develop interactions so this makes perfect sense. I\'ll definitely incorporate some of these suggestions into my future writings.', '2019-09-03 04:03:11', '2019-09-03 04:03:11'),
(3, 8, 'books', '1', 'Positive reviews about this book.', 'The contents of the book were very good. It has been of great benefit to me to get the book.', '2019-09-03 04:23:44', '2019-09-03 04:23:44'),
(4, 8, 'books', '1', 'The book was very good.', 'After the book I can learn something. It was great You can see the book later.', '2019-09-03 04:27:34', '2019-09-03 04:27:34'),
(5, 1, 'audios', '1', 'The audio was very good.', 'Helpful audio', '2019-09-03 06:54:33', '2019-09-03 06:54:33'),
(6, 2, 'audios', '1', 'The audio was very good.', 'great', '2019-09-03 07:17:18', '2019-09-03 07:17:18'),
(7, 3, 'videos', '1', 'The video was very good.', 'great', '2019-09-03 07:38:52', '2019-09-03 07:38:52'),
(8, 12, 'books', '1', 'The book was very good.', ':) :)', '2019-09-11 03:05:23', '2019-09-11 03:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `download_limitation` int(11) NOT NULL DEFAULT '6'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `download_limitation`) VALUES
(1, 'Ashikur', 'ashik@gmail.com', '01731002123', 'O1irTCnESivnhXoj.jpg', NULL, '$2y$10$UNLZbz3mAilDqo5W/V/IlegwJzZX20WG4ki3C3gsi4.g9g/6L.89i', NULL, '2019-05-17 14:51:46', '2019-05-23 12:38:24', 6),
(2, 'Mr. X', 'xyz@test.com', NULL, NULL, NULL, '$2y$10$vSoms7OXhMjdfBZ9Cb6KF.QFo0.CozLpbc428eFOfJR9tNUPQxn2G', NULL, '2019-09-17 21:43:48', '2019-09-17 21:43:48', 6),
(3, 'MAHMUDA KHATUN', 'cosmic@gmail.com', NULL, NULL, NULL, '$2y$10$kABdq0eGPi/to6zacU4AfugvnNkbI4vEYlsgUYzTxJaWkYXaZoT6i', NULL, '2019-09-17 21:47:17', '2019-09-17 21:47:17', 6),
(4, 'Mr. Y', 'qwe@test.com', NULL, NULL, NULL, '$2y$10$SoQSxVJsCDnSIQ9PNRjQV.RY6GeRM0IBWwo0khfW.V64uDoObY9nS', NULL, '2019-09-17 21:48:03', '2019-09-17 21:48:03', 6),
(5, 'Rafia', 'rafia@gmail.com', '01731002125', 'FWjVP8wLeKQt6JTh.jpg', NULL, '$2y$10$ayW5RE3zEHmtdQiDVkhshuCPP86W8D8DbFWisPmhCS/ScNYx6NknW', NULL, '2019-10-06 23:40:02', '2019-10-07 00:02:48', 6);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posted_by_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `sub_title`, `author`, `video_url`, `description`, `image`, `posted_by_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Sonnet-130 by William Shakespeare', 'বাংলা লেকচার | Bengali Lecture', 'Cloud School Pro', '<iframe width=\"714\" height=\"402\" src=\"https://www.youtube.com/embed/afxHSw0tpt0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<p>\r\n\r\nCloud School Pro ইংলিশ ডিপার্টমেন্টের স্টুডেন্ট + যারা ইংরেজি নিয়ে জানতে আগ্রহী - তাদের জন্য অনেক কার্যকরী একটি ইউটিউব চ্যানেল ।এখানে অনার্স প্রথম + ২য় + ৩য় + চতুর্থ বর্ষের সকল কবিতা+প্রবন্ধ+ফিগার অফ স্পিঅ+স্কানশন ও আরও অনেক টুকিটাকি বিষয়ের ওপর লেকচার পাওয়া যাবে । এখানে গ্রামারের সল্যুশন ও কম্পিউটার- এর বিভিন্ন স্কিল নিয়েও লেকচার রয়েছে।<br><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.youtube.com/channel/UCnZ0Yu6LeikZdr4vERDYwPA%EF%BB%BF?fbclid=IwAR3dN0mcFvLYfqE8c4fHcr-SpqojflrdIqeZPgZrynS1pY-aHn6bzEhlu2c\">https://www.youtube.com/channel/UCnZ0Yu6LeikZdr4vERDYwPA</a>\r\n\r\n<br></p>', 'vPOMREUy0azQitUd.jpg', '1', 1, '2019-09-08 23:46:29', '2019-09-13 05:27:05'),
(5, 'She Walks in Beauty by Lord Byron', 'বাংলা লেকচার | Bengali Lecture', 'Cloud School Pro', '<iframe width=\"852\" height=\"480\" src=\"https://www.youtube.com/embed/xzrGOU_MGsk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<p>She Walks in Beauty by Lord Byron |&nbsp;বাংলা লেকচার | Bengali Lecture<br></p>', 'I9tZTBjZWj1snMTa.jpg', '1', 1, '2019-09-08 23:47:54', '2019-09-08 23:47:54'),
(6, 'Difference Between CV and Resume', 'বাংলা লেকচার | Bengali Lecture', 'Cloud School Pro', '<iframe width=\"852\" height=\"480\" src=\"https://www.youtube.com/embed/3CaeoP4uwM8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<h1><b><small></small></b></h1>\r\n\r\nCloud School Pro ইংলিশ ডিপার্টমেন্টের স্টুডেন্ট + যারা ইংরেজি নিয়ে জানতে আগ্রহী - তাদের জন্য অনেক কার্যকরী একটি ইউটিউব চ্যানেল ।এখানে অনার্স প্রথম + ২য় + ৩য় + চতুর্থ বর্ষের সকল কবিতা+প্রবন্ধ+ফিগার অফ স্পিঅ+স্কানশন ও আরও অনেক টুকিটাকি বিষয়ের ওপর লেকচার পাওয়া যাবে । এখানে গ্রামারের সল্যুশন ও কম্পিউটার- এর বিভিন্ন স্কিল নিয়েও লেকচার রয়েছে।<br><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.youtube.com/channel/UCnZ0Yu6LeikZdr4vERDYwPA%EF%BB%BF?fbclid=IwAR3dN0mcFvLYfqE8c4fHcr-SpqojflrdIqeZPgZrynS1pY-aHn6bzEhlu2c\">https://www.youtube.com/channel/UCnZ0Yu6LeikZdr4vERDYwPA</a>\r\n\r\n<br>', 'L7JmrzOyRmPGGgYp.jpg', '1', 1, '2019-09-08 23:49:19', '2019-09-13 05:30:53'),
(8, 'How to Write Press Release', 'বাংলা লেকচার | Bengali Lecture', 'Cloud School Pro', '<iframe width=\"852\" height=\"480\" src=\"https://www.youtube.com/embed/jiHjK9OL67M\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<p>\r\n\r\n</p><p><b></b><i></i>\r\n\r\n</p><p>How to Write Press Release</p><b></b><p></p><p></p>\r\n\r\n |&nbsp;বাংলা লেকচার | Bengali Lecture<br>', 'fXAxo2tjG8JqnXCt.jpg', '1', 1, '2019-09-09 00:05:07', '2019-09-12 22:58:56'),
(9, 'How to Write Meeting Minutes', 'বাংলা লেকচার | Bengali Lecture', 'Cloud School Pro', '<iframe width=\"852\" height=\"480\" src=\"https://www.youtube.com/embed/P0-zdiZhQXQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<p>\r\n\r\n</p><p><b></b><i></i>\r\n\r\n</p><p>\r\n\r\n</p><p></p>\r\n\r\nCloud School Pro ইংলিশ ডিপার্টমেন্টের স্টুডেন্ট + যারা ইংরেজি নিয়ে জানতে আগ্রহী - তাদের জন্য অনেক কার্যকরী একটি ইউটিউব চ্যানেল ।এখানে অনার্স প্রথম + ২য় + ৩য় + চতুর্থ বর্ষের সকল কবিতা+প্রবন্ধ+ফিগার অফ স্পিঅ+স্কানশন ও আরও অনেক টুকিটাকি বিষয়ের ওপর লেকচার পাওয়া যাবে । এখানে গ্রামারের সল্যুশন ও কম্পিউটার- এর বিভিন্ন স্কিল নিয়েও লেকচার রয়েছে।<br><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.youtube.com/channel/UCnZ0Yu6LeikZdr4vERDYwPA%EF%BB%BF?fbclid=IwAR3dN0mcFvLYfqE8c4fHcr-SpqojflrdIqeZPgZrynS1pY-aHn6bzEhlu2c\">https://www.youtube.com/channel/UCnZ0Yu6LeikZdr4vERDYwPA</a>\r\n\r\n<br>', 'T8gCDJONX8nWtMJx.jpg', '1', 1, '2019-09-09 00:08:29', '2019-09-13 05:26:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
