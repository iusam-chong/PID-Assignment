-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2020 年 09 月 04 日 09:46
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `cart`
--

-- --------------------------------------------------------

--
-- 資料表結構 `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `images`
--

INSERT INTO `images` (`id`, `name`, `image`) VALUES
(1, '02d.jpg', NULL),
(2, '02d.jpg', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `unit_in_stock` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `unit_on_cart` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `product_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `unit_price`, `unit_in_stock`, `unit_on_cart`, `product_desc`, `product_image`) VALUES
(15, '這是衣服', 100, 7, 456, '衣服1', '159909930102d.jpg'),
(19, '國王的新衣', 9000, 0, 5, '1', '159918743202d.jpg'),
(20, '這是衣服2', 2000, 24, 5, '衣服2', '159918744902d.jpg'),
(21, '這是衣服3', 4000, 11, 20, '這是衣服3', '159919974902d.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `statement`
--

CREATE TABLE `statement` (
  `statement_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statement_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `statement`
--

INSERT INTO `statement` (`statement_time`, `statement_id`, `user_id`, `product_id`, `product_quantity`) VALUES
('2020-09-04 04:10:16', 2, 2, 15, 18),
('2020-09-04 04:10:16', 3, 2, 19, 1),
('2020-09-04 04:10:16', 4, 2, 20, 1),
('2020-09-04 04:16:44', 5, 2, 20, 4),
('2020-09-04 04:16:44', 6, 2, 19, 1),
('2020-09-04 04:16:44', 7, 2, 15, 16),
('2020-09-04 06:31:44', 8, 13, 15, 8),
('2020-09-04 06:31:44', 9, 13, 19, 2),
('2020-09-04 06:31:44', 10, 13, 20, 5),
('2020-09-04 06:31:44', 11, 13, 21, 8),
('2020-09-04 09:25:58', 12, 2, 15, 1),
('2020-09-04 09:25:58', 13, 2, 19, 1),
('2020-09-04 09:25:58', 14, 2, 21, 1),
('2020-09-04 09:25:58', 15, 2, 20, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_passwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_enabled` tinyint(1) UNSIGNED DEFAULT '1',
  `user_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_passwd`, `user_reg_time`, `user_enabled`, `user_type`) VALUES
(1, 'AwesomeAdmin', '$2y$10$5SzG/OUjAz17S3B2wkfkDOmHs2MxGOe0ymhDFC/2pHB2HbqoWx0RC', '2020-09-01 06:47:01', 1, 'admin'),
(2, 'AwesomeUser', '$2y$10$gCQXWgji.JByKHF2q8zXyeA3TeBULYuFrBRp9rBc75YDSFRA.KxCa', '2020-09-01 06:55:01', 1, 'user'),
(3, 'AwesomeUser2', '$2y$10$UDun/OkDpBIo7pnrX12dj.HM.yPQbW.xDpqRkMjkL.sdTNUlr/N1i', '2020-09-01 07:26:08', 1, 'user'),
(5, 'AwesomeUser3', '$2y$10$hu3P0TV6Kmcz9YhPTtUsueI/GfkAHc2dS9EthanDF.fZMly1MFWjC', '2020-09-01 09:06:09', 1, 'user'),
(6, 'AwesomeUser4', '$2y$10$9XX6q..gqSxXlm/fxXZUKuACKsoouutZqbAzlwaOs88VXGgesXL42', '2020-09-01 09:07:44', 1, 'user'),
(7, 'AwesomeUser6', '$2y$10$nY/yBOij6.c8ILUyBlChN.K8KP05Bay.tb.ECtmAma.tMUq5vpfGi', '2020-09-01 09:18:19', 1, 'user'),
(8, 'AwesomeUser22', '$2y$10$Bmg2e5NR/.0uIQIwPGzxduVC56xtO24e2Yq1l0CWVR0A78XwVzF.G', '2020-09-03 02:08:21', 1, 'user'),
(9, 'AwesomeUser33', '$2y$10$1COFBe1oAGVROn0Lz6iTOuNdDLA5.GbcleE.cn.UmBUBYt/pY2/Mu', '2020-09-03 03:37:51', 1, 'user'),
(10, 'AwesomeUser44', '$2y$10$dJYwjY2/mR/WRDXagLuXzu8MmLzYAw2MwXQF81rAy0dRbj5peHaMu', '2020-09-04 06:10:33', 1, 'user'),
(11, 'AwesomeUser55', '$2y$10$zWjRHn/h0DlQKNPTMlcAI.0HNeAYrTiFRs8iM3ozPir9wn1GP04vq', '2020-09-04 06:13:17', 1, 'user'),
(12, 'AwesomeUser66', '$2y$10$ZR3tn86CdUWMh2.Q.wTpeOXq/xj2I5GHzdgMrC5TU1aX7nHyEV44i', '2020-09-04 06:18:27', 1, 'user'),
(13, 'AwesomeUser77', '$2y$10$GJNWCqIejFe7OE2L5T1HjeWy/MfZ32r6Nfs9l08npzzYZyJAiXj4m', '2020-09-04 06:31:18', 1, 'user');

-- --------------------------------------------------------

--
-- 資料表結構 `user_sessions`
--

CREATE TABLE `user_sessions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user_sessions`
--

INSERT INTO `user_sessions` (`user_id`, `session_id`, `login_time`) VALUES
(2, '8qll0n3opead3dmtucil44iob6', '2020-09-03 09:36:19'),
(1, 'ibm9acd0tnta7lt68ab8q55rr1', '2020-09-04 09:46:26');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`statement_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- 資料表索引 `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `statement`
--
ALTER TABLE `statement`
  MODIFY `statement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
