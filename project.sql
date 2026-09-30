-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2026 at 10:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `Amenities_id` int(100) NOT NULL,
  `Service_name` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`Amenities_id`, `Service_name`, `Price`) VALUES
(1, 'Internet', 1000),
(2, 'Massage', 2000),
(3, 'Indoor Games', 1000),
(4, 'Garage', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `enjoy`
--

CREATE TABLE `enjoy` (
  `Guest_id` int(10) NOT NULL,
  `Amenities_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enjoy`
--

INSERT INTO `enjoy` (`Guest_id`, `Amenities_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `Guest_id` int(10) NOT NULL,
  `NID` int(10) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `Mobile_no` int(11) NOT NULL,
  `Check_in_time` date NOT NULL,
  `Check_out_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`Guest_id`, `NID`, `First_name`, `Last_name`, `Mobile_no`, `Check_in_time`, `Check_out_time`) VALUES
(1, 123, 'hasan', 'mahmud', 234234, '2024-05-30', '2024-05-31'),
(2, 123, 'asef', 'aqtab', 23423, '2024-05-30', '2024-05-31'),
(3, 123213, 'fsd', 'sdfsdf', 342334, '2024-05-30', '2024-05-31'),
(4, 123, 'dfsd', 'sdfs', 32423, '2024-05-31', '2024-06-06'),
(5, 122423, 'dsfsf', 'sdfsd', 432432, '2024-06-05', '2024-06-06'),
(6, 888888888, 'Joy', 'Mama', 3534535, '2024-06-05', '2024-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `Hotel_id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Star Rating` int(10) NOT NULL,
  `roomtype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`Hotel_id`, `Name`, `Location`, `Star Rating`, `roomtype_id`) VALUES
(1, 'Crown', 'Dhaka', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `house keeping schedule`
--

CREATE TABLE `house keeping schedule` (
  `Schedule_id` int(11) NOT NULL,
  `TIme` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Duration(hour)` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house keeping schedule`
--

INSERT INTO `house keeping schedule` (`Schedule_id`, `TIme`, `Duration(hour)`) VALUES
(1, '2024-05-29 12:50:31', 2),
(2, '2024-05-29 12:50:31', 1),
(3, '2024-05-29 12:50:39', 1),
(4, '2024-05-29 12:50:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `Laundry_id` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`Laundry_id`, `Date`, `Staff_id`) VALUES
(1, '2024-05-29 12:51:06', 1),
(2, '2024-05-29 12:51:06', 1),
(3, '2024-05-29 12:51:16', 2),
(4, '2024-05-29 12:51:16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(10) NOT NULL,
  `Room_rate` int(10) NOT NULL DEFAULT 0,
  `Amenities_rate` int(10) NOT NULL DEFAULT 0,
  `Food_rate` int(11) NOT NULL DEFAULT 0,
  `Total_Bill` int(10) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Not Paid',
  `Guest_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_id`, `Room_rate`, `Amenities_rate`, `Food_rate`, `Total_Bill`, `Status`, `Guest_id`) VALUES
(5, 8000, 3000, 0, 11000, '', 1),
(6, 8000, 2000, 2000, 12000, '', 2),
(7, 8000, 0, 0, 8000, '', 3),
(8, 8000, 0, 0, 8000, '', 4),
(9, 8000, 0, 0, 8000, '', 5),
(10, 9000, 0, 0, 9000, '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `restaurent_menu`
--

CREATE TABLE `restaurent_menu` (
  `item_no` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` int(10) NOT NULL,
  `Guest_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurent_menu`
--

INSERT INTO `restaurent_menu` (`item_no`, `Name`, `Price`, `Guest_id`) VALUES
(1, 'Mutton Halim', 2000, 0),
(2, 'Chicken Biriyani', 200, 0),
(3, 'Beef Biriyani', 300, 0),
(4, 'Pizza', 1100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_no` int(10) NOT NULL,
  `Floor` int(20) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Available',
  `roomtype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_no`, `Floor`, `Status`, `roomtype_id`) VALUES
(1, 1, 'Available', 2),
(2, 1, 'Booked', 2),
(3, 1, 'Booked', 1),
(4, 1, 'Available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `roomtype_id` int(10) NOT NULL,
  `roomtype` varchar(100) NOT NULL,
  `size` int(100) NOT NULL,
  `Price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`roomtype_id`, `roomtype`, `size`, `Price`) VALUES
(1, 'Classic Double Room', 300, 9000),
(2, 'Classic Room', 200, 8000),
(3, 'Deluxe Suite', 1000, 12000),
(4, 'Executive Suite', 1000, 20000),
(5, 'Premium Double Room', 1000, 10000),
(6, 'Standard Room', 500, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `shs`
--

CREATE TABLE `shs` (
  `Schedule_id` int(10) NOT NULL,
  `Room_id` int(10) NOT NULL,
  `Staff_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Mobile_no` int(11) NOT NULL,
  `Title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_id`, `Name`, `Location`, `Mobile_no`, `Title`) VALUES
(1, 'Hasan', 'Bhola', 135345345, 'Cleaner'),
(2, 'Rahim', 'Borguna', 132342343, 'Driver'),
(3, 'Sojib', 'Cumila', 342342, 'Manager'),
(4, 'Saif', 'Dhaka', 23423423, 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `valet service`
--

CREATE TABLE `valet service` (
  `valet_service_id` int(10) NOT NULL,
  `Car_in_time` time NOT NULL,
  `Car_out_time` time NOT NULL,
  `Staff_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `valet service`
--

INSERT INTO `valet service` (`valet_service_id`, `Car_in_time`, `Car_out_time`, `Staff_id`) VALUES
(1, '07:59:57', '11:59:57', 2),
(2, '10:59:57', '15:59:57', 2),
(3, '11:01:08', '13:01:08', 2),
(4, '17:01:08', '24:01:08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wifi`
--

CREATE TABLE `wifi` (
  `Wifi_id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Floor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wifi`
--

INSERT INTO `wifi` (`Wifi_id`, `Name`, `Floor`) VALUES
(1, 'Floor one Guest', 1),
(2, 'Floor one Guest+', 1),
(3, 'Floor two Guest', 2),
(4, 'Floor two Guest+', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`Amenities_id`);

--
-- Indexes for table `enjoy`
--
ALTER TABLE `enjoy`
  ADD KEY `Amenities_id` (`Amenities_id`),
  ADD KEY `Guest_id` (`Guest_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`Guest_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`Hotel_id`);

--
-- Indexes for table `house keeping schedule`
--
ALTER TABLE `house keeping schedule`
  ADD PRIMARY KEY (`Schedule_id`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`Laundry_id`),
  ADD KEY `Staff_id` (`Staff_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `Guest_id` (`Guest_id`);

--
-- Indexes for table `restaurent_menu`
--
ALTER TABLE `restaurent_menu`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_no`),
  ADD KEY `roomtype_id` (`roomtype_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`roomtype_id`);

--
-- Indexes for table `shs`
--
ALTER TABLE `shs`
  ADD KEY `Room_id` (`Room_id`),
  ADD KEY `Schedule_id` (`Schedule_id`),
  ADD KEY `Staff_id` (`Staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_id`);

--
-- Indexes for table `valet service`
--
ALTER TABLE `valet service`
  ADD PRIMARY KEY (`valet_service_id`),
  ADD KEY `Staff_id` (`Staff_id`);

--
-- Indexes for table `wifi`
--
ALTER TABLE `wifi`
  ADD PRIMARY KEY (`Wifi_id`,`Name`,`Floor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `restaurent_menu`
--
ALTER TABLE `restaurent_menu`
  MODIFY `item_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `roomtype_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enjoy`
--
ALTER TABLE `enjoy`
  ADD CONSTRAINT `enjoy_ibfk_1` FOREIGN KEY (`Amenities_id`) REFERENCES `amenities` (`Amenities_id`),
  ADD CONSTRAINT `enjoy_ibfk_2` FOREIGN KEY (`Guest_id`) REFERENCES `guest` (`Guest_id`);

--
-- Constraints for table `laundry`
--
ALTER TABLE `laundry`
  ADD CONSTRAINT `laundry_ibfk_1` FOREIGN KEY (`Staff_id`) REFERENCES `staff` (`Staff_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Guest_id`) REFERENCES `guest` (`Guest_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`roomtype_id`) REFERENCES `room_type` (`roomtype_id`);

--
-- Constraints for table `shs`
--
ALTER TABLE `shs`
  ADD CONSTRAINT `shs_ibfk_1` FOREIGN KEY (`Room_id`) REFERENCES `room` (`Room_no`),
  ADD CONSTRAINT `shs_ibfk_2` FOREIGN KEY (`Schedule_id`) REFERENCES `house keeping schedule` (`Schedule_id`),
  ADD CONSTRAINT `shs_ibfk_3` FOREIGN KEY (`Staff_id`) REFERENCES `staff` (`Staff_id`);

--
-- Constraints for table `valet service`
--
ALTER TABLE `valet service`
  ADD CONSTRAINT `valet service_ibfk_1` FOREIGN KEY (`Staff_id`) REFERENCES `staff` (`Staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
