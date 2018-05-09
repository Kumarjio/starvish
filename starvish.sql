-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2018 at 09:51 PM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.15-0ubuntu0.17.10.1

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
  `srn_dc` varchar(15) NOT NULL,
  `payment_mode` enum('cash','card','online') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice_products`
--

CREATE TABLE `customer_invoice_products` (
  `invoice_id` varchar(15) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hsn_sac` varchar(15) NOT NULL,
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
  `contact_person1` varchar(30) NOT NULL,
  `designation1` varchar(20) NOT NULL,
  `email1` varchar(30) NOT NULL,
  `contact_no1` int(13) NOT NULL,
  `contact_person2` varchar(30) NOT NULL,
  `designation2` varchar(20) NOT NULL,
  `email2` varchar(30) NOT NULL,
  `contact_no2` int(13) NOT NULL,
  `gstin` varchar(20) NOT NULL,
  `bank_name` varchar(25) NOT NULL,
  `account_name` varchar(30) NOT NULL,
  `account_number` int(30) NOT NULL,
  `ifsc_code` varchar(30) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `file_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`customer_id`, `company_name`, `address1`, `address2`, `contact_person1`, `designation1`, `email1`, `contact_no1`, `contact_person2`, `designation2`, `email2`, `contact_no2`, `gstin`, `bank_name`, `account_name`, `account_number`, `ifsc_code`, `attachment`, `file_path`) VALUES
('cust1', 'V2lancers', '108 sourashtra teachers colony', 'madurai', 'yogesh', 'manager', 'developer@igniteddreamz.com', 23456789, 'arun', 'employee', 'developer@igniteddreamz.com', 23456789, '34567890', 'canara bank', '123456789', 23456789, '234567890', 'cust1-V2lancers.pdf', '/var/www/starvish/uploads/customer/cust1-V2lancers.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `customer_po`
--

CREATE TABLE `customer_po` (
  `date` date NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `total_amt` double NOT NULL,
  `po_id` varchar(15) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `no_of_files` int(5) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_po`
--

