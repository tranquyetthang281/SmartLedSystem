-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2022 lúc 10:44 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- ----Create Database ----
DROP DATABASE IF EXISTS db_smart_led_system;
CREATE DATABASE db_smart_led_system;

use db_smart_led_system;
-- ---- End Create Database ----


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_smart_led_system`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `app_user`
--

CREATE TABLE `app_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `app_user`
--

INSERT INTO `app_user` (`id`, `username`, `password`, `name`, `sex`) VALUES
(1, 'thayboingugat', '123456', 'Tran Quyet Thang', 'M');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `led_id` int(11) NOT NULL,
  `action` char(1) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id`, `led_id`, `action`, `time`) VALUES
(1, 1, '1', '2022-04-26 03:11:33'),
(2, 1, '0', '2022-04-26 03:11:34'),
(3, 1, '1', '2022-04-26 03:12:22'),
(4, 1, '0', '2022-04-26 03:12:23'),
(5, 1, '1', '2022-04-26 03:15:13'),
(6, 1, '0', '2022-04-26 03:15:14'),
(7, 1, '1', '2022-04-27 05:10:16'),
(8, 1, '0', '2022-04-27 05:10:17'),
(9, 1, '1', '2022-04-27 05:10:18'),
(10, 1, '0', '2022-04-27 05:10:19'),
(11, 1, '1', '2022-04-27 05:10:38'),
(12, 1, '0', '2022-04-27 05:10:39'),
(13, 1, '1', '2022-04-27 05:10:42'),
(14, 1, '0', '2022-04-27 05:10:42'),
(15, 1, '1', '2022-04-27 05:11:11'),
(16, 1, '0', '2022-04-27 05:11:12'),
(17, 1, '1', '2022-04-27 05:11:14'),
(18, 1, '0', '2022-04-27 05:11:15'),
(19, 1, '1', '2022-04-27 05:11:18'),
(20, 1, '0', '2022-04-27 05:12:47'),
(21, 1, '1', '2022-04-27 05:12:49'),
(22, 1, '0', '2022-04-27 05:12:51'),
(23, 1, '1', '2022-04-27 05:12:52'),
(24, 1, '0', '2022-04-27 05:16:56'),
(25, 1, '1', '2022-04-27 05:19:52'),
(26, 1, '0', '2022-04-27 05:20:08'),
(27, 1, '1', '2022-04-27 05:20:15'),
(28, 1, '0', '2022-04-27 05:20:18'),
(29, 1, '1', '2022-04-27 05:20:47'),
(30, 1, '0', '2022-04-27 05:20:48'),
(31, 1, '1', '2022-04-27 05:20:49'),
(32, 1, '0', '2022-04-27 05:20:50'),
(33, 2, '1', '2022-04-27 05:20:52'),
(34, 2, '0', '2022-04-27 05:20:52'),
(35, 1, '1', '2022-04-27 05:21:24'),
(36, 1, '0', '2022-04-27 05:21:25'),
(37, 1, '1', '2022-04-27 05:21:28'),
(38, 2, '1', '2022-04-27 05:25:45'),
(39, 2, '0', '2022-04-27 05:25:46'),
(40, 1, '0', '2022-04-27 05:25:47'),
(41, 1, '1', '2022-04-27 05:25:49'),
(42, 1, '0', '2022-04-27 05:25:50'),
(43, 1, '1', '2022-04-27 05:25:52'),
(44, 1, '0', '2022-04-27 05:28:39'),
(45, 1, '1', '2022-04-27 05:28:44'),
(46, 2, '1', '2022-04-27 05:28:48'),
(47, 1, '0', '2022-04-27 05:28:51'),
(48, 1, '1', '2022-04-27 05:32:20'),
(49, 1, '0', '2022-04-27 05:32:21'),
(50, 1, '1', '2022-04-27 05:32:22'),
(51, 2, '0', '2022-04-27 05:32:26'),
(52, 2, '1', '2022-04-27 05:32:27'),
(53, 2, '0', '2022-04-27 05:32:29'),
(54, 1, '0', '2022-04-27 05:32:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `led`
--

CREATE TABLE `led` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `wattage` int(11) DEFAULT NULL,
  `mode` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `led`
--

INSERT INTO `led` (`id`, `status`, `description`, `wattage`, `mode`, `user_id`) VALUES
(1, '0', 'Led in living room', 20, 'Voice', 1),
(2, '0', 'Led in living room', 20, 'Auto', 1),
(3, '0', 'Led in bedroom', 20, 'Auto', 1),
(4, '0', 'Led in bedroom', 20, 'Auto', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sensor`
--

INSERT INTO `sensor` (`id`, `type`, `user_id`) VALUES
(1, 'sound', 1),
(2, 'sound', 1),
(3, 'infrared', 1),
(4, 'infrared', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sensor_control_led`
--

CREATE TABLE `sensor_control_led` (
  `sensor_id` int(11) NOT NULL,
  `led_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sensor_control_led`
--

INSERT INTO `sensor_control_led` (`sensor_id`, `led_id`) VALUES
(1, 1),
(1, 2),
(3, 1),
(3, 2),
(2, 3),
(2, 4),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `used_energy`
--

CREATE TABLE `used_energy` (
  `id` int(11) NOT NULL,
  `led_id` int(11) NOT NULL,
  `enrgy` decimal(12,2) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`,`led_id`),
  ADD KEY `led_id` (`led_id`);

--
-- Chỉ mục cho bảng `led`
--
ALTER TABLE `led`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `sensor_control_led`
--
ALTER TABLE `sensor_control_led`
  ADD KEY `led_id` (`led_id`),
  ADD KEY `sensor_id` (`sensor_id`);

--
-- Chỉ mục cho bảng `used_energy`
--
ALTER TABLE `used_energy`
  ADD PRIMARY KEY (`id`,`led_id`),
  ADD KEY `led_id` (`led_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `led`
--
ALTER TABLE `led`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `used_energy`
--
ALTER TABLE `used_energy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`led_id`) REFERENCES `led` (`id`);

--
-- Các ràng buộc cho bảng `led`
--
ALTER TABLE `led`
  ADD CONSTRAINT `led_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `app_user` (`id`);

--
-- Các ràng buộc cho bảng `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `sensor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `app_user` (`id`);

--
-- Các ràng buộc cho bảng `sensor_control_led`
--
ALTER TABLE `sensor_control_led`
  ADD CONSTRAINT `sensor_control_led_ibfk_1` FOREIGN KEY (`led_id`) REFERENCES `led` (`id`),
  ADD CONSTRAINT `sensor_control_led_ibfk_2` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`);

--
-- Các ràng buộc cho bảng `used_energy`
--
ALTER TABLE `used_energy`
  ADD CONSTRAINT `used_energy_ibfk_1` FOREIGN KEY (`led_id`) REFERENCES `led` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
