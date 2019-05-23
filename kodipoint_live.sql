-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2019 at 04:28 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kodipoint_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `re_invoices`
--

CREATE TABLE `re_invoices` (
  `invoice_id` int(11) NOT NULL,
  `pay_status` int(1) NOT NULL DEFAULT '0',
  `invoice_ref` varchar(50) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `date_paid` date NOT NULL,
  `costs` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Stores invoices';

-- --------------------------------------------------------

--
-- Table structure for table `re_invoicing`
--

CREATE TABLE `re_invoicing` (
  `in_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL DEFAULT '0',
  `tenant_id` int(11) NOT NULL DEFAULT '0',
  `landlord_id` int(11) NOT NULL DEFAULT '0',
  `unit_no` char(50) NOT NULL DEFAULT '0',
  `invoice_code` varchar(50) NOT NULL DEFAULT '0',
  `frequency` char(50) DEFAULT '0',
  `last_pay_date` int(11) DEFAULT '0',
  `tax_rate` int(11) DEFAULT '0',
  `rent` float DEFAULT '0',
  `other_charges` float DEFAULT '0',
  `desciption` varchar(50) DEFAULT '0',
  `total_amount` float DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_invoicing`
--

INSERT INTO `re_invoicing` (`in_id`, `property_id`, `tenant_id`, `landlord_id`, `unit_no`, `invoice_code`, `frequency`, `last_pay_date`, `tax_rate`, `rent`, `other_charges`, `desciption`, `total_amount`) VALUES
(1, 1, 8, 1, '2', 'FCXTV8', 'monthly', 0, 10, 20000, 0, '500', 22000),
(3, 1, 6, 1, '4', 'HDRH94', 'monthly', 0, 10, 3000, 500, 'trash', 3850);

-- --------------------------------------------------------

--
-- Table structure for table `re_ipn`
--

CREATE TABLE `re_ipn` (
  `row_id` int(11) NOT NULL,
  `transaction_ref` varchar(100) DEFAULT NULL,
  `account_id` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_source` varchar(100) DEFAULT NULL,
  `posting_date` varchar(50) DEFAULT NULL,
  `time_received` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `re_landlords`
--

CREATE TABLE `re_landlords` (
  `id` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(300) DEFAULT NULL,
  `lastname` varchar(300) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address_box` varchar(50) DEFAULT NULL,
  `kra_pin` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT 'default_person.jpg',
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_branch` varchar(50) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `bank_swift` varchar(50) DEFAULT NULL,
  `bank_currency` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_landlords`
--

INSERT INTO `re_landlords` (`id`, `user_id`, `firstname`, `lastname`, `lastlogin`, `email`, `address_box`, `kra_pin`, `telephone`, `avatar`, `bank_name`, `bank_branch`, `bank_account`, `bank_swift`, `bank_currency`) VALUES
(1, 1, 'Caleb', 'Nasio', NULL, 'nascal3@gmail.com', NULL, NULL, '0718769663', 'default_person.jpg', 'Equty', 'Ongata rongai', '1234567', '00200', 'Ksh');

-- --------------------------------------------------------

--
-- Table structure for table `re_notices`
--

CREATE TABLE `re_notices` (
  `notice_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `notice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notice_title` varchar(50) DEFAULT NULL,
  `notice_apartment` int(11) DEFAULT NULL,
  `notice_tenant` int(11) DEFAULT NULL,
  `notice` text,
  `duration` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='notices both admin and landlords';

-- --------------------------------------------------------

--
-- Table structure for table `re_payment`
--

CREATE TABLE `re_payment` (
  `id` int(11) NOT NULL,
  `trans_identify` varchar(50) NOT NULL DEFAULT '0',
  `trans_time` char(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trans_amount` bigint(50) NOT NULL DEFAULT '0',
  `trans_accountno` char(100) NOT NULL DEFAULT '0',
  `trans_tel` char(50) NOT NULL DEFAULT '0',
  `trans_narrative` varchar(200) DEFAULT '0',
  `trans_customername` char(200) NOT NULL DEFAULT '0',
  `tenant_id` int(11) NOT NULL,
  `trans_status` char(50) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_payment`
--

INSERT INTO `re_payment` (`id`, `trans_identify`, `trans_time`, `trans_amount`, `trans_accountno`, `trans_tel`, `trans_narrative`, `trans_customername`, `tenant_id`, `trans_status`) VALUES
(3, '123abc', '2019/05/22 15:02', 18000, '0', '0718769663', '0', '6', 0, '1'),
(4, '123abc', '2019/05/08 00:00', 18000, '0', '0718769663', '0', 'John Doe', 8, '1');

-- --------------------------------------------------------

--
-- Table structure for table `re_properties`
--

CREATE TABLE `re_properties` (
  `id` int(11) NOT NULL,
  `property_name` text NOT NULL,
  `country` text,
  `property_type` varchar(200) DEFAULT NULL,
  `location` text,
  `contact_person` text,
  `telephone` varchar(50) DEFAULT NULL,
  `number_units` int(11) DEFAULT NULL,
  `landlord` int(11) DEFAULT NULL,
  `lr_no` varchar(50) DEFAULT NULL,
  `property_img` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_properties`
--

INSERT INTO `re_properties` (`id`, `property_name`, `country`, `property_type`, `location`, `contact_person`, `telephone`, `number_units`, `landlord`, `lr_no`, `property_img`, `description`) VALUES
(1, 'Zuri', 'Kenya', 'Apartment', 'Nairobi', 'Caleb', '0718769663', 20, 1, 'xxx-123', 'default.jpg', ''),
(2, 'Zubeida', 'Kenya', 'Apartment', 'Mombasa', 'Caleb', '0718769663', 20, 1, 'ccc-123456', 'default.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `re_roles`
--

CREATE TABLE `re_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `role_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_roles`
--

INSERT INTO `re_roles` (`id`, `role_name`, `role_number`) VALUES
(1, 'tenant', 1),
(2, 'landlord', 2),
(3, 'tenant/landlord', 3),
(4, 'admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `re_site_admin`
--

CREATE TABLE `re_site_admin` (
  `admin_username` char(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `re_tenant`
--

CREATE TABLE `re_tenant` (
  `id` int(200) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` text,
  `email` varchar(200) NOT NULL,
  `tenantid` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `unit_no` varchar(50) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `move_in_date` date NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `postal_address` varchar(50) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='bookings made by the online users';

--
-- Dumping data for table `re_tenant`
--

INSERT INTO `re_tenant` (`id`, `user_id`, `name`, `email`, `tenantid`, `property_id`, `property_name`, `unit_no`, `landlord_id`, `move_in_date`, `telephone`, `postal_address`, `avatar`) VALUES
(6, NULL, 'Jane Doe', 'jane@mail.com', '464646', 1, 'Zuri', '4', 1, '0000-00-00', NULL, NULL, NULL),
(7, NULL, 'Cleo Monyo', 'cleo@mail.com', '90890987', 2, 'Zubeida', '1', 1, '2018-02-03', NULL, NULL, NULL),
(8, 2, 'John Doe', 'john@mail.com', '878687', 1, 'Zuri', '2', 1, '2019-05-01', '0718769663', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `re_users`
--

CREATE TABLE `re_users` (
  `id` int(11) NOT NULL,
  `user_email` char(50) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL,
  `user_password` varchar(200) NOT NULL DEFAULT '0',
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_users`
--

INSERT INTO `re_users` (`id`, `user_email`, `role`, `user_password`, `date_entered`, `last_login`) VALUES
(1, 'nascal3@gmail.com', 2, 'OGQ5NjllZWY2ZWNhZDNjMjlhM2E2MjkyODBlNjg2Y2YwYzNmNWQ1YTg2YWZmM2NhMTIwMjBjOTIzYWRjNmM5Mg==', '2019-05-21 09:39:36', NULL),
(2, 'john@mail.com', 1, 'OGQ5NjllZWY2ZWNhZDNjMjlhM2E2MjkyODBlNjg2Y2YwYzNmNWQ1YTg2YWZmM2NhMTIwMjBjOTIzYWRjNmM5Mg==', '2019-05-22 13:36:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `re_invoices`
--
ALTER TABLE `re_invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD UNIQUE KEY `invoice_ref` (`invoice_ref`);

--
-- Indexes for table `re_invoicing`
--
ALTER TABLE `re_invoicing`
  ADD PRIMARY KEY (`in_id`),
  ADD UNIQUE KEY `unit_no` (`unit_no`);

--
-- Indexes for table `re_ipn`
--
ALTER TABLE `re_ipn`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `re_landlords`
--
ALTER TABLE `re_landlords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_notices`
--
ALTER TABLE `re_notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `re_payment`
--
ALTER TABLE `re_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_id` (`trans_identify`);

--
-- Indexes for table `re_properties`
--
ALTER TABLE `re_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_roles`
--
ALTER TABLE `re_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_site_admin`
--
ALTER TABLE `re_site_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_tenant`
--
ALTER TABLE `re_tenant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `re_users`
--
ALTER TABLE `re_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `re_invoices`
--
ALTER TABLE `re_invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `re_invoicing`
--
ALTER TABLE `re_invoicing`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `re_ipn`
--
ALTER TABLE `re_ipn`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `re_landlords`
--
ALTER TABLE `re_landlords`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `re_notices`
--
ALTER TABLE `re_notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `re_payment`
--
ALTER TABLE `re_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `re_properties`
--
ALTER TABLE `re_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `re_roles`
--
ALTER TABLE `re_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `re_site_admin`
--
ALTER TABLE `re_site_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `re_tenant`
--
ALTER TABLE `re_tenant`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `re_users`
--
ALTER TABLE `re_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
