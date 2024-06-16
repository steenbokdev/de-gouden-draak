-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2024 at 10:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `degoudendraak_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_number` int(11) DEFAULT NULL,
  `menu_addition` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `menu_number`, `menu_addition`, `name`, `price`, `category`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Soep Ling Fa', 3.8, 'SOEP', NULL, NULL, NULL),
(2, 2, NULL, 'Kippensoep', 2.9, 'SOEP', '', NULL, NULL),
(3, 3, NULL, 'Tomatensoep', 2.9, 'SOEP', NULL, NULL, NULL),
(4, 4, NULL, 'Haaienvinnensoep', 3.1, 'SOEP', NULL, NULL, NULL),
(5, 5, NULL, 'Champignonsoep', 3.3, 'SOEP', NULL, NULL, NULL),
(6, 6, NULL, 'Pekingsoep', 3.8, 'SOEP', NULL, NULL, NULL),
(7, 7, NULL, 'Wan Tan Soep', 4.3, 'SOEP', NULL, NULL, NULL),
(8, 8, NULL, 'Chinese Champignonsoep', 4.1, 'SOEP', NULL, NULL, NULL),
(9, 10, NULL, 'Loempia Ling Fa', 6.2, 'VOORGERECHT', 'met atjar, ananas en pindasaus', NULL, NULL),
(10, 11, NULL, 'Loempia Compleet', 6.2, 'VOORGERECHT', 'met gesmoord rundvlees en pikante saus', NULL, NULL),
(11, 12, NULL, 'Loempia met Kip', 3.9, 'VOORGERECHT', NULL, NULL, NULL),
(12, 13, NULL, 'Loempia', 3.8, 'VOORGERECHT', NULL, NULL, NULL),
(13, 14, NULL, 'Chinese mini loempia', 4.9, 'VOORGERECHT', '4 st.', NULL, NULL),
(14, 14, 'A', 'Vegetarische mini loempia', 4.9, 'VOORGERECHT', '12 st.', NULL, NULL),
(15, 15, NULL, 'Kroepoek', 2.5, 'VOORGERECHT', NULL, NULL, NULL),
(16, 15, 'A', 'Casave Kroepoek', 2.7, 'VOORGERECHT', NULL, NULL, NULL),
(17, 16, NULL, 'Pangsit Goreng', 3.9, 'VOORGERECHT', '7 st.', NULL, NULL),
(18, 17, NULL, 'Pisang Goreng', 3.4, 'VOORGERECHT', '5 st.', NULL, NULL),
(19, 18, NULL, 'Chinese Dim Sum', 5.4, 'VOORGERECHT', 'mini loempia, kerry ko, pangsit goreng, garnalenpasteitje', NULL, NULL),
(20, 19, NULL, 'Saté Babi', 5.4, 'VOORGERECHT', '4 st.', NULL, '2024-06-16 18:34:52'),
(21, 20, NULL, 'Saté Ajam', 5.4, 'VOORGERECHT', '4 st.', NULL, '2024-06-16 18:35:04'),
(22, 20, 'A', 'Saté Garnalen', 9.9, 'VOORGERECHT', '3 st.', NULL, '2024-06-16 18:35:10'),
(23, 21, NULL, 'Fong Mei Ha', 8.1, 'VOORGERECHT', 'krokant gepaneerd garnalen. 4 st.', NULL, NULL),
(24, 22, NULL, 'Patat', 2.3, 'VOORGERECHT', NULL, NULL, NULL),
(25, 23, NULL, 'Tsa Siu Mai', 3.5, 'VOORGERECHT', 'gebakken vleespasteitje. 4 st.', NULL, NULL),
(26, 24, NULL, 'Atjar', 3, 'VOORGERECHT', NULL, NULL, NULL),
(27, 25, NULL, 'Witte Rijst', 3, 'VOORGERECHT', NULL, NULL, NULL),
(28, 26, NULL, 'Grote pindasaus', 3.9, 'VOORGERECHT', NULL, NULL, NULL),
(29, 27, NULL, 'Kleine pindasaus', 2.3, 'VOORGERECHT', NULL, NULL, NULL),
(30, 28, NULL, 'Kippenpootje', 2.3, 'VOORGERECHT', NULL, NULL, NULL),
(31, 29, NULL, 'Halve kip', 6, 'VOORGERECHT', NULL, NULL, NULL),
(32, 29, 'H', 'Kroket', 1.4, 'VOORGERECHT', NULL, NULL, NULL),
(33, 29, 'G', 'Frikandel', 1.4, 'VOORGERECHT', NULL, NULL, NULL),
(34, 180, 'H', 'Kleine Sambal', 2.5, 'VOORGERECHT', NULL, NULL, NULL),
(35, 30, NULL, 'Bami of Nasi Goreng Ling Fa', 14.3, 'BAMI EN NASI GERECHTEN', 'Foe Yong Hai, Babi Pangang, saté; en kippenpootje', NULL, '2024-06-16 18:34:22'),
(36, 31, NULL, 'Bami of Nasi Goreng met ei', 5, 'BAMI EN NASI GERECHTEN', NULL, NULL, NULL),
(37, 32, NULL, 'Bami of Nasi Goreng speciaal', 8.5, 'BAMI EN NASI GERECHTEN', NULL, NULL, NULL),
(38, 33, NULL, 'Bami of Nasi Goreng met saté', 8.5, 'BAMI EN NASI GERECHTEN', '3 st.', NULL, '2024-06-16 18:35:30'),
(39, 34, NULL, 'Nasi Yeung Chow', 10.9, 'BAMI EN NASI GERECHTEN', NULL, NULL, NULL),
(40, 34, 'A', 'Nasi Yeung Chow', 13, 'BAMI EN NASI GERECHTEN', 'met garnaaltjes en Cha Sieuw-vlees', NULL, NULL),
(41, 35, NULL, 'Bami of Nasi Malay', 9.3, 'BAMI EN NASI GERECHTEN', NULL, NULL, NULL),
(42, 36, NULL, 'Bami of Nasi met kipfilet', 9.3, 'BAMI EN NASI GERECHTEN', NULL, NULL, NULL),
(43, 37, NULL, 'Bami of Nasi met varkensvlees', 9.3, 'BAMI EN NASI GERECHTEN', NULL, NULL, NULL),
(44, 38, NULL, 'Bami of Nasi met garnalen', 14.3, 'BAMI EN NASI GERECHTEN', NULL, NULL, NULL),
(45, 39, NULL, 'Bami of Nasi met ossenhaas', 15.3, 'BAMI EN NASI GERECHTEN', NULL, NULL, NULL),
(46, 40, NULL, 'Babi Pangang, Foe Yong Hani en saté', 15.8, 'COMBINATIE GERECHTEN (met witte rijst)', NULL, NULL, '2024-06-16 18:35:36'),
(47, 41, NULL, 'Babi Pangang, Tjap Tjoy en saté', 15.8, 'COMBINATIE GERECHTEN (met witte rijst)', NULL, NULL, '2024-06-16 18:35:43'),
(48, 42, NULL, 'Babi Pangang, Koe Loe Yuk en saté', 15.8, 'COMBINATIE GERECHTEN (met witte rijst)', NULL, NULL, '2024-06-16 18:35:49'),
(49, 43, NULL, 'Babi Pangang, Tau Sie Kai en saté', 16.5, 'COMBINATIE GERECHTEN (met witte rijst)', NULL, NULL, '2024-06-16 18:35:55'),
(50, 44, NULL, 'Koe Loe Yuk, Foe Yong Hai en saté', 15.8, 'COMBINATIE GERECHTEN (met witte rijst)', NULL, NULL, '2024-06-16 18:36:03'),
(51, 45, NULL, 'Koe Loe Yuk, Tjap Tjoy en saté', 15.8, 'COMBINATIE GERECHTEN (met witte rijst)', NULL, NULL, '2024-06-16 18:36:09'),
(52, 46, NULL, 'Foe Yong Hai, Tjap Tjoy en saté', 15.8, 'COMBINATIE GERECHTEN (met witte rijst)', NULL, NULL, '2024-06-16 18:36:14'),
(53, 47, NULL, 'Foe Yong Hai, Kip Kerrie en Saté', 16.5, 'COMBINATIE GERECHTEN (met witte rijst)', NULL, NULL, '2024-06-16 18:36:21'),
(54, 50, NULL, 'Mihoen Ling Fa', 16.4, 'MIHOEN GERECHTEN', 'Foe Yong Hai, Babi Pangang, sat&eacute; en kippenpootje', NULL, NULL),
(55, 51, NULL, 'Mihoen met varkensvlees', 9.3, 'MIHOEN GERECHTEN', NULL, NULL, NULL),
(56, 52, NULL, 'Mihoen met kipfilet', 10.4, 'MIHOEN GERECHTEN', NULL, NULL, NULL),
(57, 53, NULL, 'Mihoen met ossenhaas', 16.4, 'MIHOEN GERECHTEN', NULL, NULL, NULL),
(58, 54, NULL, 'Mihoen met garnalen', 15.3, 'MIHOEN GERECHTEN', NULL, NULL, NULL),
(59, 55, NULL, 'Mihoen Singapore-style', 11.9, 'MIHOEN GERECHTEN', 'met kleine garnaaltjes en Cha Sieuw-vlees en kerrie poeder', NULL, NULL),
(60, 56, NULL, 'Mihoen met Cha Sieuw vlees', 11.2, 'MIHOEN GERECHTEN', NULL, NULL, NULL),
(61, 57, NULL, 'Chinese Bami Ling Fa', 16.9, 'CHINESE BAMI GERECHTEN', 'Foe Yong Hai, Babi Pangang, saté; en kippenpootje', NULL, '2024-06-16 18:34:38'),
(62, 58, NULL, 'Chinese Bami met varkensvlees', 10.1, 'CHINESE BAMI GERECHTEN', NULL, NULL, NULL),
(63, 58, 'A', 'Chinese Bami met kipfilet', 11.2, 'CHINESE BAMI GERECHTEN', NULL, NULL, NULL),
(64, 58, 'B', 'Chinese Bami met Cha Sieuw-vlees', 12.2, 'CHINESE BAMI GERECHTEN', NULL, NULL, NULL),
(65, 58, 'C', 'Chinese Bami met garnalen', 15.8, 'CHINESE BAMI GERECHTEN', NULL, NULL, NULL),
(66, 58, 'D', 'Chinese Bami met ossenhaas', 17.4, 'CHINESE BAMI GERECHTEN', NULL, NULL, NULL),
(67, NULL, 'M1', 'Bami of Nasi Rames Ling Fa', 15.3, 'INDISCHE GERECHTEN', 'Babi Pangan, Foe Yong Hai, Daging Roedjak, Atjar en kippootje', NULL, NULL),
(68, NULL, 'M2', 'Bami of Nasi Rames', 8.8, 'INDISCHE GERECHTEN', NULL, NULL, NULL),
(69, NULL, 'M3', 'Bami of Nasi Rames speciaal', 10.8, 'INDISCHE GERECHTEN', NULL, NULL, NULL),
(70, NULL, 'M4', 'Gado Gado', 7.6, 'INDISCHE GERECHTEN', 'met witte rijst', NULL, NULL),
(71, NULL, 'M5', 'Daging Smoor', 13.3, 'INDISCHE GERECHTEN', 'met witte rijst', NULL, NULL),
(72, NULL, 'M6', 'Daging Roedjak', 13.3, 'INDISCHE GERECHTEN', 'met witte rijst', NULL, NULL),
(73, 59, NULL, 'Foe Yong Hai Ling Fa', 16.4, 'EIERGERECHTEN (met witte rijst)', 'ossenhaas, garnalen en kipfilet', NULL, NULL),
(74, 60, NULL, 'Foe Yong Hai met varkensvlees', 8.8, 'EIERGERECHTEN (met witte rijst)', NULL, NULL, NULL),
(75, 61, NULL, 'Foe Yong Hai met kipfilet', 9.2, 'EIERGERECHTEN (met witte rijst)', NULL, NULL, NULL),
(76, 62, NULL, 'Foe Yong Hai met garnalen', 15.3, 'EIERGERECHTEN (met witte rijst)', NULL, NULL, NULL),
(77, 63, NULL, 'Foe Yong Hai met krab', 15.3, 'EIERGERECHTEN (met witte rijst)', NULL, NULL, NULL),
(78, 63, 'A', 'Foe Yong Hai met Cha Sieuw Vlees', 11.2, 'EIERGERECHTEN (met witte rijst)', NULL, NULL, NULL),
(79, 63, 'B', 'Foe Yong Hai met ossenhaas', 16.4, 'EIERGERECHTEN (met witte rijst)', NULL, NULL, NULL),
(80, 64, NULL, 'Tjap Tjoy Ling Fa', 16.4, 'GROENTEN GERECHTEN (met witte rijst)', 'ossenhaas, garnalen en kipfilet', NULL, NULL),
(81, 65, NULL, 'Tjap Tjoy met varkensvlees', 8.8, 'GROENTEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(82, 66, NULL, 'Tjap Tjoy met kipfilet', 9.2, 'GROENTEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(83, 67, NULL, 'Tjap Tjoy met ossenhaas', 16.4, 'GROENTEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(84, 68, NULL, 'Tjap Tjoy met garnalen', 15.3, 'GROENTEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(85, 70, NULL, 'Babi Pangang', 12.2, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(86, 71, NULL, 'Babi Pangang in ketjapsaus', 12.3, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(87, 72, NULL, 'Cha Sieuw', 13.3, 'VLEES GERECHTEN (met witte rijst)', 'rood geroosterd varkensvlees', NULL, NULL),
(88, 73, NULL, 'Cha Sieuw in pikante saus', 13.8, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(89, 74, NULL, 'Geroosterde speenvarken', 13.8, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(90, 75, NULL, 'Koe Loe Yuk', 11.9, 'VLEES GERECHTEN (met witte rijst)', 'bolletjes vlees met zoetzure saus', NULL, NULL),
(91, 76, NULL, 'Varkenshaas met kerriesaus', 11.9, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(92, 77, NULL, 'Varkenshaas met ketjapsaus', 11.9, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(93, 78, NULL, 'Varkenshaas met tomatensaus', 11.9, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(94, 78, 'A', 'Varkenshaas met champignons in knoflooksaus', 11.9, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(95, 78, 'B', 'Varkenshaas met Chinese champignons', 12.2, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(96, 79, NULL, 'Varkenshaas met zwarte bonensaus', 12.2, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(97, 79, 'A', 'Varkenshaas met verse ananas in zoetzure saus', 13.3, 'VLEES GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(98, 79, 'B', 'Yu Sian Yuk', 13.3, 'VLEES GERECHTEN (met witte rijst)', 'varkenshaas met licht zoet pikante kruiden saus', NULL, NULL),
(99, 79, 'C', 'SzeChuan Yuk', 13.3, 'VLEES GERECHTEN (met witte rijst)', 'varkenshaas met pittige kruiden saus', NULL, NULL),
(100, 80, NULL, 'Ajam Pangang', 13, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(101, 81, NULL, 'Ajam Pangang in ketjapsaus', 13, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(102, 82, NULL, 'Koe Loe Kai', 13, 'KIP GERECHTEN (met witte rijst)', 'bolletjes kip met zoetzure saus', NULL, NULL),
(103, 83, NULL, 'Kipfilet met kerriesaus', 13, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(104, 84, NULL, 'Kipfilet met champignons in knoflooksaus', 13, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(105, 85, NULL, 'Kipfilet met tomatensaus', 13, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(106, 86, NULL, 'Kipfilet met ketjapsaus', 13, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(107, 87, NULL, 'Kipfilet met broccoli in knoflooksaus', 13.3, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(108, 88, NULL, 'Kipfilet met Chinese champignons', 13.3, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(109, 89, NULL, 'Kipfilet met zwarte pepersaus', 13.3, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(110, 90, NULL, 'Kipfilet met verse ananas in zoetzure saus', 13.3, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(111, 91, NULL, 'Kipfilet met zwarte pepersaus', 13.3, 'KIP GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(112, 92, NULL, 'Tjieuw Yem Kai', 13.3, 'KIP GERECHTEN (met witte rijst)', 'licht gebraden kipfilet met zout en peper', NULL, NULL),
(113, 93, NULL, 'Yao Koe Kai', 13.3, 'KIP GERECHTEN (met witte rijst)', 'kipfilet met cashewnoten in licht pikante saus', NULL, NULL),
(114, 94, NULL, 'Lychee Kai', 13.8, 'KIP GERECHTEN (met witte rijst)', 'licht gebraden kipfilet met lychee in zoetzure saus', NULL, NULL),
(115, 95, NULL, 'Yu Sian Kai', 13.3, 'KIP GERECHTEN (met witte rijst)', 'kipfilet met licht zoet pikante kruidensaus', NULL, NULL),
(116, 96, NULL, 'Sze Chuan Kai', 13.8, 'KIP GERECHTEN (met witte rijst)', 'kipfilet met pittige kruidensaus', NULL, NULL),
(117, 97, NULL, 'Kung Bao Kai', 13.8, 'KIP GERECHTEN (met witte rijst)', 'kipfilet met cashewnoten in pittige saus', NULL, NULL),
(118, 98, NULL, 'Garnalen met champignons in knoflooksaus', 15.9, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(119, 99, NULL, 'Garnalen met tomatensaus', 15.9, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(120, 100, NULL, 'Garnalen met ketjapsaus', 15.9, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(121, 101, NULL, 'Garnalen met broccoli', 16.1, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(122, 102, NULL, 'Garnalen met Chinese champignons', 16.1, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(123, 103, NULL, 'Garnalen met kerriesaus', 16.1, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(124, 104, NULL, 'Garnalen met zwarte bonensaus', 16.1, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(125, 105, NULL, 'Garnalen met zwarte pepersaus', 16.1, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(126, 106, NULL, 'Garnalen met chilisaus', 16.1, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(127, 107, NULL, 'Yu Sian Haa', 16.1, 'GARNALEN GERECHTEN (met witte rijst)', 'garnalen met licht zoet pikante kruidensaus', NULL, NULL),
(128, 108, NULL, 'Tjieuw Yem Haa', 16.1, 'GARNALEN GERECHTEN (met witte rijst)', 'licht gebraden garnalen met zout en peper', NULL, NULL),
(129, 109, NULL, 'Tja Tai Haa', 16.1, 'GARNALEN GERECHTEN (met witte rijst)', 'krokant gebakken garnalen', NULL, NULL),
(130, 110, NULL, 'Sze Chuan Haa', 16.4, 'GARNALEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(131, 111, NULL, 'Ossenhaas met chanpignons in knoflooksaus', 16.9, 'OSSENHAAS GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(132, 112, NULL, 'Ossenhaas met tomatensaus', 16.9, 'OSSENHAAS GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(133, 113, NULL, 'Ossenhaas met ketjapsaus', 16.9, 'OSSENHAAS GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(134, 114, NULL, 'Ossenhaas met broccoli', 17.1, 'OSSENHAAS GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(135, 115, NULL, 'Ossenhaas met Chinese champignons', 17.1, 'OSSENHAAS GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(136, 116, NULL, 'Ossenhaas met kerriesaus', 17.1, 'OSSENHAAS GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(137, 117, NULL, 'Ossenhaas met zwarte bonensaus', 17.1, 'OSSENHAAS GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(138, 118, NULL, 'Ossenhaas met zwarte pepersaus', 17.1, 'OSSENHAAS GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(139, 119, NULL, 'Yu Sian Ngau Yuk', 17.1, 'OSSENHAAS GERECHTEN (met witte rijst)', 'ossenhaas met licht zoet pikante kruidensaus', NULL, NULL),
(140, 120, NULL, 'Sze Chuan Ngau Yuk', 17.4, 'OSSENHAAS GERECHTEN (met witte rijst)', 'ossenhaas met pittige kruidensaus', NULL, NULL),
(141, 121, NULL, 'Visfilet met kerriesaus', 14.5, 'VISSEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(142, 122, NULL, 'Visfilet met oestersaus', 14.5, 'VISSEN GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(143, 123, NULL, 'Visfilet met zoetzure saus', 14.5, 'VISSEN GERECHTEN (met witte rijst)', 'licht gebraden visfilet in zoete pikante saus', NULL, NULL),
(144, 124, NULL, 'Hong Shau Yu', 14.5, 'VISSEN GERECHTEN (met witte rijst)', 'licht gebraden visfilet in zoete pikante saus', NULL, NULL),
(145, 125, NULL, 'Tjeuw Yem Yu', 15, 'VISSEN GERECHTEN (met witte rijst)', 'licht gebraden visfilet met zout en peper', NULL, NULL),
(146, 126, NULL, 'San Sching Po', 16.1, 'VISSEN GERECHTEN (met witte rijst)', 'visfilet, garnalen, krab en groenten in knoflooksaus', NULL, NULL),
(147, NULL, 'P1', 'Geroosterde Peking Eend', 16.6, 'PEKING EEND GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(148, NULL, 'P2', 'Peking Eend met verse ananas in zoetzure saus', 17.1, 'PEKING EEND GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(149, NULL, 'P3', 'Peking Eend met Chinese champignons in oestersaus', 17.1, 'PEKING EEND GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(150, NULL, 'P4', 'Yu Sian Ya', 17.1, 'PEKING EEND GERECHTEN (met witte rijst)', 'peking eend met licht zoet pikante kruidensaus', NULL, NULL),
(151, NULL, 'T1', 'Tiepan Ling Fa', 17.9, 'TIEPAN SPECIALITEITEN (met witte rijst)', 'garnalen, kipfilet, ossenhaas en groenten in zwarte pepersaus', NULL, NULL),
(152, NULL, 'T2', 'Tiepan Kai', 15.3, 'TIEPAN SPECIALITEITEN (met witte rijst)', 'licht gebraden kipfilet en groenten met zoet pikante saus', NULL, NULL),
(153, NULL, 'T3', 'Tiepan San Yuk', 17.1, 'TIEPAN SPECIALITEITEN (met witte rijst)', 'lichtgrbaden varkenshaas, kipfilet, ossenhaas en groenten met zoet pikante saus', NULL, NULL),
(154, NULL, 'T4', 'Tiepan Haa', 17.4, 'TIEPAN SPECIALITEITEN (met witte rijst)', 'garnalen en groenten met zoet pikante saus', NULL, NULL),
(155, NULL, 'T5', 'Tiepan Ngau Yuk', 19.5, 'TIEPAN SPECIALITEITEN (met witte rijst)', '5st. ossenhaas en groenten met zoet pikante saus', NULL, NULL),
(156, NULL, 'V4', 'Tau Fu Po', 15.3, 'TIEPAN SPECIALITEITEN (met witte rijst)', 'sojakaas, cha sieuw garnalen en chinese paddenstoelen', NULL, NULL),
(157, NULL, 'V1', 'Vegetarische Tjap Tjoy', 8.3, 'VEGETARISCHE GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(158, NULL, 'V2', 'Lo Han Zhai', 11.2, 'VEGETARISCHE GERECHTEN (met witte rijst)', 'sojakaas, Chinese paddenstoelen en groenten in knoflooksaus', NULL, NULL),
(159, NULL, 'V3', 'Vegetarische Foe Yong Hai', 8.3, 'VEGETARISCHE GERECHTEN (met witte rijst)', NULL, NULL, NULL),
(160, NULL, 'K1', 'Frites, saté (2st.) en ei', 6.5, 'KINDERMENUS', NULL, NULL, '2024-06-16 18:36:27'),
(161, NULL, 'K2', 'Frites, kippootje en ei', 6.5, 'KINDERMENUS', NULL, NULL, NULL),
(162, NULL, 'K3', 'Frites, mini loempia (2st.) en ei', 6.5, 'KINDERMENUS', NULL, NULL, NULL),
(163, NULL, 'K4', 'Kinder Bami of Nasi met saté (2st.) en ei', 6.5, 'KINDERMENUS', NULL, NULL, '2024-06-16 18:36:35'),
(164, NULL, 'R1', 'Indische rijsttafel (voor 1 persoon)', 16.4, 'RIJSTTAFELS', 'Gado gado, Foe Yong Hai, sat&eacute;, Daging Roedjak, Daging Smoor, Ajam Ketjap, Atjar, Pisang Goreng, Pindas en Cocos', NULL, NULL),
(165, NULL, 'R2', 'Indische rijsttafel<br>Vanaf 2 personen... Per persoon', 15, 'RIJSTTAFELS', 'Ajam Ketjap, Gado Gado, Daging Smoor, Kroepoek, Daging Roedjak, Foe Yong Hai, Sat&eacute;, Sambal Goreng Boontjes, Sambal Goreng Kering, Atjar, Pisang Goreng, Pinda en Cocos', NULL, NULL),
(167, NULL, 'R3', 'Chinese Indische Rijsttafel<br>Vanaf 4 personen... per persoon', 16.5, 'RIJSTTAFELS', 'Foe Yong Hai, Babi Pangang, Tjap Tjoy, Koe Loe Yuk, Ajam Ketjap, Daging Smoor, Daging Roedjak, Sat&eacute;, Ei, Kroepoek, Sambal Goeren boontjes, Atjar, Pisang Goreng, Pinda en Cocos', NULL, NULL),
(168, NULL, 'R4', 'Chinese Rijsttafel<br>Vanaf 2 personen... per persoon', 17, 'RIJSTTAFELS', 'Kippen- of Tomatensoep, Tjap Tjoy met kipfilet, Koe Loe Yuk, Gebakken garnalen, Babi Pangang, Foe Yong Hai, sat&eacute;, kroepoek', NULL, NULL),
(169, NULL, 'R5', 'Kantones Rijsttafel<br>Vanaf 2 personen... per persoon', 23, 'RIJSTTAFELS', 'Wan Tan soep, Chinese Dim Sum (mini loempia, kerrie ko, pangsit goreng, garnalen, pasteitje), Geroosterde Peking Eend, Lychee Kai (licht gebraden kipfilet met lychee in zoetzure saus), Tau Sie Haa (garnalen met zwarte bonensaus)', NULL, NULL),
(170, NULL, 'R6', 'Sze Chuan Rijsttafel<br>Vanaf 2 personen... per persoon', 23, 'RIJSTTAFELS', 'Peking Soep (pittige lichtzure soep), Chinese Dim Sum (mini loempia, kerrie ko, pangsit goreng, garnalen, pastei(tje), Tjieuw Yem Kai (licht gebakken kipfilet met zout en peper), Lychee Yuk (licht gebraden varkensvlees met lychee in zoetzure saus), Yu Sian Ngau Yuk (ossenhaas met licht zoet pikante kruiden saus)', NULL, NULL),
(171, NULL, NULL, 'Buffet Menu A, per persoon', 12.8, 'BUFFET', 'Mini Loempia\'s, Pisang Goreng, Babi Pangang, Koe Loe Yuk, Foe Yong Hai, Kipfilet met zwarte bonensaus, Tjap Tjoy met kipfilet, sat&eacute; Ajam', NULL, NULL),
(172, NULL, NULL, 'Buffet Menu B, per persoon', 15, 'BUFFET', 'Mini Loempia\'s, Pisang Goreng, Babi Pangang, Foe Yong Hai, Kung Bao Kai, Hong Shau Yu, sat&eacute; Ajam, Ossenhaas met zwarte bonensaus, Kipfilet met kerriesaus', NULL, NULL),
(173, NULL, NULL, 'Bami of Nasi Goreng ipv rijst', 0.9, 'DIVERSEN', NULL, NULL, NULL),
(174, NULL, NULL, 'Mihoen Goreng ipv rijst', 2.5, 'DIVERSEN', NULL, NULL, NULL),
(175, NULL, NULL, 'Chinese Bami ipv rijst', 2.5, 'DIVERSEN', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