INSERT INTO `customer_po` (`date`, `customer_id`, `total_amt`, `po_id`, `description`, `no_of_files`, `created`) VALUES
('2018-05-19', 'cust1', 1234, '123', 'asddafsdfadf', 0, '2018-05-07 11:20:01'),
('2018-05-18', 'cust1', 12321, '1234', '233', 4, '2018-05-09 05:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_po_files`
--

CREATE TABLE `customer_po_files` (
  `po_id` varchar(15) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_po_files`
--

INSERT INTO `customer_po_files` (`po_id`, `file_name`, `file_path`, `created`) VALUES
('1234', 'cust1-1234-0.jpg', '/var/www/starvish/uploads/po/customer/cust1-1234-0.jpg', '2018-05-09 05:38:23'),
('1234', 'cust1-1234-1.jpg', '/var/www/starvish/uploads/po/customer/cust1-1234-1.jpg', '2018-05-09 05:38:23'),
('1234', 'cust1-1234-2.jpg', '/var/www/starvish/uploads/po/customer/cust1-1234-2.jpg', '2018-05-09 05:38:23'),
('1234', 'cust1-1234-3.jpg', '/var/www/starvish/uploads/po/customer/cust1-1234-3.jpg', '2018-05-09 05:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_quote`
--

CREATE TABLE `customer_quote` (
  `date` date NOT NULL,
  `quote_id` varchar(15) NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `description` varchar(20) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_quote`
--

INSERT INTO `customer_quote` (`date`, `quote_id`, `customer_id`, `description`, `note`) VALUES
('2018-03-25', 'quot1', 'cust1', 'dummy', 'Credit card only acceptable'),
('2018-04-17', 'SV-CQ-01-04-18', 'cust1', 'dummy', '5'),
('2018-04-17', 'SV-CQ-02-04-18', 'cust1', 'Description', 'credit card payment');

-- --------------------------------------------------------

--
-- Table structure for table `customer_quote_products`
--

CREATE TABLE `customer_quote_products` (
  `quote_id` varchar(15) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hsn_sac` varchar(15) NOT NULL,
  `quantity` int(3) NOT NULL,
  `unit_charges` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `tax` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_quote_products`
--

INSERT INTO `customer_quote_products` (`quote_id`, `product_id`, `description`, `hsn_sac`, `quantity`, `unit_charges`, `total`, `tax`) VALUES
('quot1', 'prod1', 'desc', '123', 1, 3, 3, 12),
('SV-CQ-01-04-18', '1', '12', '2', 11, 210, 3234, 21),
('SV-CQ-02-04-18', '1', 'product ', '1', 22, 230000, 12331, 20);

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
-- Table structure for table `note_master`
--

CREATE TABLE `note_master` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note_master`
--

INSERT INTO `note_master` (`id`, `description`) VALUES
(3, 'credit card payment'),
(5, 'sample note');

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

--
-- Dumping data for table `sv_table`
--

INSERT INTO `sv_table` (`company_name`, `owner_1`, `owner_2`, `address1`, `email`, `contact_no`, `gstn`) VALUES
('v7lancers', 'yogesh', 'abc', '3/4,Teppakulam,Annupanadi,Madurai-10', 'v7lancers@gmail.com', 2147483647, '33ASEPT0509K1ZR');

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
  `createdDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 19:52:35'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 22:08:44'),
(3, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-04 22:11:20'),
(4, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 01:21:17'),
(5, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 01:22:10'),
(6, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 02:09:04'),
(7, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 03:27:57'),
(8, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 05:25:48'),
(9, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Manager\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 05:26:09'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 05:26:48'),
(11, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 07:15:08'),
(12, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 07:15:24'),
(13, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 64.0.3282.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.119 Safari/537.36', 'Linux', '2018-03-05 07:36:15'),
(14, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-13 01:15:36'),
(15, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-13 14:20:59'),
(16, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-13 17:42:51'),
(17, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-13 22:48:27'),
(18, 18, '{\"emp_id\":\"svemp1\",\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Employee1\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-14 01:45:03'),
(19, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-14 01:45:53'),
(20, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-14 14:46:49'),
(21, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 'Linux', '2018-03-15 05:30:46'),
(22, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-15 14:40:37'),
(23, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-15 14:40:38'),
(24, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-15 22:47:52'),
(25, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-16 04:54:08'),
(26, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-16 14:14:01'),
(27, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-16 16:18:30'),
(28, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-16 23:48:42'),
(29, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-17 02:20:03'),
(30, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-17 02:51:42'),
(31, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-19 03:12:26'),
(32, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-19 23:02:20'),
(33, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-21 03:36:25'),
(34, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-21 13:55:40'),
(35, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-22 02:09:05'),
(36, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-22 16:42:33'),
(37, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-23 01:34:53'),
(38, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36', 'Linux', '2018-03-25 15:59:27'),
(39, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-11 17:50:31'),
(40, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-12 01:31:41'),
(41, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-12 01:31:42'),
(42, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-12 05:15:36'),
(43, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-12 15:47:05'),
(44, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-12 19:39:17'),
(45, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-13 01:01:44'),
(46, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '0000-00-00 00:00:00'),
(47, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '0000-00-00 00:00:00'),
(48, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '2018-04-13 03:35:09'),
(49, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '2018-04-13 03:35:22'),
(50, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '2018-04-13 16:54:24'),
(51, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '2018-04-13 16:54:25'),
(52, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '2018-04-13 16:54:25'),
(53, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '2018-04-14 17:07:32'),
(54, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '2018-04-15 18:21:01'),
(55, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '2018-04-16 02:44:06'),
(56, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 8.1', '2018-04-16 17:27:56'),
(57, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-17 03:11:15'),
(58, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-17 12:42:49'),
(59, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-04-17 12:43:59'),
(60, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-05-01 05:31:13'),
(61, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Linux', '2018-05-04 12:26:32'),
(62, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-05 04:06:37'),
(63, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-05 12:04:14'),
(64, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-06 02:14:40'),
(65, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-06 11:20:41'),
(66, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-06 17:38:01'),
(67, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-07 02:26:39'),
(68, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-07 05:04:17'),
(69, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-07 12:06:25'),
(70, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-07 16:27:11'),
(71, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-08 02:45:58'),
(72, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-08 05:34:13'),
(73, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-09 02:03:40'),
(74, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-09 10:37:46'),
(75, 1, '{\"emp_id\":\"admin\",\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 66.0.3359.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'Linux', '2018-05-09 10:37:46');

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
-- Table structure for table `vendor_invoice_files`
--

CREATE TABLE `vendor_invoice_files` (
  `invoice_id` varchar(15) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `attachment` varchar(50) NOT NULL,
  `file_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_master`
--

INSERT INTO `vendor_master` (`vendor_id`, `company_name`, `address1`, `address2`, `contact_person1`, `designation1`, `email1`, `contact_no1`, `contact_person2`, `designation2`, `email2`, `contact_no2`, `gstin`, `bank_name`, `account_name`, `account_number`, `ifsc_code`, `attachment`, `file_path`) VALUES
('ven1', 'v7lancerss', '108 sourashtra teachers colony', 'Madurai', 'yogesh', 'ceo', 'tsyogesh40@gmail.com', '07373535614', 'Arun', 'manager', 'tsyogesh46@gmail.com', '34567890', '213131421', 'hdfc', 'yogesh ', 2147483647, 'xfcghgjkl123', 'ven1-v7lancerss.pdf', '/var/www/starvish/uploads/vendor/ven1-v7lancerss.pdf');

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
-- Table structure for table `vendor_po_products`
--

CREATE TABLE `vendor_po_products` (
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
  `total_amt` decimal(10,0) NOT NULL,
  `no_of_files` int(10) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_quote`
--

INSERT INTO `vendor_quote` (`date`, `vendor_quote_id`, `vendor_id`, `description`, `total_amt`, `no_of_files`, `created`) VALUES
('2018-05-15', 'venq1', 'ven1', 'tey', '13330', 1, '2018-05-09 10:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_quote_files`
--

CREATE TABLE `vendor_quote_files` (
  `vendor_quote_id` varchar(50) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_quote_files`
--

INSERT INTO `vendor_quote_files` (`vendor_quote_id`, `file_name`, `file_path`, `created`) VALUES
('venq1', 'ven1-venq1-0.jpg', '/var/www/starvish/uploads/quotation/vendor/ven1-venq1-0.jpg', '2018-05-09 16:17:02');

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
  ADD KEY `srn/dc` (`srn_dc`);

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
-- Indexes for table `customer_po_files`
--
ALTER TABLE `customer_po_files`
  ADD KEY `customer_po_files_ibfk_1` (`po_id`);

--
-- Indexes for table `customer_quote`
--
ALTER TABLE `customer_quote`
  ADD PRIMARY KEY (`quote_id`),
  ADD KEY `customer_quote_ref` (`customer_id`);

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
-- Indexes for table `note_master`
--
ALTER TABLE `note_master`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `vendor_invoice_files`
--
ALTER TABLE `vendor_invoice_files`
  ADD KEY `vendor_invoice_id` (`invoice_id`);

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
-- Indexes for table `vendor_po_products`
--
ALTER TABLE `vendor_po_products`
  ADD KEY `quote_id` (`po_id`);

--
-- Indexes for table `vendor_quote`
--
ALTER TABLE `vendor_quote`
  ADD PRIMARY KEY (`vendor_quote_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor_quote_files`
--
ALTER TABLE `vendor_quote_files`
  ADD KEY `vendor_quote_id` (`vendor_quote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `note_master`
--
ALTER TABLE `note_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
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
  ADD CONSTRAINT `customer_invoice_ibfk_3` FOREIGN KEY (`srn_dc`) REFERENCES `customer_dc` (`dc_no`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `customer_po_files`
--
ALTER TABLE `customer_po_files`
  ADD CONSTRAINT `customer_po_files_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `customer_po` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_quote`
--
ALTER TABLE `customer_quote`
  ADD CONSTRAINT `customer_quote_ref` FOREIGN KEY (`customer_id`) REFERENCES `customer_master` (`customer_id`);

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
-- Constraints for table `vendor_invoice_files`
--
ALTER TABLE `vendor_invoice_files`
  ADD CONSTRAINT `vendor_invoice_id` FOREIGN KEY (`invoice_id`) REFERENCES `vendor_invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_po`
--
ALTER TABLE `vendor_po`
  ADD CONSTRAINT `vendor_po_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_master` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_po_products`
--
ALTER TABLE `vendor_po_products`
  ADD CONSTRAINT `vendor_po_products_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `vendor_po` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_quote`
--
ALTER TABLE `vendor_quote`
  ADD CONSTRAINT `vendor_quote_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_master` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_quote_files`
--
ALTER TABLE `vendor_quote_files`
  ADD CONSTRAINT `vendor_quote_id` FOREIGN KEY (`vendor_quote_id`) REFERENCES `vendor_quote` (`vendor_quote_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
