-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 05:23 AM
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
-- Database: `realtime_chat_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `Friend_id` bigint(20) UNSIGNED NOT NULL,
  `User1` varchar(255) NOT NULL,
  `User2` varchar(255) NOT NULL,
  `Last_message` varchar(5000) DEFAULT NULL,
  `Message_date` date DEFAULT NULL,
  `blocked_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`Friend_id`, `User1`, `User2`, `Last_message`, `Message_date`, `blocked_by`) VALUES
(1, '1', '2', NULL, NULL, NULL),
(4, '5', '6', NULL, NULL, NULL),
(5, '6', '7', NULL, NULL, NULL),
(13, '33', '40', NULL, NULL, NULL),
(14, '1', '33', NULL, NULL, NULL),
(15, '1', '40', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Sender_id` varchar(255) NOT NULL,
  `Reciver_id` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Deleted_by` int(255) NOT NULL DEFAULT 0,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Sender_id`, `Reciver_id`, `Message`, `created_at`, `updated_at`, `Deleted_by`, `id`) VALUES
('1', '37', 'k xa', '2023-09-11 10:31:22', '2023-09-11 10:31:22', 0, 145),
('37', '1', 'k d', '2023-09-11 10:31:33', '2023-09-11 10:31:33', 0, 146),
('37', '1', 'ho ho', '2023-09-11 10:33:06', '2023-09-11 10:33:06', 0, 147),
('37', '1', 'd', '2023-09-11 10:33:29', '2023-09-11 10:33:29', 0, 148),
('37', '1', 'dff', '2023-09-11 10:33:30', '2023-09-11 10:33:30', 0, 149),
('37', '1', 'f', '2023-09-11 10:33:30', '2023-09-11 10:33:30', 0, 150),
('37', '1', 'f', '2023-09-11 10:33:31', '2023-09-11 10:33:31', 0, 151),
('37', '1', 'f', '2023-09-11 10:33:32', '2023-09-11 10:33:32', 0, 152),
('37', '1', 'f', '2023-09-11 10:33:33', '2023-09-11 10:33:33', 0, 153),
('37', '1', 'f', '2023-09-11 10:33:34', '2023-09-11 10:33:34', 0, 154),
('37', '1', 'f', '2023-09-11 10:33:34', '2023-09-11 10:33:34', 0, 155),
('37', '1', 'f', '2023-09-11 10:33:35', '2023-09-11 10:33:35', 0, 156),
('37', '1', 's', '2023-09-11 10:33:35', '2023-09-11 10:33:35', 0, 157),
('37', '1', 'f', '2023-09-11 10:33:36', '2023-09-11 10:33:36', 0, 158),
('37', '1', 's', '2023-09-11 10:33:37', '2023-09-11 10:33:37', 0, 159),
('37', '1', 'h', '2023-09-11 10:33:37', '2023-09-11 10:33:37', 0, 160),
('37', '1', 'g', '2023-09-11 10:33:38', '2023-09-11 10:33:38', 0, 161),
('37', '1', 'f', '2023-09-11 10:33:38', '2023-09-11 10:33:38', 0, 162),
('37', '1', 's', '2023-09-11 10:33:38', '2023-09-11 10:33:38', 0, 163),
('37', '1', 't', '2023-09-11 10:33:39', '2023-09-11 10:33:39', 0, 164),
('37', '1', 'f', '2023-09-11 10:33:39', '2023-09-11 10:33:39', 0, 165),
('37', '1', 'f', '2023-09-11 10:33:40', '2023-09-11 10:33:40', 0, 166),
('39', '1', 'k xa', '2023-09-13 09:25:32', '2023-09-13 03:56:16', 39, 167),
('1', '39', 'ma g', '2023-09-13 09:25:53', '2023-09-13 03:56:16', 39, 168),
('1', '39', 'g', '2023-09-13 09:25:54', '2023-09-13 03:56:16', 39, 169),
('39', '1', 'fgfg', '2023-09-13 09:26:05', '2023-09-13 03:56:16', 39, 170),
('39', '1', 'gf', '2023-09-13 09:26:06', '2023-09-13 03:56:16', 39, 171),
('39', '1', 'f', '2023-09-13 09:26:06', '2023-09-13 03:56:16', 39, 172),
('39', '1', 'gf', '2023-09-13 09:26:06', '2023-09-13 03:56:16', 39, 173),
('39', '1', 'fg', '2023-09-13 09:26:07', '2023-09-13 03:56:16', 39, 174),
('39', '1', 'f', '2023-09-13 09:26:07', '2023-09-13 03:56:16', 39, 175),
('39', '1', 'f', '2023-09-13 09:26:07', '2023-09-13 03:56:16', 39, 176),
('39', '1', 'h', '2023-09-13 09:26:08', '2023-09-13 03:56:16', 39, 177),
('1', '39', 'df', '2023-09-13 09:26:10', '2023-09-13 03:56:16', 39, 178),
('1', '39', 'df', '2023-09-13 09:26:11', '2023-09-13 03:56:16', 39, 179),
('1', '39', 'd', '2023-09-13 09:26:11', '2023-09-13 03:56:16', 39, 180),
('1', '39', 'dg', '2023-09-13 09:26:11', '2023-09-13 03:56:16', 39, 181),
('1', '39', 'd', '2023-09-13 09:26:11', '2023-09-13 03:56:16', 39, 182),
('1', '3', 'k xa', '2023-09-25 07:37:46', '2023-09-25 07:37:46', 0, 183),
('1', '3', 'sanchai ho', '2023-09-25 07:37:51', '2023-09-25 07:37:51', 0, 184),
('3', '1', 'chill ho timro k xa', '2023-09-25 07:39:44', '2023-09-25 07:39:44', 0, 185),
('1', '3', 'ma ni bawal ho', '2023-09-25 07:40:05', '2023-09-25 07:40:05', 0, 186),
('1', '3', 'aaru vana', '2023-09-25 07:40:13', '2023-09-25 07:40:13', 0, 187),
('1', '37', 'hlo', '2023-10-04 03:11:10', '2023-10-04 03:11:10', 0, 188),
('37', '1', 'hi', '2023-10-04 03:11:27', '2023-10-04 03:11:27', 0, 189),
('1', '33', 'hlo', '2023-10-04 03:14:33', '2023-10-03 21:44:51', 1, 190),
('1', '33', 'hlo', '2023-10-04 03:14:39', '2023-10-03 21:44:51', 1, 191),
('33', '40', 'hlo', '2023-10-09 08:39:05', '2023-10-09 08:39:05', 0, 197),
('1', '40', 'hlo', '2023-10-09 08:41:01', '2023-10-25 00:34:07', 1, 198),
('40', '1', 'hlo', '2023-10-09 08:41:14', '2023-10-25 00:34:07', 1, 199),
('40', '1', '😒😂😂', '2023-10-09 08:41:25', '2023-10-25 00:34:07', 1, 200),
('1', '40', 'fvfh', '2023-10-25 06:03:57', '2023-10-25 00:34:07', 1, 201);

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_08_11_043812_create_user__data', 1),
(3, '2023_08_11_043827_create_friends', 1),
(4, '2023_08_11_043835_create_message', 1),
(5, '2023_08_11_043845_create_request', 1),
(6, '2023_08_15_121140_create_contact', 2);

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
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Sender_id` varchar(255) NOT NULL,
  `Reciver_id` varchar(255) NOT NULL,
  `Request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user__data`
--

CREATE TABLE `user__data` (
  `User_id` int(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `D/O/B` varchar(255) DEFAULT NULL,
  `Bio` varchar(255) DEFAULT NULL,
  `Picture` varchar(255) NOT NULL DEFAULT 'Deafult.jpg',
  `Status` varchar(255) NOT NULL DEFAULT 'Inactive',
  `Privacy` varchar(255) NOT NULL DEFAULT 'Public'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user__data`
--

INSERT INTO `user__data` (`User_id`, `created_at`, `updated_at`, `Name`, `Email`, `Password`, `Address`, `Gender`, `D/O/B`, `Bio`, `Picture`, `Status`, `Privacy`) VALUES
(1, NULL, '2023-09-11 01:56:42', 'Krishnu Gupta', 'kgupta750@rku.ac.in', 'Krishnu@123', 'Rku', 'Male', '[value-9]', '[value-10]', 'users/on.jpg', 'Normal', 'Public'),
(3, NULL, NULL, 'Roman', 'GJbA@gmail.com', '123', 'agiI2ns6w0', 'Male', 'jack', 'XdQ9oLL8sPnuwZraIOYS4c36BmvtaPKQv0u6rNMZ1yRHDE1TmuHrnDa5WOls2zXgLdRNoiUdrGIJMJfBH91LNVC10n7sVpYQV9JgDm8facfTnHjqASzIBgSZ5OKvMrBfjP9GKvyLYvd35JjTyT52VkNgSiqUws6RJBlooxETcvY0vrvwr26YiBUK7UmYLMTI5DPpMrnB', 'Deafult.png', 'Active', 'Public'),
(4, NULL, NULL, 'Sanjay Chapari', 'O4Ub@gmail.com', '$2y$10$ecvlWaGz7aah8bCjBd6ACut0GLLB/TZewLnKzlfAMfC8c95zNUzZu', 'wadV1oKf7E', 'Male', 'jack', 'UjViTnWrRL9PzonQYd16T3fCN6fCk6v0oN5MMnzjVlGofhOCLNj2bUUnnsPslPUCUnV6yvXMvg5WG99TztGf223CgtnX5GV84S7qn1fp6l7a1puiTwT1Tm1Oqb5URwGtyeAp5TGoICybWQb0OAO2Fly42mWsZAYdQ8f0rKG7dSjhZ4Yv3qKsTuZFPsl9sIShNQtffpKQ', 'Deafult.png', 'Active', 'Public'),
(5, NULL, NULL, 'QqAxTmkCUJ', 'H1ex@gmail.com', '$2y$10$7sLsdVN97yCUApDdONW5SeisvBDwBatCgrJplxTy6CRjHuDzTmJ7.', '6M30u8DoIV', 'Male', 'jack', 'wRpkZbh5PbMiaGhSm1UlZfVFXTZSgDikIxUxDzIaRhbcgky8rjsXEdUeVKDbzk71uWea1EoTyIjFAYNI4sutjkhqHdByefmK8gx4gOcwtosnPtpEh7A2OfvgoBmSv9PT52ohaAw285LzieNWar9f3mOhFupv6EpGn46mLtfcLIAMzPxvFxYgVO2Wu4L818xu7bdPUySc', 'Deafult.png', 'Active', 'Public'),
(6, NULL, NULL, 'cx1lUI8iCL', 'tOy0@gmail.com', '$2y$10$UAv9FvIuTHySntkiNT9qNerwRxHeMZcN6Z2cpqXY6ChMbO7/.9QOC', 'GPR1k8R7Wp', 'Male', 'jack', 'F3Wxcqkjgd5DoTND9CMa5ZrGaeSZeUkXkH1xBNUFPXw6P6oevbYQzQHlBly8RqkEAdQLcsvZzdNi74kQjrivAguZQwHHTfA24m1jzFxBbhEMhdhC3Exzfi6q4Zg3XwvLcZUxSGXblMgTsX6IlxNUgbNU5RCihuVoJlY2kfc5JpJKe1uyKUsyBRI4tlnreI6QM3RtuGn6', 'Deafult.png', 'Active', 'Public'),
(7, NULL, NULL, 'kamari', 'LAtO@gmail.com', '$2y$10$m9TuSDZIXn72l2dUFByD0eteIvB.b9kfhUPUFV0hHsMsEdeC8WmM6', 'qwjNCjQc0u', 'Male', 'jack', 'TCUcgscGUcN2QelvE46C8mZhJR3BgdHQkYJgE9UVTeQMAsHSZwVPJVt5xGbKN0mNoxTPyvwBnZp2dzZ0s95MA69VtRgwk9ujETK8KPyfGAR63JY56qUJHaRM16V0PvJa3DuEWkNmCZdSsOy40QXN8qym5TbqQ4WPJMplOD1JvYRnUjp9gFYaF6wXnARzcZJddStJ2Mbq', 'Deafult.png', 'Active', 'Public'),
(33, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Check', 'check@gmail.com', 'huha', 'thaxaina', 'abhay', '12', 'My name is jack i am from new york,and heheheehehe tttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'Deafult.png', 'Inactive', 'Public'),
(34, NULL, NULL, 'IjOSorngix', 'Q7lk@gmail.com', '$2y$10$dPt9cC3zrYjDPE14zmEAq.r.LzkozYUe1A6tW4gJ3DkcTqhttZ9pa', 'vc7lK6MubH', 'Male', 'jack', 'eToTRQPV06Zd4sZnRQeOSzVzlEnngb8eHamPuHYijPu0jDN5hlXIsHWRhya76ehvE3PoMZfGrEEgrAa3fcIeUksYpc3Q0b1vwRMEYqdbrvs71s1EnX1dGa1PPEI3K7e1E3V97IxBb2styiCtSQuyaQFr4iUr5H5wqXIFgXW8SKHFuilT0LZ2AHDIEtdgUacHOyIGqIg3', 'Deafult.png', 'Active', 'Public'),
(35, NULL, NULL, 'nK7q1T4lGe', '8ijJ@gmail.com', '$2y$10$hKZdRCmIjqgujc8JVbRHFeaT7qEFz5CV.p5wrWlhJEfiWNyVQUXk2', 'hmEgYhJoPS', 'Male', 'jack', 'M9JEl12aVknn6SeD11UeukBJuIPPJxZN1LcC9yP3OPrtJu6Rm0rsmmUjp1haa53BVQGCP7E32dZnoIGZ13t6sbd8u0SwOzO6KHWrKRvKL10TDie8pxErjWwX7FeOE0V0sYtmmkvyLajSe7DAnxioSiMkFf39R7xs9DSCKPJoN7Q6VWh44nsheGxAoPC1kwLj2BSMV1na', 'Deafult.png', 'Active', 'Public'),
(36, NULL, NULL, 'EXXJNVL2Z6', 'ldKl@gmail.com', '$2y$10$hJxUcX7sw23T1taZgD3cpuEPu9tY8vhB3wkiGsQ8uo8FxbULwPCH.', 'JZ0kzdNYkM', 'Male', 'jack', 'cDhe6Vyajl18wv6EZkfjtUfan9dsmi1FxJLn90ZtZpiIQUtv4VkVtGsniXce5DD2jXyDgJBQlih9Ha3fPlVpYYUuLrdqtEMhKegLlpnSGKTNPCkUHAn6ZCqJuPEHPVdj1ef8OB2k4K29R9GHDS1EBxASk3Ve6U01Uso3BfLrgjEdeUoqckbtU8rs7337bxFR8vswa2cr', 'Deafult.png', 'Active', 'Public'),
(37, '2023-08-22 07:15:44', '2023-08-22 07:15:44', 'jack', 'jack@gmail.com', 'Krishnu@123', NULL, NULL, NULL, NULL, 'users/jack.jpg', 'Active', 'Public'),
(39, '2023-09-13 09:17:09', '2023-09-13 03:54:54', 'Komal', 'komal@gmail.com', 'Komal@123', 'RKU', 'Female', '2005-03-13', 'komal', 'users/65017fe65a482_wallpaperflare.com_wallpaper (19).jpg', 'Active', 'Public'),
(40, '2023-10-06 04:44:12', '2023-10-05 23:16:48', 'Meera chauhan', 'meera508@gmail.com', 'Meera@123', 'rku', 'Female', '2006-06-07', 'meera', 'users/651f91380cfbf_wallpaperflare.com_wallpaper (17).jpg', 'Active', 'Public');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`Friend_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`Request_id`);

--
-- Indexes for table `user__data`
--
ALTER TABLE `user__data`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `user__data_email_unique` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `Friend_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `Request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user__data`
--
ALTER TABLE `user__data`
  MODIFY `User_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
