-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 10:07 AM
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
-- Database: `ghtest45`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_act`
--

CREATE TABLE `tb_act` (
  `id_act` int(10) NOT NULL,
  `name_act` varchar(100) NOT NULL,
  `detail_act` text NOT NULL,
  `day_in` date NOT NULL,
  `day_out` date NOT NULL,
  `coin` int(10) NOT NULL,
  `status_act` char(1) NOT NULL,
  `pic_act` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_act`
--

INSERT INTO `tb_act` (`id_act`, `name_act`, `detail_act`, `day_in`, `day_out`, `coin`, `status_act`, `pic_act`) VALUES
(1, 'ถ่ายรูปแนะนำตัวเอง', 'ถ่ายรูปแนะนำตัวเอง พร้อมเขียนแคปชั่นแนะนำตัว มีรางวับให้ผู้ชนะ !!!!!!!!!', '2025-02-03', '2025-02-10', 30, 'n', '1.png'),
(2, 'ร่วมกิจกรรมออกกำลังกาย', 'ร่วมกิจกรรมออกกำลังกาย แนะนำการออกกำลังให้กับเพื่อนๆได้รู้จัก สมาชิกท่านใดได้รับคะแนนมากที่สุดจะได้รับรางวัล!!!!', '2025-02-03', '2025-02-10', 30, 'n', '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_ad` int(10) NOT NULL,
  `id_pack` int(10) NOT NULL,
  `name_ad` varchar(100) NOT NULL,
  `sname_ad` varchar(100) NOT NULL,
  `user_ad` varchar(100) NOT NULL,
  `pass_ad` varchar(100) NOT NULL,
  `tel_ad` varchar(10) NOT NULL,
  `type_ad` int(1) NOT NULL,
  `pic_ad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_ad`, `id_pack`, `name_ad`, `sname_ad`, `user_ad`, `pass_ad`, `tel_ad`, `type_ad`, `pic_ad`) VALUES
