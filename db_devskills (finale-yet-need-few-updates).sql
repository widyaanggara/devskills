-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 02:57 AM
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
-- Database: `db_devskills`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id_activity` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `activity_type` enum('login','click','search','course','visit','logout','report','course','post-test') NOT NULL,
  `activity_description` text NOT NULL,
  `activity_time` datetime NOT NULL,
  `id_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id_activity`, `id_user`, `activity_type`, `activity_description`, `activity_time`, `id_course`) VALUES
(1, 1, 'login', 'User logged in', '2024-06-21 08:00:00', NULL),
(2, 2, 'click', 'User clicked on HTML course', '2024-06-21 08:05:00', NULL),
(3, 3, 'search', 'User searched for CSS basics', '2024-06-21 08:10:00', NULL),
(4, 4, 'course', 'User started PHP basics course', '2024-06-21 08:15:00', NULL),
(5, 5, 'login', 'User logged in', '2024-06-21 08:20:00', NULL),
(6, 6, 'click', 'User clicked on JavaScript course', '2024-06-21 08:25:00', NULL),
(7, 7, 'search', 'User searched for MySQL basics', '2024-06-21 08:30:00', NULL),
(8, 8, 'course', 'User started Python basics course', '2024-06-21 08:35:00', NULL),
(9, 9, 'login', 'User logged in', '2024-06-21 08:40:00', NULL),
(10, 10, 'click', 'User clicked on Java course', '2024-06-21 08:45:00', NULL),
(11, 11, 'search', 'User searched for C++ basics', '2024-06-21 08:50:00', NULL),
(12, 12, 'course', 'User started Ruby basics course', '2024-06-21 08:55:00', NULL),
(13, 13, 'login', 'User logged in', '2024-06-21 09:00:00', NULL),
(14, 14, 'click', 'User clicked on Swift course', '2024-06-21 09:05:00', NULL),
(15, 15, 'search', 'User searched for Kotlin basics', '2024-06-21 09:10:00', NULL),
(16, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-22 16:09:24', NULL),
(19, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-22 16:10:36', NULL),
(20, 16, 'visit', 'Mengunjungi halaman course', '2024-06-22 16:10:38', NULL),
(21, 16, 'visit', 'Mengunjungi halaman report', '2024-06-22 16:10:39', NULL),
(22, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-22 16:10:40', NULL),
(23, 16, 'visit', 'Mengunjungi halaman course', '2024-06-22 16:10:42', NULL),
(24, 16, 'visit', 'Mengunjungi halaman report', '2024-06-22 16:10:43', NULL),
(25, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:37:34', NULL),
(26, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:40:50', NULL),
(27, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:41:00', NULL),
(28, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:43:24', NULL),
(29, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:44:23', NULL),
(30, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:46:00', NULL),
(31, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:46:01', NULL),
(32, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:48:52', NULL),
(33, 18, 'visit', 'Mengunjungi halaman course', '2024-06-23 11:48:55', NULL),
(34, 18, 'visit', 'Mengunjungi halaman course', '2024-06-23 11:49:56', NULL),
(35, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:49:58', NULL),
(36, 18, 'visit', 'Mengunjungi halaman course', '2024-06-23 11:49:59', NULL),
(37, 18, 'visit', 'Mengunjungi halaman report', '2024-06-23 11:50:29', NULL),
(38, 18, 'visit', 'Mengunjungi halaman course', '2024-06-23 11:50:32', NULL),
(39, 18, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 11:50:33', NULL),
(53, 16, 'visit', 'Mengunjungi halaman course', '2024-06-23 12:25:16', NULL),
(61, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 12:38:01', NULL),
(62, 16, 'report', 'Melaporkan masalah', '2024-06-23 12:38:10', NULL),
(63, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 13:15:19', NULL),
(64, 16, 'report', 'Melaporkan masalah', '2024-06-23 13:21:42', NULL),
(65, 16, 'visit', 'Mengunjungi halaman course', '2024-06-23 13:21:45', NULL),
(66, 16, 'report', 'Melaporkan masalah', '2024-06-23 13:21:54', NULL),
(67, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 13:41:41', NULL),
(68, 16, 'visit', 'Mengunjungi halaman course', '2024-06-23 13:41:51', NULL),
(69, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 13:42:34', NULL),
(70, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-23 13:47:31', NULL),
(71, 16, 'report', 'Melaporkan masalah', '2024-06-23 13:47:43', NULL),
(72, 16, 'report', 'Melaporkan masalah', '2024-06-23 13:48:05', NULL),
(73, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 13:52:11', NULL),
(74, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 13:52:57', NULL),
(75, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 13:58:27', NULL),
(76, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 14:02:45', NULL),
(77, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 14:05:07', NULL),
(78, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 14:08:07', NULL),
(79, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 14:15:32', NULL),
(80, 16, 'report', 'Melaporkan masalah', '2024-06-27 14:15:46', NULL),
(81, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 14:15:50', NULL),
(82, 21, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 14:21:22', NULL),
(83, 21, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 14:24:44', NULL),
(84, 21, 'visit', 'Mengunjungi halaman course', '2024-06-27 14:24:47', NULL),
(85, 21, 'report', 'Melaporkan masalah', '2024-06-27 14:25:37', NULL),
(86, 21, 'login', 'Mengunjungi halaman dashboard', '2024-06-27 14:25:39', NULL),
(87, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-29 10:33:47', NULL),
(88, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-30 10:30:53', NULL),
(89, 16, 'login', 'Mengunjungi halaman dashboard', '2024-06-30 10:31:59', NULL),
(90, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:27:47', NULL),
(91, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 12:27:51', NULL),
(92, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 12:28:09', NULL),
(93, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 12:28:49', NULL),
(94, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 12:30:17', NULL),
(95, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:30:25', NULL),
(96, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 12:33:17', NULL),
(97, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 12:33:21', NULL),
(98, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:33:22', NULL),
(99, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 12:33:29', NULL),
(100, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 12:37:28', NULL),
(101, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:37:30', NULL),
(102, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:38:43', NULL),
(103, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:38:45', NULL),
(104, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:40:47', NULL),
(105, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:41:20', NULL),
(106, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:41:21', NULL),
(107, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:51:12', NULL),
(108, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 12:51:13', NULL),
(109, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 13:32:54', NULL),
(110, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 13:33:43', NULL),
(111, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 13:34:38', NULL),
(112, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 13:35:48', NULL),
(113, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 13:36:02', NULL),
(114, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:36:16', NULL),
(115, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 13:36:17', NULL),
(116, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:36:19', NULL),
(117, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 13:46:59', NULL),
(118, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:47:15', NULL),
(119, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:47:17', NULL),
(120, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 13:49:35', NULL),
(121, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:49:37', NULL),
(122, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:52:10', NULL),
(123, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:54:19', NULL),
(124, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:54:33', NULL),
(125, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:54:39', NULL),
(126, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 13:57:38', NULL),
(127, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:00:33', NULL),
(128, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:00:45', NULL),
(129, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:01:04', NULL),
(130, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:02:00', NULL),
(131, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:02:26', NULL),
(132, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:18:54', NULL),
(133, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:18:55', NULL),
(134, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 14:18:56', NULL),
(135, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:18:58', NULL),
(136, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:19:00', NULL),
(137, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:20:03', NULL),
(138, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:20:19', NULL),
(139, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:20:45', NULL),
(140, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:22:41', NULL),
(141, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:23:03', NULL),
(142, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:33:42', NULL),
(143, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:37:12', NULL),
(144, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:37:25', NULL),
(145, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:41:06', NULL),
(146, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:54:06', NULL),
(147, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:54:53', NULL),
(148, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:55:18', NULL),
(149, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:55:24', NULL),
(150, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 14:55:30', NULL),
(151, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:01:10', NULL),
(152, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:01:28', NULL),
(153, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:04:14', NULL),
(154, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:04:20', NULL),
(155, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:04:48', NULL),
(156, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:05:09', NULL),
(157, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:08:22', NULL),
(158, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:12:55', NULL),
(159, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:12:59', NULL),
(160, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:13:03', NULL),
(161, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:13:06', NULL),
(162, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:13:12', NULL),
(163, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:13:14', NULL),
(164, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:13:16', NULL),
(165, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:15:27', NULL),
(166, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:16:06', NULL),
(167, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 15:16:07', NULL),
(168, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 15:16:15', NULL),
(169, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 15:16:30', NULL),
(170, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:16:31', NULL),
(171, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 15:17:19', NULL),
(172, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 15:17:22', NULL),
(173, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:17:24', NULL),
(174, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 15:19:52', NULL),
(175, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:19:54', NULL),
(176, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 15:20:32', NULL),
(177, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:20:34', NULL),
(178, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:20:55', NULL),
(179, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:23:28', NULL),
(180, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:24:09', NULL),
(181, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:25:39', NULL),
(182, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:26:01', NULL),
(183, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:26:17', NULL),
(184, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:27:34', NULL),
(185, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:28:25', NULL),
(186, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:28:34', NULL),
(187, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:30:31', NULL),
(188, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:31:05', NULL),
(189, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:31:12', NULL),
(190, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:34:46', NULL),
(191, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 15:36:13', NULL),
(192, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:36:15', NULL),
(193, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-01 15:36:17', NULL),
(194, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:36:18', NULL),
(195, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:38:46', NULL),
(196, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:38:50', NULL),
(197, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:38:52', NULL),
(198, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:40:36', NULL),
(199, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:40:45', NULL),
(200, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:40:59', NULL),
(201, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:41:02', NULL),
(202, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:42:13', NULL),
(203, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:42:14', NULL),
(204, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:42:16', NULL),
(205, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:42:18', NULL),
(206, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:43:29', NULL),
(207, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:43:30', NULL),
(208, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:43:32', NULL),
(209, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:43:34', NULL),
(210, 16, 'visit', 'Mengunjungi halaman post-test', '2024-07-01 15:46:37', NULL),
(211, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 15:57:30', NULL),
(212, 16, 'visit', 'Memulai course materi 1 \'\'', '2024-07-01 15:58:22', NULL),
(213, 16, 'visit', 'Memulai course materi 1', '2024-07-01 15:59:26', NULL),
(214, 16, 'visit', 'Memulai course materi 3', '2024-07-01 15:59:28', NULL),
(215, 16, 'visit', 'Memulai course materi 3', '2024-07-01 15:59:49', NULL),
(216, 16, 'visit', 'Memulai course materi 3', '2024-07-01 16:00:04', NULL),
(217, 16, 'visit', 'Memulai course post test', '2024-07-01 16:00:06', NULL),
(218, 16, 'visit', 'Memulai course post test', '2024-07-01 16:01:04', NULL),
(219, 16, 'visit', 'Memulai course materi 1', '2024-07-01 16:01:06', NULL),
(220, 16, 'visit', 'Memulai course post test', '2024-07-01 16:01:09', NULL),
(221, 16, 'visit', 'Mengunjungi halaman course', '2024-07-01 16:01:11', NULL),
(222, 16, 'visit', 'Memulai course materi 1', '2024-07-01 16:01:13', NULL),
(223, 16, 'visit', 'Memulai course materi 3', '2024-07-01 16:01:14', NULL),
(224, 16, 'visit', 'Memulai course materi 3', '2024-07-01 16:01:16', NULL),
(225, 16, 'visit', 'Memulai course post test', '2024-07-01 16:01:18', NULL),
(226, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-02 02:41:56', NULL),
(227, 16, 'visit', 'Mengunjungi halaman course', '2024-07-02 02:41:58', NULL),
(228, 16, 'course', 'Memulai course materi 1', '2024-07-02 02:42:00', NULL),
(229, 16, 'course', 'Memulai course materi 1', '2024-07-02 02:44:50', NULL),
(230, 16, 'course', 'Memulai course materi 3', '2024-07-02 02:44:57', NULL),
(231, 16, 'course', 'Memulai course materi 3', '2024-07-02 02:45:02', NULL),
(232, 16, 'post-test', 'Memulai course post test', '2024-07-02 02:45:08', NULL),
(233, 16, 'login', 'Mengunjungi halaman dashboard', '2024-07-02 02:45:20', NULL),
(234, 16, 'visit', 'Mengunjungi halaman course', '2024-07-02 02:45:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id_answer` int(11) NOT NULL,
  `id_question` int(11) DEFAULT NULL,
  `a_answer` text DEFAULT NULL,
  `b_answer` text DEFAULT NULL,
  `c_answer` text DEFAULT NULL,
  `d_answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id_answer`, `id_question`, `a_answer`, `b_answer`, `c_answer`, `d_answer`) VALUES
