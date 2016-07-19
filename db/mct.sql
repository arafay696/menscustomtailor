CREATE DATABASE  IF NOT EXISTS `mct` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mct`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: mct
-- ------------------------------------------------------
-- Server version	5.7.9

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ParentID` int(10) unsigned DEFAULT NULL,
  `Level` smallint(5) unsigned DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `UName` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Color` varchar(10) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcsotheritems`
--

DROP TABLE IF EXISTS `bcsotheritems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcsotheritems` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Email` varchar(30) DEFAULT NULL,
  `ItemID` int(10) unsigned DEFAULT NULL,
  `Price` double unsigned DEFAULT NULL,
  `Qty` int(10) unsigned DEFAULT NULL,
  `Total` double unsigned DEFAULT NULL,
  `Dat` datetime DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'N',
  `Details` varchar(255) DEFAULT NULL,
  `SessionID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcsotheritems`
--

LOCK TABLES `bcsotheritems` WRITE;
/*!40000 ALTER TABLE `bcsotheritems` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcsotheritems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcssize`
--

DROP TABLE IF EXISTS `bcssize`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcssize` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Email` varchar(30) DEFAULT NULL,
  `SizeOption` varchar(15) DEFAULT NULL,
  `HeightInches` varchar(15) DEFAULT NULL,
  `HeightFeet` varchar(15) DEFAULT NULL,
  `Weight` varchar(15) DEFAULT NULL,
  `NeckHeight` varchar(15) DEFAULT NULL,
  `NeckSize` varchar(15) DEFAULT NULL,
  `LeftSleeve` varchar(15) DEFAULT NULL,
  `RightSleeve` varchar(15) DEFAULT NULL,
  `Chest` varchar(15) DEFAULT NULL,
  `Waist` varchar(15) DEFAULT NULL,
  `Hips` varchar(15) DEFAULT NULL,
  `Yoke` varchar(15) DEFAULT NULL,
  `Tail` varchar(15) DEFAULT NULL,
  `LeftCuff` varchar(15) DEFAULT NULL,
  `RightCuff` varchar(15) DEFAULT NULL,
  `FittingOption` varchar(30) DEFAULT NULL,
  `Posture` varchar(30) DEFAULT NULL,
  `ChestDescription` varchar(30) DEFAULT NULL,
  `ArmType` varchar(30) DEFAULT NULL,
  `BodyShape` varchar(255) DEFAULT '',
  `BodyProportion` varchar(30) DEFAULT NULL,
  `ShoulderLine` varchar(30) DEFAULT NULL,
  `Shoulder` varchar(20) DEFAULT NULL,
  `ExtraShirtTail` varchar(10) DEFAULT NULL,
  `ShorterShirtTail` varchar(10) DEFAULT NULL,
  `FitAroundChestShoulder` varchar(20) DEFAULT NULL,
  `FitAroundWaist` varchar(30) DEFAULT NULL,
  `CoatSize` varchar(15) DEFAULT NULL,
  `PantSize` varchar(15) DEFAULT NULL,
  `Inseam` varchar(15) DEFAULT NULL,
  `Status` varchar(15) DEFAULT 'N',
  `Comments` varchar(1000) DEFAULT '',
  `Dat` datetime DEFAULT NULL,
  `SessionID` varchar(20) DEFAULT NULL,
  `DecideOn` varchar(50) DEFAULT '',
  `ShirtNeckSize` varchar(15) DEFAULT '',
  `MidSection` varchar(30) DEFAULT '',
  `BiggestChallenge` varchar(1000) DEFAULT '',
  `ShirtLength` varchar(100) DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UKSessionID` (`SessionID`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcssize`
--

