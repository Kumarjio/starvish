-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2018 at 04:39 PM
-- Server version: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starvish`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_dc`
--

CREATE TABLE `customer_dc` (
  `date` date NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `dc_no` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_dc_products`
--

CREATE TABLE `customer_dc_products` (
  `dc_no` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` int(3) NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_followup_master`
--

CREATE TABLE `customer_followup_master` (
  `customer_id` varchar(15) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quote_date` date NOT NULL,
  `quote_no` varchar(15) NOT NULL,
  `po_status` enum('received','pending') NOT NULL,
  `po_date` date NOT NULL,
  `po_no` varchar(15) NOT NULL,
  `work_status` varchar(30) NOT NULL,
  `work_date` date NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `amount` int(5) NOT NULL,
  `payment_status` enum('pending','paid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice`
--

CREATE TABLE `customer_invoice` (
  `date` date NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `invoice_id` varchar(15) NOT NULL,
  `po_id` varchar(15) NOT NULL,
  `srn/dc` varchar(15) NOT NULL,
  `paymentt_mode` enum('cash','card','online') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice_products`
--

CREATE TABLE `customer_invoice_products` (
  `invoice_id` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hsn/sac` varchar(15) NOT NULL,
  `quantity` int(4) NOT NULL,
  `unit_charges` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `cgst_percent` int(3) NOT NULL,
  `cgst_amt` int(5) NOT NULL,
  `sgst_percent` int(3) NOT NULL,
  `sgst_amt` int(5) NOT NULL,
  `igst_percent` int(3) NOT NULL,
  `igst_amt` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `customer_id` varchar(20) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `address1` varchar(30) NOT NULL,
  `address2` varchar(30) NOT NULL,
  `contact_persion1` varchar(30) NOT NULL,
  `designation1` varchar(20) NOT NULL,
  `email1` varchar(30) NOT NULL,
  `contact_number1` int(13) NOT NULL,
  `contact_person2` varchar(30) NOT NULL,
  `designation2` varchar(20) NOT NULL,
  `contact_no2` int(13) NOT NULL,
  `gstin` varchar(20) NOT NULL,
  `bank_name` varchar(25) NOT NULL,
  `account_name` varchar(30) NOT NULL,
  `account_number` int(30) NOT NULL,
  `ifsc_code` varchar(30) NOT NULL,
  `attachment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_po`
--

CREATE TABLE `customer_po` (
  `date` date NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `po_id` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `file_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_quote`
--

CREATE TABLE `customer_quote` (
  `date` date NOT NULL,
  `quote_id` varchar(15) NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_quote_products`
--

CREATE TABLE `customer_quote_products` (
  `quote_id` varchar(15) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hsn/sac` varchar(15) NOT NULL,
  `quantity` int(3) NOT NULL,
  `unit_charges` int(20) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daily_attendence`
--

CREATE TABLE `daily_attendence` (
  `date` date NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daily_expenses`
--

CREATE TABLE `daily_expenses` (
  `date` date NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `amount` int(10) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daily_jobs`
--

CREATE TABLE `daily_jobs` (
  `date` date NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `machine` int(5) NOT NULL,
  `job_title` int(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `no_of_machines_used` int(5) NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE `employee_master` (
  `id` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact_no` int(13) NOT NULL,
  `doj` date NOT NULL,
  `pan_no` varchar(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `account_number` int(30) NOT NULL,
  `ifsc_code` varchar(20) NOT NULL,
  `aadhaar_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_master`
--

INSERT INTO `employee_master` (`id`, `name`, `address1`, `address2`, `designation`, `email`, `contact_no`, `doj`, `pan_no`, `bank_name`, `account_number`, `ifsc_code`, `aadhaar_no`) VALUES
('svemp1', 'Employee1', '108 sourashtra teachers colony', 'madurai', 'manager', 'employee1@example.co', 2147483647, '2018-03-03', '9991212', 'HDFC', 2147483647, 'asd12', '1212323231'),
('svemp2', 'Employee2', '108 sourashtra teachers colony', 'madurai', 'Employee', 'employee2@example.co', 2147483647, '2018-03-14', 'sdsdf', 'Axis Bank', 2147483647, 'asd12', '1212323231');

-- --------------------------------------------------------

--
-- Table structure for table `employee_pay`
--

CREATE TABLE `employee_pay` (
  `date` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `employee_name` varchar(40) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `lop` int(10) NOT NULL,
  `basic` int(10) NOT NULL,
  `hra` int(10) NOT NULL,
  `special_allowance` int(10) NOT NULL,
  `advances` int(10) NOT NULL COMMENT 'deductions'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mileage_imbursement`
--

CREATE TABLE `mileage_imbursement` (
  `date` int(11) NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `start_km` int(10) NOT NULL,
  `end_km` int(10) NOT NULL,
  `total_km` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_acceptance`
--

CREATE TABLE `order_acceptance` (
  `date` date NOT NULL,
  `oa_id` varchar(15) NOT NULL,
  `po_date` date NOT NULL,
  `po_id` varchar(15) NOT NULL,
  `description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_acceptance_products`
--

CREATE TABLE `order_acceptance_products` (
  `oa_id` varchar(15) NOT NULL,
  `description` longtext NOT NULL,
  `hsn_code` int(15) NOT NULL,
  `quantity` int(5) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `total_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_report`
--

CREATE TABLE `service_report` (
  `report_no` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `charge` int(11) NOT NULL,
  `gst_percent` int(11) NOT NULL,
  `gst_amt` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `mc_type` longtext NOT NULL,
  `mc_name` longtext NOT NULL,
  `mc_serial` int(15) NOT NULL,
  `controller_name` varchar(100) NOT NULL,
  `chargeable` enum('YES','NO') NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `travel_time` time NOT NULL,
  `complaint` longtext NOT NULL,
  `service_details` longtext NOT NULL,
  `customer_remark` longtext NOT NULL,
  `engineer_remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sv_table`
--

CREATE TABLE `sv_table` (
  `company_name` varchar(50) NOT NULL,
  `owner_1` varchar(50) NOT NULL,
  `owner_2` varchar(50) DEFAULT NULL,
  `address1` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` int(13) NOT NULL,
  `gstn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 11:52:35'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 14:08:44'),
(3, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 14:11:20'),
(4, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 17:21:17'),
(5, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 17:22:10'),
(6, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 18:09:04'),
(7, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 19:27:57'),
(8, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 21:25:48'),
(9, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 21:26:09'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 21:26:48'),
(11, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 23:15:08'),
(12, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 23:15:24'),
(13, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 23:36:15'),
(14, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-12 18:15:36'),
(15, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-13 07:20:59'),
(16, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-13 10:42:51'),
(17, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-13 15:48:27'),
(18, 18, '{\"emp_id\":\"svemp1\",\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Employee1\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-13 18:45:03'),
(19, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-13 18:45:53'),
(20, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-14 07:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `employee_id`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$j9HPTqIJOp0/9TbRA5T8A.oIF6SxeC5b4xsXPBCOKX8iLwomItcya', 'System Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2018-01-05 05:56:34'),
(18, 'svemp1', 'employee1@example.com', '$2y$10$s6hWVkMJ1wEMQSWkHPIlnuUa5LAEt87.trEpqZiXbbPSmvst7sEei', 'Employee1', '9994021735', 2, 0, 1, '2018-03-13 15:17:23', 1, '2018-03-13 18:43:25'),
(19, 'svemp2', 'employee2@example.com', '$2y$10$OG..KYKPgC4R3EUyPPZ.cefFOdmxh1Z/Sc/uacX8L81nKzFZKCax6', 'Employee2', '7373535614', 3, 0, 1, '2018-03-13 15:18:54', 1, '2018-03-13 18:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_dc`
--

CREATE TABLE `vendor_dc` (
  `date` date NOT NULL,
  `vendor_id` varchar(15) NOT NULL,
  `dc_no` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `file_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_followup_master`
--

CREATE TABLE `vendor_followup_master` (
  `date` date NOT NULL,
  `vendor_id` varchar(15) NOT NULL,
  `company_name` varchar(40) NOT NULL,
  `quote_id` varchar(15) NOT NULL,
  `quote_date` date NOT NULL,
  `purchase_order` enum('SENT','NOTSENT') NOT NULL,
  `po_id` varchar(15) NOT NULL,
  `po_date` date NOT NULL,
  `invoice` enum('RECEIVED','NOTRECEIVED') NOT NULL,
  `invoice_id` varchar(15) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_status` enum('PAID','NOTPAID') NOT NULL,
  `delivery_status` enum('DELIVERED','NOTDELIVERED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_invoice`
--

CREATE TABLE `vendor_invoice` (
  `date` date NOT NULL,
  `vendor_id` varchar(15) NOT NULL,
  `vendor_name` varchar(40) NOT NULL,
  `invoice_id` varchar(15) NOT NULL,
  `total` int(10) NOT NULL,
  `cgst` int(10) NOT NULL,
  `sgst` int(10) NOT NULL,
  `igst` int(10) NOT NULL,
  `grant_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_master`
--

CREATE TABLE `vendor_master` (
  `vendor_id` varchar(20) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `address1` varchar(30) NOT NULL,
  `address2` varchar(30) NOT NULL,
  `contact_person1` varchar(30) NOT NULL,
  `designation1` varchar(20) NOT NULL,
  `email1` varchar(30) NOT NULL,
  `contact_no1` varchar(13) NOT NULL,
  `contact_person2` varchar(30) NOT NULL,
  `designation2` varchar(20) NOT NULL,
  `email2` varchar(30) NOT NULL,
  `contact_no2` varchar(13) NOT NULL,
  `gstin` varchar(20) NOT NULL,
  `bank_name` varchar(25) NOT NULL,
  `account_name` varchar(30) NOT NULL,
  `account_number` int(30) NOT NULL,
  `ifsc_code` varchar(30) NOT NULL,
  `attachment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_master`
--

INSERT INTO `vendor_master` (`vendor_id`, `company_name`, `address1`, `address2`, `contact_person1`, `designation1`, `email1`, `contact_no1`, `contact_person2`, `designation2`, `email2`, `contact_no2`, `gstin`, `bank_name`, `account_name`, `account_number`, `ifsc_code`, `attachment`) VALUES
('dummy', 'V2lancers', '108 sourashtra teachers colony', 'jhvg', 'ghhhg', 'kjhgjh', 'developer@igniteddreamz.com', '23342', 'S', 'jkhg', 'developer@igniteddreamz.com', '456789', 'jh', 'jhgjhgh', 'jgh', 567890, 'jh', 'cv'),
('ven2', 'V2lancers', '108 sourashtra teachers colony', 'madurai', 'yogesh', 'ceo', 'developer@igniteddreamz.com', '123456789', 'gokul', 'manager', 'developer@igniteddreamz.com', '23456789', '23456789', 'canarabank', '23456789', 234567890, '4567890-', '45678');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_po`
--

CREATE TABLE `vendor_po` (
  `date` date NOT NULL,
  `po_id` varchar(15) NOT NULL,
  `vendor_id` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_products`
--

CREATE TABLE `vendor_products` (
  `po_id` varchar(15) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hsn/sac` varchar(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `unit_charges` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_quote`
--

CREATE TABLE `vendor_quote` (
  `date` date NOT NULL,
  `vendor_quote_id` varchar(13) NOT NULL,
  `vendor_id` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `file_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_dc`
--
ALTER TABLE `customer_dc`
  ADD PRIMARY KEY (`dc_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_dc_products`
--
ALTER TABLE `customer_dc_products`
  ADD KEY `dc_no` (`dc_no`);

--
-- Indexes for table `customer_followup_master`
--
ALTER TABLE `customer_followup_master`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `quote_no` (`quote_no`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `po_id` (`po_id`),
  ADD KEY `srn/dc` (`srn/dc`);

--
-- Indexes for table `customer_invoice_products`
--
ALTER TABLE `customer_invoice_products`
  ADD KEY `invoice_no` (`invoice_id`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_po`
--
ALTER TABLE `customer_po`
  ADD PRIMARY KEY (`po_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_quote`
--
ALTER TABLE `customer_quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `customer_quote_products`
--
ALTER TABLE `customer_quote_products`
  ADD KEY `quote_id` (`quote_id`);

--
-- Indexes for table `daily_attendence`
--
ALTER TABLE `daily_attendence`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `daily_expenses`
--
ALTER TABLE `daily_expenses`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `daily_jobs`
--
ALTER TABLE `daily_jobs`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_pay`
--
ALTER TABLE `employee_pay`
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `mileage_imbursement`
--
ALTER TABLE `mileage_imbursement`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `order_acceptance`
--
ALTER TABLE `order_acceptance`
  ADD PRIMARY KEY (`oa_id`),
  ADD KEY `po_id` (`po_id`);

--
-- Indexes for table `order_acceptance_products`
--
ALTER TABLE `order_acceptance_products`
  ADD KEY `oa_id` (`oa_id`);

--
-- Indexes for table `service_report`
--
ALTER TABLE `service_report`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `vendor_dc`
--
ALTER TABLE `vendor_dc`
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor_followup_master`
--
ALTER TABLE `vendor_followup_master`
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `po_id` (`po_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `quote_id` (`quote_id`);

--
-- Indexes for table `vendor_invoice`
--
ALTER TABLE `vendor_invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor_master`
--
ALTER TABLE `vendor_master`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_po`
--
ALTER TABLE `vendor_po`
  ADD PRIMARY KEY (`po_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor_products`
--
ALTER TABLE `vendor_products`
  ADD KEY `quote_id` (`po_id`);

--
-- Indexes for table `vendor_quote`
--
ALTER TABLE `vendor_quote`
  ADD PRIMARY KEY (`vendor_quote_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_dc`
--
ALTER TABLE `customer_dc`
  ADD CONSTRAINT `customer_dc_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_master` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_dc_products`
--
ALTER TABLE `customer_dc_products`
  ADD CONSTRAINT `customer_dc_products_ibfk_1` FOREIGN KEY (`dc_no`) REFERENCES `customer_dc` (`dc_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_followup_master`
--
ALTER TABLE `customer_followup_master`
  ADD CONSTRAINT `customer_followup_master_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_master` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_followup_master_ibfk_2` FOREIGN KEY (`quote_no`) REFERENCES `customer_quote` (`quote_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_followup_master_ibfk_3` FOREIGN KEY (`invoice_no`) REFERENCES `customer_invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  ADD CONSTRAINT `customer_invoice_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_master` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_invoice_ibfk_2` FOREIGN KEY (`po_id`) REFERENCES `customer_po` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_invoice_ibfk_3` FOREIGN KEY (`srn/dc`) REFERENCES `customer_dc` (`dc_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_invoice_products`
--
ALTER TABLE `customer_invoice_products`
  ADD CONSTRAINT `customer_invoice_products_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `customer_invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_po`
--
ALTER TABLE `customer_po`
  ADD CONSTRAINT `customer_po_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_master` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_quote`
--
ALTER TABLE `customer_quote`
  ADD CONSTRAINT `customer_quote_ref` FOREIGN KEY (`quote_id`) REFERENCES `customer_master` (`customer_id`);

--
-- Constraints for table `customer_quote_products`
--
ALTER TABLE `customer_quote_products`
  ADD CONSTRAINT `customer_quote_products_ibfk_1` FOREIGN KEY (`quote_id`) REFERENCES `customer_quote` (`quote_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daily_attendence`
--
ALTER TABLE `daily_attendence`
  ADD CONSTRAINT `daily_attendence_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daily_expenses`
--
ALTER TABLE `daily_expenses`
  ADD CONSTRAINT `daily_expenses_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daily_jobs`
--
ALTER TABLE `daily_jobs`
  ADD CONSTRAINT `daily_jobs_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_pay`
--
ALTER TABLE `employee_pay`
  ADD CONSTRAINT `employee_pay_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mileage_imbursement`
--
ALTER TABLE `mileage_imbursement`
  ADD CONSTRAINT `mileage_imbursement_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_acceptance`
--
ALTER TABLE `order_acceptance`
  ADD CONSTRAINT `order_acceptance_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `customer_po` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_acceptance_products`
--
ALTER TABLE `order_acceptance_products`
  ADD CONSTRAINT `order_acceptance_products_ibfk_1` FOREIGN KEY (`oa_id`) REFERENCES `order_acceptance` (`oa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_report`
--
ALTER TABLE `service_report`
  ADD CONSTRAINT `service_report_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_master` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_dc`
--
ALTER TABLE `vendor_dc`
  ADD CONSTRAINT `vendor_dc_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_master` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_followup_master`
--
ALTER TABLE `vendor_followup_master`
  ADD CONSTRAINT `vendor_followup_master_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_master` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendor_followup_master_ibfk_2` FOREIGN KEY (`po_id`) REFERENCES `vendor_po` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendor_followup_master_ibfk_3` FOREIGN KEY (`invoice_id`) REFERENCES `vendor_invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendor_followup_master_ibfk_4` FOREIGN KEY (`quote_id`) REFERENCES `vendor_quote` (`vendor_quote_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_invoice`
--
ALTER TABLE `vendor_invoice`
  ADD CONSTRAINT `vendor_invoice_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_master` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_po`
--
ALTER TABLE `vendor_po`
  ADD CONSTRAINT `vendor_po_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_master` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_products`
--
ALTER TABLE `vendor_products`
  ADD CONSTRAINT `vendor_products_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `vendor_po` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_quote`
--
ALTER TABLE `vendor_quote`
  ADD CONSTRAINT `vendor_quote_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_master` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
