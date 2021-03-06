-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 10 朁E18 日 22:22
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmt` text COLLATE utf8mb4_unicode_ci,
  `day` date NOT NULL,
  `price` int(6) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `author`, `cmt`, `day`, `price`, `indate`) VALUES
(2, '新橋アンダーグラウンド', '本橋信宏', 'ああああ', '2017-11-16', 16200, '2018-09-29 18:13:47'),
(6, '新しい分かり方', '佐藤　雅彦', 'うううう', '2017-09-20', 2052, '2018-10-07 14:52:05'),
(7, 'パパは脳研究者', '池谷裕二', 'ええええ', '2017-08-10', 1728, '2018-10-07 14:53:21'),
(8, 'その島のひとたちは、ひとの話をきかない', '森川すいめい', 'おおおお', '2016-06-24', 1512, '2018-10-07 14:55:26'),
(9, 'バッタを倒しにアフリカへ', '前野ウルド浩太郎', 'aaaa', '2017-05-17', 994, '2018-10-18 22:01:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
