-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table rent_easy.re_invoices
CREATE TABLE IF NOT EXISTS `re_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_status` int(1) NOT NULL DEFAULT '0',
  `invoice_ref` varchar(50) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `date_paid` date NOT NULL,
  `costs` varchar(50) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  UNIQUE KEY `invoice_ref` (`invoice_ref`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='Stores invoices';

-- Dumping data for table rent_easy.re_invoices: 1 rows
/*!40000 ALTER TABLE `re_invoices` DISABLE KEYS */;
REPLACE INTO `re_invoices` (`invoice_id`, `pay_status`, `invoice_ref`, `tenant_id`, `property_id`, `date_issued`, `date_paid`, `costs`) VALUES
	(16, 1, '65JNX3', 8, 41, '2018-11-08', '2018-11-08', '30400');
/*!40000 ALTER TABLE `re_invoices` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_invoicing
CREATE TABLE IF NOT EXISTS `re_invoicing` (
  `in_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `total_amount` float DEFAULT '0',
  PRIMARY KEY (`in_id`),
  UNIQUE KEY `unit_no` (`unit_no`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table rent_easy.re_invoicing: 1 rows
/*!40000 ALTER TABLE `re_invoicing` DISABLE KEYS */;
REPLACE INTO `re_invoicing` (`in_id`, `property_id`, `tenant_id`, `landlord_id`, `unit_no`, `invoice_code`, `frequency`, `last_pay_date`, `tax_rate`, `rent`, `other_charges`, `desciption`, `total_amount`) VALUES
	(13, 41, 8, 4, 'B-14', '65JNX3', 'monthly', 0, 0, 30000, 400, 'Water and Gabbage', 30400);
/*!40000 ALTER TABLE `re_invoicing` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_ipn
CREATE TABLE IF NOT EXISTS `re_ipn` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_ref` varchar(100) DEFAULT NULL,
  `account_id` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_source` varchar(100) DEFAULT NULL,
  `posting_date` varchar(50) DEFAULT NULL,
  `time_received` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table rent_easy.re_ipn: 1 rows
/*!40000 ALTER TABLE `re_ipn` DISABLE KEYS */;
REPLACE INTO `re_ipn` (`row_id`, `transaction_ref`, `account_id`, `amount`, `payment_source`, `posting_date`, `time_received`) VALUES
	(1, 'GF12345IJKL', 'A90LKN', 20340, '254721806514', NULL, '2018-08-17 20:27:02');
/*!40000 ALTER TABLE `re_ipn` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_landlords
CREATE TABLE IF NOT EXISTS `re_landlords` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
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
  `bank_currency` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table rent_easy.re_landlords: 12 rows
/*!40000 ALTER TABLE `re_landlords` DISABLE KEYS */;
REPLACE INTO `re_landlords` (`id`, `firstname`, `lastname`, `lastlogin`, `email`, `address_box`, `kra_pin`, `telephone`, `avatar`, `bank_name`, `bank_branch`, `bank_account`, `bank_swift`, `bank_currency`) VALUES
	(4, 'David', 'Mulwale', NULL, 'davidpmulu@gmail.com', '123-00877', 'A0051234D', '0721806514', 'static_qr_code_without_logo-951604810.jpg', 'KCB Bank', 'Yaya Center', '134674830', 'KCBKENA', 'Ksh'),
	(5, 'Jane', 'doe', NULL, 'jane@email.com', NULL, NULL, '0987654321', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL),
	(6, 'Test ', 'Landlord', NULL, 'test@email.com', NULL, NULL, '1234567890', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL),
	(7, 'caleb', 'lastname', NULL, 'caleb@email.com', NULL, NULL, '1234567890', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL),
	(8, 'James', 'Andrews', NULL, 'ja@email.com', NULL, NULL, '1234567890', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL),
	(9, 'Susan', 'Jin', NULL, 'susan@email.com', NULL, NULL, '123456789', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL),
	(10, 'susan', 'jina', NULL, 'sjina@email.com', NULL, NULL, '1234567890', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL),
	(11, 'Caroline', 'Njeri', NULL, 'carolnjeri@gmail.com', NULL, NULL, '1234567890', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL),
	(12, 'landlordtest', 'test 3', NULL, 'landlord3@email.com', NULL, NULL, '123456789', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL),
	(14, 'test12', 'lastname', NULL, 'test12@email.com', NULL, NULL, '1234567890', 'default_person.jpg', 'Co-operative', 'NBC', '1234567890', 'CBKKENA', 'Ksh'),
	(15, 'Test13', 'Landlord', NULL, 'test13@email.com', NULL, NULL, '1234567890', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL),
	(16, 'landlord', '2019', NULL, 'landlord2019@email.com', NULL, NULL, '123456789', 'default_person.jpg', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `re_landlords` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_notices
CREATE TABLE IF NOT EXISTS `re_notices` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `notice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notice_title` varchar(50) DEFAULT NULL,
  `notice_apartment` int(11) DEFAULT NULL,
  `notice_tenant` int(11) DEFAULT NULL,
  `notice` text,
  `duration` int(11) DEFAULT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='notices both admin and landlords';

-- Dumping data for table rent_easy.re_notices: 1 rows
/*!40000 ALTER TABLE `re_notices` DISABLE KEYS */;
REPLACE INTO `re_notices` (`notice_id`, `owner_id`, `notice_date`, `notice_title`, `notice_apartment`, `notice_tenant`, `notice`, `duration`) VALUES
	(1, 4, '2018-08-08 10:16:54', 'test notice', 5, 8, 'Maecenas non nisl diam. Phasellus in justo viverra, consequat ante non, convallis mauris. Aliquam cursus sem id tristique porta. Morbi sagittis at eros at tristique. Pellentesque gravida ornare cursus. ', 5);
/*!40000 ALTER TABLE `re_notices` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_payment
CREATE TABLE IF NOT EXISTS `re_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_identify` varchar(50) NOT NULL DEFAULT '0',
  `trans_time` char(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trans_amount` bigint(50) NOT NULL DEFAULT '0',
  `trans_accountno` char(100) NOT NULL DEFAULT '0',
  `trans_tel` char(50) NOT NULL DEFAULT '0',
  `trans_narrative` varchar(200) DEFAULT '0',
  `trans_customername` char(200) NOT NULL DEFAULT '0',
  `trans_status` char(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `trans_id` (`trans_identify`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table rent_easy.re_payment: 3 rows
/*!40000 ALTER TABLE `re_payment` DISABLE KEYS */;
REPLACE INTO `re_payment` (`id`, `trans_identify`, `trans_time`, `trans_amount`, `trans_accountno`, `trans_tel`, `trans_narrative`, `trans_customername`, `trans_status`) VALUES
	(2, 'JK2NLJVA18', '0000-00-00 00:00:00', 60000, '880100', '2147483647', 'davidpmulu@gmail.com', 'JOHN DOE', 'SUCCESS'),
	(3, 'RM3217G4587', '2018/11/01 19:10', 20340, '0', '+254721806514', '0', 'David Junior', '1'),
	(4, 'SERG3464', '2018/11/08 11:57', 30400, '0', '0721806514', '0', 'David Junior', '1');
/*!40000 ALTER TABLE `re_payment` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_properties
CREATE TABLE IF NOT EXISTS `re_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- Dumping data for table rent_easy.re_properties: 10 rows
/*!40000 ALTER TABLE `re_properties` DISABLE KEYS */;
REPLACE INTO `re_properties` (`id`, `property_name`, `country`, `property_type`, `location`, `contact_person`, `telephone`, `number_units`, `landlord`, `lr_no`, `property_img`, `description`) VALUES
	(42, 'Global Building', 'Nairobi', 'Office Space', 'CBD ', 'James Jina', '0723123456', 2, 4, '12cdf', 'default.jpg', 'Nunc sed eros at nulla sodales convallis. Vivamus tincidunt euismod molestie. Mauris feugiat, est quis sodales iaculis, lorem massa fringilla tortor, eu blandit metus enim nec risus. Aenean tempor enim eget arcu pretium iaculis. Pellentesque tempor sed mauris a cursus. Integer sed convallis orci. Sed sit amet semper tellus. Quisque ultricies risus in libero tincidunt, in consequat arcu tincidunt. Pellentesque nibh ipsum, semper et mi eu, gravida vehicula purus.'),
	(41, 'Alpha Towers', 'Nairobi', 'Apartment', 'Riruta, Ngina Rd', 'John Gitau', '071234567', 67, 4, '123dgb', 'default.jpg', 'Nunc sed eros at nulla sodales convallis. Vivamus tincidunt euismod molestie. Mauris feugiat, est quis sodales iaculis, lorem massa fringilla tortor, eu blandit metus enim nec risus. Aenean tempor enim eget arcu pretium iaculis. Pellentesque tempor sed mauris a cursus. Integer sed convallis orci. Sed sit amet semper tellus. Quisque ultricies risus in libero tincidunt, in consequat arcu tincidunt. Pellentesque nibh ipsum, semper et mi eu, gravida vehicula purus.'),
	(44, 'Building Name 001', 'Kenya', 'Apartment', 'Nairobi Ruaraka', 'John Doe', '1234567890', 2, 5, 'fvh53', 'default.jpg', 'Nunc sed eros at nulla sodales convallis. Vivamus tincidunt euismod molestie. Mauris feugiat, est quis sodales iaculis, lorem massa fringilla tortor, eu blandit metus enim nec risus. Aenean tempor enim eget arcu pretium iaculis. Pellentesque tempor sed mauris a cursus. Integer sed convallis orci. Sed sit amet semper tellus. Quisque ultricies risus in libero tincidunt, in consequat arcu tincidunt. Pellentesque nibh ipsum, semper et mi eu, gravida vehicula purus.'),
	(45, 'Land name 001', 'Kenya', 'Land', 'Nairobi', 'James', '0987654321', 1, 5, 'dfbnj4', 'default.jpg', NULL),
	(49, 'test apartments', 'Kenya', 'Apartment', 'Nairobi', 'Joseph', '12344566789', 3, 4, 'lr2345`', 'imgzz-401099233.jpg', NULL),
	(50, 'Hurlingham court building', 'Kenya', 'Apartment', 'Nairobi', 'Joyce', '098776643', 2, 7, 'lr1234', 'etta-1178382297.jpg', 'Maecenas non nisl diam. Phasellus in justo viverra, consequat ante non, convallis mauris. Aliquam cursus sem id tristique porta. Morbi sagittis at eros at tristique. Pellentesque gravida ornare cursus. Vestibulum iaculis, nulla vitae hendrerit ullamcorper, magna lorem lacinia ipsum, a maximus risus nisl nec quam. In ut elit eu justo sodales elementum. Nam sem tortor, cursus eu volutpat vitae, tincidunt at arcu.'),
	(51, 'Ruiru', 'kenya', 'Land', 'Nairobi', 'James', '12345678', 1, 4, '1234rg', 'building-construction-250x250-577013154.jpeg', '4 acre piece of land'),
	(52, 'Kitengela villa', 'Nairobi', 'Land', 'Kitengela', 'Carol', '12345678', 1, 11, 'E4123-56789', 'buy-affordable-kitengela.jpg', '2 Acres of prime land situated in the outskirts of Nairobi, with a beautiful scenery of the vast Champagne Ridge. This Plot has ready water from a borehole and electricity poles. '),
	(53, 'Car Lot test', 'Nairobi', 'Land', 'Kilimani', 'James Omondi', '123456789', 1, 9, 'LR-234-10', 'etta-1167194034.jpg', 'Half an acre prime plot along Argwings Kodhek road'),
	(54, 'Car Lot 2', 'Kenya', 'Land', 'Kiambu', 'Njoroge', '123456789', 1, 12, '123gt', 'default.jpg', 'quarter an acre of land on prime land');
/*!40000 ALTER TABLE `re_properties` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_propertytenant
CREATE TABLE IF NOT EXISTS `re_propertytenant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL DEFAULT '0',
  `property_id` int(11) NOT NULL DEFAULT '0',
  `date_moved_in` date DEFAULT NULL,
  `unit_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table rent_easy.re_propertytenant: 10 rows
/*!40000 ALTER TABLE `re_propertytenant` DISABLE KEYS */;
REPLACE INTO `re_propertytenant` (`id`, `tenant_id`, `property_id`, `date_moved_in`, `unit_no`) VALUES
	(2, 5, 38, NULL, 'B-10'),
	(3, 6, 39, NULL, 'H-3'),
	(4, 7, 40, NULL, 'Room - 3'),
	(5, 8, 41, NULL, 'B-14'),
	(6, 9, 44, NULL, 'B10'),
	(7, 10, 50, NULL, 'B5'),
	(8, 11, 51, NULL, 'land1'),
	(9, 12, 53, NULL, 'a1'),
	(10, 13, 54, NULL, '1'),
	(13, 14, 41, '2018-09-01', 'A25');
/*!40000 ALTER TABLE `re_propertytenant` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_site_admin
CREATE TABLE IF NOT EXISTS `re_site_admin` (
  `admin_username` char(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table rent_easy.re_site_admin: 0 rows
/*!40000 ALTER TABLE `re_site_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `re_site_admin` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_tenant
CREATE TABLE IF NOT EXISTS `re_tenant` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` text,
  `email` varchar(200) NOT NULL,
  `tenantid` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `postal_address` varchar(50) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `personal_id` (`tenantid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='bookings made by the online users';

-- Dumping data for table rent_easy.re_tenant: 7 rows
/*!40000 ALTER TABLE `re_tenant` DISABLE KEYS */;
REPLACE INTO `re_tenant` (`id`, `name`, `email`, `tenantid`, `telephone`, `postal_address`, `avatar`) VALUES
	(8, 'test Tenant', 'tenant@email.com', '123456', '1234567890', NULL, 'default_person.jpg'),
	(9, 'Test Client', 'test@email.com', '123456789', '1234567890', NULL, 'default_person.jpg'),
	(10, 'Joyca Angaka', 'joyce@tenant.com', '2345678', '12345678990', NULL, 'default_person.jpg'),
	(11, 'John Tenant', 'john@tanant.com', '12345678', NULL, NULL, 'default_person.jpg'),
	(12, 'Harrison Kamau', '123@email.com', '2532345', NULL, NULL, 'default_person.jpg'),
	(13, 'James Other', 'test5@email.com', '75379045', '12345321', NULL, NULL),
	(14, 'tenantname', 'tenantemail', '3424564', NULL, NULL, NULL);
/*!40000 ALTER TABLE `re_tenant` ENABLE KEYS */;

-- Dumping structure for table rent_easy.re_users
CREATE TABLE IF NOT EXISTS `re_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` char(50) NOT NULL DEFAULT '0',
  `user_password` varchar(200) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_type` char(50) NOT NULL DEFAULT '0',
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table rent_easy.re_users: 5 rows
/*!40000 ALTER TABLE `re_users` DISABLE KEYS */;
REPLACE INTO `re_users` (`id`, `user_email`, `user_password`, `user_id`, `user_type`, `date_entered`, `last_login`) VALUES
	(2, 'davidpmulu@gmail.com', 'NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==', 4, 'landlord', '2017-10-01 14:19:17', NULL),
	(3, 'tenant@email.com', 'NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==', 8, 'tenant', '2017-10-01 19:48:52', NULL),
	(13, 'landlord2019@email.com', 'NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==', 16, 'landlord', '2019-02-16 13:34:45', NULL),
	(12, 'test13@email.com', 'NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==', 15, 'landlord', '2018-12-11 16:16:52', NULL),
	(11, 'test12@email.com', 'NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==', 14, 'landlord', '2018-12-11 08:46:03', NULL);
/*!40000 ALTER TABLE `re_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
