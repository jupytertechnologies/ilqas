-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 12:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilqas`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`) VALUES
(1, 'Buikwe'),
(2, 'Bukomansimbi'),
(3, 'Butambala'),
(4, 'Buvuma'),
(5, 'Gomba'),
(6, 'Kalangala'),
(7, 'Kalungu'),
(8, 'Kampala'),
(9, 'Kayunga'),
(10, 'Kiboga'),
(11, 'Kyankwanzi'),
(12, 'Luweero'),
(13, 'Lwengo'),
(14, 'Lyantonde'),
(15, 'Masaka'),
(16, 'Mityana'),
(17, 'Mpigi'),
(18, 'Mubende'),
(19, 'Mukono'),
(20, 'Nakaseke'),
(21, 'Nakasongola'),
(22, 'Rakai'),
(23, 'Sembabule'),
(24, 'Wakiso'),
(25, 'Amuria'),
(26, 'Budaka'),
(27, 'Bududa'),
(28, 'Bugiri'),
(29, 'Bukedea'),
(30, 'Bukwa'),
(31, 'Bulambuli'),
(32, 'Busia'),
(33, 'Butaleja'),
(34, 'Buyende'),
(35, 'Iganga'),
(36, 'Jinja'),
(37, 'Kaberamaido'),
(38, 'Kaliro'),
(39, 'Kamuli'),
(40, 'Kapchorwa'),
(41, 'Katakwi'),
(42, 'Kibuku'),
(43, 'Kumi'),
(44, 'Kween'),
(45, 'Luuka'),
(46, 'Manafwa'),
(47, 'Mayuge'),
(48, 'Mbale'),
(49, 'Namayingo'),
(50, 'Namutumba'),
(51, 'Ngora'),
(52, 'Pallisa'),
(53, 'Serere'),
(54, 'Sironko'),
(55, 'Soroti'),
(56, 'Tororo'),
(57, 'Abim'),
(58, 'Adjumani'),
(59, 'Agago'),
(60, 'Alebtong'),
(61, 'Amolatar'),
(62, 'Amudat'),
(63, 'Amuru'),
(64, 'Apac'),
(65, 'Arua'),
(66, 'Dokolo'),
(67, 'Gulu'),
(68, 'Kaabong'),
(69, 'Kitgum'),
(70, 'Koboko'),
(71, 'Kole'),
(72, 'Kotido'),
(73, 'Lamwo'),
(74, 'Lira'),
(75, 'Maracha'),
(76, 'Moroto'),
(77, 'Moyo'),
(78, 'Nakapiripirit'),
(79, 'Napak'),
(80, 'Nebbi'),
(81, 'Nwoya'),
(82, 'Otuke'),
(83, 'Oyam'),
(84, 'Pader'),
(85, 'Yumbe'),
(86, 'Zombo'),
(87, 'Buhweju'),
(88, 'Buliisa'),
(89, 'Bundibugyo'),
(90, 'Bushenyi'),
(91, 'Hoima'),
(92, 'Ibanda'),
(93, 'Isingiro'),
(94, 'Kabale'),
(95, 'Kabarole'),
(96, 'Kamwenge'),
(97, 'Kanungu'),
(98, 'Kasese'),
(99, 'Kibaale'),
(100, 'Kiruhura'),
(101, 'Kiryandongo'),
(102, 'Kisoro'),
(103, 'Kyegegwa'),
(104, 'Kyenjojo'),
(105, 'Masindi'),
(106, 'Mbarara'),
(107, 'Mitooma'),
(108, 'Ntoroko'),
(109, 'Ntungamo'),
(110, 'Rubirizi'),
(111, 'Rukungiri'),
(112, 'Sheema');

-- --------------------------------------------------------

--
-- Table structure for table `lab_details`
--

CREATE TABLE `lab_details` (
  `lab_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lab_name` text NOT NULL,
  `region` text NOT NULL,
  `district` text NOT NULL,
  `level` text NOT NULL,
  `street` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `sur_name` text NOT NULL,
  `last_name` text NOT NULL,
  `position` text NOT NULL,
  `admin_email` text NOT NULL,
  `admin_phone` text NOT NULL,
  `entity_name` text NOT NULL,
  `relationship` text NOT NULL,
  `payment_mode` text NOT NULL,
  `mobile_money` text NOT NULL,
  `bank_acc` text NOT NULL,
  `bank_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_details`
--

INSERT INTO `lab_details` (`lab_detail_id`, `user_id`, `lab_name`, `region`, `district`, `level`, `street`, `email`, `phone`, `sur_name`, `last_name`, `position`, `admin_email`, `admin_phone`, `entity_name`, `relationship`, `payment_mode`, `mobile_money`, `bank_acc`, `bank_name`) VALUES
(30, 7, 'Kirya', 'Entebbe', 'Apac', 'Specialized Reference', 'sfdsfsgdasfgs', 'ahmadabdulauthor@gmail.com', '+256705244266', 'Mulindwa ', 'Muhammad', 'Manager', 'ahmadabdulauthor@gmail.com', '0708233010', 'Kiryandongo GHL', 'Donor', 'Bank Transfer', '0705244266', '1031801593', 'Equity Bank');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'National Reference'),
(2, 'Specialized Reference'),
(3, 'Regional Referral'),
(4, 'General Hospital '),
(5, 'Health Centre IV'),
(6, 'Health Center III');

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `payment_mode_id` int(11) NOT NULL,
  `payment_mode_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`payment_mode_id`, `payment_mode_name`) VALUES
(1, 'Bank Transfer'),
(2, 'Mobile Money');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`) VALUES
(1, 'Arua'),
(2, 'Entebbe'),
(3, 'Fort Portal'),
(4, 'Gulu'),
(5, 'Hoima'),
(6, 'Jinja'),
(7, 'Kabale'),
(8, 'Kayunga'),
(9, 'Lira'),
(10, 'Masaka'),
(11, 'Mbale'),
(12, 'Mbarara'),
(13, 'Moroto'),
(14, 'Mubende'),
(15, 'Naguru'),
(16, 'Soroti');

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `relationship_id` int(11) NOT NULL,
  `relationship_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`relationship_id`, `relationship_name`) VALUES
(1, 'Owner/Director'),
(2, 'Donor'),
(3, 'Implementing Partner'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lab_accredited` int(11) NOT NULL,
  `login_status` int(11) NOT NULL,
  `login_date` datetime NOT NULL,
  `verified` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `lab_accredited`, `login_status`, `login_date`, `verified`, `token`) VALUES
(7, 'Mulindwa ', 'Muhammad', 'ahmadabdulauthor@gmail.com', '$2y$10$MslqXDLgnZTigNRIxfYtsOtwrcPv9ivzr1f0cydG5HuT3MXJ103x6', 1, 1, '2021-06-06 10:44:19', 'yes', '0a15ce7b6e576e193bac767c4af94b45fe0c24e0f18ae17da8267f3a317ce4dc416bddfa48ad1a5d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `lab_details`
--
ALTER TABLE `lab_details`
  ADD PRIMARY KEY (`lab_detail_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`payment_mode_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`relationship_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `lab_details`
--
ALTER TABLE `lab_details`
  MODIFY `lab_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `payment_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `relationship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
