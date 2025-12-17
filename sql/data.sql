-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2025 at 11:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id_department` int NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id_department`, `department_name`, `location`) VALUES
(15, 'Inga Small', 'Atque excepturi vita'),
(16, 'Althea Jefferson', 'Dicta neque ullam mo'),
(25, 'Desiree Moody', 'Qui exercitationem u');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id_doctor` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_department` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id_doctor`, `first_name`, `last_name`, `specialization`, `phone_number`, `email`, `id_department`) VALUES
(1, 'Miriam', 'Dejesus', 'Adipisicing occaecat', '+1 (612) 853-4193', 'bijuby@mailinator.com', 15),
(2, 'Olga', 'Chan', 'Quis reprehenderit t', '+1 (629) 212-8128', 'gyrocima@mailinator.com', 15),
(3, 'Orla', 'Rowe', 'Quos ea itaque eum o', '+1 (371) 747-4217', 'roxelaruke@mailinator.com', 16),
(4, 'Pascale', 'Cummings', 'Hic laborum Nisi la', '+1 (513) 856-5992', 'vajyxyhu@mailinator.com', 15),
(8, 'Declan', 'Wooten', 'Nihil non tempor nul', '+1 (956) 108-7448', 'niramob@mailinator.com', 25);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id_patient` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id_patient`, `first_name`, `last_name`, `gender`, `email`, `date_of_birth`, `phone_number`, `address`) VALUES
(1, 'Alana', 'Robertson', 'male', 'kikym@mailinator.com', '1988-09-15', '+1 (668) 925-2889', 'Placeat elit ut al'),
(2, 'Preston', 'Bishop', 'male', 'xawuzaxene@mailinator.com', '2018-01-24', '+1 (462) 359-1973', 'Dolor et exercitatio'),
(4, 'Forrest', 'Crane', 'male', 'wumy@mailinator.com', '1998-05-09', '+1 (982) 317-7052', 'Omnis modi exercitat'),
(5, 'Roary', 'Mclaughlin', 'female', 'makyvecyg@mailinator.com', '2017-01-28', '+1 (525) 373-3884', 'Distinctio Quia sit'),
(6, 'Ian', 'Butler', 'female', 'kusykaqy@mailinator.com', '1995-05-08', '+1 (372) 969-3313', 'Omnis nisi quod tota'),
(7, 'Colt', 'Holcomb', 'male', 'teki@mailinator.com', '1981-08-03', '+1 (905) 388-8647', 'Reiciendis maxime fu'),
(8, 'Sarah', 'Hendricks', 'male', 'hyji@mailinator.com', '2017-11-23', '+1 (697) 282-8326', 'Nostrud ipsam odio c'),
(9, 'Juliet', 'Mosley', 'male', 'didyjugyz@mailinator.com', '1993-11-26', '+1 (892) 325-6843', 'Autem eiusmod minima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `fk_doctors_department` (`id_department`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id_department` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id_doctor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id_patient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `fk_doctors_department` FOREIGN KEY (`id_department`) REFERENCES `departments` (`id_department`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
