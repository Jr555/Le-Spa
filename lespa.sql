-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 10:32 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lespa`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_no` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middle_initial` varchar(1) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `Ext` varchar(5) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_no`, `firstname`, `middle_initial`, `lastname`, `Ext`, `address`, `contact_number`) VALUES
(1, 'Liza', 'T', 'Soberano', '', 'USA', '09876543212'),
(2, 'Bea ', 'M', 'Alonzo', '', 'Manila', '09897867564'),
(3, 'Artemio', 'C', 'Andam', 'III', 'Western Poblacion', '09897867564');

-- --------------------------------------------------------

--
-- Table structure for table `customer_records`
--

CREATE TABLE `customer_records` (
  `id` int(10) NOT NULL,
  `customer_no` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_records`
--

INSERT INTO `customer_records` (`id`, `customer_no`, `date`) VALUES
(3, 2, '2019-03-14'),
(4, 1, '2019-03-13'),
(5, 3, '2019-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_no` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middle_initial` varchar(1) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `Ext` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_no`, `firstname`, `middle_initial`, `lastname`, `Ext`) VALUES
(1, 'Edwin ', 'Y', 'Ending', 'II'),
(2, 'Joel', 'T', 'Agot', ''),
(3, 'Ian Ray', 'T', 'Banaglorioso', 'II');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_code` int(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `commission` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_code`, `description`, `price`, `duration`, `commission`) VALUES
(1, 'Back Massage', '500.00', '30 mins', '100.00'),
(2, 'Russian Massage', '1000.00', '1 hr', '50.00'),
(3, 'Oil Massage', '350.00', '20 mins', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `service_records`
--

CREATE TABLE `service_records` (
  `id` int(10) NOT NULL,
  `service_code` int(10) NOT NULL,
  `employee_no` int(10) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `commission` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2019-02-20 01:30:00'),
(2, 'owner', 'owner@gmail.com', '72122ce96bfec66e2396d2e25225d70a', '2019-03-27 14:54:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_no`);

--
-- Indexes for table `customer_records`
--
ALTER TABLE `customer_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_no` (`customer_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_no`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_code`);

--
-- Indexes for table `service_records`
--
ALTER TABLE `service_records`
  ADD KEY `service_records_ibfk_2` (`service_code`),
  ADD KEY `employee_no` (`employee_no`),
  ADD KEY `service_records_ibfk_4` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_records`
--
ALTER TABLE `customer_records`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_records`
--
ALTER TABLE `service_records`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_records`
--
ALTER TABLE `customer_records`
  ADD CONSTRAINT `customer_records_ibfk_1` FOREIGN KEY (`customer_no`) REFERENCES `customer` (`customer_no`);

--
-- Constraints for table `service_records`
--
ALTER TABLE `service_records`
  ADD CONSTRAINT `service_records_ibfk_2` FOREIGN KEY (`service_code`) REFERENCES `service` (`service_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_records_ibfk_3` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_records_ibfk_4` FOREIGN KEY (`id`) REFERENCES `customer_records` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
