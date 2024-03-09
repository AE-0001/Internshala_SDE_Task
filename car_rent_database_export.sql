-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 02:35 PM
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
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency_register`
--

CREATE TABLE `agency_register` (
  `Agency Name` text NOT NULL,
  `Email Address` varchar(20) NOT NULL,
  `Password` varchar(23) NOT NULL,
  `Contact Number` bigint(20) DEFAULT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agency_register`
--

INSERT INTO `agency_register` (`Agency Name`, `Email Address`, `Password`, `Contact Number`, `Address`) VALUES
('Fscabs', 'fs@gmail.com', 'qwertyuiop', 9876086542, 'Ritch roads, Chennai'),
('Rapido', 'rapido@gmail.com', 'venmo', 6383531462, '234/165,A7,Sumanth Apartments,RK Mutt Road'),
('New cars', 'newcars@gmail.com', 'passs', 9809763124, 'abc roads CA'),
('123cabs', '123cabs@gmail.com', 'tyui', 9807654321, 'Seashores, Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `available_cars`
--

CREATE TABLE `available_cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available_cars`
--

INSERT INTO `available_cars` (`id`, `brand`, `model`, `available`) VALUES
(1, 'Toyota', 'Corolla', 10),
(2, 'Honda', 'Civic', 8),
(3, 'Ford', 'Focus', 6),
(4, 'Chevrolet', 'Malibu', 5),
(5, 'Volkswagen', 'Jetta', 7);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `car_model` varchar(255) NOT NULL,
  `booking_duration` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `driver_license` varchar(255) NOT NULL,
  `ending_date` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`car_model`, `booking_duration`, `booking_date`, `customer_name`, `email`, `driver_license`, `ending_date`, `customer_id`) VALUES
('Mali', 3, '2024-03-16', 'Santhosh', 'santhosh14356m@gmail.com', 'ASERT456YHN', '2024-03-19', 1),
('Toyota Corolla', 18, '2024-03-09', 'Gayathri Nandhana\\', 'flashbarryallen89@gmail.com', 'jncdnhvbhjfvbegjb', '2024-03-27', 2),
('Honda Civic', 21, '2024-03-15', 'Akshara', 'saiakshara.khizamboor2020@vitstudent.ac.in', 'SFT123536FSGWS', '2024-04-06', 3),
('Toyota Corolla', 4, '2024-03-28', 'Aravind', 'aravind@gmail.com', 'SWERTY45678RTYU', '2024-04-02', 101);

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cust_reg`
--

CREATE TABLE `cust_reg` (
  `name` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `driver_license` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_reg`
--

INSERT INTO `cust_reg` (`name`, `email`, `password`, `driver_license`) VALUES
('Gayathri Nandhana', 'gayathri@gmail.com', '12345', 'jncdnhvbhjfvbegjb'),
('Matty New', 'matty@gmail.com', '7890', 'ffsdgdshierygeui123'),
('Santhosh M', 'santhosh14356m@gmail', 'sansan', 'ASERT456YHN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_cars`
--
ALTER TABLE `available_cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `cust_reg`
--
ALTER TABLE `cust_reg`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_cars`
--
ALTER TABLE `available_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
