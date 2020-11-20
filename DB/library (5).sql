-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 03:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `ruling_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(901, 726, 323),
(902, 727, 323),
(903, 728, 323),
(904, 729, 323),
(905, 730, 323),
(906, 731, 323),
(907, 732, 323),
(908, 738, 323),
(909, 739, 323),
(910, 742, 323),
(911, 743, 323),
(912, 744, 323),
(913, 745, 323),
(914, 746, 323),
(915, 747, 323),
(916, 751, 323),
(917, 752, 323),
(918, 754, 323),
(919, 755, 323),
(920, 756, 323),
(921, 757, 323),
(922, 758, 323),
(923, 759, 323),
(925, 761, 323),
(926, 762, 323),
(927, 763, 323),
(928, 764, 323),
(929, 765, 323),
(930, 766, 323),
(931, 767, 323),
(932, 768, 323),
(933, 769, 323);

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
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(765, '', '<p>544</p>', 639),
(766, '', '', 640),
(767, '', '<p>678678</p>', 641),
(768, '', '', 644),
(769, '', '', 645),
(770, '', '', 646),
(771, '', '', 653),
(772, '', '', 654),
(773, '', '', 655),
(774, '', '', 659),
(775, '', '', 660),
(776, '', '', 661),
(777, '', '', 662),
(778, '', '', 663),
(779, '', '', 664),
(780, '', '', 665),
(781, '', '', 666),
(782, '', '', 667),
(783, '', '', 668),
(784, '', '', 669),
(785, '', '', 670),
(786, '', '', 671),
(787, '', '', 672),
(788, '', '', 673),
(789, '', '', 674),
(790, '', '', 675),
(791, '', '', 677),
(792, '', '', 678),
(793, '', '', 679),
(794, '', '', 680),
(795, '', '', 681),
(796, '', '', 682),
(797, '', '', 683),
(798, '', '', 684),
(799, '', '', 685),
(800, '', '', 686),
(801, '', '', 687),
(802, '', '', 688),
(803, '', '', 689),
(804, '', '', 690),
(805, '', '', 691),
(806, '', '', 692),
(807, '', '', 693),
(808, '', '', 694),
(809, '', '', 695),
(810, '', '', 696),
(811, '', '', 697),
(812, '', '', 699),
(813, '', '', 700),
(814, '', '', 701),
(815, '', '', 702),
(816, '', '', 703),
(817, '', '', 704),
(818, '', '', 705),
(819, '', '', 706),
(820, '', '', 707),
(821, '', '', 708),
(822, '', '', 709),
(823, '', '', 710),
(824, '', '', 711),
(825, '', '', 712),
(826, '', '', 713),
(827, '', '', 714),
(828, '', '', 715),
(829, '', '', 716),
(830, '', '', 717),
(831, '', '', 718),
(832, '', '', 719),
(833, '', '', 720),
(834, '', '', 721),
(835, '', '<p>رياض</p>', 722),
(836, '', '<p>رياض</p>', 723),
(837, '', '', 724),
(838, '', '', 725),
(839, '', '', 726),
(840, '', '<p>نظام</p>', 727),
(841, '', '', 728),
(842, '', '', 729),
(843, '', '', 730),
(844, '', '', 731),
(845, '', '', 732),
(846, '', '', 738),
(847, '', '', 739),
(848, '', '', 742),
(849, '', '', 743),
(850, '', '', 744),
(851, '', '', 745),
(852, '', '', 746),
(853, '', '', 747),
(854, '', '', 751),
(855, '', '', 752),
(856, '', '', 754),
(857, '', '', 755),
(858, '', '', 756),
(859, '', '', 757),
(860, '', '', 758),
(861, '', '', 759),
(863, '', '<p>jjhj</p>', 761),
(864, '', '<p>tamer</p>', 762),
(865, '', '<p>tamer</p>', 763),
(866, '', '', 764),
(867, '', '', 765),
(868, '', '', 766),
(869, '', '', 767),
(870, '', '', 768),
(871, '', '', 769);

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
(165, 'البحث السادس', 34, '');

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
(320, 'cccc'),
(321, 'xccd'),
(322, 'يسليبل'),
(323, '');

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
-- Dumping data for table `version`
--

INSERT INTO `version` (`version_id`, `version`, `book_id`) VALUES
(124, '', 700),
(125, '', 702),
(126, '', 704),
(127, '', 705),
(128, '', 711),
(129, '', 712),
(130, '', 713),
(131, '', 714),
(132, '', 715),
(133, '', 716),
(134, '', 717),
(135, '', 721),
(136, '', 722),
(137, '', 727),
(138, '', 732),
(139, '', 743),
(140, '', 744),
(141, '', 757),
(142, '', 762),
(143, '', 763);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=770;

--
-- AUTO_INCREMENT for table `book_tag`
--
ALTER TABLE `book_tag`
  MODIFY `book_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=934;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `fields_values`
--
ALTER TABLE `fields_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=872;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `version_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
