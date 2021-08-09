-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-08-09 16:24:01
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db66`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(10) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '院線片01', 1, 120, '2021-08-07', '院線片01的發行商', '院線片01的導演', '03B01v.mp4', '03B01.png', '院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介', 1, 3),
(2, '院線片02的劇情簡介', 3, 90, '2021-08-08', '院線片02的發行商', '院線片02的導演', '03B03v.mp4', '03B03.png', '院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介院線片02的劇情簡介', 1, 1),
(3, '尸木火日尸', 3, 123, '2021-08-09', 'fdafsd', 'sdfsdafsdf', '03B06v.mp4', '03B06.png', 'sdfasdfsdfsadfsdf', 1, 2),
(4, 'dsfasdfs', 3, 122, '2021-08-09', 'dsfsdfssdf', 'dfsafsfs', '03B06v.mp4', '03B07.png', 'sdfsdfa', 1, 4),
(5, '全境擴散', 1, 120, '2021-08-08', 'ffsaf', 'fdfasdfasf', '03B08v.mp4', '03B10.png', 'dafsadfasdffsfdafsadfasdffsfdafsadfasdffsfdafsadfasdffsfdafsadfasdffsfdafsadfasdffsf', 1, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `session` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt` int(1) UNSIGNED NOT NULL,
  `seats` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ord`
--

INSERT INTO `ord` (`id`, `name`, `date`, `session`, `qt`, `seats`, `no`) VALUES
(3, '院線片01', '2021-08-09', '16:00~18:00', 3, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"7\";i:2;s:1:\"8\";}', '202108090003'),
(4, '院線片01', '2021-08-09', '18:00~20:00', 3, 'a:3:{i:0;s:1:\"5\";i:1;s:1:\"6\";i:2;s:1:\"7\";}', '202108090004'),
(5, '院線片01', '2021-08-09', '18:00~20:00', 2, 'a:2:{i:0;s:2:\"16\";i:1;s:2:\"17\";}', '202108090005'),
(6, '院線片01', '2021-08-09', '18:00~20:00', 2, 'a:2:{i:0;s:2:\"10\";i:1;s:2:\"11\";}', '202108090006'),
(7, '院線片01', '2021-08-09', '18:00~20:00', 2, 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', '202108090007'),
(8, '院線片01', '2021-08-09', '20:00~22:00', 3, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"6\";i:2;s:1:\"7\";}', '202108090008');

-- --------------------------------------------------------

--
-- 資料表結構 `trailer`
--

CREATE TABLE `trailer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `trailer`
--

INSERT INTO `trailer` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, '預告片1111111', '03A05.jpg', 1, 4, 1),
(3, '預告片9', '03A09.jpg', 1, 7, 3),
(4, '預告片7', '03A07.jpg', 1, 6, 3),
(5, '預告片1', '03A01.jpg', 1, 1, 1),
(6, '預告片2', '03A02.jpg', 1, 5, 1),
(7, '預告片4', '03A04.jpg', 1, 3, 2),
(8, '6666', '03A06.jpg', 1, 8, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