LOCK TABLES `bcssize` WRITE;
/*!40000 ALTER TABLE `bcssize` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcssize` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat`
--

DROP TABLE IF EXISTS `cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Description` text,
  `FabDesc` text,
  `Pos` smallint(6) DEFAULT '0',
  `Pr` smallint(6) DEFAULT '1',
  `CatPrefix` varchar(1) DEFAULT '',
  `DealerPrice` double unsigned DEFAULT '0',
  `CustomerPrice` double unsigned DEFAULT '0',
  `TotalFabrics` int(10) unsigned DEFAULT '0',
  `Typ` varchar(20) DEFAULT 'Shirt',
  `Chaska` varchar(100) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat`
--

LOCK TABLES `cat` WRITE;
/*!40000 ALTER TABLE `cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` int(10) unsigned DEFAULT '0',
  `ParentID` int(10) unsigned DEFAULT '0',
  `Name` varchar(100) DEFAULT '' COMMENT 'Category Name',
  `ImagePath` varchar(255) DEFAULT '',
  `Title` varchar(255) DEFAULT NULL,
  `MetaKeywords` varchar(255) DEFAULT '',
  `MetaDescription` varchar(255) DEFAULT '',
  `HPContents` text,
  `URL` varchar(200) DEFAULT NULL,
  `Level` int(10) unsigned DEFAULT '0',
  `Typ` varchar(50) DEFAULT 'RTW',
  `Status` varchar(10) DEFAULT '' COMMENT 'Product Specialty-Male/Female/Childern',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Pos` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DealerCode` (`DealerCode`,`ParentID`,`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1 COMMENT='Table for General Categories';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `changes`
--

DROP TABLE IF EXISTS `changes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `changes` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` smallint(5) unsigned DEFAULT '0',
  `CustomerID` int(10) unsigned DEFAULT '0',
  `RequestBy` varchar(20) DEFAULT 'Dealer',
  `Comments` text,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(10) DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1335 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `changes`
--

LOCK TABLES `changes` WRITE;
/*!40000 ALTER TABLE `changes` DISABLE KEYS */;
/*!40000 ALTER TABLE `changes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charges`
--

DROP TABLE IF EXISTS `charges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charges` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` smallint(5) unsigned DEFAULT '0',
  `OrderID` int(10) unsigned DEFAULT '0',
  `VName` varchar(30) DEFAULT '',
  `Nam` varchar(100) DEFAULT '',
  `Description` varchar(255) DEFAULT '',
  `DealerPrice` double DEFAULT '0',
  `CustomerPrice` double DEFAULT '0',
  `Pos` smallint(5) unsigned DEFAULT '0',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UQ_Changes` (`OrderID`,`VName`)
) ENGINE=InnoDB AUTO_INCREMENT=25127 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charges`
--

LOCK TABLES `charges` WRITE;
/*!40000 ALTER TABLE `charges` DISABLE KEYS */;
/*!40000 ALTER TABLE `charges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Code` varchar(5) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupon` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CouponNo` varchar(30) DEFAULT '',
  `ExpiryDate` date DEFAULT NULL,
  `Amount` double unsigned DEFAULT NULL,
  `PCDisc` double unsigned DEFAULT '0',
  `Used` varchar(10) DEFAULT '',
  `UsedOrderNo` varchar(50) DEFAULT '',
  `Name` varchar(50) DEFAULT '',
  `Email` varchar(50) DEFAULT '',
  `SalesPerson` varchar(200) DEFAULT 'BCS',
  `Conditions` varchar(100) DEFAULT '',
  `Site` varchar(10) DEFAULT '1',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28634 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `cs`
--

DROP TABLE IF EXISTS `cs`;
/*!50001 DROP VIEW IF EXISTS `cs`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `cs` AS SELECT 
 1 AS `ID`,
 1 AS `WorkerID`,
 1 AS `OrderID`,
 1 AS `ShirtID`,
 1 AS `StatusID`,
 1 AS `Pos`,
 1 AS `Status`,
 1 AS `Comments`,
 1 AS `Date`,
 1 AS `Done`,
 1 AS `DateDone`,
 1 AS `Name`,
 1 AS `JobType`,
 1 AS `Description`,
 1 AS `SStatus`,
 1 AS `StatusText`,
 1 AS `CustomerStatus`,
 1 AS `OrderStatus`,
 1 AS `RelatedJob`,
 1 AS `FabricCode`,
 1 AS `FabricColor`,
 1 AS `FabricContents`,
 1 AS `Qty`,
 1 AS `Fit`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` smallint(5) unsigned DEFAULT '0',
  `Points` double unsigned DEFAULT '0',
  `FirstName` varchar(30) DEFAULT '',
  `MiddleName` varchar(20) DEFAULT '',
  `LastName` varchar(30) DEFAULT '',
  `Email` varchar(50) DEFAULT '',
  `Password` varchar(30) DEFAULT '',
  `Title` varchar(30) DEFAULT '',
  `Gender` varchar(20) DEFAULT 'Male',
  `HomePhone` varchar(30) DEFAULT '',
  `WorkPhone` varchar(30) DEFAULT '',
  `CellPhone` varchar(30) DEFAULT '',
  `Fax` varchar(30) DEFAULT '',
  `BestTime` varchar(100) DEFAULT '',
  `Address` varchar(255) DEFAULT '',
  `City` varchar(30) DEFAULT '',
  `State` varchar(30) DEFAULT '',
  `ZipCode` varchar(20) DEFAULT '',
  `Country` varchar(30) DEFAULT '',
  `Profession` varchar(50) DEFAULT '',
  `Company` varchar(50) DEFAULT '',
  `HearAboutUs` varchar(30) DEFAULT '',
  `Domain` varchar(50) DEFAULT '',
  `Keyword` varchar(200) DEFAULT '',
  `URL` varchar(255) DEFAULT '',
  `BCS` varchar(2) DEFAULT '',
  `Comments` text,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(10) DEFAULT 'N',
  `News` varchar(10) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6755 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customersize`
--

DROP TABLE IF EXISTS `customersize`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customersize` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CustomerID` int(10) unsigned DEFAULT '0',
  `SizeOption` tinyint(3) unsigned DEFAULT '0',
  `NeckHeight` varchar(20) DEFAULT '',
  `NeckSize` varchar(15) DEFAULT '',
  `LeftSleeve` varchar(15) DEFAULT '',
  `RightSleeve` varchar(15) DEFAULT '',
  `Chest` varchar(15) DEFAULT '',
  `Waist` varchar(15) DEFAULT '',
  `Hips` varchar(15) DEFAULT '',
  `Yoke` varchar(15) DEFAULT '',
  `Tail` varchar(15) DEFAULT '',
  `LeftCuff` varchar(15) DEFAULT '',
  `RightCuff` varchar(15) DEFAULT '',
  `HeightFeet` varchar(15) DEFAULT '',
  `HeightInches` varchar(15) DEFAULT '',
  `Weight` varchar(15) DEFAULT '',
  `Posture` varchar(20) DEFAULT '',
  `ChestDescription` varchar(30) DEFAULT '',
  `ArmType` varchar(30) DEFAULT '',
  `BodyShape` varchar(30) DEFAULT '',
  `BodyProportion` varchar(40) DEFAULT '',
  `FittingOption` varchar(30) DEFAULT '',
  `Shoulder` varchar(20) DEFAULT '',
  `ShoulderLine` varchar(20) DEFAULT '',
  `ExtraShirtTail` varchar(20) DEFAULT '',
  `ShorterShirtTail` varchar(30) DEFAULT '',
  `FitAroundChestShoulder` varchar(30) DEFAULT '',
  `FitAroundWaist` varchar(15) DEFAULT '',
  `CoatSize` varchar(15) DEFAULT '',
  `PantSize` varchar(15) DEFAULT '',
  `Inseam` varchar(15) DEFAULT '',
  `OutSeam` varchar(15) DEFAULT '',
  `ShoeSize` varchar(15) DEFAULT '',
  `ThighShape` varchar(20) DEFAULT '',
  `SeatShape` varchar(20) DEFAULT '',
  `WearPants` varchar(20) DEFAULT '',
  `Rise` varchar(20) DEFAULT '',
  `PantRise` varchar(45) DEFAULT '',
  `ShirtLength` varchar(20) DEFAULT '',
  `Comments` text,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(10) DEFAULT '',
  `GeneralRemarks` text,
  `PantWaist` varchar(20) DEFAULT '',
  `Thigh` varchar(15) DEFAULT '',
  `PantHips` varchar(20) DEFAULT '',
  `Bottom` varchar(20) DEFAULT '',
  `BottomPleated` varchar(20) DEFAULT '',
  `Knee` varchar(20) DEFAULT '',
  `KneePleated` varchar(20) DEFAULT '',
  `FitWaist` varchar(20) DEFAULT '',
  `FitThigh` varchar(20) DEFAULT '',
  `FitSeat` varchar(20) DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CustomerID` (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=3417 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customersize`
--

LOCK TABLES `customersize` WRITE;
/*!40000 ALTER TABLE `customersize` DISABLE KEYS */;
/*!40000 ALTER TABLE `customersize` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dealers`
--

DROP TABLE IF EXISTS `dealers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dealers` (
  `Code` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `CSSID` int(10) unsigned DEFAULT '0',
  `ShortCode` varchar(10) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `MiddleName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `HomePhone` varchar(20) DEFAULT NULL,
  `WorkPhone` varchar(20) DEFAULT NULL,
  `CellPhone` varchar(20) DEFAULT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `BestTime` varchar(30) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  `ZipCode` varchar(12) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `Profession` varchar(30) DEFAULT NULL,
  `Company` varchar(50) DEFAULT NULL,
  `Logo` varchar(30) DEFAULT NULL,
  `LogoBg` varchar(30) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `Dat` datetime DEFAULT NULL,
  `Comments` text,
  `Status` varchar(10) DEFAULT 'N',
  `Potential` varchar(30) DEFAULT '',
  `ContactDate` date DEFAULT NULL,
  `WebExDate` date DEFAULT NULL,
  `TrialShirtDate` date DEFAULT NULL,
  `TrialShirtReleaseDate` date DEFAULT NULL,
  `TrialShirtShipDate` date DEFAULT NULL,
  `TrialShirtReceiveDate` date DEFAULT NULL,
  `WebSiteDevelopment` text,
  `TPConversation` text,
  `CreditRating` text,
  `SwatchLineRequestDate` date DEFAULT NULL,
  `SwatchLineShipDate` date DEFAULT NULL,
  PRIMARY KEY (`Code`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dealers`
--

LOCK TABLES `dealers` WRITE;
/*!40000 ALTER TABLE `dealers` DISABLE KEYS */;
/*!40000 ALTER TABLE `dealers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dhlshipment`
--

DROP TABLE IF EXISTS `dhlshipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dhlshipment` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ShipDate` date DEFAULT NULL,
  `Weight` varchar(20) DEFAULT NULL,
  `Items` int(10) unsigned DEFAULT '1',
  `UnitPrice` double unsigned DEFAULT '0',
  `SName` varchar(30) DEFAULT '',
  `OrderNo` varchar(30) DEFAULT '',
  `TrackingNo` varchar(50) DEFAULT '',
  `SPhone` varchar(30) DEFAULT '',
  `SCompany` varchar(30) DEFAULT '',
  `SAddress1` varchar(30) DEFAULT '',
  `SAddress2` varchar(30) DEFAULT '',
  `SAddress3` varchar(30) DEFAULT '',
  `SCity` varchar(30) DEFAULT '',
  `SCountry` varchar(30) DEFAULT '',
  `SCountryCode` varchar(30) DEFAULT '',
  `SPostCode` varchar(30) DEFAULT '',
  `RName` varchar(100) DEFAULT '',
  `RPhone` varchar(30) DEFAULT '',
  `RCompany` varchar(30) DEFAULT '',
  `RAddress1` varchar(30) DEFAULT '',
  `RAddress2` varchar(30) DEFAULT '',
  `RAddress3` varchar(30) DEFAULT '',
  `RCity` varchar(30) DEFAULT '',
  `RCountry` varchar(30) DEFAULT '',
  `RCountryCode` varchar(30) DEFAULT '',
  `RPostCode` varchar(30) DEFAULT '',
  `Status` varchar(10) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4377 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dhlshipment`
--

LOCK TABLES `dhlshipment` WRITE;
/*!40000 ALTER TABLE `dhlshipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `dhlshipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discounts` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` int(10) unsigned DEFAULT '0',
  `Name` varchar(40) DEFAULT '',
  `Email` varchar(50) DEFAULT '',
  `RecName` varchar(50) DEFAULT '',
  `RecEmail` varchar(50) DEFAULT '',
  `Amount` double unsigned DEFAULT '0',
  `Paid` double unsigned DEFAULT '0',
  `OrderID` int(10) unsigned DEFAULT '0',
  `UsedOrderID` int(10) unsigned DEFAULT '0',
  `Used` varchar(1) DEFAULT '',
  `DescUsed` varchar(255) DEFAULT '',
  `Self` varchar(1) DEFAULT '',
  `Typ` varchar(50) DEFAULT '',
  `DiscountCode` varchar(20) DEFAULT '',
  `Status` varchar(10) DEFAULT 'N',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DiscountCode` (`DiscountCode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emaillist`
--

DROP TABLE IF EXISTS `emaillist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emaillist` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) DEFAULT '',
  `LastName` varchar(50) DEFAULT '',
  `Email` varchar(100) DEFAULT '',
  `Name` varchar(100) DEFAULT '',
  `Type` varchar(20) DEFAULT '',
  `VRFY` bit(1) DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'N',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Variables` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emaillist`
--

LOCK TABLES `emaillist` WRITE;
/*!40000 ALTER TABLE `emaillist` DISABLE KEYS */;
/*!40000 ALTER TABLE `emaillist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fab`
--

DROP TABLE IF EXISTS `fab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fab` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CatID1` smallint(5) unsigned DEFAULT '0',
  `CatID2` smallint(5) unsigned DEFAULT '0',
  `CatID3` smallint(5) unsigned DEFAULT '0',
  `CatID4` smallint(6) DEFAULT '0',
  `DatID1` tinyint(4) DEFAULT '0',
  `DatID2` tinyint(4) DEFAULT '0',
  `DatID3` tinyint(4) DEFAULT '0',
  `DatID4` smallint(6) DEFAULT '0',
  `Code` varchar(20) DEFAULT '',
  `Color` varchar(30) DEFAULT '',
  `SearchColor` varchar(100) DEFAULT '',
  `Pattern` varchar(200) DEFAULT '',
  `Description` text,
  `DealerDescription` text,
  `Width` varchar(10) DEFAULT '',
  `Status` varchar(10) DEFAULT 'N',
  `Pos` smallint(5) unsigned DEFAULT '0',
  `BcsPos` smallint(5) unsigned DEFAULT '0',
  `Qty` int(11) DEFAULT '0',
  `QtyInches` smallint(6) DEFAULT '0',
  `DQty` smallint(5) unsigned DEFAULT '0',
  `DQtyInches` tinyint(3) unsigned DEFAULT '0',
  `OrigQty` int(10) unsigned DEFAULT '0',
  `OrigInches` smallint(5) unsigned DEFAULT '0',
  `ShirtsReserved` smallint(5) unsigned DEFAULT '0',
  `Basic` varchar(1) DEFAULT '',
  `BCS` varchar(1) DEFAULT 'Y',
  `Dealer` varchar(1) DEFAULT '',
  `Dress` varchar(1) DEFAULT '',
  `Casual` varchar(1) DEFAULT '',
  `Sport` varchar(1) DEFAULT '',
  `Tuxedo` varchar(1) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `StatusDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Cool` varchar(10) DEFAULT '',
  `Warm` varchar(10) DEFAULT '',
  `MatchingPants` varchar(100) DEFAULT '',
  `GoodFor` varchar(100) DEFAULT '',
  `MatchingJacket` varchar(100) DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=5905 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fab`
--

LOCK TABLES `fab` WRITE;
/*!40000 ALTER TABLE `fab` DISABLE KEYS */;
/*!40000 ALTER TABLE `fab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fab2`
--

DROP TABLE IF EXISTS `fab2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fab2` (
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `CatID1` smallint(5) unsigned DEFAULT '0',
  `CatID2` smallint(5) unsigned DEFAULT '0',
  `CatID3` smallint(5) unsigned DEFAULT '0',
  `CatID4` smallint(6) DEFAULT '0',
  `DatID1` tinyint(4) DEFAULT '0',
  `DatID2` tinyint(4) DEFAULT '0',
  `DatID3` tinyint(4) DEFAULT '0',
  `DatID4` smallint(6) DEFAULT '0',
  `Code` varchar(20) DEFAULT '',
  `Color` varchar(30) DEFAULT '',
  `SearchColor` varchar(100) DEFAULT '',
  `Pattern` varchar(30) DEFAULT '',
  `Description` text,
  `DealerDescription` text,
  `Width` varchar(10) DEFAULT '',
  `Status` varchar(10) DEFAULT 'N',
  `Pos` smallint(5) unsigned DEFAULT '0',
  `BcsPos` smallint(5) unsigned DEFAULT '0',
  `Qty` int(10) unsigned DEFAULT '0',
  `QtyInches` smallint(5) unsigned DEFAULT '0',
  `DQty` smallint(5) unsigned DEFAULT '0',
  `DQtyInches` tinyint(3) unsigned DEFAULT '0',
  `OrigQty` int(10) unsigned DEFAULT '0',
  `OrigInches` smallint(5) unsigned DEFAULT '0',
  `ShirtsReserved` smallint(5) unsigned DEFAULT '0',
  `Basic` varchar(1) DEFAULT '',
  `BCS` varchar(1) DEFAULT 'Y',
  `Dealer` varchar(1) DEFAULT '',
  `Dress` varchar(1) DEFAULT '',
  `Casual` varchar(1) DEFAULT '',
  `Sport` varchar(1) DEFAULT '',
  `Tuxedo` varchar(1) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `StatusDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Cool` varchar(10) DEFAULT '',
  `Warm` varchar(10) DEFAULT '',
  `MatchingPants` varchar(100) DEFAULT '',
  `GoodFor` varchar(100) DEFAULT '',
  `MatchingJacket` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fab2`
--

LOCK TABLES `fab2` WRITE;
/*!40000 ALTER TABLE `fab2` DISABLE KEYS */;
/*!40000 ALTER TABLE `fab2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fabgambert`
--

DROP TABLE IF EXISTS `fabgambert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fabgambert` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Code` varchar(30) DEFAULT '',
  `Description` varchar(255) DEFAULT '',
  `Pattern` varchar(100) DEFAULT '',
  `Color` varchar(100) DEFAULT '',
  `Status` varchar(10) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabgambert`
--

LOCK TABLES `fabgambert` WRITE;
/*!40000 ALTER TABLE `fabgambert` DISABLE KEYS */;
/*!40000 ALTER TABLE `fabgambert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fabprice`
--

DROP TABLE IF EXISTS `fabprice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fabprice` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CatID` int(10) unsigned DEFAULT '0',
  `FabID` int(10) unsigned DEFAULT '0',
  `Price` double unsigned DEFAULT '0',
  `Pos` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `FP` (`CatID`,`FabID`)
) ENGINE=InnoDB AUTO_INCREMENT=1915 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabprice`
--

LOCK TABLES `fabprice` WRITE;
/*!40000 ALTER TABLE `fabprice` DISABLE KEYS */;
/*!40000 ALTER TABLE `fabprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fabtrans`
--

DROP TABLE IF EXISTS `fabtrans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fabtrans` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FabID` int(10) unsigned DEFAULT '0',
  `OrderNo` varchar(30) DEFAULT '',
  `Shirts` int(10) unsigned DEFAULT '0',
  `ShirtID` int(10) unsigned DEFAULT '0',
  `Qty` int(10) unsigned DEFAULT '0',
  `QtyInch` int(10) unsigned DEFAULT '0',
  `QtyBal` int(11) DEFAULT '0',
  `QtyInchBal` int(11) DEFAULT '0',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comments` varchar(255) DEFAULT '',
  `VendorName` varchar(30) DEFAULT '',
  `Status` char(1) DEFAULT 'O',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=71082 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabtrans`
--

LOCK TABLES `fabtrans` WRITE;
/*!40000 ALTER TABLE `fabtrans` DISABLE KEYS */;
/*!40000 ALTER TABLE `fabtrans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fabtransaction`
--

DROP TABLE IF EXISTS `fabtransaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fabtransaction` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FabID` int(10) unsigned DEFAULT NULL,
  `OrderID` int(10) unsigned DEFAULT NULL,
  `ShirtID` int(10) unsigned DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Inch` double DEFAULT NULL,
  `Dat` datetime DEFAULT NULL,
  `Comments` text,
  `Status` varchar(5) DEFAULT NULL,
  `VendorName` varchar(30) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabtransaction`
--

LOCK TABLES `fabtransaction` WRITE;
/*!40000 ALTER TABLE `fabtransaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `fabtransaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fit`
--

DROP TABLE IF EXISTS `fit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fit` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(10) unsigned DEFAULT '0',
  `RefID` int(10) unsigned DEFAULT '0',
  `RefTable` varchar(30) DEFAULT '',
  `FitStatus` varchar(30) DEFAULT '',
  `ShipDate` datetime DEFAULT NULL,
  `FitOKDate` datetime DEFAULT NULL,
  `ActionTaken` varchar(255) DEFAULT '',
  `SalesPerson` varchar(50) DEFAULT '',
  `Comments` varchar(1000) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UQ_Fit` (`OrderID`,`RefID`,`RefTable`)
) ENGINE=InnoDB AUTO_INCREMENT=1619 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fit`
--

LOCK TABLES `fit` WRITE;
/*!40000 ALTER TABLE `fit` DISABLE KEYS */;
/*!40000 ALTER TABLE `fit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` smallint(5) unsigned DEFAULT '0',
  `RefID` int(10) unsigned DEFAULT '0',
  `RefTable` varchar(100) DEFAULT '',
  `Name` varchar(255) DEFAULT '',
  `Alt` varchar(1000) DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'N',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3880 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventoryitemin`
--

DROP TABLE IF EXISTS `inventoryitemin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventoryitemin` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IItemID` int(10) unsigned DEFAULT '0',
  `VendorID` int(10) unsigned DEFAULT '0',
  `Qty` double unsigned DEFAULT '0',
  `Price` double unsigned DEFAULT '0',
  `Paid` double unsigned DEFAULT '0',
  `PaymentMode` varchar(50) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryitemin`
--

LOCK TABLES `inventoryitemin` WRITE;
/*!40000 ALTER TABLE `inventoryitemin` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventoryitemin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventoryitemout`
--

DROP TABLE IF EXISTS `inventoryitemout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventoryitemout` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IItemID` int(10) unsigned DEFAULT '0',
  `OrderNo` varchar(50) DEFAULT '',
  `RefTable` varchar(50) DEFAULT 'ShirtDetail',
  `RefID` int(10) unsigned DEFAULT '0',
  `Qty` int(10) unsigned DEFAULT '0',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=283 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryitemout`
--

LOCK TABLES `inventoryitemout` WRITE;
/*!40000 ALTER TABLE `inventoryitemout` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventoryitemout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logpantdetail`
--

DROP TABLE IF EXISTS `logpantdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logpantdetail` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PantID` int(10) unsigned DEFAULT '0',
  `OrderID` int(10) unsigned DEFAULT '0',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Body` text,
  `ChangeBy` varchar(30) DEFAULT 'Main Admin',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2002 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logpantdetail`
--

LOCK TABLES `logpantdetail` WRITE;
/*!40000 ALTER TABLE `logpantdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `logpantdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logshirtdetail`
--

DROP TABLE IF EXISTS `logshirtdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logshirtdetail` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ShirtID` int(10) unsigned DEFAULT NULL,
  `OrderID` int(10) unsigned DEFAULT NULL,
  `Dat` datetime DEFAULT NULL,
  `Body` text,
  `ChangeBy` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2369 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logshirtdetail`
--

LOCK TABLES `logshirtdetail` WRITE;
/*!40000 ALTER TABLE `logshirtdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `logshirtdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logsize`
--

DROP TABLE IF EXISTS `logsize`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logsize` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CustomerID` int(10) unsigned DEFAULT NULL,
  `Dat` datetime DEFAULT NULL,
  `Body` text,
  `ChangeBy` varchar(30) DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7274 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logsize`
--

LOCK TABLES `logsize` WRITE;
/*!40000 ALTER TABLE `logsize` DISABLE KEYS */;
/*!40000 ALTER TABLE `logsize` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturer` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` smallint(5) unsigned DEFAULT '0',
  `RefID` int(10) unsigned DEFAULT '0',
  `RefTable` varchar(100) DEFAULT '',
  `Name` varchar(50) DEFAULT NULL,
  `Alt` varchar(1000) DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'N',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(10) unsigned DEFAULT '0',
  `RefID` int(10) unsigned DEFAULT '0',
  `RefTable` varchar(100) DEFAULT '',
  `Name` varchar(100) DEFAULT '',
  `Description` varchar(1000) DEFAULT NULL,
  `Qty` smallint(5) unsigned DEFAULT '0',
  `DealerPrice` double unsigned DEFAULT '0',
  `CustomerPrice` double unsigned DEFAULT '0',
  `DealerExtraCharges` double unsigned DEFAULT '0',
  `CustomerExtraCharges` double unsigned DEFAULT '0',
  `DealerTotal` double unsigned DEFAULT '0',
  `CustomerTotal` double unsigned DEFAULT '0',
  `ImagePath` varchar(200) DEFAULT '',
  `DealerSubmitted` varchar(10) DEFAULT '',
  `DealerSubmitDate` datetime DEFAULT NULL,
  `TransferToLevel1` smallint(5) unsigned DEFAULT '0',
  `Level1TransferDate` datetime DEFAULT NULL,
  `Level1TentitiveDate` datetime DEFAULT NULL,
  `Level1PromiseDate` datetime DEFAULT NULL,
  `Level1Ship` tinyint(3) unsigned DEFAULT '0',
  `Level1ShipDate` datetime DEFAULT NULL,
  `Level1Carrier` varchar(30) DEFAULT '',
  `Level1TrackingNumber` varchar(50) DEFAULT '',
  `TransferToProd` smallint(5) unsigned DEFAULT '0',
  `ProdTransferDate` datetime DEFAULT NULL,
  `ProdShip` tinyint(3) unsigned DEFAULT '0',
  `ProdShipDate` datetime DEFAULT NULL,
  `DealerShip` tinyint(3) unsigned DEFAULT '0',
  `DealerShipDate` datetime DEFAULT NULL,
  `DealerCarrier` varchar(30) DEFAULT 'USPS',
  `DealerTrackingNumber` varchar(50) DEFAULT '',
  `CustomerShip` tinyint(3) unsigned DEFAULT '0',
  `CustomerShipDate` datetime DEFAULT NULL,
  `CustomerCarrier` varchar(30) DEFAULT 'USPS',
  `CustomerTrackingNumber` varchar(50) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `StatusID` smallint(5) unsigned DEFAULT '0',
  `Status` varchar(10) DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=69171 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items_options`
--

DROP TABLE IF EXISTS `order_items_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items_options` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(10) unsigned DEFAULT '0',
  `Order_Item_ID` int(10) unsigned DEFAULT '0',
  `Product_Options_ID` int(11) DEFAULT '0',
  `Label` varchar(1000) DEFAULT '',
  `Value` varchar(255) DEFAULT '',
  `DealerPrice` double unsigned DEFAULT '0',
  `CustomerPrice` double unsigned DEFAULT '0',
  `Pos` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3929 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items_options`
--

LOCK TABLES `order_items_options` WRITE;
/*!40000 ALTER TABLE `order_items_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` smallint(5) unsigned DEFAULT '0',
  `CustomerID` int(10) unsigned DEFAULT '0',
  `Code` int(10) unsigned DEFAULT '0',
  `SizeID` int(10) unsigned DEFAULT '0',
  `Items` int(10) unsigned DEFAULT '0',
  `TotalShirts` smallint(5) unsigned DEFAULT '0',
  `OtherItems` smallint(5) unsigned DEFAULT '0',
  `OrderType` varchar(30) DEFAULT '',
  `CustomerAmount` double DEFAULT '0',
  `DealerAmount` double DEFAULT '0',
  `CustomerPaid` double DEFAULT '0',
  `DealerPaid` double DEFAULT '0',
  `Description` text,
  `StatusText` text,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `OrderSubmitted` varchar(5) DEFAULT '',
  `OrderSubmitDate` datetime DEFAULT NULL,
  `CustomerPromiseDate` date DEFAULT NULL,
  `DealerPromiseDate` date DEFAULT NULL,
  `CustomerDeliveryDate` datetime DEFAULT NULL,
  `DealerDeliveryDate` datetime DEFAULT NULL,
  `CustomerTentitiveShipDate` date DEFAULT NULL,
  `DealerTentitiveShipDate` datetime DEFAULT NULL,
  `CustomerShipDate` datetime DEFAULT NULL,
  `DealerShipDate` datetime DEFAULT NULL,
  `CustomerTrackingNo` varchar(30) DEFAULT '',
  `DealerTrackingNo` varchar(30) DEFAULT '',
  `MustShip` varchar(5) DEFAULT '',
  `ShipDirect` varchar(5) DEFAULT '',
  `TransferTo` int(10) unsigned DEFAULT '0',
  `CustomerStatus` varchar(20) DEFAULT '',
  `DealerStatus` varchar(20) DEFAULT '',
  `Status` varchar(20) DEFAULT '',
  `StatusID` int(10) unsigned DEFAULT '0',
  `Comments` text,
  `Name` varchar(30) DEFAULT NULL,
  `Phone` varchar(30) DEFAULT NULL,
  `Address` varchar(255) DEFAULT '',
  `City` varchar(50) DEFAULT '',
  `State` varchar(30) DEFAULT '',
  `ZipCode` varchar(10) DEFAULT '',
  `Country` varchar(50) DEFAULT '',
  `OldOrderNo` varchar(100) DEFAULT '',
  `ShipMethod` varchar(100) DEFAULT '',
  `SalesPerson` varchar(30) DEFAULT '',
  `SalesPersonComments` varchar(1000) DEFAULT '',
  `ActionTaken` varchar(255) DEFAULT '',
  `ActionTaken2` varchar(255) DEFAULT '',
  `CallDate` date DEFAULT NULL,
  `ReOrder` char(1) DEFAULT '',
  `OrderPlaced` varchar(200) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14982 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pantdetail`
--

DROP TABLE IF EXISTS `pantdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pantdetail` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(10) unsigned DEFAULT '0',
  `FabricCode` varchar(20) DEFAULT '',
  `FabricColor` varchar(50) DEFAULT '',
  `FabricContents` varchar(200) DEFAULT '',
  `DealerPrice` double DEFAULT '0',
  `CustomerPrice` double DEFAULT '0',
  `Qty` smallint(5) unsigned DEFAULT '1',
  `PleatStyle` varchar(50) DEFAULT '',
  `CuffStyle` varchar(50) DEFAULT '',
  `CuffWidth` varchar(50) DEFAULT '',
  `BeltLoops` varchar(50) DEFAULT '',
  `SidePocket` varchar(50) DEFAULT '',
  `BackPockets` varchar(50) DEFAULT '',
  `FitOption` varchar(50) DEFAULT '',
  `Comments` text,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(10) DEFAULT 'N',
  `StatusID` smallint(5) unsigned DEFAULT '0',
  `Fit` varchar(30) DEFAULT '',
  `LinedToKnee` varchar(30) DEFAULT NULL,
  `SuspenderButtons` varchar(30) DEFAULT NULL,
  `AdjustableWaistband` varchar(5) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=55786 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pantdetail`
--

LOCK TABLES `pantdetail` WRITE;
/*!40000 ALTER TABLE `pantdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `pantdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pantshistory`
--

DROP TABLE IF EXISTS `pantshistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pantshistory` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(10) unsigned DEFAULT '0',
  `PantID` int(10) unsigned DEFAULT '0',
  `WorkerID` int(10) unsigned DEFAULT '0',
  `StatusID` int(10) unsigned DEFAULT '0',
  `Status` varchar(10) DEFAULT 'OK',
  `Comments` varchar(255) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Done` varchar(3) DEFAULT '',
  `DateDone` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `PantID` (`PantID`,`StatusID`,`Status`)
) ENGINE=InnoDB AUTO_INCREMENT=36422 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pantshistory`
--

LOCK TABLES `pantshistory` WRITE;
/*!40000 ALTER TABLE `pantshistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `pantshistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pantstatus`
--

DROP TABLE IF EXISTS `pantstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pantstatus` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Status` varchar(50) DEFAULT '',
  `Description` varchar(255) DEFAULT '',
  `RelatedJob` varchar(50) DEFAULT '0',
  `Pos` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pantstatus`
--

LOCK TABLES `pantstatus` WRITE;
/*!40000 ALTER TABLE `pantstatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `pantstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pantworkers`
--

DROP TABLE IF EXISTS `pantworkers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pantworkers` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `JobType` varchar(30) DEFAULT '',
  `Name` varchar(30) DEFAULT '',
  `Description` varchar(255) DEFAULT '',
  `Status` varchar(10) DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pantworkers`
--

LOCK TABLES `pantworkers` WRITE;
/*!40000 ALTER TABLE `pantworkers` DISABLE KEYS */;
/*!40000 ALTER TABLE `pantworkers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcs`
--

DROP TABLE IF EXISTS `pcs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcs` (
  `ID` int(11) DEFAULT NULL,
  `WorkerID` int(11) DEFAULT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `PantID` int(11) DEFAULT NULL,
  `StatusID` int(11) DEFAULT NULL,
  `Pos` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Comments` int(11) DEFAULT NULL,
  `Date` int(11) DEFAULT NULL,
  `Done` int(11) DEFAULT NULL,
  `DateDone` int(11) DEFAULT NULL,
  `Name` int(11) DEFAULT NULL,
  `JobType` int(11) DEFAULT NULL,
  `Description` int(11) DEFAULT NULL,
  `PStatus` int(11) DEFAULT NULL,
  `RelatedJob` int(11) DEFAULT NULL,
  `FabricCode` int(11) DEFAULT NULL,
  `FabricColor` int(11) DEFAULT NULL,
  `FabricContents` int(11) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Fit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcs`
--

LOCK TABLES `pcs` WRITE;
/*!40000 ALTER TABLE `pcs` DISABLE KEYS */;
/*!40000 ALTER TABLE `pcs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` smallint(5) unsigned DEFAULT '0',
  `CategoryID` int(10) unsigned DEFAULT '0',
  `ManufacturerID` int(10) unsigned DEFAULT '0',
  `Name` varchar(100) DEFAULT '',
  `ProductCode` varchar(100) DEFAULT '',
  `Brand` varchar(200) DEFAULT '',
  `Color` varchar(100) DEFAULT '',
  `Description` text,
  `XMLDescription` text,
  `DealerActualPrice` double unsigned DEFAULT '0',
  `CustomerActualPrice` double unsigned DEFAULT '0',
  `DealerPrice` double unsigned DEFAULT '0',
  `CustomerPrice` double unsigned DEFAULT '0',
  `QtyAvailable` mediumint(9) DEFAULT '-1',
  `QtySold` mediumint(8) unsigned DEFAULT '0',
  `Weight` double(7,3) unsigned DEFAULT '0.100',
  `Views` int(10) unsigned DEFAULT '0',
  `Clicks` int(10) unsigned DEFAULT '0',
  `DefImgID` int(10) unsigned DEFAULT '0',
  `Rank` int(10) unsigned DEFAULT '0',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DateAvailable` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Expiry` varchar(10) DEFAULT '',
  `ExpiryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(10) DEFAULT 'N',
  `StatusID` tinyint(4) DEFAULT '0',
  `Pos` smallint(6) DEFAULT '0',
  `Title` varchar(80) DEFAULT '',
  `MetaKeywords` varchar(150) DEFAULT NULL,
  `MetaDescription` varchar(200) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1193 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_options`
--

DROP TABLE IF EXISTS `products_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_options` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProductID` int(10) unsigned DEFAULT '0',
  `CategoryID` int(10) unsigned DEFAULT '0',
  `GroupID` int(10) unsigned DEFAULT '0',
  `Type` varchar(50) DEFAULT '',
  `Label` varchar(1000) DEFAULT '',
  `Pos` tinyint(3) unsigned DEFAULT '0',
  `Properties` varchar(100) DEFAULT '',
  `ExtraParameters` varchar(100) DEFAULT '',
  `Status` varchar(10) DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17865 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_options`
--

LOCK TABLES `products_options` WRITE;
/*!40000 ALTER TABLE `products_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_options_groups`
--

DROP TABLE IF EXISTS `products_options_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_options_groups` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CategoryID` int(10) unsigned DEFAULT '0',
  `Label` varchar(255) DEFAULT '',
  `Description` varchar(1000) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_options_groups`
--

LOCK TABLES `products_options_groups` WRITE;
/*!40000 ALTER TABLE `products_options_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_options_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_options_values`
--

DROP TABLE IF EXISTS `products_options_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_options_values` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OptionID` int(10) unsigned DEFAULT '0',
  `Label` varchar(2000) DEFAULT '',
  `DealerPrice` double unsigned DEFAULT '0',
  `CustomerPrice` double unsigned DEFAULT '0',
  `Def` varchar(30) DEFAULT '',
  `Pos` tinyint(3) unsigned DEFAULT '0',
  `Qty` int(11) DEFAULT '-1',
  `DefImgID` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=67485 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_options_values`
--

LOCK TABLES `products_options_values` WRITE;
/*!40000 ALTER TABLE `products_options_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_options_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productshistory`
--

DROP TABLE IF EXISTS `productshistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productshistory` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) DEFAULT '0',
  `ItemID` int(11) DEFAULT '0',
  `WorkerID` int(11) DEFAULT '0',
  `StatusID` int(11) DEFAULT '0',
  `Status` varchar(10) DEFAULT 'OK',
  `Comments` varchar(255) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Done` varchar(10) DEFAULT 'Y',
  `DateDone` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4019 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productshistory`
--

LOCK TABLES `productshistory` WRITE;
/*!40000 ALTER TABLE `productshistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `productshistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productstatus`
--

DROP TABLE IF EXISTS `productstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productstatus` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Status` varchar(100) DEFAULT '',
  `Description` varchar(255) DEFAULT '',
  `RelatedJob` varchar(100) DEFAULT '',
  `Pos` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productstatus`
--

LOCK TABLES `productstatus` WRITE;
/*!40000 ALTER TABLE `productstatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `productstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relatedproducts`
--

DROP TABLE IF EXISTS `relatedproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relatedproducts` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProductID1` int(10) unsigned DEFAULT '0',
  `ProductID2` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=970 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relatedproducts`
--

LOCK TABLES `relatedproducts` WRITE;
/*!40000 ALTER TABLE `relatedproducts` DISABLE KEYS */;
/*!40000 ALTER TABLE `relatedproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saveforlater`
--

DROP TABLE IF EXISTS `saveforlater`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saveforlater` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DealerCode` int(10) unsigned DEFAULT '0',
  `Name` varchar(40) DEFAULT '',
  `Email` varchar(50) DEFAULT '',
  `Phone` varchar(30) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Statements` text,
  `Status` varchar(10) DEFAULT 'N',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UK` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=13099 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saveforlater`
--

LOCK TABLES `saveforlater` WRITE;
/*!40000 ALTER TABLE `saveforlater` DISABLE KEYS */;
/*!40000 ALTER TABLE `saveforlater` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipment`
--

DROP TABLE IF EXISTS `shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipment` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ShipBy` varchar(30) DEFAULT '',
  `ShipTo` varchar(30) DEFAULT '',
  `ShipToDealerCode` smallint(5) unsigned DEFAULT '0',
  `Name` varchar(50) DEFAULT '',
  `Description` varchar(255) DEFAULT '',
  `SName` varchar(30) DEFAULT '',
  `SAddress` varchar(255) DEFAULT '',
  `SCity` varchar(30) DEFAULT '',
  `SState` varchar(30) DEFAULT '',
  `SZipCode` varchar(20) DEFAULT '',
  `SCountry` varchar(30) DEFAULT '',
  `SPhone` varchar(100) DEFAULT '',
  `RName` varchar(30) DEFAULT '',
  `RAddress` varchar(255) DEFAULT '',
  `RCity` varchar(50) DEFAULT '',
  `RState` varchar(30) DEFAULT '',
  `RZipCode` varchar(20) DEFAULT '',
  `RCountry` varchar(50) DEFAULT '',
  `RPhone` varchar(100) DEFAULT '',
  `REmail` varchar(50) DEFAULT '',
  `Carrier` varchar(100) DEFAULT '',
  `MailClass` varchar(50) DEFAULT '',
  `TrackingNo` varchar(100) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ShipDate` date DEFAULT NULL,
  `Weight` varchar(30) DEFAULT '',
  `Sync` varchar(2) DEFAULT 'N',
  `SyncStatus` varchar(50) DEFAULT '',
  `SyncStatusDate` datetime DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'N',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TrackingNo` (`TrackingNo`)
) ENGINE=InnoDB AUTO_INCREMENT=4585 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment`
--

LOCK TABLES `shipment` WRITE;
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipmentcache`
--

DROP TABLE IF EXISTS `shipmentcache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipmentcache` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecType` varchar(20) DEFAULT 'Sender',
  `Level` varchar(20) DEFAULT 'Pak Admin',
  `Name` varchar(30) DEFAULT '',
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(30) DEFAULT '',
  `State` varchar(30) DEFAULT '',
  `ZipCode` varchar(20) DEFAULT '',
  `Country` varchar(40) DEFAULT '',
  `Phone` varchar(50) DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `RecType` (`RecType`,`Level`,`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipmentcache`
--

LOCK TABLES `shipmentcache` WRITE;
/*!40000 ALTER TABLE `shipmentcache` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipmentcache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipmentdetail`
--

DROP TABLE IF EXISTS `shipmentdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipmentdetail` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ShipmentID` int(10) unsigned DEFAULT '0',
  `OrderNo` varchar(30) DEFAULT '',
  `OrderID` int(10) unsigned DEFAULT '0',
  `RefID` int(10) unsigned DEFAULT '0',
  `RefTable` varchar(30) DEFAULT NULL,
  `ItemName` varchar(100) DEFAULT '',
  `CustomerName` varchar(50) DEFAULT '',
  `Qty` smallint(5) unsigned DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15044 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipmentdetail`
--

LOCK TABLES `shipmentdetail` WRITE;
/*!40000 ALTER TABLE `shipmentdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipmentdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shirtdetail`
--

DROP TABLE IF EXISTS `shirtdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shirtdetail` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(10) unsigned DEFAULT '0',
  `ShirtType` varchar(10) DEFAULT '',
  `FabricCode` varchar(15) DEFAULT '',
  `FabricColor` varchar(30) DEFAULT '',
  `FabricContents` varchar(255) DEFAULT '',
  `DealerPrice` double DEFAULT '0',
  `CustomerPrice` double DEFAULT '0',
  `Qty` smallint(5) unsigned DEFAULT '0',
  `CollarStyle` varchar(35) DEFAULT '',
  `WhiteCollar` varchar(15) DEFAULT '',
  `CollarLength` varchar(20) DEFAULT '',
  `CollarHeight` varchar(20) DEFAULT '',
  `CollarTieSpace` varchar(20) DEFAULT '',
  `CollarStays` varchar(20) DEFAULT '',
  `Fusing` varchar(20) DEFAULT '',
  `CollarStitch` varchar(20) DEFAULT '',
  `FrontStyle` varchar(30) DEFAULT '',
  `FrontClosure` varchar(30) DEFAULT '',
  `BackStyle` varchar(30) DEFAULT '',
  `CuffStyle` varchar(30) DEFAULT '',
  `WhiteCuff` varchar(20) DEFAULT '',
  `CuffStitch` varchar(30) DEFAULT '',
  `HalfSleeve` varchar(20) DEFAULT '',
  `Monogram` varchar(30) DEFAULT '',
  `MonoPosition` varchar(30) DEFAULT '',
  `MonoColor` varchar(30) DEFAULT '',
  `MonoInitials` varchar(5) DEFAULT '',
  `PocketStyle` varchar(30) DEFAULT '',
  `NoOfPockets` tinyint(3) unsigned DEFAULT '0',
  `Epaulettes` varchar(30) DEFAULT '',
  `Label` varchar(30) DEFAULT '',
  `Fit` varchar(10) DEFAULT '',
  `Comments` text,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(10) DEFAULT '',
  `StatusID` int(11) DEFAULT '0',
  `Bottom` varchar(100) DEFAULT 'Regular',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7157 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shirtdetail`
--

LOCK TABLES `shirtdetail` WRITE;
/*!40000 ALTER TABLE `shirtdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `shirtdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shirtshistory`
--

DROP TABLE IF EXISTS `shirtshistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shirtshistory` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(10) unsigned DEFAULT NULL,
  `ShirtID` int(10) unsigned DEFAULT NULL,
  `WorkerID` int(10) unsigned DEFAULT NULL,
  `StatusID` int(10) unsigned DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `Dat` datetime DEFAULT NULL,
  `Done` varchar(10) DEFAULT NULL,
  `DateDone` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ShirtID` (`ShirtID`,`WorkerID`,`StatusID`,`Status`)
) ENGINE=InnoDB AUTO_INCREMENT=28812 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shirtshistory`
--

LOCK TABLES `shirtshistory` WRITE;
/*!40000 ALTER TABLE `shirtshistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `shirtshistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shirtstatus`
--

DROP TABLE IF EXISTS `shirtstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shirtstatus` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Status` varchar(255) DEFAULT NULL,
  `StatusText` varchar(1000) DEFAULT NULL,
  `CustomerStatus` varchar(255) DEFAULT NULL,
  `OrderStatus` varchar(255) DEFAULT NULL,
  `RelatedJob` varchar(30) DEFAULT NULL,
  `Pos` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shirtstatus`
--

LOCK TABLES `shirtstatus` WRITE;
/*!40000 ALTER TABLE `shirtstatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `shirtstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CustomerID` int(10) unsigned DEFAULT '0',
  `SizeOption` tinyint(3) unsigned DEFAULT '0',
  `NeckHeight` varchar(20) DEFAULT '',
  `NeckSize` varchar(15) DEFAULT '',
  `LeftSleeve` varchar(15) DEFAULT '',
  `RightSleeve` varchar(15) DEFAULT '',
  `Chest` varchar(15) DEFAULT '',
  `Waist` varchar(15) DEFAULT '',
  `Hips` varchar(15) DEFAULT '',
  `Yoke` varchar(15) DEFAULT '',
  `Tail` varchar(15) DEFAULT '',
  `LeftCuff` varchar(15) DEFAULT '',
  `RightCuff` varchar(15) DEFAULT '',
  `HeightFeet` varchar(15) DEFAULT '',
  `HeightInches` varchar(15) DEFAULT '',
  `Weight` varchar(15) DEFAULT '',
  `Posture` varchar(20) DEFAULT '',
  `ChestDescription` varchar(30) DEFAULT '',
  `ArmType` varchar(30) DEFAULT '',
  `BodyShape` varchar(30) DEFAULT '',
  `BodyProportion` varchar(40) DEFAULT '',
  `FittingOption` varchar(30) DEFAULT '',
  `Shoulder` varchar(20) DEFAULT '',
  `ShoulderLine` varchar(20) DEFAULT '',
  `ExtraShirtTail` varchar(20) DEFAULT '',
  `ShorterShirtTail` varchar(30) DEFAULT '',
  `FitAroundChestShoulder` varchar(30) DEFAULT '',
  `FitAroundWaist` varchar(15) DEFAULT '',
  `CoatSize` varchar(15) DEFAULT '',
  `PantSize` varchar(15) DEFAULT '',
  `Inseam` varchar(15) DEFAULT '',
  `OutSeam` varchar(15) DEFAULT '',
  `ShoeSize` varchar(15) DEFAULT '',
  `ThighShape` varchar(20) DEFAULT '',
  `SeatShape` varchar(20) DEFAULT '',
  `WearPants` varchar(20) DEFAULT '',
  `Rise` varchar(20) DEFAULT '',
  `PantRise` varchar(45) DEFAULT '',
  `ShirtLength` varchar(20) DEFAULT '',
  `Comments` text,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(10) DEFAULT '',
  `GeneralRemarks` text,
  `PantWaist` varchar(30) DEFAULT NULL,
  `PantHips` varchar(30) DEFAULT NULL,
  `Knee` varchar(20) DEFAULT '',
  `KneePleated` varchar(20) DEFAULT '',
  `Bottom` varchar(20) DEFAULT '',
  `BottomPleated` varchar(20) DEFAULT '',
  `FitWaist` varchar(20) DEFAULT '',
  `FitThigh` varchar(20) DEFAULT '',
  `FitSeat` varchar(20) DEFAULT '',
  `Thigh` varchar(20) DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CustomerID` (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=4291 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizebluepencil`
--

DROP TABLE IF EXISTS `sizebluepencil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sizebluepencil` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CustomerID` int(10) unsigned DEFAULT '0',
  `SizeOption` tinyint(3) unsigned DEFAULT '0',
  `NeckHeight` varchar(20) DEFAULT '',
  `NeckSize` varchar(15) DEFAULT '',
  `LeftSleeve` varchar(15) DEFAULT '',
  `RightSleeve` varchar(15) DEFAULT '',
  `Chest` varchar(15) DEFAULT '',
  `Waist` varchar(15) DEFAULT '',
  `Hips` varchar(15) DEFAULT '',
  `Yoke` varchar(15) DEFAULT '',
  `Tail` varchar(15) DEFAULT '',
  `LeftCuff` varchar(15) DEFAULT '',
  `RightCuff` varchar(15) DEFAULT '',
  `HeightFeet` varchar(15) DEFAULT '',
  `HeightInches` varchar(15) DEFAULT '',
  `Weight` varchar(15) DEFAULT '',
  `Posture` varchar(20) DEFAULT '',
  `ChestDescription` varchar(30) DEFAULT '',
  `ArmType` varchar(30) DEFAULT '',
  `BodyShape` varchar(30) DEFAULT '',
  `BodyProportion` varchar(40) DEFAULT '',
  `FittingOption` varchar(30) DEFAULT '',
  `Shoulder` varchar(20) DEFAULT '',
  `ShoulderLine` varchar(20) DEFAULT '',
  `ExtraShirtTail` varchar(20) DEFAULT '',
  `ShorterShirtTail` varchar(30) DEFAULT '',
  `FitAroundChestShoulder` varchar(30) DEFAULT '',
  `FitAroundWaist` varchar(15) DEFAULT '',
  `CoatSize` varchar(15) DEFAULT '',
  `PantSize` varchar(15) DEFAULT '',
  `Inseam` varchar(15) DEFAULT '',
  `OutSeam` varchar(15) DEFAULT '',
  `ShoeSize` varchar(15) DEFAULT '',
  `ThighShape` varchar(20) DEFAULT '',
  `SeatShape` varchar(20) DEFAULT '',
  `WearPants` varchar(20) DEFAULT '',
  `Rise` varchar(20) DEFAULT '',
  `PantRise` varchar(45) DEFAULT '',
  `ShirtLength` varchar(20) DEFAULT '',
  `Comments` text,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(10) DEFAULT '',
  `GeneralRemarks` text,
  `PantWaist` varchar(30) DEFAULT NULL,
  `PantHips` varchar(30) DEFAULT NULL,
  `Knee` varchar(20) DEFAULT '',
  `KneePleated` varchar(20) DEFAULT '',
  `Bottom` varchar(20) DEFAULT '',
  `BottomPleated` varchar(20) DEFAULT '',
  `FitWaist` varchar(20) DEFAULT '',
  `FitThigh` varchar(20) DEFAULT '',
  `FitSeat` varchar(20) DEFAULT '',
  `Thigh` varchar(20) DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CustomerID` (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizebluepencil`
--

LOCK TABLES `sizebluepencil` WRITE;
/*!40000 ALTER TABLE `sizebluepencil` DISABLE KEYS */;
/*!40000 ALTER TABLE `sizebluepencil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ShortCode` varchar(2) DEFAULT NULL,
  `AdminStatus` varchar(255) DEFAULT NULL,
  `DealerStatus` varchar(255) DEFAULT NULL,
  `CustomerStatus` varchar(255) DEFAULT NULL,
  `DealerDescription` text,
  `CustomerDescription` text,
  `Color` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tempitems`
--

DROP TABLE IF EXISTS `tempitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tempitems` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SessionID` varchar(100) DEFAULT '',
  `RefID` int(10) unsigned DEFAULT '0',
  `RefTable` varchar(100) DEFAULT '',
  `Name` varchar(200) DEFAULT '',
  `Description` varchar(1000) DEFAULT '',
  `Qty` int(10) unsigned DEFAULT '1',
  `DealerPrice` double DEFAULT '0',
  `CustomerPrice` double DEFAULT '0',
  `DealerExtraCharges` double DEFAULT '0',
  `CustomerExtraCharges` double DEFAULT '0',
  `DealerTotal` double DEFAULT '0',
  `CustomerTotal` double DEFAULT '0',
  `Weight` double(7,3) unsigned DEFAULT '0.000',
  `ImagePath` varchar(500) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1 MAX_ROWS=4294967295 AVG_ROW_LENGTH=50;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tempitems`
--

LOCK TABLES `tempitems` WRITE;
/*!40000 ALTER TABLE `tempitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `tempitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tempshirtdetail`
--

DROP TABLE IF EXISTS `tempshirtdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tempshirtdetail` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(10) unsigned DEFAULT NULL,
  `ShirtType` varchar(10) DEFAULT NULL,
  `FabricCode` varchar(15) DEFAULT NULL,
  `FabricColor` varchar(30) DEFAULT NULL,
  `FabricContents` varchar(255) DEFAULT NULL,
  `DealerPrice` double DEFAULT NULL,
  `CustomerPrice` double DEFAULT NULL,
  `Qty` smallint(5) unsigned DEFAULT NULL,
  `CollarStyle` varchar(30) DEFAULT NULL,
  `WhiteCollar` varchar(15) DEFAULT NULL,
  `CollarLength` varchar(20) DEFAULT NULL,
  `CollarHeight` varchar(20) DEFAULT NULL,
  `CollarTieSpace` varchar(20) DEFAULT NULL,
  `CollarStays` varchar(20) DEFAULT NULL,
  `CollarStitch` varchar(20) DEFAULT NULL,
  `FrontStyle` varchar(30) DEFAULT NULL,
  `BackStyle` varchar(30) DEFAULT NULL,
  `CuffStyle` varchar(30) DEFAULT NULL,
  `WhiteCuff` varchar(20) DEFAULT NULL,
  `CuffStitch` varchar(30) DEFAULT NULL,
  `HalfSleeve` varchar(20) DEFAULT NULL,
  `Monogram` varchar(30) DEFAULT NULL,
  `MonoPosition` varchar(30) DEFAULT NULL,
  `MonoColor` varchar(30) DEFAULT NULL,
  `MonoInitials` varchar(5) DEFAULT NULL,
  `PocketStyle` varchar(30) DEFAULT NULL,
  `NoOfPockets` int(10) unsigned DEFAULT NULL,
  `Epaulettes` varchar(30) DEFAULT NULL,
  `Fit` varchar(10) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `Dat` datetime DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `SessionID` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tempshirtdetail`
--

LOCK TABLES `tempshirtdetail` WRITE;
/*!40000 ALTER TABLE `tempshirtdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tempshirtdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TransID` varchar(50) DEFAULT '',
  `DealerCode` smallint(5) unsigned DEFAULT '1',
  `OrderID` int(10) unsigned DEFAULT '0',
  `OrderNo` varchar(20) DEFAULT '',
  `Typ` varchar(20) DEFAULT 'Sale',
  `Card` varchar(25) DEFAULT '',
  `ExpDate` varchar(20) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Amount` double DEFAULT '0',
  `Card2` varbinary(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25532 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unsubscribers`
--

DROP TABLE IF EXISTS `unsubscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unsubscribers` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MailingID` int(10) unsigned DEFAULT '0',
  `Email` varchar(100) DEFAULT '',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=20613 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unsubscribers`
--

LOCK TABLES `unsubscribers` WRITE;
/*!40000 ALTER TABLE `unsubscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `unsubscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usps`
--

DROP TABLE IF EXISTS `usps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usps` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Price` varchar(200) DEFAULT NULL,
  `OrderNo` varchar(100) DEFAULT NULL,
  `Recipient` varchar(1000) DEFAULT NULL,
  `TrackingNo` varchar(100) DEFAULT NULL,
  `MailClass` varchar(100) DEFAULT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `MailDate` datetime DEFAULT NULL,
  `PrintDate` datetime DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `DeliveryDate` datetime DEFAULT NULL,
  `Sync` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usps`
--

LOCK TABLES `usps` WRITE;
/*!40000 ALTER TABLE `usps` DISABLE KEYS */;
/*!40000 ALTER TABLE `usps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT '',
  `CellPhone` varchar(45) DEFAULT '',
  `Phone` varchar(45) DEFAULT '',
  `Address` varchar(255) DEFAULT '',
  `PaymentMode` varchar(45) DEFAULT '',
  `PurchaseAmount` double unsigned DEFAULT '0',
  `PayableAmount` double unsigned DEFAULT '0',
  `Status` varchar(10) DEFAULT 'N',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workers` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `JobType` varchar(30) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workers`
--

LOCK TABLES `workers` WRITE;
/*!40000 ALTER TABLE `workers` DISABLE KEYS */;
/*!40000 ALTER TABLE `workers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'mct'
--

--
-- Dumping routines for database 'mct'
--

--
-- Final view structure for view `cs`
--

/*!50001 DROP VIEW IF EXISTS `cs`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cs` AS select `s`.`ID` AS `ID`,`s`.`WorkerID` AS `WorkerID`,`s`.`OrderID` AS `OrderID`,`s`.`ShirtID` AS `ShirtID`,`s`.`StatusID` AS `StatusID`,`t`.`Pos` AS `Pos`,`s`.`Status` AS `Status`,`s`.`Comments` AS `Comments`,`s`.`Dat` AS `Date`,`s`.`Done` AS `Done`,`s`.`DateDone` AS `DateDone`,`w`.`Name` AS `Name`,`w`.`JobType` AS `JobType`,`w`.`Description` AS `Description`,`t`.`Status` AS `SStatus`,`t`.`StatusText` AS `StatusText`,`t`.`CustomerStatus` AS `CustomerStatus`,`t`.`OrderStatus` AS `OrderStatus`,`t`.`RelatedJob` AS `RelatedJob`,`d`.`FabricCode` AS `FabricCode`,`d`.`FabricColor` AS `FabricColor`,`d`.`FabricContents` AS `FabricContents`,`d`.`Qty` AS `Qty`,`d`.`Fit` AS `Fit` from (((`shirtshistory` `s` join `workers` `w`) join `shirtstatus` `t`) join `shirtdetail` `d`) where ((`s`.`WorkerID` = `w`.`ID`) and (`s`.`StatusID` = `t`.`ID`) and (`d`.`ID` = `s`.`ShirtID`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-18 12:18:11
