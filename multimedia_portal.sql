-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2014 at 03:31 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `multimedia_portal`
--
CREATE DATABASE IF NOT EXISTS `multimedia_portal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `multimedia_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `userid` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `code` bigint(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `serial` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table contains the comments on various mutlimedia stuff on website.' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`userid`, `description`, `type`, `code`, `time`, `serial`) VALUES
('pulkit.arora', 'This video is Awesome.', 'videos', 1, '2014-04-14 21:27:09', 1),
('pulkit.arora', 'Done at last..!', 'videos', 1, '2014-04-16 17:27:04', 2),
('pulkit.arora', 'Enter Comment Here..!', 'videos', 2, '2014-04-16 20:25:05', 5);

-- --------------------------------------------------------

--
-- Table structure for table `commontokens`
--

CREATE TABLE IF NOT EXISTS `commontokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `commontokens`
--

INSERT INTO `commontokens` (`id`, `token`) VALUES
(1, 'to'),
(2, 'from'),
(3, 'by'),
(4, 'and'),
(5, 'the'),
(8, 'between'),
(9, 'but'),
(10, 'that'),
(11, 'this');

-- --------------------------------------------------------

--
-- Table structure for table `general_queries`
--

CREATE TABLE IF NOT EXISTS `general_queries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query` varchar(100) NOT NULL,
  `frequency` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=242 ;

--
-- Dumping data for table `general_queries`
--

INSERT INTO `general_queries` (`id`, `query`, `frequency`) VALUES
(1, 'Afghanistan', 0),
(2, 'Aringland Islands', 0),
(3, 'Albania', 0),
(4, 'Algeria', 0),
(5, 'American Samoa', 0),
(6, 'Andorra', 0),
(7, 'Angola', 0),
(8, 'Anguilla', 0),
(9, 'Antarctica', 0),
(10, 'Antigua and Barbuda', 0),
(11, 'Argentina', 0),
(12, 'Armenia', 0),
(13, 'Aruba', 0),
(14, 'Australia', 0),
(15, 'Austria', 0),
(16, 'Azerbaijan', 0),
(17, 'Bahamas', 0),
(18, 'Bahrain', 0),
(19, 'Bangladesh', 0),
(20, 'Barbados', 0),
(21, 'Belarus', 0),
(22, 'Belgium', 0),
(23, 'Belize', 0),
(24, 'Benin', 0),
(25, 'Bermuda', 0),
(26, 'Bhutan', 0),
(27, 'Bolivia', 0),
(28, 'Bosnia and Herzegovina', 0),
(29, 'Botswana', 0),
(30, 'Bouvet Island', 0),
(31, 'Brazil', 0),
(32, 'British Indian Ocean territory', 0),
(33, 'Brunei Darussalam', 0),
(34, 'Bulgaria', 0),
(35, 'Burkina Faso', 0),
(36, 'Burundi', 0),
(37, 'Cambodia', 0),
(38, 'Cameroon', 0),
(39, 'Canada', 0),
(40, 'Cape Verde', 0),
(41, 'Cayman Islands', 0),
(42, 'Central African Republic', 0),
(43, 'Chad', 0),
(44, 'Chile', 0),
(45, 'China', 0),
(46, 'Christmas Island', 0),
(47, 'Cocos (Keeling) Islands', 0),
(48, 'Colombia', 0),
(49, 'Comoros', 0),
(50, 'Congo', 0),
(51, 'Congo', 0),
(52, ' Democratic Republic', 0),
(53, 'Cook Islands', 0),
(54, 'Costa Rica', 0),
(55, 'Ivory Coast (Ivory Coast)', 0),
(56, 'Croatia (Hrvatska)', 0),
(57, 'Cuba', 0),
(58, 'Cyprus', 0),
(59, 'Czech Republic', 0),
(60, 'Denmark', 0),
(61, 'Djibouti', 0),
(62, 'Dominica', 0),
(63, 'Dominican Republic', 0),
(64, 'East Timor', 0),
(65, 'Ecuador', 0),
(66, 'Egypt', 0),
(67, 'El Salvador', 0),
(68, 'Equatorial Guinea', 0),
(69, 'Eritrea', 0),
(70, 'Estonia', 0),
(71, 'Ethiopia', 0),
(72, 'Falkland Islands', 0),
(73, 'Faroe Islands', 0),
(74, 'Fiji', 0),
(75, 'Finland', 0),
(76, 'France', 0),
(77, 'French Guiana', 0),
(78, 'French Polynesia', 0),
(79, 'French Southern Territories', 0),
(80, 'Gabon', 0),
(81, 'Gambia', 0),
(82, 'Georgia', 0),
(83, 'Germany', 0),
(84, 'Ghana', 0),
(85, 'Gibraltar', 0),
(86, 'Greece', 0),
(87, 'Greenland', 0),
(88, 'Grenada', 0),
(89, 'Guadeloupe', 0),
(90, 'Guam', 0),
(91, 'Guatemala', 0),
(92, 'Guinea', 0),
(93, 'Guinea-Bissau', 0),
(94, 'Guyana', 0),
(95, 'Haiti', 0),
(96, 'Heard and McDonald Islands', 0),
(97, 'Honduras', 0),
(98, 'Hong Kong', 0),
(99, 'Hungary', 0),
(100, 'Iceland', 0),
(102, 'Indonesia', 0),
(103, 'Iran', 0),
(104, 'Iraq', 0),
(105, 'Ireland', 0),
(106, 'Israel', 0),
(107, 'Italy', 0),
(108, 'Jamaica', 0),
(109, 'Japan', 0),
(110, 'Jordan', 0),
(111, 'Kazakhstan', 0),
(112, 'Kenya', 0),
(113, 'Kiribati', 0),
(114, 'Korea (north)', 0),
(115, 'Korea (south)', 0),
(116, 'Kuwait', 0),
(117, 'Kyrgyzstan', 0),
(118, 'Lao People''s Democratic Republic', 0),
(119, 'Latvia', 0),
(120, 'Lebanon', 0),
(121, 'Lesotho', 0),
(122, 'Liberia', 0),
(123, 'Libyan Arab Jamahiriya', 0),
(124, 'Liechtenstein', 0),
(125, 'Lithuania', 0),
(126, 'Luxembourg', 0),
(127, 'Macao', 0),
(128, 'Macedonia', 0),
(129, 'Madagascar', 0),
(130, 'Malawi', 0),
(131, 'Malaysia', 0),
(132, 'Maldives', 0),
(133, 'Mali', 0),
(134, 'Malta', 0),
(135, 'Marshall Islands', 0),
(136, 'Martinique', 0),
(137, 'Mauritania', 0),
(138, 'Mauritius', 0),
(139, 'Mayotte', 0),
(140, 'Mexico', 0),
(141, 'Micronesia', 0),
(142, 'Moldova', 0),
(143, 'Monaco', 0),
(144, 'Mongolia', 0),
(145, 'Montserrat', 0),
(146, 'Morocco', 0),
(147, 'Mozambique', 0),
(148, 'Myanmar', 0),
(149, 'Namibia', 0),
(150, 'Nauru', 0),
(151, 'Nepal', 0),
(152, 'Netherlands', 0),
(153, 'Netherlands Antilles', 0),
(154, 'New Caledonia', 0),
(155, 'New Zealand', 0),
(156, 'Nicaragua', 0),
(157, 'Niger', 0),
(158, 'Nigeria', 0),
(159, 'Niue', 0),
(160, 'Norfolk Island', 0),
(161, 'Northern Mariana Islands', 0),
(162, 'Norway', 0),
(163, 'Oman', 0),
(164, 'Pakistan', 0),
(165, 'Palau', 0),
(166, 'Palestinian Territories', 0),
(167, 'Panama', 0),
(168, 'Papua New Guinea', 0),
(169, 'Paraguay', 0),
(170, 'Peru', 0),
(171, 'Philippines', 0),
(172, 'Pitcairn', 0),
(173, 'Poland', 0),
(174, 'Portugal', 0),
(175, 'Puerto Rico', 0),
(176, 'Qatar', 0),
(177, 'Runion', 0),
(178, 'Romania', 0),
(179, 'Russian Federation', 0),
(180, 'Rwanda', 0),
(181, 'Saint Helena', 0),
(182, 'Saint Kitts and Nevis', 0),
(183, 'Saint Lucia', 0),
(184, 'Saint Pierre and Miquelon', 0),
(185, 'Saint Vincent and the Grenadines', 0),
(186, 'Samoa', 0),
(187, 'San Marino', 0),
(188, 'Sao Tome and Principe', 0),
(189, 'Saudi Arabia', 0),
(190, 'Senegal', 0),
(191, 'Serbia and Montenegro', 0),
(192, 'Seychelles', 0),
(193, 'Sierra Leone', 0),
(194, 'Singapore', 0),
(195, 'Slovakia', 0),
(196, 'Slovenia', 0),
(197, 'Solomon Islands', 0),
(198, 'Somalia', 0),
(199, 'South Africa', 0),
(200, 'South Georgia and the South Sandwich Islands', 0),
(201, 'Spain', 0),
(202, 'Sri Lanka', 0),
(203, 'Sudan', 0),
(204, 'Suriname', 0),
(205, 'Svalbard and Jan Mayen Islands', 0),
(206, 'Swaziland', 0),
(207, 'Sweden', 0),
(208, 'Switzerland', 0),
(209, 'Syria', 0),
(210, 'Taiwan', 0),
(211, 'Tajikistan', 0),
(212, 'Tanzania', 0),
(213, 'Thailand', 0),
(214, 'Togo', 0),
(215, 'Tokelau', 0),
(216, 'Tonga', 0),
(217, 'Trinidad and Tobago', 0),
(218, 'Tunisia', 0),
(219, 'Turkey', 0),
(220, 'Turkmenistan', 0),
(221, 'Turks and Caicos Islands', 0),
(222, 'Tuvalu', 0),
(223, 'Uganda', 0),
(224, 'Ukraine', 0),
(225, 'United Arab Emirates', 0),
(226, 'United Kingdom', 0),
(227, 'United States of America', 0),
(228, 'Uruguay', 0),
(229, 'Uzbekistan', 0),
(230, 'Vanuatu', 0),
(231, 'Vatican City', 0),
(232, 'Venezuela', 0),
(233, 'Vietnam', 0),
(234, 'Virgin Islands (British)', 0),
(235, 'Virgin Islands (US)', 0),
(236, 'Wallis and Futuna Islands', 0),
(237, 'Western Sahara', 0),
(238, 'Yemen', 0),
(239, 'Zaire', 0),
(240, 'Zambia', 0),
(241, 'Zimbabwe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'standard',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `name`, `type`, `email`) VALUES
('pulkit.arora', '123', 'Pulkit Arora', 'standard', 'pulkit@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `videoavgrelevance`
--

CREATE TABLE IF NOT EXISTS `videoavgrelevance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(40) NOT NULL,
  `relevance` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `videoavgrelevance`
--

INSERT INTO `videoavgrelevance` (`id`, `tag`, `relevance`) VALUES
(1, 'cinema', 20),
(2, 'comedy', 1),
(3, 'computer sciences', 56),
(4, 'education', 30),
(5, 'movies', 10.5),
(6, 'programming', 36),
(7, 'songs', 20);

-- --------------------------------------------------------

--
-- Table structure for table `videokeywords`
--

CREATE TABLE IF NOT EXISTS `videokeywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyWord` varchar(50) NOT NULL,
  `tag` varchar(40) NOT NULL,
  `groupById` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `videokeywords`
--

INSERT INTO `videokeywords` (`id`, `keyWord`, `tag`, `groupById`) VALUES
(1, 'tutorial', 'tutorial', 1),
(2, 'beginners', 'beginners', 2),
(3, 'sharukh khan', 'movies', 3),
(4, 'how to', 'software problem', 4),
(5, 'theory', 'education', 5),
(6, 'c++', 'programming', 6),
(7, 'java', 'programming', 8),
(8, 'theory', 'education', 10);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `hash` varchar(50) NOT NULL,
  `extention` varchar(10) NOT NULL,
  `code` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `userid` varchar(50) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  `downvotes` int(11) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `learn` tinyint(1) NOT NULL DEFAULT '0',
  `tag` varchar(40) NOT NULL,
  `relevance` float NOT NULL,
  `recommendations` int(11) NOT NULL DEFAULT '0',
  `language` varchar(50) NOT NULL DEFAULT 'english',
  PRIMARY KEY (`code`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`hash`, `extention`, `code`, `name`, `description`, `userid`, `upvotes`, `downvotes`, `approved`, `views`, `time`, `learn`, `tag`, `relevance`, `recommendations`, `language`) VALUES
('abcd1', 'mp4', 1, 'John newman - Love me again', 'This video is great.!', 'pulkit.arora', 0, 1, 1, 98, '2014-04-11 15:36:44', 0, 'programming', 0, 0, 'english'),
('abcd', 'mp4', 2, 'Roadies episode', 'This video is shit.', 'pulkit.arora', 11, 18, 1, 114, '2014-04-11 16:26:30', 0, 'software problem', 0, 0, 'english');

-- --------------------------------------------------------

--
-- Table structure for table `videotagimportance`
--

CREATE TABLE IF NOT EXISTS `videotagimportance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(40) NOT NULL,
  `importance` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `videotagimportance`
--

INSERT INTO `videotagimportance` (`id`, `tag`, `importance`) VALUES
(1, 'comedy', 10.2),
(2, 'computer sciences', 56.2),
(3, 'education', 97.6),
(4, 'movies', 22.6),
(5, 'programming', 139),
(6, 'songs', 31),
(7, 'cinema', 31);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `userid` varchar(50) NOT NULL,
  `vote` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `code` bigint(20) NOT NULL,
  `language` varchar(50) NOT NULL DEFAULT 'english',
  `tag` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`,`type`,`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`userid`, `vote`, `type`, `code`, `language`, `tag`) VALUES
('pulkit.arora', -1, 'videos', 1, 'english', 'programming'),
('pulkit.arora', -1, 'videos', 2, 'english', 'software problem');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