(1, 2, 'admin', 'ดูแลระบบ', 'admin', '123', '0819876543', 1, '1.jpg'),
(2, 3, 'doc1', 'ภูมิคุ้มกัน', 'doc1', '123', '0168494198', 2, '2.jpg'),
(3, 4, 'doc2', 'ร่างกายแข็งแรง', 'doc2', '123', '0948941566', 2, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alert`
--

CREATE TABLE `tb_alert` (
  `id_alert` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_alert` date NOT NULL,
  `time_alert` time NOT NULL,
  `detail_alert` text NOT NULL,
  `status_alert` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_alert`
--

INSERT INTO `tb_alert` (`id_alert`, `id_user`, `day_alert`, `time_alert`, `detail_alert`, `status_alert`) VALUES
(1, 1, '2025-02-10', '03:40:00', 'f', 'y'),
(2, 1, '2025-02-26', '17:56:00', 'จดยา', 'n'),
(3, 4, '2025-02-26', '17:56:00', 'จดยา', 'y'),
(4, 5, '2025-02-26', '17:56:00', 'จดยา', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_answer`
--

CREATE TABLE `tb_answer` (
  `id_ans` int(10) NOT NULL,
  `id_ques` int(10) NOT NULL,
  `id_ques_n` int(10) NOT NULL,
  `type_ques_n` int(1) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_answer`
--

INSERT INTO `tb_answer` (`id_ans`, `id_ques`, `id_ques_n`, `type_ques_n`, `answer`) VALUES
(47, 12, 8, 2, '5'),
(48, 13, 8, 2, '4'),
(49, 14, 8, 2, '4'),
(50, 15, 8, 2, '4'),
(51, 16, 8, 2, '4'),
(52, 17, 8, 2, '4'),
(53, 18, 8, 2, '4'),
(54, 19, 8, 2, '4'),
(55, 20, 8, 2, '4'),
(56, 21, 8, 2, '4'),
(57, 1, 9, 1, '5'),
(58, 3, 9, 1, '4'),
(59, 4, 9, 1, '4'),
(60, 5, 9, 1, '4'),
(61, 6, 9, 1, '4'),
(62, 7, 9, 1, '4'),
(63, 8, 9, 1, '4'),
(64, 9, 9, 1, '4'),
(65, 10, 9, 1, '4'),
(66, 11, 9, 1, '4'),
(67, 12, 10, 2, '5'),
(68, 13, 10, 2, '4'),
(69, 14, 10, 2, '4'),
(70, 15, 10, 2, '4'),
(71, 16, 10, 2, '4'),
(72, 17, 10, 2, '4'),
(73, 18, 10, 2, '4'),
(74, 19, 10, 2, '4'),
(75, 20, 10, 2, '5'),
(76, 21, 10, 2, '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id_chat` int(10) NOT NULL,
  `id_his` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_chat` date NOT NULL,
  `time_chat` time NOT NULL,
  `detail_chat` text NOT NULL,
  `type_chat` int(1) NOT NULL,
  `status_chat` char(1) NOT NULL,
  `video_chat` varchar(200) NOT NULL,
  `video_mime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_chat`
--

INSERT INTO `tb_chat` (`id_chat`, `id_his`, `id_user`, `day_chat`, `time_chat`, `detail_chat`, `type_chat`, `status_chat`, `video_chat`, `video_mime`) VALUES
(1, 1, 1, '2025-02-03', '12:57:22', 'fdgdsf', 1, 'y', '', ''),
(2, 1, 3, '2025-02-03', '13:19:23', 'fwefwef', 2, 'y', '', ''),
(3, 1, 1, '2025-02-03', '14:12:51', '', 1, 'y', 'video88.webm', 'application/octet-stream'),
(4, 1, 1, '2025-02-03', '14:15:00', '', 1, 'y', 'video89.webm', 'application/octet-stream'),
(5, 3, 5, '2025-02-03', '15:53:52', 'หมออออออออออออออออออออออออ', 1, 'n', '', ''),
(6, 5, 4, '2025-02-03', '15:54:37', 'หมอ', 1, 'y', '', ''),
(7, 5, 4, '2025-02-03', '15:54:50', '', 1, 'y', 'video90.webm', 'application/octet-stream'),
(8, 5, 3, '2025-02-03', '15:55:30', 'เค', 2, 'y', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat_f`
--

CREATE TABLE `tb_chat_f` (
  `id_chat` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_friend` int(10) NOT NULL,
  `day_chat` date NOT NULL,
  `time_chat` time NOT NULL,
  `detail_chat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_chat_f`
--

INSERT INTO `tb_chat_f` (`id_chat`, `id_user`, `id_friend`, `day_chat`, `time_chat`, `detail_chat`) VALUES
(1, 4, 1, '2025-02-03', '15:58:24', 'gg'),
(2, 5, 1, '2025-02-03', '15:58:30', 'โย่ววว'),
(3, 4, 1, '2025-02-03', '15:58:35', 'fgfgf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id_com` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_news` int(10) NOT NULL,
  `day_com` date NOT NULL,
  `time_com` time NOT NULL,
  `detail_com` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_comment`
--

INSERT INTO `tb_comment` (`id_com`, `id_user`, `id_news`, `day_com`, `time_com`, `detail_com`) VALUES
(1, 1, 3, '2025-02-03', '13:46:36', 'dsgwsdfe'),
(2, 1, 3, '2025-02-03', '13:46:43', '<font color=red>***</font>'),
(3, 4, 2, '2025-02-03', '15:53:49', 'gggg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_friend`
--

CREATE TABLE `tb_friend` (
  `id_friend` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_user2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_friend`
--

INSERT INTO `tb_friend` (`id_friend`, `id_user`, `id_user2`) VALUES
(1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_his`
--

CREATE TABLE `tb_his` (
  `id_his` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_in` date NOT NULL,
  `sys` int(10) NOT NULL,
  `dia` int(10) NOT NULL,
  `heart` int(10) NOT NULL,
  `detail` text NOT NULL,
  `coin_user` int(10) NOT NULL,
  `status_mem` int(1) NOT NULL,
  `status_his` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_his`
--

INSERT INTO `tb_his` (`id_his`, `id_user`, `day_in`, `sys`, `dia`, `heart`, `detail`, `coin_user`, `status_mem`, `status_his`) VALUES
(1, 1, '2025-02-03', 100, 100, 100, '', 4, 2, 'y'),
(3, 5, '2025-02-03', 150, 45, 46, 'tsetfg', 4, 2, 'n'),
(5, 4, '2025-02-03', 100, 100, 100, 'ร้อน', 4, 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_like`
--

CREATE TABLE `tb_like` (
  `id_like` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_wques` int(10) NOT NULL,
  `status_like` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_like`
--

INSERT INTO `tb_like` (`id_like`, `id_user`, `id_wques`, `status_like`) VALUES
(1, 1, 2, 'y'),
(2, 4, 2, 'y'),
(3, 4, 3, 'y'),
(4, 5, 3, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_meet`
--

CREATE TABLE `tb_meet` (
  `id_meet` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_meet` date NOT NULL,
  `time_meet` time NOT NULL,
  `detail_meet` text NOT NULL,
  `type_cost` int(1) NOT NULL,
  `total` int(10) NOT NULL,
  `status_meet` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_meet`
--

INSERT INTO `tb_meet` (`id_meet`, `id_user`, `day_meet`, `time_meet`, `detail_meet`, `type_cost`, `total`, `status_meet`) VALUES
(1, 1, '2025-02-12', '10:00:00', 'ngn', 1, 1670, 'y'),
(2, 1, '2025-02-05', '16:21:00', 'dfdfdfd', 1, 1670, 'y'),
(3, 4, '2025-02-21', '15:57:00', 'มาแล้', 2, 1170, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `id_news` int(10) NOT NULL,
  `head_news` varchar(100) NOT NULL,
  `detail_news` text NOT NULL,
  `day_up` date NOT NULL,
  `count_news` int(10) NOT NULL,
  `pic_news` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id_news`, `head_news`, `detail_news`, `day_up`, `count_news`, `pic_news`) VALUES
(1, 'แสงแดดอันตรายกว่าที่คิด', 'แสงแดดอันตรายกว่าที่คิด เพราะเป็นสารก่อมะเร็งผิวหนังอับดับหนึ่ง', '2025-02-03', 0, '1.png'),
(2, 'รวมผลไม้ที่ดีต่อผู้สูงวัย', 'รวมผลไม้ที่ดีต่อผู้สูงวัย เราแนะนำ สัปประรด เพราะเป็นผลไม้ที่มีสรรพคุณในการชำระล้างสารพิษในร่างกาย', '2025-02-03', 4, '2.png'),
(3, 'กิจกรรมแนะนำสำหรับผู้สูงวัย', 'กิจกรรมแนะนำสำหรับผู้สูงวัย ได้แก่ การอ่านหนังสือเพราะจะชาวยในการทำงานของสมอง', '2025-02-03', 13, '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `day_order` date NOT NULL,
  `pay_order` int(1) NOT NULL,
  `num_order` int(10) NOT NULL,
  `type_order` int(1) NOT NULL,
  `total_order` int(10) NOT NULL,
  `exp` int(1) NOT NULL,
  `no_order` varchar(10) NOT NULL,
  `status_order` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_user`, `id_pro`, `day_order`, `pay_order`, `num_order`, `type_order`, `total_order`, `exp`, `no_order`, `status_order`) VALUES
(1, 1, 1, '2025-01-22', 2, 0, 1, 1500, 1, '12', 'f'),
(2, 4, 2, '2025-02-03', 1, 1, 2, 230, 1, '12123', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `tb_package`
--

CREATE TABLE `tb_package` (
  `id_pack` int(10) NOT NULL,
  `name_pack` varchar(100) NOT NULL,
  `price_pack` int(10) NOT NULL,
  `detail_pack` text NOT NULL,
  `disc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_package`
--

INSERT INTO `tb_package` (`id_pack`, `name_pack`, `price_pack`, `detail_pack`, `disc`) VALUES
(1, 'สมาชิก', 0, 'สมาชิก', 0),
(2, 'แอดมิน', 0, 'แอดมิน', 0),
(3, 'แพ็คภูมิคุ้มกัน', 1599, 'แพ็คภูมิคุ้มกัน ท่านจะได้รับระบบบันทึกสุขภาพประจำวัน  พร้อมกับได้รับแต้มตามสถานะอาการ และสามารถพูดคุยสนทนากับแพทย์ได้ นอกจากนีเยังได้รับส่วนลดจากบริการต่างๆมากถึง 5%!!!!!!!!!!!!!!!!!!!!!!', 5),
(4, 'แพ็คร่างกายแข็งแรง', 3599, 'แพ็คร่างกายแข็งแรง จะได้รับระบบที่เหมือนกับแพ็คภูมิคุ้มและจะเพิ่มระบบการแจ้งเตือนการรับประทานยา สุดท้ายนี้ยังได้รับส่วนลดจากบริการต่างๆ มากถึง 10% !!!!!!!!!!', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id_post` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_act` int(10) NOT NULL,
  `day_post` date NOT NULL,
  `time_post` time NOT NULL,
  `detail_post` text NOT NULL,
  `pic_post` varchar(100) NOT NULL,
  `sumvote` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`id_post`, `id_user`, `id_act`, `day_post`, `time_post`, `detail_post`, `pic_post`, `sumvote`) VALUES
(1, 1, 2, '2025-02-03', '15:28:46', 'f', '', 3),
(2, 2, 2, '2025-02-03', '15:51:21', 'n', '', 2),
(3, 3, 2, '2025-02-03', '15:51:54', 'test3', '', 1),
(4, 4, 2, '2025-02-03', '15:58:44', 'ffff', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pr`
--

CREATE TABLE `tb_pr` (
  `id_pr` int(10) NOT NULL,
  `name_pr` varchar(100) NOT NULL,
  `tel_pr` varchar(10) NOT NULL,
  `price_pr` int(10) NOT NULL,
  `url_pr` varchar(100) NOT NULL,
  `detail_pr` text NOT NULL,
  `type_ques` int(1) NOT NULL,
  `pic_pr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_pr`
--

INSERT INTO `tb_pr` (`id_pr`, `name_pr`, `tel_pr`, `price_pr`, `url_pr`, `detail_pr`, `type_ques`, `pic_pr`) VALUES
(1, 'GrandHealth', '0000000000', 0, 'http:grandhealth.com', 'GrandHealth', 4, '1.png'),
(2, 'GrandHealth', '0000000000', 0, 'http:grandhealth.com', 'GrandHealth', 4, '2.png'),
(4, 'GrandHealth', '0000000000', 0, 'http:grandhealth.com', 'GrandHealth', 4, '4.png'),
(5, 'Vitamin Center', '0984165165', 3500, 'http:vitamincenter.com', 'Vitamin Center ศูนย์รวมวิตามินบำรุงสุขภาพ', 1, '5.png'),
(6, 'Lactasoy', '0549816516', 3500, 'http:lactasoy.com', 'Lactasoy นมถั่วเหลืองปริมาณคับกล่อง', 3, '6.png'),
(7, 'Dr.Pong', '0561631589', 3500, 'http:dr.pong.com', 'Dr.Pong ผิวใสไว้ใจเรา', 2, '7.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_pro` int(10) NOT NULL,
  `name_pro` varchar(100) NOT NULL,
  `price_pro` int(10) NOT NULL,
  `num_pro` int(10) NOT NULL,
  `coin_pro` int(10) NOT NULL,
  `detail_pro` text NOT NULL,
  `type_ques` int(1) NOT NULL,
  `pic_pro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_pro`, `name_pro`, `price_pro`, `num_pro`, `coin_pro`, `detail_pro`, `type_ques`, `pic_pro`) VALUES
(1, 'dumbell 25 kg', 1500, 99, 99, 'dumbell 25 kg เหมาะสำหรับผู้ที่ออกกำลังอย่าวสม่ำเสมอ', 1, '1.png'),
(2, 'น้ำยาบ้วนปาก GrandHealth', 399, 99, 1, 'น้ำยาบ้วนปาก GrandHealth หอมสดชื่นตลอดวัน', 3, '2.png'),
(3, 'ยาดมหงษ์ทอง', 49, 100, 1, 'ยาดมหงษ์ทอง แก้บรรเทาอาการหวิงเวียนศรีษะ', 1, '3.png'),
(4, 'ครีมกันแดด SPF50', 250, 1, 1, 'ครีมกันแดด SPF50 ป้องกันผิวจากแสงแดดสุดอันตราย', 2, '4.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `id_ques` int(10) NOT NULL,
  `question` varchar(100) NOT NULL,
  `type_ques_n` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_question`
--

INSERT INTO `tb_question` (`id_ques`, `question`, `type_ques_n`) VALUES
(1, 'เว็บไซต์มีความสะดวกต่อการใช้งาน', 1),
(3, 'เว็บไซต์มีการออกแบบที่สวยงามและน่าสนใจ', 1),
(4, 'ข้อมูลบนเว็บไซต์มีความชัดเจนและครบถ้วน', 1),
(5, 'ระบบการแจ้งเตือนของเว็บไซต์มีประโยชน์และตรงเวลา', 1),
(6, 'การจัดวางเมนูทำให้เข้าใจง่าย', 1),
(7, 'เว็บไซต์สามารถใช้งานได้อย่างปกติบนอุปกรณ์ต่างๆ', 1),
(8, 'ระบบค้นหาข้อมูลทำได้อย่างมีประสิทธิภาพ', 1),
(9, 'เว็บไซต์มีความปลอดภัย', 1),
(10, 'ระบบสังคมออนไลน์ของผู้สูงวัยเข้าใจง่ายและมีประโยชน์', 1),
(11, 'โดยรวมแล้วคุณพอใจต่อการใช้งานเว็บไซต์', 1),
(12, 'แพทย์ให้คำปรึกษาอย่างชัดเจนเข้าใจง่าย', 2),
(13, 'แพทย์เอาใจใส่ต่อปัญหาและข้อกังวัลของผู้ป่วย', 2),
(14, 'แพทย์ให้คำแนะนำตรงกับปัญหาหรืออาการ', 2),
(15, 'แพทย์สุภาพและให้เกียรติผู้ป่วย', 2),
(16, 'แพทย์มีความเชี่ยวชาญในการรักษา', 2),
(17, 'แพทย์ให้บริการหรือรักาาคนไข้ตามเวลาที่กำหนด', 2),
(18, 'แพทย์มีการติดตามผลการรักษาอย่างต่อเนื่อง', 2),
(19, 'แพทย์อธิบายขั้นตอนหรือกระบวนการการรักษาอย่างละเอียดและเข้าใจง่าย', 2),
(20, 'แพทย์มีความพร้อมต่อการให้บริการ', 2),
(21, 'โดยรอบแล้วคุณพึงพอใจต่อการให้บริการของแพทย์', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ques_n`
--

CREATE TABLE `tb_ques_n` (
  `id_ques_n` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_ques` date NOT NULL,
  `type_ques_n` int(1) NOT NULL,
  `status_n` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_ques_n`
--

INSERT INTO `tb_ques_n` (`id_ques_n`, `id_user`, `day_ques`, `type_ques_n`, `status_n`) VALUES
(8, 1, '2025-02-03', 2, 'y'),
(9, 1, '2025-02-03', 1, 'y'),
(10, 4, '2025-02-03', 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `sname_user` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `born` date NOT NULL,
  `sex` int(1) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `addr` text NOT NULL,
  `sys` int(10) NOT NULL,
  `dia` int(10) NOT NULL,
  `heart` int(10) NOT NULL,
  `dise` text NOT NULL,
  `coin_user` int(10) NOT NULL,
  `status_mem` int(1) NOT NULL,
  `id_pack` int(10) NOT NULL,
  `status_pack` char(1) NOT NULL,
  `pic_user` varchar(100) NOT NULL,
  `status_on` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name_user`, `sname_user`, `user`, `pass`, `born`, `sex`, `tel`, `addr`, `sys`, `dia`, `heart`, `dise`, `coin_user`, `status_mem`, `id_pack`, `status_pack`, `pic_user`, `status_on`) VALUES
(1, 'test1', 'test111', 'test1', '123', '1949-02-05', 1, '0981651651', 'nan', 100, 100, 100, '', 57, 2, 4, 'y', '1.jpg', 'n'),
(2, 'test2', 'test222', 'test2', '123', '1978-02-10', 2, '0894164198', 'nan', 100, 100, 100, '', 24, 2, 1, 'n', '2.jpg', 'n'),
(3, 'test3', 'test333', 'test3', '123', '1989-02-02', 1, '0941641984', 'nan', 48, 25, 10, '', 4, 2, 1, 'n', '3.jpg', 'n'),
(4, 'pupu', 'pipi', 'pupu', '123', '1978-01-29', 1, '0984161964', 'nan 55000', 100, 100, 100, '', 33, 2, 4, 'y', '4.jpg', 'y'),
(5, 'สมชาย', 'สายคม', 'somchai', '123', '1985-01-31', 2, '0654858745', 'nan', 45, 56, 67, 'test', 4, 1, 4, 'y', '5.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vote`
--

CREATE TABLE `tb_vote` (
  `id_vote` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_act` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `vote` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_vote`
--

INSERT INTO `tb_vote` (`id_vote`, `id_user`, `id_act`, `id_post`, `vote`) VALUES
(1, 1, 2, 1, 3),
(2, 2, 2, 2, 2),
(3, 3, 2, 3, 1),
(4, 4, 2, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_webans`
--

CREATE TABLE `tb_webans` (
  `id_wans` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_wques` int(10) NOT NULL,
  `day_ans` date NOT NULL,
  `time_ans` time NOT NULL,
  `detail_ans` text NOT NULL,
  `type_ans` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_webans`
--

INSERT INTO `tb_webans` (`id_wans`, `id_user`, `id_wques`, `day_ans`, `time_ans`, `detail_ans`, `type_ans`) VALUES
(2, 1, 2, '2025-02-03', '15:42:04', 'h', 1),
(3, 4, 2, '2025-02-03', '15:58:12', 'ggg', 1),
(4, 4, 3, '2025-02-03', '15:58:18', 'จุกกรู๊วว', 1),
(5, 1, 3, '2025-02-03', '16:04:59', 'เอโย่ว', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_webques`
--

CREATE TABLE `tb_webques` (
  `id_wques` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_ques` date NOT NULL,
  `time_ques` time NOT NULL,
  `detail_ques` text NOT NULL,
  `type_ques` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_webques`
--

INSERT INTO `tb_webques` (`id_wques`, `id_user`, `day_ques`, `time_ques`, `detail_ques`, `type_ques`) VALUES
(2, 1, '2025-02-03', '15:17:33', 'หกดเ', 2),
(3, 4, '2025-02-03', '15:58:14', 'สวัสดีครับ', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_act`
--
ALTER TABLE `tb_act`
  ADD PRIMARY KEY (`id_act`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_ad`),
  ADD KEY `id_pack` (`id_pack`);

--
-- Indexes for table `tb_alert`
--
ALTER TABLE `tb_alert`
  ADD PRIMARY KEY (`id_alert`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD PRIMARY KEY (`id_ans`),
  ADD KEY `id_ques` (`id_ques`),
  ADD KEY `id_ques_n` (`id_ques_n`);

--
-- Indexes for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_his` (`id_his`);

--
-- Indexes for table `tb_chat_f`
--
ALTER TABLE `tb_chat_f`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_news` (`id_news`);

--
-- Indexes for table `tb_friend`
--
ALTER TABLE `tb_friend`
  ADD PRIMARY KEY (`id_friend`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_his`
--
ALTER TABLE `tb_his`
  ADD PRIMARY KEY (`id_his`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_like`
--
ALTER TABLE `tb_like`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_wques` (`id_wques`);

--
-- Indexes for table `tb_meet`
--
ALTER TABLE `tb_meet`
  ADD PRIMARY KEY (`id_meet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `tb_package`
--
ALTER TABLE `tb_package`
  ADD PRIMARY KEY (`id_pack`);

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_act` (`id_act`);

--
-- Indexes for table `tb_pr`
--
ALTER TABLE `tb_pr`
  ADD PRIMARY KEY (`id_pr`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`id_ques`);

--
-- Indexes for table `tb_ques_n`
--
ALTER TABLE `tb_ques_n`
  ADD PRIMARY KEY (`id_ques_n`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_pack` (`id_pack`);

--
-- Indexes for table `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_act` (`id_act`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `tb_webans`
--
ALTER TABLE `tb_webans`
  ADD PRIMARY KEY (`id_wans`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_wques` (`id_wques`);

--
-- Indexes for table `tb_webques`
--
ALTER TABLE `tb_webques`
  ADD PRIMARY KEY (`id_wques`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_act`
--
ALTER TABLE `tb_act`
  MODIFY `id_act` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_ad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_alert`
--
ALTER TABLE `tb_alert`
  MODIFY `id_alert` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_answer`
--
ALTER TABLE `tb_answer`
  MODIFY `id_ans` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_chat_f`
--
ALTER TABLE `tb_chat_f`
  MODIFY `id_chat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id_com` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_friend`
--
ALTER TABLE `tb_friend`
  MODIFY `id_friend` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_his`
--
ALTER TABLE `tb_his`
  MODIFY `id_his` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_like`
--
ALTER TABLE `tb_like`
  MODIFY `id_like` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_meet`
--
ALTER TABLE `tb_meet`
  MODIFY `id_meet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id_news` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_package`
--
ALTER TABLE `tb_package`
  MODIFY `id_pack` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pr`
--
ALTER TABLE `tb_pr`
  MODIFY `id_pr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_pro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `id_ques` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_ques_n`
--
ALTER TABLE `tb_ques_n`
  MODIFY `id_ques_n` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `id_vote` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_webans`
--
ALTER TABLE `tb_webans`
  MODIFY `id_wans` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_webques`
--
ALTER TABLE `tb_webques`
  MODIFY `id_wques` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
