-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 09:46 PM
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
-- Database: `ssmr-quirofano`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `medID` int(11) NOT NULL,
  `medFullName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`medID`, `medFullName`) VALUES
(1, 'Berenice Merchan');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patientsID` int(11) NOT NULL,
  `patientsFullName` varchar(50) NOT NULL,
  `patientsMedID` int(11) NOT NULL,
  `patientsSurgeryTypeID` int(11) NOT NULL,
  `patientsStateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patientsID`, `patientsFullName`, `patientsMedID`, `patientsSurgeryTypeID`, `patientsStateID`) VALUES
(1, 'Danny Morán', 1, 2, 1),
(3, 'hector', 1, 2, 1),
(4, 'danny moran', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient_states`
--

CREATE TABLE `patient_states` (
  `stateID` int(11) NOT NULL,
  `stateName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_states`
--

INSERT INTO `patient_states` (`stateID`, `stateName`) VALUES
(1, 'En Reposo'),
(2, 'En Operación');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rolesID` int(11) NOT NULL,
  `rolesName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rolesID`, `rolesName`) VALUES
(1, 'Administrador'),
(2, 'Usuario Estandar');

-- --------------------------------------------------------

--
-- Table structure for table `surgery_type`
--

CREATE TABLE `surgery_type` (
  `surgeryID` int(11) NOT NULL,
  `surgeryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surgery_type`
--

INSERT INTO `surgery_type` (`surgeryID`, `surgeryName`) VALUES
(1, 'Cirugía Oncológica'),
(2, 'Cirugía General');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userRoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`medID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patientsID`),
  ADD KEY `patientsSurgeryTypeID` (`patientsSurgeryTypeID`,`patientsStateID`),
  ADD KEY `patientsMedName` (`patientsMedID`),
  ADD KEY `patientsStateID` (`patientsStateID`);

--
-- Indexes for table `patient_states`
--
ALTER TABLE `patient_states`
  ADD PRIMARY KEY (`stateID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolesID`);

--
-- Indexes for table `surgery_type`
--
ALTER TABLE `surgery_type`
  ADD PRIMARY KEY (`surgeryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userRole` (`userRoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `medID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patientsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_states`
--
ALTER TABLE `patient_states`
  MODIFY `stateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rolesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surgery_type`
--
ALTER TABLE `surgery_type`
  MODIFY `surgeryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`patientsSurgeryTypeID`) REFERENCES `surgery_type` (`surgeryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`patientsStateID`) REFERENCES `patient_states` (`stateID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patients_ibfk_3` FOREIGN KEY (`patientsMedID`) REFERENCES `doctors` (`medID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userRoleID`) REFERENCES `roles` (`rolesID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
