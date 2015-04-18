-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2015 at 05:26 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `companybazzar`
--
CREATE DATABASE IF NOT EXISTS `companybazzar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `companybazzar`;

-- --------------------------------------------------------

--
-- Table structure for table `balance_sheets`
--

CREATE TABLE IF NOT EXISTS `balance_sheets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `liability` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `liability_amount` decimal(10,2) NOT NULL,
  `asset` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `balance_sheets`
--

INSERT INTO `balance_sheets` (`id`, `company_id`, `liability`, `liability_amount`, `asset`, `asset_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'asd', '423.00', 'ghg', '567.00', '2015-03-08 07:20:26', '0000-00-00 00:00:00'),
(2, 1, 'wer', '4576.00', 'fgh fg', '34535.00', '2015-03-08 07:20:26', '0000-00-00 00:00:00'),
(3, 1, 'rtyb', '345.00', 'dfgg', '4356.00', '2015-03-08 07:20:26', '0000-00-00 00:00:00'),
(4, 2, 'fsd', '243.00', 'sdf', '235.00', '2015-03-08 07:54:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `roc_office_id` int(11) NOT NULL,
  `company_type_id` int(11) NOT NULL,
  `company_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `incorporation_date` datetime NOT NULL,
  `last_balance_sheet_date` datetime NOT NULL,
  `authorized_capital` decimal(19,2) NOT NULL,
  `paidup_capital` decimal(19,2) NOT NULL,
  `compliance_upto_date` datetime DEFAULT NULL,
  `in_lost` tinyint(1) NOT NULL,
  `loss_amount` decimal(19,2) DEFAULT NULL,
  `number_of_charge` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `max_price` decimal(19,4) DEFAULT NULL,
  `min_price` decimal(19,4) DEFAULT NULL,
  `sell_price` decimal(19,4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `roc_office_id`, `company_type_id`, `company_code`, `incorporation_date`, `last_balance_sheet_date`, `authorized_capital`, `paidup_capital`, `compliance_upto_date`, `in_lost`, `loss_amount`, `number_of_charge`, `active`, `max_price`, `min_price`, `sell_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 3, NULL, '2015-03-04 00:00:00', '2015-03-24 00:00:00', '56000.00', '78000.00', '2015-03-26 00:00:00', 1, '6000.00', 5, 0, NULL, NULL, '45000.0000', NULL, '2015-03-08 07:20:26', '2015-03-08 07:20:26'),
(2, 3, 1, 2, NULL, '2015-03-11 00:00:00', '2015-03-04 00:00:00', '43435.00', '34545.00', '2015-03-23 00:00:00', 0, '0.00', 7, 0, NULL, NULL, '234.0000', NULL, '2015-03-08 07:54:17', '2015-03-08 07:54:17'),
(3, 4, 4, 2, NULL, '2015-03-07 00:00:00', '2015-03-16 00:00:00', '435.00', '345.00', '2015-03-10 00:00:00', 1, '3456.00', 7, 0, NULL, NULL, '3453456.0000', NULL, '2015-03-08 08:01:12', '2015-03-08 08:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `company_losses`
--

CREATE TABLE IF NOT EXISTS `company_losses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `amount` decimal(19,4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `company_losses`
--

INSERT INTO `company_losses` (`id`, `company_id`, `year`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1955, '4566.0000', '2015-03-08 07:20:26', '0000-00-00 00:00:00'),
(2, 1, 1957, '7000.0000', '2015-03-08 07:20:26', '0000-00-00 00:00:00'),
(3, 1, 1965, '400.0000', '2015-03-08 07:20:26', '0000-00-00 00:00:00'),
(4, 1, 2012, '4560.0000', '2015-03-08 07:20:26', '0000-00-00 00:00:00'),
(5, 1, 2015, '500.0000', '2015-03-08 07:20:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `company_requirements`
--

CREATE TABLE IF NOT EXISTS `company_requirements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `roc_office_id` int(11) DEFAULT NULL,
  `company_type_id` int(11) DEFAULT NULL,
  `incorporation_date_from` datetime DEFAULT NULL,
  `incorporation_date_to` datetime DEFAULT NULL,
  `last_balance_sheet_date_from` datetime DEFAULT NULL,
  `last_balance_sheet_date_to` datetime DEFAULT NULL,
  `authorized_capital_from` decimal(10,2) DEFAULT NULL,
  `authorized_capital_to` decimal(10,2) DEFAULT NULL,
  `paidup_capital_from` decimal(10,2) DEFAULT NULL,
  `paidup_capital_to` decimal(10,2) DEFAULT NULL,
  `sell_price_from` decimal(10,2) DEFAULT NULL,
  `sell_price_to` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company_requirements`
--

INSERT INTO `company_requirements` (`id`, `user_id`, `roc_office_id`, `company_type_id`, `incorporation_date_from`, `incorporation_date_to`, `last_balance_sheet_date_from`, `last_balance_sheet_date_to`, `authorized_capital_from`, `authorized_capital_to`, `paidup_capital_from`, `paidup_capital_to`, `sell_price_from`, `sell_price_to`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, '2015-03-15 00:00:00', '2015-03-15 00:00:00', '2015-03-15 00:00:00', '2015-03-15 00:00:00', '2352.00', '34535.00', '346436.00', '345.00', '43645.00', '3454353.00', '2015-03-15 03:26:40', '2015-03-15 03:26:40'),
(2, 2, 2, 1, '2015-03-02 00:00:00', '2015-03-25 23:59:59', '2015-03-24 00:00:00', '2015-03-17 23:59:59', '75765.00', '5675567.00', '5675.00', '567567.00', '45.00', '600.00', '2015-03-15 09:04:57', '2015-03-15 09:04:57'),
(3, 5, 2, 2, '2015-03-15 00:00:00', '2015-03-11 23:59:59', '2015-03-27 00:00:00', '2015-03-18 23:59:59', '42.00', '234.00', '234.00', '234.00', '234.00', '2344.00', '2015-03-15 09:31:34', '2015-03-15 09:31:34'),
(4, 5, 5, 4, '2015-03-17 00:00:00', '2015-03-18 23:59:59', '2015-03-10 00:00:00', '2015-04-02 23:59:59', '456.00', '4570.00', '3400.00', '35400.00', '50000.00', '51000.00', '2015-03-15 11:40:03', '2015-03-15 11:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `company_types`
--

CREATE TABLE IF NOT EXISTS `company_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company_types`
--

INSERT INTO `company_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'type 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'type 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'type 3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'type 4', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `compliances`
--

CREATE TABLE IF NOT EXISTS `compliances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `compliance_label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_compliance` tinyint(1) NOT NULL,
  `compliance_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `compliances`
--

INSERT INTO `compliances` (`id`, `company_id`, `compliance_label`, `is_compliance`, `compliance_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'serice tax', 1, '2015-03-25 00:00:00', '2015-03-08 07:20:26', '0000-00-00 00:00:00'),
(2, 1, 'demo tax', 0, NULL, '2015-03-08 07:20:26', '0000-00-00 00:00:00'),
(3, 1, 'com tax', 1, '2015-03-10 00:00:00', '2015-03-08 07:20:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_25_182226_create_users_table', 1),
('2015_01_25_183841_create_roc_officess_table', 2),
('2015_01_25_184110_create_company_types_table', 3),
('2015_01_25_184443_create_compliances_table', 4),
('2015_01_25_185144_create_balance_sheets_table', 5),
('2015_01_25_191947_create_companies_table', 6),
('2015_03_08_065238_create_company_losses', 7),
('2015_03_15_064233_create_company_requirements_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `roc_offices`
--

CREATE TABLE IF NOT EXISTS `roc_offices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roc_offices`
--

INSERT INTO `roc_offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ahm', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Surat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Baroda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Bhavnagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Rajkot', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Pune', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `verified`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'darshan.denz@gmail.com', 'Nainesh', NULL, 0, 1, NULL, '2015-03-08 04:39:07', '2015-03-08 04:39:07'),
(2, NULL, 'darshan@gmail.com', 'Darshan', NULL, 0, 1, NULL, '2015-03-08 06:36:47', '2015-03-08 06:36:47'),
(3, NULL, 'darshann@gmail.com', 'Anant', NULL, 0, 1, NULL, '2015-03-08 07:54:17', '2015-03-08 07:54:17'),
(4, NULL, 'darshangsheta@gmail.com', 'Sheta', NULL, 0, 1, NULL, '2015-03-08 08:01:12', '2015-03-08 08:01:12'),
(5, NULL, 'darshannew@gmail.com', 'Rocky', NULL, 0, 1, NULL, '2015-03-15 09:31:34', '2015-03-15 09:31:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
