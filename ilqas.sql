-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 08:21 PM
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
-- Table structure for table `accredited_status`
--

CREATE TABLE `accredited_status` (
  `accredited_id` int(11) NOT NULL,
  `accredited_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `schedule_name` text NOT NULL,
  `parameter_name` text NOT NULL,
  `other_parameters` text NOT NULL,
  `equipment` text NOT NULL,
  `technique` text NOT NULL,
  `is_rapid_test` text NOT NULL,
  `request_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `cost` int(11) NOT NULL,
  `frequency` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `invoice_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipment_id` int(11) NOT NULL,
  `equipment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parameter_count` int(11) NOT NULL,
  `invoice_details` text NOT NULL,
  `invoice_amount` int(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `payment_status` int(11) NOT NULL,
  `panel_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `user_id`, `parameter_count`, `invoice_details`, `invoice_amount`, `invoice_date`, `payment_status`, `panel_status`) VALUES
(1, 12, 2, '[{\"cart_id\":\"17\",\"user_id\":\"12\",\"category_name\":\"Platelet function tests:\",\"schedule_name\":\"Monthly\",\"parameter_name\":\"Blood Film comment\",\"other_parameters\":\"N/A\",\"equipment\":\"Microscope\",\"technique\":\"Culture and Sensitivity\",\"is_rapid_test\":\"no\",\"request_date\":\"2021-06-22 20:38:00.000000\",\"cost\":\"20000\",\"frequency\":\"12\",\"amount\":\"240000\",\"invoice_name\":\"Muhammad\"},{\"cart_id\":\"18\",\"user_id\":\"12\",\"category_name\":\"Immune haematology:\",\"schedule_name\":\"Twice a year\",\"parameter_name\":\"Reticulocyte count(RET#)\",\"other_parameters\":\"N/A\",\"equipment\":\"sdfgsd\",\"technique\":\"sfgsdf\",\"is_rapid_test\":\"yes\",\"request_date\":\"2021-06-22 20:38:21.000000\",\"cost\":\"20000\",\"frequency\":\"2\",\"amount\":\"40000\",\"invoice_name\":\"Muhammad\"}]', 280000, '2021-06-22', 2, 4),
(2, 12, 1, '[{\"cart_id\":\"19\",\"user_id\":\"12\",\"category_name\":\"Parasitology\",\"schedule_name\":\"Twice a year\",\"parameter_name\":\"Medium Fluorescen Ratio (MFR)\",\"other_parameters\":\"N/A\",\"equipment\":\"Bactec\",\"technique\":\"ZN\",\"is_rapid_test\":\"no\",\"request_date\":\"2021-06-22 20:39:02.000000\",\"cost\":\"20000\",\"frequency\":\"2\",\"amount\":\"40000\",\"invoice_name\":\"dfgds\"}]', 40000, '2021-06-22', 2, 1),
(3, 12, 3, '[{\"cart_id\":\"20\",\"user_id\":\"12\",\"category_name\":\"Plasmin Inhibitor\",\"schedule_name\":\"Twice a year\",\"parameter_name\":\"White cell count(WBC ? BF)\",\"other_parameters\":\"N/A\",\"equipment\":\"Microscope\",\"technique\":\"sfgsdf\",\"is_rapid_test\":\"no\",\"request_date\":\"2021-06-22 20:57:42.000000\",\"cost\":\"20000\",\"frequency\":\"2\",\"amount\":\"40000\",\"invoice_name\":\"Muhammad\"},{\"cart_id\":\"21\",\"user_id\":\"12\",\"category_name\":\"Blood Transfusion services\",\"schedule_name\":\"Three times a year\",\"parameter_name\":\"Reticulocyte percentage (RET%)\",\"other_parameters\":\"N/A\",\"equipment\":\"Bactec\",\"technique\":\"ZN\",\"is_rapid_test\":\"no\",\"request_date\":\"2021-06-22 20:58:00.000000\",\"cost\":\"20000\",\"frequency\":\"3\",\"amount\":\"60000\",\"invoice_name\":\"Muhammad\"},{\"cart_id\":\"22\",\"user_id\":\"12\",\"category_name\":\"Bacteriology\",\"schedule_name\":\"Once a year\",\"parameter_name\":\"Immature Reticulocyte fraction (IRF)\",\"other_parameters\":\"N/A\",\"equipment\":\"sdfgsd\",\"technique\":\"sfgsdf\",\"is_rapid_test\":\"no\",\"request_date\":\"2021-06-22 20:58:20.000000\",\"cost\":\"20000\",\"frequency\":\"1\",\"amount\":\"20000\",\"invoice_name\":\"Muhammad\"}]', 120000, '2021-06-22', 2, 1),
(4, 12, 1, '[{\"cart_id\":\"23\",\"user_id\":\"12\",\"category_name\":\"Mycology\",\"schedule_name\":\"Every 2 months\",\"parameter_name\":\"Blood Film comment\",\"other_parameters\":\"N/A\",\"equipment\":\"Microscope\",\"technique\":\"sfgsdf\",\"is_rapid_test\":\"no\",\"request_date\":\"2021-06-22 20:59:12.000000\",\"cost\":\"20000\",\"frequency\":\"6\",\"amount\":\"120000\",\"invoice_name\":\"\"}]', 120000, '2021-06-22', 2, 4);

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
(30, 7, 'Masindi', 'Kabale', 'Arua', 'General Hospital', 'Kampala', 'muwongec@gmail.com', '0703309884', 'Mulindwa ', 'MUHAMMAD', 'Manager', 'muwongec@gmail.com', '0703309884', 'Kiryandongo GHL', 'Owner/Director', 'Mobile Money', '0705244266', '1031801593', 'Equity Bank'),
(32, 12, 'Masindi', 'Moroto', 'Agago', 'General Hospital', 'Ndejje', 'ahmadabdulauthor@gmail.com', '0708233010', 'Mulindwa ', 'MUHAMMAD', 'Manager', 'ahmadabdulauthor@gmail.com', '0708233010', 'Kiryandongo GHL', 'Implementing Partner', 'Mobile Money', '0705244266', '1031801593', 'Equity Bank');

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
-- Table structure for table `panel_status`
--

CREATE TABLE `panel_status` (
  `panel_status_id` int(11) NOT NULL,
  `status_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panel_status`
--

INSERT INTO `panel_status` (`panel_status_id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'Accepted'),
(3, 'Rejected'),
(4, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `test_id` int(11) NOT NULL,
  `test_category_id` int(11) NOT NULL,
  `test_name` text NOT NULL,
  `cost` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`test_id`, `test_category_id`, `test_name`, `cost`) VALUES
(1, 1, 'Full blood count (FHG)', 150000),
(2, 1, 'Hemoglobin estimation', 50000),
(3, 1, 'White cell total & Differential count ', 100000),
(4, 1, 'Blood Film comment', 20000),
(5, 2, 'Reticulocyte percentage (RET%)', 20000),
(6, 2, 'Reticulocyte count(RET#)', 20000),
(7, 2, 'Immature Reticulocyte fraction (IRF)', 20000),
(8, 2, 'Low Fluorescent Ratio (LFR)', 20000),
(9, 2, 'Medium Fluorescen Ratio (MFR)', 20000),
(10, 2, 'High Fluorescen Ratio (HFR)', 20000),
(11, 2, 'Reticulocyte hemoglobin (RET-HE)', 20000),
(12, 2, 'Immacure RBC hemoglobin (RBC ? HE)', 20000),
(13, 3, 'White cell count(WBC ? BF)', 20000),
(14, 3, 'Red blood cell (RBC ? BF)', 20000),
(15, 3, 'Mono Nuclear cell count(MN)', 20000),
(16, 3, 'Polymorph nuclear cell count (PMN)', 20000),
(17, 3, 'MN%', 20000),
(18, 3, 'PMN%', 20000),
(19, 3, 'Total Cell count (TC-BF#)', 20000),
(20, 3, 'PROGENITOR CELL# (HPC)', 20000),
(21, 4, 'Sickle cell screening', 100000),
(22, 4, 'HB electrophoresis test (Sickle cell)', 100000),
(23, 4, 'HB ? F', 100000),
(24, 4, 'HB ? S', 100000),
(25, 4, 'HB-A2', 100000),
(26, 4, 'HBA', 100000),
(27, 4, 'Immunotyping(light and heavy chains)', 100000),
(28, 5, 'Thin film test', 100000),
(29, 5, 'Clot retraction test', 100000),
(30, 5, 'Thromboerythrogram,', 100000),
(31, 6, 'Bleeading and Clotting Time ', 100000),
(32, 6, 'Thrombin clotting time(TT)', 100000),
(33, 6, 'Prothrombin time (PT)', 100000),
(34, 6, 'Thrombin time in the presence of Protamine Sulphate', 100000),
(35, 6, 'Activated partial Thromboplastin Time (APTT)', 100000),
(36, 6, 'Fibrinogen test (Modified Clauss Assay)', 100000),
(37, 6, 'Fibrinogen Antigen Assay by RIA', 100000),
(38, 6, 'Repitlase Time', 100000),
(39, 6, 'Batroxobin', 100000),
(40, 6, 'Factor Assays(ii)', 100000),
(41, 6, 'Factor Assays(v)', 100000),
(42, 6, 'Factor Assays(vii)', 100000),
(43, 6, 'Factor Assays(viii)', 100000),
(44, 6, 'Factor Assays(ix)', 100000),
(45, 6, 'Factor Assays(x)', 100000),
(46, 6, 'One- stage Intrinsic Assay of prekallikren(PKK), and High Molecular Weight Kininogen (HMWK)', 100000),
(47, 7, 'Erythrocyte sedimentation rate', 100000),
(48, 7, 'D.DIMER', 100000),
(49, 7, 'CRP test', 100000),
(50, 7, 'Peripheral Film Comment', 100000),
(51, 7, 'Lupus erythromatous test', 100000),
(52, 7, 'ANT THROMBIN(AT)', 100000),
(53, 7, 'Anti-Thrombin Liquid(AT)', 100000),
(54, 7, 'ANTI Xa', 100000),
(55, 7, 'Plasmin Inhibitor(PI)', 100000),
(56, 8, 'ABO grouping ', 50000),
(57, 8, 'Rh grouping ', 50000),
(58, 8, 'Compatibility testing', 50000),
(59, 8, 'Direct Coombs test ', 50000),
(60, 8, 'Indirect Coombs test ', 50000),
(61, 8, 'Immediate Spin Cross Match(ISCM)', 50000),
(62, 8, 'Du test', 50000),
(63, 8, 'Anti-body typing', 50000),
(64, 8, 'Weak D Typing', 50000),
(65, 9, 'CD4,CD3,CD8 Counts and Ratios ', 50000),
(66, 9, 'CD3/CD8 % ', 50000),
(67, 10, 'AFB  test', 50000),
(68, 10, 'Stool analysis', 50000),
(69, 10, 'Urine analysis', 50000),
(70, 10, 'CSF Analysis', 50000),
(71, 10, 'Semen analysis', 50000),
(72, 11, 'Malaria test', 50000),
(73, 11, 'Filaria test', 50000),
(74, 11, 'Trypanosoma test', 50000),
(75, 11, 'Leishmania test', 50000),
(76, 11, 'Skin Snip test ', 50000),
(77, 11, 'Boleria test', 50000),
(78, 12, 'High Viginal Swab (HVS) ananlysis ', 100000),
(79, 12, 'Pus Swab analysis', 100000),
(80, 12, 'Wound swab analysis', 100000),
(81, 12, 'Eye Swab analysis', 100000),
(82, 12, 'Nasal swab analysis ', 100000),
(83, 12, 'Ear swabanalysis', 100000),
(84, 12, 'Throat swab analysis ', 100000),
(85, 12, 'Body fluid aspirates (Effusions) analysis', 100000),
(86, 12, 'Endotracheal Fliud analysis ', 100000),
(87, 12, 'Specific Site Hygiene testing (ward, theatre, personnel etc.)', 100000),
(88, 12, 'Blood culture ', 100000),
(89, 12, 'Gastric Aspirate ', 100000),
(90, 12, 'Nasopharyngeal/oropharyngeal swab', 100000),
(91, 12, 'Cervical /Endo-cervical swab', 100000),
(92, 12, 'Urethral /Rectal Swab ', 100000),
(93, 12, 'Catheter Tips', 100000),
(94, 12, 'Lymph Node Aspirate ', 100000),
(95, 12, 'Corneal scraping ', 100000),
(96, 12, 'Skin/Nail/Hair Scrapping ', 20000),
(97, 13, 'KOH', 20000),
(99, 13, 'Mycology Grocotts\' silver stain', 100000),
(100, 13, 'Toluidine Blue-O for pneumocyctis jiroveci', 100000),
(101, 13, 'Mycology Culture and sensitivity', 100000),
(102, 13, 'Fungal Identification Tests', 100000),
(103, 13, 'Fungal susceptibility tests', 100000),
(104, 14, 'PAP Smear ', 100000),
(105, 14, 'Biopsy Tissue ', 100000),
(106, 14, 'Cytological test', 100000),
(107, 14, 'Histological test', 100000),
(108, 15, 'HIV testing ', 50000),
(109, 15, 'Syphilis  test ', 50000),
(110, 15, 'Pregnancy test ', 50000),
(111, 15, 'Brucella agglutin test ', 50000),
(112, 15, 'Rheumatoid factor', 50000),
(113, 15, 'Typhoid IgM&IgG test', 50000),
(114, 15, 'Helicobater pylori IgG (Feacal)', 50000),
(115, 15, 'Hepatitis B test', 100000),
(116, 15, 'Hepatitis C  test', 100000),
(117, 15, 'Hep B Core Ag Test ', 100000),
(118, 15, 'Hepatitis A Rapid  test', 100000),
(119, 15, 'Cryptoccocal Antigen test ', 100000),
(120, 15, 'Anti Streptolysin O-Test (ASOT)', 100000),
(121, 15, 'Toxoplasma IgG and IgM', 100000),
(122, 15, 'TB Rapid Test (LAM)', 100000),
(123, 15, 'Measles IgM test ', 100000),
(124, 15, 'Rubella IgG and IgM Test ', 100000),
(125, 15, 'Polio Test', 100000),
(126, 16, 'SGOT (AST) ', 30000),
(127, 16, 'SGPT (ALT) ', 30000),
(128, 16, 'ALP', 30000),
(129, 16, 'Direct bilirubin', 30000),
(130, 16, 'Total Bilirubin', 30000),
(131, 16, 'Indirect bilirubin ', 30000),
(132, 16, 'Total protein ', 30000),
(133, 16, 'Albumin ', 30000),
(134, 16, 'GGT', 30000),
(135, 17, 'Urea', 30000),
(136, 17, 'Creatinine', 30000),
(137, 17, 'Creatinine Clearance', 30000),
(138, 17, 'Inulin Clearance', 30000),
(139, 17, 'Cystatin C', 30000),
(140, 18, 'Triglycerides', 30000),
(141, 18, 'Total Cholesterol ', 30000),
(142, 18, 'Low Density Lipoproteins (LDL) LDLc', 30000),
(143, 18, 'High Density Lipoproteins (HDL) HDLc', 30000),
(144, 19, 'Potassium', 30000),
(145, 19, 'Sodium', 30000),
(146, 19, 'Chloride', 30000),
(147, 19, 'Lithium', 30000),
(148, 19, 'Calcium', 30000),
(149, 19, 'Magnesium', 30000),
(150, 19, 'Phosphate', 30000),
(151, 19, 'Bicarbonate', 30000),
(152, 20, 'Glucose', 30000),
(153, 20, 'Amylase - Total ', 30000),
(154, 20, 'Amylase - Pancreatic ', 30000),
(155, 20, 'Lipase', 50000),
(156, 20, 'Uric Acid', 50000),
(157, 21, 'CK-MB', 50000),
(158, 21, 'CK- NAC (Total)', 50000),
(159, 21, 'LDH', 50000),
(160, 21, 'Troponins (C,T,I)', 50000),
(161, 21, 'hs-CRP', 50000),
(162, 21, 'ASO (RHD)', 50000),
(163, 21, 'NT- Pro BNP', 50000),
(164, 21, 'Myoglobin', 50000),
(165, 22, 'ALP', 50000),
(166, 22, 'Calcium', 50000),
(167, 22, 'Phosphate', 50000),
(168, 23, 'K, Na, Cl', 50000),
(169, 23, 'HCO3', 50000),
(170, 23, 'PO2', 50000),
(171, 23, 'PCO2', 50000),
(172, 23, 'Ca2+ (Free & Bound)', 50000),
(173, 23, 'PH', 50000),
(174, 23, 'Hb', 50000),
(175, 23, 'HCT', 50000),
(176, 23, 'HCO3', 50000),
(177, 24, 'Glycocylated Haemoglobin', 50000),
(178, 24, 'Lactic acid ', 50000),
(179, 24, 'Vitamin B12 ', 50000),
(180, 24, 'Vitamin C', 50000),
(181, 24, 'Iron', 50000),
(182, 24, 'Ferritin', 50000),
(183, 24, 'Transferrin', 50000),
(184, 24, 'G6PD', 50000),
(185, 24, 'Folate', 50000),
(186, 25, 'Free T3', 50000),
(187, 25, 'Free T4', 50000),
(188, 25, 'Total T4', 50000),
(189, 25, 'Total T3 ', 50000),
(190, 25, 'TSH', 50000),
(191, 25, 'Anti -TSH-IgG', 50000),
(192, 25, 'PTHH', 50000),
(193, 26, 'Follicle Stimulating Hormone (FSH)', 50000),
(194, 26, 'Lutenizing Hormone (LH)', 50000),
(195, 26, 'Cortisol', 50000),
(196, 26, 'Progesterone', 50000),
(197, 26, 'Testosterone', 50000),
(198, 26, 'Oestrogen', 50000),
(199, 26, '?-hCG', 50000),
(200, 26, 'Oestrone (E1) ', 50000),
(201, 26, 'Oestradiol (E2)', 50000),
(202, 26, 'Oestriol (E3)', 50000),
(203, 26, 'DHEA', 50000),
(204, 26, 'DHEA-S', 50000),
(205, 26, 'Prolactin ', 50000),
(206, 27, '?-FP', 50000),
(207, 27, 'PSA', 50000),
(208, 27, 'f PSA', 50000),
(209, 27, 'CA 125 Ag', 50000),
(210, 27, 'CA 19-9 Ag', 50000),
(211, 27, 'CA 15-3 Ag', 50000),
(212, 27, 'CA 72-4 Ag', 50000),
(213, 27, 'CEA', 50000),
(214, 27, '?- h CG', 50000),
(215, 27, 'NSE', 50000),
(216, 27, 'S-100', 50000),
(217, 27, 'Cyfra 21-1 ', 50000),
(218, 27, 'Enolase', 50000),
(219, 28, 'Bilirubin', 50000),
(220, 28, 'Urobilinogen', 50000),
(221, 28, 'Glucose', 50000),
(222, 28, 'Ketones', 50000),
(223, 28, 'Microalbumin', 50000),
(224, 28, 'Albumin', 50000),
(225, 29, 'Specific Gravity', 50000),
(226, 29, 'pH', 50000),
(227, 29, 'Bences Jones ', 50000),
(228, 30, 'Protein', 50000),
(229, 30, 'Glucose', 50000),
(230, 30, 'Globulins', 50000),
(231, 30, 'VMA', 50000),
(232, 31, 'Helicobacter pylori IgG/IgM', 50000),
(233, 31, 'HBsAg IgG', 50000),
(234, 31, 'HBcAg IgG', 50000),
(235, 31, 'HBeAg IgG', 50000),
(236, 31, 'Toxo IgG/IgM', 50000),
(237, 31, 'CMV IgG/IgM', 50000),
(238, 31, 'HCV IgG/IgM', 50000),
(239, 31, 'Rubella IgG/IgM', 50000),
(240, 31, 'Measles IgG/IgM', 50000),
(241, 31, 'Mumps IgG/IgM', 50000),
(242, 31, 'HSV 1 IgG/IgM', 50000),
(243, 31, 'HSV 2 IgG/IgM', 50000),
(244, 31, 'HZV IgG/IgM', 50000),
(245, 32, 'Gene Xpert', 50000),
(246, 32, 'Viral load for HIV Virus ', 50000),
(247, 32, 'Viral load for HEPATITIS B Virus ', 50000),
(248, 32, 'TB DNA PCR', 50000),
(249, 33, 'LPA', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_made`
--

CREATE TABLE `payment_made` (
  `payment_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `payment_amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `status_id` int(11) NOT NULL,
  `status_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`status_id`, `status_name`) VALUES
(1, 'Paid'),
(2, 'Not yet Paid');

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
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL,
  `other_parameters` text NOT NULL,
  `equipment` text NOT NULL,
  `technique` text NOT NULL,
  `is_rapid_test` text NOT NULL,
  `request_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `invoice_id` int(11) NOT NULL,
  `payment__status` int(11) NOT NULL,
  `payment__id` int(11) NOT NULL,
  `session_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_name`) VALUES
(1, 'Monthly'),
(2, 'Every 2 months'),
(3, 'Quarterly'),
(4, 'Twice a year'),
(5, 'Once a year'),
(6, 'Three times a year');

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE `test_category` (
  `test_category_id` int(11) NOT NULL,
  `test_category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`test_category_id`, `test_category_name`) VALUES
