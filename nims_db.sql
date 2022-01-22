-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 11:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

CREATE TABLE `tbl_agent` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`id`, `name`, `email`, `address`, `phone`, `regdate`) VALUES
(1, 'Norhafizah', 'fiza@gmail.com', 'Klang, Selangor', '01128497191', '2021-12-01'),
(2, 'Rosemeinie ', 'rose@yahoo.com', 'Petaling Jaya, Selangor', '01169588598', '2021-12-03'),
(3, 'Nurul Izzah', 'zah@gmail.com', 'Jitra, Kedah', '0175320306', '2021-12-03'),
(4, 'Hafiqzuddin', 'hafiq@gmail.com', 'Cheras, KL', '01111231783', '2021-12-03'),
(5, 'Nurul Salwani', 'wani@gmail.com', 'Ampang, KL', '0127138789', '2021-12-03'),
(6, 'Arash Fitri', 'ash@ymail.com', 'Jasin, Melaka', '01152783799', '2021-12-04'),
(7, 'Nurul Husna', 'cuna@gmail.com', 'Bagan Datuk, Perak', '01110612247', '2021-12-04'),
(8, 'Kamillia', 'kamy@gmail', 'Puchong, Selangor', '0194374546', '2021-12-24'),
(9, 'Nur Aliah', 'liya@gmail.com', 'Bidor, Perak', '01133012025', '2021-12-23'),
(10, 'Muhammad Shafieq', 'apik@gmail.com', 'Johor Bharu, Johor', '01130780419', '2021-12-25'),
(11, 'Rosman', 'man@gmail.com', 'Alor Setar ,  Kedah', '0172265623', '2021-12-25'),
(12, 'Shida', 'shida@gmail.com', 'Tanah Merah, Kelantan', '0199393102', '2022-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
