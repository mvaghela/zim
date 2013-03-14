-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2013 at 04:46 AM
-- Server version: 5.5.8
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
(15, 'krupal', 'manani', 'admin', 'manek@tech', 'test@test.com', '+91-9876543210', 'Lorem ipsum dolor sit amet <br />33 NEW city 2222 new tower <br />xyz road 4da90h', 'http://www.manektech.net/Zymba', 'http://www.facebook.com/', 'https://twitter.com/', 'https://youtube.com/', 'Active', '2012-10-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `blazer_measurements`
--

CREATE TABLE IF NOT EXISTS `blazer_measurements` (
  `measurement_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `measurement_name` varchar(255) NOT NULL,
  `suit_length` float NOT NULL,
  `suit_shoulder` float NOT NULL,
  `suit_sleeve_length` float NOT NULL,
  `createdate` date NOT NULL,
  PRIMARY KEY (`measurement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blazer_measurements`
--

INSERT INTO `blazer_measurements` (`measurement_id`, `user_id`, `measurement_name`, `suit_length`, `suit_shoulder`, `suit_sleeve_length`, `createdate`) VALUES
(1, '0', 'My Blazer blazer measurement', 1, 1, 1, '2013-01-10'),
(2, '8', 'Use1 Blazer Measurement', 12, 12, 12, '2013-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `saveshirtcustomizeid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `cartsessionid` varchar(255) NOT NULL,
  `measurement_id` int(11) NOT NULL,
  `measurement_type` varchar(155) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `saveshirtcustomizeid`, `productid`, `qty`, `cartsessionid`, `measurement_id`, `measurement_type`, `date`) VALUES
(3, 0, 10, 1, '1bgsvp60se4cipse9j200r2ob0', 0, '0', '2013-01-08 15:18:11'),
(4, 0, 4, 1, '1bgsvp60se4cipse9j200r2ob0', 3, 'shirt', '2013-01-08 15:19:56'),
(8, 0, 7, 3, 'eerj5ttma48gpvcrrfiqulasb3', 5, 'shirt', '2013-01-08 16:45:44'),
(7, 0, 6, 1, 'eerj5ttma48gpvcrrfiqulasb3', 0, '0', '2013-01-08 16:45:42'),
(9, 0, 2, 1, 'eerj5ttma48gpvcrrfiqulasb3', 0, '0', '2013-01-08 18:56:36'),
(10, 0, 20, 1, 'eerj5ttma48gpvcrrfiqulasb3', 0, '0', '2013-01-08 18:56:51'),
(11, 0, 10, 1, '1264151utjnjcjflcq7fs2hfq2', 0, '0', '2013-01-09 10:25:10'),
(18, 0, 3, 1, '2l9bumji6jplatpje9gn6sku36', 0, '0', '2013-01-10 19:02:45'),
(19, 0, 9, 3, '2l9bumji6jplatpje9gn6sku36', 0, '0', '2013-01-10 19:02:48'),
(20, 0, 7, 1, '43bfcs745uubivvk9bliou8uq6', 5, 'shirt', '2013-01-11 10:02:24'),
(21, 0, 4, 1, '43bfcs745uubivvk9bliou8uq6', 3, 'shirt', '2013-01-11 10:02:47'),
(28, 0, 10, 1, 'tti3m1k9bnqbjigpm1h8d1agu3', 0, '0', '2013-01-16 12:39:24'),
(29, 0, 2, 1, 'tti3m1k9bnqbjigpm1h8d1agu3', 0, '0', '2013-01-16 12:39:26'),
(30, 0, 5, 1, 'tti3m1k9bnqbjigpm1h8d1agu3', 0, '0', '2013-01-16 12:39:27'),
(31, 0, 5, 1, 'tc3ca5n00l53bfet3nu2gd8jf7', 0, '0', '2013-01-17 10:26:51'),
(32, 0, 4, 1, 'tc3ca5n00l53bfet3nu2gd8jf7', 3, 'shirt', '2013-01-17 10:26:55'),
(33, 0, 4, 1, 'sjcutvdo4hshqj3hkptad29cm2', 6, 'shirt', '2013-01-19 10:20:14'),
(34, 0, 7, 1, 'sjcutvdo4hshqj3hkptad29cm2', 5, 'shirt', '2013-01-19 10:20:16'),
(45, 6, 2, 1, '7ncdl79oqvckiud1o40onml236', 0, 'shirt', '2013-01-21 18:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `cartorder`
--

CREATE TABLE IF NOT EXISTS `cartorder` (
  `ordercartid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `cardid` int(11) NOT NULL,
  `saveshirtcustomizeid` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `cartsessionid` varchar(255) COLLATE utf8_bin NOT NULL,
  `measurement_id` int(11) NOT NULL,
  `measurement_type` varchar(155) COLLATE utf8_bin NOT NULL,
  `orderid` varchar(500) COLLATE utf8_bin NOT NULL,
  `userid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ordercartid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Dumping data for table `cartorder`
--

INSERT INTO `cartorder` (`ordercartid`, `productid`, `cardid`, `saveshirtcustomizeid`, `qty`, `cartsessionid`, `measurement_id`, `measurement_type`, `orderid`, `userid`, `date`) VALUES
(13, 2, 0, 1, 1, '7ncdl79oqvckiud1o40onml236', 3, 'shirt', '7', 1, '2013-01-21 13:25:22'),
(12, 9, 0, 0, 1, '7ncdl79oqvckiud1o40onml236', 7, 'shirt', '5', 8, '2013-01-21 10:16:53'),
(11, 2, 0, 0, 1, '7ncdl79oqvckiud1o40onml236', 7, 'shirt', '5', 8, '2013-01-21 10:16:56'),
(10, 7, 0, 0, 1, 'fito1h3guclo3hh2nomaf39dg4', 6, 'shirt', '4', 1, '2013-01-19 16:35:04'),
(9, 3, 0, 0, 1, 'fito1h3guclo3hh2nomaf39dg4', 3, 'shirt', '4', 1, '2013-01-19 16:35:01'),
(7, 4, 0, 0, 1, 'sjcutvdo4hshqj3hkptad29cm2', 6, 'shirt', '', 7, '2013-01-19 10:20:14'),
(8, 7, 0, 0, 1, 'sjcutvdo4hshqj3hkptad29cm2', 5, 'shirt', '', 7, '2013-01-19 10:20:16'),
(14, 6, 0, 0, 1, '7ncdl79oqvckiud1o40onml236', 1, 'shirt', '7', 1, '2013-01-21 11:56:27'),
(15, 10, 0, 0, 1, '7ncdl79oqvckiud1o40onml236', 5, 'shirt', '7', 1, '2013-01-21 11:56:29'),
(16, 5, 0, 5, 1, '7ncdl79oqvckiud1o40onml236', 3, 'shirt', '8', 1, '2013-01-21 18:20:06'),
(17, 4, 0, 4, 1, '7ncdl79oqvckiud1o40onml236', 5, 'shirt', '8', 1, '2013-01-21 18:17:12'),
(18, 3, 0, 3, 1, '7ncdl79oqvckiud1o40onml236', 6, 'shirt', '8', 1, '2013-01-21 17:16:41');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `level`, `parent`, `uniqname`, `Title`, `Keywords`, `Description`, `PageHeader`, `SmallPageHeader`, `last_modified`, `shortdescription`, `content`, `status`) VALUES
(1, 1, 0, 'home-page', 'Home Page', 'Home Page', 'Home Page', 'Home Page', 'Home Page', '2012-10-18 17:24:49', 'Home Page', '', 'Show'),
(2, 1, 0, 'about-us', 'ABOUT US', 'ABOUT US', 'ABOUT US', 'ABOUT US', 'ABOUT US', '2013-01-02 15:44:11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque velit, blandit sed scelerisque quis, vulputate vel lorem. Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien, ut mollis magna eros vitae odio.Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien, ut mollis magna eros vitae odio.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque velit, blandit sed scelerisque quis, vulputate vel lorem. Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien, ut mollis magna eros vitae odio.</p>\r\n\r\n<p>\r\n	Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien, ut mollis magna eros vitae odio.</p>\r\n', 'Show'),
(3, 1, 0, 'whats-new', 'WHATS NEW', 'WHATS NEW', 'WHATS NEW', 'WHATS NEW', 'WHATS NEW', '2013-01-02 15:44:32', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque velit, blandit sed scelerisque quis, vulputate vel lorem. Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien, ut mollis magna eros vitae odio.Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien, ut mollis magna eros vitae odio.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque velit, blandit sed scelerisque quis, vulputate vel lorem. Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien, ut mollis magna eros vitae odio.</p>\r\n<p>\r\n	Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien, ut mollis magna eros vitae odio.</p>\r\n', 'Show'),
(4, 1, 0, 'care-and-advice', 'CARE AND ADVICE', 'CARE AND ADVICE', 'CARE AND ADVICE', 'CARE AND ADVICE', 'CARE AND ADVICE', '2013-01-02 15:28:09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque velit, blandit sed scelerisque quis, vulputate vel lorem. Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien,', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque velit, blandit sed scelerisque quis, vulputate vel lorem. Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien,', 'Show'),
(5, 1, 0, 'services', 'Services', 'Services', 'Services', 'Services', 'Services', '2013-01-09 18:03:59', 'Services', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>\r\n', ''),
(6, 1, 0, 'how-we-do', 'How we do', 'How we do', 'How we do', 'How we do', 'How we do', '2013-01-09 18:04:23', 'How we do', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>', ''),
(7, 1, 0, 'why-custom', 'Why custom', 'Why custom', 'Why custom', 'Why custom', 'Why custom', '2013-01-09 18:04:40', 'Why custom', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,</p>\r\n', ''),
(8, 1, 0, 'shipping-iage-info', 'Shipping Page Info', 'shipping-info', 'Shipping Iage Info', 'Shipping Iage Info', 'Shipping Iage Info', '2013-01-21 13:10:14', 'Shipping Iage Info', '<p>\r\n	<span style="font-size:20px;">What happens if my garments do not fit?<br />\r\n	</span></p>\r\n<p>\r\n	We offer perfect fit guarantee, if they do not fit, we will remake them. <a href="http://localhost/zymba/shipping.php#">Learn More...</a></p>\r\n<p>\r\n	<span style="font-size:20px;">Need Help? </span></p>\r\n<p>\r\n	Check our FAQs or E-Mail us :<br />\r\n	abc@abc.com</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/woody/cpanel/upload/ckediter/payment.png" style="width: 184px; height: 92px;" /></p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `email_contact`
--

CREATE TABLE IF NOT EXISTS `email_contact` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `emails` varchar(155) NOT NULL,
  `adddate` date NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `email_contact`
--


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
-- Table structure for table `measurements`
--

CREATE TABLE IF NOT EXISTS `measurements` (
  `measurement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image_desc_1` text NOT NULL,
  `image_desc_2` text NOT NULL,
  `image_desc_3` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `for` varchar(255) NOT NULL,
  `youtubevideo` enum('yes','no') NOT NULL,
  PRIMARY KEY (`measurement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`measurement_id`, `title`, `description`, `video_link`, `video`, `image1`, `image2`, `image3`, `image_desc_1`, `image_desc_2`, `image_desc_3`, `type`, `for`, `youtubevideo`) VALUES
(1, 'SUIT Length', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '50ed4cc9c4553.mp4', '50ee8eca47400.jpg', '50ee8eca4f4c7.jpg', '50ee8eca5448e.jpg', 'SUIT Length', 'SUIT Length', 'SUIT Length', 'blazer', 'suit-length', 'yes'),
(2, 'Shirt Length', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '50ee5b024e230.mp4', '50ee4e6300438.jpg', '50ee4e6309301.jpg', '50ee4e630dcf6.jpg', 'Shirt Length', 'Shirt Length', 'Shirt Length', 'shirt', 'shirt-length', 'no'),
(3, 'Shirt Sholder', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee506d2fb89.jpg', '50ee506d34b06.jpg', '50ee506d409b8.jpg', 'Shirt Sholder', 'Shirt Sholder', 'Shirt Sholder', 'shirt', 'shirt-shoulder', 'yes'),
(4, 'Shirt Sleeve Length', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee509befaa5.jpg', '50ee509c00cee.jpg', '50ee509c05e1e.jpg', 'Shirt Sleeve Length', 'Shirt Sleeve Length', 'Shirt Sleeve Length', 'shirt', 'shirt-sleeve-length', 'yes'),
(5, 'Chest', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee50bde729b.jpg', '50ee50bdec40a.jpg', '50ee50bdf12b1.jpg', 'Chest', 'Chest', 'Chest', 'shirt', 'chest', 'yes'),
(6, 'Stomach', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee50ed001c5.jpg', '50ee50ed05089.jpg', '50ee50ed09daa.jpg', 'Stomach', 'Stomach', 'Stomach', 'shirt', 'stomach', 'yes'),
(7, 'Hip', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee515b692a4.jpg', '50ee515b6e6a5.jpg', '50ee515b73590.jpg', 'Hip', 'Hip', 'Hip', 'shirt', 'hip', 'yes'),
(8, 'Shirt Neck', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee517ac774b.jpg', '50ee517acfe43.jpg', '50ee517ad6add.jpg', 'Shirt Neck', 'Shirt Neck', 'Shirt Neck', 'shirt', 'shirt-neck', 'yes'),
(9, 'Shirt Knee', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee51a49572c.jpg', '50ee51a49f537.jpg', '50ee51a4a51fa.jpg', 'Shirt Knee', 'Shirt Knee', 'Shirt Knee', 'shirt', 'shirt-knee', 'yes'),
(10, 'Wrist', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee51cc9c3d5.jpg', '50ee51cca50eb.jpg', '50ee51ccad9ec.jpg', 'Wrist', 'Wrist', 'Wrist', 'shirt', 'wrist', 'yes'),
(11, 'SUIT Shoulder', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '', '50ee8f0d0603f.mp4', '50ee8f0d063de.jpg', '50ee8f0d0c354.jpg', '50ee8f0d11504.jpg', 'SUIT Shoulder', 'SUIT Shoulder', 'SUIT Shoulder', 'blazer', 'suit-shoulder', 'no'),
(12, 'SUIT Sleeve Length', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee8f3316a99.jpg', '50ee8f331b9a3.jpg', '50ee8f3320b5a.jpg', 'SUIT Sleeve Length', 'SUIT Sleeve Length', 'SUIT Sleeve Length', 'blazer', 'suit-sleeve-length', 'yes'),
(13, 'Waist Level', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee96219c15c.jpg', '50ee9621a13bc.jpg', '50ee9621a62ab.jpg', 'Waist Level', 'Waist Level', 'Waist Level', 'pant', 'waist-level', 'yes'),
(14, 'Pant Length', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee97173e977.jpg', '50ee971743b39.jpg', '50ee971748ca9.jpg', 'Pant Length', 'Pant Length', 'Pant Length', 'pant', 'pant-length', 'yes'),
(15, 'Pant Waist', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '', '50ee974ae0ee7.mp4', '50ee974ae11da.jpg', '50ee974ae6459.jpg', '50ee974aeb741.jpg', 'Pant Waist', 'Pant Waist', 'Pant Waist', 'pant', 'pant-waist', 'no'),
(16, 'Pant Hip', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee976a812f2.jpg', '50ee976a86cd7.jpg', '50ee976a8c184.jpg', 'Pant Hip', 'Pant Hip', 'Pant Hip', 'pant', 'pant-hip', 'yes'),
(17, 'Pant Bottom', '<p>\r\n	1 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies</p>\r\n<p>\r\n	2 .Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere.</p>\r\n', '<iframe width="553" height="311" src="http://www.youtube.com/embed/YjshbVl-3K4" frameborder="0" allowfullscreen></iframe>', '', '50ee978b2b756.jpg', '50ee978b30f52.jpg', '50ee978b35eb9.jpg', 'Pant Bottom', 'Pant Bottom', 'Pant Bottom', 'pant', 'pant-bottom', 'yes');

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
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `postcode` int(10) NOT NULL,
  `shtelephone` varchar(150) NOT NULL,
  `shippingcity` varchar(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `paidamount`, `transactionid`, `authenticationcode`, `shippingfirstname`, `shippinglastname`, `gender`, `email`, `password`, `address`, `address2`, `postcode`, `shtelephone`, `shippingcity`, `shippingstate`, `shippingcountry`, `cardnumber`, `nameoncard`, `month`, `year`, `cvvnumber`, `userid`, `status`, `date`) VALUES
(1, 0, '', '', 'aas', '', 'male', '', '', '91746', 'Robina Varsity Chiropractic', 321564, '123345554', 'Ahmedabad', 'gujarat', 'india', '', '', 0, 0, 0, 6, 'incomplete', '0000-00-00 00:00:00'),
(2, 0, '', '', 'Justin', '', 'male', '', '', 'Ahmedabad', 'Ahmedabad', 380001, '123123123', 'Ahmedabad', 'Gujarat', 'India', '', '', 0, 0, 0, 7, 'incomplete', '0000-00-00 00:00:00'),
(3, 0, '', '', 'Krupal', '', 'male', '', '', 'Ahmedabad', 'Ahmedabad', 380001, '123123123', 'Ahmedabad', 'Gujarat', 'India', '', '', 0, 0, 0, 1, 'incomplete', '0000-00-00 00:00:00'),
(5, 0, '', '', 'User 2', '', 'male', '', '', 'Abc', 'Abc', 13123, '123123', 'Ahmedabad', 'Abc', 'Ac', '', '', 0, 0, 0, 8, 'incomplete', '2013-01-21 10:19:59'),
(7, 0, '', '', 'AVB', '', 'male', '', '', '91764', 'Ahmedabad', 321564, '123123123', 'Ahmedabad', 'gujarat', 'India', '', '', 0, 0, 0, 1, 'incomplete', '2013-01-21 15:23:13'),
(8, 0, '', '', 'aas', '', 'male', '', '', '91764', 'Ahmedabad', 380001, '123123', 'Abd', 'gujarat', 'india', '', '', 0, 0, 0, 1, 'incomplete', '2013-01-21 18:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `pant_measurements`
--

CREATE TABLE IF NOT EXISTS `pant_measurements` (
  `measurement_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `measurement_name` varchar(255) NOT NULL,
  `waist_level` float NOT NULL,
  `pant_length` float NOT NULL,
  `pant_waist` float NOT NULL,
  `pant_hip` float NOT NULL,
  `pant_bottom` float NOT NULL,
  `createdate` date NOT NULL,
  PRIMARY KEY (`measurement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pant_measurements`
--

INSERT INTO `pant_measurements` (`measurement_id`, `user_id`, `measurement_name`, `waist_level`, `pant_length`, `pant_waist`, `pant_hip`, `pant_bottom`, `createdate`) VALUES
(1, '0', 'My pant measurements', 1, 2, 3, 4, 1, '2013-01-10'),
(2, '0', 'My pant measurements', 1, 2, 3, 4, 1, '2013-01-10'),
(3, '1', 'New Mesurement', 12, 12, 12, 12, 12, '2013-01-10'),
(4, '8', 'User 1 Pant Measurement', 12, 12, 12, 12, 12, '2013-01-21');

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
  `bestseller` enum('yes','no') COLLATE utf8_bin NOT NULL,
  `dispalyorder` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `price`, `seotitle`, `seokeyword`, `seodescription`, `uniqname`, `image`, `producttypeid`, `shortdiscription`, `discription`, `bestseller`, `dispalyorder`, `status`, `date`) VALUES
(3, 'Gondomar, blue', 285, 'Gondomar, blue', 'Gondomar, blue', 'Gondomar, blue', 'gondomar--blue', '50e58ab1556af.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'yes', 0, 'active', '2012-12-17'),
(4, 'Helmahof, light blue', 189, 'Helmahof, light blue', 'Helmahof, light blue', 'Helmahof, light blue', 'helmahof--light-blue', '50e58abde9be9.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'yes', 0, 'active', '2012-12-21'),
(2, 'Gondomar, white', 50, 'Gondomar, white', 'Gondomar, white', 'Gondomar, white', 'gondomar--white', '50e58a8fa1b13.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'yes', 1, 'active', '2012-12-15'),
(5, 'Pombal, cerise', 69.95, 'Pombal, cerise', 'Pombal, cerise', 'Pombal, cerise', 'pombal--cerise', '50e58accdca24.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'yes', 0, 'active', '2012-12-21'),
(6, 'Montijo, navy', 70.58, 'Montijo, navy', 'Montijo, navy', 'Montijo, navy', 'montijo--navy', '50e58af4d0762.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'yes', 0, 'active', '2012-12-21'),
(7, 'Molin', 74.14, 'Molin', 'Molin', 'Molin', 'molin', '50e58b030f9da.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'yes', 0, 'active', '2012-12-21'),
(8, 'Agudo, red', 85, 'Agudo, red', 'Agudo, red', 'Agudo, red', 'agudo--red', '50e58b11348dc.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'yes', 0, 'active', '2012-12-21'),
(9, 'Gondomar, blue', 285, 'Gondomar, blue', 'Gondomar, blue', 'Gondomar, blue', 'gondomar--blue', '50e432580118a.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-17'),
(10, 'Helmahof, light blue', 189, 'Helmahof, light blue', 'Helmahof, light blue', 'Helmahof, light blue', 'helmahof--light-blue', '50e4327e67b5e.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21'),
(11, 'Gondomar, white', 50, 'Gondomar, white', 'Gondomar, white', 'Gondomar, white', 'gondomar--white', '50cf10989a5e1.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 1, 'active', '2012-12-15'),
(12, 'Pombal, cerise', 69.95, 'Pombal, cerise', 'Pombal, cerise', 'Pombal, cerise', 'pombal--cerise', '50d4346e07e26.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21'),
(13, 'Montijo, navy', 70.58, 'Montijo, navy', 'Montijo, navy', 'Montijo, navy', 'montijo--navy', '50d434bf3dde0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21'),
(14, 'Molin', 74.14, 'Molin', 'Molin', 'Molin', 'molin', '50d4350511f22.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21'),
(15, 'Agudo, red', 85, 'Agudo, red', 'Agudo, red', 'Agudo, red', 'agudo--red', '50d4356ab7ff0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21'),
(16, 'Gondomar, blue', 285, 'Gondomar, blue', 'Gondomar, blue', 'Gondomar, blue', 'gondomar--blue', '50cf107f04d0b.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-17'),
(17, 'Helmahof, light blue', 189, 'Helmahof, light blue', 'Helmahof, light blue', 'Helmahof, light blue', 'helmahof--light-blue', '50d433a50a41e.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21'),
(18, 'Gondomar, white', 50, 'Gondomar, white', 'Gondomar, white', 'Gondomar, white', 'gondomar--white', '50cf10989a5e1.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 1, 'active', '2012-12-15'),
(19, 'Pombal, cerise', 69.95, 'Pombal, cerise', 'Pombal, cerise', 'Pombal, cerise', 'pombal--cerise', '50d4346e07e26.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21'),
(20, 'Montijo, navy', 70.58, 'Montijo, navy', 'Montijo, navy', 'Montijo, navy', 'montijo--navy', '50d434bf3dde0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21'),
(21, 'Molin', 74.14, 'Molin', 'Molin', 'Molin', 'molin', '50d4350511f22.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21'),
(22, 'Agudo, red', 85, 'Agudo, red', 'Agudo, red', 'Agudo, red', 'agudo--red', '50d4356ab7ff0.jpg', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>\r\n', 'no', 0, 'active', '2012-12-21');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`producttypeid`, `producttypename`, `uniqname`, `dispalyorder`, `status`, `date`) VALUES
(3, 'shirt fabric', 'shirt-fabric', 0, 'active', '2012-12-15'),
(4, 'contrast fabric', 'contrast-fabric', 0, 'active', '2012-12-15'),
(5, 'Pant Fabric', 'pant-fabric', 0, 'active', '2013-01-10'),
(6, 'Blazer Fabric', 'blazer-fabric', 0, 'active', '2013-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `saveshirtcustomize`
--

CREATE TABLE IF NOT EXISTS `saveshirtcustomize` (
  `saveshirtcustomizeid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `userid` varchar(255) COLLATE utf8_bin NOT NULL,
  `customizename` varchar(255) COLLATE utf8_bin NOT NULL,
  `fit` varchar(255) COLLATE utf8_bin NOT NULL,
  `style` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket` varchar(255) COLLATE utf8_bin NOT NULL,
  `front` varchar(255) COLLATE utf8_bin NOT NULL,
  `back` varchar(255) COLLATE utf8_bin NOT NULL,
  `createdate` date NOT NULL,
  `ip` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`saveshirtcustomizeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `saveshirtcustomize`
--

INSERT INTO `saveshirtcustomize` (`saveshirtcustomizeid`, `productid`, `userid`, `customizename`, `fit`, `style`, `collar`, `cuff`, `pocket`, `front`, `back`, `createdate`, `ip`) VALUES
(5, 5, '1', 'New Customization', 'fit_slimfit-50e68bb455974.png', 'style_half_fit_slimfit_sleeve-50e68bb45a7ed.png', 'collar_englishcutaway-50e68bb45e2ef.png', 'cuff_singlebuttonmiter-', 'pocket_round-50e68bb463a17.png', 'front_placket-50e68bb4648dd.png', 'back_sidepleats-', '2013-01-21', '127.0.0.1'),
(6, 2, '1', 'office', 'fit_slimfit-50e26fc991e71.png', 'style_half_fit_slimfit_sleeve-50e3d43700036.png', 'collar_rounded-50e2fda08ac64.png', 'cuff_singlebuttonmiter-', 'pocket_square50e2fdfb32675.png-', 'front_covered-50e2fdfb330c7.png', 'back_sidepleats-', '2013-01-21', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `shirtcustomization`
--

CREATE TABLE IF NOT EXISTS `shirtcustomization` (
  `shirtcustomizationid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `fit_slimfit` varchar(255) COLLATE utf8_bin NOT NULL,
  `fit_normalfit` varchar(255) COLLATE utf8_bin NOT NULL,
  `fit_loosefit` varchar(255) COLLATE utf8_bin NOT NULL,
  `style_full_fit_slimfit_sleeve` varchar(255) COLLATE utf8_bin NOT NULL,
  `style_half_fit_slimfit_sleeve` varchar(255) COLLATE utf8_bin NOT NULL,
  `style_full_fit_normalfit_sleeve` varchar(255) COLLATE utf8_bin NOT NULL,
  `style_half_fit_normalfit_sleeve` varchar(255) COLLATE utf8_bin NOT NULL,
  `style_full_fit_loosefit_sleeve` varchar(255) COLLATE utf8_bin NOT NULL,
  `style_half_fit_loosefit_sleeve` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_straight` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_classic` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_spread` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_cutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_fullcutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_englishcutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_curvedcutaway` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_cutawaybutton` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_bandedcollar` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_wingup` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_buttondown` varchar(255) COLLATE utf8_bin NOT NULL,
  `collar_rounded` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonmiter` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonmiter` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonmiter` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonround` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonround` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonround` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_singlebuttonsquare` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_doublebuttonsquare` varchar(255) COLLATE utf8_bin NOT NULL,
  `cuff_frenchbuttonsquare` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket_miter` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket_round` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket_square` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket_vshape` varchar(255) COLLATE utf8_bin NOT NULL,
  `pocket_nopocket` varchar(255) COLLATE utf8_bin NOT NULL,
  `front_placket` varchar(255) COLLATE utf8_bin NOT NULL,
  `front_covered` varchar(255) COLLATE utf8_bin NOT NULL,
  `front_noplacket` varchar(255) COLLATE utf8_bin NOT NULL,
  `back_sidepleats` varchar(255) COLLATE utf8_bin NOT NULL,
  `back_boxpleats` varchar(255) COLLATE utf8_bin NOT NULL,
  `back_nopleats` varchar(255) COLLATE utf8_bin NOT NULL,
  `adate` date NOT NULL,
  PRIMARY KEY (`shirtcustomizationid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=31 ;

--
-- Dumping data for table `shirtcustomization`
--

INSERT INTO `shirtcustomization` (`shirtcustomizationid`, `productid`, `fit_slimfit`, `fit_normalfit`, `fit_loosefit`, `style_full_fit_slimfit_sleeve`, `style_half_fit_slimfit_sleeve`, `style_full_fit_normalfit_sleeve`, `style_half_fit_normalfit_sleeve`, `style_full_fit_loosefit_sleeve`, `style_half_fit_loosefit_sleeve`, `collar_straight`, `collar_classic`, `collar_spread`, `collar_cutaway`, `collar_fullcutaway`, `collar_englishcutaway`, `collar_curvedcutaway`, `collar_cutawaybutton`, `collar_bandedcollar`, `collar_wingup`, `collar_buttondown`, `collar_rounded`, `cuff_singlebuttonmiter`, `cuff_doublebuttonmiter`, `cuff_frenchbuttonmiter`, `cuff_singlebuttonround`, `cuff_doublebuttonround`, `cuff_frenchbuttonround`, `cuff_singlebuttonsquare`, `cuff_doublebuttonsquare`, `cuff_frenchbuttonsquare`, `pocket_miter`, `pocket_round`, `pocket_square`, `pocket_vshape`, `pocket_nopocket`, `front_placket`, `front_covered`, `front_noplacket`, `back_sidepleats`, `back_boxpleats`, `back_nopleats`, `adate`) VALUES
(17, 2, '50e26fc991e71.png', '50e2de4267e02.png', '50e26fc994b00.png', '50e3d436f3d57.png', '50e3d43700036.png', '50e3d4370045b.png', '50e3d43700845.png', '50e3d43700c30.png', '50e3d43700fc2.png', '50e2fda088229.png', '50e2fda0886bf.png', '50e2fda088bd6.png', '50e2fda088f51.png', '50e2fda0892c1.png', '50e2fda08966b.png', '50e2fda0899d7.png', '50e2fda089d3b.png', '50e2fda08a09d.png', '50e2fda08a401.png', '50e2fda08a76d.png', '50e2fda08ac64.png', '50e26fc99820e.png', '50e26fc998466.png', '50e26fc9986bd.png', '50e2fdfb3063c.png', '50e2fdfb30b7b.png', '50e2fdfb30f76.png', '50e2fdfb312e3.png', '50e2fdfb3189b.png', '50e2fdfb31c0a.png', '50e2fdfb31f96.png', '50e2fdfb32310.png', '50e2fdfb32675.png', '50e2fdfb329e4.png', '50e26fc9992d9.png', '50e2fdfb32d5e.png', '50e2fdfb330c7.png', '50e2fdfb3342e.png', '', '', '', '2013-01-01'),
(23, 3, '50e2fedbe5c95.png', '50e2fedbe6178.png', '50e2fedbe64e6.png', '50e3d49e0dda0.png', '50e3d49e0e26b.png', '50e3d49e0e69c.png', '50e3d49e0eada.png', '50e3d49e0eef6.png', '50e3d49e0f325.png', '50e2fedbe8a84.png', '50e2fedbe8d48.png', '50e2fedbe9000.png', '50e2fedbe93f8.png', '50e2fedbe96bb.png', '50e2fedbe9975.png', '50e2fedbe9c3b.png', '50e2fedbe9efb.png', '50e2fedbea1b4.png', '50e2fedbea483.png', '50e2fedbea73d.png', '50e2fedbeaa39.png', '50e2fedbead0c.png', '50e2fedbeafcb.png', '50e2fedbeb285.png', '50e2fedbeb549.png', '50e2fedbeb804.png', '50e2fedbebac2.png', '50e2fedbebd8f.png', '50e2fedbec17f.png', '50e2fedbec45f.png', '50e2fedbec71f.png', '50e2fedbecae6.png', '50e2fedbecda2.png', '50e2fedbed05d.png', '', '50e2fedbed321.png', '50e2fedbed5db.png', '50e2fedbed8a6.png', '', '', '', '2013-01-01'),
(25, 4, '50e3d9aea820e.png', '50e3d9aea86ae.png', '50e3d9aea89dd.png', '50e3d9aea8da2.png', '50e3d9aea900d.png', '50e3d9aea926e.png', '50e3d9aea94e7.png', '50e3d9aea974b.png', '50e3d9aea99b0.png', '50e3d9aea9c0f.png', '50e3d9aea9e72.png', '50e3d9aeaa0d1.png', '50e3d9aeaa33a.png', '50e3d9aeaa5a0.png', '50e3d9aeaa892.png', '50e3d9aeaab9c.png', '50e3d9aeaae87.png', '50e3d9aeab178.png', '50e3d9aeab5b4.png', '50e3d9aeab822.png', '50e3d9aeaba8d.png', '50e3d9aeabcf8.png', '50e3d9aeabf63.png', '50e3d9aeac1db.png', '50e3d9aeac43d.png', '50e3d9aeac69f.png', '50e3d9aeac905.png', '50e3d9aeacb68.png', '50e3d9aeacdca.png', '50e3d9aead0f0.png', '50e3dbbae49c6.png', '50e3dbbae4d7f.png', '50e3dbbae4fe3.png', '50e3dbbae52a7.png', '', '50e3d9aeadfff.png', '50e3d9aeae266.png', '50e3d9aeae4ca.png', '', '', '', '2013-01-02'),
(26, 6, '50e3daf2830f7.png', '50e3daf28367f.png', '50e3daf2839e0.png', '50e3daf283f3c.png', '50e3daf2842b9.png', '50e3daf2846ef.png', '50e3daf284a52.png', '50e3daf284db1.png', '50e3daf285113.png', '50e3daf28548f.png', '50e3daf2857fb.png', '50e3daf285b58.png', '50e3daf285edf.png', '50e3daf28623a.png', '50e3daf286599.png', '50e3daf286902.png', '50e3daf286d04.png', '50e3daf287074.png', '50e3daf28751f.png', '50e3daf287896.png', '50e3daf287bf6.png', '50e3daf288001.png', '50e3daf288443.png', '50e3daf2887c4.png', '50e3daf288b2d.png', '50e3daf288e8d.png', '50e3daf28920f.png', '50e3daf28958b.png', '50e3daf289911.png', '50e3daf289c72.png', '50e3db8058877.png', '50e3db8058c03.png', '50e3db8058ece.png', '50e3db8059198.png', '', '50e3daf28b321.png', '50e3daf28b682.png', '50e3daf28ba41.png', '', '', '', '2013-01-02'),
(27, 5, '50e68bb455974.png', '50e68bb456097.png', '50e68bb459994.png', '50e68bb45a194.png', '50e68bb45a7ed.png', '50e68bb45adbc.png', '50e68bb45b411.png', '50e68bb45ba5d.png', '50e68bb45c024.png', '50e68bb45c5f6.png', '50e68bb45cbb2.png', '50e68bb45d173.png', '50e68bb45d75f.png', '50e68bb45dd2b.png', '50e68bb45e2ef.png', '50e68bb45e920.png', '50e68bb45ef34.png', '50e68bb45f513.png', '50e68bb45fe60.png', '50e68bb4604d4.png', '50e68bb460aa5.png', '50e68bb461089.png', '50e68bb461492.png', '50e68bb461883.png', '50e68bb461c75.png', '50e68bb462067.png', '50e68bb4624ac.png', '50e68bb462928.png', '50e68bb462dad.png', '50e68bb4631ee.png', '50e68bb4635f4.png', '50e68bb463a17.png', '50e68bb463e8a.png', '50e68bb4644b5.png', '', '50e68bb4648dd.png', '50e68bb464ce3.png', '50e68bb465112.png', '', '', '', '2013-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `shirt_measurements`
--

CREATE TABLE IF NOT EXISTS `shirt_measurements` (
  `measurement_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `measurement_name` varchar(255) NOT NULL,
  `shirt_length` float NOT NULL,
  `shirt_shoulder` float NOT NULL,
  `shirt_sleeve_length` float NOT NULL,
  `chest` float NOT NULL,
  `stomach` float NOT NULL,
  `hip` float NOT NULL,
  `shirt_neck` float NOT NULL,
  `shirt_knee` float NOT NULL,
  `wrist` float NOT NULL,
  `createdate` date NOT NULL,
  PRIMARY KEY (`measurement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `shirt_measurements`
--

INSERT INTO `shirt_measurements` (`measurement_id`, `user_id`, `measurement_name`, `shirt_length`, `shirt_shoulder`, `shirt_sleeve_length`, `chest`, `stomach`, `hip`, `shirt_neck`, `shirt_knee`, `wrist`, `createdate`) VALUES
(1, '1', 'a', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2013-01-11'),
(2, '0', 'My shirt measurement', 12, 12, 12, 12, 12, 12, 12, 12, 12, '2013-01-10'),
(3, '1', '11', 21, 1, 1, 1, 1, 1, 1, 1, 1, '2013-01-10'),
(4, '2l9bumji6jplatpje9gn6sku36', 'New Mesurement', 12, 12, 12, 12, 12, 12, 12, 12, 12, '2013-01-10'),
(5, '1', 'New shirt2', 1, 2, 2, 2, 2, 2, 2, 2, 2, '2013-01-16'),
(6, '1', 'New shirt3', 12, 12, 12, 12, 12, 12, 12, 12, 12, '2013-01-16'),
(7, '8', 'User 1 Measurement', 12, 12, 12, 12, 12, 12, 12, 12, 12, '2013-01-21');

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
-- Table structure for table `thoughts`
--

CREATE TABLE IF NOT EXISTS `thoughts` (
  `thought_id` int(11) NOT NULL AUTO_INCREMENT,
  `thought_text` varchar(255) NOT NULL,
  `createddate` date NOT NULL,
  PRIMARY KEY (`thought_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `thoughts`
--

INSERT INTO `thoughts` (`thought_id`, `thought_text`, `createddate`) VALUES
(2, 'Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.', '2013-01-09'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque velit, blandit sed scelerisque quis, vulputate vel lorem. Sed luctus, sapien elementum viverra pellentesque, odio turpis ultrices sapien', '2013-01-09');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`, `email`, `phone`, `firstname`, `lastname`, `birthday`, `gender`, `postcode`, `address`, `state`, `country`, `registrationdate`, `status`) VALUES
(1, '12345678', 'test1@test.com', '123123', 'Krupal', 'manani', '2013-12-12', 'male', '13123', 'Abc', 'Abc', 'Ac', '2012-12-12', 'active'),
(5, '1234', 'john@abc.com', '123123', 'John', 'Michael', '2013-12-12', 'male', '13123', 'Abc', 'Abc', 'Ac', '2013-01-05', 'active'),
(6, '1234', 'john@abc.com', '123123', 'John', 'Michael', '2013-12-12', 'male', '13123', 'Abc', 'Abc', 'Ac', '0000-00-00', 'active'),
(7, '1234', 'john@abc.com', '123123', 'John', 'Michael', '2013-12-12', 'male', '13123', 'Abc', 'Abc', 'Ac', '2013-01-19', 'active'),
(8, '1234', 'john@abc.com', '123123', 'John', 'Michael', '2013-12-12', 'male', '13123', 'Abc', 'Abc', 'Ac', '2013-01-21', 'active');
