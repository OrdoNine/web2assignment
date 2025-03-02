-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 06:27 PM
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
-- Database: `hadderdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookorders`
--

CREATE TABLE `bookorders` (
  `ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Language` varchar(20) NOT NULL,
  `Pages` int(11) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookorders`
--

INSERT INTO `bookorders` (`ID`, `Amount`, `Language`, `Pages`, `Color`, `Price`) VALUES
(1, 1, 'arabic', 40, 'black', 0.4),
(2, 5, 'english', 80, 'black', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `colororders`
--

CREATE TABLE `colororders` (
  `ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `glueorders`
--

CREATE TABLE `glueorders` (
  `ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `glueorders`
--

INSERT INTO `glueorders` (`ID`, `Amount`, `Size`, `Price`) VALUES
(4, 1, 'medium', 1.5),
(5, 2, 'big', 4);

-- --------------------------------------------------------

--
-- Table structure for table `paperorders`
--

CREATE TABLE `paperorders` (
  `ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penorders`
--

CREATE TABLE `penorders` (
  `ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Point` varchar(20) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penorders`
--

INSERT INTO `penorders` (`ID`, `Amount`, `Point`, `Color`, `Price`) VALUES
(4, 3, 'tripoint', 'red', 0.9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(20) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Age`, `Gender`, `Email`, `Password`, `ID`) VALUES
('Oakley', 40, 0, 'roped@in.com', 'omar', 2),
('User', 18, 0, 'whateves@yaho.com', '8172', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookorders`
--
ALTER TABLE `bookorders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `colororders`
--
ALTER TABLE `colororders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `glueorders`
--
ALTER TABLE `glueorders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `paperorders`
--
ALTER TABLE `paperorders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `penorders`
--
ALTER TABLE `penorders`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookorders`
--
ALTER TABLE `bookorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colororders`
--
ALTER TABLE `colororders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `glueorders`
--
ALTER TABLE `glueorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paperorders`
--
ALTER TABLE `paperorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penorders`
--
ALTER TABLE `penorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
