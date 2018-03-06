-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2017 at 04:14 PM
-- Server version: 5.6.30
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opes_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `account_type_id` int(11) NOT NULL,
  `account_type_name` varchar(40) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`account_type_id`, `account_type_name`, `amount`, `description`) VALUES
(1, 'Bronze Package', '20000', 'Bronze Package'),
(2, 'Silver Package', '50000', 'Silver Package'),
(3, 'Gold Package', '100000', 'Gold Package'),
(4, 'Diamond Package', '200000', 'Diamond Package'),
(5, 'Royal Package', '500000', 'Royal Package'),
(6, 'Mega Package', '1000000', 'Mega Package');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_code` varchar(9) DEFAULT NULL,
  `bank_name` varchar(24) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_code`, `bank_name`) VALUES
(2, '000001', 'Sterling Bank'),
(3, '000002', 'Keystone Bank'),
(4, '000003', 'First City Monument Bank'),
(5, '000004', 'United Bank for Africa'),
(6, '000005', 'Diamond Bank'),
(7, '000006', 'JAIZ Bank'),
(8, '000007', 'Fidelity Bank'),
(9, '000008', 'Skye Bank'),
(10, '000009', 'Citi Bank'),
(11, '000010', 'Ecobank Bank'),
(12, '000011', 'Unity Bank'),
(13, '000012', 'StanbicIBTC Bank'),
(14, '000013', 'GTBank Plc'),
(15, '000014', 'Access Bank'),
(16, '000015', 'Zenith Bank'),
(17, '000016', 'First Bank of Nigeria'),
(18, '000017', 'Wema Bank'),
(19, '000018', 'Union Bank'),
(20, '000019', 'Enterprise Bank'),
(21, '000020', 'Heritage'),
(22, '000021', 'StandardChartered'),
(23, '000022', 'SUNTRUST BANK'),
(24, '060001', 'Coronation'),
(25, '070001', 'NPF MicroFinance Bank'),
(26, '070002', 'Fortis Microfinance Bank'),
(27, '070006', 'Covenant'),
(28, '090001', 'ASOSavings'),
(29, '090003', 'JubileeLife'),
(30, '090004', 'Parralex'),
(31, '090005', 'Trustbond'),
(32, '090006', 'SafeTrust'),
(33, '100001', 'FET'),
(34, '100002', 'Paga'),
(35, '100003', 'Parkway-ReadyCash'),
(36, '100004', 'Paycom'),
(37, '100005', 'Cellulant'),
(38, '100006', 'eTranzact'),
(39, '100007', 'StanbicMobileMoney'),
(40, '100008', 'EcoMobile'),
(41, '100009', 'GTMobile'),
(42, '100010', 'TeasyMobile'),
(43, '100011', 'Mkudi'),
(44, '100012', 'VTNetworks'),
(45, '100013', 'AccessMobile'),
(46, '100014', 'FBNMobile'),
(47, '100015', 'ChamsMobile'),
(48, '100016', 'FortisMobile'),
(49, '100017', 'Hedonmark'),
(50, '100018', 'ZenithMobile'),
(51, '100019', 'Fidelity Mobile'),
(52, '100020', 'MoneyBox'),
(53, '100021', 'Eartholeum'),
(54, '100022', 'Sterling Mobile'),
(55, '100023', 'TagPay'),
(56, '110001', 'UPSL'),
(57, '400001', 'FSDH'),
(58, '999999', 'NIP Virtual Bank');

-- --------------------------------------------------------

--
-- Table structure for table `comfirm_paid_users`
--