(1, 'Hematology'),
(2, 'Reticulocyte test:'),
(3, 'Body fluid analysis:'),
(4, 'Sickle cell test:'),
(5, 'Platelet function tests:'),
(6, 'Coagulation Tests'),
(7, 'Plasmin Inhibitor '),
(8, 'Blood Transfusion services'),
(9, 'Immune haematology:'),
(10, 'Microbiology '),
(11, 'Bacteriology'),
(12, 'Parasitology '),
(13, 'Swab analysis:'),
(14, 'Mycology '),
(15, 'Histology / Cytology '),
(16, 'Serology '),
(17, 'LFTs'),
(18, 'RFTs'),
(19, 'Lipid profile'),
(20, 'Electrolytes/ Extended Electrolytes'),
(21, 'Pancreatic function tests'),
(22, 'Cardiac Profile '),
(23, 'Bone Profile '),
(24, 'Blood gases ABG'),
(25, 'Metabolic Tests'),
(26, 'Thyroid Function Tests'),
(27, 'Fertility Hormones'),
(28, 'Tumor Markers'),
(29, 'Urine Chemistry'),
(30, 'Urine Electrophoresis'),
(31, 'CSF Chemistry'),
(32, 'Infectious Disease'),
(33, 'PCR'),
(34, 'RDT - Immunochromatophy tests');

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
(7, 'Mulindwa ', 'Muhammad', 'ahmadabdulauthor@gmail.com', '$2y$10$MslqXDLgnZTigNRIxfYtsOtwrcPv9ivzr1f0cydG5HuT3MXJ103x6', 1, 1, '2021-06-18 01:26:35', 'yes', '0a15ce7b6e576e193bac767c4af94b45fe0c24e0f18ae17da8267f3a317ce4dc416bddfa48ad1a5d'),
(12, 'SHAFIQ', 'NAKIMULI', 'mmuhammad@aglobalhf.org', '$2y$10$UFtcKEAN2xSGXL3iVY6rEuyrW7Wffn3aR2JbX4A14vllbtDx7uI0y', 2, 1, '2021-06-22 20:42:19', 'yes', '26de0fb63840706db7afeb6030705ef1832256eca951a9a2a7596f48edd0b567bd57a63b573b60bf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accredited_status`
--
ALTER TABLE `accredited_status`
  ADD PRIMARY KEY (`accredited_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `equipment_id` (`equipment`(768)),
  ADD KEY `labtest_id` (`parameter_name`(768)),
  ADD KEY `request_ibfk_1` (`user_id`),
  ADD KEY `schedule_id` (`schedule_name`(768));

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

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
-- Indexes for table `panel_status`
--
ALTER TABLE `panel_status`
  ADD PRIMARY KEY (`panel_status_id`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `payment_made`
--
ALTER TABLE `payment_made`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`payment_mode_id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`status_id`);

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
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `equipment_id` (`equipment`(768)),
  ADD KEY `labtest_id` (`parameter_id`),
  ADD KEY `request_ibfk_1` (`user_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `payment__id` (`payment__id`),
  ADD KEY `payment__status` (`payment__status`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `test_category`
--
ALTER TABLE `test_category`
  ADD PRIMARY KEY (`test_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accredited_status`
--
ALTER TABLE `accredited_status`
  MODIFY `accredited_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lab_details`
--
ALTER TABLE `lab_details`
  MODIFY `lab_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `panel_status`
--
ALTER TABLE `panel_status`
  MODIFY `panel_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `payment_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `test_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
