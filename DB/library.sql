-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 08:58 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `publisher` varchar(100) NOT NULL,
  `year_publication` year(4) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `volume_number` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `book_title` varchar(500) DEFAULT NULL,
  `the_main_domain` varchar(100) NOT NULL,
  `subdomain` varchar(100) NOT NULL,
  `history_system_m` varchar(100) NOT NULL,
  `accreditation` varchar(100) NOT NULL,
  `date_publication_m` varchar(100) NOT NULL,
  `adjustments` varchar(100) NOT NULL,
  `accessories` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `section_id` int(11) NOT NULL,
  `file` varchar(500) DEFAULT NULL,
  `main_section` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `dis` varchar(200) NOT NULL,
  `history_system_h` date NOT NULL,
  `date_publication_h` date NOT NULL,
  `mini` varchar(100) NOT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `interview` varchar(500) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(11) NOT NULL,
  `material_number` varchar(50) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_discription` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `parent_id`, `section_discription`) VALUES
(31, 'السوابق القضائية', 0, ''),
(32, 'الأنظمة السعودية', 0, ''),
(33, 'نماذج وعقود', 0, ''),
(34, 'الكتب القانونية والأبحاث', 0, ''),
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
  `tag_name` varchar(500) NOT NULL
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `book_tag`
--
ALTER TABLE `book_tag`
  MODIFY `book_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
