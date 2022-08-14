-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2022 at 05:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `c_id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`c_id`, `cname`, `createdAt`) VALUES
(1, 'None', '2022-08-09'),
(2, 'Food', '2022-08-09'),
(3, 'Vegetables', '2022-08-09'),
(4, 'Clothes', '2022-08-09'),
(5, 'Electronic Devices', '2022-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `query` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `mobile`, `query`) VALUES
(1, 'Dhruv', 'goswami@gmail.com', '9327563251', 'Nothing much'),
(2, 'Abhishek Nalla', 'nallaabhi2003@gmail.com', '9712166240', 'Hello, how are you');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `e_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `amount` varchar(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`e_id`, `u_id`, `ename`, `date`, `time`, `amount`, `category`, `comment`) VALUES
(1, 3, 'Vegetables', '2022-08-08', '09:03:51', '200', 'Vegetables', 'Brought tomatoes and potatoes '),
(2, 5, 'Vegetables', '2022-08-08', '06:31:40', '300', 'Vegetables', 'Brought tomatoes and potatoes '),
(3, 5, 'Didi Dress', '2022-08-09', '03:06:21', '2000', 'Clothes', 'Brought dress from T&M'),
(4, 5, 'McDonald', '2022-08-07', '07:00:18', '500', 'Food', 'Ordered burger and ice-cream from McD'),
(5, 5, 'Iphone', '2022-08-01', '03:09:39', '120000', 'Electronic Devices', 'Brought Iphone for didi'),
(6, 5, 'Vegetables', '2022-08-09', '07:11:13', '500', 'Vegetables', 'Brought tomatoes and potatoes '),
(7, 6, 'Rent Payment', '2022-08-09', '09:34:08', '45000', 'None', 'Rent Payment Through Credit Card'),
(8, 6, 'Electricity Bill', '2022-08-09', '09:35:00', '2208', 'None', 'Bill Payment'),
(9, 6, 'Swiggy', '2022-08-09', '09:35:30', '840', 'Food', 'Burger and Snakes'),
(10, 6, 'Recharge', '2022-08-01', '10:05:38', '299', 'Electronic Devices', 'Mobile Recharge VI'),
(11, 6, 'Credit card bill', '2022-08-13', '12:37:00', '50577', 'None', 'ICICI credit card part payment done');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(10) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `expense_limit` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `bio` varchar(510) DEFAULT NULL,
  `log` int(11) NOT NULL DEFAULT 0,
  `joined_since` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `name`, `username`, `email`, `phone_no`, `password`, `dob`, `age`, `job`, `salary`, `expense_limit`, `address`, `city`, `state`, `country`, `bio`, `log`, `joined_since`) VALUES
(5, 'Abhishek Anjaneyulu Nalla', NULL, 'nallaabhi2003@gmail.com', '9054849782', 'd76f3d05cc9ac98f1f9160274a39fe33', '2003-09-30', 18, 'Team Leader', 500000, 300000, '208 Saidham Soc', 'Surat', 'Gujarat', 'India', 'I have work experience of 10 years and expert in leading a team. I want to save money and invest in a better place.', 1, '2022-08-08'),
(6, 'Dhruvpuri Goswami', NULL, 'djgoswami25@gmail.com', '9393939393', '1eba9614763773df08dd49049663c3e3', '2003-11-25', 18, 'CEO of Google', 950000, 800000, 'White Solitair', 'Surat', 'Gujarat', 'India', 'A chief executive officer (CEO) is the highest-ranking executive in a company. Broadly speaking, a chief executive officer’s primary responsibilities include making major corporate decisions, managing the overall operations and resources of a company.', 1, '2022-08-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
