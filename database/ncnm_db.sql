-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 09:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncnm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin@username', 'admin@password');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `districtcode` varchar(50) NOT NULL,
  `namedistrict` varchar(50) NOT NULL,
  `provincecode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`districtcode`, `namedistrict`, `provincecode`) VALUES
('101', 'NYARUGENGE', '1'),
('102', 'GASABO', '1'),
('103', 'KICUKIRO', '1'),
('201', 'NYANZA', '2'),
('202', 'GISAGARA', '2'),
('203', 'NYARUGURU', '2'),
('204', 'HUYE', '2'),
('205', 'NYAMAGABE', '2'),
('206', 'RUHANGO', '2'),
('207', 'MUHANGA', '2'),
('208', 'KAMONYI', '2'),
('301', 'KARONGI', '3'),
('302', 'RUTSIRO', '3'),
('303', 'RUBAVU', '3'),
('304', 'NYABIHU', '3'),
('305', 'NGORORERO', '3'),
('306', 'RUSIZI', '3'),
('307', 'NYAMASHEKE', '3'),
('401', 'RULINDO', '4'),
('402', 'GAKENKE', '4'),
('403', 'MUSANZE', '4'),
('404', 'BURERA', '4'),
('405', 'GICUMBI', '4'),
('501', 'RWAMAGANA', '5'),
('502', 'NYAGATARE', '5'),
('503', 'GATSIBO', '5'),
('504', 'KAYONZA', '5'),
('505', 'KIREHE', '5'),
('506', 'NGOMA', '5'),
('507', 'BUGESERA', '5');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) DEFAULT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(295, 4, 12, 25, 'Diode, inverted, pointer', 'old', '2019-12-07 02:52:14'),
(296, 4, 12, 16, 'Data Block', 'old', '2019-12-07 02:52:14'),
(297, 6, 12, 18, 'Programmable Logic Controller', 'old', '2019-12-05 12:59:47'),
(298, 6, 12, 9, '1850s', 'old', '2019-12-05 12:59:47'),
(299, 6, 12, 24, '1976', 'old', '2019-12-05 12:59:47'),
(300, 6, 12, 14, 'Operating System', 'old', '2019-12-05 12:59:47'),
(301, 6, 12, 19, 'WAN (Wide Area Network)', 'old', '2019-12-05 12:59:47'),
(302, 6, 11, 28, 'fds', 'new', '2019-12-05 12:04:28'),
(303, 6, 11, 29, 'sd', 'new', '2019-12-05 12:04:28'),
(304, 6, 12, 15, 'David Filo & Jerry Yang', 'new', '2019-12-05 12:59:47'),
(305, 6, 12, 17, 'System file', 'new', '2019-12-05 12:59:47'),
(306, 6, 12, 10, 'Field', 'new', '2019-12-05 12:59:47'),
(307, 6, 12, 9, '1880s', 'new', '2019-12-05 12:59:47'),
(308, 6, 12, 21, 'Temporary file', 'new', '2019-12-05 12:59:47'),
(309, 4, 11, 28, 'q1', 'new', '2019-12-05 13:30:21'),
(310, 4, 11, 29, 'dfg', 'new', '2019-12-05 13:30:21'),
(311, 4, 12, 16, 'Data Block', 'new', '2019-12-07 02:52:14'),
(312, 4, 12, 20, 'Plancks radiation', 'new', '2019-12-07 02:52:14'),
(313, 4, 12, 10, 'Report', 'new', '2019-12-07 02:52:14'),
(314, 4, 12, 24, '1976', 'new', '2019-12-07 02:52:14'),
(315, 4, 12, 9, '1930s', 'new', '2019-12-07 02:52:14'),
(316, 8, 12, 18, 'Programmable Lift Computer', 'new', '2020-01-05 03:18:35'),
(317, 8, 12, 14, 'Operating System', 'new', '2020-01-05 03:18:35'),
(318, 8, 12, 20, 'Einstein oscillation', 'new', '2020-01-05 03:18:35'),
(319, 8, 12, 21, 'Temporary file', 'new', '2020-01-05 03:18:35'),
(320, 8, 12, 25, 'Diode, inverted, pointer', 'new', '2020-01-05 03:18:35'),
(321, 2, 11, 29, 'asd', 'new', '2021-11-16 14:13:27'),
(322, 2, 12, 20, 'Blackbody radiation', 'new', '2021-11-25 15:16:41'),
(323, 2, 12, 22, 'Inernet', 'new', '2021-11-25 15:16:41'),
(324, 2, 12, 25, 'Gas, metal vapor, rock', 'new', '2021-11-25 15:16:41'),
(325, 2, 12, 21, 'Compressed Archive file', 'new', '2021-11-25 15:16:41'),
(326, 2, 12, 10, 'Record', 'new', '2021-11-25 15:16:41'),
(327, 2, 24, 38, 'ndnm', 'new', '2021-11-28 10:54:40'),
(328, 2, 24, 34, 'javascript', 'new', '2021-11-28 10:54:40'),
(329, 2, 24, 37, 'cndjkn', 'new', '2021-11-28 10:54:40'),
(330, 2, 24, 36, 'njnj', 'new', '2021-11-28 10:54:40'),
(331, 1, 24, 37, 'ncdnn', 'new', '2021-12-01 14:04:59'),
(332, 1, 24, 34, 'javascript', 'new', '2021-12-01 14:05:00'),
(333, 1, 24, 35, '1880s', 'new', '2021-12-01 14:05:00'),
(334, 1, 11, 29, 'sd', 'new', '2021-12-01 15:14:22'),
(335, 1, 11, 28, 'q1', 'new', '2021-12-01 15:14:22'),
(336, 1, 12, 25, 'Pointer, diode, CD', 'new', '2021-12-02 08:03:53'),
(337, 1, 12, 15, 'David Filo & Jerry Yang', 'new', '2021-12-02 08:03:53'),
(338, 1, 12, 14, 'Operating System', 'new', '2021-12-02 08:03:53'),
(339, 1, 12, 16, 'Database', 'new', '2021-12-02 08:03:53'),
(340, 1, 12, 21, 'Temporary file', 'new', '2021-12-02 08:03:53'),
(341, 23, 25, 40, 'D', 'new', '2021-12-02 10:14:26'),
(342, 23, 25, 39, 'It is what it is', 'new', '2021-12-02 10:14:26'),
(343, 1, 27, 42, 'polymerase chain reaction', 'new', '2021-12-06 21:38:09'),
(344, 1, 28, 45, 'hCG–1', 'new', '2021-12-07 12:10:59'),
(345, 1, 28, 43, 'Armed Forces Medical College', 'new', '2021-12-07 12:10:59'),
(348, 1, 29, 47, 'place the patient in a reverse Trendelenburg position and open the IV line', 'new', '2021-12-07 21:43:30'),
(349, 26, 31, 51, 'ccc', 'new', '2021-12-15 04:30:04'),
(350, 26, 31, 50, 'aaa', 'new', '2021-12-15 04:30:04'),
(365, 1, 32, 53, NULL, 'old', '2021-12-15 21:07:25'),
(366, 1, 32, 52, NULL, 'old', '2021-12-15 21:07:25'),
(367, 1, 32, 53, NULL, 'old', '2021-12-15 21:11:25'),
(368, 1, 32, 52, NULL, 'old', '2021-12-15 21:11:25'),
(369, 1, 32, 53, NULL, 'old', '2021-12-15 21:17:55'),
(370, 1, 32, 52, NULL, 'old', '2021-12-15 21:17:55'),
(371, 1, 32, 52, NULL, 'old', '2021-12-15 21:19:24'),
(372, 1, 32, 53, NULL, 'old', '2021-12-15 21:19:24'),
(373, 1, 32, 52, NULL, 'old', '2021-12-15 21:21:27'),
(374, 1, 32, 53, NULL, 'old', '2021-12-15 21:21:27'),
(375, 1, 32, 52, NULL, 'old', '2021-12-15 21:22:18'),
(376, 1, 32, 53, NULL, 'old', '2021-12-15 21:22:18'),
(377, 1, 32, 52, NULL, 'old', '2021-12-15 21:23:12'),
(378, 1, 32, 53, NULL, 'old', '2021-12-15 21:23:12'),
(379, 1, 32, 53, NULL, 'old', '2021-12-15 21:28:14'),
(380, 1, 32, 52, NULL, 'old', '2021-12-15 21:28:14'),
(381, 1, 32, 52, NULL, 'old', '2021-12-15 21:31:10'),
(382, 1, 32, 53, NULL, 'old', '2021-12-15 21:31:10'),
(383, 1, 32, 52, NULL, 'new', '2021-12-15 21:31:11'),
(384, 1, 32, 53, NULL, 'new', '2021-12-15 21:31:11'),
(385, 1, 30, 48, 'justice', 'old', '2021-12-15 21:34:06'),
(386, 1, 30, 49, 'Data collection', 'old', '2021-12-15 21:34:06'),
(387, 1, 30, 49, 'Decision-making and judgment', 'new', '2021-12-15 21:34:06'),
(388, 1, 30, 48, 'paternalism', 'new', '2021-12-15 21:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `exam_application`
--

CREATE TABLE `exam_application` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examne_id` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 0,
  `is_accessed` int(11) NOT NULL DEFAULT 0,
  `applied_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_application`
