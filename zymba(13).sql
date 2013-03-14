-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 31, 2012 at 07:16 AM
-- Server version: 5.1.36
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zymba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `intid` int(11) NOT NULL AUTO_INCREMENT,
  `varfirstname` varchar(155) COLLATE utf8_bin NOT NULL,
  `varlastname` varchar(155) COLLATE utf8_bin NOT NULL,
  `varusername` varchar(155) COLLATE utf8_bin NOT NULL,
  `varpassword` varchar(155) COLLATE utf8_bin NOT NULL,
  `varemailid` text COLLATE utf8_bin NOT NULL,
  `varphoneno` varchar(155) COLLATE utf8_bin NOT NULL,
  `address` varchar(400) COLLATE utf8_bin NOT NULL,
  `website` varchar(400) COLLATE utf8_bin NOT NULL,
  `facebooklink` varchar(255) COLLATE utf8_bin NOT NULL,
  `twitterlink` varchar(255) COLLATE utf8_bin NOT NULL,
  `youtubelink` varchar(255) COLLATE utf8_bin NOT NULL,
  `enumstatus` enum('Active','Not Active') COLLATE utf8_bin NOT NULL,
  `date_insert` date NOT NULL,
  `varipaddress` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`intid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`intid`, `varfirstname`, `varlastname`, `varusername`, `varpassword`, `varemailid`, `varphoneno`, `address`, `website`, `facebooklink`, `twitterlink`, `youtubelink`, `enumstatus`, `date_insert`, `varipaddress`) VALUES
(15, 'krupal', 'manani', 'admin', 'manek@tech', 'mngroup.it@gmail.com', '+91-9876543210', '3rd flore saswat complex', 'http://www.manektech.net/Paddlebuoy', 'http://www.facebook.com/', 'https://twitter.com/', 'https://youtube.com/', 'Active', '2012-10-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `cartsessionid` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `productid`, `qty`, `cartsessionid`, `date`) VALUES
(1, 4, 3, '4n85era94limr0bp50gocdgdb3', '2012-12-27 16:09:16'),
(2, 10, 1, '4n85era94limr0bp50gocdgdb3', '2012-12-27 16:09:27'),
(3, 3, 2, '4n85era94limr0bp50gocdgdb3', '2012-12-27 16:14:06'),
(10, 4, 1, '4khdm0v62t5a8hqma048ajsvr3', '2012-12-31 10:59:05'),
(7, 8, 1, 'kd5tp7eeslmgmfnod976gskql7', '2012-12-29 18:07:46'),
(8, 6, 1, 'kd5tp7eeslmgmfnod976gskql7', '2012-12-29 18:08:32'),
(9, 5, 1, 'kd5tp7eeslmgmfnod976gskql7', '2012-12-29 18:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `cartorder`
--

CREATE TABLE IF NOT EXISTS `cartorder` (
  `ordercartid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `cardid` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `orderid` varchar(500) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ordercartid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cartorder`
--


-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `uniqname` varchar(250) COLLATE utf8_bin NOT NULL,
  `Title` varchar(250) COLLATE utf8_bin NOT NULL,
  `Keywords` varchar(500) COLLATE utf8_bin NOT NULL,
  `Description` varchar(500) COLLATE utf8_bin NOT NULL,
  `PageHeader` varchar(50) COLLATE utf8_bin NOT NULL,
  `SmallPageHeader` varchar(100) COLLATE utf8_bin NOT NULL,
  `last_modified` datetime NOT NULL,
  `shortdescription` text COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `status` enum('Show','Hide') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `level`, `parent`, `uniqname`, `Title`, `Keywords`, `Description`, `PageHeader`, `SmallPageHeader`, `last_modified`, `shortdescription`, `content`, `status`) VALUES
(1, 1, 0, 'home-page', 'Home Page', 'Home Page', 'Home Page', 'Home Page', 'Home Page', '2012-10-18 17:24:49', 'Home Page', '', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE IF NOT EXISTS `filter` (
  `optionid` int(11) NOT NULL AUTO_INCREMENT,
  `optionname` varchar(255) COLLATE utf8_bin NOT NULL,
  `uniqname` varchar(255) COLLATE utf8_bin NOT NULL,
  `dispalyorder` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`optionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`optionid`, `optionname`, `uniqname`, `dispalyorder`, `status`, `date`) VALUES