(41, 41, 'Metode untuk mengembangkan perangkat lunak menggunakan hardware', 'Studi tentang algoritma yang memungkinkan komputer belajar dari data', 'Proses manual pengkodean untuk pengenalan pola', 'Teknik enkripsi untuk keamanan data'),
(42, 42, 'Supervised learning tidak memerlukan data latih, sementara unsupervised learning memerlukan', 'Supervised learning menggunakan data yang berlabel, sementara unsupervised learning menggunakan data yang tidak berlabel', 'Unsupervised learning menggunakan data yang berlabel, sementara supervised learning menggunakan data yang tidak berlabel', 'Supervised learning digunakan untuk clustering, sementara unsupervised learning digunakan untuk prediksi'),
(43, 43, 'K-means clustering', 'Principal Component Analysis (PCA)', 'Support Vector Machine (SVM)', 'Apriori'),
(44, 44, 'Untuk meningkatkan ukuran dataset', 'Untuk memastikan bahwa model tidak overfitting atau underfitting', 'Untuk mengurangi waktu komputasi dalam pelatihan model', 'Untuk mengoptimalkan penyimpanan data'),
(45, 45, 'Model yang tidak cukup belajar dari data latih dan berkinerja buruk pada data baru', 'Model yang terlalu sederhana dan gagal menangkap hubungan dalam data', 'Model yang terlalu kompleks dan berkinerja sangat baik pada data latih, tetapi buruk pada data baru', 'Model yang memerlukan waktu komputasi yang sangat lama untuk pelatihan'),
(46, 46, 'Framework untuk pengembangan backend', 'Library JavaScript untuk machine learning', 'Framework CSS untuk desain responsif dan front-end', 'Database management system'),
(47, 47, 'Membantu dalam pengelolaan database', 'Menyederhanakan animasi pada halaman web', 'Membuat layout responsif dengan membagi halaman menjadi kolom-kolom', 'Mengoptimalkan gambar pada halaman web'),
(48, 48, '6', '12', '24', '16'),
(49, 49, 'Untuk membuat tabel responsif', 'Untuk membuat tombol berwarna', 'Untuk membuat layout yang terpusat dengan lebar tetap atau responsif', 'Untuk menambahkan ikon pada halaman web'),
(50, 50, 'Menggunakan class .btn-primary', 'Menggunakan class .button-main', 'Menggunakan class .btn-default', 'Menggunakan class .main-btn');

