-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2024 a las 02:57:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quirofano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `medID` int(11) NOT NULL,
  `medFullName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`medID`, `medFullName`) VALUES
(3, 'juan bozo'),
(5, 'danny moran');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patients`
--

CREATE TABLE `patients` (
  `patientsID` int(11) NOT NULL,
  `patientsFullName` varchar(50) NOT NULL,
  `patientsMedID` int(11) NOT NULL,
  `patientsSurgeryTypeID` int(11) NOT NULL,
  `patientsStateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patients`
--

INSERT INTO `patients` (`patientsID`, `patientsFullName`, `patientsMedID`, `patientsSurgeryTypeID`, `patientsStateID`) VALUES
(10, 'Danny Morán', 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patient_states`
--

CREATE TABLE `patient_states` (
  `stateID` int(11) NOT NULL,
  `stateName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patient_states`
--

INSERT INTO `patient_states` (`stateID`, `stateName`) VALUES
(1, 'En Reposo'),
(2, 'En Operación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rolesID` int(11) NOT NULL,
  `rolesName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rolesID`, `rolesName`) VALUES
(1, 'Administrador'),
(2, 'Usuario Estandar'),
(3, 'Usuario Quirofano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `surgery_type`
--

CREATE TABLE `surgery_type` (
  `surgeryID` int(11) NOT NULL,
  `surgeryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `surgery_type`
--

INSERT INTO `surgery_type` (`surgeryID`, `surgeryName`) VALUES
(1, 'Cirugía Oncológica'),
(2, 'Cirugía General'),
(3, 'Cirugía Oncológica'),
(5, 'Cirugía Ocular 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userRoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userID`, `userName`, `userPassword`, `userRoleID`) VALUES
(1, 'administrador1', 'HospitalAdmin99', 1),
(2, 'usuario', 'usuario12345', 2),
(6, 'quirofano', 'quirofano123', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`medID`);

--
-- Indices de la tabla `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patientsID`),
  ADD KEY `patientsSurgeryTypeID` (`patientsSurgeryTypeID`,`patientsStateID`),
  ADD KEY `patientsMedName` (`patientsMedID`),
  ADD KEY `patientsStateID` (`patientsStateID`);

--
-- Indices de la tabla `patient_states`
--
ALTER TABLE `patient_states`
  ADD PRIMARY KEY (`stateID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolesID`);

--
-- Indices de la tabla `surgery_type`
--
ALTER TABLE `surgery_type`
  ADD PRIMARY KEY (`surgeryID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userRole` (`userRoleID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `medID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `patients`
--
ALTER TABLE `patients`
  MODIFY `patientsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `patient_states`
--
ALTER TABLE `patient_states`
  MODIFY `stateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rolesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `surgery_type`
--
ALTER TABLE `surgery_type`
  MODIFY `surgeryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`patientsSurgeryTypeID`) REFERENCES `surgery_type` (`surgeryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`patientsStateID`) REFERENCES `patient_states` (`stateID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patients_ibfk_3` FOREIGN KEY (`patientsMedID`) REFERENCES `doctors` (`medID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userRoleID`) REFERENCES `roles` (`rolesID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
