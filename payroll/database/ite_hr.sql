-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 04:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ite_hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `EMP_ID` int(20) NOT NULL,
  `SITE_ID` varchar(500) NOT NULL,
  `EMP_NAME` varchar(500) NOT NULL,
  `AADHAR` varchar(15) NOT NULL,
  `PAN` varchar(10) NOT NULL,
  `EMP_ADDRESS` text NOT NULL,
  `EMP_MOBILE` varchar(13) NOT NULL,
  `UAN_NO` varchar(20) NOT NULL,
  `ESIC_NO` varchar(20) NOT NULL,
  `BANK_AC_NO` varchar(20) NOT NULL,
  `IFSC_CODE` varchar(25) NOT NULL,
  `BNK_NAME` varchar(500) NOT NULL,
  `BNK_ADDRESS` varchar(500) NOT NULL,
  `DESIGNATION` varchar(50) NOT NULL,
  `CATEGORY` varchar(50) NOT NULL,
  `BASIC_SAL` float NOT NULL,
  `HRA_SAL` float NOT NULL,
  `ALLOW` float NOT NULL,
  `STATUS` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`EMP_ID`, `SITE_ID`, `EMP_NAME`, `AADHAR`, `PAN`, `EMP_ADDRESS`, `EMP_MOBILE`, `UAN_NO`, `ESIC_NO`, `BANK_AC_NO`, `IFSC_CODE`, `BNK_NAME`, `BNK_ADDRESS`, `DESIGNATION`, `CATEGORY`, `BASIC_SAL`, `HRA_SAL`, `ALLOW`, `STATUS`) VALUES
(123, 'TESTSITE', 'Test Test Emp', '123112', 'ABCD1234C', '12 Indrapuri, Near Garuda Book Center, Hyderabad', '123467890', '987889513', '970680787', '1241231', '21424123', 'State Bank of India', 'SBI Branch,12 Indrapuri, Near Garuda Book Center, Hyderabad', 'Manager', 'B', 12500, 20000, 300, 'Active'),
(124, 'TESTSITE1', 'Test 2 Empl', '298551867', 'ABCD1234D', '13 Indrapuri, Near Garuda Book Center, Hyderabad', '123467891', '987889514', '970680788', '2241231', '31424123', 'HDFC Bank', 'HDFC Branch,13 Chandrapuri, Near Garuda Book Center, Hyderabad', 'Worker', 'B', 15500, 30000, 400, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `EMP_ID` int(11) NOT NULL,
  `MONTH` date NOT NULL,
  `SITE_ID` varchar(50) NOT NULL,
  `WORKING_DAYS` int(11) NOT NULL,
  `WEEKLY_OFF` int(11) NOT NULL,
  `C_OFF_AVAILABLE` int(11) NOT NULL,
  `C_OFF_AVAILED` int(11) NOT NULL,
  `C_OFF_BAL` int(11) NOT NULL,
  `E_LEAVE_AVAILABLE` int(11) NOT NULL,
  `E_LEAVE_AVAILED` int(11) NOT NULL,
  `E_LEAVE_BAL` int(11) NOT NULL,
  `LEAVE_WITHOUT_PAY` int(11) NOT NULL DEFAULT 0,
  `PAID_HOLIDAYS` int(11) NOT NULL,
  `ADV` int(11) NOT NULL,
  `OVER_TIME` int(11) NOT NULL,
  `SPL_ALLOW` float NOT NULL,
  `PAY_DAYS` int(11) NOT NULL,
  `OTHER_DEDUCTION` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`EMP_ID`, `MONTH`, `SITE_ID`, `WORKING_DAYS`, `WEEKLY_OFF`, `C_OFF_AVAILABLE`, `C_OFF_AVAILED`, `C_OFF_BAL`, `E_LEAVE_AVAILABLE`, `E_LEAVE_AVAILED`, `E_LEAVE_BAL`, `LEAVE_WITHOUT_PAY`, `PAID_HOLIDAYS`, `ADV`, `OVER_TIME`, `SPL_ALLOW`, `PAY_DAYS`, `OTHER_DEDUCTION`) VALUES
(123, '2021-09-01', 'TESTSITE', 26, 4, 12, 1, 11, 6, 1, 5, 1, 0, 0, 0, 0, 23, 0),
(123, '2021-10-01', 'TESTSITE', 23, 4, 11, 5, 6, 6, 1, 5, 2, 0, 0, 0, 0, 27, 0),
(124, '2021-09-01', 'TESTSITE1', 0, 0, 15, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, '2021-10-01', 'TESTSITE1', 26, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 26, 0);

