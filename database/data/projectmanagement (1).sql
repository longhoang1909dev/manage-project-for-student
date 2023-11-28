-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20231025.98b7f38d22
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 11:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `chat_sender` int(11) NOT NULL,
  `chat_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_rate`
--

CREATE TABLE `group_rate` (
  `rate_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `rate_noti` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_score` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_rate`
--

INSERT INTO `group_rate` (`rate_id`, `group_id`, `rate_noti`, `rate_score`, `created_at`, `updated_at`) VALUES
(1, 1, 'Can hoan thien tot hon', 10, '2023-11-14 07:58:58', '0000-00-00 00:00:00'),
(2, 2, 'tuan can cham chi hon', 9, NULL, NULL),
(3, 2, 'group tuan a', 1, NULL, NULL),
(4, 1, 'hoàn thành đi', 7, '2023-11-09 09:11:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_calender`
--

CREATE TABLE `meeting_calender` (
  `meeting_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `day` date DEFAULT NULL,
  `time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_group`
--

CREATE TABLE `member_group` (
  `member_group_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_group`
--

INSERT INTO `member_group` (`member_group_id`, `group_id`, `stu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL);

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
(63, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(64, '2023_11_07_022549_create_student_table', 1),
(65, '2023_11_07_030702_alter_student_table', 1),
(66, '2023_11_07_054835_create_teacher_table', 1),
(67, '2023_11_07_055353_create_student_skill_table', 1),
(68, '2023_11_07_055624_create_student_group_table', 1),
(69, '2023_11_07_060430_create_member_group_table', 1),
(70, '2023_11_07_060717_create_storage_file_table', 1),
(71, '2023_11_07_060917_create_group_rate_table', 1),
(72, '2023_11_07_061334_create_project_table', 1),
(73, '2023_11_07_061705_create_teacher_skill_table', 1),
(74, '2023_11_07_061812_create_chat_table', 1),
(75, '2023_11_07_062055_create_meeting_calender_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `t_id` int(11) NOT NULL,
  `p_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_request` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_major` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_quantity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `t_id`, `p_name`, `p_request`, `p_major`, `p_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lap tirnh web', 'ham hoc hoi', 'CNTT', '10', NULL, NULL),
(2, 1, 'Xe điều khiển từ xa', 'Học tập chăm chỉ', 'CNTT', '20', NULL, NULL),
(3, 2, 'Nghiên cứu An toàn bảo mật trong crypto', 'Biết các kiến thức về python và crypto', 'CNTT', '10', NULL, NULL),
(4, 1, 'Website quản lí đồ án', 'Biết về SQL', 'CNTT', '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `storage_file`
--

CREATE TABLE `storage_file` (
  `storage_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_file`
--

INSERT INTO `storage_file` (`storage_id`, `group_id`, `file`, `created_at`, `updated_at`, `file_title`, `stu_id`) VALUES
(1, 1, '1234.jpg', '2023-11-10 06:32:52', NULL, 'file1', 1),
(2, 1, '3.jpg', '2023-11-10 06:33:26', NULL, 'file2', 1),
(3, 1, 'Báo-cáo-web-nâng-cao.docx', '2023-11-10 06:39:22', NULL, 'this is third time test', 1),
(4, 1, 'Giáo trình Tư tưởng Hồ Chí Minh 2017.pdf', '2023-11-10 06:49:28', NULL, 'file test 4', 1),
(5, 1, 'Báo-cáo-ĐACS.pdf', '2023-11-10 07:25:39', NULL, 'fiel thu 5', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(10) UNSIGNED NOT NULL,
  `stu_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSSV` int(11) NOT NULL,
  `stu_avt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_phone` int(11) NOT NULL,
  `stu_major` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_nickname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_born` date NOT NULL,
  `stu_status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `role` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `t_id` int(11) DEFAULT NULL,
  `stu_leader` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_password`, `MSSV`, `stu_avt`, `stu_desc`, `stu_name`, `stu_phone`, `stu_major`, `stu_email`, `stu_nickname`, `stu_born`, `stu_status`, `role`, `group_id`, `created_at`, `updated_at`, `p_id`, `t_id`, `stu_leader`) VALUES
(1, '123456', 20010909, 'avatar.png', 'longhoang', 'Hoang hai Long', 90764536, 'CNTT', 'long@gmail.com', 'Longhoang', '2002-09-19', '4', '0', 1, NULL, NULL, 2, 1, 1),
(3, 'tuannguyen', 20010910, 'tuan.jpg', 'haha', 'Nguyen Viet Tuan', 87989793, 'CNTT', 'tuan@gmail.com', 'tuan so vo', '2002-09-03', '2', '0', 2, NULL, NULL, 2, 1, 1),
(4, '123456', 20010918, '3.jpg', 'day la nguio thu 3', 'Hoang duc huy', 9727189, 'CNTT', 'huy@gmail.com', 'huy xinh', '2002-09-18', '4', '0', 1, NULL, NULL, 2, 1, NULL),
(5, '123456', 20010903, '123.jpg', 'khog co gi ', 'Bui Khanh Huyen', 0, 'CNTT', 'huyen@gmail.com', 'huynn', '2002-09-18', '4', '0', 11, NULL, NULL, 2, 1, 1),
(6, '123456', 20010925, '1', 'hong ngoc day', 'Đỗ Hồng Ngọc', 987290872, 'CNTT', 'ngoc@gmail.com', 'HOng Ngoc', '2002-09-18', '4', '0', 12, NULL, NULL, 2, 1, 1),
(7, '123456', 20091021, 'tu', 'khong có gi', 'Hoàng Văn Thụ', 9091231, 'CNTT', 'thu@gmail.com', 'thu to bang canh tay', '2002-09-03', '1', '0', 0, NULL, NULL, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

CREATE TABLE `student_group` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `group_leader` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_avt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `group_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_request` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_group`
--

INSERT INTO `student_group` (`group_id`, `group_leader`, `group_avt`, `group_name`, `p_id`, `t_id`, `group_number`, `created_at`, `updated_at`, `group_request`, `group_quantity`) VALUES
(1, 'Hoang Hai Long', '123.png', 'Day la 1 group', 2, 1, 1, NULL, NULL, 'Cần lắm 1 bạn giỏi database', 1),
(2, 'Nguyen tuan', '123', 'Day la group cua tuan', 2, 1, 2, NULL, NULL, 'cần 1 bạn gánh mình hết', 1),
(3, 'cao thạch đức mạnh', '1', 'Đây là group của mạnh', 3, 2, 1, NULL, NULL, 'giỏi tiếng anh', 1),
(4, 'Bùi Khánh Huyền', '295828443_1464870653947887_1934853230498165422_n.png', 'nhóm khoogn cần biết', 2, 1, 3, NULL, NULL, 'Cần lắm 1 be', 2),
(5, 'Bùi Khánh Huyền2', 'fgbdr.jpg', 'nhóm nát', 2, 1, 4, NULL, NULL, 'Cần anh mạnh đz', 2),
(6, 'Bùi Khánh Huyền', '1234.jpg', 'nhóm nát bét', 2, 1, 5, NULL, NULL, 'Cần lắm 1 ádfasdfasd', 3),
(7, 'Bùi Khánh Huyền', '3.jpg', 'nhóm nátasdfasdf', 2, 1, 6, NULL, NULL, 'Cần lắm 1 be', 3),
(8, 'Bùi Khánh Huyền', '1234.jpg', 'asdf', 2, 1, 7, NULL, NULL, 'asdf', 1),
(9, 'Bùi Khánh Huyền', '1234.jpg', 'asdf', 2, 1, 7, NULL, NULL, 'asdf', 1),
(10, 'Bùi Khánh Huyền', '1234.jpg', 'asdf', 2, 1, 7, NULL, NULL, 'asdf', 1),
(11, 'Bùi Khánh Huyền', '1234.jpg', 'asdf', 2, 1, 7, NULL, NULL, 'asdf', 1),
(12, 'Đỗ Hồng Ngọc', '1234.jpg', 'nhóm thèm trai', 2, 1, 11, NULL, NULL, 'need man', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_skill`
--

CREATE TABLE `student_skill` (
  `stu_skill_id` int(10) UNSIGNED NOT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `stu_skill` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_skill_detail` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_skill`
--

INSERT INTO `student_skill` (`stu_skill_id`, `stu_id`, `stu_skill`, `stu_skill_detail`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lap trinh', 50, NULL, NULL),
(2, 1, 'thuyet trinh', 70, NULL, NULL),
(3, 1, 'Giao tiep', 60, NULL, NULL),
(4, 1, 'Lam viec nhom', 50, NULL, NULL),
(5, 3, 'lap trinh', 50, NULL, NULL),
(6, 3, 'thuyet trinh', 50, NULL, NULL),
(7, 3, 'hoc tap', 50, NULL, NULL),
(8, 3, 'xa giao', 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(10) UNSIGNED NOT NULL,
  `t_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_avt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_phone` int(11) NOT NULL,
  `t_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_born` date NOT NULL,
  `t_major` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_avt`, `t_password`, `t_desc`, `t_phone`, `t_email`, `t_born`, `t_major`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Thanh Trung', '12', '123456789', 'trung ', 97582131, 'trung@gmail.com', '1999-09-09', 'CNTT', 1, NULL, NULL),
(2, 'Đoàn Trung Sơn', '123.png', '123456', 'Thầy là đoàn trung sơn ', 9103280, 'trungson@gmail.com', '1999-09-09', 'CNTT', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_skill`
--

CREATE TABLE `teacher_skill` (
  `t_skill_id` int(10) UNSIGNED NOT NULL,
  `t_id` int(11) NOT NULL,
  `t_skill` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_ost` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `group_rate`
--
ALTER TABLE `group_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `meeting_calender`
--
ALTER TABLE `meeting_calender`
  ADD PRIMARY KEY (`meeting_id`);

--
-- Indexes for table `member_group`
--
ALTER TABLE `member_group`
  ADD PRIMARY KEY (`member_group_id`);

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
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `storage_file`
--
ALTER TABLE `storage_file`
  ADD PRIMARY KEY (`storage_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `student_group`
--
ALTER TABLE `student_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `student_skill`
--
ALTER TABLE `student_skill`
  ADD PRIMARY KEY (`stu_skill_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `teacher_skill`
--
ALTER TABLE `teacher_skill`
  ADD PRIMARY KEY (`t_skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_rate`
--
ALTER TABLE `group_rate`
  MODIFY `rate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meeting_calender`
--
ALTER TABLE `meeting_calender`
  MODIFY `meeting_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_group`
--
ALTER TABLE `member_group`
  MODIFY `member_group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `storage_file`
--
ALTER TABLE `storage_file`
  MODIFY `storage_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_group`
--
ALTER TABLE `student_group`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_skill`
--
ALTER TABLE `student_skill`
  MODIFY `stu_skill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_skill`
--
ALTER TABLE `teacher_skill`
  MODIFY `t_skill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
