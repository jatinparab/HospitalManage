-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2019 at 01:27 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `ipd_charges`
--

CREATE TABLE `ipd_charges` (
  `id` int(11) NOT NULL,
  `ipd_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 - General Ward, 1 -ICU, 2 - SICU, 3 - Special, 4 - Normal, 5 - Deposit, 6 - Discount '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_done`
--

CREATE TABLE `ipd_done` (
  `id` int(11) NOT NULL,
  `ipd_number` varchar(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_entries`
--

CREATE TABLE `ipd_entries` (
  `id` int(11) NOT NULL,
  `ipd_number` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `age` int(150) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `date_of_addmission` date NOT NULL,
  `date_of_discharge` date DEFAULT NULL,
  `prefered_doctor` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `current_applied` int(11) NOT NULL DEFAULT '0',
  `done` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `name` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(255) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=COMPACT;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `name`, `password`) VALUES
(1, 'admin', 'Admin Name', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `opd_charges`
--

CREATE TABLE `opd_charges` (
  `id` int(11) NOT NULL,
  `receipt_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opd_done`
--

CREATE TABLE `opd_done` (
  `id` int(11) NOT NULL,
  `receipt_number` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opd_entries`
--

CREATE TABLE `opd_entries` (
  `id` int(255) NOT NULL,
  `receipt_number` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `age` int(150) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `diagnosis` varchar(2555) NOT NULL,
  `checked_by` varchar(255) NOT NULL,
  `remarks` varchar(2555) NOT NULL,
  `done` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ot_charges`
--

CREATE TABLE `ot_charges` (
  `id` int(11) NOT NULL,
  `ipd_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ot_done`
--

CREATE TABLE `ot_done` (
  `id` int(11) NOT NULL,
  `ipd_number` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ot_entries`
--

CREATE TABLE `ot_entries` (
  `id` int(11) NOT NULL,
  `ipd_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `done` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visiting_charges`
--

CREATE TABLE `visiting_charges` (
  `id` int(11) NOT NULL,
  `ipd_number` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipd_charges`
--
ALTER TABLE `ipd_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_done`
--
ALTER TABLE `ipd_done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_entries`
--
ALTER TABLE `ipd_entries`
  ADD PRIMARY KEY (`id`,`ipd_number`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `opd_charges`
--
ALTER TABLE `opd_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_done`
--
ALTER TABLE `opd_done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_entries`
--
ALTER TABLE `opd_entries`
  ADD PRIMARY KEY (`id`,`receipt_number`);

--
-- Indexes for table `ot_charges`
--
ALTER TABLE `ot_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_done`
--
ALTER TABLE `ot_done`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ipd_number` (`ipd_number`);

--
-- Indexes for table `ot_entries`
--
ALTER TABLE `ot_entries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ipd_number` (`ipd_number`);

--
-- Indexes for table `visiting_charges`
--
ALTER TABLE `visiting_charges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ipd_charges`
--
ALTER TABLE `ipd_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipd_done`
--
ALTER TABLE `ipd_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipd_entries`
--
ALTER TABLE `ipd_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `opd_charges`
--
ALTER TABLE `opd_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opd_done`
--
ALTER TABLE `opd_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opd_entries`
--
ALTER TABLE `opd_entries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ot_charges`
--
ALTER TABLE `ot_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ot_done`
--
ALTER TABLE `ot_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ot_entries`
--
ALTER TABLE `ot_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visiting_charges`
--
ALTER TABLE `visiting_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
