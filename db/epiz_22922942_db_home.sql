-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql204.byetcluster.com
-- Generation Time: Dec 10, 2018 at 02:33 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_22922942_db_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(6, 'Family'),
(7, 'Mess'),
(8, 'Hostel'),
(9, 'Sublet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(2, 'Arnab', 'Das', 'anik6881@gmail.com', 'dacccZ', 0, '2018-03-10 18:05:01'),
(3, 'Anik', 'Das', 'anik6881@gmail.com', 'INSPIRATION\r\nSorry, no INSPIRATION ads are available for you at the moment. Check back tomorrow.\r\nDELIGHT\r\nSorry, no DELIGHT ads are available for you at the moment. Check back tomorrow.', 0, '2018-03-11 15:11:08'),
(5, 'java', 'script', 'JavaScript@gmail.com', 'Senior Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an', 0, '2018-03-13 09:57:20'),
(6, 'PHP', 'no', 'e8@vektik.com', 'JAVA &amp; PHP Developer (Oracle Certified JAVA Programmer) and the founder of TWLP Learning Solutions. - a online guide...', 1, '2018-03-14 04:25:28'),
(7, 'FreeBitco', '.in', 'FreeBitco@gmail.com', 'Please double-check that the address you have copied is correct before sending bitcoins from your wallet since there...', 0, '2018-03-14 04:26:57'),
(8, 'Arnab', 'Das', 'JmidarEmpty@gmail.com', 'dc xzc cz', 0, '2018-03-23 14:13:33'),
(9, 'lol', 'lol', 'lol@gmail.com', 'lol', 0, '2018-10-29 14:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, 'Copyright JmidarArnab');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE IF NOT EXISTS `tbl_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'any...', '<div class="wc_box_content">\r\n<ul>\r\n<li>Multiple ways to earn (Ex: Offerwalls, PTSU etc)</li>\r\n<li>Affordable and lower than industry standard advertising rates</li>\r\n<li>Trust Grid for cheap advertising</li>\r\n<li>Many monthly contest for more earning.</li>\r\n<li>Minimum cashout of $3.00</li>\r\n</ul>\r\n</div>\r\n<div class="wc_signup_but">MY ACCOUNT PANEL</div>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(10, 7, 'à¦®à¦¾à¦œà¦¾à¦° à¦—à¦²à¦¿, à¦®à§à¦°à¦¾à¦¦à¦ªà§à¦° , Chittagong', '<h3>Total Cost 5000 /Per-Month</h3>\r\n<p>&nbsp;3 Bedroom&nbsp;<br />&nbsp;2 Bathroom</p>\r\n<p>Gender : Only for male</p>', 'Upload/5f0bf23cd0.png', 'Jmidar', 'Mess mess home Home', '2018-12-10 19:19:28', 8),
(11, 0, 'à¦šà¦Ÿà§à¦Ÿà¦—à§à¦°à¦¾à¦® à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à§Ÿ , Chittagong', '<h3>Negotiable</h3>\r\n<p>&nbsp;0 Bedroom&nbsp;<br />&nbsp;0 Bathroom</p>\r\n<p>Gender : For everyone</p>', 'Upload/a1ea2b005e.png', 'Jmidar', 'Home home Family family', '2018-12-10 19:22:21', 8),
(12, 6, 'Oxygen , Wapda gate , Chittagong', '<h3>9500 /Per-Month</h3>\r\n<p>&nbsp;2 Bedroom&nbsp;<br />&nbsp;2 Bathroom</p>\r\n<p>Gender : For everyone</p>', 'Upload/79e5387022.png', 'Jmidar', 'House', '2018-12-10 19:26:44', 8),
(13, 8, ' à¦¦à¦•à§à¦·à¦¿à¦¨ à¦•à§à¦¯à¦¾à¦®à§à¦ªà¦¾à¦¸, à¦šà¦¬à¦¿ . , Chittagong', '<h3>Negotiable</h3>\r\n<p>&nbsp;0 Bedroom&nbsp;<br />&nbsp;0 Bathroom</p>\r\n<p>Gender : For everyone</p>', 'Upload/621acbdd7b.png', 'Jmidar', 'hostel Hostel', '2018-12-10 19:28:11', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(1, '1', 'Upload/Slider/e4f3dc7113.jpg'),
(2, '2', 'Upload/Slider/729800392a.jpg'),
(3, '3', 'Upload/Slider/cb4417735c.jpg'),
(4, '4', 'Upload/Slider/e4e5cab9bc.jpg'),
(5, '5', 'Upload/Slider/cbdf2c2554.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE IF NOT EXISTS `tbl_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'http://facebook.com', 'http://twitter.com', 'http://linkedin.com', 'http://google.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE IF NOT EXISTS `tbl_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme`) VALUES
(1, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(2, '', 'Jmi', 'jmi', '', '', 0),
(6, '', 'anik6881', 'a8d729744cce939323d37f1789be0d4f', '', '', 2),
(8, '', 'Jmidar', 'd0970714757783e6cf17b26fb8e2298f', '', '', 0),
(9, 'Jmidar', 'jmi', '9eb0d3c6c8f0e798a9cb8b3f1d92dafc', 'jmi@gmail.com', '<p>nmbghcvhjgv</p>', 1),
(10, '', 'Arnab', 'bf9ea75bd1d06d64c834e63a7e1ef0cf', '', '', 2),
(11, '', 'arnab', 'bf9ea75bd1d06d64c834e63a7e1ef0cf', '', '', 1),
(12, '', 'arnab.das682@gmail.com', 'c161e92ed7bdb5e2ba4cef19e2d1d7b0', '', '', 1),
(13, '', 'jmidar', '698d51a19d8a121ce581499d7b701668', '', '', 1),
(14, '', 'jmidar', '698d51a19d8a121ce581499d7b701668', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE IF NOT EXISTS `title_slogan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'our set title', 'our set slogan', 'Upload/logo.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
