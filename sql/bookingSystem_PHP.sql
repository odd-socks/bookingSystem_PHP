-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-11 04:32:00
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `bookingsystem_php`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `course`
--

CREATE TABLE `course` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(7) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `course`
--

INSERT INTO `course` (`id`, `name`, `detail`, `description`, `price`, `image_name`) VALUES
(1, '贅沢コース', '黒毛和牛、カルビ、豚カルビ、ロース、サラダ等', '一番高級なコースです！', 5500, 'meat4.jpg'),
(2, 'DXコース', '\r\n牛タン\r\n牛上トロタン\r\n中落カルビ(タレ・塩)\r\n牛ミノ(塩・にんにく塩・激辛)\r\n\r\nプチ紋甲イカ/有頭エビ/イイダコ\r\nビビンバ サンチュ/チョレギサラダ/シーザーサラダ/安安サラダ 韓国のり/梅干し/薬味ネギ\r\nバターフォンデュ\r\nシューアイス/生チョコアイス/ロイヤルミルクティーアイス/バニラアイス', 'デザートも付いた、当店メニューを食べつくせる贅沢なコースです！', 3500, 'meat1.jpg'),
(3, '満腹コース', '\r\nカルビ（タレ・塩)\r\nハラミ（タレ・塩)\r\nやわらか漬けハラミ\r\n赤身ロース（タレ・塩）\r\n牛上ホルモン（塩・にんにく塩・激辛）\r\n牛レバー（味噌）\r\n\r\n白菜キムチ/カクテキ/ピリ辛キュウリ\r\n焼き野菜盛り合わせ/きのこ3種盛り合わせ\r\n明太ポテトサラダ\r\nエリンギバター/えのきバター/じゃがバター/コーンバター\r\n玉ねぎ/しいたけ/ヤングコーン/オクラ/エリンギ', '当店オススメ!!看板メニューを多数含む、最もスタンダードなコースです。', 2800, 'meat2.jpg'),
(4, 'シンプルコース', 'Vカルビ\r\nヤングカルビ（タレ）\r\nトントロ（塩・激辛）\r\n豚カルビ（塩・激辛）\r\nブタタン\r\nポークウインナー\r\nバジル豚カルビ\r\nとりもも（塩・激辛）\r\nヤゲン軟骨（塩・激辛）\r\n鶏せせり（塩・激辛）\r\nピリ辛やみつき鶏\r\n豚ホルモン（塩・にんにく塩・激辛）\r\n\r\nライス（中・小）\r\n塩キャベツ/塩キャベツハーフ\r\nキャベチョレギ/キャベチョレギハーフ\r\nもやしナムル/キクラゲナムル/小松菜ナムル\r\nポテトサラダ', 'リーズナブルが嬉しい◎', 1900, 'meat3.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tell` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `login_name`, `name`, `tell`, `password`) VALUES
(1, 'jani', 'ジャニ', '0120-0024-0024', 'janipass'),
(2, 'hogehoge', 'ホゲホゲ', '0120-001-002', 'hogepass'),
(3, 'piyopiyo', 'ピヨピヨ', '080-1414-1414', 'piyopass'),
(4, 'bokeboke', 'ボケボケ', '0120-5060-4650', 'bokepass'),
(5, 'hugyahugya', 'フギャフギャ', '0120-1234-5678', 'hugyapass');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルのAUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