-- --------------------------------------------------------

--
-- Table structure for table `cheatcodes`
--

CREATE TABLE `cheatcodes` (
  `id_cheatcode` int(11) NOT NULL,
  `id_test` int(11) DEFAULT NULL,
  `id_answer` int(11) NOT NULL,
  `id_question` int(11) DEFAULT NULL,
  `correct_answer` enum('A','B','C','D') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cheatcodes`
--

INSERT INTO `cheatcodes` (`id_cheatcode`, `id_test`, `id_answer`, `id_question`, `correct_answer`) VALUES
(37, 21, 41, 41, 'B'),
(38, 21, 42, 42, 'B'),
(39, 21, 43, 43, 'C'),
(40, 21, 44, 44, 'B'),
(41, 21, 45, 45, 'C'),
(42, 22, 46, 46, 'C'),
(43, 22, 47, 47, 'C'),
(44, 22, 48, 48, 'B'),
(45, 22, 49, 49, 'C'),
(46, 22, 50, 50, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `completed_courses`
--

CREATE TABLE `completed_courses` (
  `id_completion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `progres` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `completed_courses`
--

INSERT INTO `completed_courses` (`id_completion`, `id_user`, `id_course`, `progres`) VALUES
(16, 16, 40, 100);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `in_progress_count` int(11) DEFAULT 0,
  `completed_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id_course`, `course_name`, `img`, `in_progress_count`, `completed_count`) VALUES
