-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 04:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarthall`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `RegistrationNumber` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `FoodItem` varchar(1000) NOT NULL,
  `Quantity` varchar(1000) NOT NULL,
  `Cost` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodorder`
--

INSERT INTO `foodorder` (`RegistrationNumber`, `Email`, `FoodItem`, `Quantity`, `Cost`, `date`) VALUES
('2013212072', 'nafissazid48@gmail.com', 'rice with chicken ', '1', 60, '2017-04-26'),
('2013212072', 'nafissazid48@gmail.com', 'rice with chicken ', '4', 240, '2017-04-26'),
('2013212075', 'nafissazid4820@gmail.com', 'rice with beef', '1', 50, '2017-04-26'),
('2013212075', 'nafissazid4820@gmail.com', 'rice with chicken ', '3', 180, '2017-04-26'),
('2013212072', 'nafissazid48@gmail.com', 'rice with chicken', '1', 50, '2017-04-28'),
('2013212072', 'nafissazid48@gmail.com', 'rice with beef', '6', 360, '2017-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(100) NOT NULL,
  `set1` varchar(1000) NOT NULL,
  `price1` int(100) NOT NULL,
  `set2` varchar(1000) NOT NULL,
  `price2` int(11) NOT NULL,
  `set3` varchar(1000) NOT NULL,
  `price3` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `set1`, `price1`, `set2`, `price2`, `set3`, `price3`) VALUES
(1, 'rice with chicken', 50, 'rice with beef', 60, 'rice with fish', 70);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Text` varchar(1000) NOT NULL,
  `Rating` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `Name` varchar(1000) NOT NULL,
  `Department` varchar(1000) NOT NULL,
  `RegistrationNumber` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Category` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`Name`, `Department`, `RegistrationNumber`, `Email`, `Password`, `Category`) VALUES
('Nafis Sazid', 'CSE', '2013212072', 'nafissazid48@gmail.com', 'deadpool', 'student'),
('Nafis Sazid', 'CSE', '2013212075', 'nafissazid4820@gmail.com', 'deadpool', 'student'),
('Mehedi Masum', '', '', 'mehamasum@gmail.com', 'mehamasum', 'manager'),
('Ariful Amin', 'CSE', '2013212073', 'arifulamin@gmail.com', 'rongdhonu', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student_bill`
--

CREATE TABLE `student_bill` (
  `RegistrationNumber` varchar(1000) NOT NULL,
  `TotalCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