--

INSERT INTO `exam_application` (`id`, `exam_id`, `examne_id`, `is_paid`, `is_accessed`, `applied_on`) VALUES
(1, 27, 1, 1, 0, '2021-12-06 10:01:12'),
(2, 28, 1, 1, 0, '2021-12-07 09:07:41'),
(3, 29, 1, 1, 0, '2021-12-07 23:08:52'),
(4, 0, 1, 1, 0, '2021-12-12 20:27:23'),
(5, 0, 1, 1, 0, '2021-12-12 20:28:31'),
(6, 30, 1, 1, 0, '2021-12-12 20:33:19'),
(11, 31, 26, 1, 0, '2021-12-15 06:29:14'),
(13, 32, 1, 1, 0, '2021-12-15 21:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used',
  `exam_attempt_date` datetime NOT NULL DEFAULT current_timestamp(),
  `res_accessed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `exmne_id`, `exam_id`, `examat_status`, `exam_attempt_date`, `res_accessed`) VALUES
(51, 6, 12, 'used', '2021-10-29 21:07:36', 0),
(52, 4, 11, 'used', '2021-10-29 21:07:36', 0),
(53, 4, 12, 'used', '2021-10-29 21:02:36', 0),
(54, 8, 12, 'used', '2021-10-28 21:07:36', 0),
(55, 2, 11, 'used', '2021-11-16 16:13:27', 0),
(56, 2, 12, 'used', '2021-11-25 17:16:41', 0),
(57, 2, 24, 'used', '2021-11-28 12:54:40', 1),
(58, 1, 24, 'used', '2021-12-01 16:05:00', 1),
(59, 1, 11, 'used', '2021-12-01 17:14:22', 1),
(60, 1, 12, 'used', '2021-12-02 10:03:53', 1),
(61, 23, 25, 'used', '2021-12-02 12:14:26', 1),
(62, 1, 27, 'used', '2021-12-06 23:38:09', 1),
(63, 1, 28, 'used', '2021-12-07 14:10:59', 1),
(65, 1, 29, 'used', '2021-12-07 23:43:30', 1),
(66, 26, 31, 'used', '2021-12-15 06:30:04', 1),
(84, 1, 32, 'used', '2021-12-15 23:31:11', 1),
(86, 1, 30, 'used', '2021-12-15 23:34:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_enrolls`
--

CREATE TABLE `exam_enrolls` (
  `id` int(11) NOT NULL,
  `examinee_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `paid` int(11) NOT NULL DEFAULT 0,
  `pay_mode` int(11) DEFAULT NULL,
  `applied_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(255) NOT NULL,
  `question_marks` int(11) NOT NULL DEFAULT 1,
  `exam_ch1` varchar(1000) NOT NULL,
  `exam_ch2` varchar(1000) NOT NULL,
  `exam_ch3` varchar(1000) NOT NULL,
  `exam_ch4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_question_tbl`
--

INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `question_marks`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
(9, 12, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', 1, '1850s', '1880s', '1930s', '1950s', '1880s', 'active'),
(10, 12, 'What is part of a database that holds only one type of information?', 1, 'Report', 'Field', 'Record', 'File', 'Field', 'active'),
(14, 12, 'OS computer abbreviation usually means ?', 1, 'Order of Significance', 'Open Software', 'Operating System', 'Optical Sensor', 'Operating System', 'active'),
(15, 12, 'Who developed Yahoo?', 1, 'Dennis Ritchie & Ken Thompson', 'David Filo & Jerry Yang', 'Vint Cerf & Robert Kahn', 'Steve Case & Jeff Bezos', 'David Filo & Jerry Yang', 'active'),
(16, 12, 'DB computer abbreviation usually means ?', 1, 'Database', 'Double Byte', 'Data Block', 'Driver Boot', 'Database', 'active'),
(17, 12, '.INI extension refers usually to what kind of file?', 1, 'Image file', 'System file', 'Hypertext related file', 'Image Color Matching Profile file', 'System file', 'active'),
(18, 12, 'What does the term PLC stand for?', 1, 'Programmable Lift Computer', 'Program List Control', 'Programmable Logic Controller', 'Piezo Lamp Connector', 'Programmable Logic Controller', 'active'),
(19, 12, 'What do we call a network whose elements may be separated by some distance? It usually involves two or more small networks and dedicated high-speed telephone lines.', 1, 'URL (Universal Resource Locator)', 'LAN (Local Area Network)', 'WAN (Wide Area Network)', 'World Wide Web', 'WAN (Wide Area Network)', 'active'),
(20, 12, 'After the first photons of light are produced, which process is responsible for amplification of the light?', 1, 'Blackbody radiation', 'Stimulated emission', 'Plancks radiation', 'Einstein oscillation', 'Stimulated emission', 'active'),
(21, 12, '.TMP extension refers usually to what kind of file?', 1, 'Compressed Archive file', 'Image file', 'Temporary file', 'Audio file', 'Temporary file', 'active'),
(22, 12, 'What do we call a collection of two or more computers that are located within a limited distance of each other and that are connected to each other directly or indirectly?', 1, 'Inernet', 'Interanet', 'Local Area Network', 'Wide Area Network', 'Local Area Network', 'active'),
(24, 12, '	 In what year was the \"@\" chosen for its use in e-mail addresses?', 1, '1976', '1972', '1980', '1984', '1972', 'active'),
(25, 12, 'What are three types of lasers?', 1, 'Gas, metal vapor, rock', 'Pointer, diode, CD', 'Diode, inverted, pointer', 'Gas, solid state, diode', 'Gas, solid state, diode', 'active'),
(27, 15, 'asdasd', 1, 'dsf', 'sd', 'yui', 'sdf', 'yui', 'active'),
(28, 11, 'Question 1', 1, 'q1', 'asd', 'fds', 'ytu', 'q1', 'active'),
(29, 11, 'Question 2', 1, 'asd', 'sd', 'q2', 'dfg', 'q2', 'active'),
(30, 11, 'Question 3', 1, 'sd', 'q3', 'asd', 'fgh', 'q3', 'active'),
(31, 13, 'hbb', 1, '', '', '', '', '', 'active'),
(32, 13, 'jnkn', 1, 'najkcn', 'ncjksn', '', '', '', 'active'),
(34, 24, 'what is js in full', 1, 'javascript', 'JScript', 'Json', 'JsonScript', 'javascript', 'active'),
(35, 24, 'In which decade was the WW1 ', 1, '1950s', '1850s', '1880s', '1930s', '1880s', 'active'),
(36, 24, 'qoweir', 1, 'ni', 'njnj', 'nd', 'nn', 'nn', 'active'),
(37, 24, 'nsjk', 5, 'cndjkn', 'ncjkdnjk', 'ncdnn', 'ncn', 'ncn', 'active'),
(38, 24, 'nffsn', 1, 'nvfjnk', 'cndlnj', 'ndnm', 'mnmn', 'mnmn', 'active'),
(39, 25, 'what is ruby?', 1, 'It is what it is', 'It is a language', 'It is a pro lang', 'None of the above', 'None of the above', 'active'),
(40, 25, 'what is the next question', 1, 'A', 'B', 'c', 'D', 'c', 'active'),
(41, 25, 'what is programming', 2, 'vndjkn', 'dnjk', 'nvdln', 'to code', 'to code', 'active'),
(42, 27, 'what is PCR test in full', 1, 'polymerase chain reaction', 'polyclinic Rwanda', 'nfjksnk', 'ndkndv', 'polymerase chain reaction', 'active'),
(43, 28, 'What is AFMC in full', 1, 'Armed Forces Medical College', 'I don not know', 'it is what it is', 'none of the above', 'Armed Forces Medical College', 'active'),
(45, 28, 'If the velocity of light C, the universal gravitational constant G and Planck’s constant h be chosen as fundamental quantities then the dimensions of mass is this system', 4, 'hCG', 'hCG–1', 'h–1C–1G', 'h1/2C1/2G–1/2', 'hCG–1', 'active'),
(46, 29, 'The main goal of treatment for acute glomerulonephritis is to:', 3, 'encourage activity', 'encourage high protein intake', 'maintain fluid balance', 'teach intermittent urinary catheterization', 'maintain fluid balance', 'active'),
(47, 29, 'A patient who received spinal anesthesia four hours ago during surgery is transferred to the surgical unit and, after one and a half hours, now reports severe incisional pain.', 2, 'medicate the patient for pain', 'place the patient in a high Fowler position and administer oxygen', 'place the patient in a reverse Trendelenburg position and open the IV line', 'report the findings to the provider', 'medicate the patient for pain', 'active'),
(48, 30, 'A patients family does not know the patients end-of-life care preferences, but assumes that they know what is best for the patient under the circumstances. This assumption reflects:', 2, 'justice', 'paternalism', 'pragmatism', 'veracity', 'paternalism', 'active'),
(49, 30, 'Which action occurs primarily during the evaluation phase of the nursing process?', 3, 'Data collection', 'Decision-making and judgment', 'Priority-setting and expected outcomes', 'Reassessment and audit', 'Decision-making and judgment', 'active'),
(50, 31, 'sdfvmbjkmlas', 1, 'aaa', 'bbb', 'ccc', 'ddd', 'ccc', 'active'),
(51, 31, 'rerthhfjhhh', 1, 'aaa', 'ccc', 'bbbb', 'ggg', 'aaa', 'active'),
(52, 32, 'what is omicron', 2, 'it is a new variant of COVID-19', 'it is corona virus', 'it is what it is', 'it is a new disease from south africa', 'it is a new variant of COVID-19', 'active'),
(53, 32, 'when omicron discovered', 2, 'one month ago', '2 days ago', '1 week ago', 'none of the above', 'none of the above', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_res_feedback`
--

CREATE TABLE `exam_res_feedback` (
  `erf_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL COMMENT '0: Fail, 1: Pass',
  `rec_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_res_feedback`
--

INSERT INTO `exam_res_feedback` (`erf_id`, `exam_id`, `exmne_id`, `grade`, `rec_time`) VALUES
(1, 28, 1, 1, '2021-12-07 14:10:59'),
(3, 29, 1, 1, '2021-12-07 23:43:31'),
(4, 31, 26, 1, '2021-12-15 06:30:04'),
(18, 32, 1, 0, '2021-12-15 23:31:11'),
(20, 30, 1, 1, '2021-12-15 23:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `pass_marks` int(11) DEFAULT NULL,
  `exam_cost` int(11) DEFAULT NULL,
  `ex_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `starting_time` datetime DEFAULT NULL,
  `closing_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT -1 COMMENT '-1:Inactive, 0: Active, 1: Closed, 2: Cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`ex_id`, `ex_title`, `ex_time_limit`, `ex_description`, `pass_marks`, `exam_cost`, `ex_created`, `starting_time`, `closing_at`, `status`) VALUES
(24, 'Js', '10', 'It is intended to help students learn javascript basics', 80, 3000, '2021-12-05 19:21:17', '2021-12-05 15:20:00', '2021-12-05 16:00:00', -1),
(25, 'ruby', '20', 'The exam will help students to learn Ruby basics', 70, 2000, '2021-12-05 19:21:20', '2021-12-05 13:24:00', '2021-12-05 13:24:00', -1),
(26, 'health care', '10', 'this is the exam for examining health care service capabilities', 70, 3000, '2021-12-05 19:21:24', '2021-12-05 14:00:00', '2021-12-05 16:00:00', -1),
(27, 'Covid Tester', '20', 'this is for anyone capable of helping COVID testing', 70, 5000, '2021-12-05 19:45:28', '2021-12-06 13:00:00', '2021-12-08 16:00:00', 0),
(28, 'AFMC Nursing Exam', '30', 'this is a nursing examination', 80, 5000, '2021-12-07 12:10:11', '2021-12-07 09:30:00', '2021-12-08 10:00:00', 0),
(29, 'Medical-Surgical Nursing', '10', 'this is for medical surgeon', 80, 4000, '2021-12-07 21:32:33', '2021-12-07 23:10:00', '2021-12-07 23:50:00', 0),
(30, 'NCLEX', '1', 'NCSBN is dedicated to developing psychometrically sound and legally defensible nurse licensure and certification examinations consistent with current practice', 75, 100, '2021-12-13 06:58:59', '2021-12-13 09:00:00', '2021-12-22 02:00:00', 0),
(31, 'zz', '1', 'medical', 50, 100, '2021-12-15 04:27:23', '2021-12-15 06:30:00', '2021-12-15 06:56:00', 0),
(32, 'Omicron Tester', '20', 'this is the exam to test omicron', 50, 100, '2021-12-15 18:42:15', '2021-12-15 20:45:00', '2021-12-16 20:45:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `fb_exmne_subject` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`fb_id`, `exmne_id`, `fb_exmne_subject`, `fb_feedbacks`, `fb_date`) VALUES
(1, 5, 'request web improvement', 'web needs a big improvement', '2021-10-29 19:34:02'),
(2, 2, 'request web improvement', 'hi', '2021-11-16 15:44:03'),
(3, 23, 'request web improvement', 'astgyresd', '2021-12-02 12:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `provincecode` int(11) NOT NULL,
  `provincename` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`provincecode`, `provincename`) VALUES
(1, 'Kigali City'),
(2, 'Southern Province'),
(3, 'Western Province'),
(4, 'Northern Province'),
(5, 'Eastern Province');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `sectorcode` varchar(50) NOT NULL,
  `namesector` varchar(50) NOT NULL,
  `districtcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`sectorcode`, `namesector`, `districtcode`) VALUES
('10101', 'Gitega', '101'),
('10102', 'Kanyinya', '101'),
('10103', 'Kigali', '101'),
('10104', 'Kimisagara', '101'),
('10105', 'Mageragere', '101'),
('10106', 'Muhima', '101'),
('10107', 'Nyakabanda', '101'),
('10108', 'Nyamirambo', '101'),
('10109', 'Nyarugenge', '101'),
('10110', 'Rwezamenyo', '101'),
('10201', 'Bumbogo', '102'),
('10202', 'Gatsata', '102'),
('10203', 'Gikomero', '102'),
('10204', 'Gisozi', '102'),
('10205', 'Jabana', '102'),
('10206', 'Jali', '102'),
('10207', 'Kacyiru', '102'),
('10208', 'Kimihurura', '102'),
('10209', 'Kimironko', '102'),
('10210', 'Kinyinya', '102'),
('10211', 'Ndera', '102'),
('10212', 'Nduba', '102'),
('10213', 'Remera', '102'),
('10214', 'Rusororo', '102'),
('10215', 'Rutunga', '102'),
('10301', 'Gahanga', '103'),
('10302', 'Gatenga', '103'),
('10303', 'Gikondo', '103'),
('10304', 'Kagarama', '103'),
('10305', 'Kanombe', '103'),
('10306', 'Kicukiro', '103'),
('10307', 'Kigarama', '103'),
('10308', 'Masaka', '103'),
('10309', 'Niboye', '103'),
('10310', 'Nyarugunga', '103'),
('20101', 'Busasamana', '201'),
('20102', 'Busoro', '201'),
('20103', 'Cyabakamyi', '201'),
('20104', 'Kibilizi', '201'),
('20105', 'Kigoma', '201'),
('20106', 'Mukingo', '201'),
('20107', 'Muyira', '201'),
('20108', 'Ntyazo', '201'),
('20109', 'Nyagisozi', '201'),
('20110', 'Rwabicuma', '201'),
('20201', 'Gikonko', '202'),
('20202', 'Gishubi', '202'),
('20203', 'Kansi', '202'),
('20204', 'Kibirizi', '202'),
('20205', 'Kigembe', '202'),
('20206', 'Mamba', '202'),
('20207', 'Muganza', '202'),
('20208', 'Mugombwa', '202'),
('20209', 'Mukindo', '202'),
('20210', 'Musha', '202'),
('20211', 'Ndora', '202'),
('20212', 'Nyanza', '202'),
('20213', 'Save', '202'),
('20301', 'Busanze', '203'),
('20302', 'Cyahinda', '203'),
('20303', 'Kibeho', '203'),
('20304', 'Kivu', '203'),
('20305', 'Mata', '203'),
('20306', 'Muganza', '203'),
('20307', 'Munini', '203'),
('20308', 'Ngera', '203'),
('20309', 'Ngoma', '203'),
('20310', 'Nyabimata', '203'),
('20311', 'Nyagisozi', '203'),
('20312', 'Ruheru', '203'),
('20313', 'Ruramba', '203'),
('20314', 'Rusenge', '203'),
('20401', 'Gishamvu', '204'),
('20402', 'Huye', '204'),
('20403', 'Karama', '204'),
('20404', 'Kigoma', '204'),
('20405', 'Kinazi', '204'),
('20406', 'Maraba', '204'),
('20407', 'Mbazi', '204'),
('20408', 'Mukura', '204'),
('20409', 'Ngoma', '204'),
('20410', 'Ruhashya', '204'),
('20411', 'Rusatira', '204'),
('20412', 'Rwaniro', '204'),
('20413', 'Simbi', '204'),
('20414', 'Tumba', '204'),
('20501', 'Buruhukiro', '205'),
('20502', 'Cyanika', '205'),
('20503', 'Gasaka', '205'),
('20504', 'Gatare', '205'),
('20505', 'Kaduha', '205'),
('20506', 'Kamegeri', '205'),
('20507', 'Kibirizi', '205'),
('20508', 'Kibumbwe', '205'),
('20509', 'Kitabi', '205'),
('20510', 'Mbazi', '205'),
('20511', 'Mugano', '205'),
('20512', 'Musange', '205'),
('20513', 'Musebeya', '205'),
('20514', 'Mushubi', '205'),
('20515', 'Nkomane', '205'),
('20516', 'Tare', '205'),
('20517', 'Uwinkingi', '205'),
('20601', 'Bweramana', '206'),
('20602', 'Byimana', '206'),
('20603', 'Kabagali', '206'),
('20604', 'Kinazi', '206'),
('20605', 'Kinihira', '206'),
('20606', 'Mbuye', '206'),
('20607', 'Mwendo', '206'),
('20608', 'Ntongwe', '206'),
('20609', 'Ruhango', '206'),
('20701', 'Cyeza', '207'),
('20702', 'Kabacuzi', '207'),
('20703', 'Kibangu', '207'),
('20704', 'Kiyumba', '207'),
('20705', 'Muhanga', '207'),
('20706', 'Mushishiro', '207'),
('20707', 'Nyabinoni', '207'),
('20708', 'Nyamabuye', '207'),
('20709', 'Nyarusange', '207'),
('20710', 'Rongi', '207'),
('20711', 'Rugendabari', '207'),
('20712', 'Shyogwe', '207'),
('20801', 'Gacurabwenge', '208'),
('20802', 'Karama', '208'),
('20803', 'Kayenzi', '208'),
('20804', 'Kayumbu', '208'),
('20805', 'Mugina', '208'),
('20806', 'Musambira', '208'),
('20807', 'Ngamba', '208'),
('20808', 'Nyamiyaga', '208'),
('20809', 'Nyarubaka', '208'),
('20810', 'Rugarika', '208'),
('20811', 'Rukoma', '208'),
('20812', 'Runda', '208'),
('30101', 'Bwishyura', '301'),
('30102', 'Gashari', '301'),
('30103', 'Gishyita', '301'),
('30104', 'Gitesi', '301'),
('30105', 'Mubuga', '301'),
('30106', 'Murambi', '301'),
('30107', 'Murundi', '301'),
('30108', 'Mutuntu', '301'),
('30109', 'Rubengera', '301'),
('30110', 'Rugabano', '301'),
('30111', 'Ruganda', '301'),
('30112', 'Rwankuba', '301'),
('30113', 'Twumba', '301'),
('30201', 'Boneza', '302'),
('30202', 'Gihango', '302'),
('30203', 'Kigeyo', '302'),
('30204', 'Kivumu', '302'),
('30205', 'Manihira', '302'),
('30206', 'Mukura', '302'),
('30207', 'Murunda', '302'),
('30208', 'Musasa', '302'),
('30209', 'Mushonyi', '302'),
('30210', 'Mushubati', '302'),
('30211', 'Nyabirasi', '302'),
('30212', 'Ruhango', '302'),
('30213', 'Rusebeya', '302'),
('30301', 'Bugeshi', '303'),
('30302', 'Busasamana', '303'),
('30303', 'Cyanzarwe', '303'),
('30304', 'Gisenyi', '303'),
('30305', 'Kanama', '303'),
('30306', 'Kanzenze', '303'),
('30307', 'Mudende', '303'),
('30308', 'Nyakiriba', '303'),
('30309', 'Nyamyumba', '303'),
('30310', 'Nyundo', '303'),
('30311', 'Rubavu', '303'),
('30312', 'Rugerero', '303'),
('30401', 'Bigogwe', '304'),
('30402', 'Jenda', '304'),
('30403', 'Jomba', '304'),
('30404', 'Kabatwa', '304'),
('30405', 'Karago', '304'),
('30406', 'Kintobo', '304'),
('30407', 'Mukamira', '304'),
('30408', 'Muringa', '304'),
('30409', 'Rambura', '304'),
('30410', 'Rugera', '304'),
('30411', 'Rurembo', '304'),
('30412', 'Shyira', '304'),
('30501', 'BWIRA', '305'),
('30502', 'GATUMBA', '305'),
('30503', 'HINDIRO', '305'),
('30504', 'KABAYA', '305'),
('30505', 'KAGEYO', '305'),
('30506', 'KAVUMU', '305'),
('30507', 'MATYAZO', '305'),
('30508', 'MUHANDA', '305'),
('30509', 'MUHORORO', '305'),
('30510', 'NDARO', '305'),
('30511', 'NGORORERO', '305'),
('30512', 'NYANGE', '305'),
('30513', 'SOVU', '305'),
('30601', 'Bugarama', '306'),
('30602', 'Butare', '306'),
('30603', 'Bweyeye', '306'),
('30604', 'Gashonga', '306'),
('30605', 'Giheke', '306'),
('30606', 'Gihundwe', '306'),
('30607', 'Gikundamvura', '306'),
('30608', 'Gitambi', '306'),
('30609', 'Kamembe', '306'),
('30610', 'Muganza', '306'),
('30611', 'Mururu', '306'),
('30612', 'Nkanka', '306'),
('30613', 'Nkombo', '306'),
('30614', 'Nkungu', '306'),
('30615', 'Nyakabuye', '306'),
('30616', 'Nyakarenzo', '306'),
('30617', 'Nzahaha', '306'),
('30618', 'Rwimbogo', '306'),
('30701', 'Bushekeri', '307'),
('30702', 'Bushenge', '307'),
('30703', 'Cyato', '307'),
('30704', 'Gihombo', '307'),
('30705', 'Kagano', '307'),
('30706', 'Kanjongo', '307'),
('30707', 'Karambi', '307'),
('30708', 'Karengera', '307'),
('30709', 'Kirimbi', '307'),
('30710', 'Macuba', '307'),
('30711', 'Mahembe', '307'),
('30712', 'Nyabitekeri', '307'),
('30713', 'Rangiro', '307'),
('30714', 'Ruharambuga', '307'),
('30715', 'Shangi', '307'),
('40101', 'BASE', '401'),
('40102', 'BUREGA', '401'),
('40103', 'BUSHOKI', '401'),
('40104', 'BUYOGA', '401'),
('40105', 'CYINZUZI', '401'),
('40106', 'CYUNGO', '401'),
('40107', 'KINIHIRA', '401'),
('40108', 'KISARO', '401'),
('40109', 'MASORO', '401'),
('40110', 'MBOGO', '401'),
('40111', 'MURAMBI', '401'),
('40112', 'NGOMA', '401'),
('40113', 'NTARABANA', '401'),
('40114', 'RUKOZO', '401'),
('40115', 'RUSIGA', '401'),
('40116', 'SHYORONGI', '401'),
('40117', 'TUMBA', '401'),
('40201', 'Busengo ', '402'),
('40202', 'Coko ', '402'),
('40203', 'Cyabingo ', '402'),
('40204', 'Gakenke ', '402'),
('40205', 'Gashenyi ', '402'),
('40206', 'Janja ', '402'),
('40207', 'Kamubuga ', '402'),
('40208', 'Karambo ', '402'),
('40209', 'Kivuruga ', '402'),
('40210', 'Mataba ', '402'),
('40211', 'Minazi ', '402'),
('40212', 'Mugunga ', '402'),
('40213', 'Muhondo ', '402'),
('40214', 'Muyongwe ', '402'),
('40215', 'Muzo ', '402'),
('40216', 'Nemba ', '402'),
('40217', 'Ruli ', '402'),
('40218', 'Rusasa ', '402'),
('40219', 'Rushashi ', '402'),
('40301', 'Busogo', '403'),
('40302', 'Cyuve', '403'),
('40303', 'Gacaca', '403'),
('40304', 'Gashaki', '403'),
('40305', 'Gataraga', '403'),
('40306', 'Kimonyi', '403'),
('40307', 'Kinigi', '403'),
('40308', 'Muhoza', '403'),
('40309', 'Muko', '403'),
('40310', 'Musanze', '403'),
('40311', 'Nkotsi', '403'),
('40312', 'Nyange', '403'),
('40313', 'Remera', '403'),
('40314', 'Rwaza', '403'),
('40315', 'Shingiro', '403'),
('40401', 'Bungwe', '404'),
('40402', 'Butaro', '404'),
('40403', 'Cyanika', '404'),
('40404', 'Cyeru', '404'),
('40405', 'Gahunga', '404'),
('40406', 'Gatebe', '404'),
('40407', 'Gitovu', '404'),
('40408', 'Kagogo', '404'),
('40409', 'Kinoni', '404'),
('40410', 'Kinyababa', '404'),
('40411', 'Kivuye', '404'),
('40412', 'Nemba', '404'),
('40413', 'Rugarama', '404'),
('40414', 'Rugengabari', '404'),
('40415', 'Ruhunde', '404'),
('40416', 'Rusarabuye', '404'),
('40417', 'Rwerere', '404'),
('40501', 'Bukure', '405'),
('40502', 'Bwisige', '405'),
('40503', 'Byumba', '405'),
('40504', 'Cyumba', '405'),
('40505', 'Giti', '405'),
('40506', 'Kageyo', '405'),
('40507', 'Kaniga', '405'),
('40508', 'Manyagiro', '405'),
('40509', 'Miyove', '405'),
('40510', 'Mukarange', '405'),
('40511', 'Muko', '405'),
('40512', 'Mutete', '405'),
('40513', 'Nyamiyaga', '405'),
('40514', 'Nyankenke', '405'),
('40515', 'Rubaya', '405'),
('40516', 'Rukomo', '405'),
('40517', 'Rushaki', '405'),
('40518', 'Rutare', '405'),
('40519', 'Ruvune', '405'),
('40520', 'Rwamiko', '405'),
('40521', 'Shangasha', '405'),
('50101', 'Fumbwe', '501'),
('50102', 'Gahengeri', '501'),
('50103', 'Gishali', '501'),
('50104', 'Karenge', '501'),
('50105', 'Kigabiro', '501'),
('50106', 'Muhazi', '501'),
('50107', 'Munyaga', '501'),
('50108', 'Munyiginya', '501'),
('50109', 'Musha', '501'),
('50110', 'Muyumbu', '501'),
('50111', 'Mwulire', '501'),
('50112', 'Nyakaliro', '501'),
('50113', 'Nzige', '501'),
('50114', 'Rubona', '501'),
('50201', 'GATUNDA', '502'),
('50202', 'KARAMA', '502'),
('50203', 'KARANGAZI', '502'),
('50204', 'KATABAGEMU', '502'),
('50205', 'KIYOMBE', '502'),
('50206', 'MATIMBA', '502'),
('50207', 'MIMURI', '502'),
('50208', 'MUKAMA', '502'),
('50209', 'MUSHERI', '502'),
('50210', 'NYAGATARE', '502'),
('50211', 'RUKOMO', '502'),
('50212', 'RWEMPASHA', '502'),
('50213', 'RWIMIYAGA', '502'),
('50214', 'TABAGWE', '502'),
('50301', 'Gasange', '503'),
('50302', 'Gatsibo', '503'),
('50303', 'Gitoki', '503'),
('50304', 'Kabarore', '503'),
('50305', 'Kageyo', '503'),
('50306', 'Kiramuruzi', '503'),
('50307', 'Kiziguro', '503'),
('50308', 'Muhura', '503'),
('50309', 'Murambi', '503'),
('50310', 'Ngarama', '503'),
('50311', 'Nyagihanga', '503'),
('50312', 'Remera', '503'),
('50313', 'Rugarama', '503'),
('50314', 'Rwimbogo', '503'),
('50401', 'Gahini', '504'),
('50402', 'Kabare', '504'),
('50403', 'Kabarondo', '504'),
('50404', 'Mukarange', '504'),
('50405', 'Murama', '504'),
('50406', 'Murundi', '504'),
('50407', 'Mwiri', '504'),
('50408', 'Ndego', '504'),
('50409', 'Nyamirama', '504'),
('50410', 'Rukara', '504'),
('50411', 'Ruramira', '504'),
('50412', 'Rwinkwavu', '504'),
('50501', 'Gahara', '505'),
('50502', 'Gatore', '505'),
('50503', 'Kigarama', '505'),
('50504', 'Kigina', '505'),
('50505', 'Kirehe', '505'),
('50506', 'Mahama', '505'),
('50507', 'Mpanga', '505'),
('50508', 'Musaza', '505'),
('50509', 'Mushikiri', '505'),
('50510', 'Nasho', '505'),
('50511', 'Nyamugari', '505'),
('50512', 'Nyarubuye', '505'),
('50601', 'Gashanda', '506'),
('50602', 'Jarama', '506'),
('50603', 'Karembo', '506'),
('50604', 'Kazo', '506'),
('50605', 'Kibungo', '506'),
('50606', 'Mugesera', '506'),
('50607', 'Murama', '506'),
('50608', 'Mutenderi', '506'),
('50609', 'Remera', '506'),
('50610', 'Rukira', '506'),
('50611', 'Rukumberi', '506'),
('50612', 'Rurenge', '506'),
('50613', 'Sake', '506'),
('50614', 'Zaza', '506'),
('50701', 'Gashora', '507'),
('50702', 'Juru', '507'),
('50703', 'Kamabuye', '507'),
('50704', 'Mareba', '507'),
('50705', 'Mayange', '507'),
('50706', 'Musenyi', '507'),
('50707', 'Mwogo', '507'),
('50708', 'Ngeruka', '507'),
('50709', 'Ntarama', '507'),
('50710', 'Nyamata', '507'),
('50711', 'Nyarugenge', '507'),
('50712', 'Ririma', '507'),
('50713', 'Ruhuha', '507'),
('50714', 'Rweru', '507'),
('50715', 'Shyara', '507');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `NID_doc` varchar(255) NOT NULL,
  `certificate_doc` varchar(255) NOT NULL,
  `pass_photo` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `modified_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `gender`, `mobile_no`, `email`, `password`, `sector_id`, `NID_doc`, `certificate_doc`, `pass_photo`, `status`, `modified_on`, `added_on`) VALUES
(1, 'ntare', 'Jules', 'Male', '0780674459', 'julesntare@gmail.com', 'e744f57da9e5a4bb6ec8ba3bc0ad3e4e', 40401, '41811-143443-1-SM.pdf', '41811-143443-1-SM.pdf', '1631990493.png', '1', '2021-11-16 16:41:35', '2021-09-23 08:46:57'),
(2, 'jane', 'doe', 'Female', '0788888888', 'jane@gmail.com', 'e744f57da9e5a4bb6ec8ba3bc0ad3e4e', 10201, '20210912_134606[1].pdf', '41811-143443-1-SM.pdf', '1631990493.png', '1', '2021-11-16 16:38:07', '2021-09-23 09:00:57'),
(15, 'john', 'doe', 'Male', '0789495039', 'johnsmith@gmail.com', 'bf2bc2545a4a5f5683d9ef3ed0d977e0', 40301, 'DB Exam 2021 1st term.pdf', '20210912_134606[1].pdf', 'Capture-removebg-preview (1).png', '1', '2021-11-16 16:39:05', '2021-11-09 14:11:49'),
(22, 'john', 'pombe', 'Male', '0755443322', 'pombe@gmail.com', 'bf2bc2545a4a5f5683d9ef3ed0d977e0', 20401, 'DB Exam 2021 1st term.pdf', '20210912_134606[1].pdf', '1636473019.png', '0', '2021-11-16 16:50:05', '2021-11-09 17:50:18'),
(23, 'butatu', 'jean', 'Male', '0780776655', 'butatu@gmail.com', 'fd66a3c54898b2e70dc0536c392dc891', 40401, '20190509.pdf', '20190509.pdf', '1638439992.png', '1', '2021-12-02 12:13:11', '2021-12-02 12:13:11'),
(24, 'mb', 'mn', 'Male', '0783067953', 'mb@gmail.com', '202cb962ac59075b964b07152d234b70', 50601, 'PROJECT PROPOSAL.zip.pdf', 'CAT 1 LELEVEL 3 AI MARKING SCHEME.pdf', '1639378608.jpg', '1', '2021-12-13 08:56:48', '2021-12-13 08:56:48'),
(25, 'butatuwimana', 'mb', 'Male', '0783067953', 'm@gmail.com', '202cb962ac59075b964b07152d234b70', 40201, 'Architecture assignment.pdf', 'NKUNDA Kenny 17RP01428 Final report.pdf', '1639459055.jpg', '1', '2021-12-14 07:17:35', '2021-12-14 07:17:35'),
(26, 'butatuu', 'uwera', 'Male', '0780478646', 'b@mail.com', '202cb962ac59075b964b07152d234b70', 40501, 'NKUNDA Kenny 17RP01428 Final report.pdf', 'bookkexam.pdf', '1639541714.png', '1', '2021-12-15 06:15:14', '2021-12-15 06:15:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`districtcode`),
  ADD UNIQUE KEY `districtcode` (`districtcode`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indexes for table `exam_application`
--
ALTER TABLE `exam_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`);

--
-- Indexes for table `exam_enrolls`
--
ALTER TABLE `exam_enrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `exam_res_feedback`
--
ALTER TABLE `exam_res_feedback`
  ADD PRIMARY KEY (`erf_id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`provincecode`),
  ADD UNIQUE KEY `provincecode` (`provincecode`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD UNIQUE KEY `sectorcode` (`sectorcode`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `exam_application`
--
ALTER TABLE `exam_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `exam_enrolls`
--
ALTER TABLE `exam_enrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `exam_res_feedback`
--
ALTER TABLE `exam_res_feedback`
  MODIFY `erf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