--
-- Triggers `leaves`
--
DELIMITER $$
CREATE TRIGGER `salary_on_insert_leave` AFTER INSERT ON `leaves` FOR EACH ROW INSERT INTO salary(salary.EMP_ID,salary.SITE_ID,salary.MONTH,salary.BASIC_SAL,salary.HRA_SAL,salary.PDA,salary.GROSS_SAL) VALUES(NEW.EMP_ID,NEW.SITE_ID,NEW.MONTH,(SELECT BASIC_SAL FROM emp_details WHERE EMP_ID=NEW.EMP_ID AND SITE_ID=NEW.SITE_ID),(SELECT HRA_SAL FROM emp_details WHERE EMP_ID=NEW.EMP_ID AND SITE_ID=NEW.SITE_ID),(SELECT ALLOW FROM emp_details WHERE EMP_ID=NEW.EMP_ID AND SITE_ID=NEW.SITE_ID),(SELECT BASIC_SAL+HRA_SAL+ALLOW FROM emp_details WHERE EMP_ID=NEW.EMP_ID AND SITE_ID=NEW.SITE_ID))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `EMP_ID` int(11) NOT NULL,
  `SITE_ID` varchar(50) NOT NULL,
  `MONTH` date NOT NULL,
  `GROSS_SAL` float NOT NULL,
  `PAY_DAYS` int(11) NOT NULL,
  `NET_SAL` float NOT NULL,
  `BASIC_SAL` float NOT NULL,
  `HRA_SAL` float NOT NULL,
  `PDA` float NOT NULL,
  `PH_PAY` float NOT NULL,
  `SPL_ALLOW` float NOT NULL,
  `LEAVE_PAY` float NOT NULL,
  `PF` float NOT NULL,
  `ESIC` float NOT NULL,
  `PT` float NOT NULL,
  `LWF` int(11) NOT NULL DEFAULT 0,
  `ADV` float NOT NULL,
  `OTHER_DEDUCTION` float NOT NULL,
  `OVER_TIME_PAY` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`EMP_ID`, `SITE_ID`, `MONTH`, `GROSS_SAL`, `PAY_DAYS`, `NET_SAL`, `BASIC_SAL`, `HRA_SAL`, `PDA`, `PH_PAY`, `SPL_ALLOW`, `LEAVE_PAY`, `PF`, `ESIC`, `PT`, `LWF`, `ADV`, `OTHER_DEDUCTION`, `OVER_TIME_PAY`) VALUES
(123, 'TESTSITE', '2021-09-01', 32800, 0, 0, 12500, 20000, 0, 0, 300, 0, 0, 0, 0, 0, 0, 0, 0),
(123, 'TESTSITE', '2021-10-01', 32800, 27, 26222.7, 10903.7, 17037, 255.556, 0, 0, 7288.89, 1308.44, 209.556, 200, 0, 0, 0, 0),
(124, 'TESTSITE1', '2021-09-01', 45900, 0, 0, 15500, 30000, 0, 0, 400, 0, 0, 0, 0, 0, 0, 0, 0),
(124, 'TESTSITE1', '2021-10-01', 45900, 3, 21, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17);

-- --------------------------------------------------------

--
-- Table structure for table `sal_profile`
--

CREATE TABLE `sal_profile` (
  `DESIGNATION` varchar(50) NOT NULL,
  `BASIC` int(11) NOT NULL,
  `SPL_PAY` int(11) NOT NULL,
  `HRA` int(11) NOT NULL,
  `CTC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sal_profile`
--

INSERT INTO `sal_profile` (`DESIGNATION`, `BASIC`, `SPL_PAY`, `HRA`, `CTC`) VALUES
('MR', 12, 13, 14, 15),
('rqwrq', 4, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `SITE_ID` varchar(50) NOT NULL,
  `SITE_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`SITE_ID`, `SITE_NAME`) VALUES
('a1', 'qwe'),
('Ata add', 'ada'),
('ha', 'ha'),
('re', 'er'),
('TESTSITE', 'This is Test Site 1'),
('TESTSITE2', 'Iti');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_desig` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `user_desig`) VALUES
('test', 'chungi', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`EMP_ID`,`MONTH`) USING BTREE;

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`EMP_ID`,`MONTH`) USING BTREE;

--
-- Indexes for table `sal_profile`
--
ALTER TABLE `sal_profile`
  ADD PRIMARY KEY (`DESIGNATION`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`SITE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
