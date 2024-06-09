-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 04:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle-parking-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Security_Code` int(55) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Security_Code`, `Email`, `Password`, `AdminRegdate`) VALUES
(5, 'admin', 'admin', 22147852, 2024, 'khawala@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2024-06-09 13:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE `devis` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devis`
--

INSERT INTO `devis` (`id`, `contact_name`, `duration`, `contact_email`, `contact_phone`, `created_at`) VALUES
(1, 'ffff', '6', 'sa@gmail.com', '52014852', '2024-05-26 18:52:48'),
(2, 'ffff', '6', 'sa@gmail.com', '52014852', '2024-05-26 19:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `formulaire_contact`
--

CREATE TABLE `formulaire_contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulaire_contact`
--

INSERT INTO `formulaire_contact` (`id`, `nom`, `email`, `telephone`, `message`, `date_creation`) VALUES
(1, 'khawla', 'khawla@gmail.com', '22147852', 'ddddddddddddd', '2024-05-12 18:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `id` int(255) NOT NULL,
  `RefSt` varchar(120) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `DateRef` timestamp NOT NULL DEFAULT current_timestamp(),
  `VehiclCat` varchar(120) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `VehicleComp` varchar(120) NOT NULL,
  `RegistrationNumb` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Descr` text NOT NULL,
  `quatf` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id`, `RefSt`, `DateRef`, `VehiclCat`, `VehicleComp`, `RegistrationNumb`, `Descr`, `quatf`) VALUES
(1, 'بوشوشة', '2024-05-14 08:59:58', 'نقل بضائع', '', 'tunis 1236', '', 15),
(2, 'إع م د و', '2024-05-14 09:00:36', 'نقل بضائع', '', 'tunis 4101', '', 30),
(14, 'إع  إشرإ', '2024-05-19 12:08:39', 'نقل أفراد', '', 'tunis 6954', '', 30),
(15, 'ف ش ع', '2024-05-19 12:08:43', 'نقل أفراد', '', 'tunis 1475', '', 25),
(16, 'فوج الشرف', '2024-05-19 12:08:47', 'سيارة إسعاف', '', 'tunis 6954', '', 30),
(17, 'ف 11', '2024-05-19 12:08:50', 'نقل بضائع', '', 'tunis 1236', '', 20),
(18, 'ف 12', '2024-05-19 12:08:54', 'سيارة إسعاف', '', 'tunis 1254', '', 20),
(19, 'ف 14', '2024-05-19 12:08:58', 'آلات الأشغال', '', 'tunis 1458', '', 40),
(20, 'م ض صف', '2024-05-19 12:09:01', '', '', '', '', 0),
(21, 'ق ع بوفيشة', '2024-05-19 12:12:50', '', '', '', '', 0),
(22, 'ق ج صفاقس', '2024-05-19 12:12:54', '', '', '', '', 0),
(23, 'ق ج قفصة', '2024-05-19 12:12:57', '', '', '', '', 0),
(24, 'ق ج الخروبة', '2024-05-19 12:13:02', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `planName` varchar(100) NOT NULL,
  `planPrice` decimal(10,2) NOT NULL,
  `planService` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `planName`, `planPrice`, `planService`, `created_at`) VALUES
(1, 'sdfsdf', 555.00, 'ggggg', '2024-06-09 13:59:01'),
(2, 'sdqsd', 555.00, 'ddddddd', '2024-06-09 14:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `reply_message` text NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `message_id`, `reply_message`, `reply_date`) VALUES
(1, 19, 'dddddd', '2024-05-27 16:41:33'),
(2, 19, 'dddddd', '2024-05-27 16:41:35'),
(3, 23, 'ccc', '2024-05-27 16:41:40'),
(4, 16, 'dd', '2024-05-27 16:43:14'),
(5, 16, 'dd', '2024-05-27 16:44:29'),
(6, 16, 'dd', '2024-05-27 16:44:48'),
(7, 16, 'dd', '2024-05-27 16:45:32'),
(8, 16, 'dd', '2024-05-27 16:45:34'),
(9, 16, 'dd', '2024-05-27 16:47:47'),
(10, 16, 'dd', '2024-05-27 16:47:49'),
(11, 25, 'xxxxx', '2024-05-27 16:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(55) NOT NULL,
  `c_website` varchar(55) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `c_name`, `c_email`, `c_website`, `c_address`, `last_update`) VALUES
(1, 'HMPIT', '', 'hopitalmilitaire.tn', 'Montfleury 1008 Tunis', '2024-05-19 17:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `vcategory`
--

CREATE TABLE `vcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `shortDescription` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vcategory`
--

INSERT INTO `vcategory` (`ID`, `VehicleCat`, `shortDescription`, `CreationDate`) VALUES
(25, 'سيارة اس', '1222', '2024-05-27 10:24:14'),
(26, 'سيارة اسعاف4', '1222', '2024-05-27 10:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ParkingCharge` double DEFAULT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(30, '#####', 'نقل افراد ', 'Passat Ess', 'tunis 1475', 'lt1', 252426325, '2024-05-19 13:37:07', '2024-05-22 13:49:38', 44, 'accident ', 'Out'),
(31, '#####', 'سيارة اسعاف', 'Mitsubishi G50', 'tunis 1785', 'hopital', 144, '2024-05-19 13:37:42', '2024-05-22 13:51:01', 36, '........', 'Out'),
(32, '###', 'نقل افراد ', 'Passat ESS', 'tunis 6954', 'col1', 269874, '2024-05-19 13:39:01', '2024-05-22 13:51:20', NULL, '', ''),
(33, '#####', 'نقل بضائع ', 'Peugeot partner', 'tunis 7896', 'hopital', 144, '2024-05-19 13:40:25', '2024-05-22 13:49:51', NULL, '', ''),
(34, '####', 'آلات  الأشغال', 'Machine de levage G', 'tunis 1458', 'hopital', 144, '2024-05-19 13:50:29', '2024-05-22 13:51:28', NULL, '', ''),
(35, '#####', 'نقل بضائع ', 'Mitsubishi G', 'tunis 1597', 'hopital', 144, '2024-05-19 13:52:11', '2024-05-22 13:49:26', NULL, '', ''),
(36, '#####', 'نقل بضائع ', 'Transporter', 'tunis 1236', 'hopital', 144, '2024-05-19 13:52:46', '2024-05-22 13:51:07', 35, 'accident ', 'Out'),
(37, '######', 'نقل بضائع ', 'Citroen Berlingo G50', 'tunis 5486', 'hopital', 144, '2024-05-19 13:54:03', '2024-05-22 13:49:14', 20, '........', 'Out'),
(38, '######', 'نقل بضائع ', 'Decato', 'tunis 4101', 'hopital', 144, '2024-05-19 13:57:59', '2024-05-22 13:50:01', NULL, '', ''),
(39, '#####', 'سيارة اسعاف', 'Decato', 'tunis 1254', 'hopital', 144, '2024-05-19 14:00:43', '2024-05-22 13:50:54', 30, '........', '?? ??'),
(40, '98768', 'سيارة اسعاف', 'fff', 'fff-123', 'rrr', 55, '2024-05-27 09:45:42', NULL, NULL, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulaire_contact`
--
ALTER TABLE `formulaire_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_id` (`message_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vcategory`
--
ALTER TABLE `vcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactinfo`
--
ALTER TABLE `contactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formulaire_contact`
--
ALTER TABLE `formulaire_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vcategory`
--
ALTER TABLE `vcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
