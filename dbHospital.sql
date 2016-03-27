-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2016 at 05:53 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbHospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP DATABASE IF EXISTS dbHospital;

CREATE DATABASE IF NOT EXISTS dbHospital;

USE dbHospital;

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_25_060123_create_building_table', 1),
('2016_03_25_060349_create_floor_table', 1),
('2016_03_25_060728_create_roomtype_table', 1),
('2016_03_25_060939_create_nursestation_table', 1),
('2016_03_25_061209_create_room_table', 1),
('2016_03_25_061740_create_roomprice_table', 1),
('2016_03_25_062341_create_bed_table', 1),
('2016_03_25_062946_create_itemcategory_table', 1),
('2016_03_25_063050_create_genericname_table', 1),
('2016_03_25_063322_create_department_table', 1),
('2016_03_25_063443_create_item_table', 1),
('2016_03_25_064028_create_itemprice_table', 1),
('2016_03_25_065416_create_equipmentcategory_table', 1),
('2016_03_25_065416_create_supplier_table', 1),
('2016_03_25_065417_create_equipment_table', 1),
('2016_03_25_070811_create_service_table', 1),
('2016_03_25_070838_create_serviceprice_table', 1),
('2016_03_25_125911_create_employeetype_table', 1),
('2016_03_25_130140_create_employee_table', 1),
('2016_03_25_180835_create_account_table', 1),
('2016_03_26_051933_create_feetype_table', 1),
('2016_03_26_052204_create_fee_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblAccount`
--

CREATE TABLE IF NOT EXISTS `tblAccount` (
  `intAccountId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strUsername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intEmployeeIdFK` int(10) unsigned NOT NULL,
  `intStatus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intAccountId`),
  UNIQUE KEY `tblaccount_strusername_unique` (`strUsername`),
  UNIQUE KEY `tblaccount_intemployeeidfk_unique` (`intEmployeeIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblBed`
--

CREATE TABLE IF NOT EXISTS `tblBed` (
  `intBedId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intRoomIdFK` int(10) unsigned NOT NULL,
  `intBedStatus` int(11) NOT NULL,
  PRIMARY KEY (`intBedId`),
  KEY `tblbed_introomidfk_foreign` (`intRoomIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblBuilding`
--

CREATE TABLE IF NOT EXISTS `tblBuilding` (
  `intBuildingId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strBuildingName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strBuildingLocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strBuildingDesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intBuildingStatus` int(11) NOT NULL,
  PRIMARY KEY (`intBuildingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblDepartment`
--

CREATE TABLE IF NOT EXISTS `tblDepartment` (
  `intDepartmentId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strDepartmentDesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intDepartmentStatus` int(11) NOT NULL,
  PRIMARY KEY (`intDepartmentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmployee`
--

CREATE TABLE IF NOT EXISTS `tblEmployee` (
  `intEmployeeId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `txtImagePath` text COLLATE utf8_unicode_ci,
  `strFirstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `strMiddleName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strLastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateBirthday` date NOT NULL,
  `strGender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `strContactNum` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intEmployeeTypeIdFK` int(10) unsigned NOT NULL,
  `intStatus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intEmployeeId`),
  UNIQUE KEY `tblemployee_stremail_unique` (`strEmail`),
  UNIQUE KEY `uq_employee_name` (`strFirstName`,`strMiddleName`,`strLastName`),
  KEY `tblemployee_intemployeetypeidfk_foreign` (`intEmployeeTypeIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmployeeType`
--

CREATE TABLE IF NOT EXISTS `tblEmployeeType` (
  `intEmployeeTypeId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strPosition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intStatus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intEmployeeTypeId`),
  UNIQUE KEY `tblemployeetype_strposition_unique` (`strPosition`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblEmployeeType`
--

INSERT INTO `tblEmployeeType` (`intEmployeeTypeId`, `strPosition`, `intStatus`, `created_at`, `updated_at`) VALUES
(1, 'Doctor', 1, '2016-03-26 00:50:00', '2016-03-26 00:50:00'),
(2, 'Nurse', 1, '2016-03-26 00:50:00', '2016-03-26 00:50:00'),
(3, 'Cashier', 1, '2016-03-26 00:50:00', '2016-03-26 00:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblEquipment`
--

CREATE TABLE IF NOT EXISTS `tblEquipment` (
  `intEquipmentId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strEquipmentCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intEquipmentCategoryIdFK` int(10) unsigned NOT NULL,
  `intEquipmentStatus` int(11) NOT NULL,
  `intRoomIdFK` int(10) unsigned NOT NULL,
  `intSupplierIdFK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`intEquipmentId`),
  KEY `tblequipment_intequipmentcategoryidfk_foreign` (`intEquipmentCategoryIdFK`),
  KEY `tblequipment_introomidfk_foreign` (`intRoomIdFK`),
  KEY `tblequipment_intsupplieridfk_foreign` (`intSupplierIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblEquipmentCategory`
--

CREATE TABLE IF NOT EXISTS `tblEquipmentCategory` (
  `intEquipmentCategoryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strEquipmentCatName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `txtEquipmentDesc` text COLLATE utf8_unicode_ci,
  `intStatus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intEquipmentCategoryId`),
  UNIQUE KEY `tblequipmentcategory_strequipmentcatname_unique` (`strEquipmentCatName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblEquipmentCategory`
--

INSERT INTO `tblEquipmentCategory` (`intEquipmentCategoryId`, `strEquipmentCatName`, `txtEquipmentDesc`, `intStatus`, `created_at`, `updated_at`) VALUES
(1, 'Equipment 1', NULL, 1, '2016-03-26 00:50:00', '2016-03-26 00:50:00'),
(2, 'Equipment 2', NULL, 1, '2016-03-26 00:50:00', '2016-03-26 00:50:00'),
(3, 'Equipment 3', NULL, 1, '2016-03-26 00:50:00', '2016-03-26 00:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblFee`
--

CREATE TABLE IF NOT EXISTS `tblFee` (
  `intFeeId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strFeeName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `txtFeeDesc` text COLLATE utf8_unicode_ci,
  `dblPrice` double NOT NULL,
  `intFeeTypeIdFK` int(10) unsigned NOT NULL,
  `intStatus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intFeeId`),
  UNIQUE KEY `tblfee_strfeename_unique` (`strFeeName`),
  KEY `tblfee_intfeetypeidfk_foreign` (`intFeeTypeIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblFeeType`
--

CREATE TABLE IF NOT EXISTS `tblFeeType` (
  `intFeeTypeId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strFeeTypeName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intStatus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intFeeTypeId`),
  UNIQUE KEY `tblfeetype_strfeetypename_unique` (`strFeeTypeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblFeeType`
--

INSERT INTO `tblFeeType` (`intFeeTypeId`, `strFeeTypeName`, `intStatus`, `created_at`, `updated_at`) VALUES
(1, 'Fee Type 1', 1, '2016-03-26 00:50:00', '2016-03-26 00:50:00'),
(2, 'Fee Type 2', 1, '2016-03-26 00:50:00', '2016-03-26 00:50:00'),
(3, 'Fee Type 3', 1, '2016-03-26 00:50:00', '2016-03-26 00:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblFloor`
--

CREATE TABLE IF NOT EXISTS `tblFloor` (
  `intFloorId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intBuildingIdFK` int(10) unsigned NOT NULL,
  `strFloorDesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`intFloorId`),
  KEY `tblfloor_intbuildingidfk_foreign` (`intBuildingIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblGenericName`
--

CREATE TABLE IF NOT EXISTS `tblGenericName` (
  `intGenericNameId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strGenericName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`intGenericNameId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblItem`
--

CREATE TABLE IF NOT EXISTS `tblItem` (
  `intItemId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strItemDesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intItemCategoryIdFK` int(10) unsigned NOT NULL,
  `intGenericNameIdFK` int(10) unsigned NOT NULL,
  `intDepartmentIdFK` int(10) unsigned NOT NULL,
  `intItemStatus` int(11) NOT NULL,
  PRIMARY KEY (`intItemId`),
  KEY `tblitem_intitemcategoryidfk_foreign` (`intItemCategoryIdFK`),
  KEY `tblitem_intgenericnameidfk_foreign` (`intGenericNameIdFK`),
  KEY `tblitem_intdepartmentidfk_foreign` (`intDepartmentIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblItemCategory`
--

CREATE TABLE IF NOT EXISTS `tblItemCategory` (
  `intItemCategoryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strItemCategoryDesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`intItemCategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblItemPrice`
--

CREATE TABLE IF NOT EXISTS `tblItemPrice` (
  `intItemPrice` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intItemIdFK` int(10) unsigned NOT NULL,
  `deciItemPrice` decimal(6,2) NOT NULL,
  `datAsOf` datetime NOT NULL,
  PRIMARY KEY (`intItemPrice`),
  KEY `tblitemprice_intitemidfk_foreign` (`intItemIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblNurseStation`
--

CREATE TABLE IF NOT EXISTS `tblNurseStation` (
  `intNurseStationId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intFloorIdFK` int(10) unsigned NOT NULL,
  `intFloorStatus` int(11) NOT NULL,
  PRIMARY KEY (`intNurseStationId`),
  KEY `tblnursestation_intflooridfk_foreign` (`intFloorIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblRoom`
--

CREATE TABLE IF NOT EXISTS `tblRoom` (
  `intRoomId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intRoomTypeIdFK` int(10) unsigned NOT NULL,
  `intRoomStatus` int(11) NOT NULL,
  `intFloorIdFK` int(10) unsigned NOT NULL,
  `intNurseStationIdFK` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`intRoomId`),
  KEY `tblroom_introomtypeidfk_foreign` (`intRoomTypeIdFK`),
  KEY `tblroom_intnursestationidfk_foreign` (`intNurseStationIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblRoomPrice`
--

CREATE TABLE IF NOT EXISTS `tblRoomPrice` (
  `intRoomPriceId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intRoomIdFK` int(10) unsigned NOT NULL,
  `deciRoomPrice` decimal(6,2) NOT NULL,
  `datAsOf` datetime NOT NULL,
  PRIMARY KEY (`intRoomPriceId`),
  KEY `tblroomprice_introomidfk_foreign` (`intRoomIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblRoomType`
--

CREATE TABLE IF NOT EXISTS `tblRoomType` (
  `intRoomTypeId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strRoomTypeDesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`intRoomTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblService`
--

CREATE TABLE IF NOT EXISTS `tblService` (
  `intServiceId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strServiceDesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intDepartmentIdFK` int(10) unsigned NOT NULL,
  `intServiceStatus` int(11) NOT NULL,
  PRIMARY KEY (`intServiceId`),
  KEY `tblservice_intdepartmentidfk_foreign` (`intDepartmentIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblServicePrice`
--

CREATE TABLE IF NOT EXISTS `tblServicePrice` (
  `intServicePriceId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intServiceIdFK` int(10) unsigned NOT NULL,
  `deciServicePrice` decimal(6,2) NOT NULL,
  `datAsOf` datetime NOT NULL,
  PRIMARY KEY (`intServicePriceId`),
  KEY `tblserviceprice_intserviceidfk_foreign` (`intServiceIdFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblSupplier`
--

CREATE TABLE IF NOT EXISTS `tblSupplier` (
  `intSupplierId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strSupplierName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `strSupplierAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSupplierContactNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intStatus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intSupplierId`),
  UNIQUE KEY `tblsupplier_strsuppliername_unique` (`strSupplierName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblAccount`
--
ALTER TABLE `tblAccount`
  ADD CONSTRAINT `tblaccount_intemployeeidfk_foreign` FOREIGN KEY (`intEmployeeIdFK`) REFERENCES `tblEmployee` (`intEmployeeId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblBed`
--
ALTER TABLE `tblBed`
  ADD CONSTRAINT `tblbed_introomidfk_foreign` FOREIGN KEY (`intRoomIdFK`) REFERENCES `tblRoom` (`intRoomId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblEmployee`
--
ALTER TABLE `tblEmployee`
  ADD CONSTRAINT `tblemployee_intemployeetypeidfk_foreign` FOREIGN KEY (`intEmployeeTypeIdFK`) REFERENCES `tblEmployeeType` (`intEmployeeTypeId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblEquipment`
--
ALTER TABLE `tblEquipment`
  ADD CONSTRAINT `tblequipment_intequipmentcategoryidfk_foreign` FOREIGN KEY (`intEquipmentCategoryIdFK`) REFERENCES `tblEquipmentCategory` (`intEquipmentCategoryId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblequipment_introomidfk_foreign` FOREIGN KEY (`intRoomIdFK`) REFERENCES `tblRoom` (`intRoomId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblequipment_intsupplieridfk_foreign` FOREIGN KEY (`intSupplierIdFK`) REFERENCES `tblSupplier` (`intSupplierId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblFee`
--
ALTER TABLE `tblFee`
  ADD CONSTRAINT `tblfee_intfeetypeidfk_foreign` FOREIGN KEY (`intFeeTypeIdFK`) REFERENCES `tblFeeType` (`intFeeTypeId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblFloor`
--
ALTER TABLE `tblFloor`
  ADD CONSTRAINT `tblfloor_intbuildingidfk_foreign` FOREIGN KEY (`intBuildingIdFK`) REFERENCES `tblBuilding` (`intBuildingId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblItem`
--
ALTER TABLE `tblItem`
  ADD CONSTRAINT `tblitem_intdepartmentidfk_foreign` FOREIGN KEY (`intDepartmentIdFK`) REFERENCES `tblDepartment` (`intDepartmentId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblitem_intgenericnameidfk_foreign` FOREIGN KEY (`intGenericNameIdFK`) REFERENCES `tblGenericName` (`intGenericNameId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblitem_intitemcategoryidfk_foreign` FOREIGN KEY (`intItemCategoryIdFK`) REFERENCES `tblItemCategory` (`intItemCategoryId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblItemPrice`
--
ALTER TABLE `tblItemPrice`
  ADD CONSTRAINT `tblitemprice_intitemidfk_foreign` FOREIGN KEY (`intItemIdFK`) REFERENCES `tblItem` (`intItemId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblNurseStation`
--
ALTER TABLE `tblNurseStation`
  ADD CONSTRAINT `tblnursestation_intflooridfk_foreign` FOREIGN KEY (`intFloorIdFK`) REFERENCES `tblFloor` (`intFloorId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblRoom`
--
ALTER TABLE `tblRoom`
  ADD CONSTRAINT `tblroom_intnursestationidfk_foreign` FOREIGN KEY (`intNurseStationIdFK`) REFERENCES `tblNurseStation` (`intNurseStationId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblroom_introomtypeidfk_foreign` FOREIGN KEY (`intRoomTypeIdFK`) REFERENCES `tblRoomType` (`intRoomTypeId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblRoomPrice`
--
ALTER TABLE `tblRoomPrice`
  ADD CONSTRAINT `tblroomprice_introomidfk_foreign` FOREIGN KEY (`intRoomIdFK`) REFERENCES `tblRoom` (`intRoomId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblService`
--
ALTER TABLE `tblService`
  ADD CONSTRAINT `tblservice_intdepartmentidfk_foreign` FOREIGN KEY (`intDepartmentIdFK`) REFERENCES `tblDepartment` (`intDepartmentId`) ON UPDATE CASCADE;

--
-- Constraints for table `tblServicePrice`
--
ALTER TABLE `tblServicePrice`
  ADD CONSTRAINT `tblserviceprice_intserviceidfk_foreign` FOREIGN KEY (`intServiceIdFK`) REFERENCES `tblService` (`intServiceId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;