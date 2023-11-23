-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 05:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE `allocations` (
  `allocation_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `admission_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allocations`
--

INSERT INTO `allocations` (`allocation_id`, `room_id`, `admission_no`) VALUES
(1, 1, 111),
(2, 2, 2023005),
(3, 3, 2023009),
(4, 4, 2023013),
(5, 1, 2023002),
(6, 2, 2023020),
(7, 1, 2023006),
(8, 2, 2023010),
(9, 3, 2023014),
(10, 4, 2023018);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` varchar(66) NOT NULL,
  `morning` int(11) NOT NULL,
  `night` int(11) NOT NULL,
  `date` date NOT NULL,
  `matron` int(11) NOT NULL,
  `hs` int(11) NOT NULL,
  `staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `name`, `admission_no`, `branch`, `semester`, `morning`, `night`, `date`, `matron`, `hs`, `staff`) VALUES
(3, 'John Doe', '111', 'CSE', '22', 2, 2, '2023-11-20', 0, 0, 0),
(6, 'John Doe', '111', 'CSE', '22', 1, 0, '2023-11-21', 1, 1, 0),
(24, 'Saheba Biju', '', '', '', 0, 1, '2023-11-22', 1, 1, 0),
(25, 'Saheba Biju', '', '', '', 1, 0, '2023-11-23', 1, 1, 1),
(26, 'John Doe', '111', 'CSE', '22', 1, 0, '2023-11-23', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_box`
--

CREATE TABLE `complaint_box` (
  `complaint_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `admission_no` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_box`
--

INSERT INTO `complaint_box` (`complaint_id`, `topic`, `content`, `admission_no`, `name`, `branch_name`, `degree`, `role`) VALUES
(2, 'test', 'test', '111', 'SHEBIN P BIJU', 'mca', 'math', ''),
(3, 'test', 'test', '111', 'SHEBIN P BIJU', 'mca', 'math', ''),
(4, 'test', 'test', '111', 'SHEBIN P BIJU', 'mca', 'math', ''),
(5, 'test', 'q', '111', 'SHEBIN P BIJU', 'mca', 'math', ''),
(6, 'test', 'w', '111', 'SHEBIN P BIJU', 'mca', 'math', ''),
(7, 'aa', 'aa', '111', 'SHEBIN P BIJU', 'B.Tech', 'MCA', ''),
(8, 'aa', 'aa', '111', 'SHEBIN P BIJU', 'B.Tech', 'MCA', 'mess_secretary'),
(9, 'aa', 'aa', '111', 'SHEBIN P BIJU', 'B.Tech', 'MCA', 'hostel_secretary'),
(10, 'test', 'WD', '111', 'SHEBIN P BIJU', 'B.Tech', 'MCA', 'mess_secretary');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `username`, `file_name`, `file_path`, `upload_time`, `verified`) VALUES
(1, '111', '111_Income Certificate_student_list (17).pdf', 'C:xampphtdocsHostel_Management_SystemphpdashboardstudentDashboard/uploads/111_Income Certificate_student_list (17).pdf', '2023-11-19 11:08:05', 1),
(2, '111', '111_Community Certificate_student_list (17).pdf', 'C:xampphtdocsHostel_Management_SystemphpdashboardstudentDashboard/uploads/111_Community Certificate_student_list (17).pdf', '2023-11-19 11:08:05', 1),
(3, '111', '111_Aadhar Card_student_list (17).pdf', 'C:xampphtdocsHostel_Management_SystemphpdashboardstudentDashboard/uploads/111_Aadhar Card_student_list (17).pdf', '2023-11-19 11:08:05', 0),
(4, '111', '111_Ration Card_student_list (17).pdf', 'C:xampphtdocsHostel_Management_SystemphpdashboardstudentDashboard/uploads/111_Ration Card_student_list (17).pdf', '2023-11-19 11:08:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `date` varchar(155) NOT NULL,
  `admission_no` varchar(22) NOT NULL,
  `reason` varchar(22) NOT NULL,
  `status` varchar(111) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`date`, `admission_no`, `reason`, `status`, `amount`, `type`) VALUES
('wewe', '', '', '', 0, ''),
('2023-11-09', '111', 'qweq', 'Paid', 1111111, 'HS fine'),
('2023-11-09', '111', 'qweq', 'Paid', 1111111, 'HS fine'),
('2023-11-03', '111', 'S', 'Paid', 11, 'HS fine'),
('2023-11-03', '111', 'qweq', 'Paid', 1111, 'HS fine'),
('2023-11-03', '111', '1111', 'Paid', 1111, 'Mess fine'),
('2023-12-03', '111', 'qweq', 'unpaid', 1111, 'HS fine');

-- --------------------------------------------------------

--
-- Table structure for table `fine_generation`
--

CREATE TABLE `fine_generation` (
  `fine_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fine_amount` decimal(10,2) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `date_generated` date DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food_feedback`
--

CREATE TABLE `food_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `admission_no` varchar(20) NOT NULL,
  `food` varchar(50) NOT NULL,
  `fooditem` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_feedback`
--

INSERT INTO `food_feedback` (`feedback_id`, `feedback`, `admission_no`, `food`, `fooditem`) VALUES
(0, 'tasty\r\n', '111', 'Lunch', 'Veg meals + fish'),
(0, 'qqq', '111', 'Breakfast', 'chappathi + chicken cu');

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `menu_id` int(11) NOT NULL,
  `breakfast_item` varchar(255) DEFAULT NULL,
  `lunch_item` varchar(255) DEFAULT NULL,
  `evening_item` varchar(255) DEFAULT NULL,
  `dinner_item` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`menu_id`, `breakfast_item`, `lunch_item`, `evening_item`, `dinner_item`) VALUES
(1, 'kappa', 'chor', 'vada', 'kappa');

-- --------------------------------------------------------

--
-- Table structure for table `home_register`
--

CREATE TABLE `home_register` (
  `admission_no` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `room_no` int(11) NOT NULL,
  `date` varchar(111) NOT NULL,
  `place` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `matron` int(11) NOT NULL,
  `hs` int(11) NOT NULL,
  `return` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_register`
--

INSERT INTO `home_register` (`admission_no`, `name`, `room_no`, `date`, `place`, `time`, `matron`, `hs`, `return`) VALUES
(111, 'John Doe', 0, '2023-11-19', 123123, 123123, 1, 1, 1),
(111, 'John Doe', 0, '2023-11-19', 123123, 123123, 1, 1, 1),
(111, 'John Doe', 0, '2023-11-19', 123123, 123123, 1, 1, 1),
(111, 'John Doe', 0, '11111-11-11', 1, 111, 1, 1, 1),
(111, 'John Doe', 0, '11111-11-12', 111, 111, 1, 1, 1),
(111, 'John Doe', 0, '2023-11-20', 123123, 123123, 0, 0, 1),
(111, 'John Doe', 0, '2023-11-26', 1, 21212312, 0, 0, 1),
(111, 'John Doe', 0, '2023-11-26', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_report`
--

CREATE TABLE `hostel_report` (
  `id` int(11) NOT NULL,
  `admissionNo` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `yearOfStudy` int(11) DEFAULT NULL,
  `degree` varchar(20) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `fee_concession` varchar(10) DEFAULT NULL,
  `total_attendance` int(11) DEFAULT NULL,
  `fine_reason` varchar(255) DEFAULT NULL,
  `fine_status` varchar(20) DEFAULT NULL,
  `fine_amount` decimal(10,2) DEFAULT NULL,
  `stock_per_student` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_student_list`
--

CREATE TABLE `hostel_student_list` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `yearOfStudy` int(11) DEFAULT NULL,
  `admissionNo` varchar(20) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `pAddress` text DEFAULT NULL,
  `gAddress` text DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `distance_metric` int(155) NOT NULL,
  `income_metric` int(111) NOT NULL,
  `p1` int(11) NOT NULL,
  `p2` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_student_list`
--

INSERT INTO `hostel_student_list` (`id`, `name`, `gender`, `degree`, `yearOfStudy`, `admissionNo`, `semester`, `branch`, `pAddress`, `gAddress`, `pincode`, `mobile`, `distance_metric`, `income_metric`, `p1`, `p2`, `other`, `room_no`) VALUES
(1, 'John Doe', 'male', 'B.Tech', 2, '111', 22, 'CSE', '123 Main St, City', '456 Guardian St, City', '123456', '1111111', 51, 50000, 1, 0, 0, 0),
(13, 'John Doe', 'male', 'B.Tech', 1, '2023001', 1, 'CSE', '123 Main St, City', '456 Guardian St, City', '123456', '1234567890', 51, 50000, 1, 0, 0, 0),
(6, 'Jane Smith', 'female', 'M.Tech', 1, '2023002', 1, 'ECE', '456 Main St, City', '789 Guardian St, City', '654321', '11', 45, 60000, 0, 1, 0, 0),
(46, 'Sam Johnson', 'male', 'MCA', 3, '2023003', 5, 'IT', '789 Main St, City', '123 Guardian St, City', '987654', '8765432109', 31, 75000, 0, 0, 1, 0),
(34, 'Eva Brown', 'female', 'B.Tech', 4, '2023004', 7, 'ME', '987 Main St, City', '234 Guardian St, City', '876543', '7654321098', 22, 55000, 0, 0, 1, 0),
(2, 'Mark Wilson', 'male', 'B.Tech', 1, '2023005', 2, 'CE', '234 Main St, City', '567 Guardian St, City', '765432', '6543210987', 61, 60000, 1, 0, 0, 0),
(7, 'Lisa Davis', 'female', 'MCA', 2, '2023006', 4, 'IT', '345 Main St, City', '678 Guardian St, City', '234567', '5432109876', 43, 70000, 0, 1, 0, 0),
(35, 'Mike Taylor', 'male', 'B.Tech', 3, '2023007', 6, 'CSE', '567 Main St, City', '890 Guardian St, City', '345678', '4321098765', 35, 50000, 0, 0, 1, 0),
(3, 'Tom White', 'male', 'B.Tech', 1, '2023009', 1, 'ME', '789 Main St, City', '012 Guardian St, City', '567890', '2109876543', 55, 55000, 1, 0, 0, 0),
(8, 'Emily Clark', 'female', 'MCA', 2, '2023010', 3, 'IT', '890 Main St, City', '123 Guardian St, City', '678901', '0987654321', 48, 65000, 0, 1, 0, 0),
(47, 'Olivia Hall', 'female', 'M.Tech', 4, '2023012', 7, 'ECE', '345 Main St, City', '678 Guardian St, City', '901234', '8765432109', 27, 70000, 0, 0, 1, 0),
(4, 'James Lee', 'male', 'B.Tech', 1, '2023013', 2, 'ME', '678 Main St, City', '901 Guardian St, City', '123456', '5432109876', 59, 60000, 1, 0, 0, 0),
(9, 'Sophie Turner', 'female', 'MCA', 2, '2023014', 4, 'IT', '234 Main St, City', '567 Guardian St, City', '234567', '0987654321', 39, 55000, 0, 1, 0, 0),
(11, 'Daniel Brown', 'male', 'B.Tech', 3, '2023015', 6, 'CSE', '789 Main St, City', '012 Guardian St, City', '345678', '8765432109', 45, 65000, 0, 0, 1, 0),
(5, 'William Johnson', 'male', 'B.Tech', 1, '2023017', 1, 'ME', '345 Main St, City', '678 Guardian St, City', '123456', '5432109876', 56, 70000, 1, 0, 0, 0),
(10, 'Ava Davis', 'female', 'MCA', 2, '2023018', 3, 'IT', '678 Main St, City', '901 Guardian St, City', '234567', '0987654321', 48, 60000, 0, 1, 0, 0),
(12, 'Mia Miller', 'female', 'M.Tech', 4, '2023020', 8, 'ECE', '345 Main St, City', '678 Guardian St, City', '901234', '0987654321', 27, 75000, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_student_registration`
--

CREATE TABLE `hostel_student_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `yearOfStudy` int(11) DEFAULT NULL,
  `admissionNo` varchar(20) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `pAddress` text DEFAULT NULL,
  `gAddress` text DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `gMobile` varchar(15) DEFAULT NULL,
  `prAddress` text DEFAULT NULL,
  `p1` tinyint(1) DEFAULT NULL,
  `p2` tinyint(1) DEFAULT NULL,
  `other` tinyint(1) DEFAULT NULL,
  `aIncome` decimal(10,2) DEFAULT NULL,
  `obcOrOec` enum('obcOrOecYes','obcOrOecNo') DEFAULT NULL,
  `distance` decimal(10,2) DEFAULT NULL,
  `sgpa1` decimal(3,2) DEFAULT NULL,
  `sgpa2` decimal(3,2) DEFAULT NULL,
  `sgpa3` decimal(3,2) DEFAULT NULL,
  `sgpa4` decimal(3,2) DEFAULT NULL,
  `sgpa5` decimal(3,2) DEFAULT NULL,
  `sgpa6` decimal(3,2) DEFAULT NULL,
  `sgpa7` decimal(3,2) DEFAULT NULL,
  `sgpa8` decimal(3,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `dAction` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_student_registration`
--

INSERT INTO `hostel_student_registration` (`id`, `name`, `gender`, `degree`, `yearOfStudy`, `admissionNo`, `semester`, `branch`, `pAddress`, `gAddress`, `pincode`, `mobile`, `gMobile`, `prAddress`, `p1`, `p2`, `other`, `aIncome`, `obcOrOec`, `distance`, `sgpa1`, `sgpa2`, `sgpa3`, `sgpa4`, `sgpa5`, `sgpa6`, `sgpa7`, `sgpa8`, `rank`, `dAction`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'male', 'B.Tech', 1, '2023001', 1, 'CSE', '123 Main St, City', '456 Guardian St, City', '123456', '1234567890', '9876543210', '789 Present St, City', 1, 0, 0, '50000.00', 'obcOrOecYes', '50.75', '3.40', '3.60', '3.70', '3.80', '3.50', '3.60', '3.70', '3.80', 120, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(2, 'Jane Smith', 'female', 'M.Tech', 2, '2023002', 3, 'ECE', '456 Main St, City', '789 Guardian St, City', '654321', '9876543210', '1234567890', '654 Present St, City', 0, 1, 0, '60000.00', 'obcOrOecNo', '45.25', '3.00', '3.20', '3.50', '3.10', '3.20', '3.40', '3.30', '3.10', 150, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(3, 'Sam Johnson', 'male', 'MCA', 3, '2023003', 5, 'IT', '789 Main St, City', '123 Guardian St, City', '987654', '8765432109', '2345678901', '987 Present St, City', 0, 0, 1, '75000.00', 'obcOrOecYes', '30.50', '2.80', '3.00', '2.90', '3.10', '3.20', '3.00', '2.80', '3.10', 180, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(4, 'Eva Brown', 'female', 'B.Tech', 4, '2023004', 7, 'ME', '987 Main St, City', '234 Guardian St, City', '876543', '7654321098', '3456789012', '876 Present St, City', 0, 0, 1, '55000.00', 'obcOrOecNo', '22.00', '2.50', '2.30', '2.80', '2.70', '2.50', '2.40', '2.60', '2.70', 200, 'Two warnings issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(5, 'Mark Wilson', 'male', 'B.Tech', 1, '2023005', 2, 'CE', '234 Main St, City', '567 Guardian St, City', '765432', '6543210987', '4567890123', '765 Present St, City', 1, 0, 0, '60000.00', 'obcOrOecYes', '60.50', '3.50', '3.60', '3.80', '3.70', '3.50', '3.40', '3.60', '3.70', 90, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(6, 'Lisa Davis', 'female', 'MCA', 2, '2023006', 4, 'IT', '345 Main St, City', '678 Guardian St, City', '234567', '5432109876', '5678901234', '654 Present St, City', 0, 1, 0, '70000.00', 'obcOrOecNo', '42.50', '3.20', '3.40', '3.60', '3.50', '3.30', '3.20', '3.50', '3.40', 130, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(7, 'Mike Taylor', 'male', 'B.Tech', 3, '2023007', 6, 'CSE', '567 Main St, City', '890 Guardian St, City', '345678', '4321098765', '6789012345', '876 Present St, City', 0, 0, 1, '50000.00', 'obcOrOecYes', '35.00', '2.90', '3.00', '2.80', '3.10', '3.20', '2.90', '3.00', '3.20', 160, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(8, 'Sara Miller', 'female', 'M.Tech', 4, '2023008', 8, 'ECE', '678 Main St, City', '901 Guardian St, City', '456789', '3210987654', '7890123456', '987 Present St, City', 0, 0, 1, '80000.00', 'obcOrOecNo', '28.50', '2.80', '2.90', '3.00', '2.90', '2.70', '2.80', '2.90', '2.70', 175, 'Two warnings issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(9, 'Tom White', 'male', 'B.Tech', 1, '2023009', 1, 'ME', '789 Main St, City', '012 Guardian St, City', '567890', '2109876543', '8901234567', '123 Present St, City', 1, 0, 0, '55000.00', 'obcOrOecYes', '55.00', '3.60', '3.70', '3.50', '3.80', '3.60', '3.50', '3.70', '3.80', 110, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(10, 'Emily Clark', 'female', 'MCA', 2, '2023010', 3, 'IT', '890 Main St, City', '123 Guardian St, City', '678901', '0987654321', '2345678901', '345 Present St, City', 0, 1, 0, '65000.00', 'obcOrOecNo', '48.00', '3.00', '3.10', '3.20', '3.40', '3.50', '3.20', '3.10', '3.30', 140, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(11, 'Andrew Adams', 'male', 'B.Tech', 3, '2023011', 5, 'CSE', '012 Main St, City', '345 Guardian St, City', '789012', '9876543210', '4567890123', '567 Present St, City', 0, 0, 1, '75000.00', 'obcOrOecYes', '32.50', '3.20', '3.30', '3.00', '3.10', '3.20', '3.40', '3.30', '3.10', 155, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(12, 'Olivia Hall', 'female', 'M.Tech', 4, '2023012', 7, 'ECE', '345 Main St, City', '678 Guardian St, City', '901234', '8765432109', '5678901234', '678 Present St, City', 0, 0, 1, '70000.00', 'obcOrOecNo', '26.50', '2.70', '2.80', '2.90', '3.00', '2.80', '2.70', '2.90', '2.70', 190, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(13, 'James Lee', 'male', 'B.Tech', 1, '2023013', 2, 'ME', '678 Main St, City', '901 Guardian St, City', '123456', '5432109876', '7890123456', '890 Present St, City', 1, 0, 0, '60000.00', 'obcOrOecYes', '58.50', '3.50', '3.60', '3.70', '3.80', '3.60', '3.40', '3.50', '3.70', 95, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(14, 'Sophie Turner', 'female', 'MCA', 2, '2023014', 4, 'IT', '234 Main St, City', '567 Guardian St, City', '234567', '0987654321', '3456789012', '012 Present St, City', 0, 1, 0, '55000.00', 'obcOrOecNo', '39.00', '2.90', '3.00', '2.80', '3.10', '3.20', '2.90', '3.00', '3.20', 170, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(15, 'Daniel Brown', 'male', 'B.Tech', 3, '2023015', 6, 'CSE', '789 Main St, City', '012 Guardian St, City', '345678', '8765432109', '5678901234', '234 Present St, City', 0, 0, 1, '65000.00', 'obcOrOecYes', '45.00', '3.20', '3.30', '3.00', '3.10', '3.20', '3.40', '3.30', '3.10', 150, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(16, 'Emma Smith', 'female', 'M.Tech', 4, '2023016', 8, 'ECE', '012 Main St, City', '345 Guardian St, City', '901234', '0987654321', '2345678901', '345 Present St, City', 0, 0, 1, '75000.00', 'obcOrOecNo', '32.50', '2.80', '2.90', '3.00', '2.90', '2.70', '2.80', '2.90', '2.70', 185, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(17, 'William Johnson', 'male', 'B.Tech', 1, '2023017', 1, 'ME', '345 Main St, City', '678 Guardian St, City', '123456', '5432109876', '7890123456', '456 Present St, City', 1, 0, 0, '70000.00', 'obcOrOecYes', '55.50', '3.60', '3.70', '3.50', '3.80', '3.60', '3.50', '3.70', '3.80', 100, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(18, 'Ava Davis', 'female', 'MCA', 2, '2023018', 3, 'IT', '678 Main St, City', '901 Guardian St, City', '234567', '0987654321', '3456789012', '567 Present St, City', 0, 1, 0, '60000.00', 'obcOrOecNo', '48.00', '3.00', '3.10', '3.20', '3.40', '3.50', '3.20', '3.10', '3.30', 140, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(19, 'Christopher Martin', 'male', 'B.Tech', 3, '2023019', 5, 'CSE', '901 Main St, City', '234 Guardian St, City', '345678', '8765432109', '5678901234', '678 Present St, City', 0, 0, 1, '80000.00', 'obcOrOecYes', '30.50', '3.20', '3.30', '3.00', '3.10', '3.20', '3.40', '3.30', '3.10', 160, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(20, 'Mia Miller', 'female', 'M.Tech', 4, '2023020', 8, 'ECE', '345 Main St, City', '678 Guardian St, City', '901234', '0987654321', '2345678901', '789 Present St, City', 0, 0, 1, '75000.00', 'obcOrOecNo', '26.50', '2.70', '2.80', '2.90', '3.00', '2.80', '2.70', '2.90', '2.70', 190, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_student_registration_backup`
--

CREATE TABLE `hostel_student_registration_backup` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `yearOfStudy` int(11) DEFAULT NULL,
  `admissionNo` varchar(20) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `pAddress` text DEFAULT NULL,
  `gAddress` text DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `gMobile` varchar(15) DEFAULT NULL,
  `prAddress` text DEFAULT NULL,
  `p1` tinyint(1) DEFAULT NULL,
  `p2` tinyint(1) DEFAULT NULL,
  `other` tinyint(1) DEFAULT NULL,
  `aIncome` decimal(10,2) DEFAULT NULL,
  `obcOrOec` enum('obcOrOecYes','obcOrOecNo') DEFAULT NULL,
  `distance` decimal(10,2) DEFAULT NULL,
  `sgpa1` decimal(3,2) DEFAULT NULL,
  `sgpa2` decimal(3,2) DEFAULT NULL,
  `sgpa3` decimal(3,2) DEFAULT NULL,
  `sgpa4` decimal(3,2) DEFAULT NULL,
  `sgpa5` decimal(3,2) DEFAULT NULL,
  `sgpa6` decimal(3,2) DEFAULT NULL,
  `sgpa7` decimal(3,2) DEFAULT NULL,
  `sgpa8` decimal(3,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `dAction` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_student_registration_backup`
--

INSERT INTO `hostel_student_registration_backup` (`id`, `name`, `gender`, `degree`, `yearOfStudy`, `admissionNo`, `semester`, `branch`, `pAddress`, `gAddress`, `pincode`, `mobile`, `gMobile`, `prAddress`, `p1`, `p2`, `other`, `aIncome`, `obcOrOec`, `distance`, `sgpa1`, `sgpa2`, `sgpa3`, `sgpa4`, `sgpa5`, `sgpa6`, `sgpa7`, `sgpa8`, `rank`, `dAction`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'male', 'B.Tech', 1, '2023001', 1, 'CSE', '123 Main St, City', '456 Guardian St, City', '123456', '1234567890', '9876543210', '789 Present St, City', 1, 0, 0, '50000.00', 'obcOrOecYes', '50.75', '3.40', '3.60', '3.70', '3.80', '3.50', '3.60', '3.70', '3.80', 120, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(2, 'Jane Smith', 'female', 'M.Tech', 2, '2023002', 3, 'ECE', '456 Main St, City', '789 Guardian St, City', '654321', '9876543210', '1234567890', '654 Present St, City', 0, 1, 0, '60000.00', 'obcOrOecNo', '45.25', '3.00', '3.20', '3.50', '3.10', '3.20', '3.40', '3.30', '3.10', 150, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(3, 'Sam Johnson', 'male', 'MCA', 3, '2023003', 5, 'IT', '789 Main St, City', '123 Guardian St, City', '987654', '8765432109', '2345678901', '987 Present St, City', 0, 0, 1, '75000.00', 'obcOrOecYes', '30.50', '2.80', '3.00', '2.90', '3.10', '3.20', '3.00', '2.80', '3.10', 180, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(4, 'Eva Brown', 'female', 'B.Tech', 4, '2023004', 7, 'ME', '987 Main St, City', '234 Guardian St, City', '876543', '7654321098', '3456789012', '876 Present St, City', 0, 0, 1, '55000.00', 'obcOrOecNo', '22.00', '2.50', '2.30', '2.80', '2.70', '2.50', '2.40', '2.60', '2.70', 200, 'Two warnings issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(5, 'Mark Wilson', 'male', 'B.Tech', 1, '2023005', 2, 'CE', '234 Main St, City', '567 Guardian St, City', '765432', '6543210987', '4567890123', '765 Present St, City', 1, 0, 0, '60000.00', 'obcOrOecYes', '60.50', '3.50', '3.60', '3.80', '3.70', '3.50', '3.40', '3.60', '3.70', 90, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(6, 'Lisa Davis', 'female', 'MCA', 2, '2023006', 4, 'IT', '345 Main St, City', '678 Guardian St, City', '234567', '5432109876', '5678901234', '654 Present St, City', 0, 1, 0, '70000.00', 'obcOrOecNo', '42.50', '3.20', '3.40', '3.60', '3.50', '3.30', '3.20', '3.50', '3.40', 130, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(7, 'Mike Taylor', 'male', 'B.Tech', 3, '2023007', 6, 'CSE', '567 Main St, City', '890 Guardian St, City', '345678', '4321098765', '6789012345', '876 Present St, City', 0, 0, 1, '50000.00', 'obcOrOecYes', '35.00', '2.90', '3.00', '2.80', '3.10', '3.20', '2.90', '3.00', '3.20', 160, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(8, 'Sara Miller', 'female', 'M.Tech', 4, '2023008', 8, 'ECE', '678 Main St, City', '901 Guardian St, City', '456789', '3210987654', '7890123456', '987 Present St, City', 0, 0, 1, '80000.00', 'obcOrOecNo', '28.50', '2.80', '2.90', '3.00', '2.90', '2.70', '2.80', '2.90', '2.70', 175, 'Two warnings issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(9, 'Tom White', 'male', 'B.Tech', 1, '2023009', 1, 'ME', '789 Main St, City', '012 Guardian St, City', '567890', '2109876543', '8901234567', '123 Present St, City', 1, 0, 0, '55000.00', 'obcOrOecYes', '55.00', '3.60', '3.70', '3.50', '3.80', '3.60', '3.50', '3.70', '3.80', 110, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(10, 'Emily Clark', 'female', 'MCA', 2, '2023010', 3, 'IT', '890 Main St, City', '123 Guardian St, City', '678901', '0987654321', '2345678901', '345 Present St, City', 0, 1, 0, '65000.00', 'obcOrOecNo', '48.00', '3.00', '3.10', '3.20', '3.40', '3.50', '3.20', '3.10', '3.30', 140, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(11, 'Andrew Adams', 'male', 'B.Tech', 3, '2023011', 5, 'CSE', '012 Main St, City', '345 Guardian St, City', '789012', '9876543210', '4567890123', '567 Present St, City', 0, 0, 1, '75000.00', 'obcOrOecYes', '32.50', '3.20', '3.30', '3.00', '3.10', '3.20', '3.40', '3.30', '3.10', 155, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(12, 'Olivia Hall', 'female', 'M.Tech', 4, '2023012', 7, 'ECE', '345 Main St, City', '678 Guardian St, City', '901234', '8765432109', '5678901234', '678 Present St, City', 0, 0, 1, '70000.00', 'obcOrOecNo', '26.50', '2.70', '2.80', '2.90', '3.00', '2.80', '2.70', '2.90', '2.70', 190, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(13, 'James Lee', 'male', 'B.Tech', 1, '2023013', 2, 'ME', '678 Main St, City', '901 Guardian St, City', '123456', '5432109876', '7890123456', '890 Present St, City', 1, 0, 0, '60000.00', 'obcOrOecYes', '58.50', '3.50', '3.60', '3.70', '3.80', '3.60', '3.40', '3.50', '3.70', 95, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(14, 'Sophie Turner', 'female', 'MCA', 2, '2023014', 4, 'IT', '234 Main St, City', '567 Guardian St, City', '234567', '0987654321', '3456789012', '012 Present St, City', 0, 1, 0, '55000.00', 'obcOrOecNo', '39.00', '2.90', '3.00', '2.80', '3.10', '3.20', '2.90', '3.00', '3.20', 170, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(15, 'Daniel Brown', 'male', 'B.Tech', 3, '2023015', 6, 'CSE', '789 Main St, City', '012 Guardian St, City', '345678', '8765432109', '5678901234', '234 Present St, City', 0, 0, 1, '65000.00', 'obcOrOecYes', '45.00', '3.20', '3.30', '3.00', '3.10', '3.20', '3.40', '3.30', '3.10', 150, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(16, 'Emma Smith', 'female', 'M.Tech', 4, '2023016', 8, 'ECE', '012 Main St, City', '345 Guardian St, City', '901234', '0987654321', '2345678901', '345 Present St, City', 0, 0, 1, '75000.00', 'obcOrOecNo', '32.50', '2.80', '2.90', '3.00', '2.90', '2.70', '2.80', '2.90', '2.70', 185, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(17, 'William Johnson', 'male', 'B.Tech', 1, '2023017', 1, 'ME', '345 Main St, City', '678 Guardian St, City', '123456', '5432109876', '7890123456', '456 Present St, City', 1, 0, 0, '70000.00', 'obcOrOecYes', '55.50', '3.60', '3.70', '3.50', '3.80', '3.60', '3.50', '3.70', '3.80', 100, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(18, 'Ava Davis', 'female', 'MCA', 2, '2023018', 3, 'IT', '678 Main St, City', '901 Guardian St, City', '234567', '0987654321', '3456789012', '567 Present St, City', 0, 1, 0, '60000.00', 'obcOrOecNo', '48.00', '3.00', '3.10', '3.20', '3.40', '3.50', '3.20', '3.10', '3.30', 140, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(19, 'Christopher Martin', 'male', 'B.Tech', 3, '2023019', 5, 'CSE', '901 Main St, City', '234 Guardian St, City', '345678', '8765432109', '5678901234', '678 Present St, City', 0, 0, 1, '80000.00', 'obcOrOecYes', '30.50', '3.20', '3.30', '3.00', '3.10', '3.20', '3.40', '3.30', '3.10', 160, 'No disciplinary action', '2023-11-13 16:06:57', '2023-11-13 16:06:57'),
(20, 'Mia Miller', 'female', 'M.Tech', 4, '2023020', 8, 'ECE', '345 Main St, City', '678 Guardian St, City', '901234', '0987654321', '2345678901', '789 Present St, City', 0, 0, 1, '75000.00', 'obcOrOecNo', '26.50', '2.70', '2.80', '2.90', '3.00', '2.80', '2.70', '2.90', '2.70', 190, 'One warning issued', '2023-11-13 16:06:57', '2023-11-13 16:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_type`) VALUES
('111', '111', 'student'),
('111111', '111111', 'student'),
('123', '123', 'student'),
('2023001', '2023001', 'student'),
('2023002', '2023002', 'student'),
('2023003', '2023003', 'student'),
('2023004', '2023004', 'student'),
('2023005', '2023005', 'student'),
('2023006', '2023006', 'student'),
('2023007', '2023007', 'student'),
('2023009', '2023009', 'student'),
('2023010', '2023010', 'student'),
('2023012', '2023012', 'student'),
('2023013', '2023013', 'student'),
('2023014', '2023014', 'student'),
('2023015', '2023015', 'student'),
('2023016', '2023016', 'student'),
('2023017', '2023017', 'student'),
('2023018', '2023018', 'student'),
('2023020', '2023020', 'student'),
('hs', 'hs', 'hs'),
('matron', 'matron', 'matron'),
('ms', 'ms', 'ms'),
('Saheba Biju', 'Saheba Biju', 'staff'),
('warden', 'warden', 'warden');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `agenda` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `title`, `agenda`, `date`, `time`, `location`) VALUES
(6, '12312', '1231', '2023-11-05', '09:02:00', 'Kerala ');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `p_y1` int(11) NOT NULL,
  `p_y2` int(11) NOT NULL,
  `p_y3` int(11) NOT NULL,
  `p_y4` int(11) NOT NULL,
  `pg` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `t_y1` int(11) NOT NULL,
  `t_y2` int(11) NOT NULL,
  `t_y3` int(11) NOT NULL,
  `t_y4` int(11) NOT NULL,
  `t_pg` int(11) NOT NULL,
  `id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`p_y1`, `p_y2`, `p_y3`, `p_y4`, `pg`, `total`, `t_y1`, `t_y2`, `t_y3`, `t_y4`, `t_pg`, `id`) VALUES
(10, 10, 10, 10, 0, 200, 100, 25, 25, 25, 25, 1),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(20) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `capacity`) VALUES
(1, 'Room 1', 4),
(2, 'Room 2', 4),
(3, 'Room 3', 4),
(4, 'Room 4', 4),
(5, 'Room 5', 4),
(6, 'Room 6', 4),
(7, 'Room 7', 4),
(8, 'Room 8', 4),
(9, 'Room 9', 4),
(10, 'Room 10', 4),
(11, 'Room 11', 4),
(12, 'Room 12', 4),
(13, 'Room 13', 4),
(14, 'Room 14', 4),
(15, 'Room 15', 4),
(16, 'Room 16', 4),
(17, 'Room 17', 4),
(18, 'Room 18', 4),
(19, 'Room 19', 4),
(20, 'Room 20', 4),
(21, 'Room 21', 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `address` varchar(111) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(111) NOT NULL,
  `dob` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `address`, `phone`, `email`, `dob`) VALUES
(1, 'Saheba Biju', 'Pullozhathil House Pampady PO Pampady, Kottayam,Kerala', 2147483647, 'shebin2244@gmail.com', '2023-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total_value` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `date_added` date NOT NULL,
  `notes` text DEFAULT NULL,
  `bill_image` varchar(255) DEFAULT NULL,
  `matron` int(11) NOT NULL,
  `hs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`product_id`, `product_name`, `quantity`, `unit_price`, `date_added`, `notes`, `bill_image`, `matron`, `hs`) VALUES
(1, 'rice', 11, '111.00', '2023-12-02', '11', 'C:xampphtdocsHostel_Management_SystemphpdashboardmsDashboard/uploads/111_Bill Image_Screenshot (195).png', 1, 1),
(3, 'rice', 12123, '99999999.99', '2023-12-02', '222', 'C:xampphtdocsHostel_Management_SystemphpdashboardmsDashboard/uploads/111_Bill Image_Screenshot (195).png', 1, 1),
(4, 'rice', 11, '1100.00', '2023-11-30', 'h', 'C:xampphtdocsHostel_Management_SystemphpdashboardmsDashboard/uploads/111_Bill Image_Screenshot (161).png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_setting`
--

CREATE TABLE `time_setting` (
  `m_start` int(11) NOT NULL,
  `m_end` int(11) NOT NULL,
  `n_start` int(11) NOT NULL,
  `n_end` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_setting`
--

INSERT INTO `time_setting` (`m_start`, `m_end`, `n_start`, `n_end`, `id`) VALUES
(8, 11, 21, 21, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`allocation_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_box`
--
ALTER TABLE `complaint_box`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine_generation`
--
ALTER TABLE `fine_generation`
  ADD PRIMARY KEY (`fine_id`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `hostel_report`
--
ALTER TABLE `hostel_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_student_list`
--
ALTER TABLE `hostel_student_list`
  ADD PRIMARY KEY (`admissionNo`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `hostel_student_registration`
--
ALTER TABLE `hostel_student_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocations`
--
ALTER TABLE `allocations`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `complaint_box`
--
ALTER TABLE `complaint_box`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fine_generation`
--
ALTER TABLE `fine_generation`
  MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostel_report`
--
ALTER TABLE `hostel_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_student_list`
--
ALTER TABLE `hostel_student_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `hostel_student_registration`
--
ALTER TABLE `hostel_student_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