CREATE TABLE IF NOT EXISTS `comfirm_paid_users` (
  `comfirm_paid_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `paid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comfirm_paid_users`
--

INSERT INTO `comfirm_paid_users` (`comfirm_paid_users`, `user_id`, `amount`, `paid`) VALUES
(3, 2, '200000', 1),
(7, 0, '0', 0),
(8, 1, '100000', 1),
(9, 0, '0', 0),
(10, 2, '200000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `help_request`
--

CREATE TABLE IF NOT EXISTS `help_request` (
  `help_request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(40) NOT NULL,
  `account_type` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_requested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help_request`
--

INSERT INTO `help_request` (`help_request_id`, `user_id`, `amount`, `account_type`, `status`, `date_requested`) VALUES
(1, 1, '50000', 1, 1, '2017-02-22 09:03:34'),
(2, 2, '100000', 1, 1, '2017-02-22 09:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL,
  `payer_id` int(40) NOT NULL,
  `payer_amount` varchar(100) NOT NULL,
  `reciever_id` int(40) NOT NULL,
  `reciever_amount` varchar(40) NOT NULL,
  `date_to_pay` varchar(40) DEFAULT NULL,
  `date_to_recieve` varchar(40) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payer_id`, `payer_amount`, `reciever_id`, `reciever_amount`, `date_to_pay`, `date_to_recieve`, `status`, `date_created`) VALUES
(1, 1, '50000', 2, '200000', NULL, NULL, 1, '2017-02-23 11:11:20'),
(2, 2, '100000', 1, '100000', NULL, NULL, 1, '2017-02-23 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type`, `created_at`, `updated_at`, `email`, `phone_number`, `address`) VALUES
(1, 'wilforlan', '21232f297a57a5a743894a0e4a801fc3', 0, '2017-02-16 14:12:10', '2017-02-22 07:39:48', 'williamscalg@gmail.com', '23408146877423', '5a, Ajegunle Street, Sango Ota'),
(2, 'olamide', '21232f297a57a5a743894a0e4a801fc3', 0, '2017-02-16 14:12:10', '2017-02-23 12:36:47', 'olamide@gmail.com', '23408146877423', '5a, Ajegunle Street, Sango Ota'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2017-02-16 14:12:10', '2017-02-22 07:39:48', 'admin@admin.com', '23408146877423', '5a, Ajegunle Street, Sango Ota');

-- --------------------------------------------------------

--
-- Table structure for table `user_banks`
--

CREATE TABLE IF NOT EXISTS `user_banks` (
  `user_banks_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_number` varchar(40) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_banks`
--

INSERT INTO `user_banks` (`user_banks_id`, `user_id`, `account_number`, `account_name`, `bank_id`) VALUES
(4, 1, '27636376376378', 'WILLIAMS ISAAC', 6),
(5, 2, '01224283778', 'OLAMIDE MICHEAL', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `state` varchar(20) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address` mediumtext NOT NULL,
  `hash_key` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_details_id`, `user_id`, `first_name`, `last_name`, `state`, `city`, `address`, `hash_key`) VALUES
(1, 1, 'Williams', 'Isaac', 'Ogun', 'Sango', '5a, Ajegunle Street, Sango Ota', 'D61B90D277111CF4E171C623DAC315E2'),
(2, 2, 'Olamide', 'Micheal', 'Ogun', 'Sango', '5a, Ajegunle Street, Sango Ota', 'D61B90D277111CF4E17UYYS3DAC315E2'),
(3, 3, 'Admin', 'Admin', 'Ogun', 'Sango', '5a, Ajegunle Street, Sango Ota', 'D61B90D277111CF4E17UYYS3DAC315E2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`account_type_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `comfirm_paid_users`
--
ALTER TABLE `comfirm_paid_users`
  ADD PRIMARY KEY (`comfirm_paid_users`);

--
-- Indexes for table `help_request`
--
ALTER TABLE `help_request`
  ADD PRIMARY KEY (`help_request_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_banks`
--
ALTER TABLE `user_banks`
  ADD PRIMARY KEY (`user_banks_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `account_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `comfirm_paid_users`
--
ALTER TABLE `comfirm_paid_users`
  MODIFY `comfirm_paid_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `help_request`
--
ALTER TABLE `help_request`
  MODIFY `help_request_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_banks`
--
ALTER TABLE `user_banks`
  MODIFY `user_banks_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_details_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
