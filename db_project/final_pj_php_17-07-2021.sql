-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2021 at 05:40 PM
-- Server version: 10.4.18-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u786845037_vy`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus_content`
--

CREATE TABLE `aboutus_content` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `aboutus_content`
--

INSERT INTO `aboutus_content` (`id`, `title`, `content`) VALUES
(1, 'OUR PURPOSE: THROUGH SPORT, WE HAVE THE POWER TO CHANGE LIVES ', '<p>Everything we do is rooted in sport. Sport plays an increasingly important role in more and more people’s lives, on and off the field of play. It is central to every culture and society and is core to our health and happiness.\r\n</p><p>\r\nOur purpose, ‘through sport, we have the power to change lives’, guides the way we run our company, how we work with our partners, how we create our products, and how we engage with our consumers. We will always strive to expand the limits of human possibilities, to include and unite people in sport, and to create a more sustainable world.</p>'),
(2, 'OUR MISSION: TO BE THE BEST SPORTS BRAND IN THE WORLD', 'Athletes do not settle for average. And neither do we. We have a clear mission: To be the best sports brand in the world. Every day, we come to work to create and sell the best sports products in the world, and to offer the best service and consumer experience – and to do it all in a sustainable way. We are the best when we are the credible, inclusive, and sustainable leader in our industry.'),
(3, 'OUR ATTITUDE: IMPOSSIBLE IS NOTHING', 'At adidas, we are rebellious optimists driven by action, with a desire to shape a better future together. We see the world of sport and culture with possibility where others only see the impossible. ‘Impossible is Nothing’ is not a tagline for us. By being optimistic and knowing the power of sport, we see endless possibilities to apply this power and push all people forward with action.');

-- --------------------------------------------------------

--
-- Table structure for table `aboutus_member`
--

CREATE TABLE `aboutus_member` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `job` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `aboutus_member`
--

