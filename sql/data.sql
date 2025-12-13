-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2025 at 04:56 PM
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
(1, 'Cardiology', 'Building A - Floor 2'),
(2, 'Dermatology', 'Building B - Floor 1'),
(3, 'Pediatrics', 'Building C - Floor 3'),
(4, 'Neurology', 'Building A - Floor 4'),
(5, 'Radiology', 'Building D - Floor 1');

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
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id_doctor`, `first_name`, `last_name`, `specialization`, `phone_number`, `email`) VALUES
(1, 'Emily', 'Clark', 'Cardiologist', '5551231001', 'e.clark@clinic.com'),
(2, 'Michael', 'Adams', 'Dermatologist', '5551231002', 'm.adams@clinic.com'),
(3, 'Sophia', 'Turner', 'Pediatrician', '5551231003', 's.turner@clinic.com'),
(4, 'James', 'Mitchell', 'Neurologist', '5551231004', 'j.mitchell@clinic.com'),
(5, 'Olivia', 'Brown', 'Radiologist', '5551231005', 'o.brown@clinic.com'),
(6, 'Emily', 'Clark', 'Cardiologist', '5551231001', 'e.clark@clinic.com'),
(7, 'Michael', 'Adams', 'Dermatologist', '5551231002', 'm.adams@clinic.com'),
(8, 'Sophia', 'Turner', 'Pediatrician', '5551231003', 's.turner@clinic.com'),
(9, 'James', 'Mitchell', 'Neurologist', '5551231004', 'j.mitchell@clinic.com'),
(10, 'Olivia', 'Brown', 'Radiologist', '5551231005', 'o.brown@clinic.com');

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
  `address` varchar(100) NOT NULL,
  `id_department` int DEFAULT NULL,
  `id_doctor` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id_patient`, `first_name`, `last_name`, `gender`, `email`, `date_of_birth`, `phone_number`, `address`, `id_department`, `id_doctor`) VALUES
