-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-07 18:53:06
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `library`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE `book` (
  `BID` int(30) NOT NULL,
  `Bname` text NOT NULL,
  `category` text NOT NULL,
  `startdate` datetime(6) DEFAULT NULL,
  `duedate` datetime(6) DEFAULT NULL,
  `PID` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `book`
--

INSERT INTO `book` (`BID`, `Bname`, `category`, `startdate`, `duedate`, `PID`) VALUES
(1, 'C程式設計', '程式', '2020-04-30 10:42:18.000000', '2020-05-10 17:00:00.000000', 2),
(2, '離散數學', '數學', '2020-04-30 10:42:20.000000', '2020-05-10 17:00:00.000000', 2),
(3, '微積分', '數學', NULL, NULL, NULL),
(4, '線性代數', '數學', NULL, NULL, NULL),
(5, '資料結構', '程式', NULL, NULL, NULL),
(6, '數位系統', '硬體', NULL, NULL, NULL),
(7, '組合語言與微處理機', '硬體', NULL, NULL, NULL),
(8, '演算法', '程式', NULL, NULL, NULL),
(9, '人工智慧導論', '程式', NULL, NULL, NULL),
(10, '網路系統程式設計', '程式', NULL, NULL, NULL),
(11, '硬體描述語言', '硬體', NULL, NULL, NULL),
(12, '數位電子學', '硬體', NULL, NULL, NULL),
(13, '計算機組織', '硬體', NULL, NULL, NULL),
(14, 'UNIX程式設計', '程式', NULL, NULL, NULL),
(15, '數值方法導論與應用', '數學', NULL, NULL, NULL),
(16, '超大型積體電路設計概論', '硬體', NULL, NULL, NULL),
(17, '網路應用程式設計', '程式', NULL, NULL, NULL),
(18, 'JAVA物件導向程式設計', '程式', NULL, NULL, NULL),
(19, '機率論', '數學', NULL, NULL, NULL),
(20, '統計推論', '數學', NULL, NULL, NULL),
(21, '微分方程', '數學', NULL, NULL, NULL),
(22, '高等微積分', '數學', NULL, NULL, NULL),
(23, '普通化學', '自然科學', NULL, NULL, NULL),
(24, '基礎物理數學', '自然科學', NULL, NULL, NULL),
(25, '生活實用物理', '自然科學', NULL, NULL, NULL),
(26, '近代物理', '自然科學', NULL, NULL, NULL),
(27, '電磁學', '自然科學', NULL, NULL, NULL),
(28, '數值分析', '自然科學', NULL, NULL, NULL),
(29, '熱統計物理', '自然科學', NULL, NULL, NULL),
(30, '天文學導論', '自然科學', NULL, NULL, NULL),
(31, 'Python程式設計', '程式', NULL, NULL, NULL),
(32, '手機製作', '硬體', NULL, NULL, NULL),
(33, '神經網路', '程式', NULL, NULL, NULL),
(34, 'Android程式設計', '程式', NULL, NULL, NULL),
(35, '計算機架構', '硬體', NULL, NULL, NULL),
(36, '昆蟲學', '自然科學', NULL, NULL, NULL),
(37, '天文學', '自然科學', NULL, NULL, NULL),
(38, '七大行星學', '自然科學', NULL, NULL, NULL),
(39, '拓樸學', '數學', NULL, NULL, NULL),
(40, '訊號系統', '硬體', NULL, NULL, NULL),
(41, 'aaa', 'test', NULL, NULL, NULL),
(42, 'bbb', 'test', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `person`
--

CREATE TABLE `person` (
  `PID` int(30) NOT NULL,
  `Pname` text NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `person`
--

INSERT INTO `person` (`PID`, `Pname`, `Email`) VALUES
(1, 'Peter', 'peter0617ku@gmail.com'),
(2, 'Alex', 'peter0617ku@gmail.com'),
(3, 'Johnny', 'peter0617ku@gmail.com'),
(4, 'Lucas', 'peter0617ku@gmail.com'),
(5, 'Carson', 'peter0617ku@gmail.com'),
(6, 'Dylan', 'peter0617ku@gmail.com'),
(7, 'Aaron', 'peter0617ku@gmail.com'),
(8, 'Eddie', 'peter0617ku@gmail.com'),
(9, 'Mia', 'peter0617ku@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `reserve`
--

CREATE TABLE `reserve` (
  `PID` int(30) NOT NULL,
  `BID` int(30) NOT NULL,
  `ordertime` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `PID` (`PID`),
  ADD KEY `PID_2` (`PID`),
  ADD KEY `PID_3` (`PID`);

--
-- 資料表索引 `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`PID`);

--
-- 資料表索引 `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`PID`,`BID`),
  ADD KEY `PID` (`PID`),
  ADD KEY `BID` (`BID`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `person` (`PID`);

--
-- 資料表的限制式 `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `person` (`PID`),
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`BID`) REFERENCES `book` (`BID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
