-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20231025.98b7f38d22
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 06:35 PM
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `stu_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avt` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `group_id`, `p_id`, `t_id`, `chat_sender`, `chat_message`, `created_at`, `updated_at`, `stu_id`, `name`, `avt`) VALUES
(24, 13, 0, 0, 1, 'kê', '2023-11-13 06:45:12', NULL, 8, 'Long Hoàng', 'longhoang.jpg'),
(25, 13, 0, 3, 0, NULL, '2023-11-13 06:21:17', NULL, 0, 'Trung', 'thanhtrung.jpg'),
(26, 13, 0, 3, 0, 'hmm', '2023-11-13 06:27:17', NULL, 0, 'Trung', 'thanhtrung.jpg'),
(27, 13, 0, 3, 0, 'em là ai nhỉ', '2023-11-13 06:55:22', NULL, 0, 'Trung', 'thanhtrung.jpg'),
(28, 13, 0, 0, 1, 'em là Long học lớp CNTT4 đây thầy', '2023-11-13 06:29:26', NULL, 8, 'Long Hoàng', 'longhoang.jpg'),
(29, 13, 0, 0, 1, 'Em chào thầy ạ em là Tuấn chung nhóm với Long ạ', '2023-11-13 06:14:27', NULL, 9, 'Tuấn Nguyễn', 'nguyentuan.jpg'),
(30, 13, 0, 3, 0, 'kê', '2023-11-13 15:13:34', NULL, 0, 'Trung', 'thanhtrung.jpg');

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
(7, 13, 'Nhóm này chưa đăng kí ITS 0 điểm', 0, '2023-11-12 16:37:59', NULL),
(8, 13, NULL, NULL, '2023-11-13 04:46:18', NULL),
(9, 13, 'HMM', NULL, '2023-11-13 04:46:40', NULL),
(10, 13, NULL, 10, '2023-11-13 04:57:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_calender`
--

CREATE TABLE `meeting_calender` (
  `meeting_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `day` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
(5, 3, 'Tìm hiểu về AWS trong ứng dụng đời sống', 'Biết về SQL và Điện toán đám mây', 'CNTT', '15', NULL, NULL),
(6, 3, 'Xe điều khiển thông minh', 'Hiểu cơ bản về AI và ứng dụng Web để điều khiên', 'CNTT', '10', NULL, NULL),
(8, 3, 'lập trình kho hàng', 'biết về Laravel', 'CNTT', '10', NULL, NULL);

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
(6, 13, 'Câu-hỏi-3.doc', '2023-11-12 15:30:13', NULL, 'nội quy nhóm mong mọi người đọc', 8),
(7, 13, 'Eurytheus-1 (1).docx', '2023-11-12 16:23:23', NULL, 'chào mừng thành viên mới', 8),
(8, 13, 'pexels-eberhard-grossgasteiger-443446.jpg', '2023-11-12 16:24:16', NULL, 'đây là file đại diện của nhóm', 8);

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
(8, '123456', 20010909, 'longhoang.jpg', 'Chào các bạn mình là Hoàng Hải Long năm nay năm 4 đang có mong muốn làm đồ án', 'Hoàng Hải Long', 967846423, 'CNTT', '20010909@st.phenikaa-uni.edu.vn', 'Long Hoàng', '2002-09-19', '4', '0', 13, NULL, NULL, 5, 3, 1),
(9, '123456', 20010932, 'nguyentuan.jpg', 'Chào các bạn mình là Nguyễn Viết Tuấn năm nay năm 4 đang có mong muốn làm đồ án', 'Nguyễn Viết Tuấn', 96789321, 'CNTT', '20010932@st.phenikaa-uni.edu.vn', 'Tuấn Nguyễn', '2002-09-03', '4', '0', 13, NULL, NULL, 5, 3, 0),
(10, '123456', 20010925, 'ducmanh.jpg', 'Chào các bạn mình là Cao Thạch Đức Mạnh năm nay năm 4 đang có mong muốn làm đồ án', 'Cao Thạch Đức Mạnh', 96785551, 'CNTT', '20010925@st.phenikaa-uni.edu.vn', 'Đức Mạnh', '2002-06-25', '4', '0', 14, NULL, NULL, 6, 3, 1),
(11, '123456', 20010903, 'khanhhuyen.jpg', 'Chào các bạn mình là Bùi Khánh Huyền năm nay năm 4 đang có mong muốn làm đồ án', 'Bùi Khánh Huyền', 9333521, 'CNTT', '20010903@st.phenikaa-uni.edu.vn', 'Huyền Nè', '2002-03-04', '4', '0', 16, NULL, NULL, 5, 3, 1),
(12, '123456', 20010915, 'hongngoc.jpg', 'Chào các bạn mình là Đỗ Hồng Ngọc năm nay năm 4 đang có mong muốn làm đồ án và tất cả các bạn gánh mình', 'Đỗ Hồng Ngọc', 2147483647, 'CNTT', '20010915@st.phenikaa-uni.edu.vn', 'Hong Ngoc', '2002-09-18', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL);

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
(13, 'Hoàng Hải Long', 'pexels-eberhard-grossgasteiger-443446.jpg', 'Nhóm chăm chỉ', 5, 3, 1, NULL, NULL, 'cần FE Dev', 3),
(14, 'Cao Thạch Đức Mạnh', 'pexels-veeterzy-39811.jpg', 'Nhóm vô địch', 6, 3, 1, NULL, NULL, 'Ai muốn vào nhóm đóng 100k', 3),
(15, 'Nguyễn Viết Tuấn', 'pexels-eberhard-grossgasteiger-443446.jpg', 'nhóm nát bét', 8, 3, 1, NULL, NULL, 'Cần anh mạnh đz', 3),
(16, 'Bùi Khánh Huyền', 'pexels-eberhard-grossgasteiger-443446.jpg', 'nhóm thèm trai', 5, 3, 2, NULL, NULL, 'Cần anh mạnh đz', 3);

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
(13, 8, 'Lập trình', 60, '2023-11-12 13:28:32', NULL),
(14, 8, 'Ngoại ngữ', 70, '2023-11-12 13:28:32', NULL),
(15, 8, 'Giao tiếp', 70, '2023-11-12 13:28:32', NULL),
(16, 8, 'Làm việc nhóm', 80, '2023-11-12 13:28:32', NULL),
(22, 8, 'Học hỏi', 10, '2023-11-12 13:01:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(10) UNSIGNED NOT NULL,
  `t_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_nickname` text COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `teacher` (`t_id`, `t_name`, `t_nickname`, `t_avt`, `t_password`, `t_desc`, `t_phone`, `t_email`, `t_born`, `t_major`, `role`, `created_at`, `updated_at`) VALUES
(3, 'Nguyễn Thành Trung', 'Trung', 'thanhtrung.jpg', '123456', 'Chào các em thầy là Trung năm nay sẽ phụ trách các em.', 91032801, 'thanhtrung@cs.phenikaa-uni.edu.vn', '1999-09-09', 'CNTT', 1, NULL, NULL),
(4, 'Nguyễn Thị Ngọc Anh', 'N.Anh', NULL, '123456', 'Chào các em cô là Ngọc Anh năm nay sẽ phụ trách các em về mảng cơ sở dữ liệu .', 912312801, 'ngocanh@cs.phenikaa-uni.edu.vn', '1989-09-09', 'CNTT', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_skill`
--

CREATE TABLE `teacher_skill` (
  `t_skill_id` int(10) UNSIGNED NOT NULL,
  `t_id` int(11) NOT NULL,
  `t_skill` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_skill_detail` int(11) NOT NULL,
  `t_ost` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_skill`
--

INSERT INTO `teacher_skill` (`t_skill_id`, `t_id`, `t_skill`, `t_skill_detail`, `t_ost`, `created_at`, `updated_at`) VALUES
(1, 3, 'Giỏi về AWS', 20, 'Tốt nghiệp đại học bách khoa năm 2018', NULL, NULL),
(2, 3, NULL, 0, 'Đạt học bổng của trường đại học Úc', NULL, NULL);

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
  MODIFY `chat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `group_rate`
--
ALTER TABLE `group_rate`
  MODIFY `rate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `meeting_calender`
--
ALTER TABLE `meeting_calender`
  MODIFY `meeting_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `storage_file`
--
ALTER TABLE `storage_file`
  MODIFY `storage_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_group`
--
ALTER TABLE `student_group`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_skill`
--
ALTER TABLE `student_skill`
  MODIFY `stu_skill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_skill`
--
ALTER TABLE `teacher_skill`
  MODIFY `t_skill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