(40, 'Machine Learning', 'machine-learning-Machine Learning Cover Image.jpg', 0, 0),
(41, 'Boostrap Basics', 'boostrap-basics-bootstrap-la-gi-trong-website-hieu-ro-bootstrap-chi-trong-5p.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `incompleted_courses`
--

CREATE TABLE `incompleted_courses` (
  `id_incomplete` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matter`
--

CREATE TABLE `matter` (
  `id_matter` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `no_matter` int(11) NOT NULL,
  `is_locked` enum('lock','unlock','','') NOT NULL,
  `name_matter` varchar(255) NOT NULL,
  `link_matter` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matter`
--

INSERT INTO `matter` (`id_matter`, `id_course`, `no_matter`, `is_locked`, `name_matter`, `link_matter`, `description`) VALUES
(77, 40, 1, 'lock', 'Machine Learning Introduction', 'https://youtu.be/ukzFI9rgwfU?si=2YJJnSviEpVuyQgy', 'Selamat datang di \"Machine Learning Introduction\" – kursus yang membuka pintu Anda ke dunia kecerdasan buatan. Kursus ini memberikan pemahaman dasar tentang konsep, teknik, dan alat machine learning, termasuk algoritma dasar dan penerapannya dalam kasus nyata. Anda akan mempelajari cara mengolah data, membangun model prediksi, serta mengevaluasi dan mengoptimalkannya. Video ini juga menjelaskan jenis-jenis Machine Learning seperti supervised, unsupervised, dan reinforcement learning, serta penerapannya di berbagai industri. Machine Learning memungkinkan komputer belajar secara mandiri tanpa diprogram secara eksplisit, menggunakan pengenalan pola untuk menghasilkan hasil yang andal. Bergabunglah sekarang dan mulailah perjalanan Anda dalam teknologi masa depan!'),
(78, 40, 2, 'lock', 'Machine Learning Tutorial for Beginners', 'https://www.youtube.com/live/c8W7dRPdIPE?si=WQoy0aHhcBu7CR9S', '\"Machine Learning Tutorial for Beginners\" adalah kursus yang dirancang untuk membantu Anda memahami dasar-dasar machine learning dan Python. Dalam tutorial ini, kami akan membahas topik penting seperti aplikasi machine learning, konsep dasar machine learning, serta mengapa matematika, statistik, dan aljabar linier sangat penting. Anda juga akan mempelajari tentang regularisasi, reduksi dimensi, dan PCA (Principal Component Analysis). Selain itu, kami akan melakukan analisis prediksi pada Pemilu AS yang baru saja berlangsung. Kursus ini cocok untuk pemula yang ingin memulai perjalanan mereka dalam dunia machine learning dengan Python. Bergabunglah dan tingkatkan keterampilan Anda sekarang!'),
(79, 40, 3, 'lock', 'Machine Learning Algorithms', 'https://youtu.be/I7NrVwm3apg?si=CxaSa-NAJuKPpp-c', '\"Machine Learning Algorithms\" adalah kursus yang akan membantu Anda memahami apa itu Machine Learning, berbagai masalah dan algoritma Machine Learning, serta algoritma-algoritma kunci dengan contoh sederhana dan penerapannya menggunakan Python. Algoritma-algoritma utama yang dibahas secara mendetail meliputi Linear Regression, Logistic Regression, Decision Tree, Random Forest, dan KNN (K-Nearest Neighbors). Kursus ini memberikan pemahaman komprehensif tentang bagaimana setiap algoritma bekerja dan bagaimana mengaplikasikannya dalam kasus nyata. Bergabunglah sekarang untuk memperdalam pengetahuan Anda tentang algoritma Machine Learning!'),
(80, 41, 1, 'lock', 'Boostrap Basic Introduction', 'https://youtu.be/tvVO6Lnk5J0?si=Ej_moRFaO22uEPnK', '\"Selamat datang di materi Bootstrap Basics Introduction! Dalam pelajaran ini, kita akan menjelajahi fondasi dari framework front-end yang sangat populer ini. Anda akan mempelajari bagaimana Bootstrap dapat membantu Anda dalam membangun website yang responsif dan modern dengan cepat dan efisien. Kami akan membahas berbagai komponen dan utilitas yang disediakan oleh Bootstrap, mulai dari grid system hingga berbagai elemen UI yang siap digunakan. Mari kita mulai perjalanan kita untuk menjadi ahli dalam menggunakan Bootstrap dan membuat situs web yang menakjubkan! Siapkan diri Anda untuk belajar dan berkreasi dengan penuh semangat!\"'),
(81, 41, 2, 'lock', 'Mengenal Komponen dan Utilitas Bootstrap 5', 'https://youtu.be/4sosXZsdy-s?si=jpHPIV_oJypTwTpP', 'Dalam kursus Arsitektur Komponen Bootstrap, Anda akan mempelajari konsep dasar Bootstrap, yang menjadi landasan dalam mengembangkan situs web responsif. Kami akan membimbing Anda melalui berbagai jenis komponen dalam Bootstrap, baik itu komponen layout, komponen UI, maupun komponen fungsional, serta memberikan wawasan tentang penggunaan grid system dan utilitas CSS untuk membuat situs web yang dinamis dan menarik. Selain itu, Anda akan mempelajari metode penyesuaian tema, pengenalan plugin JavaScript, dan cara memanfaatkannya untuk meningkatkan efisiensi dan fleksibilitas pengembangan situs web menggunakan Bootstrap. Dengan demikian, kursus ini akan membekali Anda dengan pengetahuan mendalam untuk membangun situs web yang responsif, skalabel, dan mudah dikelola dengan Bootstrap.'),
(82, 41, 3, 'lock', 'Membangun Navigasi Responsif dan Antarmuka Dinamis\"', 'https://youtu.be/os4kOPZ696w?si=Z-j5VOltV5uq6Jj5', 'Dalam kursus Routing dan Manajemen State Bootstrap, Anda akan mempelajari cara mengelola navigasi dan tampilan secara efektif. Kami akan membahas penggunaan Bootstrap untuk membuat navigasi yang responsif, termasuk navbar yang dapat disesuaikan dan sistem grid untuk mengelola layout halaman. Selanjutnya, kita akan menjelajahi manajemen tampilan menggunakan komponen-komponen Bootstrap untuk membuat antarmuka pengguna yang dinamis dan interaktif. Anda juga akan belajar tentang penggunaan plugin JavaScript Bootstrap untuk menambah fungsionalitas interaktif seperti modals, tooltips, dan carousels. Pada akhirnya, Anda akan siap untuk membuat situs web yang dinamis dan responsif dengan navigasi dan manajemen tampilan yang efisien menggunakan Bootstrap.');

-- --------------------------------------------------------

--
-- Table structure for table `post_test`
--

CREATE TABLE `post_test` (
  `id_test` int(11) NOT NULL,
  `id_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_test`
--

INSERT INTO `post_test` (`id_test`, `id_course`) VALUES
(21, 40),
(22, 41);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id_question` int(11) NOT NULL,
  `id_test` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id_question`, `id_test`, `question`) VALUES
(41, 21, 'Apa itu machine learning?'),
(42, 21, 'Apa perbedaan utama antara supervised learning dan unsupervised learning?'),
(43, 21, 'Algoritma berikut mana yang termasuk dalam supervised learning?'),
(44, 21, 'Apa tujuan dari penggunaan cross-validation dalam machine learning?'),
(45, 21, 'Apa yang dimaksud dengan overfitting dalam konteks machine learning?'),
(46, 22, 'Apa itu Bootstrap?'),
(47, 22, 'Apa tujuan dari grid system dalam Bootstrap?'),
(48, 22, 'Berapa banyak kolom yang tersedia dalam sistem grid Bootstrap?'),
(49, 22, 'Apa kegunaan dari class .container dalam Bootstrap?'),
(50, 22, 'Bagaimana cara membuat tombol dengan tampilan utama (primary) di Bootstrap?');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nomorhp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `report_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `id_user`, `username`, `nomorhp`, `email`, `message`, `report_time`) VALUES
(3, 16, 'Ardane Machieous', '089999999999', 'ardane@gmail.com', 'kurang banyak course nya:((', '2024-06-23 05:47:43'),
(4, 16, 'Ardane Machieous', '089999999999', 'ardane@gmail.com', 'lapor bang ada bug di..... nganuu', '2024-06-23 05:48:05'),
(5, 16, 'Ardane Machieous', '089999999999', 'ardane@gmail.com', 'ada game gak bang????', '2024-06-27 06:15:46'),
(6, 21, 'Agus Arya Mahardika', '088987656657', 'agusarya123@gmail.com', 'tessssssssssssssssssssssssssssssssssss', '2024-06-27 06:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `site_visits`
--

CREATE TABLE `site_visits` (
  `id_visit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `visit_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_visits`
--

INSERT INTO `site_visits` (`id_visit`, `id_user`, `visit_time`) VALUES
(1, 1, '2024-06-21 09:00:00'),
(2, 2, '2024-06-21 09:05:00'),
(3, 3, '2024-06-21 09:10:00'),
(4, 4, '2024-06-21 09:15:00'),
(5, 5, '2024-06-21 09:20:00'),
(6, 6, '2024-06-21 09:25:00'),
(7, 7, '2024-06-21 09:30:00'),
(8, 8, '2024-06-21 09:35:00'),
(9, 9, '2024-06-21 09:40:00'),
(10, 10, '2024-06-21 09:45:00'),
(11, 11, '2024-06-21 09:50:00'),
(12, 12, '2024-06-21 09:55:00'),
(13, 13, '2024-06-21 10:00:00'),
(14, 14, '2024-06-21 10:05:00'),
(15, 15, '2024-06-21 10:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `type`, `email`, `password`, `birthday`, `phone`, `institution`, `img`) VALUES
(1, 'AdminSuper', 'admin', 'user1@example.com', 'password1', '2004-10-29', '089289876543', '', 'AdminSuper-profile.jpg'),
(2, 'user2', 'student', 'user2@example.com', 'password2', '1991-02-02', '2345678901', '', 'avatar-base.svg'),
(3, 'user3', 'student', 'user3@example.com', 'password3', '1992-03-03', '3456789012', '', 'avatar-base.svg'),
(4, 'user4', 'admin', 'user4@example.com', 'password4', '1993-04-04', '4567890123', '', 'avatar-base.svg'),
(5, 'user5', 'student', 'user5@example.com', 'password5', '1994-05-05', '5678901234', '', 'avatar-base.svg'),
(6, 'user6', 'student', 'user6@example.com', 'password6', '1995-06-06', '6789012345', '', 'avatar-base.svg'),
(7, 'user7', 'student', 'user7@example.com', 'password7', '1996-07-07', '7890123456', '', 'avatar-base.svg'),
(8, 'user8', 'admin', 'user8@example.com', 'password8', '1997-08-08', '8901234567', '', 'avatar-base.svg'),
(9, 'user9', 'student', 'user9@example.com', 'password9', '1998-09-09', '9012345678', '', 'avatar-base.svg'),
(10, 'user10', 'student', 'user10@example.com', 'password10', '1999-10-10', '0123456789', '', 'avatar-base.svg'),
(11, 'user11', 'student', 'user11@example.com', 'password11', '2000-11-11', '1234509876', '', 'avatar-base.svg'),
(12, 'user12', 'student', 'user12@example.com', 'password12', '2001-12-12', '2345609876', '', 'avatar-base.svg'),
(13, 'user13', 'admin', 'user13@example.com', 'password13', '2002-01-01', '3456709876', '', 'avatar-base.svg'),
(14, 'user14', 'student', 'user14@example.com', 'password14', '2003-02-02', '4567809876', '', 'avatar-base.svg'),
(15, 'user15', 'student', 'user15@example.com', 'password15', '2004-03-03', '5678909876', '', 'avatar-base.svg'),
(16, 'Ardan29', 'student', 'ardane@gmail.com', 'e123', '2024-06-27', '081237828751', 'Institut Bisnis dan Teknologi Indonesia', 'Ardan29-profile.jpg'),
(17, 'AnggaraGanz', 'admin', 'anggara123@gmail.com', 'angz123', '0000-00-00', '', '', 'avatar-base.svg'),
(18, 'MangAris2910', 'student', 'komangaris2910@gmail.com', 'aris123aris', '0000-00-00', '', '', 'avatar-base.svg'),
(20, 'hantuhantu', 'student', 'hantu@gmail.com', 'hantu123', '0000-00-00', '', '', 'avatar-base.svg'),
(21, 'degusuh', 'student', 'agusarya123@gmail.com', 'agus123', '2024-06-27', '087761433715', '', 'degusuh-profile.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id_user_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `status` enum('in_progress','completed') NOT NULL,
  `start_time` datetime NOT NULL,
  `completion_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id_activity`),
  ADD KEY `fk_activities_users` (`id_user`),
  ADD KEY `fk_activities_courses` (`id_course`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `id_question` (`id_question`);

--
-- Indexes for table `cheatcodes`
--
ALTER TABLE `cheatcodes`
  ADD PRIMARY KEY (`id_cheatcode`),
  ADD UNIQUE KEY `id_answer` (`id_answer`),
  ADD KEY `id_test` (`id_test`),
  ADD KEY `id_question` (`id_question`);

--
-- Indexes for table `completed_courses`
--
ALTER TABLE `completed_courses`
  ADD PRIMARY KEY (`id_completion`),
  ADD KEY `fk_completed_course_users` (`id_user`),
  ADD KEY `fk_completed_course_course` (`id_course`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `incompleted_courses`
--
ALTER TABLE `incompleted_courses`
  ADD PRIMARY KEY (`id_incomplete`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `matter`
--
ALTER TABLE `matter`
  ADD PRIMARY KEY (`id_matter`),
  ADD KEY `fk_matter_courses` (`id_course`);

--
-- Indexes for table `post_test`
--
ALTER TABLE `post_test`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_test` (`id_test`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reports_users` (`id_user`);

--
-- Indexes for table `site_visits`
--
ALTER TABLE `site_visits`
  ADD PRIMARY KEY (`id_visit`),
  ADD KEY `fk_site_visits_users` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id_user_course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `cheatcodes`
--
ALTER TABLE `cheatcodes`
  MODIFY `id_cheatcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `completed_courses`
--
ALTER TABLE `completed_courses`
  MODIFY `id_completion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `incompleted_courses`
--
ALTER TABLE `incompleted_courses`
  MODIFY `id_incomplete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matter`
--
ALTER TABLE `matter`
  MODIFY `id_matter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `post_test`
--
ALTER TABLE `post_test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `site_visits`
--
ALTER TABLE `site_visits`
  MODIFY `id_visit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id_user_course` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_activities_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`),
  ADD CONSTRAINT `fk_activities_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

--
-- Constraints for table `cheatcodes`
--
ALTER TABLE `cheatcodes`
  ADD CONSTRAINT `cheatcodes_ibfk_1` FOREIGN KEY (`id_test`) REFERENCES `post_test` (`id_test`),
  ADD CONSTRAINT `cheatcodes_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`),
  ADD CONSTRAINT `cheatcodes_ibfk_3` FOREIGN KEY (`id_answer`) REFERENCES `answers` (`id_answer`);

--
-- Constraints for table `completed_courses`
--
ALTER TABLE `completed_courses`
  ADD CONSTRAINT `fk_completed_course_course_new` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`),
  ADD CONSTRAINT `fk_completed_course_users_new` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `incompleted_courses`
--
ALTER TABLE `incompleted_courses`
  ADD CONSTRAINT `incompleted_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `incompleted_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id_course`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
