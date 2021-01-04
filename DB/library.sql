-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 09:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `jurisdiction` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(500) NOT NULL,
  `year_publication` year(4) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `volume_number` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `book_title` varchar(500) DEFAULT 'لا يوجد عنوان',
  `the_main_domain` varchar(100) NOT NULL,
  `subdomain` varchar(100) NOT NULL,
  `history_system_m` varchar(100) NOT NULL,
  `accreditation` varchar(500) NOT NULL,
  `date_publication_m` varchar(100) NOT NULL,
  `adjustments` varchar(100) NOT NULL,
  `accessories` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `section_id` int(11) NOT NULL,
  `file` varchar(500) DEFAULT NULL,
  `main_section` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `dis` varchar(1000) NOT NULL,
  `history_system_h` date NOT NULL,
  `date_publication_h` date NOT NULL,
  `mini` varchar(500) NOT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `interview` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `court` varchar(500) NOT NULL,
  `issuer` varchar(500) NOT NULL,
  `pronounced_judgment` varchar(500) NOT NULL,
  `referee_number` varchar(500) NOT NULL,
  `issue_classification` varchar(500) NOT NULL,
  `sub-classification` varchar(500) NOT NULL,
  `summary_of_judgment` varchar(500) NOT NULL,
  `sentencing_text` varchar(500) NOT NULL,
  `the_reasons` varchar(500) NOT NULL,
  `the_legal_bond` varchar(500) NOT NULL,
  `appeal_decision` varchar(500) DEFAULT NULL,
  `ruling_year` varchar(100) NOT NULL,
  `legislative_type` varchar(500) NOT NULL,
  `legislative_status` varchar(500) NOT NULL,
  `material_number_legislation` varchar(500) NOT NULL,
  `legislation_number` varchar(500) NOT NULL,
  `decision` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `jurisdiction`, `author`, `publisher`, `year_publication`, `subject`, `volume_number`, `year`, `book_title`, `the_main_domain`, `subdomain`, `history_system_m`, `accreditation`, `date_publication_m`, `adjustments`, `accessories`, `pass`, `section_id`, `file`, `main_section`, `url`, `dis`, `history_system_h`, `date_publication_h`, `mini`, `pdf`, `interview`, `country`, `city`, `court`, `issuer`, `pronounced_judgment`, `referee_number`, `issue_classification`, `sub-classification`, `summary_of_judgment`, `sentencing_text`, `the_reasons`, `the_legal_bond`, `appeal_decision`, `ruling_year`, `legislative_type`, `legislative_status`, `material_number_legislation`, `legislation_number`, `decision`) VALUES
