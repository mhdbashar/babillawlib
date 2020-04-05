-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 04:54 PM
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
  `book_name` varchar(20) NOT NULL,
  `jurisdiction` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `year_publication` year(4) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `volume_number` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `book_title` varchar(20) NOT NULL,
  `the_main_domain` varchar(20) NOT NULL,
  `subdomain` varchar(20) NOT NULL,
  `history_system_m` varchar(100) NOT NULL,
  `accreditation` varchar(20) NOT NULL,
  `date_publication_m` varchar(100) NOT NULL,
  `adjustments` varchar(20) NOT NULL,
  `accessories` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `section_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `main_section` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `dis` varchar(200) NOT NULL,
  `history_system_h` date NOT NULL,
  `date_publication_h` date NOT NULL
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
(30, 'مجلدات الأحكام', 0, ''),
(31, 'المدونات القضائية', 0, ''),
(32, 'الأنظمة السعودية', 0, ''),
(33, 'نماذج وعقود', 0, ''),
(34, 'الكتب القانونية والأبحاث', 0, ''),
(115, 'أحكام واحد', 30, ''),
(116, 'مدونة1', 31, ''),
(117, 'نظام1', 32, ''),
(118, 'نموذج عقد1', 33, ''),
(119, 'كتب قانونية واحد', 34, ''),
(120, 'أحكام واحد فرعي', 115, ''),
(121, 'مدونة واحد فرعي', 116, ''),
(122, 'نظام واحد فرعي', 117, ''),
(123, 'نموذج عقد واحد فرعي', 118, ''),
(124, 'كتب قانونية واحد فرعي', 119, ''),
(125, 'مدونة فرعي 2', 121, '');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(20) NOT NULL
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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_tag`
--
ALTER TABLE `book_tag`
  MODIFY `book_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