(1, 'John', 'Smith', 'male', 'john.smith@example.com', '1985-03-12', '5552003001', '12 Green St', 1, 3),
(2, 'Sarah', 'Johnson', 'female', 's.johnson@example.com', '1990-07-21', '5552003002', '48 Oak Road', 2, 2),
(3, 'David', 'Williams', 'male', 'd.williams@example.com', '2015-11-03', '5552003003', '7 Pine Ave', 3, 3),
(4, 'Emma', 'Davis', 'female', 'emma.davis@example.com', '1978-04-18', '5552003004', '30 Cedar Lane', 4, 1),
(5, 'Liam', 'Miller', 'male', 'liam.miller@example.com', '2002-09-09', '5552003005', '95 Maple St', 5, 5),
(6, 'Olivia', 'Brown', 'female', 'olivia.brown@example.com', '1988-02-14', '5552003006', '22 Birch St', 1, 2),
(7, 'Noah', 'Jones', 'male', 'noah.jones@example.com', '1995-12-01', '5552003007', '14 Willow Ave', 2, 4),
(8, 'Ava', 'Garcia', 'female', 'ava.garcia@example.com', '2000-05-19', '5552003008', '83 Spruce Road', 3, 1),
(9, 'Ethan', 'Martinez', 'male', 'ethan.martinez@example.com', '1982-10-28', '5552003009', '51 Elm Blvd', 4, 3),
(10, 'Sophia', 'Rodriguez', 'female', 'sophia.rodriguez@example.com', '1999-08-04', '5552003010', '20 Aspen Way', 5, 5),
(11, 'James', 'Hernandez', 'male', 'james.hernandez@example.com', '1975-11-22', '5552003011', '66 Chestnut St', 1, 3),
(12, 'Isabella', 'Lopez', 'female', 'isabella.lopez@example.com', '1987-06-30', '5552003012', '17 Poplar Ave', 2, 2),
(13, 'Benjamin', 'Gonzalez', 'male', 'benjamin.gonzalez@example.com', '2012-03-15', '5552003013', '9 Redwood Dr', 3, 4),
(14, 'Mia', 'Wilson', 'female', 'mia.wilson@example.com', '1996-09-11', '5552003014', '47 Cypress Ln', 4, 1),
(15, 'Lucas', 'Anderson', 'male', 'lucas.anderson@example.com', '1980-07-27', '5552003015', '105 Sycamore St', 5, 5),
(16, 'Charlotte', 'Thomas', 'female', 'charlotte.thomas@example.com', '1991-01-06', '5552003016', '74 Aspen Dr', 1, 2),
(17, 'Henry', 'Taylor', 'male', 'henry.taylor@example.com', '1984-04-09', '5552003017', '38 Fir St', 2, 1),
(19, 'Alexander', 'Jackson', 'male', 'alexander.jackson@example.com', '2010-05-08', '5552003019', '82 Walnut Rd', 4, 4),
(20, 'Harper', 'Martin', 'female', 'harper.martin@example.com', '1994-10-13', '5552003020', '25 Juniper Ln', 5, 5),
(21, 'Daniel', 'Lee', 'male', 'daniel.lee@example.com', '1993-02-26', '5552003021', '108 Cherry St', 1, 1),
(22, 'Ella', 'Perez', 'female', 'ella.perez@example.com', '2007-07-18', '5552003022', '62 Hawthorn Ave', 2, 4),
(23, 'Matthew', 'Thompson', 'male', 'matthew.thompson@example.com', '1979-03-21', '5552003023', '44 Alder Dr', 3, 5),
(25, 'William', 'Harris', 'male', 'william.harris@example.com', '1986-01-30', '5552003025', '11 Redwood Ln', 5, 3),
(26, 'Evelyn', 'Sanchez', 'female', 'evelyn.sanchez@example.com', '2001-09-02', '5552003026', '90 Poplar St', 1, 4),
(27, 'Logan', 'Clark', 'male', 'logan.clark@example.com', '1997-11-11', '5552003027', '79 Willow Rd', 2, 2),
(28, 'Chloe', 'Ramirez', 'female', 'chloe.ramirez@example.com', '1983-08-29', '5552003028', '16 Magnolia Ave', 3, 1),
(29, 'Jack', 'Lewis', 'male', 'jack.lewis@example.com', '2014-04-25', '5552003029', '33 Ivy St', 4, 4),
(30, 'Grace', 'Walker', 'female', 'grace.walker@example.com', '1992-05-07', '5552003030', '58 Maple Rd', 5, 5),
(31, 'Samuel', 'Hall', 'male', 'samuel.hall@example.com', '1989-02-15', '5552003031', '12 Hazel St', 1, 1),
(32, 'Victoria', 'Allen', 'female', 'victoria.allen@example.com', '2004-10-02', '5552003032', '77 Birch Ave', 2, 3),
(33, 'Wyatt', 'Young', 'male', 'wyatt.young@example.com', '1981-06-19', '5552003033', '28 Pine Ln', 3, 2),
(34, 'Natalie', 'King', 'female', 'natalie.king@example.com', '1990-12-09', '5552003034', '88 Cedar St', 4, 4),
(35, 'Joseph', 'Wright', 'male', 'joseph.wright@example.com', '1977-03-05', '5552003035', '101 Ash Blvd', 5, 3),
(36, 'Zoe', 'Bennett', 'female', 'zoe.bennett@example.com', '1993-07-14', '5552003036', '14 Laurel Ave', 1, 2),
(37, 'Nathan', 'Carter', 'male', 'nathan.carter@example.com', '2005-01-22', '5552003037', '60 Willow Park', 2, 4),
(38, 'Lily', 'Mitchell', 'female', 'lily.mitchell@example.com', '1984-03-09', '5552003038', '88 Elm Circle', 3, 1),
(39, 'Gabriel', 'Perez', 'male', 'gabriel.perez@example.com', '1976-10-27', '5552003039', '32 Maple Court', 4, 5),
(40, 'Hannah', 'Roberts', 'female', 'hannah.roberts@example.com', '1997-08-16', '5552003040', '51 Spruce Lane', 5, 3),
(41, 'Julian', 'Turner', 'male', 'julian.turner@example.com', '1989-04-12', '5552003041', '23 Aspen Street', 1, 1),
(42, 'Scarlett', 'Phillips', 'female', 'scarlett.phillips@example.com', '2008-11-05', '5552003042', '99 Oak Terrace', 2, 3),
(43, 'Dylan', 'Campbell', 'male', 'dylan.campbell@example.com', '1981-02-18', '5552003043', '40 Birch View', 3, 4),
(44, 'Aria', 'Parker', 'female', 'aria.parker@example.com', '1999-09-30', '5552003044', '72 Cedar Woods', 4, 2),
(45, 'Elijah', 'Evans', 'male', 'elijah.evans@example.com', '2011-06-07', '5552003045', '16 Pine Grove', 5, 5),
(46, 'Penelope', 'Edwards', 'female', 'penelope.edwards@example.com', '1990-12-21', '5552003046', '81 Beech Road', 1, 4),
(47, 'Christopher', 'Collins', 'male', 'christopher.collins@example.com', '1978-05-14', '5552003047', '29 Walnut Hill', 2, 1),
(48, 'Aubrey', 'Stewart', 'female', 'aubrey.stewart@example.com', '2003-03-25', '5552003048', '56 Aspen Ridge', 3, 2),
(49, 'Isaac', 'Sullivan', 'male', 'isaac.sullivan@example.com', '1991-07-02', '5552003049', '105 Redwood Trail', 4, 3),
(50, 'Nora', 'Price', 'female', 'nora.price@example.com', '1986-11-18', '5552003050', '37 Magnolia Court', 5, 5),
(51, 'Gavin', 'Bell', 'male', 'gavin.bell@example.com', '1994-02-11', '5552003051', '48 Alder Grove', 1, 2),
(52, 'Aurora', 'Reed', 'female', 'aurora.reed@example.com', '2010-09-06', '5552003052', '10 Sycamore Path', 2, 4),
(53, 'Christian', 'Sanders', 'male', 'christian.sanders@example.com', '1974-01-29', '5552003053', '63 Hawthorn Blvd', 3, 1),
(54, 'Ellie', 'Long', 'female', 'ellie.long@example.com', '1998-10-03', '5552003054', '21 Poplar View', 4, 5),
(55, 'Miles', 'Patterson', 'male', 'miles.patterson@example.com', '1983-06-20', '5552003055', '92 Cedar Heights', 5, 3),
(56, 'Daniel', 'Lee', 'male', 'daniel.lee@example.com', '1993-02-26', '5552003021', '108 Cherry St', 1, 1),
(57, 'Joelle', 'Flynn', 'male', 'hupes@mailinator.com', '2012-10-21', '+1 (672) 624-2296', 'Odit atque sit id ', 1, 1),
(58, 'Barclay', 'Parks', 'female', 'cavahit@mailinator.com', '2020-06-14', '+1 (732) 476-6224', 'Esse quasi asperiore', 2, 1),
(59, 'Lucy', 'Hensley', 'female', 'ziwaga@mailinator.com', '2008-11-01', '+1 (678) 148-7563', 'Corporis tempore ea', 2, 1),
(60, 'Hiroko', 'Schroeder', 'male', 'qemaj@mailinator.com', '1971-07-26', '+1 (687) 572-3833', 'Dolorum ut odio anim', 2, 1),
(61, 'Lee', 'Mays', 'male', 'lely@mailinator.com', '1981-07-29', '+1 (153) 585-7087', 'Odit quis facilis qu', 2, 1),
(62, 'Sasha', 'Ruiz', 'female', 'noxekon@mailinator.com', '2004-04-25', '+1 (143) 446-1689', 'Quos inventore ut et', 2, 1),
(63, 'Hakeem', 'Morris', 'female', 'myloxyluc@mailinator.com', '1978-04-30', '+1 (507) 186-7511', 'Corrupti qui aspern', 5, 5),
(64, 'Reuben', 'Salazar', 'female', 'qutekevywo@mailinator.com', '2014-11-10', '+1 (765) 357-3808', 'Ipsam inventore pari', 5, 5),
(65, 'Angela', 'Dejesus', 'female', 'cuqofupa@mailinator.com', '2016-07-13', '+1 (381) 777-4231', 'Quia inventore archi', 5, 3),
(66, 'Angela', 'Dejesus', 'female', 'cuqofupa@mailinator.com', '2016-07-13', '+1 (381) 777-4231', 'Quia inventore archi', 5, 3);

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
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patient`),
  ADD KEY `id_department` (`id_department`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id_department` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id_doctor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id_patient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`id_department`) REFERENCES `departments` (`id_department`),
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id_doctor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
