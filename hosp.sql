-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2018 at 12:50 PM
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
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipd_charges`
--

INSERT INTO `ipd_charges` (`id`, `ipd_number`, `name`, `amount`, `number`, `total`) VALUES
(1, 'SUK1F4CG', 'Deposit Charge', 240, 1, 240),
(2, 'SUK1F4CG', 'bed charges', 200, 4, 800),
(3, 'SUK1F4CG', 'ward charges', 400, 4, 1600);

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
  `ward` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipd_entries`
--

INSERT INTO `ipd_entries` (`id`, `ipd_number`, `patient_name`, `contact_number`, `address`, `age`, `sex`, `date_of_addmission`, `date_of_discharge`, `prefered_doctor`, `ward`) VALUES
(1, 'SUK1F4CG', 'Test Patient', '9820181347', 'Test Address', 23, 'Male', '2018-08-21', NULL, 'Dr. Rathi', '5');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `remarks` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opd_entries`
--

INSERT INTO `opd_entries` (`id`, `receipt_number`, `patient_name`, `contact_number`, `address`, `age`, `sex`, `diagnosis`, `checked_by`, `remarks`) VALUES
(1, 'SUKPL1', 'Jatin Parab', '9820181347', 'adreess testing 123', 19, 'Male', 'No diagnosis', 'Dr.Test', 'Good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipd_charges`
--
ALTER TABLE `ipd_charges`
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
-- Indexes for table `opd_entries`
--
ALTER TABLE `opd_entries`
  ADD PRIMARY KEY (`id`,`receipt_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ipd_charges`
--
ALTER TABLE `ipd_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ipd_entries`
--
ALTER TABLE `ipd_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `opd_entries`
--
ALTER TABLE `opd_entries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
