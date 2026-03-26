-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2026 at 03:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secure_files`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `file_name`, `file_path`, `uploaded_at`, `file_hash`) VALUES
(2, 1, 'Screenshot 2025-12-09 210156.png', 'uploads/Screenshot 2025-12-09 210156.png.enc', '2026-03-09 11:35:10', NULL),
(4, 2, 'virus.exe.docx', 'uploads/virus.exe.docx.enc', '2026-03-11 08:04:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `action_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `file_name`, `action_time`) VALUES
(1, 2, 'UPLOAD', 'avatars-eEeQ7CRfJ56g0asz-y2Uomg-t1080x1080.jpg', '2026-03-11 07:57:22'),
(2, 2, 'DOWNLOAD', 'avatars-eEeQ7CRfJ56g0asz-y2Uomg-t1080x1080.jpg', '2026-03-11 07:57:38'),
(3, 2, 'DELETE', 'avatars-eEeQ7CRfJ56g0asz-y2Uomg-t1080x1080.jpg', '2026-03-11 07:57:43'),
(4, 2, 'UPLOAD', 'virus.exe.docx', '2026-03-11 08:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` int(11) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `shared_with` int(11) DEFAULT NULL,
  `shared_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `file_id`, `shared_with`, `shared_at`) VALUES
(1, 2, 2, '2026-03-09 11:38:17'),
(2, 4, 1, '2026-03-11 08:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) DEFAULT 'user',
  `otp_code` varchar(10) NOT NULL,
  `otp_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`, `otp_code`, `otp_expiry`) VALUES
(1, 'Rushen', 'rushenfer123@gmail.com', '$2y$10$Sv2NUih3ylwnwrXW4q2OAOzY/O4McKmpJr6cK3GoQ1NXI6zZSPa.O', '2026-03-09 11:00:03', 'user', '', NULL),
(2, 'userB', 'userb@gmail.com', '$2y$10$vWvtG3c61ClsLZEsJ3KSpOli.6HnxznalstAHtEuE7mWf/cJR1qFW', '2026-03-09 11:37:56', 'user', '', NULL),
(3, 'UserA', 'userA@gmail.com', '$2y$10$3IfZDaDe7Oth9YqQ0M4dSu2z1BVYPAuIo4w2M74tdVFbsd68mN4H2', '2026-03-11 08:12:22', 'admin', '459107', '2026-03-26 07:35:35'),
(4, 'Rushen', 'rushenfer123@gmail.com', '$2y$10$6YWkkYy3YUKRjn1ecu6Jc.OsGlIwaYSVhJ0drh7eFrsRtkhWCmuIW', '2026-03-26 06:31:44', 'user', '', NULL),
(5, 'Rushen', 'rushenfer123@gmail.com', '$2y$10$zE6tecQ5uruxaA/cKBmOHOnvuFK.jACH2W8o2pbQu4Hwo2oV5sCxG', '2026-03-26 06:32:22', 'user', '', NULL),
(6, 'Rushen', 'userA@gmail.com', '$2y$10$5o7SleHKeDaB4Usr2zuw0.s5aqXh8rb7ZGHGe1lYtO9ZHSUjUAvzG', '2026-03-26 06:32:52', 'user', '', NULL),
(7, 'dewan', 'dewan@gmail.com', '$2y$10$DL7rcv2yhAkDSRVVAlpMXOcuAir0Ztc6S5/VRTjzJYk07gYSiqsNa', '2026-03-26 06:38:27', 'user', '207749', '2026-03-26 07:43:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
