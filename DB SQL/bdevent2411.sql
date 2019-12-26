-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 06:53 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdevent2411`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_token`
--

CREATE TABLE `access_token` (
  `id` int(11) NOT NULL,
  `adminId` int(11) DEFAULT NULL,
  `TOKEN` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_token`
--

INSERT INTO `access_token` (`id`, `adminId`, `TOKEN`, `date_time`) VALUES
(35, 1, '24ddeba896ac8747aa86a76ff586b870', '2019-11-26 09:52:57'),
(36, 1, '97b0aa198e870d7b9cd6423113610494', '2019-11-27 02:28:10'),
(37, 26, '355b75c4adade72797aee48a798618ed', '2019-11-27 02:30:57'),
(38, 26, 'd309f352dd664c784f32caa114965451', '2019-11-27 04:38:59'),
(39, 26, 'f6df40641fd441b72ede9b309a25c1c1', '2019-11-27 06:03:21'),
(40, 26, '4650c6404a99cccfd766a6c439adc5c7', '2019-11-27 07:55:00'),
(41, 26, 'a2cec671d925ca40e0608ebfe6e3f1f5', '2019-11-28 07:57:13'),
(42, 26, '61a02fb9c1c5c69f9e6a48fa672bdbc4', '2019-12-14 06:20:52'),
(43, 26, '9889ac2a940e14859912d9edde853afa', '2019-12-14 08:39:11'),
(44, 26, 'f773f5f17fea6d43510b9fed83487636', '2019-12-17 08:52:00'),
(45, 26, '3a445ff4168063b4063477a7eabcf4cf', '2019-12-18 03:30:41'),
(46, 26, '0cd386cfd2c6ac8af42fb7248ae61870', '2019-12-26 05:05:28'),
(47, 42, '471d4674c626dbae346772a75f8e8be7', '2019-12-26 05:34:28'),
(48, 26, '135fda3b634962479069fd784b374141', '2019-12-26 05:35:04'),
(49, 26, '7801fd9cd73ae078155d515cc8572cba', '2019-12-26 05:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `event_list`
--

CREATE TABLE `event_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `moto` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `event_date` varchar(255) DEFAULT NULL,
  `reg_start_date` varchar(255) DEFAULT NULL,
  `reg_end_date` varchar(255) DEFAULT NULL,
  `payable_amout` float DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_list`
--

INSERT INTO `event_list` (`id`, `name`, `moto`, `logo`, `event_date`, `reg_start_date`, `reg_end_date`, `payable_amout`, `create_date`, `status`) VALUES
(8, 'à¦ªà¦¾à¦²à¦¾à¦¬à¦¦à¦²\'à§¯à§© ( à¦¸à§‡à¦¶à¦¨ à§¨à§¦à§§à§©-à§§à§ª)', 'à¦›à§à¦Ÿà¦¿à¦° à¦˜à¦¨à§à¦Ÿà¦¾ à¦¬à¦¾à¦œà¦›à§‡ à¦, à¦†à¦®à¦°à¦¾ à¦¤à¦¿à¦°à¦¾à¦¨à¦¬à§à¦¬à¦‡ ....  à¦¸à¦®à¦¯à¦¼: à¦†à¦—à¦¾à¦®à§€ à§¨ à¦œà¦¾à¦¨à§à§Ÿà¦¾à¦°à§€, à¦°à¦¾à¦œà§ à¦­à¦¾à¦¸à§à¦•à¦°à§à¦¯', '2.jpg', '02-01-2020', '15-12-2019', '25-12-2019', 510, '2019-12-14 06:24:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `HALL_ID` int(11) NOT NULL,
  `HALL_NAME` varchar(255) DEFAULT NULL,
  `HALL_PASS` varchar(255) DEFAULT NULL,
  `CREATE_DATE_TIME` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`HALL_ID`, `HALL_NAME`, `HALL_PASS`, `CREATE_DATE_TIME`) VALUES
(1, 'Salimullah Muslim Hall', '12345678', '2019-11-17 06:37:50'),
(2, 'Jagannath Hall', '12345678', '2019-11-17 06:37:50'),
(3, 'Fazlul Huq Muslim Hall', '12345678', '2019-11-17 06:37:54'),
(4, 'Sergent Zahurul Haq Hall', '12345678', '2019-11-17 06:37:54'),
(5, 'Begum Ruqayyah Hall', '12345678', '2019-11-17 06:40:12'),
(6, 'P. J. Hartog International Hall', '12345678', '2019-11-17 06:40:12'),
(7, 'Begum Fazilatunnesa Mujib Hall', '12345678', '2019-11-17 06:40:15'),
(8, 'Master Da Surya Sen Hall', '12345678', '2019-11-17 06:40:15'),
(9, 'Haji Muhammad Mohsin Hall', '12345678', '2019-11-17 06:41:45'),
(10, 'Shahidullah Hall', '12345678', '2019-11-17 06:41:45'),
(11, 'Shamsunnahar Hall', '12345678', '2019-11-17 06:41:48'),
(12, 'Kabi Jasimuddin Hall', '12345678', '2019-11-17 06:41:48'),
(13, 'A.F. Rahman Hall', '12345678', '2019-11-17 06:42:56'),
(14, 'Muktijoddha Ziaur Rahman Hall', '12345678', '2019-11-17 06:42:56'),
(15, 'Kobi Sufia Kamal Hall', '12345678', '2019-11-17 06:42:58'),
(16, 'Nawab Faizunnessa Chowdhurani Chhatrinibash', '12345678', '2019-11-17 06:42:58'),
(17, 'Bijoy Ekattor Hall', '12345678', '2019-11-17 06:44:12'),
(18, 'Amar Ekushey Hall', '12345678', '2019-11-17 06:44:12'),
(19, 'Bangladesh Kuwit Maitry Hall', '12345678', '2019-11-17 06:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name_eng` varchar(255) DEFAULT NULL,
  `name_ban` varchar(255) DEFAULT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `mothers_name` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `reg_number` varchar(255) DEFAULT NULL,
  `halls` text DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `emg_contact` varchar(255) DEFAULT NULL,
  `current_address` text DEFAULT NULL,
  `current_district` varchar(255) DEFAULT NULL,
  `current_division` varchar(255) DEFAULT NULL,
  `parmenant_address` text DEFAULT NULL,
  `permanent_district` varchar(255) DEFAULT NULL,
  `permanent_division` varchar(255) DEFAULT NULL,
  `trx_id_number` text DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `orderID` text DEFAULT NULL,
  `t_shirt_size` varchar(255) DEFAULT NULL,
  `NID` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `payment_status` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `event_id`, `name_eng`, `name_ban`, `fathers_name`, `mothers_name`, `session`, `reg_number`, `halls`, `faculty`, `department`, `mobile_number`, `emg_contact`, `current_address`, `current_district`, `current_division`, `parmenant_address`, `permanent_district`, `permanent_division`, `trx_id_number`, `email_address`, `orderID`, `t_shirt_size`, `NID`, `gender`, `blood_group`, `photo`, `payment_status`, `status`, `create_date`) VALUES