(129, '', '', '', '', 0000, '', 0, 0000, 'test1', '', '', '', '', '', '', '', '', 166, NULL, 35, '', '', '0000-00-00', '0000-00-00', '', NULL, '', '125', '', '', '', '', '', '', '', '', '', '', '', NULL, '', 'النوع الاول', 'الحالة الاولى', '3', '', ''),
(130, '', '', '', '', 0000, '', 0, 0000, 'test2', '', '', '', '', '', '', '', '', 166, NULL, 35, '', '', '0000-00-00', '0000-00-00', '', NULL, '', '18', '', '', '', '', '', '', '', '', '', '', '', NULL, '', 'النوع الاول', 'الحالة الاولى', '4', '', ''),
(131, '', '', '', '', 0000, '', 0, 0000, 'test3', '', '', '', '', '', '', '', '', 166, NULL, 35, '', '', '0000-00-00', '0000-00-00', '', NULL, '', '18', '', '', '', '', '', '', '', '', '', '', '', NULL, '', 'النوع الاول', 'الحالة الاولى', '5', '', ''),
(132, '', '', '', '', 0000, '', 0, 0000, '', '', '', '', '', '', '', '', '', 131, NULL, 31, '', '', '0000-00-00', '0000-00-00', '', NULL, '', '', '', 'محكمة الاستئناف', 'الجهة الاولى', 'قابل', '', 'تصنيف أول', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(133, '', '', '', '', 0000, '', 0, 0000, 'baraa', '', '', '', '', '', '', '', '', 132, NULL, 31, '', '', '0000-00-00', '0000-00-00', '', NULL, '', '4', '438', 'محكمة الاستئناف', 'الجهة الاولى', 'قابل', '', 'تصنيف أول', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(134, '', '', '', '', 0000, '', 3, 0000, 'rtyrtyrtyrtyrty', '', '', '', '', '', '', '', '', 134, NULL, 31, 'https://www.youtube.com/', '', '0000-00-00', '0000-00-00', '', NULL, '', '169', '37', 'محكمة الاستئناف', 'الجهة الثانية', 'قابل', '', ' تصنيف ثاني', '', '<p>sdfsdfsdf</p>', '<p>dfgdfg</p>', '<p>dfg</p>', '<p>dfgdfgdf</p>', NULL, '12-01-2021', '', '', '', '', '444dfdfgdfg'),
(135, '', '', '', '', 0000, '', 0, 0000, '', '', '', '', '', '', '', '', '', 132, NULL, 31, '', '', '0000-00-00', '0000-00-00', '', NULL, '', '', '', 'محكمة الاستئناف', 'الجهة الاولى', 'قابل', '', 'تصنيف أول', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(136, '', '', '', '', 0000, '', 0, 0000, '', '', '', '', '', '', '', '', '', 135, NULL, 31, '', '', '0000-00-00', '0000-00-00', '', NULL, '', '', '', 'محكمة الاستئناف', 'الجهة الاولى', 'قابل', '', 'تصنيف أول', '', '', '', '', '', NULL, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book_tag`
--

CREATE TABLE `book_tag` (
  `book_tag_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_tag`
--

INSERT INTO `book_tag` (`book_tag_id`, `book_id`, `tag_id`) VALUES
(1053, 887, 353),
(1054, 888, 353),
(1055, 889, 353),
(1056, 890, 353),
(1057, 891, 353),
(1058, 892, 353),
(1059, 893, 353),
(1060, 894, 353),
(1061, 895, 353),
(1062, 896, 353),
(1063, 897, 353),
(1064, 898, 353),
(1065, 899, 353),
(1066, 900, 353),
(1067, 901, 353),
(1068, 902, 353),
(1069, 903, 353),
(1070, 904, 353),
(1071, 905, 353),
(1072, 906, 353),
(1073, 907, 353),
(1074, 908, 353),
(1075, 909, 353),
(1076, 910, 353),
(1077, 911, 353),
(1078, 912, 353),
(1079, 913, 353),
(1080, 914, 353),
(1081, 915, 353),
(1082, 916, 353),
(1083, 917, 353),
(1084, 918, 353),
(1085, 919, 353),
(1086, 920, 353),
(1087, 921, 353),
(1088, 922, 353),
(1089, 923, 353),
(1090, 924, 353),
(1091, 925, 353),
(1092, 926, 353),
(1093, 927, 353),
(1094, 928, 353),
(1097, 931, 353),
(1098, 932, 353),
(1099, 933, 353),
(1100, 934, 353),
(1101, 935, 353),
(1105, 939, 353),
(1106, 1, 353),
(1107, 2, 353),
(1108, 3, 353),
(1109, 4, 353),
(1110, 5, 353),
(1111, 6, 353),
(1112, 7, 353),
(1113, 8, 353),
(1114, 9, 353),
(1115, 10, 353),
(1116, 11, 353),
(1118, 13, 353),
(1119, 14, 353),
(1120, 15, 353),
(1122, 17, 353),
(1123, 18, 353),
(1124, 19, 353),
(1125, 20, 353),
(1126, 21, 353),
(1127, 22, 353),
(1128, 23, 353),
(1129, 24, 353),
(1130, 25, 353),
(1131, 26, 353),
(1132, 27, 353),
(1133, 28, 353),
(1134, 29, 353),
(1135, 30, 353),
(1136, 31, 353),
(1137, 32, 353),
(1138, 33, 353),
(1139, 34, 353),
(1140, 35, 353),
(1141, 36, 353),
(1142, 37, 353),
(1143, 38, 353),
(1144, 39, 353),
(1145, 40, 353),
(1146, 41, 353),
(1147, 42, 353),
(1148, 43, 353),
(1149, 44, 353),
(1153, 48, 353),
(1154, 49, 353),
(1155, 50, 353),
(1156, 51, 353),
(1157, 52, 353),
(1158, 53, 353),
(1159, 54, 353),
(1160, 55, 353),
(1161, 56, 353),
(1162, 57, 353),
(1163, 58, 353),
(1164, 59, 353),
(1165, 60, 353),
(1166, 61, 353),
(1167, 62, 353),
(1168, 63, 353),
(1169, 64, 353),
(1170, 65, 353),
(1171, 66, 353),
(1172, 67, 353),
(1173, 68, 353),
(1174, 69, 353),
(1175, 70, 353),
(1176, 71, 353),
(1177, 72, 353),
(1178, 73, 353),
(1179, 74, 353),
(1180, 75, 353),
(1181, 76, 353),
(1182, 77, 353),
(1183, 78, 353),
(1184, 79, 353),
(1185, 80, 353),
(1186, 81, 353),
(1187, 82, 353),
(1188, 83, 353),
(1189, 84, 353),
(1190, 85, 353),
(1191, 86, 353),
(1192, 87, 353),
(1193, 88, 353),
(1194, 89, 353),
(1195, 90, 353),
(1196, 91, 353),
(1199, 94, 353),
(1200, 95, 353),
(1201, 96, 353),
(1202, 97, 353),
(1203, 98, 353),
(1204, 99, 353),
(1207, 102, 353),
(1209, 104, 353),
(1210, 105, 353),
(1211, 106, 353),
(1212, 107, 353),
(1213, 108, 353),
(1214, 109, 353),
(1215, 110, 353),
(1216, 111, 353),
(1217, 112, 353),
(1218, 113, 353),
(1219, 114, 353),
(1220, 115, 353),
(1221, 116, 353),
(1222, 117, 353),
(1223, 118, 353),
(1224, 119, 353),
(1225, 120, 353),
(1226, 121, 353),
(1227, 122, 353),
(1228, 123, 353),
(1229, 124, 353),
(1230, 125, 353),
(1231, 126, 353),
(1232, 127, 353),
(1233, 128, 353),
(1234, 129, 353),
(1235, 130, 353),
(1236, 131, 353),
(1237, 132, 353),
(1238, 133, 353),
(1239, 134, 354),
(1240, 135, 353),
(1241, 136, 353);

-- --------------------------------------------------------

--
-- Table structure for table `case_law_system`
--

CREATE TABLE `case_law_system` (
  `id` int(11) NOT NULL,
  `case_law_id` int(11) NOT NULL,
  `system_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_law_system`
--

INSERT INTO `case_law_system` (`id`, `case_law_id`, `system_id`) VALUES
(76, 105, 111),
(77, 106, 112),
(78, 106, 113);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` char(100) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `country_id`) VALUES
(1, 'مقديشو', 204),
(2, 'الرياض', 194),
(3, 'الدمام', 194),
(4, 'الخبر', 194),
(5, 'الظهران', 194),
(6, 'الجبيل', 194),
(7, 'جدة', 194),
(8, 'مكة', 194),
(9, 'المدينة المنورة', 194),
(10, 'الطائف', 194),
(11, 'حفر الباطن', 194),
(12, 'الهفوف', 194),
(13, 'ينبع', 194),
(14, 'تبوك', 194),
(15, 'القصيم', 194),
(16, 'حائل', 194),
(17, 'ابها', 194),
(18, 'الباحة', 194),
(19, 'جازان', 194),
(20, 'نجران', 194),
(21, 'الجوف', 194),
(22, 'عرعر', 194),
(23, 'دبي', 228),
(24, 'ابو ظبي', 228),
(25, 'راس الخيمة', 228),
(26, 'عجمان', 228),
(27, 'العين', 228),
(28, 'ام القيوين', 228),
(29, 'المنامة', 18),
(30, 'الدوحة', 179),
(31, 'مسقط', 166),
(32, 'صلالة', 166),
(33, 'طرابلس', 125),
(34, 'بغداد', 105),
(35, 'عمان', 113),
(36, 'اربد', 113),
(37, 'القدس', 169),
(38, 'بيروت', 122),
(39, 'طرابلس', 122),
(40, 'صيدا', 122),
(287, 'القاهرة', 66),
(288, 'الاسكندرية', 66),
(289, 'المنصورة', 66),
(290, 'اسوان', 66),
(291, 'شرم الشيخ', 66),
(292, 'الفيوم', 66),
(293, 'سوهاج', 66),
(294, 'المنيا', 66),
(295, 'بني سويف', 66),
(296, 'طنطا', 66),
(297, 'اسيوط', 66),
(298, 'الاقصر', 66),
(299, 'بن غازي', 125),
(300, 'سرت', 125),
(301, 'مصراتة', 125),
(302, 'زوارة', 125),
(303, 'اوباري', 125),
(304, 'الخمس', 125),
(305, 'الزنتان', 125),
(306, 'المرج', 125),
(307, 'انتصار', 125),
(308, 'زليتن', 125),
(309, 'سبها', 125),
(310, 'صبراتة', 125),
(311, 'طبرق', 125),
(312, 'غريان', 125),
(313, 'بنت جبيل', 122),
(314, 'زحلة', 122),
(315, 'عكار', 122),
(316, 'صور', 122),
(317, 'الريان', 179),
(318, 'مصايد', 179),
(319, 'دخان', 179),
(320, 'راس لفان', 179),
(321, 'لوسيل', 179),
(322, 'الخور', 179),
(323, 'حيفا', 169),
(324, 'رام الله', 169),
(325, 'رفح', 169),
(326, 'غزة', 169),
(327, 'نابلس', 169),
(328, 'ادم', 166),
(329, 'نزوى', 166),
(330, 'صور', 166),
(331, 'صحار', 166),
(332, 'الرستاق', 166),
(333, 'دمشق', 217),
(334, 'حمص', 217),
(335, 'حلب', 217),
(336, 'الحسكة', 217),
(337, 'ادلب', 217),
(338, 'الرقة', 217),
(339, 'القامشلي', 217),
(340, 'اللاذقية', 217),
(341, 'حماه', 217),
(342, 'درعا', 217),
(343, 'دير الزور', 217),
(344, 'طرطوس', 217),
(345, 'صفاقس', 227),
(346, 'تونس', 227),
(347, 'سوسة', 227),
(348, 'القيروان', 227),
(349, 'استنبول', 222),
(350, 'ازمير', 222),
(351, 'انقرة', 222),
(352, 'انطاكية', 222),
(353, 'مرسين', 222),
(354, 'عازي عنتاب', 222),
(355, 'صنعاء', 248),
(356, 'تعز', 248),
(357, 'عدن', 248),
(358, 'اب', 248),
(359, 'نيويورك', 230),
(360, 'واشنطن', 230),
(361, 'لندن', 229),
(362, 'كازابلانكا', 149),
(363, 'مراكش', 149),
(364, 'برلين', 80),
(365, 'شتوتغارت', 80),
(366, 'الكويت', 118),
(367, 'الجهراء', 118),
(368, 'الفروانية', 118),
(369, 'حولي', 118),
(370, 'مبارك الكبير', 118),
(371, 'الاحمدي', 118),
(372, 'كركوك', 105),
(373, 'اربيل', 105),
(374, 'الفلوجة', 105),
(375, 'الرمادي', 105),
(376, 'ستوكهولم', 210),
(377, 'الخرطوم', 211),
(378, 'عنابة', 4),
(379, 'الجزائر', 4),
(380, 'المحرق', 18),
(381, 'الشارقة', 228),
(384, 'كوالالمبور', 133),
(385, 'الفجيرة', 228),
(386, 'تورونتو', 38),
(387, 'نواكشوط', 139),
(388, 'الاحساء', 194),
(389, 'خورفكان', 228),
(390, 'الزرقاء', 113),
(391, 'الرصيفة', 113),
(392, 'القويسمة', 113),
(393, 'وادي السير', 113),
(394, 'العقبة', 113),
(395, 'الرمثا', 113),
(396, 'القليوبية', 66),
(397, 'الجيزة', 66),
(398, 'البحيرة', 66),
(399, 'مطروح', 66),
(400, 'دمياط', 66),
(401, 'الدقهلية', 66),
(402, 'كفر الشيخ', 66),
(403, 'الغربية', 66),
(404, 'المنوفية', 66),
(405, 'الشرقية', 66),
(406, 'بور سعيد', 66),
(407, 'السويس', 66),
(408, 'قنا', 66),
(409, 'الاسماعيلية', 66),
(410, 'البحر الاحمر/الغردقة', 66),
(411, 'شمال سيناء', 66),
(412, 'جنوب سيناء', 66),
(413, 'ريف دمشق', 217),
(414, 'السويداء', 217),
(415, 'القنيطرة', 217),
(416, 'الرباط', 149),
(417, 'اغادير', 149),
(418, 'طنجة', 149),
(419, 'وجدة', 149),
(420, 'فاس', 149),
(421, 'مكناس', 149),
(422, 'الحسيمة-تازة', 149),
(423, 'القنيطرة', 149),
(424, 'سطات', 149),
(425, 'آسفي', 149),
(426, 'تطوان', 149),
(427, 'تبسة', 149),
(428, 'وهران', 4),
(429, 'قسنطينة', 4),
(430, 'تلمسان', 4),
(431, 'سطيف', 4),
(432, 'بيجاية', 4),
(433, 'بسكرة', 4),
(434, 'جيجل', 4),
(435, 'غرداية', 4),
(436, 'سكيكدة', 4),
(437, 'الجلفة', 4),
(438, 'باتنة', 4),
(439, 'سيدي بلعباس', 4),
(440, 'الشلف', 4),
(441, 'مستغانم', 4),
(442, 'الخرج', 194),
(443, 'سكاكا', 194),
(444, 'بريدة', 194),
(445, 'خميس مشيط', 194),
(446, 'عنيزة', 194),
(447, 'الدوادمي', 194),
(448, 'الزلفي', 194),
(449, 'القطيف', 194),
(450, 'بيشة', 194),
(451, 'القنفذة', 194),
(452, 'المجمعة', 194),
(453, 'الرفاع', 18),
(454, 'سترة', 18),
(455, 'مدينة عيسى', 18),
(456, 'مدينة زايد', 18),
(457, 'الزلاق', 18);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(250) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(4, 'الجزائر'),
(18, 'البحرين'),
(66, 'مصر'),
(105, 'العراق'),
(113, 'الأردن'),
(118, 'الكويت'),
(122, 'لبنان'),
(125, 'ليبيا'),
(139, 'موريتانيا'),
(149, 'المغرب'),
(166, 'سلطنة عمان'),
(169, 'فلسطين'),
(179, 'قطر'),
(194, 'السعودية'),
(204, 'الصومال'),
(211, 'السودان'),
(217, 'سوريا'),
(227, 'تونس');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(11) NOT NULL,
  `field_label` varchar(500) NOT NULL,
  `field_type` varchar(500) NOT NULL,
  `options` varchar(500) NOT NULL,
  `section_id` int(11) NOT NULL,
  `requered` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `field_label`, `field_type`, `options`, `section_id`, `requered`) VALUES
(1, 'Baraa', 'input', '', 31, ''),
(2, 'eeeee', 'input', '', 31, 'required'),
(3, 'gggggggggggggggg', 'input', '', 31, 'requered'),
(4, 'uuuuu', 'input', '', 31, 'required');

-- --------------------------------------------------------

--
-- Table structure for table `fields_values`
--

CREATE TABLE `fields_values` (
  `id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` varchar(500) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fields_values`
--

INSERT INTO `fields_values` (`id`, `field_id`, `value`, `book_id`) VALUES
(1, 1, '', 132),
(2, 1, '', 133),
(3, 1, 'vbgdfg', 134),
(4, 1, '', 135),
(5, 2, '', 135),
(6, 3, '', 135),
(7, 1, '', 136),
(8, 2, '', 136),
(9, 3, '', 136);

-- --------------------------------------------------------

--
-- Table structure for table `linked_case_law`
--

CREATE TABLE `linked_case_law` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `linked_case_law`
--

INSERT INTO `linked_case_law` (`id`, `case_id`) VALUES
(105, 132),
(106, 133);

-- --------------------------------------------------------

--
-- Table structure for table `linked_system`
--

CREATE TABLE `linked_system` (
  `id` int(11) NOT NULL,
  `linked_system_id` int(11) NOT NULL,
  `material_number_legislation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `linked_system`
--

INSERT INTO `linked_system` (`id`, `linked_system_id`, `material_number_legislation`) VALUES
(111, 129, 3),
(112, 129, 3),
(113, 130, 5);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(11) NOT NULL,
  `material_number` varchar(500) NOT NULL,
  `description` mediumtext NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `material_number`, `description`, `book_id`) VALUES
(989, '', '', 887),
(990, '', '', 888),
(991, '', '', 889),
(992, '', '', 890),
(993, '', '', 891),
(994, '', '', 892),
(995, '', '', 893),
(996, '', '', 894),
(997, '', '', 895),
(998, '', '', 896),
(999, '', '', 897),
(1000, '', '', 898),
(1001, '', '', 899),
(1002, '', '', 900),
(1003, '', '', 901),
(1004, '', '', 902),
(1005, '', '', 903),
(1006, '', '', 904),
(1007, '', '', 905),
(1008, '', '', 906),
(1009, '', '', 907),
(1010, '', '', 908),
(1011, '', '', 909),
(1012, '', '', 910),
(1013, '', '', 911),
(1014, '', '', 912),
(1015, '', '', 913),
(1016, '', '', 914),
(1017, '', '', 915),
(1018, '', '', 916),
(1019, '', '', 917),
(1020, '', '', 918),
(1021, '', '', 919),
(1022, '', '', 920),
(1023, '', '', 921),
(1024, '', '', 922),
(1025, '', '', 923),
(1026, '', '', 924),
(1027, '', '', 925),
(1028, '', '', 926),
(1029, '', '', 927),
(1030, '', '', 928),
(1033, '', '', 931),
(1034, '', '', 932),
(1035, '', '', 933),
(1036, '', '', 934),
(1037, '', '', 935),
(1041, '', '', 939),
(1042, '', '', 1),
(1043, '', '', 2),
(1044, '', '', 3),
(1045, '', '', 4),
(1046, '', '', 5),
(1047, '', '', 6),
(1048, '', '', 7),
(1049, '', '', 8),
(1050, '', '', 9),
(1051, '', '', 10),
(1052, '', '', 11),
(1054, '', '', 13),
(1055, '', '', 14),
(1056, '', '', 15),
(1058, '', '', 17),
(1059, '', '', 18),
(1060, '', '', 19),
(1061, '', '', 20),
(1062, '', '', 21),
(1063, '', '', 22),
(1064, '', '', 23),
(1065, '', '', 24),
(1066, '', '', 25),
(1067, '', '', 26),
(1068, '', '', 27),
(1069, '', '', 28),
(1070, '', '', 29),
(1071, '', '', 30),
(1072, '', '', 31),
(1073, '', '', 32),
(1074, '', '', 33),
(1075, '', '', 34),
(1076, '', '', 35),
(1077, '', '', 36),
(1078, '', '', 37),
(1079, '', '', 38),
(1080, '', '', 39),
(1081, '', '', 40),
(1082, '', '', 41),
(1083, '', '', 42),
(1084, '', '', 43),
(1085, '', '', 44),
(1089, '', '', 48),
(1090, '', '', 49),
(1091, '', '', 50),
(1092, '', '', 51),
(1093, '', '', 52),
(1094, '', '', 53),
(1095, '', '', 54),
(1096, '', '', 55),
(1097, '', '', 56),
(1098, '', '', 57),
(1099, '', '', 58),
(1100, '', '', 59),
(1101, '', '', 60),
(1102, '', '', 61),
(1103, '', '', 62),
(1104, '', '', 63),
(1105, '', '', 64),
(1106, '', '', 65),
(1107, '', '', 66),
(1108, '', '', 67),
(1109, '', '', 68),
(1110, '', '', 69),
(1111, '', '', 70),
(1112, '', '', 71),
(1113, '', '', 72),
(1114, '', '', 73),
(1115, '', '', 74),
(1116, '', '', 75),
(1117, '', '', 76),
(1118, '', '', 77),
(1119, '', '', 78),
(1120, '', '', 79),
(1121, '', '', 80),
(1122, '', '', 81),
(1123, '', '', 82),
(1124, '', '', 83),
(1125, '', '', 84),
(1126, '', '', 85),
(1127, '', '', 86),
(1128, '', '', 87),
(1129, '', '', 88),
(1130, '', '', 89),
(1131, '', '', 90),
(1132, '', '', 91),
(1135, '', '', 94),
(1136, '', '', 95),
(1137, '', '', 96),
(1138, '', '', 97),
(1139, '', '', 98),
(1140, '', '  ', 99),
(1143, '', '', 102),
(1145, '', '', 104),
(1146, '', '', 105),
(1147, '', '', 106),
(1148, '', '', 107),
(1149, '', '', 108),
(1150, '', '', 109),
(1151, '', '', 110),
(1152, '', '', 111),
(1153, '', '', 112),
(1154, '', '', 113),
(1155, '', '', 114),
(1156, '', '', 115),
(1157, '', '', 116),
(1158, '', '', 117),
(1159, '', '', 118),
(1160, '', '', 119),
(1161, '', '', 120),
(1162, '', '', 121),
(1163, '', '', 122),
(1164, '', '', 123),
(1165, '', '<p>dfg</p>', 124),
(1166, '', '', 125),
(1167, '', '', 126),
(1168, '', '', 127),
(1169, '', '', 128),
(1170, '', '', 129),
(1171, '', '', 130),
(1172, '', '', 131),
(1173, '', '', 132),
(1174, '', '', 133),
(1175, '', '<p>sdfsfsdf</p>', 134),
(1176, '', '', 135),
(1177, '', '', 136);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_discription` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `parent_id`, `section_discription`) VALUES
(31, 'الأحكام والسوابق القضائية', 0, ''),
(32, 'الأنظمة السعودية', 0, ''),
(33, 'نماذج وعقود', 0, ''),
(34, 'الكتب القانونية والأبحاث', 0, ''),
(35, 'الأنظمة والتشريعات والقوانين', 0, ''),
(129, 'الأحكام والمبادئ الإدارية للأعوام ١٤٠٢-١٤٢٦', 31, ''),
(130, 'المجلد الاول', 129, ''),
(131, 'اختصاص', 130, ''),
(132, 'دعوى', 130, ''),
(133, 'المجلد الثاني', 129, ''),
(134, 'اختصاص', 133, ''),
(135, 'دعوى', 133, ''),
(160, 'نظام التجارة الالكترونية', 32, ''),
(161, 'نظام العمل', 32, ''),
(162, 'نظام الحوافز', 32, ''),
(163, 'نظام المكافئات', 32, ''),
(164, 'العقد الجزئي', 33, ''),
(165, 'البحث السادس', 34, ''),
(166, 'تشريع اول', 35, ''),
(167, 'تشريع  ثاني', 35, '');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(353, ''),
(354, 'll');

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE `version` (
  `version_id` int(11) NOT NULL,
  `version` varchar(1200) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_tag`
--
ALTER TABLE `book_tag`
  ADD PRIMARY KEY (`book_tag_id`);

--
-- Indexes for table `case_law_system`
--
ALTER TABLE `case_law_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields_values`
--
ALTER TABLE `fields_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linked_case_law`
--
ALTER TABLE `linked_case_law`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linked_system`
--
ALTER TABLE `linked_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`version_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `book_tag`
--
ALTER TABLE `book_tag`
  MODIFY `book_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1242;
--
-- AUTO_INCREMENT for table `case_law_system`
--
ALTER TABLE `case_law_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fields_values`
--
ALTER TABLE `fields_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `linked_case_law`
--
ALTER TABLE `linked_case_law`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `linked_system`
--
ALTER TABLE `linked_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1178;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=355;
--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `version_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
