-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2022 lúc 04:46 AM
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
(1, '0', 'Led in living room', 20, 'Auto', 1),
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
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `used_energy`
--

CREATE TABLE `used_energy` (
  `id` int(11) NOT NULL,
  `led_id` int(11) NOT NULL,
  `energy` decimal(12,4) DEFAULT NULL,
  `time` date DEFAULT NULL
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `led`
--
ALTER TABLE `led`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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





INSERT INTO `used_energy` (`led_id`, `energy`, `time`) VALUES
(1, '60.0000', '2021-03-01'),
(1, '102.0000', '2021-03-02'),
(1, '120.6667', '2021-03-04'),
(1, '120.6667', '2021-03-05'),
(1, '120.6667', '2021-03-07'),
(1, '120.6667', '2021-03-08'),
(1, '80.6667', '2021-03-10'),
(1, '110.6667', '2021-03-12'),
(1, '110.6667', '2021-03-14'),
(1, '110.6667', '2021-03-16'),
(1, '110.6667', '2021-03-18'),
(1, '110.6667', '2021-03-21'),
(1, '110.6667', '2021-03-23'),
(1, '110.6667', '2021-03-26'),
(1, '110.6667', '2021-03-29'),
(1, '110.6667', '2021-03-31'),
(2, '180.0000', '2021-03-01'),
(2, '182.0000', '2021-03-02'),
(2, '180.6667', '2021-03-04'),
(2, '180.6667', '2021-03-05'),
(2, '260.6667', '2021-03-07'),
(2, '320.6667', '2021-03-08'),
(2, '220.6667', '2021-03-10'),
(2, '210.6667', '2021-03-12'),
(2, '190.6667', '2021-03-14'),
(2, '230.6667', '2021-03-16'),
(2, '230.6667', '2021-03-18'),
(2, '290.6667', '2021-03-21'),
(2, '30.6667', '2021-03-23'),
(2, '230.6667', '2021-03-26'),
(2, '230.6667', '2021-03-29'),
(2, '29.3333', '2021-03-31'),
(3, '20.0000', '2021-03-01'),
(3, '2.0000', '2021-03-02'),
(3, '60.6667', '2021-03-04'),
(3, '260.6667', '2021-03-05'),
(3, '220.6667', '2021-03-07'),
(3, '40.6667', '2021-03-08'),
(3, '60.6667', '2021-03-10'),
(3, '70.6667', '2021-03-12'),
(3, '250.6667', '2021-03-14'),
(3, '130.6667', '2021-03-16'),
(3, '210.6667', '2021-03-18'),
(3, '210.6667', '2021-03-21'),
(3, '250.6667', '2021-03-23'),
(3, '390.6667', '2021-03-26'),
(3, '350.6667', '2021-03-29'),
(3, '130.6667', '2021-03-31'),
(4, '40.0000', '2021-03-01'),
(4, '42.0000', '2021-03-02'),
(4, '40.6667', '2021-03-04'),
(4, '220.6667', '2021-03-05'),
(4, '240.6667', '2021-03-07'),
(4, '60.6667', '2021-03-08'),
(4, '80.6667', '2021-03-10'),
(4, '90.6667', '2021-03-12'),
(4, '170.6667', '2021-03-14'),
(4, '250.6667', '2021-03-16'),
(4, '210.6667', '2021-03-18'),
(4, '50.6667', '2021-03-21'),
(4, '250.6667', '2021-03-23'),
(4, '330.6667', '2021-03-26'),
(4, '350.6667', '2021-03-29'),
(4, '90.6667', '2021-03-31');


INSERT INTO `history` ( `led_id`, `action`, `time`) VALUES
(1, '1', '2021-03-01 17:18:00'),
(1, '0', '2021-03-01 20:18:00'),
(1, '1', '2021-03-02 15:12:00'),
(1, '0', '2021-03-02 20:18:00'),
(1, '1', '2021-03-04 15:17:00'),
(1, '0', '2021-03-04 21:19:00'),
(1, '1', '2021-03-05 15:17:00'),
(1, '0', '2021-03-05 21:19:00'),
(1, '1', '2021-03-07 15:17:00'),
(1, '0', '2021-03-07 21:19:00'),
(1, '1', '2021-03-08 15:17:00'),
(1, '0', '2021-03-08 21:19:00'),
(1, '1', '2021-03-10 16:17:00'),
(1, '0', '2021-03-10 20:19:00'),
(1, '1', '2021-03-12 15:17:00'),
(1, '0', '2021-03-12 20:49:00'),
(1, '1', '2021-03-14 15:17:00'),
(1, '0', '2021-03-14 20:49:00'),
(1, '1', '2021-03-16 15:17:00'),
(1, '0', '2021-03-16 20:49:00'),
(1, '1', '2021-03-18 15:17:00'),
(1, '0', '2021-03-18 20:49:00'),
(1, '1', '2021-03-21 15:17:00'),
(1, '0', '2021-03-21 20:49:00'),
(1, '1', '2021-03-23 15:17:00'),
(1, '0', '2021-03-23 20:49:00'),
(1, '1', '2021-03-26 15:17:00'),
(1, '0', '2021-03-26 20:49:00'),
(1, '1', '2021-03-29 15:17:00'),
(1, '0', '2021-03-29 20:49:00'),
(1, '1', '2021-03-31 15:17:00'),
(1, '0', '2021-03-31 20:49:00'),
(2, '1', '2021-03-01 12:18:00'),
(2, '0', '2021-03-01 21:18:00'),
(2, '1', '2021-03-02 13:12:00'),
(2, '0', '2021-03-02 22:18:00'),
(2, '1', '2021-03-04 15:17:00'),
(2, '0', '0000-00-00 00:00:00'),
(2, '1', '2021-03-05 11:17:00'),
(2, '0', '2021-03-05 20:19:00'),
(2, '1', '2021-03-07 09:17:00'),
(2, '0', '2021-03-07 22:19:00'),
(2, '1', '2021-03-08 07:17:00'),
(2, '0', '2021-03-08 23:19:00'),
(2, '1', '2021-03-10 12:17:00'),
(2, '0', '2021-03-10 23:19:00'),
(2, '1', '2021-03-12 13:17:00'),
(2, '0', '2021-03-12 23:49:00'),
(2, '1', '2021-03-14 11:17:00'),
(2, '0', '2021-03-14 20:49:00'),
(2, '1', '2021-03-16 12:17:00'),
(2, '0', '2021-03-16 23:49:00'),
(2, '1', '2021-03-18 11:17:00'),
(2, '0', '2021-03-18 22:49:00'),
(2, '1', '2021-03-21 07:17:00'),
(2, '0', '2021-03-21 21:49:00'),
(2, '1', '2021-03-23 19:17:00'),
(2, '0', '2021-03-23 20:49:00'),
(2, '1', '2021-03-26 12:17:00'),
(2, '0', '2021-03-26 23:49:00'),
(2, '1', '2021-03-29 11:17:00'),
(2, '0', '2021-03-29 22:49:00'),
(2, '1', '2021-03-31 10:17:00'),
(2, '0', '2021-03-31 23:17:00'),
(3, '1', '2021-03-01 01:18:00'),
(3, '0', '2021-03-01 02:18:00'),
(3, '1', '2021-03-02 01:12:00'),
(3, '0', '2021-03-02 01:18:00'),
(3, '1', '2021-03-04 02:17:00'),
(3, '0', '2021-03-04 05:19:00'),
(3, '1', '2021-03-05 10:17:00'),
(3, '0', '2021-03-05 23:19:00'),
(3, '1', '2021-03-07 12:17:00'),
(3, '0', '2021-03-07 23:19:00'),
(3, '1', '2021-03-08 01:17:00'),
(3, '0', '2021-03-08 03:19:00'),
(3, '1', '2021-03-10 02:17:00'),
(3, '0', '2021-03-10 05:19:00'),
(3, '1', '2021-03-12 07:17:00'),
(3, '0', '2021-03-12 10:49:00'),
(3, '1', '2021-03-14 11:17:00'),
(3, '0', '2021-03-14 23:49:00'),
(3, '1', '2021-03-16 12:17:00'),
(3, '0', '2021-03-16 18:49:00'),
(3, '1', '2021-03-18 10:17:00'),
(3, '0', '2021-03-18 20:49:00'),
(3, '1', '2021-03-21 12:17:00'),
(3, '0', '2021-03-21 22:49:00'),
(3, '1', '2021-03-23 11:17:00'),
(3, '0', '2021-03-23 23:49:00'),
(3, '1', '2021-03-26 02:17:00'),
(3, '0', '2021-03-26 21:49:00'),
(3, '1', '2021-03-29 05:17:00'),
(3, '0', '2021-03-29 22:49:00'),
(3, '1', '2021-03-31 17:17:00'),
(3, '0', '2021-03-31 23:49:00'),
(4, '1', '2021-03-01 02:18:00'),
(4, '0', '2021-03-01 04:18:00'),
(4, '1', '2021-03-02 04:12:00'),
(4, '0', '2021-03-02 06:18:00'),
(4, '1', '2021-03-04 10:17:00'),
(4, '0', '2021-03-04 12:19:00'),
(4, '1', '2021-03-05 09:17:00'),
(4, '0', '2021-03-05 20:19:00'),
(4, '1', '2021-03-07 11:17:00'),
(4, '0', '2021-03-07 23:19:00'),
(4, '1', '2021-03-08 02:17:00'),
(4, '0', '2021-03-08 05:19:00'),
(4, '1', '2021-03-10 06:17:00'),
(4, '0', '2021-03-10 10:19:00'),
(4, '1', '2021-03-12 07:17:00'),
(4, '0', '2021-03-12 11:49:00'),
(4, '1', '2021-03-14 12:17:00'),
(4, '0', '2021-03-14 20:49:00'),
(4, '1', '2021-03-16 11:17:00'),
(4, '0', '2021-03-16 23:49:00'),
(4, '1', '2021-03-18 11:17:00'),
(4, '0', '2021-03-18 21:49:00'),
(4, '1', '2021-03-21 08:17:00'),
(4, '0', '2021-03-21 10:49:00'),
(4, '1', '2021-03-23 09:17:00'),
(4, '0', '2021-03-23 21:49:00'),
(4, '1', '2021-03-26 04:17:00'),
(4, '0', '2021-03-26 20:49:00'),
(4, '1', '2021-03-29 02:17:00'),
(4, '0', '2021-03-29 19:49:00'),
(4, '1', '2021-03-31 17:17:00'),
(4, '0', '2021-03-31 21:49:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