(25, 8, 'Test', 'test', 'test2', 'test3', '2013-2014', '258564', 'Fazlul Huq Muslim Hall', NULL, 'fdsfsdf', '564564665654', NULL, NULL, NULL, NULL, 'fsdfsdf', 'Bandarban', NULL, '5646546', 'imran@gmmail.com', NULL, 'XL-Size', '', 'Male', 'O+', 'user.png', 0, 0, '2019-12-26 04:13:27'),
(26, 8, 'Md Imran Hosen', 'imran', 'Abdul Alim', 'Rupa Khatun', '2013-2014', '2619150011', 'Shahidullah Hall', NULL, 'CSIT', '01983912645', NULL, NULL, NULL, NULL, 'Kushtia', 'Kushtia', NULL, 'imran123456', 'imranhosen.csit@gmail.com', NULL, 'M-Size', '', 'Male', 'B+', '33275522.jpg', 0, 0, '2019-12-26 04:44:39'),
(27, 8, 'Md Imran Hosen', 'imran', 'Abdul Alim', 'Rupa Khatun', '2013-2014', '2619150011', 'Salimullah Muslim Hall', NULL, 'CSIT', '01983912645', NULL, NULL, NULL, NULL, 'Kushtia', 'Kushtia', NULL, 'imran123457', 'imranhosen.csit@gmail.com', NULL, 'M-Size', '', 'Male', 'B+', '33275522.jpg', 0, 0, '2019-12-26 04:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(11) NOT NULL,
  `SUBJECT_TITLE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `SUBJECT_TITLE`) VALUES
(1, 'Bangla'),
(2, 'English'),
(3, 'Arabic'),
(4, 'French Language and Literature Department'),
(5, 'Urdu Department'),
(6, 'Sanskrit section'),
(7, 'Pali and Buddhist Studies'),
(8, 'History'),
(9, 'Philosophy'),
(10, 'Islamic Studies'),
(11, 'History and Culture of Islam'),
(12, 'Informatics and Library Management'),
(13, 'Theater and Performance Studies'),
(14, 'Linguistics'),
(15, 'Music section'),
(16, 'World Religion and Culture Department'),
(17, 'Dance'),
(18, 'Physics'),
(19, 'Mathematic'),
(20, 'Chemistry'),
(21, 'Statistics'),
(22, 'Theoretical Physics'),
(23, 'Biomedical Physics and Technology'),
(24, 'Applied Mathematics Division'),
(25, 'Theoretical and Computational Chemistry'),
(26, 'Law'),
(27, 'Management'),
(28, 'Accounting and Information system '),
(29, 'Marketing'),
(30, 'Finance'),
(31, 'Banking and Insurance'),
(32, 'Management Information Systems'),
(33, 'International Business'),
(34, 'Turisum and Hospitality Management '),
(35, 'Organigetion Strategi and Lidership '),
(36, 'Social faculty'),
(37, 'Economics'),
(38, 'Political Science'),
(39, 'International Relations'),
(40, 'Sociology'),
(41, 'Mass Communication and Journalism'),
(42, 'Public Administration'),
(43, 'Anthropology'),
(44, 'Population Science'),
(45, 'Peace and Conflict Studies'),
(46, 'Women and Gender Studies'),
(47, 'Development Studies'),
(48, 'Television, Film and Photography'),
(49, 'Criminology'),
(50, 'Communication Disorders'),
(51, 'Printing and Publication Studies'),
(52, 'Japanis Studies'),
(53, 'Biology'),
(54, 'Soil, Water and Environment'),
(55, 'Botany'),
(56, 'Zoology'),
(57, 'Biochemistry and Motivation Science'),
(58, 'Psychology'),
(59, 'Biology'),
(60, 'Fisheries'),
(61, 'Clinical Psychology'),
(62, 'Gene Engineering and Biotechnology'),
(63, 'Educational and Counciling Psychology'),
(64, 'Pharmacy'),
(65, 'Pharmacy'),
(66, 'Pharmacheutical Chemistry'),
(67, 'Clinical Pharmacy and Pharmacology'),
(68, 'Drug Technology'),
(69, 'Earth and Environmental Sciences'),
(70, 'Geography and Environment'),
(71, 'Geology'),
(72, 'Marine Science'),
(73, 'Disaster Science and Management'),
(74, 'Weather Science'),
(75, 'Egnineering and Technology'),
(76, 'Electrical and Electronic Engineering'),
(77, 'Applied Chemistry and Chemistry'),
(78, 'Computer Science and Engineering'),
(79, 'Nuclear Engineering'),
(80, 'Robotics and Mechatronics Engineering'),
(81, 'Faculty of Arts'),
(82, 'Department of Drawing and Painting'),
(83, 'Graphic Design'),
(84, 'Print Making'),
(85, 'Oriental Art'),
(86, 'Pottery'),
(87, 'Sculpture'),
(88, 'Crafts'),
(89, 'Art History');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` int(11) DEFAULT 2,
  `event_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `type`, `event_id`, `create_date`) VALUES
(26, 'Admin', 'imranhosen.csit@admin.com', '25d55ad283aa400af464c76d713c07ad', 2, NULL, '2019-07-17 04:35:42'),
(42, 'Md Imran Hosen', 'imranhosen.csit@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 8, '2019-12-26 05:32:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`HALL_ID`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_token`
--
ALTER TABLE `access_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `event_list`
--
ALTER TABLE `event_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `HALL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