(2, 'pattern', 'pattern', 0, 'active', '2012-12-15'),
(3, 'color ', 'color-', 0, 'active', '2012-12-15'),
(4, 'composition', 'composition', 0, 'inactive', '2012-12-15'),
(5, 'wearing type', 'wearing-type', 0, 'inactive', '2012-12-15'),
(6, 'weight', 'weight', 0, 'inactive', '2012-12-15'),
(12, 'displayorder', 'displayorder', 0, 'active', '2012-12-28'),
(11, 'standard', 'standard', 0, 'active', '2012-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `optionid` int(11) NOT NULL AUTO_INCREMENT,
  `optionname` varchar(255) COLLATE utf8_bin NOT NULL,
  `uniqname` varchar(255) COLLATE utf8_bin NOT NULL,
  `dispalyorder` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`optionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`optionid`, `optionname`, `uniqname`, `dispalyorder`, `status`, `date`) VALUES
(2, 'pattern', 'pattern', 0, 'active', '2012-12-15'),
(3, 'color ', 'color-', 0, 'active', '2012-12-15'),
(4, 'composition', 'composition', 0, 'active', '2012-12-15'),
(5, 'wearing type', 'wearing-type', 0, 'active', '2012-12-15'),
(6, 'weight', 'weight', 0, 'active', '2012-12-15'),
(8, 'yarn', 'yarn', 0, 'active', '2012-12-17'),
(9, 'Treatment', 'treatment', 0, 'active', '2012-12-17'),
(10, 'Handkerchief', 'handkerchief', 0, 'active', '2012-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `optiontype`
--

CREATE TABLE IF NOT EXISTS `optiontype` (
  `optiontypeid` int(11) NOT NULL AUTO_INCREMENT,
  `optiontypename` varchar(255) COLLATE utf8_bin NOT NULL,
  `uniqname` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `optionid` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`optiontypeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `optiontype`
--

INSERT INTO `optiontype` (`optiontypeid`, `optiontypename`, `uniqname`, `image`, `optionid`, `status`, `date`) VALUES
(2, 'checks', 'checks', '', 2, 'active', '2012-12-15'),
(3, 'prints', 'prints', '', 2, 'active', '2012-12-15'),
(4, 'solid color', 'solid-color', '', 2, 'active', '2012-12-15'),
(5, 'striped', 'striped', '', 2, 'active', '2012-12-15'),
(6, 'red', 'red', '', 3, 'active', '2012-12-15'),
(7, 'green', 'green', '', 3, 'active', '2012-12-15'),
(8, 'blue', 'blue', '', 3, 'active', '2012-12-15'),
(9, 'black', 'black', '', 3, 'active', '2012-12-15'),
(10, '100% cotton', '100--cotton', '', 4, 'active', '2012-12-15'),
(11, '100% linen', '100--linen', '', 4, 'active', '2012-12-15'),
(12, 'flannel', 'flannel', '', 5, 'active', '2012-12-15'),
(13, 'oxford', 'oxford', '', 5, 'active', '2012-12-15'),
(14, '130 g/mÂ²', '130-g-m--', '', 6, 'active', '2012-12-15'),
(15, '110 g/mÂ²', '110-g-m--', '', 6, 'active', '2012-12-15'),
(16, 'Warp Two-ply 100s ', 'warp-two-ply-100s-', '', 8, 'active', '2012-12-17'),
(17, 'Weft One-ply 50s ', 'weft-one-ply-50s-', '', 8, 'active', '2012-12-17'),
(18, 'One-ply 40s ', 'one-ply-40s-', '', 8, 'active', '2012-12-17'),
(19, 'Handkerchief in this fabric only Â£6.95', 'handkerchief-in-this-fabric-only---6-95', '', 10, 'active', '2012-12-17'),
(20, 'wrinkle-free ', 'wrinkle-free-', '', 9, 'active', '2012-12-17'),
(21, 'Easy care ', 'easy-care-', '', 9, 'active', '2012-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `paidamount` int(10) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `authenticationcode` varchar(255) NOT NULL,
  `shippingfirstname` varchar(150) NOT NULL,
  `shippinglastname` varchar(150) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addeess` varchar(255) NOT NULL,
  `postcode` int(10) NOT NULL,
  `shtelephone` varchar(150) NOT NULL,
  `shippingstate` varchar(150) NOT NULL,
  `shippingcountry` varchar(150) NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `nameoncard` varchar(255) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `cvvnumber` int(10) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` enum('incomplete','complete') NOT NULL DEFAULT 'incomplete',
  `date` datetime NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `orderdetail`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `seotitle` varchar(1000) COLLATE utf8_bin NOT NULL,
  `seokeyword` varchar(1000) COLLATE utf8_bin NOT NULL,
  `seodescription` varchar(1000) COLLATE utf8_bin NOT NULL,
  `uniqname` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `producttypeid` int(11) NOT NULL,
  `shortdiscription` text COLLATE utf8_bin NOT NULL,
  `discription` text COLLATE utf8_bin NOT NULL,
  `dispalyorder` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `price`, `seotitle`, `seokeyword`, `seodescription`, `uniqname`, `image`, `producttypeid`, `shortdiscription`, `discription`, `dispalyorder`, `status`, `date`) VALUES
(3, 'Gondomar, blue', 285, 'Gondomar, blue', 'Gondomar, blue', 'Gondomar, blue', 'gondomar--blue', '50cf107f04d0b.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-17'),
(4, 'Helmahof, light blue', 189, 'Helmahof, light blue', 'Helmahof, light blue', 'Helmahof, light blue', 'helmahof--light-blue', '50d433a50a41e.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(2, 'Gondomar, white', 50, 'Gondomar, white', 'Gondomar, white', 'Gondomar, white', 'gondomar--white', '50cf10989a5e1.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 1, 'active', '2012-12-15'),
(5, 'Pombal, cerise', 69.95, 'Pombal, cerise', 'Pombal, cerise', 'Pombal, cerise', 'pombal--cerise', '50d4346e07e26.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(6, 'Montijo, navy', 70.58, 'Montijo, navy', 'Montijo, navy', 'Montijo, navy', 'montijo--navy', '50d434bf3dde0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(7, 'Molin', 74.14, 'Molin', 'Molin', 'Molin', 'molin', '50d4350511f22.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(8, 'Agudo, red', 85, 'Agudo, red', 'Agudo, red', 'Agudo, red', 'agudo--red', '50d4356ab7ff0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(9, 'Gondomar, blue', 285, 'Gondomar, blue', 'Gondomar, blue', 'Gondomar, blue', 'gondomar--blue', '50cf107f04d0b.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-17'),
(10, 'Helmahof, light blue', 189, 'Helmahof, light blue', 'Helmahof, light blue', 'Helmahof, light blue', 'helmahof--light-blue', '50d433a50a41e.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(11, 'Gondomar, white', 50, 'Gondomar, white', 'Gondomar, white', 'Gondomar, white', 'gondomar--white', '50cf10989a5e1.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 1, 'active', '2012-12-15'),
(12, 'Pombal, cerise', 69.95, 'Pombal, cerise', 'Pombal, cerise', 'Pombal, cerise', 'pombal--cerise', '50d4346e07e26.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(13, 'Montijo, navy', 70.58, 'Montijo, navy', 'Montijo, navy', 'Montijo, navy', 'montijo--navy', '50d434bf3dde0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(14, 'Molin', 74.14, 'Molin', 'Molin', 'Molin', 'molin', '50d4350511f22.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(15, 'Agudo, red', 85, 'Agudo, red', 'Agudo, red', 'Agudo, red', 'agudo--red', '50d4356ab7ff0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(16, 'Gondomar, blue', 285, 'Gondomar, blue', 'Gondomar, blue', 'Gondomar, blue', 'gondomar--blue', '50cf107f04d0b.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-17'),
(17, 'Helmahof, light blue', 189, 'Helmahof, light blue', 'Helmahof, light blue', 'Helmahof, light blue', 'helmahof--light-blue', '50d433a50a41e.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(18, 'Gondomar, white', 50, 'Gondomar, white', 'Gondomar, white', 'Gondomar, white', 'gondomar--white', '50cf10989a5e1.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 1, 'active', '2012-12-15'),
(19, 'Pombal, cerise', 69.95, 'Pombal, cerise', 'Pombal, cerise', 'Pombal, cerise', 'pombal--cerise', '50d4346e07e26.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(20, 'Montijo, navy', 70.58, 'Montijo, navy', 'Montijo, navy', 'Montijo, navy', 'montijo--navy', '50d434bf3dde0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(21, 'Molin', 74.14, 'Molin', 'Molin', 'Molin', 'molin', '50d4350511f22.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21'),
(22, 'Agudo, red', 85, 'Agudo, red', 'Agudo, red', 'Agudo, red', 'agudo--red', '50d4356ab7ff0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 0, 'active', '2012-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `productoption`
--

CREATE TABLE IF NOT EXISTS `productoption` (
  `productoptionid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `optiontypeid` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`productoptionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=159 ;

--
-- Dumping data for table `productoption`
--

INSERT INTO `productoption` (`productoptionid`, `productid`, `optiontypeid`, `date`) VALUES
(34, 3, 4, '2012-12-17'),
(33, 3, 14, '2012-12-17'),
(32, 3, 13, '2012-12-17'),
(31, 3, 8, '2012-12-17'),
(30, 3, 3, '2012-12-17'),
(44, 22, 2, '2012-12-21'),
(28, 2, 2, '2012-12-17'),
(27, 2, 4, '2012-12-17'),
(45, 22, 6, '2012-12-21'),
(35, 3, 10, '2012-12-17'),
(36, 3, 18, '2012-12-17'),
(37, 3, 21, '2012-12-17'),
(38, 2, 8, '2012-12-18'),
(39, 2, 10, '2012-12-18'),
(40, 2, 11, '2012-12-18'),
(41, 2, 12, '2012-12-18'),
(42, 2, 13, '2012-12-18'),
(43, 2, 15, '2012-12-18'),
(46, 22, 10, '2012-12-21'),
(47, 22, 12, '2012-12-21'),
(48, 22, 14, '2012-12-21'),
(49, 21, 2, '2012-12-21'),
(50, 21, 4, '2012-12-21'),
(51, 21, 6, '2012-12-21'),
(52, 21, 10, '2012-12-21'),
(53, 21, 11, '2012-12-21'),
(54, 21, 12, '2012-12-21'),
(55, 21, 13, '2012-12-21'),
(56, 21, 15, '2012-12-21'),
(57, 20, 2, '2012-12-21'),
(58, 20, 3, '2012-12-21'),
(59, 20, 9, '2012-12-21'),
(60, 20, 10, '2012-12-21'),
(61, 20, 13, '2012-12-21'),
(62, 20, 14, '2012-12-21'),
(63, 19, 3, '2012-12-21'),
(64, 19, 4, '2012-12-21'),
(65, 19, 7, '2012-12-21'),
(66, 19, 10, '2012-12-21'),
(67, 19, 12, '2012-12-21'),
(68, 19, 15, '2012-12-21'),
(69, 18, 5, '2012-12-21'),
(70, 18, 7, '2012-12-21'),
(71, 18, 10, '2012-12-21'),
(72, 18, 13, '2012-12-21'),
(73, 18, 15, '2012-12-21'),
(74, 18, 16, '2012-12-21'),
(75, 17, 3, '2012-12-21'),
(76, 17, 9, '2012-12-21'),
(77, 17, 11, '2012-12-21'),
(78, 17, 12, '2012-12-21'),
(79, 17, 14, '2012-12-21'),
(80, 16, 5, '2012-12-21'),
(81, 16, 9, '2012-12-21'),
(82, 16, 11, '2012-12-21'),
(83, 16, 13, '2012-12-21'),
(84, 16, 15, '2012-12-21'),
(85, 16, 21, '2012-12-21'),
(86, 15, 5, '2012-12-21'),
(87, 15, 9, '2012-12-21'),
(88, 15, 11, '2012-12-21'),
(89, 15, 13, '2012-12-21'),
(90, 15, 15, '2012-12-21'),
(91, 15, 18, '2012-12-21'),
(92, 14, 3, '2012-12-21'),
(93, 14, 5, '2012-12-21'),
(94, 14, 7, '2012-12-21'),
(95, 14, 11, '2012-12-21'),
(96, 14, 13, '2012-12-21'),
(97, 14, 14, '2012-12-21'),
(98, 13, 3, '2012-12-21'),
(99, 13, 4, '2012-12-21'),
(100, 13, 6, '2012-12-21'),
(101, 13, 7, '2012-12-21'),
(102, 13, 10, '2012-12-21'),
(103, 13, 11, '2012-12-21'),
(104, 13, 12, '2012-12-21'),
(105, 13, 13, '2012-12-21'),
(106, 13, 15, '2012-12-21'),
(107, 12, 4, '2012-12-21'),
(108, 12, 6, '2012-12-21'),
(109, 12, 10, '2012-12-21'),
(110, 12, 12, '2012-12-21'),
(111, 12, 14, '2012-12-21'),
(112, 11, 3, '2012-12-21'),
(113, 11, 6, '2012-12-21'),
(114, 11, 10, '2012-12-21'),
(115, 11, 12, '2012-12-21'),
(116, 11, 14, '2012-12-21'),
(117, 10, 4, '2012-12-21'),
(118, 10, 6, '2012-12-21'),
(119, 10, 10, '2012-12-21'),
(120, 10, 12, '2012-12-21'),
(121, 10, 14, '2012-12-21'),
(122, 9, 4, '2012-12-21'),
(123, 9, 9, '2012-12-21'),
(124, 9, 11, '2012-12-21'),
(125, 9, 13, '2012-12-21'),
(126, 9, 15, '2012-12-21'),
(127, 9, 19, '2012-12-21'),
(128, 8, 2, '2012-12-21'),
(129, 8, 6, '2012-12-21'),
(130, 8, 10, '2012-12-21'),
(131, 8, 12, '2012-12-21'),
(132, 8, 14, '2012-12-21'),
(133, 8, 16, '2012-12-21'),
(134, 7, 2, '2012-12-21'),
(135, 7, 5, '2012-12-21'),
(136, 7, 6, '2012-12-21'),
(137, 7, 9, '2012-12-21'),
(138, 7, 10, '2012-12-21'),
(139, 7, 11, '2012-12-21'),
(140, 7, 15, '2012-12-21'),
(141, 6, 2, '2012-12-21'),
(142, 6, 5, '2012-12-21'),
(143, 6, 9, '2012-12-21'),
(144, 6, 11, '2012-12-21'),
(145, 6, 13, '2012-12-21'),
(146, 6, 15, '2012-12-21'),
(147, 5, 4, '2012-12-21'),
(148, 5, 7, '2012-12-21'),
(149, 5, 11, '2012-12-21'),
(150, 5, 13, '2012-12-21'),
(151, 5, 15, '2012-12-21'),
(152, 5, 18, '2012-12-21'),
(153, 5, 21, '2012-12-21'),
(154, 4, 5, '2012-12-21'),
(155, 4, 9, '2012-12-21'),
(156, 4, 11, '2012-12-21'),
(157, 4, 13, '2012-12-21'),
(158, 4, 15, '2012-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE IF NOT EXISTS `producttype` (
  `producttypeid` int(11) NOT NULL AUTO_INCREMENT,
  `producttypename` varchar(255) COLLATE utf8_bin NOT NULL,
  `uniqname` varchar(255) COLLATE utf8_bin NOT NULL,
  `dispalyorder` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`producttypeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`producttypeid`, `producttypename`, `uniqname`, `dispalyorder`, `status`, `date`) VALUES
(3, 'shirt fabric', 'shirt-fabric', 0, 'active', '2012-12-15'),
(4, 'contrast fabric', 'contrast-fabric', 0, 'active', '2012-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `shirtcustomization`
--

CREATE TABLE IF NOT EXISTS `shirtcustomization` (
  `shirtcustomizationid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `fit_slimfit` varchar(255) COLLATE utf8_bin NOT NULL,
  `fit_innerslimfit` varchar(255) COLLATE utf8_bin NOT NULL,
  `fit_normalfit` varchar(255) COLLATE utf8_bin NOT NULL,
  `fit_innernormalfit` varchar(255) COLLATE utf8_bin NOT NULL,
  `fit_loosefit` varchar(255) COLLATE utf8_bin NOT NULL,
  `fit_innerloosefit` varchar(255) COLLATE utf8_bin NOT NULL,
  `style_fullsleeve` varchar(255) COLLATE utf8_bin NOT NULL,
  `style_halfsleeve` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_straight` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innerstraight` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_straightbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_straightthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_classic` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innerclassic` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_classicbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_classicthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_spread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innerspread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_spreadbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_spreadthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_cutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innercutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_cutawaybuttonbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_cutawaythread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_fullcutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innerfullcutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_fullcutawaybutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_fullcutawaythread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_englishcutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innerenglishcutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_englishcutawaybutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_englishcutawaythread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_curvedcutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innercurvedcutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_curvedcutawaybutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_curvedcutawaythread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_cutawaybutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innercutawaybutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_cutawaybutton_button` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_cutawaybuttonthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_bandedcollar` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innerbandedcollar` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_bandedcollarbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_bandedcollarthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_wingup` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innerwingup` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_wingupbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_wingupthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_buttondown` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innerbuttondown` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_buttondownbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_buttondownthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_rounded` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_innerrounded` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_roundedbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_roundedthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonmiter` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonmiterinner` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonmiterbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonmiterthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonmiterright` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonmiterrightinner` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonmiter` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonmiterinner` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonmiterbutton` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonmiterthread` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonmiterright` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonmiterrightinner` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonmiter` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonmiterinner` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonmiterbutton` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonmiterthread` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonmiterright` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonmiterrightinner` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonround` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonroundinner` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonroundbutton` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonroundthread` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonroundright` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonroundrightinner` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonround` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonroundinner` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonroundbutton` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonroundthread` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonroundright` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonroundrightinner` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonround` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonroundinner` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonroundbutton` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonroundthread` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonroundright` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonroundrightinner` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonsquare` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonsquareinner` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonsquarebutton` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonsquarethread` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonsquareright` text COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonsquarerightinner` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonsquare` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonsquareinner` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonsquarebutton` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonsquarethread` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonsquareright` text COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonsquarerightinner` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonsquare` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonsquareinner` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonsquarebutton` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonsquarethread` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonsquareright` text COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonsquarerightinner` text COLLATE utf8_bin NOT NULL,
  `pocket_miter` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket_round` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket_square` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket_vshape` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket_nopocket` varchar(255) COLLATE utf8_bin NOT NULL,
  `front_placket` varchar(255) COLLATE utf8_bin NOT NULL,
  `front_placketthread` varchar(255) COLLATE utf8_bin NOT NULL,
  `front_placketbutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `front_covered` varchar(255) COLLATE utf8_bin NOT NULL,
  `front_coveredthread` text COLLATE utf8_bin NOT NULL,
  `front_coveredbutton` text COLLATE utf8_bin NOT NULL,
  `front_noplacket` varchar(255) COLLATE utf8_bin NOT NULL,
  `front_noplacketthread` text COLLATE utf8_bin NOT NULL,
  `front_noplacketbutton` text COLLATE utf8_bin NOT NULL,
  `back_sidepleats` varchar(255) COLLATE utf8_bin NOT NULL,
  `back_boxpleats` varchar(255) COLLATE utf8_bin NOT NULL,
  `back_nopleats` varchar(255) COLLATE utf8_bin NOT NULL,
  `adate` date NOT NULL,
  PRIMARY KEY (`shirtcustomizationid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `shirtcustomization`
--

INSERT INTO `shirtcustomization` (`shirtcustomizationid`, `productid`, `fit_slimfit`, `fit_innerslimfit`, `fit_normalfit`, `fit_innernormalfit`, `fit_loosefit`, `fit_innerloosefit`, `style_fullsleeve`, `style_halfsleeve`, `collar_straight`, `collar_innerstraight`, `collar_straightbutton`, `collar_straightthread`, `collar_classic`, `collar_innerclassic`, `collar_classicbutton`, `collar_classicthread`, `collar_spread`, `collar_innerspread`, `collar_spreadbutton`, `collar_spreadthread`, `collar_cutaway`, `collar_innercutaway`, `collar_cutawaybuttonbutton`, `collar_cutawaythread`, `collar_fullcutaway`, `collar_innerfullcutaway`, `collar_fullcutawaybutton`, `collar_fullcutawaythread`, `collar_englishcutaway`, `collar_innerenglishcutaway`, `collar_englishcutawaybutton`, `collar_englishcutawaythread`, `collar_curvedcutaway`, `collar_innercurvedcutaway`, `collar_curvedcutawaybutton`, `collar_curvedcutawaythread`, `collar_cutawaybutton`, `collar_innercutawaybutton`, `collar_cutawaybutton_button`, `collar_cutawaybuttonthread`, `collar_bandedcollar`, `collar_innerbandedcollar`, `collar_bandedcollarbutton`, `collar_bandedcollarthread`, `collar_wingup`, `collar_innerwingup`, `collar_wingupbutton`, `collar_wingupthread`, `collar_buttondown`, `collar_innerbuttondown`, `collar_buttondownbutton`, `collar_buttondownthread`, `collar_rounded`, `collar_innerrounded`, `collar_roundedbutton`, `collar_roundedthread`, `cuff_singlebuttonmiter`, `cuff_singlebuttonmiterinner`, `cuff_singlebuttonmiterbutton`, `cuff_singlebuttonmiterthread`, `cuff_singlebuttonmiterright`, `cuff_singlebuttonmiterrightinner`, `cuff_doublebuttonmiter`, `cuff_doublebuttonmiterinner`, `cuff_doublebuttonmiterbutton`, `cuff_doublebuttonmiterthread`, `cuff_doublebuttonmiterright`, `cuff_doublebuttonmiterrightinner`, `cuff_frenchbuttonmiter`, `cuff_frenchbuttonmiterinner`, `cuff_frenchbuttonmiterbutton`, `cuff_frenchbuttonmiterthread`, `cuff_frenchbuttonmiterright`, `cuff_frenchbuttonmiterrightinner`, `cuff_singlebuttonround`, `cuff_singlebuttonroundinner`, `cuff_singlebuttonroundbutton`, `cuff_singlebuttonroundthread`, `cuff_singlebuttonroundright`, `cuff_singlebuttonroundrightinner`, `cuff_doublebuttonround`, `cuff_doublebuttonroundinner`, `cuff_doublebuttonroundbutton`, `cuff_doublebuttonroundthread`, `cuff_doublebuttonroundright`, `cuff_doublebuttonroundrightinner`, `cuff_frenchbuttonround`, `cuff_frenchbuttonroundinner`, `cuff_frenchbuttonroundbutton`, `cuff_frenchbuttonroundthread`, `cuff_frenchbuttonroundright`, `cuff_frenchbuttonroundrightinner`, `cuff_singlebuttonsquare`, `cuff_singlebuttonsquareinner`, `cuff_singlebuttonsquarebutton`, `cuff_singlebuttonsquarethread`, `cuff_singlebuttonsquareright`, `cuff_singlebuttonsquarerightinner`, `cuff_doublebuttonsquare`, `cuff_doublebuttonsquareinner`, `cuff_doublebuttonsquarebutton`, `cuff_doublebuttonsquarethread`, `cuff_doublebuttonsquareright`, `cuff_doublebuttonsquarerightinner`, `cuff_frenchbuttonsquare`, `cuff_frenchbuttonsquareinner`, `cuff_frenchbuttonsquarebutton`, `cuff_frenchbuttonsquarethread`, `cuff_frenchbuttonsquareright`, `cuff_frenchbuttonsquarerightinner`, `pocket_miter`, `pocket_round`, `pocket_square`, `pocket_vshape`, `pocket_nopocket`, `front_placket`, `front_placketthread`, `front_placketbutton`, `front_covered`, `front_coveredthread`, `front_coveredbutton`, `front_noplacket`, `front_noplacketthread`, `front_noplacketbutton`, `back_sidepleats`, `back_boxpleats`, `back_nopleats`, `adate`) VALUES
(12, 2, '50dae1d4c000a.gif', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2012-12-26'),
(11, 3, '50dadb9cc899e.gif', '50dadb9cc8dc8.gif', '50dadb9cc8f33.gif', '50dadb9cc9098.gif', '', '', '50dadb9cc920c.gif', '50dadb9cc93b1.gif', '50dadb9cc952a.gif', '50dadb9cc9698.gif', '50dadb9cc9801.gif', '50dadb9cc996e.gif', '50dadb9cc9adc.gif', '50dadb9cc9c49.gif', '50dadb9cc9db6.gif', '50dadb9cc9f25.gif', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50dadb9cca147.gif', '50dadb9cca2be.gif', '50dadb9cca424.gif', '50dadb9cca58c.gif', '50dadb9cca725.gif', '50dadb9cca89e.gif', '50dadb9ccaa15.gif', '50dadb9ccabae.gif', '50dadb9ccad20.gif', '50dadb9ccaeaf.gif', '50dadb9ccb021.gif', '50dadb9ccb19b.gif', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50dadb9ccb3bf.gif', '50dadb9ccb531.gif', '50dadb9ccb6b5.gif', '50dadb9ccb814.gif', '50dadb9ccb970.gif', '50dadb9ccbad0.gif', '', '', '', '', '', '', '2012-12-26'),
(10, 4, '50daa29e86a3b.gif', '50daa29e86d76.gif', '50daa29e86f93.gif', '50daa29e872ab.gif', '', '', '50daa29e878f7.gif', '50daa29e87aca.gif', '50daa29e87c61.gif', '50daa29e87dff.gif', '50daa29e87f75.gif', '50daa29e880f2.gif', '50daa29e8829e.gif', '50daa29e8841e.gif', '50daa29e88596.gif', '50daa29e88714.gif', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50daa29e88927.gif', '50daa29e88ac0.gif', '50daa29e88c41.gif', '50daa29e88dfd.gif', '50daa29e898f3.gif', '50daa29e89a7d.gif', '50daa29e89bf2.gif', '50daa29e89d65.gif', '50daa29e89ed8.gif', '50daa29e8a06a.gif', '50daa29e8a212.gif', '50daa5bd37485.gif', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50daa29e8a5a2.gif', '50daa29e8a728.gif', '', '', '', '50daa29e8a8b4.gif', '50daa29e8aa33.gif', '50daa29e8abb2.gif', '50daa29e8ad31.gif', '50daa29e8aeb1.gif', '50daa29e8b073.gif', '', '', '', '', '', '', '2012-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `slidergallery`
--

CREATE TABLE IF NOT EXISTS `slidergallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `url` varchar(255) NOT NULL,
  `displayorder` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `slidergallery`
--

INSERT INTO `slidergallery` (`id`, `title`, `image`, `url`, `displayorder`, `status`) VALUES
(1, 'Zymba Slider', '50c86ce107f1a.jpg', '', 1, 'active'),
(2, 'Zymba ', '50c86d06958ee.jpg', '', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `registrationdate` date NOT NULL,
  `status` enum('active','inactive','block') NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`, `email`, `phone`, `firstname`, `lastname`, `birthday`, `gender`, `postcode`, `address`, `state`, `country`, `registrationdate`, `status`) VALUES
(1, '12345678', 'test@test.com', '123456', 'krupal', 'manani', '2003-11-10', 'male', '380000', 'ahmedabad', 'gujarat', 'india', '2012-12-12', 'active');
