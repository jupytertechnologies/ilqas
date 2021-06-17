-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 07:17 PM
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
(30, 7, 'Masindi', 'Kabale', 'Arua', 'General Hospital', 'Kampala', 'muwongec@gmail.com', '0703309884', 'Mulindwa ', 'MUHAMMAD', 'Manager', 'muwongec@gmail.com', '0703309884', 'Kiryandongo GHL', 'Owner/Director', 'Mobile Money', '0705244266', '1031801593', 'Equity Bank');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `test_id` int(11) NOT NULL,
  `test_category_id` int(11) NOT NULL,
  `test_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`test_id`, `test_category_id`, `test_name`) VALUES
(1, 1, 'Full blood count (FHG)'),
(2, 1, 'Hemoglobin estimation'),
(3, 1, 'White cell total & Differential count '),
(4, 1, 'Blood Film comment'),
(5, 2, 'Reticulocyte percentage (RET%)'),
(6, 2, 'Reticulocyte count(RET#)'),
(7, 2, 'Immature Reticulocyte fraction (IRF)'),
(8, 2, 'Low Fluorescent Ratio (LFR)'),
(9, 2, 'Medium Fluorescen Ratio (MFR)'),
(10, 2, 'High Fluorescen Ratio (HFR)'),
(11, 2, 'Reticulocyte hemoglobin (RET-HE)'),
(12, 2, 'Immacure RBC hemoglobin (RBC ? HE)'),
(13, 3, 'White cell count(WBC ? BF)'),
(14, 3, 'Red blood cell (RBC ? BF)'),
(15, 3, 'Mono Nuclear cell count(MN)'),
(16, 3, 'Polymorph nuclear cell count (PMN)'),
(17, 3, 'MN%'),
(18, 3, 'PMN%'),
(19, 3, 'Total Cell count (TC-BF#)'),
(20, 3, 'PROGENITOR CELL# (HPC)'),
(21, 4, 'Sickle cell screening'),
(22, 4, 'HB electrophoresis test (Sickle cell)'),
(23, 4, 'HB ? F'),
(24, 4, 'HB ? S'),
(25, 4, 'HB-A2'),
(26, 4, 'HBA'),
(27, 4, 'Immunotyping(light and heavy chains)'),
(28, 5, 'Thin film test'),
(29, 5, 'Clot retraction test'),
(30, 5, 'Thromboerythrogram,'),
(31, 6, 'Bleeading and Clotting Time '),
(32, 6, 'Thrombin clotting time(TT)'),
(33, 6, 'Prothrombin time (PT)'),
(34, 6, 'Thrombin time in the presence of Protamine Sulphate'),
(35, 6, 'Activated partial Thromboplastin Time (APTT)'),
(36, 6, 'Fibrinogen test (Modified Clauss Assay)'),
(37, 6, 'Fibrinogen Antigen Assay by RIA'),
(38, 6, 'Repitlase Time'),
(39, 6, 'Batroxobin'),
(40, 6, 'Factor Assays(ii)'),
(41, 6, 'Factor Assays(v)'),
(42, 6, 'Factor Assays(vii)'),
(43, 6, 'Factor Assays(viii)'),
(44, 6, 'Factor Assays(ix)'),
(45, 6, 'Factor Assays(x)'),
(46, 6, 'One- stage Intrinsic Assay of prekallikren(PKK), and High Molecular Weight Kininogen (HMWK)'),
(47, 7, 'Erythrocyte sedimentation rate'),
(48, 7, 'D.DIMER'),
(49, 7, 'CRP test'),
(50, 7, 'Peripheral Film Comment'),
(51, 7, 'Lupus erythromatous test'),
(52, 7, 'ANT THROMBIN(AT)'),
(53, 7, 'Anti-Thrombin Liquid(AT)'),
(54, 7, 'ANTI Xa'),
(55, 7, 'Plasmin Inhibitor(PI)'),
(56, 8, 'ABO grouping '),
(57, 8, 'Rh grouping '),
(58, 8, 'Compatibility testing'),
(59, 8, 'Direct Coombs test '),
(60, 8, 'Indirect Coombs test '),
(61, 8, 'Immediate Spin Cross Match(ISCM)'),
(62, 8, 'Du test'),
(63, 8, 'Anti-body typing'),
(64, 8, 'Weak D Typing'),
(65, 9, 'CD4,CD3,CD8 Counts and Ratios '),
(66, 9, 'CD3/CD8 % '),
(67, 10, 'AFB  test'),
(68, 10, 'Stool analysis'),
(69, 10, 'Urine analysis'),
(70, 10, 'CSF Analysis'),
(71, 10, 'Semen analysis'),
(72, 11, 'Malaria test'),
(73, 11, 'Filaria test'),
(74, 11, 'Trypanosoma test'),
(75, 11, 'Leishmania test'),
(76, 11, 'Skin Snip test '),
(77, 11, 'Boleria test'),
(78, 12, 'High Viginal Swab (HVS) ananlysis '),
(79, 12, 'Pus Swab analysis'),
(80, 12, 'Wound swab analysis'),
(81, 12, 'Eye Swab analysis'),
(82, 12, 'Nasal swab analysis '),
(83, 12, 'Ear swabanalysis'),
(84, 12, 'Throat swab analysis '),
(85, 12, 'Body fluid aspirates (Effusions) analysis'),
(86, 12, 'Endotracheal Fliud analysis '),
(87, 12, 'Specific Site Hygiene testing (ward, theatre, personnel etc.)'),
(88, 12, 'Blood culture '),
(89, 12, 'Gastric Aspirate '),
(90, 12, 'Nasopharyngeal/oropharyngeal swab'),
(91, 12, 'Cervical /Endo-cervical swab'),
(92, 12, 'Urethral /Rectal Swab '),
(93, 12, 'Catheter Tips'),
(94, 12, 'Lymph Node Aspirate '),
(95, 12, 'Corneal scraping '),
(96, 12, 'Skin/Nail/Hair Scrapping '),
(97, 13, 'KOH'),
(98, 13, 'Lactophenol cotton blue '),
(99, 13, 'Mycology Grocotts\' silver stain'),
(100, 13, 'Toluidine Blue-O for pneumocyctis jiroveci'),
(101, 13, 'Mycology Culture and sensitivity'),
(102, 13, 'Fungal Identification Tests'),
(103, 13, 'Fungal susceptibility tests'),
(104, 14, 'PAP Smear '),
(105, 14, 'Biopsy Tissue '),
(106, 14, 'Cytological test'),
(107, 14, 'Histological test'),
(108, 15, 'HIV testing '),
(109, 15, 'Syphilis  test '),
(110, 15, 'Pregnancy test '),
(111, 15, 'Brucella agglutin test '),
(112, 15, 'Rheumatoid factor'),
(113, 15, 'Typhoid IgM&IgG test'),
(114, 15, 'Helicobater pylori IgG (Feacal)'),
(115, 15, 'Hepatitis B test'),
(116, 15, 'Hepatitis C  test'),
(117, 15, 'Hep B Core Ag Test '),
(118, 15, 'Hepatitis A Rapid  test'),
(119, 15, 'Cryptoccocal Antigen test '),
(120, 15, 'Anti Streptolysin O-Test (ASOT)'),
(121, 15, 'Toxoplasma IgG and IgM'),
(122, 15, 'TB Rapid Test (LAM)'),
(123, 15, 'Measles IgM test '),
(124, 15, 'Rubella IgG and IgM Test '),
(125, 15, 'Polio Test'),
(126, 16, 'SGOT (AST) '),
(127, 16, 'SGPT (ALT) '),
(128, 16, 'ALP'),
(129, 16, 'Direct bilirubin'),
(130, 16, 'Total Bilirubin'),
(131, 16, 'Indirect bilirubin '),
(132, 16, 'Total protein '),
(133, 16, 'Albumin '),
(134, 16, 'GGT'),
(135, 17, 'Urea'),
(136, 17, 'Creatinine'),
(137, 17, 'Creatinine Clearance'),
(138, 17, 'Inulin Clearance'),
(139, 17, 'Cystatin C'),
(140, 18, 'Triglycerides'),
(141, 18, 'Total Cholesterol '),
(142, 18, 'Low Density Lipoproteins (LDL) LDLc'),
(143, 18, 'High Density Lipoproteins (HDL) HDLc'),
(144, 19, 'Potassium'),
(145, 19, 'Sodium'),
(146, 19, 'Chloride'),
(147, 19, 'Lithium'),
(148, 19, 'Calcium'),
(149, 19, 'Magnesium'),
(150, 19, 'Phosphate'),
(151, 19, 'Bicarbonate'),
(152, 20, 'Glucose'),
(153, 20, 'Amylase - Total '),
(154, 20, 'Amylase - Pancreatic '),
(155, 20, 'Lipase'),
(156, 20, 'Uric Acid'),
(157, 21, 'CK-MB'),
(158, 21, 'CK- NAC (Total)'),
(159, 21, 'LDH'),
(160, 21, 'Troponins (C,T,I)'),
(161, 21, 'hs-CRP'),
(162, 21, 'ASO (RHD)'),
(163, 21, 'NT- Pro BNP'),
(164, 21, 'Myoglobin'),
(165, 22, 'ALP'),
(166, 22, 'Calcium'),
(167, 22, 'Phosphate'),
(168, 23, 'K, Na, Cl'),
(169, 23, 'HCO3'),
(170, 23, 'PO2'),
(171, 23, 'PCO2'),
(172, 23, 'Ca2+ (Free & Bound)'),
(173, 23, 'PH'),
(174, 23, 'Hb'),
(175, 23, 'HCT'),
(176, 23, 'HCO3'),
(177, 24, 'Glycocylated Haemoglobin'),
(178, 24, 'Lactic acid '),
(179, 24, 'Vitamin B12 '),
(180, 24, 'Vitamin C'),
(181, 24, 'Iron'),
(182, 24, 'Ferritin'),
(183, 24, 'Transferrin'),
(184, 24, 'G6PD'),
(185, 24, 'Folate'),
(186, 25, 'Free T3'),
(187, 25, 'Free T4'),
(188, 25, 'Total T4'),
(189, 25, 'Total T3 '),
(190, 25, 'TSH'),
(191, 25, 'Anti -TSH-IgG'),
(192, 25, 'PTHH'),
(193, 26, 'Follicle Stimulating Hormone (FSH)'),
(194, 26, 'Lutenizing Hormone (LH)'),
(195, 26, 'Cortisol'),
(196, 26, 'Progesterone'),
(197, 26, 'Testosterone'),
(198, 26, 'Oestrogen'),
(199, 26, '?-hCG'),
(200, 26, 'Oestrone (E1) '),
(201, 26, 'Oestradiol (E2)'),
(202, 26, 'Oestriol (E3)'),
(203, 26, 'DHEA'),
(204, 26, 'DHEA-S'),
(205, 26, 'Prolactin '),
(206, 27, '?-FP'),
(207, 27, 'PSA'),
(208, 27, 'f PSA'),
(209, 27, 'CA 125 Ag'),
(210, 27, 'CA 19-9 Ag'),
(211, 27, 'CA 15-3 Ag'),
(212, 27, 'CA 72-4 Ag'),
(213, 27, 'CEA'),
(214, 27, '?- h CG'),
(215, 27, 'NSE'),
(216, 27, 'S-100'),
(217, 27, 'Cyfra 21-1 '),
(218, 27, 'Enolase'),
(219, 28, 'Bilirubin'),
(220, 28, 'Urobilinogen'),
(221, 28, 'Glucose'),
(222, 28, 'Ketones'),
(223, 28, 'Microalbumin'),
(224, 28, 'Albumin'),
(225, 29, 'Specific Gravity'),
(226, 29, 'pH'),
(227, 29, 'Bences Jones '),
(228, 30, 'Protein'),
(229, 30, 'Glucose'),
(230, 30, 'Globulins'),
(231, 30, 'VMA'),
(232, 31, 'Helicobacter pylori IgG/IgM'),
(233, 31, 'HBsAg IgG'),
(234, 31, 'HBcAg IgG'),
(235, 31, 'HBeAg IgG'),
(236, 31, 'Toxo IgG/IgM'),
(237, 31, 'CMV IgG/IgM'),
(238, 31, 'HCV IgG/IgM'),
(239, 31, 'Rubella IgG/IgM'),
(240, 31, 'Measles IgG/IgM'),
(241, 31, 'Mumps IgG/IgM'),
(242, 31, 'HSV 1 IgG/IgM'),
(243, 31, 'HSV 2 IgG/IgM'),
(244, 31, 'HZV IgG/IgM'),
(245, 32, 'Gene Xpert'),
(246, 32, 'Viral load for HIV Virus '),
(247, 32, 'Viral load for HEPATITIS B Virus '),
(248, 32, 'TB DNA PCR'),
(249, 33, 'LPA');

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
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `parameter_id` int(11) NOT NULL,
  `parameter_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `lab_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `labtest_id` int(11) NOT NULL,
  `parameter__id` int(11) NOT NULL,
  `equipment` text NOT NULL,
  `request_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `payment__status` int(11) NOT NULL,
  `payment__id` int(11) NOT NULL
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
(5, 'Once a year');

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
(7, 'Mulindwa ', 'Muhammad', 'ahmadabdulauthor@gmail.com', '$2y$10$MslqXDLgnZTigNRIxfYtsOtwrcPv9ivzr1f0cydG5HuT3MXJ103x6', 1, 1, '2021-06-07 18:53:56', 'yes', '0a15ce7b6e576e193bac767c4af94b45fe0c24e0f18ae17da8267f3a317ce4dc416bddfa48ad1a5d'),
(12, 'SHAFIQ', 'NAKIMULI', 'mmuhammad@aglobalhf.org', '$2y$10$UFtcKEAN2xSGXL3iVY6rEuyrW7Wffn3aR2JbX4A14vllbtDx7uI0y', 2, 1, '2021-06-17 11:22:03', 'yes', '26de0fb63840706db7afeb6030705ef1832256eca951a9a2a7596f48edd0b567bd57a63b573b60bf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accredited_status`
--
ALTER TABLE `accredited_status`
  ADD PRIMARY KEY (`accredited_id`);

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
-- Indexes for table `lab_details`
--
ALTER TABLE `lab_details`
  ADD PRIMARY KEY (`lab_detail_id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`parameter_id`);

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
  ADD KEY `labtest_id` (`labtest_id`),
  ADD KEY `request_ibfk_1` (`lab_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `parameter__id` (`parameter__id`),
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
-- AUTO_INCREMENT for table `lab_details`
--
ALTER TABLE `lab_details`
  MODIFY `lab_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `parameter_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
