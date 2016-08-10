-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2016 at 06:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mct`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MerchantID` int(10) unsigned DEFAULT '0',
  `ProductTypeID` int(10) unsigned DEFAULT '0',
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ParentID` int(10) unsigned DEFAULT '0' COMMENT 'ParentID',
  `Path` varchar(250) DEFAULT '',
  `Name` varchar(200) DEFAULT '',
  `Keywords` varchar(255) DEFAULT '' COMMENT 'Keywords',
  `Description` varchar(2000) DEFAULT '' COMMENT 'Description',
  `Images` varchar(255) DEFAULT '' COMMENT 'Images',
  `Status` varchar(255) DEFAULT '' COMMENT 'Status',
  `Pos` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UCats` (`ProductTypeID`,`ParentID`,`Name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Categories' AUTO_INCREMENT=139 ;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`ID`, `MerchantID`, `ProductTypeID`, `Dat`, `ParentID`, `Path`, `Name`, `Keywords`, `Description`, `Images`, `Status`, `Pos`) VALUES
(1, 0, 0, '2011-06-07 10:42:22', 0, '0', 'Root', '', '', '0', '', 0),
(2, 0, 0, '2011-06-07 10:42:16', 1, '0-1', 'Premium stock', 'Premium stock', 'Premium stock', '0', '', 0),
(3, 0, 0, '2011-06-07 10:42:16', 1, '0-1', 'Italian Shirts', '', '', '0', '', 0),
(4, 0, 0, '2011-06-07 10:42:16', 1, '0-1', 'Check & Plaids', '', '', '0', '', 0),
(5, 0, 0, '2011-06-07 10:42:16', 1, '0-1', 'Designer Shirts', 'Designer Shirts', 'Designer Shirts', '0', '', 0),
(6, 0, 0, '2011-06-07 10:42:16', 1, '0-1', 'Tuxedo Shirts', 'Tuxedo Shirts', 'Tuxedo Shirts\r\n', '0', '', 0),
(7, 0, 0, '2011-06-07 10:42:16', 1, '0-1', 'Suits Shirts', 'Suits Shirts', 'Suits Shirts\r\n', '0', '', 0),
(9, 0, 0, '2011-06-07 10:42:22', 0, '0', 'Deluxe Shirts', '', '100 % cotton 2play', '0', '', 0),
(10, 0, 0, '2011-06-07 10:42:22', 0, '0', 'Executive Shirts', '', '100% cotton 1 ply', '0', '', 0),
(11, 0, 6, '2011-06-08 12:20:33', 0, '0', 'Custom Economy', '', '', '', '', 0),
(12, 0, 6, '2011-06-08 12:21:25', 0, '0', 'Custom Deluxe', '', '', '', '', 0),
(13, 0, 6, '2011-06-08 12:28:10', 0, '0', 'Custom Luxury', '', '', '', '', 0),
(14, 0, 6, '2014-11-14 15:13:05', 11, '0-11', 'Classic Dress Shirt - 60/40 Cotton Blend Broadcloth', '', '\r\n\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p> The fabric is a classic tightly-woven and blessed with a fine hand that assures it remains crisp-looking all day long.<br>Suitable for any occasion this hard-working garment is beloved by our customers for its exceptional durability and cottony softness.</p>', '', '', 1),
(15, 0, 6, '2014-11-14 15:13:28', 11, '0-11', 'Classic Stripes - 60/40 Cotton Blend', '', '			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> Sassy stripes instead of solids spruce up that navy suit, while open-collared shirts transform your favorite blazer and dress slacks into a country club casual look.</p>', '', '', 4),
(16, 0, 6, '2014-11-14 15:13:55', 11, '0-11', 'Classic Checks/Plaids - 60/40 Cotton Blend', '', '<table width="95%" align="center">\r\n   <tr><td width="26%"></td>\r\n    <td width="30%">Less</td>\r\n    <td width="30%" align="right">More</td>\r\n</tr>\r\n<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr>\r\n<td style="font-size:11px;">Texture</td>\r\n<td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n </table><p>Checks squares and little boxes impart a sporty casual look. Dressed up with a spread collar and French cuffs they suggest posh British sophistication. Plaids make wonderful business casual shirts that can be worn open collared and still make a finished statement.</p>', '', '', 6),
(17, 0, 6, '2014-11-14 15:13:45', 11, '0-11', 'Classic Dress Shirt - 100% Cotton 1 Ply Broadcloth', '', '<table width="95%" align="center">\r\n   <tr><td width="26%"></td>\r\n    <td width="30%">Less</td>\r\n    <td width="30%" align="right">More</td>\r\n</tr>\r\n<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr>\r\n<td style="font-size:11px;">Texture</td>\r\n<td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n </table>\r\n <p>This fabric has a crisp fine hand that breathes beautifully for comfort and remains crisp-looking all day long. Broadcloths are suitable for any occasion and dress shirt styling.</p>', '', '', 5),
(18, 0, 6, '2014-11-14 15:15:21', 11, '0-11', 'Twill - 60/40 Cotton Blend', '', '<ul><li>Diagonal rib</li>\r\n<li>High color luster</li>\r\n<li>Enhanced depth of color</li>\r\n</ul>\r\nA fundamental weave characterized by diagonal lines. The reflection from the diagonal rib in the weave gives twill its enhanced depth of color.', '', '', 11),
(19, 0, 6, '2014-11-14 15:13:15', 11, '0-11', 'Pinpoint Oxford - 60/40 Cotton Blend', 'Pinpoint Oxford - 60/40 Cotton Blend', '<br />\r\n <table width="95%" align="center">\r\n    <tr><td width="26%"></td>\r\n    <td width="30%">Less</td>\r\n    <td width="30%" align="right">More</td>\r\n   </tr>\r\n<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n\r\n<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n</table>\r\n <p>Â </p>\r\n<ul><li>Workhorse</li>\r\n<li>Sporty</li>\r\n<li>Durable</li>\r\n<li>Traditional</li>\r\n</ul>\r\nPinpoint Oxford is known for its subtle texture and durability. Our classic Oxford blends make the best-looking shirts in the industry.\r\n\r\n<p align="justify">Pinpoint Oxford combines the qualities of 60/40 poplin and Oxford broadcloth. The luster and superfine texture of poplin nicely complements the comfort and durability of the Oxford.</p>\r\n', '', '', 3),
(20, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'White on White - 60/40 Cotton Blend', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> </p>\r\n\r\n<ul><li>Decorative</li>\r\n<li>Dressy</li>\r\n<li>Elaborate</li>\r\n</ul>White on White fabrics are woven on a special loom to create a self-design in stripes, checks, geometric patterns, and more. ', '', '', 33),
(21, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Herringbone - 60/40 Cotton Blend', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> </p>', '', '', 32),
(22, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Luxury Super 120''s', '', '<ul><li>Elegant</li>\r\n<li>Exquisite Hand</li>\r\n<li>Brilliant Colors</li>\r\n</ul>\r\n<p>The ultimate fabrics! </p>\r\n<p>These top-of-the-line fabrics are woven in England’s and Italy''s most exclusive mills, such as Zegna, Loro Piana and Barberis of Italy and Clissold of England.</p>\r\n<p>Because they are two-ply Super 100’s to 120’s count, the yarns are super fine and tightly woven. This causes our dress slacks to feel buttery soft, drape well and hold their shape while resisting wrinkles without adding any synthetics or fillers.\r\n</p>', '', '', 28),
(23, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Super 100''s Worsted Merino Wool', '', '<ul><li>Comfortable weight</li>\r\n<li>Pants that hold their shape</li>\r\n<li>Wrinkle resistant</li>\r\n</ul>\r\n<p>Enjoy the ease and durability of these fine warp-faced wools spun from Super 100’s fine Merino wool.</p>', '', 'D', 22),
(24, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Fashion Stripes - 60/40 Cotton Blend', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> </p>\r\nWho said men fashions have to be boring? Try stripes instead of solids to spruce up that navy suit. Next time wear the collar open with your favorite blazer and dress slacks for a country club casual look.', '', '', 15),
(25, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Sport Shirt Stripes - 60/40 Cotton Blend', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> </p>\r\n\r\nWho said men''s fashions have to be boring? Try stripes instead of solids to spruce up that navy suit. Next time, wear the collar open with your favorite blazer and dress slacks for a country club casual look.', '', '', 27),
(26, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Cotton  Poplin Chinos', '', '<ul><li>Hold their shape</li>\r\n<li>Rich, vibrant colors</li>\r\n</ul>\r\n<p>Enjoy the fit and easy care of our cotton poplins.</p>\r\n<p>Bask in the splendor of the comfort, fit and freedom of our spectacular "cotton flex" pants!</p>\r\n<p>Experience the combination of art and science in our fine 120-count combed cotton with 3% Lycra.</p>', '', 'D', 16),
(27, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Fashion Checks/Plaids - 60/40 Cotton Blend', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> </p>', '', '', 24),
(28, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Sporty Plaids - 60/40 Cotton Blend', '', '<table width="95%" align="center">\r\n   <tr><td width="26%"></td>\r\n    <td width="30%">Less</td>\r\n    <td width="30%" align="right">More</td>\r\n</tr>\r\n<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr>\r\n<td style="font-size:11px;">Texture</td>\r\n<td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n </table><p>Checks squares and little boxes impart a sporty casual look. Dressed up with a spread collar and French cuffs they suggest posh British sophistication. Plaids make wonderful business casual shirts that can be worn open collared and still make a finished statement.</p>', '', '', 31),
(29, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Stripes - 100% Imported Cotton', '', '<table width="95%" align="center">\r\n   <tr><td width="26%"></td>\r\n    <td width="30%">Less</td>\r\n    <td width="30%" align="right">More</td>\r\n</tr>\r\n<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr>\r\n<td style="font-size:11px;">Texture</td>\r\n<td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n </table>\r\n <p>Who said men fashions have to be boring? Try stripes instead of solids to spruce up that navy suit. Next time wear the collar open with your favorite blazer and dress slacks for a country club casual look. </p>', '', '', 18),
(30, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Cotton Twill', '', '<ul><li>Hold their shape</li>\r\n<li>Rich, vibrant colors</li>\r\n</ul>\r\n<p>Enjoy the fit and easy care of our cotton twills.</p>\r\n<p>Bask in the splendor of the comfort, fit and freedom of our spectacular "cotton flex" pants!</p>\r\n<p>Experience the combination of art and science in our fine 120-count combed cotton with 3% Lycra.</p>', '', 'D', 35),
(31, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Fine Line Stripe', '', 'Fine Line Stripe', '', '', 30),
(32, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Polished Cotton Poplin ', '', '<ul><li>Hold their shape</li> \r\n<li>Rich, vibrant colors</li>\r\n</ul> \r\nEnjoy the fit and easy care of our polished cotton poplin stretch custom pants.\r\n<p>Bask in the splendor of the comfort, fit and freedom of our spectacular "cotton flex" pants!</p>\r\n<p>Experience the combination of art and science in our fine 120-count combed cotton with 3% Lycra\r\n</p>', '', 'D', 17),
(33, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Fine Ribbed Textured Cotton ', '', '<ul><li>Hold their shape </li>\r\n<li>Rich, vibrant colors </i>\r\n</ul>Enjoy the fit and easy care of our ribbed cotton stretch pants.\r\n<p>Bask in the splendor of the comfort, fit and freedom of our spectacular "cotton flex" pants!</p>\r\n<p>Experience the combination of art and science in our fine 120-count combed cotton with 3% Lycra\r\n</p>', '', 'D', 23),
(34, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Wool Blends 60/40', '', '<ul>\r\n<li>Wrinkle resistant </li>\r\n<li>Comfortable weight </li>\r\n<li>Pants that hold their shape</li>\r\n</ul>\r\nEnjoy the ease and durability of these fine wool blends custom pants.  \r\n', '', 'D', 19),
(35, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Cotton Poplin Stretch', '', 'Enjoy the fit and easy care of our polished cotton poplin stretch custom pants.\r\n<p>Bask in the splendor of the comfort, fit and freedom of our spectacular "cotton flex" pants!</p>\r\n<p>Experience the combination of art and science in our fine 120-count combed cotton with 3% Lycra\r\n</p>', '', 'D', 14),
(36, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Solids - No-Iron 100% Polyester', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:1px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p> </p>\r\nPolyester shirts are wrinkle-resistant and stain-resistant, which makes care easier. Polyester can be machine washed and dried, and does not typically need ironing. It is durable and does not shrink.', '', '', 25),
(37, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Stripes - No-Iron 100% Polyester', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:1px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p> </p>\r\nPolyester shirts are wrinkle-resistant and stain-resistant, which makes care easier. Polyester can be machine washed and dried, and does not typically need ironing. It is durable and does not shrink.', '', '', 26),
(38, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Checks and Plaids - No-Iron 100% Polyester', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:1px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p> </p>\r\nPolyester shirts are wrinkle-resistant and stain-resistant, which makes care easier. Polyester can be machine washed and dried, and does not typically need ironing. It is durable and does not shrink.', '', '', 29),
(39, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'End on End (Chambray) - 100%  Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p><ul><li>Versatile</li>\r\n<li>Interesting subtle texture</li>\r\n<li>Heathered</li>\r\n</ul>\r\nA unique shirting fabric that easily converts from business formal to a country club casual look. The interesting subtle texture is created by alternating colored threads usually a colored warp and a white filling.</p>', '', '', 13),
(40, 0, 6, '2014-11-14 14:11:04', 12, '0-12', 'Pinpoint Oxford - 100% Imported Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p><ul><li>Workhorse</li>\r\n<li>Sporty</li>\r\n<li>Durable</li>\r\n<li>Traditional</li>\r\n</ul>\r\nKnown for its subtle texture durability and wrinkle resistance our "Two-Ply" classic oxfords make the best looking traditional button down oxford shirt in the industry.</p>', '', '', 3),
(41, 0, 6, '2012-05-31 11:25:09', 12, '0-12', 'Broadcloth - 100%  2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p><ul><li>Breathable, comfortable, and soft</li>\r\n<li>Super-durable crafted yarns</li>\r\n<li>Versatile</li>\r\n<li>Finely ribbed</li></ul>\r\nThis fabulous looking comfortable breathable ultra-fine and soft to the touch broadcloth is an absolute winner! The imperial yarns are actually twisted together for durability before the fabric is woven. Suitable for any style and at an incredible price!</p>', '', '', 1),
(42, 0, 6, '2014-11-14 14:11:42', 12, '0-12', 'Royal Oxford - 100% 2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p><ul><li>Lustrous</li>\r\n<li>Textured</li>\r\n<li>Regal</li>\r\n</ul>\r\n\r\nFor a dressy shirt try our Royal Oxfords. Known for its exceptional texture softness and luster this superior subtle basket weave Oxford cloth is woven of ultra-fine 80s and 100s yarns.</p>', '', '', 6),
(43, 0, 6, '2014-11-14 14:11:18', 12, '0-12', 'Classic Stripes - 100% 2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p>Who said men fashions have to be boring? Try stripes instead of solids to spruce up that navy suit. Next time wear the collar open with your favorite blazer and dress slacks for a country club casual look.</p>', '', '', 4),
(44, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Herringbone - 100% 2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p><ul><li>Arrowhead pattern</li>\r\n<li>Interesting texture</li>\r\n<li>Luxurious</li>\r\n</ul>\r\nHerringbone weaves change direction giving your shirt texture and depth. Herringbones are great looking with a white collar and cuffs or sporty as an open collared button-down or hidden button-down shirt.', '', '', 11),
(45, 0, 6, '2014-11-14 14:12:01', 12, '0-12', 'Classic Checks/Plaids - 100% 2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> Checks squares windowpanes and plaids. Besides traditionally tailored shirts dress shirts in these fabrics can be made to look sporty with button-down collars for a casual look. For a posh British look plaids can be made with spread collars and French cuffs. Plaids and checks make wonderful business causal shirts that can be worn open collared and still make a finished statement.', '', '', 7),
(46, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'White on White - 100% 2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p><ul><li>Decorative</li>\r\n<li>Dressy</li>\r\n<li>Elaborate</li>\r\n</ul>\r\nElegant and dressy! Best for "dressy" dress shirts or tuxedo shirts. White on white fabrics are woven on a special loom to create a self-design in stripes checks geometric patterns and more.</p>', '', '', 19);
INSERT INTO `Categories` (`ID`, `MerchantID`, `ProductTypeID`, `Dat`, `ParentID`, `Path`, `Name`, `Keywords`, `Description`, `Images`, `Status`, `Pos`) VALUES
(47, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Luxury Cotton with Stretch', '', 'Enjoy the comfort and freedom of our spectacular "cotton flex" fabric. Experience the combination of art and science with our 120 combed imported cotton and 3% Lycra.', '', '', 25),
(48, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Twills - 100% 2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p><ul><li>Diagonal rib</li>\r\n<li>High color luster</li>\r\n<li>Enhanced depth of color</li>\r\n</ul>\r\nThe twill weaves changes direction giving your shirt texture and depth. Twills are great-looking with a white collar and cuffs or sporty as an open collared button-down or hidden button-down shirt.</p>', '', '', 12),
(49, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Textured - 100% 2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p>\r\n              <ul><li>Interesting texture </li>\r\n<li>High color luster </li>\r\n<li>Enhanced depth of color </li>\r\n </ul>\r\nTextured weaves change direction and give your shirt texture and depth. Textured fabrics are great-looking with a white collar and cuffs or sporty as an open collared button-down or hidden button-down shirt.</p>', '', '', 23),
(50, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Hairline Stripe', '', '', '', '', 26),
(51, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Cord Stripe', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>', '', '', 24),
(52, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Tone on Tone', '', '100% Imported Deluxe Cotton', '', '', 27),
(53, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Tick Weave', '', 'Tick weave shirts have a slight texture, due to their distinctive patterns, often involving two contrasting colors. The shirt has a cross-dyed or a chambray look.', '', '', 29),
(54, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Tick Weave 100% Imported Cotton', '', '', '', '', 28),
(55, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Jacquard - 100% 2-Ply Egyptian Cotton', '', 'Elegant and dressy! Best for "dressy" dress shirts or tuxedo shirts. Jacquards are woven on a special loom to create a self-design in stripes, checks, geometric patterns, and more.', '', '', 20),
(56, 0, 6, '2014-11-14 14:11:30', 12, '0-12', 'Fashion Stripes - 100% 2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>', '', '', 5),
(57, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Sport Shirt Stripes - 100% 2-Ply Egyptian Cotton', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> </p>\r\n\r\nWho said men''s fashions have to be boring? Try stripes instead of solids to spruce up that navy suit. Next time, wear the collar open with your favorite blazer and dress slacks for a country club casual look.', '', '', 16),
(58, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Linen - 100% 2-Ply Egyptian Cotton', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> </p>\r\n\r\n<ul><li>Linen stays cool in heat</li>\r\n<li>Linen is durable</li>\r\n<li>Linen rejects dirt</li>\r\n</ul> \r\nLinen yarn and fabrics are made from flax fibers, probably the earliest textile made from plants. Linen was made in ancient Egypt, and the Romans brought flax-growing to Britain. Linen fabrics and yarns are fine, strong, and lustrous, and still fashionable.', '', '', 22),
(59, 0, 6, '2014-11-14 14:12:14', 12, '0-12', 'Fashion Checks/Plaids - 100% 2-Ply Egyptian Cotton', '', '<table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p>Checks squares windowpanes and plaids. Besides traditionally tailored shirts, dress shirts in these fabrics can be made to look sporty with button-down collars for a casual look. For a posh British look plaids can be made with spread collars and French cuffs. Plaids and checks make wonderful business causal shirts that can be worn open collared and still make a finished statement.', '', '', 8),
(60, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Sporty Checks/Plaids - 100% 2 Ply Egyptian Cotton', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> </p>\r\n\r\nChecks, squares, windowpanes, and plaids. Besides traditionally tailored shirts, dress shirts in these fabrics can be made to look sporty, with button-down collars for a casual look. For a posh, British look, plaids can be made with spread collars and French cuffs. Plaids and checks make\r\nwonderful business causal shirts that can be worn open collared and still make a finished statement.', '', '', 18),
(61, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Dobbies/Fancies', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\r\n			  </table>\r\n			  <p> </p>\r\n\r\n<ul><li>Decorative</li>\r\n<li>Dressy</li>\r\n<li>Elaborate</li>\r\n</ul>These are dressy shirt fabrics that can be used for dress shirts or formal wear. Fancies and Dobbies are characterized by their high luster and subtle texture. They commonly have a solid ground of white or ivory with a small accent color woven throughout.', '', '', 21),
(62, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'Royal Oxford - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:40px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:40px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p>When only the best will do, try our Royal Oxfords. Known for its exceptional texture, softness, and luster, this superior, subtle basket-weave Oxford cloth is woven of ultra-fine Sea Isle 100s yarns. ', '', '', 14),
(63, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'Pinpoint Oxford - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:30px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p>This timeless fabric is actually double-woven, using the finest yarns to create the signature subtle texture. Known for its Ivy League look, durability, and wrinkle resistance, our Pinpoint Oxford withstands the test of time.', '', '', 4),
(64, 0, 6, '2014-11-14 15:21:16', 13, '0-13', 'Plaids - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:10px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p>Probably this season’s “hottest” look in men''s fashion. Plaid makes a wonderful statement! Try it with a spread collar and French cuffs for a sophisticated, “Regal” look, or turn it country club casual with an open collar, which still makes a finished statement.  Match your plaid shirt with a pair of jeans for the very latest “Retrosexual” style.', '', '', 25),
(65, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'Checks - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:10px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p>For a true fashion statement, checks are the perfect finishing touch for a smart-looking outfit. Wear sporty, for a casual look, or dress it up with a spread collar and French cuffs, for a well-bred, British look.', '', '', 10),
(66, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'Solid Broadcloth - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:10px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p> Made with the most luxurious yarns, this exquisite, comfortable, ultra-fine and soft to the touch broadcloth is a sensational winner! The imperial yarns are actually twisted together for durability before the fabric is woven.', '', '', 3),
(67, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'Blue Stripes - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:10px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p>Create an expressive and refreshing look with our fabulous collection of blue stripes. Wear blue stripes instead of solids to spruce up that navy suit, or, next time, wear it open collared with your favorite blazer and dress slacks for a country club casual look. So, who said men''s fashions have to be boring?', '', '', 7),
(68, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'Red Stripes - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:10px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p>Treat yourself to our fabulous collection of red stripes. Wear red stripes instead of solids to spruce up your gray, black, and navy suits, or next time, wear it open collared with your favorite blazer and dress slacks for a country club casual look. So, who said men''s fashions have to be boring?', '', '', 6),
(69, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'Black Stripes - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:10px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p>Make a bold statement with black and white stripes. Wear them to turn a plain gray suit into a “power suit,” or, next time, wear it open collared with your favorite black blazer and gray dress slacks for a country club casual look. So, who said men''s fashions have to be boring?', '', '', 23),
(70, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'Color Stripes - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:10px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p>Treat yourself to our fabulous collection of mouth-watering colored stripes. Add pizzazz to your suits, or, next time, wear it open collared with your favorite blazer and dress slacks for a country club casual look. So, who said men''s fashions have to be boring?', '', '', 5),
(71, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'White on White Jacquards - Made in Italy', '', 'Elegant and dressy! Our White on Whites make wonderful dressy dress shirts or exquisite tuxedo shirts. These fabrics are actually woven on a special loom to create a self design in stripes, checks, geometric patterns, and more.', '', '', 22),
(72, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'Super Fine Herringbones -  Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p><ul><li>Arrowhead pattern</li>\r\n<li>Interesting texture</li>\r\n<li>Luxurious</li>\r\n</ul>\r\n\r\nAn arrowhead pattern characterized by a balanced zigzag effect produced by first having the rib run to the right and then to the left for an equal number of threads. It was named after the skeleton of the herring, as this is what the fiber pattern resembles.<P>\r\nSuper-fine herringbone shirts are soft and supple, with herrin', '', '', 21),
(73, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'Jacquard Weave Fancy Solid - Made in Italy', '', 'Jacquard weave is for elegant, fancy, “dressy” dress shirts or tuxedo shirts. Jacquards are known for their special form of self-design in stripes, checks, geometric patterns, and more.', '', '', 20),
(74, 0, 6, '2014-11-14 15:21:16', 13, '0-13', 'Super Fine Twills- Made in Italy', '', 'The super-fine twill weave is subtle and soft, giving your shirt texture and depth. Twills are stunning with contrasting white collar and cuffs, or sporty as an open collared button-down or hidden button-down shirt.', '', '', 24),
(75, 0, 6, '2014-11-14 15:21:16', 13, '0-13', 'Hairline Stripe - Made in Italy', '', '', '', '', 27),
(76, 0, 6, '2014-11-14 15:21:16', 13, '0-13', 'Box-Weave Dobby Solid', '', '', '', '', 28),
(77, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'End on End - Made in Italy', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:25px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p><ul><li>Versatile</li>\r\n<li>Interesting, subtle texture</li>\r\n<li>Heathered</li>\r\n</ul>\r\nThe interesting subtle texture is created by alternating colored threads, usually a dominant color interwoven with white.\r\n<p align="justify">End on end was first invented by the French (fil-à-fil), a fabric in which white thread is interwoven with a colored thread to produce a subtle, textured effect. It retains the coolness', '', '', 18),
(78, 0, 6, '2014-11-14 15:21:16', 13, '0-13', 'Birds Eye - Made in Italy', '', 'A novel addition to your custom shirt collection.  The birds eye fabric is woven on a dobby loom, with a geometric pattern having a center dot resembling a bird’s eye. Try it with a white collar and cuffs for a sophisticated look, or go country club casual with a button-down or hidden button-down collar.', '', '', 29),
(79, 0, 6, '2014-11-14 15:21:16', 13, '0-13', 'Linen Imported Cotton', '', '<br />\r\n			  <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:130px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:40px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:10px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p><ul><li>Linen stays cool in heat</li>\r\n<li>Linen is durable</li>\r\n<li>Linen rejects dirt</li>\r\n</ul>\r\nLinen yarn and fabrics are made from flax fibers, probably the earliest textile made from plants. Linen was made in ancient Egypt, and the Romans brought flax-growing to Britain. Linen fabrics and yarns are fine, strong, and lustrous, yet still fashionable.', '', '', 30),
(80, 0, 6, '2014-11-14 15:21:16', 13, '0-13', 'Ultra Fine Royal Oxford', '', ' <table width="95%" align="center">\r\n			    <tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td width="30%" align="right">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:40px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:40px; font-size:7px; height:6px" ></div></div></td></tr>\r\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:180px; font-size:7px; height:6px" ></div></div></td></tr>\r\n  </table>\r\n <p>When only the best will do, try our “Royal Oxfords.” Known for its exceptional texture, softness, and luster, this superior subtle basket-weave Oxford cloth is woven of ultra-fine Sea Isle 100s yarns.', '', '', 31),
(81, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'Easy-Care European 100% Cotton', '', 'Easy-care treated yarns. Wrinkle-free, high-end luxury cottons. ', '', '', 16),
(82, 0, 6, '2015-01-01 10:12:07', 13, '0-13', '100''s 2-Ply Egyptian Cotton', '', 'This great-looking, soft to the touch, comfortable, breathable, ultra-fine broadcloth is totally a winner! The imperial yarns are actually twisted together for durability before the fabric is woven. Suitable for any style, and at an affordable price!', '', '', 11),
(83, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'Fine Euro Twill', '', 'The dramatic twill weave changes direction, giving your shirt texture and depth. Twills are eye-catching and stunning with a white collar and cuffs, or sporty as an open collared button-down or hidden button-down shirt.', '', '', 19),
(84, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'Fine Royal Oxford', '', '', '', '', 15),
(85, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'Chevron', '', '', '', '', 17),
(86, 0, 6, '2014-11-14 15:21:16', 13, '0-13', 'Pique', '', 'A fine, textured fabric that looks great under a tuxedo or worn with a dressy black suit for your next formal affair.  A Wing Collar or a Wide Spread dress shirt collar and French cuffs provide the finishing touch.\r\n\r\n', '', '', 26),
(87, 0, 6, '2014-11-14 15:23:56', 13, '0-13', 'Sea Island Broadcloth', '', 'Sea Island Broadcloth offers the luxurious look and silky feel of high thread count, long-staple cotton. Sea Island Broadcloth is the designer’s choice for light-feeling, ultra-comfortable, and breathable cotton shirts.   ', '', '', 13),
(88, 0, 5, '2011-12-20 12:01:38', 0, '', 'Belts', '', '', '', '', 0),
(89, 0, 5, '2011-12-20 12:01:46', 0, '', 'Ties', '', '', '', '', 0),
(90, 0, 5, '2011-12-20 12:02:02', 89, '', 'Skinny Ties', '', '', '', '', 0),
(91, 0, 5, '2011-12-20 12:02:15', 89, '', 'Regular Ties', '', '', '', '', 0),
(92, 0, 5, '2011-12-20 12:02:25', 89, '', 'Bow Ties', '', '', '', '', 0),
(93, 0, 5, '2011-12-20 12:03:02', 0, '', 'Under Garments', '', '', '', '', 0),
(94, 0, 5, '2011-12-20 12:03:11', 88, '', 'Leather Belts', '', '', '', '', 0),
(95, 0, 5, '2011-12-20 12:03:23', 88, '', 'Canvas Belts', '', '', '', '', 0),
(96, 0, 5, '2011-12-20 12:04:25', 93, '', 'Boxer Shorts', '', '', '', '', 0),
(97, 6, 1, '2012-01-19 07:23:34', 0, '', 'Exquisite White Dress Shirts', '', '', '', '', 0),
(98, 6, 1, '2012-01-19 07:23:52', 0, '', 'Casual Elegance Shirts', '', '', '', '', 0),
(99, 6, 1, '2012-01-19 07:24:05', 0, '', 'Formal and Tuxedo Shirts', '', '', '', '', 0),
(100, 6, 1, '2012-01-04 08:03:47', 97, '', 'Solid', '', '', '', '', 0),
(101, 6, 1, '2012-01-04 08:04:00', 97, '', 'Stripes', '', '', '', '', 0),
(102, 6, 1, '2012-01-04 08:04:10', 97, '', 'Checks', '', '', '', '', 0),
(103, 6, 1, '2012-01-04 08:07:07', 98, '', 'Solid', '', '', '', '', 0),
(104, 6, 1, '2012-01-04 08:07:14', 98, '', 'Stripes', '', '', '', '', 0),
(105, 6, 1, '2012-01-04 08:07:21', 98, '', 'Checks', '', '', '', '', 0),
(106, 6, 1, '2012-01-19 07:24:50', 99, '', 'Solid', '', '', '', '', 1),
(107, 6, 1, '2012-01-19 07:24:52', 99, '', 'White on White', '', '', '', '', 4),
(108, 6, 1, '2012-01-19 07:24:50', 99, '', 'Stripes', '', '', '', '', 2),
(109, 6, 1, '2012-01-19 07:24:52', 99, '', 'Checks', '', '', '', '', 3),
(110, 1, 6, '2012-04-12 06:00:59', 0, '', ' Pinpoint Oxford - 60/40 Cotton Blend $49', ' Pinpoint Oxford ', ' Pinpoint Oxford ', '', 'D', 0);
INSERT INTO `Categories` (`ID`, `MerchantID`, `ProductTypeID`, `Dat`, `ParentID`, `Path`, `Name`, `Keywords`, `Description`, `Images`, `Status`, `Pos`) VALUES
(111, 1, 6, '2012-04-12 06:10:40', 14, '', ' Pinpoint Oxford ', '', ' <table align="center" width="95%">\r\n			    <tbody><tr><td width="26%"></td>\r\n			    <td width="30%">Less</td>\r\n			    <td align="right" width="30%">More</td>\r\n			    </tr>\r\n				<tr height="8"><td style="font-size: 11px;">Wrinkle</td><td colspan="2" align="left"><div style="background-color: rgb(255, 255, 255); width: 200px; border: 1px solid rgb(0, 52, 154); font-size: 7px; height: 6px;"><div style="background-color: rgb(0, 102, 204); width: 50px; font-size: 7px; height: 6px;"></div></div></td></tr>\r\n\r\n				<tr><td style="font-size: 11px;">Thickness</td><td colspan="2"><div style="background-color: rgb(255, 255, 255); width: 200px; border: 1px solid rgb(0, 52, 154); height: 6px; font-size: 7px;"><div style="background-color: rgb(0, 102, 204); width: 100px; font-size: 7px; height: 6px;"></div></div></td></tr>\r\n				<tr><td style="font-size: 11px;">Texture</td><td colspan="2"><div style="background-color: rgb(255, 255, 255); width: 200px; border: 1px solid rgb(0, 52, 154); font-size: 7px; height: 6px;"><div style="background-color: rgb(0, 102, 204); width: 30px; font-size: 7px; height: 6px;"></div></div></td></tr>\r\n				<tr><td style="font-size: 11px;">Shine</td><td colspan="2"><div style="background-color: rgb(255, 255, 255); width: 200px; border: 1px solid rgb(0, 52, 154); font-size: 7px; height: 6px;"><div style="background-color: rgb(0, 102, 204); width: 25px; font-size: 7px; height: 6px;"></div></div></td></tr>\r\n				<tr><td style="font-size: 11px;">Thread Count</td><td colspan="2"><div style="background-color: rgb(255, 255, 255); width: 200px; border: 1px solid rgb(0, 52, 154); font-size: 7px; height: 6px;"><div style="background-color: rgb(0, 102, 204); width: 180px; font-size: 7px; height: 6px;"></div></div></td></tr>\r\n  </tbody></table>\r\n <p>This timeless fabric is actually double-woven, using the finest yarns to create the signature subtle texture. Known for its Ivy League look, durability, and wrinkle resistance, our Pinpoint Oxford withstands the test of time', '', 'D', 2),
(112, 1, 6, '2012-04-12 07:09:02', 16, '', 'Checks/Plaids 100% Imported Cotton ', 'Checks/Plaids 100% Imported Cotton ', 'Checks/Plaids 100% Imported Cotton ', '', 'D', 0),
(113, 1, 6, '2012-04-12 07:09:36', 0, '', 'Checks/Plaids 100% Imported Cotton ', 'Checks/Plaids 100% Imported Cotton ', 'Checks/Plaids 100% Imported Cotton ', '', 'D', 0),
(114, 1, 6, '2014-11-14 15:14:07', 11, '0-11', 'Checks/Plaids 100% Imported Cotton', 'Checks/Plaids 100% Imported Cotton', '<table width="95%" align="center">\r\n   <tr><td width="26%"></td>\r\n    <td width="30%">Less</td>\r\n    <td width="30%" align="right">More</td>\r\n</tr>\r\n<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr>\r\n<td style="font-size:11px;">Texture</td>\r\n<td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\r\n<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\r\n </table><p>Checks squares and little boxes impart a sporty casual look. Dressed up with a spread collar and French cuffs they suggest posh British sophistication. Plaids make wonderful business casual shirts that can be worn open collared and still make a finished statement.</p>', '', '', 7),
(115, 0, 6, '2014-11-17 09:58:14', 12, '0-12', '100% Cotton Flannel Shirts ', '', '<br />\n			  <table width="95%" align="center">\n			    <tr><td width="26%"></td>\n			    <td width="30%">Less</td>\n			    <td width="30%" align="right">More</td>\n			    </tr>\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\n			  </table>\n			  <p> </p>\n\nChecks, squares, windowpanes, and plaids. Besides traditionally tailored shirts, dress shirts in these fabrics can be made to look sporty, with button-down collars for a casual look. For a posh, British look, plaids can be made with spread collars and French cuffs. Plaids and checks make\nwonderful business causal shirts that can be worn open collared and still make a finished statement.', '', '', 9),
(116, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Gingham Checks 100% Cotton', '', '100% Imported Deluxe Cotton', '', '', 17),
(117, 0, 6, '2014-11-21 14:19:46', 11, '0-11', '100% Cotton Flannel Shirts', '', '<br />\n			  <table width="95%" align="center">\n			    <tr><td width="26%"></td>\n			    <td width="30%">Less</td>\n			    <td width="30%" align="right">More</td>\n			    </tr>\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\n			  </table>\n			  <p> </p>\n\nChecks, squares, windowpanes, and plaids. Besides traditionally tailored shirts, dress shirts in these fabrics can be made to look sporty, with button-down collars for a casual look. For a posh, British look, plaids can be made with spread collars and French cuffs. Plaids and checks make\nwonderful business causal shirts that can be worn open collared and still make a finished statement.', '', '', 34),
(118, 0, 6, '2013-01-08 13:46:51', 0, '0-13', '100% Cotton Flannel Shirts', '', '<br />\n			  <table width="95%" align="center">\n			    <tr><td width="26%"></td>\n			    <td width="30%">Less</td>\n			    <td width="30%" align="right">More</td>\n			    </tr>\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\n			  </table>\n			  <p> </p>\n\nChecks, squares, windowpanes, and plaids. Besides traditionally tailored shirts, dress shirts in these fabrics can be made to look sporty, with button-down collars for a casual look. For a posh, British look, plaids can be made with spread collars and French cuffs. Plaids and checks make\nwonderful business causal shirts that can be worn open collared and still make a finished statement.', '', '', 27),
(119, 0, 6, '2015-01-01 10:12:07', 13, '0-13', '100% Cotton Flannel Shirts', '', '<br />\n			  <table width="95%" align="center">\n			    <tr><td width="26%"></td>\n			    <td width="30%">Less</td>\n			    <td width="30%" align="right">More</td>\n			    </tr>\n				<tr height="8"><td style="font-size:11px;">Wrinkle</td><td align="left" colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:50px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Thickness</td><td colspan="2"><div style="background-color:#FFFFFF; width:200px; border:#00349a 1px solid; height:6px; font-size:7px"><div style=" background-color:#0066CC; width:100px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Texture</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Shine</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid;  font-size:7px;height:6px"><div style=" background-color:#0066CC; width:5px; font-size:7px; height:6px" ></div></div></td></tr>\n				<tr><td style="font-size:11px;">Thread Count</td><td colspan="2"><div style="background-color:#FFFFFF;  width:200px; border:#00349a 1px solid; font-size:7px; height:6px"><div style=" background-color:#0066CC; width:150px; font-size:7px; height:6px" ></div></div></td></tr>\n			  </table>\n			  <p> </p>\n\nChecks, squares, windowpanes, and plaids. Besides traditionally tailored shirts, dress shirts in these fabrics can be made to look sporty, with button-down collars for a casual look. For a posh, British look, plaids can be made with spread collars and French cuffs. Plaids and checks make\nwonderful business causal shirts that can be worn open collared and still make a finished statement.', '', '', 12),
(120, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'European Super Fine Cotton 120s Thread Count (Regular Price <strike>$280</strike>) Sale Price  ', '', '', '', '', 1),
(121, 0, 6, '2014-11-14 14:10:53', 12, '0-12', 'New Arrivals Special Sale (Regular Price <strike>119</strike>) Sale Price   ', '', '', '', '', 2),
(122, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'SPECIAL SALE: LUXURY EUROPEAN SHIRTS REGULAR PRICE <strike>$150</strike> SALE PRICE ', '', '', '', '', 14),
(123, 0, 6, '2014-11-21 14:19:52', 11, '0-11', 'SPECIAL SALE: COTTON BLEND FASHION SHIRTS REGULAR PRICE <strike>$79</strike> SALE PRICE ', '', '', '', '', 12),
(124, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'White Luxury Fabric 120s Thread Count (Regular Price <strike>$280</strike>) Sale Price  ', '', '', '', '', 2),
(125, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'Tone-On-Tone 60/40 Cotton Blend  ', '', '', '', '', 20),
(126, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Warm Fabric Collection Series # 1 (Regular Price <strike>119</strike>) Sale Price   ', '', '', '', '', 15),
(127, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'Twill', '', '', '', '', 8),
(128, 0, 6, '2015-01-01 10:12:07', 13, '0-13', 'Textured', '', '', '', '', 9),
(129, 0, 6, '2014-11-14 15:15:06', 11, '0-11', 'Twill 100% Imported Cotton', '', '', '', '', 10),
(130, 0, 6, '2014-11-21 14:19:46', 11, '0-11', 'White on White 100% Imported Cotton', '', '', '', '', 21),
(131, 0, 6, '2014-11-14 15:14:59', 11, '0-11', 'Fashion Stripes - 100% Imported Cotton', '', '', '', '', 9),
(132, 0, 6, '2014-11-14 15:13:05', 11, '0-11', 'New Arrivals Special Sale (Regular Price <strike>79</strike>) Sale Price  ', '', '', '', '', 2),
(133, 0, 6, '2014-11-14 15:14:40', 11, '0-11', 'Fashion Checks/Plaids - 100% Imported Cotton', '', '', '', '', 8),
(134, 0, 6, '2014-11-21 14:19:52', 11, '0-11', 'Textured', '', '', '', '', 13),
(135, 0, 6, '2014-11-29 11:35:48', 12, '0-12', 'Black-On-Black 100% 2-Ply Egyption Cotton', '', '', '', '', 10),
(136, 0, 6, '2014-12-10 06:38:39', 12, '0-12', '100% Linen ', '', '', '', '', 0),
(137, 0, 6, '2014-12-31 13:18:14', 11, '0-11', 'Linen Blend', '', '', '', '', 7),
(138, 0, 6, '2015-01-01 11:52:57', 13, '0-13', 'Fashion Stripes - 100% Cotton', '', '', '', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `CP`
--

CREATE TABLE IF NOT EXISTS `cp` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MPID` int(10) unsigned DEFAULT '0',
  `Name` varchar(255) DEFAULT '',
  `Pos` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `MPID` (`MPID`,`Name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=716 ;

--
-- Dumping data for table `CP`
--

INSERT INTO `CP` (`ID`, `MPID`, `Name`, `Pos`) VALUES
(142, 3, '100% cotton', 1),
(701, 2, 'Herringbone', 7),
(619, 3, 'Cotton Blend', 2),
(616, 2, 'Checks', 3),
(148, 2, 'Stripes', 1),
(614, 2, 'Solids', 2),
(150, 4, '14', 0),
(151, 4, '14 1/2', 0),
(152, 4, '15', 0),
(153, 4, '15 1/2', 0),
(154, 4, '16 M', 0),
(155, 4, '16 L', 0),
(156, 4, '16 1/2 M', 0),
(157, 4, '16 1/2 L', 0),
(158, 4, '17 M', 0),
(159, 4, '17 L', 0),
(160, 4, '17 1/2 M', 0),
(161, 4, '17 1/2 L', 0),
(162, 5, 'Regular Cut', 0),
(163, 5, 'Slim Fit', 0),
(164, 5, 'Trim Fit', 0),
(165, 6, 'White', 1),
(166, 6, 'Snow', 2),
(167, 6, 'Honeydew', 3),
(168, 6, 'Mint Cream', 4),
(169, 6, 'Azure', 5),
(170, 6, 'Alice Blue', 6),
(171, 6, 'Ghost White', 7),
(172, 6, 'White Smoke', 8),
(173, 6, 'Seashell', 9),
(174, 6, 'Beige', 10),
(175, 6, 'Old Lace', 11),
(176, 6, 'Floral White', 12),
(177, 6, 'Ivory', 13),
(178, 6, 'Antique White', 14),
(179, 6, 'Linen', 15),
(180, 6, 'Lavender Blush', 16),
(181, 6, 'Misty Rose', 17),
(182, 6, 'Gainsboro', 18),
(183, 6, 'Light Grey', 19),
(184, 6, 'Silver', 20),
(185, 6, 'Dark Gray', 21),
(186, 6, 'Gray', 22),
(187, 6, 'Dim Gray', 23),
(188, 6, 'Light Slate Gray', 24),
(189, 6, 'Slate Gray', 25),
(190, 6, 'Dark Slate Gray', 26),
(191, 6, 'Black', 27),
(192, 6, 'Cornsilk', 28),
(193, 6, 'Blanched Almond', 29),
(194, 6, 'Bisque', 30),
(195, 6, 'Navajo White', 31),
(196, 6, 'Wheat', 32),
(197, 6, 'Burly Wood', 33),
(198, 6, 'Tan', 34),
(199, 6, 'Rosy Brown', 35),
(200, 6, 'Sandy Brown', 36),
(201, 6, 'Goldenrod', 37),
(202, 6, 'Dark Goldenrod', 38),
(203, 6, 'Peru', 39),
(204, 6, 'Chocolate', 40),
(205, 6, 'Saddle Brown', 41),
(206, 6, 'Sienna', 42),
(207, 6, 'Brown', 43),
(208, 6, 'Maroon', 44),
(209, 6, 'Indian Red', 45),
(210, 6, 'Light Coral', 46),
(211, 6, 'Salmon', 47),
(212, 6, 'Dark Salmon', 48),
(213, 6, 'Light Salmon', 49),
(214, 6, 'Crimson', 50),
(215, 6, 'Red', 51),
(216, 6, 'Fire Brick', 52),
(217, 6, 'Dark Red', 53),
(218, 6, 'Pink', 54),
(219, 6, 'Light Pink', 55),
(220, 6, 'Hot Pink', 56),
(221, 6, 'Deep Pink', 57),
(222, 6, 'Medium Violet Red', 58),
(223, 6, 'Pale Violet Red', 59),
(224, 6, 'Coral', 60),
(225, 6, 'Tomato', 61),
(226, 6, 'Orange Red', 62),
(227, 6, 'Dark Orange', 63),
(228, 6, 'Orange', 64),
(229, 6, 'Gold', 65),
(230, 6, 'Yellow', 66),
(231, 6, 'Light Yellow', 67),
(232, 6, 'Lemon Chiffon', 68),
(233, 6, 'Light Goldenrod Yellow', 69),
(234, 6, 'Papaya Whip', 70),
(235, 6, 'Moccasin', 71),
(236, 6, 'Peach Puff', 72),
(237, 6, 'Pale Goldenrod', 73),
(238, 6, 'Khaki', 74),
(239, 6, 'Dark Khaki', 75),
(240, 6, 'Lavender', 76),
(241, 6, 'Thistle', 77),
(242, 6, 'Plum', 78),
(243, 6, 'Violet', 79),
(244, 6, 'Orchid', 80),
(245, 6, 'Fuchsia', 81),
(246, 6, 'Magenta', 82),
(247, 6, 'Medium Orchid', 83),
(248, 6, 'Medium Purple', 84),
(249, 6, 'Amethyst', 85),
(250, 6, 'Blue Violet', 86),
(251, 6, 'Dark Violet', 87),
(252, 6, 'Dark Orchid', 88),
(253, 6, 'Dark Magenta', 89),
(254, 6, 'Purple', 90),
(255, 6, 'Indigo', 91),
(256, 6, 'Slate Blue', 92),
(257, 6, 'Dark Slate Blue', 93),
(258, 6, 'Medium Slate Blue', 94),
(259, 6, 'Green Yellow', 95),
(260, 6, 'Chartreuse', 96),
(261, 6, 'Lawn Green', 97),
(262, 6, 'Lime', 98),
(263, 6, 'Lime Green', 99),
(264, 6, 'Pale Green', 100),
(265, 6, 'Light Green', 101),
(266, 6, 'Medium Spring Green', 102),
(267, 6, 'Spring Green', 103),
(268, 6, 'Medium Sea Green', 104),
(269, 6, 'Sea Green', 105),
(270, 6, 'Forest Green', 106),
(271, 6, 'Green', 107),
(272, 6, 'Dark Green', 108),
(273, 6, 'Yellow Green', 109),
(274, 6, 'Olive Drab', 110),
(275, 6, 'Olive', 111),
(276, 6, 'Dark Olive Green', 112),
(277, 6, 'Medium Aquamarine', 113),
(278, 6, 'Dark Sea Green', 114),
(279, 6, 'Light Sea Green', 115),
(280, 6, 'Dark Cyan', 116),
(281, 6, 'Teal', 117),
(282, 6, 'Aqua', 118),
(283, 6, 'Cyan', 119),
(284, 6, 'Light Cyan', 120),
(285, 6, 'Pale Turquoise', 121),
(286, 6, 'Aquamarine', 122),
(287, 6, 'Turquoise', 123),
(288, 6, 'Medium Turquoise', 124),
(289, 6, 'Dark Turquoise', 125),
(290, 6, 'Cadet Blue', 126),
(291, 6, 'Steel Blue', 127),
(292, 6, 'Light Steel Blue', 0),
(293, 6, 'Powder Blue', 0),
(294, 6, 'Light Blue', 0),
(295, 6, 'Sky Blue', 0),
(296, 6, 'Light Sky Blue', 0),
(297, 6, 'Deep Sky Blue', 0),
(298, 6, 'Dodger Blue', 0),
(299, 6, 'Cornflower Blue', 0),
(300, 6, 'Royal Blue', 0),
(301, 6, 'Blue', 0),
(302, 6, 'Medium Blue', 0),
(303, 6, 'Dark Blue', 0),
(304, 6, 'Navy', 0),
(305, 6, 'Midnight Blue', 0),
(306, 7, '36', 0),
(307, 7, '38', 0),
(308, 7, '40', 0),
(309, 7, '42', 0),
(310, 7, '44', 0),
(311, 7, '46', 0),
(312, 8, '40%', 1),
(313, 8, '60%', 2),
(314, 8, '80%', 3),
(315, 8, '100%', 4),
(316, 9, 'None', 1),
(317, 9, 'Low', 2),
(318, 9, 'Medium', 3),
(319, 9, 'High', 4),
(618, 2, 'Textured', 5),
(692, 34, '70s', 0),
(691, 34, '60s', 0),
(617, 2, 'Plaids', 4),
(693, 34, '80s', 0),
(330, 11, 'Trendy', 0),
(331, 11, 'Modern', 0),
(332, 11, 'Traditional', 0),
(333, 12, '100%', 3),
(334, 12, '80%', 2),
(335, 12, '60%', 1),
(626, 13, 'Dressy Casual Shirt', 2),
(625, 13, 'Sport Shirt', 3),
(624, 13, 'Tuxedo Shirt', 4),
(374, 14, 'Lavender ', 0),
(375, 14, 'Light Blue', 0),
(364, 14, 'White', 0),
(365, 14, 'Black', 0),
(366, 14, 'Brown', 0),
(367, 14, 'Burgundy', 0),
(368, 14, 'Orange', 0),
(369, 14, 'Carnation Pink', 0),
(370, 14, 'Ecru', 0),
(371, 14, 'French Blue', 0),
(372, 14, 'Gray', 0),
(373, 14, 'Green', 0),
(376, 14, 'Olive Green', 0),
(377, 14, 'Purple', 0),
(378, 14, 'Red', 0),
(379, 14, 'Tan', 0),
(380, 14, 'Teal', 0),
(381, 14, 'Yellow', 0),
(662, 29, '41', 0),
(661, 29, '40', 0),
(660, 29, '39', 0),
(659, 29, '38', 0),
(658, 29, '37', 0),
(657, 29, '36', 0),
(656, 29, '35', 0),
(655, 29, '34', 0),
(654, 29, '33', 0),
(653, 29, '32', 0),
(652, 29, '31', 0),
(651, 29, '30', 0),
(649, 28, 'Yellow', 0),
(648, 28, 'White', 0),
(647, 28, 'Tan', 0),
(646, 28, 'Red', 0),
(645, 28, 'Pink', 0),
(678, 28, 'Royal Blue', 0),
(400, 14, 'Pink', 0),
(650, 29, '29', 0),
(643, 28, 'Olive', 0),
(642, 28, 'Orange', 0),
(641, 28, 'Purple', 0),
(640, 28, 'Light Blue', 0),
(639, 28, 'Lavender', 0),
(638, 28, 'Green', 0),
(637, 28, 'Gray', 0),
(679, 28, 'Navy', 0),
(680, 14, 'Charcoal', 0),
(632, 28, 'Brown', 0),
(631, 28, 'Beige', 0),
(630, 28, 'Blue', 0),
(629, 28, 'Black', 0),
(688, 33, 'Thick', 0),
(665, 4, '13', 0),
(664, 4, '13.5', 0),
(663, 29, '42', 0),
(700, 2, 'Twill', 6),
(690, 34, '50s', 0),
(627, 13, 'Dress Shirt', 1),
(699, 3, '100% Cotton Flannel Shirts', 3),
(668, 31, 'Spring', 0),
(669, 31, 'Summer', 0),
(670, 31, 'Autumn', 0),
(671, 31, 'Winter', 0),
(687, 33, 'Average', 0),
(686, 33, 'Think', 0),
(681, 14, 'Navy', 0),
(682, 32, 'S', 0),
(683, 32, 'M', 0),
(684, 32, 'L', 0),
(685, 32, 'XL', 0),
(689, 34, '40s', 0),
(694, 34, '90s', 0),
(695, 34, '100s', 0),
(696, 34, '110s', 0),
(697, 34, '120s', 0),
(698, 34, '140s', 0),
(703, 28, 'Ecru', 0),
(704, 28, 'Charcoal', 0),
(705, 28, 'Chambray', 0),
(706, 28, 'Burgundy', 0),
(707, 2, 'Egyption Cotton', 8),
(708, 2, 'Hairline Stripe', 9),
(709, 2, 'Jacquard', 10),
(710, 2, 'Pinpoint', 11),
(711, 2, 'Broadcloth', 12),
(712, 4, 'S', 0),
(713, 4, 'M', 0),
(714, 4, 'L', 0),
(715, 4, 'XL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Email` varchar(100) DEFAULT '' COMMENT 'Email Address',
  `Password` varchar(100) DEFAULT NULL COMMENT 'Password',
  `Name` varchar(100) DEFAULT '' COMMENT 'Full Name',
  `Status` int(11) NOT NULL DEFAULT '1' COMMENT 'Status',
  `remember_token` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`,`Status`),
  UNIQUE KEY `Email` (`Email`),
  KEY `status_key_idx` (`Status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Merchants, Suppliers, ETC' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Dat`, `Email`, `Password`, `Name`, `Status`, `remember_token`) VALUES
(14, '2016-08-04 17:44:04', 'arafay@gmail.com', '$2y$10$bANt78a3CVmEMs/5fVDt9eYNwbY37zs4osR/hBVCaqiw9L.NrBf5y', 'Abdul Rafay', 1, 'oAFBRbR4lmPbouBas473Q7BSPFViqrcWNFTmZXwDeMfGN5QCdxnv6ZzrUrms');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(255) DEFAULT '' COMMENT 'Title',
  `Name` varchar(255) DEFAULT '' COMMENT 'Name',
  `RefTable` varchar(255) DEFAULT '' COMMENT 'RefTable',
  `RefID` int(10) unsigned DEFAULT '0' COMMENT 'RefID',
  `Pos` tinyint(3) unsigned DEFAULT '0',
  `ZoomImg` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Images' AUTO_INCREMENT=45 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `Dat`, `Title`, `Name`, `RefTable`, `RefID`, `Pos`, `ZoomImg`) VALUES
(2, '2016-07-30 03:00:19', '', '95157.png', 'Products', 1, 0, 0),
(44, '2016-08-03 13:00:49', '', '26540.png', 'Products', 1, 0, 0),
(41, '2016-08-06 11:36:54', '', '44189.jpg', 'Products', 39, 0, 1),
(40, '2016-08-03 12:31:04', '', '38490.jpg', 'Products', 39, 0, 0),
(39, '2016-08-03 12:31:04', '', '57996.png', 'Products', 39, 0, 0),
(38, '2016-08-03 12:31:04', '', '92770.png', 'Products', 39, 0, 0),
(37, '2016-08-02 11:55:19', '', '38948.png', 'Products', 38, 0, 1),
(36, '2016-08-02 11:55:19', '', '39716.png', 'Products', 38, 0, 0),
(35, '2016-08-02 11:55:19', '', '79058.png', 'Products', 38, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE IF NOT EXISTS `merchants` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Email` varchar(100) DEFAULT '' COMMENT 'Email Address',
  `Password` varchar(100) DEFAULT NULL COMMENT 'Password',
  `Name` varchar(100) DEFAULT '' COMMENT 'Full Name',
  `Phone` varchar(100) DEFAULT '' COMMENT 'Phone Number',
  `Company` int(11) NOT NULL DEFAULT '1' COMMENT 'Company',
  `Logo` varchar(100) DEFAULT '' COMMENT 'Logo',
  `Address` varchar(100) DEFAULT '' COMMENT 'Address',
  `City` varchar(100) DEFAULT '' COMMENT 'City',
  `State` varchar(100) DEFAULT '' COMMENT 'State',
  `ZipCode` varchar(30) DEFAULT '' COMMENT 'Zip/Postal Code',
  `Country` varchar(100) DEFAULT '' COMMENT 'Country',
  `Type` varchar(100) DEFAULT '' COMMENT 'Type of Merchant',
  `Flow` tinyint(3) unsigned DEFAULT '0' COMMENT 'Up/down',
  `SyncURL` varchar(255) DEFAULT '' COMMENT 'URL of API',
  `Status` int(11) NOT NULL DEFAULT '1' COMMENT 'Status',
  `Comments` varchar(2000) DEFAULT '',
  `remember_token` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`,`Status`),
  UNIQUE KEY `Email` (`Email`),
  KEY `status_key_idx` (`Status`),
  KEY `company_key_idx` (`Company`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Merchants, Suppliers, ETC' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`ID`, `Dat`, `Email`, `Password`, `Name`, `Phone`, `Company`, `Logo`, `Address`, `City`, `State`, `ZipCode`, `Country`, `Type`, `Flow`, `SyncURL`, `Status`, `Comments`, `remember_token`) VALUES
(1, '2016-08-04 17:44:04', 'arafaysh@giorgenti.com', '$2y$10$bANt78a3CVmEMs/5fVDt9eYNwbY37zs4osR/hBVCaqiw9L.NrBf5y', 'Abdul Rafay', '03346461464', 1, '', 'Sabzazaar Scheme', 'Lahore', 'Pakistan', '54000', 'Pakistan', 'Merchant', 0, '', 1, '', 'oAFBRbR4lmPbouBas473Q7BSPFViqrcWNFTmZXwDeMfGN5QCdxnv6ZzrUrms'),
(9, '2016-08-04 17:44:04', 'arafay@giorgenti.com', '$2y$10$VfvUVpemn82kDDhhO.P.R.tEdm4rEVxnUYFiR/Q8bc282HU2nHNpq', 'Abdul Rafay', '03346461464', 1, '', 'Sabzazaar Scheme', 'Lahore', 'Pakistan', '54000', 'Pakistan', 'Dealer', 0, '', 2, '', 'y2YF7AI3RV14krzCHUTmpsa6WJr6LzqdvBq03Vf1yqvBJGjanHIQv8VSNoVQ'),
(11, '2016-08-04 17:44:04', 'master@giorgenti.com', '$2y$10$LzjzglIodEXcrnnRd1nOx.DahVjjT6kn8FJipikVhNlvXsGZT1e2i', 'Abdul Rafay Shaikh', '321', 1, '', 'Sabzazaar Scheme 321', 'Lahore Punjab 321', 'Pakistan, 321', '12345 321', 'Pakistan, 321', 'Dealer', 0, '', 1, '', ''),
(13, '2016-08-04 12:57:14', 'rafay@gmail.com', '$2y$10$LXGBXpWSeOUKStElp24Gvekm08EFoo0FOmp2zRLX/PTwgZPCSfjWO', 'Abdul Rafay', '03346461464', 2, '', 'Sabzazaar Scheme,', 'Lahore', 'Pakistan', '123', 'Pakistan', 'Dealer', 0, '', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `MP`
--

CREATE TABLE IF NOT EXISTS `mp` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MerchantID` int(10) unsigned DEFAULT '0',
  `ProductTypeID` int(10) unsigned DEFAULT '0',
  `Name` varchar(255) DEFAULT '',
  `Type` varchar(10) DEFAULT '',
  `Pos` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `MPR` (`MerchantID`,`ProductTypeID`,`Name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `MP`
--

INSERT INTO `MP` (`ID`, `MerchantID`, `ProductTypeID`, `Name`, `Type`, `Pos`) VALUES
(2, 0, 6, 'Pattern', 'CheckBox', 4),
(3, 0, 6, 'Fabric Type', 'CheckBox', 5),
(4, 0, 1, 'Size', 'CheckBox', 0),
(5, 0, 1, 'Fitting', 'CheckBox', 0),
(6, 0, 1, 'Color', 'Color', 0),
(7, 0, 3, 'Size', 'Select', 0),
(8, 0, 6, 'Opacity', 'Radio', 6),
(9, 0, 6, 'Shine', 'Radio', 7),
(33, 0, 6, 'Thickness', 'Radio', 3),
(11, 0, 6, 'Custom Type', 'CheckBox', 12),
(12, 0, 6, 'Wrinkle Resistance', 'Radio', 10),
(13, 0, 6, 'Shirt Style', 'CheckBox', 8),
(14, 0, 6, 'Contrast Colors', 'Colors2', 2),
(28, 0, 6, 'Search Colors', 'Color', 1),
(29, 0, 2, 'Size', 'Select', 0),
(31, 0, 6, 'Season', 'CheckBox', 9),
(32, 0, 4, 'Size:', 'Select', 0),
(34, 0, 6, 'Threadcount', 'Radio', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT NULL,
  `GOrderNo` varchar(255) DEFAULT NULL,
  `Code` int(11) DEFAULT NULL,
  `OrderType` varchar(100) DEFAULT NULL,
  `PlacedFor` varchar(50) DEFAULT NULL,
  `Price` decimal(19,4) DEFAULT NULL,
  `OtherItem` decimal(19,4) DEFAULT NULL,
  `SalesTax` decimal(19,4) DEFAULT NULL,
  `Discount` decimal(19,4) DEFAULT NULL,
  `Shiping` decimal(19,4) DEFAULT NULL,
  `Deal` decimal(19,4) DEFAULT NULL,
  `Mono` decimal(19,4) DEFAULT NULL,
  `WhiteCollar` decimal(19,4) DEFAULT NULL,
  `WhiteCuff` decimal(19,4) DEFAULT NULL,
  `PleatedFront` decimal(19,4) DEFAULT NULL,
  `TuxFront` decimal(19,4) DEFAULT NULL,
  `LessShirt` decimal(19,4) DEFAULT NULL,
  `Custom` decimal(19,4) DEFAULT NULL,
  `OverSize` decimal(19,4) DEFAULT NULL,
  `Pocket` decimal(19,4) DEFAULT NULL,
  `Rush` decimal(19,4) DEFAULT NULL,
  `Sleeve` decimal(19,4) DEFAULT NULL,
  `Tail` decimal(19,4) DEFAULT NULL,
  `DiffCollar` decimal(19,4) DEFAULT NULL,
  `Amount` decimal(19,4) DEFAULT NULL,
  `Paid` decimal(19,4) DEFAULT NULL,
  `TransferTo` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `TrackingNo` varchar(200) DEFAULT NULL,
  `OnTime` varchar(200) DEFAULT NULL,
  `Must` varchar(10) DEFAULT NULL,
  `Comments` longtext,
  `Description` longtext,
  `StatusText` longtext,
  `OrderDate` datetime(6) DEFAULT NULL,
  `PromiseDate` datetime(6) DEFAULT NULL,
  `DeliveryDate` datetime(6) DEFAULT NULL,
  `TentitiveShipDate` datetime(6) DEFAULT NULL,
  `ProductionDate` datetime(6) DEFAULT NULL,
  `ShipDate` datetime(6) DEFAULT NULL,
  `CallDate` datetime(6) DEFAULT NULL,
  `ActionTaken` varchar(1000) DEFAULT NULL,
  `SalesPerson` varchar(50) DEFAULT NULL,
  `SubmittedBy` varchar(50) DEFAULT NULL,
  `Level1Status` varchar(100) DEFAULT NULL,
  `ShipMethod` varchar(100) DEFAULT NULL,
  `CustomerName` varchar(254) DEFAULT NULL,
  `ShippingAddress` longtext,
  `SizeID` int(11) DEFAULT NULL,
  `Site` smallint(6) DEFAULT NULL,
  `DirectShipment` varchar(100) DEFAULT NULL,
  `NotSure` varchar(10) DEFAULT NULL,
  `MailingID` int(11) DEFAULT NULL,
  `Extra` decimal(19,4) DEFAULT NULL,
  `ExtraCharges` decimal(19,4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `status_key_orderstatus_idx` (`Status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `CustomerID`, `GOrderNo`, `Code`, `OrderType`, `PlacedFor`, `Price`, `OtherItem`, `SalesTax`, `Discount`, `Shiping`, `Deal`, `Mono`, `WhiteCollar`, `WhiteCuff`, `PleatedFront`, `TuxFront`, `LessShirt`, `Custom`, `OverSize`, `Pocket`, `Rush`, `Sleeve`, `Tail`, `DiffCollar`, `Amount`, `Paid`, `TransferTo`, `Status`, `TrackingNo`, `OnTime`, `Must`, `Comments`, `Description`, `StatusText`, `OrderDate`, `PromiseDate`, `DeliveryDate`, `TentitiveShipDate`, `ProductionDate`, `ShipDate`, `CallDate`, `ActionTaken`, `SalesPerson`, `SubmittedBy`, `Level1Status`, `ShipMethod`, `CustomerName`, `ShippingAddress`, `SizeID`, `Site`, `DirectShipment`, `NotSure`, `MailingID`, `Extra`, `ExtraCharges`) VALUES
(9, 1, '1989', 1875, '', '', '750.0000', '0.0000', '2.0000', '2.0000', '15.0000', '0.0000', '0.0000', '5.0000', '5.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '5.0000', '750.0000', '0.0000', 0, 1, '3396', '', '', '', '', '', '2016-08-07 09:48:27.000000', '2016-08-17 09:48:27.000000', '2016-08-17 09:48:27.000000', '2016-08-17 09:48:27.000000', '2016-08-17 09:48:27.000000', '2016-08-17 09:48:27.000000', '2016-08-15 09:48:27.000000', '', '', 'MCT', '', '', 'Abdul Rafay', '', 2, 0, '', '', 0, '0.0000', '0.0000'),
(12, 1, '4350', 2438, '', '', '750.0000', '0.0000', '2.0000', '2.0000', '15.0000', '0.0000', '0.0000', '5.0000', '5.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '5.0000', '750.0000', '0.0000', 0, 1, '4225', '', '', '', '', '', '2016-08-07 11:38:10.000000', '2016-08-17 11:38:10.000000', '2016-08-17 11:38:10.000000', '2016-08-17 11:38:10.000000', '2016-08-17 11:38:10.000000', '2016-08-17 11:38:10.000000', '2016-08-15 11:38:10.000000', '', '', 'MCT', '', '', 'Abdul Rafay', '', 2, 0, '', '', 0, '0.0000', '0.0000');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE IF NOT EXISTS `orderstatus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Description` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`ID`, `Name`, `Description`) VALUES
(1, 'Paid', ''),
(2, 'Unpaid', ''),
(3, 'Save For Later', '');

-- --------------------------------------------------------

--
-- Table structure for table `ProductDetails`
--

CREATE TABLE IF NOT EXISTS `productdetails` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProductID` int(10) unsigned NOT NULL,
  `RefTable` varchar(100) NOT NULL,
  `RefID` int(10) unsigned NOT NULL,
  `Extra` varchar(255) DEFAULT '',
  `POS` tinyint(4) DEFAULT '0',
  `Def` varchar(1) DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `PRR` (`ProductID`,`RefTable`,`RefID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Product Details' AUTO_INCREMENT=404 ;

--
-- Dumping data for table `ProductDetails`
--

INSERT INTO `ProductDetails` (`ID`, `ProductID`, `RefTable`, `RefID`, `Extra`, `POS`, `Def`) VALUES
(352, 1, 'CP', 688, '', 0, ''),
(351, 1, 'CP', 312, '', 0, ''),
(350, 1, 'Categories', 32, '', 0, ''),
(349, 1, 'Categories', 24, '', 0, ''),
(348, 1, 'Categories', 13, '', 0, ''),
(347, 1, 'CP', 670, '', 0, ''),
(346, 1, 'CP', 629, '', 0, ''),
(345, 1, 'CP', 631, '', 0, ''),
(344, 1, 'CP', 367, '', 0, ''),
(343, 1, 'CP', 366, '', 0, ''),
(342, 1, 'CP', 627, '', 0, ''),
(341, 1, 'CP', 332, '', 0, ''),
(340, 1, 'CP', 331, '', 0, ''),
(339, 1, 'CP', 699, '', 0, ''),
(338, 1, 'CP', 616, '', 0, ''),
(337, 1, 'CP', 711, '', 0, ''),
(284, 39, 'Categories', 110, '', 0, ''),
(283, 39, 'CP', 629, '', 0, ''),
(282, 39, 'CP', 631, '', 0, ''),
(281, 39, 'CP', 366, '', 0, ''),
(280, 39, 'CP', 365, '', 0, ''),
(279, 38, 'CP', 333, '', 0, ''),
(278, 38, 'CP', 319, '', 0, ''),
(277, 38, 'CP', 695, '', 0, ''),
(276, 38, 'CP', 687, '', 0, ''),
(275, 38, 'CP', 315, '', 0, ''),
(274, 38, 'Categories', 38, '', 0, ''),
(273, 38, 'Categories', 118, '', 0, ''),
(272, 38, 'Categories', 110, '', 0, ''),
(271, 38, 'CP', 668, '', 0, ''),
(270, 38, 'CP', 670, '', 0, ''),
(269, 38, 'CP', 629, '', 0, ''),
(268, 38, 'CP', 631, '', 0, ''),
(267, 38, 'CP', 366, '', 0, ''),
(266, 38, 'CP', 365, '', 0, ''),
(265, 38, 'CP', 626, '', 0, ''),
(264, 38, 'CP', 627, '', 0, ''),
(202, 34, 'CP', 709, '', 0, ''),
(263, 38, 'CP', 332, '', 0, ''),
(262, 38, 'CP', 331, '', 0, ''),
(261, 38, 'CP', 699, '', 0, ''),
(260, 38, 'CP', 142, '', 0, ''),
(259, 38, 'CP', 707, '', 0, ''),
(258, 38, 'CP', 616, '', 0, ''),
(182, 34, 'CP', 1, '', 0, ''),
(181, 34, 'Categories', 38, '', 0, ''),
(180, 34, 'Categories', 12, '', 0, ''),
(179, 34, 'CP', 695, '', 0, ''),
(178, 34, 'CP', 668, '', 0, ''),
(177, 34, 'CP', 670, '', 0, ''),
(176, 34, 'CP', 626, '', 0, ''),
(175, 34, 'CP', 627, '', 0, ''),
(174, 34, 'CP', 335, '', 0, ''),
(173, 34, 'CP', 332, '', 0, ''),
(172, 34, 'CP', 331, '', 0, ''),
(171, 34, 'CP', 687, '', 0, ''),
(170, 34, 'CP', 317, '', 0, ''),
(169, 34, 'CP', 313, '', 0, ''),
(168, 34, 'CP', 699, '', 0, ''),
(167, 34, 'CP', 707, '', 0, ''),
(257, 38, 'CP', 711, '', 0, ''),
(285, 39, 'Categories', 118, '', 0, ''),
(286, 39, 'Categories', 113, '', 0, ''),
(287, 39, 'CP', 315, '', 0, ''),
(288, 39, 'CP', 687, '', 0, ''),
(289, 39, 'CP', 695, '', 0, ''),
(290, 39, 'CP', 319, '', 0, ''),
(291, 39, 'CP', 333, '', 0, ''),
(353, 1, 'CP', 697, '', 0, ''),
(354, 1, 'CP', 317, '', 0, ''),
(355, 1, 'CP', 335, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProductTypeID` int(10) unsigned DEFAULT '0',
  `MerchantID` int(10) unsigned DEFAULT '0',
  `GroupID` int(10) unsigned DEFAULT '0',
  `Basic` tinyint(1) DEFAULT '0',
  `Qty` double DEFAULT '0',
  `QtySold` double DEFAULT '0',
  `Price` double unsigned DEFAULT '0',
  `Weight` double unsigned DEFAULT '0',
  `Code` varchar(50) DEFAULT '',
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(5000) DEFAULT NULL,
  `MetaTitle` varchar(255) DEFAULT NULL,
  `MetaKeywords` varchar(255) DEFAULT NULL,
  `MetaDescription` varchar(255) DEFAULT NULL,
  `Dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EnableExpiry` tinyint(1) DEFAULT '0',
  `ExpiryDate` date DEFAULT NULL,
  `Pos` smallint(5) unsigned DEFAULT '0',
  `Status` int(11) NOT NULL DEFAULT '1',
  `MRID` smallint(5) unsigned DEFAULT '0',
  `MRProductID` int(10) unsigned DEFAULT '0',
  `Linked` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Code` (`MerchantID`,`Code`),
  KEY `status_key_idx` (`Status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Products' AUTO_INCREMENT=40 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `ProductTypeID`, `MerchantID`, `GroupID`, `Basic`, `Qty`, `QtySold`, `Price`, `Weight`, `Code`, `Name`, `Description`, `MetaTitle`, `MetaKeywords`, `MetaDescription`, `Dat`, `EnableExpiry`, `ExpiryDate`, `Pos`, `Status`, `MRID`, `MRProductID`, `Linked`) VALUES
(1, 6, 1, 0, 1, 123, 12, 32, 14, '321', 'Fineline Dress Shirt', 'Fineline Dress Shirt Description', 'Fineline Dress Shirt Title', 'Fineline Dress Shirt Keywords', 'Fineline Dress Shirt Meta Description', '2016-08-03 13:00:49', 0, '0000-00-00', 0, 1, 0, 0, 0),
(34, 6, 1, 0, 1, 12, 0, 321, 321, '096', '', '', '', '', '', '2016-08-02 11:29:50', 0, '0000-00-00', 0, 1, 0, 0, 0),
(36, 6, 1, 0, 1, 12, 12, 321, 321, '096wq', 'Abdul Rafay', 'Description', 'Meta Title', 'Meta Keywords', 'Meta Description', '2016-08-02 11:37:52', 0, '0000-00-00', 0, 1, 0, 0, 0),
(38, 6, 1, 0, 0, 1233, 1233, 1233, 1233, '096we1233', 'Dress Shirt 1233', 'Description 1233', 'Meta Title 1233', 'Meta Keywords 1233', 'Meta Description 1233', '2016-08-03 12:28:57', 0, '0000-00-00', 0, 1, 0, 0, 0),
(39, 6, 1, 0, 1, 651, 65, 65, 65, '096fa', 'Blue Dress Shirt', 'Blue Dress Shirt Description', 'Blue Dress Shirt Meta Title', 'Blue Dress Shirt Meta Keywords', 'Blue Dress Shirt Meta Description', '2016-08-03 12:31:04', 0, '0000-00-00', 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productstatus`
--

CREATE TABLE IF NOT EXISTS `productstatus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `productstatus`
--

INSERT INTO `productstatus` (`ID`, `Name`, `Description`) VALUES
(1, 'Active', NULL),
(2, 'Inactive', NULL),
(3, 'Deleted', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shirtdetail`
--

CREATE TABLE IF NOT EXISTS `shirtdetail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) DEFAULT '0',
  `SizeID` int(11) DEFAULT '0',
  `FabricCode` varchar(50) DEFAULT '',
  `FabricColor` varchar(255) DEFAULT '',
  `FabricContents` varchar(255) DEFAULT '',
  `Qty` int(11) DEFAULT '1',
  `FabricPrice` decimal(19,4) DEFAULT '0.0000',
  `Total` decimal(19,4) DEFAULT '0.0000',
  `ExtraCharges` decimal(19,4) DEFAULT '0.0000',
  `Discount` decimal(19,4) DEFAULT '0.0000',
  `CollarStyle` varchar(200) DEFAULT '',
  `CollarLength` varchar(50) DEFAULT '',
  `CollarHeight` varchar(50) DEFAULT '',
  `WhiteCollar` varchar(50) DEFAULT '',
  `CollarTieSpace` varchar(50) DEFAULT '',
  `CollarStays` varchar(50) DEFAULT '',
  `CollarLining` varchar(50) DEFAULT '',
  `CollarStitch` varchar(50) DEFAULT '',
  `FrontStyle` varchar(200) DEFAULT '',
  `FrontClosure` varchar(50) DEFAULT '',
  `BackStyle` varchar(200) DEFAULT '',
  `ShirtBottomStyle` varchar(30) DEFAULT '',
  `CuffStyle` varchar(200) DEFAULT '',
  `WhiteCuffs` varchar(50) DEFAULT '',
  `CuffLining` varchar(50) DEFAULT '',
  `CuffStitch` varchar(50) DEFAULT '',
  `HalfSleeve` varchar(50) DEFAULT '',
  `Monogram` varchar(200) DEFAULT '',
  `MonoPosition` varchar(50) DEFAULT '',
  `MonoColor` varchar(50) DEFAULT '',
  `MonoInitials` varchar(50) DEFAULT '',
  `PocketStyle` varchar(200) DEFAULT '',
  `NumberOfPockets` int(11) DEFAULT '0',
  `PleatedPocket` varchar(50) DEFAULT '',
  `PocketFlaps` varchar(50) DEFAULT '',
  `ShirtType` varchar(50) DEFAULT '',
  `Deal` varchar(50) DEFAULT '',
  `StyleComments` longtext,
  `Dat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Fit` varchar(50) DEFAULT '',
  `FedEx` varchar(50) DEFAULT '',
  `TransferToLevel1` int(11) DEFAULT '0',
  `TransferDate1` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Level1PromiseDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Level1TentitiveDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Level1Ship` int(11) DEFAULT '0',
  `ShipDate1` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `TransferToLevel2` int(11) DEFAULT '0',
  `TransferDate2` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Level2Ship` int(11) DEFAULT '0',
  `ShipDate2` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ShipToCustomer` int(11) DEFAULT '0',
  `CustomerShipDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `StatusID` int(11) DEFAULT '0',
  `ShirtStatus` varchar(500) DEFAULT '',
  `Status` varchar(50) DEFAULT 'N',
  `SleevePlacketButton` varchar(20) DEFAULT '',
  `Label` varchar(30) DEFAULT '',
  `Class` varchar(255) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shirtdetail`
--

INSERT INTO `shirtdetail` (`ID`, `OrderID`, `SizeID`, `FabricCode`, `FabricColor`, `FabricContents`, `Qty`, `FabricPrice`, `Total`, `ExtraCharges`, `Discount`, `CollarStyle`, `CollarLength`, `CollarHeight`, `WhiteCollar`, `CollarTieSpace`, `CollarStays`, `CollarLining`, `CollarStitch`, `FrontStyle`, `FrontClosure`, `BackStyle`, `ShirtBottomStyle`, `CuffStyle`, `WhiteCuffs`, `CuffLining`, `CuffStitch`, `HalfSleeve`, `Monogram`, `MonoPosition`, `MonoColor`, `MonoInitials`, `PocketStyle`, `NumberOfPockets`, `PleatedPocket`, `PocketFlaps`, `ShirtType`, `Deal`, `StyleComments`, `Dat`, `Fit`, `FedEx`, `TransferToLevel1`, `TransferDate1`, `Level1PromiseDate`, `Level1TentitiveDate`, `Level1Ship`, `ShipDate1`, `TransferToLevel2`, `TransferDate2`, `Level2Ship`, `ShipDate2`, `ShipToCustomer`, `CustomerShipDate`, `StatusID`, `ShirtStatus`, `Status`, `SleevePlacketButton`, `Label`, `Class`) VALUES
(1, 9, 2, '332', 'Black', 'FabricContents', 1, '32.0000', '32.0000', '0.0000', '0.0000', 'Button Down', 'Short', 'Short', '1', '', '', '', '', 'Fly Front', '', '', '', 'Square French Cuff', '1', '', '', '', 'Block Letter', 'Cuff', 'Black', 'AR', 'Regular Pocket', 1, '', '', 'Dress', '', '', '2016-08-07 04:48:27', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-08-17 04:48:27', 0, '2016-08-17 04:48:27', 0, '2016-08-17 04:48:27', 0, '2016-08-17 04:48:27', 1, '1', '1', '', '', ''),
(2, 12, 2, '1214', 'Black', 'FabricContents', 1, '32.0000', '32.0000', '0.0000', '0.0000', 'Button Down', 'Short', 'Short', '1', '', '', '', '', 'Fly Front', '', '', '', 'Square French Cuff', '1', '', '', '', 'Block Letter', 'Cuff', 'Black', 'AR', 'Regular Pocket', 1, '', '', 'Dress', '', '', '2016-08-07 06:38:10', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-08-17 06:38:10', 0, '2016-08-17 06:38:10', 0, '2016-08-17 06:38:10', 0, '2016-08-17 06:38:10', 1, '1', '1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT NULL,
  `SizeOption` int(11) DEFAULT NULL,
  `HeightInches` varchar(50) DEFAULT NULL,
  `HeightFeet` varchar(50) DEFAULT NULL,
  `Weight` varchar(50) DEFAULT NULL,
  `NeckHeight` varchar(50) DEFAULT NULL,
  `NeckSize` varchar(50) DEFAULT NULL,
  `LeftSleeve` varchar(50) DEFAULT NULL,
  `RightSleeve` varchar(50) DEFAULT NULL,
  `Chest` varchar(50) DEFAULT NULL,
  `Waist` varchar(50) DEFAULT NULL,
  `Hips` varchar(50) DEFAULT NULL,
  `Yoke` varchar(50) DEFAULT NULL,
  `Tail` varchar(50) DEFAULT NULL,
  `LeftCuff` varchar(50) DEFAULT NULL,
  `RightCuff` varchar(50) DEFAULT NULL,
  `FittingOption` varchar(50) DEFAULT NULL,
  `Posture` varchar(50) DEFAULT NULL,
  `ChestDescription` varchar(50) DEFAULT NULL,
  `ArmType` varchar(50) DEFAULT NULL,
  `BodyShape` varchar(2000) DEFAULT NULL,
  `BodyProportion` varchar(50) DEFAULT NULL,
  `ShoulderLine` varchar(50) DEFAULT NULL,
  `Shoulder` varchar(50) DEFAULT NULL,
  `ExtraShirtTail` varchar(50) DEFAULT NULL,
  `ShorterShirtTail` varchar(50) DEFAULT NULL,
  `FitAroundChestShoulder` varchar(50) DEFAULT NULL,
  `FitAroundWaist` varchar(50) DEFAULT NULL,
  `CoatSize` varchar(50) DEFAULT NULL,
  `PantSize` varchar(50) DEFAULT NULL,
  `Inseam` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Comments` longtext,
  `Dat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `CoatLength` varchar(50) DEFAULT NULL,
  `Confirm` varchar(50) DEFAULT NULL,
  `SleeveFullnessInBicep` varchar(20) DEFAULT '',
  `ArmHole` varchar(20) DEFAULT '',
  `RaiseCollar` varchar(20) DEFAULT '',
  `SleeveFullnessIntoCuff` varchar(20) DEFAULT '',
  `BackDart` varchar(20) DEFAULT '',
  `ScoopFrontNeck` varchar(20) DEFAULT '',
  `SalesPerson` varchar(40) DEFAULT '',
  `DecideOn` varchar(50) DEFAULT '',
  `ShirtNeckSize` varchar(15) DEFAULT '',
  `ShirtLength` varchar(20) DEFAULT '',
  `MidSection` varchar(30) DEFAULT '',
  `BiggestChallenge` longtext,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`ID`, `CustomerID`, `SizeOption`, `HeightInches`, `HeightFeet`, `Weight`, `NeckHeight`, `NeckSize`, `LeftSleeve`, `RightSleeve`, `Chest`, `Waist`, `Hips`, `Yoke`, `Tail`, `LeftCuff`, `RightCuff`, `FittingOption`, `Posture`, `ChestDescription`, `ArmType`, `BodyShape`, `BodyProportion`, `ShoulderLine`, `Shoulder`, `ExtraShirtTail`, `ShorterShirtTail`, `FitAroundChestShoulder`, `FitAroundWaist`, `CoatSize`, `PantSize`, `Inseam`, `Status`, `Comments`, `Dat`, `CoatLength`, `Confirm`, `SleeveFullnessInBicep`, `ArmHole`, `RaiseCollar`, `SleeveFullnessIntoCuff`, `BackDart`, `ScoopFrontNeck`, `SalesPerson`, `DecideOn`, `ShirtNeckSize`, `ShirtLength`, `MidSection`, `BiggestChallenge`) VALUES
(2, 1, 0, '1', '3', '91', 'Short', '12', '', '', '30', '25', '', '', '', '', '', '', 'Flat', 'Slender', 'Slender', 'Average', 'Evenly Proportioned', '', 'Sloping', '', '', '', '', '', '', '', 'A', '', '2016-08-07 06:38:10', '', '', '', '', '', '', '', '', '', '', '12', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usercompany`
--

CREATE TABLE IF NOT EXISTS `usercompany` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Location` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usercompany`
--

INSERT INTO `usercompany` (`id`, `Name`, `Location`) VALUES
(1, 'Production', ''),
(2, 'Main Store', ''),
(3, 'M M Alam', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `UserName` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `DateTime` datetime NOT NULL,
  `StatusID` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `DateTime`, `StatusID`, `remember_token`) VALUES
(1, 'fasd', 'afsd', 'arafa', 'arafaysh@giorgenti.com', '$2y$10$9EUpvFZoTT1zRu5aeep/ku/ZLGjXd274.J/myi4w3yPY7sPAudZRG', '0000-00-00 00:00:00', 1, 'Tq3McMv3MdGoTGb6bOKEzQoWp86YBqDQ9CZqtauYmBuiLTh4qLKtdnLoktaZ');

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE IF NOT EXISTS `userstatus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`ID`, `Name`, `Description`) VALUES
(1, 'Active', NULL),
(2, 'Inactive', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `status_key_foreign_customer` FOREIGN KEY (`Status`) REFERENCES `userstatus` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `merchants`
--
ALTER TABLE `merchants`
  ADD CONSTRAINT `campany_foreign_key` FOREIGN KEY (`Company`) REFERENCES `usercompany` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_key_foreign` FOREIGN KEY (`Status`) REFERENCES `userstatus` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `status_key_orderstatus` FOREIGN KEY (`Status`) REFERENCES `orderstatus` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `status_key` FOREIGN KEY (`Status`) REFERENCES `productstatus` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
