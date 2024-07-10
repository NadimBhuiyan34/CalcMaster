-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2023 at 05:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quize`
--

-- --------------------------------------------------------

--
-- Table structure for table `abcquiz_ques_bank`
--

CREATE TABLE `abcquiz_ques_bank` (
  `quid` int NOT NULL,
  `qid_own` int NOT NULL,
  `ques` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ans_a` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ans_b` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ans_c` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ans_d` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `answer` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `abcquiz_ques_bank`
--

INSERT INTO `abcquiz_ques_bank` (`quid`, `qid_own`, `ques`, `ans_a`, `ans_b`, `ans_c`, `ans_d`, `answer`) VALUES
(1, 1, 'বাংলাদেশের প্রাচীনতম শহর কোনটি?', 'কক্সবাজার', 'মহাস্থানগড়', 'ফরিদপুর', 'রাজশাহী', '2'),
(2, 2, 'বাংলাদেশের জন্য আন্তর্জাতিক ডায়ালিং কোড কি?', '210', '390', '530', '880', '4'),
(6979, 25, 'কোনোদিন কর্মহীন পূর্ণ অবকাশে বসন্ত বাতাসে অতীতের তীর হাতে যে রাত্রে বহীবে দীর্ঘশ্বাস, ঝরা বকুলের কান্না ব্যথিবে আকাশ। উপরিউক্ত চরণের রচয়িতা কে?', 'শামসুর রাহমান', 'রবীন্দ্রনাথ ঠাকুর', 'কাজী নজরুল ইসলাম', 'কোনটিই নয়\r\n', '2'),
(6977, 3, 'দস্ফভদসভ', 'দসভসদ্ভদস', 'ভসদ্ভদ', 'সভসদ্ভদ', '্ভদসভ', '2'),
(6978, 4, '?>#@৫৪?', 'ওদ', '্ব্ব', '্ব্ব', 'চ্ব', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abcquiz_ques_bank`
--
ALTER TABLE `abcquiz_ques_bank`
  ADD PRIMARY KEY (`quid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abcquiz_ques_bank`
--
ALTER TABLE `abcquiz_ques_bank`
  MODIFY `quid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6980;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