INSERT INTO `aboutus_member` (`id`, `image`, `name`, `job`, `facebook`, `twitter`) VALUES
(1, '01.jpg', 'Nguyen Ha Vy', 'Team Leader/Developer', 'https://www.facebook.com/vy.vuvo.7', 'https://www.twitter.com/'),
(2, '8ae63595047bb0fa9b60eeb3a4e418c2.jpg', 'Nguyen Son Ngoc', 'Developer', 'https://www.facebook.com/devillias', 'https://www.twitter.com/'),
(3, '03.jpg', 'Phan Thanh Nam', 'Designer', 'https://www.facebook.com/profile.php?id=100031236606453', 'https://www.twitter.com/'),
(4, '151348914_457028792006031_8919167378005785558_n.png', 'Nguyen Anh Tai', 'Developer', 'https://www.facebook.com/ngynanhtai/', 'https://www.twitter.com/');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `password`, `created_at`, `updated_at`, `token`) VALUES
(1, 'vy', '123', NULL, '2021-06-28 23:05:13', '953f102a08'),
(15, 'nam', '123', '2021-07-08 21:02:45', NULL, '7663d383b5'),
(16, 'tai', '123', '2021-07-11 21:04:49', NULL, '84d1252d66'),
(18, 'nero', '3103', '2021-07-12 09:40:22', '2021-07-16 19:33:48', '54ca926228'),
(21, 'test', '123', '2021-07-16 10:24:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `href_param` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `ordinal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`, `href_param`, `image`, `isActive`, `ordinal`) VALUES
(1, 'Adidas', NULL, '2021-06-16 16:26:11', 'Adidas', 'adidas-logo-818x621.jpg', 1, 2),
(2, 'Converse', NULL, '2021-07-15 00:17:12', 'Converse', 'logo_converse_thumbnail.jpg', 1, 3),
(3, 'Puma', NULL, '2021-06-16 16:49:11', 'Puma', 'puma-logo.png', 1, 4),
(4, 'Nike', NULL, '2021-06-16 16:55:11', 'Nike', 'logo-nike.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `size` varchar(25) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_product`, `quantity`, `price`, `created_at`, `size`, `name`, `id_user`, `updated_at`) VALUES
(183, 211, 3, 289, '2021-06-12 19:35:51', 'size39', 'TERREX FREE HIKER PARLEY', 11, '2021-06-26 13:14:32'),
(189, 237, 1, 356, '2021-06-13 23:24:43', 'size36', 'CHINATOWN MARKET', 0, '2021-06-13 23:24:43'),
(203, 211, 3, 289, '2021-06-16 08:18:27', 'size37', 'TERREX FREE HIKER PARLEY', 0, '2021-06-26 13:14:32'),
(215, 211, 3, 289, '2021-06-18 02:53:43', 'size36', 'TERREX FREE HIKER PARLEY', 0, '2021-06-26 13:14:32'),
(216, 218, 1, 256, '2021-06-18 21:50:58', 'size36', 'PUMA LACE RIDER POP', 31, '2021-06-24 05:42:07'),
(217, 215, 1, 312, '2021-06-18 22:08:09', 'size39', 'CHUCK TAYLOR ALL STAR CX', 31, '2021-06-18 22:08:09'),
(218, 215, 1, 312, '2021-06-19 13:07:17', 'size36', 'CHUCK TAYLOR ALL STAR CX', 0, '2021-06-24 12:34:12'),
(228, 211, 3, 289, '2021-06-22 00:27:35', 'size36', 'TERREX FREE HIKER PARLEY', 0, '2021-06-26 13:14:32'),
(238, 229, 1, 400, '2021-06-22 23:37:54', 'size37', 'PHARRELL WILLIAMS CRAZY', 0, '2021-06-22 23:37:54'),
(254, 212, 2, 399, '2021-06-26 15:12:45', 'size36', 'PHARRELL WILLIAMS D.O.N.', 0, '2021-06-28 14:00:16'),
(259, 239, 1, 600, '2021-06-26 16:19:06', 'size40', 'ADIDAS KAMANDA', 33, '2021-06-26 16:19:06'),
(263, 213, 5, 356, '2021-06-26 20:34:40', 'size40', 'ADIDAS ULTRABOOST 20', 32, '2021-06-26 13:40:40'),
(264, 245, 2, 568, '2021-06-26 23:30:15', 'size36', '4D FUTURECRAFT', 0, '2021-06-27 06:35:25'),
(266, 245, 2, 568, '2021-06-27 13:02:24', 'size36', '4D FUTURECRAFT', 0, '2021-06-27 06:35:25'),
(269, 212, 2, 399, '2021-06-28 13:51:11', 'size36', 'PHARRELL WILLIAMS D.O.N.', 0, '2021-06-28 14:00:16'),
(272, 274, 1, 700, '2021-07-03 22:52:48', 'size38', 'SUPERSTAR FUTURESHELL', 35, '2021-07-03 22:52:48'),
(273, 273, 1, 123, '2021-07-03 22:02:49', 'size37', 'ADIDAS ZX 2K 4D', 35, '2021-07-03 22:02:49'),
(275, 274, 1, 700, '2021-07-09 00:27:00', 'size37', 'SUPERSTAR FUTURESHELL', 41, '2021-07-09 00:27:00'),
(278, 274, 9, 700, '2021-07-11 00:51:49', 'size36', 'SUPERSTAR FUTURESHELL', 0, '2021-07-15 13:33:52'),
(295, 273, 4, 123, '2021-07-15 00:21:35', 'size36', 'ADIDAS ZX 2K 4D', 0, '2021-07-15 00:21:35'),
(305, 274, 9, 700, '2021-07-15 01:40:01', 'size36', 'SUPERSTAR FUTURESHELL', 0, '2021-07-15 13:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_info_table`
--

CREATE TABLE `contact_form_info_table` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `comment` varchar(550) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_form_info_table`
--

INSERT INTO `contact_form_info_table` (`id`, `name`, `email`, `phone`, `comment`) VALUES
(34, 'Nguyễn Sơn Ngọc', 'sonngoc@gmail.com', 938472129, 'I want to ask about policy'),
(35, 'Nguyễn Hạ Vy', 'havy@gmail.com', 394567899, 'I want to ask about administrative policy. I once bought a pair of shoes at the store but unfortunately it was broken'),
(36, 'Nguyễn Anh Tài', 'anhtai@gmail.com', 397845219, 'I want to ask about administrative policy. I once bought a pair of shoes at the store but unfortunately it was broken'),
(37, 'Nguyễn Nghệ Tinh', 'nghetinh@gmail.com', 39456129, 'I would like to ask about the upcoming new shoes from Nike and Adidas'),
(38, 'Nguyễn Anh Tài', 'anhtai@gmail.com', 381237899, 'I would like to ask about the upcoming new shoes from Nike and Adidas'),
(39, 'Nguyễn Sơn Ngọc', 'sonngoc@gmail.com', 371239877, 'I would like to ask about the upcoming new shoes from Nike and Adidas');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_addmap`
--

CREATE TABLE `contact_us_addmap` (
  `id` int(11) NOT NULL,
  `location` varchar(650) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us_addmap`
--

INSERT INTO `contact_us_addmap` (`id`, `location`) VALUES
(1, '<iframe class=\"col-sm-12\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7303590711044!2d106.77231641415028!3d10.831935061130151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527010fcb280b%3A0x233af08cb7b0b446!2zMjksIDEgxJDGsOG7nW5nIFPhu5EgMTQ3LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1624091601525!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(16, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125170.34145153155!2d106.05961273638646!3d11.365854778651178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310b6aeab90d3fc5%3A0xa059d1214008df15!2zVHAuIFTDonkgTmluaCwgVMOieSBOaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1624102328453!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(17, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.7119348522!2d-0.3817854932712556!3d51.528735196345664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2zTHXDom4gxJDDtG4sIFbGsMahbmcgUXXhu5FjIEFuaA!5e0!3m2!1svi!2s!4v1624860036596!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(18, '<iframe class=\"col-sm-12\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7303590711044!2d106.77231641415028!3d10.831935061130151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527010fcb280b%3A0x233af08cb7b0b446!2zMjksIDEgxJDGsOG7nW5nIFPhu5EgMTQ3LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1624091601525!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(19, '<iframe class=\"col-sm-12\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7303590711044!2d106.77231641415028!3d10.831935061130151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527010fcb280b%3A0x233af08cb7b0b446!2zMjksIDEgxJDGsOG7nW5nIFPhu5EgMTQ3LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1624091601525!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(20, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501726.4604611144!2d106.4150270670207!3d10.754666392789975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zSOG7kyBDaMOtIE1pbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1624099632249!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(21, '<iframe class=\"col-sm-12\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7303590711044!2d106.77231641415028!3d10.831935061130151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527010fcb280b%3A0x233af08cb7b0b446!2zMjksIDEgxJDGsOG7nW5nIFPhu5EgMTQ3LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1624091601525!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(22, '<iframe class=\"col-sm-12\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7303590711044!2d106.77231641415028!3d10.831935061130151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527010fcb280b%3A0x233af08cb7b0b446!2zMjksIDEgxJDGsOG7nW5nIFPhu5EgMTQ3LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1624091601525!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(23, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501726.4604611144!2d106.4150270670207!3d10.754666392789975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zSOG7kyBDaMOtIE1pbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1624099632249!5m2!1svi!2s\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(24, '<iframe class=\"col-sm-12\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7303590711044!2d106.77231641415028!3d10.831935061130151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527010fcb280b%3A0x233af08cb7b0b446!2zMjksIDEgxJDGsOG7nW5nIFPhu5EgMTQ3LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1624091601525!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(25, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125170.34145160599!2d106.05961201887222!3d11.365854778481712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310b6aeab90d3fc5%3A0xa059d1214008df15!2zVHAuIFTDonkgTmluaCwgVMOieSBOaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1626071061429!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(26, '<iframe class=\"col-sm-12\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7303590711044!2d106.77231641415028!3d10.831935061130151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527010fcb280b%3A0x233af08cb7b0b446!2zMjksIDEgxJDGsOG7nW5nIFPhu5EgMTQ3LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1624091601525!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(27, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501726.4604611144!2d106.4150270670207!3d10.754666392789975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zSOG7kyBDaMOtIE1pbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1624099632249!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(28, '<iframe class=\"col-sm-12\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7303590711044!2d106.77231641415028!3d10.831935061130151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527010fcb280b%3A0x233af08cb7b0b446!2zMjksIDEgxJDGsOG7nW5nIFPhu5EgMTQ3LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1624091601525!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(29, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31358.859376409226!2d106.6205678060875!3d10.745470009910324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e7cff633fdd%3A0x85ee85db9cb263ba!2zUXXhuq1uIDYsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1626440086831!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(30, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31358.859376409226!2d106.6205678060875!3d10.745470009910324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e7cff633fdd%3A0x85ee85db9cb263ba!2zUXXhuq1uIDYsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1626440086831!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(31, '<iframe class=\"col-sm-12\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7303590711044!2d106.77231641415028!3d10.831935061130151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527010fcb280b%3A0x233af08cb7b0b446!2zMjksIDEgxJDGsOG7nW5nIFPhu5EgMTQ3LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1624091601525!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(32, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501726.4604611144!2d106.4150270670207!3d10.754666392789975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zSOG7kyBDaMOtIE1pbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1624099632249!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(33, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501726.4604611144!2d106.4150270670207!3d10.754666392789975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zSOG7kyBDaMOtIE1pbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1624099632249!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(34, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31358.859376409226!2d106.6205678060875!3d10.745470009910324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e7cff633fdd%3A0x85ee85db9cb263ba!2zUXXhuq1uIDYsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1626442346023!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `used` int(11) DEFAULT NULL,
  `required` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'active',
  `discount` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `code`, `amount`, `used`, `required`, `status`, `discount`, `token`) VALUES
(7, 'SNEAKER10', 10, 4, 300, 'active', 10, '0dd2c71281'),
(8, 'SNEAKER20', 10, 2, 400, 'active', 20, '3629d87448'),
(15, 'BIGSALE2606', 5, 1, 300, 'active', 100, '2eba0c9702'),
(16, 'TEST', 1, 1, 1500, 'used up', 1000, 'dc13b683b2');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `startingday` varchar(45) DEFAULT NULL,
  `endday` varchar(45) DEFAULT NULL,
  `id_discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `topic_id`, `title`, `image`, `content`, `description`, `startingday`, `endday`, `id_discount`) VALUES
(75, 39, 'ZURICH TBA HALLE 622, ZURICH OERLIKON', 'SN_19ZRH_Laces_1920x1080px.png', '&lt;table&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;h2&gt;&lt;strong&gt;PRACTICAL INFO&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h2&gt;PRACTICAL INFO&lt;/h2&gt;\r\n\r\n			&lt;h3&gt;COMPACT, AT THE CENTER OF ATTENTION, HOME TO US.&lt;/h3&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;p&gt;Zurich is a small city full of exciting people. When it comes to fashion and lifestyle the Swiss city has drawn quite some attention to itself recently &amp;ndash; not only since some of the most celebrated brands set up shop. Zurich means roots to us. The city, neatly located between lakes and mountains, is our hub and it has been the place to kick things off every year since 2009. We are particularly proud to present a special and broad program in Zurich including the most important brands, shops and private sellers from all over Europe, sneaker-talks, a street soccer challenge, our annual party and more.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;h3&gt;&amp;nbsp;&lt;/h3&gt;\r\n\r\n			&lt;ul&gt;\r\n				&lt;li&gt;\r\n				&lt;h3&gt;&lt;strong&gt;GET TICKET (Update)&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;ADMISSION&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;Presale: SAT CHF 15.&amp;ndash; / SUN CHF 13.&amp;ndash;/&lt;br /&gt;\r\n				2-Days CHF 20.&amp;ndash;&lt;br /&gt;\r\n				Box Office: SAT CHF 18.&amp;ndash; / SUN CHF 13.&amp;ndash; /&lt;br /&gt;\r\n				2-Days CHF 25.&amp;ndash;&lt;/p&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;HOURS&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;SAT 12.00&amp;ndash;19.00 / SUN 12.00&amp;ndash;18.00&lt;br /&gt;\r\n				Priority access at 11.00&lt;/p&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;ADDRESS&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;Halle 622&lt;br /&gt;\r\n				10 Therese-Giehse-Strasse&lt;br /&gt;\r\n				8050 Z&amp;uuml;rich, Switzerland&lt;/p&gt;\r\n\r\n				&lt;p&gt;&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n				&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;h2&gt;IMPRESSIONS&amp;nbsp;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/2018/03/SN_ZRH_pic_02-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/2018/03/SN_ZRH_pic_01-1080x809.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/2018/03/SN_ZRH_pic_08-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/2018/03/SN_ZRH_pic_09-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/2018/03/SN_ZRH_pic_10-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/2018/03/SN_ZRH_pic_11-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/2018/03/SN_ZRH_pic_12-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;HIGHLIGHTS&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;General Infoall days&lt;/p&gt;\r\n\r\n			&lt;h3&gt;TICKETING&lt;/h3&gt;\r\n\r\n			&lt;p&gt;You do not have your ticket yet? The time has come. Buy your ticket online&amp;nbsp;&lt;a href=&quot;https://www.starticket.ch/de/tickets/sneakerness-2020-20200509-1200-halle-622-zurich&quot;&gt;here&lt;/a&gt;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;General Infoall days&lt;/p&gt;\r\n\r\n			&lt;h3&gt;FOOD &amp;amp; BEVERAGE&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Shake off the eternal companion hunger and thirst by getting food from Palestine Grill, Lunchbox and Wesleys Kitchen. A selection of soft drinks, beers and wine from Piedmont will be provided at different bars.&lt;/p&gt;\r\n\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;h3&gt;SAUCE&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Our buddies will release their new limited collection. Be careful, otherwise you will not get anything again. Too much Sauce!&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Musicall days&lt;/p&gt;\r\n\r\n			&lt;h3&gt;DJ-SETS&lt;/h3&gt;\r\n\r\n			&lt;p&gt;No Sneakerness without DJs. Restelezz will host the Saturday and our homie from 3006 will get that Sunday flow.&amp;nbsp;To get into the right mood listen to our Spotify playlists&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;h3&gt;HAVANA CLUB&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Let&amp;rsquo;s be honest, every one of us sipped on a Cuba Libre. So far so good, Havana Club &amp;nbsp;will come up with some new delicious drinks you never had before. Drink responsible, trust us!&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n', '', '2021-07-08', '2021-07-17', 7),
(76, 39, 'ROTTERDAM 30 NOVEMBER – 01 DECEMBER, 2019 ONDERZEEBOOTLOODS', 'SN_19RTM_Laces_1920x1080px-570x320.png', '&lt;table&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;h2&gt;&lt;strong&gt;PRACTICAL INFO&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;ROTTERDAM: IMMENSE, EVER NEW, A MUST-SEE TO US.&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;p&gt;Think great architecture, an immense harbor, a wild (street) art scene, amazing places for music, plus an innovative sneaker community, and you get the second largest city of the Netherlands: Rotterdam. The city&amp;rsquo;s cultural richness is minted by its dramatic history: During World War II Rotterdam got bombarded, but its diverse inhabitants have been reconstructing and reshaping the city in many ways ever since.&lt;/p&gt;\r\n\r\n			&lt;p&gt;Thus, Rotterdam is a fascinating must-see to us &amp;ndash; and we are thrilled to bring our convention to the Dutch city&amp;rsquo;s cultural landscape. Be prepared to discover international brands, extraordinary sneaker stores, and some of the most exquisite private sellers and collectors from all over the place at this year&amp;rsquo;s Sneakerness Rotterdam.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;h3&gt;&amp;nbsp;&lt;/h3&gt;\r\n\r\n			&lt;ul&gt;\r\n				&lt;li&gt;\r\n				&lt;h3&gt;&lt;strong&gt;GET TICKET (Update)&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;ADMISSION&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;Presale: SAT &amp;euro; 13.&amp;ndash; / SUN &amp;euro; 11.&amp;ndash; / 2-Days &amp;euro; 15.&amp;ndash; / Priority &amp;euro; 50.&amp;ndash;&lt;br /&gt;\r\n				Box office: SAT &amp;euro; 15.&amp;ndash; / SUN &amp;euro; 12.&amp;ndash;&lt;/p&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;HOURS&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;SAT 12.00&amp;ndash;18.00&lt;br /&gt;\r\n				SUN 12.00&amp;ndash;18.00&lt;br /&gt;\r\n				Priority access on SAT 11.00&lt;/p&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;ADDRESS&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;Onderzeebootloods&lt;br /&gt;\r\n				RDM-straat 1, 3089 JS Rotterdam&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n\r\n				&lt;p&gt;&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n				&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;IMPRESSIONS&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_RTM_pic_01-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_RTM_pic_02-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_RTM_pic_08-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img src=&quot;https://sneakerness.com/app/uploads/SN_RTM19_Gif_Laces_1440x1080px.gif&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_RTM_pic_09-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_RTM_pic_10-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_RTM_pic_11-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;HIGHLIGHTS&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Partnersall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;STOCKX - DROP-OFF POINT&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;StockX will bring their popular drop-off point, allowing consumers to both authenticate their product without any shipping hassle, and initiate the payment process on site.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Partnersall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SWATCH&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;You have the chance to buy one of the highly limited Swatch &amp;times; BAPE watches. You can get more information at their booth.&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;General Infoall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;KIDS CORNER&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Feel free to bring your little ones along to Sneakerness Rotterdam!&amp;nbsp;Kids up to 12 years get free entrance. There will be a Kids Corner to keep them busy so mom and dad can go on the hunt for that perfect pair.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Partnersall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;CREP PROTECT&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Watch out! Our friends from Crep Protect will present some of the rarest kicks on the market and provide you some free cleaning services&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Musicall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;DJ-SET&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;We are delighted to announce that&amp;nbsp;&lt;a href=&quot;https://business.facebook.com/TurneFlynn/&quot;&gt;DJ Turne&amp;nbsp;&lt;/a&gt;will be pumpin&amp;rsquo; some great tunes again at Sneakerness Rotterdam on both days.&amp;nbsp;Easily one of the best DJ&amp;rsquo;s of the lowlands.&lt;/p&gt;\r\n\r\n			&lt;p&gt;.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;General Infoall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;FOOD &amp;amp; BEVERAGES&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;We know, sneaker hunting costs loads of energy and gets you mad hungry and super thirsty! That&amp;rsquo;s why we will take good care of you at Sneakerness Rotterdam.&amp;nbsp;Insanely good food, fresh coffee, cold beers and refreshing drinks.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;General Infoall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;PRIME&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Bringing crazy heat as always, but also offering their consignment service! Want to get rid of some pairs? They will take care of it for you!&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Partnersall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;REELL&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;With a fresh and full-fledged Fall/Winter range that combines clean design and an unobtrusive style together with functionality and durability, the European brand&amp;nbsp;&lt;a href=&quot;https://business.facebook.com/REELLJEANS/&quot;&gt;Reell&lt;/a&gt;&amp;nbsp;will be presenting their latest collection.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;General Infoall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;GRAFFITI LIVE PAINTING&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Musketon will be painting live at Sneakerness Rotterdam to create some stunning artwork on the spot!&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Releaseall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SNEAKERNESS X TEAM DAUERFEUER&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;We proudly announce our collab with German based brand &amp;ldquo;&lt;a href=&quot;https://www.instagram.com/team_dauerfeuer&quot;&gt;Team Dauerfeuer&lt;/a&gt;&amp;ldquo;.We will sell the collection consisting Hoodie, Crew Neck, two T-Shirts and Socks at all stops. Watch out our social for more info.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;General Infoall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SNEAKERS PARADISE&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Give a second life to the pairs that you really don&amp;rsquo;t wear and donate them to Sneakers Paradise so they can give them to the people in need in Africa. You&amp;rsquo;ll receive a raffle ticket for every pair you&amp;rsquo;ll bring in and instant karma points. One love.&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Partnersall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SNEAKER FREAKER&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Sneaker Freaker&amp;nbsp;will be in Rotterdam to present their&amp;nbsp;&lt;em&gt;Ultimate Sneaker Book&lt;/em&gt;, of which they will create a giant shoe sculpture. Don&amp;rsquo;t miss out on this&amp;nbsp;700 rock-solid pages of content and grab your copy!&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Partnersall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SNEAKERBAAS X VIJZ&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;SneakerBAAS teamed up with VIJZ to create 50 unique Rotterdam themed sneakers. Drop by their booth to learn how to win a pair.&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;General Infoall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SAUCONY EXPO&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;With over 550 pairs, Sergey Vetrov owns the largest collection of Saucony Originals in the world. He picked 20 rare vintage Saucony pairs for you to enjoy.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Partnersall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;FOOT LOCKER NAIL BAR&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Get your nails done for free by The Happy Toko&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;Partnersall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;STOCK X AIR MAX 90 EXPO&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;We&amp;rsquo;ve asked Iceberg, aka&amp;nbsp;@karl.lashnikov, one of the Masters of Air, to showcase a colorful selection of Air Max 90&amp;rsquo;s from his amazing collection.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;General Infoall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;CUSTOMIZERS AREA&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;We brought out some of the best customizers in Europe. Come and watch the pros in action as they perform live customizations and restorations.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;h3&gt;&lt;strong&gt;VEDETT X VIJZ SNEAKER RAFFLE&amp;nbsp;&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;p&gt;Buy a Vedett beer at the bar and have a chance at winning a unique pair of handcrafted Vedett bespokes by VIJZ.&lt;/p&gt;\r\n\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&lt;em&gt;General Infoall days&lt;/em&gt;&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;ART GALLERY&amp;nbsp;&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Sneakerness invited some of the most talented artists from all over Europe to showcase their best sneaker related art work.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n', 'ROTTERDAM\r\n30 NOVEMBER – 01 DECEMBER, 2019\r\nONDERZEEBOOTLOODS', '2021-07-13', '2021-07-31', 15),
(77, 39, 'PARIS 07 – 08 SEPTEMBER, 2019 PARIS EVENT CENTER', 'SN_19PRS_Laces_1920x1080px-570x320.png', '&lt;table&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;h2&gt;&lt;strong&gt;PRACTICAL INFO&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;PARIS: MASSIVE, FASHION SAVVY, A LOVE AFFAIR TO US.&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;p&gt;Paris is the city of love, they say. And we are not only crazy in love with kicks, but also with the French capital. You dare asking why? Strolling through the streets of Paris is exceptional &amp;ndash; you find yourself next to the fashion savvy Parisians, surrounded by an extraordinary architecture, that often is covered in graffiti hinting at the rich local hip-hop culture. It is in this context that Sneakerness Paris takes place since many years. At the convention you meet international brands like StockX, Swatch, Foot Locker and Crep Protect, as well as private sellers and collectors from all over Europe.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;h3&gt;&amp;nbsp;&lt;/h3&gt;\r\n\r\n			&lt;ul&gt;\r\n				&lt;li&gt;\r\n				&lt;h3&gt;&lt;strong&gt;GET TICKET (Update)&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;ADMISSION&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;Presale: Early bird: 2-Days &amp;euro; 10.&amp;ndash; / SAT &amp;euro; 13.&amp;ndash; / SUN &amp;euro; 11.&amp;ndash; / 2-Days &amp;euro; 15.&amp;ndash; / Priority &amp;euro; 50.&amp;ndash;&lt;br /&gt;\r\n				Box office: SAT &amp;euro; 15.&amp;ndash; / SUN &amp;euro; 12.&amp;ndash;&lt;/p&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;HOURS&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;SAT 12.00&amp;ndash;18.00&lt;br /&gt;\r\n				SUN 12.00&amp;ndash;18.00&lt;br /&gt;\r\n				Priority access at 11.00 on both days&lt;/p&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;ADDRESS&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;Paris Event Center&lt;br /&gt;\r\n				20 Avenue de la Porte de la Villette,&lt;br /&gt;\r\n				75019 Paris, France&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n\r\n				&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n				&lt;p&gt;&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n				&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;IMPRESSIONS&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_PRS_pic_01-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_PRS_pic_02-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_PRS_pic_08-1080x811.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_PRS_pic_09_v2-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_PRS_pic_10_v2-1080x811.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_PRS_pic_11-1080x810.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/SN_PRS_pic_12-1080x809.jpg&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;HIGHLIGHTS&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;CREP PROTECT&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Watch out! Our friends from&amp;nbsp;Crep Protect&amp;nbsp;will present some of the rarest kicks on the market and provide you some free cleaning services.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;HAVANA CLUB&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Let&amp;rsquo;s be honest, every one of us sipped on a Cuba Libre. So far so good, Havana Club &amp;nbsp;will come up with some new delicious drinks you never had before. Drink responsible, trust us!&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Musicall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;DJ SET&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;No Sneakerness without some dope music from a variety of DJ&amp;rsquo;s. They will introduce you to the latest musicals trends in street culture. From pop till trap, hiphop to rap, there&amp;rsquo;s something for everybody.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SWATCH&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;The Swiss iconic watch brand is ticking again at our events. Stay tuned for more info.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;.&amp;nbsp;&lt;/p&gt;\r\n\r\n			&lt;p&gt;Fashion Releaseall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SNEAKERNESS X TEAM DAUERFEUER&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;We proudly announce our collab with German based brand &amp;ldquo;Team Dauerfeuer&amp;ldquo;.We will sell the collection consisting Hoodie, Crew Neck, two T-Shirts and Socks at all stops. Watch out our social for more info.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;.&lt;/p&gt;\r\n\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;STOCKX&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;You say Stock we say X! We proudly announce our presenting partner of 2019. The Detroit based company will host a drop off zone and exhibit some unique kicks together with a local hero.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;General Infoall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;FOOD &amp;amp; BEVERAGES&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;We know, sneaker hunting costs loads of energy and gets you mad hungry and super thirsty! That&amp;rsquo;s why we will take good care of you this weekend at Sneakerness Paris.&amp;nbsp;Insanely good food, fresh coffee, cold beers and refreshing drinks.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SNEAKER FREAKER&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Sneaker Freaker&amp;nbsp;will be in Paris to present their&amp;nbsp;&lt;em&gt;Ultimate Sneaker Book&lt;/em&gt;, of which they will create a giant shoe sculpture. Don&amp;rsquo;t miss out on this&amp;nbsp;700 rock-solid pages of content and grab your copy! They will also sell the latest issue, number 41, of their magazine&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n', 'PARIS\r\n07 – 08 SEPTEMBER, 2019\r\nPARIS EVENT CENTER', '2021-07-13', '2021-07-30', 15),
(78, 39, 'MILAN 10 – 11 OCTOBER, 2021 FABBRICA OROBIA 15', 'SN_19MIL_Laces_1920x1080px-2-570x320.png', '&lt;table&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;h2&gt;&lt;strong&gt;PRACTICAL INFO&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;MILAN: TASTY, FULL OF BEAUTIFUL THINGS, NO QUESTION TO US.&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;p&gt;Fashion as high as it gets, exciting sneakerheads all over the place, a dazzling music scene, food that gives you tears of happiness, and the best coffee in the whole wide world &amp;mdash; yes, we are talking about Italy.&lt;/p&gt;\r\n\r\n			&lt;p&gt;Be prepared to meet some of the most exciting international brands, sneaker stores, private sellers and collectors from all over Europe at Sneakerness Milan. Ciao!&lt;/p&gt;\r\n\r\n			&lt;p&gt;.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;h3&gt;&amp;nbsp;&lt;/h3&gt;\r\n\r\n			&lt;ul&gt;\r\n				&lt;li&gt;\r\n				&lt;h3&gt;&lt;strong&gt;GET TICKET (Update)&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;hr /&gt;\r\n				&lt;h3&gt;&lt;strong&gt;ADMISSION&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;Presale: 1-Day &amp;euro; 12.&amp;ndash; / 2 Days &amp;euro; 17.&amp;ndash; / Priority &amp;euro; 27.&amp;ndash;&lt;br /&gt;\r\n				Box office: 1-Day &amp;euro; 15.&amp;ndash; / 2 Days &amp;euro; 20.&amp;ndash;&lt;/p&gt;\r\n\r\n				&lt;hr /&gt;\r\n				&lt;h3&gt;&lt;strong&gt;HOURS&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;p&gt;SAT 12.00&amp;ndash;20.00&lt;br /&gt;\r\n				SUN 12.00&amp;ndash;20.00&lt;br /&gt;\r\n				Priority access at 11.00&lt;/p&gt;\r\n\r\n				&lt;h3&gt;&lt;strong&gt;ADDRESS&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n				&lt;hr /&gt;\r\n				&lt;p&gt;Fabbrica Orobia 15&lt;br /&gt;\r\n				Via Orobia 15&lt;br /&gt;\r\n				20100 Milan, Italy&lt;/p&gt;\r\n\r\n				&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n				&lt;p&gt;&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n				&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;h2&gt;IMPRESSIONS&amp;nbsp;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/sneakerness_milano_2019_01-1080x810.png&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/sneakerness_milano_2019_02-1080x810.png&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/sneakerness_milano_2019_08.png&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img sizes=&quot;100vw&quot; src=&quot;https://sneakerness.com/app/uploads/sneakerness_milano_2019_09.png&quot; width=&quot;1080&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;HIGHLIGHTS&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;STOCKX&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;You say Stock we say X! We proudly announce our presenting partner of 2019. The Detroit based company will host a drop off zone and exhibit some unique kicks together with a local hero.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;RAFFLE SWATCH X BAPE&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;The Swiss iconic watch brand is ticking again at Sneakerness and a special Swatch X Bape raffle will have place in Milan! Subscribe in any Italian Swatch Store to win the opportunity to buy the limited and numbered #SwatchXBAPE watches during the Sneakerness Italian weekend!&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;CREP PROTECT&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Watch out! Our friends from Crep Protect will present some of the rarest kicks on the market and provide you some free cleaning services.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;COLLECTID&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;NFC, an App and blockchain. Welcome to the digital ecosystem of collectID. They are cooking up the future in authentication of valuables goods.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Fashionall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;FASHION TALKS&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;Knowledge is key! This year we&amp;rsquo;ll invite well known guests from the sneaker, fashion and music industry. Stay tuned for more info.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;.&amp;nbsp;&lt;/p&gt;\r\n\r\n			&lt;p&gt;General Infoall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;FOOD &amp;amp; BEVERAGES&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;We know, sneaker hunting costs loads of energy and gets you mad hungry and super thirsty! That&amp;rsquo;s why we will take good care of you at Sneakerness Milan.&amp;nbsp;Insanely good food, fresh coffee, cold beers and refreshing drinks.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Partnersall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SNEAKER FREAKER&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;&lt;a href=&quot;https://www.sneakerfreaker.com/&quot;&gt;Sneaker Freaker&lt;/a&gt;&amp;nbsp;will be in Milan to present their&amp;nbsp;&lt;em&gt;Ultimate Sneaker Book&lt;/em&gt;, of which they will create a giant shoe sculpture. Don&amp;rsquo;t miss out on this&amp;nbsp;700 rock-solid pages of content and grab your copy!&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;Fashion Releaseall days&lt;/p&gt;\r\n\r\n			&lt;hr /&gt;\r\n			&lt;h3&gt;&lt;strong&gt;SNEAKERNESS X TEAM DAUERFEUER&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n			&lt;p&gt;We proudly announce our collab with German based brand &amp;ldquo;&lt;a href=&quot;https://www.instagram.com/team_dauerfeuer&quot;&gt;Team Dauerfeuer&lt;/a&gt;&amp;ldquo;. The launch will be at Sneakerness Z&amp;uuml;rich and online on the onlineshop from Dauerfeuer. We will sell the collection consisting Hoodie, Crew Neck, two T-Shirts and Socks at all stops. Watch out our social for more info.&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n', 'MILAN 10 – 11 OCTOBER, 2021 FABBRICA OROBIA 15', '2021-07-08', '2021-07-31', 15),
(79, 41, 'THE ONLY HUGE SALE PROGRAM OF THE YEAR - BLACK FRIDAY 2020', 'adddddđ.png', '&lt;p&gt;&amp;nbsp;The shopping atmosphere has begun to fill the streets and shops across the country. This is the only opportunity of the year for everyone to choose for themselves the clothes and gadgets they have &amp;quot;cherished&amp;quot; for &amp;ouml;a long time, right? And this is also the right time to travel with your lover, friends &amp;amp; family. Good weather, cool, fresh, many new attractions &amp;amp; help relieve stress after a whole year of work, tired study, it is also worth considering to pack your bags and go! But in order to travel more comfortably &amp;amp; happily, your trip cannot be complete without a few beautiful, stylish, dynamic and especially functional sneakers that support the maximum functionality of the user. And on this BLACK FRIDAY 2020 occasion, Tulo Shop would like to list the shoe models that have received very good feedback and sold well in the past time.&lt;/p&gt;\r\n\r\n&lt;h1&gt;Unprecedented shocking discount program at Buy Sneakers&amp;nbsp;Shop&lt;/h1&gt;\r\n\r\n&lt;h3&gt;Buy Sneakers&amp;nbsp;Shop is selling all available models at the store to help you easily buy the most suitable sneaker models. This is a general discount table on product lines.&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;picturedescription&quot; src=&quot;https://buysneaker.online/image/blog/addddd%C4%91.png&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;table align=&quot;center&quot; border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:1200px&quot;&gt;\r\n	&lt;caption&gt;&lt;strong&gt;Summary of discount codes during the event&lt;/strong&gt;&lt;/caption&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;Discount Code&lt;/td&gt;\r\n			&lt;td&gt;Event Time&lt;/td&gt;\r\n			&lt;td&gt;Rules&lt;/td&gt;\r\n			&lt;td&gt;Brand&lt;/td&gt;\r\n			&lt;td&gt;Product&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;SNEAKER10&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;26/11/2021 AT 3/12/2021&lt;/td&gt;\r\n			&lt;td&gt;2 Milion &amp;lt; Order&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;All Brands&lt;/td&gt;\r\n			&lt;td&gt;All Products&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;SNEAKER20&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;26/11/2021 AT 3/12/2021&lt;/td&gt;\r\n			&lt;td&gt;3 Milion &amp;lt;Order&lt;/td&gt;\r\n			&lt;td&gt;All Brands&lt;/td&gt;\r\n			&lt;td&gt;All Products&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 'With the attraction from the biggest sale event of 2020, Tulo Shop also wants to share a little joy for sneaker followers with the best & quality shoe models. Especially, Tulo Shop also offers discounts on new models.', '2021-07-08', '2021-07-31', 8);

-- --------------------------------------------------------

--
-- Table structure for table `event_tp`
--

CREATE TABLE `event_tp` (
  `id` int(11) NOT NULL,
  `name_tp` varchar(155) NOT NULL,
  `description_tp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_tp`
--

INSERT INTO `event_tp` (`id`, `name_tp`, `description_tp`) VALUES
(39, 'EVENT INTERNATIONAL', ''),
(40, 'OPENING STORES', 'OPENING STORES'),
(41, 'DISCOUTS EVENT', 'DISCOUTS EVENT');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_user`
--

CREATE TABLE `facebook_user` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facebook_user`
--

INSERT INTO `facebook_user` (`id`, `user`, `token`) VALUES
(2147483647, 'Nguyễn Hạ Vy', 'EAAGsqpaR3xkBAHZA6XkrWazMZCtYlLAmnqupfvplocFeDMjYLb8WMSSorxpp8CnL3ZAKFRksoCFfOM3ZAWZCfpV1tEGXDXmh6xW3SRUeW2Rrys9HHzy6FRtfZASmzJKkGGd1STSyqq5xZCMXpXsPSOsfr5riovNvJg6HynRtghOudYaDs9ZAQwdLZCFW79JWaqZCkZD');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL DEFAULT 1,
  `faq_title` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `faq_content` longtext CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `faq_title`, `faq_content`) VALUES
(1, 'FAQ SNEAKERS ONLINE', '&lt;p&gt;&lt;strong&gt;SIZE &amp;amp; FIT&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;1.How to choose my Sneakers size?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;On each product page of our Sneakers-shop, you will find a link called &lt;strong&gt;&amp;lsquo;SIZE&amp;rsquo;&lt;/strong&gt;. Click on that link to reveal a size guide and determine your recommended size.&lt;/p&gt;\r\n\r\n&lt;p&gt;If you need further advice, do not hesitate to contact our Customer Care at &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;SHIPPING&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;1. What are your shipping charges?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Worldwide shipping is free for all orders in United Kingdom, &amp;nbsp;United States.&lt;br /&gt;\r\nRest of the World: $25,90&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;2. Do you ship Worldwide?&lt;/strong&gt;&lt;br /&gt;\r\nYes, we ship worldwide.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;3. Do I have to pay customs or import duties?&lt;/strong&gt;&lt;br /&gt;\r\nAny custom fees outside the UK, US will be satisfied by the customer.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;4. Errors in addresses?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;The client is responsible for the veracity of the address information provided. In the event that there is an error in the address &amp;mdash;in whole or partially&amp;mdash; and a second shipment is required, the customer will be responsible for the shipping cost that second delivery may incur.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;5. How long will the delivery take?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Once your order has been processed and you have received your tracking number, your package should be delivered within 48h-72 h to UK, US and 5-7 working days to the rest of the world. **Please allow a longer transit time during COVID-19 period**&lt;br /&gt;\r\n&lt;br /&gt;\r\nFor more info, please check the &lt;a href=&quot;https://www.ups.com/es/es/Home.page&quot;&gt;&lt;strong&gt;UPS page&lt;/strong&gt;&lt;/a&gt; to know more about current limitations on deliveries due to COVID-19 pandemic.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;6. Which courier do you work with?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;We work with UPS, one of the best courier companies in the world.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;MY ORDER&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;1. Can I change or cancel my order?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;We work around the clock in order to ensure the quickest delivery. Please contact our Customer Care at &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt; immediately in case you need to modify your order so we can check the status of your order and modify it conveniently. Unfortunately, once your order is dispatched from our warehouse, it cannot be modified or cancelled.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;2. I have not received an order confirmation.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;It can take up to two hours to receive the confirmation email after you place your order &amp;mdash;check your spam inbox just in case it went there! If the payment has been processed but you still haven&amp;rsquo;t received a confirmation after these two hours, please get in touch with our Customer Care at &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;3. What is the current status of my order?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;You will receive a confirmation email after placing your order. We will then start to arrange it, it usually takes 24h. As soon as your order leaves our warehouse, you will receive another email with your tracking number. Use this information to track your package until its delivery.&lt;/p&gt;\r\n\r\n&lt;p&gt;*Orders placed on Friday will be arranged on Monday.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;4. When will I receive my tracking number?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Every time a package is sent, the courier service notifies the shipping state by email. Check your spam inbox 24h after you have placed your order in case you have not received any email yet.&lt;/p&gt;\r\n\r\n&lt;p&gt;*For orders placed on Friday, you will receive your tracking number on Monday or Tuesday.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;5. I wasn&amp;#39;t home during delivery attempt?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;If you were not home during the delivery attempt, UPS should have sent you a notification email and should have left you a note in your mailbox including information about the nearest UPS Access Point, where you will be able to collect your package.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;6. UPS Access Points:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Find your nearest Acces Point &lt;a href=&quot;https://www.ups.com/dropoff?loc=en_ES&quot;&gt;&lt;strong&gt;here&lt;/strong&gt;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;EXCHANGES &amp;amp; RETURNS&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;1. I didn&amp;#39;t receive the products I ordered.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;If you haven&amp;#39;t received a Sneaker product you ordered, we will gladly send it to you again at no additional cost. Simply send an email to &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt; and we&amp;rsquo;ll take care of it as quickly as possible.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;2. Can I exchange the products?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;You have up to 15 days to exchange your SNEAKERS ONLINE&amp;#39;s sneakers. Please contact our Customer Care at &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt;.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;SNEAKERS ONLINE will cover return shipping fees, however shipping fees for the second delivery will be paid by the customer in case the order is not over $200.&lt;/p&gt;\r\n\r\n&lt;p&gt;Once we receive your package we will issue a Credit Store Voucher for the amount you paid, which you can use to buy another product or the same one in another size.&lt;/p&gt;\r\n\r\n&lt;p&gt;** In case you purchased any product with a discount, you may need to cover the difference in order to exchange the product for a new one.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;3. What is your returns &amp;amp; refunds policy?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;All unused products can be returned within a 15 day period. If you choose the return option, once you return request is approved, you will receive a prepaid shipping label that will be deducted from the refunded amount.&lt;/p&gt;\r\n\r\n&lt;p&gt;Return shipping costs and additional taxes are not covered by SAYE.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;4. How can I return my sneakers?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;To request a return or a refund, please contact our Customer Care at &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt;.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;5. When will I receive my refund?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;In a normal situation we will refund your return within 14 days after receiving your package. Please be aware that due to COVID-19 situation and in compliance with sanitary regulations, our warehouse is currently operating on minimum staff. So, if your refund is taking more than the usual 14 days, please be patient. Once our staff have surveyed the product, we will refund the amount to the same payment method you used to place your order.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;DAMAGED ITEMS&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;1. What if my products are damaged?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;SNEAKERS ONLINE guarantees that all products we manufacture and sell on our website are free from defects of workmanship. If one of our products is not in perfect conditions, please contact our support team following these simple steps:&lt;/p&gt;\r\n\r\n&lt;p&gt;a) Send an email to &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt; using the same email account you used when placing your order.&lt;/p&gt;\r\n\r\n&lt;p&gt;b) Add this subject line &amp;ldquo;DAMAGED &amp;lsquo;NAME SNEAKERS&amp;rsquo; + Your Name&amp;rdquo;.&lt;/p&gt;\r\n\r\n&lt;p&gt;c) Specify color and size of the damaged item/s.&lt;/p&gt;\r\n\r\n&lt;p&gt;d) Explain what&amp;#39;s wrong.&lt;/p&gt;\r\n\r\n&lt;p&gt;e) Attach pictures of the flaws.&lt;/p&gt;\r\n\r\n&lt;p&gt;Please note the following exceptions:&lt;br /&gt;\r\n&amp;bull; We won&amp;#39;t accept a return if the item has been worn or damaged by the client.&lt;br /&gt;\r\n&amp;bull; Only items purchased in SNEAKERS ONLINE&amp;#39;s website will be subject to return.&lt;/p&gt;\r\n\r\n&lt;p&gt;That&amp;#39;s it! We will get back to you as soon as possible with further instructions.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;MY ACCOUNT&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;1. What are the advantages of having a SNEAKERS ONLINE&amp;#39;s account?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Having an account on our website eases the process to place your order. Your personal details will be filled in automatically on the form. In addition, all your orders will be stored together, invoices included.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;2. How do I create an account?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Enter &lt;strong&gt;☰&lt;/strong&gt; through the menu icon on the upper right corner of your screen. Once you have accessed, click &amp;lsquo;&lt;strong&gt;Sign up&lt;/strong&gt;&amp;rsquo; in order to register.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;3. How can I change my account details?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Enter &amp;lsquo;My Account&amp;rsquo; through the menu icon &amp;nbsp;&lt;strong&gt;☰ &lt;/strong&gt;on the upper right corner of your screen. Once you have accessed, you can modify all your data (name, address...).&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;4. Is it possible to place an order without an account?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Of course! In the first phase of the checkout you have the option to log in to your account.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;5. How can I delete my account?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Our customer support can delete your account whenever you want. Send us an email to &amp;nbsp;&lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt; and we&amp;rsquo;ll take care of it.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;PAYMENTS&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;1. What are the available payment methods?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;PayPal, Visa Card, Google Pay, Apple Pay, MasterCard, American Express &amp;amp; Bitcoin.&lt;br /&gt;\r\nUnfortunately, several customers have experienced troubles during the payment when using REVOLUT. We offer several payment methods other than REVOLUT, we recommend using one of them since we won&amp;#39;t be able to assist you in case of an issue related to REVOLUT.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;2. My payment has failed. What should I do?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Did you get a &amp;lsquo;Payment failed&amp;rsquo; notification after you went through the payment gateway? There are a few solutions: delete your cookies and cache data, use a different browser or use a different payment method. If these solutions haven&amp;rsquo;t worked, please contact our Customer Care.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;3. Has the purchase amount been deducted from your bank account, yet the website says that the order failed?&lt;/strong&gt;&lt;br /&gt;\r\nPlease contact our Customer Care as soon as possible, so we can start processing your order. Please send us a screenshot of the payment and we will send you the shoes.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;4. How can I get an invoice?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Please contact our Customer Care at &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt; and we will send it to you.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;5. Refunds&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;We will refund your return within 14 days after receiving your package. We always refund the money to the same payment method you used to place the order. If 14 days have passed and you still have not received your refund, please send an email to &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt; indicating your order number and tracking code and we will get back to you as soon as possible.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;6. Do I have to pay custom fees in order to receive my order?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;If you placed an order within the UK, US, you will not have to pay custom fees to receive your order. If you placed an order from outside the UK, US, it is possible that you need to pay custom fees. This depends on the customs laws in your country.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;7. What is VAT?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;VAT stands for Value Added Tax, which are the charges paid on top of the value from the sale of products or services. All customers inside and outside the EU pay VAT on their purchases. If you purchase within the UK, US, VAT is included in the price of our products. If you purchase from outside the UK, US, you will have to pay the equivalent to VAT in the form of custom fees.&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `slogan` text DEFAULT NULL,
  `logoHeader` varchar(255) DEFAULT NULL,
  `logoFooter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `phone`, `email`, `slogan`, `logoHeader`, `logoFooter`) VALUES
(1, '123456', 'jukain59@gmail.com', 'Go faster, go stronger, never stop!', 'logo.png', 'logo-white.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `href_param` varchar(45) DEFAULT NULL,
  `isActive` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `updated_at`, `href_param`, `isActive`) VALUES
(1, 'HOME', '2021-04-17 00:35:11', 'HOME', b'1'),
(2, 'PRODUCT', '2021-04-16 23:46:01', 'PRODUCT', b'1'),
(3, 'ABOUT US', '2021-06-11 14:53:17', 'ABOUT-US', b'1'),
(4, 'NEWS', '2021-06-25 14:02:54', 'NEWS', b'1'),
(5, 'CONTACT US', '2021-06-10 02:34:07', 'CONTACT-US', b'1'),
(6, 'EVENT', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `id_product`, `quantity`, `price`, `size`, `name`, `id_user`, `id_order`) VALUES
(27, 211, 1, 289, 'size37', 'TERREX FREE HIKER PARLEY', 10, 73),
(28, 213, 1, 356, 'size36', 'ADIDAS ULTRABOOST 20', 10, 73),
(29, 231, 1, 356, 'size36', 'ULTRABOOST 1.0 DNA', 10, 0),
(30, 211, 2, 289, 'size36', 'TERREX FREE HIKER PARLEY', 10, 0),
(31, 211, 2, 289, 'size36', 'TERREX FREE HIKER PARLEY', 10, 0),
(32, 213, 1, 356, 'size36', 'ADIDAS ULTRABOOST 20', 10, 0),
(36, 235, 1, 678, 'size36', 'RS-FAST TECH', 10, 88),
(37, 212, 1, 399, 'size36', 'PHARRELL WILLIAMS D.O.N.', 10, 88),
(41, 212, 1, 399, 'size36', 'PHARRELL WILLIAMS D.O.N.', 10, 92),
(43, 212, 1, 399, 'size40', 'PHARRELL WILLIAMS D.O.N.', 18, 94),
(44, 235, 1, 678, 'size40', 'RS-FAST TECH', 18, 94),
(45, 212, 1, 399, 'size36', 'PHARRELL WILLIAMS D.O.N.', 10, 0),
(46, 215, 1, 312, 'size36', 'CHUCK TAYLOR ALL STAR CX', 10, 0),
(47, 212, 1, 399, 'size36', 'PHARRELL WILLIAMS D.O.N.', 21, 0),
(48, 212, 1, 399, 'size36', 'PHARRELL WILLIAMS D.O.N.', 21, 0),
(54, 214, 1, 289, 'size36', 'CONVERSE CHUCK 70', 10, 100),
(56, 212, 1, 399, 'size36', 'PHARRELL WILLIAMS D.O.N.', 10, 102),
(57, 211, 1, 289, 'size39', 'TERREX FREE HIKER PARLEY', 10, 103),
(58, 222, 2, 345, 'size38', 'ADIDAS ULTRABOOST 5.0 DNA', 10, 103),
(61, 215, 1, 312, 'size36', 'CHUCK TAYLOR ALL STAR CX', 10, 105),
(62, 215, 1, 312, 'size36', 'CHUCK TAYLOR ALL STAR CX', 10, 106),
(63, 217, 1, 299, 'size36', 'NIKE AIR FORCE 1 \'07', 10, 106),
(64, 212, 1, 399, 'size36', 'PHARRELL WILLIAMS D.O.N.', 10, 107),
(65, 212, 1, 399, 'size38', 'PHARRELL WILLIAMS D.O.N.', 10, 107),
(68, 215, 1, 312, 'size36', 'CHUCK TAYLOR ALL STAR CX', 10, 110),
(70, 245, 1, 568, 'size36', '4D FUTURECRAFT', 33, 112),
(71, 211, 1, 289, 'size41', 'TERREX FREE HIKER PARLEY', 33, 112),
(72, 245, 1, 568, 'size42', '4D FUTURECRAFT', 36, 113),
(75, 273, 3, 123, 'size38', 'ADIDAS ZX 2K 4D', 10, 116),
(76, 217, 4, 299, 'size38', 'NIKE AIR FORCE 1 \'07', 10, 117),
(78, 274, 9, 700, 'size36', 'SUPERSTAR FUTURESHELL', 40, 119),
(79, 273, 1, 123, 'size36', 'ADIDAS ZX 2K 4D', 40, 119),
(80, 272, 3, 588, 'size42', 'SUEDE BLOC WTFORMSTRIPE', 10, 120),
(81, 274, 1, 700, 'size42', 'SUPERSTAR FUTURESHELL', 10, 120),
(84, 274, 2, 700, 'size37', 'SUPERSTAR FUTURESHELL', 10, 123);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `payment` bit(1) DEFAULT NULL,
  `id_process` int(11) DEFAULT NULL,
  `code` varchar(50) NOT NULL,
  `discount` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_at`, `id_user`, `payment`, `id_process`, `code`, `discount`) VALUES
(88, 'ha vy', 794619495, '295 Ba Tháng Hai P.10 Q.10 HCM', '', 1077, '2021-06-15', 10, b'0', 3, '', 0),
(92, '34', 0, ',mlmlkjgvh', '', 399, '2021-06-15', 10, b'0', 5, '', 0),
(94, 'nero saro', 2147483647, 'adwadwdw', '', 1077, '2021-06-15', 18, b'0', 4, '', 0),
(100, 'ăe', 0, 'ăe', '', 289, '2021-06-19', 10, b'0', 5, '', 0),
(102, 'TERREX FREE HIKER PARLEY MK', 123456789, ',mlmlkjgvh', '', 399, '2021-06-22', 10, b'0', 4, '', 0),
(103, 'Ha Vy', 794619495, '10 district', '', 979, '2021-06-23', 10, b'0', 2, '', 0),
(105, 'Ha Vy', 794619495, '10 district', '', 312, '2021-06-24', 10, b'1', 2, '', 0),
(106, 'Ha Vy', 794619495, '10 district', '', 611, '2021-06-24', 10, b'1', 3, '0179297ec5', 0),
(107, 'Ha Vy', 794619495, '10 district', '', 798, '2021-06-24', 10, b'1', 5, '59b50f3952', 50),
(110, 'Ha Vy', 794619495, '10 district', '', 312, '2021-06-24', 10, b'1', 4, '979c0a7d22', 50),
(112, 'Tóc hư tổn', 932108777, '123 đường 5678', '', 857, '2021-06-26', 33, b'0', 1, '8e0bc589cb', 0),
(113, 'Nguyễn Kim Quốc', 965056673, '295/8/9-11 Ba Tháng Hai', 'Meo meo meo <3', 568, '2021-06-26', 36, b'0', 2, '882233e068', 100),
(116, 'Ha Vy', 123456789, '295 Ba Thang Hai P.10 Q.10 HCM', '', 369, '2021-07-09', 10, b'1', 2, '308e6829c0', 0),
(117, 'Ha Vy', 794619495, '10 district', '', 1196, '2021-07-12', 10, b'1', 2, '453ddce1ac', 10),
(119, 'Nguyễn Hạ Vy', 794619495, 'ba thang hai street, ho chi minh city', '', 6423, '2021-07-15', 40, b'1', 1, '39be4a394c', 0),
(120, 'Ha Vy', 794619495, 'ba thang hai street, ho chi minh city', '', 2464, '2021-07-15', 10, b'1', 1, '6c8edd5937', 10),
(123, 'Ha Vy', 794619495, 'ba thang hai street, ho chi minh city', '', 1400, '2021-07-16', 10, b'0', 5, '1e70a32790', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_process`
--

CREATE TABLE `order_process` (
  `id` int(11) NOT NULL,
  `process` varchar(255) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_process`
--

INSERT INTO `order_process` (`id`, `process`, `color`) VALUES
(1, 'waiting', 'badge-secondary'),
(2, 'received', 'badge-info'),
(3, 'delivering', 'badge-dark'),
(4, 'finished', 'badge-success'),
(5, 'canceled', 'badge-danger');

-- --------------------------------------------------------

--
-- Table structure for table `page_home_feedback`
--

CREATE TABLE `page_home_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_home_feedback`
--

INSERT INTO `page_home_feedback` (`id`, `name`, `image`, `feedback`) VALUES
(1, 'Salim Rana', '1.jpg', 'Great so far! Second time purchasing with SS. Was concerned 1st time based on some reviews but product arrived albeit taking 2 weeks. Second purchase this week received item in 2 days to GB. Thanks SS. '),
(2, 'Hridoy Roy', '2.jpg', 'Excellent, would use again Recently bought some Sandles for the GFs brithday, looked at a few sites on the internet and came across sneaker studio. Once purchased I noticed they were coming from abroad! (I\'m in the UK) and instantly filled with dread that this was a scam.  However I had a tonne of reassuring emails about my pruchase being reviewed, processed and shipped, they came within a week! Which I couldn\'t believe and are in excellent condition. I\'d 100% use again!! Great job. '),
(3, 'themesplaza', '3.jpg', 'Great experience Ordered a pair of Nike that I couldn\'t find anywhere else. Shipped to Texas, quickly and free, double-boxed. I didn\'t initially receive a tracking number, but when I emailed to ask for one, they responded immediately. Friendly and professional. The pair of shoes I received were perfect, so I can\'t speak to the return process. But my shopping experience was great, and I wouldn\'t hesitate to shop here again. ');

-- --------------------------------------------------------

--
-- Table structure for table `page_home_slider`
--

CREATE TABLE `page_home_slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title1` text DEFAULT NULL,
  `title2` text DEFAULT NULL,
  `title3` text DEFAULT NULL,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_home_slider`
--

INSERT INTO `page_home_slider` (`id`, `image`, `title1`, `title2`, `title3`, `link`) VALUES
(2, 'slider-1.jpg', 'Hot product', 'Nike Ari max 2021', 'The best seller of 2021', 'https://buysneaker.online/product.php'),
(3, 'slider-2.jpg', 'New product', 'GET UP TO 50% SALE', 'The new of 2021', 'https://buysneaker.online/product.php');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) NOT NULL DEFAULT 1,
  `pp_title` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `pp_content` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `pp_title`, `pp_content`) VALUES
(1, 'PRIVACY STATEMENT', '&lt;p&gt;This privacy policy sets out how &lt;a href=&quot;https://buysneaker.online/&quot;&gt;&lt;strong&gt;buysneaker.online&lt;/strong&gt;&lt;/a&gt; uses and protects an information that you give us when you use this website. At &lt;a href=&quot;https://buysneaker.online/&quot;&gt;&lt;strong&gt;buysneaker.online&lt;/strong&gt;&lt;/a&gt; we are committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement. &lt;a href=&quot;https://buysneaker.online/&quot;&gt;&lt;strong&gt;Buysneaker.online&lt;/strong&gt;&lt;/a&gt; may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;We may collect the following information:&lt;/strong&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Name&lt;/li&gt;&lt;li&gt;Contact information including email address and telephone&amp;nbsp;number&lt;/li&gt;&lt;li&gt;Postal address&lt;/li&gt;&lt;li&gt;Facebook profile information&lt;/li&gt;&lt;li&gt;Other information relevant to customer surveys and/or offers&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&lt;strong&gt;What we do with the information we gather&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;We require this information to understand your needs and provide you with a&amp;nbsp;better service, and in particular for the following reasons:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Internal record keeping.&lt;/li&gt;&lt;li&gt;We may use the information to improve our products and&amp;nbsp;services.&lt;/li&gt;&lt;li&gt;We may periodically send promotional emails about new&amp;nbsp;products, special offers or other information which we think you&amp;nbsp;may find interesting using the email address which you have&amp;nbsp;provided with your permission.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;From time to time, we may also use your information to contact you for market&amp;nbsp;research purposes. We may contact you by email or post. We may use the&amp;nbsp;information to customize the website according to your interests.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Security&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;We are committed to ensuring that your information is secure. In order to&amp;nbsp;prevent unauthorized access or disclosure we have put in place suitable&amp;nbsp;physical, electronic and managerial procedures to safeguard and secure the&amp;nbsp;information we collect online.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;How we use cookies&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;A cookie is a small file, which asks permission to be placed on your&amp;nbsp;computers hard drive. Once you agree, the file is added and the cookie helps&amp;nbsp;analyze web traffic or lets you know when you visit a particular site. Cookies&amp;nbsp;allow web applications to respond to you as an individual. The web applicationcan tailor its operations to your needs, likes and dislikes by gathering and&amp;nbsp;remembering information about your preferences.&lt;/p&gt;&lt;p&gt;We use traffic log cookies to identify which pages are being used. This helps&amp;nbsp;us analyze data about webpage traffic and improve our website in order to&amp;nbsp;tailor it to customer needs. We only use this information for statistical analysis&amp;nbsp;purposes and then the data is removed from the system.&amp;nbsp;Overall, cookies help us provide you with a better website, by enabling us to&amp;nbsp;monitor which pages you find useful and which you do not. A cookie in no way&amp;nbsp;gives us access to your computer or any information about you, other than the&amp;nbsp;data you choose to share with us.&lt;/p&gt;&lt;p&gt;You can choose to accept or decline cookies. Most web browsers&amp;nbsp;automatically accept cookies, but you can usually modify your browser setting&amp;nbsp;to decline cookies if you prefer. This may prevent you from taking full&amp;nbsp;advantage of the website.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Links to other websites&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Our website may contain links, ads or banners to other websites of interest.&amp;nbsp;However, once you have used these links to leave our site, you should note&amp;nbsp;that we do not have any control over that other website. Therefore, we cannot&amp;nbsp;be responsible for the protection and privacy of any information that you&amp;nbsp;provide whilst visiting such sites and this privacy statement does not govern&amp;nbsp;such sites. You should exercise caution and look at the privacy statement&amp;nbsp;applicable to the website in question.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Payment Information&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;We do not store your credit card or net banking details. All monetary&amp;nbsp;processing and transactions are done through a secure third party payment&amp;nbsp;gateway provided by PayU India, which is a leader in online payment systems&amp;nbsp;and is verified by Verisign (TM).And for the international transactions PayPal provides secure third party&amp;nbsp;payment gateway.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Controlling your personal information&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;We will not sell, distribute or lease your personal information to third parties&amp;nbsp;unless we have your permission or are required by law to do so. We may use&amp;nbsp;your personal information to send you promotional information about third&amp;nbsp;parties, which we think you may find interesting if you tell us that you wish this&amp;nbsp;to happen.You may request details of personal information, which we hold about you&amp;nbsp;under the US People&rsquo;s Privacy Act. If you would&amp;nbsp;like a copy of the information held on you please write to&amp;nbsp;&lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt;.&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;If you believe that any information we are holding on you is incorrect or&amp;nbsp;incomplete, please email us as soon as possible, at the address &lt;a href=&quot;mailto:jukain59@gmail.com&quot;&gt;&lt;strong&gt;jukain59@gmail.com&lt;/strong&gt;&lt;/a&gt;. We will promptly correct any information found to be incorrect.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `topic_id` int(11) DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_user`, `topic_id`, `title`, `image`, `content`, `published`, `created_at`) VALUES
(47, 'nero', 3, 'First images of the Nike Dunk Low \'Halloween\' 2021 ?️', 'Nike-Dunk-Low-Halloween-DD0357-100-Release-Info.png', '&lt;p&gt;As you might have guessed from the headline, we have received hot news and pictures from the Nike Dunk Low \'Halloween\' 2021! As we get to experience almost every year, Nike delivers us a sneaker with a Halloween look again for 2021! ?&lt;/p&gt;&lt;p&gt;We can already tell you that this year\'s release for the spookiest day of the year is definitely a must-have. This year\'s design is not on the Air Jordan 1, but on a new, eerily good Nike Dunk! The hyped low-top model now announces itself with many details and welcome materials already in summer!&lt;/p&gt;&lt;p&gt;Are you excited to see what Nike has in store for us this year? If you can\'t wait, then take a look at the blog post below. First of all, we\'ll show you which Halloween release we can look forward to in 2020. In addition, we have already had a Halloween dunk! Here we go ?&lt;/p&gt;&lt;h2&gt;2020: Nike Air Force 1 Skeleton &lsquo;Starfish&rsquo; | CU8067-800&lt;/h2&gt;&lt;p&gt;The connoisseurs among you know it for sure: In the last few years it has almost become a tradition that the popular Swoosh brand served us all a distinctive Nike Air Force 1 Low in Halloween or skeleton look around 31 October.&lt;/p&gt;&lt;p&gt;Once a year, the iconic silhouette of the AF1 was taken and the same design was released in different colorways. The special feature here was always the graphic of the foot of a human skeleton on the outside of the kicks. In addition, each of these Halloween models has been given the special &quot;glow in the dark&quot; details on the outsole.&lt;/p&gt;&lt;p&gt;In 2020, the Nike Air Force 1 Skeleton &lsquo;Starfish&rsquo; came with a complete &quot;glow in the dark&quot; sole. Here, the midsole AND outsole glow in the dark in bright green and give the Starfish Orange sneaker a new nuance. But look for yourself:&lt;/p&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2021/06/nike-dunk-low-halloween-2021-DD3357-100-20.jpg&quot; alt=&quot;feature image&quot;&gt;&lt;/figure&gt;&lt;h2&gt;2019: Nike SB Dunk Low \'Night of Mischief\' | BQ6817-006&lt;/h2&gt;&lt;p&gt;In addition to the aforementioned back-to-back Air Force 1 Skeleton\'s, Nike delivered to us in 2019 alongside the Nike Air Force 1 Skeleton \'Black\' an additional Trick or Treat highlight!&lt;/p&gt;&lt;p&gt;With the Nike SB Dunk Low \'Night of Mischief\' the brand released a Halloween special for fans of Nike\'s skateboarding sublabel and its popular SB Dunk Low silhouette. The design of this sneaker doesn\'t feature glow-in-the-dark details, but it does feature all kinds of other details under and over the black overlays.&lt;/p&gt;&lt;p&gt;For example, the Nike stitching on the heel was replaced with the words &quot;Trick&quot; and &quot;Treat&quot;. Ghosts on the inside of the tongue, spider webs on the base and a cut-out of a creepy pumpkin face on the toebox perfectly set the scene for the motto at the time. And if that wasn\'t enough, the kicks even got a box in the shape of a tombstone.&lt;/p&gt;&lt;p&gt;If you are interested, you can click on one of the pictures to see whether the right size at our Partner StockX is there for you.&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/custom-%E2%80%93-127-819x1024.png&quot; alt=&quot;BQ6817-006&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/custom-%E2%80%93-126-819x1024.png&quot; alt=&quot;BQ6817-006&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/custom-%E2%80%93-125-1-819x1024.png&quot; alt=&quot;BQ6817-006&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h2&gt;2021: Nike Dunk Low \'Halloween\'&lt;/h2&gt;&lt;p&gt;We have finally arrived at the Halloween highlight of 2021. Like the 2019 SB Dunk release, the brand sticks to a black colour scheme with orange accents. However, with the Nike Dunk Low \'Halloween\' 2021 a bright white base as a strong contrast to the overlays. But let\'s take a closer look at the upcoming kicks first:&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/DunkLowHalloween_01-1024x683.jpeg&quot; alt=&quot;DD0357-100&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/DunkLowHalloween_04-1024x683.jpeg&quot; alt=&quot;DD0357-100&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/DunkLowHalloween_05-1024x683.jpeg&quot; alt=&quot;DD0357-100&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;On the whole, Nike supplies us with a very special Dunk Low here, but at first glance it looks pretty plain. White smooth leather base, black overlays and an orange Swoosh, also made of smooth leather. The midsole also comes in white to match the base and the orange accents are continued in the sockliner and on the insole.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;But what makes the Kicks so special? &quot;Just&quot; another glowing sole?&lt;/strong&gt;&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/201253266_1417220695328330_4192433025986008236_n-819x1024.jpeg&quot; alt=&quot;DD0357-100&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/201453418_540833896955295_8455742462065197662_n-820x1024.jpeg&quot; alt=&quot;DD0357-100&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;A closer look at the black overlays reveals some hidden graphics. Obviously, these are supposed to be different forms of eyes. Let your imagination run free and decide for yourself which creatures these eyes might belong to.&lt;/p&gt;&lt;p&gt;As mentioned above, Nike\'s Halloween releases since 2018 have always had the &quot;glow in the dark&quot; feature. The Nike Dunk Low \'Halloween\' 2021 also has an outsole with this special effect.&lt;/p&gt;&lt;p&gt;And that\'s not all! Because the slightly shimmering eyes that I just mentioned also light up at night in a completely new glow! The undead only appear at night, right?&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/201249033_1103218490186140_6845981063080790778_n-820x1024.jpeg&quot; alt=&quot;DD0357-100&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/201459407_144061047795376_9153417602804275610_n-1024x1024.jpeg&quot; alt=&quot;DD0357-100&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/201625248_1806418629532062_6939531663819790905_n-820x1024.jpeg&quot; alt=&quot;DD0357-100&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://www.sneakerjagers.com/de/de_de/wp-content/uploads/2021/06/201268338_255127739718969_7060729507198778398_n-1024x1024.jpeg&quot; alt=&quot;DD0357-100&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Alright dear community, that\'s it for the info on the Nike Dunk Low \'Halloween\' 2021 so far. Unfortunately, no exact date has been made official for this pair yet, but it is actually self-explanatory at what time this Halloween release will come onto the market ?&lt;/p&gt;', 1, '2021-06-30 07:50:06'),
(48, 'nero', 3, 'Issa Rae Further Champions Self-Expression With Converse By You Collection', 'Issa-Rae-Converse-By-You-1.jpg', '&lt;p&gt;Whether by way of her &ldquo;Awkward Black Girl&rdquo; series on YouTube or hit HBO show, &ldquo;Insecure,&rdquo; Issa Rae has championed self-expression, creativity and identity. Never not working, the Los Angeles-native has recently teamed up with Converse and Nicky Fulcher for a collection of customizable Chuck 70s rooted in her mission to inspire the next generation of creatives.&lt;/p&gt;&lt;p&gt;Offered via the By You platform, the forthcoming styles indulge in a classic canvas build dipped in tonal colors like navy, black and white, while also appearing in more playful tones like purple. An assortment of graphic phrases designed by Fulcher, a Hatian-American art director, allow unique messaging on the collaborative collection; affirmations include &ldquo;Celebrate The Wins,&rdquo; &ldquo;DO IT ALL!&rdquo; and &ldquo;GET OUT OF MY WAY,&rdquo; among others. Each Converse shoe created through the By You program features reflective finishes on patches featuring some of the aforementioned phrases, ensuring these words of encouragement don&rsquo;t disappear during literal dark times.&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&ldquo;[This collaboration] was all about empowering the next generation to get up and DO what it is they aspire to do,&rdquo; said Rae. &ldquo;So the team took some of my personal affirmations and approaches to life, and put them into the design of the shoe.&rdquo;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;Enjoy images of some of the customization options here below, and head over to Converse.com tomorrow, July 1st, to secure your pair.&lt;/p&gt;&lt;p&gt;For more from the NIKE, Inc., check out the Lola Bunny Air Force 1.&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2021/06/Issa-Rae-Converse-Chuck-70-By-You-3.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2021/06/Issa-Rae-Converse-Chuck-70-By-You-8.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2021/06/Issa-Rae-Converse-Chuck-70-By-You-2.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&amp;nbsp;&lt;/p&gt;', 1, '2021-07-01 03:22:03'),
(49, 'nero', 3, 'Nike Celebrates 2021 U.S. Olympic Team Trials With Hayward Field Footwear And Apparel Collection', 'Nike-Hayward-Field-Collection-2021.jpeg', '&lt;p&gt;Ahead of the Tokyo Olympics, NIKE, Inc. has put together a footwear and apparel collection inspired by and commemorating the University of Oregon&rsquo;s Hayward Field.&lt;/p&gt;&lt;p&gt;Also known as &ldquo;TrackTown, USA,&rdquo; the Eugene, Ore.-located field has been a crucial part of Nike&rsquo;s history. The U.S. Track and Field Trials were held at the University of Oregon&rsquo;s storied locale in 1972, an event during which Steve Prefontaine left an impression on Bill Bowerman, Phil Knight and the American track and field space. The delayed 2020 Trials will take place at the newly-renovated Hayward Field, and serve as the U.S. Track and Field team&rsquo;s selection process for the Olympic Games.&lt;/p&gt;&lt;p&gt;For the collection, the Nike React Infinity Run 2 and Nike ZoomX NEXT% 2 indulge in a color palette inspired by the Pacific Northwest. Hits of gold and green are informed by the lush landscape surrounding &ldquo;TrackTown, USA&rdquo;; accompanying t-shirts and hoodies feature a number of graphics nodding to the Swoosh&rsquo;s Blue Ribbon Sports origins, the state of Oregon and running.&lt;/p&gt;&lt;p&gt;Enjoy imagery of the collection here below, and anticipate items to hit Nike.com soon. The complete schedule for the U.S. Track and Field Trials can be found here.&lt;/p&gt;&lt;p&gt;Elsewhere under the NIKE, Inc. umbrella, the fragment x Travis Scott x Air Jordan 1 High is anticipated to launch on July 29th.&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2021/04/Nike-React-Infinity-Run-2-FK-DJ5181-400-4.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2021/04/Nike-ZoomX-VaporFly-NEXT-2-DJ5182-700-5.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2021/04/Nike-React-Infinity-Run-2-FK-DJ5181-400-8.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2021/04/Nike-ZoomX-VaporFly-NEXT-2-DJ5182-700-8.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2021/04/Nike-React-Infinity-Run-2-FK-DJ5181-400-9.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&lt;br&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 1, '2021-07-01 03:26:35'),
(50, 'nero', 3, 'INVINCIBLE Pushes A Motivational Theme For Hiking-Inspired adidas “Unstoppable” Pack', 'invincible-adidas-unstoppable-pack-2.jpg', '&lt;p&gt;As more of the world opens up and people look towards the outdoors for solace and exercise, footwear for off-road exploration has become increasingly relevant. To this end, INVINCIBLE and adidas have prepped the &ldquo;Unstoppable&rdquo; pack, which features the all-new Ultra Boost PB and SL20.2.&lt;/p&gt;&lt;p&gt;Conceptually, the footwear duo serves as a reminder to be relentless in adapting under any given circumstance, both internal and external. Practically, the hiking-inspired iterations of aforementioned running silhouettes have been tweaked with lightweight mesh and micro nylon, rubberized accents and speed-lacing systems. The Boost-cushioned option arrives in a covert &ldquo;phantom&rdquo; colorway, while the Lightstrike-backed option boasts an equally-versatile &ldquo;coyote&rdquo; color scheme. Both offer the wearability perfect from transitioning from urban dwelling to mountain trails.&lt;/p&gt;&lt;p&gt;Enjoy a look at the &rsquo;90s-inspired imagery here below, and find pairs arriving to INVINCIBLE&rsquo;s webstore on October 9th; Taipei, Taichung, Kaohsiung and Jakarta locations on October 10th; and Shanghai and Chengdu outposts on October 17th.&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2020/10/invincible-adidas-unstoppable-pack-7.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2020/10/invincible-adidas-unstoppable-pack-4.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2020/10/invincible-adidas-unstoppable-pack-8.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2020/10/invincible-adidas-unstoppable-pack-5.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2020/10/invincible-adidas-unstoppable-pack-3.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;td&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sneakernews.com/wp-content/uploads/2020/10/invincible-adidas-unstoppable-pack-1.jpg?w=1140&quot; alt=&quot;&quot;&gt;&lt;/figure&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 1, '2021-07-01 03:37:15'),
(51, 'nero', 2, 'The Nike Zoom Alphafly NEXT% Worn By Eliud Kipchoge During His Sub 2 Hour Marathon Is Releasing', 'nike-alphafly-next-percent-white-pink-marathon-1.jpg', '&lt;p&gt;Eliud Kipchoge&lsquo;s astounding sub-two hour marathon run last October will be forever etched into the archives of sports as one of the greatest performances in history. Clocking in at an impressive 1:59:40, the Kenyan runner has not only set the bar extremely high, but also inspired many across the world to never be afraid to dream too big.&lt;/p&gt;&lt;p&gt;And as the Swoosh does best, they&rsquo;re celebrating this wondrous athletic achievement through special footwear that involves multiple colorways of the Nike AlphaFly NEXT% inspired by Kipchoge himself. After revealing a Kenya-influenced makeup, the premium runner is now showing off another entry which color-coordinates to the exact prototype pair that the long-distance runner sported during the aforementioned race in Vienna. Uppers are backdropped with a bright white Atomknit material, and contrasted with that of interwoven black Swooshes. The beefy Zoom/Air-loaded midsoles are dialed to an off-white complexion, and color-blocked with a potent pink panel towards the heel. Furthermore, the heel tabs print out &ldquo;EK&rdquo; on the right foot, &ldquo;1:59:40&rdquo; on the left foot, while &ldquo;Eliud&rdquo; lands on the left tongue tab, all of which appear in marathon clock-like font. Check out a detailed look here, and expect these to drop within the coming months on Nike.com for $275 USD.&lt;/p&gt;&lt;p&gt;Elsewhere in Nike-related news, the blue Kasina Dunks have been revealed through official imagery.&lt;/p&gt;', 1, '2021-07-01 03:57:15'),
(52, 'nero', 2, 'THE BIGGEST MISTAKES PEOPLE MAKE WHILE RUNNING', 'runner-getty.jpg', '&lt;p&gt;Running is good for your health and body but if you fail to follow simple advice such as pre-run stretches, wearing the right shoes and pushing yourself too far, you could be doing yourself more harm than good.&lt;/p&gt;&lt;p&gt;If you&rsquo;re looking to avoid injuries Xavier Amatriain, VP of Engineering at Quora and regular marathon runner has some advice.&lt;/p&gt;&lt;p&gt;In a forum question on the website, Xavier explains that his main rule for avoiding injury is to &ldquo;not increase speed and distance at the same time.&rdquo;&lt;/p&gt;&lt;p&gt;He explained: &ldquo;If one particular run is going to be \'faster than usual\', I will do it shorter. If one particular run is going to be longer, I will do it slower. If one week I have run longer than usual I will try to make sure the average pace is slower.&rdquo;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;He also added that focusing on &ldquo;just&rdquo; running could result in injury.&lt;/p&gt;&lt;p&gt;&ldquo;If you only run and do no stretching or leg/core strengthening exercises, you are also likely to get injured. Try to add quad/gluts exercises such as squats and core exercises such as planks. Strong quads, gluts, and core, are key to a happy running.&rdquo;&lt;/p&gt;', 1, '2021-07-01 04:07:12'),
(53, 'nero', 4, 'Plyometric exercises for runners', 'rocketjump_1.jpg', '&lt;p&gt;Whether the London Marathon inspired you to pull your running trainers out of the closet for a stab at next year\'s event, or you fancy a casual jog around the block - here Standard Sport provides six plyometric exercises for runners.&lt;/p&gt;&lt;p&gt;The high-intensity routine involves exerting maximum muscle force in short bursts and was first used by athletes looking to build athletic power ahead of track and field events.&lt;/p&gt;&lt;p&gt;Each \'explosive\' exercise works several muscles at one time and is designed to prepare your body for sharp muscular movements.&lt;/p&gt;&lt;p&gt;They are widely used in calorie-busting workouts but should be used to complement a training regime to prevent the risk of serious injury.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Try theses six drills as a circuit twice through for 10 minutes...&lt;/strong&gt;&lt;/p&gt;', 1, '2021-07-01 04:25:30'),
(55, 'nero', 4, '24 Athletes, 12 Support Staff Members Test COVID-19 Positive In SAI Bhopal, None Olympic-Bound', 'utnfgog_athletics-afp_625x300_21_March_21.jpg', '&lt;p&gt;In order to contain the spread of COVID-19 virus, the athletes, who have tested positive, have been shifted to a hospital as a precautionary measure.&lt;/p&gt;&lt;p&gt;As many as 24 sportspersons and 12 support staff members have tested positive for the coronavirus at the Sports Authority of India\'s (SAI) Bhopal centre but none of the athletes are Olympics-bound. According to SAI, the positive cases came to light during two rounds of precautionary tests on April 3 and 6. The SAI Bhopal Center doesn\'t house any Olympic probable. &quot;In the two rounds of testing, a total of 36 people have tested positive for Covid, out of whom 24 are athletes, and the other 12 who are staff of NCOE (National Centre of Excellence),&quot; a SAI official told PTI when enquired about the tests.&lt;/p&gt;&lt;p&gt;&quot;None of the athletes who have tested positive are Olympic-bound. Some of the athletes who tested positive had returned from wushu and judo competitions.&quot;&lt;/p&gt;&lt;p&gt;In order to contain the spread of the virus, the athletes, who have tested positive, have been shifted to a hospital as a precautionary measure.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&quot;None of the athletes are critical.&quot;&lt;/p&gt;&lt;p&gt;The SAI had further instructed all the NCOEs to strictly follow its existing Standard Operating Procedures (SOPs) with stress on conducting regular precautionary tests.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;On March 31, 30 sportspersons and support staff across disciplines were found to be COVID-19 positive after 741 precautionary tests were conducted at the National Centres of Excellence in Patiala and Bengaluru.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;However, the positive results in both the centres did not include any Tokyo Olympic-bound athlete.&lt;/p&gt;', 1, '2021-07-01 05:16:39'),
(56, 'nero', 4, 'Health, sport and wellbeing', '126254913-healthy-sport-vector.jpg', '&lt;p&gt;During recent decades, there has been a progressive decline in the level of physical activity in people\'s daily lives in developed countries. For a majority of people, little physical effort is involved any more in their work, domestic chores, transportation and leisure. Whilst specific health risks differ between countries and regions, the fact remains that physical inactivity is a major risk factor for most common non-communicable diseases and physical activity can counteract many of the ill effects of inactivity.&lt;/p&gt;&lt;p&gt;The World Health Organisation (WHO) estimates that, with the exception of sub-Saharan Africa, &lt;strong&gt;chronic diseases are now the leading causes of death&lt;/strong&gt; in the world. The WHO cites four non-communicable diseases that make the largest contribution to mortality in low- and middle-income countries, namely: cardiovascular disease, cancer, chronic respiratory disease, and diabetes.&lt;br&gt;&lt;br&gt;How can sport help to reach specific health objectives through these approaches?&lt;br&gt;&lt;br&gt;Read the sections on: the physical and mental health benefits of sport and physical activity; how sport tackles HIV/AIDS and other communicable diseases; the practical implications for sport for HIV/AIDS prevention programmes; and the use of sport in public health campaigns.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Defining health&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;One of the most widely-used definitions of health is that of the WHO, which defines health as: &lt;strong&gt;&ldquo;a state of complete physical, mental and social well-being and not merely the absence of disease or infirmity&rdquo;&lt;/strong&gt;. This definition goes well beyond a condition of physical health but includes mental health and general well-being.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Physical activity and health&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Sport and physical activity has long been used as a tool to improve mental, physical and social well-being.&lt;/p&gt;&lt;p&gt;Physical inactivity is a major risk factor associated with a large number of lifestyle diseases such as cardiovascular disease, cancer, diabetes and obesity. Sport projects that specifically focus on health outcomes generally emphasise:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;The promotion of healthy lifestyle choices among children and young people as well as adults to combat inactivity;&lt;/li&gt;&lt;li&gt;The use of sport as a tool to raise awareness on communicable diseases in developing countries, for example, through district or national health campaigns supported by athletes and sports competitions;&lt;/li&gt;&lt;li&gt;The use of sport as a didactical tool to communicate vital health-related information to &lsquo;at risk&rsquo; groups;&lt;/li&gt;&lt;li&gt;The use of sport to mobilise hard-to-reach groups as part of large-scale health campaigns, including for example, communities with low population density;&lt;/li&gt;&lt;li&gt;Sport is considered to contribute to achieving mental health objectives, including addressing depression and stress-related disorders.&lt;/li&gt;&lt;/ul&gt;', 1, '2021-07-01 07:22:17'),
(57, 'nero', 4, 'The benefits of exercise on health and lifestyle', 'gym-services.jpg', '&lt;p&gt;FOLLOWING OUR FIT FOCUS FORUM (A FREE HEALTH AND FITNESS MINI-CONFERENCE FOR MEMBERS)&amp;nbsp;AT THE SPORT &amp;amp; FITNESS CLUB LAST WEEKEND, WE CAUGHT UP WITH OUR EXPERTS TO GET THE LOW-DOWN ON THEIR DISCUSSIONS.&lt;/p&gt;&lt;p&gt;Simon Donovan is a personal trainer at University of Birmingham Sport &amp;amp; Fitness, and takes a holistic approach to health management, through exercise, recovery, diet, sleep and stress control. Here, he discusses&amp;nbsp;the top reasons why exercise is so beneficial to our health.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h4&gt;&lt;strong&gt;INCREASED ENERGY&lt;/strong&gt;&lt;/h4&gt;&lt;p&gt;Despite the fact that exercise is a great way to increase your body&rsquo;s energy expenditure, it is also a great way to improve your productivity, alertness and mental focus throughout the day. The increased energy levels that occur as a result of the bout of exercise are also likely to lead to more active habits throughout the day, such as taking the stairs instead of the lift, or walking to speak to colleagues&amp;nbsp;instead of emailing. This increased activity will then confer physical&amp;nbsp;and mental benefits in a positive, self-perpetuating cycle.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h4&gt;&lt;strong&gt;POSITIVE MIND-SET&lt;/strong&gt;&lt;/h4&gt;&lt;p&gt;The endorphins released during physical activity can help us see the world in a brighter light and enhance mental wellbeing.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h4&gt;&lt;strong&gt;BETTER SLEEP QUALITY&lt;/strong&gt;&lt;/h4&gt;&lt;p&gt;Physical activity can help us to improve the length and the quality of our sleep which will in turn have further contributions to our health and wellbeing. Whilst there is no absolute figure we should aim for in terms of sleep duration, most people will find that they fall somewhere between 6-9 hours a night. Quality is certainly more important than quantity.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h4&gt;&lt;strong&gt;STRESS MANAGEMENT&lt;/strong&gt;&lt;/h4&gt;&lt;p&gt;Likewise, regular physical activity can help us to manage life stressors much better, through both release of endorphins and as a distraction technique. As discussed, exercise can help you achieve a more positive outlook as well as improve sleep quality, both of which are important in managing stressors. It is also thought that exercise can help to improve our ability to activate the control centres in our brain and the nervous system, which helps us rationalise situations &ndash; very helpful when we are under pressure.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h4&gt;&lt;strong&gt;BODY COMPOSITION&lt;/strong&gt;&lt;/h4&gt;&lt;p&gt;Increased physical activity levels can reduce body fat and increase muscle tissue &ndash;&amp;nbsp;contributing towards an overall&amp;nbsp;positive body composition profile. Body fat percentage is a more useful tool when looking at body composition than body weight alone. The Gym at Sport &amp;amp; Fitness offers Muscle and Weight Analysis tests which can assess your body fat percentage.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h4&gt;&lt;strong&gt;IMPROVED PHYSICAL FUNCTION&lt;/strong&gt;&lt;/h4&gt;&lt;p&gt;Regular&amp;nbsp;activity can improve our physical capabilities, enhancing muscle strength as well as overall fitness and stamina. This can make daily tasks much easier and increase our quality of life. This is particularly important as we get older. The ageing process results in the loss of muscle tissue, and exercise can help offset some of this muscle loss, helping to preserve strength and function.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h4&gt;&lt;strong&gt;REDUCED RISK OF DISEASE&lt;/strong&gt;&lt;/h4&gt;&lt;p&gt;Exercise is one of the most powerful preventative medicines we have in reducing our risk of developing diseases such as Type 2 Diabetes and Cardiovascular disease. It can also be beneficial in managing and rehabilitating these conditions, so exercise can be preventative as well as useful for recovery.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h4&gt;&lt;strong&gt;SO WHAT IS THE RECOMMENDED AMOUNT OF EXERCISE?&lt;/strong&gt;&lt;/h4&gt;&lt;p&gt;The &lt;a href=&quot;http://acsm.org/&quot;&gt;American College of Sports Medicine&lt;/a&gt; (ACSM) recommends that we aim for a minimum of 150 minutes of moderate exercise, or 75 minutes of vigorous exercise a week &ndash; that&rsquo;s only 30 minutes for five days a week! This is the minimum and ideally we should be aiming for more. Walking more &ndash; whether it be taking the stairs instead of the lift or as part of your commute &ndash; can be a great way to add a bit more physical activity into a busy lifestyle.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;strong&gt;&lsquo;To put it quite simply we are designed to move. Physical activity is a key component of a healthy lifestyle. We should be looking for ways to incorporate more activity into our day.&rsquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&ndash; Simon Donovan&lt;/strong&gt;&lt;/p&gt;&lt;/blockquote&gt;', 1, '2021-07-01 07:25:25'),
(58, 'nero', 6, '\'Choose you\' during This Girl Can Week', '250619 - 072 - 1266.jpg', '&lt;p&gt;The campaign launches a week for women to prioritise themselves and to feel the benefits of being physically active.&lt;/p&gt;&lt;p&gt;The first This Girl Can Week begins tomorrow (Saturday) as our award-winning campaign calls on women to choose themselves and take the time to get active.&lt;/p&gt;&lt;p&gt;After more than a year of disruption, the week is a response to our own research that shows women have found it harder than men to maintain their activity habits curing the coronavirus (Covid-19) pandemic.&lt;/p&gt;&lt;p&gt;The figures come from &lt;a href=&quot;https://indd.adobe.com/view/793b48d5-bbcd-4de3-a50f-11d241a506b3&quot;&gt;&lt;strong&gt;wave 18 of our coronavirus activity, attitudes and behaviour tracking research&lt;/strong&gt;&lt;/a&gt;, carried out by Savanta ComRes on our behalf.&lt;/p&gt;&lt;p&gt;It shows that while two thirds of women agree it&rsquo;s become even more important to keep active through the pandemic, women have had less time to do so than men &ndash; 61% of men say the pandemic has given them more time to exercise, compared to just 54% of women.&lt;/p&gt;&lt;p&gt;An increase in domestic responsibilities is one cause, with 16% of women listing childcare as a reason why they&rsquo;re unable to prioritise time for exercise, compared to only 7% of men.&lt;/p&gt;&lt;p&gt;So This Girl Can Week, running from 12-19 June, will see the campaign encourage women across the country to &lsquo;choose you&rsquo; and find a way to get active that works for them and makes them feel good.&lt;/p&gt;&lt;p&gt;The week will shine a spotlight on women and exercise and celebrate how getting active can make women feel happier, stronger and free.&lt;/p&gt;&lt;p&gt;And This Girl Can campaign lead Kate Dale hopes it\'ll inspire women to put their own needs first.&lt;/p&gt;&lt;p&gt;&ldquo;As our insight shows, the last year has been difficult for women when it comes to doing something for themselves, particularly when it comes to getting physically active,&rdquo; she said.&lt;/p&gt;&lt;p&gt;&ldquo;With continued barriers such as childcare commitments and not feeling fit enough or good enough, This Girl Can aims to frame exercise in a way that highlights every benefit we can all get from moving more, like feeling healthier, better mental and emotional health, flexibility, building strength and &ndash; most importantly &ndash; having fun.&lt;/p&gt;&lt;p&gt;&ldquo;Through our first ever This Girl Can Week, we want to inspire and encourage women to be more active.&lt;/p&gt;&lt;p&gt;&ldquo;No matter your shape, size, or ability, now is the time to choose you and celebrate moving your body in whatever way makes you feel good.&rdquo;&lt;/p&gt;&lt;p&gt;Our research also highlighted the barriers many women feel are preventing them from being active, with 42% saying they&rsquo;re too tired, 25% not feeling fit enough, the same amount concerned over work commitments and 14% citing worries over Covid-19&amp;nbsp;itself.&lt;/p&gt;&lt;p&gt;More positively, the data did show the importance women have placed on exercise as a tool for coping throughout the pandemic, with 66%&amp;nbsp;saying they use it to manage their physical health and 64% doing the same for their mental health.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;i&gt;No matter your shape, size, or ability, now is the time to choose you and celebrate moving your body in whatever way makes you feel good.&lt;/i&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Kate Dale&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Campaign lead for This Girl Can, Sport England&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;So whether it&rsquo;s a brisk walk, a slow run, a trip to the pool or a dance around the living room with friends, This Girl Can Week ambassador Karen Hauer is encouraging women to share choosing themselves and getting active using #ThisGirlCan.&lt;/p&gt;&lt;p&gt;&ldquo;I&rsquo;m delighted to support the This Girl Can Week and help the campaign continue to break down the barriers that make women feel like they can&rsquo;t get active,&rdquo; said the Strictly Come Dancing star.&lt;/p&gt;&lt;p&gt;&ldquo;The week is an important reminder that every woman should have the freedom to put their own needs first and get active in a way that suits them.&lt;/p&gt;&lt;p&gt;&ldquo;Getting active for yourself doesn&rsquo;t have to be about having the newest equipment or masses of space &ndash; whether it&rsquo;s dancing around your living room with friends or a quick walk round the block, if it gets your heart rate up and your body moving then you&rsquo;re doing it right.&rdquo;&lt;/p&gt;', 1, '2021-07-02 14:58:21'),
(59, 'nero', 1, 'Joint statement on race in sport review', '110919 - 034 - 1266.jpg', '&lt;p&gt;Last year, along with the other home sports councils, we began a review into racism and racial inequality in sport, the findings of which we\'re now publishing.&lt;/p&gt;&lt;p&gt;We&rsquo;ve carried out a detailed, independent review -&amp;nbsp;in collaboration with the other home country Sports Councils and UK Sport -&amp;nbsp;into tackling racism and racial inequality in sport.&lt;/p&gt;&lt;p&gt;We\'re all now publishing the findings of this review, as well as what we intend to do next.&lt;/p&gt;&lt;p&gt;Upon the publishing of these reports, the chief executives of each of the five home sports councils have issued the following joint statement:&lt;/p&gt;&lt;p&gt;In 2020, the murder of George Floyd was a catalyst for the five Sports Councils responsible for investing in and growing sport across the UK, to come together to explore racial inequalities in sport and to look at how reflective our sporting system is of UK society.&lt;/p&gt;&lt;p&gt;Led by the five chief executives of each organisation, this group has met regularly over the past year, and quickly established the Tackling Racism and Racial Inequality in Sport Review (TRARIIS). This was to help better understand if the Councils were doing enough to understand the context and tackle the issues involved.&lt;/p&gt;&lt;p&gt;The review involved an extensive analysis, carried out by the Sport Industry Research Centre (SIRC) at Sheffield Hallam University, of all publicly available data on race and ethnicity in sport.&lt;/p&gt;&lt;p&gt;It also involved an additional piece of work led by AKD Solutions, a Black-led learning and development consultancy, to carry out a lived experience research project in which over 300 people across the UK, ranging from grassroots participants to elite athletes and coaches, shared insights into their involvement in sport.&lt;/p&gt;&lt;p&gt;The findings make clear that racism and racial inequalities still exist within sport in the UK and that there are longstanding issues, which have resulted in ethnically diverse communities being consistently disadvantaged.&lt;/p&gt;&lt;p&gt;The review also highlighted the detrimental impact this has had on individuals, leading to mistrust and exclusion, and makes clear areas where we must see change.&lt;/p&gt;&lt;p&gt;The review has produced two reports, published in June 2021, identifying where there are gaps as well as common themes. They set out recommendations on how to make meaningful progress.&lt;/p&gt;&lt;p&gt;UK Sport, Sport England, sportscotland, Sport Wales, and Sport Northern Ireland welcome the depth of the findings and fully accept that the recommendations should now be used to develop and deliver tangible actions to tackle the issues raised.&lt;/p&gt;&lt;p&gt;The Councils also want to put on record their huge appreciation to all of those who shared their personal stories, a process which we know for many, will have been deeply upsetting.&lt;/p&gt;&lt;p&gt;Sport across the UK is delivered by a broad range of organisations. We call on them to work with us, as well as diverse communities in the UK, as we drive racial equality across all nations and in all sports.&lt;/p&gt;&lt;p&gt;While recognising that this process will take time, collectively, the Councils are determined to learn from the review and bring transformational change across sport, harnessing its huge power to drive equality and ensuring all parts of the system are fair, welcoming, inclusive, and diverse and that people have positive experiences at every level.&lt;/p&gt;&lt;p&gt;The Councils have agreed some initial overarching commitments that all five organisations will work on together ensuring they&rsquo;re aligned to their individual strategies. These relate to people; representation; investment, systems and insights and further details are set out on our equality and diversity page.&lt;/p&gt;&lt;p&gt;Each Council will also now work at pace to develop their own specific action plans to further deliver on these commitments, considering their own local contexts and remits, addressing the recommendations from the review.&lt;/p&gt;&lt;p&gt;This will involve working closely with relevant groups or communities in the coming months, to co-create solutions for real, lasting change and to earn trust. The resultant plans will be shared publicly to support the wider sports sector to understand and recognise the issues, and collectively bring about change.&lt;/p&gt;&lt;p&gt;All five organisations are committed to transparency and accountability and will continue to report publicly on progress. This work will continue to be led at chief executive-level.&lt;/p&gt;&lt;p&gt;&lt;i&gt;This was&amp;nbsp;a&amp;nbsp;statement from&amp;nbsp;Tim Hollingsworth, CEO Sport England; Sally Munday, CEO UK Sport; Stewart Harris, CEO sportscotland; Sarah Powell, CEO Sport Wales; and Antoinette McKeown, CEO Sport Northern Ireland.&lt;/i&gt;&lt;/p&gt;', 1, '2021-07-02 15:14:54');
INSERT INTO `posts` (`id`, `admin_user`, `topic_id`, `title`, `image`, `content`, `published`, `created_at`) VALUES
(60, 'nero', 4, 'The impact of coronavirus on activity levels revealed', 'ActiveLivesBodyImage.jpg', '&lt;p&gt;Our Active Lives Adult Survey shows the impact of the first eight months of coronavirus on activity levels, which activities grew in popularity and which audiences struggled.&lt;/p&gt;&lt;p&gt;The majority of&amp;nbsp;physically active adults in England&amp;nbsp;managed&amp;nbsp;to maintain&amp;nbsp;their habits despite the challenges of the coronavirus (Covid-19) pandemic, according to our latest Active Lives Adult Survey,&amp;nbsp;with just&amp;nbsp;710,000&amp;nbsp;fewer active adults&amp;nbsp;between&amp;nbsp;November&amp;nbsp;2019&amp;nbsp;and&amp;nbsp;November&amp;nbsp;2020&amp;nbsp;compared to the same period 12 months previously.&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;However, the first eight months of coronavirus restrictions, as well as the storms that had a huge impact on outdoor activity in early 2020, also led to a&amp;nbsp;worrying&amp;nbsp;increase in the number&amp;nbsp;of people&amp;nbsp;who&amp;nbsp;were&amp;nbsp;inactive&amp;nbsp;&ndash;&amp;nbsp;doing&amp;nbsp;less than 30 minutes&amp;nbsp;of&amp;nbsp;activity&amp;nbsp;a week&amp;nbsp;or nothing at all.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Our report, which we&rsquo;ve published today, shows&amp;nbsp;that while&amp;nbsp;the&amp;nbsp;restrictions associated with the&amp;nbsp;pandemic had an unprecedented impact on activity levels,&amp;nbsp;thanks&amp;nbsp;in part&amp;nbsp;to the&amp;nbsp;support&amp;nbsp;of the sport and physical activity sector,&amp;nbsp;many people were&amp;nbsp;able to adapt and find ways&amp;nbsp;to return to activity as restrictions eased. &amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Not all groups or demographics were affected equally though, with women, young people aged 16-24, over 75s, disabled people and people with long-term&amp;nbsp;health conditions,&amp;nbsp;and those from Black, Asian, and other minority ethnic backgrounds most negatively impacted&amp;nbsp;beyond the&amp;nbsp;initial&amp;nbsp;lockdown period.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Today&rsquo;s&amp;nbsp;findings&amp;nbsp;also&amp;nbsp;show how people\'s relationship with sport and physical activity changed across the various different phases of coronavirus restrictions,&amp;nbsp;who returned to activity once restrictions eased, and who didn&rsquo;t.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;The information available will be beneficial to the sport and physical&amp;nbsp;activity&amp;nbsp;sector as restrictions continue to ease&amp;nbsp;this summer&amp;nbsp;and&amp;nbsp;as&amp;nbsp;the weather improves and&amp;nbsp;consumer confidence increases&amp;nbsp;due to&amp;nbsp;the vaccine rollout.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sportengland-production-files.s3.eu-west-2.amazonaws.com/s3fs-public/styles/max_width_1266px/public/2021-04/Levels%20of%20activity%20Nov%2019-20%20web.JPG?VersionId=gN77GIDRZkIgkB8H_._XFH1FX64n2Hdp&amp;amp;itok=hb1YZmMj&quot; alt=&quot;A chart from the Active Lives Adult Survey November 2019-20 showing activity levels of England&quot;&gt;&lt;/figure&gt;&lt;h3&gt;The scale of&amp;nbsp;disruption&amp;nbsp;&amp;nbsp;&lt;/h3&gt;&lt;p&gt;The pandemic led to&amp;nbsp;unprecedented decreases in activity levels&amp;nbsp;during the initial restrictions&amp;nbsp;and, as a result, the latest annual results show the following changes compared to 12 months earlier:&amp;nbsp;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;710,000 (-1.9%) fewer active adults&amp;nbsp;meeting the Chief Medical Officer&rsquo;s&amp;nbsp;guidelines&amp;nbsp;of taking part in 150 minutes of moderate intensity physical activity a week, taking the total number of active adults to&amp;nbsp;27.9&amp;nbsp;million&amp;nbsp;(61.4% of the population)&lt;/li&gt;&lt;li&gt;1.2m&amp;nbsp;(+2.6%) more inactive adults&amp;nbsp;taking part in less than&amp;nbsp;an average of&amp;nbsp;30 minutes a week,&amp;nbsp;taking the total number of inactive adults in England to 12.3m&amp;nbsp;(27.1% of the population).&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;This, however, masks the scale of the&amp;nbsp;changes seen during the impacted months.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Activity levels were hit hardest during the initial phase of the pandemic (the national lockdown between mid-March and mid-May) and&amp;nbsp;the proportion of the population classed as active dropped by 7.1% &ndash; or by just over 3m fewer active adults &ndash;&amp;nbsp;compared&amp;nbsp;to the&amp;nbsp;12&amp;nbsp;months before.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;During the second phase, as restrictions were eased, activity levels were still down compared to the previous 12 months, but the reductions were smaller,&amp;nbsp;with 4.4%/2.0m fewer active adults across mid-May to mid-July and 3.1%/1.4m fewer active adults across mid-July to mid-September.&amp;nbsp;&lt;/p&gt;&lt;p&gt;In&amp;nbsp;the third phase of the pandemic,&amp;nbsp;as new restrictions were imposed&amp;nbsp;but before the full impact of the new national lockdown in November was felt, activity levels&amp;nbsp;decreased&amp;nbsp;by 1.8% and there were 810,000 fewer active adults.&amp;nbsp;&lt;/p&gt;&lt;p&gt;There were patterns in the way&amp;nbsp;that&amp;nbsp;different&amp;nbsp;groups and demographics&amp;nbsp;responded&amp;nbsp;to the easing of&amp;nbsp;restrictions, however, with women less likely to return to activity than men.&amp;nbsp;See&amp;nbsp;below for more information on how&amp;nbsp;the impact of the pandemic varied across different demographic groups.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://sportengland-production-files.s3.eu-west-2.amazonaws.com/s3fs-public/styles/max_width_1266px/public/2021-04/Reference%20points_0.JPG?VersionId=0W_Udmek6Qvmw60OEeI71Vh6bU_yUvOo&amp;amp;itok=KFQoUIkx&quot; alt=&quot;a graphic showing the timeline of coronavirus restrictions&quot;&gt;&lt;/figure&gt;&lt;h3&gt;How people&amp;nbsp;reacted&amp;nbsp;&amp;nbsp;&lt;/h3&gt;&lt;p&gt;Restrictions designed to combat the spread of coronavirus had a profound impact on the types of activities &ndash; and the form they could take &ndash; that were available between mid-March and mid-November.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Whilst the restrictions severely limited the ability to take part in&amp;nbsp;some activities such as&amp;nbsp;walking for&amp;nbsp;travel&amp;nbsp;(-4.2m&amp;nbsp;over the 12 months in those reporting&amp;nbsp;taking part at least twice in the last 28 days),&amp;nbsp;swimming&amp;nbsp;(-1.8m)&amp;nbsp;and team&amp;nbsp;sports (-940k), we can also see the significant attempts of the population to find alternatives through increases in activities like walking&amp;nbsp;for leisure (+1.3m), running&amp;nbsp;(+470k)&amp;nbsp;and cycling&amp;nbsp;for leisure and sport (+1.2m).&amp;nbsp;&lt;/p&gt;&lt;p&gt;Although at&amp;nbsp;home exercise was encouraged,&amp;nbsp;and&amp;nbsp;the numbers of people working out at home&amp;nbsp;increased&amp;nbsp;significantly, it was not enough to offset the lost gym environment&amp;nbsp;(-1.9m) and drop in&amp;nbsp;those taking part in&amp;nbsp;team sports&amp;nbsp;(-940k).&amp;nbsp;&lt;/p&gt;&lt;h3&gt;How we&rsquo;ve&amp;nbsp;helped&amp;nbsp;&lt;/h3&gt;&lt;p&gt;Throughout the pandemic our twin aims&amp;nbsp;have been to support the sport and physical activity sector&amp;nbsp;to keep going,&amp;nbsp;and to keep the nation active by directly influencing consumers through our campaigns.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Join the Movement, our &pound;3.5m National Lottery-funded and award-winning campaign&amp;nbsp;launched&amp;nbsp;two weeks after the first Covid-19 restrictions&amp;nbsp;to help people to stay active during the pandemic,&amp;nbsp;and&amp;nbsp;has played&amp;nbsp;a key role&amp;nbsp;in helping to motivate and provide guidance on how to find free, accessible activities.&amp;nbsp;&lt;/p&gt;&lt;p&gt;The campaign reached 37 million people between April and June&amp;nbsp;and&amp;nbsp;45% of adults&amp;nbsp;say they&amp;nbsp;recognise the campaign, almost half (47%) of whom increased their physical activity level or effort as a result of seeing it.&amp;nbsp;&lt;/p&gt;&lt;p&gt;We&rsquo;ve also supported the sector financially&amp;nbsp;with over &pound;230m&amp;nbsp;of funding,&amp;nbsp;including&amp;nbsp;our&amp;nbsp;Community Emergency Fund&amp;nbsp;and various&amp;nbsp;Return to Play funding options&amp;nbsp;that are&amp;nbsp;helping keep sports clubs and activity providers going through this very difficult period.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Our investment also includes&amp;nbsp;our &pound;20m&amp;nbsp;Tackling Inequalities Fund&amp;nbsp;that&rsquo;s&amp;nbsp;designed to help specific groups&amp;nbsp;disproportionately impacted by the restrictions.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;During the 2020-21 financial year we released more than &pound;414m of grant funding, a 60% increase on the previous year, in 13,170 individual grant payments.&amp;nbsp;&lt;/p&gt;&lt;p&gt;As of today, we&rsquo;ve also updated our Return to Play&amp;nbsp;Fund&rsquo;s criteria to encourage more applications from groups and clubs that support people aged over 70 and from the 16-34 age&amp;nbsp;group.In&amp;nbsp;addition to funding, we also offered the sector advice&amp;nbsp;and practical resources,&amp;nbsp;while we&amp;nbsp;worked with the Department for Digital, Culture, Media and Sport to ensure the guidance as to what was and wasn&rsquo;t allowed at different stages was communicated effectively&amp;nbsp;to&amp;nbsp;activity providers&amp;nbsp;as&amp;nbsp;well&amp;nbsp;as the&amp;nbsp;general public.&amp;nbsp;This work supported the return of sport as one of the government&rsquo;s key priorities as restrictions eased.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;We also published a range of toolkits and&amp;nbsp;resources&amp;nbsp;to help sports clubs and physical activity groups&amp;nbsp;to continue to function and&amp;nbsp;engage with their members&amp;nbsp;while&amp;nbsp;their usual activities were&amp;nbsp;restricted.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;i&gt;We know the pandemic has had a huge impact on people&rsquo;s ability to engage in sport and physical activity, but the reality is it could have been worse. It is encouraging to see in the survey that so many still found ways to be active despite the majority of opportunities being unavailable or severely restricted.  &lt;/i&gt;&lt;br&gt;&lt;br&gt;&lt;i&gt;Alongside the support that we were able to offer, the response of the sector has been remarkable, and I pay tribute to everyone who has worked so hard to keep sport and physical activity going despite the most challenging situation of our lifetime.&lt;/i&gt;&lt;br&gt;&lt;br&gt;&lt;i&gt;However, today&rsquo;s report has also reminded us that not everyone has been impacted equally and we owe it to the groups disproportionately affected &ndash; women, young people, disabled people, people with a long-term health condition, and those from a Black or Asian background in particular &ndash; to do everything we can to help them to return to activity in the coming weeks and months.&lt;/i&gt;&lt;br&gt;&lt;br&gt;&lt;i&gt;In particular, the decline in activity levels in the 16-24 age group is of major concern - helping and inspiring young people to re-engage with sport and physical activity has now to be a number one priority not just for Sport England but for us all.&lt;/i&gt;&lt;br&gt;&lt;br&gt;&lt;i&gt;The report has also shown that, while new and more informal forms of physical activity are a great option for many, the role that organised sports and teams and our gyms and pools up and down the country play is still absolutely vital &ndash; not least in connecting our communities and reaffirming the social bonds we all need. The government understands this and we will continue to work closely with them to ensure the sport and physical activity sector remains a priority on the roadmap to reopening.&lt;/i&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Tim Hollingsworth&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Chief executive, Sport England&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/blockquote&gt;&lt;h2&gt;Demographic variations&lt;/h2&gt;&lt;h3&gt;Age&lt;/h3&gt;&lt;p&gt;Activity levels fell for both the 16-34 and 35-54 age groups compared to 12 months ago.&amp;nbsp;&lt;/p&gt;&lt;p&gt;This continues the downward trend seen before the pandemic for the 16-34 age group, with the proportion who are active having fallen a further 2.6%/410k&amp;nbsp;compared to the previous 12 months.&amp;nbsp;Within this, it&rsquo;s the 16-24 age group particularly driving the decreases.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Activity levels had been growing strongly amongst the 55-74&amp;nbsp;and 75+ age groups prior to the coronavirus pandemic, however,&amp;nbsp;many of these gains have been lost as activity levels fell notably when restrictions were introduced.&amp;nbsp;&lt;/p&gt;&lt;p&gt;The 75+ age group&amp;nbsp;(-2.9%)&amp;nbsp;were particularly affected, and this may be linked to the requirement for&amp;nbsp;many of&amp;nbsp;those aged 70+ to shield during the earlier stages of the pandemic. This group have, so far, shown no real sign of recovery and it indicates this group may need additional support to recover activity levels.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;A&amp;nbsp;brief overview of&amp;nbsp;how&amp;nbsp;we&rsquo;re helping:&lt;/strong&gt;&amp;nbsp;We invested a further &pound;1.64m into our portfolio of &lsquo;Active Ageing&rsquo; partners to support even more older people to stay active during lockdown and as restrictions started to lift. This has been complemented by a further &pound;2.28m distributed through our Tackling Inequalities&amp;nbsp;Fund to support&amp;nbsp;more than&amp;nbsp;550 local community projects that are working to reduce the negative impact of coronavirus and the widening of the inequalities in sport and physical activity for older adults.  &amp;nbsp;&lt;/p&gt;&lt;p&gt;We teamed up with the Youth Sport Trust to develop a new online resource that&rsquo;ll help more children be physically active. The Active Recovery Hub, which has been funded by the National Lottery, provides schools, local authorities, and families with easy access to free resources that&rsquo;ll help more children reach the Chief Medical Officer\'s target of taking part in 60 minutes of physical activity a day.&amp;nbsp;&lt;/p&gt;&lt;p&gt;We&rsquo;re also launching Studio You, a new digital platform for secondary schools that&rsquo;ll give PE teachers across England access to a free digital library of video-based lessons. It&rsquo;s been created with teachers and young people to inspire less physically literate students to feel confident and comfortable being active at school.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Case study:&lt;/strong&gt;&amp;nbsp;We developed a partnership with the BBC to broadcast 10 Today nationally across its radio and online platforms during lockdowns.&amp;nbsp;The programme,&amp;nbsp;which offers simple and engaging&amp;nbsp;10-minute daily workouts for older audiences to do at home,&amp;nbsp;is&amp;nbsp;also available on community radio stations and via leaflets for those who don&rsquo;t have access to digital radio.&amp;nbsp;&lt;/p&gt;&lt;h3&gt;Gender&lt;/h3&gt;&lt;p&gt;Both men (-2.4%) and women (-1.4%) saw decreases in activity levels over the year as a whole. However, while male activity levels dropped by a larger amount in the initial lockdown between mid-March to mid-May (-8.9% versus &ndash;5.4%) they recovered more quickly, while female activity levels remained consistently lower than 12 months earlier.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;For example, female activity levels were down 2.8% between mid-September and mid-November compared to the same period the year before,&amp;nbsp;while&amp;nbsp;activity levels&amp;nbsp;for men&amp;nbsp;recorded no&amp;nbsp;change.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;This indicates that, despite their activity levels initially seeming more resilient to the pandemic, women who&rsquo;ve seen their activity levels fall may take longer and require more support to return.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;A brief overview of how we&rsquo;re helping:&lt;/strong&gt;&amp;nbsp;This Girl Can is our nationwide campaign to get women and girls moving, regardless of shape, size and ability.&amp;nbsp;The campaign has focused on at home activities during the pandemic and the This Girl Can community has helped women to encourage each other to stay active despite the challenges of coronavirus restrictions. Studio You, which we&rsquo;re developing to help young people get more active, will also play an especially vital role in helping girls to be active at school.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Case study:&lt;/strong&gt;&amp;nbsp;Angelique&amp;nbsp;on overcoming cancer and coronavirus&amp;nbsp;and how it&rsquo;s taught her to value her health and happiness even more.&amp;nbsp;&lt;/p&gt;&lt;h3&gt;Socio-economic groups&lt;/h3&gt;&lt;p&gt;Activity levels fell amongst all socio-economic groups compared to the same period a year ago.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;However, the fall was larger for those from lower socio-economic&amp;nbsp;groups&amp;nbsp;(-2.1%) than those from higher groups (-0.9%) and as such, the inequalities we were already seeing have widened.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Both higher and lower socio-economic&amp;nbsp;groups saw the largest drops during the initial lockdown period (mid-March to mid-May), in accordance with the national picture.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;A brief overview of how we&rsquo;re helping:&lt;/strong&gt;&amp;nbsp;Our Tackling Inactivity and Economic Disadvantage&amp;nbsp;programme is funding 35 projects to work with a diverse range of inactive people in different community settings. The types of projects funded vary from late-night physical activity sessions for shift-workers in Manchester, to a programme of activity sessions at a women&rsquo;s refuge charity in Yorkshire.&amp;nbsp;Some of our&amp;nbsp;local delivery pilots&amp;nbsp;are&amp;nbsp;specifically focused on how to support communities in some of the most deprived areas in the country.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Case study:&lt;/strong&gt;&amp;nbsp;Active Parks&amp;nbsp;uses local city parks and greenspaces to create opportunities for Birmingham&rsquo;s residents to take part in a wide range of physical activities to improve their health and wellbeing. In total, 81% of those taking part were from the two most deprived areas of the city.&lt;/p&gt;&lt;h3&gt;Ethnicity&lt;/h3&gt;&lt;p&gt;The impact of the pandemic has disproportionately impacted&amp;nbsp;those of Asian and Black&amp;nbsp;backgrounds&amp;nbsp;and, as such, inequalities that already existed have widened.&amp;nbsp;&lt;/p&gt;&lt;p&gt;White British activity levels fell by 1.5%&amp;nbsp;compared to the previous 12 months,&amp;nbsp;while Black and Asian (excluding Chinese) fell by&amp;nbsp;4.5% and 4.4%&amp;nbsp;respectively.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;A&amp;nbsp;brief overview of&amp;nbsp;how we&rsquo;re helping:&lt;/strong&gt;&amp;nbsp;We&rsquo;re&amp;nbsp;working in partnership with a variety of organisations&amp;nbsp;across sectors who know and understand the specific audiences we want to target, including partners who we&rsquo;ve traditionally not worked with.&amp;nbsp;Our Tacking Inequalities&amp;nbsp;Fund&amp;nbsp;has worked with our network of Active Partnerships and&amp;nbsp;our&amp;nbsp;national partners&amp;nbsp;to prioritise investment into projects that have been able to make an immediate impact on the ground.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Case study: &lt;/strong&gt;Michelle on&amp;nbsp;how she stayed active despite spending lockdown in a one-bedroom flat.&amp;nbsp;&lt;/p&gt;&lt;h3&gt;Disabled people and people with long-term health conditions&lt;/h3&gt;&lt;p&gt;Decreases were the&amp;nbsp;greatest&amp;nbsp;during the initial lockdown phase amongst both those with and without a disability or long-term health condition&amp;nbsp;&ndash;&amp;nbsp;in line with the national picture.&lt;/p&gt;&lt;p&gt;The scale of drops was slightly greater for&amp;nbsp;disabled people&amp;nbsp;or&amp;nbsp;people with a&amp;nbsp;long-term health condition&amp;nbsp;(for example,&amp;nbsp;8.2%&amp;nbsp;compared to&amp;nbsp;7.3%&amp;nbsp;during the period mid-March to mid-May&amp;nbsp;compared to the same period 12 months before), which may be attributed to the requirement for those with health conditions to shield.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;A&amp;nbsp;brief overview of how we&rsquo;re helping:&lt;/strong&gt;&amp;nbsp;From focusing on social inclusions&amp;nbsp;through&amp;nbsp;education to supporting people with complex communication needs,&amp;nbsp;we&rsquo;re working with a range of partners to help more disabled people get active.&amp;nbsp;We&rsquo;ve also&amp;nbsp;a lead partner in the&amp;nbsp;We Are Undefeatable&amp;nbsp;campaign&amp;nbsp;to support the 15 million people who live with one or more long-term health conditions in England to build physical activity into their lives.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Case study:&lt;/strong&gt; Diabetic Mahesh on&amp;nbsp;how he has been able to get active at home and in his garden&amp;nbsp;while shielding.&lt;/p&gt;&lt;h3&gt;Minister\'s comments&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;Sports Minister - Nigel Huddleston&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&quot;The past year has undoubtedly been a difficult one for our mental and physical health but, throughout the pandemic, we have prioritised the early return of grassroots sport and exercise at every stage.&lt;/p&gt;&lt;p&gt;&quot;We have provided unprecedented levels of financial support to the sector, through our Sport Survival Package, the Leisure Recovery Fund and through Sports England\'s support for grassroots sports.&lt;/p&gt;&lt;p&gt;&quot;I\'m really encouraged with how people have adapted and stayed active, and would continue to urge everyone to stay fit and healthy as society begins to reopen and we get back to the sports we love.&quot;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h2&gt;Additional&amp;nbsp;information&amp;nbsp;&lt;/h2&gt;&lt;p&gt;The Active Lives Adult Survey, which was established in November 2015, provides a world-leading approach to gathering data on how adults aged 16 and over in England engage with sport and physical activity.&amp;nbsp;&lt;/p&gt;&lt;p&gt;The survey is conducted to provide decision-makers, government departments, local authorities, delivery bodies and the sport and physical activity sector detailed insight and understanding as to people\'s sport and physical activity habits.&amp;nbsp;&lt;/p&gt;&lt;p&gt;It&rsquo;s carried out by leading research company IPSOS-MORI and produced by us in collaboration with Arts Council England, Public Health England and the Department for Transport.&lt;/p&gt;', 1, '2021-07-02 17:00:49'),
(61, 'nero', 1, 'New investment method to help life chances of young people', 'Bristol City Accademy 1193 - 1266.jpg', '&lt;p&gt;Children from lower socio-economic groups will benefit from a social impact bond enabling The Chances Programme to be rolled out to 21 locations in the UK.&lt;/p&gt;&lt;p&gt;We&rsquo;ll be using a social impact bond for the first time to harness the power of sport to enhance the life chances of disadvantaged young people.&lt;/p&gt;&lt;p&gt;The Chances Programme, co-developed by &lt;a href=&quot;http://www.substance.net/&quot;&gt;&lt;strong&gt;Substance&lt;/strong&gt;&lt;/a&gt;, us, the&lt;strong&gt; &lt;/strong&gt;&lt;a href=&quot;https://www.gov.uk/government/publications/life-chances-fund&quot;&gt;&lt;strong&gt;Life Chances Fund&lt;/strong&gt;&lt;/a&gt; and &lt;a href=&quot;https://c/Users/vicky.m/AppData/Local/Microsoft/Windows/INetCache/Content.Outlook/88R4AFBH/bigissueinvest.com&quot;&gt;&lt;strong&gt;Big Issue Invest&lt;/strong&gt;&lt;/a&gt;, will support more than 6,000 people aged 8-17&amp;nbsp;across 21 locations in the UK over the next three years.&lt;/p&gt;&lt;p&gt;Investment in the project comes in the form of &pound;1.25 million from the &lt;a href=&quot;https://bigissueinvest.com/outcomes-investment-fund/&quot;&gt;&lt;strong&gt;Big Issue Invest&rsquo;s Outcomes Investment Fund&lt;/strong&gt;&lt;/a&gt; and our own social impact bond (SIB).&lt;/p&gt;&lt;p&gt;The money will be used to create new opportunities to empower young people to get active and re-engage with education and skills provision &ndash; with the focus being on young people from lower socio-economic backgrounds and those with an offending record and/or low school attendance.&lt;/p&gt;&lt;p&gt;The Chances Programme is currently delivered in Doncaster, Bristol and Devon, and during March and April will be rolled out to 18 more local authority areas in the UK.&lt;/p&gt;&lt;p&gt;&ldquo;Whilst it\'s been hard for our children and young people to be active over the past year, this is an exciting project using physical activity to build happier and more productive lives and we are really proud to be a part of it,&rdquo; said our chief executive, Tim Hollingsworth.&lt;/p&gt;&lt;p&gt;&ldquo;The Social Impact Bond model used for this project embodies the values of collaboration and innovation that we wish to live by in our new strategy, and this new model represents an excellent opportunity to diversify and develop our investment approach.&quot;&lt;/p&gt;&lt;p&gt;This will be the first time we&rsquo;ve used a SIB &ndash; a commissioning tool enabling organisations to deliver outcomes contracts and make funding for services conditional on achieving results &ndash; and with more than 20 commissioners involved, it makes it the largest number of commissioners engaged in a SIB in the world.&lt;/p&gt;&lt;p&gt;The bond will help Substance &ndash; a research and technology company specialising in sport and physical activity and community regeneration &ndash; to work with its network of 16 local organisations based in youth and community facilities where young people meet.&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;i&gt;The social impact bond model used for this project embodies the values of collaboration and innovation that we wish to live by in our new strategy&lt;/i&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Tim Hollingsworth&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Chief executive, Sport England&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;The organisations use sessions focusing on sport and physical activity &ndash; including martial arts, dance and expeditions &ndash; to help encourage young people to re-engage with education and skills training.&lt;/p&gt;&lt;p&gt;Research from the Alliance of Sport in Criminal Justice shows one in five young people reporting involvement in crime and antisocial behaviour, with around 75,000 new entrants into the youth justice system every year.&lt;/p&gt;&lt;p&gt;StreetGames figures also suggest that young people from lower socio-economic backgrounds are around 50% less likely to take part in regular sport, volunteer, compete, be coached or hold club memberships than those from high income households.&lt;/p&gt;&lt;p&gt;That&rsquo;s why opportunities like The Chances Programme can have such a impact on participants such as Aqsa Asif.&lt;/p&gt;&lt;p&gt;&ldquo;The time on Chances really helped me figure out my next steps in life,&rdquo; he said. &ldquo;It got me into a really good headspace where I felt healthier, happier and the feeling I actually had something to contribute. It got me back on track with college.&rdquo;&lt;/p&gt;&lt;p&gt;And for Substance chief executive&amp;nbsp;Dr Tim Crabbe, the programme is an opportunity to make a real difference in people&rsquo;s lives.&lt;/p&gt;&lt;p&gt;&ldquo;Substance is excited to have developed a model that delivers outcomes with tangible value rather than just opportunities to get involved,&rdquo; he said. &ldquo;It is based on insight and learning about what works from its evaluation of hundreds of community-based physical activity programmes.&rdquo;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h3&gt;Organisations involved in the programme&lt;/h3&gt;&lt;p&gt;Substance uses a network of 16 organisations to deliver the programme in the youth and community facilities where young people meet.&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Arsenal in the Community (London)&lt;/li&gt;&lt;li&gt;Aston Villa Foundation (Midlands)&lt;/li&gt;&lt;li&gt;EnergizeSTW &ndash; Shropshire (West Midlands)&lt;/li&gt;&lt;li&gt;Exeter City Community Trust (South West)&lt;/li&gt;&lt;li&gt;Flying Futures &ndash; Doncaster (North)&lt;/li&gt;&lt;li&gt;Foundation of Light &ndash; Sunderland (North East)&lt;/li&gt;&lt;li&gt;Leyton Orient Trust (London)&lt;/li&gt;&lt;li&gt;Middlesbrough Football Club Foundation (North East)&lt;/li&gt;&lt;li&gt;Newcastle United Foundation (North East)&lt;/li&gt;&lt;li&gt;Oxfordshire Youth (South East)&lt;/li&gt;&lt;li&gt;Palace for Life Foundation (London)&lt;/li&gt;&lt;li&gt;Positive Youth Foundation &ndash; Coventry (West Midlands)&lt;/li&gt;&lt;li&gt;Saints Foundation (Southampton) (South East England)&lt;/li&gt;&lt;li&gt;Watford Community Sports and Education Trust (East of England)&lt;/li&gt;&lt;li&gt;Wigan Athletic Community Trust (North West)&lt;/li&gt;&lt;li&gt;Youth Moves &ndash; Bristol (South West)&lt;/li&gt;&lt;/ol&gt;', 1, '2021-07-02 17:18:02'),
(62, 'nero', 2, 'What the new national lockdown means for sport and physical activity in England', 'JoggerSnow.jpg', '&lt;p&gt;The government has announced a range of new restrictions designed to combat the steep rise in coronavirus (Covid-19) infections.&lt;/p&gt;&lt;p&gt;On Monday 4 January, the Prime Minister announced a new national lockdown to counter the steep rise in coronavirus (Covid-19) infections&amp;nbsp;in England.&lt;/p&gt;&lt;p&gt;The new restrictions become law on Wednesday 6 January, but people should follow them as of now.&lt;/p&gt;&lt;p&gt;More information about what is and isn\'t allowed&amp;nbsp;&lt;a href=&quot;https://www.gov.uk/guidance/national-lockdown-stay-at-home&quot;&gt;&lt;strong&gt;is available on the government&rsquo;s website&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt;.&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The new regulations have implications for sport and physical activity, and we&rsquo;re working closely with the government to provide comprehensive guidance to the sector.&lt;/p&gt;&lt;p&gt;We&rsquo;ll update our website with as much detail as possible as soon as we can, but in the meantime, we can confirm the following applies:&amp;nbsp;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;People should minimise time spent outside their home. It&rsquo;s against the law to meet socially with family or friends unless they are part of an individual&rsquo;s household or support bubble.&lt;/li&gt;&lt;li&gt;People can only leave their home to exercise, and not for the purpose of recreation or leisure, and can do so with one person from outside their household.&lt;/li&gt;&lt;li&gt;This should be limited to once per day, and individuals should not travel outside their local area.&lt;/li&gt;&lt;li&gt;When around other people, individuals should stay two metres apart from anyone not in their household - meaning the people they live with - or their support bubble.&lt;/li&gt;&lt;li&gt;Where this isn&rsquo;t possible, they should stay one metre apart with extra precautions (such as wearing a face covering).&lt;/li&gt;&lt;li&gt;Indoor gyms and sports facilities will remain closed.&lt;/li&gt;&lt;li&gt;Outdoor sports courts, outdoor gyms, golf courses, outdoor swimming pools, archery/driving/shooting ranges and riding arenas must also close.&lt;/li&gt;&lt;li&gt;Organised outdoor sport for disabled people is allowed to continue.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;Tim Hollingsworth, our chief executive, said:&amp;nbsp;&quot;We all understand the incredibly difficult decisions that the government is having to make to keep people and communities safe and why they are necessary at this time.&lt;/p&gt;&lt;p&gt;&quot;These latest restrictions will once again test the resilience of everyone involved in delivering sport and physical activity and will make keeping active a real challenge for people across the country.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&quot;Sport England&rsquo;s role in seeking to address this remains critical. We know that one of the best things people can do right now for their physical and mental health is to get up and get moving, and we\'ve got a huge number of resources and campaigns to help them to do so which we will be promoting widely as we move through this lockdown.&lt;/p&gt;&lt;p&gt;&quot;We will also continue to work with the sector to offer vital financial support, including through our existing open funds which organisations can now apply for and our administration of the government&rsquo;s Winter Sport Survival Package and National Leisure Recovery Fund, so that we can understand the challenges faced and emerge from this period in as strong a position as possible.&quot;&lt;/p&gt;', 1, '2021-07-02 17:29:06'),
(63, 'nero', 2, 'What the new Tier 4 means for sport and physical activity in England', 'joggerTier4.jpg', '&lt;p&gt;A new level of coronavirus restrictions comes into force across London and the south east on Sunday 20 December.&lt;/p&gt;&lt;p&gt;On Saturday 19 December, the Prime Minister announced that a new tier of coronavirus (Covid-19) restrictions would be introduced across certain parts of England.&lt;/p&gt;&lt;p&gt;Tier 4 will initially apply to London and the south east and comes into force on Sunday 20 December.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;To find out what alert tier your area is in,&amp;nbsp;&lt;a href=&quot;https://www.gov.uk/find-coronavirus-local-restrictions&quot;&gt;&lt;strong&gt;click here and enter your postcode&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt;.&lt;/strong&gt;&lt;/li&gt;&lt;li&gt;A live list of the areas that fall within each tier&amp;nbsp;&lt;a href=&quot;https://www.gov.uk/guidance/full-list-of-local-restriction-tiers-by-area&quot;&gt;&lt;strong&gt;can be found on the government&rsquo;s website&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt;.&lt;/strong&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;The new regulations will have implications for sport and physical activity, and we&rsquo;re working with the government to provide comprehensive guidance as to what is and isn&rsquo;t allowed within&amp;nbsp;this tier.&lt;/p&gt;&lt;p&gt;We&rsquo;ll update our website as soon as we can, but in the meantime, we can confirm the following applies across tier 4:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;People can exercise outdoors or visit some public outdoor places, such as parks, the countryside, public gardens or outdoor sports facilities. They&amp;nbsp;can continue to do unlimited exercise alone, or in a public outdoor place with their&amp;nbsp;household, support bubble, or one other person.&lt;/li&gt;&lt;li&gt;Outdoor sports facilities are allowed to open and&amp;nbsp;can be used by individual households, bubbles or two people from different households. This applies to outdoor sports courts, outdoor gyms, golf courses, outdoor swimming pools, archery/driving/shooting ranges, riding centres and playgrounds.&lt;/li&gt;&lt;li&gt;Organised outdoor sport for under-18s (including those who were under 18 on 31 August 2020)&amp;nbsp;and disabled people is allowed.&lt;/li&gt;&lt;li&gt;Indoor sport is allowed for under-18s for educational purposes&amp;nbsp;or to facilitate childcare that enables parents or carers to work,&amp;nbsp;seek work or take part in education.&lt;/li&gt;&lt;li&gt;Adult sport can\'t take place indoors under any circumstances, with gyms and swimming pools having to close.&lt;/li&gt;&lt;li&gt;There are no exceptions for disabled people taking part in sport or physical activity indoors.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;We know these new regulations will spark many questions from the sport and physical activity sector and we\'ll update our frequently asked questions as soon as possible.&lt;/p&gt;', 1, '2021-07-02 17:31:33'),
(64, 'nero', 6, 'Activity habits in early weeks of lockdown revealed', 'PA-54767949 - 1266.jpg', '&lt;p&gt;We\'ve published two new Active Lives Adult Survey reports that show how the coronavirus pandemic has impacted activity levels.&lt;/p&gt;&lt;p&gt;Activity levels in England were on course to reach record highs before the coronavirus (Covid-19) pandemic hit, according to our latest Active Lives Adult Survey.&lt;/p&gt;&lt;p&gt;The findings, which we&rsquo;ve published today, cover the 12 months from mid-May 2019 to mid-May 2020 and include the first seven weeks of lockdown restrictions imposed to prevent the disease from spreading.&lt;/p&gt;&lt;p&gt;The survey, which is conducted for us by Ipsos MORI,&amp;nbsp;shows that the gains made in the first 10 months of the year were cancelled out by drops in activity levels during this period, despite an increase in cycling for leisure, running outside and exercising at home as people adapted their activity habits during the pandemic. Overall, activity levels in England remained stable across the 12 months.&lt;/p&gt;&lt;p&gt;To explain the survey&rsquo;s results as clearly as possible, we&rsquo;ve produced two reports.&lt;/p&gt;&lt;p&gt;The first covers the full 12 months up until mid-May, while the second is a snapshot of people&rsquo;s behaviours and attitudes between mid-March and mid-May and covers the period when restrictions across the country were introduced. This report gives the&amp;nbsp;most detailed insight yet into how people&amp;nbsp;adapted&amp;nbsp;their activity habits in the first few weeks of restrictions.&lt;/p&gt;&lt;p&gt;The reports show that more than 3 million people were less active between mid-March and mid-May&amp;nbsp;compared to the same period a year before, and this demonstrates the extent to which people&rsquo;s lives were disrupted.&lt;/p&gt;&lt;p&gt;They also highlight the importance of organised sport and access to facilities for specific groups, and that some groups found it more difficult to adapt to the new regulations than others.&lt;/p&gt;&lt;p&gt;Disabled people, people aged 70 and over, people with long-term health conditions and people from Black, Asian and other minority ethnic groups were disproportionately impacted.&lt;/p&gt;&lt;h3&gt;What happened in lockdown?&lt;/h3&gt;&lt;p&gt;In lockdown itself, positive government messages about getting outside once a day for exercise played an important role in reminding people about the importance of activity for their health.&lt;/p&gt;&lt;p&gt;Today&rsquo;s report paints a picture of a nation doing its best to stay active despite the challenges to their daily lives, with people turning to home-based fitness, running and cycling in great numbers.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Walking was the most popular overall activity in the early&amp;nbsp;weeks from mid-March, with more than 21 million adults&amp;nbsp;walking&amp;nbsp;at moderate intensity, while outdoor running was also popular.&amp;nbsp;&lt;/p&gt;&lt;p&gt;The report also shows that the number of people cycling for leisure or sport increased&amp;nbsp;from&amp;nbsp;6.1m to 7.2m&amp;nbsp;(+2.5%) from mid-March to mid-May&amp;nbsp;compared to the same period 12 months prior.&amp;nbsp;As cycling for travel was down by 773,000 (-1.7%), the number of people cycling in total was up by 715,000 (+1.5%) overall.&lt;/p&gt;&lt;p&gt;Exercising at home also saw a boom&amp;nbsp;compared to the same two-month period in 2019,&amp;nbsp;as people were encouraged to get active indoors, with people like Joe Wicks&amp;nbsp;proving inspirational.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Fitness classes also moved online while people got active at home in other ways, in the garden with their families or through activities like dance. Overall, over the two-month period, there was an increase in home exercise of 2.1m and this was largely driven by women.&lt;/p&gt;&lt;p&gt;Join the Movement, our &pound;3.5m National Lottery-funded campaign, encouraged people to #stayinworkout and played an important role in helping to motivate and provide guidance on how to find free, accessible activities for all ages and abilities.&lt;/p&gt;&lt;h3&gt;Determination&lt;/h3&gt;&lt;p&gt;Our chief executive, Tim Hollingsworth, said the reports reveal a picture of both the ongoing growth in activity levels across England before the pandemic and people\'s determination to keep active even when they could only leave their homes once a day.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&ldquo;Though the early months of lockdown brought unprecedented disruption to our lives and had a huge impact on our&amp;nbsp;overall&amp;nbsp;engagement in sport and physical activity, it is&amp;nbsp;also positive&amp;nbsp;to see how many people turned to new activities like cycling, fitness at home and running,&rdquo; he added.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&quot;It also highlights the challenges this year has brought to those groups who already find it harder than most to be active, with disabled people, people with health conditions and younger people struggling, reminding us of the importance of educational settings, community leisure facilities and team sports that underpin access to&amp;nbsp;activity&amp;nbsp;for so many&amp;nbsp;people&amp;nbsp;across England.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&quot;As facilities have reopened and&amp;nbsp; activities have restarted, great credit is due to those who are out there working incredibly hard ensuring people can return to the sports and activities they love, and though we know the winter months will bring additional challenges, with government support&amp;nbsp;we will continue to support our sector through our funding, our insight and our campaigns.&quot;&lt;/p&gt;&lt;p&gt;Sports Minister Nigel Huddleston said:&amp;nbsp;&quot;As our physical and mental health have been tested by the coronavirus pandemic, the&amp;nbsp;government has put sport and physical activity at the heart of its agenda.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&quot;It\'s why we made sure people could exercise even at the height of the national lockdown, worked hard to get gyms and dozens of sports reopened when it was safe to do so, and put more than &pound;200 million into community sports clubs and exercise centres so they could remain open. Today we have underlined that commitment through a further &pound;100 million to support council leisure centres most in need.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&quot;As we head into a critical winter, we need to get the whole country match-fit to beat coronavirus. I encourage those yet to get active to feed off the spirit of the early morning walkers, the Wicks workouts and evening park runners earlier this year, and take up initiatives such as Sport England\'s \'Join the Movement\' campaign that continue to boost our wellbeing.&quot;&lt;/p&gt;&lt;h3&gt;Other findings&lt;/h3&gt;&lt;h4&gt;Disabled people and people with long-term health conditions&lt;/h4&gt;&lt;ul&gt;&lt;li&gt;This group were becoming more active before lockdown. Over the last three years there&rsquo;s been a 3.7% rise in the activity levels of this group, with more than 400,000 additional people classed as active.&lt;/li&gt;&lt;li&gt;However, between mid-March and mid-May, when many within these groups were advised to shield, many became more inactive and there was a rise of 11.2% in the number who did less than 30 minutes of exercise a week.&lt;/li&gt;&lt;li&gt;The We are Undefeatable campaign from 15 of the biggest health charities in England, which we support and is funded by the National Lottery, is specifically working to inspire and support these audiences to get active during the pandemic.&lt;/li&gt;&lt;/ul&gt;&lt;h4&gt;Age&lt;/h4&gt;&lt;ul&gt;&lt;li&gt;Activity levels amongst people aged 55 and over were increasing before the pandemic &ndash; over the last three years, activity levels for this group has risen by over 1.3m.&lt;/li&gt;&lt;li&gt;However, in the two months from mid-March, with people aged 70 and over asked to shield, the drop for this overall age group was proportionally greater than all other age groups (down 1.1m/7.2%).&lt;/li&gt;&lt;li&gt;The&amp;nbsp;proportion of active 16-34-year-olds dropped by 10% (1.4m) in these two months, likely due to their reliance on the activities that were not available in this period and the closure of school and further education settings, which are now open, reflecting a downward trend more generally of activity levels in this age group.&lt;/li&gt;&lt;/ul&gt;&lt;h4&gt;Socio-economic groups&lt;/h4&gt;&lt;ul&gt;&lt;li&gt;People in lower-socio economic groups saw significant drops in activity overall and the&amp;nbsp;gap between higher and lower socio-economic groups widened&amp;nbsp;during these&amp;nbsp;first weeks from mid-March.&lt;/li&gt;&lt;/ul&gt;&lt;h4&gt;Gender&lt;/h4&gt;&lt;ul&gt;&lt;li&gt;While the gender gap was still an issue leading up to the pandemic, in the two months from mid-March many women adjusted well to getting active at home, evidenced by the fact the numbers of people doing fitness activities remained relatively steady as people switched from doing gym classes to home classes &ndash; helped by providers and trainers who diversified and moved their offerings online. Our This Girl Can campaign continues to contribute to helping them with support and resources.&lt;/li&gt;&lt;li&gt;Men suffered a greater drop in activity levels (-1.8m) compared to women (-1.2m) in those early weeks &ndash; a reflection that men are more likely to take part in team and racket sports than women, both of which were not permitted.&lt;/li&gt;&lt;/ul&gt;&lt;h3&gt;The future&lt;/h3&gt;&lt;p&gt;More recent data, collected for us by Savanta ComRes, shows how important sport and activity restarting and leisure facilities reopening in recent weeks has been.&lt;/p&gt;&lt;p&gt;While the pandemic is still significantly affecting activity habits, there&rsquo;s evidence that the number of people swimming and doing team sports is slowly rising as some start to return to the activities they did before. For example, the number of people swimming in September doubled compared to August, though the numbers of people swimming is down overall still.&lt;/p&gt;&lt;p&gt;This is especially important for the 16-34-year-olds, whose activity levels dropped significantly in early lockdown.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h2&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Further information&lt;/h2&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;The Active Lives survey is conducted to provide decision makers, government departments, local authorities, delivery bodies and the sport and physical activity sector detailed insight and understanding as to people\'s sport and physical activity habits.&lt;/p&gt;', 1, '2021-07-02 17:50:21');
INSERT INTO `posts` (`id`, `admin_user`, `topic_id`, `title`, `image`, `content`, `published`, `created_at`) VALUES
(65, 'nero', 6, 'Simple activities set for participation increase', 'PA-53664338 - 1266.jpg', '&lt;p&gt;With indoor facilities and swimming pools able to reopen from this weekend, research shows swimming, walking, running and cycling look set for participation increases post-lockdown.&lt;/p&gt;&lt;p&gt;Walking, cycling, swimming and running look set for a boost in people participating as research shows an increased desire to get active after lockdown.&lt;/p&gt;&lt;p&gt;Throughout lockdown we&rsquo;ve been commissioning&amp;nbsp;surveys &ndash; carried out by Savanta ComRes &ndash; to understand people&rsquo;s activity levels and attitudes towards sport and physical activity.&lt;/p&gt;&lt;p&gt;The latest results show that, on the eve of indoor leisure facilities and pools being able to reopen, walking, running, cycling and swimming are top of people&rsquo;s lists to do.&lt;/p&gt;&lt;p&gt;Walking, running and cycling have proved popular throughout lockdown, but now 53% of people say they intend to walk, with 20% wanting to run, 19% keen on cycling and 20% saying they want to swim post-lockdown - up from 17% pre-coronavirus.&lt;/p&gt;&lt;p&gt;The research also shows 22% are looking forward to returning to the gym and doing fitness classes outside of their own home.&lt;/p&gt;&lt;p&gt;And that&amp;nbsp;news has been welcomed by our executive director of insight, Lisa O&rsquo;Keefe.&lt;/p&gt;&lt;p&gt;&ldquo;With much of society now reopen, this weekend represents a milestone for sport and physical activity, as many people have missed going to the gym, swimming and playing their favourite sports indoors,&rdquo; she said.&lt;/p&gt;&lt;p&gt;&ldquo;From Saturday we have a real chance to build on the activity levels of the past few months, as we enter a new period of living with coronavirus (Covid-19).&rdquo;&lt;/p&gt;&lt;p&gt;Activity levels initially held up well during lockdown, with people finding new ways to stay active, but as society has begun to reopen in recent weeks, there&rsquo;s been a dip.&lt;/p&gt;&lt;p&gt;Our latest ComRes survey shows the number of adults doing at least 30 minutes of physical activity, five or more days a week, dropped from 30% to 27%.&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;i&gt;From Saturday we have a real chance to build on the activity levels of the past few months, as we enter a new period of living with coronavirus&lt;/i&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Lisa O\'Keefe&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Executive director of insight, Sport England&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;But the figures do show an increased desire to get active as lockdown lifts &ndash; as illustrated by the figures&amp;nbsp;for cycling, swimming, running and walking &ndash; with 90% of people intending to get active at least once a month once all restrictions are removed.&lt;/p&gt;&lt;p&gt;And while Lisa acknowledges there will be a hesitancy in people getting back into gyms and indoor facilities, she&rsquo;s confident they&rsquo;ve followed all the necessary precautions.&lt;/p&gt;&lt;p&gt;&ldquo;The leisure and sport sector has spent the last weeks and months preparing to help welcome people safely back and address apprehensions, particularly for those managing long-term health conditions and other challenges,&rdquo; she added.&lt;/p&gt;&lt;p&gt;&ldquo;There will be both excitement and caution for many of us as we enter our gyms and pools this weekend.&lt;/p&gt;&lt;p&gt;&ldquo;We do expect to see long-term disruption to activity levels as a result of coronavirus, as people adjust to change, but our most recent survey results show people are intending to keep active &ndash; and we could even see some gains in the number of people running and swimming.&rdquo;&lt;/p&gt;&lt;p&gt;During lockdown our Join the Movement campaign, funded by the National Lottery, has been giving&amp;nbsp;examples of free online resources and workouts at stayinworkout.org, all of which has been designed to help inspire people to keep active during the crisis &ndash; both at home and outdoors.&lt;/p&gt;&lt;p&gt;More than half of people have said they&rsquo;ve found new ways to be active during lockdown and 15% say they intend to do offline home-based fitness options in future, while 13% plan to take part in online classes &ndash; up from the 9% who reported doing so pre-lockdown.&lt;/p&gt;&lt;p&gt;To help them achieve this, we&rsquo;ve teamed up with Our Parks &ndash; a London 2012 legacy initiative &ndash; to launch a free, on-demand programme of bodyweight-only sessions called Couch to Fitness, next week.&lt;/p&gt;&lt;p&gt;The programme will be suitable for beginners and intends to build intensity and fitness levels over its nine-week course.&lt;/p&gt;&lt;p&gt;Another partnership has seen us join forces with London Sport to invest in a campaign to promote the Couch to 5K running programme and app to Black, Asian and minority ethnic and lower-socio economic groups who&rsquo;ve been disproportionately affected by coronavirus, to help support new exercise habits.&lt;/p&gt;&lt;p&gt;The app has had nearly a million downloads since relaunching during lockdown and, alongside other apps such as Active 10, has helped people gradually build up their walking and running levels.&lt;/p&gt;', 1, '2021-07-02 17:56:03'),
(71, 'nero', 1, 'Helping to keep people active during local coronavirus lockdowns', 'PA-54968148 - 1266.jpg', '&lt;p&gt;We give some clarity in the confusion about what sport and physical activity is and isn&amp;#39;t allowed during local lockdowns.&lt;/p&gt;\r\n\r\n&lt;p&gt;The increase in local lockdowns in recent days has presented a challenge to community and grassroots sport and organised physical activity.&lt;/p&gt;\r\n\r\n&lt;p&gt;There&amp;rsquo;s been some confusion about what is and isn&amp;rsquo;t allowed in areas where restrictions have been tightened and some inaccurate reporting about what people can and can&amp;rsquo;t do.&lt;/p&gt;\r\n\r\n&lt;p&gt;Central government&amp;rsquo;s been clear that grassroots sport and organised physical activity can currently continue in areas where there are local lockdowns, as long as those activities abide by the stringent plans put in place to ensure they were given the green light to go ahead in the first place.&lt;/p&gt;\r\n\r\n&lt;p&gt;What&amp;rsquo;s not advised&amp;nbsp;is any socialising in or around that activity &amp;ndash; and where there are organised games and physical activity-related events, people should not gather to watch in an amateur setting.&lt;/p&gt;\r\n\r\n&lt;p&gt;Full details of the&amp;nbsp;&lt;strong&gt;&lt;a href=&quot;https://www.gov.uk/government/collections/local-restrictions-areas-with-an-outbreak-of-coronavirus-covid-19&quot; target=&quot;_blank&quot;&gt;areas subject to local restrictions, and what those restrictions are, can be found here.&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;There&amp;rsquo;s been a huge amount of work done in recent weeks and months, by governing bodies and organisers of grassroots sport and organised physical activity, to get back up and running.&lt;/p&gt;\r\n\r\n&lt;p&gt;Protocols are in place to enable them to do so safely and adherence to these have been widely adopted across the country.&lt;/p&gt;\r\n\r\n&lt;p&gt;Sport and physical activity providers have gone about helping people back into activity&amp;nbsp;diligently.&amp;nbsp;The sector is grateful for central and local government&amp;rsquo;s continued support and understanding of the importance of activity to people&amp;rsquo;s physical and mental wellbeing, whatever form it takes.&lt;/p&gt;\r\n\r\n&lt;p&gt;We&amp;rsquo;re now working closely with local leaders to avoid some of the confusion of recent days, while understanding that the picture is evolving in local areas quickly and that it takes time to communicate what is and isn&amp;rsquo;t changing.&lt;/p&gt;\r\n\r\n&lt;p&gt;It&amp;rsquo;s also important to remember that being healthy and fit is an important part of&amp;nbsp;helping people stave off coronavirus (Covid-19) in the first place, as well as bringing vital mental health benefits at a time when people really are struggling.&lt;/p&gt;\r\n', 1, '2021-07-16 13:12:35'),
(72, 'nero', 1, 'New resources to help prepare for a return to play', 'PA-53736565 - 1266.jpg', '&lt;p&gt;We&amp;#39;ve produced advice and guidance to help the sport and physical activity sector as it reopens and prepares for what comes next.&lt;/p&gt;\r\n\r\n&lt;p&gt;As restrictions ease and the sport and physical activity sector begins to reopen, we&amp;rsquo;ve produced several resources to help it do so.&lt;/p&gt;\r\n\r\n&lt;p&gt;In recent weeks we&amp;rsquo;ve been consulting with partners to get a sense of what would be helpful.&lt;/p&gt;\r\n\r\n&lt;p&gt;And while the government has not yet given the green light to the wider reopening of facilities and the restarting of recreational sport, we believe it&amp;rsquo;s important to prepare for these changes now &amp;ndash; as much as possible.&lt;/p&gt;\r\n\r\n&lt;p&gt;The published resources will help plan for a safe return and support the sector to keep staff, volunteers, members and people taking part informed of their responsibilities around social distancing and hygiene, and will work alongside both existing and forthcoming government guidance.&lt;/p&gt;\r\n\r\n&lt;p&gt;The resources, which are in addition to&amp;nbsp;the insight&amp;nbsp;and&amp;nbsp;hygiene guidance&amp;nbsp;we published last week, include:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Inclusion and accessibility guidance&lt;/strong&gt;&amp;nbsp;&amp;ndash; helping you to understand who can get active, how you can engage specific audiences and how to ensure your facilities are, and remain, accessible to all when allowed to reopen.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Support for the professional workforce&lt;/strong&gt;&amp;nbsp;&amp;ndash; including advice on staffing considerations for paid works as well as support available.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Volunteering guidance&lt;/strong&gt;&amp;nbsp;&amp;ndash; setting out some of the main considerations to help your volunteers return safely, well-informed and prepared.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Managing liability and risk guidance&lt;/strong&gt;&amp;nbsp;&amp;ndash; to give providers, be they clubs, governing bodies, community groups or regional associations, advice on what issues need considering and how they might tackle them in order to safely return to play.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;There&amp;rsquo;s also support for sports clubs and organisations on the&amp;nbsp;&lt;a href=&quot;https://learn.sportenglandclubmatters.com/course/view.php?id=71&quot;&gt;Club Matters website&lt;/a&gt;, including:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Reopening toolkit&lt;/strong&gt;&amp;nbsp;&amp;ndash; this includes information on how your club/organisation can plan its return to sport, with advice on what you need to think about across different areas such as reopening your facility and protecting your people.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Risk register template&lt;/strong&gt;&amp;nbsp;&amp;ndash; this template, with a dedicated user guide, is designed to help your club/organisation introduce or update your practices regarding how you manage risks.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Creating a risk assessment&lt;/strong&gt;&amp;nbsp;&amp;ndash; this draws from the current Health and Safety Executive advice and provides step-by-step guidance to help organisations address risk, including coronavirus-specific considerations.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Social distancing guidance&lt;/strong&gt;&amp;nbsp;&amp;ndash; this resource covers the different practices and considerations your club/organisation may need to introduce so that social distancing can be implemented in line with current government advice.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;We&amp;rsquo;ll continue to evolve and develop this suite of resources as and when the government guidance changes, and in response to feedback.&lt;/p&gt;\r\n', 1, '2021-07-16 15:02:36'),
(73, 'nero', 6, 'Travel to Tokyo goes virtual', 'PA-53304525 - 1266.jpg', '&lt;p&gt;Our Families Fund project has made online resources to help children and families still join in the programme despite the current coronavirus restrictions.&lt;/p&gt;\r\n\r\n&lt;p&gt;With coronavirus (Covid-19) restrictions impacting everyone at the moment, the Travel to Tokyo project has gone online to help keep children and their families active.&lt;/p&gt;\r\n\r\n&lt;p&gt;Last summer we announced a&amp;nbsp;&amp;pound;2.6 million investment of National Lottery money, from our Families Fund, into the partnership with the British Olympic and Paralympic associations&amp;rsquo; Get Set programme.&lt;/p&gt;\r\n\r\n&lt;p&gt;Aiming to inspire children aged 5-11, and their families, to try new activities together in the run up to the Tokyo 2020 Olympic and Paralympic Games, the project was set to run in conjunction with schools.&lt;/p&gt;\r\n\r\n&lt;p&gt;But with the majority of children not currently able to go to school, Get Set has modified Travel to Tokyo to allow young people and their families to get active alongside their classmates virtually, and to celebrate their progress online as one school team.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;Through support from the National Lottery, we&amp;rsquo;re proud to fund the Travel to Tokyo virtual challenge to encourage children and their families across the UK to get active during this period of unprecedented disruption,&amp;rdquo; said our chief executive Tim Hollingsworth.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;quot;Our Join the Movement campaign has already showcased a number of creative and imaginative ways to get active for the benefit of our physical and mental wellbeing, and the Travel to Tokyo challenge is another creative way for children and families to form great exercise habits that have never been more important.&amp;rdquo;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;h3&gt;How the project works&lt;/h3&gt;\r\n\r\n	&lt;p&gt;Every physical activity &amp;ndash; from taking a walk outside to dancing in the kitchen &amp;ndash; can be logged online as part of the Travel to Tokyo virtual challenge.&lt;/p&gt;\r\n\r\n	&lt;ul&gt;\r\n		&lt;li&gt;Teachers create school teams on the free website&lt;/li&gt;\r\n		&lt;li&gt;Children and their families log activity to their team together&lt;/li&gt;\r\n		&lt;li&gt;Teams are encouraged to meet activity goals in order to win prizes&lt;/li&gt;\r\n		&lt;li&gt;Children and families join athletes on a virtual journey to the Games - encouraged by challenges and milestones along the way&lt;/li&gt;\r\n		&lt;li&gt;Each phase features a different theme, inspired by the stages of an athlete&amp;#39;s journey to the Games&lt;span style=&quot;display:none&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;/ul&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;With the programme now having moved&amp;nbsp;to be wholly online, families and teachers can access exclusive Team GB and ParalympicsGB educational resources.&lt;/p&gt;\r\n\r\n&lt;p&gt;These include a free&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;a href=&quot;https://protect-eu.mimecast.com/s/TZF1CL9g1iOmr5tG9eUW?domain=u7061146.ct.sendgrid.net&quot;&gt;home&amp;nbsp;learning&amp;nbsp;pack&lt;/a&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;with quick 10-minute inclusive&amp;nbsp;activities that require no equipment. And to support teachers with communicating with families during these unprecedented times, a&amp;nbsp;parent&amp;nbsp;engagement&amp;nbsp;toolkit&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;has also been created.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;The mental and physical health benefits of exercise are more important than ever, so we must find new ways of keeping active whilst staying safe at home,&amp;rdquo; said chairman of the British Olympic Foundation, Neil Townshend.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;quot;We&amp;rsquo;re proud the Travel to Tokyo virtual challenge can continue to support schools and families in keeping active during these unprecedented times.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;We know the importance of community cohesion and we hope this challenge will create a sense of togetherness, even if virtually, that will help support young people&amp;rsquo;s physical and mental health.&amp;rdquo;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Impact&lt;/p&gt;\r\n\r\n&lt;p&gt;The project has a potential reach of more than 300,000 children and half a million family members&lt;/p&gt;\r\n\r\n&lt;p&gt;In addition to the online resources, Olympic and Paralympic medallists such as Helen Glover, Natasha Bake, Will Bayley and Anthony Ogogo are also on hand through the programme to provide inspirational messages, activities and rewards.&lt;/p&gt;\r\n\r\n&lt;p&gt;Mike Sharrock, chief executive of the British Paralympic Association, said: &amp;ldquo;While we are dealing with new challenges, we&amp;rsquo;re pleased to invite all families across the UK to take part in our Travel to Tokyo virtual challenge and discover fun and creative ways to get moving, through our inclusive activities, while staying apart.&amp;rdquo;&lt;/p&gt;\r\n', 1, '2021-07-16 15:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `href_param` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `id_special` int(11) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `size36` int(11) DEFAULT NULL,
  `size37` int(11) DEFAULT NULL,
  `size38` int(11) DEFAULT NULL,
  `size39` int(11) DEFAULT NULL,
  `size40` int(11) DEFAULT NULL,
  `size41` int(11) DEFAULT NULL,
  `size42` int(11) DEFAULT NULL,
  `size43` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `created_at`, `updated_at`, `href_param`, `content`, `id_special`, `id_brand`, `size36`, `size37`, `size38`, `size39`, `size40`, `size41`, `size42`, `size43`) VALUES
(211, 'TERREX FREE HIKER PARLEY', 289, '2021-06-10 01:46:39', '2021-06-28 22:27:32', 'TERREX-FREE-HIKER-PARLEY', 'ADIDAS X PARLEY\r\nPeople pour plastics into oceans like there\'s no tomorrow. It comes up to more than eight million tons in a year. There\'s probably no trick or a single solution that could resolve the situation, which we as humans got into, with a snap of a finger. We can fight the big battle with smaller steps though. Such example is the result of the collaboration between adidas and Parley For The Oceans - sneakers that are made from plastic bottles pulled out from the sea. Each pair of adidas', 1, 1, 13, 9, 9, 10, 12, 9, 9, 9),
(212, 'PHARRELL WILLIAMS D.O.N.', 399, '2021-06-10 01:48:40', '2021-06-10 01:19:44', 'PHARRELL-WILLIAMS-D.O.N.', 'ADIDAS X PHARRELL WILLIAMS\r\nThe result of the collaboration between American musician Pharrell William and the German brand adidas is not only the imaginative design of the famous silhouettes of the European shoe giant, but also the models designed by Pharrell himself. But they all have one thing in common, and that is the desire to stand out in the crowd. Pharrel\'s design creations are colorful and elegant but they are also great for a casual outfits.\r\n\r\nNote - These sneakers are ranked by men\'', 3, 1, 3, 8, 8, 8, 7, 8, 8, 8),
(213, 'ADIDAS ULTRABOOST 20', 356, '2021-06-10 01:34:42', '2021-06-10 01:34:42', 'ADIDAS-ULTRABOOST-20', 'ADIDAS ULTRABOOST 20\r\nThe most comfortable sneaker for many got a new look at the end of 2019. What do the long-awaited adidas UltraBOOST 20 runners bring to the game now? For example, the upper was improved from the UltraBOOST 19 version, and it provides even more flexibility depending on the shape of the foot. The sneakers will simply fit you better, no matter how specific your foot is. Want to know more about the OG adidas UltraBOOST 20 model? It was released in collaboration with ISS U.S. Na', 2, 1, 7, 9, 9, 9, 9, 9, 9, 9),
(214, 'CONVERSE CHUCK 70', 289, '2021-06-10 01:38:43', '2021-06-10 01:38:43', 'CONVERSE-CHUCK-70', 'CONVERSE CHUCK TAYLOR 70S\r\nMany of us love the canvas Chuck Taylors for their vintage look. You probably won´t find other sneakers with longer history and stronger roots than Converse shoes. The new collection by Converse called Chuck ´70 was introduced not just for vintage lovers. It is different from the classic collection by the stitching on the side of the silhouette and cream sole with a black line that is a little higher than usual and that perfectly underlines the retro feel. At the same ', 3, 2, 9, 9, 9, 9, 9, 9, 9, 9),
(215, 'CHUCK TAYLOR ALL STAR CX', 312, '2021-06-10 01:43:46', '2021-06-10 01:43:46', 'CHUCK-TAYLOR-ALL-STAR-CX', 'CONVERSE MID & HIGH TOPS\r\nThe Converse shoe design has remained virtually untouched since its launch. The popularity of the shoe has stayed high and is informally known as the king of the canvas shoes. What sets them apart from the others is the stronger, more resilient sole which does not lose comfort or add weight to the shoe. They come in multiple colourways and different patterns and are all high/mid-tops.\r\n\r\n\r\nUpper - Textile ▩ - is a lightweight material, which is offered in a very wide co', 3, 2, 5, 9, 9, 9, 9, 9, 9, 9),
(216, 'AIR MAX 90 LEATHER', 267, '2021-06-10 01:37:48', '2021-06-10 01:37:48', 'AIR-MAX-90-LEATHER', 'NIKE AIR MAX 90 \r\nNIKE AIR MAX 90 LEATHER\r\nThe Nike Air Max 90 Leather feature mesh uppers for increased breathability, mixed with high-quality leather. This range features men\'s, women\'s and children\'s trainers as the Nike Air Max continues to be one of the most popular shoes from Nike. They are available in different colourways and designs.\r\n\r\nUpper - Synthetics ◇ - unlike textile, synthetic fibers are stronger, more durable and quick-drying.\r\nMidsole - Air Sole - The legendary cushioning elem', 4, 4, 7, 7, 7, 7, 7, 7, 7, 7),
(217, 'NIKE AIR FORCE 1 \'07', 299, '2021-06-10 01:39:49', '2021-06-10 01:39:49', 'NIKE-AIR-FORCE-1--07', 'NIKE AIR FORCE 1 LOW\r\nNamed after the personal aircraft of the President of the United States, the Air Force One has been a mainstay on the Nike roster. They are among the longest-produced sneakers of all time and are one of the most popular Nike shoes off all time. The AF 1 low\'s come in a variety of different and striking colourways perfect for all tastes.\r\n\r\n\r\nNote - Discount vouchers do not apply! All the orders that do not fulfill these conditions will be automatically cancelled.\r\nUpper - L', 1, 4, 5, 6, 2, 6, 6, 6, 6, 6),
(218, 'PUMA LACE RIDER POP', 256, '2021-06-10 01:36:50', '2021-06-10 01:36:50', 'PUMA-LACE-RIDER-POP', 'PUMA RIDER\r\nPuma continues to enhance their older silhouettes so that they can meet the high demands of today’s sneaker lovers. One of the upgraded models is the Puma Style Rider sneaker, which is based on the Fast Ride silhouette, a very popular silhouette in the 1980s. The striking colors of the unique Puma Style Rider sneakers may be hiding the great advantage of the sneakers - their performance, but it\'s good to know that you can have both. Thanks to the technical elements, you\'ll totally fo', 2, 3, 5, 5, 5, 5, 5, 5, 5, 5),
(219, 'FUTURE RIDER NEON ', 116, '2021-06-10 01:24:51', '2021-06-29 14:00:23', 'FUTURE-RIDER-NEON-', 'PUMA RIDER\r\nPuma continues to enhance their older silhouettes so that they can meet the high demands of today’s sneaker lovers. One of the upgraded models is the Puma Style Rider sneaker, which is based on the Fast Ride silhouette, a very popular silhouette in the 1980s. The striking colors of the unique Puma Style Rider sneakers may be hiding the great advantage of the sneakers - their performance, but it\'s good to know that you can have both. Thanks to the technical elements, you\'ll totally fo', 2, 3, 8, 8, 8, 8, 8, 8, 8, 8),
(220, 'ULTRABOOST COLD.RDY', 245, '2021-06-10 01:31:53', '2021-06-10 01:31:53', 'ULTRABOOST-COLD.RDY', 'Cold, sleet, hail. With the right gear, these are just the tunes to fuel your run. In these adidas Ultraboost WINTER.RDY Shoes, your training cycle is uninterrupted. The water-repellent upper features reflective details. The flexible winter-specific outsole provides enhanced grip for cold-weather training.\r\n\r\nADIDAS ULTRABOOST\r\nThe adidas Ultra Boost as some of the most sophisticated running shoes on the market at the moment. Made with comfort and stability in mind they feature a Torsion® system', 2, 1, 8, 8, 8, 8, 8, 8, 8, 8),
(221, 'ADIDAS TERREX VOYAGER', 267, '2021-06-10 01:33:54', '2021-06-10 01:33:54', 'ADIDAS-TERREX-VOYAGER', 'ADIDAS TERREX\r\nGoing on a trip or hike but still don\'t want to to neglect your sneaker game? These adidas Terrex trainers are the right choice for you then. Not only will they help you cross the Alps thanks to their durability but they\'ll still look good on your way down to Milan, the center of the fashion world.\r\n\r\nUPPER\r\n\r\nTextile ▩ - is a lightweight material, which is offered in a very wide color scale and is mainly used for summer footwear.\r\nSynthetics ◇ - unlike textile, synthetic fibers a', 1, 1, 8, 8, 8, 8, 8, 8, 8, 8),
(222, 'ADIDAS ULTRABOOST 5.0 DNA', 345, '2021-06-10 10:27:00', '2021-06-10 10:27:00', 'ADIDAS-ULTRABOOST-5.0-DNA', 'ADIDAS ULTRABOOST\r\nThe adidas Ultra Boost as some of the most sophisticated running shoes on the market at the moment. Made with comfort and stability in mind they feature a Torsion® system and Fitframe 3D-moulded TPU which increase stability.\r\n\r\nUpper - Textile ▩ - is a lightweight material, which is offered in a very wide color scale and is mainly used for summer footwear.\r\nMidsole - BOOST - The technology of a thousand smaller particles that reduces the force of the impact and at the same tim', 3, 1, 7, 7, 5, 7, 7, 7, 7, 7),
(223, 'CONVERSE ALL STAR HI', 130, '2021-06-10 10:14:04', '2021-06-10 10:14:04', 'CONVERSE-ALL-STAR-HI', 'CONVERSE MID & HIGH TOPS\r\nThe Converse shoe design has remained virtually untouched since its launch. The popularity of the shoe has stayed high and is informally known as the king of the canvas shoes. What sets them apart from the others is the stronger, more resilient sole which does not lose comfort or add weight to the shoe. They come in multiple colourways and different patterns and are all high/mid-tops.\r\n\r\n\r\nUpper - Textile ▩ - is a lightweight material, which is offered in a very wide co', 3, 2, 0, 8, 6, 4, 7, 5, 7, 9),
(224, 'CHUCK TAYLOR CRATER KNIT', 300, '2021-06-10 10:10:09', '2021-06-10 10:10:09', 'CHUCK-TAYLOR-CRATER-KNIT', 'CONVERSE X CRATER\r\nSneakers of the future? Just like other brands, Converse has embarked on a path of sustainability as part of its environmental responsibility, bringing the Converse Crater sneakers. If you notice the midsole, it consists of the Space Junk material - the same one was used on the recently released Nike Space Hippie sneakers.\r\n\r\nSpace debris, futuristic processing of a retro silhouette, and a positive message in the background of the Converse Crater project - these are just a few', 1, 2, 8, 8, 8, 8, 8, 8, 8, 8),
(225, 'X KIM JONES AIR MAX 95', 299, '2021-06-10 10:37:10', '2021-06-10 10:37:10', 'X-KIM-JONES-AIR-MAX-95', 'NIKE AIR MAX 95\r\nNike Air Max 95 model has completely shifted the look of Nike shoes. The special air bubble in these shoes is not only in the rear, but is clearly visible in the front of the shoe giving unrivalled cushioning for the whole foot! These shoes first appeared in 1995 and since then have enjoyed popularity with all age groups.\r\n\r\nUPPER\r\n\r\nLeather - is perhaps the best material for the production of footwear - maintains its shape, it is breathable and the list of its positive properti', 4, 4, 9, 9, 9, 9, 9, 9, 9, 9),
(226, 'SKEPTA AIR MAX TAILWIND V', 399, '2021-06-10 10:12:13', '2021-06-10 13:02:52', 'SKEPTA-AIR-MAX-TAILWIND-V', 'NIKE AIR MAX - MEN\'S\r\nIconic design with an air bubble and a great selection of men\'s Air Max models. Every man can choose according to his style.\r\n\r\nUPPER\r\n\r\nTextile ▩ - is a lightweight material, which is offered in a very wide color scale and is mainly used for summer footwear.\r\nSynthetics ◇ - unlike textile, synthetic fibers are stronger, more durable and quick-drying.\r\nMidsole - Air Sole - The legendary cushioning element - a capsule filled with compressed air that changed the world of snea', 1, 4, 6, 6, 6, 6, 6, 6, 6, 6),
(227, 'RS-2K INTERNET EXPLORING', 266, '2021-06-10 10:15:16', '2021-06-10 10:15:16', 'RS-2K-INTERNET-EXPLORING', 'PUMA RS\r\nPuma RS is a unique technology that was first released in 1986. The goal of the technology is to provide runners with the best cushion on any and all surfaces. They were successful in reaching this goal as the RS technology is still extremely popular today, with all users raving about the comfortable experience they have while wearing the shoe.\r\n\r\nMidsole - Polyurethane foam - is one of the best thermal insulators, is lightweight, tough and windproof.\r\nSole - Rubber - a material that is', 2, 3, 5, 5, 5, 5, 5, 5, 5, 5),
(228, 'FUTURE RIDER CONTRAST', 244, '2021-06-10 11:40:12', '2021-06-10 11:40:12', 'FUTURE-RIDER-CONTRAST', 'PUMA RIDER\r\nPuma continues to enhance their older silhouettes so that they can meet the high demands of today’s sneaker lovers. One of the upgraded models is the Puma Style Rider sneaker, which is based on the Fast Ride silhouette, a very popular silhouette in the 1980s. The striking colors of the unique Puma Style Rider sneakers may be hiding the great advantage of the sneakers - their performance, but it\'s good to know that you can have both. Thanks to the technical elements, you\'ll totally fo', 2, 3, 8, 8, 8, 8, 8, 8, 8, 8),
(229, 'PHARRELL WILLIAMS CRAZY', 400, '2021-06-10 11:09:14', '2021-06-10 13:31:52', 'PHARRELL-WILLIAMS-CRAZY', 'ADIDAS X PHARRELL WILLIAMS\r\nThe result of the collaboration between American musician Pharrell William and the German brand adidas is not only the imaginative design of the famous silhouettes of the European shoe giant, but also the models designed by Pharrell himself. But they all have one thing in common, and that is the desire to stand out in the crowd. Pharrel\'s design creations are colorful and elegant but they are also great for a casual outfits.\r\n\r\nUPPER\r\n\r\nTextile ▩ - is a lightweight ma', 2, 1, 5, 5, 5, 5, 5, 5, 5, 5),
(230, 'ADIDAS ULTRABOOST 20 W', 289, '2021-06-10 11:20:15', '2021-06-10 11:20:15', 'ADIDAS-ULTRABOOST-20-W', 'Don\'t settle for ordinary. These women\'s running shoes have glam graphics to give them a street-ready lustre. A Boost midsole provides responsive cushioning, and an adidas Primeknit upper gently supports the foot in targeted areas.\r\n\r\nADIDAS ULTRABOOST 20\r\nThe most comfortable sneaker for many got a new look at the end of 2019. What do the long-awaited adidas UltraBOOST 20 runners bring to the game now? For example, the upper was improved from the UltraBOOST 19 version, and it provides even more', 2, 1, 7, 7, 7, 7, 7, 7, 7, 7),
(231, 'ULTRABOOST 1.0 DNA', 356, '2021-06-10 11:34:18', '2021-06-10 13:15:52', 'ULTRABOOST-1.0-DNA', 'ADIDAS ULTRABOOST\r\nThe adidas Ultra Boost as some of the most sophisticated running shoes on the market at the moment. Made with comfort and stability in mind they feature a Torsion® system and Fitframe 3D-moulded TPU which increase stability.\r\n\r\nTechnology - Primegreen ♻ - Recycled material, made for maximum functionality.\r\nUpper - Textile ▩ - is a lightweight material, which is offered in a very wide color scale and is mainly used for summer footwear.\r\nMidsole - BOOST - The technology of a tho', 2, 1, 2, 3, 3, 3, 3, 3, 3, 3),
(232, 'AIR MAX 90', 400, '2021-06-11 14:22:01', '2021-06-11 14:22:01', 'AIR-MAX-90', 'sà', 2, 4, 9, 9, 9, 9, 9, 9, 9, 9),
(233, 'AIR VAPORMAX EVO NRG', 356, '2021-06-11 14:06:02', '2021-06-11 14:06:02', 'AIR-VAPORMAX-EVO-NRG', '8', 2, 4, 8, 8, 8, 8, 8, 8, 8, 8),
(234, 'FUTURE RIDER SPRINT', 356, '2021-06-11 14:57:04', '2021-06-11 14:57:04', 'FUTURE-RIDER-SPRINT', '8', 3, 3, 8, 8, 8, 8, 8, 8, 8, 8),
(235, 'RS-FAST TECH', 678, '2021-06-11 14:38:05', '2021-06-11 14:38:05', 'RS-FAST-TECH', 'ăre', 3, 3, 7, 8, 8, 8, 7, 8, 8, 8),
(236, 'CHUCK TAYLOR  70 OX', 256, '2021-06-11 14:01:09', '2021-06-11 14:01:09', 'CHUCK-TAYLOR--70-OX', 'ưet', 1, 2, 6, 6, 6, 6, 6, 6, 6, 6),
(237, 'CHINATOWN MARKET', 356, '2021-06-11 14:42:09', '2021-06-11 14:42:09', 'CHINATOWN-MARKET', '8', 4, 2, 8, 8, 8, 8, 8, 8, 8, 8),
(238, 'ADIDAS SAHALEX', 135, '2021-06-23 00:35:14', '2021-07-01 00:36:05', 'ADIDAS-SAHALEX', 'UPPER\r\n\r\nLeather - is perhaps the best material for the production of footwear - maintains its shape, it is breathable and the list of its positive properties is far from ending.\r\nTextile ▩ - is a lightweight material, which is offered in a very wide color scale and is mainly used for summer footwear.\r\nSole - Rubber - a material that is very easy to maintain and you will appreciate it especially in rainy weather.', 4, 1, 10, 10, 10, 10, 10, 10, 10, 10),
(239, 'ADIDAS KAMANDA', 600, '2021-06-23 00:51:15', '2021-06-23 00:51:15', 'ADIDAS-KAMANDA', 'ADIDAS KAMANDA\r\nKamanda is the next silhouette introduced by adidas in 2018. Wild outsole was inspired by the model adidas Prophere and offered a slightly bigger interference into the shoe design. However, it was the fashion trends of the 80s associated with football fans that had the biggest impact on the design. The so-called “Terrace fashion,” or fashion of the football stadium tribunes of the 80s, has gained huge popularity in recent years. In response to this new trend, adidas came with the', 1, 1, 9, 9, 9, 9, 9, 9, 9, 9),
(240, 'ADIDAS LXCON 94', 499, '2021-06-23 00:40:17', '2021-06-23 00:40:17', 'ADIDAS-LXCON-94', 'The Lexicon debuted in 1994 as a running shoe. These men\'s shoes bring back the look from the archives. This version comes in mesh with leather overlays. A signature eyestay collar tube helps distribute pressure evenly across the foot.\r\n\r\nADIDAS LXCON\r\nEver since the popular actor Jonah Hill gave us a sneak peek last year, the adidas LXCON sneakers found themselves at the center of attention of not only adidas fans. The adidas LXCON sneakers elegantly combine vintage style with contemporary tren', 2, 1, 9, 9, 9, 9, 9, 9, 9, 9),
(241, 'ADIDAS 4D FUSION', 700, '2021-06-23 00:42:18', '2021-07-01 00:04:05', 'ADIDAS-4D-FUSION', 'ADIDAS 4D\r\nA hundred percent controlled energy. Years of research, data collection, and collaboration with athletes made it possible for adidas to create their 4D sneakers. The resulting design ensures great stability, perfect cushioning and maximum energy return from the midsole. So what does that mean? The future is now. The adidas 4D sneakers\' technology defines the direction in which adidas has boldly gone to mark the concept of distant tomorrows. Explore all of the adidas 4D silhouettes at ', 3, 1, 9, 9, 9, 9, 9, 9, 9, 9),
(244, 'STELLA MCCARTNEY CLIMACOOL', 699, '2021-06-23 00:40:50', '2021-06-23 00:40:50', 'STELLA-MCCARTNEY-CLIMACOOL', 'ADIDAS X STELLA MCCARTNEY\r\nThe adidas by Stella McCartney collection is for anyone who wants to express their opinion. Stella McCartney, daughter of the legendary Beatles member Paul McCartney and a renowned fashion designer, took a break from designing for Maddona or Karl Lagerfeld and created a sports collection with adidas with an emphasis on minimal environmental demands. adidas proudly claims that in the manufacturing process of this collection, only organic wool, recycled plastics Parley O', 4, 1, 9, 9, 9, 9, 9, 9, 9, 9),
(245, '4D FUTURECRAFT', 568, '2021-06-23 00:00:53', '2021-06-23 00:00:53', '4D-FUTURECRAFT', 'ADIDAS 4D\r\nA hundred percent controlled energy. Years of research, data collection, and collaboration with athletes made it possible for adidas to create their 4D sneakers. The resulting design ensures great stability, perfect cushioning and maximum energy return from the midsole. So what does that mean? The future is now. The adidas 4D sneakers\' technology defines the direction in which adidas has boldly gone to mark the concept of distant tomorrows. Explore all of the adidas 4D silhouettes at ', 3, 1, 8, 9, 9, 9, 9, 9, 8, 9),
(246, 'GOLF WANG POLKA DOT', 300, '2021-06-23 00:33:55', '2021-07-01 00:40:04', 'GOLF-WANG-POLKA-DOT', 'CONVERSE CHUCK TAYLOR 70S\r\nMany of us love the canvas Chuck Taylors for their vintage look. You probably won´t find other sneakers with longer history and stronger roots than Converse shoes. The new collection by Converse called Chuck ´70 was introduced not just for vintage lovers. It is different from the classic collection by the stitching on the side of the silhouette and cream sole with a black line that is a little higher than usual and that perfectly underlines the retro feel. At the same ', 3, 2, 9, 9, 9, 9, 9, 9, 9, 9),
(247, 'X JOE FRESH GOODS', 477, '2021-06-23 00:48:56', '2021-06-23 00:48:56', 'X-JOE-FRESH-GOODS', 'CONVERSE CHUCK TAYLOR 70S\r\nMany of us love the canvas Chuck Taylors for their vintage look. You probably won´t find other sneakers with longer history and stronger roots than Converse shoes. The new collection by Converse called Chuck ´70 was introduced not just for vintage lovers. It is different from the classic collection by the stitching on the side of the silhouette and cream sole with a black line that is a little higher than usual and that perfectly underlines the retro feel. At the same ', 4, 2, 9, 9, 9, 9, 9, 9, 9, 9),
(249, 'PUMA RS-2K ATTEMPT', 577, '2021-06-26 17:20:02', '2021-06-26 17:20:02', 'PUMA-RS-2K-ATTEMPT', 'PUMA RS\r\nPuma RS is a unique technology that was first released in 1986. The goal of the technology is to provide runners with the best cushion on any and all surfaces. They were successful in reaching this goal as the RS technology is still extremely popular today, with all users raving about the comfortable experience they have while wearing the shoe.', 1, 3, 9, 9, 9, 9, 9, 9, 9, 9),
(250, 'FUTURE RIDER NEON PLAY', 455, '2021-06-26 17:36:03', '2021-06-26 17:36:03', 'FUTURE-RIDER-NEON-PLAY', 'PUMA RIDER\r\nPuma continues to enhance their older silhouettes so that they can meet the high demands of today’s sneaker lovers. One of the upgraded models is the Puma Style Rider sneaker, which is based on the Fast Ride silhouette, a very popular silhouette in the 1980s. The striking colors of the unique Puma Style Rider sneakers may be hiding the great advantage of the sneakers - their performance, but it\'s good to know that you can have both. Thanks to the technical elements, you\'ll totally fo', 3, 3, 9, 9, 9, 9, 9, 9, 9, 9),
(251, 'AIR ZOOM-TYPE SE', 367, '2021-06-26 17:13:05', '2021-06-26 17:13:05', 'AIR-ZOOM-TYPE-SE', 'PUMA RIDER\r\nPuma continues to enhance their older silhouettes so that they can meet the high demands of today’s sneaker lovers. One of the upgraded models is the Puma Style Rider sneaker, which is based on the Fast Ride silhouette, a very popular silhouette in the 1980s. The striking colors of the unique Puma Style Rider sneakers may be hiding the great advantage of the sneakers - their performance, but it\'s good to know that you can have both. Thanks to the technical elements, you\'ll totally fo', 4, 4, 9, 9, 9, 9, 9, 9, 9, 9),
(252, 'AIR MAX 90 PREMIUM', 355, '2021-06-26 17:42:06', '2021-06-26 17:42:06', 'AIR-MAX-90-PREMIUM', 'NIKE AIR MAX - MEN\'S\r\nIconic design with an air bubble and a great selection of men\'s Air Max models. Every man can choose according to his style.\r\n\r\nNote - Discount vouchers do not apply! All the orders that do not fulfill these conditions will be automatically cancelled.\r\nUPPER\r\n\r\nSuede - leather cut from the back, while the fibers remain on the surface, suede is less prone to damage than nubuck.\r\nTextile ▩ - is a lightweight material, which is offered in a very wide color scale and is mainly ', 4, 4, 9, 9, 9, 9, 9, 9, 9, 9),
(265, 'ADIDAS NMD_R1', 399, '2021-06-29 14:37:09', '2021-06-29 14:37:09', 'ADIDAS-NMD-R1', 'ADIDAS NMD\r\nThe adidas NMD has created a completely new technical standard among sneakers with the innovative BOOST midsoles. Created by combining elements from three archival adidas models, the NMDs are totally unique sneakers. After their first release, they have instantly become a hit and sold out everywhere. Since then, they have been released in many colorways and materials, e.g. Primeknit. Check out our wide selection!\r\n\r\n\r\nUpper - Textile ▩ - is a lightweight material, which is offered in', 2, 1, 9, 9, 9, 9, 9, 9, 9, 9),
(266, 'NMD_R1 PRIMEKNIT', 635, '2021-06-29 14:40:12', '2021-07-01 00:59:03', 'NMD-R1-PRIMEKNIT', 'ADIDAS NMD\r\nThe adidas NMD has created a completely new technical standard among sneakers with the innovative BOOST midsoles. Created by combining elements from three archival adidas models, the NMDs are totally unique sneakers. After their first release, they have instantly become a hit and sold out everywhere. Since then, they have been released in many colorways and materials, e.g. Primeknit. Check out our wide selection!\r\n\r\n\r\nUpper - Textile ▩ - is a lightweight material, which is offered in', 4, 1, 9, 9, 9, 9, 9, 9, 9, 9),
(267, 'CHINATOWN MARKET NBA ', 700, '2021-06-29 14:32:14', '2021-07-01 00:27:03', 'CHINATOWN-MARKET-NBA-', 'CONVERSE CHUCK TAYLOR 70S\r\nMany of us love the canvas Chuck Taylors for their vintage look. You probably won´t find other sneakers with longer history and stronger roots than Converse shoes. The new collection by Converse called Chuck ´70 was introduced not just for vintage lovers. It is different from the classic collection by the stitching on the side of the silhouette and cream sole with a black line that is a little higher than usual and that perfectly underlines the retro feel. At the same ', 4, 2, 9, 9, 9, 9, 9, 9, 9, 9),
(268, 'UNION CHUCK TAYLOR HI', 689, '2021-06-29 14:40:15', '2021-06-29 14:40:15', 'UNION-CHUCK-TAYLOR-HI', 'CONVERSE MID & HIGH TOPS\r\nThe Converse shoe design has remained virtually untouched since its launch. The popularity of the shoe has stayed high and is informally known as the king of the canvas shoes. What sets them apart from the others is the stronger, more resilient sole which does not lose comfort or add weight to the shoe. They come in multiple colourways and different patterns and are all high/mid-tops.\r\n\r\n\r\nUpper - Textile ▩ - is a lightweight material, which is offered in a very wide co', 4, 2, 9, 9, 9, 9, 9, 9, 9, 9),
(269, 'BLAZER MID \'77 INFINITE', 700, '2021-06-29 14:14:17', '2021-07-01 00:11:03', 'BLAZER-MID--77-INFINITE', 'NIKE BLAZER MID\r\nThe Nike Blazer was first released in 1973 and immediately left their mark on the basketball world for their simplicity and multiple colourways. Today, the iconic shoe comes in even more colours and patterns with a variety of different materials.\r\n\r\nUPPER\r\n\r\nLeather - is perhaps the best material for the production of footwear - maintains its shape, it is breathable and the list of its positive properties is far from ending.\r\nSynthetics ◇ - unlike textile, synthetic fibers are s', 4, 4, 9, 9, 9, 9, 9, 9, 9, 9),
(270, 'NIKE MX-720-818', 677, '2021-06-29 14:16:18', '2021-06-29 14:16:18', 'NIKE-MX-720-818', 'NIKE MX-720-818\r\nIf you have a hybrid car, you know that y\r\n\r\nou switch between two engines continually. Hybrid sneakers, like the Nike MX-720-818 sneakers, have a great advantage in this context. You use the benefits of the models from which they are combined all the time. Specifically, the Nike MX-720-818 sneaker is a unique combination of the Air Max 720 bubble and the upper from the Air Max 98 sneakers. Discover the wide range of the Nike MX-720-818 sneakers and choose the one that fits you ', 2, 4, 11, 9, 9, 9, 9, 9, 9, 9),
(271, 'MIRAGE MOX VISION', 599, '2021-06-29 14:16:20', '2021-06-29 14:16:20', 'MIRAGE-MOX-VISION', 'PUMA MIRAGE\r\nElegant, affordable, and low-top sneakers for every day? You could probably pair these qualities with hundreds of pairs at Footshop, but they are truly unique for the Puma Mirage sneakers.\r\n\r\nThe Puma Mirage sneakers are no illusion, and you can get them at Footshop in various colorways that will match your sporty, leisure, and elegant outfits.\r\n\r\nUPPER\r\n\r\nSuede - leather cut from the back, while the fibers remain on the surface, suede is less prone to damage than nubuck.\r\nLeather -', 1, 3, 9, 9, 9, 9, 9, 9, 9, 9),
(272, 'SUEDE BLOC WTFORMSTRIPE', 588, '2021-06-29 14:42:25', '2021-06-29 14:42:25', 'SUEDE-BLOC-WTFORMSTRIPE', 'PUMA SUEDE\r\n2018 is a year of celebrations. The iconic model Puma Suede celebrates its 50th anniversary this year. Originally designed only as sports shoes, they have become so popular in the past few years that Puma has connected with various stores, artists and brands to create the best collaborations. Dive into the party and celebrate with us and Puma her half a century!\r\n\r\n\r\n\r\nUpper - Suede - leather cut from the back, while the fibers remain on the surface, suede is less prone to damage tha', 1, 3, 9, 9, 9, 9, 9, 9, 8, 9),
(273, 'ADIDAS ZX 2K 4D', 123, '2021-06-29 14:45:27', '2021-06-29 14:45:27', 'ADIDAS-ZX-2K-4D', 'ADIDAS ZX\r\nThe legendary sneakers from the ZX range have returned. Why? During the 1980s, the adidas ZX sneakers were the highest performance range from adidas and they didn’t want to stay behind. Thanks to special technological changes, adidas have made the ZX sneakers a current footwear again, and they’re moving forward! Check out different models from this originally athletic range and choose the silhouette and colorway that your heart beats for. If you’d like a recommendation, take a look at', 1, 1, 8, 9, 6, 9, 9, 9, 9, 9),
(274, 'SUPERSTAR FUTURESHELL', 700, '2021-06-29 14:33:29', '2021-07-16 22:29:47', 'SUPERSTAR-FUTURESHELL', '<p>ADIDAS SUPERSTAR\r\nThey’re almost everywhere, but not everyone sees the rich history behind the adidas Superstar sneakers when they look at them. The adidas Superstar sneakers are a cult silhouette with a long tradition. And it’s not just some cliché in this case.\r\n\r\n\r\nEven though the adidas Soupercourt or the adidas Falcon sneakers have been a competition to Superstars in the past years, which is only good for the three stripes, an interest in these sneakers has been on the rise since 2019 an', 2, 1, 9, 9, 9, 9, 9, 9, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `image`, `id_product`) VALUES
(604, 'image/product/1/TERREX FREE HIKER PARLEY MK-1.jpg', 211),
(605, 'image/product/1/TERREX FREE HIKER PARLEY MK-2.jpg', 211),
(606, 'image/product/1/TERREX FREE HIKER PARLEY MK-3.jpg', 211),
(607, 'image/product/1/TERREX FREE HIKER PARLEY MK-4.jpg', 211),
(608, 'image/product/1/TERREX FREE HIKER PARLEY MK-5.jpg', 211),
(609, 'image/product/1/TERREX FREE HIKER PARLEY MK-6.jpg', 211),
(610, 'image/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-1.jpg', 212),
(611, 'image/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-2.jpg', 212),
(612, 'image/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-3.jpg', 212),
(613, 'image/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-4.jpg', 212),
(614, 'image/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-5.jpg', 212),
(615, 'image/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-6.jpg', 212),
(616, 'image/product/1/ULTRABOOST 20-1.jpg', 213),
(617, 'image/product/1/ULTRABOOST 20-2.jpg', 213),
(618, 'image/product/1/ULTRABOOST 20-3.jpg', 213),
(619, 'image/product/1/ULTRABOOST 20-4.jpg', 213),
(620, 'image/product/1/ULTRABOOST 20-5.jpg', 213),
(621, 'image/product/1/ULTRABOOST 20-6.jpg', 213),
(622, 'image/product/2/CHUCK 70-1.jpg', 214),
(623, 'image/product/2/CHUCK 70-2.jpg', 214),
(624, 'image/product/2/CHUCK 70-3.jpg', 214),
(625, 'image/product/2/CHUCK 70-4.jpg', 214),
(626, 'image/product/2/CHUCK 70-5.jpg', 214),
(627, 'image/product/2/CHUCK 70-6.jpg', 214),
(628, 'image/product/2/CHUCK TAYLOR ALL STAR CX-1.jpg', 215),
(629, 'image/product/2/CHUCK TAYLOR ALL STAR CX-2.jpg', 215),
(630, 'image/product/2/CHUCK TAYLOR ALL STAR CX-3.jpg', 215),
(631, 'image/product/2/CHUCK TAYLOR ALL STAR CX-4.jpg', 215),
(632, 'image/product/2/CHUCK TAYLOR ALL STAR CX-5.jpg', 215),
(633, 'image/product/2/CHUCK TAYLOR ALL STAR CX-6.jpg', 215),
(634, 'image/product/4/AIR MAX 90 LEATHER-1.jpg', 216),
(635, 'image/product/4/AIR MAX 90 LEATHER-2.jpg', 216),
(636, 'image/product/4/AIR MAX 90 LEATHER-3.jpg', 216),
(637, 'image/product/4/AIR MAX 90 LEATHER-4.jpg', 216),
(638, 'image/product/4/AIR MAX 90 LEATHER-5.jpg', 216),
(639, 'image/product/4/AIR MAX 90 LEATHER-6.jpg', 216),
(640, 'image/product/4/AIR FORCE 1 \'07-1.jpg', 217),
(641, 'image/product/4/AIR FORCE 1 \'07-2.jpg', 217),
(642, 'image/product/4/AIR FORCE 1 \'07-3.jpg', 217),
(643, 'image/product/4/AIR FORCE 1 \'07-4.jpg', 217),
(644, 'image/product/4/AIR FORCE 1 \'07-5.jpg', 217),
(645, 'image/product/4/AIR FORCE 1 \'07-6.jpg', 217),
(646, 'image/product/3/LACE RIDER POP-1.jpg', 218),
(647, 'image/product/3/LACE RIDER POP-2.jpg', 218),
(648, 'image/product/3/LACE RIDER POP-3.jpg', 218),
(649, 'image/product/3/LACE RIDER POP-4.jpg', 218),
(650, 'image/product/3/LACE RIDER POP-5.jpg', 218),
(651, 'image/product/3/LACE RIDER POP-6.jpg', 218),
(652, 'image/product/3/FUTURE RIDER NEON PLAY-1.jpg', 219),
(653, 'image/product/3/FUTURE RIDER NEON PLAY-2.jpg', 219),
(654, 'image/product/3/FUTURE RIDER NEON PLAY-3.jpg', 219),
(655, 'image/product/3/FUTURE RIDER NEON PLAY-4.jpg', 219),
(656, 'image/product/3/FUTURE RIDER NEON PLAY-5.jpg', 219),
(657, 'image/product/3/FUTURE RIDER NEON PLAY-6.jpg', 219),
(658, 'image/product/1/ULTRABOOST COLD.RDY-1.jpg', 220),
(659, 'image/product/1/ULTRABOOST COLD.RDY-2.jpg', 220),
(660, 'image/product/1/ULTRABOOST COLD.RDY-3.jpg', 220),
(661, 'image/product/1/ULTRABOOST COLD.RDY-4.jpg', 220),
(662, 'image/product/1/ULTRABOOST COLD.RDY-5.jpg', 220),
(663, 'image/product/1/ULTRABOOST COLD.RDY-6.jpg', 220),
(664, 'image/product/1/TERREX VOYAGER-1.jpg', 221),
(665, 'image/product/1/TERREX VOYAGER-2.jpg', 221),
(666, 'image/product/1/TERREX VOYAGER-3.jpg', 221),
(667, 'image/product/1/TERREX VOYAGER-4.jpg', 221),
(668, 'image/product/1/TERREX VOYAGER-5.jpg', 221),
(669, 'image/product/1/TERREX VOYAGER-6.jpg', 221),
(670, 'image/product/1/ULTRABOOST 5.0 DNA-1.jpg', 222),
(671, 'image/product/1/ULTRABOOST 5.0 DNA-2.jpg', 222),
(672, 'image/product/1/ULTRABOOST 5.0 DNA-3.jpg', 222),
(673, 'image/product/1/ULTRABOOST 5.0 DNA-4.jpg', 222),
(674, 'image/product/1/ULTRABOOST 5.0 DNA-5.jpg', 222),
(675, 'image/product/1/ULTRABOOST 5.0 DNA-6.jpg', 222),
(676, 'image/product/2/ALL STAR HI-1.jpg', 223),
(677, 'image/product/2/ALL STAR HI-2.jpg', 223),
(678, 'image/product/2/ALL STAR HI-3.jpg', 223),
(679, 'image/product/2/ALL STAR HI-4.jpg', 223),
(680, 'image/product/2/ALL STAR HI-5.jpg', 223),
(681, 'image/product/2/ALL STAR HI-6.jpg', 223),
(682, 'image/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-1.jpg', 224),
(683, 'image/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-2.jpg', 224),
(684, 'image/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-3.jpg', 224),
(685, 'image/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-4.jpg', 224),
(686, 'image/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-5.jpg', 224),
(687, 'image/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-6.jpg', 224),
(688, 'image/product/4/X KIM JONES AIR MAX 95-1.jpg', 225),
(689, 'image/product/4/X KIM JONES AIR MAX 95-2.jpg', 225),
(690, 'image/product/4/X KIM JONES AIR MAX 95-3.jpg', 225),
(691, 'image/product/4/X KIM JONES AIR MAX 95-4.jpg', 225),
(692, 'image/product/4/X KIM JONES AIR MAX 95-5.jpg', 225),
(693, 'image/product/4/X KIM JONES AIR MAX 95-6.jpg', 225),
(694, 'image/product/4/X SKEPTA AIR MAX TAILWIND V-1.jpg', 226),
(695, 'image/product/4/X SKEPTA AIR MAX TAILWIND V-2.jpg', 226),
(696, 'image/product/4/X SKEPTA AIR MAX TAILWIND V-3.jpg', 226),
(697, 'image/product/4/X SKEPTA AIR MAX TAILWIND V-4.jpg', 226),
(698, 'image/product/4/X SKEPTA AIR MAX TAILWIND V-5.jpg', 226),
(699, 'image/product/4/X SKEPTA AIR MAX TAILWIND V-6.jpg', 226),
(700, 'image/product/3/RS-2K INTERNET EXPLORING-1.jpg', 227),
(701, 'image/product/3/RS-2K INTERNET EXPLORING-2.jpg', 227),
(702, 'image/product/3/RS-2K INTERNET EXPLORING-3.jpg', 227),
(703, 'image/product/3/RS-2K INTERNET EXPLORING-4.jpg', 227),
(704, 'image/product/3/RS-2K INTERNET EXPLORING-5.jpg', 227),
(705, 'image/product/3/RS-2K INTERNET EXPLORING-6.jpg', 227),
(706, 'image/product/3/FUTURE RIDER CONTRAST-1.jpg', 228),
(707, 'image/product/3/FUTURE RIDER CONTRAST-2.jpg', 228),
(708, 'image/product/3/FUTURE RIDER CONTRAST-3.jpg', 228),
(709, 'image/product/3/FUTURE RIDER CONTRAST-4.jpg', 228),
(710, 'image/product/3/FUTURE RIDER CONTRAST-5.jpg', 228),
(711, 'image/product/3/FUTURE RIDER CONTRAST-6.jpg', 228),
(712, 'image/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-1.jpg', 229),
(713, 'image/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-2.jpg', 229),
(714, 'image/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-3.jpg', 229),
(715, 'image/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-4.jpg', 229),
(716, 'image/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-5.jpg', 229),
(717, 'image/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-6.jpg', 229),
(718, 'image/product/1/ULTRABOOST 20 W-1.jpg', 230),
(719, 'image/product/1/ULTRABOOST 20 W-2.jpg', 230),
(720, 'image/product/1/ULTRABOOST 20 W-3.jpg', 230),
(721, 'image/product/1/ULTRABOOST 20 W-4.jpg', 230),
(722, 'image/product/1/ULTRABOOST 20 W-5.jpg', 230),
(723, 'image/product/1/ULTRABOOST 20 W-6.jpg', 230),
(724, 'image/product/1/ULTRABOOST 1.0 DNA-1.jpg', 231),
(725, 'image/product/1/ULTRABOOST 1.0 DNA-2.jpg', 231),
(726, 'image/product/1/ULTRABOOST 1.0 DNA-3.jpg', 231),
(727, 'image/product/1/ULTRABOOST 1.0 DNA-4.jpg', 231),
(728, 'image/product/1/ULTRABOOST 1.0 DNA-5.jpg', 231),
(729, 'image/product/1/ULTRABOOST 1.0 DNA-6.jpg', 231),
(730, 'image/product/4/AIR MAX 90-1.jpg', 232),
(731, 'image/product/4/AIR MAX 90-2.jpg', 232),
(732, 'image/product/4/AIR MAX 90-3.jpg', 232),
(733, 'image/product/4/AIR MAX 90-4.jpg', 232),
(734, 'image/product/4/AIR MAX 90-5.jpg', 232),
(735, 'image/product/4/AIR MAX 90-6.jpg', 232),
(736, 'image/product/4/AIR VAPORMAX EVO NRG-1.jpg', 233),
(737, 'image/product/4/AIR VAPORMAX EVO NRG-2.jpg', 233),
(738, 'image/product/4/AIR VAPORMAX EVO NRG-3.jpg', 233),
(739, 'image/product/4/AIR VAPORMAX EVO NRG-4.jpg', 233),
(740, 'image/product/4/AIR VAPORMAX EVO NRG-5.jpg', 233),
(741, 'image/product/4/AIR VAPORMAX EVO NRG-6.jpg', 233),
(742, 'image/product/3/FUTURE RIDER SPRINT-1.jpg', 234),
(743, 'image/product/3/FUTURE RIDER SPRINT-2.jpg', 234),
(744, 'image/product/3/FUTURE RIDER SPRINT-3.jpg', 234),
(745, 'image/product/3/FUTURE RIDER SPRINT-4.jpg', 234),
(746, 'image/product/3/FUTURE RIDER SPRINT-5.jpg', 234),
(747, 'image/product/3/FUTURE RIDER SPRINT-6.jpg', 234),
(748, 'image/product/3/RS-FAST TECH-1.jpg', 235),
(749, 'image/product/3/RS-FAST TECH-2.jpg', 235),
(750, 'image/product/3/RS-FAST TECH-3.jpg', 235),
(751, 'image/product/3/RS-FAST TECH-4.jpg', 235),
(752, 'image/product/3/RS-FAST TECH-5.jpg', 235),
(753, 'image/product/3/RS-FAST TECH-6.jpg', 235),
(754, 'image/product/2/CHUCK TAYLOR ALL STAR 70 OX-1.jpg', 236),
(755, 'image/product/2/CHUCK TAYLOR ALL STAR 70 OX-2.jpg', 236),
(756, 'image/product/2/CHUCK TAYLOR ALL STAR 70 OX-3.jpg', 236),
(757, 'image/product/2/CHUCK TAYLOR ALL STAR 70 OX-4.jpg', 236),
(758, 'image/product/2/CHUCK TAYLOR ALL STAR 70 OX-5.jpg', 236),
(759, 'image/product/2/CHUCK TAYLOR ALL STAR 70 OX-6.jpg', 236),
(760, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-1.jpg', 237),
(761, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-2.jpg', 237),
(762, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-3.jpg', 237),
(763, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-4.jpg', 237),
(764, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-5.jpg', 237),
(765, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-6.jpg', 237),
(766, 'image/product/1/SAHALEX-1.jpg', 238),
(767, 'image/product/1/SAHALEX-2.jpg', 238),
(768, 'image/product/1/SAHALEX-3.jpg', 238),
(769, 'image/product/1/SAHALEX-4.jpg', 238),
(770, 'image/product/1/SAHALEX-5.jpg', 238),
(771, 'image/product/1/SAHALEX-6.jpg', 238),
(772, 'image/product/1/KAMANDA-1.jpg', 239),
(773, 'image/product/1/KAMANDA-2.jpg', 239),
(774, 'image/product/1/KAMANDA-3.jpg', 239),
(775, 'image/product/1/KAMANDA-4.jpg', 239),
(776, 'image/product/1/KAMANDA-5.jpg', 239),
(777, 'image/product/1/KAMANDA-6.jpg', 239),
(778, 'image/product/1/LXCON 94-1.jpg', 240),
(779, 'image/product/1/LXCON 94-2.jpg', 240),
(780, 'image/product/1/LXCON 94-3.jpg', 240),
(781, 'image/product/1/LXCON 94-4.jpg', 240),
(782, 'image/product/1/LXCON 94-5.jpg', 240),
(783, 'image/product/1/LXCON 94-6.jpg', 240),
(784, 'image/product/1/4D FUSION-1.jpg', 241),
(785, 'image/product/1/4D FUSION-2.jpg', 241),
(798, 'image/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-1.jpg', 244),
(799, 'image/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-2.jpg', 244),
(800, 'image/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-3.jpg', 244),
(801, 'image/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-4.jpg', 244),
(802, 'image/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-5.jpg', 244),
(803, 'image/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-6.jpg', 244),
(804, 'image/product/1/4D FUTURECRAFT-1.jpg', 245),
(805, 'image/product/1/4D FUTURECRAFT-2.jpg', 245),
(806, 'image/product/1/4D FUTURECRAFT-3.jpg', 245),
(807, 'image/product/1/4D FUTURECRAFT-4.jpg', 245),
(808, 'image/product/1/4D FUTURECRAFT-5.jpg', 245),
(809, 'image/product/1/4D FUTURECRAFT-6.jpg', 245),
(810, 'image/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-1.jpg', 246),
(811, 'image/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-2.jpg', 246),
(812, 'image/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-3.jpg', 246),
(813, 'image/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-4.jpg', 246),
(814, 'image/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-5.jpg', 246),
(815, 'image/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-6.jpg', 246),
(816, 'image/product/2/X JOE FRESH GOODS CHUCK 70-1.jpg', 247),
(817, 'image/product/2/X JOE FRESH GOODS CHUCK 70-2.jpg', 247),
(818, 'image/product/2/X JOE FRESH GOODS CHUCK 70-3.jpg', 247),
(819, 'image/product/2/X JOE FRESH GOODS CHUCK 70-4.jpg', 247),
(820, 'image/product/2/X JOE FRESH GOODS CHUCK 70-5.jpg', 247),
(821, 'image/product/2/X JOE FRESH GOODS CHUCK 70-6.jpg', 247),
(823, 'image/product/3/RS-2K ATTEMPT-1.jpg', 249),
(824, 'image/product/3/RS-2K ATTEMPT-2.jpg', 249),
(825, 'image/product/3/RS-2K ATTEMPT-3.jpg', 249),
(826, 'image/product/3/RS-2K ATTEMPT-4.jpg', 249),
(827, 'image/product/3/RS-2K ATTEMPT-5.jpg', 249),
(828, 'image/product/3/RS-2K ATTEMPT-6.jpg', 249),
(829, 'image/product/3/FUTURE RIDER NEON PLAY-1(1).jpg', 250),
(830, 'image/product/3/FUTURE RIDER NEON PLAY-2(1).jpg', 250),
(831, 'image/product/3/FUTURE RIDER NEON PLAY-3(1).jpg', 250),
(832, 'image/product/3/FUTURE RIDER NEON PLAY-4(1).jpg', 250),
(833, 'image/product/3/FUTURE RIDER NEON PLAY-5(1).jpg', 250),
(834, 'image/product/3/FUTURE RIDER NEON PLAY-6(1).jpg', 250),
(835, 'image/product/4/AIR ZOOM-TYPE SE-1.jpg', 251),
(836, 'image/product/4/AIR ZOOM-TYPE SE-2.jpg', 251),
(837, 'image/product/4/AIR ZOOM-TYPE SE-3.jpg', 251),
(838, 'image/product/4/AIR ZOOM-TYPE SE-4.jpg', 251),
(839, 'image/product/4/AIR ZOOM-TYPE SE-5.jpg', 251),
(840, 'image/product/4/AIR ZOOM-TYPE SE-6.jpg', 251),
(841, 'image/product/4/AIR MAX 90 PREMIUM-1.jpg', 252),
(842, 'image/product/4/AIR MAX 90 PREMIUM-2.jpg', 252),
(843, 'image/product/4/AIR MAX 90 PREMIUM-3.jpg', 252),
(844, 'image/product/4/AIR MAX 90 PREMIUM-4.jpg', 252),
(845, 'image/product/4/AIR MAX 90 PREMIUM-5.jpg', 252),
(846, 'image/product/4/AIR MAX 90 PREMIUM-6.jpg', 252),
(885, 'image/product/1/NMD_R1-1.jpg', 265),
(886, 'image/product/1/NMD_R1-2.jpg', 265),
(887, 'image/product/1/NMD_R1-3.jpg', 265),
(888, 'image/product/1/NMD_R1-4.jpg', 265),
(889, 'image/product/1/NMD_R1-5.jpg', 265),
(890, 'image/product/1/NMD_R1-6.jpg', 265),
(891, 'image/product/1/NMD_R1 PRIMEKNIT-1.jpg', 266),
(892, 'image/product/1/NMD_R1 PRIMEKNIT-2.jpg', 266),
(893, 'image/product/1/NMD_R1 PRIMEKNIT-3.jpg', 266),
(894, 'image/product/1/NMD_R1 PRIMEKNIT-4.jpg', 266),
(895, 'image/product/1/NMD_R1 PRIMEKNIT-5.jpg', 266),
(896, 'image/product/1/NMD_R1 PRIMEKNIT-6.jpg', 266),
(897, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-1(1).jpg', 267),
(898, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-2(1).jpg', 267),
(899, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-3(1).jpg', 267),
(900, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-4(1).jpg', 267),
(901, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-5(1).jpg', 267),
(902, 'image/product/2/X CHINATOWN MARKET X NBA CHUCK 70-6(1).jpg', 267),
(903, 'image/product/2/X UNION CHUCK TAYLOR ALL STAR HI-1.jpg', 268),
(904, 'image/product/2/X UNION CHUCK TAYLOR ALL STAR HI-2.jpg', 268),
(905, 'image/product/2/X UNION CHUCK TAYLOR ALL STAR HI-3.jpg', 268),
(906, 'image/product/2/X UNION CHUCK TAYLOR ALL STAR HI-4.jpg', 268),
(907, 'image/product/2/X UNION CHUCK TAYLOR ALL STAR HI-5.jpg', 268),
(908, 'image/product/2/X UNION CHUCK TAYLOR ALL STAR HI-6.jpg', 268),
(909, 'image/product/4/BLAZER MID \'77 INFINITE-1.jpg', 269),
(910, 'image/product/4/BLAZER MID \'77 INFINITE-2.jpg', 269),
(911, 'image/product/4/BLAZER MID \'77 INFINITE-3.jpg', 269),
(912, 'image/product/4/BLAZER MID \'77 INFINITE-4.jpg', 269),
(913, 'image/product/4/BLAZER MID \'77 INFINITE-5.jpg', 269),
(914, 'image/product/4/BLAZER MID \'77 INFINITE-6.jpg', 269),
(915, 'image/product/4/MX-720-818-1.jpg', 270),
(916, 'image/product/4/MX-720-818-2.jpg', 270),
(917, 'image/product/4/MX-720-818-3.jpg', 270),
(918, 'image/product/4/MX-720-818-4.jpg', 270),
(919, 'image/product/4/MX-720-818-5.jpg', 270),
(920, 'image/product/4/MX-720-818-6.jpg', 270),
(921, 'image/product/3/MIRAGE MOX VISION-1.jpg', 271),
(922, 'image/product/3/MIRAGE MOX VISION-2.jpg', 271),
(923, 'image/product/3/MIRAGE MOX VISION-3.jpg', 271),
(924, 'image/product/3/MIRAGE MOX VISION-4.jpg', 271),
(925, 'image/product/3/MIRAGE MOX VISION-5.jpg', 271),
(926, 'image/product/3/MIRAGE MOX VISION-6.jpg', 271),
(927, 'image/product/3/SUEDE BLOC WTFORMSTRIPE-1.jpg', 272),
(928, 'image/product/3/SUEDE BLOC WTFORMSTRIPE-2.jpg', 272),
(929, 'image/product/3/SUEDE BLOC WTFORMSTRIPE-3.jpg', 272),
(930, 'image/product/3/SUEDE BLOC WTFORMSTRIPE-4.jpg', 272),
(931, 'image/product/3/SUEDE BLOC WTFORMSTRIPE-5.jpg', 272),
(932, 'image/product/3/SUEDE BLOC WTFORMSTRIPE-6.jpg', 272),
(933, 'image/product/1/ZX 2K 4D-1.jpg', 273),
(934, 'image/product/1/ZX 2K 4D-2.jpg', 273),
(935, 'image/product/1/ZX 2K 4D-3.jpg', 273),
(936, 'image/product/1/ZX 2K 4D-4.jpg', 273),
(937, 'image/product/1/ZX 2K 4D-5.jpg', 273),
(938, 'image/product/1/ZX 2K 4D-6.jpg', 273),
(939, 'image/product/1/SUPERSTAR FUTURESHELL-1.jpg', 274),
(940, 'image/product/1/SUPERSTAR FUTURESHELL-2.jpg', 274),
(941, 'image/product/1/SUPERSTAR FUTURESHELL-3.jpg', 274),
(942, 'image/product/1/SUPERSTAR FUTURESHELL-4.jpg', 274),
(943, 'image/product/1/SUPERSTAR FUTURESHELL-5.jpg', 274),
(944, 'image/product/1/SUPERSTAR FUTURESHELL-6.jpg', 274);

-- --------------------------------------------------------

--
-- Table structure for table `product_special`
--

CREATE TABLE `product_special` (
  `id` int(11) NOT NULL,
  `special` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_special`
--

INSERT INTO `product_special` (`id`, `special`) VALUES
(1, 'light'),
(2, 'running'),
(3, 'trekking'),
(4, 'fashion');

-- --------------------------------------------------------

--
-- Table structure for table `product_thumbnail`
--

CREATE TABLE `product_thumbnail` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_thumbnail`
--

INSERT INTO `product_thumbnail` (`id`, `thumbnail`, `id_product`) VALUES
(415, 'image/thumbnail/product/1/TERREX FREE HIKER PARLEY MK-1.jpg', 211),
(416, 'image/thumbnail/product/1/TERREX FREE HIKER PARLEY MK-2.jpg', 211),
(417, 'image/thumbnail/product/1/TERREX FREE HIKER PARLEY MK-3.jpg', 211),
(418, 'image/thumbnail/product/1/TERREX FREE HIKER PARLEY MK-4.jpg', 211),
(419, 'image/thumbnail/product/1/TERREX FREE HIKER PARLEY MK-5.jpg', 211),
(420, 'image/thumbnail/product/1/TERREX FREE HIKER PARLEY MK-6.jpg', 211),
(421, 'image/thumbnail/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-1.jpg', 212),
(422, 'image/thumbnail/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-2.jpg', 212),
(423, 'image/thumbnail/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-3.jpg', 212),
(424, 'image/thumbnail/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-4.jpg', 212),
(425, 'image/thumbnail/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-5.jpg', 212),
(426, 'image/thumbnail/product/1/X PHARRELL WILLIAMS D.O.N. ISSUE 2-6.jpg', 212),
(427, 'image/thumbnail/product/1/ULTRABOOST 20-1.jpg', 213),
(428, 'image/thumbnail/product/1/ULTRABOOST 20-2.jpg', 213),
(429, 'image/thumbnail/product/1/ULTRABOOST 20-3.jpg', 213),
(430, 'image/thumbnail/product/1/ULTRABOOST 20-4.jpg', 213),
(431, 'image/thumbnail/product/1/ULTRABOOST 20-5.jpg', 213),
(432, 'image/thumbnail/product/1/ULTRABOOST 20-6.jpg', 213),
(433, 'image/thumbnail/product/2/CHUCK 70-1.jpg', 214),
(434, 'image/thumbnail/product/2/CHUCK 70-2.jpg', 214),
(435, 'image/thumbnail/product/2/CHUCK 70-3.jpg', 214),
(436, 'image/thumbnail/product/2/CHUCK 70-4.jpg', 214),
(437, 'image/thumbnail/product/2/CHUCK 70-5.jpg', 214),
(438, 'image/thumbnail/product/2/CHUCK 70-6.jpg', 214),
(439, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CX-1.jpg', 215),
(440, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CX-2.jpg', 215),
(441, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CX-3.jpg', 215),
(442, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CX-4.jpg', 215),
(443, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CX-5.jpg', 215),
(444, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CX-6.jpg', 215),
(445, 'image/thumbnail/product/4/AIR MAX 90 LEATHER-1.jpg', 216),
(446, 'image/thumbnail/product/4/AIR MAX 90 LEATHER-2.jpg', 216),
(447, 'image/thumbnail/product/4/AIR MAX 90 LEATHER-3.jpg', 216),
(448, 'image/thumbnail/product/4/AIR MAX 90 LEATHER-4.jpg', 216),
(449, 'image/thumbnail/product/4/AIR MAX 90 LEATHER-5.jpg', 216),
(450, 'image/thumbnail/product/4/AIR MAX 90 LEATHER-6.jpg', 216),
(451, 'image/thumbnail/product/4/AIR FORCE 1 \'07-1.jpg', 217),
(452, 'image/thumbnail/product/4/AIR FORCE 1 \'07-2.jpg', 217),
(453, 'image/thumbnail/product/4/AIR FORCE 1 \'07-3.jpg', 217),
(454, 'image/thumbnail/product/4/AIR FORCE 1 \'07-4.jpg', 217),
(455, 'image/thumbnail/product/4/AIR FORCE 1 \'07-5.jpg', 217),
(456, 'image/thumbnail/product/4/AIR FORCE 1 \'07-6.jpg', 217),
(457, 'image/thumbnail/product/3/LACE RIDER POP-1.jpg', 218),
(458, 'image/thumbnail/product/3/LACE RIDER POP-2.jpg', 218),
(459, 'image/thumbnail/product/3/LACE RIDER POP-3.jpg', 218),
(460, 'image/thumbnail/product/3/LACE RIDER POP-4.jpg', 218),
(461, 'image/thumbnail/product/3/LACE RIDER POP-5.jpg', 218),
(462, 'image/thumbnail/product/3/LACE RIDER POP-6.jpg', 218),
(463, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-1.jpg', 219),
(464, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-2.jpg', 219),
(465, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-3.jpg', 219),
(466, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-4.jpg', 219),
(467, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-5.jpg', 219),
(468, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-6.jpg', 219),
(469, 'image/thumbnail/product/1/ULTRABOOST COLD.RDY-1.jpg', 220),
(470, 'image/thumbnail/product/1/ULTRABOOST COLD.RDY-2.jpg', 220),
(471, 'image/thumbnail/product/1/ULTRABOOST COLD.RDY-3.jpg', 220),
(472, 'image/thumbnail/product/1/ULTRABOOST COLD.RDY-4.jpg', 220),
(473, 'image/thumbnail/product/1/ULTRABOOST COLD.RDY-5.jpg', 220),
(474, 'image/thumbnail/product/1/ULTRABOOST COLD.RDY-6.jpg', 220),
(475, 'image/thumbnail/product/1/TERREX VOYAGER-1.jpg', 221),
(476, 'image/thumbnail/product/1/TERREX VOYAGER-2.jpg', 221),
(477, 'image/thumbnail/product/1/TERREX VOYAGER-3.jpg', 221),
(478, 'image/thumbnail/product/1/TERREX VOYAGER-4.jpg', 221),
(479, 'image/thumbnail/product/1/TERREX VOYAGER-5.jpg', 221),
(480, 'image/thumbnail/product/1/TERREX VOYAGER-6.jpg', 221),
(481, 'image/thumbnail/product/1/ULTRABOOST 5.0 DNA-1.jpg', 222),
(482, 'image/thumbnail/product/1/ULTRABOOST 5.0 DNA-2.jpg', 222),
(483, 'image/thumbnail/product/1/ULTRABOOST 5.0 DNA-3.jpg', 222),
(484, 'image/thumbnail/product/1/ULTRABOOST 5.0 DNA-4.jpg', 222),
(485, 'image/thumbnail/product/1/ULTRABOOST 5.0 DNA-5.jpg', 222),
(486, 'image/thumbnail/product/1/ULTRABOOST 5.0 DNA-6.jpg', 222),
(487, 'image/thumbnail/product/2/ALL STAR HI-1.jpg', 223),
(488, 'image/thumbnail/product/2/ALL STAR HI-2.jpg', 223),
(489, 'image/thumbnail/product/2/ALL STAR HI-3.jpg', 223),
(490, 'image/thumbnail/product/2/ALL STAR HI-4.jpg', 223),
(491, 'image/thumbnail/product/2/ALL STAR HI-5.jpg', 223),
(492, 'image/thumbnail/product/2/ALL STAR HI-6.jpg', 223),
(493, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-1.jpg', 224),
(494, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-2.jpg', 224),
(495, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-3.jpg', 224),
(496, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-4.jpg', 224),
(497, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-5.jpg', 224),
(498, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR CRATER KNIT-6.jpg', 224),
(499, 'image/thumbnail/product/4/X KIM JONES AIR MAX 95-1.jpg', 225),
(500, 'image/thumbnail/product/4/X KIM JONES AIR MAX 95-2.jpg', 225),
(501, 'image/thumbnail/product/4/X KIM JONES AIR MAX 95-3.jpg', 225),
(502, 'image/thumbnail/product/4/X KIM JONES AIR MAX 95-4.jpg', 225),
(503, 'image/thumbnail/product/4/X KIM JONES AIR MAX 95-5.jpg', 225),
(504, 'image/thumbnail/product/4/X KIM JONES AIR MAX 95-6.jpg', 225),
(505, 'image/thumbnail/product/4/X SKEPTA AIR MAX TAILWIND V-1.jpg', 226),
(506, 'image/thumbnail/product/4/X SKEPTA AIR MAX TAILWIND V-2.jpg', 226),
(507, 'image/thumbnail/product/4/X SKEPTA AIR MAX TAILWIND V-3.jpg', 226),
(508, 'image/thumbnail/product/4/X SKEPTA AIR MAX TAILWIND V-4.jpg', 226),
(509, 'image/thumbnail/product/4/X SKEPTA AIR MAX TAILWIND V-5.jpg', 226),
(510, 'image/thumbnail/product/4/X SKEPTA AIR MAX TAILWIND V-6.jpg', 226),
(511, 'image/thumbnail/product/3/RS-2K INTERNET EXPLORING-1.jpg', 227),
(512, 'image/thumbnail/product/3/RS-2K INTERNET EXPLORING-2.jpg', 227),
(513, 'image/thumbnail/product/3/RS-2K INTERNET EXPLORING-3.jpg', 227),
(514, 'image/thumbnail/product/3/RS-2K INTERNET EXPLORING-4.jpg', 227),
(515, 'image/thumbnail/product/3/RS-2K INTERNET EXPLORING-5.jpg', 227),
(516, 'image/thumbnail/product/3/RS-2K INTERNET EXPLORING-6.jpg', 227),
(517, 'image/thumbnail/product/3/FUTURE RIDER CONTRAST-1.jpg', 228),
(518, 'image/thumbnail/product/3/FUTURE RIDER CONTRAST-2.jpg', 228),
(519, 'image/thumbnail/product/3/FUTURE RIDER CONTRAST-3.jpg', 228),
(520, 'image/thumbnail/product/3/FUTURE RIDER CONTRAST-4.jpg', 228),
(521, 'image/thumbnail/product/3/FUTURE RIDER CONTRAST-5.jpg', 228),
(522, 'image/thumbnail/product/3/FUTURE RIDER CONTRAST-6.jpg', 228),
(523, 'image/thumbnail/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-1.jpg', 229),
(524, 'image/thumbnail/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-2.jpg', 229),
(525, 'image/thumbnail/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-3.jpg', 229),
(526, 'image/thumbnail/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-4.jpg', 229),
(527, 'image/thumbnail/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-5.jpg', 229),
(528, 'image/thumbnail/product/1/X PHARRELL WILLIAMS CRAZY BYW 2.0-6.jpg', 229),
(529, 'image/thumbnail/product/1/ULTRABOOST 20 W-1.jpg', 230),
(530, 'image/thumbnail/product/1/ULTRABOOST 20 W-2.jpg', 230),
(531, 'image/thumbnail/product/1/ULTRABOOST 20 W-3.jpg', 230),
(532, 'image/thumbnail/product/1/ULTRABOOST 20 W-4.jpg', 230),
(533, 'image/thumbnail/product/1/ULTRABOOST 20 W-5.jpg', 230),
(534, 'image/thumbnail/product/1/ULTRABOOST 20 W-6.jpg', 230),
(535, 'image/thumbnail/product/1/ULTRABOOST 1.0 DNA-1.jpg', 231),
(536, 'image/thumbnail/product/1/ULTRABOOST 1.0 DNA-2.jpg', 231),
(537, 'image/thumbnail/product/1/ULTRABOOST 1.0 DNA-3.jpg', 231),
(538, 'image/thumbnail/product/1/ULTRABOOST 1.0 DNA-4.jpg', 231),
(539, 'image/thumbnail/product/1/ULTRABOOST 1.0 DNA-5.jpg', 231),
(540, 'image/thumbnail/product/1/ULTRABOOST 1.0 DNA-6.jpg', 231),
(541, 'image/thumbnail/product/4/AIR MAX 90-1.jpg', 232),
(542, 'image/thumbnail/product/4/AIR MAX 90-2.jpg', 232),
(543, 'image/thumbnail/product/4/AIR MAX 90-3.jpg', 232),
(544, 'image/thumbnail/product/4/AIR MAX 90-4.jpg', 232),
(545, 'image/thumbnail/product/4/AIR MAX 90-5.jpg', 232),
(546, 'image/thumbnail/product/4/AIR MAX 90-6.jpg', 232),
(547, 'image/thumbnail/product/4/AIR VAPORMAX EVO NRG-1.jpg', 233),
(548, 'image/thumbnail/product/4/AIR VAPORMAX EVO NRG-2.jpg', 233),
(549, 'image/thumbnail/product/4/AIR VAPORMAX EVO NRG-3.jpg', 233),
(550, 'image/thumbnail/product/4/AIR VAPORMAX EVO NRG-4.jpg', 233),
(551, 'image/thumbnail/product/4/AIR VAPORMAX EVO NRG-5.jpg', 233),
(552, 'image/thumbnail/product/4/AIR VAPORMAX EVO NRG-6.jpg', 233),
(553, 'image/thumbnail/product/3/FUTURE RIDER SPRINT-1.jpg', 234),
(554, 'image/thumbnail/product/3/FUTURE RIDER SPRINT-2.jpg', 234),
(555, 'image/thumbnail/product/3/FUTURE RIDER SPRINT-3.jpg', 234),
(556, 'image/thumbnail/product/3/FUTURE RIDER SPRINT-4.jpg', 234),
(557, 'image/thumbnail/product/3/FUTURE RIDER SPRINT-5.jpg', 234),
(558, 'image/thumbnail/product/3/FUTURE RIDER SPRINT-6.jpg', 234),
(559, 'image/thumbnail/product/3/RS-FAST TECH-1.jpg', 235),
(560, 'image/thumbnail/product/3/RS-FAST TECH-2.jpg', 235),
(561, 'image/thumbnail/product/3/RS-FAST TECH-3.jpg', 235),
(562, 'image/thumbnail/product/3/RS-FAST TECH-4.jpg', 235),
(563, 'image/thumbnail/product/3/RS-FAST TECH-5.jpg', 235),
(564, 'image/thumbnail/product/3/RS-FAST TECH-6.jpg', 235),
(565, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR 70 OX-1.jpg', 236),
(566, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR 70 OX-2.jpg', 236),
(567, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR 70 OX-3.jpg', 236),
(568, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR 70 OX-4.jpg', 236),
(569, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR 70 OX-5.jpg', 236),
(570, 'image/thumbnail/product/2/CHUCK TAYLOR ALL STAR 70 OX-6.jpg', 236),
(571, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-1.jpg', 237),
(572, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-2.jpg', 237),
(573, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-3.jpg', 237),
(574, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-4.jpg', 237),
(575, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-5.jpg', 237),
(576, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-6.jpg', 237),
(577, 'image/thumbnail/product/1/SAHALEX-1.jpg', 238),
(578, 'image/thumbnail/product/1/SAHALEX-2.jpg', 238),
(579, 'image/thumbnail/product/1/SAHALEX-3.jpg', 238),
(580, 'image/thumbnail/product/1/SAHALEX-4.jpg', 238),
(581, 'image/thumbnail/product/1/SAHALEX-5.jpg', 238),
(582, 'image/thumbnail/product/1/SAHALEX-6.jpg', 238),
(583, 'image/thumbnail/product/1/KAMANDA-1.jpg', 239),
(584, 'image/thumbnail/product/1/KAMANDA-2.jpg', 239),
(585, 'image/thumbnail/product/1/KAMANDA-3.jpg', 239),
(586, 'image/thumbnail/product/1/KAMANDA-4.jpg', 239),
(587, 'image/thumbnail/product/1/KAMANDA-5.jpg', 239),
(588, 'image/thumbnail/product/1/KAMANDA-6.jpg', 239),
(589, 'image/thumbnail/product/1/LXCON 94-1.jpg', 240),
(590, 'image/thumbnail/product/1/LXCON 94-2.jpg', 240),
(591, 'image/thumbnail/product/1/LXCON 94-3.jpg', 240),
(592, 'image/thumbnail/product/1/LXCON 94-4.jpg', 240),
(593, 'image/thumbnail/product/1/LXCON 94-5.jpg', 240),
(594, 'image/thumbnail/product/1/LXCON 94-6.jpg', 240),
(595, 'image/thumbnail/product/1/4D FUSION-1.jpg', 241),
(608, 'image/thumbnail/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-1.jpg', 244),
(609, 'image/thumbnail/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-2.jpg', 244),
(610, 'image/thumbnail/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-3.jpg', 244),
(611, 'image/thumbnail/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-4.jpg', 244),
(612, 'image/thumbnail/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-5.jpg', 244),
(613, 'image/thumbnail/product/1/X STELLA MCCARTNEY CLIMACOOL VENT-6.jpg', 244),
(614, 'image/thumbnail/product/1/4D FUTURECRAFT-1.jpg', 245),
(615, 'image/thumbnail/product/1/4D FUTURECRAFT-2.jpg', 245),
(616, 'image/thumbnail/product/1/4D FUTURECRAFT-3.jpg', 245),
(617, 'image/thumbnail/product/1/4D FUTURECRAFT-4.jpg', 245),
(618, 'image/thumbnail/product/1/4D FUTURECRAFT-5.jpg', 245),
(619, 'image/thumbnail/product/1/4D FUTURECRAFT-6.jpg', 245),
(620, 'image/thumbnail/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-1.jpg', 246),
(621, 'image/thumbnail/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-2.jpg', 246),
(622, 'image/thumbnail/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-3.jpg', 246),
(623, 'image/thumbnail/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-4.jpg', 246),
(624, 'image/thumbnail/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-5.jpg', 246),
(625, 'image/thumbnail/product/2/X GOLF WANG POLKA DOT CHUCK 70 HI-6.jpg', 246),
(626, 'image/thumbnail/product/2/X JOE FRESH GOODS CHUCK 70-1.jpg', 247),
(627, 'image/thumbnail/product/2/X JOE FRESH GOODS CHUCK 70-2.jpg', 247),
(628, 'image/thumbnail/product/2/X JOE FRESH GOODS CHUCK 70-3.jpg', 247),
(629, 'image/thumbnail/product/2/X JOE FRESH GOODS CHUCK 70-4.jpg', 247),
(630, 'image/thumbnail/product/2/X JOE FRESH GOODS CHUCK 70-5.jpg', 247),
(631, 'image/thumbnail/product/2/X JOE FRESH GOODS CHUCK 70-6.jpg', 247),
(633, 'image/thumbnail/product/3/RS-2K ATTEMPT-1.jpg', 249),
(634, 'image/thumbnail/product/3/RS-2K ATTEMPT-2.jpg', 249),
(635, 'image/thumbnail/product/3/RS-2K ATTEMPT-3.jpg', 249),
(636, 'image/thumbnail/product/3/RS-2K ATTEMPT-4.jpg', 249),
(637, 'image/thumbnail/product/3/RS-2K ATTEMPT-5.jpg', 249),
(638, 'image/thumbnail/product/3/RS-2K ATTEMPT-6.jpg', 249),
(639, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-1(1).jpg', 250),
(640, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-2(1).jpg', 250),
(641, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-3(1).jpg', 250),
(642, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-4(1).jpg', 250),
(643, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-5(1).jpg', 250),
(644, 'image/thumbnail/product/3/FUTURE RIDER NEON PLAY-6(1).jpg', 250),
(645, 'image/thumbnail/product/4/AIR ZOOM-TYPE SE-1.jpg', 251),
(646, 'image/thumbnail/product/4/AIR ZOOM-TYPE SE-2.jpg', 251),
(647, 'image/thumbnail/product/4/AIR ZOOM-TYPE SE-3.jpg', 251),
(648, 'image/thumbnail/product/4/AIR ZOOM-TYPE SE-4.jpg', 251),
(649, 'image/thumbnail/product/4/AIR ZOOM-TYPE SE-5.jpg', 251),
(650, 'image/thumbnail/product/4/AIR ZOOM-TYPE SE-6.jpg', 251),
(651, 'image/thumbnail/product/4/AIR MAX 90 PREMIUM-1.jpg', 252),
(652, 'image/thumbnail/product/4/AIR MAX 90 PREMIUM-2.jpg', 252),
(653, 'image/thumbnail/product/4/AIR MAX 90 PREMIUM-3.jpg', 252),
(654, 'image/thumbnail/product/4/AIR MAX 90 PREMIUM-4.jpg', 252),
(655, 'image/thumbnail/product/4/AIR MAX 90 PREMIUM-5.jpg', 252),
(656, 'image/thumbnail/product/4/AIR MAX 90 PREMIUM-6.jpg', 252),
(695, 'image/thumbnail/product/1/NMD_R1-1.jpg', 265),
(696, 'image/thumbnail/product/1/NMD_R1-2.jpg', 265),
(697, 'image/thumbnail/product/1/NMD_R1-3.jpg', 265),
(698, 'image/thumbnail/product/1/NMD_R1-4.jpg', 265),
(699, 'image/thumbnail/product/1/NMD_R1-5.jpg', 265),
(700, 'image/thumbnail/product/1/NMD_R1-6.jpg', 265),
(701, 'image/thumbnail/product/1/NMD_R1 PRIMEKNIT-1.jpg', 266),
(702, 'image/thumbnail/product/1/NMD_R1 PRIMEKNIT-2.jpg', 266),
(703, 'image/thumbnail/product/1/NMD_R1 PRIMEKNIT-3.jpg', 266),
(704, 'image/thumbnail/product/1/NMD_R1 PRIMEKNIT-4.jpg', 266),
(705, 'image/thumbnail/product/1/NMD_R1 PRIMEKNIT-5.jpg', 266),
(706, 'image/thumbnail/product/1/NMD_R1 PRIMEKNIT-6.jpg', 266),
(707, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-1(1).jpg', 267),
(708, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-2(1).jpg', 267),
(709, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-3(1).jpg', 267),
(710, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-4(1).jpg', 267),
(711, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-5(1).jpg', 267),
(712, 'image/thumbnail/product/2/X CHINATOWN MARKET X NBA CHUCK 70-6(1).jpg', 267),
(713, 'image/thumbnail/product/2/X UNION CHUCK TAYLOR ALL STAR HI-1.jpg', 268),
(714, 'image/thumbnail/product/2/X UNION CHUCK TAYLOR ALL STAR HI-2.jpg', 268),
(715, 'image/thumbnail/product/2/X UNION CHUCK TAYLOR ALL STAR HI-3.jpg', 268),
(716, 'image/thumbnail/product/2/X UNION CHUCK TAYLOR ALL STAR HI-4.jpg', 268),
(717, 'image/thumbnail/product/2/X UNION CHUCK TAYLOR ALL STAR HI-5.jpg', 268),
(718, 'image/thumbnail/product/2/X UNION CHUCK TAYLOR ALL STAR HI-6.jpg', 268),
(719, 'image/thumbnail/product/4/BLAZER MID \'77 INFINITE-1.jpg', 269),
(720, 'image/thumbnail/product/4/BLAZER MID \'77 INFINITE-2.jpg', 269),
(721, 'image/thumbnail/product/4/BLAZER MID \'77 INFINITE-3.jpg', 269),
(722, 'image/thumbnail/product/4/BLAZER MID \'77 INFINITE-4.jpg', 269),
(723, 'image/thumbnail/product/4/BLAZER MID \'77 INFINITE-5.jpg', 269),
(724, 'image/thumbnail/product/4/BLAZER MID \'77 INFINITE-6.jpg', 269),
(725, 'image/thumbnail/product/4/MX-720-818-1.jpg', 270),
(726, 'image/thumbnail/product/4/MX-720-818-2.jpg', 270),
(727, 'image/thumbnail/product/4/MX-720-818-3.jpg', 270),
(728, 'image/thumbnail/product/4/MX-720-818-4.jpg', 270),
(729, 'image/thumbnail/product/4/MX-720-818-5.jpg', 270),
(730, 'image/thumbnail/product/4/MX-720-818-6.jpg', 270),
(731, 'image/thumbnail/product/3/MIRAGE MOX VISION-1.jpg', 271),
(732, 'image/thumbnail/product/3/MIRAGE MOX VISION-2.jpg', 271),
(733, 'image/thumbnail/product/3/MIRAGE MOX VISION-3.jpg', 271),
(734, 'image/thumbnail/product/3/MIRAGE MOX VISION-4.jpg', 271),
(735, 'image/thumbnail/product/3/MIRAGE MOX VISION-5.jpg', 271),
(736, 'image/thumbnail/product/3/MIRAGE MOX VISION-6.jpg', 271),
(737, 'image/thumbnail/product/3/SUEDE BLOC WTFORMSTRIPE-1.jpg', 272),
(738, 'image/thumbnail/product/3/SUEDE BLOC WTFORMSTRIPE-2.jpg', 272),
(739, 'image/thumbnail/product/3/SUEDE BLOC WTFORMSTRIPE-3.jpg', 272),
(740, 'image/thumbnail/product/3/SUEDE BLOC WTFORMSTRIPE-4.jpg', 272),
(741, 'image/thumbnail/product/3/SUEDE BLOC WTFORMSTRIPE-5.jpg', 272),
(742, 'image/thumbnail/product/3/SUEDE BLOC WTFORMSTRIPE-6.jpg', 272),
(743, 'image/thumbnail/product/1/ZX 2K 4D-1.jpg', 273),
(744, 'image/thumbnail/product/1/ZX 2K 4D-2.jpg', 273),
(745, 'image/thumbnail/product/1/ZX 2K 4D-3.jpg', 273),
(746, 'image/thumbnail/product/1/ZX 2K 4D-4.jpg', 273),
(747, 'image/thumbnail/product/1/ZX 2K 4D-5.jpg', 273),
(748, 'image/thumbnail/product/1/ZX 2K 4D-6.jpg', 273),
(749, 'image/thumbnail/product/1/SUPERSTAR FUTURESHELL-1.jpg', 274),
(750, 'image/thumbnail/product/1/SUPERSTAR FUTURESHELL-2.jpg', 274),
(751, 'image/thumbnail/product/1/SUPERSTAR FUTURESHELL-3.jpg', 274),
(752, 'image/thumbnail/product/1/SUPERSTAR FUTURESHELL-4.jpg', 274),
(753, 'image/thumbnail/product/1/SUPERSTAR FUTURESHELL-5.jpg', 274),
(754, 'image/thumbnail/product/1/SUPERSTAR FUTURESHELL-6.jpg', 274);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `id_product` varchar(45) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user`, `id_product`, `star`, `review`, `created_at`) VALUES
(13, 'Như Nguyễn', '220', 1, 'qưeqưe', '2021-06-18'),
(14, 'Như Nguyễn', '230', 2, 'ư', '2021-06-18'),
(15, 'Như Nguyễn', '230', 2, 'ư', '2021-06-18'),
(16, 'vy', '211', 2, ';kl;l', '2021-06-23'),
(17, 'vy', '244', 2, 'arưewe', '2021-06-23'),
(18, 'vy', '244', 2, 'arưewe', '2021-06-23'),
(19, 'vy', '211', 2, '1', '2021-06-23'),
(20, 'vy', '215', 5, 'GOOD', '2021-06-28'),
(21, 'Nguyen Ha Vy (Aptech HCM)', '215', 5, 'good', '2021-07-08'),
(22, 'vy', '274', 5, 'ưqqeqưeq', '2021-07-12'),
(28, 'vy', '274', 5, 'âsđá', '2021-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `review_filter`
--

CREATE TABLE `review_filter` (
  `id` int(11) NOT NULL,
  `keyword` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `review_filter`
--

INSERT INTO `review_filter` (`id`, `keyword`) VALUES
(2, 'shit'),
(3, 'dm'),
(4, 'vl'),
(5, 'fuck ');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `description`) VALUES
(1, 'Sport and Life', '&lt;p&gt;News about sports in nomal life&lt;/p&gt;'),
(2, 'Running and Fitness', '&lt;p&gt;Go faster, stronger&lt;/p&gt;'),
(3, 'Hot Sneakers', '&lt;p&gt;Update lastest trending stylist about sneakers&lt;/p&gt;'),
(4, 'Sport and Health', '&lt;p&gt;Sporting for your healthy&lt;/p&gt;'),
(6, 'Active Travel', '&lt;p&gt;Travel with sport sneakers&lt;/p&gt;'),
(16, 'Test topic', '<p>test</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `email`, `created_at`, `updated_at`, `name`, `login`, `token`, `phone`, `address`) VALUES
(10, 'vy', '123', 'havy59@gmail.com', '2021-04-26 15:23:04', '2021-07-12 17:16:26', 'Ha Vy', 'local', 'd2092d499d', '0794619495', 'ba thang hai street, ho chi minh city'),
(31, 'Như Nguyễn', NULL, 'nhunguyennguyen997@gmail.com', '2021-06-18 20:07:28', '2021-06-18 20:07:28', NULL, 'Google', '', NULL, NULL),
(33, 'Huy Nguyễn', NULL, 'quanghuy.redplus@gmail.com', '2021-06-26 15:11:53', '2021-06-26 15:11:53', NULL, 'Google', NULL, NULL, NULL),
(35, 'Sneaker Shop', NULL, 'jukain59@gmail.com', '2021-06-26 15:48:56', '2021-06-26 15:48:56', NULL, 'Google', '', NULL, NULL),
(36, 'Quốc Nguyễn Kim', 'quoc@999', 'quocnguyenkim99nt@gmail.com', '2021-06-26 16:56:02', '2021-06-26 16:56:02', NULL, 'Facebook', '', NULL, NULL),
(39, '1', '1', '1@gmail.com', '2021-06-28 14:01:08', '2021-06-28 14:01:08', NULL, 'local', 'fd1d51054e', NULL, NULL),
(40, 'Nguyễn Hạ Vy', NULL, 'girlcdon_tim_boycdoc@yahoo.com.vn', '2021-06-30 15:54:44', '2021-07-15 05:09:41', 'Nguyễn Hạ Vy', 'Facebook', '', '0794619495', 'ba thang hai street, ho chi minh city'),
(41, 'Nguyen Ha Vy (Aptech HCM)', NULL, 'vynhts2008026@fpt.edu.vn', '2021-07-08 23:01:58', '2021-07-08 23:01:58', NULL, 'Google', '', NULL, NULL),
(65, 'test', '123', 'test@gmail.com', '2021-07-16 18:10:36', '2021-07-16 18:10:36', NULL, 'local', '66df82690a', NULL, NULL),
(67, 'tai', '123', 'ngynanhtai@gmail.com', '2021-07-16 19:15:06', '2021-07-16 19:15:06', NULL, 'local', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_product`, `price`, `name`, `id_user`) VALUES
(66, 273, 123, 'ADIDAS ZX 2K 4D', 41),
(106, 269, 700, 'BLAZER MID \'77 INFINITE', 65),
(107, 272, 588, 'SUEDE BLOC WTFORMSTRIPE', 65),
(108, 266, 635, 'NMD_R1 PRIMEKNIT', 65),
(109, 265, 399, 'ADIDAS NMD_R1', 65),
(110, 249, 577, 'PUMA RS-2K ATTEMPT', 65),
(111, 247, 477, 'X JOE FRESH GOODS', 65),
(112, 240, 499, 'ADIDAS LXCON 94', 65),
(113, 241, 700, 'ADIDAS 4D FUSION', 65),
(115, 213, 356, 'ADIDAS ULTRABOOST 20', 65),
(122, 250, 455, 'FUTURE RIDER NEON PLAY', 67),
(123, 251, 367, 'AIR ZOOM-TYPE SE', 67),
(124, 244, 699, 'STELLA MCCARTNEY CLIMACOOL', 67),
(132, 245, 568, '4D FUTURECRAFT', 67),
(133, 245, 568, '4D FUTURECRAFT', 39),
(134, 244, 699, 'STELLA MCCARTNEY CLIMACOOL', 39),
(135, 241, 700, 'ADIDAS 4D FUSION', 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus_content`
--
ALTER TABLE `aboutus_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aboutus_member`
--
ALTER TABLE `aboutus_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form_info_table`
--
ALTER TABLE `contact_form_info_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_addmap`
--
ALTER TABLE `contact_us_addmap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD UNIQUE KEY `token_UNIQUE` (`token`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tp`
--
ALTER TABLE `event_tp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebook_user`
--
ALTER TABLE `facebook_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `href_param_UNIQUE` (`href_param`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_process`
--
ALTER TABLE `order_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_home_feedback`
--
ALTER TABLE `page_home_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_home_slider`
--
ALTER TABLE `page_home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_special`
--
ALTER TABLE `product_special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_thumbnail`
--
ALTER TABLE `product_thumbnail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_filter`
--
ALTER TABLE `review_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`topic_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_UNIQUE` (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus_content`
--
ALTER TABLE `aboutus_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `aboutus_member`
--
ALTER TABLE `aboutus_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `contact_form_info_table`
--
ALTER TABLE `contact_form_info_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `contact_us_addmap`
--
ALTER TABLE `contact_us_addmap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `event_tp`
--
ALTER TABLE `event_tp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `order_process`
--
ALTER TABLE `order_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_home_feedback`
--
ALTER TABLE `page_home_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page_home_slider`
--
ALTER TABLE `page_home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=960;

--
-- AUTO_INCREMENT for table `product_special`
--
ALTER TABLE `product_special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_thumbnail`
--
ALTER TABLE `product_thumbnail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=765;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `review_filter`
--
ALTER TABLE `review_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
